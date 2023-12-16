<?php include 'html/header.html'; ?>

<div class="stats-container">
    <?php
    include 'db.php';
    // Assuming you have a function to get database connection
    $db = getDbConnection();

    // Calculate Stock Purchase Value
    $purchaseQuery = "SELECT SUM(Prix_achat_TTC * Quantité_en_stock) AS totalPurchase FROM Pièce";
    $purchaseResult = $db->query($purchaseQuery);
    $purchaseValue = $purchaseResult->fetch(PDO::FETCH_ASSOC)['totalPurchase'];

    // Calculate Stock Selling Value
    $sellingQuery = "SELECT SUM(prix_vente_TTC * Quantité_en_stock) AS totalSelling FROM Pièce";
    $sellingResult = $db->query($sellingQuery);
    $sellingValue = $sellingResult->fetch(PDO::FETCH_ASSOC)['totalSelling'];

    // Display the values
    echo "<p>Total Stock Purchase Value: " . number_format($purchaseValue, 2) . "</p>";
    echo "<p>Total Stock Selling Value: " . number_format($sellingValue, 2) . "</p>";

    // Add more statistics as needed
    ?>
</div>

<?php include 'html/footer.html'; ?>
