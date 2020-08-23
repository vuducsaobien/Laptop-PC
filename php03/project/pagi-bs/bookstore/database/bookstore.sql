-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2020 at 09:05 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `group_acp` tinyint(1) DEFAULT 0,
  `created` date DEFAULT '0000-00-00',
  `created_by` int(11) DEFAULT NULL,
  `modified` date DEFAULT '0000-00-00',
  `modified_by` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `ordering` int(11) DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`, `group_acp`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`) VALUES
(1, 'Admin 1', 1, '2013-11-11', NULL, '2020-08-18', 0, 0, 15),
(2, 'Manager', 1, '2013-11-07', 1, '2020-08-19', 0, 0, 1),
(3, 'Founder', 0, '2013-11-12', 2, '2020-08-19', 0, 0, 99),
(4, 'Anh Chàng Đẹp Trai', 0, '2020-08-03', 8, '2020-08-02', 3, 0, 10),
(5, 'Boy Over Flower', 1, '2020-07-14', 5, '2020-08-19', 0, 1, 2),
(6, 'Zhaka', 0, '2020-07-24', 5, '2020-08-19', 0, 0, 2),
(10, 'Member', 1, '2013-11-12', 10, '2020-08-19', 0, 1, 2),
(14, 'Con Cưng', 0, '2020-08-02', 3, '2020-08-19', 0, 1, 13),
(21, 'Test', 1, '2013-11-12', 21, '2020-08-19', 0, 1, 22),
(24, 'member 3', 1, '0000-00-00', 4, '2020-08-19', 0, 1, 13),
(34, 'Xuka', 1, '2020-03-02', 3, '2020-08-19', 0, 1, 13),
(65, 'member 2', 0, '0000-00-00', 3, '2020-08-19', 0, 0, 8),
(66, 'aaaaaa', 1, '0000-00-00', NULL, '2020-08-19', 0, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `id`) VALUES
('duc', 1),
('nga', 2),
('trung', 3),
('hoa', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
