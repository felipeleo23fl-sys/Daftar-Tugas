<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $product_name= trim($_POST['product_name']);
    $price= trim($_POST['price']);
    $description = trim($_POST['description']);
    $stock = trim($_POST['stock']);


    if (!empty($product_name) && !empty($price) && !empty($description) && !empty($stock)) {
        $query = "INSERT INTO products (product_name, price, description, stock) 
                  VALUES ('$product_name', '$price', '$description', '$stock')";
        mysqli_query($conn, $query) or die(mysqli_error($conn));
        header("Location: DaftarProduk.php");
        exit;
    } else {
        echo "<p style='color:red;'>Semua data wajib diisi!</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Product</title>
</head>
<body>
    <h2>Tambah Product</h2>
    <form method="post">
        Nama Produk:<br>
        <input type="text" name="product_name"><br><br>

        Harga Product:<br>
        <input type="number" name="price"><br><br>

        Deskripsi Product:<br>
        <textarea name="description"></textarea><br><br>

        Stock Product:<br>
        <input type="number" name="stock"><br><br>

        <input type="submit" value="Simpan">
    </form>
    <br>
    <a href="DaftarProduk.php">Kembali</a>
</body>
</html>
