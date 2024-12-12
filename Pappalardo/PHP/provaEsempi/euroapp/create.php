<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $logo = $_POST['logo'];
    $champion = $_POST['champion'];
    $year = $_POST['year'];

    $sql = "INSERT INTO tournaments (name, logo, champion, year) VALUES ('$name', '$logo', '$champion', $year)";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Errore: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crea Torneo</title>
</head>
<body>
    <h1>Crea Torneo</h1>
    <form method="POST" action="">
        Nome: <input type="text" name="name" required><br>
        Logo: <input type="url" name="logo"><br>
        Campione: <input type="text" name="champion"><br>
        Anno: <input type="number" name="year" required><br>
        <button type="submit">Crea</button>
    </form>
</body>
</html>
