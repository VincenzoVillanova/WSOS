<?php
include 'db.php';

$sql = "SELECT * FROM tournaments";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Lista Tornei</title>
</head>

<body>
    <h1>Lista Tornei</h1>
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
            <td>
                <?= $row['name'] ?>
            </td>
            <td>
                <?php if ($row['logo']): ?>
                <a href="<?= $row['logo'] ?>" target="_blank">
                    <img src="<?= $row['logo'] ?>" alt="Logo" style="width:50px;height:50px;">
                </a>
                <?php endif; ?>
            </td>
            <td>
                <?= $row['champion'] ?>
            </td>
            <td>
                <?= $row['year'] ?>
            </td>
            <td>
                <a href="update.php?id=<?= $row['id'] ?>">Modifica</a>
                <a href="delete.php?id=<?= $row['id'] ?>">Elimina</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="create.php">Crea Nuovo Torneo</a>
</body>

</html>