<?php
$conn = new mysqli("localhost", "root", "Vincenzo2002!", "DatabaseCitta");
if (!$conn) {
    print "Errore di connessione";
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
?>
    <h1>
        <center>Home - DB</center>
    </h1>
    <h3>Insieme delle possibili destinazioni: </h3>
    <table border="1">

        <tr>
            <th>Nome</th>
            <th>Foto</th>
            <th>Prezzo</th>
            <th colspan="2">Azioni</th>
        </tr>
        <?php
        $query = "SELECT * FROM Citta";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?= $row["nome"] ?></td>
                <td><img src="<?= $row["foto"] ?>" height="150" width="150"></td>
                <td><?= $row["prezzo"] ?></td>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                    <input type="hidden" name="id" value="<?= $row["id"] ?>">
                    <td><input type="submit" name="action" value="modifica"></td>
                    <td><input type="submit" name="action" value="elimina"></td>
                </form>
            </tr>
        <?php
        }
        ?>
    </table>
    <br><br>
    <h3>Inserisci una nuova destinazione:</h3>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome"></td>
            </tr>
            <tr>
                <td>Foto:</td>
                <td><input type="text" name="foto"></td>
            </tr>
            <tr>
                <td>Prezzo:</td>
                <td><input type="number" name="prezzo" min="1"></td>
            </tr>
            <tr>
                <td><input type="submit" name="action" value="invia"></td>
            </tr>
        </table>
    </form>
    <?php
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["action"])) {
        $scelta = $_POST["action"];
        if ($scelta == "invia") {
            $query = "INSERT INTO Citta (nome,prezzo,foto) VALUES (?,?,?)";
            $result = $conn->prepare($query);
            $result->bind_param("sis", $_POST["nome"], $_POST["prezzo"], $_POST["foto"]);
            $result->execute();
            header("Location:/");
        }
        if ($scelta == "modifica") {
            $id = $_POST["id"];
            $query = "SELECT * FROM Citta WHERE id='$id'";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
                $nome = $row["nome"];
                $foto = $row["foto"];
                $prezzo = $row["prezzo"];
            }
    ?>
            <h1>Modifica in corso!</h1>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="hidden" name="id" value="<?= $id ?>">
                Nome:<input type="text" name="nome" value="<?= $nome ?>">
                Foto:<input type="text" name="foto" value="<?= $foto ?>">
                Prezzo:<input type="number" name="prezzo" min="1" value="<?= $prezzo ?>">
                <input type="submit" name="action" value="update">
            </form>
<?php

        }
        if ($scelta == "update") {
            $query = "UPDATE Citta SET nome=?,prezzo=?,foto=? WHERE id=?";
            $result = $conn->prepare($query);
            $result->bind_param("sisi", $_POST["nome"], $_POST["prezzo"], $_POST["foto"], $_POST["id"]);
            $result->execute();
            header("Location:/");
        }
        if ($scelta == "elimina") {
            $id = $_POST["id"];
            $query = "DELETE FROM Citta WHERE id='$id'";
            $result = $conn->query($query);
            header("Location:/");
        }
    } else {
        header("Location:/");
    }
}
