<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Test des Fonctions CRUD pour Client</title>
</head>

<body>
<h2>Test des Fonctions CRUD pour Client</h2>

<h3>Liste de Tous les Clients</h3>

    <?php

    include '../cl_read.php'; // Assurez-vous que le che

    ?>



    <!-- Formulaire pour Créer un Client -->
    <h3>Créer un Client</h3>
    <form action="../cl_create.php" method="post">
        <input type="text" name="nom" placeholder="Nom" required><br>
        <input type="text" name="adresse" placeholder="Adresse" required><br>
        <input type="text" name="telephone" placeholder="Téléphone" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="submit" value="Créer Client">
    </form>

<h2>Supprimer un Client</h2>

    <form action="../cl_delete.php" method="post">
        <label for="id">ID du Client :</label>
        <input type="text" id="id" name="id" required><br>
        <input type="submit" value="Supprimer">
    </form>

    <h3>Mettre à Jour un Client</h3>
<form action="../cl_update.php" method="post"> <!-- Assurez-vous que le chemin d'accès est correct -->
    <label for="id">ID du Client:</label>
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