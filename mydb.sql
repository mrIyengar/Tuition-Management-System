-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2019 at 07:06 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getClass` ()  SELECT * FROM classdetails$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admindetails`
--

CREATE TABLE `admindetails` (
  `name` varchar(40) NOT NULL,
  `staffId` int(11) NOT NULL,
  `Department` varchar(40) NOT NULL,
  `phone` double NOT NULL,
  `Email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admindetails`
--

INSERT INTO `admindetails` (`name`, `staffId`, `Department`, `phone`, `Email`, `password`) VALUES
('Shrinidhi', 1, 'cs', 7090091336, 'nidhi@gmail.com', '9335');

--
-- Triggers `admindetails`
--
DELIMITER $$
CREATE TRIGGER `insertLogs` AFTER INSERT ON `admindetails` FOR EACH ROW INSERT INTO logs VALUES (NEW.name, NEW.phone, NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `classdetails`
--

CREATE TABLE `classdetails` (
  `classNo` varchar(20) NOT NULL,
  `Day` varchar(20) NOT NULL,
  `classes_from` varchar(20) NOT NULL,
  `to` varchar(20) NOT NULL,
  `teacherId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classdetails`
--

INSERT INTO `classdetails` (`classNo`, `Day`, `classes_from`, `to`, `teacherId`) VALUES
('1', 'Sunday', '17:51', '18:51', '1');

-- --------------------------------------------------------

--
-- Table structure for table `feedetails`
--

CREATE TABLE `feedetails` (
  `studentId` varchar(20) NOT NULL,
  `billNo` varchar(20) NOT NULL,
  `totalPay` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedetails`
--

INSERT INTO `feedetails` (`studentId`, `billNo`, `totalPay`, `date`) VALUES
('1', '100', '25000', '2019-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `name` varchar(20) NOT NULL,
  `phone` double NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`name`, `phone`, `time`) VALUES
('Shrinidhi', 7090091336, '2019-11-14 23:19:44');

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE `studentdetails` (
  `name` varchar(20) NOT NULL,
  `studentId` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `DOB` varchar(20) NOT NULL,
  `place` varchar(20) NOT NULL,
  `teacherId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`name`, `studentId`, `Email`, `gender`, `DOB`, `place`, `teacherId`) VALUES
('xyz', '1', 'xyz@gmail.com', 'Female', '2019-11-14', 'xyz', '1');

-- --------------------------------------------------------

--
-- Table structure for table `subjectdetails`
--

CREATE TABLE `subjectdetails` (
  `subjectName` varchar(20) NOT NULL,
  `subCode` int(11) NOT NULL,
  `classNo` varchar(20) NOT NULL,
  `teacherId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjectdetails`
--

INSERT INTO `subjectdetails` (`subjectName`, `subCode`, `classNo`, `teacherId`) VALUES
('DS', 101, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `teacherdetails`
--

CREATE TABLE `teacherdetails` (
  `name` varchar(20) NOT NULL,
  `teacherId` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `DOB` varchar(20) NOT NULL,
  `staffId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherdetails`
--

INSERT INTO `teacherdetails` (`name`, `teacherId`, `Email`, `gender`, `DOB`, `staffId`) VALUES
('xyz', '1', 'xyz@gmail.com', 'Female', '2019-11-14', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindetails`
--
ALTER TABLE `admindetails`
  ADD PRIMARY KEY (`staffId`);

--
-- Indexes for table `classdetails`
--
ALTER TABLE `classdetails`
  ADD PRIMARY KEY (`classNo`),
  ADD KEY `classdetails_ibfk_1` (`teacherId`);

--
-- Indexes for table `feedetails`
--
ALTER TABLE `feedetails`
  ADD PRIMARY KEY (`billNo`),
  ADD KEY `feedetails_ibfk_1` (`studentId`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD PRIMARY KEY (`studentId`),
  ADD KEY `studentdetails_ibfk_1` (`teacherId`);

--
-- Indexes for table `subjectdetails`
--
ALTER TABLE `subjectdetails`
  ADD PRIMARY KEY (`subCode`),
  ADD KEY `subjectdetails_ibfk_1` (`classNo`),
  ADD KEY `subjectdetails_ibfk_2` (`teacherId`);

--
-- Indexes for table `teacherdetails`
--
ALTER TABLE `teacherdetails`
  ADD PRIMARY KEY (`teacherId`),
  ADD KEY `staffId` (`staffId`),
  ADD KEY `staffId_2` (`staffId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classdetails`
--
ALTER TABLE `classdetails`
  ADD CONSTRAINT `classdetails_ibfk_1` FOREIGN KEY (`teacherId`) REFERENCES `teacherdetails` (`teacherId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedetails`
--
ALTER TABLE `feedetails`
  ADD CONSTRAINT `feedetails_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `studentdetails` (`studentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD CONSTRAINT `studentdetails_ibfk_1` FOREIGN KEY (`teacherId`) REFERENCES `teacherdetails` (`teacherId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjectdetails`
--
ALTER TABLE `subjectdetails`
  ADD CONSTRAINT `subjectdetails_ibfk_1` FOREIGN KEY (`classNo`) REFERENCES `classdetails` (`classNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjectdetails_ibfk_2` FOREIGN KEY (`teacherId`) REFERENCES `teacherdetails` (`teacherId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
