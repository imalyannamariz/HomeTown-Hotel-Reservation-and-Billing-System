-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2018 at 03:03 AM
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
(1, '2018-02-11', 193, 'Temporary', 'Reservation', 'ESZN5TAPFT'),
(38, '2018-02-15', 315, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-02-16', 316, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-02-17', 317, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-02-18', 318, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-02-19', 319, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-02-20', 320, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-02-21', 321, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-02-22', 322, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-02-23', 323, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-02-24', 324, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-02-25', 325, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-02-26', 326, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-02-27', 327, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-02-28', 328, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-03-01', 329, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-03-02', 330, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-03-03', 331, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-03-04', 332, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-03-05', 333, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-03-06', 334, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-03-07', 335, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-03-08', 336, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-03-09', 337, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-03-10', 338, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-03-11', 339, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-03-12', 340, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-03-13', 341, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-03-14', 342, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-03-15', 343, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-03-16', 344, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-03-17', 345, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-03-18', 346, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-03-19', 347, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-03-20', 348, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-03-21', 349, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-03-22', 350, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-03-23', 351, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(38, '2018-03-24', 352, 'Temporary', 'Reservation', 'EOH74FZJXK'),
(33, '2018-02-19', 422, 'Reserved', 'Reservation', 'XUZM0D9JSA'),
(33, '2018-02-20', 423, 'Reserved', 'Reservation', 'XUZM0D9JSA'),
(33, '2018-02-21', 424, 'Reserved', 'Reservation', 'XUZM0D9JSA'),
(33, '2018-02-22', 425, 'Reserved', 'Reservation', 'XUZM0D9JSA'),
(33, '2018-02-23', 426, 'Reserved', 'Reservation', 'XUZM0D9JSA'),
(33, '2018-02-24', 427, 'Reserved', 'Reservation', 'XUZM0D9JSA'),
(33, '2018-02-25', 428, 'Reserved', 'Reservation', 'XUZM0D9JSA'),
(33, '2018-02-26', 429, 'Reserved', 'Reservation', 'XUZM0D9JSA'),
(33, '2018-02-27', 430, 'Reserved', 'Reservation', 'XUZM0D9JSA'),
(33, '2018-02-28', 431, 'Reserved', 'Reservation', 'XUZM0D9JSA'),
(34, '2018-02-19', 432, 'Temporary', 'Reservation', '7WPV103F3S'),
(34, '2018-02-20', 433, 'Temporary', 'Reservation', '7WPV103F3S'),
(34, '2018-02-21', 434, 'Temporary', 'Reservation', '7WPV103F3S'),
(34, '2018-02-22', 435, 'Temporary', 'Reservation', '7WPV103F3S'),
(34, '2018-02-23', 436, 'Temporary', 'Reservation', '7WPV103F3S'),
(34, '2018-02-24', 437, 'Temporary', 'Reservation', '7WPV103F3S'),
(35, '2018-02-20', 444, 'Temporary', 'Reservation', '5KMBKILEUQ'),
(35, '2018-02-21', 445, 'Temporary', 'Reservation', '5KMBKILEUQ'),
(35, '2018-02-22', 446, 'Temporary', 'Reservation', '5KMBKILEUQ'),
(35, '2018-02-23', 447, 'Temporary', 'Reservation', '5KMBKILEUQ'),
(35, '2018-02-24', 448, 'Temporary', 'Reservation', '5KMBKILEUQ'),
(35, '2018-02-25', 449, 'Temporary', 'Reservation', '5KMBKILEUQ'),
(35, '2018-02-26', 450, 'Temporary', 'Reservation', '5KMBKILEUQ'),
(35, '2018-02-27', 451, 'Temporary', 'Reservation', '5KMBKILEUQ'),
(35, '2018-02-28', 452, 'Temporary', 'Reservation', '5KMBKILEUQ'),
(36, '2018-02-19', 453, 'Reserved', 'Reservation', '3538D1E8NW'),
(36, '2018-02-20', 454, 'Reserved', 'Reservation', '3538D1E8NW'),
(37, '2018-02-19', 455, 'Reserved', 'Reservation', '3538D1E8NW'),
(37, '2018-02-20', 456, 'Reserved', 'Reservation', '3538D1E8NW'),
(41, '2018-02-19', 457, 'Reserved', 'Reservation', 'FCUU52VVP3'),
(41, '2018-02-20', 458, 'Reserved', 'Reservation', 'FCUU52VVP3'),
(42, '2018-02-19', 459, 'Reserved', 'Reservation', 'FCUU52VVP3'),
(42, '2018-02-20', 460, 'Reserved', 'Reservation', 'FCUU52VVP3');

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
(77, 9, 105, 64935, '2018-02-12 00:16:37', '2018-02-16 09:35:54', 'Partial', 64935, 9740.25),
(80, 9, 108, 15795, '2018-02-16 09:46:21', '2018-02-16 09:51:53', 'Not paid', 15795, 2369.25),
(81, 9, 109, 8775, '2018-02-16 09:46:47', '2018-02-16 09:52:12', 'Not paid', 8775, 1316.25),
(83, 7, 111, 15600, '2018-02-16 09:54:22', '2018-02-16 10:00:12', 'Not paid', 15600, 2340),
(84, 6, 112, 4400, '2018-02-16 10:01:56', '2018-02-16 10:01:56', 'Not paid', 4400, 660),
(85, 6, 113, 5300, '2018-02-16 10:02:42', '2018-02-16 10:02:42', 'Not paid', 5300, 795);

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
(500, 'Partial', '2018-02-10 09:29:56', 73, 29),
(50, 'Partial', '2018-02-12 09:15:48', 77, 30),
(1600, 'Partial', '2018-02-12 09:41:22', 77, 31),
(500, 'Partial', '2018-02-14 21:41:15', 77, 32),
(55, 'Partial', '2018-02-14 23:45:21', 77, 33),
(555, 'Partial', '2018-02-15 22:47:11', 77, 34),
(2, 'Partial', '2018-02-15 22:52:53', 77, 35),
(23, 'Partial', '2018-02-15 23:45:39', 78, 36);

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
(60, 1, 77, 10),
(61, 2, 77, 11),
(62, 2, 77, 11),
(77, 1, 112, 1),
(78, 2, 112, 1),
(79, 1, 113, 1),
(80, 2, 113, 1);

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
  `count` int(11) NOT NULL,
  `verifier` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest_masterfile`
--

INSERT INTO `guest_masterfile` (`guest_ID`, `guest_firstname`, `guest_lastname`, `guest_email`, `guest_password`, `guest_contactNumber`, `guest_country`, `guest_address`, `guest_code`, `count`, `verifier`) VALUES
(5, 'Alyanna', 'Cantos', 'antonioumali@gmail.com', '$2y$10$.bcv9EAuXOilfBW9Tdn2r.1eHh3VbK/YeUbvIgjIIyZ.lVEfUjry2', '09357771340', 'Philippines', 'Tramo Pasay City', '', 0, 0),
(6, 'Mark', 'Calma', 'markdcalma@gmail.com', '$2y$10$t.eEG1fUpNQYW81Apqi.I.6bv05uQErBJEl5EJmX1YCuuQWdyxhJu', '09357771340', 'Philippines', 'Tramo', '', 3, 0),
(7, 'jerome', 'ubina', 'jeromeubina@gmail.com', '$2y$10$8M3NYfZcem4ndy4X8dh09.t2744A7wM3a0utqYHSQlpG8fBQJZBkS', '09357771340', 'Philippines', 'Tramo', '', 2, 0),
(8, 'Jerry', 'Punzalan', 'jerry@gmail.com', '$2y$10$TI3PeuagEBUq6Ee336iNLeuZMvv6y7YPeo/Y7Aqp1.yZLlurhvPfm', '09357771340', 'Philippines', 'Tramo', '', 0, 0),
(9, 'Acis', 'Torculas', 'aaaa@gmail.com', '$2y$10$wWGvFDQc/rH.sY./y7fhQe0MldVoZs9ectuM7txm3jLH0mHJ.C3fy', '923456672', 'Philippines', '1st Street Villamor Airbase Pasay City', '', 15, 0),
(13, 'Jerry', 'Punzalan', 'jerrypunzalan24@gmail.com', '$2y$10$ixQMZMiIkW4zeiqt5XWTM.25FltA5kAR0PSLGL1L9kjX/IO5zfP02', '09156155821', 'Philippines', 'asdqwe', '', 0, 0),
(18, 'top', 'kek', 'aaaa@gmail.com', '$2y$10$uHX/rcNapLSP330ZwHGyouVAV1K59NGydQHyxaiQpa7kJlPEAeAXy', '9156155821', 'Philippines', 'qweaswqe', 'P8OB1ZJ', 0, 0),
(19, 'qweqweqweqwewq', 'qweqeqwe', 'qweqweqwewq@yahoo.com', '$2y$10$TzS1qoADPh46jo0M2nqJpOysqUHUnK2NG3TK0yFUiUvCUbo1cx5U.', '09353351911', 'Philippines', '123qwe123qwe', 'WX1W3ZIRLJ', 0, 0),
(20, 'Omar', 'Labio', 'omar@gmail.com', '$2y$10$oquHrllpS6BRw2awW/.Tque5HRdkTtB1/962303Mbu322mexdOOEu', '123123123', 'Philippines', '1231223', '36JKXH9YV8', 0, 0),
(21, 'Acis', 'Umali', 'acisumali@yahoo.com', '$2y$10$otCBJoddVEhU6cmWUnJuY.cCVlGuhWMMh..6V1Xab2m7N2ZOI4Nf2', '123123', 'Philippines', '123123123123', '0OQ5T3XBG', 0, 0),
(22, 'Acis', 'Umali', 'acisumal11i@yahoo.com', '$2y$10$/MFJ0J2Tn5slXqY/zwS4UeBVPwbwrgIHIuOHqrH7BD6FNm.FAw346', '123123', 'Philippines', '123123123123', '3KFG5S0N22', 0, 0),
(23, 'Acis', 'Umali', 'acisumal111i@yahoo.com', '$2y$10$fCbk/mmWECBkilv7/nyqwuHpag/Aqmh0pxFFOYBbUlvs0uPiGupyy', '123123', 'Philippines', '123123123123', '8ZLD6CGOLS', 1, 0),
(24, 'Alyanna', 'Cnatos', 'alyannamariz@gmail.com', '$2y$10$2kWqT402aek/AjYSV/klAuRvCxnickNnw6pSvb9q0rZJRkeJ1qCE.', '09277359665', 'Philippines', 'qweqweqweqw', 'EBVTVX58F3', 1, 0),
(25, 'Anton', 'Umali', 'antonumali1111@gmail.com', '$2y$10$yrHNDTR87le.qX7QLT7a6ul526mE9eFAxGhCwC25ihYX6cZt3sDky', '09353351911', 'Philippines', 'Sampaloc, Manila', 'LGJKUBWLOV', 2, 0),
(26, 'Jeemar', 'Flores', 'jeemarmflores@yahoo.com', '$2y$10$BsvERlhOFgl7t7.SDvKkpOXs17RXcZc60DOi9L6uW/zMZ21IqA42.', '09451541471', 'Philippines', '439 L. Francisco St. Pasay City', 'F8YPM04FF1', 2, 0),
(27, 'jerome', 'ubina', 'jeromedomubina@gmail.com', '$2y$10$oYfpAQy2x1R5AHk.Z5xesOT25qY3l97ADeAbAowE3VZbI5FY.haHu', '09357771340', 'Philippines', '2245 Tramo St. San Roque District', 'UL5RFHDSBI', 1, 9),
(28, 'Pat', 'Salazar', 'patrickallan.salazar@yahoo.com', '$2y$10$KVVWTOK4TSassDIqL/AEfeigDMJxkS84M.n9iJ.KbYAnLcn1gDu1W', '8543607', 'Philippines', '13;', 'RY858BPP42', 0, 9);

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
(10, 106, '../uploads/logo.png'),
(11, 105, '../uploads/grid-icon.png'),
(12, 105, '../uploads/'),
(13, 106, '../uploads/guest.jpg'),
(14, 107, '../uploads/2ZLLCCKP.jpg');

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
(1, 9),
(2, 27);

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
(2, 108, '2018-02-16 09:58:39', '2018-02-16 09:58:39'),
(3, 112, '2018-02-16 10:02:21', '2018-02-16 10:02:21'),
(4, 112, '2018-02-16 10:02:54', '2018-02-16 10:02:54'),
(5, 113, '2018-02-16 10:02:58', '2018-02-16 10:02:58');

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
(105, 9, 17, '2018-02-15', '2018-03-24', 1, 1, 'Checkout', 'EOH74FZJXK'),
(106, 27, 17, '2018-02-23', '2018-02-27', 10, 5, 'Void', 'MVGRZHRF5K'),
(107, 6, 17, '2018-02-20', '2018-02-21', 5, 5, 'Void', '45V9FIOGCS'),
(108, 9, 17, '2018-02-19', '2018-02-28', 1, 1, 'Approved', 'XUZM0D9JSA'),
(109, 9, 17, '2018-02-19', '2018-02-24', 1, 1, 'Approved', '7WPV103F3S'),
(110, 7, 17, '2018-02-19', '2018-02-20', 1, 1, 'Void', '3INX6RZAD7'),
(111, 7, 17, '2018-02-20', '2018-02-28', 1, 1, 'Approved', '5KMBKILEUQ'),
(112, 6, 17, '2018-02-19', '2018-02-20', 1, 2, 'Approved', '3538D1E8NW'),
(113, 6, 18, '2018-02-19', '2018-02-20', 1, 2, 'Approved', 'FCUU52VVP3');

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
(17, 'Twin Queen Room', 'Capacity: 2 pax', '2', 1950, 8, 'Available', 'img/Twin.JPG'),
(18, 'Quad Room', 'Capacity: 4 pax', '4', 2400, 3, 'Available', 'img/Quad1.jpg'),
(19, 'Family Room', 'Capacity: 3-4 pax', '4', 2400, 3, 'Available', 'img/FM3.jpg'),
(20, 'Group Room', 'Capacity: 14 pax', '14', 4000, 1, 'Available', 'img/group1.jpg'),
(21, 'Dorm Room', 'Php 599/pax\r\nCapacity: 4 pax', '4', 599, 2, 'Available', 'img/Quad3.jpg');

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
-- Dumping data for table `walkinrooms_masterfile`
--

INSERT INTO `walkinrooms_masterfile` (`walkinrooms_id`, `walkinrooms_name`, `room_id`) VALUES
(25, 'Queen Room1', 16),
(26, 'Queen Room2', 16),
(27, 'Queen Room3', 16),
(28, 'Queen Room4', 16),
(29, 'Queen Room5', 16),
(30, 'Queen Room6', 16),
(31, 'Queen Room7', 16),
(32, 'Queen Room8', 16),
(33, 'Twin Queen Room1', 17),
(34, 'Twin Queen Room2', 17),
(35, 'Twin Queen Room3', 17),
(36, 'Twin Queen Room4', 17),
(37, 'Twin Queen Room5', 17),
(38, 'Twin Queen Room6', 17),
(39, 'Twin Queen Room7', 17),
(40, 'Twin Queen Room8', 17),
(41, 'Quad Room1', 18),
(42, 'Quad Room2', 18),
(43, 'Quad Room3', 18),
(44, 'Family Room1', 19),
(45, 'Family Room2', 19),
(46, 'Family Room3', 19),
(47, 'Group Room1', 20),
(48, 'Dorm Room1', 21),
(49, 'Dorm Room2', 21);

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
  MODIFY `assignedroom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=461;

--
-- AUTO_INCREMENT for table `billing_masterfile`
--
ALTER TABLE `billing_masterfile`
  MODIFY `billing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `discount_masterfile`
--
ALTER TABLE `discount_masterfile`
  MODIFY `discount_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `financialreports_masterfile`
--
ALTER TABLE `financialreports_masterfile`
  MODIFY `financialreport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `guestaddons_masterfile`
--
ALTER TABLE `guestaddons_masterfile`
  MODIFY `guestaddon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `guest_masterfile`
--
ALTER TABLE `guest_masterfile`
  MODIFY `guest_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `proofofpayment_masterfile`
--
ALTER TABLE `proofofpayment_masterfile`
  MODIFY `proofofpayment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `receipts_masterfile`
--
ALTER TABLE `receipts_masterfile`
  MODIFY `receipts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reports_masterfile`
--
ALTER TABLE `reports_masterfile`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservationreports_masterfile`
--
ALTER TABLE `reservationreports_masterfile`
  MODIFY `reservereports_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservation_masterfile`
--
ALTER TABLE `reservation_masterfile`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `room_masterfile`
--
ALTER TABLE `room_masterfile`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `walkinreservation_masterfile`
--
ALTER TABLE `walkinreservation_masterfile`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `walkinrooms_masterfile`
--
ALTER TABLE `walkinrooms_masterfile`
  MODIFY `walkinrooms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
