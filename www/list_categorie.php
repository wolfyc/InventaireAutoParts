<?php
//include './html/header.html';
include './crud/crud_categorie/c_read.php'; // Assuming this script fetches all Categories

echo "<h2>Liste des Categories</h2>";
echo "<table>";
echo "<tr><th>ID</th><th>Nom</th><th>Actions</th></tr>";
$Categories = getAllCategories();
foreach ($Categories as $Categorie) {
    echo "<tr>";
    echo "<td>" . $Categorie['ID_Categorie'] . "</td>";
    echo "<td>" . $Categorie['Nom_Categorie'] . "</td>";
 
    // Repeat for other fields
    echo "<td><a href='edit_categorie.php?id=" . $Categorie['ID_Categorie'] . "'>Edit</a> | ";
    echo "<a href='./crud/crud_categorie/c_delete.php?id=" . $Categorie['ID_Categorie'] . "'>Delete</a></td>";
    echo "</tr>";
}

echo "</table>";
include './html/footer.html';
?>
