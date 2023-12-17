<?php
include 'db.php'; // Include your database connection

function getOrderDetails($orderId) {
    $db = getDbConnection();
    $sql = "SELECT * FROM Détail_Commande_Client WHERE ID_Commande_Client = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$orderId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_GET['id'])) {
    $orderId = $_GET['id'];
    $orderDetails = getOrderDetails($orderId);
    echo "<body id='client-page'>";
    echo "<div class='content-wrapper'>";
    // HTML to display order details
    echo "<h2>Détails de la Commande: $orderId</h2>";
    echo "<table>";
    echo "<tr><th>ID Pièce</th><th>Quantité</th><th>Prix Unitaire</th></tr>";
    foreach ($orderDetails as $detail) {
        echo "<tr>";
        echo "<td>" . $detail['ID_Pièce'] . "</td>";
        echo "<td>" . $detail['Quantité'] . "</td>";
        echo "<td>" . $detail['Prix_Unitaire'] . " €</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
