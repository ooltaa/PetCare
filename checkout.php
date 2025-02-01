<?php
session_start();
require_once 'Database.php';

if (!isset($_POST['buy_product'])) {
    header("Location: userDashboard.php");
    exit();
}

$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_image = $_POST['product_image'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="CSS/checkout.css">
</head>
<body>
    <div class="checkout-container">
        <h2>Checkout</h2>
        <img src="<?= htmlspecialchars($product_image) ?>" alt="<?= htmlspecialchars($product_name) ?>" class="checkout-image">
        <p>You're buying: <strong><?= htmlspecialchars($product_name) ?></strong></p>
        <p>Price: <strong>$<?= htmlspecialchars($product_price) ?></strong></p>

        <form action="process_order.php" method="POST">
            <input type="hidden" name="product_name" value="<?= htmlspecialchars($product_name) ?>">
            <input type="hidden" name="product_price" value="<?= htmlspecialchars($product_price) ?>">

            <label for="full_name">Full Name:</label>
            <input type="text" name="full_name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="address">Shipping Address:</label>
            <textarea name="address" required></textarea>

            <label for="payment_method">Payment Method:</label>
            <select name="payment_method" required>
                <option value="Cash on Delivery">Cash on Delivery</option>
                <option value="Credit Card">Credit Card</option>
                <option value="PayPal">PayPal</option>
            </select>

            <button type="submit" name="place_order" class="place-order-btn">Place Order</button>
        </form>
    </div>
</body>
</html>
