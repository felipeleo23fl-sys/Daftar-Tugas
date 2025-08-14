<?php
include 'koneksi.php';

// Hapus data jika ada request delete
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM products WHERE id=$id");
    header("Location: DaftarProduk.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>CRUD Product</title>
</head>
<body>
    <h2>Daftar Product</h2>
    <a href="TambahProduk.php">Tambah Product</a><br><br>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>product_name</th>
            <th>price</th>
            <th>description</th>
            <th>stock</th>
            <th>Aksi</th>
        </tr>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM products ORDER BY id ASC");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['product_name']}</td>
                <td>Rp " . number_format($row['price'], 0, ',', '.') . "</td>
                <td>{$row['description']}</td>
                <td>" . number_format($row['stock'], 0, ',', '.') . "</td>
                <td>
                    <a href='EditProduk.php?id={$row['id']}'>Edit</a> | 
                    <a href='?hapus={$row['id']}' onclick=\"return confirm('Yakin mau hapus?')\">Hapus</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>
