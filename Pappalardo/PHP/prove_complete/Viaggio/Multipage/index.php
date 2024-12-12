<?php
require_once "connessione.php";
?>
<h1>
    <center>Home - Destinazioni</center>
</h1>

<h3> Elenco destinazioni disponibili: </h3>
<table border="1">
    <tr>
        <th>Nome</th>
        <th>Foto</th>
        <th>Prezzo</th>
        <th colspan="2" align="center">Azioni</th>
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
                <td><a href="modifica.php?id=<?= $row["id"] ?>">modifica</a></td>
                <td><a href="elimina.php?id=<?= $row["id"] ?>">elimina</a></td>
            </form>
        </tr>
    <?php
    }
    ?>
</table><br><br>
<h3>Inserisci nuova destinazione:</h3>
<table>
    <form action="crea.php" method="post">
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
            <td><input type="text" name="prezzo" min="1"></td>
        </tr>
        <tr>
            <td><input type="submit" name="action" value="invia"></td>
        </tr>
    </form>
</table>
</table>