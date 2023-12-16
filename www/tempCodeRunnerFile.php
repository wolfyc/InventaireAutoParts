<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['id']) && !empty($_POST['id'])) {
                $id = $_POST['id'];
                $nom = $_POST['nom'];
                $adresse = $_POST['adresse'];
                $telephone = $_POST['telephone'];
                $email = $_POST['email'];
        
                $result = updateClient($id, $nom, $adresse, $telephone, $email);
                ech