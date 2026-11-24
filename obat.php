<?php
include 'koneksi.php';

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM obat WHERE id_obat='$id'");
    header("Location: obat.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Obat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Data Obat</h2>
        <nav>
            <a href="index.php">Dashboard</a>
            <a href="pasien.php">Data Pasien</a>
            <a href="dokter.php">Data Dokter</a>
            <a href="obat.php">Data Obat</a>
            <a href="riwayat_pemeriksaan.php">Riwayat Pemeriksaan</a>
        </nav>

        <a href="tambah_obat.php" class="btn">+ Tambah Obat Baru</a>
        <br><br>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Satuan</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM obat ORDER BY id_obat DESC");
                $no = 1;
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td>".$no++."</td>";
                    echo "<td>".$row['nama_obat']."</td>";
                    echo "<td>".$row['satuan']."</td>";
                    echo "<td>".$row['stok']."</td>";
                    echo "<td>
                            <a href='edit_obat.php?id=".$row['id_obat']."' class='btn-edit'>Edit</a> | 
                            <a href='obat.php?hapus=".$row['id_obat']."' class='btn-danger' onclick='return confirm(\"Yakin hapus obat ini?\")'>Hapus</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>