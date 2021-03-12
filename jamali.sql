-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2021 at 02:29 AM
-- Server version: 8.0.23
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jamali`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int UNSIGNED NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `user_id` int UNSIGNED NOT NULL,
  `vendor_id` int UNSIGNED NOT NULL,
  `vendor_service_id` int UNSIGNED NOT NULL,
  `user_name` varchar(225) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `phone_number` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `service_name` varchar(225) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `service_amount` decimal(8,2) NOT NULL,
  `tax_percentage` int DEFAULT NULL,
  `tax_amount` decimal(8,2) NOT NULL,
  `total_service_amount` decimal(8,2) NOT NULL,
  `booking_amount` decimal(8,2) NOT NULL,
  `commission_percentage` int NOT NULL,
  `commission_amount` decimal(8,2) NOT NULL,
  `total_payable_amount` decimal(8,2) NOT NULL,
  `remaining_amount` decimal(8,2) NOT NULL,
  `booking_payment_status` enum('0','1') NOT NULL DEFAULT '0',
  `booking_payment_date` datetime DEFAULT NULL,
  `remaining_payment_status` enum('0','1') DEFAULT '0',
  `remaining_payment_date` datetime DEFAULT NULL,
  `is_rating` enum('0','1') DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `status`, `user_id`, `vendor_id`, `vendor_service_id`, `user_name`, `phone_number`, `email`, `service_name`, `appointment_date`, `appointment_time`, `service_amount`, `tax_percentage`, `tax_amount`, `total_service_amount`, `booking_amount`, `commission_percentage`, `commission_amount`, `total_payable_amount`, `remaining_amount`, `booking_payment_status`, `booking_payment_date`, `remaining_payment_status`, `remaining_payment_date`, `is_rating`, `created_at`, `deleted_at`) VALUES
(57, 3, 28, 20, 36, 'Shivam', '8349877407', 'ramlal@gmail.com', 'Aakash Service', '2020-12-31', '10:15:00', 5000.00, 15, 907.50, 6957.50, 695.75, 10, 695.75, 6957.50, 6261.75, '1', '2020-12-29 09:07:22', '0', NULL, '1', '2020-12-29 09:06:10', NULL),
(58, 0, 28, 20, 32, 'Shivam', '8349877407', 'ramlal@gmail.com', 'Facail plus hair wash', '2021-01-08', '09:45:00', 731.00, 15, 109.59, 840.18, 84.02, 10, 84.02, 840.18, 756.16, '0', '2020-12-29 09:07:54', '0', NULL, '0', '2020-12-29 09:07:54', NULL),
(59, 1, 28, 20, 32, 'Shivam', '8349877407', 'ramlal@gmail.com', 'Facail plus hair wash', '2021-01-08', '09:45:00', 731.00, 15, 109.59, 840.18, 84.02, 10, 84.02, 840.18, 756.16, '1', '2020-12-29 09:09:40', '0', NULL, '0', '2020-12-29 09:08:52', NULL),
(60, 3, 28, 20, 25, 'Shivam', '8349877407', 'ramlal@gmail.com', 'Hair red color', '2020-12-31', '10:45:00', 55.00, 15, 8.25, 63.25, 6.33, 10, 6.33, 63.25, 56.93, '1', '2020-12-29 09:48:50', '0', NULL, '1', '2020-12-29 09:48:00', NULL),
(61, 3, 28, 20, 45, 'Shivam', '8349877407', 'ramlal@gmail.com', 'Chetan test', '2020-12-31', '09:45:00', 300.00, 15, 45.00, 345.00, 34.50, 10, 34.50, 345.00, 310.50, '1', '2020-12-30 03:46:14', '0', NULL, '0', '2020-12-30 03:45:32', NULL),
(62, 0, 28, 20, 48, 'Shivam', '8349877407', 'ramlal@gmail.com', 'DND', '2021-02-04', '10:00:00', 67.00, 15, 10.05, 77.05, 7.71, 10, 7.71, 77.05, 69.35, '0', '2020-12-31 00:44:49', '0', NULL, '0', '2020-12-31 00:44:49', NULL),
(63, 0, 55, 56, 50, 'Asim', '0533755444', '0533755444', 'حواجب', '2020-12-31', '10:30:00', 150.00, 15, 22.50, 172.50, 17.25, 10, 17.25, 172.50, 155.25, '0', '2020-12-31 06:32:02', '0', NULL, '0', '2020-12-31 06:32:02', NULL),
(64, 0, 55, 56, 50, 'Asim', '0533755444', '0533755444', 'حواجب', '2020-12-31', '10:30:00', 150.00, 15, 22.50, 172.50, 17.25, 10, 17.25, 172.50, 155.25, '0', '2020-12-31 06:32:07', '0', NULL, '0', '2020-12-31 06:32:07', NULL),
(65, 0, 55, 56, 50, 'Asim', '0533755444', '0533755444', 'حواجب', '2020-12-31', '10:30:00', 150.00, 15, 22.50, 172.50, 17.25, 10, 17.25, 172.50, 155.25, '0', '2020-12-31 06:32:13', '0', NULL, '0', '2020-12-31 06:32:13', NULL),
(66, 0, 55, 20, 46, 'Asim', '0533755444', '0533755444', 'Hair cut by shivam', '2021-01-02', '09:45:00', 1.00, 15, 0.15, 1.15, 0.12, 10, 0.12, 1.15, 1.03, '0', '2021-01-01 11:37:29', '0', NULL, '0', '2021-01-01 11:37:29', NULL),
(67, 0, 55, 20, 46, 'Asim', '0533755444', '0533755444', 'Hair cut by shivam', '2021-01-02', '09:45:00', 1.00, 15, 0.15, 1.15, 0.12, 10, 0.12, 1.15, 1.03, '0', '2021-01-01 11:37:36', '0', NULL, '0', '2021-01-01 11:37:36', NULL),
(68, 0, 55, 20, 46, 'Asim', '0533755444', '0533755444', 'Hair cut by shivam', '2021-01-03', '02:00:00', 1.00, 15, 0.15, 1.15, 0.12, 10, 0.12, 1.15, 1.03, '0', '2021-01-01 17:23:34', '0', NULL, '0', '2021-01-01 17:23:34', NULL),
(69, 0, 55, 44, 41, 'Asim', '0533755444', '0533755444', 'Gggg', '2021-01-03', '01:30:00', 220.00, 15, 33.00, 253.00, 25.30, 10, 25.30, 253.00, 227.70, '0', '2021-01-01 17:24:53', '0', NULL, '0', '2021-01-01 17:24:53', NULL),
(70, 0, 55, 56, 50, 'Asim', '0533755444', '0533755444', 'حواجب', '2021-01-03', '12:30:00', 150.00, 15, 22.50, 172.50, 17.25, 10, 17.25, 172.50, 155.25, '0', '2021-01-02 12:18:43', '0', NULL, '0', '2021-01-02 12:18:43', NULL),
(71, 0, 55, 56, 50, 'Asim', '0533755444', '0533755444', 'حواجب', '2021-01-03', '12:30:00', 150.00, 15, 22.50, 172.50, 17.25, 10, 17.25, 172.50, 155.25, '0', '2021-01-02 12:18:57', '0', NULL, '0', '2021-01-02 12:18:57', NULL),
(72, 0, 28, 20, 46, 'Shivam', '8349877407', 'ramlal@gmail.com', 'Hair cut by shivam', '2021-01-08', '09:45:00', 1.00, 15, 0.15, 1.15, 0.12, 10, 0.12, 1.15, 1.03, '0', '2021-01-07 01:56:54', '0', NULL, '0', '2021-01-07 01:56:54', NULL),
(73, 0, 28, 20, 46, 'Shivam', '8349877407', 'ramlal@gmail.com', 'Hair cut by shivam', '2021-01-08', '10:00:00', 1.00, 15, 0.15, 1.15, 0.12, 10, 0.12, 1.15, 1.03, '0', '2021-01-07 06:01:15', '0', NULL, '0', '2021-01-07 06:01:15', NULL),
(74, 0, 28, 20, 46, 'Shivam', '8349877407', 'ramlal@gmail.com', 'Hair cut by shivam', '2021-01-08', '10:15:00', 1.00, 15, 0.15, 1.15, 0.12, 10, 0.12, 1.15, 1.03, '0', '2021-01-07 06:11:10', '0', NULL, '0', '2021-01-07 06:11:10', NULL),
(75, 0, 28, 20, 46, 'Shivam', '8349877407', 'ramlal@gmail.com', 'Hair cut by shivam', '2021-01-08', '10:15:00', 1.00, 15, 0.15, 1.15, 0.12, 10, 0.12, 1.15, 1.03, '0', '2021-01-07 06:18:38', '0', NULL, '0', '2021-01-07 06:18:38', NULL),
(76, 0, 28, 20, 46, 'Shivam', '8349877407', 'ramlal@gmail.com', 'Hair cut by shivam', '2021-01-08', '10:15:00', 1.00, 15, 0.15, 1.15, 0.12, 10, 0.12, 1.15, 1.03, '0', '2021-01-07 06:20:36', '0', NULL, '0', '2021-01-07 06:20:36', NULL),
(77, 0, 28, 20, 46, 'Shivam', '8349877407', 'ramlal@gmail.com', 'Hair cut by shivam', '2021-01-08', '10:15:00', 1.00, 15, 0.15, 1.15, 0.12, 10, 0.12, 1.15, 1.03, '0', '2021-01-07 06:22:14', '0', NULL, '0', '2021-01-07 06:22:14', NULL),
(78, 0, 28, 20, 46, 'Shivam', '8349877407', 'ramlal@gmail.com', 'Hair cut by shivam', '2021-01-08', '10:15:00', 1.00, 15, 0.15, 1.15, 0.12, 10, 0.12, 1.15, 1.03, '0', '2021-01-07 06:23:37', '0', NULL, '0', '2021-01-07 06:23:37', NULL),
(79, 0, 28, 20, 46, 'Shivam', '8349877407', 'ramlal@gmail.com', 'Hair cut by shivam', '2021-01-08', '10:15:00', 1.00, 15, 0.15, 1.15, 0.12, 10, 0.12, 1.15, 1.03, '0', '2021-01-07 06:24:14', '0', NULL, '0', '2021-01-07 06:24:14', NULL),
(80, 0, 28, 20, 46, 'Shivam', '8349877407', 'ramlal@gmail.com', 'Hair cut by shivam', '2021-01-08', '10:15:00', 1.00, 15, 0.15, 1.15, 0.12, 10, 0.12, 1.15, 1.03, '0', '2021-01-07 06:24:41', '0', NULL, '0', '2021-01-07 06:24:41', NULL),
(81, 0, 28, 20, 46, 'Shivam', '8349877407', 'ramlal@gmail.com', 'Hair cut by shivam', '2021-01-12', '09:45:00', 1.00, 15, 0.15, 1.15, 0.12, 10, 0.12, 1.15, 1.03, '0', '2021-01-07 06:26:03', '0', NULL, '0', '2021-01-07 06:26:03', NULL),
(82, 0, 28, 44, 41, 'Shivam', '8349877407', 'ramlal@gmail.com', 'Gggg', '2021-01-19', '09:45:00', 220.00, 15, 33.00, 253.00, 25.30, 10, 25.30, 253.00, 227.70, '1', '2021-01-13 07:46:57', '0', NULL, '0', '2021-01-13 07:46:04', NULL),
(83, 0, 28, 57, 54, 'Shivam', '8349877407', 'ramlal@gmail.com', 'توصيلات', '2021-01-14', '10:15:00', 180.00, 15, 27.00, 207.00, 20.70, 10, 20.70, 207.00, 186.30, '0', '2021-01-13 07:49:40', '0', NULL, '0', '2021-01-13 07:49:40', NULL),
(84, 0, 60, 51, 58, 'ايلاف', '05123456789', '05123456789', 'حواجب', '2021-01-23', '12:00:00', 70.00, 15, 10.50, 80.50, 8.05, 10, 8.05, 80.50, 72.45, '0', '2021-01-13 13:27:08', '0', NULL, '0', '2021-01-13 13:27:08', NULL),
(85, 0, 28, 44, 41, 'Shivam', '8349877407', 'ramlal@gmail.com', 'Gggg', '2021-01-17', '09:45:00', 220.00, 15, 33.00, 253.00, 25.30, 10, 25.30, 253.00, 227.70, '0', '2021-01-15 06:09:59', '0', NULL, '0', '2021-01-15 06:09:59', NULL),
(86, 0, 61, 51, 59, 'عاصم', '05533755044', '05533755044', 'ااففغالثثفاتنننت', '2021-01-27', '10:45:00', 45.00, 15, 6.75, 51.75, 5.18, 10, 5.18, 51.75, 46.58, '0', '2021-01-20 13:55:06', '0', NULL, '0', '2021-01-20 13:55:06', NULL),
(87, 0, 61, 51, 59, 'عاصم', '05533755044', '05533755044', 'ااففغالثثفاتنننت', '2021-01-23', '10:00:00', 45.00, 15, 6.75, 51.75, 5.18, 10, 5.18, 51.75, 46.58, '0', '2021-01-21 04:36:47', '0', NULL, '0', '2021-01-21 04:36:47', NULL),
(88, 0, 28, 57, 54, 'Shivam', '8349877407', 'ramlal@gmail.com', 'توصيلات', '2021-01-28', '10:00:00', 180.00, 15, 27.00, 207.00, 20.70, 10, 20.70, 207.00, 186.30, '1', '2021-01-21 08:26:22', '0', NULL, '0', '2021-01-21 08:22:35', NULL),
(89, 0, 48, 49, 43, 'Norah', '0552560282', '0552560282', 'مكياج', '2021-01-24', '10:00:00', 150.00, 15, 22.50, 172.50, 17.25, 10, 17.25, 172.50, 155.25, '0', '2021-01-23 10:20:04', '0', NULL, '0', '2021-01-23 10:20:04', NULL),
(90, 0, 48, 49, 43, 'Norah', '0552560282', '0552560282', 'مكياج', '2021-01-24', '10:00:00', 150.00, 15, 22.50, 172.50, 17.25, 10, 17.25, 172.50, 155.25, '0', '2021-01-23 10:21:24', '0', NULL, '0', '2021-01-23 10:21:24', NULL),
(91, 0, 60, 44, 41, 'ايلاف', '05123456789', '05123456789', 'Gggg', '2021-01-27', '10:00:00', 220.00, 15, 33.00, 253.00, 25.30, 10, 25.30, 253.00, 227.70, '0', '2021-01-23 10:52:59', '0', NULL, '0', '2021-01-23 10:52:59', NULL),
(92, 0, 60, 20, 64, 'ايلاف', '05123456789', '05123456789', 'Body message english', '2021-01-30', '09:45:00', 120.00, 15, 18.00, 138.00, 13.80, 10, 13.80, 138.00, 124.20, '0', '2021-01-23 13:15:16', '0', NULL, '0', '2021-01-23 13:15:16', NULL),
(93, 0, 60, 51, 66, 'مها', '05123456789', 'asimalmotelq@yahoo.com', 'Tattoos', '2021-01-28', '04:00:00', 240.00, 15, 36.00, 276.00, 27.60, 10, 27.60, 276.00, 248.40, '0', '2021-01-27 12:44:03', '0', NULL, '0', '2021-01-27 12:44:03', NULL),
(94, 0, 48, 49, 42, 'Norah', '0552560282', '0552560282', 'null', '2021-01-31', '10:15:00', 200.00, 15, 30.00, 230.00, 23.00, 10, 23.00, 230.00, 207.00, '0', '2021-01-29 18:32:32', '0', NULL, '0', '2021-01-29 18:32:32', NULL),
(95, 0, 48, 49, 42, 'Norah', '0552560282', '0552560282', 'null', '2021-01-31', '09:45:00', 200.00, 15, 30.00, 230.00, 23.00, 10, 23.00, 230.00, 207.00, '0', '2021-01-29 18:33:33', '0', NULL, '0', '2021-01-29 18:33:33', NULL),
(96, 0, 48, 49, 42, 'Norah', '0552560282', '0552560282', 'null', '2021-01-31', '09:45:00', 200.00, 15, 30.00, 230.00, 23.00, 10, 23.00, 230.00, 207.00, '0', '2021-01-29 18:33:36', '0', NULL, '0', '2021-01-29 18:33:36', NULL),
(97, 0, 60, 56, 50, 'مها', '05123456789', 'asimalmotelq@yahoo.com', 'حواجب', '2021-02-01', '03:00:00', 150.00, 15, 22.50, 172.50, 17.25, 10, 17.25, 172.50, 155.25, '0', '2021-01-30 16:57:58', '0', NULL, '0', '2021-01-30 16:57:58', NULL),
(98, 0, 60, 44, 41, 'مها', '05123456789', 'asimalmotelq@yahoo.com', 'Gggg', '2021-02-03', '11:15:00', 220.00, 15, 33.00, 253.00, 25.30, 10, 25.30, 253.00, 227.70, '0', '2021-02-01 10:45:42', '0', NULL, '0', '2021-02-01 10:45:42', NULL),
(99, 0, 60, 57, 51, 'مها', '05123456789', 'asimalmotelq@yahoo.com', 'مكياج', '2021-02-02', '06:00:00', 300.00, 15, 45.00, 345.00, 34.50, 10, 34.50, 345.00, 310.50, '0', '2021-02-01 12:50:50', '0', NULL, '0', '2021-02-01 12:50:50', NULL),
(100, 0, 62, 44, 41, 'johndoe123', '6366356764', '6366356764', 'Gggg', '2021-02-10', '12:45:00', 220.00, 15, 33.00, 253.00, 25.30, 10, 25.30, 253.00, 227.70, '0', '2021-02-09 07:12:18', '0', NULL, '0', '2021-02-09 07:12:18', NULL),
(101, 0, 64, 44, 41, 'Shivam Yadav', '7974682508', '7974682508', 'Gggg', '2021-02-28', '09:45:00', 220.00, 15, 33.00, 253.00, 25.30, 10, 25.30, 253.00, 227.70, '0', '2021-02-19 04:25:22', '0', NULL, '0', '2021-02-19 04:25:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_ratings`
--

CREATE TABLE `app_ratings` (
  `app_rating_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `rating` int UNSIGNED DEFAULT NULL,
  `review` varchar(225) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_ratings`
--

INSERT INTO `app_ratings` (`app_rating_id`, `user_id`, `rating`, `review`, `created_at`, `deleted_at`) VALUES
(1, 7, 1, 'best', '2020-10-09 02:56:50', '2020-10-09 12:26:50');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int UNSIGNED NOT NULL,
  `category_name` varchar(225) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `category_name_ar` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `category_image` varchar(225) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_name_ar`, `category_image`, `created_at`, `deleted_at`) VALUES
(1, 'Eyebrows', 'الحواجب', 'gVFWA4TrhY_1611486432.png', '2020-09-15 11:19:18', NULL),
(2, 'Eyelashes', 'عناية الرموش', 'HwxAg3Sjlm_1611486405.png', '2020-09-15 11:19:18', NULL),
(3, 'Hairstyles', 'تسريحات الشعر', '8YNGLXWv7Y_1611486365.png', '2020-09-15 11:19:18', NULL),
(4, 'Haircut', 'قص الشعر', 'S49CLCWyu8_1611485892.png', '2020-09-15 11:19:18', NULL),
(5, 'Makeup', 'المكياج', 'F9eUs1ikCW_1611485293.png', '2020-09-15 11:19:18', NULL),
(8, 'Spa', 'إسترخاء', 'QR3Bw5ELqK_1611485687.png', '2020-09-20 01:05:02', NULL),
(9, 'Tattoos', 'الأوشام', 'gvyAhmwrSX_1611485656.png', '2020-09-15 11:19:18', NULL),
(10, 'Face Care', 'عناية الوجه', '3dohDFqUrp_1611485516.png', '2020-09-15 11:19:18', NULL),
(11, 'Lips', 'شفاه', 'aQykEjhtHY_1611485472.png', '2020-09-15 11:19:18', NULL),
(12, 'Skin Care', 'العناية بالبشرة', 'FkXYItSyTe_1611485440.png', '2021-01-07 06:55:13', NULL),
(13, 'Body Care', 'العناية بالجسم', 'V3nm0wz41U_1611485400.png', '2021-01-07 06:58:51', NULL),
(14, 'Hair Care', 'العناية بالشعر', 'FIpCPM1irZ_1611485257.png', '2021-01-07 06:59:53', NULL),
(15, 'Painting', 'الصبغات', '9bA0vInwte_1611485218.png', '2021-01-07 07:04:46', NULL),
(16, 'Feet Care', 'عناية القدم', 'P5Bb9OIJn7_1611485159.png', '2021-01-07 07:05:54', NULL),
(17, 'Hand Care', 'عناية اليد', 'Mx8AqNUWUi_1611485105.png', '2021-01-07 07:07:20', NULL),
(18, 'Moroccan Bath', 'حمام مغربي', 'ixqsH4zTeO_1611485006.png', '2021-01-07 07:08:36', NULL),
(19, 'Hair Styling', 'التسريحات', 'xdLpI1iEmC_1611484976.png', '2021-01-07 07:17:13', NULL),
(20, 'Hair braids Services', 'الضفائر', 'vlY0qbgVLc_1611484902.png', '2021-01-07 07:18:27', NULL),
(21, 'Hair Extensions', 'توصيلات الشعر', 'CpTHkvgw6X_1611484869.png', '2021-01-07 07:19:27', NULL),
(22, 'Nails Care', 'الأظافر', 'qq6eU6HjCD_1611484536.png', '2021-01-07 07:20:32', NULL),
(23, 'Massage', 'المساج', 'Vx34fpmbKP_1611484515.png', '2021-01-07 07:21:24', NULL),
(24, 'Protein Nutrition Care', 'البروتين والتغذية', 'SXysdxfE4M_1611484480.png', '2021-01-07 07:22:35', NULL),
(25, 'Other Services', 'خدمات أخرى', '3dVXIkI2Mz_1610966162.ico', '2021-01-07 08:45:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int UNSIGNED NOT NULL,
  `chat_unique_id` varchar(225) NOT NULL,
  `sender_id` int UNSIGNED NOT NULL,
  `receiver_id` int UNSIGNED NOT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `read_status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `chat_unique_id`, `sender_id`, `receiver_id`, `message`, `read_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'chat16021381204054', 6, 7, 'Hi Vendor', '0', '2020-10-07 20:52:00', '2020-10-07 20:52:00', NULL),
(2, 'chat16021381204054', 6, 7, 'Hi Vendor', '0', '2020-10-07 20:52:12', '2020-10-07 20:52:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `commission_id` int UNSIGNED NOT NULL,
  `type` enum('1','2','3','4') NOT NULL DEFAULT '1',
  `price` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `commissions`
--

INSERT INTO `commissions` (`commission_id`, `type`, `price`, `created_at`, `deleted_at`) VALUES
(1, '1', 30.00, '2020-02-12 10:59:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `day_id` int UNSIGNED NOT NULL,
  `day_name` varchar(225) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `day_status` enum('0','1') DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`day_id`, `day_name`, `day_status`, `start_time`, `end_time`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sunday', '0', '09:45:00', '06:45:00', '2020-09-15 12:23:09', '2020-09-15 12:23:09', NULL),
(2, 'Monday', '0', '09:45:00', '06:45:00', '2020-09-15 12:23:09', '2020-09-15 12:23:09', NULL),
(3, 'Tuesday', '0', '09:45:00', '06:45:00', '2020-09-15 12:23:09', '2020-09-15 12:23:09', NULL),
(4, 'Wednesday', '0', '09:45:00', '06:45:00', '2020-09-15 12:23:09', '2020-09-15 12:23:09', NULL),
(5, 'Thursday', '0', '09:45:00', '06:45:00', '2020-09-15 12:23:09', '2020-09-15 12:23:09', NULL),
(6, 'Friday', '0', '09:45:00', '06:45:00', '2020-09-15 12:23:09', '2020-09-15 12:23:09', NULL),
(7, 'Saturday', '0', '09:45:00', '06:45:00', '2020-09-15 12:23:09', '2020-09-15 12:23:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `document_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `type` enum('1','2') NOT NULL COMMENT '1=Driving Licence,2=Driving Insurance',
  `document` varchar(225) DEFAULT NULL,
  `approve_status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0=unapproved,1=approved,2=rejected',
  `rejected_reason` varchar(225) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`document_id`, `user_id`, `type`, `document`, `approve_status`, `rejected_reason`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 7, '1', 'Image1', '0', NULL, NULL, NULL, NULL),
(2, 7, '1', 'Image1', '0', NULL, NULL, NULL, NULL),
(3, 7, '1', 'Image1', '0', NULL, NULL, NULL, NULL),
(4, 7, '1', 'Image1', '0', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `favourite_vendors`
--

CREATE TABLE `favourite_vendors` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `vendor_id` int UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourite_vendors`
--

INSERT INTO `favourite_vendors` (`id`, `user_id`, `vendor_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 28, 44, '2021-01-28 12:18:23', NULL, NULL),
(25, 28, 34, '2021-02-01 06:35:25', NULL, NULL),
(26, 28, 46, '2021-02-01 06:35:34', NULL, NULL),
(27, 60, 49, '2021-02-01 15:46:24', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int UNSIGNED NOT NULL,
  `sender_id` int UNSIGNED NOT NULL,
  `receiver_id` int UNSIGNED NOT NULL,
  `title` varchar(225) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `message` varchar(225) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `json_data` text CHARACTER SET utf8 COLLATE utf8_bin,
  `read_status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `sender_id`, `receiver_id`, `title`, `message`, `json_data`, `read_status`, `created_at`, `deleted_at`) VALUES
(146, 20, 46, 'Booking Rejected', 'Your booking rejected by ambuj tripathi', '{\"key\":\"Order_Rejected\",\"title\":\"Booking Rejected\",\"message\":\"Your booking rejected by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":46,\"id\":\"105\"}', '0', '2020-12-24 08:49:22', NULL),
(147, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"107\"}', '1', '2020-12-24 08:50:39', NULL),
(148, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"108\"}', '1', '2020-12-24 08:54:32', NULL),
(149, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"109\"}', '1', '2020-12-24 08:55:38', NULL),
(150, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"110\"}', '1', '2020-12-24 08:56:09', NULL),
(151, 46, 44, 'New booking', 'You have a new booking by Noraaaaa', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Noraaaaa\",\"sender_id\":46,\"receiver_id\":44,\"id\":112}', '1', '2020-12-24 09:37:59', NULL),
(152, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"116\"}', '1', '2020-12-25 01:23:26', NULL),
(153, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"116\"}', '1', '2020-12-25 01:23:37', NULL),
(154, 20, 28, 'Booking Accepted', 'Your booking accepted by ambuj tripathi', '{\"key\":\"Order_Accepted\",\"title\":\"Booking Accepted\",\"message\":\"Your booking accepted by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"116\"}', '1', '2020-12-25 01:24:55', NULL),
(155, 20, 28, 'Booking Accepted', 'Your booking accepted by ambuj tripathi', '{\"key\":\"Order_Accepted\",\"title\":\"Booking Accepted\",\"message\":\"Your booking accepted by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"110\"}', '1', '2020-12-25 01:25:04', NULL),
(156, 20, 28, 'Booking Accepted', 'Your booking accepted by ambuj tripathi', '{\"key\":\"Order_Accepted\",\"title\":\"Booking Accepted\",\"message\":\"Your booking accepted by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"115\"}', '1', '2020-12-25 01:25:09', NULL),
(157, 20, 28, 'Booking Accepted', 'Your booking accepted by ambuj tripathi', '{\"key\":\"Order_Accepted\",\"title\":\"Booking Accepted\",\"message\":\"Your booking accepted by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"109\"}', '1', '2020-12-25 01:25:15', NULL),
(158, 20, 28, 'Booking Accepted', 'Your booking accepted by ambuj tripathi', '{\"key\":\"Order_Accepted\",\"title\":\"Booking Accepted\",\"message\":\"Your booking accepted by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"108\"}', '1', '2020-12-25 01:25:20', NULL),
(159, 20, 28, 'Booking Accepted', 'Your booking accepted by ambuj tripathi', '{\"key\":\"Order_Accepted\",\"title\":\"Booking Accepted\",\"message\":\"Your booking accepted by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"107\"}', '1', '2020-12-25 01:25:26', NULL),
(160, 20, 28, 'Booking Accepted', 'Your booking accepted by ambuj tripathi', '{\"key\":\"Order_Accepted\",\"title\":\"Booking Accepted\",\"message\":\"Your booking accepted by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"101\"}', '1', '2020-12-25 01:25:40', NULL),
(161, 20, 28, 'Booking Accepted', 'Your booking accepted by ambuj tripathi', '{\"key\":\"Order_Accepted\",\"title\":\"Booking Accepted\",\"message\":\"Your booking accepted by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"100\"}', '1', '2020-12-25 01:25:45', NULL),
(162, 20, 28, 'Booking Completed', 'Your booking completed by ambuj tripathi', '{\"key\":\"Order_Completed\",\"title\":\"Booking Completed\",\"message\":\"Your booking completed by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"116\"}', '1', '2020-12-25 01:25:57', NULL),
(163, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"117\"}', '1', '2020-12-25 03:05:20', NULL),
(164, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"117\"}', '1', '2020-12-25 03:05:50', NULL),
(165, 20, 28, 'Booking Completed', 'Your booking completed by ambuj tripathi', '{\"key\":\"Order_Completed\",\"title\":\"Booking Completed\",\"message\":\"Your booking completed by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"110\"}', '1', '2020-12-25 04:24:09', NULL),
(166, 20, 28, 'Booking Completed', 'Your booking completed by ambuj tripathi', '{\"key\":\"Order_Completed\",\"title\":\"Booking Completed\",\"message\":\"Your booking completed by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"110\"}', '1', '2020-12-25 04:24:10', NULL),
(167, 20, 28, 'Booking Completed', 'Your booking completed by ambuj tripathi', '{\"key\":\"Order_Completed\",\"title\":\"Booking Completed\",\"message\":\"Your booking completed by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"109\"}', '1', '2020-12-25 04:24:24', NULL),
(168, 20, 28, 'Booking Completed', 'Your booking completed by ambuj tripathi', '{\"key\":\"Order_Completed\",\"title\":\"Booking Completed\",\"message\":\"Your booking completed by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"109\"}', '1', '2020-12-25 04:24:24', NULL),
(169, 20, 28, 'Booking Completed', 'Your booking completed by ambuj tripathi', '{\"key\":\"Order_Completed\",\"title\":\"Booking Completed\",\"message\":\"Your booking completed by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"109\"}', '1', '2020-12-25 04:24:25', NULL),
(170, 20, 28, 'Booking Completed', 'Your booking completed by ambuj tripathi', '{\"key\":\"Order_Completed\",\"title\":\"Booking Completed\",\"message\":\"Your booking completed by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"109\"}', '1', '2020-12-25 04:24:26', NULL),
(171, 20, 28, 'Booking Completed', 'Your booking completed by ambuj tripathi', '{\"key\":\"Order_Completed\",\"title\":\"Booking Completed\",\"message\":\"Your booking completed by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"108\"}', '1', '2020-12-25 04:24:37', NULL),
(172, 20, 28, 'Booking Completed', 'Your booking completed by ambuj tripathi', '{\"key\":\"Order_Completed\",\"title\":\"Booking Completed\",\"message\":\"Your booking completed by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"107\"}', '1', '2020-12-25 04:25:09', NULL),
(173, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"118\"}', '1', '2020-12-25 05:30:04', NULL),
(174, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"119\"}', '1', '2020-12-25 05:33:41', NULL),
(175, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"119\"}', '1', '2020-12-25 05:33:54', NULL),
(176, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"120\"}', '1', '2020-12-25 05:39:25', NULL),
(177, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"120\"}', '1', '2020-12-25 05:39:37', NULL),
(178, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"122\"}', '1', '2020-12-25 05:45:23', NULL),
(179, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"122\"}', '1', '2020-12-25 05:45:34', NULL),
(180, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"123\"}', '1', '2020-12-25 06:10:26', NULL),
(181, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"123\"}', '1', '2020-12-25 06:10:35', NULL),
(182, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"1\"}', '1', '2020-12-25 06:15:28', NULL),
(183, 20, 28, 'Booking Accepted', 'Your booking accepted by ambuj tripathi', '{\"key\":\"Order_Accepted\",\"title\":\"Booking Accepted\",\"message\":\"Your booking accepted by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"1\"}', '1', '2020-12-25 06:51:27', NULL),
(184, 20, 28, 'Booking Completed', 'Your booking completed by ambuj tripathi', '{\"key\":\"Order_Completed\",\"title\":\"Booking Completed\",\"message\":\"Your booking completed by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"1\"}', '1', '2020-12-25 06:56:40', NULL),
(185, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"2\"}', '1', '2020-12-25 07:00:29', NULL),
(186, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"4\"}', '1', '2020-12-25 07:02:32', NULL),
(187, 20, 28, 'Booking Accepted', 'Your booking accepted by ambuj tripathi', '{\"key\":\"Order_Accepted\",\"title\":\"Booking Accepted\",\"message\":\"Your booking accepted by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"4\"}', '1', '2020-12-25 07:05:13', NULL),
(188, 20, 28, 'Booking Completed', 'Your booking completed by ambuj tripathi', '{\"key\":\"Order_Completed\",\"title\":\"Booking Completed\",\"message\":\"Your booking completed by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"4\"}', '1', '2020-12-25 07:05:34', NULL),
(189, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"5\"}', '1', '2020-12-25 07:28:16', NULL),
(190, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"6\"}', '1', '2020-12-25 07:28:55', NULL),
(191, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"7\"}', '1', '2020-12-25 08:28:15', NULL),
(192, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"9\"}', '1', '2020-12-25 08:49:31', NULL),
(193, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"11\"}', '1', '2020-12-25 08:53:53', NULL),
(194, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"12\"}', '1', '2020-12-25 08:56:07', NULL),
(195, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"21\"}', '1', '2020-12-25 09:08:50', NULL),
(196, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"22\"}', '1', '2020-12-25 09:09:28', NULL),
(197, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"23\"}', '1', '2020-12-25 09:28:56', NULL),
(198, 20, 28, 'Booking Accepted', 'Your booking accepted by ambuj tripathi', '{\"key\":\"Order_Accepted\",\"title\":\"Booking Accepted\",\"message\":\"Your booking accepted by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"31\"}', '1', '2020-12-28 01:10:25', NULL),
(199, 20, 28, 'Booking Rejected', 'Your booking rejected by ambuj tripathi', '{\"key\":\"Order_Rejected\",\"title\":\"Booking Rejected\",\"message\":\"Your booking rejected by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"20\"}', '1', '2020-12-28 01:11:05', NULL),
(200, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"32\"}', '1', '2020-12-28 03:10:28', NULL),
(201, 20, 28, 'Booking Accepted', 'Your booking accepted by ambuj tripathi', '{\"key\":\"Order_Accepted\",\"title\":\"Booking Accepted\",\"message\":\"Your booking accepted by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"32\"}', '1', '2020-12-28 03:46:52', NULL),
(202, 20, 28, 'Booking Completed', 'Your booking completed by ambuj tripathi', '{\"key\":\"Order_Completed\",\"title\":\"Booking Completed\",\"message\":\"Your booking completed by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"32\"}', '1', '2020-12-29 03:57:12', NULL),
(203, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"42\"}', '1', '2020-12-29 08:02:19', NULL),
(204, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"43\"}', '1', '2020-12-29 08:06:13', NULL),
(205, 20, 28, 'Booking Accepted', 'Your booking accepted by ambuj tripathi', '{\"key\":\"Order_Accepted\",\"title\":\"Booking Accepted\",\"message\":\"Your booking accepted by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"43\"}', '1', '2020-12-29 08:13:42', NULL),
(206, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"44\"}', '1', '2020-12-29 08:16:05', NULL),
(207, 20, 28, 'Booking Accepted', 'Your booking accepted by ambuj tripathi', '{\"key\":\"Order_Accepted\",\"title\":\"Booking Accepted\",\"message\":\"Your booking accepted by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"44\"}', '1', '2020-12-29 08:16:38', NULL),
(208, 20, 28, 'Booking Completed', 'Your booking completed by ambuj tripathi', '{\"key\":\"Order_Completed\",\"title\":\"Booking Completed\",\"message\":\"Your booking completed by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"43\"}', '1', '2020-12-29 08:34:46', NULL),
(209, 20, 28, 'Booking Completed', 'Your booking completed by ambuj tripathi', '{\"key\":\"Order_Completed\",\"title\":\"Booking Completed\",\"message\":\"Your booking completed by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"44\"}', '1', '2020-12-29 08:34:50', NULL),
(210, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"45\"}', '1', '2020-12-29 08:35:55', NULL),
(211, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"47\"}', '1', '2020-12-29 08:39:19', NULL),
(212, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"46\"}', '1', '2020-12-29 08:43:15', NULL),
(213, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"49\"}', '1', '2020-12-29 08:43:36', NULL),
(214, 20, 28, 'Booking Accepted', 'Your booking accepted by ambuj tripathi', '{\"key\":\"Order_Accepted\",\"title\":\"Booking Accepted\",\"message\":\"Your booking accepted by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"45\"}', '1', '2020-12-29 08:46:55', NULL),
(215, 20, 28, 'Booking Accepted', 'Your booking accepted by ambuj tripathi', '{\"key\":\"Order_Accepted\",\"title\":\"Booking Accepted\",\"message\":\"Your booking accepted by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"48\"}', '1', '2020-12-29 08:47:08', NULL),
(216, 20, 28, 'Booking Completed', 'Your booking completed by ambuj tripathi', '{\"key\":\"Order_Completed\",\"title\":\"Booking Completed\",\"message\":\"Your booking completed by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"45\"}', '1', '2020-12-29 08:47:21', NULL),
(217, 20, 28, 'Booking Rejected', 'Your booking rejected by ambuj tripathi', '{\"key\":\"Order_Rejected\",\"title\":\"Booking Rejected\",\"message\":\"Your booking rejected by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"46\"}', '1', '2020-12-29 08:48:33', NULL),
(218, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"50\"}', '1', '2020-12-29 08:50:50', NULL),
(219, 20, 28, 'Booking Rejected', 'Your booking rejected by ambuj tripathi', '{\"key\":\"Order_Rejected\",\"title\":\"Booking Rejected\",\"message\":\"Your booking rejected by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"50\"}', '1', '2020-12-29 08:52:28', NULL),
(220, 28, 20, 'New booking', 'You have a new booking by Shivam', '{\"key\":\"new_order\",\"title\":\"New booking\",\"message\":\"You have a new booking by Shivam\",\"sender_id\":28,\"receiver_id\":20,\"id\":\"54\"}', '1', '2020-12-29 08:57:17', NULL),
(221, 20, 28, 'Booking Accepted', 'Your booking accepted by ambuj tripathi', '{\"key\":\"Order_Accepted\",\"title\":\"Booking Accepted\",\"message\":\"Your booking accepted by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"57\"}', '1', '2020-12-29 09:10:04', NULL),
(222, 20, 28, 'Booking Accepted', 'Your booking accepted by ambuj tripathi', '{\"key\":\"Order_Accepted\",\"title\":\"Booking Accepted\",\"message\":\"Your booking accepted by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"59\"}', '1', '2020-12-29 09:10:14', NULL),
(223, 20, 28, 'Booking Completed', 'Your booking completed by ambuj tripathi', '{\"key\":\"Order_Completed\",\"title\":\"Booking Completed\",\"message\":\"Your booking completed by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"57\"}', '1', '2020-12-29 09:27:18', NULL),
(224, 20, 28, 'Booking Accepted', 'Your booking accepted by ambuj tripathi', '{\"key\":\"Order_Accepted\",\"title\":\"Booking Accepted\",\"message\":\"Your booking accepted by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"61\"}', '1', '2021-01-07 06:28:39', NULL),
(225, 20, 28, 'Booking Completed', 'Your booking completed by ambuj tripathi', '{\"key\":\"Order_Completed\",\"title\":\"Booking Completed\",\"message\":\"Your booking completed by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"61\"}', '1', '2021-01-07 06:28:50', NULL),
(226, 20, 28, 'Booking Accepted', 'Your booking accepted by ambuj tripathi', '{\"key\":\"Order_Accepted\",\"title\":\"Booking Accepted\",\"message\":\"Your booking accepted by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"60\"}', '1', '2021-01-13 08:12:41', NULL),
(227, 20, 28, 'Booking Completed', 'Your booking completed by ambuj tripathi', '{\"key\":\"Order_Completed\",\"title\":\"Booking Completed\",\"message\":\"Your booking completed by ambuj tripathi\",\"sender_id\":20,\"receiver_id\":28,\"id\":\"60\"}', '1', '2021-01-13 08:13:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int NOT NULL,
  `type` enum('1','2') NOT NULL COMMENT '1==about_us,2==terms&conditions',
  `content` longtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `content_es` text CHARACTER SET utf8 COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `type`, `content`, `content_es`) VALUES
(1, '1', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n    <title>Privacy Policy</title>\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\">\r\n    <link href=\"https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;1,400&display=swap\" rel=\"stylesheet\">\r\n</head>\r\n<body style=\"background: #000; margin: 0; font-family: \'Montserrat\', sans-serif;\">\r\n    <div style=\"padding: 15px; background: #000; color: #dadada; font-size: 14px;\">\r\n            \r\n        <h2 style=\"font-size: 18px; color: #fff; margin: 0 0 15px;\">Privacy Policy of Jamali</h2>\r\n        <p>In order to receive information about your Personal Data, the purposes and the parties the Data is shared with, contact the Owner <a style=\"color: #f8c300;\" href=\"mailto:Jamali_support@almotelq.com\">Jamali_support@almotelq.com</a></p>\r\n\r\n        <p>Owner and Data Controller</p>\r\n        <p>Types of Data collected</p>\r\n        <p>The owner does not provide a list of Personal Data types collected.</p>\r\n\r\n        <p>Complete details on each type of Personal Data collected are provided in the dedicated sections of this privacy policy or by specific explanation texts displayed prior to the Data collection.\r\n        Personal Data may be freely provided by the User, or, in case of Usage Data, collected automatically when using this Application.</p>\r\n        <p>Unless specified otherwise, all Data requested by this Application is mandatory and failure to provide this Data may make it impossible for this Application to provide its services. In cases where this Application specifically states that some Data is not mandatory, Users are free not to communicate this Data without consequences to the availability or the functioning of the Service.</p>\r\n        <p>Users who are uncertain about which Personal Data is mandatory are welcome to contact the Owner.</p>\r\n        <p>Any use of Cookies – or of other tracking tools – by this Application or by the owners of third-party services used by this Application serves the purpose of providing the Service required by the User, in addition to any other purposes described in the present document and in the Cookie Policy, if available.</p>\r\n\r\n        <p>Users are responsible for any third-party Personal Data obtained, published or shared through this Application and confirm that they have the third party\'s consent to provide the Data to the Owner.</p>\r\n\r\n        <p>Mode and place of processing the Data\r\n        Methods of processing\r\n        The Owner takes appropriate security measures to prevent unauthorized access, disclosure, modification, or unauthorized destruction of the Data.</p>\r\n        <p>The Data processing is carried out using computers and/or IT enabled tools, following organizational procedures and modes strictly related to the purposes indicated. In addition to the Owner, in some cases, the Data may be accessible to certain types of persons in charge, involved with the operation of this Application (administration, sales, marketing, legal, system administration) or external parties (such as third-party technical service providers, mail carriers, hosting providers, IT companies, communications agencies) appointed, if necessary, as Data Processors by the Owner. The updated list of these parties may be requested from the Owner at any time.</p>\r\n\r\n        <h3 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Legal basis of processing</h3>\r\n        <p>The Owner may process Personal Data relating to Users if one of the following applies:</p>\r\n\r\n        <ul style=\"padding: 0 0 0 20px;\">\r\n            <li style=\"padding: 5px 0;\">Users have given their consent for one or more specific purposes. Note: Under some legislations the Owner may be allowed to process Personal Data until the User objects to such processing (“opt-out”), without having to rely on consent or any other of the following legal bases. This, however, does not apply, whenever the processing of Personal Data is subject to European data protection law;</li>\r\n\r\n            <li style=\"padding: 5px 0;\">provision of Data is necessary for the performance of an agreement with the User and/or for any pre-contractual obligations thereof;</li>\r\n\r\n            <li style=\"padding: 5px 0;\">processing is necessary for compliance with a legal obligation to which the Owner is subject;\r\n                processing is related to a task that is carried out in the public interest or in the exercise of official authority vested in the Owner;</li>\r\n\r\n            <li style=\"padding: 5px 0;\">processing is necessary for the purposes of the legitimate interests pursued by the Owner or by a third party.\r\n                In any case, the Owner will gladly help to clarify the specific legal basis that applies to the processing, and in particular whether the provision of Personal Data is a statutory or contractual requirement, or a requirement necessary to enter into a contract.</li>\r\n        </ul>\r\n\r\n        <h3 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Place</h3>\r\n        <p>The Data is processed at the Owner\'s operating offices and in any other places where the parties involved in the processing are located.</p>\r\n\r\n        <p>Depending on the User\'s location, data transfers may involve transferring the User\'s Data to a country other than their own. To find out more about the place of processing of such transferred Data, Users can check the section containing details about the processing of Personal Data.</p>\r\n\r\n        <p>Users are also entitled to learn about the legal basis of Data transfers to a country outside the European Union or to any international organization governed by public international law or set up by two or more countries, such as the UN, and about the security measures taken by the Owner to safeguard their Data.</p>\r\n\r\n        <p>If any such transfer takes place, Users can find out more by checking the relevant sections of this document or inquire with the Owner using the information provided in the contact section.</p>\r\n\r\n        <h3 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Retention time</h3>\r\n        <p>Personal Data shall be processed and stored for as long as required by the purpose they have been collected for.</p>\r\n\r\n        <p>Therefore:</p>\r\n\r\n        <p>Personal Data collected for purposes related to the performance of a contract between the Owner and the User shall be retained until such contract has been fully performed.</p>\r\n        <p>Personal Data collected for the purposes of the Owner’s legitimate interests shall be retained as long as needed to fulfill such purposes. Users may find specific information regarding the legitimate interests pursued by the Owner within the relevant sections of this document or by contacting the Owner.</p>\r\n        <p>The Owner may be allowed to retain Personal Data for a longer period whenever the User has given consent to such processing, as long as such consent is not withdrawn. Furthermore, the Owner may be obliged to retain Personal Data for a longer period whenever required to do so for the performance of a legal obligation or upon order of an authority.</p>\r\n\r\n        <p>Once the retention period expires, Personal Data shall be deleted. Therefore, the right to access, the right to erasure, the right to rectification and the right to data portability cannot be enforced after expiration of the retention period.</p>\r\n\r\n        <h3 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">The rights of Users</h3>\r\n        <p>Users may exercise certain rights regarding their Data processed by the Owner.</p>\r\n\r\n        <p>In particular, Users have the right to do the following:</p>\r\n\r\n        <p>Withdraw their consent at any time. Users have the right to withdraw consent where they have previously given their consent to the processing of their Personal Data.</p>\r\n        <p>Object to processing of their Data. Users have the right to object to the processing of their Data if the processing is carried out on a legal basis other than consent. Further details are provided in the dedicated section below.</p>\r\n        <p>Access their Data. Users have the right to learn if Data is being processed by the Owner, obtain disclosure regarding certain aspects of the processing and obtain a copy of the Data undergoing processing.\r\n        Verify and seek rectification. Users have the right to verify the accuracy of their Data and ask for it to be updated or corrected.</p>\r\n        <p>Restrict the processing of their Data. Users have the right, under certain circumstances, to restrict the processing of their Data. In this case, the Owner will not process their Data for any purpose other than storing it.</p>\r\n        <p>Have their Personal Data deleted or otherwise removed. Users have the right, under certain circumstances, to obtain the erasure of their Data from the Owner.</p>\r\n        <p>Receive their Data and have it transferred to another controller. Users have the right to receive their Data in a structured, commonly used and machine readable format and, if technically feasible, to have it transmitted to another controller without any hindrance. This provision is applicable provided that the Data is processed by automated means and that the processing is based on the User\'s consent, on a contract which the User is part of or on pre-contractual obligations thereof.</p>\r\n        <p>Lodge a complaint. Users have the right to bring a claim before their competent data protection authority.</p>\r\n        <p>Details about the right to object to processing Where Personal Data is processed for a public interest, in the exercise of an official authority vested in the Owner or for the purposes of the legitimate interests pursued by the Owner, Users may object to such processing by providing a ground related to their particular situation to justify the objection.</p>\r\n\r\n        <p>Users must know that, however, should their Personal Data be processed for direct marketing purposes, they can object to that processing at any time without providing any justification. To learn, whether the Owner is processing Personal Data for direct marketing purposes, Users may refer to the relevant sections of this document.</p>\r\n\r\n        <h3 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">How to exercise these rights</h3>\r\n        <p>Any requests to exercise User rights can be directed to the Owner through the contact details provided in this document. These requests can be exercised free of charge and will be addressed by the Owner as early as possible and always within one month.</p>\r\n\r\n        <h3 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Additional information about Data collection and processing</h3>\r\n        <p>Legal action</p>\r\n        <p>The User\'s Personal Data may be used for legal purposes by the Owner in Court or in the stages leading to possible legal action arising from improper use of this Application or the related Services.\r\n        The User declares to be aware that the Owner may be required to reveal personal data upon request of public authorities.</p>\r\n\r\n        <h3 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Additional information about User\'s Personal Data</h3>\r\n        <p>In addition to the information contained in this privacy policy, this Application may provide the User with additional and contextual information concerning particular Services or the collection and processing of Personal Data upon request.</p>\r\n\r\n        <h3 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">System logs and maintenance</h3>\r\n        <p>For operation and maintenance purposes, this Application and any third-party services may collect files that record interaction with this Application (System logs) use other Personal Data (such as the IP Address) for this purpose.</p>\r\n\r\n        <h3 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Information not contained in this policy</h3>\r\n        <p>More details concerning the collection or processing of Personal Data may be requested from the Owner at any time. Please see the contact information at the beginning of this document.</p>\r\n\r\n        <h3 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">How “Do Not Track” requests are handled</h3>\r\n        <p>This Application does not support “Do Not Track” requests.\r\n        To determine whether any of the third-party services it uses honor the “Do Not Track” requests, please read their privacy policies.</p>\r\n\r\n        <h3 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Changes to this privacy policy</h3>\r\n        <p>The Owner reserves the right to make changes to this privacy policy at any time by notifying its Users on this page and possibly within this Application and/or - as far as technically and legally feasible - sending a notice to Users via any contact information available to the Owner. It is strongly recommended to check this page often, referring to the date of the last modification listed at the bottom.</p>\r\n\r\n        <p>Should the changes affect processing activities performed on the basis of the User’s consent, the Owner shall collect new consent from the User, where required.</p>\r\n\r\n        <p>Definitions and legal references</p>\r\n        <p>Latest update: December 21, 2020</p>\r\n\r\n        <p>iubenda hosts this content and only collects the Personal Data strictly necessary for it to be provided.</p>\r\n	</div>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html dir=\"rtl\">\r\n<head>\r\n    <title>Privacy Policy</title>\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\">\r\n    <link href=\"https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;1,400&display=swap\" rel=\"stylesheet\">\r\n</head>\r\n<body style=\"background: #000; margin: 0; font-family: \'Montserrat\', sans-serif;\">\r\n    <div style=\"padding: 15px; background: #000; color: #dadada; font-size: 14px;\">\r\n        <h2 style=\"font-size: 18px; color: #fff; margin: 0 0 15px;\">سياسة الخصوصية لجمالى</h2>\r\n\r\n        <p>لتلقي معلومات حول بياناتك الشخصية والأغراض والأطراف التي تتم مشاركة البيانات معها ، اتصل بالمالك <a style=\"color: #f8c300;\" href=\"mailto:Jamali_support@almotelq.com\">Jamali_support@almotelq.com</a></p>\r\n\r\n        <p>المالك ومراقب البيانات</p>\r\n        <p>أنواع البيانات المجمعة</p>\r\n        <p>لا يقدم المالك قائمة بأنواع البيانات الشخصية التي تم جمعها.</p>\r\n\r\n        <p>يتم توفير التفاصيل الكاملة عن كل نوع من البيانات الشخصية التي تم جمعها في الأقسام المخصصة لسياسة الخصوصية هذه أو من خلال نصوص شرح محددة معروضة قبل جمع البيانات.</p>\r\n        <p>قد يتم توفير البيانات الشخصية بحرية من قبل المستخدم ، أو ، في حالة بيانات الاستخدام ، يتم جمعها تلقائيًا عند استخدام هذا التطبيق.</p>\r\n        <p>ما لم ينص على خلاف ذلك ، فإن جميع البيانات التي يطلبها هذا التطبيق إلزامية وقد يؤدي عدم تقديم هذه البيانات إلى جعل هذا التطبيق مستحيلًا على تقديم خدماته. في الحالات التي ينص فيها هذا التطبيق على وجه التحديد على أن بعض البيانات ليست إلزامية ، يحق للمستخدمين عدم إرسال هذه البيانات دون عواقب على توفر الخدمة أو عملها.</p>\r\n        <p>نرحب بالمستخدمين الذين لا يعرفون أي بيانات شخصية إلزامية للاتصال بالمالك.</p>\r\n        <p>أي استخدام لملفات تعريف الارتباط - أو أدوات التتبع الأخرى - بواسطة هذا التطبيق أو بواسطة مالكي خدمات الجهات الخارجية التي يستخدمها هذا التطبيق يخدم غرض توفير الخدمة المطلوبة من قبل المستخدم ، بالإضافة إلى أي أغراض أخرى موصوفة في هذا المستند وفي سياسة ملفات تعريف الارتباط ، إن وجدت.</p>\r\n\r\n        <p>يتحمل المستخدمون مسؤولية أي بيانات شخصية لطرف ثالث يتم الحصول عليها أو نشرها أو مشاركتها من خلال هذا التطبيق ويؤكدون أن لديهم موافقة الطرف الثالث على تقديم البيانات إلى المالك.</p>\r\n\r\n        <p>طريقة ومكان معالجة البيانات\r\n        طرق المعالجة\r\n        يتخذ المالك تدابير أمنية مناسبة لمنع الوصول غير المصرح به أو الكشف أو التعديل أو التدمير غير المصرح به للبيانات.\r\n        تتم معالجة البيانات باستخدام أجهزة الكمبيوتر و / أو الأدوات الممكّنة لتكنولوجيا المعلومات ، باتباع الإجراءات التنظيمية والأساليب المرتبطة بشكل صارم بالأغراض المشار إليها. بالإضافة إلى المالك ، في بعض الحالات ، قد تكون البيانات متاحة لأنواع معينة من الأشخاص المسؤولين ، المشاركين في تشغيل هذا التطبيق (الإدارة ، المبيعات ، التسويق ، الشؤون القانونية ، إدارة النظام) أو أطراف خارجية (مثل- مقدمو الخدمات الفنية الطرفية وشركات البريد ومقدمو الاستضافة وشركات تكنولوجيا المعلومات ووكالات الاتصالات) المعينون ، إذا لزم الأمر ، كمعالجين للبيانات من قبل المالك. قد يتم طلب القائمة المحدثة لهذه الأطراف من المالك في أي وقت.</p>\r\n\r\n        <h3 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">الأساس القانوني للمعالجة</h3>\r\n        <p>يجوز للمالك معالجة البيانات الشخصية المتعلقة بالمستخدمين إذا انطبق أحد الإجراءات التالية:</p>\r\n\r\n        <ul style=\"padding: 0 0 0 20px;\">\r\n            <li style=\"padding: 5px 0;\">أعطى المستخدمون موافقتهم لغرض واحد أو أكثر من الأغراض المحددة. ملاحظة: بموجب بعض التشريعات ، قد يُسمح للمالك بمعالجة البيانات الشخصية حتى يعترض المستخدم على هذه المعالجة (\"إلغاء الاشتراك\") ، دون الحاجة إلى الاعتماد على الموافقة أو أي من الأسس القانونية التالية. ومع ذلك ، لا ينطبق هذا ، عندما تخضع معالجة البيانات الشخصية لقانون حماية البيانات الأوروبي ؛\r\n                يعد توفير البيانات ضروريًا لتنفيذ اتفاقية مع المستخدم و / أو لأي التزامات تعاقدية سابقة لها ؛\r\n                المعالجة ضرورية للامتثال للالتزام القانوني الذي يخضع له المالك ؛\r\n                تتعلق المعالجة بمهمة يتم تنفيذها للمصلحة العامة أو في ممارسة السلطة الرسمية المخولة للمالك ؛\r\n                المعالجة ضرورية لأغراض المصالح المشروعة التي يتبعها المالك أو طرف ثالث.\r\n                على أي حال ، سيساعد المالك بكل سرور في توضيح الأساس القانوني المحدد الذي ينطبق على المعالجة ، وعلى وجه الخصوص ما إذا كان توفير البيانات الشخصية شرطًا قانونيًا أو تعاقديًا ، أو شرطًا ضروريًا لإبرام عقد.</li>\r\n\r\n                <li style=\"padding: 5px 0;\">مكان تتم معالجة البيانات في مكاتب تشغيل المالك وفي أي أماكن أخرى حيث توجد الأطراف المشاركة في المعالجة.</li>\r\n\r\n                <li style=\"padding: 5px 0;\">اعتمادًا على موقع المستخدم ، قد تتضمن عمليات نقل البيانات نقل بيانات المستخدم إلى دولة أخرى غير دولتهم. لمعرفة المزيد حول مكان معالجة هذه البيانات المنقولة ، يمكن للمستخدمين التحقق من القسم الذي يحتوي على تفاصيل حول معالجة البيانات الشخصية.</li>\r\n\r\n                <li style=\"padding: 5px 0;\">يحق للمستخدمين أيضًا التعرف على الأساس القانوني لعمليات نقل البيانات إلى بلد خارج المملكة العربية السعودية أو إلى أي منظمة دولية يحكمها القانون الدولي العام أو أنشأتها دولتان أو أكثر ، مثل الأمم المتحدة ، وحول التدابير الأمنية المتخذة من قبل المالك لحماية بياناته.</li>\r\n\r\n                <li style=\"padding: 5px 0;\">في حالة حدوث أي نقل من هذا القبيل ، يمكن للمستخدمين معرفة المزيد عن طريق التحقق من الأقسام ذات الصلة من هذا المستند أو الاستفسار مع المالك باستخدام المعلومات الواردة في قسم الاتصال.</li>\r\n        </ul> \r\n\r\n        <p>وقت الاستبقاء\r\n            يجب معالجة البيانات الشخصية وتخزينها طالما كان ذلك مطلوبًا حسب الغرض الذي تم جمعها من أجله.</p>\r\n\r\n        <h3 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">وبالتالي:</h3>\r\n\r\n        <p>يتم الاحتفاظ بالبيانات الشخصية التي تم جمعها للأغراض المتعلقة بأداء عقد بين المالك والمستخدم حتى يتم تنفيذ هذا العقد بالكامل.\r\n            يجب الاحتفاظ بالبيانات الشخصية التي يتم جمعها لأغراض المصالح المشروعة للمالك طالما كانت هناك حاجة إلى تحقيق هذه الأغراض. قد يجد المستخدمون معلومات محددة تتعلق بالمصالح المشروعة التي يتبعها المالك في الأقسام ذات الصلة من هذا المستند أو عن طريق الاتصال بالمالك.\r\n            قد يُسمح للمالك بالاحتفاظ بالبيانات الشخصية لفترة أطول متى وافق المستخدم على هذه المعالجة ، طالما لم يتم سحب هذه الموافقة. علاوة على ذلك ، قد يكون المالك ملزمًا بالاحتفاظ بالبيانات الشخصية لفترة أطول كلما لزم الأمر للقيام بذلك لأداء التزام قانوني أو بناءً على أمر من سلطة.</p>\r\n\r\n        <p>بمجرد انتهاء فترة الاحتفاظ ، سيتم حذف البيانات الشخصية. لذلك ، لا يمكن إنفاذ الحق في الوصول والحق في المسح والحق في التصحيح والحق في إمكانية نقل البيانات بعد انتهاء فترة الاحتفاظ.</p>\r\n\r\n        <h3 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">حقوق المستخدمين</h3>\r\n        <p>يجوز للمستخدمين ممارسة حقوق معينة فيما يتعلق ببياناتهم التي يعالجها المالك.</p>\r\n\r\n        <h3 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">على وجه الخصوص ، يحق للمستخدمين القيام بما يلي:</h3>\r\n\r\n        <p>سحب موافقتهم في أي وقت. يحق للمستخدمين سحب الموافقة حيث سبق لهم أن وافقوا على معالجة بياناتهم الشخصية.\r\n            الاعتراض على معالجة بياناتهم. يحق للمستخدمين الاعتراض على معالجة بياناتهم إذا تمت المعالجة على أساس قانوني بخلاف الموافقة. يتم توفير مزيد من التفاصيل في القسم المخصص أدناه.</p>\r\n        <p>الوصول إلى بياناتهم. يحق للمستخدمين معرفة ما إذا كان المالك يعالج البيانات أم لا ، والحصول على إفصاح بشأن جوانب معينة من المعالجة والحصول على نسخة من البيانات التي تخضع للمعالجة.</p>\r\n        <p>تحقق واطلب التصحيح. يحق للمستخدمين التحقق من دقة بياناتهم والمطالبة بتحديثها أو تصحيحها.</p>\r\n        <p>تقييد معالجة بياناتهم. يحق للمستخدمين ، في ظل ظروف معينة ، تقييد معالجة بياناتهم. في هذه الحالة ، لن يقوم المالك بمعالجة بياناته لأي غرض بخلاف تخزينها.</p>\r\n        <p>حذف بياناتهم الشخصية أو إزالتها بطريقة أخرى. يحق للمستخدمين ، في ظل ظروف معينة ، الحصول على محو بياناتهم من المالك.</p>\r\n        <p>استلام بياناتهم ونقلها إلى وحدة تحكم أخرى. يحق للمستخدمين تلقي بياناتهم بتنسيق منظم وشائع الاستخدام وقابل للقراءة آليًا ، وإذا كان ذلك ممكنًا من الناحية الفنية ، فيتم نقلها إلى وحدة تحكم أخرى دون أي عائق. يسري هذا الحكم بشرط أن تتم معالجة البيانات بوسائل آلية وأن المعالجة تستند إلى موافقة المستخدم ، على عقد يكون المستخدم جزءًا منه أو على التزاماته التعاقدية المسبقة.</p>\r\n        <p>تقديم شكوى. يحق للمستخدمين رفع دعوى أمام سلطة حماية البيانات المختصة.</p>\r\n        <p>تفاصيل حول حق الاعتراض على المعالجة\r\n            عندما تتم معالجة البيانات الشخصية لمصلحة عامة ، أو في ممارسة سلطة رسمية مخولة للمالك أو لأغراض المصالح المشروعة التي يسعى إليها المالك ، يجوز للمستخدمين الاعتراض على هذه المعالجة من خلال توفير أساس يتعلق بوضعهم الخاص إلى تبرير الاعتراض.</p>\r\n\r\n        <p>يجب أن يعرف المستخدمون أنه في حالة معالجة بياناتهم الشخصية لأغراض التسويق المباشر ، يمكنهم الاعتراض على هذه المعالجة في أي وقت دون تقديم أي مبرر. لمعرفة ما إذا كان المالك يقوم بمعالجة البيانات الشخصية لأغراض التسويق المباشر ، يمكن للمستخدمين الرجوع إلى الأقسام ذات الصلة في هذا المستند.</p>\r\n\r\n        <h3 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">كيف تمارس هذه الحقوق</h3>\r\n        <p>يمكن توجيه أي طلبات لممارسة حقوق المستخدم إلى المالك من خلال تفاصيل الاتصال الواردة في هذا المستند. يمكن ممارسة هذه الطلبات مجانًا وسيتم معالجتها من قبل المالك في أقرب وقت ممكن ودائمًا في غضون شهر واحد.</p>\r\n\r\n        <h3 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">معلومات إضافية حول جمع البيانات ومعالجتها</h3>\r\n        <p>إجراءات قانونية</p>\r\n        <p>قد يتم استخدام البيانات الشخصية للمستخدم لأغراض قانونية من قبل المالك في المحكمة أو في المراحل التي تؤدي إلى اتخاذ إجراء قانوني محتمل ناشئ عن الاستخدام غير السليم لهذا التطبيق أو الخدمات ذات الصلة.</p>\r\n        <p>يصرح المستخدم بأنه على علم بأنه قد يُطلب من المالك الكشف عن البيانات الشخصية بناءً على طلب السلطات العامة.</p>\r\n\r\n        <p>معلومات إضافية حول البيانات الشخصية للمستخدم بالإضافة إلى المعلومات الواردة في سياسة الخصوصية هذه ، قد يوفر هذا التطبيق للمستخدم معلومات إضافية وسياقية تتعلق بخدمات معينة أو جمع ومعالجة البيانات الشخصية عند الطلب.</p>\r\n\r\n        <h3 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">سجلات النظام والصيانة</h3>\r\n        <p>لأغراض التشغيل والصيانة ، يجوز لهذا التطبيق وأي خدمات تابعة لجهات خارجية جمع الملفات التي تسجل التفاعل مع هذا التطبيق (سجلات النظام) تستخدم بيانات شخصية أخرى (مثل عنوان IP) لهذا الغرض.</p>\r\n\r\n        <h3 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">المعلومات غير الواردة في هذه السياسة</h3>\r\n        <p>قد يتم طلب مزيد من التفاصيل المتعلقة بجمع أو معالجة البيانات الشخصية من المالك في أي وقت. يرجى الاطلاع على معلومات الاتصال في بداية هذا المستند.</p>\r\n\r\n        <h3 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">كيف يتم التعامل مع طلبات \"عدم التعقب\"</h3>\r\n        <p>لا يدعم هذا التطبيق طلبات \"عدم التعقب\".\r\n            لتحديد ما إذا كانت أي من خدمات الجهات الخارجية التي تستخدمها تحترم طلبات \"عدم التعقب\" ، يرجى قراءة سياسات الخصوصية الخاصة بها.</p>\r\n\r\n        <h3 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">التغييرات على سياسة الخصوصية هذه</h3>\r\n        <p>يحتفظ المالك بالحق في إجراء تغييرات على سياسة الخصوصية هذه في أي وقت عن طريق إخطار مستخدميه على هذه الصفحة وربما داخل هذا التطبيق و / أو - بقدر الإمكان من الناحية الفنية والقانونية - إرسال إشعار إلى المستخدمين عبر أي معلومات اتصال متاحة لـ المالك. يوصى بشدة بالتحقق من هذه الصفحة كثيرًا ، مع الإشارة إلى تاريخ آخر تعديل مدرج في الأسفل.</p>\r\n\r\n        <p>في حالة تأثير التغييرات على أنشطة المعالجة التي يتم إجراؤها على أساس موافقة المستخدم ، يجب على المالك الحصول على موافقة جديدة من المستخدم ، عند الاقتضاء.</p>\r\n\r\n        <p>التعاريف والمراجع القانونية</p>\r\n        <p>آخر تحديث: 21 ديسمبر 2020</p>\r\n\r\n	</div>\r\n</body>\r\n</html>');
INSERT INTO `pages` (`page_id`, `type`, `content`, `content_es`) VALUES
(2, '2', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n    <title>Terms & Conditions</title>\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\">\r\n    <link href=\"https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;1,400&display=swap\" rel=\"stylesheet\">\r\n</head>\r\n<body style=\"background: #000; margin: 0; font-family: \'Montserrat\', sans-serif;\">\r\n    <div style=\"padding: 15px; background: #000; color: #dadada; font-size: 14px;\">\r\n        <h1 style=\"font-size: 18px; color: #fff; margin: 0 0 15px;\">Terms and conditions</h1>\r\n        <p>These terms and conditions (Agreement) set forth the general terms and conditions of your use of the Jamali mobile application (Mobile Application or Service) and any of its related products and services (collectively, Services). This Agreement is legally binding between you (User, you or your) and ALMOTELQ INC (ALMOTELQ INC, we, us or our). By accessing and using the Mobile Application and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Agreement. If you are entering into this Agreement on behalf of a business or other legal entity, you represent that you have the authority to bind such entity to this Agreement, in which case the terms User, you or your shall refer to such entity. If you do not have such authority, or if you do not agree with the terms of this Agreement, you must not accept this Agreement and may not access and use the Mobile Application and Services. You acknowledge that this Agreement is a contract between you and ALMOTELQ INC, even though it is electronic and is not physically signed by you, and it governs your use of the Mobile Application and Services.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Accounts and membership</h2>\r\n        <p>You must be at least 16 years of age to use the Mobile Application and Services. By using the Mobile Application and Services and by agreeing to this Agreement you warrant and represent that you are at least 16 years of age.</p>\r\n        <p>If you create an account in the Mobile Application, you are responsible for maintaining the security of your account and you are fully responsible for all activities that occur under the account and any other actions taken in connection with it. We may, but have no obligation to, monitor and review new accounts before you may sign in and start using the Services. Providing false contact information of any kind may result in the termination of your account. You must immediately notify us of any unauthorized uses of your account or any other breaches of security. We will not be liable for any acts or omissions by you, including any damages of any kind incurred as a result of such acts or omissions. We may suspend, disable, or delete your account (or any part thereof) if we determine that you have violated any provision of this Agreement or that your conduct or content would tend to damage our reputation and goodwill. If we delete your account for the foregoing reasons, you may not re-register for our Services. We may block your email address and Internet protocol address to prevent further registration.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">User content</h2>\r\n        <p>We do not own any data, information or material (collectively, Content) that you submit in the Mobile Application in the course of using the Service. You shall have sole responsibility for the accuracy, quality, integrity, legality, reliability, appropriateness, and intellectual property ownership or right to use of all submitted Content. We may, but have no obligation to, monitor and review the Content in the Mobile Application submitted or created using our Services by you. You grant us permission to access, copy, distribute, store, transmit, reformat, display and perform the Content of your user account solely as required for the purpose of providing the Services to you. Without limiting any of those representations or warranties, we have the right, though not the obligation, to, in our own sole discretion, refuse or remove any Content that, in our reasonable opinion, violates any of our policies or is in any way harmful or objectionable. You also grant us the license to use, reproduce, adapt, modify, publish or distribute the Content created by you or stored in your user account for commercial, marketing or any similar purpose.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Billing and payments</h2>\r\n        <p>You shall pay all fees or charges to your account in accordance with the fees, charges, and billing terms in effect at the time a fee or charge is due and payable. Sensitive and private data exchange happens over a SSL secured communication channel and is encrypted and protected with digital signatures, and the Mobile Application and Services are also in compliance with PCI vulnerability standards in order to create as secure of an environment as possible for Users. Scans for malware are performed on a regular basis for additional security and protection. If, in our judgment, your purchase constitutes a high-risk transaction, we will require you to provide us with a copy of your valid government-issued photo identification, and possibly a copy of a recent bank statement for the credit or debit card used for the purchase. We reserve the right to change products and product pricing at any time. We also reserve the right to refuse any order you place with us. We may, in our sole discretion, limit or cancel quantities purchased per person, per household or per order. These restrictions may include orders placed by or under the same customer account, the same credit card, and/or orders that use the same billing and/or shipping address. In the event that we make a change to or cancel an order, we may attempt to notify you by contacting the e-mail and/or billing address/phone number provided at the time the order was made.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Accuracy of information</h2>\r\n        <p>Occasionally there may be information in the Mobile Application that contains typographical errors, inaccuracies or omissions that may relate to promotions and offers. We reserve the right to correct any errors, inaccuracies or omissions, and to change or update information or cancel orders if any information in the Mobile Application or Services is inaccurate at any time without prior notice (including after you have submitted your order). We undertake no obligation to update, amend or clarify information in the Mobile Application including, without limitation, pricing information, except as required by law. No specified update or refresh date applied in the Mobile Application should be taken to indicate that all information in the Mobile Application or Services has been modified or updated.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Third party services</h2>\r\n        <p>If you decide to enable, access or use third party services, be advised that your access and use of such other services are governed solely by the terms and conditions of such other services, and we do not endorse, are not responsible or liable for, and make no representations as to any aspect of such other services, including, without limitation, their content or the manner in which they handle data (including your data) or any interaction between you and the provider of such other services. You irrevocably waive any claim against ALMOTELQ INC with respect to such other services. ALMOTELQ INC is not liable for any damage or loss caused or alleged to be caused by or in connection with your enablement, access or use of any such other services, or your reliance on the privacy practices, data security processes or other policies of such other services. You may be required to register for or log into such other services on their respective platforms. By enabling any other services, you are expressly permitting ALMOTELQ INC to disclose your data as necessary to facilitate the use or enablement of such other service.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Uptime guarantee</h2>\r\n        <p>We offer a Service uptime guarantee of 99% of available time per month. If we fail to maintain this service uptime guarantee in a particular month (as solely determined by us), you may contact us and request a credit off your Service fee for that month. The credit may be used only for the purchase of further products and services from us, and is exclusive of any applicable taxes. The service uptime guarantee does not apply to service interruptions caused by: (1) periodic scheduled maintenance or repairs we may undertake from time to time; (2) interruptions caused by you or your activities; (3) outages that do not affect core Service functionality; (4) causes beyond our control or that are not reasonably foreseeable; and (5) outages related to the reliability of certain programming environments.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Backups</h2>\r\n        <p>We perform regular backups of the Content and will do our best to ensure completeness and accuracy of these backups. In the event of the hardware failure or data loss we will restore backups automatically to minimize the impact and downtime.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Advertisements</h2>\r\n        <p>During your use of the Mobile Application and Services, you may enter into correspondence with or participate in promotions of advertisers or sponsors showing their goods or services through the Mobile Application and Services. Any such activity, and any terms, conditions, warranties or representations associated with such activity, is solely between you and the applicable third party. We shall have no liability, obligation or responsibility for any such correspondence, purchase or promotion between you and any such third party.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Links to other resources</h2>\r\n        <p>Although the Mobile Application and Services may link to other resources (such as websites, mobile applications, etc.), we are not, directly or indirectly, implying any approval, association, sponsorship, endorsement, or affiliation with any linked resource, unless specifically stated herein. Some of the links in the Mobile Application may be affiliate links. This means if you click on the link and purchase an item, ALMOTELQ INC will receive an affiliate commission. We are not responsible for examining or evaluating, and we do not warrant the offerings of, any businesses or individuals or the content of their resources. We do not assume any responsibility or liability for the actions, products, services, and content of any other third parties. You should carefully review the legal statements and other conditions of use of any resource which you access through a link in the Mobile Application and Services. Your linking to any other off-site resources is at your own risk.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Prohibited uses</h2>\r\n        <p>In addition to other terms as set forth in the Agreement, you are prohibited from using the Mobile Application and Services or Content: (a) for any unlawful purpose; (b) to solicit others to perform or participate in any unlawful acts; (c) to violate any international, federal, provincial or state regulations, rules, laws, or local ordinances; (d) to infringe upon or violate our intellectual property rights or the intellectual property rights of others; (e) to harass, abuse, insult, harm, defame, slander, disparage, intimidate, or discriminate based on gender, sexual orientation, religion, ethnicity, race, age, national origin, or disability; (f) to submit false or misleading information; (g) to upload or transmit viruses or any other type of malicious code that will or may be used in any way that will affect the functionality or operation of the Mobile Application and Services, third party products and services, or the Internet; (h) to spam, phish, pharm, pretext, spider, crawl, or scrape; (i) for any obscene or immoral purpose; or (j) to interfere with or circumvent the security features of the Mobile Application and Services, third party products and services, or the Internet. We reserve the right to terminate your use of the Mobile Application and Services for violating any of the prohibited uses.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Intellectual property rights</h2>\r\n        <p>Intellectual Property Rights means all present and future rights conferred by statute, common law or equity in or in relation to any copyright and related rights, trademarks, designs, patents, inventions, goodwill and the right to sue for passing off, rights to inventions, rights to use, and all other intellectual property rights, in each case whether registered or unregistered and including all applications and rights to apply for and be granted, rights to claim priority from, such rights and all similar or equivalent rights or forms of protection and any other results of intellectual activity which subsist or will subsist now or in the future in any part of the world. This Agreement does not transfer to you any intellectual property owned by ALMOTELQ INC or third parties, and all rights, titles, and interests in and to such property will remain (as between the parties) solely with ALMOTELQ INC. All trademarks, service marks, graphics and logos used in connection with the Mobile Application and Services, are trademarks or registered trademarks of ALMOTELQ INC or its licensors. Other trademarks, service marks, graphics and logos used in connection with the Mobile Application and Services may be the trademarks of other third parties. Your use of the Mobile Application and Services grants you no right or license to reproduce or otherwise use any of ALMOTELQ INC or third party trademarks.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Disclaimer of warranty</h2>\r\n        <p>You agree that such Service is provided on an as is and as available basis and that your use of the Mobile Application and Services is solely at your own risk. We expressly disclaim all warranties of any kind, whether express or implied, including but not limited to the implied warranties of merchantability, fitness for a particular purpose and non-infringement. We make no warranty that the Services will meet your requirements, or that the Service will be uninterrupted, timely, secure, or error-free; nor do we make any warranty as to the results that may be obtained from the use of the Service or as to the accuracy or reliability of any information obtained through the Service or that defects in the Service will be corrected. You understand and agree that any material and/or data downloaded or otherwise obtained through the use of Service is done at your own discretion and risk and that you will be solely responsible for any damage or loss of data that results from the download of such material and/or data. We make no warranty regarding any goods or services purchased or obtained through the Service or any transactions entered into through the Service unless stated otherwise. No advice or information, whether oral or written, obtained by you from us or through the Service shall create any warranty not expressly made herein.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Limitation of liability</h2>\r\n        <p>To the fullest extent permitted by applicable law, in no event will ALMOTELQ INC, its affiliates, directors, officers, employees, agents, suppliers or licensors be liable to any person for any indirect, incidental, special, punitive, cover or consequential damages (including, without limitation, damages for lost profits, revenue, sales, goodwill, use of content, impact on business, business interruption, loss of anticipated savings, loss of business opportunity) however caused, under any theory of liability, including, without limitation, contract, tort, warranty, breach of statutory duty, negligence or otherwise, even if the liable party has been advised as to the possibility of such damages or could have foreseen such damages. To the maximum extent permitted by applicable law, the aggregate liability of ALMOTELQ INC and its affiliates, officers, employees, agents, suppliers and licensors relating to the services will be limited to an amount greater of one dollar or any amounts actually paid in cash by you to ALMOTELQ INC for the prior one month period prior to the first event or occurrence giving rise to such liability. The limitations and exclusions also apply if this remedy does not fully compensate you for any losses or fails of its essential purpose.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Indemnification</h2>\r\n        <p>You agree to indemnify and hold ALMOTELQ INC and its affiliates, directors, officers, employees, agents, suppliers and licensors harmless from and against any liabilities, losses, damages or costs, including reasonable attorneys\' fees, incurred in connection with or arising from any third party allegations, claims, actions, disputes, or demands asserted against any of them as a result of or relating to your Content, your use of the Mobile Application and Services or any willful misconduct on your part.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Severability</h2>\r\n        <p>All rights and restrictions contained in this Agreement may be exercised and shall be applicable and binding only to the extent that they do not violate any applicable laws and are intended to be limited to the extent necessary so that they will not render this Agreement illegal, invalid or unenforceable. If any provision or portion of any provision of this Agreement shall be held to be illegal, invalid or unenforceable by a court of competent jurisdiction, it is the intention of the parties that the remaining provisions or portions thereof shall constitute their agreement with respect to the subject matter hereof, and all such remaining provisions or portions thereof shall remain in full force and effect.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Dispute resolution</h2>\r\n        <p>The formation, interpretation, and performance of this Agreement and any disputes arising out of it shall be governed by the substantive and procedural laws of Saudi Arabia without regard to its rules on conflicts or choice of law and, to the extent applicable, the laws of Saudi Arabia. The exclusive jurisdiction and venue for actions related to the subject matter hereof shall be the courts located in Saudi Arabia, and you hereby submit to the personal jurisdiction of such courts. You hereby waive any right to a jury trial in any proceeding arising out of or related to this Agreement. The United Nations Convention on Contracts for the International Sale of Goods does not apply to this Agreement.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Assignment</h2>\r\n        <p>You may not assign, resell, sub-license or otherwise transfer or delegate any of your rights or obligations hereunder, in whole or in part, without our prior written consent, which consent shall be at our own sole discretion and without obligation; any such assignment or transfer shall be null and void. We are free to assign any of its rights or obligations hereunder, in whole or in part, to any third party as part of the sale of all or substantially all of its assets or stock or as part of a merger.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Changes and amendments</h2>\r\n        <p>We reserve the right to modify this Agreement or its terms relating to the Mobile Application and Services at any time, effective upon posting of an updated version of this Agreement in the Mobile Application. When we do, we will revise the updated date at the bottom of this page. Continued use of the Mobile Application and Services after any such changes shall constitute your consent to such changes.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Acceptance of these terms</h2>\r\n        <p>You acknowledge that you have read this Agreement and agree to all its terms and conditions. By accessing and using the Mobile Application and Services you agree to be bound by this Agreement. If you do not agree to abide by the terms of this Agreement, you are not authorized to access or use the Mobile Application and Services.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">Contacting us</h2>\r\n        <p>If you would like to contact us to understand more about this Agreement or wish to contact us concerning any matter relating to it, you may do so via the <a target=\"_blank\" rel=\"nofollow\" href=\"https://www.almotelq.com/contact\" style=\"color: #f8c300;\">contact form</a>, send an email to <a href=\"mailto:Jamali_support@almotelq.com\" style=\"color: #f8c300;\">Jamali_support@almotelq.com</a> or write a letter to Saudi Arabia, Aljumooh bin Othman 7529</p>\r\n        <p>This document was last updated on December 21, 2020</p>\r\n	</div>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html dir=\"rtl\">\r\n<head>\r\n    <title>Terms & Conditions</title>\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\">\r\n    <link href=\"https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;1,400&display=swap\" rel=\"stylesheet\">\r\n</head>\r\n<body style=\"background: #000; margin: 0; font-family: \'Montserrat\', sans-serif;\">\r\n    <div style=\"padding: 15px; background: #000; color: #dadada; font-size: 14px;\">\r\n        <h1 style=\"font-size: 18px; color: #fff; margin: 0 0 15px;\">الأحكام والشروط</h1>\r\n        <p>تحدد هذه الشروط والأحكام (\"الاتفاقية\") الشروط والأحكام العامة لاستخدامك لتطبيق الهاتف المحمول \"جمالي\" (\"تطبيق الهاتف المحمول\" أو \"الخدمة\") وأي من المنتجات والخدمات ذات الصلة (يشار إليها مجتمعة باسم \"الخدمات\" ). هذه الاتفاقية ملزمة قانونًا بينك (\"المستخدم\" أو \"أنت\" أو \"الخاص بك\") و ALMOTELQ INC (\"ALMOTELQ INC\" أو \"نحن\" أو \"نحن\" أو \"خاصتنا\"). من خلال الوصول إلى واستخدام تطبيقات وخدمات الهاتف المحمول ، فإنك تقر بأنك قد قرأت وفهمت ووافقت على الالتزام بشروط هذه الاتفاقية. إذا كنت تدخل في هذه الاتفاقية نيابةً عن شركة أو كيان قانوني آخر ، فأنت تقر بأن لديك السلطة لإلزام هذا الكيان بهذه الاتفاقية ، وفي هذه الحالة تشير المصطلحات \"المستخدم\" أو \"أنت\" أو \"الخاص بك\" لمثل هذا الكيان. إذا لم يكن لديك مثل هذه السلطة ، أو إذا كنت لا توافق على شروط هذه الاتفاقية ، فلا يجوز لك قبول هذه الاتفاقية ولا يجوز لك الوصول إلى تطبيقات وخدمات الهاتف المحمول واستخدامها. أنت تقر بأن هذه الاتفاقية هي عقد بينك وبين شركة ALMOTELQ INC ، على الرغم من أنها إلكترونية ولم توقع عليها فعليًا ، وتحكم استخدامك لتطبيق وخدمات الهاتف المحمول.</p>\r\n\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">الحسابات والعضوية</h2>\r\n        <p>يجب أن يكون عمرك 16 عامًا على الأقل لاستخدام تطبيقات وخدمات الهاتف المحمول. باستخدام تطبيقات وخدمات الهاتف المتحرك وبالموافقة على هذه الاتفاقية ، فإنك تضمن وتقر بأن عمرك لا يقل عن 16 عامًا.</p>\r\n        \r\n        <p>إذا قمت بإنشاء حساب في تطبيق الهاتف المحمول ، فأنت مسؤول عن الحفاظ على أمان حسابك وأنت مسؤول مسؤولية كاملة عن جميع الأنشطة التي تحدث تحت الحساب وأي إجراءات أخرى يتم اتخاذها فيما يتعلق به. يجوز لنا ، ولكن ليس لدينا أي التزام ، مراقبة ومراجعة الحسابات الجديدة قبل أن تتمكن من تسجيل الدخول والبدء في استخدام الخدمات. قد يؤدي تقديم معلومات اتصال خاطئة من أي نوع إلى إنهاء حسابك. يجب عليك إخطارنا على الفور بأي استخدامات غير مصرح بها لحسابك أو أي انتهاكات أخرى للأمن. لن نكون مسؤولين عن أي أفعال أو إغفالات من جانبك ، بما في ذلك أي أضرار من أي نوع تحدث نتيجة لهذه الأفعال أو الإغفالات. يجوز لنا تعليق حسابك أو تعطيله أو حذفه (أو أي جزء منه) إذا قررنا أنك انتهكت أي بند من أحكام هذه الاتفاقية أو أن سلوكك أو محتواك من شأنه أن يضر بسمعتنا وحسن نيتنا. إذا قمنا بحذف حسابك للأسباب السابقة ، فلا يجوز لك إعادة التسجيل في خدماتنا. قد نحظر عنوان بريدك الإلكتروني وعنوان بروتوكول الإنترنت لمنع المزيد من التسجيل.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">محتوى المستخدم</h2>\r\n        <p>شاؤه باستخدام خدماتنا بواسطتك. أنت تمنحنا الإذن بالوصول إلى محتوى حساب المستخدم الخاص بك ونسخه وتوزيعه وتخزينه ونقله وإعادة تنسيقه وعرضه وأدائه فقط كما هو مطلوب لغرض توفير الخدمات لك. بدون تقييد أي من هذه الإقرارات أو الضمانات ، يحق لنا ، ولكن ليس الالتزام ، وفقًا لتقديرنا الخاص ، رفض أو إزالة أي محتوى ، في رأينا المعقول ، ينتهك أيًا من سياساتنا أو يكون ضارًا بأي شكل من الأشكال أو مرفوض. أنت تمنحنا أيضًا ترخيصًا لاستخدام أو إعادة إنتاج أو تكييف أو تعديل أو نشر أو توزيع المحتوى الذي أنشأته أو تم تخزينه في حساب المستخدم الخاص بك لأغراض تجارية أو تسويقية أو أي غرض مماثل.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">الفواتير والمدفوعات</h2>\r\n        <p>\r\n            يجب عليك دفع جميع الرسوم أو المصاريف إلى حسابك وفقًا للرسوم والتكاليف وشروط الفوترة السارية في الوقت الذي تكون فيه الرسوم أو الرسوم مستحقة وواجبة السداد. يحدث تبادل البيانات الحساسة والخاصة عبر قناة اتصال مؤمنة SSL ويتم تشفيرها وحمايتها بالتوقيعات الرقمية ، كما أن تطبيقات وخدمات الهاتف المحمول تتوافق أيضًا مع معايير ضعف PCI من أجل إنشاء بيئة آمنة قدر الإمكان للمستخدمين. يتم إجراء عمليات الفحص بحثًا عن البرامج الضارة على أساس منتظم لتوفير مزيد من الأمان والحماية. إذا كانت عملية شرائك ، في رأينا ، تمثل معاملة عالية المخاطر ، فسنطلب منك تزويدنا بنسخة من بطاقة التعريف الحكومية الصالحة التي تحمل صورة ، وربما نسخة من كشف حساب مصرفي حديث لبطاقة الائتمان أو الخصم المستخدمة لشراء. نحتفظ بالحق في تغيير المنتجات وأسعارها في أي وقت. نحتفظ أيضًا بالحق في رفض أي طلب تقدمه معنا. يجوز لنا ، وفقًا لتقديرنا الخاص ، تقييد أو إلغاء الكميات المشتراة لكل شخص أو لكل أسرة أو لكل طلب. قد تشمل هذه القيود الطلبات المقدمة من قبل أو تحته نفس حساب العميل و / أو نفس بطاقة الائتمان و / أو الطلبات التي تستخدم نفس عنوان الفواتير و / أو الشحن. في حالة قيامنا بإجراء تغيير أو إلغاء طلب ، فقد نحاول إخطارك عن طريق الاتصال بالبريد الإلكتروني و / أو عنوان إرسال الفواتير / رقم الهاتف المقدم في وقت تقديم الطلب.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">دقة المعلومات</h2>\r\n        <p>من حين لآخر ، قد تكون هناك معلومات في تطبيق الهاتف المحمول تحتوي على أخطاء مطبعية أو عدم دقة أو سهو قد يتعلق بالعروض الترويجية والعروض. نحتفظ بالحق في تصحيح أي أخطاء أو عدم دقة أو سهو ، وتغيير المعلومات أو تحديثها أو إلغاء الطلبات إذا كانت أي معلومات في تطبيق الهاتف أو الخدمات غير دقيقة في أي وقت دون إشعار مسبق (بما في ذلك بعد تقديمك لطلبك). نحن لا نتعهد بتحديث أو تعديل أو توضيح المعلومات في تطبيق الهاتف المحمول بما في ذلك ، على سبيل المثال لا الحصر ، معلومات التسعير ، باستثناء ما يقتضيه القانون. لا يوجد تحديث محدد أو تاريخ تحديث مطبق في تطبيق الهاتف المحمول يجب أن يؤخذ للإشارة إلى أنه تم تعديل أو تحديث جميع المعلومات في تطبيق الهاتف المحمول أو الخدمات.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">خدمات الطرف الثالث</h2>\r\n        <p>إذا قررت تمكين خدمات الجهات الخارجية أو الوصول إليها أو استخدامها ، فيرجى العلم بأن وصولك إلى هذه الخدمات الأخرى واستخدامها يخضعان فقط لشروط وأحكام هذه الخدمات الأخرى ، ونحن لا نؤيد ، أو لسنا مسؤولين أو مسؤولين عنها ، ولا تقدم أي تعهدات بشأن أي جانب من جوانب هذه الخدمات الأخرى ، بما في ذلك ، على سبيل المثال لا الحصر ، محتواها أو الطريقة التي يتعاملون بها مع البيانات (بما في ذلك بياناتك) أو أي تفاعل بينك وبين مزود هذه الخدمات الأخرى. أنت تتنازل بشكل نهائي عن أي مطالبة ضد ALMOTELQ INC فيما يتعلق بهذه الخدمات الأخرى. شركة ALMOTELQ INC ليست مسؤولة عن أي ضرر أو خسارة ناتجة أو يُزعم أنها ناجمة عن أو فيما يتعلق بتمكينك أو الوصول إلى أو استخدام أي من هذه الخدمات الأخرى ، أو اعتمادك على ممارسات الخصوصية أو عمليات أمان البيانات أو سياسات أخرى من هذا القبيل خدمات. قد يُطلب منك التسجيل أو تسجيل الدخول إلى مثل هذه الخدمات الأخرى على الأنظمة الأساسية الخاصة بها. من خلال تمكين أي خدمات أخرى ، فإنك تسمح صراحة لشركة ALMOTELQ INC بالكشف عن بياناتك حسب الضرورة لتسهيل استخدام أو تمكين هذه الخدمة الأخرى.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">ضمان الجهوزية</h2>\r\n        <p>نقدم ضمان وقت تشغيل الخدمة بنسبة 99٪ من الوقت المتاح شهريًا. إذا فشلنا في الحفاظ على ضمان وقت تشغيل الخدمة هذا في شهر معين (على النحو الذي نحدده وحدنا) ، يمكنك الاتصال بنا وطلب خصم من رسوم الخدمة الخاصة بك عن ذلك الشهر. يمكن استخدام الرصيد فقط لشراء المزيد من المنتجات والخدمات منا ، ولا يشمل أي ضرائب سارية. لا ينطبق ضمان وقت تشغيل الخدمة على انقطاعات الخدمة الناتجة عن: (1) الصيانة الدورية المجدولة أو الإصلاحات التي قد نقوم بها من وقت لآخر ؛ (2) الانقطاعات التي تسببها أنت أو أنشطتك ؛ (3) حالات الانقطاع التي لا تؤثر على وظائف الخدمة الأساسية ؛ (4) أسباب خارجة عن إرادتنا أو غير متوقعة بشكل معقول ؛ و (5) حالات الانقطاع المتعلقة بموثوقية بعض بيئات البرمجة.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">النسخ الاحتياطية</h2>\r\n        <p>نقوم بإجراء نسخ احتياطية منتظمة للمحتوى وسنبذل قصارى جهدنا لضمان اكتمال هذه النسخ الاحتياطية ودقتها. في حالة تعطل الأجهزة أو فقدان البيانات ، سنقوم باستعادة النسخ الاحتياطية تلقائيًا لتقليل التأثير ووقت التعطل</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">الإعلانات</h2>\r\n        <p>أثناء استخدامك لتطبيق وخدمات الهاتف المحمول ، يمكنك الدخول في مراسلات مع أو المشاركة في العروض الترويجية للمعلنين أو الرعاة الذين يعرضون سلعهم أو خدماتهم من خلال تطبيقات وخدمات الهاتف المحمول. أي نشاط من هذا القبيل ، وأي شروط أو شروط أو ضمانات أو إقرارات مرتبطة بهذا النشاط ، هو فقط بينك وبين الطرف الثالث المعني. لن نتحمل أي مسؤولية أو التزام أو مسؤولية عن أي مراسلات أو شراء أو ترويج بينك وبين أي طرف ثالث</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">روابط لمصادر أخرى</h2>\r\n        <p>على الرغم من أن تطبيقات وخدمات الهاتف المحمول قد ترتبط بموارد أخرى (مثل مواقع الويب وتطبيقات الهاتف المحمول وما إلى ذلك) ، فإننا ، بشكل مباشر أو غير مباشر ، لا نعني ضمنيًا أي موافقة أو ارتباط أو رعاية أو تأييد أو انتساب إلى أي مورد مرتبط ، إلا إذا كان ذلك على وجه التحديد المذكورة هنا. قد تكون بعض الروابط في تطبيق الهاتف المحمول \"روابط تابعة\". هذا يعني أنه إذا قمت بالنقر فوق الرابط وشراء عنصر ، فستتلقى ALMOTELQ INC عمولة تابعة. نحن لسنا مسؤولين عن الفحص أو التقييم ، ولا نضمن عروض أي شركات أو أفراد أو محتوى مواردهم. نحن لا نتحمل أي مسؤولية أو مسؤولية عن الإجراءات والمنتجات والخدمات والمحتوى الخاص بأي طرف ثالث. يجب عليك مراجعة البيانات القانونية وشروط الاستخدام الأخرى بعناية لأي مورد تصل إليه من خلال رابط في تطبيقات وخدمات الهاتف المحمول. إن ارتباطك بأي موارد أخرى خارج الموقع يكون على مسؤوليتك الخاصة.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">الاستخدامات المحظورة</h2>\r\n        <p>بالإضافة إلى الشروط الأخرى المنصوص عليها في الاتفاقية ، يُحظر عليك استخدام تطبيق الهاتف المحمول والخدمات أو المحتوى: (أ) لأي غرض غير قانوني ؛ (ب) حث الآخرين على أداء أو المشاركة في أي أعمال غير قانونية ؛ (ج) انتهاك أي لوائح أو قواعد أو قوانين أو مراسيم محلية دولية أو فيدرالية أو إقليمية أو خاصة بالولاية ؛ (د) التعدي على أو انتهاك حقوق الملكية الفكرية الخاصة بنا أو حقوق الملكية الفكرية للآخرين ؛ (هـ) المضايقة أو الإساءة أو الإهانة أو الأذى أو التشهير أو التشهير أو الاستخفاف أو التخويف أو التمييز على أساس الجنس أو التوجه الجنسي أو الدين أو العرق أو العرق أو السن أو الأصل القومي أو الإعاقة ؛ (و) تقديم معلومات خاطئة أو مضللة ؛ (ز) لتحميل أو نقل فيروسات أو أي نوع آخر من الشفرات الخبيثة التي سيتم استخدامها أو يمكن استخدامها بأي طريقة من شأنها التأثير على وظائف أو تشغيل تطبيقات وخدمات الهاتف المحمول أو منتجات وخدمات الطرف الثالث أو الإنترنت ؛ (ح) البريد الإلكتروني العشوائي أو التصيد الاحتيالي أو الصيدلاني أو الذريعة أو العنكبوت أو الزحف أو الكشط ؛ (ط) لأي غرض فاحش أو غير أخلاقي ؛ أو (ي) للتدخل أو التحايل على ميزات الأمان لتطبيقات وخدمات الهاتف المحمول أو منتجات وخدمات الطرف الثالث أو الإنترنت. نحتفظ بالحق في إنهاء استخدامك لتطبيقات وخدمات الهاتف المحمول لانتهاك أي من الاستخدامات المحظورة.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">حقوق الملكية الفكرية</h2>\r\n        <p>\"حقوق الملكية الفكرية\" تعني جميع الحقوق الحالية والمستقبلية الممنوحة بموجب القانون أو القانون العام أو حقوق الملكية في أو فيما يتعلق بأي حقوق طبع ونشر وحقوق ذات صلة ، والعلامات التجارية ، والتصاميم ، وبراءات الاختراع ، والاختراعات ، والسمعة الحسنة ، والحق في رفع دعوى لتمرير ، وحقوق الاختراعات ، وحقوق الاستخدام ، وجميع حقوق الملكية الفكرية الأخرى ، في كل حالة سواء كانت مسجلة أو غير مسجلة ، بما في ذلك جميع التطبيقات والحقوق للتقدم للحصول عليها ومنحها ، وحقوق المطالبة بالأولوية من ، هذه الحقوق وجميع الحقوق المماثلة أو المكافئة أو أشكال الحماية وأية نتائج أخرى للنشاط الفكري الذي يستمر أو سيستمر الآن أو في المستقبل في أي جزء من العالم. لا تنقل لك هذه الاتفاقية أي ملكية فكرية مملوكة لشركة ALMOTELQ INC أو أطراف ثالثة ، وستظل جميع الحقوق والملكية والمصالح في هذه الملكية (بين الطرفين) فقط مع ALMOTELQ INC. جميع العلامات التجارية وعلامات الخدمة و تُعد الرسومات والشعارات المستخدمة فيما يتعلق بتطبيقات وخدمات الهاتف المحمول علامات تجارية أو علامات تجارية مسجلة لشركة ALMOTELQ INC أو المرخصين التابعين لها. قد تكون العلامات التجارية وعلامات الخدمة والرسومات والشعارات الأخرى المستخدمة فيما يتعلق بتطبيقات وخدمات الهاتف المحمول علامات تجارية لأطراف ثالثة. لا يمنحك استخدامك لتطبيقات وخدمات الهاتف المحمول أي حق أو ترخيص لإعادة إنتاج أو استخدام أي من علامات ALMOTELQ INC التجارية أو العلامات التجارية الخاصة بطرف ثالث.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">تنويه من الضمان</h2>\r\n        <p>أنت توافق على تقديم هذه الخدمة على أساس \"كما هي\" و \"حسب توفرها\" وأن استخدامك لتطبيقات وخدمات الهاتف المحمول يكون على مسؤوليتك الخاصة وحدك. نحن نخلي مسؤوليتنا صراحة عن جميع الضمانات من أي نوع ، سواء كانت صريحة أو ضمنية ، بما في ذلك على سبيل المثال لا الحصر الضمانات الضمنية الخاصة بالتسويق والملاءمة لغرض معين وعدم الانتهاك. نحن لا نقدم أي ضمان على أن الخدمات سوف تلبي متطلباتك ، أو أن الخدمة ستكون دون انقطاع أو في الوقت المناسب أو آمنة أو خالية من الأخطاء ؛ ولا نقدم أي ضمان فيما يتعلق بالنتائج التي يمكن الحصول عليها من استخدام الخدمة أو فيما يتعلق بدقة أو موثوقية أي معلومات تم الحصول عليها من خلال الخدمة أو أنه سيتم تصحيح العيوب في الخدمة. أنت تدرك وتوافق على أن أي مواد و / أو بيانات تم تنزيلها أو الحصول عليها بطريقة أخرى من خلال استخدام الخدمة تتم وفقًا لتقديرك الخاص وعلى مسؤوليتك الخاصة وأنك ستكون مسؤولاً وحدك عن أي ضرر أو فقدان للبيانات ينتج عن تنزيل هذه المواد و / أو البيانات. لا نقدم أي ضمانات بخصوص أي سلع أو خدمات تم شراؤها أو الحصول عليها من خلال الخدمة أو أي معاملات يتم الدخول فيها من خلال الخدمة ما لم ينص على خلاف ذلك. لن تنشئ أي نصيحة أو معلومات ، سواء كانت شفهية أو مكتوبة ، تحصل عليها منا أو من خلال الخدمة ، أي ضمان غير منصوص عليه صراحةً في هذه الوثيقة.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">تحديد المسؤولية</h2>\r\n        <p>\r\n            إلى أقصى حد يسمح به القانون المعمول به ، لن تتحمل شركة ALMOTELQ INC بأي حال من الأحوال أو الشركات التابعة لها أو مديروها أو مسؤوليها أو موظفوها أو وكلائها أو مورديها أو المرخصين لها أي مسؤولية تجاه أي شخص عن أي أضرار غير مباشرة أو عرضية أو خاصة أو عقابية أو تغطية أو أضرار تبعية ( بما في ذلك ، على سبيل المثال لا الحصر ، الأضرار الناتجة عن خسارة الأرباح ، والإيرادات ، والمبيعات ، والشهرة ، واستخدام المحتوى ، والتأثير على الأعمال ، وانقطاع الأعمال ، وفقدان المدخرات المتوقعة ، وضياع فرص العمل) ولكن سبب ذلك ، بموجب أي نظرية للمسؤولية ، بما في ذلك ، على سبيل المثال لا الحصر ، أو عقد ، أو ضرر ، أو ضمان ، أو خرق للواجب القانوني ، أو إهمال أو غير ذلك ، حتى إذا تم إخطار الطرف المسؤول بإمكانية حدوث مثل هذه الأضرار أو كان من الممكن توقع مثل هذه الأضرار. إلى أقصى حد يسمح به القانون المعمول به ، ستقتصر المسؤولية الإجمالية لشركة ALMOTELQ INC والشركات التابعة لها والمسؤولين والموظفين والوكلاء والموردين والمرخصين فيما يتعلق بالخدمات على مبلغ أكبر من دولار واحد أو أي مبالغ مدفوعة فعليًا نقدًا بواسطة أنت لشركة ALMOTELQ INC لفترة شهر واحد قبل الحدث أو الحدث الأول الذي أدى إلى نشوء هذه المسؤولية. تنطبق القيود والاستثناءات أيضًا إذا كان هذا العلاج لا يعوضك تمامًا عن أي خسائر أو يفشل في تحقيق غرضه الأساسي.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">التعويض</h2>\r\n        <p>أنت توافق على تعويض شركة ALMOTELQ INC والشركات التابعة لها ومديريها ومسؤوليها وموظفيها ووكلائها ومورديها ومرخصيها وحمايتهم من أي التزامات أو خسائر أو أضرار أو تكاليف ، بما في ذلك أتعاب المحاماة المعقولة ، المتكبدة فيما يتعلق أو الناشئة عن أي ادعاءات أو مطالبات أو إجراءات أو نزاعات أو مطالب من طرف ثالث تم تأكيدها ضد أي منها نتيجة أو تتعلق بالمحتوى الخاص بك أو استخدامك لتطبيقات وخدمات الهاتف المحمول أو أي سوء سلوك متعمد من جانبك.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">الاستقلالية</h2>\r\n        <p>يجوز ممارسة جميع الحقوق والقيود الواردة في هذه الاتفاقية وتكون سارية وملزمة فقط إلى الحد الذي لا تنتهك فيه أي قوانين معمول بها ويقصد منها أن تكون محدودة بالقدر اللازم حتى لا تجعل هذه الاتفاقية غير قانونية وغير صالحة أو غير قابل للتنفيذ. إذا تم اعتبار أي بند أو جزء من أي حكم من أحكام هذه الاتفاقية غير قانوني أو غير صالح أو غير قابل للتنفيذ من قبل محكمة ذات اختصاص قضائي ، فإن نية الأطراف أن تشكل الأحكام أو الأجزاء المتبقية اتفاقهم فيما يتعلق موضوع هذا القانون ، وجميع الأحكام المتبقية أو أجزاء منها تظل سارية المفعول والتأثير الكامل.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">حل النزاع</h2>\r\n        <p>يخضع تشكيل هذه الاتفاقية وتفسيرها وتنفيذها وأي نزاعات تنشأ عنها للقوانين الموضوعية والإجرائية في المملكة العربية السعودية بغض النظر عن قواعدها بشأن النزاعات أو اختيار القانون ، وإلى الحد الذي ينطبق ، المملكة العربية السعودية. يجب أن يكون الاختصاص الحصري ومكان اتخاذ الإجراءات المتعلقة بالموضوع المذكور في المحاكم الموجودة في المملكة العربية السعودية ، وأنت تخضع بموجب هذا للاختصاص القضائي الشخصي لهذه المحاكم. أنت تتنازل بموجب هذا عن أي حق في محاكمة أمام هيئة محلفين في أي إجراء ينشأ عن أو يتعلق بهذه الاتفاقية. لا تنطبق اتفاقية الأمم المتحدة بشأن عقود البيع الدولي للبضائع على هذه الاتفاقية.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">مهمة</h2>\r\n        <p>\r\n            لا يجوز لك التنازل عن أي من حقوقك أو التزاماتك بموجب هذه الاتفاقية أو إعادة بيعها أو ترخيصها من الباطن أو إعادة بيعها أو نقلها أو تفويضها ، كليًا أو جزئيًا ، دون الحصول على موافقة كتابية مسبقة منا ، وتكون الموافقة وفقًا لتقديرنا الخاص وبدون التزام ؛ يعتبر أي تنازل أو نقل باطلاً وباطلاً. نحن أحرار في التنازل عن أي من حقوقه أو التزاماته بموجب هذه الاتفاقية ، كليًا أو جزئيًا ، إلى أي طرف ثالث كجزء من بيع كل أو معظم أصوله أو مخزونه أو كجزء من عملية اندماج.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">التغييرات والتعديلات</h2>\r\n        <p>نحتفظ بالحق في تعديل هذه الاتفاقية أو شروطها المتعلقة بتطبيقات وخدمات الهاتف المحمول في أي وقت ، وتكون سارية عند نشر نسخة محدثة من هذه الاتفاقية في تطبيق الهاتف المحمول. عندما نفعل ذلك ، سنقوم بمراجعة التاريخ المحدث في أسفل هذه الصفحة. استمرار استخدام تطبيقات وخدمات الهاتف المحمول بعد أي تغييرات من هذا القبيل يشكل موافقتك على هذه التغييرات</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">قبول هذه الشروط</h2>\r\n        <p>تقر بأنك قد قرأت هذه الاتفاقية وتوافق على جميع البنود والشروط الخاصة بها. من خلال الوصول إلى واستخدام تطبيقات وخدمات الهاتف المحمول ، فإنك توافق على الالتزام بهذه الاتفاقية. إذا كنت لا توافق على الالتزام بشروط هذه الاتفاقية ، فأنت غير مصرح لك بالوصول إلى تطبيقات وخدمات الهاتف المحمول أو استخدامها.</p>\r\n        <h2 style=\"font-size: 16px; color: #fff; margin: 0 0 10px;\">الاتصال بنا</h2>\r\n        <p>إذا كنت ترغب في الاتصال بنا لفهم المزيد حول هذه الاتفاقية أو ترغب في الاتصال بنا فيما يتعلق بأي مسألة تتعلق بها ، يمكنك القيام بذلك عبر نموذج الاتصال ، أو إرسال بريد إلكتروني إلى <a href=\"mailto:Jamali_support@almotelq.com\" style=\"color: #f8c300;\">Jamali_support@almotelq.com</a> أو إرسال خطاب إلى المملكة العربية السعودية الجموح بن عثمان 7529  </p>\r\n        <p>تم آخر تحديث لهذه الوثيقة في 21 ديسمبر 2020</p>\r\n	</div>\r\n</body>\r\n</html>');

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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `product_name_ar` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `offer` varchar(255) DEFAULT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_name_ar`, `product_image`, `price`, `offer`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Adf', '', '1GvucnwbR2_1604661397.jpg', 0.00, '134', 20, '2020-11-06 06:16:37', '2020-11-06 06:16:37', NULL),
(2, 'Product 1', '', 'xpM1sHSddT_1604737881.jpg', 123.00, '345', 20, '2020-11-07 03:31:21', '2020-11-07 03:31:21', NULL),
(3, 'Product 34', '', '99Zt0TmXOa_1605866548.jpg', 123.00, '110', 20, '2020-11-20 05:02:28', '2020-11-20 05:02:28', NULL),
(4, 'SEPHORA COLLECTION Into the Stars Palette - A 130-piece palette', '', '6CB8r5IooL_1606171293.jpg', 550.00, '450', 31, '2020-11-23 17:41:33', '2020-11-23 17:41:33', NULL),
(5, 'Abcde', '', '8POrsCpU1p_1606305696.jpg', 500.00, 'Free', 20, '2020-11-25 07:01:36', '2020-11-25 07:01:36', NULL),
(6, 'Gzjanana', '', 'Moo8NsXL7h_1606309644.jpg', 0.00, 'Gahaba', 20, '2020-11-25 08:07:24', '2020-11-25 08:07:24', NULL),
(7, 'Cutting trail', '', 'zxjqqVroe3_1606393881.jpg', 200.00, 'Free trail', 34, '2020-11-26 07:31:21', '2020-11-26 07:31:21', NULL),
(8, 'Hair color', '', 'Jp6hvJbbZe_1606394836.jpg', 550.00, '10% discount', 34, '2020-11-26 07:47:16', '2020-11-26 07:47:16', NULL),
(9, 'Makeup', '', 'h4klieisp5_1608044717.jpg', 120.00, '90', 41, '2020-12-15 10:05:17', '2020-12-15 10:05:17', NULL),
(10, 'Makeup', '', 'h9PhTxoVu6_1608044748.jpg', 77.00, '50', 41, '2020-12-15 10:05:48', '2020-12-15 10:05:48', NULL),
(11, '?????', '', 'FIfPx9bphN_1609166284.jpg', 80.00, '50', 49, '2020-12-28 09:38:04', '2020-12-28 09:38:04', NULL),
(12, 'سيفورا', '', 'MPM9ehjxqZ_1609410316.jpg', 400.00, '350', 56, '2020-12-31 05:25:16', '2020-12-31 05:25:16', NULL),
(13, 'اااللفلبلتنمىواللل', '', 'zi54XZtXDX_1609930586.jpg', 2800.00, '1540', 57, '2021-01-06 05:56:26', '2021-01-08 02:04:47', NULL),
(14, 'بروتغقيصبارال', '', 'PWoTDBVlXG_1609930631.jpg', 150.00, '140', 57, '2021-01-06 05:57:11', '2021-01-06 05:57:11', NULL),
(15, 'New service', '', 'nMFI7Qkm4o_1610015704.jpg', 100.00, 'No offee', 20, '2021-01-07 05:35:04', '2021-01-07 05:35:04', NULL),
(16, 'اللنك', '', '6B3cHGVdJw_1610036627.jpg', 0.00, '???', 57, '2021-01-07 11:23:47', '2021-01-07 11:23:47', NULL),
(17, 'Prodyct', '', 'PusAUidxKO_1610084050.jpg', 100.00, '100', 20, '2021-01-08 00:34:10', '2021-01-08 00:34:10', NULL),
(18, 'اااغغعابث', '', '0jYtKcsyMi_1610556916.jpg', 344123.00, '345522', 51, '2021-01-13 11:55:16', '2021-01-13 11:55:16', NULL),
(19, 'سقلزلثق', '', 'MBE040FCYx_1610556954.jpg', 23456.00, '123', 51, '2021-01-13 11:55:54', '2021-01-13 11:55:54', NULL),
(20, 'كريك للشعر من كيو', '', 'NU1OcvjEhA_1611164126.jpg', 110.00, '95', 51, '2021-01-20 12:35:26', '2021-01-20 12:35:26', NULL),
(21, 'Hair oil', 'Hair oil arabic', '9upkJKIDC6_1611230453.jpg', 120.00, '20', 20, '2021-01-21 07:00:53', '2021-01-21 07:00:53', NULL),
(22, 'Product name english', 'Prodect name arabic', 'QADmzslGsO_1611309502.jpg', 120.00, '100', 20, '2021-01-22 04:58:22', '2021-01-22 04:58:22', NULL),
(23, 'Nhhgyyy', 'بااتاغففااال', 'ftaSBCuRvI_1611412909.jpg', 180.00, '140', 51, '2021-01-23 09:41:49', '2021-01-23 09:41:49', NULL),
(24, 'Gujarati by tygg', 'لاععرففغغ', 'g5LJ29rr60_1611757617.jpg', 4466.00, '334', 51, '2021-01-27 09:26:57', '2021-01-27 09:26:57', NULL),
(25, 'Gujarati by tygg', 'لاععرففغغ', 'N1Mn0iGI5L_1611757628.jpg', 4466.00, '334', 51, '2021-01-27 09:27:08', '2021-01-27 09:27:08', NULL),
(26, 'تاتو اسباني', 'مك اب ناعم', 'VlWMMtvGJw_1611958418.jpg', 0.00, '???', 49, '2021-01-29 17:13:38', '2021-01-29 17:13:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supports`
--

CREATE TABLE `supports` (
  `support_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `support_type` enum('1','2') NOT NULL,
  `user_name` varchar(225) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `phone_number` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_bin,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supports`
--

INSERT INTO `supports` (`support_id`, `user_id`, `support_type`, `user_name`, `phone_number`, `email`, `message`, `created_at`, `deleted_at`) VALUES
(1, 7, '2', 'Ganesh Vendor', '1234567890', 'ganesh_vendor@mailinator.com', 'This', '2020-10-09 03:33:32', NULL),
(2, 7, '1', 'Ganesh Vendor', '1234567890', 'ganesh_vendor@mailinator.com', 'This', '2020-10-09 03:33:53', NULL),
(3, 32, '2', 'ajay', '9630156770', 'ajay2@gmail.com', 'zxcsdwrewrwe', '2020-11-21 04:52:38', NULL),
(4, 28, '2', 'Shivam', '8349877407', 'ramlal@gmail.com', 'ytutyuty', '2021-01-27 02:14:47', NULL),
(5, 51, '2', 'نورة وبس', '05566778899', NULL, 'Vhhhgfft لتونتعالببيقفاررااتووردد فغالبا ٤٦٨٩٩٥؛&؟تنوررللار', '2021-01-27 11:54:13', NULL),
(6, 60, '', 'مها', '05123456789', 'asimalmotelq@yahoo.com', 'Ffgyggvvffyyhhbb gyygbbbhgfff. Gyyhbbgggf اتاتررنعغغلااتوراغازرر اغتتنتافبلممتلبد قفتنزللز', '2021-01-27 12:32:41', NULL),
(7, 49, '1', 'تاتو', '0552560282', NULL, 'المنتج كويس وجوده عاليه', '2021-01-29 18:14:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `transaction_history_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `appointment_id` int DEFAULT NULL,
  `transaction_id` varchar(225) DEFAULT NULL,
  `currency` varchar(20) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `transaction_status` enum('1','2') DEFAULT NULL COMMENT '1=success,2=failed',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`transaction_history_id`, `user_id`, `appointment_id`, `transaction_id`, `currency`, `amount`, `transaction_status`, `created_at`, `deleted_at`) VALUES
(1, 28, 1, 'f9d76791-8491-4e60-9a3a-4cd130086994', 'SAR', 500.00, '1', '2020-12-25 11:15:39', NULL),
(2, 28, 1, 'be489da7-40bd-4c3b-9cf8-f1065a9702c9', 'SAR', 5825.00, '1', '2020-12-25 11:54:53', NULL),
(3, 28, 1, '3b73aacf-1c56-4f68-a132-f5d2973ea690', 'SAR', 5825.00, '1', '2020-12-25 11:56:21', NULL),
(4, 28, 2, '3d7e1066-d399-4865-9ef2-280ae5784f84', 'SAR', 500.00, '1', '2020-12-25 12:00:39', NULL),
(5, 28, 4, '766b2a0f-ee99-48b7-aaf9-3a79a48aa6a3', 'SAR', 1200.00, '1', '2020-12-25 12:02:44', NULL),
(6, 28, 5, '7b5c1737-01ae-4d5c-932b-2f29ae40e6d0', 'SAR', 500.00, '1', '2020-12-25 12:28:34', NULL),
(7, 28, 6, '75e785d3-2ff3-409e-a152-cb5896ff4088', 'SAR', 500.00, '1', '2020-12-25 12:29:05', NULL),
(8, 28, 1, '6aa50d50-014f-4e5c-8ecb-4ba3f9718ad7', 'SAR', 5825.00, '1', '2020-12-25 12:56:05', NULL),
(9, 28, 6, '42c2a705-363c-4d9a-9fc8-511c15c283c3', 'SAR', 5825.00, '1', '2020-12-25 12:56:07', NULL),
(10, 28, 7, 'dc5c9b67-dfd3-4c57-9ee8-08b7b4495ffa', 'SAR', 500.00, '1', '2020-12-25 13:28:24', NULL),
(11, 28, 1, 'ad3ef359-8d47-4e3b-ab79-6ee5bbc8ca7f', 'SAR', 5825.00, '1', '2020-12-25 13:36:37', NULL),
(12, 28, 9, '07ab360b-408e-4f75-9888-1f325f467e56', 'SAR', 550.00, '1', '2020-12-25 13:49:36', NULL),
(13, 28, 9, '84d6d273-b0ca-46e3-a30a-3e3b52094a1c', 'SAR', 434400.00, '1', '2020-12-25 13:50:26', NULL),
(14, 28, 11, '07f52816-1ac4-4969-9bc6-979ce9656230', 'SAR', 633.00, '1', '2020-12-25 13:54:02', NULL),
(15, 28, 12, 'b863ad70-5d69-4857-9e97-afb31df9eeb1', 'SAR', 57500.00, '1', '2020-12-25 13:56:51', NULL),
(16, 28, 21, '11350c37-e7d5-4862-93f2-bdae53b16a0c', 'SAR', 57500.00, '', '2020-12-25 14:08:58', NULL),
(17, 28, 22, '3339ed37-ab1c-4e96-b84c-706b5ea2a2d7', 'SAR', 57500.00, '1', '2020-12-25 14:09:37', NULL),
(18, 28, 23, 'dfd95bb8-9266-4b12-a025-5a12dc0a007c', 'SAR', 633.00, '1', '2020-12-25 14:29:04', NULL),
(19, 28, 32, '7e4932ac-4611-49e8-b270-93912b9b404b', 'SAR', 2300.00, '1', '2020-12-28 08:10:46', NULL),
(20, 28, 42, 'e7333a15-b4e0-43f6-a618-247a4afe4d8f', 'SAR', 626175.00, '', '2020-12-29 13:02:30', NULL),
(21, 28, 43, 'eb728ae9-fbdc-4e8a-ad0a-91fd945a569a', 'SAR', 69575.00, '', '2020-12-29 13:06:24', NULL),
(22, 28, 43, 'eb728ae9-fbdc-4e8a-ad0a-91fd945a569a', 'SAR', 69575.00, '', '2020-12-29 13:06:42', NULL),
(23, 28, 43, 'eb728ae9-fbdc-4e8a-ad0a-91fd945a569a', 'SAR', 69575.00, '', '2020-12-29 13:06:43', NULL),
(24, 28, 43, 'ac714d04-d189-403a-a601-f66431e0f9f0', 'SAR', 626175.00, '1', '2020-12-29 13:07:03', NULL),
(25, 28, 44, '8e6484b1-9515-468c-a920-db25cfc9f3ca', 'SAR', 2404.00, '1', '2020-12-29 13:16:15', NULL),
(26, 28, 45, 'bf2fce8d-b571-4c3f-8e24-acfa07e618ea', 'SAR', 22656.00, '1', '2020-12-29 13:36:04', NULL),
(27, 28, 47, '31b7e300-6db8-4543-883c-43d3440e4cfe', 'SAR', 6376.00, '1', '2020-12-29 13:39:30', NULL),
(28, 28, 46, '8f340f27-4f9d-41d1-965b-3c98f6262caf', 'SAR', 69575.00, '1', '2020-12-29 13:43:24', NULL),
(29, 28, 49, '507fe2b8-c33c-4e72-8107-5b7fdf057514', 'SAR', 626175.00, '1', '2020-12-29 13:43:44', NULL),
(30, 28, 50, '031f67c2-9155-4173-856f-06cc2ed0bdd8', 'SAR', 69575.00, '', '2020-12-29 13:51:59', NULL),
(31, 28, 54, 'fecb8ef7-649f-41fa-8df4-326cee3ffb1e', 'SAR', 69575.00, '', '2020-12-29 13:57:33', NULL),
(32, 28, 55, 'e8470b1a-f7be-4d18-8e50-e8fdb614ac25', 'SAR', 69575.00, '', '2020-12-29 14:02:21', NULL),
(33, 28, 57, '404c878c-1f38-4745-ac79-e511b52e50fe', 'SAR', 69575.00, '1', '2020-12-29 14:07:22', NULL),
(34, 28, 58, 'baea7a2b-eaaf-41f4-87ef-626dee3bc758', 'SAR', 8402.00, '', '2020-12-29 14:08:35', NULL),
(35, 28, 59, '82e672f6-ed0e-4e52-9e45-008ba9e893aa', 'SAR', 8402.00, '1', '2020-12-29 14:09:40', NULL),
(36, 28, 60, '3aeff6ce-b8c5-4263-9733-36e9777e756d', 'SAR', 633.00, '1', '2020-12-29 14:48:50', NULL),
(37, 28, 61, 'd950c3c8-6c5f-454c-a473-8285e1bcb60f', 'SAR', 3450.00, '1', '2020-12-30 08:46:14', NULL),
(38, 28, 82, '7f05782c-3195-429e-84d4-7d8caf3f658a', 'SAR', 2530.00, '1', '2021-01-13 12:46:57', NULL),
(39, 28, 88, '37b55bfd-7fac-401b-ae09-4e885ff640bf', 'SAR', 2070.00, '1', '2021-01-21 13:26:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role` enum('1','2','3') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=admin,2=users,3=vendor',
  `vendor_type` enum('1','2','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1=artist,2=Salon Owner',
  `specialist` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_type` enum('1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_id` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `first_name` varchar(225) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(225) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verify_status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `phone_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1=male,2=female',
  `profile_image` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_verify_status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0=otp_not_verified,1=otp_verified',
  `active_status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=deactivate,1 activate',
  `approve_status` enum('0','1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0=pending,1=approved,2=rejected',
  `api_status` enum('0','1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=step_1,1=step_2,2=step_3',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notification_status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=off,1=on',
  `device_type` enum('android','ios','web','other') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_token` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` enum('en','es') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `description` text CHARACTER SET utf8 COLLATE utf8_bin,
  `description_ar` text CHARACTER SET utf8 COLLATE utf8_bin,
  `registration_card` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_1` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_2` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_3` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `availability_status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `service_status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `vendor_type`, `specialist`, `social_type`, `social_id`, `user_name`, `first_name`, `last_name`, `email`, `email_verify_status`, `phone_number`, `gender`, `profile_image`, `address`, `lat`, `lng`, `otp`, `otp_verify_status`, `active_status`, `approve_status`, `api_status`, `password`, `remember_token`, `notification_status`, `device_type`, `device_token`, `language`, `description`, `description_ar`, `registration_card`, `document_1`, `document_2`, `document_3`, `availability_status`, `service_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '1', NULL, '', NULL, 'Admin', 'Admin', 'Admin', 'admin@mailinator.com', '1', '95751645491', NULL, 'Image_1', NULL, '22.719568', '75.857727', '0491', '0', '1', '1', '0', '$2y$10$ExamjU1FsSKJ.gJBmj.7Pen0jRyg7Y4RrNxQTkkMifAeDY3emahTm', NULL, '1', 'web', 'mamama', 'en', NULL, '0', 'ZRpRKMmO0E_1600506355.jpg', 'GrwPqBKocj_1600506415.jpg', 'jXS58zIDpw_1600506422.jpg', '4iSCS9wB9P_1600506436.jpg', '0', '0', '2020-02-09 18:30:00', '2020-11-10 04:57:31', NULL),
(20, '3', '2', '1', '1', NULL, 'ambuj tripathi', NULL, NULL, NULL, '1', '0123456789', NULL, 'c5CHUci5j0_1610540630.jpg', 'Khargone - Indore Hwy, Vishnu Puri Colony, Indore, Madhya Pradesh, India', '22.7004655', '75.8757977', '9356', '0', '1', '1', '0', '$2y$10$ExamjU1FsSKJ.gJBmj.7Pen0jRyg7Y4RrNxQTkkMifAeDY3emahTm', NULL, '1', 'android', 'null', 'en', 'A beauty salon is an', 'يستخدم نظامهم تقنيا', NULL, NULL, NULL, NULL, '1', '1', '2020-11-04 03:02:05', '2021-02-25 12:02:52', NULL),
(28, '2', '1', NULL, '1', NULL, 'Shivam', NULL, NULL, 'ramlal@gmail.com', '1', '9876543210', NULL, 'zTQ2HkGDjX_1608548320.jpg', 'Bhanwar Kuwa, Indore, Madhya Pradesh, India', '22.7139', NULL, '3184', '0', '1', '0', '0', '$2y$10$ExamjU1FsSKJ.gJBmj.7Pen0jRyg7Y4RrNxQTkkMifAeDY3emahTm', NULL, '1', 'android', 'ffU8iqmOgVk:APA91bGatHJNlvDrMOxg8MtNf0gOHMSe-hqOA6r1fQQpWG03hdKHfXBHUQkRWKza_-sgT9A-PXf2V3OEnrA2pwXNxl1DQilvN7avYNKw1z5l2R29facB03i570_X-v9Urbf-SjksZyQd', 'en', 'H h j j', '0', NULL, NULL, NULL, NULL, '0', '0', '2020-11-10 07:24:35', '2021-03-06 07:06:35', NULL),
(31, '3', '2', '2', '1', NULL, 'Beauty Center', NULL, NULL, 'null', '1', '0533755044', NULL, 'vD6UZjUAM5_1606320594.jpg', 'Saudi Arabia, Riyadh', '23.3423', '34.2323', '7013', '0', '0', '1', '0', '$2y$10$ExamjU1FsSKJ.gJBmj.7Pen0jRyg7Y4RrNxQTkkMifAeDY3emahTm', NULL, '1', 'android', 'null', 'en', 'مركز الجمال لخدمات التجميل والعناية بالبشرة والشعر', '0', 'ULxsEjkkio_1605169092.jpg', '2DZjOO12CQ_1605169160.jpg', 'oKHoL9Fayv_1605169146.jpg', 'y4ERuizOMW_1605169151.jpg', '1', '1', '2020-11-12 03:17:11', '2021-01-27 09:18:52', NULL),
(34, '3', '1', NULL, '1', NULL, 'Buety 123', NULL, NULL, NULL, '1', '9584741316', NULL, 'X1bapdnckW_1606394741.jpg', '109 Angus Rd, Monroe, LA 71202, USA', '32.3794408', NULL, '8797', '0', '1', '0', '0', '$2y$10$ExamjU1FsSKJ.gJBmj.7Pen0jRyg7Y4RrNxQTkkMifAeDY3emahTm', NULL, '1', 'android', 'null', 'en', NULL, '0', NULL, NULL, NULL, NULL, '1', '1', '2020-11-26 00:37:51', '2020-11-26 07:45:41', NULL),
(41, '3', '1', NULL, '1', NULL, 'Jamali', NULL, NULL, NULL, '1', '0533355555', NULL, 'uHfVzPFseh_1608044908.jpg', '4302 Ath Thumamah Road, Al Munsiyah, Riyadh 13421 6955, Saudi Arabia', '24.84595486336168', NULL, '3574', '0', '1', '0', '0', '$2y$10$cV4KQ.lHT5Kt57uE/.dYbuY3ZNhhvIVFRo.yggN43QEv5Y4JdK0uq', NULL, '1', 'ios', '32482c43f93e11f337e1030a9b5b766faf12f2ad5b81f2b6828d87fecf215228', 'en', NULL, '0', 'AKfLfPIn3J_1608044317.jpg', 'bAloCWrEyP_1608044342.jpg', 'b1QpuP0z5Y_1608044354.jpg', 'g85i5caJR4_1608044385.jpg', '1', '1', '2020-12-15 09:58:12', '2020-12-15 10:08:28', NULL),
(44, '3', '1', '2', '1', NULL, 'Norah', NULL, NULL, NULL, '1', '0552560808', NULL, 'l9FdzRM79S_1608637601.jpg', '8229, Al Mutamarat, Riyadh 12711 3952, Saudi Arabia', '24.676822344798037', '46.68829321034767', '8355', '0', '1', '0', '0', '$2y$10$bVQOsB0u7Ym.96Op70.L0OFihriHZw1.PZxu1/gXpymLXSueeA8S6', NULL, '1', 'ios', 'd95a6b4b02e042d01766778c9f8fa396ae3c5a1f24a71c6541c970598f894de3', 'en', NULL, '0', 'ZTqr48fzTb_1608636796.jpg', 'Zp16bkpeDK_1608636812.jpg', 'ZPvdZT7NCW_1608636823.jpg', '8k8GleTz24_1608636837.jpg', '1', '1', '2020-12-22 06:32:55', '2020-12-22 06:50:47', NULL),
(45, '2', '1', NULL, '1', NULL, 'Noraaaaaa', NULL, NULL, '0533755055', '1', '0533755055', '2', NULL, '8229, Al Mutamarat, Riyadh 12711 3952, Saudi Arabia', '24.676835233947795', '46.68828834582308', '1468', '0', '0', '0', '0', '$2y$10$muexuNtj5EJCCcliuRzv/OnCve6pfunBn8GRniLDyYr5gwskHJOqO', NULL, '1', 'ios', '060123e6e2d6be3dea82ea27da0504812d54914dd7c8f18a16d07c0c3971e3a1', '', NULL, '0', NULL, NULL, NULL, NULL, '0', '0', '2020-12-22 07:06:56', '2021-01-02 09:10:33', NULL),
(46, '2', '1', NULL, '1', NULL, 'Noraaaaa', NULL, NULL, '0533755045', '1', '0533755045', '2', 'DiPEjIYb8l_1608642059.jpg', '8229, Al Mutamarat, Riyadh 12711 3952, Saudi Arabia', '24.676875441659455', '46.68827490248233', '3503', '0', '0', '0', '0', '$2y$10$9J3WmdJ.VcSxfAAwpzJSO.O1Z86clhuWFj95oIoku2D/0aprVJonu', NULL, '1', 'ios', '060123e6e2d6be3dea82ea27da0504812d54914dd7c8f18a16d07c0c3971e3a1', '', 'باحثة', '0', NULL, NULL, NULL, NULL, '0', '0', '2020-12-22 07:32:32', '2021-01-20 04:46:32', NULL),
(47, '2', '1', NULL, '1', NULL, 'ismail', NULL, NULL, '9893658094', '1', '9893658094', '1', NULL, '\"DSK Vishwa, Dhayari, Pune, Maharashtra, India\"', '18.4427627', '73.7992634', '2769', '0', '0', '0', '0', '$2y$10$COaX/2Ok2IjMgIRkkdhmteeGQMwZIoW/mqeZ1qA6XYts0NKJycw6C', NULL, '1', 'ios', 'null', 'en', NULL, '0', NULL, NULL, NULL, NULL, '0', '0', '2020-12-24 00:57:40', '2021-01-20 04:43:15', NULL),
(48, '2', '0', NULL, '1', NULL, 'Norah', NULL, NULL, 'noraas1419@hotmail.com', '1', '0552560282', '2', 'F5pBUo5ppl_1612190520.jpg', '3884, Al Munsiyah, Riyadh 13249 7259, Saudi Arabia', '24.83546958930809', '46.76127780613369', '3929', '0', '0', '0', '0', '$2y$10$SW6ZKbpBrv2ikUCMRUO4veaNfj5eWdlLouQ4.ueXcu/IY7nfaAz9e', NULL, '1', 'android', '4524f1a23ab7d6b399ece39073c8056c2ca71b9a1a88cf5b18c4ae37d22bfcbc', '', 'مشغل نورة للتجميل', '0', NULL, NULL, NULL, NULL, '0', '0', '2020-12-28 09:27:45', '2021-02-01 09:42:00', NULL),
(49, '3', '1', '2', '1', NULL, 'نوره', NULL, NULL, NULL, '1', '0552560282', NULL, 'SrdsIWHwl8_1611958144.jpg', 'Unnamed Road, مطار الملك خالد الدولي،, مطار الملك خالد الدولي، الرياض 13412, Saudi Arabia', '24.840408938432297', '46.73300155956862', '5476', '0', '1', '0', '0', '$2y$10$jyZQsTP0SzRmEMDz74JVo.7L1Gf/a7lel6fmXfxrE8RsJvfs.gRj.', NULL, '1', 'android', 'null', '', 'Hfhjn', 'صالون نوره للتجميل احب عاصم يالبى عاصم', '6k2NRnzw4a_1609165909.jpg', 'xi5Q7fkmo0_1609165923.jpg', '8b0QfVRICG_1609165936.jpg', 'Ju1DGJ73bM_1609165953.jpg', '1', '1', '2020-12-28 09:31:09', '2021-01-29 17:33:00', NULL),
(50, '2', '0', NULL, '1', NULL, 'Nan', NULL, NULL, '0555544440', '1', '0555544440', '2', NULL, 'Al Qamari, Al Munsiyah, Riyadh 11564, Saudi Arabia', '24.8374568', '46.75990609999999', '1871', '0', '1', '0', '0', '$2y$10$zx..OnPSQmy2UBOfz5JSTOlAYXhnKZwaoOW5BpgxH/5ECzx.KVN06', NULL, '1', 'android', 'null', '', NULL, '0', NULL, NULL, NULL, NULL, '0', '0', '2020-12-28 09:40:18', '2020-12-28 09:41:10', NULL),
(51, '3', '1', '2', '1', NULL, 'نورة وبس', NULL, NULL, NULL, '1', '05566778899', NULL, 'n62JXPdDI2_1610556821.jpg', '4032 Abdulmalik Ibn Marwan, Al Mutamarat, Riyadh 12711 7718, Saudi Arabia', '24.671817358980903', '46.68925871327474', '4479', '0', '1', '0', '0', '$2y$10$NghiEI/JL1QqZERbmwD67.9hd.UBWC03umiwPKnYzXm9ntkqJvC.S', NULL, '1', 'android', 'null', '', 'Gyygffttgghfffchjjknvfftttgvvvc. Ghhhbgg hi kkkkvgyygffttgghbbgttfd gyygffttg Gyygffttgghfffchjjknvfftttgvvvc. Ghhhb', 'اابقباتنور اففلاتههمن. فقاتهخخنرالف بيستهترون بيصشيبغتر اابقباتنور اففلاتههمن. فقاتهخخنرالف بيستهترون بيصشيبغتر اابقباتنور اففلاتههمن. فقاتهخخنرالف بيستهترون بيصشيبغتر', NULL, NULL, NULL, NULL, '1', '1', '2020-12-28 10:46:24', '2021-01-27 11:46:19', NULL),
(52, '3', '1', '2', '1', NULL, 'G', NULL, NULL, NULL, '1', '055555555', NULL, NULL, '7596 Ad Daywan, Al Hamra, Riyadh 13216 2802, Saudi Arabia', '24.774265', '46.738586', '4207', '0', '1', '0', '0', '$2y$10$wKJu0E85ydYh4RTQBCG8uut/mlcG89sofaSsdgI3Mx8x3wnrGXfNK', NULL, '1', 'android', 'aff51819f19b7c5c2a7d2e226176b1868734a530e7635fc58f3e3d3866f44ece', '', NULL, '0', '2GYoRz7iFV_1609327399.jpg', 'kLgN8g7hxK_1609327413.jpg', '1VdgWcOZGc_1609327523.jpg', 'DzT6axBxjB_1609327529.jpg', '1', '1', '2020-12-30 06:22:42', '2020-12-30 06:27:41', NULL),
(53, '3', '1', '1', '1', NULL, 'vikash', NULL, NULL, NULL, '1', '9893658094', NULL, NULL, 'Unnamed Road, Choithram College of Nursing, Indore, Madhya Pradesh 452009, India', '22.6875754', '75.85116', '3190', '0', '1', '0', '0', '$2y$10$vztZof9VBaoRp8hkY2v3yulhMH6i4PO08Tw5I77NXbcLMhQHmNpnu', NULL, '1', 'android', 'null', 'en', NULL, '0', NULL, NULL, NULL, NULL, '0', '0', '2020-12-30 06:34:11', '2020-12-30 06:34:11', NULL),
(54, '3', '1', '2', '1', NULL, 'cxvxcv', NULL, NULL, NULL, '1', '32432432', NULL, NULL, 'Unnamed Road, Choithram College of Nursing, Indore, Madhya Pradesh 452009, India', '22.6875754', '75.85116', '6536', '0', '1', '0', '0', '$2y$10$AR3ir13.7Mwl3wJFBjtIO.qINqjylqDSf9lGpXlz8J7v3mU/vrtM6', NULL, '1', 'android', 'null', '', NULL, '0', NULL, NULL, NULL, NULL, '0', '0', '2020-12-30 06:40:40', '2020-12-30 06:40:40', NULL),
(55, '2', '0', NULL, '1', NULL, 'Asim', NULL, NULL, '0533755444', '1', '0533755444', '2', NULL, '8229, Al Mutamarat, Riyadh 12711 3952, Saudi Arabia', '24.67665852160791', '46.68832855549243', '1704', '0', '1', '0', '0', '$2y$10$Za.gGu2gzbRjQWEtX7xQFeeIc3AtgZaWl3QtNMpoPS2z9nzoo9lIu', NULL, '1', 'android', 'e61377a7738ab5cceee03b929c424141b373db64c8ee690a0b9da1668c113ab0', 'en', NULL, '0', NULL, NULL, NULL, NULL, '0', '0', '2020-12-31 05:04:00', '2021-01-02 09:09:25', NULL),
(56, '3', '1', '2', '1', NULL, 'نورة', NULL, NULL, NULL, '1', '0555666777', NULL, 'EKN0M361dh_1609420818.jpg', '7596 Ad Daywan, Al Hamra, Riyadh 13216 2802, Saudi Arabia', '24.774265', '46.738586', '3113', '0', '1', '0', '0', '$2y$10$GU1wqfdU8zcPcOQiMELgXOR2P4qTBtjere1hkZ9dieD4sfX2k5.gm', NULL, '1', 'android', '4c71441a1658954a4359c76dd7c35374937c48c622eecd797acbd2075fa8869d', '', NULL, '0', NULL, NULL, NULL, NULL, '1', '1', '2020-12-31 05:20:59', '2021-01-02 08:04:32', NULL),
(57, '3', '1', '2', '1', NULL, 'Norah', NULL, NULL, NULL, '1', '0512345678', NULL, '0PJn9JOA13_1609930463.jpg', '3884, Al Munsiyah, Riyadh 13249 7259, Saudi Arabia', '22.6870677', '75.84879959999999', '0397', '0', '1', '0', '0', '$2y$10$ExamjU1FsSKJ.gJBmj.7Pen0jRyg7Y4RrNxQTkkMifAeDY3emahTm', NULL, '1', 'android', 'null', 'en', 'rwe sdas erew', '0', NULL, NULL, NULL, NULL, '1', '1', '2021-01-06 05:48:07', '2021-01-08 02:04:28', NULL),
(58, '2', '0', NULL, '1', NULL, 'نورة', NULL, NULL, '0555567890', '1', '0555567890', '2', NULL, '3884, Al Munsiyah, Riyadh 13249 7259, Saudi Arabia', '24.83551932577153', '46.7611563978403', '7734', '0', '1', '0', '0', '$2y$10$GtMM/7r0IrKOKLvEd5dpherx2TZKdqE/EUj1hQGNm/P4T.WbanIHK', NULL, '1', 'android', '47fea7d3064d1055c319d1e56f64def55e53bed5f947e46f5c0f92b7dc9b3cdb', '', NULL, '0', NULL, NULL, NULL, NULL, '0', '0', '2021-01-06 06:20:15', '2021-01-06 06:21:23', NULL),
(59, '2', '0', NULL, '1', NULL, 'Asim', NULL, NULL, '0556677889', '1', '0556677889', '2', NULL, '3813, Al Munsiyah, Riyadh 13249 7253, Saudi Arabia', '24.83560746968241', '46.76074065110458', '2080', '0', '1', '0', '0', '$2y$10$l0nO2itz0iFMpBv2kr3sTOf8ClFSCVqbkCn/EzHoOiD8TYWyoqtzW', NULL, '1', 'android', 'd6da97589f612846aa2e5211b4f9e4b952b80e841feb120e9dff91ca7cbff625', '', NULL, '0', NULL, NULL, NULL, NULL, '0', '0', '2021-01-08 09:09:55', '2021-01-08 09:10:12', NULL),
(60, '2', '0', NULL, '1', NULL, 'مها', NULL, NULL, 'asimalmotelq@yahoo.com', '1', '05123456789', '2', 'stVMo8WxNm_1611765087.jpg', '3884, Al Munsiyah, Riyadh 13249 7259, Saudi Arabia', '24.817661601789816', '46.77452663795664', '4130', '0', '1', '0', '0', '$2y$10$3fqyt3mni9JZ3HxqG/9KxeeCLoSD3sMIdUP2XCVgvx.4rzn9jx3Q6', NULL, '1', 'android', '4524f1a23ab7d6b399ece39073c8056c2ca71b9a1a88cf5b18c4ae37d22bfcbc', '', 'اتننن تتاااازرااا لففببلغهنرزللغ بقغاتتالبققب سيقفان اغااااازه لبفعنننزررتغغل يقفااييببلبلل', '0', NULL, NULL, NULL, NULL, '0', '0', '2021-01-13 12:22:20', '2021-02-01 09:43:35', NULL),
(61, '2', '0', NULL, '1', NULL, 'عاصم', NULL, NULL, '05533755044', '1', '05533755044', '2', '3pn27MbWMQ_1611165435.jpg', '4302 Ath Thumamah Road, Al Munsiyah, Riyadh 13421 6955, Saudi Arabia', '24.845984041317088', '46.75928017152215', '8917', '0', '1', '0', '0', '$2y$10$CCCUwEIfH7Wl5ibGoepu5Ozc46wxmApU3oCIjz8BVvVeBSXeUVZCK', NULL, '1', 'android', '2ec0ba8eac37b1112b5cf163002f54b4882f2f8c68f8f9c532ab78e04c755dcc', '', 'الللتنر. ععراتلبققذ.  اعتابيلننححنادر اففلهحكت اغقيهخمتد', '0', NULL, NULL, NULL, NULL, '0', '0', '2021-01-20 12:48:55', '2021-01-20 12:57:15', NULL),
(62, '2', '0', NULL, '1', NULL, 'johndoe123', NULL, NULL, '6366356764', '1', '6366356764', '1', NULL, 'null', '16.1801864', '77.3398007', '3549', '0', '1', '0', '0', '$2y$10$Brcb3WPqgiTtJPMhuqgIs.Cusu2lHtg8qAWjv3lPv5WyjB1Wd8wba', NULL, '1', 'android', 'fiqyQtJJZjc:APA91bE1BGj9a6SAV3SFYoXlrMPWDOWgYgdUSvrJLJghWlw_j7yQ4lZJ9sHJkapjxnJ3qqKfUu7AY22I2e_JQTQ6Ee1CvK5lfP6OPmKdqe8KWc-qaynlUNjwWN2fwl-sjYjSj6YyLnEa', 'en', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '2021-02-09 06:10:56', '2021-02-09 06:10:56', NULL),
(63, '3', '1', '1', '1', NULL, 'test', NULL, NULL, NULL, '1', '09178319365', NULL, NULL, 'Unnamed Road, Quezon City, Metro Manila, Philippines', '14.6951034', '121.076266', '8483', '0', '1', '0', '0', '$2y$10$94Cs7hZw1GKOJTsTRLs7tOT/PtMfdumBuYGfN1GcdI7KMWHwzM6Iy', NULL, '1', 'android', 'cfFUSctp14o:APA91bGZUozmV-RdZGhTLksuqfSNvVDIhOO6Ab5d3anYyQpG6nUTYqTL95KY4VTmPi8BZde9N25Qoc8VeHMO3rfY3PWZ8W1dWnTqkeR_VJGayjwHqAqcUNSqk98ayk5MmHEhrKfKUmSG', 'en', NULL, NULL, 'NJ4LoImKtg_1612876263.jpg', NULL, NULL, NULL, '1', '0', '2021-02-09 08:09:08', '2021-02-09 08:13:59', NULL),
(64, '2', '0', NULL, '1', NULL, 'Shivam Yadav', NULL, NULL, '7974682508', '1', '7974682508', '1', NULL, '808-809, Navlakha, Road, Indore, Madhya Pradesh 452001, India', '22.7004795', '75.8758619', '1851', '0', '1', '0', '0', '$2y$10$08E.P4/tP8zwWnsgnK2AFuyT0zghn97.rUZ5LY.R7H06k70J4nwwq', NULL, '1', 'android', 'eZf1QgM832c:APA91bFJt7XxNNivGBjJIPzLIbTkVeBikPwUwOtkehFlsSfa5ZKsLwq996v_kEmbWxZs5L_YLXhlxKV3V8yiGEAU4dG_-f15sWCrBLxWEpLZDgXgk3VaKs7DaOtjlvqlxToELTZoVK0w', 'en', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '2021-02-19 04:24:29', '2021-02-19 04:24:29', NULL),
(65, '2', '0', NULL, '1', NULL, 'ambuj', NULL, NULL, '7566380832', '1', '7566380832', '1', NULL, '\"Umda Rd, Padum Nagar, Bhilai Marshalling Yard, Bhilai, Chhattisgarh 490025, India\"', '21.217160073708357', NULL, '1804', '0', '1', '0', '0', '$2y$10$gfdSjX.BjtauJGF3Z4SFc.t0nvfqfAfdOCZYoG.hUAnN2345nMxh6', NULL, '1', 'ios', 'dasdas34324', 'en', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '2021-02-23 11:46:54', '2021-02-23 11:51:30', NULL),
(66, '2', '0', NULL, '', '102244639062741917126', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '1', '0', '0', NULL, NULL, '1', 'ios', 'e3jmUGGAg6o:APA91bFcVg0H84Ezv9rw3IPm1KtAh2CdSPbIj2xb4WxheYhPkq4Go5HX12kjprJNTVVL5cRxn20GsJN4V8goG3Ki8gsbxenS11vNVMgrdDKcu8RFwIvR7Iw8PNMXU4lZYoQkcAJP-kgY', 'en', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '2021-03-02 08:46:52', '2021-03-02 08:46:52', NULL),
(67, '2', '0', NULL, '', '102244639062741917126', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '1', '0', '0', NULL, NULL, '1', 'ios', 'ewZZD-kzVcw:APA91bHu09t-fcK_9LZHXYe0M2elPg3o51XxUoVSeODMWdnyGqPIKvUFyLShyYzfJXCRIBgL_uvw6GsEPunE6Oq5DRqN3pJXirLa7mtvrouphFuagstqW8WP4QgZJLbWxux98TN7thC-', 'en', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '2021-03-03 01:14:10', '2021-03-03 01:14:10', NULL),
(68, '3', '1', '1', '1', NULL, 'Ambuj', NULL, NULL, NULL, '1', '7566380832', NULL, NULL, 'Navlakha, Janki Nagar, Indore, Madhya Pradesh 452001, India', '22.700373858084372', '75.87599290434984', '4554', '0', '1', '0', '0', '$2y$10$i/euPwXyb1.gW/B6bXvKGuNqm9hb.ibvkjLFrT8./ClPIo.KKPcri', NULL, '1', 'android', '0cb41e3a8de84a91240d3cac753937398b5e079222273f60c4d7174b98f69742', 'en', NULL, NULL, '5sepO2V67d_1614841897.jpg', 'Wl3ZDiTXXA_1614841906.jpg', 'DfnHCh2tev_1614841915.jpg', 'NfPk7SZtHz_1614841926.jpg', '1', '1', '2021-03-04 03:11:21', '2021-03-04 03:13:01', NULL),
(69, '2', '0', NULL, '1', NULL, 'Ibraajl', NULL, NULL, '0594645000', '1', '0594645000', '1', NULL, '7838 Al Muhandis Masaid Al Anqari, Al Olaya, Riyadh 12244 2823, Saudi Arabia', '24.712910806943537', '46.683273258583114', '2555', '0', '1', '0', '0', '$2y$10$OL11ALG1d63/yNL0LjVZIOlTdkU00mjeooTtJcYcUFtxjowr.iW/q', NULL, '1', 'android', 'null', '', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '2021-03-07 10:04:57', '2021-03-07 10:05:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_days`
--

CREATE TABLE `vendor_days` (
  `vendor_day_id` int UNSIGNED NOT NULL,
  `vendor_id` int UNSIGNED NOT NULL,
  `day_id` int DEFAULT NULL,
  `day_name` varchar(225) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `day_status` enum('0','1') DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_days`
--

INSERT INTO `vendor_days` (`vendor_day_id`, `vendor_id`, `day_id`, `day_name`, `day_status`, `start_time`, `end_time`, `created_at`, `updated_at`, `deleted_at`) VALUES
(36, 7, 1, 'Sunday', '1', '09:45:00', '06:45:00', '2020-10-26 12:33:50', '2020-10-26 12:33:50', NULL),
(37, 7, 2, 'Monday', '0', '09:45:00', '06:45:00', '2020-10-26 12:33:50', '2020-10-26 12:33:50', NULL),
(38, 7, 3, 'Tuesday', '1', '09:45:00', '06:45:00', '2020-10-26 12:33:50', '2020-10-26 12:33:50', NULL),
(39, 7, 4, 'Wednesday', '1', '09:45:00', '06:45:00', '2020-10-26 12:33:50', '2020-10-26 12:33:50', NULL),
(40, 7, 5, 'Thursday', '0', '09:45:00', '06:45:00', '2020-10-26 12:33:50', '2020-10-26 12:33:50', NULL),
(41, 7, 6, 'Friday', '1', '09:45:00', '06:45:00', '2020-10-26 12:33:50', '2020-10-26 12:33:50', NULL),
(42, 7, 7, 'Saturday', '1', '09:45:00', '06:45:00', '2020-10-26 12:33:50', '2020-10-26 12:33:50', NULL),
(43, 17, 1, 'Sunday', '1', '09:45:00', '06:45:00', '2020-10-31 10:36:19', '2020-10-31 10:36:19', NULL),
(44, 17, 2, 'Monday', '1', '09:45:00', '06:45:00', '2020-10-31 10:36:19', '2020-10-31 10:36:19', NULL),
(45, 17, 3, 'Tuesday', '1', '09:45:00', '06:45:00', '2020-10-31 10:36:19', '2020-10-31 10:36:19', NULL),
(46, 17, 4, 'Wednesday', '1', '09:45:00', '06:45:00', '2020-10-31 10:36:19', '2020-10-31 10:36:19', NULL),
(47, 17, 5, 'Thursday', '1', '09:45:00', '06:45:00', '2020-10-31 10:36:19', '2020-10-31 10:36:19', NULL),
(48, 17, 6, 'Friday', '1', '09:45:00', '06:45:00', '2020-10-31 10:36:19', '2020-10-31 10:36:19', NULL),
(49, 17, 7, 'Saturday', '1', '09:45:00', '06:45:00', '2020-10-31 10:36:19', '2020-10-31 10:36:19', NULL),
(50, 18, 1, 'Sunday', '1', '09:45:00', '06:45:00', '2020-10-31 13:10:56', '2020-10-31 13:10:56', NULL),
(51, 18, 2, 'Monday', '1', '09:45:00', '06:45:00', '2020-10-31 13:10:56', '2020-10-31 13:10:56', NULL),
(52, 18, 3, 'Tuesday', '1', '09:45:00', '06:45:00', '2020-10-31 13:10:56', '2020-10-31 13:10:56', NULL),
(53, 18, 4, 'Wednesday', '1', '09:45:00', '06:45:00', '2020-10-31 13:10:56', '2020-10-31 13:10:56', NULL),
(54, 18, 5, 'Thursday', '1', '09:45:00', '06:45:00', '2020-10-31 13:10:56', '2020-10-31 13:10:56', NULL),
(55, 18, 6, 'Friday', '1', '09:45:00', '06:45:00', '2020-10-31 13:10:56', '2020-10-31 13:10:56', NULL),
(56, 18, 7, 'Saturday', '1', '09:45:00', '06:45:00', '2020-10-31 13:10:56', '2020-10-31 13:10:56', NULL),
(71, 22, 1, 'Sunday', '1', '09:45:00', '06:45:00', '2020-11-04 16:05:56', '2020-11-04 16:05:56', NULL),
(72, 22, 2, 'Monday', '0', '09:45:00', '06:45:00', '2020-11-04 16:05:56', '2020-11-04 16:05:56', NULL),
(73, 22, 3, 'Tuesday', '0', '09:45:00', '06:45:00', '2020-11-04 16:05:56', '2020-11-04 16:05:56', NULL),
(74, 22, 4, 'Wednesday', '0', '09:45:00', '06:45:00', '2020-11-04 16:05:56', '2020-11-04 16:05:56', NULL),
(75, 22, 5, 'Thursday', '0', '09:45:00', '06:45:00', '2020-11-04 16:05:56', '2020-11-04 16:05:56', NULL),
(76, 22, 6, 'Friday', '0', '09:45:00', '06:45:00', '2020-11-04 16:05:56', '2020-11-04 16:05:56', NULL),
(77, 22, 7, 'Saturday', '0', '09:45:00', '06:45:00', '2020-11-04 16:05:56', '2020-11-04 16:05:56', NULL),
(99, 33, 1, 'Sunday', '0', '09:45:00', '06:45:00', '2020-11-25 15:38:25', '2020-11-25 15:38:25', NULL),
(100, 33, 2, 'Monday', '0', '09:45:00', '06:45:00', '2020-11-25 15:38:25', '2020-11-25 15:38:25', NULL),
(101, 33, 3, 'Tuesday', '0', '09:45:00', '06:45:00', '2020-11-25 15:38:25', '2020-11-25 15:38:25', NULL),
(102, 33, 4, 'Wednesday', '0', '09:45:00', '06:45:00', '2020-11-25 15:38:25', '2020-11-25 15:38:25', NULL),
(103, 33, 5, 'Thursday', '0', '09:45:00', '06:45:00', '2020-11-25 15:38:25', '2020-11-25 15:38:25', NULL),
(104, 33, 6, 'Friday', '0', '09:45:00', '06:45:00', '2020-11-25 15:38:25', '2020-11-25 15:38:25', NULL),
(105, 33, 7, 'Saturday', '0', '09:45:00', '06:45:00', '2020-11-25 15:38:25', '2020-11-25 15:38:25', NULL),
(106, 31, 1, 'Sunday', '1', '17:00:00', '23:59:00', '2020-11-26 02:46:51', '2020-11-26 02:46:51', NULL),
(107, 31, 2, 'Monday', '1', '09:45:00', '06:45:00', '2020-11-26 02:46:51', '2020-11-26 02:46:51', NULL),
(108, 31, 3, 'Tuesday', '1', '09:45:00', '18:45:00', '2020-11-26 02:46:51', '2020-11-26 02:46:51', NULL),
(109, 31, 4, 'Wednesday', '1', '09:45:00', '06:45:00', '2020-11-26 02:46:51', '2020-11-26 02:46:51', NULL),
(110, 31, 5, 'Thursday', '1', '09:45:00', '06:45:00', '2020-11-26 02:46:51', '2020-11-26 02:46:51', NULL),
(111, 31, 6, 'Friday', '1', '09:45:00', '06:45:00', '2020-11-26 02:46:51', '2020-11-26 02:46:51', NULL),
(112, 31, 7, 'Saturday', '1', '11:24:00', '06:45:00', '2020-11-26 02:46:51', '2020-11-26 02:46:51', NULL),
(134, 34, 1, 'Sunday', '1', '07:15:00', '12:00:00', '2020-11-26 13:45:01', '2020-11-26 13:45:01', NULL),
(135, 34, 2, 'Monday', '1', '09:45:00', '06:45:00', '2020-11-26 13:45:01', '2020-11-26 13:45:01', NULL),
(136, 34, 3, 'Tuesday', '0', '09:45:00', '06:45:00', '2020-11-26 13:45:01', '2020-11-26 13:45:01', NULL),
(137, 34, 4, 'Wednesday', '0', '09:45:00', '06:45:00', '2020-11-26 13:45:01', '2020-11-26 13:45:01', NULL),
(138, 34, 5, 'Thursday', '0', '09:45:00', '06:45:00', '2020-11-26 13:45:01', '2020-11-26 13:45:01', NULL),
(139, 34, 6, 'Friday', '1', '09:45:00', '06:45:00', '2020-11-26 13:45:01', '2020-11-26 13:45:01', NULL),
(140, 34, 7, 'Saturday', '0', '09:45:00', '06:45:00', '2020-11-26 13:45:01', '2020-11-26 13:45:01', NULL),
(169, 39, 1, 'Sunday', '1', '09:45:00', '17:37:00', '2020-12-14 13:06:09', '2020-12-14 13:06:09', NULL),
(170, 39, 2, 'Monday', '1', '09:45:00', '20:00:00', '2020-12-14 13:06:09', '2020-12-14 13:06:09', NULL),
(171, 39, 3, 'Tuesday', '1', '09:45:00', '06:45:00', '2020-12-14 13:06:09', '2020-12-14 13:06:09', NULL),
(172, 39, 4, 'Wednesday', '1', '09:45:00', '06:45:00', '2020-12-14 13:06:09', '2020-12-14 13:06:09', NULL),
(173, 39, 5, 'Thursday', '1', '09:45:00', '06:45:00', '2020-12-14 13:06:09', '2020-12-14 13:06:09', NULL),
(174, 39, 6, 'Friday', '1', '09:45:00', '06:45:00', '2020-12-14 13:06:09', '2020-12-14 13:06:09', NULL),
(175, 39, 7, 'Saturday', '1', '09:45:00', '06:45:00', '2020-12-14 13:06:09', '2020-12-14 13:06:09', NULL),
(190, 41, 1, 'Sunday', '0', '15:00:00', '23:59:00', '2020-12-15 20:22:10', '2020-12-15 20:22:10', NULL),
(191, 41, 2, 'Monday', '0', '15:00:00', '17:55:00', '2020-12-15 20:22:10', '2020-12-15 20:22:10', NULL),
(192, 41, 3, 'Tuesday', '0', '15:00:00', '06:45:00', '2020-12-15 20:22:10', '2020-12-15 20:22:10', NULL),
(193, 41, 4, 'Wednesday', '0', '15:00:00', '18:08:00', '2020-12-15 20:22:10', '2020-12-15 20:22:10', NULL),
(194, 41, 5, 'Thursday', '0', '15:00:00', '06:45:00', '2020-12-15 20:22:10', '2020-12-15 20:22:10', NULL),
(195, 41, 6, 'Friday', '1', '12:00:00', '06:45:00', '2020-12-15 20:22:10', '2020-12-15 20:22:10', NULL),
(196, 41, 7, 'Saturday', '1', '09:45:00', '06:45:00', '2020-12-15 20:22:10', '2020-12-15 20:22:10', NULL),
(197, 44, 1, 'Sunday', '1', '09:45:00', '23:00:00', '2020-12-22 12:35:23', '2020-12-22 12:35:23', NULL),
(198, 44, 2, 'Monday', '1', '09:45:00', '11:00:00', '2020-12-22 12:35:23', '2020-12-22 12:35:23', NULL),
(199, 44, 3, 'Tuesday', '1', '09:45:00', '10:00:00', '2020-12-22 12:35:23', '2020-12-22 12:35:23', NULL),
(200, 44, 4, 'Wednesday', '1', '09:45:00', '21:00:00', '2020-12-22 12:35:23', '2020-12-22 12:35:23', NULL),
(201, 44, 5, 'Thursday', '1', '09:45:00', '08:00:00', '2020-12-22 12:35:23', '2020-12-22 12:35:23', NULL),
(202, 44, 6, 'Friday', '0', '09:45:00', '06:45:00', '2020-12-22 12:35:23', '2020-12-22 12:35:23', NULL),
(203, 44, 7, 'Saturday', '0', '09:45:00', '06:45:00', '2020-12-22 12:35:23', '2020-12-22 12:35:23', NULL),
(344, 52, 1, 'Sunday', '0', '09:45:00', '06:45:00', '2020-12-30 12:26:09', '2020-12-30 12:26:09', NULL),
(345, 52, 2, 'Monday', '1', '09:45:00', '06:45:00', '2020-12-30 12:26:09', '2020-12-30 12:26:09', NULL),
(346, 52, 3, 'Tuesday', '1', '09:45:00', '06:45:00', '2020-12-30 12:26:09', '2020-12-30 12:26:09', NULL),
(347, 52, 4, 'Wednesday', '1', '09:45:00', '06:45:00', '2020-12-30 12:26:09', '2020-12-30 12:26:09', NULL),
(348, 52, 5, 'Thursday', '1', '09:45:00', '06:45:00', '2020-12-30 12:26:09', '2020-12-30 12:26:09', NULL),
(349, 52, 6, 'Friday', '0', '09:45:00', '06:45:00', '2020-12-30 12:26:09', '2020-12-30 12:26:09', NULL),
(350, 52, 7, 'Saturday', '0', '09:45:00', '06:45:00', '2020-12-30 12:26:09', '2020-12-30 12:26:09', NULL),
(358, 56, 1, 'Sunday', '1', '09:45:00', '18:45:00', '2020-12-31 11:21:50', '2020-12-31 11:21:50', NULL),
(359, 56, 2, 'Monday', '1', '09:45:00', '18:45:00', '2020-12-31 11:21:50', '2020-12-31 11:21:50', NULL),
(360, 56, 3, 'Tuesday', '1', '09:45:00', '18:45:00', '2020-12-31 11:21:50', '2020-12-31 11:21:50', NULL),
(361, 56, 4, 'Wednesday', '1', '09:45:00', '18:45:00', '2020-12-31 11:21:50', '2020-12-31 11:21:50', NULL),
(362, 56, 5, 'Thursday', '1', '09:45:00', '18:45:00', '2020-12-31 11:21:50', '2020-12-31 11:21:50', NULL),
(363, 56, 6, 'Friday', '0', '09:45:00', '06:45:00', '2020-12-31 11:21:50', '2020-12-31 11:21:50', NULL),
(364, 56, 7, 'Saturday', '1', '09:45:00', '18:45:00', '2020-12-31 11:21:50', '2020-12-31 11:21:50', NULL),
(407, 20, 2, 'Monday', '1', '06:00:00', '06:00:00', '2021-01-08 06:42:34', '2021-01-08 06:42:34', NULL),
(408, 20, 3, 'Tuesday', '1', '09:45:00', '18:45:00', '2021-01-08 06:42:34', '2021-01-08 06:42:34', NULL),
(409, 20, 4, 'Wednesday', '1', '09:45:00', '23:40:00', '2021-01-08 06:42:34', '2021-01-08 06:42:34', NULL),
(410, 20, 5, 'Thursday', '1', '09:45:00', '18:45:00', '2021-01-08 06:42:34', '2021-01-08 06:42:34', NULL),
(411, 20, 6, 'Friday', '1', '09:45:00', '18:45:00', '2021-01-08 06:42:34', '2021-01-08 06:42:34', NULL),
(412, 20, 7, 'Saturday', '1', '09:45:00', '10:15:00', '2021-01-08 06:42:34', '2021-01-08 06:42:34', NULL),
(413, 20, 1, 'Sunday', '1', '09:45:00', '10:15:00', '2021-01-08 06:42:34', '2021-01-08 06:42:34', NULL),
(428, 57, 1, 'Sunday', '1', '09:45:00', '18:45:00', '2021-01-08 07:19:24', '2021-01-08 07:19:24', NULL),
(429, 57, 2, 'Monday', '1', '09:45:00', '18:45:00', '2021-01-08 07:19:24', '2021-01-08 07:19:24', NULL),
(430, 57, 3, 'Tuesday', '1', '09:45:00', '18:45:00', '2021-01-08 07:19:24', '2021-01-08 07:19:24', NULL),
(431, 57, 4, 'Wednesday', '1', '09:45:00', '18:45:00', '2021-01-08 07:19:24', '2021-01-08 07:19:24', NULL),
(432, 57, 5, 'Thursday', '1', '09:45:00', '18:45:00', '2021-01-08 07:19:24', '2021-01-08 07:19:24', NULL),
(433, 57, 6, 'Friday', '1', '09:45:00', '18:45:00', '2021-01-08 07:19:24', '2021-01-08 07:19:24', NULL),
(434, 57, 7, 'Saturday', '1', '23:54:00', '23:59:00', '2021-01-08 07:19:24', '2021-01-08 07:19:24', NULL),
(470, 51, 1, 'Sunday', '0', '09:00:00', '23:00:00', '2021-01-27 16:57:25', '2021-01-27 16:57:25', NULL),
(471, 51, 2, 'Monday', '0', '08:00:00', '23:00:00', '2021-01-27 16:57:25', '2021-01-27 16:57:25', NULL),
(472, 51, 3, 'Tuesday', '0', '07:00:00', '23:00:00', '2021-01-27 16:57:25', '2021-01-27 16:57:25', NULL),
(473, 51, 4, 'Wednesday', '1', '06:00:00', '23:00:00', '2021-01-27 16:57:25', '2021-01-27 16:57:25', NULL),
(474, 51, 5, 'Thursday', '1', '09:00:00', '23:00:00', '2021-01-27 16:57:25', '2021-01-27 16:57:25', NULL),
(475, 51, 6, 'Friday', '0', '10:00:00', '06:45:00', '2021-01-27 16:57:25', '2021-01-27 16:57:25', NULL),
(476, 51, 7, 'Saturday', '1', '10:00:00', '23:00:00', '2021-01-27 16:57:25', '2021-01-27 16:57:25', NULL),
(477, 49, 1, 'Sunday', '1', '09:45:00', '23:53:00', '2021-01-29 23:21:18', '2021-01-29 23:21:18', NULL),
(478, 49, 2, 'Monday', '1', '09:45:00', '23:00:00', '2021-01-29 23:21:18', '2021-01-29 23:21:18', NULL),
(479, 49, 3, 'Tuesday', '1', '09:45:00', '23:00:00', '2021-01-29 23:21:18', '2021-01-29 23:21:18', NULL),
(480, 49, 4, 'Wednesday', '1', '09:45:00', '23:00:00', '2021-01-29 23:21:18', '2021-01-29 23:21:18', NULL),
(481, 49, 5, 'Thursday', '1', '09:45:00', '23:00:00', '2021-01-29 23:21:18', '2021-01-29 23:21:18', NULL),
(482, 49, 6, 'Friday', '1', '09:45:00', '23:00:00', '2021-01-29 23:21:18', '2021-01-29 23:21:18', NULL),
(483, 49, 7, 'Saturday', '1', '00:53:00', '23:00:00', '2021-01-29 23:21:18', '2021-01-29 23:21:18', NULL),
(484, 63, 1, 'Sunday', '1', '09:45:00', '06:45:00', '2021-02-09 14:13:59', '2021-02-09 14:13:59', NULL),
(485, 63, 2, 'Monday', '0', '09:45:00', '06:45:00', '2021-02-09 14:13:59', '2021-02-09 14:13:59', NULL),
(486, 63, 3, 'Tuesday', '0', '09:45:00', '06:45:00', '2021-02-09 14:13:59', '2021-02-09 14:13:59', NULL),
(487, 63, 4, 'Wednesday', '0', '09:45:00', '06:45:00', '2021-02-09 14:13:59', '2021-02-09 14:13:59', NULL),
(488, 63, 5, 'Thursday', '0', '09:45:00', '06:45:00', '2021-02-09 14:13:59', '2021-02-09 14:13:59', NULL),
(489, 63, 6, 'Friday', '0', '09:45:00', '06:45:00', '2021-02-09 14:13:59', '2021-02-09 14:13:59', NULL),
(490, 63, 7, 'Saturday', '0', '09:45:00', '06:45:00', '2021-02-09 14:13:59', '2021-02-09 14:13:59', NULL),
(491, 68, 1, 'Sunday', '1', '09:45:00', '06:45:00', '2021-03-04 07:12:26', '2021-03-04 07:12:26', NULL),
(492, 68, 2, 'Monday', '1', '09:45:00', '06:45:00', '2021-03-04 07:12:26', '2021-03-04 07:12:26', NULL),
(493, 68, 3, 'Tuesday', '1', '09:45:00', '06:45:00', '2021-03-04 07:12:26', '2021-03-04 07:12:26', NULL),
(494, 68, 4, 'Wednesday', '1', '09:45:00', '06:45:00', '2021-03-04 07:12:26', '2021-03-04 07:12:26', NULL),
(495, 68, 5, 'Thursday', '0', '09:45:00', '06:45:00', '2021-03-04 07:12:26', '2021-03-04 07:12:26', NULL),
(496, 68, 6, 'Friday', '0', '09:45:00', '06:45:00', '2021-03-04 07:12:26', '2021-03-04 07:12:26', NULL),
(497, 68, 7, 'Saturday', '0', '09:45:00', '06:45:00', '2021-03-04 07:12:26', '2021-03-04 07:12:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_portfolios`
--

CREATE TABLE `vendor_portfolios` (
  `vendor_portfolio_id` int UNSIGNED NOT NULL,
  `vendor_id` int UNSIGNED NOT NULL,
  `type` enum('1','2','3') NOT NULL DEFAULT '1',
  `portfolio_image` varchar(225) DEFAULT 'NULL',
  `thumb` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_portfolios`
--

INSERT INTO `vendor_portfolios` (`vendor_portfolio_id`, `vendor_id`, `type`, `portfolio_image`, `thumb`, `created_at`, `deleted_at`) VALUES
(1, 7, '1', 'jAeMded01B_1600232804.jpg', NULL, '2020-09-16 01:06:44', NULL),
(2, 13, '1', 'WbaAPw8kb5_1602914439.png', NULL, '2020-10-17 02:00:40', NULL),
(3, 13, '2', 'gtaoKxgoGb_1602914452.png', NULL, '2020-10-17 02:00:52', NULL),
(4, 20, '1', 'lnwYxebfdK_1604745501.jpg', NULL, '2020-11-07 06:38:21', NULL),
(5, 20, '2', 'zi7LYvOXju_1604745572.mp4', NULL, '2020-11-07 06:39:32', '2020-12-31 00:56:14'),
(6, 31, '1', 'PetbOFuNwY_1605169547.jpg', NULL, '2020-11-12 04:25:47', NULL),
(7, 31, '1', '9ntTS4So5n_1605169555.jpg', NULL, '2020-11-12 04:25:55', NULL),
(8, 20, '1', 'gBU82LctN8_1605959918.jpg', NULL, '2020-11-21 07:58:38', '2020-12-21 07:24:38'),
(9, 20, '2', 'BYIwl5Cj7z_1606111788.MOV', NULL, '2020-11-23 02:09:48', '2020-12-29 03:13:13'),
(10, 20, '1', 'iD6PE7RTTk_1606112115.jpg', NULL, '2020-11-23 02:15:15', NULL),
(11, 20, '1', 'mjydpjTIuN_1606305390.jpg', NULL, '2020-11-25 07:56:30', '2020-12-21 07:25:00'),
(12, 31, '1', 'uK0uQ4YZYn_1606320545.jpg', NULL, '2020-11-25 12:09:05', NULL),
(13, 31, '1', 'mEDCoZvl8f_1606320552.jpg', NULL, '2020-11-25 12:09:12', NULL),
(14, 31, '1', 'HosVEZZnkt_1606320559.jpg', NULL, '2020-11-25 12:09:19', NULL),
(15, 31, '1', 'm89VP7sUKz_1606320567.jpg', NULL, '2020-11-25 12:09:27', NULL),
(16, 31, '1', 'eCQUfMQFyh_1606320573.jpg', NULL, '2020-11-25 12:09:34', NULL),
(17, 31, '1', 'iV5EuTUMTJ_1606320622.jpg', NULL, '2020-11-25 12:10:22', NULL),
(18, 34, '1', '3nY1CTB7Wv_1606394764.jpg', NULL, '2020-11-26 08:46:04', NULL),
(19, 34, '1', '6s9lwKuKDX_1606394784.jpg', NULL, '2020-11-26 08:46:24', NULL),
(20, 20, '2', 'SsvCjYUKE1_1606467460.MOV', NULL, '2020-11-27 04:57:40', '2020-12-28 08:50:47'),
(21, 41, '1', 'BkeWVSY6Ql_1608047404.jpg', NULL, '2020-12-15 11:50:04', NULL),
(22, 41, '1', 'tIXCIM4gnw_1608047416.jpg', NULL, '2020-12-15 11:50:16', NULL),
(23, 41, '1', 'VvedPB9bSS_1608047426.jpg', NULL, '2020-12-15 11:50:26', NULL),
(24, 41, '1', 'XeA858WVPl_1608047435.jpg', NULL, '2020-12-15 11:50:35', NULL),
(25, 41, '1', 'H6bHLXSn7i_1608047447.jpg', NULL, '2020-12-15 11:50:47', NULL),
(26, 41, '2', 'SWqBCyqrME_1608047484.MOV', NULL, '2020-12-15 11:51:24', '2020-12-22 04:48:34'),
(27, 20, '2', 'UNl1jCv4sc_1608549669.mp4', NULL, '2020-12-21 07:21:09', '2020-12-21 07:24:08'),
(30, 20, '2', '5yzyepZltq_1608551366.mp4', '5fe08bc6ad8ed1608551366.png', '2020-12-21 07:49:26', NULL),
(31, 20, '2', 'MaOMqXenv0_1608551799.mp4', '5fe08d7760a701608551799.png', '2020-12-21 07:56:39', '2020-12-31 01:16:21'),
(32, 20, '2', 'F0JnpRjPIm_1608553575.mp4', '5fe09467044ee1608553575.png', '2020-12-21 08:26:15', NULL),
(33, 20, '1', 'ZQ8SegCF4M_1608623302.jpg', NULL, '2020-12-22 03:48:22', NULL),
(34, 44, '1', 'PIxprXNeJE_1608637435.jpg', NULL, '2020-12-22 07:43:55', NULL),
(35, 44, '1', 'MkZfVhbV5a_1608637457.jpg', NULL, '2020-12-22 07:44:17', NULL),
(36, 44, '1', 'AMk8kiKouU_1608637471.jpg', NULL, '2020-12-22 07:44:31', NULL),
(37, 20, '1', 'kmX076UyPF_1609132401.jpg', NULL, '2020-12-28 01:13:21', '2020-12-28 01:13:35'),
(38, 20, '2', 'uGjUwmVwLR_1609152514.mp4', 'uGjUwmVwLR_1609152514.png', '2020-12-28 06:48:34', NULL),
(39, 20, '2', '9RCwJgT79n_1609153464.mp4', '9RCwJgT79n_1609153464.png', '2020-12-28 07:04:25', NULL),
(40, 56, '1', 'q05pBBLJHx_1609410266.jpg', NULL, '2020-12-31 06:24:26', NULL),
(41, 56, '1', 'LlHYlEtk6e_1609410277.jpg', NULL, '2020-12-31 06:24:37', NULL),
(42, 20, '2', 'sWgJh3wArH_1609414538.MOV', 'sWgJh3wArH_1609414538.png', '2020-12-31 07:35:39', '2020-12-31 07:49:24'),
(43, 57, '1', 'XcOpHkIuA2_1609930489.jpg', NULL, '2021-01-06 06:54:49', NULL),
(44, 57, '1', 'aKM6AXnWUC_1609930502.jpg', NULL, '2021-01-06 06:55:02', NULL),
(45, 57, '1', 'UNvzxuxBAA_1609930512.jpg', NULL, '2021-01-06 06:55:12', NULL),
(46, 57, '1', 'MIwRfFJcur_1609930522.jpg', NULL, '2021-01-06 06:55:22', NULL),
(47, 57, '1', 'XJD0db2DMe_1609930534.jpg', NULL, '2021-01-06 06:55:34', NULL),
(48, 57, '1', 'PAkZzUKxqR_1610036558.jpg', NULL, '2021-01-07 12:22:38', NULL),
(49, 57, '1', 'rBBbrMSJNU_1610036594.jpg', NULL, '2021-01-07 12:23:14', NULL),
(50, 51, '1', 'CeuSkvH3sS_1610556856.jpg', NULL, '2021-01-13 12:54:16', NULL),
(51, 51, '1', 'fbtPc1HAkp_1610556865.jpg', NULL, '2021-01-13 12:54:25', NULL),
(52, 51, '1', 'erUK7lsooy_1610556878.jpg', NULL, '2021-01-13 12:54:38', NULL),
(53, 51, '1', '3abM102NOY_1611164060.jpg', NULL, '2021-01-20 13:34:20', NULL),
(54, 51, '1', 'r4k3pjU6L6_1611412861.jpg', NULL, '2021-01-23 10:41:01', NULL),
(55, 51, '2', 'SMYNozw6M4_1611757541.MOV', 'SMYNozw6M4_1611757541.png', '2021-01-27 10:25:41', NULL),
(56, 49, '1', 'oY5yU6LHuc_1611958297.jpg', NULL, '2021-01-29 18:11:37', NULL),
(57, 49, '1', '9bI3qEjH85_1611958309.jpg', NULL, '2021-01-29 18:11:49', '2021-01-29 18:12:13'),
(58, 49, '1', 'UQzGHqODd4_1611958344.jpg', NULL, '2021-01-29 18:12:24', NULL),
(59, 68, '2', 'ympJyPnPPX_1614842045.MOV', 'ympJyPnPPX_1614842045.png', '2021-03-04 03:14:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_ratings`
--

CREATE TABLE `vendor_ratings` (
  `vendor_rating_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `vendor_id` int UNSIGNED NOT NULL,
  `appointment_id` int UNSIGNED DEFAULT NULL,
  `rating` int UNSIGNED NOT NULL,
  `review` varchar(225) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vendor_ratings`
--

INSERT INTO `vendor_ratings` (`vendor_rating_id`, `user_id`, `vendor_id`, `appointment_id`, `rating`, `review`, `created_at`, `deleted_at`) VALUES
(23, 28, 20, 6, 4, 'ertert', '2020-12-25 07:38:53', NULL),
(24, 28, 20, 5, 4, 'retert', '2020-12-25 07:39:26', NULL),
(25, 28, 20, 4, 3, 'edwqwqe', '2020-12-25 08:09:23', NULL),
(26, 28, 20, 20, 5, 'Ndhsnd', '2020-12-28 01:49:29', NULL),
(27, 28, 20, 32, 5, 'asasas', '2020-12-28 03:18:31', NULL),
(28, 28, 20, 57, 5, 'aaasas', '2020-12-30 03:35:53', NULL),
(29, 28, 20, 60, 5, 'Ok', '2021-01-13 08:14:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_services`
--

CREATE TABLE `vendor_services` (
  `vendor_service_id` int UNSIGNED NOT NULL,
  `vendor_id` int UNSIGNED NOT NULL,
  `service_for` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1=men,2=women',
  `category_id` int UNSIGNED NOT NULL,
  `service_name` varchar(225) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `service_name_ar` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin,
  `description_ar` text CHARACTER SET utf8 COLLATE utf8_bin,
  `service_image` varchar(255) DEFAULT NULL,
  `service_cost` int DEFAULT '0',
  `booking_amount` int DEFAULT '0',
  `rate` decimal(10,2) NOT NULL,
  `time_slots` varchar(225) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_services`
--

INSERT INTO `vendor_services` (`vendor_service_id`, `vendor_id`, `service_for`, `category_id`, `service_name`, `service_name_ar`, `description`, `description_ar`, `service_image`, `service_cost`, `booking_amount`, `rate`, `time_slots`, `created_at`, `deleted_at`) VALUES
(12, 20, '1', 4, 'Ahh', NULL, NULL, NULL, 'ZeajjuiMzQ_1604654842.jpg', 12, 12, 12.00, NULL, '2020-11-06 04:27:22', '2020-11-21 06:51:45'),
(13, 20, '1', 3, 'Service 1', NULL, NULL, NULL, 'jEXGMBIjMD_1604738061.jpg', 123, 123, 123.00, NULL, '2020-11-07 03:34:21', '2020-11-02 23:00:00'),
(18, 20, '1', 4, 'Saloon', NULL, NULL, NULL, '8gCLRXw186_1605866783.jpg', 62, 62, 61.60, NULL, '2020-11-20 05:06:23', '2020-12-30 03:06:10'),
(19, 20, '2', 2, 'Beauty', NULL, NULL, NULL, 'T4vqvCQ8yk_1606305251.jpg', 110, 110, 110.00, NULL, '2020-11-25 06:54:11', '2020-12-24 05:04:04'),
(25, 20, '2', 3, 'Hair red color', NULL, NULL, NULL, '5CpRviqKHc_1607408032.jpg', 55, 55, 55.00, NULL, '2020-12-08 01:13:52', '2020-12-30 03:07:44'),
(26, 20, '2', 5, 'Nail colour', NULL, NULL, NULL, 'tgdgHWLGi7_1607408404.jpg', 110, 110, 110.00, NULL, '2020-12-08 01:20:04', '2020-12-24 05:04:00'),
(27, 20, '1', 2, 'Hair cuting', 'قص الشعر', NULL, NULL, 'ap8etRIy0e_1607681899.jpg', 209, 209, 209.00, NULL, '2020-12-11 05:18:19', '2020-12-30 03:08:54'),
(28, 20, '1', 3, 'Hair was', NULL, NULL, NULL, '7JGFDvXK7f_1607938175.jpg', 219, 219, 218.90, NULL, '2020-12-14 04:29:35', '2020-12-30 03:04:59'),
(32, 20, '2', 5, 'Facail plus hair wash', NULL, 'test des', NULL, 'VvmPQbDNbi_1608553544.jpg', 731, 731, 730.59, NULL, '2020-12-15 08:09:29', '2020-12-30 03:02:23'),
(35, 20, '2', 3, 'Nali palish', NULL, NULL, NULL, '1MsLEfUbB8_1608272130.jpg', 230, 230, 229.90, NULL, '2020-12-18 01:15:30', '2020-12-29 08:43:07'),
(36, 20, '2', 3, 'Aakash Service', NULL, 'Lorem inspem', NULL, 'BdKsL5qYTu_1608549234.jpg', 5000, 550, 6050.00, NULL, '2020-12-21 06:06:35', '2020-12-29 08:43:22'),
(37, 20, '2', 5, 'Face  massage', NULL, 'Hhdbd', NULL, 'G4VeDDjEUl_1608623220.jpg', 200, 200, 200.00, NULL, '2020-12-22 02:46:16', '2020-12-28 04:27:54'),
(38, 44, '2', 11, 'Lips', NULL, NULL, NULL, 'BJ9A9r5QIk_1608636990.jpg', 99, 99, 99.00, NULL, '2020-12-22 06:36:30', NULL),
(39, 44, '2', 3, '???', NULL, 'للشعر', NULL, 'krZbdCqZJX_1608637782.jpg', 143, 143, 143.00, NULL, '2020-12-22 06:49:42', NULL),
(40, 20, '2', 9, 'Scgh', NULL, 'xdcsadsa', NULL, 'SL4965Kl6Y_1608802693.jpg', 5000, 5000, 5000.00, NULL, '2020-12-24 04:38:13', '2020-12-28 00:12:01'),
(41, 44, '2', 4, 'Gggg', NULL, 'Gfrrrr', NULL, 'PAGEQCoacV_1609012021.jpg', 220, 220, 220.00, NULL, '2020-12-26 14:47:01', NULL),
(42, 49, '2', 5, 'null', 'مكياج', 'Makeup', 'تجميل فوري تنتبللاتنتبيقفل', 'EhVNKMXxFM_1609166150.jpg', 200, 200, 200.00, NULL, '2020-12-28 09:35:50', '2021-01-29 17:33:49'),
(43, 49, '2', 20, 'مكياج', 'مكياج', NULL, NULL, 'rYxNu5oGgH_1609166158.jpg', 150, 150, 150.00, NULL, '2020-12-28 09:35:58', '2021-01-29 17:34:03'),
(44, 20, '1', 10, 'Ambuj test', NULL, 'Tresgsh', NULL, 'sRWXrmz9xM_1609312885.jpg', 125, 125, 125.00, NULL, '2020-12-30 02:21:25', '2020-12-30 02:56:45'),
(45, 20, '1', 11, 'Chetan test', NULL, 'Drt', NULL, 'hflFIRBTlx_1609313037.jpg', 300, 300, 300.00, NULL, '2020-12-30 02:23:57', '2020-12-30 02:56:38'),
(46, 20, '1', 3, 'Me akala hu arabic7h', 'ArabicHair cut by sharc', 'Me akala hu', 'أنا أكالا هو', 'wQYcWdI3oK_1609316647.jpg', 1, 1, 1.00, NULL, '2020-12-30 03:24:07', NULL),
(47, 20, '1', 3, 'Sjsh', NULL, 'Hshsh', NULL, 'LLCYSjPQ9U_1609316731.jpg', 45, 45, 45.00, NULL, '2020-12-30 03:25:31', '2020-12-30 23:51:33'),
(48, 20, '1', 5, 'DND', NULL, 'Uwuwhs', NULL, '7Hlh1l0pW9_1609316779.jpg', 67, 67, 67.00, NULL, '2020-12-30 03:26:19', '2020-12-31 00:12:22'),
(49, 52, '2', 3, 'G', NULL, NULL, NULL, '2ToANAQvkH_1609327661.jpg', 45, 45, 45.00, NULL, '2020-12-30 06:27:41', NULL),
(50, 56, '2', 1, 'حواجب', NULL, 'Gggggggggggg', NULL, 'VhILaNjJ2B_1609410149.jpg', 150, 150, 150.00, NULL, '2020-12-31 05:22:29', NULL),
(51, 57, '2', 5, 'مكياج', NULL, NULL, NULL, 'HzHfZFYbeu_1609930234.jpg', 300, 300, 300.00, NULL, '2021-01-06 05:50:34', NULL),
(52, 57, '2', 1, 'حواجب', NULL, 'Bffjiitedgutrtu', NULL, 'DSQTg34FKM_1609930322.jpg', 200, 200, 200.00, NULL, '2021-01-06 05:52:02', NULL),
(53, 57, '2', 4, 'شعر', NULL, 'Vfstyhhfrfgg', NULL, 'YwIxEDJb7G_1609930363.jpg', 140, 140, 140.00, NULL, '2021-01-06 05:52:43', NULL),
(54, 57, '2', 3, 'توصيلات', NULL, 'Vfrrghuuyfrrfggg', NULL, 'MKvQ8LQDY8_1609930400.jpg', 180, 180, 180.00, NULL, '2021-01-06 05:53:20', NULL),
(55, 20, '2', 3, 'New', NULL, 'Dhvdh', NULL, 'xauhqUcHOR_1610083642.jpg', 400, 400, 400.00, NULL, '2021-01-08 00:27:22', '2021-01-21 05:35:13'),
(56, 20, '1', 3, 'فاذا صحوت فانت اول خاطري و اذا غفا جفني فانت الاخر', NULL, 'فاذا صحوت فانت اول خاطري و اذا غفا جفني فانت الاخر', NULL, 'nUvW71EeXd_1610363471.jpg', 12, 12, 12.00, NULL, '2021-01-11 06:11:11', '2021-01-13 06:52:39'),
(57, 20, '2', 4, 'Face clienning', 'قص الشعر', 'Hdhd', 'باارردفقفمكو ققفغعتتععغفقققققققققفففققققققققققثثثثثثقق', 'DWmebpDScL_1610540752.jpg', 122, 122, 122.00, NULL, '2021-01-13 07:25:23', NULL),
(58, 51, '2', 1, 'حواجب', 'Eyebrows', 'Fhjnhgttfgggtttggggrrdfhjjbgfdrrreddfyjk dfghgdd  the km  by dry un ngffyhjbgyyggggccffr', 'باارردفقفمكو ققفغعتتععغفقققققققققفففققققققققققثثثثثثققلاتزال افلاته ففتنهغلل غفاتاقفت فغنتاقفا', 'tYkIrWkIH9_1610556792.jpg', 90, 90, 90.00, NULL, '2021-01-13 11:53:12', NULL),
(59, 51, '2', 22, 'ااففغالثثفاتنننت', 'اللغتاببيلععت', 'Nails ghhgttgggffftffvvfdderrtjkmbgggybbgffddr', 'اعهناففغعممرلقفغالييسثثثل ففانككمت لغعنمىالغعع', '9a9SjEtSyS_1611164382.jpg', 70, 70, 70.00, NULL, '2021-01-20 12:39:42', NULL),
(60, 20, '1', 4, 'Face massage', 'تدليك الشعر', 'dasd english', 'sdasd arabic', 'zR8f5RblQH_1611225482.jpg', 250, 250, 250.00, NULL, '2021-01-21 05:38:02', NULL),
(61, 20, '2', 3, 'Sbhebdb', 'Ahhshs     arabic', 'translations in context of English words, expressions and idioms; a free English-Arabic dictionary with millions of examples of use.', 'الترجمات في سياق الكلمات والتعبيرات والتعابير الإنجليزية ؛ قاموس إنجليزي عربي مجاني يحتوي على ملايين أمثلة الاستخدام.', '32Ody1vLnL_1611230551.jpg', 799, 799, 799.00, NULL, '2021-01-21 07:02:31', NULL),
(63, 20, '1', 2, 'Test ambuj english', 'Test ambuj arabic', 'Description English', 'Description arabic', 'YjWFvDZa44_1611231299.jpg', 120, 120, 120.00, NULL, '2021-01-21 07:14:59', NULL),
(64, 20, '1', 3, 'Body message english', 'Body message arbic', 'Body message description english', 'Body message description', 'ecV8KO9lqx_1611308751.jpg', 120, 120, 120.00, NULL, '2021-01-22 04:45:51', NULL),
(65, 20, '1', 5, 'Hair cut English', 'Hair cut arabic', 'Description English', 'Description Arabic', '0DPiBc83Rr_1611732543.jpg', 125, 125, 125.00, NULL, '2021-01-27 02:29:03', NULL),
(66, 51, '2', 9, 'Tattoos', 'وشم', 'Doing tattoos', 'عمل وشم حتى الجسم بالرسم اليدوي', 'qGCJ22JTJb_1611763187.jpg', 240, 240, 240.00, NULL, '2021-01-27 10:59:47', NULL),
(67, 68, '1', 3, 'Gshsb', 'Hsvsb', 'Gshs', NULL, 'h39qCE9F9T_1614841981.jpg', 120, 120, 120.00, NULL, '2021-03-04 03:13:01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `app_ratings`
--
ALTER TABLE `app_ratings`
  ADD PRIMARY KEY (`app_rating_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`commission_id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`day_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `favourite_vendors`
--
ALTER TABLE `favourite_vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`support_id`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`transaction_history_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_days`
--
ALTER TABLE `vendor_days`
  ADD PRIMARY KEY (`vendor_day_id`);

--
-- Indexes for table `vendor_portfolios`
--
ALTER TABLE `vendor_portfolios`
  ADD PRIMARY KEY (`vendor_portfolio_id`);

--
-- Indexes for table `vendor_ratings`
--
ALTER TABLE `vendor_ratings`
  ADD PRIMARY KEY (`vendor_rating_id`);

--
-- Indexes for table `vendor_services`
--
ALTER TABLE `vendor_services`
  ADD PRIMARY KEY (`vendor_service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `app_ratings`
--
ALTER TABLE `app_ratings`
  MODIFY `app_rating_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `commission_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `day_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `document_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `favourite_vendors`
--
ALTER TABLE `favourite_vendors`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `supports`
--
ALTER TABLE `supports`
  MODIFY `support_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `transaction_history_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `vendor_days`
--
ALTER TABLE `vendor_days`
  MODIFY `vendor_day_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=498;

--
-- AUTO_INCREMENT for table `vendor_portfolios`
--
ALTER TABLE `vendor_portfolios`
  MODIFY `vendor_portfolio_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `vendor_ratings`
--
ALTER TABLE `vendor_ratings`
  MODIFY `vendor_rating_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `vendor_services`
--
ALTER TABLE `vendor_services`
  MODIFY `vendor_service_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
