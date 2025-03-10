<?php
// Activer l'affichage des erreurs
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Définir une variable PHP
$service = "SSH";

// Afficher un message dynamique pour l'accès SSH
echo "<!DOCTYPE html>";
echo "<html lang='fr'>";
echo "<head><meta charset='UTF-8'><meta name='viewport' content='width=device-width, initial-scale=1.0'><title>Accès $service</title></head>";
echo "<body>";
echo "<header><h1>Accès au service $service</h1></header>";
echo "<section><p>Utilisez SSH pour vous connecter en toute sécurité à un serveur distant en ligne de commande.</p></section>";
echo "<footer><p>Assurez-vous d'avoir les clés d'authentification ou le mot de passe correct.</p></footer>";
echo "</body></html>";
?>

