-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 29, 2015 at 06:25 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` enum('paid','confirmed','unpaid','canceled','expired') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `date`, `due_date`, `user_id`, `status`) VALUES
(1, '2015-01-04 05:06:50', '2015-01-05 05:06:50', 0, 'unpaid'),
(2, '2015-01-04 05:10:20', '2015-01-05 05:10:20', 0, 'unpaid'),
(3, '2015-04-18 19:18:55', '2015-04-19 19:18:55', 0, 'unpaid'),
(4, '2015-04-18 19:25:50', '2015-04-19 19:25:50', 2, 'confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `qty` int(3) NOT NULL,
  `price` int(9) NOT NULL,
  `options` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice_id`, `product_id`, `product_name`, `qty`, `price`, `options`) VALUES
(1, 1, 1, 'Baju', 1, 79000, ''),
(2, 1, 3, 'Topi', 1, 80000, ''),
(3, 2, 5, 'Dasi', 1, 77500, ''),
(4, 3, 4, 'Sepatu', 1, 240000, ''),
(5, 4, 3, 'Topi', 1, 80000, ''),
(6, 4, 1, 'Baju', 1, 79000, '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` int(9) NOT NULL,
  `stock` int(3) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `image`) VALUES
(1, 'Baju', 'Baju Kemeja', 79000, 5, '542.jpg'),
(2, 'Sandal Casual', 'Sandal Jepit Casual', 35000, 10, '312618_011.jpg'),
(3, 'Topi', 'Topi Casual', 80000, 12, '91qz+oNEDIL._SL1500__.jpg'),
(4, 'Sepatu', 'Sepatu Kets', 240000, 1, 'Converse-Shoes.jpg'),
(5, 'Dasi', 'Dasi Formal', 77500, 1, 'Platinum-Ties-Mens-Red-Power-Tie-Necktie-P14034714.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `toko_sessions`
--

CREATE TABLE IF NOT EXISTS `toko_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko_sessions`
--

INSERT INTO `toko_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('69c8faf0755242c9018334163a6db32b', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:37.0) Gecko/20100101 Firefox/37.0', 1429362749, 'a:2:{s:8:"username";s:3:"bob";s:5:"group";s:1:"2";}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `group` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `group`) VALUES
(1, 'admin', 'admin', 1),
(2, 'bob', '123', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
