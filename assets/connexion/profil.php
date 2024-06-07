<?php
session_start();

require_once "./config.php";

// Vérifier si l'utilisateur est connecté, sinon rediriger vers la page de connexion
if (!isset($_SESSION['email'])) {
    header("Location: ./connexion.php");
    exit();
}

// Récupérer les informations de l'utilisateur depuis la session
$email = $_SESSION['email'];

// Vous pouvez récupérer d'autres informations sur l'utilisateur à partir de la session si nécessaire
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Profil</title>
  <link rel="stylesheet" href="profil.css">
</head>
<body>
  <div class="container">
    <h2>Bienvenue sur votre profil, <?php echo htmlspecialchars($email); ?>!</h2>
    <div class="profile-info">
      <p><strong>Email :</strong> <?php echo htmlspecialchars($email); ?></p>
    </div>
    <div class="buttons">
      <a href="changer_mot_de_passe.php" class="button">Accueil</a>
      <a href="deconnexion.php" class="button logout">Se déconnecter</a>
    </div>
  </div>
</body>
</html>
