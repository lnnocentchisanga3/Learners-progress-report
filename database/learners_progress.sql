-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 07, 2022 at 01:18 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learners_progress`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` varchar(11) NOT NULL,
  `class` varchar(11) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `teacher_id`, `class`) VALUES
(9, 'LPR102030', '7b'),
(8, 'LPR102030', '7D'),
(7, 'LPR1234', '10A'),
(6, 'LPR24683', '12N');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

DROP TABLE IF EXISTS `lessons`;
CREATE TABLE IF NOT EXISTS `lessons` (
  `lesson_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` varchar(50) NOT NULL,
  `class` varchar(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  PRIMARY KEY (`lesson_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`lesson_id`, `teacher_id`, `class`, `subject`) VALUES
(10, 'LPR2468', '10A', 'CIVICS'),
(11, 'LPR24683', '12N', 'CIVICS'),
(12, 'LPR24683', '7B', 'SCIENCE');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `logid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `log_time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_added` varchar(255) NOT NULL,
  PRIMARY KEY (`logid`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logid`, `user_id`, `log_time`, `status`, `date_added`) VALUES
(1, 'LPR2468', '11:11:32', 'logout', '2022/01/01'),
(2, 'LPR2468', '11:14:50', 'login', '2022/01/01'),
(3, 'LPR2468', '11:15:31', 'logout', '2022/01/01'),
(4, 'LPR2468', '11:15:38', 'login', '2022/01/01'),
(5, 'LPR2468', '11:41:20', 'logout', '2022/01/01'),
(6, 'LPR2468', '11:41:39', 'login', '2022/01/01'),
(7, 'LPR2468', '11:43:12', 'logout', '2022/01/01'),
(8, 'LPR2468', '11:52:56', 'login', '2022/01/01'),
(9, 'LPR2468', '13:50:06', 'logout', '2022/01/01'),
(10, 'LPR2468', '13:51:10', 'login', '2022/01/01'),
(11, 'LPR2468', '13:52:07', 'logout', '2022/01/01'),
(12, 'LPR2468', '13:56:30', 'login', '2022/01/01'),
(13, 'LPR2468', '10:27:17', 'logout', '2022/01/03'),
(14, 'LPR2468', '10:27:26', 'login', '2022/01/03'),
(15, 'LPR2468', '12:17:11', 'logout', '2022/01/04'),
(16, 'LPR2468', '12:17:21', 'login', '2022/01/04'),
(17, 'LPR2468', '12:48:07', 'login', '2022/01/04'),
(18, 'LPR2468', '12:49:39', 'login', '2022/01/04'),
(19, 'LPR2468', '14:14:15', 'logout', '2022/01/04'),
(20, 'LPR2468', '22:47:49', 'login', '2022/01/04'),
(21, 'LPR2468', '23:16:46', 'logout', '2022/01/04'),
(22, 'LPR2468', '08:41:54', 'login', '2022/01/05'),
(23, 'LPR2468', '21:22:01', 'logout', '2022/01/05'),
(24, 'LPR2468', '21:25:20', 'login', '2022/01/05'),
(25, 'LPR2468', '21:25:58', 'logout', '2022/01/05'),
(26, 'LPR2468', '06:38:12', 'login', '2022/01/06'),
(27, 'LPR2468', '08:30:38', 'login', '2022/01/06'),
(28, 'LPR2468', '08:51:23', 'logout', '2022/01/06'),
(29, 'LPR2468', '08:51:51', 'login', '2022/01/06'),
(30, 'LPR2468', '08:51:54', 'logout', '2022/01/06'),
(31, 'LPR2468', '08:53:37', 'login', '2022/01/06'),
(32, 'LPR2468', '09:02:44', 'logout', '2022/01/06'),
(33, 'LPR2468', '09:53:20', 'login', '2022/01/06'),
(34, 'LPR2468', '09:53:24', 'logout', '2022/01/06'),
(35, 'LPR24683', '09:53:29', 'login', '2022/01/06'),
(36, 'LPR24683', '09:54:37', 'login', '2022/01/06'),
(37, 'LPR24683', '09:58:55', 'logout', '2022/01/06'),
(38, 'LPR102030', '09:59:06', 'login', '2022/01/06'),
(39, 'LPR102030', '09:59:20', 'logout', '2022/01/06'),
(40, 'LPR24683', '10:00:14', 'login', '2022/01/06'),
(41, 'LPR24683', '10:06:10', 'logout', '2022/01/06'),
(42, 'LPR2468', '10:06:15', 'login', '2022/01/06'),
(43, 'LPR2468', '10:06:26', 'logout', '2022/01/06'),
(44, 'LPR24683', '10:06:34', 'login', '2022/01/06'),
(45, 'LPR24683', '10:10:02', 'logout', '2022/01/06'),
(46, 'LPR24683', '10:10:08', 'login', '2022/01/06'),
(47, 'LPR24683', '10:12:02', 'logout', '2022/01/06'),
(48, 'LPR2468', '10:12:07', 'login', '2022/01/06'),
(49, 'LPR2468', '10:12:12', 'logout', '2022/01/06'),
(50, 'LPR102030', '10:13:16', 'login', '2022/01/06'),
(51, 'LPR102030', '10:13:25', 'logout', '2022/01/06'),
(52, 'LPR1234', '10:13:35', 'login', '2022/01/06'),
(53, 'LPR1234', '10:13:39', 'logout', '2022/01/06'),
(54, 'LPR102030', '10:13:44', 'login', '2022/01/06'),
(55, 'LPR102030', '10:26:54', 'logout', '2022/01/06'),
(56, 'LPR2468', '10:27:01', 'login', '2022/01/06'),
(57, 'LPR2468', '10:28:03', 'logout', '2022/01/06'),
(58, 'LPR102030', '10:28:13', 'login', '2022/01/06'),
(59, 'LPR102030', '10:55:11', 'logout', '2022/01/06'),
(60, 'LPR102030', '10:55:17', 'login', '2022/01/06'),
(61, 'LPR102030', '10:55:50', 'logout', '2022/01/06'),
(62, 'LPR24683', '10:55:55', 'login', '2022/01/06'),
(63, 'LPR24683', '12:43:28', 'login', '2022/01/06'),
(64, 'LPR24683', '14:33:15', 'logout', '2022/01/06'),
(65, 'LPR2468', '14:33:22', 'login', '2022/01/06'),
(66, 'LPR2468', '14:34:27', 'logout', '2022/01/06'),
(67, 'LPR2468', '14:34:35', 'login', '2022/01/06'),
(68, 'LPR2468', '14:34:49', 'logout', '2022/01/06'),
(69, 'LPR102030', '14:34:56', 'login', '2022/01/06'),
(70, 'LPR102030', '16:08:30', 'logout', '2022/01/06'),
(71, 'LPR2468', '16:08:37', 'login', '2022/01/06'),
(72, 'LPR2468', '16:11:00', 'logout', '2022/01/06'),
(73, 'LPR24683', '16:11:08', 'login', '2022/01/06'),
(74, 'LPR24683', '19:26:59', 'logout', '2022/01/06'),
(75, 'LPR2468', '09:49:59', 'login', '2022/01/07'),
(76, 'LPR2468', '10:53:32', 'logout', '2022/01/07'),
(77, 'LPR24683', '10:53:49', 'login', '2022/01/07'),
(78, 'LPR24683', '11:16:15', 'logout', '2022/01/07'),
(79, 'LPR2468', '11:16:22', 'login', '2022/01/07'),
(80, 'LPR2468', '11:18:33', 'logout', '2022/01/07'),
(81, 'LPR24683', '11:18:40', 'login', '2022/01/07'),
(82, 'LPR24683', '11:19:05', 'logout', '2022/01/07'),
(83, 'LPR102030', '11:19:11', 'login', '2022/01/07'),
(84, 'LPR102030', '11:19:22', 'logout', '2022/01/07'),
(85, 'LPR1234', '11:19:32', 'login', '2022/01/07'),
(86, 'LPR1234', '11:19:38', 'logout', '2022/01/07'),
(87, 'LPR24683', '11:19:48', 'login', '2022/01/07'),
(88, 'LPR24683', '12:02:14', 'logout', '2022/01/07'),
(89, 'LPR102030', '12:02:21', 'login', '2022/01/07'),
(90, 'LPR102030', '12:02:37', 'logout', '2022/01/07'),
(91, 'LPR24683', '12:02:44', 'login', '2022/01/07');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

DROP TABLE IF EXISTS `marks`;
CREATE TABLE IF NOT EXISTS `marks` (
  `mark_id` int(11) NOT NULL AUTO_INCREMENT,
  `score` int(11) NOT NULL,
  `sub` varchar(255) NOT NULL,
  `testnum` int(11) NOT NULL,
  `term` varchar(11) NOT NULL,
  `pupil_id` varchar(20) NOT NULL,
  `Teacher_id` varchar(20) NOT NULL,
  PRIMARY KEY (`mark_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`mark_id`, `score`, `sub`, `testnum`, `term`, `pupil_id`, `Teacher_id`) VALUES
(1, 55, 'CIVICS', 1, '2', '1', 'LPR2468'),
(2, 60, 'CIVICS', 2, '2', '1', 'LPR2468');

-- --------------------------------------------------------

--
-- Table structure for table `pupils`
--

DROP TABLE IF EXISTS `pupils`;
CREATE TABLE IF NOT EXISTS `pupils` (
  `pupil_id` int(11) NOT NULL AUTO_INCREMENT,
  `pupil_name` varchar(255) NOT NULL,
  `class` varchar(10) NOT NULL,
  PRIMARY KEY (`pupil_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pupils`
--

INSERT INTO `pupils` (`pupil_id`, `pupil_name`, `class`) VALUES
(1, 'Evans Bwalya', '12N'),
(2, 'Malama Francis', '12N'),
(3, 'Foster Kangwa', '7b'),
(4, 'Zulu Booma', '7b'),
(5, 'Kelvin Sampa', '7b'),
(7, 'Mercy Nambeya', '7b');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `sub_id` int(10) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(11) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `user_id`) VALUES
(4, 'LPR1234'),
(3, 'LPR24683'),
(5, 'LPR102030'),
(6, 'LPR102030');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_log_id` varchar(255) NOT NULL,
  `fullnames` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_log_id`, `fullnames`, `phone`, `password`, `user_type`, `status`) VALUES
(1, 'LPR2468', 'Mary Mulenga', '0966367116', '123', 'admin', 'active'),
(4, 'LPR24683', 'Chisanga Innocent', '0966367116', '123', 'Teacher', 'offline'),
(5, 'LPR1234', 'Mulange Malama', '0908989785', '123', 'Teacher', 'offline'),
(6, 'LPR102030', 'Foster Bwalya', '097801928948', '123', 'Teacher', 'offline');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
