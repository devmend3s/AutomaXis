<?php

require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/Vehicle.php';
require_once __DIR__ . '/../models/Customer.php';

class VehicleController {
    private $vehicle;
    private $customer;

    public function __construct() {
        $db = new Database();
        $conn = $db->getConnection();

        $this->vehicle = new Vehicle($conn);
        $this->customer = new Customer($conn);
    }

    public function handleRequest() {
        $method = $_SERVER['REQUEST_METHOD'];
        $action = $_GET['action'] ?? '';

        if ($action === 'registerVehicle' && $method === 'POST') {
            $this->registerVehicle();
        } elseif ($action === 'registerVehicle' && $method === 'GET') {
            $this->showRegisterForm();
        } else {
            header('Location: index.php?action=home');
            exit;
        }
    }

    private function registerVehicle() {
        $model = $_POST['model'] ?? '';
        $plate = $_POST['plate'] ?? '';
        $year = $_POST['year'] ?? '';
        $customer_id = $_POST['customer_id'] ?? null;

        if (empty($model) || empty($plate) || empty($year)) {
            $_SESSION['message'] = "Por favor, preencha os campos obrigatórios (modelo, placa e ano).";
            $this->showRegisterForm();
            return;
        }

        if ($customer_id === '') {
            $customer_id = null;
        }

        $created = $this->vehicle->create($model, $plate, (int)$year, $customer_id);

        if ($created) {
            $_SESSION['message'] = "Veículo cadastrado com sucesso!";
            header("Location: index.php?action=registerVehicle");
            exit;
        } else {
            $_SESSION['message'] = "Erro ao cadastrar veículo.";
            $this->showRegisterForm();
        }
    }

    private function showRegisterForm() {
        $customers = $this->customer->getAll();
        include __DIR__ . '/../view/registerVehicle.php';
    }
}
