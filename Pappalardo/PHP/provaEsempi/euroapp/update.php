<?php
include 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $logo = $_POST['logo'];
    $champion = $_POST['champion'];
    $year = $_POST['year'];

    $sql = "UPDATE tournaments SET name='$name', logo='$logo', champion='$champion', year=$year WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Errore: " . $conn->error;
    }
}

$sql = "SELECT * FROM tournaments WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifica Torneo</title>
</head>
<body>
    <h1>Modifica Torneo</h1>
    <form method="POST" action="">
        Nome: <input type="text" name="name" value="<?= $row['name'] ?>" required><br>
        Logo: <input type="url" name="logo" value="<?= $row['logo'] ?>"><br>
        Campione: <input type="text" name="champion" value="<?= $row['champion'] ?>"><br>
        Anno: <input type="number" name="year" value="<?= $row['year'] ?>" required><br>
        <button type="submit">Salva</button>
    </form>
</body>
</html>
