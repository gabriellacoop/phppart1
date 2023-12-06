-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 04, 2023 at 08:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `pic`
--

CREATE TABLE `pic` (
  `upload_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `file_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pic`
--

INSERT INTO `pic` (`upload_timestamp`, `file_name`) VALUES
('2023-12-03 14:48:38', 'profiles.jpeg'),
('2023-12-03 14:48:43', 'profile.jpeg'),
('2023-12-03 14:58:49', 'profile.jpeg'),
('2023-12-03 14:59:41', 'profile.jpeg'),
('2023-12-03 15:09:37', 'profile.jpeg'),
('2023-12-03 15:16:16', 'profile.jpeg'),
('2023-12-03 15:17:12', 'profile.jpeg'),
('2023-12-03 15:17:50', 'profile.jpeg'),
('2023-12-03 15:18:09', 'profile.jpeg'),
('2023-12-03 15:18:17', 'profile.jpeg'),
('2023-12-03 15:19:57', 'profile.jpeg'),
('2023-12-03 15:24:24', 'profile.jpeg'),
('2023-12-03 15:32:26', 'profile.jpeg'),
('2023-12-03 15:34:10', 'profile.jpeg'),
('2023-12-03 15:34:13', 'profile.jpeg'),
('2023-12-03 15:39:14', 'profile.jpeg'),
('2023-12-03 15:39:35', 'profile.jpeg'),
('2023-12-03 15:40:29', 'profile.jpeg'),
('2023-12-03 15:42:41', 'profile.jpeg'),
('2023-12-03 15:42:46', 'profile.jpeg'),
('2023-12-03 15:43:46', 'profile.jpeg'),
('2023-12-03 22:12:30', 'profile.jpeg'),
('2023-12-03 22:13:20', 'profile.jpeg'),
('2023-12-03 22:13:27', 'profile.jpeg'),
('2023-12-03 22:16:09', 'profile.jpeg'),
('2023-12-03 22:19:30', 'profile.jpeg'),
('2023-12-03 22:27:29', 'profile.jpeg'),
('2023-12-03 22:28:40', 'profile.jpeg'),
('2023-12-03 22:37:53', 'profile.jpeg'),
('2023-12-03 22:39:43', 'profile.jpeg'),
('2023-12-03 22:40:45', 'profile.jpeg'),
('2023-12-03 22:47:41', 'profile.jpeg'),
('2023-12-04 15:43:19', 'profile.jpeg'),
('2023-12-04 15:43:24', 'profile.jpeg'),
('2023-12-04 15:54:45', 'profiles.jpeg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
