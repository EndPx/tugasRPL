-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jun 2024 pada 19.12
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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin1', 'admin'),
(3, 'john', '1'),
(5, '1', '123'),
(6, 'tes', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mekanik`
--

CREATE TABLE `mekanik` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gaji` int(255) NOT NULL DEFAULT 0,
  `bonus` int(255) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL DEFAULT 'senggang',
  `total_permintaan` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mekanik`
--

INSERT INTO `mekanik` (`id`, `nama`, `username`, `password`, `gaji`, `bonus`, `status`, `total_permintaan`) VALUES
(5, 'Tes', 'root', '1', 500000, 0, 'sibuk', 1),
(6, 'dwa', 'ww', '123', 3000, 0, 'sibuk', 0),
(7, 'wsa', 'ahmad', '12', 231, 0, 'sibuk', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan`
--

CREATE TABLE `permintaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `plat_kendaraan` varchar(255) NOT NULL,
  `keluhan` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `id_admin` int(11) NOT NULL,
  `id_mekanik` int(11) NOT NULL,
  `detail` text DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `permintaan`
--

INSERT INTO `permintaan` (`id`, `nama`, `no_hp`, `plat_kendaraan`, `keluhan`, `status`, `tanggal`, `id_admin`, `id_mekanik`, `detail`, `biaya`) VALUES
(8, 'ahyat', '08123456789', 'AB 1 SU', 'Ban Bocor', 'pengecekan', '2024-06-17 09:38:00', 1, 5, NULL, NULL),
(9, 'a', '', 'a', 'a', 'pengecekan', '2024-06-17 09:38:42', 1, 6, NULL, NULL),
(10, 'adw', '21', '23', 'asdwa', 'pengecekan', '2024-06-17 09:41:06', 1, 7, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mekanik`
--
ALTER TABLE `mekanik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_admin` (`id_admin`),
  ADD KEY `FK_mekanik` (`id_mekanik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `mekanik`
--
ALTER TABLE `mekanik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  ADD CONSTRAINT `FK_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_mekanik` FOREIGN KEY (`id_mekanik`) REFERENCES `mekanik` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
