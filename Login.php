<?php
require_once 'User.php';

$errorMessage = "";

if (isset($_POST["submit"])) {
    $username = $_POST["email"];
    $password = $_POST["password"];

    $user = new User();

    $loginResult = $user->login($email, $password);

    
    if ($loginResult === true) {
        session_start();
        if ($_SESSION['role'] === 'admin') {
            header("Location: admindashboard.php");
        } else {
            header("Location: userdashboard.php");
        }
        exit();
    } else {
        $errorMessage = $loginResult;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login & Register Form</title>
  <style>
  body {
    font-family: Arial, sans-serif;
    background-image: url('images/background.jpg') !important; 
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
</style>

<style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
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
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    button:hover {
      background-color: #45a049;
    }

    .form-switch {
      text-align: center;
      margin-top: 10px;
    }

    .form-switch a {
      color: #4CAF50;
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
        <input type="text" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
      </form>
      <div class="form-switch">
        <p>Don't have an account? <a href="Register.php" >Register</a></p>
      </div>
    </div>
  </div>
  </section>

  <script>
    function showRegisterForm() {
      document.getElementById('loginForm').style.display = 'none';
      document.getElementById('registerForm').style.display = 'block';
    }

    function showLoginForm() {
      document.getElementById('registerForm').style.display = 'none';
      document.getElementById('loginForm').style.display = 'block';
    }
  </script>
</body>
</html>
