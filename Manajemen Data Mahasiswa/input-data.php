<?php
session_start();
require_once 'koneksi.php';

// Proteksi halaman hanya untuk mahasiswa yang sudah login
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'mahasiswa') {
    header("Location: login.html");
    exit();
}
?>
<!-- HTML form input data mahasiswa seperti yang Anda kirimkan sebelumnya -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Input Data Mahasiswa</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <header>Input Data Mahasiswa</header>

  <div class="container">
    <h2>Formulir Data Mahasiswa</h2>

    <form action="simpan_data.php" method="POST">
      <!-- Form fields seperti yang Anda kirimkan -->
      <!-- Fakultas -->
      <label for="fakultas">Fakultas:</label>
      <select name="fakultas" id="fakultas" required>
        <option value="">-- Pilih Fakultas --</option>
        <option value="Fakultas Ilmu Pendidikan (FIP)">Fakultas Ilmu Pendidikan (FIP)</option>
        <option value="Fakultas Teknik">Fakultas Teknik</option>
        <option value="Fakultas Ilmu Keolahragaan (FIK)">Fakultas Ilmu Keolahragaan (FIK)</option>
        <option value="Fakultas Bahasa dan Seni (FBS)">Fakultas Bahasa dan Seni (FBS)</option>
        <option value="Fakultas Matematika dan Ilmu Pengetahuan Alam (FMIPA)">Fakultas Matematika dan Ilmu Pengetahuan Alam (FMIPA)</option>
        <option value="Fakultas Ilmu Sosial">Fakultas Ilmu Sosial</option>
        <option value="Fakultas Ekonomi">Fakultas Ekonomi</option>
      </select>

      <!-- Jurusan -->
      <label for="jurusan">Jurusan:</label>
      <select name="jurusan" id="jurusan" required>
        <option value="">-- Pilih Jurusan --</option>
        <option value="Teknik Informatika">Teknik Informatika</option>
        <option value="Sistem Informasi">Sistem Informasi</option>
        <option value="Manajemen Pendidikan">Manajemen Pendidikan</option>
        <option value="Pendidikan Jasmani">Pendidikan Jasmani</option>
        <option value="Fisika">Fisika</option>
        <option value="Sosiologi">Sosiologi</option>
        <option value="Akuntansi">Akuntansi</option>
      </select>

      <!-- Prodi -->
      <label for="prodi">Program Studi (Prodi):</label>
      <select name="prodi" id="prodi" required>
        <option value="">-- Pilih Prodi --</option>
        <option value="S1 Teknik Informatika">S1 Teknik Informatika</option>
        <option value="S1 Sistem Informasi">S1 Sistem Informasi</option>
        <option value="S1 Manajemen Pendidikan">S1 Manajemen Pendidikan</option>
        <option value="S1 Pendidikan Jasmani">S1 Pendidikan Jasmani</option>
        <option value="S1 Fisika">S1 Fisika</option>
        <option value="S1 Sosiologi">S1 Sosiologi</option>
        <option value="S1 Akuntansi">S1 Akuntansi</option>
      </select>

      <!-- Nama -->
      <label for="nama">Nama Lengkap:</label>
      <input type="text" id="nama" name="nama" required />

      <!-- NIM -->
      <label for="nim">NIM:</label>
      <input type="text" id="nim" name="nim" required />

      <!-- SKS Semester -->
      <label for="sks">SKS Semester:</label>
      <input type="number" id="sks" name="sks" required />

      <!-- Semester -->
      <label for="semester">Semester:</label>
      <select name="semester" id="semester" required>
        <option value="">-- Pilih Semester --</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
      </select>

      <!-- IP -->
      <label for="ip">IP Semester:</label>
      <input type="number" step="0.01" id="ip" name="ip" required />

      <button type="submit">Simpan Data</button>
    </form>
  </div>
</body>
</html>
