<?php
include_once 'db.php';

function deleteClient($id) {
    $db = getDbConnection();
    $sql = "DELETE FROM Client WHERE ID_Client = ?";
    $stmt = $db->prepare($sql);
    return $stmt->execute([$id]);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    if (deleteClient($id)) {
        //echo "Client supprimé avec succès.";
        // Redirect to the client listing page or home page after deletion
        header('Location: ../../../../clients.php'); // Adjust the redirection as needed
        exit;
    } else {
        echo "Erreur lors de la suppression du client.";
    }
}
