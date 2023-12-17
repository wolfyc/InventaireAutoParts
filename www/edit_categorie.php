<?php

include './html/header.html';
include './crud/crud_categorie/c_read.php'; // File that contains getCategorieByID function
echo "<body id='client-page'>";
echo "<div class='content-wrapper'>";

function displayEditForm($Categorie) {
    echo "<h2>Modifier le Categorie</h2>";
    echo "<form action='./crud/crud_categorie/c_update.php' method='post'>";
    echo "<input type='hidden' name='id' value='" . $Categorie['ID_Categorie'] . "'>";
    echo "<input type='text' name='nom' value='" . htmlspecialchars($Categorie['Nom_Categorie']) . "' required><br>";
    
    echo "<input type='submit' name='update' value='Mettre à jour'>";
    echo "</form>";
}

$Categorie = null;

// Check if ID is present in the URL (GET request)
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $Categorie = getCategorieByID($id);
}

// Check if form was submitted with an ID (POST request)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['input_id'])) {
    $id = $_POST['input_id'];
    $Categorie = getCategorieByID($id);
}

// Display form for entering the Categorie ID if no Categorie is fetched
if (!$Categorie) {
    echo "<h2>Entrer l'ID du Categorie pour Modifier</h2>";
    echo "<form method='post'>";
    echo "<input type='text' name='input_id' placeholder='ID du Categorie'>";
    echo "<input type='submit' value='Chercher Categorie'>";
    echo "</form>";
}

// If a Categorie is fetched, display the edit form
if ($Categorie) {
    displayEditForm($Categorie);
}
echo "</div>"; // Close content-wrapper
echo "</body>";
include './html/footer.html';
?>
