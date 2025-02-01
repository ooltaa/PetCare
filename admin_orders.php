<?php
session_start();
require_once 'Order.php';

$orderManager = new Order();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_status'])) {
    $orderManager->updateOrderStatus($_POST['order_id'], $_POST['new_status']);
    header("Location: admin_orders.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_order'])) {
    $orderManager->deleteOrder($_POST['order_id']);
    header("Location: admin_orders.php");
    exit();
}

$orders = $orderManager->getAllOrders();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Orders</title>
    <link rel="stylesheet" href="CSS/admin_orders.css">
</head>
<body>
    <div class="navbar">
        <h2>Admin - Orders</h2>
        <a href="adminDashboard.php" class="back-btn">🔙 Back to Dashboard</a>
    </div>

    <div class="order-container">
        <h2>All Orders</h2>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Customer</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $order['id'] ?></td>
                    <td><?= htmlspecialchars($order['product_name']) ?></td>
                    <td>$<?= htmlspecialchars($order['product_price']) ?></td>
                    <td><?= htmlspecialchars($order['full_name']) ?></td>
                    <td><?= htmlspecialchars($order['email']) ?></td>
                    <td><?= htmlspecialchars($order['address']) ?></td>
                    <td><?= htmlspecialchars($order['created_at']) ?></td>
                    <td>
             
                        <form action="adminDashboard.php" method="POST">
        <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
        <select name="new_status">
            <option value="Pending" <?= ($status == 'Pending') ? 'selected' : '' ?>>Pending</option>
            <option value="Processing" <?= ($status == 'Processing') ? 'selected' : '' ?>>Processing</option>
            <option value="Shipped" <?= ($status == 'Shipped') ? 'selected' : '' ?>>Shipped</option>
            <option value="Cancelled" <?= ($status == 'Cancelled') ? 'selected' : '' ?>>Cancelled</option>
        </select>
        <button type="submit" name="update_status" class="update-btn">Update</button>
    </form>
                    </td>
                    <td>
                        <form action="admin_orders.php" method="POST">
                            <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                            <button type="submit" name="delete_order" class="delete-btn">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
