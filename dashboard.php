<?php
session_start();
require_once 'includes/db.php';
require_once 'includes/functions.php';

// Récupérer les statistiques
$stats = [
    'clients' => $pdo->query("SELECT COUNT(*) FROM clients")->fetchColumn(),
    'employes' => $pdo->query("SELECT COUNT(*) FROM employees")->fetchColumn(),
    'documents' => $pdo->query("SELECT COUNT(*) FROM documents")->fetchColumn()
];
?>

<?php include 'includes/header.php'; ?>

<div class="container mt-4">
    <div class="row">
        <!-- Carte Clients -->
        <div class="col-md-4 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>👥 Clients</h5>
                    <h1><?= $stats['clients'] ?></h1>
                    <a href="clients.php" class="text-white">Voir la liste →</a>
                </div>
            </div>
        </div>

        <!-- Carte Employés -->
        <div class="col-md-4 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>👔 Employés</h5>
                    <h1><?= $stats['employes'] ?></h1>
                    <a href="employees.php" class="text-white">Voir la liste →</a>
                </div>
            </div>
        </div>

        <!-- Carte Documents -->
        <div class="col-md-4 mb-4">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h5>📁 Documents</h5>
                    <h1><?= $stats['documents'] ?></h1>
                    <a href="documents.php" class="text-dark">Voir la liste →</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Actions Rapides -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    📤 Transfert de Fichiers
                </div>
                <div class="card-body">
                    <a href="file_transfer.php" class="btn btn-primary">
                        Accéder au transfert de fichiers
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    📧 Envoi d'Emails
                </div>
                <div class="card-body">
                    <a href="send_mail.php" class="btn btn-primary">
                        Envoyer un email
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
