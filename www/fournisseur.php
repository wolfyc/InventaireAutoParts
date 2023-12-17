<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include './html/header.html'; // Adjust the path as needed
//echo getcwd();
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

echo "<body id='client-page'>";
echo "<div class='content-wrapper'>";
echo "<h1>Gestion des Fournisseurs</h1>";
echo "<div class='nav-wrapper'>";
echo "  <a href='./list_fournisseur.php' class='nav-button'>Liste des Fournisseurs</a>";
echo "  <a href='./add_fournisseur.php' class='nav-button'>Ajouter un Fournisseur</a>";
echo "</div>";

include 'list_fournisseur.php';


echo "</div>"; // Close content-wrapper
echo "</body>";
include './html/footer.html'; // Adjust the path as needed
?>