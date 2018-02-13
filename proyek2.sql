-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2018 at 03:50 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `foto`) VALUES
(1, 'sugeng', 'admin', '202cb962ac59075b964b07152d234b70', ''),
(2, 'dodik', 'admin', '202cb962ac59075b964b07152d234b70', '');

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `id_lapangan` int(11) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `ukuran` varchar(15) NOT NULL,
  `texture` varchar(15) NOT NULL,
  `harga` int(10) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`id_lapangan`, `nama`, `ukuran`, `texture`, `harga`, `foto`) VALUES
(16, 'Lapangan 1', 'Kecil', 'Rumput', 80000, 'lapangan.jpg'),
(17, 'Lapangan 2', 'Besar', 'Rumput', 100000, 'lapangan_futsal.jpg'),
(18, 'Lapangan 3', 'Besar', 'Vinyl', 110000, 'lapangan_vinyl.jpg'),
(19, 'Lapangan 4', 'Kecil', 'Rumput', 90000, 'garuda_air.jpg'),
(20, 'Lapangan 5', 'Besar', 'Rumput', 75000, 'lapangan_futsal.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(5) NOT NULL,
  `id_penyewa` int(5) NOT NULL,
  `id_lapangan` int(5) NOT NULL,
  `lama` int(5) NOT NULL,
  `bayar` int(15) NOT NULL,
  `jam` time NOT NULL,
  `tgl_pesan` date NOT NULL,
  `tgl_main` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_penyewa`, `id_lapangan`, `lama`, `bayar`, `jam`, `tgl_pesan`, `tgl_main`) VALUES
(11, 1, 18, 2, 220000, '10:45:00', '2018-01-19', '2018-01-19'),
(12, 2, 16, 1, 80000, '01:00:00', '2018-01-19', '2018-01-01'),
(13, 3, 16, 1, 80000, '01:00:00', '2018-01-19', '2018-01-01'),
(14, 4, 16, 1, 80000, '01:00:00', '2018-01-19', '2018-01-01'),
(15, 1, 17, 2, 200000, '14:16:00', '2018-01-19', '2018-01-19'),
(16, 1, 18, 2, 220000, '15:46:00', '2018-01-19', '2018-01-20'),
(17, 2, 19, 10, 900000, '21:39:00', '2018-01-19', '2018-03-17'),
(18, 1, 19, 2, 180000, '11:01:00', '2018-01-24', '2018-01-25'),
(19, 5, 18, 5, 550000, '21:38:00', '2018-01-24', '2018-01-31'),
(20, 1, 16, 2, 160000, '18:30:00', '2018-01-24', '2018-01-25'),
(21, 6, 17, 3, 300000, '16:23:00', '2018-02-06', '2018-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `id_penyewa` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` int(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`id_penyewa`, `nama`, `alamat`, `telepon`, `email`, `password`, `foto`) VALUES
(1, 'sugeng', 'malang', 2147483647, 'ssumpil@gmail.com', '202cb962ac59075b964b07152d234b70', ''),
(2, 'dodik', 'malang', 0, 'dodik@gmail.com', '202cb962ac59075b964b07152d234b70', ''),
(3, 'GUEST', 'malang', 0, 'guest@gmail.com', '202cb962ac59075b964b07152d234b70', ''),
(4, 'zaki', 'blitar', 856453, 'zaki@gmail.com', '202cb962ac59075b964b07152d234b70', ''),
(5, 'mr.X', 'malang', 8558, 'x@gmail.com', '202cb962ac59075b964b07152d234b70', ''),
(6, 'Dwi', 'mlg', 896, 'dwi@gmail.com', '202cb962ac59075b964b07152d234b70', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(15) NOT NULL,
  `id_pemesanan` varchar(5) NOT NULL,
  `id_penyewa` int(5) NOT NULL,
  `status` varchar(10) NOT NULL,
  `bukti` text NOT NULL,
  `kurang` int(10) NOT NULL,
  `qr_code` text NOT NULL,
  `verified` int(3) NOT NULL,
  `scan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pemesanan`, `id_penyewa`, `status`, `bukti`, `kurang`, `qr_code`, `verified`, `scan`) VALUES
('13Oftgmx', '21', 6, 'DP', 'IMG_3294.JPG', 185000, '13Oftgmx.png', 0, 0),
('HvDjNz0e', '13', 3, 'Lunas', '1489201_661739243885622_115674729_n.jpg', 0, 'HvDjNz0e.png', 0, 0),
('itfU375I', '15', 1, 'DP', 'buktitransaksi.jpg', 160000, 'itfU375I.png', 0, 0),
('O3Vs4mAn', '17', 2, 'DP', 'Lion_Air_logo.png', 212000, 'O3Vs4mAn.png', 0, 0),
('rwuJaG62', '12', 2, 'DP', 'bmth.png', 219998, 'rwuJaG62.png', 0, 0),
('XH4DE2hg', '11', 1, 'DP', 'susi_air.png', 190000, 'XH4DE2hg.png', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id_lapangan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`id_penyewa`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id_lapangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id_penyewa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
