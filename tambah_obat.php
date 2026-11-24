<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama_obat'];
    $satuan = $_POST['satuan'];
    $stok = $_POST['stok'];

    mysqli_query($koneksi, "INSERT INTO obat (nama_obat, satuan, stok) VALUES ('$nama', '$satuan', '$stok')");
    header("Location: obat.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Obat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Data Obat</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Nama Obat:</label>
                <input type="text" name="nama_obat" required>
            </div>
            <div class="form-group">
                <label>Satuan:</label>
                <input type="text" name="satuan" placeholder="Tablet, Kapsul, Sirup" required>
            </div>
            <div class="form-group">
                <label>Stok:</label>
                <input type="number" name="stok" required>
            </div>
            <button type="submit" name="simpan" class="btn">Simpan Obat</button>
            <a href="obat.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>