<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Test des Fonctions CRUD pour Piece</title>
</head>

<body>
<h2>Test des Fonctions CRUD pour Piece</h2>

<h3>Liste de Tous les Pieces</h3>

    <?php

    include '../p_read.php'; // Assurez-vous que le che

    ?>



    <!-- Formulaire pour Créer un Piece -->
    <h3>Créer un Piece</h3>
    <form action="../p_create.php" method="post">
        <input type="text" name="Nom" placeholder="Nom" required><br>
        <input type="text" name="ID_Categorie" placeholder="ID_Categorie" required><br>
        <input type="text" name="Référence" placeholder="Référence" required><br>
        <input type="text" name="Prix_achat_TTC" placeholder="Prix_achat_TTC" required><br>
        <input type="text" name="prix_vente_TTC" placeholder="prix_vente_TTC" required><br>
        <input type="text" name="Quantité_en_stock" placeholder="Quantité_en_stock" required><br>
        <input type="text" name="Quantité_minimale" placeholder="Quantité_minimale" required><br>
        <input type="text" name="ID_Fournisseur" placeholder="ID_Fournisseur" required><br>
        <input type="text" name="Marque" placeholder="Marque" required><br>

        <input type="submit" value="Créer Piece">
    </form>

<h2>Supprimer un Piece</h2>

    <form action="../p_delete.php" method="post">
        <label for="id">ID du Piece :</label>
        <input type="text" id="id" name="id" required><br>
        <input type="submit" value="Supprimer">
    </form>

    <h3>Mettre à Jour un Piece</h3>
<form action="../p_update.php" method="post"> <!-- Assurez-vous que le chemin d'accès est correct -->
    <label for="id">ID du Piece:</label>
    <input type="text" id="id" name="id" required><br>
    <input type="text" name="Nom" placeholder="Nom" required><br>
        <input type="text" name="ID_Categorie" placeholder="ID_Categorie" required><br>
        <input type="text" name="Référence" placeholder="Référence" required><br>
        <input type="text" name="Prix_achat_TTC" placeholder="Prix_achat_TTC" required><br>
        <input type="text" name="prix_vente_TTC" placeholder="prix_vente_TTC" required><br>
        <input type="text" name="Quantité_en_stock" placeholder="Quantité_en_stock" required><br>
        <input type="text" name="Quantité_minimale" placeholder="Quantité_minimale" required><br>
        <input type="text" name="ID_Fournisseur" placeholder="ID_Fournisseur" required><br>
        <input type="text" name="Marque" placeholder="Marque" required><br>
    
    <input type="submit" value="Mettre à jour">
</form>
</body>
</html>