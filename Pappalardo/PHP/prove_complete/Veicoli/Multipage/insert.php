<?php
require_once("connessione.php");
$Marca = htmlspecialchars($_POST["Marca"]);
$Modello = htmlspecialchars($_POST["Modello"]);
$Anno = htmlspecialchars($_POST["Anno"]);
$Cilindrata = htmlspecialchars($_POST["Cilindrata"]);
$Alimentazione = htmlspecialchars($_POST["Alimentazione"]);
$Prezzo = htmlspecialchars($_POST["Prezzo"]);
$query = $conn->prepare("INSERT INTO Auto (Marca,Modello,Anno,Cilindrata,Alimentazione,Prezzo) VALUES (?,?,?,?,?,?)");
$query->bind_param("ssiisi", $Marca, $Modello, $Anno, $Cilindrata, $Alimentazione, $Prezzo);
if ($query->execute()) {
    header("Location:/");
}
