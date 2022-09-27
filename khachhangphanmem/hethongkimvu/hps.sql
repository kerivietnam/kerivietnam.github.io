-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 18, 2021 lúc 10:01 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hps`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `authentication`
--

CREATE TABLE `authentication` (
  `idUser` int(11) NOT NULL,
  `nameScreen` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `urlScreen` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `authenticationUser` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `authentication`
--

INSERT INTO `authentication` (`idUser`, `nameScreen`, `urlScreen`, `authenticationUser`) VALUES
(2, 'themPhoiScreen', 'http://localhost/hpsAdmin/views/authenScreen.php', '[\"1\",\"3\",\"4\"]'),
(2, 'themPhoiScreen', 'http://localhost/hpsAdmin/views/authenScreen.php', '[\"1\",\"2\",\"3\"]'),
(3, 'adminScreen', 'http://localhost/hpsAdmin/views/authenScreen.php', '[\"1\",\"3\"]');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `typeauthen`
--

CREATE TABLE `typeauthen` (
  `idAuthentication` int(11) NOT NULL,
  `nameAuthentication` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `typeauthen`
--

INSERT INTO `typeauthen` (`idAuthentication`, `nameAuthentication`) VALUES
(1, 'ADD'),
(2, 'UPDATE'),
(3, 'DELETE'),
(4, 'VIEW');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `typeauthen`
--
ALTER TABLE `typeauthen`
  ADD PRIMARY KEY (`idAuthentication`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `typeauthen`
--
ALTER TABLE `typeauthen`
  MODIFY `idAuthentication` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
