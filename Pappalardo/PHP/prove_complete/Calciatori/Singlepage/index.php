<?php
require_once "connessione.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $query = "SELECT * FROM Calciatori";
    $result = $conn->query($query);
?>
    <h1>
        <center>Home - DB</center>
    </h1>
    <h3>Lista dei calciatori:</h3>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Squadra</th>
            <th>Ruolo</th>
            <th>Azioni</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?= $row["nome"] ?></td>
                <td><?= $row["cognome"] ?></td>
                <td><?= $row["squadra"] ?></td>
                <td><?= $row["ruolo"] ?></td>
                <td>
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <input type="hidden" name="id" value="<?= $row["id"] ?>">
                        <input type="submit" name="action" value="modifica">
                        <input type="submit" name="action" value="elimina">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <br>
    <h3>Inserisci un nuovo calciatore:</h3>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        Nome: <input type="text" name="nome" required><br>
        Cognome: <input type="text" name="cognome" required><br>
        Squadra: <input type="text" name="squadra" required><br>
        Ruolo: <input type="text" name="ruolo" required><br>
        <input type="submit" name="action" value="aggiungi">
    </form>
    <?php
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST["action"] == "aggiungi") {
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $squadra = $_POST["squadra"];
        $ruolo = $_POST["ruolo"];
        $query = "INSERT INTO Calciatori (nome,cognome,squadra,ruolo) VALUES (?,?,?,?)";
        $result = $conn->prepare($query);
        $result->bind_param("ssss", $nome, $cognome, $squadra, $ruolo);
        $result->execute();
        header("Location:/");
    }

    if ($_POST["action"] == "modifica") {
        $id = $_POST["id"];

        $query = "SELECT * FROM Calciatori WHERE id='$id'";
        $result = $conn->query($query);
    ?>
        <h1>
            <center>Modifica in corso!</center>
        </h1>
        <?php
        while ($row = $result->fetch_assoc()) {
            $nome = $row["nome"];
            $cognome = $row["cognome"];
            $squadra = $row["squadra"];
            $ruolo = $row["ruolo"];
        }
        ?>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            Nome: <input type="text" name="nome" value="<?= $nome ?>" required><br>
            Cognome: <input type="text" name="cognome" value="<?= $cognome ?>" required><br>
            Squadra: <input type="text" name="squadra" value="<?= $squadra ?>" required><br>
            Ruolo: <input type="text" name="ruolo" value="<?= $ruolo ?>" required><br>
            <input type="submit" name="action" value="update">
        </form>
<?php
    }
    if ($_POST["action"] == "update") {
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $squadra = $_POST["squadra"];
        $ruolo = $_POST["ruolo"];

        $query = "UPDATE Calciatori SET nome=?,cognome=?,squadra=?, ruolo=? WHERE id=?";
        $result = $conn->prepare($query);
        $result->bind_param("ssssi", $nome, $cognome, $squadra, $ruolo, $id);
        $result->execute();
        header("Location:/");
    }
    if ($_POST["action"] == "elimina") {
        $id = $_POST["id"];
        $query = "DELETE FROM Calciatori WHERE id=?";
        $result = $conn->prepare($query);
        $result->bind_param("i", $id);
        $result->execute();
        header("Location:/");
    }
}
