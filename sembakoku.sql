-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Des 2023 pada 12.26
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sembakoku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_Admin` int(5) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_Admin`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail order`
--

CREATE TABLE `detail order` (
  `id_DetailOrder` int(10) NOT NULL,
  `id_Order` int(5) DEFAULT NULL,
  `id_Produk` int(5) DEFAULT NULL,
  `jumlah` int(5) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_Kategori` int(5) NOT NULL,
  `Namakategori` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_Kategori`, `Namakategori`) VALUES
(1, 'Sabun Mandi'),
(4, 'Deterjen'),
(6, 'Minuman'),
(7, 'Minyak Goreng'),
(8, 'Sembako');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_konsumen` int(5) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `Namakonsumen` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `telepon` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_konsumen`, `username`, `password`, `Namakonsumen`, `email`, `alamat`, `telepon`) VALUES
(1, 'Terry', '123', 'Jinx_Pro_TerRy', 'Jinx_Pro_TerRy@gmail.com', 'Tangerang', 9213123);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id_Order` int(5) NOT NULL,
  `id_Konsumen` int(5) DEFAULT NULL,
  `Tglorder` date DEFAULT NULL,
  `StatusOrder` enum('Dikemas','Dikirim','Sampai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_Produk` int(5) NOT NULL,
  `id_Kategori` int(5) DEFAULT NULL,
  `Namaproduk` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `Deskripsiproduk` text DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  `stok` int(5) NOT NULL,
  `berat` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_Produk`, `id_Kategori`, `Namaproduk`, `foto`, `Deskripsiproduk`, `harga`, `stok`, `berat`) VALUES
(1, 4, 'Deterjen Attack', 'deterjen.jpeg', 'Launch Attack, Retreat, Mainya hebat', 15000, 0, 0),
(10, 6, 'Kopi ABC', 'Kopi_ABC.jpeg', 'Kopi ABC rasa nanas', 3000, 0, 0),
(11, 1, 'Sabun Detol', 'sabun.jpg', 'Sabun mandi aroma nanas enak', 7000, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_Admin`);

--
-- Indeks untuk tabel `detail order`
--
ALTER TABLE `detail order`
  ADD PRIMARY KEY (`id_DetailOrder`),
  ADD KEY `id_Order` (`id_Order`),
  ADD KEY `id_Produk` (`id_Produk`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_Kategori`) USING BTREE;

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_Order`),
  ADD UNIQUE KEY `id_Konsumen` (`id_Konsumen`),
  ADD KEY `id_Konsumen_2` (`id_Konsumen`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_Produk`),
  ADD KEY `id_Kategori` (`id_Kategori`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_Admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `detail order`
--
ALTER TABLE `detail order`
  MODIFY `id_DetailOrder` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_Kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_konsumen` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `id_Order` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_Produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail order`
--
ALTER TABLE `detail order`
  ADD CONSTRAINT `detail order_ibfk_1` FOREIGN KEY (`id_Produk`) REFERENCES `produk` (`id_Produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail order_ibfk_2` FOREIGN KEY (`id_Order`) REFERENCES `order` (`id_Order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_Konsumen`) REFERENCES `member` (`id_konsumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_Kategori`) REFERENCES `kategori` (`id_Kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
