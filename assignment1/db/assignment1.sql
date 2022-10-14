-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 16, 2022 at 04:28 PM
-- Server version: 8.0.30-0ubuntu0.20.04.2
-- PHP Version: 7.2.34-28+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment1`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int NOT NULL,
  `state_id` int NOT NULL,
  `city` varchar(100) NOT NULL,
  `delete_status` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `state_id`, `city`, `delete_status`) VALUES
(1, 5, 'Pune', 0),
(2, 5, 'Nashik', 0),
(4, 5, 'Jalgaon', 0),
(5, 5, 'Dhule', 0),
(6, 7, 'Patna', 0);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `delete_status` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `delete_status`) VALUES
(1, 'Afghanistan', 0),
(2, 'Austria', 0),
(3, 'Bangladesh', 0),
(4, 'Canada', 0),
(5, 'India', 0),
(6, 'Mexico', 0),
(7, 'Philippines', 0),
(8, 'United Kingdom', 0),
(9, 'United States', 0),
(10, 'Vietnam', 0);

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `id` int NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `date` varchar(10) NOT NULL,
  `mob_no` varchar(10) NOT NULL,
  `file` varchar(250) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `w_date` varchar(10) DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `pin` int NOT NULL,
  `state_id` int NOT NULL,
  `city_id` int NOT NULL,
  `hobbies` varchar(80) NOT NULL,
  `delete_status` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`id`, `fname`, `lname`, `date`, `mob_no`, `file`, `gender`, `status`, `w_date`, `address`, `pin`, `state_id`, `city_id`, `hobbies`, `delete_status`) VALUES
(1, 'Sakshi', 'Jire', '1987-09-17', '7777777777', 'user.jpg', 'Female', '1', '2017-08-28', 'aa', 424003, 5, 5, 'Travelling ,Cooking, Reading Books', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int NOT NULL,
  `head_id` int NOT NULL,
  `relation` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `b_date` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `wdate` varchar(10) NOT NULL,
  `education` varchar(50) NOT NULL,
  `file` varchar(250) NOT NULL,
  `delete_status` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `head_id`, `relation`, `fname`, `lname`, `b_date`, `status`, `wdate`, `education`, `file`, `delete_status`) VALUES
(1, 1, 'Wife', 'Maya Sunil', 'Jire', '1982-01-01', '1', '1998-05-04', 'MBA', 'user2.jpg', 0),
(2, 3, 'Son', 'Sunil ', 'jjj', '2022-07-08', '0', '0', 'be', 'download.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int NOT NULL,
  `country_id` int NOT NULL,
  `state` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `delete_status` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `country_id`, `state`, `delete_status`) VALUES
(1, 1, 'Balkh', 0),
(2, 1, 'Herat', 0),
(3, 1, 'Qandahar', 0),
(4, 1, 'Ghazni', 0),
(5, 5, 'Maharashtra', 0),
(6, 5, 'Assam', 0),
(7, 5, 'Bihar', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `family`
--
ALTER TABLE `family`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
