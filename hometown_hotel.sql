-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2018 at 03:46 PM
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
(16, '2018-02-07', 19, 'Reserved', 'Reservation', 'RFIAN9WTUH'),
(16, '2018-02-08', 20, 'Reserved', 'Reservation', 'RFIAN9WTUH'),
(17, '2018-02-07', 21, 'Reserved', 'Reservation', 'RFIAN9WTUH'),
(17, '2018-02-08', 22, 'Reserved', 'Reservation', 'RFIAN9WTUH'),
(5, '2018-02-07', 27, 'Temporary', 'Reservation', 'L7WZ1M58OE'),
(5, '2018-02-08', 28, 'Temporary', 'Reservation', 'L7WZ1M58OE'),
(19, '2018-02-05', 35, 'Reserved', 'Walkin', 'NH0F93KF1S'),
(19, '2018-02-06', 36, 'Reserved', 'Walkin', 'NH0F93KF1S'),
(1, '2018-02-09', 37, 'Reserved', 'Reservation', 'L473E1AHWX'),
(1, '2018-02-10', 38, 'Reserved', 'Reservation', 'L473E1AHWX'),
(2, '2018-02-09', 39, 'Reserved', 'Reservation', 'L473E1AHWX'),
(2, '2018-02-10', 40, 'Reserved', 'Reservation', 'L473E1AHWX'),
(3, '2018-02-09', 41, 'Reserved', 'Reservation', 'L473E1AHWX'),
(3, '2018-02-10', 42, 'Reserved', 'Reservation', 'L473E1AHWX'),
(4, '2018-02-09', 43, 'Reserved', 'Reservation', 'L473E1AHWX'),
(4, '2018-02-10', 44, 'Reserved', 'Reservation', 'L473E1AHWX'),
(5, '2018-02-09', 45, 'Reserved', 'Reservation', 'L473E1AHWX'),
(5, '2018-02-10', 46, 'Reserved', 'Reservation', 'L473E1AHWX'),
(6, '2018-02-09', 47, 'Reserved', 'Reservation', 'L473E1AHWX'),
(6, '2018-02-10', 48, 'Reserved', 'Reservation', 'L473E1AHWX'),
(16, '2018-02-11', 49, 'Temporary', 'Reservation', 'CG24B2AR9W'),
(16, '2018-02-12', 50, 'Temporary', 'Reservation', 'CG24B2AR9W'),
(17, '2018-02-11', 51, 'Temporary', 'Reservation', 'CG24B2AR9W'),
(17, '2018-02-12', 52, 'Temporary', 'Reservation', 'CG24B2AR9W');

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
(45, 9, 73, 0, '2018-02-04 16:07:09', '2018-02-08 10:36:01', 'Fully Paid', 3000, 450),
(54, 0, 13, 0, '2018-02-05 00:00:00', '2018-02-08 10:47:32', 'Fully Paid', 3000, 450),
(55, 14, 82, 0, '2018-02-06 18:46:18', '2018-02-08 10:53:15', 'Fully Paid', 2150, 322.5);

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
(4000, 'Fully Paid', '2018-02-05 14:26:51', 48, 22),
(450, 'Partial', '2018-02-06 02:49:46', 54, 23),
(1000, 'Partial', '2018-02-08 10:35:47', 45, 24),
(2000, 'Fully Paid', '2018-02-08 10:36:01', 45, 25),
(3000, 'Fully Paid', '2018-02-08 10:47:32', 54, 26),
(2150, 'Fully Paid', '2018-02-08 10:53:15', 55, 27);

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
(26, 1, 82, 1),
(27, 2, 82, 1),
(28, 4, 82, 1);

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
(6, 'Mark', 'Calma', 'markdcalma@gmail.com', '$2y$10$t.eEG1fUpNQYW81Apqi.I.6bv05uQErBJEl5EJmX1YCuuQWdyxhJu', '09357771340', 'Philippines', 'Tramo', '', 1),
(7, 'jerome', 'ubina', 'jeromeubina@gmail.com', '$2y$10$8M3NYfZcem4ndy4X8dh09.t2744A7wM3a0utqYHSQlpG8fBQJZBkS', '09357771340', 'Philippines', 'Tramo', '', 0),
(8, 'Jerry', 'Punzalan', 'jerry@gmail.com', '$2y$10$TI3PeuagEBUq6Ee336iNLeuZMvv6y7YPeo/Y7Aqp1.yZLlurhvPfm', '09357771340', 'Philippines', 'Tramo', '', 0),
(9, 'Acis', 'Torculas', 'aaaa@gmail.com', '$2y$10$wWGvFDQc/rH.sY./y7fhQe0MldVoZs9ectuM7txm3jLH0mHJ.C3fy', '923456672', 'Philippines', 'qwesadqwe', '', 5),
(13, 'Jerry', 'Punzalan', 'jerrypunzalan24@gmail.com', '$2y$10$ixQMZMiIkW4zeiqt5XWTM.25FltA5kAR0PSLGL1L9kjX/IO5zfP02', '09156155821', 'Philippines', 'asdqwe', '', 0),
(14, 'Franz', 'Mondero', 'franzcupcake@yahoo.com', '$2y$10$uTsg1qeiwoF/kr2OdfrXfeJYlasDvc7SeKQNN88QNCDsCDPv2/sy2', '09095483567', 'Philippines', 'blumentrit', 'BAA8F7BGB5', 1),
(15, 'mark', 'calmado', 'calmado@gmail.com', '$2y$10$o0Sbba3WhMgQlhB86YU5q.gS53eke/F5H8U/mxWAkcK/prH0EzJ3S', '09095483567', 'Philippines', '2245 Tramo St. San Roque District', 'ZROWBH03XD', 1);

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
(3, 73, '../uploads/22554641_1483862081707930_2010112762_n.jpg'),
(4, 82, '../uploads/Cantos.jpg');

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
(5, 6),
(6, 0),
(7, 14);

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
(73, 9, 7, '2018-02-07', '2018-02-08', 1, 2, 'Approved', 'RFIAN9WTUH'),
(75, 2, 6, '2018-02-07', '2018-02-08', 1, 2, 'Void', 'L7WZ1M58OE'),
(81, 6, 6, '2018-02-08', '2018-02-09', 1, 3, 'Void', 'RBYQMMYGNR'),
(82, 14, 6, '2018-02-09', '2018-02-10', 12, 1, 'Approved', 'L473E1AHWX'),
(83, 15, 7, '2018-02-11', '2018-02-12', 1, 2, 'Void', 'CG24B2AR9W');

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
(6, 'Twin Queen Room', 'Capacity: 2 pax', '2', 1950, 8, 'Available', '../img/Twin.JPG'),
(7, 'Queen Room', 'Capacity: 2 pax', '2', 1950, 8, 'Available', '../img/Queen.jpg'),
(8, 'Family Room', 'Capacity: 3-4 pax', '4', 2400, 3, 'Available', '../img/FM2.JPG'),
(9, 'Quad Room', 'Capacity: 4 pax', '4', 2400, 4, 'Available', '../img/Quad.jpg'),
(10, 'Group Room', 'Capacity: 14 pax', '14', 4000, 1, '', '../img/Group1.jpg'),
(11, 'Dorm Room', '599 per pax\r\nCapacity: 4 pax', '4', 599, 2, 'Available', '../img/Quad3.jpg'),
(13, 'asass', 'qsasds', '100', 100, 100, 'Available', '../img/'),
(14, 'ey', 'ey', '100', 100, 100, 'Available', '../img/'),
(15, 'Deluxe', 'fuck', '100', 100, 100, 'Available', '../img/');

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
(12, 1, '2018-02-06', '2018-02-08', 'kek', 'top', 'TQG4H6GVCJ'),
(13, 19, '2018-02-05', '2018-02-06', 'Alyanna', 'Cantos', 'NH0F93KF1S');

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
(24, 'Quadroom3', 9),
(25, 'Dorm Room1', 11),
(26, 'Dorm Room2', 11),
(29, 'asass1', 13),
(30, 'asass2', 13),
(31, 'asass3', 13),
(32, 'asass4', 13),
(33, 'asass5', 13),
(34, 'asass6', 13),
(35, 'asass7', 13),
(36, 'asass8', 13),
(37, 'asass9', 13),
(38, 'asass10', 13),
(39, 'asass11', 13),
(40, 'asass12', 13),
(41, 'asass13', 13),
(42, 'asass14', 13),
(43, 'asass15', 13),
(44, 'asass16', 13),
(45, 'asass17', 13),
(46, 'asass18', 13),
(47, 'asass19', 13),
(48, 'asass20', 13),
(49, 'asass21', 13),
(50, 'asass22', 13),
(51, 'asass23', 13),
(52, 'asass24', 13),
(53, 'asass25', 13),
(54, 'asass26', 13),
(55, 'asass27', 13),
(56, 'asass28', 13),
(57, 'asass29', 13),
(58, 'asass30', 13),
(59, 'asass31', 13),
(60, 'asass32', 13),
(61, 'asass33', 13),
(62, 'asass34', 13),
(63, 'asass35', 13),
(64, 'asass36', 13),
(65, 'asass37', 13),
(66, 'asass38', 13),
(67, 'asass39', 13),
(68, 'asass40', 13),
(69, 'asass41', 13),
(70, 'asass42', 13),
(71, 'asass43', 13),
(72, 'asass44', 13),
(73, 'asass45', 13),
(74, 'asass46', 13),
(75, 'asass47', 13),
(76, 'asass48', 13),
(77, 'asass49', 13),
(78, 'asass50', 13),
(79, 'asass51', 13),
(80, 'asass52', 13),
(81, 'asass53', 13),
(82, 'asass54', 13),
(83, 'asass55', 13),
(84, 'asass56', 13),
(85, 'asass57', 13),
(86, 'asass58', 13),
(87, 'asass59', 13),
(88, 'asass60', 13),
(89, 'asass61', 13),
(90, 'asass62', 13),
(91, 'asass63', 13),
(92, 'asass64', 13),
(93, 'asass65', 13),
(94, 'asass66', 13),
(95, 'asass67', 13),
(96, 'asass68', 13),
(97, 'asass69', 13),
(98, 'asass70', 13),
(99, 'asass71', 13),
(100, 'asass72', 13),
(101, 'asass73', 13),
(102, 'asass74', 13),
(103, 'asass75', 13),
(104, 'asass76', 13),
(105, 'asass77', 13),
(106, 'asass78', 13),
(107, 'asass79', 13),
(108, 'asass80', 13),
(109, 'asass81', 13),
(110, 'asass82', 13),
(111, 'asass83', 13),
(112, 'asass84', 13),
(113, 'asass85', 13),
(114, 'asass86', 13),
(115, 'asass87', 13),
(116, 'asass88', 13),
(117, 'asass89', 13),
(118, 'asass90', 13),
(119, 'asass91', 13),
(120, 'asass92', 13),
(121, 'asass93', 13),
(122, 'asass94', 13),
(123, 'asass95', 13),
(124, 'asass96', 13),
(125, 'asass97', 13),
(126, 'asass98', 13),
(127, 'asass99', 13),
(128, 'asass100', 13),
(129, 'ey1', 14),
(130, 'ey2', 14),
(131, 'ey3', 14),
(132, 'ey4', 14),
(133, 'ey5', 14),
(134, 'ey6', 14),
(135, 'ey7', 14),
(136, 'ey8', 14),
(137, 'ey9', 14),
(138, 'ey10', 14),
(139, 'ey11', 14),
(140, 'ey12', 14),
(141, 'ey13', 14),
(142, 'ey14', 14),
(143, 'ey15', 14),
(144, 'ey16', 14),
(145, 'ey17', 14),
(146, 'ey18', 14),
(147, 'ey19', 14),
(148, 'ey20', 14),
(149, 'ey21', 14),
(150, 'ey22', 14),
(151, 'ey23', 14),
(152, 'ey24', 14),
(153, 'ey25', 14),
(154, 'ey26', 14),
(155, 'ey27', 14),
(156, 'ey28', 14),
(157, 'ey29', 14),
(158, 'ey30', 14),
(159, 'ey31', 14),
(160, 'ey32', 14),
(161, 'ey33', 14),
(162, 'ey34', 14),
(163, 'ey35', 14),
(164, 'ey36', 14),
(165, 'ey37', 14),
(166, 'ey38', 14),
(167, 'ey39', 14),
(168, 'ey40', 14),
(169, 'ey41', 14),
(170, 'ey42', 14),
(171, 'ey43', 14),
(172, 'ey44', 14),
(173, 'ey45', 14),
(174, 'ey46', 14),
(175, 'ey47', 14),
(176, 'ey48', 14),
(177, 'ey49', 14),
(178, 'ey50', 14),
(179, 'ey51', 14),
(180, 'ey52', 14),
(181, 'ey53', 14),
(182, 'ey54', 14),
(183, 'ey55', 14),
(184, 'ey56', 14),
(185, 'ey57', 14),
(186, 'ey58', 14),
(187, 'ey59', 14),
(188, 'ey60', 14),
(189, 'ey61', 14),
(190, 'ey62', 14),
(191, 'ey63', 14),
(192, 'ey64', 14),
(193, 'ey65', 14),
(194, 'ey66', 14),
(195, 'ey67', 14),
(196, 'ey68', 14),
(197, 'ey69', 14),
(198, 'ey70', 14),
(199, 'ey71', 14),
(200, 'ey72', 14),
(201, 'ey73', 14),
(202, 'ey74', 14),
(203, 'ey75', 14),
(204, 'ey76', 14),
(205, 'ey77', 14),
(206, 'ey78', 14),
(207, 'ey79', 14),
(208, 'ey80', 14),
(209, 'ey81', 14),
(210, 'ey82', 14),
(211, 'ey83', 14),
(212, 'ey84', 14),
(213, 'ey85', 14),
(214, 'ey86', 14),
(215, 'ey87', 14),
(216, 'ey88', 14),
(217, 'ey89', 14),
(218, 'ey90', 14),
(219, 'ey91', 14),
(220, 'ey92', 14),
(221, 'ey93', 14),
(222, 'ey94', 14),
(223, 'ey95', 14),
(224, 'ey96', 14),
(225, 'ey97', 14),
(226, 'ey98', 14),
(227, 'ey99', 14),
(228, 'ey100', 14),
(229, 'Deluxe1', 15),
(230, 'Deluxe2', 15),
(231, 'Deluxe3', 15),
(232, 'Deluxe4', 15),
(233, 'Deluxe5', 15),
(234, 'Deluxe6', 15),
(235, 'Deluxe7', 15),
(236, 'Deluxe8', 15),
(237, 'Deluxe9', 15),
(238, 'Deluxe10', 15),
(239, 'Deluxe11', 15),
(240, 'Deluxe12', 15),
(241, 'Deluxe13', 15),
(242, 'Deluxe14', 15),
(243, 'Deluxe15', 15),
(244, 'Deluxe16', 15),
(245, 'Deluxe17', 15),
(246, 'Deluxe18', 15),
(247, 'Deluxe19', 15),
(248, 'Deluxe20', 15),
(249, 'Deluxe21', 15),
(250, 'Deluxe22', 15),
(251, 'Deluxe23', 15),
(252, 'Deluxe24', 15),
(253, 'Deluxe25', 15),
(254, 'Deluxe26', 15),
(255, 'Deluxe27', 15),
(256, 'Deluxe28', 15),
(257, 'Deluxe29', 15),
(258, 'Deluxe30', 15),
(259, 'Deluxe31', 15),
(260, 'Deluxe32', 15),
(261, 'Deluxe33', 15),
(262, 'Deluxe34', 15),
(263, 'Deluxe35', 15),
(264, 'Deluxe36', 15),
(265, 'Deluxe37', 15),
(266, 'Deluxe38', 15),
(267, 'Deluxe39', 15),
(268, 'Deluxe40', 15),
(269, 'Deluxe41', 15),
(270, 'Deluxe42', 15),
(271, 'Deluxe43', 15),
(272, 'Deluxe44', 15),
(273, 'Deluxe45', 15),
(274, 'Deluxe46', 15),
(275, 'Deluxe47', 15),
(276, 'Deluxe48', 15),
(277, 'Deluxe49', 15),
(278, 'Deluxe50', 15),
(279, 'Deluxe51', 15),
(280, 'Deluxe52', 15),
(281, 'Deluxe53', 15),
(282, 'Deluxe54', 15),
(283, 'Deluxe55', 15),
(284, 'Deluxe56', 15),
(285, 'Deluxe57', 15),
(286, 'Deluxe58', 15),
(287, 'Deluxe59', 15),
(288, 'Deluxe60', 15),
(289, 'Deluxe61', 15),
(290, 'Deluxe62', 15),
(291, 'Deluxe63', 15),
(292, 'Deluxe64', 15),
(293, 'Deluxe65', 15),
(294, 'Deluxe66', 15),
(295, 'Deluxe67', 15),
(296, 'Deluxe68', 15),
(297, 'Deluxe69', 15),
(298, 'Deluxe70', 15),
(299, 'Deluxe71', 15),
(300, 'Deluxe72', 15),
(301, 'Deluxe73', 15),
(302, 'Deluxe74', 15),
(303, 'Deluxe75', 15),
(304, 'Deluxe76', 15),
(305, 'Deluxe77', 15),
(306, 'Deluxe78', 15),
(307, 'Deluxe79', 15),
(308, 'Deluxe80', 15),
(309, 'Deluxe81', 15),
(310, 'Deluxe82', 15),
(311, 'Deluxe83', 15),
(312, 'Deluxe84', 15),
(313, 'Deluxe85', 15),
(314, 'Deluxe86', 15),
(315, 'Deluxe87', 15),
(316, 'Deluxe88', 15),
(317, 'Deluxe89', 15),
(318, 'Deluxe90', 15),
(319, 'Deluxe91', 15),
(320, 'Deluxe92', 15),
(321, 'Deluxe93', 15),
(322, 'Deluxe94', 15),
(323, 'Deluxe95', 15),
(324, 'Deluxe96', 15),
(325, 'Deluxe97', 15),
(326, 'Deluxe98', 15),
(327, 'Deluxe99', 15),
(328, 'Deluxe100', 15);

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
  MODIFY `assignedroom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `billing_masterfile`
--
ALTER TABLE `billing_masterfile`
  MODIFY `billing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `discount_masterfile`
--
ALTER TABLE `discount_masterfile`
  MODIFY `discount_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `financialreports_masterfile`
--
ALTER TABLE `financialreports_masterfile`
  MODIFY `financialreport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `guestaddons_masterfile`
--
ALTER TABLE `guestaddons_masterfile`
  MODIFY `guestaddon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `guest_masterfile`
--
ALTER TABLE `guest_masterfile`
  MODIFY `guest_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `proofofpayment_masterfile`
--
ALTER TABLE `proofofpayment_masterfile`
  MODIFY `proofofpayment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `room_masterfile`
--
ALTER TABLE `room_masterfile`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaction_masterfile`
--
ALTER TABLE `transaction_masterfile`
  MODIFY `Transaction_number` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `walkinreservation_masterfile`
--
ALTER TABLE `walkinreservation_masterfile`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `walkinrooms_masterfile`
--
ALTER TABLE `walkinrooms_masterfile`
  MODIFY `walkinrooms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
