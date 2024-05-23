<?php
// Inclusion du fichier config.php
require_once "./config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification de l'existence des clés dans le tableau $_POST
    if (isset($_POST["email"], $_POST["numero_de_telephone"], $_POST["nom"], $_POST["prenom"], $_POST["mot_de_passe"])) {
        $email = $_POST["email"]; 
        $phone = $_POST["numero_de_telephone"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $mdp = $_POST["mot_de_passe"];
        // Hacher le mot de passe avec password_hash()
        $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
        
        try {
            // Utilisation de la variable $pdo définie dans config.php
            $query = "INSERT INTO client (email, mot_de_passe, nom, prenom, numero_de_telephone) VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$email, $mdp_hash, $nom, $prenom, $phone]); // Modifier l'ordre des valeurs

            die();
        } catch (PDOException $e) {
            die("Erreur lors de l'insertion des données: " . $e->getMessage());
        }
    } else {
        die("Tous les champs du formulaire doivent être remplis.");
    }
} else {
    header("Location: ./inscription.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>m