<?php
    session_start();
    if(isset($_SESSION['login'])){
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
    <title>Zaloguj się</title>
</head>
<body>
    <div class="container">
        <?php
            include "../public/header.shtml";
        ?>
        <main>
            <section class="login_section">
                <form class="login_form" action="../includes/login.php" method="post">
                    <h3>Zaloguj się</h3>
                    <section>
                        <label for="login">Login:</label>
                        <input type="text" name="login">
                    </section>
                    <section>
                        <label for="password">Hasło:</label>
                        <input type="password" name="password">
                    </section>
                    <a href="register.php" class="log_reg">nie mam konta &rightarrow;</a>
                    <input class="login_submit" type="submit" value="Zaloguj">
                </form>
            </section>
        </main>
    </div>
</body>
</html>