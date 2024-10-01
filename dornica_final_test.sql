-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 01, 2024 at 03:39 PM
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
  `levelAccess` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fname`, `lname`, `username`, `password`, `role`, `levelAccess`, `status`) VALUES
(1, 'محمد', 'استادی', 'ostadi', '$2y$10$2AlvHYbZlEZQl81CwM/lH.xV5b9lxscP4ZBewy8ZyUwLxZ/jAJl/6', 0, 'admins_list,admin_add,admin_delete,admin_update,blogs_list,blog_delete,blog_update,blog_add,members_list,member_reset_password,member_delete,member_update,provinces_list,province_add,province_delete,province_update,cities_list,city_add,city_delete,city_update,categories_list,category_add,category_delete,category_update,logs_list,comments_list', 1),
(2, 'مبینا', 'رمضانی', 'mbn_ramezani', '$2y$10$.qhDNqYmK9C1Bwi5AUxpiOdRJ1LUKRy832iQbX5pOXAqEStmQ/OPq', 1, 'admins_list,blogs_list,blog_delete,blog_update,blog_add,members_list,member_reset_password,member_delete,member_update,provinces_list,province_add,province_delete,province_update,cities_list,city_add,city_delete,city_update,categories_list,category_add,category_delete,category_update', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `description` varchar(128) COLLATE utf8mb4_persian_ci NOT NULL,
  `full_description` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `image` varchar(64) COLLATE utf8mb4_persian_ci NOT NULL,
  `blog_category` int NOT NULL,
  `date` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  `setdate` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  `updated_at` varchar(20) COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `admin_id` int NOT NULL,
  `counter` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `blog_category` (`blog_category`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `full_description`, `image`, `blog_category`, `date`, `setdate`, `updated_at`, `admin_id`, `counter`, `status`) VALUES
(1, 'تست', 'تست', 'این متن تست است', '', 4, '1403/07/09', '2024/09/30 11:40:27', NULL, 1, 21, 1),
(3, 'لورم اپیزوم', 'لورم ایپسوم متن ساختگی با تولید سادگی', 'لورم ایپسوم متن ساختگی با تولید سادگی لورم ایپسوم متن ساختگی با تولید سادگی لورم ایپسوم متن ساختگی با تولید سادگی لورم ایپسوم متن ساختگی با تولید سادگی لورم ایپسوم متن ساختگی با تولید سادگی لورم ایپسوم متن ساختگی با تولید سادگی لورم ایپسوم متن ساختگی با تو', '', 4, '1403/06/10', '2024/10/01 09:16:20', NULL, 1, 12, 1),
(4, 'تست شماره سه', 'لورم ایپسوم متن ساختگی', 'لورم ایپسوم متن ساختگی با تولید سادگی لورم ایپسوم متن ساختگی با تولید سادگی لورم ایپسوم متن ساختگی با تولید سادگی لورم ایپسوم متن ساختگی با تولید سادگی لورم ایپسوم متن ساختگی با تولید سادگی لورم ایپسوم متن ساختگی با تولید سادگی لورم ایپسوم متن ساختگی با تولید سادگی لورم ایپسوم متن ساختگی با تولید سادگی لورم ایپسوم متن ساختگی با تولید سادگی لورم ایپسوم متن ساختگی با تولید سادگی لورم ایپسوم متن ساختگی با تولید سادگی', '', 4, '1403/07/10', '2024/10/01 09:17:21', NULL, 1, 11, 1),
(5, 'تست خبر', 'سه درصد گذشته، حال وآینده شناخت  فراوان', 'سه درصد گذشته، حال وآینده شناخت  فراوانسه درصد گذشته، حال وآینده شناخت  فراوانسه درصد گذشته، حال وآینده شناخت  فراوانسه درصد گذشته، حال وآینده شناخت  فراوانسه درصد گذشته، حال وآینده شناخت  فراوانسه درصد گذشته، حال وآینده شناخت  فراوانسه درصد گذشته، حال وآینده شناخت  فراوانسه درصد گذشته، حال وآینده شناخت  فراوانسه درصد گذشته، حال وآینده شناخت  فراوانسه درصد گذشته، حال وآینده شناخت  فراوانسه درصد گذشته، حال وآینده شناخت  فراوانسه درصد گذشته، حال وآینده شناخت  فراوانسه درصد گذشته، حال وآینده شناخت  فراوانسه درصد گذشته، حال وآینده شناخت  فراوانسه درصد گذشته، حال وآینده شناخت  فراوانسه درصد گذشته، حال وآینده شناخت  فراوان', '', 6, '1403/07/09', '2024/10/01 15:22:33', NULL, 1, 0, 1),
(6, 'خبر فوتبالی', 'مسی بهتر از رونالدو است', 'مسی بهتر از رونالدو استمسی بهتر از رونالدو استمسی بهتر از رونالدو استمسی بهتر از رونالدو استمسی بهتر از رونالدو استمسی بهتر از رونالدو استمسی بهتر از رونالدو استمسی بهتر از رونالدو استمسی بهتر از رونالدو استمسی بهتر از رونالدو استمسی بهتر از رونالدو استمسی بهتر از رونالدو استمسی بهتر از رونالدو استمسی بهتر از رونالدو استمسی بهتر از رونالدو استمسی بهتر از رونالدو استمسی بهتر از رونالدو استمسی بهتر از رونالدو استمسی بهتر از رونالدو استمسی بهتر از رونالدو استمسی بهتر از رونالدو استمسی بهتر از رونالدو استمسی بهتر از رونالدو است', '', 11, '1403/06/18', '2024/10/01 15:23:22', NULL, 1, 2, 1),
(7, 'پیتزا بهترین', 'پیتزا بهترین غذای دنیا است', 'پیتزا بهترین غذای دنیا استپیتزا بهترین غذای دنیا استپیتزا بهترین غذای دنیا استپیتزا بهترین غذای دنیا استپیتزا بهترین غذای دنیا استپیتزا بهترین غذای دنیا استپیتزا بهترین غذای دنیا استپیتزا بهترین غذای دنیا استپیتزا بهترین غذای دنیا استپیتزا بهترین غذای دنیا استپیتزا بهترین غذای دنیا است پیتزا بهترین غذای دنیا استپیتزا بهترین غذای دنیا استپیتزا بهترین غذای دنیا استپیتزا بهترین غذای دنیا استپیتزا بهترین غذای دنیا استپیتزا بهترین غذای دنیا استپیتزا بهترین غذای دنیا استپیتزا بهترین غذای دنیا استپیتزا بهترین غذای دنیا است', '', 7, '1403/07/08', '2024/10/01 15:24:13', NULL, 1, 2, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `sort`, `status`) VALUES
(1, 'ورزشی', 1, 1),
(3, 'علمی', 2, 1),
(4, 'سیاسی', 3, 1),
(5, 'فناوری', 4, 1),
(6, 'اقتصاد جهانی', 5, 1),
(7, 'غذا', 6, 1),
(8, 'سفر', 7, 1),
(9, 'املاک', 8, 1),
(10, 'کسب کار', 9, 1),
(11, 'فوتبال', 10, 1);

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
  `description` varchar(256) COLLATE utf8mb4_persian_ci NOT NULL,
  `member_id` int DEFAULT NULL,
  `setdate` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `is_readed` tinyint NOT NULL DEFAULT '0',
  `readed_at` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `fname`, `lname`, `blog_id`, `email`, `description`, `member_id`, `setdate`, `status`, `is_readed`, `readed_at`) VALUES
(1, 'محمد', 'استادی', 3, 'mohammad.asram2000@gmail.com', 'سلام\r\nبسیار عالی!', NULL, '2024/10/01 10:04:39', 2, 1, '2024/10/01 18:22:52'),
(2, 'محمد', 'استادی', 3, 'mohammad.asram2000@gmail.com', 'سلام\r\nایول!', 1, '2024/10/01 10:29:00', 2, 0, ''),
(10, 'مبینا', 'رمضانی', 4, 'mobinaramezani99@gmail.com', 'بسیار ارزشمند', NULL, '2024/10/01 10:35:39', 2, 0, ''),
(11, 'مبینا', 'رمضانی', 1, 'mobinaramezani99@gmail.com', 'سلام \r\nمرسی برای مطلب زیبایتان', 2, '2024/10/01 12:28:14', 2, 0, ''),
(12, 'محمد', 'استادی', 6, 'mohammad.asram2000@gmail.com', 'قطعا همینطوره', 1, '2024/10/01 15:48:00', 2, 1, '2024/10/01 19:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

DROP TABLE IF EXISTS `counter`;
CREATE TABLE IF NOT EXISTS `counter` (
  `id` int NOT NULL AUTO_INCREMENT,
  `member_id` int DEFAULT NULL,
  `blog_id` int DEFAULT NULL,
  `date` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `member_id`, `blog_id`, `date`) VALUES
(7, NULL, 1, '2024/10/01 08:57:55'),
(9, NULL, 1, '2024/10/01 08:59:21'),
(10, NULL, 1, '2024/10/01 08:59:26'),
(11, NULL, 1, '2024/10/01 08:59:35'),
(12, NULL, 1, '2024/10/01 08:59:52'),
(13, NULL, 1, '2024/10/01 09:00:14'),
(14, NULL, 1, '2024/10/01 09:00:35'),
(15, NULL, 1, '2024/10/01 09:05:35'),
(16, NULL, 1, '2024/10/01 09:21:44'),
(17, NULL, 4, '2024/10/01 09:24:44'),
(18, NULL, 3, '2024/10/01 09:28:53'),
(19, NULL, 1, '2024/10/01 09:30:12'),
(20, NULL, 4, '2024/10/01 09:34:10'),
(21, NULL, 3, '2024/10/01 09:35:07'),
(22, NULL, 3, '2024/10/01 09:45:49'),
(23, NULL, 3, '2024/10/01 09:58:49'),
(24, NULL, 0, '2024/10/01 09:59:36'),
(25, NULL, 4, '2024/10/01 09:59:50'),
(26, NULL, 3, '2024/10/01 10:03:58'),
(27, NULL, 3, '2024/10/01 10:26:49'),
(28, 1, 4, '2024/10/01 10:28:18'),
(29, 1, 3, '2024/10/01 10:32:25'),
(30, NULL, 4, '2024/10/01 10:35:16'),
(31, NULL, 1, '2024/10/01 10:40:34'),
(32, NULL, 1, '2024/10/01 10:47:54'),
(33, NULL, 1, '2024/10/01 10:57:05'),
(34, 1, 4, '2024/10/01 10:57:42'),
(35, 1, 4, '2024/10/01 11:02:56'),
(36, 1, 3, '2024/10/01 11:08:51'),
(37, 1, 3, '2024/10/01 11:18:35'),
(38, 1, 1, '2024/10/01 11:18:43'),
(39, 1, 3, '2024/10/01 11:58:34'),
(40, 1, 4, '2024/10/01 12:01:25'),
(41, 1, 1, '2024/10/01 12:01:36'),
(42, 2, 1, '2024/10/01 12:27:35'),
(43, 2, 1, '2024/10/01 12:33:59'),
(44, 2, 0, '2024/10/01 12:34:49'),
(45, 2, 3, '2024/10/01 13:16:07'),
(46, 2, 1, '2024/10/01 13:17:51'),
(47, 2, 4, '2024/10/01 13:18:00'),
(48, 2, 1, '2024/10/01 13:27:41'),
(49, 2, 3, '2024/10/01 13:28:13'),
(50, NULL, 1, '2024/10/01 14:40:34'),
(51, NULL, 7, '2024/10/01 15:25:27'),
(52, NULL, 0, '2024/10/01 15:31:46'),
(53, NULL, 6, '2024/10/01 15:43:41'),
(54, 1, 6, '2024/10/01 15:43:51'),
(55, 1, 4, '2024/10/01 16:56:18'),
(56, 1, 7, '2024/10/01 16:56:29'),
(57, NULL, 4, '2024/10/01 18:24:44'),
(58, NULL, 1, '2024/10/01 18:24:57');

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

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
(12, 1, 'categories', 'DELETE FROM categories WHERE  id = \'2\' ', 1, '2024/09/29 16:22:22'),
(13, 1, 'members', 'UPDATE members SET `password` = \'$2y$10$DSlZBvZ6sUa9jDcLxyNrwuHtKz5qjJ0WhgjfqfSXP5xOAze78HMJi\' WHERE  id = \'1\' ', 2, '2024/09/30 10:43:07'),
(14, 1, 'members', 'UPDATE members SET `password` = \'$2y$10$Sjzq3APiwBJ0.0oEDdFP2uZCw8BMyMgLiBwysv.lu1JCjGZb5o.Vy\' WHERE  id = \'1\' ', 2, '2024/09/30 10:45:06'),
(15, 1, 'categories', 'INSERT  INTO categories (`name`, `sort`, `status`)  VALUES (\'علمی\', \'2\', \'1\')', 0, '2024/09/30 10:46:19'),
(16, 1, 'categories', 'INSERT  INTO categories (`name`, `sort`, `status`)  VALUES (\'سیاسی\', \'3\', \'1\')', 0, '2024/09/30 10:46:25'),
(17, 1, 'categories', 'INSERT  INTO categories (`name`, `sort`, `status`)  VALUES (\'فناوری\', \'4\', \'1\')', 0, '2024/09/30 10:46:31'),
(18, 1, 'blogs', 'INSERT  INTO blogs (`title`, `blog_category`, `description`, `full_description`, `date`, `setdate`, `admin_id`, `counter`, `status`)  VALUES (\'تست\', \'4\', \'تست\', \'این متن تست است\', \'1403/07/09\', \'2024/09/30 11:40:27\', \'1\', \'0\', \'1\')', 0, '2024/09/30 11:40:27'),
(19, 1, 'blogs', 'INSERT  INTO blogs (`title`, `blog_category`, `description`, `full_description`, `date`, `setdate`, `admin_id`, `counter`, `status`)  VALUES (\'sdv\', \'3\', \'ds;vlm\', \';dlvmfvs\', \'1403/06/22\', \'2024/09/30 11:44:22\', \'1\', \'0\', \'1\')', 0, '2024/09/30 11:44:22'),
(20, 1, 'blogs', 'DELETE FROM blogs WHERE  id = \'2\' ', 1, '2024/09/30 11:46:14'),
(21, 1, 'categories', 'INSERT  INTO categories (`name`, `sort`, `status`)  VALUES (\'اقتصاد جهانی\', \'5\', \'1\')', 0, '2024/09/30 16:55:55'),
(22, 1, 'categories', 'INSERT  INTO categories (`name`, `sort`, `status`)  VALUES (\'غذا\', \'6\', \'1\')', 0, '2024/09/30 16:57:50'),
(23, 1, 'categories', 'INSERT  INTO categories (`name`, `sort`, `status`)  VALUES (\'سفر\', \'7\', \'1\')', 0, '2024/09/30 16:57:56'),
(24, 1, 'categories', 'INSERT  INTO categories (`name`, `sort`, `status`)  VALUES (\'املاک\', \'8\', \'1\')', 0, '2024/09/30 16:58:09'),
(25, 1, 'categories', 'INSERT  INTO categories (`name`, `sort`, `status`)  VALUES (\'کسب کار\', \'9\', \'1\')', 0, '2024/09/30 16:58:21'),
(26, 1, 'categories', 'INSERT  INTO categories (`name`, `sort`, `status`)  VALUES (\'فوتبال\', \'10\', \'1\')', 0, '2024/09/30 16:58:41'),
(27, 1, 'blogs', 'INSERT  INTO blogs (`title`, `blog_category`, `description`, `full_description`, `date`, `setdate`, `admin_id`, `counter`, `status`)  VALUES (\'لورم اپیزوم\', \'4\', \'لورم ایپسوم متن ساختگی با تولید سادگی\', \'لورم ایپسوم متن ساختگی با تولید سادگی لورم ایپسوم مت', 0, '2024/10/01 09:16:20'),
(28, 1, 'blogs', 'INSERT  INTO blogs (`title`, `blog_category`, `description`, `full_description`, `date`, `setdate`, `admin_id`, `counter`, `status`)  VALUES (\'تست شماره سه\', \'4\', \'لورم ایپسوم متن ساختگی\', \'لورم ایپسوم متن ساختگی با تولید سادگی لورم ایپسوم متن ساختگی با تو', 0, '2024/10/01 09:17:21'),
(29, 1, 'blogs', 'INSERT  INTO blogs (`title`, `blog_category`, `description`, `full_description`, `date`, `setdate`, `admin_id`, `counter`, `status`)  VALUES (\'تست خبر\', \'6\', \'سه درصد گذشته، حال وآینده شناخت  فراوان\', \'سه درصد گذشته، حال وآینده شناخت  فراوانسه درصد گذشته، ', 0, '2024/10/01 15:22:33'),
(30, 1, 'blogs', 'INSERT  INTO blogs (`title`, `blog_category`, `description`, `full_description`, `date`, `setdate`, `admin_id`, `counter`, `status`)  VALUES (\'خبر فوتبالی\', \'11\', \'مسی بهتر از رونالدو است\', \'مسی بهتر از رونالدو استمسی بهتر از رونالدو استمسی بهتر از رونالدو', 0, '2024/10/01 15:23:22'),
(31, 1, 'blogs', 'INSERT  INTO blogs (`title`, `blog_category`, `description`, `full_description`, `date`, `setdate`, `admin_id`, `counter`, `status`)  VALUES (\'پیتزا بهترین\', \'7\', \'پیتزا بهترین غذای دنیا است\', \'پیتزا بهترین غذای دنیا استپیتزا بهترین غذای دنیا استپیتزا بهتر', 0, '2024/10/01 15:24:13'),
(32, 1, 'admins', 'INSERT  INTO admins (`fname`, `lname`, `username`, `role`, `password`, `status`)  VALUES (\'مبینا\', \'رمضانی\', \'mbn_ramezani\', \'1\', \'$2y$10$.qhDNqYmK9C1Bwi5AUxpiOdRJ1LUKRy832iQbX5pOXAqEStmQ/OPq\', \'1\')', 0, '2024/10/01 16:09:27');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `fname`, `lname`, `ncode`, `gender`, `phone`, `email`, `image`, `username`, `password`, `province_id`, `city_id`, `military_service`, `status`, `setdate`) VALUES
(1, 'محمد', 'استادی', '2081143542', 0, '09370709046', 'mohammad.asram2000@gmail.com', NULL, 'mohammadostadi', '$2y$10$Sjzq3APiwBJ0.0oEDdFP2uZCw8BMyMgLiBwysv.lu1JCjGZb5o.Vy', 1, 1, 2, 1, '1403/07/08 14:37:50'),
(2, 'مبینا', 'رمضانی', '2093388121', 1, '09338059046', 'mobinaramezani99@gmail.com', NULL, 'mbn_ramezani', '$2y$10$nfTbtGD90dPUmfup.9lFeeHvgsFlbCX9XI8TnZT6B22I2Z2H1.F/G', 1, 1, NULL, 1, '1403/07/10 12:26:42');

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
-- Table structure for table `view`
--

DROP TABLE IF EXISTS `view`;
CREATE TABLE IF NOT EXISTS `view` (
  `id` int NOT NULL AUTO_INCREMENT,
  `member_id` int DEFAULT NULL,
  `ip` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  `setdate` varchar(20) COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `view`
--

INSERT INTO `view` (`id`, `member_id`, `ip`, `setdate`) VALUES
(1, NULL, '::1', '2024/10/01 13:10:55'),
(2, NULL, '::1', '2024/10/01 13:41:23'),
(3, NULL, '::1', '2024/10/01 13:41:23'),
(4, NULL, '::1', '2024/10/01 13:46:18'),
(5, NULL, '::1', '2024/10/01 13:46:18'),
(6, NULL, '::1', '2024/10/01 13:46:51'),
(7, NULL, '::1', '2024/10/01 13:46:51'),
(8, NULL, '::1', '2024/10/01 13:46:52'),
(9, NULL, '::1', '2024/10/01 13:46:53'),
(10, NULL, '::1', '2024/10/01 13:46:54'),
(11, NULL, '::1', '2024/10/01 13:46:55'),
(12, NULL, '::1', '2024/10/01 14:17:42'),
(13, NULL, '::1', '2024/10/01 14:47:57'),
(14, NULL, '::1', '2024/10/01 15:18:40'),
(15, NULL, '::1', '2024/10/01 15:43:51'),
(16, NULL, '::1', '2024/10/01 15:43:51'),
(17, 1, '::1', '2024/10/01 15:44:34'),
(18, NULL, '::1', '2024/10/01 15:46:25'),
(19, NULL, '::1', '2024/10/01 15:47:04'),
(20, 2, '::1', '2024/10/01 16:14:12'),
(21, 1, '::1', '2024/10/01 16:32:23'),
(22, 1, '::1', '2024/10/01 17:34:11'),
(23, NULL, '::1', '2024/10/01 18:24:44'),
(24, NULL, '::1', '2024/10/01 19:08:07');

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `member_id`, `blog_id`, `setdate`) VALUES
(20, 1, 3, '2024/10/01 11:17:36'),
(21, 1, 4, '2024/10/01 12:01:28'),
(22, 1, 1, '2024/10/01 12:01:39'),
(25, 1, 6, '2024/10/01 15:47:32'),
(26, 1, 7, '2024/10/01 16:56:36');

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
