-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2020 at 02:30 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fruit_mart`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `product_combo_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(225) DEFAULT NULL,
  `category_image` varchar(225) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Seasonal Fruit & Vegetables', 'c1.jpg', '2020-02-10 16:51:57', '2020-02-12 17:38:22', NULL),
(2, 'Special Combos', 'c2.jpg', '2020-02-10 16:51:57', '2020-02-12 17:38:31', NULL),
(3, 'Fresh Vegetables', 'c1.jpg', '2020-02-10 16:51:57', '2020-02-12 17:38:38', NULL),
(4, 'Fresh Fruits', 'c2.jpg', '2020-02-10 16:51:57', '2020-02-12 17:38:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `commission_id` int(10) UNSIGNED NOT NULL,
  `type` enum('1','2','3','4') NOT NULL DEFAULT '1',
  `price` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commissions`
--

INSERT INTO `commissions` (`commission_id`, `type`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '30.00', '2020-02-12 10:59:53', '2020-02-12 10:59:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `favorites_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `favorite_status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=disfavorite,1=favorite',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(10) UNSIGNED NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `receiver_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `message` varchar(225) DEFAULT NULL,
  `json_data` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(225) DEFAULT NULL,
  `phone_number` varchar(225) DEFAULT NULL,
  `delivery_address` varchar(225) DEFAULT NULL,
  `lat` varchar(225) DEFAULT NULL,
  `lng` varchar(225) DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `product_combo_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `delivery_type` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '1=once,2=daily,3=custom',
  `daily_delivery_stop_status` enum('1','2') NOT NULL DEFAULT '2' COMMENT '1=on,2=off',
  `custom_days` text DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `delivery_time` time DEFAULT NULL,
  `payment_method` enum('1','2','3','4') NOT NULL DEFAULT '1' COMMENT '1=cod,2=card,3=paypal,4=wallet',
  `price` decimal(10,2) NOT NULL,
  `delivery_charge` decimal(10,2) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `order_product_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_combo_id` int(10) UNSIGNED DEFAULT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `payment_id` int(11) UNSIGNED NOT NULL,
  `payment_type` enum('1','2') NOT NULL COMMENT '1=shooing_payment,2=wallet_payment',
  `payment_method` enum('1','2','3','4') NOT NULL COMMENT '1=cod,2=cash,3=paypal,4=wallets',
  `user_id` int(11) UNSIGNED NOT NULL,
  `transaction_id` varchar(225) DEFAULT NULL,
  `transaction_currency` varchar(225) DEFAULT NULL,
  `transaction_amount` decimal(10,2) DEFAULT NULL,
  `paypal_charge` decimal(10,2) DEFAULT NULL,
  `refund_id` varchar(225) DEFAULT NULL,
  `refund_amount` decimal(10,2) DEFAULT NULL,
  `transaction_status` varchar(225) DEFAULT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(225) DEFAULT NULL,
  `product_image` varchar(225) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `discount` int(10) DEFAULT NULL,
  `actual_price` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `description` varchar(225) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `product_name`, `product_image`, `price`, `discount`, `actual_price`, `stock`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Tamato1', 'KFS9jcEvlV_1581585050.jpg', '600.00', 10, '540.00', 100, NULL, '2020-02-11 12:16:14', '2020-02-13 09:10:50', NULL),
(2, 1, 'Mango', 'f2.jpg', '60.00', 10, '54.00', 100, NULL, '2020-02-11 12:16:14', '2020-02-12 17:22:37', NULL),
(3, 1, 'Muter', 'v2.jpg', '60.00', 10, '54.00', 100, NULL, '2020-02-11 12:16:14', '2020-02-12 17:22:49', NULL),
(4, 1, 'Mango', 'v1.jpg', '60.00', 10, '54.00', 100, NULL, '2020-02-11 12:16:14', '2020-02-12 17:23:03', NULL),
(5, 1, 'Tamato', 'f2.jpg', '60.00', 10, '54.00', 100, NULL, '2020-02-11 12:16:14', '2020-02-12 17:23:09', NULL),
(6, 2, 'Fruit Basket', 'co1.jpg', NULL, NULL, NULL, NULL, 'Description is the pattern of narrative development that aims to make vivid a place, object, character, or group. Description is one of four rhetorical modes, along with exposition, argumentation, and narration. In practice i', '2020-02-11 12:16:14', '2020-02-12 17:26:11', NULL),
(7, 2, 'Salad Basket', 'co2.jpg', NULL, NULL, NULL, NULL, 'Description is the pattern of narrative development that aims to make vivid a place, object, character, or group. Description is one of four rhetorical modes, along with exposition, argumentation, and narration. In practice i', '2020-02-11 12:16:14', '2020-02-12 17:26:20', NULL),
(8, 2, 'Fruit Basket', 'co1.jpg', NULL, NULL, NULL, NULL, 'Description is the pattern of narrative development that aims to make vivid a place, object, character, or group. Description is one of four rhetorical modes, along with exposition, argumentation, and narration. In practice i', '2020-02-11 12:16:14', '2020-02-12 17:26:11', NULL),
(9, 2, 'Salad Basket', 'co2.jpg', NULL, NULL, NULL, NULL, 'Description is the pattern of narrative development that aims to make vivid a place, object, character, or group. Description is one of four rhetorical modes, along with exposition, argumentation, and narration. In practice i', '2020-02-11 12:16:14', '2020-02-12 17:26:20', NULL),
(10, 2, 'Fruit Basket', 'co1.jpg', NULL, NULL, NULL, NULL, 'Description is the pattern of narrative development that aims to make vivid a place, object, character, or group. Description is one of four rhetorical modes, along with exposition, argumentation, and narration. In practice i', '2020-02-11 12:16:14', '2020-02-12 17:26:11', NULL),
(11, 3, 'Mutter', 'v2.jpg', '60.00', 10, '54.00', 100, NULL, '2020-02-11 12:16:14', '2020-02-12 17:33:05', NULL),
(12, 3, 'Cabbage', 'v3.jpg', '60.00', 10, '54.00', 100, NULL, '2020-02-11 12:16:14', '2020-02-12 17:33:33', NULL),
(13, 3, 'Tamato', 'v1.jpg', '60.00', 10, '54.00', 100, NULL, '2020-02-11 12:16:14', '2020-02-12 17:33:11', NULL),
(14, 3, 'Mutter', 'v3.jpg', '60.00', 10, '54.00', 100, NULL, '2020-02-11 12:16:14', '2020-02-12 17:33:13', NULL),
(15, 3, 'Cabbage', 'v3.jpg', '60.00', 10, '54.00', 100, NULL, '2020-02-11 12:16:14', '2020-02-12 17:33:16', NULL),
(16, 4, 'Banana', 'f1.jpg', '60.00', 10, '54.00', 100, NULL, '2020-02-11 12:16:14', '2020-02-12 17:33:05', NULL),
(17, 4, 'Mango', 'f2.jpg', '60.00', 10, '54.00', 100, NULL, '2020-02-11 12:16:14', '2020-02-12 17:33:33', NULL),
(18, 4, 'Pomegranate', 'f3.jpg', '60.00', 10, '54.00', 100, NULL, '2020-02-11 12:16:14', '2020-02-12 17:35:51', NULL),
(19, 4, 'Banana', 'f1.jpg', '60.00', 10, '54.00', 100, NULL, '2020-02-11 12:16:14', '2020-02-12 17:33:13', NULL),
(20, 4, 'Mango', 'f2.jpg', '60.00', 10, '54.00', 100, NULL, '2020-02-11 12:16:14', '2020-02-12 17:33:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_combos`
--

CREATE TABLE `product_combos` (
  `product_combo_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `discount` int(10) DEFAULT NULL,
  `actual_price` decimal(10,2) DEFAULT NULL,
  `stock` int(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_combos`
--

INSERT INTO `product_combos` (`product_combo_id`, `product_id`, `quantity`, `price`, `discount`, `actual_price`, `stock`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 6, 10, '200.00', 20, '160.00', 100, '2020-02-11 12:53:07', '2020-02-13 11:47:00', NULL),
(2, 6, 10, '200.00', 10, '180.00', 100, '2020-02-11 12:53:07', '2020-02-12 17:26:59', NULL),
(3, 6, 10, '200.00', 10, '180.00', 100, '2020-02-11 12:53:07', '2020-02-12 17:26:59', NULL),
(4, 7, 10, '200.00', 10, '180.00', 100, '2020-02-11 12:53:07', '2020-02-12 17:26:59', NULL),
(5, 7, 10, '200.00', 10, '180.00', 100, '2020-02-11 12:53:07', '2020-02-12 17:26:59', NULL),
(6, 7, 10, '200.00', 10, '180.00', 100, '2020-02-11 12:53:07', '2020-02-12 17:26:59', NULL),
(7, 8, 10, '200.00', 10, '180.00', 100, '2020-02-11 12:53:07', '2020-02-12 17:26:59', NULL),
(8, 8, 10, '200.00', 10, '180.00', 100, '2020-02-11 12:53:07', '2020-02-12 17:26:59', NULL),
(9, 8, 10, '200.00', 10, '180.00', 100, '2020-02-11 12:53:07', '2020-02-12 17:26:59', NULL),
(10, 9, 10, '200.00', 10, '180.00', 100, '2020-02-11 12:53:07', '2020-02-12 17:26:59', NULL),
(11, 9, 10, '200.00', 10, '180.00', 100, '2020-02-11 12:53:07', '2020-02-12 17:26:59', NULL),
(12, 9, 10, '200.00', 10, '180.00', 100, '2020-02-11 12:53:07', '2020-02-12 17:26:59', NULL),
(13, 10, 10, '200.00', 10, '180.00', 100, '2020-02-11 12:53:07', '2020-02-12 17:26:59', NULL),
(14, 10, 10, '200.00', 10, '180.00', 100, '2020-02-11 12:53:07', '2020-02-12 17:26:59', NULL),
(15, 10, 10, '200.00', 10, '180.00', 100, '2020-02-11 12:53:07', '2020-02-12 17:26:59', NULL),
(16, 6, 10, '1000.00', 10, '900.00', 100, '2020-02-13 11:13:07', '2020-02-13 11:13:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=admin,2=users,3=delivery_boy',
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verify_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_verify_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0=otp_not_verified,1=otp_verified',
  `active_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=deactivate,1 activate',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notification_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0=off,1=on',
  `device_type` enum('android','ios','web','other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_token` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `user_name`, `first_name`, `last_name`, `email`, `email_verify_status`, `phone_number`, `profile_image`, `address`, `lat`, `lng`, `otp`, `otp_verify_status`, `active_status`, `password`, `remember_token`, `notification_status`, `device_type`, `device_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Admin1 Admin1', 'Admin1', 'Admin1', 'admin@mailinator.com', '1', '95751645491', 'Image_1', NULL, NULL, NULL, NULL, '0', '1', '$2y$10$TL6Pl8v2TH2QYW48TYMEquTfAvjqQsGOv4RjXx1fQeNAjSFbbRF66', NULL, '1', 'web', 'mamama', '2020-02-09 18:30:00', '2020-02-11 23:22:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_wallets`
--

CREATE TABLE `user_wallets` (
  `user_wallet_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_wallet_history`
--

CREATE TABLE `user_wallet_history` (
  `user_wallet_history_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `wallet_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` enum('1','2') NOT NULL COMMENT '1=credit,2=debit',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `zone_id` int(10) UNSIGNED NOT NULL,
  `zone_name` varchar(225) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`zone_id`, `zone_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Raj Mohalla', '2020-02-13 12:50:28', '2020-02-13 12:50:28', NULL),
(2, 'Vijay Nager Zone', '2020-02-13 12:50:49', '2020-02-13 12:50:49', NULL),
(3, 'Raj Mohalla', '2020-02-13 12:57:08', '2020-02-13 12:57:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zone_stops`
--

CREATE TABLE `zone_stops` (
  `zone_stop_id` int(10) UNSIGNED NOT NULL,
  `zone_id` int(10) UNSIGNED NOT NULL,
  `address` varchar(225) DEFAULT NULL,
  `lat` varchar(225) DEFAULT NULL,
  `lng` varchar(225) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updatetd_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`commission_id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`favorites_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_combos`
--
ALTER TABLE `product_combos`
  ADD PRIMARY KEY (`product_combo_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_wallets`
--
ALTER TABLE `user_wallets`
  ADD PRIMARY KEY (`user_wallet_id`);

--
-- Indexes for table `user_wallet_history`
--
ALTER TABLE `user_wallet_history`
  ADD PRIMARY KEY (`user_wallet_history_id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`zone_id`);

--
-- Indexes for table `zone_stops`
--
ALTER TABLE `zone_stops`
  ADD PRIMARY KEY (`zone_stop_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `commission_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `favorites_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_combos`
--
ALTER TABLE `product_combos`
  MODIFY `product_combo_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_wallets`
--
ALTER TABLE `user_wallets`
  MODIFY `user_wallet_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_wallet_history`
--
ALTER TABLE `user_wallet_history`
  MODIFY `user_wallet_history_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `zone_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `zone_stops`
--
ALTER TABLE `zone_stops`
  MODIFY `zone_stop_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
