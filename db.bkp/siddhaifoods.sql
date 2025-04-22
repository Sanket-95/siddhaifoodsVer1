-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2025 at 12:58 PM
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
-- Database: `siddhaifoods`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Buiscuit'),
(2, 'Oil'),
(3, 'Soap'),
(4, 'pickle'),
(5, 'Farsan');

-- --------------------------------------------------------

--
-- Table structure for table `featured_products`
--

CREATE TABLE `featured_products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `featured_products`
--

INSERT INTO `featured_products` (`id`, `category_id`, `product_name`, `img_path`) VALUES
(1, 1, 'Featured Product 7', 'img7.jpeg'),
(2, 2, 'Featured Product 10', 'img10.jpeg'),
(3, 3, 'Featured Product 11', 'img11.jpeg'),
(4, 3, 'Featured Product 21', 'img21.jpeg'),
(5, 3, 'Featured Product 24', 'img24.jpeg'),
(6, 4, 'Featured Product 27', 'img27.jpeg'),
(7, 4, 'Featured Product 28', 'img28.jpeg'),
(8, 5, 'Featured Product 38', 'img38.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `mrp` decimal(10,0) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `mrp`, `image`, `description`) VALUES
(75, 1, 'Product 1', 101.00, 0, 'img1.jpeg', 'Description for Product 1'),
(76, 1, 'Product 2', 102.00, 0, 'img2.jpeg', 'Description for Product 2'),
(77, 1, 'Product 3', 103.00, 0, 'img3.jpeg', 'Description for Product 3'),
(78, 1, 'Product 4', 104.00, 0, 'img4.jpeg', 'Description for Product 4'),
(79, 1, 'Product 5', 105.00, 0, 'img5.jpeg', 'Description for Product 5'),
(80, 1, 'Product 6', 106.00, 0, 'img6.jpeg', 'Description for Product 6'),
(81, 1, 'Product 7', 107.00, 0, 'img7.jpeg', 'Description for Product 7'),
(82, 1, 'Product 8', 108.00, 0, 'img8.jpeg', 'Description for Product 8'),
(83, 2, 'Product 9', 109.00, 0, 'img9.jpeg', 'Description for Product 9'),
(84, 2, 'Product 10', 110.00, 0, 'img10.jpeg', 'Description for Product 10'),
(85, 2, 'Product 11', 111.00, 0, 'img11.jpeg', 'Description for Product 11'),
(86, 2, 'Product 12', 112.00, 0, 'img12.jpeg', 'Description for Product 12'),
(87, 2, 'Product 13', 113.00, 0, 'img13.jpeg', 'Description for Product 13'),
(88, 2, 'Product 14', 114.00, 0, 'img14.jpeg', 'Description for Product 14'),
(89, 2, 'Product 15', 115.00, 0, 'img15.jpeg', 'Description for Product 15'),
(90, 2, 'Product 16', 116.00, 0, 'img16.jpeg', 'Description for Product 16'),
(91, 3, 'Product 17', 117.00, 0, 'img17.jpeg', 'Description for Product 17'),
(92, 3, 'Product 18', 118.00, 0, 'img18.jpeg', 'Description for Product 18'),
(93, 3, 'Product 19', 119.00, 0, 'img19.jpeg', 'Description for Product 19'),
(94, 3, 'Product 20', 120.00, 0, 'img20.jpeg', 'Description for Product 20'),
(95, 3, 'Product 21', 121.00, 0, 'img21.jpeg', 'Description for Product 21'),
(96, 3, 'Product 22', 122.00, 0, 'img22.jpeg', 'Description for Product 22'),
(97, 3, 'Product 23', 123.00, 0, 'img23.jpeg', 'Description for Product 23'),
(98, 3, 'Product 24', 124.00, 0, 'img24.jpeg', 'Description for Product 24'),
(99, 4, 'Product 25', 112.75, 0, 'img25.jpeg', 'Description for Product 25'),
(100, 4, 'Product 26', 384.20, 0, 'img26.jpeg', 'Description for Product 26'),
(101, 4, 'Product 27', 59.99, 0, 'img27.jpeg', 'Description for Product 27'),
(102, 4, 'Product 28', 423.50, 0, 'img28.jpeg', 'Description for Product 28'),
(103, 4, 'Product 29', 299.00, 0, 'img29.jpeg', 'Description for Product 29'),
(104, 4, 'Product 30', 197.45, 0, 'img30.jpeg', 'Description for Product 30'),
(105, 4, 'Product 31', 88.10, 0, 'img31.jpeg', 'Description for Product 31'),
(106, 4, 'Product 32', 450.25, 0, 'img32.jpeg', 'Description for Product 32'),
(107, 4, 'Product 33', 342.80, 0, 'img33.jpeg', 'Description for Product 33'),
(108, 4, 'Product 34', 278.95, 0, 'img34.jpeg', 'Description for Product 34'),
(109, 4, 'Product 35', 132.60, 0, 'img35.jpeg', 'Description for Product 35'),
(119, 5, 'Product 36', 327.00, 0, 'img36.jpeg', 'Description for Product 36'),
(120, 5, 'Product 37', 249.00, 0, 'img37.jpeg', 'Description for Product 37'),
(121, 5, 'Product 38', 165.00, 0, 'img38.jpeg', 'Description for Product 38'),
(122, 5, 'Product 39', 378.00, 0, 'img39.jpeg', 'Description for Product 39'),
(123, 5, 'Product 40', 494.00, 0, 'img40.jpeg', 'Description for Product 40'),
(124, 5, 'Product 41', 435.00, 0, 'img41.jpeg', 'Description for Product 41'),
(125, 5, 'Product 42', 191.00, 0, 'img42.jpeg', 'Description for Product 42'),
(126, 5, 'Product 43', 352.00, 0, 'img43.jpeg', 'Description for Product 43'),
(127, 5, 'Product 44', 289.00, 0, 'img44.jpeg', 'Description for Product 44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured_products`
--
ALTER TABLE `featured_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `featured_products`
--
ALTER TABLE `featured_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
