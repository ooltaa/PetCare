<?php
session_start();
require_once 'Product.php';

$productManager = new Product();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_product'])) {
    $name = trim($_POST['name']) ;
    $price = trim($_POST['price']); 
    $productManager->addProduct($name, $price);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_product'])) {
    $id = $_POST['product_id'];
    $price = $_POST['new_price'];
    $productManager->updateProductPrice($id, $price);
    header("Location: manage_products.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_product'])) {
    $id = $_POST['product_id'];
    $productManager->deleteProduct($id);
    header("Location: manage_products.php");
    exit();
}

$products = $productManager->getAllProducts();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <link rel="stylesheet" href="CSS/manage.css">
</head>
<body>
    <div class="navbar">
        <h2>Manage Products</h2>
        <a href="Logout.php" class="logout-btn">Logout</a>
    </div>

    <div class="main-content">

       
        <p><a href="products.php" class="products-link">📦 View All Products</a></p>

        
        <form action="manage_products.php" method="POST" class="store-form">
            <input type="text" name="name" placeholder="Product Name" required>
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
                    <td>
                       
                        <form action="manage_products.php" method="POST" class="edit-form">
                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                            <input type="number" name="price" value="<?= htmlspecialchars($product['price']) ?>" required>
                            <button type="submit" name="update_product" class="edit-btn">Update</button>
                        </form>
                    </td>
                    <td>
                       
                        <form action="manage_products.php" method="POST" class="delete-form">
                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                            <button type="submit" name="delete_product" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
