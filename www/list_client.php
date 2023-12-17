<?php
//include './html/header.html';
include './crud/crud_client/cl_read.php'; // Assuming this script fetches all clients
echo "<body id='client-page'>";
echo "<div class='content-wrapper'>";
echo "<h2>Liste des Clients</h2>";
echo "<table>";
echo "<tr><th>ID</th><th>Nom</th><th>Adresse</th><th>Téléphone</th><th>Email</th><th>Actions</th></tr>";
$clients = getAllClients();
foreach ($clients as $client) {
    echo "<tr>";
    echo "<td>" . $client['ID_Client'] . "</td>";
    echo "<td>" . $client['Nom'] . "</td>";
    echo "<td>" . $client['Adresse'] . "</td>";
    echo "<td>" . $client['Téléphone'] . "</td>";
    echo "<td>" . $client['Email'] . "</td>";
    // Repeat for other fields
    echo "<td><a href='edit_client.php?id=" . $client['ID_Client'] . "'>Edit</a> | ";
    echo "<a href='./crud/crud_client/cl_delete.php?id=" . $client['ID_Client'] . "'>Delete</a></td>";
    echo "</tr>";
}

echo "</table>";
echo "</div>"; // Close content-wrapper
echo "</body>";
include './html/footer.html';
?>
