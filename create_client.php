<?php
include 'includes/header.php';
include 'config.php';
include 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = sanitize($_POST['nom']);
    $email = sanitize($_POST['email']);
    $telephone = sanitize($_POST['telephone']);

    if (!empty($nom) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $pdo->prepare("INSERT INTO clients (nom, email, telephone) VALUES (?, ?, ?)");
        $stmt->execute([$nom, $email, $telephone]);
        redirect('clients.php');
    }
}
?>

<div class="container mt-4">
    <h2>👤 Nouveau Client</h2>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Nom complet</label>
            <input type="text" name="nom" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Téléphone</label>
            <input type="tel" name="telephone" class="form-control" pattern="[0-9]{9,14}" required>
            <small class="text-muted">Format : 778123456 (9 à 14 chiffres)</small>
        </div>
        <button type="submit" class="btn btn-primary"> Enregistrer</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
