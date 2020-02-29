-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 29, 2020 at 08:42 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `se_jobsearchapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
CREATE TABLE IF NOT EXISTS `application` (
  `ApplicationID` int(11) NOT NULL,
  `JobID` int(11) NOT NULL,
  `JobSeekerID` int(11) NOT NULL COMMENT 'subset of userID',
  `Applied_date` date NOT NULL,
  `Justification` text NOT NULL COMMENT 'for Job/Qualifications',
  `Answers` date NOT NULL COMMENT 'for Job/Questions',
  `Documents` varchar(1000) NOT NULL COMMENT 'will be expanded',
  `Withdraw_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `association`
--

DROP TABLE IF EXISTS `association`;
CREATE TABLE IF NOT EXISTS `association` (
  `AssociationID` int(11) NOT NULL,
  `AssociationName` int(11) NOT NULL,
  `Street Address` int(11) NOT NULL,
  `City` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  `Zipcode` int(11) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Logo` varchar(50) NOT NULL,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL,
  `Modify_date` date NOT NULL,
  `URL` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `CompanyID` int(11) NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `Descrirption` varchar(300) NOT NULL,
  `Street Address` varchar(300) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(2) NOT NULL,
  `ZipCode` int(11) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Industry` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`CompanyID`, `CompanyName`, `Descrirption`, `Street Address`, `City`, `State`, `ZipCode`, `Phone`, `Industry`) VALUES
(1000, 'LSU', 'Louisiana State University', 'Baton Rouge', '', '', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
CREATE TABLE IF NOT EXISTS `job` (
  `JobID` int(11) NOT NULL,
  `JobName` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `CompanyID` int(11) NOT NULL,
  `Posting_date` date NOT NULL,
  `Open_date` date NOT NULL,
  `Close_date` date NOT NULL,
  `Number_available` int(11) NOT NULL,
  `Postby` varchar(50) NOT NULL COMMENT 'subset of userID',
  `Qualification` text NOT NULL,
  `SalaryRange` varchar(50) NOT NULL,
  `JobType` int(11) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Bebefits` text NOT NULL,
  `Questions` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

DROP TABLE IF EXISTS `jobseeker`;
CREATE TABLE IF NOT EXISTS `jobseeker` (
  `UserID` int(11) NOT NULL COMMENT 'subset of userLogin',
  `LastName` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `Personal Statement` text NOT NULL,
  `Education` text NOT NULL COMMENT 'can be expanded into a table',
  `JobHistory` text NOT NULL COMMENT 'can be expanded into a table',
  `Skills` text NOT NULL COMMENT 'general; can be expanded into a table',
  `Experience` text NOT NULL COMMENT 'speciic by project; can be expanded into a table',
  `Languagues` text NOT NULL COMMENT 'can be expanded into a table',
  `Documents` text NOT NULL COMMENT 'can be expanded into a table',
  `EverEmployee` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

DROP TABLE IF EXISTS `userlogin`;
CREATE TABLE IF NOT EXISTS `userlogin` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `UserTypeID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`UserID`, `UserName`, `Password`, `Email`, `UserTypeID`) VALUES
(1, 'schu', '123456789', 'schu2@lsu.edu', 10),
(2, 'schu_manager', 'schu', 'san.chu@pbrc.edu', 20),
(3, 'schu_recruiter', 'schu', 'san.chu@pbrc.edu', 30),
(4, 'schu_employee', 'schu', 'san.chu@pbrc.edu', 40),
(5, 'schu_potential', 'schu', 'san.chu@pbrc.edu', 50);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

DROP TABLE IF EXISTS `usertype`;
CREATE TABLE IF NOT EXISTS `usertype` (
  `UseerTypeID` int(11) NOT NULL,
  `UserTypeName` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`UseerTypeID`, `UserTypeName`) VALUES
(10, 'System Admin'),
(20, 'Manager'),
(30, 'Recruiter'),
(40, 'Employee'),
(50, 'Potential');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
