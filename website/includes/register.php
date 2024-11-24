<?php
    session_start();
    if(isset($_SESSION['login'])){
        header("Location: ../client/index.php");
    }
    
    require_once("../config/connection.php");

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $phone = $_POST['p_number'];
        $pesel = $_POST['pesel'];
        $login = $_POST['login'];
        $password = $_POST['password'];

        $query = "SELECT * FROM uzytkownik WHERE login='$login' or telefon='$phone' or pesel='$pesel';";

        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0){
            echo "Na któreś z tych trzech pól istnieje już zarejsetrowane konto: PESEL, login, nr telefonu. Sprawdź poprawność wprowadzonych danych."."<br>";
            echo '<a href="javascript:history.back()">powrót</a>';
        }else{
            $query = "INSERT INTO uzytkownik(imie, nazwisko, telefon, pesel, login, haslo) VALUES('$name', '$surname', '$phone', '$pesel', '$login', '$password');";

            mysqli_query($conn, $query);

            session_start();
            $_SESSION['login'] = $login;
            $_SESSION['logged'] = true;
            
            header("Location: ../client/index.php");
        }
    }
?>