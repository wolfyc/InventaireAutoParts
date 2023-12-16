<?php
include_once 'db.php';

function getAllFournisseurs() {
    $db = getDbConnection();
    $stmt = $db->query("SELECT * FROM `Fournisseur`");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getFournisseurById($id) {
    $db = getDbConnection();
    $stmt = $db->prepare("SELECT * FROM `Fournisseur` WHERE ID_Fournisseur = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
/*
$Fournisseurs = getAllFournisseurs();
foreach ($Fournisseurs as $Fournisseur) {
    echo "Nom: " . $Fournisseur['Nom'] . ", Adresse: " . $Fournisseur['Adresse'] . ", Téléphone: " . $Fournisseur['Téléphone'] . ", Email: " . $Fournisseur['Email'] . "<br>";
}
?>
*/
?>