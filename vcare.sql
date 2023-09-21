-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 21, 2023 at 02:34 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'pending ',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `doctor_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `name`, `email`, `phone`, `status`, `date`, `doctor_id`) VALUES
(2, 'عبد العزيز عزت نصار', 'somanassar60@gmail.com', '01098098494', 'pending ', '2023-09-14 20:58:36', 7),
(3, 'عبد العزيز عزت نصار', 'somanassar60@gmail.com', '01098098494', 'pending ', '2023-09-14 20:58:58', 7),
(4, 'elzoz', 'zezo.nassar444@gmail.co', '01098098494', 'accepted', '2023-09-14 20:59:20', 7),
(5, 'elzoz', 'somanassar60@gmail.com', '01098098494', 'pending ', '2023-09-14 20:59:41', 7),
(6, 'elzoz', 'ezznassar38@gmail.com', '01098098494', 'pending ', '2023-09-14 21:05:10', 7),
(7, 'elzoz', 'somanassar60@gmail.com', '01098098494', 'rejected', '2023-09-19 10:16:02', 7);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(2000) NOT NULL,
  `message` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `bio` varchar(2000) NOT NULL,
  `major_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `email`, `password`, `image`, `bio`, `major_id`) VALUES
(1, 'Dr.S.manoj', 'Dr.S.manoj@gmil.com', '', 'Dr.S.manoj.png', 'حلو و بسمسم', 28),
(7, 'Dr.hayes', 'zezo.nassar444@gmail.co', 'xAXbckbckS', 'Dr.hayes.png', 'تشريح', 31),
(8, 'Dr.Arun.kumar', 'somanassar60@gmail.com', 'zxzczfd', 'Dr.Arun.kumar.png', 'Dr. Arun Kumar. K ,MBBS,MD,DNB (Psychiatry) is working as a Specialist Psychiatrist at Aster Clinic, Bur Dubai and Aster Hospital', 33);

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` int NOT NULL,
  `titel` varchar(20) NOT NULL,
  `image` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `titel`, `image`) VALUES
(28, 'Cardiology', 'Cardiology.png'),
(31, 'Anatomy', 'Anatomy.png'),
(32, 'Anesthesia', 'Anesthesia.png'),
(33, 'Psychiatry', 'Psychiatry.png'),
(34, 'Kidney', 'Kidney.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `role` varchar(4) NOT NULL DEFAULT 'user',
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `phone`) VALUES
(1, 'zezo', 'zezo.nassar444@gmail.co', '$2y$10$JpSlRlyLVBB9c6w0gV9uKuJJUfEgaDu4u8qL6Bnv6unD6dXqGvy6S', 'admi', '01098098494'),
(2, 'elzoz', 'zezo.nassar444@gmail.com', '$2y$10$hi//uKFiwc4ctxHwzJDaNe.9xbgRp.S8uTRi9ztYrwVQOk0EtYukC', 'admi', '01098098494'),
(3, 'elzeee', 'zezo.nassar444@gmail.ddd', '$2y$10$RENJixKaqQNAFO8EaW.mCejsUCqxqS25WH67r2jB4EVOCnW0WuBH2', 'user', '01098098494'),
(4, 'elzoz_nassar', 'somanassar60@gmail.com', '$2y$10$zMk1DpVYZ5iHmkPXEOkb0e1YAggcqiu6S0XO.9Y7/g7QTNx0xvEOa', 'user', '01098098494');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `major_id` (`major_id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`major_id`) REFERENCES `majors` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
