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
echo "<h2>Ajouter un nouveau Categorie</h2>";
echo "<form method='post'>";
echo "  <input type='text' name='nom' placeholder='Nom' required><br>";
echo "   <input type='submit' value='Créer Categorie'>";
echo "  </form>";
include './html/footer.html';

/*if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $adresse = $_POST['adresse'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];

        $result = updateCategorie($id, $nom, $adresse, $telephone, $email);
        echo $result;
    } else {
        echo "L'ID du Categorie est requis pour la mise à jour.";
    }
}*/
?>