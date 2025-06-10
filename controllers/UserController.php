<?php
require_once 'models/User.php';

class UserController
{
    public function handleRequest()
    {
        $action = $_GET['action'] ?? 'login';

        // Protege home caso não esteja logado
        if (!isset($_SESSION['user']) && $action === 'home') {
            header("Location: ?action=login");
            exit;
        }

        switch ($action) {
            case 'login':
                $this->login();
                break;

            case 'register':
                $this->register();
                break;

            case 'home':
                $this->home();
                break;

            case 'logout':
                
                session_destroy();
                header("Location: ?action=login");
                exit;

            default:
                $this->login();
                break;
        }
    }

    private function login()
    {
        
        $message = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = new User();
            $result = $user->login($username, $password);

            if (str_starts_with($result, "Login bem-sucedido")) {
                $_SESSION['user'] = $username;
                header("Location: ?action=home");
                exit;
            } else {
                $message = $result;
            }
        }

        include 'view/login.php';
    }

    private function register()
    {
        
        $message = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = new User();
            $result = $user->cadastrar($username, $password);

            if (str_starts_with($result, "Cadastro realizado")) {
                $_SESSION['user'] = $username;
                header("Location: ?action=home");
                exit;
            } else {
                $message = $result;
            }
        }

        include 'view/register.php';
    }

    private function home()
    {
        
        if (!isset($_SESSION['user'])) {
            header("Location: ?action=login");
            exit;
        }

        include 'view/home.php';
    }
}
