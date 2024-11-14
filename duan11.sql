-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 14, 2024 at 03:38 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

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
  `BINHLUAN` text NOT NULL,
  `NGAYBINHLUAN` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `MA_DONHANG` int NOT NULL,
  `MA_GIOHANG` int NOT NULL,
  `MA_KH` int NOT NULL,
  `MA_KHUYENMAI` int NOT NULL,
  `NGAYHOANTHANH` date NOT NULL,
  `THANHTOAN` varchar(50) NOT NULL,
  `DIACHI` text NOT NULL,
  `TONGTIEN` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dungluong_sp`
--

CREATE TABLE `dungluong_sp` (
  `MA_DUNGLUONG` int NOT NULL,
  `MA_SP` int NOT NULL,
  `MAU_SP` varchar(50) NOT NULL,
  `DUNGLUONG_SP` varchar(50) NOT NULL,
  `GIA_SP` int NOT NULL,
  `SOLUONG_SP` int NOT NULL,
  `ANH_SP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `MA_GIOHANG` int NOT NULL,
  `MA_KH` int NOT NULL,
  `NGAYDATHANG` date NOT NULL,
  `TRANGTHAI` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giohang_item`
--

CREATE TABLE `giohang_item` (
  `MA_GIOHANGITEM` int NOT NULL,
  `MA_GIOHANG` int NOT NULL,
  `MA_SP` int NOT NULL,
  `SOLUONG_SP` int NOT NULL,
  `GIA_SP` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MA_KM` int NOT NULL,
  `TENKM` varchar(255) NOT NULL,
  `NGAYBATDAU` date NOT NULL,
  `NGAYKETTHUC` date NOT NULL,
  `MA_GIOHANG` int NOT NULL,
  `GIAMGIA` int NOT NULL,
  `MOTA` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mau_sp`
--

CREATE TABLE `mau_sp` (
  `MA_MAU` int NOT NULL,
  `MA_SP` int NOT NULL,
  `MAU` varchar(20) NOT NULL,
  `ANH_SP` varchar(255) NOT NULL,
  `SOLUONG_SP` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `MA_TH` int NOT NULL,
  `NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  ADD KEY `fk8` (`MA_KH`),
  ADD KEY `fk9` (`MA_GIOHANG`),
  ADD KEY `fk10` (`MA_KHUYENMAI`);

--
-- Indexes for table `dungluong_sp`
--
ALTER TABLE `dungluong_sp`
  ADD PRIMARY KEY (`MA_DUNGLUONG`),
  ADD KEY `fk1` (`MA_SP`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`MA_GIOHANG`),
  ADD KEY `fk13` (`MA_KH`);

--
-- Indexes for table `giohang_item`
--
ALTER TABLE `giohang_item`
  ADD PRIMARY KEY (`MA_GIOHANGITEM`),
  ADD KEY `fk_3` (`MA_GIOHANG`),
  ADD KEY `fk_4` (`MA_SP`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MA_KH`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MA_KM`),
  ADD KEY `fk7` (`MA_GIOHANG`);

--
-- Indexes for table `mau_sp`
--
ALTER TABLE `mau_sp`
  ADD PRIMARY KEY (`MA_MAU`),
  ADD KEY `fk_2` (`MA_SP`);

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
  MODIFY `MA_BINHLUAN` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MA_DONHANG` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dungluong_sp`
--
ALTER TABLE `dungluong_sp`
  MODIFY `MA_DUNGLUONG` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `MA_GIOHANG` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giohang_item`
--
ALTER TABLE `giohang_item`
  MODIFY `MA_GIOHANGITEM` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MA_KH` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `MA_KM` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mau_sp`
--
ALTER TABLE `mau_sp`
  MODIFY `MA_MAU` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MA_SP` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `MA_TH` int NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `fk10` FOREIGN KEY (`MA_KHUYENMAI`) REFERENCES `khuyenmai` (`MA_KM`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk8` FOREIGN KEY (`MA_KH`) REFERENCES `khachhang` (`MA_KH`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk9` FOREIGN KEY (`MA_GIOHANG`) REFERENCES `giohang` (`MA_GIOHANG`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `dungluong_sp`
--
ALTER TABLE `dungluong_sp`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`MA_SP`) REFERENCES `sanpham` (`MA_SP`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `fk13` FOREIGN KEY (`MA_KH`) REFERENCES `khachhang` (`MA_KH`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `giohang_item`
--
ALTER TABLE `giohang_item`
  ADD CONSTRAINT `fk_3` FOREIGN KEY (`MA_GIOHANG`) REFERENCES `giohang` (`MA_GIOHANG`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_4` FOREIGN KEY (`MA_SP`) REFERENCES `sanpham` (`MA_SP`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD CONSTRAINT `fk7` FOREIGN KEY (`MA_GIOHANG`) REFERENCES `giohang` (`MA_GIOHANG`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `mau_sp`
--
ALTER TABLE `mau_sp`
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`MA_SP`) REFERENCES `sanpham` (`MA_SP`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk11` FOREIGN KEY (`MA_THUONGHIEU`) REFERENCES `thuonghieu` (`MA_TH`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;