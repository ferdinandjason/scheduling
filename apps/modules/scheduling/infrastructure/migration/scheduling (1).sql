-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 07 Des 2019 pada 08.01
-- Versi server: 5.7.24
-- Versi PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scheduling`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktivitas_mengajar`
--

CREATE TABLE `aktivitas_mengajar` (
  `id_dosen` int(10) UNSIGNED NOT NULL,
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `sks_mengajar` int(11) NOT NULL,
  `rencana_tatap_muka` int(11) NOT NULL,
  `realisasi_tatap_muka` int(11) DEFAULT NULL,
  `validasi_tatap_muka` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aktivitas_mengajar`
--

INSERT INTO `aktivitas_mengajar` (`id_dosen`, `id_kelas`, `sks_mengajar`, `rencana_tatap_muka`, `realisasi_tatap_muka`, `validasi_tatap_muka`) VALUES
(1, 1, 4, 16, 16, 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `nama`) VALUES
(1, 'Rizky Januar Akbar, S.Kom., M.Eng.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_kelas`
--

CREATE TABLE `jadwal_kelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `id_periode_kuliah` int(10) UNSIGNED NOT NULL,
  `id_prasarana` int(10) UNSIGNED NOT NULL,
  `hari` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_kelas`
--

INSERT INTO `jadwal_kelas` (`id`, `id_kelas`, `id_periode_kuliah`, `id_prasarana`, `hari`) VALUES
(1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_semester` int(10) UNSIGNED NOT NULL,
  `id_mata_kuliah` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_inggris` varchar(100) NOT NULL,
  `daya_tampung` int(11) NOT NULL,
  `jumlah_terisi` int(11) NOT NULL,
  `sks_kelas` int(11) NOT NULL,
  `rencana_tatap_muka` int(11) NOT NULL,
  `realisasi_tatap_muka` int(11) NOT NULL,
  `kelas_jarak_jauh` tinyint(1) NOT NULL,
  `validasi_tatap_muka` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `id_semester`, `id_mata_kuliah`, `nama`, `nama_inggris`, `daya_tampung`, `jumlah_terisi`, `sks_kelas`, `rencana_tatap_muka`, `realisasi_tatap_muka`, `kelas_jarak_jauh`, `validasi_tatap_muka`) VALUES
(1, 1, 1, 'A', 'A', 40, 40, 4, 16, 16, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuliah`
--

CREATE TABLE `kuliah` (
  `nrp_mahasiswa` char(20) NOT NULL,
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `nilai_angka` int(11) NOT NULL,
  `nilai_huruf` char(2) NOT NULL,
  `lulus` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nrp` char(20) NOT NULL,
  `id_dosen_wali` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`nrp`),
  FOREIGN KEY (`id_dosen_wali`) REFERENCES `dosen`(`id`),
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `mahasiswa`(`nrp`,`id_dosen_wali`,`nama`) VALUES ('05111640000001', 1, 'John Doe');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_matkul` char(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_inggris` varchar(100) NOT NULL,
  `sks` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id`, `kode_matkul`, `nama`, `nama_inggris`, `sks`, `deskripsi`) VALUES
(1, 'IF184101', 'Dasar Pemrograman', 'Fundamental Programming', 4, 'Sebuah Mata Kuliah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode_kuliah`
--

CREATE TABLE `periode_kuliah` (
  `id` int(10) UNSIGNED NOT NULL,
  `mulai` int(11) NOT NULL,
  `selesai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `periode_kuliah`
--

INSERT INTO `periode_kuliah` (`id`, `mulai`, `selesai`) VALUES
(1, 450, 600),
(2, 600, 750),
(3, 780, 930),
(4, 930, 1080),
(6, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prasarana`
--

CREATE TABLE `prasarana` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prasarana`
--

INSERT INTO `prasarana` (`id`, `nama`) VALUES
(1, 'IF-106');

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `singkatan` varchar(10) NOT NULL,
  `tahun_ajaran` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`id`, `nama`, `singkatan`, `tahun_ajaran`, `semester`, `aktif`, `tanggal_mulai`, `tanggal_selesai`) VALUES
(1, 'Genap 2019', 'Gn', 2019, 2, 1, '2019-12-02', '2019-12-02');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aktivitas_mengajar`
--
ALTER TABLE `aktivitas_mengajar`
  ADD UNIQUE KEY `id_dosen` (`id_dosen`),
  ADD UNIQUE KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_kelas`
--
ALTER TABLE `jadwal_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `periode_kuliah`
--
ALTER TABLE `periode_kuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `prasarana`
--
ALTER TABLE `prasarana`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jadwal_kelas`
--
ALTER TABLE `jadwal_kelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `periode_kuliah`
--
ALTER TABLE `periode_kuliah`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `prasarana`
--
ALTER TABLE `prasarana`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
