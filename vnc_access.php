<?php
// Activer l'affichage des erreurs
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Définir une variable PHP
$service = "VNC";

// Afficher un message dynamique pour l'accès VNC
echo "<!DOCTYPE html>";
echo "<html lang='fr'>";
echo "<head><meta charset='UTF-8'><meta name='viewport' content='width=device-width, initial-scale=1.0'><title>Accès $service</title></head>";
echo "<body>";
echo "<header><h1>Accès au service $service</h1></header>";
echo "<section><p>Vous pouvez utiliser ce service pour vous connecter à un poste de travail à distance via VNC.</p></section>";
echo "<footer><p>Veillez à avoir les identifiants nécessaires pour l'accès.</p></footer>";
echo "</body></html>";
?>

