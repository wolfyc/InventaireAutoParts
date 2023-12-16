<?php

define('DB_TABLE_CLIENTS', 'Client');
define('DB_COLUMN_ID_CLIENT', 'ID_Client');
include_once 'db.php';
//include 'db.php'; // Assurez-vous que le chemin d'accès à db.php est correct

function updateClient($id, $nom, $adresse, $telephone, $email) {
    $db = getDbConnection();
    $sql = "UPDATE `" . DB_TABLE_CLIENTS . "` SET `Nom` = ?, `Adresse` = ?, `Téléphone` = ?, `Email` = ? WHERE `" . DB_COLUMN_ID_CLIENT . "` = ?";
    $stmt = $db->prepare($sql);
    $success = $stmt->execute([$nom, $adresse, $telephone, $email, $id]);

    if (!$success) {
        // Récupération des informations sur l'erreur
        $errorInfo = $stmt->errorInfo();
        return "Erreur lors de la mise à jour du client: " . $errorInfo[2]; // [2] contient le message d'erreur
    }
    $db = null;
    return "Client mis à jour avec succès.";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $adresse = $_POST['adresse'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];

        $result = updateClient($id, $nom, $adresse, $telephone, $email);
        header('Location: ../../../../list_client.php'); 
    } else {
        echo "L'ID du client est requis pour la mise à jour.";
    }
}
?>
