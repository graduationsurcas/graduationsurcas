-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2015 at 01:06 PM
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
(2, 3, 'ghak@gmail.com', 'Ghak', '$2y$10$r35YNHfte51UlgvEavJpBu.9eUtDL98l2yn8GRP4d31JShUJlpOoq', '2015-04-08 13:16:55');

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
  `status_view` int(11) NOT NULL DEFAULT '1' COMMENT '1 is disaplay for all\n0 is no'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_type`, `item_admin_creator`, `item_place`, `item_name`, `item_add_date`, `item_description`, `status_view`) VALUES
(21, 1, 2, 153, 'cannons', '2015-04-10 22:03:20', 'Two cannons guard the entrance to the fort which opens into a maze of rooms, high-ceilinged halls, doorways, terraces, narrow staircases and corridors. Four cannons remain on the tower''s top, down from a total of 24, which once served as the fort’s main firepower.', 1),
(22, 1, 2, 153, 'ghak', '2015-04-11 10:47:21', 'gh', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item_image`
--

CREATE TABLE IF NOT EXISTS `item_image` (
`id_item_image` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `image_title` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_image`
--

INSERT INTO `item_image` (`id_item_image`, `item_id`, `image_title`) VALUES
(14, 21, '11d1efb6c93fbc6c95b080ab8fcc4344.JPG'),
(17, 21, '11d1efb6c93fbc6c95b080ab8fcc4346.JPG'),
(18, 21, '11d1efb6c93fbc6c95b080ab8fcc4345.JPG'),
(19, 22, '796ac0139661c9f88a53d67339873cd3.jpg');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`place_id`, `place_type`, `place_name`, `address`, `place_location_lat`, `place_location_lng`, `place_admin_creator`, `view`, `description`, `create_date`, `last_update`) VALUES
(153, 3, 'Nizw', 'Al dakhlia', 22.9333, 57.5302, 2, 1, 'It was built in the 1650s by the second Ya’rubi Imam; Imam Sultan Bin Saif Al Ya''rubi,[1] although its underlying structure goes back to the 12th Century.[2] It is Oman''s most visited national monument. The fort was the administrative seat of authority for the presiding Imams and Walis in times of peace and conflict.[3] The main bulk of the fort took about 12 years to complete[1] and was built above an underground stream. The fort is a powerful reminder of the town''s significance through turbulent periods in Oman''s long history. It was a formidable stronghold against raiding forces that desired Nizwa''s abundant natural wealth and its strategic location at the crossroads of vital routes.', '2015-04-08 13:20:26', '2015-04-08 13:20:26');

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
  `service_rate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `item_comment`
--
ALTER TABLE `item_comment`
MODIFY `itemcomment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_image`
--
ALTER TABLE `item_image`
MODIFY `id_item_image` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `item_type`
--
ALTER TABLE `item_type`
MODIFY `itemtype_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
MODIFY `lang_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=154;
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
ADD CONSTRAINT `lang_id_key` FOREIGN KEY (`user_id`) REFERENCES `language` (`lang_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
