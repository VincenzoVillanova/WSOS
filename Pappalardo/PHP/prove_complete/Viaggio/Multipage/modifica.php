<?php
require_once "connessione.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = $_GET["id"];
    $query = "SELECT * FROM Citta WHERE id=" . $id;
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()) {
?>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value="<?= $row["nome"] ?>"></td>
            </tr>
            <tr>
                <td>Foto:</td>
                <td><input type="text" name="foto" value="<?= $row["foto"] ?>"></td>
            </tr>
            <tr>
                <td>Prezzo:</td>
                <td><input type="text" name="prezzo" value="<?= $row["prezzo"] ?>" min="1"></td>
            </tr>
            <tr>
                <td><input type="submit" name="action" value="invia"></td>
            </tr>
            <input type="hidden" name="id" value="<?= $row["id"] ?>">
        </form>
<?php
    }
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $query = "UPDATE Citta SET nome=?,prezzo=?,foto=? WHERE id=?";
    $result = $conn->prepare($query);
    $result->bind_param("sisi", $_POST["nome"], $_POST["prezzo"], $_POST["foto"], $_POST["id"]);
    $result->execute();
    header("Location:/");
}
