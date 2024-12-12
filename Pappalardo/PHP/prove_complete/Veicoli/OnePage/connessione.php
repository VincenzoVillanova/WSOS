<?php
$conn = new mysqli("localhost", "root", "Vincenzo2002!", "VehicleDB");

if (!$conn) {
    die("" . mysqli_connect_error());
}
