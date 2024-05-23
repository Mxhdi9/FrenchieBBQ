<?php
session_start();

// Vérifier si l'utilisateur est connecté, sinon rediriger vers la page de connexion
if (!isset($_SESSION['email'])) {
    header("Location: ./connexion.php");
    exit();
}

// Récupérer les informations de l'utilisateur depuis la session
$email = $_SESSION['email'];

// Vous pouvez récupérer d'autres informations sur l'utilisateur à partir de la base de données si nécessaire

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profil</title>
</head>
<body>
  <h2>Bienvenue sur votre profil, <?php echo $email; ?> !</h2>
  <!-- Affichez ici d'autres informations sur l'utilisateur si nécessaire -->
  <p><a href="deconnexion.php">Se déconnecter</a></p>
</body>
</html>
