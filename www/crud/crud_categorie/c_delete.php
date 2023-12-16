<?php
include_once 'db.php';

function deleteCategorie($id) {
    $db = getDbConnection();
    $sql = "DELETE FROM Categorie WHERE ID_Categorie = ?";
    $stmt = $db->prepare($sql);
    return $stmt->execute([$id]);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    if (deleteCategorie($id)) {
        //echo "Categorie supprimé avec succès.";
        // Redirect to the Categorie listing page or home page after deletion
        header('Location: ../../../../categorie.php'); // Adjust the redirection as needed
        exit;
    } else {
        echo "Erreur lors de la suppression du Categorie.";
    }
}