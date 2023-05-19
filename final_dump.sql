-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2023 at 09:52 AM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL,
  `batchyr` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_varified` tinyint(1) DEFAULT 0,
  `occupation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `validfile` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `image`, `password`, `gender`, `date`, `batchyr`, `is_varified`, `occupation`, `validfile`) VALUES
(1, 'Rajib', 'Das', 'rajibdas@gmail.com', NULL, '$2y$10$SfjY1gLUX7RRqtzOVr99KeverF/BcZ9HP9pHQV7jsNZP5RQMclDW6', 'Male', '2023-05-18 17:56:39', '2222', 0, 'Teacher', NULL),
(3, 'Swapnil', 'Bhowmik', 'swapnil@iamb4uc.xyz', NULL, '$2y$10$Zzz7sumzrUnqPYr.Y1noRObWIKGUcHCINZkejCc.aiF014pX5yQoG', 'Male', '2023-05-19 01:47:27', '2020', 0, 'Student', ''),
(4, 'Moinak', 'Shome', 'smoinak360@gmail.com', NULL, '$2y$10$FzEflmiNTlPplkReMCZNdeCrNT8JV/wAHgeZmh0ZAeEegFkMie5gO', 'Male', '2023-05-19 03:21:13', '2020', 0, 'Student', ''),
(5, 'Priangshu', 'Deb', 'priangshu@gmail.com', NULL, '$2y$10$LDNJZyvAYLKy5FYrpauMaOIlKRdJB/IV/7zGr7EkRvpOXuGUan2KS', 'Male', '2023-05-19 08:17:14', '2020', 0, 'Student', ''),
(6, 'Test', 'user', '123@gmail.com', NULL, '$2y$10$vOY4MU5ebs1eiWOcvI7LT.72seqtN69nRg84sHY0K4ujyWcY9P1WC', 'Female', '2023-05-19 09:01:05', '2222', 0, 'slkfdjslkdjf', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `firstname` (`firstname`),
  ADD UNIQUE KEY `lastname` (`lastname`),
  ADD UNIQUE KEY `date` (`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
