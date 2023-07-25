-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 11:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_watches`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers_details`
--

CREATE TABLE `customers_details` (
  `srno` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `street` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zipcode` varchar(8) NOT NULL,
  `date_entered` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers_details`
--

INSERT INTO `customers_details` (`srno`, `first_name`, `last_name`, `email`, `password`, `street`, `province`, `city`, `zipcode`, `date_entered`) VALUES
(1, 'Parin', 'Chaudhari', 'parinchaudhari318@gmail.com', '$2y$10$jvf4r4phhwkR0.5ixia3zOYadkkPnFMAFwgdUkZn2FSmeh475V80y', '103', 'quebec', 'Brantford', 'N3T3E9', '2023-07-25 13:24:48'),
(2, 'Simran', 'Abhilashi', 'parincha@gmail.com', '$2y$10$lIwjVZhfaD1lIqx7LhTnJ.yxw8HFPQ91qX/IdHve.Y3ffscnZTNHS', '103 West Street', 'ontario', 'Brantford', 'N3T3E9', '2023-07-25 17:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `srno` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_desc` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_rating` int(11) NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers_details`
--
ALTER TABLE `customers_details`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`srno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers_details`
--
ALTER TABLE `customers_details`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
