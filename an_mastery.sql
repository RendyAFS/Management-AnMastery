-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2023 at 01:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `an_mastery`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `umur` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `nama_karyawan`, `umur`, `alamat`, `nohp`, `created_at`, `updated_at`) VALUES
(1, 'Agung', 27, 'Jl. Airlangga No. 404', '08989939679', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(2, 'Mambar', 25, 'Jl. Ahmad Yani No. 202', '08264458869', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(3, 'Ipin', 27, 'Jl. Yos Sudarso No. 1515', '08938865535', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(4, 'Empi', 23, 'Jl. Ahmad Dahlan No. 1414', '08638239574', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(5, 'Rizal', 21, 'Jl. Gajah Mada No. 505', '08301417716', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(6, 'Agus', 20, 'Jl. Gajah Mada No. 505', '08224026593', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(7, 'Harno', 21, 'Jl. Sudirman No. 101', '08940972003', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(8, 'RikoA', 27, 'Jl. Airlangga No. 404', '08213783107', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(9, 'Mujib', 24, 'Jl. Sudirman No. 101', '08895352202', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(10, 'Irwan', 26, 'Jl. Airlangga No. 404', '08963458440', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(11, 'Yoga', 21, 'Jl. Ahmad Yani No. 202', '08574088879', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(12, 'Adi', 21, 'Jl. Gatot Subroto No. 303', '08953352100', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(13, 'Viki', 25, 'Jl. Diponegoro No. 1616', '08819456141', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(14, 'Arip', 20, 'Jl. Sultan Agung No. 808', '08250714463', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(15, 'Ayet', 22, 'Jl. Dr. Sutomo No. 1010', '08498212579', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(16, 'Hegler', 21, 'Jl. Sultan Agung No. 808', '08483560908', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(17, 'Mbarep', 23, 'Jl. Sudirman No. 101', '08498029900', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(18, 'Dadang', 26, 'Jl. Ahmad Dahlan No. 1414', '08716175928', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(19, 'RikoB', 23, 'Jl. Pahlawan No. 606', '08917067676', '2023-08-09 20:06:13', '2023-08-09 20:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `fabrics`
--

CREATE TABLE `fabrics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `suppliers_id` bigint(20) UNSIGNED NOT NULL,
  `type_fabrics_id` bigint(20) UNSIGNED NOT NULL,
  `type_colors_id` bigint(20) UNSIGNED NOT NULL,
  `picture_fabrics_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price_suppliers_id` bigint(20) UNSIGNED NOT NULL,
  `payments_id` bigint(20) UNSIGNED NOT NULL,
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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_08_09_015020_create_suppliers_table', 1),
(7, '2023_08_09_025430_create_type_fabrics_table', 1),
(8, '2023_08_09_040339_create_type_colors_table', 1),
(9, '2023_08_09_040810_create_employees_table', 1),
(10, '2023_08_09_042918_create_picture_fabrics_table', 1),
(11, '2023_08_09_091941_create_fabrics_table', 1),
(12, '2023_08_10_015420_create_price_suppliers_table', 1),
(13, '2023_08_10_015430_create_price_employees_table', 1),
(14, '2023_08_10_023509_create_payments_table', 1),
(15, '2023_08_10_023920_create_incomes_table', 1);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employees_id` bigint(20) UNSIGNED NOT NULL,
  `fabrics_id` bigint(20) UNSIGNED NOT NULL,
  `panjang_kain` varchar(255) NOT NULL,
  `price_employees_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `picture_fabrics`
--

CREATE TABLE `picture_fabrics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar_kain` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `picture_fabrics`
--

INSERT INTO `picture_fabrics` (`id`, `gambar_kain`, `created_at`, `updated_at`) VALUES
(1, 'Robot', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(2, 'Love', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(3, 'Kipas', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(4, 'Kelinci', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(5, 'Beruang', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(6, 'Angry Birds', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(7, 'Bulan Bintang', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(8, 'Flamboyan', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(9, 'Kenangan', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(10, 'Bawang', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(11, 'Cempaka', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(12, 'Raflesia', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(13, 'Lotus', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(14, 'Adenium', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(15, 'Rosela', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(16, 'Seruni', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(17, 'Anggrek', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(18, 'Semanggi', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(19, 'Teratai', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(20, 'Nusa Indah', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(21, 'Matahari', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(22, 'Bougenvil', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(23, 'Aster', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(24, 'Jasmin', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(25, 'Dahlia', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(26, 'Melati', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(27, 'Mawar', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(28, 'Sepatu', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(29, 'Kuncup', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(30, 'Sakura', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(31, 'Mahkota', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(32, 'Kamboja', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(33, 'Lavender', '2023-08-09 20:06:13', '2023-08-09 20:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `price_employees`
--

CREATE TABLE `price_employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `harga_karyawan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_employees`
--

INSERT INTO `price_employees` (`id`, `harga_karyawan`, `created_at`, `updated_at`) VALUES
(1, '250', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(2, '300', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(3, '350', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(4, '370', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(5, '525', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(6, '555', '2023-08-09 20:06:13', '2023-08-09 20:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `price_suppliers`
--

CREATE TABLE `price_suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `harga_supplier` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_suppliers`
--

INSERT INTO `price_suppliers` (`id`, `harga_supplier`, `created_at`, `updated_at`) VALUES
(1, '1300', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(2, '1350', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(3, '1500', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(4, '1600', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(5, '1700', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(6, '1800', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(7, '1900', '2023-08-09 20:06:13', '2023-08-09 20:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jumlah_kain` int(11) NOT NULL DEFAULT 0,
  `HGT` int(11) NOT NULL DEFAULT 0,
  `INT` int(11) NOT NULL DEFAULT 0,
  `Febri` int(11) NOT NULL DEFAULT 0,
  `TC` int(11) NOT NULL DEFAULT 0,
  `Biasa` int(11) NOT NULL DEFAULT 0,
  `Lebar` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `nama_supplier`, `alamat`, `jumlah_kain`, `HGT`, `INT`, `Febri`, `TC`, `Biasa`, `Lebar`, `created_at`, `updated_at`) VALUES
(1, 'Sunar', 'Jl. Patimura No.1, Moyoketen, Gedangsewu, Kec. Boyolangu, Kabupaten Tulungagung, Jawa Timur 66231', 34, 10, 11, 13, 0, 0, 0, '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(2, 'Yadi', 'Prayan, Sobontoro, Kec. Boyolangu, Kabupaten Tulungagung, Jawa Timur 66232', 12, 0, 0, 0, 0, 12, 0, '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(3, 'Bibit', 'WV9W+RXX, Unnamed Road, Prayan, Prayan, Sobontoro, Kec. Boyolangu, Kabupaten Tulungagung, Jawa Timur 66232', 9, 0, 0, 0, 0, 0, 9, '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(4, 'Santoso', 'Jl. Yos Sudarso Gg. 1 No.14, Prayan, Sobontoro, Kec. Boyolangu, Kabupaten Tulungagung, Jawa Timur 66232', 12, 0, 0, 0, 0, 12, 0, '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(5, 'Mail', 'Gg. 2 68-44, Botoran, Kec. Tulungagung, Kabupaten Tulungagung, Jawa Timur 66213', 14, 0, 0, 0, 0, 14, 0, '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(6, 'Yanti', 'Jl. Dr. Sutomo Gang 1 25-27, Tertek, Kec. Tulungagung, Kabupaten Tulungagung, Jawa Timur 66216', 13, 0, 0, 0, 0, 13, 0, '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(7, 'Imam', 'Jl. KH. Ilyas Habibulloh No.25, Palem, Serut, Kec. Boyolangu, Kabupaten Tulungagung, Jawa Timur 66235', 13, 0, 0, 0, 0, 13, 0, '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(8, 'Sirajudin', 'Jl. Yos Sudarso Gg. 1 No.14, Prayan, Sobontoro, Kec. Boyolangu, Kabupaten Tulungagung, Jawa Timur 66232', 13, 0, 0, 0, 13, 0, 0, '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(9, 'Udin', 'Prayan, Sobontoro, Kec. Boyolangu, Kabupaten Tulungagung, Jawa Timur 66232', 11, 0, 0, 0, 11, 0, 0, '2023-08-09 20:06:13', '2023-08-09 20:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `type_colors`
--

CREATE TABLE `type_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_warna` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_colors`
--

INSERT INTO `type_colors` (`id`, `jenis_warna`, `created_at`, `updated_at`) VALUES
(1, '1w', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(2, '2w', '2023-08-09 20:06:13', '2023-08-09 20:06:13'),
(3, '3w', '2023-08-09 20:06:13', '2023-08-09 20:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `type_fabrics`
--

CREATE TABLE `type_fabrics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_kain` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_fabrics`
--

INSERT INTO `type_fabrics` (`id`, `jenis_kain`, `created_at`, `updated_at`) VALUES
(1, 'HGT', NULL, NULL),
(2, 'INT', NULL, NULL),
(3, 'Febri', NULL, NULL),
(4, 'TC', NULL, NULL),
(5, 'Biasa', NULL, NULL),
(6, 'Lebar', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(255) NOT NULL,
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

INSERT INTO `users` (`id`, `level`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', 'a@a', NULL, '$2y$10$Lkc2.yEL6y/tccHd9w6ysuNs.lJ/XZddjuOsXVpwN8NxP7Kba5qb.', NULL, NULL, NULL),
(2, 'user', 'Rendy', 'r@r', NULL, '$2y$10$9v5089onwMh7VTEoEseMqejlFX953KVj4K2wOpkm5AR5SNRUISaeu', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fabrics`
--
ALTER TABLE `fabrics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fabrics_suppliers_id_foreign` (`suppliers_id`),
  ADD KEY `fabrics_type_fabrics_id_foreign` (`type_fabrics_id`),
  ADD KEY `fabrics_type_colors_id_foreign` (`type_colors_id`),
  ADD KEY `fabrics_picture_fabrics_id_foreign` (`picture_fabrics_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `incomes_price_suppliers_id_foreign` (`price_suppliers_id`),
  ADD KEY `incomes_payments_id_foreign` (`payments_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_employees_id_foreign` (`employees_id`),
  ADD KEY `payments_fabrics_id_foreign` (`fabrics_id`),
  ADD KEY `payments_price_employees_id_foreign` (`price_employees_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `picture_fabrics`
--
ALTER TABLE `picture_fabrics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_employees`
--
ALTER TABLE `price_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_suppliers`
--
ALTER TABLE `price_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_colors`
--
ALTER TABLE `type_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_fabrics`
--
ALTER TABLE `type_fabrics`
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
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `fabrics`
--
ALTER TABLE `fabrics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `picture_fabrics`
--
ALTER TABLE `picture_fabrics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `price_employees`
--
ALTER TABLE `price_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `price_suppliers`
--
ALTER TABLE `price_suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `type_colors`
--
ALTER TABLE `type_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type_fabrics`
--
ALTER TABLE `type_fabrics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fabrics`
--
ALTER TABLE `fabrics`
  ADD CONSTRAINT `fabrics_picture_fabrics_id_foreign` FOREIGN KEY (`picture_fabrics_id`) REFERENCES `picture_fabrics` (`id`),
  ADD CONSTRAINT `fabrics_suppliers_id_foreign` FOREIGN KEY (`suppliers_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `fabrics_type_colors_id_foreign` FOREIGN KEY (`type_colors_id`) REFERENCES `type_colors` (`id`),
  ADD CONSTRAINT `fabrics_type_fabrics_id_foreign` FOREIGN KEY (`type_fabrics_id`) REFERENCES `type_fabrics` (`id`);

--
-- Constraints for table `incomes`
--
ALTER TABLE `incomes`
  ADD CONSTRAINT `incomes_payments_id_foreign` FOREIGN KEY (`payments_id`) REFERENCES `payments` (`id`),
  ADD CONSTRAINT `incomes_price_suppliers_id_foreign` FOREIGN KEY (`price_suppliers_id`) REFERENCES `price_suppliers` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_employees_id_foreign` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `payments_fabrics_id_foreign` FOREIGN KEY (`fabrics_id`) REFERENCES `fabrics` (`id`),
  ADD CONSTRAINT `payments_price_employees_id_foreign` FOREIGN KEY (`price_employees_id`) REFERENCES `price_employees` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
