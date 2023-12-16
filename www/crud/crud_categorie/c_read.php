<?php
include_once 'db.php';
/**
 * Get all clients from the database.
 *
 * @return array An array of clients.
 */
function getAllCategories() {
    $db = getDbConnection();
    $stmt = $db->query("SELECT * FROM `Categorie`");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCategorieById($id) {
    $db = getDbConnection();
    $stmt = $db->prepare("SELECT * FROM `Categorie` WHERE ID_Categorie = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
$db = null;


?>
