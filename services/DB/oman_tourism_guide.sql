-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2015 at 07:40 PM
-- Server version: 5.6.20
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
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` int(11) NOT NULL,
  `admin_type` int(11) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_name` varchar(45) NOT NULL,
  `admin_password` varchar(65) NOT NULL,
  `admin_create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_type`, `admin_email`, `admin_name`, `admin_password`, `admin_create_date`) VALUES
(1, 1, 'ghak@gmail.com', 'gheith alrawahi', '$2y$10$47JmfnkqWNCETH513547bu0YwkZuaBCIhqmw.on32RBJEPOCOn0VO', '2015-02-25 14:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `admin_type`
--

CREATE TABLE IF NOT EXISTS `admin_type` (
`admintype_id` int(11) NOT NULL,
  `admintype_name` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_type`
--

INSERT INTO `admin_type` (`admintype_id`, `admintype_name`) VALUES
(1, 'root'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `feadback`
--

CREATE TABLE IF NOT EXISTS `feadback` (
`feadback_id` int(11) NOT NULL,
  `feadback_user_id` int(11) NOT NULL,
  `feadback_add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `feadback_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
`item_id` int(11) NOT NULL,
  `item_type` int(11) NOT NULL,
  `item_creator` int(11) NOT NULL,
  `item_place` int(11) NOT NULL,
  `item_name` varchar(45) NOT NULL,
  `item_add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `item_comment`
--

CREATE TABLE IF NOT EXISTS `item_comment` (
`itemcomment_id` int(11) NOT NULL,
  `itemcomment_item_id` int(11) NOT NULL,
  `itemcomment_user_id` int(11) NOT NULL,
  `itemcomment_text` text NOT NULL,
  `itemcomment_add_date` varchar(45) DEFAULT 'CURRENT_TIMESTAMP'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `item_type`
--

CREATE TABLE IF NOT EXISTS `item_type` (
`itemtype_id` int(11) NOT NULL,
  `itemtype_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
`lang_id` int(11) NOT NULL,
  `lang_name` varchar(45) DEFAULT NULL,
  `lang_shortcut` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`place_id`, `place_type`, `place_name`, `address`, `place_location_lat`, `place_location_lng`, `place_admin_creator`, `view`, `description`, `create_date`) VALUES
(24, 1, 'Sur', 'Sur cas', 50, 80, 1, 0, 'oman sur city', '2015-03-07 20:21:06'),
(25, 1, 'oman', 'oman', 120, 45, 1, 0, 'oman', '2015-03-07 20:21:06'),
(26, 1, 'sohar', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(27, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(28, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(29, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(30, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(31, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(32, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(33, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(34, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(35, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(36, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(37, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(38, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(39, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(40, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(41, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(42, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(43, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(44, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(45, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(46, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(47, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(48, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(49, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(50, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(51, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(52, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(53, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(54, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(55, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(56, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(57, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(58, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(59, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(60, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(61, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(62, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(63, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(64, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(65, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(66, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(67, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(68, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(69, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(70, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(71, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(72, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(73, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(74, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(75, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(76, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(77, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(78, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(79, 1, 'gheith', 'oman', 5025, 10.36, 1, 1, 'ghjh', '2015-03-07 20:21:06'),
(80, 1, 'gh', 'thr', 54, 54, 1, 1, 'hgd', '2015-03-07 20:21:06'),
(81, 1, 'gh', 'gf', 56, 89, 1, 0, 'bncfcgchg', '2015-03-07 20:21:06'),
(82, 1, 'hg', 'hgg', 65, 65, 1, 1, 'hgcf', '2015-03-07 20:21:06'),
(83, 1, 'ghhg', 'ghgh', 545, 4545, 1, 0, 'errere', '2015-04-03 13:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `place_type`
--

CREATE TABLE IF NOT EXISTS `place_type` (
`place_id` int(11) NOT NULL,
  `place_name` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `place_type`
--

INSERT INTO `place_type` (`place_id`, `place_name`) VALUES
(1, 'Sur CAS'),
(2, 'Ibri CAS');

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
  `service_rate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `service_request`
--

CREATE TABLE IF NOT EXISTS `service_request` (
`servicerequest_id` int(11) NOT NULL,
  `servicerequest_type` int(11) NOT NULL,
  `servicerequest_user_id` int(11) NOT NULL,
  `servicerequest__location` varchar(45) NOT NULL,
  `servicerequest_desc` text NOT NULL,
  `servicerequest_add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE IF NOT EXISTS `service_type` (
  `servicetype_id` int(11) NOT NULL,
  `servicetype_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_service`
--

CREATE TABLE IF NOT EXISTS `user_service` (
`useservice_id` int(11) NOT NULL,
  `useservice_name` varchar(45) DEFAULT NULL,
  `useservice_email` varchar(45) DEFAULT NULL,
  `useservice_phone` varchar(45) DEFAULT NULL,
  `useservice_password` varchar(45) DEFAULT NULL,
  `useservice_add_date` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

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
 ADD PRIMARY KEY (`item_id`,`item_place`,`item_creator`), ADD KEY `item_place_key_idx` (`item_place`), ADD KEY `item_admin_key_idx` (`item_creator`);

--
-- Indexes for table `item_comment`
--
ALTER TABLE `item_comment`
 ADD PRIMARY KEY (`itemcomment_id`,`itemcomment_item_id`,`itemcomment_user_id`), ADD KEY `item_id_key_idx` (`itemcomment_item_id`), ADD KEY `itemcomment_user_id_idx` (`itemcomment_user_id`);

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
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `user_name_UNIQUE` (`user_name`);

--
-- Indexes for table `user_service`
--
ALTER TABLE `user_service`
 ADD PRIMARY KEY (`useservice_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin_type`
--
ALTER TABLE `admin_type`
MODIFY `admintype_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `feadback`
--
ALTER TABLE `feadback`
MODIFY `feadback_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_comment`
--
ALTER TABLE `item_comment`
MODIFY `itemcomment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_type`
--
ALTER TABLE `item_type`
MODIFY `itemtype_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
MODIFY `lang_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `place_type`
--
ALTER TABLE `place_type`
MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service_request`
--
ALTER TABLE `service_request`
MODIFY `servicerequest_id` int(11) NOT NULL AUTO_INCREMENT;
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
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_service`
--
ALTER TABLE `user_service`
MODIFY `useservice_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

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
ADD CONSTRAINT `item_admin_key` FOREIGN KEY (`item_creator`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `item_itemtype_id_key` FOREIGN KEY (`item_id`) REFERENCES `item_type` (`itemtype_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `item_place_key` FOREIGN KEY (`item_place`) REFERENCES `place` (`place_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `item_comment`
--
ALTER TABLE `item_comment`
ADD CONSTRAINT `itemcomment_id_key` FOREIGN KEY (`itemcomment_item_id`) REFERENCES `item` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `itemcomment_user_id` FOREIGN KEY (`itemcomment_user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
ADD CONSTRAINT `service_type_key` FOREIGN KEY (`service_type`) REFERENCES `service_type` (`servicetype_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `service_user_key` FOREIGN KEY (`service_user_id`) REFERENCES `user_service` (`useservice_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `service_request`
--
ALTER TABLE `service_request`
ADD CONSTRAINT `servicerequest_type_key` FOREIGN KEY (`servicerequest_type`) REFERENCES `service_type` (`servicetype_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `servicerequest_user_key` FOREIGN KEY (`servicerequest_user_id`) REFERENCES `user_service` (`useservice_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `share_area`
--
ALTER TABLE `share_area`
ADD CONSTRAINT `sharearea_userid_key` FOREIGN KEY (`sharearea_user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
ADD CONSTRAINT `lang_id_key` FOREIGN KEY (`user_id`) REFERENCES `language` (`lang_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
