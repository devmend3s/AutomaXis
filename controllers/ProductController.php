<?php
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/Product.php';

class ProductController {
    private $product;

    public function __construct() {
        $db = new Database();
        $conn = $db->getConnection();
        $this->product = new Product($conn);
    }

    public function handleRequest() {
        $method = $_SERVER['REQUEST_METHOD'];
        $action = $_GET['action'] ?? '';

        if ($action === 'registerProduct' && $method === 'POST') {
            $this->registerProduct();
        } elseif ($action === 'registerProduct' && $method === 'GET') {
            $this->showRegisterForm();
        } else {
            header('Location: index.php?action=home');
            exit;
        }
    }

    private function registerProduct() {
        $description     = $_POST['description'] ?? '';
        $stock_quantity  = $_POST['stock_quantity'] ?? 0;
        $purchase_price  = $_POST['purchase_price'] ?? 0.0;
        $sale_price      = $_POST['sale_price'] ?? 0.0;

        if (empty($description)) {
            $_SESSION['message'] = "Descrição é obrigatória.";
            $this->showRegisterForm();
            return;
        }

        $created = $this->product->create($description, $stock_quantity, $purchase_price, $sale_price);

        if ($created) {
            $_SESSION['message'] = "Produto cadastrado com sucesso!";
            header("Location: index.php?action=registerProduct");
            exit;
        } else {
            $_SESSION['message'] = "Erro ao cadastrar produto.";
            $this->showRegisterForm();
        }
    }

    private function showRegisterForm() {
        include __DIR__ . '/../view/registerProduct.php';
    }
}
