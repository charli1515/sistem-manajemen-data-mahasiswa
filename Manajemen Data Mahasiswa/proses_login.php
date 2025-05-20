<?php
session_start();
require_once 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $inputRole = $_POST['role'];

    // Query cari user berdasarkan email dan role
    $query = "SELECT id, password, role FROM users WHERE email = ? AND role = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $inputRole);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        // Set session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        // Redirect sesuai role
        if ($user['role'] == 'admin') {
            header("Location: admin/dashboard.php");
        } elseif ($user['role'] == 'mahasiswa') {
            header("Location: input-data.php");
        } else {
            echo "Role tidak dikenali.";
            exit();
        }
        exit();
    } else {
        echo "<script>alert('Email, Password, atau Role salah!');window.location='login.html';</script>";
        exit();
    }
} else {
    header("Location: login.html");
    exit();
}
?>
