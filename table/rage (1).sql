-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 17, 2024 at 08:39 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rage`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `logo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'Gucci', 'uploads/brands/gucci-65bb2c108742e.png', '2024-01-31 19:43:53', '2024-02-01 05:28:48', NULL),
(11, 'Xiaomi', 'uploads/brands/Xiaomi_65baa338af644.png', '2024-01-31 19:44:57', NULL, NULL),
(12, 'Samsung', 'uploads/brands/Samsung_65baa35fa7aa2.png', '2024-01-31 19:45:35', NULL, NULL),
(13, 'Zumba Kids', 'uploads/brands/Zumba Kids_65baa38fb35f0.jpg', '2024-01-31 19:46:23', NULL, NULL),
(14, 'Oleves', 'uploads/brands/Oleves_65baa3b303bcf.png', '2024-01-31 19:46:59', NULL, NULL),
(15, 'Rolex', 'uploads/brands/Rolex_65baa3cca3972.png', '2024-01-31 19:47:25', NULL, NULL),
(16, 'Fine Furniture', 'uploads/brands/Fine Furniture_65baa4079187a.png', '2024-01-31 19:48:23', NULL, NULL),
(17, 'Nike', 'uploads/brands/Nike_65baa4428040c.png', '2024-01-31 19:49:22', NULL, NULL),
(18, 'adidas', 'uploads/brands/adidas_65baa44a1d1f8.png', '2024-01-31 19:49:30', '2024-02-01 05:06:06', NULL),
(19, 'Bata', 'uploads/brands/Bata_65baa45f6beaf.png', '2024-01-31 19:49:51', '2024-02-01 05:06:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `photo`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(24, 'Accessories', 'uploads/category/accessories-65cf81df2d83c.jpg', 'accessories-536314', '2024-01-28 15:22:37', '2024-02-16 15:40:15', NULL),
(25, 'Electronics', 'uploads/category/electronics-65b6717e70f64.jpg', 'electronics-815317', '2024-01-28 15:23:42', '2024-01-30 04:15:07', NULL),
(26, 'home appliances', 'uploads/category/home-appliances-65b671ab23a48.jpg', 'home-appliances-380736', '2024-01-28 15:24:27', '2024-01-30 04:15:07', NULL),
(27, 'Furnitures', 'uploads/category/furnitures-65b671c9d5e24.jpg', 'furnitures-405164', '2024-01-28 15:24:58', '2024-01-30 04:15:07', NULL),
(28, 'Sports', 'uploads/category/sports-65b6721667914.jpg', 'sports-982223', '2024-01-28 15:26:14', '2024-01-30 04:15:07', NULL),
(29, 'Fashion', 'uploads/category/fashion-65b672465c9db.jpg', 'fashion-488439', '2024-01-28 15:27:02', '2024-01-30 04:15:07', NULL),
(30, 'Kids', 'uploads/category/kids-65b6728b37589.jpg', 'kids-285335', '2024-01-28 15:28:11', '2024-01-30 04:15:07', NULL),
(31, 'Beauty', 'uploads/category/beauty-65b672b4af8d3.jpg', 'beauty-447814', '2024-01-28 15:28:53', '2024-01-30 04:15:07', NULL),
(39, 'Olga Rosales', 'uploads/category/olga-rosales-65ba987c598e5.jpg', 'olga-rosales-628193', '2024-01-31 18:59:08', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` int NOT NULL,
  `gallery_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `product_id`, `gallery_path`, `created_at`, `updated_at`) VALUES
(4, 6, 'uploads/product/gallery/fasdfsaf-65cfa43a6a7aa.png', '2024-02-16 18:06:50', NULL),
(5, 6, 'uploads/product/gallery/fasdfsaf-65cfa43a8c770.jpg', '2024-02-16 18:06:50', NULL),
(7, 6, 'uploads/product/gallery/fasdfsaf-65cfa43abf97f.png', '2024-02-16 18:06:51', NULL),
(8, 6, 'uploads/product/gallery/fasdfsaf-65cfa43b2f654.png', '2024-02-16 18:06:51', NULL);

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
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2024_01_24_091652_create_categories_table', 2),
(4, '2024_01_28_114104_add_deleted_at_to_categories_table', 3),
(5, '2024_01_30_010510_create_password_reset_token_table', 4),
(6, '2024_01_30_220314_create_subcategories_table', 5),
(8, '2024_01_31_113817_create_brands_table', 6),
(9, '2024_02_01_233322_create_tags_table', 7),
(10, '2024_02_15_022813_create_products_table', 8),
(11, '2024_02_16_235034_create_galleries_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('gepaxiqil@mailinator.com', '$2y$12$5c0u/SYJoz/9JeM17r//I.ekmVRhGpSjigmkt7c0/hnzIhbRWj7zi', '2024-01-29 19:27:07'),
('mdsamime80@gmail.com', '$2y$12$Q9SccliUEjes5QtVGijtc.0QnpYcyiC9HjQtX0cczYIS52cqAo6cq', '2024-01-29 19:29:20'),
('sh92062676@gmail.com', '$2y$12$/viRgl7yzsE1JJtUshVqWuHNlhSMkdmdm.6GH5iVjgqbsqzrTP.im', '2024-01-29 19:30:14');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `subcategory_id` int NOT NULL,
  `brand_id` int DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int NOT NULL DEFAULT '0',
  `short_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_info` longtext COLLATE utf8mb4_unicode_ci,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preview_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `brand_id`, `sku`, `slug`, `product_name`, `discount`, `short_desc`, `long_desc`, `additional_info`, `tags`, `preview_img`, `created_at`, `updated_at`) VALUES
(6, 26, 5, 13, '74JO98LK7654', 'hp-pro-240-g9-core-i3-12th-gen-all-in-one-desktop-pc-2736476', 'HP Pro 240 G9 Core i3 12th Gen All-in-One Desktop PC', 9, 'HP Pro 240 G9 Core i3 12th Gen All-in-One Desktop PC', '<div class=\"section-head\" style=\"margin: 0px; padding-bottom: 20px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px;\"><h2 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; font-weight: bold; font-size: 20px; line-height: 26px;\">Specification</h2></div><table class=\"data-table flex-table\" cellpadding=\"0\" cellspacing=\"0\" style=\"margin: -20px 0px 0px; display: flex; flex-direction: column; width: 920px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px;\"><colgroup style=\"margin: 0px;\"><col class=\"name\" style=\"margin: 0px;\"><col class=\"value\" style=\"margin: 0px;\"></colgroup><thead style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: var(--s-s-bg); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Processor</td></tr></thead><tbody style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Processor Brand</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">AMD</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Processor Model</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">Ryzen 5 7520U</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Processor Frequency</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">2.8 GHz – 4.3 GHz</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Processor Core</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">4</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Processor Thread</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">8</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">CPU Cache</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">L1 Cache: 256KB<br style=\"margin: 0px;\">L2 Cache: 2MB<br style=\"margin: 0px;\">L3 Cache: 4MB</td></tr></tbody><thead style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: var(--s-s-bg); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Display</td></tr></thead><tbody style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Display Size</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">15.6\"</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Display Type</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">TN</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Display Resolution</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">FHD (1920 x 1080)</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Touch Screen</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">N/A</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Display Features</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">220nits Anti-glare; 170° Viewing Angle</td></tr></tbody><thead style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: var(--s-s-bg); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Memory</td></tr></thead><tbody style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">RAM</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">8GB (On Board)</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">RAM Type</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">DDR5</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Removable</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">NO</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Bus Speed</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">5500MHz</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Total RAM Slot</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">1</td></tr></tbody><thead style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: var(--s-s-bg); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Storage</td></tr></thead><tbody style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Storage Type</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">NVMe PCIe SSD</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Storage Capacity</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">256GB</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Extra M.2 Slot</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">N/A</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Supported SSD Type</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">PCIe NVMe M.2</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Storage Upgrade</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">Installed SSD can be upgradeable</td></tr></tbody><thead style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: var(--s-s-bg); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Graphics</td></tr></thead><tbody style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Graphics Model</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">AMD Radeon 610M</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Graphics Memory</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">Shared</td></tr></tbody><thead style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: var(--s-s-bg); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Keyboard &amp; TouchPad</td></tr></thead><tbody style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Keyboard Type</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">Non-backlit, English (EU)</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">TouchPad</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">Yes</td></tr></tbody><thead style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: var(--s-s-bg); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Camera &amp; Audio</td></tr></thead><tbody style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">WebCam</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">Yes</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Speaker</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">Yes</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Microphone</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">Yes</td></tr></tbody><thead style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: var(--s-s-bg); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Ports &amp; Slots</td></tr></thead><tbody style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Optical Drive</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">N/A</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Card Reader</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">SD Media Card Reader</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">HDMI Port</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">1x HDMI 1.4b</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">USB 2 Port</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">1x USB 2.0 Type-A</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">USB 3 Port</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">1x USB 3.2 Gen 1 Type-A</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">USB Type-C / Thunderbolt Port</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">1x USB-C 3.2 Gen 1 (support data transfer only)</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Headphone &amp; Microphone Port</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">1 x Headphone/ Microphone Port Combo</td></tr></tbody><thead style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: var(--s-s-bg); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Network &amp; Connectivity</td></tr></thead><tbody style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">WiFi</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">Wi-Fi® 6, 11ax 2x2</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Bluetooth</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">Bluetooth 5.1</td></tr></tbody><thead style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: var(--s-s-bg); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Security</td></tr></thead><tbody style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Fingerprint Sensor</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">No</td></tr></tbody><thead style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: var(--s-s-bg); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Software</td></tr></thead><tbody style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Operating System</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">Free Dos</td></tr></tbody><thead style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: var(--s-s-bg); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Power</td></tr></thead><tbody style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Battery Type</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">3 Cell Li-ion</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Battery Capacity</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">42Whr</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Adapter Type</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">65W Round Tip (3-pin)</td></tr></tbody><thead style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: var(--s-s-bg); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Physical Specification</td></tr></thead><tbody style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Color</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">Sand</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Dimensions</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">325.3 x 216.5 x 17.9 mm</td></tr><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Weight</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">1.58 kg</td></tr></tbody><thead style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"heading-row\" colspan=\"3\" style=\"margin: 20px 0px 0px; padding: 6px 20px; flex: 1 1 auto; display: flex; background: var(--s-s-bg); color: var(--s-secondary); font-size: 16px; line-height: 30px; font-weight: bold; border-radius: 5px;\">Warranty</td></tr></thead><tbody style=\"margin: 0px;\"><tr style=\"margin: 0px; display: flex;\"><td class=\"name\" style=\"margin: 0px; padding: 10px 20px; flex: 0 0 250px; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239); color: rgb(102, 102, 102);\">Warranty Details</td><td class=\"value\" style=\"margin: 0px; padding: 10px 20px; flex: 1 1 auto; display: flex; line-height: 22px; border-bottom: 1px solid rgb(236, 237, 239);\">2 years warranty ( Battery adapter 1 year)</td></tr></tbody></table>', '<section class=\"description bg-white m-tb-15\" id=\"description\" style=\"margin: 0px 0px 20px; padding: 20px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 4px; box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 1px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px;\"><div class=\"section-head\" style=\"margin: 0px; padding-bottom: 20px;\"><h2 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; font-weight: bold; font-size: 20px; line-height: 26px;\">Description</h2></div><div class=\"full-description\" itemprop=\"description\" style=\"margin: 0px; line-height: 24px;\"><h2 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; font-weight: bold; font-size: 20px; line-height: 26px;\">Lenovo IdeaPad 1 15AMN7 Ryzen 5 7520U 15.6\" FHD Laptop</h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(1, 19, 45); line-height: 26px;\">The Lenovo&nbsp;<strong style=\"margin: 0px;\">IdeaPad 1 15AMN7</strong>&nbsp;is a flexible 15.6-inch FHD&nbsp;<a href=\"https://www.startech.com.bd/laptop-notebook\" target=\"\" style=\"margin: 0px; color: rgb(0, 0, 0);\">laptop&nbsp;</a>that has been precisely designed to give a smooth computing experience. This laptop is powered by the AMD Ryzen 5 7520U CPU, which has 4 cores and 8 threads, a base frequency of 2.8 GHz, and a turbo boost of up to 4.3 GHz. It provides quick performance for a variety of computer activities. Multitasking is made easy with 8GB of DDR5 RAM, and the nimble 256GB SSD storage ensures quick data access and enough room for your files. Immerse yourself in a visually spectacular experience with the 15.6-inch FHD display, which has a resolution of 1920 x 1080. Whether digging into professional assignments or enjoying multimedia entertainment, the brilliant images emphasize every detail, giving a wonderful viewing experience. The Lenovo IdeaPad 1 15AMN7 not only excels in performance but also prioritizes user experience, with high-definition (HD) Audio providing an immersive sound experience that enhances your enjoyment and productivity. The presence of a camera privacy shutter puts privacy first, giving you control over your digital security by allowing you to cover the webcam when it is not in use. The Lenovo IdeaPad 1 15AMN7 is more than simply a computer; it\'s a flexible and dependable companion that adapts to your daily demands flawlessly. This laptop, with its powerful performance, user-friendly features, and privacy considerations, is an excellent choice for people looking for efficiency and practicality in a sleek and small design.</p><h2 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; font-weight: bold; font-size: 20px; line-height: 26px;\">Buy Lenovo IdeaPad 1 15AMN7 Ryzen 5 7520U 15.6\" FHD Laptop from Star Tech</h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(1, 19, 45); line-height: 26px;\">In Bangladesh, you can get the original&nbsp;<strong style=\"margin: 0px;\">Lenovo IdeaPad 1 15AMN7 Ryzen 5 7520U 15.6\" FHD Laptop</strong>&nbsp;from Star Tech. We have a large collection of the latest Lenovo&nbsp;<a href=\"https://www.startech.com.bd/laptop-notebook/laptop\" target=\"\" style=\"margin: 0px; color: var(--s-primary);\">Laptops&nbsp;</a>to purchase. Order Online Or Visit your Nearest&nbsp;<a href=\"https://www.startech.com.bd/\" target=\"_blank\" style=\"margin: 0px; color: var(--s-primary);\">Star Tech Shop</a>&nbsp;to get yours at the lowest price. The Lenovo IdeaPad 1 15AMN7 Ryzen 5 7520U 15.6\" FHD Laptop comes with 2 years warranty ( Battery adapter 1 year).</p></div></section><section class=\"latest-price bg-white m-tb-15\" id=\"latest-price\" style=\"margin: 0px 0px 20px; padding: 20px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 4px; box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 1px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif; font-size: 15px;\"><div class=\"section-head\" style=\"margin: 0px; padding-bottom: 20px;\"><h2 style=\"margin-right: 0px; margin-bottom: 5px; margin-left: 0px; font-weight: bold; font-size: 20px; line-height: 26px;\">What is the price of Lenovo IdeaPad 1 15AMN7 Ryzen 5 7520U 15.6\" FHD Laptop in Bangladesh?</h2></div><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(1, 19, 45); line-height: 26px;\">The latest price of Lenovo IdeaPad 1 15AMN7 Ryzen 5 7520U 15.6\" FHD Laptop in Bangladesh is 61,500৳. You can buy the Lenovo IdeaPad 1 15AMN7 Ryzen 5 7520U 15.6\" FHD Laptop at best price from our website or visit any of our showrooms.</p></section>', '15,17,36,11,30,24,22', 'uploads/product/preview/fasdfsaf-65cfa43a56db4.png', '2024-02-16 18:06:50', '2024-02-17 08:36:34');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `subcategory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 24, 'Bag', '2024-01-30 18:45:26', '2024-02-01 11:13:20', NULL),
(2, 24, 'Watch', '2024-01-30 18:45:34', '2024-01-31 19:34:22', NULL),
(3, 25, 'Mobile', '2024-01-30 18:45:42', '2024-02-01 04:33:25', NULL),
(4, 25, 'Television', '2024-01-30 18:45:49', NULL, NULL),
(5, 26, 'Washing Machine', '2024-01-30 18:46:00', NULL, NULL),
(6, 27, 'Sofa', '2024-01-30 18:46:25', NULL, NULL),
(7, 28, 'Jursey', '2024-01-30 18:46:33', NULL, NULL),
(8, 29, 'T Shirt', '2024-01-30 18:46:45', NULL, NULL),
(9, 28, 'Polo Shirt', '2024-01-30 18:46:55', NULL, NULL),
(10, 30, 'Toys', '2024-01-30 18:47:11', '2024-01-31 19:34:38', NULL),
(11, 31, 'Cosmetics', '2024-01-30 18:47:19', '2024-02-01 04:33:09', NULL),
(37, 39, 'Callum Hansen', '2024-01-31 18:59:37', '2024-02-01 04:28:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `tag_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 'Ladies', NULL, '2024-02-01 18:03:24', '2024-02-01 19:04:21'),
(6, 'Style', NULL, '2024-02-01 18:03:24', NULL),
(7, 'Gadget', NULL, '2024-02-01 18:04:18', NULL),
(8, 'Fashion', NULL, '2024-02-01 18:04:18', NULL),
(9, 'lifestyle', NULL, '2024-02-01 18:04:18', NULL),
(10, 'phone', NULL, '2024-02-01 18:04:18', NULL),
(11, 'communication', NULL, '2024-02-01 18:04:18', NULL),
(12, 'Entertainment', NULL, '2024-02-01 18:04:18', NULL),
(13, 'TV', NULL, '2024-02-01 18:05:06', NULL),
(14, 'smart tv', NULL, '2024-02-01 18:05:06', NULL),
(15, 'analog tv', NULL, '2024-02-01 18:05:06', NULL),
(16, 'leather', NULL, '2024-02-01 18:05:06', NULL),
(17, 'clothes', NULL, '2024-02-01 18:05:06', NULL),
(18, 'appliences', NULL, '2024-02-01 18:05:06', NULL),
(19, 'jursey', NULL, '2024-02-01 18:05:46', NULL),
(20, 'decore', NULL, '2024-02-01 18:05:46', NULL),
(21, 'home decore', NULL, '2024-02-01 18:05:46', NULL),
(22, 'comfort', NULL, '2024-02-01 18:05:46', NULL),
(23, 'furniture', NULL, '2024-02-01 18:06:18', NULL),
(24, 'chair', NULL, '2024-02-01 18:06:18', NULL),
(25, 'plastic chair', NULL, '2024-02-01 18:06:18', NULL),
(26, 'wood chair', NULL, '2024-02-01 18:06:18', NULL),
(27, 'sports', NULL, '2024-02-01 18:07:51', NULL),
(28, 'games', NULL, '2024-02-01 18:07:51', NULL),
(29, 'football', NULL, '2024-02-01 18:07:51', NULL),
(30, 'cricket', NULL, '2024-02-01 18:07:51', NULL),
(31, 'tshirt', NULL, '2024-02-01 18:07:51', NULL),
(32, 'polo', NULL, '2024-02-01 18:07:51', NULL),
(33, 'gents', NULL, '2024-02-01 18:07:51', NULL),
(34, 'toys', NULL, '2024-02-01 18:07:51', NULL),
(35, 'kids', NULL, '2024-02-01 18:07:51', NULL),
(36, 'baby', NULL, '2024-02-01 18:07:51', NULL),
(37, 'cosmatics', NULL, '2024-02-01 18:07:51', NULL),
(38, 'beauty', NULL, '2024-02-01 18:07:51', NULL),
(39, 'makeup', NULL, '2024-02-01 18:07:51', NULL),
(40, 'shirt', NULL, '2024-02-01 18:07:51', NULL),
(41, 'Sheila Mcneil', '2024-02-01 19:23:20', '2024-02-01 18:35:03', '2024-02-01 19:23:20'),
(42, 'Fritz Avery', '2024-02-01 19:23:25', '2024-02-01 18:35:03', '2024-02-01 19:23:25'),
(43, 'Leah David', '2024-02-01 19:23:29', '2024-02-01 18:35:03', '2024-02-01 19:23:29'),
(44, 'Merritt Joyce', '2024-02-01 19:23:15', '2024-02-01 18:35:03', '2024-02-01 19:23:15'),
(46, 'Joshua Bernhard Jr.', NULL, '2024-02-08 07:46:42', '2024-02-08 07:46:42'),
(47, 'Macy Schuster V', NULL, '2024-02-08 07:46:42', '2024-02-08 07:46:42'),
(48, 'Dr. Linnea Runolfsdottir DVM', NULL, '2024-02-08 07:46:42', '2024-02-08 07:46:42'),
(49, 'Prof. Nash Runolfsson DDS', NULL, '2024-02-08 07:46:42', '2024-02-08 07:46:42'),
(50, 'Shany Bode', NULL, '2024-02-08 07:46:42', '2024-02-08 07:46:42'),
(51, 'Dr. Devyn McGlynn', NULL, '2024-02-08 07:46:42', '2024-02-08 07:46:42'),
(52, 'Maybelle Bahringer', NULL, '2024-02-08 07:46:42', '2024-02-08 07:46:42'),
(53, 'Leora Stoltenberg', NULL, '2024-02-08 07:46:42', '2024-02-08 07:46:42'),
(54, 'Marta Wintheiser', NULL, '2024-02-08 07:46:42', '2024-02-08 07:46:42'),
(55, 'Dr. Jay Christiansen', NULL, '2024-02-08 07:46:42', '2024-02-08 07:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shamim Hasan', 'gepaxiqil@mailinator.com', '2024-01-15 13:38:06', '$2y$12$92Mbk87VvjLnREx61Gt8I.JHXTeg77hdlfhqW29eXFEycZkYTYAki', 'uploads/users/Shamim Hasan_1.jpg', 'TxtC9drny7xzgni0vZ0z38CdNkSPUKEPOf95IofvTLqxN3rF7vp4nMbvITT9', '2024-01-15 13:38:06', '2024-01-22 09:43:05'),
(3, 'Ciaran Murray', 'cojij@mailinator.com', '2024-01-15 20:33:50', '$2y$12$GrUsD6liLQwG1DbeVeNeVO2pZyPELhE0PzoUxQFWYSvbyisSbS1Oe', 'uploads/users/Ciaran Murray_3.jpg', 'zid1gHzJ3iZJIKO7EiChWjyEEddzrqE1MDlAwodllkx8YLTHzUuRd0c9Tkez', '2024-01-15 14:33:50', '2024-01-22 09:50:13'),
(9, 'Blake Sampson', 'lysixyjon@mailinator.com', '2024-01-24 08:42:27', '$2y$12$DQFsN.YB6LdHEGL2fgdhIO6fO.SWdHQ.dHcnn18GcT1c9D99aIL6i', NULL, NULL, '2024-01-24 02:42:27', '2024-01-24 02:42:27'),
(10, 'Bo Moses', 'ponyxo@mailinator.com', '2024-01-24 08:42:51', '$2y$12$JiO7/CLVGHTSCCKjnjycwOcP9h5mleCVc648OWp3RZvJ73a.CaN8O', NULL, NULL, '2024-01-24 02:42:51', '2024-01-24 02:42:51'),
(14, 'Adria Welch', 'cexecyt@mailinator.com', '2024-01-27 15:26:34', '$2y$12$sNbvjfM81uF47n3hJmbFcuGOZ24LyxTqjdsV8BJBB1sfMVd2pJvsO', NULL, NULL, '2024-01-27 15:26:34', '2024-01-27 15:26:34'),
(15, 'Barrett Parrish', 'pyfe@mailinator.com', '2024-01-27 15:26:46', '$2y$12$K8fNKZoCPnN2C6MqLae9mer/iwiYV2Xv/BdmBqYhE.dVNUO7qIVrO', NULL, NULL, '2024-01-27 15:26:46', '2024-01-27 15:26:46'),
(16, 'Lysandra Alvarez', 'pelelexava@mailinator.com', '2024-01-27 15:27:00', '$2y$12$9IBvEnZxllq6gg3uhTxhceFsACS3E.WZAz1L2cb9ZO3XMp4rTbuLq', NULL, NULL, '2024-01-27 15:27:00', '2024-01-27 15:27:00'),
(17, 'Austin Horne', 'fano@mailinator.com', '2024-01-27 15:27:40', '$2y$12$z7XlJsKNAMevXEz3qqTkvOaFx57WhbaNETlWBJrtMzi9G0ECra.kG', NULL, NULL, '2024-01-27 15:27:40', '2024-01-27 15:27:40'),
(18, 'Tate Gutierrez', 'qinito@mailinator.com', '2024-01-27 15:27:51', '$2y$12$Rx7V2IRtEVgQVq.yxWdQyeJz7q82pAEk9Ufo8rbnzI77cygGo/vUm', NULL, NULL, '2024-01-27 15:27:51', '2024-01-27 15:27:51'),
(19, 'Lois Davidson', 'puxyxuta@mailinator.com', '2024-01-27 15:28:01', '$2y$12$96aVip8NjuHBIgBD4rso3enPmCefJnMGnezbC0wkaeNSLAJDBb56u', NULL, NULL, '2024-01-27 15:28:01', '2024-01-27 15:28:01'),
(20, 'Jason Atkinson', 'hufugog@mailinator.com', '2024-01-27 15:28:19', '$2y$12$K10E6SemMXxw8YnDEbXq9uMr2CyKdeQDDZYmZe55KL9Fwyx.MF2h2', NULL, NULL, '2024-01-27 15:28:19', '2024-01-27 15:28:19'),
(21, 'Jermaine Graves', 'huka@mailinator.com', '2024-01-27 15:28:32', '$2y$12$cUjVZCuLGTGrP7j1lyPZU.zV.BGcxXiDxnaHJMIEFS65LVGrkZSWi', NULL, NULL, '2024-01-27 15:28:32', '2024-01-27 15:28:32'),
(22, 'Elijah Dean', 'povebafo@mailinator.com', '2024-01-27 15:28:47', '$2y$12$Ti5qwK.P/Y0LMg.nfZLbQuQnavg0MQzo6dvUcD95DnL2HbhL5wzQm', NULL, NULL, '2024-01-27 15:28:47', '2024-01-27 15:28:47'),
(23, 'Hilel Irwin', 'dexebi@mailinator.com', '2024-01-27 15:38:45', '$2y$12$mSP9FWMRpprOAUQb8kUA7.4C4GYRMaZ8ry9m2RGs6YF/vAfOn0AV.', NULL, NULL, '2024-01-27 15:38:45', '2024-01-27 15:38:45'),
(24, 'Bernard Vega', 'mugys@mailinator.com', '2024-01-27 15:38:55', '$2y$12$Sk0iG3NneKTyC4JKHTq/dO5S75NBemvaW4NPfRSqoiIRmSi9n2OhW', NULL, NULL, '2024-01-27 15:38:55', '2024-01-27 15:38:55'),
(25, 'Dennis Buckley', 'qewazej@mailinator.com', '2024-01-27 15:39:04', '$2y$12$LIHFH/556usPv.JCMLDTquuiPMGNQqqCBYys4uRhgEwTkSlSPAYVa', NULL, NULL, '2024-01-27 15:39:04', '2024-01-27 15:39:04'),
(28, 'Olga Lott', 'sh92062676@gmail.com', '2024-01-29 19:27:51', '$2y$12$RqM9fafnMsYzaWQBZ2oVG./LWUQn2PLjrizP7sbqpyMYGxfSMHRNe', NULL, NULL, '2024-01-29 19:27:51', '2024-01-29 19:27:51'),
(29, 'Madeson Garrison', 'mdsamime80@gmail.com', '2024-01-29 19:29:11', '$2y$12$T0KCcd007xT41a8EKN2UouiT8TNxUuCeKKdtLWEvXlVTYYrMD5noa', NULL, 'RTLy78pGPgXJGchc9BWqhFAvQLqTiDKrK0ur1mwKp8TgSsr7BxFd2xRcPUri', '2024-01-29 19:29:11', '2024-01-29 19:29:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_tag_name_unique` (`tag_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
