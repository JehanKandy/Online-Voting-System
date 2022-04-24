-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 06:49 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eve_id` char(10) NOT NULL,
  `eve_name` varchar(255) NOT NULL,
  `eve_date` date NOT NULL,
  `eve_status` int(1) NOT NULL,
  `join_status` int(1) NOT NULL,
  `comments` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `party_history`
--

CREATE TABLE `party_history` (
  `his_id` int(10) NOT NULL,
  `party_id` int(20) NOT NULL,
  `party_name` varchar(255) NOT NULL,
  `p_year` varchar(10) NOT NULL,
  `p_score` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p_party`
--

CREATE TABLE `p_party` (
  `party_id` char(20) NOT NULL,
  `party_name` varchar(255) NOT NULL,
  `party_address` varchar(255) NOT NULL,
  `party_start` varchar(255) NOT NULL,
  `party_score` int(50) NOT NULL,
  `party_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `address1` varchar(255) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `pass1` varchar(255) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `user_status` int(1) NOT NULL,
  `vote_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`username`, `email`, `full_name`, `fname`, `lname`, `dob`, `address1`, `mobile_no`, `pass1`, `user_type`, `user_status`, `vote_status`) VALUES
('200105101033', 'jehan@123', 'jehan Kandy', 'jehan', 'kandy', '2022-04-14', 'kandy', '+94 711758851', '202cb962ac59075b964b07152d234b70', 'admin', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vote_tbl`
--

CREATE TABLE `vote_tbl` (
  `id` int(10) NOT NULL,
  `party_name` char(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `vote_status` int(1) NOT NULL,
  `date_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eve_id`);

--
-- Indexes for table `party_history`
--
ALTER TABLE `party_history`
  ADD PRIMARY KEY (`his_id`);

--
-- Indexes for table `p_party`
--
ALTER TABLE `p_party`
  ADD PRIMARY KEY (`party_id`,`party_name`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`username`,`email`);

--
-- Indexes for table `vote_tbl`
--
ALTER TABLE `vote_tbl`
  ADD PRIMARY KEY (`id`,`party_name`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `party_history`
--
ALTER TABLE `party_history`
  MODIFY `his_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vote_tbl`
--
ALTER TABLE `vote_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
