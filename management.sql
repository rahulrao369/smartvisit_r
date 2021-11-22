-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 15, 2021 at 02:58 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `image`, `name`, `email`, `email_verified_at`, `password`, `created_at`, `updated_at`) VALUES
(1, 'default.png', 'admin', 'admin@admin.com', NULL, '$2y$10$Ep9M7gk/3vtv8grwcfzi4ufWyHvrsq.ojyiERSGA.ehs4JuKR40fe', NULL, '2021-04-15 02:14:51');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_04_14_102738_create_admins_table', 1),
(4, '2021_04_14_115733_create_stocks_table', 2),
(7, '2014_10_12_000000_create_users_table', 3),
(8, '2021_04_15_080934_create_stock_histories_table', 4);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `buying_price` double(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=>active',
  `is_deleted` int(11) NOT NULL DEFAULT 0 COMMENT '1=>deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `buying_price`, `total_amount`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(2, 'Keyboard', 3, 10.00, '100.00', 1, 0, '2021-04-14 12:03:56', '2021-04-15 06:15:42'),
(3, 'Monitor', 20, 12.00, '220.00', 1, 0, '2021-04-14 12:03:05', '2021-04-15 04:43:52'),
(8, 'Mouse', 10, 20.00, '200.00', 1, 0, '2021-04-14 23:59:58', '2021-04-14 23:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `stock_histories`
--

CREATE TABLE `stock_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `buying_price` double(10,2) NOT NULL,
  `selling_price` double(10,2) NOT NULL,
  `date` date NOT NULL,
  `stock_end_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=>active',
  `is_deleted` int(11) NOT NULL DEFAULT 0 COMMENT '1=>deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_histories`
--

INSERT INTO `stock_histories` (`id`, `client_id`, `product_id`, `quantity`, `buying_price`, `selling_price`, `date`, `stock_end_date`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 5, 10.00, 12.00, '2021-04-15', '2021-04-15', 1, 0, '2021-04-15 05:19:09', '2021-04-15 05:19:09'),
(2, 1, 2, 1, 10.00, 12.00, '2021-04-15', '2021-04-15', 1, 0, '2021-04-15 05:33:40', '2021-04-15 05:33:40'),
(3, 1, 2, 1, 10.00, 15.00, '2021-04-15', '2021-04-15', 1, 0, '2021-04-15 05:34:46', '2021-04-15 05:34:46'),
(4, 1, 2, 1, 10.00, 15.00, '2021-04-15', '2021-04-15', 1, 0, '2021-04-15 05:35:18', '2021-04-15 05:35:18'),
(5, 1, 2, 1, 10.00, 12.00, '2021-04-15', '2021-04-15', 1, 0, '2021-04-15 05:35:32', '2021-04-15 05:35:32'),
(6, 2, 2, 1, 10.00, 12.00, '2021-04-15', '2021-04-15', 1, 0, '2021-04-15 05:37:01', '2021-04-15 05:37:01'),
(7, 1, 2, 2, 10.00, 12.00, '2021-04-15', '2021-04-15', 1, 0, '2021-04-15 05:37:45', '2021-04-15 05:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=>active',
  `is_deleted` int(11) NOT NULL DEFAULT 0 COMMENT '1=>deleted',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `name`, `email`, `email_verified_at`, `phone`, `address`, `password`, `status`, `is_deleted`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'default.png', 'Pranav', 'Pranav@mailinator.com', NULL, '9874563210', 'Palasia indore MP', '$2y$10$Un.jMA7Jky5JCWHbnO444OcFAPNPACaeQi5K8vJMdmSRbdemek8RW', 1, 0, NULL, NULL, '2021-04-15 01:40:25'),
(2, 'default.png', 'Riyaz', 'Riyaz@mailinator.com', NULL, '9874563213', 'Khajrana indore MP', '123456789', 1, 0, NULL, NULL, NULL),
(3, 'default.png', 'Devendra', 'Devendra@mailinator.com', NULL, '9874563212', 'sudama indore MP', '123456789', 1, 0, NULL, NULL, NULL),
(4, 'default.png', 'Mona', 'Mona@mailinator.com', NULL, '9874563211', 'Ring road indore MP', '123456789', 1, 0, NULL, NULL, '2021-04-15 01:13:01'),
(5, 'default.png', 'Vishal', 'vishal@mailinator.com', NULL, '9876573210', '3/4 indore', '$2y$10$OhYGprsfkimERpzXfgvQTO0OJ4VPc/c2pzPhY7cPCtVguSCkjdFfu', 1, 1, NULL, '2021-04-15 01:28:48', '2021-04-15 01:32:28');

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_histories`
--
ALTER TABLE `stock_histories`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stock_histories`
--
ALTER TABLE `stock_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
