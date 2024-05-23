<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        require_once "./config.php";

        // Vérifier les informations de connexion dans la base de données
        $query = "SELECT * FROM client WHERE email = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email]);
        $row = $stmt->fetch();

        if ($row && password_verify($password, $row['mot_de_passe'])) {
            // Authentification réussie, rediriger vers la page de profil par exemple
            $_SESSION['email'] = $email;
            header("Location: /assets/connexion/dashboard.php");
            exit();
        } else {
            // Mauvaises informations de connexion, afficher un message d'erreur
            $error_message = "Email ou mot de passe incorrect.";
        }
    } catch (PDOException $e) {
        die("Fail du Query: " . $e->getMessage());
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  
<meta charset="UTF-8">
<link rel="stylesheet" href="/assets/connexion/connexion.css">


  <title>Connexion - Webleb</title>
  
</head>
<body>
<div class="container">
  <h2>Connexion</h2>
  <?php if (isset($error_message)) echo "<p class='error-message'>$error_message</p>"; ?>
  <form method="post" action="">
    <label for="email">Adresse e-mail :</label>
    <input type="text" name="email" id="email" required><br><br>
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" id="password" required><br><br>
    <button type="submit">Se connecter</button>
  </form>
  <p>Pas encore inscrit ? <a href="/assets/inscription/inscription.php">Inscrivez-vous ici</a></p>
</div>

</body>
</html>
