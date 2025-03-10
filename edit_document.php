<?php
include 'includes/header.php';
include 'config.php';
include 'includes/functions.php';

if (!isset($_GET['id'])) redirect('documents.php');

$id = (int)$_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM documents WHERE id = ?");
$stmt->execute([$id]);
$document = $stmt->fetch();

if (!$document) redirect('documents.php');

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = sanitize($_POST['title']);
    $description = sanitize($_POST['description']);
    $status = sanitize($_POST['status']);
    
    $stmt = $pdo->prepare("UPDATE documents SET title = ?, description = ?, status = ? WHERE id = ?");
    $stmt->execute([$title, $description, $status, $id]);
    redirect('documents.php');
}
?>

<div class="container mt-4">
    <h2>✏️ Modifier Document</h2>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Titre</label>
            <input type="text" name="title" class="form-control" value="<?= $document['title'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3"><?= $document['description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Statut</label>
            <select name="status" class="form-select" required>
                <option value="actif" <?= $document['status'] === 'actif' ? 'selected' : '' ?>>Actif</option>
                <option value="archivé" <?= $document['status'] === 'archivé' ? 'selected' : '' ?>>Archivé</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning">🔄 Mettre à jour</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
