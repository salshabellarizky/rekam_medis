<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM rekam_medis WHERE id_rekam='$id'";

    if (mysqli_query($koneksi, $query)) {
        header("Location: riwayat_pemeriksaan.php");
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    header("Location: riwayat_pemeriksaan.php");
}
?>