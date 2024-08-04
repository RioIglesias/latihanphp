-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2024 pada 06.45
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `ID_Barang` int(11) NOT NULL,
  `NamaBarang` varchar(30) NOT NULL,
  `Satuan` char(20) NOT NULL,
  `HargaSatuan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`ID_Barang`, `NamaBarang`, `Satuan`, `HargaSatuan`) VALUES
(3671, 'Indomie Ayam Bawang', 'Bungkus', 2500),
(3672, 'Gula', '1 Kg', 12000),
(3673, 'Telur Ayam Negeri', 'Pak isi 6', 25000),
(3674, 'Kitkat', 'Pcs', 8000),
(3675, 'Kopi Kapal Api', '10 Pcs', 14000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `ID_Penjualan` int(11) NOT NULL,
  `ID_Barang` int(11) NOT NULL,
  `Kuantitas` smallint(6) NOT NULL,
  `HargaSatuan` float NOT NULL,
  `Sub_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir`
--

CREATE TABLE `kasir` (
  `ID_Kasir` int(11) NOT NULL,
  `Username` char(10) NOT NULL,
  `NamaKasir` varchar(30) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `NomorHP` char(15) NOT NULL,
  `NomorKTP` char(20) NOT NULL,
  `Password` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kasir`
--

INSERT INTO `kasir` (`ID_Kasir`, `Username`, `NamaKasir`, `Alamat`, `NomorHP`, `NomorKTP`, `Password`) VALUES
(1010, 'budi', 'Budi Maryadi', 'Tangerang', '081265653434', '5674820808710003', '123'),
(1011, 'adi', 'Adi Suharso', 'Semarang', '086876542345', '3412760405820001', '123'),
(1012, 'badu', 'Badu Armanto', 'Tasik', '087634237867', '7612881003880002', '123'),
(1013, 'susi', 'Susi Budiarti', 'Yogya', '081178125546', '1741970504780002', '123'),
(1014, 'farhan', 'Farhan Kamil', 'Depok', '08896546788', '567800993811230', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `ID_Penjualan` int(11) NOT NULL,
  `WaktuTransaksi` datetime NOT NULL,
  `Total` float NOT NULL,
  `ID_Shift` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `shift`
--

CREATE TABLE `shift` (
  `ID_Shift` int(11) NOT NULL,
  `ID_Kasir` int(11) NOT NULL,
  `WaktuBuka` datetime NOT NULL,
  `SaldoAwal` double NOT NULL,
  `JumlahPenjualan` double NOT NULL,
  `SaldoAkhir` double NOT NULL,
  `WaktuTutup` datetime NOT NULL,
  `Status` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_Barang`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD KEY `fk_penjualan` (`ID_Penjualan`),
  ADD KEY `fk_barang` (`ID_Barang`);

--
-- Indeks untuk tabel `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`ID_Kasir`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`ID_Penjualan`),
  ADD KEY `fk_shift` (`ID_Shift`);

--
-- Indeks untuk tabel `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`ID_Shift`),
  ADD KEY `fk_kasir` (`ID_Kasir`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `fk_barang` FOREIGN KEY (`ID_Barang`) REFERENCES `barang` (`ID_Barang`),
  ADD CONSTRAINT `fk_penjualan` FOREIGN KEY (`ID_Penjualan`) REFERENCES `penjualan` (`ID_Penjualan`);

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `fk_shift` FOREIGN KEY (`ID_Shift`) REFERENCES `shift` (`ID_Shift`);

--
-- Ketidakleluasaan untuk tabel `shift`
--
ALTER TABLE `shift`
  ADD CONSTRAINT `fk_kasir` FOREIGN KEY (`ID_Kasir`) REFERENCES `kasir` (`ID_Kasir`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
