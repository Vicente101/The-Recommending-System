-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 08:44 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cropsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `crops`
--

CREATE TABLE `crops` (
  `id` int(11) NOT NULL,
  `crop_name` varchar(255) NOT NULL,
  `temp_min` int(11) NOT NULL,
  `temp_max` int(11) NOT NULL,
  `humidity_min` int(11) NOT NULL,
  `humidity_max` int(11) NOT NULL,
  `wind_min` int(11) NOT NULL,
  `wind_max` int(11) NOT NULL,
  `climate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crops`
--

INSERT INTO `crops` (`id`, `crop_name`, `temp_min`, `temp_max`, `humidity_min`, `humidity_max`, `wind_min`, `wind_max`, `climate`) VALUES
(1, 'Maize', 20, 30, 40, 80, 5, 15, 'Summer'),
(2, 'Cassava', 25, 29, 50, 90, 5, 20, 'Summer'),
(3, 'Rice', 20, 35, 70, 90, 2, 10, 'Summer'),
(4, 'Wheat', 15, 24, 40, 70, 5, 15, 'Winter'),
(5, 'Sorghum', 25, 35, 40, 80, 5, 15, 'Summer'),
(6, 'Groundnuts (Peanuts)', 20, 30, 40, 70, 5, 15, 'Summer'),
(7, 'Soybeans', 20, 30, 40, 70, 5, 15, 'Summer'),
(8, 'Sunflower', 20, 30, 40, 70, 5, 15, 'Summer'),
(9, 'Cotton', 20, 30, 50, 80, 5, 15, 'Summer'),
(10, 'Tobacco', 20, 30, 50, 80, 5, 15, 'Summer'),
(11, 'Sugar cane', 20, 30, 60, 90, 5, 15, 'Summer'),
(12, 'Coffee', 18, 24, 60, 80, 2, 10, 'Winter'),
(13, 'Tea', 18, 30, 60, 90, 2, 10, 'Winter'),
(14, 'Legumes', 20, 30, 40, 70, 5, 15, 'Summer'),
(15, 'Potatoes', 15, 20, 50, 70, 2, 10, 'Winter'),
(16, 'Millet', 25, 35, 40, 80, 5, 15, 'Summer'),
(17, 'Barley', 15, 20, 50, 70, 2, 10, 'Winter'),
(18, 'Beans', 20, 30, 40, 70, 5, 15, 'Summer'),
(19, 'Peas', 15, 20, 50, 70, 2, 10, 'Winter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crops`
--
ALTER TABLE `crops`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crops`
--
ALTER TABLE `crops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
