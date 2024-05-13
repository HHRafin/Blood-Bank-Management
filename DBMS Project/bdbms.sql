-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 08:43 PM
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
-- Database: `bdbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `donor_health`
--

CREATE TABLE `donor_health` (
  `DonorID` int(11) NOT NULL,
  `Weight` decimal(5,2) DEFAULT NULL,
  `BloodPressure` varchar(20) DEFAULT NULL,
  `IronContent` decimal(5,2) DEFAULT NULL,
  `BloodBankName` varchar(100) DEFAULT NULL,
  `BloodGroup` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor_health`
--

INSERT INTO `donor_health` (`DonorID`, `Weight`, `BloodPressure`, `IronContent`, `BloodBankName`, `BloodGroup`) VALUES
(1, 95.00, '120\\80', 10.00, 'DMK', 'B+'),
(3, 55.00, '120\\80', 9.00, 'Square Hospital', 'AB+'),
(5, 40.00, '120\\80', 9.00, 'Dhaka Medical College Blood Bank', 'AB+'),
(6, 60.00, '130\\80', 6.00, 'Combined Military Hospital', 'A+'),
(7, 45.00, '120/70', 25.00, 'Evercare Hospital', 'AB-'),
(8, 45.00, '120/70', 25.00, 'Evercare Hospital', 'AB-');

-- --------------------------------------------------------

--
-- Table structure for table `donor_personal`
--

CREATE TABLE `donor_personal` (
  `DonorID` int(11) NOT NULL,
  `DonorName` varchar(100) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `MobileNumber` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor_personal`
--

INSERT INTO `donor_personal` (`DonorID`, `DonorName`, `Gender`, `DateOfBirth`, `MobileNumber`) VALUES
(1, 'nayeem', 'male', '2024-05-15', '01608089716'),
(3, 'Rafin', 'male', '2024-05-16', '01725365134'),
(5, 'Sanjida', 'male', '2024-05-10', '01608089716'),
(6, 'Shaikat Hossain', 'male', '2001-11-11', '01858925327'),
(7, 'Farhana Yeasmin Rimu', 'female', '2001-04-16', '01858925327'),
(8, 'Farhana Yeasmin Rimu', 'female', '2001-04-16', '01858925327');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donor_health`
--
ALTER TABLE `donor_health`
  ADD KEY `DonorID` (`DonorID`);

--
-- Indexes for table `donor_personal`
--
ALTER TABLE `donor_personal`
  ADD PRIMARY KEY (`DonorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donor_personal`
--
ALTER TABLE `donor_personal`
  MODIFY `DonorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donor_health`
--
ALTER TABLE `donor_health`
  ADD CONSTRAINT `donor_health_ibfk_1` FOREIGN KEY (`DonorID`) REFERENCES `donor_personal` (`DonorID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
