-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 06, 2023 at 03:22 PM
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
('admin', 'Admin', 'admin@admin.com', '9800000000', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `BillInfo`
--

CREATE TABLE `BillInfo` (
  `phone` varchar(15) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `BillInfo`
--

INSERT INTO `BillInfo` (`phone`, `description`, `amount`) VALUES
('9824988945', '|computer basic|computer networking|BCA', 500000.00),
('9800000000', '|Computer Basic|Computer Programming', 10000.00),
('9800000000', '|Compute Advace', 5000.00),
('9800000000', '|Compute Advace', 5000.00),
('9814003142', '|Computer Basic|Computer Hardware|Java Programming', 15000.00),
('9814003142', '|PHP Programming', 5000.00),
('9806079122', '|Php Programming|Java|Python|C|Author', 10000.00);

-- --------------------------------------------------------

--
-- Table structure for table `StudentInfo`
--

CREATE TABLE `StudentInfo` (
  `phone` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `parentname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `StudentInfo`
--

INSERT INTO `StudentInfo` (`phone`, `name`, `address`, `email`, `gender`, `parentname`) VALUES
('9800000000', 'Nayan Pathak', 'Birtamode-06', 'NULL', 'male', 'Radhika Pathak'),
('9806073122', 'Ayusha Dahal', 'Birtamode', 'ayusha@gmail.com', 'female', 'Ayush Dahal'),
('9806079122', 'Tikaram Parajuli', 'Dhulabari-10', 'tikaram@gmail.com', 'male', 'tiakram thapa parajuli'),
('9814003142', 'Manoj Oli', 'Sarnamati', 'manoj@gmail.com', 'male', 'KP Oli'),
('9824988945', 'santosh bhandari', 'kanakai-07', 'santoshvandari1@gmail.com', 'male', 'Nanda Kumar Bhandari');

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
  ADD KEY `phone` (`phone`);

--
-- Indexes for table `StudentInfo`
--
ALTER TABLE `StudentInfo`
  ADD PRIMARY KEY (`phone`);

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
  ADD CONSTRAINT `BillInfo_ibfk_1` FOREIGN KEY (`phone`) REFERENCES `StudentInfo` (`phone`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
