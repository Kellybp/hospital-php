-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 19, 2019 at 12:29 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opensource`
--

-- --------------------------------------------------------

--
-- Table structure for table `allergies`
--

DROP TABLE IF EXISTS `allergies`;
CREATE TABLE IF NOT EXISTS `allergies` (
  `allergyID` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`allergyID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allergies`
--

INSERT INTO `allergies` (`allergyID`, `name`) VALUES
(1, 'Pollen'),
(2, 'Egg'),
(3, 'Fish'),
(4, 'Garlic'),
(5, 'Fruit'),
(6, 'Hot Peppers'),
(7, 'Oats'),
(8, 'Meat'),
(9, 'Milk'),
(10, 'Rice'),
(11, 'Soy'),
(12, 'Sesame'),
(15, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `apptID` int(3) NOT NULL AUTO_INCREMENT,
  `patientID` int(3) NOT NULL,
  `doctorID` int(3) NOT NULL,
  `nurseID` int(3) DEFAULT NULL,
  `height` decimal(10,3) DEFAULT NULL,
  `weight` decimal(10,3) DEFAULT NULL,
  `temp` decimal(6,3) DEFAULT NULL,
  `temp_site` enum('oral','rectal','tympanic','axillary','temporal') DEFAULT NULL,
  `pulse_rate` decimal(10,3) DEFAULT NULL,
  `resp_rate` decimal(10,3) DEFAULT NULL,
  `BP_Systolic` decimal(10,3) DEFAULT NULL,
  `BP_Diastolic` decimal(10,3) DEFAULT NULL,
  `docNotes` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`apptID`),
  KEY `FK_nurse` (`nurseID`),
  KEY `FK_doctor` (`doctorID`),
  KEY `FK_patient` (`patientID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`apptID`, `patientID`, `doctorID`, `nurseID`, `height`, `weight`, `temp`, `temp_site`, `pulse_rate`, `resp_rate`, `BP_Systolic`, `BP_Diastolic`, `docNotes`) VALUES
(1, 1, 1, 5, '12.500', '12.500', '18.400', 'oral', '12.000', '12.000', '12.000', '12.000', 'sfgsdfg'),
(2, 1, 7, 5, '14.000', '14.000', '13.000', 'oral', '14.000', '14.000', '11.000', '14.000', 'efsadfdsg'),
(3, 1, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `EmployeeID` int(3) NOT NULL AUTO_INCREMENT,
  `Employee_Types` enum('doc','rec','nurse','admin') DEFAULT NULL,
  `Employee_CurrentlyWorking` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'True(1) = Still Employed',
  `Employee_FName` varchar(30) NOT NULL DEFAULT 'First Name',
  `Employee_LName` varchar(30) DEFAULT 'Last Name',
  `Employee_ContactNum` varchar(13) NOT NULL DEFAULT '(XXX)XXX-XXXX',
  `Employee_UserName` varchar(30) NOT NULL DEFAULT 'User Name',
  `Employee_Password` varchar(60) NOT NULL DEFAULT 'Password',
  PRIMARY KEY (`EmployeeID`),
  UNIQUE KEY `Employee_UserName` (`Employee_UserName`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EmployeeID`, `Employee_Types`, `Employee_CurrentlyWorking`, `Employee_FName`, `Employee_LName`, `Employee_ContactNum`, `Employee_UserName`, `Employee_Password`) VALUES
(1, 'doc', 1, 'Bob', 'Kelly', '(716)375-5233', 'bob', '$2y$10$iXCs865uVp2kWmHavWG7RuUeAqHmwtGGLivCAu8OuJPCmnxPaCyT.'),
(3, 'admin', 1, 'bobby', 'bobby', '(984)384-5374', 'b', '$2y$10$/niNLG57QSu6m0EZWoc9kOp.FlR5ECQ.TQhDBtn/uCOP7CHz8iHLe'),
(4, 'rec', 1, 'f', 'f', '4', 'f', '$2y$10$lFPBTcQia0ryVmVKMJm0jekwifjGspFYkSFvAWoBLDWfpbCgtWCqC'),
(5, 'nurse', 1, 'Billy', 'billi', 'somethign', 'bibi', '$2y$10$1OlcP8Pg.r7oIw5SsHjASeazs4XtfsTal1ohDirXEmgCS5O91lDPC'),
(7, 'doc', 1, 'billy', 'billy', 'billy', 'billy', '$2y$10$BODWF19D/zElP5hpGxdAX.bpXQEmMpml.6zweC.G7hFI9Ly1ApB.a'),
(8, 'nurse', 1, 'dsf', 'sdf', 'sdf', 'sdf', '$2y$10$.zFz8iO3Mf92XnMnBJeTdeWcP16sjlKkDHVOMKfJGLGd9nqVvDKn2'),
(9, 'rec', 1, 'r', 'r', 'r', 'r', '$2y$10$U4KCv47jYNMx1ESyWpYj/.0BKSPzQY9EG6AKTN.nzf0F2fX2wOuCm');

-- --------------------------------------------------------

--
-- Table structure for table `medications`
--

DROP TABLE IF EXISTS `medications`;
CREATE TABLE IF NOT EXISTS `medications` (
  `medicationID` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`medicationID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medications`
--

INSERT INTO `medications` (`medicationID`, `name`) VALUES
(1, 'Alprazolam'),
(2, 'Ativan'),
(3, 'Ciprofloxacin'),
(4, 'Ibuprofen'),
(5, 'Zoloft'),
(6, 'Naproxen'),
(7, 'Metformin'),
(8, 'Lexapro'),
(9, 'Codeine'),
(10, 'Cyclobenzaprine'),
(11, 'Adderall'),
(12, 'Amoxicillin'),
(13, 'Lryica'),
(17, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `patientID` int(3) NOT NULL AUTO_INCREMENT,
  `medicationID` int(3) DEFAULT NULL,
  `allergyID` int(3) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `homePhone` varchar(10) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `insurance` varchar(300) DEFAULT NULL,
  `contactName` varchar(30) DEFAULT NULL,
  `contactNum` varchar(10) DEFAULT NULL,
  `contactRelation` varchar(30) DEFAULT NULL,
  `personalHealthHistory` varchar(1000) DEFAULT NULL,
  `familialHealthHistory` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`patientID`),
  KEY `FK_medication` (`medicationID`),
  KEY `FK_allergy` (`allergyID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patientID`, `medicationID`, `allergyID`, `name`, `homePhone`, `address`, `birthDate`, `gender`, `insurance`, `contactName`, `contactNum`, `contactRelation`, `personalHealthHistory`, `familialHealthHistory`) VALUES
(1, 11, 9, 'Bob123', '325235', 'sgfsdhgerstgve5', '2018-12-03', 1, 'dfgdfgdfg', 'dfgdfg', 'fgdfg', 'dfgdfsg', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

DROP TABLE IF EXISTS `records`;
CREATE TABLE IF NOT EXISTS `records` (
  `recordID` int(3) NOT NULL AUTO_INCREMENT,
  `apptID` int(3) NOT NULL,
  `date_time` datetime NOT NULL,
  `location` varchar(60) DEFAULT NULL,
  `reason` varchar(150) DEFAULT NULL,
  `further_notes` varchar(500) DEFAULT NULL,
  `record_type` enum('Hospital Visit','Appointment Elsewhere','Other') DEFAULT 'Other',
  PRIMARY KEY (`recordID`),
  KEY `FK_appointment` (`apptID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`recordID`, `apptID`, `date_time`, `location`, `reason`, `further_notes`, `record_type`) VALUES
(1, 1, '2018-12-11 00:00:00', 'here', 'because', 'meh', 'Other'),
(2, 2, '2018-12-28 00:00:00', NULL, NULL, '123', 'Other'),
(3, 3, '2018-12-27 00:00:00', 'Here', 'because', NULL, 'Other');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `FK_doctor` FOREIGN KEY (`doctorID`) REFERENCES `employees` (`EmployeeID`),
  ADD CONSTRAINT `FK_nurse` FOREIGN KEY (`nurseID`) REFERENCES `employees` (`EmployeeID`),
  ADD CONSTRAINT `FK_patient` FOREIGN KEY (`patientID`) REFERENCES `patients` (`patientID`);

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `FK_allergy` FOREIGN KEY (`allergyID`) REFERENCES `allergies` (`allergyID`),
  ADD CONSTRAINT `FK_medication` FOREIGN KEY (`medicationID`) REFERENCES `medications` (`medicationID`);

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `FK_appointment` FOREIGN KEY (`apptID`) REFERENCES `appointments` (`apptID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
