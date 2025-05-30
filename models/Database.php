<?php
class Database {
    private $host = "localhost";
    private $dbname = "automaxis";
    private $username = "root";
    private $password = "1234";
    private $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Conexão bem-sucedida!"; // descomente para debug
        } catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
            exit;
        }
    }

    // Retorna a conexão para ser usada externamente
    public function getConnection() {
        return $this->conn;
    }
}
?>
