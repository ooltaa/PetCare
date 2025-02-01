<?php
require_once 'Database.php';
require_once 'User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $user = new User($db->getConnection());

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $user->register($firstname, $lastname, $age, $email, $password);

    if ($result === true || $result === "Regjistrimi u krye me sukses.") {
        header("Location: Login.php");
        exit();
    } else {
        echo "<script>alert('$result');</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('https://i.pinimg.com/736x/3b/7c/cc/3b7ccc2d00a1bd385ca748996863dccf.jpg'); 
            background-position: center; 
            background-attachment: fixed; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: rgba(255, 255, 255, 0.85);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }

        h1 {
            font-size: 32px;
            color: #2d3436;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #dfe6e9;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 12px;
            background:rgb(173, 95, 127);
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background:rgb(234, 150, 183);
        }

        .form-switch {
            margin-top: 10px;
        }

        .form-switch a {
            color:rgb(147, 65, 69);
            text-decoration: none;
            font-weight: bold;
        }

        .form-switch a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <form action="Register.php" method="POST">
            <input type="text" name="firstname" placeholder="First Name" required>
            <input type="text" name="lastname" placeholder="Last Name" required>
            <input type="number" name="age" placeholder="Age" min="1" max="100" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
        <div class="form-switch">
            <p>Already have an account? <a href="Login.php">Login</a></p>
        </div>
    </div>
</body>
</html>
