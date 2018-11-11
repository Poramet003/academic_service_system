-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2018 at 07:03 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academicservicedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Course_ID` int(11) NOT NULL,
  `Name_Course` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Detail_Course` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Price` int(100) NOT NULL,
  `Start_Course` date NOT NULL,
  `End_Course` date NOT NULL,
  `Course_Benfit` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Content_Course` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Picture_Banner` varchar(100) NOT NULL,
  `teacher_ID` int(11) NOT NULL,
  `teacher_assitant` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Course_ID`, `Name_Course`, `Detail_Course`, `Price`, `Start_Course`, `End_Course`, `Course_Benfit`, `Content_Course`, `Picture_Banner`, `teacher_ID`, `teacher_assitant`) VALUES
(142, 'Next Gen Computing Camp #2', '', 1600, '2018-11-20', '2018-11-21', 'ค่าสมัครคนละ 1,600 บาท\r\nค่าใช้จ่ายรวม\r\n– ค่าเอกสารประกอบการเรียน\r\n– ค่าที่พัก (PSU Lodge Hotel / DE42 Hotel)\r\n– ค่าอาหารกลางวัน + อาหารเย็น + อาหารว่าง  ', 'กิจกรรมต่าง ๆ มากมาย เช่น\r\n– Basic Electronics\r\n– Internet of Things\r\n– MonsoonSIM (เกมการแข่งขันจำลองธุรกิจ)\r\n– Web Programming\r\nพร้อมรับเกียรติบัตรหลังจบค่าย', 'computing-camp1-01-1.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_teacher`
--

CREATE TABLE `course_teacher` (
  `course_teacher_ID` int(11) NOT NULL,
  `teacher_ID` int(11) NOT NULL,
  `Course_ID` int(11) NOT NULL,
  `week` int(11) NOT NULL,
  `date_study` date NOT NULL,
  `detail` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `check_name_code` int(11) NOT NULL,
  `file_upload` varchar(100) NOT NULL,
  `check_name_user` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_teacher`
--

INSERT INTO `course_teacher` (`course_teacher_ID`, `teacher_ID`, `Course_ID`, `week`, `date_study`, `detail`, `check_name_code`, `file_upload`, `check_name_user`) VALUES
(219, 0, 140, 2, '0000-00-00', '2', 400110, '', ''),
(220, 0, 141, 1, '0000-00-00', '1', 397105, '', ''),
(221, 0, 141, 2, '0000-00-00', '2', 400105, '', ''),
(222, 0, 141, 3, '0000-00-00', '3', 377103, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `course_user`
--

CREATE TABLE `course_user` (
  `course_user_ID` int(11) NOT NULL,
  `Course_ID` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `Status` enum('รอการชำระเงิน','กำลังตรวจสอบ','เสร็จสิ้น') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Channel_pay` enum('ธนาคารไทยพาณิช สาขา เซ็นทรัลภูเก็ต','ธนาคารทหารไทย สาขา ป่าตอง','ธนาคารกรุงศรีอยุธยา สาขา มอภูเก็ต','') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Date_pay` date NOT NULL,
  `Time_pay` time NOT NULL,
  `Picture_pay` varchar(100) NOT NULL,
  `order_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_user`
--

INSERT INTO `course_user` (`course_user_ID`, `Course_ID`, `users_id`, `Status`, `Channel_pay`, `Date_pay`, `Time_pay`, `Picture_pay`, `order_no`) VALUES
(38, 140, 1, 'เสร็จสิ้น', 'ธนาคารไทยพาณิช สาขา เซ็นทรัลภูเก็ต', '2561-11-11', '09:45:26', 'Slide3.png', 275627);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(8) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `phone` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `User_Type` int(11) NOT NULL,
  `teacher_ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `firstname`, `lastname`, `phone`, `User_Type`, `teacher_ID`) VALUES
(1, 'jeaw10515@hotmail.com', '781e5e245d69b566979b86e28d23f2c7', 'Waroot', 'Suwanopard', '0814770008', 0, 0),
(9999, 'admin@coc.com', '781e5e245d69b566979b86e28d23f2c7', 'Waroot', 'Suwanopard', '0814770008', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_teacher`
--

CREATE TABLE `users_teacher` (
  `teacher_ID` int(8) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  `teacher_Picture` varchar(11) NOT NULL,
  `teacher_Name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `teacher_Detail` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `User_Type` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_teacher`
--

INSERT INTO `users_teacher` (`teacher_ID`, `email`, `password`, `teacher_Picture`, `teacher_Name`, `teacher_Detail`, `User_Type`) VALUES
(0, 'kitsiri@coc.com', '124bd1296bec0d9d93c7b52a71ad8d5b', '01.JPG', 'Dr.Kitsiti Chojing', 'ตำแหน่ง : อาจารย์\r\nตำแหน่งบริหาร : รักษาการในตำแหน่งผู้ช่วยคณบดีฝ่ายวิจัย บัณฑิตศึกษา และบริการวิชาการ', 2),
(28, 'nattapong.t@coc.psu', '124bd1296bec0d9d93c7b52a71ad8d5b', '02.JPG', 'ดร.ณัฐพงศ์ ทองเทพ', 'ตำแหน่ง : อาจารย์\r\nตำแหน่งบริหาร : รักษาการในตำแหน่งผู้ช่วยคณบดีฝ่ายกิจการนักศึกษา', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Course_ID`),
  ADD KEY `teacher_ID` (`teacher_ID`),
  ADD KEY `teacher_assitant` (`teacher_assitant`);

--
-- Indexes for table `course_teacher`
--
ALTER TABLE `course_teacher`
  ADD PRIMARY KEY (`course_teacher_ID`),
  ADD KEY `teacher_ID` (`Course_ID`),
  ADD KEY `teacher_ID_2` (`teacher_ID`);

--
-- Indexes for table `course_user`
--
ALTER TABLE `course_user`
  ADD PRIMARY KEY (`course_user_ID`),
  ADD KEY `Course_ID` (`Course_ID`,`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `teacher_ID` (`teacher_ID`);

--
-- Indexes for table `users_teacher`
--
ALTER TABLE `users_teacher`
  ADD PRIMARY KEY (`teacher_ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `Course_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `course_teacher`
--
ALTER TABLE `course_teacher`
  MODIFY `course_teacher_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `course_user`
--
ALTER TABLE `course_user`
  MODIFY `course_user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;

--
-- AUTO_INCREMENT for table `users_teacher`
--
ALTER TABLE `users_teacher`
  MODIFY `teacher_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
