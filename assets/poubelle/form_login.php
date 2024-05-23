<?php
// On inclue le fichier permettant de se connecter à la base
include "Include/db_connexion.php";

// On récupère tout le contenu de la table Tab_User
$sqlQuery = 'SELECT * FROM Tab_User';
$recipesStatement = $conn->prepare($sqlQuery);
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();

// On affiche chaque ligne une à une
foreach ($recipes as $recipe) {
?>
    <p>
        <?php echo $recipe['Nom'] . "&nbsp" . $recipe['Prenom']; ?>
    </p>
<?php
}
?>