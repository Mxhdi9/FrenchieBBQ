<?php
session_start();

// Vérifier si l'utilisateur a soumis le formulaire
if (!isset($_SESSION['reservation_id'])) {
    header("Location: devis.php");
    exit();
}

// Récupérer l'ID de la réservation
$reservation_id = $_SESSION['reservation_id'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/confirmation.css">
    <title>Confirmation de réservation</title>
</head>
<body>
    <div class="container">
        <h1>Confirmation de réservation</h1>
        <p>Votre demande de réservation a été soumise avec succès !</p>
        <p>Nous vous contacterons sous peu pour confirmer les détails de votre réservation.</p>
        <p>Merci pour votre confiance.</p>
        <p>Votre numéro de commande est : <strong><?php echo htmlspecialchars($reservation_id); ?></strong></p>
        <p><a href="devis.php">Retourner au formulaire de réservation</a></p>
        <p><a href="/assets/index.php">Retourner à l'accueil</a></p>
    </div>
</body>
</html>
