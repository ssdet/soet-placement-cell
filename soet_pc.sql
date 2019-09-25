-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2019 at 05:54 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soet_pc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_name`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', 'tnp@soet2020');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_name` varchar(100) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `contact2` varchar(15) NOT NULL,
  `cemail` varchar(40) NOT NULL,
  `password` varchar(32) NOT NULL,
  `website` varchar(100) NOT NULL,
  `company_type` varchar(100) NOT NULL,
  `postal_address` varchar(300) NOT NULL,
  `writeup` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_allow`
--

CREATE TABLE `course_allow` (
  `job_id` int(10) NOT NULL,
  `course` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drive_interest`
--

CREATE TABLE `drive_interest` (
  `id` int(10) NOT NULL,
  `student_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_details`
--

CREATE TABLE `hr_details` (
  `cname` varchar(100) NOT NULL,
  `caddress` varchar(200) NOT NULL,
  `ctype` varchar(50) NOT NULL,
  `hr_name` varchar(30) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `contact2` varchar(15) NOT NULL,
  `cemail` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `department` varchar(50) NOT NULL,
  `p_contact` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_log`
--

CREATE TABLE `job_log` (
  `id` int(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `job_designation` varchar(30) NOT NULL,
  `job_type` varchar(50) NOT NULL,
  `Job_description` varchar(300) NOT NULL,
  `posting` varchar(30) NOT NULL,
  `joining` date NOT NULL,
  `cost_to_company` varchar(10) NOT NULL,
  `gross` varchar(10) NOT NULL,
  `bonus` varchar(50) NOT NULL,
  `bond` varchar(20) NOT NULL,
  `selection` varchar(300) NOT NULL,
  `mini_offer` int(3) NOT NULL,
  `eli_course` varchar(200) NOT NULL,
  `log_require` varchar(100) NOT NULL,
  `min10` varchar(5) NOT NULL DEFAULT '65',
  `min12` varchar(5) NOT NULL DEFAULT '60',
  `cgpa` varchar(5) NOT NULL DEFAULT '5',
  `y_allow` int(4) NOT NULL DEFAULT 2020,
  `backlog` varchar(1) NOT NULL DEFAULT 'A',
  `drive_date` date NOT NULL,
  `set_drive` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sname` varchar(20) NOT NULL,
  `semail` varchar(30) NOT NULL,
  `roll_num` varchar(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `course` varchar(10) NOT NULL,
  `department` varchar(50) NOT NULL,
  `per10` float NOT NULL,
  `per12` float NOT NULL,
  `tcgpa` float NOT NULL,
  `contact` varchar(15) NOT NULL,
  `yop` year(4) NOT NULL,
  `sec_ques` int(3) NOT NULL,
  `sec_ans` varchar(50) NOT NULL,
  `backlog` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`cemail`);

--
-- Indexes for table `course_allow`
--
ALTER TABLE `course_allow`
  ADD PRIMARY KEY (`job_id`,`course`);

--
-- Indexes for table `drive_interest`
--
ALTER TABLE `drive_interest`
  ADD PRIMARY KEY (`id`,`student_email`),
  ADD KEY `student_fk` (`student_email`);

--
-- Indexes for table `hr_details`
--
ALTER TABLE `hr_details`
  ADD PRIMARY KEY (`cemail`);

--
-- Indexes for table `job_log`
--
ALTER TABLE `job_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`semail`),
  ADD UNIQUE KEY `roll_num` (`roll_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_log`
--
ALTER TABLE `job_log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drive_interest`
--
ALTER TABLE `drive_interest`
  ADD CONSTRAINT `id_fk` FOREIGN KEY (`id`) REFERENCES `job_log` (`id`),
  ADD CONSTRAINT `student_fk` FOREIGN KEY (`student_email`) REFERENCES `student` (`semail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
