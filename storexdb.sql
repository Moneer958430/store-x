-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2020 at 05:26 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storexdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`ID`, `username`, `password`) VALUES
(1, 'moneer', '6da0c8ca7a92cbd27cb93dbf4c5f1b62470ebf3c'),
(2, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `Name`, `Email`, `Phone`) VALUES
(7245001, 'Dwight', 'dwight@dm.com', '(437) 320-0373'),
(7245002, 'Michael', 'manager@dm.com', '(639) 703-1598'),
(7245003, 'Meredith', 'meredith@dm.com', '(553) 762-1595'),
(7245004, 'Toby', NULL, '(222) 507-3370'),
(7245005, 'Kevin', 'kevin@dm.com', '(766) 648-7292');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ID`, `Name`, `Price`) VALUES
(4050, 'Coffee', 15.5),
(4055, 'Soda', 8.5),
(4060, 'Tea', 14),
(4065, 'Juice', 35),
(4070, 'Sugar', 50),
(4075, 'Bread', 3),
(4080, 'Cereal', 88),
(4087, '\"<script>alert(\'OK\');</script>', 10);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `ID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`ID`, `CustomerID`, `timestamp`) VALUES
(1100011, 7245004, '2019-10-02 15:12:45'),
(1100013, 7245001, '2019-10-06 19:17:08'),
(1100015, 7245005, '2019-10-14 18:51:54'),
(1100017, 7245001, '2019-10-17 13:40:28'),
(1100019, 7245002, '2019-10-20 07:21:46'),
(1100021, 7245004, '2019-10-21 09:32:15'),
(1100023, 7245001, '2019-11-01 10:04:55'),
(1100025, 7245001, '2019-11-10 16:48:14');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_entry`
--

CREATE TABLE `transaction_entry` (
  `ID` int(11) NOT NULL,
  `TransactionID` int(11) DEFAULT NULL,
  `ItemID` int(11) DEFAULT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_entry`
--

INSERT INTO `transaction_entry` (`ID`, `TransactionID`, `ItemID`, `Quantity`) VALUES
(31000, 1100011, 4075, 10),
(31001, 1100013, 4060, 13),
(31002, 1100013, 4055, 14),
(31003, 1100015, 4080, 1),
(31004, 1100015, 4050, 6),
(31005, 1100015, 4055, 14),
(31006, 1100015, 4070, 11),
(31007, 1100015, 4075, 9),
(31008, 1100017, 4060, 8),
(31009, 1100017, 4055, 10),
(31010, 1100017, 4080, 6),
(31011, 1100019, 4075, 9),
(31012, 1100019, 4055, 8),
(31013, 1100021, 4050, 7),
(31014, 1100021, 4080, 5),
(31015, 1100021, 4070, 10),
(31016, 1100021, 4075, 1),
(31017, 1100023, 4075, 7),
(31018, 1100025, 4080, 15),
(31019, 1100025, 4075, 2),
(31020, 1100025, 4070, 3),
(31021, 1100025, 4060, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `transaction_entry`
--
ALTER TABLE `transaction_entry`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TransactionID` (`TransactionID`),
  ADD KEY `ItemID` (`ItemID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7245006;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4088;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1100026;

--
-- AUTO_INCREMENT for table `transaction_entry`
--
ALTER TABLE `transaction_entry`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31022;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`ID`);

--
-- Constraints for table `transaction_entry`
--
ALTER TABLE `transaction_entry`
  ADD CONSTRAINT `transaction_entry_ibfk_1` FOREIGN KEY (`TransactionID`) REFERENCES `transaction` (`ID`),
  ADD CONSTRAINT `transaction_entry_ibfk_2` FOREIGN KEY (`ItemID`) REFERENCES `item` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
