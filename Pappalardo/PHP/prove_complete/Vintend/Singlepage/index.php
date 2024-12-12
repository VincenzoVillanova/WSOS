<?php
$conn = new mysqli("localhost", "root", "Vincenzo2002!", "VenditeProdottiUsati");

if (!$conn) {
    print "errore connessione";
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $query = "SELECT * FROM Vendite";
    $result = $conn->query($query);
?>
    <h1>
        <center>Home</center>
    </h1>
    <table border="1">
        <tr>
            <th>Prodotto</th>
            <th>Prezzo</th>
            <th>Data Vendita</th>
            <th colspan="2">Azioni</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?= $row["prodotto"] ?></td>
                <td><?= $row["prezzo"] ?></td>
                <td><?= $row["data_vendita"] ?></td>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                    <input type="hidden" name="id" value="<?= $row["id"] ?>">
                    <td><input type="submit" value="modifica" name="action"></td>
                    <td><input type="submit" value="elimina" name="action"></td>
                </form>
            </tr>
        <?php
        }
        ?>
    </table>
    <br><br>
    <h3>Aggiungi un nuovo prodotto:</h3>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="text" name="prodotto">
        <input type="number" name="prezzo">
        <input type="date" name="data_vendita">
        <input type="submit" value="invia" name="action">
    </form>
    <?php
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST["action"]) {
        $action = $_POST["action"];

        if ($action == "invia") {
            $query = "INSERT INTO Vendite (prodotto,prezzo,data_vendita) VALUES (?,?,?)";
            $result = $conn->prepare($query);
            $result->bind_param("sds", $_POST["prodotto"], $_POST["prezzo"], $_POST["data_vendita"]);
            $result->execute();
            header("Location:/");
        }

        if ($action == "elimina") {
            $query = "DELETE FROM Vendite WHERE id=?";
            $result = $conn->prepare($query);
            $result->bind_param("i", $_POST["id"]);
            $result->execute();
            header("Location:/");
        }

        if ($action == "update") {
            $query = "UPDATE Vendite SET prodotto=?,prezzo=?,data_vendita=? WHERE id=?";
            $result = $conn->prepare($query);
            $result->bind_param("sdsi", $_POST["prodotto"], $_POST["prezzo"], $_POST["data_vendita"], $_POST["id"]);
            $result->execute();
            header("Location:/");
        }

        if ($action == "modifica") {
            $id = $_POST["id"];
            $query = "SELECT * FROM Vendite WHERE id='$id'";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
    ?>
            <h1>Modifica</h1>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="hidden" name="id" value="<?= $row["id"] ?>">
                <input type="text" name="prodotto" value="<?= $row["prodotto"] ?>">
                <input type="number" name="prezzo" value="<?= $row["prezzo"] ?>">
                <input type="date" name="data_vendita" value="<?= $row["data_vendita"] ?>">
                <input type="submit" value="update" name="action">
            </form>
<?php

        }
    }
}
