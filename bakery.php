<?php
session_start();
include 'koneksi.php';

if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

// Inisialisasi cart session
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

// Tangani tombol add to cart
if (isset($_POST['add_to_cart'])) {
  $id = $_POST['id_produk'];

  // Ambil data produk dari database
  $result = mysqli_query($conn, "SELECT * FROM tb_produk WHERE id_produk = $id");
  $produk = mysqli_fetch_assoc($result);

  if ($produk && $produk['stok'] > 0) {
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
      if ($item['id_produk'] == $id) {
        if ($item['qty'] < $produk['stok']) {
          $item['qty'] += 1;
        }
        $found = true;
        break;
      }
    }

    if (!$found) {
      $_SESSION['cart'][] = [
        'id_produk' => $id,
        'nama' => $produk['nama_produk'],
        'harga' => $produk['harga'], 
        'gambar' => $produk['gambar'],
        'qty' => 1
      ];
    }
  }
}


// Tangani remove dari cart
if (isset($_POST['remove_from_cart'])) {
  $id = $_POST['id_produk'];
  foreach ($_SESSION['cart'] as $key => $item) {
    if ($item['id_produk'] == $id) {
      if ($_SESSION['cart'][$key]['qty'] > 1) {
        $_SESSION['cart'][$key]['qty'] -= 1;
      } else {
        unset($_SESSION['cart'][$key]);
      }
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>MENU - PINK Bakery</title>
  <style>
    body { background: #f5f5f5; font-family: arial; margin: 0; }
    header {
      background-color: #b37841;
      color: white;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-weight: bold;
    }
    nav a { margin-left: 20px; color: white; text-decoration: none; font-size: 14px; }
    .container {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      padding: 30px;
    }
    .product-card {
      width: 200px;
      background-color: #b37841;
      color: white;
      padding: 15px;
      border-radius: 10px;
      text-align: center;
    }
    .product-card img {
      width: 100%;
      height: 150px;
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 10px;
    }
    .product-card button {
      margin-top: 5px;
      padding: 6px 10px;
      border: none;
      background: #d56700;
      color: white;
      width: 100%;
      cursor: pointer;
      font-weight: bold;
    }
    #cart-summary {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: #b37841;
      color: white;
      padding: 10px;
      border-radius: 8px;
    }
    #cart-summary button {
      background: orange;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
      font-weight: bold;
      margin-top: 5px;
    }
  </style>
</head>
<body>

<header>
  <div class="logo">PINK<br><strong>Bakery</strong></div>
  <nav>
    <a href="index.php">HOME</a>
    <a href="bakery.php">MENU</a>
    <a href="cart.php">CART</a>
    <a href="logout.php">LOGOUT</a>
  </nav>
</header>

<div class="container">
<?php
$result = mysqli_query($conn, "SELECT * FROM tb_produk");
while ($row = mysqli_fetch_assoc($result)) {
?>
  <div class="product-card">
    <img src="image/<?= $row['gambar'] ?>" alt="<?= $row['nama_produk'] ?>">
    <p><strong><?= $row['nama_produk'] ?></strong></p>
    <p>⭐<?= $row['rating'] ?></p>
    <p>Rp. <?= number_format($row['harga'] * 1000, 0, ',', '.') ?></p>
    <p>Stok: <?= $row['stok'] ?></p>
    <form method="POST">
      <input type="hidden" name="id_produk" value="<?= $row['id_produk'] ?>">
      <button type="submit" name="add_to_cart" <?= $row['stok'] == 0 ? 'disabled' : '' ?>>Add to cart</button>
    </form>
    <form method="POST">
      <input type="hidden" name="id_produk" value="<?= $row['id_produk'] ?>">
      <button type="submit" name="remove_from_cart">Remove from cart</button>
    </form>
  </div>
<?php } ?>
</div>

<div id="cart-summary">
  <h4>🛒 Cart Summary</h4>
  <p>Items:
    <?= isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'qty')) : 0 ?>
  </p>
  <p>Total: Rp.
    <?php
      $total = 0;
      if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
          $total += $item['harga'] * $item['qty'] * 1000; // ← ini penting
        }
      }
      echo number_format($total, 0, ',', '.'); // Format: 15.000
    ?>
  </p>
  <button onclick="location.href='cart.php'">Pesan Sekarang</button>
</div>



</body>
</html>