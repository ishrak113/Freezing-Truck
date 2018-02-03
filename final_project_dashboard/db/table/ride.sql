-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2018 at 07:02 AM
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
-- Table structure for table `ride`
--

CREATE TABLE `ride` (
  `id` int(11) NOT NULL,
  `ride_id` text NOT NULL,
  `car_id` text NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `ride_to` text NOT NULL,
  `ride_from` text NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ride`
--

INSERT INTO `ride` (`id`, `ride_id`, `car_id`, `name`, `phone`, `ride_to`, `ride_from`, `created_at`, `deleted_at`) VALUES
(1, 'ride1', 'car2', 'Anisul', '01670733370', 'Pabna', 'Dhaka', '2018-01-24 06:28:43', '0000-00-00 00:00:00'),
(2, 'ride2', 'car1', 'Jamil', '09876543456', 'Dhaka', 'Comilla', '2018-01-24 06:36:28', '0000-00-00 00:00:00'),
(3, 'ride3', 'car3', 'Israk', '433333333', 'Pabna', 'Dhaka', '2018-01-28 11:31:33', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ride`
--
ALTER TABLE `ride`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ride`
--
ALTER TABLE `ride`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
