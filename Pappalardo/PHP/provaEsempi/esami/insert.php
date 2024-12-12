<?php
require_once("connessione.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["action"])) {
        if (isset($_POST["action"]) == "aggiungi") {
            $nome = $_POST["nome"];
            $voto = $_POST["voto"];
            $query = "INSERT INTO esami (nome,voto) VALUES (?,?)";

            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $nome, $voto);
            $stmt->execute();

            print ("Inserito il record correttamente con <b>Nome: </b>" . $nome . " <b>Voto: </b>" . $voto . "<br>");
            print ("<a href='index.html'>Torna alla home!</a>");
            $stmt->close();
        }
    }
}
?>