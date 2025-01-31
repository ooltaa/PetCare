<?php
require_once 'Database.php';

class User {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function register($firstname, $lastname, $age, $email, $password) {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (firstname, lastname, age, email, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssiss", $firstname, $lastname, $age, $email, $passwordHash);

        if ($stmt->execute()) {
            return "Regjistrimi u krye me sukses.";
        } else {
            return "Gabim gjatë regjistrimit.";
        }
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user["password"])) {
            session_start();
            session_regenerate_id(true);
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["role"] = $user["role"];
            return true;
        }
        return false;
    }
}
?>