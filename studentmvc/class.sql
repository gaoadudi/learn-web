-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 03, 2019 lúc 04:54 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `class`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophoc`
--

CREATE TABLE `lophoc` (
  `id` int(11) NOT NULL,
  `ma` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phonghoc` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ten` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lophoc`
--

INSERT INTO `lophoc` (`id`, `ma`, `phonghoc`, `ten`) VALUES
(1, 'D16AT2', 'P.101-A2', 'An toàn thông tin 2'),
(2, 'D15AT3', 'P.303-A2', 'An toàn thông tin 3'),
(3, 'D17CN4', 'P.203-A2', 'Công nghệ thông tin 4'),
(4, 'D16CN5', 'P.301-A2', 'Công nghệ thông tin 5'),
(5, 'D16AT4', 'P.303-A2', 'An toàn thông tin 4'),
(6, 'D16AT7', 'P.202-A2', 'An toàn thông tin 7');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `id` int(11) NOT NULL,
  `ma` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ten` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gioitinh` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `idlop` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`id`, `ma`, `ten`, `gioitinh`, `ngaysinh`, `idlop`) VALUES
(1, 'B16AT128', 'Nguyễn Văn Cường', 'Nam', '1998-10-15', 1),
(2, 'B16AT038', 'Đặng Hoàng Chương', 'Nam', '1998-02-14', NULL),
(3, 'B15AT092', 'Nguyễn Phú Cường', 'Nam', '1997-08-15', NULL),
(4, 'B17AT108', 'Nguyễn Thị Thập', 'Nữ', '1999-01-20', 1),
(5, 'B16AT037', 'Trần Văn Đức', 'Nam', '1998-06-18', NULL),
(8, 'B16AT058', 'Phan Trung Hiếu', 'Nam', '1997-12-14', NULL),
(9, 'B17AT033', 'Nguyễn Thị Nga', 'Nữ', '1999-07-07', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idlop` (`idlop`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`idlop`) REFERENCES `lophoc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
