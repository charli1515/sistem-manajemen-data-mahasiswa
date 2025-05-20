<?php
session_start();
require_once '../koneksi.php';

// Proteksi halaman hanya untuk admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.html");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Gunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("DELETE FROM data_mahasiswa WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: kelola_mahasiswa.php");
        exit();
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    header("Location: kelola_mahasiswa.php");
    exit();
}
?>
