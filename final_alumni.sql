-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2023 at 03:49 PM
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
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `content` varchar(50) NOT NULL,
  `text` varchar(1000) NOT NULL DEFAULT 'Established in 1946, Karimganj College is one of the pioneering Colleges of Assam, imparting education in Science, Arts & Commerce. Situated on the bank of Kushiara River demarcating Indo- Bangladesh Border, the College is playing a significant role for last six decades in the field of Higher Education of the region. Today, it is one of the leading colleges under Assam University.',
  `link` varchar(255) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `content`, `text`, `link`, `update_date`) VALUES
(1, 'About College', 'Established in 1946, Karimganj College is one of the pioneering Colleges of Assam, imparting education in Science, Arts & Commerce. Situated on the bank of Kushiara River demarcating Indo- Bangladesh Border, the College is playing a significant role for last six decades in the field of Higher Education of the region. Today, it is one of the leading colleges under Assam University.', 'http://www.karimganjcollege.ac.in/', '2023-05-25'),
(2, 'About Team', 'This project is done for the sole purpose of connecting the alumnus of this esteemed college and let people view and connect with other alumnus. This project is done by a small group of 5 members from the 2020 batch Computer Application students.', 'http://www.karimganjcollege.ac.in/', '2023-05-27');

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
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `donation_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `transec_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`donation_id`, `id`, `fname`, `lname`, `email`, `amount`, `transec_date`) VALUES
(1, 28, 'S', 'Chand', 'schand@outlook.com', 2000, '2023-05-25'),
(2, 17, 'Swapnil', 'Bhowmik', 'swapnil@iamb4uc.xyz', 6000, '2023-05-25'),
(4, 15, 'Moinak', 'Shome', 'smoinak360@gmail.com', 4000, '2023-05-25'),
(5, 22, 'Jhone', 'Doe', 'jh@gmail.com', 700, '2023-05-25'),
(7, 2, 'Rajib', 'Das', 'rajibdas@gmail.com', 222, '2023-05-26'),
(8, 2, 'Rajib', 'Das', 'rajibdas@gmail.com', 34, '2023-05-26');

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
  `bio` varchar(50) NOT NULL DEFAULT 'Hey there! I am proud to be a part of this :)',
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `image`, `password`, `gender`, `date`, `batchyr`, `is_varified`, `occupation`, `validfile`, `facebook`, `twitter`, `linkedin`, `bio`, `department`) VALUES
(2, 'Rajib', 'Das', 'rajibdas@gmail.com', '../uploads/16845718511683379134pro1.jpg', '$2y$10$F8v6AtBtThOLEYKE0Iur4.y5hLH7GKgBg/QOrVSexGF4vdQcVXZuG', 'Male', '2023-05-20 10:37:31', '2000', 1, 'Teacher', '../uploads/16845718511683379134pro1.jpg', 'https://facebook.com/rajibdas', 'https://twitter.com', 'https://linkedin.com', 'Hey there! I am proud to be part of this :)', ''),
(15, 'Moinak', 'Shome', 'smoinak360@gmail.com', '../uploads/16849946501683437527licensed-image.jpg', '$2y$10$qjvrdx.6JcXdRseGJG2MxOCUjhbeUEtrmLzI5O7DkDVrnaQTMWwTG', 'Male', '2023-05-25 08:04:10', '2020', 1, 'Student', 'https://imgbox.com/IxJIpgJa', 'https://facebook.com', 'https://twitter.com', 'https://linkedin.com', 'Hey there! I am proud to be part of this :)', ''),
(16, 'Masuk', 'Choudhury', 'mass420@gmail.com', NULL, '$2y$10$ZbEJsJuFIxZBxaJe1KLm8uUfMiexZ11/HIb.TSdRSHyX1TTBxV.Hm', 'Male', '2023-05-22 05:02:57', '2020', 1, 'Student', '', 'https://facebook.com/', 'https://twitter.com/', 'https://linkedin.com/', 'Hey there! I am proud to be a part of this :)', ''),
(17, 'Swapnil', 'Bhowmik', 'swapnil@iamb4uc.xyz', '../uploads/16851257491683707177images (2).jpg', '$2y$10$E2z3O22/Cl/h6OPjSRpuV.E9S1CfgK0TZwIyoLEicpb4XF5bYnqdC', 'Male', '2023-05-26 20:29:09', '2020', 0, 'Student', NULL, 'https://facebook.com/', 'https://twitter.com/twitterisbad', 'https://linkedin.com/microsoftisalsobad', 'Use Free software and stay libre :D', 'biotech normie'),
(18, 'Priangshu', 'DebNath', '123@gmail.com', NULL, '$2y$10$sG0qi/3QgFDIOEKhwjgtCuuIqmohjeoF/LICSEUQ8UtEisahZfyXK', 'Others', '2023-05-23 22:47:09', '2020', 1, 'Student', '', 'https://facebook.com/', 'https://twitter.com/', 'https://linkedin.com/', 'Hey there! I am proud to be a part of this :)', ''),
(19, 'Lona', 'Roy', 'lona12@gmail.com', '../uploads/1684956926fresher\'s.jpg', '$2y$10$3/iKFU69TYGStdfGt2FNGOTMkXVuChPWnT7zjpYOLkkWPi9P17WHG', 'Others', '2023-05-24 21:35:26', '2019', 0, 'Student', '', 'https://facebook.com/', 'https://twitter.com/', 'https://linkedin.com/', 'Hey there! I am proud to be a part of this :)', ''),
(20, 'Alicia', 'Keys', 'royananya@outlook.com', '../uploads/16849544491662232388alicia-keys.jpg', '$2y$10$7JBb9O53Q6dLechp9oea7Of534LVZtzeoDXx7L.XZKl3Ty7xgKy9O', 'Female', '2023-05-24 20:54:09', '2020', 1, 'Musician', '../uploads/documents/dummy.pdf', 'https://facebook.com/aliciakeys', 'https://twitter.com/aliciakeys', 'https://linkedin.com/aliciakeys', 'Visit my twitter profile for fun :D', ''),
(22, 'Jhone', 'Doe', 'jh@gmail.com', NULL, '$2y$10$Wt0t4uhql8bFDYBU.8jijuCvpdiLozsqU32khxfY9/A4Oau58iKGu', 'Male', '2023-05-23 23:12:00', '2014', 1, 'Plumber', 'C:\\fakepath\\Test PDF.pdf', 'https://facebook.com/', 'https://twitter.com/', 'https://linkedin.com/', 'Hey there! I am proud to be a part of this :)', ''),
(23, 'random', 'user', 'rand@1234.com', NULL, '$2y$10$AjG46F/cMz3euB7S3hGwWe93bmR4gwaJW6TzdSCCXCuWRxZOMLDCW', 'Others', '2023-05-23 23:38:03', '1000', 0, 'Mason', '../uploads/documents/dummy.pdf', 'https://facebook.com/', 'https://twitter.com/', 'https://linkedin.com/', 'Hey there! I am proud to be a part of this :)', ''),
(24, 'random', 'resu', 'resu@1212.com', NULL, '$2y$10$lD3fcBNu9yKAB38aN00PHejutWa57KnYgxcjQrlkXSkls6tqa9yny', 'Others', '2023-05-23 23:41:44', '1212', 1, 'Thela ala', 'C:\\fakepath\\Test PDF.pdf', 'https://facebook.com/', 'https://twitter.com/', 'https://linkedin.com/', 'Hey there! I am proud to be a part of this :)', ''),
(25, 'lily', 'doe', 'lily@gmail.com', NULL, '$2y$10$V6Wl52UeXi5PWDWLYciHBei4eaJYd28p/CKtHaQLPJG4UMCxcFJfy', 'Female', '2023-05-24 00:14:04', '2014', 0, 'Teacher', '../uploads/1683437527licensed-image.jpg', 'https://facebook.com/', 'https://twitter.com/', 'https://linkedin.com/', 'Hey there! I am proud to be a part of this :)', ''),
(26, 'nicolas', 'cage', 'nicolas@yahoo.com', NULL, '$2y$10$DdBt/kyJIIFI/7iZJbH1iO4Hyi64df8K4AwdkKVB0oWo5/D9n8npG', 'Male', '2023-05-24 00:18:23', '2020', 0, 'Mail Man', 'C:\\fakepath\\1662232388alicia-keys.jpg', 'https://facebook.com/', 'https://twitter.com/', 'https://linkedin.com/', 'Hey there! I am proud to be a part of this :)', ''),
(27, 'Jeo', 'Lennerd', 'jeo@hotmail.com', NULL, '$2y$10$fjW098fRJnDY5CZmkJuF6.UAjxykAtct44TLEnVq4L5S/swsEs602', 'Male', '2023-05-24 00:20:47', '1992', 1, 'Businessman', 'C:\\fakepath\\1683379134pro1.jpg', 'https://facebook.com/', 'https://twitter.com/', 'https://linkedin.com/', 'Hey there! I am proud to be a part of this :)', ''),
(28, 'S', 'Chand', 'schand@outlook.com', NULL, '$2y$10$HaqEptOa6cGk3gsbOa/QNuZK0/JWXa1vucXwEjoKTa3RY9TbcjVy2', 'Others', '2023-05-24 23:18:57', '2001', 0, 'Writer', '../uploads/documents/PROJECT REPORT frontpage.pdf', 'https://facebook.com/', 'https://twitter.com/', 'https://linkedin.com/', 'Hey there! I am proud to be a part of this :)', ''),
(30, 'Masuk', 'User', 'test@gmail.com', '../uploads/16850048741683266857WhatsApp Image 2023-03-15 at 9.07.40 AM.jpeg', '$2y$10$5OAkQcuHhsrGByYKnKF12eLZc/xbX6baFr0PG4wQaXwbzQxiujFh.', 'Others', '2023-05-25 10:54:34', '2020', 1, 'Student', '../uploads/documents/PROJECT REPORT frontpage.pdf', 'https://facebook.com/masuk', 'https://twitter.com/', 'https://linkedin.com/', 'HELLO', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donation_id`);

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
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
