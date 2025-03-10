<?php
include 'config.php';
include 'includes/functions.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    // Récupérer le chemin du fichier
    $stmt = $pdo->prepare("SELECT file_path FROM documents WHERE id = ?");
    $stmt->execute([$id]);
    $document = $stmt->fetch();
    
    if ($document) {
        // Supprimer le fichier
        if (file_exists($document['file_path'])) {
            unlink($document['file_path']);
        }
        
        // Supprimer l'entrée en BDD
        $stmt = $pdo->prepare("DELETE FROM documents WHERE id = ?");
        $stmt->execute([$id]);
    }
}

redirect('documents.php');
?>
