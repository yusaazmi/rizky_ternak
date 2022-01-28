-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 20, 2021 at 03:07 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `x`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_ayam`
--

CREATE TABLE `t_ayam` (
  `id_ayam` int(5) NOT NULL,
  `jenis_ayam` varchar(20) NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  `harga` int(20) NOT NULL,
  `gambar` varchar(500) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_ayam`
--

INSERT INTO `t_ayam` (`id_ayam`, `jenis_ayam`, `ukuran`, `harga`, `gambar`, `deskripsi`) VALUES
(2, 'Ayam Potong', '2kg', 30000, '2911202008385725082020155635ayam.3.jpg', 'Ayam yang telah diolah dan sudah bersih'),
(3, 'Ayam Hidup', '5kg', 100000, '291120200913092811202016421410082020195844ayam boiler.jpg', 'Ayam sehat yang masih hidup'),
(5, 'Ayam Utuh', '10kg', 120000, '20012021030419download.jfif', 'Ayam utuh 1 ekor yang telah diolah');

-- --------------------------------------------------------

--
-- Table structure for table `t_cart`
--

CREATE TABLE `t_cart` (
  `id_cart` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_ayam` int(5) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_cart`
--

INSERT INTO `t_cart` (`id_cart`, `id_user`, `id_ayam`, `jumlah`) VALUES
(29, 7, 2, 1),
(30, 7, 3, 1),
(32, 5, 2, 1),
(34, 5, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `t_contact`
--

CREATE TABLE `t_contact` (
  `id_contact` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subjek` varchar(50) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_pemesanan`
--

CREATE TABLE `t_pemesanan` (
  `id_pemesanan` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `jml_pemesanan` int(20) NOT NULL,
  `bukti_pembayaran` varchar(500) NOT NULL,
  `kode_unik` int(10) NOT NULL,
  `total_bayar` int(20) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `status_pembayaran` enum('belum terbayar','terbayar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pemesanan`
--

INSERT INTO `t_pemesanan` (`id_pemesanan`, `id_user`, `jml_pemesanan`, `bukti_pembayaran`, `kode_unik`, `total_bayar`, `tgl_pemesanan`, `status_pembayaran`) VALUES
(1, 5, 2, '', 54, 130054, '2020-12-01', 'belum terbayar'),
(10, 5, 3, '07122020162026carbon4.png', 5, 90005, '2020-12-07', 'belum terbayar'),
(11, 7, 3, '07122020170512instagram-icon_1057-2227.jpg', 7, 250007, '2020-12-07', 'terbayar'),
(12, 5, 1, '21122020042227x.png', 5, 30005, '2020-12-21', 'belum terbayar'),
(13, 5, 4, '20012021024829IMG-20210102-WA0014-min.png', 5, 330005, '2021-01-20', 'terbayar'),
(14, 7, 3, '20012021025754computer-icons-user-user-png-clip-art.png', 7, 250007, '2021-01-20', 'belum terbayar'),
(15, 7, 3, '20012021025825IMG-20210102-WA0014-min.png', 7, 250007, '2021-01-20', 'belum terbayar');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kodepos` varchar(6) NOT NULL,
  `no_hp` char(13) NOT NULL,
  `type_user` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `username`, `password`, `nama`, `alamat`, `kodepos`, `no_hp`, `type_user`) VALUES
(5, 'wahyu', '202cb962ac59075b964b07152d234b70', 'Wahyu Nugroho', 'Bogelan, RT 04 / RW 02', '56351', '082123123123', 'user'),
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '', '', '', 'admin'),
(7, 'aa', '202cb962ac59075b964b07152d234b70', 'aa', 'kalibeber', '56351', '2323232', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_ayam`
--
ALTER TABLE `t_ayam`
  ADD PRIMARY KEY (`id_ayam`);

--
-- Indexes for table `t_cart`
--
ALTER TABLE `t_cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_user` (`id_user`,`id_ayam`),
  ADD KEY `id_ayam` (`id_ayam`);

--
-- Indexes for table `t_contact`
--
ALTER TABLE `t_contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `t_pemesanan`
--
ALTER TABLE `t_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_ayam`
--
ALTER TABLE `t_ayam`
  MODIFY `id_ayam` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_cart`
--
ALTER TABLE `t_cart`
  MODIFY `id_cart` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `t_contact`
--
ALTER TABLE `t_contact`
  MODIFY `id_contact` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_pemesanan`
--
ALTER TABLE `t_pemesanan`
  MODIFY `id_pemesanan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_cart`
--
ALTER TABLE `t_cart`
  ADD CONSTRAINT `t_cart_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_cart_ibfk_3` FOREIGN KEY (`id_ayam`) REFERENCES `t_ayam` (`id_ayam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_pemesanan`
--
ALTER TABLE `t_pemesanan`
  ADD CONSTRAINT `t_pemesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
