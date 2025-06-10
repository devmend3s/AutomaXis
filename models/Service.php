<?php
require_once 'Database.php';

class Service {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function create($name, $description, $price) {
        try {
            $stmt = $this->conn->prepare("
                INSERT INTO service (name, description, price)
                VALUES (:name, :description, :price)
            ");

            return $stmt->execute([
                ':name' => $name,
                ':description' => $description,
                ':price' => $price
            ]);
        } catch (PDOException $e) {
            // Você pode tratar o erro conforme preferir
            return false;
        }
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM service WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM service ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function showServicesHome($limit = 2) {
        $stmt = $this->conn->prepare("SELECT name, price FROM service ORDER BY id DESC LIMIT :limit");
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
