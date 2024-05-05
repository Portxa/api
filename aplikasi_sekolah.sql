-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 06:23 AM
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
-- Database: `aplikasi_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `absens`
--

CREATE TABLE `absens` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kelasjurusan_ta_id` int(11) NOT NULL,
  `siswakelas_id` int(11) NOT NULL,
  `absensi` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absens`
--

INSERT INTO `absens` (`id`, `tanggal`, `kelasjurusan_ta_id`, `siswakelas_id`, `absensi`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '2006-10-14', 5, 3, 'sakit', 'kangker', '2024-04-23 21:22:02', '2024-04-24 20:15:28'),
(2, '2006-10-14', 3, 6, 'hadie', '-', '2024-04-23 21:37:36', '2024-04-23 21:37:36'),
(3, '2006-10-14', 3, 6, 'hadir', '-', '2024-04-23 21:49:14', '2024-04-23 21:49:14'),
(4, '2024-04-25', 7, 4, 'hadir', '-', '2024-04-24 19:15:55', '2024-04-24 19:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `bacaans`
--

CREATE TABLE `bacaans` (
  `id` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `penulis_id` int(5) NOT NULL,
  `terbit` date NOT NULL,
  `isbn` varchar(30) NOT NULL,
  `cover` varchar(50) NOT NULL,
  `ringkasan` text NOT NULL,
  `penerbit_id` int(5) NOT NULL,
  `link` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bacaans`
--

INSERT INTO `bacaans` (`id`, `judul`, `penulis_id`, `terbit`, `isbn`, `cover`, `ringkasan`, `penerbit_id`, `link`, `created_at`, `updated_at`) VALUES
(3, 'novel', 1, '2002-02-22', 'BN908EJ87', 'novel 1', 'persahabatan', 1, 'dfkjhif9r898nrjdhf', '2024-04-23 00:42:06', '2024-04-23 00:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `image`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, '0fu3E2oSO6dBai4XOhy6YTj8HJBlbfvaAFoAUXOi.png', 'Internet', 'internet', '2024-03-04 21:19:08', '2024-03-04 21:19:08'),
(2, 'Rzlm7TcVKOJLPyjDH9aDJaP6iJSH6tQMEYpvQ4gK.png', 'Referensi Bacaan', 'referensi-bacaan', '2024-03-04 21:19:42', '2024-03-04 21:19:42'),
(3, 'aYyHxGoUC4EokbKNdriCMSSXFqZIlzZRjK5CeHeb.png', 'Akademi', 'akademi', '2024-03-04 21:20:26', '2024-03-04 21:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `website` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto_sekolah` varchar(30) NOT NULL,
  `logo` varchar(30) NOT NULL,
  `nama_kepsek` varchar(30) NOT NULL,
  `foto_kepsek` varchar(30) NOT NULL,
  `ig` varchar(30) NOT NULL,
  `fb` varchar(30) NOT NULL,
  `tiktok` varchar(30) NOT NULL,
  `yt` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `gurus`
--

CREATE TABLE `gurus` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gurus`
--

INSERT INTO `gurus` (`id`, `nama`, `alamat`, `email`, `telepon`, `created_at`, `updated_at`) VALUES
(4, 'patah', 'tajur', 'patah@gmail.com', '0876543219', '2024-04-16 19:25:59', '2024-04-16 19:26:18'),
(5, 'febri', 'cimanggu', 'feb@gmail.com', '08765432199', '2024-04-16 23:37:37', '2024-04-16 23:37:37'),
(6, 'Sri', 'Ciomas', 'Sri@gmail.com', '0812345678', '2024-04-17 19:10:52', '2024-04-17 19:10:52'),
(7, 'jujubed', 'Tajur', 'jubed@gmail.com', '0811273654', '2024-04-18 00:09:16', '2024-04-18 00:10:37'),
(8, 'Ubed', 'Jalan Baru', 'Ubed@gmail.com', '083654290', '2024-04-18 00:10:19', '2024-04-18 00:10:19'),
(9, 'asep stroberi', 'uwew 1990', 'basikal99@yuhuu.com', '088888', '2024-04-18 00:18:23', '2024-04-18 00:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pelajarans`
--

CREATE TABLE `jadwal_pelajarans` (
  `id` int(11) NOT NULL,
  `kelasjurusan_ta_id` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `pelajaran_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_pelajarans`
--

INSERT INTO `jadwal_pelajarans` (`id`, `kelasjurusan_ta_id`, `hari`, `pelajaran_id`, `guru_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 4, 'senin', 2, 2, 'wadidau', '2024-04-23 04:39:14', '2024-04-22 21:39:14');

-- --------------------------------------------------------

--
-- Table structure for table `jurusans`
--

CREATE TABLE `jurusans` (
  `id` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusans`
--

INSERT INTO `jurusans` (`id`, `jurusan`, `created_at`, `updated_at`) VALUES
(3, 'udfschdif', '2024-04-22 01:14:52', '2024-04-22 01:14:52'),
(4, 'll', '2024-04-22 01:18:53', '2024-04-22 01:18:53');

-- --------------------------------------------------------

--
-- Table structure for table `kalender_events`
--

CREATE TABLE `kalender_events` (
  `id` int(3) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  `tempat` varchar(30) NOT NULL,
  `penanggungjawab` varchar(50) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kalender_events`
--

INSERT INTO `kalender_events` (`id`, `judul`, `tanggal`, `deskripsi`, `tempat`, `penanggungjawab`, `kontak`, `created_at`, `updated_at`) VALUES
(2, 'ljhrjhuihdrt', '2024-04-24', 'jhhjdeffjhslkh', 'dfnkdsfhfkgg', 'frgrwatg4w', '085675847', '2024-04-23 20:51:53', '2024-04-23 20:51:53'),
(3, 'nenek Tasya Ulang tahun', '2024-04-25', 'HBD Nenek Tasya', 'Dereded', 'Tasya', 'tanya si devi', '2024-04-23 20:54:09', '2024-04-23 20:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `kelasjurusan_tas`
--

CREATE TABLE `kelasjurusan_tas` (
  `id` int(11) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelasjurusan_tas`
--

INSERT INTO `kelasjurusan_tas` (`id`, `tahun_ajaran`, `semester`, `kelas`, `jurusan_id`, `guru_id`, `created_at`, `updated_at`) VALUES
(2, '2022/2023', 'ganjil/genap', '10', 1, 4, '2024-04-22 00:14:56', '2024-04-22 00:14:56'),
(3, '1945/2045', 'Desimal', '15', 3, 3, '2024-04-22 01:40:01', '2024-04-22 01:40:01');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi_bks`
--

CREATE TABLE `konsultasi_bks` (
  `id` int(11) NOT NULL,
  `tujuan` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `tempat` varchar(30) NOT NULL,
  `jam` time NOT NULL,
  `siswakelas_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konsultasi_bks`
--

INSERT INTO `konsultasi_bks` (`id`, `tujuan`, `tanggal`, `status`, `tempat`, `jam`, `siswakelas_id`, `guru_id`, `created_at`, `updated_at`) VALUES
(2, 'bimbingan akademik', '2024-04-24', 'diterima', 'ruang bk', '00:00:07', 1, 1, '2024-04-23 20:56:45', '2024-04-23 20:56:45'),
(4, 'menyelesaikan masalah', '2024-04-28', 'diterima', 'ruang bk', '09:00:00', 3, 3, '2024-04-27 07:50:46', '2024-04-27 07:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `matapelajarans`
--

CREATE TABLE `matapelajarans` (
  `id` int(11) NOT NULL,
  `pelajaran` varchar(40) NOT NULL,
  `created_at` varchar(30) NOT NULL,
  `updated_at` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_01_093404_create_tags_table', 1),
(6, '2022_06_01_093500_create_categories_table', 1),
(7, '2022_06_01_093551_create_posts_table', 1),
(8, '2022_06_01_093640_post_tag', 1),
(9, '2022_06_01_093712_create_comments_table', 1),
(10, '2022_06_01_093750_create_menus_table', 1),
(11, '2022_06_01_093822_create_sliders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(3) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` text NOT NULL,
  `siswakelas_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `judul`, `tanggal`, `isi`, `siswakelas_id`, `created_at`, `updated_at`) VALUES
(4, 'apa aja', '2022-02-08', 'acara penting', 4, '2024-04-24 20:24:47', '2024-04-24 20:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penerbits`
--

CREATE TABLE `penerbits` (
  `id` int(5) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp_kantor` varchar(20) NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `telp_kontak` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penerbits`
--

INSERT INTO `penerbits` (`id`, `penerbit`, `alamat`, `telp_kantor`, `kontak`, `telp_kontak`, `created_at`, `updated_at`) VALUES
(5, 'saep', 'batutulis', '865597945748', 'jgffkyf', '870868056865', '2024-04-17 00:35:56', '2024-04-17 20:22:27'),
(7, 'ucup', 'bojong gede', '083634634646', 'ucupxl', '085766456346743', '2024-04-17 19:10:51', '2024-04-17 19:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id` int(5) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id`, `penulis`, `alamat`, `telp`, `created_at`, `updated_at`) VALUES
(17, 'ecep', 'Garut', '08977777', '2024-04-17 19:10:46', '2024-04-17 21:43:40'),
(19, 'juned', 'leuwi gajah', '8393', '2024-04-17 21:43:26', '2024-04-17 21:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `category_id`, `user_id`, `content`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Sosialisasi E-Government', 'sosialisasi-e-government', 3, 1, '<p>Sosialisasi EGovernment Sosialisasi EGovernmentSosialisasi EGovernmentSosialisasi EGovernmentSosialisasi EGovernmentSosialisasi EGovernmentSosialisasi EGovernmentSosialisasi EGovernment</p><p>Sosialisasi EGovernmentSosialisasi EGovernmentSosialisasi EGovernmentSosialisasi EGovernmentSosialisasi EGovernmentSosialisasi EGovernmentSosialisasi EGovernmentSosialisasi EGovernmentSosialisasi EGovernmentSosialisasi EGovernmentSosialisasi EGovernmentSosialisasi EGovernmentSosialisasi EGovernmentSosialisasi EGovernment Sosialisasi EGovernment</p><p>Sosialisasi EGovernment Sosialisasi EGovernment Sosialisasi EGovernment Sosialisasi EGovernment Sosialisasi EGovernment Sosialisasi EGovernment Sosialisasi EGovernment</p>', 'VDTqnP5hup845vZmlih4Z6Kw8NjhVNSiE6hANyY4.jpg', 'Sosialisasi EGovernment Sosialisasi EGovernment Sosialisasi EGovernment Sosialisasi EGovernment Sosialisasi EGovernment Sosialisasi EGovernment Sosialisasi EGovernment', '2024-03-04 22:30:47', '2024-03-04 22:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`post_id`, `tag_id`) VALUES
(1, 3),
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa_kelas`
--

CREATE TABLE `siswa_kelas` (
  `id` int(11) NOT NULL,
  `kelasjurusan_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa_kelas`
--

INSERT INTO `siswa_kelas` (`id`, `kelasjurusan_id`, `siswa_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'test', '2024-04-22 01:38:41', '2024-04-22 08:46:50'),
(5, 22, 2, '2', '2024-04-22 01:47:16', '2024-04-22 01:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'iN5uliv0n95qkhSzgyQ7gBTgWBBCvbXzvhDUhGcw.jpg', '2024-03-04 22:10:45', '2024-03-04 22:10:45'),
(2, 'ruYPJFZiTfegJxDpGHL3YqxDL5903JFHq9X01gUW.jpg', '2024-03-04 22:11:56', '2024-03-04 22:11:56'),
(3, 'l1k1fhyDGEEU6jLlD5N8PfM9WCy7uIMNx31pPbGU.jpg', '2024-03-04 22:12:55', '2024-03-04 22:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `tabungans`
--

CREATE TABLE `tabungans` (
  `id` int(11) NOT NULL,
  `nominal` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_tabungan` int(10) NOT NULL,
  `jumlah_penarikan` int(10) NOT NULL,
  `tanggal_penarikan` date NOT NULL,
  `total_penarikan` int(10) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `kelasjurusan_ta_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Komputer', 'komputer', '2024-03-04 21:29:47', '2024-03-04 21:29:47'),
(2, 'Belajar', 'belajar', '2024-03-04 21:30:09', '2024-03-04 21:30:09'),
(3, 'Teknologi', 'teknologi', '2024-03-04 21:30:22', '2024-03-04 21:30:37'),
(4, 'Pemprograman', 'pemprograman', '2024-03-04 21:31:08', '2024-03-04 21:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `tugassekolahs`
--

CREATE TABLE `tugassekolahs` (
  `id` int(11) NOT NULL,
  `pelajaran_id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `tgl_pengumpulan` date NOT NULL,
  `isi_tugas` text NOT NULL,
  `siswakelas_id` int(11) NOT NULL,
  `guru _id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2024-03-05 03:20:45', '$2y$10$0bUjfDZOFVd4jGucUxWrbOFQeeG.EGDHK2rSrpByzIxaFFbtpGk4y', NULL, '2024-03-05 03:20:45', '2024-03-05 03:20:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absens`
--
ALTER TABLE `absens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bacaans`
--
ALTER TABLE `bacaans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_pelajarans`
--
ALTER TABLE `jadwal_pelajarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kalender_events`
--
ALTER TABLE `kalender_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelasjurusan_tas`
--
ALTER TABLE `kelasjurusan_tas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konsultasi_bks`
--
ALTER TABLE `konsultasi_bks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matapelajarans`
--
ALTER TABLE `matapelajarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penerbits`
--
ALTER TABLE `penerbits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabungans`
--
ALTER TABLE `tabungans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Indexes for table `tugassekolahs`
--
ALTER TABLE `tugassekolahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absens`
--
ALTER TABLE `absens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bacaans`
--
ALTER TABLE `bacaans`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jadwal_pelajarans`
--
ALTER TABLE `jadwal_pelajarans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kalender_events`
--
ALTER TABLE `kalender_events`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelasjurusan_tas`
--
ALTER TABLE `kelasjurusan_tas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `konsultasi_bks`
--
ALTER TABLE `konsultasi_bks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `matapelajarans`
--
ALTER TABLE `matapelajarans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penerbits`
--
ALTER TABLE `penerbits`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabungans`
--
ALTER TABLE `tabungans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tugassekolahs`
--
ALTER TABLE `tugassekolahs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
