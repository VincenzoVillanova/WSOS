<?php
require_once("connessione.php");

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $query = "SELECT * FROM esami";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    print ("<h1><center>Benvenuto nella sezione online dove puoi vedere i tuoi esami</center></h1>");
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $nome = $row["nome"];
            $voto = $row["voto"];

            print ("<b>Nome: </b>" . $nome . " <b>Voto: </b>" . $voto);
            print ("  <a href='delete.php?id=" . $id . "'>elimina</a>");
            print ("    -     <a href='modifica.php?id=" . $id . "'>modifica</a><br>");
        }
    } else {
        print ("Non ci sono esami disponibili");
    }

    print ("<a href='index.html'>Torna alla home!</a>");
}
?>