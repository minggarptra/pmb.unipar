-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Apr 2023 pada 05.04
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rauminid_pmb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `cookie` varchar(100) NOT NULL,
  `level` varchar(40) DEFAULT NULL,
  `photo_profile` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `cookie`, `level`, `photo_profile`, `email`, `nama`) VALUES
(1, 'admin', '$2y$10$mHlZ9AFZ/iacrdP3eTzh/ussYDNARlOk13sg3JpLT3a3Ob.p2RKWu', 'jVVei3128F6bfusLMDAJrdm2gHFoNlkOP4Mr5OvYWsmBjq6Wh8tGcQyaZSUpEBQT', 'admin', '1676359586487.png', NULL, 'Zhafran'),
(6, 'rektorkita', '$2y$10$uszQoxEaSMUJUsk1.cnk3OTDmqu2GF88doh9vP3TMQ/Ep3NVon2.G', '', 'pimpinan', 'default.png', NULL, 'rektor'),
(7, 'yanisa', '$2y$10$QLVZgR3QQrhoQDE8.xKTbe0ssWYh/cuLUxW2qg9ycYKIB/Do39VZO', '', 'keuangan', '1676432698847.png', NULL, 'yanisa'),
(8, 'minggarptra', '$2y$10$lvsuruGDiE5nU7p606ZpEuQ7DVbk6AeL6rM3VGY6j31fHHO2ibi92', '', 'pimpinan', 'default.png', NULL, 'Minggar Putra Dhea Ramadhan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akte_kelahiran`
--

CREATE TABLE `akte_kelahiran` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `akte_kelahiran` varchar(200) DEFAULT NULL,
  `token` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akte_kelahiran`
--

INSERT INTO `akte_kelahiran` (`id`, `user`, `akte_kelahiran`, `token`) VALUES
(5, 171, '7e89ece381ff484d6b620fe2ca55c0a71.pdf', '0.12901240');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `user`, `judul`, `slug`, `isi`, `waktu`, `foto`) VALUES
(26, 1, 'Fomulir Pendaftaran Universitas PGRI Argopuro Jember', 'fomulir-pendaftaran-universitas-pgri-argopuro-2', '<p>Download Formulir Pendaftaran Unipar Jember dibawah ini :</p><p><a href=\"https://drive.google.com/file/d/1zJXq-MBbR6xtOIpsDfLI8T0c0WBoyCZG/view?usp=share_link\" target=\"_blank\">DOWNLOAD</a></p>', '2023-03-20 10:00:09', '9f18ec93872903c8b13a764815f4e51d.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_pendaftaran`
--

CREATE TABLE `berkas_pendaftaran` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `ktp` varchar(100) DEFAULT NULL,
  `token_ktp` varchar(10) DEFAULT NULL,
  `kk` varchar(100) DEFAULT NULL,
  `token_kk` varchar(10) DEFAULT NULL,
  `akte_kelahiran` varchar(100) DEFAULT NULL,
  `token_akte_kelahiran` varchar(10) DEFAULT NULL,
  `ijazah_sma_smk` varchar(100) DEFAULT NULL,
  `token_ijazah_sma_smk` varchar(10) NOT NULL,
  `nilai_un` varchar(100) DEFAULT NULL,
  `token_nilai_un` varchar(10) DEFAULT NULL,
  `transkrip_nilai` varchar(100) DEFAULT NULL,
  `token_transkirp_nilai` varchar(10) DEFAULT NULL,
  `ijazah_d1_d2_d3_s1` varchar(100) DEFAULT NULL,
  `token_ijazah_d1_d2_d3_s1` varchar(10) DEFAULT NULL,
  `sk_pindah` varchar(100) DEFAULT NULL,
  `token_sk_pindah` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berkas_pendaftaran`
--

INSERT INTO `berkas_pendaftaran` (`id`, `user`, `ktp`, `token_ktp`, `kk`, `token_kk`, `akte_kelahiran`, `token_akte_kelahiran`, `ijazah_sma_smk`, `token_ijazah_sma_smk`, `nilai_un`, `token_nilai_un`, `transkrip_nilai`, `token_transkirp_nilai`, `ijazah_d1_d2_d3_s1`, `token_ijazah_d1_d2_d3_s1`, `sk_pindah`, `token_sk_pindah`) VALUES
(1, 171, 'tes1', 'ads', 'ads', 'asd', 'asd', 'sda', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'ads', 'asd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `camaba`
--

CREATE TABLE `camaba` (
  `id` int(11) NOT NULL,
  `no_pendaftaran` varchar(50) DEFAULT NULL,
  `jurusan` varchar(10) DEFAULT NULL,
  `name` varchar(40) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date_register` datetime NOT NULL,
  `is_activate` int(1) NOT NULL,
  `token` varchar(100) NOT NULL,
  `token_reset` varchar(100) NOT NULL,
  `cookie` varchar(100) NOT NULL,
  `photo_profile` varchar(30) NOT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `tokenwa` varchar(20) DEFAULT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `bulan` varchar(20) DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `tahun` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `camaba`
--

INSERT INTO `camaba` (`id`, `no_pendaftaran`, `jurusan`, `name`, `username`, `email`, `password`, `date_register`, `is_activate`, `token`, `token_reset`, `cookie`, `photo_profile`, `nohp`, `tokenwa`, `tanggal_daftar`, `bulan`, `hari`, `tahun`) VALUES
(166, '2023040001', '04', 'Fauzi', 'fauzi', 'usmansangtaaruf@gmail.com', '$2y$10$j2AIrxhfpizFTNXzmCeD5u9sJkntZfSnQ2lKAue2Nk8xxkkI.6MwO', '2023-03-15 23:50:13', 1, 'ad0112980e47d6e55cc889e92ac057603cf48052', '', '', 'default.png', '628836362220', '853676', '2023-03-15', 'March', '15', '2023'),
(167, '2023040002', '04', 'Dimas', 'dimas', 'cahyodimas10@gmail.com', '$2y$10$S0BTxDARAlVlS7LvxUlsWeww9poc3ZU3bc82tMn22xfeRq4UR7.16', '2023-03-16 08:58:30', 1, '3b4f89c1a9787b6e70723b166eafe407cf9e2fd0', '', '', 'default.png', '6285258850610', '652337', '2023-03-16', 'March', '16', '2023'),
(168, '2023030001', '03', 'hendi', 'hendi', 'qayun1990@gmail.com', '$2y$10$FGxGIsEtBRNpoOB.FsYrS.SDksY0MII3pbzwCaTiOUAg9Lt5jYtk6', '2023-03-20 09:38:39', 1, '4d0f915db4da44e9c340945508341f02be1bb799', '', '', 'default.png', '6285234567890', '412588', '2023-03-20', 'March', '20', '2023'),
(169, '2023080001', '08', 'sekarep', 'sekarep', 'admin@mail.unipar.ac.id', '$2y$10$8T1cfrZaSwf9z05Idj4wcu1XnaaV.EjgLYlsX9Wp7EijHEpzQlSiO', '2023-03-20 10:26:54', 1, 'fe29b904c915fcd3746427f2007a3e1c52f4d2a8', '', '', 'default.png', '6281249218114', '967544', '2023-03-20', 'March', '20', '2023'),
(170, '2023040003', '04', 'BAAK', 'baak', 'biro1unipar@gmail.com', '$2y$10$suGdjfIU6vqlyUcZow0f.OEU3KRDevpQoDUm5S6to7BnXtP/xMT1.', '2023-03-20 11:28:06', 1, '985ece45fbc120bfe35fd589fdc53fc2c8014bf7', '', '', 'default.png', '6281334727853', '229873', '2023-03-20', 'March', '20', '2023'),
(171, '2023090001', '09', 'Minggar Putra Dhea Ramadhan', 'minggar-putra-dhea-ramadhan', 'claraqwerty321@gmail.com', '$2y$10$ZYrJZV2T7TdRomKO8KeuMuZAu1T85oxX6W1r5VsBG2P5.8MfaQ3C2', '2023-04-10 14:46:09', 1, 'ed0549367aad7a2305750bedd036aff2d432b1dc', '', '', 'default.png', '6285321102010', '647333', '2023-04-10', 'April', '10', '2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `device`
--

CREATE TABLE `device` (
  `id` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `multidevice` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `device`
--

INSERT INTO `device` (`id`, `id_users`, `number`, `name`, `description`, `multidevice`, `created_at`, `updated_at`, `status`) VALUES
(3, 1, '6281271107304', 'garangan', 'pertama', 'YES', '2022-11-05 20:28:53', '2022-11-05 20:28:53', 'authenticated');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `nama`, `foto`) VALUES
(3, 'Lab Komputer', NULL),
(4, 'Lapangan Olah Raga', NULL),
(5, 'Gedung Serbaguna', NULL),
(6, 'Lab Kewirausahaan', NULL),
(7, 'Lab Manajemen Ritel', NULL),
(9, 'Taman bermain anak', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `token` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id`, `user`, `foto`, `token`) VALUES
(54, 168, 'UNIPAR_2022-02.png', '0.16646353178636097'),
(63, 171, '42bf05afe17ff26c6aad559529c67a0e.jpg', '0.11691163338174593');

-- --------------------------------------------------------

--
-- Struktur dari tabel `general`
--

CREATE TABLE `general` (
  `id` int(11) NOT NULL,
  `app_name` varchar(150) NOT NULL,
  `slogan` varchar(150) NOT NULL,
  `host_mail` varchar(50) NOT NULL,
  `port_mail` varchar(10) NOT NULL,
  `crypto_smtp` varchar(20) NOT NULL,
  `account_gmail` varchar(50) NOT NULL,
  `pass_gmail` varchar(50) NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `server_api_midtrans` varchar(150) NOT NULL,
  `client_api_midtrans` varchar(150) NOT NULL,
  `waapi` varchar(100) DEFAULT NULL,
  `xenditkey` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `general`
--

INSERT INTO `general` (`id`, `app_name`, `slogan`, `host_mail`, `port_mail`, `crypto_smtp`, `account_gmail`, `pass_gmail`, `whatsapp`, `server_api_midtrans`, `client_api_midtrans`, `waapi`, `xenditkey`) VALUES
(1, 'Sistem Penerimaan Mahasiswa Baru', 'Universitas PGRI Argopuro Jember', 'smtp.googlemail.com', '465', 'ssl', 'gelangbrowser@gmail.com', 'ytqglckpjvlvgdzn', '6281331703090', '', '', 'http://localhost:8000', 'xnd_development_JJPtiUxu210zRGKgRIIBsnacux4hZg9T37bOkiPhX8J9wTXYyN7KAgt5pyAkccL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ijazah`
--

CREATE TABLE `ijazah` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `ijazah` varchar(200) DEFAULT NULL,
  `token` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ijazah`
--

INSERT INTO `ijazah` (`id`, `user`, `ijazah`, `token`) VALUES
(116, 168, '932139216_bab2.pdf', '0.36126204640580695');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ijazah_d1_d2_d3`
--

CREATE TABLE `ijazah_d1_d2_d3` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `ijazah_d1_d2_d3` varchar(100) DEFAULT NULL,
  `token` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ijazah_d1_d2_d3`
--

INSERT INTO `ijazah_d1_d2_d3` (`id`, `user`, `ijazah_d1_d2_d3`, `token`) VALUES
(3, 171, '7e89ece381ff484d6b620fe2ca55c0a73.pdf', '0.61420114');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ijazah_s1`
--

CREATE TABLE `ijazah_s1` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `ijazah_s1` varchar(100) DEFAULT NULL,
  `token` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ijazah_s1`
--

INSERT INTO `ijazah_s1` (`id`, `user`, `ijazah_s1`, `token`) VALUES
(13, 205, '1e1180bb60a9c76b3421f2370bc2b9a9.pdf', '0.92366178'),
(14, 207, '5892c85f6b2c89536a00b914e285a953.pdf', '0.68286152');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inbox`
--

CREATE TABLE `inbox` (
  `penerima` varchar(10) DEFAULT NULL,
  `pengirim` varchar(10) DEFAULT NULL,
  `waktu` varchar(50) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  `terkirim` varchar(10) DEFAULT NULL,
  `realtime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `inbox`
--

INSERT INTO `inbox` (`penerima`, `pengirim`, `waktu`, `isi`, `status`, `terkirim`, `realtime`) VALUES
(NULL, 'admin', '20 Jan 2023, 14:03:17', 'asdf', '0', 'terkirim', '2023-01-20 14:03:17'),
(NULL, 'admin', '20 Jan 2023, 14:03:59', 'ya gmna mas', '0', 'terkirim', '2023-01-20 14:03:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `camaba` varchar(20) NOT NULL,
  `invoice_code` varchar(100) NOT NULL,
  `jurusan` varchar(10) DEFAULT NULL,
  `total_all` int(11) NOT NULL,
  `date_input` datetime NOT NULL DEFAULT current_timestamp(),
  `xendit_id` varchar(100) DEFAULT NULL,
  `pay_status` varchar(30) NOT NULL,
  `link_pay` varchar(150) NOT NULL,
  `bulan` varchar(30) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `bukti` varchar(100) DEFAULT NULL,
  `tanggal_konfirmasi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`id`, `camaba`, `invoice_code`, `jurusan`, `total_all`, `date_input`, `xendit_id`, `pay_status`, `link_pay`, `bulan`, `tahun`, `bukti`, `tanggal_konfirmasi`) VALUES
(89, '2023040001', '2023040001', '04', 250000, '2023-03-15 23:50:17', NULL, '', '', NULL, NULL, NULL, NULL),
(90, '2023040002', '2023040002', '04', 250000, '2023-03-16 08:58:34', NULL, '', '', NULL, NULL, NULL, NULL),
(91, '2023030001', '2023030001', '03', 250000, '2023-03-20 09:38:43', NULL, 'SETTLED', '', 'March', 2023, 'c25df73808255a97502b040674f84313.jpg', '2023-03-20 09:46:27'),
(92, '2023080001', '2023080001', '08', 250000, '2023-03-20 10:26:58', NULL, '', '', NULL, NULL, NULL, NULL),
(93, '2023040003', '2023040003', '04', 250000, '2023-03-20 11:28:10', NULL, '', '', NULL, NULL, NULL, NULL),
(130, '2023090001', '2023090001', '09', 750000, '2023-04-10 14:39:16', NULL, '', '', NULL, NULL, NULL, NULL),
(131, '2023090002', '2023090002', '09', 750000, '2023-04-10 14:41:19', NULL, '', '', NULL, NULL, NULL, NULL),
(132, '2023090001', '2023090001', '09', 750000, '2023-04-10 14:43:56', NULL, '', '', NULL, NULL, NULL, NULL),
(133, '2023090001', '2023090001', '09', 750000, '2023-04-10 14:46:14', NULL, '', '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `kode` varchar(4) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `biaya` varchar(20) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `kode`, `jurusan`, `foto`, `biaya`, `deskripsi`, `slug`, `instagram`) VALUES
(18, '04', 'Bimbingan Dan Konseling', 'c7189da9b15a68313c9cf960e6d69634.jpg', '250000', '                            ', 'bimbingan-dan-konseling', 'https://www.instagram.com/unipar_jember/'),
(19, '05', 'Pendidikan Pancasila dan Kewarga Negaraan', '38394482d995b34a949a968fd0940a8e.png', '250000', '', 'pendidikan-pancasila-dan-kewarga-negaraan', ''),
(20, '01', 'Pendidikan Biologi', '8745890d87847ff343fc8ee5b485f2b0.jpg', '250000', '                            ', 'pendidikan-biologi', 'https://www.instagram.com/unipar_jember/'),
(21, '02', 'Pendidikan Ekonomi', 'c03e10158ef863d877b085a469e64137.jpg', '250000', '', 'pendidikan-ekonomi', 'https://www.instagram.com/unipar_jember/'),
(22, '03', 'Pendidikan Anak Usia Dini', '23bf583b41fb1034bc341fce6505eaf6.jpg', '250000', '', 'pendidikan-anak-usia-dini', 'https://www.instagram.com/unipar_jember/'),
(23, '06', 'Pendidikan Luar Biasa', 'edf491e9e497365271e44fbe91ee15ab.jpg', '250000', '', 'pendidikan-luar-biasa', 'https://www.instagram.com/unipar_jember/'),
(24, '07', 'Pendidikan Matematika', '5a7b227c7b7ba7c606c039ed18016e59.jpg', '250000', '', 'pendidikan-matematika', 'https://www.instagram.com/unipar_jember/'),
(25, '08', 'Pendidikan Sejarah', 'f4b63f5288e2439e01dd46cd6155993f.jpg', '250000', '', 'pendidikan-sejarah', 'https://www.instagram.com/unipar_jember/'),
(26, '09', 'S2 - Teknologi Pembelajaran', '743a1b51a155a18bd9fdf0f96ff21d50.jpg', '750000', '', 's2-teknologi-pembelajaran', 'https://www.instagram.com/unipar_jember/'),
(27, '10', 'Statistik', '10a7eb86e88ef23b4ba165c1fd4a8741.jpg', '250000', '', 'statistik', 'https://www.instagram.com/unipar_jember/'),
(28, '11', 'Biologi', '7518c2ecef3e994cd6bc6a8240a6b7a3.jpg', '250000', '                            ', 'biologi', 'https://www.instagram.com/unipar_jember/'),
(29, '12', 'Teknik Lingkungan', '367f2028c9c1da560c00bd3bee32af1d.jpg', '250000', '                            ', 'teknik-lingkungan', 'https://www.instagram.com/unipar_jember/'),
(30, '13', 'Menejemen', 'ca535d0426f97066638cf1243da5fcd2.jpg', '250000', '                            ', 'menejemen', 'https://www.instagram.com/unipar_jember/');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kk`
--

CREATE TABLE `kk` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `kk` varchar(200) DEFAULT NULL,
  `token` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kk`
--

INSERT INTO `kk` (`id`, `user`, `kk`, `token`) VALUES
(44, 168, 'BAB_II.pdf', '0.44778189'),
(53, 171, '7e89ece381ff484d6b620fe2ca55c0a71.pdf', '0.82446077');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ktp`
--

CREATE TABLE `ktp` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `ktp` varchar(200) DEFAULT NULL,
  `token` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `norek`
--

CREATE TABLE `norek` (
  `id` int(11) NOT NULL,
  `norek` varchar(100) DEFAULT NULL,
  `bank` varchar(100) DEFAULT NULL,
  `atasnama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `norek`
--

INSERT INTO `norek` (`id`, `norek`, `bank`, `atasnama`) VALUES
(1, '6131 01 1171', 'Bank Jatim Syariah', 'Universitas PGRI Argopuro Jember');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifadmin`
--

CREATE TABLE `notifadmin` (
  `id` int(11) NOT NULL,
  `notifikasi` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `is_read` int(11) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notifadmin`
--

INSERT INTO `notifadmin` (`id`, `notifikasi`, `date`, `is_read`, `type`) VALUES
(24, 'Ada Pesan Masuk Baru', '2023-01-23 16:38:43', 1, 'chat'),
(25, 'Ada Pesan Masuk Baru', '2023-01-23 17:38:02', 1, 'chat'),
(26, 'Ada Pesan Masuk Baru', '2023-01-23 17:41:10', 1, 'chat'),
(27, 'Ada Pesan Masuk Baru', '2023-01-23 17:41:44', 1, 'chat'),
(28, 'Ada Pesan Masuk Baru', '2023-01-23 17:42:06', 1, 'chat'),
(29, 'Ada Pesan Masuk Baru', '2023-01-23 17:42:53', 1, 'chat'),
(30, 'Ada Pesan Masuk Baru', '2023-01-23 17:48:30', 1, 'chat'),
(31, 'Ada Pesan Masuk Baru', '2023-01-23 18:01:34', 1, 'chat'),
(32, 'Ada Pesan Masuk Baru', '2023-01-23 19:59:01', 1, 'chat'),
(33, 'Ada pembayaran baru', '2023-01-23 20:13:56', 1, 'notif'),
(34, 'Ada Pesan Masuk Baru', '2023-01-23 21:00:14', 1, 'chat'),
(35, 'Ada Pesan Masuk Baru', '2023-01-23 21:00:49', 1, 'chat'),
(36, 'Ada Pesan Masuk Baru', '2023-01-23 21:01:05', 1, 'chat'),
(37, 'Ada Pesan Masuk Baru', '2023-01-23 21:03:20', 1, 'chat'),
(38, 'Ada Pesan Masuk Baru', '2023-01-24 14:43:01', 1, 'chat'),
(39, 'Ada Pesan Masuk Baru', '2023-01-24 14:49:57', 1, 'chat'),
(40, 'Ada Pesan Masuk Baru', '2023-01-24 14:50:17', 1, 'chat'),
(41, 'Ada Pesan Masuk Baru', '2023-01-24 14:50:34', 1, 'chat'),
(42, 'Ada Pesan Masuk Baru', '2023-01-24 14:50:42', 1, 'chat'),
(43, 'Ada Pesan Masuk Baru', '2023-01-24 14:51:25', 1, 'chat'),
(44, 'Ada Pesan Masuk Baru', '2023-01-24 14:51:41', 1, 'chat'),
(45, 'Ada Pesan Masuk Baru', '2023-01-24 14:51:54', 1, 'chat'),
(46, 'Ada Pesan Masuk Baru', '2023-01-24 15:19:19', 1, 'chat'),
(47, 'Ada Pesan Masuk Baru', '2023-01-24 15:19:33', 1, 'chat'),
(48, 'Pembayaran baru selesai', '2023-02-08 13:06:13', 1, 'notif'),
(49, 'Pembayaran baru selesai', '2023-02-15 04:25:55', 1, 'notif'),
(50, 'Ada Pesan Masuk Baru', '2023-02-15 04:42:24', 1, 'chat'),
(51, 'Pembayaran baru selesai', '2023-02-16 08:37:48', 1, 'notif'),
(52, 'Ada Pesan Masuk Baru', '2023-02-16 08:42:43', 1, 'chat'),
(53, 'Ada Pesan Masuk Baru', '2023-02-16 08:46:38', 1, 'chat'),
(54, 'Ada Pesan Masuk Baru', '2023-02-16 08:46:56', 1, 'chat'),
(55, 'Ada Pesan Masuk Baru', '2023-02-16 08:47:29', 1, 'chat'),
(56, 'Ada Pesan Masuk Baru', '2023-02-16 08:48:07', 1, 'chat'),
(57, 'Ada Pesan Masuk Baru', '2023-02-16 08:48:38', 1, 'chat'),
(58, 'Ada Pesan Masuk Baru', '2023-02-16 08:48:56', 1, 'chat'),
(59, 'Ada Pesan Masuk Baru', '2023-02-16 08:49:48', 1, 'chat'),
(60, 'Ada Pesan Masuk Baru', '2023-02-16 08:50:43', 1, 'chat'),
(61, 'Ada Pesan Masuk Baru', '2023-02-16 11:36:21', 1, 'chat'),
(62, 'Pembayaran baru selesai', '2023-02-16 11:46:02', 1, 'notif'),
(63, 'Pembayaran baru selesai', '2023-02-16 15:05:16', 1, 'notif'),
(64, 'Pembayaran baru selesai', '2023-02-16 15:05:37', 1, 'notif'),
(65, 'Pembayaran baru selesai', '2023-02-19 12:50:23', 1, 'notif'),
(66, 'Ada Pesan Masuk Baru', '2023-02-19 12:55:42', 1, 'chat'),
(67, 'Ada Konfirmasi Pembayaran Baru', '2023-02-28 21:21:15', 1, 'notif'),
(68, 'Ada Konfirmasi Pembayaran Baru', '2023-02-28 22:17:19', 1, 'notif'),
(69, 'Ada Pesan Masuk Baru', '2023-02-28 22:19:18', 1, 'chat'),
(70, 'Ada Konfirmasi Pembayaran Baru', '2023-02-28 22:57:46', 1, 'notif'),
(71, 'Ada Pesan Masuk Baru', '2023-03-15 18:36:45', 1, 'chat'),
(72, 'Ada Konfirmasi Pembayaran Baru', '2023-03-20 09:41:00', 1, 'notif'),
(73, 'Ada Konfirmasi Pembayaran Baru', '2023-03-20 09:41:12', 1, 'notif'),
(74, 'Ada Konfirmasi Pembayaran Baru', '2023-03-20 09:41:30', 1, 'notif'),
(75, 'Ada Konfirmasi Pembayaran Baru', '2023-03-20 09:42:31', 1, 'notif'),
(76, 'Ada Konfirmasi Pembayaran Baru', '2023-03-20 09:42:32', 1, 'notif'),
(77, 'Ada Konfirmasi Pembayaran Baru', '2023-03-20 09:42:51', 1, 'notif'),
(78, 'Ada Konfirmasi Pembayaran Baru', '2023-03-20 09:43:43', 1, 'notif'),
(79, 'Ada Konfirmasi Pembayaran Baru', '2023-03-20 09:44:39', 1, 'notif'),
(80, 'Ada Konfirmasi Pembayaran Baru', '2023-03-20 09:44:57', 1, 'notif'),
(81, 'Ada Konfirmasi Pembayaran Baru', '2023-03-20 09:46:23', 1, 'notif'),
(82, 'Ada Konfirmasi Pembayaran Baru', '2023-03-27 23:43:57', 1, 'notif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `notifikasi` varchar(50) DEFAULT NULL,
  `is_read` varchar(1) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `desktopnotif` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `user`, `notifikasi`, `is_read`, `date`, `desktopnotif`) VALUES
(421, 109, 'Edit form pendaftaran berhasil', '1', '2022-12-20 12:45:45', NULL),
(422, 109, 'Hapus Foto berhasil', '1', '2022-12-20 12:48:31', NULL),
(423, 109, 'Input Foto berhasil', '1', '2022-12-20 12:48:43', NULL),
(424, 109, 'Hapus Kartu Keluarga berhasil', '1', '2022-12-20 12:51:55', NULL),
(426, 109, 'Input Kartu Keluarga berhasil', '1', '2022-12-20 13:06:33', NULL),
(427, 109, 'Edit form pendaftaran berhasil', '1', '2022-12-20 13:13:07', NULL),
(428, 109, 'Hapus Foto berhasil', '1', '2022-12-20 13:13:51', NULL),
(429, 109, 'Input Foto berhasil', '1', '2022-12-20 13:14:13', NULL),
(430, 109, 'Password berhasil di ubah', '1', '2022-12-20 13:56:51', NULL),
(431, 109, 'Edit form pendaftaran berhasil', '1', '2022-12-20 14:14:07', NULL),
(433, 109, 'Hapus Foto berhasil', '0', '2022-12-24 14:48:56', NULL),
(434, 109, 'Input Foto berhasil', '0', '2022-12-24 21:00:03', NULL),
(461, NULL, 'Admin Mengirim anda pesan', '0', '2023-01-20 14:03:17', NULL),
(462, NULL, 'Admin Mengirim anda pesan', '0', '2023-01-20 14:03:59', NULL),
(522, 168, 'Input form pendaftaran berhasil', '0', '2023-03-20 09:49:03', NULL),
(523, 168, 'Input Kartu Keluarga berhasil', '0', '2023-03-20 10:44:18', NULL),
(524, 168, 'Input Ijazah berhasil', '0', '2023-03-20 10:44:23', NULL),
(525, 168, 'Input Foto berhasil', '0', '2023-03-20 10:44:31', NULL),
(526, 171, 'Input form pendaftaran berhasil', '0', '2023-03-28 08:56:22', NULL),
(527, 171, 'Input form pendaftaran berhasil', '0', '2023-03-28 09:06:02', NULL),
(528, 171, 'Input form pendaftaran berhasil', '0', '2023-03-28 09:12:35', NULL),
(529, 171, 'Input form pendaftaran berhasil', '0', '2023-03-28 09:12:36', NULL),
(530, 171, 'Input form pendaftaran berhasil', '0', '2023-03-28 09:12:38', NULL),
(531, 171, 'Input form pendaftaran berhasil', '0', '2023-03-28 09:12:44', NULL),
(532, 171, 'Input form pendaftaran berhasil', '0', '2023-03-28 09:12:45', NULL),
(533, 171, 'Input form pendaftaran berhasil', '0', '2023-03-28 09:12:45', NULL),
(534, 171, 'Input form pendaftaran berhasil', '0', '2023-03-28 09:12:45', NULL),
(535, 171, 'Input form pendaftaran berhasil', '0', '2023-03-28 09:12:45', NULL),
(536, 171, 'Input form pendaftaran berhasil', '0', '2023-03-28 09:12:45', NULL),
(537, 171, 'Input form pendaftaran berhasil', '0', '2023-03-28 09:12:46', NULL),
(538, 171, 'Input form pendaftaran berhasil', '0', '2023-03-28 09:15:43', NULL),
(539, 171, 'Input form pendaftaran berhasil', '0', '2023-03-28 09:15:44', NULL),
(540, 171, 'Input form pendaftaran berhasil', '0', '2023-03-28 09:15:44', NULL),
(541, 171, 'Input form pendaftaran berhasil', '0', '2023-03-28 09:15:45', NULL),
(542, 171, 'Input form pendaftaran berhasil', '0', '2023-03-28 09:15:45', NULL),
(543, 171, 'Input form pendaftaran berhasil', '0', '2023-03-28 09:15:45', NULL),
(544, 171, 'Input form pendaftaran berhasil', '0', '2023-03-28 09:15:45', NULL),
(545, 171, 'Input form pendaftaran berhasil', '0', '2023-03-28 09:16:40', NULL),
(546, 171, 'Input form pendaftaran berhasil', '0', '2023-03-28 09:31:00', NULL),
(547, 171, 'Input Kartu Keluarga berhasil', '0', '2023-03-28 09:35:36', NULL),
(548, 171, 'Input Ijazah berhasil', '0', '2023-03-28 09:35:48', NULL),
(549, 171, 'Input Foto berhasil', '0', '2023-03-28 09:36:01', NULL),
(550, 171, 'Hapus Ijazah  berhasil', '0', '2023-03-28 10:19:30', NULL),
(551, 171, 'Hapus Kartu Keluarga berhasil', '0', '2023-03-28 10:19:36', NULL),
(552, 171, 'Hapus Foto berhasil', '0', '2023-03-28 10:19:40', NULL),
(553, 171, 'Input form pendaftaran berhasil', '0', '2023-03-28 11:01:19', NULL),
(554, 171, 'Input Kartu Keluarga berhasil', '0', '2023-03-28 11:02:07', NULL),
(555, 171, 'Input Ijazah berhasil', '0', '2023-03-28 11:02:11', NULL),
(556, 171, 'Input Foto berhasil', '0', '2023-03-28 11:02:19', NULL),
(557, 171, 'Hapus Foto berhasil', '0', '2023-03-28 12:12:42', NULL),
(558, 171, 'Input Foto berhasil', '0', '2023-03-28 12:34:40', NULL),
(559, 171, 'Input Foto berhasil', '0', '2023-03-28 12:49:38', NULL),
(560, 171, 'Input form pendaftaran berhasil', '0', '2023-03-28 21:24:00', NULL),
(561, 171, 'Input form pendaftaran berhasil', '0', '2023-03-28 21:58:43', NULL),
(562, 171, 'Input Foto berhasil', '0', '2023-03-29 11:26:57', NULL),
(563, 171, 'Hapus Foto berhasil', '0', '2023-03-29 11:51:39', NULL),
(564, 171, 'Input form pendaftaran berhasil', '0', '2023-03-29 13:36:38', NULL),
(565, 171, 'Input Kartu Keluarga berhasil', '0', '2023-03-29 13:37:37', NULL),
(566, 171, 'Input Ijazah berhasil', '0', '2023-03-29 13:37:42', NULL),
(567, 171, 'Input Foto berhasil', '0', '2023-03-29 13:38:15', NULL),
(568, 171, 'Hapus Kartu Tanda Penduduk berhasil', '0', '2023-03-29 14:20:31', NULL),
(569, 171, 'Hapus Foto berhasil', '0', '2023-03-30 14:23:31', NULL),
(570, 171, 'Input Foto berhasil', '0', '2023-03-30 14:23:45', NULL),
(571, 171, 'Hapus Foto berhasil', '0', '2023-03-30 14:23:50', NULL),
(572, 171, 'Input Foto berhasil', '0', '2023-03-30 14:26:09', NULL),
(573, 171, 'Hapus Kartu Tanda Penduduk berhasil', '0', '2023-03-30 14:26:16', NULL),
(574, 171, 'Hapus Foto berhasil', '0', '2023-03-31 09:43:55', NULL),
(575, 171, 'Hapus Kartu Keluarga berhasil', '0', '2023-03-31 09:49:43', NULL),
(576, 171, 'Hapus Ijazah  berhasil', '0', '2023-03-31 09:49:51', NULL),
(577, 171, 'Hapus Akte Kelahiran berhasil', '0', '2023-03-31 10:00:29', NULL),
(578, 171, 'Input Kartu Keluarga berhasil', '0', '2023-03-31 10:01:05', NULL),
(579, 171, 'Input Ijazah berhasil', '0', '2023-03-31 10:01:11', NULL),
(580, 171, 'Input Foto berhasil', '0', '2023-03-31 10:01:26', NULL),
(581, 171, 'Input Kartu Tanda Penduduk berhasil', '0', '2023-03-31 10:02:07', NULL),
(582, 171, 'Input Kartu Keluarga berhasil', '0', '2023-03-31 10:06:56', NULL),
(583, 171, 'Hapus Kartu Keluarga berhasil', '0', '2023-04-03 09:21:44', NULL),
(584, 171, 'Hapus Ijazah SMA/SMK/Sederajat  berhasil', '0', '2023-04-03 09:21:49', NULL),
(585, 171, 'Hapus Kartu Tanda Penduduk berhasil', '0', '2023-04-03 09:21:55', NULL),
(586, 171, 'Hapus Akte Kelahiran berhasil', '0', '2023-04-03 09:21:58', NULL),
(587, 171, 'Input Kartu Tanda Penduduk berhasil', '0', '2023-04-03 09:22:49', NULL),
(588, 171, 'Input Kartu Keluarga berhasil', '0', '2023-04-03 09:22:54', NULL),
(589, 171, 'Input Kartu Keluarga berhasil', '0', '2023-04-03 09:22:58', NULL),
(590, 171, 'Input Ijazah berhasil', '0', '2023-04-03 09:32:20', NULL),
(591, 171, 'Input Nilai Ujian Nasional berhasil', '0', '2023-04-03 09:32:25', NULL),
(592, 171, 'Input Ijazah S1 berhasil', '0', '2023-04-03 09:34:42', NULL),
(593, 171, 'Input Transkrip Nilai S1 berhasil', '0', '2023-04-03 09:34:48', NULL),
(594, 171, 'Hapus Transkrip Nilai S1 berhasil', '0', '2023-04-03 09:39:33', NULL),
(595, 171, 'Hapus Ijazah S1 berhasil', '0', '2023-04-03 09:39:41', NULL),
(596, 171, 'Input Ijazah D1/D2/D3 berhasil', '0', '2023-04-03 09:41:30', NULL),
(597, 171, 'Input Transkrip Nilai D1/D2/D3 berhasil', '0', '2023-04-03 09:41:39', NULL),
(598, 171, 'Input Surat Keterangan Pindah berhasil', '0', '2023-04-03 09:41:47', NULL),
(599, 171, 'Input Persyaratan Lain berhasil', '0', '2023-04-03 09:41:51', NULL),
(600, 171, 'Input Ijazah S1 berhasil', '0', '2023-04-03 09:41:55', NULL),
(601, 171, 'Input Transkrip Nilai S1 berhasil', '0', '2023-04-03 09:42:00', NULL),
(602, 171, 'Hapus Kartu Tanda Penduduk berhasil', '0', '2023-04-03 11:01:45', NULL),
(603, 171, 'Hapus Kartu Keluarga berhasil', '0', '2023-04-03 11:01:52', NULL),
(604, 171, 'Hapus Akte Kelahiran berhasil', '0', '2023-04-03 11:01:55', NULL),
(605, 171, 'Hapus Ijazah SMA/SMK/Sederajat  berhasil', '0', '2023-04-03 11:02:00', NULL),
(606, 171, 'Hapus Ijazah S1 berhasil', '0', '2023-04-03 11:02:04', NULL),
(607, 171, 'Hapus Transkrip Nilai S1 berhasil', '0', '2023-04-03 11:02:09', NULL),
(608, 171, 'Input Kartu Keluarga berhasil', '0', '2023-04-03 11:02:42', NULL),
(609, 171, 'Input Ijazah berhasil', '0', '2023-04-03 11:02:55', NULL),
(610, 171, 'Input Kartu Tanda Penduduk berhasil', '0', '2023-04-03 11:04:24', NULL),
(611, 171, 'Input Kartu Keluarga berhasil', '0', '2023-04-03 11:04:29', NULL),
(612, 171, 'Input Ijazah S1 berhasil', '0', '2023-04-03 11:04:38', NULL),
(613, 171, 'Input Transkrip Nilai S1 berhasil', '0', '2023-04-03 11:04:42', NULL),
(614, 171, 'Hapus Transkrip Nilai S1 berhasil', '0', '2023-04-03 11:07:19', NULL),
(615, 171, 'Hapus Ijazah S1 berhasil', '0', '2023-04-03 12:58:07', NULL),
(616, 171, 'Hapus Persyaratan Lain berhasil', '0', '2023-04-03 13:00:30', NULL),
(617, 171, 'Input Persyaratan Lain berhasil', '0', '2023-04-03 13:02:16', NULL),
(618, 171, 'Hapus Kartu Tanda Penduduk berhasil', '0', '2023-04-03 13:33:17', NULL),
(619, 171, 'Hapus Kartu Keluarga berhasil', '0', '2023-04-03 13:33:25', NULL),
(620, 171, 'Input Kartu Tanda Penduduk berhasil', '0', '2023-04-03 14:03:39', NULL),
(621, 171, 'Input Kartu Keluarga berhasil', '0', '2023-04-03 14:03:44', NULL),
(622, 171, 'Hapus Persyaratan Lain berhasil', '0', '2023-04-03 14:04:56', NULL),
(623, 171, 'Input Persyaratan Lain berhasil', '0', '2023-04-03 14:05:38', NULL),
(624, 171, 'Hapus Kartu Tanda Penduduk berhasil', '0', '2023-04-04 09:03:15', NULL),
(625, 171, 'Hapus Kartu Keluarga berhasil', '0', '2023-04-04 09:03:17', NULL),
(626, 171, 'Hapus Akte Kelahiran berhasil', '0', '2023-04-04 09:03:25', NULL),
(627, 171, 'Hapus Ijazah SMA/SMK/Sederajat  berhasil', '0', '2023-04-04 09:03:30', NULL),
(628, 171, 'Hapus Nilai Ujian Nasional berhasil', '0', '2023-04-04 09:03:35', NULL),
(629, 171, 'Hapus Ijazah D1/D2/D3 berhasil', '0', '2023-04-04 09:04:32', NULL),
(630, 171, 'Hapus Transkrip Nilai D1/D2/D3 berhasil', '0', '2023-04-04 09:04:39', NULL),
(631, 171, 'Hapus Surat Keterangan Pindah berhasil', '0', '2023-04-04 09:04:46', NULL),
(632, 171, 'Hapus Persyaratan Lain berhasil', '0', '2023-04-04 09:04:52', NULL),
(633, 171, 'Input Kartu Tanda Penduduk berhasil', '0', '2023-04-04 09:35:13', NULL),
(634, 171, 'Input Kartu Keluarga berhasil', '0', '2023-04-04 09:35:18', NULL),
(635, 171, 'Input Kartu Keluarga berhasil', '0', '2023-04-04 09:35:21', NULL),
(636, 171, 'Input Ijazah berhasil', '0', '2023-04-04 09:35:30', NULL),
(637, 171, 'Input Nilai Ujian Nasional berhasil', '0', '2023-04-04 09:35:35', NULL),
(638, 171, 'Input Ijazah D1/D2/D3 berhasil', '0', '2023-04-04 09:35:41', NULL),
(639, 171, 'Input Transkrip Nilai D1/D2/D3 berhasil', '0', '2023-04-04 09:35:48', NULL),
(640, 171, 'Input Surat Keterangan Pindah berhasil', '0', '2023-04-04 09:36:06', NULL),
(641, 171, 'Input Persyaratan Lain berhasil', '0', '2023-04-04 09:36:11', NULL),
(642, 171, 'Hapus Persyaratan Lain berhasil', '0', '2023-04-04 11:55:53', NULL),
(643, 171, 'Hapus Surat Keterangan Pindah berhasil', '0', '2023-04-04 11:55:58', NULL),
(644, 171, 'Hapus Transkrip Nilai D1/D2/D3 berhasil', '0', '2023-04-04 11:56:06', NULL),
(645, 171, 'Hapus Nilai Ujian Nasional berhasil', '0', '2023-04-04 11:56:46', NULL),
(646, 171, 'Hapus Ijazah D1/D2/D3 berhasil', '0', '2023-04-04 11:56:51', NULL),
(647, 171, 'Input Nilai Ujian Nasional berhasil', '0', '2023-04-05 09:48:07', NULL),
(648, 171, 'Input Surat Keterangan Pindah berhasil', '0', '2023-04-05 13:33:02', NULL),
(649, 171, 'Input Persyaratan Lain berhasil', '0', '2023-04-05 13:33:08', NULL),
(650, 171, 'Input Ijazah D1/D2/D3 berhasil', '0', '2023-04-05 13:34:37', NULL),
(651, 171, 'Input Transkrip Nilai D1/D2/D3 berhasil', '0', '2023-04-05 13:36:39', NULL),
(652, 171, 'Hapus Kartu Tanda Penduduk berhasil', '0', '2023-04-05 20:33:56', NULL),
(653, 171, 'Hapus Kartu Keluarga berhasil', '0', '2023-04-05 20:39:20', NULL),
(654, 171, 'Input Kartu Keluarga berhasil', '0', '2023-04-05 20:42:40', NULL),
(655, 171, 'Hapus Ijazah SMA/SMK/Sederajat  berhasil', '0', '2023-04-05 21:10:39', NULL),
(656, 171, 'Edit form pendaftaran berhasil', '0', '2023-04-11 09:14:57', NULL),
(657, 171, 'Edit form pendaftaran berhasil', '0', '2023-04-11 09:18:37', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `outbox`
--

CREATE TABLE `outbox` (
  `id` int(11) NOT NULL,
  `penerima` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `id_device` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `outbox`
--

INSERT INTO `outbox` (`id`, `penerima`, `text`, `status`, `created_at`, `id_device`, `type`, `url_file`) VALUES
(122, '6281271107304', 'haihai', '1', '2022-12-09 09:52:44', 'garangan', NULL, NULL),
(123, '6282180493828', 'test kirim wa pake ppsb', '1', '2022-12-09 09:53:32', 'garangan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `id_user` varchar(10) DEFAULT NULL,
  `no_pendaftaran` varchar(20) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `jurusan` varchar(20) DEFAULT NULL,
  `nama_depan` varchar(50) DEFAULT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `nik` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` varchar(30) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `alamat_jember` varchar(100) NOT NULL,
  `size_almet` char(3) NOT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `gdarah` varchar(5) DEFAULT NULL,
  `jk` varchar(10) DEFAULT NULL,
  `wn` varchar(20) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `anak` varchar(20) DEFAULT NULL,
  `jsaudara` varchar(20) DEFAULT NULL,
  `pekerjaan` varchar(20) DEFAULT NULL,
  `asalsekolah` varchar(20) DEFAULT NULL,
  `tahunlulus` year(4) DEFAULT NULL,
  `npsn` int(11) NOT NULL,
  `alamatsekolah` varchar(200) DEFAULT NULL,
  `kota` varchar(20) DEFAULT NULL,
  `prov` varchar(20) DEFAULT NULL,
  `nama_ortu` varchar(50) DEFAULT NULL,
  `nohp_ortu` varchar(15) DEFAULT NULL,
  `agama_ortu` varchar(20) DEFAULT NULL,
  `pekerjaan_ortu` varchar(40) DEFAULT NULL,
  `pendidikan_ortu` varchar(30) DEFAULT NULL,
  `penghasilan_ortu` varchar(30) DEFAULT NULL,
  `alamat_ortu` varchar(100) DEFAULT NULL,
  `jalur_pendaftaran` varchar(100) NOT NULL,
  `informasi` text NOT NULL,
  `kipk` int(11) NOT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `bulan` varchar(20) DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `id_user`, `no_pendaftaran`, `tahun`, `jurusan`, `nama_depan`, `nama_belakang`, `nik`, `nisn`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `alamat_jember`, `size_almet`, `nohp`, `gdarah`, `jk`, `wn`, `agama`, `anak`, `jsaudara`, `pekerjaan`, `asalsekolah`, `tahunlulus`, `npsn`, `alamatsekolah`, `kota`, `prov`, `nama_ortu`, `nohp_ortu`, `agama_ortu`, `pekerjaan_ortu`, `pendidikan_ortu`, `penghasilan_ortu`, `alamat_ortu`, `jalur_pendaftaran`, `informasi`, `kipk`, `tanggal_daftar`, `bulan`, `hari`) VALUES
(54, '168', '2023030001', 2023, '03', 'hendii', 'kirim', 0, 0, 'jember', '2023-03-22', 'jlm ', '', '', '085123456789', 'A', 'laki-laki', 'Indonesia', 'Islam', '1', '2', 'tidak bekerja', 'sma 1 jember', 2023, 0, 'jlkmkj', '3509', '35', 'ina', '085123456789', 'Islam', 'lainnya', 'DIPLOMA', '<1000000', 'jlm', '', '', 0, '2023-03-20', 'March', '20'),
(62, '171', '2023090001', 2023, '09', 'Minggar Putra', 'Dhea Ramadhan', 2147483647, 23123, 'Probolinggo', '1999-12-24', 'Probolinggo', 'Jember', 'XL', '085321102010', 'B', 'laki-laki', 'Indonesia', 'Islam', '2', '2', 'tidak bekerja', 'SMA Negeri 2 Proboli', 2018, 2147483647, 'Probolinggo', '3574', '35', 'Muryani', '085321026154', 'Islam', 'pns', 'SARJANA', '250000-5000000', 'Jl. Yos Sudarso Gg. III', 'KIP KULIAH', 'Media Sosial', 12313, '2023-04-11', 'April', '11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `persyaratan_lain`
--

CREATE TABLE `persyaratan_lain` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `persyaratan_lain` varchar(100) DEFAULT NULL,
  `token` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `persyaratan_lain`
--

INSERT INTO `persyaratan_lain` (`id`, `user`, `persyaratan_lain`, `token`) VALUES
(5, 171, '7e89ece381ff484d6b620fe2ca55c0a71.pdf', '0.99050363');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinces`
--

CREATE TABLE `provinces` (
  `id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `provinces`
--

INSERT INTO `provinces` (`id`, `name`) VALUES
('11', 'ACEH'),
('12', 'SUMATERA UTARA'),
('13', 'SUMATERA BARAT'),
('14', 'RIAU'),
('15', 'JAMBI'),
('16', 'SUMATERA SELATAN'),
('17', 'BENGKULU'),
('18', 'LAMPUNG'),
('19', 'KEPULAUAN BANGKA BELITUNG'),
('21', 'KEPULAUAN RIAU'),
('31', 'DKI JAKARTA'),
('32', 'JAWA BARAT'),
('33', 'JAWA TENGAH'),
('34', 'DI YOGYAKARTA'),
('35', 'JAWA TIMUR'),
('36', 'BANTEN'),
('51', 'BALI'),
('52', 'NUSA TENGGARA BARAT'),
('53', 'NUSA TENGGARA TIMUR'),
('61', 'KALIMANTAN BARAT'),
('62', 'KALIMANTAN TENGAH'),
('63', 'KALIMANTAN SELATAN'),
('64', 'KALIMANTAN TIMUR'),
('65', 'KALIMANTAN UTARA'),
('71', 'SULAWESI UTARA'),
('72', 'SULAWESI TENGAH'),
('73', 'SULAWESI SELATAN'),
('74', 'SULAWESI TENGGARA'),
('75', 'GORONTALO'),
('76', 'SULAWESI BARAT'),
('81', 'MALUKU'),
('82', 'MALUKU UTARA'),
('91', 'PAPUA BARAT'),
('94', 'PAPUA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `regencies`
--

CREATE TABLE `regencies` (
  `id` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `regencies`
--

INSERT INTO `regencies` (`id`, `province_id`, `name`) VALUES
('1101', '11', 'KABUPATEN SIMEULUE'),
('1102', '11', 'KABUPATEN ACEH SINGKIL'),
('1103', '11', 'KABUPATEN ACEH SELATAN'),
('1104', '11', 'KABUPATEN ACEH TENGGARA'),
('1105', '11', 'KABUPATEN ACEH TIMUR'),
('1106', '11', 'KABUPATEN ACEH TENGAH'),
('1107', '11', 'KABUPATEN ACEH BARAT'),
('1108', '11', 'KABUPATEN ACEH BESAR'),
('1109', '11', 'KABUPATEN PIDIE'),
('1110', '11', 'KABUPATEN BIREUEN'),
('1111', '11', 'KABUPATEN ACEH UTARA'),
('1112', '11', 'KABUPATEN ACEH BARAT DAYA'),
('1113', '11', 'KABUPATEN GAYO LUES'),
('1114', '11', 'KABUPATEN ACEH TAMIANG'),
('1115', '11', 'KABUPATEN NAGAN RAYA'),
('1116', '11', 'KABUPATEN ACEH JAYA'),
('1117', '11', 'KABUPATEN BENER MERIAH'),
('1118', '11', 'KABUPATEN PIDIE JAYA'),
('1171', '11', 'KOTA BANDA ACEH'),
('1172', '11', 'KOTA SABANG'),
('1173', '11', 'KOTA LANGSA'),
('1174', '11', 'KOTA LHOKSEUMAWE'),
('1175', '11', 'KOTA SUBULUSSALAM'),
('1201', '12', 'KABUPATEN NIAS'),
('1202', '12', 'KABUPATEN MANDAILING NATAL'),
('1203', '12', 'KABUPATEN TAPANULI SELATAN'),
('1204', '12', 'KABUPATEN TAPANULI TENGAH'),
('1205', '12', 'KABUPATEN TAPANULI UTARA'),
('1206', '12', 'KABUPATEN TOBA SAMOSIR'),
('1207', '12', 'KABUPATEN LABUHAN BATU'),
('1208', '12', 'KABUPATEN ASAHAN'),
('1209', '12', 'KABUPATEN SIMALUNGUN'),
('1210', '12', 'KABUPATEN DAIRI'),
('1211', '12', 'KABUPATEN KARO'),
('1212', '12', 'KABUPATEN DELI SERDANG'),
('1213', '12', 'KABUPATEN LANGKAT'),
('1214', '12', 'KABUPATEN NIAS SELATAN'),
('1215', '12', 'KABUPATEN HUMBANG HASUNDUTAN'),
('1216', '12', 'KABUPATEN PAKPAK BHARAT'),
('1217', '12', 'KABUPATEN SAMOSIR'),
('1218', '12', 'KABUPATEN SERDANG BEDAGAI'),
('1219', '12', 'KABUPATEN BATU BARA'),
('1220', '12', 'KABUPATEN PADANG LAWAS UTARA'),
('1221', '12', 'KABUPATEN PADANG LAWAS'),
('1222', '12', 'KABUPATEN LABUHAN BATU SELATAN'),
('1223', '12', 'KABUPATEN LABUHAN BATU UTARA'),
('1224', '12', 'KABUPATEN NIAS UTARA'),
('1225', '12', 'KABUPATEN NIAS BARAT'),
('1271', '12', 'KOTA SIBOLGA'),
('1272', '12', 'KOTA TANJUNG BALAI'),
('1273', '12', 'KOTA PEMATANG SIANTAR'),
('1274', '12', 'KOTA TEBING TINGGI'),
('1275', '12', 'KOTA MEDAN'),
('1276', '12', 'KOTA BINJAI'),
('1277', '12', 'KOTA PADANGSIDIMPUAN'),
('1278', '12', 'KOTA GUNUNGSITOLI'),
('1301', '13', 'KABUPATEN KEPULAUAN MENTAWAI'),
('1302', '13', 'KABUPATEN PESISIR SELATAN'),
('1303', '13', 'KABUPATEN SOLOK'),
('1304', '13', 'KABUPATEN SIJUNJUNG'),
('1305', '13', 'KABUPATEN TANAH DATAR'),
('1306', '13', 'KABUPATEN PADANG PARIAMAN'),
('1307', '13', 'KABUPATEN AGAM'),
('1308', '13', 'KABUPATEN LIMA PULUH KOTA'),
('1309', '13', 'KABUPATEN PASAMAN'),
('1310', '13', 'KABUPATEN SOLOK SELATAN'),
('1311', '13', 'KABUPATEN DHARMASRAYA'),
('1312', '13', 'KABUPATEN PASAMAN BARAT'),
('1371', '13', 'KOTA PADANG'),
('1372', '13', 'KOTA SOLOK'),
('1373', '13', 'KOTA SAWAH LUNTO'),
('1374', '13', 'KOTA PADANG PANJANG'),
('1375', '13', 'KOTA BUKITTINGGI'),
('1376', '13', 'KOTA PAYAKUMBUH'),
('1377', '13', 'KOTA PARIAMAN'),
('1401', '14', 'KABUPATEN KUANTAN SINGINGI'),
('1402', '14', 'KABUPATEN INDRAGIRI HULU'),
('1403', '14', 'KABUPATEN INDRAGIRI HILIR'),
('1404', '14', 'KABUPATEN PELALAWAN'),
('1405', '14', 'KABUPATEN S I A K'),
('1406', '14', 'KABUPATEN KAMPAR'),
('1407', '14', 'KABUPATEN ROKAN HULU'),
('1408', '14', 'KABUPATEN BENGKALIS'),
('1409', '14', 'KABUPATEN ROKAN HILIR'),
('1410', '14', 'KABUPATEN KEPULAUAN MERANTI'),
('1471', '14', 'KOTA PEKANBARU'),
('1473', '14', 'KOTA D U M A I'),
('1501', '15', 'KABUPATEN KERINCI'),
('1502', '15', 'KABUPATEN MERANGIN'),
('1503', '15', 'KABUPATEN SAROLANGUN'),
('1504', '15', 'KABUPATEN BATANG HARI'),
('1505', '15', 'KABUPATEN MUARO JAMBI'),
('1506', '15', 'KABUPATEN TANJUNG JABUNG TIMUR'),
('1507', '15', 'KABUPATEN TANJUNG JABUNG BARAT'),
('1508', '15', 'KABUPATEN TEBO'),
('1509', '15', 'KABUPATEN BUNGO'),
('1571', '15', 'KOTA JAMBI'),
('1572', '15', 'KOTA SUNGAI PENUH'),
('1601', '16', 'KABUPATEN OGAN KOMERING ULU'),
('1602', '16', 'KABUPATEN OGAN KOMERING ILIR'),
('1603', '16', 'KABUPATEN MUARA ENIM'),
('1604', '16', 'KABUPATEN LAHAT'),
('1605', '16', 'KABUPATEN MUSI RAWAS'),
('1606', '16', 'KABUPATEN MUSI BANYUASIN'),
('1607', '16', 'KABUPATEN BANYU ASIN'),
('1608', '16', 'KABUPATEN OGAN KOMERING ULU SELATAN'),
('1609', '16', 'KABUPATEN OGAN KOMERING ULU TIMUR'),
('1610', '16', 'KABUPATEN OGAN ILIR'),
('1611', '16', 'KABUPATEN EMPAT LAWANG'),
('1612', '16', 'KABUPATEN PENUKAL ABAB LEMATANG ILIR'),
('1613', '16', 'KABUPATEN MUSI RAWAS UTARA'),
('1671', '16', 'KOTA PALEMBANG'),
('1672', '16', 'KOTA PRABUMULIH'),
('1673', '16', 'KOTA PAGAR ALAM'),
('1674', '16', 'KOTA LUBUKLINGGAU'),
('1701', '17', 'KABUPATEN BENGKULU SELATAN'),
('1702', '17', 'KABUPATEN REJANG LEBONG'),
('1703', '17', 'KABUPATEN BENGKULU UTARA'),
('1704', '17', 'KABUPATEN KAUR'),
('1705', '17', 'KABUPATEN SELUMA'),
('1706', '17', 'KABUPATEN MUKOMUKO'),
('1707', '17', 'KABUPATEN LEBONG'),
('1708', '17', 'KABUPATEN KEPAHIANG'),
('1709', '17', 'KABUPATEN BENGKULU TENGAH'),
('1771', '17', 'KOTA BENGKULU'),
('1801', '18', 'KABUPATEN LAMPUNG BARAT'),
('1802', '18', 'KABUPATEN TANGGAMUS'),
('1803', '18', 'KABUPATEN LAMPUNG SELATAN'),
('1804', '18', 'KABUPATEN LAMPUNG TIMUR'),
('1805', '18', 'KABUPATEN LAMPUNG TENGAH'),
('1806', '18', 'KABUPATEN LAMPUNG UTARA'),
('1807', '18', 'KABUPATEN WAY KANAN'),
('1808', '18', 'KABUPATEN TULANGBAWANG'),
('1809', '18', 'KABUPATEN PESAWARAN'),
('1810', '18', 'KABUPATEN PRINGSEWU'),
('1811', '18', 'KABUPATEN MESUJI'),
('1812', '18', 'KABUPATEN TULANG BAWANG BARAT'),
('1813', '18', 'KABUPATEN PESISIR BARAT'),
('1871', '18', 'KOTA BANDAR LAMPUNG'),
('1872', '18', 'KOTA METRO'),
('1901', '19', 'KABUPATEN BANGKA'),
('1902', '19', 'KABUPATEN BELITUNG'),
('1903', '19', 'KABUPATEN BANGKA BARAT'),
('1904', '19', 'KABUPATEN BANGKA TENGAH'),
('1905', '19', 'KABUPATEN BANGKA SELATAN'),
('1906', '19', 'KABUPATEN BELITUNG TIMUR'),
('1971', '19', 'KOTA PANGKAL PINANG'),
('2101', '21', 'KABUPATEN KARIMUN'),
('2102', '21', 'KABUPATEN BINTAN'),
('2103', '21', 'KABUPATEN NATUNA'),
('2104', '21', 'KABUPATEN LINGGA'),
('2105', '21', 'KABUPATEN KEPULAUAN ANAMBAS'),
('2171', '21', 'KOTA B A T A M'),
('2172', '21', 'KOTA TANJUNG PINANG'),
('3101', '31', 'KABUPATEN KEPULAUAN SERIBU'),
('3171', '31', 'KOTA JAKARTA SELATAN'),
('3172', '31', 'KOTA JAKARTA TIMUR'),
('3173', '31', 'KOTA JAKARTA PUSAT'),
('3174', '31', 'KOTA JAKARTA BARAT'),
('3175', '31', 'KOTA JAKARTA UTARA'),
('3201', '32', 'KABUPATEN BOGOR'),
('3202', '32', 'KABUPATEN SUKABUMI'),
('3203', '32', 'KABUPATEN CIANJUR'),
('3204', '32', 'KABUPATEN BANDUNG'),
('3205', '32', 'KABUPATEN GARUT'),
('3206', '32', 'KABUPATEN TASIKMALAYA'),
('3207', '32', 'KABUPATEN CIAMIS'),
('3208', '32', 'KABUPATEN KUNINGAN'),
('3209', '32', 'KABUPATEN CIREBON'),
('3210', '32', 'KABUPATEN MAJALENGKA'),
('3211', '32', 'KABUPATEN SUMEDANG'),
('3212', '32', 'KABUPATEN INDRAMAYU'),
('3213', '32', 'KABUPATEN SUBANG'),
('3214', '32', 'KABUPATEN PURWAKARTA'),
('3215', '32', 'KABUPATEN KARAWANG'),
('3216', '32', 'KABUPATEN BEKASI'),
('3217', '32', 'KABUPATEN BANDUNG BARAT'),
('3218', '32', 'KABUPATEN PANGANDARAN'),
('3271', '32', 'KOTA BOGOR'),
('3272', '32', 'KOTA SUKABUMI'),
('3273', '32', 'KOTA BANDUNG'),
('3274', '32', 'KOTA CIREBON'),
('3275', '32', 'KOTA BEKASI'),
('3276', '32', 'KOTA DEPOK'),
('3277', '32', 'KOTA CIMAHI'),
('3278', '32', 'KOTA TASIKMALAYA'),
('3279', '32', 'KOTA BANJAR'),
('3301', '33', 'KABUPATEN CILACAP'),
('3302', '33', 'KABUPATEN BANYUMAS'),
('3303', '33', 'KABUPATEN PURBALINGGA'),
('3304', '33', 'KABUPATEN BANJARNEGARA'),
('3305', '33', 'KABUPATEN KEBUMEN'),
('3306', '33', 'KABUPATEN PURWOREJO'),
('3307', '33', 'KABUPATEN WONOSOBO'),
('3308', '33', 'KABUPATEN MAGELANG'),
('3309', '33', 'KABUPATEN BOYOLALI'),
('3310', '33', 'KABUPATEN KLATEN'),
('3311', '33', 'KABUPATEN SUKOHARJO'),
('3312', '33', 'KABUPATEN WONOGIRI'),
('3313', '33', 'KABUPATEN KARANGANYAR'),
('3314', '33', 'KABUPATEN SRAGEN'),
('3315', '33', 'KABUPATEN GROBOGAN'),
('3316', '33', 'KABUPATEN BLORA'),
('3317', '33', 'KABUPATEN REMBANG'),
('3318', '33', 'KABUPATEN PATI'),
('3319', '33', 'KABUPATEN KUDUS'),
('3320', '33', 'KABUPATEN JEPARA'),
('3321', '33', 'KABUPATEN DEMAK'),
('3322', '33', 'KABUPATEN SEMARANG'),
('3323', '33', 'KABUPATEN TEMANGGUNG'),
('3324', '33', 'KABUPATEN KENDAL'),
('3325', '33', 'KABUPATEN BATANG'),
('3326', '33', 'KABUPATEN PEKALONGAN'),
('3327', '33', 'KABUPATEN PEMALANG'),
('3328', '33', 'KABUPATEN TEGAL'),
('3329', '33', 'KABUPATEN BREBES'),
('3371', '33', 'KOTA MAGELANG'),
('3372', '33', 'KOTA SURAKARTA'),
('3373', '33', 'KOTA SALATIGA'),
('3374', '33', 'KOTA SEMARANG'),
('3375', '33', 'KOTA PEKALONGAN'),
('3376', '33', 'KOTA TEGAL'),
('3401', '34', 'KABUPATEN KULON PROGO'),
('3402', '34', 'KABUPATEN BANTUL'),
('3403', '34', 'KABUPATEN GUNUNG KIDUL'),
('3404', '34', 'KABUPATEN SLEMAN'),
('3471', '34', 'KOTA YOGYAKARTA'),
('3501', '35', 'KABUPATEN PACITAN'),
('3502', '35', 'KABUPATEN PONOROGO'),
('3503', '35', 'KABUPATEN TRENGGALEK'),
('3504', '35', 'KABUPATEN TULUNGAGUNG'),
('3505', '35', 'KABUPATEN BLITAR'),
('3506', '35', 'KABUPATEN KEDIRI'),
('3507', '35', 'KABUPATEN MALANG'),
('3508', '35', 'KABUPATEN LUMAJANG'),
('3509', '35', 'KABUPATEN JEMBER'),
('3510', '35', 'KABUPATEN BANYUWANGI'),
('3511', '35', 'KABUPATEN BONDOWOSO'),
('3512', '35', 'KABUPATEN SITUBONDO'),
('3513', '35', 'KABUPATEN PROBOLINGGO'),
('3514', '35', 'KABUPATEN PASURUAN'),
('3515', '35', 'KABUPATEN SIDOARJO'),
('3516', '35', 'KABUPATEN MOJOKERTO'),
('3517', '35', 'KABUPATEN JOMBANG'),
('3518', '35', 'KABUPATEN NGANJUK'),
('3519', '35', 'KABUPATEN MADIUN'),
('3520', '35', 'KABUPATEN MAGETAN'),
('3521', '35', 'KABUPATEN NGAWI'),
('3522', '35', 'KABUPATEN BOJONEGORO'),
('3523', '35', 'KABUPATEN TUBAN'),
('3524', '35', 'KABUPATEN LAMONGAN'),
('3525', '35', 'KABUPATEN GRESIK'),
('3526', '35', 'KABUPATEN BANGKALAN'),
('3527', '35', 'KABUPATEN SAMPANG'),
('3528', '35', 'KABUPATEN PAMEKASAN'),
('3529', '35', 'KABUPATEN SUMENEP'),
('3571', '35', 'KOTA KEDIRI'),
('3572', '35', 'KOTA BLITAR'),
('3573', '35', 'KOTA MALANG'),
('3574', '35', 'KOTA PROBOLINGGO'),
('3575', '35', 'KOTA PASURUAN'),
('3576', '35', 'KOTA MOJOKERTO'),
('3577', '35', 'KOTA MADIUN'),
('3578', '35', 'KOTA SURABAYA'),
('3579', '35', 'KOTA BATU'),
('3601', '36', 'KABUPATEN PANDEGLANG'),
('3602', '36', 'KABUPATEN LEBAK'),
('3603', '36', 'KABUPATEN TANGERANG'),
('3604', '36', 'KABUPATEN SERANG'),
('3671', '36', 'KOTA TANGERANG'),
('3672', '36', 'KOTA CILEGON'),
('3673', '36', 'KOTA SERANG'),
('3674', '36', 'KOTA TANGERANG SELATAN'),
('5101', '51', 'KABUPATEN JEMBRANA'),
('5102', '51', 'KABUPATEN TABANAN'),
('5103', '51', 'KABUPATEN BADUNG'),
('5104', '51', 'KABUPATEN GIANYAR'),
('5105', '51', 'KABUPATEN KLUNGKUNG'),
('5106', '51', 'KABUPATEN BANGLI'),
('5107', '51', 'KABUPATEN KARANG ASEM'),
('5108', '51', 'KABUPATEN BULELENG'),
('5171', '51', 'KOTA DENPASAR'),
('5201', '52', 'KABUPATEN LOMBOK BARAT'),
('5202', '52', 'KABUPATEN LOMBOK TENGAH'),
('5203', '52', 'KABUPATEN LOMBOK TIMUR'),
('5204', '52', 'KABUPATEN SUMBAWA'),
('5205', '52', 'KABUPATEN DOMPU'),
('5206', '52', 'KABUPATEN BIMA'),
('5207', '52', 'KABUPATEN SUMBAWA BARAT'),
('5208', '52', 'KABUPATEN LOMBOK UTARA'),
('5271', '52', 'KOTA MATARAM'),
('5272', '52', 'KOTA BIMA'),
('5301', '53', 'KABUPATEN SUMBA BARAT'),
('5302', '53', 'KABUPATEN SUMBA TIMUR'),
('5303', '53', 'KABUPATEN KUPANG'),
('5304', '53', 'KABUPATEN TIMOR TENGAH SELATAN'),
('5305', '53', 'KABUPATEN TIMOR TENGAH UTARA'),
('5306', '53', 'KABUPATEN BELU'),
('5307', '53', 'KABUPATEN ALOR'),
('5308', '53', 'KABUPATEN LEMBATA'),
('5309', '53', 'KABUPATEN FLORES TIMUR'),
('5310', '53', 'KABUPATEN SIKKA'),
('5311', '53', 'KABUPATEN ENDE'),
('5312', '53', 'KABUPATEN NGADA'),
('5313', '53', 'KABUPATEN MANGGARAI'),
('5314', '53', 'KABUPATEN ROTE NDAO'),
('5315', '53', 'KABUPATEN MANGGARAI BARAT'),
('5316', '53', 'KABUPATEN SUMBA TENGAH'),
('5317', '53', 'KABUPATEN SUMBA BARAT DAYA'),
('5318', '53', 'KABUPATEN NAGEKEO'),
('5319', '53', 'KABUPATEN MANGGARAI TIMUR'),
('5320', '53', 'KABUPATEN SABU RAIJUA'),
('5321', '53', 'KABUPATEN MALAKA'),
('5371', '53', 'KOTA KUPANG'),
('6101', '61', 'KABUPATEN SAMBAS'),
('6102', '61', 'KABUPATEN BENGKAYANG'),
('6103', '61', 'KABUPATEN LANDAK'),
('6104', '61', 'KABUPATEN MEMPAWAH'),
('6105', '61', 'KABUPATEN SANGGAU'),
('6106', '61', 'KABUPATEN KETAPANG'),
('6107', '61', 'KABUPATEN SINTANG'),
('6108', '61', 'KABUPATEN KAPUAS HULU'),
('6109', '61', 'KABUPATEN SEKADAU'),
('6110', '61', 'KABUPATEN MELAWI'),
('6111', '61', 'KABUPATEN KAYONG UTARA'),
('6112', '61', 'KABUPATEN KUBU RAYA'),
('6171', '61', 'KOTA PONTIANAK'),
('6172', '61', 'KOTA SINGKAWANG'),
('6201', '62', 'KABUPATEN KOTAWARINGIN BARAT'),
('6202', '62', 'KABUPATEN KOTAWARINGIN TIMUR'),
('6203', '62', 'KABUPATEN KAPUAS'),
('6204', '62', 'KABUPATEN BARITO SELATAN'),
('6205', '62', 'KABUPATEN BARITO UTARA'),
('6206', '62', 'KABUPATEN SUKAMARA'),
('6207', '62', 'KABUPATEN LAMANDAU'),
('6208', '62', 'KABUPATEN SERUYAN'),
('6209', '62', 'KABUPATEN KATINGAN'),
('6210', '62', 'KABUPATEN PULANG PISAU'),
('6211', '62', 'KABUPATEN GUNUNG MAS'),
('6212', '62', 'KABUPATEN BARITO TIMUR'),
('6213', '62', 'KABUPATEN MURUNG RAYA'),
('6271', '62', 'KOTA PALANGKA RAYA'),
('6301', '63', 'KABUPATEN TANAH LAUT'),
('6302', '63', 'KABUPATEN KOTA BARU'),
('6303', '63', 'KABUPATEN BANJAR'),
('6304', '63', 'KABUPATEN BARITO KUALA'),
('6305', '63', 'KABUPATEN TAPIN'),
('6306', '63', 'KABUPATEN HULU SUNGAI SELATAN'),
('6307', '63', 'KABUPATEN HULU SUNGAI TENGAH'),
('6308', '63', 'KABUPATEN HULU SUNGAI UTARA'),
('6309', '63', 'KABUPATEN TABALONG'),
('6310', '63', 'KABUPATEN TANAH BUMBU'),
('6311', '63', 'KABUPATEN BALANGAN'),
('6371', '63', 'KOTA BANJARMASIN'),
('6372', '63', 'KOTA BANJAR BARU'),
('6401', '64', 'KABUPATEN PASER'),
('6402', '64', 'KABUPATEN KUTAI BARAT'),
('6403', '64', 'KABUPATEN KUTAI KARTANEGARA'),
('6404', '64', 'KABUPATEN KUTAI TIMUR'),
('6405', '64', 'KABUPATEN BERAU'),
('6409', '64', 'KABUPATEN PENAJAM PASER UTARA'),
('6411', '64', 'KABUPATEN MAHAKAM HULU'),
('6471', '64', 'KOTA BALIKPAPAN'),
('6472', '64', 'KOTA SAMARINDA'),
('6474', '64', 'KOTA BONTANG'),
('6501', '65', 'KABUPATEN MALINAU'),
('6502', '65', 'KABUPATEN BULUNGAN'),
('6503', '65', 'KABUPATEN TANA TIDUNG'),
('6504', '65', 'KABUPATEN NUNUKAN'),
('6571', '65', 'KOTA TARAKAN'),
('7101', '71', 'KABUPATEN BOLAANG MONGONDOW'),
('7102', '71', 'KABUPATEN MINAHASA'),
('7103', '71', 'KABUPATEN KEPULAUAN SANGIHE'),
('7104', '71', 'KABUPATEN KEPULAUAN TALAUD'),
('7105', '71', 'KABUPATEN MINAHASA SELATAN'),
('7106', '71', 'KABUPATEN MINAHASA UTARA'),
('7107', '71', 'KABUPATEN BOLAANG MONGONDOW UTARA'),
('7108', '71', 'KABUPATEN SIAU TAGULANDANG BIARO'),
('7109', '71', 'KABUPATEN MINAHASA TENGGARA'),
('7110', '71', 'KABUPATEN BOLAANG MONGONDOW SELATAN'),
('7111', '71', 'KABUPATEN BOLAANG MONGONDOW TIMUR'),
('7171', '71', 'KOTA MANADO'),
('7172', '71', 'KOTA BITUNG'),
('7173', '71', 'KOTA TOMOHON'),
('7174', '71', 'KOTA KOTAMOBAGU'),
('7201', '72', 'KABUPATEN BANGGAI KEPULAUAN'),
('7202', '72', 'KABUPATEN BANGGAI'),
('7203', '72', 'KABUPATEN MOROWALI'),
('7204', '72', 'KABUPATEN POSO'),
('7205', '72', 'KABUPATEN DONGGALA'),
('7206', '72', 'KABUPATEN TOLI-TOLI'),
('7207', '72', 'KABUPATEN BUOL'),
('7208', '72', 'KABUPATEN PARIGI MOUTONG'),
('7209', '72', 'KABUPATEN TOJO UNA-UNA'),
('7210', '72', 'KABUPATEN SIGI'),
('7211', '72', 'KABUPATEN BANGGAI LAUT'),
('7212', '72', 'KABUPATEN MOROWALI UTARA'),
('7271', '72', 'KOTA PALU'),
('7301', '73', 'KABUPATEN KEPULAUAN SELAYAR'),
('7302', '73', 'KABUPATEN BULUKUMBA'),
('7303', '73', 'KABUPATEN BANTAENG'),
('7304', '73', 'KABUPATEN JENEPONTO'),
('7305', '73', 'KABUPATEN TAKALAR'),
('7306', '73', 'KABUPATEN GOWA'),
('7307', '73', 'KABUPATEN SINJAI'),
('7308', '73', 'KABUPATEN MAROS'),
('7309', '73', 'KABUPATEN PANGKAJENE DAN KEPULAUAN'),
('7310', '73', 'KABUPATEN BARRU'),
('7311', '73', 'KABUPATEN BONE'),
('7312', '73', 'KABUPATEN SOPPENG'),
('7313', '73', 'KABUPATEN WAJO'),
('7314', '73', 'KABUPATEN SIDENRENG RAPPANG'),
('7315', '73', 'KABUPATEN PINRANG'),
('7316', '73', 'KABUPATEN ENREKANG'),
('7317', '73', 'KABUPATEN LUWU'),
('7318', '73', 'KABUPATEN TANA TORAJA'),
('7322', '73', 'KABUPATEN LUWU UTARA'),
('7325', '73', 'KABUPATEN LUWU TIMUR'),
('7326', '73', 'KABUPATEN TORAJA UTARA'),
('7371', '73', 'KOTA MAKASSAR'),
('7372', '73', 'KOTA PAREPARE'),
('7373', '73', 'KOTA PALOPO'),
('7401', '74', 'KABUPATEN BUTON'),
('7402', '74', 'KABUPATEN MUNA'),
('7403', '74', 'KABUPATEN KONAWE'),
('7404', '74', 'KABUPATEN KOLAKA'),
('7405', '74', 'KABUPATEN KONAWE SELATAN'),
('7406', '74', 'KABUPATEN BOMBANA'),
('7407', '74', 'KABUPATEN WAKATOBI'),
('7408', '74', 'KABUPATEN KOLAKA UTARA'),
('7409', '74', 'KABUPATEN BUTON UTARA'),
('7410', '74', 'KABUPATEN KONAWE UTARA'),
('7411', '74', 'KABUPATEN KOLAKA TIMUR'),
('7412', '74', 'KABUPATEN KONAWE KEPULAUAN'),
('7413', '74', 'KABUPATEN MUNA BARAT'),
('7414', '74', 'KABUPATEN BUTON TENGAH'),
('7415', '74', 'KABUPATEN BUTON SELATAN'),
('7471', '74', 'KOTA KENDARI'),
('7472', '74', 'KOTA BAUBAU'),
('7501', '75', 'KABUPATEN BOALEMO'),
('7502', '75', 'KABUPATEN GORONTALO'),
('7503', '75', 'KABUPATEN POHUWATO'),
('7504', '75', 'KABUPATEN BONE BOLANGO'),
('7505', '75', 'KABUPATEN GORONTALO UTARA'),
('7571', '75', 'KOTA GORONTALO'),
('7601', '76', 'KABUPATEN MAJENE'),
('7602', '76', 'KABUPATEN POLEWALI MANDAR'),
('7603', '76', 'KABUPATEN MAMASA'),
('7604', '76', 'KABUPATEN MAMUJU'),
('7605', '76', 'KABUPATEN MAMUJU UTARA'),
('7606', '76', 'KABUPATEN MAMUJU TENGAH'),
('8101', '81', 'KABUPATEN MALUKU TENGGARA BARAT'),
('8102', '81', 'KABUPATEN MALUKU TENGGARA'),
('8103', '81', 'KABUPATEN MALUKU TENGAH'),
('8104', '81', 'KABUPATEN BURU'),
('8105', '81', 'KABUPATEN KEPULAUAN ARU'),
('8106', '81', 'KABUPATEN SERAM BAGIAN BARAT'),
('8107', '81', 'KABUPATEN SERAM BAGIAN TIMUR'),
('8108', '81', 'KABUPATEN MALUKU BARAT DAYA'),
('8109', '81', 'KABUPATEN BURU SELATAN'),
('8171', '81', 'KOTA AMBON'),
('8172', '81', 'KOTA TUAL'),
('8201', '82', 'KABUPATEN HALMAHERA BARAT'),
('8202', '82', 'KABUPATEN HALMAHERA TENGAH'),
('8203', '82', 'KABUPATEN KEPULAUAN SULA'),
('8204', '82', 'KABUPATEN HALMAHERA SELATAN'),
('8205', '82', 'KABUPATEN HALMAHERA UTARA'),
('8206', '82', 'KABUPATEN HALMAHERA TIMUR'),
('8207', '82', 'KABUPATEN PULAU MOROTAI'),
('8208', '82', 'KABUPATEN PULAU TALIABU'),
('8271', '82', 'KOTA TERNATE'),
('8272', '82', 'KOTA TIDORE KEPULAUAN'),
('9101', '91', 'KABUPATEN FAKFAK'),
('9102', '91', 'KABUPATEN KAIMANA'),
('9103', '91', 'KABUPATEN TELUK WONDAMA'),
('9104', '91', 'KABUPATEN TELUK BINTUNI'),
('9105', '91', 'KABUPATEN MANOKWARI'),
('9106', '91', 'KABUPATEN SORONG SELATAN'),
('9107', '91', 'KABUPATEN SORONG'),
('9108', '91', 'KABUPATEN RAJA AMPAT'),
('9109', '91', 'KABUPATEN TAMBRAUW'),
('9110', '91', 'KABUPATEN MAYBRAT'),
('9111', '91', 'KABUPATEN MANOKWARI SELATAN'),
('9112', '91', 'KABUPATEN PEGUNUNGAN ARFAK'),
('9171', '91', 'KOTA SORONG'),
('9401', '94', 'KABUPATEN MERAUKE'),
('9402', '94', 'KABUPATEN JAYAWIJAYA'),
('9403', '94', 'KABUPATEN JAYAPURA'),
('9404', '94', 'KABUPATEN NABIRE'),
('9408', '94', 'KABUPATEN KEPULAUAN YAPEN'),
('9409', '94', 'KABUPATEN BIAK NUMFOR'),
('9410', '94', 'KABUPATEN PANIAI'),
('9411', '94', 'KABUPATEN PUNCAK JAYA'),
('9412', '94', 'KABUPATEN MIMIKA'),
('9413', '94', 'KABUPATEN BOVEN DIGOEL'),
('9414', '94', 'KABUPATEN MAPPI'),
('9415', '94', 'KABUPATEN ASMAT'),
('9416', '94', 'KABUPATEN YAHUKIMO'),
('9417', '94', 'KABUPATEN PEGUNUNGAN BINTANG'),
('9418', '94', 'KABUPATEN TOLIKARA'),
('9419', '94', 'KABUPATEN SARMI'),
('9420', '94', 'KABUPATEN KEEROM'),
('9426', '94', 'KABUPATEN WAROPEN'),
('9427', '94', 'KABUPATEN SUPIORI'),
('9428', '94', 'KABUPATEN MAMBERAMO RAYA'),
('9429', '94', 'KABUPATEN NDUGA'),
('9430', '94', 'KABUPATEN LANNY JAYA'),
('9431', '94', 'KABUPATEN MAMBERAMO TENGAH'),
('9432', '94', 'KABUPATEN YALIMO'),
('9433', '94', 'KABUPATEN PUNCAK'),
('9434', '94', 'KABUPATEN DOGIYAI'),
('9435', '94', 'KABUPATEN INTAN JAYA'),
('9436', '94', 'KABUPATEN DEIYAI'),
('9471', '94', 'KOTA JAYAPURA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `short_desc` text NOT NULL,
  `address` varchar(200) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `favicon` varchar(100) NOT NULL,
  `header_pendaftaran` varchar(100) DEFAULT NULL,
  `buka_pendaftaran` varchar(2) DEFAULT NULL,
  `video_profile` text DEFAULT NULL,
  `hero` varchar(100) DEFAULT NULL,
  `fasilitas` varchar(100) DEFAULT NULL,
  `bghero` varchar(100) DEFAULT NULL,
  `lokasi` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `short_desc`, `address`, `logo`, `favicon`, `header_pendaftaran`, `buka_pendaftaran`, `video_profile`, `hero`, `fasilitas`, `bghero`, `lokasi`) VALUES
(1, '<div style=\"text-align: justify;\"><p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); text-align: start;\"><b>Kampus</b>, dari&nbsp;<a href=\"https://id.wikipedia.org/wiki/Bahasa_Latin\" title=\"Bahasa Latin\" style=\"text-decoration: none; color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">bahasa Latin</a>;&nbsp;<i>campus</i>&nbsp;yang berarti \"lapangan luas\", \"tegal\".</p><p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); text-align: start;\"><br></p></div>', 'Jl. Jawa No.10, Tegal Boto Lor, Sumbersari, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68121', '42bf05afe17ff26c6aad559529c67a0e.jpg', '319e2e1dd4abb1b9b29947bdc98cafb2.jpg', 'a56746d9ed96ec4f18f8d8fc38f5d33d.jpg', '0', 'https://www.youtube.com/watch?v=nmZpTCveT7Y&feature=youtu.be', '0397bb4154b91336c4acd66d134aed88.jpeg', '9befc155c673eb0e2fcd7033e03bf63c.png', 'fb624992ba190f3b34099f2c2168f7ba.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7898.665653019066!2d113.70479095390623!3d-8.169184700000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6943301e4924b%3A0x96076d2130105eab!2sUniversitas%20PGRI%20Argopuro%20Jember%20(UNIPAR)!5e0!3m2!1sen!2sid!4v1679196125555!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sk_pindah`
--

CREATE TABLE `sk_pindah` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `sk` varchar(100) DEFAULT NULL,
  `token` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sk_pindah`
--

INSERT INTO `sk_pindah` (`id`, `user`, `sk`, `token`) VALUES
(3, 171, '7e89ece381ff484d6b620fe2ca55c0a711.pdf', '0.16535371');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pendaftaran`
--

CREATE TABLE `status_pendaftaran` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `form_pendaftaran` int(11) DEFAULT NULL,
  `pembayaran` int(11) DEFAULT NULL,
  `ijazah` int(11) DEFAULT NULL,
  `foto` int(11) DEFAULT NULL,
  `kk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_pendaftaran`
--

INSERT INTO `status_pendaftaran` (`id`, `user`, `form_pendaftaran`, `pembayaran`, `ijazah`, `foto`, `kk`) VALUES
(29, 6, 1, 1, 1, 1, 1),
(30, 100, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id` int(11) NOT NULL,
  `tahun` varchar(20) DEFAULT NULL,
  `awal` date DEFAULT NULL,
  `akhir` date DEFAULT NULL,
  `aktif` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`id`, `tahun`, `awal`, `akhir`, `aktif`) VALUES
(1, '2022', '2022-10-11', '2023-09-29', 0),
(4, '2023', '2022-10-15', '2023-09-30', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transkrip_nilai_d1_d2_d3`
--

CREATE TABLE `transkrip_nilai_d1_d2_d3` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `transkrip_d1_d2_d3` varchar(100) DEFAULT NULL,
  `token` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transkrip_nilai_d1_d2_d3`
--

INSERT INTO `transkrip_nilai_d1_d2_d3` (`id`, `user`, `transkrip_d1_d2_d3`, `token`) VALUES
(3, 171, '7e89ece381ff484d6b620fe2ca55c0a711.pdf', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transkrip_nilai_s1`
--

CREATE TABLE `transkrip_nilai_s1` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `transkrip_s1` varchar(100) DEFAULT NULL,
  `token` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transkrip_nilai_s1`
--

INSERT INTO `transkrip_nilai_s1` (`id`, `user`, `transkrip_s1`, `token`) VALUES
(5, 196, '74ac0c62696a5824ea8090074e2be094.pdf', '0.31539708'),
(8, 201, '68278b7e52ca7959f11fdbd025942ee3.pdf', '0.05762015'),
(9, 202, '8895990a5810dc9e2b1ada04939231fc.pdf', '0.93658374'),
(10, 203, '3f9df43c0d8a5208b841feeb6a5e1cb9.pdf', '0.38897510');

-- --------------------------------------------------------

--
-- Struktur dari tabel `un`
--

CREATE TABLE `un` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `un` varchar(100) DEFAULT NULL,
  `token` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `un`
--

INSERT INTO `un` (`id`, `user`, `un`, `token`) VALUES
(3, 171, '7e89ece381ff484d6b620fe2ca55c0a7.pdf', '0.45783291');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_pilihan_prodi_pendaftar`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_pilihan_prodi_pendaftar` (
`id_user` int(11)
,`no_pendaftaran` varchar(20)
,`nama_lengkap` varchar(101)
,`kode_prodi` varchar(4)
,`nama_prodi` varchar(50)
,`tanggal_daftar` date
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_pilihan_prodi_pendaftar`
--
DROP TABLE IF EXISTS `v_pilihan_prodi_pendaftar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pilihan_prodi_pendaftar`  AS  select `c`.`id` AS `id_user`,`p`.`no_pendaftaran` AS `no_pendaftaran`,concat_ws(' ',`p`.`nama_depan`,`p`.`nama_belakang`) AS `nama_lengkap`,`j`.`kode` AS `kode_prodi`,`j`.`jurusan` AS `nama_prodi`,`p`.`tanggal_daftar` AS `tanggal_daftar` from ((`camaba` `c` join `pendaftaran` `p` on(`c`.`id` = `p`.`id_user`)) join `jurusan` `j` on(`j`.`kode` = `p`.`jurusan`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `akte_kelahiran`
--
ALTER TABLE `akte_kelahiran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `berkas_pendaftaran`
--
ALTER TABLE `berkas_pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `camaba`
--
ALTER TABLE `camaba`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ijazah`
--
ALTER TABLE `ijazah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ijazah_d1_d2_d3`
--
ALTER TABLE `ijazah_d1_d2_d3`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ijazah_s1`
--
ALTER TABLE `ijazah_s1`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kk`
--
ALTER TABLE `kk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ktp`
--
ALTER TABLE `ktp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `norek`
--
ALTER TABLE `norek`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifadmin`
--
ALTER TABLE `notifadmin`
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `outbox`
--
ALTER TABLE `outbox`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `persyaratan_lain`
--
ALTER TABLE `persyaratan_lain`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `regencies`
--
ALTER TABLE `regencies`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sk_pindah`
--
ALTER TABLE `sk_pindah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_pendaftaran`
--
ALTER TABLE `status_pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transkrip_nilai_d1_d2_d3`
--
ALTER TABLE `transkrip_nilai_d1_d2_d3`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transkrip_nilai_s1`
--
ALTER TABLE `transkrip_nilai_s1`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `un`
--
ALTER TABLE `un`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `akte_kelahiran`
--
ALTER TABLE `akte_kelahiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `berkas_pendaftaran`
--
ALTER TABLE `berkas_pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `camaba`
--
ALTER TABLE `camaba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT untuk tabel `device`
--
ALTER TABLE `device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `general`
--
ALTER TABLE `general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ijazah`
--
ALTER TABLE `ijazah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT untuk tabel `ijazah_d1_d2_d3`
--
ALTER TABLE `ijazah_d1_d2_d3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `ijazah_s1`
--
ALTER TABLE `ijazah_s1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `kk`
--
ALTER TABLE `kk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `ktp`
--
ALTER TABLE `ktp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `norek`
--
ALTER TABLE `norek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `notifadmin`
--
ALTER TABLE `notifadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=658;

--
-- AUTO_INCREMENT untuk tabel `outbox`
--
ALTER TABLE `outbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT untuk tabel `persyaratan_lain`
--
ALTER TABLE `persyaratan_lain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `sk_pindah`
--
ALTER TABLE `sk_pindah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `status_pendaftaran`
--
ALTER TABLE `status_pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transkrip_nilai_d1_d2_d3`
--
ALTER TABLE `transkrip_nilai_d1_d2_d3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `transkrip_nilai_s1`
--
ALTER TABLE `transkrip_nilai_s1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `un`
--
ALTER TABLE `un`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
