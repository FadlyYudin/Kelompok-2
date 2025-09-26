<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Tambah Produk</title></head>
<body>
    <h2>Tambah Produk</h2>
    <form method="POST">
        Nama: <input type="text" name="name" required><br>
        Harga: <input type="number" name="price" required><br>
        Stok: <input type="number" name="stock" required><br>
        Deskripsi: <textarea name="description"></textarea><br>
        <button type="submit" name="simpan">Simpan</button>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $desc = $_POST['description'];

        $query = "INSERT INTO products (name, price, stock, description) 
                  VALUES ('$name','$price','$stock','$desc')";
        mysqli_query($conn, $query);
        header("Location: index.php");
    }
    ?>
</body>
</html>
