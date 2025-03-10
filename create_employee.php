<?php
include 'includes/header.php';
$host = 'localhost';
$dbname = 'smarttech';
$user = 'smarttech_user';
$pass = 'passer';

try {
   $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $pdo->query("SELECT * FROM employees");
   $employes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
   die("Erreur de connexion : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Liste des Employés</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <div class="container mt-5">
       <h1 class="text-center">Liste des Employés</h1>
<a href="create_employee.php" class="btn btn-success mb-3">Ajouter un Employé</a>
       <table class="table table-dark table-hover">
           <thead>
               <tr>
                   <th>ID</th>
                   <th>Nom</th>
                   <th>Email</th>
                   <th>Poste</th>
                   <th>Actions</th>
               </tr>
           </thead>
           <tbody>
               <?php foreach ($employes as $employe) : ?>
                   <tr>
                       <td><?= $employe['id'] ?></td>
                       <td><?= $employe['nom'] ?></td>
                       <td><?= $employe['email'] ?></td>
                       <td><?= $employe['poste'] ?></td>
                       <td>
                           <a href="edit_employee.php?id=<?= $employe['id'] ?>" class="btn btn-warning">Modifier</a>
                           <a href="delete_employee.php?id=<?= $employe['id'] ?>" class="btn btn-danger">Supprimer</a>                      </td>
                   </tr>
               <?php endforeach; ?>
           </tbody>
       </table>
   </div>
</body>
</html>

