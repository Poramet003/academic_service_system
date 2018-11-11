-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2018 at 11:11 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(17, 'admin', 'admin@hotmail.com', '25f9e794323b453885f5181f1b624d0b'),
(22, 'poramet', 'poramet39@gmail.com', '847faae57e2f56fd2a44ffee44508b04'),
(23, 'admin', 'jeaw10515@gmail.com', '781e5e245d69b566979b86e28d23f2c7');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Booking_ID` int(11) NOT NULL,
  `Room_number` int(11) NOT NULL,
  `Name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Lastname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Address` text CHARACTER SET utf8 NOT NULL,
  `Email` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `Tel` int(11) NOT NULL,
  `Room_remake` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Room_price` int(255) NOT NULL,
  `Room_detail` text CHARACTER SET utf8 NOT NULL,
  `Checkin` varchar(100) DEFAULT NULL,
  `Checkout` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Booking_ID`, `Room_number`, `Name`, `Lastname`, `Address`, `Email`, `username`, `Tel`, `Room_remake`, `Room_price`, `Room_detail`, `Checkin`, `Checkout`) VALUES
(99, 1, 'madee', 'chenglai', '45/4', 'madeedee-18@hotmail.com', 'madee', 937165939, 'Luxirious Suites', 987987, 'à¸«à¹‰à¸­à¸‡à¸ªà¸§à¸µà¸—à¸ªà¸¸à¸”à¸«à¸£à¸¹', '2017-12-29', '2017-12-30'),
(91, 1, 'chai', 'teeruk', 'à¹€à¸Šà¸µà¸¢à¸‡à¹ƒà¸«à¸¡à¹ˆ', 'chai@hotmail.com', 'chai', 895879487, 'Luxirious Suites', 987987, 'à¸«à¹‰à¸­à¸‡à¸ªà¸§à¸µà¸—à¸ªà¸¸à¸”à¸«à¸£à¸¹', '2018-01-03', '2018-01-04');

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
  `Level_Course` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `teacher_ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Course_ID`, `Name_Course`, `Detail_Course`, `Price`, `Start_Course`, `End_Course`, `Course_Benfit`, `Content_Course`, `Picture_Banner`, `Level_Course`, `teacher_ID`) VALUES
(110, '', '', 0, '0000-00-00', '0000-00-00', '', '', '', 'ระดับสูง', 51),
(111, '', '', 0, '0000-00-00', '0000-00-00', '', '', '', 'ระดับปานกลาง', 0),
(112, '', '', 0, '0000-00-00', '0000-00-00', '', '', '', 'ระดับผู้เริ่มต้น', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_teacher`
--

CREATE TABLE `course_teacher` (
  `course_teacher_ID` int(11) NOT NULL,
  `teacher_ID` int(11) NOT NULL,
  `Course_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `Teacher_Picture` varchar(100) NOT NULL,
  `teacher_ID` int(8) NOT NULL,
  `teacher_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `teacher_detail` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`Teacher_Picture`, `teacher_ID`, `teacher_name`, `teacher_detail`) VALUES
('37884633_2296372387069964_3136789180919578624_n.jpg', 0, 'ดร. ปรเมศวร์ ', 'อาจารฟา'),
('admin_icon.png', 51, 'ดร. กิตย์ศิริ แซ่เจี้ยง', 'อาจารศิ');

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
  `User_Type` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `firstname`, `lastname`, `phone`, `User_Type`) VALUES
(34, 'poramet39@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Mickey', 'Mouse', '0123456789', 0),
(35, 'jeaw10515@hotmail.com', '781e5e245d69b566979b86e28d23f2c7', 'Waroot', 'Suwanopard', '0814770008', 0),
(37, 'swit12345@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'swit', 'sirianun', '0123456789', 0),
(38, 'waroot@gmail.com', '781e5e245d69b566979b86e28d23f2c7', 'admin', 'admin', '0123456789', 1),
(39, 'gg@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Poramet', 'Thongkeaokert', '1234567890', 0),
(40, 'gunnie.pj@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Pattragun', 'Janpan', '111111111', 0),
(41, 'pora@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'à¸à¸à¸à¸à¸à¸', 'à¸à¸à¸à¸à¸à¸', '3535252555', 0),
(45, 'waroot@admin.com', '124bd1296bec0d9d93c7b52a71ad8d5b', 'Waroot', 'Suwanopard', '0123456789', 0),
(46, 'hibari44@hotmail.com', '781e5e245d69b566979b86e28d23f2c7', 'waroot', 'suwanopard', '0123456789', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Booking_ID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Course_ID`),
  ADD KEY `teacher_ID` (`teacher_ID`);

--
-- Indexes for table `course_teacher`
--
ALTER TABLE `course_teacher`
  ADD PRIMARY KEY (`course_teacher_ID`),
  ADD KEY `teacher_ID` (`teacher_ID`,`Course_ID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `Booking_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `Course_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `course_teacher`
--
ALTER TABLE `course_teacher`
  MODIFY `course_teacher_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
