-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 09:34 PM
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
('190820230933', 'sumaiya@linux.org', 'Breast Cancer ', '2222222222222', 'WE', '2023-08-20', 'aisha@outlook.com', '03:37'),
('190820232649', 'faisal@linux.com', 'Prostate Cancer ', '134141411', 'I have a fevre', '2023-08-26', 'idriz@outlook.com', '02:52'),
('190820233133', 'sumaiya@linux.org', 'Breast Cancer ', '13434243', 'dqweq', '2023-08-19', 'aisha@outlook.com', '13:36'),
('190820233345', 'faisal@linux.com', 'Prostate Cancer ', '333333333333333', 'I have a fevre', '2023-08-27', 'idriz@outlook.com', '00:34');

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
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(20) NOT NULL,
  `Patient` varchar(40) NOT NULL,
  `department` varchar(20) NOT NULL,
  `symptoms` varchar(300) NOT NULL,
  `ai_suggestion` varchar(1000) NOT NULL,
  `remarks` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`name`, `email`, `password`, `department`) VALUES
('Dr. Faisal Halid', 'faisal@linux.com', '11111', 'Prostate Cancer Care'),
('DR. Sumaiya Dene', 'sumaiya@linux.org', '11111', 'Breast Cancer Care');

-- --------------------------------------------------------

--
-- Table structure for table `myhealth`
--

CREATE TABLE `myhealth` (
  `date` date NOT NULL,
  `times` time NOT NULL,
  `patient` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `scan` varchar(200) NOT NULL,
  `scantype` varchar(20) NOT NULL,
  `result` varchar(100) NOT NULL,
  `doctorsremarks` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `myhealth`
--

INSERT INTO `myhealth` (`date`, `times`, `patient`, `scan`, `scantype`, `result`, `doctorsremarks`) VALUES
('2023-08-15', '20:34:00', 'jane10@google.com', '../images/scans/jane10@google.comX-ray2023-08-15.jpeg', 'X-ray', 'A lump in breast, about the size of a mango.\r\n\r\nCancer stage: 2', ''),
('2023-08-14', '07:34:00', 'jane10@google.com', '../images/scans/jane10@google.comM.R.I.2023-08-14.webp', 'M.R.I.', 'MRI shows lump in breast. ', ''),
('2023-08-16', '19:31:00', 'mensah@gmail.com', '../images/scans/mensah@gmail.comM.R.I.2023-08-16.jpeg', 'M.R.I.', 'Enlarged prostate', 'hernia'),
('2023-08-15', '20:03:00', 'mensah@gmail.com', '../images/scans/mensah@gmail.comC.Tscan2023-08-15.png', 'C.Tscan', 'ddd', 'cervix'),
('2023-08-02', '20:31:00', 'mensah@gmail.com', '../images/scans/mensah@gmail.comX-ray2023-08-02.webp', 'X-ray', 'color red', ''),
('2023-08-20', '02:51:00', 'idriz@outlook.com', '../images/scans/idriz@outlook.comM.R.I.2023-08-20.webp', 'M.R.I.', 'lipoma', ''),
('2023-08-20', '02:51:00', 'idriz@outlook.com', '../images/scans/idriz@outlook.comM.R.I.2023-08-20.webp', 'M.R.I.', 'lipoma', ''),
('2023-08-20', '02:51:00', 'idriz@outlook.com', '../images/scans/idriz@outlook.comM.R.I.2023-08-20.webp', 'M.R.I.', 'lipoma', ''),
('2023-08-20', '02:51:00', 'idriz@outlook.com', '../images/scans/idriz@outlook.comM.R.I.2023-08-20.webp', 'M.R.I.', 'lipoma', ''),
('2023-08-20', '02:51:00', 'idriz@outlook.com', '../images/scans/idriz@outlook.comM.R.I.2023-08-20.webp', 'M.R.I.', 'lipoma', ''),
('2023-08-20', '02:51:00', 'idriz@outlook.com', '../images/scans/idriz@outlook.comM.R.I.2023-08-20.webp', 'M.R.I.', 'lipoma', ''),
('2023-08-20', '02:51:00', 'idriz@outlook.com', '../images/scans/idriz@outlook.comM.R.I.2023-08-20.webp', 'M.R.I.', 'lipoma', ''),
('2023-08-20', '02:51:00', 'idriz@outlook.com', '../images/scans/idriz@outlook.comM.R.I.2023-08-20.webp', 'M.R.I.', 'lipoma', ''),
('2023-08-20', '02:51:00', 'idriz@outlook.com', '../images/scans/idriz@outlook.comM.R.I.2023-08-20.webp', 'M.R.I.', 'lipoma', ''),
('2023-08-20', '02:51:00', 'idriz@outlook.com', '../images/scans/idriz@outlook.comM.R.I.2023-08-20.webp', 'M.R.I.', 'lipoma', ''),
('2023-08-20', '02:51:00', 'idriz@outlook.com', '../images/scans/idriz@outlook.comM.R.I.2023-08-20.webp', 'M.R.I.', 'lipoma', ''),
('2023-08-20', '02:51:00', 'idriz@outlook.com', '../images/scans/idriz@outlook.comM.R.I.2023-08-20.webp', 'M.R.I.', 'lipoma', ''),
('2023-08-20', '02:51:00', 'idriz@outlook.com', '../images/scans/idriz@outlook.comM.R.I.2023-08-20.webp', 'M.R.I.', 'lipoma', ''),
('2023-08-26', '10:59:00', 'aisha@outlook.com', '../images/scans/aisha@outlook.comC.Tscan2023-08-26.jpg', 'C.Tscan', 'lipoma', 'she has lipoma7');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `user` varchar(40) NOT NULL,
  `message` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`user`, `message`, `date`) VALUES
('aisha@outlook.com', 'Your C.Tscan result is ready', '2023-08-19'),
('idriz@outlook.com', 'Your M.R.I. result is ready', '2023-08-19'),
('aisha@outlook.com', 'Your Doctor has remarked your scan results', '2023-08-19'),
('aisha@outlook.com', 'Your Doctor has remarked your scan results', '2023-08-19'),
('aisha@outlook.com', 'Your Doctor has remarked your scan results', '2023-08-19'),
('aisha@outlook.com', 'Your Doctor has remarked your scan results', '2023-08-19'),
('aisha@outlook.com', 'Your Doctor has remarked your scan results', '2023-08-19'),
('aisha@outlook.com', 'Your Doctor has remarked your  results', '2023-08-19'),
('aisha@outlook.com', 'Your Doctor has remarked your C.Tscan results', '2023-08-19'),
('faisal@linux.com', 'You have an appointment', '2023-08-26');

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
('Patient2', 'Female', '11111', '2023-08-25', 'Female', 'AC', 'B+', '0553226020', 'aisha@outlook.com'),
('Patient1', 'Female', '11111', '2023-08-26', 'Female', 'AC', 'B+', '0553226020', 'faisal@outlook.com'),
('Patient1', 'Male', '11111', '2023-08-25', 'Male', 'AC', 'B+', '0553226020', 'faiza@outlook.com'),
('Patient2', 'Male', '11111', '2023-08-25', 'Male', 'AC', 'B+', '0553226020', 'idriz@outlook.com');

-- --------------------------------------------------------

--
-- Table structure for table `technicians`
--

CREATE TABLE `technicians` (
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `technicians`
--

INSERT INTO `technicians` (`name`, `email`, `password`) VALUES
('Rashid Gangster', 'gangster@linux.org', '11111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointmentid`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `technicians`
--
ALTER TABLE `technicians`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
