-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 23, 2023 at 11:13 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pusdalops`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbm_desa`
--

DROP TABLE IF EXISTS `tbm_desa`;
CREATE TABLE IF NOT EXISTS `tbm_desa` (
  `id_desa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_desa` varchar(255) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_desa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbm_jenis_bencana`
--

DROP TABLE IF EXISTS `tbm_jenis_bencana`;
CREATE TABLE IF NOT EXISTS `tbm_jenis_bencana` (
  `id_bencana` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_bencana` varchar(255) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_bencana`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbm_kecamatan`
--

DROP TABLE IF EXISTS `tbm_kecamatan`;
CREATE TABLE IF NOT EXISTS `tbm_kecamatan` (
  `id_kecamatan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_kecamatan` varchar(255) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_kecamatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbt_aduan_bencana`
--

DROP TABLE IF EXISTS `tbt_aduan_bencana`;
CREATE TABLE IF NOT EXISTS `tbt_aduan_bencana` (
  `id_aduan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_bencana` int(11) DEFAULT NULL,
  `id_kecamatan` int(11) DEFAULT NULL,
  `id_desa` int(11) DEFAULT NULL,
  `tanggal_kejadian` date DEFAULT NULL,
  `waktu_kejadian` time DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `sumber_informasi` varchar(255) DEFAULT NULL,
  `kronologis` text DEFAULT NULL,
  `kondisi_mutahir` text DEFAULT NULL,
  `dampak_kejadian` text DEFAULT NULL,
  `upaya` text DEFAULT NULL,
  `kebutuhan_mendesak` text DEFAULT NULL,
  `rekomendasi` text DEFAULT NULL,
  `petugas_terlibat` varchar(255) DEFAULT NULL,
  `status_aduan` tinyint(1) DEFAULT 0,
  `id_retana` int(11) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_aduan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbt_assesment_aduan`
--

DROP TABLE IF EXISTS `tbt_assesment_aduan`;
CREATE TABLE IF NOT EXISTS `tbt_assesment_aduan` (
  `id_assesment` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_aduan` int(11) DEFAULT NULL,
  `tanggal_penanganan` date DEFAULT NULL,
  `status_asses` varchar(50) DEFAULT NULL,
  `status_logistik` varchar(50) DEFAULT NULL,
  `hasil_asses` text DEFAULT NULL,
  `kebutuhan_penanganan` text DEFAULT NULL,
  `petugas_asses` varchar(255) DEFAULT NULL,
  `korban_jiwa` int(11) DEFAULT NULL,
  `korban_lukas` int(11) DEFAULT NULL,
  `pengungsi` int(11) DEFAULT NULL,
  `tempat_pengungsian` varchar(255) DEFAULT NULL,
  `dpk_rumah` text DEFAULT NULL,
  `dpk_lahan` text DEFAULT NULL,
  `dpk_jalan` text DEFAULT NULL,
  `dpk_jembatan` text DEFAULT NULL,
  `dpk_irigasi` text DEFAULT NULL,
  `taksiran_kerugian` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `catatan_penanganan` text DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_assesment`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_konten`
--

DROP TABLE IF EXISTS `tb_konten`;
CREATE TABLE IF NOT EXISTS `tb_konten` (
  `id_konten` int(3) NOT NULL AUTO_INCREMENT,
  `nama_instansi` varchar(120) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `no_telp` varchar(30) NOT NULL,
  `no_telp2` varchar(30) DEFAULT NULL,
  `no_whatsapp` varchar(30) NOT NULL,
  `email1` varchar(120) NOT NULL,
  `email2` varchar(120) DEFAULT NULL,
  `lokasi_maps` text NOT NULL,
  `logo` varchar(200) NOT NULL,
  `logo_header` varchar(200) NOT NULL,
  `slider1` varchar(256) DEFAULT NULL,
  `slider2` varchar(256) DEFAULT NULL,
  `slider3` varchar(256) DEFAULT NULL,
  `judul_slider1` varchar(256) DEFAULT NULL,
  `judul_slider2` varchar(256) DEFAULT NULL,
  `judul_slider3` varchar(256) DEFAULT NULL,
  `teks_slider1` varchar(256) DEFAULT NULL,
  `teks_slider2` varchar(256) DEFAULT NULL,
  `teks_slider3` varchar(256) DEFAULT NULL,
  `link_slider1` varchar(300) DEFAULT NULL,
  `link_slider2` varchar(300) DEFAULT NULL,
  `link_slider3` varchar(300) DEFAULT NULL,
  `api_key` varchar(320) DEFAULT NULL,
  `tgl_update` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`id_konten`),
  KEY `id_users` (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_konten`
--

INSERT INTO `tb_konten` (`id_konten`, `nama_instansi`, `alamat`, `no_telp`, `no_telp2`, `no_whatsapp`, `email1`, `email2`, `lokasi_maps`, `logo`, `logo_header`, `slider1`, `slider2`, `slider3`, `judul_slider1`, `judul_slider2`, `judul_slider3`, `teks_slider1`, `teks_slider2`, `teks_slider3`, `link_slider1`, `link_slider2`, `link_slider3`, `api_key`, `tgl_update`, `id_users`) VALUES
(1, 'SI PPO-BPBD KAB. CIANJUR', '-', '022-12411412', '', '', 'bpbd@cianjur.kab.go.id', '', '', '20231224_logo_471166551.png', '20231224_logo_header_2077040977.png', '20210823_Slider1_509839065.JPG', '20210823_Slider2_751889071.JPG', '20210823_Slider3_748266674.JPG', 'SELAMAT DATANG DI SMART ZONASI SMAN KOTA DEPOK', 'SELAMAT DATANG DI SMART ZONASI SMAN KOTA DEPOK', 'SELAMAT DATANG DI SMART ZONASI SMAN KOTA DEPOK', 'Agar tepat saat menentukan sekolah sesuai jarak, kami hadir untuk membantu siswa mencari sekolah SMA Negeri di wilayah Kota Depok dengan metode Zonasi', 'Agar tepat saat menentukan sekolah sesuai jarak, kami hadir untuk membantu siswa mencari sekolah SMA Negeri di wilayah Kota Depok dengan metode Zonasi', 'Agar tepat saat menentukan sekolah sesuai jarak, kami hadir untuk membantu siswa mencari sekolah SMA Negeri di wilayah Kota Depok dengan metode Zonasi', 'https://smartzonasi.com/Infoppdb', 'https://smartzonasi.com/Infoppdb', 'https://smartzonasi.com/Infoppdb', '-', '2023-12-24 04:04:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE IF NOT EXISTS `tb_users` (
  `id_users` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(128) NOT NULL,
  `alamat` varchar(256) DEFAULT NULL,
  `full_name` varchar(256) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `photo_profile` varchar(128) NOT NULL,
  `id_role` int(3) NOT NULL,
  `status_aktif` enum('yes','no') NOT NULL,
  `status_pass` enum('normal','once') NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_created` datetime DEFAULT NULL,
  `id_user_update` int(3) NOT NULL,
  `tgl_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id_users`),
  KEY `role_id` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_users`, `username`, `password`, `email`, `alamat`, `full_name`, `no_hp`, `photo_profile`, `id_role`, `status_aktif`, `status_pass`, `last_login`, `date_created`, `id_user_update`, `tgl_update`) VALUES
(1, 'administrator', '$2y$10$xSQt3JHl38UGHhPb8PzX.uwZYYZLehzA7bmy3ChEXropayjHMQVQq', '', '-', 'Admin', '082114888121', '20210808_Admin_641724246.png', 99, 'yes', 'normal', '2023-12-23 23:13:17', '2021-01-10 03:10:31', 1, '2023-12-24 06:11:34'),
(2, 'retana', '$2y$10$XyKj.uNJfgmRs82QS0ApnelGLorr7UPjuCXD9/YcAnjC3nrfJzaCy', '', '-', 'Retana 01', '082114888121', '20210808_Admin_641724246.png', 2, 'yes', 'once', '2023-12-23 23:13:00', '2021-01-10 03:10:31', 1, '2023-12-24 06:12:43'),
(3, 'kabid', '$2y$10$dxuR.Q0xsnlSebnu.0y62egZTZrmbyCgGDz/EvIf6gECOXaczP1QC', '', '-', 'Kabid', '082114888121', '20210808_Admin_641724246.png', 1, 'yes', 'once', '2023-12-23 23:12:47', '2021-01-10 03:10:31', 1, '2023-12-24 06:12:47');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_role`
--

DROP TABLE IF EXISTS `tb_user_role`;
CREATE TABLE IF NOT EXISTS `tb_user_role` (
  `id_role` int(3) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  `sort_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_role`
--

INSERT INTO `tb_user_role` (`id_role`, `role`, `sort_name`) VALUES
(1, 'kabid', 'kabid'),
(2, 'retana', 'retana'),
(99, 'administrator', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
