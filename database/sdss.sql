-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jun 2020 pada 07.56
-- Versi server: 10.3.15-MariaDB
-- Versi PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdss`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kode_kec` varchar(10) NOT NULL,
  `nama_kec` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`kode_kec`, `nama_kec`) VALUES
('WNS', 'WANASARI'),
('TJG', 'TANJUNG'),
('LSR', 'LOSARI'),
('KTG', 'KETANGGUNGAN'),
('BLKAMBA', 'BULAKAMBA'),
('BREBES', 'BREBES'),
('JTB', 'JATIBARANG'),
('KLGS', 'KALIGANGSA'),
('TOJG', 'TONJONG'),
('BMY', 'BUMIAYU'),
('SLM', 'SALEM'),
('BJHRJ', 'BANJARHARJO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_industri`
--

CREATE TABLE `lokasi_industri` (
  `id_lokasi` int(5) NOT NULL,
  `nama_lokasi` varchar(50) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `desa` varchar(30) NOT NULL,
  `kec` varchar(30) NOT NULL,
  `jrk_sumber` int(11) NOT NULL,
  `dilalui_jln_utama` varchar(15) NOT NULL,
  `jrk_pemasaran` int(11) NOT NULL,
  `harga_lahan` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `point` int(11) NOT NULL,
  `kab` varchar(30) NOT NULL DEFAULT 'BREBES'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi_industri`
--

INSERT INTO `lokasi_industri` (`id_lokasi`, `nama_lokasi`, `latitude`, `longitude`, `desa`, `kec`, `jrk_sumber`, `dilalui_jln_utama`, `jrk_pemasaran`, `harga_lahan`, `keterangan`, `point`, `kab`) VALUES
(1, 'Pantura Klampok KM 3 ', '-6.852775', '108.891834', 'Bulakamba', 'BLKAMBA', 10, 'YA', 50, '4000000', 'blablablablablablablablablablablabla..........', 320, 'BREBES'),
(2, 'Gintung', '-6.922401', '108.702988', 'Kersana', 'KTG', 10, 'YA', 50, '5000000', 'bla bla bla...', 280, 'BREBES'),
(4, 'MAJA', '-6.950213', '108.770983', 'KARANGMAJA', 'BJHRJ', 30, 'YA', 80, '2500000', 'AFJAJFKAFASFA...............................', 240, 'BREBES');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ranking`
--

CREATE TABLE `ranking` (
  `id_lokasi` varchar(30) NOT NULL,
  `skor` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`username`, `password`, `nama`) VALUES
('admin', 'Q3ffmcyaEIEYg', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`kode_kec`);

--
-- Indeks untuk tabel `lokasi_industri`
--
ALTER TABLE `lokasi_industri`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `lokasi_industri`
--
ALTER TABLE `lokasi_industri`
  MODIFY `id_lokasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
