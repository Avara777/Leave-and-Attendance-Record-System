-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2023 at 08:10 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leave and attendance record system`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `Id` varchar(10) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Qualification` varchar(200) DEFAULT NULL,
  `DateOfBirth` varchar(15) NOT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `PhoneNumber` bigint(20) UNSIGNED DEFAULT NULL,
  `Experience` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`Id`, `Name`, `Password`, `Qualification`, `DateOfBirth`, `Email`, `PhoneNumber`, `Experience`) VALUES
('XXX', 'Ali', '12345', 'PHD', '1-1-1999', '123.456@gmail.com', 999456321, 4);

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `Id` int(11) NOT NULL,
  `NumberOfEmployees` bigint(255) DEFAULT NULL,
  `TotalCasualLeave` int(11) NOT NULL,
  `TotalCompensatoryLeave` int(11) NOT NULL,
  `TotalEarnedLeave` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`Id`, `NumberOfEmployees`, `TotalCasualLeave`, `TotalCompensatoryLeave`, `TotalEarnedLeave`) VALUES
(1, 5, 15, 10, 40);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Id` int(255) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Qualification` varchar(200) DEFAULT NULL,
  `DateOfBirth` varchar(15) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `PhoneNumber` bigint(20) UNSIGNED NOT NULL,
  `Experience` int(20) DEFAULT NULL,
  `LeavesRejected` mediumint(9) DEFAULT NULL,
  `LeavesAccepted` mediumint(9) DEFAULT NULL,
  `AvailedCasualLeave` float NOT NULL,
  `AvailedCompensatoryLeave` float NOT NULL,
  `AvailedEarnedLeave` float NOT NULL,
  `FromDate` date DEFAULT NULL,
  `ToDate` date DEFAULT NULL,
  `LeaveStatus` enum('Not Sent','Pending','Accepted','Rejected') NOT NULL,
  `LeaveRequested` tinyint(1) NOT NULL,
  `LeaveRecord` int(255) DEFAULT NULL,
  `AttendanceRecord` int(255) DEFAULT NULL,
  `TotalRecordOfLeavePerMonth` bigint(255) DEFAULT NULL,
  `TotalRecordOfLeavePerYear` bigint(255) DEFAULT NULL,
  `TotalRecordOfAttendancePerYear` bigint(20) NOT NULL,
  `TotalRecordOfAttendancePerMonth` bigint(20) NOT NULL,
  `TimeIn` datetime DEFAULT NULL,
  `TimeOut` datetime DEFAULT NULL,
  `LeaveType` enum('None','Full','Partial') NOT NULL,
  `LeaveDescription` enum('None','Casual','Compensatory','Earned') NOT NULL,
  `LeaveReason` text NOT NULL,
  `MinCasualLeave` float NOT NULL,
  `MinCompensatoryLeave` float NOT NULL,
  `MinEarnedLeave` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Id`, `Name`, `Password`, `Qualification`, `DateOfBirth`, `Email`, `PhoneNumber`, `Experience`, `LeavesRejected`, `LeavesAccepted`, `AvailedCasualLeave`, `AvailedCompensatoryLeave`, `AvailedEarnedLeave`, `FromDate`, `ToDate`, `LeaveStatus`, `LeaveRequested`, `LeaveRecord`, `AttendanceRecord`, `TotalRecordOfLeavePerMonth`, `TotalRecordOfLeavePerYear`, `TotalRecordOfAttendancePerYear`, `TotalRecordOfAttendancePerMonth`, `TimeIn`, `TimeOut`, `LeaveType`, `LeaveDescription`, `LeaveReason`, `MinCasualLeave`, `MinCompensatoryLeave`, `MinEarnedLeave`) VALUES
(1, 'Usman', '11111', 'Phd', '1-1-1999', '111.111@gmail.com', 11101110, 4, 0, 4, 5, 2, 4, NULL, NULL, 'Not Sent', 0, 10, 60, 2, 6, 150, 24, NULL, NULL, 'None', 'None', '', 0, 0, 0),
(2, 'Nayyar', '22222', 'post graduate', '1978-04-06', '222.222@gmail.com', 22202220, 3, 3, 2, 4, 9, 5, NULL, NULL, 'Not Sent', 0, 12, 112, 1, 3, 107, 19, NULL, NULL, 'None', 'None', '', 0, 0, 0),
(3, 'John', '33333', 'phd', '1984-04-01', '333.333@gmail.com', 330303, 5, 3, 3, 0, 0, 0, '0000-00-00', '0000-00-00', 'Not Sent', 0, 13, 221, 1, 2, 221, 21, NULL, NULL, 'None', 'None', '', 0, 0, 0),
(4, 'Zakaria', '44444', 'Bachelor', '1997-07-16', '444.444@gmail.com', 440404, 6, 5, 8, 7, 7, 6, NULL, NULL, 'Not Sent', 0, 11, 193, 1, 2, 193, 23, NULL, NULL, 'None', 'None', '', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
