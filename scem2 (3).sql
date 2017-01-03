-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2017 at 09:04 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scem2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminID` varchar(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `access` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `username`, `pass`, `access`) VALUES
('a1a1', 'banana', 'pisangGoreng', 'admon'),
('a2', 'ariksubagia', 'asdasd', 'admin'),
('C1', 'bantong', 'kapal', 'Council');

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `adminID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`adminID`, `username`, `password`, `access`) VALUES
(1, 'mars', 'mars', 'admin'),
(2, 'jacob', 'mars33', 'club'),
(3, 'desy', 'mars', 'academic'),
(6, 'gused', 'lilo', 'council');

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE IF NOT EXISTS `club` (
  `club_id` varchar(11) NOT NULL,
  `club_name` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `imagepath` text NOT NULL,
  `club_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`club_id`, `club_name`, `username`, `password`, `imagepath`, `club_desc`) VALUES
('PHT', 'Photography of Stikom', 'Photo', '$2y$10$qkb8A3Bd8MxTiSwih/73UOSPlHYjJMK/tbSblMML9YtsykKneaf9O', 'photo', 'asdasd'),
('PRS', 'PROGRESS', 'Progress', '$2y$10$n4Yq4QokHuax3zSjrgoQDe4/gFlqAiZ1y23Z7zVVZ.c3gY0s58uBa', 'computer', 'asdasd'),
('SBMC', 'SBMC', 'Hima', 'asdasd', 'music', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `clubadmin`
--

CREATE TABLE IF NOT EXISTS `clubadmin` (
  `clubID` varchar(11) NOT NULL,
  `clubName` text NOT NULL,
  `username` varchar(64) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `profileImagePath` text NOT NULL,
  `clubDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clubadmin`
--

INSERT INTO `clubadmin` (`clubID`, `clubName`, `username`, `pass`, `profileImagePath`, `clubDescription`) VALUES
('1', 'dotaer', 'gabe', 'feed123', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `commentID` varchar(11) NOT NULL,
  `NIM` varchar(12) NOT NULL,
  `eventID` varchar(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `eventID` varchar(11) NOT NULL,
  `eventName` varchar(50) NOT NULL,
  `imagePath` text NOT NULL,
  `eventDesc` text NOT NULL,
  `clubID` varchar(11) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventID`, `eventName`, `imagePath`, `eventDesc`, `clubID`, `point`) VALUES
('DFD', 'Diagram F', 'fastekno.jpg', '', 'PHT', 10),
('FS', 'Fastekno', 'fastekno.jpg', 'ini event fastekno', 'PRS', 10),
('FS2', 'Fastekno2', 'fastekno.jpg', 'ini event fastekno 2', 'PRS', 10),
('HSM', 'Hasimili', 'photo.jpg', '', 'PHT', 10),
('LS', 'Linux Seminar', 'photo.jpg', 'ini event linux', 'PHT', 10),
('PC', 'Photography Comp', 'music.jpg', 'event photograph', 'SBMC', 5),
('TLK', 'TOLEKO', 'music.jpg', '', 'PHT', 10);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `nim` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(15) NOT NULL,
  `walletBalance` int(50) NOT NULL,
  `studentPhoto` varchar(255) NOT NULL,
  `skkm_point` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`nim`, `name`, `username`, `password`, `address`, `phone`, `walletBalance`, `studentPhoto`, `skkm_point`) VALUES
('', '', 'yok', '$2y$10$/31qZvrZxTPReo1vta6xvOS7m.YClIRzZi9AV91YV3R8S0U96GQ5K', '', 0, 350000, '', 0),
('e1200121', 'tolek si tolek', 'toleko', '$2y$10$61LTFYGSi81mC7WAIMMGvONLHXDZ9M93Nh1CxyptAVqlctMI.WafO', 'jalan tolek toleko', 981123342, 300000, 'Agen.jpg', 10),
('e12001222', 'full mojo rampage', 'jojo', '$2y$10$P4CbDr40vPDyEnFbN93/uOH5qgfNwuYtMIPkFRE9wm0802W2WtUbe', 'asdasd', 2147483647, 0, '', 0),
('e120012222', 'markonah', 'markonah', '$2y$10$KMpd3quOPZeaxlKOHcolrepA2gAPJqR6Y.gderB2qKvDRIoLjU9Aa', 'asdasd', 2147483647, 0, '', 0),
('e1200129', 'tolekus marcus', 'marcus', '$2y$10$tG08odWL5sehlQYAjY8Q3uzY.pmS5D47SkDwwBOEKm9qksoB7uWB2', 'asdasd', 2147483647, 0, '', 0),
('e1200212', 'wirosableng', 'wirosableng', 'mamad', 'jalan raya', 922123, 1000, 'kosong', 10),
('e1200213', 'gareng', 'wirosableng', 'mamad', 'jalan raya', 922123, 1000, 'kosong', 15),
('e12121212', 'hajimete', 'hajimete', '$2y$10$89vUUXGb44JC30mKRALhDOp9x4yVwRHnrT8iYpgDpV9yxAeADEkQy', 'asdasd', 2147483647, 0, 'DSC03917.jpg', 0),
('e1233214', 'yok saputro', 'yok', '$2y$10$3gxD0IOoKv3OVJxyPKX17OqszXekmxq2TPkcdBuV3AQM9x558.X8G', 'jalan tolek', 981123342, 0, '', 0),
('e1233217', 'hubertus palsu', 'hube', '$2y$10$5OlGwRwpyUbPNK8gcxAK0uJUuYv9snBBAVyqo7mrPD510N07mhz8a', 'asdasd', 2147483647, 800000, '', 20),
('hubehube', 'hube palsoe selaloe', 'hubehube', '$2y$10$geIF4oMcgmENlgEALIPtPur3NP6BjlwX7UV5vkCS9qOiwRZrX8ofe', 'asdasd', 981123342, 0, '', 0),
('telolet', 'telolet', 'telolet', '$2y$10$fYd6eecnGwdRa..XJmYk7uMxMnQTE0G3.XpXBcypbsqP9rN3W8yqC', 'asdasd', 2147483647, 0, 'Agen.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `ticketID` varchar(11) NOT NULL,
  `eventID` varchar(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticketID`, `eventID`, `price`) VALUES
('FS124', 'FS', 50000),
('FS125', 'FS', 50000),
('PC300', 'PC', 50000),
('TLK5', 'TLK', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `tickettrans`
--

CREATE TABLE IF NOT EXISTS `tickettrans` (
  `transID` int(11) NOT NULL,
  `ticketID` varchar(11) NOT NULL,
  `transDate` date NOT NULL,
  `nim` varchar(50) NOT NULL,
  `eventID` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickettrans`
--

INSERT INTO `tickettrans` (`transID`, `ticketID`, `transDate`, `nim`, `eventID`) VALUES
(1, 'LS110', '2012-12-12', 'e1200212', 'LS'),
(2, 'LS111', '2016-10-29', 'e1200213', 'LS'),
(3, 'FS123', '2012-12-12', 'e1200212', 'FS'),
(4, 'PC300', '2012-12-12', 'e1200212', 'PC'),
(5, 'FS123', '0000-00-00', 'e1200121', 'FS'),
(6, 'FS123', '0000-00-00', 'e1200121', 'FS'),
(7, 'LS110', '0000-00-00', 'e1200121', 'LS'),
(8, 'LS111', '0000-00-00', 'e1200121', 'LS'),
(21, 'HSM5', '0000-00-00', 'e1200121', 'HSM'),
(27, 'TLK3', '0000-00-00', 'e1200121', 'TLK'),
(28, 'TLK4', '0000-00-00', 'e1233217', 'TLK'),
(29, 'HSM7', '0000-00-00', 'e1233217', 'HSM');

-- --------------------------------------------------------

--
-- Table structure for table `topup`
--

CREATE TABLE IF NOT EXISTS `topup` (
  `topupID` int(11) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `wallet_code` varchar(16) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topup`
--

INSERT INTO `topup` (`topupID`, `nim`, `wallet_code`, `nominal`) VALUES
(1, 'e1200121', 'aseloletoleko', 50000),
(2, 'e1200121', 'aseloletoleko', 50000),
(3, 'e1200121', 'aseloletoleko', 50000),
(4, 'e1200121', 'aseloletoleko', 50000),
(5, 'e1200121', 'aseloletoleko', 50000),
(6, 'e1200121', 'aseloletoleko', 50000),
(7, 'e1200121', 'aseloletoleko', 50000),
(8, 'e1200121', 'aseloletoleko', 50000),
(9, 'e1200121', 'aseloletoleki', 150000),
(10, 'e1200121', 'aseloletolekoko', 100000),
(11, 'e1200121', 'aseloletolekoki', 100000),
(12, 'e1200121', 'jackpot', 1000000),
(13, 'e1233217', 'jackpot2', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE IF NOT EXISTS `wallet` (
  `wallet_code` varchar(16) NOT NULL,
  `nominal` int(11) NOT NULL,
  `adminID` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`club_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticketID`);

--
-- Indexes for table `tickettrans`
--
ALTER TABLE `tickettrans`
  ADD PRIMARY KEY (`transID`);

--
-- Indexes for table `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`topupID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tickettrans`
--
ALTER TABLE `tickettrans`
  MODIFY `transID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `topup`
--
ALTER TABLE `topup`
  MODIFY `topupID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
