-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 07:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
  `sr_no` int(11) NOT NULL PRIMARY KEY,
  `admin_name` VARCHAR(150) NOT NULL,
  `admin_pass` VARCHAR(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`sr_no`, `admin_name`, `admin_pass`) VALUES
(1, 'mass', '1234'),
(2, 'Rajib das', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` INT(11) NOT NULL,
  `firstname` VARCHAR(30) NOT NULL,
  `lastname` VARCHAR(30) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `image` VARCHAR(1024) DEFAULT NULL,
  `password` VARCHAR(255) NOT NULL,
  `gender` VARCHAR(6) NOT NULL,
  `date` datetime NOT NULL

  `is_varified` BOOLEAN DEFAULT 0,
  `occupations` VARCHAR(255),
  `user_doc` VARCHAR(1024) DEFAULT NULL,

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `image`, `password`, `gender`, `date`) VALUES
(6, 'John', 'Bates', 'email@email.com', 'uploads/1662232332user.jpg', '$2y$10$PUh/h0Exbs1GY/6o5CsbauwyImZPwVJ6AH0aLTDOlJzncIJVWi386', 'Male', '2022-09-03 21:12:12'),
(7, 'Mary', 'Bates', 'mary@email.com', 'uploads/1662232388alicia-keys.jpg', '$2y$10$Q7c1b7rYlQ2nc9Jw.RWDAeL69f7zMy5y9UYx4wNUj7OSS64yT0KBm', 'Female', '2022-09-03 21:13:08'),
(9, 'Jane', 'Doe', 'jane@email.com', 'uploads/1662233918pexels-photo-3756774.jpeg', '$2y$10$DhrdIIPD7hgJDvJAjNeFieLQU2M05yEPES2lJbJhARUU./ATsRzwW', 'Female', '2022-09-03 21:38:38'),
(10, 'Masuk', 'mb', 'mb2@gmail.com', 'uploads/1683401699WhatsApp Image 2023-03-15 at 9.07.40 AM.jpeg', '$2y$10$FImKDG0BwCLkLWXvgFhqO.VAajdL8GAWpRxBnf/ri5yANKQuCS0Ey', 'Male', '2023-05-06 21:34:59'),
(11, 'swapnil', 'Bwaomic', 'swapnil@gmail.com', NULL, '$2y$10$OOBdZlDylY9sgxjtScock.LWE4Cog0X6vlvOIu9M.BxDu5o4A.Sfe', 'Male', '2023-05-06 20:42:17'),
(12, 'Moinal', 'Monkey', 'moina@gmail.com', 'uploads/1683437527licensed-image.jpg', '$2y$10$6gDRMb/J6FpH6aWTnuZVvOqNMVeQaSGAtXKAMfx5zVChdgxoGD8Zy', 'Male', '2023-05-07 07:32:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
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
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
