<?php
session_start();

echo "<h2>Isi Keranjang Belanja</h2>";

if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) {
    echo "<p>Keranjang masih kosong.</p>";
} else {
    echo "<ul>";
    foreach ($_SESSION['cart'] as $item) {
        echo "<li>ID Produk: " . htmlspecialchars($item['id_produk']) . 
             " | Jumlah: " . htmlspecialchars($item['jumlah']) . "</li>";
    }
    echo "</ul>";
}
?>

<a href="index.php">Kembali ke Beranda</a>
