-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 04:04 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mlbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `inputan_juknis`
--

CREATE TABLE `inputan_juknis` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_juknis` int(11) NOT NULL,
  `prosedur_tetap` varchar(128) NOT NULL,
  `sikap` varchar(128) NOT NULL,
  `ucapan` varchar(128) NOT NULL,
  `pelaksana` varchar(128) NOT NULL,
  `persyaratan_perlengkapan` varchar(128) NOT NULL,
  `waktu` varchar(128) NOT NULL,
  `output` varchar(128) NOT NULL,
  `penilaian` int(11) NOT NULL,
  `minggu` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inputan_juknis`
--

INSERT INTO `inputan_juknis` (`id`, `id_juknis`, `prosedur_tetap`, `sikap`, `ucapan`, `pelaksana`, `persyaratan_perlengkapan`, `waktu`, `output`, `penilaian`, `minggu`, `bulan`, `tahun`) VALUES
(1, 1, 'tes1', 'tes1', 'tes1', 'tes1', 'tes1', 'tes1', 'tes1', 1, 1, 2, 2022),
(2, 1, 'tes2', 'tes2', 'tes2', 'tes2', 'tes2', 'tes2', 'tes2', 3, 1, 2, 2022),
(4, 1, 'tes3', 'tes3', 'tes3', 'tes3', 'tes3', 'tes3', 'tes3', 2, 1, 2, 2022),
(5, 1, 'tes4', 'tes4', 'tes4', 'tes4', 'tes4', 'tes4', 'tes4', 4, 1, 2, 2022),
(9, 4, 'oke', 'oke', 'okeo', 'oke', 'oke', 'oke', 'oke', 4, 1, 2, 2021),
(10, 4, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 4, 1, 2, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `kode_barang` varchar(128) NOT NULL,
  `merk` varchar(128) NOT NULL,
  `bahan` varchar(128) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id`, `nama_barang`, `kode_barang`, `merk`, `bahan`, `jumlah`, `score`, `unit_id`) VALUES
(1, 'Milo', '09135182ASD', 'Tess', 'Testes', 1, 125, 1),
(3, 'Meja', 'M0002', 'Informa', 'Kayu', 30, 30, 3);

-- --------------------------------------------------------

--
-- Table structure for table `juknis`
--

CREATE TABLE `juknis` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_juknis` varchar(128) NOT NULL,
  `no_juknis` varchar(128) NOT NULL,
  `tanggal_dibuat` date NOT NULL,
  `tanggal_disahkan` date NOT NULL,
  `pengertian` varchar(128) NOT NULL,
  `tujuan` varchar(128) NOT NULL,
  `dasar_hukum` varchar(128) NOT NULL,
  `kebijakan_ketentuan` varchar(128) NOT NULL,
  `unit_pihakterkait` varchar(128) NOT NULL,
  `catatan` varchar(128) NOT NULL,
  `file_juknis` varchar(128) NOT NULL,
  `user_created` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `juknis`
--

INSERT INTO `juknis` (`id`, `nama_juknis`, `no_juknis`, `tanggal_dibuat`, `tanggal_disahkan`, `pengertian`, `tujuan`, `dasar_hukum`, `kebijakan_ketentuan`, `unit_pihakterkait`, `catatan`, `file_juknis`, `user_created`) VALUES
(1, 'Juknis 1', '12351sd12', '2022-11-20', '2022-11-25', 'Tes', 'Tes', 'tes', 'tes', '2', 'tes', '1670474482_ef430834a860c6c8116f.pdf', 'Aqil Mustaqim'),
(4, 'Juknis 2', '123123124', '2022-12-09', '2022-12-10', 'asd', 'asasd', 'asd', 'asd', '3', 'asd', '1670569362_c87352a7a3d75f42eefd.pdf', 'Diana Puspita');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-11-11-004507', 'App\\Database\\Migrations\\Users', 'default', 'App', 1668127692, 1),
(2, '2022-11-11-004857', 'App\\Database\\Migrations\\UserRole', 'default', 'App', 1668127782, 2),
(3, '2022-11-15-035456', 'App\\Database\\Migrations\\Units', 'default', 'App', 1668484555, 3),
(4, '2022-11-16-043613', 'App\\Database\\Migrations\\StandarPelayanan', 'default', 'App', 1668573653, 4),
(5, '2022-11-16-050036', 'App\\Database\\Migrations\\Inventaris', 'default', 'App', 1668574936, 5),
(6, '2022-11-17-092007', 'App\\Database\\Migrations\\SPO', 'default', 'App', 1668676943, 6),
(7, '2022-11-21-115000', 'App\\Database\\Migrations\\Juknis', 'default', 'App', 1669139908, 7),
(8, '2022-11-22-175932', 'App\\Database\\Migrations\\InputanJuknis', 'default', 'App', 1669140175, 8);

-- --------------------------------------------------------

--
-- Table structure for table `spo`
--

CREATE TABLE `spo` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_spo` varchar(50) NOT NULL,
  `no_spo` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spo`
--

INSERT INTO `spo` (`id`, `nama_spo`, `no_spo`, `user_id`, `unit_id`) VALUES
(1, 'SPO PENCAIRAN DANA', '003/AKT/SPO/VI/2022', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `standar_pelayanan`
--

CREATE TABLE `standar_pelayanan` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_dokumensp` varchar(50) NOT NULL,
  `file_dokumensp` varchar(128) NOT NULL,
  `unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `standar_pelayanan`
--

INSERT INTO `standar_pelayanan` (`id`, `nama_dokumensp`, `file_dokumensp`, `unit_id`) VALUES
(1, 'Tugas Titus', '1668671299_2644c0648ca869a311d6.docx', 3),
(3, 'Pelayanan', '1668680238_12d598904274007c0617.docx', 5),
(4, 'Manual Book', '1668680271_94a757edea8c45b2504f.docx', 3);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) UNSIGNED NOT NULL,
  `units` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `units`) VALUES
(1, 'ICU'),
(2, 'Isolasi Covid'),
(3, 'Kamar Bersalin'),
(4, 'CASEMIX'),
(5, 'INTERNA');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `password`, `role_id`, `unit_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Nafi Udin', 'nafi', 'sayanafi@gmail.com', '$2y$10$jrDZjGgVQtyaokz.Fjl53uxqAJigYOjRFI5hLwt5LqpS9YvblUEmK', 1, 1, 1, '2022-11-11 08:03:25', '2022-11-11 08:03:25'),
(2, 'Aqil Mustaqim', 'aqil', 'aqilmustaqim28@gmail.com', '$2y$10$D573pZ.I2ur6g1QdpnJmmuV4UcyzKZnaFG4Tj9w5ZgM7sbm9gZ4ga', 2, 1, 1, '2022-11-11 08:03:58', '2022-11-19 16:01:56'),
(3, 'Fahmi Pradana Saputra', 'fahmi', 'fahmi@gmail.com', '$2y$10$4UoChVje6E60UG3ONpzF..CtjRZSN/9K1T89ZzoLK8WT1WLKSkcXu', 3, 2, 1, '2022-11-15 11:40:19', '2022-11-15 12:23:46'),
(5, 'Diana Puspita', 'diana', 'diana@gmail.com', '$2y$10$ZrojwVqwQ8ktnRDdtEpEgeKiIgovQ98jbKp16yR/beZU5Fx0ttzei', 3, 1, 1, '2022-11-16 09:07:39', '2022-11-16 13:13:00'),
(7, 'Yudha Anoraga', 'yudha', 'yudhaanoraga@gmail.com', '$2y$10$/H7./lcxx5IExkluGFI5ie5pzfZX8CDjmn6m/zq4PGR4Wdl3HsO3m', 4, 4, 1, '2022-11-19 16:24:23', '2022-11-19 16:24:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) UNSIGNED NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Manajemen'),
(3, 'Staff'),
(4, 'Konsultan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inputan_juknis`
--
ALTER TABLE `inputan_juknis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `juknis`
--
ALTER TABLE `juknis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spo`
--
ALTER TABLE `spo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standar_pelayanan`
--
ALTER TABLE `standar_pelayanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inputan_juknis`
--
ALTER TABLE `inputan_juknis`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `juknis`
--
ALTER TABLE `juknis`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `spo`
--
ALTER TABLE `spo`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `standar_pelayanan`
--
ALTER TABLE `standar_pelayanan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
