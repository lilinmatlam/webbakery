<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "bakery";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_SESSION["id_user"])) {
    $email = $_POST["email"];
    $komentar = $_POST["komentar"];
    $id_user = $_SESSION["id_user"];

    $stmt = $conn->prepare("INSERT INTO tb_feedback (review, email, id_user) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $komentar, $email, $id_user);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit;
  } else {
    echo "Harus login untuk mengirim feedback.";
  }
}

$conn->close();
?>
