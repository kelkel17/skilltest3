-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2018 at 10:27 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stest`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `custid` int(11) NOT NULL,
  `custnum` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `course` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`custid`, `custnum`, `fname`, `lname`, `date`, `gender`, `course`) VALUES
(5, 295, 'Mickale', 'Saturre', '1998-05-17', 'Male', 'bsit'),
(6, 481, 'Desiree', 'Omapoy', '1997-09-21', 'Female', 'bsit');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemid` int(11) NOT NULL,
  `itemnum` int(11) NOT NULL,
  `itname` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `supid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemid`, `itemnum`, `itname`, `qty`, `price`, `supid`) VALUES
(1, 448, 'Turks', 62, '80.00', 1),
(2, 405, 'Fries', 65, '117.00', 2),
(5, 621, 'Pizza', 57, '150.00', 1),
(6, 713, 'Ice Cream', 32, '245.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `custid` int(11) NOT NULL,
  `ordate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `itemid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `custid`, `ordate`, `itemid`, `qty`, `price`) VALUES
(46, 5, '2018-02-04 08:09:33', 2, 25, '2925.00'),
(47, 6, '2018-02-04 08:18:27', 1, 23, '1840.00'),
(48, 6, '2018-02-04 08:18:32', 5, 15, '2250.00'),
(49, 6, '2018-02-04 08:18:40', 6, 35, '8575.00'),
(50, 5, '2018-02-04 08:18:50', 5, 10, '1500.00'),
(51, 5, '2018-02-04 08:18:54', 1, 5, '400.00');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `odid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`odid`, `itemid`, `orderid`, `qty`, `total_price`) VALUES
(1, 1, 41, 90, 0),
(2, 1, 42, 90, 0),
(3, 1, 43, 90, 0),
(4, 1, 44, 90, 0),
(5, 1, 45, 90, 0);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supid` int(11) NOT NULL,
  `supnum` int(11) NOT NULL,
  `sfname` varchar(50) NOT NULL,
  `slname` varchar(50) NOT NULL,
  `addr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supid`, `supnum`, `sfname`, `slname`, `addr`) VALUES
(1, 653, 'Junre Dexter', 'Zapico', 'Cebu City'),
(2, 353, 'Mitch', 'Alforque', 'Cebu City');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`custid`),
  ADD UNIQUE KEY `custnum` (`custnum`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`odid`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supid`),
  ADD UNIQUE KEY `supnum` (`supnum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `custid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `odid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
