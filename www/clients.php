<?php

$current_page = basename($_SERVER['PHP_SELF']);

error_reporting(E_ALL);
ini_set('display_errors', 1);
include './html/header.html'; // Adjust the path as needed
//echo getcwd();
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

echo "<body id='client-page'>";
echo "<div class='content-wrapper'>";
echo "<h1>Gestion des Clients</h1>";
echo "<div class='nav-wrapper'>";
echo "  <a href='./list_client.php' class='nav-button'>Liste des Clients</a>";
echo "  <a href='./add_client.php' class='nav-button'>Ajouter un Client</a>";
echo "</div>";

include 'list_client.php';


echo "</div>"; // Close content-wrapper
echo "</body>";
include './html/footer.html'; // Adjust the path as needed
?>
