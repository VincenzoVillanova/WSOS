<?php
require_once("connessione.php");

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = $_GET["id"];
    $query = "DELETE FROM offers WHERE id=$id";
    $result = $conn->query($query);
    header("Location:/");
}
