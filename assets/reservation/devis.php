<?php
session_start();

require_once "./config.php";

// Vérifier si l'utilisateur est connecté, sinon rediriger vers la page de connexion
if (!isset($_SESSION['email'])) {
    header("Location: /assets/connexion/connexion.php");
    exit();
}

// Afficher les informations de l'utilisateur
$email = $_SESSION['email'];
echo "<h2>Connecté en tant que $email !</h2>";


try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des informations de l'utilisateur
    $stmt = $pdo->prepare("SELECT nom, prenom, email, numero_de_telephone FROM client WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        // Si l'utilisateur est trouvé dans la base de données,
        // concaténer le nom et le prénom pour créer la variable $nom_prenom
        $nom_prenom = $user['nom'] . ' ' . $user['prenom'];
    
        // Assigner l'adresse email de l'utilisateur à la variable $email
        $email = $user['email'];
    
        // Assigner le numéro de téléphone de l'utilisateur à la variable $telephone
        $telephone = $user['numero_de_telephone'];
    } else {
        // Si l'utilisateur n'est pas trouvé, afficher un message d'erreur
        echo "Utilisateur non trouvé.";
    
        // Terminer l'exécution du script
        exit();
    }
    } catch (PDOException $e) {
        // Si une exception PDO est levée (erreur de base de données), afficher le message d'erreur
        echo "La connexion a échoué : " . $e->getMessage();
    
        // Terminer l'exécution du script
        exit();
    }
    ?>
    
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/devis.css">

    <title>Devis pour réservation de barbecue</title>
</head>
<body>
    <div class="container">
        <h1>Devis pour réservation de barbecue</h1>
        <form action="envoi_devis.php" method="post">
            <label for="name">Nom et prénom :</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($nom_prenom); ?>" readonly>

            <label for="email">Adresse email :</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" readonly>

            <label for="phone">Numéro de téléphone :</label>
            <input type="tel" id="phone" name="numero_de_telephone" value="<?php echo htmlspecialchars($telephone); ?>" readonly>

            <label for="guests">Nombre d'invités :</label>
            <input type="number" id="guests" name="guests" required>

            <label for="message">Message (besoins spécifiques, etc.) :</label>
            <textarea id="message" name="message" placeholder="Date demandée , Heure demandée , Aliments demandée ..." rows="4"></textarea>

            <input type="submit" value="Envoyer la demande">
        </form>
    </div>
</body>
</html>
