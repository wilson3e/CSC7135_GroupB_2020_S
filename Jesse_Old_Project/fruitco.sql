-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2017 at 06:06 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fruitco`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerId` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zipCode` varchar(5) NOT NULL,
  `phoneNumber` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerId`, `email`, `password`, `lastName`, `firstName`, `address`, `city`, `state`, `zipCode`, `phoneNumber`) VALUES
(1, 'guangyuandai@gmail.com', 'c0e47edc8c7bc91887b52f80b520eb745c957f44', 'Dai', 'Guangyuan', '1599 Pennsylvania Avenue', 'Magnolia', 'AR', '71753', '8705623654'),
(3, 'shadowyskyz@gmail.com', 'e93200766e5974c64be4f233f7c17646c2b80430', 'Dai', 'Chris', '450 Lewis Circle', 'Magnolia', 'AR', '71753', '8702342458'),
(4, 'weewoo@gmail.com', 'aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d', 'Dai', 'Jesse', '450 Lewis Circle', 'Magnolia', 'AR', '71753', '');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceNumber` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `invoiceNumber` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` varchar(300) NOT NULL,
  `imageFile` varchar(30) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `name`, `description`, `imageFile`, `price`) VALUES
(1, 'Red Delicious Apple', 'Slightly crispy with a mild, sweet flavor', 'red_delicious.jpg', '1.30'),
(2, 'Gala Apple', 'Mild and sweet with vanilla-like flavors', 'gala.jpg', '1.47'),
(3, 'Banana', 'Long, yellow fruit with soft, succulent flesh', 'banana.jpg', '0.58'),
(4, 'Navel Orange', 'Medium-sized orange with smooth, pebbled skin and sweet segmented flesh', 'navel_orange.jpg', '1.17'),
(5, 'Mandarin Orange', 'Small orange with very sweet flesh', 'mandarin_orange.jpg', '1.80'),
(6, 'White Peach', 'Very sweet and juicy peach originating from China', 'white_peach.jpg', '3.50'),
(7, 'Seedless Watermelon', 'Spherical melon with a thick, green rind and juicy, crispy flesh', 'seedless_watermelon.jpg', '0.59'),
(8, 'Seeded Watermelon', 'Oval-shaped melon with a thick, green rind and juicy, crisp flesh', 'seeded_watermelon.jpg', '0.38'),
(9, 'Red Grape', 'Large, seeded grape with juicy flesh', 'red_grapes.jpg', '2.00'),
(10, 'Green Grape', 'Firm, oval-shaped grapes with light green skin and semi-translucent flesh', 'green_grapes.jpg', '2.00'),
(11, 'Strawberry', 'Red, juicy fruit whose taste ranges from sour to sweet', 'strawberry.jpg', '2.50'),
(12, 'Lemon', 'Small, yellow citrus fruit with very sour, pulpy flesh', 'lemons.jpg', '1.60');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceNumber`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`invoiceNumber`,`productId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `invoiceNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
