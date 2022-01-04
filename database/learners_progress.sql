-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 04, 2022 at 12:07 PM
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
  `teacher_id` int(11) NOT NULL,
  `class` varchar(11) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

DROP TABLE IF EXISTS `lessons`;
CREATE TABLE IF NOT EXISTS `lessons` (
  `lesson_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(50) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  PRIMARY KEY (`lesson_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`lesson_id`, `teacher_id`, `class_id`, `subject`) VALUES
(1, 1, 1, 'Maths'),
(2, 2, 2, 'English');

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

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
(14, 'LPR2468', '10:27:26', 'login', '2022/01/03');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

DROP TABLE IF EXISTS `marks`;
CREATE TABLE IF NOT EXISTS `marks` (
  `mark_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub` int(11) NOT NULL,
  `Teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`mark_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pupils`
--

DROP TABLE IF EXISTS `pupils`;
CREATE TABLE IF NOT EXISTS `pupils` (
  `pupil_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(10) NOT NULL,
  `class_teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`pupil_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `sub_id` int(10) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `user_id`, `class_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_log_id` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_log_id`, `phone`, `password`, `user_type`, `status`) VALUES
(1, 'LPR2468', '0966367116', '123', 'admin', 'active');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
