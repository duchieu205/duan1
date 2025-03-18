-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 18, 2025 at 02:59 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan11`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `MA_BINHLUAN` int NOT NULL,
  `MA_SP` int NOT NULL,
  `MA_KH` int NOT NULL,
  `BINHLUAN` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `NGAYBINHLUAN` date NOT NULL,
  `TRANGTHAI` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`MA_BINHLUAN`, `MA_SP`, `MA_KH`, `BINHLUAN`, `NGAYBINHLUAN`, `TRANGTHAI`) VALUES
(1, 1, 8, 'Hàng rất đẹp', '2024-12-10', 'Đã duyệt'),
(2, 2, 8, 'Hàng tốt', '2024-12-10', 'Đã duyệt'),
(3, 2, 8, 'Hàng rất ok sốp à', '2024-12-10', 'Đã duyệt'),
(4, 1, 10, 'Hàng tốt', '2024-12-10', 'Đã duyệt'),
(5, 2, 10, 'Hàng rất đẹp', '2024-12-10', 'Chờ xác nhận'),
(6, 2, 10, 'Hàng đẹp', '2024-12-10', 'Chờ xác nhận'),
(7, 2, 10, 'Hàng đẹp', '2024-12-10', 'Chờ xác nhận'),
(8, 1, 10, 'Hàng rẻ và chất lượng', '2024-12-10', 'Đã duyệt'),
(9, 3, 9, 'Hàng đẹp đó', '2024-12-10', 'Chờ xác nhận'),
(10, 2, 9, 'Hàng đẹp đó', '2024-12-11', 'Chờ xác nhận');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `MA_DONHANG` int NOT NULL,
  `MA_KH` int NOT NULL,
  `NGAYHOANTHANH` date DEFAULT NULL,
  `DIACHI` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `TONGTIEN` int DEFAULT NULL,
  `TRANGTHAI` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `GHICHU` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`MA_DONHANG`, `MA_KH`, `NGAYHOANTHANH`, `DIACHI`, `TONGTIEN`, `TRANGTHAI`, `GHICHU`) VALUES
(60, 10, '2024-12-09', 'Hà Nộiii', 36890000, 'Đã hủy', 'Hàng lỗi'),
(61, 10, '2024-12-09', 'Hà Nộiii', 30999999, 'Từ chối Trả hàng/Hoàn tiền', 'Hàng lỗi'),
(62, 10, '2024-12-09', 'Hà Nộiii', 30999999, 'Đã hủy', 'Hàng lỗi'),
(63, 10, '2024-12-09', 'Hà Nộiii', 30999999, 'Xác nhận Trả hàng/Hoàn tiền', 'Hàng lỗi'),
(64, 10, '2024-12-09', 'Hà Nộiii', 19900000, 'Chờ xác nhận trả hàng/hoàn tiền', 'Hàng lỗi'),
(65, 10, '2024-12-09', 'Hà Nộiii', 16990000, 'Xác nhận Trả hàng/Hoàn tiền', 'Hàng lỗi'),
(66, 10, '2024-12-11', 'Hà Nộiii', 30999999, 'Đã hủy', 'Hàng không chất lượng'),
(67, 10, '2024-12-11', 'Hà Nộiii', 19900000, 'Đã hủy', 'Hàng lỗi'),
(68, 10, '2024-12-11', 'Hà Nộiii', 16990000, 'Đang giao', NULL),
(69, 10, '2024-12-11', 'Hà Nộiii', 16990000, 'Đã hủy', 'Hàng lỗi'),
(70, 9, '2024-12-11', 'Hà Nội', 30999999, 'Đã hủy', 'Hàng lỗi'),
(71, 10, '2024-12-11', 'Hà Nộiii', 19900000, 'Đã xác nhận', NULL),
(72, 10, '2024-12-11', 'Hà Nộiii', 19900000, 'Thành công', NULL),
(73, 10, '2024-12-11', 'Hà Nộiii', 30999999, 'Đã xác nhận', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donhang_chitiet`
--

CREATE TABLE `donhang_chitiet` (
  `MA_DONHANGCHITIET` int NOT NULL,
  `MA_DONHANG` int NOT NULL,
  `MA_SP` int NOT NULL,
  `THANHTOAN` text,
  `SOLUONG` int DEFAULT NULL,
  `GIA_SP` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `donhang_chitiet`
--

INSERT INTO `donhang_chitiet` (`MA_DONHANGCHITIET`, `MA_DONHANG`, `MA_SP`, `THANHTOAN`, `SOLUONG`, `GIA_SP`) VALUES
(71, 60, 3, 'Ship COD', 1, 19900000),
(72, 60, 4, 'Ship COD', 1, 16990000),
(73, 61, 1, 'Ship COD', 1, 30999999),
(74, 62, 1, 'Ship COD', 1, 30999999),
(75, 63, 1, 'Ship COD', 1, 30999999),
(76, 64, 3, 'Ship COD', 1, 19900000),
(77, 65, 4, 'Ship COD', 1, 16990000),
(78, 66, 1, 'Ship COD', 1, 30999999),
(79, 67, 3, 'Ship COD', 1, 19900000),
(80, 68, 4, 'Ship COD', 1, 16990000),
(81, 69, 4, 'Ship COD', 1, 16990000),
(82, 70, 1, 'Ship COD', 1, 30999999),
(83, 71, 3, 'Ship COD', 1, 19900000),
(84, 72, 3, 'Ship COD', 1, 19900000),
(85, 73, 1, 'Ship COD', 1, 30999999);

-- --------------------------------------------------------

--
-- Table structure for table `giohang_item`
--

CREATE TABLE `giohang_item` (
  `MA_GIOHANGITEM` int NOT NULL,
  `MA_SP` int DEFAULT NULL,
  `MA_KH` int NOT NULL,
  `SOLUONG` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `giohang_item`
--

INSERT INTO `giohang_item` (`MA_GIOHANGITEM`, `MA_SP`, `MA_KH`, `SOLUONG`) VALUES
(133, NULL, 8, 1),
(159, 2, 8, 1),
(241, NULL, 12, 1),
(288, NULL, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MA_KH` int NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(2555) NOT NULL,
  `MATKHAU` varchar(255) NOT NULL,
  `DIACHI` varchar(255) NOT NULL,
  `SDT` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MA_KH`, `NAME`, `EMAIL`, `MATKHAU`, `DIACHI`, `SDT`) VALUES
(1, 'Hiếu', 'vuduc322@gmail.com', 'hieu123', '', ''),
(8, 'Huy Hoàng', 'mavanhieu945@gmail.com', '123', 'Hà Nội', '123'),
(9, 'hiếu', 'mavanhieu309@gmail.com', '123', 'Hà Nội', '0123456789'),
(10, 'hiếuuuu', 'mavanhieu942@gmail.com', '123', 'Hà Nộiii', '12455'),
(11, 'h', 'mavanhieu946@gmail.com', '123', '', ''),
(12, 'hiếu', 'mavanhieu947@gmail.com', '123', 'Bắc Ninh', '0123456789'),
(13, 'hiếu', 'mavanhieu948@gmail.com', '123', '', ''),
(14, '123', 'mavanhieu308@gmail.com', '123', '', ''),
(15, 'hiếu', 'mavanhieu950@gmail.com', '123', '', ''),
(16, 'hiếu', 'mavanhieu951@gmail.com', '123', '', ''),
(17, 'hiếu', 'mavanhieu954@gmail.com', '123', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MA_SP` int NOT NULL,
  `TEN_SP` varchar(255) NOT NULL,
  `MOTA_SP` text NOT NULL,
  `GIA_SP` int NOT NULL,
  `SOLUONG_SP` int NOT NULL,
  `ANH_SP` varchar(255) NOT NULL,
  `MA_THUONGHIEU` int NOT NULL,
  `TRANGTHAI` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MA_SP`, `TEN_SP`, `MOTA_SP`, `GIA_SP`, `SOLUONG_SP`, `ANH_SP`, `MA_THUONGHIEU`, `TRANGTHAI`) VALUES
(1, 'Điện thoại iPhone 16 Plus 128GB', 'Được đổi mới mạnh mẽ về thiết kế, cấu hình cùng một màn hình kích thước lớn đi cùng mang đến nhiều thích thú hơn trong sử dụng.', 30999999, 11, 'img/10.png', 1, 'Còn hàng'),
(2, 'Điện thoại iPhone 15 Plus 256GB', 'Được đổi mới mạnh mẽ về thiết kế, cấu hình cùng một màn hình kích thước lớn đi cùng mang đến nhiều thích thú hơn trong sử dụng.', 20099000, 25, 'img/2.webp', 1, 'Còn hàng'),
(3, 'Điện thoại Iphone 13 Promax', 'Được thiết kế đẹp mắt', 19900000, 19, 'img/1.webp', 1, 'Còn hàng'),
(4, 'Điện thoại Iphone 11 Pro', 'Đẹp và sang trong', 16990000, 13, 'img/11.jpg', 1, 'Còn hàng');

-- --------------------------------------------------------

--
-- Table structure for table `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `MA_TH` int NOT NULL,
  `NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `thuonghieu`
--

INSERT INTO `thuonghieu` (`MA_TH`, `NAME`) VALUES
(1, 'Iphone'),
(2, 'Oppo'),
(3, 'Samsung'),
(4, 'XiaoMi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`MA_BINHLUAN`),
  ADD KEY `fk_5` (`MA_KH`),
  ADD KEY `fk_6` (`MA_SP`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MA_DONHANG`),
  ADD KEY `fk8` (`MA_KH`);

--
-- Indexes for table `donhang_chitiet`
--
ALTER TABLE `donhang_chitiet`
  ADD PRIMARY KEY (`MA_DONHANGCHITIET`),
  ADD KEY `fk20` (`MA_SP`),
  ADD KEY `fk9` (`MA_DONHANG`);

--
-- Indexes for table `giohang_item`
--
ALTER TABLE `giohang_item`
  ADD PRIMARY KEY (`MA_GIOHANGITEM`),
  ADD KEY `fk_4` (`MA_SP`),
  ADD KEY `fk22` (`MA_KH`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MA_KH`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MA_SP`),
  ADD KEY `fk11` (`MA_THUONGHIEU`);

--
-- Indexes for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`MA_TH`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `MA_BINHLUAN` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MA_DONHANG` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `donhang_chitiet`
--
ALTER TABLE `donhang_chitiet`
  MODIFY `MA_DONHANGCHITIET` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `giohang_item`
--
ALTER TABLE `giohang_item`
  MODIFY `MA_GIOHANGITEM` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MA_KH` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MA_SP` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `MA_TH` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `fk_5` FOREIGN KEY (`MA_KH`) REFERENCES `khachhang` (`MA_KH`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_6` FOREIGN KEY (`MA_SP`) REFERENCES `sanpham` (`MA_SP`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `fk8` FOREIGN KEY (`MA_KH`) REFERENCES `khachhang` (`MA_KH`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `donhang_chitiet`
--
ALTER TABLE `donhang_chitiet`
  ADD CONSTRAINT `fk20` FOREIGN KEY (`MA_SP`) REFERENCES `sanpham` (`MA_SP`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk9` FOREIGN KEY (`MA_DONHANG`) REFERENCES `donhang` (`MA_DONHANG`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `giohang_item`
--
ALTER TABLE `giohang_item`
  ADD CONSTRAINT `fk22` FOREIGN KEY (`MA_KH`) REFERENCES `khachhang` (`MA_KH`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_4` FOREIGN KEY (`MA_SP`) REFERENCES `sanpham` (`MA_SP`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk11` FOREIGN KEY (`MA_THUONGHIEU`) REFERENCES `thuonghieu` (`MA_TH`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
