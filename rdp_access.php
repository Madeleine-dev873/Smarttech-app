<?php
// Activer l'affichage des erreurs
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Définir une variable PHP
$service = "RDP";

// Afficher un message dynamique pour l'accès RDP
echo "<!DOCTYPE html>";
echo "<html lang='fr'>";
echo "<head><meta charset='UTF-8'><meta name='viewport' content='width=device-width, initial-scale=1.0'><title>Accès $service</title></head>";
echo "<body>";
echo "<header><h1>Accès au service $service</h1></header>";
echo "<section><p>Vous pouvez utiliser RDP pour accéder à un environnement Windows à distance avec une interface graphique.</p></section>";
echo "<footer><p>Assurez-vous de disposer des identifiants d'accès et d'une connexion stable.</p></footer>";
echo "</body></html>";
?>

