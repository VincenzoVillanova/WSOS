<?php
require_once("connessione.php");
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = htmlspecialchars($_GET["id"]);
    $query = "SELECT * FROM Auto WHERE ID_Auto='$id'";
    $query = $conn->query($query);
    while ($row = $query->fetch_assoc()) {
        $Marca = htmlspecialchars($row["Marca"]);
        $Modello = htmlspecialchars($row["Modello"]);
        $Anno = htmlspecialchars($row["Anno"]);
        $Cilindrata = htmlspecialchars($row["Cilindrata"]);
        $Alimentazione = htmlspecialchars($row["Alimentazione"]);
        $Prezzo = htmlspecialchars($row["Prezzo"]);
    }
?>
    <h1>
        <center>Modifica in corso</center>
    </h1>
    <br>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        Marca : <input type="text" name="Marca" value="<?= $Marca ?>"><br>
        Modello : <input type="text" name="Modello" value="<?= $Modello ?>"><br>
        Anno : <input type="number" name="Anno" value="<?= $Anno ?>"><br>
        Cilindrata : <input type="number" name="Cilindrata" value="<?= $Cilindrata ?>"><br>
        Alimentazione : <input type="text" name="Alimentazione" value="<?= $Alimentazione ?>"><br>
        Prezzo : <input type="number" name="Prezzo" value="<?= $Prezzo ?>"><br>
        <input type="submit" value="update">
    </form>
<?php
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = htmlspecialchars($_POST["id"]);
    $Marca = htmlspecialchars($_POST["Marca"]);
    $Modello = htmlspecialchars($_POST["Modello"]);
    $Anno = htmlspecialchars($_POST["Anno"]);
    $Cilindrata = htmlspecialchars($_POST["Cilindrata"]);
    $Alimentazione = htmlspecialchars($_POST["Alimentazione"]);
    $Prezzo = htmlspecialchars($_POST["Prezzo"]);
    $query = $conn->prepare("UPDATE Auto SET Marca=?,Modello=?,Anno=?,Cilindrata=?,Alimentazione=?,Prezzo=? WHERE ID_Auto=?");
    $query->bind_param("ssiisdi", $Marca, $Modello, $Anno, $Cilindrata, $Alimentazione, $Prezzo, $id);
    if ($query->execute()) {
        header("Location:/");
    }
}
