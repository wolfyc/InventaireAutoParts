<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Test des Fonctions CRUD pour Categorie</title>
</head>

<body>
<h2>Test des Fonctions CRUD pour Categorie</h2>

<h3>Liste de Tous les Categories</h3>

    <?php

    include '../c_read.php'; // Assurez-vous que le che

    ?>



    <!-- Formulaire pour Créer un Categorie -->
    <h3>Créer un Categorie</h3>
    <form action="../c_create.php" method="post">
        <input type="text" name="Nom_Categorie" placeholder="Nom" required><br>
        
        <input type="submit" value="Créer Categorie">
    </form>

<h2>Supprimer un Categorie</h2>

    <form action="../c_delete.php" method="post">
        <label for="id">ID du Categorie :</label>
        <input type="text" id="id" name="ID_Categorie" required><br>
        <input type="submit" value="Supprimer">
    </form>

    <h3>Mettre à Jour un Categorie</h3>
<form action="../c_update.php" method="post"> <!-- Assurez-vous que le chemin d'accès est correct -->
    <label for="id">ID du Categorie:</label>
    <input type="text" id="id" name="id" required><br>

    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" required><br>

    <label for="adresse">Adresse:</label>
    <input type="text" id="adresse" name="adresse" required><br>

    <label for="telephone">Téléphone:</label>
    <input type="text" id="telephone" name="telephone" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <input type="submit" value="Mettre à jour">
</form>
</body>
</html>