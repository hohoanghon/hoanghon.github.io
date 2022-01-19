-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 30, 2021 lúc 06:04 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbattendance`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbldepartment`
--

CREATE TABLE `tbldepartment` (
  `DepartmentID` int(11) NOT NULL,
  `Department` varchar(30) NOT NULL,
  `Description` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbldepartment`
--

INSERT INTO `tbldepartment` (`DepartmentID`, `Department`, `Description`) VALUES
(6, 'KE TOAN', 'KE TOAN'),
(7, 'KINH DOANH', 'KINH DOANH'),
(8, 'NHAN SU', 'NHAN SU'),
(9, 'IT', 'IT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblemployee`
--

CREATE TABLE `tblemployee` (
  `ID` int(11) NOT NULL,
  `EmployeeID` varchar(30) NOT NULL,
  `Firstname` varchar(99) NOT NULL,
  `Lastname` varchar(99) NOT NULL,
  `Middlename` varchar(99) NOT NULL,
  `ACCOUNT_USERNAME` varchar(50) NOT NULL,
  `ACCOUNT_PASSWORD` varchar(100) NOT NULL,
  `ACCOUNT_TYPE` varchar(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `BirthDate` date NOT NULL,
  `Age` int(11) NOT NULL,
  `ContactNo` varchar(30) NOT NULL,
  `TeamID` int(11) NOT NULL,
  `StudPhoto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tblemployee`
--

INSERT INTO `tblemployee` (`ID`, `EmployeeID`, `Firstname`, `Lastname`, `Middlename`, `ACCOUNT_USERNAME`, `ACCOUNT_PASSWORD`, `ACCOUNT_TYPE`, `Address`, `Gender`, `BirthDate`, `Age`, `ContactNo`, `TeamID`, `StudPhoto`) VALUES
(2, '12312312', 'JAKE', 'PALMA', 'ECHALAR', '', '', '', 'KABANKALAN CITY', 'Male', '1990-11-11', 30, '213122', 4, 'photo/import1.png'),
(3, '8583362', 'JANRY', 'TAN', 'MELMOM', '', '', '', 'KABANKALAN CITY', 'Male', '1991-08-16', 25, '12312312312', 3, ''),
(4, '0010266936', 'JASON', 'BATUTU', 'RERE', '', '', '', 'KABANKALAN CITY', 'Male', '1994-02-14', 23, '21312312312321', 3, 'photo/Koala.jpg'),
(5, '8798794', 'ALMA', 'RECARDO', 'TORRES', '', '', '', 'HIMAMAYLAN CITY', 'Female', '1989-04-26', 27, '09047894777', 4, ''),
(6, '8675543', 'CHESKA', 'RAMIREZ', 'UY', '', '', '', 'KABANKALAN CITY', 'Female', '1990-01-31', 27, '09567435788', 5, ''),
(7, '1253235', 'RAMON', 'CORPUZ', 'SANTOS', '', '', '', 'DANCALAN, ILOG', 'Male', '1994-02-17', 23, '09567453453', 3, ''),
(8, '654567896', 'KAREN', 'VARGAS', 'ONG', '', '', '', 'KABANKALAN CITY', 'Female', '1993-03-22', 23, '09457545699', 3, ''),
(10, '57053590', 'CHERYL', 'LACSON', 'PADILLA', '', '', '', 'KABANKALAN CITY', 'Female', '1990-05-25', 26, '09206543456', 3, ''),
(13, '5827308', 'HO', 'HON', 'HOANG ', '', '', '', 'HEM 51', 'Male', '1998-05-16', 23, '0966154181', 5, ''),
(17, '48542282', 'NGUYEN VANA', 'TEST 2', 'DF', '', '', '', 'FDSF', 'Female', '1996-11-30', 24, '2314234234', 10, 'photo/619aa22c4c5b1.png'),
(18, '40193140', 'NGUYEN', 'HONG', 'ANH', '', '', '', '1', 'Female', '0000-00-00', 0, '3432423', 10, 'photo/61955f5a8dc49.png'),
(20, '40702898', 'TEST 21', 'T1', 'T1', '', '', '', 'TEST', 'Male', '1992-02-18', 29, '16516546546', 10, ''),
(22, '59148709', 'NGUUYEN', 'AN', 'XUAN', 'an', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Registrar', 'HEM 121 DUONG 3/2 NINH KIEU CAN THO', 'Female', '1990-09-16', 31, '0946879469', 11, 'photo/619aa22c4c5b1.png'),
(23, '62932520', 'DUONG', 'THANH', 'CHI', 'chithanh', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Registrar', 'HEM 51 3/2 NINH KIEU CAN THO', 'Female', '1991-03-15', 30, '343242343', 11, ''),
(24, '88510362', 'NGUYEN', 'SUONG', 'ANH', 'anhsuong', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Registrar', 'DUONG NGUYEN VAN LINH, HUNG LOI, NINH KIEU, CAN THO', 'Female', '1995-10-14', 26, '2321321312', 11, ''),
(25, '77591187', 'HO', 'HON', 'HOANG', 'hoanghon', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Registrar', 'HEM 51 DUONG 3/2', 'Male', '1999-03-06', 22, '0966154181', 14, 'photo/images.png'),
(26, '66356025', 'DUONG', 'THUONG', 'NGHI', 'nghithuong', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Registrar', 'HEM 51, DUONG 3/2, XUAN KHANH, NINH KIEU, CAN THO', 'Female', '2000-01-01', 21, '0123456789', 11, ''),
(27, '53352128', 'NGO', 'PHUC', 'TAN', 'phuc', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Administrator', 'HEM 132 3/2', 'Female', '1992-11-13', 29, '054584549', 13, ''),
(28, '27316909', 'NGUYEN', 'CHAU', 'TAN', 'tanchau', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Registrar', 'HEM 1, DUONG CMT8, NINH KIEU CAN THO', 'Male', '1992-11-16', 29, '0185484564', 13, ''),
(30, '77024340', 'VO', 'SY', 'TUONG', 'tuongsy', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Registrar', 'HEM 71, DUONG 30/4, NINH KIEU, CAN THO', 'Male', '1994-10-16', 27, '0515454', 11, 'photo/images.png'),
(31, '29401876', 'DINH', 'SANG', 'VAN', 'dinhvansang', '7dcdcaeb4c83d6e94ab77272e848f68ae1b9fa2f', 'Registrar', 'HEM 51 DUONG 3/2', 'Male', '2000-03-25', 21, '09124857483', 13, ''),
(32, '97195932', 'NGUYEN', 'ANH', 'VAN', 'vananh', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Registrar', 'HEM 51, DUONG 3/2', 'Female', '1992-04-16', 29, '091234567', 13, 'photo/hinhanhdemo.jpg'),
(37, '76538614', 'NGUYEN', 'A', 'VAN', 'vana', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Registrar', 'HEM51, DUONG 3.2', 'Male', '1999-04-16', 22, '012345897', 14, 'photo/hinhanhdemo.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblevents`
--

CREATE TABLE `tblevents` (
  `EventID` int(11) NOT NULL,
  `EventTitle` varchar(50) NOT NULL,
  `EventPlace` varchar(99) NOT NULL,
  `EventDescription` varchar(99) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tblevents`
--

INSERT INTO `tblevents` (`EventID`, `EventTitle`, `EventPlace`, `EventDescription`, `Status`) VALUES
(12, 'HOP PHONG NHAN SU', 'PHONG HOP 2', 'HOP PHONG NHAN SU', 'No Active'),
(13, 'SAMPLE EVENT', 'SAMPLE EVENT', 'SAMPLE EVENT', 'Active'),
(14, 'NEW EVENT', 'PHONG HOP 1', 'NEW EVENT', 'Active'),
(15, 'Daily Attendance', 'CONG 1', 'DAILY ATTENDANCE', 'Active');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblnotification`
--

CREATE TABLE `tblnotification` (
  `notificationID` int(11) NOT NULL,
  `notificationDate` varchar(50) NOT NULL,
  `notificationTime` varchar(50) NOT NULL,
  `notification_status` varchar(50) NOT NULL,
  `EmployeeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tblnotification`
--

INSERT INTO `tblnotification` (`notificationID`, `notificationDate`, `notificationTime`, `notification_status`, `EmployeeID`) VALUES
(1, '2021-12-01', '09:00', 'No Active', 88510362),
(2, '2021-12-02', '09:00', 'No Active', 62932520),
(3, '2021-12-03', '09:00', 'No Active', 62932520),
(4, '2021-12-04', '09:00', 'No Active', 62932520),
(5, '2021-12-05', '09:00', 'No Active', 62932520),
(6, '2021-12-06', '09:00', 'No Active', 62932520),
(7, '2021-12-07', '09:00', 'No Active', 62932520),
(8, '2021-12-08', '09:00', 'No Active', 62932520),
(9, '2021-12-09', '09:00', 'No Active', 62932520),
(10, '2021-18-10', '09:00', 'No Active', 62932520),
(11, '2021-12-18', '07:13 AM', 'No Active', 62932520),
(12, '2021-12-18', '07:20 AM', 'No Active', 62932520),
(13, '2021-12-18', '07:21 AM', 'No Active', 62932520),
(14, '2021-12-18', '07:23 AM', 'No Active', 62932520),
(15, '2021-12-24', '20:11 PM', 'Active', 62932520),
(16, '2021-12-24', '20:12 PM', 'Active', 62932520),
(17, '2021-12-24', '20:13 PM', 'No Active', 29401876),
(18, '2021-12-25', '01:15 AM', 'No Active', 76538614),
(19, '2021-12-25', '01:20 AM', 'Active', 29401876),
(20, '2021-12-25', '01:20 AM', 'No Active', 76538614),
(21, '2021-12-25', '08:13 AM', 'No Active', 76538614),
(22, '2021-12-30', '23:19 PM', 'Active', 97195932);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblteam`
--

CREATE TABLE `tblteam` (
  `TeamID` int(11) NOT NULL,
  `TeamCode` varchar(30) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `DepartmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tblteam`
--

INSERT INTO `tblteam` (`TeamID`, `TeamCode`, `Description`, `DepartmentID`) VALUES
(11, 'KETOAN2', 'KETOAN2', 6),
(13, 'NHANSU2', 'NHANSU2', 8),
(14, 'KINH DOANH 2', 'KINH DOANH 2', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbltimetable`
--

CREATE TABLE `tbltimetable` (
  `TimeTableID` int(11) NOT NULL,
  `EmployeeID` varchar(90) NOT NULL,
  `TimeIn` varchar(30) NOT NULL,
  `TimeOut` varchar(30) NOT NULL,
  `AttendDate` date NOT NULL,
  `EventTitle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbltimetable`
--

INSERT INTO `tbltimetable` (`TimeTableID`, `EmployeeID`, `TimeIn`, `TimeOut`, `AttendDate`, `EventTitle`) VALUES
(1, '0010266936', '04:39 AM', '04:39 AM', '2018-10-20', ''),
(2, '023256469 ', '', '', '2021-10-10', ''),
(3, '023256469 ', '', '', '2021-10-14', ''),
(4, '111111111111111', '12:26 AM', '', '2021-10-14', ''),
(5, '12312312  ', '02:28 AM', '', '2021-10-17', ''),
(6, '111111111111111', '02:29 AM', '', '2021-10-17', ''),
(7, '213456    ', '', '', '2021-11-09', ''),
(10, '0010266936', '03:16 AM', '03:19 AM', '2021-11-12', ''),
(11, '0010266936', '03:18 AM', '03:19 AM', '2021-11-12', ''),
(12, '12312312  ', '03:56 AM', '', '2021-11-12', ''),
(13, '12312312  ', '03:57 AM', '', '2021-11-12', ''),
(38, '5827308', '04:59 AM', '05:02 AM', '2021-11-14', ''),
(39, '5827308', '05:03 AM', '05:04 AM', '2021-11-15', ''),
(40, '48542282', '14:00 PM', '05:15 PM', '2021-11-18', ''),
(41, '40193140', '14:08 PM', '05:15 PM', '2021-11-18', ''),
(44, '40193140', '02:46 AM', '05:15 PM', '2021-12-04', 'HOP PHONG NHAN SU'),
(46, '59148709', '03:29 AM', '03:51 AM', '2021-12-04', 'HOP KE TOAN'),
(47, '59148709', '03:53 AM', '03:53 AM', '2021-12-04', 'Daily Attendance'),
(48, '59148709', '02:58 AM', '03:02 AM', '2021-12-05', 'HOP PHONG NHAN SU'),
(49, '62932520', '00:28 AM', '00:42 AM', '2021-12-09', 'Daily Attendance'),
(51, '62932520', '14:36 PM', '14:37 PM', '2021-12-11', 'Daily Attendance'),
(54, '62932520', '15:33 PM', '15:33 PM', '2021-12-11', 'HOP TO 3'),
(55, '62932520', '00:00 AM', '00:00 AM', '2021-12-13', 'Daily Attendance'),
(58, '62932520', '07:20 AM', '07:21 AM', '2021-12-18', 'HOP PHONG NHAN SU'),
(59, '62932520', '07:23 AM', '05:15 PM', '2021-12-18', 'HOP NGAY 18'),
(60, '62932520', '20:11 PM', '20:12 PM', '2021-12-24', 'Daily Attendance'),
(61, '29401876', '20:13 PM', '', '2021-12-24', 'Daily Attendance'),
(62, '76538614', '01:15 AM', '', '2021-12-25', 'Daily Attendance'),
(63, '29401876', '01:20 AM', '', '2021-12-25', 'NEW EVENT'),
(64, '76538614', '01:20 AM', '', '2021-12-25', 'NEW EVENT'),
(65, '76538614', '08:13 AM', '', '2021-12-25', 'SAMPLE EVENT'),
(66, '97195932', '23:19 PM', '', '2021-12-30', 'SAMPLE EVENT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblverifytimeintimeout`
--

CREATE TABLE `tblverifytimeintimeout` (
  `VerifyID` int(11) NOT NULL,
  `EmployeeID` varchar(90) NOT NULL,
  `TimeIn` varchar(30) NOT NULL,
  `TimeOut` varchar(30) NOT NULL,
  `Verification` varchar(90) NOT NULL,
  `DateValidation` date NOT NULL,
  `EventTitle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tblverifytimeintimeout`
--

INSERT INTO `tblverifytimeintimeout` (`VerifyID`, `EmployeeID`, `TimeIn`, `TimeOut`, `Verification`, `DateValidation`, `EventTitle`) VALUES
(1, '0010266936', '03:18 AM', '05:04 AM', 'TimeOut', '2021-11-14', '0'),
(2, '023256469 ', '06:23 PM', '05:04 AM', 'TimeOut', '2021-11-14', '0'),
(3, '111111111111111', '12:26 AM', '05:04 AM', 'TimeOut', '2021-11-14', '0'),
(4, '12312312  ', '03:57 AM', '05:04 AM', 'TimeOut', '2021-11-14', '0'),
(5, '213456    ', '08:24 PM', '05:04 AM', 'TimeOut', '2021-11-14', '0'),
(30, '5827308', '04:59 AM', '05:04 AM', 'TimeOut', '2021-11-14', '0'),
(31, '5827308', '05:03 AM', '05:04 AM', 'TimeOut', '2021-11-15', '0'),
(32, '48542282', '14:00 PM', '', 'TimeIn', '2021-11-18', '0'),
(33, '40193140', '14:08 PM', '', 'TimeIn', '2021-11-18', '0'),
(34, '59148709', '04:57 AM', '05:15 AM', 'TimeOut', '2021-12-03', '0'),
(35, '59148709', '02:34 AM', '', 'TimeIn', '2021-12-04', '0'),
(36, '59148709', '02:46 AM', '', 'TimeIn', '2021-12-04', '0'),
(37, '59148709', '03:15 AM', '03:51 AM', 'TimeOut', '2021-12-04', 'FDF'),
(39, '59148709', '03:53 AM', '03:53 AM', 'TimeOut', '2021-12-04', 'AAA'),
(40, '59148709', '02:58 AM', '03:02 AM', 'TimeOut', '2021-12-05', ''),
(41, '62932520', '00:28 AM', '00:42 AM', 'TimeOut', '2021-12-09', ''),
(43, '62932520', '14:36 PM', '14:37 PM', 'TimeOut', '2021-12-09', 'Daily Attendance'),
(46, '62932520', '15:33 PM', '', 'TimeIn', '2021-12-09', 'TEST'),
(49, '62932520', '07:20 AM', '07:21 AM', 'TimeOut', '2021-12-18', 'SAMPLE EVENT'),
(50, '62932520', '07:23 AM', '', 'TimeIn', '2021-12-18', 'NEW EVENT'),
(51, '62932520', '20:11 PM', '20:12 PM', 'TimeOut', '2021-12-24', 'Daily Attendance'),
(52, '29401876', '20:13 PM', '', 'TimeIn', '2021-12-24', 'Daily Attendance'),
(53, '76538614', '01:15 AM', '', 'TimeIn', '2021-12-25', 'Daily Attendance'),
(54, '29401876', '01:20 AM', '', 'TimeIn', '2021-12-25', 'NEW EVENT'),
(55, '76538614', '01:20 AM', '', 'TimeIn', '2021-12-25', 'NEW EVENT'),
(56, '76538614', '08:13 AM', '', 'TimeIn', '2021-12-25', 'SAMPLE EVENT'),
(57, '97195932', '23:19 PM', '', 'TimeIn', '2021-12-30', 'SAMPLE EVENT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `useraccounts`
--

CREATE TABLE `useraccounts` (
  `ACCOUNT_ID` int(11) NOT NULL,
  `ACCOUNT_NAME` varchar(255) NOT NULL,
  `ACCOUNT_USERNAME` varchar(255) NOT NULL,
  `ACCOUNT_PASSWORD` text NOT NULL,
  `ACCOUNT_TYPE` varchar(30) NOT NULL,
  `EMPID` int(11) NOT NULL,
  `USERIMAGE` varchar(255) NOT NULL,
  `EmployeeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `useraccounts`
--

INSERT INTO `useraccounts` (`ACCOUNT_ID`, `ACCOUNT_NAME`, `ACCOUNT_USERNAME`, `ACCOUNT_PASSWORD`, `ACCOUNT_TYPE`, `EMPID`, `USERIMAGE`, `EmployeeID`) VALUES
(0, 'ADSFA', 'dfsdf', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Registrar', 0, '', 53352128),
(1, 'Janno Palacios', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 1234, 'photos/import2.png', 0),
(5, 'James Yap', 'james', '474ba67bdb289c6263b36dfd8a7bed6c85b04943', 'Administrator', 0, '', 0),
(8, 'SSG2', 'ssg2', '356a192b7913b04c54574d18c28d46e6395428ab', 'Registrar', 0, '', 0),
(9, 'HOANG HON', 'hoanghon1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Administrator', 0, '', 0),
(10, 'NGHI THUONG', 'nghithuong', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Registrar', 0, '', 0),
(14, 'T', 't', '8efd86fb78a56a5145ed7739dcb00c78581c5375', 'Registrar', 0, '', 0),
(16, 'AS', 'as', 'df211ccdd94a63e0bcb9e6ae427a249484a49d60', 'Registrar', 0, '', 88510362),
(23, 'D', 'd', '3c363836cf4e16666669a25da280a1865c2d2874', 'Administrator', 0, '', 62932520),
(25, 'HOANGHON', 'hoanghon', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Registrar', 0, '', 77591187),
(27, 'a', 'a', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'Administrator', 0, '', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbldepartment`
--
ALTER TABLE `tbldepartment`
  ADD PRIMARY KEY (`DepartmentID`);

--
-- Chỉ mục cho bảng `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `StudentID` (`EmployeeID`);

--
-- Chỉ mục cho bảng `tblevents`
--
ALTER TABLE `tblevents`
  ADD PRIMARY KEY (`EventID`);

--
-- Chỉ mục cho bảng `tblnotification`
--
ALTER TABLE `tblnotification`
  ADD PRIMARY KEY (`notificationID`);

--
-- Chỉ mục cho bảng `tblteam`
--
ALTER TABLE `tblteam`
  ADD PRIMARY KEY (`TeamID`),
  ADD KEY `DepartmentID` (`DepartmentID`);

--
-- Chỉ mục cho bảng `tbltimetable`
--
ALTER TABLE `tbltimetable`
  ADD PRIMARY KEY (`TimeTableID`);

--
-- Chỉ mục cho bảng `tblverifytimeintimeout`
--
ALTER TABLE `tblverifytimeintimeout`
  ADD PRIMARY KEY (`VerifyID`);

--
-- Chỉ mục cho bảng `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`ACCOUNT_ID`),
  ADD UNIQUE KEY `ACCOUNT_USERNAME` (`ACCOUNT_USERNAME`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbldepartment`
--
ALTER TABLE `tbldepartment`
  MODIFY `DepartmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tblemployee`
--
ALTER TABLE `tblemployee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `tblevents`
--
ALTER TABLE `tblevents`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tblnotification`
--
ALTER TABLE `tblnotification`
  MODIFY `notificationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tblteam`
--
ALTER TABLE `tblteam`
  MODIFY `TeamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbltimetable`
--
ALTER TABLE `tbltimetable`
  MODIFY `TimeTableID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `tblverifytimeintimeout`
--
ALTER TABLE `tblverifytimeintimeout`
  MODIFY `VerifyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
