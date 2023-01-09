-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2023 at 05:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fod`
--

-- --------------------------------------------------------

--
-- Table structure for table `cbe`
--

CREATE TABLE `cbe` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `upassword` varchar(40) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cbe`
--

INSERT INTO `cbe` (`id`, `name`, `phone`, `upassword`, `balance`) VALUES
(1, 'galata', '0964209800', '1234', 99167),
(2, 'hotel', '0934030930', '1234', 233),
(3, 'gadisa', '0921212121', '1234', 11);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comments` varchar(400) NOT NULL,
  `new` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `email`, `comments`, `new`) VALUES
(5, 'galata17137@gimail.com', 'eeeeeeeeeeeee', 1);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `managername` varchar(300) NOT NULL,
  `email` varchar(200) NOT NULL,
  `managerpassword` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `managerdb`
--

CREATE TABLE `managerdb` (
  `id` int(11) NOT NULL,
  `managername` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `managerpassword` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managerdb`
--

INSERT INTO `managerdb` (`id`, `managername`, `email`, `phone`, `managerpassword`) VALUES
(1, 'galata', 'q@.com', '0964209800', '121212');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menuid` int(11) NOT NULL,
  `menuname` varchar(50) NOT NULL,
  `amount` varchar(21) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `foodtype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menuid`, `menuname`, `amount`, `photo`, `foodtype`) VALUES
(12, 'burger', '140', 'uploads/burger.jpg', 'popular'),
(13, 'cet', '140', 'uploads/cetfo.png', 'menu'),
(14, 'citfo', '250', 'uploads/cetfo.png', 'special'),
(15, 'firfir', '90', 'uploads/firfir.jpg', 'menu'),
(16, 'dorowot', '400', 'uploads/doro.jpg', 'special'),
(17, 'citfo', '233', 'uploads/pngkey.com-ground-beef-png-1611874(1).png', 'popular'),
(18, 'piza', '290', 'uploads/piza.jpg', 'special'),
(19, 'piza', '290', 'uploads/piza.jpg', 'special'),
(20, 'burger', '140', 'uploads/burger.jpg', 'popular'),
(21, 'citfo', '233', 'uploads/pngkey.com-ground-beef-png-1611874(1).png', 'popular'),
(22, 'burger', '140', 'uploads/burger.jpg', 'popular'),
(23, 'citfo', '250', 'uploads/cetfo.png', 'special');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customerName` varchar(50) NOT NULL,
  `email` varchar(211) NOT NULL,
  `phone` int(11) NOT NULL,
  `foodname` varchar(232) NOT NULL,
  `locations` varchar(123) NOT NULL,
  `orderstatus` varchar(40) NOT NULL,
  `new` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customerName`, `email`, `phone`, `foodname`, `locations`, `orderstatus`, `new`) VALUES
(6, 'galata hinkosa', 'galata17137@gimail.com', 964209800, 'citfo', 'erqwr', 'recieved', 1),
(7, 'galata hinkosa', 'galata17137@gimail.com', 12324234, 'ww', 'ejhgwlehg', 'recieved', 1),
(8, 'fg', 'galata17137@gimail.com', 964209800, 'dorowot', 'rer', 'recieved', 1),
(9, 'galata hinkosa', 'galata17137@gimail.com', 964209800, 'dorowot', 'u6ytkouyg', 'recieved', 1),
(10, 'galata hinkosa', 'galata17137@gimail.com', 964209800, 'pizza', '12ewdc', 'not received', 1),
(11, 'gadisa', 'galata17137@gimail.com', 964209800, 'burger', 'ewfdgfda', 'not received', 1),
(12, 'gadisa', 'galata17137@gimail.com', 964209800, 'pizza', 'adama', 'not received', 1),
(13, 'galata', 's@.com', 964209800, 'citfo', 'adama', 'recieved', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userdb`
--

CREATE TABLE `userdb` (
  `id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `upassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdb`
--

INSERT INTO `userdb` (`id`, `uname`, `email`, `phone`, `upassword`) VALUES
(1, 'galata hinkosa', 'ere@dfd.com', '12324234', '11111111'),
(2, 'hinkosa', 'ere@dfd.com', '12324234', '1111111'),
(3, 'hinkosa', 'ere@dfd.com', '12324234', '1111111'),
(4, 'galata', 's@.com', '0964209800', '121212'),
(5, 'galata hinkosa', 'galata17137@gimail.com', '0964209800', '121212'),
(6, 'galata hinkosa', 'galata17137@gimail.com', '0964209800', '121212'),
(7, 'galata hinkosa', 'ere@dfd.com', '12324234', '12121212'),
(8, 'galata hinkosa', 'ere@dfd.com', '12324234', '12121212');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cbe`
--
ALTER TABLE `cbe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managerdb`
--
ALTER TABLE `managerdb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menuid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdb`
--
ALTER TABLE `userdb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cbe`
--
ALTER TABLE `cbe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `managerdb`
--
ALTER TABLE `managerdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `userdb`
--
ALTER TABLE `userdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
