<?php
ob_start();
include 'db.php';

/**
 * Delete a pièce from the database based on its reference.
 *
 * @param string $reference The reference of the pièce to be deleted.
 *
 * @return bool True if the pièce was deleted successfully, false otherwise.
 */
function deletePieceByReference($reference) {
    $db = getDbConnection();
    $stmt = $db->prepare("DELETE FROM `Pièce` WHERE Référence = ?");
    return $stmt->execute([$reference]);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['ref'])) {
    $reference = $_GET['ref'];

    if (deletePieceByReference($reference)) {
        //echo "Pièce supprimée avec succès.";
        // Redirect after successful deletion
        header('Location: ../../pieces.php'); // Adjust the redirect location as needed
        exit;
    } else {
        echo "Erreur lors de la suppression de la pièce.";
    }
}
ob_end_flush();
?>
