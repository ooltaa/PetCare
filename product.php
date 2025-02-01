<?php
require_once 'Database.php'; 
class Product {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getAllProducts() {
        $stmt = $this->conn->prepare("SELECT id, name, price FROM products ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addProduct($name, $price) {
        $stmt = $this->conn->prepare("INSERT INTO products (name, price) VALUES (:name, :price)"); 
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateProductPrice($id, $price) {
        $stmt = $this->conn->prepare("UPDATE products SET price = :price WHERE id = :id");
        $stmt->bindParam(':price', $price, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteProduct($id) {
        $stmt = $this->conn->prepare("DELETE FROM products WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
