<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) {
    echo "<script>alert('Keranjang kosong.'); window.location.href='bakery.php';</script>";
    exit;
}

$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['harga'] * $item['qty'] * 1000;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Checkout - Metode Pembayaran</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f7f7f7;
      padding: 20px;
    }
    .container {
      max-width: 600px;
      margin: auto;
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 30px;
    }
    label { font-weight: bold; }
    input[type="text"], input[type="submit"] {
      width: 100%; padding: 10px; margin: 10px 0 20px 0;
      border: 1px solid #ccc; border-radius: 5px;
    }
    .section { margin-bottom: 20px; }
    .hidden { display: none; }
    .payment-option { margin: 8px 0; }
    .submit-button {
      background-color: #b37844;
      color: white;
      font-weight: bold;
      border: none;
      cursor: pointer;
    }
    .submit-button:hover {
      background-color: #944f1b;
    }
    .qr-img {
      display: block;
      margin: 10px auto;
      max-width: 200px;
    }
    .summary {
      background-color: #f2f2f2;
      padding: 15px;
      border-radius: 5px;
      font-size: 14px;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Checkout - Metode Pembayaran</h2>

  <form action="checkout_process.php" method="POST" onsubmit="return validatePayment()">
    <div class="section">
      <label for="nama">Nama Pelanggan:</label>
      <input type="text" name="nama" id="nama" required>
    </div>

    <div class="section">
      <label>Pilih Metode Pembayaran:</label><br>
      <div class="payment-option"><input type="radio" name="metode" value="bank" onclick="selectMethod('bank')"> Transfer Bank</div>
      <div class="payment-option"><input type="radio" name="metode" value="qris" onclick="selectMethod('qris')"> QRIS</div>
      <div class="payment-option"><input type="radio" name="metode" value="ewallet" onclick="selectMethod('ewallet')"> E-Wallet</div>
    </div>

    <!-- Transfer Bank -->
    <div class="section hidden" id="bank-section">
      <label>Pilih Bank:</label><br>
      <input type="radio" name="bank" value="BCA" onclick="setVA('0862837912392474528')"> BCA<br>
      <input type="radio" name="bank" value="Mandiri" onclick="setVA('1402938402390239823')"> Mandiri<br>
      <input type="radio" name="bank" value="BNI" onclick="setVA('1203948120381238401')"> BNI<br><br>
      <label>Virtual Account:</label>
      <input type="text" id="va" name="va" readonly>
    </div>

    <!-- QRIS -->
    <div class="section hidden" id="qris-section">
      <label>Scan QR Code:</label>
      <img src="image/qr.png" alt="QRIS Code" class="qr-img">
    </div>

    <!-- E-Wallet -->
    <div class="section hidden" id="ewallet-section">
      <label>Pilih E-Wallet:</label><br>
      <input type="radio" name="ewallet" value="OVO" onclick="setEwallet('081234567890')"> OVO<br>
      <input type="radio" name="ewallet" value="DANA" onclick="setEwallet('085678912345')"> DANA<br>
      <input type="radio" name="ewallet" value="GoPay" onclick="setEwallet('082298765432')"> GoPay<br><br>
      <label>Nomor Tujuan:</label>
      <input type="text" id="ewallet-number" name="ewallet_number" readonly>
    </div>

    <!-- Ringkasan -->
    <div class="section">
      <label>Ringkasan Pembayaran:</label>
      <div class="summary">
        Total Produk: <?= count($_SESSION['cart']) ?> item<br>
        Total Bayar: <strong>Rp <?= number_format($total, 0, ',', '.') ?></strong>
      </div>
      <input type="hidden" name="total" value="<?= $total ?>">
    </div>

    <input type="submit" value="Konfirmasi Pembayaran" class="submit-button">
  </form>
</div>

<script>
  function selectMethod(method) {
    document.getElementById('bank-section').classList.add('hidden');
    document.getElementById('qris-section').classList.add('hidden');
    document.getElementById('ewallet-section').classList.add('hidden');
    if (method === 'bank') document.getElementById('bank-section').classList.remove('hidden');
    if (method === 'qris') document.getElementById('qris-section').classList.remove('hidden');
    if (method === 'ewallet') document.getElementById('ewallet-section').classList.remove('hidden');
  }

  function setVA(nomor) {
    document.getElementById('va').value = nomor;
  }

  function setEwallet(nomor) {
    document.getElementById('ewallet-number').value = nomor;
  }

  function validatePayment() {
    const metode = document.querySelector('input[name="metode"]:checked');
    if (!metode) {
      alert("Silakan pilih metode pembayaran.");
      return false;
    }
    return true;
  }
</script>

</body>
</html>
