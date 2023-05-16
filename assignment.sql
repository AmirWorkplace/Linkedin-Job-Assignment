-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 16, 2023 at 10:44 AM
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
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  `created_at` text NOT NULL,
  `updated_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `profile_img`, `created_at`, `updated_at`) VALUES
(20, 10, 'uploads/images/64632ead0a282500198a121d231b6.jpg', '2023-05-16T07:14:59Z', '2023-05-16T07:20:13Z'),
(21, 12, 'uploads/images/64633fde103fdcbc5512f321d6005.jpg', '2023-05-16T08:33:34Z', '2023-05-16T08:33:34Z');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` text NOT NULL,
  `updated_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(10, 'Amir Ali', 'sywmohammadamir@gmail.com', '$2y$10$77Q5hvBlxXBFNh604d8Y7OoHMWYr/fKDeJlKnRNNG70Oetx2wdrPK', 'user', '2023-05-16T07:08:28Z', '2023-05-16T07:08:28Z'),
(12, 'Abdul Koddus Ali', 'abdulkuddusali@gmail.com', '$2y$10$6xGo3dbeWRg6iPLdIsUFMOh/ONpRhOQq/7oPfa8jwSL/UPAJvSqfy', 'user', '2023-05-16T08:32:55Z', '2023-05-16T08:34:00Z'),
(13, 'Amir Ali', 'amirralli300400@gmail.com', '$2y$10$VUeFdLO3Ri34EnYq2.3Mh.Eyky/vHkc9szc5e.5mjp6.ejbYI1X0O', 'user', '2023-05-16T08:44:17Z', '2023-05-16T08:44:17Z');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
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
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
