-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2019 at 10:17 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpms`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ClientOrganization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OtherInformation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `ClientOrganization`, `country`, `region`, `address`, `OtherInformation`, `created_at`, `updated_at`, `email`) VALUES
(1, 'abc123', 'organisation2', '3', 'region2', 'sdfasdf', 'information', '2019-09-02 04:27:42', '2019-09-02 04:44:45', 'abc4353@gmail.com'),
(2, 'name123', 'organisation23 43', '3', 'region123', 'address', 'other', '2019-09-02 04:51:07', '2019-09-02 04:52:12', 'asdsa@sdgfdg.com'),
(9, 'sfg', 'sgs', '4', 'regionfgdsg', 'dfgdfggg', 'dgdg', '2019-09-02 05:03:40', '2019-09-02 05:03:40', 'gfhsdfg@gmail.com'),
(10, 'cdf4223', 'organisation242', '3', 'region43', 'sdgdfgfd', 'dgfgdfg', '2019-09-02 05:04:12', '2019-09-02 05:04:12', 'cdf4223@gmail.com'),
(11, 'cdf654', 'organisation223', '2', 'region', 'address32', 'other', '2019-09-02 05:16:15', '2019-09-02 05:16:15', 'cdf654@gmail.com'),
(12, 'fdgd', 'fgfdg', '4', 'fgd', 'dgfdgfdgd', 'gffdgdfg', '2019-09-02 09:43:13', '2019-09-02 09:43:13', 'abcdfgfd@gmail.com'),
(13, 'sfsdf', 'sdg', '3', 'dfg', 'dfgfdg', 'dfg', '2019-09-02 09:48:31', '2019-09-02 09:48:31', 'sdgsg@dg.com'),
(14, '56546546456', 'organisation2', '4', 'region', 'sdfdsfsdff', 'fsdsdfsfff', '2019-09-05 05:46:42', '2019-09-05 05:46:42', 'jksdhfsdf@gmail.com'),
(15, 'gfgfdg', 'dfgdfg', '4', 'region43', 'fdgfdggfg', 'fgfdgg', '2019-09-05 05:46:59', '2019-09-05 05:46:59', 'fgfdg');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Australia', NULL, NULL),
(2, 'Colombia', NULL, NULL),
(3, 'India', NULL, NULL),
(4, 'Egypt', NULL, NULL),
(5, 'Finland', NULL, NULL),
(6, 'Greece', NULL, NULL),
(7, 'Indonesia', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Accounts', NULL, NULL),
(3, 'Operations', NULL, NULL),
(4, 'Tech Services', NULL, NULL),
(5, 'Field Engineering', NULL, NULL),
(6, 'Warehouse ', NULL, NULL),
(7, 'Support', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hardware`
--

CREATE TABLE `hardware` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hardware_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_status` int(11) NOT NULL,
  `configuration_status` int(11) NOT NULL,
  `shipped` int(11) NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hardware`
--

INSERT INTO `hardware` (`id`, `hardware_name`, `job_order_number`, `quantity`, `delivery_status`, `configuration_status`, `shipped`, `notes`, `publish`, `created_at`, `updated_at`) VALUES
(5, 'hardware4', '72037873434334324', '4', 1, 2, 2, 'notes for hxcv', 1, '2019-10-03 10:26:57', '2019-10-09 15:01:10'),
(6, 'hardware2', '72037873434334324', '4', 1, 2, 2, '', 0, '2019-10-03 10:42:20', '2019-10-03 10:42:20'),
(7, 'hardware1', '72037873434334324', '1', 0, 0, 0, '', 0, '2019-10-03 11:04:58', '2019-10-03 11:04:58'),
(8, 'hardware1', '72037873434334324', '2', 1, 1, 1, '', 0, '2019-10-03 11:06:01', '2019-10-03 11:06:01'),
(9, 'hardware4', '72037873434334324', '6', 1, 1, 2, '', 0, '2019-10-03 11:07:04', '2019-10-03 11:07:04'),
(10, 'hardware2', '72037873434334324', '2', 1, 1, 1, 'sdfdsgdg', 0, '2019-10-03 11:08:05', '2019-10-03 11:08:05'),
(11, 'hardware2', '72037873434334324', '3', 1, 1, 1, 'gdfg', 0, '2019-10-03 11:30:25', '2019-10-03 11:30:25'),
(12, 'hardware2', '72037873434334324', '3', 1, 1, 1, 'gdfg', 0, '2019-10-03 11:30:55', '2019-10-03 11:30:55'),
(13, 'hardware2', '2384293995', '4', 0, 0, 0, 'adfd', 0, '2019-10-03 13:31:52', '2019-10-03 13:31:52'),
(14, 'hardware2', '2384293995', '5', 0, 1, 2, 'dsfsdf', 0, '2019-10-03 13:42:59', '2019-10-03 13:42:59'),
(15, 'hardware2', '72037873434334324', '3', 1, 2, 1, 'sdfdsfdsf', 0, '2019-10-03 14:36:02', '2019-10-03 14:36:02'),
(16, 'hardware3', '72037873434334324', '5', 1, 1, 1, 'sdfd', 0, '2019-10-03 14:46:50', '2019-10-03 14:46:50'),
(17, 'hardware2', '72037873434334324', '3', 1, 1, 2, 'dfdsf', 0, '2019-10-03 14:47:07', '2019-10-03 14:47:07'),
(18, 'hardware2', '72037873434334324', '2', 1, 1, 2, 'dfsdfsfs', 0, '2019-10-03 14:47:25', '2019-10-03 14:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `job_orders`
--

CREATE TABLE `job_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quote_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quote_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scope` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dat_of_request` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `po_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_pm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_id` int(11) NOT NULL,
  `invoice_status` int(200) NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_orders`
--

INSERT INTO `job_orders` (`id`, `job_order_number`, `quote_number`, `quote_value`, `description`, `scope`, `hotel_name`, `address`, `city`, `post_code`, `country`, `hotel_contact`, `dat_of_request`, `po_number`, `client_pm`, `task_id`, `invoice_status`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(18, '72037873434334324', '45435435435', '543545444', 'dgdf stdt', 'fghfgh', 'Hotel Pluto', 'dfgfdfg dgfgfdg drgdffdg rgfd', 'city', '64654656', '5', '6576656', '2019-09-30', '5656656', '14', 3, 2, 2, NULL, '2019-09-23 14:24:30', '2019-10-03 14:47:25'),
(20, '4018703128', '6766776', 'fsdff', 'fgfdgdgfd', '45', 'dfdgt', 'dfgdfggd', 'dgdfg', '66475665', '5', '54354353453', '2019-09-28', '43534', '12', 0, 0, 0, NULL, '2019-09-26 10:06:44', '2019-09-26 10:06:44'),
(21, '2655541302', '6766776', 'sdgfdgdf', 'dfgdg sdgdg', '56464654', 'dgd df', 'dfdfgfdg', 'fhfh', '54354454', '5', '54354353453', '2019-09-28', '65566456', '14', 0, 0, 0, NULL, '2019-09-26 10:23:20', '2019-09-26 10:23:20'),
(22, '2384293995', '6766776', '443435345', 'fdgfd dfgfdgdg dfhdf', 'fdgdfgdfg', '465465', 'dhdhghdgh', 'dfgd', '54436', '2', '54354353453', '2019-09-28', '45654665', '12', 0, 0, 2, NULL, '2019-09-26 10:51:32', '2019-10-03 13:42:59'),
(23, '1867865263', '45435435435', '5465464', 'ffgh sgdfg sdfgfdg fdgfdg fdg', 'fdgdfgdfg', 'gbdg', 'dghghh fhgffg', 'dfgdf', '56546', '5', '56546546456', '2019-09-28', '656567', '13', 0, 3, 0, NULL, '2019-09-26 11:51:14', '2019-09-26 11:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_08_122732_create_permission_tables', 2),
(5, '2019_08_08_122841_create_products_table', 3),
(6, '2019_08_16_105156_add_profileimage_to_users', 4),
(7, '2019_08_16_105815_add_profileimage_to_users', 5),
(8, '2019_08_16_110201_add_profileimage_to_users', 6),
(9, '2019_08_19_082936_addfields_in_usertable', 7),
(10, '2019_08_19_093809_departmenttable', 8),
(11, '2019_08_19_114932_user_has_department', 9),
(12, '2019_08_20_105028_clienttable', 10),
(13, '2019_08_28_100000_country', 11),
(14, '2019_08_28_100934_country_insert', 12),
(15, '2019_08_29_114308_task_list', 13),
(16, '2019_08_28_134144_clienttable', 14),
(17, '2019_08_29_150152_job_order', 15),
(18, '2019_09_02_100235_addemail_in_clienttable', 16),
(19, '2019_09_03_094027_project_notes', 17),
(20, '2019_09_11_124111_notifaction', 18),
(21, '2019_10_01_165919_hardware', 19);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'BPMS\\User', 3),
(2, 'BPMS\\User', 23),
(3, 'BPMS\\User', 1),
(4, 'BPMS\\User', 4),
(4, 'BPMS\\User', 37),
(13, 'BPMS\\User', 2),
(13, 'BPMS\\User', 53),
(14, 'BPMS\\User', 52),
(14, 'BPMS\\User', 57);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `note`, `project_id`, `created_at`, `updated_at`) VALUES
(8, '<p>Add your Project Note</p>', 5, '2019-09-03 08:21:57', '2019-09-03 08:21:57'),
(9, '<p>Add your Project Notesdfds</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>sdflkdsjfsd</p>\r\n\r\n<p>sdjdflk</p>', 5, '2019-09-03 08:56:43', '2019-09-03 08:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `job_order_number`, `user_id`, `role`, `type`, `status`, `created_at`, `updated_at`) VALUES
(70, '7203453434334324', '4', 'Operations', 'jobNotification', '2', '2019-09-24 10:31:21', '2019-09-24 10:31:42');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', NULL, NULL),
(2, 'role-create', 'web', NULL, NULL),
(3, 'role-edit', 'web', NULL, NULL),
(4, 'role-delete', 'web', NULL, NULL),
(5, 'product-list', 'web', NULL, NULL),
(6, 'product-create', 'web', NULL, NULL),
(7, 'product-edit', 'web', NULL, NULL),
(8, 'product-delete', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `detail`, `created_at`, `updated_at`) VALUES
(2, 'Product first', 'Product first', '2019-08-08 09:09:17', '2019-08-08 09:09:17'),
(3, 'Product third', 'Product third', '2019-08-08 09:10:28', '2019-08-08 09:10:45');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'Support', 'web', NULL, NULL),
(3, 'Admin', 'web', NULL, NULL),
(4, 'Operations', 'web', NULL, NULL),
(13, 'Accounts', 'web', '2019-09-04 03:49:19', '2019-09-04 03:49:19'),
(14, 'Tech Services', 'web', '2019-09-04 03:52:22', '2019-09-04 03:52:22');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(5, 4),
(5, 13),
(5, 14),
(6, 2),
(6, 3),
(6, 14),
(7, 3),
(7, 4),
(8, 2),
(8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tasklists`
--

CREATE TABLE `tasklists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasklists`
--

INSERT INTO `tasklists` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'IPTV DEPLOYMENT2', NULL, '2019-09-06 09:09:49'),
(3, 'HSIA & IPTV DEPLOYMENT', '2019-09-02 08:38:31', '2019-09-02 08:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `profile_image`, `dob`, `employee_number`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$.gSMsF2HkicbvJoumcm/OOu0AedlwIEBZ96a0lUQbPV4/zykFJNJS', NULL, NULL, '2019-09-20 10:44:25', 'user-image-1568976265-829384329.jpg', '2019-08-21', '34535435345'),
(2, 'accountsUser', 'accountsuser@gmail.com', NULL, '$2y$10$e9bX3iVUwdOVx9TihHmJku5dKnsy7PERb2IvnQhQMiZmdJ1w/bFdG', NULL, '2019-08-08 09:07:35', '2019-09-25 09:47:24', 'user-image-1568976641-1001910206.jpg', '2019-08-23', '544546564'),
(3, 'supportuser', 'supportuser@gmail.com', NULL, '$2y$10$jOVYje0X8gekkX//aTA0Ru/zFUDZCFjNlCy97nn0WqlXfwa8dUz8S', NULL, '2019-08-08 09:18:12', '2019-09-20 10:50:59', 'user-image-1568976659-1930463828.jpg', '2019-08-24', '34535435'),
(4, 'Operations', 'operations@gmail.com', NULL, '$2y$10$biOhUORqgBBNW5MDEYq2geLw/5CSNjkL8Gg6mGAse5kvuXy/rfqCW', NULL, '2019-08-08 09:20:10', '2019-09-20 10:42:17', 'user-image-1568976137-369436525.jpg', '2019-08-23', '534543'),
(57, 'techservice', 'techservice@gmail.com', NULL, '$2y$10$4jmjAJ0tqrZG8OlnCRp2TufyeRI8/oxSAsintd.CO2ILbTIAQPtu2', NULL, '2019-09-25 14:41:07', '2019-09-25 14:41:07', 'user-image-1569422466-798926496.jpg', '2019-09-27', '534543');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_departments`
--

CREATE TABLE `user_has_departments` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_has_departments`
--

INSERT INTO `user_has_departments` (`user_id`, `department_id`) VALUES
(1, 1),
(2, 2),
(3, 7),
(4, 3),
(38, 2),
(38, 3),
(40, 3),
(40, 5),
(42, 1),
(43, 1),
(44, 2),
(45, 1),
(47, 2),
(52, 4),
(53, 2),
(57, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_id_unique` (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_id_unique` (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hardware`
--
ALTER TABLE `hardware`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_orders`
--
ALTER TABLE `job_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_order_id_unique` (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notes_id_unique` (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notification_id_unique` (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `tasklists`
--
ALTER TABLE `tasklists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tasklist_id_unique` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_has_departments`
--
ALTER TABLE `user_has_departments`
  ADD PRIMARY KEY (`user_id`,`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hardware`
--
ALTER TABLE `hardware`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `job_orders`
--
ALTER TABLE `job_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tasklists`
--
ALTER TABLE `tasklists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
