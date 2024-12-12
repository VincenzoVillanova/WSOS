<?php
require_once("connessione.php");

$query = "SELECT * FROM Prenotazioni_Viaggi";

$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    $id = $row["ID_Prenotazione"];
    $nome = $row["Nome_Utente"];
    $destinazione = $row["Destinazione"];
    $datap = $row["Data_Partenza"];
    $datar = $row["Data_Ritorno"];
    $costo = $row["Costo_Totale"];

    print 'Nome: ' . $nome . ' Destinazione: ' . $destinazione . ' Data_Partenza: ' . $datap . ' Data_Ritorno: ' . $datar . ' Costo: ' . $costo;
    print "<a href='modifica.php?id=" . $id . "' >Modifica</a> ";
    print "<a href='elimina.php?id=" . $id . "' >  Elimina</a> <br>";
}
