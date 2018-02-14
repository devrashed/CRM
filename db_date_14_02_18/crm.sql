-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2018 at 06:25 AM
-- Server version: 5.5.58-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `marketer_id` int(10) unsigned DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `infos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `where_come` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clients_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `marketer_id`, `email`, `infos`, `company_name`, `where_come`, `business_type`, `client_status`, `project_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'denjoe12@gmail.com', '{"fullname":"Den Joe","address":"State Road","city":"Texas","state":"3256","phone1":"0992345","phone2":"0992346"}', 'UY systems ltd.', 'Upwork', 'Software Company', '1', 'EMS', 1, '2018-01-28 09:43:46', '2018-01-28 09:43:46'),
(2, 2, 'michelejson12@gmail.com', '{"fullname":"Michele Json","address":"State Road","city":"Texas","state":"3256","phone1":"0992345","phone2":"992344"}', 'BD Icon ltd.', 'Fiverr', 'Agro Farm', '2', 'AMS', 1, '2018-01-28 12:31:32', '2018-01-28 12:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `developers`
--

CREATE TABLE IF NOT EXISTS `developers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `developers_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `developers`
--

INSERT INTO `developers` (`id`, `name`, `email`, `password`, `usertype`, `created_at`, `updated_at`) VALUES
(1, 'murad', 'murad@gmail.com', '12345', 1, '2018-01-22 02:09:55', '2018-01-22 02:09:55'),
(2, 'Jisan', 'jisan@gmail.com', '$2y$10$sIINj.DJtyx2dGCUtcyfQ.s5S93SaWfqxKdXGntzPsq5todnVwCQe', 2, '2018-01-22 02:13:27', '2018-01-22 02:13:27'),
(3, 'Rashed', 'rashed@gmail.com', '$2y$10$hllyiJxn7mBEHpfKR8gfMeXpII6Je3Q6IUj0U0SfBaR1jYBijTytW', 1, '2018-01-23 02:24:49', '2018-01-23 02:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `discussions`
--

CREATE TABLE IF NOT EXISTS `discussions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `project_req` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_prosal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposal_send` int(11) NOT NULL,
  `flow_date` date NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_status` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `discussions`
--

INSERT INTO `discussions` (`id`, `service_id`, `client_id`, `project_req`, `project_prosal`, `proposal_send`, `flow_date`, `comment`, `project_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'I want to a ecommerce site', '1518267149.docx', 1, '2018-02-17', 'The first meet up with client  and send me project proposal', 1, 1, '2018-02-10 06:52:29', '2018-02-10 06:52:29'),
(2, 1, 2, 'I want to create a Web site', '1518372759.pdf', 1, '2018-02-20', 'We got the project', 2, 1, '2018-02-11 12:12:39', '2018-02-11 12:12:39'),
(3, 4, 2, 'Want to crate android apps', '1518522338.docx', 2, '2018-02-16', 'Let''s talk about', 2, 1, '2018-02-13 05:45:38', '2018-02-13 05:45:38'),
(4, 3, 2, 'Want to website maintenance', '1518551506.docx', 1, '2018-02-17', 'Start communication', 1, 1, '2018-02-13 13:51:46', '2018-02-13 13:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `marketers`
--

CREATE TABLE IF NOT EXISTS `marketers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `infos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `marketers_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `marketers`
--

INSERT INTO `marketers` (`id`, `email`, `infos`, `created_at`, `updated_at`) VALUES
(1, 'murad@gmail.com', '{"fullname":"murad","address":"demra","city":"dhaka","phone":"098"}', '2018-01-25 04:03:56', '2018-01-25 04:03:56'),
(2, 'mehedi@gmail.com', '{"fullname":"Mehedi Hasan","address":"Uttor Baddha","city":"Dhaka","phone":"01914335606"}', '2018-01-25 10:49:52', '2018-01-25 10:49:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_01_01_174130_create_developers_table', 1),
(4, '2018_01_23_060517_create_marketers_table', 2),
(6, '2018_01_27_164516_create_clients_table', 3),
(7, '2018_01_30_162537_create_services_table', 4),
(8, '2018_02_10_103045_create_discussions_table', 5),
(11, '2018_02_13_080022_create_projectstatuses_table', 6),
(12, '2018_02_13_183724_add_where_come_to_clients', 7),
(13, '2018_02_13_194413_remove_current_date_to_discussions', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_statuses`
--

CREATE TABLE IF NOT EXISTS `project_statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `service_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `developer_id` int(11) NOT NULL,
  `project_post` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_send` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_status` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `project_statuses`
--

INSERT INTO `project_statuses` (`id`, `service_name`, `developer_id`, `project_post`, `file_send`, `comment`, `project_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Web design & Development', 3, 'All discussion are complete', '1518515820.docx', 'Now start this project', 2, 1, '2018-02-13 03:57:00', '2018-02-13 03:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `service_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Web design & Development', 1, '2018-01-30 10:39:15', '2018-01-30 10:39:15'),
(2, 'eCommerce Development', 1, '2018-01-30 10:40:31', '2018-01-30 10:40:31'),
(3, 'Website Maintenance', 1, '2018-01-30 10:47:07', '2018-01-30 10:47:07'),
(4, 'Android Apps', 1, '2018-01-30 10:47:38', '2018-01-30 10:47:38'),
(5, 'iPhone Apps', 1, '2018-01-30 10:47:52', '2018-01-30 10:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Murad', 'murad@gmail.com', '$2y$10$jn/oH7GpGhaWfrMRIGwK3e/kFNPu7yYV0d0FbWc/ROq.ZTI6owC9m', 'IQaVkQ08MHR9kBLQoDfFk3MGOgY0t2iLbylmV0B1Tvj8k0vJrH1i79mHnyvc', '2018-01-01 13:59:38', '2018-01-01 13:59:38');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
