<?php
include 'db.php'; // Ensure this path is correct

function createOrder($dateCommande, $total, $idClient, $regle) {
    $db = getDbConnection();
    $sql = "INSERT INTO Commande_Client (Date_Commande, Total, ID_Client, reglé) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$dateCommande, $total, $idClient, $regle]);
    return $db->lastInsertId(); // Returns the ID of the last inserted row
}

function createOrderDetail($idCommande, $idPiece, $quantite, $prixUnitaire) {
    $db = getDbConnection();
    $sql = "INSERT INTO Détail_Commande_Client (ID_Commande_Client, ID_Pièce, Quantité, Prix_Unitaire) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    return $stmt->execute([$idCommande, $idPiece, $quantite, $prixUnitaire]);
}

function updateOrderTotal($orderId, $newTotal) {
    $db = getDbConnection();
    $stmt = $db->prepare("UPDATE `Commande_Client` SET Total = ? WHERE ID_Commande_Client = ?");
    $stmt->execute([$newTotal, $orderId]);
    return $stmt->rowCount() > 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dateCommande = $_POST['dateCommande'];
    $total = $_POST['total'];
    $idClient = $_POST['idClient'];
    $regle = $_POST['regle'];
    
    // Create Order
    $idCommande = createOrder($dateCommande, $total, $idClient, $regle);

    // Assuming you have an array of items in the order
    foreach ($_POST['items'] as $item) {
        $idPiece = $item['idPiece'];
        $quantite = $item['quantite'];
        $prixUnitaire = $item['prixUnitaire'];
        createOrderDetail($idCommande, $idPiece, $quantite, $prixUnitaire);
    }

    echo "Commande ajoutée avec succès.";
}
?>
