-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 26, 2025 at 11:31 AM
-- Server version: 8.0.39
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `postal_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient_first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recipient_last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `city_id`, `postal_code`, `address`, `no`, `unit`, `recipient_first_name`, `recipient_last_name`, `mobile`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 14, 1, '7918992703', 'پیامبر اعظم، مجتمع سرافراز', '4', '1', NULL, NULL, '09170766430', 1, NULL, NULL, NULL),
(8, 7, 1, '7967117594', 'روستای تدرویه - محله بالا', '8', '8', 'هاشمی', NULL, NULL, 0, '2025-08-26 11:29:07', '2025-08-26 11:29:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `amazing_sales`
--

CREATE TABLE `amazing_sales` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `percentage` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amazing_sales`
--

INSERT INTO `amazing_sales` (`id`, `product_id`, `percentage`, `status`, `start_date`, `end_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 9, 90, 1, '2025-08-18 11:22:14', '2025-09-10 11:22:14', '2025-08-09 11:23:28', '2025-08-18 11:22:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` tinyint NOT NULL DEFAULT '0' COMMENT 'developer explain 0 or 1 ... in admin\\content\\banner model',
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `url`, `position`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'اسلایدشو یک', '\"images\\\\banner\\\\2025\\\\08\\\\04\\\\1754319366.jpg\"', 'https://toplearn.com', 0, 1, '2025-08-04 14:56:06', '2025-08-05 16:13:12', NULL),
(4, 'اسلایدشو دو', '\"images\\\\banner\\\\2025\\\\08\\\\04\\\\1754319385.jpg\"', 'https://toplearn.com', 0, 1, '2025-08-04 14:56:25', '2025-08-05 16:12:54', NULL),
(5, 'اسلایدشو سه', '\"images\\\\banner\\\\2025\\\\08\\\\04\\\\1754319406.jpg\"', 'https://toplearn.com', 0, 1, '2025-08-04 14:56:46', '2025-08-05 16:12:44', NULL),
(6, 'اسلایدشو چهار', '\"images\\\\banner\\\\2025\\\\08\\\\04\\\\1754319424.jpg\"', 'https://toplearn.com', 0, 1, '2025-08-04 14:57:04', '2025-08-05 16:12:32', NULL),
(7, 'اسلایدشو شش', '\"images\\\\banner\\\\2025\\\\08\\\\05\\\\1754410452.gif\"', 'https://toplearn.com', 0, 1, '2025-08-04 17:20:45', '2025-08-05 16:14:18', NULL),
(8, 'بنر کنار اسلایدشو بالا', '\"images\\\\banner\\\\2025\\\\08\\\\05\\\\1754410933.png\"', 'https://toplearn.com', 1, 1, '2025-08-05 16:16:49', '2025-08-05 16:22:14', NULL),
(9, 'بنر کنار اسلایدشو پایین', '\"images\\\\banner\\\\2025\\\\08\\\\05\\\\1754410657.jpg\"', 'https://toplearn.com', 1, 1, '2025-08-05 16:17:37', '2025-08-05 16:17:37', NULL),
(10, 'بنر بین دو سلایدر سمت راست', '\"images\\\\banner\\\\2025\\\\08\\\\05\\\\1754410723.jpg\"', 'https://toplearn.com', 2, 1, '2025-08-05 16:18:43', '2025-08-05 16:19:12', NULL),
(11, 'بنر بین دو سلایدر سمت چپ', '\"images\\\\banner\\\\2025\\\\08\\\\05\\\\1754410782.jpg\"', 'https://toplearn.com', 2, 1, '2025-08-05 16:19:42', '2025-08-05 16:19:42', NULL),
(12, 'بنر بزرگ پایین', '\"images\\\\banner\\\\2025\\\\08\\\\05\\\\1754410988.jpg\"', 'https://toplearn.com', 3, 1, '2025-08-05 16:23:08', '2025-08-05 16:23:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `persian_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `tags` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `persian_name`, `original_name`, `slug`, `logo`, `status`, `tags`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Apple', 'Apple', 'Apple', '{\"indexArray\":{\"large\":\"images\\\\brand\\\\2025\\\\07\\\\13\\\\1752416712\\\\1752416712_large.png\",\"medium\":\"images\\\\brand\\\\2025\\\\07\\\\13\\\\1752416712\\\\1752416712_medium.png\",\"small\":\"images\\\\brand\\\\2025\\\\07\\\\13\\\\1752416712\\\\1752416712_small.png\"},\"directory\":\"images\\\\brand\\\\2025\\\\07\\\\13\\\\1752416712\",\"currentImage\":\"medium\"}', 1, 'apple', '2025-07-13 14:25:12', '2025-08-05 16:07:42', '2025-08-05 16:07:42'),
(2, 'شیائومی', 'Xiaomi', 'xiaomi', '{\"indexArray\":{\"large\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454527\\\\1754454527_large.png\",\"medium\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454527\\\\1754454527_medium.png\",\"small\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454527\\\\1754454527_small.png\"},\"directory\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454527\",\"currentImage\":\"large\"}', 1, 'شیائومی,xiaomi', '2025-08-05 16:35:40', '2025-08-06 04:37:38', NULL),
(3, 'هوآوی', 'Huawei', 'huawei', '{\"indexArray\":{\"large\":\"images\\\\brand\\\\2025\\\\08\\\\05\\\\1754414144\\\\1754414144_large.jpg\",\"medium\":\"images\\\\brand\\\\2025\\\\08\\\\05\\\\1754414144\\\\1754414144_medium.jpg\",\"small\":\"images\\\\brand\\\\2025\\\\08\\\\05\\\\1754414144\\\\1754414144_small.jpg\"},\"directory\":\"images\\\\brand\\\\2025\\\\08\\\\05\\\\1754414144\",\"currentImage\":\"medium\"}', 1, 'Huawei,هوآوی', '2025-08-05 16:43:45', '2025-08-05 17:15:44', NULL),
(4, 'آدیتا', 'ADATA', 'adata', '{\"indexArray\":{\"large\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454078\\\\1754454078_large.png\",\"medium\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454078\\\\1754454078_medium.png\",\"small\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454078\\\\1754454078_small.png\"},\"directory\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454078\",\"currentImage\":\"medium\"}', 1, 'ADATA', '2025-08-06 04:21:18', '2025-08-06 04:21:18', NULL),
(5, 'کاسیو', 'Casio', 'casio', '{\"indexArray\":{\"large\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454103\\\\1754454103_large.jpg\",\"medium\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454103\\\\1754454103_medium.jpg\",\"small\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454103\\\\1754454103_small.jpg\"},\"directory\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454103\",\"currentImage\":\"medium\"}', 1, 'کاسیو', '2025-08-06 04:21:44', '2025-08-06 04:21:44', NULL),
(6, 'جی پلاس', 'Gplus', 'gplus', '{\"indexArray\":{\"large\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454186\\\\1754454186_large.jpg\",\"medium\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454186\\\\1754454186_medium.jpg\",\"small\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454186\\\\1754454186_small.jpg\"},\"directory\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454186\",\"currentImage\":\"medium\"}', 1, 'Gplus', '2025-08-06 04:23:06', '2025-08-06 04:23:06', NULL),
(7, 'لوجیتک', 'logitech', 'logitech', '{\"indexArray\":{\"large\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454216\\\\1754454216_large.jpg\",\"medium\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454216\\\\1754454216_medium.jpg\",\"small\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454216\\\\1754454216_small.jpg\"},\"directory\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454216\",\"currentImage\":\"medium\"}', 1, 'logitech', '2025-08-06 04:23:36', '2025-08-06 04:23:36', NULL),
(8, 'نوکیا', 'Nokia', 'nokia', '{\"indexArray\":{\"large\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454291\\\\1754454291_large.jpg\",\"medium\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454291\\\\1754454291_medium.jpg\",\"small\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454291\\\\1754454291_small.jpg\"},\"directory\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454291\",\"currentImage\":\"medium\"}', 1, 'نوکیا', '2025-08-06 04:24:51', '2025-08-06 04:24:51', NULL),
(9, 'پاکشوما', 'Pakshoma', 'pakshoma', '{\"indexArray\":{\"large\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454329\\\\1754454329_large.png\",\"medium\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454329\\\\1754454329_medium.png\",\"small\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454329\\\\1754454329_small.png\"},\"directory\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454329\",\"currentImage\":\"medium\"}', 1, 'پاکشوما', '2025-08-06 04:25:29', '2025-08-06 04:25:29', NULL),
(10, 'پاناسونیک', 'Panasonic', 'panasonic', '{\"indexArray\":{\"large\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454366\\\\1754454366_large.png\",\"medium\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454366\\\\1754454366_medium.png\",\"small\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454366\\\\1754454366_small.png\"},\"directory\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454366\",\"currentImage\":\"medium\"}', 1, 'پاناسونیک', '2025-08-06 04:26:06', '2025-08-06 04:26:06', NULL),
(11, 'پارس خزر', 'Pars Khazar', 'pars-khazar', '{\"indexArray\":{\"large\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454399\\\\1754454399_large.png\",\"medium\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454399\\\\1754454399_medium.png\",\"small\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454399\\\\1754454399_small.png\"},\"directory\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454399\",\"currentImage\":\"small\"}', 1, 'پارس خزر', '2025-08-06 04:26:39', '2025-08-06 04:29:38', NULL),
(12, 'سامسونگ', 'Samsung', 'samsung', '{\"indexArray\":{\"large\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454435\\\\1754454435_large.png\",\"medium\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454435\\\\1754454435_medium.png\",\"small\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454435\\\\1754454435_small.png\"},\"directory\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454435\",\"currentImage\":\"medium\"}', 1, 'سامسونگ', '2025-08-06 04:27:16', '2025-08-06 04:27:16', NULL),
(13, 'اسنوا', 'Snowa', 'snowa', '{\"indexArray\":{\"large\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454468\\\\1754454468_large.png\",\"medium\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454468\\\\1754454468_medium.png\",\"small\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454468\\\\1754454468_small.png\"},\"directory\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454468\",\"currentImage\":\"medium\"}', 1, 'اسنوا,snowa', '2025-08-06 04:27:48', '2025-08-06 04:27:48', NULL),
(14, 'ایکس ویژن', 'Xvision', 'xvision', '{\"indexArray\":{\"large\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454506\\\\1754454506_large.png\",\"medium\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454506\\\\1754454506_medium.png\",\"small\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454506\\\\1754454506_small.png\"},\"directory\":\"images\\\\brand\\\\2025\\\\08\\\\06\\\\1754454506\",\"currentImage\":\"medium\"}', 1, 'ایکس ویژن', '2025-08-06 04:28:26', '2025-08-06 04:28:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `color_id` bigint UNSIGNED DEFAULT NULL,
  `guarantee_id` bigint UNSIGNED DEFAULT NULL,
  `number` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `user_id`, `product_id`, `color_id`, `guarantee_id`, `number`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, 11, 9, 4, 2, 4, '2025-08-17 10:45:02', '2025-08-20 04:07:58', NULL),
(17, 11, 8, NULL, NULL, 1, '2025-08-18 10:37:33', '2025-08-18 10:37:33', NULL),
(18, 11, 7, NULL, NULL, 1, '2025-08-18 10:38:02', '2025-08-18 10:38:02', NULL),
(19, 11, 6, NULL, NULL, 1, '2025-08-18 10:38:18', '2025-08-20 04:07:58', NULL),
(20, 12, 8, NULL, NULL, 1, '2025-08-25 06:54:12', '2025-08-25 06:54:12', NULL),
(21, 13, 9, 4, 2, 1, '2025-08-25 06:58:41', '2025-08-25 06:58:41', NULL),
(22, 14, 8, NULL, NULL, 1, '2025-08-26 03:00:04', '2025-08-26 03:00:04', NULL),
(23, 7, 9, 4, 2, 1, '2025-08-26 09:14:44', '2025-08-26 09:14:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart_item_selected_attributes`
--

CREATE TABLE `cart_item_selected_attributes` (
  `id` bigint UNSIGNED NOT NULL,
  `cart_item_id` bigint UNSIGNED NOT NULL,
  `category_attribute_id` bigint UNSIGNED NOT NULL,
  `category_value_id` bigint UNSIGNED NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cash_payments`
--

CREATE TABLE `cash_payments` (
  `id` bigint UNSIGNED NOT NULL,
  `amount` decimal(20,3) NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `cash_receiver` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_date` timestamp NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_attributes`
--

CREATE TABLE `category_attributes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint NOT NULL DEFAULT '0',
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_attributes`
--

INSERT INTO `category_attributes` (`id`, `name`, `type`, `unit`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'اندازه صفحه', 0, 'اینچ', 1, '2025-07-13 14:27:07', '2025-08-10 03:16:42', '2025-08-10 03:16:42'),
(2, 'سیستم عامل', 0, 'اندروید', 2, '2025-08-10 03:17:54', '2025-08-10 03:21:53', '2025-08-10 03:21:53'),
(3, 'حافظه', 0, 'گیگ', 2, '2025-08-10 03:21:48', '2025-08-10 03:21:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_attribute_default_values`
--

CREATE TABLE `category_attribute_default_values` (
  `id` bigint UNSIGNED NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_attribute_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_values`
--

CREATE TABLE `category_values` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `category_attribute_id` bigint UNSIGNED NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint NOT NULL DEFAULT '0' COMMENT 'value type is 0 => simple, 1 => multi values select by customers (affected on price)',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_values`
--

INSERT INTO `category_values` (`id`, `product_id`, `category_attribute_id`, `value`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '{\"value\":\"9\",\"price_increase\":\"500000\"}', 0, '2025-07-13 14:29:34', '2025-07-13 14:29:34', NULL),
(2, 9, 3, '{\"value\":\"8\",\"price_increase\":\"10000000\"}', 0, '2025-08-10 03:22:14', '2025-08-12 03:03:28', NULL),
(3, 2, 3, '{\"value\":\"16\",\"price_increase\":\"20000000\"}', 0, '2025-08-10 03:22:28', '2025-08-12 03:03:19', '2025-08-12 03:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `province_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'بستک', 1, NULL, NULL, NULL),
(2, 'بندرعباس', 1, NULL, NULL, NULL),
(3, 'رودان', 1, NULL, NULL, NULL),
(4, 'جاسک', 1, NULL, NULL, NULL),
(5, 'داراب', 2, NULL, NULL, NULL),
(6, 'لارستان', 2, NULL, NULL, NULL),
(7, 'جهرم', 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `author_id` bigint UNSIGNED NOT NULL,
  `commentable_id` bigint UNSIGNED NOT NULL,
  `commentable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen` tinyint NOT NULL DEFAULT '0' COMMENT '0 => unseen, 1 => seen',
  `approved` tinyint NOT NULL DEFAULT '0' COMMENT '0 => not approved, 1 => approved',
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `body`, `parent_id`, `author_id`, `commentable_id`, `commentable_type`, `seen`, `approved`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(15, 'عالی', NULL, 7, 9, 'App\\Models\\Market\\Product', 1, 1, 1, '2025-08-10 11:24:55', '2025-08-12 02:57:05', NULL),
(17, 'خرسندیم', 15, 1, 9, 'App\\Models\\Market\\Product', 1, 1, 1, '2025-08-12 02:52:34', '2025-08-12 02:52:34', NULL),
(18, 'مرسی', NULL, 10, 9, 'App\\Models\\Market\\Product', 1, 1, 0, '2025-08-12 03:00:37', '2025-08-17 09:11:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `common_discount`
--

CREATE TABLE `common_discount` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` int NOT NULL,
  `discount_ceiling` bigint UNSIGNED DEFAULT NULL,
  `minimal_order_amount` bigint UNSIGNED DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `copans`
--

CREATE TABLE `copans` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_type` tinyint NOT NULL DEFAULT '0' COMMENT '0 => percentage, 1 => price unit',
  `discount_ceiling` bigint UNSIGNED DEFAULT NULL,
  `type` tinyint NOT NULL DEFAULT '0' COMMENT '0 => common (each user can use one time), 1 => private (one user can use one time)',
  `status` tinyint NOT NULL DEFAULT '0',
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `copans`
--

INSERT INTO `copans` (`id`, `code`, `amount`, `amount_type`, `discount_ceiling`, `type`, `status`, `start_date`, `end_date`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'iran', '50', 0, 0, 0, 0, '2025-07-18 12:16:05', '2025-07-18 12:16:05', 1, '2025-07-18 12:15:16', NULL, NULL),
(2, 'takhfif-p', '80', 0, 1000000, 0, 1, '2025-06-21 16:13:48', '2025-06-27 16:13:48', NULL, '2025-07-18 16:19:18', '2025-07-18 16:19:18', NULL),
(4, 'sddsadsa', '20', 0, 2000000, 0, 0, '2025-07-18 16:25:23', '2025-07-18 16:25:23', 1, '2025-07-18 16:28:32', '2025-07-18 16:28:32', NULL),
(5, 'sddsadsa', '30', 0, 2000000, 0, 0, '2025-07-18 16:25:23', '2025-07-18 16:25:23', 1, '2025-07-18 16:29:25', '2025-07-18 16:29:25', NULL),
(6, 'salam', '90', 0, 2000000, 0, 0, '2025-07-18 16:31:17', '2025-07-18 16:31:17', NULL, '2025-07-18 16:31:33', '2025-07-18 16:31:33', NULL),
(7, 'hi', '60', 0, 667767667, 0, 1, '2025-07-18 16:32:11', '2025-07-18 16:32:11', NULL, '2025-07-18 16:32:15', '2025-07-18 16:32:15', NULL),
(8, 'hi', '40', 0, 800000, 1, 1, '2025-07-18 16:32:20', '2025-07-18 16:32:20', 1, '2025-07-18 16:32:54', '2025-07-18 16:32:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(20,3) DEFAULT NULL,
  `delivery_time` int DEFAULT NULL,
  `delivery_time_unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `tags` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guarantees`
--

CREATE TABLE `guarantees` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `price_increase` decimal(8,2) NOT NULL DEFAULT '0.00',
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guarantees`
--

INSERT INTO `guarantees` (`id`, `name`, `product_id`, `price_increase`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'گارانتی برتر', 1, 15000.00, 0, '2025-08-04 17:12:25', '2025-08-04 17:13:08', '2025-08-04 17:13:08'),
(2, 'گارانتی سازگار', 9, 20000.00, 0, '2025-08-09 03:51:36', '2025-08-09 03:51:36', NULL),
(3, 'گارانتی برتر', 9, 0.00, 0, '2025-08-09 03:51:50', '2025-08-09 03:51:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2025_03_22_041818_create_sessions_table', 1),
(7, '2025_03_22_050944_create_post_categories_table', 1),
(8, '2025_03_22_051151_create_posts_table', 1),
(9, '2025_03_22_073439_create_menus_table', 1),
(10, '2025_03_22_075823_create_faqs_table', 1),
(11, '2025_03_23_033256_create_pages_table', 1),
(12, '2025_03_23_044232_create_comments_table', 1),
(13, '2025_03_23_060956_create_ticket_categories_table', 1),
(14, '2025_03_23_062207_create_ticket_priorities_table', 1),
(15, '2025_03_23_063127_create_ticket_admins_table', 1),
(16, '2025_03_23_091948_create_tickets_table', 1),
(17, '2025_03_23_094447_create_ticket_files_table', 1),
(18, '2025_03_24_031137_create_roles_table', 1),
(19, '2025_03_24_031349_create_permissions_table', 1),
(20, '2025_03_24_094520_create_role_user_table', 1),
(21, '2025_03_24_094529_create_permission_role_table', 1),
(22, '2025_03_26_035952_create_product_categories_table', 1),
(23, '2025_03_26_040308_create_brands_table', 1),
(24, '2025_03_26_095350_create_category_attributes_table', 1),
(25, '2025_03_26_100046_create_category_attribute_default_values_table', 1),
(26, '2025_03_26_100455_create_products_table', 1),
(27, '2025_04_05_114129_create_product_images_table', 1),
(28, '2025_04_05_114442_create_guarantees_table', 1),
(29, '2025_04_05_114650_create_product_colors_table', 1),
(30, '2025_04_05_114923_create_category_values_table', 1),
(31, '2025_04_05_114952_create_product_meta_table', 1),
(32, '2025_04_06_050548_create_copans_table', 1),
(33, '2025_04_06_095801_create_amazing_sales_table', 1),
(34, '2025_04_06_100853_create_common_discount_table', 1),
(35, '2025_04_08_034434_create_provinces_table', 1),
(36, '2025_04_08_041354_create_cities_table', 1),
(37, '2025_04_08_041540_create_addresses_table', 1),
(38, '2025_04_08_041813_create_delivery_table', 1),
(39, '2025_04_08_100900_create_public_sms_table', 1),
(40, '2025_04_08_101054_create_public_mail_table', 1),
(41, '2025_04_08_101228_create_public_mail_files_table', 1),
(42, '2025_04_08_101631_create_product_user_table', 1),
(43, '2025_04_09_040515_create_offline_payments_table', 1),
(44, '2025_04_09_040547_create_online_payments_table', 1),
(45, '2025_04_09_040612_create_cash_payments_table', 1),
(46, '2025_04_09_040646_create_payments_table', 1),
(47, '2025_04_11_133448_create_cart_items_table', 1),
(48, '2025_04_11_134007_create_cart_item_selected_attributes_table', 1),
(49, '2025_04_12_091158_create_orders_table', 1),
(50, '2025_04_13_045502_create_order_items_table', 1),
(51, '2025_04_13_112836_create_order_item_selected_attributes_table', 1),
(52, '2025_06_08_104748_create_settings_table', 1),
(53, '2025_07_23_174041_create_notifications_table', 2),
(54, '2025_07_24_215042_create_otps_table', 3),
(55, '2025_07_25_081104_add_mobile_verify_to_users_table', 3),
(56, '2025_08_03_111620_create_banners_table', 4),
(58, '2025_08_04_200812_add_color_to_product_colors_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('adbf90c7-79c5-4e11-a5a3-8756cdae8603', 'App\\Notifications\\NewUserRegistered', 'App\\Models\\User', 2, '{\"message\":\"\\u06cc\\u06a9 \\u06a9\\u0627\\u0631\\u0628\\u0631 \\u062c\\u062f\\u06cc\\u062f \\u062f\\u0631 \\u0633\\u0627\\u06cc\\u062a \\u062b\\u0628\\u062a \\u0646\\u0627\\u0645 \\u06a9\\u0631\\u062f\"}', '2025-07-23 18:52:59', '2025-07-23 16:53:32', '2025-07-23 18:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `offline_payments`
--

CREATE TABLE `offline_payments` (
  `id` bigint UNSIGNED NOT NULL,
  `amount` decimal(20,3) NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_date` timestamp NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `online_payments`
--

CREATE TABLE `online_payments` (
  `id` bigint UNSIGNED NOT NULL,
  `amount` decimal(20,3) NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `geteway` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_first_response` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `bank_second_response` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `address_id` bigint UNSIGNED DEFAULT NULL,
  `address_object` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payment_id` bigint UNSIGNED DEFAULT NULL,
  `payment_object` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payment_type` tinyint NOT NULL DEFAULT '0',
  `payment_status` tinyint NOT NULL DEFAULT '0',
  `delivery_id` bigint UNSIGNED DEFAULT NULL,
  `delivery_object` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `delievry_amount` decimal(20,3) DEFAULT NULL,
  `delievry_status` tinyint NOT NULL DEFAULT '0',
  `delivery_date` timestamp NULL DEFAULT NULL,
  `order_final_amount` decimal(20,3) DEFAULT NULL,
  `order_discount_amount` decimal(20,3) DEFAULT NULL,
  `copan_id` bigint UNSIGNED DEFAULT NULL,
  `copon_object` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `order_copon_discount_amount` decimal(20,3) DEFAULT NULL,
  `common_discount_id` bigint UNSIGNED DEFAULT NULL,
  `common_discount_object` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `order_common_discount_amount` decimal(20,3) DEFAULT NULL,
  `order_total_products_discount_amount` decimal(20,3) DEFAULT NULL,
  `order_status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `product` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amazing_sale_id` bigint UNSIGNED DEFAULT NULL,
  `amazing_sale_object` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amazing_sale_discount_amount` decimal(20,3) DEFAULT NULL,
  `number` int NOT NULL DEFAULT '1',
  `final_product_price` decimal(20,3) DEFAULT NULL,
  `final_total_price` decimal(20,3) DEFAULT NULL COMMENT 'number * final_product_price',
  `color_id` bigint UNSIGNED DEFAULT NULL,
  `guarantee_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_item_selected_attributes`
--

CREATE TABLE `order_item_selected_attributes` (
  `id` bigint UNSIGNED NOT NULL,
  `order_item_id` bigint UNSIGNED NOT NULL,
  `category_attribute_id` bigint UNSIGNED NOT NULL,
  `category_value_id` bigint UNSIGNED NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` bigint UNSIGNED NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `otp_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'email address or mobile number',
  `type` tinyint NOT NULL DEFAULT '0' COMMENT '0 => mobile, 1 => email',
  `used` tinyint NOT NULL DEFAULT '0' COMMENT '0 => not used, 1 => used',
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`id`, `token`, `user_id`, `otp_code`, `login_id`, `type`, `used`, `status`, `created_at`, `updated_at`) VALUES
(44, 'jRwS2J5ZMgHMd3Swv6xXWwhOMSDmkyI6Aqqz1OJKWX1hYd3IDN5fEQIPGBee', 7, '4500', '9170766430', 0, 1, 0, '2025-08-10 08:20:24', '2025-08-10 08:20:42'),
(45, 'lytsWQOMR4MXCk87lVFJaVmXpPMIdpitU8tcrBu8xGbTsaYlOHrxwKLHbzvb', 10, '5033', 'a.rahmanpour@gmail.com', 1, 1, 0, '2025-08-12 02:51:10', '2025-08-12 02:51:30'),
(46, 'QyQe4Zysdnza1HhJEtWOTOOHebCTjxIkHM1Ixl5sEV1A0iy6FH6XvvrpQlQZ', 10, '9351', 'a.rahmanpour@gmail.com', 1, 1, 0, '2025-08-13 07:37:16', '2025-08-13 07:37:58'),
(47, 'I3F7IeMruHq55qsNas9f8e5LuycA2mxVJQHZlIWE8Git8at0nsuCnAIhFx0s', 10, '9815', 'a.rahmanpour@gmail.com', 1, 0, 0, '2025-08-13 11:08:44', '2025-08-13 11:08:44'),
(48, 'Wsa0J76x2Ufv1MiWRjX7lwQoYdxthGxjjZrczLw41XquCbTLfDVpLRMnIe3G', 10, '1354', 'a.rahmanpour@gmail.com', 1, 1, 0, '2025-08-13 11:10:12', '2025-08-13 11:10:30'),
(49, 'a7P1fEtqk3LJWMoeqaLqvWKPkxBKe9Q6WTRWDGZgompOAG6P9zbi9JDa1ZdC', 11, '8448', 'a.rahmanpour.dev@gmail.com', 1, 0, 0, '2025-08-17 08:49:57', '2025-08-17 08:49:57'),
(50, 'vtHUGdtBccir0fbg6MniEuVBMcZgkSBDnL25blnb5lBTL20f5WzTtk5UBujv', 11, '9158', 'a.rahmanpour.dev@gmail.com', 1, 1, 0, '2025-08-17 09:08:16', '2025-08-17 09:08:42'),
(51, 'uWQHM085HgtQOWDu6XJZeQSA3HzVH7ln1L6Hhs4eiJsxShNIjHT09GiZvshM', 11, '1777', 'a.rahmanpour.dev@gmail.com', 1, 0, 0, '2025-08-17 11:24:50', '2025-08-17 11:24:50'),
(52, 'VSpJSTbZ7SYKZD5gMT4VfSLCl6qQr74mgZhClhAn8ynEVeadpp2VoOLz58J1', 11, '1683', 'a.rahmanpour.dev@gmail.com', 1, 0, 0, '2025-08-18 08:35:02', '2025-08-18 08:35:02'),
(53, 'D0MOB2On0hs3J1QBf2v5opwbU6B1K1YcX4HuZoBtkHdToAmldyX4AJvBZhHw', 7, '3112', '9170766430', 0, 0, 0, '2025-08-18 08:36:26', '2025-08-18 08:36:26'),
(54, 'u8efxZDC79bignMWEz1efXEfgOxW1J91ROPE8KQcPFLdeU0XVNN7cATzOWNf', 11, '5850', 'a.rahmanpour.dev@gmail.com', 1, 1, 0, '2025-08-18 08:37:47', '2025-08-18 08:38:05'),
(55, 'Z8w7JSj3zsH27AIJ1ZQ65qwi0qlpgFjcXPV3mxuQG9XfpAlWPujITiepzMfJ', 11, '6288', 'a.rahmanpour.dev@gmail.com', 1, 0, 0, '2025-08-18 08:41:09', '2025-08-18 08:41:09'),
(56, 'CcNtmycPGQJAy11ZuOikg3f3U8Lb6k13ezNQxjqJRdB3OMgyF2ZgCJRh5A64', 11, '3622', 'a.rahmanpour.dev@gmail.com', 1, 0, 0, '2025-08-18 08:41:32', '2025-08-18 08:41:32'),
(57, 'CUupqO2pxoezEHGbZZRP5nafblvjMfh6HYEN0w8DeIoKv7bLnvA2MCJxTeMO', 11, '3284', 'a.rahmanpour.dev@gmail.com', 1, 1, 0, '2025-08-18 08:41:55', '2025-08-18 08:42:17'),
(58, 'K8af7vpS21CoOzbe051DtcgUFTyGnYoca0IkbahsBw6uZd80peDymF4JNpxt', 11, '5066', 'a.rahmanpour.dev@gmail.com', 1, 1, 0, '2025-08-20 03:09:06', '2025-08-20 03:09:42'),
(59, 'VtlGo96cL67CLD5BBL57A1YLz8U1Y1o08thxRhvdbmzgMdbpcUAzkEZJvtHK', 7, '1481', '9170766430', 0, 0, 0, '2025-08-20 08:49:37', '2025-08-20 08:49:37'),
(60, '2mb8mPUQ7ViiV8dOqbL9QsamEXtkUP06jFM4qMCchDoVuevuK8UDFOWljda4', 11, '7488', 'a.rahmanpour.dev@gmail.com', 1, 1, 0, '2025-08-20 08:50:47', '2025-08-20 08:53:18'),
(61, 'bbZHyoEtlwK8qpTqizB3IyeVlyXpwvceEs6C5N5FwYTTtnOG7am7x1iDTWpv', 11, '5069', 'a.rahmanpour.dev@gmail.com', 1, 1, 0, '2025-08-20 10:59:59', '2025-08-20 11:00:27'),
(62, 'GpJep8tsr4job6zdEsRfiXSTsBbT2on7BSMdkR9BsUW5eefeiABbI2bgHXZl', 12, '3825', 'a.abdi@gmail.com', 1, 1, 0, '2025-08-25 06:53:34', '2025-08-25 06:53:53'),
(63, 'l1tNVO2LzKVWogAxhda0Z0NsNGzK4LkgRW8rZOuauqTVFmntXzM871klwpRK', 13, '3078', 's.saeidi@gmail.com', 1, 1, 0, '2025-08-25 06:58:18', '2025-08-25 06:58:32'),
(64, 'o7tiYYqaOkwDHS5S9V9hJEezWfY4jO2g8fBVJL760hlolPsG5KLBk1BkQ39c', 11, '6279', 'a.rahmanpour.dev@gmail.com', 1, 1, 0, '2025-08-25 09:08:33', '2025-08-25 09:08:49'),
(65, 'BaeRbz6CNA6RLxEBcLoCgX3PfQ7GXHCgXQ6Ojck63yLmQ7xrnfCBQmaZ2PLx', 11, '3947', 'a.rahmanpour.dev@gmail.com', 1, 0, 0, '2025-08-26 02:57:38', '2025-08-26 02:57:38'),
(66, 'qYSXDxj2F0fl2fakVUNuWNyx3LyyvfUdbj5Cs8Jt38UPH9tdxcFa2h7QHRV9', 11, '5220', 'a.rahmanpour.dev@gmail.com', 1, 0, 0, '2025-08-26 02:58:00', '2025-08-26 02:58:00'),
(67, 't4yRhHXftm5BxZv0PWYLVyjxa9iAGwmcABl6VqUHZ3xDR1PBVXoHVAx6qBce', 14, '9110', '9011612020', 0, 1, 0, '2025-08-26 02:58:26', '2025-08-26 02:59:46'),
(68, 'yf0QDjvPBsmJutbiqVBmz3mG6t98CnnfjwOmJpzIxj4kqBKkim5hDDOmP77o', 11, '6826', 'a.rahmanpour.dev@gmail.com', 1, 0, 0, '2025-08-26 09:06:14', '2025-08-26 09:06:14'),
(69, 'SMy6BizaQBdwTQpDH7pAjCHkEVnGfeJCGGwERpjMyBkzOOxPg48jFXswR5yB', 7, '9340', '9170766430', 0, 0, 0, '2025-08-26 09:06:38', '2025-08-26 09:06:38'),
(70, 'gpPY8HKF7z6OKlNB6nsUqsBaZgO4W7dzryHyZRc75miXtLH7beFRHiuvx5jA', 11, '3142', 'a.rahmanpour.dev@gmail.com', 1, 0, 0, '2025-08-26 09:13:15', '2025-08-26 09:13:15'),
(71, 'nvEgRUWzOyHpe9RdegRnnktUk8Qjf85ulOsfmyCYYBSSlMiTVXjbjrRLGVMN', 7, '3753', '9170766430', 0, 1, 0, '2025-08-26 09:13:44', '2025-08-26 09:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` bigint DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `tags` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `amount` decimal(20,3) NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `type` tinyint NOT NULL DEFAULT '0' COMMENT '0 => online, 1 => offline, 2 => cash',
  `paymentable_id` bigint UNSIGNED NOT NULL,
  `paymentable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ایجاد پست', 'ایجاد پست', 1, '2025-06-30 15:31:25', NULL, NULL),
(2, 'ویرایش پست', 'ویرایش پست', 1, '2025-06-30 15:31:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint UNSIGNED NOT NULL,
  `permission_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`, `created_at`) VALUES
(2, 1, '2025-06-30 15:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `commentable` tinyint NOT NULL DEFAULT '0' COMMENT '0 => uncommentable, 1 => commentable',
  `tags` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NOT NULL,
  `author_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `tags` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `length` decimal(10,1) NOT NULL COMMENT 'cm unit',
  `width` decimal(10,1) NOT NULL COMMENT 'cm unit',
  `height` decimal(10,1) NOT NULL COMMENT 'cm unit',
  `price` decimal(20,3) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `marketable` tinyint NOT NULL DEFAULT '1' COMMENT '1 => marketable, 0 => is not marketable',
  `tags` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sold_number` tinyint NOT NULL DEFAULT '0',
  `frozen_number` tinyint NOT NULL DEFAULT '0',
  `marketable_number` tinyint NOT NULL DEFAULT '0',
  `brand_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `published_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `introduction`, `slug`, `image`, `weight`, `length`, `width`, `height`, `price`, `status`, `marketable`, `tags`, `sold_number`, `frozen_number`, `marketable_number`, `brand_id`, `category_id`, `published_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'آیفون 13', '<p>توضیحات آیفون</p>', 'آیفون-13', '{\"indexArray\":{\"large\":\"images\\\\product\\\\2025\\\\07\\\\13\\\\1752416796\\\\1752416796_large.png\",\"medium\":\"images\\\\product\\\\2025\\\\07\\\\13\\\\1752416796\\\\1752416796_medium.png\",\"small\":\"images\\\\product\\\\2025\\\\07\\\\13\\\\1752416796\\\\1752416796_small.png\"},\"directory\":\"images\\\\product\\\\2025\\\\07\\\\13\\\\1752416796\",\"currentImage\":\"medium\"}', 8.00, 8.0, 8.0, 8.0, 50000000.000, 1, 1, 'آیفون', 0, 0, 0, 1, 1, '2025-07-13 14:25:32', '2025-07-13 14:26:37', '2025-08-05 16:07:54', '2025-08-05 16:07:54'),
(2, 'گوشی موبایل شیائومی مدل POCO X3 Pro M2102J20SG', '<p>گوشی موبایل شیائومی مدل POCO X3 Pro M2102J20SG بسیار باکیفیت می باشد.</p>', 'osh-mob-l-sh-om-mdl-poco-x3-pro-m2102j20sg', '{\"indexArray\":{\"large\":\"images\\\\product\\\\2025\\\\08\\\\05\\\\1754413283\\\\1754413283_large.jpg\",\"medium\":\"images\\\\product\\\\2025\\\\08\\\\05\\\\1754413283\\\\1754413283_medium.jpg\",\"small\":\"images\\\\product\\\\2025\\\\08\\\\05\\\\1754413283\\\\1754413283_small.jpg\"},\"directory\":\"images\\\\product\\\\2025\\\\08\\\\05\\\\1754413283\",\"currentImage\":\"medium\"}', 1.00, 9.0, 5.0, 9.0, 16000000.000, 1, 1, 'poco,موبایل', 0, 0, 0, 2, 2, '2025-08-05 17:01:14', '2025-08-05 16:51:28', '2025-08-05 17:01:23', NULL),
(3, 'گوشی موبایل شیائومی مدل POCO M3 M2010J19CG', '<p>گوشی موبایل شیائومی مدل POCO M3 M2010J19CG دو سیم&zwnj; کارت دارای قابلیت های بسیاری می باشد.</p>', 'osh-mob-l-sh-om-mdl-poco-m3-m2010j19cg', '{\"indexArray\":{\"large\":\"images\\\\product\\\\2025\\\\08\\\\05\\\\1754413775\\\\1754413775_large.jpg\",\"medium\":\"images\\\\product\\\\2025\\\\08\\\\05\\\\1754413775\\\\1754413775_medium.jpg\",\"small\":\"images\\\\product\\\\2025\\\\08\\\\05\\\\1754413775\\\\1754413775_small.jpg\"},\"directory\":\"images\\\\product\\\\2025\\\\08\\\\05\\\\1754413775\",\"currentImage\":\"medium\"}', 1.00, 9.0, 5.0, 9.0, 9000000.000, 1, 1, 'شیائومی,موبایل', 0, 0, 0, 2, 2, '2025-08-05 17:09:20', '2025-08-05 17:09:36', '2025-08-05 17:09:36', NULL),
(4, 'کیف هندزفری جانتا مدل 141مجموعه 3 عددی', '<p>کیف هندزفری جانتا مدل 141مجموعه 3 عددی بسیار با کیفیت و جادار می باشد.</p>', 'f-hndzfr-g-nt-mdl-141mgmoaah-3-aadd', '{\"indexArray\":{\"large\":\"images\\\\product\\\\2025\\\\08\\\\06\\\\1754466516\\\\1754466516_large.jpg\",\"medium\":\"images\\\\product\\\\2025\\\\08\\\\06\\\\1754466516\\\\1754466516_medium.jpg\",\"small\":\"images\\\\product\\\\2025\\\\08\\\\06\\\\1754466516\\\\1754466516_small.jpg\"},\"directory\":\"images\\\\product\\\\2025\\\\08\\\\06\\\\1754466516\",\"currentImage\":\"medium\"}', 2.00, 15.0, 10.0, 7.0, 370000.000, 1, 1, 'کیف', 0, 0, 0, 6, 3, '2025-08-06 07:45:52', '2025-08-06 07:48:36', '2025-08-06 07:48:36', NULL),
(5, 'کیف رودوشی چرم جانتا مدل D078', '<p>کیف رودوشی چرم جانتا مدل D078 بسیار کاربردی میباشد.</p>', 'f-rodosh-rm-g-nt-mdl-d078', '{\"indexArray\":{\"large\":\"images\\\\product\\\\2025\\\\08\\\\06\\\\1754466636\\\\1754466636_large.jpg\",\"medium\":\"images\\\\product\\\\2025\\\\08\\\\06\\\\1754466636\\\\1754466636_medium.jpg\",\"small\":\"images\\\\product\\\\2025\\\\08\\\\06\\\\1754466636\\\\1754466636_small.jpg\"},\"directory\":\"images\\\\product\\\\2025\\\\08\\\\06\\\\1754466636\",\"currentImage\":\"medium\"}', 1.00, 14.0, 20.0, 15.0, 760000.000, 1, 1, 'کیف,رودوشی', 0, 0, 0, 6, 3, '2025-08-06 07:49:00', '2025-08-06 07:50:37', '2025-08-06 07:50:37', NULL),
(6, 'مجموعه کتاب من پیش از تو پس از تو باز هم من', '<p>مجموعه کتاب من پیش از تو، پس از تو، باز هم من یکی از جذاب ترین کتاب ها می باشد.</p>', 'mgmoaah-t-b-mn-sh-z-to-s-z-to-b-z-hm-mn', '{\"indexArray\":{\"large\":\"images\\\\product\\\\2025\\\\08\\\\06\\\\1754466925\\\\1754466925_large.jpg\",\"medium\":\"images\\\\product\\\\2025\\\\08\\\\06\\\\1754466925\\\\1754466925_medium.jpg\",\"small\":\"images\\\\product\\\\2025\\\\08\\\\06\\\\1754466925\\\\1754466925_small.jpg\"},\"directory\":\"images\\\\product\\\\2025\\\\08\\\\06\\\\1754466925\",\"currentImage\":\"medium\"}', 1.00, 30.0, 25.0, 30.0, 240000.000, 1, 1, 'کتاب', 0, 0, 3, 11, 4, '2025-08-06 07:54:58', '2025-08-06 07:55:26', '2025-08-18 10:37:16', NULL),
(7, 'کتاب سلخ اثر غزاله شکوهی', '<p>کتاب سلخ اثر غزاله شکوهی یکی از جدیدترین کتاب ها می باشد.</p>', 't-b-slkh-thr-ghz-lh-sh-oh', '{\"indexArray\":{\"large\":\"images\\\\product\\\\2025\\\\08\\\\06\\\\1754467032\\\\1754467032_large.jpg\",\"medium\":\"images\\\\product\\\\2025\\\\08\\\\06\\\\1754467032\\\\1754467032_medium.jpg\",\"small\":\"images\\\\product\\\\2025\\\\08\\\\06\\\\1754467032\\\\1754467032_small.jpg\"},\"directory\":\"images\\\\product\\\\2025\\\\08\\\\06\\\\1754467032\",\"currentImage\":\"medium\"}', 1.00, 30.0, 25.0, 30.0, 210000.000, 1, 1, 'کتاب', 0, 0, 1, 11, 4, '2025-08-06 07:56:06', '2025-08-06 07:57:12', '2025-08-18 10:36:56', NULL),
(8, 'کتاب تختخوابت را مرتب کن اثر ژنرال ویلیام مک ریون', '<p>کتاب تختخوابت را مرتب کن اثر ژنرال ویلیام مک ریون یکی از تاثیرگذاترین کتاب ها می باشد.</p>', 't-b-tkhtkho-bt-r-mrtb-n-thr-nr-l-o-l-m-m-r-on', '{\"indexArray\":{\"large\":\"images\\\\product\\\\2025\\\\08\\\\06\\\\1754467219\\\\1754467219_large.jpg\",\"medium\":\"images\\\\product\\\\2025\\\\08\\\\06\\\\1754467219\\\\1754467219_medium.jpg\",\"small\":\"images\\\\product\\\\2025\\\\08\\\\06\\\\1754467219\\\\1754467219_small.jpg\"},\"directory\":\"images\\\\product\\\\2025\\\\08\\\\06\\\\1754467219\",\"currentImage\":\"medium\"}', 1.00, 30.0, 25.0, 30.0, 345000.000, 1, 1, 'کتاب', 0, 0, 1, 11, 4, '2025-08-06 07:57:39', '2025-08-06 08:00:19', '2025-08-18 10:36:36', NULL),
(9, 'گوشی موبایل سامسونگ مدل Galaxy A12 SM-A125F DS', '<p>بدون هیچ تعریف اضافی باید بگوییم که تنوع بالای گوشی&zwnj;های هوشمند میان&zwnj;رده شرکت سامسونگ، پاسخ&zwnj;گوی سلایق مختلف با توقعات مختلف است که سامسونگ Galaxy A25 یکی از این میان&zwnj;رده&zwnj;ها است که به نسبت قیمت در نظر گرفته شده، از مشخصات فنی بسیار مناسب و کاملا قابل قبولی بهره برده است. طراحی در نظر گرفته شده برای Galaxy A25، طراحی آشنایی است که پیش از این هم چنین طراحی را در گوشی&zwnj;های هوشمند سامسونگ شاهد بودیم. در نمای رو&zwnj;به&zwnj;رویی این گوشی به صفحه&zwnj;نمایش 6.5 اینچ با رزولوشن 1080&times;2340 پیکسل از نوع سوپرامولد مجهز شده است. صفحه&zwnj;نمایش با توانایی نمایش 396 پیکسل در هر اینچ، نرخ بروزرسانی 120 هرتز و حداکثر روشنایی 1000 نیت (nits). با توجه به مشخصات در نظر گرفته شده، با یکی از بهترین صفحات&zwnj;نمایش در بین گوشی&zwnj;های میان&zwnj;رده رو&zwnj;به&zwnj;رو هستید. در قسمت پشتی هم یک سنسور دوربین اصلی با رزولوشن 50 مگاپیکسل در کنار سنسور 8 مگاپیکسل فوق&zwnj;عریض و سنسور 2 مگاپیکسل ماکرو در نظر گرفته شده. دوربین اصلی این گوشی به&zwnj;خوبی توقعات شما را در حد و اندازه یک گوشی میا&zwnj;ن&zwnj;رده برای عکاسی نور روز و نور شب بر&zwnj;آورده می&zwnj;کند. فیلمبرداری 4K هم از دیگر مشخصات این گوشی است. دوربین سلفی 13 مگاپیکسل این گوشی هم عملکرد کاملا قابل قبولی دارد. در بخش مشخصات سخت&zwnj;افزاری هم این گوشی به پردازنده اگزینوس 1280 مجهز شده است. پردازنده&zwnj;ای که سبب شده تا این گوشی در اجرای بازی&zwnj;های محبوب و نرم&zwnj;افزار&zwnj;های کاربردی، عملکرد روان و بسیار خوبی داشته باشد. باتری با میزان ظرفیت 5000 میلی&zwnj;آمپر&zwnj;ساعت هم به ازای هر بار شارژ صد درصدی، زمان آماده به&zwnj;کار دو روز را در حالت استفاده معمولی در اختیارتان قرار می&zwnj;دهد. در مجموع باید بگوییم که اگر به دنبال خرید گوشی میان&zwnj;رده&zwnj;ای هستید که به صفحه&zwnj;نمایش بسیار باکیفیت، دوربین اصلی قدرتمند، پردازنده و باتری مناسب مجهز شده باشد، سامسونگ Galaxy A25 می&zwnj;تواند گزینه بسیار مناسبی برای شما باشد.</p>', 'osh-mob-l-s-mson-mdl-galaxy-a12-sm-a125f-ds', '{\"indexArray\":{\"large\":\"images\\\\product\\\\2025\\\\08\\\\06\\\\1754467383\\\\1754467383_large.jpg\",\"medium\":\"images\\\\product\\\\2025\\\\08\\\\06\\\\1754467383\\\\1754467383_medium.jpg\",\"small\":\"images\\\\product\\\\2025\\\\08\\\\06\\\\1754467383\\\\1754467383_small.jpg\"},\"directory\":\"images\\\\product\\\\2025\\\\08\\\\06\\\\1754467383\",\"currentImage\":\"medium\"}', 1.00, 15.0, 20.0, 20.0, 3799000.000, 1, 1, 'سامسونگ,موبایل', 0, 0, 10, 12, 2, '2025-08-10 02:58:29', '2025-08-06 08:03:04', '2025-08-10 02:58:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '0',
  `show_in_menu` tinyint NOT NULL DEFAULT '0',
  `tags` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `description`, `slug`, `image`, `status`, `show_in_menu`, `tags`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'لوازم الکترونیکی', '<p>توضیحات لوازم</p>', 'لوازم-الکترونیکی', '{\"indexArray\":{\"large\":\"images\\\\product-category\\\\2025\\\\07\\\\13\\\\1752416038\\\\1752416038_large.png\",\"medium\":\"images\\\\product-category\\\\2025\\\\07\\\\13\\\\1752416038\\\\1752416038_medium.png\",\"small\":\"images\\\\product-category\\\\2025\\\\07\\\\13\\\\1752416038\\\\1752416038_small.png\"},\"directory\":\"images\\\\product-category\\\\2025\\\\07\\\\13\\\\1752416038\",\"currentImage\":\"medium\"}', 1, 1, 'لوازم', NULL, '2025-07-13 14:14:01', '2025-08-05 16:47:43', '2025-08-05 16:47:43'),
(2, 'موبایل', '<p>موبایل</p>', 'mob-l', '{\"indexArray\":{\"large\":\"images\\\\product-category\\\\2025\\\\08\\\\06\\\\1754453944\\\\1754453944_large.jpg\",\"medium\":\"images\\\\product-category\\\\2025\\\\08\\\\06\\\\1754453944\\\\1754453944_medium.jpg\",\"small\":\"images\\\\product-category\\\\2025\\\\08\\\\06\\\\1754453944\\\\1754453944_small.jpg\"},\"directory\":\"images\\\\product-category\\\\2025\\\\08\\\\06\\\\1754453944\",\"currentImage\":\"medium\"}', 1, 1, 'موبایل', NULL, '2025-08-05 16:49:17', '2025-08-06 04:19:04', NULL),
(3, 'کیف', '<p>کیف</p>', 'f', '{\"indexArray\":{\"large\":\"images\\\\product-category\\\\2025\\\\08\\\\06\\\\1754453927\\\\1754453927_large.jpg\",\"medium\":\"images\\\\product-category\\\\2025\\\\08\\\\06\\\\1754453927\\\\1754453927_medium.jpg\",\"small\":\"images\\\\product-category\\\\2025\\\\08\\\\06\\\\1754453927\\\\1754453927_small.jpg\"},\"directory\":\"images\\\\product-category\\\\2025\\\\08\\\\06\\\\1754453927\",\"currentImage\":\"medium\"}', 1, 1, 'کیف', NULL, '2025-08-06 04:18:49', '2025-08-06 04:18:49', NULL),
(4, 'کتاب', '<p>کتاب</p>', 't-b', '{\"indexArray\":{\"large\":\"images\\\\product-category\\\\2025\\\\08\\\\06\\\\1754466704\\\\1754466704_large.jpg\",\"medium\":\"images\\\\product-category\\\\2025\\\\08\\\\06\\\\1754466704\\\\1754466704_medium.jpg\",\"small\":\"images\\\\product-category\\\\2025\\\\08\\\\06\\\\1754466704\\\\1754466704_small.jpg\"},\"directory\":\"images\\\\product-category\\\\2025\\\\08\\\\06\\\\1754466704\",\"currentImage\":\"medium\"}', 1, 1, 'کتاب', NULL, '2025-08-06 07:51:44', '2025-08-06 07:51:44', NULL),
(5, 'تست', '<p>تست تست</p>', 'tst', '{\"indexArray\":{\"large\":\"images\\\\product-category\\\\2025\\\\08\\\\10\\\\1754815211\\\\1754815211_large.jpg\",\"medium\":\"images\\\\product-category\\\\2025\\\\08\\\\10\\\\1754815211\\\\1754815211_medium.jpg\",\"small\":\"images\\\\product-category\\\\2025\\\\08\\\\10\\\\1754815211\\\\1754815211_small.jpg\"},\"directory\":\"images\\\\product-category\\\\2025\\\\08\\\\10\\\\1754815211\",\"currentImage\":\"medium\"}', 1, 0, 'تست', NULL, '2025-08-10 08:40:14', '2025-08-10 08:40:20', '2025-08-10 08:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint UNSIGNED NOT NULL,
  `color_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `price_increase` decimal(8,2) NOT NULL DEFAULT '0.00',
  `status` tinyint NOT NULL DEFAULT '0',
  `sold_number` tinyint NOT NULL DEFAULT '0',
  `frozen_number` tinyint NOT NULL DEFAULT '0',
  `marketable_number` bigint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `color_name`, `color`, `product_id`, `price_increase`, `status`, `sold_number`, `frozen_number`, `marketable_number`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'قرمز', NULL, 1, 10000.00, 0, 0, 0, 0, '2025-08-04 16:49:15', '2025-08-04 16:49:15', NULL),
(3, 'آبی', '#0754ed', 1, 45000.00, 0, 0, 0, 0, '2025-08-04 16:50:59', '2025-08-04 16:50:59', NULL),
(4, 'قرمز', '#f90606', 9, 250000.00, 0, 0, 0, 0, '2025-08-09 03:00:57', '2025-08-09 03:00:57', NULL),
(5, 'آبی', '#0a57f0', 9, 100000.00, 0, 0, 0, 0, '2025-08-09 03:01:25', '2025-08-09 03:20:29', '2025-08-09 03:20:29'),
(6, 'آبی', '#0623f9', 9, 100000.00, 0, 0, 0, 0, '2025-08-12 03:02:06', '2025-08-12 03:02:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '{\"indexArray\":{\"large\":\"images\\\\product-gallery\\\\2025\\\\08\\\\06\\\\1754478162\\\\1754478162_large.jpg\",\"medium\":\"images\\\\product-gallery\\\\2025\\\\08\\\\06\\\\1754478162\\\\1754478162_medium.jpg\",\"small\":\"images\\\\product-gallery\\\\2025\\\\08\\\\06\\\\1754478162\\\\1754478162_small.jpg\"},\"directory\":\"images\\\\product-gallery\\\\2025\\\\08\\\\06\\\\1754478162\",\"currentImage\":\"medium\"}', 9, '2025-08-06 11:02:42', '2025-08-09 07:53:00', '2025-08-09 07:53:00'),
(2, '{\"indexArray\":{\"large\":\"images\\\\product-gallery\\\\2025\\\\08\\\\06\\\\1754478466\\\\1754478466_large.jpg\",\"medium\":\"images\\\\product-gallery\\\\2025\\\\08\\\\06\\\\1754478466\\\\1754478466_medium.jpg\",\"small\":\"images\\\\product-gallery\\\\2025\\\\08\\\\06\\\\1754478466\\\\1754478466_small.jpg\"},\"directory\":\"images\\\\product-gallery\\\\2025\\\\08\\\\06\\\\1754478466\",\"currentImage\":\"medium\"}', 9, '2025-08-06 11:07:46', '2025-08-06 11:07:46', NULL),
(3, '{\"indexArray\":{\"large\":\"images\\\\product-gallery\\\\2025\\\\08\\\\06\\\\1754478617\\\\1754478617_large.jpg\",\"medium\":\"images\\\\product-gallery\\\\2025\\\\08\\\\06\\\\1754478617\\\\1754478617_medium.jpg\",\"small\":\"images\\\\product-gallery\\\\2025\\\\08\\\\06\\\\1754478617\\\\1754478617_small.jpg\"},\"directory\":\"images\\\\product-gallery\\\\2025\\\\08\\\\06\\\\1754478617\",\"currentImage\":\"medium\"}', 9, '2025-08-06 11:10:18', '2025-08-06 11:10:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_meta`
--

CREATE TABLE `product_meta` (
  `id` bigint UNSIGNED NOT NULL,
  `meta_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_meta`
--

INSERT INTO `product_meta` (`id`, `meta_key`, `meta_value`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ضد آب', 'است', 1, '2025-07-13 14:26:37', '2025-07-13 14:26:37', NULL),
(2, 'ضد آب', 'هست', 2, '2025-08-05 16:51:28', '2025-08-05 17:01:23', NULL),
(3, 'ضد آب', 'هست', 3, '2025-08-05 17:09:36', '2025-08-05 17:09:36', NULL),
(4, 'جنس', 'چرم', 4, '2025-08-06 07:48:36', '2025-08-06 07:48:36', NULL),
(5, 'جنس', 'چرم', 5, '2025-08-06 07:50:37', '2025-08-06 07:50:37', NULL),
(6, 'جنس', 'کاغذ', 6, '2025-08-06 07:55:26', '2025-08-06 07:55:26', NULL),
(7, 'جنس', 'کاغذ', 7, '2025-08-06 07:57:12', '2025-08-06 07:57:12', NULL),
(8, 'جنس', 'کاغذ', 8, '2025-08-06 08:00:19', '2025-08-06 08:00:19', NULL),
(9, 'ضد آب', 'هست', 9, '2025-08-06 08:03:04', '2025-08-10 02:58:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_user`
--

CREATE TABLE `product_user` (
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_user`
--

INSERT INTO `product_user` (`product_id`, `user_id`) VALUES
(3, 10),
(4, 10),
(5, 10),
(7, 10),
(8, 10),
(9, 10),
(9, 11);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'هرمزگان', NULL, NULL, NULL),
(2, 'فارس', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `public_mail`
--

CREATE TABLE `public_mail` (
  `id` bigint UNSIGNED NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `published_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `public_mail_files`
--

CREATE TABLE `public_mail_files` (
  `id` bigint UNSIGNED NOT NULL,
  `public_mail_id` bigint UNSIGNED NOT NULL,
  `file_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` bigint NOT NULL,
  `file_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `public_sms`
--

CREATE TABLE `public_sms` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `published_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'اپراتور', 'اپراتور', 1, '2025-06-30 15:03:43', NULL, NULL),
(2, 'نویسنده', 'نویسنده سایت', 0, '2025-06-30 15:33:14', '2025-06-30 15:33:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('EBoPHhCrhRT2RHFqWeEp016XVUXuMvXQDyX1hb8i', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieEF0N2tqQWNaMWQ0dGZqYmJrT1FwRVQwd0VkYTVqWHc1aFo4NFJHUCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZGRyZXNzLWFuZC1kZWxpdmVyeSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjc7fQ==', 1756207792);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `logo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `icon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint UNSIGNED NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `seen` tinyint NOT NULL DEFAULT '0' COMMENT '0 => unseen, 1 => seen',
  `reference_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `priority_id` bigint UNSIGNED NOT NULL,
  `ticket_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `subject`, `description`, `status`, `seen`, `reference_id`, `user_id`, `category_id`, `priority_id`, `ticket_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'مشکل در خرید', 'با درگاه پرداخت', 0, 1, 1, 1, 1, 1, NULL, '2025-06-30 14:10:30', '2025-06-30 14:10:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_admins`
--

CREATE TABLE `ticket_admins` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_admins`
--

INSERT INTO `ticket_admins` (`id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2025-06-30 14:07:13', '2025-06-30 14:07:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_categories`
--

CREATE TABLE `ticket_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_categories`
--

INSERT INTO `ticket_categories` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'خرید', 1, '2025-06-30 14:08:06', '2025-06-30 14:08:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_files`
--

CREATE TABLE `ticket_files` (
  `id` bigint UNSIGNED NOT NULL,
  `file_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` bigint NOT NULL,
  `file_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `ticket_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_priorities`
--

CREATE TABLE `ticket_priorities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_priorities`
--

INSERT INTO `ticket_priorities` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'فوری', 1, '2025-06-30 14:08:27', '2025-06-30 14:08:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'avatar',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `activation` tinyint NOT NULL DEFAULT '0' COMMENT '0 => inactive, 1 => active',
  `activation_date` timestamp NULL DEFAULT NULL,
  `user_type` tinyint NOT NULL DEFAULT '0' COMMENT '0 => user, 1 => admin',
  `status` tinyint NOT NULL DEFAULT '0',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `mobile`, `national_code`, `first_name`, `last_name`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `slug`, `profile_photo_path`, `email_verified_at`, `mobile_verified_at`, `activation`, `activation_date`, `user_type`, `status`, `remember_token`, `current_team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'a.rahmanpour@protonmail.com', '09170766430', NULL, 'عظیم', 'ریحانی', '$2y$10$D.zwPM1FxnCc5aBze9fPEuc8b2zmIlvLsLfsrfx0d1hVJo35trWry', NULL, NULL, NULL, NULL, 'images\\users\\2025\\06\\30\\1751292330.png', NULL, NULL, 1, NULL, 1, 0, NULL, NULL, '2025-06-30 14:05:34', '2025-06-30 14:05:34', NULL),
(7, NULL, '9170766430', NULL, 'علی', 'هاشمی', '98355154', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-02 14:45:22', 1, NULL, 0, 0, NULL, NULL, '2025-07-25 13:18:28', '2025-08-02 14:45:22', NULL),
(10, 'a.rahmanpour@gmail.com', NULL, NULL, 'مجید', 'مجیدی', '98355154', NULL, NULL, NULL, NULL, NULL, '2025-08-12 02:51:30', NULL, 1, NULL, 0, 0, NULL, NULL, '2025-08-12 02:51:10', '2025-08-12 02:51:30', NULL),
(11, 'a.rahmanpour.dev@gmail.com', '09170766330', NULL, 'ارسلان', 'نامدار', '98355154', NULL, NULL, NULL, NULL, NULL, '2025-08-17 09:08:42', NULL, 1, NULL, 0, 0, NULL, NULL, '2025-08-17 08:49:56', '2025-08-20 08:53:49', NULL),
(12, 'a.abdi@gmail.com', '9174563546', NULL, 'احمد', 'عبدی', '98355154', NULL, NULL, NULL, NULL, NULL, '2025-08-25 06:53:53', NULL, 1, NULL, 0, 0, NULL, NULL, '2025-08-25 06:53:34', '2025-08-25 06:55:45', NULL),
(13, 's.saeidi@gmail.com', '9175463567', NULL, 'سعید', 'سعیدی', '98355154', NULL, NULL, NULL, NULL, NULL, '2025-08-25 06:58:32', NULL, 1, NULL, 0, 0, NULL, NULL, '2025-08-25 06:58:18', '2025-08-25 07:13:00', NULL),
(14, NULL, '9011612020', NULL, 'رضا', 'احمدی', '98355154', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-26 02:59:46', 1, NULL, 0, 0, NULL, NULL, '2025-08-26 02:58:26', '2025-08-26 03:00:29', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`),
  ADD KEY `addresses_city_id_foreign` (`city_id`);

--
-- Indexes for table `amazing_sales`
--
ALTER TABLE `amazing_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `amazing_sales_product_id_foreign` (`product_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_user_id_foreign` (`user_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`),
  ADD KEY `cart_items_color_id_foreign` (`color_id`),
  ADD KEY `cart_items_guarantee_id_foreign` (`guarantee_id`);

--
-- Indexes for table `cart_item_selected_attributes`
--
ALTER TABLE `cart_item_selected_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_item_selected_attributes_cart_item_id_foreign` (`cart_item_id`),
  ADD KEY `cart_item_selected_attributes_category_attribute_id_foreign` (`category_attribute_id`),
  ADD KEY `cart_item_selected_attributes_category_value_id_foreign` (`category_value_id`);

--
-- Indexes for table `cash_payments`
--
ALTER TABLE `cash_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cash_payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `category_attributes`
--
ALTER TABLE `category_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_attributes_category_id_foreign` (`category_id`);

--
-- Indexes for table `category_attribute_default_values`
--
ALTER TABLE `category_attribute_default_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_attribute_default_values_category_attribute_id_foreign` (`category_attribute_id`);

--
-- Indexes for table `category_values`
--
ALTER TABLE `category_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_values_product_id_foreign` (`product_id`),
  ADD KEY `category_values_category_attribute_id_foreign` (`category_attribute_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_province_id_foreign` (`province_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_parent_id_foreign` (`parent_id`),
  ADD KEY `comments_author_id_foreign` (`author_id`);

--
-- Indexes for table `common_discount`
--
ALTER TABLE `common_discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `copans`
--
ALTER TABLE `copans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `copans_user_id_foreign` (`user_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faqs_slug_unique` (`slug`);

--
-- Indexes for table `guarantees`
--
ALTER TABLE `guarantees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guarantees_product_id_foreign` (`product_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `offline_payments`
--
ALTER TABLE `offline_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offline_payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `online_payments`
--
ALTER TABLE `online_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `online_payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_address_id_foreign` (`address_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`),
  ADD KEY `orders_delivery_id_foreign` (`delivery_id`),
  ADD KEY `orders_copan_id_foreign` (`copan_id`),
  ADD KEY `orders_common_discount_id_foreign` (`common_discount_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_amazing_sale_id_foreign` (`amazing_sale_id`),
  ADD KEY `order_items_color_id_foreign` (`color_id`),
  ADD KEY `order_items_guarantee_id_foreign` (`guarantee_id`);

--
-- Indexes for table `order_item_selected_attributes`
--
ALTER TABLE `order_item_selected_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_item_selected_attributes_order_item_id_foreign` (`order_item_id`),
  ADD KEY `order_item_selected_attributes_category_attribute_id_foreign` (`category_attribute_id`),
  ADD KEY `order_item_selected_attributes_category_value_id_foreign` (`category_value_id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `otps_user_id_foreign` (`user_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_author_id_foreign` (`author_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_categories_slug_unique` (`slug`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_categories_slug_unique` (`slug`),
  ADD KEY `product_categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_meta`
--
ALTER TABLE `product_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_meta_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_user`
--
ALTER TABLE `product_user`
  ADD PRIMARY KEY (`product_id`,`user_id`),
  ADD KEY `product_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_mail`
--
ALTER TABLE `public_mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_mail_files`
--
ALTER TABLE `public_mail_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `public_mail_files_public_mail_id_foreign` (`public_mail_id`);

--
-- Indexes for table `public_sms`
--
ALTER TABLE `public_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_reference_id_foreign` (`reference_id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`),
  ADD KEY `tickets_category_id_foreign` (`category_id`),
  ADD KEY `tickets_priority_id_foreign` (`priority_id`),
  ADD KEY `tickets_ticket_id_foreign` (`ticket_id`);

--
-- Indexes for table `ticket_admins`
--
ALTER TABLE `ticket_admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_admins_user_id_foreign` (`user_id`);

--
-- Indexes for table `ticket_categories`
--
ALTER TABLE `ticket_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_files`
--
ALTER TABLE `ticket_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_files_ticket_id_foreign` (`ticket_id`),
  ADD KEY `ticket_files_user_id_foreign` (`user_id`);

--
-- Indexes for table `ticket_priorities`
--
ALTER TABLE `ticket_priorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `users_national_code_unique` (`national_code`),
  ADD UNIQUE KEY `users_slug_unique` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `amazing_sales`
--
ALTER TABLE `amazing_sales`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cart_item_selected_attributes`
--
ALTER TABLE `cart_item_selected_attributes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cash_payments`
--
ALTER TABLE `cash_payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_attributes`
--
ALTER TABLE `category_attributes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_attribute_default_values`
--
ALTER TABLE `category_attribute_default_values`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_values`
--
ALTER TABLE `category_values`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `common_discount`
--
ALTER TABLE `common_discount`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `copans`
--
ALTER TABLE `copans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guarantees`
--
ALTER TABLE `guarantees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `offline_payments`
--
ALTER TABLE `offline_payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_payments`
--
ALTER TABLE `online_payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_item_selected_attributes`
--
ALTER TABLE `order_item_selected_attributes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_meta`
--
ALTER TABLE `product_meta`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `public_mail`
--
ALTER TABLE `public_mail`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `public_mail_files`
--
ALTER TABLE `public_mail_files`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `public_sms`
--
ALTER TABLE `public_sms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ticket_admins`
--
ALTER TABLE `ticket_admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket_categories`
--
ALTER TABLE `ticket_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket_files`
--
ALTER TABLE `ticket_files`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_priorities`
--
ALTER TABLE `ticket_priorities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `amazing_sales`
--
ALTER TABLE `amazing_sales`
  ADD CONSTRAINT `amazing_sales_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `product_colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_items_guarantee_id_foreign` FOREIGN KEY (`guarantee_id`) REFERENCES `guarantees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_item_selected_attributes`
--
ALTER TABLE `cart_item_selected_attributes`
  ADD CONSTRAINT `cart_item_selected_attributes_cart_item_id_foreign` FOREIGN KEY (`cart_item_id`) REFERENCES `cart_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_item_selected_attributes_category_attribute_id_foreign` FOREIGN KEY (`category_attribute_id`) REFERENCES `category_attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_item_selected_attributes_category_value_id_foreign` FOREIGN KEY (`category_value_id`) REFERENCES `category_values` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cash_payments`
--
ALTER TABLE `cash_payments`
  ADD CONSTRAINT `cash_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_attributes`
--
ALTER TABLE `category_attributes`
  ADD CONSTRAINT `category_attributes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_attribute_default_values`
--
ALTER TABLE `category_attribute_default_values`
  ADD CONSTRAINT `category_attribute_default_values_category_attribute_id_foreign` FOREIGN KEY (`category_attribute_id`) REFERENCES `category_attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_values`
--
ALTER TABLE `category_values`
  ADD CONSTRAINT `category_values_category_attribute_id_foreign` FOREIGN KEY (`category_attribute_id`) REFERENCES `category_attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`);

--
-- Constraints for table `copans`
--
ALTER TABLE `copans`
  ADD CONSTRAINT `copans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guarantees`
--
ALTER TABLE `guarantees`
  ADD CONSTRAINT `guarantees_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offline_payments`
--
ALTER TABLE `offline_payments`
  ADD CONSTRAINT `offline_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `online_payments`
--
ALTER TABLE `online_payments`
  ADD CONSTRAINT `online_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_common_discount_id_foreign` FOREIGN KEY (`common_discount_id`) REFERENCES `common_discount` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_copan_id_foreign` FOREIGN KEY (`copan_id`) REFERENCES `copans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_delivery_id_foreign` FOREIGN KEY (`delivery_id`) REFERENCES `delivery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_amazing_sale_id_foreign` FOREIGN KEY (`amazing_sale_id`) REFERENCES `amazing_sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `product_colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_guarantee_id_foreign` FOREIGN KEY (`guarantee_id`) REFERENCES `guarantees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item_selected_attributes`
--
ALTER TABLE `order_item_selected_attributes`
  ADD CONSTRAINT `order_item_selected_attributes_category_attribute_id_foreign` FOREIGN KEY (`category_attribute_id`) REFERENCES `category_attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_selected_attributes_category_value_id_foreign` FOREIGN KEY (`category_value_id`) REFERENCES `category_values` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_selected_attributes_order_item_id_foreign` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `otps`
--
ALTER TABLE `otps`
  ADD CONSTRAINT `otps_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `post_categories` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_meta`
--
ALTER TABLE `product_meta`
  ADD CONSTRAINT `product_meta_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_user`
--
ALTER TABLE `product_user`
  ADD CONSTRAINT `product_user_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `public_mail_files`
--
ALTER TABLE `public_mail_files`
  ADD CONSTRAINT `public_mail_files_public_mail_id_foreign` FOREIGN KEY (`public_mail_id`) REFERENCES `public_mail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `ticket_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_priority_id_foreign` FOREIGN KEY (`priority_id`) REFERENCES `ticket_priorities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_reference_id_foreign` FOREIGN KEY (`reference_id`) REFERENCES `ticket_admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_admins`
--
ALTER TABLE `ticket_admins`
  ADD CONSTRAINT `ticket_admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_files`
--
ALTER TABLE `ticket_files`
  ADD CONSTRAINT `ticket_files_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
