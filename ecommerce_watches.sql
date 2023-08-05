-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 08:10 PM
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
(1, 'Parin', 'Chaudhari', 'parinchaudhari318@gmail.com', '$2y$10$BeXjSTsIqtnfUp6PxV1QC.oN/.DV4kvOO7/5vqOS7QzSGcfTgpFCW', '103 West Street', 'ontario', 'Brantford', 'N3T3E9', '2023-07-28 13:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `srno` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_desc` varchar(400) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_rating` int(11) NOT NULL,
  `product_src` varchar(150) NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`srno`, `product_name`, `product_desc`, `product_price`, `product_rating`, `product_src`, `date_updated`) VALUES
(1, 'ChronoMaster X', 'The ChronoMaster X embodies precision and elegance. With its Swiss-made automatic movement, sapphire crystal, and stainless steel case, this watch offers impeccable timekeeping and durability. The striking blue dial and leather strap complete the timeless design, making it a must-have for watch enthusiasts.', 2500, 4, 'img/hunter.jpg', '2023-07-27 14:17:12'),
(2, 'Luminox NightGuard', 'The Luminox NightGuard is the ultimate companion for nocturnal adventures. Its luminescent hands and markers ensure easy reading in low light conditions, while the robust carbon reinforced case guarantees resilience in rugged environments. From late-night hikes to underwater escapades, the NightGuard keeps you on time and in style.', 2000, 5, 'img/predecons.jpg', '2023-07-27 14:17:44'),
(3, 'MarineMaster Diver Pro', ' Dive into the depths with the MarineMaster Diver Pro. Engineered for professional underwater exploration, this diver\'s watch boasts a helium escape valve, unidirectional rotating bezel, and water resistance up to 1000 meters. Its orange accents and stainless steel bracelet make a bold statement, whether on land or beneath the waves.', 2800, 4, 'img/seriesx.jpg', '2023-07-27 14:18:18'),
(4, 'EcoDrive Solaris', 'Embrace eco-conscious elegance with the EcoDrive Solaris. Powered by natural sunlight and artificial light, this solar-powered watch never needs a battery replacement. The minimalist design, scratch-resistant sapphire crystal, and eco-friendly materials make it a perfect blend of style and sustainability.', 3000, 3, 'img/prem4.jpg', '2023-07-27 14:18:32'),
(5, 'Skyline Aviator', 'Take flight with the Skyline Aviator. Inspired by classic pilot watches, this timepiece features a large, easy-to-read dial, slide rule bezel, and a durable stainless steel case. Whether soaring through the clouds or attending a business meeting, the Skyline Aviator exudes sophistication and functionality.', 10000, 5, 'img/seriesb.jpg', '2023-08-05 13:12:48'),
(6, 'Heritage Retrograde', 'The Heritage Retrograde pays homage to vintage watchmaking with a modern twist. The retrograde day and date complications add a touch of uniqueness to its classic design. Crafted with a genuine leather strap and stainless steel case, this watch combines nostalgia with contemporary style.', 5000, 3, 'img/seriesa.jpg', '2023-08-05 13:13:28'),
(7, 'Galactic Explorer', 'Embark on an interstellar journey with the Galactic Explorer. The celestial-inspired dial features a moon phase indicator and starry night motif, while the stainless steel bracelet provides comfort and durability. Whether you\'re a dreamer or an astronomer, this watch will ignite your sense of wonder.', 3300, 5, 'img/seriess.jpg', '2023-08-05 13:14:10'),
(8, 'SportsTech Pro', 'For the active lifestyle, the SportsTech Pro is the perfect companion. Packed with fitness tracking features, such as heart rate monitoring, GPS, and step counter, this smartwatch keeps you informed about your health and performance. Its sleek design and interchangeable straps make it suitable for any occasion.', 1000, 4, 'img/prem3.jpg', '2023-08-05 13:14:40'),
(9, 'Artisan Engraved Limited', 'Experience the masterpiece of horological craftsmanship with the Artisan Engraved Limited edition. Each watch is individually engraved by skilled artisans, creating a unique work of art on the stainless steel case. This collectible timepiece is a testament to precision and artistry.', 2520, 2, 'img/predaror.jpg', '2023-08-05 13:15:16'),
(10, 'Moonstruck Voyager', 'Embrace the mystique of the Moonstruck Voyager. With its moon phase display and celestial-themed dial, this watch captures the beauty of the night sky. The rose gold accents and alligator leather strap add a touch of luxury, making it a celestial companion for any formal occasion.', 1200, 4, 'img/2.jpg', '2023-08-05 13:15:48'),
(11, 'Stealth Pro-X', ' Unleash your inner adventurer with the Stealth Pro-X. Designed for extreme conditions, this tactical watch features a blacked-out dial for low visibility operations and a durable titanium case for rugged durability. With its precise chronograph and water resistance up to 200 meters, the Stealth Pro-X is ready to conquer any mission.', 4000, 5, 'img/prem2.jpg', '2023-08-05 13:22:51'),
(12, 'Sapphire Elegance', 'Elevate your style with the Sapphire Elegance watch. Its exquisite sapphire crystal, known for its exceptional hardness and clarity, protects the dial from scratches while revealing the intricate details underneath. The stainless steel case and bracelet, coupled with the timeless design, make it a symbol of enduring beauty.', 2000, 3, 'img/maxresdefault.jpg', '2023-08-05 13:23:25');

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
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
