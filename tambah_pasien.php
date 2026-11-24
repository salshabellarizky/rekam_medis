<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $no_rm = $_POST['no_rm'];
    $nama = $_POST['nama_pasien'];
    $jk = $_POST['jenis_kelamin'];
    $tgl = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "INSERT INTO pasien (no_rm, nama_pasien, jenis_kelamin, tanggal_lahir, alamat) 
                            VALUES ('$no_rm', '$nama', '$jk', '$tgl', '$alamat')");
    header("Location: pasien.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pasien</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Data Pasien</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>No Rekam Medis (RM):</label>
                <input type="text" name="no_rm" required>
            </div>
            <div class="form-group">
                <label>Nama Pasien:</label>
                <input type="text" name="nama_pasien" required>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin:</label>
                <select name="jenis_kelamin" required>
                    <option value="L">Laki-laki (L)</option>
                    <option value="P">Perempuan (P)</option>
                </select>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir:</label>
                <input type="date" name="tanggal_lahir" required>
            </div>
            <div class="form-group">
                <label>Alamat:</label>
                <textarea name="alamat" required></textarea>
            </div>
            <button type="submit" name="simpan" class="btn">Simpan Pasien</button>
            <a href="pasien.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>