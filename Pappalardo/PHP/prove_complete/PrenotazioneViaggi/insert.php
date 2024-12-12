<?php
require_once("connessione.php");
$nome = $_POST["nome"];
$destinazione = $_POST["destinazione"];
$datap = $_POST["datap"];
$datar = $_POST["datar"];
$costo = $_POST["costo"];
$query = "INSERT INTO Prenotazioni_Viaggi (Nome_Utente,Destinazione,Data_Partenza,Data_Ritorno,Costo_Totale) VALUES('$nome','$destinazione','$datap','$datar','$costo')";

$result = $conn->query($query);

if ($result != 0) {
    print("Inserimento avvenuto correttamente!!");
}

print "<a href='index.html' >Torna alla home!</a> ";
