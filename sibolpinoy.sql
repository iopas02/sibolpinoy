-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2022 at 03:48 AM
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
(6, 10, 'logged in', 'sadmin1', '2022-03-14 17:14:48'),
(7, 10, 'logged in', 'sadmin1', '2022-03-14 19:40:43'),
(10, 10, 'logged in', 'sadmin1', '2022-03-14 19:49:15'),
(11, 25, 'created account', 'sadmin1', '2022-03-14 20:15:37'),
(12, 25, 'logged in', 'jasonorioste', '2022-03-14 20:16:06'),
(14, 25, 'create services', 'jasonorioste', '2022-03-14 20:37:49'),
(15, 25, 'create services', 'jasonorioste', '2022-03-14 21:12:08'),
(16, 25, 'update services', 'jasonorioste', '2022-03-14 22:00:58'),
(17, 10, 'logged in', 'sadmin1', '2022-03-14 22:02:06'),
(18, 10, 'update services', 'sadmin1', '2022-03-14 22:02:29'),
(19, 10, 'update service status', 'sadmin1', '2022-03-14 22:18:58'),
(20, 10, 'update service status', 'sadmin1', '2022-03-14 22:20:00'),
(21, 25, 'logged in', 'jasonorioste', '2022-03-14 22:28:38'),
(22, 25, 'update service image', 'jasonorioste', '2022-03-14 22:29:04'),
(23, 25, 'create category services', 'jasonorioste', '2022-03-14 22:54:50'),
(24, 25, 'update category services', 'jasonorioste', '2022-03-14 23:18:45'),
(25, 25, 'update category status', 'jasonorioste', '2022-03-14 23:30:02'),
(26, 25, 'update service status', 'jasonorioste', '2022-03-14 23:31:12'),
(27, 10, 'logged in', 'sadmin1', '2022-03-14 23:31:48'),
(28, 10, 'update service status', 'sadmin1', '2022-03-14 23:32:02'),
(29, 10, 'update category services', 'sadmin1', '2022-03-14 23:53:03'),
(30, 10, 'create sub-category services', 'sadmin1', '2022-03-14 23:53:43'),
(31, 10, 'update sub-category services', 'sadmin1', '2022-03-15 00:07:16'),
(32, 10, 'update sub-category services', 'sadmin1', '2022-03-15 00:07:42'),
(33, 10, 'update sub-category status', 'sadmin1', '2022-03-15 00:15:42'),
(34, 10, 'update service status', 'sadmin1', '2022-03-15 00:18:54'),
(35, 25, 'logged in', 'jasonorioste', '2022-03-15 07:07:12'),
(36, 25, 'update service status', 'jasonorioste', '2022-03-15 07:14:46'),
(37, 25, 'logged in', 'jasonorioste', '2022-03-15 09:52:54'),
(38, 25, 'logged in', 'jasonorioste', '2022-03-15 17:12:04'),
(39, 25, 'Reply Email', 'jasonorioste', '2022-03-15 18:59:44'),
(40, 25, 'Reply Email', 'jasonorioste', '2022-03-15 19:31:57'),
(41, 25, 'Reply Email', 'jasonorioste', '2022-03-15 19:42:07'),
(42, 25, 'Reply Email', 'jasonorioste', '2022-03-15 19:44:35'),
(43, 25, 'Reply Email', 'jasonorioste', '2022-03-15 19:51:52'),
(44, 25, 'Reply Email', 'jasonorioste', '2022-03-15 20:01:13'),
(45, 25, 'Reply Email', 'jasonorioste', '2022-03-15 20:07:33'),
(46, 25, 'logged in', 'jasonorioste', '2022-03-15 22:01:44'),
(47, 25, 'logged in', 'jasonorioste', '2022-03-16 07:45:01'),
(48, 25, 'created new event', 'jasonorioste', '2022-03-16 13:54:39'),
(49, 25, 'logged in', 'jasonorioste', '2022-03-16 19:19:28'),
(50, 25, 'logged in', 'jasonorioste', '2022-03-17 07:43:44'),
(51, 25, 'created new event', 'jasonorioste', '2022-03-17 08:08:19'),
(52, 25, 'update service status', 'jasonorioste', '2022-03-17 10:29:03'),
(53, 25, 'update service status', 'jasonorioste', '2022-03-17 10:29:56'),
(54, 25, 'update event', 'jasonorioste', '2022-03-17 05:17:51'),
(55, 25, 'update event status', 'jasonorioste', '2022-03-17 06:19:42'),
(56, 25, 'update event status', 'jasonorioste', '2022-03-17 06:21:06'),
(57, 25, 'update event image', 'jasonorioste', '2022-03-17 15:29:44'),
(58, 25, 'update event status', 'jasonorioste', '2022-03-17 15:56:07'),
(59, 25, 'update event status', 'jasonorioste', '2022-03-17 16:44:23'),
(60, 25, 'update event status', 'jasonorioste', '2022-03-17 16:44:36'),
(61, 25, 'update event image', 'jasonorioste', '2022-03-17 16:54:43'),
(62, 25, 'logged in', 'jasonorioste', '2022-03-17 20:59:04'),
(63, 25, 'update service status', 'jasonorioste', '2022-03-17 21:40:29'),
(64, 25, 'update service status', 'jasonorioste', '2022-03-17 21:40:58'),
(65, 25, 'update category status', 'jasonorioste', '2022-03-17 22:01:39'),
(66, 25, 'update service status', 'jasonorioste', '2022-03-17 22:01:52'),
(67, 25, 'update service status', 'jasonorioste', '2022-03-17 22:02:03'),
(68, 25, 'create category services', 'jasonorioste', '2022-03-17 22:10:33'),
(69, 25, 'create sub-category services', 'jasonorioste', '2022-03-17 22:11:12'),
(70, 25, 'create sub-category services', 'jasonorioste', '2022-03-17 22:15:23'),
(71, 25, 'create sub-category services', 'jasonorioste', '2022-03-17 22:21:15'),
(72, 25, 'create sub-category services', 'jasonorioste', '2022-03-17 22:21:42'),
(73, 25, 'create sub-category services', 'jasonorioste', '2022-03-17 22:21:54'),
(74, 25, 'create sub-category services', 'jasonorioste', '2022-03-17 22:22:08'),
(75, 25, 'create sub-category services', 'jasonorioste', '2022-03-17 22:22:21'),
(76, 25, 'create sub-category services', 'jasonorioste', '2022-03-17 22:24:40'),
(77, 25, 'create sub-category services', 'jasonorioste', '2022-03-17 22:51:47'),
(78, 25, 'create sub-category services', 'jasonorioste', '2022-03-17 22:52:01'),
(79, 25, 'create sub-category services', 'jasonorioste', '2022-03-17 22:52:14'),
(80, 25, 'create sub-category services', 'jasonorioste', '2022-03-17 22:52:32'),
(81, 25, 'create sub-category services', 'jasonorioste', '2022-03-17 22:55:10'),
(82, 25, 'create sub-category services', 'jasonorioste', '2022-03-17 22:55:30'),
(83, 25, 'create sub-category services', 'jasonorioste', '2022-03-17 22:55:45'),
(84, 25, 'create category services', 'jasonorioste', '2022-03-17 22:56:32'),
(85, 25, 'create sub-category services', 'jasonorioste', '2022-03-17 22:56:51'),
(86, 25, 'create sub-category services', 'jasonorioste', '2022-03-17 22:57:04'),
(87, 25, 'create sub-category services', 'jasonorioste', '2022-03-17 22:57:16'),
(88, 25, 'create sub-category services', 'jasonorioste', '2022-03-17 22:57:31'),
(89, 25, 'create sub-category services', 'jasonorioste', '2022-03-17 22:57:42'),
(90, 25, 'create sub-category services', 'jasonorioste', '2022-03-17 22:57:59'),
(91, 25, 'update category status', 'jasonorioste', '2022-03-17 23:01:08'),
(92, 25, 'update category status', 'jasonorioste', '2022-03-17 23:01:25'),
(93, 25, 'update category status', 'jasonorioste', '2022-03-17 23:01:41'),
(94, 25, 'update category status', 'jasonorioste', '2022-03-17 23:03:17'),
(95, 25, 'update sub-category status', 'jasonorioste', '2022-03-17 23:03:41'),
(96, 25, 'update sub-category status', 'jasonorioste', '2022-03-17 23:03:48'),
(97, 25, 'update sub-category status', 'jasonorioste', '2022-03-17 23:04:04'),
(98, 25, 'update category status', 'jasonorioste', '2022-03-17 23:14:48'),
(99, 25, 'logged in', 'jasonorioste', '2022-03-18 08:08:23'),
(100, 25, 'update category status', 'jasonorioste', '2022-03-18 08:09:31'),
(101, 25, 'update service status', 'jasonorioste', '2022-03-18 09:19:11'),
(102, 25, 'update service status', 'jasonorioste', '2022-03-18 09:19:27'),
(103, 25, 'create services', 'jasonorioste', '2022-03-18 09:25:07'),
(104, 25, 'update service image', 'jasonorioste', '2022-03-18 09:25:51'),
(105, 25, 'logged in', 'jasonorioste', '2022-03-18 14:07:32'),
(106, 25, 'logged in', 'jasonorioste', '2022-03-18 14:18:24'),
(107, 25, 'Reply Email', 'jasonorioste', '2022-03-18 14:21:46'),
(108, 25, 'update event status', 'jasonorioste', '2022-03-18 14:23:09'),
(109, 25, 'update service status', 'jasonorioste', '2022-03-18 14:23:41'),
(110, 25, 'update service image', 'jasonorioste', '2022-03-18 14:24:05'),
(111, 25, 'update event status', 'jasonorioste', '2022-03-18 18:57:15'),
(112, 25, 'update event image', 'jasonorioste', '2022-03-18 19:04:02'),
(113, 25, 'created new event', 'jasonorioste', '2022-03-18 19:07:53'),
(114, 25, 'created new event', 'jasonorioste', '2022-03-18 19:15:38'),
(115, 25, 'created new event', 'jasonorioste', '2022-03-18 19:20:47'),
(116, 25, 'created new event', 'jasonorioste', '2022-03-18 19:27:41'),
(117, 25, 'update event status', 'jasonorioste', '2022-03-18 19:57:35'),
(118, 25, 'update event status', 'jasonorioste', '2022-03-18 19:57:40'),
(119, 25, 'update event status', 'jasonorioste', '2022-03-18 19:57:47'),
(120, 25, 'update event status', 'jasonorioste', '2022-03-18 19:57:55'),
(121, 25, 'update event status', 'jasonorioste', '2022-03-18 19:58:03'),
(122, 25, 'created new event', 'jasonorioste', '2022-03-18 20:03:16'),
(123, 25, 'created new event', 'jasonorioste', '2022-03-18 20:05:00'),
(124, 25, 'update event status', 'jasonorioste', '2022-03-18 20:37:34'),
(125, 25, 'update event status', 'jasonorioste', '2022-03-18 20:38:00'),
(126, 25, 'logged in', 'jasonorioste', '2022-03-19 08:42:58'),
(127, 25, 'update service status', 'jasonorioste', '2022-03-19 08:43:42'),
(128, 25, 'update service image', 'jasonorioste', '2022-03-19 08:44:26'),
(129, 25, 'create services', 'jasonorioste', '2022-03-19 08:45:08'),
(130, 25, 'create services', 'jasonorioste', '2022-03-19 08:45:48'),
(131, 25, 'create category services', 'jasonorioste', '2022-03-19 08:46:34'),
(132, 25, 'create category services', 'jasonorioste', '2022-03-19 08:47:00'),
(133, 25, 'create category services', 'jasonorioste', '2022-03-19 08:47:32'),
(134, 25, 'create sub-category services', 'jasonorioste', '2022-03-19 08:48:15'),
(135, 25, 'create sub-category services', 'jasonorioste', '2022-03-19 08:48:35'),
(136, 25, 'create sub-category services', 'jasonorioste', '2022-03-19 08:48:54'),
(137, 25, 'create sub-category services', 'jasonorioste', '2022-03-19 08:49:10'),
(138, 25, 'create sub-category services', 'jasonorioste', '2022-03-19 08:49:22'),
(139, 25, 'create sub-category services', 'jasonorioste', '2022-03-19 08:49:37'),
(140, 25, 'create sub-category services', 'jasonorioste', '2022-03-19 08:50:00'),
(141, 25, 'create sub-category services', 'jasonorioste', '2022-03-19 08:50:12'),
(142, 25, 'create sub-category services', 'jasonorioste', '2022-03-19 08:50:24'),
(143, 25, 'create sub-category services', 'jasonorioste', '2022-03-19 08:50:38'),
(144, 25, 'create sub-category services', 'jasonorioste', '2022-03-19 08:51:10'),
(145, 25, 'create sub-category services', 'jasonorioste', '2022-03-19 08:51:26'),
(146, 25, 'create sub-category services', 'jasonorioste', '2022-03-19 08:51:37'),
(147, 25, 'create sub-category services', 'jasonorioste', '2022-03-19 08:51:52'),
(148, 25, 'create sub-category services', 'jasonorioste', '2022-03-19 08:52:05'),
(149, 25, 'create sub-category services', 'jasonorioste', '2022-03-19 08:52:16'),
(150, 25, 'create sub-category services', 'jasonorioste', '2022-03-19 08:52:27'),
(151, 25, 'update service status', 'jasonorioste', '2022-03-19 09:05:58'),
(152, 25, 'update service status', 'jasonorioste', '2022-03-19 09:06:15'),
(153, 25, 'created new celebration post', 'jasonorioste', '2022-03-19 13:31:28'),
(154, 25, 'created new celebration post', 'jasonorioste', '2022-03-19 13:53:28'),
(155, 25, 'logged in', 'jasonorioste', '2022-03-21 10:36:39'),
(156, 25, 'update event status', 'jasonorioste', '2022-03-21 10:37:48'),
(157, 25, 'update event status', 'jasonorioste', '2022-03-21 10:38:01'),
(158, 25, 'update event status', 'jasonorioste', '2022-03-21 10:38:16'),
(159, 25, 'update event status', 'jasonorioste', '2022-03-21 10:38:42'),
(160, 25, 'update celebration', 'jasonorioste', '2022-03-21 11:46:36'),
(161, 25, 'logged in', 'jasonorioste', '2022-03-21 17:53:29'),
(162, 25, 'logged in', 'jasonorioste', '2022-03-22 07:30:58'),
(163, 25, 'Reply Email', 'jasonorioste', '2022-03-22 07:41:52'),
(164, 25, 'logged in', 'jasonorioste', '2022-03-22 09:06:16'),
(165, 25, 'Reply Email', 'jasonorioste', '2022-03-22 09:07:42'),
(166, 25, 'logged in', 'jasonorioste', '2022-03-22 10:56:05'),
(167, 25, 'Reply Email', 'jasonorioste', '2022-03-22 11:08:00'),
(168, 25, 'Reply Email', 'jasonorioste', '2022-03-22 11:14:38'),
(169, 25, 'Reply Email', 'jasonorioste', '2022-03-22 11:25:20'),
(170, 25, 'Reply Email', 'jasonorioste', '2022-03-22 11:26:06'),
(171, 25, 'update event status', 'jasonorioste', '2022-03-22 18:59:50'),
(172, 25, 'update event status', 'jasonorioste', '2022-03-22 19:23:15'),
(173, 25, 'update event status', 'jasonorioste', '2022-03-22 22:05:45'),
(174, 25, 'logged in', 'jasonorioste', '2022-03-23 09:21:03'),
(175, 25, 'update event status', 'jasonorioste', '2022-03-23 11:10:43'),
(176, 25, 'update event status', 'jasonorioste', '2022-03-23 12:38:27'),
(177, 25, 'logged in', 'jasonorioste', '2022-03-24 07:50:59'),
(178, 25, 'update service status', 'jasonorioste', '2022-03-24 07:57:26'),
(179, 25, 'update service status', 'jasonorioste', '2022-03-24 07:58:21'),
(180, 25, 'update services', 'jasonorioste', '2022-03-24 07:59:13'),
(181, 25, 'update services', 'jasonorioste', '2022-03-24 07:59:47'),
(182, 25, 'update event status', 'jasonorioste', '2022-03-24 08:04:21'),
(183, 25, 'update event status', 'jasonorioste', '2022-03-24 08:30:00'),
(184, 25, 'update event status', 'jasonorioste', '2022-03-24 08:30:14'),
(185, 25, 'created new celebration post', 'jasonorioste', '2022-03-24 09:49:32'),
(186, 25, 'update event status', 'jasonorioste', '2022-03-24 09:49:50'),
(187, 25, 'update event status', 'jasonorioste', '2022-03-24 09:49:55'),
(188, 25, 'update event status', 'jasonorioste', '2022-03-24 09:50:15'),
(189, 25, 'update event status', 'jasonorioste', '2022-03-24 09:50:27'),
(190, 25, 'update event status', 'jasonorioste', '2022-03-24 09:50:38'),
(191, 25, 'update event status', 'jasonorioste', '2022-03-24 09:50:57'),
(192, 25, 'update service status', 'jasonorioste', '2022-03-24 10:25:59'),
(193, 25, 'update service status', 'jasonorioste', '2022-03-24 10:30:34'),
(194, 25, 'update service status', 'jasonorioste', '2022-03-24 10:31:05'),
(195, 25, 'update service status', 'jasonorioste', '2022-03-24 10:31:05'),
(196, 25, 'update service status', 'jasonorioste', '2022-03-24 10:31:09'),
(197, 25, 'logged in', 'jasonorioste', '2022-03-24 18:13:47'),
(198, 25, 'update event status', 'jasonorioste', '2022-03-24 18:14:01'),
(199, 10, 'logged in', 'sadmin1', '2022-03-25 06:28:28'),
(200, 25, 'logged in', 'jasonorioste', '2022-03-25 10:01:15'),
(201, 25, 'logged in', 'jasonorioste', '2022-03-25 15:18:49'),
(202, 25, 'logged in', 'jasonorioste', '2022-03-27 09:56:50'),
(203, 25, 'update event', 'jasonorioste', '2022-03-27 09:58:56'),
(204, 25, 'update event status', 'jasonorioste', '2022-03-27 16:34:15'),
(205, 25, 'logged in', 'jasonorioste', '2022-03-28 14:55:40'),
(206, 25, 'update service status', 'jasonorioste', '2022-03-28 15:33:33'),
(207, 25, 'update service status', 'jasonorioste', '2022-03-28 15:34:26'),
(208, 25, 'update category status', 'jasonorioste', '2022-03-28 15:34:59'),
(209, 25, 'update event status', 'jasonorioste', '2022-03-28 15:36:25'),
(210, 25, 'update event status', 'jasonorioste', '2022-03-28 15:37:43'),
(211, 25, 'update celebration', 'jasonorioste', '2022-03-28 15:38:51'),
(212, 25, 'update services', 'jasonorioste', '2022-03-28 15:39:15'),
(213, 25, 'update category status', 'jasonorioste', '2022-03-28 16:39:45'),
(214, 25, 'update category status', 'jasonorioste', '2022-03-28 16:39:50'),
(215, 25, 'update event status', 'jasonorioste', '2022-03-28 17:28:35'),
(216, 25, 'update service status', 'jasonorioste', '2022-03-28 17:28:52'),
(217, 25, 'update service status', 'jasonorioste', '2022-03-28 17:28:56'),
(218, 25, 'logged in', 'jasonorioste', '2022-03-29 07:43:26'),
(219, 25, 'logged in', 'jasonorioste', '2022-03-30 08:07:24'),
(220, 25, 'update event status', 'jasonorioste', '2022-03-30 08:07:43'),
(221, 10, 'logged in', 'sadmin1', '2022-03-30 08:11:19');

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
-- Table structure for table `celebration`
--

CREATE TABLE `celebration` (
  `keepingID` int(150) NOT NULL,
  `commemoration` varchar(250) NOT NULL,
  `header` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `message1` longtext DEFAULT NULL,
  `message2` longtext DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `loginId` int(150) NOT NULL,
  `action` varchar(100) NOT NULL,
  `uploaded` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `celebration`
--

INSERT INTO `celebration` (`keepingID`, `commemoration`, `header`, `image`, `message1`, `message2`, `status`, `loginId`, `action`, `uploaded`, `updated`) VALUES
(2, 'Happy International Women\'s Day', 'We Celebrate on this Month', 'IMG-62356fd8ede6c6.61067933.gif', 'Celebrate women\'s achievement. Raise awareness against bias and take action for equality.', 'A simple message from SPMC', 'unpublished', 25, 'update event status', '2022-03-19 13:53:28', '2022-03-24 09:50:57'),
(3, 'Day Of Valor', 'SPMC Commemorate on this Month', 'IMG-623bce2ca228e4.47305632.gif', 'Araw ng Kagitingan in Filipino, this official regular nationwide holiday is celebrated annually on April 9th.', 'Message from SPMC', 'published', 25, 'update celebration', '2022-03-24 09:49:32', '2022-03-28 15:38:51');

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
(1, 'IMG-62317b9f5731b3.22549484.png', 'Join Sibol-PINOY Management Consultancy on its FREE WEBINAR with the theme, \"Pinakbet or Laing: Weighing Alternatives, Making the Right Choice #NOTAPOLITICALFORUM', 'A Webinar on Business Decision-Making, and Product and Service Management.', '2022-04-01', 'Friday, 1st of April, 2022 from 5:00 PM to 8:00 PM', 'FREE WEBINAR ', 'Don\'t miss the opportunity to discover the world of Business Decision-Making and Product and Service Management!', 'https://forms.gle/9dYUAzVDbSKbR9xg8', 25, 'published', '2022-03-16 13:54:39', 'update event', '2022-03-27 09:58:56'),
(2, 'IMG-62346722360a95.38485299.jpg', 'Avail UP TO 50% OFF on any of the following Training-Workshops below:', 'ISO 9001:2015 Requirements and Internal Quality Audit', '2022-03-05', 'March 5, 6, 12 & 13, 2022 | 9AM-5PM', 'Regular Fee: P2,000.00', 'Early Bird Discount (20% OFF): P1,600.00/Training if you register until March 1, 2022', 'Student & Group Registration (Min. of 3 pax | 50% OFF): P1,000.00/Pax.', 25, 'unpublished', '2022-03-17 08:08:19', 'update event status', '2022-03-30 08:07:43'),
(3, 'IMG-62346809cd8090.78014898.jpg', 'Avail UP TO 50% OFF on any of the following Training-Workshops below:', 'Strategic Planning Risk Based Management', '2022-03-07', 'March 7 - 11, 2022 | 5PM-9PM', 'Regular Fee: P2,000.00', 'Early Bird Discount (20% OFF): P1,600.00/Training if you register until March 1, 2022', 'Student & Group Registration (Min. of 3 pax | 50% OFF): P1,000.00/Pax.', 25, 'unpublished', '2022-03-18 19:07:53', 'update event status', '2022-03-27 16:34:15'),
(4, 'IMG-623469da460077.86291692.jpg', 'Sibol-PINOY Management Consultancy (SPMC) is offering a 4 day Training Workshop ', 'ISO 9001:2015 Quality Management  System Requirements and Documentation ', '2021-10-30', 'October 30-31 and November 6-7, 2021 from 9:00am to 5:00pm.', 'Regular Fee: P2,500.00', 'Participants shall receive lecture notes, workable templates, and certificates upon completion. ', '', 25, 'unpublished', '2022-03-18 19:15:38', 'update event status', '2022-03-18 19:57:47'),
(5, 'IMG-62346b0fba02e8.96366425.png', 'Join Sibol-PINOY Management Consultancy on its FREE WEBINAR ROADSHOW ', 'Building Organizational Resilience 101: Risk Management and Root Cause Analysis', '2022-02-16', 'Wednesday, 16 February 2022 from 5PM to 8PM.', 'FREE WEBINAR ', 'Get 2 Certificates in 1 Webinar', '', 25, 'unpublished', '2022-03-18 19:20:47', 'update event status', '2022-03-18 19:57:55'),
(6, 'IMG-62346cad767fc7.20261876.png', 'Join Sibol-PINOY Management Consultancy on its first ever FREE WEBINAR ROADSHOW', 'Building Organizational Resilience: Introducing Tools and Techniques for Risk Management and Root Cause Analysis', '2022-01-09', 'January 9, 2022 from 9AM to 12 NN.', 'FREE WEBINAR ', 'Donâ€™t miss the opportunity to take on the world of Risk Management and Root Cause Analysis!', '', 25, 'unpublished', '2022-03-18 19:27:41', 'update event status', '2022-03-18 19:58:03'),
(7, 'IMG-623475043197b2.88324006.png', 'Sibol-PINOY Management Consultancy LIVE VIRTUAL TRAINING-WORKSHOPS Schedules for 2022:', 'Introduction to ISO 9001:2015 Internal Quality Audit', '2022-01-22', 'January 22, 23, 29, 30, 2022 | 9AM-5PM ', 'Regular Fee: P2,000.00', 'Year-End Discount: P1,000.00 until December 31, 2021', 'Early Bird Discount: P1,600.00 if you register from January 1 - 15, 2022', 25, 'unpublished', '2022-03-18 20:03:16', 'created new event', '2022-03-18 20:03:16'),
(8, 'IMG-6234756ca1dcd4.17765772.png', 'Sibol-PINOY Management Consultancy LIVE VIRTUAL TRAINING-WORKSHOPS Schedules for 2022:', 'Essentials in Project Management and MEAL (Monitoring, Evaluation, Accountability, and Learning):', '2022-02-24', 'January 24-28, 2022 | 5PM-9PM', 'Regular Fee: P2,000.00', 'Year-End Discount: P1,000.00 until December 31, 2021', 'Early Bird Discount: P1,600.00 if you register from January 1 - 15, 2022', 25, 'unpublished', '2022-03-18 20:05:00', 'created new event', '2022-03-18 20:05:00');

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
(10, 'sadmin1', 'sadmin1', '1', 'active', '2022-03-08', '2022-03-30 08:11:19', NULL),
(25, 'jasonorioste', 'SPMC123', '0', 'active', '2022-03-14', '2022-03-30 08:07:24', NULL);

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
(5, 10, 'Kenneth12', 'Punzalan', '2022-03-08'),
(20, 25, 'Jason', 'Orioste', '2022-03-14');

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

-- --------------------------------------------------------

--
-- Table structure for table `sent_email`
--

CREATE TABLE `sent_email` (
  `sentID` int(150) NOT NULL,
  `client_uniID` varchar(250) NOT NULL,
  `emailID` int(150) NOT NULL,
  `loginId` int(11) NOT NULL,
  `company_email` varchar(250) NOT NULL,
  `cc` varchar(250) DEFAULT NULL,
  `subject` varchar(250) NOT NULL,
  `reply` longtext DEFAULT NULL,
  `attachment` varchar(250) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date_reply` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `loginId` varchar(250) DEFAULT NULL,
  `action` varchar(250) DEFAULT NULL,
  `date_upload` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`number`, `service_uniID`, `service_title`, `image`, `service_desc`, `status`, `loginId`, `action`, `date_upload`, `date_update`) VALUES
(12, '2022-31471', 'Business Consultancy - SPMC', 'IMG-62342585e0a808.03067507.jpg', 'In Sibol-Pinoy , we boast of our world class approach in helping organizations achieve their objectives. We just do not partner with our clients, we engage and become one with them in their journey to quality improvement.', 'Active', '25', 'update services', '2022-03-14 21:12:08', '2022-03-28 15:39:15'),
(13, '2022-12686', 'Technological Solutions', 'IMG-6235276aa8eba7.41810605.jpg', 'Let Sibol-Pinoy help you provide complete customer solutions that span the IT life-cycle. Our technology experts will work with you to exceed the demand of high-growth technology in the vertical markets locally and around the world.', 'Active', '25', 'update service image', '2022-03-18 09:25:07', '2022-03-19 08:44:26'),
(14, '2022-75881', 'Training and Development', 'IMG-623527940c7978.02103273.jpg', 'As we envision our client to be self-dependent, we put emphasis on capacity-building and capability-building activities. Thus, Ideation Philippines has carefully designed and developed training modules and short-term courses aligned with global standards.', 'Active', '25', 'update service status', '2022-03-19 08:45:08', '2022-03-28 17:28:52'),
(15, '2022-28578', 'Research Development', 'IMG-623527bc0e4ac0.57469004.jpg', 'Sibol-Pinoy Management Consultancy highly engaged team members are specialized in providing technical assistance providing professional development and management support to public and private sector organizations in order to maximize resources and value, while minimizing cost and risk.', 'Active', '25', 'update service status', '2022-03-19 08:45:48', '2022-03-28 17:28:56');

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
(4, '2022-kodji7', '2022-31471', 'Compliance and Standards', 'Active', '25', 'update service status', '2022-03-14 22:54:50', '2022-03-18 09:19:27'),
(5, '2022-cpqrk0', '2022-31471', 'Performance Excellence', 'Active', '25', 'update service status', '2022-03-17 22:10:33', '2022-03-18 09:19:27'),
(6, '2022-x8b07w', '2022-31471', 'Productivity & Quality', 'Active', '25', 'update category status', '2022-03-17 22:56:32', '2022-03-28 16:39:50'),
(7, '2022-8gl4wh', '2022-12686', 'Graphics Services', 'Active', '25', 'create category services', '2022-03-19 08:46:34', '2022-03-19 08:46:34'),
(8, '2022-aysmc9', '2022-12686', 'Web Designing', 'Active', '25', 'create category services', '2022-03-19 08:47:00', '2022-03-19 08:47:00'),
(9, '2022-njgk1x', '2022-12686', 'Document Services', 'Active', '25', 'create category services', '2022-03-19 08:47:32', '2022-03-19 08:47:32');

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
(4, '2022-hvmy87z', '2022-31471', '2022-kodji7 ', 'Automotive Quality Management System Standard (IATF 16949:2016)', 'Active', '25', 'update service status', '2022-03-14 23:53:43', '2022-03-18 09:19:27'),
(5, '2022-wi05ysb', '2022-31471', '2022-kodji7 ', 'Energy Management System (ISO 50001:2011)', 'Active', '25', 'update service status', '2022-03-17 22:11:12', '2022-03-18 09:19:27'),
(6, '2022-ptsavj9', '2022-31471', '2022-kodji7 ', 'Environmental Management System (ISO 14001:2015)', 'Active', '25', 'update service status', '2022-03-17 22:15:23', '2022-03-18 09:19:27'),
(7, '2022-iayrbg9', '2022-31471', '2022-kodji7 ', 'Food Safety Management System (ISO 22000:2005) & HACCP', 'Active', '25', 'update service status', '2022-03-17 22:21:15', '2022-03-18 09:19:27'),
(8, '2022-z824qel', '2022-31471', '2022-kodji7 ', 'Food Safety Systems Certification (FSSC 22000)', 'Active', '25', 'update service status', '2022-03-17 22:21:42', '2022-03-18 09:19:27'),
(9, '2022-owhixj7', '2022-31471', '2022-kodji7 ', 'Information Security Management System (ISO 27001:2013)', 'Active', '25', 'update service status', '2022-03-17 22:21:54', '2022-03-18 09:19:27'),
(10, '2022-a3jo4hc', '2022-31471', '2022-kodji7 ', 'Occupational Health & Safety Management System (OHSAS 18001)/ISO 45001:2016)', 'Active', '25', 'update service status', '2022-03-17 22:22:08', '2022-03-18 09:19:27'),
(11, '2022-ntz9hp5', '2022-31471', '2022-kodji7 ', 'Quality Management System (ISO 9001:2015)', 'Active', '25', 'update service status', '2022-03-17 22:22:21', '2022-03-18 09:19:27'),
(12, '2022-d4ri03x', '2022-31471', '2022-cpqrk0 ', 'Business Excellence Self-Assessment', 'Active', '25', 'update service status', '2022-03-17 22:24:40', '2022-03-18 09:19:27'),
(13, '2022-f85s3y6', '2022-31471', '2022-cpqrk0 ', 'Third-Party BE Assessment', 'Active', '25', 'update service status', '2022-03-17 22:51:47', '2022-03-18 09:19:27'),
(14, '2022-mjyplnb', '2022-31471', '2022-cpqrk0 ', 'Leadership Excellence', 'Active', '25', 'update service status', '2022-03-17 22:52:01', '2022-03-18 09:19:27'),
(15, '2022-36pfznu', '2022-31471', '2022-cpqrk0 ', 'Strategic Planning', 'Active', '25', 'update service status', '2022-03-17 22:52:14', '2022-03-18 09:19:27'),
(16, '2022-j3pts5w', '2022-31471', '2022-cpqrk0 ', 'Customer-Focused Excellence', 'Active', '25', 'update service status', '2022-03-17 22:52:32', '2022-03-18 09:19:27'),
(17, '2022-vr172dy', '2022-31471', '2022-cpqrk0 ', 'Knowledge Management', 'Active', '25', 'update service status', '2022-03-17 22:55:10', '2022-03-18 09:19:27'),
(18, '2022-f0xpqh8', '2022-31471', '2022-cpqrk0 ', 'HR Excellence', 'Active', '25', 'update service status', '2022-03-17 22:55:30', '2022-03-18 09:19:27'),
(19, '2022-3cd9ohy', '2022-31471', '2022-cpqrk0 ', 'Operations Excellence', 'Active', '25', 'update service status', '2022-03-17 22:55:45', '2022-03-18 09:19:27'),
(20, '2022-s1zgyft', '2022-31471', '2022-x8b07w ', 'P&Q Diagnosis', 'Active', '25', 'update category status', '2022-03-17 22:56:51', '2022-03-28 16:39:50'),
(21, '2022-hpsi74t', '2022-31471', '2022-x8b07w ', '5s', 'Active', '25', 'update category status', '2022-03-17 22:57:04', '2022-03-28 16:39:50'),
(22, '2022-f8zmpba', '2022-31471', '2022-x8b07w ', 'SS', 'Active', '25', 'update category status', '2022-03-17 22:57:16', '2022-03-28 16:39:50'),
(23, '2022-nfh4i3j', '2022-31471', '2022-x8b07w ', 'WIT', 'Active', '25', 'update category status', '2022-03-17 22:57:31', '2022-03-28 16:39:50'),
(24, '2022-ruqfedp', '2022-31471', '2022-x8b07w ', 'Lean Management', 'Active', '25', 'update category status', '2022-03-17 22:57:42', '2022-03-28 16:39:50'),
(25, '2022-cz2yu3b', '2022-31471', '2022-x8b07w ', 'Labor-Management Cooperation', 'Active', '25', 'update category status', '2022-03-17 22:57:59', '2022-03-28 16:39:50'),
(26, '2022-yo6bgsi', '2022-12686', '2022-8gl4wh ', 'Logo', 'Active', '25', 'create sub-category services', '2022-03-19 08:48:15', '2022-03-19 08:48:15'),
(27, '2022-ok2watb', '2022-12686', '2022-8gl4wh ', 'Flyer', 'Active', '25', 'create sub-category services', '2022-03-19 08:48:35', '2022-03-19 08:48:35'),
(28, '2022-us80qt6', '2022-12686', '2022-8gl4wh ', 'Design Services', 'Active', '25', 'create sub-category services', '2022-03-19 08:48:54', '2022-03-19 08:48:54'),
(29, '2022-ehzfi5u', '2022-12686', '2022-8gl4wh ', 'Banner design', 'Active', '25', 'create sub-category services', '2022-03-19 08:49:10', '2022-03-19 08:49:10'),
(30, '2022-ka98hjt', '2022-12686', '2022-8gl4wh ', 'Ad Boxes design', 'Active', '25', 'create sub-category services', '2022-03-19 08:49:22', '2022-03-19 08:49:22'),
(31, '2022-3jv1ms0', '2022-12686', '2022-8gl4wh ', 'Brochure', 'Active', '25', 'create sub-category services', '2022-03-19 08:49:37', '2022-03-19 08:49:37'),
(32, '2022-v7kdehf', '2022-12686', '2022-aysmc9 ', 'Web Content', 'Active', '25', 'create sub-category services', '2022-03-19 08:50:00', '2022-03-19 08:50:00'),
(33, '2022-d5vrgqo', '2022-12686', '2022-aysmc9 ', 'Redesign Services', 'Active', '25', 'create sub-category services', '2022-03-19 08:50:12', '2022-03-19 08:50:12'),
(34, '2022-b25ngek', '2022-12686', '2022-aysmc9 ', 'Content Upload', 'Active', '25', 'create sub-category services', '2022-03-19 08:50:24', '2022-03-19 08:50:24'),
(35, '2022-k7gbmje', '2022-12686', '2022-aysmc9 ', 'Technical Maintenance', 'Active', '25', 'create sub-category services', '2022-03-19 08:50:38', '2022-03-19 08:50:38'),
(36, '2022-6kts8on', '2022-12686', '2022-aysmc9 ', 'Customer-Focused Excellence', 'Active', '25', 'create sub-category services', '2022-03-19 08:51:10', '2022-03-19 08:51:10'),
(37, '2022-nej8ztf', '2022-12686', '2022-aysmc9 ', 'Web Hosting', 'Active', '25', 'create sub-category services', '2022-03-19 08:51:26', '2022-03-19 08:51:26'),
(38, '2022-so9tavc', '2022-12686', '2022-aysmc9 ', 'Web Statistics', 'Active', '25', 'create sub-category services', '2022-03-19 08:51:37', '2022-03-19 08:51:37'),
(39, '2022-tzhgp76', '2022-12686', '2022-njgk1x ', 'Presentation Services', 'Active', '25', 'create sub-category services', '2022-03-19 08:51:52', '2022-03-19 08:51:52'),
(40, '2022-8vb16o7', '2022-12686', '2022-njgk1x ', 'Transcription', 'Active', '25', 'create sub-category services', '2022-03-19 08:52:05', '2022-03-19 08:52:05'),
(41, '2022-1ezoubm', '2022-12686', '2022-njgk1x ', 'Proofreading', 'Active', '25', 'create sub-category services', '2022-03-19 08:52:16', '2022-03-19 08:52:16'),
(42, '2022-fiynw46', '2022-12686', '2022-njgk1x ', 'Conceptual Design', 'Active', '25', 'create sub-category services', '2022-03-19 08:52:27', '2022-03-19 08:52:27');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `archiveuser`
--
ALTER TABLE `archiveuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `celebration`
--
ALTER TABLE `celebration`
  MODIFY `keepingID` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `c_count` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `emailID` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `event_reservation`
--
ALTER TABLE `event_reservation`
  MODIFY `entryID` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `loginId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `scheduler`
--
ALTER TABLE `scheduler`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sent_email`
--
ALTER TABLE `sent_email`
  MODIFY `sentID` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `visitorsID` int(250) NOT NULL AUTO_INCREMENT;

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
