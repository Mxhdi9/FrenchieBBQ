<?php
    // Paramètres de connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "frenchiebbq";

    try 
    {
        // Connexion à la base de données avec PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
        // Définition du mode d'erreur PDO sur Exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e) 
    {
        echo "Échec de la connexion : " . $e->getMessage() . " X-) ";
    }
?>
