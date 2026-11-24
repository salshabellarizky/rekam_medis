<?php
$host = "localhost";
$user = "bella";   
$pass = "smkn3tbn";          
$db   = "db_rekam_medis";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>