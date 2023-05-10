-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2023 at 12:47 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crudoperation`
--

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` int(11) NOT NULL,
  `image` varchar(244) DEFAULT NULL,
  `name` varchar(244) DEFAULT NULL,
  `email` varchar(244) DEFAULT NULL,
  `mobile` varchar(244) DEFAULT NULL,
  `password` varchar(244) DEFAULT NULL,
  `resume` varchar(244) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `image`, `name`, `email`, `mobile`, `password`, `resume`) VALUES
(1, '1683714000.jpg', 'muniraj', 'muni20002raj@gmail.com', '9500631210', 'muniraj', '1683714000.pdf'),
(2, '1683714126.jpg', 'preethi', 'preethi@gmail.com', '6380638157', 'preethi123', '1683714126.pdf'),
(3, '1683715248.jpg', 'sivaraj', 'selvam@gmail.com', '55435415646', 'munbidsa', '1683715248.pdf'),
(4, '1683715417.jpg', 'hgfdhfg', 'gfhgfh3@gfdg', '546324563543', 'fghfghjfh', '1683715417.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
