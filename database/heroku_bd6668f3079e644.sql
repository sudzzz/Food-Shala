-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: eu-cdbr-west-01.cleardb.com
-- Generation Time: May 20, 2021 at 09:45 AM
-- Server version: 5.6.50-log
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heroku_bd6668f3079e644`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL DEFAULT '1',
  `total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `food_name` varchar(150) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(20) NOT NULL,
  `restaurant_name` varchar(150) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `restaurant_address` varchar(150) NOT NULL,
  `customer_address` varchar(150) NOT NULL,
  `order_time` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `rid`, `cid`, `food_name`, `quantity`, `price`, `restaurant_name`, `customer_name`, `restaurant_address`, `customer_address`, `order_time`, `status`) VALUES
(145, 45, 5, 'Paneer Roll', 2, 100, 'Food King', 'Sudhir Daga', 'Rishra', '179, Bangur park', '2021-05-20 08:30:38', 1),
(155, 45, 5, 'Egg Roll', 4, 160, 'Food King', 'Sudhir Daga', 'Rishra', '179, Bangur park', '2021-05-20 08:30:38', 1),
(165, 45, 5, 'Chicken Roll', 2, 120, 'Food King', 'Sudhir Daga', 'Rishra', '179, Bangur park', '2021-05-20 08:30:38', 1),
(175, 75, 5, 'Chocolate Pastry', 3, 150, 'Monginis', 'Sudhir Daga', 'Rishra', '179, Bangur park', '2021-05-20 09:09:25', 1),
(185, 55, 5, 'Paneer Butter Masala', 1, 300, 'Subham Food Corner', 'Sudhir Daga', 'Rishra', '179, Bangur park', '2021-05-20 12:46:26', 1),
(195, 55, 5, 'Malai Kofta', 1, 200, 'Subham Food Corner', 'Sudhir Daga', 'Rishra', '179, Bangur park', '2021-05-20 12:46:26', 1),
(205, 55, 5, 'Malai Kofta', 2, 400, 'Subham Food Corner', 'Sudhir Daga', 'Rishra', '179, Bangur park', '2021-05-20 13:00:00', 1),
(215, 55, 5, 'Dal Makhani', 1, 200, 'Subham Food Corner', 'Sudhir Daga', 'Rishra', '179, Bangur park', '2021-05-20 13:00:00', 1),
(225, 65, 5, 'Papri Chat', 5, 200, 'Santosh Food', 'Sudhir Daga', 'Rishra', '179, Bangur park', '2021-05-20 13:04:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer-register`
--

CREATE TABLE `customer-register` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer-register`
--

INSERT INTO `customer-register` (`id`, `name`, `address`, `phone`, `email`, `password`) VALUES
(5, 'Sudhir Daga', '179, Bangur park', 8335940590, 'sudhirdaga1998@gmail.com', '12345'),
(15, 'Divya Daga', 'Bangur Park, Rishra', 9876541230, 'divya@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `restaurant` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` int(10) NOT NULL,
  `type` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `rid`, `restaurant`, `email`, `food`, `price`, `type`) VALUES
(45, 45, 'Food King', 'foodking@gmail.com', 'Veg Roll', 25, 'Veg'),
(55, 45, 'Food King', 'foodking@gmail.com', 'Paneer Roll', 50, 'Veg'),
(65, 45, 'Food King', 'foodking@gmail.com', 'Egg Roll', 40, 'Non-Veg'),
(75, 45, 'Food King', 'foodking@gmail.com', 'Chicken Roll', 60, 'Non-Veg'),
(85, 55, 'Subham Food Corner', 'subham@gmail.com', 'Malai Kofta', 200, 'Veg'),
(95, 55, 'Subham Food Corner', 'subham@gmail.com', 'Paneer Butter Masala', 300, 'Veg'),
(105, 55, 'Subham Food Corner', 'subham@gmail.com', 'Chicken Lolipop', 450, 'Non-Veg'),
(115, 55, 'Subham Food Corner', 'subham@gmail.com', 'Chicken Tikka', 400, 'Non-Veg'),
(125, 55, 'Subham Food Corner', 'subham@gmail.com', 'Dal Makhani', 200, 'Veg'),
(135, 55, 'Subham Food Corner', 'subham@gmail.com', 'Naan', 10, 'Veg'),
(145, 55, 'Subham Food Corner', 'subham@gmail.com', 'Garlic Naan', 20, 'Veg'),
(155, 65, 'Santosh Food', 'santosh@gmail.com', 'Jhal Muri', 25, 'Veg'),
(165, 65, 'Santosh Food', 'santosh@gmail.com', 'Papri Chat', 40, 'Veg'),
(175, 65, 'Santosh Food', 'santosh@gmail.com', 'Pani Puri', 30, 'Veg'),
(185, 65, 'Santosh Food', 'santosh@gmail.com', 'Dahi Puchka', 45, 'Veg'),
(195, 65, 'Santosh Food', 'santosh@gmail.com', 'Nimki Chat', 20, 'Veg'),
(205, 75, 'Monginis', 'monginis@gmail.com', 'Chocolate Pastry', 50, 'Veg'),
(215, 75, 'Monginis', 'monginis@gmail.com', 'Red Velvet Pastry', 50, 'Non-Veg'),
(245, 75, 'Monginis', 'monginis@gmail.com', 'Black Forest Pastry', 55, 'Non-Veg');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant-register`
--

CREATE TABLE `restaurant-register` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant-register`
--

INSERT INTO `restaurant-register` (`id`, `name`, `address`, `phone`, `email`, `password`) VALUES
(45, 'Food King', 'Rishra', 9876543210, 'foodking@gmail.com', '12345'),
(55, 'Subham Food Corner', 'Rishra', 9876543210, 'subham@gmail.com', '12345'),
(65, 'Santosh Food', 'Rishra', 9876543210, 'santosh@gmail.com', '12345'),
(75, 'Monginis', 'Rishra', 9874563210, 'monginis@gmail.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key1` (`cid`),
  ADD KEY `key2` (`rid`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer-register`
--
ALTER TABLE `customer-register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key` (`rid`);

--
-- Indexes for table `restaurant-register`
--
ALTER TABLE `restaurant-register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `customer-register`
--
ALTER TABLE `customer-register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `restaurant-register`
--
ALTER TABLE `restaurant-register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `key1` FOREIGN KEY (`cid`) REFERENCES `customer-register` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `key2` FOREIGN KEY (`rid`) REFERENCES `restaurant-register` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `key` FOREIGN KEY (`rid`) REFERENCES `restaurant-register` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
