<?php
// Creazione della connessione
$conn = new mysqli('localhost', 'root', 'Vincenzo2002!', 'exam');

// Controllo errori di connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
?>