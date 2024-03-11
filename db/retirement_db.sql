-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2023 at 09:04 PM
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
-- Database: `retirement_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(225) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `dob`, `gender`, `password`, `user_type`, `image`, `date_created`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', '3634634643', 'Admin Sample Address', '1960-01-10', 'Female', '21232f297a57a5a743894a0e4a801fc3', 'admin', '../images/Screenshot_20230327-080835~2.png', '2023-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `salary` double NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `savings` varchar(50) NOT NULL,
  `date_emp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `phone`, `email`, `dob`, `address`, `position`, `salary`, `password`, `gender`, `image`, `user_type`, `status`, `savings`, `date_emp`) VALUES
(7, 'peter', 'scott', '09082342345', 'peter@gmail.com', '1964-12-09', 'makurdi', 'cleaer', 100000, '202cb962ac59075b964b07152d234b70', 'Male', '../images/FB_IMG_16594815923216699.jpg', 'employee', 'Active', 'No', '2023-04-17'),
(8, 'peter', 'pan', '07012345678', 'peterpan@gmail.com', '1968-02-21', 'makurdi', 'General', 20000, '202cb962ac59075b964b07152d234b70', 'Male', '../images/drwhite_1 (2).png', 'employee', 'Active', 'No', '2023-04-12'),
(9, 'John', 'Tim', '08190834567', 'tim@gmail.com', '1958-06-11', 'Mary address ', 'Asst General', 100000, '202cb962ac59075b964b07152d234b70', 'Male', '../images/FB_IMG_16594815455054147.jpg', 'employee', 'Active', 'No', '2023-04-15'),
(11, 'Joy', 'Dan', '09012345678', 'joy@gmail.com', '1960-01-10', 'FCT ABJ', 'GM and Sample', 80000, '202cb962ac59075b964b07152d234b70', 'Female', '../images/FB_IMG_16594815858438603.jpg', 'employee', 'Active', 'No', '2023-04-14'),
(12, 'Young', 'Smith', '07012345123', 'smith@gmail.com', '1973-22-21', 'Sample Address', 'General', 5000, '202cb962ac59075b964b07152d234b70', 'Male', '../images/drwhite.png', 'employee', 'Active', 'No', '2023-04-13'),
(13, 'Job', 'ali', '0901345789', 'ali@gmail.com', '1980-09-07', 'makurdi', 'waiter', 20000, '202cb962ac59075b964b07152d234b70', 'Male', '../images/FB_IMG_16594816011415421.jpg', 'employee', 'Active', 'No', '2023-04-17'),
(15, 'sample2', 'Smith', '908908098', 'sample@gmail.com', '1960-01-10', 'okay Address', 'General', 2000, '', 'Male', '', 'employee', 'Active', 'No', '2023-04-21'),
(16, 'sdassd', 'lskjkdl', '89-09-9000', 'testinge@gmail.com', '2222-22-22', 'ssdsfff', 'General', 10000, '', 'Male', '', 'employee', 'Active', 'No', '2023-04-21'),
(17, 'peter', 'testing', '54354343', 'eliasfsdev@gmail.com', '2222-02-21', 'Sample Address of Peter', 'AGM', 100000, '202cb962ac59075b964b07152d234b70', 'Male', '../images/FB_IMG_16594815858438603.jpg', 'employee', 'Active', 'No', '2023-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `emp_inbox`
--

CREATE TABLE `emp_inbox` (
  `id` int(100) NOT NULL,
  `emp_id` int(100) NOT NULL,
  `message` text DEFAULT NULL,
  `un_read_msg` int(5) NOT NULL,
  `inbox_count` int(5) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_inbox`
--

INSERT INTO `emp_inbox` (`id`, `emp_id`, `message`, `un_read_msg`, `inbox_count`, `date_created`) VALUES
(1, 4, 'Hello esteemed worker, we appreciate your work so far in this company, and we don\"t take it for granted.\r\n                We\"d like to inform you that you have spent 25 years in service, and this is to notify you that\r\n                your retirement will be due in 10 years and your savings plan would be terminated when retirement is due.<br>\r\n                Thank you and have a lovely day!', 0, 0, '2023-04-12 11:00:22'),
(2, 2, 'Hello esteemed worker, we appreciate your work so far in this company, and we don\"t take it for granted.\r\n                We\"d like to inform you that you have spent 30 years in service, and this is to notify you that\r\n                your retirement will be due in 5 years and your savings plan would be terminated when retirement is due.<br>\r\n                Thank you and have a lovely day!', 0, 0, '2023-04-12 11:00:22'),
(3, 1, 'Hello esteemed worker, we appreciate your work so far in this company, and we don\"t take it for granted.\r\n                We\"d like to inform you that you have spent 35 years in service, and this is to notify you that\r\n                your retirement will be due tomorrow and your savings plan would be terminated when retirement is due.<br>\r\n                Thank you and have a lovely day!', 0, 0, '2023-04-12 11:00:22'),
(4, 1, 'Hello esteemed worker, we appreciate your work so far in this company, and we don\"t take it for granted.\r\n                We\"d like to inform you that you have spent 25 years in service, and this is to notify you that\r\n                your retirement will be due in 10 years and your savings plan would be terminated when retirement is due.<br>\r\n                Thank you and have a lovely day!', 1, 1, '2023-04-17 09:48:08'),
(5, 9, 'Hello esteemed worker, we appreciate your work so far in this company, and we don\"t take it for granted.\r\n                We\"d like to inform you that you have spent 25 years in service, and this is to notify you that\r\n                your retirement will be due in 10 years and your savings plan would be terminated when retirement is due.<br>\r\n                Thank you and have a lovely day!', 1, 1, '2023-04-17 10:15:59'),
(6, 11, 'Hello esteemed worker, we appreciate your work so far in this company, and we don\"t take it for granted.\r\n                We\"d like to inform you that you have spent 30 years in service, and this is to notify you that\r\n                your retirement will be due in 5 years and your savings plan would be terminated when retirement is due.<br>\r\n                Thank you and have a lovely day!', 1, 1, '2023-04-17 10:15:59'),
(7, 12, 'Hello esteemed worker, we appreciate your work so far in this company, and we don\"t take it for granted.\r\n                We\"d like to inform you that you have spent 35 years in service, and this is to notify you that\r\n                your retirement will be due tomorrow and your savings plan would be terminated when retirement is due.<br>\r\n                Thank you and have a lovely day!', 0, 0, '2023-04-17 10:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `next_of_kin`
--

CREATE TABLE `next_of_kin` (
  `id` int(10) NOT NULL,
  `emp_id` int(20) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `dob` varchar(150) NOT NULL,
  `relationship` varchar(150) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `date_emp` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pension_list`
--

CREATE TABLE `pension_list` (
  `id` int(11) NOT NULL,
  `emp_id` int(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `address` varchar(225) NOT NULL,
  `position` varchar(225) NOT NULL,
  `pen_amount` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(5) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pension_list`
--

INSERT INTO `pension_list` (`id`, `emp_id`, `first_name`, `last_name`, `phone`, `email`, `dob`, `address`, `position`, `pen_amount`, `password`, `gender`, `image`, `status`, `date_created`) VALUES
(1, 3, 'Joe', 'Doe', '5345353253532', 'doe@gmail.com', '2222-22-21', 'Sample Doe Address', 'AGM', '80000', '202cb962ac59075b964b07152d234b70', 'Male', '../images/FB_IMG_16594815858438603.jpg', 0, '2023-04-08 23:00:00'),
(2, 2, 'Jane', 'Scott', '634534634643', 'jane@gmail.com', '1960-01-10', 'Scott Domain', 'General Manager', '100000', '202cb962ac59075b964b07152d234b70', 'Female', '../images/Screenshot_20230327-080835~2.png', 0, '2023-04-14 23:00:00'),
(3, 1, 'John', 'Smith', '654363345', 'smith@gmail.com', '2222-22-21', 'best home ', 'General', '70000', '202cb962ac59075b964b07152d234b70', 'Male', '../images/drwhite.png', 0, '2023-04-14 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `saving_plan`
--

CREATE TABLE `saving_plan` (
  `id` int(10) NOT NULL,
  `emp_id` int(20) NOT NULL,
  `emp_first_name` varchar(50) NOT NULL,
  `emp_email` varchar(100) NOT NULL,
  `emp_last_name` varchar(50) NOT NULL,
  `next_of_kin_fullname` varchar(100) NOT NULL,
  `next_of_kin_dob` varchar(50) NOT NULL,
  `relationship` varchar(100) NOT NULL,
  `next_of_kin_phone` varchar(20) NOT NULL,
  `salary` double NOT NULL,
  `savings_amt` double NOT NULL,
  `month_count` int(255) NOT NULL,
  `status` int(5) NOT NULL,
  `date_created` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saving_plan`
--

INSERT INTO `saving_plan` (`id`, `emp_id`, `emp_first_name`, `emp_email`, `emp_last_name`, `next_of_kin_fullname`, `next_of_kin_dob`, `relationship`, `next_of_kin_phone`, `salary`, `savings_amt`, `month_count`, `status`, `date_created`) VALUES
(1, 4, 'Tk', 'tkken@gmail.com', 'ken', 'random', '2000-02-04', 'stranger', '09036835545', 70000, 63000, 6, 1, '2023-04-12 11:22:27'),
(2, 5, 'peter', 'peter@gmail.com', 'pan', 'Drwhite', '2322-02-05', 'first son', '08709808908990', 55000, 33000, 4, 1, '2023-04-15 22:23:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_inbox`
--
ALTER TABLE `emp_inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `next_of_kin`
--
ALTER TABLE `next_of_kin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pension_list`
--
ALTER TABLE `pension_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saving_plan`
--
ALTER TABLE `saving_plan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `emp_inbox`
--
ALTER TABLE `emp_inbox`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `next_of_kin`
--
ALTER TABLE `next_of_kin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pension_list`
--
ALTER TABLE `pension_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `saving_plan`
--
ALTER TABLE `saving_plan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
