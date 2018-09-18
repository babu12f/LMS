-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2016 at 08:32 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `author_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(100) NOT NULL,
  PRIMARY KEY (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `author_name`) VALUES
(1, 'Babor'),
(2, 'Rasel'),
(3, 'rony'),
(4, 'Shafiqul'),
(5, 'ZAHIR');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(250) NOT NULL,
  `category` varchar(50) NOT NULL,
  `book_price` int(11) NOT NULL,
  `book_edition` varchar(50) NOT NULL,
  `ISBN_number` varchar(70) NOT NULL,
  `book_pub` int(11) NOT NULL,
  `available` int(11) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `category`, `book_price`, `book_edition`, `ISBN_number`, `book_pub`, `available`) VALUES
(3, 'algo', 'Engineering', 600, '6th', '1215', 2, 597),
(4, 'ece', 'Business', 250, '7th', '1217', 1, 249),
(5, 'bba', 'Business', 320, '3rd', '1214', 2, 149),
(6, 'mbbs', 'Medical', 600, '12th', '1122', 2, 120),
(7, 'mba', 'Business', 700, '12th', '1215a', 1, 140),
(8, '', '', 0, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_author`
--

CREATE TABLE IF NOT EXISTS `book_author` (
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  KEY `book_id` (`book_id`),
  KEY `author_id` (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_author`
--

INSERT INTO `book_author` (`book_id`, `author_id`) VALUES
(3, 1),
(4, 2),
(5, 2),
(6, 1),
(7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `book_publisher`
--

CREATE TABLE IF NOT EXISTS `book_publisher` (
  `book_id` int(11) NOT NULL,
  `pub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `libary_item`
--

CREATE TABLE IF NOT EXISTS `libary_item` (
  `libary_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `libary_item_name` varchar(200) NOT NULL,
  `libary_item_type` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `item_des` text NOT NULL,
  `item_stock` int(11) NOT NULL,
  `b_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`libary_item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `libary_item`
--

INSERT INTO `libary_item` (`libary_item_id`, `libary_item_name`, `libary_item_type`, `price`, `item_des`, `item_stock`, `b_id`) VALUES
(1, 'i name up', 'magazine', 25, 'des update', 100, 0),
(3, 'new', 'cd', 200000, 'dddd', 400, 0),
(4, 'naem input', 'CD', 350, '', 123, 0),
(5, 'naem input', 'CD', 350, 'des iniput', 123, 0);

-- --------------------------------------------------------

--
-- Table structure for table `liberian`
--

CREATE TABLE IF NOT EXISTS `liberian` (
  `liberian_id` int(11) NOT NULL AUTO_INCREMENT,
  `liberian_name` varchar(60) NOT NULL,
  `l_password` varchar(300) NOT NULL,
  `l_address` varchar(500) NOT NULL,
  `l_email` varchar(50) NOT NULL,
  `u_type` int(11) NOT NULL,
  PRIMARY KEY (`liberian_id`),
  UNIQUE KEY `l_email` (`l_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `liberian`
--

INSERT INTO `liberian` (`liberian_id`, `liberian_name`, `l_password`, `l_address`, `l_email`, `u_type`) VALUES
(1, 'anik', 'f2bb10a6e6d5f76cb2d660333079e612', 'addr', 'anik', 2),
(2, 'rony', 'rony', 'addr', 'rony', 2),
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin addr', 'admin@admin.com', 1),
(5, 'fvhouhvosisjvb ', '1223344545', 'kcbuDCO;ffcagvbo ', 'gc@gmail.com ', 2),
(9, 'babor ', '6d2638b0200578b9f3278e0ff5126523', 'feni', 'ba@k.com ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `first_name`, `last_name`, `email`, `phone`, `password`, `birthday`, `gender`, `address`) VALUES
(1, 'Shafiqul Islam', 'Rony', 'rony.uap143@gmail.com', '01926961293', '', '1992-12-03', 'Male', 'Haluaghat, Mymenshing,Bangladesh'),
(2, 'Rasel Ahmed', '', 'rasel.uap143@gmail.com', '213123', '', '1970-01-01', 'Male', 'Feni,Bangladesh'),
(3, 'Shafiqul', 'Rony', 'shafiqulislamislam11@gmail.com', '01624306261', '1234', '1992-12-03', 'Male', 'Haluaghat,Mymenshing,Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `member_borrow_library_item`
--

CREATE TABLE IF NOT EXISTS `member_borrow_library_item` (
  `borrow_id` int(11) NOT NULL AUTO_INCREMENT,
  `due_date` datetime NOT NULL,
  `issue_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `return_date` datetime DEFAULT NULL,
  `libary_item_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `liberian_id` int(11) NOT NULL,
  `receive_by` int(11) DEFAULT '0',
  `comment` varchar(1000) NOT NULL,
  PRIMARY KEY (`borrow_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `member_borrow_library_item`
--

INSERT INTO `member_borrow_library_item` (`borrow_id`, `due_date`, `issue_date`, `return_date`, `libary_item_id`, `member_id`, `liberian_id`, `receive_by`, `comment`) VALUES
(2, '0000-00-00 00:00:00', '2016-01-16 04:40:13', '2016-01-31 00:00:00', 3, 2, 1, 2, ''),
(3, '0000-00-00 00:00:00', '2016-01-16 04:40:13', '2016-01-31 00:00:00', 7, 3, 1, 1, ''),
(5, '0000-00-00 00:00:00', '2016-01-16 04:53:09', NULL, 3, 1, 1, 0, ''),
(6, '0000-00-00 00:00:00', '2016-01-16 04:53:09', NULL, 7, 2, 1, 1, ''),
(8, '0000-00-00 00:00:00', '2016-01-16 05:13:08', '2016-01-31 00:00:00', 3, 2, 1, 1, ''),
(9, '0000-00-00 00:00:00', '2016-01-16 05:13:08', '2016-01-31 00:00:00', 7, 7, 1, 1, ''),
(10, '2016-01-26 00:00:00', '2016-01-17 04:52:17', NULL, 3, 3, 1, 0, ''),
(11, '2016-01-26 00:00:00', '2016-01-17 04:52:17', NULL, 4, 3, 1, 0, ''),
(12, '2016-01-26 00:00:00', '2016-01-17 04:52:17', NULL, 5, 3, 1, 0, ''),
(13, '2016-01-30 12:00:00', '2016-01-17 05:06:10', NULL, 3, 2, 1, 0, ''),
(14, '2016-01-23 12:00:00', '2016-01-17 05:16:25', NULL, 3, 2, 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `member_buy_library_item`
--

CREATE TABLE IF NOT EXISTS `member_buy_library_item` (
  `buyer_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `libary_item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `buying_date` datetime NOT NULL,
  `liberian_id` int(11) NOT NULL,
  `buyer_name` varchar(70) NOT NULL,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`buyer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `member_buy_library_item`
--

INSERT INTO `member_buy_library_item` (`buyer_id`, `member_id`, `libary_item_id`, `quantity`, `buying_date`, `liberian_id`, `buyer_name`, `type`) VALUES
(6, 1, 4, 3, '2016-01-18 08:31:21', 1, '', 'book'),
(7, 1, 7, 2, '2016-01-18 08:31:21', 1, '', 'book'),
(8, 1, 3, 1, '2016-01-18 08:31:21', 1, '', 'book'),
(9, 1, 6, 1, '2016-01-18 08:31:21', 2, '', 'book'),
(10, 1, 1, 1, '2016-01-18 08:57:14', 3, '', 'other'),
(12, 2, 4, 1, '2016-01-18 08:58:13', 2, '', 'book'),
(13, 2, 6, 2, '2016-01-18 08:58:13', 2, '', 'book'),
(14, 2, 1, 1, '2016-01-18 08:58:13', 3, '', 'other');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE IF NOT EXISTS `publisher` (
  `pub_id` int(11) NOT NULL AUTO_INCREMENT,
  `pub_name` varchar(100) NOT NULL,
  `publication` varchar(300) NOT NULL,
  `pub_address` varchar(1000) NOT NULL,
  `pub_phone` varchar(50) NOT NULL,
  PRIMARY KEY (`pub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`pub_id`, `pub_name`, `publication`, `pub_address`, `pub_phone`) VALUES
(1, 'roni', 'panjery', 'dhaka', '1213123213'),
(2, 'rasel', 'onno prokash', 'nilkhet', '1312321321'),
(3, 'rasel', 'janina', 'dhanmondi', '01676353621'),
(4, 'Anik', 'onnodin', 'Dhaka', '01925342424');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
