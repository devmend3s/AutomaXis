<?php
require_once 'Database.php';

class Order {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function create($customer_id, $service_id, $vehicle_id, $description, $status) {
        try {
            $stmt = $this->conn->prepare("
                INSERT INTO orders (customer_id, service_id, vehicle_id, service_description, status) 
                VALUES (:customer_id, :service_id, :vehicle_id, :description, :status)
            ");

            return $stmt->execute([
                ':customer_id' => $customer_id,
                ':service_id' => $service_id,
                ':vehicle_id' => $vehicle_id,
                ':description' => $description,
                ':status' => $status
            ]);
        } catch (PDOException $e) {
            // Logar ou tratar erro se necessário
            return false;
        }
    }

    public function getCustomers() {
        $stmt = $this->conn->prepare("SELECT id, name FROM customers ORDER BY name");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getVehicles() {
        $stmt = $this->conn->prepare("SELECT id, model FROM vehicles ORDER BY model");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getServices() {
        $stmt = $this->conn->prepare("SELECT id, name FROM service ORDER BY name");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
