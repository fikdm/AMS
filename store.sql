-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2019 at 06:41 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` varchar(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `own` tinyint(2) NOT NULL,
  `date_in` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_out` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `desc_in` varchar(500) NOT NULL,
  `desc_out` varchar(500) NOT NULL,
  `no_item` int(10) NOT NULL,
  `val` int(20) NOT NULL,
  `token` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_log`
--

CREATE TABLE `item_log` (
  `cond` tinyint(2) NOT NULL,
  `item_id` varchar(12) NOT NULL,
  `item_id2` varchar(12) NOT NULL,
  `item_id3` varchar(12) NOT NULL,
  `val` int(20) NOT NULL,
  `val2` int(20) NOT NULL,
  `val3` int(20) NOT NULL,
  `dat_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user` varchar(10) NOT NULL,
  `pw` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `id` varchar(12) NOT NULL,
  `user` varchar(12) NOT NULL,
  `p` varchar(12) NOT NULL,
  `time_log` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `item_log`
--
ALTER TABLE `item_log`
  ADD KEY `FK_Br_Item` (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
