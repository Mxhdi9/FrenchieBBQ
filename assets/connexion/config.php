<?php
$dsn = "mysql:host=192.168.2.114;port=8457;dbname=frenchiebbq";
$dbusername = "naw";
$dbpassword = "Apstrlp24@";

try {
    $pdo = new PDO($dsn,$dbusername,$dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("La connexion à la base de données a échoué: " . $e->getMessage());
}
?>