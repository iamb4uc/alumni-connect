-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 23, 2023 at 12:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
  `sr_no` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`sr_no`, `admin_name`, `admin_pass`) VALUES
(1, 'mass', '1234'),
(2, 'Rajib das', '12345'),
(3, 'swapnil', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `date` datetime NOT NULL,
  `batchyr` varchar(50) NOT NULL,
  `is_varified` tinyint(1) DEFAULT 0,
  `occupation` varchar(255) DEFAULT NULL,
  `validfile` varchar(1024) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT 'https://facebook.com/',
  `twitter` varchar(255) DEFAULT 'https://twitter.com/',
  `linkedin` varchar(255) DEFAULT 'https://linkedin.com/',
  `bio` varchar(50) NOT NULL DEFAULT 'Hey there! I am proud to be a part of this :)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `image`, `password`, `gender`, `date`, `batchyr`, `is_varified`, `occupation`, `validfile`, `facebook`, `twitter`, `linkedin`, `bio`) VALUES
(2, 'Rajib', 'Das', 'rajibdas@gmail.com', '../uploads/16845718511683379134pro1.jpg', '$2y$10$F8v6AtBtThOLEYKE0Iur4.y5hLH7GKgBg/QOrVSexGF4vdQcVXZuG', 'Male', '2023-05-20 10:37:31', '2000', 1, 'Teacher', '', 'https://facebook.com/rajibdas', 'https://twitter.com', 'https://linkedin.com', 'Hey there! I am proud to be part of this :)'),
(15, 'Moinak', 'Shome', 'smoinak360@gmail.com', '../uploads/16845630131662231235user.jpg', '$2y$10$aEzrUsOhxgEzvsi3iJd23Ou.dMFNMVRq/di2baNTAA9KLUykZLa5K', 'Male', '2023-05-20 08:10:13', '2020', 1, 'Student', '', 'https://facebook.com', 'https://twitter.com', 'https://linkedin.com', 'Hey there! I am proud to be part of this :)'),
(16, 'Masuk', 'Mazarbhuya', 'mass420@gmail.com', NULL, '$2y$10$ZbEJsJuFIxZBxaJe1KLm8uUfMiexZ11/HIb.TSdRSHyX1TTBxV.Hm', 'Male', '2023-05-22 05:02:57', '2020', 1, 'Student', '', 'https://facebook.com/', 'https://twitter.com/', 'https://linkedin.com/', 'Hey there! I am proud to be a part of this :)'),
(17, 'Swapnil', 'Bhowmik', 'swapnil@iamb4uc.xyz', NULL, '$2y$10$qxND1X5CJbhf8W/yop42vO7Ov8RcqEu.ZkQ3rhu7N4SRqvjWJFvFi', 'Female', '2023-05-22 19:30:24', '2020', 0, 'Student', '', 'https://facebook.com/', 'https://twitter.com/', 'https://linkedin.com/', 'Hey there! I am proud to be a part of this :)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `email` (`email`),
  ADD KEY `date` (`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
