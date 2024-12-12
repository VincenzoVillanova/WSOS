<?php
require_once "connessione.php";

$query = "INSERT INTO Citta (nome,prezzo,foto) VALUES (?,?,?)";
$result = $conn->prepare($query);
$result->bind_param("sis", $_POST["nome"], $_POST["prezzo"], $_POST["foto"]);
$result->execute();
header("Location:/");
