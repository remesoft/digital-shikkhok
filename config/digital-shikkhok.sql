-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2024 at 06:11 AM
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
(1, 23, 7, '01771868382', 'sdjflkjsdlkfj', 'pending', '2024-12-30 09:15:36', '2024-12-30 09:15:36'),
(2, 24, 7, '01771868382', 'sdfsdsdf', 'pending', '2024-12-30 09:45:12', '2024-12-30 09:45:12'),
(3, 26, 7, '01578623545', 'sdfsdgewrewr', 'pending', '2024-12-30 09:45:34', '2024-12-30 09:45:34');

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
  `role` int(255) NOT NULL DEFAULT 1,
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
(1, 1, 'anik', 'dey', '2324234', 'admin@gmail.com', '$2y$10$.IntuhYgsqFLpwcucwwa/utxuTX.2kfw/IukW.GugoiT2bZI/0iMa', '', '2024-12-24 22:04:18', '2024-12-24 22:04:18'),
(2, 1, 'sdfdsf', 'sdfds', '343432', 'admin2@gmail.com', '$2y$10$ZgeShc89Hb7Tjz6i04lJke01p9mdCS6jWoiZfH.JCA/mafb6hakAm', '', '2024-12-24 22:39:25', '2024-12-24 22:39:25'),
(3, 1, 'Dwip', 'Sarker', '23432423', 'dwipsarker@gmail.com', '$2y$10$ehiZWJVEqUEv4Fi9vMBW/OxqgiQ2iWhbBYI.QzOX9KmmxOxofHTfC', '', '2024-12-25 12:04:27', '2024-12-25 12:04:27'),
(4, 2, 'Anik', 'Dey', '12345678', 'admin1@gmail.com', '$2y$10$MLzo7/QV/0xJZLyvinBureiGiLwIaEb0jTbJD3yhoeldnNucr./zi', '', '2024-12-25 16:26:26', '2024-12-25 16:26:26'),
(5, 1, 'Dwip', 'Sarker', '01771868382', 'email.dwip@gmail.com', '$2y$10$Qu/0ClDCk35swhWIh4Zznebfk40DWOvKq6i8cWEshss.cMeAVLocG', '', '2024-12-27 12:25:30', '2024-12-27 12:25:30'),
(6, 1, 'Dwip', 'Sarker', '01771868382', 'hello@gmail.com', '$2y$10$s0r6HDOZKFA..2VEmuvmWe5UEdA07PbD3I51NzZrmzXeCgoDECMJu', '', '2024-12-28 19:11:56', '2024-12-28 19:11:56'),
(7, 1, 'Dwip', 'Sarker', '0177186852241', 'exist@gmail.com', '$2y$10$bXSYSSzUjQNwkyUY5BSJ4eBf8D8aNFKVeeTwhdzHPNnjgUaBhikLi', '', '2024-12-30 09:13:19', '2024-12-30 09:13:19');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
