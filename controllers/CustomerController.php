<?php
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/Customer.php';

class CustomerController {
    private $customer;

    public function __construct() {
        $db = new Database();
        $conn = $db->getConnection();
        $this->customer = new Customer($conn);
    }

    public function handleRequest() {
        $method = $_SERVER['REQUEST_METHOD'];
        $action = $_GET['action'] ?? '';

        if ($action === 'registerCustomer' && $method === 'POST') {
            $this->registerCustomer();
        } elseif ($action === 'registerCustomer' && $method === 'GET') {
            $this->showRegisterForm();
        } else {
            header('Location: index.php?action=home');
            exit;
        }
    }

    private function registerCustomer() {
        $name = trim($_POST['name'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $cpf = trim($_POST['cpf'] ?? '');

        if (empty($name) || empty($cpf)) {
            $_SESSION['message'] = "Nome e CPF são obrigatórios.";
            $this->showRegisterForm();
            return;
        }

        $created = $this->customer->create($name, $phone, $email, $cpf);

        if ($created) {
            $_SESSION['message'] = "Cliente cadastrado com sucesso!";
            header("Location: index.php?action=registerCustomer");
            exit;
        } else {
            $_SESSION['message'] = "Erro ao cadastrar cliente.";
            $this->showRegisterForm();
        }
    }

    private function showRegisterForm() {
        include __DIR__ . '/../view/registerCustomer.php';
    }
}
