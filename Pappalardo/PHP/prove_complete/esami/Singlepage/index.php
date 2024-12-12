<?php
require_once "connessione.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
?>
    <h1>
        <center>Home - Esami</center>
    </h1>
    <h3>Lista di tutti gli esami:</h3>
    <?php
    $query = "SELECT * FROM esami";
    $result = $conn->query($query);
    ?>

    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Voto</th>
            <th>Azioni</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?= $row["nome"] ?></td>
                <td><?= $row["voto"] ?></td>
                <td>
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <input type="hidden" name="id" value="<?= $row["id"] ?>">
                        <input type="submit" name="option" value="modifica">
                        <input type="submit" name="option" value="elimina">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <h3>Inserisci un nuovo esame</h3>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <table border="1">
            <tr>
                <td>Nome : </td>
                <td><input type="text" name="nome" required></td>
            </tr>
            <tr>
                <td>Voto</td>
                <td><input type="number" name="voto" min="18" max="31" required></td>
            </tr>
            <tr style="align-items: center;">
                <td><input type="submit" name="option" value="aggiungi"></td>
            </tr>

        </table>
    </form>
    <?php
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["option"])) {
        if ($_POST["option"] == "aggiungi") {
            $query = "INSERT INTO esami (nome,voto) VALUES (?,?)";
            $result = $conn->prepare($query);
            $result->bind_param("si", $_POST["nome"], $_POST["voto"]);
            $result->execute();
            header("Location:/");
        }
        if ($_POST["option"] == "modifica") {
            $id = $_POST["id"];
            $query = "SELECT * FROM esami WHERE id='$id'";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
    ?>

                <h1>
                    <center>Modifica esame in corso!</center>
                </h1>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                    <table border="1">
                        <tr>
                            <td>Nome : </td>
                            <td><input type="text" name="nome" value="<?= $row["nome"] ?>" required></td>
                        </tr>
                        <tr>
                            <td>Voto</td>
                            <td><input type="number" name="voto" min="18" max="31" value="<?= $row["voto"] ?>" required></td>
                        </tr>
                        <tr style="align-items: center;">
                            <td><input type="hidden" name="id" value="<?= $row["id"] ?>"></td>
                            <td><input type="submit" name="option" value="update"></td>
                        </tr>

                    </table>
                </form>
<?php
            }
        }
        if ($_POST["option"] == "update") {
            $id = $_POST["id"];
            $nome = $_POST["nome"];
            $voto = $_POST["voto"];
            $query = "UPDATE esami SET nome=?,voto=? WHERE id=?";
            $result = $conn->prepare($query);
            $result->bind_param("sii", $nome, $voto, $id);
            $result->execute();
            header("Location:/");
        }
        if ($_POST["option"] == "elimina") {
            $id = $_POST["id"];
            $query = "DELETE FROM esami WHERE id=?";
            $result = $conn->prepare($query);
            $result->bind_param("i", $id);
            $result->execute();
            header("Location:/");
        }
    }
}
