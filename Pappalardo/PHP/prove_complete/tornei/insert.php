<?php
require_once "connessione.php";
if($_SERVER['REQUEST_METHOD']==="POST"){

    $nome= $_POST["name"];
    $logo= $_POST["logo"];
    $champion= $_POST["champion"];
    $anno= $_POST["year"];

    $query="INSERT INTO tournaments (name,logo,champion,year) VALUES ('$nome','$logo','$champion','$anno')";
    $stmt=$conn->query($query);

    header("Location: stampa.php");    
}
?>
