-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 29, 2013 at 09:59 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci_webmanager`
--
CREATE DATABASE `ci_webmanager` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ci_webmanager`;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL DEFAULT '1',
  `name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `fee_with` int(11) DEFAULT NULL,
  `fee_without` int(11) DEFAULT NULL,
  `notes` text NOT NULL,
  `maxNumPeople` int(11) NOT NULL,
  `starttime` varchar(5) DEFAULT NULL,
  `endtime` varchar(5) DEFAULT NULL,
  `place` text NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `notes` (`notes`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `type`, `name`, `date`, `fee_with`, `fee_without`, `notes`, `maxNumPeople`, `starttime`, `endtime`, `place`) VALUES
(1, 1, 'Trip1', '2012-09-29', 3, 5, '', 30, '', '', ''),
(2, 1, 'Trip2', '2012-10-26', 42, 50, 'This is a not for the Trip2', 50, '', '', ''),
(3, 1, 'Trip3', '2013-10-24', 30, 40, '', 30, '', '', ''),
(4, 1, 'Event1', '2013-10-25', 43, 23, 'This is a note for the Event1', 0, '17:00', '20:00', 'Main square');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `student_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `paid` float NOT NULL,
  `notes` text NOT NULL,
  KEY `event_id` (`event_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`student_id`, `event_id`, `paid`, `notes`) VALUES
(1, 1, 5, 'Mono 34'),
(2, 1, 3, ''),
(3, 1, 3, ''),
(4, 1, 3, ''),
(1, 2, 50, ''),
(2, 2, 42, ''),
(3, 3, 30, ''),
(4, 3, 30, ''),
(1, 3, 40, '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `country` varchar(40) NOT NULL,
  `has_esncard` tinyint(4) NOT NULL,
  `section` enum('esn_auth','esn_uom','esn_ateith') NOT NULL,
  `type` enum('erasmus','esn') NOT NULL DEFAULT 'erasmus',
  `semester` varchar(9) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `Country` (`country`),
  KEY `has_esncard` (`has_esncard`,`section`),
  KEY `type` (`type`),
  KEY `semester` (`semester`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=832 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `surname`, `email`, `phone`, `country`, `has_esncard`, `section`, `type`, `semester`) VALUES
(1, 'Sara', 'Sara', 'Sara.Sara@hotmail.es', '+301234567890', 'Spain', 0, 'esn_auth', 'erasmus', '2012-13_a'),
(2, 'Canan', 'Canan', 'canan.Canan@hotmail.com', '+301234567890', 'Turkey', 1, 'esn_auth', 'erasmus', '2012-13_a'),
(3, 'Farina', 'Farina', 'farina.Farina@hotmail.de', '+301234567890', 'Germany', 1, 'esn_ateith', 'erasmus', '2012-13_a'),
(4, 'Isabel', 'Isabel', 'Isabel.Isabel@hotmail.com', '+301234567890', 'Spain', 1, 'esn_uom', 'erasmus', '2012-13_a');


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
