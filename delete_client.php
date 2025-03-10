<?php
include 'config.php';
include 'includes/functions.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM clients WHERE id = ?");
    $stmt->execute([$id]);
}

redirect('clients.php');
?>
