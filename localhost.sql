-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2014 at 01:20 PM
-- Server version: 5.5.34-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+05:30";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Virtual_Infocity`
--
CREATE DATABASE `Virtual_Infocity` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `Virtual_Infocity`;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_man`
--

CREATE TABLE IF NOT EXISTS `delivery_man` (
  `userId` int(100) NOT NULL AUTO_INCREMENT,
  `userName` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `mobileNo` int(100) NOT NULL,
  `creditLeft` int(100) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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

-- --------------------------------------------------------

--
-- Table structure for table `productfeedback`
--

CREATE TABLE IF NOT EXISTS `productfeedback` (
  `productId` int(100) NOT NULL AUTO_INCREMENT,
  `userId` int(100) NOT NULL,
  `commment` text NOT NULL,
  `rating` int(100) NOT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `recharge`
--

CREATE TABLE IF NOT EXISTS `recharge` (
  `shopId` int(100) NOT NULL AUTO_INCREMENT,
  `transactionId` int(100) NOT NULL,
  `userId` int(100) NOT NULL,
  `rechargeMobileNumber` int(13) NOT NULL,
  PRIMARY KEY (`shopId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shopfeedback`
--

CREATE TABLE IF NOT EXISTS `shopfeedback` (
  `shopId` int(100) NOT NULL,
  `userId` int(100) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(100) NOT NULL,
  PRIMARY KEY (`shopId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `storetype`
--

CREATE TABLE IF NOT EXISTS `storetype` (
  `typeId` int(100) NOT NULL AUTO_INCREMENT,
  `type` text NOT NULL,
  PRIMARY KEY (`typeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `mobileNo` int(11) NOT NULL,
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
