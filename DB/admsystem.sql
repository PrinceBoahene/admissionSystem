-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2022 at 08:24 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm`
--

CREATE TABLE `adm` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `admStatus` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adm`
--

INSERT INTO `adm` (`id`, `username`, `password`, `contact`, `admStatus`) VALUES
(1, 'admin', 'admin123', '0549142719', 0),
(2, 'nana', '12345', '0549142719', 0);

-- --------------------------------------------------------

--
-- Table structure for table `candidatedetails`
--

CREATE TABLE `candidatedetails` (
  `id` int(11) NOT NULL,
  `candidateID` varchar(250) NOT NULL,
  `SerialNo` varchar(250) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Firstname` varchar(250) NOT NULL,
  `Middlename` varchar(200) NOT NULL,
  `Lastname` varchar(250) NOT NULL,
  `Gender` varchar(200) NOT NULL,
  `DOB` date NOT NULL,
  `NationalID` varchar(250) NOT NULL,
  `Religion` varchar(200) NOT NULL,
  `COB` varchar(200) NOT NULL,
  `Phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `nationality` varchar(200) NOT NULL,
  `pysicalDisability` varchar(100) NOT NULL,
  `ActualDisability` varchar(100) NOT NULL,
  `maritalStatus` varchar(100) NOT NULL,
  `DOA` date NOT NULL,
  `password` varchar(250) NOT NULL,
  `serialStatus` int(20) NOT NULL,
  `admStatus` int(20) NOT NULL,
  `formtype` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidatedetails`
--

INSERT INTO `candidatedetails` (`id`, `candidateID`, `SerialNo`, `Title`, `Firstname`, `Middlename`, `Lastname`, `Gender`, `DOB`, `NationalID`, `Religion`, `COB`, `Phone`, `email`, `nationality`, `pysicalDisability`, `ActualDisability`, `maritalStatus`, `DOA`, `password`, `serialStatus`, `admStatus`, `formtype`) VALUES
(182, '518000002', '0984237516', 'Mr', 'Prince', 'Kwaku', 'Boahene', 'Male', '2022-01-05', 'GHA- 8382', 'Male', 'Ghana', '+233549142719', 'nanakayprince@gmail.com', 'Ghanaian', 'Male', 'none', 'Single', '2022-01-16', 'ty7DWr', 1, 1, 'HND');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `candidateID` varchar(200) NOT NULL,
  `serialnum` varchar(200) NOT NULL,
  `passportPic` varchar(500) NOT NULL,
  `resultSlip` varchar(500) NOT NULL,
  `academicCert` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `candidateID`, `serialnum`, `passportPic`, `resultSlip`, `academicCert`) VALUES
(13, '', '0984237516', '3555-Dear Sir.pdf', '4713-Dear Sir.pdf', '1435-Dear Sir.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `guardiandetails`
--

CREATE TABLE `guardiandetails` (
  `id` int(11) NOT NULL,
  `candidateID` varchar(200) NOT NULL,
  `SerialNumber` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `digitalAddress` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `housenumber` varchar(200) NOT NULL,
  `streetname` varchar(200) NOT NULL,
  `town` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guardiandetails`
--

INSERT INTO `guardiandetails` (`id`, `candidateID`, `SerialNumber`, `name`, `digitalAddress`, `phone`, `housenumber`, `streetname`, `town`) VALUES
(7, '', '0984237516', '', '', '', '', '', ''),
(8, '', '0984237516', 'Princess Owusu Baoteng', 'Amakom', '+233549142719', 'Amakom', 'Amakom', 'panji');

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

CREATE TABLE `programme` (
  `id` int(11) NOT NULL,
  `candidateID` varchar(200) NOT NULL,
  `serialnum` varchar(200) NOT NULL,
  `EntryQualification` varchar(200) NOT NULL,
  `firstChoice` varchar(200) NOT NULL,
  `secondChoice` varchar(200) NOT NULL,
  `thirdChoice` varchar(200) NOT NULL,
  `sessionPreference` varchar(200) NOT NULL,
  `programOption` varchar(200) NOT NULL,
  `yrofAdmission` varchar(200) NOT NULL,
  `previousSchool` varchar(200) NOT NULL,
  `programStudy` varchar(200) NOT NULL,
  `yearcompleted` varchar(200) NOT NULL,
  `classobtain` varchar(200) NOT NULL,
  `stunumber` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programme`
--

INSERT INTO `programme` (`id`, `candidateID`, `serialnum`, `EntryQualification`, `firstChoice`, `secondChoice`, `thirdChoice`, `sessionPreference`, `programOption`, `yrofAdmission`, `previousSchool`, `programStudy`, `yearcompleted`, `classobtain`, `stunumber`) VALUES
(6, '', '0984237516', 'WASSCE', 'BTech computer technology', 'BTech computer technology', 'BTech computer technology', 'Regular', 'Other', '2022-01-26', 'Tweneboa Kodua SHS', 'math', '2022-01-04', 'first class', '05483823');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidatedetails`
--
ALTER TABLE `candidatedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardiandetails`
--
ALTER TABLE `guardiandetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `candidatedetails`
--
ALTER TABLE `candidatedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `guardiandetails`
--
ALTER TABLE `guardiandetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `programme`
--
ALTER TABLE `programme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
