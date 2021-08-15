-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 11 août 2021 à 13:24
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `protech_tetouan`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id`, `title`, `body`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Da vinci code', '<div>Try</div>', '1.jpg', '2021-07-28 08:45:30', '2021-07-28 08:45:30'),
(3, 'Lavage', '<div><strong>offre limité&nbsp;</strong></div>', '2.jpg', '2021-07-28 09:42:15', '2021-07-28 09:42:15');

-- --------------------------------------------------------

--
-- Structure de la table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cancelled_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `appointments`
--

INSERT INTO `appointments` (`id`, `uuid`, `token`, `employee_id`, `service_id`, `client_name`, `client_email`, `date`, `start_time`, `end_time`, `created_at`, `updated_at`, `cancelled_at`) VALUES
(1, 'cdbd0ed7-28d0-473b-83f0-90bbf2fdcf5b', '5tK6sNQOdYzHxo59T3NfCkj67BBFrOkq', 1, 4, 'Said', 'zitouni.sd@gmail.com', '2021-08-02', '15:00:00', '16:00:00', '2021-08-02 08:18:31', '2021-08-02 08:18:31', NULL),
(2, 'cdbd0ed7-28d0-473b-83f0-90bbf2fdcf5b', '5tK6sNQOdYzHxo59T3NfCkj67BBFrOkq', 1, 4, '', '', '2021-08-02', '14:00:00', '15:00:00', '2021-08-02 08:18:31', '2021-08-02 08:18:31', NULL),
(3, '16d7043c-f9ea-4985-a352-f4b1026c7296', 'bnuoc6c4xz71GoHMDyctCHfh7swC9yjs', 3, 3, 'Said', 'zitouni.sd@gmail.com', '2021-08-05', '13:00:00', '13:45:00', '2021-08-05 11:39:05', '2021-08-05 11:39:05', NULL),
(4, 'ddde5f19-2e7e-4bd9-93db-0905d3516c34', 'YbGtE0R38w0P3b1yPCeYxnPJYrrpdIYD', 3, 3, 'Said', 'said.storage@gmail.com', '2021-08-05', '13:00:00', '13:45:00', '2021-08-05 11:54:45', '2021-08-05 11:54:45', NULL),
(5, '02d4918f-3912-40fb-82e9-02c836e81eb2', 'xieYXu3flictghTCDuyAkHuIGGcwEDw3', 3, 3, 'Said', 'zitouni.sd@gmail.com', '2021-08-05', '14:00:00', '14:45:00', '2021-08-05 12:58:02', '2021-08-05 12:58:02', NULL),
(6, 'c78effb8-1358-45d4-b112-9131ac8b765b', 'GwPcdzx65aUk1ZjtmrrMacFldwG3JkSe', 3, 3, 'سعيد', 'zitouni.sd@gmail.com', '2021-08-05', '14:45:00', '15:30:00', '2021-08-05 12:58:47', '2021-08-05 12:58:47', NULL),
(7, '8515ca92-d2f6-4e71-8427-614f7256c76d', 'mGi3YJvKZchMztWpV98EYK70WE9QAzrh', 3, 3, 'Said ZITOUNI', 'zitouni.sd@gmail.com', '2021-08-05', '15:30:00', '16:15:00', '2021-08-05 13:07:09', '2021-08-05 13:07:09', NULL),
(8, '38f58360-c657-444b-b4f2-7c9f8de283dd', '1MV6OUzG38RGEuS6IJPNx3XySjIDB33I', 3, 3, 'Said ZITOUNI', 'zitouni.sd@gmail.com', '2021-08-05', '16:15:00', '17:00:00', '2021-08-05 13:08:51', '2021-08-05 13:08:51', NULL),
(9, '7e40b03c-4dea-4fa1-93d0-4bb67c50cfee', 'MyjbbaDrHa4NAbd5Owi8A8LxZS4fVnVG', 3, 3, 'tata test', 'tata@toto.com', '2021-08-07', '09:00:00', '09:45:00', '2021-08-06 20:25:03', '2021-08-06 21:03:18', '2021-08-06 21:03:18'),
(10, 'a1ea9a03-6cf4-4de2-8ef0-f36fa18e8d2a', '2aE5SIJcTqvjijfsdG3NnC9bOSKYUbYf', 1, 4, 'Said ZITOUNI', 'zitouni.sd@gmail.com', '2021-08-10', '11:30:00', '12:30:00', '2021-08-09 13:24:16', '2021-08-09 13:24:20', '2021-08-09 13:24:20'),
(11, '2fb67949-e131-4c55-bede-9ec3640d1c9d', 'DOoLMNWAWTYQnXB6PPecKGaedqDpadxp', 2, 3, 'Said', 'zitouni.sd@gmail.com', '2021-08-10', '09:00:00', '09:45:00', '2021-08-09 13:55:39', '2021-08-09 13:55:39', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `employees`
--

INSERT INTO `employees` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hamid', '2021-07-27 23:00:00', '2021-07-28 23:00:00'),
(2, 'Tariq', '2021-07-18 23:00:00', '2021-07-26 23:00:00'),
(3, 'Kamal', '2021-07-18 23:00:00', '2021-07-26 23:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `employee_service`
--

CREATE TABLE `employee_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `employee_service`
--

INSERT INTO `employee_service` (`id`, `service_id`, `employee_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2021-06-30 23:00:00', '2021-07-02 23:00:00'),
(2, 3, 2, '2021-07-27 23:00:00', '2021-07-28 23:00:00'),
(3, 3, 3, '2021-07-27 23:00:00', '2021-07-28 23:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
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
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_05_21_300000_create_team_invitations_table', 1),
(9, '2021_07_07_141135_create_sessions_table', 1),
(10, '2021_07_07_151132_create_pages_table', 2),
(11, '2021_07_07_152438_create_trix_rich_texts_table', 3),
(12, '2021_07_09_151908_add_set_default_pages_to_pages_table', 4),
(13, '2021_07_11_092727_add_image_to_pages_table', 5),
(14, '2021_07_13_130937_create_navigation_menus_table', 6),
(15, '2021_07_14_084205_add_role_to_users_table', 7),
(16, '2021_07_14_104111_create_user_permissions_table', 8),
(17, '2021_07_19_190231_create_products_table', 9),
(18, '2021_07_27_081823_create_services_table', 10),
(19, '2021_07_28_084738_create_annonces_table', 11),
(20, '2021_07_29_092003_create_employees_table', 12),
(21, '2021_07_29_092852_add_to_services', 12),
(22, '2021_07_29_093552_add_to_services', 13),
(23, '2021_07_29_104220_create_employee_service_table', 14),
(24, '2021_07_29_122626_create_schedules_table', 15),
(25, '2021_07_31_120315_create_schedule_unavailabilities_table', 16),
(26, '2021_08_02_081447_create_appointments_table', 17),
(27, '2021_08_05_093442_drop_user_id_from_appointments', 18),
(28, '2021_08_05_121439_add_prefix_client', 19),
(29, '2021_08_06_211021_add_cancelled_at_to_appointments', 20);

-- --------------------------------------------------------

--
-- Structure de la table `navigation_menus`
--

CREATE TABLE `navigation_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sequence` int(11) NOT NULL,
  `type` enum('SidebarNav','TopNav') COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `navigation_menus`
--

INSERT INTO `navigation_menus` (`id`, `sequence`, `type`, `label`, `slug`, `created_at`, `updated_at`) VALUES
(8, 1, 'TopNav', 'Home', 'home', '2021-07-13 20:49:17', '2021-07-27 11:57:02'),
(9, 6, 'TopNav', 'Contactez-nous', 'contactez-nous', '2021-07-13 20:49:58', '2021-07-27 12:03:33'),
(10, 2, 'TopNav', 'Qui-sommes nous', 'qui-sommes-nous', '2021-07-13 20:58:03', '2021-07-27 11:57:16'),
(14, 3, 'TopNav', 'Nos produits', 'nos-produits', '2021-07-27 11:55:10', '2021-07-27 12:01:06'),
(15, 4, 'TopNav', 'Nos services', 'nos-services', '2021-07-27 11:55:29', '2021-07-27 12:00:58'),
(16, 5, 'TopNav', 'Nos references', 'nos-references', '2021-07-27 12:03:15', '2021-07-27 12:03:15'),
(17, 6, 'TopNav', 'Reservation', 'bookings/create', '2021-08-09 13:12:51', '2021-08-09 13:13:40');

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_default_home` tinyint(1) DEFAULT NULL,
  `is_default_not_found` tinyint(1) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id`, `is_default_home`, `is_default_not_found`, `title`, `slug`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Home', 'home', '<div>Nouveautés et Offres<br><br></div>', NULL, '2021-07-09 07:01:29', '2021-07-28 12:01:18'),
(2, NULL, NULL, 'Qui-sommes nous', 'qui-sommes-nous', '<div>Presentation de Protech Tetouan&nbsp;</div>', NULL, '2021-07-09 07:22:38', '2021-08-09 13:28:59'),
(3, NULL, NULL, 'Contactez nous', 'contactez-nous', '<div>Veuillez remplier le formulaire suivant , on promets de vous répondre le plus tôt possible</div>', NULL, '2021-07-09 09:21:43', '2021-07-27 12:12:20'),
(4, NULL, NULL, 'Nos produits', 'nos-produits', '<div>Nos produits de haute qualité en accord avec les spécifications en vigeur&nbsp;</div>', NULL, '2021-07-09 09:42:04', '2021-07-28 11:43:01'),
(5, NULL, NULL, 'Nos services', 'nos-services', '<div>Services Pages</div>', NULL, '2021-07-09 09:42:22', '2021-07-27 12:00:16'),
(10, NULL, 1, 'Not Found', 'not-found', '<div>404 Page not found</div>', NULL, '2021-07-09 16:21:30', '2021-07-09 16:41:31'),
(13, NULL, NULL, 'Logo', 'logo', '<div>logo</div>', 'logo_white.png', '2021-07-11 08:41:02', '2021-07-12 11:59:35'),
(16, NULL, NULL, 'Nos references', 'nos-references', '<div>nos references content</div>', NULL, '2021-07-27 12:04:09', '2021-07-27 12:04:09');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
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
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` int(11) NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `user_id`, `description`, `price`, `picture`, `created_at`, `updated_at`) VALUES
(3, 'TEST', 1, '<div>test</div>', 123, '2.jpg', '2021-07-22 07:34:49', '2021-07-28 11:40:13'),
(5, 'lavage', 1, '<div>Lavage</div>', 100, '1.jpg', '2021-07-27 14:41:41', '2021-07-27 14:41:41'),
(6, 'traitement', 1, '<div>trt</div>', 200, '2.jpg', '2021-07-27 14:43:44', '2021-07-27 14:43:44'),
(7, 'Traitement', 1, '<div>Traitment</div>', 100, '2.jpg', '2021-07-28 11:41:16', '2021-07-28 11:41:35');

-- --------------------------------------------------------

--
-- Structure de la table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `starts_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `schedules`
--

INSERT INTO `schedules` (`id`, `employee_id`, `date`, `starts_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-07-03', '09:00:00', '17:00:00', '2021-07-03 10:36:36', '2021-07-17 23:00:00'),
(2, 2, '2021-07-09', '09:00:00', '17:00:00', '2021-07-03 10:36:36', '2021-07-17 23:00:00'),
(3, 2, '2021-07-31', '09:00:00', '17:00:00', '2021-07-03 10:36:36', '2021-07-17 23:00:00'),
(4, 1, '2021-08-01', '09:00:00', '17:00:00', '2021-07-03 10:36:36', '2021-07-17 23:00:00'),
(5, 2, '2021-08-01', '09:00:00', '17:00:00', NULL, NULL),
(6, 1, '2021-08-02', '09:00:00', '17:00:00', NULL, NULL),
(7, 1, '2021-08-04', '09:00:00', '17:00:00', NULL, NULL),
(8, 2, '2021-08-04', '09:00:00', '17:00:00', NULL, NULL),
(9, 3, '2021-08-04', '09:00:00', '17:00:00', NULL, NULL),
(10, 3, '2021-08-05', '09:00:00', '17:00:00', NULL, NULL),
(11, 3, '2021-08-07', '09:00:00', '17:00:00', NULL, NULL),
(12, 1, '2021-08-10', '09:00:00', '17:00:00', NULL, NULL),
(13, 2, '2021-08-10', '09:00:00', '17:00:00', NULL, NULL),
(14, 3, '2021-08-10', '09:00:00', '17:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `schedule_unavailabilities`
--

CREATE TABLE `schedule_unavailabilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` bigint(20) UNSIGNED NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `schedule_unavailabilities`
--

INSERT INTO `schedule_unavailabilities` (`id`, `schedule_id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 4, '12:00:00', '13:00:00', '2021-07-30 23:00:00', '2021-07-30 23:00:00'),
(2, 6, '12:00:00', '13:00:00', '2021-08-01 23:00:00', '2021-08-01 23:00:00'),
(3, 10, '12:00:00', '13:00:00', '2021-08-01 23:00:00', '2021-08-01 23:00:00'),
(4, 11, '12:00:00', '13:00:00', '2021-08-06 23:00:00', '2021-08-06 23:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `duration` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `name`, `user_id`, `description`, `duration`, `price`, `picture`, `created_at`, `updated_at`) VALUES
(3, 'lavage', 1, '<div>lavage</div>', 45, 120, '1.jpg', '2021-07-29 08:43:11', '2021-07-29 08:43:49'),
(4, 'traitement', 1, '<div>test</div>', 60, 123, '2.jpg', '2021-07-29 09:03:34', '2021-07-29 09:03:34');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('FtXEJy3cRQDoCCAMBmAyovfKRFC8lQRscbcHGnG9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNFVqMVhkeFRvN3IwTTFtV296Y0hTaFhYelF1Z25VTDVCcW5jNGJsTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ub3Mtc2VydmljZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1628681574),
('HRP6co7w6jQym4fcGpVXQumxjmjKi8ZQxWJ9lRTm', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYUMyRGVob29EclJKNlhUR1NaNVc2ZFJjVVZaUjZhOUdVcDZCNnVnNiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ib29raW5ncy9jcmVhdGUiO319', 1628522269),
('ynfWIy1lFRvhehyMVaWyJVImIrKc0QxWLPsAOzOo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibFdnYkVTRFVQenlrWXVQTFdMSkFvNFlLMXhsMHN2ZWdVMTNwd0NDdyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1628517637),
('ZPHGvTiQLO9QqI3Ofj29X4as6Kjqhlc0har3RBKY', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMUhmR2NiR3J5eFVLNE0xRWllRnlYNmJscVlUVlFHYVpLMmNpcURYbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ib29raW5ncy9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkaHJlZUV0ZDJnNkVIeFJrQlZuTGg0dURkLm5mRGxMYUtTanEyYmo4ZDlkckE4VGExc0s2WWEiO30=', 1628681628);

-- --------------------------------------------------------

--
-- Structure de la table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 1, 'Said\'s Team', 1, '2021-07-07 13:28:46', '2021-07-07 13:28:46'),
(2, 3, 'TEST\'s Team', 1, '2021-08-02 07:47:13', '2021-08-02 07:47:13');

-- --------------------------------------------------------

--
-- Structure de la table `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `trix_attachments`
--

CREATE TABLE `trix_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachable_id` int(10) UNSIGNED DEFAULT NULL,
  `attachable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_pending` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `trix_rich_texts`
--

CREATE TABLE `trix_rich_texts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Said ZITOUNI', 'said.storage@gmail.com', NULL, '$2y$10$hreeEtd2g6EHxRkBVnLh4uDd.nfDlLaKSjq2bj8d9drA8Ta1sK6Ya', NULL, NULL, NULL, 1, NULL, '2021-07-07 13:28:46', '2021-07-07 13:28:46'),
(2, 'user', 'Said Test', 'said.test@gmail.com', '2021-07-14 07:00:00', '$2y$10$hreeEtd2g6EHxRkBVnLh4uDd.nfDlLaKSjq2bj8d9drA8Ta1sK6Ya', NULL, NULL, NULL, 1, NULL, '2021-07-14 06:00:00', '2021-07-14 07:00:00'),
(3, 'user', 'TEST TATO', 'tata@toto.com', NULL, '$2y$10$tPoThg6gxOXY8Oykrb0oxuAfgguZ9cugyNzCvJgSxSqQ7ierk8hSm', NULL, NULL, NULL, 2, NULL, '2021-08-02 07:47:13', '2021-08-03 05:54:02');

-- --------------------------------------------------------

--
-- Structure de la table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_permissions`
--

INSERT INTO `user_permissions` (`id`, `role`, `route_name`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'navigation-menus', '2021-07-15 17:25:13', '2021-07-15 17:25:13'),
(3, 'admin', 'users', '2021-07-15 17:25:30', '2021-07-15 17:25:30'),
(4, 'admin', 'user-permissions', '2021-07-15 17:25:55', '2021-07-15 17:25:55'),
(5, 'admin', 'dashboard', '2021-07-15 17:26:04', '2021-07-15 17:26:04'),
(6, 'admin', 'products', '2021-07-15 17:26:11', '2021-07-15 17:26:11'),
(7, 'admin', 'products', '2021-07-15 17:26:18', '2021-07-15 17:26:18'),
(8, 'admin', 'services', '2021-07-15 17:26:25', '2021-07-15 17:26:25'),
(9, 'admin', 'bookings.create', '2021-07-15 17:26:30', '2021-08-02 07:41:08'),
(10, 'user', 'dashboard', '2021-07-15 17:26:39', '2021-07-15 17:26:39'),
(11, 'user', 'bookings.create', '2021-07-15 17:26:50', '2021-08-02 07:52:45'),
(12, 'admin', 'pages', '2021-07-15 17:49:39', '2021-07-15 17:49:39'),
(13, 'admin', 'annonces', '2021-07-28 08:33:25', '2021-07-28 08:33:25');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_employee_id_foreign` (`employee_id`),
  ADD KEY `appointments_service_id_foreign` (`service_id`);

--
-- Index pour la table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `employee_service`
--
ALTER TABLE `employee_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_service_service_id_foreign` (`service_id`),
  ADD KEY `employee_service_employee_id_foreign` (`employee_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `navigation_menus`
--
ALTER TABLE `navigation_menus`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Index pour la table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_employee_id_foreign` (`employee_id`);

--
-- Index pour la table `schedule_unavailabilities`
--
ALTER TABLE `schedule_unavailabilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedule_unavailabilities_schedule_id_foreign` (`schedule_id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_user_id_foreign` (`user_id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Index pour la table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Index pour la table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Index pour la table `trix_attachments`
--
ALTER TABLE `trix_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `trix_rich_texts`
--
ALTER TABLE `trix_rich_texts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trix_rich_texts_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `employee_service`
--
ALTER TABLE `employee_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `navigation_menus`
--
ALTER TABLE `navigation_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `schedule_unavailabilities`
--
ALTER TABLE `schedule_unavailabilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `trix_attachments`
--
ALTER TABLE `trix_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `trix_rich_texts`
--
ALTER TABLE `trix_rich_texts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `employee_service`
--
ALTER TABLE `employee_service`
  ADD CONSTRAINT `employee_service_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_service_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `schedule_unavailabilities`
--
ALTER TABLE `schedule_unavailabilities`
  ADD CONSTRAINT `schedule_unavailabilities_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
