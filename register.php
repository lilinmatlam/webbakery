<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "bakery";
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = trim($_POST["username"]);
  $email = trim($_POST["email"]);
  $password = trim($_POST["password"]);

  // Cek apakah email sudah ada
  $check = $conn->prepare("SELECT id_user FROM tb_user WHERE email = ?");
  $check->bind_param("s", $email);
  $check->execute();
  $check->store_result();

  if ($check->num_rows > 0) {
    $message = "Email sudah terdaftar. Silakan gunakan email lain.";
  } else {
    // Simpan password asli
    $stmt = $conn->prepare("INSERT INTO tb_user (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();
    $stmt->close();

    header("Location: login.php");
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Registrasi - PINK Bakery</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fff7f0;
    }
    main {
      width: 90%;
      max-width: 500px;
      margin: 40px auto;
      background: #fbeadd;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 0 8px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
    }
    form label {
      display: block;
      margin: 10px 0 5px;
    }
    form input {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
    }
    form button {
      background: #C08552;
      color: white;
      padding: 10px;
      border: none;
      width: 100%;
      border-radius: 5px;
      cursor: pointer;
    }
    form button:hover {
      background: #9E6A4D;
    }
    .error {
      color: red;
      text-align: center;
    }
    .link-bawah {
      text-align: center;
      margin-top: 15px;
    }
  </style>
</head>
<body>
  <main>
    <h2>REGISTRASI</h2>
    <?php if ($message): ?>
      <p class="error"><?= $message ?></p>
    <?php endif; ?>
    <form method="POST" action="">
      <label>Username</label>
      <input type="text" name="username" required>

      <label>Email</label>
      <input type="email" name="email" required>

      <label>Password</label>
      <input type="text" name="password" required>

      <button type="submit">Daftar</button>

      <div class="link-bawah">
        Sudah punya akun? <a href="login.php">Login</a>
      </div>
    </form>
  </main>
</body>
</html>
