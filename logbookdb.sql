-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2022 at 12:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logbookdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Ekoxy Boss', '$2a$08$tPLi8dlQjiqxeZRpFA1s9e4sBCM0tQPFuk2BvFwaV2HKRsprW4NMi');

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `id` int(15) NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`id`, `title`, `message`, `time`) VALUES
(1, 'Lateness of staffs', 'this is to announce that lateness of staffs will not be tolerated any longer', 'Friday 7th of October 2022 11:05:21 AM');

-- --------------------------------------------------------

--
-- Table structure for table `itf_table`
--

CREATE TABLE `itf_table` (
  `id` int(15) NOT NULL,
  `stud_id` int(15) NOT NULL,
  `matric_no` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `study_year` varchar(100) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `bank_account` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `super_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itf_table`
--

INSERT INTO `itf_table` (`id`, `stud_id`, `matric_no`, `name`, `study_year`, `institution`, `bank_name`, `bank_account`, `mobile`, `company_name`, `super_name`) VALUES
(6, 1, '20181085143', 'PrinceEkejiuba', '2024', 'futo', 'access', '0109223910', '09018579950', 'Capitalhilltrades', 'mr obi');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `pid` int(15) NOT NULL,
  `stud_id` int(15) NOT NULL,
  `week` varchar(100) NOT NULL,
  `week_end` varchar(100) NOT NULL,
  `mon` varchar(100) NOT NULL,
  `tue` varchar(100) NOT NULL,
  `wed` varchar(100) NOT NULL,
  `thur` varchar(100) NOT NULL,
  `fri` varchar(100) NOT NULL,
  `sat` varchar(100) NOT NULL,
  `attachment` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`pid`, `stud_id`, `week`, `week_end`, `mon`, `tue`, `wed`, `thur`, `fri`, `sat`, `attachment`, `status`) VALUES
(5, 1, '1stweek', 'nextweek', 'mon', 'tue', 'wed', 'thur', 'fri', 'sat', 'uploads/b.png', 'declined');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `uid` int(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `studentid` varchar(152) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `imgsrc` varchar(200) NOT NULL,
  `gradyear` varchar(100) NOT NULL,
  `industry` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`uid`, `username`, `password`, `studentid`, `email`, `phone`, `adress`, `state`, `imgsrc`, `gradyear`, `industry`) VALUES
(1, 'Ekejiuba Prince', '$2a$08$tPLi8dlQjiqxeZRpFA1s9e4sBCM0tQPFuk2BvFwaV2HKRsprW4NMi', '20181085143', 'denniseinstien@gmail.com', '09012345', 'basic science', '300l', 'uploads/b.png', '2024', 'Shell Oil Company');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`id`, `username`, `password`) VALUES
(1, 'Obi Chibuike', '$2a$08$tPLi8dlQjiqxeZRpFA1s9e4sBCM0tQPFuk2BvFwaV2HKRsprW4NMi'),
(2, 'Ekoxy dennis', '$2y$10$CasEDzWeMli1YPM70j7LxuN5.f6Hyh5qLrO0btIb7ZKtNRgROx6Zy'),
(3, 'Ekejiuba Prince', '$2y$10$c53xRN.HJFvdJVXRn6UcquPXH16dnJgJl31G5SR9iZGdCVHX0Osea');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itf_table`
--
ALTER TABLE `itf_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `itf_table`
--
ALTER TABLE `itf_table`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `pid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `uid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
