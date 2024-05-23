<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"]; 
    $phone = $_POST["phone"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $mdp = $_POST["password"];
    
    try {
        require_once "/assets/connexion/config.php";
        $query = "INSERT INTO client (prenom, nom, numero_de_telephone, mot_de_passe, email) VALUES (?, ?, ?, ?, ?)"; // Correction de la requête SQL
        $stmt = $pdo->prepare($query);
        $stmt->execute([$prenom, $nom, $phone, $mdp, $email]);
        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Fail du Query: " . $e->getMessage());
    }
}  else {
    header("Location: ./inscription.php");
}
?>