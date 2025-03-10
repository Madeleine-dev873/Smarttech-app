<?php
include 'includes/header.php';
include 'config.php';

$stmt = $pdo->query("SELECT id, title, description, file_path, status FROM documents");
$documents = $stmt->fetchAll();
?>

<div class="container mt-4">
    <h2> Gestion des Documents</h2>
    <a href="create_documents.php" class="btn btn-success mb-3">📤 Uploader un document</a>
    
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Statut</th>
                <th>Fichier</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($documents as $document): ?>
                <tr>
                    <td><?= sanitize($document['title']) ?></td>
                    <td><?= sanitize($document['description']) ?></td>
                    <td>
                        <span class="badge <?= $document['status'] === 'actif' ? 'bg-success' : 'bg-secondary' ?>">
                            <?= $document['status'] ?>
                        </span>
                    </td>
                    <td>
                        <a href="uploads/<?= basename($document['file_path']) ?>" class="btn btn-sm btn-info" download>
                            📥 Télécharger
                        </a>
                    </td>
                    <td>
                        <a href="edit_document.php?id=<?= $document['id'] ?>" class="btn btn-sm btn-warning">✏️ Modifier</a>
                        <a href="delete_document.php?id=<?= $document['id'] ?>" class="btn btn-sm btn-danger">🗑️ Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'includes/footer.php'; ?>
