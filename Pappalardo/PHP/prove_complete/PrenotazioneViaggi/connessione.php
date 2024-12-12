<?php
$conn=new mysqli("localhost","root","Vincenzo2002!","SistemaPrenotazioni");

if($conn->errno){
    print "Errore: ". $conn->error;
}
?>