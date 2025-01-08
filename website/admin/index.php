<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style.css">
    <link rel="shortcut icon" href="../public/logo.svg" type="image/x-icon">
    <title>Pan Fryzjer</title>
</head>
<body>
    <div class="container">
        <header>
            <section>
                <a href="index.php" class="logotype">
                    Pan Fryzjer
                    <img src="../public/logo.svg" class="logo">
                </a>
            </section>
            <nav>
                <?php
                    require_once "../config/connection.php";

                    session_start();
                    if(isset($_SESSION['login'])){
                        $login = $_SESSION['login'];
                        echo "<p style='margin: 0; display: flex; align-items: center;'>".$login."</p>";
                    }
                ?>
                <a href='../public/logout.php' class='line_link logout'>wyloguj</a>
            </nav>
        </header>
        <main>
            <section class="home_login" id="home">
                <?php
                    if($login == 'admin'){
                        $query = "DELETE FROM rezerwacja WHERE data < CURDATE()";
                        if(!mysqli_query($conn, $query)){
                            echo 'Wyświetlane dane mogą być przestarzałe.';
                        }

                        $query = "SHOW TABLES FROM zaklad_fryzjerski;";

                        $result = mysqli_query($conn, $query);
                        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

                        foreach ($rows as $row => $val){
                            $table = $val['Tables_in_zaklad_fryzjerski'];
                            
                            $query = "SELECT * FROM $table;";
                            
                            $result = mysqli_query($conn, $query);
                            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

                            echo "<h3 class='cool_underline'>$table</h3>";

                            echo "<table>";
                            echo "<thead><tr>";
                            if(mysqli_num_rows($result) > 0){
                                foreach(array_keys($rows[0]) as $header){
                                    if ($header === 'haslo') {
                                        continue;
                                    }
                                    echo "<th>$header</th>";
                                }
                            }else{
                                echo "w tej tabeli nie ma danych";
                            }
                            echo "</tr></thead>";
                            echo "<tbody>";
                            foreach ($rows as $row => $val){
                                echo '<tr>';
                                foreach ($val as $key => $value){
                                    if ($key === 'haslo'){
                                        continue;
                                    }
                                    echo "<td>".$value."</td>";
                                }
                                $recordId = $val["id_$table"];
                                echo "<td class='table_none_border'>
                                        <button class='login_submit home_button table_button' onClick='editRow(\"$table\", \"$recordId\")'>Edytuj</button>
                                      </td>";
                                echo "<td class='table_none_border'>
                                        <button class='login_submit home_button table_button' onClick='deleteRow(\"$table\", \"$recordId\")'>Usuń</button>
                                      </td>";
                                echo '</tr>';
                            }
                            echo "</tbody>";
                            echo "</table>";
                        }
                        }else{
                            header("Location: ../client/index.php");
                            exit();
                        }
                ?>
            </section>
        </main>
    </div>
    <script src='../public/delete.js' defer></script>
    <script src='../public/edit.js' defer></script>
</body>
</html>