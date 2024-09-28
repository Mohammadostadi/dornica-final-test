-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 28, 2024 at 04:18 PM
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
(1, 'محمد', 'استادی', 'ostadi', '12', 0, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

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
  `image` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `username` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_persian_ci NOT NULL,
  `province_id` int NOT NULL,
  `city_id` int NOT NULL,
  `military_service` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `setdate` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `ncode` (`ncode`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
