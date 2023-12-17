<?php
include 'db.php'; // Include your database connection

function getAllOrders() {
    $db = getDbConnection();
    $sql = "SELECT * FROM Commande_Client";
    $stmt = $db->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$orders = getAllOrders();
echo "<body id='client-page'>";
echo "<div class='content-wrapper'>";
// HTML to display orders
echo "<h2>Liste des Commandes Clients</h2>";
echo "<table>";
echo "<tr><th>ID Commande</th><th>Date Commande</th><th>Total</th><th>ID Client</th><th>Réglé</th></tr>";
foreach ($orders as $order) {
    echo "<tr>";
    echo "<td>" . $order['ID_Commande_Client'] . "</td>";
    echo "<td>" . $order['Date_Commande'] . "</td>";
    echo "<td>" . $order['Total'] . " €</td>";
    echo "<td>" . $order['ID_Client'] . "</td>";
    echo "<td>" . ($order['reglé'] ? "Oui" : "Non") . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
