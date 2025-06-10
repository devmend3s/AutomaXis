<?php
require_once '../models/Database.php';
require_once '../models/Appointment.php';

$db = new Database();
$conn = $db->getConnection();
$appointment = new Appointment($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $appointment->create($_POST['title'], $_POST['customer_id'], $_POST['vehicle_id'], $_POST['appointment_date'], $_POST['reminder']);
    header("Location: ../view/registerAppointment.php?success=true");
}
?>
