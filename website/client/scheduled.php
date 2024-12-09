<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style.css">
    <link rel="shortcut icon" href="../public/logo.svg" type="image/x-icon">
    <title>Zaplanowane wizyty</title>
</head>
<body>
    <div class="container">
        <?php
            include "../public/header.shtml";
            require_once "../config/connection.php";
        ?>
        <main class="scheduled_main">
            <h1>Twoje zaplanowane wizyty</h1>
        <?php
            if (isset($_SESSION['login'])) {
                $login = $_SESSION['login'];
                
                $query = "SELECT * FROM uzytkownik WHERE login = '$login';";
                $result = mysqli_query($conn, $query);
            
                $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $user_id = $rows[0]['PESEL'];
            }else{
                header("Location: index.php");
                exit();
            }

            $query = "SELECT fryzjer.imie, fryzjer.nazwisko, rezerwacja.data, rezerwacja.godzina FROM rezerwacja INNER JOIN fryzjer ON fryzjer.id_fryzjer = rezerwacja.id_fryzjer WHERE rezerwacja.id_uzytkownik = $user_id AND (rezerwacja.data > CURDATE() OR (rezerwacja.data = CURDATE() AND rezerwacja.godzina > CURTIME()));";

            $result = mysqli_query($conn, $query);
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

            foreach($rows as $row){
                echo "<section>";
                echo "<section>";
                echo "Fryzjer: ";
                echo $row['imie']." ";
                echo $row['nazwisko']." ";
                echo "</section>";
                echo "data: ";
                echo $row['data']." ";
                echo "<section>";
                echo "godzina: ";
                echo $row['godzina']." ";
                echo "</section>";
                echo "</section>";
            }
        ?>
        </main>
    </div>
</body>
</html>
