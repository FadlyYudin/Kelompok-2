<?php
// config/database.php

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'dc_eccomerce';

// Enable mysqli error reporting for development
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = mysqli_connect($host, $user, $pass, $db);
    // Set charset to utf8mb4 for better Unicode support
    mysqli_set_charset($conn, 'utf8mb4');
} catch (mysqli_sql_exception $e) {
    // Log error and show generic message
    error_log('Database connection error: ' . $e->getMessage());
    die('Koneksi database gagal.');
}
?>
