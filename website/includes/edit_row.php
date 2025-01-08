<?php
    require_once "../config/connection.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        header("Location: index.php");
        exit();
    }
    
    if(isset($_GET['table'])){
        $table = $_GET['table'];
    }else{
        header("Location: index.php");
        exit();
    }
?>

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
                <a href="../admin/index.php" class="logotype">
                    Pan Fryzjer
                    <img src="../public/logo.svg" class="logo">
                </a>
            </section>
            <nav>
                <?php

                    require_once "../config/connection.php";

                    session_start();
                    if(isset($_SESSION['name']) && isset($_SESSION['surname'])){
                        $imie = $_SESSION['name'];
                        $nazwisko = $_SESSION['surname'];
                        echo "<p style='margin: 0; display: flex; align-items: center;'>".$imie." ".$nazwisko."</p>";
                    }
                ?>
                <a href='../public/logout.php' class='line_link logout'>wyloguj</a>
            </nav>
        </header>
        <main>
            <?php
                $query = "SELECT * FROM $table WHERE id_$table = $id"; 
                
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                echo "<section class='login_section'>";
                echo "<form action='send_edited.php' method='post' class='login_form'>";
                
                foreach($row[0] as $key => $val){
                    echo "<label for='$key'>$key</label>";
                    echo "<input type='text' name='$key' id='$key' value='$val'>";
                }

                echo "<input type='hidden' name='table' value='$table'>";
                echo "<input type='hidden' name='id_field' value='id_$table'>";
                echo "<input type='hidden' name='id_value' value='$id'>";

                echo "<input type='submit' class='login_submit' value='Potwierdź'>";
                echo "</form>";
                echo "</section>";
            ?>
        </main>
    </div>
</body>
</html>