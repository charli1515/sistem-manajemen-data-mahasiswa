<?php
session_start();
// Proteksi halaman admin
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="../style.css" />
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
    }
    header {
      background-color: #0a9396;
      color: white;
      padding: 1rem 2rem;
      text-align: center;
      font-size: 1.8rem;
      font-weight: bold;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .container {
      max-width: 800px;
      margin: 40px auto;
      background: white;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      text-align: center;
    }
    h2 {
      color: #142b1a;
      margin-bottom: 10px;
    }
    p {
      font-size: 1.1rem;
      color: #333;
      margin-bottom: 30px;
    }
    .btn-kembali {
      background-color: #0a9396;
      color: white;
      border: none;
      padding: 12px 28px;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      text-decoration: none;
      display: inline-block;
    }
    .btn-kembali:hover {
      background-color: #053233;
    }
  </style>
</head>
<body>
  <header>Dashboard Admin</header>
  <div class="container">
    <h2>Selamat datang, Admin!</h2>
    <p>Di sini Anda dapat mengelola data mahasiswa.</p>
    <a href="kelola_mahasiswa.php" class="btn-kembali">Selanjutnya</a>
  </div>
</body>
</html>
