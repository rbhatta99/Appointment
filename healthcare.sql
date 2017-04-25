-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2017 at 09:44 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `app_patient_id` int(15) NOT NULL,
  `app_date` date NOT NULL,
  `app_time` varchar(10) DEFAULT NULL,
  `app_doctorusername` varchar(50) DEFAULT NULL,
  `app_patientusername` varchar(50) DEFAULT NULL,
  `app_number` int(11) NOT NULL,
  `app_patientname` varchar(50) NOT NULL,
  `app_doctorname` varchar(50) NOT NULL,
  `app_hospital` varchar(50) NOT NULL,
  `app_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `availability_sat`
--

CREATE TABLE `availability_sat` (
  `doctor_id` int(30) NOT NULL,
  `time` time(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `availabiltiy_wkdy`
--

CREATE TABLE `availabiltiy_wkdy` (
  `doctor_id` int(30) NOT NULL,
  `time` time(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `availabilty_sun`
--

CREATE TABLE `availabilty_sun` (
  `doctor_id` int(30) NOT NULL,
  `time` time(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(30) NOT NULL,
  `doctor_email` varchar(50) NOT NULL,
  `doctor_lname` varchar(50) NOT NULL,
  `doctor_fname` varchar(50) NOT NULL,
  `doctor_mname` varchar(50) NOT NULL,
  `specializationID` varchar(50) NOT NULL,
  `hospitalID` varchar(50) NOT NULL,
  `contactno` varchar(50) DEFAULT NULL,
  `doctor_rstatus` varchar(20) DEFAULT NULL,
  `doctor_licenseno` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `doctor_email`, `doctor_lname`, `doctor_fname`, `doctor_mname`, `specializationID`, `hospitalID`, `contactno`, `doctor_rstatus`, `doctor_licenseno`) VALUES
(0, 'dileep08@gmail.com', 'b', 'dileep', ' ', 'MBBS', 'Choondal', 'Althara,680505', 'approved', 456789);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_login`
--

CREATE TABLE `doctor_login` (
  `doctor_id` int(30) NOT NULL,
  `doctor_username` varchar(40) NOT NULL,
  `doctor_password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hospitalID` int(30) NOT NULL,
  `hospital_name` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification_system`
--

CREATE TABLE `notification_system` (
  `notif_no` int(11) NOT NULL,
  `sender` varchar(50) DEFAULT NULL,
  `receiver` varchar(50) DEFAULT NULL,
  `notif_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(15) NOT NULL,
  `patient_eadd` varchar(50) DEFAULT NULL,
  `patient_lname` varchar(50) DEFAULT NULL,
  `patient_fname` varchar(50) DEFAULT NULL,
  `patient_mname` varchar(50) DEFAULT NULL,
  `patient_sickness` varchar(50) DEFAULT NULL,
  `patient_age` int(11) NOT NULL,
  `patient_birthdate` date NOT NULL,
  `patient_gender` varchar(10) DEFAULT NULL,
  `patient_height` int(11) NOT NULL,
  `patient_weight` int(11) NOT NULL,
  `patient_status` varchar(50) DEFAULT NULL,
  `patient_address` varchar(50) DEFAULT NULL,
  `patient_contactno` varchar(50) DEFAULT NULL,
  `patient_rstatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_eadd`, `patient_lname`, `patient_fname`, `patient_mname`, `patient_sickness`, `patient_age`, `patient_birthdate`, `patient_gender`, `patient_height`, `patient_weight`, `patient_status`, `patient_address`, `patient_contactno`, `patient_rstatus`) VALUES
(360267, 'pearlzmasters@gmail.com', 'shah', 'akhil', '', 'Fever', 24, '1989-10-11', 'male', 180, 55, 'single', 'Thrissur,680501', 'Thrissur,680501', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `patient_login`
--

CREATE TABLE `patient_login` (
  `patient_id` int(30) NOT NULL,
  `patient_username` varchar(50) NOT NULL,
  `patient_password` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_login`
--

INSERT INTO `patient_login` (`patient_id`, `patient_username`, `patient_password`) VALUES
(360267, 'akhil', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `patient_id` int(15) NOT NULL,
  `dates` date NOT NULL,
  `patientname` varchar(50) NOT NULL,
  `sickness` varchar(50) NOT NULL,
  `doctorname` varchar(50) NOT NULL,
  `casereport` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`patient_id`, `dates`, `patientname`, `sickness`, `doctorname`, `casereport`) VALUES
(360267, '2013-10-24', 'akhil  shah', 'fever', 'dileep', 'fever with cold'),
(360267, '2013-10-22', 'akhil  shah', 'cold', 'dileep', 'cold with fever');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `specializationID` int(30) NOT NULL,
  `specialization` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availability_sat`
--
ALTER TABLE `availability_sat`
  ADD PRIMARY KEY (`doctor_id`,`time`);

--
-- Indexes for table `availabiltiy_wkdy`
--
ALTER TABLE `availabiltiy_wkdy`
  ADD PRIMARY KEY (`doctor_id`,`time`);

--
-- Indexes for table `availabilty_sun`
--
ALTER TABLE `availabilty_sun`
  ADD PRIMARY KEY (`doctor_id`,`time`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `doctor_login`
--
ALTER TABLE `doctor_login`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hospitalID`);

--
-- Indexes for table `patient_login`
--
ALTER TABLE `patient_login`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`specializationID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
