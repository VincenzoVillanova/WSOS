<?php
$conn = mysqli_connect("localhost", "root", "Vincenzo2002!", "exam");

if (!$conn) {
    print("errore " . mysqli_connect_error());
}
