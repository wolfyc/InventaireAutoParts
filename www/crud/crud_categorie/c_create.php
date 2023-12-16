<?php
include 'db.php';
function createCategorie($nomCategorie) {
    $db = getDbConnection();

    $stmt = $db->prepare("INSERT INTO `Categorie` (Nom_Categorie) VALUES (?)");
    return $stmt->execute([$nomCategorie]);
}

?>
