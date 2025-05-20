<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "manajemen_mahasiswa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["error" => "Koneksi gagal: " . $conn->connect_error]);
    exit;
}

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$sql = "SELECT nama FROM data_mahasiswa WHERE nama LIKE ?";
$stmt = $conn->prepare($sql);
$search_term = "%" . $keyword . "%";
$stmt->bind_param("s", $search_term);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
$conn->close();
?>
