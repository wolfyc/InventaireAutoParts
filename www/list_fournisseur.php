<?php
//include './html/header.html';
include './crud/crud_fournisseur/fr_read.php'; // Assuming this script fetches all fournisseurs

echo "<h2>Liste des fournisseurs</h2>";
echo "<table>";
echo "<tr><th>ID</th><th>Nom</th><th>Adresse</th><th>Téléphone</th><th>Email</th><th>Actions</th></tr>";
$fournisseurs = getAllFournisseurs();
foreach ($fournisseurs as $fournisseur) {
    echo "<tr>";
    echo "<td>" . $fournisseur['ID_Fournisseur'] . "</td>";
    echo "<td>" . $fournisseur['Nom'] . "</td>";
    echo "<td>" . $fournisseur['Adresse'] . "</td>";
    echo "<td>" . $fournisseur['Téléphone'] . "</td>";
    echo "<td>" . $fournisseur['Email'] . "</td>";
    // Repeat for other fields
    echo "<td><a href='edit_fournisseur.php?id=" . $fournisseur['ID_Fournisseur'] . "'>Edit</a> | ";
    echo "<a href='./crud/crud_fournisseur/fr_delete.php?id=" . $fournisseur['ID_Fournisseur'] . "'>Delete</a></td>";
    echo "</tr>";
}

echo "</table>";
include './html/footer.html';
?>
