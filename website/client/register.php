<?php
    session_start();
    if(isset($_SESSION['login'])){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style.css">
    <link rel="shortcut icon" href="../public/logo.svg" type="image/x-icon">
    <title>Zarejestruj się</title>
</head>
<body>
    <div class="container">
        <?php
            include "../public/header.shtml";
        ?>
        <main>
            <section class="login_section">
                <form class="login_form" method="POST" action="../includes/register.php">
                    <h3>Zarejestruj się</h3>
                    <section>
                        <label for="imie">Imię:</label>
                        <input type="text" name="name" required>
                    </section>
                    <section>
                        <label for="nazwisko">Nazwisko:</label>
                        <input type="text" name="surname" required>
                    </section>
                    <section>
                        <label for="phone">nr telefonu:</label>
                        <input type="tel" pattern="\+[0-9]{2,3} [0-9]{3} [0-9]{3} [0-9]{3}" placeholder="+48 000 000 000" name="p_number" required>
                    </section>
                    <section>
                        <label for="pesel">PESEL:</label>
                        <input type="number" name="pesel" pattern="[0-9]{11}" placeholder="00000000000" required>
                    </section>
                    <section>
                        <label for="login">Login:</label>
                        <input type="text" name="login" required>
                    </section>
                    <section>
                        <label for="password">Hasło:</label>
                        <input type="password" name="password" required>
                    </section>
                    <a href="login.php" class="log_reg">mam już konto &rightarrow;</a>
                    <input class="login_submit" type="submit" value="Potwierdź">
                </form>
            </section>
        </main>
    </div>
</body>
</html>