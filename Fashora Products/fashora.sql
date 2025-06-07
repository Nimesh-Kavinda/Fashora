-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2025 at 08:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashora`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `locality` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `zip` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'home',
  `isdefault` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `name`, `phone`, `locality`, `address`, `city`, `state`, `country`, `landmark`, `zip`, `type`, `isdefault`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nimesh Kavinda', '0715637917', 'Pallegama', '931', 'Kegalle', 'Ganthuna', 'Sri Lanka', 'Near Post Office', '123456', 'home', 1, '2025-04-25 13:24:58', '2025-04-25 13:24:58'),
(2, 2, 'Dimuth Adithya', '0778525522', 'Ganthuna, Pallegama', '193/3', 'Kegalle', 'Sabaragamuwa', 'Sri Lanka', 'Near ganthuna new Town Bekary', '71222', 'home', 1, '2025-04-30 13:48:57', '2025-05-11 04:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Barnd 01', 'barnd-01', '1742234382.jpg', '2025-03-17 12:29:42', '2025-03-17 12:29:42'),
(2, 'Brand 02', 'brand-02', '1742234393.png', '2025-03-17 12:29:53', '2025-03-17 12:29:53');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('ad|127.0.0.1', 'i:1;', 1745611365),
('ad|127.0.0.1:timer', 'i:1745611365;', 1745611365),
('user@gamil.com|127.0.0.1', 'i:2;', 1747344548),
('user@gamil.com|127.0.0.1:timer', 'i:1747344548;', 1747344548),
('user@gmaill.com|127.0.0.1', 'i:1;', 1747344581),
('user@gmaill.com|127.0.0.1:timer', 'i:1747344581;', 1747344581);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `parent_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Category 01', 'category-01', '1742234359.jpg', NULL, '2025-03-17 12:29:20', '2025-03-17 12:29:20'),
(2, 'Category 02', 'category-02', '1742234370.jpg', NULL, '2025-03-17 12:29:30', '2025-03-17 12:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` enum('fixed','precent') NOT NULL,
  `value` decimal(8,2) NOT NULL,
  `cart_value` decimal(8,2) NOT NULL,
  `expiry_date` date NOT NULL DEFAULT cast(current_timestamp() as date),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `value`, `cart_value`, `expiry_date`, `created_at`, `updated_at`) VALUES
(1, 'OFF10', 'fixed', 10.00, 100.00, '2025-04-30', '2025-04-23 13:35:58', '2025-04-23 13:35:58'),
(2, 'OFF30', 'precent', 30.00, 150.00, '2025-04-30', '2025-04-23 13:43:22', '2025-04-23 13:43:22'),
(4, 'OFF20', 'fixed', 20.00, 200.00, '2025-04-25', '2025-04-24 09:58:58', '2025-04-24 09:58:58'),
(6, 'OFF90', 'fixed', 90.00, 200.00, '2025-01-16', '2025-05-09 04:46:06', '2025-05-10 00:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(22, '0001_01_01_000000_create_users_table', 1),
(23, '0001_01_01_000001_create_cache_table', 1),
(24, '0001_01_01_000002_create_jobs_table', 1),
(25, '2025_02_07_075102_create_brands_table', 1),
(26, '2025_03_05_161835_create_categories_table', 1),
(27, '2025_03_09_042157_create_products_table', 1),
(28, '2025_03_18_173319_create_shoppingcart_table', 2),
(29, '2025_04_23_163023_create_coupons_table', 3),
(30, '2025_04_25_112306_create_orders_table', 4),
(31, '2025_04_25_112343_create_order_items_table', 4),
(32, '2025_04_25_112405_create_addresses_table', 4),
(33, '2025_04_25_112438_create_transactions_table', 4),
(34, '2025_05_07_080726_create_slides_table', 5),
(35, '2025_05_07_180841_create_month_names_table', 6),
(36, '2025_05_14_205722_create_contacts_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `month_names`
--

CREATE TABLE `month_names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `month_names`
--

INSERT INTO `month_names` (`id`, `name`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `locality` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `zip` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'home',
  `status` enum('ordered','delivered','canceled') NOT NULL DEFAULT 'ordered',
  `is_shipping_different` tinyint(1) NOT NULL DEFAULT 0,
  `delivered_date` date DEFAULT NULL,
  `canceled_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `discount`, `tax`, `total`, `name`, `phone`, `locality`, `address`, `city`, `state`, `country`, `landmark`, `zip`, `type`, `status`, `is_shipping_different`, `delivered_date`, `canceled_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1.00, 1.00, 1.00, 1.00, 'Nimesh Kavinda', '0715637917', 'Pallegama', '931', 'Kegalle', 'Ganthuna', 'Sri Lanka', 'Near Post Office', '123456', 'home', 'ordered', 0, NULL, NULL, '2025-04-25 13:37:29', '2025-04-25 13:37:29'),
(2, 1, 480.00, 0.00, 100.80, 580.80, 'Nimesh Kavinda', '0715637917', 'Pallegama', '931', 'Kegalle', 'Ganthuna', 'Sri Lanka', 'Near Post Office', '123456', 'home', 'ordered', 0, NULL, NULL, '2025-04-25 14:08:46', '2025-04-25 14:08:46'),
(3, 1, 480.00, 0.00, 100.80, 580.80, 'Nimesh Kavinda', '0715637917', 'Pallegama', '931', 'Kegalle', 'Ganthuna', 'Sri Lanka', 'Near Post Office', '123456', 'home', 'ordered', 0, NULL, NULL, '2025-04-25 14:11:15', '2025-04-25 14:11:15'),
(4, 1, 1.00, 1.00, 1.00, 1.00, 'Nimesh Kavinda', '0715637917', 'Pallegama', '931', 'Kegalle', 'Ganthuna', 'Sri Lanka', 'Near Post Office', '123456', 'home', 'canceled', 0, '2025-05-02', '2025-05-07', '2025-04-25 14:18:05', '2025-05-07 13:44:29'),
(5, 1, 382.50, 67.50, 80.33, 462.83, 'Nimesh Kavinda', '0715637917', 'Pallegama', '931', 'Kegalle', 'Ganthuna', 'Sri Lanka', 'Near Post Office', '123456', 'home', 'ordered', 0, NULL, NULL, '2025-04-25 14:24:17', '2025-04-25 14:24:17'),
(6, 1, 230.00, 0.00, 48.30, 278.30, 'Nimesh Kavinda', '0715637917', 'Pallegama', '931', 'Kegalle', 'Ganthuna', 'Sri Lanka', 'Near Post Office', '123456', 'home', 'canceled', 0, NULL, '2025-05-02', '2025-04-25 14:38:27', '2025-05-02 00:20:03'),
(7, 1, 212.50, 37.50, 44.63, 257.13, 'Nimesh Kavinda', '0715637917', 'Pallegama', '931', 'Kegalle', 'Ganthuna', 'Sri Lanka', 'Near Post Office', '123456', 'home', 'ordered', 0, NULL, NULL, '2025-04-28 22:44:19', '2025-04-28 22:44:19'),
(8, 1, 720.00, 10.00, 151.20, 871.20, 'Nimesh Kavinda', '0715637917', 'Pallegama', '931', 'Kegalle', 'Ganthuna', 'Sri Lanka', 'Near Post Office', '123456', 'home', 'ordered', 0, NULL, NULL, '2025-04-29 00:48:11', '2025-04-29 00:48:11'),
(9, 2, 578.00, 102.00, 121.38, 699.38, 'Kavinda Karunasinghe', '0778525115', 'Ganthuna, Pallegama', '193/1', 'Kegalle', 'Sabaragamuwa', 'Sri Lanka', 'Near ganthuna new Town Bekary', '123456', 'home', 'delivered', 0, '2025-05-02', NULL, '2025-04-30 13:48:57', '2025-05-02 00:18:46'),
(10, 2, 578.00, 102.00, 121.38, 699.38, 'Kavinda Karunasinghe', '0778525115', 'Ganthuna, Pallegama', '193/1', 'Kegalle', 'Sabaragamuwa', 'Sri Lanka', 'Near ganthuna new Town Bekary', '123456', 'home', 'canceled', 0, NULL, '2025-05-02', '2025-05-02 00:59:43', '2025-05-02 01:44:46'),
(11, 2, 280.00, 0.00, 58.80, 338.80, 'Kavinda Karunasinghe', '0778525115', 'Ganthuna, Pallegama', '193/1', 'Kegalle', 'Sabaragamuwa', 'Sri Lanka', 'Near ganthuna new Town Bekary', '123456', 'home', 'canceled', 0, NULL, '2025-05-02', '2025-05-02 01:51:45', '2025-05-02 01:52:08'),
(12, 1, 578.00, 102.00, 121.38, 699.38, 'Nimesh Kavinda', '0715637917', 'Pallegama', '931', 'Kegalle', 'Ganthuna', 'Sri Lanka', 'Near Post Office', '123456', 'home', 'ordered', 0, NULL, NULL, '2025-05-07 11:34:36', '2025-05-07 11:34:36'),
(13, 2, 1.00, 0.00, 333.90, 1.00, 'Kavinda Karunasinghe', '0778525115', 'Ganthuna, Pallegama', '193/1', 'Kegalle', 'Sabaragamuwa', 'Sri Lanka', 'Near ganthuna new Town Bekary', '123456', 'home', 'canceled', 0, NULL, '2025-05-08', '2025-05-08 03:44:14', '2025-05-08 03:45:49'),
(14, 2, 365.50, 64.50, 76.76, 442.26, 'Kavinda Karunasinghe', '0778525115', 'Ganthuna, Pallegama', '193/1', 'Kegalle', 'Sabaragamuwa', 'Sri Lanka', 'Near ganthuna new Town Bekary', '123456', 'home', 'ordered', 0, NULL, NULL, '2025-05-08 03:48:57', '2025-05-08 03:48:57'),
(15, 1, 280.00, 0.00, 58.80, 338.80, 'Nimesh Kavinda', '0715637917', 'Pallegama', '931', 'Kegalle', 'Ganthuna', 'Sri Lanka', 'Near Post Office', '123456', 'home', 'delivered', 0, '2025-05-16', NULL, '2025-05-10 13:11:23', '2025-05-15 21:22:35'),
(16, 1, 200.00, 0.00, 42.00, 242.00, 'Nimesh Kavinda', '0715637917', 'Pallegama', '931', 'Kegalle', 'Ganthuna', 'Sri Lanka', 'Near Post Office', '123456', 'home', 'canceled', 0, NULL, '2025-05-10', '2025-05-10 13:21:52', '2025-05-10 13:33:28'),
(17, 1, 250.00, 0.00, 52.50, 302.50, 'Nimesh Kavinda', '0715637917', 'Pallegama', '931', 'Kegalle', 'Ganthuna', 'Sri Lanka', 'Near Post Office', '123456', 'home', 'canceled', 0, NULL, '2025-05-10', '2025-05-10 13:37:36', '2025-05-10 13:37:43'),
(18, 1, 480.00, 0.00, 100.80, 580.80, 'Nimesh Kavinda', '0715637917', 'Pallegama', '931', 'Kegalle', 'Ganthuna', 'Sri Lanka', 'Near Post Office', '123456', 'home', 'ordered', 0, NULL, NULL, '2025-05-10 13:39:34', '2025-05-10 13:39:34'),
(19, 1, 230.00, 0.00, 48.30, 278.30, 'Nimesh Kavinda', '0715637917', 'Pallegama', '931', 'Kegalle', 'Ganthuna', 'Sri Lanka', 'Near Post Office', '123456', 'home', 'ordered', 0, NULL, NULL, '2025-05-10 13:43:08', '2025-05-10 13:43:08'),
(20, 1, 250.00, 0.00, 52.50, 302.50, 'Nimesh Kavinda', '0715637917', 'Pallegama', '931', 'Kegalle', 'Ganthuna', 'Sri Lanka', 'Near Post Office', '123456', 'home', 'ordered', 0, NULL, NULL, '2025-05-10 13:58:20', '2025-05-10 13:58:20'),
(21, 1, 200.00, 0.00, 42.00, 242.00, 'Nimesh Kavinda', '0715637917', 'Pallegama', '931', 'Kegalle', 'Ganthuna', 'Sri Lanka', 'Near Post Office', '123456', 'home', 'ordered', 0, NULL, NULL, '2025-05-10 14:04:06', '2025-05-10 14:04:06'),
(22, 1, 1.00, 0.00, 218.40, 1.00, 'Nimesh Kavinda', '0715637917', 'Pallegama', '931', 'Kegalle', 'Ganthuna', 'Sri Lanka', 'Near Post Office', '123456', 'home', 'ordered', 0, NULL, NULL, '2025-05-15 21:26:49', '2025-05-15 21:26:49'),
(23, 2, 382.50, 67.50, 80.33, 462.83, 'Dimuth Adithya', '0778525522', 'Ganthuna, Pallegama', '193/3', 'Kegalle', 'Sabaragamuwa', 'Sri Lanka', 'Near ganthuna new Town Bekary', '71222', 'home', 'ordered', 0, NULL, NULL, '2025-05-16 08:01:00', '2025-05-16 08:01:00'),
(24, 1, 712.50, 37.50, 149.63, 862.13, 'Nimesh Kavinda', '0715637917', 'Pallegama', '931', 'Kegalle', 'Ganthuna', 'Sri Lanka', 'Near Post Office', '123456', 'home', 'ordered', 0, NULL, NULL, '2025-05-16 09:11:58', '2025-05-16 09:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `options` longtext DEFAULT NULL,
  `rstatus` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `price`, `quantity`, `options`, `rstatus`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 250.00, 1, NULL, 0, '2025-04-25 13:37:29', '2025-04-25 13:37:29'),
(2, 2, 1, 230.00, 1, NULL, 0, '2025-04-25 13:37:29', '2025-04-25 13:37:29'),
(3, 3, 1, 200.00, 1, NULL, 0, '2025-04-25 13:37:29', '2025-04-25 13:37:29'),
(4, 1, 2, 280.00, 1, NULL, 0, '2025-04-25 14:08:46', '2025-04-25 14:08:46'),
(5, 3, 2, 200.00, 1, NULL, 0, '2025-04-25 14:08:46', '2025-04-25 14:08:46'),
(6, 2, 3, 230.00, 1, NULL, 0, '2025-04-25 14:11:15', '2025-04-25 14:11:15'),
(7, 4, 3, 250.00, 1, NULL, 0, '2025-04-25 14:11:15', '2025-04-25 14:11:15'),
(8, 4, 4, 250.00, 1, NULL, 0, '2025-04-25 14:18:05', '2025-04-25 14:18:05'),
(9, 3, 4, 200.00, 1, NULL, 0, '2025-04-25 14:18:05', '2025-04-25 14:18:05'),
(10, 4, 5, 250.00, 1, NULL, 0, '2025-04-25 14:24:17', '2025-04-25 14:24:17'),
(11, 3, 5, 200.00, 1, NULL, 0, '2025-04-25 14:24:17', '2025-04-25 14:24:17'),
(12, 2, 6, 230.00, 1, NULL, 0, '2025-04-25 14:38:27', '2025-04-25 14:38:27'),
(13, 4, 7, 250.00, 1, NULL, 0, '2025-04-28 22:44:19', '2025-04-28 22:44:19'),
(14, 4, 8, 250.00, 2, NULL, 0, '2025-04-29 00:48:11', '2025-04-29 00:48:11'),
(15, 2, 8, 230.00, 1, NULL, 0, '2025-04-29 00:48:11', '2025-04-29 00:48:11'),
(16, 3, 9, 200.00, 2, NULL, 0, '2025-04-30 13:48:57', '2025-04-30 13:48:57'),
(17, 1, 9, 280.00, 1, NULL, 0, '2025-04-30 13:48:57', '2025-04-30 13:48:57'),
(18, 3, 10, 200.00, 2, NULL, 0, '2025-05-02 00:59:43', '2025-05-02 00:59:43'),
(19, 1, 10, 280.00, 1, NULL, 0, '2025-05-02 00:59:43', '2025-05-02 00:59:43'),
(20, 1, 11, 280.00, 1, NULL, 0, '2025-05-02 01:51:45', '2025-05-02 01:51:45'),
(21, 3, 12, 200.00, 2, NULL, 0, '2025-05-07 11:34:36', '2025-05-07 11:34:36'),
(22, 1, 12, 280.00, 1, NULL, 0, '2025-05-07 11:34:36', '2025-05-07 11:34:36'),
(23, 3, 13, 200.00, 2, NULL, 0, '2025-05-08 03:44:14', '2025-05-08 03:44:14'),
(24, 2, 13, 230.00, 3, NULL, 0, '2025-05-08 03:44:14', '2025-05-08 03:44:14'),
(25, 4, 13, 250.00, 2, NULL, 0, '2025-05-08 03:44:14', '2025-05-08 03:44:14'),
(26, 2, 14, 230.00, 1, NULL, 0, '2025-05-08 03:48:57', '2025-05-08 03:48:57'),
(27, 3, 14, 200.00, 1, NULL, 0, '2025-05-08 03:48:57', '2025-05-08 03:48:57'),
(28, 1, 15, 280.00, 1, NULL, 0, '2025-05-10 13:11:23', '2025-05-10 13:11:23'),
(29, 3, 16, 200.00, 1, NULL, 0, '2025-05-10 13:21:52', '2025-05-10 13:21:52'),
(30, 4, 17, 250.00, 1, NULL, 0, '2025-05-10 13:37:36', '2025-05-10 13:37:36'),
(31, 1, 18, 280.00, 1, NULL, 0, '2025-05-10 13:39:34', '2025-05-10 13:39:34'),
(32, 3, 18, 200.00, 1, NULL, 0, '2025-05-10 13:39:34', '2025-05-10 13:39:34'),
(33, 2, 19, 230.00, 1, NULL, 0, '2025-05-10 13:43:08', '2025-05-10 13:43:08'),
(34, 4, 20, 250.00, 1, NULL, 0, '2025-05-10 13:58:20', '2025-05-10 13:58:20'),
(35, 3, 21, 200.00, 1, NULL, 0, '2025-05-10 14:04:06', '2025-05-10 14:04:06'),
(36, 3, 22, 200.00, 1, NULL, 0, '2025-05-15 21:26:49', '2025-05-15 21:26:49'),
(37, 1, 22, 280.00, 3, NULL, 0, '2025-05-15 21:26:49', '2025-05-15 21:26:49'),
(38, 3, 23, 200.00, 1, NULL, 0, '2025-05-16 08:01:00', '2025-05-16 08:01:00'),
(39, 4, 23, 250.00, 1, NULL, 0, '2025-05-16 08:01:00', '2025-05-16 08:01:00'),
(40, 4, 24, 250.00, 3, NULL, 0, '2025-05-16 09:11:58', '2025-05-16 09:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `regular_price` decimal(8,2) NOT NULL,
  `sale_price` decimal(8,2) DEFAULT NULL,
  `size` enum('S','M','L','XL','XXL') DEFAULT NULL,
  `SKU` varchar(255) NOT NULL,
  `stock_status` enum('instock','outofstock') NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 10,
  `image` varchar(255) DEFAULT NULL,
  `images` text DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `short_description`, `description`, `regular_price`, `sale_price`, `size`, `SKU`, `stock_status`, `featured`, `quantity`, `image`, `images`, `category_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(1, 'Product One', 'product-one', 'Test Short Des', 'Test Descript', 300.00, 280.00, 'M', 'SKT1001', 'instock', 1, 11, '1742234448.jpg', '1742234448-1.jpg,1742234448-2.jpg', 1, 1, '2025-03-17 12:30:48', '2025-03-17 12:30:48'),
(2, 'Product Tow', 'product-tow', 'test short product 02', 'test product 2', 250.00, 230.00, 'S', 'SKT1002', 'instock', 1, 12, '1742234517.jpg', '1742234517-1.jpg', 2, 2, '2025-03-17 12:31:57', '2025-05-07 23:47:36'),
(3, 'Product three', 'product-three', 'Tset short product 03', 'test Product 02', 220.00, 200.00, 'L', 'SKT1003', 'instock', 0, 13, '1742234579.jpg', '1742234579-1.jpg', 1, 1, '2025-03-17 12:33:00', '2025-03-17 12:33:00'),
(4, 'Product Four', 'product-four', 'Test Product Four', 'Product Four', 260.00, 250.00, 'XXL', 'SKT1004', 'instock', 1, 12, '1742234710.jpg', '1742234710-1.jpg', 2, 1, '2025-03-17 12:35:10', '2025-03-17 12:35:10');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('kA6rQlD3wbtc23f58IKZJyxg9DhtArFdrhd48pm8', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiQ3doZVhNekNuSmZMVGVhWHZQSFcyQ3E5Umo3ZUhCdWpsRldLMW5haSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzQ3MzgzODkxO31zOjQ6ImNhcnQiO2E6MTp7czo4OiJ3aXNobGlzdCI7TzoyOToiSWxsdW1pbmF0ZVxTdXBwb3J0XENvbGxlY3Rpb24iOjI6e3M6ODoiACoAaXRlbXMiO2E6MTp7czozMjoiMDJiOTE5M2RhYzdlZjFhZjVkNTAyM2YyYThkMDlhYzgiO086MzU6IlN1cmZzaWRlbWVkaWFcU2hvcHBpbmdjYXJ0XENhcnRJdGVtIjo5OntzOjU6InJvd0lkIjtzOjMyOiIwMmI5MTkzZGFjN2VmMWFmNWQ1MDIzZjJhOGQwOWFjOCI7czoyOiJpZCI7czoxOiIzIjtzOjM6InF0eSI7czoxOiIxIjtzOjQ6Im5hbWUiO3M6MTM6IlByb2R1Y3QgdGhyZWUiO3M6NToicHJpY2UiO2Q6MjAwO3M6Nzoib3B0aW9ucyI7Tzo0MjoiU3VyZnNpZGVtZWRpYVxTaG9wcGluZ2NhcnRcQ2FydEl0ZW1PcHRpb25zIjoyOntzOjg6IgAqAGl0ZW1zIjthOjE6e3M6NDoic2l6ZSI7czoxOiJMIjt9czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO31zOjUyOiIAU3VyZnNpZGVtZWRpYVxTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AYXNzb2NpYXRlZE1vZGVsIjtzOjE4OiJBcHBcTW9kZWxzXFByb2R1Y3QiO3M6NDQ6IgBTdXJmc2lkZW1lZGlhXFNob3BwaW5nY2FydFxDYXJ0SXRlbQB0YXhSYXRlIjtpOjIxO3M6NDQ6IgBTdXJmc2lkZW1lZGlhXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBpc1NhdmVkIjtiOjA7fX1zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fX1zOjg6Im9yZGVyX2lkIjtpOjI0O30=', 1747387908),
('zYs7tl8LaIHswOVp5Kmknk8WNcMaYZ5w5u6GppZ2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS0d3T2hud2RmeVpYclFRcUhFSjFUZVBqRk55QnJ6WG82MmxaM1lkdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1747592016);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) NOT NULL,
  `instance` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoppingcart`
--

INSERT INTO `shoppingcart` (`identifier`, `instance`, `content`, `created_at`, `updated_at`) VALUES
('1', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2025-05-16 07:59:12', NULL),
('1', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"02b9193dac7ef1af5d5023f2a8d09ac8\";O:35:\"Surfsidemedia\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"02b9193dac7ef1af5d5023f2a8d09ac8\";s:2:\"id\";s:1:\"3\";s:3:\"qty\";s:1:\"1\";s:4:\"name\";s:13:\"Product three\";s:5:\"price\";d:200;s:7:\"options\";O:42:\"Surfsidemedia\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:1:{s:4:\"size\";s:1:\"L\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:52:\"\0Surfsidemedia\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:44:\"\0Surfsidemedia\\Shoppingcart\\CartItem\0taxRate\";i:21;s:44:\"\0Surfsidemedia\\Shoppingcart\\CartItem\0isSaved\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2025-05-16 07:59:12', NULL),
('2', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2025-05-16 08:24:40', NULL),
('2', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2025-05-16 08:24:40', NULL),
('3', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2025-05-15 21:32:00', NULL),
('3', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2025-05-15 21:32:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tagline` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `tagline`, `title`, `subtitle`, `link`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Mens New Fasion', 'Mens', 'Dresses', 'http://127.0.0.1:8000/shop', '1746620469.png', 1, '2025-05-07 06:37:52', '2025-05-07 06:51:09'),
(3, 'Trending Girls Fashion', 'Women', 'Professional', 'http://127.0.0.1:8000/shop', '1746620630.png', 1, '2025-05-07 06:52:44', '2025-05-07 06:53:50'),
(4, 'Dress with Partner', 'Couple Dresses', 'Classic', 'http://127.0.0.1:8000/shop', '1746620736.png', 1, '2025-05-07 06:55:37', '2025-05-07 06:55:37'),
(5, 'New Generation', 'Classic', 'Smart Casual', 'http://127.0.0.1:8000/shop', '1746621127.png', 1, '2025-05-07 07:02:07', '2025-05-07 10:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `mode` enum('cod','card','paypal') NOT NULL,
  `status` enum('pending','approved','declined','refunded') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `order_id`, `mode`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'cod', 'pending', '2025-04-25 13:37:29', '2025-04-25 13:37:29'),
(2, 1, 2, 'cod', 'pending', '2025-04-25 14:08:46', '2025-04-25 14:08:46'),
(3, 1, 3, 'cod', 'pending', '2025-04-25 14:11:15', '2025-04-25 14:11:15'),
(4, 1, 4, 'cod', 'approved', '2025-04-25 14:18:05', '2025-05-02 00:17:40'),
(5, 1, 5, 'cod', 'pending', '2025-04-25 14:24:17', '2025-04-25 14:24:17'),
(6, 1, 6, 'cod', 'pending', '2025-04-25 14:38:27', '2025-04-25 14:38:27'),
(7, 1, 7, 'cod', 'pending', '2025-04-28 22:44:19', '2025-04-28 22:44:19'),
(8, 1, 8, 'cod', 'pending', '2025-04-29 00:48:11', '2025-04-29 00:48:11'),
(9, 2, 9, 'cod', 'approved', '2025-04-30 13:48:57', '2025-05-02 00:18:46'),
(10, 2, 10, 'cod', 'pending', '2025-05-02 00:59:43', '2025-05-02 00:59:43'),
(11, 2, 11, 'cod', 'pending', '2025-05-02 01:51:45', '2025-05-02 01:51:45'),
(12, 1, 12, 'cod', 'pending', '2025-05-07 11:34:36', '2025-05-07 11:34:36'),
(13, 2, 13, 'cod', 'pending', '2025-05-08 03:44:14', '2025-05-08 03:44:14'),
(14, 2, 14, 'cod', 'pending', '2025-05-08 03:48:57', '2025-05-08 03:48:57'),
(15, 1, 15, 'cod', 'approved', '2025-05-10 13:11:23', '2025-05-15 21:22:35'),
(16, 1, 16, 'cod', 'pending', '2025-05-10 13:21:52', '2025-05-10 13:21:52'),
(17, 1, 17, 'cod', 'pending', '2025-05-10 13:37:36', '2025-05-10 13:37:36'),
(18, 1, 18, 'cod', 'pending', '2025-05-10 13:39:34', '2025-05-10 13:39:34'),
(19, 1, 19, 'cod', 'pending', '2025-05-10 13:43:08', '2025-05-10 13:43:08'),
(20, 1, 20, 'cod', 'pending', '2025-05-10 13:58:20', '2025-05-10 13:58:20'),
(21, 1, 21, 'cod', 'pending', '2025-05-10 14:04:06', '2025-05-10 14:04:06'),
(22, 1, 22, 'cod', 'pending', '2025-05-15 21:26:49', '2025-05-15 21:26:49'),
(23, 2, 23, 'cod', 'pending', '2025-05-16 08:01:00', '2025-05-16 08:01:00'),
(24, 1, 24, 'cod', 'pending', '2025-05-16 09:11:58', '2025-05-16 09:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `utype` varchar(255) NOT NULL DEFAULT 'USR' COMMENT 'ADM for Admin and USR for User or Customer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `email_verified_at`, `password`, `utype`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin-Nimesh', 'admin@gmail.com', '0778525115', NULL, '$2y$12$4wZEpsCT5v4fKW0SSCKNh.tqlyriMmvCtkb0vwE6k9LKIP33ziXmG', 'ADM', NULL, '2025-03-17 12:27:29', '2025-05-09 12:52:51'),
(2, 'Dimuth Adithya', 'user@gmail.com', '0741718855', NULL, '$2y$12$IjzFIjMu4zQo/CcCG7p9K.0FWJNjfupcBrg/156so3oGvExW6lYam', 'USR', NULL, '2025-03-17 12:48:51', '2025-05-10 14:53:56'),
(3, 'Randika Ambanpitiya', 'user1@gmail.com', '0779525625', NULL, '$2y$12$lzyHkoDmzlKIfeO2Fnk07eURI6GAl4G4zEQOY.4YwTTrw/OMbxiqu', 'USR', NULL, '2025-05-11 04:27:11', '2025-05-11 04:27:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `month_names`
--
ALTER TABLE `month_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_order_id_foreign` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `month_names`
--
ALTER TABLE `month_names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
