<?php

include 'db.php';

function createClient($nom, $adresse, $telephone, $email) {
    $db = getDbConnection();
    $sql = "INSERT INTO Client (Nom, Adresse, Téléphone, Email) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    
    return $stmt->execute([$nom, $adresse, $telephone, $email]);
    
}

//header('Location: ../../../../clients.php');