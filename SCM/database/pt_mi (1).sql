-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2018 at 08:36 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pt_mi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahanbaku` varchar(4) NOT NULL,
  `nama_bahan` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahanbaku`, `nama_bahan`, `jumlah`) VALUES
('BB01', 'Polyacetal', 176),
('BB02', 'Arbelac', 120),
('BB03', 'AS Kibisan', 279),
('BB04', 'ABS Hailac', 130),
('BB05', 'Polytheline', 50),
('BB06', 'Body Casing LF-1', 4511),
('BB07', 'Body Casing LF-2', 200);

-- --------------------------------------------------------

--
-- Table structure for table `detil_bahanbaku`
--

CREATE TABLE `detil_bahanbaku` (
  `id_pemasok` int(15) DEFAULT NULL,
  `id_bahanbaku` varchar(4) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_bahanbaku`
--

INSERT INTO `detil_bahanbaku` (`id_pemasok`, `id_bahanbaku`, `harga`) VALUES
(1, 'BB03', 44550),
(3, 'BB03', 30500),
(4, 'BB04', 36000),
(3, 'BB04', 29000),
(1, 'BB02', 42900),
(5, 'BB02', 40500),
(6, 'BB06', 123750),
(7, 'BB06', 110000),
(6, 'BB07', 112750),
(7, 'BB07', 102000),
(8, 'BB05', 32000),
(9, 'BB05', 33000),
(10, 'BB05', 28500),
(1, 'BB01', 38720),
(9, 'BB01', 36000),
(11, 'BB01', 32500);

-- --------------------------------------------------------

--
-- Table structure for table `detil_penjualan`
--

CREATE TABLE `detil_penjualan` (
  `id_penjualan` int(11) DEFAULT NULL,
  `id_produk` varchar(4) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_penjualan`
--

INSERT INTO `detil_penjualan` (`id_penjualan`, `id_produk`, `jumlah`, `subtotal`) VALUES
(1, 'LF01', 200, 0),
(2, 'LF01', 2600, 0),
(3, 'LF01', 1000, 0),
(4, 'LF01', 200, 0),
(5, 'LF01', 2600, 0),
(6, 'LF01', 1000, 0),
(7, 'LF01', 500, 0),
(8, 'LF01', 200, 0),
(9, 'LF01', 200, 0),
(10, 'LF01', 1500, 0),
(18, 'LF01', 2, 0),
(18, 'LF02', 4, 0),
(19, 'LF01', 2000, 650650000),
(20, 'LF01', 500, 162662500),
(20, 'LF02', 1000, 302500000),
(21, 'LF01', 50, 16266250),
(21, 'LF02', 55, 16637500),
(22, 'LF01', 50, 16266250),
(22, 'LF02', 120, 36300000);

-- --------------------------------------------------------

--
-- Table structure for table `detil_produksi`
--

CREATE TABLE `detil_produksi` (
  `id_karyawan` int(15) DEFAULT NULL,
  `id_produksi` int(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ekspedisi`
--

CREATE TABLE `ekspedisi` (
  `id_ekspedisi` int(10) NOT NULL,
  `nama_ekspedisi` varchar(20) NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  `id_penjualan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekspedisi`
--

INSERT INTO `ekspedisi` (`id_ekspedisi`, `nama_ekspedisi`, `no_telepon`, `id_penjualan`) VALUES
(1, 'Elteha International', '0224217354', NULL),
(2, 'Citra Express', '02182421485', NULL),
(3, 'Pahala Express', '02287798312', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` varchar(6) NOT NULL,
  `nama_karyawan` varchar(20) NOT NULL,
  `jabatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama_karyawan`, `jabatan`) VALUES
('000000', 'Akida Tawaka', 'dkdkdk'),
('112001', 'Bambang', 'Kepala Divisi Produksi'),
('123456', 'Teten Sudjana', 'Kepala Bagian Pengadaan'),
('443322', 'Tester', 'Tester'),
('443366', 'Tirza', 'Sekretaris Pimpinan'),
('654321', 'Arman', 'Kepala Divisi Pemasaran'),
('998877', 'Andi', 'Kepala Bagian Gudang Indu');

-- --------------------------------------------------------

--
-- Table structure for table `komposisi`
--

CREATE TABLE `komposisi` (
  `id_produk` varchar(4) DEFAULT NULL,
  `id_bahanbaku` varchar(4) DEFAULT NULL,
  `jumlah` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komposisi`
--

INSERT INTO `komposisi` (`id_produk`, `id_bahanbaku`, `jumlah`) VALUES
('LF01', 'BB01', 40.69),
('LF01', 'BB02', 111.98),
('LF01', 'BB03', 61.6),
('LF01', 'BB04', 15.1),
('LF01', 'BB05', 4.43),
('LF01', 'BB06', 1),
('LF02', 'BB01', 40.69),
('LF02', 'BB02', 130.98),
('LF02', 'BB03', 61.6),
('LF02', 'BB04', 15.1),
('LF02', 'BB05', 4.43),
('LF02', 'BB07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_PELANGGAN` int(15) NOT NULL,
  `nama_pelanggan` varchar(20) NOT NULL,
  `alamat` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_PELANGGAN`, `nama_pelanggan`, `alamat`) VALUES
(1, 'PDAM Brebes', 'Brebes'),
(2, 'PDAM Balikpapan', 'Balikpapan'),
(3, 'PDAM Indramayu', 'Indramayu'),
(4, 'Toko Rado', 'Jakarta'),
(5, 'PT. Widya Makmur', 'Semarang'),
(6, 'Kop PDAM Sibolga', 'Sibolga'),
(7, 'Kop PDAM Simalungun', 'SImalungun'),
(8, 'PDAM Kab. Ende', 'Kabupaten Ende'),
(9, 'Kop PDAM Kab. Bontan', 'Kabupaten Bontang'),
(10, 'Kop. PDAM Banyumas', 'Banyumas'),
(11, 'PDAM Sibolga', 'Sibolga'),
(13, 'CV. Anugrah Tirta', 'Karawang');

-- --------------------------------------------------------

--
-- Table structure for table `pemasok`
--

CREATE TABLE `pemasok` (
  `id_pemasok` int(15) NOT NULL,
  `nama_pemasok` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_telepon` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasok`
--

INSERT INTO `pemasok` (`id_pemasok`, `nama_pemasok`, `alamat`, `no_telepon`) VALUES
(1, 'PT. Afa Pratama', 'Jl. Papanggungan D 13, Bandung', '0227318743'),
(3, 'Jaya Tama Kemika', 'Jl. Parakan Resik No. 29 Bandu', '0227501195'),
(4, 'Rajawali Perkasa', 'Jl. Pasir Koja', '0816604892'),
(5, 'Tri Jaya', 'Jl. Raya Ujung Berung Bandung', '0227809571'),
(6, 'Sumber Baru', 'Jl. Banceuy', '0224204636'),
(7, 'Bagja Dewi L', 'Jl. Veteran', '0224202488'),
(8, 'Dua Abadi T', 'Jl. Riung Seni IV No. 4A Bandu', '0227563817'),
(9, 'Indah Jaya', 'MTC Blok H No. 7 Jl. Soekarno ', '0227536342'),
(10, 'Sakura Plastik', 'Jl. Inggit', '0225210554'),
(11, 'Indo Plastik', 'Jl. Holis Bandung', '0225414148');

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE `pengadaan` (
  `id_pengadaan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pemasok` int(15) DEFAULT NULL,
  `id_bahanbaku` varchar(4) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(10) DEFAULT NULL,
  `total_harga` int(10) DEFAULT NULL,
  `status` varchar(27) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengadaan`
--

INSERT INTO `pengadaan` (`id_pengadaan`, `tanggal`, `id_pemasok`, `id_bahanbaku`, `jumlah`, `harga`, `total_harga`, `status`) VALUES
(22, '2018-02-02', 4, 'BB01', 35, 36000, 1260000, 'Diterima'),
(23, '2018-02-03', 6, 'BB02', 386, 123750, 47767500, 'Menunggu Kedatangan Barang'),
(24, '2018-02-03', 4, 'BB03', 79, 36000, 2844000, 'Diterima'),
(25, '2018-02-03', 11, 'BB06', 4311, 32500, 140107500, 'Diterima'),
(26, '2018-02-13', 1, 'BB01', 31, 44550, 1381050, 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `hak_akses` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`username`, `password`, `hak_akses`) VALUES
('admin', 'admin', 'Administrator'),
('gudang_induk', 'gudang_induk', 'Gudang_Induk'),
('kida', 'kida', 'Keuangan'),
('pemasaran', 'pemasaran', 'Pemasaran'),
('pengadaan', 'pengadaan', 'Pengadaan'),
('produksi', 'produksi', 'Produksi'),
('tawaka', 'tawaka', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(10) NOT NULL,
  `id_ekspedisi` int(10) DEFAULT NULL,
  `id_penjualan` int(11) DEFAULT NULL,
  `jumlah_barang` int(11) DEFAULT NULL,
  `jumlah_box` int(11) DEFAULT NULL,
  `tanggal_kirim` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `id_ekspedisi`, `id_penjualan`, `jumlah_barang`, `jumlah_box`, `tanggal_kirim`) VALUES
(1, 1, 21, 105, 11, '2018-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_pelanggan` int(15) DEFAULT NULL,
  `status_pembayaran` varchar(20) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `status_pengiriman` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `tanggal`, `id_pelanggan`, `status_pembayaran`, `tanggal_bayar`, `status_pengiriman`) VALUES
(1, '2016-07-06', 1, '', '0000-00-00', ''),
(2, '2016-07-28', 2, '', '0000-00-00', ''),
(3, '2016-08-09', 3, '', '0000-00-00', ''),
(4, '2016-08-15', 4, '', '0000-00-00', ''),
(5, '2016-09-16', 2, '', '0000-00-00', ''),
(6, '2016-09-12', 3, '', '0000-00-00', ''),
(7, '2016-10-05', 8, '', '0000-00-00', ''),
(8, '2016-10-12', 1, '', '0000-00-00', ''),
(9, '2016-10-27', 1, '', '0000-00-00', ''),
(10, '2016-11-08', 5, '', '0000-00-00', ''),
(11, '2018-02-14', 6, '', '0000-00-00', ''),
(12, '2018-02-12', 6, '', '0000-00-00', ''),
(15, '2018-02-12', 2, '', '0000-00-00', ''),
(16, '2018-02-12', 2, '', '0000-00-00', ''),
(17, '2018-02-12', 2, '', '0000-00-00', ''),
(18, '2018-02-12', 11, '', '0000-00-00', ''),
(19, '2018-02-22', 8, 'SUDAH DIBAYAR', '2018-02-13', ''),
(20, '2018-01-01', 4, 'SUDAH DIBAYAR', '2018-02-13', ''),
(21, '2018-02-13', 13, 'SUDAH DIBAYAR', '2018-02-13', 'SUDAH DIKIRIM'),
(22, '2018-02-14', 7, 'SUDAH DIBAYAR', '2018-02-14', 'BELUM DIKIRIM');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_bahanbaku`
--

CREATE TABLE `permintaan_bahanbaku` (
  `id_permintaan_bb` int(11) NOT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `id_bahanbaku` varchar(4) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `status_permintaan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permintaan_bahanbaku`
--

INSERT INTO `permintaan_bahanbaku` (`id_permintaan_bb`, `tanggal_pengajuan`, `id_bahanbaku`, `jumlah`, `status_permintaan`) VALUES
(1, '2018-02-14', 'BB01', 40, 'DITERIMA');

-- --------------------------------------------------------

--
-- Table structure for table `preko`
--

CREATE TABLE `preko` (
  `id_preko` int(6) NOT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `id_bahanbaku` varchar(4) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preko`
--

INSERT INTO `preko` (`id_preko`, `tanggal_pengajuan`, `id_bahanbaku`, `jumlah`, `status`) VALUES
(2, '2018-02-13', 'BB02', 572, 'Diajukan'),
(3, '2018-02-13', 'BB03', 47, 'Diajukan'),
(4, '2018-02-13', 'BB07', 5073, 'Diajukan');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(4) NOT NULL,
  `nama_produk` varchar(20) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `jumlah`) VALUES
('LF01', 'LF-01 15mm', 325325, 0),
('LF02', 'LF-02 15mm', 302500, 500);

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id_produksi` int(10) NOT NULL,
  `id_produk` varchar(4) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id_produksi`, `id_produk`, `tanggal`, `jumlah`) VALUES
(1, 'LF02', '2018-02-14', 500);

-- --------------------------------------------------------

--
-- Table structure for table `p_karyawan`
--

CREATE TABLE `p_karyawan` (
  `nik` varchar(6) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_karyawan`
--

INSERT INTO `p_karyawan` (`nik`, `username`) VALUES
(NULL, 'tawaka'),
('123456', 'pengadaan'),
('654321', 'pemasaran'),
('000000', 'kida'),
('112001', 'produksi'),
('443366', 'admin'),
('998877', 'gudang_induk');

-- --------------------------------------------------------

--
-- Table structure for table `rencana_produksi`
--

CREATE TABLE `rencana_produksi` (
  `id_rencana` int(11) NOT NULL,
  `tanggal_rencana` date DEFAULT NULL,
  `id_produk` varchar(4) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `status_rencana` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rencana_produksi`
--

INSERT INTO `rencana_produksi` (`id_rencana`, `tanggal_rencana`, `id_produk`, `jumlah`, `status_rencana`) VALUES
(1, '2016-07-01', 'LF01', 5000, 'Sudah'),
(2, '2016-08-01', 'LF01', 7000, 'Sudah'),
(3, '2016-09-01', 'LF01', 5500, 'Sudah'),
(4, '2016-10-01', 'LF01', 7750, 'Sudah'),
(5, '2016-11-01', 'LF01', 5750, 'Sudah'),
(6, '2016-12-01', 'LF01', 8000, 'Sudah'),
(7, '2017-01-01', 'LF01', 5000, 'Sudah'),
(8, '2017-02-01', 'LF01', 5750, 'Sudah'),
(9, '2017-03-01', 'LF01', 6000, 'Sudah'),
(10, '2017-04-01', 'LF01', 5750, 'Sudah'),
(11, '2017-05-01', 'LF01', 4200, 'Sudah'),
(12, '2017-06-01', 'LF01', 1500, 'Sudah'),
(13, '2016-07-01', 'LF02', 500, 'Sudah'),
(14, '2016-08-01', 'LF02', 2200, 'Sudah'),
(15, '2016-09-01', 'LF02', 4500, 'Sudah'),
(16, '2016-10-01', 'LF02', 1300, 'Sudah'),
(17, '2016-11-01', 'LF02', 4500, 'Sudah'),
(18, '2016-12-01', 'LF02', 1000, 'Sudah'),
(19, '2017-01-01', 'LF02', 2000, 'Sudah'),
(20, '2017-02-01', 'LF02', 5500, 'Sudah'),
(21, '2017-03-01', 'LF02', 2500, 'Sudah'),
(22, '2017-04-01', 'LF02', 5000, 'Sudah'),
(23, '2017-05-01', 'LF02', 5500, 'Sudah'),
(24, '2017-06-01', 'LF02', 7500, 'Sudah'),
(26, '2017-07-01', 'LF01', 4363, 'Belum'),
(27, '2017-07-01', 'LF02', 5125, 'Belum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahanbaku`);

--
-- Indexes for table `detil_bahanbaku`
--
ALTER TABLE `detil_bahanbaku`
  ADD KEY `id_pemasok` (`id_pemasok`),
  ADD KEY `id_bahanbaku` (`id_bahanbaku`);

--
-- Indexes for table `detil_penjualan`
--
ALTER TABLE `detil_penjualan`
  ADD KEY `id_penjualan` (`id_penjualan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `detil_produksi`
--
ALTER TABLE `detil_produksi`
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_produksi` (`id_produksi`);

--
-- Indexes for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  ADD PRIMARY KEY (`id_ekspedisi`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `komposisi`
--
ALTER TABLE `komposisi`
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_bahanbaku` (`id_bahanbaku`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_PELANGGAN`);

--
-- Indexes for table `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id_pemasok`);

--
-- Indexes for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`id_pengadaan`),
  ADD KEY `id_pemasok` (`id_pemasok`),
  ADD KEY `id_bahanbaku` (`id_bahanbaku`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `id_ekspedisi` (`id_ekspedisi`),
  ADD KEY `id_penjualan` (`id_penjualan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `permintaan_bahanbaku`
--
ALTER TABLE `permintaan_bahanbaku`
  ADD PRIMARY KEY (`id_permintaan_bb`),
  ADD KEY `id_bahanbaku` (`id_bahanbaku`);

--
-- Indexes for table `preko`
--
ALTER TABLE `preko`
  ADD PRIMARY KEY (`id_preko`),
  ADD KEY `id_bahanbaku` (`id_bahanbaku`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `p_karyawan`
--
ALTER TABLE `p_karyawan`
  ADD KEY `username` (`username`),
  ADD KEY `p_karyawan_ibfk_1` (`nik`);

--
-- Indexes for table `rencana_produksi`
--
ALTER TABLE `rencana_produksi`
  ADD PRIMARY KEY (`id_rencana`),
  ADD KEY `id_produk` (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  MODIFY `id_ekspedisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_PELANGGAN` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id_pemasok` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengadaan`
--
ALTER TABLE `pengadaan`
  MODIFY `id_pengadaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `permintaan_bahanbaku`
--
ALTER TABLE `permintaan_bahanbaku`
  MODIFY `id_permintaan_bb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `preko`
--
ALTER TABLE `preko`
  MODIFY `id_preko` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id_produksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rencana_produksi`
--
ALTER TABLE `rencana_produksi`
  MODIFY `id_rencana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detil_bahanbaku`
--
ALTER TABLE `detil_bahanbaku`
  ADD CONSTRAINT `detil_bahanbaku_ibfk_1` FOREIGN KEY (`id_pemasok`) REFERENCES `pemasok` (`id_pemasok`),
  ADD CONSTRAINT `detil_bahanbaku_ibfk_2` FOREIGN KEY (`id_bahanbaku`) REFERENCES `bahan_baku` (`id_bahanbaku`);

--
-- Constraints for table `detil_penjualan`
--
ALTER TABLE `detil_penjualan`
  ADD CONSTRAINT `detil_penjualan_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`),
  ADD CONSTRAINT `detil_penjualan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `detil_produksi`
--
ALTER TABLE `detil_produksi`
  ADD CONSTRAINT `detil_produksi_ibfk_2` FOREIGN KEY (`id_produksi`) REFERENCES `produksi` (`id_produksi`);

--
-- Constraints for table `komposisi`
--
ALTER TABLE `komposisi`
  ADD CONSTRAINT `komposisi_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `komposisi_ibfk_2` FOREIGN KEY (`id_bahanbaku`) REFERENCES `bahan_baku` (`id_bahanbaku`);

--
-- Constraints for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD CONSTRAINT `pengadaan_ibfk_2` FOREIGN KEY (`id_pemasok`) REFERENCES `pemasok` (`id_pemasok`),
  ADD CONSTRAINT `pengadaan_ibfk_3` FOREIGN KEY (`id_bahanbaku`) REFERENCES `bahan_baku` (`id_bahanbaku`);

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`id_ekspedisi`) REFERENCES `ekspedisi` (`id_ekspedisi`),
  ADD CONSTRAINT `pengiriman_ibfk_2` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_PELANGGAN`);

--
-- Constraints for table `permintaan_bahanbaku`
--
ALTER TABLE `permintaan_bahanbaku`
  ADD CONSTRAINT `permintaan_bahanbaku_ibfk_1` FOREIGN KEY (`id_bahanbaku`) REFERENCES `bahan_baku` (`id_bahanbaku`);

--
-- Constraints for table `preko`
--
ALTER TABLE `preko`
  ADD CONSTRAINT `preko_ibfk_1` FOREIGN KEY (`id_bahanbaku`) REFERENCES `bahan_baku` (`id_bahanbaku`);

--
-- Constraints for table `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `produksi_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `p_karyawan`
--
ALTER TABLE `p_karyawan`
  ADD CONSTRAINT `p_karyawan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `karyawan` (`nik`),
  ADD CONSTRAINT `p_karyawan_ibfk_2` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`);

--
-- Constraints for table `rencana_produksi`
--
ALTER TABLE `rencana_produksi`
  ADD CONSTRAINT `rencana_produksi_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
