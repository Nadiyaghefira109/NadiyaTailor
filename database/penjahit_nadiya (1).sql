-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2026 at 03:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjahit_nadiya`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `harga_dasar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `harga_dasar`) VALUES
(1, 'Kemeja Pria (Lengan Panjang/Pendek)', 120000),
(2, 'Celana Bahan / Chino', 150000),
(3, 'Blouse / Tunik Wanita', 135000),
(4, 'Gamis / Dress Muslimah', 200000),
(5, 'Jas Resmi / Blazer (Premium)', 450000),
(7, 'Celana Bahan / Chino', 150000),
(8, 'Blouse / Tunik Wanita', 135000),
(9, 'Gamis / Dress Muslimah', 200000),
(10, 'Jas Resmi / Blazer (Premium)', 450000),
(11, 'Daster Panjang', 100000),
(12, 'Hijab Instant (Manual)', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `no_telepon`, `alamat`) VALUES
(1, 'Siti Aminah', '6281234567890', 'Jl. Raden Intan No. 45, Bandar Lampung'),
(2, 'Budi Santoso', '6285788990011', 'Complex Kemiling Permai Blok C, Bandar Lampung'),
(3, 'Rina Wijaya', '6282177665544', 'Jl. Teuku Umar No. 12, Kedaton'),
(4, 'Siti Aminah', '6281234567890', 'Jl. Raden Intan No. 45, Bandar Lampung'),
(5, 'Budi Santoso', '6285788990011', 'Complex Kemiling Permai Blok C, Bandar Lampung'),
(6, 'Rina Wijaya', '6282177665544', 'Jl. Teuku Umar No. 12, Kedaton'),
(8, 'firsi', '084567876549', 'Gang senen');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `status_pesanan` enum('Menunggu','Diproses','Selesai','Diambil') NOT NULL DEFAULT 'Menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_pelanggan`, `id_kategori`, `tgl_masuk`, `tgl_selesai`, `status_pesanan`) VALUES
(1, 1, 4, '2026-06-15', '2026-06-22', 'Selesai'),
(2, 2, 1, '2026-06-20', '2026-06-25', 'Selesai'),
(3, 3, 5, '2026-06-22', '2026-07-02', 'Menunggu'),
(5, 2, 1, '2026-06-20', '2026-06-25', 'Diproses'),
(6, 3, 5, '2026-06-22', '2026-07-02', 'Menunggu'),
(8, 8, 12, '2026-06-23', '2026-06-29', 'Menunggu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `fk_pesanan_pelanggan` (`id_pelanggan`),
  ADD KEY `fk_pesanan_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_pesanan_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pesanan_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
