-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 18, 2022 at 01:56 PM
-- Server version: 5.7.38-41-log
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbzwtgpmug3ri1`
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
  `c_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_type`
--

CREATE TABLE `client_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_type_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_type`
--

INSERT INTO `client_type` (`id`, `client_type_name`, `client_type_status`, `created_at`, `updated_at`) VALUES
(6, 'Domain', 'Null', '2022-08-06 15:23:55', '2022-08-06 15:23:55'),
(7, 'Hosting', 'Null', '2022-08-06 15:24:01', '2022-08-06 15:24:01'),
(8, 'Domain and Hosting', 'Null', '2022-08-06 15:24:12', '2022-08-06 15:24:12'),
(9, 'Project', 'Null', '2022-08-06 15:24:20', '2022-08-06 15:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `domain_and_hosting`
--

CREATE TABLE `domain_and_hosting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_type_id` bigint(20) UNSIGNED NOT NULL,
  `c_info_id` bigint(20) UNSIGNED NOT NULL,
  `dh_hosting_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dh_hosting_provider_id` bigint(20) UNSIGNED NOT NULL,
  `dh_domain_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dh_domain_registrar_id` bigint(20) UNSIGNED NOT NULL,
  `dh_number_of_year` int(11) NOT NULL,
  `dh_start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dh_end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `domain_details`
--

CREATE TABLE `domain_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_type_id` bigint(20) UNSIGNED NOT NULL,
  `c_info_id` bigint(20) UNSIGNED NOT NULL,
  `domain_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domain_registar_id` bigint(20) UNSIGNED NOT NULL,
  `number_of_year` int(11) NOT NULL,
  `domain_start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domain_end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Bluehost', '2022-08-05 07:43:08', '2022-08-05 07:43:18'),
(3, 'Godaddy', '2022-08-06 12:40:23', '2022-08-06 12:40:23'),
(4, 'Letshost', '2022-08-06 12:40:58', '2022-08-06 12:40:58');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `hosting_provider_id` bigint(20) UNSIGNED NOT NULL,
  `hosting_domain_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_year` int(11) NOT NULL,
  `hosting_start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hosting_end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Siteground', '2022-08-05 07:42:59', '2022-08-05 07:42:59'),
(2, 'Hostgator', '2022-08-06 12:36:19', '2022-08-06 12:36:19');

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
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoiceDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoiceAlertDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `domain_and_hosting_id` bigint(20) UNSIGNED DEFAULT NULL
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
(14, '2014_10_12_000000_create_users_table', 1),
(15, '2014_10_12_100000_create_password_resets_table', 1),
(16, '2019_08_19_000000_create_failed_jobs_table', 1),
(17, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(18, '2022_07_28_121224_hosting_provider', 1),
(19, '2022_07_28_134358_domain_registar', 1),
(20, '2022_07_29_090357_create_client_type_table', 1),
(21, '2022_07_29_090430_create_client_info_table', 1),
(22, '2022_07_29_090506_create_domain_details_table', 1),
(23, '2022_07_29_090536_create_hosting_details_table', 1),
(24, '2022_07_29_090805_create_other_project_details_table', 1),
(25, '2022_07_29_090842_create_invoices_table', 1),
(26, '2022_08_04_084317_create_domain_and_hosting_table', 1),
(27, '2022_08_05_150258_add_domain_and_hosting_id_to_invoices_table', 2);

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
(1, 'Md Nobir Hasan', 'euitsols.suprt@gmail.com', NULL, '$2y$10$UlLraeIfuEFD5qiRrrmlPeoZ2eBdxo11RBgHQ56G4t3.asrdvNDKu', NULL, '2022-08-05 07:42:28', '2022-08-05 07:42:28');

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
-- Indexes for table `domain_and_hosting`
--
ALTER TABLE `domain_and_hosting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `domain_and_hosting_c_type_id_foreign` (`c_type_id`),
  ADD KEY `domain_and_hosting_c_info_id_foreign` (`c_info_id`),
  ADD KEY `domain_and_hosting_dh_hosting_provider_id_foreign` (`dh_hosting_provider_id`),
  ADD KEY `domain_and_hosting_dh_domain_registrar_id_foreign` (`dh_domain_registrar_id`);

--
-- Indexes for table `domain_details`
--
ALTER TABLE `domain_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `domain_details_c_type_id_foreign` (`c_type_id`),
  ADD KEY `domain_details_c_info_id_foreign` (`c_info_id`),
  ADD KEY `domain_details_domain_registar_id_foreign` (`domain_registar_id`);

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
  ADD KEY `hosting_details_c_info_id_foreign` (`c_info_id`),
  ADD KEY `hosting_details_hosting_provider_id_foreign` (`hosting_provider_id`);

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
  ADD KEY `invoices_c_type_id_foreign` (`c_type_id`),
  ADD KEY `invoices_c_info_id_foreign` (`c_info_id`),
  ADD KEY `invoices_domain_and_hosting_id_foreign` (`domain_and_hosting_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_type`
--
ALTER TABLE `client_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `domain_and_hosting`
--
ALTER TABLE `domain_and_hosting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `domain_details`
--
ALTER TABLE `domain_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `domain_registars`
--
ALTER TABLE `domain_registars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hosting_details`
--
ALTER TABLE `hosting_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hosting_providers`
--
ALTER TABLE `hosting_providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `other_project_details`
--
ALTER TABLE `other_project_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `client_info_c_type_id_foreign` FOREIGN KEY (`c_type_id`) REFERENCES `client_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `domain_and_hosting`
--
ALTER TABLE `domain_and_hosting`
  ADD CONSTRAINT `domain_and_hosting_c_info_id_foreign` FOREIGN KEY (`c_info_id`) REFERENCES `client_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `domain_and_hosting_c_type_id_foreign` FOREIGN KEY (`c_type_id`) REFERENCES `client_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `domain_and_hosting_dh_domain_registrar_id_foreign` FOREIGN KEY (`dh_domain_registrar_id`) REFERENCES `domain_registars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `domain_and_hosting_dh_hosting_provider_id_foreign` FOREIGN KEY (`dh_hosting_provider_id`) REFERENCES `hosting_providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `domain_details`
--
ALTER TABLE `domain_details`
  ADD CONSTRAINT `domain_details_c_info_id_foreign` FOREIGN KEY (`c_info_id`) REFERENCES `client_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `domain_details_c_type_id_foreign` FOREIGN KEY (`c_type_id`) REFERENCES `client_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `domain_details_domain_registar_id_foreign` FOREIGN KEY (`domain_registar_id`) REFERENCES `domain_registars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hosting_details`
--
ALTER TABLE `hosting_details`
  ADD CONSTRAINT `hosting_details_c_info_id_foreign` FOREIGN KEY (`c_info_id`) REFERENCES `client_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hosting_details_c_type_id_foreign` FOREIGN KEY (`c_type_id`) REFERENCES `client_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hosting_details_hosting_provider_id_foreign` FOREIGN KEY (`hosting_provider_id`) REFERENCES `hosting_providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_c_info_id_foreign` FOREIGN KEY (`c_info_id`) REFERENCES `client_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoices_c_type_id_foreign` FOREIGN KEY (`c_type_id`) REFERENCES `client_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoices_domain_and_hosting_id_foreign` FOREIGN KEY (`domain_and_hosting_id`) REFERENCES `domain_and_hosting` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoices_domain_id_foreign` FOREIGN KEY (`domain_id`) REFERENCES `domain_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoices_hosting_id_foreign` FOREIGN KEY (`hosting_id`) REFERENCES `hosting_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `other_project_details`
--
ALTER TABLE `other_project_details`
  ADD CONSTRAINT `other_project_details_c_info_id_foreign` FOREIGN KEY (`c_info_id`) REFERENCES `client_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `other_project_details_c_type_id_foreign` FOREIGN KEY (`c_type_id`) REFERENCES `client_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
