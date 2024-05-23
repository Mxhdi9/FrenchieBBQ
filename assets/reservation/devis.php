<?php
session_start();

// Vérifier si l'utilisateur est connecté, sinon rediriger vers la page de connexion
if (!isset($_SESSION['email'])) {
    header("Location: /assets/connexion/connexion.php");
    exit();
}

// Afficher les informations de l'utilisateur
$email = $_SESSION['email'];
echo "<h2>Connecter en tant que $email !</h2>";

// Ajouter ici le contenu de votre tableau de bord ou de votre page de profil
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devis pour réservation de barbecue</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Devis pour réservation de barbecue</h1>
        <form action="envoi_devis.php" method="post">
            <label for="name">Nom et prénom :</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Adresse email :</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Numéro de téléphone :</label>
            <input type="tel" name="numero_de_telephone" placeholder="0606060606" pattern="[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}|[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}"  required/>

            <label for="guests">Nombre d'invités :</label>
            <input type="number" id="guests" name="guests" required>

            <label for="message">Message (besoins spécifiques, etc.) :</label>
            <textarea id="message" name="message" placeholder="Date demandée , Heure demandée , Aliments demandée ... "rows="4"></textarea>

            <input type="submit" value="Envoyer la demande">
        </form>
    </div>
</body>
</html>
