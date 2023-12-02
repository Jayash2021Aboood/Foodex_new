-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 02, 2023 at 06:44 AM
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
-- Database: `foodex_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `added_date` datetime NOT NULL,
  `donator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `name`, `details`, `quantity`, `photo`, `state`, `added_date`, `donator_id`) VALUES
(1, 'donation1', 'any details', 34, 'book2.jpg', 'sold out', '2023-11-18 00:00:00', 2),
(2, 'donation2', '3 deches of rice with soap', 4, 'book2.jpg', 'sold out', '2023-11-27 11:31:22', 3),
(3, 'Mandi Checken food ', 'dileshes checken bla bla bla ', 3, 'h4.jpg', 'sold out', '2023-11-28 03:42:44', 3),
(4, 'cow Milk ', 'three Galon Cows milk', 3, 'WhatsApp Image 2023-07-03 at 7.41.13 PM.jpeg', 'sold out', '2023-12-02 03:31:08', 5);

-- --------------------------------------------------------

--
-- Table structure for table `donator`
--

CREATE TABLE `donator` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `corporate_field` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `donator`
--

INSERT INTO `donator` (`id`, `type`, `name`, `corporate_field`, `phone`, `email`, `password`, `active`) VALUES
(1, 'individual', 'huda naser', '', '0566433444', 'huda@gmail.com', 'huda', 1),
(2, 'corporate', 'Mauadah', 'E-commerce', '096338826663', 'Mauadah@gmail.com', 'mauadah', 0),
(3, 'individual', 'donator22', '', '0083777733', 'donator22@gmail.com', 'donator22', 1),
(4, 'individual', 'modra', '', '0083777733', 'mondra@gmail.com', 'mondra123', 1),
(5, 'corporate', 'dw1', 'dw1', '9877398399984', 'dw1@gmail.com', 'dw1', 1),
(6, 'individual', 'aa', '', '4455999300', 'r@e.vp', '12345678', 0),
(7, 'individual', 'uu', '', '00993378844', '2@f.c', '12345678', 0);

-- --------------------------------------------------------

--
-- Table structure for table `receiver`
--

CREATE TABLE `receiver` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `receiver`
--

INSERT INTO `receiver` (`id`, `name`, `location`, `phone`, `email`, `password`, `active`) VALUES
(1, 'naser Khaled', 'jedah', '0998833', 'naser@gmail.com', 'naser', 1),
(2, 'ali Muneer', 'Jazan', '096338826663', 'ali@gmail.com', 'ali', 0),
(6, 'nosa', 'mosa losa', '0009938883', 'nosa@gmail.com', '12345678', 1),
(7, 'rw1', 'rw1', '9003378993893', 'rw1@gmail.com', 'rw1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `receiver_order`
--

CREATE TABLE `receiver_order` (
  `id` int(11) NOT NULL,
  `donation_id` int(11) NOT NULL,
  `donator_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `receiver_order`
--

INSERT INTO `receiver_order` (`id`, `donation_id`, `donator_id`, `receiver_id`, `order_date`) VALUES
(1, 1, 1, 2, '2023-11-18 23:45:17'),
(2, 2, 4, 6, '2023-11-27 11:59:57'),
(3, 3, 3, 6, '2023-11-28 04:43:51'),
(6, 2, 3, 7, '2023-12-02 03:28:40'),
(7, 4, 5, 7, '2023-12-02 06:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `webuser`
--

CREATE TABLE `webuser` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `webuser`
--

INSERT INTO `webuser` (`id`, `email`, `usertype`) VALUES
(1, 'admin@gmail.com', 'a'),
(2, 'ali@gmail.com', 'e'),
(3, 'q@gmail.com', 'e'),
(4, 'maryam@gmail.com', 'c'),
(5, 'bushra@gmail.com', 's'),
(6, 'hadeel@gmail.com', 's'),
(7, 'm@gmail.com', 's'),
(8, 't@gmail.com', 's'),
(9, 'gg@gmail.com', 'e'),
(10, 'ssaa3002012@gmail.com', 's'),
(15, 'nosa@gmail.com', 'r'),
(16, 'donator22@gmail.com', 'd'),
(17, 'mondra@gmail.com', 'd'),
(18, 'rw1@gmail.com', 'r'),
(19, 'dw1@gmail.com', 'd'),
(20, 'r@e.vp', 'd'),
(21, '2@f.c', 'd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_donation_donator` (`donator_id`);

--
-- Indexes for table `donator`
--
ALTER TABLE `donator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receiver`
--
ALTER TABLE `receiver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receiver_order`
--
ALTER TABLE `receiver_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_donation` (`donation_id`),
  ADD KEY `fk_order_donator` (`donator_id`),
  ADD KEY `fk_order_receiver` (`receiver_id`);

--
-- Indexes for table `webuser`
--
ALTER TABLE `webuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donator`
--
ALTER TABLE `donator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `receiver`
--
ALTER TABLE `receiver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `receiver_order`
--
ALTER TABLE `receiver_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `webuser`
--
ALTER TABLE `webuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `fk_donation_donator` FOREIGN KEY (`donator_id`) REFERENCES `donator` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receiver_order`
--
ALTER TABLE `receiver_order`
  ADD CONSTRAINT `fk_order_donation` FOREIGN KEY (`donation_id`) REFERENCES `donation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_order_donator` FOREIGN KEY (`donator_id`) REFERENCES `donator` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_order_receiver` FOREIGN KEY (`receiver_id`) REFERENCES `receiver` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
