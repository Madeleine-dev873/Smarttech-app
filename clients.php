<?php
include 'includes/header.php';
include 'config.php';

$stmt = $pdo->query("SELECT id, nom, email, telephone FROM clients");
$clients = $stmt->fetchAll();
?>

<div class="container mt-4">
    <h2> Liste des Clients</h2>
    <a href="create_client.php" class="btn btn-success mb-3"> Ajouter</a>
    
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?= $client['id'] ?></td>
                    <td><?= sanitize($client['nom']) ?></td>
                    <td><?= sanitize($client['email']) ?></td>
                    <td><?= sanitize($client['telephone']) ?></td>
                    <td>
                        <a href="edit_client.php?id=<?= $client['id'] ?>" class="btn btn-sm btn-warning">✏️ Modifier</a>
                        <a href="delete_client.php?id=<?= $client['id'] ?>" class="btn btn-sm btn-danger">🗑️ Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'includes/footer.php'; ?>
