-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 10:38 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `term_id` varchar(11) NOT NULL,
  `year_id` varchar(11) NOT NULL,
  `class_id` varchar(11) NOT NULL,
  `subject_id` varchar(11) NOT NULL,
  `teacher_id` varchar(11) NOT NULL,
  `bot` int(11) NOT NULL,
  `mot` int(11) NOT NULL,
  `eot` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `std_id`, `term_id`, `year_id`, `class_id`, `subject_id`, `teacher_id`, `bot`, `mot`, `eot`) VALUES
(1, 3, '2', '', '4', '12', '17', 23, 0, 0),
(2, 4, '', '', '', '', '', 0, 0, 0),
(3, 5, '', '', '', '', '', 0, 0, 0),
(4, 6, '', '', '', '', '', 0, 0, 0),
(5, 7, '', '', '', '', '', 0, 0, 0),
(7, 8, '', '', '', '', '', 0, 0, 0),
(8, 9, '', '', '', '', '', 0, 0, 0),
(9, 10, '3', '', '2', '4', '2', 55, 45, 33),
(10, 11, '3', '', '2', '4', '2', 78, 12, 77),
(11, 12, '', '', '', '', '', 0, 0, 0),
(12, 10, '2', '', '2', '4', '2', 23, 35, 33),
(18, 11, '2', '', '2', '4', '2', 23, 55, 90),
(19, 10, '4', '', '2', '4', '2', 90, 89, 56),
(22, 11, '4', '', '2', '4', '2', 89, 34, 55);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
