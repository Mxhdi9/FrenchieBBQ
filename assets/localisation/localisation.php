<?php
session_start();

// Vérifier si l'utilisateur est connecté, sinon rediriger vers la page de connexion
if (!isset($_SESSION['email'])) {
    header("Location: /assets/connexion/connexion.php");
    exit();
}

// Afficher les informations de l'utilisateur
$email = $_SESSION['email'];
echo "<h2>Connecté en tant que $email !</h2>";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/localisation/localisation.css">
    <link rel="stylesheet" href="/assets/css/Frenchiebbq.css">
    <link rel="stylesheet" href="/assets/css/media_query.css">
    <link href="https://fonts.googleapis.com/css2?family=Monoton&family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Localisation en Direct du Barbecue</title>
    <style>
        /* Styles pour la barre de navigation */
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
        #map {
            height: 500px; /* Hauteur de la carte */
            width: 100%; /* Largeur de la carte */
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="navbar-wrapper">
                <a href="#">
                    <img src="/assets/images/logo.png" alt="Logo de l'entreprise" width="30">
                </a>
                <ul class="navbar-nav">
                    <li><a href="/assets/index.php" class="nav-link">Accueil</a></li>
                    <li><a href="/assets/index.php#about" class="nav-link">À propos</a></li>
                    <li><a href="/assets/index.php#services" class="nav-link">Services</a></li>
                    <li><a href="/assets/index.php#menu" class="nav-link">Nos Produits</a></li>
                    <li><a href="/assets/localisation/localisation.php" class="nav-link">Localisation</a></li>
                </ul>
                <div class="navbar-btn-group">
                    <?php
                    if (isset($_SESSION['email'])) {
                        echo '<div class="dropdown">
                                <button class="profile-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">';
                        echo '</button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="/assets/connexion/profil.php">Mon Profil</a></li>
                                    <li><a class="dropdown-item" href="/assets/reservation/devis.php">Réservation</a></li>
                                    <li><a class="dropdown-item" href="/assets/connexion/deconnexion.php">Déconnexion</a></li>
                                </ul>
                              </div>';
                    } else {
                        echo '<a href="/assets/connexion/connexion.php" class="connexion-btn">Connexion</a>';
                    }
                    ?>
                    <a href="/assets/admin/connexion.php" class="admin-btn">Administrateur</a>
                </div>
            </div>
        </nav>
        <h1>Localisation en Direct du Barbecue</h1>
    </header>

    <main class="container">
        <!-- Carte de localisation -->
        <div id="map"></div>
    </main>

    <footer>
        <!-- Ajoutez ici le pied de page de votre page -->
    </footer>

    <!-- Bootstrap JS et dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Script pour Google Maps -->
    <script>
        function initMap() {
            var location = {lat: -25.344, lng: 131.036}; // Exemple de coordonnées
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: location
            });
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>
</body>
</html>
