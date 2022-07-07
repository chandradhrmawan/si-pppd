-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2022 at 01:15 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipppd`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_detail_menu`
--

CREATE TABLE `mst_detail_menu` (
  `id` int(11) NOT NULL,
  `id_menu` varchar(255) DEFAULT NULL,
  `slug_url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_detail_menu`
--

INSERT INTO `mst_detail_menu` (`id`, `id_menu`, `slug_url`, `title`, `status`, `icon`, `role`) VALUES
(1, '7', 'master/pelanggaran', 'Ref Pelanggaran', '2', NULL, '1'),
(2, '7', 'master/tindakan', 'Ref Tindakan', '2', NULL, '1'),
(7, '7', 'master/users', 'Users', '2', NULL, '1'),
(8, '7', 'master/jabatan', 'Jabatan', '2', NULL, '1'),
(10, '7', 'master/role', 'Role', '2', NULL, '1'),
(13, '17', 'laporan/Kegiatan', 'Laporan Kegiatan', '2', NULL, '1,2,3,4'),
(14, '17', 'laporan/Pelanggaran', 'Laporan Pelanggaran', '2', NULL, '1,2,3,4'),
(21, '17', 'laporan/Tugas', 'Laporan Surat Tugas', '2', NULL, '1,2,3,4'),
(22, '17', 'laporan/Pelanggaran/rekap', 'Laporan Rekap Pelanggaran', '2', NULL, '1,2,3,4'),
(23, '17', 'laporan/Users', 'Laporan User', '2', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_jabatan`
--

CREATE TABLE `mst_jabatan` (
  `id_jabatan` int(255) NOT NULL,
  `nm_jabatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_jabatan`
--

INSERT INTO `mst_jabatan` (`id_jabatan`, `nm_jabatan`) VALUES
(1, 'Admin'),
(9, 'Anggota');

-- --------------------------------------------------------

--
-- Table structure for table `mst_menu`
--

CREATE TABLE `mst_menu` (
  `id` int(11) NOT NULL,
  `slug_url` varchar(225) NOT NULL,
  `title` varchar(225) NOT NULL,
  `status` int(1) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_menu`
--

INSERT INTO `mst_menu` (`id`, `slug_url`, `title`, `status`, `icon`, `role`) VALUES
(1, 'transaksi/tugas', 'Surat Tugas', 2, 'fa fa-files-o', '1,2'),
(2, 'transaksi/kegiatan', 'Kegiatan', 2, 'fa fa-desktop', '1,3,4'),
(3, 'transaksi/pelanggaran', 'Pelanggaran', 2, 'fa fa-cog', '1,3,4'),
(7, '#', 'Master', 2, 'fa fa-database', '1'),
(17, '#', 'Laporan', 2, 'fa fa-file', '1,2,3,4'),
(18, 'login/auth/doLogout', 'Logout', 2, 'fa fa-trash', '1,4,5');

-- --------------------------------------------------------

--
-- Table structure for table `mst_pelanggaran`
--

CREATE TABLE `mst_pelanggaran` (
  `kd_pelanggaran` int(11) NOT NULL,
  `nm_pelanggaran` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_pelanggaran`
--

INSERT INTO `mst_pelanggaran` (`kd_pelanggaran`, `nm_pelanggaran`, `is_active`) VALUES
(1, 'Pelanggaran Ringan', 1),
(2, 'Pelanggaran Sedang', 1),
(3, 'Pelanggaran Berat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_role`
--

CREATE TABLE `mst_role` (
  `id_role` int(255) NOT NULL,
  `nm_role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_role`
--

INSERT INTO `mst_role` (`id_role`, `nm_role`) VALUES
(1, 'Admin'),
(2, 'Camat'),
(3, 'Personil satpol PP'),
(4, 'Kasi Trantib');

-- --------------------------------------------------------

--
-- Table structure for table `mst_tindakan`
--

CREATE TABLE `mst_tindakan` (
  `kd_tindakan` int(11) NOT NULL,
  `nm_tindakan` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_tindakan`
--

INSERT INTO `mst_tindakan` (`kd_tindakan`, `nm_tindakan`, `is_active`) VALUES
(1, 'Peringatan', 1),
(2, 'Denda', 1),
(3, 'Pembinaan', 1),
(4, 'Penangkapan', 1),
(5, 'Penyitaan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_tipe`
--

CREATE TABLE `mst_tipe` (
  `id_tipe` int(255) NOT NULL,
  `nm_tipe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_tipe`
--

INSERT INTO `mst_tipe` (`id_tipe`, `nm_tipe`) VALUES
(1, 'Tank'),
(2, 'Truck'),
(3, 'Minivan'),
(4, 'Bus');

-- --------------------------------------------------------

--
-- Table structure for table `mst_users`
--

CREATE TABLE `mst_users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `id_jabatan` int(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `id_role` int(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_users`
--

INSERT INTO `mst_users` (`id_user`, `nama`, `username`, `password`, `nip`, `id_jabatan`, `status`, `id_role`, `alamat`) VALUES
(6, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1231', 1, '1', 1, 'jakarta'),
(7, 'Petugas Camat', 'camat', '21232f297a57a5a743894a0e4a801fc3', '1231', 9, '1', 2, 'jakarta'),
(8, 'Petugas Personil satpol PP', 'satpol', '21232f297a57a5a743894a0e4a801fc3', '1231', 9, '1', 3, 'jakarta'),
(9, 'Petugas Kasi Trantib', 'kasi', '21232f297a57a5a743894a0e4a801fc3', '1231', 9, '1', 4, 'jakarta'),
(10, 'satpol1', 'satpol1', '21232f297a57a5a743894a0e4a801fc3', '105133', 9, '1', 3, 'satpol');

-- --------------------------------------------------------

--
-- Table structure for table `tx_kegiatan`
--

CREATE TABLE `tx_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `tanggal_kegiatan` datetime DEFAULT NULL,
  `id_surat_tugas` int(11) DEFAULT NULL,
  `jenis_kegiatan` varchar(100) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `tindak_lanjut` varchar(100) DEFAULT NULL,
  `keterangan` varchar(1000) DEFAULT NULL,
  `waktu_simpan` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tx_kegiatan`
--

INSERT INTO `tx_kegiatan` (`id_kegiatan`, `tanggal_kegiatan`, `id_surat_tugas`, `jenis_kegiatan`, `lokasi`, `tindak_lanjut`, `keterangan`, `waktu_simpan`) VALUES
(1, '2022-04-30 07:02:58', 1, 'Operasi Zebra', 'Jakarta', 'Segera', NULL, '2022-04-30 07:02:58'),
(2, '2022-04-30 07:02:58', 10, 'Operasi Covid', 'Jakarta', 'bersih2', NULL, '2022-04-30 07:02:58'),
(4, '2022-05-06 00:00:00', 10, 'test12332', 'test123123', 'coba', '3_-Surat-Dinas-Sekolah.jpg', '2022-05-05 00:47:54'),
(5, '2022-05-06 00:00:00', 10, 'test001', 'test001', 'test001', 'surat_test.jpg', '2022-05-05 01:03:19'),
(6, '2022-05-09 00:00:00', 9, 'razia masker', 'jakarta', 'denda', 'surat_test1.jpg', '2022-05-08 15:19:56'),
(7, '2022-05-14 00:00:00', 10, 'test', 'test', '', 'surat_test2.jpg', '2022-05-14 15:11:02'),
(8, '2022-05-14 00:00:00', 10, 'test', 'test', '<p>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s</p>\r\n', 'surat_test3.jpg', '2022-05-14 15:12:36'),
(9, '2022-06-06 00:00:00', 10, '123', '123213', '<p>2222</p>\r\n', NULL, '2022-06-05 11:56:03'),
(10, '2022-07-07 00:00:00', 13, 'TEST', 'TEST', '<p>TEST</p>\r\n', NULL, '2022-07-06 15:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `tx_pelanggaran`
--

CREATE TABLE `tx_pelanggaran` (
  `id_pelanggaran` int(11) NOT NULL,
  `id_kegiatan` bigint(20) DEFAULT NULL,
  `no_ktp` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `pendidikan` varchar(100) DEFAULT NULL,
  `perkerjaan` varchar(100) DEFAULT NULL,
  `status_kawin` varchar(100) DEFAULT NULL,
  `jenis_pelanggaran` varchar(100) DEFAULT NULL,
  `kd_tindakan` int(11) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `tanggal_pelanggaran` date DEFAULT NULL,
  `waktu_rekam` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tx_pelanggaran`
--

INSERT INTO `tx_pelanggaran` (`id_pelanggaran`, `id_kegiatan`, `no_ktp`, `nama`, `alamat`, `pendidikan`, `perkerjaan`, `status_kawin`, `jenis_pelanggaran`, `kd_tindakan`, `lokasi`, `tanggal_pelanggaran`, `waktu_rekam`) VALUES
(1, 1, 'test', 'test', 'test', 'test', 'test', '1', '1', 1, 'test', '2022-04-30', '2022-04-30 05:43:29'),
(2, 1, '156846896846846878448', 'Agus', 'Jakarta', 'SD', '-', '0', '1', 3, 'lampu merah sunter', '2022-04-30', '2022-04-30 05:53:10'),
(3, 1, '12381367712637126 test edit', 'Surya test edit', 'bogor test edit', 'SMA test edit', '-', '1', '1', 4, 'jalan raya bogor test edit', '2022-04-30', '2022-04-30 06:02:04'),
(4, 2, '155489999', 'Arif', 'jakarta', 'SD', '-', '1', '3', 4, 'jalan lurus', '2022-04-29', '2022-04-30 07:44:45'),
(5, 5, '123213123', 'ddd', 'dddd', 'dddd', 'dddd', '0', '2', 5, 'dddd', '2022-05-28', '2022-05-04 18:56:46'),
(6, 6, '68786868778888', 'Agus', 'jakarta', 'S1', '-', '1', '1', 2, 'jakrta', '2022-05-08', '2022-05-08 08:21:32'),
(7, 5, '123123', '12312', '3123123', '123123', '123123', '0', '2', 3, '123123', '2022-06-05', '2022-06-05 04:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `tx_surat_tugas`
--

CREATE TABLE `tx_surat_tugas` (
  `id_surat_tugas` bigint(20) NOT NULL,
  `nomor_surat_tugas` varchar(100) DEFAULT NULL,
  `dasar_kegiatan` text,
  `id_user` text,
  `tujuan_kegiatan` text,
  `is_active` tinyint(1) DEFAULT '1',
  `waktu_rekam` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `waktu_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tx_surat_tugas`
--

INSERT INTO `tx_surat_tugas` (`id_surat_tugas`, `nomor_surat_tugas`, `dasar_kegiatan`, `id_user`, `tujuan_kegiatan`, `is_active`, `waktu_rekam`, `waktu_update`) VALUES
(1, '001/AA/BB', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget neque vehicula, aliquam ligula non, vulputate odio. Proin at aliquet diam, ut viverra erat. Duis dignissim, nibh id blandit consequat, libero nisl ullamcorper elit, ac eleifend mauris nulla et nunc. Duis ac ullamcorper orci, nec scelerisque massa. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Integer hendrerit maximus nisi, bibendum lobortis tortor interdum at. Suspendisse aliquam nulla ut mi euismod, non vehicula lectus commodo. Sed mattis aliquet velit.\r\n\r\nNullam aliquet facilisis leo, ut consectetur justo dapibus ut. Duis lobortis imperdiet nisl, blandit ultricies mauris. Proin luctus arcu et massa scelerisque dignissim in ut erat. Fusce aliquet hendrerit porta. Fusce at risus id nibh auctor porta et id metus. Aenean ut ipsum ut turpis venenatis placerat non ac velit. Duis quam tellus, gravida nec turpis vitae, condimentum euismod mauris. Sed feugiat, lectus pellentesque tincidunt gravida, erat dui congue odio, rhoncus facilisis mauris velit non massa. Quisque tristique ipsum sit amet pharetra suscipit. Duis ut velit mi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum id posuere nibh, porttitor ullamcorper magna. Nunc hendrerit nulla orci, eget placerat odio tristique eget. Nam et est sit amet nisl sagittis vulputate.\r\n\r\nEtiam finibus euismod sapien, vitae scelerisque tellus aliquet eget. In tortor nisi, porta a rutrum nec, interdum a nibh. Nam gravida leo a neque mattis sodales. Aenean eu mi massa. Maecenas semper ut turpis et pulvinar. Duis at pharetra enim. Aliquam ac nisi maximus, porta metus sed, finibus diam. Integer non faucibus eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce vel eleifend mi. Sed semper, neque non accumsan mattis, tortor eros tristique nulla, et dapibus lectus ante at purus.\r\n\r\nPhasellus non diam vehicula, congue massa blandit, laoreet tortor. Ut aliquet ipsum sit amet purus sagittis, id feugiat dui dignissim. Nam diam lacus, pellentesque ut purus ut, ultricies tincidunt nisi. Vivamus varius aliquet tristique. Suspendisse id ante nec libero pretium consectetur eu quis tortor. Curabitur sit amet porta elit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam non lectus orci. Phasellus pretium tincidunt libero, sed tempus urna.\r\n\r\nNunc elementum velit sed enim ornare, ac placerat magna feugiat. Cras ante ante, rhoncus a mauris ac, aliquet ultricies augue. Sed pellentesque ex id tellus iaculis scelerisque. Integer lacinia volutpat sollicitudin. Vestibulum mi metus, condimentum non dictum sit amet, tincidunt at erat. Nullam pharetra magna ante, et condimentum diam condimentum ut. Integer vehicula magna eu vehicula volutpat. Sed ultricies pulvinar purus a feugiat.', '[\"6\"]', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget neque vehicula, aliquam ligula non, vulputate odio. Proin at aliquet diam, ut viverra erat. Duis dignissim, nibh id blandit consequat, libero nisl ullamcorper elit, ac eleifend mauris nulla et nunc. Duis ac ullamcorper orci, nec scelerisque massa. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Integer hendrerit maximus nisi, bibendum lobortis tortor interdum at. Suspendisse aliquam nulla ut mi euismod, non vehicula lectus commodo. Sed mattis aliquet velit.\r\n\r\nNullam aliquet facilisis leo, ut consectetur justo dapibus ut. Duis lobortis imperdiet nisl, blandit ultricies mauris. Proin luctus arcu et massa scelerisque dignissim in ut erat. Fusce aliquet hendrerit porta. Fusce at risus id nibh auctor porta et id metus. Aenean ut ipsum ut turpis venenatis placerat non ac velit. Duis quam tellus, gravida nec turpis vitae, condimentum euismod mauris. Sed feugiat, lectus pellentesque tincidunt gravida, erat dui congue odio, rhoncus facilisis mauris velit non massa. Quisque tristique ipsum sit amet pharetra suscipit. Duis ut velit mi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum id posuere nibh, porttitor ullamcorper magna. Nunc hendrerit nulla orci, eget placerat odio tristique eget. Nam et est sit amet nisl sagittis vulputate.\r\n\r\nEtiam finibus euismod sapien, vitae scelerisque tellus aliquet eget. In tortor nisi, porta a rutrum nec, interdum a nibh. Nam gravida leo a neque mattis sodales. Aenean eu mi massa. Maecenas semper ut turpis et pulvinar. Duis at pharetra enim. Aliquam ac nisi maximus, porta metus sed, finibus diam. Integer non faucibus eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce vel eleifend mi. Sed semper, neque non accumsan mattis, tortor eros tristique nulla, et dapibus lectus ante at purus.\r\n\r\nPhasellus non diam vehicula, congue massa blandit, laoreet tortor. Ut aliquet ipsum sit amet purus sagittis, id feugiat dui dignissim. Nam diam lacus, pellentesque ut purus ut, ultricies tincidunt nisi. Vivamus varius aliquet tristique. Suspendisse id ante nec libero pretium consectetur eu quis tortor. Curabitur sit amet porta elit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam non lectus orci. Phasellus pretium tincidunt libero, sed tempus urna.\r\n\r\nNunc elementum velit sed enim ornare, ac placerat magna feugiat. Cras ante ante, rhoncus a mauris ac, aliquet ultricies augue. Sed pellentesque ex id tellus iaculis scelerisque. Integer lacinia volutpat sollicitudin. Vestibulum mi metus, condimentum non dictum sit amet, tincidunt at erat. Nullam pharetra magna ante, et condimentum diam condimentum ut. Integer vehicula magna eu vehicula volutpat. Sed ultricies pulvinar purus a feugiat.', 1, '2022-04-23 19:39:48', '2022-04-23 19:39:48'),
(2, '002/AA/BB', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget neque vehicula, aliquam ligula non, vulputate odio. Proin at aliquet diam, ut viverra erat. Duis dignissim, nibh id blandit consequat, libero nisl ullamcorper elit, ac eleifend mauris nulla et nunc. Duis ac ullamcorper orci, nec scelerisque massa. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Integer hendrerit maximus nisi, bibendum lobortis tortor interdum at. Suspendisse aliquam nulla ut mi euismod, non vehicula lectus commodo. Sed mattis aliquet velit.\r\n\r\nNullam aliquet facilisis leo, ut consectetur justo dapibus ut. Duis lobortis imperdiet nisl, blandit ultricies mauris. Proin luctus arcu et massa scelerisque dignissim in ut erat. Fusce aliquet hendrerit porta. Fusce at risus id nibh auctor porta et id metus. Aenean ut ipsum ut turpis venenatis placerat non ac velit. Duis quam tellus, gravida nec turpis vitae, condimentum euismod mauris. Sed feugiat, lectus pellentesque tincidunt gravida, erat dui congue odio, rhoncus facilisis mauris velit non massa. Quisque tristique ipsum sit amet pharetra suscipit. Duis ut velit mi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum id posuere nibh, porttitor ullamcorper magna. Nunc hendrerit nulla orci, eget placerat odio tristique eget. Nam et est sit amet nisl sagittis vulputate.\r\n\r\nEtiam finibus euismod sapien, vitae scelerisque tellus aliquet eget. In tortor nisi, porta a rutrum nec, interdum a nibh. Nam gravida leo a neque mattis sodales. Aenean eu mi massa. Maecenas semper ut turpis et pulvinar. Duis at pharetra enim. Aliquam ac nisi maximus, porta metus sed, finibus diam. Integer non faucibus eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce vel eleifend mi. Sed semper, neque non accumsan mattis, tortor eros tristique nulla, et dapibus lectus ante at purus.\r\n\r\nPhasellus non diam vehicula, congue massa blandit, laoreet tortor. Ut aliquet ipsum sit amet purus sagittis, id feugiat dui dignissim. Nam diam lacus, pellentesque ut purus ut, ultricies tincidunt nisi. Vivamus varius aliquet tristique. Suspendisse id ante nec libero pretium consectetur eu quis tortor. Curabitur sit amet porta elit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam non lectus orci. Phasellus pretium tincidunt libero, sed tempus urna.\r\n\r\nNunc elementum velit sed enim ornare, ac placerat magna feugiat. Cras ante ante, rhoncus a mauris ac, aliquet ultricies augue. Sed pellentesque ex id tellus iaculis scelerisque. Integer lacinia volutpat sollicitudin. Vestibulum mi metus, condimentum non dictum sit amet, tincidunt at erat. Nullam pharetra magna ante, et condimentum diam condimentum ut. Integer vehicula magna eu vehicula volutpat. Sed ultricies pulvinar purus a feugiat.', '[\"6\"]', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget neque vehicula, aliquam ligula non, vulputate odio. Proin at aliquet diam, ut viverra erat. Duis dignissim, nibh id blandit consequat, libero nisl ullamcorper elit, ac eleifend mauris nulla et nunc. Duis ac ullamcorper orci, nec scelerisque massa. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Integer hendrerit maximus nisi, bibendum lobortis tortor interdum at. Suspendisse aliquam nulla ut mi euismod, non vehicula lectus commodo. Sed mattis aliquet velit.\r\n\r\nNullam aliquet facilisis leo, ut consectetur justo dapibus ut. Duis lobortis imperdiet nisl, blandit ultricies mauris. Proin luctus arcu et massa scelerisque dignissim in ut erat. Fusce aliquet hendrerit porta. Fusce at risus id nibh auctor porta et id metus. Aenean ut ipsum ut turpis venenatis placerat non ac velit. Duis quam tellus, gravida nec turpis vitae, condimentum euismod mauris. Sed feugiat, lectus pellentesque tincidunt gravida, erat dui congue odio, rhoncus facilisis mauris velit non massa. Quisque tristique ipsum sit amet pharetra suscipit. Duis ut velit mi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum id posuere nibh, porttitor ullamcorper magna. Nunc hendrerit nulla orci, eget placerat odio tristique eget. Nam et est sit amet nisl sagittis vulputate.\r\n\r\nEtiam finibus euismod sapien, vitae scelerisque tellus aliquet eget. In tortor nisi, porta a rutrum nec, interdum a nibh. Nam gravida leo a neque mattis sodales. Aenean eu mi massa. Maecenas semper ut turpis et pulvinar. Duis at pharetra enim. Aliquam ac nisi maximus, porta metus sed, finibus diam. Integer non faucibus eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce vel eleifend mi. Sed semper, neque non accumsan mattis, tortor eros tristique nulla, et dapibus lectus ante at purus.\r\n\r\nPhasellus non diam vehicula, congue massa blandit, laoreet tortor. Ut aliquet ipsum sit amet purus sagittis, id feugiat dui dignissim. Nam diam lacus, pellentesque ut purus ut, ultricies tincidunt nisi. Vivamus varius aliquet tristique. Suspendisse id ante nec libero pretium consectetur eu quis tortor. Curabitur sit amet porta elit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam non lectus orci. Phasellus pretium tincidunt libero, sed tempus urna.\r\n\r\nNunc elementum velit sed enim ornare, ac placerat magna feugiat. Cras ante ante, rhoncus a mauris ac, aliquet ultricies augue. Sed pellentesque ex id tellus iaculis scelerisque. Integer lacinia volutpat sollicitudin. Vestibulum mi metus, condimentum non dictum sit amet, tincidunt at erat. Nullam pharetra magna ante, et condimentum diam condimentum ut. Integer vehicula magna eu vehicula volutpat. Sed ultricies pulvinar purus a feugiat.', 1, '2022-04-24 05:11:17', NULL),
(4, '001/AA/BB', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget neque vehicula, aliquam ligula non, vulputate odio. Proin at aliquet diam, ut viverra erat. Duis dignissim, nibh id blandit consequat, libero nisl ullamcorper elit, ac eleifend mauris nulla et nunc. Duis ac ullamcorper orci, nec scelerisque massa. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Integer hendrerit maximus nisi, bibendum lobortis tortor interdum at. Suspendisse aliquam nulla ut mi euismod, non vehicula lectus commodo. Sed mattis aliquet velit. Nullam aliquet facilisis leo, ut consectetur justo dapibus ut. Duis lobortis imperdiet nisl, blandit ultricies mauris. Proin luctus arcu et massa scelerisque dignissim in ut erat. Fusce aliquet hendrerit porta. Fusce at risus id nibh auctor porta et id metus. Aenean ut ipsum ut turpis venenatis placerat non ac velit. Duis quam tellus, gravida nec turpis vitae, condimentum euismod mauris. Sed feugiat, lectus pellentesque tincidunt gravida, erat dui congue odio, rhoncus facilisis mauris velit non massa. Quisque tristique ipsum sit amet pharetra suscipit. Duis ut velit mi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum id posuere nibh, porttitor ullamcorper magna. Nunc hendrerit nulla orci, eget placerat odio tristique eget. Nam et est sit amet nisl sagittis vulputate. Etiam finibus euismod sapien, vitae scelerisque tellus aliquet eget. In tortor nisi, porta a rutrum nec, interdum a nibh. Nam gravida leo a neque mattis sodales. Aenean eu mi massa. Maecenas semper ut turpis et pulvinar. Duis at pharetra enim. Aliquam ac nisi maximus, porta metus sed, finibus diam. Integer non faucibus eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce vel eleifend mi. Sed semper, neque non accumsan mattis, tortor eros tristique nulla, et dapibus lectus ante at purus. Phasellus non diam vehicula, congue massa blandit, laoreet tortor. Ut aliquet ipsum sit amet purus sagittis, id feugiat dui dignissim. Nam diam lacus, pellentesque ut purus ut, ultricies tincidunt nisi. Vivamus varius aliquet tristique. Suspendisse id ante nec libero pretium consectetur eu quis tortor. Curabitur sit amet porta elit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam non lectus orci. Phasellus pretium tincidunt libero, sed tempus urna. Nunc elementum velit sed enim ornare, ac placerat magna feugiat. Cras ante ante, rhoncus a mauris ac, aliquet ultricies augue. Sed pellentesque ex id tellus iaculis scelerisque. Integer lacinia volutpat sollicitudin. Vestibulum mi metus, condimentum non dictum sit amet, tincidunt at erat. Nullam pharetra magna ante, et condimentum diam condimentum ut. Integer vehicula magna eu vehicula volutpat. Sed ultricies pulvinar purus a feugiat.</p>\n', '[\"6\"]', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget neque vehicula, aliquam ligula non, vulputate odio. Proin at aliquet diam, ut viverra erat. Duis dignissim, nibh id blandit consequat, libero nisl ullamcorper elit, ac eleifend mauris nulla et nunc. Duis ac ullamcorper orci, nec scelerisque massa. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Integer hendrerit maximus nisi, bibendum lobortis tortor interdum at. Suspendisse aliquam nulla ut mi euismod, non vehicula lectus commodo. Sed mattis aliquet velit. Nullam aliquet facilisis leo, ut consectetur justo dapibus ut. Duis lobortis imperdiet nisl, blandit ultricies mauris. Proin luctus arcu et massa scelerisque dignissim in ut erat. Fusce aliquet hendrerit porta. Fusce at risus id nibh auctor porta et id metus. Aenean ut ipsum ut turpis venenatis placerat non ac velit. Duis quam tellus, gravida nec turpis vitae, condimentum euismod mauris. Sed feugiat, lectus pellentesque tincidunt gravida, erat dui congue odio, rhoncus facilisis mauris velit non massa. Quisque tristique ipsum sit amet pharetra suscipit. Duis ut velit mi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum id posuere nibh, porttitor ullamcorper magna. Nunc hendrerit nulla orci, eget placerat odio tristique eget. Nam et est sit amet nisl sagittis vulputate. Etiam finibus euismod sapien, vitae scelerisque tellus aliquet eget. In tortor nisi, porta a rutrum nec, interdum a nibh. Nam gravida leo a neque mattis sodales. Aenean eu mi massa. Maecenas semper ut turpis et pulvinar. Duis at pharetra enim. Aliquam ac nisi maximus, porta metus sed, finibus diam. Integer non faucibus eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce vel eleifend mi. Sed semper, neque non accumsan mattis, tortor eros tristique nulla, et dapibus lectus ante at purus. Phasellus non diam vehicula, congue massa blandit, laoreet tortor. Ut aliquet ipsum sit amet purus sagittis, id feugiat dui dignissim. Nam diam lacus, pellentesque ut purus ut, ultricies tincidunt nisi. Vivamus varius aliquet tristique. Suspendisse id ante nec libero pretium consectetur eu quis tortor. Curabitur sit amet porta elit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam non lectus orci. Phasellus pretium tincidunt libero, sed tempus urna. Nunc elementum velit sed enim ornare, ac placerat magna feugiat. Cras ante ante, rhoncus a mauris ac, aliquet ultricies augue. Sed pellentesque ex id tellus iaculis scelerisque. Integer lacinia volutpat sollicitudin. Vestibulum mi metus, condimentum non dictum sit amet, tincidunt at erat. Nullam pharetra magna ante, et condimentum diam condimentum ut. Integer vehicula magna eu vehicula volutpat. Sed ultricies pulvinar purus a feugiat.</p>\n', 1, '2022-04-24 05:14:25', '2022-04-24 08:12:19'),
(7, '005/AA/BB', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n', '[\"6\"]', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n', 1, '2022-04-24 08:46:54', NULL),
(8, '006/AA/BB', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\n', '[\"13\",\"12\",\"11\",\"9\",\"8\",\"7\",\"6\"]', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\n', 1, '2022-04-29 22:53:29', NULL),
(9, '007/AA/BB', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n', '[\"9\",\"8\",\"7\",\"6\"]', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n', 0, '2022-04-30 00:18:00', '2022-07-03 16:03:36'),
(10, 'TEST/001/A01', '<p>1.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n2.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n3.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n4.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n5.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n6.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n7.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n8.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n9.Contrary to popular belief, Lorem Ipsum is not simply random text.</p>\n', '[\"10\",\"9\",\"8\",\"7\",\"6\"]', '<p>1.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n2.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n3.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n4.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n5.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n6.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n7.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n8.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n9.Contrary to popular belief, Lorem Ipsum is not simply random text.</p>\n', 1, '2022-04-30 07:40:29', '2022-07-04 14:47:11'),
(11, '123', '<p>123</p>\n', '[\"6\"]', '<p>123</p>\n', 0, '2022-06-05 04:45:08', NULL),
(12, '12312', '<p>2323</p>\n', '[\"11\"]', '<p>3232</p>\n', 0, '2022-06-05 04:51:02', NULL),
(13, 'TEST/KASI/001', '<p>TEST/KASI/001</p>\n', '[\"9\"]', '<p>TEST/KASI/001</p>\n', 1, '2022-07-03 16:09:31', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_detail_menu`
--
ALTER TABLE `mst_detail_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_jabatan`
--
ALTER TABLE `mst_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `mst_menu`
--
ALTER TABLE `mst_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_pelanggaran`
--
ALTER TABLE `mst_pelanggaran`
  ADD PRIMARY KEY (`kd_pelanggaran`);

--
-- Indexes for table `mst_role`
--
ALTER TABLE `mst_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `mst_tindakan`
--
ALTER TABLE `mst_tindakan`
  ADD PRIMARY KEY (`kd_tindakan`);

--
-- Indexes for table `mst_tipe`
--
ALTER TABLE `mst_tipe`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `mst_users`
--
ALTER TABLE `mst_users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tx_kegiatan`
--
ALTER TABLE `tx_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tx_pelanggaran`
--
ALTER TABLE `tx_pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`);

--
-- Indexes for table `tx_surat_tugas`
--
ALTER TABLE `tx_surat_tugas`
  ADD PRIMARY KEY (`id_surat_tugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_jabatan`
--
ALTER TABLE `mst_jabatan`
  MODIFY `id_jabatan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mst_menu`
--
ALTER TABLE `mst_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mst_pelanggaran`
--
ALTER TABLE `mst_pelanggaran`
  MODIFY `kd_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mst_role`
--
ALTER TABLE `mst_role`
  MODIFY `id_role` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mst_tindakan`
--
ALTER TABLE `mst_tindakan`
  MODIFY `kd_tindakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mst_tipe`
--
ALTER TABLE `mst_tipe`
  MODIFY `id_tipe` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mst_users`
--
ALTER TABLE `mst_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tx_kegiatan`
--
ALTER TABLE `tx_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tx_pelanggaran`
--
ALTER TABLE `tx_pelanggaran`
  MODIFY `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tx_surat_tugas`
--
ALTER TABLE `tx_surat_tugas`
  MODIFY `id_surat_tugas` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
