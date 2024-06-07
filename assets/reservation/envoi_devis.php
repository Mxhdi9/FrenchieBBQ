<?php
session_start();

// Inclure le fichier de configuration pour la connexion à la base de données
require_once "./config.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["numero_de_telephone"];
    $guests = $_POST["guests"];
    $message = $_POST["message"];

    // Définir une valeur pour le champ 'ID_Client' (par exemple, récupérer de la session)
    $client_id = 1; // Vous devriez récupérer cette valeur dynamiquement

    // Préparer la requête SQL d'insertion en incluant le champ 'ID_Client'
    $sql = "INSERT INTO reservation (nom_prenom, email, numero_telephone, nombre_invites, message, ID_Client) VALUES (?, ?, ?, ?, ?, ?)";

    // Préparer la déclaration de la requête
    $stmt = $pdo->prepare($sql);

    // Exécuter la requête avec les données fournies
    $stmt->execute([$name, $email, $phone, $guests, $message, $client_id]);

    // Récupérer l'ID de la réservation
    $reservation_id = $pdo->lastInsertId();

    // Stocker l'ID de réservation dans la session
    $_SESSION['reservation_id'] = $reservation_id;

    // Rediriger l'utilisateur vers la page de confirmation
    header("Location: confirmation.php");
    exit();
}
?>
