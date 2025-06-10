<?php
session_start();

// require_once 'models/Database.php';
require_once 'controllers/UserController.php';
require_once 'controllers/ServiceController.php';
require_once 'controllers/VehicleController.php';
require_once 'controllers/CustomerController.php';
require_once 'controllers/ProductController.php';
require_once 'controllers/OrderController.php';

// // Instancia o Database e pega a conexão
// $db = new Database();
// $conn = $db->getConnection();

$action = $_GET['action'] ?? 'home';

switch ($action) {
    case 'login':
    case 'logout':
    case 'register':
        $controller = new UserController();
        $controller->handleRequest();
        break;

    case 'registerService':
        $controller = new ServiceController();
        $controller->handleRequest();
        break;

    case 'registerVehicle':
        $controller = new VehicleController();
        $controller->handleRequest();
        break;

    case 'registerCustomer':
        $controller = new CustomerController();
        $controller->handleRequest();
        break;

    case 'registerProduct':
        $controller = new ProductController();
        $controller->handleRequest();
        break;

    case 'registerOrder':
        $controller = new OrderController();
        $controller->handleRequest();
        break;

    case 'home':
    default:
        $controller = new ServiceController();
        $controller->showHome();
        break;
}
