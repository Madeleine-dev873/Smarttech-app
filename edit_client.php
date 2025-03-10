<?php
include 'includes/header.php';
include 'config.php';
include 'includes/functions.php';

if (!isset($_GET['id'])) redirect('clients.php');

$id = (int)$_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM clients WHERE id = ?");
$stmt->execute([$id]);
$client = $stmt->fetch();

if (!$client) redirect('clients.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = sanitize($_POST['nom']);
    $email = sanitize($_POST['email']);
    $telephone = sanitize($_POST['telephone']);

    if (!empty($nom) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $pdo->prepare("UPDATE clients SET nom = ?, email = ?, telephone = ? WHERE id = ?");
        $stmt->execute([$nom, $email, $telephone, $id]);
        redirect('clients.php');
    }
}
?>

<div class="container mt-4">
    <h2>✏️ Modifier Client</h2>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Nom complet</label>
            <input type="text" name="nom" class="form-control" value="<?= $client['nom'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?= $client['email'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Téléphone</label>
            <input type="tel" name="telephone" class="form-control" pattern="[0-9]{9,14}" value="<?= $client['telephone'] ?>" required>
        </div>
        <button type="submit" class="btn btn-warning"> Mettre à jour</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
