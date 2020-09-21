-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Mar 2020 pada 08.43
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apotik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_distributor`
--

CREATE TABLE `tb_distributor` (
  `id_distributor` varchar(15) NOT NULL,
  `nama_distributor` varchar(100) DEFAULT NULL,
  `nama_perusahaan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_distributor`
--

INSERT INTO `tb_distributor` (`id_distributor`, `nama_distributor`, `nama_perusahaan`) VALUES
('DTR001', 'kep', 'PT.apa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` varchar(15) NOT NULL,
  `nama_obat` varchar(100) DEFAULT NULL,
  `harga_obat` int(10) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `harga_obat`, `jumlah`) VALUES
('OB001', 'Bodrex', 3000, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasok`
--

CREATE TABLE `tb_pasok` (
  `id_pembelian` varchar(15) NOT NULL,
  `id_obat` varchar(20) NOT NULL,
  `nama_obat` varchar(100) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `nama_distributor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `tb_pasok`
--
DELIMITER $$
CREATE TRIGGER `tambah_obat` AFTER INSERT ON `tb_pasok` FOR EACH ROW BEGIN
UPDATE tb_obat
SET jumlah = jumlah + NEW.jumlah
WHERE 
id_obat = NEW.id_obat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_penjualan` varchar(15) NOT NULL,
  `id_obat` varchar(20) DEFAULT NULL,
  `nama_obat` varchar(100) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `nama_petugas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_penjualan`, `id_obat`, `nama_obat`, `jumlah`, `nama_pelanggan`, `nama_petugas`) VALUES
('PJ001', 'OB001', 'Bodrex', 2, 'Ahmad', 'Admin');

--
-- Trigger `tb_penjualan`
--
DELIMITER $$
CREATE TRIGGER `jual_obat` AFTER INSERT ON `tb_penjualan` FOR EACH ROW BEGIN
UPDATE tb_obat
SET jumlah = jumlah - NEW.jumlah
WHERE 
id_obat = NEW.id_obat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` varchar(15) NOT NULL,
  `nama_petugas` varchar(100) DEFAULT NULL,
  `jk` varchar(50) DEFAULT NULL,
  `alamat` text,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`, `jk`, `alamat`, `username`, `password`) VALUES
('PTG001', 'Marchella', 'Perempuan', 'Cigombong, Bogor', 'admin123', 'admin123'),
('PTG002', 'Admin', 'Laki-laki', 'Tempat tinggal', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_distributor`
--
ALTER TABLE `tb_distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indeks untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `tb_pasok`
--
ALTER TABLE `tb_pasok`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
