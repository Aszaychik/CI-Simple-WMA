-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2024 at 05:54 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lilisdwi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_penjualan`
--

CREATE TABLE `tabel_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_penjualan`
--

INSERT INTO `tabel_penjualan` (`id_penjualan`, `tanggal_penjualan`, `jumlah`) VALUES
(2, '2023-01-15', 1578),
(3, '2023-02-15', 1302),
(4, '2024-03-15', 1434),
(5, '2023-04-15', 1384),
(6, '2023-05-15', 1392),
(7, '2023-06-15', 1420),
(8, '2023-07-15', 1480),
(9, '2023-08-15', 1440),
(10, '2023-09-15', 1430),
(11, '2023-10-15', 1420),
(12, '2023-11-15', 1370);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`id_user`, `nama_user`, `username`, `password`, `alamat`, `telp`) VALUES
(1, 'Dwi Lilis Suryani', 'lilis', '123', 'Tikung', '085834661714'),
(2, 'Agung Wahyudi', 'agung', '123', 'Dusun Duren Desa Lawak Kecamatan Ngimbang', '085834661714');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_penjualan`
--
ALTER TABLE `tabel_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_penjualan`
--
ALTER TABLE `tabel_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
