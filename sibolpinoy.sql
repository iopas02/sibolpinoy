-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2022 at 03:38 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibolpinoy`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

CREATE TABLE `adminlog` (
  `id` int(150) NOT NULL,
  `loginId` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `actionBy` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlog`
--

INSERT INTO `adminlog` (`id`, `loginId`, `action`, `actionBy`, `date`) VALUES
(269, 29, 'logged in', 'LerwickDeCastro', '2022-04-12 11:31:30'),
(270, 29, 'logged in', 'LerwickDeCastro', '2022-04-13 08:59:20'),
(271, 29, 'logged in', 'LerwickDeCastro', '2022-04-13 09:15:00'),
(272, 28, 'updated account', 'LerwickDeCastro', '2022-04-13 09:56:12'),
(273, 28, 'Reset Password of: jasonorioste', 'LerwickDeCastro', '2022-04-13 10:17:17'),
(274, 28, 'logged in', 'jasonorioste', '2022-04-13 10:17:42'),
(275, 29, 'logged in', 'LerwickDeCastro', '2022-04-13 10:19:34'),
(276, 29, 'logged in', 'LerwickDeCastro', '2022-04-13 10:59:41'),
(277, 29, 'Update Password', 'LerwickDeCastro', '2022-04-13 11:00:16'),
(278, 29, 'logged in', 'LerwickDeCastro', '2022-04-13 11:00:28'),
(279, 28, 'logged in', 'jasonorioste', '2022-04-13 11:00:55'),
(280, 28, 'Update Password', 'jasonorioste', '2022-04-13 11:01:58'),
(281, 28, 'logged in', 'jasonorioste', '2022-04-13 11:02:06'),
(282, 29, 'logged in', 'LerwickDeCastro', '2022-04-13 11:14:58'),
(283, 29, 'updated status', 'LerwickDeCastro', '2022-04-13 11:19:00'),
(284, 28, 'Archiving user', 'LerwickDeCastro', '2022-04-13 11:49:52'),
(285, 29, 'logged in', 'LerwickDeCastro', '2022-04-13 12:09:40'),
(286, 29, 'approved  consultation', 'LerwickDeCastro', '2022-04-13 13:17:58'),
(287, 29, 'reply consultation request', 'LerwickDeCastro', '2022-04-13 13:21:54'),
(288, 29, 'created new celebration post', 'LerwickDeCastro', '2022-04-13 13:26:47'),
(289, 29, 'update event status', 'LerwickDeCastro', '2022-04-13 13:29:19'),
(290, 29, 'approved event reservation', 'LerwickDeCastro', '2022-04-13 13:34:38'),
(291, 29, 'approved event reservation', 'LerwickDeCastro', '2022-04-13 13:35:33'),
(292, 29, 'reply event reservation', 'LerwickDeCastro', '2022-04-13 13:37:14'),
(293, 29, 'Create New Admin', 'LerwickDeCastro', '2022-04-13 13:40:15'),
(294, 30, 'Archiving user', 'LerwickDeCastro', '2022-04-13 13:42:33'),
(295, 29, 'logged in', 'LerwickDeCastro', '2022-04-13 13:43:30'),
(296, 29, 'created new event', 'LerwickDeCastro', '2022-04-13 13:47:56'),
(297, 29, 'update event status', 'LerwickDeCastro', '2022-04-13 13:49:29'),
(298, 29, 'logged in', 'LerwickDeCastro', '2022-04-13 15:53:33'),
(299, 29, 'logged in', 'LerwickDeCastro', '2022-04-14 09:14:18'),
(300, 29, 'update colsultaion sub categories request', 'LerwickDeCastro', '2022-04-14 10:25:50'),
(301, 29, 'update colsultaion sub categories request', 'LerwickDeCastro', '2022-04-14 10:34:48'),
(302, 29, 'update colsultaion sub categories request', 'LerwickDeCastro', '2022-04-14 10:38:59'),
(303, 29, 'update colsultaion sub categories request', 'LerwickDeCastro', '2022-04-14 10:54:11'),
(304, 29, 'Edit consultation date', 'LerwickDeCastro', '2022-04-14 12:22:01'),
(305, 29, 'Edit consultation time', 'LerwickDeCastro', '2022-04-14 12:47:32'),
(306, 29, 'approved  consultation', 'LerwickDeCastro', '2022-04-14 12:59:42'),
(307, 29, 'Edit consultation time', 'LerwickDeCastro', '2022-04-14 13:06:25'),
(308, 29, 'approved  consultation', 'LerwickDeCastro', '2022-04-14 13:06:37'),
(309, 29, 'Activate user yusukeurameshi', 'LerwickDeCastro', '2022-04-14 14:48:57'),
(310, 29, 'Activate user jasonorioste', 'LerwickDeCastro', '2022-04-14 14:55:47'),
(311, 28, 'Archiving user', 'LerwickDeCastro', '2022-04-14 14:57:33'),
(312, 29, 'Activate user jasonorioste', 'LerwickDeCastro', '2022-04-14 15:06:02'),
(313, 30, 'Archiving user', 'LerwickDeCastro', '2022-04-14 15:08:57'),
(314, 29, 'Activate user yusukeurameshi', 'LerwickDeCastro', '2022-04-14 15:14:46'),
(315, 30, 'Archiving user', 'LerwickDeCastro', '2022-04-14 15:16:49'),
(316, 29, 'Activate user yusukeurameshi', 'LerwickDeCastro', '2022-04-14 15:16:57'),
(317, 29, 'Activate user yusukeurameshi', 'LerwickDeCastro', '2022-04-14 15:16:57'),
(318, 30, 'Archiving user', 'LerwickDeCastro', '2022-04-14 15:18:00'),
(319, 29, 'Activate user yusukeurameshi', 'LerwickDeCastro', '2022-04-14 15:18:16'),
(320, 29, 'logged in', 'LerwickDeCastro', '2022-04-14 15:47:24'),
(321, 30, 'logged in', 'yusukeurameshi', '2022-04-14 15:58:57'),
(322, 30, 'Log out', 'yusukeurameshi', '2022-04-14 16:23:42'),
(323, 28, 'logged in', 'jasonorioste', '2022-04-14 16:25:57'),
(324, 28, 'Log out', 'jasonorioste', '2022-04-14 16:28:19'),
(325, 29, 'Log out', 'LerwickDeCastro', '2022-04-14 17:52:44'),
(326, 29, 'logged in', 'LerwickDeCastro', '2022-04-14 19:09:47'),
(327, 29, 'logged in', 'LerwickDeCastro', '2022-04-15 10:02:35'),
(328, 29, 'Log out', 'LerwickDeCastro', '2022-04-15 11:13:25'),
(329, 29, 'logged in', 'LerwickDeCastro', '2022-04-15 11:36:28'),
(330, 29, 'Log out', 'LerwickDeCastro', '2022-04-15 11:36:33'),
(331, 29, 'logged in', 'LerwickDeCastro', '2022-04-15 13:31:09'),
(332, 28, 'logged in', 'jasonorioste', '2022-04-15 14:47:03'),
(333, 28, 'Log out', 'jasonorioste', '2022-04-15 14:48:40'),
(334, 29, 'updated status', 'LerwickDeCastro', '2022-04-15 15:08:43'),
(335, 29, 'updated status', 'LerwickDeCastro', '2022-04-15 15:08:51'),
(336, 29, 'Log out', 'LerwickDeCastro', '2022-04-15 16:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `archiveuser`
--

CREATE TABLE `archiveuser` (
  `id` int(11) NOT NULL,
  `loginId` int(11) NOT NULL,
  `profileId` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `level` varchar(64) NOT NULL,
  `reason` longtext NOT NULL,
  `status` varchar(50) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `dateDeleted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `celebration`
--

CREATE TABLE `celebration` (
  `keepingID` int(150) NOT NULL,
  `commemoration` varchar(250) NOT NULL,
  `header` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `message1` longtext DEFAULT NULL,
  `message2` longtext DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `loginId` int(150) NOT NULL,
  `action` varchar(100) NOT NULL,
  `uploaded` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `celebration`
--

INSERT INTO `celebration` (`keepingID`, `commemoration`, `header`, `image`, `message1`, `message2`, `date_start`, `status`, `loginId`, `action`, `uploaded`, `updated`) VALUES
(2, 'Happy International Women\'s Day', 'We Celebrate on this Month', 'IMG-62356fd8ede6c6.61067933.gif', 'Celebrate women\'s achievement. Raise awareness against bias and take action for equality.', 'A simple message from SPMC', '2022-03-08', 'unpublished', 29, 'update event status', '2022-03-19 13:53:28', '2022-03-24 09:50:57'),
(3, 'Day Of Valor', 'SPMC Commemorate on this Month', 'IMG-623bce2ca228e4.47305632.gif', 'Araw ng Kagitingan in Filipino, this official regular nationwide holiday is celebrated annually on April 9th.', 'Message from SPMC', '2022-04-09', 'unpublished', 29, 'update celebration', '2022-03-24 09:49:32', '2022-03-28 15:38:51'),
(5, 'Recollection of Holy Week', 'SPMC Commemorate on this Month', 'IMG-62565f17eb64d4.06071909.png', 'Holy Week, the Christian observance commemorating the Passion of Jesus Christ, takes place between Palm Sunday and Easter.', '', '2022-04-14', 'published', 29, 'update event status', '2022-04-13 13:26:47', '2022-04-13 13:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `c_count` int(150) NOT NULL,
  `client_uniID` varchar(250) NOT NULL,
  `firstName` varchar(250) NOT NULL,
  `mi` text DEFAULT NULL,
  `lastName` varchar(250) NOT NULL,
  `email_add` varchar(250) NOT NULL,
  `contact` varchar(250) DEFAULT NULL,
  `organization` varchar(250) NOT NULL,
  `position` varchar(250) NOT NULL,
  `date_register` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`c_count`, `client_uniID`, `firstName`, `mi`, `lastName`, `email_add`, `contact`, `organization`, `position`, `date_register`) VALUES
(59, '2022-3zkwpnjelc', 'Jason', 'C', 'Orioste', 'syntaxgroup2021@gmail.com', '098765432112', 'Jose Rizal University', 'Student', '2022-04-06 12:19:43'),
(60, '2022-496rwazgny', 'Yusuke', 'C', 'Urameshi', 'irecommend.ahis.als@gmail.com', '098765432112', 'State University', 'Faculty', '2022-04-06 13:03:47'),
(61, '2022-z1p092ocxi', 'Violet', 'A', 'Evergarden', 'treszeta28@gmail.com', '098765432112', ' Auto Memory Dolls', 'Writer', '2022-04-07 21:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `entryID` int(250) NOT NULL,
  `email_add` varchar(250) NOT NULL,
  `consultation_id` varchar(250) NOT NULL,
  `service_uniID` varchar(250) NOT NULL,
  `memo` text DEFAULT NULL,
  `set_date` date DEFAULT NULL,
  `set_time` time DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `registered_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`entryID`, `email_add`, `consultation_id`, `service_uniID`, `memo`, `set_date`, `set_time`, `status`, `action`, `registered_date`) VALUES
(19, 'treszeta28@gmail.com', '2022-pj2acmnub9w0e1y', '2022-12686', 'test two', '2022-05-02', '10:30:00', 'Approved', 'Read', '2022-04-14 10:52:59'),
(20, 'syntaxgroup2021@gmail.com', '2022-usrfxgmj29bz0ea', '2022-31471', 'test test test', '2022-05-14', '09:00:00', 'Pending', 'Read', '2022-04-14 12:18:26'),
(21, 'syntaxgroup2021@gmail.com', '2022-pfkaq305y7t42g8', '2022-31471', 'test test test', '2022-05-13', '09:00:00', 'Pending', 'Read', '2022-04-14 12:18:35');

-- --------------------------------------------------------

--
-- Table structure for table `consultation_reports`
--

CREATE TABLE `consultation_reports` (
  `consul_reportID` int(250) NOT NULL,
  `client_uniID` varchar(250) NOT NULL,
  `service_uniID` varchar(250) NOT NULL,
  `sub_cat_uniID` varchar(250) NOT NULL,
  `consultation_id` varchar(250) NOT NULL,
  `set_date` date DEFAULT NULL,
  `set_time` time DEFAULT NULL,
  `loginId` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `approved_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultation_reports`
--

INSERT INTO `consultation_reports` (`consul_reportID`, `client_uniID`, `service_uniID`, `sub_cat_uniID`, `consultation_id`, `set_date`, `set_time`, `loginId`, `status`, `approved_date`) VALUES
(18, '2022-z1p092ocxi', '2022-12686 ', '2022-v7kdehf', '2022-pj2acmnub9w0e1y', '2022-05-02', '10:30:00', 29, 'Approved', '2022-04-14 13:06:37'),
(19, '2022-z1p092ocxi', '2022-12686 ', '2022-b25ngek', '2022-pj2acmnub9w0e1y', '2022-05-02', '10:30:00', 29, 'Approved', '2022-04-14 13:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `consul_list_category`
--

CREATE TABLE `consul_list_category` (
  `listID` int(250) NOT NULL,
  `email_add` varchar(250) NOT NULL,
  `consultation_id` varchar(250) NOT NULL,
  `sub_cat_uniID` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consul_list_category`
--

INSERT INTO `consul_list_category` (`listID`, `email_add`, `consultation_id`, `sub_cat_uniID`) VALUES
(73, 'treszeta28@gmail.com', '2022-pj2acmnub9w0e1y', '2022-v7kdehf'),
(75, 'treszeta28@gmail.com', '2022-pj2acmnub9w0e1y', '2022-b25ngek'),
(76, 'syntaxgroup2021@gmail.com', '2022-usrfxgmj29bz0ea', '2022-ntz9hp5'),
(77, 'syntaxgroup2021@gmail.com', '2022-usrfxgmj29bz0ea', '2022-3cd9ohy'),
(78, 'syntaxgroup2021@gmail.com', '2022-usrfxgmj29bz0ea', '2022-f8zmpba'),
(79, 'syntaxgroup2021@gmail.com', '2022-pfkaq305y7t42g8', '2022-ntz9hp5'),
(80, 'syntaxgroup2021@gmail.com', '2022-pfkaq305y7t42g8', '2022-3cd9ohy'),
(81, 'syntaxgroup2021@gmail.com', '2022-pfkaq305y7t42g8', '2022-f8zmpba');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `emailID` int(150) NOT NULL,
  `client_uniID` varchar(250) DEFAULT NULL,
  `subject` varchar(250) NOT NULL,
  `message` longtext DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `date_mailed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`emailID`, `client_uniID`, `subject`, `message`, `status`, `date_mailed`) VALUES
(21, '2022-z1p092ocxi', 'Request for sample outline of services', 'This is a sample request message from the contact page of SPMC website', 'Read', '2022-04-07 21:02:26'),
(22, '2022-3zkwpnjelc', 'This is a testing message', 'This is a testing message from Contact Page of New SPMC Website', 'Read', '2022-04-14 19:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventID` int(150) NOT NULL,
  `event_img` varchar(250) NOT NULL,
  `header` longtext DEFAULT NULL,
  `event_title` varchar(250) NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_and_time` varchar(250) NOT NULL,
  `reg_fee` varchar(250) NOT NULL,
  `desc_1` longtext DEFAULT NULL,
  `desc_2` longtext DEFAULT NULL,
  `loginId` int(150) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_published` datetime DEFAULT NULL,
  `action` varchar(250) NOT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `event_img`, `header`, `event_title`, `date_start`, `date_and_time`, `reg_fee`, `desc_1`, `desc_2`, `loginId`, `status`, `date_published`, `action`, `date_update`) VALUES
(1, 'IMG-62317b9f5731b3.22549484.png', 'Join Sibol-PINOY Management Consultancy on its FREE WEBINAR with the theme, \"Pinakbet or Laing: Weighing Alternatives, Making the Right Choice #NOTAPOLITICALFORUM', 'A Webinar on Business Decision-Making, and Product and Service Management.', '2022-04-01', 'Friday, 1st of April, 2022 from 5:00 PM to 8:00 PM', 'FREE WEBINAR ', 'Don\'t miss the opportunity to discover the world of Business Decision-Making and Product and Service Management!', 'https://forms.gle/9dYUAzVDbSKbR9xg8', 29, 'published', '2022-03-16 13:54:39', 'update event', '2022-03-27 09:58:56'),
(2, 'IMG-62346722360a95.38485299.jpg', 'Avail UP TO 50% OFF on any of the following Training-Workshops below:', 'ISO 9001:2015 Requirements and Internal Quality Audit', '2022-03-05', 'March 5, 6, 12 & 13, 2022 | 9AM-5PM', 'Regular Fee: P2,000.00', 'Early Bird Discount (20% OFF): P1,600.00/Training if you register until March 1, 2022', 'Student & Group Registration (Min. of 3 pax | 50% OFF): P1,000.00/Pax.', 29, 'unpublished', '2022-03-17 08:08:19', 'update event status', '2022-03-30 08:07:43'),
(3, 'IMG-62346809cd8090.78014898.jpg', 'Avail UP TO 50% OFF on any of the following Training-Workshops below:', 'Strategic Planning Risk Based Management', '2022-03-07', 'March 7 - 11, 2022 | 5PM-9PM', 'Regular Fee: P2,000.00', 'Early Bird Discount (20% OFF): P1,600.00/Training if you register until March 1, 2022', 'Student & Group Registration (Min. of 3 pax | 50% OFF): P1,000.00/Pax.', 29, 'unpublished', '2022-03-18 19:07:53', 'update event status', '2022-03-27 16:34:15'),
(4, 'IMG-623469da460077.86291692.jpg', 'Sibol-PINOY Management Consultancy (SPMC) is offering a 4 day Training Workshop ', 'ISO 9001:2015 Quality Management  System Requirements and Documentation ', '2021-10-30', 'October 30-31 and November 6-7, 2021 from 9:00am to 5:00pm.', 'Regular Fee: P2,500.00', 'Participants shall receive lecture notes, workable templates, and certificates upon completion. ', '', 29, 'unpublished', '2022-03-18 19:15:38', 'update event status', '2022-03-18 19:57:47'),
(5, 'IMG-62346b0fba02e8.96366425.png', 'Join Sibol-PINOY Management Consultancy on its FREE WEBINAR ROADSHOW ', 'Building Organizational Resilience 101: Risk Management and Root Cause Analysis', '2022-02-16', 'Wednesday, 16 February 2022 from 5PM to 8PM.', 'FREE WEBINAR ', 'Get 2 Certificates in 1 Webinar', '', 29, 'unpublished', '2022-03-18 19:20:47', 'update event status', '2022-03-18 19:57:55'),
(6, 'IMG-62346cad767fc7.20261876.png', 'Join Sibol-PINOY Management Consultancy on its first ever FREE WEBINAR ROADSHOW', 'Building Organizational Resilience: Introducing Tools and Techniques for Risk Management and Root Cause Analysis', '2022-01-09', 'January 9, 2022 from 9AM to 12 NN.', 'FREE WEBINAR ', 'Donâ€™t miss the opportunity to take on the world of Risk Management and Root Cause Analysis!', '', 29, 'unpublished', '2022-03-18 19:27:41', 'update event status', '2022-03-18 19:58:03'),
(7, 'IMG-623475043197b2.88324006.png', 'Sibol-PINOY Management Consultancy LIVE VIRTUAL TRAINING-WORKSHOPS Schedules for 2022:', 'Introduction to ISO 9001:2015 Internal Quality Audit', '2022-01-22', 'January 22, 23, 29, 30, 2022 | 9AM-5PM ', 'Regular Fee: P2,000.00', 'Year-End Discount: P1,000.00 until December 31, 2021', 'Early Bird Discount: P1,600.00 if you register from January 1 - 15, 2022', 29, 'unpublished', '2022-03-18 20:03:16', 'created new event', '2022-03-18 20:03:16'),
(8, 'IMG-6234756ca1dcd4.17765772.png', 'Sibol-PINOY Management Consultancy LIVE VIRTUAL TRAINING-WORKSHOPS Schedules for 2022:', 'Essentials in Project Management and MEAL (Monitoring, Evaluation, Accountability, and Learning):', '2022-02-24', 'January 24-28, 2022 | 5PM-9PM', 'Regular Fee: P2,000.00', 'Year-End Discount: P1,000.00 until December 31, 2021', 'Early Bird Discount: P1,600.00 if you register from January 1 - 15, 2022', 29, 'unpublished', '2022-03-18 20:05:00', 'created new event', '2022-03-18 20:05:00'),
(10, 'IMG-6256640cb6bff9.35600476.png', 'Join Sibol-PINOY Management Consultancy on its FREE WEBINAR IT', ' A Webinar on Web Development', '2022-04-30', 'April 30 2022 from 5:00 PM to 8:00 PM', 'FREE WEBINAR ', 'Donâ€™t miss the opportunity to discover the world of Business Decision-Making and Product and Service Management!', '', 29, 'published', '2022-04-13 13:47:56', 'update event status', '2022-04-13 13:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `event_reservation`
--

CREATE TABLE `event_reservation` (
  `entryID` int(150) NOT NULL,
  `email_add` varchar(250) NOT NULL,
  `reservationID` varchar(250) NOT NULL,
  `eventID` int(150) NOT NULL,
  `ss_payment` varchar(250) DEFAULT NULL,
  `payment_method` varchar(250) NOT NULL,
  `date_registered` datetime DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_reservation`
--

INSERT INTO `event_reservation` (`entryID`, `email_add`, `reservationID`, `eventID`, `ss_payment`, `payment_method`, `date_registered`, `status`, `action`) VALUES
(66, 'irecommend.ahis.als@gmail.com', '2022-3zb9r0v2', 1, '', 'Free', '2022-04-06 13:03:47', 'Approved', 'Read'),
(70, 'syntaxgroup2021@gmail.com', '2022-ly6pv4091koh2be7djux', 1, '', 'Free', '2022-04-08 17:29:30', 'Declined', 'Read'),
(72, 'treszeta28@gmail.com ', '2022-3zb9r0v2', 1, 'gcash.jpg', 'Free', '2022-04-13 13:32:32', 'Approved', 'Read');

-- --------------------------------------------------------

--
-- Table structure for table `event_reservation_reports`
--

CREATE TABLE `event_reservation_reports` (
  `er_reportID` int(150) NOT NULL,
  `client_uniID` varchar(250) NOT NULL,
  `eventID` int(150) NOT NULL,
  `reservationID` varchar(250) NOT NULL,
  `date_and_time` varchar(250) NOT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `loginid` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `approved_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_reservation_reports`
--

INSERT INTO `event_reservation_reports` (`er_reportID`, `client_uniID`, `eventID`, `reservationID`, `date_and_time`, `payment_method`, `loginid`, `status`, `approved_date`) VALUES
(2, '2022-z1p092ocxi', 1, '2022-3zb9r0v2', 'Friday, 1st of April, 2022 from 5:00 PM to 8:00 PM', 'Free', 29, 'Approved', '2022-04-13 13:34:38'),
(3, '2022-496rwazgny', 1, '2022-3zb9r0v2', 'Friday, 1st of April, 2022 from 5:00 PM to 8:00 PM', 'Free', 29, 'Approved', '2022-04-13 13:35:33');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `loginId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(64) NOT NULL,
  `status` varchar(255) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `lastLoginDate` datetime DEFAULT NULL,
  `monitor` tinytext DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginId`, `username`, `password`, `level`, `status`, `dateAdded`, `lastLoginDate`, `monitor`, `createdBy`) VALUES
(28, 'jasonorioste', '$2y$10$I1k9RgyuhPnuXzU7Hn63k.j70sgQxEm11VooQ9HjF6bMPjruQT2FO', '0', 'active', '2022-04-12 00:00:00', '2022-04-15 14:47:03', 'Out', 'yusukeurameshi'),
(29, 'LerwickDeCastro', '$2y$10$x1eNXnYh0IZQqL3OUdTtv.ztwTOHArTU7tcoHBRh3uZIV84KgfpgS', '1', 'active', '2022-04-12 00:00:00', '2022-04-15 13:31:09', 'Out', 'yusukeurameshi'),
(30, 'yusukeurameshi', '$2y$10$HLedyopaYYVLXV/A9nQElO7HWHfanMTJNMe2XCj0adQk6rGnr9zv2', '0', 'active', '2022-04-13 00:00:00', '2022-04-14 15:58:57', 'Out', 'LerwickDeCastro');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `loginId` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `dateAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `loginId`, `firstName`, `lastName`, `dateAdded`) VALUES
(23, 28, 'Jason', 'Orioste', '2022-04-12 00:00:00'),
(24, 29, 'Lerwick', 'De Castro', '2022-04-12 00:00:00'),
(25, 30, 'Yusuke', 'Urameshi', '2022-04-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `scheduler`
--

CREATE TABLE `scheduler` (
  `id` int(45) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `start_event` datetime DEFAULT NULL,
  `end_event` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scheduler`
--

INSERT INTO `scheduler` (`id`, `title`, `start_event`, `end_event`) VALUES
(27, 'Consultation about: Technological Solutions Consultation ID: 2022-pj2acmnub9w0e1y', '2022-05-02 10:30:00', '2022-05-02 10:30:00'),
(30, 'Holy Wednesday', '2022-04-13 00:00:00', '2022-04-14 00:00:00'),
(31, 'Maundy Thursday', '2022-04-14 00:00:00', '2022-04-15 00:00:00'),
(32, 'Good Friday', '2022-04-15 00:00:00', '2022-04-16 00:00:00'),
(33, 'Holy Saturday', '2022-04-16 00:00:00', '2022-04-17 00:00:00'),
(34, 'Easter Sunday', '2022-04-17 00:00:00', '2022-04-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sent_email`
--

CREATE TABLE `sent_email` (
  `sentID` int(150) NOT NULL,
  `client_uniID` varchar(250) NOT NULL,
  `email_add` varchar(250) NOT NULL,
  `loginId` int(11) NOT NULL,
  `company_email` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `reply` longtext DEFAULT NULL,
  `action` varchar(50) NOT NULL,
  `date_reply` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sent_email`
--

INSERT INTO `sent_email` (`sentID`, `client_uniID`, `email_add`, `loginId`, `company_email`, `subject`, `reply`, `action`, `date_reply`) VALUES
(17, '2022-3zkwpnjelc', 'syntaxgroup2021@gmail.com', 25, 'itdept.sibolpinoy@gmail.com', 'Business Consultancy', 'Hi, Good day we would to inform to you that your consultation request is approved.\r\nPlease refer to the zoom link below for the virtual consultation and for the following details.\r\nhttps://us02web.zoom.us/j/7360090243?pwd=cUwxcHZkbnF2czNjSGluQ2EwT1V5Zz09', 'reply consultation request', '2022-04-07 19:08:04'),
(19, '2022-z1p092ocxi', 'treszeta28@gmail.com', 25, 'itdept.sibolpinoy@gmail.com', 'Request for sample outline of services', 'Hi, we will send you your request through are official email address, kindly wait for the reply and thank you.', 'Reply client email from contact page', '2022-04-07 21:50:03'),
(21, '2022-496rwazgny', 'irecommend.ahis.als@gmail.com', 25, 'itdept.sibolpinoy@gmail.com', 'A Webinar on Business Decision-Making, and Product and Service Management.', 'Hi, We already approved your event request, please look for the following information below and for your zoom link. https://us02web.zoom.us/j/7360090243?pwd=cUwxcHZkbnF2czNjSGluQ2EwT1V5Zz09', 'reply event reservation', '2022-04-11 18:17:43'),
(22, '2022-496rwazgny', 'irecommend.ahis.als@gmail.com', 29, 'itdept.sibolpinoy@gmail.com', 'Technological Solutions', 'Hi, we already approved your consultation request..https://mysamplwebsite.online/consultation', 'reply consultation request', '2022-04-13 13:21:54'),
(23, '2022-z1p092ocxi', 'treszeta28@gmail.com ', 29, 'itdept.sibolpinoy@gmail.com', 'A Webinar on Business Decision-Making, and Product and Service Management.', 'we approved...https://mysamplwebsite.online/admin/landing.php', 'reply event reservation', '2022-04-13 13:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `number` int(100) NOT NULL,
  `service_uniID` varchar(250) NOT NULL,
  `service_title` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `service_desc` longtext NOT NULL,
  `status` varchar(50) NOT NULL,
  `loginId` varchar(250) DEFAULT NULL,
  `action` varchar(250) DEFAULT NULL,
  `date_upload` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`number`, `service_uniID`, `service_title`, `image`, `service_desc`, `status`, `loginId`, `action`, `date_upload`, `date_update`) VALUES
(12, '2022-31471', 'Business Consultancy', 'IMG-62342585e0a808.03067507.jpg', 'In Sibol-Pinoy , we boast of our world class approach in helping organizations achieve their objectives. We just do not partner with our clients, we engage and become one with them in their journey to quality improvement.', 'Active', '29', 'update services', '2022-03-14 21:12:08', '2022-04-05 10:12:24'),
(13, '2022-12686', 'Technological Solutions', 'IMG-6235276aa8eba7.41810605.jpg', 'Let Sibol-Pinoy help you provide complete customer solutions that span the IT life-cycle. Our technology experts will work with you to exceed the demand of high-growth technology in the vertical markets locally and around the world.', 'Active', '29', 'update service image', '2022-03-18 09:25:07', '2022-03-19 08:44:26'),
(14, '2022-75881', 'Training and Development', 'IMG-623527940c7978.02103273.jpg', 'As we envision our client to be self-dependent, we put emphasis on capacity-building and capability-building activities. Thus, Ideation Philippines has carefully designed and developed training modules and short-term courses aligned with global standards.', 'Active', '29', 'update service status', '2022-03-19 08:45:08', '2022-03-28 17:28:52'),
(15, '2022-28578', 'Research Development', 'IMG-623527bc0e4ac0.57469004.jpg', 'Sibol-Pinoy Management Consultancy highly engaged team members are specialized in providing technical assistance providing professional development and management support to public and private sector organizations in order to maximize resources and value, while minimizing cost and risk.', 'Active', '29', 'update service status', '2022-03-19 08:45:48', '2022-03-28 17:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `services_category`
--

CREATE TABLE `services_category` (
  `number` int(100) NOT NULL,
  `category_uniID` varchar(250) NOT NULL,
  `service_uniID` varchar(250) NOT NULL,
  `category_title` varchar(250) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `loginId` varchar(250) DEFAULT NULL,
  `action` varchar(250) DEFAULT NULL,
  `date_upload` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services_category`
--

INSERT INTO `services_category` (`number`, `category_uniID`, `service_uniID`, `category_title`, `status`, `loginId`, `action`, `date_upload`, `date_update`) VALUES
(4, '2022-kodji7', '2022-31471', 'Compliance and Standards', 'Active', '29', 'update service status', '2022-03-14 22:54:50', '2022-03-18 09:19:27'),
(5, '2022-cpqrk0', '2022-31471', 'Performance Excellence', 'Active', '29', 'update service status', '2022-03-17 22:10:33', '2022-03-18 09:19:27'),
(6, '2022-x8b07w', '2022-31471', 'Productivity & Quality', 'Active', '29', 'update category status', '2022-03-17 22:56:32', '2022-03-28 16:39:50'),
(7, '2022-8gl4wh', '2022-12686', 'Graphics Services', 'Active', '29', 'create category services', '2022-03-19 08:46:34', '2022-03-19 08:46:34'),
(8, '2022-aysmc9', '2022-12686', 'Web Designing', 'Active', '29', 'create category services', '2022-03-19 08:47:00', '2022-03-19 08:47:00'),
(9, '2022-njgk1x', '2022-12686', 'Document Services', 'Active', '29', 'create category services', '2022-03-19 08:47:32', '2022-03-19 08:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `services_sub_category`
--

CREATE TABLE `services_sub_category` (
  `number` int(100) NOT NULL,
  `sub_cat_uniID` varchar(250) NOT NULL,
  `service_uniID` varchar(250) NOT NULL,
  `category_uniID` varchar(250) NOT NULL,
  `sub_cat_title` varchar(250) NOT NULL,
  `status` varchar(100) NOT NULL,
  `loginId` varchar(250) DEFAULT NULL,
  `action` varchar(250) DEFAULT NULL,
  `date_upload` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services_sub_category`
--

INSERT INTO `services_sub_category` (`number`, `sub_cat_uniID`, `service_uniID`, `category_uniID`, `sub_cat_title`, `status`, `loginId`, `action`, `date_upload`, `date_update`) VALUES
(4, '2022-hvmy87z', '2022-31471', '2022-kodji7 ', 'Automotive Quality Management System Standard (IATF 16949:2016)', 'Active', '29', 'update service status', '2022-03-14 23:53:43', '2022-03-18 09:19:27'),
(5, '2022-wi05ysb', '2022-31471', '2022-kodji7 ', 'Energy Management System (ISO 50001:2011)', 'Active', '29', 'update service status', '2022-03-17 22:11:12', '2022-03-18 09:19:27'),
(6, '2022-ptsavj9', '2022-31471', '2022-kodji7 ', 'Environmental Management System (ISO 14001:2015)', 'Active', '29', 'update service status', '2022-03-17 22:15:23', '2022-03-18 09:19:27'),
(7, '2022-iayrbg9', '2022-31471', '2022-kodji7 ', 'Food Safety Management System (ISO 22000:2005) & HACCP', 'Active', '29', 'update service status', '2022-03-17 22:21:15', '2022-03-18 09:19:27'),
(8, '2022-z824qel', '2022-31471', '2022-kodji7 ', 'Food Safety Systems Certification (FSSC 22000)', 'Active', '29', 'update service status', '2022-03-17 22:21:42', '2022-03-18 09:19:27'),
(9, '2022-owhixj7', '2022-31471', '2022-kodji7 ', 'Information Security Management System (ISO 27001:2013)', 'Active', '29', 'update service status', '2022-03-17 22:21:54', '2022-03-18 09:19:27'),
(10, '2022-a3jo4hc', '2022-31471', '2022-kodji7 ', 'Occupational Health & Safety Management System (OHSAS 18001)/ISO 45001:2016)', 'Active', '29', 'update service status', '2022-03-17 22:22:08', '2022-03-18 09:19:27'),
(11, '2022-ntz9hp5', '2022-31471', '2022-kodji7 ', 'Quality Management System (ISO 9001:2015)', 'Active', '29', 'update service status', '2022-03-17 22:22:21', '2022-03-18 09:19:27'),
(12, '2022-d4ri03x', '2022-31471', '2022-cpqrk0 ', 'Business Excellence Self-Assessment', 'Active', '29', 'update service status', '2022-03-17 22:24:40', '2022-03-18 09:19:27'),
(13, '2022-f85s3y6', '2022-31471', '2022-cpqrk0 ', 'Third-Party BE Assessment', 'Active', '29', 'update service status', '2022-03-17 22:51:47', '2022-03-18 09:19:27'),
(14, '2022-mjyplnb', '2022-31471', '2022-cpqrk0 ', 'Leadership Excellence', 'Active', '29', 'update service status', '2022-03-17 22:52:01', '2022-03-18 09:19:27'),
(15, '2022-36pfznu', '2022-31471', '2022-cpqrk0 ', 'Strategic Planning', 'Active', '29', 'update service status', '2022-03-17 22:52:14', '2022-03-18 09:19:27'),
(16, '2022-j3pts5w', '2022-31471', '2022-cpqrk0 ', 'Customer-Focused Excellence', 'Active', '29', 'update service status', '2022-03-17 22:52:32', '2022-03-18 09:19:27'),
(17, '2022-vr172dy', '2022-31471', '2022-cpqrk0 ', 'Knowledge Management', 'Active', '29', 'update service status', '2022-03-17 22:55:10', '2022-03-18 09:19:27'),
(18, '2022-f0xpqh8', '2022-31471', '2022-cpqrk0 ', 'HR Excellence', 'Active', '29', 'update service status', '2022-03-17 22:55:30', '2022-03-18 09:19:27'),
(19, '2022-3cd9ohy', '2022-31471', '2022-cpqrk0 ', 'Operations Excellence', 'Active', '29', 'update service status', '2022-03-17 22:55:45', '2022-03-18 09:19:27'),
(20, '2022-s1zgyft', '2022-31471', '2022-x8b07w ', 'P&Q Diagnosis', 'Active', '29', 'update category status', '2022-03-17 22:56:51', '2022-03-28 16:39:50'),
(21, '2022-hpsi74t', '2022-31471', '2022-x8b07w ', '5s', 'Active', '29', 'update category status', '2022-03-17 22:57:04', '2022-03-28 16:39:50'),
(22, '2022-f8zmpba', '2022-31471', '2022-x8b07w ', 'SS', 'Active', '29', 'update category status', '2022-03-17 22:57:16', '2022-03-28 16:39:50'),
(23, '2022-nfh4i3j', '2022-31471', '2022-x8b07w ', 'WIT', 'Active', '29', 'update category status', '2022-03-17 22:57:31', '2022-03-28 16:39:50'),
(24, '2022-ruqfedp', '2022-31471', '2022-x8b07w ', 'Lean Management', 'Active', '29', 'update category status', '2022-03-17 22:57:42', '2022-03-28 16:39:50'),
(25, '2022-cz2yu3b', '2022-31471', '2022-x8b07w ', 'Labor-Management Cooperation', 'Active', '29', 'update category status', '2022-03-17 22:57:59', '2022-03-28 16:39:50'),
(26, '2022-yo6bgsi', '2022-12686', '2022-8gl4wh ', 'Logo', 'Active', '25', 'create sub-category services', '2022-03-19 08:48:15', '2022-03-19 08:48:15'),
(27, '2022-ok2watb', '2022-12686', '2022-8gl4wh ', 'Flyer', 'Active', '29', 'create sub-category services', '2022-03-19 08:48:35', '2022-03-19 08:48:35'),
(28, '2022-us80qt6', '2022-12686', '2022-8gl4wh ', 'Design Services', 'Active', '29', 'create sub-category services', '2022-03-19 08:48:54', '2022-03-19 08:48:54'),
(29, '2022-ehzfi5u', '2022-12686', '2022-8gl4wh ', 'Banner design', 'Active', '29', 'create sub-category services', '2022-03-19 08:49:10', '2022-03-19 08:49:10'),
(30, '2022-ka98hjt', '2022-12686', '2022-8gl4wh ', 'Ad Boxes design', 'Active', '29', 'create sub-category services', '2022-03-19 08:49:22', '2022-03-19 08:49:22'),
(31, '2022-3jv1ms0', '2022-12686', '2022-8gl4wh ', 'Brochure', 'Active', '29', 'create sub-category services', '2022-03-19 08:49:37', '2022-03-19 08:49:37'),
(32, '2022-v7kdehf', '2022-12686', '2022-aysmc9 ', 'Web Content', 'Active', '29', 'create sub-category services', '2022-03-19 08:50:00', '2022-03-19 08:50:00'),
(33, '2022-d5vrgqo', '2022-12686', '2022-aysmc9 ', 'Redesign Services', 'Active', '29', 'create sub-category services', '2022-03-19 08:50:12', '2022-03-19 08:50:12'),
(34, '2022-b25ngek', '2022-12686', '2022-aysmc9 ', 'Content Upload', 'Active', '29', 'create sub-category services', '2022-03-19 08:50:24', '2022-03-19 08:50:24'),
(35, '2022-k7gbmje', '2022-12686', '2022-aysmc9 ', 'Technical Maintenance', 'Active', '29', 'create sub-category services', '2022-03-19 08:50:38', '2022-03-19 08:50:38'),
(36, '2022-6kts8on', '2022-12686', '2022-aysmc9 ', 'Customer-Focused Excellence', 'Active', '29', 'create sub-category services', '2022-03-19 08:51:10', '2022-03-19 08:51:10'),
(37, '2022-nej8ztf', '2022-12686', '2022-aysmc9 ', 'Web Hosting', 'Active', '29', 'create sub-category services', '2022-03-19 08:51:26', '2022-03-19 08:51:26'),
(38, '2022-so9tavc', '2022-12686', '2022-aysmc9 ', 'Web Statistics', 'Active', '29', 'create sub-category services', '2022-03-19 08:51:37', '2022-03-19 08:51:37'),
(39, '2022-tzhgp76', '2022-12686', '2022-njgk1x ', 'Presentation Services', 'Active', '29', 'create sub-category services', '2022-03-19 08:51:52', '2022-03-19 08:51:52'),
(40, '2022-8vb16o7', '2022-12686', '2022-njgk1x ', 'Transcription', 'Active', '29', 'create sub-category services', '2022-03-19 08:52:05', '2022-03-19 08:52:05'),
(41, '2022-1ezoubm', '2022-12686', '2022-njgk1x ', 'Proofreading', 'Active', '29', 'create sub-category services', '2022-03-19 08:52:16', '2022-03-19 08:52:16'),
(42, '2022-fiynw46', '2022-12686', '2022-njgk1x ', 'Conceptual Design', 'Active', '29', 'create sub-category services', '2022-03-19 08:52:27', '2022-03-19 08:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `visitorsID` int(250) NOT NULL,
  `visitorsIP` varchar(250) NOT NULL,
  `date_visited` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`visitorsID`, `visitorsIP`, `date_visited`) VALUES
(1, '::1', '2022-04-04 13:30:26'),
(2, '::1', '2022-04-04 13:30:34'),
(3, '::1', '2022-04-04 13:32:30'),
(4, '::1', '2022-04-04 13:32:32'),
(5, '::1', '2022-04-04 13:32:34'),
(6, '::1', '2022-04-04 13:34:09'),
(7, '::1', '2022-04-04 13:34:11'),
(8, '::1', '2022-04-04 13:35:55'),
(9, '::1', '2022-04-04 13:36:48'),
(10, '::1', '2022-04-04 13:43:32'),
(11, '::1', '2022-04-04 13:43:34'),
(12, '::1', '2022-04-04 13:43:36'),
(13, '::1', '2022-04-04 13:43:38'),
(14, '::1', '2022-04-04 13:43:40'),
(15, '::1', '2022-04-04 13:43:41'),
(16, '::1', '2022-04-04 13:46:11'),
(17, '::1', '2022-04-04 13:46:14'),
(18, '::1', '2022-04-04 13:46:15'),
(19, '::1', '2022-04-04 13:46:17'),
(20, '::1', '2022-04-04 13:46:18'),
(21, '::1', '2022-04-04 13:46:20'),
(22, '::1', '2022-04-04 13:46:22'),
(23, '::1', '2022-04-04 13:46:23'),
(24, '::1', '2022-04-04 13:46:24'),
(25, '::1', '2022-04-04 13:46:25'),
(26, '::1', '2022-04-04 13:47:33'),
(27, '::1', '2022-04-04 13:47:35'),
(28, '::1', '2022-04-04 13:47:36'),
(29, '::1', '2022-04-04 13:48:55'),
(30, '::1', '2022-04-04 13:49:01'),
(31, '::1', '2022-04-04 13:52:40'),
(32, '::1', '2022-04-04 14:07:24'),
(33, '::1', '2022-04-04 14:07:26'),
(34, '::1', '2022-04-04 14:07:27'),
(35, '::1', '2022-04-04 14:07:28'),
(36, '::1', '2022-04-04 14:07:29'),
(37, '::1', '2022-04-04 14:07:31'),
(38, '::1', '2022-04-04 14:13:30'),
(39, '::1', '2022-04-04 14:13:32'),
(40, '::1', '2022-04-04 14:13:38'),
(41, '::1', '2022-04-04 14:13:40'),
(42, '::1', '2022-04-04 15:40:53'),
(43, '::1', '2022-04-04 15:43:22'),
(44, '::1', '2022-04-04 15:46:52'),
(45, '::1', '2022-04-04 15:46:55'),
(46, '::1', '2022-04-04 15:46:56'),
(47, '::1', '2022-04-04 15:46:57'),
(48, '::1', '2022-04-04 15:46:59'),
(49, '::1', '2022-04-04 15:47:11'),
(50, '::1', '2022-04-04 15:47:12'),
(51, '::1', '2022-04-04 15:47:13'),
(52, '::1', '2022-04-04 15:47:13'),
(53, '::1', '2022-04-04 15:47:13'),
(54, '::1', '2022-04-04 15:47:14'),
(55, '::1', '2022-04-04 15:47:14'),
(56, '::1', '2022-04-04 15:47:14'),
(57, '::1', '2022-04-04 15:47:15'),
(58, '::1', '2022-04-04 15:47:15'),
(59, '::1', '2022-04-04 15:47:15'),
(60, '::1', '2022-04-04 15:47:26'),
(61, '::1', '2022-04-04 15:47:27'),
(62, '::1', '2022-04-04 15:47:28'),
(63, '::1', '2022-04-04 15:47:29'),
(64, '::1', '2022-04-04 15:47:32'),
(65, '::1', '2022-04-04 15:47:33'),
(66, '::1', '2022-04-04 15:47:33'),
(67, '::1', '2022-04-04 15:47:34'),
(68, '::1', '2022-04-04 15:47:35'),
(69, '::1', '2022-04-04 15:47:35'),
(70, '::1', '2022-04-04 15:47:35'),
(71, '::1', '2022-04-04 15:47:35'),
(72, '::1', '2022-04-04 15:47:36'),
(73, '::1', '2022-04-04 15:47:36'),
(74, '::1', '2022-04-04 15:47:36'),
(75, '::1', '2022-04-04 15:47:37'),
(76, '::1', '2022-04-04 15:47:45'),
(77, '::1', '2022-04-04 15:47:46'),
(78, '::1', '2022-04-04 15:47:47'),
(79, '::1', '2022-04-04 15:47:48'),
(80, '::1', '2022-04-04 15:47:49'),
(81, '::1', '2022-04-04 15:47:50'),
(82, '::1', '2022-04-04 15:47:50'),
(83, '::1', '2022-04-04 15:47:51'),
(84, '::1', '2022-04-04 15:47:51'),
(85, '::1', '2022-04-04 15:47:51'),
(86, '::1', '2022-04-04 15:47:52'),
(87, '::1', '2022-04-04 15:48:17'),
(88, '::1', '2022-04-04 15:48:19'),
(89, '::1', '2022-04-04 15:48:20'),
(90, '::1', '2022-04-04 15:48:21'),
(91, '::1', '2022-04-04 15:48:23'),
(92, '::1', '2022-04-04 15:48:24'),
(93, '::1', '2022-04-04 15:48:25'),
(94, '::1', '2022-04-04 15:51:19'),
(95, '::1', '2022-04-04 16:04:53'),
(96, '::1', '2022-04-04 16:08:55'),
(97, '::1', '2022-04-04 16:12:07'),
(98, '::1', '2022-04-04 16:14:26'),
(99, '::1', '2022-04-04 16:16:00'),
(100, '::1', '2022-04-04 16:18:05'),
(101, '::1', '2022-04-04 16:18:40'),
(102, '::1', '2022-04-04 16:18:49'),
(103, '::1', '2022-04-04 16:18:55'),
(104, '::1', '2022-04-04 16:19:08'),
(105, '::1', '2022-04-04 16:19:24'),
(106, '::1', '2022-04-04 16:19:35'),
(107, '::1', '2022-04-04 16:19:47'),
(108, '::1', '2022-04-04 16:19:48'),
(109, '::1', '2022-04-04 16:19:50'),
(110, '::1', '2022-04-04 16:19:53'),
(111, '::1', '2022-04-04 16:19:55'),
(112, '::1', '2022-04-04 16:20:00'),
(113, '::1', '2022-04-04 16:21:12'),
(114, '::1', '2022-04-04 16:21:24'),
(115, '::1', '2022-04-04 16:21:38'),
(116, '::1', '2022-04-04 16:21:49'),
(117, '::1', '2022-04-04 16:21:58'),
(118, '::1', '2022-04-04 16:22:03'),
(119, '::1', '2022-04-04 16:22:15'),
(120, '::1', '2022-04-04 16:22:22'),
(121, '::1', '2022-04-04 16:22:28'),
(122, '::1', '2022-04-04 16:22:35'),
(123, '::1', '2022-04-04 16:22:48'),
(124, '::1', '2022-04-04 16:23:11'),
(125, '::1', '2022-04-04 16:23:33'),
(126, '::1', '2022-04-04 16:23:37'),
(127, '::1', '2022-04-04 16:23:58'),
(128, '::1', '2022-04-04 16:24:05'),
(129, '::1', '2022-04-04 16:24:15'),
(130, '::1', '2022-04-04 16:27:58'),
(131, '::1', '2022-04-04 16:30:52'),
(132, '::1', '2022-04-04 16:31:41'),
(133, '::1', '2022-04-04 16:32:34'),
(134, '::1', '2022-04-04 16:34:44'),
(135, '::1', '2022-04-04 16:37:20'),
(136, '::1', '2022-04-04 16:39:39'),
(137, '::1', '2022-04-04 16:41:18'),
(138, '::1', '2022-04-04 16:41:51'),
(139, '::1', '2022-04-04 16:42:38'),
(140, '::1', '2022-04-04 16:42:57'),
(141, '::1', '2022-04-04 16:43:07'),
(142, '::1', '2022-04-04 16:43:53'),
(143, '::1', '2022-04-04 16:43:55'),
(144, '::1', '2022-04-04 16:44:26'),
(145, '::1', '2022-04-04 16:44:48'),
(146, '::1', '2022-04-04 16:45:38'),
(147, '::1', '2022-04-04 16:45:48'),
(148, '::1', '2022-04-04 16:46:07'),
(149, '::1', '2022-04-04 16:46:25'),
(150, '::1', '2022-04-04 16:46:55'),
(151, '::1', '2022-04-04 16:59:29'),
(152, '::1', '2022-04-04 17:01:13'),
(153, '::1', '2022-04-04 17:06:39'),
(154, '::1', '2022-04-04 17:07:41'),
(155, '::1', '2022-04-04 17:07:43'),
(156, '::1', '2022-04-04 17:08:00'),
(157, '::1', '2022-04-04 17:13:55'),
(158, '::1', '2022-04-04 17:14:21'),
(159, '::1', '2022-04-04 17:15:23'),
(160, '::1', '2022-04-04 17:15:26'),
(161, '::1', '2022-04-04 17:17:54'),
(162, '::1', '2022-04-04 17:17:56'),
(163, '::1', '2022-04-04 17:18:31'),
(164, '::1', '2022-04-04 17:18:32'),
(165, '::1', '2022-04-04 17:50:16'),
(166, '::1', '2022-04-04 17:51:43'),
(167, '::1', '2022-04-04 17:52:46'),
(168, '::1', '2022-04-04 18:13:37'),
(169, '::1', '2022-04-04 21:13:25'),
(170, '::1', '2022-04-04 21:15:05'),
(171, '::1', '2022-04-04 21:15:06'),
(172, '::1', '2022-04-04 21:15:07'),
(173, '::1', '2022-04-04 21:15:09'),
(174, '::1', '2022-04-04 21:15:10'),
(175, '::1', '2022-04-04 21:15:23'),
(176, '::1', '2022-04-05 09:14:58'),
(177, '::1', '2022-04-05 09:15:02'),
(178, '::1', '2022-04-05 09:15:08'),
(179, '::1', '2022-04-05 09:18:22'),
(180, '::1', '2022-04-05 09:19:17'),
(181, '::1', '2022-04-05 09:19:32'),
(182, '::1', '2022-04-05 09:19:49'),
(183, '::1', '2022-04-05 09:20:22'),
(184, '::1', '2022-04-05 09:21:22'),
(185, '::1', '2022-04-05 09:21:44'),
(186, '::1', '2022-04-05 09:23:36'),
(187, '::1', '2022-04-05 09:24:59'),
(188, '::1', '2022-04-05 09:25:19'),
(189, '::1', '2022-04-05 09:25:59'),
(190, '::1', '2022-04-05 09:26:11'),
(191, '::1', '2022-04-05 09:26:37'),
(192, '::1', '2022-04-05 09:26:46'),
(193, '::1', '2022-04-05 09:26:55'),
(194, '::1', '2022-04-05 09:27:06'),
(195, '::1', '2022-04-05 09:27:30'),
(196, '::1', '2022-04-05 09:27:45'),
(197, '::1', '2022-04-05 09:28:02'),
(198, '::1', '2022-04-05 09:28:17'),
(199, '::1', '2022-04-05 09:28:23'),
(200, '::1', '2022-04-05 09:28:44'),
(201, '::1', '2022-04-05 09:28:52'),
(202, '::1', '2022-04-05 09:29:37'),
(203, '::1', '2022-04-05 09:30:16'),
(204, '::1', '2022-04-05 09:30:36'),
(205, '::1', '2022-04-05 09:30:52'),
(206, '::1', '2022-04-05 09:31:07'),
(207, '::1', '2022-04-05 09:31:18'),
(208, '::1', '2022-04-05 09:31:29'),
(209, '::1', '2022-04-05 09:31:48'),
(210, '::1', '2022-04-05 09:31:53'),
(211, '::1', '2022-04-05 09:32:06'),
(212, '::1', '2022-04-05 09:33:00'),
(213, '::1', '2022-04-05 09:33:23'),
(214, '::1', '2022-04-05 09:36:06'),
(215, '::1', '2022-04-05 09:36:28'),
(216, '::1', '2022-04-05 09:36:39'),
(217, '::1', '2022-04-05 09:36:51'),
(218, '::1', '2022-04-05 09:37:08'),
(219, '::1', '2022-04-05 09:37:28'),
(220, '::1', '2022-04-05 09:37:38'),
(221, '::1', '2022-04-05 09:38:03'),
(222, '::1', '2022-04-05 09:38:20'),
(223, '::1', '2022-04-05 09:38:30'),
(224, '::1', '2022-04-05 09:38:45'),
(225, '::1', '2022-04-05 09:39:11'),
(226, '::1', '2022-04-05 09:39:31'),
(227, '::1', '2022-04-05 09:39:56'),
(228, '::1', '2022-04-05 09:40:11'),
(229, '::1', '2022-04-05 09:40:47'),
(230, '::1', '2022-04-05 09:40:57'),
(231, '::1', '2022-04-05 09:41:07'),
(232, '::1', '2022-04-05 09:41:23'),
(233, '::1', '2022-04-05 09:41:39'),
(234, '::1', '2022-04-05 09:41:48'),
(235, '::1', '2022-04-05 09:42:31'),
(236, '::1', '2022-04-05 09:43:00'),
(237, '::1', '2022-04-05 09:43:09'),
(238, '::1', '2022-04-05 09:43:21'),
(239, '::1', '2022-04-05 09:43:39'),
(240, '::1', '2022-04-05 09:43:47'),
(241, '::1', '2022-04-05 09:44:14'),
(242, '::1', '2022-04-05 09:44:48'),
(243, '::1', '2022-04-05 09:45:03'),
(244, '::1', '2022-04-05 09:45:11'),
(245, '::1', '2022-04-05 09:45:26'),
(246, '::1', '2022-04-05 09:45:48'),
(247, '::1', '2022-04-05 09:46:47'),
(248, '::1', '2022-04-05 09:47:09'),
(249, '::1', '2022-04-05 09:47:50'),
(250, '::1', '2022-04-05 09:48:57'),
(251, '::1', '2022-04-05 09:56:26'),
(252, '::1', '2022-04-05 09:56:28'),
(253, '::1', '2022-04-05 10:04:45'),
(254, '::1', '2022-04-05 10:06:57'),
(255, '::1', '2022-04-05 10:08:57'),
(256, '::1', '2022-04-05 10:10:39'),
(257, '::1', '2022-04-05 10:10:42'),
(258, '::1', '2022-04-05 10:11:19'),
(259, '::1', '2022-04-05 10:11:20'),
(260, '::1', '2022-04-05 10:12:30'),
(261, '::1', '2022-04-05 10:57:25'),
(262, '::1', '2022-04-05 11:05:25'),
(263, '::1', '2022-04-05 11:05:49'),
(264, '::1', '2022-04-05 11:06:03'),
(265, '::1', '2022-04-05 11:12:47'),
(266, '::1', '2022-04-05 11:18:41'),
(267, '::1', '2022-04-05 11:27:15'),
(268, '::1', '2022-04-05 11:28:05'),
(269, '::1', '2022-04-05 11:29:58'),
(270, '::1', '2022-04-05 11:31:13'),
(271, '::1', '2022-04-05 11:36:09'),
(272, '::1', '2022-04-05 11:36:29'),
(273, '::1', '2022-04-05 11:36:41'),
(274, '::1', '2022-04-05 11:37:26'),
(275, '::1', '2022-04-05 11:37:45'),
(276, '::1', '2022-04-05 11:37:52'),
(277, '::1', '2022-04-05 11:38:01'),
(278, '::1', '2022-04-05 11:38:06'),
(279, '::1', '2022-04-05 11:38:10'),
(280, '::1', '2022-04-05 11:39:53'),
(281, '::1', '2022-04-05 11:48:14'),
(282, '::1', '2022-04-05 11:48:17'),
(283, '::1', '2022-04-05 11:48:19'),
(284, '::1', '2022-04-05 11:54:24'),
(285, '::1', '2022-04-05 11:54:29'),
(286, '::1', '2022-04-05 11:55:11'),
(287, '::1', '2022-04-05 11:55:25'),
(288, '::1', '2022-04-05 11:55:28'),
(289, '::1', '2022-04-05 11:55:30'),
(290, '::1', '2022-04-05 11:55:37'),
(291, '::1', '2022-04-05 12:08:27'),
(292, '::1', '2022-04-05 12:08:32'),
(293, '::1', '2022-04-05 12:08:34'),
(294, '::1', '2022-04-05 12:08:38'),
(295, '::1', '2022-04-05 12:09:10'),
(296, '::1', '2022-04-05 12:09:11'),
(297, '::1', '2022-04-05 12:09:14'),
(298, '::1', '2022-04-05 12:09:17'),
(299, '::1', '2022-04-05 12:10:13'),
(300, '::1', '2022-04-05 12:10:16'),
(301, '::1', '2022-04-05 12:10:19'),
(302, '::1', '2022-04-05 12:11:06'),
(303, '::1', '2022-04-05 12:11:07'),
(304, '::1', '2022-04-05 12:11:11'),
(305, '::1', '2022-04-05 12:11:16'),
(306, '::1', '2022-04-05 12:18:23'),
(307, '::1', '2022-04-05 12:18:25'),
(308, '::1', '2022-04-05 12:18:27'),
(309, '::1', '2022-04-05 12:18:32'),
(310, '::1', '2022-04-05 12:19:07'),
(311, '::1', '2022-04-05 12:19:08'),
(312, '::1', '2022-04-05 12:19:11'),
(313, '::1', '2022-04-05 12:19:15'),
(314, '::1', '2022-04-05 12:20:04'),
(315, '::1', '2022-04-05 12:20:07'),
(316, '::1', '2022-04-05 12:20:10'),
(317, '::1', '2022-04-05 12:22:26'),
(318, '::1', '2022-04-05 12:22:27'),
(319, '::1', '2022-04-05 12:22:31'),
(320, '::1', '2022-04-05 12:22:37'),
(321, '::1', '2022-04-05 12:22:56'),
(322, '::1', '2022-04-05 12:23:10'),
(323, '::1', '2022-04-05 12:23:13'),
(324, '::1', '2022-04-05 12:24:07'),
(325, '::1', '2022-04-05 12:24:10'),
(326, '::1', '2022-04-05 12:24:11'),
(327, '::1', '2022-04-05 12:24:13'),
(328, '::1', '2022-04-05 12:25:54'),
(329, '::1', '2022-04-05 12:26:24'),
(330, '::1', '2022-04-05 13:18:10'),
(331, '::1', '2022-04-05 13:18:13'),
(332, '::1', '2022-04-05 13:19:16'),
(333, '::1', '2022-04-05 13:26:31'),
(334, '::1', '2022-04-05 13:26:33'),
(335, '::1', '2022-04-05 13:28:24'),
(336, '::1', '2022-04-05 13:32:46'),
(337, '::1', '2022-04-05 13:32:51'),
(338, '::1', '2022-04-05 14:22:23'),
(339, '::1', '2022-04-05 14:22:27'),
(340, '::1', '2022-04-05 14:22:38'),
(341, '::1', '2022-04-05 14:26:17'),
(342, '::1', '2022-04-05 14:26:19'),
(343, '::1', '2022-04-05 14:27:51'),
(344, '::1', '2022-04-05 14:32:00'),
(345, '::1', '2022-04-05 14:32:01'),
(346, '::1', '2022-04-05 14:32:03'),
(347, '::1', '2022-04-05 14:33:14'),
(348, '::1', '2022-04-05 15:20:10'),
(349, '::1', '2022-04-05 15:20:14'),
(350, '::1', '2022-04-05 15:21:26'),
(351, '::1', '2022-04-05 18:18:56'),
(352, '::1', '2022-04-05 18:19:30'),
(353, '::1', '2022-04-05 18:22:07'),
(354, '::1', '2022-04-05 18:23:11'),
(355, '::1', '2022-04-05 18:23:12'),
(356, '::1', '2022-04-05 18:23:14'),
(357, '::1', '2022-04-05 18:23:41'),
(358, '::1', '2022-04-05 18:25:51'),
(359, '::1', '2022-04-05 18:25:53'),
(360, '::1', '2022-04-05 18:25:55'),
(361, '::1', '2022-04-05 18:26:22'),
(362, '::1', '2022-04-05 18:26:55'),
(363, '::1', '2022-04-05 18:26:57'),
(364, '::1', '2022-04-05 18:27:37'),
(365, '::1', '2022-04-05 18:27:41'),
(366, '::1', '2022-04-05 18:28:09'),
(367, '::1', '2022-04-05 18:29:38'),
(368, '::1', '2022-04-05 18:29:41'),
(369, '::1', '2022-04-05 18:30:50'),
(370, '::1', '2022-04-05 18:57:57'),
(371, '::1', '2022-04-05 18:58:00'),
(372, '::1', '2022-04-05 18:58:39'),
(373, '::1', '2022-04-05 19:01:20'),
(374, '::1', '2022-04-05 19:01:22'),
(375, '::1', '2022-04-05 19:01:46'),
(376, '::1', '2022-04-05 19:05:46'),
(377, '::1', '2022-04-05 19:05:49'),
(378, '::1', '2022-04-05 19:16:28'),
(379, '::1', '2022-04-05 19:16:38'),
(380, '::1', '2022-04-05 19:17:20'),
(381, '::1', '2022-04-05 19:24:47'),
(382, '::1', '2022-04-05 19:24:52'),
(383, '::1', '2022-04-05 19:26:30'),
(384, '::1', '2022-04-05 19:26:33'),
(385, '::1', '2022-04-05 19:32:28'),
(386, '::1', '2022-04-05 19:32:41'),
(387, '::1', '2022-04-05 19:33:20'),
(388, '::1', '2022-04-05 20:47:34'),
(389, '::1', '2022-04-05 20:47:37'),
(390, '::1', '2022-04-05 20:48:29'),
(391, '::1', '2022-04-05 21:21:12'),
(392, '::1', '2022-04-05 21:21:15'),
(393, '::1', '2022-04-05 21:29:07'),
(394, '::1', '2022-04-05 21:29:36'),
(395, '::1', '2022-04-05 21:29:39'),
(396, '::1', '2022-04-05 21:30:18'),
(397, '::1', '2022-04-05 21:41:12'),
(398, '::1', '2022-04-05 21:41:14'),
(399, '::1', '2022-04-05 21:41:24'),
(400, '::1', '2022-04-05 21:41:46'),
(401, '::1', '2022-04-05 21:41:58'),
(402, '::1', '2022-04-05 21:42:05'),
(403, '::1', '2022-04-05 21:42:12'),
(404, '::1', '2022-04-05 21:42:29'),
(405, '::1', '2022-04-05 21:42:46'),
(406, '::1', '2022-04-05 21:42:52'),
(407, '::1', '2022-04-05 21:42:58'),
(408, '::1', '2022-04-05 21:43:05'),
(409, '::1', '2022-04-05 21:43:45'),
(410, '::1', '2022-04-05 21:43:51'),
(411, '::1', '2022-04-06 12:05:41'),
(412, '::1', '2022-04-06 12:05:44'),
(413, '::1', '2022-04-06 12:06:08'),
(414, '::1', '2022-04-06 12:07:22'),
(415, '::1', '2022-04-06 12:07:26'),
(416, '::1', '2022-04-06 12:09:18'),
(417, '::1', '2022-04-06 12:12:38'),
(418, '::1', '2022-04-06 12:12:40'),
(419, '::1', '2022-04-06 12:13:51'),
(420, '::1', '2022-04-06 12:18:56'),
(421, '::1', '2022-04-06 12:18:59'),
(422, '::1', '2022-04-06 12:19:47'),
(423, '::1', '2022-04-06 13:03:18'),
(424, '::1', '2022-04-06 13:03:55'),
(425, '::1', '2022-04-06 15:13:45'),
(426, '::1', '2022-04-06 15:13:47'),
(427, '::1', '2022-04-06 15:13:51'),
(428, '::1', '2022-04-06 15:14:05'),
(429, '::1', '2022-04-06 15:15:38'),
(430, '::1', '2022-04-06 18:42:30'),
(431, '::1', '2022-04-06 18:56:43'),
(432, '::1', '2022-04-06 19:00:28'),
(433, '::1', '2022-04-06 19:13:28'),
(434, '::1', '2022-04-06 21:56:35'),
(435, '::1', '2022-04-06 21:56:37'),
(436, '::1', '2022-04-06 21:56:39'),
(437, '::1', '2022-04-06 21:56:50'),
(438, '::1', '2022-04-06 21:57:13'),
(439, '::1', '2022-04-06 21:57:50'),
(440, '::1', '2022-04-06 21:58:07'),
(441, '::1', '2022-04-06 21:58:15'),
(442, '::1', '2022-04-06 21:58:29'),
(443, '::1', '2022-04-06 21:58:43'),
(444, '::1', '2022-04-06 22:14:32'),
(445, '::1', '2022-04-06 22:52:31'),
(446, '::1', '2022-04-06 22:52:49'),
(447, '::1', '2022-04-07 08:19:16'),
(448, '::1', '2022-04-07 11:02:49'),
(449, '::1', '2022-04-07 11:02:56'),
(450, '::1', '2022-04-07 11:02:58'),
(451, '::1', '2022-04-07 11:03:41'),
(452, '::1', '2022-04-07 11:05:44'),
(453, '::1', '2022-04-07 11:06:54'),
(454, '::1', '2022-04-07 11:07:29'),
(455, '::1', '2022-04-07 11:08:40'),
(456, '::1', '2022-04-07 11:11:49'),
(457, '::1', '2022-04-07 12:34:25'),
(458, '::1', '2022-04-07 12:34:27'),
(459, '::1', '2022-04-07 12:34:37'),
(460, '::1', '2022-04-07 12:35:27'),
(461, '::1', '2022-04-07 12:56:48'),
(462, '::1', '2022-04-07 12:57:02'),
(463, '::1', '2022-04-07 12:57:04'),
(464, '::1', '2022-04-07 12:57:48'),
(465, '::1', '2022-04-07 13:04:28'),
(466, '::1', '2022-04-07 13:04:30'),
(467, '::1', '2022-04-07 13:04:32'),
(468, '::1', '2022-04-07 13:05:37'),
(469, '::1', '2022-04-07 13:06:17'),
(470, '::1', '2022-04-07 14:44:46'),
(471, '::1', '2022-04-07 17:02:08'),
(472, '::1', '2022-04-07 19:52:37'),
(473, '::1', '2022-04-07 19:52:39'),
(474, '::1', '2022-04-07 20:57:52'),
(475, '::1', '2022-04-07 21:02:30'),
(476, '::1', '2022-04-07 21:54:15'),
(477, '::1', '2022-04-07 21:55:12'),
(478, '::1', '2022-04-08 09:01:09'),
(479, '::1', '2022-04-08 09:01:15'),
(480, '::1', '2022-04-08 09:01:20'),
(481, '::1', '2022-04-08 11:26:17'),
(482, '::1', '2022-04-08 11:26:21'),
(483, '::1', '2022-04-08 11:26:22'),
(484, '::1', '2022-04-08 11:27:35'),
(485, '::1', '2022-04-08 11:28:16'),
(486, '::1', '2022-04-08 11:28:35'),
(487, '::1', '2022-04-08 11:28:48'),
(488, '::1', '2022-04-08 11:29:00'),
(489, '::1', '2022-04-08 11:29:11'),
(490, '::1', '2022-04-08 12:38:31'),
(491, '::1', '2022-04-08 12:38:50'),
(492, '::1', '2022-04-08 12:38:52'),
(493, '::1', '2022-04-08 12:39:01'),
(494, '::1', '2022-04-08 12:39:13'),
(495, '::1', '2022-04-08 12:39:43'),
(496, '::1', '2022-04-08 12:39:45'),
(497, '::1', '2022-04-08 12:39:46'),
(498, '::1', '2022-04-08 12:39:48'),
(499, '::1', '2022-04-08 13:23:26'),
(500, '::1', '2022-04-08 16:32:02'),
(501, '::1', '2022-04-08 16:32:04'),
(502, '::1', '2022-04-08 16:35:19'),
(503, '::1', '2022-04-08 16:48:02'),
(504, '::1', '2022-04-08 16:49:35'),
(505, '::1', '2022-04-08 16:51:31'),
(506, '::1', '2022-04-08 16:51:35'),
(507, '::1', '2022-04-08 16:56:24'),
(508, '::1', '2022-04-08 16:58:17'),
(509, '::1', '2022-04-08 17:28:14'),
(510, '::1', '2022-04-08 17:28:16'),
(511, '::1', '2022-04-08 17:29:31'),
(512, '::1', '2022-04-08 18:40:41'),
(513, '::1', '2022-04-08 18:40:46'),
(514, '::1', '2022-04-08 18:40:51'),
(515, '::1', '2022-04-11 09:02:58'),
(516, '::1', '2022-04-11 09:03:01'),
(517, '::1', '2022-04-11 11:04:55'),
(518, '::1', '2022-04-11 11:05:00'),
(519, '::1', '2022-04-11 11:05:04'),
(520, '::1', '2022-04-11 11:05:10'),
(521, '::1', '2022-04-11 11:05:10'),
(522, '::1', '2022-04-11 11:05:15'),
(523, '::1', '2022-04-11 11:05:19'),
(524, '::1', '2022-04-11 11:05:19'),
(525, '::1', '2022-04-11 11:05:36'),
(526, '::1', '2022-04-11 11:05:52'),
(527, '::1', '2022-04-11 11:05:54'),
(528, '::1', '2022-04-11 13:26:58'),
(529, '::1', '2022-04-11 13:27:01'),
(530, '::1', '2022-04-11 13:32:44'),
(531, '::1', '2022-04-11 13:33:30'),
(532, '::1', '2022-04-11 13:34:05'),
(533, '::1', '2022-04-11 13:35:34'),
(534, '::1', '2022-04-11 13:39:57'),
(535, '::1', '2022-04-11 13:43:39'),
(536, '::1', '2022-04-11 13:44:44'),
(537, '::1', '2022-04-11 13:48:45'),
(538, '::1', '2022-04-11 13:48:50'),
(539, '::1', '2022-04-13 12:55:32'),
(540, '::1', '2022-04-13 12:55:36'),
(541, '::1', '2022-04-13 13:11:23'),
(542, '::1', '2022-04-13 13:12:05'),
(543, '::1', '2022-04-13 13:14:10'),
(544, '::1', '2022-04-13 13:28:07'),
(545, '::1', '2022-04-13 13:29:24'),
(546, '::1', '2022-04-13 13:32:35'),
(547, '::1', '2022-04-13 13:34:19'),
(548, '::1', '2022-04-13 13:49:12'),
(549, '::1', '2022-04-13 13:49:34'),
(550, '::1', '2022-04-13 13:57:06'),
(551, '::1', '2022-04-13 15:53:05'),
(552, '::1', '2022-04-13 16:10:06'),
(553, '::1', '2022-04-13 16:10:16'),
(554, '::1', '2022-04-13 18:09:25'),
(555, '::1', '2022-04-13 18:09:50'),
(556, '::1', '2022-04-13 18:10:06'),
(557, '::1', '2022-04-14 10:35:18'),
(558, '::1', '2022-04-14 10:35:21'),
(559, '::1', '2022-04-14 10:35:24'),
(560, '::1', '2022-04-14 10:37:06'),
(561, '::1', '2022-04-14 10:51:45'),
(562, '::1', '2022-04-14 10:51:55'),
(563, '::1', '2022-04-14 10:53:24'),
(564, '::1', '2022-04-14 12:16:53'),
(565, '::1', '2022-04-14 12:17:00'),
(566, '::1', '2022-04-14 12:18:59'),
(567, '::1', '2022-04-14 16:23:42'),
(568, '::1', '2022-04-14 17:52:53'),
(569, '::1', '2022-04-14 17:54:08'),
(570, '::1', '2022-04-14 17:55:02'),
(571, '::1', '2022-04-14 17:55:21'),
(572, '::1', '2022-04-14 17:56:05'),
(573, '::1', '2022-04-14 17:56:23'),
(574, '::1', '2022-04-14 17:56:29'),
(575, '::1', '2022-04-14 17:57:11'),
(576, '::1', '2022-04-14 17:57:19'),
(577, '::1', '2022-04-14 17:57:58'),
(578, '::1', '2022-04-14 17:58:05'),
(579, '::1', '2022-04-14 17:59:29'),
(580, '::1', '2022-04-14 18:00:14'),
(581, '::1', '2022-04-14 18:17:59'),
(582, '::1', '2022-04-14 18:18:40'),
(583, '::1', '2022-04-14 18:18:46'),
(584, '::1', '2022-04-14 18:19:24'),
(585, '::1', '2022-04-14 18:20:48'),
(586, '::1', '2022-04-14 18:21:37'),
(587, '::1', '2022-04-14 18:22:12'),
(588, '::1', '2022-04-14 18:26:01'),
(589, '::1', '2022-04-14 18:27:43'),
(590, '::1', '2022-04-14 18:28:16'),
(591, '::1', '2022-04-14 18:36:12'),
(592, '::1', '2022-04-14 18:37:03'),
(593, '::1', '2022-04-14 18:37:08'),
(594, '::1', '2022-04-14 18:37:54'),
(595, '::1', '2022-04-14 18:38:21'),
(596, '::1', '2022-04-14 18:38:44'),
(597, '::1', '2022-04-14 18:39:14'),
(598, '::1', '2022-04-14 18:41:13'),
(599, '::1', '2022-04-14 18:41:48'),
(600, '::1', '2022-04-14 18:41:49'),
(601, '::1', '2022-04-14 18:41:49'),
(602, '::1', '2022-04-14 18:41:49'),
(603, '::1', '2022-04-14 18:42:16'),
(604, '::1', '2022-04-14 18:52:03'),
(605, '::1', '2022-04-14 18:52:22'),
(606, '::1', '2022-04-14 18:52:23'),
(607, '::1', '2022-04-14 18:53:01'),
(608, '::1', '2022-04-14 18:53:14'),
(609, '::1', '2022-04-14 18:53:59'),
(610, '::1', '2022-04-14 18:55:00'),
(611, '::1', '2022-04-14 18:55:57'),
(612, '::1', '2022-04-14 18:56:23'),
(613, '::1', '2022-04-14 18:57:30'),
(614, '::1', '2022-04-14 18:57:41'),
(615, '::1', '2022-04-14 18:57:48'),
(616, '::1', '2022-04-14 18:58:59'),
(617, '::1', '2022-04-14 18:59:18'),
(618, '::1', '2022-04-14 18:59:59'),
(619, '::1', '2022-04-14 19:00:17'),
(620, '::1', '2022-04-14 19:02:11'),
(621, '::1', '2022-04-14 19:03:40'),
(622, '::1', '2022-04-14 19:04:46'),
(623, '::1', '2022-04-14 19:05:29'),
(624, '::1', '2022-04-14 19:06:23'),
(625, '::1', '2022-04-14 19:06:57'),
(626, '::1', '2022-04-14 19:07:20'),
(627, '::1', '2022-04-14 19:07:37'),
(628, '::1', '2022-04-14 19:08:28'),
(629, '::1', '2022-04-14 19:09:15'),
(630, '::1', '2022-04-14 19:10:53'),
(631, '::1', '2022-04-14 19:14:21'),
(632, '::1', '2022-04-14 19:19:59'),
(633, '::1', '2022-04-14 19:20:53'),
(634, '::1', '2022-04-15 09:18:13'),
(635, '::1', '2022-04-15 09:18:17'),
(636, '::1', '2022-04-15 09:19:13'),
(637, '::1', '2022-04-15 09:23:08'),
(638, '::1', '2022-04-15 09:23:59'),
(639, '::1', '2022-04-15 09:24:23'),
(640, '::1', '2022-04-15 09:24:28'),
(641, '::1', '2022-04-15 09:24:36'),
(642, '::1', '2022-04-15 09:24:40'),
(643, '::1', '2022-04-15 09:25:22'),
(644, '::1', '2022-04-15 09:29:11'),
(645, '::1', '2022-04-15 09:30:01'),
(646, '::1', '2022-04-15 09:48:27'),
(647, '::1', '2022-04-15 09:48:49'),
(648, '::1', '2022-04-15 09:49:07'),
(649, '::1', '2022-04-15 09:56:13'),
(650, '::1', '2022-04-15 09:56:35'),
(651, '::1', '2022-04-15 09:57:29'),
(652, '::1', '2022-04-15 09:58:05'),
(653, '::1', '2022-04-15 10:03:49'),
(654, '::1', '2022-04-15 10:05:03'),
(655, '::1', '2022-04-15 10:05:58'),
(656, '::1', '2022-04-15 10:06:53'),
(657, '::1', '2022-04-15 10:07:20'),
(658, '::1', '2022-04-15 10:07:24'),
(659, '::1', '2022-04-15 10:08:02'),
(660, '::1', '2022-04-15 10:08:07'),
(661, '::1', '2022-04-15 10:08:34'),
(662, '::1', '2022-04-15 10:09:43'),
(663, '::1', '2022-04-15 10:09:50'),
(664, '::1', '2022-04-15 10:09:53'),
(665, '::1', '2022-04-15 10:09:55'),
(666, '::1', '2022-04-15 10:09:56'),
(667, '::1', '2022-04-15 10:09:57'),
(668, '::1', '2022-04-15 10:10:03'),
(669, '::1', '2022-04-15 10:10:06'),
(670, '::1', '2022-04-15 10:10:22'),
(671, '::1', '2022-04-15 10:11:24'),
(672, '::1', '2022-04-15 10:15:43'),
(673, '::1', '2022-04-15 10:17:07'),
(674, '::1', '2022-04-15 10:17:31'),
(675, '::1', '2022-04-15 10:23:05'),
(676, '::1', '2022-04-15 10:24:39'),
(677, '::1', '2022-04-15 10:25:55'),
(678, '::1', '2022-04-15 10:27:02'),
(679, '::1', '2022-04-15 10:28:55'),
(680, '::1', '2022-04-15 10:36:56'),
(681, '::1', '2022-04-15 10:37:28'),
(682, '::1', '2022-04-15 10:40:39'),
(683, '::1', '2022-04-15 10:40:42'),
(684, '::1', '2022-04-15 10:40:45'),
(685, '::1', '2022-04-15 10:42:27'),
(686, '::1', '2022-04-15 10:42:33'),
(687, '::1', '2022-04-15 10:45:13'),
(688, '::1', '2022-04-15 10:53:57'),
(689, '::1', '2022-04-15 10:54:13'),
(690, '::1', '2022-04-15 10:55:12'),
(691, '::1', '2022-04-15 10:59:32'),
(692, '::1', '2022-04-15 11:00:13'),
(693, '::1', '2022-04-15 11:00:41'),
(694, '::1', '2022-04-15 11:00:59'),
(695, '::1', '2022-04-15 11:01:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlog`
--
ALTER TABLE `adminlog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loginId` (`loginId`);

--
-- Indexes for table `archiveuser`
--
ALTER TABLE `archiveuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `celebration`
--
ALTER TABLE `celebration`
  ADD PRIMARY KEY (`keepingID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`c_count`),
  ADD UNIQUE KEY `client_uniID` (`client_uniID`),
  ADD UNIQUE KEY `email_add` (`email_add`);

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`entryID`);

--
-- Indexes for table `consultation_reports`
--
ALTER TABLE `consultation_reports`
  ADD PRIMARY KEY (`consul_reportID`);

--
-- Indexes for table `consul_list_category`
--
ALTER TABLE `consul_list_category`
  ADD PRIMARY KEY (`listID`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`emailID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `event_reservation`
--
ALTER TABLE `event_reservation`
  ADD PRIMARY KEY (`entryID`);

--
-- Indexes for table `event_reservation_reports`
--
ALTER TABLE `event_reservation_reports`
  ADD PRIMARY KEY (`er_reportID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`loginId`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loginId` (`loginId`);

--
-- Indexes for table `scheduler`
--
ALTER TABLE `scheduler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sent_email`
--
ALTER TABLE `sent_email`
  ADD PRIMARY KEY (`sentID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`number`),
  ADD UNIQUE KEY `service_uniID` (`service_uniID`);

--
-- Indexes for table `services_category`
--
ALTER TABLE `services_category`
  ADD PRIMARY KEY (`number`),
  ADD UNIQUE KEY `category_uniID` (`category_uniID`);

--
-- Indexes for table `services_sub_category`
--
ALTER TABLE `services_sub_category`
  ADD PRIMARY KEY (`number`),
  ADD UNIQUE KEY `sub_cat_uniID` (`sub_cat_uniID`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`visitorsID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlog`
--
ALTER TABLE `adminlog`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;

--
-- AUTO_INCREMENT for table `archiveuser`
--
ALTER TABLE `archiveuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `celebration`
--
ALTER TABLE `celebration`
  MODIFY `keepingID` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `c_count` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `entryID` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `consultation_reports`
--
ALTER TABLE `consultation_reports`
  MODIFY `consul_reportID` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `consul_list_category`
--
ALTER TABLE `consul_list_category`
  MODIFY `listID` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `emailID` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event_reservation`
--
ALTER TABLE `event_reservation`
  MODIFY `entryID` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `event_reservation_reports`
--
ALTER TABLE `event_reservation_reports`
  MODIFY `er_reportID` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `loginId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `scheduler`
--
ALTER TABLE `scheduler`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sent_email`
--
ALTER TABLE `sent_email`
  MODIFY `sentID` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `number` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `services_category`
--
ALTER TABLE `services_category`
  MODIFY `number` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services_sub_category`
--
ALTER TABLE `services_sub_category`
  MODIFY `number` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `visitorsID` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=696;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`loginId`) REFERENCES `login` (`loginId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
