-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2022 at 05:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_info`
--

CREATE TABLE `client_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_type_id` bigint(20) UNSIGNED NOT NULL,
  `c_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_info`
--

INSERT INTO `client_info` (`id`, `c_type_id`, `c_name`, `c_website`, `c_email`, `c_phone`, `c_address`, `created_at`, `updated_at`) VALUES
(2, 2, 'Sakib', 'http://nobir.com', 'nobir.wd@gmail.com', '01988406007', 'Dhaka-1207', '2022-06-02 05:18:04', '2022-06-06 06:27:45'),
(7, 4, 'Nobir', 'http://nobir.com', 'nobir.wd@gmail.com', 'N/A', 'N/A', '2022-06-02 08:26:46', '2022-06-02 08:26:46'),
(8, 5, 'Salman', 'https://github.com/', 'salman@gmail.com', '01705644008', 'South Goran', '2022-06-06 06:26:22', '2022-06-06 06:26:22'),
(10, 2, 'Hera', 'https://www.facebook.com/', 'hera@gmail.com', '01705644009', 'khilgaon', '2022-06-07 07:49:29', '2022-06-07 07:49:29'),
(11, 2, 'kerry', 'kerryassociation.ie', 'N/A', 'N/A', 'N/A', '2022-06-28 04:21:26', '2022-06-28 04:21:26'),
(13, 4, 'Nobir Hasan', 'http://nobird.com', 'nobir.wd@gmail.com', '01988406007', 'Agargaon', '2022-07-21 06:27:41', '2022-07-21 06:27:41');

-- --------------------------------------------------------

--
-- Table structure for table `client_type`
--

CREATE TABLE `client_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_type_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_type`
--

INSERT INTO `client_type` (`id`, `client_type_name`, `client_type_status`, `created_at`, `updated_at`) VALUES
(2, 'Domain', 'Active', '2022-05-25 00:14:50', '2022-05-25 00:14:50'),
(4, 'Hosting', 'Active', '2022-06-02 07:44:38', '2022-06-02 07:44:38'),
(5, 'Project', 'Inactive', '2022-06-02 08:56:27', '2022-06-02 08:56:27'),
(7, 'Domains', 'Presindent', '2022-07-28 02:28:08', '2022-07-28 02:28:08');

-- --------------------------------------------------------

--
-- Table structure for table `domain_details`
--

CREATE TABLE `domain_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_type_id` bigint(20) UNSIGNED NOT NULL,
  `c_info_id` bigint(20) UNSIGNED NOT NULL,
  `domain_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domain_end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `domain_start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `domain_details`
--

INSERT INTO `domain_details` (`id`, `c_type_id`, `c_info_id`, `domain_name`, `domain_end_date`, `created_at`, `updated_at`, `domain_start_date`) VALUES
(1, 2, 2, 'www.facebook.com/', '2023-09-10', '2022-06-07 07:44:55', '2022-06-10 06:08:11', ''),
(3, 2, 10, 'www.facebook.com/here', '2022-06-15', '2022-06-07 08:17:59', '2022-06-10 06:08:36', '');

-- --------------------------------------------------------

--
-- Table structure for table `domain_registars`
--

CREATE TABLE `domain_registars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `domain_registars_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `domain_registars`
--

INSERT INTO `domain_registars` (`id`, `domain_registars_name`, `created_at`, `updated_at`) VALUES
(1, 'bluehost', '2022-07-28 07:59:55', '2022-07-28 07:59:55'),
(3, 'bluehosts2', '2022-07-28 08:04:28', '2022-07-28 08:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hosting_details`
--

CREATE TABLE `hosting_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_type_id` bigint(20) UNSIGNED NOT NULL,
  `c_info_id` bigint(20) UNSIGNED NOT NULL,
  `hosting_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hosting_domain_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hosting_start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hosting_end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hosting_details`
--

INSERT INTO `hosting_details` (`id`, `c_type_id`, `c_info_id`, `hosting_name`, `hosting_domain_name`, `hosting_start_date`, `hosting_end_date`, `created_at`, `updated_at`) VALUES
(3, 4, 11, 'N/A', 'mdnh.com', '2022-06-18', '', '2022-06-28 04:38:07', '2022-06-28 04:38:07'),
(4, 4, 13, '512GB', 'nobirhasan.com', '2023-07-21', '', '2022-07-21 06:29:51', '2022-07-21 06:29:51'),
(5, 4, 7, '5GB', 'nobirhasan.com', '2022-07-21', '2023-07-21', '2022-07-21 06:34:27', '2022-07-21 07:02:23'),
(7, 4, 13, '100GB', 'mdnobirhasan.com', '2022-07-21', '2024-07-21', '2022-07-21 06:53:55', '2022-07-21 06:53:55'),
(8, 4, 13, '50GB', 'nobirhasan.com', '2022-07-29', '2022-07-29', '2022-07-26 09:40:35', '2022-07-26 09:40:35'),
(9, 4, 13, 'vvv', 'vvvv', '2022-06-30', '2022-07-30', '2022-07-26 09:41:32', '2022-07-26 09:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `hosting_providers`
--

CREATE TABLE `hosting_providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hosting_provider_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hosting_providers`
--

INSERT INTO `hosting_providers` (`id`, `hosting_provider_name`, `created_at`, `updated_at`) VALUES
(1, 'Site Ground', '2022-07-28 06:42:44', '2022-07-28 06:42:44'),
(2, 'Site Grounds', '2022-07-28 06:47:49', '2022-07-28 06:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `domain_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hosting_id` bigint(20) UNSIGNED DEFAULT NULL,
  `other_project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `c_type_id` bigint(20) UNSIGNED NOT NULL,
  `c_info_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_quote_hour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_quote_min` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_per_hour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `invoice_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoiceDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoiceAlertDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `domain_id`, `hosting_id`, `other_project_id`, `c_type_id`, `c_info_id`, `invoice_details`, `time_quote_hour`, `time_quote_min`, `rate_per_hour`, `total_rate`, `currency_type`, `attachment`, `created_at`, `updated_at`, `invoice_status`, `invoiceDate`, `invoiceAlertDate`) VALUES
(8, 1, NULL, NULL, 2, 2, 'Domain', '10', '52', '10', '108.66666666666667', '$', '1658748184.jpg', '2022-07-25 05:23:04', '2022-07-25 05:23:04', 'pending', '2022-07-21', '2022-09-22'),
(9, 3, NULL, NULL, 2, 10, 'nobir.com', '6', '12', '80', '496', '$', '1658748275.jpg', '2022-07-25 05:24:35', '2022-07-25 06:47:00', 'paid', '2022-07-22', '2022-09-09'),
(11, 3, NULL, NULL, 2, 10, '454', '121', '121', '101', '12424.683333333332', '$', '1659002886.png', '2022-07-28 04:08:06', '2022-07-28 04:08:06', 'pending', '2022-07-07', '2022-07-29');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_07_28_121224_dommain_provider', 2),
(7, '2022_07_28_134358_domain_registar', 3);

-- --------------------------------------------------------

--
-- Table structure for table `other_project_details`
--

CREATE TABLE `other_project_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_type_id` bigint(20) UNSIGNED NOT NULL,
  `c_info_id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_time_quote` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_project_details`
--

INSERT INTO `other_project_details` (`id`, `c_type_id`, `c_info_id`, `project_name`, `project_details`, `project_start_date`, `project_time_quote`, `created_at`, `updated_at`) VALUES
(2, 5, 8, 'project1', 'fdds', '2022-07-06', '52', '2022-07-26 09:47:33', '2022-07-26 09:47:33'),
(3, 5, 8, 'project1', 'q', '2022-07-21', '5', '2022-07-26 09:50:21', '2022-07-26 09:50:21');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nobir', 'nobir.wd@gmail.com', NULL, '$2y$10$z6C3L45B8UyqkHMVI/vP.u5fNhSZKIR5J/cagAc8gG.1q6SQaf0.i', 'VqqOfkhWtgPQj4NWE2y81S9Tq1u0SN3r3zud6ikLzuFYA4EqAabobMCPVuVr', '2022-07-26 07:17:41', '2022-07-26 07:17:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_info`
--
ALTER TABLE `client_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_info_c_type_id_foreign` (`c_type_id`);

--
-- Indexes for table `client_type`
--
ALTER TABLE `client_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domain_details`
--
ALTER TABLE `domain_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `domain_details_c_type_id_foreign` (`c_type_id`),
  ADD KEY `domain_details_c_info_id_foreign` (`c_info_id`);

--
-- Indexes for table `domain_registars`
--
ALTER TABLE `domain_registars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hosting_details`
--
ALTER TABLE `hosting_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hosting_details_c_type_id_foreign` (`c_type_id`),
  ADD KEY `hosting_details_c_info_id_foreign` (`c_info_id`);

--
-- Indexes for table `hosting_providers`
--
ALTER TABLE `hosting_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_domain_id_foreign` (`domain_id`),
  ADD KEY `invoices_hosting_id_foreign` (`hosting_id`),
  ADD KEY `invoices_other_project_id_foreign` (`other_project_id`),
  ADD KEY `invoices_c_type_id_foreign` (`c_type_id`),
  ADD KEY `invoices_c_info_id_foreign` (`c_info_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_project_details`
--
ALTER TABLE `other_project_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `other_project_details_c_type_id_foreign` (`c_type_id`),
  ADD KEY `other_project_details_c_info_id_foreign` (`c_info_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `client_info`
--
ALTER TABLE `client_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `client_type`
--
ALTER TABLE `client_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `domain_details`
--
ALTER TABLE `domain_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `domain_registars`
--
ALTER TABLE `domain_registars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hosting_details`
--
ALTER TABLE `hosting_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hosting_providers`
--
ALTER TABLE `hosting_providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `other_project_details`
--
ALTER TABLE `other_project_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_info`
--
ALTER TABLE `client_info`
  ADD CONSTRAINT `c_type_id` FOREIGN KEY (`c_type_id`) REFERENCES `client_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `client_info_c_type_id_foreign` FOREIGN KEY (`c_type_id`) REFERENCES `client_type` (`id`),
  ADD CONSTRAINT `fk_name` FOREIGN KEY (`c_type_id`) REFERENCES `client_type` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `domain_details`
--
ALTER TABLE `domain_details`
  ADD CONSTRAINT `domain_details_c_info_id_foreign` FOREIGN KEY (`c_info_id`) REFERENCES `client_info` (`id`),
  ADD CONSTRAINT `domain_details_c_type_id_foreign` FOREIGN KEY (`c_type_id`) REFERENCES `client_type` (`id`);

--
-- Constraints for table `hosting_details`
--
ALTER TABLE `hosting_details`
  ADD CONSTRAINT `hosting_details_c_info_id_foreign` FOREIGN KEY (`c_info_id`) REFERENCES `client_info` (`id`),
  ADD CONSTRAINT `hosting_details_c_type_id_foreign` FOREIGN KEY (`c_type_id`) REFERENCES `client_type` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_c_info_id_foreign` FOREIGN KEY (`c_info_id`) REFERENCES `client_info` (`id`),
  ADD CONSTRAINT `invoices_c_type_id_foreign` FOREIGN KEY (`c_type_id`) REFERENCES `client_type` (`id`),
  ADD CONSTRAINT `invoices_domain_id_foreign` FOREIGN KEY (`domain_id`) REFERENCES `domain_details` (`id`),
  ADD CONSTRAINT `invoices_hosting_id_foreign` FOREIGN KEY (`hosting_id`) REFERENCES `hosting_details` (`id`),
  ADD CONSTRAINT `invoices_other_project_id_foreign` FOREIGN KEY (`other_project_id`) REFERENCES `other_project_details` (`id`);

--
-- Constraints for table `other_project_details`
--
ALTER TABLE `other_project_details`
  ADD CONSTRAINT `other_project_details_c_info_id_foreign` FOREIGN KEY (`c_info_id`) REFERENCES `client_info` (`id`),
  ADD CONSTRAINT `other_project_details_c_type_id_foreign` FOREIGN KEY (`c_type_id`) REFERENCES `client_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
