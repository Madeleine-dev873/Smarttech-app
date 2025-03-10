<?php
include 'includes/header.php';
include 'config.php';
include 'includes/functions.php';

if (!isset($_GET['id'])) redirect('index.php');

$id = (int)$_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM employees WHERE id = ?");
$stmt->execute([$id]);
$employe = $stmt->fetch();

if (!$employe) redirect('index.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = sanitize($_POST['nom']);
    $email = sanitize($_POST['email']);
    $poste = sanitize($_POST['poste']);

    if (!empty($nom) && validateEmail($email)) {
        $stmt = $pdo->prepare("UPDATE employees SET nom = ?, email = ?, poste = ? WHERE id = ?");
        $stmt->execute([$nom, $email, $poste, $id]);
        redirect('index.php');
    }
}
?>

<div class="container mt-4">
    <h2> Modifier Employé</h2>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Nom complet</label>
            <input type="text" name="nom" class="form-control" value="<?= $employe['nom'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?= $employe['email'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Poste</label>
            <input type="text" name="poste" class="form-control" value="<?= $employe['poste'] ?>" required>
        </div>
        <button type="submit" class="btn btn-warning"> Mettre à jour</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
