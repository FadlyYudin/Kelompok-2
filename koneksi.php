<?php
$host = "localhost";
$user = "root"; // default xampp
$pass = "";     // default kosong
$db   = "db_ecommerce";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
