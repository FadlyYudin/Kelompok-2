<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


$host = "localhost";
$user = "root"; // default xampp
$pass = "";     // default kosong
$db   = "db_ecommerce";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
