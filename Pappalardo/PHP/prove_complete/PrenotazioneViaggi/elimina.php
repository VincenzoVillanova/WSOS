<?php
require_once("connessione.php");
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET["id"];
    $query = "DELETE FROM Prenotazioni_Viaggi WHERE ID_Prenotazione='$id'";

    $result = $conn->query($query);

    if ($result != 0) {
        print("Eliminazione avvenuta correttamente!!");
    }

    print "<a href='print.php' >Visualizza i viaggi!</a> ";
}
