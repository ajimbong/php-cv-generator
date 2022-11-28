-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 04:12 PM
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
-- Database: `cv_generator`
--

-- --------------------------------------------------------

--
-- Table structure for table `cv_details`
--

CREATE TABLE `cv_details` (
  `id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `github` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `objective` text NOT NULL,
  `skills` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cv_details`
--

INSERT INTO `cv_details` (`id`, `user_email`, `photo`, `name`, `contact`, `email`, `address`, `github`, `linkedin`, `objective`, `skills`) VALUES
(1, 'contact@ajimbong.me', 'uploads/contact@ajimbong.me.png', 'Ajim', '676602992', 'contact@ajimbong.me', 'Essos', 'github.com/ajimbong', 'linkedin.com/ajimbong', ' To program for the world', 'programming, scripting, coding'),
(2, '', 'uploads/.jpg', 'W', '456', 'w@w.com', 'Bambili', 'github.com', 'linked.com', ' rename the place', 'nothing'),
(3, 'w@w.com', 'uploads/w@w.com.jpg', 'jim', '123', 'w@w.com', 'localhost', 'github.com', 'linked.com', ' eat', 'nothing');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `created_at` int(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `pass`, `created_at`) VALUES
(1, 'contact@ajimbong.me', 'UBa22PB0044', 2147483647),
(2, 'w@w.com', 'UBa20PB0044', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cv_details`
--
ALTER TABLE `cv_details`
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
-- AUTO_INCREMENT for table `cv_details`
--
ALTER TABLE `cv_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
