<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
</head>
<body>
    <h2>Daftar Produk</h2>
    <a href="tambah.php">+ Tambah Produk</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th><th>Nama</th><th>Harga</th><th>Stok</th><th>Aksi</th>
        </tr>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM products");
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['price']."</td>
                    <td>".$row['stock']."</td>
                    <td>
                        <a href='edit.php?id=".$row['id']."'>Edit</a> | 
                        <a href='hapus.php?id=".$row['id']."'>Hapus</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
