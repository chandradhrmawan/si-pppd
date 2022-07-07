-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2022 at 03:44 PM
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
-- Table structure for table `mst_jenis`
--

CREATE TABLE `mst_jenis` (
  `id_jenis` int(255) NOT NULL,
  `nm_jenis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_jenis`
--

INSERT INTO `mst_jenis` (`id_jenis`, `nm_jenis`) VALUES
(1, 'Kendaraan Taktis'),
(2, 'Kendaraan Tempur'),
(3, 'Kendaraan Sipil'),
(4, 'Kendaraan Tempur Logistik'),
(5, 'Kendaraan Angkut Personel');

-- --------------------------------------------------------

--
-- Table structure for table `mst_kendaraan`
--

CREATE TABLE `mst_kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `id_jenis` varchar(255) DEFAULT NULL,
  `id_merk` varchar(255) DEFAULT NULL,
  `id_tipe` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(4000) DEFAULT NULL,
  `no_plat` varchar(255) DEFAULT NULL,
  `no_mesin` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `daya_angkut` varchar(255) DEFAULT NULL,
  `transmisi` varchar(255) DEFAULT NULL,
  `kapasitas_bbm` varchar(255) DEFAULT NULL,
  `bahan_bakar` varchar(255) DEFAULT NULL,
  `tenaga` varchar(255) DEFAULT NULL,
  `km_akhir` bigint(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_kendaraan`
--

INSERT INTO `mst_kendaraan` (`id_kendaraan`, `id_jenis`, `id_merk`, `id_tipe`, `judul`, `deskripsi`, `no_plat`, `no_mesin`, `model`, `daya_angkut`, `transmisi`, `kapasitas_bbm`, `bahan_bakar`, `tenaga`, `km_akhir`, `path`, `status`) VALUES
(1, '1', '1', '1', 'FERRARI F650 SCUDERIA', 'Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor incididunt lorem ipsum dolor sit amet, con', 'B1231', '123456789', '2019', NULL, 'Auto', NULL, NULL, '1000 hp', 31700, 'Mobil-City-Car-Murah-Honda.png', 1),
(2, '1', '4', '2', 'LEXUS GX 490I HYBIRD', 'Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor incididunt lorem ipsum dolor sit amet, con', '12323', '232323', '2019', '10', 'Auto', '10', '10', '1000 hp', 300, 'Harga-Toyota-Rush-Kebumen.png', 1),
(3, '2', '1', '1', 'MERCEDES BENZ E CLASS', 'Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor incididunt lorem ipsum dolor sit amet, con', '23', '23', '2019', NULL, 'Auto', NULL, NULL, '1000 hp', 100, 'exterior_2L_1.png', 0),
(4, '1', '1', '1', 'MERCEDES-AMG GT 2018', 'Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor incididunt lorem ipsum dolor sit amet, con', 'B2138129', '7487283728', '2019', NULL, 'Auto', NULL, NULL, '1000 hp', 100, 'Daihatsu_Terios_L_1.png', 1),
(5, '1', '1', '1', 'ACURA ILX 2019', 'Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor incididunt lorem ipsum dolor sit amet, con', 'B2138129', '7487283728', '2019', NULL, 'Auto', NULL, NULL, '1000 hp', 100, 'yaris_01.png', 1),
(12, '1', '1', '1', 'ACURA ILX 2019', 'Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor incididunt lorem ipsum dolor sit amet, con', '12311', '21333', '2019', NULL, 'Auto', NULL, NULL, '1000 hp', 100, 'agya_01.png', 1),
(13, '1', '3', '1', 'MERCEDES BENZ E CLASS', 'Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor incididunt lorem ipsum dolor sit amet, con', '2323', '2323', '2019', '10', 'Auto', '150', '2500', '1000 hp', 4723, 'color-bronze-mica-metallic.png', 1),
(14, '1', '1', '1', 'MERCEDES BENZ E CLASS', 'Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor incididunt lorem ipsum dolor sit amet, con', '1215477', '27272727', '2019', '12', 'Auto', '22', '12', '1000 hp', 100, '805286128p.png', 1),
(15, '1', '1', '2', 'MERCEDES BENZ E CLASS', 'Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor incididunt lorem ipsum dolor sit amet, con', '23', '23', '2019', '2500', 'Auto', '100', '15000', '1000 hp', 100, '15112020125502.png', 1);

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
-- Table structure for table `mst_merk`
--

CREATE TABLE `mst_merk` (
  `id_merk` int(255) NOT NULL,
  `nm_merk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_merk`
--

INSERT INTO `mst_merk` (`id_merk`, `nm_merk`) VALUES
(1, 'Toyota'),
(3, 'KIA'),
(4, 'Honda'),
(5, 'Pindad');

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
-- Table structure for table `mst_start_point`
--

CREATE TABLE `mst_start_point` (
  `id_loc` int(255) NOT NULL,
  `lon` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_start_point`
--

INSERT INTO `mst_start_point` (`id_loc`, `lon`, `lat`, `desc`) VALUES
(1, '106.88766003', '-6.11894777', 'Jakarta Special Capital Region, Indonesia');

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
(9, 'Petugas Kasi Trantib', 'kasi', '21232f297a57a5a743894a0e4a801fc3', '1231', 9, '1', 4, 'jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tx_dtl_service`
--

CREATE TABLE `tx_dtl_service` (
  `id_dtl_service` int(255) NOT NULL,
  `id_hdr_service` int(255) DEFAULT NULL,
  `nama_service` varchar(255) DEFAULT NULL,
  `jumlah` int(255) DEFAULT NULL,
  `harga` bigint(255) DEFAULT NULL,
  `sub_total` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tx_dtl_service`
--

INSERT INTO `tx_dtl_service` (`id_dtl_service`, `id_hdr_service`, `nama_service`, `jumlah`, `harga`, `sub_total`) VALUES
(1, 8, 'Ganti Oli', 1, 1500, 1500),
(2, 8, 'Ganti Aki', 250, 200, 50000),
(3, 9, 'ganti oli', 1, 50000, 50000),
(4, 9, 'ganti lampu depan', 2, 25000, 50000),
(5, 10, 'oli', 2, 25000, 50000),
(6, 11, 'coba', 5, 2500000, 12500000),
(7, 11, 'coba2', 10, 5000000, 50000000),
(8, 12, 'ganti oli', 2, 12000, 24000),
(9, 13, 'ganti oli', 2, 2500, 5000),
(10, 14, 'ganti aku', 2, 5000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tx_hdr_service`
--

CREATE TABLE `tx_hdr_service` (
  `id_hdr_service` int(255) NOT NULL,
  `tgl_service` datetime(6) DEFAULT NULL,
  `id_kendaraan` int(255) DEFAULT NULL,
  `total` bigint(255) DEFAULT NULL,
  `status` int(255) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `status_lunas` int(1) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tx_hdr_service`
--

INSERT INTO `tx_hdr_service` (`id_hdr_service`, `tgl_service`, `id_kendaraan`, `total`, `status`, `note`, `keterangan`, `status_lunas`, `id_user`) VALUES
(1, '2020-10-03 21:15:48.000000', 1, 1500, 1, NULL, NULL, 0, NULL),
(2, '2020-10-03 11:20:05.000000', 12, NULL, 1, ' Ganti Oli', NULL, 0, NULL),
(3, '2020-10-03 11:21:13.000000', 12, NULL, 1, ' Ganti Oli', NULL, 0, NULL),
(4, '2020-10-03 11:31:10.000000', 12, NULL, 1, ' Ganti Oli', NULL, 0, NULL),
(5, '2020-10-03 11:31:38.000000', 12, NULL, 1, ' Ganti Oli', NULL, 0, NULL),
(6, '2020-10-03 11:32:09.000000', 2, NULL, 1, ' 12323', NULL, 0, NULL),
(7, '2020-10-03 11:32:38.000000', 12, NULL, 1, ' 232323', NULL, 0, NULL),
(8, '2020-10-03 11:33:17.000000', 14, 50000, 3, 'service rutin', '', 0, NULL),
(9, '2020-10-04 08:06:38.000000', 4, 100000, 2, ' Service rutin bulnanan', 'Coba Terima ya', 1, NULL),
(10, '2020-10-23 02:19:11.000000', 1, 50000, 1, 'coba service dulu sekali2', NULL, 1, 12),
(11, '2020-10-23 02:23:05.000000', 3, 62500000, 1, ' 1', NULL, 1, 12),
(12, '2020-11-08 05:10:02.000000', 0, 24000, 1, ' ', NULL, 0, 12),
(13, '2020-11-08 05:12:01.000000', 12, 5000, 1, ' Coba service dari modal', NULL, 0, 12),
(14, '2020-11-08 05:18:31.000000', 1, 10000, 1, 'coba2', NULL, 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tx_jadwal_service`
--

CREATE TABLE `tx_jadwal_service` (
  `id_jadwal` int(255) NOT NULL,
  `id_kendaraan` varchar(255) DEFAULT NULL,
  `tgl_jadwal_service` datetime(6) DEFAULT NULL,
  `tgl_aktual_service` datetime(6) DEFAULT NULL,
  `status_service` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tx_jadwal_service`
--

INSERT INTO `tx_jadwal_service` (`id_jadwal`, `id_kendaraan`, `tgl_jadwal_service`, `tgl_aktual_service`, `status_service`) VALUES
(1, '1', '2020-11-08 15:35:03.000000', '2020-11-08 05:18:31.000000', 2),
(2, '3', '0000-00-00 00:00:00.000000', NULL, 1),
(3, '12', '0000-00-00 00:00:00.000000', NULL, 1);

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
(9, '2022-06-06 00:00:00', 10, '123', '123213', '<p>2222</p>\r\n', NULL, '2022-06-05 11:56:03');

-- --------------------------------------------------------

--
-- Table structure for table `tx_kordinat`
--

CREATE TABLE `tx_kordinat` (
  `id_kordinat` int(255) NOT NULL,
  `id_sewa` int(255) DEFAULT NULL,
  `status_perjalanan` int(255) DEFAULT NULL,
  `lat_kordinat` varchar(255) DEFAULT NULL,
  `lon_kordinat` varchar(255) DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `counter` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tx_kordinat`
--

INSERT INTO `tx_kordinat` (`id_kordinat`, `id_sewa`, `status_perjalanan`, `lat_kordinat`, `lon_kordinat`, `last_update`, `counter`) VALUES
(1, 20, 1, '-6.1940851', '106.8616141', '2020-10-07 04:14:43', 22),
(2, 27, 1, '-6.132874', '106.980442', '2020-10-07 01:27:37', 12),
(6, 32, 1, '-6.291456', '106.4239104', '2022-06-19 02:39:29', 141),
(9, 33, 1, '-6.2783488', '106.8662784', '2020-10-28 03:19:31', 953),
(10, 37, 0, NULL, NULL, NULL, NULL),
(11, 38, 0, NULL, NULL, NULL, NULL),
(12, 39, 0, NULL, NULL, NULL, NULL),
(13, 41, 0, NULL, NULL, NULL, NULL);

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
-- Table structure for table `tx_pengembalian`
--

CREATE TABLE `tx_pengembalian` (
  `id_pengembalian` int(255) NOT NULL,
  `id_sewa` int(255) DEFAULT NULL,
  `total_biaya` int(255) DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `km_selesai` int(255) DEFAULT NULL,
  `id_supir` int(255) DEFAULT NULL,
  `tgl_pengembalian` datetime(6) DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tx_pengembalian`
--

INSERT INTO `tx_pengembalian` (`id_pengembalian`, `id_sewa`, `total_biaya`, `lampiran`, `km_selesai`, `id_supir`, `tgl_pengembalian`, `status`) VALUES
(1, 18, 123, NULL, 123, 6, '2020-10-07 15:59:55.437229', 1),
(2, 18, 2222, '01102020111649.png', 12322, 6, '2020-10-07 15:59:57.170135', 1),
(3, 18, 23232, '01102020111741.png', 2323, 6, '2020-10-07 15:59:57.174123', 1),
(4, 18, 2222222, NULL, 222, 6, '2020-10-07 15:59:57.176120', 1),
(13, 18, 123123123, NULL, 123123, 6, '2020-10-07 15:59:57.192076', 1),
(15, 18, 2147483647, NULL, 12323, 6, '2020-10-07 15:59:57.195069', 1),
(16, 18, 222222, NULL, 222, 6, '2020-10-07 15:59:57.197064', 1),
(17, 18, 22221, NULL, 22, 6, '2020-10-07 15:59:57.199059', 1),
(20, 26, 232332, NULL, 2323, 7, '2020-10-07 15:59:57.204045', 1),
(21, 23, 35000, '04102020053148.png', 15100, 7, '2020-10-07 16:13:07.343023', 3),
(22, 27, 50000, '04102020080225.png', 200, 7, '2020-10-07 16:10:57.150790', 2),
(23, 20, 200, NULL, 1500, 7, '2020-10-07 16:15:57.243937', 1),
(24, 41, 2500000, NULL, 1000, 7, '2020-10-28 03:22:39.000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tx_sewa`
--

CREATE TABLE `tx_sewa` (
  `id_sewa` int(255) NOT NULL,
  `id_user` int(255) DEFAULT NULL,
  `id_kendaraan` int(255) DEFAULT NULL,
  `tgl_sewa` datetime(6) DEFAULT NULL,
  `tgl_pinjam` datetime(6) DEFAULT NULL,
  `tgl_kembali` datetime(6) DEFAULT NULL,
  `tujuan_perjalanan` varchar(255) DEFAULT NULL,
  `lokasi_tujuan` varchar(255) DEFAULT NULL,
  `lon` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `jarak` varchar(255) DEFAULT NULL,
  `status_sewa` int(255) DEFAULT NULL,
  `id_supir` int(255) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `flag_berangkat` int(1) DEFAULT NULL,
  `is_read` int(1) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tx_sewa`
--

INSERT INTO `tx_sewa` (`id_sewa`, `id_user`, `id_kendaraan`, `tgl_sewa`, `tgl_pinjam`, `tgl_kembali`, `tujuan_perjalanan`, `lokasi_tujuan`, `lon`, `lat`, `jarak`, `status_sewa`, `id_supir`, `keterangan`, `flag_berangkat`, `is_read`, `no_hp`) VALUES
(7, 6, 1, '2020-09-20 17:58:31.000000', '2020-01-09 00:00:00.000000', '0000-00-00 00:00:00.000000', 'Dinas', 'Bandung', '107.60495390', '-6.93446940', '84.16 Km', 3, 0, 'Sudah Penuh', 0, NULL, NULL),
(19, 6, 1, '2020-09-20 18:06:35.000000', '2020-09-01 23:06:00.000000', '2020-09-01 23:06:00.000000', 'DInas', 'Bandung', '107.60495390', '-6.93446940', '84.16 Km', 5, 0, 'Test tolak ya', 0, NULL, NULL),
(20, 6, 1, '2020-09-20 18:06:35.000000', '2020-09-01 23:06:00.000000', '2020-09-01 23:06:00.000000', 'DInas', 'Bandung', '107.60495390', '-6.93446940', '84.16 Km', 4, 7, '', 0, NULL, NULL),
(21, 6, 1, '2020-09-20 18:06:35.000000', '2020-09-01 23:06:00.000000', '2020-09-01 23:06:00.000000', 'DInas', 'Bandung', '107.60495390', '-6.93446940', '84.16 Km', 1, 1, NULL, 0, NULL, NULL),
(23, 7, 1, '2020-09-20 18:06:35.000000', '2020-09-01 23:06:00.000000', '2020-09-01 23:06:00.000000', 'DInas', 'Bandung', '107.60495390', '-6.93446940', '84.16 Km', 4, 7, '', 0, NULL, NULL),
(24, 6, 1, '2020-09-20 18:06:35.000000', '2020-09-01 23:06:00.000000', '2020-09-01 23:06:00.000000', 'DInas', 'Bandung', '107.60495390', '-6.93446940', '84.16 Km', 5, 0, 'Tolak ya', 0, NULL, NULL),
(25, 6, 1, '2020-09-25 15:36:38.000000', '2020-09-25 20:36:00.000000', '2020-09-26 20:36:00.000000', 'Perjalnan Dinas', 'Bandung', '107.60507047', '-6.93398334', '84.17 Km', 2, 1, '', 0, NULL, NULL),
(26, 9, 13, '2020-10-04 05:00:22.000000', '2020-10-04 04:59:00.000000', '2020-10-31 05:00:00.000000', 'Dinas Keluar Kota', 'Bandung', '107.60495390', '-6.93446940', '84.16 Km', 4, 7, '', NULL, NULL, NULL),
(27, 10, 2, '2020-10-04 19:57:14.000000', '2020-10-04 19:56:00.000000', '2020-10-31 19:57:00.000000', 'Dinas', 'Bandung', '107.60495390', '-6.93446940', '84.16 Km', 4, 7, '', NULL, NULL, NULL),
(28, 9, 13, '2020-10-05 14:40:54.000000', '2020-10-05 14:40:00.000000', '2020-10-31 14:40:00.000000', 'sppd', 'banten', '106.16369470', '-6.03276100', '80.54 Km', 5, NULL, NULL, NULL, NULL, NULL),
(29, 9, 2, '2020-10-07 16:21:32.000000', '2020-10-07 16:21:00.000000', '2020-10-31 16:21:00.000000', 'meeting', 'priok', '106.87079323', '-6.12885785', '1.9 Km', 6, NULL, '', NULL, NULL, NULL),
(30, 9, 2, '2020-10-07 16:39:25.000000', '2020-10-07 16:39:00.000000', '2020-10-31 16:39:00.000000', 'meeting', 'bandung', '107.60495390', '-6.93446940', '84.16 Km', 6, NULL, 'coba batalkan', NULL, 1, NULL),
(31, 9, 2, '2020-10-07 16:48:19.000000', '2020-10-07 16:47:00.000000', '2020-10-31 16:48:00.000000', 'meeting', 'jakarta', '106.82718300', '-6.17539420', '6.97 Km', 6, NULL, 'coba batalkan', NULL, 1, NULL),
(32, 9, 18, '2020-10-17 11:20:20.000000', '2020-10-17 11:19:00.000000', '2020-10-18 11:00:00.000000', 'sppd', 'menteng', '106.83222420', '-6.19502650', '6.63 Km', 2, 7, '', NULL, 1, NULL),
(33, 9, 18, '2020-10-23 13:55:21.000000', '2020-10-23 13:55:00.000000', '2020-10-31 13:55:00.000000', 'dinas', 'bandung', '107.60495390', '-6.93446940', '84.16 Km', 2, 13, '', NULL, NULL, NULL),
(34, 9, 12, '2020-10-23 14:48:26.000000', '2020-10-23 14:48:00.000000', '2020-10-24 14:48:00.000000', 'dinas', 'bandung', '107.60495390', '-6.93446940', '84.16 Km', 5, 8, '', NULL, NULL, NULL),
(35, 9, 5, '2020-10-23 16:01:00.000000', '2020-10-22 16:00:00.000000', '2020-10-24 16:00:00.000000', 'sppd', 'bandung', '107.60495390', '-6.93446940', '84.16 Km', 1, NULL, NULL, NULL, NULL, NULL),
(36, 9, 5, '2020-10-23 16:02:05.000000', '2020-10-23 16:01:00.000000', '2020-10-24 16:01:00.000000', 'sppd', 'bandung', '107.60495390', '-6.93446940', '84.16 Km', 1, NULL, NULL, NULL, NULL, '0215468746487848'),
(37, 9, 18, '2020-10-27 21:46:22.000000', '2020-10-27 21:46:00.000000', '2020-10-28 21:46:00.000000', 'jalan2', 'jakarta', '106.82718300', '-6.17539420', '6.97 Km', 2, 6, '', NULL, NULL, '021564654'),
(38, 9, 5, '2020-10-27 21:53:48.000000', '2020-10-27 21:53:00.000000', '2020-10-31 21:53:00.000000', 'coba', 'jakarta', '106.82718300', '-6.17539420', '6.97 Km', 2, NULL, '', NULL, NULL, '21323123'),
(39, 9, 4, '2020-10-27 21:55:44.000000', '2020-10-27 21:55:00.000000', '2020-10-31 21:55:00.000000', 'caca', 'jakarta', '106.77735040', '-6.33187850', '14.05 Km', 2, 13, '', NULL, NULL, '213231'),
(40, 13, 5, '2020-10-28 14:55:38.000000', '2020-10-28 14:55:00.000000', '2020-10-31 14:55:00.000000', 'dinas', 'bandung', '107.60495390', '-6.93446940', '84.16 Km', 1, NULL, NULL, NULL, NULL, '021546864684'),
(41, 9, 13, '2020-10-28 14:58:17.000000', '2020-10-28 14:58:00.000000', '2020-10-29 14:58:00.000000', 'caca', 'jakarta', '106.82718300', '-6.17539420', '6.97 Km', 4, 7, '', NULL, NULL, '65496874684');

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
(8, '006/AA/BB', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\n', '[\"13\",\"12\",\"11\",\"10\",\"9\",\"8\",\"7\",\"6\"]', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\n', 1, '2022-04-29 22:53:29', NULL),
(9, '007/AA/BB', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n', '[\"13\",\"12\",\"11\",\"10\",\"9\",\"8\",\"7\",\"6\"]', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n', 1, '2022-04-30 00:18:00', '2022-04-30 00:21:25'),
(10, 'TEST/001/A01', '<p>1.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n2.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n3.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n4.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n5.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n6.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n7.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n8.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n9.Contrary to popular belief, Lorem Ipsum is not simply random text.</p>\n', '[\"13\",\"12\",\"11\",\"10\",\"9\",\"8\",\"7\",\"6\"]', '<p>1.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n2.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n3.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n4.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n5.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n6.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n7.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n8.Contrary to popular belief, Lorem Ipsum is not simply random text.<br />\n9.Contrary to popular belief, Lorem Ipsum is not simply random text.</p>\n', 1, '2022-04-30 07:40:29', '2022-05-06 09:19:58'),
(11, '123', '<p>123</p>\n', '[\"6\"]', '<p>123</p>\n', 0, '2022-06-05 04:45:08', NULL),
(12, '12312', '<p>2323</p>\n', '[\"11\"]', '<p>3232</p>\n', 0, '2022-06-05 04:51:02', NULL);

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
-- Indexes for table `mst_jenis`
--
ALTER TABLE `mst_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `mst_kendaraan`
--
ALTER TABLE `mst_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `mst_menu`
--
ALTER TABLE `mst_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_merk`
--
ALTER TABLE `mst_merk`
  ADD PRIMARY KEY (`id_merk`);

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
-- Indexes for table `mst_start_point`
--
ALTER TABLE `mst_start_point`
  ADD PRIMARY KEY (`id_loc`);

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
-- Indexes for table `tx_dtl_service`
--
ALTER TABLE `tx_dtl_service`
  ADD PRIMARY KEY (`id_dtl_service`);

--
-- Indexes for table `tx_hdr_service`
--
ALTER TABLE `tx_hdr_service`
  ADD PRIMARY KEY (`id_hdr_service`) USING BTREE;

--
-- Indexes for table `tx_jadwal_service`
--
ALTER TABLE `tx_jadwal_service`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tx_kegiatan`
--
ALTER TABLE `tx_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tx_kordinat`
--
ALTER TABLE `tx_kordinat`
  ADD PRIMARY KEY (`id_kordinat`);

--
-- Indexes for table `tx_pelanggaran`
--
ALTER TABLE `tx_pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`);

--
-- Indexes for table `tx_pengembalian`
--
ALTER TABLE `tx_pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indexes for table `tx_sewa`
--
ALTER TABLE `tx_sewa`
  ADD PRIMARY KEY (`id_sewa`);

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
-- AUTO_INCREMENT for table `mst_jenis`
--
ALTER TABLE `mst_jenis`
  MODIFY `id_jenis` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mst_kendaraan`
--
ALTER TABLE `mst_kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mst_menu`
--
ALTER TABLE `mst_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mst_merk`
--
ALTER TABLE `mst_merk`
  MODIFY `id_merk` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tx_dtl_service`
--
ALTER TABLE `tx_dtl_service`
  MODIFY `id_dtl_service` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tx_hdr_service`
--
ALTER TABLE `tx_hdr_service`
  MODIFY `id_hdr_service` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tx_jadwal_service`
--
ALTER TABLE `tx_jadwal_service`
  MODIFY `id_jadwal` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tx_kegiatan`
--
ALTER TABLE `tx_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tx_kordinat`
--
ALTER TABLE `tx_kordinat`
  MODIFY `id_kordinat` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tx_pelanggaran`
--
ALTER TABLE `tx_pelanggaran`
  MODIFY `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tx_pengembalian`
--
ALTER TABLE `tx_pengembalian`
  MODIFY `id_pengembalian` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tx_sewa`
--
ALTER TABLE `tx_sewa`
  MODIFY `id_sewa` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tx_surat_tugas`
--
ALTER TABLE `tx_surat_tugas`
  MODIFY `id_surat_tugas` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
