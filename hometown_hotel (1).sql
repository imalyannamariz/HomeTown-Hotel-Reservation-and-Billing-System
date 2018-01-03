-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2018 at 04:31 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hometown_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `addons_masterfile`
--

CREATE TABLE `addons_masterfile` (
  `Addon_ID` int(11) NOT NULL,
  `Addon_name` varchar(50) NOT NULL,
  `Addon_rate` int(11) NOT NULL,
  `Addon_description` varchar(50) NOT NULL,
  `Addon_status` varchar(50) NOT NULL,
  `Discount_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `adminuser_masterfile`
--

CREATE TABLE `adminuser_masterfile` (
  `user_id` int(11) NOT NULL,
  `User_firstname` varchar(255) NOT NULL,
  `User_lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin_type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminuser_masterfile`
--

INSERT INTO `adminuser_masterfile` (`user_id`, `User_firstname`, `User_lastname`, `email`, `admin_type`, `password`) VALUES
(1, 'aya', 'cantos', 'cantosalyannamariz@gmail.com', 'Admin', '123'),
(2, 'aaaa', 'aaaaaa', 'aaaa@gmail.com', 'Admin', '123'),
(4, 'aya', 'ganda', 'cg@cg.com', 'FrontDesk', '$2y$10$o8IY08FmU5eZuKqRBrWE5ejUIWlFvx6VRzpolsJAFrlzm0NnmY0gS'),
(5, 'mark', 'calma', 'mark@gmail.com', 'Admin', '$2y$10$i2KVRFOhLsGgaQzhVgkIUuS7gm8AdiySopQH58sPdTxXySkfXSiy.'),
(6, 'aya aya', 'aya', 'aya@gmail.com', 'Admin', '$2y$10$w190AMJ0VrxhTLAg/cXq6.4b61bA9o8dXO4L3uOxIpurrt7czW906'),
(7, 'mark jefferson', 'danganan calma', 'markcalma@gmail.com', 'Admin', '$2y$10$NndMA81KG8vtgfcJ7DVWgOMrAHGA.y50XibiTzSpCp7KRrp1H.m1K'),
(8, 'Nicki', 'MInaj', 'nickiminaj@gmail.com', 'Admin', '$2y$10$E6CfqpovzgqQ/3g986e6PuacUxUGlPksd3v4jGMYANBi6Vh6iWkeS'),
(9, 'mark', 'calma', 'markamar@gmail.com', '', '$2y$10$OxkLtXv2OQOaSsdgo8dPqe.uYad/ibbYuHPEYLxUs48wckTKipbE.');

-- --------------------------------------------------------

--
-- Table structure for table `discount_masterfile`
--

CREATE TABLE `discount_masterfile` (
  `discount_ID` int(11) NOT NULL,
  `discount_percent` int(11) NOT NULL,
  `discount_name` varchar(50) NOT NULL,
  `discount_description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount_masterfile`
--

INSERT INTO `discount_masterfile` (`discount_ID`, `discount_percent`, `discount_name`, `discount_description`) VALUES
(6, 20, 'Promo', 'Enter discount description here...');

-- --------------------------------------------------------

--
-- Table structure for table `guest_masterfile`
--

CREATE TABLE `guest_masterfile` (
  `guest_ID` int(11) NOT NULL,
  `guest_firstname` varchar(50) NOT NULL,
  `guest_lastname` varchar(50) NOT NULL,
  `guest_email` varchar(200) NOT NULL,
  `guest_password` varchar(200) NOT NULL,
  `guest_contactNumber` text NOT NULL,
  `guest_country` varchar(200) NOT NULL,
  `guest_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest_masterfile`
--

INSERT INTO `guest_masterfile` (`guest_ID`, `guest_firstname`, `guest_lastname`, `guest_email`, `guest_password`, `guest_contactNumber`, `guest_country`, `guest_address`) VALUES
(1, 'aaaa', 'aaaaaa', 'aaaa@gmail.com', '123', '123', 'Philippines', 'aqqw3sww'),
(2, 'alyanna', 'cantos', 'cantosalyannamariz@gmail.com', '$2y$10$q8.8IPBhMJyQ11gdEUwwoeuvq0XmoSeBDDzb3rcAlk24YrDlSNXPm', '09357771340', 'Philippines', '123'),
(3, 'aya', 'cantos', 'alyannamariz02@gmail.com', '$2y$10$1ElVGPVEr.nLEVRB8gV5NOzdio/N32GeywHMNMqyuOYAIokLMBsde', '09357771340', 'Philippines', '123'),
(4, 'aaaa', 'aaaaaa', 'aaa@gmail.com', '$2y$10$y3qjGIOupamrsfxdfZ9mG.YXaBIWqDcjXskqtaGUJYkS4EPlAcxa2', '09357771340', 'Philippines', 'aqqw3sww'),
(5, 'aya', 'aya', 'bbbb@gmail.com', '$2y$10$3feEUfxMbQ5/6RU218EXGeKSTeayMKbVaHQ.nCCitkKAuxpITgN.m', '09357771340', 'Philippines', '123');

-- --------------------------------------------------------

--
-- Table structure for table `reports_masterfile`
--

CREATE TABLE `reports_masterfile` (
  `report_id` int(11) NOT NULL,
  `date_generated` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_masterfile`
--

CREATE TABLE `reservation_masterfile` (
  `reservation_id` int(11) NOT NULL,
  `addon_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `checkindate` date NOT NULL,
  `checkoutdate` date NOT NULL,
  `number_guest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room_masterfile`
--

CREATE TABLE `room_masterfile` (
  `room_id` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `room_description` varchar(50) NOT NULL,
  `room_capacity` varchar(50) NOT NULL,
  `room_rate` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `room_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_masterfile`
--

INSERT INTO `room_masterfile` (`room_id`, `room_type`, `room_description`, `room_capacity`, `room_rate`, `room_number`, `room_status`) VALUES
(1, 'queen', 'pakyu', '3', 1200, 12, 'Available'),
(2, 'King', 'Malake', '5', 3000, 123, 'Available'),
(3, 'California king bed', 'Rihanna', '1', 10000, 200001, 'Available'),
(4, 'California king bed11', 'Rihanna', '1', 10000, 200001, 'Available'),
(5, 'Twin Room', 'For twins only', '2', 1200, 201, 'UnderMaintenance');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_masterfile`
--

CREATE TABLE `transaction_masterfile` (
  `Transaction_number` int(11) NOT NULL,
  `TotalBill` int(11) NOT NULL,
  `Balance` int(11) NOT NULL,
  `Transaction_date` date NOT NULL,
  `Checkin_Date` date NOT NULL,
  `CheckOut_Date` date NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Guest_id` int(11) NOT NULL,
  `Room_id` int(11) NOT NULL,
  `Addon_id` int(11) NOT NULL,
  `Reservation_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons_masterfile`
--
ALTER TABLE `addons_masterfile`
  ADD PRIMARY KEY (`Addon_ID`);

--
-- Indexes for table `adminuser_masterfile`
--
ALTER TABLE `adminuser_masterfile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `discount_masterfile`
--
ALTER TABLE `discount_masterfile`
  ADD PRIMARY KEY (`discount_ID`);

--
-- Indexes for table `guest_masterfile`
--
ALTER TABLE `guest_masterfile`
  ADD PRIMARY KEY (`guest_ID`);

--
-- Indexes for table `reports_masterfile`
--
ALTER TABLE `reports_masterfile`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `reservation_masterfile`
--
ALTER TABLE `reservation_masterfile`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `room_masterfile`
--
ALTER TABLE `room_masterfile`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `transaction_masterfile`
--
ALTER TABLE `transaction_masterfile`
  ADD PRIMARY KEY (`Transaction_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addons_masterfile`
--
ALTER TABLE `addons_masterfile`
  MODIFY `Addon_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adminuser_masterfile`
--
ALTER TABLE `adminuser_masterfile`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `discount_masterfile`
--
ALTER TABLE `discount_masterfile`
  MODIFY `discount_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guest_masterfile`
--
ALTER TABLE `guest_masterfile`
  MODIFY `guest_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reports_masterfile`
--
ALTER TABLE `reports_masterfile`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation_masterfile`
--
ALTER TABLE `reservation_masterfile`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_masterfile`
--
ALTER TABLE `room_masterfile`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction_masterfile`
--
ALTER TABLE `transaction_masterfile`
  MODIFY `Transaction_number` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
