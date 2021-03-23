-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2021 at 06:58 AM
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
-- Table structure for table `refrr`
--

CREATE TABLE `refrr` (
  `id_refrr` int(11) NOT NULL,
  `id_sk` int(11) DEFAULT NULL,
  `resiko` text DEFAULT NULL,
  `sebab` text DEFAULT NULL,
  `dampak` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refrr`
--

INSERT INTO `refrr` (`id_refrr`, `id_sk`, `resiko`, `sebab`, `dampak`) VALUES
(1, 1, 'Terjadinya pengurusan oleh Calo/Perantara', 'Kesibukan masyarakat untuk meluangkan waktu mengurus langsung akte kelahiran', 'Masyarakat terbebani dengan biaya yang tidak semestinya'),
(2, 1, 'Terjadinya pemungutan biaya pelayanan di atas ketentuan', 'Pedoman kerja/SOP belum ada', 'Keterlambatan penyelesaian produk layanan'),
(3, 1, 'Terjadinya pemungutan biaya terhadap pelayanan yang seharusnya bebas biaya', 'Pedoman kerja/SOP tidak jelas dan multi tafsir', 'Dokumen yang dihasilkan dari kegiatan pelayanan cacat hukum/tidak dapat digunakan'),
(4, 1, 'Terjadinya kesalahan dalam inputing data', 'Kelalaian petugas pelayanan ', 'Masyarakat  tidak puas atas pelayanan yg diterima'),
(5, 1, 'Terjadinya pelayanan yang tidak sesuai prosedur/SOP', 'Kurangnya/terbatasnya dukungan alat kerja ', 'Terjadinya tututan kepada pemerintah/perangkat daerah'),
(6, 2, 'Rencana Pengadaan barang/jasa bukan berdasarkan kebutuhan/usulan pihak pengguna (user)', 'Kelalaian Tim/personil Perencana', 'Barang/jasa yang diadakan tidak termanfaatkan secara optimal '),
(7, 2, 'Penyusunan Anggaran Kebutuhan PBJ tdak wajar', 'Kelalaian Tim/personil Penyusun HPS', 'Kualitas hasil pekerjaan tidak sesuai spesifikasi kontrak'),
(8, 3, 'Jenis kegiatan tidak/kurang sesuai dengan kebutuhan', 'Tim perencana lalai', 'Kegiatan pelatihan terlambat dilaksanakan'),
(9, 3, 'Sedikitnya peminat kegiatan', 'Kegiatan Pelatihan tidak/kurang menarik', 'Kegiatan pelatihan tidak terlaksananya');

-- --------------------------------------------------------

--
-- Table structure for table `ref_sifat_kegiatan`
--

CREATE TABLE `ref_sifat_kegiatan` (
  `id_sk` int(11) NOT NULL,
  `sifat_kegiatan` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_sifat_kegiatan`
--

INSERT INTO `ref_sifat_kegiatan` (`id_sk`, `sifat_kegiatan`) VALUES
(1, 'Pelayanan'),
(2, 'PJB'),
(3, 'Diklat'),
(4, 'Bansos'),
(5, 'Pengawasan'),
(6, 'Perencanaan');

-- --------------------------------------------------------

--
-- Stand-in structure for view `totalskor`
-- (See below for the actual view)
--
CREATE TABLE `totalskor` (
`id_tk` int(11)
,`program` text
,`kegiatan` text
,`totalskor` decimal(32,0)
,`id_atasan` int(11)
,`id_user` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `tujuankegiatan`
--

CREATE TABLE `tujuankegiatan` (
  `id_tk` int(11) NOT NULL,
  `tujuan_pd` text DEFAULT NULL,
  `sasaran_pd` text DEFAULT NULL,
  `program` text DEFAULT NULL,
  `kegiatan` text DEFAULT NULL,
  `output_kegiatan` text DEFAULT NULL,
  `tujuan_kegiatan` text DEFAULT NULL,
  `id_sk` int(32) DEFAULT NULL,
  `kode_unor` int(11) DEFAULT NULL,
  `is_idev` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tujuankegiatan`
--

INSERT INTO `tujuankegiatan` (`id_tk`, `tujuan_pd`, `sasaran_pd`, `program`, `kegiatan`, `output_kegiatan`, `tujuan_kegiatan`, `id_sk`, `kode_unor`, `is_idev`) VALUES
(1, 'Meningkatkan Kualitas Kesejahteraan Sosial Masyarakat', 'Meningkatnya kesempatan kerja', 'Program Pelatihan Kerja dan Produktivitas Tenaga Kerja', 'Pelaksanaan Pendidikan dan Pelatihan Keterampilan bagi Pencari Kerja berdasarkan Klaster Kompetensi', 'Terlaksananya 5X Diklat Keterampilan untuk 500 orang peserta', 'Terlaksananya 5X Diklat Keterampilan untuk 500 orang peserta yang yang sesuai kebutuhan peserta, tepat waktu dengan 80% peserta pelatihan yg ditargetkan memahami materi pelatihan', 3, 3, 1);

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
(2, 'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA DAERAH', 'kpd@simako.com', '1', '$2y$10$N54g6lppHvajXGwt6S/QCOj5FQ4YO82fiIJ7cF10vWlpkbq8LGwi2', 2, 1, 1552285263),
(3, 'BIDANG PENGEMBANGAN SDM', 'kabid@simako.com', '2', '$2y$10$fX3ruwYrl9wUO0893rhNbeKMT2qagwr27fQ3bn1yzq4l6I3eei.F2', 3, 1, 1553151354),
(6, 'BADAN KEUANGAN DAN ASET DAERAH KOTA BITUNG', 'bkad@simako.com', '1', '$2y$10$Z11Np/Aq39m1JjrLrHePguNP8hajcRpsIoeL8My7jiP0ZvLaQWcK6', 2, 1, 2021),
(10, 'BIDANG INFORMASI KEPEGAWAIAN', 'inka@simako.com', '2', '$2y$10$D3VFKLqIiKS7JUEQlYQ3T.RNpV0.4g9VpaTXpJrQEWYbt5i1utlZi', 3, 1, 2021);

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
(10, 3, 5);

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
(2, 'OPD', 3),
(3, 'BIDANG', 4),
(4, 'USER', 5),
(5, 'DASHBOARD', 1);

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
(3, 'Admin Bidang');

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
(2, 5, 'Dashboard', 'dashboard/', 'fas fa-tachometer-alt', 1);

-- --------------------------------------------------------

--
-- Structure for view `totalskor`
--
DROP TABLE IF EXISTS `totalskor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalskor`  AS  select `tujuankegiatan`.`id_tk` AS `id_tk`,`tujuankegiatan`.`program` AS `program`,`tujuankegiatan`.`kegiatan` AS `kegiatan`,sum(`idev`.`skor_resiko`) AS `totalskor`,`idev`.`id_atasan` AS `id_atasan`,`idev`.`id_user` AS `id_user` from (`tujuankegiatan` left join `idev` on(`tujuankegiatan`.`id_tk` = `idev`.`id_tk`)) group by `tujuankegiatan`.`id_tk` <> 0 and `idev`.`id_user` <> 0 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `idev`
--
ALTER TABLE `idev`
  ADD PRIMARY KEY (`id_idev`);

--
-- Indexes for table `refrr`
--
ALTER TABLE `refrr`
  ADD PRIMARY KEY (`id_refrr`);

--
-- Indexes for table `ref_sifat_kegiatan`
--
ALTER TABLE `ref_sifat_kegiatan`
  ADD PRIMARY KEY (`id_sk`);

--
-- Indexes for table `tujuankegiatan`
--
ALTER TABLE `tujuankegiatan`
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
-- AUTO_INCREMENT for table `refrr`
--
ALTER TABLE `refrr`
  MODIFY `id_refrr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ref_sifat_kegiatan`
--
ALTER TABLE `ref_sifat_kegiatan`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tujuankegiatan`
--
ALTER TABLE `tujuankegiatan`
  MODIFY `id_tk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
