-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2025 at 09:50 AM
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
-- Database: `rmsy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Amar Desai', 'amar@gmail.com', '$2y$12$pRkjpBuXPYyonvWXQMh3HOnvgZlZqAGKr3wrcVOI8Pd7fcO38BrYq', '2025-01-21 00:42:06', '2025-01-21 00:42:06'),
(2, 'Kishan Patel', 'kp@gmail', '$2y$12$qdeL.BKIuCzjRiaJ0d0EVeqMfzIOiWTDql9YzP8xS5AFFqiMl39Ri', '2025-01-21 03:55:15', '2025-01-21 03:55:15'),
(3, 'Divyesh Patel', 'dp@gmail.com', '$2y$12$sqXlR6KXbWiLuYFfmh7r0e7qUUN37pzAq8PC8R4qgfldTIG411K7q', '2025-01-23 02:52:07', '2025-01-23 02:52:07'),
(4, 'Vansh Joshi', 'vj@gmail.com', '$2y$12$6oaCQcYmx8G//N0ReShK/uKDZxO0waYMPdorq0C.eivXEmIa47KWm', '2025-01-27 03:25:28', '2025-01-27 03:25:28'),
(5, 'Kishan Patel', 'kp@gmail.com', '$2y$12$JPA0T4uFg3wgcdANum9aKOPCby/ZfpS6o7kRkX64WXsLimGcSGUEi', '2025-02-11 04:41:45', '2025-02-11 04:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `admin_bookings`
--

CREATE TABLE `admin_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `cn` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL,
  `kids` int(11) NOT NULL,
  `adults` int(11) NOT NULL,
  `kids_rate` decimal(8,2) NOT NULL DEFAULT 0.00,
  `adults_rate` decimal(8,2) NOT NULL DEFAULT 0.00,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `advance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `netamount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Status` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_bookings`
--

INSERT INTO `admin_bookings` (`id`, `admin_id`, `name`, `cn`, `date`, `time`, `kids`, `adults`, `kids_rate`, `adults_rate`, `amount`, `advance`, `discount`, `netamount`, `Status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Animesh Agraval', '8934213459', '2025-01-16', '09 to 09', 3, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-01-22 00:35:21', '2025-01-22 00:35:21'),
(6, 1, 'Mukesh Maru', '7876665544', '2025-01-24', '09 to 05', 3, 7, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-01-22 01:15:16', '2025-01-22 01:15:16'),
(7, 1, 'Naman Mathur', '8989998877', '2025-01-30', '09 to 05', 2, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-01-22 01:16:44', '2025-01-22 01:16:44'),
(8, 1, 'Divyesh Patel', '7069141820', '2025-01-16', '11 to 09', 3, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-01-22 01:19:14', '2025-01-22 01:19:14'),
(9, 1, 'Jay Patidar', '8799999999', '2025-01-23', '04 to 09', 6, 8, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-01-22 01:21:03', '2025-01-22 01:21:03'),
(10, 1, 'Amar Desai', '8989998877', '2025-01-23', '04 to 09', 6, 12, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-01-22 01:21:39', '2025-01-22 01:21:39'),
(11, 1, 'Jignesh Desai', '8989998877', '2025-01-12', '09 to 05', 2, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-01-22 01:23:11', '2025-01-22 01:23:11'),
(12, 1, 'Ankit Patel', '7876665544', '2025-01-26', '09 to 05', 5, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-01-22 01:25:47', '2025-01-22 01:25:47'),
(13, 1, 'Mahesh', '8989998877', '2025-01-28', '11 to 09', 2, 3, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-01-22 01:28:28', '2025-01-22 01:28:28'),
(14, 1, 'Nayan', '9765676555', '2025-01-29', '09 to 05', 8, 9, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-01-22 01:29:31', '2025-01-22 01:29:31'),
(15, 2, 'Jeel Pokar', '9765676555', '2025-02-04', '09 to 09', 3, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-01-22 01:31:11', '2025-01-22 01:31:11'),
(16, 2, 'Manish Joshi', '9987877882', '2025-02-01', '09 to 05', 8, 10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-01-22 02:02:46', '2025-01-22 02:02:46'),
(17, 3, 'Arun Panwar', '8734075816', '2025-01-01', '09 to 09', 5, 10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-01-23 03:28:41', '2025-01-23 03:28:41'),
(18, 1, 'Dhaval Patel', '8934213459', '2025-02-05', '09 to 09', 3, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-02-11 04:07:43', '2025-02-11 04:07:43'),
(19, 1, 'Dev Chauhan', '9987877882', '2025-02-13', '09 to 09', 2, 5, 1050.00, 1500.00, 9600.00, 0.00, 100.00, 9500.00, NULL, '2025-02-12 00:30:59', '2025-02-12 00:30:59'),
(20, 1, 'Vatsal Jikandra', '7790787656', '2025-02-12', '09 to 05', 20, 100, 840.00, 1200.00, 136800.00, 0.00, 2000.00, 134800.00, NULL, '2025-02-12 03:29:23', '2025-02-12 03:29:23'),
(21, 1, 'Unnati Ben', '8781898765', '2025-03-07', '09 to 09', 4, 10, 980.00, 1400.00, 17920.00, 0.00, 20.00, 17900.00, 'Checked In', '2025-03-06 00:25:35', '2025-03-06 00:25:35'),
(24, 1, 'Jay Gandhi', '9098787656', '2025-03-07', '09 to 05', 3, 9, 840.00, 1200.00, 13320.00, 5000.00, 320.00, 13000.00, 'Checked In', '2025-03-07 01:20:57', '2025-03-07 01:20:57'),
(25, 1, 'Shantilal Patel', '8734075819', '2025-03-16', '04 to 09', 3, 5, 595.00, 850.00, 6035.00, 2000.00, 35.00, 6000.00, NULL, '2025-03-16 08:18:29', '2025-03-16 08:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `agent_booking`
--

CREATE TABLE `agent_booking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `agentname` varchar(255) NOT NULL,
  `cn` varchar(255) NOT NULL,
  `acn` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `kids` int(11) NOT NULL DEFAULT 0,
  `adults` int(11) NOT NULL DEFAULT 0,
  `kids_rate` decimal(8,2) NOT NULL DEFAULT 0.00,
  `adults_rate` decimal(8,2) NOT NULL DEFAULT 0.00,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `advance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `netamount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Status` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agent_booking`
--

INSERT INTO `agent_booking` (`id`, `admin_id`, `agentname`, `cn`, `acn`, `date`, `time`, `kids`, `adults`, `kids_rate`, `adults_rate`, `amount`, `advance`, `discount`, `netamount`, `Status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Akash Panwar', '8989998877', '9087543322', '2025-01-24', '09 to 09', 100, 120, 980.00, 1400.00, 266000.00, 0.00, 5000.00, 261000.00, NULL, '2025-01-23 04:19:20', '2025-01-23 04:19:20'),
(2, 1, 'Mukesh Prajapati', '8989998877', '7898786545', '2025-02-05', '09 to 09', 10, 50, 840.00, 1200.00, 68400.00, 0.00, 2000.00, 66400.00, NULL, '2025-02-11 04:23:43', '2025-02-11 04:23:43'),
(3, 1, 'Arun Panwar', '8934213459', '8977678909', '2025-02-06', '09 to 09', 20, 100, 840.00, 1200.00, 136800.00, 0.00, 2000.00, 134800.00, NULL, '2025-02-11 04:39:10', '2025-02-11 04:39:10'),
(4, 5, 'Jukesh Zala', '8098787654', '9878909876', '2025-01-31', '09 to 05', 20, 300, 770.00, 1100.00, 345400.00, 0.00, 4000.00, 341400.00, NULL, '2025-02-11 04:43:04', '2025-02-11 04:43:04'),
(5, 1, 'Ajit Patel', '8989998877', '9087543322', '2025-02-13', '09 to 05', 30, 300, 770.00, 1100.00, 353100.00, 0.00, 3000.00, 350100.00, NULL, '2025-02-12 00:11:44', '2025-02-12 00:11:44'),
(6, 1, 'Arun Panwar', '8934213459', '8977678909', '2025-03-03', '09 to 09', 2, 10, 1050.00, 1500.00, 17100.00, 0.00, 1000.00, 16100.00, NULL, '2025-03-03 00:22:51', '2025-03-03 00:22:51'),
(7, 1, 'Jigu Bhai Patel', '9765676555', '9879572544', '2025-03-08', '09 to 09', 20, 100, 980.00, 1400.00, 159600.00, 0.00, 600.00, 159000.00, NULL, '2025-03-06 00:27:32', '2025-03-06 00:27:32'),
(9, 1, 'Jayveer Zala', '8989998877', '9087543322', '2025-03-07', '09 to 09', 10, 100, 980.00, 1400.00, 149800.00, 49000.00, 800.00, 149000.00, 'Checked In', '2025-03-07 01:28:16', '2025-03-07 01:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `attandances`
--

CREATE TABLE `attandances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `status` enum('Present','Absent','Leave') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `leave_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attandances`
--

INSERT INTO `attandances` (`id`, `staff_id`, `date`, `status`, `created_at`, `updated_at`, `leave_time`) VALUES
(44, 1, '2025-02-10', 'Present', '2025-02-10 02:05:19', '2025-02-10 03:28:44', NULL),
(45, 2, '2025-02-10', 'Present', '2025-02-10 02:05:19', '2025-02-10 03:28:44', NULL),
(48, 5, '2025-02-10', 'Present', '2025-02-10 04:25:11', '2025-02-10 04:25:11', NULL),
(49, 1, '2025-02-11', 'Present', '2025-02-10 23:54:53', '2025-02-10 23:54:53', NULL),
(50, 2, '2025-02-11', 'Absent', '2025-02-10 23:54:53', '2025-02-10 23:55:02', NULL),
(51, 5, '2025-02-11', 'Leave', '2025-02-10 23:54:53', '2025-02-11 00:13:03', '11:12:00'),
(52, 1, '2025-03-04', 'Present', '2025-03-04 00:20:53', '2025-03-04 00:20:53', NULL),
(53, 2, '2025-03-04', 'Present', '2025-03-04 00:20:53', '2025-03-04 00:20:53', NULL),
(54, 5, '2025-03-04', 'Present', '2025-03-04 00:20:53', '2025-03-04 00:20:53', NULL),
(55, 7, '2025-03-04', 'Absent', '2025-03-04 00:20:53', '2025-03-04 00:20:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `booking_date` date NOT NULL,
  `time_slot` varchar(255) NOT NULL,
  `kids` int(11) NOT NULL,
  `rate_kids` decimal(8,2) NOT NULL,
  `total_kids` decimal(8,2) NOT NULL,
  `adults` int(11) NOT NULL,
  `rate_adults` decimal(8,2) NOT NULL,
  `total_adults` decimal(8,2) NOT NULL,
  `total_amount` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) DEFAULT 0.00,
  `net_amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `customer_name`, `contact_no`, `booking_date`, `time_slot`, `kids`, `rate_kids`, `total_kids`, `adults`, `rate_adults`, `total_adults`, `total_amount`, `discount`, `net_amount`, `created_at`, `updated_at`) VALUES
(1, 'Vansh Joshi', '7069339178', '2025-01-16', '9 to 9', 2, 980.00, 1960.00, 3, 1400.00, 4200.00, 6160.00, 1000.00, 5160.00, '2025-01-28 00:52:01', '2025-01-28 00:52:01'),
(2, 'Bhavik Rathod', '7069639785', '2025-01-18', '9 to 5', 3, 840.00, 2520.00, 7, 1200.00, 8400.00, 10920.00, 2000.00, 8920.00, '2025-01-28 01:16:49', '2025-01-28 01:16:49'),
(3, 'Jay Mahakal', '8976545654', '2025-01-21', '09 to 05', 4, 849.00, 3396.00, 5, 1200.00, 6000.00, 9396.00, 1300.00, 8096.00, '2025-01-28 01:19:49', '2025-01-28 01:19:49'),
(4, 'Rishi Solanki', '9809786578', '2025-01-23', '11 to 09', 5, 945.00, 4725.00, 8, 1350.00, 10800.00, 15525.00, 1000.00, 14525.00, '2025-01-28 01:46:35', '2025-01-28 01:46:35'),
(5, 'Jayesh Vegda', '9809786578', '2025-01-15', '09 to 09', 5, 1000.00, 5000.00, 8, 1500.00, 12000.00, 17000.00, 1000.00, 16000.00, '2025-01-29 00:45:18', '2025-01-29 00:45:18'),
(6, 'Mahendra Patel', '7069339178', '2025-01-31', '09 to 09', 5, 1050.00, 5250.00, 10, 1500.00, 15000.00, 20250.00, 0.00, 20250.00, '2025-01-29 03:49:19', '2025-01-29 03:49:19'),
(7, 'Mahendra Patel', '7069339178', '2025-01-31', '09 to 09', 5, 1050.00, 5250.00, 10, 1500.00, 15000.00, 20250.00, 0.00, 20250.00, '2025-01-29 03:50:43', '2025-01-29 03:50:43'),
(8, 'Mahendra Patel', '7069339178', '2025-01-31', '09 to 09', 5, 1050.00, 5250.00, 10, 1500.00, 15000.00, 20250.00, 0.00, 20250.00, '2025-01-29 03:51:30', '2025-01-29 03:51:30'),
(9, 'Mahendra Patel', '7069339178', '2025-01-31', '09 to 09', 5, 1050.00, 5250.00, 10, 1500.00, 15000.00, 20250.00, 0.00, 20250.00, '2025-01-29 03:52:48', '2025-01-29 03:52:48'),
(10, 'Vatsal Joshi', '8978974574', '2025-01-31', '11 to 09', 8, 945.00, 7560.00, 10, 1350.00, 13500.00, 21060.00, 0.00, 21060.00, '2025-01-29 03:55:50', '2025-01-29 03:55:50'),
(11, 'Mehul Patel', '6369169375', '2025-01-15', '04 to 09', 3, 595.00, 1785.00, 5, 850.00, 4250.00, 6035.00, 0.00, 6035.00, '2025-01-29 03:58:26', '2025-01-29 03:58:26'),
(12, 'Jayesh Patel', '6369169389', '2025-01-30', '09 to 05', 4, 840.00, 3360.00, 7, 1200.00, 8400.00, 11760.00, 0.00, 11760.00, '2025-01-29 04:07:09', '2025-01-29 04:07:09'),
(13, 'Zeel Patel', '9099123456', '2025-02-21', '09 to 09', 5, 1050.00, 5250.00, 6, 1500.00, 9000.00, 14250.00, 0.00, 14250.00, '2025-02-01 03:16:17', '2025-02-01 03:16:17'),
(14, 'Mukesh Sharma', '9999934334', '2025-02-13', '09 to 09', 3, 1050.00, 3150.00, 8, 1500.00, 12000.00, 15150.00, 0.00, 15150.00, '2025-02-03 00:59:56', '2025-02-03 00:59:56'),
(15, 'Manish Mer', '8978974574', '2025-02-22', '09 to 09', 4, 1050.00, 4200.00, 5, 1500.00, 7500.00, 11700.00, 0.00, 11700.00, '2025-02-08 01:31:48', '2025-02-08 01:31:48'),
(16, 'Pankaj Khokhariya', '9099123456', '2025-02-10', '09 to 09', 3, 1050.00, 3150.00, 10, 1500.00, 15000.00, 18150.00, 0.00, 18150.00, '2025-02-12 02:42:44', '2025-02-12 02:42:44'),
(17, 'Dev Chauhan', '9987877882', '2025-02-13', '09 to 09', 2, 1050.00, 2100.00, 5, 1500.00, 7500.00, 9600.00, 0.00, 9600.00, '2025-02-12 03:23:49', '2025-02-12 03:23:49'),
(21, 'Vatsal Jikandra', '7790787656', '2025-02-12', '09 to 05', 20, 840.00, 16800.00, 100, 1200.00, 120000.00, 136800.00, 2000.00, 134800.00, '2025-02-12 03:30:55', '2025-02-12 03:30:55'),
(22, 'Dev Chauhan', '9987877882', '2025-02-13', '09 to 09', 2, 1050.00, 2100.00, 5, 1500.00, 7500.00, 9600.00, 1000.00, 8600.00, '2025-02-12 03:51:25', '2025-02-12 03:51:25'),
(27, 'Vatsal Jikandra', '7790787656', '2025-02-12', '09 to 05', 20, 840.00, 16800.00, 100, 1200.00, 120000.00, 136800.00, 2000.00, 134800.00, '2025-02-12 03:57:44', '2025-02-12 03:57:44'),
(28, 'Arun Panwar', '8734075816', '2025-01-01', '09 to 09', 5, 840.00, 4200.00, 10, 1200.00, 12000.00, 16200.00, 0.00, 16200.00, '2025-02-12 04:04:24', '2025-02-12 04:04:24'),
(29, 'Jignesh Desai', '8989998877', '2025-01-12', '09 to 05', 2, 840.00, 1680.00, 6, 1200.00, 7200.00, 8880.00, 0.00, 8880.00, '2025-02-12 04:07:33', '2025-02-12 04:07:33'),
(30, 'Jignesh Desai', '8989998877', '2025-01-12', '09 to 05', 2, 750.00, 1500.00, 6, 1200.00, 7200.00, 8700.00, 0.00, 8700.00, '2025-02-12 04:26:38', '2025-02-12 04:26:38'),
(31, 'Akash Panwar', '8989998877', '2025-01-24', '09 to 09', 100, 980.00, 98000.00, 120, 1400.00, 168000.00, 266000.00, 5000.00, 261000.00, '2025-02-12 04:41:37', '2025-02-12 04:41:37'),
(32, 'Vansh Joshi', '9099123456', '2025-01-23', '09 to 05', 2, 840.00, 1680.00, 2, 1200.00, 2400.00, 4080.00, 0.00, 4080.00, '2025-02-12 04:43:39', '2025-02-12 04:43:39'),
(33, 'Mehul Patel', '6369169375', '2025-01-15', '04 to 09', 3, 840.00, 2520.00, 5, 1200.00, 6000.00, 8520.00, NULL, 8520.00, '2025-02-13 00:30:03', '2025-02-13 00:30:03'),
(34, 'Vivek Makwana', '8978974574', '2025-03-04', '09 to 09', 3, 1050.00, 3150.00, 7, 1500.00, 10500.00, 13650.00, 0.00, 13650.00, '2025-03-04 00:16:01', '2025-03-04 00:16:01'),
(35, 'K P Rajkumar', '9099123456', '2025-03-06', '09 to 09', 3, 1050.00, 3150.00, 9, 1500.00, 13500.00, 16650.00, 0.00, 16650.00, '2025-03-06 00:00:54', '2025-03-06 00:00:54'),
(36, 'Jay Gandhi', '8909898789', '2025-03-07', '11 to 09', 3, 945.00, 2835.00, 10, 1350.00, 13500.00, 16335.00, 0.00, 16335.00, '2025-03-07 00:53:55', '2025-03-07 00:53:55'),
(37, 'Kalpesh Bharwad', '7069339178', '2025-03-07', '09 to 09', 3, 1050.00, 3150.00, 9, 1500.00, 13500.00, 16650.00, 0.00, 16650.00, '2025-03-07 01:45:23', '2025-03-07 01:45:23'),
(38, 'Mukesh Sharma', '7069339178', '2025-03-08', '09 to 09', 3, 1050.00, 3150.00, 7, 1500.00, 10500.00, 13650.00, 0.00, 13650.00, '2025-03-07 23:36:52', '2025-03-07 23:36:52'),
(39, 'Divyesh Patel', '7069339178', '2025-03-16', '04 to 09', 3, 595.00, 1785.00, 7, 850.00, 5950.00, 7735.00, 0.00, 7735.00, '2025-03-16 08:16:48', '2025-03-16 08:16:48');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `cn` varchar(255) NOT NULL,
  `acn` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `kids` int(11) NOT NULL,
  `adults` int(11) NOT NULL,
  `kids_rate` decimal(8,2) NOT NULL DEFAULT 0.00,
  `adults_rate` decimal(8,2) NOT NULL DEFAULT 0.00,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `advance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `netamount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Status` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `cn`, `acn`, `date`, `time`, `kids`, `adults`, `kids_rate`, `adults_rate`, `amount`, `advance`, `discount`, `netamount`, `Status`, `created_at`, `updated_at`) VALUES
(1, 'Kishan Patel', '7069339178', '7487806760', '2025-01-22', '09 to 09', 1, 2, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL),
(2, 'Vansh Joshi', '9099123456', '8978665566', '2025-01-23', '09 to 05', 2, 2, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL),
(5, 'Bhavik Rathod', '9099123456', '7465678987', '2025-01-30', '09 to 09', 12, 33, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL),
(6, 'Rishi Solanki', '9876897654', '7656789876', '2025-01-23', '11 to 09', 2, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL),
(7, 'Viraj Maru', '8978974574', '8978778987', '2025-01-24', '09 to 05', 10, 20, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL),
(8, 'Archi Patel', '8978974574', '9879572544', '2025-01-31', '09 to 09', 2, 3, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-01-23 01:48:43', '2025-01-23 01:48:43'),
(9, 'Aman Mehta', '8978974574', '7465678987', '2025-01-24', '09 to 05', 3, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-01-23 01:51:10', '2025-01-23 01:51:10'),
(10, 'Jay Mahakal', '9099123456', '8238173533', '2025-01-30', '09 to 05', 6, 7, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-01-29 00:42:38', '2025-01-29 00:42:38'),
(15, 'Mahendra Patel', '7069339178', '9879572544', '2025-01-31', '09 to 09', 5, 10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-01-29 03:50:43', '2025-01-29 03:50:43'),
(16, 'Vatsal Joshi', '8978974574', '9879572544', '2025-01-31', '11 to 09', 8, 10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-01-29 03:55:49', '2025-01-29 03:55:49'),
(17, 'Mehul Patel', '6369169375', '9999911111', '2025-01-15', '04 to 09', 3, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-01-29 03:58:26', '2025-01-29 03:58:26'),
(18, 'Jayesh Patel', '6369169389', '9999911122', '2025-01-30', '09 to 05', 4, 7, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-01-29 04:07:08', '2025-01-29 04:07:08'),
(19, 'Zeel Patel', '9099123456', '7656789876', '2025-02-21', '09 to 09', 5, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-02-01 03:16:16', '2025-02-01 03:16:16'),
(20, 'Mukesh Sharma', '9999934334', '8888898987', '2025-02-13', '09 to 09', 3, 8, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-02-03 00:59:55', '2025-02-03 00:59:55'),
(21, 'Manish Mer', '8978974574', '9099242425', '2025-02-22', '09 to 09', 4, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-02-08 01:31:47', '2025-02-08 01:31:47'),
(22, 'Pankaj Khokhariya', '9099123456', '9879572544', '2025-02-10', '09 to 09', 3, 10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-02-12 02:42:44', '2025-02-12 02:42:44'),
(23, 'Vivek Makwana', '8978974574', '7465678987', '2025-03-04', '09 to 09', 3, 7, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-03-04 00:16:00', '2025-03-04 00:16:00'),
(24, 'K P Rajkumar', '9099123456', '7656789876', '2025-03-06', '09 to 09', 3, 9, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-03-06 00:00:54', '2025-03-06 00:00:54'),
(26, 'Kalpesh Bharwad', '7069339178', '8238173533', '2025-03-07', '09 to 09', 3, 9, 1050.00, 1500.00, 16650.00, 0.00, 0.00, 16650.00, 'Checked In', '2025-03-07 01:45:22', '2025-03-07 01:45:22'),
(27, 'Mukesh Sharma', '7069339178', '7656789876', '2025-03-08', '09 to 09', 3, 7, 1050.00, 1500.00, 13650.00, 0.00, 0.00, 13650.00, 'Checked In', '2025-03-07 23:36:52', '2025-03-07 23:36:52'),
(28, 'Divyesh Patel', '7069339178', '7069141829', '2025-03-16', '04 to 09', 3, 7, 595.00, 850.00, 7735.00, 0.00, 0.00, 7735.00, 'Checked In', '2025-03-16 08:16:47', '2025-03-16 08:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `booking_room`
--

CREATE TABLE `booking_room` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `online_booking_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_room`
--

INSERT INTO `booking_room` (`id`, `online_booking_id`, `room_id`, `created_at`, `updated_at`) VALUES
(15, 10, 2, '2025-02-21 01:30:39', '2025-02-21 01:30:39'),
(16, 11, 15, '2025-02-21 01:32:33', '2025-02-21 01:32:33'),
(17, 11, 16, '2025-02-21 01:32:33', '2025-02-21 01:32:33'),
(18, 10, 3, '2025-02-21 01:33:30', '2025-02-21 01:33:30'),
(19, 12, 5, '2025-02-21 02:00:09', '2025-02-21 02:00:09'),
(20, 12, 6, '2025-02-21 02:00:09', '2025-02-21 02:00:09'),
(21, 13, 1, '2025-02-21 02:17:23', '2025-02-21 02:17:23'),
(22, 13, 2, '2025-02-21 02:17:23', '2025-02-21 02:17:23'),
(23, 14, 2, '2025-02-21 02:53:55', '2025-02-21 02:53:55'),
(24, 14, 3, '2025-02-21 02:53:55', '2025-02-21 02:53:55'),
(25, 14, 4, '2025-02-21 02:53:55', '2025-02-21 02:53:55'),
(26, 14, 5, '2025-02-21 02:53:55', '2025-02-21 02:53:55'),
(27, 15, 6, '2025-02-21 02:55:41', '2025-02-21 02:55:41'),
(28, 16, 1, '2025-02-21 04:28:49', '2025-02-21 04:28:49'),
(30, 18, 1, '2025-03-07 02:18:17', '2025-03-07 02:18:17'),
(31, 19, 3, '2025-03-07 23:40:25', '2025-03-07 23:40:25');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `daily_expenses`
--

CREATE TABLE `daily_expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `category` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_expenses`
--

INSERT INTO `daily_expenses` (`id`, `date`, `amount`, `category`, `note`, `created_at`, `updated_at`) VALUES
(2, '2025-02-24', 25000.00, 'Gardening', 'Given to Jaydeep Mali for Plants near office', '2025-02-24 02:09:50', '2025-02-24 02:09:50'),
(3, '2025-02-22', 30000.00, 'Velding', 'Room Velding', '2025-02-24 02:21:01', '2025-02-24 02:21:01'),
(4, '2025-03-04', 10000.00, 'Grocery', 'Amit Bhai', '2025-03-04 00:23:06', '2025-03-04 00:23:06'),
(5, '2025-03-04', 20000.00, 'Activity', 'Zip Line no cable', '2025-03-04 04:28:27', '2025-03-04 04:28:27');

-- --------------------------------------------------------

--
-- Table structure for table `daily_incomes`
--

CREATE TABLE `daily_incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `source` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_incomes`
--

INSERT INTO `daily_incomes` (`id`, `date`, `amount`, `source`, `note`, `created_at`, `updated_at`) VALUES
(2, '2025-02-24', 400000.00, 'Packages', 'For 24/02/2025 Dali Package Sales', '2025-02-24 02:09:08', '2025-02-24 02:09:08'),
(3, '2025-03-04', 100000.00, 'Packages', '4/3/25 Packages sales', '2025-03-04 00:22:43', '2025-03-04 00:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `handled` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `name`, `email`, `mobileno`, `message`, `handled`, `created_at`, `updated_at`) VALUES
(1, 'Patel Kishan Shantilal', 'kishanpatel9602@gmail.com', '7069339178', 'Hello', 1, '2025-01-21 00:40:51', '2025-03-17 00:34:09'),
(2, 'Rishi Solanki', 'rs@gmail.com', '8989097653', 'I have already done booking but we want Jain food. If possible then contact me on my number I will know how much people for jain food', 1, '2025-01-21 00:54:52', '2025-03-17 00:40:33'),
(3, 'Manish Joshi', 'mm@gmail.com', '7809767654', 'Hello Sir,\r\nWe are 20 peoples can you arrange any discounts', 1, '2025-01-23 01:55:07', '2025-03-17 00:40:37'),
(4, 'Mukesh Maru', 'mm@gmail.com', '7809767654', 'Hello sir good morning', 1, '2025-01-23 01:56:45', '2025-03-17 00:40:40'),
(5, 'Divyesh Patel', 'dp@gmail.com', '7069141829', 'Hello sir, I have opt package of 4 to 9 for 7 people but our plan has been changed we are coming 10 people. So please look into this matter', 1, '2025-03-17 00:42:26', '2025-03-17 00:46:42');

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
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`, `created_at`, `updated_at`) VALUES
(2, '1742195037-67d7c95d98dd3.jpg', '2025-03-17 01:33:57', '2025-03-17 01:33:57'),
(3, '1742195037-67d7c95d9c20b.jpg', '2025-03-17 01:33:57', '2025-03-17 01:33:57'),
(4, '1742195037-67d7c95d9daab.jpg', '2025-03-17 01:33:57', '2025-03-17 01:33:57'),
(5, '1742195037-67d7c95d9f22e.jpg', '2025-03-17 01:33:57', '2025-03-17 01:33:57'),
(6, '1742195037-67d7c95da0c4d.jpg', '2025-03-17 01:33:57', '2025-03-17 01:33:57'),
(7, '1742195037-67d7c95da25fc.jpg', '2025-03-17 01:33:57', '2025-03-17 01:33:57'),
(8, '1742195037-67d7c95da3fc1.jpg', '2025-03-17 01:33:57', '2025-03-17 01:33:57'),
(9, '1742195037-67d7c95da57cc.jpg', '2025-03-17 01:33:57', '2025-03-17 01:33:57'),
(10, '1742195037-67d7c95da720c.jpg', '2025-03-17 01:33:57', '2025-03-17 01:33:57'),
(11, '1742195037-67d7c95da8982.jpg', '2025-03-17 01:33:57', '2025-03-17 01:33:57'),
(12, '1742195037-67d7c95daa372.jpg', '2025-03-17 01:33:57', '2025-03-17 01:33:57'),
(13, '1742195037-67d7c95daba9a.jpg', '2025-03-17 01:33:57', '2025-03-17 01:33:57'),
(14, '1742195037-67d7c95dad336.jpg', '2025-03-17 01:33:57', '2025-03-17 01:33:57'),
(15, '1742195037-67d7c95daecd3.jpg', '2025-03-17 01:33:57', '2025-03-17 01:33:57'),
(16, '1742195037-67d7c95db04b9.jpg', '2025-03-17 01:33:57', '2025-03-17 01:33:57'),
(17, '1742195037-67d7c95db1c9d.jpg', '2025-03-17 01:33:57', '2025-03-17 01:33:57'),
(18, '1742195037-67d7c95db363b.jpg', '2025-03-17 01:33:57', '2025-03-17 01:33:57'),
(19, '1742195037-67d7c95db4f0c.jpg', '2025-03-17 01:33:57', '2025-03-17 01:33:57'),
(20, '1742195037-67d7c95db689a.jpg', '2025-03-17 01:33:57', '2025-03-17 01:33:57'),
(21, '1742195037-67d7c95db7fc9.jpg', '2025-03-17 01:33:57', '2025-03-17 01:33:57'),
(22, '1742195149-67d7c9cd19a39.jpg', '2025-03-17 01:35:49', '2025-03-17 01:35:49'),
(23, '1742195149-67d7c9cd1f94e.jpg', '2025-03-17 01:35:49', '2025-03-17 01:35:49'),
(24, '1742195149-67d7c9cd219da.jpg', '2025-03-17 01:35:49', '2025-03-17 01:35:49'),
(25, '1742195149-67d7c9cd237a5.jpg', '2025-03-17 01:35:49', '2025-03-17 01:35:49'),
(26, '1742195149-67d7c9cd25abb.jpg', '2025-03-17 01:35:49', '2025-03-17 01:35:49'),
(27, '1742195149-67d7c9cd279a9.jpg', '2025-03-17 01:35:49', '2025-03-17 01:35:49'),
(28, '1742195149-67d7c9cd29bac.jpg', '2025-03-17 01:35:49', '2025-03-17 01:35:49'),
(29, '1742195149-67d7c9cd2b70a.jpg', '2025-03-17 01:35:49', '2025-03-17 01:35:49'),
(30, '1742195149-67d7c9cd2d8e0.jpg', '2025-03-17 01:35:49', '2025-03-17 01:35:49'),
(31, '1742195149-67d7c9cd2f6f5.jpg', '2025-03-17 01:35:49', '2025-03-17 01:35:49'),
(32, '1742195202-67d7ca0259d4d.jpg', '2025-03-17 01:36:42', '2025-03-17 01:36:42'),
(33, '1742195202-67d7ca025ecaf.jpg', '2025-03-17 01:36:42', '2025-03-17 01:36:42'),
(34, '1742195202-67d7ca02605ee.jpg', '2025-03-17 01:36:42', '2025-03-17 01:36:42'),
(35, '1742195202-67d7ca02624f3.jpg', '2025-03-17 01:36:42', '2025-03-17 01:36:42'),
(36, '1742195202-67d7ca02640ad.jpg', '2025-03-17 01:36:42', '2025-03-17 01:36:42'),
(37, '1742195202-67d7ca0265c60.jpg', '2025-03-17 01:36:42', '2025-03-17 01:36:42'),
(38, '1742195202-67d7ca02678ee.jpg', '2025-03-17 01:36:42', '2025-03-17 01:36:42'),
(39, '1742195202-67d7ca0269852.jpg', '2025-03-17 01:36:42', '2025-03-17 01:36:42'),
(40, '1742195202-67d7ca026b2a3.jpg', '2025-03-17 01:36:42', '2025-03-17 01:36:42'),
(41, '1742195202-67d7ca026cb80.jpg', '2025-03-17 01:36:42', '2025-03-17 01:36:42'),
(44, '1742195691-67d7cbeb96b78.jpg', '2025-03-17 01:44:51', '2025-03-17 01:44:51'),
(45, '1742195731-67d7cc13dbcbe.jpg', '2025-03-17 01:45:31', '2025-03-17 01:45:31'),
(46, '1742195731-67d7cc13e1819.jpg', '2025-03-17 01:45:31', '2025-03-17 01:45:31'),
(47, '1742195764-67d7cc34baf26.jpg', '2025-03-17 01:46:04', '2025-03-17 01:46:04'),
(48, '1742195936-67d7cce011761.jpg', '2025-03-17 01:48:56', '2025-03-17 01:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `investments`
--

CREATE TABLE `investments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `investor_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investments`
--

INSERT INTO `investments` (`id`, `amount`, `investor_name`, `date`, `note`, `created_at`, `updated_at`) VALUES
(2, 200000.00, 'Pankaj Bhai', '2025-02-24', 'Given for Gate work', '2025-02-24 02:08:31', '2025-02-24 02:08:31'),
(3, 400000.00, 'Pawan Bhai', '2023-06-01', 'Anup Bhai ne aapya', '2025-02-28 01:42:43', '2025-02-28 01:42:43'),
(4, 100000.00, 'Pankaj Bhai', '2025-03-03', 'For Kitchen Utensils', '2025-03-03 03:33:50', '2025-03-03 03:33:50'),
(5, 400000.00, 'Dhaval Bhai', '2025-03-04', 'Gate Work', '2025-03-04 00:22:13', '2025-03-04 00:22:13');

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
-- Table structure for table `kitchen_purchases`
--

CREATE TABLE `kitchen_purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_date` date NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `net_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kitchen_purchases`
--

INSERT INTO `kitchen_purchases` (`id`, `purchase_date`, `vendor_name`, `net_amount`, `created_at`, `updated_at`) VALUES
(1, '2025-02-11', 'Amit Gupta', 1150.00, '2025-02-11 02:07:24', '2025-02-11 02:07:24'),
(2, '2025-02-07', 'Amalsad Mandli', 2600.00, '2025-02-11 02:10:50', '2025-02-11 02:10:50'),
(3, '2025-02-04', 'Amit Gupta', 1860.00, '2025-02-11 02:34:52', '2025-02-11 02:34:52'),
(4, '2025-01-27', 'Amit Gupta', 780.00, '2025-02-11 02:52:05', '2025-02-11 02:52:05'),
(5, '2025-03-04', 'Amit Gupta', 480.00, '2025-03-04 00:54:17', '2025-03-04 00:54:17'),
(6, '2025-03-04', 'Amalsad Mandli', 7780.00, '2025-03-04 04:29:43', '2025-03-04 04:29:43'),
(7, '2025-03-08', 'Amit Gupta', 1470.00, '2025-03-07 20:10:58', '2025-03-07 20:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `kitchen_purchase_items`
--

CREATE TABLE `kitchen_purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kitchen_purchase_id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kitchen_purchase_items`
--

INSERT INTO `kitchen_purchase_items` (`id`, `kitchen_purchase_id`, `item_name`, `rate`, `qty`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rava', 50.00, 3, 150.00, '2025-02-11 02:07:24', '2025-02-11 02:07:24'),
(2, 1, 'Kaju', 500.00, 2, 1000.00, '2025-02-11 02:07:24', '2025-02-11 02:07:24'),
(3, 2, 'Khand', 30.00, 20, 600.00, '2025-02-11 02:10:50', '2025-02-11 02:10:50'),
(4, 2, 'Tirupati 5 ltr', 1000.00, 2, 2000.00, '2025-02-11 02:10:50', '2025-02-11 02:10:50'),
(5, 3, 'Bread', 30.00, 20, 600.00, '2025-02-11 02:34:52', '2025-02-11 02:34:52'),
(6, 3, 'Chhas', 30.00, 17, 510.00, '2025-02-11 02:34:52', '2025-02-11 02:34:52'),
(7, 3, 'Dahi', 15.00, 50, 750.00, '2025-02-11 02:34:52', '2025-02-11 02:34:52'),
(8, 4, 'Rava', 30.00, 9, 270.00, '2025-02-11 02:52:05', '2025-02-11 02:52:05'),
(9, 4, 'Chhas', 30.00, 17, 510.00, '2025-02-11 02:52:05', '2025-02-11 02:52:05'),
(10, 5, 'Milk', 28.00, 10, 280.00, '2025-03-04 00:54:17', '2025-03-04 00:54:17'),
(11, 5, 'Bread', 10.00, 20, 200.00, '2025-03-04 00:54:17', '2025-03-04 00:54:17'),
(12, 6, 'Khand', 28.00, 10, 280.00, '2025-03-04 04:29:43', '2025-03-04 04:29:43'),
(13, 6, 'Oil', 10.00, 750, 7500.00, '2025-03-04 04:29:43', '2025-03-04 04:29:43'),
(14, 7, 'Sugar', 35.00, 2, 70.00, '2025-03-07 20:10:58', '2025-03-07 20:10:58'),
(15, 7, 'Kaju', 2.00, 700, 1400.00, '2025-03-07 20:10:58', '2025-03-07 20:10:58');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_08_084405_modify_bookings_table', 1),
(5, '2025_01_08_100950_create_enquiry_table', 1),
(6, '2025_01_10_064524_create_admins_table', 1),
(7, '2025_01_21_055545_create_bookings_table', 2),
(8, '2025_01_21_060155_change_time_column_in_bookings_table', 3),
(9, '2025_01_21_084528_create_admin_bookings_table', 4),
(10, '2025_01_22_090226_create_agent_booking_table', 5),
(11, '2025_01_22_100157_drop_agent_booking_table', 6),
(12, '2025_01_23_071739_add_timestamps_to_bookings_table', 7),
(13, '2025_01_23_092159_create_agent_booking_table', 8),
(14, '2025_01_24_064626_create_table_school_booking', 9),
(15, '2025_01_27_070811_create_bills_table', 10),
(16, '2025_01_30_060549_create_staff_table', 11),
(17, '2025_01_30_071126_create_attandances_table', 12),
(18, '2025_01_30_075132_create_salaries_table', 13),
(19, '2025_01_30_080810_create_withdrawals_table', 14),
(20, '2025_01_30_080934_update_salaries_table', 15),
(21, '2025_02_10_081350_add_leave_time_to_attandances_table', 16),
(22, '2025_02_10_095656_add_status_to_attandances_table', 17),
(23, '2025_02_11_072624_create_kitchen_purchases_table', 18),
(24, '2025_02_11_072654_create_kitchen_purchase_items_table', 18),
(25, '2025_02_11_084627_create_purchases_table', 19),
(26, '2025_02_11_084640_create_purchase_items_table', 19),
(27, '2025_02_13_061841_create_rooms_table', 20),
(28, '2025_02_13_061856_create_room_bookings_table', 20),
(29, '2025_02_13_071654_add_fields_to_room_bookings_table', 21),
(30, '2025_02_18_052930_create_online_rooms_table', 22),
(31, '2025_02_18_064431_add_room_id_to_online_rooms_table', 23),
(32, '2025_02_18_064646_add_status_to_online_rooms_table', 24),
(33, '2025_02_18_081031_create_rooms_table', 25),
(34, '2025_02_18_081122_create_room_bookings_table', 25),
(35, '2025_02_18_081201_create_occupied_rooms_table', 25),
(36, '2025_02_18_082247_create_rooms_table', 26),
(37, '2025_02_18_082252_create_room_bookings_table', 26),
(38, '2025_02_18_082259_create_occupied_rooms_table', 26),
(39, '2025_02_18_085548_create_online_bookings_table', 27),
(40, '2025_02_20_085120_create_booking_room_table', 28),
(41, '2025_02_20_090922_create_booking_room_table', 29),
(42, '2025_02_24_062743_create_daily_incomes_table', 30),
(43, '2025_02_24_062743_create_investments_table', 30),
(44, '2025_02_24_062744_create_daily_expenses_table', 30),
(45, '2025_03_17_063425_create_gallery_table', 31),
(46, '2025_03_17_075122_create_packages_table', 32);

-- --------------------------------------------------------

--
-- Table structure for table `occupied_rooms`
--

CREATE TABLE `occupied_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `online_bookings`
--

CREATE TABLE `online_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `adults` int(11) NOT NULL,
  `kids` int(11) NOT NULL,
  `extra_bed` int(11) DEFAULT 0,
  `num_rooms` int(11) NOT NULL,
  `extra_bed_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `advance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `netamount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('pending','confirmed','canceled','Checked Out') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `online_bookings`
--

INSERT INTO `online_bookings` (`id`, `customer_name`, `customer_phone`, `check_in`, `check_out`, `adults`, `kids`, `extra_bed`, `num_rooms`, `extra_bed_price`, `price`, `total_price`, `advance`, `discount`, `netamount`, `room_id`, `status`, `created_at`, `updated_at`) VALUES
(10, 'Jitu  Patel', '9090908877', '2025-02-21', '2025-02-22', 2, 1, 1, 1, 500.00, 6800.00, 7300.00, 3650.00, 0.00, 7300.00, NULL, 'Checked Out', '2025-02-21 01:30:25', '2025-02-21 01:33:58'),
(11, 'Divyesh Patel', '7069141829', '2025-02-21', '2025-02-22', 6, 2, 1, 2, 500.00, 6800.00, 14100.00, 7050.00, 0.00, 14100.00, NULL, 'Checked Out', '2025-02-21 01:32:01', '2025-02-21 01:32:54'),
(12, 'Nikhil Pokar', '7069141829', '2025-02-21', '2025-02-22', 3, 1, 0, 2, 0.00, 6800.00, 13600.00, 6800.00, 0.00, 13600.00, NULL, 'Checked Out', '2025-02-21 01:56:54', '2025-02-21 02:01:11'),
(13, 'Kishan Patel', '7898908756', '2025-02-21', '2025-02-22', 6, 1, 1, 2, 500.00, 6800.00, 14100.00, 7050.00, 0.00, 14100.00, NULL, 'Checked Out', '2025-02-21 02:02:18', '2025-02-21 02:30:21'),
(14, 'Bhanu Aarya', '9879572522', '2025-02-21', '2025-02-23', 10, 2, NULL, 4, 0.00, 6800.00, 54400.00, 27200.00, 0.00, 54400.00, NULL, 'Checked Out', '2025-02-21 02:38:06', '2025-02-21 02:56:58'),
(15, 'Singh Somnath', '9878767655', '2025-02-23', '2025-02-24', 2, 0, 0, 1, 0.00, 6800.00, 6800.00, 3400.00, 0.00, 6800.00, NULL, 'Checked Out', '2025-02-21 02:52:21', '2025-02-21 02:57:02'),
(16, 'Dev Chauhan', '7898767899', '2025-02-21', '2025-02-23', 2, 1, 1, 1, 1000.00, 6800.00, 14600.00, 7300.00, 0.00, 14600.00, NULL, 'Checked Out', '2025-02-21 04:21:27', '2025-02-21 04:40:59'),
(18, 'Mihir Patel', '9876787678', '2025-03-06', '2025-03-07', 2, 1, 1, 1, 500.00, 6800.00, 7300.00, 3650.00, 0.00, 7300.00, NULL, 'confirmed', '2025-03-07 02:18:03', '2025-03-07 02:18:17'),
(19, 'Jayveer Patel', '9898989898', '2025-03-08', '2025-03-09', 3, 1, 1, 1, 500.00, 6800.00, 7300.00, 3650.00, 0.00, 7300.00, NULL, 'Checked Out', '2025-03-07 23:38:33', '2025-03-07 23:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `type` enum('picnic','room') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `time`, `details`, `price`, `type`, `created_at`, `updated_at`) VALUES
(1, '09:00 AM To 9:00 PM', 'Breakfast, Lunch, HiTea & Dinner', 1500.00, 'picnic', '2025-03-17 02:30:06', '2025-03-17 03:07:08'),
(3, '09:00 AM To 5:00 PM', 'Breakfast, Lunch, HiTea', 1200.00, 'picnic', '2025-03-17 02:32:37', '2025-03-17 02:43:43'),
(5, '11:00 AM To 9:00 PM', 'Lunch, HiTea & Dinner', 1350.00, 'picnic', '2025-03-17 02:35:04', '2025-03-17 02:44:14'),
(6, '04:00 PM To 9:00 PM', 'HiTea & Dinner', 850.00, 'picnic', '2025-03-17 02:47:45', '2025-03-17 02:47:45'),
(7, '11:00 AM To 11:00 AM', 'All Facilities', 6800.00, 'room', '2025-03-17 02:50:29', '2025-03-17 02:50:29');

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
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_date` date NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `net_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `purchase_date`, `vendor_name`, `net_amount`, `created_at`, `updated_at`) VALUES
(1, '2025-02-03', 'SHREE UMIYAJI MASHINARY,HARDWARE AND SENETARY STORES', 750.00, '2025-02-11 03:35:57', '2025-02-11 03:35:57'),
(2, '2025-03-04', 'SHREE UMIYAJI MASHINARY,HARDWAR AND SENETARY STORES', 5050.00, '2025-03-04 01:00:13', '2025-03-04 01:00:13');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_items`
--

INSERT INTO `purchase_items` (`id`, `purchase_id`, `item_name`, `rate`, `qty`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cement', 350.00, 2, 700.00, '2025-02-11 03:35:57', '2025-02-11 03:35:57'),
(2, 1, 'Hathodi', 1.00, 50, 50.00, '2025-02-11 03:35:57', '2025-02-11 03:35:57'),
(3, 2, 'U Clamp', 5.00, 10, 50.00, '2025-03-04 01:00:13', '2025-03-04 01:00:13'),
(4, 2, 'Jaquar Wash Basin', 1.00, 5000, 5000.00, '2025-03-04 01:00:13', '2025-03-04 01:00:13');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_number` varchar(255) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `price_per_night` decimal(8,2) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `maintenance` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_number`, `room_type`, `capacity`, `price_per_night`, `is_available`, `maintenance`, `created_at`, `updated_at`) VALUES
(1, '1', 'Tent', 2, 6800.00, 0, 0, '2025-02-18 04:09:31', '2025-03-07 02:18:17'),
(2, '2', 'Tent', 2, 6800.00, 0, 0, '2025-02-18 04:18:26', '2025-03-04 00:18:44'),
(3, '3', 'Tent', 2, 6800.00, 1, 0, '2025-02-18 04:37:31', '2025-03-07 23:40:41'),
(4, '4', 'Tent', 2, 6800.00, 1, 0, '2025-02-18 04:37:55', '2025-02-21 02:56:58'),
(5, '5', 'Tent', 2, 6800.00, 1, 0, '2025-02-18 04:38:15', '2025-02-21 02:56:58'),
(6, '6', 'Tent', 2, 6800.00, 1, 0, '2025-02-18 04:38:33', '2025-02-21 02:57:02'),
(7, '7', 'Tent', 2, 6800.00, 1, 0, '2025-02-18 04:38:56', '2025-02-20 03:40:50'),
(8, '8', 'Tent', 2, 6800.00, 1, 0, '2025-02-18 04:39:14', '2025-02-20 04:28:05'),
(9, '9', 'Tent', 2, 6800.00, 1, 0, '2025-02-18 04:39:35', '2025-02-20 04:44:17'),
(10, '10', 'Tent', 2, 6800.00, 1, 0, '2025-02-18 04:40:51', '2025-02-20 04:44:17'),
(11, '11', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:18:27', '2025-02-20 04:46:31'),
(12, '12', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:18:38', '2025-02-20 04:46:31'),
(13, '13', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:18:56', '2025-02-20 04:52:42'),
(14, '14', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:19:10', '2025-02-20 04:52:42'),
(15, '15', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:19:23', '2025-02-21 01:32:54'),
(16, '16', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:19:41', '2025-02-21 01:32:54'),
(17, '17', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:19:59', '2025-02-21 00:59:27'),
(18, '18', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:20:16', '2025-02-19 00:20:16'),
(19, '19', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:20:32', '2025-02-19 00:20:32'),
(20, '20', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:20:44', '2025-02-19 00:20:44'),
(21, '21', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:20:59', '2025-02-19 00:20:59'),
(22, '22', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:21:13', '2025-02-19 00:21:13'),
(23, '23', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:21:27', '2025-02-19 00:21:27'),
(24, '24', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:21:38', '2025-02-19 00:21:38'),
(25, '25', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:21:55', '2025-02-19 00:21:55'),
(26, '26', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:22:08', '2025-02-19 00:22:08'),
(27, '27', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:22:28', '2025-02-19 00:22:28'),
(28, '28', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:22:42', '2025-02-19 00:22:42'),
(29, '29', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:22:56', '2025-02-19 00:22:56'),
(30, '30', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:23:08', '2025-02-19 00:23:08'),
(31, '31', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:23:24', '2025-02-19 00:23:24'),
(32, '32', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:23:37', '2025-02-19 00:23:37'),
(33, '33', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:23:48', '2025-02-19 00:23:48'),
(34, '34', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:24:05', '2025-02-19 00:24:05'),
(35, '35', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:24:17', '2025-02-19 00:24:17'),
(36, '36', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:24:33', '2025-02-19 00:24:33'),
(37, '37', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:24:47', '2025-02-19 00:24:47'),
(38, '38', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:25:00', '2025-02-19 00:25:00'),
(39, '39', 'Tent', 2, 6800.00, 1, 0, '2025-02-19 00:25:13', '2025-02-19 00:25:13'),
(40, '40', 'Tent XL', 4, 13600.00, 1, 0, '2025-02-19 00:26:46', '2025-02-19 00:26:46'),
(41, '41', 'Tent XL', 4, 13600.00, 1, 0, '2025-02-19 00:27:16', '2025-02-19 00:27:16'),
(42, '42', 'Tent XL', 4, 13600.00, 1, 0, '2025-02-19 00:27:35', '2025-02-19 00:27:35'),
(43, '43', 'Tent XXL', 14, 32000.00, 1, 0, '2025-02-19 00:28:10', '2025-02-19 00:28:10'),
(44, '44', 'Tent XXL', 14, 32000.00, 1, 0, '2025-02-19 00:28:30', '2025-02-19 00:28:30'),
(45, '45', 'Tent XXXL', 20, 46000.00, 1, 0, '2025-02-19 00:28:56', '2025-02-19 00:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `room_bookings`
--

CREATE TABLE `room_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `checkout_date_time` datetime DEFAULT NULL,
  `adults` int(11) NOT NULL,
  `kids` int(11) NOT NULL,
  `extra_bed` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `extra_bed_price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `total_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `advance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `netamount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` varchar(255) NOT NULL DEFAULT 'Not Allotted',
  `booked_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_bookings`
--

INSERT INTO `room_bookings` (`id`, `room_id`, `customer_name`, `customer_phone`, `check_in`, `check_out`, `checkout_date_time`, `adults`, `kids`, `extra_bed`, `price`, `extra_bed_price`, `total_price`, `advance`, `discount`, `netamount`, `status`, `booked_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Divyesh Patel', '7069141820', '2025-02-19', '2025-02-20', '2025-02-21 06:58:59', 2, 1, 1, 6800.00, 500.00, 7300.00, 2000.00, 0.00, 7300.00, 'Checked Out', 'Offline', '2025-02-19 01:01:50', '2025-02-21 01:28:59'),
(2, 1, 'Vansh Joshi', '9898989898', '2025-02-20', '2025-02-21', '2025-02-21 06:40:12', 3, 1, 2, 6800.00, 1000.00, 7800.00, 3000.00, 1000.00, 6800.00, 'Checked Out', 'Offline', '2025-02-19 01:49:28', '2025-02-21 01:10:12'),
(4, 2, 'Jay Mahakal', '9898765434', '2025-02-19', '2025-02-20', NULL, 2, 1, 1, 6800.00, 500.00, 7300.00, 1000.00, 0.00, 7300.00, 'Checked Out', 'Offline', '2025-02-19 02:47:22', '2025-02-19 03:19:04'),
(5, 3, 'Jayesh Vegda', '9898989898', '2025-02-21', '2025-02-22', '2025-02-21 06:34:42', 2, 0, 0, 6800.00, 0.00, 6800.00, 2000.00, 300.00, 6500.00, 'Checked Out', 'Offline', '2025-02-19 03:04:26', '2025-02-21 01:04:42'),
(6, 4, 'Vivek Makwana', '9898989898', '2025-02-21', '2025-02-22', '2025-02-20 05:39:14', 2, 0, 0, 6800.00, 0.00, 6800.00, 1000.00, 300.00, 6500.00, 'Checked Out', 'Offline', '2025-02-19 03:05:52', '2025-02-20 00:09:14'),
(7, 2, 'Avdhesh Patel', '9876565654', '2025-02-20', '2025-02-21', '2025-02-21 06:38:06', 2, 1, 1, 6800.00, 500.00, 7300.00, 1000.00, 300.00, 7000.00, 'Checked Out', 'Offline', '2025-02-20 00:44:32', '2025-02-21 01:08:06'),
(8, 1, 'Dhaval Patel', '7898908756', '2025-02-21', '2025-02-22', '2025-02-21 07:30:31', 2, 1, 1, 6800.00, 500.00, 7300.00, 2500.00, 300.00, 7000.00, 'Checked Out', 'Offline', '2025-02-21 01:55:15', '2025-02-21 02:00:31'),
(9, 3, 'Naresh Patel', '8987809876', '2025-02-21', '2025-02-22', '2025-02-21 07:54:46', 2, 1, 1, 6800.00, 500.00, 7300.00, 2000.00, 300.00, 7000.00, 'Checked Out', 'Offline', '2025-02-21 02:23:39', '2025-02-21 02:24:46'),
(10, 1, 'Rushi Atrodiya', '9898754665', '2025-02-21', '2025-02-22', '2025-02-21 08:26:26', 2, 1, 1, 6800.00, 500.00, 7300.00, 2000.00, 300.00, 7000.00, 'Checked Out', 'Offline', '2025-02-21 02:53:31', '2025-02-21 02:56:26'),
(11, 1, 'Navrang Pamdya', '9089876788', '2025-02-21', '2025-02-22', '2025-02-21 10:14:05', 2, 1, 1, 6800.00, 500.00, 7300.00, 2000.00, 0.00, 7300.00, 'Checked Out', 'Offline', '2025-02-21 04:43:54', '2025-02-21 04:44:05'),
(12, 1, 'Vansh Joshi', '9876787678', '2025-03-04', '2025-03-05', '2025-03-04 05:47:37', 2, 2, 1, 6800.00, 500.00, 7300.00, 2000.00, 1000.00, 6300.00, 'Checked Out', 'Offline', '2025-03-04 00:17:25', '2025-03-04 00:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `fixed_salary` decimal(10,2) NOT NULL,
  `payable_salary` decimal(10,2) NOT NULL,
  `withdrawal` decimal(10,2) NOT NULL,
  `balance_due` decimal(10,2) NOT NULL DEFAULT 0.00,
  `salary_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `staff_id`, `fixed_salary`, `payable_salary`, `withdrawal`, `balance_due`, `salary_date`, `created_at`, `updated_at`, `status`) VALUES
(14, 1, 15000.00, 15000.00, 20000.00, 5000.00, '2025-02-10', '2025-02-11 00:48:13', '2025-02-11 00:48:13', 'Paid'),
(15, 7, 10000.00, 10000.00, 4000.00, 0.00, '2025-03-31', '2025-03-04 00:21:26', '2025-03-04 00:21:26', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `school_booking`
--

CREATE TABLE `school_booking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sname` varchar(255) NOT NULL,
  `addr` varchar(255) NOT NULL,
  `cn` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `stud` int(11) NOT NULL DEFAULT 0,
  `teacher` int(11) NOT NULL DEFAULT 0,
  `rate` decimal(8,2) NOT NULL DEFAULT 0.00,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `advance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `netamount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Status` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_booking`
--

INSERT INTO `school_booking` (`id`, `admin_id`, `sname`, `addr`, `cn`, `date`, `time`, `stud`, `teacher`, `rate`, `amount`, `advance`, `discount`, `netamount`, `Status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Jay Ambe International School', 'Near Phooldevi Mata temple, Samroli', '7069141829', '2025-01-25', '9:30 to 05 (RS.700)', 100, 0, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-01-24 01:57:21', '2025-01-24 01:57:21'),
(2, NULL, 'AB School', 'College Road, Chikhli', '8799999999', '2025-01-25', '9:30 to 09 (RS.900)', 200, 0, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-01-24 01:59:18', '2025-01-24 01:59:18'),
(3, NULL, 'SIGV School', 'Near NH 48, Malvada, Chikhli', '9900878987', '2025-02-06', '9:30 to 05 (RS.675)', 30, 3, 675.00, 20250.00, 0.00, 0.00, 20250.00, NULL, '2025-02-12 01:46:25', '2025-02-12 01:46:25'),
(4, NULL, 'Valoti Swaminarayan School', 'Valoti, TA:Gandevi', '8988999999', '2025-02-13', '9:30 to 05 (RS.700)', 40, 0, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-02-12 01:50:33', '2025-02-12 01:50:33'),
(5, NULL, 'K.B Patel Highschool', 'Bilimora', '9087876544', '2025-02-06', '9:30 to 05 (RS.675)', 80, 8, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-02-12 01:54:14', '2025-02-12 01:54:14'),
(6, 1, 'Convent School', 'Bilimora', '9087876544', '2025-02-12', '9:30 to 05 (RS.675)', 20, 2, 675.00, 13500.00, 0.00, 0.00, 13500.00, NULL, '2025-02-12 02:06:48', '2025-02-12 02:06:48'),
(7, NULL, 'D.E Italia High School', 'Chikhli', '7069141820', '2025-02-11', '9:30 to 05 (RS.700)', 60, 4, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-02-12 02:07:52', '2025-02-12 02:07:52'),
(8, NULL, 'New Primary School', 'Chikhli Market', '9099090909', '2025-02-01', '9:30 to 09 (RS.900)', 49, 2, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2025-02-12 02:25:19', '2025-02-12 02:25:19'),
(9, 1, 'Jay Ambe International School', 'Near Phooldevi Mata temple, Samroli', '8934213459', '2025-03-06', '9:30 to 05 (RS.700)', 90, 3, 700.00, 63000.00, 0.00, 3000.00, 60000.00, NULL, '2025-03-06 00:19:47', '2025-03-06 00:19:47'),
(10, 1, 'Jay Ambe International School', 'Near Phooldevi Mata temple, Samroli', '8989998877', '2025-03-07', '9:30 to 05 (RS.675)', 100, 5, 675.00, 67500.00, 35000.00, 500.00, 67000.00, 'Checked In', '2025-03-07 01:35:48', '2025-03-07 01:35:48');

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
('Ed9H490rFABVRoRM29v8TWzNbg93VvI1xfvSPpzB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMW5uYks5NlAxQUNOczExYTJub2ZsTmNpSE42VXFLTGFFWTY1MUp4WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wYWNrYWdlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1742201367);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `aadhar_no` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `role` varchar(255) NOT NULL,
  `joining_date` date NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `address`, `aadhar_no`, `contact_no`, `salary`, `role`, `joining_date`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Kishan Patel', 'Chikhli', '893154007069', '7069339178', 15000.00, 'Admin-Manager', '2025-01-01', 'staff_images/doVCA20BHNuQScl1XFtp0kIK6RgnCqbcb56oggSO.jpg', '2025-01-30 01:13:59', '2025-01-30 01:13:59'),
(2, 'Amar Desai', 'Navsari, Gujarat', '893167775431', '8976545654', 16000.00, 'Admin-Cashier', '2024-12-01', 'staff_images/default.jpg', '2025-01-30 01:21:52', '2025-01-30 01:21:52'),
(5, 'Jignesh Desai', 'Kachholi, Navsari, Gujarat', '897613241309', '8976545654', 30000.00, 'Manager', '2023-01-01', 'staff_images/default.jpg', '2025-02-10 04:14:55', '2025-02-10 04:14:55'),
(7, 'Jayesh Patel', 'Bilimora', '890876567654', '9099087876', 10000.00, 'Activity Staff', '2025-03-01', 'staff_images/1741067428.jpeg', '2025-03-04 00:20:28', '2025-03-04 00:20:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `withdrawal_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `staff_id`, `amount`, `withdrawal_date`, `created_at`, `updated_at`) VALUES
(11, 1, 20000.00, '2025-02-10', '2025-02-11 00:48:06', '2025-02-11 00:48:06'),
(12, 2, 3000.00, '2025-02-03', '2025-02-11 00:49:19', '2025-02-11 00:49:19'),
(13, 2, 4000.00, '2025-02-12', '2025-02-11 00:49:36', '2025-02-11 00:49:36'),
(14, 7, 4000.00, '2025-03-04', '2025-03-04 00:21:13', '2025-03-04 00:21:13');

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
-- Indexes for table `admin_bookings`
--
ALTER TABLE `admin_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_bookings_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `agent_booking`
--
ALTER TABLE `agent_booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_booking_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `attandances`
--
ALTER TABLE `attandances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attandances_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_room`
--
ALTER TABLE `booking_room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_room_online_booking_id_foreign` (`online_booking_id`),
  ADD KEY `booking_room_room_id_foreign` (`room_id`);

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
-- Indexes for table `daily_expenses`
--
ALTER TABLE `daily_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_incomes`
--
ALTER TABLE `daily_incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investments`
--
ALTER TABLE `investments`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `kitchen_purchases`
--
ALTER TABLE `kitchen_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kitchen_purchase_items`
--
ALTER TABLE `kitchen_purchase_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kitchen_purchase_items_kitchen_purchase_id_foreign` (`kitchen_purchase_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `occupied_rooms`
--
ALTER TABLE `occupied_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `occupied_rooms_room_id_foreign` (`room_id`);

--
-- Indexes for table `online_bookings`
--
ALTER TABLE `online_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `online_bookings_room_id_foreign` (`room_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_items_purchase_id_foreign` (`purchase_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_bookings`
--
ALTER TABLE `room_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_bookings_room_id_foreign` (`room_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salaries_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `school_booking`
--
ALTER TABLE `school_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_aadhar_no_unique` (`aadhar_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `withdrawals_staff_id_foreign` (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_bookings`
--
ALTER TABLE `admin_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `agent_booking`
--
ALTER TABLE `agent_booking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `attandances`
--
ALTER TABLE `attandances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `booking_room`
--
ALTER TABLE `booking_room`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `daily_expenses`
--
ALTER TABLE `daily_expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `daily_incomes`
--
ALTER TABLE `daily_incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kitchen_purchases`
--
ALTER TABLE `kitchen_purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kitchen_purchase_items`
--
ALTER TABLE `kitchen_purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `occupied_rooms`
--
ALTER TABLE `occupied_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_bookings`
--
ALTER TABLE `online_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `room_bookings`
--
ALTER TABLE `room_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `school_booking`
--
ALTER TABLE `school_booking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_bookings`
--
ALTER TABLE `admin_bookings`
  ADD CONSTRAINT `admin_bookings_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `agent_booking`
--
ALTER TABLE `agent_booking`
  ADD CONSTRAINT `agent_booking_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attandances`
--
ALTER TABLE `attandances`
  ADD CONSTRAINT `attandances_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `booking_room`
--
ALTER TABLE `booking_room`
  ADD CONSTRAINT `booking_room_online_booking_id_foreign` FOREIGN KEY (`online_booking_id`) REFERENCES `online_bookings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_room_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kitchen_purchase_items`
--
ALTER TABLE `kitchen_purchase_items`
  ADD CONSTRAINT `kitchen_purchase_items_kitchen_purchase_id_foreign` FOREIGN KEY (`kitchen_purchase_id`) REFERENCES `kitchen_purchases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `occupied_rooms`
--
ALTER TABLE `occupied_rooms`
  ADD CONSTRAINT `occupied_rooms_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `online_bookings`
--
ALTER TABLE `online_bookings`
  ADD CONSTRAINT `online_bookings_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD CONSTRAINT `purchase_items_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `room_bookings`
--
ALTER TABLE `room_bookings`
  ADD CONSTRAINT `room_bookings_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD CONSTRAINT `withdrawals_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
