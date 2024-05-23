<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Inscription - Webleb</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="/assets/inscription/inscription.css" rel="stylesheet">
</head>
<body>
  <div class="register-box">
    <div class="form">
      <form action="/assets/inscription/formhandler.php" method="post">
        <input type="text" name="prenom" placeholder="Prénom" required/>
        <input type="text" name="nom" placeholder="Nom" required/>
        <input type="tel" name="numero_de_telephone" placeholder="0606060606" pattern="[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}|[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}"  required/>
        <input type="text" name="email" placeholder="Adresse e-mail" required/>
        <input type="password" name="mot_de_passe" placeholder="Mot de passe" required/>
        <button type="submit">S'inscrire</button>
      </form>
      <p class="message">Déjà inscrit? <a href="/assets/connexion/connexion.php">Se connecter</a></p>
    </div>
  </div>
</body>
</html>
