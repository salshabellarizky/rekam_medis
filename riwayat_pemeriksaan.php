<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Pemeriksaan Pasien</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Data Riwayat Pemeriksaan Pasien</h2>
        <nav>
            <a href="index.php">Dashboard</a>
            <a href="pasien.php">Data Pasien</a>
            <a href="dokter.php">Data Dokter</a>
            <a href="obat.php">Data Obat</a>
            <a href="riwayat_pemeriksaan.php">Riwayat Pemeriksaan</a>
        </nav>

        <a href="tambah_rekam_medis.php" class="btn">+ Tambah Rekam Medis</a>
        <br><br>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tgl Periksa</th>
                    <th>Nama Pasien</th>
                    <th>Nama Dokter</th>
                    <th>Obat</th>
                    <th>Keluhan</th>
                    <th>Diagnosa</th>
                    <th>Tindakan</th>
                    <th>Resep</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT rm.*, p.nama_pasien, d.nama_dokter, o.nama_obat 
                        FROM rekam_medis rm
                        JOIN pasien p ON rm.id_pasien = p.id_pasien
                        JOIN dokter d ON rm.id_dokter = d.id_dokter
                        JOIN obat o ON rm.id_obat = o.id_obat
                        ORDER BY rm.tanggal_periksa DESC";
                
                $query = mysqli_query($koneksi, $sql);
                $no = 1;

                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_assoc($query)) {
                        echo "<tr>";
                        echo "<td>".$no++."</td>";
                        echo "<td>".$row['tanggal_periksa']."</td>";
                        echo "<td>".$row['nama_pasien']."</td>";
                        echo "<td>".$row['nama_dokter']."</td>";
                        echo "<td>".$row['nama_obat']."</td>";
                        echo "<td>".$row['keluhan']."</td>";
                        echo "<td>".$row['diagnosa']."</td>";
                        echo "<td>".$row['tindakan']."</td>";
                        echo "<td>".$row['resep']."</td>";
                        echo "<td>
                                <a href='edit_rekam_medis.php?id=".$row['id_rekam']."' class='btn-edit'>Edit</a> | 
                                <a href='hapus_rekam_medis.php?id=".$row['id_rekam']."' class='btn-danger' onclick='return confirm(\"Yakin hapus data ini?\")'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>Belum ada data riwayat pemeriksaan.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>