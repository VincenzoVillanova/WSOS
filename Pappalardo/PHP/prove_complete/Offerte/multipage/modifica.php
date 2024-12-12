<?php
require_once("connessione.php");

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = $_GET["id"];
    $query = "SELECT * FROM offers WHERE id=$id";
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()) {
        $description = $row["description"];
        $price = $row["price"];
        $validity = $row["validity"];
        $purchased = $row["purchased"];
    }
?>
    <!DOCTYPE html>
    <html lang="it">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modifica in corso</title>
    </head>

    <body>
        <h1>Modifica in corso</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="hidden" name="id" value=<?= $id ?>>
            description: <input type="text" name="description" value="<?= $description ?>">
            price: <input type="number" name="price" value="<?= $price ?>">
            validity: <input type="number" name="validity" value="<?= $validity ?>">
            purchased: <input type="number" name="purchased" value="<?= $purchased ?>">
            <input type="submit" value="update">
        </form>
    </body>

    </html>
<?php
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST["id"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $validity = $_POST["validity"];
    $purchased = $_POST["purchased"];

    $query = "UPDATE  offers SET description='$description',price='$price',validity='$validity',purchased='$purchased' WHERE id='$id'";
    $result = $conn->query($query);

    header("Location:/");
}
?>