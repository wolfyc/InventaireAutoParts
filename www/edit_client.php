<?php

include './html/header.html';
include './crud/crud_client/cl_read.php'; // File that contains getClientByID function

function displayEditForm($client) {
    echo "<h2>Modifier le Client</h2>";
    echo "<form action='./crud/crud_client/cl_update.php' method='post'>";
    echo "<input type='hidden' name='id' value='" . $client['ID_Client'] . "'>";
    echo "<input type='text' name='nom' value='" . htmlspecialchars($client['Nom']) . "' required><br>";
    echo "<input type='text' name='adresse' value='" . htmlspecialchars($client['Adresse']) . "' required><br>";
    echo "<input type='text' name='telephone' value='" . htmlspecialchars($client['Téléphone']) . "' required><br>";
    echo "<input type='email' name='email' value='" . htmlspecialchars($client['Email']) . "' required><br>";
    echo "<input type='submit' name='update' value='Mettre à jour'>";
    echo "</form>";
}

$client = null;

// Check if ID is present in the URL (GET request)
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $client = getClientByID($id);
}

// Check if form was submitted with an ID (POST request)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['input_id'])) {
    $id = $_POST['input_id'];
    $client = getClientByID($id);
}

// Display form for entering the client ID if no client is fetched
if (!$client) {
    echo "<h2>Entrer l'ID du Client pour Modifier</h2>";
    echo "<form method='post'>";
    echo "<input type='text' name='input_id' placeholder='ID du Client'>";
    echo "<input type='submit' value='Chercher Client'>";
    echo "</form>";
}

// If a client is fetched, display the edit form
if ($client) {
    displayEditForm($client);
}

include './html/footer.html';
?>
