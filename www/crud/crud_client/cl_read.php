<?php
//include 'db.php';
include_once 'db.php';
function getAllClients() {
    $db = getDbConnection();
    $sql = "SELECT * FROM Client";
    $stmt = $db->query($sql);
    $db = null;
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getClientByID($id) {
    $db = getDbConnection();
    $sql = "SELECT * FROM Client WHERE ID_Client = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
    $db = null;
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
