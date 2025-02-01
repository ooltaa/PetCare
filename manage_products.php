<?php
session_start();
require_once '../classes/Product.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: ../auth/login.php");
    exit();
}

$productManager = new Product();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_product'])) {
    $name = trim($_POST['product_name']);
    $price = trim($_POST['price']);
    $productManager->addProduct($name, $price);
    header("Location: manage_products.php");
    exit();
}

$products = $productManager->getAllProducts();

include '../includes/header.php';
include '../includes/sidebar.php';
?>

<div class="main-content">
    <h2>Manage Products</h2>

    <form action="manage_products.php" method="POST" class="store-form">
        <input type="text" name="product_name" placeholder="Product Name" required>
        <input type="number" name="price" placeholder="Price" required>
        <button type="submit" name="add_product" class="add-btn">Add Product</button>
    </form>

    <h3>Product List</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $product['id'] ?></td>
                <td><?= htmlspecialchars($product['name']) ?></td>
                <td>$<?= htmlspecialchars($product['price']) ?></td>
                <td>
                    <a href="edit_product.php?id=<?= $product['id'] ?>" class="edit-btn">Edit</a>
                    <a href="delete_product.php?id=<?= $product['id'] ?>" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>
