<?php
require_once BASE_PATH . '/config/Database.php';

class User {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function register($nombre, $email, $password) {
        $sql = "INSERT INTO usuarios (nombre, email, password, rol_id) VALUES (:nombre, :email, :password, 2)";
        $stmt = $this->conn->prepare($sql);
        
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        
        return $stmt->execute([
            ':nombre' => $nombre,
            ':email' => $email,
            ':password' => $hashedPassword
        ]);
    }

    public function findByEmail($email) {
        $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch();
    }
}