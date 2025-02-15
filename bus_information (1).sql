-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2025 at 04:28 AM
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
-- Database: `bus_information`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_authentication`
--

CREATE TABLE `admin_authentication` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_authentication`
--

INSERT INTO `admin_authentication` (`id`, `email`, `password`) VALUES
(1, 'rai0987@gmail.com', 'rai0987');

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` int(11) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `starting_time` time NOT NULL,
  `dropping_time` time NOT NULL,
  `bus_image` varchar(255) NOT NULL,
  `route1` varchar(255) DEFAULT NULL,
  `route2` varchar(255) DEFAULT NULL,
  `route3` varchar(255) DEFAULT NULL,
  `route4` varchar(255) DEFAULT NULL,
  `route5` varchar(255) DEFAULT NULL,
  `route6` varchar(255) DEFAULT NULL,
  `route7` varchar(255) DEFAULT NULL,
  `route8` varchar(255) DEFAULT NULL,
  `route9` varchar(255) DEFAULT NULL,
  `route10` varchar(255) DEFAULT NULL,
  `route11` varchar(255) DEFAULT NULL,
  `route12` varchar(255) DEFAULT NULL,
  `route13` varchar(255) DEFAULT NULL,
  `route14` varchar(255) DEFAULT NULL,
  `route15` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `bus_name`, `starting_time`, `dropping_time`, `bus_image`, `route1`, `route2`, `route3`, `route4`, `route5`, `route6`, `route7`, `route8`, `route9`, `route10`, `route11`, `route12`, `route13`, `route14`, `route15`) VALUES
(2, 'GUPT\'S TRAVELS', '08:00:00', '12:00:00', 'uploads/images.jpeg', 'Ambikapur', 'Bishrampur', 'Katghora', 'Bilaspur', 'Raipur', '', '', '', '', '', '', '', '', '', ''),
(3, 'RAJSANS TRAVELS', '12:00:00', '06:00:00', 'uploads/images.jpeg', 'Ambikapur', 'Bilashpur ', 'Udaipur', 'Raipur  ', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'Rohit Rai', 'rohitrai0768@gmail.com', 'this is very nice\r\n', '2024-12-31 16:33:08'),
(2, 'Rohit Rai', 'rohitrai0768@gmail.com', 'send messwage', '2024-12-31 17:16:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_authentication`
--
ALTER TABLE `admin_authentication`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_authentication`
--
ALTER TABLE `admin_authentication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
