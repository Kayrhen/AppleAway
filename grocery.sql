-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 01, 2018 at 05:38 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery`
--

-- --------------------------------------------------------

--
-- Table structure for table `groceryorder`
--

CREATE TABLE `groceryorder` (
  `Product_id` int(10) UNSIGNED NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `User_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groceryorder`
--

INSERT INTO `groceryorder` (`Product_id`, `Quantity`, `User_id`) VALUES
(1, 1, 3),
(4, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_id` int(10) UNSIGNED NOT NULL,
  `Product_name` varchar(128) DEFAULT NULL,
  `Unit_price` int(11) DEFAULT NULL,
  `Image` varchar(128) DEFAULT NULL,
  `FoodGroup` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_id`, `Product_name`, `Unit_price`, `Image`, `FoodGroup`) VALUES
(1, 'Apple', 2, 'http://images.all-free-download.com/images/graphiclarge/fresh_red_apple_stock_photo_167147.jpg', 1),
(2, 'Banana', 2, 'http://images.all-free-download.com/images/graphiclarge/fresh_banana_picture_167146.jpg', 1),
(3, 'Kiwi', 1, 'http://images.all-free-download.com/images/graphiclarge/kiwi_fruit_kiwi_fruit_221884.jpg', 1),
(4, 'Cabbage', 2, 'https://thumbs.dreamstime.com/z/cabbage-head-2639708.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(128) DEFAULT NULL,
  `Email` varchar(128) DEFAULT NULL,
  `Password` varchar(128) DEFAULT NULL,
  `Address` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `Name`, `Email`, `Password`, `Address`) VALUES
(2, 'Karen', 'karen.ding@yahoo.com', 'sarc', '21 Springs'),
(3, 'Ryan Ding', 'ryanding@yahoo.com', '123', '10010 SPRING SHADOWS PARK CIR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groceryorder`
--
ALTER TABLE `groceryorder`
  ADD PRIMARY KEY (`Product_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_id`),
  ADD KEY `Product_name` (`Product_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`),
  ADD KEY `Name` (`Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groceryorder`
--
ALTER TABLE `groceryorder`
  MODIFY `User_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `groceryorder`
--
ALTER TABLE `groceryorder`
  ADD CONSTRAINT `groceryorder_ibfk_1` FOREIGN KEY (`Product_id`) REFERENCES `product` (`Product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `groceryorder_ibfk_2` FOREIGN KEY (`User_id`) REFERENCES `users` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
