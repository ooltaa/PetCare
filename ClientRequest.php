<?php
require_once 'Database.php';

class ClientRequest {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getAllRequests() {
        $stmt = $this->conn->prepare("SELECT * FROM contact_requests ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRequestById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM contact_requests WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateRequest($id, $first_name, $last_name, $email, $phone, $services) {
        $stmt = $this->conn->prepare("UPDATE contact_requests SET first_name = :first_name, last_name = :last_name, email = :email, phone = :phone, services = :services WHERE id = :id");
        $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':services', $services, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteRequest($id) {
        $stmt = $this->conn->prepare("DELETE FROM contact_requests WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
 