<!DOCTYPE HTML>
<html>

<head>
  <style>
    /* Stile per la classe "errore", che rende il testo di colore rosso */
    .errore {
      color: #FF0000;
    }
  </style>
</head>

<body>

  <?php
  // Definizione delle variabili per i messaggi di errore e di input, impostandole inizialmente come vuote
  $nomeErr = $emailErr = $genderErr = $websiteErr = "";
  $name = $email = $gender = $comment = $website = "";

  // Verifica se il modulo è stato inviato con il metodo POST
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controlla se il campo "name" è vuoto
    if (empty($_POST["name"])) {
      $nomeErr = "Il nome è obbligatorio";
    } else {
      // Pulizia dell'input tramite la funzione test_input
      $name = test_input($_POST["name"]);
      // Verifica che il nome contenga solo lettere e spazi
      if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $nomeErr = "Sono consentite solo lettere e spazi";
      }
    }

    // Controlla se il campo "email" è vuoto
    if (empty($_POST["email"])) {
      $emailErr = "L'email è obbligatoria";
    } else {
      $email = test_input($_POST["email"]);
      // Verifica se l'indirizzo email è in un formato valido
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Formato email non valido";
      }
    }

    // Verifica se il campo "website" è vuoto
    if (empty($_POST["website"])) {
      $website = "";
    } else {
      $website = test_input($_POST["website"]);
      // Controlla che l'URL sia valido
      if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
        $websiteErr = "URL non valido";
      }
    }

    // Se il campo "comment" è vuoto, lo imposta come stringa vuota
    if (empty($_POST["comment"])) {
      $comment = "";
    } else {
      $comment = test_input($_POST["comment"]);
    }

    // Controlla se il campo "gender" è vuoto
    if (empty($_POST["gender"])) {
      $genderErr = "Il genere è obbligatorio";
    } else {
      $gender = test_input($_POST["gender"]);
    }
  }

  // Funzione per pulire i dati in ingresso
  function test_input($data) {
    $data = trim($data); // Rimuove gli spazi bianchi iniziali e finali
    $data = stripslashes($data); // Rimuove gli slash inversi
    $data = htmlspecialchars($data); // Converte i caratteri speciali in entità HTML
    return $data;
  }
  ?>

  <h2>Esempio di Validazione del Modulo PHP</h2>
  <p><span class="errore">* campo obbligatorio</span></p>
  <!-- Inizio del modulo; l'azione si riferisce allo stesso script (PHP_SELF) -->
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Nome: <input type="text" name="name" value="<?php echo $name;?>">
    <span class="errore">* <?php echo $nomeErr;?></span>
    <br><br>
    
    E-mail: <input type="text" name="email" value="<?php echo $email;?>">
    <span class="errore">* <?php echo $emailErr;?></span>
    <br><br>
    
    Sito Web: <input type="text" name="website" value="<?php echo $website;?>">
    <span class="errore"><?php echo $websiteErr;?></span>
    <br><br>
    
    Commento: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
    <br><br>
    
    Genere:
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="femmina" ) echo "checked" ;?> value="femmina">Femmina
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="maschio" ) echo "checked" ;?> value="maschio">Maschio
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="altro" ) echo "checked" ;?> value="altro">Altro
    <span class="errore">* <?php echo $genderErr;?></span>
    <br><br>
    
    <input type="submit" name="submit" value="Invia">
  </form>

  <?php
  // Visualizza i dati inseriti dall'utente
  echo "<h2>I Tuoi Dati Inseriti:</h2>";
  echo "Nominativo : $name";
  echo "<br>";
  echo "e-mail : $email";
  echo "<br>";
  echo "Website : $website";
  echo "<br>";
  echo "Commento : $comment";
  echo "<br>";
  echo "Genere : $gender";
  ?>

</body>

</html>
