-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2021 at 11:29 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_bprmgr`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'Admin', 'Administrator'),
(2, 'Direksi', 'Direksi'),
(3, 'HRD', 'Human Resource Department'),
(4, 'Atasan', 'Atasan'),
(5, 'Supervisor', 'Supervisor'),
(6, 'Karyawan', 'Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 2),
(3, 44),
(6, 40),
(6, 42),
(6, 43),
(6, 45);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-08-30 14:03:53', 1),
(2, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-08-30 14:06:42', 1),
(3, '::1', 'tes', NULL, '2021-08-30 15:57:58', 0),
(4, '::1', 'ahdj@gmail.com', 3, '2021-08-30 15:58:19', 1),
(5, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-08-30 16:07:11', 1),
(6, '::1', 'admin', NULL, '2021-08-31 07:49:48', 0),
(7, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-08-31 07:49:54', 1),
(8, '::1', 'budi@gmail.com', 4, '2021-08-31 08:11:12', 1),
(9, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-08-31 08:11:39', 1),
(10, '::1', 'admin', NULL, '2021-08-31 08:24:54', 0),
(11, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-08-31 08:25:00', 1),
(12, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-08-31 08:36:01', 1),
(13, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-08-31 08:44:06', 1),
(14, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-09-01 08:21:56', 1),
(15, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-09-01 08:26:06', 1),
(16, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-09-01 15:02:11', 1),
(17, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-09-02 08:01:18', 1),
(18, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-09-02 15:04:31', 1),
(19, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-09-02 15:08:28', 1),
(20, '::1', 'doni@gmail.com', 38, '2021-09-02 15:16:56', 1),
(21, '::1', 'doni@gmail.com', 38, '2021-09-02 15:17:21', 1),
(22, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-09-02 15:17:34', 1),
(23, '::1', 'doni@gmail.com', 38, '2021-09-02 15:18:04', 1),
(24, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-09-02 15:24:34', 1),
(25, '::1', 'doni@gmail.com', 38, '2021-09-02 15:24:48', 1),
(26, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-09-02 15:25:18', 1),
(27, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-09-02 15:27:02', 1),
(28, '::1', 'doni@gmail.com', 38, '2021-09-02 15:27:28', 1),
(29, '::1', 'doni@gmail.com', 38, '2021-09-02 15:28:15', 1),
(30, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-09-02 15:29:49', 1),
(31, '::1', 'doni@gmail.com', 38, '2021-09-02 15:30:33', 1),
(32, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-09-02 15:34:21', 1),
(33, '::1', 'dedi@gmail.com', 39, '2021-09-02 15:46:16', 1),
(34, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-09-02 15:46:32', 1),
(35, '::1', 'dedi@gmail.com', 39, '2021-09-02 15:47:04', 1),
(36, '::1', 'dedi@gmail.com', 39, '2021-09-02 15:47:44', 1),
(37, '::1', 'dedi@gmail.com', 39, '2021-09-02 15:49:30', 1),
(38, '::1', 'dedi@gmail.com', 39, '2021-09-02 15:50:01', 1),
(39, '::1', 'dedi@gmail.com', 39, '2021-09-02 15:50:28', 1),
(40, '::1', 'dedi@gmail.com', 39, '2021-09-02 15:54:46', 1),
(41, '::1', 'dedi@gmail.com', 39, '2021-09-02 15:58:47', 1),
(42, '::1', 'dedi@gmail.com', 39, '2021-09-02 15:59:11', 1),
(43, '::1', 'doni', NULL, '2021-09-02 16:07:24', 0),
(44, '::1', 'doni@gmail.com', 38, '2021-09-02 16:07:33', 1),
(45, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-09-02 16:14:53', 1),
(46, '::1', 'doni@gmail.com', 38, '2021-09-02 16:15:48', 1),
(47, '::1', 'doni@gmail.com', 38, '2021-09-02 16:18:38', 1),
(48, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-09-02 16:25:32', 1),
(49, '::1', 'doni@gmail.com', 38, '2021-09-02 16:28:08', 1),
(50, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-09-03 08:27:27', 1),
(51, '::1', 'doni@gmail.com', 38, '2021-09-03 08:27:53', 1),
(52, '::1', 'doni@gmail.com', 38, '2021-09-03 08:28:37', 1),
(53, '::1', 'eka@gmail.com', 40, '2021-09-03 08:30:13', 1),
(54, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-09-03 08:30:41', 1),
(55, '::1', 'doni@gmail.com', 38, '2021-09-03 08:44:23', 1),
(56, '::1', 'jkkh@gmail.com', 41, '2021-09-03 13:19:07', 1),
(57, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-09-03 13:32:57', 1),
(58, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-09-08 07:48:36', 1),
(59, '::1', 'doni@gmail.com', 38, '2021-09-08 08:50:22', 1),
(60, '::1', 'reza@gmail.f', 42, '2021-09-08 08:51:40', 1),
(61, '::1', 'doni@gmail.com', 38, '2021-09-08 08:53:47', 1),
(62, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-09-08 09:03:33', 1),
(63, '::1', 'doni@gmail.com', 38, '2021-09-08 09:05:28', 1),
(64, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-09-08 09:07:43', 1),
(65, '::1', 'reza@gmail.f', 42, '2021-09-08 09:08:06', 1),
(66, '::1', 'doni@gmail.com', 38, '2021-09-08 09:09:00', 1),
(67, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-09-08 09:11:04', 1),
(68, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-09-08 10:14:43', 1),
(69, '::1', 'reza@gmail.f', 42, '2021-09-08 10:24:35', 1),
(70, '::1', 'admin', NULL, '2021-09-08 10:48:58', 0),
(71, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-09-08 10:49:14', 1),
(72, '::1', 'doni@gmail.com', 38, '2021-09-08 13:02:36', 1),
(73, '::1', 'doni', NULL, '2021-09-08 13:11:09', 0),
(74, '::1', 'dedi@gmail.com', 39, '2021-09-08 13:12:58', 1),
(75, '::1', 'eka@gmail.com', 40, '2021-09-08 13:52:03', 1),
(76, '::1', 'admin', NULL, '2021-09-09 08:14:39', 0),
(77, '::1', 'ahmadiqbalreza@gmail.com', 2, '2021-09-09 08:14:47', 1),
(78, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-09 11:18:15', 1),
(79, '::1', 'sfds@ggg.c', 44, '2021-09-09 13:02:17', 1),
(80, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-09 13:03:41', 1),
(81, '::1', 'admin', NULL, '2021-09-09 15:39:08', 0),
(82, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-09 15:39:16', 1),
(83, '::1', 'admin', NULL, '2021-09-10 07:52:02', 0),
(84, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-10 07:52:08', 1),
(85, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-10 07:56:15', 1),
(86, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-10 15:44:57', 1),
(87, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-10 15:45:31', 1),
(88, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-13 07:49:28', 1),
(89, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-14 08:09:09', 1),
(90, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-14 09:50:17', 1),
(91, '::1', 'tess@gmail.com', 44, '2021-09-14 11:19:26', 1),
(92, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-14 11:19:42', 1),
(93, '::1', 'tess@gmail.com', 44, '2021-09-14 11:20:08', 1),
(94, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-14 11:20:22', 1),
(95, '::1', 'tess@gmail.com', 44, '2021-09-14 11:27:42', 1),
(96, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-14 13:03:23', 1),
(97, '::1', 'tess@gmail.com', 44, '2021-09-14 13:25:03', 1),
(98, '::1', 'eka@gmail.com', 40, '2021-09-14 13:43:24', 1),
(99, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-14 13:46:46', 1),
(100, '::1', 'reza@gmail.f', 42, '2021-09-14 14:04:07', 1),
(101, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-14 14:06:10', 1),
(102, '::1', 'tess@gmail.com', 44, '2021-09-14 14:07:52', 1),
(103, '::1', 'reza@gmail.f', 42, '2021-09-14 14:10:21', 1),
(104, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-14 14:12:51', 1),
(105, '::1', 'admin', NULL, '2021-09-14 15:54:27', 0),
(106, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-14 15:54:33', 1),
(107, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-15 10:18:20', 1),
(108, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-16 10:54:06', 1),
(109, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-17 08:21:19', 1),
(110, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-17 14:12:11', 1),
(111, '::1', 'admin', NULL, '2021-09-19 14:16:39', 0),
(112, '::1', 'admin', NULL, '2021-09-19 14:16:45', 0),
(113, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-19 14:16:52', 1),
(114, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-20 07:53:13', 1),
(115, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-20 14:21:49', 1),
(116, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-21 07:59:17', 1),
(117, '::1', 'selly@gmail.com', 45, '2021-09-21 08:34:50', 1),
(118, '::1', 'admin', NULL, '2021-09-21 08:40:49', 0),
(119, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-21 08:40:54', 1),
(120, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-22 07:53:59', 1),
(121, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-23 08:09:59', 1),
(122, '::1', 'admin', NULL, '2021-09-24 07:51:58', 0),
(123, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-24 07:52:05', 1),
(124, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-24 08:07:10', 1),
(125, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-24 11:27:25', 1),
(126, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-25 06:27:15', 1),
(127, '192.168.1.24', 'admin', NULL, '2021-09-25 10:33:16', 0),
(128, '192.168.1.24', 'ahmadiqbal@gmail.com', 2, '2021-09-25 10:33:34', 1),
(129, '192.168.1.24', 'ahmadiqbal@gmail.com', 2, '2021-09-25 10:40:57', 1),
(130, '192.168.1.14', 'ahmadiqbal@gmail.com', 2, '2021-09-25 10:49:08', 1),
(131, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-27 09:08:44', 1),
(132, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-28 13:45:16', 1),
(133, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-29 08:44:02', 1),
(134, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-30 08:11:09', 1),
(135, '::1', 'admin', NULL, '2021-09-30 13:55:31', 0),
(136, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-30 13:55:38', 1),
(137, '::1', 'ahmadiqbalreza@gmail.com', NULL, '2021-09-30 14:12:40', 0),
(138, '::1', 'ahmadiqbalreza@gmail.com', NULL, '2021-09-30 14:12:52', 0),
(139, '::1', 'ahmadiqbal@gmail.com', 2, '2021-09-30 14:12:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manajemen_pengguna', 'Manajemen Pengguna'),
(2, 'manajemen_profil', 'Manajemen Profil');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_bc_fnb`
--

CREATE TABLE `inventaris_bc_fnb` (
  `nomor_inventaris_fnb` varchar(255) NOT NULL,
  `nomor` int(100) NOT NULL,
  `tahun` int(100) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `jumlah_unit` int(50) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `lokasi_kantor` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `last_update` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_bc_fno`
--

CREATE TABLE `inventaris_bc_fno` (
  `nomor_inventaris_fno` varchar(255) NOT NULL,
  `nomor` int(100) NOT NULL,
  `tahun` int(100) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `jumlah_unit` int(50) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `lokasi_kantor` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `last_update` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_bc_pkm`
--

CREATE TABLE `inventaris_bc_pkm` (
  `nomor_inventaris_pkm` varchar(255) NOT NULL,
  `nomor` int(100) NOT NULL,
  `tahun` int(100) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `jumlah_unit` int(50) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `lokasi_kantor` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `remark` varchar(255) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `last_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventaris_bc_pkm`
--

INSERT INTO `inventaris_bc_pkm` (`nomor_inventaris_pkm`, `nomor`, `tahun`, `deskripsi`, `kategori`, `jumlah_unit`, `lokasi`, `lokasi_kantor`, `image`, `remark`, `update_by`, `last_update`) VALUES
('BC-2015-PKM-2', 2, 2015, 'Komputer', 'PKM', 7, 'Accounting', 'Kantor', 'BC-2015-PKM-2.png', 'OK', 'Ahmad Iqbal', '2021-09-30 14:00:27'),
('BC-2018-PKM-1', 1, 2018, 'Mouse', 'PKM', 1, 'EDP', 'Kantor', 'BC-2018-PKM-1.PNG', 'OK', 'Ahmad Iqbal', '2021-09-30 15:52:11'),
('BC-2021-PKM-3', 3, 2021, 'Monitor', 'PKM', 1, 'Accounting', 'Kantor', 'BC-2021-PKM-3.png', 'OK', 'Ahmad Iqbal', '2021-09-30 15:45:10'),
('BC-2021-PKM-4', 4, 2021, 'Printer', 'PKM', 1, 'Kepatuhan', 'Kantor', 'BC-2021-PKM-4.PNG', 'OK', 'Ahmad Iqbal', '2021-09-30 15:50:47'),
('BC-2021-PKM-5', 5, 2021, 'aaaa', 'PKM', 2, 'aaaa', 'Kantor Batam Center', 'BC-2021-PKM-5.PNG', 'Repaired', 'Ahmad Iqbal', '2021-09-30 16:19:09');

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_bc_prk`
--

CREATE TABLE `inventaris_bc_prk` (
  `nomor_inventaris_prk` varchar(255) NOT NULL,
  `nomor` int(100) NOT NULL,
  `tahun` int(100) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `jumlah_unit` int(50) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `lokasi_kantor` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `last_update` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_kategori`
--

CREATE TABLE `inventaris_kategori` (
  `id` int(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventaris_kategori`
--

INSERT INTO `inventaris_kategori` (`id`, `kode`, `keterangan`) VALUES
(1, 'PKM', 'Peralatan Komputer'),
(2, 'PRK', 'Peralatan Kantor'),
(3, 'FNO', 'Furniture Non Besi'),
(4, 'FNB', 'Furniture Besi');

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
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1630306321, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_nomor_surat`
--

CREATE TABLE `tabel_nomor_surat` (
  `id` int(100) NOT NULL,
  `count` int(100) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `tahun` varchar(200) NOT NULL,
  `perihal_surat` varchar(500) NOT NULL,
  `tujuan_surat` varchar(500) NOT NULL,
  `id_pegawai` varchar(100) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `department_pegawai` varchar(100) NOT NULL,
  `tanggal_dibuat` varchar(50) NOT NULL,
  `konfirmasi` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_nomor_surat`
--

INSERT INTO `tabel_nomor_surat` (`id`, `count`, `nomor_surat`, `tahun`, `perihal_surat`, `tujuan_surat`, `id_pegawai`, `nama_pegawai`, `department_pegawai`, `tanggal_dibuat`, `konfirmasi`) VALUES
(1, 4, '004/EXT/MGR/1220', '20', 'Test', 'Test 2020', '8', 'IT', 'EDP IT', '18 December 2020', 0),
(2, 1, '001/EXT/MGR/0121', '21', 'Permohonan Lelang', 'KPKNL', '10', 'Collector', 'Collector', '06 January 2021', 0),
(3, 2, '002/EXT/MGR/0121', '21', 'Daftar Tagihan Hutang Debitur (Lelang)', 'KPKNL', '10', 'Collector', 'Collector', '06 January 2021', 0),
(4, 3, '003/EXT/MGR/0121', '21', 'Surat Pernyataan Wanprestasi Debitur', 'KPKNL', '10', 'Collector', 'Collector', '06 January 2021', 0),
(5, 4, '004/EXT/MGR/0121', '21', 'DAFTAR BARANG LELANG', 'KPKNL', '10', 'Collector', 'Collector', '06 January 2021', 1),
(6, 5, '005/EXT/MGR/0121', '21', 'SURAT KUASA LELANG', 'KPKNL', '10', 'Collector', 'Collector', '06 January 2021', 1),
(7, 6, '006/EXT/MGR/0121', '21', 'SURAT LIMIT LELANG', 'KPKNL', '10', 'Collector', 'Collector', '06 January 2021', 1),
(8, 7, '007/EXT/MGR/0121', '21', 'PERMOHONAN TRANSFER PENJUALAN HASIL LELANG', 'KPKNL', '10', 'Collector', 'Collector', '06 January 2021', 1),
(9, 8, '008/EXT/MGR/0121', '21', 'Penyampaian Laporan Stimulus Kredit atau Pembiayaan dan/ atau Penyediaan Dana Lain yang Dinilai Berd', 'OJK', '11', 'Auditor Internal', 'Auditor Internal', '07 January 2021', 1),
(10, 9, '009/EXT/MGR/0121', '21', 'Penyampaian Rincian Posisi Simpanan Bulan Desember Tahun 2020 dan Perhitungan Premi     PT BPR Majes', 'Lembaga Penjamin Simpanan', '7', 'Accounting', 'Akunting', '14 January 2021', 1),
(11, 10, '010/EXT/MGR/0121', '21', 'Surat Klarifikasi atas Perbedaan Keterangan Dokumen Klaim Asuransi Jiwa an. NENI EKA PUTRI', 'Asuransi Jasaraharja Putera', '10', 'Collector', 'Collector', '14 January 2021', 1),
(12, 11, '011/EXT/MGR/0121', '21', 'Persetujuan Kredit', 'Developer PKP & Nasabah', '9', 'Marketing', 'Manager Marketing', '15 January 2021', 1),
(13, 12, '012/EXT/MGR/0121', '21', 'Surat Persetujuan Transfer dana', 'Developer PKP', '9', 'Marketing', 'Manager Marketing', '18 January 2021', 1),
(14, 13, '013/EXT/MGR/0121', '21', 'Permohanan Penutupan Sementara Kantor BPR di Luar Hari Libur Resmi', 'OJK Kepri', '2', 'HRD', 'HRD', '18 January 2021', 1),
(15, 14, '014/EXT/MGR/0121', '21', 'Laporan Nihil atas Pemblokiran Secara Serta Merta', 'Kepala Kepolisian Negara Republik Indonesia', '1', 'Kepatuhan, Manajemen Resiko, APU&PPT', 'Kepatuhan, Manajemen Resiko, APU&PPT', '19 January 2021', 1),
(16, 15, '015/EXT/MGR/0121', '21', 'Laporan Nihil atas Pemblokiran Secara Serta Merta', 'Kepala Kepolisian Negara Republik Indonesia', '1', 'Kepatuhan, Manajemen Resiko, APU&PPT', 'Kepatuhan, Manajemen Resiko, APU&PPT', '19 January 2021', 1),
(17, 16, '016/EXT/MGR/0121', '21', 'Penyampaian Struktur Kelompok Usaha Tahunan BPR Majesty Golden Raya Tahun 2021', 'OJK Kepri', '2', 'HRD', 'HRD', '25 January 2021', 1),
(18, 17, '017/EXT/MGR/0121', '21', 'Surat Pernyataan Direktur untuk Laporan Audit Kantor Akuntan Publik', 'KAP Sandra Pracipta', '11', 'Auditor Internal', 'Auditor Internal', '25 January 2021', 1),
(19, 18, '018/EXT/MGR/0121', '21', 'Laporan Profil Risiko PT BPR Majesty Golden Raya', 'Kepala Kantor Otoritas Jasa Keuangan (OJK) Provinsi Kepulauan Riau', '1', 'Kepatuhan, Manajemen Resiko, APU&PPT', 'Kepatuhan, Manajemen Resiko, APU&PPT', '28 January 2021', 1),
(20, 19, '019/EXT/MGR/0121', '21', 'PERMOHONAN PENAWARAN PENILAIAN BANGUNAN', 'KJPP TOTO SUHARTO dan REKAN', '10', 'Collector', 'Collector', '28 January 2021', 1),
(21, 20, '020/EXT/MGR/0121', '21', 'Penyampaian Laporan pelaksanaan dan pokok-pokok hasil audit intern PT BPR Majesty Golden Raya Posisi 31 Desember 2020', 'OJK', '11', 'Auditor Internal', 'Auditor Internal', '28 January 2021', 1),
(22, 21, '021/EXT/MGR/0221', '21', 'SURAT PEMBATALAN  LELANG A,N ZAINATUN AFFIAH', 'KPKNL', '10', 'Collector', 'Collector', '01 February 2021', 1),
(23, 22, '022/EXT/MGR/0221', '21', 'SURAT PERMOHONAN LELANG A.N JUNIANTUS P.M', 'KPKNL', '10', 'Collector', 'Collector', '03 February 2021', 1),
(24, 23, '023/EXT/MGR/0221', '21', 'SURAT DAFTAR BARANG LELANG A.N JUNIANTUS P.M', 'KPKNL', '10', 'Collector', 'Collector', '03 February 2021', 1),
(25, 24, '024/EXT/MGR/0221', '21', 'SURAT KUASA LELANG A,N JUNIANTUS P.M', 'KPKNL', '10', 'Collector', 'Collector', '03 February 2021', 1),
(26, 25, '025/EXT/MGR/0221', '21', 'SURAT LIMIT LELANG A.N JUNIANTUS P.M', 'KPKNL', '10', 'Collector', 'Collector', '03 February 2021', 1),
(27, 26, '026/EXT/MGR/0221', '21', 'SURAT PERNYATAAN WANPRESTASI A.N JUNIANTUS P.M', 'KPKNL', '10', 'Collector', 'Collector', '03 February 2021', 1),
(28, 27, '027/EXT/MGR/0221', '21', 'SURAT PERMOHONAN TF LELANG A.N JUNIANTUS P.M', 'KPKNL', '10', 'Collector', 'Collector', '03 February 2021', 1),
(29, 28, '028/EXT/MGR/0221', '21', 'SURAT DAFTAR TAGIHAN DEBITUR (LELANG) A.N JUNIANTUS P.M', 'KPKNL', '10', 'Collector', 'Collector', '03 February 2021', 1),
(30, 29, '029/EXT/MGR/0221', '21', 'Pembukaan Kantor BPR Setelah Tutup di Luar Hari Libur Resmi', 'OJK Kepri', '2', 'HRD', 'HRD', '17 February 2021', 1),
(31, 30, '030/EXT/MGR/0321', '21', 'Balasan surat no.SR-67/WPJ.34/KP.02/2021', 'Direktur KPP Pratama Tanjung Pinang', '11', 'Auditor Internal', 'Auditor Internal', '01 March 2021', 1),
(32, 31, '031/EXT/MGR/0321', '21', 'Balasan surat no.SP-64/IBK/WPJ.34/2021', 'DJP Kepulauan Riau', '11', 'Auditor Internal', 'Auditor Internal', '01 March 2021', 1),
(33, 32, '032/EXT/MGR/0321', '21', 'Penyampaian Laporan Pengawasan Rencana Bisnis PT BPR Majesty Golden Raya Semester II Tahun 2020', 'OJK Kepri', '2', 'HRD', 'HRD', '04 March 2021', 1),
(34, 33, '033/EXT/MGR/0321', '21', 'SURAT PERMOHONAN PENAWARAN PENILAIAN BANGUNAN', 'KJPP TOTO SUHARTO dan REKAN', '10', 'Collector', 'Collector', '08 March 2021', 1),
(35, 34, '034/EXT/MGR/0321', '21', 'SURAT PERMOHONAN PENETAPAN LELANG A.N JUNIANTUS.P', 'KPKNL', '10', 'Collector', 'Collector', '16 March 2021', 1),
(36, 35, '035/EXT/MGR/0321', '21', 'DAFTAR TAGIHAN A.N JUNIANTUS P', 'KPKNL', '10', 'Collector', 'Collector', '16 March 2021', 1),
(37, 36, '036/EXT/MGR/0321', '21', 'DAFTAR BARANG LELANG A.N JUNIANTUS P', 'KPKNL', '10', 'Collector', 'Collector', '16 March 2021', 1),
(38, 37, '037/EXT/MGR/0321', '21', 'SURAT PERNYATAAN WANPRESTASI A.N J', 'KPKNL', '10', 'Collector', 'Collector', '16 March 2021', 1),
(39, 38, '038/EXT/MGR/0321', '21', 'SURAT KUASA LELANG A.N JUNIANTUS .P', 'KPKNL', '10', 'Collector', 'Collector', '16 March 2021', 1),
(40, 39, '039/EXT/MGR/0321', '21', 'Laporan Transaksi Keuangan Tunai (LTKT)', 'Kepala Kantor Pusat Pelaporan dan Analisis Transaksi Keuangan (PPATK)', '1', 'Kepatuhan, Manajemen Resiko, APU&PPT', 'Kepatuhan, Manajemen Resiko, APU&PPT', '16 March 2021', 0),
(41, 40, '040/EXT/MGR/0321', '21', 'SURAT LIMIT A,N JUNIANTUS .P', 'KPKNL', '10', 'Collector', 'Collector', '16 March 2021', 1),
(42, 41, '041/EXT/MGR/0321', '21', 'Laporan Publikasi Des 2020', 'OJK', '7', 'Accounting', 'Akunting', '18 March 2021', 1),
(43, 42, '042/EXT/MGR/0321', '21', 'SURAT TRANSFER PENJUALAN A,N JUNIANTUS', 'KPKNL', '10', 'Collector', 'Collector', '18 March 2021', 1),
(44, 43, '043/EXT/MGR/0321', '21', 'Laporan Keuangan Tahunan LPS', 'Lembaga Penjamin Simpanan', '7', 'Accounting', 'Akunting', '22 March 2021', 1),
(45, 44, '044/EXT/MGR/0321', '21', 'Laporan Pokok-Pokok Pelaksanaan Tugas Anggota Direksi yang Membawahkan Fungsi Kepatuhan', 'Kepala Kantor Otoritas Jasa Keuangan (OJK) Provinsi Kepulauan Riau', '1', 'Kepatuhan, Manajemen Resiko, APU&PPT', 'Kepatuhan, Manajemen Resiko, APU&PPT', '30 March 2021', 1),
(46, 45, '045/EXT/MGR/0421', '21', 'SURAT PEMBERITAHUAN LELANG A.N JUNINTUS PARDAMEAN M', 'KPKNL', '10', 'Collector', 'Collector', '07 April 2021', 1),
(47, 46, '046/EXT/MGR/0421', '21', 'SURAT PERMOHONAN LELANG KE 2 A.N EDI SUTRISNO', 'KPKNL', '10', 'Collector', 'Collector', '09 April 2021', 1),
(48, 47, '047/EXT/MGR/0421', '21', 'SURAT DAFTAR LIMIT,BARANG DAN DP LELANG A,N EDI SUTRISNO', 'KPKNL', '10', 'Collector', 'Collector', '09 April 2021', 1),
(49, 48, '048/EXT/MGR/0421', '21', 'SURAT KUASA LELANG A,N EDI SUTRISNO', 'KPKNL', '10', 'Collector', 'Collector', '09 April 2021', 1),
(50, 49, '049/EXT/MGR/0421', '21', 'SURAT PERMOHONAN TF PENJUALAN A.N EDI SUTRISNO', 'KPKNL', '10', 'Collector', 'Collector', '09 April 2021', 1),
(51, 50, '050/EXT/MGR/0421', '21', 'SURAT PERNYATAAN WANPRESTASI A.N EDI SUTRISNO', 'KPKNL', '10', 'Collector', 'Collector', '09 April 2021', 1),
(52, 51, '051/EXT/MGR/0421', '21', 'Penyampaian tentang tindak lanjut - Juniantus Pardamean Manurung dari Hasil Pemeriksaan PT BPR Majesty Golden Raya Posisi 31 Januari 2021 menunjuk surat OJK : SR-45/KO.0502/2021 tanggal 10 Maret 2021', 'OJK', '11', 'Auditor Internal', 'Auditor Internal', '12 April 2021', 1),
(53, 52, '052/EXT/MGR/0421', '21', 'Penyampaian tentang tindak lanjut - Tjang Khun Thian dari Hasil Pemeriksaan PT BPR Majesty Golden Raya Posisi 31 Januari 2021 menunjuk surat OJK : SR-45/KO.0502/2021 tanggal 10 Maret 2021', 'OJK', '11', 'Auditor Internal', 'Auditor Internal', '12 April 2021', 1),
(54, 53, '053/EXT/MGR/0421', '21', 'SURAT DAFTAR TAGIHAN A,N JUNIANTUS PARDAMEAN MANURUNG', 'KPKNL', '10', 'Collector', 'Collector', '12 April 2021', 1),
(55, 54, '054/EXT/MGR/0421', '21', 'Penyampaian Koreksi Laporan Bulanan periode Januari 2021 dan Februari 2021 dari Hasil Pemeriksaan PT BPR Majesty Golden Raya Posisi 31 Januari 2020 menunjuk surat OJK : SR-45/KO.0502/2021 tanggal 10 Maret 2021', 'OJK', '11', 'Auditor Internal', 'Auditor Internal', '13 April 2021', 1),
(56, 55, '055/EXT/MGR/0421', '21', 'Laporan Publikasi Mar 2021', 'OJK', '7', 'Accounting', 'Akunting', '14 April 2021', 1),
(57, 56, '056/EXT/MGR/0421', '21', 'Penyampaian Laporan Stimulus Kredit atau Pembiayaan dan/ atau Penyediaan Dana Lain yang Dinilai Berdasarkan Ketepatan Pembayaran serta Laporan Stimulus Kredit atau Pembiayaan Restrukturisasi Posisi Akhir Bulan Maret Tahun 2021', 'OJK', '11', 'Auditor Internal', 'Auditor Internal', '14 April 2021', 1),
(58, 57, '057/EXT/MGR/0421', '21', 'Laporan Keuangan Tahunan 2020', 'OJK', '7', 'Accounting', 'Akunting', '14 April 2021', 1),
(59, 58, '058/EXT/MGR/0421', '21', 'SURAT PERMOHONAN LELANG A,N SUSIYANI(3)', 'KPKNL', '10', 'Collector', 'Collector', '14 April 2021', 1),
(60, 59, '059/EXT/MGR/0421', '21', 'SURAT LIMIT ,BARANG DAN DP LELANG A,N SUSIYANI (3)', 'KPKNL', '10', 'Collector', 'Collector', '14 April 2021', 1),
(61, 60, '060/EXT/MGR/0421', '21', 'Penyampaian Perubahan atas Pedoman dan Kebijakan Perkreditan Bank Stimulus Perekonomian Dampak Penyebaran Corona Virus Disease 2019 Kepada Debitur PT. BPR Majesty Golden Raya', 'Kepala Kantor Otoritas Jasa Keuangan (OJK) Provinsi Kepulauan Riau', '1', 'Kepatuhan, Manajemen Resiko, APU&PPT', 'Kepatuhan, Manajemen Resiko, APU&PPT', '14 April 2021', 0),
(62, 61, '061/EXT/MGR/0421', '21', 'SURAT KUASA LELANG A.N SUSIYANI (3)', 'KPKNL', '10', 'Collector', 'Collector', '15 April 2021', 1),
(63, 62, '062/EXT/MGR/0421', '21', 'SURAT PERNYTAAN WANPRESTASI LELANG A.N SUSIYANI (3)', 'KPKNL', '10', 'Collector', 'Collector', '15 April 2021', 1),
(64, 63, '063/EXT/MGR/0421', '21', 'SURAT TF LELANG A.N SUSIYANI(3)', 'KPKNL', '10', 'Collector', 'Collector', '15 April 2021', 1),
(65, 64, '064/EXT/MGR/0421', '21', 'SURAT DAFTAR TAGIHAN LELANG A.N SUSIYANI(3)', 'KPKNL', '10', 'Collector', 'Collector', '15 April 2021', 1),
(66, 65, '065/EXT/MGR/0421', '21', 'SURAT PERNYATAAN TIDAK ADA PERUBAHAN DATA', 'KPKNL', '10', 'Collector', 'Collector', '15 April 2021', 1),
(67, 66, '066/EXT/MGR/0421', '21', 'SURAT PERMOHONAN LELANG AN, AMRULLAH', 'KPKNL', '10', 'Collector', 'Collector', '20 April 2021', 1),
(68, 67, '067/EXT/MGR/0421', '21', 'DAFTAR TAGIHAN NASBAH A,N AMRULLAH', 'KPKNL', '10', 'Collector', 'Collector', '20 April 2021', 1),
(69, 68, '068/EXT/MGR/0421', '21', 'SURAT KUASA LELANG A.N AMRULLAH', 'KPKNL', '10', 'Collector', 'Collector', '20 April 2021', 1),
(70, 69, '069/EXT/MGR/0421', '21', 'SURAT  LIMIT ,DAFTAR BARANG DAN DP LELANG A.N AMRULLAH', 'KPKNL', '10', 'Collector', 'Collector', '20 April 2021', 1),
(71, 70, '070/EXT/MGR/0421', '21', 'SURAT PERNYATAAN WANPRESTASI LELANG A.N AMRULLAH', 'KPKNL', '10', 'Collector', 'Collector', '20 April 2021', 1),
(72, 71, '071/EXT/MGR/0421', '21', 'SURAT PERMOHONAN TRNSFER HASIL LELANG A.N AMRULLAH', 'KPKNL', '10', 'Collector', 'Collector', '20 April 2021', 1),
(73, 72, '072/EXT/MGR/0421', '21', 'Laporan Nihil atas Pemblokiran Secara Serta Merta', 'Kepala Kantor Otoritas Jasa Keuangan (OJK) Provinsi Kepulauan Riau', '1', 'Kepatuhan, Manajemen Resiko, APU&PPT', 'Kepatuhan, Manajemen Resiko, APU&PPT', '26 April 2021', 0),
(74, 73, '073/EXT/MGR/0421', '21', 'Laporan Nihil atas Pemblokiran Secara Serta Merta', 'Kepala Kepolisian Negara Republik Indonesia', '1', 'Kepatuhan, Manajemen Resiko, APU&PPT', 'Kepatuhan, Manajemen Resiko, APU&PPT', '26 April 2021', 1),
(75, 74, '074/EXT/MGR/0421', '21', 'Penyampaian tentang tindak lanjut - Job Desc APU PPT atas temuan OJK pada pemeriksaan Januari 2021', 'OJK', '11', 'Auditor Internal', 'Auditor Internal', '29 April 2021', 1),
(76, 75, '075/EXT/MGR/0421', '21', 'Penyampaian tentang tindak lanjut - perubahan SK Kas Kecil atas temuan OJK pada pemeriksaan Januari 2021', 'OJK', '11', 'Auditor Internal', 'Auditor Internal', '30 April 2021', 1),
(77, 76, '076/EXT/MGR/0421', '21', 'Penyampaian tentang tindak lanjut - Berita Acara Uang Kas Kecil pada box dari Hasil Pemeriksaan PT BPR Majesty Golden Raya Posisi 31 Januari 2021 menunjuk surat OJK : SR-45/KO.0502/2021 tanggal 10 Maret 2021', 'OJK', '11', 'Auditor Internal', 'Auditor Internal', '30 April 2021', 1),
(78, 77, '077/EXT/MGR/0421', '21', 'Penyampaian tentang tindak lanjut - perubahan SK Kas Kecil atas temuan OJK pada pemeriksaan Januari 2021', 'OJK', '11', 'Auditor Internal', 'Auditor Internal', '30 April 2021', 1),
(79, 78, '078/EXT/MGR/0421', '21', 'Penyampaian tentang tindak lanjut - kelengkapan dokumen analisis Debitur an Linda atas temuan OJK pada pemeriksaan Januari 2021', 'OJK', '11', 'Auditor Internal', 'Auditor Internal', '30 April 2021', 1),
(80, 79, '079/EXT/MGR/0421', '21', 'Penyampaian tentang tindak lanjut - pembuatan SE terkait penyaluran kredit atas temuan OJK pada pemeriksaan Januari 2021', 'OJK', '11', 'Auditor Internal', 'Auditor Internal', '30 April 2021', 1),
(81, 80, '080/EXT/MGR/0421', '21', 'Penyampaian tentang tindak lanjut - pemenuhan jumlah anggota Direksi atas temuan OJK pada pemeriksaan Januari 2021', 'OJK', '11', 'Auditor Internal', 'Auditor Internal', '30 April 2021', 1),
(82, 81, '081/EXT/MGR/0521', '21', 'Permohonan Keterangan Perkembangan Eksekusi Hak Tanggungan', 'Pengacara Ibu Ade Trini Hartaty', '10', 'Collector', 'Collector', '19 May 2021', 1),
(83, 82, '082/EXT/MGR/0521', '21', 'Surat Panggilan atas Penyelesaian Kredit Bermasalah', 'Ibu HELMI AGUSTINA BR SINURAT', '10', 'Collector', 'Collector', '21 May 2021', 1),
(84, 83, '083/EXT/MGR/0521', '21', 'Surat Balasan Penawaran Harga Rumah', 'Ibu ITA SOPIANA', '10', 'Collector', 'Collector', '24 May 2021', 1),
(85, 84, '084/EXT/MGR/0521', '21', 'Laporan Nihil atas Pemblokiran Secara Serta Merta', 'Kepala Kepolisian Negara Republik Indonesia', '1', 'Kepatuhan, Manajemen Resiko, APU&PPT', 'Kepatuhan, Manajemen Resiko, APU&PPT', '24 May 2021', 1),
(86, 85, '085/EXT/MGR/0521', '21', 'JAWABAN SOMASI', 'NASABAH (AMRULLAH)', '10', 'Collector', 'Collector', '31 May 2021', 1),
(87, 86, '086/EXT/MGR/0621', '21', 'DAFTAR TAGIHAN A.N SUSIYANI', 'KPKNL', '10', 'Collector', 'Collector', '04 June 2021', 1),
(88, 87, '087/EXT/MGR/0621', '21', 'SURAT KUASA A.N SUSIYANI', 'KPKNL', '10', 'Collector', 'Collector', '04 June 2021', 1),
(89, 88, '088/EXT/MGR/0621', '21', 'DAFTAR  BARANG,HARGA LIMIT DAN UANG JAMINAN', 'KPKNL', '10', 'Collector', 'Collector', '04 June 2021', 1),
(90, 89, '089/EXT/MGR/0621', '21', 'PERMOHONAN PENETAPAN SUSIYANI', 'KPKNL', '10', 'Collector', 'Collector', '04 June 2021', 1),
(91, 90, '090/EXT/MGR/0621', '21', 'SURAT WANPRESTASI A.N SUSIYANI', 'KPKNL', '10', 'Collector', 'Collector', '04 June 2021', 1),
(92, 91, '091/EXT/MGR/0621', '21', 'PERMOHONAN TF A.N SUSIYANI', 'KPKNL', '10', 'Collector', 'Collector', '04 June 2021', 1),
(93, 92, '092/EXT/MGR/0621', '21', 'Laporan Hasil Evaluasi Dewan Pengawas Pelaksanaan Pemberian Jasa Audit', 'OJK', '11', 'Auditor Internal', 'Auditor Internal', '07 June 2021', 1),
(94, 93, '093/EXT/MGR/0621', '21', 'surat pemberitahuan lelang a.n edi suttrisno', 'NASABAH (EDI SUTRISNO)', '10', 'Collector', 'Collector', '07 June 2021', 1),
(95, 94, '094/EXT/MGR/0621', '21', 'SURAT PEMBERITAHUAN PELAKSANAAN LELANG', 'NASABAH (AMRULLAH)', '10', 'Collector', 'Collector', '11 June 2021', 1),
(96, 95, '095/EXT/MGR/0621', '21', 'SURAT DP ARIEF', 'NASABAH', '10', 'Collector', 'Collector', '23 June 2021', 1),
(97, 96, '096/EXT/MGR/0621', '21', 'Surat Pemberitahuan Lelang Ulang Eksekusi Hak Tanggungan', 'NASABAH', '10', 'Collector', 'Collector', '24 June 2021', 1),
(98, 97, '097/EXT/MGR/0621', '21', 'Penyampaian Laporan Penerapan Tata Kelola dan Hasil Penilaian Sendiri (self assessment) Penerapan Tata Kelola Tahun 2020', 'Kepala Kantor Otoritas Jasa Keuangan (OJK) Provinsi Kepulauan Riau', '1', 'Kepatuhan, Manajemen Resiko, APU&PPT', 'Kepatuhan, Manajemen Resiko, APU&PPT', '30 June 2021', 1),
(99, 98, '098/EXT/MGR/0721', '21', 'Penyampaian Laporan Stimulus Kredit atau Pembiayaan dan/ atau Penyediaan Dana Lain yang Dinilai Berdasarkan Ketepatan Pembayaran serta Laporan Stimulus Kredit atau Pembiayaan Restrukturisasi Posisi Akhir Bulan Juni Tahun 2021', 'OJK', '11', 'Auditor Internal', 'Auditor Internal', '05 July 2021', 1),
(100, 99, '099/EXT/MGR/0721', '21', 'Penyampaian Laporan Tata Kelola PT. BPR Majesty Golden Raya Tahun 2020', 'Dewan Pimpinan Pusat (DPP) Perbarindo', '1', 'Kepatuhan, Manajemen Resiko, APU&PPT', 'Kepatuhan, Manajemen Resiko, APU&PPT', '05 July 2021', 1),
(101, 100, '100/EXT/MGR/0721', '21', 'Surat Pernyataan Daftar Negara Tujuan Pelaporan', 'Untuk Pelaporan SIPINA', '9', 'Marketing', 'Manager Marketing', '07 July 2021', 1),
(102, 101, '101/EXT/MGR/0721', '21', 'Premi LPS Jul-Des 2021', 'LPS', '7', 'Accounting', 'Akunting', '12 July 2021', 1),
(103, 102, '102/EXT/MGR/0721', '21', 'Penyampaian Bukti Pelaporan Sistem Penyampaian Informasi Nasabah Asing', 'OJK', '9', 'Marketing', 'Manager Marketing', '12 July 2021', 1),
(104, 103, '103/EXT/MGR/0721', '21', 'Laporan Publikasi Jun 2021', 'OJK', '7', 'Accounting', 'Akunting', '21 July 2021', 1),
(105, 104, '104/EXT/MGR/0721', '21', 'DPLK Manulife Karyawan Yana', 'Klaim DPLK Manulife Yana', '2', 'HRD', 'HRD', '21 July 2021', 1),
(106, 105, '105/EXT/MGR/0721', '21', 'DPLK Manulife Rincian Karyawan Yana', 'CS DPLK Manulife', '2', 'HRD', 'HRD', '21 July 2021', 1),
(107, 106, '106/EXT/MGR/0721', '21', 'Laporan Profil Risiko PT BPR Majesty Golden Raya', 'Kepala Kantor Otoritas Jasa Keuangan (OJK) Provinsi Kepulauan Riau', '1', 'Kepatuhan, Manajemen Resiko, APU&PPT', 'Kepatuhan, Manajemen Resiko, APU&PPT', '27 July 2021', 1),
(108, 107, '107/EXT/MGR/0821', '21', 'SURAT PERMOHONAN PENDAFTARAN LELANG', 'NASABAH SALMIANI', '10', 'Collector', 'Collector', '03 August 2021', 1),
(109, 108, '108/EXT/MGR/0821', '21', 'Laporan Nihil atas Pemblokiran Secara Serta Merta', 'Kepala Kepolisian Negara Republik Indonesia c.q Kepala Detasemen 88 Kepolisian Negara Republik Indonesia', '1', 'Kepatuhan, Manajemen Resiko, APU&PPT', 'Kepatuhan, Manajemen Resiko, APU&PPT', '04 August 2021', 1),
(110, 109, '109/EXT/MGR/0821', '21', 'Pembatalan Asuransi Kendaraan Bermotor (Toyota Avanza)', 'Sahabat Insurance', '2', 'HRD', 'HRD', '12 August 2021', 1),
(111, 110, '110/EXT/MGR/0821', '21', 'Pemberitahuan Atas Tagihan Pajak Kendaraan Bermotor Atas Kendaraan Yang Sudah Terjual', 'Samsat Kepri Kota Batam', '2', 'HRD', 'HRD', '12 August 2021', 1),
(112, 111, '111/EXT/MGR/0821', '21', 'Laporan Pengangkatan Anggota Direksi BPR Majesty Golden Raua', 'OJK Kepri', '2', 'HRD', 'HRD', '13 August 2021', 1),
(113, 112, '112/EXT/MGR/0821', '21', 'SURAT PEMBERITAHUAN LELANG', 'DIAN AFRIANTO TARIGAN', '10', 'Collector', 'Collector', '19 August 2021', 1),
(114, 2, '2', '2', 'khj', 'kjl', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '2', 2),
(115, 2, '2', '2', 'dahj', 'jkl', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '2', 2),
(116, 2, '2', '2', 'ghjkghk', 'jkhj', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '20 August 2021', 2),
(117, 2, '2', '2', 'dsa', 'dsa', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '20 August 2021', 2),
(118, 2, '2', '2', 'asdadwqwd', 'asdc', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '20 August 2021', 2),
(119, 2, '2', '2', 'dsfsd', 'fdsf', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '20 August 2021', 2),
(120, 2, '2', '2', 'wqwq', 'wqwq', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '20 August 2021', 2),
(121, 2, '2', '2', 'hjg', 'jg', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '20 August 2021', 2),
(122, 2, '2', '2', 'sd', 'da', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '20 August 2021', 2),
(123, 2, '2', '2', 'aa', 'aa', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '23 August 2021', 2),
(124, 2, '2', '2', 'aaa', 'da', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '23 August 2021', 2),
(125, 2, '2', '2', 'sada', '', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '23 August 2021', 2),
(126, 3333, '2', '2', 'reza', 'reza', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '23 August 2021', 2),
(127, 2, '2', '2', 'asac', 'csa', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '23 August 2021', 2),
(128, 3, '2', '2', 'vx', 'vcx', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '23 August 2021', 2),
(129, 4, '4/EXT/MGR/0821', '21', 'dsab', 'er', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '23 August 2021', 2),
(130, 5, '005/EXT/MGR/0821', '21', 'dad', 'fas', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '23 August 2021', 2),
(131, 6, '006/EXT/MGR/0821', '21', 'asdsa', 'dsa', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '23 August 2021', 2),
(132, 1, '001/EXT/MGR/0821', '20', 'sa', 'vxcv', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '23 August 2021', 2),
(133, 1, '001/EXT/MGR/0821', '21', 'fse', 'df', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '23 August 2021', 2),
(134, 2, '002/EXT/MGR/0821', '21', 'dasf', 'fsa', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '23 August 2021', 2),
(135, 3, '003/EXT/MGR/0821', '21', 'vgd', 'fsd', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '23 August 2021', 2),
(136, 4, '004/EXT/MGR/0821', '21', 'asdc', 'c', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '23 August 2021', 2),
(137, 5, '005/EXT/MGR/0821', '21', 'aaaa', 'as', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '23 August 2021', 1),
(138, 6, '006/EXT/MGR/0821', '21', 'xcz', 'yut', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '23 August 2021', 1),
(139, 7, '007/EXT/MGR/0821', '21', 'aas', 's', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '24 August 2021', 1),
(140, 8, '008/EXT/MGR/0821', '21', 'g', 'j', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '24 August 2021', 1),
(141, 9, '009/EXT/MGR/0821', '21', 'Surat Keterangan', 'OJK', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '24 August 2021', 1),
(142, 10, '010/EXT/MGR/0821', '21', 'Surat Permohonan', 'BPR Kintamas', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '24 August 2021', 1),
(143, 11, '011/EXT/MGR/0821', '21', 'tesss', 'tess', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '24 August 2021', 1),
(144, 12, '012/EXT/MGR/0821', '21', 'as', 'sa', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '25 August 2021', 1),
(145, 13, '013/EXT/MGR/0821', '21', 'Sudah ada', 'satu', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '25 August 2021', 1),
(146, 14, '014/EXT/MGR/0821', '21', 'laporan dttot', 'OJK', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '25 August 2021', 1),
(147, 15, '015/EXT/MGR/0821', '21', 'tesssd', 'tess', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '25 August 2021', 1),
(148, 16, '016/EXT/MGR/0921', '21', 'rere', 'rere', '12345', 'Ahmad Iqbal Reza Fahmi', 'EDP IT', '09 September 2021', 1),
(149, 17, '017/EXT/MGR/0921', '21', 'dsaa', 'dsa', '1005133', 'Ahmad Iqbal', 'IT', '14 September 2021', 1),
(150, 18, '018/EXT/MGR/0921', '21', 'dadw', 'das', '1010', 'Testing', 'Audit Internal', '14 September 2021', 1),
(151, 19, '019/EXT/MGR/0921', '21', 'dasx', 'ca', '1005133', 'Ahmad Iqbal', 'IT', '14 September 2021', 1),
(152, 20, '020/EXT/MGR/0921', '21', 'fdsf', 'fsd', '1005133', 'Ahmad Iqbal', 'IT', '20 September 2021', 1),
(153, 21, '021/EXT/MGR/0921', '21', 'homio', 'OJK', '1005133', 'Ahmad Iqbal', 'IT', '24 September 2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_department`
--

CREATE TABLE `table_department` (
  `id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_department`
--

INSERT INTO `table_department` (`id`, `department`) VALUES
(1, 'Direktur'),
(2, 'Direktur Utama'),
(3, 'Audit Internal'),
(4, 'Marketing'),
(5, 'Operasional'),
(6, 'HRD'),
(7, 'Kepatuhan'),
(8, 'Collector'),
(9, 'Analis Kredit'),
(10, 'IT'),
(11, 'Akunting'),
(12, 'Admin Kredit'),
(13, 'Appraisal'),
(14, 'Front Liner'),
(15, 'General Affair'),
(16, 'Driver'),
(17, 'Security'),
(18, 'Office Boy');

-- --------------------------------------------------------

--
-- Table structure for table `table_karyawan`
--

CREATE TABLE `table_karyawan` (
  `id_karyawan` int(50) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `phone` int(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_karyawan`
--

INSERT INTO `table_karyawan` (`id_karyawan`, `fullname`, `username`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `phone`, `email`, `department`) VALUES
(324, 'sr', 'fsfd', 'hj', '2021-09-01', 'nk', 'm', 98, 'dsf@g.g', 'bh'),
(2000, 'kedua', 'kedua', 'Batam', '2021-09-01', 'PR', 'Bat', 988, 'kedua@gmail.com', 'Yaaaa'),
(7878, 'Bay', 'bayu', 'Batam', '2021-09-01', 'k', 'u', 989, 'bayu@gnma.c', 'Bay'),
(777777, 'tujuh', 'tujuh', 'tujuh', '2021-09-01', 'tujuh', 'tuu', 22, 'tujuh@gmail.ck', 'tujuh'),
(100000000, 'Seribu', 'seribu', 'Batan', '2021-09-01', 'Laki', 'Bat', 898, 'seribu@gmail.com', 'Ba');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_karyawan` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `tgl_lahir` varchar(255) DEFAULT NULL,
  `status_karyawan` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.png',
  `access_nomor_surat` varchar(1) NOT NULL DEFAULT '1',
  `access_inventaris` varchar(1) NOT NULL DEFAULT '0',
  `access_cuti_online` varchar(1) NOT NULL DEFAULT '0',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_karyawan`, `email`, `username`, `fullname`, `department`, `jenis_kelamin`, `tgl_lahir`, `status_karyawan`, `phone`, `user_image`, `access_nomor_surat`, `access_inventaris`, `access_cuti_online`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '1005133', 'ahmadiqbal@gmail.com', 'admin', 'Ahmad Iqbal', 'IT', 'Perempuan', '1996-12-16', 'karyawan_kontrak', '0857662671', 'default.png', '1', '1', '0', '$2y$10$t5WZb9MCGLu/r3JYssJqLeUyFP/rANvAklPw21DdRO3a774svUFd2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-08-30 14:02:00', '2021-08-30 14:02:00', NULL),
(40, '1113', 'eka@gmail.com', 'eka', 'Ekaaa', 'Collector', 'Laki-Laki', '2021-09-03', 'karyawan_kontrak', '087652565656', 'default.png', '1', '0', '0', '$2y$10$Eedv1LR.f8GnQl6GeX33uuF3gS4Wubn0Y52dgCXqbfCn5Lb6mfUAK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-03 08:29:59', '2021-09-03 08:29:59', NULL),
(42, '23123', 'reza@gmail.f', 'reza', 'reza', 'Appraisal', 'Laki-Laki', '2021-09-03', 'karyawan_kontrak', '78978', 'default.png', '1', '0', '1', '$2y$10$6lp0yqtomFnxTXV9omteb.mWHz1NzqnHNuSCKQ2/MlADrxXPKIAui', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-03 13:46:15', '2021-09-03 13:46:15', NULL),
(43, '9090', 'sembilan@fh.c', 'sembilan', 'sembilan', 'Kepatuhan', 'Laki-Laki', '', 'karyawan_kontrak', '', 'default.png', '1', '0', '0', '$2y$10$yCoWhTICA/WOe9yi7m34xeQPfyjXNXE2hfS72565WhPd6Lt00ClCm', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-03 13:50:54', '2021-09-03 13:50:54', NULL),
(44, '1010', 'tess@gmail.com', 'hrd', 'Human Resource Department', 'HRD', 'Laki-Laki', '2021-09-14', 'karyawan_tetap', '098278162', 'default.png', '1', '0', '0', '$2y$10$PPN1oJiALOwZK8WjhybNdOC2tJ.RK9812vOjO/1vRgV4HOSPN7.Sq', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-09 08:16:40', '2021-09-09 08:16:40', NULL),
(45, '89890', 'selly@gmail.com', 'selly', 'Selly', 'Akunting', 'Perempuan', '2021-09-21', 'karyawan_tetap', '08266716767', 'default.png', '1', '1', '0', '$2y$10$9V2nQtc1txn.dzB/J6yB6OiivOx88aQ4kb6Vm1ABYXsRreOxqDOx.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-21 08:34:27', '2021-09-21 08:34:27', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `inventaris_bc_fnb`
--
ALTER TABLE `inventaris_bc_fnb`
  ADD PRIMARY KEY (`nomor_inventaris_fnb`);

--
-- Indexes for table `inventaris_bc_fno`
--
ALTER TABLE `inventaris_bc_fno`
  ADD PRIMARY KEY (`nomor_inventaris_fno`);

--
-- Indexes for table `inventaris_bc_pkm`
--
ALTER TABLE `inventaris_bc_pkm`
  ADD PRIMARY KEY (`nomor_inventaris_pkm`);

--
-- Indexes for table `inventaris_bc_prk`
--
ALTER TABLE `inventaris_bc_prk`
  ADD PRIMARY KEY (`nomor_inventaris_prk`);

--
-- Indexes for table `inventaris_kategori`
--
ALTER TABLE `inventaris_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_nomor_surat`
--
ALTER TABLE `tabel_nomor_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_department`
--
ALTER TABLE `table_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_karyawan`
--
ALTER TABLE `table_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventaris_kategori`
--
ALTER TABLE `inventaris_kategori`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_nomor_surat`
--
ALTER TABLE `tabel_nomor_surat`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `table_department`
--
ALTER TABLE `table_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
