<?php
require_once 'Database.php';

class User {
    private $db;
    private $conn;

    public function __construct() {
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
    }

    public function register($firstname, $lastname, $email, $age, $password) {
        $sqlCheck = "SELECT firstname, email FROM users WHERE firstname = ? OR email = ?";
        $stmtCheck = $this->conn->prepare($sqlCheck);
        $stmtCheck->bind_param("ss", $firstname, $email);
        $stmtCheck->execute();
        $resultCheck = $stmtCheck->get_result();

        if ($resultCheck->num_rows > 0) {
            return "Firstname or Email already exists.";
        }

        $role = 'user';

        $sql = "INSERT INTO users (firstname, lastname, age, email, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("ssiss", $firstname, $lastname, $age, $email, $passwordHash);

        if ($stmt-> execute()) {
            return "You are registered successfully.";
        }

        return "Error during registration!";
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
    
       
        if ($user) {
            if (password_verify($password, $user["password"])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                return true;
            } else {
                return "Incorrect password"; 
            }
        } else {
            return "Username does not exist"; 
        }
    }
    

    public function __destruct() {
        $this->db->closeConnection();
    }
}
?>