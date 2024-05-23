<?php
session_start();

// Vérifier si l'utilisateur est connecté, sinon rediriger vers la page de connexion
if (!isset($_SESSION['email'])) {
    header("Location: ./connexion.php");
    exit();
}

// Afficher les informations de l'utilisateur
$email = $_SESSION['email'];
echo "<h2>Bienvenue, $email !</h2>";

// Ajouter ici le contenu de votre tableau de bord ou de votre page de profil
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/assets/connexion/dashboard.css">
  <title>Tableau de bord - Webleb</title>
</head>
<body>
  
  <p>Félicitations tu t'es bien connecter bg</p>
  <p><a href="deconnexion.php">Se déconnecter</a></p>
  <p><a href="profil.php">Mon profil</a></p>
  <p><a href="/assets/index.php">Accueil</a></p>
</body>
</html>
