<?php
require_once 'Database.php';

class Service {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function cadastrar($name, $description, $price, $customer_id = null) {
        try {
            // Insere o serviço no banco
            $stmt = $this->conn->prepare("
                INSERT INTO service (name, description, price, customer_id)
                VALUES (:name, :description, :price, :customer_id)
            ");

            // Caso customer_id seja nulo, precisamos passar explicitamente NULL para o banco
            $customer_id = $customer_id !== null ? $customer_id : null;

            $stmt->execute([
                ':name' => $name,
                ':description' => $description,
                ':price' => $price,
                ':customer_id' => $customer_id
            ]);

            return "Serviço cadastrado com sucesso!";
        } catch (PDOException $e) {
            return "Erro ao cadastrar serviço: " . $e->getMessage();
        }
    }

    public function listarUltimos($limite = 2) {
        $stmt = $this->conn->prepare(" name, status FROM services ORDER BY id DESC LIMIT :limite");
        $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>
