-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 25, 2021 at 04:55 AM
-- Server version: 5.6.49-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clipshoppers`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `address_1` text,
  `address_2` text,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `pincode` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `type`, `name`, `mobile`, `address_1`, `address_2`, `city`, `state`, `pincode`, `created_at`, `updated_at`) VALUES
(1, 3, 'Home', 'Ashok', '9791720841', 'Ganapathypalayam New', 'Pallipalayam', 'Erode', 'Tamil Nadu', '638008', '2019-07-23 13:14:53', '2021-01-23 18:30:26'),
(2, 1, 'Home', 'SUSHANTHI', '1234546789', 'ERODE', 'CHATRAM', 'ERODE', 'TAMILNADU', '638004', '2020-05-26 13:50:24', '2020-05-26 13:51:03'),
(3, 7, 'Home', 'tamil', '9994976742', 'surampatti', 'surampatti valasu', 'erode', 'tamilnadu', '638001', '2020-06-05 20:21:29', '2020-06-05 20:21:29'),
(5, 7, 'Office', 'tamil', '9994976742', 'surampatti', 'surampatti valasu', 'erode', 'tamilnadu', '638001', '2020-06-05 20:22:21', '2020-06-05 20:22:21'),
(6, 1, 'Home', 'Tamil', '9994976742', 'Erode', 'Surampatti', 'Erode', 'Tamilnadu', '638009', '2021-01-23 13:53:05', '2021-01-23 13:53:05'),
(7, 3, NULL, 'ashok', '9791720841', '5', 'Rev plaza', 'coimbatore', 'Tamilnadu', '641004', '2021-01-23 18:31:11', '2021-01-23 18:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `product_variant_combination_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `guest_cart_id` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_variant_combination_id`, `user_id`, `guest_cart_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, '623389463', 1, '2019-07-23 13:08:12', '2019-07-23 13:08:12'),
(2, 2, NULL, '423129767', 2, '2020-05-23 11:42:54', '2020-05-23 18:42:54'),
(3, 4, NULL, '42316719', 2, '2020-05-23 14:48:13', '2020-05-23 21:48:13'),
(4, 4, 7, NULL, 2, '2020-05-23 21:49:05', '2020-05-23 21:49:05'),
(5, 5, NULL, '425156392', 1, '2020-05-25 13:45:33', '2020-05-25 13:45:33'),
(6, 1, NULL, '425156392', 1, '2020-06-05 20:19:15', '2020-06-05 20:19:15'),
(7, 9, 7, NULL, 1, '2020-06-05 20:20:21', '2020-06-05 20:20:21'),
(10, 5, NULL, '1118105772', 1, '2020-12-18 20:40:32', '2020-12-18 20:40:32'),
(11, 6, NULL, '023184989', 2, '2021-01-23 06:48:31', '2021-01-23 13:48:31'),
(12, 2, NULL, '025558566', 1, '2021-01-25 14:25:29', '2021-01-25 14:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `slug`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Dhoti', 'Dhoti', 'Trendy', '2019-07-15 20:44:07', '2021-01-23 23:07:49', NULL),
(2, 1, 'Saree', 'Saree', NULL, '2019-07-15 20:44:25', '2019-07-15 20:44:25', NULL),
(3, 1, 'Pant', 'Pant', NULL, '2019-07-15 20:44:35', '2019-07-15 20:44:35', NULL),
(4, 1, 'Shirt', 'Shirt', NULL, '2019-07-15 20:44:45', '2019-07-15 20:44:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_images`
--

CREATE TABLE `category_images` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cms_images`
--

CREATE TABLE `cms_images` (
  `id` int(11) NOT NULL,
  `cms_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_images`
--

INSERT INTO `cms_images` (`id`, `cms_id`, `name`, `path`) VALUES
(1, 1, '8a20112a-e2ba-49a5-a790-adfeeb86e3a6.png', 'cms/1/dNGARGOzcJMrkbu5eTPdXYP3MnC4qYMD7E1SGqZt.jpeg'),
(2, 2, 'd53b544d-4ed3-4074-aa67-b31950ab749b.png', 'cms/2/vfDaIxfmxMgPT3y24AnRh0iJ6zeku7BxWE36NxoH.jpeg'),
(3, 3, '6e0054f0-f030-40c5-bc2b-04cd250dc073.jpg', 'cms/3/0jQgovdzpbotCF3bRo2KK45WzfPhxemGaXkc6VPl.jpeg'),
(4, 4, 'f86a8d20-ee14-46cc-9f41-de5c2ab69f53.jpg', 'cms/4/zcdVZZWUYO3H8K65RP5UiUXqgZx0hEhX4NJBlXT8.jpeg'),
(5, 5, '54b49de8-7565-4a27-a453-0e764db5df24.jpg', 'cms/5/KMV4Q4klTAkrZnXyrax8HFirwUQfJoO4ZcpDBHBh.jpeg'),
(8, 6, '93da7830-20ca-460e-b89d-f947da0c9ce3.jpg', 'cms/6/O4WEE7CcgiYrupZ0RPZ4hF6v86YUMCjkj2rV0Yrt.jpeg'),
(9, 7, '9cb46f8c-ffee-481c-a861-c830d6ba20b6.jpg', 'cms/7/2iPmnpkA28wXqqCdTBolXjI34qDucPtHi25YYejn.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `product_id` int(50) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(2) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `remarks` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `title`, `product_id`, `user_id`, `role_id`, `slug`, `remarks`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SlideBanner-both', NULL, 1, NULL, 'SlideBanner-both', 'SlideBanner-both', '2019-07-16 17:23:54', '2019-07-22 21:30:54', '2019-07-22 21:30:54'),
(2, 'SlideBanner-both', NULL, 1, NULL, 'SlideBanner-both', 'SlideBanner-both', '2019-07-16 17:24:26', '2019-07-22 21:30:46', '2019-07-22 21:30:46'),
(3, 'SlideBanner-web', NULL, 1, NULL, 'SlideBanner-web', 'SlideBanner-web', '2019-07-22 21:34:35', '2019-07-22 21:34:35', NULL),
(4, 'SlideBanner-web', NULL, 1, NULL, 'SlideBanner-web', 'SlideBanner-web', '2019-07-22 21:34:52', '2019-07-22 21:34:52', NULL),
(5, 'SlideBanner-web', NULL, 1, NULL, 'SlideBanner-web', 'SlideBanner-web', '2019-07-22 21:35:13', '2019-07-22 21:35:13', NULL),
(6, 'SlideBanner-both', NULL, 1, NULL, 'SlideBanner-both', 'SlideBanner-both', '2021-01-23 16:06:01', '2021-01-23 16:06:01', NULL),
(7, 'Pongal Sale 2021', NULL, 1, NULL, 'Offer-both', 'Offer-both', '2021-01-23 16:10:42', '2021-01-23 16:10:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boys`
--

CREATE TABLE `delivery_boys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `license_number` varchar(45) DEFAULT NULL,
  `rc_book_number` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_boys`
--

INSERT INTO `delivery_boys` (`id`, `user_id`, `license_number`, `rc_book_number`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 9, 'AK00012', 'Tn37cf4455', '2021-01-23 16:04:30', '2021-01-23 16:04:56', NULL),
(2, 11, 'ak4455', 'tn36cj4456', '2021-01-23 19:01:39', '2021-01-23 19:01:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boys_documents`
--

CREATE TABLE `delivery_boys_documents` (
  `id` int(11) NOT NULL,
  `delivery_boy_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_boys_documents`
--

INSERT INTO `delivery_boys_documents` (`id`, `delivery_boy_id`, `name`, `path`) VALUES
(1, 1, 'Ashok Test', 'delivery_boys/1/fYO81KIdj9V7aw6ssdKSwZkVlgU36nhfJ9gGbjL1.png');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `cms_id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `discount` varchar(45) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `max_amount` decimal(10,2) DEFAULT NULL,
  `min_cart_amount` decimal(10,2) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `description` text,
  `expiry_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `cms_id`, `code`, `discount`, `title`, `max_amount`, `min_cart_amount`, `role_id`, `description`, `expiry_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 7, 'PONGAL50', '50', 'Pongal Sale 2021', 200.00, 2500.00, 4, 'New Year and Pongal Sale', '2021-01-31 07:00:00', '2021-01-23 16:10:42', '2021-01-23 16:10:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(45) DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `amount_paid` decimal(10,2) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_address_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  `discount` varchar(45) DEFAULT NULL,
  `offer_code` varchar(45) DEFAULT NULL,
  `shipping_number` varchar(45) DEFAULT NULL,
  `shipping_tax` varchar(45) DEFAULT NULL,
  `delivery_charge` decimal(10,2) DEFAULT NULL,
  `shipping_charge` decimal(10,2) DEFAULT NULL,
  `order_status` varchar(45) DEFAULT NULL,
  `delivery_boy_id` int(11) DEFAULT NULL,
  `cancelled_reason` text,
  `cancelled_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `payment_method_id`, `amount_paid`, `user_id`, `customer_address_id`, `total`, `sub_total`, `discount`, `offer_code`, `shipping_number`, `shipping_tax`, `delivery_charge`, `shipping_charge`, `order_status`, `delivery_boy_id`, `cancelled_reason`, `cancelled_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 1, 1600.00, 3, NULL, 1600.00, 1600.00, '0', 'null', '2121232323', '15', 0.00, 20.00, 'Pending', NULL, NULL, NULL, '2019-07-23 13:20:02', '2019-07-23 13:20:02', NULL),
(2, '1', 1, 798.00, 1, NULL, 798.00, 798.00, '0', 'null', '2121232323', '15', 0.00, 20.00, 'Processed', NULL, NULL, NULL, '2020-05-26 13:51:40', '2020-05-29 01:22:28', NULL),
(3, NULL, 1, 0.00, 7, NULL, 4279.00, 4279.00, '0.0', NULL, NULL, NULL, 0.00, NULL, 'Pending', NULL, NULL, NULL, '2021-01-16 23:09:24', '2021-01-16 23:09:24', NULL),
(4, NULL, 1, 0.00, 7, NULL, 1600.00, 1600.00, '0.0', NULL, NULL, NULL, 0.00, NULL, 'Pending', NULL, NULL, NULL, '2021-01-17 02:21:00', '2021-01-17 02:21:00', NULL),
(5, NULL, 1, 0.00, 7, NULL, 1600.00, 1600.00, '0.0', NULL, NULL, NULL, 0.00, NULL, 'Pending', NULL, NULL, NULL, '2021-01-17 17:03:50', '2021-01-17 17:03:50', NULL),
(6, '1', 1, 2599.00, 1, NULL, 2599.00, 2599.00, '0', 'null', '2121232323', '15', 0.00, 20.00, 'Pending', NULL, NULL, NULL, '2021-01-23 13:53:29', '2021-01-23 13:53:29', NULL),
(7, '1', 1, 424.00, 1, NULL, 424.00, 399.00, '0', 'null', '2121232323', '15', 25.00, 20.00, 'Processed', NULL, NULL, NULL, '2021-01-23 13:54:25', '2021-01-23 13:58:41', NULL),
(8, NULL, 1, 0.00, 3, NULL, 3795.00, 3995.00, '200.0', 'PONGAL50', NULL, NULL, 0.00, NULL, 'Delivered', 1, NULL, NULL, '2021-01-23 18:40:12', '2021-01-23 19:09:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_addresses`
--

CREATE TABLE `order_addresses` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `address_1` text,
  `address_2` text,
  `pincode` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_addresses`
--

INSERT INTO `order_addresses` (`id`, `order_id`, `address_1`, `address_2`, `pincode`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ganapathypalayam', 'Pallipalayam', '638008', '2019-07-23 13:20:02', '2019-07-23 13:20:02'),
(2, 2, 'ERODE', 'CHATRAM', '638004', '2020-05-26 13:51:40', '2020-05-26 13:51:40'),
(3, 3, 'tamil/n9994976742/nsurampatti', 'surampatti valasu, erode', '638001', '2021-01-16 23:09:24', '2021-01-16 23:09:24'),
(4, 4, 'tamil/n9994976742/nsurampatti', 'surampatti valasu, erode', '638001', '2021-01-17 02:21:00', '2021-01-17 02:21:00'),
(5, 5, 'tamil/n9994976742/nsurampatti', 'surampatti valasu, erode', '638001', '2021-01-17 17:03:50', '2021-01-17 17:03:50'),
(6, 6, 'ERODE', 'CHATRAM', '638004', '2021-01-23 13:53:29', '2021-01-23 13:53:29'),
(7, 7, 'ERODE', 'CHATRAM', '638004', '2021-01-23 13:54:25', '2021-01-23 13:54:25'),
(8, 8, 'Ashok/n9791720841/nGanapathypalayam New', 'Pallipalayam, Erode', '638008', '2021-01-23 18:40:12', '2021-01-23 18:40:12');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `product_variant_combination_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `gst` varchar(45) DEFAULT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_variant_combination_id`, `order_id`, `name`, `price`, `mrp`, `quantity`, `gst`, `sub_total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, 'shirt2', 1600.00, 1800.00, '1', '12', 80000.00, '2019-07-23 13:20:02', '2019-07-23 13:20:02', NULL),
(2, 5, 2, 'Manura colour dhothi red border', 399.00, 499.00, '2', '12', 20349.00, '2020-05-26 13:51:40', '2020-05-26 13:51:40', NULL),
(3, 3, 3, 'Shirt3', 2300.00, 2500.00, '1', NULL, 2300.00, '2021-01-16 23:09:24', '2021-01-16 23:09:24', NULL),
(4, 15, 3, 'Manura George lime dhothi', 379.00, 499.00, '1', NULL, 379.00, '2021-01-16 23:09:24', '2021-01-16 23:09:24', NULL),
(5, 22, 3, '100k cherry', 500.00, 1000.00, '1', NULL, 500.00, '2021-01-16 23:09:24', '2021-01-16 23:09:24', NULL),
(6, 1, 3, 'Shirt', 1100.00, 1200.00, '1', NULL, 1100.00, '2021-01-16 23:09:24', '2021-01-16 23:09:24', NULL),
(7, 2, 4, 'shirt2', 1600.00, 1800.00, '1', NULL, 1600.00, '2021-01-17 02:21:00', '2021-01-17 02:21:00', NULL),
(8, 2, 5, 'shirt2', 1600.00, 1800.00, '1', NULL, 1600.00, '2021-01-17 17:03:50', '2021-01-17 17:03:50', NULL),
(9, 1, 6, 'Shirt', 1100.00, 1200.00, '1', '12', 53900.00, '2021-01-23 13:53:29', '2021-01-23 13:53:29', NULL),
(10, 1, 6, 'Shirt', 1100.00, 1200.00, '1', '12', 53900.00, '2021-01-23 13:53:29', '2021-01-23 13:53:29', NULL),
(11, 5, 6, 'Manura colour dhothi red border', 399.00, 499.00, '1', '12', 19551.00, '2021-01-23 13:53:29', '2021-01-23 13:53:29', NULL),
(12, 5, 7, 'Manura colour dhothi red border', 399.00, 499.00, '1', '12', 19152.00, '2021-01-23 13:54:25', '2021-01-23 13:54:25', NULL),
(13, 23, 8, 'Jeans', 799.00, 999.00, '5', NULL, 3995.00, '2021-01-23 18:40:13', '2021-01-23 18:40:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pincodes`
--

CREATE TABLE `pincodes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pincode` varchar(45) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pincodes`
--

INSERT INTO `pincodes` (`id`, `user_id`, `pincode`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '638001', 'erode', '2019-07-23 13:15:54', '2019-07-23 13:15:54', NULL),
(2, 1, '638002', 'Erode', '2019-07-23 13:16:14', '2019-07-23 13:16:14', NULL),
(3, 1, '638003', 'Erode', '2019-07-23 13:16:28', '2019-07-23 13:16:28', NULL),
(4, 1, '638004', 'Erode', '2019-07-23 13:16:40', '2019-07-23 13:16:40', NULL),
(5, 1, '638005', 'Erode', '2019-07-23 13:16:50', '2019-07-23 13:16:50', NULL),
(6, 1, '638005', 'erode', '2019-07-23 13:17:05', '2019-07-23 13:17:10', '2019-07-23 13:17:10'),
(7, 1, '638006', 'test', '2019-07-23 13:17:20', '2019-07-23 13:17:20', NULL),
(8, 1, '638007', 'test', '2019-07-23 13:17:32', '2019-07-23 13:17:32', NULL),
(9, 1, '638008', 'erode', '2019-07-23 13:17:41', '2019-07-23 13:17:41', NULL),
(10, 1, '638011', 'erode', '2019-07-23 13:18:10', '2019-07-23 13:18:10', NULL),
(11, 1, '638102', 'test', '2019-07-23 13:18:20', '2019-07-23 13:18:20', NULL),
(12, 1, '638112', 'erode', '2019-07-23 13:18:58', '2019-07-23 13:18:58', NULL),
(13, 1, '638009', 'erode', '2019-07-23 13:19:16', '2019-07-23 13:19:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `hsn_number` varchar(255) DEFAULT NULL,
  `description` text,
  `status` tinyint(4) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `number`, `category_id`, `hsn_number`, `description`, `status`, `brand`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Shirt', '123', 4, '12345', 'Fit Type: Regular Fit\r\nMaterial: Cotton (Breathable) :::: Avilable Sizes 38,40,42,44,46\r\nFit: Comfort Regular Fit, Half Sleeves\r\nOccasion: Formal Wear,Party Wear,Occasion Wear,Office Wear,Casual Wear,beach Wear\r\nSize Chart: M=38, L=40,XL=42,XXL=44,3XL=46\r\nWash Care: Machine wash cold; Wash dark colors separately; Do not bleach; Dry in shade; Tumble dry low; Do not dry clean; Use steam iron', 1, 'Basics', '2019-07-16 14:48:11', '2019-07-16 14:48:11', NULL),
(2, 1, 'shirt2', '222', 4, '222', 'Fit Type: Regular Fit\r\nMaterial: Cotton (Breathable) :::: Avilable Sizes 38,40,42,44,46\r\nFit: Comfort Regular Fit, Half Sleeves\r\nOccasion: Formal Wear,Party Wear,Occasion Wear,Office Wear,Casual Wear,beach Wear\r\nSize Chart: M=38, L=40,XL=42,XXL=44,3XL=46\r\nWash Care: Machine wash cold; Wash dark colors separately; Do not bleach; Dry in shade; Tumble dry low; Do not dry clean; Use steam iron', 1, 'Solley', '2019-07-16 14:56:40', '2019-07-16 14:56:40', NULL),
(3, 1, 'Shirt3', '3333', 4, '44444', 'Fit Type: Regular Fit\r\nMaterial: Cotton (Breathable) :::: Avilable Sizes 38,40,42,44,46\r\nFit: Comfort Regular Fit, Half Sleeves\r\nOccasion: Formal Wear,Party Wear,Occasion Wear,Office Wear,Casual Wear,beach Wear\r\nSize Chart: M=38, L=40,XL=42,XXL=44,3XL=46\r\nWash Care: Machine wash cold; Wash dark colors separately; Do not bleach; Dry in shade; Tumble dry low; Do not dry clean; Use steam iron', 1, 'Levis', '2019-07-16 14:57:31', '2019-07-16 14:57:31', NULL),
(4, 1, 'Shirt5', '5555', 4, '6666', 'Fit Type: Regular Fit\r\nMaterial: Cotton (Breathable) :::: Avilable Sizes 38,40,42,44,46\r\nFit: Comfort Regular Fit, Half Sleeves\r\nOccasion: Formal Wear,Party Wear,Occasion Wear,Office Wear,Casual Wear,beach Wear\r\nSize Chart: M=38, L=40,XL=42,XXL=44,3XL=46\r\nWash Care: Machine wash cold; Wash dark colors separately; Do not bleach; Dry in shade; Tumble dry low; Do not dry clean; Use steam iron', 1, 'Peter', '2019-07-16 14:58:35', '2019-07-16 14:58:35', NULL),
(5, 1, 'Manura colour dhothi red border', '001', 1, '52082110', 'pure cotton organic colour dhothi', 1, 'Manura', '2020-01-30 13:24:14', '2020-01-30 13:24:50', NULL),
(6, 1, 'Manura colour dhothi blue border', '002', 1, NULL, 'pure cotton organic colour dhothi', 1, 'Manura', '2020-01-30 13:26:18', '2020-01-30 13:27:00', NULL),
(7, 1, 'Manura colour dhothi black border', '003', 1, NULL, 'pure cotton organic colour dhothi', 1, 'Manura', '2020-01-30 13:28:32', '2020-01-30 13:28:32', NULL),
(8, 1, 'Manura colour dhothi Aqua border', '004', 1, NULL, 'pure cotton organic colour dhothi', 1, 'Manura', '2020-01-30 13:34:16', '2020-01-30 13:34:16', NULL),
(9, 1, 'Manura colour dhothi cherry border', '005', 1, NULL, 'pure cotton organic colour dhothi', 1, 'Manura', '2020-01-30 13:44:02', '2020-01-30 13:49:25', NULL),
(10, 1, 'Manura colour dhothi green border', '006', 1, NULL, 'pure cotton organic colour dhothi', 1, 'Manura', '2020-01-30 13:51:22', '2020-01-30 13:51:22', NULL),
(11, 1, 'Manura colour dhothi Brown border', '007', 1, NULL, 'pure cotton organic colour dhothi', 1, 'Manura', '2020-01-30 13:59:31', '2020-01-30 13:59:31', NULL),
(12, 1, 'Manura George orange dhothi', '008', 1, NULL, 'pure cotton organic colour dhothi', 1, 'Manura', '2020-01-30 14:38:31', '2020-01-30 15:20:44', NULL),
(13, 1, 'Manura George pink dhothi', '009', 1, NULL, 'pure cotton organic colour dhothi', 1, 'Manura', '2020-01-30 15:13:52', '2020-01-30 15:20:59', NULL),
(14, 1, 'Manura George mila dhothi', '010', 1, NULL, 'pure cotton organic colour dhothi', 1, 'Manura', '2020-01-30 15:54:12', '2020-01-30 15:54:12', NULL),
(15, 1, 'Manura George lime dhothi', '011', 1, NULL, 'pure cotton organic colour dhothi', 1, 'Manura', '2020-01-30 15:58:40', '2020-01-30 15:58:40', NULL),
(16, 1, 'Manura George PG dhothi', '112', 1, NULL, 'pure cotton organic colour dhothi', 1, 'Manura', '2020-01-30 16:10:31', '2020-01-30 16:17:40', NULL),
(17, 1, 'Manura George coffee dhothi', '113', 1, NULL, 'pure cotton organic colour dhothi', 1, 'Manura', '2020-01-30 16:16:22', '2020-01-30 16:17:51', NULL),
(18, 1, 'Manura George pista dhothi', '114', 1, NULL, 'pure cotton organic colour dhothi', 1, 'Manura', '2020-01-30 16:19:30', '2020-01-30 16:19:30', NULL),
(19, 1, 'Manura Milo royal blue dhothi', '116', 1, NULL, 'pure cotton organic colour dhothi', 1, 'Manura', '2020-01-30 16:31:05', '2020-01-30 16:31:05', NULL),
(20, 1, 'Manura royal red dhothi', '118', 1, NULL, 'pure cotton organic colour dhothi', 1, 'Manura', '2020-01-30 16:41:09', '2020-01-30 16:41:09', NULL),
(21, 1, 'Sus', '00665', 1, '5258', 'Pure Premium Cotton', 1, 'str', '2020-05-26 14:25:17', '2020-05-26 14:25:17', NULL),
(22, 1, '100k cherry', '02100', 1, '5208', '100 percentage  cotton material', 1, 'sun cotton', '2020-05-29 01:18:31', '2020-05-29 01:18:31', NULL),
(23, 1, 'Jeans', 'JN001', 3, '5544', 'Jean Pant', 1, 'Trigger', '2021-01-23 17:12:31', '2021-01-23 17:12:31', NULL),
(24, 1, 'Open Panna', '556347', 1, '52085210', 'Pure Cotton', 1, 'satara', '2021-01-25 08:46:32', '2021-01-25 08:46:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `name`, `path`) VALUES
(1, 1, 'Shirt', 'products/1.jpeg'),
(2, 2, 'Shirt', 'products/2.jpeg'),
(3, 3, 'Shirt', 'products/3.jpeg'),
(4, 4, 'Shirt', 'products/4.jpeg'),
(5, 2, 'Shirt', 'products/1.jpeg'),
(6, 1, 'Shirt', 'products/2.jpeg'),
(7, 3, 'Shirt', 'products/1.jpeg'),
(8, 1, 'Shirt', 'products/4.jpeg'),
(9, 4, 'Shirt', 'products/2.jpeg'),
(10, 2, 'Shirt', 'products/4.jpeg'),
(11, 5, 'ff264508-da12-40b4-a00d-10075d92c851.jpg', 'products/5/rregivmxQvJjebedwslvcY96suZJeY3uXDqiyTX1.jpeg'),
(12, 5, '0a2bd8fc-424b-4d44-8b8c-987e065be044.jpg', 'products/5/1zUJH2VERX3we6mIQImlI4zIyogtRz1hXiZ84lew.jpeg'),
(13, 6, '67d08234-9d52-48a4-8d77-49d188b6e0e8.jpg', 'products/6/DK6OXSRh3vcMkVPJ1eES4GgosDWBSoPpgEW5x5XT.jpeg'),
(14, 6, '4ccc99fb-c052-43fa-b8b8-ae10234353df.jpg', 'products/6/tPrwKCQcBQpcuRXL4nYGxb50hubA6jmlMyoL0PCk.jpeg'),
(15, 7, 'f1d854dc-6c5a-4d2c-b720-3f75a0e1b580.jpg', 'products/7/ZGF3ZyZ8hONC6J1p42M3xZXJh2MTRa5Z3ZscTttt.jpeg'),
(16, 7, 'f96d6e34-f443-45ef-a459-8cf4eacdea86.jpg', 'products/7/7jFuQ0tzzeapMl34AcIYxIVU4S9wnwBIPbAIp1Mg.jpeg'),
(17, 7, '2ae36359-bf83-4cbe-b1e4-e5038fe3786e.jpg', 'products/7/w9pn77SdgnNAB8n0P4PXAL0m004MuVUNCQstYj9X.jpeg'),
(18, 6, '51ed642e-e6c4-4386-9554-13274127709e.jpg', 'products/6/J818ePIpKID6aAkgyBi2vElkHUtE0bLHwG8CJIBN.jpeg'),
(19, 5, '70ea5625-4e8d-41a5-9731-e5e52ade11a3.jpg', 'products/5/IATh4MDZdhh6UYyOUPPj8gVOFlVOKF5AlzvgDoZ2.jpeg'),
(20, 8, 'be21bd3d-ef47-478f-8d6b-206c23cc9b18.jpg', 'products/8/vAG6UuwoEbZAIVsq1uCayQruV3Iw2dU71IM0nLV9.jpeg'),
(21, 8, '390e31e2-538d-4c51-9204-4c746c84e5a6.jpg', 'products/8/5YLpJaKBOyG78qD0pfrdRglpQ6siEH7oUwjenbnn.jpeg'),
(22, 8, '67c13b64-b9cb-4eb5-bccd-6f787d4935a2.jpg', 'products/8/hGyQsnbp1hJi9niFTJuwJLBLTfQWGWldaDufPXID.jpeg'),
(23, 9, '334653a7-4449-44c9-81a9-972cd8ea0d4f.jpg', 'products/9/8arlAQKx6hLD0DbtIjEttyIerPrhmVyKl6MtjvDR.jpeg'),
(24, 9, 'b3af961f-f166-480c-a92b-4a6fd6ccb601.jpg', 'products/9/pWXoc9z4aCqZXdOEdaHjBvZ9VQRF5U0RbZMJDznu.jpeg'),
(25, 9, '2b679887-ab31-480d-9200-f385dc68808e.jpg', 'products/9/GVdSzKWxee7js688kKKyKEpx3vAoOyBfd5EMCsrz.jpeg'),
(29, 10, 'f8a1f96a-3c53-4b1c-bae4-44c290a15b36.jpg', 'products/10/n1s4CUXB1glfg3Z1Wn7Un63fs49YRvO82gIzdw6F.jpeg'),
(30, 10, '6952844c-be1d-4393-8141-1a136b9e9512.jpg', 'products/10/UZFnRpTjOI6r57aoNvAeiYrCBqiEYNSlRCsGw0yQ.jpeg'),
(31, 10, '52b84df5-3b72-43c3-bff7-6dd8c2765b0c.jpg', 'products/10/6fKH4XvqKc68JFU3Mr4bedmswlfnk9LNdLKX5NJa.jpeg'),
(32, 11, '354385c3-8d86-4d72-9f6e-4fc152769eb4.jpg', 'products/11/NDFKrmIorxakAh23iY3fUtauyjzVqi4Q49cMHh8J.jpeg'),
(33, 11, '18d7267a-2ab5-4ea9-8729-868c8a8f7ef3.jpg', 'products/11/bkKiW8uEZ375sC2OkKnEorewSsmtLhNIhedSacv0.jpeg'),
(34, 11, 'd70e7041-31b0-42a3-931b-77cd655314b3.jpg', 'products/11/Zbetz7ydHlnIOUYXKZ2tBG38jB5ijvyW2xx1OhZ2.jpeg'),
(35, 12, '2f8a0eef-ebe6-48ad-9086-6d58a420a08f.jpg', 'products/12/CkU27gKIuosjLPjN3ecKI30pCGJlMp7ZHugmRCOc.jpeg'),
(36, 12, '1c33c4c7-82a4-4226-8dd7-85fe77482f1f.jpg', 'products/12/E9QqRNk2XgZmu9KufnyQudwN6WgyV2cqCOEs2co2.jpeg'),
(37, 13, 'f6fc6796-9256-4b2c-8955-3ab9b3196810.jpg', 'products/13/kq0uikhyVj2HhtJjSXNJGKzfNIdzesUntUhZz7Tf.jpeg'),
(38, 13, 'a844decd-9c32-4f37-8fcb-57231b7f3ece.jpg', 'products/13/KqmNDDq3HiANN3bLoKfToVcukSJ4kqQawJPs38s3.jpeg'),
(39, 14, 'eadbe492-3e31-478b-86ae-c4285afa73e7.jpg', 'products/14/9mMPZLE2CcHoOYfw0pnsxThHMCqPX85w7ya3ckvf.jpeg'),
(40, 14, 'f7e8b2b3-a7bd-45ef-9d14-74c22e3b1fcc.jpg', 'products/14/BgIqYqYhE4yDMvBSohMmBDzRjS4vmGdJU3duCVug.jpeg'),
(41, 15, 'f233e166-e065-4e62-b301-a4d59989dcaa.jpg', 'products/15/m7yeJcBRRMAedaKJVQOSOuoYEqdhCJpGwzBgYlQ1.jpeg'),
(42, 15, 'ec7bd116-f9e0-4b23-b698-4213a7288158.jpg', 'products/15/Z9aPpz4zaNkWT0xjs32JeikRrCs8nITMU7dO8tWR.jpeg'),
(43, 16, 'd1450ef9-29c5-47d0-8966-9733ed9ab03f.jpg', 'products/16/noTdBxHVcoRzbi3ouA158PEEBn0XdRFqG5kBgIc7.jpeg'),
(44, 16, 'f2873601-ce25-485c-a135-efdf6ce06eff.jpg', 'products/16/y6EAknydp5nl5UHVLrps5xZUDQAyarLCyGtOFtJb.jpeg'),
(45, 17, '6271dc99-8074-4cd5-97d7-5f8d6895525d.jpg', 'products/17/uT8mbgOly8f5lmcB06dMo6f1UPiqMZGBpYZM6ENm.jpeg'),
(46, 17, '7b78e721-25e7-4aea-9cc7-088795ac571a.jpg', 'products/17/WKdbQFCuWZ4HrRNeh0aF0Yx150JTeg4rleYVPlJ7.jpeg'),
(47, 18, 'f07c6d71-bfa6-4276-8d2b-c5be0425b6df.jpg', 'products/18/twPl5HcseltelQSroFmpiK5qbwmxlrnyk8iFRtKb.jpeg'),
(48, 18, '93c90c27-bb59-404d-b1da-7f6913a0ecaf.jpg', 'products/18/4nFklAUJqqr8U9KjXlAhAZGfMi0CIcjRSsMeY87Q.jpeg'),
(49, 19, 'e06a3a98-784c-4029-9b39-7cd52e69d968.jpg', 'products/19/xMygY9ZWtTRwENFHsYIYpGOtlSdh6PRRcfQ7CgPd.jpeg'),
(50, 19, 'fb19a2d4-f68d-4e6a-b06a-c713063a26d3.jpg', 'products/19/Sp1kOIDOQsgZ9xvosZ9K7IehfE4rvSHXllHvIfix.jpeg'),
(51, 20, 'e3e1048a-d3e1-46c3-a282-3194fd197857.jpg', 'products/20/msyoQAZLL2nzERg4VuBMJLp06UnLYDZHou1Ehmed.jpeg'),
(52, 20, 'f22a0a04-70f4-4c51-bc6f-954b409b3fc4.jpg', 'products/20/eocbr9W72RlanADMVgCMaHo34XfCKH88XCFPpnav.jpeg'),
(53, 21, '6c3b1a74-287e-4b21-a4ec-24689670a37c.jpg', 'products/21/WvJSvsDUn81R2By98uG3I3v9cnyYaboAZ1gMBTCo.jpeg'),
(54, 22, 'c351a4e5-1a55-4c7d-9023-cf9b290907c0.jpg', 'products/22/TtbdduuALFxpVI0UBRPDc1hKwG4iJROdE9HdFwD9.jpeg'),
(55, 23, '2f8dfe94-4b75-44d6-815c-1e3494c96a29.jpg', 'products/23/HPZvf7bO3d2ve3bhNfwc6YhwK4oVLT87vy1GA1K1.jpeg'),
(56, 23, 'eee87c65-f2ff-4a2f-bb0d-5bb4ac4c621c.jpg', 'products/23/MeJtPeTm9pIKabUTCOBh251k9I9VACMVQlcHATUB.jpeg'),
(57, 24, '19cdb1b8-7828-4712-b383-623e6f2e2fdb.jpg', 'products/24/xg4yL9aVwSZvgIZsMXc6Fqt9g0kPmwtGnVZhlO6m.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `user_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Litre', '2019-06-17 07:00:00', '2019-06-17 07:00:00', NULL),
(2, 1, 'KG', '2019-07-10 07:00:00', '2019-07-10 07:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_variant_combinations`
--

CREATE TABLE `product_variant_combinations` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_variant_option_id` int(11) DEFAULT NULL,
  `in_stock` tinyint(4) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `mrp` decimal(6,2) NOT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_variant_combinations`
--

INSERT INTO `product_variant_combinations` (`id`, `product_id`, `product_variant_option_id`, `in_stock`, `quantity`, `mrp`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 47, 1200.00, 1100.00, '2019-07-16 14:48:11', '2021-01-23 13:53:29', NULL),
(2, 2, 1, 1, 47, 1800.00, 1600.00, '2019-07-16 14:56:40', '2021-01-17 17:03:50', NULL),
(3, 3, 1, 1, 49, 2500.00, 2300.00, '2019-07-16 14:57:31', '2021-01-16 23:09:24', NULL),
(4, 4, 1, 1, 100, 2300.00, 1800.00, '2019-07-16 14:58:35', '2019-07-16 14:58:35', NULL),
(5, 5, 1, 1, 47, 499.00, 399.00, '2020-01-30 13:24:18', '2021-01-23 13:54:25', NULL),
(6, 6, 1, 1, 50, 499.00, 399.00, '2020-01-30 13:26:19', '2020-01-30 13:26:19', NULL),
(7, 7, 1, 1, 50, 499.00, 399.00, '2020-01-30 13:28:34', '2020-01-30 13:28:34', NULL),
(8, 8, 1, 1, 50, 499.00, 399.00, '2020-01-30 13:34:20', '2020-01-30 13:34:20', NULL),
(9, 9, 1, 1, 50, 499.00, 349.00, '2020-01-30 13:44:21', '2020-01-30 15:56:12', NULL),
(10, 10, 1, 1, 50, 499.00, 349.00, '2020-01-30 13:51:32', '2020-01-30 15:57:10', NULL),
(11, 11, 1, 1, 50, 499.00, 349.00, '2020-01-30 13:59:50', '2020-01-30 15:56:56', NULL),
(12, 12, 1, 1, 50, 499.00, 379.00, '2020-01-30 14:38:49', '2020-01-30 15:55:29', NULL),
(13, 13, 1, 1, 50, 499.00, 379.00, '2020-01-30 15:13:53', '2020-01-30 15:55:42', NULL),
(14, 14, 1, 1, 50, 499.00, 379.00, '2020-01-30 15:54:27', '2020-01-30 15:55:53', NULL),
(15, 15, 1, 1, 49, 499.00, 379.00, '2020-01-30 15:58:49', '2021-01-16 23:09:24', NULL),
(16, 16, 1, 1, 50, 499.00, 379.00, '2020-01-30 16:10:48', '2020-01-30 16:10:48', NULL),
(17, 17, 1, 1, 50, 499.00, 379.00, '2020-01-30 16:16:30', '2020-01-30 16:16:30', NULL),
(18, 18, 1, 1, 50, 499.00, 379.00, '2020-01-30 16:19:38', '2020-01-30 16:19:38', NULL),
(19, 19, 1, 1, 50, 499.00, 369.00, '2020-01-30 16:31:18', '2020-01-30 16:31:18', NULL),
(20, 20, 1, 1, 50, 499.00, 369.00, '2020-01-30 16:41:09', '2020-01-30 16:41:09', NULL),
(21, 21, 1, 1, 200, 499.00, 299.00, '2020-05-26 14:25:17', '2020-05-26 14:25:17', NULL),
(22, 22, 1, 1, 49, 1000.00, 500.00, '2020-05-29 01:18:31', '2021-01-16 23:09:24', NULL),
(23, 23, 1, 1, 10, 999.00, 799.00, '2021-01-23 17:12:31', '2021-01-23 18:40:13', NULL),
(24, 24, 1, 1, 100, 399.00, 299.00, '2021-01-25 08:46:32', '2021-01-25 08:46:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_variant_options`
--

CREATE TABLE `product_variant_options` (
  `id` int(11) NOT NULL,
  `product_variant_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_variant_options`
--

INSERT INTO `product_variant_options` (`id`, `product_variant_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'no\'s', '2019-06-17 07:00:00', '2019-06-17 07:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `referals`
--

CREATE TABLE `referals` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `discount` varchar(45) NOT NULL,
  `max_amount` decimal(10,2) NOT NULL,
  `min_cart_amount` decimal(10,2) NOT NULL,
  `user_id_from` int(11) NOT NULL,
  `user_id_to` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `enable` varchar(10) DEFAULT NULL,
  `completed` varchar(10) DEFAULT '0',
  `expiry_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Employee'),
(3, 'Vendor'),
(4, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `special_products`
--

CREATE TABLE `special_products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `product_variant_combination_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `special_products`
--

INSERT INTO `special_products` (`id`, `user_id`, `type`, `product_variant_combination_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'featured', 1, '2019-07-16 17:13:22', '2019-07-16 17:13:22'),
(2, 1, 'best-selling', 1, '2019-07-16 17:13:25', '2019-07-16 17:13:25'),
(3, 1, 'featured', 2, '2019-07-16 17:13:27', '2019-07-16 17:13:27'),
(4, 1, 'best-selling', 2, '2019-07-16 17:13:30', '2019-07-16 17:13:30'),
(5, 1, 'featured', 3, '2019-07-16 17:13:33', '2019-07-16 17:13:33'),
(6, 1, 'best-selling', 3, '2019-07-16 17:13:35', '2019-07-16 17:13:35'),
(7, 1, 'featured', 4, '2019-07-16 17:13:40', '2019-07-16 17:13:40'),
(8, 1, 'best-selling', 4, '2019-07-16 17:13:42', '2019-07-16 17:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `forgot_password_token` varchar(255) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `api_token` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `forgot_password_token`, `phone`, `api_token`, `profile_image`, `phone_verified_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CVAdmin', 'info@cloudvalleytech.com', NULL, '$2y$10$LElQM3/aqXeo1oSlpf1TS.lvSQyUwt1P48c1UGOdFGrbAhv1fyRcW', 1, NULL, NULL, '1000010000', '703a0a5f-8bac-4390-8fea-36729adf7897', NULL, NULL, NULL, '2021-01-25 16:08:40', NULL),
(2, 'selva', 'selva@cloudvalleytech.con', NULL, '$2y$10$T.nwWFlWeDNqY.EsjOhepugeutbLthFYTlCyslDZqJfLMLNpVG.xi', 4, NULL, NULL, '9750376373', 'acbaeff9-c02f-4603-b6d7-b12d090d74be', NULL, '2019-07-19 14:59:48', '2019-07-15 20:54:19', '2019-07-19 14:59:48', NULL),
(3, 'Ashok', 'ashok@cloudvalleytech.com', NULL, '$2y$10$uDLsxxP8lLRB7sLsGMtQMOOj3zqC.jbmvz2iqlU1n7GinVhYqMGSu', 4, NULL, NULL, '9791720841', '5ec69119-e68e-4a68-b79f-0d7942978286', NULL, '2021-01-23 18:25:35', '2019-07-23 13:12:51', '2021-01-23 18:25:46', NULL),
(4, 'gowtham', 'ga@gmail.com', NULL, '$2y$10$UEaz0Ho4wnJggY5ZavEiw.1aTPM4sNfgFqcsWm47z2H.ee1gwPu2m', 4, NULL, NULL, '9047557055', '32ce82df-30d5-4f75-bd5a-dcc2cae121fb', NULL, '2019-08-09 09:03:19', '2019-08-09 09:02:53', '2019-08-09 09:03:19', NULL),
(5, 'Raghu nathan murugesan', 'raghunathan0787@gmail.com', NULL, '$2y$10$WT3rQwcYNePMJjokcTx2m.NlMsyRdq3WxKHJZHTSp3r/mzKIR3JF6', 4, NULL, NULL, '9199438454', '623bf726-d7a4-428e-90c7-f9cf15659bc9', NULL, NULL, '2020-01-30 14:04:44', '2020-01-30 14:04:44', NULL),
(6, 'Raghu nathan', 'raghunathan0787@gmail.comp', NULL, '$2y$10$lLMuAQ9L/bz1g6Q2yicGoONSpDwEV5kdPYqpReZCqGTFLQH9O/dIu', 4, NULL, NULL, '9943845450', '3987fd38-9f18-4377-97e2-09012564c804', NULL, '2020-01-30 14:07:35', '2020-01-30 14:07:12', '2020-01-30 14:07:35', NULL),
(7, 'tamilarasu', 'tamilarasu.ja@gmail.com', NULL, '$2y$10$KB5p7omGYrpFjSQm9RcLueV39iBGMSLyOaq3HmcFUCcclwcwkh7lW', 4, NULL, NULL, '9994976742', '24cd6885-4d62-4f8c-9701-d22ce0ddbfdf', NULL, '2020-07-14 12:23:49', '2020-04-29 01:05:44', '2020-07-14 12:24:03', NULL),
(8, 'THAR', 'tharad143@gmail.com', NULL, '$2y$10$q2Bq5ZQcdM55Pdh4Bo9DU.e.5pAX9FhAVokWHeWjr07wf3b79PJwu', 4, NULL, NULL, '7603866935', '77eabab4-a55a-424b-b5bb-067f1b0233c8', NULL, NULL, '2020-11-02 00:35:34', '2020-11-03 13:48:50', NULL),
(9, 'Ashok Test', 'ashok@test.com', NULL, '$2y$10$J6XdOJyGs26BXmEalRLR5ubWJRXjIyVshy5lNJwqC04ZgdGOJuzOG', 2, NULL, NULL, '9791720842', '996c76b7-7b2f-4cf5-bc2a-f4bc4bcc22a1', NULL, NULL, '2021-01-23 16:04:30', '2021-01-23 19:07:02', NULL),
(10, 'kumar Customer', 'kumar@test.com', NULL, '$2y$10$WPRvh.Au5PpeU7mDdWlc7ufsELRQigtACxU.CT7tq6LqnI/a69rUa', 4, NULL, NULL, '9994449991', '75e7537d-6558-43d9-91d2-d31c8fea3487', NULL, NULL, '2021-01-23 17:48:15', '2021-01-23 18:50:25', NULL),
(11, 'Raghu test', 'raghu@test.com', NULL, '$2y$10$jtcAhiNqRpw1H95tejasgOt.xV34bHF3IK5F8ROJ19qglqw9/499m', 2, NULL, NULL, '9876598765', '4b4d41bb-8ddf-43ee-80ef-1655a0c56189', NULL, NULL, '2021-01-23 19:01:39', '2021-01-23 19:06:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_extras`
--

CREATE TABLE `user_extras` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `device_token` varchar(255) DEFAULT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `otp` int(8) DEFAULT NULL,
  `otp_expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_extras`
--

INSERT INTO `user_extras` (`id`, `user_id`, `device_token`, `access_token`, `otp`, `otp_expires_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'eiUosNQ7Gj8:APA91bG7QwcAbuuGGOveT13DbvDvYhBGE1tPTeQfcNdePx4AkqrhZ3FbEQ0YvVmF5oSQbkwhRFLDeOrIB0EPodDMcE2ZBIknf2q_pB1ZMoxDfR2YLB48hcD2vqVAuOpbjJK86SDgOvjJ', NULL, 5631, NULL, '2019-07-15 20:41:23', '2021-01-23 14:52:11'),
(2, 2, 'cB_9LdtCk6U:APA91bHZe5Fjx2BX-hS7XSnkVvox5CSkojG8kvLDKHGsSjYZgLgAScJW4qBCesRkjjWOy-oUHerZB1XbwLXpGxkxEtySICVbIhtdx9vDjatxUVfdC73CvsjSH2PxwobaRYQrhddRtYs0', NULL, 5344, NULL, '2019-07-15 20:54:20', '2019-07-19 14:59:33'),
(3, 4, 'ceTvDWXfYAI:APA91bGx3MKLmbx0RlS0bcEdtHaRVZU-dDHrU-OLDvox9UwIvcvH1AhA-9X8VFEMGkS2t7DLi6N-GEf8ISCEAr5y_r0MHN6q8Nk5FvG5R8uj0pqcUHCFBJoqtcMCd3phst15agZNenrg', NULL, 5249, NULL, '2019-08-09 09:02:54', '2019-08-09 09:03:23'),
(4, 5, NULL, NULL, 7139, NULL, '2020-01-30 14:04:45', '2020-01-30 14:04:45'),
(5, 6, 'd7mnP3RUIyc:APA91bHRcLWm1Tftus5FHUCNJ9U_GPOJrcc3vKs0R7tXHpU-GHlMVuweEuDJsM-3-995-WgJkylSXthsmZhV9WPtsJGgMfagjXsiu4LZlBNCaRnCyn8Pn7BgUiwY5hiqiOj9uU-gQQ4j', NULL, 5481, NULL, '2020-01-30 14:07:13', '2020-05-23 18:55:00'),
(6, 7, NULL, NULL, 3308, NULL, '2020-04-29 01:05:49', '2020-07-14 12:23:33'),
(7, 8, 'dCJnXZfIoaU:APA91bHDgAEyHFPOuviPyvgdpHr_P_cs7VTXLrMvtJSo3LnIE2gJ6lJH0HeA_GZ9NWyVWCX2luKPUbo5b0Xn5Vc_WvqKa8QcOPnD1Llw0T6bpCCg8I0XnK4GEUJxbRXjxTdxpgx8HDya', NULL, 8781, NULL, '2020-11-02 00:35:35', '2020-11-04 10:32:54'),
(8, 10, NULL, NULL, 1024, NULL, '2021-01-23 17:48:16', '2021-01-23 18:50:26'),
(9, 3, 'cnjskjxDR8I:APA91bHf1AGvXyrw-NmCD4pDecWr4munasBnzQcSP3QKg8cLp3dzftFCPb62xBsloP3qRF6njPSJR3e_VPBg8d_LP8yleTJ_EKfvBoQin7gKc3qJYKSD_JJ2p8Nv2eUVnxMkguulBPPc', NULL, 6524, NULL, '2021-01-23 18:25:19', '2021-01-23 18:25:47'),
(10, 11, NULL, NULL, NULL, NULL, '2021-01-23 19:06:10', '2021-01-23 19:06:10'),
(11, 9, NULL, NULL, NULL, NULL, '2021-01-23 19:06:47', '2021-01-23 19:06:47');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_variant_combination_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_variant_combination_id`, `created_at`, `updated_at`) VALUES
(1, 2, 4, '2019-07-16 17:29:52', '2019-07-16 17:29:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_users_fk_idx` (`user_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_users_fk_idx` (`user_id`);

--
-- Indexes for table `category_images`
--
ALTER TABLE `category_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_images_categories_fk_idx` (`category_id`);

--
-- Indexes for table `cms_images`
--
ALTER TABLE `cms_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cms_images_fk_idx` (`cms_id`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cms_users_fk_idx` (`user_id`);

--
-- Indexes for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_boys_users_fk_idx` (`user_id`);

--
-- Indexes for table `delivery_boys_documents`
--
ALTER TABLE `delivery_boys_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_delivery_boys_fk_idx` (`delivery_boy_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cms_pages_offers_idx` (`cms_id`),
  ADD KEY `roles_offers_fk_idx` (`role_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_1_idx` (`user_id`),
  ADD KEY `fk_orders_2_idx` (`delivery_boy_id`),
  ADD KEY `fk_orders_3_idx` (`customer_address_id`);

--
-- Indexes for table `order_addresses`
--
ALTER TABLE `order_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_address_1_idx` (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_items_1_idx` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_roles_fk_idx` (`role_id`);

--
-- Indexes for table `pincodes`
--
ALTER TABLE `pincodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pincodes_users_fk_idx` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_users_fk_idx` (`user_id`),
  ADD KEY `products_categories_fk_idx` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_categories_fk0_idx` (`product_id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variant_combinations`
--
ALTER TABLE `product_variant_combinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `combinations_products_idx` (`product_id`),
  ADD KEY `combinations_product_variant_options_idx` (`product_variant_option_id`);

--
-- Indexes for table `product_variant_options`
--
ALTER TABLE `product_variant_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `options_product_variants_idx` (`product_variant_id`);

--
-- Indexes for table `referals`
--
ALTER TABLE `referals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_products`
--
ALTER TABLE `special_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlist_users_fk_idx` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_extras`
--
ALTER TABLE `user_extras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_extras_users_fk` (`user_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlist_users_fk_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category_images`
--
ALTER TABLE `category_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_images`
--
ALTER TABLE `cms_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_boys_documents`
--
ALTER TABLE `delivery_boys_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_addresses`
--
ALTER TABLE `order_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pincodes`
--
ALTER TABLE `pincodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_variant_combinations`
--
ALTER TABLE `product_variant_combinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_variant_options`
--
ALTER TABLE `product_variant_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `referals`
--
ALTER TABLE `referals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `special_products`
--
ALTER TABLE `special_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_extras`
--
ALTER TABLE `user_extras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `address_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `category_images`
--
ALTER TABLE `category_images`
  ADD CONSTRAINT `category_images_categories_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cms_images`
--
ALTER TABLE `cms_images`
  ADD CONSTRAINT `cms_images_fk` FOREIGN KEY (`cms_id`) REFERENCES `cms_pages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD CONSTRAINT `cms_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  ADD CONSTRAINT `delivery_boys_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `delivery_boys_documents`
--
ALTER TABLE `delivery_boys_documents`
  ADD CONSTRAINT `documents_delivery_boys_fk` FOREIGN KEY (`delivery_boy_id`) REFERENCES `delivery_boys` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `cms_pages_offers` FOREIGN KEY (`cms_id`) REFERENCES `cms_pages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `roles_offers_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_2` FOREIGN KEY (`delivery_boy_id`) REFERENCES `delivery_boys` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_3` FOREIGN KEY (`customer_address_id`) REFERENCES `addresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_addresses`
--
ALTER TABLE `order_addresses`
  ADD CONSTRAINT `fk_order_address_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_order_items_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_roles_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `permissions_users_fk` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pincodes`
--
ALTER TABLE `pincodes`
  ADD CONSTRAINT `pincodes_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categories_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `products_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_categories_fk0` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_variant_combinations`
--
ALTER TABLE `product_variant_combinations`
  ADD CONSTRAINT `combinations_product_variant_options` FOREIGN KEY (`product_variant_option_id`) REFERENCES `product_variant_options` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `combinations_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_variant_options`
--
ALTER TABLE `product_variant_options`
  ADD CONSTRAINT `options_product_variants` FOREIGN KEY (`product_variant_id`) REFERENCES `product_variants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `special_products`
--
ALTER TABLE `special_products`
  ADD CONSTRAINT `wishlist_users_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_extras`
--
ALTER TABLE `user_extras`
  ADD CONSTRAINT `user_extras_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlist_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
