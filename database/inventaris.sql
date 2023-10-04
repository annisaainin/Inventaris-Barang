-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2023 at 06:36 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `noseri` varchar(225) NOT NULL,
  `gambar` varchar(225) DEFAULT NULL,
  `tipe_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_kondisi` varchar(11) NOT NULL,
  `lokasi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`noseri`, `gambar`, `tipe_barang`, `nama_barang`, `id_jenis`, `jumlah`, `id_kondisi`, `lokasi`) VALUES
('BR0010', '0c1209c798426bfab8b5d79ff74c0af5.jpg', 'q', 'a', 1, 2, '2', '-'),
('BR008', '0c1209c798426bfab8b5d79ff74c0af5.jpg', 'buku cetak', 'buku', 2, 2, '1', '-');

-- --------------------------------------------------------

--
-- Stand-in structure for view `coba`
-- (See below for the actual view)
--
CREATE TABLE `coba` (
`noseri` varchar(225)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `coba1`
-- (See below for the actual view)
--
CREATE TABLE `coba1` (
`kode_perawatan` varchar(11)
,`noseri` varchar(225)
,`jumlah` varchar(225)
,`tgl_perawatan` date
,`tgl_selesai` date
,`keterangan` text
);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis` int(11) NOT NULL,
  `jenis_barang` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis`, `jenis_barang`) VALUES
(1, 'Elektronik'),
(2, 'Non-Elektronik');

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `kode_keluar` varchar(11) NOT NULL,
  `noseri` varchar(225) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `penerima` varchar(225) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `suratkeluar` varchar(225) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kondisi_barang`
--

CREATE TABLE `kondisi_barang` (
  `id_kondisi` varchar(11) NOT NULL,
  `jenis_kondisi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kondisi_barang`
--

INSERT INTO `kondisi_barang` (`id_kondisi`, `jenis_kondisi`) VALUES
('1', 'Rusak Ringan'),
('2', 'Rusak Berat'),
('3', 'Bagus');

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `kode_masuk` varchar(11) NOT NULL,
  `noseri` varchar(225) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `pengirim` varchar(225) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `suratmasuk` varchar(225) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `perawatan`
--

CREATE TABLE `perawatan` (
  `kode_perawatan` varchar(11) NOT NULL,
  `noseri` varchar(225) NOT NULL,
  `jumlah` varchar(225) NOT NULL,
  `tgl_perawatan` date NOT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `id_kondisi` int(11) NOT NULL,
  `id_status` varchar(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perawatan`
--

INSERT INTO `perawatan` (`kode_perawatan`, `noseri`, `jumlah`, `tgl_perawatan`, `tgl_selesai`, `id_kondisi`, `id_status`, `keterangan`) VALUES
('KP00001', 'BR008', '2', '2022-09-08', NULL, 1, '1', '-');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `kode_pinjam` varchar(11) NOT NULL,
  `noseri` varchar(225) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `peminjam` varchar(225) NOT NULL,
  `keterangan` text NOT NULL,
  `status_id` varchar(11) NOT NULL,
  `upload_tandaterima` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status_pinjam`
--

CREATE TABLE `status_pinjam` (
  `status_id` varchar(11) NOT NULL,
  `jenis_status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_pinjam`
--

INSERT INTO `status_pinjam` (`status_id`, `jenis_status`) VALUES
('STP001', 'Sudah Dikembalikan'),
('STP002', 'Belum Dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `status_rawat`
--

CREATE TABLE `status_rawat` (
  `id_status` varchar(11) NOT NULL,
  `jenis_status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_rawat`
--

INSERT INTO `status_rawat` (`id_status`, `jenis_status`) VALUES
('1', 'Dalam Perbaikan'),
('2', 'Sudah Diperbaiki'),
('3', 'Proses Penghapusan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `nip_nrp` varchar(30) NOT NULL,
  `nama_admin` varchar(225) NOT NULL,
  `departemen` varchar(225) NOT NULL,
  `username_user` varchar(225) NOT NULL,
  `password_user` varchar(225) NOT NULL,
  `id_hak_akses` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`nip_nrp`, `nama_admin`, `departemen`, `username_user`, `password_user`, `id_hak_akses`) VALUES
('a', 'a', 'a', 'a', 'a', 'HK00001');

-- --------------------------------------------------------

--
-- Structure for view `coba`
--
DROP TABLE IF EXISTS `coba`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `coba`  AS SELECT `a`.`noseri` AS `noseri` FROM (`barang` `a` join `kondisi_barang` `r` on(`a`.`id_kondisi` = `r`.`id_kondisi`)) ;

-- --------------------------------------------------------

--
-- Structure for view `coba1`
--
DROP TABLE IF EXISTS `coba1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `coba1`  AS SELECT `b`.`kode_perawatan` AS `kode_perawatan`, `b`.`noseri` AS `noseri`, `b`.`jumlah` AS `jumlah`, `b`.`tgl_perawatan` AS `tgl_perawatan`, `b`.`tgl_selesai` AS `tgl_selesai`, `b`.`keterangan` AS `keterangan` FROM (`perawatan` `b` join `status_rawat` `j` on(`b`.`id_status` = `j`.`id_status`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`noseri`),
  ADD KEY `jenis_barang` (`id_jenis`),
  ADD KEY `kondisi` (`id_kondisi`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`kode_keluar`),
  ADD KEY `noseri` (`noseri`);

--
-- Indexes for table `kondisi_barang`
--
ALTER TABLE `kondisi_barang`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`kode_masuk`),
  ADD KEY `noseri` (`noseri`);

--
-- Indexes for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`kode_perawatan`),
  ADD KEY `noseri` (`noseri`),
  ADD KEY `status` (`id_status`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`kode_pinjam`),
  ADD KEY `noseri` (`noseri`),
  ADD KEY `status` (`status_id`);

--
-- Indexes for table `status_pinjam`
--
ALTER TABLE `status_pinjam`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `status_rawat`
--
ALTER TABLE `status_rawat`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`nip_nrp`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_barang` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_3` FOREIGN KEY (`id_kondisi`) REFERENCES `kondisi_barang` (`id_kondisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keluar`
--
ALTER TABLE `keluar`
  ADD CONSTRAINT `keluar_ibfk_1` FOREIGN KEY (`noseri`) REFERENCES `barang` (`noseri`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `masuk`
--
ALTER TABLE `masuk`
  ADD CONSTRAINT `noseri` FOREIGN KEY (`noseri`) REFERENCES `barang` (`noseri`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD CONSTRAINT `perawatan_ibfk_1` FOREIGN KEY (`noseri`) REFERENCES `barang` (`noseri`),
  ADD CONSTRAINT `perawatan_ibfk_4` FOREIGN KEY (`id_status`) REFERENCES `status_rawat` (`id_status`);

--
-- Constraints for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD CONSTRAINT `pinjam_ibfk_1` FOREIGN KEY (`noseri`) REFERENCES `barang` (`noseri`),
  ADD CONSTRAINT `pinjam_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status_pinjam` (`status_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
