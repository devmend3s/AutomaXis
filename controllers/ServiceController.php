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
            // Coleta os dados do formulário
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';

            // Validação simples
            if (empty($name) || empty($description) || empty($price)) {
                $_SESSION['message'] = "Preencha todos os campos obrigatórios.";
                include 'view/registerService.php';
                return;
            }

            // Chama o método de cadastro com os dados corretos
            $result = $this->service->register($name, $description, $price);

            // Exibe mensagem de sucesso ou erro
            $_SESSION['message'] = $result;

            // Redireciona para a home
            header('Location: ?action=home');
            exit;
        } else {
            // Exibe o formulário de cadastro se for GET
            include 'view/registerService.php';
        }
    }


    private function listService(){
        $serviceModel = new Service();
        return $serviceModel->showServicesHome(2);
    }

    public function showHome() {
        $services = $this->listService();
        include 'view/home.php'; // Agora passa os serviços para a view
    }


}
