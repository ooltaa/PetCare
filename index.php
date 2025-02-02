<?php
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Welcome to PetCare</title>
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    
<div class="main">
        <div class="container">
            <h1>Welcome to <span>PetCare</span></h1>
            <h2>Your one-stop destination for all pet needs.</h2>
            <h3>Join us today and take care of your furry friends!</h3>
            <div class="buttons">
                <a href="Login.php" class="btn btn-primary">Login</a>
                <a href="Register.php" class="btn btn-secondary">Register</a>
            </div>
        </div>
    </div>
</body>
</html>