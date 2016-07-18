-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Mar 2016 pada 08.44
-- Versi Server: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siraka`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `tgl_berita` date NOT NULL,
  `judul_berita` varchar(25) NOT NULL,
  `penulis` varchar(25) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `tgl_berita`, `judul_berita`, `penulis`, `status`) VALUES
(1, '2016-01-01', 'Judul Berita 1', 'Deputi 1', 'Aktif'),
(2, '2016-01-02', 'Judul Berita 2', 'Deputi 1', 'Aktif'),
(3, '2016-01-03', 'Judul Berita 3', 'Deputi 1', 'Aktif'),
(4, '2016-01-04', 'Judul Berita 4', 'Deputi 1', 'Aktif'),
(5, '2016-01-05', 'Judul Berita 5', 'Deputi 1', 'Aktif'),
(6, '2016-01-06', 'Judul Berita 6', 'Deputi 1', 'Aktif'),
(7, '2016-01-07', 'Judul Berita 7', 'Deputi 1', 'Aktif'),
(8, '2016-01-08', 'Judul Berita 8', 'Deputi 1', 'Aktif'),
(9, '2016-01-09', 'Judul Berita 9', 'Deputi 1', 'Aktif'),
(10, '2016-01-10', 'Judul Berita 10', 'Deputi 1', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Deputi 1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Deputi 2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Deputi 3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Deputi 4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Deputi 5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Deputi 6', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Deputi 7', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alokasi_anggaran` bigint(20) NOT NULL,
  `alokasi_kinerja` int(5) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `program_id`, `nama`, `alokasi_anggaran`, `alokasi_kinerja`, `updated_at`, `created_at`) VALUES
(2, 1, 'Kegiatan A1', 1000000000, 25, '2016-03-03 09:14:39', '2016-03-03 09:14:39'),
(3, 1, 'Kegiatan A2', 1000000000, 25, '2016-03-03 09:45:37', '2016-03-03 09:14:54'),
(5, 1, 'Kegiatan A3', 1000000000, 25, '2016-03-03 09:47:36', '2016-03-03 09:47:36'),
(6, 1, 'Kegiatan A4', 1000000000, 25, '2016-03-03 09:47:45', '2016-03-03 09:47:45'),
(7, 2, 'Kegiatan B1', 2000000000, 100, '2016-03-04 06:03:01', '2016-03-04 06:03:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `output`
--

CREATE TABLE `output` (
  `id` int(11) NOT NULL,
  `kegiatan_id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `anggaran` bigint(20) NOT NULL,
  `kinerja` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `output`
--

INSERT INTO `output` (`id`, `kegiatan_id`, `nama`, `anggaran`, `kinerja`, `updated_at`, `created_at`) VALUES
(1, 2, 'Output A11', 600000000, 50, '2016-03-03', '2016-03-03'),
(3, 2, 'Output A12', 400000000, 50, '2016-03-03', '2016-03-03'),
(4, 7, 'Output B11', 2000000000, 100, '2016-03-04', '2016-03-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `kode_program` varchar(10) NOT NULL,
  `nama_program` varchar(50) NOT NULL,
  `group_id` int(11) NOT NULL,
  `alokasi_anggaran` varchar(10) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `program`
--

INSERT INTO `program` (`id`, `kode_program`, `nama_program`, `group_id`, `alokasi_anggaran`, `updated_at`, `created_at`) VALUES
(1, '001', 'Program A', 1, '4000000000', '2016-03-03 07:56:08', '2016-03-03 07:56:08'),
(2, '002', 'Program B', 4, '2000000000', '2016-03-03 07:56:42', '2016-03-03 07:56:42'),
(3, '003', 'Program C', 2, '4000000000', '2016-03-03 07:57:06', '2016-03-03 07:57:06'),
(6, '004', 'Program D', 6, '2000000000', '2016-03-03 11:09:06', '2016-03-03 11:09:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_output`
--

CREATE TABLE `sub_output` (
  `id` int(11) NOT NULL,
  `output_id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `anggaran` int(11) NOT NULL,
  `kinerja` int(11) NOT NULL,
  `capaian` varchar(500) NOT NULL,
  `unit` varchar(150) NOT NULL,
  `januari` int(11) NOT NULL,
  `februari` int(11) NOT NULL,
  `maret` int(11) NOT NULL,
  `april` int(11) NOT NULL,
  `mei` int(11) NOT NULL,
  `juni` int(11) NOT NULL,
  `juli` int(11) NOT NULL,
  `agustus` int(11) NOT NULL,
  `september` int(11) NOT NULL,
  `oktober` int(11) NOT NULL,
  `november` int(11) NOT NULL,
  `desember` int(11) NOT NULL,
  `realisasi_id` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sub_output`
--

INSERT INTO `sub_output` (`id`, `output_id`, `nama`, `anggaran`, `kinerja`, `capaian`, `unit`, `januari`, `februari`, `maret`, `april`, `mei`, `juni`, `juli`, `agustus`, `september`, `oktober`, `november`, `desember`, `realisasi_id`, `updated_at`, `created_at`) VALUES
(1, 1, 'SUB1', 5000000, 50, 'Buku', '', 1000000, 0, 0, 4000000, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2016-03-04', '2016-03-03'),
(2, 1, 'SUB2', 5000000, 20, 'Laporan', '', 0, 0, 0, 0, 0, 0, 4000000, 0, 0, 0, 0, 0, 2, '2016-03-04', '2016-03-03'),
(3, 1, 'SUB3', 100000000, 10, 'Rapat', '', 0, 50000000, 0, 0, 50000000, 0, 0, 0, 0, 0, 0, 0, 0, '2016-03-04', '2016-03-04'),
(4, 1, 'SUB4', 500000000, 20, '', '', 0, 0, 500000000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2016-03-04', '2016-03-04'),
(5, 4, 'SUB1', 2000000000, 100, '', '', 0, 0, 2000000000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, '2016-03-04', '2016-03-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_output_realisasi`
--

CREATE TABLE `sub_output_realisasi` (
  `id` int(11) NOT NULL,
  `januari` int(11) NOT NULL,
  `februari` int(11) NOT NULL,
  `maret` int(11) NOT NULL,
  `april` int(11) NOT NULL,
  `mei` int(11) NOT NULL,
  `juni` int(11) NOT NULL,
  `juli` int(11) NOT NULL,
  `agustus` int(11) NOT NULL,
  `september` int(11) NOT NULL,
  `oktober` int(11) NOT NULL,
  `november` int(11) NOT NULL,
  `desember` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sub_output_realisasi`
--

INSERT INTO `sub_output_realisasi` (`id`, `januari`, `februari`, `maret`, `april`, `mei`, `juni`, `juli`, `agustus`, `september`, `oktober`, `november`, `desember`, `updated_at`, `created_at`) VALUES
(1, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2016-03-03', '2016-03-03'),
(2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2016-03-03', '2016-03-03'),
(3, 0, 0, 95, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2016-03-04', '2016-03-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_anggaran`
--

CREATE TABLE `tahun_anggaran` (
  `id` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `anggaran` bigint(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun_anggaran`
--

INSERT INTO `tahun_anggaran` (`id`, `tahun`, `anggaran`, `updated_at`, `created_at`) VALUES
(1, 2016, 12000000000, '2016-03-03 07:55:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level_user` varchar(20) NOT NULL,
  `remember_token` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `level_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'admin', 'admin', '$2y$10$MVjDYK7Cowvs6JiHyaEGQuXWJjBj45bV3snXRzE7vWGkWp10JDWTm', 'ADMINISTRATOR', 'Vo1Y6BVG1qpgbQSWKhfh4HoYTJh2KpH3ONDOwiwSMbzs6IZlbInyZEAEie1O', '0000-00-00 00:00:00', '2016-02-21 19:36:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `output`
--
ALTER TABLE `output`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_output`
--
ALTER TABLE `sub_output`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_output_realisasi`
--
ALTER TABLE `sub_output_realisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_anggaran`
--
ALTER TABLE `tahun_anggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `output`
--
ALTER TABLE `output`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sub_output`
--
ALTER TABLE `sub_output`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sub_output_realisasi`
--
ALTER TABLE `sub_output_realisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tahun_anggaran`
--
ALTER TABLE `tahun_anggaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
