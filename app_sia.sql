-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 03:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_sia`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `akun_id` int(20) NOT NULL,
  `nama_akun` varchar(30) NOT NULL,
  `jenis_akun` varchar(25) NOT NULL,
  `tipe_saldo` enum('Debit','Kredit','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `barang_id` int(20) NOT NULL,
  `nama_barang` varchar(40) NOT NULL,
  `harga_beli` int(25) NOT NULL,
  `harga_jual` int(25) NOT NULL,
  `stok` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurnalumum`
--

CREATE TABLE `tb_jurnalumum` (
  `jurnal_id` int(20) NOT NULL,
  `transaksi_id` int(30) NOT NULL,
  `kredit_total` int(30) NOT NULL,
  `pembayaran_id` int(30) NOT NULL,
  `pembelian_id` int(30) NOT NULL,
  `penjualan_id` int(30) NOT NULL,
  `tanggal_jurnal` date NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `debit_total` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `pelanggan_id` int(30) NOT NULL,
  `nama_pelanggan` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` int(15) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `pembayaran_id` int(30) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `akun_id` int(20) NOT NULL,
  `jumlah_pembayaran` int(30) NOT NULL,
  `keterangan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `pembelian_id` int(30) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `akun_id` int(20) NOT NULL,
  `supplier_id` int(25) NOT NULL,
  `total_pembelian` int(30) NOT NULL,
  `keterangan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `user_id` int(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `hak_akses` enum('administrator','staf','pengguna_biasa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`user_id`, `username`, `password`, `nama_lengkap`, `email`, `jabatan`, `hak_akses`) VALUES
(6, 'coba', '$2y$10$rpFidZRuurwyx.F0lB8p6eKL.nA7sTHXq0iVBX0qf0B.xIzNLwa2C', 'Administrator Web', 'admin@gmail.com', 'Administrator', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `penjual_id` int(30) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `akun_id` int(20) NOT NULL,
  `pelanggan_id` int(25) NOT NULL,
  `total_penjualan` int(30) NOT NULL,
  `keterangan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `supplier_id` int(20) NOT NULL,
  `nama_supplier` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` int(15) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `transaksi_id` int(30) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `akun_id` int(20) NOT NULL,
  `jenis_transaksi` int(11) NOT NULL,
  `jumlah_total` int(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`akun_id`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indexes for table `tb_jurnalumum`
--
ALTER TABLE `tb_jurnalumum`
  ADD PRIMARY KEY (`jurnal_id`),
  ADD KEY `transaksi_id` (`transaksi_id`),
  ADD KEY `pembayaran_id` (`pembayaran_id`),
  ADD KEY `pembelian_id` (`pembelian_id`),
  ADD KEY `penjualan_id` (`penjualan_id`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`),
  ADD KEY `akun_id` (`akun_id`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`pembelian_id`),
  ADD KEY `akun_id` (`akun_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`penjual_id`),
  ADD KEY `akun_id` (`akun_id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`transaksi_id`),
  ADD KEY `akun_id` (`akun_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `user_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
