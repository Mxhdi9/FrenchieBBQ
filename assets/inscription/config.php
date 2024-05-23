<?php
$dsn = "mysql:host=192.168.2.114;port=8457;dbname=frenchiebbq";
$dbusername = "naw";
$dbpassword = "Apstrlp24@";

try {
    $pdo = new PDO($dsn,$dbusername,$dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion à la base de données réussie.";

} catch (PDOException $e) {
    echo "La connexion à echoué : " . $e->getMessage();
}
