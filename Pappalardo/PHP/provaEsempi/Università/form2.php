<?php
$nome_corso = $_GET["nome_corso"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operazioni Update e Remove</title>
</head>

<body>
    <h3>Modifica corso: </h3>
    <form action="operazioni.php" method="post">
        Nome Corso:
        <input type="text" name="nome_corso" value="<?php echo $nome_corso; ?>" readonly>
        <br>
        Descrizione:
        <input type="text" name="descrizione" placeholder="Inserisci descrizione">
        <br>
        <input type="submit" name="action" value="modifica">
    </form>

    <br><br><br>
    <h3>Elimina il corso</h3>
    <form action="operazioni.php" method="post">
        Nome Corso:
        <input type="text" name="nome_corso" value="<?php echo $nome_corso; ?>" readonly>
        <input type="submit" name="action" value="elimina">
    </form>
</body>

</html>