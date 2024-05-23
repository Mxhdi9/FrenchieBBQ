<?php
session_start();

// Vérifier si l'utilisateur est connecté, sinon rediriger vers la page de connexion
if (!isset($_SESSION['username'])) {
    header("Location: ./connexion.php");
    exit();
}

// Inclure le fichier de configuration pour la connexion à la base de données
require_once "./config.php";

// Fonction pour supprimer une réservation
function supprimerReservation($id_reservation) {
    global $pdo;
    try {
        $sql = "DELETE FROM reservation WHERE ID_Reservation = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id_reservation]);
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

// Vérifier si le formulaire de suppression a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['supprimer_reservation'])) {
    $id_reservation_a_supprimer = $_POST['id_reservation_a_supprimer'];
    supprimerReservation($id_reservation_a_supprimer);
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
    <title>Liste des Reservations</title>
</head>
<body>

<div class="navbar">
    <a href="/assets/index.php">Accueil</a>
    <a href="./admin.php">Page Admin</a>
    <a href="./liste_client.php">Liste clients</a>
    <a href="./liste_temperature.php">Liste températures</a>
    <a href="./deconnexion.php" style="float: right;">Déconnexion</a>
</div>

<h2>Liste des Reservations</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Nom et Prénom</th>
        <th>Email</th>
        <th>Numéro de téléphone</th>
        <th>Nombre d'invités</th>
        <th>Message</th>
        <th>Action</th> <!-- Nouvelle colonne pour le bouton de suppression -->
    </tr>
    <?php 
try {
    $sql = "SELECT ID_Reservation, nom_prenom, email, numero_telephone, nombre_invites, message FROM reservation";
    $result = $pdo->query($sql);

    if ($result->rowCount() > 0) {
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>". $row["ID_Reservation"] ."</td>";
            echo "<td>". $row["nom_prenom"] ."</td>";
            echo "<td>". $row["email"] ."</td>";
            echo "<td>". $row["numero_telephone"] ."</td>";
            echo "<td>". $row["nombre_invites"] ."</td>";
            echo "<td>". $row["message"] ."</td>";
            // Bouton de suppression avec un formulaire
            echo "<td>
                    <form method='post'>
                        <input type='hidden' name='id_reservation_a_supprimer' value='". $row["ID_Reservation"] ."'>
                        <input type='submit' name='supprimer_reservation' value='Supprimer'>
                    </form>
                </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>0 Résultats</td></tr>";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
</table>

</body>
</html>
