-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 17, 2018 at 11:22 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `datejoin` date NOT NULL,
  `phone` int(12) NOT NULL,
  `admin` enum('admin','user') NOT NULL,
  `name` longtext NOT NULL,
  `type` varchar(10) NOT NULL,
  `payid` varchar(20) NOT NULL,
  `notifid` varchar(20) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `orderid` (`payid`),
  UNIQUE KEY `notifid` (`notifid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userid`, `username`, `password`, `fname`, `lname`, `email`, `datejoin`, `phone`, `admin`, `name`, `type`, `payid`, `notifid`) VALUES
(9, 'test', '1234', 'Joshua', 'Tan', 'abc@gmail.coom', '2018-10-09', 1234, 'admin', '5bc4129b336263.54315719.jpg', 'image/jpeg', 'test', 'test'),
(10, 'user', '1234', 'user', 'user', 'asdas@gmail.com', '2018-11-07', 1231, 'user', '5be52a26a530c3.13043359.jpg', 'image/jpeg', 'user', 'user'),
(11, 'test1', '1234', 'asda', 'a', 'asdas@gmail.com', '2018-11-08', 1234, 'user', 'default.png', 'image/jpeg', 'test1', 'test1'),
(12, 'Guest', '123456789', 'Guest', 'Guest', 'Guest@gmail.com', '2018-11-09', 123456789, 'user', 'default.png', 'image/jpeg', 'Guest', 'Guest');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `notifid` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `notifid` (`notifid`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `title`, `content`, `date`, `notifid`) VALUES
(27, 'Order ID:85 has been sent out', 'Post code : z Item will be arrived for 2 to 4 days', '2018-11-15 17:32:02', 'test'),
(28, 'Order ID:86 has been sent out', 'Post code : z Item will be arrived for 2 to 4 days', '2018-11-15 17:32:30', 'test'),
(29, 'Order ID:87 has been sent out', 'Post code : z Item will be arrived for 2 to 4 days', '2018-11-15 17:50:50', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payid` varchar(20) NOT NULL,
  `method` text NOT NULL,
  `date` datetime NOT NULL,
  `total` double NOT NULL,
  `code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `payid` (`payid`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `payid`, `method`, `date`, `total`, `code`) VALUES
(57, 'test', 'Debit Card', '2018-11-15 17:27:45', 40.0256, ''),
(58, 'test', 'Debit Card', '2018-11-15 17:36:08', 105.9894, ''),
(59, 'user', 'Debit Card', '2018-11-15 17:36:25', 105.9894, ''),
(60, 'user', 'Debit Card', '2018-11-15 17:57:10', 117.2784, '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `categories` text NOT NULL,
  `image` text NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `code`, `categories`, `image`, `price`) VALUES
(4, 'V Mask package', 'VM1p4', 'Mask', 'img/product-images/428758963.g_400-w_g.jpg', 72.88),
(5, 'Pore Mask', 'P1O1RE', 'Mask', 'img/product-images/495693842_00.g_400-w-st_g.jpg', 18.88),
(6, 'Whitening Mask', 'WH1it1n1', 'Mask', 'img/product-images/495693842_01.g_400-w-st_g.jpg', 18.88),
(7, 'Moisturizing Mask', 'MO1ist', 'Mask', 'img/product-images/495693842_02.g_400-w-st_g.jpg', 18.88),
(8, 'Wrinkle Mask', 'WR1nk2', 'Mask', 'img/product-images/495693842_03.g_400-w-st_g.jpg', 18.88),
(9, 'GOLD FOIL Mask', 'G1ol3d', 'gold mask', 'img/product-images/GOLD_FOIL.jpg', 48.88),
(10, 'Collagen 10packs', 'coll23ag', 'packages', 'img/product-images/Collagen10pack.jpg', 180.88),
(11, 'Moisturizing 10packages', 'Mo1s3tuz', 'packages', 'img/product-images/Moisturizing10pack.jpg', 180.88),
(12, 'Pore 10packages', 'P03re', 'packages', 'img/product-images/Pore10pack.jpg', 180.88),
(13, 'Suppression 10packages', 'Sup3re1s10', 'packages', 'img/product-images/Suppression10pack.jpg', 180.88);

-- --------------------------------------------------------

--
-- Table structure for table `productorder`
--

DROP TABLE IF EXISTS `productorder`;
CREATE TABLE IF NOT EXISTS `productorder` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `payid` int(255) NOT NULL,
  `productid` int(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `delivery` enum('progress','sent') NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `postcode` int(11) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `productid` (`productid`),
  KEY `payid` (`payid`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productorder`
--

INSERT INTO `productorder` (`id`, `payid`, `productid`, `quantity`, `date`, `delivery`, `address`, `city`, `state`, `postcode`, `contact`, `email`) VALUES
(85, 57, 6, 1, '2018-11-15 17:27:45', 'progress', 'jalan venoshd', 'venoshd', 'venoshd', 6969, 1234, 'abc@gmail.coom'),
(86, 57, 5, 1, '2018-11-15 17:27:45', 'progress', 'jalan venoshd', 'venoshd', 'venoshd', 6969, 1234, 'abc@gmail.coom'),
(87, 58, 14, 1, '2018-11-15 17:36:08', 'progress', 'jalan venoshd', 'venoshd', 'venoshd', 6969, 1234, 'abc@gmail.coom'),
(88, 59, 14, 1, '2018-11-15 17:36:25', 'progress', 'aasdas', 'asdas', 'sadas', 123, 1231, 'asdas@gmail.com'),
(89, 60, 6, 1, '2018-11-15 17:57:10', 'progress', 'aasdas', 'asdas', 'sadas', 123, 1231, 'asdas@gmail.com'),
(90, 60, 5, 1, '2018-11-15 17:57:10', 'progress', 'aasdas', 'asdas', 'sadas', 123, 1231, 'asdas@gmail.com'),
(91, 60, 4, 1, '2018-11-15 17:57:10', 'progress', 'aasdas', 'asdas', 'sadas', 123, 1231, 'asdas@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `promocode`
--

DROP TABLE IF EXISTS `promocode`;
CREATE TABLE IF NOT EXISTS `promocode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL,
  `used` enum('valid','invalid') NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promocode`
--

INSERT INTO `promocode` (`id`, `code`, `discount`, `used`, `date`) VALUES
(1, '1234', 30, 'invalid', '2018-02-02'),
(3, 'GD682', 30, 'valid', '2018-11-08'),
(6, '1', 1, 'invalid', '2018-11-08'),
(7, '7O8cD4', 30, 'invalid', '2018-11-08'),
(8, 'nme46u', 20, 'valid', '2018-11-08'),
(9, 'OUYAiG', 20, 'valid', '2018-11-08'),
(10, '6dI', 20, 'valid', '2018-11-08'),
(11, '4tjRYS47wD', 20, 'valid', '2018-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `code`, `stock`) VALUES
(1, 'VM1p4', 25),
(2, 'P1O1RE', 13),
(3, 'WH1it1n1', 15),
(4, 'MO1ist', 30),
(5, 'WR1nk2', 30),
(6, 'G1ol3d', 30),
(7, 'coll23ag', 27),
(8, 'Mo1s3tuz', 30),
(9, 'P03re', 30),
(10, 'Sup3re1s10', 29);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

DROP TABLE IF EXISTS `user_address`;
CREATE TABLE IF NOT EXISTS `user_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `addnum` int(255) NOT NULL,
  `address` text,
  `city` text,
  `state` text,
  `postcode` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `username`, `addnum`, `address`, `city`, `state`, `postcode`) VALUES
(14, 'test', 1, 'jalan venoshd', 'venoshd', 'venoshd', 6969),
(15, 'test', 2, '', '', '', NULL),
(16, 'user', 1, NULL, NULL, NULL, NULL),
(17, 'user', 2, NULL, NULL, NULL, NULL),
(18, 'test1', 1, NULL, NULL, NULL, NULL),
(19, 'test1', 2, NULL, NULL, NULL, NULL),
(20, 'Guest', 1, NULL, NULL, NULL, NULL),
(21, 'Guest', 2, NULL, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`notifid`) REFERENCES `login` (`notifid`),
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`notifid`) REFERENCES `login` (`notifid`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`payid`) REFERENCES `login` (`payid`);

--
-- Constraints for table `productorder`
--
ALTER TABLE `productorder`
  ADD CONSTRAINT `productorder_ibfk_2` FOREIGN KEY (`payid`) REFERENCES `payment` (`id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`code`) REFERENCES `product` (`code`);

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_ibfk_1` FOREIGN KEY (`username`) REFERENCES `login` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
