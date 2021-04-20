-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2018 at 07:19 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hy-360`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Cid` int(5) NOT NULL,
  `IBAN` int(20) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Dept` int(20) NOT NULL,
  `History` int(10) NOT NULL,
  `Isa` tinyint(1) NOT NULL,
  `PhoneNumber` int(10) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`FirstName`, `LastName`, `Cid`, `IBAN`, `Address`, `Dept`, `History`, `Isa`, `PhoneNumber`, `Username`, `Password`) VALUES
('andreas', 'pattakos', 11, 1234567890, 'arkadiou 5', 0, 0, 0, 2147483647, 'Glwssa', 'Lostplanet3'),
('stratos', 'sikelis', 12, 1346523456, 'Euagelistrias 62', 0, 0, 1, 2147483647, 'magoulas', '3151');

-- --------------------------------------------------------

--
-- Table structure for table `client_order`
--

CREATE TABLE `client_order` (
  `Oid` int(5) NOT NULL DEFAULT '0',
  `Date` varchar(30) NOT NULL,
  `State` tinyint(1) NOT NULL,
  `Cost` int(6) NOT NULL,
  `clientID` int(5) NOT NULL,
  `wineID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `variety`
--

CREATE TABLE `variety` (
  `wineID` int(5) NOT NULL,
  `Photo` varchar(30) NOT NULL,
  `Color` varchar(30) NOT NULL,
  `Description` varchar(30) NOT NULL,
  `Vid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variety`
--

INSERT INTO `variety` (`wineID`, `Photo`, `Color`, `Description`, `Vid`) VALUES
(1, '', '', 'Defni', 1),
(1, '', '', 'Liatiko', 2),
(1, '', '', 'Malvasia Aromatica', 3),
(1, '', '', 'Plyto', 14),
(2, '', '', 'Garignan', 4),
(2, '', '', 'Rozaki', 11),
(3, '', '', 'Dafni', 5),
(4, '', '', 'Dafni', 6),
(4, '', '', 'Vidiano', 9),
(4, '', '', 'Tempranilo', 13),
(5, '', '', 'Merlot', 7),
(5, '', '', 'Syrah', 10),
(6, '', '', 'Vilana', 8),
(6, '', '', 'Sangiovese', 12),
(6, '', '', 'Petit Verdot', 15);

-- --------------------------------------------------------

--
-- Table structure for table `wine`
--

CREATE TABLE `wine` (
  `Name` varchar(30) NOT NULL,
  `Color` varchar(30) NOT NULL,
  `Discription` varchar(100) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Winery` varchar(30) NOT NULL,
  `Wid` int(5) NOT NULL,
  `Stock` int(5) NOT NULL,
  `Price` int(5) NOT NULL,
  `Wine_From` varchar(30) NOT NULL,
  `Photo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wine`
--

INSERT INTO `wine` (`Name`, `Color`, `Discription`, `Type`, `Winery`, `Wid`, `Stock`, `Price`, `Wine_From`, `Photo`) VALUES
('WineRedOne', 'Red', '', 'Sweet', 'Peza Union', 1, 100, 50, 'Herakleion', ''),
('WineRedTwo', 'Red', '', 'Sweet', 'Peza Union', 2, 100, 30, 'Herakleion', ''),
('WineRoseOne', 'Rose', '', 'Dry', 'Anoskeli Winery', 3, 100, 80, 'Rethimno', ''),
('WineRoseTwo', 'Rose', '', 'Dry', 'Digenakis Quality Wines', 4, 100, 20, 'Hania', ''),
('WineWhiteOne', 'White', '', 'Semi-Dry', 'Michalakis Winery', 5, 100, 60, 'Hania', ''),
('WineWhiteTwo', 'White', '', 'Semi-Dry', 'Lyrarakis -Gea SA', 6, 100, 70, 'Rethimnon', '');

-- --------------------------------------------------------

--
-- Table structure for table `winery`
--

CREATE TABLE `winery` (
  `Name` varchar(30) NOT NULL,
  `wineID` int(5) NOT NULL,
  `Photo` varchar(30) NOT NULL,
  `Info` varchar(100) NOT NULL,
  `History` varchar(100) NOT NULL,
  `Fax` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `winery`
--

INSERT INTO `winery` (`Name`, `wineID`, `Photo`, `Info`, `History`, `Fax`, `email`, `Phone`) VALUES
('Anoskeli Winery', 3, '', '', '', 0, '', 0),
('Digenakis Quality Wines', 4, '', '', '', 0, '', 0),
('Lyrarakis -Gea SA', 6, '', '', '', 0, '', 0),
('Michalakis Winery', 5, '', '', '', 0, '', 0),
('Peza Union', 1, '', '', '', 0, '', 0),
('Peza Union', 2, '', '', '', 0, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`Cid`);

--
-- Indexes for table `client_order`
--
ALTER TABLE `client_order`
  ADD PRIMARY KEY (`Oid`),
  ADD KEY `cid` (`clientID`),
  ADD KEY `wineID` (`wineID`);

--
-- Indexes for table `variety`
--
ALTER TABLE `variety`
  ADD PRIMARY KEY (`wineID`,`Vid`);

--
-- Indexes for table `wine`
--
ALTER TABLE `wine`
  ADD PRIMARY KEY (`Wid`);

--
-- Indexes for table `winery`
--
ALTER TABLE `winery`
  ADD PRIMARY KEY (`Name`,`wineID`) USING BTREE,
  ADD KEY `wineID` (`wineID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `Cid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wine`
--
ALTER TABLE `wine`
  MODIFY `Wid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `variety`
--
ALTER TABLE `variety`
  ADD CONSTRAINT `variety_ibfk_1` FOREIGN KEY (`wineID`) REFERENCES `wine` (`Wid`);

--
-- Constraints for table `winery`
--
ALTER TABLE `winery`
  ADD CONSTRAINT `winery_ibfk_1` FOREIGN KEY (`wineID`) REFERENCES `wine` (`Wid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
