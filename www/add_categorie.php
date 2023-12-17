<?php
include './html/header.html';
//include 'db.php';
include './crud/crud_categorie/c_create.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    

    if (createCategorie($nom)) {
        echo "Categorie créé avec succès.";
    } else {
        echo "Erreur lors de la création du Categorie.";
    }
    $db = null;
}

// Display the form
echo "<body id='client-page'>";
echo "<div class='content-wrapper'>";
echo "<h2>Ajouter un nouveau Categorie</h2>";
echo "<form method='post'>";
echo "  <input type='text' name='nom' placeholder='Nom' required><br>";
echo "   <input type='submit' value='Créer Categorie'>";
echo "  </form>";
echo "</div>";
echo "</body>";
include './html/footer.html';

?>