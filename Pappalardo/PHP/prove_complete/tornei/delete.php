<?php
require_once("connessione.php");

if($_SERVER['REQUEST_METHOD']==="GET"){
    $id=$_GET["id"];

    $query="DELETE FROM tournaments WHERE id=".$id;

    $stmt=$conn->query($query);
    header("Location: stampa.php");    
}
?>