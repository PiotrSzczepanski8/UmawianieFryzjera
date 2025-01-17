<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    if(isset($_SESSION['login'])){
        header("Location: ../client/index.php");
        exit();
    }

    require_once("../config/connection.php");
    $logged = false;

    if($_SERVER['REQUEST_METHOD']==="POST"){
        $login = $_POST['login'];
        $password = $_POST['password'];
        
        if($login == 'admin' && $password == 'admin'){
            $_SESSION['login'] = $login;
            header("Location: ../admin/index.php");
            exit();
        }

        $query = "SELECT * FROM uzytkownik WHERE login='$login'";
        
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if(mysqli_num_rows($result) > 0 && password_verify($password, $row[0]['haslo'])){
            $logged = true;
            $_SESSION['logged'] = $logged;
            $_SESSION['login'] = $login;
            header("Location: ../client/index.php");
            exit();
        }else{
            header("Location: ../public/login_failed.php");
            exit();
        }
    }

?>