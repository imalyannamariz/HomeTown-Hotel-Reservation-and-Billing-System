-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2018 at 03:11 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

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
  `Discount_Id` int(11) NOT NULL,
  `Addon_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addons_masterfile`
--

INSERT INTO `addons_masterfile` (`Addon_ID`, `Addon_name`, `Addon_rate`, `Addon_description`, `Addon_status`, `Discount_Id`, `Addon_qty`) VALUES
(1, 'Extra Bed', 400, 'None', 'Available', 9, 15),
(2, 'Extra Pillow', 100, 'None', 'Available', 9, 15),
(4, 'Shuttle service', 150, 'None', 'Available', 9, 1);

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
(2, 'aaaa', 'aaaaaa', 'aaaa@gmail.com', 'Admin', '123'),
(6, 'aya aya', 'aya', 'aya@gmail.com', 'Admin', '$2y$10$w190AMJ0VrxhTLAg/cXq6.4b61bA9o8dXO4L3uOxIpurrt7czW906'),
(10, 'Cardi', 'B', 'cardib@gmail.com', 'Admin', '$2y$10$U8c5bcv3e4O4opw/BH4kx.0y2uA01Imixk2oIcKFrRIJlh/vUUujq');

-- --------------------------------------------------------

--
-- Table structure for table `assignedroom_masterfile`
--

CREATE TABLE `assignedroom_masterfile` (
  `room_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `assignedroom_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignedroom_masterfile`
--

INSERT INTO `assignedroom_masterfile` (`room_id`, `date`, `assignedroom_id`, `status`, `type`, `code`) VALUES
(7, '2018-02-08', 155, 'Reserved', 'Walkin', 'JTNT14MRON'),
(7, '2018-02-09', 156, 'Reserved', 'Walkin', 'JTNT14MRON'),
(8, '2018-02-08', 157, 'Reserved', 'Walkin', 'JTNT14MRON'),
(8, '2018-02-09', 158, 'Reserved', 'Walkin', 'JTNT14MRON'),
(9, '2018-02-08', 159, 'Reserved', 'Walkin', 'JTNT14MRON'),
(9, '2018-02-09', 160, 'Reserved', 'Walkin', 'JTNT14MRON'),
(10, '2018-02-08', 161, 'Reserved', 'Walkin', 'JTNT14MRON'),
(10, '2018-02-09', 162, 'Reserved', 'Walkin', 'JTNT14MRON'),
(11, '2018-02-08', 163, 'Reserved', 'Walkin', 'JTNT14MRON'),
(11, '2018-02-09', 164, 'Reserved', 'Walkin', 'JTNT14MRON'),
(12, '2018-02-08', 165, 'Reserved', 'Walkin', 'JTNT14MRON'),
(12, '2018-02-09', 166, 'Reserved', 'Walkin', 'JTNT14MRON'),
(12, '2018-02-10', 179, 'Temporary', 'Reservation', 'CFRH9LASU3'),
(12, '2018-02-11', 180, 'Temporary', 'Reservation', 'CFRH9LASU3'),
(13, '2018-02-07', 181, 'Reserved', 'Walkin', 'ONRSR0SO7P'),
(13, '2018-02-08', 182, 'Reserved', 'Walkin', 'ONRSR0SO7P'),
(14, '2018-02-07', 183, 'Reserved', 'Walkin', 'G5AY1TPY4N'),
(14, '2018-02-08', 184, 'Reserved', 'Walkin', 'G5AY1TPY4N'),
(13, '2018-02-10', 185, 'Temporary', 'Reservation', 'DMDMYET9V7'),
(13, '2018-02-11', 186, 'Temporary', 'Reservation', 'DMDMYET9V7'),
(14, '2018-02-10', 187, 'Temporary', 'Reservation', 'HVC4WNP3NG'),
(14, '2018-02-11', 188, 'Temporary', 'Reservation', 'HVC4WNP3NG'),
(15, '2018-02-10', 189, 'Temporary', 'Reservation', 'HVC4WNP3NG'),
(15, '2018-02-11', 190, 'Temporary', 'Reservation', 'HVC4WNP3NG'),
(15, '2018-02-07', 191, 'Reserved', 'Walkin', '6W1CARY9IV'),
(15, '2018-02-08', 192, 'Reserved', 'Walkin', '6W1CARY9IV'),
(1, '2018-02-11', 193, 'Temporary', 'Reservation', 'ESZN5TAPFT');

-- --------------------------------------------------------

--
-- Table structure for table `billing_masterfile`
--

CREATE TABLE `billing_masterfile` (
  `billing_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `balance` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` varchar(30) NOT NULL,
  `total` float NOT NULL,
  `downpayment` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(9, 50, 'Year End Sale', 'Happy New Year! Putukan na!!!! ey');

-- --------------------------------------------------------

--
-- Table structure for table `financialreports_masterfile`
--

CREATE TABLE `financialreports_masterfile` (
  `payment` int(11) NOT NULL,
  `payment_type` text NOT NULL,
  `created_at` datetime NOT NULL,
  `billing_id` int(11) NOT NULL,
  `financialreport_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financialreports_masterfile`
--

INSERT INTO `financialreports_masterfile` (`payment`, `payment_type`, `created_at`, `billing_id`, `financialreport_id`) VALUES
(150, 'Fully Paid', '2018-02-09 14:10:32', 5, 26),
(150, 'Fully Paid', '2018-02-09 14:13:28', 5, 27),
(600, 'Partial', '2018-02-09 14:50:26', 73, 28),
(500, 'Partial', '2018-02-10 09:29:56', 73, 29);

-- --------------------------------------------------------

--
-- Table structure for table `guestaddons_masterfile`
--

CREATE TABLE `guestaddons_masterfile` (
  `guestaddon_id` int(11) NOT NULL,
  `addons_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `guest_address` varchar(200) NOT NULL,
  `guest_code` varchar(10) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest_masterfile`
--

INSERT INTO `guest_masterfile` (`guest_ID`, `guest_firstname`, `guest_lastname`, `guest_email`, `guest_password`, `guest_contactNumber`, `guest_country`, `guest_address`, `guest_code`, `count`) VALUES
(5, 'Alyanna', 'Cantos', 'antonioumali@gmail.com', '$2y$10$.bcv9EAuXOilfBW9Tdn2r.1eHh3VbK/YeUbvIgjIIyZ.lVEfUjry2', '09357771340', 'Philippines', 'Tramo Pasay City', '', 0),
(6, 'Mark', 'Calma', 'markdcalma@gmail.com', '$2y$10$t.eEG1fUpNQYW81Apqi.I.6bv05uQErBJEl5EJmX1YCuuQWdyxhJu', '09357771340', 'Philippines', 'Tramo', '', 0),
(7, 'jerome', 'ubina', 'jeromeubina@gmail.com', '$2y$10$8M3NYfZcem4ndy4X8dh09.t2744A7wM3a0utqYHSQlpG8fBQJZBkS', '09357771340', 'Philippines', 'Tramo', '', 0),
(8, 'Jerry', 'Punzalan', 'jerry@gmail.com', '$2y$10$TI3PeuagEBUq6Ee336iNLeuZMvv6y7YPeo/Y7Aqp1.yZLlurhvPfm', '09357771340', 'Philippines', 'Tramo', '', 0),
(9, 'Acis', 'Torculas', 'aaaa@gmail.com', '$2y$10$wWGvFDQc/rH.sY./y7fhQe0MldVoZs9ectuM7txm3jLH0mHJ.C3fy', '923456672', 'Philippines', '1st Street Villamor Airbase Pasay City', '', 11),
(13, 'Jerry', 'Punzalan', 'jerrypunzalan24@gmail.com', '$2y$10$ixQMZMiIkW4zeiqt5XWTM.25FltA5kAR0PSLGL1L9kjX/IO5zfP02', '09156155821', 'Philippines', 'asdqwe', '', 0),
(18, 'top', 'kek', 'aaaa@gmail.com', '$2y$10$uHX/rcNapLSP330ZwHGyouVAV1K59NGydQHyxaiQpa7kJlPEAeAXy', '9156155821', 'Philippines', 'qweaswqe', 'P8OB1ZJ', 0),
(19, 'qweqweqweqwewq', 'qweqeqwe', 'qweqweqwewq@yahoo.com', '$2y$10$TzS1qoADPh46jo0M2nqJpOysqUHUnK2NG3TK0yFUiUvCUbo1cx5U.', '09353351911', 'Philippines', '123qwe123qwe', 'WX1W3ZIRLJ', 0),
(20, 'Omar', 'Labio', 'omar@gmail.com', '$2y$10$oquHrllpS6BRw2awW/.Tque5HRdkTtB1/962303Mbu322mexdOOEu', '123123123', 'Philippines', '1231223', '36JKXH9YV8', 0),
(21, 'Acis', 'Umali', 'acisumali@yahoo.com', '$2y$10$otCBJoddVEhU6cmWUnJuY.cCVlGuhWMMh..6V1Xab2m7N2ZOI4Nf2', '123123', 'Philippines', '123123123123', '0OQ5T3XBG', 0),
(22, 'Acis', 'Umali', 'acisumal11i@yahoo.com', '$2y$10$/MFJ0J2Tn5slXqY/zwS4UeBVPwbwrgIHIuOHqrH7BD6FNm.FAw346', '123123', 'Philippines', '123123123123', '3KFG5S0N22', 0),
(23, 'Acis', 'Umali', 'acisumal111i@yahoo.com', '$2y$10$fCbk/mmWECBkilv7/nyqwuHpag/Aqmh0pxFFOYBbUlvs0uPiGupyy', '123123', 'Philippines', '123123123123', '8ZLD6CGOLS', 1),
(24, 'Alyanna', 'Cnatos', 'alyannamariz@gmail.com', '$2y$10$2kWqT402aek/AjYSV/klAuRvCxnickNnw6pSvb9q0rZJRkeJ1qCE.', '09277359665', 'Philippines', 'qweqweqweqw', 'EBVTVX58F3', 1),
(25, 'Anton', 'Umali', 'antonumali1111@gmail.com', '$2y$10$yrHNDTR87le.qX7QLT7a6ul526mE9eFAxGhCwC25ihYX6cZt3sDky', '09353351911', 'Philippines', 'Sampaloc, Manila', 'LGJKUBWLOV', 2),
(26, 'Jeemar', 'Flores', 'jeemarmflores@yahoo.com', '$2y$10$BsvERlhOFgl7t7.SDvKkpOXs17RXcZc60DOi9L6uW/zMZ21IqA42.', '09451541471', 'Philippines', '439 L. Francisco St. Pasay City', 'F8YPM04FF1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `proofofpayment_masterfile`
--

CREATE TABLE `proofofpayment_masterfile` (
  `proofofpayment_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receipts_masterfile`
--

CREATE TABLE `receipts_masterfile` (
  `receipts_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `reservationreports_masterfile`
--

CREATE TABLE `reservationreports_masterfile` (
  `reservereports_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_masterfile`
--

CREATE TABLE `reservation_masterfile` (
  `reservation_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `checkindate` date NOT NULL,
  `checkoutdate` date NOT NULL,
  `number_guest` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `reservation_code` varchar(10) NOT NULL
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
  `room_rate` float NOT NULL,
  `room_number` int(11) NOT NULL,
  `room_status` varchar(50) NOT NULL,
  `room_imagepath` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `walkinreservation_masterfile`
--

CREATE TABLE `walkinreservation_masterfile` (
  `reservation_id` int(11) NOT NULL,
  `room_id` varchar(11) NOT NULL,
  `checkindate` date NOT NULL,
  `checkoutdate` date NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `code` varchar(10) NOT NULL,
  `balance` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `walkinrooms_masterfile`
--

CREATE TABLE `walkinrooms_masterfile` (
  `walkinrooms_id` int(11) NOT NULL,
  `walkinrooms_name` varchar(30) NOT NULL,
  `room_id` int(11) NOT NULL
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
-- Indexes for table `assignedroom_masterfile`
--
ALTER TABLE `assignedroom_masterfile`
  ADD PRIMARY KEY (`assignedroom_id`);

--
-- Indexes for table `billing_masterfile`
--
ALTER TABLE `billing_masterfile`
  ADD PRIMARY KEY (`billing_id`);

--
-- Indexes for table `discount_masterfile`
--
ALTER TABLE `discount_masterfile`
  ADD PRIMARY KEY (`discount_ID`);

--
-- Indexes for table `financialreports_masterfile`
--
ALTER TABLE `financialreports_masterfile`
  ADD PRIMARY KEY (`financialreport_id`);

--
-- Indexes for table `guestaddons_masterfile`
--
ALTER TABLE `guestaddons_masterfile`
  ADD PRIMARY KEY (`guestaddon_id`);

--
-- Indexes for table `guest_masterfile`
--
ALTER TABLE `guest_masterfile`
  ADD PRIMARY KEY (`guest_ID`);

--
-- Indexes for table `proofofpayment_masterfile`
--
ALTER TABLE `proofofpayment_masterfile`
  ADD PRIMARY KEY (`proofofpayment_id`);

--
-- Indexes for table `receipts_masterfile`
--
ALTER TABLE `receipts_masterfile`
  ADD PRIMARY KEY (`receipts_id`);

--
-- Indexes for table `reports_masterfile`
--
ALTER TABLE `reports_masterfile`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `reservationreports_masterfile`
--
ALTER TABLE `reservationreports_masterfile`
  ADD PRIMARY KEY (`reservereports_id`);

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
-- Indexes for table `walkinreservation_masterfile`
--
ALTER TABLE `walkinreservation_masterfile`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `walkinrooms_masterfile`
--
ALTER TABLE `walkinrooms_masterfile`
  ADD PRIMARY KEY (`walkinrooms_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addons_masterfile`
--
ALTER TABLE `addons_masterfile`
  MODIFY `Addon_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `adminuser_masterfile`
--
ALTER TABLE `adminuser_masterfile`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `assignedroom_masterfile`
--
ALTER TABLE `assignedroom_masterfile`
  MODIFY `assignedroom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `billing_masterfile`
--
ALTER TABLE `billing_masterfile`
  MODIFY `billing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `discount_masterfile`
--
ALTER TABLE `discount_masterfile`
  MODIFY `discount_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `financialreports_masterfile`
--
ALTER TABLE `financialreports_masterfile`
  MODIFY `financialreport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `guestaddons_masterfile`
--
ALTER TABLE `guestaddons_masterfile`
  MODIFY `guestaddon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `guest_masterfile`
--
ALTER TABLE `guest_masterfile`
  MODIFY `guest_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `proofofpayment_masterfile`
--
ALTER TABLE `proofofpayment_masterfile`
  MODIFY `proofofpayment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `receipts_masterfile`
--
ALTER TABLE `receipts_masterfile`
  MODIFY `receipts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reports_masterfile`
--
ALTER TABLE `reports_masterfile`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation_masterfile`
--
ALTER TABLE `reservation_masterfile`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `room_masterfile`
--
ALTER TABLE `room_masterfile`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `walkinreservation_masterfile`
--
ALTER TABLE `walkinreservation_masterfile`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `walkinrooms_masterfile`
--
ALTER TABLE `walkinrooms_masterfile`
  MODIFY `walkinrooms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
