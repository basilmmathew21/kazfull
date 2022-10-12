-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 03, 2020 at 08:05 AM
-- Server version: 10.1.40-MariaDB-cll-lve
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
-- Database: `bmatesde_karzoolv1`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `name_somali` varchar(250) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `address` text,
  `lattitude` text,
  `longitude` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`, `name_somali`, `country_id`, `city_id`, `email`, `phone`, `address`, `lattitude`, `longitude`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Indus', 'Indus Somali', 19, 2, '', NULL, 'address', NULL, NULL, 1, '2019-09-17 12:32:27', '2019-09-17 12:32:27'),
(8, 'E V M', 'E V M', 19, 2, 'basil.mathew@b-mates.com', '7896547854', 'Test Kerala,India', '36.11491058468264', '58.96626708984375', 1, '2019-09-17 11:38:53', '2019-10-28 09:41:45'),
(11, 'Karzool', 'karzool', 19, 4, 'karzool@b-mates.com', '8051212322', 'Test address to be appeared.', '37.11491058468264', '59.96626708984375', 1, '2019-09-18 08:34:52', '2019-10-28 09:39:34'),
(13, 'Nissan', 'Nissan', 19, 4, 'nissan@gmail.com', '8579685412', 'Nissan India Pvt Ltd', '38.11491058468264', '60.96626708984375', 1, '2019-10-28 09:43:26', '2019-10-28 09:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `branch_brands`
--

CREATE TABLE `branch_brands` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_brands`
--

INSERT INTO `branch_brands` (`id`, `branch_id`, `brand_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 12, 10, 1, '2019-09-18 03:12:15', '2019-09-18 03:12:15'),
(2, 12, 7, 1, '2019-09-18 03:12:15', '2019-09-18 03:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `car_bodytype`
--

CREATE TABLE `car_bodytype` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `name_somali` varchar(250) NOT NULL,
  `icon` varchar(500) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_bodytype`
--

INSERT INTO `car_bodytype` (`id`, `name`, `name_somali`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Coupe', 'Coupe', 'flag-1572263132.jpg', 1, '2019-09-09 12:18:49', '2019-10-28 11:45:32'),
(8, 'Sportz', 'Sportz', 'flag-1572262975.jpg', 1, '2019-09-09 12:26:05', '2019-10-28 11:42:55'),
(9, 'Sedan', 'Sedan', 'flag-1572263047.jpg', 1, '2019-09-13 09:44:55', '2019-10-28 11:44:07');

-- --------------------------------------------------------

--
-- Table structure for table `car_brand`
--

CREATE TABLE `car_brand` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `name_somali` varchar(250) DEFAULT NULL,
  `icon` varchar(500) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_brand`
--

INSERT INTO `car_brand` (`id`, `name`, `name_somali`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(13, 'BMW', 'BMW', '1572263425.png', 1, '2019-09-13 07:23:39', '2019-10-28 11:50:37'),
(15, 'Honda', 'Honda', '1572263391.png', 1, '2019-09-13 07:32:47', '2019-10-28 11:49:56'),
(16, 'Buick', 'Buick', '1572263620.png', 1, '2019-09-13 08:15:11', '2019-10-28 11:53:43'),
(17, 'GM', 'GM', '1572263587.png', 1, '2019-10-22 09:11:22', '2019-10-28 11:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `car_color`
--

CREATE TABLE `car_color` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `name_somali` varchar(250) NOT NULL,
  `icon_color` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_color`
--

INSERT INTO `car_color` (`id`, `name`, `name_somali`, `icon_color`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Red ceramic', 'Red ceramic', 'f88c50', 1, '2019-09-12 09:56:22', '2019-11-29 10:43:05'),
(2, 'Yellow', 'Yellow', '63ffab', 1, '2019-09-13 08:43:37', '2019-11-29 10:44:50'),
(3, 'Black', 'Black', '3a5d74', 1, '2019-09-13 08:44:24', '2019-11-29 10:44:22');

-- --------------------------------------------------------

--
-- Table structure for table `car_features`
--

CREATE TABLE `car_features` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `name_somali` varchar(250) NOT NULL,
  `icon` varchar(500) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_features`
--

INSERT INTO `car_features` (`id`, `name`, `name_somali`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(12, 'Utility', 'Utility', 'icon-1572264562.jpg', 1, '2019-09-12 06:36:45', '2019-10-28 12:09:22'),
(13, 'ABS', 'ABS', 'icon-1572264545.jpg', 1, '2019-09-12 06:51:37', '2019-10-28 12:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `car_fuel`
--

CREATE TABLE `car_fuel` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `name_somali` varchar(250) NOT NULL,
  `icon` varchar(500) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_fuel`
--

INSERT INTO `car_fuel` (`id`, `name`, `name_somali`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Petrol', 'Petrol', 'icon-1572264089.jpg', 1, '2019-09-09 12:26:05', '2019-10-28 12:01:29'),
(11, 'Diesel', 'Diesel', 'icon-1572264073.jpg', 1, '2019-09-12 05:59:11', '2019-10-28 12:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `car_type`
--

CREATE TABLE `car_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_in_somali` varchar(255) NOT NULL,
  `car_body_type` int(11) NOT NULL,
  `cost_min_charge` float(10,2) DEFAULT NULL,
  `km_charge` float(10,2) DEFAULT NULL,
  `cost_per_min` float(10,2) DEFAULT NULL,
  `min_fare` float(10,2) DEFAULT NULL,
  `rider_no_show_fee` float(10,2) DEFAULT NULL,
  `customer_cancellation_charge` float(10,2) DEFAULT NULL,
  `min_waiting_charge` float(10,2) DEFAULT NULL,
  `min_waiting_time` int(11) DEFAULT NULL,
  `waiting_charge` float(10,2) DEFAULT NULL,
  `icon` varchar(500) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_type`
--

INSERT INTO `car_type` (`id`, `name`, `name_in_somali`, `car_body_type`, `cost_min_charge`, `km_charge`, `cost_per_min`, `min_fare`, `rider_no_show_fee`, `customer_cancellation_charge`, `min_waiting_charge`, `min_waiting_time`, `waiting_charge`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(5, 'MAX', 'MAX', 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'icon-1577972951.png', 1, '2020-01-02 13:49:11', '2020-01-02 13:49:11'),
(6, 'VIP', 'VIP', 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'icon-1577972978.png', 1, '2020-01-02 13:49:38', '2020-01-02 13:49:38'),
(7, 'STANDARD', 'STANDARD', 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'icon-1577973031.png', 1, '2020-01-02 13:50:31', '2020-01-02 13:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `name_somali` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `country_id`, `name`, `name_somali`, `status`, `created_at`, `updated_at`) VALUES
(2, 19, 'illios', 'illios somali', 1, '2019-09-09 09:48:50', '2019-09-20 05:49:41'),
(4, 19, 'Chickago', 'Chickago somali', 1, '2019-09-09 10:26:14', '2019-09-20 05:49:22'),
(5, 20, 'Ernakulam', 'Ernakulam', 1, '2019-09-20 05:50:14', '2019-09-20 05:50:14'),
(6, 21, 'Riyadh', 'Riyadh', 1, '2020-02-08 13:08:51', '2020-02-08 13:08:51'),
(7, 21, 'Jiddah', 'Jiddah', 1, '2020-02-08 13:09:04', '2020-02-08 13:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `commision`
--

CREATE TABLE `commision` (
  `id` int(11) NOT NULL,
  `amount` mediumint(9) NOT NULL,
  `percentage` smallint(6) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commision`
--

INSERT INTO `commision` (`id`, `amount`, `percentage`, `status`, `created_at`, `updated_at`) VALUES
(1, 1001, 31, 1, '2019-09-12 16:28:49', '2019-10-16 05:08:14');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `sender_name` varchar(500) NOT NULL,
  `sender_email` varchar(500) NOT NULL,
  `mobile_number` varchar(25) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `country_id`, `sender_name`, `sender_email`, `mobile_number`, `message`, `created_at`, `updated_at`) VALUES
(1, 0, 'Basil', 'basil.mathew@b-mates.com', NULL, 'Test', '2019-12-03 06:53:55', '2019-12-03 06:53:55'),
(2, 0, 'Basil', 'basil.mathew@b-mates.com', NULL, 'Test', '2019-12-03 06:57:19', '2019-12-03 06:57:19'),
(3, 0, 'Basil', 'basil.mathew@b-mates.com', NULL, 'Test', '2019-12-06 06:39:03', '2019-12-06 06:39:03'),
(4, 0, 's', 'shebin@lasts.com', NULL, 'S', '2019-12-12 16:42:00', '2019-12-12 16:42:00'),
(5, 0, 'Basil', 'basil.mathew@b-mates.com', NULL, 'Test', '2019-12-12 16:44:03', '2019-12-12 16:44:03'),
(6, 0, 'did', 'shebin@2llasya.ccom', NULL, 'Sdsd', '2019-12-12 16:46:40', '2019-12-12 16:46:40'),
(7, 0, 'get', 'he@did.com', NULL, 'Gehey', '2019-12-14 13:50:45', '2019-12-14 13:50:45'),
(8, 0, 'Basil', 'basil.mathew@b-mates.com', NULL, 'Test', '2019-12-15 06:48:48', '2019-12-15 06:48:48'),
(9, 21, 'Basil', 'basil.mathew@b-mates.com', '7356544516', 'Test', '2019-12-17 04:57:21', '2019-12-17 04:57:21'),
(10, 21, 'Basil', 'basil.mathew@b-mates.com', '7356544516', 'Test', '2019-12-17 04:57:28', '2019-12-17 04:57:28'),
(11, 21, 'Basil', 'basil.mathew@b-mates.com', '7356544516', 'Test', '2019-12-17 04:57:29', '2019-12-17 04:57:29'),
(12, 21, 'Basil', 'basil.mathew@b-mates.com', '7356544516', 'Test', '2019-12-17 05:00:29', '2019-12-17 05:00:29'),
(13, 21, 'Basil', 'basil.mathew@b-mates.com', '7356544516', 'Test', '2019-12-17 05:03:42', '2019-12-17 05:03:42'),
(14, 20, 'yet', 'she@test.com', 'Sesds', 'Sesds', '2019-12-19 06:56:17', '2019-12-19 06:56:17'),
(15, 21, 'Test 2', 'basil-mathew@b-mates.com', '985689755', 'this is test from mobile', '2019-12-19 07:34:58', '2019-12-19 07:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `name_somali` varchar(250) DEFAULT NULL,
  `flag` varchar(250) DEFAULT NULL,
  `c_code` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `name_somali`, `flag`, `c_code`, `status`, `created_at`, `updated_at`) VALUES
(20, 'Somali', 'Somali', 'flag-1568368497.jpg', '+252', 1, '2019-09-12 07:10:14', '2019-12-19 07:08:35'),
(21, 'Saudi Arabia', 'Soudi Arabia', 'flag-1575739027.jpg', '+966', 1, '2019-12-07 17:17:08', '2019-12-07 17:17:08'),
(22, 'United Kingdom', 'United Kingdom', NULL, '+44', 1, '2019-12-21 17:00:19', '2019-12-21 17:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `country_id`, `currency`, `status`, `created_at`, `updated_at`) VALUES
(1, 19, '$', 1, '2019-10-16 05:49:36', '2019-10-16 06:00:42'),
(3, 20, '$', 1, '2019-10-16 06:00:53', '2019-12-19 07:08:56'),
(4, 21, 'SAR', 1, '2019-12-19 07:08:13', '2019-12-19 07:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `name_somali` varchar(250) DEFAULT NULL,
  `gender` tinyint(1) NOT NULL COMMENT '1-Male,0-Female',
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `address` text,
  `status` int(11) NOT NULL DEFAULT '2' COMMENT '1-active,2-pending,3-deactive,4- Need Approval, 5 - Approved',
  `is_varified` tinyint(1) DEFAULT NULL COMMENT '0- Not Verified, 1- Verified ',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `name`, `name_somali`, `gender`, `country_id`, `city_id`, `email`, `phone`, `address`, `status`, `is_varified`, `created_at`, `updated_at`) VALUES
(3, 'Jipthen', 'Jipthen', 1, 19, 4, 'jipthen@yahoo.com', '8051212322', 'Illios Us, State', 5, 1, '2019-09-20 12:08:40', '2019-11-28 12:32:27'),
(19, 'Karzool', 'Saudi sdsd  ss', 0, 20, 5, 'basil.mathew@b-mates.com', '8051212322', 'aahghmdi@b-mates.com, shidhin@b-mates.com, hr@b-mates.com', 2, 1, '2019-09-26 12:08:47', '2019-12-02 06:14:28'),
(20, 'Basil M Mathew', 'basil somali', 1, 19, 4, 'basilmm@gmail15.com', '225564522', 'bba', 2, NULL, '2020-01-01 09:26:22', '2020-01-01 09:26:22'),
(21, 'Basil M Mathew', 'basil somali', 1, 19, 4, 'basilmm@gmail15.com', '225564522', 'bba', 2, NULL, '2020-01-01 10:40:29', '2020-01-01 10:40:29'),
(22, 'Basil M Mathew', 'basil somali', 1, 21, 4, 'basilmm@gmail15.com', '225564522', 'bba', 2, NULL, '2020-01-01 10:44:16', '2020-01-01 10:44:16'),
(23, 'Basil M Mathew', 'basil somali', 1, 21, 4, 'basilmm@gmail15.com', '225564522', 'bba', 2, NULL, '2020-01-01 10:47:33', '2020-01-01 10:47:33'),
(24, 'ghhgnbvg', NULL, 1, 21, 4, 'basilmm@gmail15.com', '225564522', 'bba', 2, NULL, '2020-01-30 11:46:31', '2020-01-30 11:46:31'),
(25, 'Basil M Mathew', NULL, 1, 21, 4, 'basilmm@gmail15.com', '225564522', 'bba', 2, NULL, '2020-02-08 12:10:46', '2020-02-08 12:10:46'),
(26, 'SHIDHIN', NULL, 1, 21, 4, 'basilmm@gmail15.com', '123123123', 'bba', 2, 1, '2020-02-08 13:35:26', '2020-02-08 13:36:34'),
(27, 'SHIDHIN', NULL, 1, 21, 4, 'basilmm@gmail15.com', '123123123', 'bba', 2, 1, '2020-02-08 13:35:31', '2020-02-08 13:36:30'),
(28, 'SHIDHIN', NULL, 1, 21, 4, 'ashid@gmail15.com', '123123123', 'bba', 2, 1, '2020-02-08 13:35:41', '2020-02-08 13:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `driver_info`
--

CREATE TABLE `driver_info` (
  `id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `driving_licence` varchar(500) DEFAULT NULL,
  `vehicle_number` varchar(500) DEFAULT NULL,
  `insurance` varchar(500) DEFAULT NULL,
  `id_proof` varchar(500) DEFAULT NULL,
  `address_proof` varchar(500) DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `profile_picture` varchar(500) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_info`
--

INSERT INTO `driver_info` (`id`, `driver_id`, `driving_licence`, `vehicle_number`, `insurance`, `id_proof`, `address_proof`, `photo`, `profile_picture`, `created_at`, `updated_at`) VALUES
(2, 3, 'licence-1572256157.jpg', 'vehicle_number-1572256157.jpg', 'insurance-1572256157.jpg', 'id_proof-1572256157.jpg', 'address_proof-1572256157.jpg', 'photo-1572256157.jpg', 'profile_picture-1572256157.jpg', '2019-09-20 12:08:41', '2019-10-28 09:49:17'),
(10, 19, 'licence-1571210543.jpg', 'vehicle_number-1571210543.jpg', 'insurance-1571210543.jpg', 'id_proof-1571210543.jpg', 'address_proof-1572513288.jpg', NULL, 'profile_picture-1576744451.jpg', '2019-09-26 12:08:47', '2019-12-19 08:34:12'),
(11, 20, NULL, 'vehicle_number-1577870782.jpg', NULL, NULL, NULL, NULL, NULL, '2020-01-01 09:26:22', '2020-01-01 09:26:22'),
(12, 21, NULL, 'vehicle_number-1577875229.jpg', NULL, NULL, NULL, NULL, NULL, '2020-01-01 10:40:29', '2020-01-01 10:40:29'),
(13, 22, NULL, 'vehicle_number-1577875456.jpg', NULL, NULL, NULL, NULL, NULL, '2020-01-01 10:44:16', '2020-01-01 10:44:16'),
(14, 23, NULL, 'vehicle_number-1577875653.jpg', NULL, NULL, NULL, NULL, NULL, '2020-01-01 10:47:33', '2020-01-01 10:47:33'),
(15, 24, NULL, 'vehicle_number-1580384792.jpg', NULL, NULL, NULL, NULL, NULL, '2020-01-30 11:46:32', '2020-01-30 11:46:32'),
(16, 25, NULL, 'vehicle_number-1581163846.jpg', NULL, NULL, NULL, NULL, NULL, '2020-02-08 12:10:46', '2020-02-08 12:10:46'),
(17, 26, NULL, 'vehicle_number-1581168926.jpg', NULL, NULL, NULL, NULL, NULL, '2020-02-08 13:35:26', '2020-02-08 13:35:26'),
(18, 27, NULL, 'vehicle_number-1581168931.jpg', NULL, NULL, NULL, NULL, NULL, '2020-02-08 13:35:31', '2020-02-08 13:35:31'),
(19, 28, NULL, 'vehicle_number-1581168941.jpg', NULL, NULL, NULL, NULL, NULL, '2020-02-08 13:35:41', '2020-02-08 13:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `driver_vehicle_info`
--

CREATE TABLE `driver_vehicle_info` (
  `id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `car_body_type` int(11) NOT NULL,
  `car_brand` int(11) NOT NULL,
  `car_color` int(11) NOT NULL,
  `car_fuel` int(11) NOT NULL,
  `vehicle_number` text NOT NULL,
  `vehicle_name` varchar(500) NOT NULL,
  `driving_issue` date NOT NULL,
  `driving_expiry` date NOT NULL,
  `vehicle_issue` date NOT NULL,
  `vehicle_expiry` date NOT NULL,
  `insurance_issue` date NOT NULL,
  `insurance_expiry` date NOT NULL,
  `id_issue` date NOT NULL,
  `id_expiry` date NOT NULL,
  `address_issue` date NOT NULL,
  `address_expiry` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_vehicle_info`
--

INSERT INTO `driver_vehicle_info` (`id`, `driver_id`, `car_body_type`, `car_brand`, `car_color`, `car_fuel`, `vehicle_number`, `vehicle_name`, `driving_issue`, `driving_expiry`, `vehicle_issue`, `vehicle_expiry`, `insurance_issue`, `insurance_expiry`, `id_issue`, `id_expiry`, `address_issue`, `address_expiry`, `created_at`, `updated_at`) VALUES
(3, 3, 8, 13, 1, 11, '12', 'BMW S Series', '2019-09-26', '2019-09-18', '2019-09-25', '2019-09-26', '2019-09-26', '2019-09-27', '2019-09-25', '2019-09-26', '2019-09-27', '2019-09-28', '2019-09-24 09:23:26', '2019-09-24 09:23:26'),
(5, 19, 7, 15, 3, 8, '154689', '1879654', '2019-09-20', '2019-09-21', '2019-09-22', '2019-09-23', '2019-09-24', '2019-09-25', '2019-09-26', '2019-09-27', '2019-09-28', '2019-09-29', '2019-09-26 12:08:47', '2019-11-25 11:48:29'),
(6, 20, 5, 6, 7, 8, '123', '1', '2020-01-12', '2020-01-13', '2020-01-14', '2020-01-15', '2020-01-16', '2020-01-17', '2020-01-18', '2020-01-19', '2020-01-20', '2020-01-21', '2020-01-01 09:26:22', '2020-01-01 09:26:22'),
(7, 21, 5, 6, 7, 8, '123', '1', '2020-01-12', '2020-01-13', '2020-01-14', '2020-01-15', '2020-01-16', '2020-01-17', '2020-01-18', '2020-01-19', '2020-01-20', '2020-01-21', '2020-01-01 10:40:29', '2020-01-01 10:40:29'),
(8, 22, 5, 6, 7, 8, '123', '1', '2020-01-12', '2020-01-13', '2020-01-14', '2020-01-15', '2020-01-16', '2020-01-17', '2020-01-18', '2020-01-19', '2020-01-20', '2020-01-21', '2020-01-01 10:44:16', '2020-01-01 10:44:16'),
(9, 23, 5, 6, 7, 8, '123', '1', '2020-01-12', '2020-01-13', '2020-01-14', '2020-01-15', '2020-01-16', '2020-01-17', '2020-01-18', '2020-01-19', '2020-01-20', '2020-01-21', '2020-01-01 10:47:33', '2020-01-01 10:47:33'),
(10, 24, 5, 6, 7, 8, '123', '1', '2020-01-12', '2020-01-13', '2020-01-14', '2020-01-15', '2020-01-16', '2020-01-17', '2020-01-18', '2020-01-19', '2020-01-20', '2020-01-21', '2020-01-30 11:46:32', '2020-01-30 11:46:32'),
(11, 25, 5, 6, 7, 8, '123', '1', '2020-01-12', '2020-01-13', '2020-01-14', '2020-01-15', '2020-01-16', '2020-01-17', '2020-01-18', '2020-01-19', '2020-01-20', '2020-01-21', '2020-02-08 12:10:46', '2020-02-08 12:10:46'),
(12, 26, 5, 6, 7, 8, '123', '1', '2020-01-12', '2020-01-13', '2020-01-14', '2020-01-15', '2020-01-16', '2020-01-17', '2020-01-18', '2020-01-19', '2020-01-20', '2020-01-21', '2020-02-08 13:35:26', '2020-02-08 13:35:26'),
(13, 27, 5, 6, 7, 8, '123', '1', '2020-01-12', '2020-01-13', '2020-01-14', '2020-01-15', '2020-01-16', '2020-01-17', '2020-01-18', '2020-01-19', '2020-01-20', '2020-01-21', '2020-02-08 13:35:31', '2020-02-08 13:35:31'),
(14, 28, 5, 6, 7, 8, '123', '1', '2020-01-12', '2020-01-13', '2020-01-14', '2020-01-15', '2020-01-16', '2020-01-17', '2020-01-18', '2020-01-19', '2020-01-20', '2020-01-21', '2020-02-08 13:35:41', '2020-02-08 13:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE `email_template` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email_type` tinyint(1) DEFAULT NULL,
  `subject` varchar(500) NOT NULL,
  `template_body` text,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`id`, `name`, `email_type`, `subject`, `template_body`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Welcome Template', 1, 'Successfully Registered', '<p>Welcome User.</p>\r\n\r\n<p>You have successfully registered.</p>', 1, '2019-11-08 06:30:21', '2019-12-02 12:06:38'),
(7, 'Reset Password', 2, 'Password Reset Link', '<p>Click here to reset Password.&nbsp;&nbsp;<a href=\"http://karzool.bmatesdemo.com/resetpassword\">here</a></p>', 1, '2019-12-02 12:08:50', '2019-12-02 12:08:50'),
(8, 'Trip Invoice', 3, 'Trip Invoice', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;INVOICE</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Amount :</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Billable :</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Tax :</p>', 1, '2019-12-02 12:11:05', '2019-12-02 12:11:05'),
(9, 'Invoice payment', 4, 'Invoice payment', '<p>This is to confirm that your payment done successfully.</p>\r\n\r\n<p>Thank you for being with us.</p>', 1, '2019-12-02 12:12:19', '2019-12-02 12:12:19');

-- --------------------------------------------------------

--
-- Table structure for table `invitation_times`
--

CREATE TABLE `invitation_times` (
  `id` int(11) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invitation_times`
--

INSERT INTO `invitation_times` (`id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 100.00, 1, '2019-10-14 06:33:13', '2019-10-14 07:07:53'),
(4, 190.00, 1, '2019-10-14 08:34:18', '2019-10-17 05:16:17'),
(5, 200.00, 1, '2019-10-17 05:39:39', '2019-10-17 05:39:39'),
(6, 210.00, 1, '2019-10-17 05:40:09', '2019-10-17 05:40:09');

-- --------------------------------------------------------

--
-- Table structure for table `job_trip`
--

CREATE TABLE `job_trip` (
  `id` int(11) NOT NULL,
  `job_number` text NOT NULL,
  `job_status` tinyint(1) NOT NULL COMMENT '1-Requested,2-Pending,3-Send,4-Accept,5-Cancelled,6- No answer',
  `cancel_reason` varchar(250) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `pickup_lat` varchar(255) NOT NULL,
  `pickup_long` varchar(255) NOT NULL,
  `pickup_addr` varchar(255) NOT NULL,
  `dropoff_lat` varchar(255) NOT NULL,
  `dropoff_long` varchar(255) NOT NULL,
  `dropoff_addr` varchar(255) NOT NULL,
  `car_type_id` int(11) NOT NULL,
  `job_note` text NOT NULL,
  `job_type` tinyint(1) NOT NULL COMMENT '1-New,2-later date',
  `job_time` int(11) NOT NULL,
  `total_km` int(11) NOT NULL,
  `km_charge` float(10,2) NOT NULL,
  `waiting_charge` float(10,2) NOT NULL,
  `discount` float(10,2) NOT NULL,
  `tax` smallint(6) NOT NULL,
  `total_charge` float(10,2) NOT NULL,
  `promotion_id` int(11) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `waiting_time` int(11) NOT NULL,
  `driver_cost` float(10,2) NOT NULL,
  `karzool_cost` float(10,2) NOT NULL,
  `upd_date` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_trip`
--

INSERT INTO `job_trip` (`id`, `job_number`, `job_status`, `cancel_reason`, `customer_id`, `driver_id`, `mid`, `pickup_lat`, `pickup_long`, `pickup_addr`, `dropoff_lat`, `dropoff_long`, `dropoff_addr`, `car_type_id`, `job_note`, `job_type`, `job_time`, `total_km`, `km_charge`, `waiting_charge`, `discount`, `tax`, `total_charge`, `promotion_id`, `payment_method`, `waiting_time`, `driver_cost`, `karzool_cost`, `upd_date`, `status`, `created_at`, `updated_at`) VALUES
(1, '1091', 1, '', 71, 19, 0, '', '', 'Kochi-Dhanushkodi Road, Kolenchery, Kerala 682311, India', '40.4306868', '-111.6503975', 'Kochi-Dhanushkodi Road, Karingachira, Kerala 682311, India', 1, '', 1, 0, 17, 10.00, 10.00, 5.00, 2, 130.00, 2, '', 150, 150.00, 0.00, 0, 0, '2019-09-30 17:32:42', '2019-09-30 17:32:42'),
(2, '1075', 3, 'not well', 71, 19, 71, '', '', '', '', '', '', 2, '', 1, 0, 0, 120.00, 0.00, 0.00, 0, 0.00, 3, '', 0, 120.00, 0.00, 1579254140, 0, '2019-10-15 12:47:47', '2020-01-17 09:42:20'),
(3, '1096', 5, '', 71, 19, 0, '', '', '', '', '', '', 2, '', 2, 0, 0, 0.00, 150.00, 0.00, 0, 170.00, 4, '', 0, 0.00, 0.00, 0, 0, '2019-10-15 12:47:47', '2019-10-15 12:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `job_trip_detail`
--

CREATE TABLE `job_trip_detail` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `accepted_lat` varchar(255) NOT NULL,
  `accepted_long` varchar(255) NOT NULL,
  `accepted_addr` varchar(255) NOT NULL,
  `start_lat` varchar(255) NOT NULL,
  `start_long` varchar(255) NOT NULL,
  `start_addr` varchar(255) NOT NULL,
  `job_route` int(11) NOT NULL,
  `end_lat` varchar(255) NOT NULL,
  `end_long` varchar(255) NOT NULL,
  `end_addr` varchar(255) NOT NULL,
  `trip_start_time` datetime NOT NULL,
  `trip_end_time` datetime NOT NULL,
  `arrival_time` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_trip_detail`
--

INSERT INTO `job_trip_detail` (`id`, `job_id`, `accepted_lat`, `accepted_long`, `accepted_addr`, `start_lat`, `start_long`, `start_addr`, `job_route`, `end_lat`, `end_long`, `end_addr`, `trip_start_time`, `trip_end_time`, `arrival_time`, `created_at`, `updated_at`) VALUES
(1, 1, '', '', '', '', '', '', 0, '', '', '', '2019-10-21 05:00:00', '2019-10-21 06:00:00', '0000-00-00 00:00:00', '2019-10-08 14:53:12', '2019-10-08 14:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `sub_title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `promo_code` varchar(100) NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `title`, `sub_title`, `description`, `image`, `promo_code`, `from_date`, `to_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Test2', 'Sub Title 2', 'Test desc', 'image-1572244469.gif', '12355-65465-54854-54541-12003', '2019-10-25 00:00:00', '2019-10-25 00:00:00', 1, '2019-10-22 11:34:33', '2019-10-28 06:37:51'),
(3, 'Noify', 'Notify 2', 'TEst Desc', 'image-1572244469.gif', '12334-12344-324324-234234-234234', '2019-10-30 00:00:00', '2019-10-30 00:00:00', 1, '2019-10-28 06:33:09', '2019-10-28 06:34:29'),
(4, 'Test 3', 'Test 3', 'Test desc', 'image-1572244469.gif', '21332-13423-34243-53563-24234', '2019-10-30 00:00:00', '2019-10-30 00:00:00', 1, '2019-10-28 09:26:11', '2019-10-28 09:26:11'),
(5, 'tttttttt', 'ststststst', 'hghgchgg hgthc hgvuyj jhvutuyvujtctu jhgvutcvuv j gutcu utcytcujgg ucugjg utcut utcutjucuytu uvut utcutg utcutvjgcutuj utcytcujcutvjjgyuvuvjvgjgg utctcg', 'image-1576949810.jpg', '12546', '2019-12-21 00:00:00', '2020-01-31 00:00:00', 1, '2019-12-21 17:36:50', '2019-12-21 17:36:50'),
(6, 'New Year\'s Discount', 'The cheapest ride you will ever take!', 'The following agents have completed testing with Companies House and are authorised to submit electronic incorporations.\r\n\r\nTerms and Conditions:\r\n\r\n - The promocode is valid until 1st Feb\r\n \r\n- Prizes are not redeemable for cash\r\n\r\n- Points will be credited after January 6', 'image-1577787349.jpg', 'Use (code: W3) on all rides', '2019-12-31 00:00:00', '2020-01-22 00:00:00', 1, '2019-12-31 10:15:50', '2019-12-31 10:15:50');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('basil.mathew@b-mates.com', '$2y$10$6380nt.jO9Ua9U.T8Hki4OPDDimPIYfjfDA1u7aGNMQgzhXT/ebC6', '2019-09-03 03:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `piracy_policy`
--

CREATE TABLE `piracy_policy` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `piracy_policy`
--

INSERT INTO `piracy_policy` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Test4', 'Test4', 1, '2019-11-01 06:25:30', '2019-11-07 11:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `promotion_code` text NOT NULL,
  `promotion_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-Fixed,0-Percentage',
  `discount_amount` float(10,2) DEFAULT NULL,
  `discount_percent` smallint(6) DEFAULT NULL,
  `discount_max_amount` float(10,2) DEFAULT NULL,
  `discount_date_start` datetime NOT NULL,
  `discount_date_end` datetime(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id`, `promotion_code`, `promotion_type`, `discount_amount`, `discount_percent`, `discount_max_amount`, `discount_date_start`, `discount_date_end`, `status`, `created_at`, `updated_at`) VALUES
(2, '380MC9QSOK', 1, 1501.00, 65, 1000.00, '2011-10-20 00:00:00', '2010-10-22 00:00:00.0', 1, '2019-09-28 04:22:42', '2019-09-28 05:14:39'),
(3, '89R8YA77E0', 0, 1450.00, 12, 73.00, '2010-02-21 00:00:00', '2010-02-25 00:00:00.0', 1, '2019-09-28 04:24:22', '2019-09-28 05:14:49'),
(4, '8O8ZWE401X', 1, 55.00, NULL, NULL, '2019-10-16 00:00:00', '2019-10-22 00:00:00.0', 1, '2019-10-14 07:06:40', '2019-10-14 11:17:08'),
(5, 'T3CIWBA9J4.md', 1, 150.00, NULL, NULL, '2019-10-25 00:00:00', '2019-10-28 00:00:00.0', 1, '2019-10-16 05:10:16', '2019-10-16 05:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `rating` tinyint(1) NOT NULL COMMENT 'out of five',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `user_id`, `trip_id`, `description`, `rating`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Lorem ipsum was purposefully designed to have no meaning, but appear like real text, making it the perfect placeholder.', 3, '2019-12-03 06:50:16', '2019-12-03 06:50:16'),
(2, 3, 3, 'nice', 5, '2020-01-20 06:15:55', '2020-01-20 06:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `terms_conditions`
--

CREATE TABLE `terms_conditions` (
  `id` int(11) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms_conditions`
--

INSERT INTO `terms_conditions` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Test 3', 'Test Description3 Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description3Test Description31', 1, '2019-11-01 05:51:41', '2019-11-18 08:20:35'),
(3, 'Test4', 'ji', 0, '2019-11-01 05:53:01', '2019-11-18 08:20:37');

-- --------------------------------------------------------

--
-- Table structure for table `topup_coupons`
--

CREATE TABLE `topup_coupons` (
  `id` int(11) NOT NULL,
  `topup_code` varchar(250) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topup_coupons`
--

INSERT INTO `topup_coupons` (`id`, `topup_code`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, '15478-58796-87547', 105.00, 4, '2019-10-09 00:00:00', '2019-10-10 06:37:43'),
(2, '87998-45897-89887', 106.00, 4, '2019-10-30 00:00:00', '2019-10-10 06:37:52'),
(3, '87311-76767-57875', 250.00, 3, '2019-10-09 12:13:51', '2019-10-10 06:53:42'),
(4, '13970-89120-75514', 163.00, 3, '2019-10-09 12:13:51', '2019-10-09 12:13:51'),
(5, '14058-95681-94682', 1631.00, 3, '2019-10-09 12:13:51', '2019-10-10 11:27:53'),
(6, '06240-00376-35604', 163.00, 1, '2019-10-09 12:13:51', '2019-10-09 12:13:51'),
(7, '32349-36504-18094', 163.00, 1, '2019-10-09 12:13:51', '2019-10-09 12:13:51'),
(8, '21014-93423-02256', 16543.00, 2, '2019-10-09 12:14:52', '2019-10-09 12:14:52'),
(10, '94195-17867-16208', 16543.00, 2, '2019-10-09 12:14:52', '2019-10-09 12:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `topup_coupons_used`
--

CREATE TABLE `topup_coupons_used` (
  `id` int(11) NOT NULL,
  `topup_coupon_id` int(11) NOT NULL,
  `topup_user_type` tinyint(1) NOT NULL COMMENT '0-Customer, 1- Driver',
  `customer_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `coupon_used_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topup_coupons_used`
--

INSERT INTO `topup_coupons_used` (`id`, `topup_coupon_id`, `topup_user_type`, `customer_id`, `driver_id`, `coupon_used_date`) VALUES
(1, 2, 1, 0, 19, '0000-00-00 00:00:00'),
(2, 1, 0, 3, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Admin Users,2-Customers,3-Driver',
  `api_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `branch_id`, `email`, `email_verified_at`, `password`, `role`, `api_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Basil', 5, 'basil.mathew@b-mates.com', NULL, '$2y$10$fgaBKnhZRBsVygO1eOtqbO4cuv3OTFzUfH/t0el1aCaxwnk/sLXKq', 1, 'SDLpq20yUdSawAywlckI69FLXVfgTeCITiK0aWF1bcz377VbUF6jHadpWFad', 1, '2019-09-03 03:11:46', '2019-10-24 23:45:19'),
(2, 'jinson', 0, 'jinsonj@gmail.com', NULL, '$2y$10$PrIXx3HZPeHvFWLMOOfcbuin85PvaZLIh8s/qEYSDuzFzxdICLpX.', 1, 'SDLpq20yUdSawAywlckI88FLXVfgTeHITiK0aWF1bcz375VbUF6jHadpWFad', 1, '2019-09-04 06:24:57', '2019-09-04 06:24:57'),
(3, 'Karzool', 1, 'karzool@b-mates.com', NULL, '$2y$10$671s.6qbSn6hrPiuw2egS.KeELuLXZP9bqtjeYZbi3UuEW3kISh1W', 1, 'SDLpq20yUdSawAywlckI87FLXVfGTTCITiK0aWF1bcz898VbUF6jHadpWFad', 1, NULL, NULL),
(5, 'Sonu', 11, 'basilmmathew17@gmail.com', NULL, '$2y$10$vLU6wtrF9Yq5kVPyMA/BleNheCOIZq.uolcAoKtdAli1DJDk3JnOm', 2, 'SDLpq20yUdswwAywlckI87FLXVfgTeCITiK0aWF1bcz897VbUF6jHadpWFad', 1, '2019-10-17 06:01:01', '2019-10-23 23:35:01'),
(6, 'jinson', 8, 'jinsonjq@gmail.com', NULL, '$2y$10$NA0Tvv/POEwbZdFCsMLQ9.6.UVQDu05AerSvDZpg0FY7soOwDge3y', 1, 'SDLpq20yUdSawAywlckI71FLXVfgTeGITiK0aWF1bcz879VbUF6jHadpWFad', 1, '2019-10-17 06:28:08', '2019-10-17 06:28:08'),
(7, 'Basil M Mathew', NULL, 'basiimm@gmail.com', NULL, '$2y$10$v9QWbF8C5d3IQqhNzVlh.eiR0cVZFZG8E9YKEuKLPINuQM.Bb403e', 1, 'SDLpq87yUdSawAywmsiI91FLWWfgTeGITiK0aWF1bcz874VbUF6jHadpWFad', 1, '2019-10-25 06:19:14', '2019-10-25 06:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `users_customers`
--

CREATE TABLE `users_customers` (
  `id` int(11) NOT NULL,
  `mobile_number` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_somali` varchar(250) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '2' COMMENT '2-Customers,3-Drivers',
  `country_id` int(11) NOT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `profile_picture` varchar(500) DEFAULT NULL,
  `invitation_code` varchar(500) DEFAULT NULL,
  `invited_by` int(11) DEFAULT NULL,
  `otp` varchar(16) DEFAULT NULL,
  `otp_varified` tinyint(1) DEFAULT NULL COMMENT '1-verified, 2- not verified',
  `invited_date` datetime DEFAULT NULL,
  `u_notification_status` tinyint(1) DEFAULT NULL,
  `upd_date` varchar(250) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_customers`
--

INSERT INTO `users_customers` (`id`, `mobile_number`, `name`, `name_somali`, `email_address`, `password`, `role`, `country_id`, `gender`, `profile_picture`, `invitation_code`, `invited_by`, `otp`, `otp_varified`, `invited_date`, `u_notification_status`, `upd_date`, `status`, `created_at`, `updated_at`) VALUES
(3, '985689755', 'Test 2', NULL, 'basil-mathew@b-mates.com', '$2y$10$G/qH1PhdVCja7sGeKsaD3.V9VEdEpx9E4OE9BvK1Ux922P/RE7kfy$2y$10$G/qH1PhdVCja7sGeKsaD3.V9VEdEpx9E4OE9BvK1Ux9...', 2, 0, 2, NULL, '', 0, '6496', NULL, '0000-00-00 00:00:00', NULL, NULL, 1, '2019-09-26 06:20:50', '2019-12-19 09:40:20'),
(6, '7355533331', 'Basil M.Mathew', NULL, 'basil@gmail.com', '$2y$10$IGd6RM1GROIAoNxzSCI/a.lSVf2NQ1puyli8Vd2xc2RxpTVhRukYa', 2, 20, 1, NULL, '', 0, '', NULL, '0000-00-00 00:00:00', NULL, NULL, 0, '2019-09-26 06:59:27', '2019-12-14 06:39:17'),
(7, '7356544673221111', 'Basil M Mathew', NULL, 'basil.mathew@b-mates.com', '$2y$10$P0wkmPjtplYn8P3vfwBFFuUVDoGw2g7akCv/nRLr14v5p92QaYMh2', 2, 20, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, '2019-11-23 11:11:40', '2019-11-23 11:11:40'),
(13, '7356544673221', 'Basil M Mathew', NULL, 'basil.mathew@b-mates.com', '$2y$10$kJ8pP3NrBdUkbhswmKohqeulQMIg/LtBuXLKRv/bybofF4s9WNMQ.', 2, 20, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, '2019-11-23 11:16:59', '2019-11-23 11:16:59'),
(14, '735654467322111111131', 'Basil M Mathew', NULL, 'basil.mathew@b-mates.com', '$2y$10$P5Ws2xdVnl1i6wRBJTJyy.oIL1tQjF2TjWvHj2nYSxqz7CJibLEPC', 2, 20, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, '2019-11-23 11:18:16', '2019-11-23 11:18:16'),
(17, '73565446732211', 'Basil M Mathew', NULL, 'basil.mathew@b-mates.com', '$2y$10$UX6G22HhpRlX4LYLl3jxpesVTq30wMKq61BufNZ6m8S9fKeT7MhMG', 2, 20, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, '2019-11-23 11:20:14', '2019-11-23 11:20:14'),
(19, '735654467322', 'Basil M Mathew', NULL, 'basil.mathew@b-mates.com', '$2y$10$RUBAFD8U2BLZucgYHg3CeuiIwahm6AZr2hyjTPNRLTsG7SBBvKNCC', 2, 20, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, '2019-11-23 11:22:34', '2019-11-23 11:22:34'),
(20, '7356544673234', 'Basil M Mathew', NULL, 'basilmmathew17@gmail.com', '$2y$10$baG.Cgq/896J8P1gh4cuse8ZP2vpcyINuCTgSImS8log9mUq1.4eC', 2, 20, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, '2019-11-23 11:28:21', '2019-11-23 11:28:21'),
(22, '9895170405', 'SHEBIN', NULL, 'shebinlasya@ymail.com', '$2y$10$RdQDiDGCVvTJCPtZsm0Olu.lfAFYpoO6dqn5GIGsRiKVbRnYHUza6', 2, 19, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, '2019-12-08 06:54:59', '2019-12-08 06:54:59'),
(24, '9895170406', 'shebin', NULL, 'shebinlasya@ymail.com', '$2y$10$zF36E6LIBhFck4ZSVkQbfeOE8Hxd/YeoRYf/U0TgARrWuQfNWmvpS', 3, 19, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, '2019-12-11 13:42:05', '2019-12-11 13:42:05'),
(26, '9895170407', 'shebin', NULL, 'shebinlasya@ymail.com', '$2y$10$7w4jzK/IsUtd7hEKpldzdO9wao/I/umt491D3vaskdP/s6OhFOvE.', 2, 0, 2, NULL, NULL, NULL, '2384', NULL, NULL, NULL, NULL, 1, '2019-12-11 13:46:46', '2019-12-19 09:44:58'),
(27, '9656682635', 'shebin', NULL, 'basilmm@gmail.com', '$2y$10$a/wEafaiPRWWIvy/JU8Ht.YhdS15awbJ6kScUPLRx6OeMECjZU.kW', 1, 19, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, '2019-12-12 16:05:01', '2019-12-12 16:05:01'),
(28, '1233456789', 'she', NULL, 'shebin@lasts.com', '$2y$10$oNJFd8v19HvxA/a8E9h8mOotly6cMAEgXTETRKdMA.hKjBaYXPLgW', 1, 20, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, '2019-12-12 17:10:01', '2019-12-12 17:10:01'),
(29, '9745612448', 'Santhosh', NULL, 'basilmm@gmail.com', '$2y$10$ucKs3NLvxrEldkDmLr4D2uGbHvIja1zQL3iOzX40.BlIe8mftzFC.', 2, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-14 11:37:22', '2019-12-14 11:37:22'),
(30, '9856897551111', NULL, NULL, NULL, NULL, 2, 21, NULL, NULL, NULL, NULL, '9450', NULL, NULL, NULL, NULL, 1, '2019-12-14 11:59:54', '2019-12-14 11:59:54'),
(31, '9447382133', NULL, NULL, NULL, NULL, 2, 21, NULL, NULL, NULL, NULL, '9110', NULL, NULL, NULL, NULL, 1, '2019-12-14 12:04:47', '2019-12-14 12:04:47'),
(32, '9447382131', NULL, NULL, NULL, NULL, 2, 21, NULL, NULL, NULL, NULL, '5720', NULL, NULL, NULL, NULL, 1, '2019-12-14 12:05:09', '2019-12-14 12:05:09'),
(33, '9895170409', NULL, NULL, NULL, NULL, 2, 20, NULL, NULL, NULL, NULL, '9593', NULL, NULL, NULL, NULL, 1, '2019-12-14 12:06:42', '2019-12-14 12:06:42'),
(34, '98951709', 'Basil M.Mathew 11', NULL, 'basilmm@gmail.com', '$2y$10$yQmyn6uEv7AzA/nfIyjpAOhF1uO5hx1Yl.gQcOVGhsrXth9SNoKDG', 2, 20, NULL, NULL, NULL, NULL, '7808', NULL, NULL, NULL, NULL, 1, '2019-12-14 12:10:05', '2019-12-14 12:33:10'),
(35, '123456781', NULL, NULL, NULL, NULL, 2, 20, NULL, NULL, NULL, NULL, '7524', NULL, NULL, NULL, NULL, 1, '2019-12-14 12:47:18', '2019-12-14 12:47:18'),
(36, '123456782', NULL, NULL, NULL, NULL, 2, 20, NULL, NULL, NULL, NULL, '5087', NULL, NULL, NULL, NULL, 1, '2019-12-14 12:47:57', '2019-12-14 12:47:57'),
(37, '123456783', NULL, NULL, NULL, NULL, 2, 20, NULL, NULL, NULL, NULL, '7665', NULL, NULL, NULL, NULL, 1, '2019-12-14 12:48:41', '2019-12-14 12:48:41'),
(38, '123456784', NULL, NULL, NULL, NULL, 2, 20, NULL, NULL, NULL, NULL, '8965', NULL, NULL, NULL, NULL, 1, '2019-12-14 12:50:33', '2019-12-14 12:50:33'),
(39, '123456785', NULL, NULL, NULL, NULL, 2, 20, NULL, NULL, NULL, NULL, '2356', NULL, NULL, NULL, NULL, 1, '2019-12-14 12:57:53', '2019-12-14 12:57:53'),
(40, '9876543221', NULL, NULL, NULL, NULL, 2, 20, NULL, NULL, NULL, NULL, '3725', NULL, NULL, NULL, NULL, 1, '2019-12-14 13:04:05', '2019-12-14 13:04:05'),
(41, '9865170407', NULL, NULL, NULL, NULL, 2, 20, NULL, NULL, NULL, NULL, '8419', NULL, NULL, NULL, NULL, 1, '2019-12-14 13:44:51', '2019-12-14 13:44:51'),
(42, '98568975511', NULL, NULL, NULL, NULL, 2, 21, NULL, NULL, NULL, NULL, '1716', NULL, NULL, NULL, NULL, 1, '2019-12-14 15:02:44', '2019-12-14 15:02:44'),
(46, '98568975511221', NULL, NULL, NULL, NULL, 2, 21, NULL, NULL, NULL, NULL, '3522', 2, NULL, NULL, NULL, 1, '2019-12-14 15:40:51', '2019-12-14 15:40:51'),
(49, '98568975511221', NULL, NULL, NULL, NULL, 2, 21, NULL, NULL, NULL, NULL, '9620', 2, NULL, NULL, NULL, 1, '2019-12-14 15:43:02', '2019-12-14 15:43:02'),
(50, '98568975511221', 'Basil M.Mathew 11', NULL, 'basilmm@gmail.com', '$2y$10$nn8E9gZK3cT4AmQa87OpJO5DKLiELbEpFGbTCOxdC9IKY4IGAsTZK', 2, 21, NULL, NULL, NULL, NULL, '5354', 1, NULL, NULL, NULL, 1, '2019-12-14 15:43:06', '2019-12-14 16:30:21'),
(51, '985689755112211', 'Basil M.Mathew 11', NULL, 'basilmm@gmail.com', '$2y$10$WjFC8hc3aNCA2rTTCo64EOoc4AS/phKyxOrwqgjx.9.R.5MhjLzHe', 2, 21, NULL, NULL, NULL, NULL, '6877', 1, NULL, NULL, NULL, 1, '2019-12-14 16:31:41', '2019-12-14 16:32:05'),
(52, '123456789', NULL, NULL, NULL, NULL, 2, 20, NULL, NULL, NULL, NULL, '4508', 2, NULL, NULL, NULL, 1, '2019-12-14 16:32:24', '2019-12-14 16:32:24'),
(53, '123456789', NULL, NULL, NULL, NULL, 2, 20, NULL, NULL, NULL, NULL, '2468', 2, NULL, NULL, NULL, 1, '2019-12-14 16:32:38', '2019-12-14 16:32:38'),
(54, '9447382131', NULL, NULL, NULL, NULL, 2, 21, NULL, NULL, NULL, NULL, '3354', 2, NULL, NULL, NULL, 1, '2019-12-14 16:33:50', '2019-12-14 16:33:50'),
(55, '566', NULL, NULL, NULL, NULL, 2, 20, NULL, NULL, NULL, NULL, '7664', 2, NULL, NULL, NULL, 1, '2019-12-14 16:51:25', '2019-12-14 16:51:25'),
(56, '566', NULL, NULL, NULL, NULL, 2, 20, NULL, NULL, NULL, NULL, '8392', 2, NULL, NULL, NULL, 1, '2019-12-14 16:51:42', '2019-12-14 16:51:42'),
(57, '9447382131', NULL, NULL, NULL, NULL, 2, 21, NULL, NULL, NULL, NULL, '1627', 2, NULL, NULL, NULL, 1, '2019-12-14 18:06:18', '2019-12-14 18:06:18'),
(58, '9245677786', NULL, NULL, NULL, NULL, 2, 21, NULL, NULL, NULL, NULL, '6299', 2, NULL, NULL, NULL, 1, '2019-12-14 18:14:48', '2019-12-14 18:14:48'),
(59, '6265986565', NULL, NULL, NULL, NULL, 2, 20, NULL, NULL, NULL, NULL, '9262', 2, NULL, NULL, NULL, 1, '2019-12-14 19:09:01', '2019-12-14 19:09:01'),
(60, '6265986555', NULL, NULL, NULL, NULL, 2, 20, NULL, NULL, NULL, NULL, '9624', 2, NULL, NULL, NULL, 1, '2019-12-14 19:10:16', '2019-12-14 19:10:16'),
(61, '6598543256', NULL, NULL, NULL, NULL, 2, 20, NULL, NULL, NULL, NULL, '4536', 2, NULL, NULL, NULL, 1, '2019-12-14 19:42:43', '2019-12-14 19:42:43'),
(62, '65688965', NULL, NULL, NULL, NULL, 2, 20, NULL, NULL, NULL, NULL, '3922', 2, NULL, NULL, NULL, 1, '2019-12-14 19:46:26', '2019-12-14 19:46:26'),
(63, '65688965', NULL, NULL, NULL, NULL, 2, 0, NULL, NULL, NULL, NULL, '5283', 2, NULL, NULL, NULL, 1, '2019-12-14 19:46:42', '2019-12-14 19:46:42'),
(64, '12345456', NULL, NULL, NULL, NULL, 2, 21, NULL, NULL, NULL, NULL, '4407', 2, NULL, NULL, NULL, 1, '2019-12-14 19:47:25', '2019-12-14 19:47:25'),
(67, '9856831', NULL, NULL, NULL, NULL, 2, 21, NULL, NULL, NULL, NULL, '6955', 2, NULL, NULL, NULL, 1, '2019-12-15 02:15:14', '2019-12-15 02:15:14'),
(68, '7356544674', 'Basil M Mathew', NULL, 'basilmm@gmail.com', '$2y$10$mDj3x./eXsLlCtqyQJQz4e7TXcy0LYxpCqZf1G63qPJk6Ci6Mz23i', 2, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-16 04:55:50', '2019-12-16 04:55:50'),
(69, '7356544675', 'Basil M Mathew', NULL, 'basilmm@gmail.com', '$2y$10$itaJ0novhpgm8L7trHTfael1R6rntluQCxDgoEhiJrrQhstlNwwk.', 2, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-16 04:56:43', '2019-12-16 04:56:43'),
(70, '7356544674', 'Basil M Mathew', NULL, 'basilmm@gmail.com', '$2y$10$U0EuPd74A9CQSE.rxyCiQeykBT9CPWc8v6t2KJ9oC930HHmpOwgq6', 2, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-16 04:56:54', '2019-12-16 04:56:54'),
(71, '73555321645', 'Basil M.Mathew', NULL, 'basilmm@gmail.com', '$2y$10$1BDyfSW8bKnsuc21ttsFZO3OlKbVuEf4HuYUxVl7h3UDuxaDF1sdG', 3, 21, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, '2019-12-16 04:57:59', '2019-12-23 12:05:05'),
(72, '1123456789', 'Shidhin TS', NULL, '11@gmail.com', '$2y$10$cNZCnqKuY4j8DaRbefBV6.cGy54Mx5B8LDLX86.yFCj/P6P3AGjFi', 2, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-16 07:16:01', '2019-12-16 07:16:01'),
(74, '1234567877', 'Basil M Mathew', NULL, NULL, '$2y$10$/7hWfcEQSitdj3igk7/UO.VPIsJhYOEH/WkQfQ8HYi53pqzfoe6rG', 2, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-19 06:29:37', '2019-12-19 06:29:37'),
(75, '559684946', 'SHIDHIN T.S', NULL, 'shidhin@b-mates.com', '$2y$10$0tWxsINqkJSo3S8z6F7jj.udOpaamBJIjlR1CTgj3iQZ1tp2qC5C6', 2, 21, 1, 'profile-1577547793.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-19 08:19:10', '2019-12-28 15:43:13'),
(76, '4567894567', 'shebin', NULL, 'shebinlasya@gmail.com', '$2y$10$2UtyB5CuTM9YrqMaJVz3VOe0VXWjHHmd5jakfViFKey8DHt1vtZP.', 2, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-19 09:48:08', '2019-12-19 09:49:45'),
(77, '73565446742', 'Basil M Mathew', NULL, 'basilmm@gmail.com', '$2y$10$OTbGsHl52RmklsdNe0DywuE4sWLeUAnLeUL1j.wikmh00w8iy0.by', 2, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-19 11:17:32', '2019-12-19 11:17:32'),
(78, '4567894567', 'shebin', NULL, NULL, '$2y$10$1NQFSWGPqZvA.A0AL/ijzOlKtUoKcL1G0T20JRj.65EFcr/5P2iDy', 2, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-19 11:20:12', '2019-12-19 11:21:22'),
(79, '4567845678', 'dw', NULL, 'seh@2gma.com', '$2y$10$8rHCr5HWf9dolmN7zxda7.I5s/BjTvrpC6ssV4Unc0uZaYYQXoK0C', 2, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-19 11:23:56', '2019-12-19 11:24:05'),
(80, '4567894567', '1234', NULL, '12342@jda.com', '$2y$10$BPJHmlt3wggkY55VYEmfkOs74EqGTASu7y5nE1Rwou1rzPwERSLD2', 2, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-19 11:25:13', '2019-12-19 11:29:21'),
(81, '4567894567', 'she', NULL, 'she@gmail.com', '$2y$10$SlkhdtxDgWYpnJoVBb73ZO/e5sGrCuD5O0dZURZRu5uUYTflc9tXO', 2, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-19 11:30:18', '2019-12-19 11:30:54'),
(82, '4567894567', 'sdsd', NULL, 'sg2@gmail.com', '$2y$10$KfZLCHh0rTW0Z3GEpbRFR.3s6W49dabstc/6EzBYCT3IElA4IFTuW', 2, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-19 11:32:02', '2019-12-19 11:39:03'),
(83, '4567894567', 'ss', NULL, 'she@gmail.com', '$2y$10$Ac402ylQSIcAb1jQADBDd.UwUMY0vCDP5HsY1DPdK/Hq2bOjZY0my', 2, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-19 11:39:59', '2019-12-19 11:57:56'),
(84, '4567894567', 'she', NULL, NULL, '$2y$10$imiulfSe/j4x0UIFCGk86OjkyBFrt9P.DWjbWEKLuxr5Ipy.gEgQO', 2, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-19 12:00:01', '2019-12-19 12:00:31'),
(85, '4567894567', 'she', NULL, NULL, '$2y$10$fqvnNDnHvJnkvHfSvHavs.0KAcxrg.N7.oMY8qoUD5VbU3KIp7h9G', 2, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-19 13:24:21', '2019-12-19 13:24:53'),
(86, '123456456456', 'SHIDHIN', NULL, 'basilmm@gmail.com', '$2y$10$d1dyuxxXIExqoeQuMHkGzeegy4/DXCylklYvnQXj94hTLJWO/u.D6', 2, 21, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-19 13:26:44', '2019-12-19 13:28:39'),
(87, '4567894567', 'Basil M Mathew', NULL, NULL, '$2y$10$.lGqX/vgxc/XgtOjRukHXeVwRkKqYhOPYJB3jNoHkrhKeCaoCB3Ai', 2, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-19 13:27:04', '2019-12-19 13:27:04'),
(88, '456789567', 'shebin', NULL, NULL, '$2y$10$XBkNJalcpUKLXZa0AtRE3.P.1lVVgeEVYbeeqeL.BzrYzeK7PzxxC', 2, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-21 11:44:23', '2019-12-21 11:44:23'),
(89, '7894561231', 'she', NULL, NULL, '$2y$10$j7Jdx8Z/MP0XDiOpO.0Lju0PEI8dkKU84D5YSRUyfixRVptifWZlm', 2, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-21 13:43:40', '2019-12-21 13:43:40'),
(90, '544585733', 'Saeed', NULL, 'saciiid03@gmail.com', '$2y$10$IvorPAZvtWZoIFpIbFz4luuPgflloxZGvSfHFOP0hxTwA4f6aVcgi', 2, 21, 1, 'profile-1577552849.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-21 16:38:38', '2019-12-28 17:07:29'),
(91, '0560386184', 'Karzool Test phone Abdullah', NULL, NULL, '$2y$10$HR0uCRbQuH/PTZfXkTXAIOQiFfEFQBw9mJBbedW6G9gtf6LqSQ7JO', 2, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-21 16:55:39', '2019-12-21 16:55:39'),
(92, '596482218', 'Abubakar Habib', NULL, 'manashaabrar@gmail.com', '$2y$10$lWJfSWQ27oUxCxUjw8THZOebFMA1a6T35eCYdWp5PuSE5x3ZVl1dW', 2, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-12-28 17:05:01', '2019-12-28 17:05:01'),
(93, '225564522', 'Basil M Mathew', NULL, 'basilmm@gmail15.com', '$2y$10$FgImm568EkrmzKDtfRS0AORx0AFaNQpcRaygfudqm1DqIiBsQAlEq', 3, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-01-01 09:26:22', '2020-01-01 09:26:22'),
(94, '225564522', 'Basil M Mathew', NULL, 'basilmm@gmail15.com', '$2y$10$aWwVLHxosGrOHfi6Kv8GQe/Ww82hn9oUzdm92gsxdFXtmqZiEArzW', 3, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-01-01 10:40:29', '2020-01-01 10:40:29'),
(95, '225564522', 'Basil M Mathew', NULL, 'basilmm@gmail15.com', '$2y$10$ItZ6rSyG9JP04c4FYTz6iuDfvWjWagZgWXV07F2dpF4YcaYaJdnii', 3, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-01-01 10:44:16', '2020-01-01 10:44:16'),
(96, '225564522', 'Basil M Mathew', NULL, 'basilmm@gmail15.com', '$2y$10$k4FNsIvOlKDIfNK/5I2huuUwADPAyUvzXHwwDmer2axoJZo5o1YuC', 3, 21, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-01-01 10:47:33', '2020-01-01 10:47:33'),
(97, '0544585733', 'saeed', NULL, NULL, '$2y$10$xrhgj9lIE9DFbpNT/Jt66e1pC8pQKEfGPKZLWtLYoRF1UxekqM2LO', 2, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-01-20 15:46:52', '2020-01-20 15:46:52'),
(98, '225564522', 'ghhgnbvg', NULL, 'basilmm@gmail15.com', '$2y$10$aOL1EYftnZWAXQW3DWT/r.qJDx9gk7sUpTqeh9yN0xL.HvZ6Q6lli', 3, 21, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-01-30 11:46:32', '2020-01-30 11:46:32'),
(99, '225564522', 'Basil M Mathew', NULL, 'basilmm@gmail15.com', '$2y$10$jXbRl2uhL34CvWxeRFR5mOJhxTR9M2geeusYCezpqus82ku8BeOuq', 3, 21, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-02-08 12:10:46', '2020-02-08 12:10:46'),
(100, '123123123', 'SHIDHIN', NULL, 'basilmm@gmail15.com', '$2y$10$CFH4wsxQcbxsEv/1gJPzh.6pyUy5YTA91O8GHAtIpMwReRoru3.FK', 3, 21, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-02-08 13:35:26', '2020-02-08 13:35:26'),
(101, '123123123', 'SHIDHIN', NULL, 'basilmm@gmail15.com', '$2y$10$X0OnMeOfG6SUjVR.KcRdAe6tjXgW.S9kQkxltvKyjoAs96RR4pCkS', 3, 21, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-02-08 13:35:31', '2020-02-08 13:35:31'),
(102, '123123123', 'SHIDHIN', NULL, 'ashid@gmail15.com', '$2y$10$gq5wqZuO9D29A37Lsa/9l.PW/s3NAvum8GWqMpaCRa/ny5bKToEeG', 3, 21, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-02-08 13:35:41', '2020-02-08 13:35:41'),
(103, '596483312', 'abu', NULL, 'abu@gmail.com', '$2y$10$x.jzG6y0bG.y04HeyTn3bOvWqCrpIPzgobjQzKhoK0AVDyne10QPG', 2, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-02-08 16:08:50', '2020-02-08 16:08:50'),
(104, '508168256', 'shebin', NULL, 'shebinlasya@gmail.com', '$2y$10$zG/GVGINO.FFHCCqPOBgvOoQ8FMNo2fwhD8BtoTdqzd3LGlV0Kh6K', 2, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-02-20 17:16:29', '2020-02-20 17:16:29'),
(105, '580359391', 'Saeed', NULL, NULL, '$2y$10$2xjbmfEva9o5R0M/Ms9HUe.OGo7wyoyl8m9/o43vrEUcjXv9kRO9q', 2, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-02-25 16:53:25', '2020-02-25 16:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `users_meta`
--

CREATE TABLE `users_meta` (
  `uid` int(11) NOT NULL,
  `u_push_token` varchar(255) DEFAULT NULL,
  `u_device_type` tinyint(4) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_meta`
--

INSERT INTO `users_meta` (`uid`, `u_push_token`, `u_device_type`, `created_at`, `updated_at`) VALUES
(71, '1234', 1, '2020-01-02 07:33:34', '2020-01-17 09:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_customer_otp`
--

CREATE TABLE `user_customer_otp` (
  `id` int(11) NOT NULL,
  `mobile_number` varchar(40) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `country_id` int(11) NOT NULL,
  `otp` varchar(4) NOT NULL,
  `otp_verified` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_customer_otp`
--

INSERT INTO `user_customer_otp` (`id`, `mobile_number`, `role`, `country_id`, `otp`, `otp_verified`, `created_at`, `updated_at`) VALUES
(1, '7356544673', 2, 21, '8609', 2, '2019-12-15 02:44:15', '2019-12-15 02:44:15'),
(2, '7356544673', 2, 21, '9744', 2, '2019-12-15 02:45:58', '2019-12-15 02:45:58'),
(3, '7356544673', 2, 21, '3787', 2, '2019-12-15 02:46:24', '2019-12-15 02:46:24'),
(4, '12345654', 2, 21, '9188', 2, '2019-12-15 06:24:26', '2019-12-15 06:24:26'),
(5, '12345654', 2, 21, '2411', 2, '2019-12-15 06:25:12', '2019-12-15 06:25:12'),
(6, '12345654', 2, 21, '4722', 2, '2019-12-15 06:25:25', '2019-12-15 06:25:25'),
(7, '12345654', 2, 21, '5115', 2, '2019-12-15 06:25:33', '2019-12-15 06:25:33'),
(8, '12345654', 2, 21, '9986', 2, '2019-12-15 06:25:41', '2019-12-15 06:25:41'),
(9, '7356544673', 2, 21, '6323', 1, '2019-12-16 04:51:24', '2019-12-16 04:51:47'),
(10, '7356544674', 2, 21, '2354', 1, '2019-12-16 04:54:00', '2019-12-16 04:54:13'),
(11, '1123456789', 2, 21, '2369', 1, '2019-12-16 06:13:04', '2019-12-16 06:17:57'),
(12, '560386184', 2, 21, '5663', 2, '2019-12-18 16:44:02', '2019-12-18 16:44:02'),
(13, '560386184', 2, 21, '9192', 2, '2019-12-18 16:44:14', '2019-12-18 16:44:14'),
(14, '560386184', 2, 21, '3707', 2, '2019-12-18 16:44:15', '2019-12-18 16:44:15'),
(15, '560386184', 2, 21, '3394', 2, '2019-12-18 16:44:16', '2019-12-18 16:44:16'),
(16, '559684946', 2, 21, '6958', 2, '2019-12-19 07:58:27', '2019-12-19 07:58:27'),
(17, '559684946', 2, 21, '2575', 2, '2019-12-19 07:58:34', '2019-12-19 07:58:34'),
(18, '559684946', 2, 21, '8636', 2, '2019-12-19 07:59:53', '2019-12-19 07:59:53'),
(19, '559684946', 2, 21, '9916', 2, '2019-12-19 08:01:07', '2019-12-19 08:01:07'),
(20, '559684946', 2, 21, '5294', 2, '2019-12-19 08:09:12', '2019-12-19 08:09:12'),
(21, '559684946', 2, 21, '9869', 2, '2019-12-19 08:09:47', '2019-12-19 08:09:47'),
(22, '559684946', 2, 21, '8735', 1, '2019-12-19 08:11:52', '2019-12-19 08:12:04'),
(23, '559684946', 2, 21, '7812', 1, '2019-12-19 08:14:46', '2019-12-19 08:14:53'),
(24, '559684946', 2, 21, '9463', 1, '2019-12-19 08:18:40', '2019-12-19 08:18:44'),
(25, '4567894567', 2, 21, '1775', 1, '2019-12-19 09:47:13', '2019-12-19 09:47:15'),
(26, '4567894567', 2, 21, '8143', 1, '2019-12-19 11:19:47', '2019-12-19 11:19:48'),
(27, '4567845678', 2, 21, '2469', 1, '2019-12-19 11:23:36', '2019-12-19 11:23:38'),
(28, '4567894567', 2, 21, '1845', 1, '2019-12-19 11:24:46', '2019-12-19 11:24:48'),
(29, '4567894567', 2, 21, '2967', 1, '2019-12-19 11:30:03', '2019-12-19 11:30:05'),
(30, '4567894567', 2, 21, '6485', 1, '2019-12-19 11:31:41', '2019-12-19 11:31:43'),
(31, '4567894567', 2, 21, '5160', 1, '2019-12-19 11:39:47', '2019-12-19 11:39:48'),
(32, '4567894567', 2, 21, '2920', 1, '2019-12-19 11:59:45', '2019-12-19 11:59:47'),
(33, '4567894567', 2, 21, '7995', 1, '2019-12-19 13:24:08', '2019-12-19 13:24:10'),
(34, '456789567', 2, 21, '2434', 1, '2019-12-21 11:44:06', '2019-12-21 11:44:08'),
(35, '7894561231', 2, 21, '2358', 1, '2019-12-21 13:43:23', '2019-12-21 13:43:24'),
(36, '544585733', 2, 21, '2695', 2, '2019-12-21 16:37:30', '2019-12-21 16:37:30'),
(37, '544585733', 2, 21, '8943', 1, '2019-12-21 16:38:05', '2019-12-21 16:38:12'),
(38, '0560386184', 2, 21, '6711', 2, '2019-12-21 16:54:23', '2019-12-21 16:54:23'),
(39, '0560386184', 2, 21, '9177', 1, '2019-12-21 16:54:40', '2019-12-21 16:54:45'),
(40, '0560386184', 2, 21, '5150', 1, '2019-12-21 16:54:58', '2019-12-21 16:55:05'),
(41, '5949495', 2, 21, '2058', 2, '2019-12-21 18:45:43', '2019-12-21 18:45:43'),
(42, '5949495', 2, 21, '4418', 2, '2019-12-21 18:45:53', '2019-12-21 18:45:53'),
(43, '5949495', 2, 21, '8601', 2, '2019-12-21 18:45:53', '2019-12-21 18:45:53'),
(44, '5949495', 2, 21, '9577', 1, '2019-12-21 18:46:01', '2019-12-21 18:46:07'),
(45, '5949495', 2, 21, '4644', 2, '2019-12-21 18:46:17', '2019-12-21 18:46:17'),
(46, '56486585', 2, 21, '4680', 2, '2019-12-21 18:48:23', '2019-12-21 18:48:23'),
(47, '565658', 2, 21, '2468', 2, '2019-12-21 18:49:32', '2019-12-21 18:49:32'),
(48, '4564894567', 2, 21, '7085', 1, '2019-12-22 09:15:02', '2019-12-22 09:15:04'),
(49, '73565446741', 2, 21, '9322', 1, '2019-12-23 06:38:06', '2019-12-23 06:39:15'),
(50, '9981', 3, 20, '9625', 1, '2019-12-23 09:56:07', '2019-12-23 10:27:57'),
(51, '9981', 3, 19, '9076', 2, '2019-12-23 11:52:01', '2019-12-23 11:52:01'),
(52, '9981', 3, 20, '3821', 1, '2019-12-23 12:04:50', '2019-12-23 12:05:05'),
(53, '596482218', 2, 21, '4518', 1, '2019-12-28 17:04:12', '2019-12-28 17:04:17'),
(54, '7924772000', 2, 22, '5470', 2, '2020-01-03 08:15:32', '2020-01-03 08:15:32'),
(55, '7924772000', 2, 22, '1526', 2, '2020-01-03 08:15:35', '2020-01-03 08:15:35'),
(56, '7924772000', 2, 22, '7317', 2, '2020-01-03 08:15:36', '2020-01-03 08:15:36'),
(57, '7924772000', 2, 22, '9992', 2, '2020-01-03 08:15:38', '2020-01-03 08:15:38'),
(58, '0544585733', 2, 21, '3736', 2, '2020-01-20 15:46:02', '2020-01-20 15:46:02'),
(59, '0544585733', 2, 21, '1377', 2, '2020-01-20 15:46:08', '2020-01-20 15:46:08'),
(60, '0544585733', 2, 21, '4760', 1, '2020-01-20 15:46:29', '2020-01-20 15:46:34'),
(61, '1212121212', 3, 21, '9286', 1, '2020-02-08 09:45:59', '2020-02-08 09:46:05'),
(62, '222333', 3, 21, '9678', 1, '2020-02-08 09:56:00', '2020-02-08 09:56:05'),
(63, '222333', 3, 21, '3590', 1, '2020-02-08 09:57:47', '2020-02-08 09:57:52'),
(64, '222333', 3, 21, '2348', 1, '2020-02-08 09:59:57', '2020-02-08 10:00:01'),
(65, '222333', 3, 21, '8482', 1, '2020-02-08 10:05:45', '2020-02-08 10:05:49'),
(66, '222333', 3, 21, '1511', 2, '2020-02-08 11:04:54', '2020-02-08 11:04:54'),
(67, '222333', 3, 21, '5342', 1, '2020-02-08 11:04:58', '2020-02-08 11:05:02'),
(68, '111222333', 3, 21, '3268', 1, '2020-02-08 12:46:04', '2020-02-08 12:46:10'),
(69, '111222333', 3, 21, '2878', 1, '2020-02-08 12:52:34', '2020-02-08 12:52:39'),
(70, '1112223333', 3, 21, '7981', 2, '2020-02-08 12:53:28', '2020-02-08 12:53:28'),
(71, '1112223333', 3, 21, '5640', 1, '2020-02-08 12:53:33', '2020-02-08 12:53:38'),
(72, '1122334455', 3, 21, '3768', 1, '2020-02-08 12:57:18', '2020-02-08 12:57:23'),
(73, '1122334444', 3, 21, '8566', 1, '2020-02-08 13:04:52', '2020-02-08 13:04:56'),
(74, '22334455', 3, 21, '7814', 1, '2020-02-08 13:30:11', '2020-02-08 13:30:16'),
(75, '22334455', 3, 21, '4818', 2, '2020-02-08 13:37:47', '2020-02-08 13:37:47'),
(76, '5555555555', 3, 21, '7786', 2, '2020-02-08 14:47:42', '2020-02-08 14:47:42'),
(77, '5555555555', 3, 21, '4643', 2, '2020-02-08 14:48:45', '2020-02-08 14:48:45'),
(78, '5555555555', 3, 21, '3974', 2, '2020-02-08 14:49:49', '2020-02-08 14:49:49'),
(79, '5555555555', 3, 21, '1672', 2, '2020-02-08 14:50:02', '2020-02-08 14:50:02'),
(80, '5555555555', 3, 21, '7965', 2, '2020-02-08 14:50:05', '2020-02-08 14:50:05'),
(81, '5555555555', 3, 21, '8364', 2, '2020-02-08 14:50:06', '2020-02-08 14:50:06'),
(82, '596483312', 2, 21, '3942', 1, '2020-02-08 16:07:56', '2020-02-08 16:08:03'),
(83, '596483312', 2, 21, '4747', 2, '2020-02-08 16:08:11', '2020-02-08 16:08:11'),
(84, '596483312', 2, 21, '4671', 1, '2020-02-08 16:08:18', '2020-02-08 16:08:22'),
(85, '596482218', 3, 21, '2995', 1, '2020-02-10 16:14:39', '2020-02-10 16:14:44'),
(86, '596482218', 3, 21, '2401', 1, '2020-02-10 16:16:38', '2020-02-10 16:16:42'),
(87, '596482218', 3, 21, '1842', 2, '2020-02-10 16:23:00', '2020-02-10 16:23:00'),
(88, '596482218', 3, 21, '1919', 1, '2020-02-10 16:23:07', '2020-02-10 16:23:12'),
(89, '0560386184', 3, 21, '3272', 1, '2020-02-10 19:50:38', '2020-02-10 19:50:44'),
(90, '0560386184', 3, 21, '3524', 1, '2020-02-10 19:55:28', '2020-02-10 19:55:33'),
(91, '6366356729', 3, 21, '9204', 1, '2020-02-11 10:27:58', '2020-02-11 10:28:05'),
(92, '0544585733', 3, 21, '8729', 1, '2020-02-15 16:13:10', '2020-02-15 16:13:14'),
(93, '+447842061', 3, 21, '4543', 1, '2020-02-19 14:09:35', '2020-02-19 14:09:42'),
(94, '508168256', 2, 21, '5568', 1, '2020-02-20 17:15:03', '2020-02-20 17:15:05'),
(95, '596482218', 3, 21, '7020', 1, '2020-02-22 18:42:27', '2020-02-22 18:42:31'),
(96, '580359391', 2, 21, '5259', 1, '2020-02-25 16:52:59', '2020-02-25 16:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_resources`
--

CREATE TABLE `user_resources` (
  `id` int(11) NOT NULL,
  `resource_name` varchar(250) NOT NULL,
  `action_view` tinyint(1) NOT NULL,
  `action_add` tinyint(1) NOT NULL,
  `action_edit` tinyint(1) NOT NULL,
  `action_delete` tinyint(1) NOT NULL,
  `sort_order` tinyint(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_resources`
--

INSERT INTO `user_resources` (`id`, `resource_name`, `action_view`, `action_add`, `action_edit`, `action_delete`, `sort_order`, `status`) VALUES
(1, 'Branches', 1, 1, 1, 1, 1, 1),
(2, 'Drivers', 1, 1, 1, 1, 2, 1),
(3, 'Admin Users', 1, 1, 1, 1, 6, 1),
(4, 'Customers', 1, 1, 1, 1, 3, 1),
(5, 'Jobs', 1, 0, 0, 1, 4, 1),
(6, 'Promotion', 1, 1, 1, 1, 5, 1),
(8, 'Country', 1, 1, 1, 1, 12, 1),
(9, 'City', 1, 1, 1, 1, 13, 1),
(10, 'Car Body Type', 1, 1, 1, 1, 14, 1),
(11, 'Car Brand', 1, 1, 1, 1, 15, 1),
(12, 'Car Color', 1, 1, 1, 1, 16, 1),
(13, 'Fuel Type', 1, 1, 1, 1, 17, 1),
(14, 'Car Features', 1, 1, 1, 1, 18, 1),
(15, 'Car Type', 1, 1, 1, 1, 19, 1),
(16, 'General Setting', 1, 0, 1, 0, 20, 1),
(17, 'Currency', 1, 1, 1, 1, 21, 1),
(18, 'Generate New Cards', 1, 1, 1, 1, 7, 1),
(19, 'All Cards', 1, 0, 1, 1, 8, 1),
(20, 'Used Cards', 1, 0, 1, 1, 9, 1),
(21, 'Unused Cards', 1, 0, 1, 1, 10, 1),
(22, 'Printed Cards', 1, 0, 1, 1, 11, 1),
(23, 'Notification', 1, 1, 1, 1, 22, 1),
(24, 'Terms And Conditions', 1, 1, 1, 1, 24, 1),
(25, 'Piracy Policy', 1, 1, 1, 1, 25, 1),
(26, 'Email Template', 1, 1, 1, 1, 26, 1),
(27, 'Ratings', 1, 0, 0, 1, 27, 1),
(28, 'Contact', 1, 0, 0, 1, 28, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_resources_permission`
--

CREATE TABLE `user_resources_permission` (
  `id` int(11) NOT NULL,
  `resource` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action_view` tinyint(1) DEFAULT NULL,
  `action_add` tinyint(1) DEFAULT NULL,
  `action_edit` tinyint(1) DEFAULT NULL,
  `action_delete` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_resources_permission`
--

INSERT INTO `user_resources_permission` (`id`, `resource`, `user_id`, `action_view`, `action_add`, `action_edit`, `action_delete`, `created_at`, `updated_at`) VALUES
(112, 'Drivers', 8, NULL, NULL, 1, 1, '2019-10-22 07:32:44', '2019-10-22 07:32:44'),
(113, 'Generate New Cards', 8, 1, 1, 1, NULL, '2019-10-22 07:32:44', '2019-10-22 07:32:44'),
(114, 'City', 8, 1, NULL, NULL, NULL, '2019-10-22 07:32:44', '2019-10-22 07:32:44'),
(115, 'Car Brand', 8, 1, NULL, NULL, NULL, '2019-10-22 07:32:44', '2019-10-22 07:32:44'),
(116, 'Car Type', 8, NULL, 1, NULL, NULL, '2019-10-22 07:32:44', '2019-10-22 07:32:44'),
(117, 'Currency', 8, 1, 1, 1, 1, '2019-10-22 07:32:44', '2019-10-22 07:32:44'),
(323, 'Branches', 5, 1, 1, 1, 1, '2019-10-26 10:09:16', '2019-10-26 10:09:16'),
(324, 'Drivers', 5, 1, 1, 1, 1, '2019-10-26 10:09:16', '2019-10-26 10:09:16'),
(325, 'Customers', 5, 1, 1, 1, 1, '2019-10-26 10:09:16', '2019-10-26 10:09:16'),
(326, 'Jobs', 5, 1, NULL, NULL, 1, '2019-10-26 10:09:16', '2019-10-26 10:09:16'),
(327, 'Promotion', 5, 1, 1, 1, 1, '2019-10-26 10:09:16', '2019-10-26 10:09:16'),
(328, 'Admin Users', 5, 1, 1, 1, 1, '2019-10-26 10:09:16', '2019-10-26 10:09:16'),
(329, 'Generate New Cards', 5, 1, 1, 1, 1, '2019-10-26 10:09:16', '2019-10-26 10:09:16'),
(330, 'All Cards', 5, 1, NULL, 1, 1, '2019-10-26 10:09:16', '2019-10-26 10:09:16'),
(331, 'Used Cards', 5, 1, NULL, 1, 1, '2019-10-26 10:09:16', '2019-10-26 10:09:16'),
(332, 'Unused Cards', 5, 1, NULL, 1, 1, '2019-10-26 10:09:16', '2019-10-26 10:09:16'),
(333, 'Printed Cards', 5, 1, NULL, 1, 1, '2019-10-26 10:09:16', '2019-10-26 10:09:16'),
(334, 'Country', 5, 1, 1, 1, 1, '2019-10-26 10:09:16', '2019-10-26 10:09:16'),
(335, 'City', 5, 1, 1, 1, 1, '2019-10-26 10:09:16', '2019-10-26 10:09:16'),
(336, 'Car Body Type', 5, 1, 1, 1, 1, '2019-10-26 10:09:16', '2019-10-26 10:09:16'),
(337, 'Car Brand', 5, 1, 1, 1, 1, '2019-10-26 10:09:16', '2019-10-26 10:09:16'),
(338, 'Car Color', 5, 1, 1, 1, 1, '2019-10-26 10:09:16', '2019-10-26 10:09:16'),
(339, 'Fuel Type', 5, 1, 1, 1, 1, '2019-10-26 10:09:16', '2019-10-26 10:09:16'),
(340, 'Car Features', 5, 1, 1, 1, 1, '2019-10-26 10:09:16', '2019-10-26 10:09:16'),
(341, 'Car Type', 5, 1, 1, 1, 1, '2019-10-26 10:09:16', '2019-10-26 10:09:16'),
(342, 'General Setting', 5, 1, NULL, 1, NULL, '2019-10-26 10:09:16', '2019-10-26 10:09:16'),
(343, 'Currency', 5, 1, 1, 1, 1, '2019-10-26 10:09:16', '2019-10-26 10:09:16'),
(344, 'Notification', 5, 1, 1, 1, 1, '2019-10-26 10:09:16', '2019-10-26 10:09:16'),
(524, 'Branches', 3, 1, 1, 1, 1, '2019-11-18 06:08:57', '2019-11-18 06:08:57'),
(525, 'Drivers', 3, 1, 1, 1, 1, '2019-11-18 06:08:57', '2019-11-18 06:08:57'),
(526, 'Customers', 3, 1, 1, 1, 1, '2019-11-18 06:08:57', '2019-11-18 06:08:57'),
(527, 'Jobs', 3, 1, NULL, NULL, 1, '2019-11-18 06:08:57', '2019-11-18 06:08:57'),
(528, 'Promotion', 3, 1, 1, 1, 1, '2019-11-18 06:08:57', '2019-11-18 06:08:57'),
(529, 'Generate New Cards', 3, 1, 1, 1, 1, '2019-11-18 06:08:57', '2019-11-18 06:08:57'),
(530, 'All Cards', 3, 1, NULL, 1, 1, '2019-11-18 06:08:57', '2019-11-18 06:08:57'),
(531, 'Used Cards', 3, 1, NULL, 1, 1, '2019-11-18 06:08:57', '2019-11-18 06:08:57'),
(532, 'Unused Cards', 3, 1, NULL, 1, 1, '2019-11-18 06:08:57', '2019-11-18 06:08:57'),
(533, 'Printed Cards', 3, 1, NULL, 1, 1, '2019-11-18 06:08:57', '2019-11-18 06:08:57'),
(534, 'Country', 3, 1, 1, 1, 1, '2019-11-18 06:08:57', '2019-11-18 06:08:57'),
(535, 'City', 3, 1, 1, 1, 1, '2019-11-18 06:08:57', '2019-11-18 06:08:57'),
(536, 'Car Body Type', 3, 1, 1, 1, 1, '2019-11-18 06:08:57', '2019-11-18 06:08:57'),
(537, 'Car Brand', 3, 1, 1, 1, 1, '2019-11-18 06:08:57', '2019-11-18 06:08:57'),
(538, 'Car Color', 3, 1, 1, 1, 1, '2019-11-18 06:08:57', '2019-11-18 06:08:57'),
(539, 'Fuel Type', 3, 1, 1, 1, 1, '2019-11-18 06:08:57', '2019-11-18 06:08:57'),
(540, 'Car Features', 3, 1, 1, 1, 1, '2019-11-18 06:08:57', '2019-11-18 06:08:57'),
(541, 'Car Type', 3, 1, 1, 1, 1, '2019-11-18 06:08:57', '2019-11-18 06:08:57'),
(542, 'General Setting', 3, 1, NULL, 1, NULL, '2019-11-18 06:08:57', '2019-11-18 06:08:57'),
(543, 'Currency', 3, 1, 1, 1, 1, '2019-11-18 06:08:57', '2019-11-18 06:08:57'),
(544, 'Notification', 3, 1, 1, 1, 1, '2019-11-18 06:08:57', '2019-11-18 06:08:57'),
(545, 'Terms And Conditions', 3, 1, 1, 1, 1, '2019-11-18 06:08:57', '2019-11-18 06:08:57'),
(546, 'Piracy Policy', 3, 1, 1, 1, 1, '2019-11-18 06:08:57', '2019-11-18 06:08:57'),
(547, 'Email Template', 3, 1, 1, 1, 1, '2019-11-18 06:08:57', '2019-11-18 06:08:57'),
(574, 'Branches', 1, 1, 1, 1, 1, '2019-12-19 10:29:38', '2019-12-19 10:29:38'),
(575, 'Drivers', 1, 1, 1, 1, 1, '2019-12-19 10:29:38', '2019-12-19 10:29:38'),
(576, 'Customers', 1, 1, 1, 1, 1, '2019-12-19 10:29:38', '2019-12-19 10:29:38'),
(577, 'Jobs', 1, 1, NULL, NULL, 1, '2019-12-19 10:29:38', '2019-12-19 10:29:38'),
(578, 'Promotion', 1, 1, 1, 1, 1, '2019-12-19 10:29:38', '2019-12-19 10:29:38'),
(579, 'Admin Users', 1, 1, 1, 1, 1, '2019-12-19 10:29:38', '2019-12-19 10:29:38'),
(580, 'Generate New Cards', 1, 1, 1, 1, 1, '2019-12-19 10:29:38', '2019-12-19 10:29:38'),
(581, 'All Cards', 1, 1, NULL, 1, 1, '2019-12-19 10:29:38', '2019-12-19 10:29:38'),
(582, 'Used Cards', 1, 1, NULL, 1, 1, '2019-12-19 10:29:38', '2019-12-19 10:29:38'),
(583, 'Unused Cards', 1, 1, NULL, 1, 1, '2019-12-19 10:29:38', '2019-12-19 10:29:38'),
(584, 'Printed Cards', 1, 1, NULL, 1, 1, '2019-12-19 10:29:38', '2019-12-19 10:29:38'),
(585, 'Country', 1, 1, 1, 1, 1, '2019-12-19 10:29:38', '2019-12-19 10:29:38'),
(586, 'City', 1, 1, 1, 1, 1, '2019-12-19 10:29:38', '2019-12-19 10:29:38'),
(587, 'Car Body Type', 1, 1, 1, 1, 1, '2019-12-19 10:29:38', '2019-12-19 10:29:38'),
(588, 'Car Brand', 1, 1, 1, 1, 1, '2019-12-19 10:29:39', '2019-12-19 10:29:39'),
(589, 'Car Color', 1, 1, 1, 1, 1, '2019-12-19 10:29:39', '2019-12-19 10:29:39'),
(590, 'Fuel Type', 1, 1, 1, 1, 1, '2019-12-19 10:29:39', '2019-12-19 10:29:39'),
(591, 'Car Features', 1, 1, 1, 1, 1, '2019-12-19 10:29:39', '2019-12-19 10:29:39'),
(592, 'Car Type', 1, 1, 1, 1, 1, '2019-12-19 10:29:39', '2019-12-19 10:29:39'),
(593, 'General Setting', 1, 1, NULL, 1, NULL, '2019-12-19 10:29:39', '2019-12-19 10:29:39'),
(594, 'Currency', 1, 1, 1, 1, 1, '2019-12-19 10:29:39', '2019-12-19 10:29:39'),
(595, 'Notification', 1, 1, 1, 1, 1, '2019-12-19 10:29:39', '2019-12-19 10:29:39'),
(596, 'Terms And Conditions', 1, 1, NULL, NULL, NULL, '2019-12-19 10:29:39', '2019-12-19 10:29:39'),
(597, 'Piracy Policy', 1, 1, NULL, NULL, NULL, '2019-12-19 10:29:39', '2019-12-19 10:29:39'),
(598, 'Email Template', 1, 1, 1, 1, 1, '2019-12-19 10:29:39', '2019-12-19 10:29:39'),
(599, 'Ratings', 1, 1, NULL, NULL, 1, '2019-12-19 10:29:39', '2019-12-19 10:29:39'),
(600, 'Contact', 1, 1, NULL, NULL, 1, '2019-12-19 10:29:39', '2019-12-19 10:29:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_brands`
--
ALTER TABLE `branch_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_bodytype`
--
ALTER TABLE `car_bodytype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_brand`
--
ALTER TABLE `car_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_color`
--
ALTER TABLE `car_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_features`
--
ALTER TABLE `car_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_fuel`
--
ALTER TABLE `car_fuel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_type`
--
ALTER TABLE `car_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commision`
--
ALTER TABLE `commision`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `name_somali` (`name_somali`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_info`
--
ALTER TABLE `driver_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_vehicle_info`
--
ALTER TABLE `driver_vehicle_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invitation_times`
--
ALTER TABLE `invitation_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_trip`
--
ALTER TABLE `job_trip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_trip_detail`
--
ALTER TABLE `job_trip_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `piracy_policy`
--
ALTER TABLE `piracy_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topup_coupons`
--
ALTER TABLE `topup_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topup_coupons_used`
--
ALTER TABLE `topup_coupons_used`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING BTREE;

--
-- Indexes for table `users_customers`
--
ALTER TABLE `users_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_meta`
--
ALTER TABLE `users_meta`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `user_customer_otp`
--
ALTER TABLE `user_customer_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_resources`
--
ALTER TABLE `user_resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_resources_permission`
--
ALTER TABLE `user_resources_permission`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `branch_brands`
--
ALTER TABLE `branch_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `car_bodytype`
--
ALTER TABLE `car_bodytype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `car_brand`
--
ALTER TABLE `car_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `car_color`
--
ALTER TABLE `car_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `car_features`
--
ALTER TABLE `car_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `car_fuel`
--
ALTER TABLE `car_fuel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `car_type`
--
ALTER TABLE `car_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `commision`
--
ALTER TABLE `commision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `driver_info`
--
ALTER TABLE `driver_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `driver_vehicle_info`
--
ALTER TABLE `driver_vehicle_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `invitation_times`
--
ALTER TABLE `invitation_times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_trip`
--
ALTER TABLE `job_trip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_trip_detail`
--
ALTER TABLE `job_trip_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `piracy_policy`
--
ALTER TABLE `piracy_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `topup_coupons`
--
ALTER TABLE `topup_coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `topup_coupons_used`
--
ALTER TABLE `topup_coupons_used`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_customers`
--
ALTER TABLE `users_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `user_customer_otp`
--
ALTER TABLE `user_customer_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `user_resources`
--
ALTER TABLE `user_resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_resources_permission`
--
ALTER TABLE `user_resources_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=601;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
