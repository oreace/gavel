-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2017 at 06:33 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gavel`
--

-- --------------------------------------------------------

--
-- Table structure for table `g_blog`
--

CREATE TABLE IF NOT EXISTS `g_blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `post` text NOT NULL,
  `img` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `g_cause_listing`
--

CREATE TABLE IF NOT EXISTS `g_cause_listing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(30) NOT NULL,
  `cause_title` varchar(50) NOT NULL,
  `court_name` varchar(50) DEFAULT NULL,
  `suit_no` varchar(30) DEFAULT NULL,
  `location` text NOT NULL,
  `casetime` datetime NOT NULL,
  `timeposted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `g_cause_listing`
--

INSERT INTO `g_cause_listing` (`id`, `user_id`, `cause_title`, `court_name`, `suit_no`, `location`, `casetime`, `timeposted`) VALUES
(1, 'admin@demo.com', 'James vs Jones', 'Opopo High Court', 'Room 5', 'Somewhere Legal', '2017-06-23 10:00:00', '2017-06-12 15:23:52');

-- --------------------------------------------------------

--
-- Table structure for table `g_court`
--

CREATE TABLE IF NOT EXISTS `g_court` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_of_court` text NOT NULL,
  `type_of_court` varchar(50) NOT NULL,
  `location` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `g_forum_poll`
--

CREATE TABLE IF NOT EXISTS `g_forum_poll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `timeposted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `g_forum_poll`
--

INSERT INTO `g_forum_poll` (`id`, `user_id`, `type`, `forum_id`, `timeposted`) VALUES
(1, 'admin@demo.com', 'like', 9, '2017-06-09 14:27:35'),
(2, 'admin@demo.com', 'like', 1, '2017-06-09 14:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `g_forum_post`
--

CREATE TABLE IF NOT EXISTS `g_forum_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(30) NOT NULL,
  `post_text` text NOT NULL,
  `post_content` text,
  `timeposted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `g_forum_post`
--

INSERT INTO `g_forum_post` (`id`, `user_id`, `post_text`, `post_content`, `timeposted`) VALUES
(1, 'admin@demo.com', 'Im tired', 'ad1496939530.jpg', '2017-06-08 16:32:09'),
(2, 'admin@demo.com', 'I''m going insane', 'ad1496939592.PNG', '2017-06-08 16:33:11'),
(3, 'admin@demo.com', 'Working OK', 'ad1496939658.jpg', '2017-06-08 16:34:17'),
(4, 'admin@demo.com', 'Ok', 'ad1496939758.jpg', '2017-06-08 16:35:57'),
(5, 'admin@demo.com', 'KKK', 'ad1496939832.pdf', '2017-06-08 16:37:12'),
(6, 'admin@demo.com', 'dsfsdsd', 'ad1496940086.jpg', '2017-06-08 16:41:25'),
(7, 'admin@demo.com', 'Ok Again', 'ad1497000379.jpg', '2017-06-09 09:26:18'),
(8, 'admin@demo.com', 'whay', 'ad1497000455.jpg', '2017-06-09 09:27:34'),
(9, 'admin@demo.com', 'Ermmmmmmmmmm', 'ad1497000599.PNG', '2017-06-09 09:29:58'),
(10, 'admin@dmeo.com', 'Without login', '1497268567.jpg', '2017-06-12 11:56:07');

-- --------------------------------------------------------

--
-- Table structure for table `g_forum_post_comment`
--

CREATE TABLE IF NOT EXISTS `g_forum_post_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `timeposted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `g_judgement_analy`
--

CREATE TABLE IF NOT EXISTS `g_judgement_analy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_text` text,
  `post_content` text,
  `timeposted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `g_judgement_analy_post_comment`
--

CREATE TABLE IF NOT EXISTS `g_judgement_analy_post_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `timeposted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `g_mentorship`
--

CREATE TABLE IF NOT EXISTS `g_mentorship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `dateposted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `g_mentorship_post`
--

CREATE TABLE IF NOT EXISTS `g_mentorship_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` enum('yes','no') NOT NULL DEFAULT 'no',
  `dateposted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `g_opinion`
--

CREATE TABLE IF NOT EXISTS `g_opinion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `opinion` text NOT NULL,
  `dateposted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `g_opinion_poll`
--

CREATE TABLE IF NOT EXISTS `g_opinion_poll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `opinion_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `poll` enum('agree','disagree') NOT NULL,
  `dateposted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `g_users`
--

CREATE TABLE IF NOT EXISTS `g_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(25) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `profession` varchar(20) NOT NULL,
  `proficiency` text,
  `area_of_expertise` text,
  `password` varchar(50) NOT NULL,
  `datereg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `g_users`
--

INSERT INTO `g_users` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `age`, `profession`, `proficiency`, `area_of_expertise`, `password`, `datereg`, `img`) VALUES
(1, 'Peter', 'Laniran', 'admin@demo.com', '08022331144', 23, 'IT Dude', 'Advanced', 'Web', '202cb962ac59075b964b07152d234b70', '2017-06-06 10:47:14', NULL),
(2, 'Peter', 'James', 'fred@gmail.com', NULL, NULL, 'Lawyer', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2017-06-07 16:30:24', NULL),
(3, 'Mary', 'Okeke', 'mary@gmail.com', NULL, NULL, 'Graphics Girl', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2017-06-07 16:33:32', NULL),
(4, 'John', 'Miller', 'jm@mail.com', NULL, NULL, 'Lawyer', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2017-06-13 08:37:05', NULL),
(5, 'Fred', 'Adams', 'fred@g.com', NULL, NULL, 'Driver', NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2017-06-13 08:39:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `time_count`
--

CREATE TABLE IF NOT EXISTS `time_count` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `location` varchar(20) NOT NULL,
  `timeposted` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `time_count`
--

INSERT INTO `time_count` (`id`, `user`, `location`, `timeposted`) VALUES
(1, 'admin@demo.com', 'login', '2017-06-09 14:34:24'),
(2, 'admin@demo.com', 'login', '2017-06-09 14:42:03'),
(3, 'admin@demo.com', 'login', '2017-06-09 14:42:20'),
(4, 'admin@demo.com', 'login', '2017-06-09 14:47:02'),
(5, 'admin@demo.com', 'login', '2017-06-12 10:36:58');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
