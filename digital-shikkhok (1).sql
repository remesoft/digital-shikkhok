-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2024 at 12:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
