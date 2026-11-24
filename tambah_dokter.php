<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama_dokter'];
    $spesialisasi = $_POST['spesialisasi'];

    mysqli_query($koneksi, "INSERT INTO dokter (nama_dokter, spesialisasi) VALUES ('$nama', '$spesialisasi')");
    header("Location: dokter.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Dokter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Data Dokter</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Nama Dokter:</label>
                <input type="text" name="nama_dokter" required>
            </div>
            <div class="form-group">
                <label>Spesialisasi:</label>
                <input type="text" name="spesialisasi" required>
            </div>
            <button type="submit" name="simpan" class="btn">Simpan Dokter</button>
            <a href="dokter.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>