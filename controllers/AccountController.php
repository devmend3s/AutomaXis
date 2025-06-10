<?php
require_once '../models/Database.php';
require_once '../models/Account.php';

$db = new Database();
$conn = $db->getConnection();
$account = new Account($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $account->create($_POST['description'], $_POST['amount'], $_POST['paid']);
    header("Location: ../view/registerAccount.php?success=true");
}
?>
