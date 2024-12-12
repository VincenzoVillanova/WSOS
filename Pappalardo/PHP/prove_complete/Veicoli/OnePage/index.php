<?php
require_once 'connessione.php';
if ($_SERVER['REQUEST_METHOD'] == "GET") {
?>
    <h1>
        <center>Veicoli - Home</center>
    </h1>
    <h3>Lista dei veicoli disponibili: </h3>
    <?php
    $query = "SELECT * FROM Auto";
    $result = $conn->query($query);
    print "<table border= '1px' align-text='center'>";
    print "<tr><th>Marca</th><th>Modello</th><th>Anno</th><th>Cilindrata</th><th>Alimentazione</th><th>Prezzo</th><th>Azioni</th></tr>";
    while ($row = $result->fetch_assoc()) {
    ?>
        <tr>
            <td align="center" valign="middle"><?= $row["Marca"] ?></td>
            <td align="center" valign="middle"><?= $row["Modello"] ?></td>
            <td align="center" valign="middle"><?= $row["Anno"] ?></td>
            <td align="center" valign="middle"><?= $row["Cilindrata"] ?></td>
            <td align="center" valign="middle"><?= $row["Alimentazione"] ?></td>
            <td align="center" valign="middle"><?= $row["Prezzo"] ?></td>
            <td align="center" valign="middle">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                    <input type="hidden" name="id" value="<?= $row["ID_Auto"] ?>">
                    <input type="submit" value="modifica" name="action">
                    <input type="submit" value="elimina" name="action">
                </form>
            </td>
        </tr>
    <?php
    }
    print "</table>";
    ?>
    <h3>Inserisci un nuovo Veicolo: </h3>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <table border="1">
            <tr>
                <td>Marca:</td>
                <td><input type="text" name="Marca" placeholder="Inserisci Marca" required></td>
            </tr>
            <tr>
                <td>Modello:</td>
                <td><input type="text" name="Modello" placeholder="Inserisci Modello" required></td>
            </tr>
            <tr>
                <td>Anno:</td>
                <td><input type="number" name="Anno" max="2024" placeholder="Inserisci Anno" required></td>
            </tr>
            <tr>
                <td>Cilindrata:</td>
                <td><input type="number" name="Cilindrata" placeholder="Inserisci Cilindrata" required></td>
            </tr>
            <tr>
                <td>Alimentazione:</td>
                <td><input type="text" name="Alimentazione" placeholder="Diesel-Benzina-Metano-GPL-Ibrido-Elettrico" required></td>
            </tr>
            <tr>
                <td>Prezzo:</td>
                <td><input type="number" name="Prezzo" step="0.01" placeholder="Inserisci Prezzo" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;">
                    <input type="submit" name="action" value="Invia">
                </td>
            </tr>
        </table>
    </form>
    <?php
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST["action"]) {
        if ($_POST["action"] == "Invia") {
            $query = "INSERT INTO Auto (Marca,Modello,Anno,Cilindrata,Alimentazione,Prezzo) VALUES (?,?,?,?,?,?)";
            $result = $conn->prepare($query);
            $result->bind_param("ssissd", $_POST["Marca"], $_POST["Modello"], $_POST["Anno"], $_POST["Cilindrata"], $_POST["Alimentazione"], $_POST["Prezzo"]);
            $result->execute();
            header("Location:/");
        }
        if ($_POST["action"] == "modifica") {
            $id = $_POST["id"];
            $query = "SELECT * FROM Auto WHERE ID_Auto='$id'";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
    ?>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                    <table border="1">
                        <tr>
                            <td>Marca:</td>
                            <td><input type="text" name="Marca" value=<?= $row["Marca"] ?> placeholder="Inserisci Marca" required></td>
                        </tr>
                        <tr>
                            <td>Modello:</td>
                            <td><input type="text" name="Modello" value=<?= $row["Modello"] ?> placeholder="Inserisci Modello" required></td>
                        </tr>
                        <tr>
                            <td>Anno:</td>
                            <td><input type="number" name="Anno" max="2024" value=<?= $row["Anno"] ?> placeholder="Inserisci Anno" required></td>
                        </tr>
                        <tr>
                            <td>Cilindrata:</td>
                            <td><input type="number" name="Cilindrata" value=<?= $row["Cilindrata"] ?> placeholder="Inserisci Cilindrata" required></td>
                        </tr>
                        <tr>
                            <td>Alimentazione:</td>
                            <td><input type="text" name="Alimentazione" value=<?= $row["Alimentazione"] ?> placeholder="Diesel-Benzina-Metano-GPL-Ibrido-Elettrico" required></td>
                        </tr>
                        <tr>
                            <td>Prezzo:</td>
                            <td><input type="number" name="Prezzo" step="0.01" value=<?= $row["Prezzo"] ?> placeholder="Inserisci Prezzo" required></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:center;">
                                <input type="hidden" name="id" value="<?= $row["ID_Auto"] ?>">
                                <input type="submit" name="action" value="update">
                            </td>
                        </tr>
                    </table>
                </form>
<?php
            }
        }
        if ($_POST["action"] == "update") {
            $query = "UPDATE Auto SET Marca=?,Modello=?,Anno=?,Cilindrata=?,Alimentazione=?,Prezzo=? WHERE ID_Auto=?";
            $result = $conn->prepare($query);
            $result->bind_param("ssissdi", $_POST["Marca"], $_POST["Modello"], $_POST["Anno"], $_POST["Cilindrata"], $_POST["Alimentazione"], $_POST["Prezzo"], $_POST["id"]);
            $result->execute();
            header("Location:/");
        }
        if ($_POST["action"] == "elimina") {
            $query = "DELETE FROM Auto WHERE ID_Auto=?";
            $result = $conn->prepare($query);
            $result->bind_param("i", $_POST["id"]);
            $result->execute();
            header("Location:/");
        }
    }
}
