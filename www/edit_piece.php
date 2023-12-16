<?php
ob_start(); // Start output buffering
include './html/header.html';
include './crud/crud_piece/p_read.php'; // Contains getPieceByReference function
include './crud/crud_piece/p_update.php'; // Contains updatePiece function

function displayEditForm($piece) {
    echo "<h2>Modifier la Pièce</h2>";
    echo "<form  method='post'>";
    echo "<input type='hidden' name='ID_Pièce' value='" . htmlspecialchars($piece['ID_Pièce']) . "'>";
    echo "<input type='hidden' name='reference' value='" . htmlspecialchars($piece['Référence']) . "'>";
    echo "<input type='text' name='nom' value='" . htmlspecialchars($piece['Nom']) . "' required><br>";
    echo "<input type='number' name='ID_Categorie' value='" . htmlspecialchars($piece['ID_Categorie']) . "' required><br>";
    echo "<input type='number' step='0.01' name='Prix_achat_TTC' value='" . htmlspecialchars($piece['Prix_achat_TTC']) . "' required><br>";
    echo "<input type='number' step='0.01' name='prix_vente_TTC' value='" . htmlspecialchars($piece['prix_vente_TTC']) . "' required><br>";
    echo "<input type='number' name='Quantité_en_stock' value='" . htmlspecialchars($piece['Quantité_en_stock']) . "' required><br>";
    echo "<input type='number' name='Quantité_minimale' value='" . htmlspecialchars($piece['Quantité_minimale']) . "' required><br>";
    echo "<input type='text' name='ID_Fournisseur' value='" . htmlspecialchars($piece['ID_Fournisseur']) . "' required><br>";
    echo "<input type='text' name='Marque' value='" . htmlspecialchars($piece['Marque']) . "' required><br>";
    echo "<input type='submit' value='Mettre à jour'>";
    echo "</form>";
}
$piece = null;
$cameFromList = false;

// Check if reference is present in the URL (GET request)
if (isset($_GET['ref']) && !empty($_GET['ref'])) {
    $reference = $_GET['ref'];
    $piece = getPieceByReference($reference);
    $cameFromList = true;
    if ($piece){
        displayEditForm($piece);
    }else{
        echo "Nothing to display";
    }
}

// Check if form was submitted with a reference (POST request)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['input_ref'])) {
    $reference = $_POST['input_ref'];
    $piece = getPieceByReference($reference);
    $cameFromList = false;
    if ($piece){
        displayEditForm($piece);
    }else{
        echo "Nothing to display";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reference'])) {
    // Update piece
    $id = $_POST['ID_Pièce'];
    $reference = $_POST['reference'];
    $nom = $_POST['nom'];
    $idCategorie = $_POST['ID_Categorie'];
    $prixAchatTTC = $_POST['Prix_achat_TTC'];
    $prixVenteTTC = $_POST['prix_vente_TTC'];
    $quantiteEnStock = $_POST['Quantité_en_stock'];
    $quantiteMinimale = $_POST['Quantité_minimale'];
    $idFournisseur = $_POST['ID_Fournisseur'];
    $marque = $_POST['Marque'];
    if (updatePiece($id, $nom, $idCategorie, $reference, $prixAchatTTC, $prixVenteTTC, $quantiteEnStock, $quantiteMinimale, $idFournisseur, $marque)) {
       
        if ($cameFromList) {
            header('Location: ./pieces.php'); // Redirect to list_pieces.php
            exit;
        } else {
            $piece = getPieceByReference($_POST['reference']); // Reload updated piece data
        }
    } else {
        echo "<p>Erreur lors de la mise à jour de la pièce.</p>";
    }
}

// Display form for entering the piece reference
if (!$piece) {
    echo "<h2>Entrer la Référence de la Pièce pour Modifier Manually</h2>";
    echo "<form method='post'>";
    echo "<input type='text' name='input_ref' placeholder='Référence de la Pièce'>";
    echo "<input type='submit' value='Chercher Pièce'>";
    echo "</form>";
} 
/*
if (isset($_GET['ref']) && !empty($_GET['ref'])) {
    // Fetch piece for editing
    $reference = $_GET['ref'];
    $piece = getPieceByReference($reference);
    if ($piece) {
        displayEditForm($piece);
    } else {
        echo "<p>Pièce non trouvée.</p>";
    }
}
*/
include './html/footer.html';
ob_end_flush();
?>
