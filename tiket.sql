-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Agu 2021 pada 02.35
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uasweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `id` int(11) NOT NULL,
  `pemesan` varchar(225) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `tarif` varchar(30) NOT NULL,
  `jumlahtiket` varchar(10) NOT NULL,
  `totalharga` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`id`, `pemesan`, `tujuan`, `tarif`, `jumlahtiket`, `totalharga`) VALUES
(1, 'MIFTA', 'TEHORU', '230000', '1', '230000'),
(2, 'CACA', 'BULA', '100000', '2', '200000'),
(3, 'SUKMA', 'HITU', '24000', '3', '72000'),
(4, 'SAPIA', 'BATUKONENG', '20000', '5', '100000'),
(5, 'AIDA', 'WAISALA', '50000', '2', '100000'),
(6, 'FIRDA', 'WAKAL', '25000', '3', '75000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
