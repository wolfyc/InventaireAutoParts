<?php
ob_start(); // Start output buffering
include './html/header.html';
include './crud/crud_piece/p_create.php'; // Adjust the path as needed
include './crud/crud_categorie/c_read.php'; // Assuming this file contains a function to fetch all categories
include './crud/crud_fournisseur/fr_read.php'; // Assuming this file contains a function to fetch all suppliers
$categories = getAllCategories(); // Function to fetch categories
$fournisseurs = getAllFournisseurs(); // Function to fetch fournisseurs

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $idCategorie = $_POST['ID_Categorie'];
    $reference = $_POST['Référence'];
    $prixAchatTTC = $_POST['Prix_achat_TTC'];
    $prixVenteTTC = $_POST['prix_vente_TTC'];
    $quantiteEnStock = $_POST['Quantité_en_stock'];
    $quantiteMinimale = $_POST['Quantité_minimale'];
    $idFournisseur = $_POST['ID_Fournisseur'];
    $marque = $_POST['Marque'];

    if (createPiece($nom, $idCategorie, $reference, $prixAchatTTC, $prixVenteTTC, $quantiteEnStock, $quantiteMinimale, $idFournisseur, $marque)) {
        header('Location: ./pieces.php');
    } else {
        echo "Erreur lors de la création de la pièce.";
    }
}

// Display the form
echo "<h2>Ajouter une nouvelle pièce</h2>";
echo "<form method='post'>";
echo "  <input type='text' name='nom' placeholder='Nom de la pièce' required><br>";
echo "  <select name='ID_Categorie'>";
foreach ($categories as $categorie) {
    echo "<option value='" . $categorie['ID_Categorie'] . "'>" . $categorie['Nom_Categorie'] . "</option>";
}
echo "</select><br>";
echo "  <input type='text' name='Référence' placeholder='Référence' required><br>";
echo "  <input type='number' step='0.01' name='Prix_achat_TTC' placeholder='Prix d'achat TTC' required><br>";
echo "  <input type='number' step='0.01' name='prix_vente_TTC' placeholder='Prix de vente TTC' required><br>";
echo "  <input type='number' name='Quantité_en_stock' placeholder='Quantité en stock' required><br>";
echo "  <input type='number' name='Quantité_minimale' placeholder='Quantité minimale' required><br>";
// Dropdown for fournisseurs
echo "  <select name='ID_Fournisseur'>";
foreach ($fournisseurs as $fournisseur) {
    echo "<option value='" . $fournisseur['ID_Fournisseur'] . "'>" . $fournisseur['Nom'] . "</option>";
}
echo "</select><br>";
echo "  <input type='text' name='Marque' placeholder='Marque' required><br>";
echo "  <input type='submit' value='Créer Pièce'>";
echo "</form>";

echo "<a href='add_categorie.php'>Ajouter une nouvelle catégorie</a><br>";
echo "<a href='add_fournisseur.php'>Ajouter un nouveau fournisseur</a>";

include './html/footer.html';
ob_end_flush();
?>
