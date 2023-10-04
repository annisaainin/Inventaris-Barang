-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23 Des 2021 pada 12.19
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datalogistik2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` varchar(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `berat_barang` int(11) NOT NULL,
  `lebar_barang` int(5) NOT NULL,
  `tinggi_barang` int(5) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `tgl_produksi` date NOT NULL,
  `id_jenis_barang` varchar(11) NOT NULL,
  `id_gudang` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `berat_barang`, `lebar_barang`, `tinggi_barang`, `harga_barang`, `stok_barang`, `tgl_produksi`, `id_jenis_barang`, `id_gudang`) VALUES
('BR00001', 'VGA1', 1, 1, 2, 500000, 90, '2021-12-22', 'JB00001', 'GD00001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_gambar`
--

CREATE TABLE `tb_detail_gambar` (
  `id_gambar` int(11) NOT NULL,
  `file_gambar` text NOT NULL,
  `id_lain` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detail_gambar`
--

INSERT INTO `tb_detail_gambar` (`id_gambar`, `file_gambar`, `id_lain`) VALUES
(1, '29092020153123men-s-white-dress-shirt-936229.jpg', 'US00001'),
(2, '29092020153123men-s-white-dress-shirt-936229.jpg', 'BR00001'),
(3, '24-cerita-rakyat-3-1200x900.jpg', 'BR00001'),
(4, 'WhatsApp Image 2021-11-25 at 10.03.54.jpeg', 'BR00001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gudang`
--

CREATE TABLE `tb_gudang` (
  `id_gudang` varchar(15) NOT NULL,
  `nama_gudang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_gudang`
--

INSERT INTO `tb_gudang` (`id_gudang`, `nama_gudang`) VALUES
('GD00001', 'Gudang 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hak_akses`
--

CREATE TABLE `tb_hak_akses` (
  `id_hak_akses` varchar(15) NOT NULL,
  `jenis_hak_akses` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_hak_akses`
--

INSERT INTO `tb_hak_akses` (`id_hak_akses`, `jenis_hak_akses`) VALUES
('HK0001', 'Adminstator'),
('HK0002', 'Pelanggan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_barang`
--

CREATE TABLE `tb_jenis_barang` (
  `id_jenis_barang` varchar(11) NOT NULL,
  `nama_jenis_barang` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenis_barang`
--

INSERT INTO `tb_jenis_barang` (`id_jenis_barang`, `nama_jenis_barang`) VALUES
('JB00001', 'Low End'),
('JB00002', 'Mid End'),
('JB00003', 'High End');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kendaraan`
--

CREATE TABLE `tb_kendaraan` (
  `id_kendaraan` varchar(15) NOT NULL,
  `no_pol` varchar(8) NOT NULL,
  `nama_kendaraan` text NOT NULL,
  `tipe_kendaraan` varchar(8) NOT NULL,
  `merk_kendaraan` text NOT NULL,
  `tahun_kendaraan` year(4) NOT NULL,
  `batas_berat` int(11) NOT NULL,
  `panjang_kendaraan` int(11) NOT NULL,
  `lebar_kendaraan` int(11) NOT NULL,
  `tinggi_kendaraan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengiriman`
--

CREATE TABLE `tb_pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `status_pengiriman` int(11) NOT NULL,
  `id_kendaraan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `total_keseluruhan` int(11) NOT NULL,
  `des_penjualan` text NOT NULL,
  `status_bayar` int(2) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_toko`
--

CREATE TABLE `tb_toko` (
  `id_toko` varchar(15) NOT NULL,
  `nama_toko` varchar(128) NOT NULL,
  `nama_pemilik` varchar(128) NOT NULL,
  `telp_toko` varchar(30) NOT NULL,
  `wa_toko` varchar(30) NOT NULL,
  `rt_toko` int(11) NOT NULL,
  `rw_toko` int(11) NOT NULL,
  `jalan_toko` text NOT NULL,
  `desa_toko` text NOT NULL,
  `kec_toko` text NOT NULL,
  `wil_toko` text NOT NULL,
  `prov_toko` text NOT NULL,
  `kode_pos` int(12) NOT NULL,
  `des_toko` text NOT NULL,
  `jarak_toko` int(11) NOT NULL,
  `gmaps` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_toko`
--

INSERT INTO `tb_toko` (`id_toko`, `nama_toko`, `nama_pemilik`, `telp_toko`, `wa_toko`, `rt_toko`, `rw_toko`, `jalan_toko`, `desa_toko`, `kec_toko`, `wil_toko`, `prov_toko`, `kode_pos`, `des_toko`, `jarak_toko`, `gmaps`) VALUES
('TK00001', 'Teknologi Sejati', 'Kakak', '6285791340248', '6285791340248', 1, 15, 'Jalan Pahlawan', 'Karang', 'Sooko', 'Mojokerto', 'Jawa Timur', 61361, 'Apa aja', 5, 'https://g.page/ITTelkomSurabaya?share'),
('TK00003', 'toko21', 'rara21', '62871623861811', '628631832311', 111, 211, 'fff1', 'Mojoekrto11', 'Sooko11', 'Mojokeorto11', 'Jwtim11', 4324211, 'fffw1', 11, '231');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kuantitas_detail` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `detail_total_harga` int(11) NOT NULL,
  `status_transaksi` varchar(128) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_barang` varchar(15) NOT NULL,
  `id_toko` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(15) NOT NULL,
  `nip_user` int(18) NOT NULL,
  `nama_user` text NOT NULL,
  `alamat_user` text NOT NULL,
  `email_user` varchar(60) NOT NULL,
  `telp_user` varchar(15) NOT NULL,
  `ttl_user` date NOT NULL,
  `username_user` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `id_hak_akses` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nip_user`, `nama_user`, `alamat_user`, `email_user`, `telp_user`, `ttl_user`, `username_user`, `password_user`, `jenis_kelamin`, `id_hak_akses`) VALUES
('US00001', 631863123, 'nana', 'mojokerto', 'iqbal@gmail.com', '08346734254', '2021-12-22', 'nana', 'nana', 'P', 'HK00001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_detail_gambar`
--
ALTER TABLE `tb_detail_gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `tb_gudang`
--
ALTER TABLE `tb_gudang`
  ADD PRIMARY KEY (`id_gudang`);

--
-- Indexes for table `tb_hak_akses`
--
ALTER TABLE `tb_hak_akses`
  ADD PRIMARY KEY (`id_hak_akses`);

--
-- Indexes for table `tb_jenis_barang`
--
ALTER TABLE `tb_jenis_barang`
  ADD PRIMARY KEY (`id_jenis_barang`);

--
-- Indexes for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tb_toko`
--
ALTER TABLE `tb_toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
