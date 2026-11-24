<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM dokter WHERE id_dokter='$id'"));

if (isset($_POST['update'])) {
    $nama = $_POST['nama_dokter'];
    $spesialisasi = $_POST['spesialisasi'];

    mysqli_query($koneksi, "UPDATE dokter SET nama_dokter='$nama', spesialisasi='$spesialisasi' WHERE id_dokter='$id'");
    header("Location: dokter.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Dokter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Data Dokter</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Nama Dokter:</label>
                <input type="text" name="nama_dokter" value="<?= $data['nama_dokter'] ?>" required>
            </div>
            <div class="form-group">
                <label>Spesialisasi:</label>
                <input type="text" name="spesialisasi" value="<?= $data['spesialisasi'] ?>" required>
            </div>
            <button type="submit" name="update" class="btn">Update Dokter</button>
            <a href="dokter.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>