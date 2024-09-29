-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 29, 2024 at 04:04 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dornica_final_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `lname` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `username` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_persian_ci NOT NULL,
  `role` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fname`, `lname`, `username`, `password`, `role`, `status`) VALUES
(1, 'محمد', 'استادی', 'ostadi', '$2y$10$80XIH4XadiqqeOCxJIJ7Auciimih5OE.XdS5ipq6MpX0k6BNoXPDO', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `description` varchar(128) COLLATE utf8mb4_persian_ci NOT NULL,
  `full_description` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `image` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `blog_category` int NOT NULL,
  `date` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  `setdate` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  `updated_at` varchar(20) COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `admin_id` int NOT NULL,
  `counter` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `blog_category` (`blog_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `sort` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `sort`, `status`) VALUES
(1, 'ورزشی', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `province_id` int NOT NULL,
  `sort` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `province_id`, `sort`, `status`) VALUES
(1, 'ساری', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `lname` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `blog_id` int NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_persian_ci NOT NULL,
  `member_id` int DEFAULT NULL,
  `setdate` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `is_readed` tinyint NOT NULL DEFAULT '0',
  `readed_at` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `admin_id` int NOT NULL,
  `table_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `changes` varchar(256) COLLATE utf8mb4_persian_ci NOT NULL,
  `type` int NOT NULL,
  `date` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `admin_id`, `table_name`, `changes`, `type`, `date`) VALUES
(1, 1, 'provinces', 'INSERT  INTO provinces (`name`, `sort`, `status`)  VALUES (\'مازندران\', \'1\', \'1\')', 0, '2024/09/29 07:31:33'),
(2, 1, 'provinces', 'INSERT  INTO provinces (`name`, `sort`, `status`)  VALUES (\'تهران\', \'2\', \'1\')', 0, '2024/09/29 11:03:50'),
(3, 1, 'provinces', 'INSERT  INTO provinces (`name`, `sort`, `status`)  VALUES (\'گلستان\', \'3\', \'1\')', 0, '2024/09/29 11:09:25'),
(4, 1, 'provinces', 'INSERT  INTO provinces (`name`, `sort`, `status`)  VALUES (\'کرمان\', \'4\', \'1\')', 0, '2024/09/29 11:12:49'),
(5, 1, 'provinces', 'INSERT  INTO provinces (`name`, `sort`, `status`)  VALUES (\'dosihv\', \'5\', \'1\')', 0, '2024/09/29 11:28:40'),
(6, 1, 'provinces', 'DELETE FROM provinces WHERE  id = \'5\' ', 1, '2024/09/29 11:30:18'),
(7, 1, 'cities', 'INSERT  INTO cities (`name`, `province_id`, `sort`, `status`)  VALUES (\'ساری\', \'1\', \'1\', \'1\')', 0, '2024/09/29 11:50:57'),
(8, 1, 'cities', 'INSERT  INTO cities (`name`, `province_id`, `sort`, `status`)  VALUES (\'dtffvbdfb\', \'4\', \'2\', \'1\')', 0, '2024/09/29 11:53:04'),
(9, 1, 'cities', 'DELETE FROM cities WHERE  id = \'2\' ', 1, '2024/09/29 11:53:07'),
(10, 1, 'categories', 'INSERT  INTO categories (`name`, `sort`, `status`)  VALUES (\'ورزشی\', \'1\', \'1\')', 0, '2024/09/29 16:21:21'),
(11, 1, 'categories', 'INSERT  INTO categories (`name`, `sort`, `status`)  VALUES (\'fthtyfj\', \'2\', \'1\')', 0, '2024/09/29 16:22:20'),
(12, 1, 'categories', 'DELETE FROM categories WHERE  id = \'2\' ', 1, '2024/09/29 16:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `lname` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `ncode` varchar(10) COLLATE utf8mb4_persian_ci NOT NULL,
  `gender` tinyint NOT NULL,
  `phone` varchar(13) COLLATE utf8mb4_persian_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_persian_ci NOT NULL,
  `image` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `username` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_persian_ci NOT NULL,
  `province_id` int DEFAULT NULL,
  `city_id` int DEFAULT NULL,
  `military_service` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `setdate` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `ncode` (`ncode`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `fname`, `lname`, `ncode`, `gender`, `phone`, `email`, `image`, `username`, `password`, `province_id`, `city_id`, `military_service`, `status`, `setdate`) VALUES
(1, 'محمد', 'استادی', '2081143542', 0, '09370709046', 'mohammad.asram2000@gmail.com', NULL, 'mohammadostadi', '$2y$10$nlzVXtkaBlA3unMhlDpGzOFRMn7eUGcuxA9Bq1R0X8d3lW1jNgNDa', 1, 1, 2, 1, '2024/09/29 14:37:50');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
CREATE TABLE IF NOT EXISTS `provinces` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `sort` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `sort`, `status`) VALUES
(1, 'مازندران', 1, 1),
(2, 'تهران', 2, 1),
(3, 'گلستان', 3, 1),
(4, 'کرمان', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `member_id` int NOT NULL,
  `blog_id` int NOT NULL,
  `setdate` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`blog_category`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
