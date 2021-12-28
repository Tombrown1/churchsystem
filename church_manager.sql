-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 09:58 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `church_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `annoucement_categories`
--

CREATE TABLE `annoucement_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `annouce_cat_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bans`
--

CREATE TABLE `bans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname_next_of_kin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname_next_of_kin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_next_of_kin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relate_next_of_kin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_next_of_kin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_next_of_kin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_of_specialization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maiden_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resident_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subunit_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hobbies` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_13_141007_create_members_table', 1),
(6, '2021_10_20_040051_create_subunits_table', 1),
(7, '2021_10_20_144053_create_skills_table', 1),
(8, '2021_10_22_021226_create_postings_table', 1),
(9, '2021_10_25_125943_create_studio_related_skills_table', 1),
(10, '2021_12_19_180255_add_columns_to_users_table', 1),
(11, '2021_12_19_181630_create_user_details_table', 1),
(12, '2021_12_19_201435_add_coulmns_to_postings_table', 1),
(13, '2021_12_19_205644_create_bans_table', 1),
(14, '2021_12_19_205854_create_suspensions_table', 1),
(15, '2021_12_19_210831_create_announcements_table', 1),
(16, '2021_12_19_211524_create_annoucement_categories_table', 1),
(17, '2021_12_19_212028_create_units_table', 1),
(19, '2021_12_25_080556_add_colunm_to_user_details_table', 2);

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
-- Table structure for table `postings`
--

CREATE TABLE `postings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `subunit_id` bigint(20) UNSIGNED NOT NULL,
  `posting_status` int(11) NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studio_related_skills`
--

CREATE TABLE `studio_related_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subunits`
--

CREATE TABLE `subunits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suspensions`
--

CREATE TABLE `suspensions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `susp_reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subunit_id` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banned_id` int(11) DEFAULT NULL,
  `suspension_id` int(11) DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `badge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `subunit_id`, `username`, `name`, `email`, `email_verified_at`, `gender`, `password`, `remember_token`, `banned_id`, `suspension_id`, `role`, `badge`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin65', 'Admin', 'admin@admin.com', NULL, 'male', '$2y$10$JWdrQF98I7/E26L4ZPczi.W/zQMod0DLcTk0leozJqOa.2Tz64wei', NULL, NULL, NULL, '1', NULL, NULL, '2021-12-19 22:10:21', '2021-12-19 22:10:21'),
(2, NULL, 'Godwin14', 'Godwin', 'godwin@gmail.com', NULL, 'male', '$2y$10$3IlfXdljbLupnSMoMcGwZOqwg7TTfesH7h2XznkA52F2nN.JW/h2a', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-20 09:49:12', '2021-12-20 09:49:12'),
(3, NULL, 'Tom7', 'Tom', 'tom@yahoo.com', NULL, 'male', '$2y$10$VxywbrYJ/eXJ.3cgp4Nbtey5j2lHM87iEcJKdBg2lR5xTLDNJAznm', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-20 09:53:46', '2021-12-20 09:53:46'),
(4, NULL, 'Emmanuel48', 'Emmanuel', 'emmanuel@gmail.com', NULL, 'male', '$2y$10$bCi3ngF5TD/OPkEL3OrfAuWq.Exsn.AgIjp9O7ejlDBBZwdjosy3e', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-20 09:59:36', '2021-12-20 09:59:36'),
(5, NULL, 'Nehru Wilcox37', 'Nehru Wilcox', 'gegusyp@mailinator.com', NULL, 'female', '$2y$10$KsztsYhQSQqs8eeekhb49ez1jM0yq.YsGZDJs5HpBuyU.9DyJ462y', NULL, 0, 0, '0', '0', NULL, '2021-12-22 13:18:33', '2021-12-22 13:18:33'),
(6, NULL, 'Tarik Ellis3', 'Tarik Ellis', 'nisofa@mailinator.com', NULL, 'male', '$2y$10$hDRBTvnw21pnpwuvAD8EsemCfBCDlFkttDKLx24lPaIX.yX033agK', NULL, 0, 0, '0', '0', NULL, '2021-12-22 13:20:01', '2021-12-22 13:20:01'),
(7, NULL, 'Martena Davenport62', 'Martena Davenport', 'levukiqego@mailinator.com', NULL, 'female', '$2y$10$2iijyX6pxuZQTk3ktm9T/OkUYbmp9e5ZyJ6Wdge1gRIxmuhe5zv.K', NULL, 0, 0, '0', '0', NULL, '2021-12-22 13:21:07', '2021-12-22 13:21:07'),
(9, NULL, 'useremma44', 'useremma', 'user@user.com', NULL, 'male', '$2y$10$Owqz3KcmUX.6oQsb2f4VWe4MaHiYk9hyHZBZYgermu4sQjTwRT4pi', NULL, 0, 0, '0', '0', NULL, '2021-12-23 03:22:40', '2021-12-23 03:22:40'),
(10, NULL, 'Herrod Salazar64', 'Herrod Salazar', 'wunicy@mailinator.com', NULL, 'male', '$2y$10$Cli3nkzklG0sJakRIC0OGu6cFVBBuMI2Df6nRJlU7UFSx6g0DMnFy', NULL, 0, 0, '0', '0', NULL, '2021-12-26 21:57:26', '2021-12-26 21:57:26'),
(11, NULL, 'Haley Clay8', 'Haley Clay', 'mepaguqy@mailinator.com', NULL, 'male', '$2y$10$K.f0C1oKhs2iAL0u40eUtu4FYlm5v9ZNX6Pg.e1i4fejs/tTb0V8K', NULL, 0, 0, '0', '0', NULL, '2021-12-27 05:44:10', '2021-12-27 05:44:10'),
(12, NULL, 'Wang Glass73', 'Wang Glass', 'dysi@mailinator.com', NULL, 'female', '$2y$10$tttzLnp2vR1BGEb2CbaY5uRlPaDM6SfKMFXx/19g/7fkKXblk8LUi', NULL, 0, 0, '0', '0', NULL, '2021-12-27 08:20:31', '2021-12-27 08:20:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname_next_of_kin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname_next_of_kin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_next_of_kin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relate_next_of_kin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender_next_of_kin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_next_of_kin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_of_specialization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_origin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `town` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maiden_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resident_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `born_again` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `church_join_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_join_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `water_baptism` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `holyghost_baptism` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wofbi_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tither` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `homecell_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hobbies` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `created_by`, `firstname`, `lastname`, `gender`, `email`, `work_phone`, `home_phone`, `dob`, `pob`, `passport`, `marital_status`, `fname_next_of_kin`, `lname_next_of_kin`, `phone_next_of_kin`, `relate_next_of_kin`, `gender_next_of_kin`, `address_next_of_kin`, `employment_status`, `profession`, `area_of_specialization`, `nationality`, `state_origin`, `lga`, `town`, `maiden_name`, `resident_address`, `category`, `born_again`, `church_join_date`, `unit_join_date`, `membership_class`, `water_baptism`, `holyghost_baptism`, `wofbi_id`, `tither`, `homecell_id`, `hobbies`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Admin', 'Hoffman', 'male', 'admin@admin.com', '+1 (866) 274-7793', '+1 (264) 173-8605', '1990-09-10', 'Harum aut doloribus', 'C:\\xampp\\tmp\\php1E1D.tmp', 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-25 08:35:29', '2021-12-25 08:35:29'),
(2, 2, 1, 'Godwin', 'Ayala', 'female', 'godwin@gmail.com', '+1 (797) 745-3091', '+1 (151) 412-2408', '2018-02-15', 'A eveniet rerum eaq', 'C:\\xampp\\tmp\\php76EE.tmp', 'female', 'Kamal Meyers', 'Kibo Foley', '+1 (418) 317-1748', 'Occaecat illo volupt', 'male', 'Consectetur commodo', 'Aliquip quis incidid', 'Nam aut rerum mollit', 'fudufiv@mailinator.com', 'Commodi maxime ab re', 'Ipsa libero culpa', 'Esse necessitatibus', 'Quibusdam minima et', 'Ivor Parker', 'Accusantium ex quaer', NULL, 'Sint pariatur Vel i', '1987-01-07', '1994-11-26', 'Omnis qui id dolore', 'Dolorem dolor autem', 'Et eius eum voluptas', '1', 'Voluptatum accusanti', 'Velit perferendis d', 'Culpa hic dignissim', NULL, '2021-12-26 15:05:01', '2021-12-27 06:43:35'),
(3, 3, 1, 'Tom', 'Kirby', 'male', 'tom@yahoo.com', '+1 (714) 131-1323', '+1 (846) 852-1795', '1985-06-26', 'Duis et sint aut in', 'C:\\xampp\\tmp\\php622A.tmp', 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-26 15:05:57', '2021-12-26 15:05:57'),
(4, 4, 1, 'Emmanuel', 'Tillman', 'male', 'emmanuel@gmail.com', '+1 (885) 633-7659', '+1 (736) 815-9529', '2021-03-07', 'Omnis cupiditate ex', 'C:\\xampp\\tmp\\php2711.tmp', 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-26 15:06:47', '2021-12-26 15:06:47'),
(5, 5, 1, 'Nehru Wilcox', 'Travis', 'female', 'gegusyp@mailinator.com', '+1 (251) 626-8523', '+1 (421) 648-5601', '1970-06-21', 'Lorem ut aliquam ips', 'C:\\xampp\\tmp\\phpA971.tmp', 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-26 15:07:21', '2021-12-26 15:07:21'),
(6, 6, 1, 'Tarik Ellis', 'Mcbride', 'male', 'nisofa@mailinator.com', '+1 (625) 588-1392', '+1 (499) 368-9833', '1988-10-17', 'Ea qui eaque aperiam', 'C:\\xampp\\tmp\\php2365.tmp', 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-26 15:07:52', '2021-12-26 15:07:52'),
(7, 7, 1, 'Martena Davenport', 'Faulkner', 'male', 'levukiqego@mailinator.com', '+1 (933) 488-6674', '+1 (162) 428-6499', '1979-09-08', 'Voluptatum occaecat', 'C:\\xampp\\tmp\\php7F71.tmp', 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-26 15:08:15', '2021-12-26 15:08:15'),
(8, 9, 1, 'useremma', 'Nixon', 'female', 'user@user.com', '+1 (593) 565-2673', '+1 (218) 825-9896', '2020-05-25', 'Magni voluptatum ex', 'C:\\xampp\\tmp\\phpF984.tmp', 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-26 15:08:47', '2021-12-26 15:08:47'),
(10, 10, 1, 'Herrod Salazar', 'Valdez', 'male', 'wunicy@mailinator.com', '+1 (415) 305-8201', '+1 (237) 832-7902', '2012-12-24', 'Et explicabo Quam s', 'C:\\xampp\\tmp\\php7FD8.tmp', 'widowed', 'Summer Poole', 'Dexter Stephens', '+1 (609) 767-5399', 'Qui sit eveniet dic', 'female', 'Quos laudantium vel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-26 22:00:02', '2021-12-26 22:12:20'),
(11, 11, 1, 'Haley Clay', 'Lawrence', 'female', 'mepaguqy@mailinator.com', '+1 (928) 685-4098', '+1 (203) 834-3176', '1977-03-04', 'Eum esse quam ut qu', 'C:\\xampp\\tmp\\phpDFC8.tmp', 'single', 'Caesar Myers', 'Wynter Reid', '+1 (465) 451-1078', 'Qui eligendi maiores', 'male', 'Dolor natus et magna', 'Quas voluptas iure d', 'Voluptate ut velit c', 'sefenodyky@mailinator.com', 'Sed in aperiam paria', 'Quis ullam ipsa ut', 'Eiusmod nulla aut ip', 'Qui pariatur Incidi', 'Rhonda Guthrie', 'Optio ut itaque at', NULL, 'Aut aliquid adipisic', '2010-04-03', '2006-12-31', 'Assumenda harum irur', 'Sed iste nisi laudan', 'Doloribus amet atqu', '3', 'Inventore voluptatum', 'Consequatur sed aute', 'In ut veniam laudan', NULL, '2021-12-27 05:44:40', '2021-12-27 06:12:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annoucement_categories`
--
ALTER TABLE `annoucement_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bans`
--
ALTER TABLE `bans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `members_email_unique` (`email`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `postings`
--
ALTER TABLE `postings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studio_related_skills`
--
ALTER TABLE `studio_related_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subunits`
--
ALTER TABLE `subunits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suspensions`
--
ALTER TABLE `suspensions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_details_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annoucement_categories`
--
ALTER TABLE `annoucement_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bans`
--
ALTER TABLE `bans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postings`
--
ALTER TABLE `postings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studio_related_skills`
--
ALTER TABLE `studio_related_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subunits`
--
ALTER TABLE `subunits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suspensions`
--
ALTER TABLE `suspensions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
