<?php
// Paramètres FTP
$ftp_host = "ftp.smarttech.local"; // Adresse du serveur FTP
$ftp_user = "ftpuser"; // Nom d’utilisateur FTP
$ftp_pass = "passer"; // Mot de passe FTP
$remote_dir = "/uploads/"; // Dossier distant sur le serveur FTP

// Vérifier si un fichier a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $file_tmp = $_FILES["file"]["tmp_name"];
    $file_name = $_FILES["file"]["name"];
   
    // Connexion au serveur FTP
    $ftp_conn = ftp_connect($ftp_host) or die("❌ Impossible de se connecter à $ftp_host");
    $login = ftp_login($ftp_conn, $ftp_user, $ftp_pass);
   
    if (!$login) {
        die("❌ Échec de connexion au serveur FTP !");
    }

    // Activer le mode passif (nécessaire sur certains serveurs)
    ftp_pasv($ftp_conn, true);

    // Transférer le fichier sur le serveur FTP
    if (ftp_put($ftp_conn, $remote_dir . $file_name, $file_tmp, FTP_BINARY)) {
        echo "✅ Fichier $file_name uploadé avec succès sur le serveur FTP !";
    } else {
        echo "❌ Échec de l'upload du fichier.";
    }

    // Fermer la connexion FTP
    ftp_close($ftp_conn);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfert de Fichiers FTP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Uploader un Fichier vers le Serveur FTP</h2>
    <form action="file_transfer.php" method="post" enctype="multipart/form-data">
        <label for="file">Choisir un fichier :</label>
        <input type="file" name="file" id="file" required>
        <button type="submit">Uploader</button>
    </form>
</body>
</html>


