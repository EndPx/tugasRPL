-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2024 pada 21.06
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkel_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mekanik`
--

CREATE TABLE `mekanik` (
  `id_mekanik` int(11) NOT NULL,
  `id_status` int(11) NOT NULL DEFAULT 1,
  `nama_mekanik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mekanik`
--

INSERT INTO `mekanik` (`id_mekanik`, `id_status`, `nama_mekanik`) VALUES
(1, 2, 'Joko'),
(2, 2, 'Udin'),
(3, 2, 'Ahmad'),
(4, 1, 'Juma'),
(5, 1, 'Asep');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `plat_kendaraan_pelanggan` varchar(255) NOT NULL,
  `keluhan_order` text NOT NULL,
  `tanggal_order` date NOT NULL DEFAULT current_timestamp(),
  `biaya_order` int(11) DEFAULT NULL,
  `id_mekanik` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id_order`, `nama_pelanggan`, `plat_kendaraan_pelanggan`, `keluhan_order`, `tanggal_order`, `biaya_order`, `id_mekanik`, `id_status`) VALUES
(5, 'ABC', 'AB 1 SU', 'Ganti Oli', '2024-05-30', 30000, 2, 3),
(6, 'ABC', 'AB 1 SU', 'Ganti Oli', '2024-05-30', 30000, 3, 3),
(7, 'ABC', 'AB 1 SU', 'asdw', '2024-05-30', 300000, 3, 3),
(8, 'ABC', 'AB 1 SU', 'asdw', '2024-05-30', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `statusmekanik`
--

CREATE TABLE `statusmekanik` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `statusmekanik`
--

INSERT INTO `statusmekanik` (`id_status`, `nama_status`) VALUES
(1, 'libur'),
(2, 'senggang'),
(3, 'kerja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statusorder`
--

CREATE TABLE `statusorder` (
  `id_status` int(11) NOT NULL,
  `nama_status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `statusorder`
--

INSERT INTO `statusorder` (`id_status`, `nama_status`) VALUES
(1, 0),
(2, 0),
(3, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mekanik`
--
ALTER TABLE `mekanik`
  ADD PRIMARY KEY (`id_mekanik`),
  ADD KEY `FK_mekanik` (`id_status`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `FK_order` (`id_mekanik`),
  ADD KEY `FK_statusorder` (`id_status`);

--
-- Indeks untuk tabel `statusmekanik`
--
ALTER TABLE `statusmekanik`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `statusorder`
--
ALTER TABLE `statusorder`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mekanik`
--
ALTER TABLE `mekanik`
  MODIFY `id_mekanik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `statusmekanik`
--
ALTER TABLE `statusmekanik`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `statusorder`
--
ALTER TABLE `statusorder`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mekanik`
--
ALTER TABLE `mekanik`
  ADD CONSTRAINT `FK_mekanik` FOREIGN KEY (`id_status`) REFERENCES `statusmekanik` (`id_status`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_order` FOREIGN KEY (`id_mekanik`) REFERENCES `mekanik` (`id_mekanik`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_statusorder` FOREIGN KEY (`id_status`) REFERENCES `statusorder` (`id_status`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
