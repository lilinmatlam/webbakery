<?php
session_start();
include 'koneksi.php';

// Ambil data dari form
$nama     = $_POST['nama'] ?? '-';
$metode   = $_POST['metode'] ?? '-';
$bank     = $_POST['bank'] ?? NULL;
$va       = $_POST['va'] ?? NULL;
$ewallet  = $_POST['ewallet'] ?? NULL;
$nomor    = $_POST['ewallet_number'] ?? NULL;
$total    = $_POST['total'] ?? 0;

// Ambil id_user dari session
$id_user = $_SESSION['id_user'] ?? null;

// Simpan transaksi utama ke tabel `transaksi`
$sql = "INSERT INTO transaksi (id_user, nama, metode, bank, va, ewallet, nomor_ewallet, total)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'issssssi', $id_user, $nama, $metode, $bank, $va, $ewallet, $nomor, $total);

if (mysqli_stmt_execute($stmt)) {
    // Ambil id transaksi terakhir yang baru dibuat
    $id_transaksi = mysqli_insert_id($conn);

    // Simpan setiap item dalam keranjang ke tabel detail_transaksi dan kurangi stok
    foreach ($_SESSION['cart'] as $item) {
        $id_produk = $item['id_produk'];
        $qty       = $item['qty'];
        $harga     = $item['harga'] * 1000;
        $subtotal  = $harga * $qty;

        // Simpan ke detail_transaksi
        $sql_detail = "INSERT INTO detail_transaksi (id_transaksi, id_produk, qty, harga_satuan, subtotal)
                       VALUES (?, ?, ?, ?, ?)";
        $stmt_detail = mysqli_prepare($conn, $sql_detail);
        mysqli_stmt_bind_param($stmt_detail, 'iiiii', $id_transaksi, $id_produk, $qty, $harga, $subtotal);
        mysqli_stmt_execute($stmt_detail);

        // Update stok produk
        $sql_update = "UPDATE tb_produk SET stok = stok - ? WHERE id_produk = ?";
        $stmt_update = mysqli_prepare($conn, $sql_update);
        mysqli_stmt_bind_param($stmt_update, 'ii', $qty, $id_produk);
        mysqli_stmt_execute($stmt_update);
    }

    // Kosongkan keranjang
    unset($_SESSION['cart']);

    // Tampilkan halaman sukses
    echo "<!DOCTYPE html>
    <html lang='id'>
    <head>
      <meta charset='UTF-8'>
      <title>Pembayaran Berhasil</title>
      <style>
        .success-card {
          max-width: 600px;
          margin: 60px auto;
          padding: 30px;
          background-color: #f0fdf4;
          border: 2px solid #a7f3d0;
          border-radius: 12px;
          text-align: center;
          box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
          font-family: Arial, sans-serif;
        }
        .success-card h2 { color: #15803d; }
        .success-icon {
          font-size: 48px;
          color: #22c55e;
          margin-bottom: 10px;
        }
        .success-info {
          text-align: left;
          margin-top: 20px;
          line-height: 1.6;
        }
        .success-info strong {
          display: inline-block;
          width: 140px;
        }
      </style>
    </head>
    <body>
      <div class='success-card'>
        <div class='success-icon'>✔️</div>
        <h2>Pembayaran Berhasil!</h2>
        <p>Terima kasih, <strong>$nama</strong></p>
        <div class='success-info'>
          <p><strong>Metode:</strong> $metode</p>";

    if ($metode === 'bank') {
        echo "<p><strong>Bank:</strong> $bank</p>";
        echo "<p><strong>VA:</strong> $va</p>";
    } elseif ($metode === 'ewallet') {
        echo "<p><strong>E-Wallet:</strong> $ewallet</p>";
        echo "<p><strong>Nomor Tujuan:</strong> $nomor</p>";
    } elseif ($metode === 'qris') {
        echo "<p>Silakan scan QR yang telah ditampilkan sebelumnya.</p>";
    }

    echo "<p><strong>Total:</strong> Rp " . number_format($total, 0, ',', '.') . "</p>
        </div>
      </div>
    </body>
    </html>";

} else {
    echo "❌ Gagal menyimpan transaksi: " . mysqli_error($conn);
}
?>
