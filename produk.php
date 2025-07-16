<?php
include 'config.php'; // ini koneksi ke database

$result = $conn->query("SELECT * FROM produk");
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);
?>
