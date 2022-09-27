-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2021 at 07:27 AM
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
  `idPictureFree` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tbl_keri_picture`
--

INSERT INTO `tbl_keri_picture` (`idPicture`, `idCustomer`, `dvhNumber`, `idProject`, `quantityPicture`, `pricePicture`, `vatPicture`, `idPictureFree`) VALUES
(1, 1, 1, 1, 10, 10000, '10%', 1),
(2, 1, 1, 2, 10, 15000, '10%', 2),
(3, 2, 2, 1, 25, 19000, '10%', 3),
(4, 2, 2, 1, 25, 20000, '10%', 1),
(5, 1, 3, 1, 15, 30000, '10%', 2),
(6, 0, 0, 1, 0, 10000, '10%', 0),
(7, 3, 7, 0, 0, 0, '', 9),
(8, 3, 7, 18, 2, 0, '10%', 9),
(9, 3, 10, 21, 10, 0, '', 12),
(10, 3, 10, 19, 10, 0, '10%', 10),
(11, 3, 10, 21, 10, 0, '10%', 11),
(12, 3, 9, 37, 0, 0, '10%', 74),
(13, 5, 22, 38, 2, 650, '10%', 80),
(14, 5, 22, 39, 2, 480, '10%', 81),
(15, 5, 23, 40, 1, 3250, '10%', 82),
(16, 5, 23, 41, 1, 1250, '10%', 83),
(17, 5, 23, 42, 1, 1050, '10%', 84),
(18, 5, 23, 43, 2, 400, '10%', 85),
(19, 7, 24, 1, 25, 0, '10%', 21);

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
(99, 'Oral. Piston xylanh định lượng.zip', 'SUS 316', '', '1', 'CNC', 'Oral. Piston xylanh định lượng');

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
(2, 'Hcl. Dao cat tui mespack 420. Đe', 0, 'PC', '10%'),
(3, 'Hcl. Masterpack. Gia công lò xo nén Masterpack: D16xd12x2xP6.67', 0, 'PC', '10%'),
(5, 'Hcl. Dao cat tui mespack 420. Dao', 0, 'PC', ''),
(6, 'ORAL. CYCLINDER FINGER ROBOT DVH 22.015', 0, 'PCS', '10%'),
(7, 'HCL. Ty ngàm ép Mespack 2', 0, 'PC', '10%'),
(9, 'HCL. Rulo máy case sealer Mes2', 0, 'PC', '10%'),
(10, 'HCL. Rulo máy case sealer Lee4', 0, 'PC', '10%'),
(11, 'FOOD. Forming tube 1.2  900', 0, 'BỘ', '10%'),
(12, 'ORAL. Khuon tube Ø35 lun', 0, 'PCS', '10%'),
(13, 'ORAL. Khuon tube Ø32 L7', 0, 'PCS', '10%'),
(14, 'ORAL. Khuon tube Ø32 L2', 0, 'PCS', '10%'),
(15, 'ORAL. BULON THEP GIU CON LAN', 0, 'PCS', '10%'),
(16, 'ORAL. Khuon tube Ø38 L7', 0, 'PCS', '10%'),
(17, 'HCL. Khớp nối núm hút thùng', 0, 'PC', '10%'),
(18, 'Oral. Gia công nhông handwheel', 0, 'BỘ', '10%'),
(19, 'Food. Casepacker. Tai xich ga khuôn', 0, 'PC', '10%'),
(20, 'Oral. Gia công bộ lói tube', 0, 'BỘ', ''),
(21, 'Food. Casepacker. Tai xich ga khuôn 02', 0, 'PC', '10%'),
(22, 'Cung cấp cầu trượt sau depuck line STN', 0, 'BỘ', '10%'),
(23, 'BELT CAPPER TREN 25L-1476 ST4', 0, 'SỢI', '10%'),
(24, 'BELT CAPPER DUOI 40L-1619 ST4', 0, 'SỢI', ''),
(25, '\"Cung cấp đai răng 37-22-1450 (Belt truyền động motor chính - Line 6)\"', 0, 'SỢI', ''),
(26, 'Finger size 22', 0, 'PCS', ''),
(27, 'Ty ngàm ép Mespack 2', 0, 'PC', ''),
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
(38, 'Bel. Bánh Răng Tear Tape FK 350_01', 650, 'PC', '10%'),
(39, 'BEL. Bánh Răng Tear Tape FK350_02', 480, 'PC', '10%'),
(40, 'Bel. Tool uốn dao cắt FK part 1', 3250, 'PC', '10%'),
(41, 'Bel. Tool uốn dao cắt FK part 2', 1250, 'PC', '10%'),
(42, 'Bel. Tool uốn dao cắt FK part 3', 1050, 'PC', '10%'),
(43, 'Bel. Tool uốn dao cắt FK part 4', 400, 'PC', '10%');

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
(23, 'PO 4200924955', 5);

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
(24, 'normaluser', 111111, '', 0),
(26, 'hung', 123, 'cty', 90),
(27, 'test', 123, '', 0),
(28, 'Hau', 456, 'Cty', 90),
(29, 'Huong', 456789, '', 0);

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
  MODIFY `idPicture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_keri_picture_free`
--
ALTER TABLE `tbl_keri_picture_free`
  MODIFY `idPictureFree` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tbl_keri_product`
--
ALTER TABLE `tbl_keri_product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_keri_seri`
--
ALTER TABLE `tbl_keri_seri`
  MODIFY `seri_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_product_details`
--
ALTER TABLE `tbl_product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
