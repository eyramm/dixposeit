-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2018 at 06:12 PM
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
-- Database: `dixpose`
--

-- --------------------------------------------------------

--
-- Table structure for table `bins`
--

CREATE TABLE `bins` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `bin_id` int(11) NOT NULL,
  `bins_tanken` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `supervisor_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `other_names` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `phone_no_2` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `collection_frequency` int(11) NOT NULL,
  `bin_count` int(11) NOT NULL,
  `physical_address` varchar(255) NOT NULL,
  `gps_location` varchar(255) NOT NULL,
  `address_tag` varchar(255) NOT NULL,
  `sector_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_bin`
--

CREATE TABLE `customer_bin` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `bin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `driver_categories`
--

CREATE TABLE `driver_categories` (
  `id` int(11) NOT NULL,
  `class` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_categories`
--

INSERT INTO `driver_categories` (`id`, `class`) VALUES
(1, 'Class A'),
(2, 'Class B');

-- --------------------------------------------------------

--
-- Table structure for table `electoral_areas`
--

CREATE TABLE `electoral_areas` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `excess_bins`
--

CREATE TABLE `excess_bins` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `bin_id` int(11) NOT NULL,
  `excess_bins` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `sector_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE `sectors` (
  `id` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `electoral_area_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trucks`
--

CREATE TABLE `trucks` (
  `id` int(11) NOT NULL,
  `supervisor_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `reg_no` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `chassis_no` varchar(255) NOT NULL,
  `mileage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `truck_categories`
--

CREATE TABLE `truck_categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `other_names` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `phone_no_2` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('supervisor','driver') NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `license_id` varchar(255) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `sector_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `other_names`, `email`, `phone_no`, `phone_no_2`, `username`, `password`, `type`, `parent`, `license_id`, `class_id`, `sector_id`) VALUES
(1, 'Admin', 'User', '', 'admin@gmail.com', '0200000000', '', 'admin', '$2y$10$CTJgu/t6L5MN5F3zQh3FPOrMxNCZXQFEUVQc9BdAGMwNG92e3jVOC', 'supervisor', 0, '', NULL, NULL),
(2, 'Emmanuel', 'Fache', '', 'emrade95@gmail.com', '0209436736', '', 'emrade', '$2y$10$CTJgu/t6L5MN5F3zQh3FPOrMxNCZXQFEUVQc9BdAGMwNG92e3jVOC', 'supervisor', 0, '', 1, NULL),
(3, 'Eyram', 'Amedzor', '', 'amedzor13@gmail.com', '0205853322', '', 'eyramm', '$2y$10$CTJgu/t6L5MN5F3zQh3FPOrMxNCZXQFEUVQc9BdAGMwNG92e3jVOC', 'supervisor', 0, '', NULL, NULL),
(4, 'John', '', '', '', '', '', '', '', 'driver', 2, '', 1, 3),
(5, 'Zargo', '', '', '', '', '', '', '', 'driver', 2, '', 1, 3),
(6, 'Zargin', '', '', '', '', '', '', '', 'driver', 2, '', 1, 3),
(7, 'JY', 'Garo', '', '', '', '', '', '', 'driver', 2, '', 1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bins`
--
ALTER TABLE `bins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `bin_id` (`bin_id`),
  ADD KEY `supervisor_id` (`supervisor_id`) USING BTREE;

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supervisor_id` (`supervisor_id`),
  ADD KEY `sector_id` (`sector_id`);

--
-- Indexes for table `customer_bin`
--
ALTER TABLE `customer_bin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `bin_id` (`bin_id`);

--
-- Indexes for table `driver_categories`
--
ALTER TABLE `driver_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `electoral_areas`
--
ALTER TABLE `electoral_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `excess_bins`
--
ALTER TABLE `excess_bins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `bin_id` (`bin_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supervisor_id` (`supervisor_id`),
  ADD KEY `sector_id` (`sector_id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `electoral_area_id` (`electoral_area_id`),
  ADD KEY `supervisor_id` (`supervisor_id`);

--
-- Indexes for table `trucks`
--
ALTER TABLE `trucks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `supervisor_id` (`supervisor_id`);

--
-- Indexes for table `truck_categories`
--
ALTER TABLE `truck_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `sector_id` (`sector_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bins`
--
ALTER TABLE `bins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `customer_bin`
--
ALTER TABLE `customer_bin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `driver_categories`
--
ALTER TABLE `driver_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `electoral_areas`
--
ALTER TABLE `electoral_areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `excess_bins`
--
ALTER TABLE `excess_bins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `trucks`
--
ALTER TABLE `trucks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `truck_categories`
--
ALTER TABLE `truck_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `collections`
--
ALTER TABLE `collections`
  ADD CONSTRAINT `collections_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `collections_ibfk_2` FOREIGN KEY (`bin_id`) REFERENCES `bins` (`id`),
  ADD CONSTRAINT `collections_ibfk_3` FOREIGN KEY (`supervisor_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`supervisor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_bin`
--
ALTER TABLE `customer_bin`
  ADD CONSTRAINT `customer_bin_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `customer_bin_ibfk_2` FOREIGN KEY (`bin_id`) REFERENCES `bins` (`id`);

--
-- Constraints for table `excess_bins`
--
ALTER TABLE `excess_bins`
  ADD CONSTRAINT `excess_bins_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `excess_bins_ibfk_2` FOREIGN KEY (`bin_id`) REFERENCES `bins` (`id`);

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`supervisor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedules_ibfk_2` FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sectors`
--
ALTER TABLE `sectors`
  ADD CONSTRAINT `sectors_ibfk_1` FOREIGN KEY (`electoral_area_id`) REFERENCES `electoral_areas` (`id`),
  ADD CONSTRAINT `sectors_ibfk_2` FOREIGN KEY (`supervisor_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `trucks`
--
ALTER TABLE `trucks`
  ADD CONSTRAINT `trucks_ibfk_1` FOREIGN KEY (`supervisor_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `trucks_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `truck_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `driver_categories` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
