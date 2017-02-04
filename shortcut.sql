-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2017 at 05:31 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shortcut`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_url`
--

CREATE TABLE `tbl_url` (
  `url_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `url_name` text NOT NULL,
  `url_code` varchar(50) NOT NULL,
  `url_views` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_url`
--

INSERT INTO `tbl_url` (`url_id`, `user_id`, `url_name`, `url_code`, `url_views`) VALUES
(61, 8496, 'https://cpanel.hostinger.ae/', 'd4aab', NULL),
(62, 849639, 'https://cpanel.hostinger.ae/', 'a5lb5', NULL),
(63, 74730342, 'https://www.youtube.com/', 'ab09a', NULL),
(64, 74730342, 'https://www.facbook.com/', '1b1Eh', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_url`
--
ALTER TABLE `tbl_url`
  ADD PRIMARY KEY (`url_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_url`
--
ALTER TABLE `tbl_url`
  MODIFY `url_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
