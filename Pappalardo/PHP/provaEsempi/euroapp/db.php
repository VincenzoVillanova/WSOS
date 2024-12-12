<?php
$servername = "localhost";
$username = "root";
$password = "Vincenzo2002!";
$dbname = "exam";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
?>
