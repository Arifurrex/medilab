-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2020 at 05:14 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'super admin' COMMENT 'admin || super admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `phone_no`, `avatar`, `type`, `created_at`, `updated_at`) VALUES
(9, 'Belayet', 'medilabbd.javed@gmail.com', '$2y$10$zOUPprs.hu.Hmzgv4iwg4OFqMDCOIQQSj53BSZEDvXfZKxT8miOTO', '01995890189', NULL, 'super admin', '2020-01-24 23:28:35', '2020-01-24 23:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'BODITECH 3', NULL, NULL, '2019-11-27 02:33:25', '2019-11-27 02:36:09'),
(3, 'BODITECH', NULL, NULL, '2019-11-27 02:39:22', '2019-11-27 02:39:22'),
(4, 'Other', NULL, NULL, '2019-11-27 02:39:32', '2019-11-27 02:39:32'),
(5, 'Virbo Shaper', NULL, NULL, '2019-11-28 11:32:05', '2019-11-28 11:32:05'),
(6, 'Kogeek', NULL, NULL, '2019-12-29 03:15:32', '2019-12-29 03:15:32'),
(7, 'YUWELL', NULL, NULL, '2019-12-31 09:39:52', '2019-12-31 09:39:52'),
(8, 'Omron', NULL, NULL, '2019-12-31 09:59:03', '2019-12-31 09:59:03'),
(9, 'Mini Plus by Apex', NULL, NULL, '2019-12-31 10:27:07', '2019-12-31 10:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `order_id`, `ip_address`, `product_quantity`, `created_at`, `updated_at`) VALUES
(5, 126, 64, 25, '127.0.0.1', 6, '2020-01-25 04:44:08', '2020-01-27 23:03:23'),
(6, 123, 64, 26, '127.0.0.1', 1, '2020-01-25 07:26:52', '2020-01-25 07:28:16'),
(7, 124, 64, 27, '127.0.0.1', 1, '2020-01-25 07:30:15', '2020-01-28 09:29:47'),
(8, 134, NULL, 27, '127.0.0.1', 1, '2020-01-27 10:27:27', '2020-01-28 09:29:48'),
(9, 139, NULL, 27, '127.0.0.1', 1, '2020-01-27 10:27:48', '2020-01-28 09:29:48'),
(10, 133, NULL, 27, '127.0.0.1', 1, '2020-01-27 23:03:36', '2020-01-28 09:29:48'),
(11, 141, NULL, 27, '127.0.0.1', 1, '2020-01-28 01:52:46', '2020-01-28 09:29:48'),
(12, 135, NULL, NULL, '::1', 1, '2020-01-28 09:50:41', '2020-01-28 09:50:41'),
(13, 134, NULL, NULL, '::1', 2, '2020-01-28 09:53:11', '2020-01-28 09:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`id`, `name`, `description`, `image`, `parent_id`, `created_at`, `updated_at`) VALUES
(71, 'Home', NULL, NULL, NULL, '2020-01-18 07:32:47', '2020-01-18 07:32:47'),
(72, 'Home Care Medical Equipment', NULL, NULL, NULL, '2020-01-18 07:33:27', '2020-01-18 07:33:27'),
(73, 'Imaging/Radiology Product', NULL, NULL, NULL, '2020-01-18 07:33:59', '2020-01-18 07:33:59'),
(74, 'OT Instrument', NULL, NULL, NULL, '2020-01-18 07:35:12', '2020-01-18 07:35:12'),
(75, 'Lab/Pathology Item', NULL, NULL, NULL, '2020-01-18 07:35:39', '2020-01-18 07:35:39'),
(76, 'Laboratory Product', NULL, NULL, NULL, '2020-01-18 07:36:25', '2020-01-18 07:36:25'),
(77, 'Lab Reagent', NULL, NULL, NULL, '2020-01-18 07:36:41', '2020-01-18 07:36:41'),
(78, 'ICU/NICU', NULL, NULL, NULL, '2020-01-18 07:36:56', '2020-01-18 07:36:56'),
(79, 'Hospital Furniture', NULL, NULL, NULL, '2020-01-18 07:37:31', '2020-01-18 07:37:31'),
(80, 'Service & Repair', NULL, NULL, NULL, '2020-01-18 07:37:56', '2020-01-18 07:37:56'),
(81, 'Air Mattress', NULL, NULL, 72, '2020-01-18 07:39:36', '2020-01-18 07:39:36'),
(82, 'Blood pressure Monitor', NULL, NULL, 72, '2020-01-18 07:40:33', '2020-01-18 07:40:33'),
(83, 'Diabetic Care', NULL, NULL, 72, '2020-01-18 07:40:56', '2020-01-18 07:40:56'),
(84, 'Nebulizers Machine', NULL, NULL, 72, '2020-01-18 07:41:18', '2020-01-18 07:41:18'),
(85, 'Weight Machine', NULL, NULL, 72, '2020-01-18 07:41:42', '2020-01-18 07:41:42'),
(86, 'Digital Thermometer', NULL, NULL, 72, '2020-01-18 07:42:50', '2020-01-18 07:42:50'),
(87, 'Pulse Oximeter', NULL, NULL, 72, '2020-01-18 07:43:26', '2020-01-18 07:43:26'),
(88, 'Patient Bed', NULL, NULL, 72, '2020-01-18 07:43:54', '2020-01-18 07:43:54'),
(89, 'Oxygen Concentrator', NULL, NULL, 72, '2020-01-18 07:44:26', '2020-01-18 07:44:26'),
(90, 'Patient/Cardiac Monitor', NULL, NULL, 72, '2020-01-18 07:44:54', '2020-01-18 07:44:54'),
(92, 'ECG Machine (Digital)', NULL, NULL, 73, '2020-01-18 07:52:11', '2020-01-18 07:52:11'),
(93, 'Ultrasound Machine.', NULL, NULL, 73, '2020-01-18 07:52:42', '2020-01-18 07:52:42'),
(94, 'X-Ray Machine', NULL, NULL, 73, '2020-01-18 07:53:11', '2020-01-18 07:53:11'),
(95, 'CTG Machine', NULL, NULL, 73, '2020-01-18 07:53:28', '2020-01-18 07:53:28'),
(96, 'OT Light', NULL, NULL, 74, '2020-01-18 07:53:46', '2020-01-18 07:53:46'),
(97, 'OT  Table', NULL, NULL, 74, '2020-01-18 07:54:07', '2020-01-18 07:54:07'),
(98, 'Diathermy', NULL, NULL, 74, '2020-01-18 07:54:27', '2020-01-18 07:54:27'),
(99, 'Patient  Monitor', NULL, NULL, 74, '2020-01-18 07:54:46', '2020-01-18 07:54:46'),
(100, 'Suction Machine', NULL, NULL, 74, '2020-01-18 07:55:13', '2020-01-18 07:55:13'),
(101, 'Autoclave', NULL, NULL, 74, '2020-01-18 07:55:35', '2020-01-18 07:55:35'),
(102, 'Other', NULL, NULL, 74, '2020-01-18 07:56:30', '2020-01-18 07:56:30'),
(103, 'Bio-chemistry Analyzer', NULL, NULL, 75, '2020-01-18 07:57:39', '2020-01-18 07:57:39'),
(104, 'Hormon analyzer/ Elisa Reader', NULL, NULL, 75, '2020-01-18 07:58:12', '2020-01-18 07:58:12'),
(105, 'Cell Counter/Hematology', NULL, NULL, 75, '2020-01-18 07:58:34', '2020-01-18 07:58:34'),
(106, 'Electrolyte Analyzer', NULL, NULL, 75, '2020-01-18 07:59:05', '2020-01-18 07:59:05'),
(107, 'Others', NULL, NULL, 75, '2020-01-18 07:59:33', '2020-01-18 07:59:33'),
(108, 'Microscope/Binocular', NULL, NULL, 76, '2020-01-18 08:00:06', '2020-01-18 08:00:06'),
(109, 'Digital Colorimiter', NULL, NULL, 76, '2020-01-18 08:00:21', '2020-01-18 08:00:21'),
(110, 'Micro-pipette', NULL, NULL, 76, '2020-01-18 08:00:45', '2020-01-18 08:00:45'),
(111, 'Centrifuge Machine', NULL, NULL, 76, '2020-01-18 08:01:11', '2020-01-18 08:01:11'),
(112, 'Lab Rotetor', NULL, NULL, 76, '2020-01-18 08:01:33', '2020-01-18 08:01:33'),
(113, 'Lab Hot Air Oven', NULL, NULL, 76, '2020-01-18 08:01:52', '2020-01-18 08:01:52'),
(114, 'Lab Incubator', NULL, NULL, 76, '2020-01-18 08:02:26', '2020-01-18 08:02:26'),
(115, 'Roller Mixer', NULL, NULL, 76, '2020-01-18 08:02:44', '2020-01-18 08:02:44'),
(116, 'Bio-chemistry Reagents', NULL, NULL, 77, '2020-01-18 08:03:29', '2020-01-18 08:03:29'),
(117, 'Elisa Kit/ Hormone Reagents', NULL, NULL, 77, '2020-01-18 08:03:47', '2020-01-18 08:03:47'),
(118, 'Serology Reagents', NULL, NULL, 77, '2020-01-18 08:04:13', '2020-01-18 08:04:13'),
(119, 'Rapid Test Kit', NULL, NULL, 77, '2020-01-18 08:04:31', '2020-01-18 08:04:31'),
(120, 'ICU ventilator', NULL, NULL, 78, '2020-01-18 08:04:54', '2020-01-18 08:04:54'),
(121, 'Phototherapy', NULL, NULL, 78, '2020-01-18 08:05:20', '2020-01-18 08:05:20'),
(122, 'Baby Warmer', NULL, NULL, 78, '2020-01-18 08:06:21', '2020-01-18 08:06:21'),
(123, 'Baby Incubator', NULL, NULL, 78, '2020-01-18 08:06:46', '2020-01-18 08:06:46'),
(124, 'Neonatal Ventilator', NULL, NULL, 78, '2020-01-18 08:07:06', '2020-01-18 08:07:06'),
(125, 'Oxygen Cylinder', NULL, NULL, 72, '2020-01-18 08:08:53', '2020-01-18 08:08:53'),
(126, 'ana', NULL, NULL, NULL, '2020-01-27 07:05:48', '2020-01-27 07:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `division_id`, `created_at`, `updated_at`) VALUES
(7, 'Dhaka District', 7, '2019-12-06 21:59:47', '2019-12-06 21:59:47'),
(8, 'Kishoreganj District', 7, '2019-12-06 22:00:24', '2019-12-06 22:00:24'),
(9, 'Gazipur District', 7, '2019-12-06 22:00:40', '2019-12-06 22:00:40'),
(10, 'Manikganj District', 7, '2019-12-06 22:00:57', '2019-12-06 22:00:57'),
(11, 'Munshiganj District', 7, '2019-12-06 22:01:12', '2019-12-06 22:01:12'),
(12, 'Narayanganj District', 7, '2019-12-06 22:01:44', '2019-12-06 22:01:44'),
(13, 'Narsingdi District', 7, '2019-12-06 22:01:59', '2019-12-06 22:01:59'),
(14, 'Tangail District', 7, '2019-12-06 22:02:14', '2019-12-06 22:02:14'),
(15, 'Faridpur District', 7, '2019-12-06 22:02:35', '2019-12-06 22:02:35'),
(16, 'Gopalganj District', 7, '2019-12-06 22:02:48', '2019-12-06 22:02:48'),
(17, 'Madaripur District', 7, '2019-12-06 22:03:02', '2019-12-06 22:03:02'),
(18, 'Rajbari District', 7, '2019-12-06 22:03:20', '2019-12-06 22:03:20'),
(19, 'Shariatpur District', 7, '2019-12-06 22:03:32', '2019-12-06 22:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `piority` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `piority`, `created_at`, `updated_at`) VALUES
(7, 'Dhaka Division', 1, '2019-12-06 21:55:19', '2019-12-06 21:55:19'),
(8, 'Chittagong Division', 2, '2019-12-06 21:55:59', '2019-12-06 21:55:59'),
(9, 'Khulna Division', 3, '2019-12-06 21:56:48', '2019-12-06 21:56:48'),
(10, 'Barisal Division', 4, '2019-12-06 21:57:12', '2019-12-06 21:57:12'),
(11, 'Mymensingh Division', 5, '2019-12-06 21:57:29', '2019-12-06 21:57:29'),
(12, 'Rajshahi Division', 6, '2019-12-06 21:57:53', '2019-12-06 21:57:53'),
(13, 'Rangpur Division', 7, '2019-12-06 21:58:17', '2019-12-06 21:58:17'),
(14, 'Sylhet Division', 8, '2019-12-06 21:58:34', '2019-12-06 21:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_11_07_063644_create_catagories_table', 1),
(4, '2019_11_07_064037_create_brands_table', 1),
(9, '2019_11_08_063752_create_product_images_table', 3),
(10, '2019_11_07_064534_create_products_table', 4),
(12, '2014_10_12_000000_create_users_table', 5),
(14, '2019_12_06_032741_create_districts_table', 6),
(15, '2019_12_06_032314_create_divisions_table', 7),
(21, '2019_12_27_122403_create_carts_table', 8),
(22, '2020_01_02_144001_create_settings_table', 9),
(23, '2020_01_03_170211_create_payments_table', 10),
(24, '2019_12_27_121026_create_orders_table', 11),
(25, '2019_11_07_064915_create_admins_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8_unicode_ci NOT NULL,
  `massage` text COLLATE utf8_unicode_ci,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `is_seeen_by_admin` tinyint(1) NOT NULL DEFAULT '0',
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `ip_address`, `phone_no`, `email`, `shipping_address`, `massage`, `name`, `is_paid`, `is_completed`, `is_seeen_by_admin`, `transaction_id`, `created_at`, `updated_at`) VALUES
(21, NULL, 3, '127.0.0.1', '0988', 'asf@gg.com', 'fd', 'gjg', 'ghg', 0, 0, 0, '233', '2020-01-22 00:42:25', '2020-01-22 00:42:25'),
(24, 64, 3, '127.0.0.1', '0176589584', 'arifurrex@gmail.com', 'ghhlk', NULL, 'hasan mahmud', 0, 0, 1, '65888', '2020-01-24 22:47:38', '2020-01-24 23:31:56'),
(25, 64, 1, '127.0.0.1', '0176589584', 'arifurrex@gmail.com', 'kjj', NULL, 'hasan mahmud', 1, 1, 1, NULL, '2020-01-25 04:44:34', '2020-01-25 07:28:56'),
(26, 64, 3, '127.0.0.1', '0176589584', 'arifurrex@gmail.com', 'hhh', NULL, 'hasan mahmud', 0, 0, 1, '6666', '2020-01-25 07:28:16', '2020-01-26 23:53:23'),
(27, NULL, 3, '127.0.0.1', '018883', 'sfg@fh.com', 'hlhfkl', 'hdf', 'skfdk', 1, 1, 1, '4367', '2020-01-28 09:29:47', '2020-01-28 09:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('medilabbd.javed@gmail.com', '$2y$10$pdR3N2E48HrlUY0T73qCq..kXR7XkgIMd9yYoM/ozzpjuyqRRXItC', '2019-12-11 04:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'agent/personal',
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'agent/personal',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `short_name`, `no`, `type`, `image`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'cash in', 'cash_in', NULL, NULL, 'cash_in.jpg', '1', '2020-01-03 17:15:05', '2020-01-03 17:15:05'),
(2, 'Bcash', 'bcash', '01995890189', 'personal', 'bcash.jpg', '2', '2020-01-03 17:15:05', '2020-01-03 17:15:05'),
(3, 'Rocket', 'rocket', '01753885590', 'personal', 'rocket.jpg', '2', '2020-01-03 17:15:05', '2020-01-03 17:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `catagory_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `catagory_id`, `brand_id`, `title`, `description`, `slug`, `quantity`, `price`, `offer_price`, `status`, `admin_id`, `created_at`, `updated_at`) VALUES
(123, 81, 3, 'test product', 'test product 2010', 'test-product', 23, 123, NULL, 0, 1, '2020-01-23 08:56:37', '2020-01-23 08:56:37'),
(124, 82, 1, 'test product 4', 'test product 4', 'test-product-4', 44, 123, NULL, 0, 1, '2020-01-23 09:00:57', '2020-01-23 09:00:57'),
(125, 82, 6, 'test product 3', 'test descrpton 3', 'test-product-3', 12, 1200, NULL, 0, 1, '2020-01-25 01:43:10', '2020-01-25 01:43:10'),
(126, 82, 9, 'text product 6', 'text descrptn', 'text-product-6', 123, 12, NULL, 0, 1, '2020-01-25 01:56:43', '2020-01-25 01:56:43'),
(127, 72, 3, 'hey', 'get', 'hey', 12, 12, NULL, 0, 1, '2020-01-25 05:43:54', '2020-01-25 05:43:54'),
(128, 72, 3, 'hey', 'get', 'hey', 12, 12, NULL, 0, 1, '2020-01-25 05:44:00', '2020-01-25 05:44:00'),
(129, 81, 1, 'test one', 'test two', 'test-one', 13, 1233, NULL, 0, 1, '2020-01-27 00:41:29', '2020-01-27 00:41:29'),
(130, 82, 7, 'TEST THREE', 'TEST THREE', 'test-three', 1288, 1200, NULL, 0, 1, '2020-01-27 00:52:01', '2020-01-27 00:52:01'),
(131, 83, 4, 'test 4', 'test dd', 'test-4', 123, 1243, NULL, 0, 1, '2020-01-27 00:56:04', '2020-01-27 00:56:04'),
(132, 86, 3, 'test56', 'test tree', 'test56', 23, 23, NULL, 0, 1, '2020-01-27 00:57:25', '2020-01-27 00:57:25'),
(133, 95, 3, 'test36', 'test36', 'test36', 1223, 1233, NULL, 0, 1, '2020-01-27 07:33:10', '2020-01-27 07:33:10'),
(134, 92, 4, 'TEST37', 'TEST36', 'test37', 94, 499, NULL, 0, 1, '2020-01-27 07:41:47', '2020-01-27 07:41:47'),
(135, 93, 1, 'TEST38', 'TEST38', 'test38', 44, 4889, NULL, 0, 1, '2020-01-27 07:43:36', '2020-01-27 07:43:36'),
(136, 94, 6, '54', 'EEF', '54', 6, 45, NULL, 0, 1, '2020-01-27 07:44:35', '2020-01-27 07:44:35'),
(137, 101, 4, '455', 'YT', '455', 34, 45, NULL, 0, 1, '2020-01-27 07:51:22', '2020-01-27 07:51:22'),
(138, 102, 4, 'YUO', 'GH', 'yuo', 455, 45, NULL, 0, 1, '2020-01-27 07:52:05', '2020-01-27 07:52:05'),
(139, 81, 6, 'ar', 'r tst', 'ar', 1, NULL, NULL, 0, 1, '2020-01-27 10:26:43', '2020-01-27 10:26:43'),
(140, 103, 8, 'gh', 'jg', 'gh', 34, NULL, NULL, 0, 1, '2020-01-27 22:51:22', '2020-01-27 22:51:22'),
(141, 106, 6, 'gho', 'ytr', 'gho', 43, 23, NULL, 0, 1, '2020-01-27 22:52:05', '2020-01-27 22:52:05'),
(142, 125, 9, 'test4466', 'test', 'test4466', 5, 34, NULL, 0, 1, '2020-01-28 10:00:52', '2020-01-28 10:00:52'),
(143, 125, 9, 'test4466', 'test', 'test4466', 5, 34, NULL, 0, 1, '2020-01-28 10:07:09', '2020-01-28 10:07:09'),
(144, 81, 9, 'test3898', 'yuu', 'test3898', 44, 6, NULL, 0, 1, '2020-01-28 10:10:40', '2020-01-28 10:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(67, 62, '1574158853.PNG', NULL, NULL),
(68, 61, 'BP Machine5.png', NULL, NULL),
(69, 62, '1573831053.jpg', NULL, NULL),
(70, 63, '1574603774.PNG', '2019-11-24 07:56:16', '2019-11-24 07:56:16'),
(71, 61, '1574159325.PNG', NULL, NULL),
(72, 64, '1574606276.PNG', '2019-11-24 08:37:57', '2019-11-24 08:37:57'),
(73, 64, '1574606277.PNG', '2019-11-24 08:37:58', '2019-11-24 08:37:58'),
(74, 64, '1574606278.PNG', '2019-11-24 08:37:58', '2019-11-24 08:37:58'),
(75, 65, '1574690248.jpg', '2019-11-25 07:57:29', '2019-11-25 07:57:29'),
(76, 66, '1574830389.PNG', '2019-11-26 22:53:12', '2019-11-26 22:53:12'),
(77, 66, '1574830392.PNG', '2019-11-26 22:53:12', '2019-11-26 22:53:12'),
(78, 67, '1574830621.jpg', '2019-11-26 22:57:02', '2019-11-26 22:57:02'),
(79, 67, '1574830622.jpg', '2019-11-26 22:57:02', '2019-11-26 22:57:02'),
(80, 67, '1574830622.png', '2019-11-26 22:57:02', '2019-11-26 22:57:02'),
(81, 67, '1574830622.png', '2019-11-26 22:57:02', '2019-11-26 22:57:02'),
(82, 67, '1574830622.png', '2019-11-26 22:57:02', '2019-11-26 22:57:02'),
(83, 68, '1574850910.jpg', '2019-11-27 04:35:11', '2019-11-27 04:35:11'),
(84, 68, '1574850911.jpg', '2019-11-27 04:35:11', '2019-11-27 04:35:11'),
(85, 69, '1574892238.jpg', '2019-11-27 16:03:59', '2019-11-27 16:03:59'),
(86, 69, '1574892239.jpg', '2019-11-27 16:03:59', '2019-11-27 16:03:59'),
(87, 69, '1574892240.jpg', '2019-11-27 16:04:00', '2019-11-27 16:04:00'),
(88, 69, '1574892240.png', '2019-11-27 16:04:00', '2019-11-27 16:04:00'),
(89, 69, '1574892240.png', '2019-11-27 16:04:00', '2019-11-27 16:04:00'),
(90, 70, '1574953814.jpg', '2019-11-28 09:10:15', '2019-11-28 09:10:15'),
(92, 70, '1574953815.jpeg', '2019-11-28 09:10:15', '2019-11-28 09:10:15'),
(93, 71, '1574953935.jpeg', '2019-11-28 09:12:15', '2019-11-28 09:12:15'),
(94, 72, '1574954057.jpeg', '2019-11-28 09:14:18', '2019-11-28 09:14:18'),
(95, 72, '1574954058.jpg', '2019-11-28 09:14:18', '2019-11-28 09:14:18'),
(96, 72, '1574954058.jpg', '2019-11-28 09:14:18', '2019-11-28 09:14:18'),
(97, 72, '1574954058.jpg', '2019-11-28 09:14:18', '2019-11-28 09:14:18'),
(98, 73, '1574954113.jpg', '2019-11-28 09:15:13', '2019-11-28 09:15:13'),
(99, 73, '1574954113.jpg', '2019-11-28 09:15:13', '2019-11-28 09:15:13'),
(100, 73, '1574954113.jpg', '2019-11-28 09:15:13', '2019-11-28 09:15:13'),
(101, 73, '1574954113.jpg', '2019-11-28 09:15:14', '2019-11-28 09:15:14'),
(102, 74, '1574954135.jpg', '2019-11-28 09:15:35', '2019-11-28 09:15:35'),
(103, 74, '1574954135.jpg', '2019-11-28 09:15:35', '2019-11-28 09:15:35'),
(104, 74, '1574954135.jpg', '2019-11-28 09:15:35', '2019-11-28 09:15:35'),
(105, 74, '1574954135.jpg', '2019-11-28 09:15:35', '2019-11-28 09:15:35'),
(106, 74, '1574954135.jpg', '2019-11-28 09:15:35', '2019-11-28 09:15:35'),
(107, 75, '1574954343.jpg', '2019-11-28 09:19:03', '2019-11-28 09:19:03'),
(108, 75, '1574954343.jpeg', '2019-11-28 09:19:04', '2019-11-28 09:19:04'),
(109, 76, '1574962094.png', '2019-11-28 11:28:15', '2019-11-28 11:28:15'),
(110, 77, '1574962277.jpg', '2019-11-28 11:31:17', '2019-11-28 11:31:17'),
(111, 78, '1574969477.jpg', '2019-11-28 13:31:17', '2019-11-28 13:31:17'),
(112, 78, '1574969477.jpg', '2019-11-28 13:31:17', '2019-11-28 13:31:17'),
(113, 78, '1574969477.jpg', '2019-11-28 13:31:18', '2019-11-28 13:31:18'),
(114, 79, '1574969834.jpg', '2019-11-28 13:37:14', '2019-11-28 13:37:14'),
(115, 79, '1574969835.png', '2019-11-28 13:37:15', '2019-11-28 13:37:15'),
(116, 79, '1574969835.png', '2019-11-28 13:37:15', '2019-11-28 13:37:15'),
(117, 80, '1575048145.jpg', '2019-11-29 11:22:26', '2019-11-29 11:22:26'),
(118, 81, '1575319901.png', '2019-12-02 14:51:42', '2019-12-02 14:51:42'),
(119, 81, '1575319902.png', '2019-12-02 14:51:42', '2019-12-02 14:51:42'),
(120, 81, '1575319902.png', '2019-12-02 14:51:42', '2019-12-02 14:51:42'),
(121, 82, '1575828447.jpg', '2019-12-08 12:07:28', '2019-12-08 12:07:28'),
(122, 82, '1575828448.jpeg', '2019-12-08 12:07:28', '2019-12-08 12:07:28'),
(123, 83, '1575857148.jpg', '2019-12-08 20:05:48', '2019-12-08 20:05:48'),
(124, 84, '1575857419.jpg', '2019-12-08 20:10:20', '2019-12-08 20:10:20'),
(125, 85, '1575875847.jpg', '2019-12-09 01:17:28', '2019-12-09 01:17:28'),
(126, 86, '1575875942.jpg', '2019-12-09 01:19:02', '2019-12-09 01:19:02'),
(127, 87, '1575901187.jpg', '2019-12-09 08:19:47', '2019-12-09 08:19:47'),
(128, 88, '1575901572.png', '2019-12-09 08:26:12', '2019-12-09 08:26:12'),
(129, 89, '1575922329.jpg', '2019-12-09 14:12:10', '2019-12-09 14:12:10'),
(130, 90, '1575925577.jpg', '2019-12-09 15:06:17', '2019-12-09 15:06:17'),
(131, 92, '1575925693.jpg', '2019-12-09 15:08:13', '2019-12-09 15:08:13'),
(132, 93, '1575925915.png', '2019-12-09 15:11:55', '2019-12-09 15:11:55'),
(133, 88, '1576418099.PNG', '2019-12-15 07:55:01', '2019-12-15 07:55:01'),
(134, 89, '1577604233.png', '2019-12-29 01:23:54', '2019-12-29 01:23:54'),
(135, 89, '1577604234.jpg', '2019-12-29 01:23:54', '2019-12-29 01:23:54'),
(136, 90, '1577605385.png', '2019-12-29 01:43:06', '2019-12-29 01:43:06'),
(137, 90, '1577605386.jpg', '2019-12-29 01:43:06', '2019-12-29 01:43:06'),
(138, 91, '1577605527.jpg', '2019-12-29 01:45:27', '2019-12-29 01:45:27'),
(139, 92, '1577605824.png', '2019-12-29 01:50:25', '2019-12-29 01:50:25'),
(140, 93, '1577606000.png', '2019-12-29 01:53:21', '2019-12-29 01:53:21'),
(153, 105, '1577809578.jpg', '2019-12-31 10:26:18', '2019-12-31 10:26:18'),
(154, 105, '1577809578.jpg', '2019-12-31 10:26:19', '2019-12-31 10:26:19'),
(165, 112, '1577813282.jpg', '2019-12-31 11:28:02', '2019-12-31 11:28:02'),
(168, 115, '1578511730.png', '2020-01-08 13:28:51', '2020-01-08 13:28:51'),
(169, 116, '1578511924.png', '2020-01-08 13:32:05', '2020-01-08 13:32:05'),
(170, 116, '1578511925.png', '2020-01-08 13:32:05', '2020-01-08 13:32:05'),
(171, 116, '1578511925.png', '2020-01-08 13:32:05', '2020-01-08 13:32:05'),
(172, 116, '1578511925.png', '2020-01-08 13:32:05', '2020-01-08 13:32:05'),
(173, 116, '1578511925.jpg', '2020-01-08 13:32:05', '2020-01-08 13:32:05'),
(174, 117, '1578546277.png', '2020-01-08 23:04:37', '2020-01-08 23:04:37'),
(175, 117, '1578546277.png', '2020-01-08 23:04:38', '2020-01-08 23:04:38'),
(176, 117, '1578546278.png', '2020-01-08 23:04:38', '2020-01-08 23:04:38'),
(177, 117, '1578546278.png', '2020-01-08 23:04:38', '2020-01-08 23:04:38'),
(178, 117, '1578546278.png', '2020-01-08 23:04:38', '2020-01-08 23:04:38'),
(179, 118, '15786878590.png', '2020-01-10 14:24:20', '2020-01-10 14:24:20'),
(180, 118, '15786878601.png', '2020-01-10 14:24:20', '2020-01-10 14:24:20'),
(181, 118, '15786878602.png', '2020-01-10 14:24:20', '2020-01-10 14:24:20'),
(195, 123, '15797913970.png', '2020-01-23 08:56:39', '2020-01-23 08:56:39'),
(196, 123, '15797913991.jpg', '2020-01-23 08:56:39', '2020-01-23 08:56:39'),
(197, 123, '15797913992.png', '2020-01-23 08:56:40', '2020-01-23 08:56:40'),
(198, 124, '15797916570.jpg', '2020-01-23 09:00:57', '2020-01-23 09:00:57'),
(199, 124, '15797916571.jpg', '2020-01-23 09:00:57', '2020-01-23 09:00:57'),
(200, 124, '15797916572.jpg', '2020-01-23 09:00:57', '2020-01-23 09:00:57'),
(201, 125, '15799381900.jpg', '2020-01-25 01:43:13', '2020-01-25 01:43:13'),
(202, 125, '15799381931.jpg', '2020-01-25 01:43:13', '2020-01-25 01:43:13'),
(203, 126, '15799390030.jpg', '2020-01-25 01:56:43', '2020-01-25 01:56:43'),
(204, 127, '15799526340.jpg', '2020-01-25 05:43:59', '2020-01-25 05:43:59'),
(205, 128, '15799526400.jpg', '2020-01-25 05:44:00', '2020-01-25 05:44:00'),
(206, 129, '15801072890.png', '2020-01-27 00:41:32', '2020-01-27 00:41:32'),
(207, 130, '15801079210.png', '2020-01-27 00:52:01', '2020-01-27 00:52:01'),
(208, 131, '15801081640.png', '2020-01-27 00:56:04', '2020-01-27 00:56:04'),
(209, 132, '15801082450.png', '2020-01-27 00:57:25', '2020-01-27 00:57:25'),
(210, 133, '15801319900.png', '2020-01-27 07:33:11', '2020-01-27 07:33:11'),
(211, 134, '15801325080.png', '2020-01-27 07:41:48', '2020-01-27 07:41:48'),
(212, 135, '15801326160.png', '2020-01-27 07:43:36', '2020-01-27 07:43:36'),
(213, 136, '15801326750.png', '2020-01-27 07:44:35', '2020-01-27 07:44:35'),
(214, 137, '15801330820.png', '2020-01-27 07:51:22', '2020-01-27 07:51:22'),
(215, 138, '15801331250.png', '2020-01-27 07:52:05', '2020-01-27 07:52:05'),
(216, 139, '15801424030.png', '2020-01-27 10:26:44', '2020-01-27 10:26:44'),
(217, 140, '15801870820.jpg', '2020-01-27 22:51:23', '2020-01-27 22:51:23'),
(218, 141, '15801871250.png', '2020-01-27 22:52:06', '2020-01-27 22:52:06'),
(219, 143, '15802276290.jpg', '2020-01-28 10:07:09', '2020-01-28 10:07:09'),
(220, 143, '15802276291.jpg', '2020-01-28 10:07:09', '2020-01-28 10:07:09'),
(221, 143, '15802276292.jpg', '2020-01-28 10:07:10', '2020-01-28 10:07:10'),
(222, 143, '15802276303.jpg', '2020-01-28 10:07:10', '2020-01-28 10:07:10'),
(223, 143, '15802276304.jpg', '2020-01-28 10:07:10', '2020-01-28 10:07:10'),
(224, 144, '15802278400.jpg', '2020-01-28 10:10:40', '2020-01-28 10:10:40'),
(225, 144, '15802278401.jpg', '2020-01-28 10:10:40', '2020-01-28 10:10:40'),
(226, 144, '15802278402.jpg', '2020-01-28 10:10:40', '2020-01-28 10:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_cost` int(10) UNSIGNED NOT NULL DEFAULT '100',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `phone_no`, `address`, `shipping_cost`, `created_at`, `updated_at`) VALUES
(1, 'babul@gma.com', '01753444534', 'anowara', 100, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `division_id` int(10) UNSIGNED NOT NULL COMMENT 'division table id',
  `district_id` int(10) UNSIGNED NOT NULL COMMENT 'district table id',
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avater` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8_unicode_ci,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0=inactive 1=active 2=ban',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `phone_no`, `email`, `password`, `street_address`, `division_id`, `district_id`, `ip_address`, `avater`, `shipping_address`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(64, 'hasan', 'mahmud', 'hasanmahmud', '0176589584', 'arifurrex@gmail.com', '$2y$10$dWGpbPUVrS9NuQL8Irywju.8VSpoDWrfcadyHvgcQGMWMkIxkfqim', '64 arjothpara', 7, 17, '127.0.0.1', NULL, NULL, 1, NULL, '2020-01-24 22:45:32', '2020-01-24 22:46:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_order_id_foreign` (`order_id`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`);

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
  ADD UNIQUE KEY `payments_short_name_unique` (`short_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_no_unique` (`phone_no`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
