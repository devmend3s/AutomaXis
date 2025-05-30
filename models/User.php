<?php
require_once 'Database.php';

class User {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function cadastrar($username, $password) {
        try {
            // Verifica se o nome de usuário já existe
            $stmt = $this->conn->prepare("SELECT id FROM user WHERE username = :username");
            $stmt->execute([':username' => $username]);
            if ($stmt->fetch()) {
                return "Usuário já existe.";
            }

            // Hash da senha
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insere no banco
            $stmt = $this->conn->prepare("INSERT INTO user (username, password) VALUES (:username, :password)");
            $stmt->execute([
                ':username' => $username,
                ':password' => $hashedPassword
            ]);
            return "Cadastro realizado com sucesso!";
        } catch (PDOException $e) {
            return "Erro ao cadastrar: " . $e->getMessage();
        }
    }

    public function login($username, $password) {
        try {
            // Busca o usuário
            $stmt = $this->conn->prepare("SELECT id, password FROM user WHERE username = :username");
            $stmt->execute([':username' => $username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                return "Login bem-sucedido! Bem-vindo, $username.";
            } else {
                return "Usuário ou senha incorretos.";
            }
        } catch (PDOException $e) {
            return "Erro no login: " . $e->getMessage();
        }
    }
}
?>
