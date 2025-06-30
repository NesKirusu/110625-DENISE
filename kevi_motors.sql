-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2025 at 04:25 AM
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
-- Database: `kevi_motors`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_date` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `cost` int(10) DEFAULT NULL,
  `quantity` int(5) DEFAULT NULL,
  `amount` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_date`, `email`, `item`, `cost`, `quantity`, `amount`) VALUES
('0000-00-00', 'user@example.com', '0', 10000000, 2, 20000000),
('0000-00-00', 'user@example.com', '                                    Tesla model C                                     ', 2100000, 3, 6300000),
('0000-00-00', 'user@example.com', '                                    Tesla model C                                     ', 2100000, 3, 6300000),
('0000-00-00', 'user@example.com', '                                    Tesla model X                                     ', 2000000, 1, 2000000),
('0000-00-00', 'user@example.com', '                                    Tesla model C                                     ', 2100000, 1, 2100000),
('0000-00-00', 'user@example.com', '                                    Tesla model Y                                     ', 2500000, 1, 2500000),
('0000-00-00', 'user@example.com', '                                    Tesla model X                                     ', 2000000, 1, 2000000),
('0000-00-00', 'user@example.com', 'Tesla model C', 2100000, 2, 4200000),
('0000-00-00', 'user@example.com', 'Tesla model Y', 2500000, 2, 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`) VALUES
('user@example.com', 'securepassword123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
