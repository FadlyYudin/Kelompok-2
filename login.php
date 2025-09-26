<?php
include 'koneksi.php';
session_start();

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = md5($_POST['password']); // sementara pakai md5

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$user' AND password='$pass'");
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $_SESSION['userid'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        if ($row['role'] == 'admin') {
            header("Location: admin/index.php");
        } else {
            header("Location: customer/index.php");
        }
    } else {
        echo "Username atau password salah!";
    }
}
?>
