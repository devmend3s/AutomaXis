<?php
class Appointment {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($title, $customer_id, $vehicle_id, $appointment_date, $reminder) {
        $sql = "INSERT INTO appointments (title, customer_id, vehicle_id, appointment_date, reminder)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("siiss", $title, $customer_id, $vehicle_id, $appointment_date, $reminder);
        $stmt->execute();
    }
}
?>
