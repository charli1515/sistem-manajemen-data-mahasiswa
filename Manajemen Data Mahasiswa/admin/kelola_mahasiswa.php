<?php
session_start();
require_once '../koneksi.php';

// Proteksi halaman hanya untuk admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.html");
    exit();
}

// Ambil data mahasiswa
$sql = "SELECT * FROM data_mahasiswa";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Kelola Data Mahasiswa</title>
  <link rel="stylesheet" href="../style.css" />
  <style>
    .tabel-wrapper {
      max-width: 1100px;
      margin: 40px auto 0 auto;
      padding: 0 15px;
    }
    .judul-mahasiswa {
      text-align: center;
      margin-bottom: 30px;
      margin-top: 20px;
      font-size: 2rem;
      font-weight: bold;
      color: #142b1a;
    }
    .btn-kembali-bawah {
      display: block;
      margin: 40px auto 40px auto;
      padding: 12px 24px;
      background-color: #0a9396;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
      text-align: center;
      transition: background-color 0.3s ease;
      border: none;
      cursor: pointer;
      box-shadow: 0 2px 6px rgba(0,0,0,0.08);
      width: fit-content;
    }
    .btn-kembali-bawah:hover {
      background-color: #053233;
    }
    /* Tambahan border untuk tabel */
    .table-mahasiswa {
      border-collapse: collapse;
      width: 100%;
      background: transparent;
    }
    .table-mahasiswa th, .table-mahasiswa td {
      border: 1.5px solid #0a9396;
      padding: 10px 12px;
      text-align: left;
    }
    .table-mahasiswa th {
      background-color: #e0fbfc;
      color: #142b1a;
      font-weight: bold;
    }
    .table-mahasiswa tr:nth-child(even) {
      background-color: #f7f7f7;
    }
    .table-mahasiswa tr:hover {
      background-color: #e0f7fa;
    }
  </style>
</head>
<body>
  <header>Kelola Data Mahasiswa</header>

  <div class="tabel-wrapper">
    <div class="judul-mahasiswa">Daftar Mahasiswa</div>
    <table class="table-mahasiswa">
      <thead>
        <tr>
          <th>Nama</th>
          <th>NIM</th>
          <th>Fakultas</th>
          <th>Jurusan</th>
          <th>Prodi</th>
          <th>SKS</th>
          <th>Semester</th>
          <th>IP</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()) : ?>
        <tr>
          <td data-label="Nama"><?= htmlspecialchars($row['nama']) ?></td>
          <td data-label="NIM"><?= htmlspecialchars($row['nim']) ?></td>
          <td data-label="Fakultas"><?= htmlspecialchars($row['fakultas']) ?></td>
          <td data-label="Jurusan"><?= htmlspecialchars($row['jurusan']) ?></td>
          <td data-label="Prodi"><?= htmlspecialchars($row['prodi']) ?></td>
          <td data-label="SKS"><?= htmlspecialchars($row['sks']) ?></td>
          <td data-label="Semester"><?= htmlspecialchars($row['semester']) ?></td>
          <td data-label="IP"><?= htmlspecialchars($row['ip']) ?></td>
          <td data-label="Aksi">
            <a href="edit_mahasiswa.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="hapus_mahasiswa.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <!-- Tombol kembali di bawah tabel, posisi tengah -->
    <a href="../main.html" class="btn-kembali-bawah">Kembali ke Beranda</a>
  </div>
</body>
</html>
