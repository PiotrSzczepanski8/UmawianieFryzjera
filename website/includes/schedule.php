<?php

require_once "../config/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST['data'];
    $godzina = $_POST['godzina'];
    $id_fryzjer = $_POST['id_fryzjer'];
    $id_uzytkownik = $_POST['id_uzytkownik'];

    $query = "SELECT * FROM rezerwacja WHERE id_uzytkownik = '$id_uzytkownik' and data = '$data';";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        $message = 'Nie możesz zaplanować więcej niż jedej wizyty na jeden dzień.';
        header("Location: ../client/schedule.php?action=prev&data=$data&message=$message");
        exit();
    }

    $query = "INSERT INTO rezerwacja (data, godzina, id_uzytkownik, id_fryzjer) 
              VALUES ('$data', '$godzina', '$id_uzytkownik', '$id_fryzjer')";

    if (mysqli_query($conn, $query)) {
        $data = new DateTime($data);
        $data->modify("+1 day");
        $data = $data->format("Y-m-d");
        header("Location: ../client/schedule.php?action=prev&data=$data");
        exit();
    } else {
        echo "<p>Błąd: " . mysqli_error($conn) . "</p>";
    }
}
