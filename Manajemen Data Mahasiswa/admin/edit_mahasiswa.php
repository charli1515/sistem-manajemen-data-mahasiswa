<?php
session_start();
require_once '../koneksi.php';

// Proteksi halaman hanya untuk admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.html");
    exit();
}

// Ambil data mahasiswa berdasarkan ID
if (!isset($_GET['id'])) {
    echo "ID mahasiswa tidak ditemukan!";
    exit();
}
$id = intval($_GET['id']);

$sql = "SELECT * FROM data_mahasiswa WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    echo "Data mahasiswa tidak ditemukan!";
    exit();
}

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $fakultas = $_POST['fakultas'];
    $jurusan = $_POST['jurusan'];
    $prodi = $_POST['prodi'];
    $sks = $_POST['sks'];
    $semester = $_POST['semester'];
    $ip = $_POST['ip'];

    $update = $conn->prepare("UPDATE data_mahasiswa SET nama=?, nim=?, fakultas=?, jurusan=?, prodi=?, sks=?, semester=?, ip=? WHERE id=?");
    $update->bind_param("sssssiidi", $nama, $nim, $fakultas, $jurusan, $prodi, $sks, $semester, $ip, $id);

    if ($update->execute()) {
        header("Location: kelola_mahasiswa.php");
        exit();
    } else {
        echo "Gagal mengupdate data!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <header>Edit Data Mahasiswa</header>
    <div class="container">
        <h2>Edit Mahasiswa</h2>
        <form method="post">
            <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required placeholder="Nama"><br>
            <input type="text" name="nim" value="<?= htmlspecialchars($data['nim']) ?>" required placeholder="NIM"><br>
            <input type="text" name="fakultas" value="<?= htmlspecialchars($data['fakultas']) ?>" required placeholder="Fakultas"><br>
            <input type="text" name="jurusan" value="<?= htmlspecialchars($data['jurusan']) ?>" required placeholder="Jurusan"><br>
            <input type="text" name="prodi" value="<?= htmlspecialchars($data['prodi']) ?>" required placeholder="Prodi"><br>
            <input type="number" name="sks" value="<?= htmlspecialchars($data['sks']) ?>" required placeholder="SKS"><br>
            <input type="number" name="semester" value="<?= htmlspecialchars($data['semester']) ?>" required placeholder="Semester"><br>
            <input type="text" name="ip" value="<?= htmlspecialchars($data['ip']) ?>" required placeholder="IP"><br>
            <button type="submit">Simpan Perubahan</button>
        </form>
        <a href="kelola_mahasiswa.php" class="btn-kembali" style="margin-top:20px;">Kembali</a>
    </div>
</body>
</html>
