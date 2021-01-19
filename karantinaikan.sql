-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Des 2020 pada 06.45
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karantinaikan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bentuk`
--

CREATE TABLE `bentuk` (
  `kode_bentuk` varchar(25) NOT NULL,
  `nama_bentuk` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bentuk`
--

INSERT INTO `bentuk` (`kode_bentuk`, `nama_bentuk`) VALUES
('Alami', 'Alami (hidup, kista, segar/basah/beku)'),
('Buatan', 'Buatan (kemasan, kering)'),
('EBKKU', 'Ekstrak Bubuk, Kemasan Kedap Udara'),
('KKUCB', 'Kering, Kedap Udara, Cair, Bubuk'),
('MBKLP', 'Mentah, Basah, Kering, Larutan, Pasta'),
('Olahan', 'Olahan (perebusan, penjemuran, pengasapan, penggaraman dan pengeringan)'),
('SBB', 'Segar/Basah/Beku (bentuk utuh dan bagian tubuh ikan serta olahan mentah)'),
('SBentuk', 'Semua Bentuk (cair, semi solid, pasta atau padat, freeze drying)'),
('TBJI', 'Telur, benih, juvenil, induk, calon induk dan ukuran konsumsi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `class`
--

CREATE TABLE `class` (
  `nama_class` varchar(25) NOT NULL,
  `kode_class` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `class`
--

INSERT INTO `class` (`nama_class`, `kode_class`) VALUES
('Alga', 'Alga'),
('Amphibia', 'Amphibia'),
('Coelenterata', 'Coelenterata'),
('Crustacea', 'Crustacea'),
('Echinodermata', 'Echinodermata'),
('Mamalia', 'Mamalia'),
('Mollusca', 'Mollusca'),
('Pisces', 'Pisces'),
('Reptilia', 'Reptilia'),
('NC', 'Tidak Memiliki Kelas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datadokumen`
--

CREATE TABLE `datadokumen` (
  `kodeDSD` int(2) NOT NULL,
  `namaDSD` varchar(64) DEFAULT NULL,
  `fileDSD` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `datakategoriresiko`
--

CREATE TABLE `datakategoriresiko` (
  `kodeDKR` int(2) NOT NULL,
  `namaDKR` varchar(128) NOT NULL,
  `jenisMP` varchar(25) NOT NULL,
  `tkr` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datakategoriresiko`
--

INSERT INTO `datakategoriresiko` (`kodeDKR`, `namaDKR`, `jenisMP`, `tkr`) VALUES
(1, '12335', 'RKT', 2),
(2, '1', 'RHT', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataregistrasi`
--

CREATE TABLE `dataregistrasi` (
  `kodeDR` int(2) NOT NULL,
  `namaDR` varchar(25) NOT NULL,
  `jenisMP` varchar(25) NOT NULL,
  `sr` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dataregistrasi`
--

INSERT INTO `dataregistrasi` (`kodeDR`, `namaDR`, `jenisMP`, `sr`) VALUES
(2, '123', 'RKL', 1),
(3, '123456', 'IK', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `datasuspect`
--

CREATE TABLE `datasuspect` (
  `kodeDS` int(2) NOT NULL,
  `namaDS` varchar(128) NOT NULL,
  `jenisMP` varchar(25) NOT NULL,
  `ss` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datasuspect`
--

INSERT INTO `datasuspect` (`kodeDS`, `namaDS`, `jenisMP`, `ss`) VALUES
(1, '1', 'TA', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataterjangkit`
--

CREATE TABLE `dataterjangkit` (
  `kodeDT` int(2) NOT NULL,
  `namaDT` varchar(128) NOT NULL,
  `jenisMP` varchar(25) NOT NULL,
  `st` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dataterjangkit`
--

INSERT INTO `dataterjangkit` (`kodeDT`, `namaDT`, `jenisMP`, `st`) VALUES
(2, '1', 'MAT', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `diketahuipemilik`
--

CREATE TABLE `diketahuipemilik` (
  `kodeDP` int(2) NOT NULL,
  `namaDP` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `diketahuipemilik`
--

INSERT INTO `diketahuipemilik` (`kodeDP`, `namaDP`) VALUES
(1, 'YA'),
(2, 'TIDAK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id` int(11) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `ukuran_file` double NOT NULL,
  `tipe_file` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`id`, `deskripsi`, `nama_file`, `ukuran_file`, `tipe_file`) VALUES
(1, 'Asa', 'pendaftaran_maba.png', 246.37, 'image/png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gamdokumen`
--

CREATE TABLE `gamdokumen` (
  `kode_gam` int(2) NOT NULL,
  `nama_gam` varchar(128) NOT NULL,
  `gambar` varchar(500) NOT NULL,
  `ket` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gamdokumen`
--

INSERT INTO `gamdokumen` (`kode_gam`, `nama_gam`, `gambar`, `ket`) VALUES
(1, 'qwer', 'qwer', ''),
(2, 'trey', '', 'tyu'),
(3, 'Asasasasa', '', 'asasasasassa'),
(4, 'aaaaaaaa', '', 'aaaaaaaaaaaaaaaa'),
(5, 'aaaaaaqqqq', '', 'aaaaqqqqq'),
(6, 'Asa', '', 'sasa'),
(7, 'Logo', '', 'PMB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `kode_jenis` varchar(25) NOT NULL,
  `nama_jenis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`kode_jenis`, `nama_jenis`) VALUES
('BL', 'Benda Lain'),
('HIHHT', 'Hewan/ikan Hidup Hias Tawar dan Laut (Pisces, Crustacea, Mollusca, Echinodermata, Reptilia)'),
('HIHKT', 'Hewan/ikan Hidup Konsumsi Tawar dan Laut (Pisces, Crustacea, Mollusca, Echinodermata, Reptilia)'),
('HIMS', 'Hewan/ Ikan Mati Segar'),
('OHI', 'Olahan Hewan/Ikan'),
('PL', 'Produk Lain (Selain Ikan ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karantinaikan`
--

CREATE TABLE `karantinaikan` (
  `idKarantina` int(4) NOT NULL,
  `nama_ikan` varchar(256) NOT NULL,
  `jenisMP` varchar(25) DEFAULT NULL,
  `class` varchar(25) DEFAULT NULL,
  `kelompok` varchar(25) DEFAULT NULL,
  `bentuk` varchar(25) DEFAULT NULL,
  `perolehanmedia` varchar(25) DEFAULT NULL,
  `tujuanPenggunaan` varchar(25) DEFAULT NULL,
  `statusRegistrasi` varchar(25) DEFAULT NULL,
  `suspctibleSpecies` varchar(25) DEFAULT NULL,
  `terjangkit` varchar(25) DEFAULT NULL,
  `tingkatResiko` varchar(25) DEFAULT NULL,
  `diketahuiPemilik` varchar(25) DEFAULT NULL,
  `tempatPemasukan` varchar(25) DEFAULT NULL,
  `permohonanPemasukan` varchar(25) DEFAULT NULL,
  `statusDokumen` varchar(25) DEFAULT NULL,
  `kesesuaianIsi` varchar(25) DEFAULT NULL,
  `pengasingan` varchar(25) DEFAULT NULL,
  `statusHPIK` varchar(25) DEFAULT NULL,
  `penahanan` varchar(25) DEFAULT NULL,
  `pemenuhanSyarat` varchar(25) DEFAULT NULL,
  `penolakan` varchar(25) DEFAULT NULL,
  `tindakanAkhir` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karantinaikan`
--

INSERT INTO `karantinaikan` (`idKarantina`, `nama_ikan`, `jenisMP`, `class`, `kelompok`, `bentuk`, `perolehanmedia`, `tujuanPenggunaan`, `statusRegistrasi`, `suspctibleSpecies`, `terjangkit`, `tingkatResiko`, `diketahuiPemilik`, `tempatPemasukan`, `permohonanPemasukan`, `statusDokumen`, `kesesuaianIsi`, `pengasingan`, `statusHPIK`, `penahanan`, `pemenuhanSyarat`, `penolakan`, `tindakanAkhir`) VALUES
(1, 'a', 'BL', 'Alga', 'BB1', 'SBB', 'Alami', 'BHPP', '2', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '3'),
(2, 'Aha', 'BL', 'Alga', 'BB1', 'SBB', 'Alami', 'BHPP', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '3'),
(3, 'Ahaha', 'BL', 'Alga', 'BB1', 'Alami', 'Alami', 'BHPP', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok`
--

CREATE TABLE `kelompok` (
  `kode_kel` varchar(25) NOT NULL,
  `nama_kel` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelompok`
--

INSERT INTO `kelompok` (`kode_kel`, `nama_kel`) VALUES
('BB1', 'Bahan Biologik, Biakan Organisme\r\n'),
('BLDI', 'Bentuk lain diluar ikan dan benda lain atau yang berasal dari bagian tubuh ikan\r\n'),
('BP1', 'BAHAN PATOGENIK PENGENDALI HAYATI'),
('BPPI', 'Bahan Pembuat Pakan Ikan'),
('Hidup', 'Hidup'),
('Mati', 'Mati'),
('PI', 'Pakan Ikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kesesuaianisi`
--

CREATE TABLE `kesesuaianisi` (
  `kodeKI` int(2) NOT NULL,
  `namaKI` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kesesuaianisi`
--

INSERT INTO `kesesuaianisi` (`kodeKI`, `namaKI`) VALUES
(1, 'YA'),
(2, 'TIDAK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemenuhansyarat`
--

CREATE TABLE `pemenuhansyarat` (
  `kodePS` int(2) NOT NULL,
  `namaPS` varchar(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemenuhansyarat`
--

INSERT INTO `pemenuhansyarat` (`kodePS`, `namaPS`) VALUES
(1, 'Memenuhi persyaratan setelah ditahan 3 hari'),
(2, 'Memenuhi persyaratan tanpa penahanan'),
(3, 'Tidak dapat Memenuhi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penahanan`
--

CREATE TABLE `penahanan` (
  `kodePenahanan` int(2) NOT NULL,
  `namaPenahanan` varchar(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penahanan`
--

INSERT INTO `penahanan` (`kodePenahanan`, `namaPenahanan`) VALUES
(1, 'Ya'),
(2, 'Tidak Ditahan karena sesuai persyaratan'),
(3, 'Tidak Ditahan karena berpotensi Ditolak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengasingan`
--

CREATE TABLE `pengasingan` (
  `kodePengasingan` int(2) NOT NULL,
  `namaPengasingan` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengasingan`
--

INSERT INTO `pengasingan` (`kodePengasingan`, `namaPengasingan`) VALUES
(1, 'YA'),
(2, 'TIDAK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penolakan`
--

CREATE TABLE `penolakan` (
  `kodePenolakan` int(2) NOT NULL,
  `namaPenolakan` varchar(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penolakan`
--

INSERT INTO `penolakan` (`kodePenolakan`, `namaPenolakan`) VALUES
(1, 'Ya'),
(2, 'Tidak Ditolak karena sesuai persyaratan'),
(3, 'Tidak Ditolak karena berpotensi Dimusnahkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonanpemasukan`
--

CREATE TABLE `permohonanpemasukan` (
  `kodePP` int(2) NOT NULL,
  `namaPP` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `permohonanpemasukan`
--

INSERT INTO `permohonanpemasukan` (`kodePP`, `namaPP`) VALUES
(1, 'YA'),
(2, 'TIDAK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perolehanmedia`
--

CREATE TABLE `perolehanmedia` (
  `kode_media` varchar(25) NOT NULL,
  `nama_media` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perolehanmedia`
--

INSERT INTO `perolehanmedia` (`kode_media`, `nama_media`) VALUES
('Alami', 'Alami (hidup, kista, segar/basah/beku)\r\n'),
('Buatan', 'Buatan (kemasan, kering)\r\n'),
('EBKKU', 'Ekstrak Bubuk, Kemasan Kedap Udara'),
('HBT', 'Hasil Budidaya/ Tangkap\r\n'),
('IBPRP', 'Industri Besar, Produksi Rumahan, Perdagangan'),
('KKUCB', 'Kering, Kedap Udara, Cair, Bubuk\r\n'),
('MBKLP', 'Mentah, Basah, Kering, Larutan, Pasta\r\n'),
('Olahan', 'Olahan (perebusan, penjemuran, pengasapan, penggaraman dan pengeringan)'),
('SBentuk', 'Semua Bentuk (cair, semi solid, pasta atau padat, freeze drying)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statusdokumen`
--

CREATE TABLE `statusdokumen` (
  `kodeSD` int(2) NOT NULL,
  `namaSD` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `statusdokumen`
--

INSERT INTO `statusdokumen` (`kodeSD`, `namaSD`) VALUES
(1, 'Valid (Dokumen no 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11)'),
(2, 'Tidak Valid (Dokumen no 4, 5, 6, 7)'),
(3, 'Tidak Valid (Dokumen no 1, 2, 3, 8, 9, 10)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statushpik`
--

CREATE TABLE `statushpik` (
  `kodeHPIK` int(2) NOT NULL,
  `namaHPIK` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `statushpik`
--

INSERT INTO `statushpik` (`kodeHPIK`, `namaHPIK`) VALUES
(1, 'Tidak ditemukan HPIK setelah Pengasingan di instalasi karantina ikan'),
(2, 'Tidak ditemukan HPIK tanpa Pengasingan karena resiko rendah'),
(3, 'Ditemukan HPIK yang tidak memungkinkan diberikan perlakuan'),
(4, 'Ditemukan HPIK golongan I dan II');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statusregistrasi`
--

CREATE TABLE `statusregistrasi` (
  `kodeSR` int(2) NOT NULL,
  `namaSR` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `statusregistrasi`
--

INSERT INTO `statusregistrasi` (`kodeSR`, `namaSR`) VALUES
(1, 'SUDAH'),
(2, 'BELUM/ TIDAK TEREGISTRASI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suspectiblespecies`
--

CREATE TABLE `suspectiblespecies` (
  `kodeSS` int(2) NOT NULL,
  `namaSS` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `suspectiblespecies`
--

INSERT INTO `suspectiblespecies` (`kodeSS`, `namaSS`) VALUES
(1, 'YA'),
(2, 'TIDAK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempatpemasukan`
--

CREATE TABLE `tempatpemasukan` (
  `kodeTP` int(2) NOT NULL,
  `namaTP` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tempatpemasukan`
--

INSERT INTO `tempatpemasukan` (`kodeTP`, `namaTP`) VALUES
(1, 'YA'),
(2, 'TIDAK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `terjangkit`
--

CREATE TABLE `terjangkit` (
  `kodeTerjangkit` int(2) NOT NULL,
  `namaTerjangkit` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `terjangkit`
--

INSERT INTO `terjangkit` (`kodeTerjangkit`, `namaTerjangkit`) VALUES
(1, 'YA'),
(2, 'TIDAK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `texteditor`
--

CREATE TABLE `texteditor` (
  `id` int(10) NOT NULL,
  `nama_lokasi` varchar(150) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `texteditor`
--

INSERT INTO `texteditor` (`id`, `nama_lokasi`, `keterangan`) VALUES
(3, 'Aha', '<p><strong>asasasa</strong></p>\r\n<h2><strong>asasasa</strong></h2>\r\n<p><em><strong>ghhhhh</strong></em></p>\r\n<p><em><strong>kalalalaka</strong></em></p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakanakhir`
--

CREATE TABLE `tindakanakhir` (
  `kodeTA` varchar(25) NOT NULL,
  `namaTA` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tindakanakhir`
--

INSERT INTO `tindakanakhir` (`kodeTA`, `namaTA`) VALUES
('1', 'SATU'),
('2', 'DUA'),
('3', 'TIGA'),
('4', 'EMPAT'),
('5', 'LIMA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tingkatresiko`
--

CREATE TABLE `tingkatresiko` (
  `kodeTR` int(2) NOT NULL,
  `namaTR` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tingkatresiko`
--

INSERT INTO `tingkatresiko` (`kodeTR`, `namaTR`) VALUES
(1, 'TINGGI'),
(2, 'RENDAH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tujuanpenggunaan`
--

CREATE TABLE `tujuanpenggunaan` (
  `kode_JP` varchar(25) NOT NULL,
  `nama_JP` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tujuanpenggunaan`
--

INSERT INTO `tujuanpenggunaan` (`kode_JP`, `nama_JP`) VALUES
('BHPP', 'Budidaya, Hobies, Pameran, Penelitian'),
('KU', 'Konsumsi/ Umpan\r\n'),
('SP', 'Semua Peruntukan');

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
-- Indeks untuk tabel `bentuk`
--
ALTER TABLE `bentuk`
  ADD PRIMARY KEY (`kode_bentuk`);

--
-- Indeks untuk tabel `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`kode_class`);

--
-- Indeks untuk tabel `datadokumen`
--
ALTER TABLE `datadokumen`
  ADD PRIMARY KEY (`kodeDSD`);

--
-- Indeks untuk tabel `datakategoriresiko`
--
ALTER TABLE `datakategoriresiko`
  ADD PRIMARY KEY (`kodeDKR`);

--
-- Indeks untuk tabel `dataregistrasi`
--
ALTER TABLE `dataregistrasi`
  ADD PRIMARY KEY (`kodeDR`);

--
-- Indeks untuk tabel `datasuspect`
--
ALTER TABLE `datasuspect`
  ADD PRIMARY KEY (`kodeDS`);

--
-- Indeks untuk tabel `dataterjangkit`
--
ALTER TABLE `dataterjangkit`
  ADD PRIMARY KEY (`kodeDT`);

--
-- Indeks untuk tabel `diketahuipemilik`
--
ALTER TABLE `diketahuipemilik`
  ADD PRIMARY KEY (`kodeDP`);

--
-- Indeks untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gamdokumen`
--
ALTER TABLE `gamdokumen`
  ADD PRIMARY KEY (`kode_gam`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`kode_jenis`);

--
-- Indeks untuk tabel `karantinaikan`
--
ALTER TABLE `karantinaikan`
  ADD PRIMARY KEY (`idKarantina`);

--
-- Indeks untuk tabel `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`kode_kel`);

--
-- Indeks untuk tabel `kesesuaianisi`
--
ALTER TABLE `kesesuaianisi`
  ADD PRIMARY KEY (`kodeKI`);

--
-- Indeks untuk tabel `pemenuhansyarat`
--
ALTER TABLE `pemenuhansyarat`
  ADD PRIMARY KEY (`kodePS`);

--
-- Indeks untuk tabel `penahanan`
--
ALTER TABLE `penahanan`
  ADD PRIMARY KEY (`kodePenahanan`);

--
-- Indeks untuk tabel `pengasingan`
--
ALTER TABLE `pengasingan`
  ADD PRIMARY KEY (`kodePengasingan`);

--
-- Indeks untuk tabel `penolakan`
--
ALTER TABLE `penolakan`
  ADD PRIMARY KEY (`kodePenolakan`);

--
-- Indeks untuk tabel `permohonanpemasukan`
--
ALTER TABLE `permohonanpemasukan`
  ADD PRIMARY KEY (`kodePP`);

--
-- Indeks untuk tabel `perolehanmedia`
--
ALTER TABLE `perolehanmedia`
  ADD PRIMARY KEY (`kode_media`);

--
-- Indeks untuk tabel `statusdokumen`
--
ALTER TABLE `statusdokumen`
  ADD PRIMARY KEY (`kodeSD`);

--
-- Indeks untuk tabel `statushpik`
--
ALTER TABLE `statushpik`
  ADD PRIMARY KEY (`kodeHPIK`);

--
-- Indeks untuk tabel `statusregistrasi`
--
ALTER TABLE `statusregistrasi`
  ADD PRIMARY KEY (`kodeSR`);

--
-- Indeks untuk tabel `suspectiblespecies`
--
ALTER TABLE `suspectiblespecies`
  ADD PRIMARY KEY (`kodeSS`);

--
-- Indeks untuk tabel `tempatpemasukan`
--
ALTER TABLE `tempatpemasukan`
  ADD PRIMARY KEY (`kodeTP`);

--
-- Indeks untuk tabel `terjangkit`
--
ALTER TABLE `terjangkit`
  ADD PRIMARY KEY (`kodeTerjangkit`);

--
-- Indeks untuk tabel `texteditor`
--
ALTER TABLE `texteditor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tindakanakhir`
--
ALTER TABLE `tindakanakhir`
  ADD PRIMARY KEY (`kodeTA`);

--
-- Indeks untuk tabel `tingkatresiko`
--
ALTER TABLE `tingkatresiko`
  ADD PRIMARY KEY (`kodeTR`);

--
-- Indeks untuk tabel `tujuanpenggunaan`
--
ALTER TABLE `tujuanpenggunaan`
  ADD PRIMARY KEY (`kode_JP`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `datadokumen`
--
ALTER TABLE `datadokumen`
  MODIFY `kodeDSD` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `datakategoriresiko`
--
ALTER TABLE `datakategoriresiko`
  MODIFY `kodeDKR` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dataregistrasi`
--
ALTER TABLE `dataregistrasi`
  MODIFY `kodeDR` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `datasuspect`
--
ALTER TABLE `datasuspect`
  MODIFY `kodeDS` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `dataterjangkit`
--
ALTER TABLE `dataterjangkit`
  MODIFY `kodeDT` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `gamdokumen`
--
ALTER TABLE `gamdokumen`
  MODIFY `kode_gam` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `karantinaikan`
--
ALTER TABLE `karantinaikan`
  MODIFY `idKarantina` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `statusregistrasi`
--
ALTER TABLE `statusregistrasi`
  MODIFY `kodeSR` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `texteditor`
--
ALTER TABLE `texteditor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
