-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2020 at 06:46 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(10) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `user_name`, `password`) VALUES
(1, 'test', '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `dept_sort_name` varchar(255) NOT NULL,
  `dept_code` int(11) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `dept_sort_name`, `dept_code`, `creation_date`) VALUES
(6, 'Computer Engineering', 'CE', 123654, '0000-00-00 00:00:00'),
(7, 'Mechanical Engineering', 'ME', 562562, '0000-00-00 00:00:00'),
(8, 'Electrical Engineering', 'EE', 452123, '0000-00-00 00:00:00'),
(9, 'Information Technology', 'IT', 458756, '0000-00-00 00:00:00'),
(10, 'Instrumentation and control engineering', 'IC', 789654, '2019-12-10 22:32:23');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_code` int(11) NOT NULL,
  `emp_first_name` varchar(255) NOT NULL,
  `emp_last_name` varchar(255) NOT NULL,
  `emp_dept` varchar(255) NOT NULL,
  `emp_birth_date` varchar(255) NOT NULL,
  `emp_gender` varchar(10) NOT NULL,
  `emp_mobile` varchar(10) NOT NULL,
  `emp_address` text NOT NULL,
  `emp_email` varchar(255) NOT NULL,
  `emp_password` varchar(255) NOT NULL,
  `emp_city` varchar(255) NOT NULL,
  `emp_country` varchar(255) NOT NULL,
  `emp_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_picture` varchar(255) NOT NULL,
  `emp_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_code`, `emp_first_name`, `emp_last_name`, `emp_dept`, `emp_birth_date`, `emp_gender`, `emp_mobile`, `emp_address`, `emp_email`, `emp_password`, `emp_city`, `emp_country`, `emp_date`, `profile_picture`, `emp_status`) VALUES
(2, 102, 'test', 'data', '7', '0000-00-00', 'Female', '9898989888', 'FDswrf dsg nde', 'test@gmail.com', '1234567', 'HI', 'AK', '2019-12-11 12:29:27', '', 1),
(3, 102, 'jhj', 'Jadav', '6', '0000-00-00', 'Female', '9979202192', 'FDswrf dsg nde', 'test@gmail.com', '222', 'City', 'Country', '2019-12-11 13:04:42', '', 1),
(4, 104, 'rrr', 'Jadav', '7', '0000-00-00', 'Female', '9979202192', 'FDswrf dsg nde', 'test@gmail.com', '444', 'AK', 'AK', '2019-12-11 13:17:40', '', 1),
(5, 105, 'rewewe', 'wewe', '7', '0000-00-00', 'Female', '9979202192', 'FDswrf dsg nde', 'test@gmail.com', '123', 'AK', 'AK', '2019-12-11 13:18:35', '', 1),
(6, 108, 'drfgtg', 'fgfg', '8', '0000-00-00', 'Male', '9979202192', 'FDswrf dsg nde', 'test@gmail.com', '456', 'AK', 'AK', '2019-12-11 13:19:37', '', 1),
(7, 401, 'qwqwqwq', 'wqqwqwqw', '6', '19/06/2001', 'Female', '7896589568', 'wewrer', 'manalikotadiya123@gmail.com', '123', 'rajkot', 'india', '2019-12-11 13:33:26', '', 1),
(8, 785, 'archana', 'patel', '7', '17/06/2019', 'Female', '8595895689', 'swfsdfdf', 'test@gmail.com', '123', 'Rajkot', 'India', '2019-12-11 13:37:04', '', 1),
(9, 201, 'data', 'data', '7', '07/12/2019', 'Female', '7895623451', 'fdrhft', 'kunalmadhak@gmail.com', '123456', 'cgnj', 'bcvb', '2019-12-16 22:23:53', 'plant-flower-macro-87840.jpg', 1),
(10, 455, 'test', 'data', '9', '01/01/2019', 'Female', '9658745895', 'zxvcv', 'manali@gmail.com', '123456', 'cgnj', 'bcvb', '2019-12-17 21:43:40', '', 1),
(11, 456, 'test', 'data', '9', '11/12/2019', 'Female', '9658745895', 'jl', 'kunalmadhak@gmail.com', '123456', 'cgnj', 'bcvb', '2019-12-17 21:44:59', 'pexels-photo-462118.jpeg', 1),
(12, 741, 'mahima', 'patel', '9', '08/01/2020', 'Female', '9658745895', 'sdgv', 'manali@gmail.com', '123456', 'cgnj', 'bcvb', '2020-01-08 22:06:32', '91011578501392.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leave_request`
--

CREATE TABLE `leave_request` (
  `req_id` int(11) NOT NULL,
  `req_emp_id` int(11) NOT NULL,
  `req_leave_type` int(11) NOT NULL,
  `nature_of_leave` varchar(255) NOT NULL,
  `req_from_date` varchar(255) NOT NULL,
  `req_to_date` varchar(255) NOT NULL,
  `req_desc` text NOT NULL,
  `req_date` datetime NOT NULL,
  `req_status` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_request`
--

INSERT INTO `leave_request` (`req_id`, `req_emp_id`, `req_leave_type`, `nature_of_leave`, `req_from_date`, `req_to_date`, `req_desc`, `req_date`, `req_status`) VALUES
(1, 2, 1, 'Full Leave', '2019-12-12', '2019-12-14', 'rt', '2019-12-11 00:00:00', 2),
(2, 8, 1, 'Half Leave', '2019-12-12', '2019-12-14', 'rt', '2019-12-11 00:00:00', 0),
(3, 2, 1, 'Half Leave', '2019-12-12', '2019-12-14', 'rt', '2019-12-11 00:00:00', 1),
(6, 8, 2, 'Full Leave', '12/02/2019', '12/10/2019', 'huhbjbgjhmvgn', '2019-12-12 11:26:48', 0),
(7, 2, 1, 'Half Leave', '18/12/2019', '18/12/2019', 'sdgdgdfhf', '2019-12-17 17:03:23', 2),
(8, 12, 1, 'Half Leave', '18/12/2019', '18/12/2019', 'fvdcvgdx', '2020-01-08 22:15:27', 2);

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `ltype_id` int(11) NOT NULL,
  `ltype_name` varchar(255) NOT NULL,
  `ltype_desc` text NOT NULL,
  `ltype_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`ltype_id`, `ltype_name`, `ltype_desc`, `ltype_date`) VALUES
(1, 'Medical leave', 'dsfdf', '2019-12-10 21:14:43'),
(2, 'Casual leave', 'erertrytutyu', '2019-12-12 15:56:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `leave_request`
--
ALTER TABLE `leave_request`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`ltype_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `leave_request`
--
ALTER TABLE `leave_request`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `ltype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
