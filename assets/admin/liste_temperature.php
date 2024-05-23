<?php
session_start();

// Vérifier si l'utilisateur est connecté, sinon rediriger vers la page de connexion
if (!isset($_SESSION['username'])) {
    header("Location: ./connexion.php");
    exit();
}

// Afficher les informations de l'utilisateur
$username = $_SESSION['username'];
echo "<h2>Bienvenue, $username !</h2>";

// Génération de données aléatoires pour le tableau
$devices = [
    ["device_name" => "Four 1", "device_type" => "Four", "temperature" => rand(180, 250), "timestamp" => date("Y-m-d H:i:s")],
    ["device_name" => "Frigo 1", "device_type" => "Frigo", "temperature" => rand(0, 5), "timestamp" => date("Y-m-d H:i:s")],
    ["device_name" => "Four 2", "device_type" => "Four", "temperature" => rand(180, 250), "timestamp" => date("Y-m-d H:i:s")],
    ["device_name" => "Frigo 2", "device_type" => "Frigo", "temperature" => rand(0, 5), "timestamp" => date("Y-m-d H:i:s")],
    ["device_name" => "Four 3", "device_type" => "Four", "temperature" => rand(180, 250), "timestamp" => date("Y-m-d H:i:s")],
    ["device_name" => "Frigo 3", "device_type" => "Frigo", "temperature" => rand(0, 5), "timestamp" => date("Y-m-d H:i:s")],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./admin.css">
    <link rel="stylesheet" href="./client.css">

    <title>Admin Interface - Températures</title>
</head>

<body>
<div class="navbar">
    <a href="/assets/index.php">Accueil</a>
    <a href="./liste_reservations.php">Liste Reservations</a>
    <a href="./liste_client.php">Liste clients</a>
    <a href="./deconnexion.php" style="float: right;">Déconnexion</a>
</div>

<h1>Interface d'administration - Températures</h1>

<table>
    <thead>
        <tr>
            <th>Nom de l'appareil</th>
            <th>Type</th>
            <th>Température (°C)</th>
            <th>Date et Heure</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($devices as $device) : ?>
            <tr>
                <td><?php echo htmlspecialchars($device['device_name']); ?></td>
                <td><?php echo htmlspecialchars($device['device_type']); ?></td>
                <td><?php echo htmlspecialchars($device['temperature']); ?></td>
                <td><?php echo htmlspecialchars($device['timestamp']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
