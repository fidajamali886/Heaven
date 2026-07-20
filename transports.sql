-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2025 at 07:57 AM
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
-- Table structure for table `transports`
--

CREATE TABLE `transports` (
  `d_Id` int(20) NOT NULL,
  `d_Name` varchar(200) NOT NULL,
  `d_Email` varchar(200) NOT NULL,
  `d_Cellno` varchar(50) NOT NULL,
  `d_Country` varchar(50) NOT NULL,
  `d_City` varchar(20) NOT NULL,
  `d_participants` int(20) NOT NULL,
  `d_Pickup` varchar(50) NOT NULL,
  `d_Pickup_date` date NOT NULL,
  `d_Time` timestamp NOT NULL DEFAULT current_timestamp(),
  `d_About` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transports`
--

INSERT INTO `transports` (`d_Id`, `d_Name`, `d_Email`, `d_Cellno`, `d_Country`, `d_City`, `d_participants`, `d_Pickup`, `d_Pickup_date`, `d_Time`, `d_About`) VALUES
(1, 'Fida Hussain', 'fidajamali886@gmail.com', '03129722994', 'Skardu', 'Shigar', 4, 'Skardu', '2024-12-31', '2025-07-15 13:32:09', 'All are good');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transports`
--
ALTER TABLE `transports`
  ADD PRIMARY KEY (`d_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transports`
--
ALTER TABLE `transports`
  MODIFY `d_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
