-- phpMyAdmin SQL Dump
-- version 4.4.7deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 06, 2015 at 11:29 AM
-- Server version: 5.6.27-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thodaico`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(11) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` bigint(11) NOT NULL,
  `updated_by` bigint(11) NOT NULL,
  `created_at` bigint(11) NOT NULL,
  `updated_at` bigint(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `status`, `token`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'abc', 'N8xQasdfasdf', NULL, NULL, 1, 'adfsd', 1, 0, 1449370223, 1449370223),
(2, 'def', 'iO9CItVah0', NULL, NULL, 1, 'sdfsdfs', 1, 0, 1449370396, 1449370396),
(3, 'First test', 'dfbvxcvtATqkhSP94d', NULL, NULL, 1, 'sdfgdfgdfg', 1, 0, 1449370969, 1449370969),
(4, 'First test', '7dcvueL6rx', NULL, NULL, 1, 'sdfgdfgdfgsdfse', 1, 0, 1449371442, 1449371442),
(5, 'First test', 'OioQq3KLRg', NULL, NULL, 1, 'asdfasdfsdf', 1, 0, 1449371633, 1449371633),
(6, 'First test  test    test', 'yKHmL1xcib', NULL, NULL, 1, 'adfasdgsdfsd', 1, 0, 1449371680, 1449371680),
(7, 'First test  test    test', 'IESUZ1A65K', NULL, NULL, 1, 'asdfsdfasdfs', 1, 0, 1449371804, 1449371804),
(8, 'Create a new category', 'Create-a-new-category', NULL, NULL, 1, 'k2OiXNHq65h4fu', 1, 0, 1449375436, 1449376076),
(9, 'Bang keo 2 mat   hien dai 8asdf9s8923#$%#$', 'Bang-keo-2-mat-hien-dai-8asdf9s8923', NULL, NULL, 1, 'FdC3UV7IHKAlm6', 1, 1, 1449375480, 1449375480),
(10, 'Bang keo 2 mat   hien dai 8asdf9s8923#$%#$', 'Bang-keo-2-mat-hien-dai-8asdf9s8923', NULL, NULL, 1, 'PEloh5wUtQKMIc', 1, 1, 1449375489, 1449375489),
(11, 'Bang keo 2 mat   hien dai 8asdf9s8923#$%#$', 'Bang-keo-2-mat-hien-dai-8asdf9s8923', NULL, NULL, 1, 'kWdHrqM42xygQl', 1, 1, 1449375502, 1449375502);

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `id` bigint(11) unsigned NOT NULL,
  `user_id` bigint(11) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `created_by` bigint(11) unsigned NOT NULL,
  `created_at` bigint(20) NOT NULL,
  `updated_at` bigint(20) NOT NULL,
  `ip_request` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `passwords`
--

CREATE TABLE IF NOT EXISTS `passwords` (
  `id` bigint(11) unsigned NOT NULL,
  `user_id` bigint(11) unsigned NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `created_by` bigint(11) unsigned NOT NULL,
  `created_date` bigint(20) NOT NULL,
  `ip_request` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(11) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `original` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `width` int(11) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `category_id` bigint(11) NOT NULL,
  `created_by` bigint(11) NOT NULL,
  `created_at` bigint(11) NOT NULL,
  `updated_at` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` tinyint(1) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` bigint(11) unsigned NOT NULL DEFAULT '1',
  `created_at` bigint(11) NOT NULL,
  `updated_at` bigint(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 1, 20151122080029, 20151122080156),
(2, 'Moderator', 1, 20151122080113, 0),
(3, 'User', 1, 20151122080229, 0),
(4, 'Test', 1, 1449153835, 1449153946);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` bigint(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(11) unsigned NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthdate` bigint(11) DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sex` tinyint(1) unsigned DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `role_id` tinyint(1) unsigned NOT NULL DEFAULT '4',
  `balance` double DEFAULT '0',
  `currency` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` bigint(11) unsigned NOT NULL,
  `created_at` bigint(11) NOT NULL,
  `updated_at` bigint(11) NOT NULL,
  `last_activity` bigint(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `validations`
--

CREATE TABLE IF NOT EXISTS `validations` (
  `id` bigint(11) unsigned NOT NULL,
  `user_id` bigint(11) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `ip_request` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` bigint(20) NOT NULL,
  `created_by` bigint(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passwords`
--
ALTER TABLE `passwords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `validations`
--
ALTER TABLE `validations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `passwords`
--
ALTER TABLE `passwords`
  MODIFY `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `validations`
--
ALTER TABLE `validations`
  MODIFY `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
