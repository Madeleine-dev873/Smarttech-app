<?php
include 'includes/header.php';
include 'config.php';
include 'includes/functions.php';

$uploadDir = 'uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = sanitize($_POST['title']);
    $description = sanitize($_POST['description']);
    $status = sanitize($_POST['status']);
    
    // Gestion du fichier
    if (isset($_FILES['document']) && $_FILES['document']['error'] === UPLOAD_ERR_OK) {
        $allowedTypes = ['application/pdf', 'application/msword', 'text/plain'];
        $fileType = $_FILES['document']['type'];
        $fileName = basename($_FILES['document']['name']);
        $filePath = $uploadDir . uniqid() . '_' . $fileName;
        
        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES['document']['tmp_name'], $filePath)) {
                $stmt = $pdo->prepare("INSERT INTO documents (title, description, file_path, status) VALUES (?, ?, ?, ?)");
                $stmt->execute([$title, $description, $filePath, $status]);
                redirect('documents.php');
            } else {
                $error = "Erreur lors de l'upload du fichier.";
            }
        } else {
            $error = "Type de fichier non autorisé (PDF, DOC, TXT uniquement).";
        }
    } else {
        $error = "Veuillez sélectionner un fichier.";
    }
}
?>

<div class="container mt-4">
    <h2>📤 Uploader un Document</h2>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Titre</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Statut</label>
            <select name="status" class="form-select" required>
                <option value="actif">Actif</option>
                <option value="archivé">Archivé</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Fichier (PDF, DOC, TXT)</label>
            <input type="file" name="document" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">💾 Enregistrer</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
