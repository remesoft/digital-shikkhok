-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2025 at 03:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital-shikkhok`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_desc` text NOT NULL,
  `description` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `instructor` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `total_lectures` int(11) NOT NULL,
  `language` varchar(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `short_desc`, `description`, `thumbnail`, `video`, `duration`, `instructor`, `price`, `total_lectures`, `language`, `created_at`, `updated_at`) VALUES
(23, 'Full Stack Web Development with JavaScript (MERN)', 'Satisfied conveying a dependent contented he gentleman agreeable do be. Warrant private blushes removed an in equally totally if. Delivered dejection necessary objection do Mr prevailed. Mr feeling does chiefly cordial in do.\r\n										', 'Satisfied conveying a dependent contented he gentleman agreeable do be. Warrant private blushes removed an in equally totally if. Delivered dejection necessary objection do Mr prevailed. Mr feeling does chiefly cordial in do.\r\n                  ', '1735388850_676feeb28dfeb.jpg', 'https://www.youtube.com/embed/tXHviS-4ygo', '12h 30m', 1, '350', 27, 'Bangla', '2024-12-28 18:27:30', '2024-12-28 18:27:30'),
(24, 'Full Stack Web Development with Python, Django & React', 'Satisfied conveying a dependent contented he gentleman agreeable do be. Warrant private blushes removed an in equally totally if. Delivered dejection necessary objection do Mr prevailed. Mr feeling does chiefly cordial in do.\r\n										', 'Satisfied conveying a dependent contented he gentleman agreeable do be. Warrant private blushes removed an in equally totally if. Delivered dejection necessary objection do Mr prevailed. Mr feeling does chiefly cordial in do.\r\n                  ', '1735388915_676feef3786bf.jpg', 'https://www.youtube.com/embed/tXHviS-4ygo', '12h 30m', 1, '350', 27, 'Bangla', '2024-12-28 18:28:35', '2024-12-28 18:28:35'),
(25, 'WordPress Theme Development', 'Satisfied conveying a dependent contented he gentleman agreeable do be. Warrant private blushes removed an in equally totally if. Delivered dejection necessary objection do Mr prevailed. Mr feeling does chiefly cordial in do.\r\n										', 'Satisfied conveying a dependent contented he gentleman agreeable do be. Warrant private blushes removed an in equally totally if. Delivered dejection necessary objection do Mr prevailed. Mr feeling does chiefly cordial in do.\r\n                  ', '1735388990_676fef3e14a17.jpg', 'https://www.youtube.com/embed/tXHviS-4ygo', '12h 30m', 1, '350', 27, 'Bangla', '2024-12-28 18:29:50', '2024-12-28 18:29:50'),
(26, 'Full Stack Web Development with ASP.Net Core', 'Satisfied conveying a dependent contented he gentleman agreeable do be. Warrant private blushes removed an in equally totally if. Delivered dejection necessary objection do Mr prevailed. Mr feeling does chiefly cordial in do.\r\n										', 'Satisfied conveying a dependent contented he gentleman agreeable do be. Warrant private blushes removed an in equally totally if. Delivered dejection necessary objection do Mr prevailed. Mr feeling does chiefly cordial in do.\r\n                  ', '1735389046_676fef7655cfc.jpg', 'https://www.youtube.com/embed/tXHviS-4ygo', '12h 30m', 1, '350', 27, 'Bangla', '2024-12-28 18:30:46', '2024-12-28 18:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `tnx_id` varchar(255) NOT NULL,
  `status` enum('pending','success','cancel') NOT NULL DEFAULT 'pending',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `course_id`, `user_id`, `phone`, `tnx_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 23, 9, '01771867838', 'asareatrasfsde4', 'success', '2025-01-03 12:54:55', '2025-01-03 12:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `id` int(11) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`id`, `course_id`, `title`) VALUES
(36, 23, 'Intordction'),
(37, 24, 'Introduction'),
(38, 25, 'Introduction'),
(39, 25, 'Theme development'),
(40, 26, 'Introduction');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `lecture_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `price` enum('free','premium') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `lecture_id`, `course_id`, `title`, `video`, `duration`, `price`) VALUES
(3, 36, 23, 'First topic video', 'youtube.com/sdfkjsdkfj', '15h 30m', 'free'),
(4, 36, 23, 'Second', 'youtube.com/sdfkjsdkfj', '12h 30m', 'free'),
(5, 37, 24, 'First topic', 'youtube.com/sdfkjsdkfj', '15h 30m', 'free'),
(6, 38, 25, 'Introduction of wordparess', 'youtube.com/sdfkjsdkfj', '15h 30m', 'free'),
(7, 39, 25, 'Theme development', 'youtube.com/sdfkjsdkfj', '15h 30m', 'free'),
(8, 40, 26, 'First topic', 'youtube.com/sdfkjsdkfj', '15h 30m', 'free');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `role` enum('student','admin','instructor') NOT NULL DEFAULT 'student',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `first_name`, `last_name`, `phone`, `email`, `password`, `avatar`, `created_at`, `updated_at`) VALUES
(9, 'student', 'Anik', 'Dey', '01985458545', 'anik@gmail.com', '$2y$10$Cp3aLWumX7fyZ.x05ECWreqPWhNkEsKmaRV6mN3JgsBXt2AsKjRzi', 'avatar_67778f76e5a377.50808343.jpg', '2024-12-30 22:57:14', '2024-12-30 22:57:14'),
(10, 'admin', 'Dwip', 'Sarker', '01308676058', 'admin@gmail.com', '$2y$10$rpedTxsOKqxiIFtuHU4XEuJsMkzdYt0hIhYOHUuENGzY9EerMCo22', '1735886593_677787013aa6f.jpg', '2024-12-30 23:23:02', '2024-12-30 23:23:02'),
(11, 'student', 'Sufian', 'Ahmed', '01772456987', 'sufian@gmail.com', '$2y$10$86Mgu6XHFcB2ZuGacoCjbe/jZYmS7bo2mFyODa1A4OFWkVLc6YFt6', 'avatar_6777a00fdad195.11763298.jpg', '2025-01-03 14:29:40', '2025-01-03 14:29:40'),
(12, 'student', 'Abdul', 'Rokib', '01308676058', 'rokib@gmail.com', '$2y$10$GpdYw.jr2xvSte/1k1VDUO7aXHYTI6iC8SxphaGS41Qv4gkmmRuJm', '', '2025-01-03 19:39:53', '2025-01-03 19:39:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lecture_id` (`lecture_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lectures`
--
ALTER TABLE `lectures`
  ADD CONSTRAINT `fk_lectures_courses` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `fk_topics_lectures` FOREIGN KEY (`lecture_id`) REFERENCES `lectures` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
