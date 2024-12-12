<?php

require_once("connessione.php");

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $query = "SELECT * FROM tournaments";

    $stmt = $conn->query($query);
    print("<table border=1>");
    print("<tr>
        <th>Nome</th>
        <th>Logo</th>
        <th>Campione</th>
        <th>Anno</th>
        <th>Operazioni</th>
        </tr>");
    while ($row = $stmt->fetch_assoc()) {
        $id= $row["id"];
        $nome= $row["name"];
        $logo= $row["logo"];
        $champion= $row["champion"];
        $anno= $row["year"];

        print("<tr>
        <td>".$nome."</td>
        <td> <img alt='logo' src=".$logo." heigth='50' width='50'> <a href='$logo'>link</td>
        <td>".$champion."</td>
        <td>".$anno."</td>
        ");
        if($anno==2024){
        print("<td><a href=modifica.php?id=".$id.">Modifica</td>");
        print("<td><a href=delete.php?id=".$id.">Elimina</td>");
        print("</tr>");
        }
    }
    print("</table>");
    print("<a href='/index.html'>Torna alla home!</a>");
}
