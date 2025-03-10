<?php
$host = "localhost";
$dbname = "smarttech";      // Nom de votre base
$username = "smarttech_user";         // Utilisateur MySQL
$password = "passer";             // Mot de passe (vide si auth_socket)

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
