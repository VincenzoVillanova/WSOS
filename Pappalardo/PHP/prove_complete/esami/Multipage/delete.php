<?php
require_once("connessione.php");

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $query = "DELETE FROM esami WHERE id=?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $id);
        $stmt->execute();

        header("Location: stampa.php");
    }
}
?>