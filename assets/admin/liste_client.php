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

// Ajouter ici le contenu de votre tableau de bord ou de votre page de profil
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./client.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Clients</title>
</head>
<body>

<div class="navbar">
    <a href="/assets/index.php">Accueil</a>
    <a href="./admin.php">Page Admin</a>
    <a href="./liste_reservations.php">Reservations</a>
    <a href="./liste_temperature.php">Liste températures</a>
    <a href="./deconnexion.php" style="float: right;">Déconnexion</a>
</div>

<h2>Liste des Clients</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Numéro de téléphone</th>
        <th>Email</th>
    </tr>
    <?php 
try {
    $dsn = "mysql:host=192.168.2.114;port=8457;dbname=frenchiebbq";
    $dbusername = "naw";
    $dbpassword = "Apstrlp24@";
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT ID_Client, prenom, nom, numero_de_telephone, mot_de_passe, email FROM client";
    $result = $pdo->query($sql);

    if ($result->rowCount() > 0) {
        foreach ($result as $row) {
            echo "<tr><td>". $row["ID_Client"] ."</td><td>". $row["prenom"] ."</td><td>". $row["nom"] ."</td><td>". $row["numero_de_telephone"] ."</td><td>". $row["email"] ."</td></tr>";
        }
    } else {
        echo "<tr><td colspan='5'>0 Résultats</td></tr>";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
</table>

</body>
</html>
