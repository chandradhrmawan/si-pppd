-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2020 at 12:19 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sikopmil`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_detail_menu`
--

CREATE TABLE IF NOT EXISTS `mst_detail_menu` (
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
(7, '7', 'master/users', 'Users', '2', NULL, '1'),
(8, '7', 'master/jabatan', 'Jabatan', '2', NULL, '1'),
(10, '7', 'master/role', 'Role', '2', NULL, '1'),
(11, '7', 'master/kendaraan', 'Kendaraan', '2', NULL, '1'),
(12, '7', 'master/supir', 'Pengemudi', '2', NULL, '1'),
(13, '17', 'laporan/Kendaraan', 'Laporan Kendaraan', '2', NULL, '1'),
(14, '17', 'laporan/Sewa', 'Laporan Pemakaian', '2', NULL, '1'),
(15, '17', 'laporan/Service', 'Laporan Service', '2', NULL, '1,5,2'),
(16, '17', 'laporan/Users', 'Laporan Users', '2', NULL, '1'),
(17, '17', 'laporan/Supir', 'Laporan Pengemudi', '2', NULL, '1'),
(18, '14', 'transaksi/service/jadwal', 'Jadwal Service', '2', NULL, '1'),
(19, '14', 'transaksi/service', 'Service Kendaraan', '2', NULL, '1,5'),
(20, '17', 'laporan/Pengembalian', 'Laporan Pengembalian', '2', NULL, '1'),
(21, '17', 'laporan/Jadwal', 'Laporan Jadwal Service', '2', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_jabatan`
--

CREATE TABLE IF NOT EXISTS `mst_jabatan` (
`id_jabatan` int(255) NOT NULL,
  `nm_jabatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_jabatan`
--

INSERT INTO `mst_jabatan` (`id_jabatan`, `nm_jabatan`) VALUES
(1, 'Admin'),
(2, 'Perwira Tinggi'),
(3, 'Perwira Menengah'),
(4, 'Perwira Pertama'),
(5, 'Perwira Pertama'),
(6, 'Bintara Tinggi'),
(7, 'Bintara'),
(8, 'Tamtama Kepala'),
(9, 'Tamtama');

-- --------------------------------------------------------

--
-- Table structure for table `mst_jenis`
--

CREATE TABLE IF NOT EXISTS `mst_jenis` (
`id_jenis` int(255) NOT NULL,
  `nm_jenis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `mst_kendaraan` (
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `mst_menu` (
`id` int(11) NOT NULL,
  `slug_url` varchar(225) NOT NULL,
  `title` varchar(225) NOT NULL,
  `status` int(1) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_menu`
--

INSERT INTO `mst_menu` (`id`, `slug_url`, `title`, `status`, `icon`, `role`) VALUES
(7, '#', 'Master', 2, 'fa fa-database', '1'),
(9, 'transaksi/sewa', 'Data Pinjam', 2, 'fa fa-car', '1,2'),
(10, 'master/config', 'Startpoint', 2, 'fa fa-map', '1'),
(12, 'transaksi/monitoring', 'Monitoring', 2, 'fa fa-desktop', '1'),
(13, 'transaksi/surat_jalan', 'Cetak Surat Jalan', 2, 'fa fa-files-o', '1,4,2'),
(14, '#', 'Service', 2, 'fa fa-cog', '1,5'),
(15, 'transaksi/pengembalian', 'Pengembalian Kendaraan', 2, 'fa fa-address-book-o', '1,4'),
(17, '#', 'Laporan', 2, 'fa fa-file', '1,2,5'),
(18, 'login/auth/doLogout', 'Logout', 2, 'fa fa-trash', '1,4,2,5');

-- --------------------------------------------------------

--
-- Table structure for table `mst_merk`
--

CREATE TABLE IF NOT EXISTS `mst_merk` (
`id_merk` int(255) NOT NULL,
  `nm_merk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
-- Table structure for table `mst_role`
--

CREATE TABLE IF NOT EXISTS `mst_role` (
`id_role` int(255) NOT NULL,
  `nm_role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_role`
--

INSERT INTO `mst_role` (`id_role`, `nm_role`) VALUES
(1, 'Admin'),
(2, 'Staff'),
(3, 'Pegawai'),
(4, 'Supir'),
(5, 'Mekanik');

-- --------------------------------------------------------

--
-- Table structure for table `mst_start_point`
--

CREATE TABLE IF NOT EXISTS `mst_start_point` (
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
-- Table structure for table `mst_tipe`
--

CREATE TABLE IF NOT EXISTS `mst_tipe` (
`id_tipe` int(255) NOT NULL,
  `nm_tipe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `mst_users` (
`id_user` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `id_jabatan` int(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `id_role` int(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_users`
--

INSERT INTO `mst_users` (`id_user`, `nama`, `username`, `password`, `nip`, `id_jabatan`, `status`, `id_role`, `alamat`) VALUES
(6, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1231', 3, '1', 1, 'jakarta'),
(7, 'supir', 'supir', '21232f297a57a5a743894a0e4a801fc3', '1231', 3, '1', 4, 'jakarta'),
(8, 'staff', 'staff', '21232f297a57a5a743894a0e4a801fc3', '1231', 3, '1', 2, 'jakarta'),
(9, 'pegawai', 'pegawai', '21232f297a57a5a743894a0e4a801fc3', '1231', 3, '1', 3, 'jakarta'),
(10, 'pegawai1', 'pegawai1', '21232f297a57a5a743894a0e4a801fc3', '1231', 3, '1', 3, 'jakarta'),
(11, 'supir1', 'supir1', '21232f297a57a5a743894a0e4a801fc3', '1231', 3, '1', 4, 'jakarta'),
(12, 'mekanik', 'mekanik', '21232f297a57a5a743894a0e4a801fc3', '1231', 3, '1', 5, 'jakarta'),
(13, 'supir3', 'supir3', '21232f297a57a5a743894a0e4a801fc3', '468486', 9, '1', 4, '123');

-- --------------------------------------------------------

--
-- Table structure for table `tx_dtl_service`
--

CREATE TABLE IF NOT EXISTS `tx_dtl_service` (
`id_dtl_service` int(255) NOT NULL,
  `id_hdr_service` int(255) DEFAULT NULL,
  `nama_service` varchar(255) DEFAULT NULL,
  `jumlah` int(255) DEFAULT NULL,
  `harga` bigint(255) DEFAULT NULL,
  `sub_total` bigint(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `tx_hdr_service` (
`id_hdr_service` int(255) NOT NULL,
  `tgl_service` datetime(6) DEFAULT NULL,
  `id_kendaraan` int(255) DEFAULT NULL,
  `total` bigint(255) DEFAULT NULL,
  `status` int(255) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `status_lunas` int(1) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `tx_jadwal_service` (
`id_jadwal` int(255) NOT NULL,
  `id_kendaraan` varchar(255) DEFAULT NULL,
  `tgl_jadwal_service` datetime(6) DEFAULT NULL,
  `tgl_aktual_service` datetime(6) DEFAULT NULL,
  `status_service` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tx_jadwal_service`
--

INSERT INTO `tx_jadwal_service` (`id_jadwal`, `id_kendaraan`, `tgl_jadwal_service`, `tgl_aktual_service`, `status_service`) VALUES
(1, '1', '2020-11-08 15:35:03.000000', '2020-11-08 05:18:31.000000', 2),
(2, '3', '0000-00-00 00:00:00.000000', NULL, 1),
(3, '12', '0000-00-00 00:00:00.000000', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tx_kordinat`
--

CREATE TABLE IF NOT EXISTS `tx_kordinat` (
`id_kordinat` int(255) NOT NULL,
  `id_sewa` int(255) DEFAULT NULL,
  `status_perjalanan` int(255) DEFAULT NULL,
  `lat_kordinat` varchar(255) DEFAULT NULL,
  `lon_kordinat` varchar(255) DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `counter` int(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tx_kordinat`
--

INSERT INTO `tx_kordinat` (`id_kordinat`, `id_sewa`, `status_perjalanan`, `lat_kordinat`, `lon_kordinat`, `last_update`, `counter`) VALUES
(1, 20, 1, '-6.1940851', '106.8616141', '2020-10-07 04:14:43', 22),
(2, 27, 1, '-6.132874', '106.980442', '2020-10-07 01:27:37', 12),
(6, 32, 1, '-6.2087634', '106.84559899999999', '2020-11-08 05:54:22', 115),
(9, 33, 1, '-6.2783488', '106.8662784', '2020-10-28 03:19:31', 953),
(10, 37, 0, NULL, NULL, NULL, NULL),
(11, 38, 0, NULL, NULL, NULL, NULL),
(12, 39, 0, NULL, NULL, NULL, NULL),
(13, 41, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tx_pengembalian`
--

CREATE TABLE IF NOT EXISTS `tx_pengembalian` (
`id_pengembalian` int(255) NOT NULL,
  `id_sewa` int(255) DEFAULT NULL,
  `total_biaya` int(255) DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `km_selesai` int(255) DEFAULT NULL,
  `id_supir` int(255) DEFAULT NULL,
  `tgl_pengembalian` datetime(6) DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `tx_sewa` (
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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

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
-- Indexes for table `tx_kordinat`
--
ALTER TABLE `tx_kordinat`
 ADD PRIMARY KEY (`id_kordinat`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_jabatan`
--
ALTER TABLE `mst_jabatan`
MODIFY `id_jabatan` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `mst_jenis`
--
ALTER TABLE `mst_jenis`
MODIFY `id_jenis` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mst_kendaraan`
--
ALTER TABLE `mst_kendaraan`
MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `mst_menu`
--
ALTER TABLE `mst_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `mst_merk`
--
ALTER TABLE `mst_merk`
MODIFY `id_merk` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mst_role`
--
ALTER TABLE `mst_role`
MODIFY `id_role` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mst_tipe`
--
ALTER TABLE `mst_tipe`
MODIFY `id_tipe` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mst_users`
--
ALTER TABLE `mst_users`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tx_dtl_service`
--
ALTER TABLE `tx_dtl_service`
MODIFY `id_dtl_service` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tx_hdr_service`
--
ALTER TABLE `tx_hdr_service`
MODIFY `id_hdr_service` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tx_jadwal_service`
--
ALTER TABLE `tx_jadwal_service`
MODIFY `id_jadwal` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tx_kordinat`
--
ALTER TABLE `tx_kordinat`
MODIFY `id_kordinat` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tx_pengembalian`
--
ALTER TABLE `tx_pengembalian`
MODIFY `id_pengembalian` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tx_sewa`
--
ALTER TABLE `tx_sewa`
MODIFY `id_sewa` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
