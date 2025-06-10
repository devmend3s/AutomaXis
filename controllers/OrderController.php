<?php
require_once 'models/Order.php';

class OrderController {
    private $orderModel;

    public function __construct() {
        $this->orderModel = new Order();
    }

    public function handleRequest() {
        // Verificação de autenticação
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?action=login');
            exit;
        }

        $action = $_GET['action'] ?? '';

        if ($action === 'registerOrder') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->registerOrder();
            } else {
                $this->showForm();
            }
        } else {
            $this->showForm();
        }
    }

    private function showForm() {
        $customers = $this->orderModel->getCustomers();
        $vehicles = $this->orderModel->getVehicles();
        $services = $this->orderModel->getServices();

        include __DIR__ . '/../view/registerOrder.php';
    }

    private function registerOrder() {
        // Obter os IDs enviados pelo formulário
        $customer_id = $_POST['customer_id'] ?? null;
        $service_id = $_POST['service_id'] ?? null;
        $vehicle_id = $_POST['vehicle_id'] ?? null;

        // Também pegar os nomes/descrições (para casos onde não tem cadastro)
        $customer_name = trim($_POST['customer_name'] ?? '');
        $vehicle_model = trim($_POST['vehicle_model'] ?? '');
        $service_name = trim($_POST['service_name'] ?? '');

        $service_description = trim($_POST['service_description'] ?? '');
        $status = 'Aberto';

        // Validação simples: deve ter ao menos cliente, veículo e serviço (id ou nome)
        $hasCustomer = $customer_id || $customer_name !== '';
        $hasVehicle = $vehicle_id || $vehicle_model !== '';
        $hasService = $service_id || $service_name !== '';

        if ($hasCustomer && $hasVehicle && $hasService) {
            // Se algum ID estiver vazio, podemos inserir NULL ou 0 no banco para ids que não existem
            // Aqui você pode adaptar para salvar novos clientes/veículos/serviços, se quiser.

            $this->orderModel->create(
                $customer_id ?: null,
                $service_id ?: null,
                $vehicle_id ?: null,
                $service_description,
                $status
            );
        } else {
            // Poderia redirecionar de volta ao form com erro, aqui só exibe mensagem simples
            echo "<p>Erro: Preencha cliente, veículo e serviço (se cadastrados ou nome manual).</p>";
            return;
        }

        // Preparar dados para exibir na página de confirmação / gerar PDF no frontend
        $orderData = [
            'customer_name' => $customer_name !== '' ? $customer_name : 'Cliente não cadastrado',
            'vehicle_model' => $vehicle_model !== '' ? $vehicle_model : 'Veículo não cadastrado',
            'service_name' => $service_name !== '' ? $service_name : 'Serviço não cadastrado',
            'service_description' => $service_description,
            'status' => $status
        ];

        // Incluir view de confirmação
        include __DIR__ . '/../view/orderConfirmation.php';
    }
}
