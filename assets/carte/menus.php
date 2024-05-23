<?php
// Inclure le fichier de configuration pour la connexion à la base de données
require_once "./config.php";

// Démarrer la session en haut du script
session_start();

// Récupérer les menus depuis la base de données
try {
    // Préparer la requête SQL
    $sql = "SELECT * FROM menus";
    // Exécuter la requête
    $stmt = $pdo->query($sql);
    // Récupérer tous les résultats
    $menus = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // En cas d'erreur, afficher le message d'erreur
    echo "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./menus.css">
    <link rel="stylesheet" href="/assets/css/Frenchiebbq.css">
    <link rel="stylesheet" href="./css/media_query.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Monoton&family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Menus</title>
    <style>
        /* Ajoutez un style pour la barre de navigation */
        .navbar {
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .container {
            padding-top: 80px; /* Espace pour compenser la hauteur de la navbar */
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="navbar-wrapper">
                <a href="/assets/index.php">
                    <img src="/assets/images/logo.png" alt="Logo de l'entreprise" width="30">
                </a>
                <ul class="navbar-nav">
                    <li><a href="#home" class="nav-link">Accueil</a></li>
                    <li><a href="#about" class="nav-link">À propos</a></li>
                    <li><a href="#services" class="nav-link">Services</a></li>
                    <li><a href="#menu" class="nav-link">Nos Produits</a></li>
                    <li><a href="/assets/localisation/localisation.php" class="nav-link">Localisation</a></li>
                </ul>
                <div class="navbar-btn-group">
                    <?php
                    if (isset($_SESSION['email'])) {
                        // Si l'utilisateur est connecté, afficher la photo de profil et le menu déroulant
                        echo '<div class="dropdown">
                                <button class="profile-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">';
                        // Bouton de la photo de profil
                        // Vous pouvez récupérer la photo de profil de la base de données et l'afficher ici
                        echo '</button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="/assets/connexion/profil.php">Mon Profil</a></li>
                                    <li><a class="dropdown-item" href="/assets/reservation/devis.php">Réservation</a></li>
                                    <li><a class="dropdown-item" href="/assets/connexion/deconnexion.php">Déconnexion</a></li>
                                </ul>
                              </div>';
                    } else {
                        // Si l'utilisateur n'est pas connecté, afficher le bouton de connexion normal
                        echo '<a href="/assets/connexion/connexion.php" class="connexion-btn">Connexion</a>';
                    }
                    ?>
                    <a href="/assets/admin/connexion.php" class="admin-btn">Administrateur</a>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <h1>Menus</h1>
        <ul class="menu-list">
            <?php foreach ($menus as $menu): ?>
                <li class="menu-item">
                    <span class="menu-name"><?= htmlspecialchars($menu['menu_name']) ?></span>
                    <?php if (!empty($menu['description'])): ?>
                        <span class="menu-description"><?= htmlspecialchars($menu['description']) ?></span>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
</body>
</html>
