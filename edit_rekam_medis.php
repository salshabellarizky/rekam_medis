<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM rekam_medis WHERE id_rekam='$id'"));

if (isset($_POST['update'])) {
    $id_pasien = $_POST['id_pasien'];
    $id_dokter = $_POST['id_dokter'];
    $id_obat = $_POST['id_obat'];
    $tgl = $_POST['tanggal_periksa'];
    $keluhan = $_POST['keluhan'];
    $diagnosa = $_POST['diagnosa'];
    $tindakan = $_POST['tindakan'];
    $resep = $_POST['resep'];

    $query = "UPDATE rekam_medis SET 
                id_pasien='$id_pasien', 
                id_dokter='$id_dokter', 
                id_obat='$id_obat', 
                tanggal_periksa='$tgl', 
                keluhan='$keluhan', 
                diagnosa='$diagnosa', 
                tindakan='$tindakan', 
                resep='$resep' 
              WHERE id_rekam='$id'";

    if (mysqli_query($koneksi, $query)) {
        header("Location: riwayat_pemeriksaan.php");
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Rekam Medis</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Form Edit Rekam Medis</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Pasien:</label>
                <select name="id_pasien" required>
                    <?php
                    $q_pasien = mysqli_query($koneksi, "SELECT * FROM pasien");
                    while ($p = mysqli_fetch_assoc($q_pasien)) {
                        $selected = ($p['id_pasien'] == $data['id_pasien']) ? 'selected' : '';
                        echo "<option value='".$p['id_pasien']."' $selected>".$p['no_rm']." - ".$p['nama_pasien']."</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>Dokter:</label>
                <select name="id_dokter" required>
                    <?php
                    $q_dokter = mysqli_query($koneksi, "SELECT * FROM dokter");
                    while ($d = mysqli_fetch_assoc($q_dokter)) {
                        $selected = ($d['id_dokter'] == $data['id_dokter']) ? 'selected' : '';
                        echo "<option value='".$d['id_dokter']."' $selected>".$d['nama_dokter']." (".$d['spesialisasi'].")</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>Obat:</label>
                <select name="id_obat" required>
                    <?php
                    $q_obat = mysqli_query($koneksi, "SELECT * FROM obat");
                    while ($o = mysqli_fetch_assoc($q_obat)) {
                        $selected = ($o['id_obat'] == $data['id_obat']) ? 'selected' : '';
                        echo "<option value='".$o['id_obat']."' $selected>".$o['nama_obat']."</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>Tanggal Periksa:</label>
                <input type="date" name="tanggal_periksa" value="<?= $data['tanggal_periksa'] ?>" required>
            </div>

            <div class="form-group">
                <label>Keluhan:</label>
                <textarea name="keluhan" required><?= $data['keluhan'] ?></textarea>
            </div>

            <div class="form-group">
                <label>Diagnosa:</label>
                <textarea name="diagnosa" required><?= $data['diagnosa'] ?></textarea>
            </div>

            <div class="form-group">
                <label>Tindakan:</label>
                <textarea name="tindakan" required><?= $data['tindakan'] ?></textarea>
            </div>

            <div class="form-group">
                <label>Resep / Aturan Pakai:</label>
                <input type="text" name="resep" value="<?= $data['resep'] ?>" required>
            </div>

            <button type="submit" name="update" class="btn">Update Data</button>
            <a href="riwayat_pemeriksaan.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>