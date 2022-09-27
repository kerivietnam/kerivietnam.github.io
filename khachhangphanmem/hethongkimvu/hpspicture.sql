-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2021 at 05:21 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hpspicture`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `idUser` int(11) NOT NULL,
  `nameScreen` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `urlScreen` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `authenticationUser` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`idUser`, `nameScreen`, `urlScreen`, `authenticationUser`) VALUES
(2, 'themPhoiScreen', 'http://localhost/hpsAdmin/views/authenScreen.php', '[\"3\",\"4\"]'),
(2, 'themPhoiScreen', 'http://localhost/hpsAdmin/views/authenScreen.php', '[\"3\",\"4\"]'),
(3, 'adminScreen', 'http://localhost/hpsAdmin/views/authenScreen.php', '[\"1\",\"3\"]'),
(1, 'adminScreen', 'http://localhost/hpsAdmin/views/authenScreen.php', '[\"1\",\"2\",\"3\"]'),
(4, 'adminScreen', 'https://drive.google.com/drive/folders/1YKBIZpOH1DwiX-BsF9S6R8PQ02tywUwW', '[\"1\",\"2\",\"3\",\"4\"]'),
(4, 'themPhoiScreen', 'http://34.70.140.121/hps/hpsAdmin/views/editAuthen.php', '[\"1\",\"2\",\"3\",\"4\"]');

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `idEmployer` int(11) NOT NULL,
  `nameEmployer` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`idEmployer`, `nameEmployer`) VALUES
(3, 'CTY DVH'),
(4, 'CTY PHU TUONG'),
(5, 'CTY BEL'),
(6, 'CTY TRANGS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keri_category`
--

CREATE TABLE `tbl_keri_category` (
  `idCategory` bigint(20) NOT NULL,
  `idEmployer` bigint(20) NOT NULL,
  `idSeri` bigint(20) NOT NULL,
  `idContact` bigint(20) NOT NULL,
  `categoryName` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keri_contract`
--

CREATE TABLE `tbl_keri_contract` (
  `id` bigint(20) NOT NULL,
  `idEmployer` int(11) NOT NULL,
  `cusid` int(11) NOT NULL,
  `machineid` text NOT NULL,
  `machinenumber` text NOT NULL,
  `unit` text NOT NULL,
  `quantaty` bigint(20) NOT NULL,
  `specs` text NOT NULL,
  `spec1` text NOT NULL,
  `spec2` text NOT NULL,
  `spec3` text NOT NULL,
  `spec4` text NOT NULL,
  `spec5` text NOT NULL,
  `spec6` text NOT NULL,
  `spec7` text NOT NULL,
  `spec8` text NOT NULL,
  `spec9` text NOT NULL,
  `specsspecial` text NOT NULL,
  `date_sign_contract` datetime NOT NULL,
  `date_delivery_contract` datetime NOT NULL,
  `remainingdays` text NOT NULL,
  `payhistory1` text NOT NULL,
  `payhistory2` text NOT NULL,
  `payhistory3` text NOT NULL,
  `progress_electric` text NOT NULL,
  `progress_package` text NOT NULL,
  `progress` text NOT NULL,
  `assignee` text NOT NULL,
  `microtime` text NOT NULL,
  `orderno` bigint(20) NOT NULL DEFAULT 0,
  `techdate` varchar(10) DEFAULT NULL,
  `zairiodate` varchar(10) DEFAULT NULL,
  `zairioconnectdate` varchar(10) DEFAULT NULL,
  `repositoryconnectdate` varchar(10) DEFAULT NULL,
  `generalconnectdate` varchar(10) DEFAULT NULL,
  `electricdate` varchar(10) DEFAULT NULL,
  `runtestdate` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keri_dvh`
--

CREATE TABLE `tbl_keri_dvh` (
  `idDvh` int(11) NOT NULL,
  `idcnNumber` int(11) NOT NULL,
  `dvhName` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keri_maintenancetech`
--

CREATE TABLE `tbl_keri_maintenancetech` (
  `idMaintenance` bigint(20) NOT NULL,
  `idcnNumber` bigint(20) NOT NULL,
  `iddvhNumber` int(11) NOT NULL,
  `status` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `idProduct` int(10) NOT NULL,
  `unit` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `amount` bigint(20) NOT NULL,
  `idPicture` int(20) NOT NULL,
  `embryo` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `gc` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `unit_price` float NOT NULL,
  `into_money` float NOT NULL,
  `vat` float NOT NULL,
  `into_money_vat` float NOT NULL,
  `pay` float NOT NULL,
  `rest` float NOT NULL,
  `idEmployer` int(11) NOT NULL,
  `idCategory` bigint(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keri_permission`
--

CREATE TABLE `tbl_keri_permission` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `screen_name` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `screen_url` varchar(1000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `p_add` int(11) NOT NULL DEFAULT 0,
  `p_delete` int(11) NOT NULL DEFAULT 0,
  `p_edit` int(11) NOT NULL DEFAULT 0,
  `p_view` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keri_picture`
--

CREATE TABLE `tbl_keri_picture` (
  `idPicture` int(11) NOT NULL,
  `idCustomer` int(11) NOT NULL,
  `dvhNumber` int(11) NOT NULL,
  `idProject` int(11) NOT NULL,
  `quantityPicture` int(11) NOT NULL,
  `pricePicture` bigint(20) NOT NULL,
  `vatPicture` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `idPictureFree` int(11) NOT NULL,
  `workStatus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tbl_keri_picture`
--

INSERT INTO `tbl_keri_picture` (`idPicture`, `idCustomer`, `dvhNumber`, `idProject`, `quantityPicture`, `pricePicture`, `vatPicture`, `idPictureFree`, `workStatus`) VALUES
(1, 1, 1, 1, 10, 10000, '10%', 1, 0),
(2, 1, 1, 2, 10, 15000, '10%', 2, 0),
(3, 2, 2, 1, 25, 19000, '10%', 3, 0),
(4, 2, 2, 1, 25, 20000, '10%', 1, 0),
(5, 1, 3, 1, 15, 30000, '10%', 2, 0),
(6, 0, 0, 1, 0, 10000, '10%', 0, 0),
(7, 3, 7, 0, 0, 0, '', 9, 0),
(8, 3, 7, 18, 2, 0, '10%', 9, 0),
(9, 3, 10, 21, 10, 0, '', 12, 1),
(10, 3, 10, 19, 10, 0, '10%', 10, 1),
(11, 3, 10, 21, 10, 0, '10%', 11, 1),
(12, 3, 9, 37, 0, 0, '10%', 74, 1),
(13, 5, 22, 38, 2, 650, '10%', 80, 0),
(14, 5, 22, 39, 2, 480, '10%', 81, 0),
(15, 5, 23, 40, 1, 3250, '10%', 82, 0),
(16, 5, 23, 41, 1, 1250, '10%', 83, 0),
(17, 5, 23, 42, 1, 1050, '10%', 84, 0),
(18, 5, 23, 43, 2, 400, '10%', 85, 0),
(19, 7, 24, 1, 25, 0, '10%', 21, 0),
(28, 5, 27, 44, 4, 220, '10%', 109, 0),
(29, 5, 27, 46, 1, 650000, '10%', 111, 0),
(31, 5, 27, 45, 4, 150000, '10%', 110, 0),
(32, 5, 27, 48, 30, 60000, '10%', 113, 0),
(33, 5, 27, 48, 1, 1250000, '10%', 113, 0),
(34, 3, 28, 0, 2, 0, '', 0, 0),
(35, 3, 30, 0, 7, 0, '', 50, 0),
(36, 3, 30, 49, 7, 0, '10%', 50, 1),
(37, 3, 34, 52, 1, 0, '', 50, 1),
(38, 3, 38, 54, 1, 0, '10%', 0, 0),
(39, 3, 39, 0, 1, 0, '', 0, 0),
(40, 3, 10, 55, 10, 0, '10%', 0, 0),
(41, 3, 10, 55, 0, 0, '10%', 0, 0),
(42, 3, 43, 0, 2, 0, '10%', 146, 0),
(43, 3, 44, 57, 1, 0, '10%', 0, 1),
(44, 3, 44, 58, 1, 0, '', 0, 1),
(45, 3, 44, 59, 2, 0, '', 0, 1),
(46, 3, 45, 60, 30, 0, '10%', 0, 1),
(47, 3, 45, 61, 30, 0, '', 0, 1),
(48, 3, 45, 64, 1, 0, '10%', 0, 0),
(49, 3, 45, 65, 1, 0, '', 0, 0),
(50, 3, 46, 66, 1, 0, '10%', 0, 1),
(51, 3, 46, 67, 10, 0, '10%', 0, 1),
(52, 3, 46, 68, 20, 0, '10%', 0, 1),
(53, 3, 46, 69, 1, 0, '10%', 0, 1),
(54, 3, 46, 70, 1, 0, '', 0, 1),
(55, 3, 46, 71, 1, 0, '10%', 0, 1),
(56, 3, 46, 72, 2, 0, '10%', 0, 1),
(57, 3, 47, 74, 4, 0, '10%', 0, 1),
(58, 3, 48, 75, 5, 0, '10%', 0, 1),
(59, 3, 49, 76, 2, 0, '10%', 0, 1),
(60, 3, 49, 77, 2, 0, '10%', 0, 1),
(61, 3, 49, 78, 2, 0, '10%', 0, 1),
(62, 3, 50, 79, 4, 0, '10%', 0, 1),
(63, 3, 50, 80, 2, 0, '10%', 0, 1),
(64, 3, 50, 81, 4, 0, '10%', 0, 1),
(65, 3, 50, 82, 1, 0, '10%', 0, 1),
(66, 3, 51, 83, 20, 0, '10%', 0, 1),
(67, 3, 43, 56, 2, 0, '10%', 0, 1),
(68, 3, 43, 84, 2, 0, '10%', 0, 1),
(69, 3, 42, 85, 10, 0, '10%', 0, 1),
(70, 3, 52, 86, 1, 0, '10%', 0, 1),
(71, 3, 52, 87, 2, 0, '10%', 0, 1),
(72, 3, 52, 88, 2, 0, '10%', 0, 1),
(73, 3, 52, 89, 10, 0, '10%', 0, 1),
(74, 3, 52, 90, 10, 0, '10%', 0, 0),
(75, 3, 52, 91, 10, 0, '10%', 0, 1),
(76, 3, 52, 92, 2, 0, '10%', 0, 1),
(77, 3, 53, 93, 30, 0, '10%', 0, 1),
(78, 3, 53, 94, 1, 0, '10%', 0, 1),
(79, 3, 53, 95, 1, 0, '10%', 0, 1),
(80, 3, 39, 96, 1, 0, '10%', 0, 0),
(81, 3, 44, 13, 1, 0, '10%', 0, 1),
(82, 3, 31, 53, 2, 0, '10%', 0, 1),
(83, 3, 32, 98, 1, 0, '10%', 0, 0),
(84, 3, 56, 99, 4, 0, '10%', 0, 0),
(85, 3, 56, 100, 16, 0, '', 0, 0),
(86, 3, 56, 101, 16, 0, '', 0, 0),
(87, 3, 56, 102, 32, 0, '', 0, 0),
(88, 3, 56, 103, 1, 0, '', 0, 0),
(89, 3, 55, 106, 10, 0, '', 0, 0),
(90, 3, 55, 105, 30, 0, '', 0, 0),
(91, 3, 55, 105, 6, 0, '', 0, 0),
(92, 3, 33, 52, 1, 0, '10%', 0, 0),
(93, 3, 33, 50, 3, 0, '10%', 0, 0),
(94, 3, 33, 51, 1, 0, '10%', 0, 0),
(95, 3, 34, 50, 3, 0, '10%', 0, 0),
(96, 3, 34, 107, 2, 0, '10%', 0, 0),
(97, 3, 37, 28, 20, 0, '10%', 0, 0),
(98, 3, 38, 26, 24, 0, '10%', 0, 0),
(99, 3, 38, 111, 1, 0, '10%', 0, 0),
(100, 3, 38, 112, 1, 0, '10%', 0, 0),
(101, 3, 13, 113, 1, 0, '10%', 0, 0),
(102, 3, 8, 114, 10, 0, '10%', 0, 0),
(103, 3, 9, 115, 2, 0, '10%', 0, 0),
(104, 3, 9, 116, 2, 0, '10%', 0, 0),
(105, 3, 6, 117, 5, 0, '10%', 0, 0),
(106, 3, 29, 119, 3, 0, '10%', 0, 0),
(107, 3, 29, 120, 5, 0, '10%', 0, 0),
(108, 3, 29, 121, 5, 0, '10%', 0, 0),
(109, 3, 29, 122, 5, 0, '10%', 0, 0),
(110, 3, 29, 90, 20, 0, '10%', 0, 0),
(111, 3, 29, 123, 5, 0, '10%', 0, 0),
(112, 3, 29, 124, 5, 0, '10%', 0, 0),
(113, 3, 29, 125, 2, 0, '10%', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keri_picture_free`
--

CREATE TABLE `tbl_keri_picture_free` (
  `idPictureFree` int(11) NOT NULL,
  `namePicrureFree` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `corePictureFree` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `msPicrureFree` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `verPictureFree` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `typePictureFree` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `nicknamePicrureFree` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tbl_keri_picture_free`
--

INSERT INTO `tbl_keri_picture_free` (`idPictureFree`, `namePicrureFree`, `corePictureFree`, `msPicrureFree`, `verPictureFree`, `typePictureFree`, `nicknamePicrureFree`) VALUES
(4, 'Khớp nối núm hút thùng.jpg', 'INOX 201 ', '', '1', '2D', 'HCL. KHOP NOI NUM HUT THUNG'),
(5, 'Hcl. Mespack 2. dau ty voi. D49.PDF', 'INOX 304', '', '1', '2D', 'HCL. DAU TY VOI D49'),
(6, 'Dau ty voi. num ngat giot D37.PDF', '', '', '2', '2D', 'Hcl. Dau ty voi. num ngat giot D37'),
(7, 'Dau ty voi. Num ngat giot. D47.PDF', '', '', '2', '2D', 'Hcl. Dau ty voi. Num ngat giot. D47'),
(8, 'Hcl. Mespack 2. dau ty voi. D49.PDF', '', '', '3', '2D', 'Hcl. Mespack 2. dau ty voi. D49'),
(9, 'Gia công nhông handwheel.PDF', '', '', '2', '2D', 'Oral. Gia công nhông handwheel'),
(11, 'PartLapKhayMoi 02.pdf', '', '', '2', '2D', 'Food. casepacker. Tai xich ga khuon. Part Lap Khay Moi 02'),
(12, 'LOI TUBE - LINE 6.PDF', '', '', '2', '2D', 'Oral. Gia công bộ lói tube'),
(13, 'STM. Bộ tách puck ver 02 290721.PDF', '', '', '2', '0', 'Hcl. STN. Gia công bộ rail tách puck '),
(14, 'PCL. Con lan BTU.PDF', '', '', '2', '2D', 'PCL. Con lăn BTU (bạc đạn 6203RS bọc PU độ cứng 90 shore)'),
(17, 'pc.hassia.Teflon dinh luong.PDF', '', '', '1', '2D', 'Pcl. Hassia.Teflon dinh luong'),
(19, 'PCL.Pitton định lượng Akash.PDF', '', '', '2', '2D', 'PCL.Pitton định lượng Akash'),
(20, 'PCL.Shubham. piston dinh luong ver 02.SLDDRW', '', '', '1', '2D', 'PCL.Shubham. piston dinh luong ver 02'),
(21, 'Hcl. Hassia. Cylinder. A001.PDF', '', '', '1', '2D', 'Hcl. Hassia. Cylinder. A001'),
(22, 'Hcl. Hassia. Cylinder. A001.PDF', '', '', '2', '2D', 'Hcl. Hassia. Cylinder. A001'),
(23, 'Hcl. Hassia. Cylinder. A001.PDF', '', '', '3', '2D', 'Hcl. Hassia. Cylinder. A001'),
(24, 'Hcl. Hassia. Cylinder. A001.PDF', '', '', '4', '2D', 'Hcl. Hassia. Cylinder. A001'),
(25, 'Hcl. Hassia. Cylinder. A001.PDF', '', '', '5', '2D', 'Hcl. Hassia. Cylinder. A001'),
(26, 'Hcl. Hassia. Ty Piston. P02.PDF', '', '', '1', '2D', 'Hcl. Hassia. Ty Piston. P02'),
(27, 'Hcl. Hassia. Ty Piston. P03.PDF', '', '', '1', '2D', 'Hcl. Hassia. Ty Piston. P03'),
(28, 'Hcl. Hassia. Cylinder. P001.PDF', '', '', '1', '2D', 'Hcl. Hassia. Cylinder. P001'),
(29, 'Hcl. Hassia. Cylinder.PDF', '', '', '1', '0', 'Hcl. Hassia. Cylinder'),
(30, 'Hcl. Hassia. Cylinder.PDF', '', '', '2', '0', 'Hcl. Hassia. Cylinder'),
(31, '020318.Trangs.dwg', '', '', '1', '2D', '020318.Trangs'),
(32, 'Tong the Cell 1-2-3 4-5-2019.03.27. HCL.layout.dwg', '', '', '1', '0', 'Tong the Cell 1-2-3 4-5-2019.03.27. HCL.layout'),
(33, 'FOOD EOL LAYOUT.dwg', '', '', '1', '0', 'FOOD EOL LAYOUT'),
(34, 'Layout EOL robot palletizer PCL.dwg', '', '', '1', '0', 'Layout EOL robot palletizer PCL'),
(35, 'PO1. 35.21.05.06.PDF', '', '', '1', '0', 'Hcl. PO1. dau van nap 35.21.05.06'),
(36, 'PO1. 35.21.05.07.PDF', '', '', '1', '0', 'Hcl. PO1. dau van nap  35.21.05.07'),
(37, 'PO1. 35.21.05.07.PDF', '', '', '2', '0', 'Hcl. PO1. dau van nap  35.21.05.07'),
(38, 'Hcl. Posimat 1. Dau Van Nap A001.PDF', '', '', '1', '0', 'Hcl. Posimat 1. Dau Van Nap A001'),
(39, 'PO1. 35.21.05.05.PDF', '', '', '1', '0', 'Hcl. Posimat 1. Dau Van Nap PO1. 35.21.05.05'),
(40, 'Truc cuon mang Mespack 2.PDF', '', '', '1', '0', 'Truc cuon mang Mespack 2'),
(41, 'Ty ngam ep Messpack 2.PDF', '', '', '1', '0', 'Ty ngam ep Messpack 2'),
(42, 'dao cat 420 đe.PDF', '', '', '1', '0', 'Hcl. Mespack 2. dao cat 420 đe'),
(43, 'dao cat 420.PDF', '', '', '1', '0', 'Hcl. Mespack 2. dao cat 420'),
(44, 'Mespack 2. Ngam ep doc 750ml 200ml.zip', '', '', '1', '0', 'Mespack 2. Ngam ep doc 750ml 200ml'),
(45, 'Mespack 2. Ngam ep doc 750ml 200ml.PDF', '', '', '1', '2D', 'Mespack 2. Ngam ep doc 750ml 200ml'),
(46, 'Thanh de hop.PDF', '', '', '1', '2D', 'Thanh de hop'),
(47, 'Rulo băng tải nhựa (POM).png', '', '', '1', '0', 'Rulo băng tải nhựa (POM)'),
(48, 'Trục 4 cánh Bepex 4.png', '', '', '1', '0', 'Trục 4 cánh Bepex 4'),
(49, 'Gia công và cung cấp bản vẽ mới trục truyền động băng tải tốc độ nhanh scara Leepack 3.png', '', '', '1', '0', 'Gia công và cung cấp bản vẽ mới trục truyền động băng tải tốc độ nhanh scara Leepack 3'),
(50, 'Gia công khớp xoay trục đẩy ngàm ép.  Note  Bạc thâu dầu và Ren trái.png', '', '', '1', '0', 'Gia công khớp xoay trục đẩy ngàm ép.  Note  Bạc thâu dầu và Ren trái'),
(51, 'Choose file', '', '', '1', '2D', 'Hcl. STM. Kep co chai nghieng'),
(52, 'Hcl.STM.Kẹp cổ chai nghiêng 01.PDF', 'SUS 304', '', '3', '2D', 'Hcl. STM. Kep co chai nghieng 01'),
(53, 'Hcl.STM.Kẹp cổ chai nghiêng 02.PDF', 'SUS 304', '', '2', '2D', 'Hcl. STM. Kep co chai nghieng 02'),
(54, 'Hcl.STM.Kẹp cổ chai nghiêng 03.PDF', 'SUS 304', '', '2', '2D', 'Hcl. STM. Kep co chai nghieng 03'),
(55, 'Hcl.STM.Kẹp cổ chai nghiêng.PDF', 'SUS 304', '', '2', '2D', 'Hcl. STM. Kep co chai nghieng Assembly'),
(56, 'Ty lấy phôi dùng cho line Soapbar.png', '', '', '1', '0', 'Ty lấy phôi dùng cho line Soapbar'),
(57, 'Ty lấy phôi dùng cho line Soapbar.png', '', '', '2', '0', 'Ty lấy phôi dùng cho line Soapbar'),
(58, 'Nắp chụp trục 5 cánh Bepex.png', '', '', '1', '0', 'Nắp chụp trục 5 cánh Bepex'),
(59, 'Nắp chặn liệu Bepex.png', '', '', '1', '0', 'Nắp chặn liệu Bepex'),
(60, 'Phục hồi thanh đỡ xich băng tải 22 cell 2,3.png', '', '', '1', '0', 'Phục hồi thanh đỡ xich băng tải 22 cell 2,3'),
(61, 'Phục hồi thanh đỡ xich băng tải 22 cell 2,3 02.png', '', '', '1', '0', 'Phục hồi thanh đỡ xich băng tải 22 cell 2,3 02'),
(62, 'Bạc lót mặt trống máy Cartoner 1,2 (dung sai +-2%).png', '', '', '1', '0', 'Bạc lót mặt trống máy Cartoner 1,2 (dung sai +-2%)'),
(63, 'Cung cấp nhông Z12 cho máy Leepack.png', '', '', '1', '0', 'Cung cấp nhông Z12 cho máy Leepack'),
(64, 'THAN VOI FILL STN.png', '', '', '1', '0', 'THAN VOI FILL STN'),
(65, 'TY VOI FILL ST4 -  ANZ 365.png', '', '', '1', '0', 'TY VOI FILL ST4 -  ANZ 365'),
(66, 'PO 1. Kep co chai loai 1L8.jpg', '', '', '1', '0', 'PO 1. Kep co chai loai 1L8'),
(67, 'Pcl. Akash. Vòi fill 01.PDF', 'SUS 316', '', '1', '2D', 'Pcl. Akash. Vòi fill 01'),
(68, 'Pcl. Akash. Vòi fill 02.PDF', 'SUS 316', '', '1', '2D', 'Pcl. Akash. Vòi fill 02'),
(69, 'Pcl. Akash. Vòi fill 03.PDF', 'SUS 316', '', '1', '2D', 'Pcl. Akash. Vòi fill 03'),
(70, 'Pcl. Akash. Vòi fill 04.PDF', 'SUS 316', '', '1', '2D', 'Pcl. Akash. Vòi fill 04'),
(71, 'Pcl. Akash. Vòi fill 05.PDF', 'SUS 316', '', '1', '2D', 'Pcl. Akash. Vòi fill 05'),
(72, 'Pcl. Akash. Vòi fill.PDF', 'SUS 316', '', '1', '2D', 'Pcl. Akash. Vòi fill Assembly'),
(73, 'PO 1. KEP 1.8 L.STEP', '', '', '1', '3D', 'PO 1. Kep co chai loai 1L8'),
(74, 'Po 1. Kep 1.8L D.mcx-9', '', '', '1', 'CNC', 'Po 1. Kep 1.8L D'),
(75, 'ROTARY BUMPER BLADES WHITE 32934.PDF', 'Cao Su', '', '1', '2D', 'ROTARY BUMPER BLADES WHITE 32934'),
(76, 'PO1. Manuchao. 1l. Kep Chai.STEP', '', '', '1', '0', 'PO1. Manuchao. 1l. Kep Chai'),
(77, 'PO1. Manuchao. 1l. Kep Chai.zip', '', 'file zip', '1', '0', 'PO1. Manuchao. 1l. Kep Chai'),
(78, 'Po 1. Cam nap.zip', '', 'Zip', '1', '3D', 'Po 1. Cam nap'),
(79, 'Yuyeng Capper. A001.PDF', '', '', '1', '0', 'Yuyeng Capper. A001'),
(80, 'BEL. Bánh Răng Tear Tapper FK350_01.PDF', 'Thép C45', '', '1', '2D', 'BEL. Bánh Răng Tear Tapper FK 350_01'),
(81, 'BEL. Bánh Răng Tear Tapper FK350_02.PDF', 'Thép C45', '', '1', '2D', 'BEL. Bánh Răng Tear Tapper FK 350_02'),
(82, 'Bel. Tool uốn dao FK part 1.SLDPRT', 'Thép C45', '', '1', 'CNC', 'BEL. Tool uốn dao FK 350 part 1'),
(83, 'Bel. Tool uốn dao FK part 2.SLDPRT', 'Thép C45', '', '1', 'CNC', 'BEL. Tool uốn dao FK 350 part 2'),
(84, 'Bel. Tool uốn dao FK part 3.SLDPRT', 'Thép C45', '', '1', 'CNC', 'BEL. Tool uốn dao FK 350 part 3'),
(85, 'Bel. Tool uốn dao FK part 4.SLDPRT', 'Thép C45', '', '1', 'CNC', 'BEL. Tool uốn dao FK 350 part 4'),
(86, 'Hcl. ST4. Bánh xe vặn nắp.pdf', 'Silicon', '', '1', '2D', 'Hcl. ST4. Bánh xe vặn nắp'),
(87, 'Hcl. STM. Bánh xe vặn nắp.pdf', 'Silicon', '', '1', '2D', 'Hcl. STM. Bánh xe vặn nắp'),
(88, 'Pcl. Mas. Bánh xe vặn nắp.pdf', 'Silicon', '', '1', '2D', 'Pcl. Mas. Bánh xe vặn nắp'),
(89, 'Hcl. Akash. Trục tăng chỉnh ngàm ngang Akash.PDF', 'Thép C45 tôi cứng', '', '1', '2D', 'Hcl. Akash. Trục tăng chỉnh ngàm ngang'),
(90, 'Oral.Pump Mixing Modyfi 0904.zip', 'SUS 316', '', '1', 'CNC', 'Oral. Pump Mixing'),
(91, 'Hcl. ST4. Nozzle Heisenki Body 01.PDF', 'Nhựa PVC', '', '1', '2D', 'Hcl. ST4. Nozzle Heisenki Body 01'),
(92, 'Hcl. ST4. Nozzle Heisenki Body 02.PDF', 'Nhựa PVC', '', '1', '2D', 'Hcl. ST4. Nozzle Heisenki Body 02'),
(93, 'Hcl. ST4. Nozzle Heisenki Body 03.PDF', 'Nhựa PVC', '', '1', '2D', 'Hcl. ST4. Nozzle Heisenki Body 03'),
(94, 'Hcl. ST4. Nozzle Heisenki Body 05.PDF', 'SUS 304', '', '1', '2D', 'Hcl. ST4. Nozzle Heisenki Body 05'),
(95, 'Hcl. ST4. Nozzle Heisenki Body 04.PDF', 'Nhựa PVC', '', '1', '2D', 'Hcl. ST4. Nozzle Heisenki Body 04'),
(96, 'Part kep overwrap line 2.SLDPRT', '', '', '1', '0', 'Oral. Part kep overwrap line 2'),
(97, 'Bulon khóa xích.jpg', '', '', '1', '0', 'Oral. Bulon khóa xích'),
(98, 'Rulo băng tải nhựa (POM).PDF', '', '', '1', '2D', 'Rulo băng tải nhựa (POM)'),
(99, 'Oral. Piston xylanh định lượng.zip', 'SUS 316', '', '1', 'CNC', 'Oral. Piston xylanh định lượng'),
(100, 'Thanh nhựa teflon xếp thùng máy Bung Thùng po3 và yujeng.SLDPRT', '', '', '1', '3D', 'Thanh nhựa teflon xếp thùng máy Bung Thùng po3 và yujeng'),
(101, 'Thanh nhựa teflon xếp thùng máy Bung Thùng po3 và yujeng.PDF', '', '', '1', '2D', 'Thanh nhựa teflon xếp thùng máy Bung Thùng po3 và yujeng'),
(102, 'Posimat. Tach Thung.SLDASM', '', '', '1', '3D', 'Posimat. Tach Thung'),
(103, 'PCL.Shubham. piston dinh luong ver 02. teflon.PDF', '', '', '1', '2D', 'PCL.Shubham. teflon. dinh luong ver 02'),
(104, 'Pcl.Subham.zip', '', 'zip', '1', '3D', 'Pcl.Subham'),
(105, 'Trục mâm xoay Unscrambler Posimat 3.png', '', '', '2', '0', 'Trục mâm xoay Unscrambler Posimat 3'),
(106, 'QUE DA CHAI POSIMAT 24.5X200MM PHI 14MM.pdf', '', '', '1', '0', 'QUE DA CHAI POSIMAT 24.5X200MM PHI 14MM'),
(107, 'PAD MOC TAY KEP 40X7XX (BAC THAU DAU).PDF', '', '', '1', '0', 'PAD MOC TAY KEP 40X7XX (BAC THAU DAU)'),
(108, 'Hcl.STM. Puck 900ml ver 05.PDF', '', '', '1', '0', 'Hcl.STM. Puck 900ml ver 05'),
(109, 'BEL. GC Chốt kéo wrapping FK350.PDF', 'Thép C45', '', '1', '2D', 'BEL. GC chốt kéo wrapping FK350'),
(110, 'BEL. GC Chốt nối fi 10 x 35mm FK350.PDF', 'SUS 304', '', '1', '2D', 'BEL. GC chốt nối fi 10*35mm KF350'),
(111, 'BEL. GC Đầu piston rót FK350 Version 3.PDF', 'SUS 304', '', '1', '2D', 'BEL. GC đầu piston rót KF350 Version 3'),
(112, 'BEL. GC Vòng đệm van rót easypack.pdf', 'SUS 304', '', '1', '2D', 'BEL. GC Vòng đệm van rót easypack'),
(113, 'BEL. GC Ty van back pressure UHT TLC.PDF', 'SUS 304', '', '1', '2D', 'BEL. GC Ty van back pressure UHT TLC'),
(114, 'Oring vòi fill cif.png', '', '', '1', '0', 'Oring vòi fill cif'),
(115, 'Oral. Cif. Gia công bánh xe vặn nắp silicon.png', '', '', '1', '0', 'Oral. Cif. Gia công bánh xe vặn nắp silicon'),
(116, 'Hcl.STM.Capping.Nhông côn Z22M2.5.pdf', '', '', '1', '0', 'Hcl.STM.Capping.Nhông côn Z22M2.5'),
(117, 'Cot Khuôn Tube.PDF', 'C45', '', '1', '2D', 'UNI.Oral.Cot gia khuôn'),
(118, 'Bepex. Luoi tao hat.pdf', '', '', '1', '2D', 'bepex - canh tao hat'),
(119, 'Truc chu dong may dan thung.PDF', 'C45', '', '1', '2D', 'HCL.truc chu dong may dan thung'),
(120, 'Truc Trung Gian Keo Belt POSIMAS.PDF', 'C45', '', '1', '2D', 'HCL.truc trung gian keo belt Posimas'),
(121, 'bepex-luoi tao hat. A00.zip', '', 'Zip', '1', '3D', 'bepex-luoi tao hat. A00'),
(123, 'Ma kep phu L7.as.zip', '', '', '1', '3D', 'Uni.Oral Line7.Ma Kep Phu'),
(124, 'Oral.Ma kep Phu.zip', '', '', '1', '3D', 'Uni.Oral.Ma Kep Phu'),
(125, 'DAO XE TUI HASSIA PCL.pdf', '', '', '1', '0', 'DAO XE TUI HASSIA PCL'),
(126, 'Food. Bepex. Nhong Truc 5 Canh. Spur m4 a 332.PDF', '', '', '1', '2D', 'Food. Bepex. Nhong Truc 5 Canh. Spur m4 a 332'),
(127, 'Choose file', '', '', '1', '0', 'HCL. STM. BELT VAN NAP 70L - 1171'),
(128, 'Oral. Line 7. Ma kep phu. L7.pdf', '', '', '1', '2D', 'Oral. Line 7. Ma kep phu. L7'),
(129, 'Oral. line 2. Bo ma kep phu.L2.pdf', '', '', '1', '2D', 'Oral. line 2. Bo ma kep phu.L2'),
(130, 'PO 1. KEP 1.8 L.zip', '', '', '1', '0', 'Kẹp cổ chai loại 1L8 máy po1'),
(131, 'eco. 2l.KEP FILL ECO 2L.zip', '', '', '1', '0', 'posimat 1. kep fill. 1.8L'),
(132, 'PCL.Hassia.voi fill.rar', '', '', '1', '0', 'PCL.Hassia.voi fill'),
(133, 'Hcl.STM. Puck 900ml ver 05.rar', '', 'Zip', '1', '3D', 'Hcl.STM. Puck 900ml ver 05'),
(134, 'Gia công cốt truyền động đai CPC Gia công cốt truyền động gài hộp.png', '', '', '1', '2D', 'Gia công cốt truyền động đai CPC Gia công cốt truyền động gài hộp'),
(135, 'TY TAY KEP MASTERPACK INOX 316 88X8XM5.png', '', '', '1', '2D', 'TY TAY KEP MASTERPACK INOX 316 88X8XM5'),
(136, 'TY MESPACK M8 L135.png', '', '', '1', '2D', 'TY MESPACK M8 L135'),
(137, 'Oral. Line 3. Chu U Tay Gat Bom.zip', '', 'Zip', '1', '0', 'Oral. Line 3. Chu U Tay Gat Bom'),
(138, 'Part tram bom Line 3.PDF', '', '', '1', '2D', 'Part tram bom Line 3'),
(139, 'Truc gài hôp L4,3.PDF', '', '', '1', '2D', 'Truc gài hôp L4,3'),
(140, 'STM. Raid nap.zip', 'SUS 304', 'file Zip', '1', '3D', 'Hcl.STM. Raid nap'),
(141, 'ORAL-MIXING-AZO Line 4nhong danh bot.SLDPRT', '', '', '1', '3D', 'ORAL-MIXING-AZO Line 4nhong danh bot'),
(142, 'ORAL-MIXING-AZO Line 4nhong danh bot 1.SLDPRT', '', '', '1', '3D', 'ORAL-MIXING-AZO Line 4nhong danh bot 1'),
(143, 'ORAL-CP-Line 3,4,5.Cot truyen dong Motor dan thung.PDF', '', '', '1', '2D', 'ORAL-CP-Line 3,4,5.Cot truyen dong Motor dan thung'),
(144, 'ORAL-LINE 3,4-Cot tay gat 15.PDF', '', '', '1', '2D', 'ORAL-LINE 3,4-Cot tay gat 15'),
(145, 'ORAL-LINE 3.4.5.6.7.Bulong Co Tram Bom.PDF', '', '', '1', '2D', 'ORAL-LINE 3.4.5.6.7.Bulong Co Tram Bom'),
(146, 'Gia công chốt 1 cụm dán keo máy bung thùng.png', '', '', '1', '2D', 'Gia công chốt 1 cụm dán keo máy bung thùng'),
(147, 'Gia công chốt 2 cụm dán keo máy bung thùng.png', '', '', '1', '2D', 'Gia công chốt 2 cụm dán keo máy bung thùng'),
(148, 'HCL.STN.Than voi fill.zip', 'SUS 304', '', '1', '3D', 'Hcl. STN. Than voi fill'),
(149, 'Gia công khớp xoay trục đẩy ngàm ép.  Note  Bạc thâu dầu và Ren trái.png', '', '', '1', '2D', 'Gia công khớp xoay trục đẩy ngàm ép.  Note  Bạc thâu dầu và Ren trái'),
(150, 'Choose file', 'inox', '', '2', '2D', 'Unilever. rulo băng tải tăng tốc scara'),
(151, 'Cam Dao Cat Trong.mcam', '', '', '1', 'CNC', 'Cam dao cắt trong'),
(152, 'con lan posimat co vanh.PDF', '', '', '1', '2D', 'con lan posimat co vanh'),
(153, 'CON LAN DAN HUONG XICH NHUA POSIMAT .PDF', '', '', '1', '2D', 'CON LAN DAN HUONG XICH NHUA POSIMAT '),
(154, 'Gia công ngàm ép nhiệt Line 2.png', '', '', '1', '2D', 'Gia công ngàm ép nhiệt Line 2'),
(155, 'ORAL-LINE 3,4 FILLER-NAP VAN XOAY.PDF', '', '', '1', '2D', 'ORAL-LINE 3,4 FILLER-NAP VAN XOAY'),
(156, 'CON LAN DAN HUONG XICH NHUA POSIMAT .PDF', '', '', '2', '2D', 'CON LAN DAN HUONG XICH NHUA POSIMAT '),
(157, 'con lan posimat co vanh.PDF', '', '', '2', '2D', 'con lan posimat co vanh'),
(158, '2020.01.359.a.D60.nozzle 07.pdf', '', '', '1', '2D', '2020.01.359.a.D60.nozzle 07'),
(159, '2020.01.359.a.D60.nozzle 08-Default.pdf', '', '', '1', '2D', '2020.01.359.a.D60.nozzle 08-Default'),
(160, '2020.01.359.a.D60.nozzle 01-Default.pdf', '', '', '1', '2D', '2020.01.359.a.D60.nozzle 01-Default'),
(161, 'TRUC VISME BSSZ2505-760 MISUMI.pdf', '', '', '1', '2D', 'TRUC VISME BSSZ2505-760 MISUMI'),
(162, 'posimat BN.nozzle.01.pdf', '', '', '1', '2D', 'posimat BN.nozzle.01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keri_product`
--

CREATE TABLE `tbl_keri_product` (
  `idProduct` int(11) NOT NULL,
  `nameProduct` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `priceProduct` float NOT NULL,
  `dvtProduct` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `vatProduct` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tbl_keri_product`
--

INSERT INTO `tbl_keri_product` (`idProduct`, `nameProduct`, `priceProduct`, `dvtProduct`, `vatProduct`) VALUES
(1, 'Oral. Khuon tube Ø32 L2', 0, 'CÁI', '10%'),
(2, 'Hcl. Dao cat tui mespack 420. Đe', 0, 'PCS', '10%'),
(3, 'Hcl. Masterpack. Gia công lò xo nén Masterpack: D16xd12x2xP6.67', 0, 'PCS', '10%'),
(5, 'Hcl. Dao cat tui mespack 420. Dao', 0, 'PCS', '10%'),
(6, 'ORAL. CYCLINDER FINGER ROBOT DVH 22.015', 0, 'PCS', '10%'),
(7, 'HCL. Ty ngàm ép Mespack 2', 0, 'PCS', '10%'),
(9, 'HCL. Rulo máy case sealer Mes2', 0, 'PCS', '10%'),
(10, 'HCL. Rulo máy case sealer Lee4', 0, 'PCS', '10%'),
(11, 'FOOD. Forming tube 1.2  900', 0, 'BỘ', '10%'),
(12, 'ORAL. Khuon tube Ø35 lun', 0, 'PCS', '10%'),
(13, 'ORAL. Khuon tube Ø32 L7', 0, 'PCS', '10%'),
(14, 'ORAL. Khuon tube Ø32 L2', 0, 'PCS', '10%'),
(15, 'ORAL. BULON THEP GIU CON LAN', 0, 'PCS', '10%'),
(16, 'ORAL. Khuon tube Ø38 L7', 0, 'PCS', '10%'),
(17, 'HCL. Khớp nối núm hút thùng', 0, 'PCS', '10%'),
(18, 'Oral. Gia công nhông handwheel', 0, 'BỘ', '10%'),
(19, 'Food. Casepacker. Tai xich ga khuôn', 0, 'PCS', '10%'),
(20, 'Oral. Gia công bộ lói tube', 0, 'BỘ', '10%'),
(21, 'Food. Casepacker. Tai xich ga khuôn 02', 0, 'PCS', '10%'),
(22, 'Cung cấp cầu trượt sau depuck line STN', 0, 'BỘ', '10%'),
(23, 'BELT CAPPER TREN 25L-1476 ST4', 0, 'SỢI', '10%'),
(24, 'BELT CAPPER DUOI 40L-1619 ST4', 0, 'SỢI', ''),
(25, '\"Cung cấp đai răng 37-22-1450 (Belt truyền động motor chính - Line 6)\"', 0, 'SỢI', '10%'),
(26, 'Finger size 22', 0, 'PCS', ''),
(27, 'Ty ngàm ép Mespack 2', 0, 'PCS', ''),
(28, 'Bộ chia làn máy superpack  02', 0, 'PCS', ''),
(29, 'Bộ chia làn máy superpack  01', 0, 'PCS', ''),
(30, 'Pusher máy cartoner 1, 2', 0, 'BỘ', ''),
(31, 'Ty gắp phôi máy Cartoner 1, 2', 0, 'PC', ''),
(32, 'Gia công bát con lăn tay gạt', 0, 'SET', ''),
(33, 'Gia công cò móc bơm', 0, 'PCS', ''),
(34, 'Gia công bộ móc bơm', 0, 'SET', ''),
(35, 'Khuon tube Ø22 L6', 0, 'PCS', ''),
(36, 'Con lăn BTU (bạc đạn 6203RS bọc PU độ cứng 90 shore)', 0, 'PCS', ''),
(37, 'Kẹp cổ chai loại 1L8 máy po1', 0, 'PCS', '10%'),
(38, 'Bel. Bánh Răng Tear Tape FK 350_01', 650000, 'PC', '10%'),
(39, 'BEL. Bánh Răng Tear Tape FK350_02', 480000, 'PC', '10%'),
(40, 'Bel. Tool uốn dao cắt FK part 1', 3250000, 'PC', '10%'),
(41, 'Bel. Tool uốn dao cắt FK part 2', 1250000, 'PC', '10%'),
(42, 'Bel. Tool uốn dao cắt FK part 3', 1050000, 'PC', '10%'),
(43, 'Bel. Tool uốn dao cắt FK part 4', 400000, 'PC', '10%'),
(44, 'BEL. GC chốt kéo wrapping FK350', 220000, 'PC', '10%'),
(45, 'BEL. GC chốt nối fi 10*35mm FK350', 150000, 'PC', '10%'),
(46, 'BEL. GC đầu piston rót FK350 Version 3', 650000, 'PC', '10%'),
(47, 'BEL. GC Vòng đệm van rót easypack', 60000, 'PC', '10%'),
(48, 'BEL. GC Ty van back pressure UHT TLC', 1250000, 'PC', '10%'),
(49, 'Gia công khớp xoay trục đẩy ngàm ép.', 0, 'PCS', '10%'),
(50, 'Gia công nắp chụp điện trở ngàm ép ngang-dọc', 0, 'PCS', '10%'),
(51, 'Gia công khớp nối hopper chờ', 0, 'PCS', '10%'),
(52, 'Gia công bộ kẹp phụ ngàm ép ', 0, 'PCS', '10%'),
(53, 'TRUC VIS DINH LUONG', 0, 'BỘ', '10%'),
(54, 'Oral. Line 2. Phục hồi bộ Gripper size 32', 0, 'BỘ', '10%'),
(55, 'Pc. Tube. Phốt', 0, 'PC', '10%'),
(56, 'Gia công chốt 1 cụm dán keo máy bung thùng', 0, 'PCS', '10%'),
(57, 'Hộp số Bonfig 1/18 ', 0, 'PCS', '10%'),
(58, 'Dây H 50 - 640', 0, 'PCS', '10%'),
(59, 'Cung cấp ổ bi vitme SFSR03210C1D-A', 0, 'PCS', '10%'),
(60, 'BULON CHIU LUC M6X 24MM', 0, 'PCS', '10%'),
(61, 'BULON CHIU LUC M4X 17MM', 0, 'PCS', ''),
(62, 'BULON CHIU LUC M4X 17MM', 0, 'PCS', '10%'),
(63, '', 0, '0', ''),
(64, 'TRUC BANG TAI BOC CAO SU PHI 20X800MM', 0, 'PCS', '10%'),
(65, 'TRUC DONG CHONG AKASH PHI 20', 0, 'PCS', '10%'),
(66, 'Over. Khung gá nhôm - VL 7075', 0, 'PCS', '10%'),
(67, 'Vòng đệm silicon', 0, 'PCS', '10%'),
(68, 'Lục giác côn M5', 0, 'PCS', '10%'),
(69, 'D40 - D 55', 0, 'PCS', '10%'),
(70, 'D55 - D60', 0, 'PCS', '10%'),
(71, 'Khớp nối Mixing', 0, 'PCS', ''),
(72, 'Line 2. Cartoner. Hộp số 1:10 ( 400w)', 0, 'PCS', '10%'),
(73, 'Khớp nối Mixing', 0, 'PCS', '10%'),
(74, 'Bạc tay đòn Mespack1,2-food', 0, 'PCS', '10%'),
(75, 'Bánh xe vặn nắp STN', 0, 'PCS', '10%'),
(76, 'Tiện semi cho trục bơm bị mòn', 0, 'PCS', '10%'),
(77, 'Thay phốt bơm', 0, 'PCS', '10%'),
(78, 'Gia công khớp nối mềm bơm', 0, 'PCS', '10%'),
(79, 'Gia công Trục (thép C45,đánh bóng bề mặt) phi 25x995', 0, 'PCS', '10%'),
(80, 'Gia công Trục (thép C45,đánh bóng bề mặt) phi 25x980', 0, 'PCS', '10%'),
(81, 'Gia công Trục (thép C45,đánh bóng bề mặt) phi 25x855', 0, 'PCS', '10%'),
(82, 'Trục mâm xoay Unscrambler', 0, 'PCS', '10%'),
(83, 'Cánh tạo hạt Bepex', 0, 'PCS', '10%'),
(84, 'Gia công chốt 2 cụm dán keo máy bung thùng', 0, 'PCS', '10%'),
(85, 'Pc.Tube. Phot ', 0, 'PCS', '10%'),
(86, 'Gia công ngàm ép nhiệt Line 2', 0, 'PCS', '10%'),
(87, 'Gia công cốt truyền động đai CPC', 0, 'PCS', '10%'),
(88, 'Gia công cốt truyền động gài hộp', 0, 'PCS', '10%'),
(89, 'NGAM EP SILICON 750ML MP2 lỗ ren M4', 0, 'PCS', '10%'),
(90, 'Dau ty voi size 37', 0, 'PCS', '10%'),
(91, 'NGAM EP DOC SILICON 200ML MP2 lỗ ren M3', 0, 'PCS', '10%'),
(92, 'THAN VOI FILL STN', 0, 'PCS', '10%'),
(93, 'Dao xe lan may akash - HCL', 0, 'PCS', '10%'),
(94, 'Gia công và cung cấp bản vẽ mới trục truyền động băng tải tốc độ nhanh scara LP3', 0, 'PCS', '10%'),
(95, 'Gia công đầu kẹp nắp và pát kết nối', 0, 'PCS', '10%'),
(96, 'Khảo sát, cung cấp bản vẽ và gia công mới giá đỡ tay kẹp cụm bung thùng', 0, 'PCS', '10%'),
(97, 'TRUC VIS DINH LUONG', 0, 'PCS', '10%'),
(98, 'Gia công trục máy đống chồng của Line Akash (Gia công trục mới + Bạc đạn 2 bên)', 0, 'PCS', '10%'),
(99, 'Gia công nhông côn capper ST4', 0, 'BỘ', '10%'),
(100, 'Kẹp cổ chai trên Posimat 3 - 3,8kg', 0, 'BỘ', ''),
(101, 'Kẹp cổ chai dưới Posimat 3 - 3,8kg', 0, 'BỘ', ''),
(102, 'Kẹp cổ chai dưới Posimat 3 - 1,0kg FC', 0, 'BỘ', ''),
(103, 'Hcl. Posimat. Bộ dựng chai. Pulli', 0, 'BỘ', ''),
(104, 'Gia công gá khay 330 scara Leepack3', 0, 'PCS', '10%'),
(105, 'Gia công pad xích gá khay 35 scara Leepack3', 0, 'PCS', ''),
(106, 'Gia công Khay đựng túi 330 scara Leepack3', 0, 'PCS', ''),
(107, 'Gia công mới đế gắn bộ kéo màng', 0, 'PCS', '10%'),
(108, 'Bộ chia làn máy superpack  02', 0, 'PCS', '10%'),
(109, 'Finger size 22', 0, 'BỘ', '10%'),
(110, 'Oral. Line 6. Gripper Modiffy ->13kg - đồng bộ các line 3.4.5.7 vì Robot các line sau Tải trọng thấp hơn 5kg', 0, 'BỘ', '10%'),
(111, 'Oral. Line 2. Phục hồi bộ Gripper size 35', 0, 'BỘ', '10%'),
(112, 'Bơm - Mixing - Phục hồi', 0, 'SET', '10%'),
(113, 'Phục hồi cánh bơm PVC - Vim', 0, 'PCS', '10%'),
(114, 'Hcl.leepack 4. part bung túi', 0, 'PCS', '10%'),
(115, 'THANH DAN HUONG CUM VOI FILL MES2 - MC', 0, 'PCS', '10%'),
(116, 'BO BANH RANG MAY XEP THUNG LEEPACK', 0, 'PCS', '10%'),
(117, 'Dao MP Foods', 0, 'BỘ', '10%'),
(118, 'Dau ty voi size 49', 0, 'PCS', '10%'),
(119, 'MAI DAO MESPACK FOODS', 0, 'BỘ', '10%'),
(120, 'QUE DA CHAI POSIMAT 24.5X200MM PHI 14MM', 0, 'PCS', '10%'),
(121, 'TY TAY KEP MASTERPACK INOX 316 88X8XM5', 0, 'PCS', '10%'),
(122, 'CO VOI FILL STN 103.48x92.73 PHI50-44.94', 0, 'PCS', '10%'),
(123, 'Ty vòi fill Hassia PCL', 0, 'PCS', '10%'),
(124, 'Đầu vòi fill Hassia PCL', 0, 'PCS', '10%'),
(125, 'MA KEP PHU L2', 0, 'PCS', '10%'),
(126, 'MA KEP PHU L7', 0, 'PCS', '10%');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keri_seri`
--

CREATE TABLE `tbl_keri_seri` (
  `seri_id` bigint(20) NOT NULL,
  `serinumber` text NOT NULL,
  `idEmployer` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_keri_seri`
--

INSERT INTO `tbl_keri_seri` (`seri_id`, `serinumber`, `idEmployer`) VALUES
(10, '680', 3),
(9, '681', 3),
(8, '676', 3),
(7, '668', 3),
(5, '682', 3),
(6, '683', 3),
(11, '672', 3),
(12, '675', 3),
(13, '671', 3),
(14, 'MAY STACKER', 5),
(15, 'MAY AUTOPACK', 5),
(16, 'MAY STRATBOX', 5),
(17, 'MAY XEP THUNG', 5),
(18, 'MAY EP VI', 4),
(19, 'KHUON BANH BAO', 6),
(20, 'MAY RA NHAN - DOI', 6),
(21, 'MAY RA NHAN - DON', 6),
(22, 'PO 4200928789', 5),
(23, 'PO 4200924955', 5),
(29, '695', 3),
(28, '696', 3),
(27, 'PO 4200936564', 5),
(30, 'DO 701', 3),
(31, '641', 3),
(32, '659', 3),
(33, '660', 3),
(34, '662', 3),
(35, '663', 3),
(36, '664', 3),
(37, '665', 3),
(38, '670', 3),
(39, '693', 3),
(44, '669', 3),
(41, '', 0),
(42, 'DO 623', 3),
(43, 'DO 697', 3),
(45, '678', 3),
(46, '685', 3),
(47, '686', 3),
(48, '689', 3),
(49, '690', 3),
(50, '692', 3),
(51, '694', 3),
(52, '698', 3),
(53, '699', 3),
(56, '715', 3),
(55, '716', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keri_workstatus`
--

CREATE TABLE `tbl_keri_workstatus` (
  `id` int(11) NOT NULL,
  `workStatus` varchar(320) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_keri_workstatus`
--

INSERT INTO `tbl_keri_workstatus` (`id`, `workStatus`) VALUES
(0, 'ĐANG LÀM'),
(1, 'HOÀN THÀNH'),
(2, 'GIA CÔNG'),
(3, 'ĐÃ GIAO'),
(4, 'PHIẾU PGH'),
(5, 'CÔNG NỢ'),
(6, 'ĐÃ THU TIỀN'),
(7, 'N/A - PO'),
(8, 'CHỜ GIAO'),
(9, 'HỦY');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_details`
--

CREATE TABLE `tbl_product_details` (
  `id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `drawing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `embryo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` int(255) NOT NULL,
  `into_money` int(255) NOT NULL,
  `vat` int(255) NOT NULL,
  `into_money_vat` int(255) NOT NULL,
  `pay` int(255) NOT NULL,
  `rest` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `date_user` int(11) DEFAULT NULL,
  `address_user` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone_user` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `name_user`, `date_user`, `address_user`, `phone_user`) VALUES
(22, 'admin', 999999999, 'HpsAdmin', 0),
(23, 'nhphuong', 999999999, 'HpsAdmin', 0),
(26, 'hung', 123, 'cty', 90),
(27, 'test', 123, '', 0),
(28, 'Hau', 456, 'Cty', 90),
(29, 'Huong', 456789, '', 0),
(30, '', 0, '', 0),
(31, 'Hong Phuc', 0, '', 0),
(33, '', 0, '', 0),
(34, 'KimNgan', 88888888, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `typeauthen`
--

CREATE TABLE `typeauthen` (
  `idAuthentication` int(11) NOT NULL,
  `nameAuthentication` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `typeauthen`
--

INSERT INTO `typeauthen` (`idAuthentication`, `nameAuthentication`) VALUES
(1, 'ADD'),
(2, 'UPDATE'),
(3, 'DELETE'),
(4, 'VIEW');

-- --------------------------------------------------------

--
-- Table structure for table `verpicture`
--

CREATE TABLE `verpicture` (
  `idVerPicture` int(11) NOT NULL,
  `idPicture` int(11) NOT NULL,
  `typePicture` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `versionPicture` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`idEmployer`);

--
-- Indexes for table `tbl_keri_category`
--
ALTER TABLE `tbl_keri_category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Indexes for table `tbl_keri_contract`
--
ALTER TABLE `tbl_keri_contract`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `runtestdate` (`runtestdate`),
  ADD KEY `electricdate` (`electricdate`),
  ADD KEY `generalconnectdate` (`generalconnectdate`),
  ADD KEY `zairioconnectdate` (`zairioconnectdate`),
  ADD KEY `zairiodate` (`zairiodate`),
  ADD KEY `techdate` (`techdate`);

--
-- Indexes for table `tbl_keri_dvh`
--
ALTER TABLE `tbl_keri_dvh`
  ADD PRIMARY KEY (`idDvh`);

--
-- Indexes for table `tbl_keri_maintenancetech`
--
ALTER TABLE `tbl_keri_maintenancetech`
  ADD PRIMARY KEY (`idMaintenance`);

--
-- Indexes for table `tbl_keri_permission`
--
ALTER TABLE `tbl_keri_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_keri_picture`
--
ALTER TABLE `tbl_keri_picture`
  ADD PRIMARY KEY (`idPicture`);

--
-- Indexes for table `tbl_keri_picture_free`
--
ALTER TABLE `tbl_keri_picture_free`
  ADD PRIMARY KEY (`idPictureFree`);

--
-- Indexes for table `tbl_keri_product`
--
ALTER TABLE `tbl_keri_product`
  ADD PRIMARY KEY (`idProduct`);

--
-- Indexes for table `tbl_keri_seri`
--
ALTER TABLE `tbl_keri_seri`
  ADD PRIMARY KEY (`seri_id`);

--
-- Indexes for table `tbl_keri_workstatus`
--
ALTER TABLE `tbl_keri_workstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_details`
--
ALTER TABLE `tbl_product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `typeauthen`
--
ALTER TABLE `typeauthen`
  ADD PRIMARY KEY (`idAuthentication`);

--
-- Indexes for table `verpicture`
--
ALTER TABLE `verpicture`
  ADD PRIMARY KEY (`idVerPicture`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `idEmployer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_keri_category`
--
ALTER TABLE `tbl_keri_category`
  MODIFY `idCategory` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_keri_contract`
--
ALTER TABLE `tbl_keri_contract`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_keri_dvh`
--
ALTER TABLE `tbl_keri_dvh`
  MODIFY `idDvh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_keri_maintenancetech`
--
ALTER TABLE `tbl_keri_maintenancetech`
  MODIFY `idMaintenance` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_keri_permission`
--
ALTER TABLE `tbl_keri_permission`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_keri_picture`
--
ALTER TABLE `tbl_keri_picture`
  MODIFY `idPicture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `tbl_keri_picture_free`
--
ALTER TABLE `tbl_keri_picture_free`
  MODIFY `idPictureFree` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `tbl_keri_product`
--
ALTER TABLE `tbl_keri_product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `tbl_keri_seri`
--
ALTER TABLE `tbl_keri_seri`
  MODIFY `seri_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_keri_workstatus`
--
ALTER TABLE `tbl_keri_workstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_product_details`
--
ALTER TABLE `tbl_product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `typeauthen`
--
ALTER TABLE `typeauthen`
  MODIFY `idAuthentication` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `verpicture`
--
ALTER TABLE `verpicture`
  MODIFY `idVerPicture` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
