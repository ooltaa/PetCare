<?php
session_start();
require_once 'ClientRequest.php';

$clientRequestManager = new ClientRequest();

if (!isset($_GET['id'])) {
    header("Location: manage_request.php");
    exit();
}

$request = $clientRequestManager->getRequestById($_GET['id']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clientRequestManager->updateRequest($_POST['id'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone'], $_POST['services']);
    header("Location: manage_request.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Request</title>
    <link rel="stylesheet" href="CSS/request.css">
</head>
<body>
    <div class="edit-request-container">
        <h2>Edit Client Request</h2>
        <form action="edit_request.php?id=<?= $request['id'] ?>" method="POST">
            <input type="hidden" name="id" value="<?= $request['id'] ?>">
            <label>First Name:</label>
            <input type="text" name="first_name" value="<?= htmlspecialchars($request['first_name']) ?>" required>
            <label>Last Name:</label>
            <input type="text" name="last_name" value="<?= htmlspecialchars($request['last_name']) ?>" required>
            <label>Email:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($request['email']) ?>" required>
            <label>Phone:</label>
            <input type="text" name="phone" value="<?= htmlspecialchars($request['phone']) ?>" required>
            <label>Services:</label>
            <input type="text" name="services" value="<?= htmlspecialchars($request['services']) ?>" required>
            <button type="submit">Update Request</button>
        </form>
    </div>
</body>
</html>
