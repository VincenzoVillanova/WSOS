<?php
$conn = new mysqli("localhost", "root", "Vincenzo2002!", "exam");

if (!$conn) {
    print("Errore di connessione");
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
?>
    <h1>
        <center>Libri - Home</center>
    </h1>
    <h3>Insieme dei libri:</h3>
    <table border="1">
        <tr>
            <th>isbn</th>
            <th>title</th>
            <th>author</th>
            <th>publisher</th>
            <th>ranking</th>
            <th>year</th>
            <th>price</th>
            <th colspan="2">azioni</th>
        </tr>
        <?php
        $query = "SELECT * FROM books order by ranking";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?= $row["isbn"] ?></td>
                <td><?= $row["title"] ?></td>
                <td><?= $row["author"] ?></td>
                <td><?= $row["publisher"] ?></td>
                <td><?= $row["ranking"] ?></td>
                <td><?= $row["year"] ?></td>
                <td><?= $row["price"] ?></td>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                    <input type="hidden" name="id" value="<?= $row["id"] ?>">
                    <td><input type="submit" value="modifica" name="action"></td>
                    <td><input type="submit" value="elimina" name="action"></td>
                </form>
            </tr>
        <?php
        }
        ?>
    </table>
    <h3>Inserisci un nuovo libro</h3>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="text" name="isbn" placeholder="Inserisci ISBN">
        <input type="text" name="title" placeholder="Inserisci titolo">
        <input type="text" name="author" placeholder="Inserisci autore">
        <input type="text" name="publisher" placeholder="Inserisci editore">
        <input type="number" name="ranking" placeholder="Inserisci ranking">
        <input type="number" name="year" placeholder="Inserisci anno di pubblicazione">
        <input type="number" name="price" placeholder="Inserisci prezzo">
        <input type="submit" value="invia" name="action">
    </form>
    <?php
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST["action"] == "invia") {
        $query = "INSERT INTO books (isbn,title,author,publisher,ranking,year,price) VALUES (?,?,?,?,?,?,?)";
        $result = $conn->prepare($query);
        $result->bind_param("ssssiii", $_POST["isbn"], $_POST["title"], $_POST["author"], $_POST["publisher"], $_POST["ranking"], $_POST["year"], $_POST["price"]);
        $result->execute();
        header("Location:/");
    }

    if ($_POST["action"] == "update") {
        $query = "UPDATE books SET isbn=?,title=?,author=?,publisher=?,ranking=?,year=?,price=? WHERE id=?";
        $result = $conn->prepare($query);
        $result->bind_param("ssssiiii", $_POST["isbn"], $_POST["title"], $_POST["author"], $_POST["publisher"], $_POST["ranking"], $_POST["year"], $_POST["price"], $_POST["id"]);
        $result->execute();
        header("Location:/");
    }

    if ($_POST["action"] == "elimina") {
        $query = "DELETE FROM books WHERE id=?";
        $result = $conn->prepare($query);
        $result->bind_param("i", $_POST["id"]);
        $result->execute();
        header("Location:/");
    }

    if ($_POST["action"] == "modifica") {
    ?>
        <h1>
            <center>Libri - Modifica</center>
        </h1>
        <h3>Libro trovato:</h3>
        <table border="1">
            <tr>
                <th>isbn</th>
                <th>title</th>
                <th>author</th>
                <th>publisher</th>
                <th>ranking</th>
                <th>year</th>
                <th>price</th>
            </tr>
            <?php
            $id = $_POST["id"];
            $query = "SELECT * FROM books WHERE id='$id'";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?= $row["isbn"] ?></td>
                    <td><?= $row["title"] ?></td>
                    <td><?= $row["author"] ?></td>
                    <td><?= $row["publisher"] ?></td>
                    <td><?= $row["ranking"] ?></td>
                    <td><?= $row["year"] ?></td>
                    <td><?= $row["price"] ?></td>
                </tr>
        </table>
        <h3>Modifica il seguente libro</h3>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="hidden" name="id" value="<?= $row["id"] ?>">
            <input type="text" name="isbn" value="<?= $row["isbn"] ?>" placeholder="Inserisci ISBN">
            <input type="text" name="title" value="<?= $row["title"] ?>" placeholder="Inserisci titolo">
            <input type="text" name="author" value="<?= $row["author"] ?>" placeholder="Inserisci autore">
            <input type="text" name="publisher" value="<?= $row["publisher"] ?>" placeholder="Inserisci editore">
            <input type="number" name="ranking" value="<?= $row["ranking"] ?>" placeholder="Inserisci ranking">
            <input type="number" name="year" value="<?= $row["year"] ?>" placeholder="Inserisci anno di pubblicazione">
            <input type="number" name="price" value="<?= $row["price"] ?>" placeholder="Inserisci prezzo">
            <input type="submit" value="update" name="action">
        </form>
    <?php
            }
    ?>
<?php
    }
}
