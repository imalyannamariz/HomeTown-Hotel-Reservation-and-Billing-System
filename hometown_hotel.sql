-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2018 at 02:15 AM
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
(1, '2018-02-10', 41, 'Reserved', 'Reservation', 'TY99YCIYVH'),
(1, '2018-02-11', 42, 'Reserved', 'Reservation', 'TY99YCIYVH'),
(5, '2018-02-10', 43, 'Reserved', 'Reservation', 'TY99YCIYVH'),
(5, '2018-02-11', 44, 'Reserved', 'Reservation', 'TY99YCIYVH'),
(6, '2018-02-10', 45, 'Reserved', 'Reservation', 'TY99YCIYVH'),
(6, '2018-02-11', 46, 'Reserved', 'Reservation', 'TY99YCIYVH'),
(7, '2018-02-10', 47, 'Reserved', 'Reservation', 'TY99YCIYVH'),
(7, '2018-02-11', 48, 'Reserved', 'Reservation', 'TY99YCIYVH'),
(8, '2018-02-10', 49, 'Reserved', 'Reservation', 'TY99YCIYVH'),
(8, '2018-02-11', 50, 'Reserved', 'Reservation', 'TY99YCIYVH'),
(2, '2018-02-05', 54, 'Temporary', 'Reservation', 'YGN9C3VE'),
(3, '2018-02-04', 55, 'Temporary', 'Reservation', 'YGN9C3VE'),
(3, '2018-02-05', 56, 'Temporary', 'Reservation', 'YGN9C3VE'),
(16, '2018-02-10', 58, 'Temporary', 'Reservation', 'RKTYHDVXFZ'),
(17, '2018-02-09', 59, 'Temporary', 'Reservation', 'RKTYHDVXFZ'),
(17, '2018-02-10', 60, 'Temporary', 'Reservation', 'RKTYHDVXFZ'),
(1, '2018-02-08', 147, 'Reserved', 'Walkin', 'JTNT14MRON'),
(1, '2018-02-09', 148, 'Reserved', 'Walkin', 'JTNT14MRON'),
(3, '2018-02-08', 149, 'Reserved', 'Walkin', 'JTNT14MRON'),
(3, '2018-02-09', 150, 'Reserved', 'Walkin', 'JTNT14MRON'),
(4, '2018-02-08', 151, 'Reserved', 'Walkin', 'JTNT14MRON'),
(4, '2018-02-09', 152, 'Reserved', 'Walkin', 'JTNT14MRON'),
(6, '2018-02-08', 153, 'Reserved', 'Walkin', 'JTNT14MRON'),
(6, '2018-02-09', 154, 'Reserved', 'Walkin', 'JTNT14MRON'),
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
(12, '2018-02-09', 166, 'Reserved', 'Walkin', 'JTNT14MRON');

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
(5, 18, 37, 1900, '2018-02-01 03:13:34', '2018-02-07 06:20:23', 'Partial', 1900, 285),
(53, 9, 81, 2150, '2018-02-06 00:58:11', '2018-02-07 06:18:34', 'Not paid', 2150, 322.5),
(54, 9, 82, 7900, '2018-02-07 05:30:41', '2018-02-07 05:30:41', 'Not paid', 7900, 1185);

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
(24, 1, 81, 4),
(25, 2, 81, 1),
(26, 4, 81, 1),
(27, 1, 82, 1);

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
(9, 'asdlaksd', 'lqkelqkwe', 'aaaa@gmail.com', '$2y$10$wWGvFDQc/rH.sY./y7fhQe0MldVoZs9ectuM7txm3jLH0mHJ.C3fy', '0923456672', 'Philippines', 'qwesadqwe', '', 5),
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

--
-- Dumping data for table `proofofpayment_masterfile`
--

INSERT INTO `proofofpayment_masterfile` (`proofofpayment_id`, `reservation_id`, `path`) VALUES
(2, 81, '../uploads/26219575_184591688706933_8485893161295026593_n.jpg'),
(3, 82, '../uploads/220px-Shiba_inu_taiki.jpg');

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
(37, 18, 6, '2018-02-04', '2018-02-05', 1, 1, 'Checkout', 'YGN9C3VE'),
(72, 9, 6, '2018-02-07', '2018-02-08', 1, 1, 'Void', '146PR6Q4DO'),
(73, 9, 7, '2018-02-07', '2018-02-08', 1, 2, 'Void', 'RFIAN9WTUH'),
(75, 2, 6, '2018-02-07', '2018-02-08', 1, 2, 'Void', 'L7WZ1M58OE'),
(76, 6, 7, '2018-02-07', '2018-02-09', 1, 1, 'Void', 'CBIIKKZ60Y'),
(81, 9, 7, '2018-02-09', '2018-02-10', 1, 1, 'Approved', 'RKTYHDVXFZ'),
(82, 9, 6, '2018-02-10', '2018-02-11', 10, 5, 'Approved', 'TY99YCIYVH');

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

--
-- Dumping data for table `walkinreservation_masterfile`
--

INSERT INTO `walkinreservation_masterfile` (`reservation_id`, `room_id`, `checkindate`, `checkoutdate`, `firstname`, `lastname`, `code`, `balance`, `total`, `email`, `password`) VALUES
(10, '2', '2018-02-03', '2018-02-03', 'hi', 'e', 'YXATUQV0U0', 0, 0, '', ''),
(11, '1', '2018-02-03', '2018-02-04', 'kek', 'top', '0STZDX21WE', 0, 0, '', ''),
(12, '1', '2018-02-06', '2018-02-08', 'kek', 'top', 'TQG4H6GVCJ', 0, 0, '', ''),
(18, '6 7 ', '2018-02-08', '2018-02-10', '', '', 'RBO1Y9AF6B', 6000, 6000, 'boi@boi.com', '$2y$10$GBH/zdYVDlVsPYHUzo.tpuSPMH7jw0vtg0iHelNm6vEaueBxnPXZ6'),
(19, '6 ', '2018-02-08', '2018-02-09', '', '', 'JTNT14MRON', 1500, 1500, 'boii@boi.com', '$2y$10$36zQDthfMl969bn5rYAbdu7cu10o93YrCXeqdacIHLcxgXecTaMm6'),
(20, '6 ', '2018-02-08', '2018-02-09', '', '', 'JTNT14MRON', 1500, 1500, 'boii@boi.com', '$2y$10$lXbz9N1oEiXTChdbGRtVVO27NK5owNituglfQgm8VyNFOLmMFwQG6'),
(21, '6 ', '2018-02-08', '2018-02-09', '', '', 'JTNT14MRON', 1500, 1500, 'boii@boi.com', '$2y$10$e/7gdRr4XQnoiGtyJEyFG.qYbhUs3pX911z4ARSJ.UP.YL9X/g3ee'),
(22, '6 ', '2018-02-08', '2018-02-09', '', '', 'JTNT14MRON', 1500, 1500, 'boii@boi.com', '$2y$10$suTTKyqBm/j6yp8WKL0ASO25vDmlCpYZ0TU/ad4r4IPQBog5.94KC'),
(23, '6 ', '2018-02-08', '2018-02-09', '', '', 'JTNT14MRON', 1500, 1500, 'boii@boi.com', '$2y$10$ZxxEDcSbt19UKHLnBb0/K.i2tGKMWLEkk9XcOqu5cJoG.ggmzmp7i'),
(24, '6 ', '2018-02-08', '2018-02-09', '', '', 'JTNT14MRON', 1500, 1500, 'boii@boi.com', '$2y$10$nlr3c72e8U5yJjx3xjdrgup/y8JBkcijYdup0tBu4ug.GFHWPGUqG'),
(25, '6 ', '2018-02-08', '2018-02-09', '', '', 'JTNT14MRON', 1500, 1500, 'boii@boi.com', '$2y$10$SRSw6HIsE1S6XvPtLMHNJuu7.Nc3tyjQiBQbREBXZ5.7vxY68SL36'),
(26, '6 ', '2018-02-08', '2018-02-09', '', '', 'JTNT14MRON', 1500, 1500, 'boii@boi.com', '$2y$10$7ZkPkH/dx5/x4Vcmyq.sVuP9PeW03zg3gNoLFUzTxGXkvkymTPgqG'),
(27, '6 ', '2018-02-08', '2018-02-09', '', '', 'JTNT14MRON', 1500, 1500, 'boii@boi.com', '$2y$10$oUJpAzXNh0eroPa8l.c0yOx6a1RTWZsee.smpQkx5RVRisCbjjQnS'),
(28, '6 ', '2018-02-08', '2018-02-09', '', '', 'JTNT14MRON', 1500, 1500, 'boii@boi.com', '$2y$10$1TTSaZnDeVJjiRHTQZ9DG.ykF8mJLudxFP97HT2VCG4FpYSxQanIi'),
(29, '6 ', '2018-02-08', '2018-02-09', '', '', 'JTNT14MRON', 1500, 1500, 'boii@boi.com', '$2y$10$q.WDjDeBWfm3ndnLrBId5O9swQjwpU7es3KxdEARna8bV3KXp3Wx.'),
(30, '6 ', '2018-02-08', '2018-02-09', '', '', 'JTNT14MRON', 1500, 1500, 'boii@boi.com', '$2y$10$2YnByPDBvsQ3tiKbnC0o6.0MTrAq9nfG8ohMwfcvhOyUHyCNjr4bK');

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
  MODIFY `assignedroom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `billing_masterfile`
--
ALTER TABLE `billing_masterfile`
  MODIFY `billing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

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
  MODIFY `guestaddon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `guest_masterfile`
--
ALTER TABLE `guest_masterfile`
  MODIFY `guest_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `proofofpayment_masterfile`
--
ALTER TABLE `proofofpayment_masterfile`
  MODIFY `proofofpayment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

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
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `walkinrooms_masterfile`
--
ALTER TABLE `walkinrooms_masterfile`
  MODIFY `walkinrooms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
