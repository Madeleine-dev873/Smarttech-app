<?php
include 'includes/header.php';
include 'config.php';

$stmt = $pdo->query("SELECT id, nom, email, poste FROM employees");
$employes = $stmt->fetchAll();

?>
<h2> Liste des Employés</h2>
<a href="create_employee.php" class="btn btn-success mb-3"> Ajouter</a>

<table class="table table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Poste</th>
<th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($employes as $employe): ?>
        <tr>
            <td><?= $employe['id'] ?></td>
            <td><?= sanitize($employe['nom']) ?></td>
            <td><?= sanitize($employe['email']) ?></td>
            <td><?= sanitize($employe['poste']) ?></td>
            <td>
                <a href="edit_employee.php?id=<?= $employe['id'] ?>" class="bt>
                <a href="delete_employee.php?id=<?= $employe['id'] ?>" class=">
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php include 'includes/footer.php'; ?>
