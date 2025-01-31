<?php
include_once 'Database.php';
include_once 'User.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $db = new DataBase();
    $connection = $db->getConnection();
    $user = new user (db: $connection);


    $fullname = $_POST ['fullname'];
    $email = $_POST ['email'];
    $password = $_POST ['password'];

    if($user->register( $fullname, $email, $password)){
        header(header: " Location: Login.php");
        exit;
    }else{
        echo "Error registering user!";
    }
}
?>



<form action="register.php" method="POST">
    Fullname: <input type="text" name="fullname" required><br>
    Email: <input type="email" name="email" required> <br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Register</button>
</form>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="CSS/style.css">
    <style>
      body {
    font-family: Arial, sans-serif;
    background-image: url('https://media.istockphoto.com/id/1392556345/video/watercolor-paw-pads-illustration-background.jpg?s=640x640&k=20&c=XSWYOafmGlk-pNRctpfkm7j7L1SlNL7uV3MjaQycff0=') !important; 
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
    <section id="register">
        <div id="registerForm">
            <h1>Register</h1>
            <form action="#" method="POST">
                <input type="text" name="fullname" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Register</button>
            </form>
            <div class="form-switch">
                <p>Already have an account? <a href="Login.html" onclick="showLoginForm()">Login</a></p>
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
