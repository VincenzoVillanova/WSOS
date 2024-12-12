<?php
require_once("connessione.php");
$description = $_POST["description"];
$price = $_POST["price"];
$validity = $_POST["validity"];
$purchased = $_POST["purchased"];
$query = "INSERT INTO offers (description,price,validity,purchased) VALUES ($description,$price,$validity,$purchased)";
$result = $conn->query($query);

header("Location:/");
