<?php

$conn = mysqli_connect("localhost", "root", "Vincenzo2002!", "università");

if (!$conn) {
    die("" . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $query = "SELECT * FROM corsi";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo ("<h3>Corsi presenti:</h3>");
        while ($row = $result->fetch_assoc()) {
            $codice_corso = $row["codice_corso"];
            $nome_corso = $row["nome_corso"];
            $descrizione = $row["descrizione"];
            print ("<p><b> Codice: </b><a href='form2.php?nome_corso=" . $nome_corso . "'>" . $codice_corso . "</a>,<b>Nome : </b>" . $nome_corso . " <b>Descrizione: </b>" . $descrizione . "</p>");

        }
    } else {
        echo ("<h3>Non ci sono corsi presenti:</h3>");
    }

    print ("<a href='/index.html'><button>Torna alla home page</button></a>");
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST["action"])) {
        if ($_POST["action"] == "aggiungi") {
            $codice_corso = $_POST["codice_corso"];
            $nome_corso = $_POST["nome_corso"];
            $descrizione = $_POST["descrizione"];

            $query = "INSERT INTO corsi (codice_corso,nome_corso,descrizione) VALUES (?,?,?)";

            $stmt = $conn->prepare($query);
            $stmt->bind_param("sss", $codice_corso, $nome_corso, $descrizione);
            $stmt->execute();
            print ("<h3>Corso di " . $nome_corso . " inserito con successo</h3><br>");
            print ("<a href='operazioni.php'> Visualizza i corsi </a>");
        }
    }

    if ($_POST["action"] == "modifica") {
        $nome_corso = $_POST["nome_corso"];
        $descrizione = $_POST["descrizione"];

        $query = "UPDATE corsi SET  descrizione=? WHERE nome_corso=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $descrizione, $nome_corso);
        $stmt->execute();
        print ("<h3>Corso di " . $nome_corso . " modificato con successo</h3><br>");
        print ("<a href='operazioni.php'> Visualizza i corsi </a>");
    }

    if ($_POST["action"] == "elimina") {
        $nome_corso = $_POST["nome_corso"];

        $query = "DELETE FROM corsi WHERE nome_corso=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $nome_corso);
        $stmt->execute();
        print ("<h3>Corso di " . $nome_corso . " eliminato con successo</h3><br>");
        print ("<a href='operazioni.php'> Visualizza i corsi </a> <br>");
    }
    print ("<a href='/index.html'><button>Torna alla home page</button></a>");
    $stmt->close();
}
?>