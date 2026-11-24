-- Membuat database
CREATE DATABASE db_rekam_medis;
USE db_rekam_medis;

-- 1. Tabel pasien
CREATE TABLE pasien (
    id_pasien INT AUTO_INCREMENT PRIMARY KEY,
    no_rm VARCHAR(20),
    nama_pasien VARCHAR(100),
    jenis_kelamin ENUM('L', 'P'),
    tanggal_lahir DATE,
    alamat TEXT
);

-- 2. Tabel dokter
CREATE TABLE dokter (
    id_dokter INT AUTO_INCREMENT PRIMARY KEY,
    nama_dokter VARCHAR(100),
    spesialisasi VARCHAR(50)
);

-- 3. Tabel obat
CREATE TABLE obat (
    id_obat INT AUTO_INCREMENT PRIMARY KEY,
    nama_obat VARCHAR(100),
    satuan VARCHAR(30),
    stok INT
);

-- 4. Tabel rekam_medis
CREATE TABLE rekam_medis (
    id_rekam INT AUTO_INCREMENT PRIMARY KEY,
    id_pasien INT,
    id_dokter INT,
    id_obat INT,
    tanggal_periksa DATE,
    keluhan TEXT,
    diagnosa TEXT,
    tindakan TEXT,
    resep VARCHAR(100),
    FOREIGN KEY (id_pasien) REFERENCES pasien(id_pasien),
    FOREIGN KEY (id_dokter) REFERENCES dokter(id_dokter),
    FOREIGN KEY (id_obat) REFERENCES obat(id_obat)
);