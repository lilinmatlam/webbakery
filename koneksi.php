<?php
$hostname = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "bakery";

// Membuat koneksi
$conn = new mysqli($hostname, $user_db, $pass_db);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Pilih database
mysqli_select_db($conn, $db_name);
?>
