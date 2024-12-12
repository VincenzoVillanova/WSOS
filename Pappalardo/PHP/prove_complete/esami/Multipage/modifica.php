<?php
require_once("connessione.php");

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $query = "SELECT * FROM esami WHERE id=?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $nome = $row["nome"];
                $voto = $row["voto"];
            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST["action"]) == "modifica") {
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $voto = $_POST["voto"];
        $query = "UPDATE esami SET nome=?,voto=? WHERE id=?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $nome, $voto, $id);
        $stmt->execute();
        $result = $stmt->get_result();

        header("Location: stampa.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>
        <center>Modifica esame in corso!</center>
    </h1>

    <form action='<?php echo $_SERVER['PHP_SELF'] ?>' method="post">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="text" name="nome" value="<?php echo $nome ?>">
        <input type="number" name="voto" value="<?php echo $voto ?>">
        <input type="submit" name="action" value="modifica">
    </form>
</body>

</html>