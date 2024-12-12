<?php
include 'connessione.php';
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $query = "DELETE FROM tournaments WHERE id=$id";
    $result = $conn->query($query);

    if (!$result) {
        die("" . $conn->error);
    }

    header("Location: index.php");
}
?>