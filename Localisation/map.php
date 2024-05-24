<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte GPS</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 600px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Carte des données GPS</h1>
    <div id="map"></div>

    <!-- Inclure Leaflet.js -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        // Initialiser la carte
        var map = L.map('map').setView([48.8566, 2.3522], 13); // Coordonnées par défaut (Paris)

        // Ajouter une couche de tuiles OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Récupérer les données GPS depuis le serveur
        fetch('gps.php')
            .then(response => response.json())
            .then(data => {
                data.forEach(point => {
                    L.marker([point.latitude, point.longitude]).addTo(map)
                        .bindPopup(`Latitude: ${point.latitude}<br>Longitude: ${point.longitude}`);
                });
            })
            .catch(error => console.error('Erreur:', error));
    </script>
</body>
</html>
