-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 26, 2016 at 09:43 PM
-- Server version: 5.7.11-4-log
-- PHP Version: 5.5.36-1~dotdeb+7.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u85298db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `mtode_servere`
--

CREATE TABLE `mtode_servere` (
  `id` int(11) NOT NULL,
  `ip` varchar(1000) NOT NULL,
  `forum` text NOT NULL,
  `num_players` int(11) NOT NULL,
  `max_players` int(11) NOT NULL,
  `map` text NOT NULL,
  `game` text NOT NULL,
  `online` int(11) NOT NULL DEFAULT '0',
  `hostname` text NOT NULL,
  `vip` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mtode_servere`
--
ALTER TABLE `mtode_servere`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ip` (`ip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mtode_servere`
--
ALTER TABLE `mtode_servere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
