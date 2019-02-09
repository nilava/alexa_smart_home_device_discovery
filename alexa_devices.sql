-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 09, 2019 at 02:47 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alexa_devices`
--

-- --------------------------------------------------------

--
-- Table structure for table `bedroom_devices`
--

DROP TABLE IF EXISTS `bedroom_devices`;
CREATE TABLE IF NOT EXISTS `bedroom_devices` (
  `endpointId` int(10) NOT NULL AUTO_INCREMENT,
  `friendlyName` varchar(20) NOT NULL,
  `description` varchar(20) NOT NULL,
  `device_category` varchar(20) NOT NULL DEFAULT 'SWITCH',
  `Auth_Token` varchar(30) NOT NULL,
  `Switch_Virtual_Key` varchar(3) NOT NULL,
  `brightness_virtual_key` int(2) NOT NULL,
  `brightness_support` tinyint(1) NOT NULL,
  `color_support` tinyint(1) NOT NULL,
  `retrievable` varchar(5) NOT NULL DEFAULT 'true',
  PRIMARY KEY (`endpointId`)
) ENGINE=InnoDB AUTO_INCREMENT=1003 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bedroom_devices`
--

INSERT INTO `bedroom_devices` (`endpointId`, `friendlyName`, `description`, `device_category`, `Auth_Token`, `Switch_Virtual_Key`, `brightness_virtual_key`, `brightness_support`, `color_support`, `retrievable`) VALUES
(1000, 'Light', 'Bedroom Light', 'SWITCH', 'askjdhkjashdjskahdksajdh', 'V1', 0, 1, 0, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `livingroom_devices`
--

DROP TABLE IF EXISTS `livingroom_devices`;
CREATE TABLE IF NOT EXISTS `livingroom_devices` (
  `endpointId` int(10) NOT NULL AUTO_INCREMENT,
  `friendlyName` varchar(20) NOT NULL,
  `description` varchar(20) NOT NULL,
  `device_category` varchar(20) NOT NULL DEFAULT 'SWITCH',
  `Auth_Token` varchar(30) NOT NULL,
  `Switch_Virtual_Key` varchar(3) NOT NULL,
  `brightness_virtual_key` int(2) NOT NULL,
  `brightness_support` tinyint(1) NOT NULL,
  `color_support` tinyint(1) NOT NULL,
  `retrievable` varchar(5) NOT NULL DEFAULT 'true',
  PRIMARY KEY (`endpointId`)
) ENGINE=InnoDB AUTO_INCREMENT=1003 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `livingroom_devices`
--

INSERT INTO `livingroom_devices` (`endpointId`, `friendlyName`, `description`, `device_category`, `Auth_Token`, `Switch_Virtual_Key`, `brightness_virtual_key`, `brightness_support`, `color_support`, `retrievable`) VALUES
(2001, 'Fan', 'Bedroom Fan', 'SWITCH', 'sdsfsdfdsfdsf', 'V3', 0, 1, 1, 'false');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
