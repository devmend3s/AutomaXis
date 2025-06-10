<?php
require_once 'models/Service.php';

class ServiceController {
    private $service;

    public function __construct() {
        $this->service = new Service();
    }

    public function handleRequest() {
        $action = $_GET['action'] ?? '';

        switch ($action) {
            case 'registerService':
                $this->registerService();
                break;
            default:
                $this->showHome();
                break;
        }
    }

    private function registerService() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $price = trim($_POST['price'] ?? '');

            if ($name === '' || $description === '' || $price === '') {
                $_SESSION['message'] = "Preencha todos os campos obrigatórios.";
                include 'view/registerService.php';
                return;
            }

            // Aqui chamamos create (método corrigido no model)
            $success = $this->service->create($name, $description, $price);

            if ($success) {
                $_SESSION['message'] = "Serviço cadastrado com sucesso!";
            } else {
                $_SESSION['message'] = "Erro ao cadastrar serviço.";
            }

            // Redireciona para o formulário para evitar reenvio no refresh
            header('Location: ?action=registerService');
            exit;
        } else {
            include 'view/registerService.php';
        }
    }

    private function listService() {
        return $this->service->showServicesHome(2);
    }

    public function showHome() {
        $services = $this->listService();
        include 'view/home.php';
    }
}
?>
