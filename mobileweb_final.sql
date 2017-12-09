-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 06, 2017 at 03:18 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobileweb_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `incidents`
--

CREATE TABLE `incidents` (
  `reporter` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `location` varchar(200) NOT NULL,
  `details` varchar(600) NOT NULL,
  `picture` blob NOT NULL,
  `audio` blob NOT NULL,
  `video` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `registrationID` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `confirmpassword` varchar(200) NOT NULL,
  `telephonenumber` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `organization` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`registrationID`, `fullname`, `age`, `username`, `password`, `confirmpassword`, `telephonenumber`, `email`, `organization`) VALUES
(1, 'Emefa Sengretsi', 21, 'mefs', 'mefs', 'mefs', '0204383431', 'mefs@yahoooutlook.com', 'Ashesi Police'),
(2, 'Roman Father', 75, 'romanfather', 'roman', 'roman', '12222111122', 'romanfather@catholic.com', 'Catholic Church, Kenya Diocese'),
(4, 'Nana Adjoa Bentil', 20, 'nanaadjoa', 'nanaadjoa', 'nanaadjoa', '0203704044', 'nana.bentil@ashesi.edu.gh', ''),
(5, 'Killian', 192, 'killianjones', 'iloveemma', 'iloveemma', '7035550169', 'killianjones@onceuponatime.com', 'Most Handsome Man on Earth'),
(6, 'Johnny Walker', 55, 'johnnywalker', 'johnnywalker', 'johnnywalker', '7034201523', 'johnnywalker@blacklabel.org', 'Black Label Manufacturing'),
(7, 'Selassie Golloh', 20, 'qsg', 'qsg', 'qsg', '0269112231', 'selassie.golloh@ashesi.edu.gh', 'Ghana Police'),
(8, 'Selasi Gborglah', 20, 'selasi', 'pa$$word', 'pa$$word', '0545115519', 'selasigborglah@gmail.com', 'EY');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`registrationID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `registrationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
