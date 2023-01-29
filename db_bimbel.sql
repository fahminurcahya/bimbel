-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 29 Jan 2023 pada 03.58
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bimbel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `nama`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'DISCOUNT 50% UNTUK ANAK GURU/DOSEN, RANGKING 1-5, DAN ANAK YATIM (*)', 'diskon/20211001164247.png', '2021-08-08 03:52:23', '2021-10-01 09:42:47'),
(3, 'DISKON 30% UNTUK KAKAK BERADIK', 'diskon/20211001164304.png', '2021-08-10 20:49:46', '2021-10-01 09:43:04'),
(4, 'DISKON 20% ATLET', 'diskon/20211001164321.png', '2021-08-10 20:50:04', '2021-10-01 09:43:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl` date NOT NULL,
  `pendidikan` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengalaman` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nama`, `ttl`, `pendidikan`, `pengalaman`, `moto`, `gambar_guru`, `created_at`, `updated_at`) VALUES
(1, 'Ficky Rustyianingsih, S.Pd', '1983-08-11', 'S1 Pendidikan Luar Sekolah (Universitas Singaperbangsa Karawang) 2006', 'Guru Matematika SMP Atohariah Karawang 2006-2008, Mengajar di Lembaga Kursus Kumon 2006-2009.', 'Kesuksesan itu bukan di tunggu melainkan diraih dengan semangat dan kegigihan', 'guru/20211001115146.png', '2021-08-01 19:23:18', '2021-10-01 04:51:46'),
(6, 'Susi Susilawati, S.Pd', '1996-04-23', 'S1 Pendidikan Biologi (Universitas Pasundan) 2018', 'Guru Mata Pelajaran IPA SMA Kosgoro 2019 - Sekarang', 'Nikmati, jalani, syukuri. Maka kau akan temukan kebahagiaan dalam hidupmu.', 'guru/20211001161006.png', '2021-08-01 12:23:18', '2021-10-01 09:10:06'),
(7, 'Riyanti Suhaemi, S.Pd', '1997-02-17', 'S1 Pendidikan Matematika (Universitas Singaperbangsa Karawang) 2019', 'Guru Private Matematika SD-SMA 2017 - Sekarang', 'Kebaikan untuk dirimu sendiri, keburukan untuk dirimu sendiri.', 'guru/20211001161229.png', '2021-08-01 12:23:18', '2021-10-01 09:12:29'),
(8, 'Bambang Herwiyanto, M.Pd', '1977-05-07', 'S2 Fakultas Matematika dan IPA (Universitas Indraprasta PGRI) 2015', 'Dosen pengampu mata kuliah Fisika Dasar dan Matematika STT Budi Pertiwi Karawang', 'Jika kamu berbuat baik berarti kamu berbuat baik bagi dirimu sendiri dan jika kamu berbuat jahat, maka kejahatan itu bagi dirimu sendiri.', 'guru/20211001161703.png', '2021-08-01 12:23:18', '2021-10-01 09:17:03'),
(9, 'Ghyarlina Triyani, S.Pd', '1997-02-26', 'S1 Pendidikan Bahasa Inggris (Universitas Singaperbangsa Karawang) 2019', 'English Teacher Freelancer Junior/Senior High School', 'Tersenyum dan bahagialah selalu.', 'guru/20211001161922.png', '2021-08-01 12:23:18', '2021-10-01 09:19:22'),
(10, 'Ana Sumarna, S.Pd., Gr.', '1990-12-24', 'S1 Pendidikan Kimia (Universitas Pendidikan Indonesia) 2013', 'Pengajar di SMAN 1 Telagasari, pembimbing inti olimpiade kimia di Sekolah', 'Masa depan adalah milik orang-orang yang percaya akan keindahan mimpinya.', 'guru/20211001162202.png', '2021-08-01 12:23:18', '2021-10-01 09:22:02'),
(11, 'Paskalia Siwi Setianingrum, M.Pd', '1994-04-03', 'S2 Pendidikan Matematika (Universitas Sanata Dharma Yogyakarta)', 'Membimbing olimpiade matematika di SMA Taruna Bakti Bandung 2018-2020', 'Tiada hasil yang mengkhianati proses.', 'guru/20211001163407.png', '2021-10-01 09:34:07', '2021-10-01 09:34:07'),
(12, 'Annisa Safira Ramadhanty, S.Pd', '1998-01-14', 'S1 Pendidikan Sejarah (Universitas Sebelas Maret)', 'Guru Sejarah di SMK Texmaco Purwasari', 'Jadilah bagian dari perubahan yang ingin kamu saksikan di dunia ini', 'guru/20211001163907.png', '2021-10-01 09:39:07', '2021-10-01 09:39:07'),
(13, 'Nuriah, S.Pd', '1996-09-20', 'S1 Pendidikan Bahasa dan Sastra Indonesia (Universitas Singaperbangsa Karawang)', 'Staff Pengajar di SMK Proklamasi Karawang dan DTA Assakinah', 'Tidak ada gunung setinggi lutut, artinya tidak ada masalah yang tidak bisa diselesaikan.', 'guru/20211001164210.jpeg', '2021-10-01 09:42:10', '2021-10-01 09:42:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int(10) UNSIGNED NOT NULL,
  `id_soal` int(10) UNSIGNED NOT NULL,
  `jawaban_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban_benar` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_aktif` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `id_soal`, `jawaban_desc`, `jawaban_benar`, `is_aktif`, `created_at`, `updated_at`) VALUES
(1, 1, '<p>1</p>', '1', '1', '2023-01-29 01:52:39', '2023-01-29 01:52:39'),
(2, 1, '<p>2</p>', '0', '1', '2023-01-29 01:52:47', '2023-01-29 01:52:47'),
(3, 1, '<p>3</p>', '0', '1', '2023-01-29 01:52:54', '2023-01-29 01:52:54'),
(4, 1, '<p>4</p>', '0', '1', '2023-01-29 01:52:59', '2023-01-29 01:52:59'),
(5, 2, '<p>1</p>', '0', '1', '2023-01-29 01:53:30', '2023-01-29 01:53:30'),
(6, 2, '<p>2</p>', '1', '1', '2023-01-29 01:53:36', '2023-01-29 01:53:36'),
(7, 2, '<p>3</p>', '0', '1', '2023-01-29 01:53:44', '2023-01-29 01:53:44'),
(8, 2, '<p>4</p>', '0', '1', '2023-01-29 01:53:50', '2023-01-29 01:53:50'),
(9, 2, '<p>5</p>', '0', '1', '2023-01-29 01:53:54', '2023-01-29 01:53:54'),
(10, 3, '<p>1</p>', '0', '1', '2023-01-29 01:54:11', '2023-01-29 01:54:11'),
(11, 3, '<p>2</p>', '0', '1', '2023-01-29 01:54:18', '2023-01-29 01:54:18'),
(12, 3, '<p>3</p>', '1', '1', '2023-01-29 01:54:24', '2023-01-29 01:54:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenjang`
--

INSERT INTO `jenjang` (`id_jenjang`, `nama`, `created_at`, `updated_at`) VALUES
(1, '4 SD', '2021-08-06 00:29:48', '2021-08-06 00:29:48'),
(2, '5 SD', '2021-08-20 23:30:02', '2021-08-20 23:30:02'),
(3, '6 SD', '2021-08-20 23:30:07', '2021-08-20 23:30:07'),
(4, '7 SmP', '2021-08-06 00:29:48', '2021-08-06 00:29:48'),
(5, '8 SMP', '2021-08-20 23:30:02', '2021-08-20 23:30:02'),
(6, '9 SMP', '2021-08-20 23:30:07', '2021-08-20 23:30:07'),
(7, '10 IPA', '2021-08-06 00:29:48', '2021-08-06 00:29:48'),
(8, '10 IPS', '2021-08-20 23:30:02', '2021-08-20 23:30:02'),
(9, '10 Tanpa Penjurusan', '2021-08-20 23:30:07', '2021-08-20 23:30:07'),
(10, '11 IPA', '2021-08-06 00:29:48', '2021-08-06 00:29:48'),
(11, '11 IPS', '2021-08-20 23:30:02', '2021-08-20 23:30:02'),
(12, '12 IPA', '2021-08-20 23:30:07', '2021-08-20 23:30:07'),
(13, '12 IPS', '2021-08-20 23:30:07', '2021-08-20 23:30:07'),
(14, 'Alumni', '2021-08-20 23:30:07', '2021-08-20 23:30:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama`, `created_at`, `updated_at`) VALUES
(1, '4 SD', '2021-08-05 17:29:48', '2021-08-05 17:29:48'),
(2, '5 SD', '2021-08-20 16:30:02', '2021-08-20 16:30:02'),
(3, '6 SD', '2021-08-20 16:30:07', '2021-08-20 16:30:07'),
(4, '7 SmP', '2021-08-05 17:29:48', '2021-08-05 17:29:48'),
(5, '8 SMP', '2021-08-20 16:30:02', '2021-08-20 16:30:02'),
(6, '9 SMP', '2021-08-20 16:30:07', '2021-08-20 16:30:07'),
(7, '10 IPA', '2021-08-05 17:29:48', '2021-08-05 17:29:48'),
(8, '10 IPS', '2021-08-20 16:30:02', '2021-08-20 16:30:02'),
(9, '10 Tanpa Penjurusan', '2021-08-20 16:30:07', '2021-08-20 16:30:07'),
(10, '11 IPA', '2021-08-05 17:29:48', '2021-08-05 17:29:48'),
(11, '11 IPS', '2021-08-20 16:30:02', '2021-08-20 16:30:02'),
(12, '12 IPA', '2021-08-20 16:30:07', '2021-08-20 16:30:07'),
(13, '12 IPS', '2021-08-20 16:30:07', '2021-08-20 16:30:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `map_mapel_to_guru`
--

CREATE TABLE `map_mapel_to_guru` (
  `id_map_mapel_to_guru` int(10) UNSIGNED NOT NULL,
  `id_guru` int(10) UNSIGNED NOT NULL,
  `id_map_mapel_to_kelas` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `map_mapel_to_kelas`
--

CREATE TABLE `map_mapel_to_kelas` (
  `id_map_mapel_to_kelas` int(10) UNSIGNED NOT NULL,
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `id_mapel` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_08_07_101756_create_produk_tabel', 1),
(2, '2021_08_07_102203_create_produk_table', 2),
(3, '2021_08_08_103405_create_diskon_table', 3),
(4, '2021_08_11_014405_create_pendaftaran_table', 4),
(5, '2021_08_14_020814_create_why_us_table', 5),
(6, '2021_08_14_022341_create_why_us_table', 6),
(7, '2021_08_19_073914_create_topik_table', 7),
(8, '2021_08_19_074417_create_soal_table', 8),
(9, '2021_08_19_075351_create_soal_table', 9),
(10, '2021_08_20_115314_create_jawaban_table', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_daftar` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orang_tua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenjang` int(10) UNSIGNED NOT NULL,
  `info_ssc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_accept` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` enum('SD','SMP','SMA') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama`, `detail`, `kategori`, `created_at`, `updated_at`) VALUES
(2, '4 DAN 5 SD', '<p>Maksimal 15 siswa/kelas&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\n4 Sesi kegiatan belajar mengajar perminggu&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\n1 hari pertemuan terdiri dari 2 Sesi (2 Mata Pelajaran)&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nTentor dari Universitas Ternama di Indonesia&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nGeneral Check Up (GCU)&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nTest Multiple Intelegence, Test Kepribadian dan Test Gaya Belajar&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nSukses UTS, dan UAS&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nBuku Step by Step&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nFun Learning&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nThe Faster Solution&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nSOS (SSC Online Service) 24 Jam &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nKonsultasi Perhari Tanpa Batas Waktu&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nSSC Assesment/Raport&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</p>', 'SD', '2021-08-07 03:54:59', '2021-08-07 05:19:04'),
(3, '6 SD', '<p>Maksimal 15 siswa/kelas&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\n4 Sesi kegiatan belajar mengajar perminggu&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\n1 hari pertemuan terdiri dari 2 Sesi (2 Mata Pelajaran)&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nTentor dari Universitas Ternama di Indonesia&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nGeneral Check Up (GCU)&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nTest Multiple Intelegence, Test Kepribadian dan Test Gaya Belajar&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nSukses UTS, dan UAS&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nBuku Step by Step&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nFun Learning&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nThe Faster Solution&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nSOS (SSC Online Service) 24 Jam &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nKonsultasi Perhari Tanpa Batas Waktu&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nSSC Assesment/Raport&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nMeeting, Conseling, Motivation&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nSukses masuk SMP Favorit&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</p>', 'SD', '2021-08-07 05:16:28', '2021-08-07 05:19:44'),
(4, '7 DAN 8 SMP', '<p>Maksimal 15 siswa/kelas&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\n4 Sesi kegiatan belajar mengajar perminggu&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\n1 hari pertemuan terdiri dari 2 Sesi (2 Mata Pelajaran)&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nTentor dari Universitas Ternama di Indonesia&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nGeneral Check Up (GCU)&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nTest Multiple Intelegence, Test Kepribadian dan Test Gaya Belajar&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nSukses UTS, dan UAS&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nBuku Step by Step&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nFun Learning&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nThe Faster Solution&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nSOS (SSC Online Service) 24 Jam &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nKonsultasi Perhari Tanpa Batas Waktu&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nSSC Assesment/Raport&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</p>', 'SMP', '2021-08-07 05:17:06', '2021-08-07 05:17:12'),
(5, '9 SMP', '<p>Maksimal 15 siswa/kelas&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\n4 Sesi kegiatan belajar mengajar perminggu&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\n1 hari pertemuan terdiri dari 2 Sesi (2 Mata Pelajaran)&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nTentor dari Universitas Ternama di Indonesia&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nGeneral Check Up (GCU)&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nTest Multiple Intelegence, Test Kepribadian dan Test Gaya Belajar&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nSukses UTS, dan UAS&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nBuku Step by Step&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nFun Learning&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nThe Faster Solution&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nSOS (SSC Online Service) 24 Jam &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nKonsultasi Perhari Tanpa Batas Waktu&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nSSC Assesment/Raport&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nMeeting, Conseling, Motivation&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nSukses masuk SMA Favorit&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</p>', 'SMP', '2021-08-07 05:17:38', '2021-08-07 05:17:38'),
(6, '10 DAN 11 SMA', '<p>Maksimal 15 siswa/kelas&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\n4 Sesi kegiatan belajar mengajar perminggu&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\n1 hari pertemuan terdiri dari 2 Sesi (2 Mata Pelajaran)&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nTentor dari Universitas Ternama di Indonesia&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nGeneral Check Up (GCU)&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nTest Multiple Intelegence, Test Kepribadian dan Test Gaya Belajar&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nSukses UTS, dan UAS&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nBuku Step by Step&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nFun Learning&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nThe Faster Solution&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nSOS (SSC Online Service) 24 Jam &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nKonsultasi Perhari Tanpa Batas Waktu&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nTry Out Nasional&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nAnalisis Try Out&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nQuis Pusat/6 Bulan&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nSSC Assesment/Raport&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</p>', 'SMA', '2021-08-07 05:18:15', '2021-08-07 05:18:15'),
(7, '12 SMA', '<p>Maksimal 15 siswa/kelas&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\n4 Sesi kegiatan belajar mengajar perminggu&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\n1 hari pertemuan terdiri dari 2 Sesi (2 Mata Pelajaran)&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nTentor dari Universitas Ternama di Indonesia&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nGeneral Check Up (GCU)&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nTest Multiple Intelegence, Test Kepribadian dan Test Gaya Belajar&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nSukses UTS, dan UAS&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nBuku Step by Step&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nFun Learning&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nThe Faster Solution&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nSOS (SSC Online Service) 24 Jam &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nKonsultasi Perhari Tanpa Batas Waktu&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nTry Out Nasional&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nAnalisis Try Out&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nQuis Pusat/6 Bulan&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nSSC Assesment/Raport&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nSukses Masuk PTN&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nStudi Kampus&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</p>', 'SMA', '2021-08-07 05:18:55', '2021-08-07 05:18:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_filosofi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sejarah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `filosofi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `visi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `misi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id_profil`, `nama`, `alamat`, `no_tlp`, `email`, `footer`, `logo`, `logo_filosofi`, `sejarah`, `filosofi`, `visi`, `misi`, `created_at`, `updated_at`) VALUES
(1, 'Sony Sugema College', 'Jl Banten ByPass No. 1F Karangpawitan, Kecamatan Karawang Barat - Karawang', '08118487088', 'ssckarawang19@gmail.com', '<p>Sony Sugema College (SSC), adalah bimbingan belajar yang telah hadir 26 tahun lalu di Bandung, SSC lahir tahun 1990 dan sudah mengantarkan ribuan siswa ke Sekolah dan PTN favorit. Sejak berdirinya sampai sekarang SSC telah hadir di seluruh Indonesia. Sudah saatnya SSC memerlukan suatu perubahan yang baru melalui New Corporate Identity yang akan mempersatukan visi dan misi yang bersifat global.</p>', 'front/202108020825221.png', 'front/202108020825222.png', '<p><strong>Sony Sugema College (SSC)</strong>, sebagai sebuah bimbingan belajar lahir di Kota Kembang Bandung tahun 1990 dan sudah mengantarkan ribuan siswa ke PTN (Perguruan Tinggi Negeri) favorit. Sejak berdirinya sampai sekarang SSC telah hadir di kota-kota seluruh Indonesia. Dengan bertambahnya usia, sudah saatnya SSC memerlukan suatu perubahan yang baru melalui <strong><em>New Corporate Identity</em></strong> yang akan mempersatukan visi dan misi yang bersifat global.</p>\r\n\r\n<p>Beberapa perubahan dan inovasi terus digulirkan untuk memperbaiki visi dan misi kedepan yang sesuai dan tentunya kearah yang lebih baik. Setelah melalui beberapa tahapan proses, SSC pada akhirnya menemukan suatu visi yang baru yaitu <strong><em>&ldquo;future education, today&rdquo;</em></strong>, sekaligus perubahan logo yang lebih dinamis, suatu visi yang jelas ke masa yang akan datang.</p>\r\n\r\n<p>Visi tersebut harus jelas dijabarkan dengan tindakan yang bersifat fundamental dan mengakar, oleh karena itu SSC selalu melakukan hal-hal yang bersifat dasar terutama dalam hal materi pembelajaran kepada siswa-siswi SSC yaitu dengan kuda-kuda yang kuat.</p>\r\n\r\n<p>Semua kami lakukan dengan cara yang terindah yaitu <strong><em>&ldquo;The Finest Thing&rdquo;</em></strong> yang terindah bukan berarti <strong><em>&ldquo;The Best&rdquo;</em></strong>. <em><strong>The best</strong></em> selalu ingin mengalahkan orang lain, sementara <strong><em>&ldquo;The Finest&rdquo;</em></strong> adalah mengalahkan diri sendiri.</p>\r\n\r\n<p>Semoga dengan lahirnya <strong><em>&ldquo;Corporate Identity&rdquo;</em></strong> yang baru SSC akan menjadi Bimbingan Belajar yang diharapkan oleh semua komponen baik pihak intern maupun eksetrn.</p>\r\n\r\n<p>ttd</p>\r\n\r\n<p><strong>Sony Sugema</strong></p>', '<p>Desain Logo terbaru SSC visualisasi dari Brand Theme SSC&nbsp;&ldquo;<strong><em>Future Education, Today</em></strong>&rdquo;. Logo ini merupakan representasi&nbsp;dari Optimisme, Dinamisme dan bagaimana SSC melihat pendidikan&nbsp;dimasa yang akan datang.</p>\r\n\r\n<p>Sony Sugema College berkomitmen untuk menjadi mitra terbaik siswa&nbsp;dengan memberikan sistem belajar informal terbaik yang dipadukan&nbsp;dengan teknologi untuk masa depan siswa yang lebih&nbsp;baik.</p>\r\n\r\n<p>Bentuk logotype menyerupai daun yang mengindikasikan sesuatu&nbsp;yang bersifat natural, menyatakan SSC harus dibangun&nbsp;dan dikembangkan atas niat baik dan untuk kebaikan. Kebaikan&nbsp;yang didalamnya terdapat nilai-nilai kebersihan, kejernihan,&nbsp;dan kemurnian.</p>\r\n\r\n<p>Bentuk logo yang bergerak ke arah kanan mengindikasikan&nbsp;bahwa SSC akan terus berkembang dan bergerak secara berani,&nbsp;bijaksana, dan dinamis ke arah yang lebih baik. Sebuah&nbsp;arah yang tercermin dalam Tindakan-Tindakan Kebaikan yang&nbsp;Terencana di Lembaga Bimbingan Belajar SSC.</p>\r\n\r\n<p>Warna logo yang berwarna hijau-kekuningan mengindikasikan&nbsp;bahwa SSC akan mengedepankan inovasi dalam metode&nbsp;pembelajaran yang bersifat baru (fresh) dan terdepan untuk&nbsp;mewujudkan masa depan yang lebih cerah. Sebuah metode&nbsp;pembelajaran smart paripurna yang menyentuh semua aspek&nbsp;manusia dalam belajar, yaitu aspek kognitif, aspek afektif, dan&nbsp;aspek psikomotorik.</p>\r\n\r\n<p>Bentuk logotype dan logogram adalah wujud komitmen SSC&nbsp;untuk memahami siswa dan semua unsur lembaganya secara&nbsp;menyeluruh, yang tercermin secara kuat (characterize) dan&nbsp;merupakan satu bagian yang tidak dapat dipisahkan (unity).</p>\r\n\r\n<p>Perpaduan keseluruhan logo mencitrakan perpaduan Keindahan&nbsp;dan Kekuatan Komitmen setiap individu SSC untuk Memberi&nbsp;Kontribusi Terbaiknya.</p>', '<p>Menjadi Institusi Pendidikan Luar Sekolah yang Utama dan Terbaik di Indonesia.</p>', '<ol>\r\n	<li>LBB SSC Berkomitmen untuk menjadi mitra terbaik siswa dengan memberikan sistem belajar non-formal terbaik yang dipadukan dengan teknologi untuk masa depan siswa yang lebih baik.</li>\r\n	<li>Membantu setiap insan SSC mengembangkan kualitas diri dan mewujudkan kesejahteraan.</li>\r\n	<li>Mitra kerja yang dapat membantu menjawab kebutuhan relasi dalam pengembangan pendidikan.</li>\r\n</ol>', NULL, '2021-09-28 08:48:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `publish`
--

CREATE TABLE `publish` (
  `id_publish` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `publish`
--

INSERT INTO `publish` (`id_publish`, `judul`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'Hasil Try Out 25 Sep 2021', '<p>Berikut hasi try out 25 Sep 2021</p>\r\n\r\n<p>Kelas VII : <a href=\"http://localhost/webbimbel/public/uploads/publish/Keterangan Sakit XSIS Fahmi Nurcahya_1633097457.pdf\">Hasil</a></p>\r\n\r\n<p>Kelas V : <a href=\"http://localhost/webbimbel/public/uploads/publish/Summary Garuda_1633097483.docx\">Hasil</a></p>', '2021-10-01 14:11:33', '2021-10-01 14:11:33'),
(3, 'Hasil Try Out 26 Sep 2021', '<p>Kelas X : <a href=\"http://localhost/webbimbel/public/uploads/publish/Summary Garuda_1633099059.docx\">Download</a></p>', '2021-10-01 14:37:54', '2021-10-01 14:37:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orang_tua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `id_user`, `tanggal_lahir`, `jenis_kelamin`, `kota_lahir`, `orang_tua`, `alamat`, `no_hp`, `no_hp_ortu`, `asal_sekolah`, `id_kelas`, `created_at`, `updated_at`) VALUES
(1, 'SISWA 1', 3, '2023-01-29', 'L', 'karawang', 'fulan', 'karawang', '0812', '0812', 'SDN Asal', 1, '2023-01-29 01:28:06', '2023-01-29 01:28:06'),
(2, 'SISWA 2', 4, '2023-01-29', 'L', 'karawang', 'fulan', 'karawang', '0812', '0812', 'SDN Asal', 1, '2023-01-29 01:28:54', '2023-01-29 01:28:54'),
(11, 'SISWA 11', 5, '2023-01-29', 'L', 'karawang', 'fulan', 'karawang', '0812', '0812', 'SMA Asal', 10, '2023-01-29 01:49:44', '2023-01-29 01:49:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(10) UNSIGNED NOT NULL,
  `id_topik` int(10) UNSIGNED NOT NULL,
  `soal_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal_tipe` int(10) UNSIGNED NOT NULL,
  `soal_aktif` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal_kunci` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal_audio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soal_audio_play` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id_soal`, `id_topik`, `soal_detail`, `soal_tipe`, `soal_aktif`, `soal_kunci`, `soal_audio`, `soal_audio_play`, `created_at`, `updated_at`) VALUES
(1, 1, '<p>soal 1</p>', 1, '1', '', NULL, '0', '2023-01-29 01:52:29', '2023-01-29 01:52:29'),
(2, 1, '<p>soal 2</p>', 1, '1', '', NULL, '0', '2023-01-29 01:53:22', '2023-01-29 01:53:22'),
(3, 1, '<p>soal 3</p>', 1, '1', '', NULL, '0', '2023-01-29 01:54:02', '2023-01-29 01:54:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ssc_group`
--

CREATE TABLE `ssc_group` (
  `id_to` int(10) UNSIGNED NOT NULL,
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ssc_group`
--

INSERT INTO `ssc_group` (`id_to`, `id_kelas`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-01-29 01:56:08', '2023-01-29 01:56:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ssc_jawaban`
--

CREATE TABLE `ssc_jawaban` (
  `id_ssc_soal` int(10) UNSIGNED NOT NULL,
  `id_jawaban` int(10) UNSIGNED NOT NULL,
  `ssc_selected` smallint(6) NOT NULL DEFAULT -1,
  `ssc_order` smallint(6) NOT NULL DEFAULT 1,
  `ssc_position` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ssc_jawaban`
--

INSERT INTO `ssc_jawaban` (`id_ssc_soal`, `id_jawaban`, `ssc_selected`, `ssc_order`, `ssc_position`, `updated_at`) VALUES
(1, 10, 1, 3, NULL, '2023-01-29 02:21:23'),
(1, 11, 0, 1, NULL, '2023-01-29 02:21:23'),
(1, 12, 0, 2, NULL, '2023-01-29 02:21:23'),
(2, 1, 0, 3, NULL, '2023-01-29 02:21:32'),
(2, 2, 1, 2, NULL, '2023-01-29 02:21:32'),
(2, 3, 0, 4, NULL, '2023-01-29 02:21:32'),
(2, 4, 0, 1, NULL, '2023-01-29 02:21:32'),
(3, 5, 0, 2, NULL, NULL),
(3, 6, 0, 5, NULL, NULL),
(3, 7, 0, 3, NULL, NULL),
(3, 8, 0, 1, NULL, NULL),
(3, 9, 0, 4, NULL, NULL),
(4, 5, 1, 5, NULL, '2023-01-29 02:21:57'),
(4, 6, 0, 4, NULL, '2023-01-29 02:21:57'),
(4, 7, 0, 2, NULL, '2023-01-29 02:21:57'),
(4, 8, 0, 3, NULL, '2023-01-29 02:21:57'),
(4, 9, 0, 1, NULL, '2023-01-29 02:21:57'),
(5, 1, 0, 1, NULL, '2023-01-29 02:22:03'),
(5, 2, 1, 2, NULL, '2023-01-29 02:22:03'),
(5, 3, 0, 3, NULL, '2023-01-29 02:22:03'),
(5, 4, 0, 4, NULL, '2023-01-29 02:22:03'),
(6, 10, 0, 1, NULL, '2023-01-29 02:22:00'),
(6, 11, 0, 3, NULL, '2023-01-29 02:22:00'),
(6, 12, 1, 2, NULL, '2023-01-29 02:22:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ssc_soal`
--

CREATE TABLE `ssc_soal` (
  `id_ssc_soal` int(10) UNSIGNED NOT NULL,
  `id_ssc_user` int(10) UNSIGNED NOT NULL,
  `id_soal` int(10) UNSIGNED NOT NULL,
  `ssc_jawaban_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssc_nilai` decimal(10,2) DEFAULT NULL,
  `ssc_creation_time` datetime DEFAULT NULL,
  `ssc_display_time` datetime DEFAULT NULL,
  `ssc_change_time` datetime DEFAULT NULL,
  `ssc_reaction_time` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `ssc_order` smallint(6) NOT NULL DEFAULT 1,
  `ssc_num_answers` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `ssc_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssc_audio_play` int(11) NOT NULL DEFAULT 0,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ssc_soal`
--

INSERT INTO `ssc_soal` (`id_ssc_soal`, `id_ssc_user`, `id_soal`, `ssc_jawaban_text`, `ssc_nilai`, `ssc_creation_time`, `ssc_display_time`, `ssc_change_time`, `ssc_reaction_time`, `ssc_order`, `ssc_num_answers`, `ssc_comment`, `ssc_audio_play`, `updated_at`) VALUES
(1, 1, 3, NULL, '0.00', '2023-01-29 09:21:19', '2023-01-29 09:21:19', '2023-01-29 09:21:23', 0, 1, 0, NULL, 0, '2023-01-29 09:21:23'),
(2, 1, 1, NULL, '0.00', '2023-01-29 09:21:19', '2023-01-29 09:21:28', '2023-01-29 09:21:32', 0, 2, 0, NULL, 0, '2023-01-29 09:21:32'),
(3, 1, 2, NULL, '0.00', '2023-01-29 09:21:19', '2023-01-29 09:21:34', NULL, 0, 3, 0, NULL, 0, '2023-01-29 09:21:34'),
(4, 2, 2, NULL, '0.00', '2023-01-29 09:21:54', '2023-01-29 09:21:54', '2023-01-29 09:21:57', 0, 1, 0, NULL, 0, '2023-01-29 09:21:57'),
(5, 2, 1, NULL, '0.00', '2023-01-29 09:21:54', '2023-01-29 09:22:01', '2023-01-29 09:22:03', 0, 2, 0, NULL, 0, '2023-01-29 09:22:03'),
(6, 2, 3, NULL, '1.00', '2023-01-29 09:21:54', '2023-01-29 09:21:58', '2023-01-29 09:22:00', 0, 3, 0, NULL, 0, '2023-01-29 09:22:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ssc_to`
--

CREATE TABLE `ssc_to` (
  `id_to` int(10) UNSIGNED NOT NULL,
  `nama_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_to` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_mulai` datetime DEFAULT NULL,
  `waktu_akhir` datetime DEFAULT NULL,
  `durasi` smallint(10) UNSIGNED NOT NULL DEFAULT 0,
  `ip_range` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '*.*.*.*',
  `hasil_user` tinyint(1) NOT NULL DEFAULT 0,
  `detail_user` tinyint(1) NOT NULL DEFAULT 0,
  `skor_benar` decimal(10,2) DEFAULT 1.00,
  `skor_salah` decimal(10,2) DEFAULT 0.00,
  `skor_tidak_menjawab` decimal(10,2) DEFAULT 0.00,
  `skor_maksimal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `token_to` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ssc_to`
--

INSERT INTO `ssc_to` (`id_to`, `nama_to`, `detail_to`, `waktu_mulai`, `waktu_akhir`, `durasi`, `ip_range`, `hasil_user`, `detail_user`, `skor_benar`, `skor_salah`, `skor_tidak_menjawab`, `skor_maksimal`, `token_to`, `created_at`, `updated_at`) VALUES
(1, 'test ipa kelas 4', 'adaadd', '2023-01-29 09:20:00', '2023-01-29 09:30:00', 2, '*.*.*.*', 0, 0, '1.00', '0.00', '0.00', '3.00', 0, '2023-01-29 01:56:08', '2023-01-29 02:13:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ssc_topik_set`
--

CREATE TABLE `ssc_topik_set` (
  `id_set` int(10) UNSIGNED NOT NULL,
  `id_to` int(10) UNSIGNED NOT NULL,
  `id_topik` int(10) UNSIGNED NOT NULL,
  `tipe` smallint(6) NOT NULL DEFAULT 1,
  `jumlah_soal` smallint(6) NOT NULL DEFAULT 1,
  `jumlah_jawaban` smallint(6) NOT NULL DEFAULT 5,
  `acak_jawaban` int(11) NOT NULL DEFAULT 1,
  `acak_soal` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ssc_topik_set`
--

INSERT INTO `ssc_topik_set` (`id_set`, `id_to`, `id_topik`, `tipe`, `jumlah_soal`, `jumlah_jawaban`, `acak_jawaban`, `acak_soal`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 3, 5, 1, 1, '2023-01-29 02:13:21', '2023-01-29 02:13:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ssc_user`
--

CREATE TABLE `ssc_user` (
  `id_ssc_user` int(10) UNSIGNED NOT NULL,
  `id_siswa` int(10) UNSIGNED NOT NULL,
  `id_to` int(10) UNSIGNED NOT NULL,
  `ssc_status` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `created_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ssc_user`
--

INSERT INTO `ssc_user` (`id_ssc_user`, `id_siswa`, `id_to`, `ssc_status`, `created_time`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2023-01-29 09:21:19', '2023-01-29 02:21:19', '2023-01-29 02:21:19'),
(2, 2, 1, 4, '2023-01-29 09:21:54', '2023-01-29 02:21:54', '2023-01-29 02:22:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `topik`
--

CREATE TABLE `topik` (
  `id_topik` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_aktif` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `topik`
--

INSERT INTO `topik` (`id_topik`, `nama`, `deskripsi`, `is_aktif`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ipa', 'until keels 4', '1', '2023-01-29 01:52:14', '2023-01-29 01:52:14', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('akademik','admin','siswa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `level`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$XIZMIAVd0LxFugLmgXUf2.Vq3xaaXtkevxsYKBgNMLsWfhgBBgjMe', NULL, '2023-01-29 01:02:36', '2023-01-29 01:02:36'),
(3, 'siswa1@gmail.com', 'siswa', 'siswa1@gmail.com', NULL, '$2y$10$y3bUa3rwjQI9/ki6fCPlN.AFtK37oL/iqRNM.mxo.oavwu3q3Gnpi', NULL, '2023-01-29 01:28:06', '2023-01-29 01:28:06'),
(4, 'siswa2@gmail.com', 'siswa', 'siswa2@gmail.com', NULL, '$2y$10$f/.kxW7u8VgHSrI9Yz1oqeICQZfaSL9YxyAMzczJeYsJuZGVpaHky', NULL, '2023-01-29 01:28:54', '2023-01-29 01:28:54'),
(5, 'siswa11@gmail.com', 'siswa', 'siswa11@gmail.com', NULL, '$2y$10$dh6Wf6WUqFB.gsPxdOgziufmQaCiIwM.bGylDhTB9CLhyGCBLqBs6', NULL, '2023-01-29 01:49:44', '2023-01-29 01:49:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `why_us`
--

CREATE TABLE `why_us` (
  `id_whyus` int(10) UNSIGNED NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `why_us`
--

INSERT INTO `why_us` (`id_whyus`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'SSC Menerapkan Metode untuk Mengoptimalkan Kecerdasan Siswa', 'whyus/20211001164731.PNG', '2021-08-13 19:24:28', '2021-10-01 09:47:31'),
(2, 'Harga yang relatif lebih terjangkau dibandingkan dengan Bimbel Nasional lainnya', 'whyus/20211001164937.jpg', '2021-08-13 19:26:20', '2021-10-01 09:49:37'),
(3, 'Layanan SSC Online Service 24 Hour (SOS 24)', 'whyus/20211001165109.png', '2021-08-13 19:26:35', '2021-10-01 09:51:09'),
(4, 'Tryout Setiap Bulan', 'whyus/20211001165344.jpg', '2021-08-13 19:26:46', '2021-10-01 09:53:44'),
(6, 'Layanan Konsultasi Setiap Hari', 'whyus/20211001165433.jpeg', '2021-10-01 09:54:33', '2021-10-01 09:54:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `fk_soal_jawaban` (`id_soal`);

--
-- Indeks untuk tabel `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `map_mapel_to_guru`
--
ALTER TABLE `map_mapel_to_guru`
  ADD PRIMARY KEY (`id_map_mapel_to_guru`),
  ADD KEY `map_mapel_to_guru_id_guru_foreign` (`id_guru`),
  ADD KEY `map_mapel_to_guru_id_map_mapel_to_kelas_foreign` (`id_map_mapel_to_kelas`);

--
-- Indeks untuk tabel `map_mapel_to_kelas`
--
ALTER TABLE `map_mapel_to_kelas`
  ADD PRIMARY KEY (`id_map_mapel_to_kelas`),
  ADD KEY `map_mapel_to_kelas_id_kelas_foreign` (`id_kelas`),
  ADD KEY `map_mapel_to_kelas_id_mapel_foreign` (`id_mapel`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `fk_jenjang_id_jenjang` (`jenjang`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indeks untuk tabel `publish`
--
ALTER TABLE `publish`
  ADD PRIMARY KEY (`id_publish`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `siswa_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `fk_topik_soal` (`id_topik`);

--
-- Indeks untuk tabel `ssc_group`
--
ALTER TABLE `ssc_group`
  ADD PRIMARY KEY (`id_to`,`id_kelas`),
  ADD KEY `fk_id_to` (`id_to`),
  ADD KEY `fk_id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `ssc_jawaban`
--
ALTER TABLE `ssc_jawaban`
  ADD PRIMARY KEY (`id_ssc_soal`,`id_jawaban`),
  ADD KEY `p_jawaban` (`id_jawaban`),
  ADD KEY `p_ssc_soal` (`id_ssc_soal`);

--
-- Indeks untuk tabel `ssc_soal`
--
ALTER TABLE `ssc_soal`
  ADD PRIMARY KEY (`id_ssc_soal`),
  ADD KEY `fk_ssc_soal_soal` (`id_soal`),
  ADD KEY `fk_ssc_user_user` (`id_ssc_user`);

--
-- Indeks untuk tabel `ssc_to`
--
ALTER TABLE `ssc_to`
  ADD PRIMARY KEY (`id_to`),
  ADD UNIQUE KEY `ak_to_name` (`nama_to`);

--
-- Indeks untuk tabel `ssc_topik_set`
--
ALTER TABLE `ssc_topik_set`
  ADD PRIMARY KEY (`id_set`),
  ADD KEY `fk_set_topik_to` (`id_to`),
  ADD KEY `fk_set_topik_topik` (`id_topik`);

--
-- Indeks untuk tabel `ssc_user`
--
ALTER TABLE `ssc_user`
  ADD PRIMARY KEY (`id_ssc_user`),
  ADD UNIQUE KEY `ak_to_user` (`id_to`,`id_siswa`,`ssc_status`);

--
-- Indeks untuk tabel `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`id_topik`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `why_us`
--
ALTER TABLE `why_us`
  ADD PRIMARY KEY (`id_whyus`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `id_jenjang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `map_mapel_to_guru`
--
ALTER TABLE `map_mapel_to_guru`
  MODIFY `id_map_mapel_to_guru` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `map_mapel_to_kelas`
--
ALTER TABLE `map_mapel_to_kelas`
  MODIFY `id_map_mapel_to_kelas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_daftar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `publish`
--
ALTER TABLE `publish`
  MODIFY `id_publish` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ssc_soal`
--
ALTER TABLE `ssc_soal`
  MODIFY `id_ssc_soal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ssc_to`
--
ALTER TABLE `ssc_to`
  MODIFY `id_to` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ssc_topik_set`
--
ALTER TABLE `ssc_topik_set`
  MODIFY `id_set` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ssc_user`
--
ALTER TABLE `ssc_user`
  MODIFY `id_ssc_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `topik`
--
ALTER TABLE `topik`
  MODIFY `id_topik` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `why_us`
--
ALTER TABLE `why_us`
  MODIFY `id_whyus` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `map_mapel_to_guru`
--
ALTER TABLE `map_mapel_to_guru`
  ADD CONSTRAINT `map_mapel_to_guru_id_guru_foreign` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `map_mapel_to_guru_id_map_mapel_to_kelas_foreign` FOREIGN KEY (`id_map_mapel_to_kelas`) REFERENCES `map_mapel_to_kelas` (`id_map_mapel_to_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
