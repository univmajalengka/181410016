-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2020 at 04:42 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbdl_nurikhsanimanudin`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `stok` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `harga_beli`, `harga_jual`, `stok`) VALUES
('2', 'Indomiee', 2000, 3000, 15),
('K01', 'Fiesta', 5000, 10000, 98),
('K03', 'Indomie', 2000, 3000, 15),
('K04', 'supermie', 2000, 3000, 20),
('K05', 'Teh Gelas', 800, 1000, 200);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `no_nota_pembelian` varchar(10) NOT NULL,
  `tgl_beli` date NOT NULL,
  `kode_suplier` varchar(10) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `jumlah_barang` int(10) NOT NULL,
  `total_beli` int(30) NOT NULL,
  `user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`no_nota_pembelian`, `tgl_beli`, `kode_suplier`, `kode_barang`, `harga_beli`, `jumlah_barang`, `total_beli`, `user`) VALUES
('nb1', '2020-03-21', 's1', 'K01', 5000, 100, 500000, 'admin'),
('nb2', '2020-04-04', 's1', 'K01', 5000, 4, 20000, 'admin'),
('nb3', '2020-04-03', 's2', 'K03', 2000, 3, 6000, 'admin'),
('nb4', '2020-04-01', 's1', 'K01', 5000, 4, 20000, 'admin'),
('nb5', '2020-04-02', 's2', 'K03', 2000, 3, 6000, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `no_nota` varchar(10) NOT NULL,
  `tgl_nota` date NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `jumlah_barang` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`no_nota`, `tgl_nota`, `kode_barang`, `harga_jual`, `jumlah_barang`, `total`, `user`) VALUES
('1', '2020-03-21', 'K01', 1, 1, 1, 'admin'),
('2', '2020-04-04', '2', 3000, 3000, 3000, 'admin'),
('3', '2020-04-04', 'K04', 3000, 6000, 6000, 'admin'),
('4', '2020-04-04', 'K05', 1000, 2000, 2000, 'admin'),
('5', '2020-04-04', 'K05', 1000, 4000, 4000, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `kode_suplier` varchar(10) NOT NULL,
  `nama_suplier` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`kode_suplier`, `nama_suplier`, `alamat`, `no_telp`) VALUES
('s1', 'Warung Kho Liong', 'Jakarta', '0896969696969'),
('s2', 'Harys Kurniawan Kapitalis', 'Bekasi', '089599599599'),
('s3', 'Nelson Vadar', 'Cikarang', '081222222222'),
('s4', 'Berkah Grosir', 'Cigasong', '085432985576'),
('s5', 'Elis Sejahtera', 'Pasar Balong', '08473957395873');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`no_nota_pembelian`),
  ADD KEY `kode_suplier` (`kode_suplier`) USING BTREE,
  ADD KEY `kode_barang` (`kode_barang`) USING BTREE,
  ADD KEY `user` (`user`) USING BTREE;

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`no_nota`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`kode_suplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
