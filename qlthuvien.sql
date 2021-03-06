-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2019 at 06:02 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlthuvien`
--

-- --------------------------------------------------------

--
-- Table structure for table `chuc_vu`
--

CREATE TABLE `chuc_vu` (
  `Id` int(11) NOT NULL,
  `Ten_chuc_vu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loai_sach`
--

CREATE TABLE `loai_sach` (
  `Id` int(11) NOT NULL,
  `Ten_sach` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ma_the_loai` int(11) NOT NULL,
  `Ma_NXB` int(11) NOT NULL,
  `Nam_xuat_ban` year(4) NOT NULL,
  `Kho_sach` varchar(10) NOT NULL,
  `Ma_vi_tri` int(11) NOT NULL,
  `Gia_sach` int(20) NOT NULL,
  `Tom_tat_noi_dung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loai_sach`
--

INSERT INTO `loai_sach` (`Id`, `Ten_sach`, `Ma_the_loai`, `Ma_NXB`, `Nam_xuat_ban`, `Kho_sach`, `Ma_vi_tri`, `Gia_sach`, `Tom_tat_noi_dung`) VALUES
(1, 'how to train your dragon', 4, 1, 1998, '12*18', 3, 40000, 'Nội dung tóm tắt của sách abc'),
(13, 'Tuhuynh', 7, 2, 1996, '', 1, 40000, ''),
(14, '123456', 7, 5, 1997, '12*14', 3, 45000, ''),
(15, '1234', 7, 5, 1998, '12*15', 3, 345678, '');

-- --------------------------------------------------------

--
-- Table structure for table `ls_tg`
--

CREATE TABLE `ls_tg` (
  `Ma_ls` int(11) NOT NULL,
  `Ma_tg` int(11) NOT NULL,
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ls_tg`
--

INSERT INTO `ls_tg` (`Ma_ls`, `Ma_tg`, `Id`) VALUES
(13, 1, 126),
(1, 3, 129),
(1, 1, 130),
(14, 3, 131),
(15, 2, 132);

-- --------------------------------------------------------

--
-- Table structure for table `muon_tra`
--

CREATE TABLE `muon_tra` (
  `Id` int(11) NOT NULL,
  `Nhan_vien` int(11) NOT NULL,
  `Nguoi_muon` int(11) NOT NULL,
  `Sach` int(11) NOT NULL,
  `Ngay_muon` date NOT NULL,
  `Thoi_han` time NOT NULL,
  `Ghi_chu_1` text NOT NULL,
  `Da_tra` int(11) NOT NULL,
  `Ngay_tra` date NOT NULL,
  `Ghi_chu_2` text NOT NULL,
  `Thiet_hai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_muon`
--

CREATE TABLE `nguoi_muon` (
  `Id` int(11) NOT NULL,
  `Ten` varchar(50) NOT NULL,
  `Dia_chi` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Ghi_chu` text NOT NULL,
  `CMND` int(20) NOT NULL,
  `Sdt` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `Id` int(11) NOT NULL,
  `Ho_ten` varchar(50) NOT NULL,
  `Ngay_sinh` date NOT NULL,
  `Phone_number` int(12) NOT NULL,
  `Chuc_vu` int(11) NOT NULL,
  `Dia_chi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nha_xuat_ban`
--

CREATE TABLE `nha_xuat_ban` (
  `Id` int(11) NOT NULL,
  `Ten` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Dia_chi` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Lien_he` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Thong_tin` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nha_xuat_ban`
--

INSERT INTO `nha_xuat_ban` (`Id`, `Ten`, `Dia_chi`, `Lien_he`, `Thong_tin`) VALUES
(1, 'tên nhà xuất bản 2', 'Dia_chi 1', 'Email 1', '              Thong_tin 1      '),
(2, 'tên nhà xuất bản 1', 'Hà Nội', 'pax: 9823018312391823', '  eeeeeeeeee  '),
(5, 'Nhà xuất bản TuHuynh', 'Đà Nẵng', '0962285164', '');

-- --------------------------------------------------------

--
-- Table structure for table `phieu_nhap`
--

CREATE TABLE `phieu_nhap` (
  `Id` int(11) NOT NULL,
  `Ma_phieu` int(11) NOT NULL,
  `Ngay_nhap` date NOT NULL,
  `Nguoi_nhap` varchar(20) NOT NULL,
  `Ghi_chu` text NOT NULL,
  `Nguon_nhap` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sach`
--

CREATE TABLE `sach` (
  `Id` int(11) NOT NULL,
  `Ma_ISBN` text NOT NULL,
  `Ma_ten_sach` int(11) NOT NULL,
  `Tinh_trang` varchar(300) NOT NULL,
  `So_trang` int(4) NOT NULL,
  `So_lan_tai_bang` int(2) NOT NULL,
  `Hien_co` int(1) NOT NULL,
  `Ma_nhap_sach` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sach`
--

INSERT INTO `sach` (`Id`, `Ma_ISBN`, `Ma_ten_sach`, `Tinh_trang`, `So_trang`, `So_lan_tai_bang`, `Hien_co`, `Ma_nhap_sach`) VALUES
(11, '11111111111', 1, 'Tinh_trang', 100, 3, 1, 0),
(12, '1111111111112', 1, 'Tinh_trang 2', 101, 4, 1, 0),
(13, '111111111113', 1, 'Tinh_trang 3', 100, 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tac_gia`
--

CREATE TABLE `tac_gia` (
  `Id` int(11) NOT NULL,
  `Ten_tac_gia` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(50) NOT NULL,
  `Ghi_chu` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `So_luoc_thong_tin` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tac_gia`
--

INSERT INTO `tac_gia` (`Id`, `Ten_tac_gia`, `website`, `Ghi_chu`, `So_luoc_thong_tin`) VALUES
(1, 'Ten_tac_gia', 'website', 'Ghi_chu', 'Sơ lược thông tin tác giả 1'),
(2, 'Ten_tac_gia 2', 'aaaaaaaaaaaaaaa', 'aaaaaaaaaa', 'aaaaaaaaaaaaa'),
(3, 'Huỳnh Minh Tú', 'tuhuynh.com', 'tú đẹp trai', 'ádasdadasdasdadsasdas   ');

-- --------------------------------------------------------

--
-- Table structure for table `the_loai`
--

CREATE TABLE `the_loai` (
  `Id` int(11) NOT NULL,
  `Ten` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ma_chuyen_muc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `the_loai`
--

INSERT INTO `the_loai` (`Id`, `Ten`, `Ma_chuyen_muc`) VALUES
(1, 'Sách bình luận văn học', 'B'),
(2, 'Sách chính trị', 'C'),
(3, 'Sách địa lý', 'Đ'),
(4, 'Sách giáo khoa', 'G'),
(5, 'Sách có nội dung hư cấu', 'H'),
(6, 'Sách lịch sử', 'L'),
(7, 'Sách phi hư cấu', 'P'),
(8, 'Sách khoa học', 'S'),
(9, 'Sách kinh doanh', 'S'),
(10, 'Sách thiếu nhi', 'T'),
(11, 'Sách thiếu niên', 'T'),
(12, 'Sách tự lực', 'T'),
(13, 'Sách khoa học viễn tưởng', 'V');

-- --------------------------------------------------------

--
-- Table structure for table `the_thanh_vien`
--

CREATE TABLE `the_thanh_vien` (
  `So_the` int(11) NOT NULL,
  `Ngay_bat_dau` date NOT NULL,
  `Ngay_het_han` date NOT NULL,
  `Trang_thai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Quyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Name`, `Password`, `Quyen`) VALUES
(1, 'admin', '123456', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vi_tri`
--

CREATE TABLE `vi_tri` (
  `Id` int(11) NOT NULL,
  `Thong_tin` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vi_tri`
--

INSERT INTO `vi_tri` (`Id`, `Thong_tin`) VALUES
(1, 'Thong_tin 1'),
(3, 'Thông tin 2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chuc_vu`
--
ALTER TABLE `chuc_vu`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `loai_sach`
--
ALTER TABLE `loai_sach`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `ls_tg`
--
ALTER TABLE `ls_tg`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `muon_tra`
--
ALTER TABLE `muon_tra`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `nguoi_muon`
--
ALTER TABLE `nguoi_muon`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `nha_xuat_ban`
--
ALTER TABLE `nha_xuat_ban`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `phieu_nhap`
--
ALTER TABLE `phieu_nhap`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tac_gia`
--
ALTER TABLE `tac_gia`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `the_loai`
--
ALTER TABLE `the_loai`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `the_thanh_vien`
--
ALTER TABLE `the_thanh_vien`
  ADD PRIMARY KEY (`So_the`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `vi_tri`
--
ALTER TABLE `vi_tri`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chuc_vu`
--
ALTER TABLE `chuc_vu`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loai_sach`
--
ALTER TABLE `loai_sach`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ls_tg`
--
ALTER TABLE `ls_tg`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `muon_tra`
--
ALTER TABLE `muon_tra`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nguoi_muon`
--
ALTER TABLE `nguoi_muon`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nha_xuat_ban`
--
ALTER TABLE `nha_xuat_ban`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `phieu_nhap`
--
ALTER TABLE `phieu_nhap`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sach`
--
ALTER TABLE `sach`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tac_gia`
--
ALTER TABLE `tac_gia`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `the_loai`
--
ALTER TABLE `the_loai`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `the_thanh_vien`
--
ALTER TABLE `the_thanh_vien`
  MODIFY `So_the` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vi_tri`
--
ALTER TABLE `vi_tri`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
