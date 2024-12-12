<?php
require_once("connessione.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET["id"];
    $query = "SELECT * FROM Prenotazioni_Viaggi WHERE ID_Prenotazione='$id'";

    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()) {
        $id = $row["ID_Prenotazione"];
        $nome = $row["Nome_Utente"];
        $destinazione = $row["Destinazione"];
        $datap = $row["Data_Partenza"];
        $datar = $row["Data_Ritorno"];
        $costo = $row["Costo_Totale"];
    }

?>

    <!DOCTYPE html>
    <html lang="it">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modifica</title>
    </head>

    <body>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            Nome: <input type="text" name="nome" value="<?= $nome ?>">
            Destinazione: <input type="text" name="destinazione" value="<?= $destinazione ?>">
            Data partenza: <input type="date" name="datap" value="<?= $datap ?>">
            Data ritorno: <input type="date" name="datar" value="<?= $datar ?>">
            Costo: <input type="number" name="costo" value="<?= $costo ?>">
            <input type="submit" value="update">
        </form>
    </body>

    </html>


<?php
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $destinazione = $_POST["destinazione"];
    $datap = $_POST["datap"];
    $datar = $_POST["datar"];
    $costo = $_POST["costo"];
    $query = "UPDATE Prenotazioni_Viaggi SET Nome_Utente='$nome',Destinazione='$destinazione',Data_Partenza='$datap',Data_Ritorno='$datar',Costo_Totale='$costo' WHERE ID_Prenotazione='$id'";

    $result = $conn->query($query);
    if ($result != 0) {
        print("Modifica avvenuta correttamente!!");
    }

    print "<a href='print.php' >Visualizza i viaggi!</a> ";
}
?>