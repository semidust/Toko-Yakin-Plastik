-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2023 at 11:58 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoplastik`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(5) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `modal` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `modal`, `harga`, `stok`) VALUES
(220001, 'Asoy Alladin Warna 1kg', 11000, 13000, 415),
(220002, 'Asoy Alladin Warna 2kg', 11000, 13000, 470),
(220003, 'Asoy Alladin Warna 3kg', 11000, 13000, 550),
(220004, 'Asoy Alladin Warna 5kg', 11000, 13000, 400),
(220005, 'Asoy Alladin Warna 10kg', 11000, 13000, 250),
(220006, 'Asoy Alladin Warna 20kg', 25000, 27000, 200),
(220007, 'Asoy Alladin Hitam 1kg', 10000, 12000, 600),
(220008, 'Asoy Alladin Hitam 2kg', 10000, 12000, 500),
(220009, 'Asoy Alladin Hitam 3kg', 10000, 12000, 550),
(220010, 'Asoy Alladin Hitam 5kg', 10000, 12000, 400),
(220011, 'Asoy Alladin Hitam 10kg', 10000, 12000, 302),
(220012, 'Asoy Alladin Hitam 20kg', 25000, 27000, 209),
(220013, 'Asoy Dua Onta 1kg', 7000, 9000, 395),
(220014, 'Asoy Dua Onta 2kg', 7000, 9000, 398),
(220015, 'Asoy Dua Onta 3kg', 7000, 9000, 400),
(220016, 'Asoy Dua Onta 5kg', 7000, 9000, 400),
(220017, 'Asoy Dua Onta 10kg', 7000, 9000, 400),
(220018, 'Asoy SM Hitam 1kg', 8000, 10000, 250),
(220019, 'Asoy SM Hitam 2kg', 8000, 10000, 250),
(220020, 'Asoy SM Hitam 3kg', 8000, 10000, 250),
(220021, 'Asoy SM Hitam 5kg', 8000, 10000, 250),
(220022, 'Asoy SM Hitam 10kg', 8000, 10000, 250),
(220023, 'Asoy Teko Putih 1kg', 30000, 32000, 600),
(220024, 'Asoy Teko Putih 2kg', 30000, 32000, 400),
(220025, 'Asoy Teko Putih 3kg', 30000, 32000, 400),
(220026, 'Asoy Teko Putih 5kg', 30000, 32000, 150),
(220027, 'Asoy Teko Putih 10kg', 30000, 32000, 150),
(220028, 'Asoy Teko Susu 1kg', 28000, 30000, 100),
(220029, 'Asoy Teko Susu 2kg', 28000, 30000, 100),
(220030, 'Asoy Teko Susu 3kg', 28000, 30000, 100),
(220031, 'Asoy Teko Susu 4kg', 28000, 30000, 100),
(220032, 'Asoy Teko Susu 5kg', 28000, 30000, 100),
(220033, 'Asoy KMPP Putih 1kg', 28000, 30000, 450),
(220034, 'Asoy KMPP Putih 2kg', 28000, 30000, 450),
(220035, 'Asoy KMPP Putih 3kg', 28000, 30000, 450),
(220036, 'Asoy KMPP Putih 5kg', 28000, 30000, 200),
(220037, 'Asoy KMPP Putih 10kg', 28000, 30000, 200),
(220038, 'Asoy Thankyou 1kg', 36000, 38000, 100),
(220039, 'Asoy Thankyou 2kg', 36000, 38000, 100),
(220040, 'Asoy Thankyou 3kg', 36000, 38000, 100),
(220041, 'Asoy Thankyou 5kg', 36000, 38000, 100),
(220042, 'Asoy Thankyou 7kg', 36000, 38000, 100),
(220043, 'Asoy Thankyou 10kg', 36000, 38000, 100),
(220044, 'Asoy Thankyou 20kg', 36000, 38000, 100),
(220045, 'Asoy Cup 1', 33000, 35000, 125),
(220046, 'Asoy Cup 2', 33000, 35000, 125),
(220047, 'Sterofoam Makanan Besar', 37000, 39000, 150),
(220048, 'Sterofoam Makanan Kecil', 27000, 29000, 150),
(220049, 'Mangkok Plastik Kecil', 8000, 10000, 150),
(220050, 'Mangkok Plastik Sedang', 18000, 20000, 80),
(220051, 'Mangkok Plastik Besar', 22000, 24000, 100),
(220052, 'PE 2,5x20', 30000, 32000, 25),
(220053, 'PE 3,8x25', 30000, 32000, 25),
(220054, 'PE 6x13', 30000, 32000, 25),
(220055, 'PE 6x20', 30000, 32000, 25),
(220056, 'PE 6x25', 30000, 32000, 25),
(220057, 'PE 7x13', 30000, 32000, 25),
(220058, 'PE 7x20', 30000, 32000, 50),
(220059, 'PE 8x13', 30000, 32000, 50),
(220060, 'PE 8x30', 30000, 32000, 50),
(220061, 'PE 9x25', 30000, 32000, 50),
(220062, 'PE 10x17', 30000, 32000, 100),
(220063, 'PE 10x28', 30000, 32000, 100),
(220064, 'PE 11x30', 30000, 32000, 100),
(220065, 'PE 11x32', 30000, 32000, 100),
(220066, 'PE 11x40', 30000, 32000, 100),
(220067, 'PE 12x17', 30000, 32000, 150),
(220068, 'PE 12x35', 30000, 32000, 150),
(220069, 'PE 15x21', 30000, 32000, 150),
(220070, 'PE 18x25', 30000, 32000, 150),
(220071, 'PE 20x30', 30000, 32000, 150),
(220072, 'PE 22x35', 30000, 32000, 150),
(220073, 'PE 25x40', 30000, 32000, 50),
(220074, 'PE 30x45', 30000, 32000, 50),
(220075, 'HD 10x15', 31000, 33000, 100),
(220076, 'HD 10x17', 31000, 33000, 100),
(220077, 'HD 12x17', 31000, 33000, 100),
(220078, 'HD 15x21', 31000, 33000, 100),
(220079, 'HD 18x25', 31000, 33000, 100),
(220080, 'HD 20x30', 31000, 33000, 100),
(220081, 'HD 22x35', 31000, 33000, 100),
(220082, 'HD 25x30', 31000, 33000, 100),
(220083, 'PP Tipis 6x8', 32000, 34000, 25),
(220084, 'PP Tipis 7x9', 32000, 34000, 25),
(220085, 'PP Tipis 7x13', 32000, 34000, 25),
(220086, 'PP Tipis 8x13', 32000, 34000, 25),
(220087, 'PP Tipis 8x15', 32000, 34000, 25),
(220088, 'PP Tipis 9x14', 32000, 34000, 25),
(220089, 'PP Tipis 9x15', 32000, 34000, 25),
(220090, 'PP Tipis 10x15', 32000, 34000, 25),
(220091, 'PP Tipis 10x17', 32000, 34000, 25),
(220092, 'PP Tipis 12x17', 32000, 34000, 25),
(220093, 'PP Tipis 12x21', 32000, 34000, 25),
(220094, 'PP Tipis 12x22', 32000, 34000, 25),
(220095, 'PP Tipis 15x21', 32000, 34000, 25),
(220096, 'PP Tipis 15x25', 32000, 34000, 25),
(220097, 'PP Tipis 18x25', 32000, 34000, 25),
(220098, 'PP Tipis 20x30', 32000, 34000, 25),
(220099, 'PP Tipis 22x35', 32000, 34000, 25),
(220100, 'PP Tipis 25x40', 32000, 34000, 25),
(220101, 'PP Tipis 30x45', 32000, 34000, 125),
(220102, 'PP Tipis 35x55', 32000, 34000, 125),
(220103, 'PP Tipis 40x60', 32000, 34000, 125),
(220104, 'PP Tipis 45x75', 32000, 34000, 125),
(220105, 'PP Tipis 50x75', 32000, 34000, 125),
(220106, 'PP Tipis 60x100', 32000, 34000, 125),
(220107, 'PP Tebal 12x17', 32000, 34000, 50),
(220108, 'PP Tebal 15x21', 32000, 34000, 50),
(220109, 'PP Tebal 18x25', 32000, 34000, 50),
(220110, 'PP Tebal 20x30', 32000, 34000, 50),
(220111, 'PP Tebal 22x35', 32000, 34000, 50),
(220112, 'Standing Pouch 10x17', 12000, 14000, 240),
(220113, 'Standing Pouch 12x20', 16000, 18000, 200),
(220114, 'Standing Pouch 14x22', 21000, 23000, 150),
(220115, 'Standing Pouch 16x24', 30000, 32000, 60),
(220116, 'Standing Pouch 16x32', 38000, 40000, 60),
(220117, 'Standing Pouch 20x29', 43000, 45000, 60),
(220118, 'Cup 10oz', 9000, 11000, 200),
(220119, 'Cup 120z', 9000, 11000, 300),
(220120, 'Cup 140z', 9000, 11000, 300),
(220121, 'Cup 160z', 9000, 11000, 300),
(220122, 'Cup 22oz', 23000, 25000, 150),
(220123, 'Tutup Cup Datar', 108000, 110000, 15),
(220124, 'Tutup Cup Cembung', 123000, 125000, 15),
(220125, 'Cup Kopi 6,5oz', 23000, 25000, 250),
(220126, 'Cup Kopi 80z', 23000, 25000, 200),
(220127, 'Tutup Cup Kopi', 173000, 175000, 200),
(220128, 'Shopping Bag 18', 32000, 34000, 40),
(220129, 'Shopping Bag 20', 32000, 34000, 50),
(220130, 'Shopping Bag 26', 32000, 34000, 75),
(220131, 'Shopping Bag 30', 32000, 34000, 100),
(220132, 'Shopping Bag 35', 32000, 34000, 75),
(220133, 'Shopping Bag 40', 32000, 34000, 75),
(220134, 'Goni 60x100', 2000, 4000, 600),
(220135, 'Goni 75x115', 3000, 5000, 600),
(220136, 'Goni 120x150', 10000, 12000, 600),
(220137, 'Goni 120x180', 11000, 13000, 600),
(220138, 'Karet Unyil 1kg', 48000, 50000, 100),
(220139, 'Karet Swallow 1kg', 48000, 50000, 100),
(220140, 'Karet Lobster kg', 1000, 3000, 150),
(220141, 'Tisu Makan', 11000, 13000, 100),
(220142, 'Tisu Paseo', 10000, 12000, 126),
(220143, 'Tisu Nice', 6000, 8000, 240),
(220144, 'Bubble Wrap', 128000, 130000, 8),
(220145, 'Sealer Polos Kecil', 63000, 65000, 40),
(220146, 'Sealer Polos Besar', 123000, 125000, 20),
(220147, 'Sealer Motif Kecil', 63000, 65000, 40),
(220148, 'Sealer Motif Besar', 10500, 12500, 20),
(220149, 'Sendok Panjang Biasa', 8000, 10000, 400),
(220150, 'Sendok Panjang Bening', 18000, 20000, 250),
(220151, 'Sendok Bebek Biasa', 5000, 7000, 500),
(220152, 'Sendok Bebek Bening', 8000, 10000, 500),
(220153, 'Tali Plastik Besar Hitam', 78000, 80000, 20),
(220154, 'Tali Plastik Kecil Hitam', 33000, 35000, 40),
(220155, 'Tali Plastik Besar Warna', 128000, 130000, 10),
(220156, 'Tali Plastik Kecil Warna', 78000, 80000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `id_barang` int(11) NOT NULL,
  `id_keluar` int(11) NOT NULL,
  `id_transaksi` int(15) NOT NULL,
  `tgl_bkeluar` date NOT NULL DEFAULT current_timestamp(),
  `jmlh_barang` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`id_barang`, `id_keluar`, `id_transaksi`, `tgl_bkeluar`, `jmlh_barang`, `total`) VALUES
(220013, 999179134, 2, '2023-01-07', 11, 99000);

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `id_barang` int(15) NOT NULL,
  `id_masuk` int(10) NOT NULL,
  `tgl_bmasuk` date NOT NULL DEFAULT current_timestamp(),
  `jmlh_barang` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `id_supplier` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(50) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `password_pegawai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `password_pegawai`) VALUES
('211401019', 'Sammytha Siagian', 'sammytha123'),
('211401084', 'Ekalma Sembiring', 'ekalma123'),
('211401091', 'Yakin Surbakti', 'yakin123'),
('211401115', 'Agatha Sinaga', 'agatha123'),
('211401118', 'Hiskia Sinaga', 'hiskia123');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(15) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `no_hp`) VALUES
(3, 'RainZ', '08213123941'),
(4, 'Kazuha', '0812712931'),
(6, 'asas', '123'),
(7, 'sSQSADS', '0812346'),
(8, 'adfsafas', '082234569056');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `no_hp`) VALUES
(4, 'SADSDAS', 'ADasd', '123');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(15) NOT NULL,
  `id_pelanggan` int(15) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `total_transaksi` int(15) NOT NULL,
  `tgl_transaksi` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `deskripsi`, `total_transaksi`, `tgl_transaksi`) VALUES
(2, 3, 'Asoy Cup 69', 11000, '2023-01-07'),
(5, 3, 'Asoy 2224233', 12, '2022-12-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`id_keluar`),
  ADD KEY `id_pegawai` (`id_barang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`id_masuk`),
  ADD KEY `id_barang` (`id_barang`,`id_supplier`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220158;

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=999179135;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `id_masuk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keluar`
--
ALTER TABLE `keluar`
  ADD CONSTRAINT `keluar_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keluar_ibfk_3` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `masuk`
--
ALTER TABLE `masuk`
  ADD CONSTRAINT `masuk_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `masuk_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
