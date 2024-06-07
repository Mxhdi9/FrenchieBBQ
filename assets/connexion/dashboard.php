<?php
session_start();

// Vérifier si l'utilisateur est connecté, sinon rediriger vers la page de connexion
if (!isset($_SESSION['email'])) {
    header("Location: ./connexion.php");
    exit();
}

// Afficher les informations de l'utilisateur
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/assets/connexion/dashboard.css">
  <title>Tableau de bord - Webleb</title>
</head>
<body>
  <div class="container">
    <h2>Bienvenue, <?php echo htmlspecialchars($email); ?> !</h2>
    <p>Félicitations tu t'es bien connecté(e)</p>
    <div class="button-container">
      <a class="button" href="profil.php">Mon profil</a>
      <a class="button" href="/assets/index.php">Accueil</a>
      <a class="button" href="deconnexion.php">Se déconnecter</a>
    </div>
  </div>
</body>
</html>
