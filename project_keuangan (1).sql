-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Mar 2024 pada 05.26
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_keuangan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `bank_nama` varchar(255) NOT NULL,
  `bank_nomor` varchar(255) NOT NULL,
  `bank_pemilik` varchar(255) NOT NULL,
  `bank_saldo` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_nama`, `bank_nomor`, `bank_pemilik`, `bank_saldo`) VALUES
(1, 'BANK BRI', 'sunardi', '0933-1234', 87300123),
(3, 'BANK BCA', 'sunardi', '0933-3395', 5000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hutang`
--

CREATE TABLE `hutang` (
  `hutang_id` int(11) NOT NULL,
  `hutang_tanggal` date NOT NULL,
  `hutang_nominal` int(11) NOT NULL,
  `hutang_keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `hutang`
--

INSERT INTO `hutang` (`hutang_id`, `hutang_tanggal`, `hutang_nominal`, `hutang_keterangan`) VALUES
(31, '2023-08-20', 100000, 'kasbon');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori`) VALUES
(15, 'Biaya Operasional'),
(17, 'Biaya Tenaga Kerja'),
(18, 'Pemeliharaan dan Perbaikan'),
(19, 'Bahan Baku'),
(22, 'Penjualan Produk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `piutang`
--

CREATE TABLE `piutang` (
  `piutang_id` int(11) NOT NULL,
  `piutang_tanggal` date NOT NULL,
  `piutang_nominal` int(11) NOT NULL,
  `piutang_keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `piutang`
--

INSERT INTO `piutang` (`piutang_id`, `piutang_tanggal`, `piutang_nominal`, `piutang_keterangan`) VALUES
(1, '2023-10-14', 10000000, 'PT INDADEX'),
(2, '2023-08-16', 10000000, 'CV. Josan Global Center');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `transaksi_tanggal` date NOT NULL,
  `klien` varchar(20) NOT NULL,
  `transaksi_jenis` enum('Pengeluaran','Pemasukan') NOT NULL,
  `transaksi_kategori` int(11) NOT NULL,
  `transaksi_nominal` int(11) NOT NULL,
  `transaksi_keterangan` text NOT NULL,
  `transaksi_bank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `transaksi_tanggal`, `klien`, `transaksi_jenis`, `transaksi_kategori`, `transaksi_nominal`, `transaksi_keterangan`, `transaksi_bank`) VALUES
(86, '2023-10-12', '-', 'Pengeluaran', 19, 1000000, 'pin', 1),
(87, '2023-10-12', '-', 'Pengeluaran', 19, 20000000, 'Plat Besi', 1),
(88, '2023-10-12', '-', 'Pengeluaran', 18, 10000000, 'Beli Part', 1),
(89, '2023-10-12', '-', 'Pengeluaran', 17, 5000000, 'gaji', 1),
(90, '2023-10-15', '-', 'Pengeluaran', 18, 100000, 'Pembelian part mesin', 1),
(91, '2023-10-16', 'PT TITAN', 'Pemasukan', 22, 10000000, 'Penyambung AS', 1),
(92, '2023-10-16', 'PT TITAN', 'Pemasukan', 22, 10000000, 'AS Dudukan Tuas', 1),
(93, '2023-10-10', '-', 'Pengeluaran', 19, 30000000, 'Plat Besi', 1),
(94, '2023-10-05', 'CV. Micromal Jahura ', 'Pemasukan', 22, 4000000, 'Bushing Kuningan Diameter 7.5 x 5', 1),
(95, '2023-09-04', 'PT ASSEN', 'Pemasukan', 22, 4500000, 'Collar Diamater 13 \r\n', 1),
(96, '2023-01-02', '-', 'Pengeluaran', 15, 50000, 'Uang Jalan', 1),
(97, '2023-10-16', '-', 'Pengeluaran', 17, 4000000, 'Gaji', 1),
(98, '2023-10-16', '-', 'Pengeluaran', 15, 12000000, 'Bayaran Kontrakan', 1),
(99, '2023-01-09', '-', 'Pengeluaran', 15, 100000, 'Uang Jalan', 1),
(100, '2023-03-08', '--', 'Pengeluaran', 19, 5000000, 'AS Diameter 8', 1),
(101, '2023-04-12', '-', 'Pengeluaran', 19, 10000000, 'Plat Besi', 1),
(102, '2023-04-18', 'PT ASSEN', 'Pemasukan', 22, 5000000, 'Collar D.13 MM', 1),
(103, '2023-04-18', '-', 'Pengeluaran', 15, 100000, 'Uang Jalan', 1),
(104, '2023-04-27', '-', 'Pengeluaran', 17, 8000000, 'Gaji', 1),
(105, '2023-05-16', 'PT INDALEX', 'Pemasukan', 0, 20000000, 'Plat Besi', 1),
(106, '2023-05-13', '-', 'Pengeluaran', 15, 1000000, 'Plating Plat', 1),
(107, '2023-01-08', '-', 'Pengeluaran', 19, 15000000, 'Kuningan', 1),
(108, '2023-07-29', '-', 'Pengeluaran', 17, 8000000, 'Gaji', 1),
(109, '2023-07-07', '-', 'Pengeluaran', 19, 12000000, 'Kuningan', 1),
(110, '2023-07-14', '-', 'Pengeluaran', 15, 100000, 'Uang Jalan', 1),
(111, '2023-07-26', '-', 'Pengeluaran', 15, 1000000, 'Plating', 1),
(112, '2023-07-31', '-', 'Pengeluaran', 19, 15000000, 'Plat Besi', 1),
(113, '2023-07-25', 'PT TITAN', 'Pemasukan', 22, 10000000, 'Pin Teleskop', 1),
(114, '2023-07-23', '-', 'Pengeluaran', 15, 1000000, 'Plating Kuningan', 1),
(115, '2023-07-25', '-', 'Pengeluaran', 15, 100000, 'Uang Jalan', 1),
(116, '2023-10-24', 'PT TITAN', 'Pemasukan', 22, 5000000, 'Pin', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_foto` varchar(100) DEFAULT NULL,
  `user_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_foto`, `user_level`) VALUES
(1, 'febbri', 'febbri', 'b93939873fd4923043b9dec975811f66', '914923583_p.jpg', 'administrator'),
(9, 'putra', 'putra', 'b93939873fd4923043b9dec975811f66', '753385921_user.png', 'manajemen');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indeks untuk tabel `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`hutang_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`piutang_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `hutang`
--
ALTER TABLE `hutang`
  MODIFY `hutang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `piutang`
--
ALTER TABLE `piutang`
  MODIFY `piutang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
