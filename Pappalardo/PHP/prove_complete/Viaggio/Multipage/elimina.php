<?php
require_once "connessione.php";
$id = $_GET["id"];
$query = "DELETE FROM Citta WHERE id='$id'";
$result = $conn->query($query);
header("Location:/");
