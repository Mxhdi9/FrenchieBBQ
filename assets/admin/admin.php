<?php
session_start();

// Vérifier si l'utilisateur est connecté, sinon rediriger vers la page de connexion
if (!isset($_SESSION['username'])) {
    header("Location: ./connexion.php");
    exit();
}

// Inclusion du fichier config.php
require_once "config.php";

// Afficher les informations de l'utilisateur
$username = $_SESSION['username'];
echo "<h2>Bienvenue, $username !</h2>";

// Traitement de l'ajout de menu
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_menu"])) {
    // Récupérer les données du formulaire
    $menu_name = $_POST["menu_name"];
    $description = $_POST["description"];

    // Préparer la requête SQL pour ajouter un menu
    $sql = "INSERT INTO menus (menu_name, description) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$menu_name, $description]);
}

// Traitement de la suppression de menu
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_menu"])) {
    // Récupérer l'ID du menu à supprimer
    $menu_id = $_POST["menu_id"];

    // Préparer la requête SQL pour supprimer le menu
    $sql = "DELETE FROM menus WHERE menu_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$menu_id]);
}

// Traitement de la modification de la description du menu
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_description"])) {
    // Récupérer l'ID du menu et la nouvelle description
    $menu_id = $_POST["menu_id"];
    $new_description = $_POST["new_description"];

    // Préparer la requête SQL pour mettre à jour la description du menu
    $sql = "UPDATE menus SET description = ? WHERE menu_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$new_description, $menu_id]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./admin.css">
    <link rel="stylesheet" href="./client.css">

    <title>Admin Interface</title>
</head>

<body>
    
<div class="navbar">
    <a href="/assets/index.php">Accueil</a>
    <a href="./liste_reservations.php">Liste Reservations</a>
    <a href="./liste_client.php">Liste clients</a>
    <a href="./liste_temperature.php">Liste températures</a>
    <a href="./deconnexion.php" style="float: right;">Déconnexion</a>
</div>

    <h1>Interface d'administration</h1>

    <h2>Ajouter un menu</h2>
    <form action="" method="post">
        <label for="menu_name">Nom du menu :</label>
        <input type="text" id="menu_name" name="menu_name" required><br>

        <label for="description">Description :</label><br>
        <textarea id="description" name="description" rows="4" cols="50"></textarea><br>

        <input type="submit" name="add_menu" value="Ajouter">
    </form>

    <h2>Supprimer un menu</h2>
    <form action="" method="post">
        <label for="menu_id">ID du menu à supprimer :</label>
        <input type="text" id="menu_id" name="menu_id" required><br>

        <input type="submit" name="delete_menu" value="Supprimer">
    </form>

    <h2>Modifier la description d'un menu</h2>
    <form action="" method="post">
        <label for="menu_id">ID du menu :</label>
        <input type="text" id="menu_id" name="menu_id" required><br>

        <label for="new_description">Nouvelle description :</label><br>
        <textarea id="new_description" name="new_description" rows="4" cols="50"></textarea><br>

        <input type="submit" name="update_description" value="Modifier">
    </form>

</body>
</html>
