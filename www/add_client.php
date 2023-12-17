<?php
ob_start(); // Start output buffering
include './html/header.html';
//include 'db.php';
include './crud/crud_client/cl_create.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];

    if (createClient($nom, $adresse, $telephone, $email)) {
        header('Location: ./clients.php');
        
    } else {
        echo "Erreur lors de la création du client.";
    }
    $db = null;
}

// Display the form
echo "<body id='client-page'>";
echo "<div class='content-wrapper'>";
echo "<h2>Ajouter un nouveau client</h2>";
echo "<form method='post'>";
echo "  <input type='text' name='nom' placeholder='Nom' required><br>";
echo " <input type='text' name='adresse' placeholder='Adresse' required><br>";
echo "  <input type='text' name='telephone' placeholder='Téléphone' required><br>";
echo "  <input type='email' name='email' placeholder='Email' required><br>";
echo "   <input type='submit' value='Créer Client'>";
echo "  </form>";
echo "</div>"; // Close content-wrapper
echo "</body>";
include './html/footer.html';
ob_end_flush();
?>