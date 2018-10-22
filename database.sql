-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 22, 2018 at 10:09 PM
-- Server version: 5.6.35-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payment_process`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` float(10,2) NOT NULL,
  `status` enum('paid','in-progress','failed','process','shipped','complete') NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `amount`, `status`, `payment_id`, `submitted_at`, `created_at`, `updated_at`) VALUES
(1, 100.00, 'in-progress', 0, '2018-10-22 19:48:34', '2018-10-23 00:47:03', '2018-10-23 01:16:19');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `time_created` datetime NOT NULL,
  `name` varchar(200) NOT NULL,
  `credit_card_number` varchar(20) NOT NULL,
  `credit_card_expiry_month` int(2) NOT NULL,
  `credit_card_expiry_year` int(4) NOT NULL,
  `company` varchar(200) NOT NULL,
  `line1` text NOT NULL,
  `line2` text NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `zip` int(6) NOT NULL,
  `status` enum('in-progress','paid','failed','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
