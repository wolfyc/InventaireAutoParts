<?php

include './html/header.html';
include './crud/crud_fournisseur/fr_read.php'; // File that contains getFournisseurByID function
echo "<body id='client-page'>";
echo "<div class='content-wrapper'>";
function displayEditForm($Fournisseur) {
    echo "<h2>Modifier le Fournisseur</h2>";
    echo "<form action='./crud/crud_fournisseur/fr_update.php' method='post'>";
    echo "<input type='hidden' name='id' value='" . $Fournisseur['ID_Fournisseur'] . "'>";
    echo "<input type='text' name='nom' value='" . htmlspecialchars($Fournisseur['Nom']) . "' required><br>";
    echo "<input type='text' name='adresse' value='" . htmlspecialchars($Fournisseur['Adresse']) . "' required><br>";
    echo "<input type='text' name='telephone' value='" . htmlspecialchars($Fournisseur['Téléphone']) . "' required><br>";
    echo "<input type='email' name='email' value='" . htmlspecialchars($Fournisseur['Email']) . "' required><br>";
    echo "<input type='submit' name='update' value='Mettre à jour'>";
    echo "</form>";
}

$Fournisseur = null;

// Check if ID is present in the URL (GET request)
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $Fournisseur = getFournisseurByID($id);
}

// Check if form was submitted with an ID (POST request)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['input_id'])) {
    $id = $_POST['input_id'];
    $Fournisseur = getFournisseurByID($id);
}

// Display form for entering the Fournisseur ID if no Fournisseur is fetched
if (!$Fournisseur) {
    echo "<h2>Entrer l'ID du Fournisseur pour Modifier</h2>";
    echo "<form method='post'>";
    echo "<input type='text' name='input_id' placeholder='ID du Fournisseur'>";
    echo "<input type='submit' value='Chercher Fournisseur'>";
    echo "</form>";
}

// If a Fournisseur is fetched, display the edit form
if ($Fournisseur) {
    displayEditForm($Fournisseur);
}
echo "</div>"; // Close content-wrapper
echo "</body>";
include './html/footer.html';
?>
