<?php
include 'koneksi.php';

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM dokter WHERE id_dokter='$id'");
    header("Location: dokter.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Dokter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Data Dokter</h2>
        <nav>
            <a href="index.php">Dashboard</a>
            <a href="pasien.php">Data Pasien</a>
            <a href="dokter.php">Data Dokter</a>
            <a href="obat.php">Data Obat</a>
            <a href="riwayat_pemeriksaan.php">Riwayat Pemeriksaan</a>
        </nav>

        <a href="tambah_dokter.php" class="btn">+ Tambah Dokter Baru</a>
        <br><br>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Dokter</th>
                    <th>Spesialisasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM dokter ORDER BY id_dokter DESC");
                $no = 1;
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td>".$no++."</td>";
                    echo "<td>".$row['nama_dokter']."</td>";
                    echo "<td>".$row['spesialisasi']."</td>";
                    echo "<td>
                            <a href='edit_dokter.php?id=".$row['id_dokter']."' class='btn-edit'>Edit</a> | 
                            <a href='dokter.php?hapus=".$row['id_dokter']."' class='btn-danger' onclick='return confirm(\"Yakin hapus dokter ini?\")'>Hapus</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>