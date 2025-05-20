<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db = "manajemen_mahasiswa";

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$fakultas = $_POST['fakultas'];
$jurusan  = $_POST['jurusan'];
$prodi    = $_POST['prodi'];
$nama     = $_POST['nama'];
$nim      = $_POST['nim'];
$sks      = $_POST['sks'];
$semester = $_POST['semester'];
$ip       = $_POST['ip'];

// Simpan data ke database
$sql = "INSERT INTO data_mahasiswa (fakultas, jurusan, prodi, nama, nim, sks, semester, ip)
        VALUES ('$fakultas', '$jurusan', '$prodi', '$nama', '$nim', '$sks', '$semester', '$ip')";

if ($conn->query($sql) === TRUE) {
  // Redirect ke halaman konfirmasi jika berhasil
  header("Location: data_tersimpan.php");
  exit;
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
