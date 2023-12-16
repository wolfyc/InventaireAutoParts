<?php
include_once 'db.php';
function createPiece($nom, $idCategorie, $reference, $prixAchatTTC, $prixVenteTTC, $quantiteEnStock, $quantiteMinimale, $idFournisseur, $marque) {
    $db = getDbConnection();

    $stmt = $db->prepare("INSERT INTO `Pièce` (Nom, ID_Categorie, Référence, Prix_achat_TTC, prix_vente_TTC, Quantité_en_stock, Quantité_minimale, ID_Fournisseur, Marque) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    return $stmt->execute([$nom, $idCategorie, $reference, $prixAchatTTC, $prixVenteTTC, $quantiteEnStock, $quantiteMinimale, $idFournisseur, $marque]);
}

/*if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $idcategorie = $_POST['ID_Categorie'];
    $reference = $_POST['Référence'];
    $prixAchatTTC= $_POST['Prix_achat_TTC'];
    $prixVenteTTC= $_POST['prix_vente_TTC'];
    $quantiteEnStock= $_POST['Quantité_en_stock'];
    $quantiteMinimale= $_POST['Quantité_minimale'];
    $idFournisseur= $_POST['ID_Fournisseur'];
    $marque= $_POST['Marque'];
    

    if (createPiece($nom, $idcategorie, $reference, $prixAchatTTC, $prixVenteTTC, $quantiteEnStock, $quantiteMinimale, $idFournisseur, $marque)) {
        echo "Piece créé avec succès.";
    } else {
        echo "Erreur lors de la création du Piece.";
    }
    $db = null;
}*/
?>
