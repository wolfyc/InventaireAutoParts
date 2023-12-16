<?php
include 'db.php';

function createFournisseur($nom, $adresse, $telephone, $email) {
    $db = getDbConnection();
    $sql = "INSERT INTO Fournisseur (Nom, Adresse, Téléphone, Email) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    return $stmt->execute([$nom, $adresse, $telephone, $email]);
}
/*
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];

    if (createFournisseur($nom, $adresse, $telephone, $email)) {
        echo "Fournisseur créé avec succès.";
    } else {
        echo "Erreur lors de la création du Fournisseur.";
    }
    $db = null;
}
*/