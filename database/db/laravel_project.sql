-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 05, 2025 at 05:24 PM
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
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `persian_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `persian_name`, `original_name`, `slug`, `logo`, `status`, `tags`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Apple', 'Apple', 'Apple', '{\"indexArray\":{\"large\":\"images\\\\brand\\\\2025\\\\07\\\\13\\\\1752416712\\\\1752416712_large.png\",\"medium\":\"images\\\\brand\\\\2025\\\\07\\\\13\\\\1752416712\\\\1752416712_medium.png\",\"small\":\"images\\\\brand\\\\2025\\\\07\\\\13\\\\1752416712\\\\1752416712_small.png\"},\"directory\":\"images\\\\brand\\\\2025\\\\07\\\\13\\\\1752416712\",\"currentImage\":\"medium\"}', 1, 'apple', '2025-07-13 14:25:12', '2025-08-05 16:07:42', '2025-08-05 16:07:42'),
(2, 'شیائومی', 'xiaomi', 'xiaomi', '{\"indexArray\":{\"large\":\"images\\\\brand\\\\2025\\\\08\\\\05\\\\1754414167\\\\1754414167_large.png\",\"medium\":\"images\\\\brand\\\\2025\\\\08\\\\05\\\\1754414167\\\\1754414167_medium.png\",\"small\":\"images\\\\brand\\\\2025\\\\08\\\\05\\\\1754414167\\\\1754414167_small.png\"},\"directory\":\"images\\\\brand\\\\2025\\\\08\\\\05\\\\1754414167\",\"currentImage\":\"medium\"}', 1, 'شیائومی,xiaomi', '2025-08-05 16:35:40', '2025-08-05 17:16:07', NULL),
(3, 'هوآوی', 'Huawei', 'huawei', '{\"indexArray\":{\"large\":\"images\\\\brand\\\\2025\\\\08\\\\05\\\\1754414144\\\\1754414144_large.jpg\",\"medium\":\"images\\\\brand\\\\2025\\\\08\\\\05\\\\1754414144\\\\1754414144_medium.jpg\",\"small\":\"images\\\\brand\\\\2025\\\\08\\\\05\\\\1754414144\\\\1754414144_small.jpg\"},\"directory\":\"images\\\\brand\\\\2025\\\\08\\\\05\\\\1754414144\",\"currentImage\":\"medium\"}', 1, 'Huawei,هوآوی', '2025-08-05 16:43:45', '2025-08-05 17:15:44', NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `cart_item_selected_attributes`
--

CREATE TABLE `cart_item_selected_attributes` (
  `id` bigint UNSIGNED NOT NULL,
  `cart_item_id` bigint UNSIGNED NOT NULL,
  `category_attribute_id` bigint UNSIGNED NOT NULL,
  `category_value_id` bigint UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `cash_receiver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint NOT NULL DEFAULT '0',
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_attributes`
--

INSERT INTO `category_attributes` (`id`, `name`, `type`, `unit`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'اندازه صفحه', 0, 'اینچ', 1, '2025-07-13 14:27:07', '2025-07-13 14:27:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_attribute_default_values`
--

CREATE TABLE `category_attribute_default_values` (
  `id` bigint UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint NOT NULL DEFAULT '0' COMMENT 'value type is 0 => simple, 1 => multi values select by customers (affected on price)',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_values`
--

INSERT INTO `category_values` (`id`, `product_id`, `category_attribute_id`, `value`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '{\"value\":\"9\",\"price_increase\":\"500000\"}', 0, '2025-07-13 14:29:34', '2025-07-13 14:29:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `author_id` bigint UNSIGNED NOT NULL,
  `commentable_id` bigint UNSIGNED NOT NULL,
  `commentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen` tinyint NOT NULL DEFAULT '0' COMMENT '0 => unseen, 1 => seen',
  `approved` tinyint NOT NULL DEFAULT '0' COMMENT '0 => not approved, 1 => approved',
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `common_discount`
--

CREATE TABLE `common_discount` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(3, 'takhfif-private', '2000000', 1, 2000000, 0, 1, '2025-06-28 16:19:28', '2025-07-04 16:19:28', 2, '2025-07-18 16:21:13', '2025-07-18 16:21:13', NULL),
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(20,3) DEFAULT NULL,
  `delivery_time` int DEFAULT NULL,
  `delivery_time_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'گارانتی برتر', 1, 15000.00, 0, '2025-08-04 17:12:25', '2025-08-04 17:13:08', '2025-08-04 17:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `geteway` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_first_response` text COLLATE utf8mb4_unicode_ci,
  `bank_second_response` text COLLATE utf8mb4_unicode_ci,
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
  `address_object` longtext COLLATE utf8mb4_unicode_ci,
  `payment_id` bigint UNSIGNED DEFAULT NULL,
  `payment_object` longtext COLLATE utf8mb4_unicode_ci,
  `payment_type` tinyint NOT NULL DEFAULT '0',
  `payment_status` tinyint NOT NULL DEFAULT '0',
  `delivery_id` bigint UNSIGNED DEFAULT NULL,
  `delivery_object` longtext COLLATE utf8mb4_unicode_ci,
  `delievry_amount` decimal(20,3) DEFAULT NULL,
  `delievry_status` tinyint NOT NULL DEFAULT '0',
  `delivery_date` timestamp NULL DEFAULT NULL,
  `order_final_amount` decimal(20,3) DEFAULT NULL,
  `order_discount_amount` decimal(20,3) DEFAULT NULL,
  `copan_id` bigint UNSIGNED DEFAULT NULL,
  `copon_object` longtext COLLATE utf8mb4_unicode_ci,
  `order_copon_discount_amount` decimal(20,3) DEFAULT NULL,
  `common_discount_id` bigint UNSIGNED DEFAULT NULL,
  `common_discount_object` longtext COLLATE utf8mb4_unicode_ci,
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
  `product` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `amazing_sale_id` bigint UNSIGNED DEFAULT NULL,
  `amazing_sale_object` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `otp_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'email address or mobile number',
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
(1, 'bghdj8mfQLUo4sKwl1Dp0HgKt9FSpLuIFtZrGtmeazEToDsk3IAsO5N0Lixa', 6, '9322', '9011614349', 0, 0, 0, '2025-07-25 13:16:58', '2025-07-25 13:16:58'),
(2, 'CF7KnT1Vm5Sp6FxSKiV8Dy0WrTFa7pduyhT7DuLVyevZTGydnurPlIpneXua', 6, '7826', '9011614349', 0, 0, 0, '2025-07-25 13:18:03', '2025-07-25 13:18:03'),
(3, '7jTreQ7T1KcymZb6LDH9O80tFSYGh04K0iuwWPwdSR5qvMhxqMi3QK4TLJow', 7, '4806', '9170766430', 0, 0, 0, '2025-07-25 13:18:28', '2025-07-25 13:18:28'),
(4, 'bbikKtnvdt7hJkAmbvb2aL0i0YgiERLJhrgZLKWW6MtJ0IhZfWZA35EabAvZ', 7, '7303', '9170766430', 0, 0, 0, '2025-07-25 13:20:55', '2025-07-25 13:20:55'),
(5, '0vgciwbios7K1j6JAh1jJCif3Sc6kM70J0TOFtARuNbsCbuZTCGrSIl8g0ER', 6, '8462', '9011614349', 0, 0, 0, '2025-07-25 13:22:30', '2025-07-25 13:22:30'),
(6, 'oUC5WEEK4KoUWYktpswk6A72aUYQt6stXQ338asuUwWIpohrnyWrN0N2XNm8', 7, '3766', '9170766430', 0, 0, 0, '2025-07-25 13:58:02', '2025-07-25 13:58:02'),
(7, '4JW8cSNyZypnEPR6XEZN8dULgjmhDYrGlcYu4B55rQGoGU2dKTpimEEXdMJ1', 7, '4946', '9170766430', 0, 0, 0, '2025-07-25 13:58:58', '2025-07-25 13:58:58'),
(8, 'rMNMdk1dSB2TAz9SnOeiMAG8WERVSQWIE9fWt3QZH6tcBl5w7Bc0jOMPEBug', 7, '7677', '9170766430', 0, 0, 0, '2025-07-25 14:04:47', '2025-07-25 14:04:47'),
(9, 'dzkQy3eUvwstnzOzIE3sW9S3sSCzGhSZu2qNn6VP1BKLmqP4dNfrCUs8jKt7', 7, '3704', '9170766430', 0, 0, 0, '2025-07-26 11:03:10', '2025-07-26 11:03:10'),
(10, '3SPw8kfPIopCN4iFRhwy1Qn4FXs3wTFeeAoaWRTsfUQwEytS9Uzlq2MbyiAK', 7, '6210', '9170766430', 0, 0, 0, '2025-07-26 11:03:51', '2025-07-26 11:03:51'),
(11, 'RO7aGi31r5PxXpE4xF6emuvGcxqFYdJHoE9Z5LYX4GfIDC7du8yKT7Y3Nz3b', 6, '3014', '9011614349', 0, 0, 0, '2025-07-26 11:04:58', '2025-07-26 11:04:58'),
(12, 't504HO7BV7OSiTHtGJiBryUeurToz5DrxjXRQuQOKmncsVFIHHR8EP8Pdq2f', 6, '8954', '9011614349', 0, 0, 0, '2025-07-26 11:05:16', '2025-07-26 11:05:16'),
(13, 'ayuYIzUv1lHWdDexYlH0imxIN5FHzbCjvIPpQKnHwoLafzPmu0aVWt06I9ti', 6, '2544', '9011614349', 0, 0, 0, '2025-07-26 11:05:56', '2025-07-26 11:05:56'),
(14, 'UQ423WfD59pUxJaDq4RgkbHSq0mcppGQQ2ttCDoTComnnQc7CHe7M2yk4Y9h', 7, '2165', '9170766430', 0, 0, 0, '2025-07-31 07:46:57', '2025-07-31 07:46:57'),
(15, 'VfrKZau9s8dGenMd2bfeITanuwWiJ5d2fpTAD3uDTL4krrTbXYDYEL0HOeqJ', 8, '8571', 'a.rahmanpour.dev@gmail.com', 1, 0, 0, '2025-07-31 09:14:07', '2025-07-31 09:14:07'),
(16, 'hlXTkFX22D1hdeTMlTMtFa3bvXl7LoDFPCfymEfM7ZL6mV07Qf9ZmHWpNhPE', 8, '5665', 'a.rahmanpour.dev@gmail.com', 1, 0, 0, '2025-07-31 09:17:22', '2025-07-31 09:17:22'),
(17, 'K7NXFbpdBsoC9DYLy2ajiSBWcniPb5tchQA5H5r9duGCzrGJOkeeid7DIpg2', 7, '5901', '9170766430', 0, 0, 0, '2025-08-01 15:14:16', '2025-08-01 15:14:16'),
(18, 'AU1ndAvJShS3SkW9aTmEOxjnbLKgFHE3iZqfZVNCj5xoAfTuRvNTlRhppn1H', 7, '6258', '9170766430', 0, 0, 0, '2025-08-01 15:19:37', '2025-08-01 15:19:37'),
(19, 'ehkoTnxqgQbiPuNafnhAO2ezpElJz0nhCTAZjUH7MRJdegHn5b3aBhyGvMNh', 6, '3287', '9011614349', 0, 0, 0, '2025-08-01 15:20:17', '2025-08-01 15:20:17'),
(20, 'HCo0q4qd01QYufaQZEXP9RSk96g3aEXONBOvgfQLROcbWKL2QrQY2TeASOZ6', 8, '2137', 'a.rahmanpour.dev@gmail.com', 1, 0, 0, '2025-08-01 15:26:44', '2025-08-01 15:26:44'),
(21, 'GMu7XHcC2JhjXOocVBRCmu33YOu1ouz4EXXZ9zuMtiY9rXNyBLymKotP0dm9', 7, '9175', '9170766430', 0, 0, 0, '2025-08-01 16:07:16', '2025-08-01 16:07:16'),
(22, 'GjIaeHuFAGnbdpOHssqGZhTkd0BC7UNKLWBPswPoQ6QMSMEvjhE8xbGAJCfx', 7, '5685', '9170766430', 0, 0, 0, '2025-08-01 16:14:10', '2025-08-01 16:14:10'),
(23, 'KX0DQl0dzOEcpXAivddSO5MfOdUCdvyvV5qSHWYfrYS1VD1Cb1wX0wqPpaSy', 7, '3355', '9170766430', 0, 0, 0, '2025-08-01 16:14:46', '2025-08-01 16:14:46'),
(24, 'LLwH1AXAp2qEsOKegpa2GXSVAvXE5XOgPkmZ5VBuT8ZXbNGqnEgPETcq56pe', 8, '8087', 'a.rahmanpour.dev@gmail.com', 1, 0, 0, '2025-08-01 16:21:06', '2025-08-01 16:21:06'),
(25, 'LLvf2WRTtqM1CXAGQSVLYlRTKmNd0L1fgehCSEm7EsNuUn7VeOzv5CSy1iPt', 8, '8041', 'a.rahmanpour.dev@gmail.com', 1, 0, 0, '2025-08-01 16:30:13', '2025-08-01 16:30:13'),
(26, 'PpP6qAEHRnHYmOQh06DYZj1gBHlPyQdFg83TsQR60xybYNJvtIxA71ZIiPA9', 8, '8218', 'a.rahmanpour.dev@gmail.com', 1, 1, 0, '2025-08-01 17:13:20', '2025-08-01 17:16:30'),
(27, 'jhxNQq2wt2XUDZZ2azq9Q59wxuhWnBT60nRF5EkS8jBYUxRgnV9amm29o41K', 6, '4821', '9011614349', 0, 1, 0, '2025-08-01 17:16:54', '2025-08-01 17:21:16'),
(28, 'ONt8pmLuDyE63zd0sH0PfOUO3A3vpzzow0yAQ1Msk5mlfxRvbTHkaWM8JHXm', 6, '5604', '9011614349', 0, 1, 0, '2025-08-01 17:23:18', '2025-08-01 17:24:32'),
(29, 'ow2RUBaaylIQSNYkPonP0k452pmnDewkxz81bvYNludIkzwlvpGvEz8X9kUt', 6, '4963', '9011614349', 0, 0, 0, '2025-08-01 17:27:25', '2025-08-01 17:27:25'),
(30, 'M5AXdrO8IIX7UWmw48uyEqYu4T8IVDnbz4X8PvvNZ2aLGi1REAevKmdoYjsP', 6, '8579', '9011614349', 0, 0, 0, '2025-08-02 12:50:58', '2025-08-02 12:50:58'),
(31, '9Wi6pQw61yOYK1ZhhY6BlN91xMZDkt1M82bXXWBV7XnOuh6FWlTdFFQuOW5c', 9, '4967', '9179766430', 0, 0, 0, '2025-08-02 14:13:25', '2025-08-02 14:13:25'),
(32, 'NxnbCJaxStdUhKAEL0l7QkWml4B5qq32sdYtpsiLSDY2rAEGXY0aLdgZVjpU', 8, '6740', 'a.rahmanpour.dev@gmail.com', 1, 0, 0, '2025-08-02 14:18:07', '2025-08-02 14:18:07'),
(33, 'rVyUCad7ezVRMOLy9RWY0Ni2k6YbWTQ0MTW0tQ7d9fQxKTWpnsLEwGcLZzja', 9, '1851', '9179766430', 0, 0, 0, '2025-08-02 14:44:44', '2025-08-02 14:44:44'),
(34, 'lv5EUntD655NwSuAQntvlRLSGVXsTGwrasUEoByFWP7uW7NybwgulcBCd6y0', 7, '6730', '9170766430', 0, 1, 0, '2025-08-02 14:45:06', '2025-08-02 14:45:21'),
(35, 'Qhx47o7JM9F2HmOHrBwmQ4FbVcmycuDKz4ivBpcHwrTEDA3zS5BW8r3VZeRH', 7, '4980', '9170766430', 0, 1, 0, '2025-08-02 14:59:37', '2025-08-02 15:02:41'),
(36, 'Glk7aFGjIJGjsq5VVyvywu9xFTP4iOITmIEXqZixwxygJVj0R5jS8xvDnkvb', 9, '4708', '9179766430', 0, 0, 0, '2025-08-02 15:07:06', '2025-08-02 15:07:06'),
(37, '0mMUIkJWE2SHWS0J9GX4BJ4KJG73E1neJf5zNgV9huhSl7OVls478V4GKVLI', 7, '8312', '9170766430', 0, 1, 0, '2025-08-02 15:07:26', '2025-08-02 15:07:44'),
(38, 'CR8SzGs2BGer9J2AGqguqHjWCitaNNlKl8HNgmzAIbfCvYhtXWsw90SKCAnk', 8, '7441', 'a.rahmanpour.dev@gmail.com', 1, 1, 0, '2025-08-04 17:24:08', '2025-08-04 17:25:25'),
(39, 'Vgo2qFDvuv1E19e2fu3kNb88zgC1Ou0q9WLFAWMsm4QTk5epMHojVQhK5Ifp', 8, '1737', 'a.rahmanpour.dev@gmail.com', 1, 0, 0, '2025-08-04 17:36:16', '2025-08-04 17:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` bigint DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `paymentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `commentable` tinyint NOT NULL DEFAULT '0' COMMENT '0 => uncommentable, 1 => commentable',
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `length` decimal(10,1) NOT NULL COMMENT 'cm unit',
  `width` decimal(10,1) NOT NULL COMMENT 'cm unit',
  `height` decimal(10,1) NOT NULL COMMENT 'cm unit',
  `price` decimal(20,3) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `marketable` tinyint NOT NULL DEFAULT '1' COMMENT '1 => marketable, 0 => is not marketable',
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(3, 'گوشی موبایل شیائومی مدل POCO M3 M2010J19CG', '<p>گوشی موبایل شیائومی مدل POCO M3 M2010J19CG دو سیم&zwnj; کارت دارای قابلیت های بسیاری می باشد.</p>', 'osh-mob-l-sh-om-mdl-poco-m3-m2010j19cg', '{\"indexArray\":{\"large\":\"images\\\\product\\\\2025\\\\08\\\\05\\\\1754413775\\\\1754413775_large.jpg\",\"medium\":\"images\\\\product\\\\2025\\\\08\\\\05\\\\1754413775\\\\1754413775_medium.jpg\",\"small\":\"images\\\\product\\\\2025\\\\08\\\\05\\\\1754413775\\\\1754413775_small.jpg\"},\"directory\":\"images\\\\product\\\\2025\\\\08\\\\05\\\\1754413775\",\"currentImage\":\"medium\"}', 1.00, 9.0, 5.0, 9.0, 9000000.000, 1, 1, 'شیائومی,موبایل', 0, 0, 0, 2, 2, '2025-08-05 17:09:20', '2025-08-05 17:09:36', '2025-08-05 17:09:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '0',
  `show_in_menu` tinyint NOT NULL DEFAULT '0',
  `tags` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
(2, 'موبایل', '<p>موبایل</p>', 'mob-l', '{\"indexArray\":{\"large\":\"images\\\\product-category\\\\2025\\\\08\\\\05\\\\1754412557\\\\1754412557_large.jpg\",\"medium\":\"images\\\\product-category\\\\2025\\\\08\\\\05\\\\1754412557\\\\1754412557_medium.jpg\",\"small\":\"images\\\\product-category\\\\2025\\\\08\\\\05\\\\1754412557\\\\1754412557_small.jpg\"},\"directory\":\"images\\\\product-category\\\\2025\\\\08\\\\05\\\\1754412557\",\"currentImage\":\"medium\"}', 1, 1, 'موبایل', NULL, '2025-08-05 16:49:17', '2025-08-05 16:49:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint UNSIGNED NOT NULL,
  `color_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(3, 'آبی', '#0754ed', 1, 45000.00, 0, 0, 0, 0, '2025-08-04 16:50:59', '2025-08-04 16:50:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_meta`
--

CREATE TABLE `product_meta` (
  `id` bigint UNSIGNED NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(3, 'ضد آب', 'هست', 3, '2025-08-05 17:09:36', '2025-08-05 17:09:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_user`
--

CREATE TABLE `product_user` (
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `public_mail`
--

CREATE TABLE `public_mail` (
  `id` bigint UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `file_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` bigint NOT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('46YoxxE3pRSEmPCyyHJPDGf9SCCyeTney6xOdV1W', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQXNOOEhueGc1ZGJ1OWJCN3d0VHR4SVljTGdqQmdQMVNwSzVLWnJEbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1754414173),
('HK3Q2wslLoec92hXz32OxS2BKtUpfWyvgHMSx14E', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV1Y4T2VQa3hSM3g4UE1RWGg1cHJ0czkyUDI5UzB4ajdWRGhLaTRuOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1754410038);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `keywords` text COLLATE utf8mb4_unicode_ci,
  `logo` text COLLATE utf8mb4_unicode_ci,
  `icon` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'مشکل در خرید', 'نمیتونم بخرم', 0, 1, 1, 2, 1, 1, NULL, '2025-06-30 14:09:19', '2025-06-30 14:23:33', NULL),
(2, 'مشکل در خرید', 'با درگاه پرداخت', 0, 1, 1, 1, 1, 1, NULL, '2025-06-30 14:10:30', '2025-06-30 14:10:30', NULL),
(3, 'مشکل در خرید', 'زرین پال', 0, 1, 1, 1, 1, 1, 1, '2025-06-30 14:12:32', '2025-06-30 14:12:32', NULL),
(4, 'مشکل در خرید', 'پرداخت آنلاین کن', 0, 1, 1, 1, 1, 1, 1, '2025-06-30 14:21:13', '2025-06-30 14:21:13', NULL),
(5, 'مشکل ثبت نام', 'چطور ثبت نام کنم؟', 0, 0, 1, 2, 1, 1, NULL, '2025-06-30 14:21:35', '2025-06-30 14:23:37', NULL),
(6, 'مشکل ثبت نام', 'از قسمت بالا گوشه سمت راست', 0, 1, 1, 1, 1, 1, 5, '2025-06-30 14:23:10', '2025-06-30 14:23:10', NULL);

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `file_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` bigint NOT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci COMMENT 'avatar',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `activation` tinyint NOT NULL DEFAULT '0' COMMENT '0 => inactive, 1 => active',
  `activation_date` timestamp NULL DEFAULT NULL,
  `user_type` tinyint NOT NULL DEFAULT '0' COMMENT '0 => user, 1 => admin',
  `status` tinyint NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `mobile`, `national_code`, `first_name`, `last_name`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `slug`, `profile_photo_path`, `email_verified_at`, `mobile_verified_at`, `activation`, `activation_date`, `user_type`, `status`, `remember_token`, `current_team_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'a.rahmanpour@protonmail.com', '09170766430', NULL, 'عبدالعظیم', 'رحمان پور', '$2y$10$D.zwPM1FxnCc5aBze9fPEuc8b2zmIlvLsLfsrfx0d1hVJo35trWry', NULL, NULL, NULL, NULL, 'images\\users\\2025\\06\\30\\1751292330.png', NULL, NULL, 1, NULL, 1, 0, NULL, NULL, '2025-06-30 14:05:34', '2025-06-30 14:05:34', NULL),
(2, 's.tajik@protonmail.com', '09170766095', NULL, 'سعید', 'تاجیک', '$2y$10$vW5tJvya4qVCnMp/oLjLT.4K2zhTEMm/QFvmouPcPeCuTB2d4Z3.q', NULL, NULL, NULL, NULL, 'images\\users\\2025\\06\\30\\1751292402.png', NULL, NULL, 1, NULL, 0, 1, NULL, NULL, '2025-06-30 14:06:42', '2025-06-30 14:06:48', NULL),
(3, 'a.rahman@gmail.com', '09375432321', NULL, 'عبدالعظیم', 'رحمان پور', '$2y$10$eQ2XqSDrL10MzcgAQ5ylUucjV7UkGbK8Oh19oKh6ZtMx3XWy378Y.', NULL, NULL, NULL, NULL, 'images\\users\\2025\\07\\23\\1753283690.jpg', NULL, NULL, 1, NULL, 0, 1, NULL, NULL, '2025-07-23 15:14:52', '2025-07-23 15:15:01', NULL),
(4, 'a.rahman4@gmail.com', '09994321254', NULL, 'آرمان', 'رضایی', '$2y$10$OuXuPJpLXEQhVT2hsB63e.RARAJdzYmkx16YCf31WUWuhuIvR6r6y', NULL, NULL, NULL, NULL, 'images\\users\\2025\\07\\23\\1753283884.jpg', NULL, NULL, 1, NULL, 0, 0, NULL, NULL, '2025-07-23 15:18:04', '2025-07-23 15:18:04', NULL),
(5, 'a.rahmanpour86@protonmail.com', '09876543221', NULL, 'مهدی', 'حسنی', '$2y$10$iwnaLvJrD79n03yIj1AHM.FA4hl3zgJrWJWG9psWZeo814D.2lS9y', NULL, NULL, NULL, NULL, 'images\\users\\2025\\07\\23\\1753289612.jpg', NULL, NULL, 1, NULL, 0, 0, NULL, NULL, '2025-07-23 16:53:32', '2025-07-23 16:53:32', NULL),
(6, NULL, '9011614349', NULL, NULL, NULL, '98355154', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-01 17:21:16', 1, NULL, 0, 0, NULL, NULL, '2025-07-25 13:16:58', '2025-08-01 17:21:16', NULL),
(7, NULL, '9170766430', NULL, NULL, NULL, '98355154', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-02 14:45:22', 1, NULL, 0, 0, NULL, NULL, '2025-07-25 13:18:28', '2025-08-02 14:45:22', NULL),
(8, 'a.rahmanpour.dev@gmail.com', NULL, NULL, NULL, NULL, '98355154', NULL, NULL, NULL, NULL, NULL, '2025-08-01 17:16:30', NULL, 1, NULL, 0, 0, NULL, NULL, '2025-07-31 09:14:07', '2025-08-01 17:16:30', NULL),
(9, NULL, '9179766430', NULL, NULL, NULL, '98355154', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, 0, NULL, NULL, '2025-08-02 14:13:25', '2025-08-02 14:13:25', NULL);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `amazing_sales`
--
ALTER TABLE `amazing_sales`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_attribute_default_values`
--
ALTER TABLE `category_attribute_default_values`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_values`
--
ALTER TABLE `category_values`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_meta`
--
ALTER TABLE `product_meta`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
