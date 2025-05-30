<?php
require_once 'Database.php';

class Service {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function register($name, $description, $price) {
        try {
            $stmt = $this->conn->prepare("
                INSERT INTO service (name, description, price)
                VALUES (:name, :description, :price)
            ");

            $stmt->execute([
                ':name' => $name,
                ':description' => $description,
                ':price' => $price
            ]);

            return "Serviço cadastrado com sucesso!";
        } catch (PDOException $e) {
            return "Erro ao cadastrar serviço: " . $e->getMessage();
        }
    }


    public function showServicesHome($limit = 2) {
        $stmt = $this->conn->prepare("SELECT name, price FROM service ORDER BY id DESC LIMIT :limit");
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>
