-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 18, 2024 at 11:21 PM
-- Server version: 10.6.17-MariaDB-cll-lve-log
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehidhimv_myserver`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(1) NOT NULL,
  `gofi` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `gofi`) VALUES
(1, 'balaigen'),
(2, 'nubalai');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(2) NOT NULL,
  `grade` int(2) NOT NULL,
  `balaigen` varchar(15) NOT NULL,
  `nubalai` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `grade`, `balaigen`, `nubalai`) VALUES
(1, 1, '10001-20010', '1000001-1140001'),
(2, 2, '10001-20010', '1000001-1140001'),
(3, 3, '10001-20010', '1000001-1140001'),
(4, 4, '10001-20010', '1000001-1140001'),
(5, 5, '10001-20010', '1000001-1140001'),
(6, 6, '10001-20010', '1000001-1140001'),
(7, 7, '10001-20010', '1000001-1140001'),
(8, 8, '10001-20010', '1000001-1140001'),
(9, 9, '10001-20010', '1000001-1140001'),
(10, 10, '10001-20010', '1000001-1140001');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `questionId` int(7) NOT NULL,
  `grade` int(2) NOT NULL,
  `gofi` varchar(25) NOT NULL,
  `isTaken` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(7) NOT NULL,
  `nid` varchar(7) NOT NULL,
  `name` varchar(150) NOT NULL,
  `grade` int(7) NOT NULL,
  `gofi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taken`
--

CREATE TABLE `taken` (
  `id` int(11) NOT NULL,
  `questionId` int(7) NOT NULL,
  `studentId` int(11) NOT NULL,
  `studentName` varchar(150) DEFAULT NULL,
  `createdAt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `gofi` (`gofi`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grade` (`grade`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `questionId` (`questionId`),
  ADD KEY `questiontograde` (`grade`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nid` (`nid`),
  ADD KEY `studenttograde` (`grade`);

--
-- Indexes for table `taken`
--
ALTER TABLE `taken`
  ADD PRIMARY KEY (`id`),
  ADD KEY `takenQuestion` (`questionId`),
  ADD KEY `takenStudent` (`studentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `taken`
--
ALTER TABLE `taken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questiontograde` FOREIGN KEY (`grade`) REFERENCES `grades` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `studenttograde` FOREIGN KEY (`grade`) REFERENCES `grades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `taken`
--
ALTER TABLE `taken`
  ADD CONSTRAINT `takenQuestion` FOREIGN KEY (`questionId`) REFERENCES `questions` (`questionId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `takenStudent` FOREIGN KEY (`studentId`) REFERENCES `students` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
