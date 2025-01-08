<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style.css">
    <link rel="shortcut icon" href="../public/logo.svg" type="image/x-icon">
    <title>Zaloguj się</title>
</head>
<body>
    <div class="container">
        <?php
            include "../public/header.shtml";
        ?>
        <main class='home_page_main'>
            <img src="../public/black_logo.svg" style="user-select: none;">
            <h1>Perfekcyjny wygląd zaczyna się od wizyty u <p>Pana Fryzjera!</p></h1>
            <h4>Podkreśl swój styl w miejscu, gdzie liczy się każdy detal.</h4>
            <?php
                if(!isset($_SESSION['login'])){
                    echo '<a href="register.php" style="margin-bottom: 2%;"><button class="login_submit">Zarejestruj&nbsp;się</button></a>';
                    echo '&#9670;';
                }else{
                    echo '&#9670;';
                }
            ?>
            <section class='book_link'>
                <h1>Chcesz zmienić swój wygląd?</h1>
                <h4>Nie czekaj! Zarezerwuj wizytę już dziś!</h4>
                <?php
                    if(!isset($_SESSION['login'])){
                        echo '<a href="register.php" style="padding: 1%;"><button class="login_submit">Zarezerwuj</button></a>';
                    }else{
                        echo '<a href="schedule.php" style="padding: 1%;"><button class="login_submit">Zarezerwuj</button></a>';
                    }
                ?>
            </section>
            <p>&#9670;</p>
        </main>
        <?php
            include "../public/footer.shtml";
        ?>
    </div>
</body>
</html>