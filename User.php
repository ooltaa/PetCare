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

        $sql = "INSERT INTO users (firstname, lastname, age, email, password) VALUES (:firstname, :lastname, :age, :email, :password)";
        $stmt = $this->conn->prepare($sql);

        
        $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $stmt->bindParam(':age', $age, PDO::PARAM_INT);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $passwordHash, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "Regjistrimi u krye me sukses.";
        } else {
            return "Gabim gjatë regjistrimit.";
        }
    }

    public function login($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user) {
            if (password_verify($password, $user["password"])) {
                return $user; // Kthe të dhënat e user-it për përdorim në sesion
            } else {
                return false; // Fjalëkalimi nuk është i saktë
            }
        } else {
            return false; // User-i nuk ekziston
        }
    

      /*  if ($user && password_verify($password, $user["password"])) {
            session_start();
            session_regenerate_id(true);
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["role"] = $user["role"];
            return true;
        }
        return false;
    }*/
}
}

?>
