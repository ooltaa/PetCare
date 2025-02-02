<?php
session_start();
require_once 'ClientRequest.php';

$clientRequestManager = new ClientRequest();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_request'])) {
    $requestId = $_POST['request_id'];

    if ($clientRequestManager->deleteRequest($requestId)) {
        echo "success";
        exit();
    } else {
        echo "error";
        exit();
    }
}

$requests = $clientRequestManager->getAllRequests();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Client Requests</title>
    <link rel="stylesheet" href="CSS/request.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="navbar">
    <h2>Manage Client Requests</h2>
    <a href="adminDashboard.php" class="back-btn">⬅ Back to Dashboard</a>
</div>
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
                <tr id="row-<?= $request['id'] ?>">
                    <td><?= $request['id'] ?></td>
                    <td><?= htmlspecialchars($request['first_name']) ?></td>
                    <td><?= htmlspecialchars($request['last_name']) ?></td>
                    <td><?= htmlspecialchars($request['email']) ?></td>
                    <td><?= htmlspecialchars($request['phone']) ?></td>
                    <td><?= htmlspecialchars($request['services']) ?></td>
                    <td><?= htmlspecialchars($request['created_at']) ?></td>
                    <td>
                        <a href="edit_request.php?id=<?= $request['id'] ?>" class="edit-btn">Edit</a>
                        <button class="delete-btn" onclick="deleteRequest(<?= $request['id'] ?>)">Delete</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        function deleteRequest(requestId) {
            if (confirm("Are you sure you want to delete this request?")) {
            $.ajax({
                url: "manage_request.php",
                type: "POST",
                data: { delete_request: true, request_id: requestId },
                success: function(response) {
                    if (response.trim() === "success") {
                        $("#row-" + requestId).fadeOut(500, function() { $(this).remove(); });
                    } else {
                        alert("Error deleting request. Please try again.");
                    }
                },
                error: function() {
                    alert("Error connecting to the server.");
                }
            });
        }
    }
    </script>
</body>
</html>
