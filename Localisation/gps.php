<?php
// Connexion à la base de données
$servername = "localhost";
$username = "Naw";
$password = "Apstrlp24@";
$dbname = "frenchiebbq";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Vérifier si les données sont reçues
if (isset($_GET['latitude']) && isset($_GET['longitude'])) {
    $latitude = $_GET['latitude'];
    $longitude = $_GET['longitude'];

    // Préparer et exécuter la requête SQL
    $stmt = $conn->prepare("INSERT INTO localisation (latitude, longitude) VALUES (?, ?)");
    $stmt->bind_param("dd", $latitude, $longitude);

    if ($stmt->execute()) {
        echo "Nouvelles données enregistrer";
    } else {
        echo "Erreur: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Pas de données reçues";
}

$conn->close();
?>