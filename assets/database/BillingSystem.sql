-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 13, 2023 at 02:18 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BillingSystem`
--
-- Creating Database: BillingSystem
-- CREATE DATABASE BillingSystem;

-- Creating Users
-- CREATE  USER 'user'@'localhost' IDENTIFIED BY "user";

-- Granting All Permission to User on Databse BillingSystem
-- GRANT ALL PRIVILEGES ON BillingSystem.* TO 'user'@'localhost';



-- --------------------------------------------------------

--
-- Table structure for table `AdminInfo`
--

CREATE TABLE `AdminInfo` (
  `username` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `adminpwd` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `AdminInfo`
--

INSERT INTO `AdminInfo` (`username`, `name`, `email`, `phone`, `adminpwd`) VALUES
('admin', 'Admin', 'admin@admin.com', '9800000000', '21232f297a57a5a743894a0e4a801fc3'),
('santoshvandari', 'Santosh Bhandari', 'santoshvandari100@gmail.com', '9824988945', '7709788ffbf21370dbeb27acff1fa383');

-- --------------------------------------------------------

--
-- Table structure for table `BillInfo`
--

CREATE TABLE `BillInfo` (
  `phone` varchar(15) NOT NULL,
  `cid` varchar(15) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `tdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `BillInfo`
--

INSERT INTO `BillInfo` (`phone`, `cid`, `amount`, `tdate`) VALUES
('9824988945', 'CA102', 5000.00, '2023-10-13 10:21:50'),
('9824988945', 'CA102', 20000.00, '2023-10-13 10:21:54'),
('9824988945', 'CA102', 210.00, '2023-10-13 10:21:57'),
('9824988946', 'CA101', 1000.00, '2023-10-13 13:04:37'),
('9824988946', 'CA101', 5000.00, '2023-10-13 17:41:44');

-- --------------------------------------------------------

--
-- Table structure for table `CourseInfo`
--

CREATE TABLE `CourseInfo` (
  `cid` varchar(15) NOT NULL,
  `cname` varchar(200) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `CourseInfo`
--

INSERT INTO `CourseInfo` (`cid`, `cname`, `price`) VALUES
('CA101', 'Computer Advance', 10000.00),
('CA102', 'PHP Programming Basic', 30000.00),
('CA103', 'JAVA Programming', 10000.00);

-- --------------------------------------------------------

--
-- Table structure for table `StudentInfo`
--

CREATE TABLE `StudentInfo` (
  `phone` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `parentname` varchar(50) NOT NULL,
  `cid` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `StudentInfo`
--

INSERT INTO `StudentInfo` (`phone`, `name`, `address`, `email`, `gender`, `parentname`, `cid`) VALUES
('9815079693', 'Manoj Oli', 'Kanakai-03', 'manojoli@gmail.com', 'male', 'Mohan Oli', 'CA103'),
('9824988945', 'Santosh Bhandari', 'kanakai-07', 'santoshvandari100@gmail.com', 'male', 'Nanda Kumar Bhandari', 'CA102'),
('9824988946', 'Kiran Dahal', 'kanakai-03', 'kiran@gmail.com', 'male', 'Hari Bhadur Dahal', 'CA101');

-- --------------------------------------------------------

--
-- Table structure for table `UserInfo`
--

CREATE TABLE `UserInfo` (
  `username` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `userpwd` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `UserInfo`
--

INSERT INTO `UserInfo` (`username`, `name`, `email`, `phone`, `userpwd`) VALUES
('santoshvandari', 'Santosh Bhandari', 'santosh@santosh.com', '9824980000', '7709788ffbf21370dbeb27acff1fa383'),
('temp', 'temp', 'temp@gmail.com', '9800000000', '3d801aa532c1cec3ee82d87a99fdf63f'),
('user', 'User', 'user@user.com', '9800000000', 'ee11cbb19052e40b07aac0ca060c23ee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AdminInfo`
--
ALTER TABLE `AdminInfo`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `BillInfo`
--
ALTER TABLE `BillInfo`
  ADD KEY `phone` (`phone`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `CourseInfo`
--
ALTER TABLE `CourseInfo`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `StudentInfo`
--
ALTER TABLE `StudentInfo`
  ADD PRIMARY KEY (`phone`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `UserInfo`
--
ALTER TABLE `UserInfo`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BillInfo`
--
ALTER TABLE `BillInfo`
  ADD CONSTRAINT `BillInfo_ibfk_1` FOREIGN KEY (`phone`) REFERENCES `StudentInfo` (`phone`),
  ADD CONSTRAINT `BillInfo_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `CourseInfo` (`cid`);

--
-- Constraints for table `StudentInfo`
--
ALTER TABLE `StudentInfo`
  ADD CONSTRAINT `StudentInfo_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `CourseInfo` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
