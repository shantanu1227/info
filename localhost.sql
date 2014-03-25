-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2014 at 06:37 PM
-- Server version: 5.5.35-0ubuntu0.13.10.2
-- PHP Version: 5.5.3-1ubuntu2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+05:30";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Virtual_Infocity`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery_man`
--

CREATE TABLE IF NOT EXISTS `delivery_man` (
  `userId` int(100) NOT NULL AUTO_INCREMENT,
  `userName` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `mobileNo` text NOT NULL,
  `creditLeft` int(100) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `delivery_man`
--

INSERT INTO `delivery_man` (`userId`, `userName`, `password`, `name`, `mobileNo`, `creditLeft`) VALUES
(1, 'ravikishan', '8cb2237d0679ca88db6464eac60da96345513964', 'Ravi Kishan', '9988442231', 100),
(2, 'ramu', '09ebf42f26b88d83ccdb3cbe9c2ec95be6494d7d', 'Ramu', '9988442232', 200),
(3, 'kishan', '56d985d769712466873a443eae9abc3f217c367a', 'Kishan', '9988442233', 300),
(4, 'babu', '6dd633d4dde83a559a2fb4facb0c4c264ad3a639', 'Babu', '9988442234', 400);

-- --------------------------------------------------------

--
-- Table structure for table `laundry`
--

CREATE TABLE IF NOT EXISTS `laundry` (
  `userId` int(100) NOT NULL,
  `shopId` int(100) NOT NULL,
  `billNo` int(100) NOT NULL,
  `billingAmount` int(100) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laundry`
--

INSERT INTO `laundry` (`userId`, `shopId`, `billNo`, `billingAmount`) VALUES
(1, 3, 301, 50),
(2, 3, 302, 60),
(3, 3, 303, 70),
(4, 3, 304, 80);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE IF NOT EXISTS `offers` (
  `shopId` int(100) NOT NULL,
  `offerId` int(100) NOT NULL,
  `offerName` text NOT NULL,
  `offerImageUrl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`shopId`, `offerId`, `offerName`, `offerImageUrl`) VALUES
(1, 1, 'one burger free on three pizzas', 'kavya/kavyaoffer1.jpg'),
(2, 2, 'two burger free on four pizzas', 'subway/subwayoffer1.jpg'),
(2, 3, 'one pizza free on three burgers', 'subway/subwayoffer2.jpg'),
(1, 4, 'one pepsi free on three veg-puffs', 'kavya/kavyaoffer2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `productfeedback`
--

CREATE TABLE IF NOT EXISTS `productfeedback` (
  `productId` int(100) NOT NULL,
  `userId` int(100) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productfeedback`
--

INSERT INTO `productfeedback` (`productId`, `userId`, `comment`, `rating`) VALUES
(1, 1, 'Great Product', 4),
(2, 2, 'Average Product', 3),
(3, 1, 'Not good Product', 2),
(2, 3, 'Poor Product', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `productId` int(100) NOT NULL AUTO_INCREMENT,
  `productName` text NOT NULL,
  `price` int(100) NOT NULL,
  `shopId` int(100) NOT NULL,
  `productImage` text NOT NULL,
  `inStock` text NOT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productName`, `price`, `shopId`, `productImage`, `inStock`) VALUES
(1, 'Burger', 50, 1, 'kavya/burger.jpg', 'TRUE'),
(2, 'Pizza', 70, 2, 'subway/pizza.jpg', 'TRUE'),
(3, 'Notebooks', 30, 4, 'oxford/book.jpg', 'FALSE'),
(4, 'Pen', 20, 4, 'oxford/burger.jpg', 'TRUE'),
(5, 'Maggi 150 gram', 20, 1, 'kavya/kavyaproduct1.jpg', 'FALSE'),
(6, '7 up 500 ml', 32, 1, 'kavya/kavyaproduct2.jpg', 'TRUE');

-- --------------------------------------------------------

--
-- Table structure for table `recharge`
--

CREATE TABLE IF NOT EXISTS `recharge` (
  `shopId` int(100) NOT NULL,
  `transactionId` int(100) NOT NULL,
  `userId` int(100) NOT NULL,
  `rechargeMobileNumber` int(13) NOT NULL,
  PRIMARY KEY (`shopId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recharge`
--

INSERT INTO `recharge` (`shopId`, `transactionId`, `userId`, `rechargeMobileNumber`) VALUES
(1, 1, 1, 2147483647),
(2, 2, 2, 2147483647),
(3, 3, 3, 2147483647),
(4, 4, 4, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `shopfeedback`
--

CREATE TABLE IF NOT EXISTS `shopfeedback` (
  `shopId` int(100) NOT NULL,
  `userId` int(100) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopfeedback`
--

INSERT INTO `shopfeedback` (`shopId`, `userId`, `comment`, `rating`) VALUES
(1, 1, 'Great Shop', 4),
(2, 2, 'Average Shop', 3),
(3, 1, 'Not good Shop', 2),
(1, 1, 'Great Shop', 4),
(2, 2, 'Average Shop', 3),
(3, 1, 'Not good Shop', 2),
(2, 3, 'Poor Shop', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shoptimings`
--

CREATE TABLE IF NOT EXISTS `shoptimings` (
  `shopId` int(100) NOT NULL AUTO_INCREMENT,
  `openingTime` text NOT NULL,
  `closingTime` text NOT NULL,
  `holidays` text NOT NULL,
  `currentStatus` text NOT NULL,
  PRIMARY KEY (`shopId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `shoptimings`
--

INSERT INTO `shoptimings` (`shopId`, `openingTime`, `closingTime`, `holidays`, `currentStatus`) VALUES
(1, '9:00 AM', '10:00 PM', 'OPEN', 'OPEN'),
(2, '10:00 AM', '9:00 PM', 'CLOSE', 'OPEN'),
(3, '9:30 AM', '10:00 PM', 'OPEN', 'CLOSE'),
(4, '8:30 AM', '10:30 PM', 'CLOSE', 'CLOSE');

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE IF NOT EXISTS `slots` (
  `deliverySlot` int(10) NOT NULL,
  `timings` text NOT NULL,
  PRIMARY KEY (`deliverySlot`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE IF NOT EXISTS `stores` (
  `shopId` int(11) NOT NULL AUTO_INCREMENT,
  `typeId` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `contactNo` text NOT NULL,
  `userName` text NOT NULL,
  `password` text NOT NULL,
  `emailId` text NOT NULL,
  `imageIcon` text NOT NULL,
  PRIMARY KEY (`shopId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`shopId`, `typeId`, `name`, `address`, `contactNo`, `userName`, `password`, `emailId`, `imageIcon`) VALUES
(1, 1, 'Kavya', '1st Block Info', '9988442233', 'store_kavya', '47de38fbdece0d484472919c37c107cfadb2ad00', 'kavya@kavya.com', 'kavya/kavya_logo.png'),
(2, 2, 'Subway', 'Subway-Address', '9988442234', 'store_subway', 'b26e5ebda152e81099ec78be2f9c191ee25e1cd6', 'subway@subway.com', 'subway/subway_logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `storetype`
--

CREATE TABLE IF NOT EXISTS `storetype` (
  `typeId` int(100) NOT NULL AUTO_INCREMENT,
  `type` text NOT NULL,
  PRIMARY KEY (`typeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `storetype`
--

INSERT INTO `storetype` (`typeId`, `type`) VALUES
(1, 'Provision'),
(2, 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `subway`
--

CREATE TABLE IF NOT EXISTS `subway` (
  `userId` int(100) NOT NULL,
  `shopId` int(100) NOT NULL,
  `sub` text NOT NULL,
  `sauce` text NOT NULL,
  `veggies` text NOT NULL,
  `bread` text NOT NULL,
  `sixInch` text NOT NULL,
  `additionalComment` text NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `transactionId` int(100) NOT NULL,
  PRIMARY KEY (`transactionId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thali`
--

CREATE TABLE IF NOT EXISTS `thali` (
  `shopId` int(100) NOT NULL AUTO_INCREMENT,
  `lunch` int(100) NOT NULL,
  `dinner` int(100) NOT NULL,
  `date` text NOT NULL,
  PRIMARY KEY (`shopId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `transactionId` int(100) NOT NULL AUTO_INCREMENT,
  `userId` int(100) NOT NULL,
  `productId` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `deliverySlot` int(100) NOT NULL,
  `deliverDate` text NOT NULL,
  `delivered` text NOT NULL,
  `orderTimeStamp` varchar(100) NOT NULL,
  `deliveryTimestamp` varchar(100) NOT NULL,
  PRIMARY KEY (`transactionId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL,
  `fullName` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `authToken` text NOT NULL,
  `verified` varchar(10) NOT NULL DEFAULT 'false',
  `creditAmount` int(11) NOT NULL,
  `mobileNo` text NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userName` (`userName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `xerox`
--

CREATE TABLE IF NOT EXISTS `xerox` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `shopId` int(100) NOT NULL,
  `fileName` text NOT NULL,
  `noOfPages` int(100) NOT NULL,
  `color` text NOT NULL,
  `NoOfCopies` int(100) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

