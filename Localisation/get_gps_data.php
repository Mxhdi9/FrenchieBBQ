<?php
header('Content-Type: application/json');

// Connexion à la base de données
$servername = "localhost";
$username = "Naw";
$password = "Apstrlp24@";
$dbname = "frenchiebbq";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection échouée: " . $conn->connect_error);
}

// Requête pour récupérer les données GPS
$sql = "SELECT latitude, longitude FROM localisation";
$result = $conn->query($sql);

$localisation = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $localisation[] = $row;
    }
}

$conn->close();

echo json_encode($localisation);
?>
