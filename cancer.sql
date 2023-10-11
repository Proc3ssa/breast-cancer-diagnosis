-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2023 at 01:12 AM
-- Server version: 8.0.32
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cancer`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointmentid` varchar(20) NOT NULL,
  `doctor` varchar(20) NOT NULL,
  `department` varchar(23) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `symptoms` varchar(30) NOT NULL,
  `data` date NOT NULL,
  `patient` varchar(40) NOT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointmentid`, `doctor`, `department`, `telephone`, `symptoms`, `data`, `patient`, `time`) VALUES
('080820231006', 'Dr. Faisal Halid ', '--select---', '34342534636', 'two', '2023-08-15', 'faisal@outlook.com', '11:02'),
('080820233658', 'Dr. Faisal Halid ', 'Prostate Cancer ', '098847625', 'sdes', '2023-08-16', 'faisal@outlook.com', '12:57');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`name`, `email`, `tel`, `message`) VALUES
('Faisal', 'sss@gmail.com', '222222', '2222222222222eeeeeeeeeeeeeeeeeeeeee444444444444444444444444444444444444444444444444444rrrrrrrrrrrrrrrfffffffffffffffff');

-- --------------------------------------------------------

--
-- Table structure for table `myhealth`
--

CREATE TABLE `myhealth` (
  `patient` varchar(50) NOT NULL,
  `scan` varchar(200) NOT NULL,
  `scantype` varchar(20) NOT NULL,
  `result` varchar(100) NOT NULL,
  `doctor's remarks` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `myhealth`
--

INSERT INTO `myhealth` (`patient`, `scan`, `scantype`, `result`, `doctor's remarks`) VALUES
('faisal@outlook.com', 'faisalhalidxray1023.png', 'X-ray', 'weeaeraw', 'SIGN IN -PATIENT\r\nfaisal@outlook.com\r\n•••••\r\nLOGIN\r\nADDRESS\r\nGhana\r\nCall +233 1234567890\r\nme@gmail.com\r\nUSEFUL LINK\r\nHome\r\nAbout\r\nTreatment\r\nDoctors\r\nTestimonial\r\nContact us\r\n©');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `password` varchar(16) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `genotype` varchar(5) NOT NULL,
  `bloodgroup` varchar(5) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`firstname`, `lastname`, `password`, `dob`, `gender`, `genotype`, `bloodgroup`, `tel`, `email`) VALUES
('4234', '343', '11111', '2023-07-26', 'Female', 'AC', 'A-', '3443434', 'faisal@outlook.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointmentid`);

--
-- Indexes for table `myhealth`
--
ALTER TABLE `myhealth`
  ADD PRIMARY KEY (`patient`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
