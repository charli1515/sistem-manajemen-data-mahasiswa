<?php
require_once 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role']; // Ambil role dari form

    // Cek apakah email sudah terdaftar
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Email sudah terdaftar!";
    } else {
        // Simpan data ke database dengan role yang dipilih
        $insertQuery = "INSERT INTO users (email, password, role) VALUES (?, ?, ?)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bind_param("sss", $email, $password, $role);

        if ($insertStmt->execute()) {
            header("Location: login.html");
            exit();
        } else {
            echo "Gagal mendaftar!";
        }
    }

    // Tutup statement dan koneksi
    $stmt->close();
    if (isset($insertStmt)) {
        $insertStmt->close();
    }
    $conn->close();
}
?>
