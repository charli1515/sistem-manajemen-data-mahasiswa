<?php
require_once 'koneksi.php';

// Cek apakah kolom 'role' sudah ada
$result = $conn->query("SHOW COLUMNS FROM users LIKE 'role'");
if ($result->num_rows == 0) {
    // Kolom 'role' belum ada, tambahkan
    $sql = "ALTER TABLE users ADD COLUMN role ENUM('admin', 'mahasiswa') NOT NULL DEFAULT 'mahasiswa'";
    if ($conn->query($sql) === TRUE) {
        echo "Kolom 'role' berhasil ditambahkan ke tabel users.";
    } else {
        echo "Error menambahkan kolom 'role': " . $conn->error;
    }
} else {
    echo "Kolom 'role' sudah ada di tabel users.";
}

$conn->close();
?>
