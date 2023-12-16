<?php
include_once 'db.php';
/**
 * Get all pièces from the database.
 *
 * @return array An array of pièces.
 */
function getAllPieces() {
    $db = getDbConnection();
    $stmt = $db->query("SELECT * FROM `Pièce`");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getPieceByReference($reference) {
    $db = getDbConnection();
    $stmt = $db->prepare("SELECT * FROM `Pièce` WHERE Référence = ?");
    $stmt->execute([$reference]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Piece fetched !";
}
/*
$Pieces = getAllPieces();
foreach ($Pieces as $Piece) {
    echo "Nom: " . $Piece['Nom'] . ", ID_Categorie: " . $Piece['ID_Categorie'] . ", Référence: " . $Piece['Référence'] . ", Prix_achat_TTC: " . $Piece['Prix_achat_TTC'] . ", prix_vente_TTC: " . $Piece['prix_vente_TTC']  . ", Quantité_en_stock: " . $Piece['Quantité_en_stock'] . ",Quantité_minimale" . $Piece['Quantité_minimale']. ", ID_Fournisseur :" . $Piece['ID_Fournisseur'] . ", Marque :" . $Piece['Marque'] . "<br>";
}
*/
?>
