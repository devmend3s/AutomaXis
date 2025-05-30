<?php
session_start();

require_once 'controllers/UserController.php';
require_once 'controllers/ServiceController.php';

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

    case 'home':
    default:
        include 'view/home.php';
        break;
}
