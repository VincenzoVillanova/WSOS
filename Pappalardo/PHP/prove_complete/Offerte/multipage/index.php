<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>
        <center>Home - Offerte</center>
    </h1>
    <?php
    require_once("connessione.php");
    $query = "SELECT * FROM offers";
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $description = $row["description"];
        $price = $row["price"];
        $validity = $row["validity"];
        $purchased = $row["purchased"];
        print "description: $description price: $price validity: $validity purchased: $purchased";
        print " <a href='modifica.php?id=$id'>modifica</a>";
        print " <a href='elimina.php?id=$id'>elimina</a> <br>";
    }
    ?>
    <br>
    <h3>Inserisci una nuova offerta</h3>
    <form action="inserisci.php" method="post">
        description: <input type="text" name="description">
        price: <input type="number" name="price">
        validity: <input type="number" name="validity">
        purchased: <input type="number" name="purchased">
        <input type="submit" value="aggiungi">
    </form>
</body>

</html>