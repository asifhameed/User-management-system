-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2023 at 12:14 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ums`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2023_08_07_060840_create_role_sections_table', 1),
(6, '2023_08_07_060935_create_role_permissions_table', 1),
(7, '2023_08_07_061021_create_roles_table', 1),
(8, '2023_08_07_061127_create_role_permissions_assigns_table', 1),
(9, '2023_08_07_064240_after_roleid_to_users', 1),
(10, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(11, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(12, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(13, '2016_06_01_000004_create_oauth_clients_table', 2),
(14, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0df055df1835f18952486b26aaed3f302b6eeae5a56c170f3e983518996360689e9a077aad7fa518', 1, 1, 'MyApp', '[]', 1, '2023-08-07 14:20:16', '2023-08-07 14:20:16', '2023-08-07 21:20:16'),
('114373e1eb96ff4423d526d1412d71d13f38471bd3373ccf5427166916ffe35af4e24d4c11d138ef', 1, 1, 'MyApp', '[]', 0, '2023-08-07 14:12:12', '2023-08-07 14:12:12', '2023-08-07 21:12:12'),
('61dab2993e89d5305fd1b3e5b957d0363a1ed588b6f1da2bf0366caee001aa6965132547572caab0', 1, 1, 'MyApp', '[]', 0, '2023-08-07 13:17:29', '2023-08-07 13:17:29', '2023-08-07 20:17:29'),
('6e91777eb58f70498d9cdcbede6bf939362a61e1a1f0c9bb85a14d701737a974cb45e6917ef166c2', 2, 1, 'MyApp', '[]', 1, '2023-08-07 14:55:54', '2023-08-07 14:55:54', '2023-08-07 21:55:54'),
('73baf680a6e2bd04dc95330af20745d128c373896d3be6ffe37d6674bde558e83d59030756c97dac', 1, 1, 'MyApp', '[]', 0, '2023-08-07 13:20:52', '2023-08-07 13:20:52', '2023-08-07 20:20:52'),
('85981b9b93caa02b48d22960efadeab8ba1d95372499946e0a9a9ae93c781d70f2376edd884b8a76', 1, 1, 'MyApp', '[]', 1, '2023-08-07 13:33:29', '2023-08-07 13:33:29', '2023-08-07 20:33:29'),
('870b9c250d61c91a3289208a6a98eead5864950b719b1478396e1ec49d0ad6b8fc72e2d21a166c12', 9, 1, 'MyApp', '[]', 0, '2023-08-07 14:57:27', '2023-08-07 14:57:27', '2023-08-07 21:57:27'),
('9974737c4ddf21c8ab082d62f0fdc5b1ab5ff351320a90ab8bd1e11c126a71515e4cc133fdf25fa3', 1, 1, 'MyApp', '[]', 0, '2023-08-07 13:05:27', '2023-08-07 13:05:27', '2023-08-07 20:05:27'),
('bc79998be379adb3a8da0d1f2decf63ef5b1cfed9feff8cbb617262bdadddc11910c0340416f25f9', 3, 1, 'MyApp', '[]', 0, '2023-08-07 13:50:53', '2023-08-07 13:50:53', '2023-08-07 20:50:53'),
('c14f8b2200562700a16fe3d9ccdc44da9af979d93b44ebad536f7d940f299ffb53ec42389860d861', 1, 1, 'MyApp', '[]', 0, '2023-08-07 14:59:53', '2023-08-07 14:59:53', '2023-08-07 21:59:53'),
('cf645774cc3d9842d8999d4e0d2839c0e693e9d8056f3dc3d50fb02852d207a515f904a229db186c', 3, 1, 'MyApp', '[]', 1, '2023-08-07 14:31:51', '2023-08-07 14:31:51', '2023-08-07 21:31:51'),
('d62859dcf21bcf07a16ca7c937db913e6e25c1bf1ed305363caa9d5d36aec6b51c774b216fb3c102', 1, 1, 'MyApp', '[]', 0, '2023-08-07 14:52:50', '2023-08-07 14:52:50', '2023-08-07 21:52:50'),
('dddd0ff2f59232d3402770485569079efcf6c487a49611d698560ccc7ac583e17b0c9914fa9ab808', 1, 1, 'MyApp', '[]', 0, '2023-08-07 13:01:02', '2023-08-07 13:01:02', '2023-08-07 20:01:02'),
('e70f15e50b4205c1d02fa9c1606d1217e65f8bedc14aaa8341ba2b12cbe82b8ddfb3ca990533cf4a', 1, 1, 'MyApp', '[]', 0, '2023-08-07 13:21:27', '2023-08-07 13:21:27', '2023-08-07 20:21:27');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Task Personal Access Client', 'psf5dhTTX0mhJFmxq15kGa6tvA6OaLiv2rcGmhYb', NULL, 'http://localhost', 1, 0, 0, '2023-08-07 12:08:49', '2023-08-07 12:08:49'),
(2, NULL, 'Task Password Grant Client', 'KtNHkiuV75OHBIKcsNdp0gC6kEsdUUETwpUEQTkt', 'users', 'http://localhost', 0, 1, 0, '2023-08-07 12:08:49', '2023-08-07 12:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-08-07 12:08:49', '2023-08-07 12:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'MyApp', '072fd7e6139841dd513296fa8e1a99e015ed777ee0db2873f82507aa27fef1d5', '[\"*\"]', NULL, '2023-08-07 12:49:34', '2023-08-07 12:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Admin Roles', 1, '2023-08-07 09:26:31', '2023-08-07 09:26:31'),
(2, 'manager', 'Manager', 'Manager Roles', 1, '2023-08-07 09:26:31', '2023-08-07 10:41:10'),
(3, 'user', 'User', 'User Roles', 1, '2023-08-07 09:26:31', '2023-08-07 10:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_action` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_id_fk` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `name`, `tag_action`, `display_name`, `description`, `section_id_fk`, `status`, `created_at`, `updated_at`) VALUES
(1, 'index-dashboard', 'index', 'Index Dashboard', 'Index Dashboad for router permission.', 1, 1, '2023-08-07 09:26:31', '2023-08-07 09:26:31'),
(2, 'index-user', 'index', 'Index User', 'Index Users for router permission.', 2, 1, '2023-08-07 09:26:31', '2023-08-07 09:26:31'),
(3, 'add-user', 'add', 'add User', 'Add User permission.', 2, 1, '2023-08-07 09:26:31', '2023-08-07 09:26:31'),
(4, 'edit-user', 'edit', 'Edit User', 'Edit User permission.', 2, 1, '2023-08-07 09:26:31', '2023-08-07 09:26:31'),
(5, 'view-user', 'view', 'View user', 'View User permission.', 2, 1, '2023-08-07 09:26:31', '2023-08-07 09:26:31'),
(6, 'delete-user', 'delete', 'Delete user', 'Delete User permission.', 2, 1, '2023-08-07 09:26:31', '2023-08-07 09:26:31'),
(9, 'index-role', 'index', 'Index User', 'Index role for router permission.', 3, 1, '2023-08-07 09:26:31', '2023-08-07 09:26:31'),
(10, 'add-role', 'add', 'add role', 'Add role permission.', 3, 1, '2023-08-07 09:26:31', '2023-08-07 09:26:31'),
(11, 'edit-role', 'edit', 'Edit role', 'Edit role permission.', 3, 1, '2023-08-07 09:26:31', '2023-08-07 09:26:31'),
(12, 'view-role', 'view', 'View role', 'View role permission.', 3, 1, '2023-08-07 09:26:31', '2023-08-07 09:26:31'),
(13, 'delete-role', 'delete', 'Delete role', 'Delete role permission.', 3, 1, '2023-08-07 09:26:31', '2023-08-07 09:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions_assigns`
--

CREATE TABLE `role_permissions_assigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id_fk` bigint(20) UNSIGNED DEFAULT NULL,
  `section_id_fk` bigint(20) UNSIGNED DEFAULT NULL,
  `permission_names` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions_assigns`
--

INSERT INTO `role_permissions_assigns` (`id`, `role_id_fk`, `section_id_fk`, `permission_names`, `created_at`, `updated_at`) VALUES
(39, 1, 1, 'index-dashboard', '2023-08-07 09:26:31', '2023-08-07 09:26:31'),
(40, 1, 2, 'index-user,add-user,edit-user,view-user,delete-user', '2023-08-07 09:26:31', '2023-08-07 09:26:31'),
(41, 1, 3, 'index-role,add-role,edit-role,view-role,delete-role', '2023-08-07 09:26:31', '2023-08-07 09:26:31'),
(46, 2, 1, 'index-dashboard', '2023-08-07 10:41:11', '2023-08-07 10:41:11'),
(47, 2, 2, 'index-user,edit-user,view-user,delete-user', '2023-08-07 10:41:11', '2023-08-07 10:41:11'),
(48, 3, 1, 'index-dashboard', '2023-08-07 10:45:18', '2023-08-07 10:45:18'),
(49, 3, 2, 'index-user,edit-user,view-user', '2023-08-07 10:45:18', '2023-08-07 10:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `role_sections`
--

CREATE TABLE `role_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_sections`
--

INSERT INTO `role_sections` (`id`, `name`, `display_name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', NULL, 'Dashboard', 1, '2023-08-07 09:26:31', '2023-08-07 09:26:31'),
(2, 'Users Management', NULL, 'Users Management', 1, '2023-08-07 09:26:31', '2023-08-07 09:26:31'),
(3, 'Role Management', NULL, 'Role Management', 1, '2023-08-07 09:26:31', '2023-08-07 09:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id_fk` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `blocked_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id_fk`, `status`, `blocked_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$hUAGBHYbCkjIs.kqZQ58Au7hv0eeLjSDSfDKIWSrneLyr3c1qNS1W', 1, 1, NULL, NULL, '2023-08-07 11:10:14', '2023-08-07 10:54:44'),
(2, 'Company Manager', 'manager@gmail.com', NULL, '$2y$10$3pCQ2xB7z8pd/hqdD9NjVOivQLdPHr5gSYc0j52snvNmH4u9mcJQy', 2, 1, NULL, NULL, '2023-08-07 07:59:43', '2023-08-07 09:26:12'),
(3, 'user1', 'user@gmail.com', NULL, '$2y$10$3pCQ2xB7z8pd/hqdD9NjVOivQLdPHr5gSYc0j52snvNmH4u9mcJQy', 3, 1, NULL, NULL, '2023-08-07 09:27:40', '2023-08-07 14:53:28'),
(4, 'user2', 'user2@gmail.com', NULL, '$2y$10$3pCQ2xB7z8pd/hqdD9NjVOivQLdPHr5gSYc0j52snvNmH4u9mcJQy', 3, 1, NULL, NULL, '2023-08-07 09:27:40', '2023-08-07 14:53:28'),
(5, 'user3', 'user3@gmail.com', NULL, '$2y$10$3pCQ2xB7z8pd/hqdD9NjVOivQLdPHr5gSYc0j52snvNmH4u9mcJQy', 3, 1, NULL, NULL, '2023-08-07 10:37:17', '2023-08-07 15:52:56'),
(7, 'user5', 'user5@gmail.com', NULL, '$2y$10$3pCQ2xB7z8pd/hqdD9NjVOivQLdPHr5gSYc0j52snvNmH4u9mcJQy', 3, 0, '2023-08-07 20:39:02', NULL, '2023-08-07 10:37:17', '2023-08-07 15:39:02'),
(14, 'user6', 'user6@gmail.com', NULL, '$2y$10$3pCQ2xB7z8pd/hqdD9NjVOivQLdPHr5gSYc0j52snvNmH4u9mcJQy', 3, 0, '2023-08-07 20:39:02', NULL, '2023-08-07 10:37:17', '2023-08-07 15:39:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permissions_section_id_fk_foreign` (`section_id_fk`);

--
-- Indexes for table `role_permissions_assigns`
--
ALTER TABLE `role_permissions_assigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permissions_assigns_role_id_fk_foreign` (`role_id_fk`),
  ADD KEY `role_permissions_assigns_section_id_fk_foreign` (`section_id_fk`);

--
-- Indexes for table `role_sections`
--
ALTER TABLE `role_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_fk_foreign` (`role_id_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `role_permissions_assigns`
--
ALTER TABLE `role_permissions_assigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `role_sections`
--
ALTER TABLE `role_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_section_id_fk_foreign` FOREIGN KEY (`section_id_fk`) REFERENCES `role_sections` (`id`);

--
-- Constraints for table `role_permissions_assigns`
--
ALTER TABLE `role_permissions_assigns`
  ADD CONSTRAINT `role_permissions_assigns_role_id_fk_foreign` FOREIGN KEY (`role_id_fk`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `role_permissions_assigns_section_id_fk_foreign` FOREIGN KEY (`section_id_fk`) REFERENCES `role_sections` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_fk_foreign` FOREIGN KEY (`role_id_fk`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
