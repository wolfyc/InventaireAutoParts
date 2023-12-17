<?php

//include './html/header.html';
include './crud/crud_piece/p_read.php'; // This script should contain a function to fetch all pieces
echo "<body id='client-page'>";
echo "<div class='content-wrapper'>";
echo "<h2>Liste des Pièces</h2>";
echo "<table>";
echo "<tr><th>ID</th><th>Nom</th><th>Catégorie</th><th>Référence</th><th>Prix Achat</th><th>Prix Vente</th><th>Quantité en Stock</th><th>Marque</th><th>Actions</th></tr>";

$pieces = getAllPieces(); // Assuming this function fetches all pieces
foreach ($pieces as $piece) {
    echo "<tr>";
    echo "<td>" . $piece['ID_Pièce'] . "</td>";
    echo "<td>" . htmlspecialchars($piece['Nom']) . "</td>";
    echo "<td>" . htmlspecialchars($piece['ID_Categorie']) . "</td>"; // Assuming you want to display category ID
    echo "<td>" . htmlspecialchars($piece['Référence']) . "</td>";
    echo "<td>" . htmlspecialchars($piece['Prix_achat_TTC']) . "</td>";
    echo "<td>" . htmlspecialchars($piece['prix_vente_TTC']) . "</td>";
    echo "<td>" . htmlspecialchars($piece['Quantité_en_stock']) . "</td>";
    echo "<td>" . htmlspecialchars($piece['Marque']) . "</td>";
    echo "<td><a href='edit_piece.php?ref=" . $piece['Référence'] . "'>Edit</a> | ";
    echo "<a href='./crud/crud_piece/p_delete.php?ref=" . $piece['Référence'] . "' onclick='return confirm(\"Are you sure?\");'>Delete</a></td>";
    echo "</tr>";
}

echo "</table>";
echo "</div>"; // Close content-wrapper
echo "</body>";
include './html/footer.html';
?>
