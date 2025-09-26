<?php include 'koneksi.php'; 
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head><title>Edit Produk</title></head>
<body>
    <h2>Edit Produk</h2>
    <form method="POST">
        Nama: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
        Harga: <input type="number" name="price" value="<?php echo $row['price']; ?>"><br>
        Stok: <input type="number" name="stock" value="<?php echo $row['stock']; ?>"><br>
        Deskripsi: <textarea name="description"><?php echo $row['description']; ?></textarea><br>
        <button type="submit" name="update">Update</button>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $desc = $_POST['description'];

        $query = "UPDATE products SET 
                  name='$name', price='$price', stock='$stock', description='$desc' 
                  WHERE id=$id";
        mysqli_query($conn, $query);
        header("Location: index.php");
    }
    ?>
</body>
</html>
