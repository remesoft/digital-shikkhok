-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2024 at 02:15 PM
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
  `duration` varchar(255) NOT NULL,
  `instructor` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `short_desc`, `description`, `thumbnail`, `duration`, `instructor`, `price`, `created_at`, `updated_at`) VALUES
(5, 'First Course', 'this is my short description\r\n										', 'this is my long description\r\n                  ', '1735119850_676bd3ead6dd7.png', '12h 30m', 1, '$350', '2024-12-25 15:44:10', '2024-12-25 15:44:10'),
(6, 'The Complete Digital Marketing Course - 12 Courses in 1', 'Satisfied conveying a dependent contented he gentleman agreeable do be. Warrant private blushes removed an in equally totally if. Delivered dejection necessary objection do Mr prevailed. Mr feeling does chiefly cordial in do.\r\n										', 'Satisfied conveying a dependent contented he gentleman agreeable do be. Warrant private blushes removed an in equally totally if. Delivered dejection necessary objection do Mr prevailed. Mr feeling does chiefly cordial in do.\r\n                  ', '1735122789_676bdf656115a.png', '12h 30m', 1, '$350', '2024-12-25 16:33:09', '2024-12-25 16:33:09'),
(7, 'My Most Interesting Course', 'Satisfied conveying a dependent contented he gentleman agreeable do be. Warrant private blushes removed an in equally totally if. Delivered dejection necessary objection do Mr prevailed. Mr feeling does chiefly cordial in do.\r\n										', 'Satisfied conveying a dependent contented he gentleman agreeable do be. Warrant private blushes removed an in equally totally if. Delivered dejection necessary objection do Mr prevailed. Mr feeling does chiefly cordial in do.\r\n                  ', '1735122943_676bdfff21257.jpg', '12h 30m', 1, '$350', '2024-12-25 16:35:43', '2024-12-25 16:35:43'),
(8, 'How to hack a facebook account.', 'Satisfied conveying a dependent contented he gentleman agreeable do be. Warrant private blushes removed an in equally totally if. Delivered dejection necessary objection do Mr prevailed. Mr feeling does chiefly cordial in do.\r\n										', 'Satisfied conveying a dependent contented he gentleman agreeable do be. Warrant private blushes removed an in equally totally if. Delivered dejection necessary objection do Mr prevailed. Mr feeling does chiefly cordial in do.\r\nSatisfied conveying a dependent contented he gentleman agreeable do be. Warrant private blushes removed an in equally totally if. Delivered dejection necessary objection do Mr prevailed. Mr feeling does chiefly cordial in do.\r\n                  ', '1735129266_676bf8b250549.jpg', '20h 30m', 1, '$350', '2024-12-25 18:21:06', '2024-12-25 18:21:06');

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
(7, 5, 'First Lecture'),
(8, 5, 'New Leacture'),
(9, 6, 'sadfsdafsdaf'),
(10, 7, 'sdfsfsd'),
(11, 8, 'Introduction'),
(12, 8, 'How to hack your girlfriend facebook account.');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `lecture_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `lecture_id`, `title`, `video`) VALUES
(1, 7, 'first topic', 'first video link'),
(2, 7, 'second video', 'second video link'),
(3, 8, 'New leacture', 'New video link'),
(4, 9, 'sadfsdf', 'asdfdsfasf'),
(5, 10, 'sdfsf', 'sfsdfsdf'),
(6, 11, 'How to create a facebook account', 'https://youtube.com/slkdfjsdlkjf'),
(7, 12, 'You can\'t hack.', 'youtuldskfjsd/sdfjskdlf');

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
(4, 2, 'Anik', 'Dey', '12345678', 'admin1@gmail.com', '$2y$10$MLzo7/QV/0xJZLyvinBureiGiLwIaEb0jTbJD3yhoeldnNucr./zi', '', '2024-12-25 16:26:26', '2024-12-25 16:26:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
