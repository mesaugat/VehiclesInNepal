-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 06, 2013 at 10:28 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vehicles_db`
--
CREATE DATABASE IF NOT EXISTS `vehicles_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `vehicles_db`;

-- --------------------------------------------------------

--
-- Table structure for table `road_accidents_trends`
--

CREATE TABLE IF NOT EXISTS `road_accidents_trends` (
  `Year` int(4) NOT NULL DEFAULT '0',
  `Accidents` int(5) DEFAULT NULL,
  `Fatal_Injuries` int(4) DEFAULT NULL,
  `Serious_Injuries` int(4) DEFAULT NULL,
  `Minor_Injuries` int(4) DEFAULT NULL,
  `Injury_Fatality_Ratio` decimal(3,2) DEFAULT NULL,
  `Fatality_Per_TenThousand_Vehicles` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`Year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `road_accidents_trends`
--

INSERT INTO `road_accidents_trends` (`Year`, `Accidents`, `Fatal_Injuries`, `Serious_Injuries`, `Minor_Injuries`, `Injury_Fatality_Ratio`, `Fatality_Per_TenThousand_Vehicles`) VALUES
(2001, 3823, 879, 458, 4138, '5.23', '66.20'),
(2002, 3864, 682, 785, 4442, '7.66', '48.38'),
(2003, 5430, 802, 1659, 3925, '6.96', '52.04'),
(2004, 5532, 808, 1795, 4039, '7.22', '49.42'),
(2005, 3894, 825, 1866, 3655, '6.69', '47.64'),
(2006, 4546, 953, 2583, 5331, '8.30', '50.17'),
(2007, 6821, 1131, 2663, 5245, '6.99', '54.90'),
(2008, 8353, 1356, 3609, 6457, '7.42', '60.21'),
(2009, 11747, 1734, 4130, 7383, '6.64', '67.13');

-- --------------------------------------------------------

--
-- Table structure for table `road_accidents_user_group`
--

CREATE TABLE IF NOT EXISTS `road_accidents_user_group` (
  `Type` varchar(7) DEFAULT NULL,
  `Pedestrian` int(3) DEFAULT NULL,
  `Bicycle` int(2) DEFAULT NULL,
  `Rickshaw` int(1) DEFAULT NULL,
  `Motorcycle` int(3) DEFAULT NULL,
  `Tempo` int(2) DEFAULT NULL,
  `Car` int(2) DEFAULT NULL,
  `MiniBus` int(2) DEFAULT NULL,
  `Bus` int(2) DEFAULT NULL,
  `Truck` int(2) DEFAULT NULL,
  UNIQUE KEY `Type` (`Type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `road_accidents_user_group`
--

INSERT INTO `road_accidents_user_group` (`Type`, `Pedestrian`, `Bicycle`, `Rickshaw`, `Motorcycle`, `Tempo`, `Car`, `MiniBus`, `Bus`, `Truck`) VALUES
('Minor', 249, 76, 3, 229, 97, 78, 66, 44, 19),
('Serious', 90, 17, 1, 75, 13, 21, 6, 15, 3),
('Fatal', 42, 4, 0, 19, 2, 3, 4, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `road_growth`
--

CREATE TABLE IF NOT EXISTS `road_growth` (
  `Year` int(4) NOT NULL DEFAULT '0',
  `Highways` int(4) DEFAULT NULL,
  `Feeder_Roads` int(4) DEFAULT NULL,
  `Urban_Roads` int(4) DEFAULT NULL,
  `District_Roads` int(4) DEFAULT NULL,
  PRIMARY KEY (`Year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `road_growth`
--

INSERT INTO `road_growth` (`Year`, `Highways`, `Feeder_Roads`, `Urban_Roads`, `District_Roads`) VALUES
(1985, 1960, 1875, 866, 1224),
(1990, 2111, 1822, 1098, 2299),
(1994, 2734, 1520, 1339, 3941),
(1998, 2905, 1835, 1868, 6615),
(2002, 3029, 1832, 2198, 9775),
(2004, 3339, 4196, 2260, 7486),
(2006, 4198, 5201, 2260, 7223),
(2009, 4718, 6117, 2473, 6956);

-- --------------------------------------------------------

--
-- Table structure for table `road_length_districts`
--

CREATE TABLE IF NOT EXISTS `road_length_districts` (
  `District` varchar(14) DEFAULT NULL,
  `Road_Length` decimal(5,2) DEFAULT NULL,
  `Road_Density` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `road_length_districts`
--

INSERT INTO `road_length_districts` (`District`, `Road_Length`, `Road_Density`) VALUES
('Achham', '79.50', 5),
('Arghakhanchi', '186.91', 16),
('Baglung', '35.63', 2),
('Baitadi', '198.86', 13),
('Bajhang', '73.20', 2),
('Bajura', '11.80', 1),
('Banke', '386.41', 17),
('Bara', '300.34', 25),
('Bardiya', '293.02', 14),
('Bhaktapur', '182.08', 153),
('Bhojpur', '0.00', 0),
('Chitwan', '789.86', 36),
('Dadeldhura', '192.58', 13),
('Dailekh', '188.90', 13),
('Dang', '589.78', 20),
('Darchula', '66.42', 3),
('Dhading', '263.88', 14),
('Dhankuta', '244.88', 27),
('Dhanusa', '660.21', 56),
('Dolakha', '243.88', 11),
('Dolpa', '0.00', 0),
('Doti', '183.41', 9),
('Gorkha', '124.84', 3),
('Gulmi', '217.54', 19),
('Humla', '0.00', 0),
('Ilam', '387.95', 23),
('Jajarkot', '22.00', 1),
('Jhapa', '603.24', 38),
('Jumla', '13.00', 1),
('Kailali', '449.80', 14),
('Kalikot', '7.00', 0),
('Kanchanpur', '224.22', 14),
('Kapilbastu', '355.97', 20),
('Kaski', '464.46', 23),
('Kathmandu', '914.83', 232),
('Kavrepalanchok', '435.59', 31),
('Khotang', '0.00', 0),
('Lalitpur', '348.41', 90),
('Lamjung', '113.57', 7),
('Mahottari', '465.29', 46),
('Makwanpur', '346.04', 14),
('Manang', '0.00', 0),
('Morang', '661.72', 36),
('Mugu', '0.00', 0),
('Mustang', '0.00', 0),
('Myagdi', '22.00', 1),
('Nawalparasi', '253.33', 12),
('Nuwakot', '248.71', 22),
('Okhaldhunga', '41.00', 4),
('Palpa', '291.84', 21),
('Panchthar', '177.86', 14),
('Parbat', '68.11', 14),
('Parsa', '282.91', 21),
('Pyuthan', '216.00', 17),
('Ramechhap', '130.00', 8),
('Rasuwa', '97.50', 6),
('Rautahat', '200.33', 18),
('Rolpa', '77.79', 4),
('Rukum', '49.70', 2),
('Rupandehi', '352.81', 26),
('Salyan', '202.16', 14),
('Sankhuwasabha', '32.20', 1),
('Saptari', '336.80', 25),
('Sarlahi', '446.32', 35),
('Sindhuli', '107.20', 4),
('Sindhupalchok', '242.25', 10),
('Siraha', '305.93', 26),
('Solukhumbu', '0.00', 0),
('Sunsari', '475.03', 38),
('Surkhet', '359.14', 15),
('Syangja', '238.14', 20),
('Tanahu', '402.89', 26),
('Taplejung', '37.10', 1),
('Terhathum', '63.44', 9),
('Udayapur', '195.06', 9);

-- --------------------------------------------------------

--
-- Table structure for table `road_length_regions`
--

CREATE TABLE IF NOT EXISTS `road_length_regions` (
  `Region` varchar(11) DEFAULT NULL,
  `Road_Length` decimal(6,2) DEFAULT NULL,
  `Road_Density` int(2) DEFAULT NULL,
  UNIQUE KEY `Region` (`Region`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `road_length_regions`
--

INSERT INTO `road_length_regions` (`Region`, `Road_Length`, `Road_Density`) VALUES
('Central', '6705.63', 24),
('Eastern', '3562.21', 13),
('Far Western', '1479.79', 8),
('Mid Western', '2404.90', 6),
('Western', '3128.04', 11);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_numbers`
--

CREATE TABLE IF NOT EXISTS `vehicle_numbers` (
  `Year` int(4) NOT NULL DEFAULT '0',
  `Bus` int(4) DEFAULT NULL,
  `Mini_Bus` int(4) DEFAULT NULL,
  `Crane` int(4) DEFAULT NULL,
  `Car` int(5) DEFAULT NULL,
  `Pick_Up` varchar(4) DEFAULT NULL,
  `Micro` varchar(3) DEFAULT NULL,
  `Tempo` int(4) DEFAULT NULL,
  `Motorcycle` int(6) DEFAULT NULL,
  `Tractor` int(5) DEFAULT NULL,
  `Others` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`Year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle_numbers`
--

INSERT INTO `vehicle_numbers` (`Year`, `Bus`, `Mini_Bus`, `Crane`, `Car`, `Pick_Up`, `Micro`, `Tempo`, `Motorcycle`, `Tractor`, `Others`) VALUES
(1989, 4159, 2064, 8969, 24050, '0', '0', 2359, 35776, 6769, '102'),
(1990, 458, 226, 800, 1893, '0', '0', 856, 4954, 788, '1549'),
(1991, 413, 148, 1524, 2115, '0', '0', 1207, 8154, 548, '358'),
(1992, 606, 185, 1491, 2266, '0', '0', 62, 7608, 262, '381'),
(1993, 1168, 77, 1740, 3049, '0', '0', 154, 8653, 1396, '372'),
(1994, 850, 83, 1629, 3043, '0', '0', 241, 9401, 1814, '353'),
(1995, 486, 82, 1151, 5261, '0', '0', 117, 13855, 2183, '58'),
(1996, 608, 175, 907, 2993, '0', '0', 185, 12633, 1257, '352'),
(1997, 899, 130, 1291, 4139, '0', '0', 344, 12306, 1265, '51'),
(1998, 872, 19, 978, 2507, '0', '0', 388, 17090, 2248, '37'),
(1999, 494, 122, 829, 3647, '0', '0', 789, 19755, 2542, '102'),
(2000, 1203, 250, 1271, 5152, '0', '0', 232, 29291, 3519, '77'),
(2001, 868, 475, 1798, 4374, '0', '0', 248, 38522, 3189, '86'),
(2002, 432, 298, 1212, 2906, '581', '232', 17, 29404, 2485, '43'),
(2003, 732, 237, 1477, 7079, '478', '884', 16, 26547, 2191, '58'),
(2004, 753, 285, 1592, 4781, '0', '584', 48, 31093, 1374, '21'),
(2005, 1528, 663, 2263, 5114, '36', '66', 60, 45410, 635, '0'),
(2006, 1564, 806, 3278, 5156, '736', '138', 12, 72568, 2942, '1535'),
(2007, 1419, 1179, 3594, 4741, '1588', '31', 18, 69666, 3297, '206'),
(2008, 1843, 593, 3643, 6857, '1287', '128', 20, 83334, 4663, '202'),
(2009, 1888, 780, 4524, 12268, '1975', '145', 9, 168707, 11460, '31'),
(2010, 1610, 1370, 1969, 8510, '3087', '115', 2, 138907, 7937, '133'),
(2011, 1016, 602, 593, 5403, '1208', '61', 6, 90305, 2512, '73');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
