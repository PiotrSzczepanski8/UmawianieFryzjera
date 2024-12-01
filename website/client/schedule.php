<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style.css">
    <link rel="shortcut icon" href="../public/logo.svg" type="image/x-icon">
    <title>Zaplanuj wizytę</title>
</head>
<body>
    <div class="container">
        <?php
            include "../public/header.shtml";
        ?>
        <main class="schedule_main">
            <?php
            require_once "../config/connection.php";
            
            if(session_status() === PHP_SESSION_NONE){
                session_start();
            }

            $data = new DateTime(date("Y-m-d"));

            $today = new DateTime();
            if ($data < $today) {
                $data = $today;
            }
            if ($today->format("w") == 0 || $today->format("w") == 6){
                $today->modify('next monday');
                $data = $today;
            }
            
            if (isset($_GET['data'])) {
                $data = new DateTime($_GET['data']);
            }

            function getNextWeekday($date, $direction = 'next'){
                $dayOfWeek = $date->format('w');

                if ($direction === 'next'){
                    if ($dayOfWeek == 5){
                        $date->modify('+3 days');
                    } elseif ($dayOfWeek == 6){
                        $date->modify('+2 days');
                    } else {
                        $date->modify('+1 day');
                    }
                }
                elseif ($direction === 'prev'){
                    if ($dayOfWeek == 1) {
                        $date->modify('-3 days');
                    } elseif ($dayOfWeek == 0){
                        $date->modify('-2 days');
                    } else {
                        $date->modify('-1 day');
                    }
                }

                $today = new DateTime();
                $todayDayOfWeek = $today->format('w');

 
                if ($todayDayOfWeek == 0){
                    $today->modify('+1 day');
                } elseif ($todayDayOfWeek == 6){
                    $today->modify('+2 days');
                }

                if ($date < $today) {
                    $date = $today;
                }

                return $date;
            }

            if (isset($_GET['action'])) {
                if ($_GET['action'] === 'prev') {
                    $data = getNextWeekday($data, 'prev');
                } elseif ($_GET['action'] === 'next') {
                    $data = getNextWeekday($data, 'next');
                }
            }

            echo '<section class="calendar_nav">';
            
            echo '<a href="?action=prev&data=' . $data->format("Y-m-d") . '" class="change_date_button">&#x25C0;</a>';
            
            echo '<h1 class="schedule_h1">'.$data->format("d.m").'</h1>';
            
            echo '<a href="?action=next&data=' . $data->format("Y-m-d") . '" class="change_date_button">&#x25B6;</a>';

            echo '</section>';

            echo '<div class="schedule">';

            if (isset($_SESSION['login'])) {
                $login = $_SESSION['login'];
                
                $query = "SELECT * FROM uzytkownik WHERE login = '$login';";
                $result = mysqli_query($conn, $query);
            
                $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $user_id = $rows[0]['PESEL'];
            }

            $koniec = new DateTime('16:30:00');

            $query = "SELECT * FROM fryzjer;";
            $result = mysqli_query($conn, $query);
            
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            
            foreach ($rows as $row) {
                $godzina = new DateTime('09:00:00');
                echo '<section>';
                echo "<h3>".$row['imie']." ".$row['nazwisko']."</h3>";
                while ($godzina <= $koniec){

                    echo '<section>';
                    
                    echo '<p>'.$godzina->format('H:i').'</p>';
                    $godzina->modify('+45 minutes');

                    $godzinaFormatted = $godzina->format('H:i');
                    $dataFormatted = $data->format("Y-m-d");
                    $id_fryzjer = $row['id_fryzjer'];
                    
                    $query = "SELECT * FROM rezerwacja WHERE id_fryzjer = '$id_fryzjer' AND data = '$dataFormatted' AND godzina = '$godzinaFormatted';";
                    $result = mysqli_query($conn, $query);

                    if(mysqli_num_rows($result) > 0){
                        echo "<p style='background-color: #ad57d5; color: #00000070;'>Zajęty</p><button class='login_submit disabled_button'>Zarezerwuj</button>";
                    }else{
                        echo "<form method='POST' action='../includes/schedule.php'>";
                        echo "<input type='hidden' name='data' value='$dataFormatted'>";
                        echo "<input type='hidden' name='godzina' value='$godzinaFormatted'>";
                        echo "<input type='hidden' name='id_fryzjer' value='$id_fryzjer'>";
                        echo "<input type='hidden' name='id_uzytkownik' value='$user_id'>";
                        echo "<p style='background-color: #ffbb00; color: #00000070;'>Dostępny</p>";echo "<button class='login_submit'>Zarezerwuj</button>";
                        echo "</form>";
                    }
                    
                    echo '</section>';
                }
                echo '</section>';
            }
            echo '</div>';
            ?>
            
        </main>
    </div>
</body>
</html>
