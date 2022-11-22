-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2021 at 05:41 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`) VALUES
(2, 'mobile app development'),
(6, 'Numerical Analysis'),
(7, 'Object Oriented Programming'),
(8, 'operating system'),
(9, 'theory of automata'),
(10, 'Web Programming');

-- --------------------------------------------------------

--
-- Table structure for table `course_assessment`
--

CREATE TABLE `course_assessment` (
  `id` int(11) NOT NULL,
  `assessment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_assessment`
--

INSERT INTO `course_assessment` (`id`, `assessment`) VALUES
(2, 'Assignment 1'),
(3, 'Assignment 2'),
(4, 'Assignment 3'),
(5, 'Assignment 4');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `f_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`f_id`, `name`, `designation`, `password`) VALUES
(8600, 'Rana Marwat Hussain', 'Lecturer', 'rana1234'),
(8602, 'mohisn', 'Lecturer', '7890'),
(8603, 'salman anwar', 'Lecturer', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_course`
--

CREATE TABLE `faculty_course` (
  `id` int(11) NOT NULL,
  `course` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_course`
--

INSERT INTO `faculty_course` (`id`, `course`) VALUES
(8602, ' theory of automata'),
(8600, 'Web Programming');

-- --------------------------------------------------------

--
-- Table structure for table `finance_entry`
--

CREATE TABLE `finance_entry` (
  `id` int(50) NOT NULL,
  `username` varchar(200) NOT NULL,
  `sapid` varchar(200) NOT NULL,
  `class` varchar(200) NOT NULL,
  `totalamount` varchar(200) NOT NULL,
  `amountpay` varchar(200) NOT NULL,
  `remaining` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finance_entry`
--

INSERT INTO `finance_entry` (`id`, `username`, `sapid`, `class`, `totalamount`, `amountpay`, `remaining`, `date`) VALUES
(19, 'mhamididrees', '8649', 'semester 6', '1000', '800', '200', '2021-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `sapid` varchar(200) NOT NULL,
  `image` varchar(265) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`sapid`, `image`, `fname`, `lname`, `email`, `password`, `contact`, `dob`) VALUES
('8623', 'logo.png', 'talha', 'khan', 'talha@gmai.com', 'talha123', '03003434443', '2021-07-06'),
('8649', 'pic.jpg', 'hamid', 'idrees', 'mhamididrees70@gmail.com', '12345', '03134180610', '2021-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `sapid` varchar(200) NOT NULL,
  `course` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`sapid`, `course`) VALUES
('8623', ' Object Oriented Programming'),
('8649', ' mobile app development'),
('8649', ' Object Oriented Programming'),
('8649', 'Web Programming');

-- --------------------------------------------------------

--
-- Table structure for table `student_result`
--

CREATE TABLE `student_result` (
  `sapid` varchar(50) NOT NULL,
  `assessment` varchar(200) NOT NULL,
  `course` varchar(100) NOT NULL,
  `totalmarks` varchar(200) NOT NULL,
  `gainmarks` varchar(200) NOT NULL,
  `percentage` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_result`
--

INSERT INTO `student_result` (`sapid`, `assessment`, `course`, `totalmarks`, `gainmarks`, `percentage`) VALUES
('8649', 'Assignment 1', 'mobile app development', '10', '10', '100'),
('8650', 'Assignment 1', 'web programming', '10', '10', '100'),
(' 8649', ' Assignment 2', ' mobile app development', '10', '9', '90'),
(' 8649', ' Assignment 3', ' mobile app development', '20', '15', '75'),
(' 8649', ' Assignment 1', ' Web Programming', '10', '9', '90'),
('8649', 'Assignment 1', 'Web Programming', '10', '10', '100'),
('8649', 'Assignment 2', 'Web Programming', '10', '9', '90'),
('8649', 'Assignment 3', 'Web Programming', '20', '15', '75');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_assessment`
--
ALTER TABLE `course_assessment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `faculty_course`
--
ALTER TABLE `faculty_course`
  ADD KEY `id` (`id`);

--
-- Indexes for table `finance_entry`
--
ALTER TABLE `finance_entry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sapid` (`sapid`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`sapid`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD KEY `sapid` (`sapid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `course_assessment`
--
ALTER TABLE `course_assessment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `finance_entry`
--
ALTER TABLE `finance_entry`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faculty_course`
--
ALTER TABLE `faculty_course`
  ADD CONSTRAINT `faculty_course_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `finance_entry`
--
ALTER TABLE `finance_entry`
  ADD CONSTRAINT `finance_entry_ibfk_1` FOREIGN KEY (`sapid`) REFERENCES `signup` (`sapid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
