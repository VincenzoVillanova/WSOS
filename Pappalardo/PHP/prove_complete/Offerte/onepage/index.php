<?php
$conn = new mysqli("localhost", "root", "Vincenzo2002!", "exam");

if (!$conn) {
    print("Errore di connessione");
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $query = "SELECT * FROM offers";
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $description = $row["description"];
        $price = $row["price"];
        $validity = $row["validity"];
        $purchased = $row["purchased"];
        print " <form action='/' method='post'> ";
        print "<input type='hidden' name='id' value='$id'>";
        print "description: $description price: $price validity: $validity purchased: $purchased";
        print "<input type='submit' name='option' value='modifica'>";
        print "<input type='submit' name='option' value='elimina'>";
        print "</form>";
    }
?>
    <h3>Inserisci una nuova offerta</h3>
    <form action="/" method="post">
        description: <input type="text" name="description">
        price: <input type="number" name="price">
        validity: <input type="number" name="validity">
        purchased: <input type="number" name="purchased">
        <input type="submit" name="option" value="aggiungi">
    </form>
    <?php
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $scelta = $_POST["option"];
    if ($scelta == "aggiungi") {
        $description = $_POST["description"];
        $price = $_POST["price"];
        $validity = $_POST["validity"];
        $purchased = $_POST["purchased"];
        $query = "INSERT INTO offers (description,price,validity,purchased) VALUES ($description,$price,$validity,$purchased)";
        $result = $conn->query($query);
        header("Location:/");
    }
    if ($scelta == "modifica") {
        $id = $_POST["id"];
        $query = "SELECT * FROM offers WHERE id='$id'";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $description = $row["description"];
            $price = $row["price"];
            $validity = $row["validity"];
            $purchased = $row["purchased"];
    ?>
            <form action="/" method="post">
                <input type="hidden" name="id" value="<?= $id ?>">
                description: <input type="text" name="description" value="<?= $description ?>">
                price: <input type="number" name="price" value="<?= $price ?>">
                validity: <input type="number" name="validity" value="<?= $validity ?>">
                purchased: <input type="number" name="purchased" value="<?= $purchased ?>">
                <input type="submit" name="option" value="update">
            </form>
<?php
        }
    }
    if ($scelta == "update") {
        $id = $_POST["id"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $validity = $_POST["validity"];
        $purchased = $_POST["purchased"];
        $query = "UPDATE offers SET  description='$description',price='$price',validity='$validity',purchased='$purchased' WHERE id='$id'";
        $result = $conn->query($query);

        header("Location:/");
    }
    if ($scelta == "elimina") {
        $id = $_POST["id"];
        $query = "DELETE FROM offers WHERE id='$id'";
        $result = $conn->query($query);

        header("Location:/");
    }
}
?>