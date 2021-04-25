-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2021 at 01:47 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sasajade_simako`
--

-- --------------------------------------------------------

--
-- Table structure for table `idev`
--

CREATE TABLE `idev` (
  `id_idev` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_atasan` int(11) DEFAULT NULL,
  `id_tk` int(11) DEFAULT NULL,
  `id_refrr` int(255) DEFAULT NULL,
  `skor_kemungkinan` int(11) DEFAULT NULL,
  `skor_dampak` int(11) DEFAULT NULL,
  `skor_resiko` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `idev`
--

INSERT INTO `idev` (`id_idev`, `id_user`, `id_atasan`, `id_tk`, `id_refrr`, `skor_kemungkinan`, `skor_dampak`, `skor_resiko`) VALUES
(1, 3, 2, 1, 9, 3, 2, 6),
(2, 3, 2, 1, 8, 2, 1, 2),
(3, 3, 2, 1, 9, 3, 4, 12),
(4, 3, 2, 1, 9, 3, 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ref_resiko`
--

CREATE TABLE `tb_ref_resiko` (
  `id_refrr` int(11) NOT NULL,
  `id_sk` int(100) NOT NULL,
  `resiko` text NOT NULL,
  `sebab` text NOT NULL,
  `dampak` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ref_resiko`
--

INSERT INTO `tb_ref_resiko` (`id_refrr`, `id_sk`, `resiko`, `sebab`, `dampak`) VALUES
(1, 1, 'terjadinya a', 'fasfafasdf', 'dfsdafsdfsa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ref_sifat_kegiatan`
--

CREATE TABLE `tb_ref_sifat_kegiatan` (
  `id_sk` int(11) NOT NULL,
  `sifat_kegiatan` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ref_sifat_kegiatan`
--

INSERT INTO `tb_ref_sifat_kegiatan` (`id_sk`, `sifat_kegiatan`) VALUES
(1, 'PELAYANAN'),
(2, 'PENGADAAN BARANG DAN JASA'),
(3, 'DIKLAT'),
(4, 'BANSOS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat_resiko`
--

CREATE TABLE `tb_riwayat_resiko` (
  `id` int(11) NOT NULL,
  `kondisi` text NOT NULL,
  `kriteria` text NOT NULL,
  `sebab_uraian` text NOT NULL,
  `akibat` text NOT NULL,
  `saran` text NOT NULL,
  `sumber_data` text NOT NULL,
  `pernyataan_resiko` text NOT NULL,
  `sebab` text NOT NULL,
  `dampak` text NOT NULL,
  `tindak_lanjut` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_riwayat_resiko`
--

INSERT INTO `tb_riwayat_resiko` (`id`, `kondisi`, `kriteria`, `sebab_uraian`, `akibat`, `saran`, `sumber_data`, `pernyataan_resiko`, `sebab`, `dampak`, `tindak_lanjut`) VALUES
(1, 'dffsdfs sdffdsf', 'dsfsdfsd sdf ssf', 'dfdfdfs fdsfd sfsdf  sda', 'fafsdf sfsdf sdfsd fsd', 'fdfas sdf f sfsafd sdf', 'fdfsad fdsfsad fasdf sd', ' fsdfsafdsfa sdafas fsd fsadfas', ' fdsfasfdfasf dsfds sf ', 'fdsafs sdfa dffasfas ', 1),
(2, 'fdsfad dfdsf', 'fdfas dsf ', 'dffaf dsf', 'fsdf safd', 'dsffs', 'fdsfsafdasf', 'fdsfadf', 'fdfas', 'fdfasfas', 1),
(3, 'fdfas', 'fdsfasd', 'fsdfsdfa', 'fsdfas', 'dfsadf', 'dfasf', 'dfdsaf', 'dfasdf', 'sdfasdf', 1),
(4, 'fdafs', 'dsfadsf', 'dfdsafsd', 'fsdfa', 'fdaf', 'dfsaf', 'fdsafdsa', 'fdsfas', 'fsdfafsda', 1),
(5, 'nananan nene', 'fdsf', 'fsfsf', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tujuan_kegiatan`
--

CREATE TABLE `tb_tujuan_kegiatan` (
  `id_tk` int(11) NOT NULL,
  `program` text NOT NULL,
  `outcome` text NOT NULL,
  `kegiatan` text NOT NULL,
  `output` text NOT NULL,
  `tujuan` text NOT NULL,
  `id_sk` int(100) NOT NULL,
  `kode_unor` int(100) NOT NULL,
  `is_idev` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tujuan_kegiatan`
--

INSERT INTO `tb_tujuan_kegiatan` (`id_tk`, `program`, `outcome`, `kegiatan`, `output`, `tujuan`, `id_sk`, `kode_unor`, `is_idev`) VALUES
(7, 'Kegiatan Satu', '', 'Membuat kegiatan satu ', '', '', 1, 3, 1),
(8, 'Kegiatan Dua', '', 'Membuat kegiatan dua', '', '', 2, 3, 1),
(9, 'Kegiatan Tiga', '', 'Membuat kegiatan tiga', '', '', 1, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `id_atasan` varchar(100) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `id_atasan`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'PEMERINTAH KOTA BITUNG', 'asda@simako.com', '00', '$2y$10$sLY9eqOHFU7Eh5g/1apZ2e6EM/4F40M.8aJhUmLo/53IuTi/A0zKO', 1, 1, 1552120289),
(2, 'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA DAERAH KOTA BITUNG', 'bkpsdmd@simako.com', '1', '$2y$10$4SNTQ6xQp/8WNyGaqV0ixeKceXtF//hd9j.NEScTZ/TA8le431Q1.', 2, 1, 1552285263),
(3, 'BIDANG PENGEMBANGAN SDM', 'bid.psdm@simako.com', '2', '$2y$10$.gBmE36Wf5xBpNOxYB3Cqea4xXVEOf4qI8QoTybTUC6Dp4b5cUkjW', 3, 1, 1553151354),
(6, 'BADAN KEUANGAN DAN ASET DAERAH KOTA BITUNG', 'bkad@simako.com', '1', '$2y$10$Z11Np/Aq39m1JjrLrHePguNP8hajcRpsIoeL8My7jiP0ZvLaQWcK6', 2, 1, 2021),
(10, 'BIDANG INFORMASI KEPEGAWAIAN', 'bid.inka@simako.com', '2', '$2y$10$hM1/VslBvIR4huQIbMVKDuBLAA1QMpaeJ9GlSP/VffrFXs6CfiViy', 3, 1, 2021),
(11, 'INSPEKTORAT', 'inspektorat@simako.com', '00', '$2y$10$Yo2QJaziwYmG.2GtmQ1wFetrs.LfA1lMh85lYdGZYOGi96cmiCYl2', 4, 1, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(5, 1, 4),
(6, 2, 4),
(7, 3, 4),
(8, 1, 5),
(9, 2, 5),
(10, 3, 5),
(12, 4, 5),
(13, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `urutan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `urutan`) VALUES
(1, 'ASDA', 2),
(2, 'OPD', 4),
(3, 'BIDANG', 5),
(4, 'USER', 6),
(5, 'DASHBOARD', 1),
(6, 'INSPEKTORAT', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin Asda'),
(2, 'Admin OPD'),
(3, 'Admin Bidang'),
(4, 'Admin Inspektorat');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 4, 'User Management', 'user/', 'fas fa-user-cog', 1),
(2, 5, 'Dashboard', 'dashboard/', 'fas fa-tachometer-alt', 1),
(3, 6, 'Input Ref. Resiko', 'inspektorat/', 'fas fa-database', 1),
(4, 2, 'Input Riwayat Resiko', 'opd/riwayat', 'fas fa-history', 1),
(5, 2, 'List Riwayat Resiko', 'opd/listriwayat', 'fas fa-list-ul', 1),
(6, 2, 'Input Program', 'opd/inputprogram', 'fas fa-keyboard', 1),
(7, 3, 'Input Analisis Resiko', 'bidang/input', 'fas fa-highlighter', 1),
(8, 3, 'List Analisis Resiko', 'bidang/list', 'fas fa-mask', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_totalskor`
-- (See below for the actual view)
--
CREATE TABLE `v_totalskor` (
`program` text
,`outcome` text
,`kegiatan` text
,`output` text
,`tujuan` text
,`is_idev` int(2)
,`id_user` int(11)
,`id_atasan` int(11)
,`id_refrr` int(255)
,`total1` decimal(32,0)
,`total2` decimal(32,0)
,`total3` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Structure for view `v_totalskor`
--
DROP TABLE IF EXISTS `v_totalskor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_totalskor`  AS  select `tb_tujuan_kegiatan`.`program` AS `program`,`tb_tujuan_kegiatan`.`outcome` AS `outcome`,`tb_tujuan_kegiatan`.`kegiatan` AS `kegiatan`,`tb_tujuan_kegiatan`.`output` AS `output`,`tb_tujuan_kegiatan`.`tujuan` AS `tujuan`,`tb_tujuan_kegiatan`.`is_idev` AS `is_idev`,`idev`.`id_user` AS `id_user`,`idev`.`id_atasan` AS `id_atasan`,`idev`.`id_refrr` AS `id_refrr`,sum(`idev`.`skor_kemungkinan`) AS `total1`,sum(`idev`.`skor_dampak`) AS `total2`,sum(`idev`.`skor_resiko`) AS `total3` from (`tb_tujuan_kegiatan` join `idev`) where `tb_tujuan_kegiatan`.`id_tk` = `idev`.`id_tk` group by `tb_tujuan_kegiatan`.`id_tk` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `idev`
--
ALTER TABLE `idev`
  ADD PRIMARY KEY (`id_idev`);

--
-- Indexes for table `tb_ref_resiko`
--
ALTER TABLE `tb_ref_resiko`
  ADD PRIMARY KEY (`id_refrr`);

--
-- Indexes for table `tb_ref_sifat_kegiatan`
--
ALTER TABLE `tb_ref_sifat_kegiatan`
  ADD PRIMARY KEY (`id_sk`);

--
-- Indexes for table `tb_riwayat_resiko`
--
ALTER TABLE `tb_riwayat_resiko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tujuan_kegiatan`
--
ALTER TABLE `tb_tujuan_kegiatan`
  ADD PRIMARY KEY (`id_tk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `idev`
--
ALTER TABLE `idev`
  MODIFY `id_idev` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_ref_resiko`
--
ALTER TABLE `tb_ref_resiko`
  MODIFY `id_refrr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_ref_sifat_kegiatan`
--
ALTER TABLE `tb_ref_sifat_kegiatan`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_riwayat_resiko`
--
ALTER TABLE `tb_riwayat_resiko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_tujuan_kegiatan`
--
ALTER TABLE `tb_tujuan_kegiatan`
  MODIFY `id_tk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
