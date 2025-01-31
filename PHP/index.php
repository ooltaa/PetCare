<?php

    session_start();

    if(!isset($_SESSION['user_id'])){
        header("Location: Login.php");
        exit;
    }

    echo "Welcome ," . $_SESSION['email'] . "!";
?>

<a href="Logout.php">Logut</a>