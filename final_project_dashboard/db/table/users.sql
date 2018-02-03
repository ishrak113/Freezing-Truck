-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2018 at 10:30 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `temp_view`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `user_name` text NOT NULL,
  `email` text NOT NULL,
  `user_pass` text NOT NULL,
  `user_hash` text NOT NULL,
  `status` text NOT NULL,
  `token` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `email`, `user_pass`, `user_hash`, `status`, `token`, `created_at`, `deleted_at`, `updated_at`) VALUES
(2, 'user2', 'ratul', 'karigor@techkarigar.com', '$2y$10$ODM0ZDMxZjExOWNkYTJiN.N2infn..DD2hDR3/fXNlprTX8WmraBW', '$2y$10$ODM0ZDMxZjExOWNkYTJiND', 'Prime', 0, '2017-06-01 12:30:09', '0000-00-00 00:00:00', '2017-06-09 11:49:11'),
(16, 'user3', 'Bisal', 'bisal@yahoo.com', '$2y$10$MDk4MzJjMzkxYzYwZWYyYu07nRy3gRZBnz2Gb/LPOzKpMKd7mGQYq', '$2y$10$MDk4MzJjMzkxYzYwZWYyY2', 'Super', 0, '2017-12-20 06:11:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
