<?php
session_start();
require_once 'ClientRequest.php';

$clientRequestManager = new ClientRequest();

$requests = $clientRequestManager->getAllRequests();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_request'])) {
    $clientRequestManager->deleteRequest($_POST['request_id']);
    header("Location: manage_request.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Client Requests</title>
    <link rel="stylesheet" href="CSS/request.css">
</head>
<body>
    <div class="navbar">
        <h2>Manage Client Requests</h2>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

    <div class="request-container">
        <h2>Client Requests</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Services</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requests as $request): ?>
                <tr>
                    <td><?= $request['id'] ?></td>
                    <td><?= htmlspecialchars($request['first_name']) ?></td>
                    <td><?= htmlspecialchars($request['last_name']) ?></td>
                    <td><?= htmlspecialchars($request['email']) ?></td>
                    <td><?= htmlspecialchars($request['phone']) ?></td>
                    <td><?= htmlspecialchars($request['services']) ?></td>
                    <td><?= htmlspecialchars($request['created_at']) ?></td>
                    <td>
                        <a href="edit_request.php?id=<?= $request['id'] ?>" class="edit-btn">Edit</a>
                        <form action="manage_requests.php" method="POST" style="display:inline;">
                            <input type="hidden" name="request_id" value="<?= $request['id'] ?>">
                            <button type="submit" name="delete_request" class="delete-btn">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
