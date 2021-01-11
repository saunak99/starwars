-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2021 at 10:07 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votingdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `characters_master`
--

CREATE TABLE `characters_master` (
  `id` int(11) NOT NULL,
  `character_name` varchar(255) NOT NULL,
  `height` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `characters_master`
--

INSERT INTO `characters_master` (`id`, `character_name`, `height`, `gender`, `create_date`) VALUES
(1, 'Luke Skywalker', '172', 'male', '2021-01-09 23:07:43'),
(2, 'Obi-Wan Kenobi', '182', 'male', '2021-01-09 23:07:43'),
(3, 'R5-D4', '97', 'n/a', '2021-01-09 23:08:44'),
(4, 'Beru Whitesun lars', '165', 'female', '2021-01-09 23:08:44'),
(5, 'Owen Lars', '178', 'male', '2021-01-09 23:09:30'),
(6, 'Leia Organa', '150', 'female', '2021-01-09 23:09:30'),
(7, 'Darth Vader', '202', 'male', '2021-01-09 23:10:21'),
(8, 'R2-D2', '96', 'n/a', '2021-01-09 23:10:21'),
(9, 'C-3PO', '167', 'n/a', '2021-01-09 23:10:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 = Registered,2 = Guest',
  `mac_address` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vote_log`
--

CREATE TABLE `vote_log` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `character_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characters_master`
--
ALTER TABLE `characters_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vote_log`
--
ALTER TABLE `vote_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `characters_master`
--
ALTER TABLE `characters_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vote_log`
--
ALTER TABLE `vote_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
