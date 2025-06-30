-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2025 at 01:15 PM
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
-- Database: `kevi_motors`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
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

INSERT INTO `orders` (`orderID`, `order_date`, `email`, `item`, `cost`, `quantity`, `amount`) VALUES
(1, '2025-06-30', 'customer@yahoo.com', 'Tesla model C', 2100000, 4, 8400000),
(2, '2025-06-30', 'customer@yahoo.com', 'Tesla TRUCK', 10000000, 5, 50000000),
(5, '2025-06-30', 'user@example.com', 'han', 3100000, 3, 9300000),
(6, '2025-06-30', 'user@example.com', 'Tesla model Y', 2500000, 3, 7500000),
(7, '2025-06-30', 'user@example.com', 'Tesla model C', 2100000, 3, 6300000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(256) NOT NULL,
  `password` varchar(256) DEFAULT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `user_type`) VALUES
('customer@yahoo.com', '$2y$10$HFHgUktkwQSEeDMZc9MuqutRUIo95VRGHcVF92cZNy1QlA0kdLUEq', 'customer'),
('kevin@yahoo.com', '$2y$10$zxmQFBwCfw9p4jiKvgofw.XMxJkiecr9SHZrLk9CRR/vMkCrRJSPy', 'admin'),
('user@example.com', '$2y$10$W8//Tmrtao/TXyRqd9GS2.6JGWvo6/MgofiCyqbQ9.x0PiXU1tYnK', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
