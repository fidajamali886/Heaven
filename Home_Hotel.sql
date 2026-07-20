-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2025 at 07:03 AM
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
-- Table structure for table `Home Hotel`
--

CREATE TABLE `Home Hotel` (
  `d_Id` int(20) NOT NULL,
  `d_Name` varchar(200) NOT NULL,
  `d_Email` varchar(200) NOT NULL,
  `d_Cellno` varchar(50) NOT NULL,
  `d_Country` varchar(50) NOT NULL,
  `d_City` varchar(20) NOT NULL,
  `d_participants` int(20) NOT NULL,
  `d_Nights` varchar(50) NOT NULL,
  `d_Days` int(20) NOT NULL,
  `d_Guide` varchar(50) NOT NULL,
  `d_Time` timestamp NOT NULL DEFAULT current_timestamp(),
  `d_About` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Home Hotel`
--

INSERT INTO `Home Hotel` (`d_Id`, `d_Name`, `d_Email`, `d_Cellno`, `d_Country`, `d_City`, `d_participants`, `d_Nights`, `d_Days`, `d_Guide`, `d_Time`, `d_About`) VALUES
(1, 'Fida Hussain', 'fidajamali886@gmail.com', '03129722994', 'Skardu', 'Shigar', 4, 'Skardu', 0, '', '2025-07-15 13:31:45', 'All are good'),
(2, 'Fida Hussain', 'ali@gmail.com', '03129722994', 'Skardu', 'Shigar', 4, '2', 5, 'Volunteer Guide', '2025-07-16 02:20:42', 'Need English speaking guide');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Home Hotel`
--
ALTER TABLE `home hotel`
  ADD PRIMARY KEY (`d_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Home Hotel`
--
ALTER TABLE `Home Hotel`
  MODIFY `d_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
