<?php
require_once("connessione.php");
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = htmlspecialchars($_GET["id"]);

    $query = $conn->prepare("DELETE FROM Auto WHERE ID_Auto=?");
    $query->bind_param("i", $id);
    if ($query->execute()) {
        header("Location:/");
    }
}
