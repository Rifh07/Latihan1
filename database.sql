-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Mar 2021 pada 16.43
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_produk`
--

INSERT INTO `jenis_produk` (`id`, `nama`) VALUES
(1, 'Baju'),
(2, 'Jaket');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `jenis` int(11) NOT NULL,
  `gambar` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `hapus` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `jenis`, `gambar`, `stok`, `harga`, `hapus`) VALUES
(3, 'Prelove', 1, 'prelove.jpg', 11, 75000, 'false'),
(4, 'Jeans', 2, 'jeans.webp', 10, 100000, 'false'),
(6, 'Jersey', 1, 'jersey.webp', 12, 150000, 'false'),
(7, 'Capung', 1, 'capung.jpg', 100, 60000, 'false');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `tglLahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `tlp`, `tglLahir`) VALUES
(3, 'Syarif Hidayat', 'syarifhidayat400@gmail.com', '6eea9b7ef19179a06954edd0f6c05ceb', 'Admin', '098765', '2021-02-23'),
(4, 'Rozid', 'rozid@gmail.com', '6eea9b7ef19179a06954edd0f6c05ceb', 'Customer', '098765432', '2020-02-04'),
(5, 'Gina Yulisman', 'ginayulisman9@gmail.com', '6eea9b7ef19179a06954edd0f6c05ceb', 'Customer', '0888888888', '2000-07-29'),
(7, 'Awal', 'awalll@gmail.com', '6eea9b7ef19179a06954edd0f6c05ceb', 'Customer', '08336559330', '2021-03-03'),
(8, 'Sri', 'srii@gmail.com', '6eea9b7ef19179a06954edd0f6c05ceb', 'Customer', '083336668888', '2021-03-01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_produk` (`jenis`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `jenis_produk` FOREIGN KEY (`jenis`) REFERENCES `jenis_produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
