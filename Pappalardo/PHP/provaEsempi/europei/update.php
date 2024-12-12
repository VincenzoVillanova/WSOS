<?php
include 'connessione.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['name'];
    $logo = $_POST['logo'];
    $campione = $_POST['champion'];
    $anno = $_POST['year'];

    $query = "UPDATE tournaments SET name='$nome',logo='$logo', champion='$campione', year='$anno' WHERE id=$id";
    $result = $conn->query($query);


    if (!$result) {
        die("Errore nella query: " . $conn->error);
    }

    header("Location: index.php");
} else {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $query = "SELECT * FROM tournaments WHERE id=$id";
        $result = $conn->query($query);
        $row = mysqli_fetch_assoc($result);
        if (!$result) {
            die("" . $conn->error);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>
        <center>Modifica in corso di un torneo!</center>
    </h1>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <!-- Correggiamo l'output dei valori -->
        <input type="text" name="name" value="<?= isset($row['name']) ? htmlspecialchars($row['name']) : '' ?>">
        <input type="text" name="logo" value="<?= isset($row['logo']) ? htmlspecialchars($row['logo']) : '' ?>">
        <input type="text" name="champion"
            value="<?= isset($row['champion']) ? htmlspecialchars($row['champion']) : '' ?>">
        <input type="number" name="year" value="<?= isset($row['year']) ? htmlspecialchars($row['year']) : '' ?>">
        <!-- Aggiungi un campo nascosto per l'ID -->
        <input type="hidden" name="id" value="<?= isset($row['id']) ? htmlspecialchars($row['id']) : '' ?>">
        <input type="submit" value="invia">
    </form>
</body>

</html>