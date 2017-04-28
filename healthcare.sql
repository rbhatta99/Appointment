-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2017 at 05:50 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

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

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`app_patient_id`, `app_date`, `app_time`, `app_doctorusername`, `app_patientusername`, `app_number`, `app_patientname`, `app_doctorname`, `app_hospital`, `app_status`) VALUES
(817909, '2017-04-27', '1pm', 'vipina', 'Rohit', 4, 'Rohit K Bhattacharjee', 'Arora, Vipin', '1', 'Approved'),
(817909, '2017-05-17', '2:30pm', 'Farheen', 'Rohit', 7, 'Rohit G Bhattacharjee', 'Farheen, A', '17', 'Approved'),
(817909, '2017-04-29', '10:30am', 'SaifAliKhan', 'Rohit', 8, 'Rohit G Bhattacharjee', 'saif, saifaikhan', '41', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `availability_saturday`
--

CREATE TABLE `availability_saturday` (
  `doctor_username` varchar(100) NOT NULL,
  `time` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `availability_saturday`
--

INSERT INTO `availability_saturday` (`doctor_username`, `time`) VALUES
('Farheen', '10:30am'),
('Farheen', '10am'),
('Farheen', '11:30am'),
('Farheen', '11am'),
('Farheen', '12:30pm'),
('Farheen', '12pm'),
('Farheen', '1:30pm'),
('Farheen', '1pm'),
('Farheen', '2:30pm'),
('Farheen', '2pm'),
('Farheen', '3pm'),
('Farheen', '9:30am'),
('JohnH', '12:30pm'),
('JohnH', '12pm'),
('JohnH', '1:30pm'),
('JohnH', '1pm'),
('JohnH', '2:30pm'),
('JohnH', '2pm'),
('JohnH', '3:30pm'),
('JohnH', '3pm'),
('JohnH', '4pm'),
('SaifAliKhan', '10:30am'),
('SaifAliKhan', '10am'),
('SaifAliKhan', '11:30am'),
('SaifAliKhan', '11am'),
('SaifAliKhan', '12pm'),
('SaifAliKhan', '9:30am'),
('sanjayleela', '10:30am'),
('sanjayleela', '10am'),
('sanjayleela', '11:30am'),
('sanjayleela', '11am'),
('sanjayleela', '12:30pm'),
('sanjayleela', '12pm'),
('sanjayleela', '1:30pm'),
('sanjayleela', '1pm'),
('sanjayleela', '9:30am'),
('sanjeevb', '12:30pm'),
('sanjeevb', '12pm'),
('sanjeevb', '1:30pm'),
('sanjeevb', '1pm'),
('sanjeevb', '2:30pm'),
('sanjeevb', '2pm'),
('sanjeevb', '3:30pm'),
('sanjeevb', '3pm'),
('sanjeevb', '4pm'),
('vipina', '12:30pm'),
('vipina', '12pm'),
('vipina', '1:30pm'),
('vipina', '1pm'),
('vipina', '2:30pm'),
('vipina', '2pm'),
('vipina', '3:30pm'),
('vipina', '3pm'),
('vipina', '4pm');

-- --------------------------------------------------------

--
-- Table structure for table `availability_sunday`
--

CREATE TABLE `availability_sunday` (
  `doctor_username` varchar(100) NOT NULL,
  `time` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `availability_sunday`
--

INSERT INTO `availability_sunday` (`doctor_username`, `time`) VALUES
('Farheen', '10:30am'),
('Farheen', '10am'),
('Farheen', '11:30am'),
('Farheen', '11am'),
('Farheen', '12:30pm'),
('Farheen', '12pm'),
('Farheen', '1pm'),
('Farheen', '9:30am'),
('JohnH', '3:30pm'),
('JohnH', '3pm'),
('JohnH', '4pm'),
('SaifAliKhan', '10:30am'),
('SaifAliKhan', '10am'),
('SaifAliKhan', '11:30am'),
('SaifAliKhan', '11am'),
('SaifAliKhan', '12pm'),
('SaifAliKhan', '9:30am'),
('sanjayleela', '10:30am'),
('sanjayleela', '10am'),
('sanjayleela', '11:30am'),
('sanjayleela', '11am'),
('sanjayleela', '12:30pm'),
('sanjayleela', '12pm'),
('sanjayleela', '1:30pm'),
('sanjayleela', '1pm'),
('sanjayleela', '9:30am'),
('sanjeevb', '12:30p'),
('sanjeevb', '12pm'),
('sanjeevb', '1:30pm'),
('sanjeevb', '1pm'),
('sanjeevb', '2pm'),
('vipina', '2:30pm'),
('vipina', '2pm'),
('vipina', '3:30pm'),
('vipina', '3pm'),
('vipina', '4pm');

-- --------------------------------------------------------

--
-- Table structure for table `availability_weekday`
--

CREATE TABLE `availability_weekday` (
  `doctor_username` varchar(100) NOT NULL,
  `time` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `availability_weekday`
--

INSERT INTO `availability_weekday` (`doctor_username`, `time`) VALUES
('Farheen', '10:30am'),
('Farheen', '10am'),
('Farheen', '11:30am'),
('Farheen', '11am'),
('Farheen', '12:30pm'),
('Farheen', '12pm'),
('Farheen', '1:30pm'),
('Farheen', '1pm'),
('Farheen', '2:30pm'),
('Farheen', '2pm'),
('Farheen', '3:30pm'),
('Farheen', '3pm'),
('Farheen', '4:30pm'),
('Farheen', '4pm'),
('Farheen', '5:30pm'),
('Farheen', '5pm'),
('Farheen', '6:30pm'),
('Farheen', '6pm'),
('Farheen', '7pm'),
('Farheen', '9:30am'),
('JohnH', '10:30am'),
('JohnH', '10am'),
('JohnH', '11:30am'),
('JohnH', '11am'),
('JohnH', '12:30pm'),
('JohnH', '12pm'),
('JohnH', '1:30pm'),
('JohnH', '1pm'),
('JohnH', '2:30pm'),
('JohnH', '2pm'),
('JohnH', '3:30pm'),
('JohnH', '3pm'),
('JohnH', '4:30pm'),
('JohnH', '4pm'),
('JohnH', '5:30pm'),
('JohnH', '5pm'),
('JohnH', '6:30pm'),
('JohnH', '6pm'),
('JohnH', '7:30pm'),
('JohnH', '7pm'),
('JohnH', '8:30pm'),
('JohnH', '8pm'),
('JohnH', '9:30am'),
('JohnH', '9pm'),
('SaifAliKhan', '10:30am'),
('SaifAliKhan', '10am'),
('SaifAliKhan', '11:30am'),
('SaifAliKhan', '11am'),
('SaifAliKhan', '12:30pm'),
('SaifAliKhan', '12pm'),
('SaifAliKhan', '1:30pm'),
('SaifAliKhan', '1pm'),
('SaifAliKhan', '2:30pm'),
('SaifAliKhan', '2pm'),
('SaifAliKhan', '3:30pm'),
('SaifAliKhan', '3pm'),
('SaifAliKhan', '4:30pm'),
('SaifAliKhan', '4pm'),
('SaifAliKhan', '5pm'),
('SaifAliKhan', '9:30am'),
('sanjayleela', '10:30am'),
('sanjayleela', '10am'),
('sanjayleela', '11:30am'),
('sanjayleela', '11am'),
('sanjayleela', '12:30pm'),
('sanjayleela', '12pm'),
('sanjayleela', '1:30pm'),
('sanjayleela', '1pm'),
('sanjayleela', '2:30pm'),
('sanjayleela', '2pm'),
('sanjayleela', '3:30pm'),
('sanjayleela', '3pm'),
('sanjayleela', '4:30pm'),
('sanjayleela', '4pm'),
('sanjayleela', '5:30pm'),
('sanjayleela', '5pm'),
('sanjayleela', '6:30pm'),
('sanjayleela', '6pm'),
('sanjayleela', '9:30am'),
('sanjeevb', '10:30am'),
('sanjeevb', '10am'),
('sanjeevb', '11:30am'),
('sanjeevb', '11am'),
('sanjeevb', '12:30pm'),
('sanjeevb', '12pm'),
('sanjeevb', '1:30pm'),
('sanjeevb', '1pm'),
('sanjeevb', '2:30pm'),
('sanjeevb', '2pm'),
('sanjeevb', '3:30pm'),
('sanjeevb', '3pm'),
('sanjeevb', '4:30pm'),
('sanjeevb', '4pm'),
('sanjeevb', '5:30pm'),
('sanjeevb', '5pm'),
('sanjeevb', '6:30pm'),
('sanjeevb', '6pm'),
('sanjeevb', '7:30pm'),
('sanjeevb', '7pm'),
('sanjeevb', '8pm'),
('vipina', '10:30am'),
('vipina', '10am'),
('vipina', '11:30am'),
('vipina', '11am'),
('vipina', '12:30pm'),
('vipina', '12pm'),
('vipina', '1:30pm'),
('vipina', '1pm'),
('vipina', '2:30pm'),
('vipina', '2pm'),
('vipina', '3:30pm'),
('vipina', '3pm'),
('vipina', '4:30pm'),
('vipina', '4pm'),
('vipina', '5:30pm'),
('vipina', '5pm'),
('vipina', '6:30pm'),
('vipina', '6pm'),
('vipina', '7:30pm'),
('vipina', '7pm'),
('vipina', '8:30pm'),
('vipina', '8pm'),
('vipina', '9:30am');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_username` varchar(50) NOT NULL,
  `doctor_password` varchar(50) NOT NULL,
  `doctor_email` varchar(50) NOT NULL,
  `doctor_lname` varchar(50) NOT NULL,
  `doctor_fname` varchar(50) NOT NULL,
  `doctor_mname` varchar(50) DEFAULT NULL,
  `doctor_specialization` int(5) NOT NULL,
  `doctor_hospital` int(5) NOT NULL,
  `contactno` varchar(50) DEFAULT NULL,
  `doctor_deleted` varchar(1) NOT NULL DEFAULT 'n',
  `doctor_licenseno` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_username`, `doctor_password`, `doctor_email`, `doctor_lname`, `doctor_fname`, `doctor_mname`, `doctor_specialization`, `doctor_hospital`, `contactno`, `doctor_deleted`, `doctor_licenseno`) VALUES
('Farheen', '79cfeb94595de33b3326c06ab1c7dbda', 'farheen@gmail.com', 'Farheen', 'A', '', 34, 17, '9724087894', 'n', 345678),
('JohnH', 'e99a18c428cb38d5f260853678922e03', 'john123@gmail.com', 'Hancock', 'John', '', 4, 22, '5687951234', 'y', 564285),
('SaifAliKhan', 'e99a18c428cb38d5f260853678922e03', 'saif@gmail.com', 'saif', 'saifaikhan', '', 10, 41, '1548647963', 'n', 345679),
('sanjayleela', 'e99a18c428cb38d5f260853678922e03', 'sanjay@gmail.com', 'sanjayleela', 'sanjayleela', '', 6, 12, '1548647963', 'n', 123457),
('sanjeevb', '3042c5e85752ec688acf999fbfc3568d', 'sanjeevbala@gmail.com', 'Bala', 'Sanjeev', '', 44, 33, '1548647963', 'n', 56543),
('vipina', 'd01a1afce4514f8b0f4ade054181a1bb', 'vipin@gmail.com', 'Arora', 'Vipin', '', 1, 1, '9724087894', 'y', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `hospitalinfo`
--

CREATE TABLE `hospitalinfo` (
  `HospitalID` int(5) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospitalinfo`
--

INSERT INTO `hospitalinfo` (`HospitalID`, `Name`) VALUES
(1, 'Weatherford Regional Medical Center'),
(2, 'UT Southwestern - Zale-Lipshy Hospital'),
(3, 'UT Southwestern - St. Paul Hospital'),
(4, 'UT Southwestern Medical Center North'),
(5, 'UT Southwestern Medical Center'),
(6, 'Texas Specialty Hospital of Dallas'),
(7, 'Texas Regional Medical Center of Sunnyvale'),
(8, 'Texas Health Specialty Hospital'),
(9, 'Texas Health Presbyterian Rockwall'),
(10, 'Texas Health Presbtyerian Plano'),
(11, 'Texas Health Presbyterian Kaufman'),
(12, 'Texas Health Presbyterian Flower Mound'),
(13, 'Texas Health Presbyterian Denton'),
(14, 'Texas Health Presbyterian Dallas'),
(15, 'Texas Health Presbyterian Allen'),
(16, 'Texas Health Harris Methodist Southwest Fort Worth'),
(17, 'Texas Health Harris Methodist Southlake'),
(18, 'Texas Health Harris Methodist Hurst-Euless-Bedford'),
(19, 'Texas Health Harris Methodist Fort Worth'),
(20, 'Texas Health Harris Methodist Cleburne'),
(21, 'Texas Health Harris Methodist Azle'),
(22, 'Texas Health Arlington Memorial Hospital'),
(23, 'South Hampton Community Hospital of Dallas'),
(24, 'Select Specialty Hospital of North Dallas'),
(25, 'Select Specialty Hospital of DeSoto'),
(26, 'Regency Hospital of North Dallas - Carrollton'),
(27, 'Plano Specialty Hospital'),
(28, 'Parkland Memorial Hospital'),
(29, 'North Texas VA Medical Center'),
(30, 'Methodist Richardson Medical Center Bush/Renner'),
(31, 'Methodist Richardson Medical Center'),
(32, 'Methodist Midlothian Health Center'),
(33, 'Methodist McKinney Hospital'),
(34, 'Methodist Mansfield Medical Center'),
(35, 'Methodist Dallas Medical Center'),
(36, 'Methodist Charlton Medical Center'),
(37, 'Mesquite Specialty Hospital'),
(38, 'Lifecare Hospital of Plano'),
(39, 'Lifecare Hospital of Fort Worth'),
(40, 'Lifecare Hospital of Dallas'),
(41, 'Lake Pointe Medical Center Rowlett'),
(42, 'Kindred Hospital White Rock'),
(43, 'Kindred Hospital Mansfield'),
(44, 'Kindred Hospital Fort Worth Southwest'),
(45, 'Kindred Hospital Fort Worth'),
(46, 'Kindred Hospital Dallas'),
(47, 'Kindred Hospital Arlington'),
(48, 'John Peter Smith Hospital of Fort Worth'),
(49, 'Huguley Memorial Medical Center'),
(50, 'HCA Plaza Medical Center of Fort Worth'),
(51, 'HCA North Hills Hospital'),
(52, 'HCA Medical City of Dallas'),
(53, 'HCA Medical Center of Plano'),
(54, 'HCA Medical Center of McKinney'),
(55, 'HCA Medical Center of Lewisville'),
(56, 'HCA Medical Center of Arlington'),
(57, 'HCA Las Colinas Medical Center'),
(58, 'HCA Denton Regional Medical Center'),
(59, 'Ennis Regional Medical Center'),
(60, 'Doctors Hospital at White Rock Lake'),
(61, 'Denton Community Hospital'),
(62, 'Dallas Womens Hospital of Mesquite'),
(63, 'Dallas Regional Medical Center in Mesquite'),
(64, 'Dallas Medical Center Farmers Branch'),
(65, 'Cook Children\'s Northeast Hospital?'),
(66, 'Cook Children\'s Medical Center Fort Worth'),
(67, 'Children\'s Medical Center at Legacy'),
(68, 'Children\'s Medical Center of Dallas'),
(69, 'Centennial Medical Center Frisco'),
(70, 'Baylor University Medical Center at Dallas'),
(71, 'Baylor Specialty Hospital Dallas'),
(72, 'Baylor Plano THE HEART HOSPITAL'),
(73, 'Baylor Regional Medical Center at Plano'),
(74, 'Baylor Regional Medical Center at Grapevine'),
(75, 'Baylor Medical Center at Waxahachie'),
(76, 'Baylor Medical Center at Trophy Club'),
(77, 'Baylor Medical Center at Southwest Fort Worth'),
(78, 'Baylor Medical Center at McKinney'),
(79, 'Baylor Medical Center at Irving'),
(80, 'Baylor Medical Center at Garland'),
(81, 'Baylor Medical Center at Frisco'),
(82, 'Baylor Medical Center at Carrollton'),
(83, 'Baylor All Saints Medical Center - Fort Worh');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(15) NOT NULL,
  `patient_username` varchar(50) DEFAULT NULL,
  `patient_password` varchar(50) DEFAULT NULL,
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
  `patient_deleted` varchar(1) NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_username`, `patient_password`, `patient_eadd`, `patient_lname`, `patient_fname`, `patient_mname`, `patient_sickness`, `patient_age`, `patient_birthdate`, `patient_gender`, `patient_height`, `patient_weight`, `patient_status`, `patient_address`, `patient_contactno`, `patient_deleted`) VALUES
(1435, 'Rohitb', '0b6cf9be8f90c78560c6bc929a494feb', 'rohitb@gmail.com', 'Bhattacharjee', 'Rohit', 'k', 'cold', 25, '1991-09-09', 'male', 5, 555, 'single', '800 West Renner Road', '4698315834', 'n'),
(360267, 'akhil', '5f4dcc3b5aa765d61d8327deb882cf99', 'pearlzmasters@gmail.com', 'shah', 'akhil', 'M', 'Fever', 24, '1989-10-11', 'male', 180, 55, 'single', 'Thrissur,680501', '4698315834', 'n'),
(476691, 'rohitbhatta99', '0b6cf9be8f90c78560c6bc929a494feb', 'rohit.bhattacharjee99@gmail.com', 'Bhattacharjee', 'Rohit', 'M', 'Cold', 27, '1991-09-09', 'male', 185, 87, 'single', 'Kolkata', '9836448639', 'n'),
(817909, 'Rohit', '0b6cf9be8f90c78560c6bc929a494feb', 'rohitb@gmail.com', 'Bhattacharjee', 'Rohit', 'G', 'Fever', 24, '1992-09-09', 'male', 185, 128, 'single', 'Kolkata', '4698315834', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `specializationinfo`
--

CREATE TABLE `specializationinfo` (
  `SpecializationID` int(5) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `specializationinfo`
--

INSERT INTO `specializationinfo` (`SpecializationID`, `Name`) VALUES
(1, 'Addiction psychiatrist'),
(2, 'Adolescent medicine specialist'),
(3, 'Allergist (immunologist)'),
(4, 'Anesthesiologist'),
(5, 'Cardiac electrophysiologist'),
(6, 'Cardiologist'),
(7, 'Cardiovascular surgeon'),
(8, 'Colon and rectal surgeon'),
(9, 'Critical care medicine specialist'),
(10, 'Dermatologist'),
(11, 'Developmental pediatrician'),
(12, 'Emergency medicine specialist'),
(13, 'Endocrinologist'),
(14, 'Family medicine physician'),
(15, 'Forensic pathologist'),
(16, 'Gastroenterologist'),
(17, 'Geriatric medicine specialist'),
(18, 'Gynecologist'),
(19, 'Gynecologic oncologist'),
(20, 'Hand surgeon'),
(21, 'Hematologist'),
(22, 'Hepatologist'),
(23, 'Hospitalist'),
(24, 'Hospice and palliative medicine specialist'),
(25, 'Hyperbaric physician'),
(26, 'Infectious disease specialist'),
(27, 'Internist'),
(28, 'Interventional cardiologist'),
(29, 'Medical examiner'),
(30, 'Medical geneticist'),
(31, 'Neonatologist'),
(32, 'Nephrologist'),
(33, 'Neurological surgeon'),
(34, 'Neurologist'),
(35, 'Nuclear medicine specialist'),
(36, 'Obstetrician'),
(37, 'Occupational medicine specialist'),
(38, 'Oncologist'),
(39, 'Ophthalmologist'),
(40, 'Oral surgeon (maxillofacial surgeon)'),
(41, 'Orthopedic surgeon'),
(42, 'Otolaryngologist (ear, nose, and throat specialist)'),
(43, 'Pain management specialist'),
(44, 'Pathologist'),
(45, 'Pediatrician'),
(46, 'Perinatologist'),
(47, 'Physiatrist'),
(48, 'Plastic surgeon'),
(49, 'Psychiatrist'),
(50, 'Pulmonologist'),
(51, 'Radiation oncologist'),
(52, 'Radiologist'),
(53, 'Reproductive endocrinologist'),
(54, 'Rheumatologist'),
(55, 'Sleep disorders specialist'),
(56, 'Spinal cord injury specialist'),
(57, 'Sports medicine specialist'),
(58, 'Surgeon'),
(59, 'Thoracic surgeon'),
(60, 'Urologist'),
(61, 'Vascular surgeon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availability_saturday`
--
ALTER TABLE `availability_saturday`
  ADD PRIMARY KEY (`doctor_username`,`time`);

--
-- Indexes for table `availability_sunday`
--
ALTER TABLE `availability_sunday`
  ADD PRIMARY KEY (`doctor_username`,`time`);

--
-- Indexes for table `availability_weekday`
--
ALTER TABLE `availability_weekday`
  ADD PRIMARY KEY (`doctor_username`,`time`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_username`),
  ADD KEY `FK_Hospital` (`doctor_hospital`),
  ADD KEY `doctor_specialization` (`doctor_specialization`);

--
-- Indexes for table `hospitalinfo`
--
ALTER TABLE `hospitalinfo`
  ADD PRIMARY KEY (`HospitalID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `specializationinfo`
--
ALTER TABLE `specializationinfo`
  ADD PRIMARY KEY (`SpecializationID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hospitalinfo`
--
ALTER TABLE `hospitalinfo`
  MODIFY `HospitalID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `availability_saturday`
--
ALTER TABLE `availability_saturday`
  ADD CONSTRAINT `FK_DOCTOR` FOREIGN KEY (`doctor_username`) REFERENCES `doctor` (`doctor_username`);

--
-- Constraints for table `availability_sunday`
--
ALTER TABLE `availability_sunday`
  ADD CONSTRAINT `availability_sunday_ibfk_1` FOREIGN KEY (`doctor_username`) REFERENCES `doctor` (`doctor_username`);

--
-- Constraints for table `availability_weekday`
--
ALTER TABLE `availability_weekday`
  ADD CONSTRAINT `availability_weekday_ibfk_1` FOREIGN KEY (`doctor_username`) REFERENCES `doctor` (`doctor_username`);

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `FK_Hospital` FOREIGN KEY (`doctor_hospital`) REFERENCES `hospitalinfo` (`HospitalID`),
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`doctor_specialization`) REFERENCES `specializationinfo` (`SpecializationID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
