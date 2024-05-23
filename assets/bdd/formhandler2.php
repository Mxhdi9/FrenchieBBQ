<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST["code"]; 
    $phone = $_POST["phone"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $mdp = $_POST["password"];
    
    try {
        require_once "/assets/admin/config.php";
        $query = "INSERT INTO administateur (prenom, nom, numero_de_telephone, mot_de_passe, code) VALUES (?, ?, ?, ?, ?)"; // Correction de la requête SQL
        $stmt = $pdo->prepare($query);
        $stmt->execute([$prenom, $nom, $phone, $mdp, $code]);
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