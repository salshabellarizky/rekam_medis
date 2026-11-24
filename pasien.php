<?php
include 'koneksi.php';

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM pasien WHERE id_pasien='$id'");
    header("Location: pasien.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pasien</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Data Pasien</h2>
        <nav>
            <a href="index.php">Dashboard</a>
            <a href="pasien.php">Data Pasien</a>
            <a href="dokter.php">Data Dokter</a>
            <a href="obat.php">Data Obat</a>
            <a href="riwayat_pemeriksaan.php">Riwayat Pemeriksaan</a>
        </nav>

        <a href="tambah_pasien.php" class="btn">+ Tambah Pasien Baru</a>
        <br><br>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>No RM</th>
                    <th>Nama Pasien</th>
                    <th>L/P</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM pasien ORDER BY id_pasien DESC");
                $no = 1;
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td>".$no++."</td>";
                    echo "<td>".$row['no_rm']."</td>";
                    echo "<td>".$row['nama_pasien']."</td>";
                    echo "<td>".$row['jenis_kelamin']."</td>";
                    echo "<td>".$row['tanggal_lahir']."</td>";
                    echo "<td>".$row['alamat']."</td>";
                    echo "<td>
                            <a href='edit_pasien.php?id=".$row['id_pasien']."' class='btn-edit'>Edit</a> | 
                            <a href='pasien.php?hapus=".$row['id_pasien']."' class='btn-danger' onclick='return confirm(\"Yakin hapus data pasien ini?\")'>Hapus</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>