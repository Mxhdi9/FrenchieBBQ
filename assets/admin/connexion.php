<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];



    // Vérifier les informations de connexion de l'administrateur
    if ($username === "admin" && $password === "admin123") {
        // Authentification réussie, rediriger vers la page d'administration
        $_SESSION['username'] = $username;
        header("Location: ./admin.php");
        exit();
    } else {
        // Mauvaises informations de connexion, afficher un message d'erreur
        $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./connexion.css">
  <style></style>
  <title>Connexion Admin</title>
</head>
<body>

<div class="container">
  <h2>Connexion Admin</h2>
  <?php if (isset($error_message)) echo "<p class='error-message'>$error_message</p>"; ?>
  <form method="post" action="">
    <label for="username">Nom d'utilisateur :</label>
    <input type="text" name="username" id="username" required><br><br>
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" id="password" required><br><br>
    <button type="submit">Se connecter</button>
  </form>
</div>

</body>
</html>
