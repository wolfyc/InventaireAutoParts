<?php

define('DB_TABLE_CategorieS', 'Categorie');
define('DB_COLUMN_ID_Categorie', 'ID_Categorie');
include_once 'db.php';
//include 'db.php'; // Assurez-vous que le chemin d'accès à db.php est correct

function updateCategorie($id, $nom) {
    $db = getDbConnection();
    $sql = "UPDATE `" . DB_TABLE_CategorieS . "` SET `Nom_Categorie` = ?WHERE `" . DB_COLUMN_ID_Categorie . "` = ?";
    $stmt = $db->prepare($sql);
    $success = $stmt->execute([$nom,$id]);

    if (!$success) {
        // Récupération des informations sur l'erreur
        $errorInfo = $stmt->errorInfo();
        return "Erreur lors de la mise à jour du Categorie: " . $errorInfo[2]; // [2] contient le message d'erreur
    }
    $db = null;
    return "Categorie mis à jour avec succès.";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        

        $result = updateCategorie($id, $nom);
        header('Location: ../../../../categorie.php'); 
    } else {
        echo "L'ID du Categorie est requis pour la mise à jour.";
    }
}
?>