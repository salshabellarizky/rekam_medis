<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM obat WHERE id_obat='$id'"));

if (isset($_POST['update'])) {
    $nama = $_POST['nama_obat'];
    $satuan = $_POST['satuan'];
    $stok = $_POST['stok'];

    mysqli_query($koneksi, "UPDATE obat SET nama_obat='$nama', satuan='$satuan', stok='$stok' WHERE id_obat='$id'");
    header("Location: obat.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Obat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Data Obat</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Nama Obat:</label>
                <input type="text" name="nama_obat" value="<?= $data['nama_obat'] ?>" required>
            </div>
            <div class="form-group">
                <label>Satuan:</label>
                <input type="text" name="satuan" value="<?= $data['satuan'] ?>" required>
            </div>
            <div class="form-group">
                <label>Stok:</label>
                <input type="number" name="stok" value="<?= $data['stok'] ?>" required>
            </div>
            <button type="submit" name="update" class="btn">Update Obat</button>
            <a href="obat.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>