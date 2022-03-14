-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2022 at 10:17 AM
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
  `id` int(11) NOT NULL,
  `loginId` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `actionBy` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlog`
--

INSERT INTO `adminlog` (`id`, `loginId`, `action`, `actionBy`, `date`) VALUES
(3, 10, 'create', 'dev', '2022-03-14 14:17:42'),
(5, 10, 'update', 'sadmin1', '2022-03-14 14:24:54'),
(6, 10, 'logged in', 'sadmin1', '2022-03-14 17:14:48');

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
  `dateAdded` date NOT NULL,
  `dateDeleted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `archiveuser`
--

INSERT INTO `archiveuser` (`id`, `loginId`, `profileId`, `firstName`, `lastName`, `username`, `level`, `reason`, `dateAdded`, `dateDeleted`) VALUES
(2, 8, 4, 'Jason', 'Orioste', 'jason', 'admin', 'this is a testing', '0000-00-00', '2022-03-09'),
(3, 14, 9, 'Jason', 'Orioste', 'jasonorioste', '0', 'test 1', '2022-03-08', '2022-03-10'),
(4, 13, 8, 'Charles', 'Abuzo', 'admin2', '0', 'test 2', '2022-03-08', '2022-03-10'),
(5, 18, 13, 'Super', 'Proxy', 'superproxy', '0', 'this is a testing', '2022-03-14', '2022-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `emailID` int(150) NOT NULL,
  `sender_name` varchar(250) NOT NULL,
  `sender_email` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` longtext DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `date_mailed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`emailID`, `sender_name`, `sender_email`, `subject`, `message`, `status`, `date_mailed`) VALUES
(1, 'Jason Orioste', '12345@gmail.com', 'Business Consultancy Reservation', 'i want to set a consultation, tell me how? i\'m open minded.....', 'Read', '2022-03-11 10:12:40'),
(2, 'Norman Black', 'new.email@gmail.com', 'Business Consultancy Reservation', 'this is a message', 'Read', '2022-03-11 10:20:13'),
(3, 'Michael Punzalan', 'punzalan@gmail.com', 'Technological Solutions', 'Let Sibol-Pinoy help you provide complete customer solutions that span the IT life-cycle. Our technology experts will work with you to exceed the demand of high-growth technology in the vertical markets locally and around the world.', 'Read', '2022-03-14 17:13:27');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(45) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `start_event` datetime DEFAULT NULL,
  `end_event` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`) VALUES
(7, 'Meeting with Sir Josh', '2022-03-14 14:00:00', '2022-03-14 16:00:00'),
(8, 'all interns meeting', '2022-03-15 14:00:00', '2022-03-15 16:00:00');

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
  `dateAdded` date NOT NULL,
  `lastLoginDate` datetime DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginId`, `username`, `password`, `level`, `status`, `dateAdded`, `lastLoginDate`, `createdBy`) VALUES
(10, 'sadmin1', 'sadmin1', '1', 'active', '2022-03-08', '2022-03-14 17:14:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `loginId` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `dateAdded` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `loginId`, `firstName`, `lastName`, `dateAdded`) VALUES
(5, 10, 'Kenneth12', 'Punzalan', '2022-03-08');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `number` int(100) NOT NULL,
  `service_uniID` text NOT NULL,
  `service_title` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `service_desc` longtext NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_upload` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `date_upload` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `date_upload` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `visitorsID` int(100) NOT NULL,
  `visitorsIP` varchar(250) DEFAULT NULL,
  `date_visited` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`visitorsID`, `visitorsIP`, `date_visited`) VALUES
(2, '::1', '2022-03-10'),
(3, '::1', '2022-03-10'),
(4, '::1', '2022-03-10'),
(5, '::1', '2022-03-10'),
(6, '::1', '2022-03-10'),
(7, '::1', '2022-03-10'),
(8, '::1', '2022-03-10'),
(9, '::1', '2022-03-10'),
(10, '::1', '2022-03-10'),
(11, '::1', '2022-03-10'),
(12, '::1', '2022-03-10'),
(13, '::1', '2022-03-10'),
(14, '::1', '2022-03-10'),
(15, '::1', '2022-03-10'),
(16, '::1', '2022-03-10'),
(17, '::1', '2022-03-10'),
(18, '::1', '2022-03-10'),
(19, '::1', '2022-03-10'),
(20, '::1', '2022-03-10'),
(21, '::1', '2022-03-10'),
(22, '::1', '2022-03-10'),
(23, '::1', '2022-03-10'),
(24, '::1', '2022-03-10'),
(25, '::1', '2022-03-10'),
(26, '::1', '2022-03-10'),
(27, '::1', '2022-03-10'),
(28, '::1', '2022-03-10'),
(29, '::1', '2022-03-10'),
(30, '::1', '2022-03-10'),
(31, '::1', '2022-03-10'),
(32, '::1', '2022-03-10'),
(33, '::1', '2022-03-10'),
(34, '::1', '2022-03-10'),
(35, '::1', '2022-03-10'),
(36, '::1', '2022-03-10'),
(37, '::1', '2022-03-10'),
(38, '::1', '2022-03-10'),
(39, '::1', '2022-03-10'),
(40, '::1', '2022-03-10'),
(41, '::1', '2022-03-10'),
(42, '::1', '2022-03-10'),
(43, '::1', '2022-03-10'),
(44, '::1', '2022-03-10'),
(45, '::1', '2022-03-10'),
(46, '::1', '2022-03-10'),
(47, '::1', '2022-03-10'),
(48, '::1', '2022-03-10'),
(49, '::1', '2022-03-10'),
(50, '::1', '2022-03-10'),
(51, '::1', '2022-03-10'),
(52, '::1', '2022-03-10'),
(53, '::1', '2022-03-10'),
(54, '::1', '2022-03-10'),
(55, '::1', '2022-03-11'),
(56, '::1', '2022-03-11'),
(57, '::1', '2022-03-11'),
(58, '::1', '2022-03-11'),
(59, '::1', '2022-03-11'),
(60, '::1', '2022-03-11'),
(61, '::1', '2022-03-11'),
(62, '::1', '2022-03-11'),
(63, '::1', '2022-03-11'),
(64, '::1', '2022-03-11'),
(65, '::1', '2022-03-11'),
(66, '::1', '2022-03-11'),
(67, '::1', '2022-03-11'),
(68, '::1', '2022-03-11'),
(69, '::1', '2022-03-11'),
(70, '::1', '2022-03-11'),
(71, '::1', '2022-03-11'),
(72, '::1', '2022-03-11'),
(73, '::1', '2022-03-11'),
(74, '::1', '2022-03-11'),
(75, '::1', '2022-03-11'),
(76, '::1', '2022-03-11'),
(77, '::1', '2022-03-11'),
(78, '::1', '2022-03-11'),
(79, '::1', '2022-03-11'),
(80, '::1', '2022-03-11'),
(81, '::1', '2022-03-11'),
(82, '::1', '2022-03-11'),
(83, '::1', '2022-03-11'),
(84, '::1', '2022-03-11'),
(85, '::1', '2022-03-11'),
(86, '::1', '2022-03-11'),
(87, '::1', '2022-03-11'),
(88, '::1', '2022-03-11'),
(89, '::1', '2022-03-11'),
(90, '::1', '2022-03-11'),
(91, '::1', '2022-03-11'),
(92, '::1', '2022-03-11'),
(93, '::1', '2022-03-11'),
(94, '::1', '2022-03-11'),
(95, '::1', '2022-03-11'),
(96, '::1', '2022-03-11'),
(97, '::1', '2022-03-11'),
(98, '::1', '2022-03-11'),
(99, '::1', '2022-03-11'),
(100, '::1', '2022-03-11'),
(101, '::1', '2022-03-11'),
(102, '::1', '2022-03-11'),
(103, '::1', '2022-03-11'),
(104, '::1', '2022-03-11'),
(105, '::1', '2022-03-11'),
(106, '::1', '2022-03-11'),
(107, '::1', '2022-03-11'),
(108, '::1', '2022-03-11'),
(109, '::1', '2022-03-11'),
(110, '::1', '2022-03-11'),
(111, '::1', '2022-03-11'),
(112, '::1', '2022-03-11'),
(113, '::1', '2022-03-11'),
(114, '::1', '2022-03-11'),
(115, '::1', '2022-03-11'),
(116, '::1', '2022-03-11'),
(117, '::1', '2022-03-11'),
(118, '::1', '2022-03-11'),
(119, '::1', '2022-03-11'),
(120, '::1', '2022-03-11'),
(121, '::1', '2022-03-11'),
(122, '::1', '2022-03-11'),
(123, '::1', '2022-03-11'),
(124, '::1', '2022-03-11'),
(125, '::1', '2022-03-11'),
(126, '::1', '2022-03-11'),
(127, '::1', '2022-03-12'),
(128, '::1', '2022-03-12'),
(129, '::1', '2022-03-12'),
(130, '::1', '2022-03-12'),
(131, '::1', '2022-03-12'),
(132, '::1', '2022-03-12'),
(133, '::1', '2022-03-12'),
(134, '::1', '2022-03-13'),
(135, '::1', '2022-03-13'),
(136, '::1', '2022-03-13'),
(137, '::1', '2022-03-13'),
(138, '::1', '2022-03-13'),
(139, '::1', '2022-03-13'),
(140, '::1', '2022-03-13'),
(141, '::1', '2022-03-14'),
(142, '::1', '2022-03-14'),
(143, '::1', '2022-03-14'),
(144, '::1', '2022-03-14'),
(145, '::1', '2022-03-14'),
(146, '::1', '2022-03-14'),
(147, '::1', '2022-03-14'),
(148, '::1', '2022-03-14'),
(149, '::1', '2022-03-14'),
(150, '::1', '2022-03-14'),
(151, '::1', '2022-03-14'),
(152, '::1', '2022-03-14'),
(153, '::1', '2022-03-14'),
(154, '::1', '2022-03-14'),
(155, '::1', '2022-03-14'),
(156, '::1', '2022-03-14'),
(157, '::1', '2022-03-14'),
(158, '::1', '2022-03-14'),
(159, '::1', '2022-03-14'),
(160, '::1', '2022-03-14');

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
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`emailID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`number`),
  ADD UNIQUE KEY `service_uniID` (`service_uniID`(599));

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `archiveuser`
--
ALTER TABLE `archiveuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `emailID` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `loginId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `number` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services_category`
--
ALTER TABLE `services_category`
  MODIFY `number` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services_sub_category`
--
ALTER TABLE `services_sub_category`
  MODIFY `number` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `visitorsID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adminlog`
--
ALTER TABLE `adminlog`
  ADD CONSTRAINT `adminlog_ibfk_1` FOREIGN KEY (`loginId`) REFERENCES `login` (`loginId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`loginId`) REFERENCES `login` (`loginId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
