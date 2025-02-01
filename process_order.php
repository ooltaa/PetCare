<?php
session_start();
require_once 'Database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['place_order'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $payment_method = $_POST['payment_method']; 

    $db = new Database();
    $conn = $db->getConnection();

    $stmt = $conn->prepare("INSERT INTO orders (product_name, product_price, full_name, email, address, payment_method) VALUES (:product_name, :product_price, :full_name, :email, :address, :payment_method)");
    $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
    $stmt->bindParam(':product_price', $product_price, PDO::PARAM_INT);
    $stmt->bindParam(':full_name', $full_name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':address', $address, PDO::PARAM_STR);
    $stmt->bindParam(':payment_method', $payment_method, PDO::PARAM_STR);
 
    if ($stmt->execute()) {
        echo "<script>alert('Order placed successfully!'); window.location.href='userDashboard.php';</script>";
    } else {
        echo "<script>alert('Error placing order. Please try again.'); window.location.href='checkout.php';</script>";
    }
}
?>
