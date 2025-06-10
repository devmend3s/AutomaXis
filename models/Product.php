<?php
class Product {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($description, $stock_quantity, $purchase_price, $sale_price) {
        $sql = "INSERT INTO products (description, stock_quantity, purchase_price, sale_price)
                VALUES (:description, :stock_quantity, :purchase_price, :sale_price)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':description'     => $description,
            ':stock_quantity'  => $stock_quantity,
            ':purchase_price'  => $purchase_price,
            ':sale_price'      => $sale_price
        ]);
    }

    public function getAll() {
        $sql = "SELECT * FROM products";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
