<?php
session_start();
require_once 'Database.php';
require_once 'User.php';

$user = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $loginResult = $user->login($email, $password);

    if ($loginResult) {
        $_SESSION["user_id"] = $loginResult["id"];
        $_SESSION["user_name"] = $loginResult["firstname"] . " " . $loginResult["lastname"];
        $_SESSION["role"] = $loginResult["role"]; // Shto rolin në sesion

        // Kontrollo nëse user-i është admin apo user normal
        if ($_SESSION["role"] == "admin") {
            header("Location: adminDashboard.php"); // Ridrejto adminin te adminDashboard
        } else {
            header("Location: userdashboard.php"); // Ridrejto user-in normal te userdashboard
        }
        exit();
    } else {
        $errorMessage = "Invalid email or password. Please try again.";
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
  body {
    font-family: Arial, sans-serif;
    background-image: url('https://i.pinimg.com/736x/67/27/26/672726693814a2e6246b9416eff7f67b.jpg'); 
    background-size: cover; 
    background-position: center; 
    background-attachment: fixed; 
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }
  .container {
    background-color: white; 
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 300px;
  }
  h2 {
    text-align: center;
    margin-bottom: 20px;
  }
  input[type="text"], input[type="password"], input[type="email"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
  }
  button {
    width: 100%;
    padding: 10px;
    background-color:rgb(198, 124, 132);
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
  }
  button:hover {
    background-color:rgb(243, 154, 160);
  }
  .form-switch {
    text-align: center;
    margin-top: 10px;
  }
  .form-switch a {
    color:rgb(121, 52, 65);
    text-decoration: none;
  }
  .form-switch a:hover {
    text-decoration: underline;
  }
  </style>
</head>
<body>
<section id="login">
  <div class="container">
  <div id="loginForm">
      <h2>Login</h2>
      <form action="Login.php" method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
      </form>
      <div class="form-switch">
        <p>Don't have an account? <a href="Register.php">Register</a></p>
      </div>
    </div>
  </div>
</section>
</body>
</html>