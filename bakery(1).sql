-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jul 2025 pada 12.46
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bakery`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_produk`, `qty`, `harga_satuan`, `subtotal`) VALUES
(4, 5, 6, 1, 10000, 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bestseller`
--

CREATE TABLE `tb_bestseller` (
  `id_bestseller` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_bestseller`
--

INSERT INTO `tb_bestseller` (`id_bestseller`, `id_produk`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_feedback`
--

CREATE TABLE `tb_feedback` (
  `id_feedback` int(11) NOT NULL,
  `review` varchar(255) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_feedback`
--

INSERT INTO `tb_feedback` (`id_feedback`, `review`, `email`, `id_user`) VALUES
(1, 'pelayannya bagus', 'cika@gmail.com', 5),
(2, 'ihh kuenya ga enak', 'claudiachania@gmail.com', 6),
(3, 'pelayananya bagus', 'kafa@gmail.com', 7),
(4, 'oke okey', 'almi1@gmail.com', 8),
(5, 'okey', 'zaki@gmail.com', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(11) NOT NULL,
  `metode` varchar(100) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `metode`, `total`, `tanggal`) VALUES
(1, 'Pickup (Ambil di outlet)', 10000, '2025-07-10 03:53:20'),
(2, 'Dine-In (Makan di tempat)', 10000, '2025-07-10 03:54:22'),
(3, 'Dine-In (Makan di tempat)', 80000, '2025-07-10 03:54:54'),
(4, 'Dine-In (Makan di tempat)', 100000, '2025-07-10 03:55:50'),
(5, 'Pickup (Ambil di outlet)', 20000, '2025-07-10 03:56:24'),
(6, 'Pickup (Ambil di outlet)', 30000, '2025-07-10 03:56:47'),
(7, 'Dine-In (Makan di tempat)', 15000, '2025-07-10 04:07:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order_detail`
--

CREATE TABLE `tb_order_detail` (
  `id_detail` int(11) NOT NULL,
  `id_order` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_order_detail`
--

INSERT INTO `tb_order_detail` (`id_detail`, `id_order`, `id_produk`, `qty`, `harga`) VALUES
(1, 1, 6, 1, 10000),
(2, 2, 8, 1, 10000),
(3, 3, 7, 1, 50000),
(4, 3, 2, 1, 15000),
(5, 3, 2, 1, 15000),
(6, 4, 7, 1, 50000),
(7, 4, 3, 1, 25000),
(8, 4, 3, 1, 25000),
(9, 5, 8, 1, 10000),
(10, 5, 8, 1, 10000),
(11, 6, 4, 1, 30000),
(12, 7, 1, 1, 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `stok` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `harga`, `rating`, `gambar`, `stok`) VALUES
(1, 'Cupcake Coklat', 15, 5, 'cupcake.jpg', 7),
(2, 'Tart Fruit', 15, 4, 'img6.jpg', 3),
(3, 'Korean Cream Cheese Garlic Bread', 25, 5, 'img7.jpg', 6),
(4, 'Vanila Eclairs', 30, 5, 'image.jpg', 4),
(5, 'Strawberry Cheesecake Pound Cake', 85, 5, 'img14.jpg', 4),
(6, 'Cromboloni Coklat', 10, 5, 'img20.png', 7),
(7, 'Bolu Almond Keju', 50, 5, 'img4.png', 3),
(8, 'Cupcake Strawberry', 10, 4, 'img3.png', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_promo`
--

CREATE TABLE `tb_promo` (
  `id_promo` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_promo`
--

INSERT INTO `tb_promo` (`id_promo`, `judul`, `deskripsi`, `gambar`, `id_produk`) VALUES
(4, 'BOGO Bakery', 'Beli 1 Gratis 1 untuk produk pilihan.', 'img3.png', 8),
(5, 'Diskon Meringue Bolu', 'Dapatkan potongan harga 20% hari ini!', 'img4.png', 7),
(6, 'Combo Deal 3 for 2', 'Beli 2 Dapat 3 combo manis dan lembut.', 'img20.png', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `email`, `password`) VALUES
(1, 'claudia', 'claudia@gmail.com', '$2y$10$ktO0jIgJbqXxbA79qdXL9OI'),
(2, 'aurel', 'aurel12@gmail.com', '$2y$10$r8dbFHdBYs2BV0NyNymc/uY'),
(3, 'arlin@gmail.com', 'arlin@gmail.com', '$2y$10$Y8I7PxX66pb18GVt0G7dJeO'),
(4, 'aray', 'aray@gmail.com', '$2y$10$LLssYfA577ehfKxrw1Jgcu/'),
(5, 'cika', 'cika@gmail.com', 'cika123'),
(6, 'claudiachania', 'claudiachania@gmail.com', 'claudia123'),
(7, 'kafa', 'kafa@gmail.com', 'kafa123'),
(8, 'almiii', 'almi1@gmail.com', 'almi123'),
(9, 'zaki', 'zaki@gmail.com', 'zaki123'),
(10, 'kalyca', 'kalyca@gmail.com', 'kalyca123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `metode` varchar(20) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `va` varchar(50) DEFAULT NULL,
  `ewallet` varchar(50) DEFAULT NULL,
  `nomor_ewallet` varchar(50) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `nama`, `metode`, `bank`, `va`, `ewallet`, `nomor_ewallet`, `total`, `tanggal`) VALUES
(5, 10, 'kalyca', 'bank', 'BCA', '0862837912392474528', NULL, '', 10000, '2025-07-13 04:26:25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `tb_bestseller`
--
ALTER TABLE `tb_bestseller`
  ADD PRIMARY KEY (`id_bestseller`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `tb_feedback`
--
ALTER TABLE `tb_feedback`
  ADD PRIMARY KEY (`id_feedback`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tb_promo`
--
ALTER TABLE `tb_promo`
  ADD PRIMARY KEY (`id_promo`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_bestseller`
--
ALTER TABLE `tb_bestseller`
  MODIFY `id_bestseller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_feedback`
--
ALTER TABLE `tb_feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_promo`
--
ALTER TABLE `tb_promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `tb_bestseller`
--
ALTER TABLE `tb_bestseller`
  ADD CONSTRAINT `tb_bestseller_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `tb_feedback`
--
ALTER TABLE `tb_feedback`
  ADD CONSTRAINT `tb_feedback_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_promo`
--
ALTER TABLE `tb_promo`
  ADD CONSTRAINT `tb_promo_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
