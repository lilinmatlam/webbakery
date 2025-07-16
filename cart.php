<?php
session_start();
include 'koneksi.php';

// Cek apakah keranjang kosong
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    echo "<script>alert('Keranjang kosong.'); window.location.href='bakery.php';</script>";
    exit;
}

// Hitung total belanja
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['harga'] * $item['qty'] *1000;
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Cart - PINK Bakery</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      margin: 0;
      padding: 30px;
    }
    .container {
      max-width: 800px;
      margin: auto;
      background-color: white;
      padding: 25px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 25px;
    }
    .item {
      display: flex;
      gap: 20px;
      margin-bottom: 20px;
      border-bottom: 1px solid #ddd;
      padding-bottom: 15px;
    }
    .item img {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 8px;
    }
    .details {
      flex: 1;
    }
    .details h4 {
      margin: 0 0 8px 0;
    }
    .details p {
      margin: 4px 0;
    }
    .total {
      text-align: right;
      font-size: 18px;
      font-weight: bold;
      margin-top: 20px;
    }
    .btn-purchase {
      display: block;
      margin: 30px auto 0;
      background-color: #b37841;
      color: white;
      padding: 12px 25px;
      border: none;
      font-size: 16px;
      font-weight: bold;
      border-radius: 6px;
      cursor: pointer;
    }
    .btn-purchase:hover {
      background-color: #944f1b;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Keranjang Belanja</h2>

  <?php foreach ($_SESSION['cart'] as $item): ?>
  <div class="item">
    <img src="image/<?= htmlspecialchars($item['gambar']) ?>" alt="<?= htmlspecialchars($item['nama']) ?>">
    <div class="details">
      <h4><?= htmlspecialchars($item['nama']) ?></h4>
      <p>Harga: Rp <?= number_format($item['harga'] * 1000, 0, '.') ?></p>
      <p>Jumlah: <?= $item['qty'] ?></p>
      <p>Subtotal: <strong>Rp <?= number_format($item['harga'] * $item['qty'] * 1000, 0, '.') ?></strong></p>
    </div>
  </div>
<?php endforeach; ?>


  <form method="POST" action="checkout.php">
    <input type="hidden" name="total_harga" value="<?= $total ?>">
    
    <div style="margin-top:20px;">
      <label><strong>Pilih Metode Pemesanan:</strong></label><br>
      <input type="radio" name="metode" value="pickup" checked> Pickup (Ambil di outlet)<br>
      <input type="radio" name="metode" value="dinein"> Dine-In (Makan di tempat)<br>
      <input type="radio" name="metode" value="delivery"> Delivery (Diantar ke alamat)
    </div>

    <div class="total">
      Total Belanja: Rp <?= number_format($total, 0, ',', '.') ?>
    </div>

    <button type="submit" class="btn-purchase">Purchase Now</button>
    <button type="button" class="btn-purchase" onclick="window.location.href='bakery.php'">Kembali ke Menu</button>
  </form>
</div>

</body>
</html>
