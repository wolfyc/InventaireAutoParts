<?php
include_once 'db.php';

function deleteFournisseur($id) {
    $db = getDbConnection();
    $sql = "DELETE FROM Fournisseur WHERE ID_Fournisseur = ?";
    $stmt = $db->prepare($sql);
    return $stmt->execute([$id]);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    if (deleteFournisseur($id)) {
        //echo "Fournisseur supprimé avec succès.";
        // Redirect to the Fournisseur listing page or home page after deletion
        header('Location: ../../../../list_fournisseur.php'); // Adjust the redirection as needed
        exit;
    } else {
        echo "Erreur lors de la suppression du Fournisseur.";
    }
}