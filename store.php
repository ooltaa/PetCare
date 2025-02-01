<?php
session_start();
require_once 'Product.php';

$productManager = new Product();
$products = $productManager->getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <link rel="stylesheet" href="CSS/store.css">
</head>
<body>
    <div class="navbar">
        <h2>Store</h2>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

    <div class="store-container">
        <h2>Available Products</h2>
        <div class="product-list">
            <?php foreach ($products as $product): ?>
                <div class="product-item">
                    <h3><?= htmlspecialchars($product['name']) ?></h3>
                    <p>Price: $<?= htmlspecialchars($product['price']) ?></p>
                    
                    <form action="checkout.php" method="POST">
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <input type="hidden" name="product_name" value="<?= htmlspecialchars($product['name']) ?>">
                        <input type="hidden" name="product_price" value="<?= htmlspecialchars($product['price']) ?>">
                        <button type="submit" name="buy_product" class="buy-btn">Buy Now</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
