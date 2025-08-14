<?php
include 'koneksi.php';

// Ambil data lama
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $product_name = trim($_POST['product_name']);
    $price = trim($_POST['price']);
    $description = trim($_POST['description']);
    $stock = trim($_POST['stock']);

    if (!empty($product_name) && !empty($price) && !empty($description) && !empty($stock)) {
        mysqli_query($conn, "UPDATE products SET 
            product_name='$product_name', 
            price='$price', 
            description='$description',
            stock='$stock' 
            WHERE id=$id");
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
    <title>Edit Product</title>
</head>
<body>
    <h2>Edit Product</h2>
    <form method="post">
        Nama Product:<br>
        <input type="text" name="product_name" value="<?= $data['product_name'] ?>"><br><br>

        Harga Product:<br>
        <input type="number" name="price" value="<?= $data['price'] ?>"><br><br>

        Deskripsi Product:<br>
        <textarea name="description"><?= $data['description'] ?></textarea><br><br>

        Stock Product:<br>
        <input type="number" name="stock" value="<?= $data['stock'] ?>"><br><br>

        <input type="submit" value="Update">
    </form>
    <br>
    <a href="DaftarProduk.php">Kembali</a>
</body>
</html>
