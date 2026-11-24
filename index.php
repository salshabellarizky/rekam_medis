<?php
include 'koneksi.php';

$count_pasien = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM pasien"))['total'];
$count_dokter = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM dokter"))['total'];
$count_obat   = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM obat"))['total'];
$count_rm     = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM rekam_medis"))['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Aplikasi Rekam Medis</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Dashboard Klinik Rekam Medis</h1>
        
        <nav>
            <a href="index.php">Dashboard</a>
            <a href="pasien.php">Data Pasien</a>
            <a href="dokter.php">Data Dokter</a>
            <a href="obat.php">Data Obat</a>
            <a href="riwayat_pemeriksaan.php">Riwayat Pemeriksaan</a>
        </nav>

        <h3>Statistik & Ringkasan Data</h3>
        <div class="card-grid">
            <div class="card">
                <h4>Total Pasien</h4>
                <p><?= $count_pasien; ?></p>
            </div>
            <div class="card">
                <h4>Total Dokter</h4>
                <p><?= $count_dokter; ?></p>
            </div>
            <div class="card">
                <h4>Total Obat</h4>
                <p><?= $count_obat; ?></p>
            </div>
            <div class="card">
                <h4>Rekam Medis</h4>
                <p><?= $count_rm; ?></p>
            </div>
        </div>
    </div>
</body>
</html>