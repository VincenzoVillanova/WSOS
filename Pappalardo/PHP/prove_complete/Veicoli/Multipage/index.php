<!DOCTYPE html>
<html lang="ita">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veicoli - Home</title>
</head>

<body>
    <h1>
        <center>Veicoli - Home</center>
    </h1>
    <?php
    require_once 'connessione.php';
    $query = "SELECT * FROM Auto";
    $result = $conn->query($query);
    if ($result) {
        echo "<table border='1' cellspacing='0' cellpadding='5'>";
        echo "<tr>
                <th>Marca</th>
                <th>Modello</th>
                <th>Anno</th>
                <th>Cilindrata</th>
                <th>Alimentazione</th>
                <th>Prezzo</th>
                <th>Azioni</th>
              </tr>";
        while ($row = $result->fetch_assoc()) {
            $Marca = htmlspecialchars($row["Marca"]);
            $Modello = htmlspecialchars($row["Modello"]);
            $Anno = htmlspecialchars($row["Anno"]);
            $Cilindrata = htmlspecialchars($row["Cilindrata"]);
            $Alimentazione = htmlspecialchars($row["Alimentazione"]);
            $Prezzo = htmlspecialchars($row["Prezzo"]);
            $id = htmlspecialchars($row["ID_Auto"]);

            echo "<tr>
                    <td>$Marca</td>
                    <td>$Modello</td>
                    <td>$Anno</td>
                    <td>$Cilindrata</td>
                    <td>$Alimentazione</td>
                    <td>$Prezzo</td>
                    <td>
                        <form action='/modifica.php' method='get' style='display:inline-block;'>
                            <input type='hidden' name='id' value='$id'>
                            <input type='submit' name='action' value='Modifica'>
                        </form>
                        <form action='/elimina.php' method='get' style='display:inline-block;'>
                            <input type='hidden' name='id' value='$id'>
                            <input type='submit' name='action' value='Elimina'>
                        </form>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Nessun dato trovato.";
    }
    ?>
    <br>

    <h2>Aggiungi un nuovo veicolo</h2>
    <form action="/insert.php" method="post">
        <table>
            <tr>
                <td>Marca:</td>
                <td><input type="text" name="Marca" required></td>
            </tr>
            <tr>
                <td>Modello:</td>
                <td><input type="text" name="Modello" required></td>
            </tr>
            <tr>
                <td>Anno:</td>
                <td><input type="number" name="Anno" max="2024" required></td>
            </tr>
            <tr>
                <td>Cilindrata:</td>
                <td><input type="number" name="Cilindrata" required></td>
            </tr>
            <tr>
                <td>Alimentazione:</td>
                <td><input type="text" name="Alimentazione" required></td>
            </tr>
            <tr>
                <td>Prezzo:</td>
                <td><input type="number" name="Prezzo" step="0.01" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;">
                    <input type="submit" name="action" value="Invia">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>