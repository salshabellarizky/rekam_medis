<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM pasien WHERE id_pasien='$id'"));

if (isset($_POST['update'])) {
    $no_rm = $_POST['no_rm'];
    $nama = $_POST['nama_pasien'];
    $jk = $_POST['jenis_kelamin'];
    $tgl = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "UPDATE pasien SET no_rm='$no_rm', nama_pasien='$nama', jenis_kelamin='$jk', tanggal_lahir='$tgl', alamat='$alamat' WHERE id_pasien='$id'");
    header("Location: pasien.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pasien</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Data Pasien</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>No RM:</label>
                <input type="text" name="no_rm" value="<?= $data['no_rm'] ?>" required>
            </div>
            <div class="form-group">
                <label>Nama Pasien:</label>
                <input type="text" name="nama_pasien" value="<?= $data['nama_pasien'] ?>" required>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin:</label>
                <select name="jenis_kelamin" required>
                    <option value="L" <?= $data['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-laki (L)</option>
                    <option value="P" <?= $data['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan (P)</option>
                </select>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir:</label>
                <input type="date" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>" required>
            </div>
            <div class="form-group">
                <label>Alamat:</label>
                <textarea name="alamat" required><?= $data['alamat'] ?></textarea>
            </div>
            <button type="submit" name="update" class="btn">Update Pasien</button>
            <a href="pasien.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>