<?php
require_once("connessione.php");

if($_SERVER['REQUEST_METHOD']==="GET"){
    $id=$_GET["id"];

    $query="SELECT * FROM tournaments WHERE id=".$id;

    $stmt=$conn->query($query);

    while($row=$stmt->fetch_assoc()){
        $nome= $row["name"];
        $logo= $row["logo"];
        $champion= $row["champion"];
        $anno= $row["year"];
    }
}

if($_SERVER['REQUEST_METHOD']==="POST"){
        $id=$_POST["id"];
        $nome= $_POST["name"];
        $logo= $_POST["logo"];
        $champion= $_POST["champion"];
        $anno= $_POST["year"];

        $query="UPDATE tournaments SET name='".$nome."',logo='".$logo."',champion='".$champion."',year='".$anno."' WHERE id=".$id;
        $stmt=$conn->query($query);

        header("Location: stampa.php");    
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
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <input type="hidden" name="id" value="<?php echo $id?>">
        Nome: <input type="text" name="name" value="<?php echo $nome?>"> <br>
        Logo: <input type="text" name="logo" value="<?php echo $logo?>"> <br>
        champion: <input type="text" name="champion" value="<?php echo $champion?>"> <br>
        year: <input type="number" name="year" value="<?php echo $anno?>"> <br>
        <input type="submit" name="option" value="modifica">
    </form>

    <a href="index.html">Torna alla home!</a>
</body>
</html>