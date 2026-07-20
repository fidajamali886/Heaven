-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2025 at 06:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haven of the world`
--

-- --------------------------------------------------------

--
-- Table structure for table `4 Days Family Trip around Skardu`
--

CREATE TABLE `4 Days Family Trip around Skardu` (
  `d_Id` int(20) NOT NULL,
  `d_Name` varchar(200) NOT NULL,
  `d_Email` varchar(200) NOT NULL,
  `d_Cellno` varchar(50) NOT NULL,
  `d_Country` varchar(50) NOT NULL,
  `d_City` varchar(20) NOT NULL,
  `d_participents` int(20) NOT NULL,
  `d_Picup` varchar(50) NOT NULL,
  `d_Picdate` date NOT NULL,
  `d_About` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `4 Days Family Trip around Skardu`
--
ALTER TABLE `4 Days Family Trip around Skardu`
  ADD PRIMARY KEY (`d_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `4 Days Family Trip around Skardu`
--
ALTER TABLE `4 Days Family Trip around Skardu`
  MODIFY `d_Id` int(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
