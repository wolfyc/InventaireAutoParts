
<?php

define('DB_TABLE_PieceS', 'Pièce');
define('DB_COLUMN_ID_Piece', 'ID_Pièce');

include_once 'db.php'; // Assurez-vous que le chemin d'accès à db.php est correct

function updatePiece($id, $nom, $idcategorie, $reference, $prixAchatTTC, $prixVenteTTC, $quantiteEnStock, $quantiteMinimale, $idFournisseur, $marque) {
    $db = getDbConnection();
    $sql = "UPDATE `" . DB_TABLE_PieceS . "` SET `Nom` = ?, `ID_Categorie` = ?, `Référence` = ?, `Prix_achat_TTC` = ?, `prix_vente_TTC` = ?, `Quantité_en_stock` = ?, `Quantité_minimale` = ?, `ID_Fournisseur` = ?, `Marque` = ? WHERE `" . DB_COLUMN_ID_Piece . "` = ?";
    $stmt = $db->prepare($sql);
    $success = $stmt->execute([$nom, $idcategorie, $reference, $prixAchatTTC, $prixVenteTTC, $quantiteEnStock, $quantiteMinimale, $idFournisseur, $marque, $id]);

    if (!$success) {
        // Récupération des informations sur l'erreur
        $errorInfo = $stmt->errorInfo();
        return "Erreur lors de la mise à jour du Piece: " . $errorInfo[2]; // [2] contient le message d'erreur
    }

    return "Piece mis à jour avec succès.";
}
/*
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        $nom = $_POST['Nom'];
        $idcategorie = $_POST['ID_Categorie'];
        $reference = $_POST['Référence'];
        $prixAchatTTC= $_POST['Prix_achat_TTC'];
        $prixVenteTTC= $_POST['prix_vente_TTC'];
        $quantiteEnStock= $_POST['Quantité_en_stock'];
        $quantiteMinimale= $_POST['Quantité_minimale'];
        $idFournisseur= $_POST['ID_Fournisseur'];
        $marque= $_POST['Marque'];

        $result = updatePiece($id, $nom, $idcategorie, $reference, $prixAchatTTC, $prixVenteTTC, $quantiteEnStock, $quantiteMinimale, $idFournisseur, $marque);
        echo $result;
    } else {
        echo "L'ID du Piece est requis pour la mise à jour.";
    }
}
*/
?>