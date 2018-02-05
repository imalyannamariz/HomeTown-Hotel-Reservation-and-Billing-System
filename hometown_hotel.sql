-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2018 at 07:56 AM
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
(4, 'aya', 'ganda', 'cg@cg.com', 'FrontDesk', '$2y$10$o8IY08FmU5eZuKqRBrWE5ejUIWlFvx6VRzpolsJAFrlzm0NnmY0gS'),
(6, 'aya aya', 'aya', 'aya@gmail.com', 'Admin', '$2y$10$w190AMJ0VrxhTLAg/cXq6.4b61bA9o8dXO4L3uOxIpurrt7czW906'),
(8, 'Nicki', 'MInaj', 'nickiminaj@gmail.com', 'Admin', '$2y$10$E6CfqpovzgqQ/3g986e6PuacUxUGlPksd3v4jGMYANBi6Vh6iWkeS'),
(9, 'Jerome ', 'Minaj', 'nickiminajj@gmail.com', 'Admin', '$2y$10$6Ke4s3.FPlFCYlVrppmXLee9oB5NDfWUV8qkpf5sQqwvVbQC1VHhu'),
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
(1, '2018-02-05', 1, 'Reserved', 'Walkin', 'IVW20AC1C5'),
(1, '2018-02-06', 2, 'Reserved', 'Walkin', 'IVW20AC1C5'),
(1, '2018-02-07', 3, 'Reserved', 'Walkin', 'IVW20AC1C5'),
(1, '2018-02-05', 4, 'Reserved', 'Walkin', '1NTJDQAEZQ'),
(1, '2018-02-06', 5, 'Reserved', 'Walkin', '1NTJDQAEZQ'),
(1, '2018-02-07', 6, 'Reserved', 'Walkin', '1NTJDQAEZQ'),
(2, '2018-02-07', 17, 'Temporary', 'Reservation', '146PR6Q4DO'),
(2, '2018-02-08', 18, 'Temporary', 'Reservation', '146PR6Q4DO'),
(16, '2018-02-07', 19, 'Temporary', 'Reservation', 'RFIAN9WTUH'),
(16, '2018-02-08', 20, 'Temporary', 'Reservation', 'RFIAN9WTUH'),
(17, '2018-02-07', 21, 'Temporary', 'Reservation', 'RFIAN9WTUH'),
(17, '2018-02-08', 22, 'Temporary', 'Reservation', 'RFIAN9WTUH'),
(5, '2018-02-07', 27, 'Temporary', 'Reservation', 'L7WZ1M58OE'),
(5, '2018-02-08', 28, 'Temporary', 'Reservation', 'L7WZ1M58OE'),
(1, '2018-02-08', 33, 'Temporary', 'Reservation', 'G1BA8JI4UX'),
(1, '2018-02-09', 34, 'Temporary', 'Reservation', 'G1BA8JI4UX');

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

--
-- Dumping data for table `billing_masterfile`
--

INSERT INTO `billing_masterfile` (`billing_id`, `guest_id`, `reservation_id`, `balance`, `created_at`, `updated_at`, `status`, `total`, `downpayment`) VALUES
(5, 18, 37, 0, '2018-02-01 03:13:34', '2018-02-04 16:27:31', 'Partial', 1375, 198),
(44, 9, 72, 0, '2018-02-04 12:58:55', '2018-02-04 16:30:52', 'Fully Paid', 900, 135),
(45, 9, 73, 2500, '2018-02-04 16:07:09', '2018-02-04 17:03:49', 'Partial', 3000, 450),
(47, 2, 75, 0, '2018-02-04 22:53:28', '2018-02-04 23:00:33', 'Fully Paid', 880, 132),
(48, 6, 76, 0, '2018-02-04 23:21:57', '2018-02-05 14:26:51', 'Fully Paid', 3650, 547.5),
(50, 9, 78, 2000, '2018-02-05 14:43:20', '2018-02-05 14:43:20', 'Not paid', 2000, 300),
(51, 9, 79, 1150, '2018-02-05 14:48:25', '2018-02-05 14:48:25', 'Not paid', 1150, 172.5),
(52, 9, 80, 3400, '2018-02-05 14:48:47', '2018-02-05 14:48:47', 'Not paid', 3400, 510);

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
(12, 'Fully Paid', '2018-01-30 08:18:45', 0, 1),
(5555, 'Fully Paid', '2018-02-01 04:59:56', 0, 2),
(500, 'Partial', '2018-02-04 15:13:12', 0, 3),
(400, 'Partial', '2018-02-04 15:14:23', 0, 4),
(400, 'Partial', '2018-02-04 15:14:23', 0, 5),
(5, 'Partial', '2018-02-04 15:15:40', 0, 6),
(5, 'Partial', '2018-02-04 15:18:03', 0, 7),
(50, 'Partial', '2018-02-04 16:18:06', 5, 8),
(5, 'Partial', '2018-02-04 16:27:06', 5, 9),
(5, 'Partial', '2018-02-04 16:27:31', 5, 10),
(5, 'Partial', '2018-02-04 16:27:31', 5, 11),
(55, 'Partial', '2018-02-04 16:27:55', 44, 12),
(5, 'Partial', '2018-02-04 16:28:53', 44, 13),
(5, 'Partial', '2018-02-04 16:29:17', 44, 14),
(4, 'Partial', '2018-02-04 16:29:24', 44, 15),
(55, 'Partial', '2018-02-04 16:29:55', 44, 16),
(55, 'Partial', '2018-02-04 16:30:15', 44, 17),
(721, 'Fully Paid', '2018-02-04 16:30:52', 44, 18),
(500, 'Partial', '2018-02-04 17:03:49', 45, 19),
(132, 'Partial', '2018-02-04 23:00:02', 47, 20),
(750, 'Fully Paid', '2018-02-04 23:00:33', 47, 21),
(4000, 'Fully Paid', '2018-02-05 14:26:51', 48, 22);

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

--
-- Dumping data for table `guestaddons_masterfile`
--

INSERT INTO `guestaddons_masterfile` (`guestaddon_id`, `addons_id`, `reservation_id`, `quantity`) VALUES
(10, 1, 37, 0),
(12, 1, 72, 1),
(14, 1, 75, 1),
(15, 1, 76, 1),
(16, 2, 76, 1),
(17, 4, 76, 1),
(18, 1, 78, 1),
(19, 2, 78, 1),
(20, 1, 79, 1),
(21, 2, 79, 1),
(22, 4, 79, 1),
(23, 1, 80, 1);

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
(2, 'alyanna', 'cantos', 'cantosalyannamariz@gmail.com', '$2y$10$q8.8IPBhMJyQ11gdEUwwoeuvq0XmoSeBDDzb3rcAlk24YrDlSNXPm', '09357771340', 'Philippines', '123', '', 0),
(3, 'aya', 'cantos', 'alyannamariz02@gmail.com', '$2y$10$1ElVGPVEr.nLEVRB8gV5NOzdio/N32GeywHMNMqyuOYAIokLMBsde', '09357771340', 'Philippines', '123', '', 0),
(4, 'aaaa', 'aaaaaa', 'aaa@gmail.com', '$2y$10$y3qjGIOupamrsfxdfZ9mG.YXaBIWqDcjXskqtaGUJYkS4EPlAcxa2', '09357771340', 'Philippines', 'aqqw3sww', '', 0),
(5, 'Alyanna', 'Cantos', 'antonioumali@gmail.com', '$2y$10$.bcv9EAuXOilfBW9Tdn2r.1eHh3VbK/YeUbvIgjIIyZ.lVEfUjry2', '09357771340', 'Philippines', 'Tramo Pasay City', '', 0),
(6, 'Mark', 'Calma', 'markdcalma@gmail.com', '$2y$10$t.eEG1fUpNQYW81Apqi.I.6bv05uQErBJEl5EJmX1YCuuQWdyxhJu', '09357771340', 'Philippines', 'Tramo', '', 0),
(7, 'jerome', 'ubina', 'jeromeubina@gmail.com', '$2y$10$8M3NYfZcem4ndy4X8dh09.t2744A7wM3a0utqYHSQlpG8fBQJZBkS', '09357771340', 'Philippines', 'Tramo', '', 0),
(8, 'Jerry', 'Punzalan', 'jerry@gmail.com', '$2y$10$TI3PeuagEBUq6Ee336iNLeuZMvv6y7YPeo/Y7Aqp1.yZLlurhvPfm', '09357771340', 'Philippines', 'Tramo', '', 0),
(9, 'asdlaksd', 'lqkelqkwe', 'aaaa@gmail.com', '$2y$10$wWGvFDQc/rH.sY./y7fhQe0MldVoZs9ectuM7txm3jLH0mHJ.C3fy', '0923456672', 'Philippines', 'qwesadqwe', '', 3),
(13, 'Jerry', 'Punzalan', 'jerrypunzalan24@gmail.com', '$2y$10$ixQMZMiIkW4zeiqt5XWTM.25FltA5kAR0PSLGL1L9kjX/IO5zfP02', '09156155821', 'Philippines', 'asdqwe', '', 0),
(18, 'top', 'kek', 'aaaa@gmail.com', '$2y$10$uHX/rcNapLSP330ZwHGyouVAV1K59NGydQHyxaiQpa7kJlPEAeAXy', '9156155821', 'Philippines', 'qweaswqe', 'P8OB1ZJ', 0);

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

--
-- Dumping data for table `receipts_masterfile`
--

INSERT INTO `receipts_masterfile` (`receipts_id`, `guest_id`) VALUES
(3, 9),
(4, 2),
(5, 6);

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

--
-- Dumping data for table `reservationreports_masterfile`
--

INSERT INTO `reservationreports_masterfile` (`reservereports_id`, `reservation_id`, `created_at`, `updated_at`) VALUES
(0, 37, '2018-02-04 21:16:18', '2018-02-04 21:16:18');

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

--
-- Dumping data for table `reservation_masterfile`
--

INSERT INTO `reservation_masterfile` (`reservation_id`, `guest_id`, `room_id`, `checkindate`, `checkoutdate`, `number_guest`, `room_number`, `status`, `reservation_code`) VALUES
(36, 13, 6, '2018-02-04', '2018-02-05', 1, 2, 'Void', ''),
(37, 18, 7, '2018-02-04', '2018-02-05', 1, 1, 'Checkout', 'YGN9C3VE'),
(72, 9, 6, '2018-02-07', '2018-02-08', 1, 1, 'Pending', '146PR6Q4DO'),
(73, 9, 7, '2018-02-07', '2018-02-08', 1, 2, 'Pending', 'RFIAN9WTUH'),
(75, 2, 6, '2018-02-07', '2018-02-08', 1, 2, 'Pending', 'L7WZ1M58OE'),
(76, 6, 7, '2018-02-07', '2018-02-09', 1, 1, 'Pending', 'CBIIKKZ60Y'),
(78, 9, 7, '2018-02-08', '2018-02-09', 1, 1, 'Pending', 'FZRX52JQF2'),
(79, 9, 6, '2018-02-08', '2018-02-09', 1, 1, 'Pending', 'G1BA8JI4UX'),
(80, 9, 7, '2018-02-08', '2018-02-09', 1, 2, 'Pending', '0QXAW7MXI5');

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

--
-- Dumping data for table `room_masterfile`
--

INSERT INTO `room_masterfile` (`room_id`, `room_type`, `room_description`, `room_capacity`, `room_rate`, `room_number`, `room_status`, `room_imagepath`) VALUES
(6, 'Twin Queen Room', 'Twin Bed Rooms eyee', '2', 1500, 14, 'Available', 'img/Twin.JPG'),
(7, 'Queen Room', 'Queens Rooms', '1', 1500, 2, 'Available', 'img/Queen.jpg'),
(8, 'Family Room', 'Fambam', '5', 3000, 3, 'Available', 'img\\Family.JPG'),
(9, 'Quadroom', 'Squad Goals', '4', 2500, 4, 'Available', 'img\\Quad.jpg');

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

-- --------------------------------------------------------

--
-- Table structure for table `walkinreservation_masterfile`
--

CREATE TABLE `walkinreservation_masterfile` (
  `reservation_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `checkindate` date NOT NULL,
  `checkoutdate` date NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `walkinreservation_masterfile`
--

INSERT INTO `walkinreservation_masterfile` (`reservation_id`, `room_id`, `checkindate`, `checkoutdate`, `firstname`, `lastname`, `code`) VALUES
(10, 2, '2018-02-03', '2018-02-03', 'hi', 'e', 'YXATUQV0U0'),
(11, 1, '2018-02-03', '2018-02-04', 'kek', 'top', '0STZDX21WE'),
(12, 1, '2018-02-06', '2018-02-08', 'kek', 'top', 'TQG4H6GVCJ');

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
-- Dumping data for table `walkinrooms_masterfile`
--

INSERT INTO `walkinrooms_masterfile` (`walkinrooms_id`, `walkinrooms_name`, `room_id`) VALUES
(1, 'Twin0', 6),
(2, 'Twin1', 6),
(3, 'Twin2', 6),
(4, 'Twin3', 6),
(5, 'Twin4', 6),
(6, 'Twin5', 6),
(7, 'Twin6', 6),
(8, 'Twin7', 6),
(9, 'Twin8', 6),
(10, 'Twin9', 6),
(11, 'Twin10', 6),
(12, 'Twin11', 6),
(13, 'Twin12', 6),
(14, 'Twin13', 6),
(15, 'Twin14', 6),
(16, 'Queen Room0', 7),
(17, 'Queen Room1', 7),
(18, 'Family Room0', 8),
(19, 'Family Room1', 8),
(20, 'Family Room2', 8),
(21, 'Quadroom0', 9),
(22, 'Quadroom1', 9),
(23, 'Quadroom2', 9),
(24, 'Quadroom3', 9);

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
-- Indexes for table `transaction_masterfile`
--
ALTER TABLE `transaction_masterfile`
  ADD PRIMARY KEY (`Transaction_number`);

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
  MODIFY `assignedroom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `billing_masterfile`
--
ALTER TABLE `billing_masterfile`
  MODIFY `billing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `discount_masterfile`
--
ALTER TABLE `discount_masterfile`
  MODIFY `discount_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `financialreports_masterfile`
--
ALTER TABLE `financialreports_masterfile`
  MODIFY `financialreport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `guestaddons_masterfile`
--
ALTER TABLE `guestaddons_masterfile`
  MODIFY `guestaddon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `guest_masterfile`
--
ALTER TABLE `guest_masterfile`
  MODIFY `guest_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `proofofpayment_masterfile`
--
ALTER TABLE `proofofpayment_masterfile`
  MODIFY `proofofpayment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `receipts_masterfile`
--
ALTER TABLE `receipts_masterfile`
  MODIFY `receipts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reports_masterfile`
--
ALTER TABLE `reports_masterfile`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation_masterfile`
--
ALTER TABLE `reservation_masterfile`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `room_masterfile`
--
ALTER TABLE `room_masterfile`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaction_masterfile`
--
ALTER TABLE `transaction_masterfile`
  MODIFY `Transaction_number` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `walkinreservation_masterfile`
--
ALTER TABLE `walkinreservation_masterfile`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `walkinrooms_masterfile`
--
ALTER TABLE `walkinrooms_masterfile`
  MODIFY `walkinrooms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
