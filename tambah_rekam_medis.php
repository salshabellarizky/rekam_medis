<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $id_pasien = $_POST['id_pasien'];
    $id_dokter = $_POST['id_dokter'];
    $id_obat = $_POST['id_obat'];
    $tgl = $_POST['tanggal_periksa'];
    $keluhan = $_POST['keluhan'];
    $diagnosa = $_POST['diagnosa'];
    $tindakan = $_POST['tindakan'];
    $resep = $_POST['resep'];

    $query = "INSERT INTO rekam_medis (id_pasien, id_dokter, id_obat, tanggal_periksa, keluhan, diagnosa, tindakan, resep) 
              VALUES ('$id_pasien', '$id_dokter', '$id_obat', '$tgl', '$keluhan', '$diagnosa', '$tindakan', '$resep')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: riwayat_pemeriksaan.php");
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Rekam Medis</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Form Tambah Rekam Medis</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Pasien:</label>
                <select name="id_pasien" required>
                    <option value="">-- Pilih Pasien --</option>
                    <?php
                    $q_pasien = mysqli_query($koneksi, "SELECT * FROM pasien");
                    while ($p = mysqli_fetch_assoc($q_pasien)) {
                        echo "<option value='".$p['id_pasien']."'>".$p['no_rm']." - ".$p['nama_pasien']."</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>Dokter:</label>
                <select name="id_dokter" required>
                    <option value="">-- Pilih Dokter --</option>
                    <?php
                    $q_dokter = mysqli_query($koneksi, "SELECT * FROM dokter");
                    while ($d = mysqli_fetch_assoc($q_dokter)) {
                        echo "<option value='".$d['id_dokter']."'>".$d['nama_dokter']." (".$d['spesialisasi'].")</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>Obat:</label>
                <select name="id_obat" required>
                    <option value="">-- Pilih Obat --</option>
                    <?php
                    $q_obat = mysqli_query($koneksi, "SELECT * FROM obat");
                    while ($o = mysqli_fetch_assoc($q_obat)) {
                        echo "<option value='".$o['id_obat']."'>".$o['nama_obat']."</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>Tanggal Periksa:</label>
                <input type="date" name="tanggal_periksa" required>
            </div>

            <div class="form-group">
                <label>Keluhan:</label>
                <textarea name="keluhan" required></textarea>
            </div>

            <div class="form-group">
                <label>Diagnosa:</label>
                <textarea name="diagnosa" required></textarea>
            </div>

            <div class="form-group">
                <label>Tindakan:</label>
                <textarea name="tindakan" required></textarea>
            </div>

            <div class="form-group">
                <label>Resep / Aturan Pakai:</label>
                <input type="text" name="resep" required>
            </div>

            <button type="submit" name="simpan" class="btn">Simpan Data</button>
            <a href="riwayat_pemeriksaan.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>