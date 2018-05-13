-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2016 at 06:28 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `isbn` int(30) NOT NULL,
  `price` int(30) NOT NULL,
  `author` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `image` text NOT NULL,
  `description` text NOT NULL,
  `sort_order` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `isbn`, `price`, `author`, `subject`, `status`, `image`, `description`, `sort_order`) VALUES
(1, 'rule of writer', 145258, 500, 'Sagar', 'text book', 1, '4395_', '                             asdfasdf           	                                        ', 5),
(3, 'Musicsdf', 0, 0, 'fsdfa', 'sdfsdf', 1, '6777_', '', 0),
(4, 'Music', 2147483647, 2313123, 'asdfasdf', 'text book', 1, '4410_', '', 14512),
(5, 'sadfgdafg', 54216, 0, 'asgasdf', 'afgsdfgdf', 1, '7627_other-7590-9440861-1-zoom.jpg', '', 0),
(6, 'wefdsf', 65465, 0, 'sadfasdf', 'sadfas', 1, '5869_other-8657-5737661-1-zoom.jpg', '', 0),
(7, 'asdfasdffasdasdfasdfasd', 56151, 1561, 'sadfsadf', 'fasdf', 1, '5584_other-8504-2765761-1-zoom.jpg', '', 51),
(8, 'sadfa', 2543, 54, 'dfgsdfg', 'sadfasdf', 1, '8629_yama buddha t-shirt.jpg', '', 53),
(9, 'dfgsfg', 41656, 0, 'sadfasdf', 'sdfg', 1, '3692_other-8398-9448761-1-zoom.jpg', '', 0),
(10, 'sadfasdfasddfas', 54654, 564165, 'asdfasdf', 'text book', 1, '6264_other-4079-2842861-2-zoom.jpg', '', 541),
(11, 'gsdfg', 45646546, 0, 'dfsgdfg', 'fgsdfgsdf', 1, '7478_other-8504-2765761-1-zoom.jpg', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `ip_add` varchar(255) NOT NULL,
  `isbn` int(50) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ip_add`, `isbn`, `quantity`) VALUES
('::1', 2147483647, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `id` int(11) NOT NULL,
  `order_list_id` int(11) NOT NULL,
  `isbn` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE IF NOT EXISTS `order_list` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `order_no` int(50) NOT NULL,
  `received_date` datetime NOT NULL,
  `shipped_date` datetime NOT NULL,
  `shipped_address` varchar(175) NOT NULL,
  `shipped_city` varchar(150) NOT NULL,
  `shipped_state` varchar(180) NOT NULL,
  `shipped_zip` varchar(200) NOT NULL,
  `isbn` int(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `users_id`, `order_no`, `received_date`, `shipped_date`, `shipped_address`, `shipped_city`, `shipped_state`, `shipped_zip`, `isbn`, `quantity`, `price`) VALUES
(1, 1, 5, '2016-07-11 00:00:00', '2016-07-18 00:00:00', 'address', 'city', 'state', 'zip', 1452, 2, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `zip` int(50) NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `credit_card_type` varchar(255) NOT NULL,
  `credit_card_number` int(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `user_type` enum('admin','customer') NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `address`, `city`, `state`, `zip`, `phone`, `email`, `credit_card_type`, `credit_card_number`, `password`, `status`, `user_type`) VALUES
(1, 'Sagar', 'Yonjan', 'boudha', 'kathmandhu', 'india', 15214, 36965852, 'sagaryonjan015@gmail.com', '14522548', 0, 'sgryon015', 1, 'admin'),
(3, 'customer', 'customer', 'customer', 'customer', '', 0, 0, 'customer@gmail.com', '', 0, 'customer', 1, 'customer'),
(6, 'prkash', 'lama', '', '', '', 0, 0, 'prksa@gmail.com', '', 0, 'prakash', 1, 'admin'),
(7, 'santa', 'lama', '', '', '', 0, 0, 'asdf@jasdklfjas', '', 0, 'asdfasdf', 1, 'admin'),
(8, 'sdfasdf', 'asdfasdf', '', '', '', 0, 0, 'asdfasdfasdf@sdfasdf', '', 0, 'sadfsadf', 1, 'admin'),
(9, 'asdfas', 'dfasdf', '', '', '', 0, 0, 'asdfasdf', '', 0, 'asdfasdf', 1, 'admin'),
(10, 'admin', 'lama', '', '', '', 0, 0, 'admin@gmail.com', '', 0, 'admin', 1, 'admin'),
(11, 'santa', 'lama', 'boudha', 'dfasdf', 'sfdsdf', 0, 98025125, 'admin@gmail.com', '12345', 456123, '', 0, 'customer'),
(12, 'santa', 'lama', 'boudha', 'dfasdf', 'sfdsdf', 0, 98025125, 'admin@gmail.com', '12345', 456123, '', 0, 'customer'),
(13, 'adminsdf', 'asdfasdf', 'boudha', 'dfasdf', 'sdfsadf', 0, 98025125, 'sanjayayonjan1@gmail.com', '451651561', 541515213, '', 0, 'customer'),
(14, 'bibek', 'lama', 'boudha', 'boudha', 'boudha', 445156, 985642, 'bibeklama015@gmail.com', '5115615616', 151515154, '', 1, 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `isbn` (`isbn`), ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_list`
--
ALTER TABLE `order_list`
ADD CONSTRAINT `order_list_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
