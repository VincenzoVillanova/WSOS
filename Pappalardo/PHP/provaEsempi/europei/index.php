<?php
include 'connessione.php';

$sql = "SELECT * FROM tournaments ORDER BY year";
$result = $conn->query($sql);

if (!$result) {
    die("Errore nella query: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Tornei</title>
</head>

<body>
    <h1>
        <center>Lista Tornei</center>
    </h1>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Logo</th>
            <th>Campione</th>
            <th>Anno</th>
            <th>Azioni</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']); ?></td>
                <td><img src="<?= htmlspecialchars($row['logo']); ?>" alt="Logo" style="width:50px;height:50px;"></td>
                <td><?= htmlspecialchars($row['champion']); ?></td>
                <td><?= htmlspecialchars($row['year']); ?></td>
                <td>
                    <a href="update.php?id=<?= $row['id']; ?>">Modifica</a>
                    <a href="delete.php?id=<?= $row['id']; ?>">Elimina</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <a href="create.php">Crea Nuovo Torneo</a>
</body>

</html>