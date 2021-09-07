-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2021 at 08:31 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekawan_media`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id_driver` int(11) NOT NULL,
  `nama_driver` varchar(50) NOT NULL,
  `alamat_driver` varchar(100) NOT NULL,
  `status_driver` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id_driver`, `nama_driver`, `alamat_driver`, `status_driver`) VALUES
(1, 'Driver 1', 'Malang', 1),
(2, 'Driver 2', 'Malang', 1),
(3, 'Driver 3', 'Malang', 1),
(4, 'Driver 4', 'Malang', 1),
(5, 'Driver 5', 'Malang', 1),
(6, 'Driver 6', 'Malang', 1),
(8, 'Belum ada driver', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `nama_kendaraan` varchar(50) NOT NULL,
  `nomor_plat` varchar(50) NOT NULL,
  `status_kendaraan` int(11) NOT NULL,
  `status_servis` int(11) NOT NULL,
  `jadwal_servis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `nama_kendaraan`, `nomor_plat`, `status_kendaraan`, `status_servis`, `jadwal_servis`) VALUES
(1, 'BMW', 'N3555BW', 0, 0, '2021-09-07'),
(2, 'Mercedes', 'N4444U', 0, 0, '2021-09-16'),
(3, 'Toyota', 'N4123WW', 0, 0, '2021-09-15'),
(4, 'Daihatsu', 'N4421IU', 1, 0, '2021-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id_log_aktivitas` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `log_user` varchar(100) NOT NULL,
  `log_tipe` varchar(100) NOT NULL,
  `log_aksi` varchar(100) NOT NULL,
  `log_item` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id_log_aktivitas`, `tanggal`, `log_user`, `log_tipe`, `log_aksi`, `log_item`) VALUES
(2, '2021-09-07 17:09:53', 'admin', 'Login', 'Login', ''),
(3, '2021-09-07 17:09:56', 'admin', 'Login', 'Login', ''),
(4, '2021-09-07 17:09:59', 'pegawai', 'Login', 'Login', ''),
(5, '2021-09-07 17:10:01', 'admin', 'Login', 'Login', ''),
(6, '2021-09-07 17:17:45', 'admin', 'Driver', 'Insert', 'Driver 17'),
(7, '2021-09-07 17:17:51', 'admin', 'Driver', 'Update', 'Driver 18'),
(8, '2021-09-07 17:17:54', 'admin', 'Driver', 'Delete', '9'),
(9, '2021-09-07 17:20:02', 'admin', 'Kendaraan', 'Insert', 'Kendaraan 10'),
(10, '2021-09-07 17:20:10', 'admin', 'Kendaraan', 'Update', 'Kendaraan 121'),
(11, '2021-09-07 17:20:13', 'admin', 'Kendaraan', 'Delete', '7'),
(12, '2021-09-07 17:20:34', 'pegawai', 'Login', 'Login', ''),
(13, '2021-09-07 17:22:50', 'pegawai', 'Pemesanan', 'Insert', '3'),
(14, '2021-09-07 17:23:19', 'admin', 'Login', 'Login', ''),
(15, '2021-09-07 17:24:52', 'admin', 'Pemesanan', 'Konfirmasi Pemesanan (Admin)', '6'),
(16, '2021-09-07 17:25:11', 'trans', 'Login', 'Login', ''),
(17, '2021-09-07 17:26:23', 'trans', 'Pemesanan', 'Konfirmasi Pemesanan (Pihak Pertama)', '6'),
(18, '2021-09-07 17:26:38', 'transmedia', 'Login', 'Login', ''),
(19, '2021-09-07 17:26:45', 'transmedia', 'Pemesanan', 'Konfirmasi Pemesanan (Pihak Kedua)', '6'),
(20, '2021-09-07 17:27:08', 'pegawai', 'Login', 'Login', ''),
(21, '2021-09-07 17:28:51', 'pegawai', 'Pakai Kendaraan', 'Insert', '6'),
(22, '2021-09-07 17:29:08', 'admin', 'Login', 'Login', ''),
(23, '2021-09-07 17:51:34', 'pegawai', 'Login', 'Login', ''),
(24, '2021-09-07 17:52:21', 'admin', 'Login', 'Login', ''),
(25, '2021-09-07 17:53:45', 'trans', 'Login', 'Login', ''),
(26, '2021-09-07 17:55:00', 'pegawai', 'Login', 'Login', ''),
(27, '2021-09-07 18:23:50', 'pegawai', 'Login', 'Login', ''),
(28, '2021-09-07 18:26:44', 'admin', 'Login', 'Login', '');

-- --------------------------------------------------------

--
-- Table structure for table `pakai_kendaraan`
--

CREATE TABLE `pakai_kendaraan` (
  `id_pakai_kendaraan` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `konsumsi_bbm` int(11) NOT NULL,
  `tanggal_pemakaian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pakai_kendaraan`
--

INSERT INTO `pakai_kendaraan` (`id_pakai_kendaraan`, `id_pemesanan`, `konsumsi_bbm`, `tanggal_pemakaian`) VALUES
(1, 3, 5, '2021-09-07'),
(2, 3, 2, '2021-09-08'),
(3, 4, 10, '2021-09-07'),
(4, 6, 30, '2021-09-08'),
(5, 6, 30, '2021-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_driver` int(11) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `status_konfirmasi_admin` int(11) NOT NULL,
  `id_pihak_pertama` int(11) NOT NULL,
  `id_pihak_kedua` int(11) NOT NULL,
  `status_konfirmasi_pihak_pertama` int(11) NOT NULL,
  `status_konfirmasi_pihak_kedua` int(11) NOT NULL,
  `tanggal_pemesanan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_pegawai`, `id_driver`, `id_kendaraan`, `status_konfirmasi_admin`, `id_pihak_pertama`, `id_pihak_kedua`, `status_konfirmasi_pihak_pertama`, `status_konfirmasi_pihak_kedua`, `tanggal_pemesanan`) VALUES
(3, 4, 1, 1, 1, 2, 3, 1, 1, '2021-09-07'),
(4, 4, 2, 2, 1, 3, 2, 1, 1, '2021-09-07'),
(6, 4, 1, 3, 1, 2, 3, 1, 1, '2021-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `role`) VALUES
(1, 'admin', 'admin', 'ADMIN', 1),
(2, 'trans', 'trans', 'PIHAK SETUJU 1', 2),
(3, 'transmedia', 'transmedia', 'PIHAK SETUJU 2', 2),
(4, 'pegawai', 'pegawai', 'PEGAWAI', 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pemakaian_kendaraan`
-- (See below for the actual view)
--
CREATE TABLE `view_pemakaian_kendaraan` (
`id_kendaraan` int(11)
,`nama_kendaraan` varchar(50)
,`total_pemakaian` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `view_pemakaian_kendaraan`
--
DROP TABLE IF EXISTS `view_pemakaian_kendaraan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pemakaian_kendaraan`  AS  select `kendaraan`.`id_kendaraan` AS `id_kendaraan`,`kendaraan`.`nama_kendaraan` AS `nama_kendaraan`,count(`pakai_kendaraan`.`id_pakai_kendaraan`) AS `total_pemakaian` from (`kendaraan` left join (`pemesanan` left join `pakai_kendaraan` on(`pemesanan`.`id_pemesanan` = `pakai_kendaraan`.`id_pemesanan`)) on(`kendaraan`.`id_kendaraan` = `pemesanan`.`id_kendaraan`)) group by `kendaraan`.`id_kendaraan` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id_driver`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id_log_aktivitas`);

--
-- Indexes for table `pakai_kendaraan`
--
ALTER TABLE `pakai_kendaraan`
  ADD PRIMARY KEY (`id_pakai_kendaraan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id_driver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id_log_aktivitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pakai_kendaraan`
--
ALTER TABLE `pakai_kendaraan`
  MODIFY `id_pakai_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
