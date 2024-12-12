<?php
include 'connessione.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    // Recupero e sanificazione dei dati
    $nome = $conn->real_escape_string($_POST['name']);
    $logo = $conn->real_escape_string($_POST['logo']);
    $campione = $conn->real_escape_string($_POST['champion']);
    $anno = (int) $_POST['year']; // Cast per sicurezza su dati numerici

    // Query SQL corretta per INSERT
    $query = "INSERT INTO tournaments (name, logo, champion, year) VALUES ('$nome', '$logo', '$campione', $anno)";

    // Esecuzione della query
    if ($conn->query($query) === TRUE) {
        header("Location: index.php"); // Reindirizzamento in caso di successo
        exit(); // Termina lo script dopo il reindirizzamento
    } else {
        die("Errore nella query: " . $conn->error); // Gestione errore
    }
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserimento</title>
</head>

<body>
    <h1>
        <center>Crea un nuovo torneo</center>
    </h1>

    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <!-- Campo per il nome del torneo -->
        <input type="text" name="name" placeholder="Inserisci il nome del torneo" required>

        <!-- Campo per il logo -->
        <input type="text" name="logo" placeholder="Inserisci l'URL del logo" required>

        <!-- Campo per il campione -->
        <input type="text" name="champion" placeholder="Inserisci il nome del campione" required>

        <!-- Campo per l'anno -->
        <input type="number" name="year" placeholder="Inserisci l'anno del torneo" required>

        <!-- Pulsante di invio -->
        <input type="submit" value="Invia">
    </form>
</body>

</html>