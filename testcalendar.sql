-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2025 at 09:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testcalendar`
--
CREATE DATABASE IF NOT EXISTS `testcalendar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `testcalendar`;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `calllink` varchar(254) DEFAULT NULL,
  `start_datetime` datetime DEFAULT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `idate` date DEFAULT NULL,
  `itimezone` varchar(255) DEFAULT NULL,
  `iinvite` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `calllink`, `start_datetime`, `end_datetime`, `idate`, `itimezone`, `iinvite`) VALUES
(1, 'Ics test 2', '', '2025-04-10 12:00:00', '2025-04-10 13:00:00', '2025-04-04', 'America/Chicago', 'sp@is4sb.com'),
(2, 'Vacation', '', '2025-03-22 16:00:00', '2025-03-22 17:00:00', '2025-04-04', 'America/Chicago', 'sp@is4sb.com'),
(3, 'Vacation 1', '', '2025-03-22 14:00:00', '2025-03-22 15:00:00', '2025-04-04', 'America/Chicago', 'sp@is4sb.com'),
(4, 'Vacation 1', '', '2025-03-22 14:00:00', '2025-03-22 15:00:00', '2025-04-04', 'America/Chicago', 'sp@is4sb.com'),
(5, 'Trythis', '', '2025-03-10 08:00:00', '2025-03-10 09:00:00', '2025-04-04', 'America/Chicago', 'sp@is4sb.com'),
(6, 'Alarm notification', '', '2025-03-09 14:30:00', '2025-03-09 15:30:00', '2025-04-04', 'Asia/Kolkata', 'sp@is4sb.com'),
(7, 'Alarm notification', '', '2025-03-13 15:30:00', '2025-03-13 16:30:00', '2025-04-04', 'Asia/Kolkata', 'sp@is4sb.com'),
(8, 'Alarm notification', '', '2025-03-26 15:30:00', '2025-03-26 16:30:00', '2025-04-04', 'Asia/Kolkata', 'sp@is4sb.com'),
(9, 'Alarm notification', '', '2025-03-14 10:00:00', '2025-03-14 11:00:00', '2025-04-04', 'Asia/Kolkata', 'sp@is4sb.com'),
(10, 'Alarm notification', '', '2025-03-08 15:30:00', '2025-03-08 16:30:00', '2025-04-04', 'Asia/Kolkata', 'sp@is4sb.com'),
(11, 'Alarm notification', '', '2025-03-08 12:00:00', '2025-03-08 13:00:00', '2025-04-04', 'Asia/Kolkata', 'sp@is4sb.com'),
(12, 'Alarm notification', '', '2025-03-07 13:30:00', '2025-03-07 14:30:00', '2025-04-04', 'Asia/Kolkata', 'sp@is4sb.com'),
(13, 'Yo yoI', '', '2025-03-18 00:00:00', '2025-03-18 01:00:00', '2025-04-04', 'UTC', 'sp@is4sb.com'),
(14, 'Yamen and Cat Sarasota trip', '', '2025-03-22 11:30:00', '2025-03-22 12:30:00', '2025-04-04', 'UTC', 'sp@is4sb.com'),
(15, 'Test Ical Event', '', '2025-04-07 14:00:00', '2025-04-07 14:30:00', '2025-04-04', 'UTC', 'sp@is4sb.com'),
(16, 'Ics test 2', '', '2025-04-10 12:00:00', '2025-04-10 13:00:00', '2025-04-04', 'UTC', 'sp@is4sb.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
