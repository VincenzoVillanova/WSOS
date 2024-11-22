<?php
$servername="localhost";
$username="root";
$password="Vincenzo2002!";
$dbname="MyDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connessione fallita: " . $conn->connect_error);
}

if(S_SERVER["REQUEST_METHOD"]=='GET'){
    $sql ="SELECT * FROM flist";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        $result->data_seek(rand(0,$result->num_rows-1));
        $row = $result->fetch_assoc();
        $titolo_preso_a_caso = $row["titolo"];
        $regista_titolo_preso_a_caso = $row["regista"];

        print "<h2>Film consigliato: </h2>";
        print "$titolo_preso_a_caso".($regista_titolo_preso_a_caso ?" ($regista_titolo_preso_a_caso)":"");

}
}
?>

<br><br><hr>
<form action="<?php print $_SERVER['PHP_SELF']?>" method="post">
    <input type="submit" name="wlist" value="visualizza la wishlist"><br><hr><br>
    <input type="text" name="" id="">
</form>