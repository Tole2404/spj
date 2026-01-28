-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2026 at 03:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spj_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bendaharas`
--

CREATE TABLE `bendaharas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `gol_pangkat` varchar(255) DEFAULT NULL,
  `nip` varchar(255) NOT NULL,
  `eselon` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bendaharas`
--

INSERT INTO `bendaharas` (`id`, `nama`, `jabatan`, `gol_pangkat`, `nip`, `eselon`, `tgl_lahir`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Bayu', 'kepala', 'saas', '1961112219910310220', 'IV', '2026-01-25', 1, '2026-01-21 23:47:13', '2026-01-21 23:47:13');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatans`
--

CREATE TABLE `kegiatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bendahara_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_kerja_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mak_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ppk_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `jumlah_peserta` int(11) DEFAULT NULL,
  `provinsi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `detail_lokasi` varchar(255) DEFAULT NULL,
  `file_laporan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatans`
--

INSERT INTO `kegiatans` (`id`, `unor_id`, `bendahara_id`, `unit_kerja_id`, `mak_id`, `ppk_id`, `nama_kegiatan`, `tanggal_mulai`, `tanggal_selesai`, `jumlah_peserta`, `provinsi_id`, `detail_lokasi`, `file_laporan`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, NULL, NULL, 'Pelatihan AI', '2026-01-20', '2026-01-23', NULL, NULL, NULL, NULL, '2026-01-19 21:19:13', '2026-01-19 22:47:27'),
(2, 1, NULL, 1, NULL, NULL, 'Pelatihan', '2026-01-20', '2026-01-23', NULL, NULL, NULL, NULL, '2026-01-19 21:37:25', '2026-01-19 22:47:27'),
(3, 1, NULL, 1, NULL, NULL, 'Pelatihan IA', '2026-01-20', '2026-01-23', NULL, NULL, NULL, NULL, '2026-01-19 21:48:25', '2026-01-19 22:47:27'),
(4, NULL, NULL, NULL, NULL, NULL, 'Pelatihan aja', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-19 22:53:56', '2026-01-19 22:53:56'),
(5, NULL, NULL, NULL, NULL, NULL, 'cobaa', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-19 23:00:01', '2026-01-19 23:00:01'),
(6, 6, NULL, 16, NULL, NULL, 'cobaaaaa', '2026-01-22', '2026-01-27', 20, NULL, NULL, NULL, '2026-01-19 23:01:30', '2026-01-19 23:01:30'),
(7, 1, NULL, 12, 1, 2, 'Pelatihan 123', '2026-01-22', '2026-01-25', 20, NULL, NULL, NULL, '2026-01-20 19:59:52', '2026-01-20 19:59:52'),
(8, 4, NULL, 3, 1, 2, 'cobaaaaaaaa', '2026-01-23', '2026-01-26', 24, 24, 'Dimana mana', NULL, '2026-01-21 21:39:18', '2026-01-21 21:39:18'),
(9, 9, NULL, 16, 1, 2, 'cobaa 321', '2026-01-23', '2026-01-23', 27, 14, 'Dimana mana', NULL, '2026-01-21 21:58:41', '2026-01-21 21:58:41'),
(10, 9, NULL, 16, 1, 2, 'Pelatihan AI123', '2026-01-25', '2026-01-29', 12, 5, 'Dimana mana', NULL, '2026-01-21 22:07:58', '2026-01-21 22:07:58'),
(11, 2, 1, 2, 1, 2, 'Pelatihan Koding', '2026-01-23', '2026-01-23', 20, 14, 'oyo', NULL, '2026-01-21 23:53:47', '2026-01-21 23:53:47');

-- --------------------------------------------------------

--
-- Table structure for table `konsumsis`
--

CREATE TABLE `konsumsis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kategori` varchar(255) NOT NULL DEFAULT 'snack',
  `waktu_konsumsi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_konsumsi` varchar(255) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `tanggal_pembelian` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `konsumsis`
--

INSERT INTO `konsumsis` (`id`, `kegiatan_id`, `kategori`, `waktu_konsumsi_id`, `nama_konsumsi`, `jumlah`, `harga`, `tanggal_pembelian`, `created_at`, `updated_at`) VALUES
(1, 1, 'snack', NULL, 'Kue Basah TEST', 20, 15000, '2026-01-20 04:54:55', '2026-01-19 21:54:55', '2026-01-19 21:54:55'),
(2, 1, 'makanan', NULL, 'Nasi Box TEST', 25, 35000, '2026-01-20 04:54:55', '2026-01-19 21:54:55', '2026-01-19 21:54:55'),
(3, 3, 'snack', NULL, 'Roti Holland', 1, 20000, '2026-01-20 05:29:45', '2026-01-19 22:29:45', '2026-01-19 22:29:45'),
(4, 4, 'snack', NULL, 'Roti Holland', 1, 200000, '2026-01-20 05:55:57', '2026-01-19 22:55:57', '2026-01-19 22:55:57'),
(5, 6, 'snack', NULL, 'Roti Holland', 20, 20000, '2026-01-20 06:03:09', '2026-01-19 23:03:09', '2026-01-19 23:03:09'),
(6, 6, 'snack', NULL, 'Roti Hollandd', 20, 20000, '2026-01-20 08:17:00', '2026-01-20 01:17:00', '2026-01-20 01:17:00'),
(7, 7, 'snack', NULL, 'Roti Hollanddd', 20, 20000, '2026-01-21 03:05:39', '2026-01-20 20:05:39', '2026-01-20 20:05:39'),
(8, 9, 'snack', NULL, 'Roti Hollandd', 27, 8000, '2026-01-22 05:05:18', '2026-01-21 22:05:18', '2026-01-21 22:05:18'),
(9, 10, 'snack', NULL, 'Roti Holland', 12, 20000, '2026-01-22 05:33:31', '2026-01-21 22:33:31', '2026-01-21 22:33:31'),
(10, 10, 'snack', NULL, 'Roti Hollandddd', 12, 20000, '2026-01-22 05:50:57', '2026-01-21 22:50:57', '2026-01-21 22:50:57'),
(11, 10, 'snack', 1, 'cobaa123', 12, 25000, '2026-01-22 06:04:20', '2026-01-21 23:04:20', '2026-01-21 23:04:20'),
(12, 11, 'snack', 3, 'Roti Hollandddd', 20, 20000, '2026-01-22 06:54:44', '2026-01-21 23:54:44', '2026-01-21 23:54:44'),
(13, 11, 'makanan', 2, 'Naspad', 20, 57000, '2026-01-22 06:55:17', '2026-01-21 23:55:17', '2026-01-21 23:55:17'),
(14, 11, 'makanan', 4, 'Naspadd', 20, 25000, '2026-01-22 06:55:40', '2026-01-21 23:55:40', '2026-01-21 23:55:40');

-- --------------------------------------------------------

--
-- Table structure for table `kwitansi_belanja`
--

CREATE TABLE `kwitansi_belanja` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kegiatan` bigint(20) UNSIGNED DEFAULT NULL,
  `nomor_kwitansi` varchar(255) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `tanggal_pembelian` datetime DEFAULT NULL,
  `jenis_kwitansi` enum('UP','LS') NOT NULL DEFAULT 'UP',
  `total_biaya` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mak`
--

CREATE TABLE `mak` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun` year(4) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `satker` varchar(255) NOT NULL,
  `akun` varchar(255) NOT NULL,
  `paket` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mak`
--

INSERT INTO `mak` (`id`, `tahun`, `nama`, `kode`, `satker`, `akun`, `paket`, `created_at`, `updated_at`) VALUES
(1, '2026', 'Evaluasi Pelaksanaan Kegiatan - Belanja Perjalanan Dinas Biasa', '12.694431.WA.7770.EBD.Z24.100.A-524111', 'SEKRETARIAT BADAN PENGEMBANGAN SUMBER DAYA MANUSIA', 'Belanja Perjalanan Dinas Biasa', 'Evaluasi Pelaksanaan Kegiatan', '2026-01-20 19:34:30', '2026-01-20 19:34:30'),
(2, '2026', 'Rapat Koordinasi - Belanja Barang Konsumsi', '12.694431.WA.7770.RAK.Z24.101.B-521211', 'SEKRETARIAT BADAN PENGEMBANGAN SUMBER DAYA MANUSIA', 'Belanja Barang Konsumsi', 'Rapat Koordinasi', '2026-01-20 19:34:30', '2026-01-20 19:34:30'),
(3, '2026', 'Workshop Pelatihan - Belanja Jasa Profesi', '12.694431.WA.7770.WKS.Z24.102.C-522151', 'SEKRETARIAT BADAN PENGEMBANGAN SUMBER DAYA MANUSIA', 'Belanja Jasa Profesi', 'Workshop Pelatihan', '2026-01-20 19:34:30', '2026-01-20 19:34:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_01_01_000001_create_unor_table', 1),
(2, '2024_01_01_000002_create_unit_kerja_table', 2),
(3, '0001_01_01_000000_create_users_table', 3),
(4, '0001_01_01_000001_create_cache_table', 3),
(5, '0001_01_01_000002_create_jobs_table', 3),
(6, '2024_01_01_000003_create_kegiatan_table', 3),
(7, '2024_01_01_000004_create_konsumsi_table', 3),
(8, '2026_01_20_045331_add_kategori_to_konsumsis_table', 4),
(9, '2026_01_20_055831_add_jumlah_peserta_to_kegiatans_table', 5),
(10, '2024_01_01_000009_create_satuan_biaya_konsumsi_provinsi_table', 6),
(11, '2024_01_01_000008_create_satuan_biaya_honorarium_table', 7),
(12, '2026_01_20_082819_create_waktu_konsumsi_table', 8),
(13, '2026_01_20_083123_add_waktu_konsumsi_id_to_konsumsis_table', 9),
(15, '2026_01_21_022947_create_mak_table', 11),
(16, '2026_01_21_022944_create_mak_table', 12),
(17, '2026_01_21_023952_add_mak_id_and_lokasi_to_kegiatans_table', 13),
(19, '2026_01_21_024324_create_ppk_table', 14),
(20, '2026_01_21_024914_add_ppk_id_to_kegiatans_table', 15),
(21, '2026_01_21_025428_change_lokasi_to_provinsi_in_kegiatans_table', 16),
(22, '2026_01_21_024909_add_ppk_id_to_kegiatans_table', 17),
(25, '2026_01_21_030028_add_provinsi_id_and_detail_lokasi_to_kegiatans', 18),
(26, '2026_01_21_103538_add_status_to_users_table', 19),
(27, '2026_01_22_040444_create_sbm_honorarium_narasumber_table', 20),
(28, '2026_01_22_040714_create_narasumbers_table', 21),
(29, '2026_01_22_062707_create_bendaharas_table', 22),
(30, '2026_01_22_063238_add_bendahara_id_to_kegiatans_table', 23);

-- --------------------------------------------------------

--
-- Table structure for table `narasumbers`
--

CREATE TABLE `narasumbers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan_id` bigint(20) UNSIGNED NOT NULL,
  `nama_narasumber` varchar(255) NOT NULL,
  `jenis` enum('narasumber','moderator','pembawa_acara','panitia') NOT NULL,
  `golongan_jabatan` varchar(255) NOT NULL,
  `npwp` varchar(255) DEFAULT NULL,
  `tarif_pph21` enum('0','5','6','15') NOT NULL DEFAULT '5',
  `honorarium_bruto` int(11) NOT NULL,
  `pph21` int(11) NOT NULL DEFAULT 0,
  `honorarium_netto` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `narasumbers`
--

INSERT INTO `narasumbers` (`id`, `kegiatan_id`, `nama_narasumber`, `jenis`, `golongan_jabatan`, `npwp`, `tarif_pph21`, `honorarium_bruto`, `pph21`, `honorarium_netto`, `created_at`, `updated_at`) VALUES
(1, 8, 'asa', 'narasumber', 'Menteri/Pejabat Setingkat', '313113', '5', 1500000, 75000, 1425000, '2026-01-21 21:43:43', '2026-01-21 21:43:43'),
(2, 9, 'asa', 'narasumber', 'Menteri/Pejabat Setingkat', '313113441', '5', 1700000, 85000, 1615000, '2026-01-21 21:59:28', '2026-01-21 21:59:28'),
(3, 10, 'asa12', 'narasumber', 'Menteri/Pejabat Setingkat', '31311331', '5', 200000, 10000, 190000, '2026-01-21 22:08:21', '2026-01-21 22:08:21'),
(4, 11, 'ardi', 'narasumber', 'Menteri/Pejabat Setingkat', '31311331212121', '15', 175000, 26250, 148750, '2026-01-21 23:56:49', '2026-01-21 23:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ppk`
--

CREATE TABLE `ppk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `satker` varchar(255) NOT NULL,
  `kdppk` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ppk`
--

INSERT INTO `ppk` (`id`, `nama`, `nip`, `satker`, `kdppk`, `created_at`, `updated_at`) VALUES
(1, 'Dini Rianti, S.E.', '198010172005022001', 'SEKRETARIAT BADAN PENGEMBANGAN SUMBER DAYA MANUSIA', '02', '2026-01-20 19:48:02', '2026-01-20 19:48:02'),
(2, 'Andi Firmansyah, M.M.', '197505121998031002', 'SEKRETARIAT BADAN PENGEMBANGAN SUMBER DAYA MANUSIA', '01', '2026-01-20 19:48:02', '2026-01-20 19:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `satuan_biaya_honorarium`
--

CREATE TABLE `satuan_biaya_honorarium` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_honorium` varchar(255) NOT NULL,
  `jabatan_level` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `harga_max_honorium` int(11) DEFAULT NULL,
  `harga_min_honorium` int(11) DEFAULT NULL,
  `tahun_anggaran` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `satuan_biaya_konsumsi_provinsi`
--

CREATE TABLE `satuan_biaya_konsumsi_provinsi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga_max_makan` int(11) NOT NULL,
  `harga_max_snack` int(11) NOT NULL,
  `tahun_anggaran` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `satuan_biaya_konsumsi_provinsi`
--

INSERT INTO `satuan_biaya_konsumsi_provinsi` (`id`, `id_provinsi`, `nama_provinsi`, `satuan`, `harga_max_makan`, `harga_max_snack`, `tahun_anggaran`, `created_at`, `updated_at`) VALUES
(1, 0, 'NASIONAL', 'Orang/Kali', 118000, 53000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(2, 1, 'ACEH', 'Orang/Kali', 51000, 21000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(3, 2, 'SUMATRA UTARA', 'Orang/Kali', 47000, 17000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(4, 3, 'RIAU', 'Orang/Kali', 52000, 18000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(5, 4, 'KEPULAUAN RIAU', 'Orang/Kali', 44000, 25000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(6, 5, 'JAMBI', 'Orang/Kali', 54000, 19000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(7, 6, 'SUMATRA BARAT', 'Orang/Kali', 45000, 19000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(8, 7, 'SUMATRA SELATAN', 'Orang/Kali', 63000, 19000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(9, 8, 'LAMPUNG', 'Orang/Kali', 43000, 21000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(10, 9, 'BENGKULU', 'Orang/Kali', 48000, 16000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(11, 10, 'BANGKA BELITUNG', 'Orang/Kali', 48000, 19000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(12, 11, 'BANTEN', 'Orang/Kali', 54000, 21000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(13, 12, 'JAWA BARAT', 'Orang/Kali', 54000, 22000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(14, 13, 'DKI JAKARTA', 'Orang/Kali', 57000, 24000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(15, 14, 'JAWA TENGAH', 'Orang/Kali', 69000, 17000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(16, 15, 'DI YOGYAKARTA', 'Orang/Kali', 59000, 17000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(17, 16, 'JAWA TIMUR', 'Orang/Kali', 49000, 23000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(18, 17, 'BALI', 'Orang/Kali', 52000, 22000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(19, 18, 'NUSA TENGGARA BARAT', 'Orang/Kali', 51000, 19000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(20, 19, 'NUSA TENGGARA TIMUR', 'Orang/Kali', 52000, 22000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(21, 20, 'KALIMANTAN BARAT', 'Orang/Kali', 51000, 17000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(22, 21, 'KALIMANTAN TENGAH', 'Orang/Kali', 42000, 16000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(23, 22, 'KALIMANTAN SELATAN', 'Orang/Kali', 51000, 18000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(24, 23, 'KALIMANTAN TIMUR', 'Orang/Kali', 48000, 27000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(25, 24, 'KALIMANTAN UTARA', 'Orang/Kali', 53000, 22000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(26, 25, 'SULAWESI UTARA', 'Orang/Kali', 59000, 27000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(27, 26, 'GORONTALO', 'Orang/Kali', 45000, 16000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(28, 27, 'SULAWESI BARAT', 'Orang/Kali', 54000, 22000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(29, 28, 'SULAWESI SELATAN', 'Orang/Kali', 59000, 26000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(30, 29, 'SULAWESI TENGAH', 'Orang/Kali', 48000, 19000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(31, 30, 'SULAWESI TENGGARA', 'Orang/Kali', 49000, 22000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(32, 31, 'MALUKU', 'Orang/Kali', 64000, 25000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(33, 32, 'MALUKU UTARA', 'Orang/Kali', 63000, 26000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(34, 33, 'PAPUA', 'Orang/Kali', 62000, 33000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(35, 34, 'PAPUA BARAT', 'Orang/Kali', 62000, 28000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(36, 35, 'PAPUA BARAT DAYA', 'Orang/Kali', 62000, 28000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(37, 36, 'PAPUA TENGAH', 'Orang/Kali', 62000, 33000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(38, 37, 'PAPUA SELATAN', 'Orang/Kali', 92000, 49000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42'),
(39, 38, 'PAPUA PEGUNUNGAN', 'Orang/Kali', 93000, 42000, '2026', '2026-01-20 01:26:42', '2026-01-20 01:26:42');

-- --------------------------------------------------------

--
-- Table structure for table `sbm_honorarium_narasumber`
--

CREATE TABLE `sbm_honorarium_narasumber` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `golongan_jabatan` varchar(255) NOT NULL,
  `tarif_honorarium` int(11) NOT NULL,
  `tahun_anggaran` year(4) NOT NULL DEFAULT 2024,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sbm_honorarium_narasumber`
--

INSERT INTO `sbm_honorarium_narasumber` (`id`, `golongan_jabatan`, `tarif_honorarium`, `tahun_anggaran`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Menteri/Pejabat Setingkat', 1700000, '2024', 'Menteri/Pejabat Negara Lainnya/yang disetarakan', NULL, NULL),
(2, 'Pejabat Eselon I', 1400000, '2024', 'Pejabat Eselon I/yang disetarakan', NULL, NULL),
(3, 'Pejabat Eselon II', 1000000, '2024', 'Pejabat Eselon II/yang disetarakan', NULL, NULL),
(4, 'Pejabat Eselon III ke bawah', 900000, '2024', 'Pejabat Eselon III ke bawah/yang disetarakan', NULL, NULL),
(5, 'Moderator', 700000, '2024', 'Honorarium Moderator (Orang/Kali)', NULL, NULL),
(6, 'Pembawa Acara', 400000, '2024', 'Honorarium Pembawa Acara (OK)', NULL, NULL),
(7, 'Panitia Penanggung Jawab', 450000, '2024', 'Honorarium Panitia - Penanggung Jawab (OK)', NULL, NULL),
(8, 'Panitia Ketua/Wakil Ketua', 400000, '2024', 'Honorarium Panitia - Ketua/Wakil ketua (OK)', NULL, NULL),
(9, 'Panitia Sekretaris', 300000, '2024', 'Honorarium Panitia - Sekretaris (OK)', NULL, NULL),
(10, 'Panitia Anggota', 300000, '2024', 'Honorarium Panitia - Anggota (OK)', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9iAO8dQ4zhoHXqTNHJ58IsoOPvmW7A5bASFdD9gZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ05VQ3JzaGltenpEczFxZmY3d0NYZW9oQzVFanhaWHRuQzRWTnFETSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYWZ0YXIta2VnaWF0YW4vMTEvcGlsaWgtZGV0YWlsIjtzOjU6InJvdXRlIjtzOjIxOiJrZWdpYXRhbi5waWxpaC1kZXRhaWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1769351652),
('IMu7VFOc5ssQTYVGzwq3PJyuz161RNUSnamiRDS0', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVWhoUVp5SHVXaU1XVWl3RUVXcjlNVE44QmZMMDBUUlZwUEJRMTlRMiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYWZ0YXIta2VnaWF0YW4iO3M6NToicm91dGUiO3M6MTQ6ImtlZ2lhdGFuLmluZGV4Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Njt9', 1769066117),
('WOQOjPJErLRZn7nMMNvZbUTwe7vNgBteEFtwzptm', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUXVXZEpVdFdhb2NFeWRBeUloS2pRckJrS3J6VnhETVAzd0Q3YVVaMyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYWZ0YXIta2VnaWF0YW4vMTEvcGlsaWgtZGV0YWlsIjtzOjU6InJvdXRlIjtzOjIxOiJrZWdpYXRhbi5waWxpaC1kZXRhaWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Njt9', 1769100838);

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerjas`
--

CREATE TABLE `unit_kerjas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_unit` varchar(50) NOT NULL,
  `nama_unit` varchar(255) NOT NULL,
  `unor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_kerjas`
--

INSERT INTO `unit_kerjas` (`id`, `kode_unit`, `nama_unit`, `unor_id`, `created_at`, `updated_at`) VALUES
(1, 'SETJEN-ORTALA', 'Biro Organisasi dan Tata Laksana', 1, '2026-01-19 21:09:11', '2026-01-19 21:09:11'),
(2, 'SETJEN-KEUANGAN', 'Biro Keuangan', 1, '2026-01-19 21:09:11', '2026-01-19 21:09:11'),
(3, 'SETJEN-HUKUM', 'Biro Hukum', 1, '2026-01-19 21:09:11', '2026-01-19 21:09:11'),
(4, 'SETJEN-HUMAS', 'Biro Komunikasi Publik', 1, '2026-01-19 21:09:11', '2026-01-19 21:09:11'),
(5, 'ITJEN-1', 'Inspektorat I', 2, '2026-01-19 21:09:11', '2026-01-19 21:09:11'),
(6, 'ITJEN-2', 'Inspektorat II', 2, '2026-01-19 21:09:11', '2026-01-19 21:09:11'),
(7, 'ITJEN-3', 'Inspektorat III', 2, '2026-01-19 21:09:11', '2026-01-19 21:09:11'),
(8, 'SDA-TEKNIK', 'Direktorat Teknik Keairan', 3, '2026-01-19 21:09:11', '2026-01-19 21:09:11'),
(9, 'SDA-SUNGAI', 'Direktorat Bina Operasi dan Pemeliharaan Sungai', 3, '2026-01-19 21:09:11', '2026-01-19 21:09:11'),
(10, 'SDA-WADUK', 'Direktorat Bina Operasi dan Pemeliharaan Waduk', 3, '2026-01-19 21:09:11', '2026-01-19 21:09:11'),
(11, 'BM-JALAN', 'Direktorat Jalan Bebas Hambatan', 4, '2026-01-19 21:09:11', '2026-01-19 21:09:11'),
(12, 'BM-JEMBATAN', 'Direktorat Jembatan', 4, '2026-01-19 21:09:11', '2026-01-19 21:09:11'),
(13, 'BM-PEMELIHARAAN', 'Direktorat Pemeliharaan Jalan', 4, '2026-01-19 21:09:11', '2026-01-19 21:09:11'),
(14, 'CK-PENYEHATAN', 'Direktorat Penyehatan Lingkungan', 5, '2026-01-19 21:09:11', '2026-01-19 21:09:11'),
(15, 'CK-PENATAAN', 'Direktorat Penataan Bangunan', 5, '2026-01-19 21:09:11', '2026-01-19 21:09:11'),
(16, 'BK-JASA', 'Direktorat Bina Jasa Konstruksi', 6, '2026-01-19 21:09:11', '2026-01-19 21:09:11'),
(17, 'BK-KOMPETENSI', 'Direktorat Bina Kompetensi dan Produktivitas', 6, '2026-01-19 21:09:11', '2026-01-19 21:09:11'),
(18, 'BPSDM-DIKLAT', 'Pusat Pendidikan dan Pelatihan', 9, '2026-01-19 21:09:11', '2026-01-19 21:09:11'),
(19, 'BPSDM-LITBANG', 'Pusat Penelitian dan Pengembangan', 9, '2026-01-19 21:09:11', '2026-01-19 21:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `unors`
--

CREATE TABLE `unors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_unor` varchar(50) NOT NULL,
  `nama_unor` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unors`
--

INSERT INTO `unors` (`id`, `kode_unor`, `nama_unor`, `created_at`, `updated_at`) VALUES
(1, 'SETJEN', 'Sekretariat Jenderal', '2026-01-19 21:08:45', '2026-01-19 21:08:45'),
(2, 'ITJEN', 'Inspektorat Jenderal', '2026-01-19 21:08:45', '2026-01-19 21:08:45'),
(3, 'DITJEN-SDA', 'Direktorat Jenderal Sumber Daya Air', '2026-01-19 21:08:45', '2026-01-19 21:08:45'),
(4, 'DITJEN-BM', 'Direktorat Jenderal Bina Marga', '2026-01-19 21:08:45', '2026-01-19 21:08:45'),
(5, 'DITJEN-CK', 'Direktorat Jenderal Cipta Karya', '2026-01-19 21:08:45', '2026-01-19 21:08:45'),
(6, 'DITJEN-BK', 'Direktorat Jenderal Bina Konstruksi', '2026-01-19 21:08:45', '2026-01-19 21:08:45'),
(7, 'DITJEN-PS', 'Direktorat Jenderal Prasarana Strategis', '2026-01-19 21:08:45', '2026-01-19 21:08:45'),
(8, 'DITJEN-PIPU', 'Direktorat Jenderal Pembiayaan Infrastruktur Pekerjaan Umum', '2026-01-19 21:08:45', '2026-01-19 21:08:45'),
(9, 'BPSDM', 'Badan Pengembangan Sumber Daya Manusia', '2026-01-19 21:08:45', '2026-01-19 21:08:45'),
(10, 'BPIW', 'Badan Pengembangan Infrastruktur Wilayah', '2026-01-19 21:08:45', '2026-01-19 21:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('user','admin','super_admin') NOT NULL DEFAULT 'user',
  `status` enum('active','suspended') NOT NULL DEFAULT 'active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Super Administrator', 'superadmin@spj.go.id', 'super_admin', 'active', NULL, '$2y$12$1ThbopDJhbEMrn6Sxw6nz.67An7a7n4OAEtXg4nolOb49goNfsYZO', NULL, '2026-01-21 04:00:40', '2026-01-20 21:01:46'),
(7, 'Admin Unit', 'admin@spj.go.id', 'admin', 'active', NULL, '$2y$12$jQIielaAwIXqLEzkPZiBuuADdKO27NQr.Sil5QBqXAPIo2e.3TvZW', NULL, '2026-01-21 04:00:40', '2026-01-20 21:01:46'),
(8, 'Budi Santoso', 'budi@spj.go.id', 'user', 'active', NULL, '$2y$12$tGNqMTmDn3b.AVBZZabHKufVe56jHiTFeVHmgkyorGw55Zi9/ueuC', NULL, '2026-01-21 04:00:40', '2026-01-20 21:01:46'),
(10, 'Siti Rahma', 'siti@spj.go.id', 'user', 'active', NULL, '$2y$12$MpP12eFoFNP4KRPQnQ33IuM6u50SqQH4NWpEjr93sEbEQByLCJIdO', NULL, '2026-01-20 21:01:46', '2026-01-20 21:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `waktu_konsumsi`
--

CREATE TABLE `waktu_konsumsi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_waktu` varchar(255) NOT NULL,
  `kode_waktu` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `waktu_konsumsi`
--

INSERT INTO `waktu_konsumsi` (`id`, `nama_waktu`, `kode_waktu`, `created_at`, `updated_at`) VALUES
(1, 'Snack Pagi', 'snack_pagi', '2026-01-20 01:32:58', '2026-01-20 01:32:58'),
(2, 'Makan Pagi', 'makan_pagi', '2026-01-20 01:32:58', '2026-01-20 01:32:58'),
(3, 'Snack Siang', 'snack_siang', '2026-01-20 01:32:58', '2026-01-20 01:32:58'),
(4, 'Makan Siang', 'makan_siang', '2026-01-20 01:32:58', '2026-01-20 01:32:58'),
(5, 'Snack Sore', 'snack_sore', '2026-01-20 01:32:58', '2026-01-20 01:32:58'),
(6, 'Makan Sore/Malam', 'makan_sore', '2026-01-20 01:32:58', '2026-01-20 01:32:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bendaharas`
--
ALTER TABLE `bendaharas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bendaharas_nip_unique` (`nip`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kegiatans_unor_id_foreign` (`unor_id`),
  ADD KEY `kegiatans_unit_kerja_id_foreign` (`unit_kerja_id`),
  ADD KEY `kegiatans_mak_id_foreign` (`mak_id`),
  ADD KEY `kegiatans_ppk_id_foreign` (`ppk_id`),
  ADD KEY `kegiatans_provinsi_id_foreign` (`provinsi_id`),
  ADD KEY `kegiatans_bendahara_id_foreign` (`bendahara_id`);

--
-- Indexes for table `konsumsis`
--
ALTER TABLE `konsumsis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `konsumsis_kegiatan_id_foreign` (`kegiatan_id`),
  ADD KEY `konsumsis_waktu_konsumsi_id_foreign` (`waktu_konsumsi_id`);

--
-- Indexes for table `kwitansi_belanja`
--
ALTER TABLE `kwitansi_belanja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mak`
--
ALTER TABLE `mak`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mak_kode_unique` (`kode`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `narasumbers`
--
ALTER TABLE `narasumbers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `narasumbers_kegiatan_id_foreign` (`kegiatan_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `ppk`
--
ALTER TABLE `ppk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ppk_nip_unique` (`nip`);

--
-- Indexes for table `satuan_biaya_honorarium`
--
ALTER TABLE `satuan_biaya_honorarium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan_biaya_konsumsi_provinsi`
--
ALTER TABLE `satuan_biaya_konsumsi_provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sbm_honorarium_narasumber`
--
ALTER TABLE `sbm_honorarium_narasumber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `unit_kerjas`
--
ALTER TABLE `unit_kerjas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unit_kerjas_kode_unit_unique` (`kode_unit`),
  ADD KEY `unit_kerjas_unor_id_foreign` (`unor_id`);

--
-- Indexes for table `unors`
--
ALTER TABLE `unors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unors_kode_unor_unique` (`kode_unor`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `waktu_konsumsi`
--
ALTER TABLE `waktu_konsumsi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bendaharas`
--
ALTER TABLE `bendaharas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatans`
--
ALTER TABLE `kegiatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `konsumsis`
--
ALTER TABLE `konsumsis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kwitansi_belanja`
--
ALTER TABLE `kwitansi_belanja`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mak`
--
ALTER TABLE `mak`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `narasumbers`
--
ALTER TABLE `narasumbers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ppk`
--
ALTER TABLE `ppk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `satuan_biaya_honorarium`
--
ALTER TABLE `satuan_biaya_honorarium`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `satuan_biaya_konsumsi_provinsi`
--
ALTER TABLE `satuan_biaya_konsumsi_provinsi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `sbm_honorarium_narasumber`
--
ALTER TABLE `sbm_honorarium_narasumber`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `unit_kerjas`
--
ALTER TABLE `unit_kerjas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `unors`
--
ALTER TABLE `unors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `waktu_konsumsi`
--
ALTER TABLE `waktu_konsumsi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD CONSTRAINT `kegiatans_bendahara_id_foreign` FOREIGN KEY (`bendahara_id`) REFERENCES `bendaharas` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `kegiatans_mak_id_foreign` FOREIGN KEY (`mak_id`) REFERENCES `mak` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `kegiatans_ppk_id_foreign` FOREIGN KEY (`ppk_id`) REFERENCES `ppk` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `kegiatans_provinsi_id_foreign` FOREIGN KEY (`provinsi_id`) REFERENCES `satuan_biaya_konsumsi_provinsi` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `kegiatans_unit_kerja_id_foreign` FOREIGN KEY (`unit_kerja_id`) REFERENCES `unit_kerjas` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `kegiatans_unor_id_foreign` FOREIGN KEY (`unor_id`) REFERENCES `unors` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `konsumsis`
--
ALTER TABLE `konsumsis`
  ADD CONSTRAINT `konsumsis_kegiatan_id_foreign` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `konsumsis_waktu_konsumsi_id_foreign` FOREIGN KEY (`waktu_konsumsi_id`) REFERENCES `waktu_konsumsi` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `narasumbers`
--
ALTER TABLE `narasumbers`
  ADD CONSTRAINT `narasumbers_kegiatan_id_foreign` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `unit_kerjas`
--
ALTER TABLE `unit_kerjas`
  ADD CONSTRAINT `unit_kerjas_unor_id_foreign` FOREIGN KEY (`unor_id`) REFERENCES `unors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
