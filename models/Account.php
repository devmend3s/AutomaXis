<?php
class Account {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($description, $amount, $paid) {
        $sql = "INSERT INTO accounts (description, amount, paid) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sds", $description, $amount, $paid);
        $stmt->execute();
    }
}
?>
