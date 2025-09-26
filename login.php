<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

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

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>