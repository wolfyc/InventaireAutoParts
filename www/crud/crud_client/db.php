<?php
function getDbConnection() {
    $servername = "db"; // Name of your Docker MySQL service
    $dbname = "inventaireAutoParts"; // Nom de votre base de données
    $username = "wolfy"; // Votre nom d'utilisateur pour la base de données
    $password = "199306"; // Votre mot de passe pour la base de données

    try {
        $db = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo'Hellooo\n';
        return $db;
    } catch(PDOException $e) {
        exit("Erreur de connexion à la base de données: " . $e->getMessage());
    }
    
}
?>