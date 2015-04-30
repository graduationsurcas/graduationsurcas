-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2015 at 06:47 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oman_tourism_guide`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_report`
--

CREATE TABLE IF NOT EXISTS `action_report` (
`id_action_report` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `source_ip` varchar(20) NOT NULL,
  `report` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `action_report`
--

INSERT INTO `action_report` (`id_action_report`, `admin`, `source_ip`, `report`, `create_date`) VALUES
(1, 2, '::1', 'try', '2015-04-30 16:35:21'),
(2, 2, '::1', 'USER INSERT NEW PLACE', '2015-04-30 16:39:12'),
(3, 2, '::1', 'admin update place | item id = 208', '2015-04-30 16:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` int(11) NOT NULL,
  `admin_type` int(11) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_name` varchar(45) NOT NULL,
  `admin_password` varchar(65) NOT NULL,
  `admin_create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_type`, `admin_email`, `admin_name`, `admin_password`, `admin_create_date`) VALUES
(2, 3, 'ghak@gmail.com', 'Ghak', '$2y$10$qqUiFMgESJMdOG23G43mH.buttBVOES98yGaMt.AL/.BFmTgXKPT.', '2015-04-08 13:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `admin_type`
--

CREATE TABLE IF NOT EXISTS `admin_type` (
`admintype_id` int(11) NOT NULL,
  `admintype_name` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_type`
--

INSERT INTO `admin_type` (`admintype_id`, `admintype_name`) VALUES
(3, 'root'),
(4, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `feadback`
--

CREATE TABLE IF NOT EXISTS `feadback` (
`feadback_id` int(11) NOT NULL,
  `feadback_user_id` int(11) NOT NULL,
  `feadback_add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `feadback_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
`item_id` int(11) NOT NULL,
  `item_type` int(11) NOT NULL,
  `item_admin_creator` int(11) NOT NULL,
  `item_place` int(11) NOT NULL,
  `item_name` varchar(45) NOT NULL,
  `item_add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_description` text NOT NULL,
  `status_view` int(11) NOT NULL DEFAULT '1' COMMENT '1 is disaplay for all\n0 is no',
  `item_last_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=210 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_type`, `item_admin_creator`, `item_place`, `item_name`, `item_add_date`, `item_description`, `status_view`, `item_last_update`) VALUES
(107, 1, 2, 24, 'ghak t', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(108, 1, 2, 24, 'with comment', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(109, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(110, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(111, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(112, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(113, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(114, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(115, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(116, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(117, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(118, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(119, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(120, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(121, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(122, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(123, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(124, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(125, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(126, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(127, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(128, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(129, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(130, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(131, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(132, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(133, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(134, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(135, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(136, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(137, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(138, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(139, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(140, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(141, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(142, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(143, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(144, 1, 2, 24, 'test', '2015-04-14 22:00:32', 'fgsdfh', 1, NULL),
(149, 2, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 0, '2015-04-15 16:09:06'),
(150, 2, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 0, '2015-04-15 16:09:30'),
(152, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(153, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(154, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(155, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(156, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(157, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(158, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(159, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(160, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(161, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(162, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(163, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(164, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(165, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(166, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(167, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(168, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(169, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(170, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(171, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(172, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(173, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(174, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(175, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(176, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(177, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(178, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(179, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(180, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(181, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(182, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(183, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(184, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(185, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(186, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(187, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(188, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(189, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(190, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(191, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(192, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(193, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(194, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(195, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(196, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(197, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(198, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(199, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(200, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(201, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(202, 1, 2, 24, 'test', '2015-04-14 22:00:33', 'fgsdfh', 1, NULL),
(205, 1, 2, 4, 'uae', '2015-04-25 07:39:41', 'uae from ksa', 0, '2015-04-25 07:40:26'),
(206, 1, 2, 4, 'new item', '2015-04-25 07:44:40', 'new item create by me', 1, NULL),
(207, 1, 2, 4, 'oman', '2015-04-25 07:50:09', 'oman', 1, NULL),
(208, 1, 2, 4, 'gh gh', '2015-04-25 07:52:20', 'text text text text text ', 1, '2015-04-30 16:44:44'),
(209, 2, 2, 4, 'تطبيق إيثار', '2015-04-25 07:53:51', 'تم إنشاء هذا التطبيق بواسطة طلاب تطوير البرمجيات في صور', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_comment`
--

CREATE TABLE IF NOT EXISTS `item_comment` (
`itemcomment_id` int(11) NOT NULL,
  `itemcomment_item_id` int(11) NOT NULL,
  `itemcomment_user_id` int(11) NOT NULL,
  `itemcomment_text` text NOT NULL,
  `itemcomment_add_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_comment`
--

INSERT INTO `item_comment` (`itemcomment_id`, `itemcomment_item_id`, `itemcomment_user_id`, `itemcomment_text`, `itemcomment_add_date`) VALUES
(74, 209, 1, 'comments comments comments comments comments comments comments comments comments ', '2015-04-25 08:33:48');

-- --------------------------------------------------------

--
-- Table structure for table `item_image`
--

CREATE TABLE IF NOT EXISTS `item_image` (
`id_item_image` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `image_title` varchar(40) NOT NULL,
  `image_path` varchar(60) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_image`
--

INSERT INTO `item_image` (`id_item_image`, `item_id`, `image_title`, `image_path`) VALUES
(7, 208, 'b47271cd7a8116fcc5be5d1ed6ae188a.PNG', '../uploadsimages/'),
(8, 209, 'ffb95d9ff2c0d2470b2e5071879fb1e0.PNG', '../uploadsimages/'),
(9, 209, '8295fa79f30c2e663f6abc2ebde674c8.PNG', '../uploadsimages/'),
(10, 209, 'a90c6ace23f2e7f1bf2c73e0c2810167.PNG', '../uploadsimages/'),
(11, 209, '8da42305857c1b5db13c892da5c1a14b.PNG', '../uploadsimages/'),
(12, 209, '1c548f5ebec85b57bb7ebac9b0dd8431.PNG', '../uploadsimages/');

-- --------------------------------------------------------

--
-- Table structure for table `item_type`
--

CREATE TABLE IF NOT EXISTS `item_type` (
`itemtype_id` int(11) NOT NULL,
  `itemtype_name` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_type`
--

INSERT INTO `item_type` (`itemtype_id`, `itemtype_name`) VALUES
(1, 'weapon'),
(2, 'Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
`lang_id` int(11) NOT NULL,
  `lang_name` varchar(45) DEFAULT NULL,
  `lang_shortcut` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`lang_id`, `lang_name`, `lang_shortcut`) VALUES
(1, 'arabic', 'ar'),
(2, 'english', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE IF NOT EXISTS `place` (
`place_id` int(11) NOT NULL,
  `place_type` int(11) NOT NULL,
  `place_name` varchar(45) NOT NULL,
  `address` varchar(132) DEFAULT NULL,
  `place_location_lat` float DEFAULT NULL,
  `place_location_lng` float DEFAULT NULL,
  `place_admin_creator` int(11) NOT NULL,
  `view` int(1) NOT NULL DEFAULT '1',
  `description` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`place_id`, `place_type`, `place_name`, `address`, `place_location_lat`, `place_location_lng`, `place_admin_creator`, `view`, `description`, `create_date`, `last_update`) VALUES
(4, 3, 'place test 101', 'oman 101', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:43:56', '2015-04-14 21:48:44'),
(5, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:04', '2015-04-14 21:44:04'),
(6, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(7, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(8, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(9, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(10, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(11, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(12, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(13, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(14, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(15, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(16, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(17, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(18, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(19, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(20, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(21, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(22, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(23, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(24, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(25, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(26, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(27, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(28, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(29, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(30, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(31, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(32, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:05', '2015-04-14 21:44:05'),
(33, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(34, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(35, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(36, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(37, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(38, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(39, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(40, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(41, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(42, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(43, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(44, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(45, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(46, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(47, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(48, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(49, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(50, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(51, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(52, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(53, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(54, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(55, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(56, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(57, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(58, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(59, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(60, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:44:25', '2015-04-14 21:44:25'),
(61, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:27', '2015-04-14 21:45:27'),
(62, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:27', '2015-04-14 21:45:27'),
(63, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:27', '2015-04-14 21:45:27'),
(64, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:27', '2015-04-14 21:45:27'),
(65, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:27', '2015-04-14 21:45:27'),
(66, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:27', '2015-04-14 21:45:27'),
(67, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:28', '2015-04-14 21:45:28'),
(68, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:28', '2015-04-14 21:45:28'),
(69, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:28', '2015-04-14 21:45:28'),
(70, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:28', '2015-04-14 21:45:28'),
(71, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:28', '2015-04-14 21:45:28'),
(72, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:28', '2015-04-14 21:45:28'),
(73, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:28', '2015-04-14 21:45:28'),
(74, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:28', '2015-04-14 21:45:28'),
(75, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:28', '2015-04-14 21:45:28'),
(76, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:28', '2015-04-14 21:45:28'),
(77, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:28', '2015-04-14 21:45:28'),
(78, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:28', '2015-04-14 21:45:28'),
(79, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:28', '2015-04-14 21:45:28'),
(80, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:28', '2015-04-14 21:45:28'),
(81, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:28', '2015-04-14 21:45:28'),
(82, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:28', '2015-04-14 21:45:28'),
(83, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:28', '2015-04-14 21:45:28'),
(84, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:28', '2015-04-14 21:45:28'),
(85, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:28', '2015-04-14 21:45:28'),
(86, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:28', '2015-04-14 21:45:28'),
(87, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:28', '2015-04-14 21:45:28'),
(88, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:45:28', '2015-04-14 21:45:28'),
(89, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:46:25', '2015-04-14 21:46:25'),
(90, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:46:25', '2015-04-14 21:46:25'),
(91, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:46:25', '2015-04-14 21:46:25'),
(92, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:46:25', '2015-04-14 21:46:25'),
(93, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:46:25', '2015-04-14 21:46:25'),
(94, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:46:25', '2015-04-14 21:46:25'),
(95, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:46:25', '2015-04-14 21:46:25'),
(96, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:46:25', '2015-04-14 21:46:25'),
(97, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:46:25', '2015-04-14 21:46:25'),
(98, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:46:25', '2015-04-14 21:46:25'),
(99, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:46:25', '2015-04-14 21:46:25'),
(100, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:46:25', '2015-04-14 21:46:25'),
(101, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:46:25', '2015-04-14 21:46:25'),
(102, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:46:25', '2015-04-14 21:46:25'),
(104, 3, 'place test ', 'oman', 454578, 7878710, 2, 1, 'fsvtgegbtrbr t reb', '2015-04-14 21:46:39', '2015-04-14 21:46:39'),
(105, 3, 'almehuar', 'Izke', 22.9451, 57.7594, 2, 1, 'بلدية إزكي', '2015-04-25 07:36:39', '2015-04-25 07:36:39'),
(106, 3, 'gheith', 'gheith', 22.5623, 59.4724, 2, 1, 'bnn ', '2015-04-30 16:39:12', '2015-04-30 16:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `place_type`
--

CREATE TABLE IF NOT EXISTS `place_type` (
`place_id` int(11) NOT NULL,
  `place_name` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `place_type`
--

INSERT INTO `place_type` (`place_id`, `place_name`) VALUES
(3, 'museum'),
(4, 'fort');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
`service_id` int(11) NOT NULL,
  `service_type` int(11) NOT NULL,
  `service_user_id` int(11) NOT NULL,
  `service_admin_add` int(11) NOT NULL,
  `service_location` varchar(45) DEFAULT NULL,
  `service_desc` text,
  `service_add_date` timestamp NULL DEFAULT NULL,
  `service_rate` int(11) DEFAULT NULL,
  `service_title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `service_request`
--

CREATE TABLE IF NOT EXISTS `service_request` (
`servicerequest_id` int(11) NOT NULL,
  `servicerequest_title` varchar(250) NOT NULL,
  `servicerequest_type` int(11) NOT NULL,
  `servicerequest_user_id` int(11) NOT NULL,
  `servicerequest_location_lat` float NOT NULL,
  `servicerequest_location_lang` float NOT NULL,
  `servicerequest_desc` text NOT NULL,
  `servicerequest_add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_request`
--

INSERT INTO `service_request` (`servicerequest_id`, `servicerequest_title`, `servicerequest_type`, `servicerequest_user_id`, `servicerequest_location_lat`, `servicerequest_location_lang`, `servicerequest_desc`, `servicerequest_add_date`) VALUES
(1, 'Alafia ', 2, 50, 10.5979, 10.5945, 'hgyghg yutyu'' ygyty ty ghj', '2015-04-30 10:44:40');

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE IF NOT EXISTS `service_type` (
`servicetype_id` int(11) NOT NULL,
  `servicetype_name` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_type`
--

INSERT INTO `service_type` (`servicetype_id`, `servicetype_name`) VALUES
(1, 'market'),
(2, 'resturant');

-- --------------------------------------------------------

--
-- Table structure for table `share_area`
--

CREATE TABLE IF NOT EXISTS `share_area` (
`sharearea_id` int(11) NOT NULL,
  `sharearea_text` text,
  `sharearea_user_id` int(11) NOT NULL,
  `sharearea_image` longblob,
  `sharearea_add_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sharearea_location` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `share_comment`
--

CREATE TABLE IF NOT EXISTS `share_comment` (
`sharecomm_id` int(11) NOT NULL,
  `sharecomm_sharearea_id` int(11) DEFAULT NULL,
  `sharecomm_user_id` int(11) NOT NULL,
  `sharecomm_add_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sharecomm_text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `user_password` varchar(160) NOT NULL,
  `user_lang` int(11) NOT NULL,
  `user_email` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_lang`, `user_email`) VALUES
(1, 'gheith', 'hamood', 1, 'ali');

-- --------------------------------------------------------

--
-- Table structure for table `user_service`
--

CREATE TABLE IF NOT EXISTS `user_service` (
`useservice_id` int(11) NOT NULL,
  `useservice_name` varchar(45) DEFAULT NULL,
  `useservice_email` varchar(45) DEFAULT NULL,
  `useservice_phone` varchar(45) DEFAULT NULL,
  `useservice_password` varchar(65) DEFAULT NULL,
  `useservice_add_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `positive_evaluation` int(11) NOT NULL DEFAULT '0',
  `negative_evaluation` int(11) NOT NULL DEFAULT '0',
  `account_status` varchar(2) NOT NULL DEFAULT '0' COMMENT 'if 0 mean is not block .. 1 it is block'
) ENGINE=InnoDB AUTO_INCREMENT=250 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_service`
--

INSERT INTO `user_service` (`useservice_id`, `useservice_name`, `useservice_email`, `useservice_phone`, `useservice_password`, `useservice_add_date`, `positive_evaluation`, `negative_evaluation`, `account_status`) VALUES
(1, 'Khalide bin salim bin mohammed Algabri', '2010493122@gmail.com', '98752879', '$2y$10$wgYiFMgESJMdOG23G43mH.GSdJPEAHRF7GGG7FcQzulX2msYDZ7rG', '2015-04-29 22:37:53', 14, 2, '0'),
(2, 'jalal sami sultan', 'omanlover@gmail.com', '98758978', '45454545', '2015-04-29 22:37:53', 0, 0, '0'),
(25, 'hatim hamood alhadrmi', 'zzzzzzz@gmail.com', '25393125', '$2y$10$FtR55UA23oQB3963xgN55uGlWiUVW2H2dprHxlHAnulTQc5liTpLi', '2015-04-29 22:37:53', 0, 0, '1'),
(26, 'fatek almohamdi', 'lover5@gmail.com', '94879682', '45454545', '2015-04-29 22:37:53', 0, 0, '0'),
(27, 'kamel said ', 'kamel51@gmail.com', '12345678', '45454545', '2015-04-29 22:37:53', 0, 0, '0'),
(28, 'Ahmed mansour ', 'omanman@gmail.com', '12345678', '45454545', '2015-04-29 22:37:53', 0, 0, '0'),
(49, 'naser sultan alrawahi', 'naser90@gmail.com', '98258791', '45454545', '2015-04-29 22:37:53', 0, 0, '0'),
(50, 'user name 0', '0usermail@gmail.com', '5454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(51, 'user name 1', '1usermail@gmail.com', '15454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(52, 'user name 2', '2usermail@gmail.com', '25454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(53, 'user name 3', '3usermail@gmail.com', '35454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(54, 'user name 4', '4usermail@gmail.com', '45454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(55, 'user name 5', '5usermail@gmail.com', '55454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(56, 'user name 6', '6usermail@gmail.com', '65454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(58, 'user name 8', '8usermail@gmail.com', '85454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(60, 'user name 10', '10usermail@gmail.com', '105454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(61, 'user name 11', '11usermail@gmail.com', '115454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(62, 'user name 12', '12usermail@gmail.com', '125454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(63, 'user name 13', '13usermail@gmail.com', '135454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(64, 'user name 14', '14usermail@gmail.com', '145454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(65, 'user name 15', '15usermail@gmail.com', '155454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(66, 'user name 16', '16usermail@gmail.com', '165454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(67, 'user name 17', '17usermail@gmail.com', '175454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(68, 'user name 18', '18usermail@gmail.com', '185454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(69, 'user name 19', '19usermail@gmail.com', '195454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(70, 'user name 20', '20usermail@gmail.com', '205454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(71, 'user name 21', '21usermail@gmail.com', '215454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(72, 'user name 22', '22usermail@gmail.com', '225454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(73, 'user name 23', '23usermail@gmail.com', '235454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(74, 'user name 24', '24usermail@gmail.com', '245454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(75, 'user name 25', '25usermail@gmail.com', '255454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(76, 'user name 26', '26usermail@gmail.com', '265454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(77, 'user name 27', '27usermail@gmail.com', '275454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(78, 'user name 28', '28usermail@gmail.com', '285454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(79, 'user name 29', '29usermail@gmail.com', '295454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(80, 'user name 30', '30usermail@gmail.com', '305454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(81, 'user name 31', '31usermail@gmail.com', '315454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(82, 'user name 32', '32usermail@gmail.com', '325454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(83, 'user name 33', '33usermail@gmail.com', '335454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(84, 'user name 34', '34usermail@gmail.com', '345454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(85, 'user name 35', '35usermail@gmail.com', '355454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(86, 'user name 36', '36usermail@gmail.com', '365454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(87, 'user name 37', '37usermail@gmail.com', '375454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(88, 'user name 38', '38usermail@gmail.com', '385454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(89, 'user name 39', '39usermail@gmail.com', '395454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(90, 'user name 40', '40usermail@gmail.com', '405454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(91, 'user name 41', '41usermail@gmail.com', '415454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(92, 'user name 42', '42usermail@gmail.com', '425454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(93, 'user name 43', '43usermail@gmail.com', '435454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(94, 'user name 44', '44usermail@gmail.com', '445454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(95, 'user name 45', '45usermail@gmail.com', '455454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(96, 'user name 46', '46usermail@gmail.com', '465454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(97, 'user name 47', '47usermail@gmail.com', '475454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(98, 'user name 48', '48usermail@gmail.com', '485454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(99, 'user name 49', '49usermail@gmail.com', '495454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(100, 'user name 50', '50usermail@gmail.com', '505454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(101, 'user name 51', '51usermail@gmail.com', '515454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(102, 'user name 52', '52usermail@gmail.com', '525454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(103, 'user name 53', '53usermail@gmail.com', '535454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(104, 'user name 54', '54usermail@gmail.com', '545454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(105, 'user name 55', '55usermail@gmail.com', '555454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(106, 'user name 56', '56usermail@gmail.com', '565454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(107, 'user name 57', '57usermail@gmail.com', '575454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(108, 'user name 58', '58usermail@gmail.com', '585454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(109, 'user name 59', '59usermail@gmail.com', '595454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(110, 'user name 60', '60usermail@gmail.com', '605454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(111, 'user name 61', '61usermail@gmail.com', '615454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(112, 'user name 62', '62usermail@gmail.com', '625454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(113, 'user name 63', '63usermail@gmail.com', '635454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(114, 'user name 64', '64usermail@gmail.com', '645454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(115, 'user name 65', '65usermail@gmail.com', '655454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(116, 'user name 66', '66usermail@gmail.com', '665454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(117, 'user name 67', '67usermail@gmail.com', '675454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(118, 'user name 68', '68usermail@gmail.com', '685454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(119, 'user name 69', '69usermail@gmail.com', '695454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(120, 'user name 70', '70usermail@gmail.com', '705454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(121, 'user name 71', '71usermail@gmail.com', '715454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(122, 'user name 72', '72usermail@gmail.com', '725454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(123, 'user name 73', '73usermail@gmail.com', '735454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(124, 'user name 74', '74usermail@gmail.com', '745454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(125, 'user name 75', '75usermail@gmail.com', '755454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(126, 'user name 76', '76usermail@gmail.com', '765454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(127, 'user name 77', '77usermail@gmail.com', '775454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(128, 'user name 78', '78usermail@gmail.com', '785454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(129, 'user name 79', '79usermail@gmail.com', '795454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(130, 'user name 80', '80usermail@gmail.com', '805454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(131, 'user name 81', '81usermail@gmail.com', '815454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(132, 'user name 82', '82usermail@gmail.com', '825454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(133, 'user name 83', '83usermail@gmail.com', '835454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(134, 'user name 84', '84usermail@gmail.com', '845454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(135, 'user name 85', '85usermail@gmail.com', '855454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(136, 'user name 86', '86usermail@gmail.com', '865454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(137, 'user name 87', '87usermail@gmail.com', '875454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(138, 'user name 88', '88usermail@gmail.com', '885454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(139, 'user name 89', '89usermail@gmail.com', '895454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(140, 'user name 90', '90usermail@gmail.com', '905454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(141, 'user name 91', '91usermail@gmail.com', '915454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(142, 'user name 92', '92usermail@gmail.com', '925454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(143, 'user name 93', '93usermail@gmail.com', '935454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(144, 'user name 94', '94usermail@gmail.com', '945454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(146, 'user name 96', '96usermail@gmail.com', '965454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(147, 'user name 97', '97usermail@gmail.com', '975454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(148, 'user name 98', '98usermail@gmail.com', '985454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(149, 'gheith alrawahi', '99usermail@gmail.com', '995454455', '12345', '2015-04-29 22:37:53', 0, 0, '0'),
(150, 'user name 100', '100usermail@gmail.com', '1005454455', '12345', '2015-04-30 22:37:53', 0, 0, '1'),
(151, 'user name 101', '101usermail@gmail.com', '1015454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(152, 'user name 102', '102usermail@gmail.com', '1025454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(153, 'user name 103', '103usermail@gmail.com', '1035454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(154, 'user name 104', '104usermail@gmail.com', '1045454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(155, 'user name 105', '105usermail@gmail.com', '1055454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(156, 'user name 106', '106usermail@gmail.com', '1065454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(157, 'user name 107', '107usermail@gmail.com', '1075454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(158, 'user name 108', '108usermail@gmail.com', '1085454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(159, 'user name 109', '109usermail@gmail.com', '1095454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(160, 'user name 110', '110usermail@gmail.com', '1105454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(161, 'user name 111', '111usermail@gmail.com', '1115454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(162, 'user name 112', '112usermail@gmail.com', '1125454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(163, 'user name 113', '113usermail@gmail.com', '1135454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(164, 'user name 114', '114usermail@gmail.com', '1145454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(165, 'user name 115', '115usermail@gmail.com', '1155454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(166, 'user name 116', '116usermail@gmail.com', '1165454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(167, 'user name 117', '117usermail@gmail.com', '1175454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(168, 'user name 118', '118usermail@gmail.com', '1185454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(169, 'user name 119', '119usermail@gmail.com', '1195454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(170, 'user name 120', '120usermail@gmail.com', '1205454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(171, 'user name 121', '121usermail@gmail.com', '1215454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(172, 'user name 122', '122usermail@gmail.com', '1225454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(173, 'user name 123', '123usermail@gmail.com', '1235454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(174, 'user name 124', '124usermail@gmail.com', '1245454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(175, 'user name 125', '125usermail@gmail.com', '1255454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(176, 'user name 126', '126usermail@gmail.com', '1265454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(177, 'user name 127', '127usermail@gmail.com', '1275454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(178, 'user name 128', '128usermail@gmail.com', '1285454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(179, 'user name 129', '129usermail@gmail.com', '1295454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(180, 'user name 130', '130usermail@gmail.com', '1305454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(181, 'user name 131', '131usermail@gmail.com', '1315454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(182, 'user name 132', '132usermail@gmail.com', '1325454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(183, 'user name 133', '133usermail@gmail.com', '1335454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(184, 'user name 134', '134usermail@gmail.com', '1345454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(185, 'user name 135', '135usermail@gmail.com', '1355454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(186, 'user name 136', '136usermail@gmail.com', '1365454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(187, 'user name 137', '137usermail@gmail.com', '1375454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(188, 'user name 138', '138usermail@gmail.com', '1385454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(189, 'user name 139', '139usermail@gmail.com', '1395454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(190, 'user name 140', '140usermail@gmail.com', '1405454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(191, 'user name 141', '141usermail@gmail.com', '1415454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(192, 'user name 142', '142usermail@gmail.com', '1425454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(193, 'user name 143', '143usermail@gmail.com', '1435454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(194, 'user name 144', '144usermail@gmail.com', '1445454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(195, 'user name 145', '145usermail@gmail.com', '1455454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(196, 'user name 146', '146usermail@gmail.com', '1465454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(197, 'user name 147', '147usermail@gmail.com', '1475454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(198, 'user name 148', '148usermail@gmail.com', '1485454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(199, 'user name 149', '149usermail@gmail.com', '1495454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(200, 'user name 150', '150usermail@gmail.com', '1505454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(201, 'user name 151', '151usermail@gmail.com', '1515454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(202, 'user name 152', '152usermail@gmail.com', '1525454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(203, 'user name 153', '153usermail@gmail.com', '1535454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(204, 'user name 154', '154usermail@gmail.com', '1545454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(205, 'user name 155', '155usermail@gmail.com', '1555454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(206, 'user name 156', '156usermail@gmail.com', '1565454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(207, 'user name 157', '157usermail@gmail.com', '1575454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(208, 'user name 158', '158usermail@gmail.com', '1585454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(209, 'user name 159', '159usermail@gmail.com', '1595454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(210, 'user name 160', '160usermail@gmail.com', '1605454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(211, 'user name 161', '161usermail@gmail.com', '1615454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(212, 'user name 162', '162usermail@gmail.com', '1625454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(213, 'user name 163', '163usermail@gmail.com', '1635454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(214, 'user name 164', '164usermail@gmail.com', '1645454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(215, 'user name 165', '165usermail@gmail.com', '1655454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(216, 'user name 166', '166usermail@gmail.com', '1665454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(217, 'user name 167', '167usermail@gmail.com', '1675454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(218, 'user name 168', '168usermail@gmail.com', '1685454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(219, 'user name 169', '169usermail@gmail.com', '1695454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(220, 'user name 170', '170usermail@gmail.com', '1705454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(221, 'user name 171', '171usermail@gmail.com', '1715454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(222, 'user name 172', '172usermail@gmail.com', '1725454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(223, 'user name 173', '173usermail@gmail.com', '1735454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(224, 'user name 174', '174usermail@gmail.com', '1745454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(225, 'user name 175', '175usermail@gmail.com', '1755454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(226, 'user name 176', '176usermail@gmail.com', '1765454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(227, 'user name 177', '177usermail@gmail.com', '1775454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(228, 'user name 178', '178usermail@gmail.com', '1785454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(229, 'user name 179', '179usermail@gmail.com', '1795454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(230, 'user name 180', '180usermail@gmail.com', '1805454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(231, 'user name 181', '181usermail@gmail.com', '1815454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(232, 'user name 182', '182usermail@gmail.com', '1825454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(233, 'user name 183', '183usermail@gmail.com', '1835454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(234, 'user name 184', '184usermail@gmail.com', '1845454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(235, 'user name 185', '185usermail@gmail.com', '1855454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(236, 'user name 186', '186usermail@gmail.com', '1865454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(237, 'user name 187', '187usermail@gmail.com', '1875454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(238, 'user name 188', '188usermail@gmail.com', '1885454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(239, 'user name 189', '189usermail@gmail.com', '1895454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(240, 'user name 190', '190usermail@gmail.com', '1905454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(241, 'user name 191', '191usermail@gmail.com', '1915454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(242, 'user name 192', '192usermail@gmail.com', '1925454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(243, 'user name 193', '193usermail@gmail.com', '1935454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(244, 'user name 194', '194usermail@gmail.com', '1945454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(245, 'user name 195', '195usermail@gmail.com', '1955454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(246, 'user name 196', '196usermail@gmail.com', '1965454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(247, 'user name 197', '197usermail@gmail.com', '1975454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(248, 'user name 198', '198usermail@gmail.com', '1985454455', '12345', '2015-04-30 22:37:53', 0, 0, '0'),
(249, 'user name 199', '199usermail@gmail.com', '1995454455', '12345', '2015-04-30 22:37:53', 0, 0, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_report`
--
ALTER TABLE `action_report`
 ADD PRIMARY KEY (`id_action_report`,`admin`), ADD KEY `admin_id_key_idx` (`admin`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`,`admin_type`), ADD KEY `admintype_id_key_idx` (`admin_type`);

--
-- Indexes for table `admin_type`
--
ALTER TABLE `admin_type`
 ADD PRIMARY KEY (`admintype_id`);

--
-- Indexes for table `feadback`
--
ALTER TABLE `feadback`
 ADD PRIMARY KEY (`feadback_id`,`feadback_user_id`), ADD KEY `feadback_userid_key_idx` (`feadback_user_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
 ADD PRIMARY KEY (`item_id`,`item_type`,`item_place`,`item_admin_creator`), ADD KEY `item_place_key_idx` (`item_place`), ADD KEY `item_admin_key_idx` (`item_admin_creator`), ADD KEY `item_itemtype_key_idx` (`item_type`);

--
-- Indexes for table `item_comment`
--
ALTER TABLE `item_comment`
 ADD PRIMARY KEY (`itemcomment_id`,`itemcomment_item_id`,`itemcomment_user_id`), ADD KEY `item_id_key_idx` (`itemcomment_item_id`), ADD KEY `itemcomment_user_id_idx` (`itemcomment_user_id`);

--
-- Indexes for table `item_image`
--
ALTER TABLE `item_image`
 ADD PRIMARY KEY (`id_item_image`,`item_id`), ADD KEY `item_image_key_idx` (`item_id`);

--
-- Indexes for table `item_type`
--
ALTER TABLE `item_type`
 ADD PRIMARY KEY (`itemtype_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
 ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
 ADD PRIMARY KEY (`place_id`,`place_type`,`place_admin_creator`), ADD KEY `place_type_id_idx` (`place_type`), ADD KEY `place_admin_creator_id_idx` (`place_admin_creator`);

--
-- Indexes for table `place_type`
--
ALTER TABLE `place_type`
 ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
 ADD PRIMARY KEY (`service_id`,`service_type`,`service_admin_add`,`service_user_id`), ADD KEY `service_type_key_idx` (`service_type`), ADD KEY `service_admin_key_idx` (`service_admin_add`), ADD KEY `service_user_key_idx` (`service_user_id`);

--
-- Indexes for table `service_request`
--
ALTER TABLE `service_request`
 ADD PRIMARY KEY (`servicerequest_id`,`servicerequest_type`,`servicerequest_user_id`), ADD KEY `service_type_key_idx` (`servicerequest_type`), ADD KEY `service_user_key_idx` (`servicerequest_user_id`);

--
-- Indexes for table `service_type`
--
ALTER TABLE `service_type`
 ADD PRIMARY KEY (`servicetype_id`);

--
-- Indexes for table `share_area`
--
ALTER TABLE `share_area`
 ADD PRIMARY KEY (`sharearea_id`,`sharearea_user_id`), ADD KEY `sharearea_userid_key_idx` (`sharearea_user_id`);

--
-- Indexes for table `share_comment`
--
ALTER TABLE `share_comment`
 ADD PRIMARY KEY (`sharecomm_id`,`sharecomm_user_id`), ADD KEY `sharecomm_userid_key_idx` (`sharecomm_user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`,`user_lang`), ADD UNIQUE KEY `user_name_UNIQUE` (`user_name`), ADD KEY `user_lang_key_idx` (`user_lang`);

--
-- Indexes for table `user_service`
--
ALTER TABLE `user_service`
 ADD PRIMARY KEY (`useservice_id`), ADD UNIQUE KEY `useservice_email` (`useservice_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_report`
--
ALTER TABLE `action_report`
MODIFY `id_action_report` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admin_type`
--
ALTER TABLE `admin_type`
MODIFY `admintype_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `feadback`
--
ALTER TABLE `feadback`
MODIFY `feadback_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=210;
--
-- AUTO_INCREMENT for table `item_comment`
--
ALTER TABLE `item_comment`
MODIFY `itemcomment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `item_image`
--
ALTER TABLE `item_image`
MODIFY `id_item_image` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `item_type`
--
ALTER TABLE `item_type`
MODIFY `itemtype_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
MODIFY `lang_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `place_type`
--
ALTER TABLE `place_type`
MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service_request`
--
ALTER TABLE `service_request`
MODIFY `servicerequest_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `service_type`
--
ALTER TABLE `service_type`
MODIFY `servicetype_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `share_area`
--
ALTER TABLE `share_area`
MODIFY `sharearea_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `share_comment`
--
ALTER TABLE `share_comment`
MODIFY `sharecomm_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_service`
--
ALTER TABLE `user_service`
MODIFY `useservice_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=250;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `action_report`
--
ALTER TABLE `action_report`
ADD CONSTRAINT `admin_id_key` FOREIGN KEY (`admin`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
ADD CONSTRAINT `admintype_id_key` FOREIGN KEY (`admin_type`) REFERENCES `admin_type` (`admintype_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `feadback`
--
ALTER TABLE `feadback`
ADD CONSTRAINT `feadback_userid_key` FOREIGN KEY (`feadback_user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
ADD CONSTRAINT `item_admin_key` FOREIGN KEY (`item_admin_creator`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `item_itemtype_key` FOREIGN KEY (`item_type`) REFERENCES `item_type` (`itemtype_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `item_place_key` FOREIGN KEY (`item_place`) REFERENCES `place` (`place_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_comment`
--
ALTER TABLE `item_comment`
ADD CONSTRAINT `itemcomment_id_key` FOREIGN KEY (`itemcomment_item_id`) REFERENCES `item` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `itemcomment_user_id` FOREIGN KEY (`itemcomment_user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `item_image`
--
ALTER TABLE `item_image`
ADD CONSTRAINT `item_image_key` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `place`
--
ALTER TABLE `place`
ADD CONSTRAINT `place_admin_creator_id` FOREIGN KEY (`place_admin_creator`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `place_ibfk_1` FOREIGN KEY (`place_type`) REFERENCES `place_type` (`place_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `service`
--
ALTER TABLE `service`
ADD CONSTRAINT `service_admin_key` FOREIGN KEY (`service_admin_add`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`service_type`) REFERENCES `service_type` (`servicetype_id`),
ADD CONSTRAINT `service_user_key` FOREIGN KEY (`service_user_id`) REFERENCES `user_service` (`useservice_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `service_request`
--
ALTER TABLE `service_request`
ADD CONSTRAINT `service_request_ibfk_1` FOREIGN KEY (`servicerequest_type`) REFERENCES `service_type` (`servicetype_id`),
ADD CONSTRAINT `servicerequest_user_key` FOREIGN KEY (`servicerequest_user_id`) REFERENCES `user_service` (`useservice_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `share_area`
--
ALTER TABLE `share_area`
ADD CONSTRAINT `sharearea_userid_key` FOREIGN KEY (`sharearea_user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `share_comment`
--
ALTER TABLE `share_comment`
ADD CONSTRAINT `sharecomm_sharearea_id_key` FOREIGN KEY (`sharecomm_id`) REFERENCES `share_area` (`sharearea_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `sharecomm_userid_key` FOREIGN KEY (`sharecomm_user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `user_lang_key` FOREIGN KEY (`user_lang`) REFERENCES `language` (`lang_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
