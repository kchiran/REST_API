-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 10:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interstellardb`
--

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  `planet_name` varchar(255) DEFAULT NULL,
  `spaceport_capacity` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `city_name`, `planet_name`, `spaceport_capacity`) VALUES
(1, 'Sydney', 'Earth', '50'),
(2, 'Texas', 'Earth', '44'),
(3, 'Valhalla', 'Jupiter', '105'),
(4, 'Labyrinth', 'Mars', '20'),
(5, 'Titan', 'Venus', '11');

-- --------------------------------------------------------

--
-- Table structure for table `spaceships`
--

CREATE TABLE `spaceships` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spaceships`
--

INSERT INTO `spaceships` (`id`, `name`, `model`, `location`, `status`) VALUES
(1, 'FalconX', '2011', 'Texas', 'operational'),
(2, 'Appollo', '2015', 'Sydney', 'decommissioned'),
(3, 'Luna', '2020', 'Valhalla', 'maintenance'),
(4, 'Fire', '2021', 'Labyrinth', 'maintenance'),
(5, 'Zeus', '2009', 'Titan', 'decommissioned');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
