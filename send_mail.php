<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $to = $_POST['to'];
   $subject = $_POST['subject'];
   $message = $_POST['message'];

   $headers = "From: postmaster@mail.smarttech.sn\r\n";
   $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

   if (mail($to, $subject, $message, $headers)) {
       echo "<div class='alert alert-success'>E-mail envoyé avec succès.</div>";
   } else {
       echo "<div class='alert alert-danger'>�^ichec de l'envoi de l'e-mail.</div>";
   }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Envoi d'e-mails</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <div class="container mt-5">
       <h1>Envoi d'e-mails</h1>
       <form method="POST">
           <div class="mb-3">
               <label for="to" class="form-label">Destinataire</label>
               <input type="email" class="form-control" id="to" name="to" required>
           </div>
<div class="mb-3">
               <label for="subject" class="form-label">Sujet</label>
               <input type="text" class="form-control" id="subject" name="subject" required>
           </div>
           <div class="mb-3">
               <label for="message" class="form-label">Message</label>
               <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
           </div>
           <button type="submit" class="btn btn-primary">Envoyer</button>
       </form>
   </div>
</body>
</html>
