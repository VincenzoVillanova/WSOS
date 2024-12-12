<?php
$conn = new mysqli("localhost", "root", "Vincenzo2002!", "exam");

if (!$conn) {
    print 'Errore nella connessione';
}
