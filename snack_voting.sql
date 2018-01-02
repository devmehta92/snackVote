-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2018 at 04:45 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snack_voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `fruits`
--

CREATE TABLE `fruits` (
  `ID` int(20) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fruits`
--

INSERT INTO `fruits` (`ID`, `Name`) VALUES
(1, 'Apple'),
(2, 'Orange'),
(3, 'Banana'),
(4, 'Pineapple');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created`, `modified`) VALUES
(1, 'Test', 'test@test.com', '$2y$10$fK//g5haMpFJPmGhIVsQ7umTv1QKo6R3v7rztT7inxvuhmcxgqRKO', '2017-12-28 18:56:21', '2017-12-28 19:01:45'),
(13, 'John Doe', 'jdoe@gmail.com', '$2y$10$aspoQw5iVim6XxsM7HCGgeoZ41RGLhKzIwNcAAv07xwfq2n3ZKIcm', '2017-12-28 19:59:06', '2017-12-28 19:59:06'),
(14, 'Jane', 'jane@gmail.com', '$2y$10$d4Q0hYlIfYGRp9fGuYUCuu8kYjQlsv2pznPS.Y.Avnn7Rd51r8bJ6', '2018-01-01 16:23:26', '2018-01-01 16:23:26'),
(15, 'Dev', 'dev@gmail.com', '$2y$10$4jqlCiIeDyNzV8//.fIl8OIRLp4N5bQTb7UusOH2zkopq7qgeiPKy', '2018-01-01 16:56:13', '2018-01-01 16:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `fruit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `fruit_id`, `user_id`, `created`, `modified`) VALUES
(18, 4, 13, '2017-12-29 20:03:03', '2017-12-29 20:03:03'),
(19, 3, 13, '2017-12-29 20:03:06', '2017-12-29 20:03:06'),
(20, 2, 13, '2017-12-29 20:03:09', '2017-12-29 20:03:09'),
(21, 1, 13, '2017-12-29 20:03:12', '2017-12-29 20:03:12'),
(22, 4, 13, '2017-12-29 20:08:39', '2017-12-29 20:08:39'),
(23, 3, 13, '2017-12-29 23:32:36', '2017-12-29 23:32:36'),
(24, 2, 13, '2017-12-30 00:00:21', '2017-12-30 00:00:21'),
(40, 3, 13, '2017-12-30 05:15:27', '2017-12-30 05:15:27'),
(41, 2, 13, '2017-12-30 05:15:33', '2017-12-30 05:15:33'),
(42, 2, 13, '2017-12-30 05:15:37', '2017-12-30 05:15:37'),
(43, 2, 13, '2017-12-31 02:38:51', '2017-12-31 02:38:51'),
(44, 3, 14, '2018-01-01 16:23:53', '2018-01-01 16:23:53'),
(45, 1, 14, '2018-01-01 16:41:44', '2018-01-01 16:41:44'),
(46, 3, 14, '2018-01-01 16:41:51', '2018-01-01 16:41:51'),
(47, 1, 15, '2018-01-01 16:56:54', '2018-01-01 16:56:54'),
(48, 4, 15, '2018-01-01 19:08:31', '2018-01-01 19:08:31'),
(49, 3, 15, '2018-01-01 19:13:50', '2018-01-01 19:13:50'),
(50, 2, 15, '2018-01-01 19:24:54', '2018-01-01 19:24:54'),
(51, 1, 15, '2018-01-01 19:34:22', '2018-01-01 19:34:22'),
(52, 4, 15, '2018-01-01 19:57:21', '2018-01-01 19:57:21'),
(53, 2, 15, '2018-01-02 01:54:52', '2018-01-02 01:54:52'),
(54, 4, 15, '2018-01-02 01:55:08', '2018-01-02 01:55:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fruits`
--
ALTER TABLE `fruits`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Username` (`name`),
  ADD KEY `ID` (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
