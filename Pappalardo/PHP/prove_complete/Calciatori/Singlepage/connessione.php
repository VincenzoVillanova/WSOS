<?php
$conn = new mysqli("localhost", "root", "Vincenzo2002!", "Calcio");

if (!$conn) {
    print "Errore nella connessione al db";
}
