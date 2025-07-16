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

$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = trim($_POST["email"]);
  $password = trim($_POST["password"]);

  $stmt = $conn->prepare("SELECT id_user, username, password FROM tb_user WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    $stmt->bind_result($id_user, $username, $savedPassword);
    $stmt->fetch();

    if ($password === $savedPassword) {
      $_SESSION["id_user"] = $id_user;
      $_SESSION["username"] = $username;
      header("Location: index.php");
      exit;
    } else {
      $errorMessage = "Password salah.";
    }
  } else {
    $errorMessage = "Email tidak ditemukan.";
  }

  $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - PINK Bakery</title>
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
    <h2>LOGIN</h2>
    <?php if ($errorMessage): ?>
      <p class="error"><?= $errorMessage ?></p>
    <?php endif; ?>
    <form method="POST" action="">
      <label>Email</label>
      <input type="email" name="email" required>

      <label>Password</label>
      <input type="text" name="password" required>

      <button type="submit">Login</button>

      <div class="link-bawah">
        Belum punya akun? <a href="register.php">Daftar</a>
      </div>
    </form>
  </main>
</body>
</html>
