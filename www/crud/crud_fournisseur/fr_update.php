<?php
include_once 'db.php';
define('DB_TABLE_FournisseurS', 'Fournisseur');
define('DB_COLUMN_ID_Fournisseur', 'ID_Fournisseur');

//include 'db.php'; // Assurez-vous que le chemin d'accès à db.php est correct

function updateFournisseur($id, $nom, $adresse, $telephone, $email) {
    $db = getDbConnection();
    $sql = "UPDATE `" . DB_TABLE_FournisseurS . "` SET `Nom` = ?, `Adresse` = ?, `Téléphone` = ?, `Email` = ? WHERE `" . DB_COLUMN_ID_Fournisseur . "` = ?";
    $stmt = $db->prepare($sql);
    $success = $stmt->execute([$nom, $adresse, $telephone, $email, $id]);

    if (!$success) {
        // Récupération des informations sur l'erreur
        $errorInfo = $stmt->errorInfo();
        return "Erreur lors de la mise à jour du Fournisseur: " . $errorInfo[2]; // [2] contient le message d'erreur
    }
    $db = null;
    return "Fournisseur mis à jour avec succès.";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $adresse = $_POST['adresse'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];

        $result = updateFournisseur($id, $nom, $adresse, $telephone, $email);
        header('Location: ../../../../list_fournisseur.php'); 
    } else {
        echo "L'ID du Fournisseur est requis pour la mise à jour.";
    }
}
?>
