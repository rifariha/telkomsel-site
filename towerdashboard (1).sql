-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2019 at 03:31 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `towerdashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_branch`
--

CREATE TABLE `tb_branch` (
  `id_branch` int(10) NOT NULL,
  `nama_branch` varchar(40) NOT NULL,
  `region` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_branch`
--

INSERT INTO `tb_branch` (`id_branch`, `nama_branch`, `region`) VALUES
(1, 'bengkulu', 1),
(2, 'jambi', 1),
(3, 'lampung', 1),
(4, 'palembang', 1),
(5, 'pangkal pinang', 1),
(6, 'batam', 2),
(7, 'dumai', 2),
(8, 'padang', 2),
(9, 'pekanbaru', 2),
(10, 'aceh', 3),
(11, 'central medan', 3),
(12, 'padang sidempuan', 3),
(13, 'pematang siantar', 3),
(14, 'western medan', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_cluster_sales`
--

CREATE TABLE `tb_cluster_sales` (
  `id_cluster` int(10) NOT NULL,
  `nama_cluster` varchar(40) NOT NULL,
  `branch` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cluster_sales`
--

INSERT INTO `tb_cluster_sales` (`id_cluster`, `nama_cluster`, `branch`) VALUES
(1, 'bengkulu', 1),
(2, 'lahat', 1),
(3, 'lubuk linggau', 1),
(4, 'jambi', 2),
(5, 'muara bungo', 2),
(6, 'kotabumi', 3),
(7, 'lampung', 3),
(8, 'metro', 3),
(9, 'pringsewu', 3),
(10, 'baturaja', 4),
(11, 'kayu agung', 4),
(12, 'musi banyuasin', 4),
(13, 'palembang', 4),
(14, 'pangkal pinang', 5),
(15, 'batam 1', 6),
(16, 'batam 2', 6),
(17, 'dumai', 7),
(18, 'ujung batu', 7),
(19, 'bukit tinggi', 8),
(20, 'padang pariaman', 8),
(21, 'solok sraya', 8),
(22, 'indragiri', 9),
(23, 'pekanbaru inner', 9),
(24, 'pekanbaru outer', 9),
(25, 'banda aceh', 10),
(26, 'lhokseumawe', 10),
(27, 'meulaboh', 10),
(28, 'lubuk pakam', 11),
(29, 'medan inner', 11),
(30, 'medan outer', 11),
(31, 'padang sidempuan', 12),
(32, 'rantau prapat', 12),
(33, 'sibolga', 12),
(34, 'kaban jahe', 13),
(35, 'kisaran', 13),
(36, 'pematang siantar', 13),
(37, 'binjai', 14),
(38, 'langsa', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tb_foto`
--

CREATE TABLE `tb_foto` (
  `id_foto` int(10) NOT NULL,
  `foto_satu` varchar(200) NOT NULL,
  `foto_dua` varchar(200) NOT NULL,
  `foto_tiga` varchar(200) NOT NULL,
  `foto_empat` varchar(200) DEFAULT NULL,
  `foto_lokasi` varchar(200) NOT NULL,
  `video` varchar(200) NOT NULL,
  `kode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_foto`
--

INSERT INTO `tb_foto` (`id_foto`, `foto_satu`, `foto_dua`, `foto_tiga`, `foto_empat`, `foto_lokasi`, `video`, `kode`) VALUES
(7, 'Foto_Satu_SBG-0001.jpg', 'Foto_Dua_SBG-0001.jpeg', 'Foto_Satu_SBG-0001.jpg', 'Foto_Empat_SBG-0001.png', 'Foto_Lokasi_SBG-0001.jpg', '', 'SBG-0001'),
(8, 'Foto_Satu_SBT-0001.jpg', 'Foto_Dua_SBT-0001.jpeg', 'Foto_Satu_SBT-0001.jpg', NULL, 'Foto_Lokasi_SBT-0001.jpg', '', 'SBT-0001'),
(9, 'Foto_Satu_SBG-0002.jpg', 'Foto_Dua_SBG-0002.jpeg', 'Foto_Satu_SBG-0002.jpg', 'Foto_Empat_SBG-0002.png', 'Foto_Lokasi_SBG-0002.jpg', '', 'SBG-0002'),
(10, 'Foto_Satu_SBS-0001.jpg', 'Foto_Dua_SBS-0001.jpeg', 'Foto_Satu_SBS-0001.jpg', NULL, 'Foto_Lokasi_SBS-0001.jpg', '', 'SBS-0001'),
(11, 'Foto_Satu_SBT-0002.jpg', 'Foto_Dua_SBT-0002.jpeg', 'Foto_Satu_SBT-0002.jpg', NULL, 'Foto_Lokasi_SBT-0002.jpg', '', 'SBT-0002'),
(12, 'Foto_Satu_SBS-0002.jpg', 'Foto_Dua_SBS-0002.jpeg', 'Foto_Satu_SBS-0002.jpg', 'Foto_Empat_SBS-0002.png', 'Foto_Lokasi_SBS-0002.jpg', '', 'SBS-0002'),
(14, 'Foto_Satu_SBS-00041.PNG', 'Foto_Dua_SBS-00041.PNG', 'Foto_Satu_SBS-00041.PNG', NULL, 'Foto_Lokasi_SBS-00041.PNG', 'www.youtube.com', 'SBS-0004');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kabupaten`
--

CREATE TABLE `tb_kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `nama_kabupaten` varchar(50) NOT NULL,
  `cluster` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kabupaten`
--

INSERT INTO `tb_kabupaten` (`id_kabupaten`, `nama_kabupaten`, `cluster`) VALUES
(1, 'bengkulu selatan', 1),
(2, 'bengkulu tengah', 1),
(3, 'bengkulu utara', 1),
(4, 'kaur', 1),
(5, 'kota bengkulu', 1),
(6, 'mukomuko', 1),
(7, 'seluma', 1),
(8, 'empat lawang', 2),
(9, 'kota pagar alam', 2),
(10, 'kota pramubuh', 2),
(11, 'lahat', 2),
(12, 'muara enim', 2),
(13, 'ogan komering ulu timur', 2),
(14, 'penukal abab lematang ilir', 2),
(15, 'bengkulu utara', 3),
(16, 'kepahiang', 3),
(17, 'kota lubukinggau', 3),
(18, 'lebong', 3),
(19, 'musi waras', 3),
(20, 'musi waras utara', 3),
(21, 'rejang lebong', 3),
(22, 'batang hari', 4),
(23, 'kota jambi', 4),
(24, 'muaro jambi', 4),
(25, 'tanjung jabung barat', 4),
(26, 'tanjung jabung timur', 4),
(27, 'bungo', 5),
(28, 'kerinci', 5),
(29, 'kota sungai penuh', 5),
(30, 'lampung selatan', 5),
(31, 'merangin', 5),
(32, 'sarolangun', 5),
(33, 'tebo', 5),
(34, 'lampung barat', 6),
(35, 'lampung tengah', 6),
(36, 'lampung utara', 6),
(37, 'tulangbawang', 6),
(38, 'way kanan', 6),
(39, 'kota bandar lampung', 7),
(40, 'lampung selatan', 7),
(41, 'lampung timur', 7),
(42, 'pesawaran', 7),
(43, 'kota metro', 8),
(44, 'lampung tengah', 8),
(45, 'lampung timur', 8),
(46, 'mesuji', 8),
(47, 'tulang bawang barat', 8),
(48, 'tulang bawang', 8),
(49, 'pesawaran', 9),
(50, 'pesisir barat', 9),
(51, 'pringsewu', 9),
(52, 'tanggamus', 9),
(53, 'ogan komering ulu', 10),
(54, 'ogan komering ulu selatan', 10),
(55, 'ogan komering ulu timur', 10),
(56, 'kota palembang', 11),
(57, 'ogan ilir', 11),
(58, 'ogan komering ilir', 11),
(59, 'banyu asin', 12),
(60, 'musi banyuasin', 12),
(61, 'kota palembang', 13),
(63, 'bangka', 14),
(64, 'bangka barat', 14),
(65, 'bangka selatan', 14),
(66, 'bangka tengah', 14),
(67, 'belitung', 14),
(68, 'belitung timur', 14),
(69, 'kota pangkal pinang', 14),
(70, 'indragiri hilir', 15),
(71, 'karimun', 15),
(72, 'kepulauan meranti', 15),
(73, 'kota batam', 15),
(74, 'bintan', 16),
(75, 'kota batam', 16),
(76, 'kota tanjung pinang', 16),
(77, 'lingga', 16),
(78, 'natuna', 16),
(79, 'bengkalis', 17),
(80, 'kota dumai', 17),
(81, 'rokan hilir', 17),
(82, 'bengkalis', 18),
(83, 'kampar', 18),
(84, 'rokan hulu', 18),
(85, 'siak', 18),
(86, 'agam', 19),
(87, 'kota bukit tinggi', 19),
(88, 'kota payakumbuh', 19),
(89, 'lima puluh kota', 19),
(90, 'lubuk basung', 19),
(91, 'pasaman', 19),
(92, 'pasaman barat', 19),
(93, 'kota padang', 20),
(94, 'kota pariaman', 20),
(95, 'padang pariaman', 20),
(96, 'pesisir selatan', 20),
(97, 'dharmasraya', 21),
(98, 'kota padang panjang', 21),
(99, 'kota sawah lunto', 21),
(100, 'kota solok', 21),
(101, 'sijunjung', 21),
(102, 'solok', 21),
(103, 'solok selatan', 21),
(104, 'tanah datar', 21),
(105, 'indragiri hilir', 22),
(106, 'indragiri hulu', 22),
(107, 'kampar', 22),
(108, 'kuantan singingi', 22),
(109, 'kampar', 23),
(110, 'kota pekanbaru', 23),
(111, 'kota pekanbaru', 24),
(112, 'pelalawan', 24),
(113, 'siak', 24),
(114, 'aceh besar', 25),
(115, 'kota banda aceh', 25),
(116, 'kota sabang', 25),
(117, 'pidie', 25),
(118, 'pidie jaya', 25),
(119, 'aceh tengah', 26),
(120, 'aceh utara', 26),
(121, 'bener meriah', 26),
(122, 'bireuen', 26),
(123, 'kota lhokseumawe', 26),
(124, 'kota sabang', 26),
(125, 'aceh barat', 27),
(126, 'aceh barat daya', 27),
(127, 'aceh jaya', 27),
(128, 'aceh selatan', 27),
(129, 'aceh singkil', 27),
(130, 'aceh tenggara', 27),
(131, 'gayo lues', 27),
(132, 'kota subulussalam', 27),
(133, 'nagan raya', 27),
(134, 'simeulue', 27),
(135, 'deli serdang', 28),
(136, 'serdang bedagai', 28),
(137, 'deli serdang', 29),
(138, 'kota medan', 29),
(139, 'labuhan baru utara', 29),
(140, 'deli serdang', 30),
(141, 'kota medan', 30),
(142, 'kota padangsidimpuan', 31),
(143, 'labuhan batu utara', 31),
(144, 'mandailing natal', 31),
(145, 'padang lawas', 31),
(146, 'padang lawas utara', 31),
(147, 'tapanuli selatan', 31),
(148, 'labuhan batu', 32),
(149, 'labuhan batu selatan', 32),
(150, 'labuhan batu utara', 32),
(151, 'rokan hilir', 32),
(152, 'gunungsitoli', 33),
(153, 'kota sibolga', 33),
(154, 'nias', 33),
(155, 'nias barat', 33),
(156, 'nias selatan', 33),
(157, 'nias uatar', 33),
(158, 'tapanuli tengah', 33),
(159, 'tapanuli utara', 33),
(160, 'dairi', 34),
(161, 'deli serdang', 34),
(162, 'karo', 34),
(163, 'labuhan batu selatan', 34),
(164, 'pakpak barat', 34),
(165, 'asahan', 35),
(166, 'batu bara', 35),
(167, 'kota pematang siantar', 35),
(168, 'kota tanjung balai', 35),
(169, 'labuhan batu bara', 35),
(170, 'simalungun', 35),
(171, 'humbang hasundutan', 36),
(172, 'kota pematang siantar', 36),
(173, 'kota tebing tinggi', 36),
(174, 'samosir', 36),
(175, 'serdang bedagai', 36),
(176, 'simalungun', 36),
(177, 'tapanuli utara', 36),
(178, 'toba samosir', 36),
(179, 'kota binjai', 37),
(180, 'langkat', 37),
(181, 'aceh tamiang', 38),
(182, 'aceh tengah', 38),
(183, 'aceh timur', 38),
(184, 'aceh utara', 38),
(185, 'kota langsa', 38);

-- --------------------------------------------------------

--
-- Table structure for table `tb_log`
--

CREATE TABLE `tb_log` (
  `id_log` int(10) NOT NULL,
  `user` varchar(100) NOT NULL,
  `input` varchar(100) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_log`
--

INSERT INTO `tb_log` (`id_log`, `user`, `input`, `tanggal`) VALUES
(1, 'user111', 'SBS-0004', '2019-07-29 08:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `tb_region`
--

CREATE TABLE `tb_region` (
  `id_region` int(10) NOT NULL,
  `nama_region` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_region`
--

INSERT INTO `tb_region` (`id_region`, `nama_region`) VALUES
(1, 'SUMBAGSEL'),
(2, 'SUMBAGTENG'),
(3, 'SUMBAGUT');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tower`
--

CREATE TABLE `tb_tower` (
  `id_data` int(10) NOT NULL,
  `kode_lokasi` varchar(30) NOT NULL,
  `region` int(3) NOT NULL,
  `branch` int(3) NOT NULL,
  `cluster_sales` int(3) NOT NULL,
  `kabupaten` int(3) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `latitude` varchar(40) NOT NULL,
  `longitude` varchar(40) NOT NULL,
  `populasi` varchar(50) NOT NULL,
  `arpu` varchar(50) NOT NULL,
  `tower_usulan` varchar(50) NOT NULL,
  `band_usulan` varchar(50) NOT NULL,
  `jarak` varchar(50) NOT NULL,
  `site` varchar(50) NOT NULL,
  `outlet` varchar(255) NOT NULL,
  `reg_dev` varchar(50) NOT NULL,
  `kat_poi` varchar(50) NOT NULL,
  `form_survey` text NOT NULL,
  `summary_survey` text NOT NULL,
  `competitor` varchar(50) NOT NULL,
  `network` varchar(50) NOT NULL,
  `remark` text NOT NULL,
  `tanggal` date NOT NULL,
  `hapus` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tower`
--

INSERT INTO `tb_tower` (`id_data`, `kode_lokasi`, `region`, `branch`, `cluster_sales`, `kabupaten`, `kecamatan`, `kelurahan`, `latitude`, `longitude`, `populasi`, `arpu`, `tower_usulan`, `band_usulan`, `jarak`, `site`, `outlet`, `reg_dev`, `kat_poi`, `form_survey`, `summary_survey`, `competitor`, `network`, `remark`, `tanggal`, `hapus`) VALUES
(14, 'SBG-0001', 3, 14, 37, 179, 'Binjai Utara', 'Sidodadi', '3.60725345', '98.48964214', '1000', '90', 'pojokan', '80mbps', '90 Meter', '20 Meter', '', '1000', '01293', 'Bagus', 'Bagus Banget', 'XL,Indosat', '2G 3G 4G', 'nice', '2019-07-23', '0'),
(15, 'SBT-0001', 2, 8, 19, 92, 'Padang Utara', 'Sate Padang', '-0.95242319', '100.36359137', '1000', '1000', 'ujung', '1000 mbps', '90 Meter', '20 Meter', '', '1000', '12390', 'Bagus', 'Bagus Banget', 'Indosat,Smartfren', '3G', 'Good', '2019-07-23', '0'),
(16, 'SBG-0002', 3, 11, 29, 138, 'Medan Amplas', 'Harjosari I', '3.53582415', '98.7196547', '300', '301', 'Dekat SPBU', '80Mbps', '40 Meter', '40 Meter', '', '1000', '812930', 'Good', 'Good', 'XL,Indosat,Three,Smartfren', '3G 4G', 'Good', '2019-07-23', '0'),
(17, 'SBS-0001', 1, 3, 8, 45, 'Lampung Selatan', 'Bojonegoro', '-4.8555039', '105.0272986', '900', '800', 'Region 10', '100 Mbps', '10 Meter', '5 Meter', '', '901', '18321', 'Bagus', 'Bagus', 'Smartfren', '3G', 'Bagus', '2019-07-23', '0'),
(18, 'SBT-0002', 2, 7, 17, 80, 'Dumai Barat', 'Dudumai', '1.6318056', '101.4424177', '1000', '90', 'New Infra', '3G', '90 Meter', '20 Meter', '', '1000', '12390', 'Complete', 'OK', 'XL,Indosat', '2G 3G', 'nice', '2019-07-23', '0'),
(19, 'SBT-0003', 2, 8, 20, 94, 'Binjai Utara', 'Sidodadi', '3.60725345', '98.48964214', '300', '301', 'New Infra', '3G', '90 Meter', '20 Meter', '', '1000', '18321', 'Complete', 'OK', 'Three,Smartfren', '3G', 'Good', '2019-07-23', '0'),
(20, 'SBS-0002', 1, 2, 4, 23, 'Binjai Utara', 'Sidodadi', '3.60725345', '98.48964214', '1000', '1000', 'Collocation', '2G 3G', '90 Meter', '20 Meter', '', '100000', 'Residential', 'Complete', 'OK', 'XL,Indosat', '2G 3G 4G', 'ada ooutlet xl', '2019-07-23', '0'),
(21, 'SBT-0004', 2, 7, 17, 79, 'medan amplas', 'harjosari 1', '3.98390843', '98.3434094034', '1000', '50000', 'New Infra', '3G', '50 ', '30 meter', '', '10000000', 'HP CENTER', 'Complete', 'OK', 'XL,Indosat', '3G', 'good', '2019-07-29', '0'),
(22, 'SBS-0003', 1, 2, 5, 29, 'medan amplas', 'medan123', '3.98390843', '98.2323', '1000', '23829', 'New Infra', '2G 3G', '50', '30 meter', '', '223232', 'MALL & HANGOUT PLACE', 'Not Complete', 'Not OK', 'Indosat', '3G', 'good', '2019-07-29', '0'),
(23, 'SBS-0004', 1, 1, 2, 12, 'Medan Belawan', 'Ambarita', '306541', '4554516', '10000', '90', 'New Infra', '3G', '90', '30', '8', '1000000', 'MALL & HANGOUT PLACE', 'Complete', 'OK', 'XL,Three', '2G 3G 4G', 'Good', '2019-07-29', '0'),
(26, 'SBT-7-17-0', 2, 7, 17, 79, 'Medan Belawan', 'medan', '306541', '4554516', '100', '100', 'Collocation', '2G', '100', '199', '19', '1999', 'OTHERS', 'Complete', 'OK', 'XL,Indosat', '2G 3G', 'ok', '2019-07-29', '0'),
(27, 'SBS-1-2-0001', 1, 1, 2, 9, 'Medan Belawan', 'medan', '306541', '4554516', '100', '100', 'Collocation', '2G', '100', '199', '19', '1999', 'OTHERS', 'Complete', 'OK', 'XL,Indosat', '2G 3G', 'ok', '2019-07-29', '0'),
(28, 'SBT-7-17-0008', 2, 7, 17, 79, 'meda', 'sdsd', '1212', '323', '1010', '1010', 'New Infra', '2G', '12', '212', '212', '1212', 'PUBLIC AREA', 'Complete', 'OK', 'Three', '2G 3G', 'lhdwhdhedsa', '2019-07-29', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`) VALUES
('00bf3ae5-5297-4504-960c-b9d8dfcef16d', 'user777', '0d6fe63d915004b4a077f1a615c22a00', 1),
('03b388f9-9b50-413f-8abf-51b4b6a4d7a7', 'user444', '9bba40dd6268c241d4e2ea1ac7d02ac7', 1),
('71c4b80f-5893-47be-a5b6-9c099a395d52', 'user666', 'c8d261f81caafa3c276e0782cb7eda43', 1),
('798ac8bb-7426-4381-b3dd-ed694e760326', 'user999', 'a00a0ec75efb135288158ccf2d544095', 1),
('81c1cc5f-c025-42b6-bdf3-6bb7f2b8d0ab', 'user222', '0d7b4009c8a19b10e3843a65d511928c', 1),
('88e0a74b-7327-4c2d-a667-75b5c38417e2', 'admin123', 'bb72c16e0ef92d9cf781184768ff9aaf', 2),
('8b4d90b5-9dd6-4529-b9af-0435865e844c', 'user000', 'dc5a97a1fd08c52d9cd16e631c5ec1e3', 1),
('99363590-2eb0-4d9d-8feb-a84d61bfa7b8', 'user111', '9a1589fd6d40b4aec11b311f89232f70', 1),
('daef0833-6394-47b1-9124-c975e7e5325e', 'user333', 'fe598bcbca39efbfa134603bb5ae02fb', 1),
('df03f4dc-3715-4c61-83a6-9572e545ced4', 'user555', 'c19cceac887b9429dfe7ea7ebb18d4b8', 1),
('f930d3da-8780-4737-a071-b349dfe34b90', 'user888', 'd735f774141047d1a40034f12cdeb576', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_branch`
--
ALTER TABLE `tb_branch`
  ADD PRIMARY KEY (`id_branch`);

--
-- Indexes for table `tb_cluster_sales`
--
ALTER TABLE `tb_cluster_sales`
  ADD PRIMARY KEY (`id_cluster`);

--
-- Indexes for table `tb_foto`
--
ALTER TABLE `tb_foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `tb_kabupaten`
--
ALTER TABLE `tb_kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `tb_region`
--
ALTER TABLE `tb_region`
  ADD PRIMARY KEY (`id_region`);

--
-- Indexes for table `tb_tower`
--
ALTER TABLE `tb_tower`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_branch`
--
ALTER TABLE `tb_branch`
  MODIFY `id_branch` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_cluster_sales`
--
ALTER TABLE `tb_cluster_sales`
  MODIFY `id_cluster` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_foto`
--
ALTER TABLE `tb_foto`
  MODIFY `id_foto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_kabupaten`
--
ALTER TABLE `tb_kabupaten`
  MODIFY `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `id_log` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_region`
--
ALTER TABLE `tb_region`
  MODIFY `id_region` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_tower`
--
ALTER TABLE `tb_tower`
  MODIFY `id_data` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
