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
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $start_date = $_POST['start_date'] ?? '';
            $end_date = $_POST['end_date'] ?? '';

            // Validação simples (você pode expandir depois)
            if (empty($name) || empty($description)) {
                $_SESSION['message'] = "Preencha todos os campos obrigatórios.";
                include 'view/registerService.php';
                return;
            }

            // Chama o método de cadastro
            $result = $this->service->cadastrar($name, $description, $start_date, $end_date);

            // Armazena feedback na sessão
            $_SESSION['message'] = $result;

            // Redireciona para home
            header('Location: ?action=home');
            exit;
        } else {
            // Mostra o formulário se for GET
            include 'view/registerService.php';
        }
    }

    private function showHome() {
        header('Location: ?action=home');
        exit;
    }
}
