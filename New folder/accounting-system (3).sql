-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2023 at 02:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounting-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'OHAUS', 'OH', NULL, NULL),
(2, 'A&D', 'AD', NULL, NULL),
(3, 'Sartorius STR', 'STR', NULL, NULL),
(4, 'ADAM AE', 'AE', NULL, NULL),
(5, 'CAS CS', 'CS', NULL, NULL),
(6, 'Detecto DT', 'DT', NULL, NULL),
(7, 'CARDINAL CN', 'CN', NULL, NULL),
(8, 'RICE LAKE RL', 'RL', NULL, NULL),
(9, 'PENSYLVANIA PN', 'BN', NULL, NULL),
(10, 'VELAB', 'VE', NULL, NULL),
(11, 'TORREY TR', 'TR', NULL, NULL),
(12, 'RADWAG', 'RD', NULL, NULL),
(13, 'BENCHMARK', 'BC', NULL, NULL),
(14, 'IKA', 'IKA', NULL, NULL),
(15, 'BRANDTECH', 'BR', NULL, NULL),
(16, 'JENCO INSTRUMENT', 'JC', NULL, NULL),
(17, 'MTC', 'MT', NULL, NULL),
(18, 'I.W TREMONT', 'LW', NULL, NULL),
(19, 'HUBER', 'HB', NULL, NULL),
(20, 'TPC DENTAL', 'TCP', NULL, NULL),
(21, 'DCI', 'DC', NULL, NULL),
(22, 'FLIGHT DENTAL', 'FL', NULL, NULL),
(23, 'BEYES', 'BE', NULL, NULL),
(24, 'VECTOR DENTAL', 'VD', NULL, NULL),
(25, 'LM SALISH MEDICAL', 'LM', NULL, NULL),
(26, 'BULK SCIENTIFIC', 'BK', NULL, NULL),
(27, 'ARTCO', 'AR', NULL, NULL),
(28, 'BIEN AIR', 'BA', NULL, NULL),
(29, 'BIOPLAST', 'BT', NULL, NULL),
(30, 'VELP', 'VP', NULL, NULL),
(31, 'AQUA PHOENIX', 'AP', NULL, NULL),
(32, 'BW TECHNOLOGIES', 'BW', NULL, NULL),
(33, 'Allied healthcare', 'AH', NULL, NULL),
(34, 'OTHERS', 'OT', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', NULL, NULL),
(2, 'AL', 'Albania', NULL, NULL),
(3, 'DZ', 'Algeria', NULL, NULL),
(4, 'AS', 'American Samoa', NULL, NULL),
(5, 'AD', 'Andorra', NULL, NULL),
(6, 'AO', 'Angola', NULL, NULL),
(7, 'AI', 'Anguilla', NULL, NULL),
(8, 'AQ', 'Antarctica', NULL, NULL),
(9, 'AG', 'Antigua and Barbuda', NULL, NULL),
(10, 'AR', 'Argentina', NULL, NULL),
(11, 'AM', 'Armenia', NULL, NULL),
(12, 'AW', 'Aruba', NULL, NULL),
(13, 'AU', 'Australia', NULL, NULL),
(14, 'AT', 'Austria', NULL, NULL),
(15, 'AZ', 'Azerbaijan', NULL, NULL),
(16, 'BS', 'Bahamas', NULL, NULL),
(17, 'BH', 'Bahrain', NULL, NULL),
(18, 'BD', 'Bangladesh', NULL, NULL),
(19, 'BB', 'Barbados', NULL, NULL),
(20, 'BY', 'Belarus', NULL, NULL),
(21, 'BE', 'Belgium', NULL, NULL),
(22, 'BZ', 'Belize', NULL, NULL),
(23, 'BJ', 'Benin', NULL, NULL),
(24, 'BM', 'Bermuda', NULL, NULL),
(25, 'BT', 'Bhutan', NULL, NULL),
(26, 'BO', 'Bolivia', NULL, NULL),
(27, 'BA', 'Bosnia and Herzegovina', NULL, NULL),
(28, 'BW', 'Botswana', NULL, NULL),
(29, 'BV', 'Bouvet Island', NULL, NULL),
(30, 'BR', 'Brazil', NULL, NULL),
(31, 'IO', 'British Indian Ocean Territory', NULL, NULL),
(32, 'BN', 'Brunei Darussalam', NULL, NULL),
(33, 'BG', 'Bulgaria', NULL, NULL),
(34, 'BF', 'Burkina Faso', NULL, NULL),
(35, 'BI', 'Burundi', NULL, NULL),
(36, 'KH', 'Cambodia', NULL, NULL),
(37, 'CM', 'Cameroon', NULL, NULL),
(38, 'CA', 'Canada', NULL, NULL),
(39, 'CV', 'Cape Verde', NULL, NULL),
(40, 'KY', 'Cayman Islands', NULL, NULL),
(41, 'CF', 'Central African Republic', NULL, NULL),
(42, 'TD', 'Chad', NULL, NULL),
(43, 'CL', 'Chile', NULL, NULL),
(44, 'CN', 'China', NULL, NULL),
(45, 'CX', 'Christmas Island', NULL, NULL),
(46, 'CC', 'Cocos (Keeling) Islands', NULL, NULL),
(47, 'CO', 'Colombia', NULL, NULL),
(48, 'KM', 'Comoros', NULL, NULL),
(49, 'CD', 'Democratic Republic of the Congo', NULL, NULL),
(50, 'CG', 'Republic of Congo', NULL, NULL),
(51, 'CK', 'Cook Islands', NULL, NULL),
(52, 'CR', 'Costa Rica', NULL, NULL),
(53, 'HR', 'Croatia (Hrvatska)', NULL, NULL),
(54, 'CU', 'Cuba', NULL, NULL),
(55, 'CY', 'Cyprus', NULL, NULL),
(56, 'CZ', 'Czech Republic', NULL, NULL),
(57, 'DK', 'Denmark', NULL, NULL),
(58, 'DJ', 'Djibouti', NULL, NULL),
(59, 'DM', 'Dominica', NULL, NULL),
(60, 'DO', 'Dominican Republic', NULL, NULL),
(61, 'TL', 'East Timor', NULL, NULL),
(62, 'EC', 'Ecuador', NULL, NULL),
(63, 'EG', 'Egypt', NULL, NULL),
(64, 'SV', 'El Salvador', NULL, NULL),
(65, 'GQ', 'Equatorial Guinea', NULL, NULL),
(66, 'ER', 'Eritrea', NULL, NULL),
(67, 'EE', 'Estonia', NULL, NULL),
(68, 'ET', 'Ethiopia', NULL, NULL),
(69, 'FK', 'Falkland Islands (Malvinas)', NULL, NULL),
(70, 'FO', 'Faroe Islands', NULL, NULL),
(71, 'FJ', 'Fiji', NULL, NULL),
(72, 'FI', 'Finland', NULL, NULL),
(73, 'FR', 'France', NULL, NULL),
(74, 'FX', 'France, Metropolitan', NULL, NULL),
(75, 'GF', 'French Guiana', NULL, NULL),
(76, 'PF', 'French Polynesia', NULL, NULL),
(77, 'TF', 'French Southern Territories', NULL, NULL),
(78, 'GA', 'Gabon', NULL, NULL),
(79, 'GM', 'Gambia', NULL, NULL),
(80, 'GE', 'Georgia', NULL, NULL),
(81, 'DE', 'Germany', NULL, NULL),
(82, 'GH', 'Ghana', NULL, NULL),
(83, 'GI', 'Gibraltar', NULL, NULL),
(84, 'GG', 'Guernsey', NULL, NULL),
(85, 'GR', 'Greece', NULL, NULL),
(86, 'GL', 'Greenland', NULL, NULL),
(87, 'GD', 'Grenada', NULL, NULL),
(88, 'GP', 'Guadeloupe', NULL, NULL),
(89, 'GU', 'Guam', NULL, NULL),
(90, 'GT', 'Guatemala', NULL, NULL),
(91, 'GN', 'Guinea', NULL, NULL),
(92, 'GW', 'Guinea-Bissau', NULL, NULL),
(93, 'GY', 'Guyana', NULL, NULL),
(94, 'HT', 'Haiti', NULL, NULL),
(95, 'HM', 'Heard and Mc Donald Islands', NULL, NULL),
(96, 'HN', 'Honduras', NULL, NULL),
(97, 'HK', 'Hong Kong', NULL, NULL),
(98, 'HU', 'Hungary', NULL, NULL),
(99, 'IS', 'Iceland', NULL, NULL),
(100, 'IN', 'India', NULL, NULL),
(101, 'IM', 'Isle of Man', NULL, NULL),
(102, 'ID', 'Indonesia', NULL, NULL),
(103, 'IR', 'Iran (Islamic Republic of)', NULL, NULL),
(104, 'IQ', 'Iraq', NULL, NULL),
(105, 'IE', 'Ireland', NULL, NULL),
(106, 'IL', 'Israel', NULL, NULL),
(107, 'IT', 'Italy', NULL, NULL),
(108, 'CI', 'Ivory Coast', NULL, NULL),
(109, 'JE', 'Jersey', NULL, NULL),
(110, 'JM', 'Jamaica', NULL, NULL),
(111, 'JP', 'Japan', NULL, NULL),
(112, 'JO', 'Jordan', NULL, NULL),
(113, 'KZ', 'Kazakhstan', NULL, NULL),
(114, 'KE', 'Kenya', NULL, NULL),
(115, 'KI', 'Kiribati', NULL, NULL),
(116, 'KR', 'Korea, Republic of', NULL, NULL),
(117, 'XK', 'Kosovo', NULL, NULL),
(118, 'KW', 'Kuwait', NULL, NULL),
(119, 'KG', 'Kyrgyzstan', NULL, NULL),
(120, 'LV', 'Latvia', NULL, NULL),
(121, 'LB', 'Lebanon', NULL, NULL),
(122, 'LS', 'Lesotho', NULL, NULL),
(123, 'LR', 'Liberia', NULL, NULL),
(124, 'LY', 'Libyan Arab Jamahiriya', NULL, NULL),
(125, 'LI', 'Liechtenstein', NULL, NULL),
(126, 'LT', 'Lithuania', NULL, NULL),
(127, 'LU', 'Luxembourg', NULL, NULL),
(128, 'MO', 'Macau', NULL, NULL),
(129, 'MK', 'North Macedonia', NULL, NULL),
(130, 'MG', 'Madagascar', NULL, NULL),
(131, 'MW', 'Malawi', NULL, NULL),
(132, 'MY', 'Malaysia', NULL, NULL),
(133, 'MV', 'Maldives', NULL, NULL),
(134, 'ML', 'Mali', NULL, NULL),
(135, 'MT', 'Malta', NULL, NULL),
(136, 'MH', 'Marshall Islands', NULL, NULL),
(137, 'MQ', 'Martinique', NULL, NULL),
(138, 'MR', 'Mauritania', NULL, NULL),
(139, 'MU', 'Mauritius', NULL, NULL),
(140, 'YT', 'Mayotte', NULL, NULL),
(141, 'MX', 'Mexico', NULL, NULL),
(142, 'FM', 'Micronesia, Federated States of', NULL, NULL),
(143, 'MD', 'Moldova, Republic of', NULL, NULL),
(144, 'MC', 'Monaco', NULL, NULL),
(145, 'MN', 'Mongolia', NULL, NULL),
(146, 'ME', 'Montenegro', NULL, NULL),
(147, 'MS', 'Montserrat', NULL, NULL),
(148, 'MA', 'Morocco', NULL, NULL),
(149, 'MZ', 'Mozambique', NULL, NULL),
(150, 'MM', 'Myanmar', NULL, NULL),
(151, 'NA', 'Namibia', NULL, NULL),
(152, 'NR', 'Nauru', NULL, NULL),
(153, 'NP', 'Nepal', NULL, NULL),
(154, 'NL', 'Netherlands', NULL, NULL),
(155, 'AN', 'Netherlands Antilles', NULL, NULL),
(156, 'NC', 'New Caledonia', NULL, NULL),
(157, 'NZ', 'New Zealand', NULL, NULL),
(158, 'NI', 'Nicaragua', NULL, NULL),
(159, 'NE', 'Niger', NULL, NULL),
(160, 'NG', 'Nigeria', NULL, NULL),
(161, 'NU', 'Niue', NULL, NULL),
(162, 'NF', 'Norfolk Island', NULL, NULL),
(163, 'MP', 'Northern Mariana Islands', NULL, NULL),
(164, 'NO', 'Norway', NULL, NULL),
(165, 'OM', 'Oman', NULL, NULL),
(166, 'PK', 'Pakistan', NULL, NULL),
(167, 'PW', 'Palau', NULL, NULL),
(168, 'PS', 'Palestine', NULL, NULL),
(169, 'PA', 'Panama', NULL, NULL),
(170, 'PG', 'Papua New Guinea', NULL, NULL),
(171, 'PY', 'Paraguay', NULL, NULL),
(172, 'PE', 'Peru', NULL, NULL),
(173, 'PH', 'Philippines', NULL, NULL),
(174, 'PN', 'Pitcairn', NULL, NULL),
(175, 'PL', 'Poland', NULL, NULL),
(176, 'PT', 'Portugal', NULL, NULL),
(177, 'PR', 'Puerto Rico', NULL, NULL),
(178, 'QA', 'Qatar', NULL, NULL),
(179, 'RE', 'Reunion', NULL, NULL),
(180, 'RO', 'Romania', NULL, NULL),
(181, 'RU', 'Russian Federation', NULL, NULL),
(182, 'RW', 'Rwanda', NULL, NULL),
(183, 'KN', 'Saint Kitts and Nevis', NULL, NULL),
(184, 'LC', 'Saint Lucia', NULL, NULL),
(185, 'VC', 'Saint Vincent and the Grenadines', NULL, NULL),
(186, 'WS', 'Samoa', NULL, NULL),
(187, 'SM', 'San Marino', NULL, NULL),
(188, 'ST', 'Sao Tome and Principe', NULL, NULL),
(189, 'SA', 'Saudi Arabia', NULL, NULL),
(190, 'SN', 'Senegal', NULL, NULL),
(191, 'RS', 'Serbia', NULL, NULL),
(192, 'SC', 'Seychelles', NULL, NULL),
(193, 'SL', 'Sierra Leone', NULL, NULL),
(194, 'SG', 'Singapore', NULL, NULL),
(195, 'SK', 'Slovakia', NULL, NULL),
(196, 'SI', 'Slovenia', NULL, NULL),
(197, 'SB', 'Solomon Islands', NULL, NULL),
(198, 'SO', 'Somalia', NULL, NULL),
(199, 'ZA', 'South Africa', NULL, NULL),
(200, 'GS', 'South Georgia South Sandwich Islands', NULL, NULL),
(201, 'SS', 'South Sudan', NULL, NULL),
(202, 'ES', 'Spain', NULL, NULL),
(203, 'LK', 'Sri Lanka', NULL, NULL),
(204, 'SH', 'St. Helena', NULL, NULL),
(205, 'PM', 'St. Pierre and Miquelon', NULL, NULL),
(206, 'SD', 'Sudan', NULL, NULL),
(207, 'SR', 'Suriname', NULL, NULL),
(208, 'SJ', 'Svalbard and Jan Mayen Islands', NULL, NULL),
(209, 'SZ', 'Eswatini', NULL, NULL),
(210, 'SE', 'Sweden', NULL, NULL),
(211, 'CH', 'Switzerland', NULL, NULL),
(212, 'SY', 'Syrian Arab Republic', NULL, NULL),
(213, 'TW', 'Taiwan', NULL, NULL),
(214, 'TJ', 'Tajikistan', NULL, NULL),
(215, 'TZ', 'Tanzania, United Republic of', NULL, NULL),
(216, 'TH', 'Thailand', NULL, NULL),
(217, 'TG', 'Togo', NULL, NULL),
(218, 'TK', 'Tokelau', NULL, NULL),
(219, 'TO', 'Tonga', NULL, NULL),
(220, 'TT', 'Trinidad and Tobago', NULL, NULL),
(221, 'TN', 'Tunisia', NULL, NULL),
(222, 'TR', 'Turkey', NULL, NULL),
(223, 'TM', 'Turkmenistan', NULL, NULL),
(224, 'TC', 'Turks and Caicos Islands', NULL, NULL),
(225, 'TV', 'Tuvalu', NULL, NULL),
(226, 'UG', 'Uganda', NULL, NULL),
(227, 'UA', 'Ukraine', NULL, NULL),
(228, 'AE', 'United Arab Emirates', NULL, NULL),
(229, 'GB', 'United Kingdom', NULL, NULL),
(230, 'US', 'United States', NULL, NULL),
(231, 'UM', 'United States minor outlying islands', NULL, NULL),
(232, 'UY', 'Uruguay', NULL, NULL),
(233, 'UZ', 'Uzbekistan', NULL, NULL),
(234, 'VU', 'Vanuatu', NULL, NULL),
(235, 'VA', 'Vatican City State', NULL, NULL),
(236, 'VE', 'Venezuela', NULL, NULL),
(237, 'VN', 'Vietnam', NULL, NULL),
(238, 'VG', 'Virgin Islands (British)', NULL, NULL),
(239, 'VI', 'Virgin Islands (U.S.)', NULL, NULL),
(240, 'WF', 'Wallis and Futuna Islands', NULL, NULL),
(241, 'EH', 'Western Sahara', NULL, NULL),
(242, 'YE', 'Yemen', NULL, NULL),
(243, 'ZM', 'Zambia', NULL, NULL),
(244, 'ZW', 'Zimbabwe', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `start_date` date NOT NULL,
  `payout_date` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `address`, `phone`, `email`, `salary`, `start_date`, `payout_date`, `birthdate`, `created_at`, `updated_at`) VALUES
(1, 'Abeer', 'Alhamwia', 'syria', '991493515', 'abeerhamwia@gmail.com', 300.00, '2023-09-01', 1, '1997-07-21', '2023-12-13 06:26:22', '2023-12-13 06:38:59');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL DEFAULT 0,
  `expenses_type_id` bigint(20) UNSIGNED NOT NULL,
  `installment_amount` decimal(8,2) NOT NULL,
  `installment_count` int(11) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `due_date` date NOT NULL,
  `paid_date` date DEFAULT NULL,
  `charges` decimal(8,2) NOT NULL,
  `due_charges` decimal(8,2) NOT NULL,
  `period` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `group_id`, `expenses_type_id`, `installment_amount`, `installment_count`, `amount`, `status`, `due_date`, `paid_date`, `charges`, `due_charges`, `period`, `priority`, `created_at`, `updated_at`) VALUES
(27, 0, 2, 20.00, 2, 40.00, 0, '2023-12-12', NULL, 10.00, 20.00, 'weekly', 'Medium', '2023-12-11 09:31:15', '2023-12-11 09:31:15'),
(28, 0, 2, 20.00, 2, 40.00, 0, '2023-12-19', NULL, 10.00, 20.00, 'weekly', 'Medium', '2023-12-11 09:31:15', '2023-12-11 09:31:15'),
(29, 1, 2, 20.00, 2, 40.00, 0, '2023-12-15', NULL, 10.00, 15.00, 'monthly', 'Medium', '2023-12-11 09:34:19', '2023-12-15 08:46:17'),
(30, 1, 2, 20.00, 2, 40.00, 0, '2024-01-15', NULL, 10.00, 15.00, 'monthly', 'Medium', '2023-12-11 09:34:19', '2023-12-11 09:34:19'),
(31, 2, 3, 100.00, 2, 200.00, 1, '2023-12-10', '2023-12-12', 50.00, 60.00, 'monthly', 'High', '2023-12-11 09:35:22', '2023-12-12 06:41:24'),
(32, 2, 3, 100.00, 2, 200.00, 0, '2024-01-10', NULL, 50.00, 60.00, 'monthly', 'High', '2023-12-11 09:35:22', '2023-12-11 09:35:22'),
(33, 3, 3, 100.00, 3, 300.00, 0, '2023-12-15', NULL, 10.00, 60.00, 'monthly', 'Medium', '2023-12-11 10:05:11', '2023-12-11 10:05:11'),
(34, 3, 3, 100.00, 3, 300.00, 0, '2024-01-15', NULL, 10.00, 60.00, 'monthly', 'Medium', '2023-12-11 10:05:11', '2023-12-11 10:05:11'),
(35, 3, 3, 100.00, 3, 300.00, 0, '2024-02-15', NULL, 10.00, 60.00, 'monthly', 'Medium', '2023-12-11 10:05:11', '2023-12-11 10:05:11');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_types`
--

CREATE TABLE `expenses_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `bounce` text DEFAULT NULL,
  `punishment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses_types`
--

INSERT INTO `expenses_types` (`id`, `name`, `bounce`, `punishment`, `created_at`, `updated_at`) VALUES
(2, 'Subscription', NULL, NULL, '2023-11-13 13:16:27', '2023-11-13 13:16:27'),
(3, 'expensesType', 'test', 'test', '2023-11-13 13:29:09', '2023-11-28 12:37:09');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_30_085049_create_permission_tables', 1),
(6, '2023_11_06_132225_create_sales_table', 1),
(7, '2023_11_06_133254_create_brands_table', 1),
(8, '2023_11_06_133304_create_countries_table', 1),
(9, '2023_11_06_133316_create_platforms_table', 1),
(10, '2023_11_13_132443_create_expenses_types_table', 2),
(11, '2023_11_13_132731_create_expenses_types_table', 3),
(12, '2023_11_13_133453_create_expenses_table', 4),
(13, '2023_11_15_135912_create_sales_file_types_table', 5),
(14, '2023_11_15_164411_create_sales_files_table', 6),
(15, '2023_11_16_083418_update_sales_files_table', 7),
(16, '2023_11_20_074352_add_columns_to_sales_table', 8),
(17, '2023_11_21_110032_create_purchase_orders_table', 9),
(18, '2023_11_21_110049_create_purchase_order_products_table', 9),
(19, '2023_11_21_111556_add_code_to_brands_table', 9),
(20, '2023_11_23_104350_create_quotations_table', 10),
(21, '2023_11_23_104421_create_quotation_products_table', 10),
(22, '2023_11_23_122027_modify_quotations_table', 11),
(23, '2023_11_27_120007_add_columns_to_platforms_table', 12),
(24, '2023_11_28_135546_create_statuses_table', 13),
(25, '2023_11_28_140139_add_status_id_to_sales_table', 13),
(26, '2023_11_28_141156_add_columns_to_expenses_types_table', 14),
(29, '2023_12_11_075659_add_additional_statuses_to_statuses_table', 15),
(30, '2023_12_11_100912_drop_group_id_column_from_expenses_table', 15),
(31, '2023_12_11_101109_add_group_id_to_expenses_table', 16),
(32, '2023_12_11_111715_drop_group_id_column_from_expenses_table', 17),
(33, '2023_12_11_111928_add_group_id_to_expenses_table', 18),
(34, '2023_12_12_074841_add_columns_to_sales_table', 19),
(35, '2023_12_13_073419_create_employees_table', 20),
(36, '2023_12_13_082540_create_employees_table', 21),
(37, '2023_12_13_084704_add_ship_date_to_platforms', 22),
(38, '2023_12_20_133653_add_new_brands', 23),
(39, '2023_12_20_191428_modify_gross_profit_percentage_column', 24),
(40, '2023_12_20_191751_modify_gross_profit_percentage_column', 25),
(41, '2023_12_21_090942_add_additional_brands', 26),
(42, '2023_12_25_141221_modify_platforms_table', 27),
(43, '2023_12_28_081555_add_currency_to_sales_table', 28),
(44, '2023_12_28_085011_rename_currency_column_in_sales_table', 29);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 3);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'test', 'web', '2023-12-26 09:17:38', '2023-12-26 09:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `platforms`
--

CREATE TABLE `platforms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `immediately` tinyint(1) NOT NULL DEFAULT 0,
  `pay_out_1` int(11) DEFAULT NULL,
  `pay_out_2` int(11) DEFAULT NULL,
  `shipment_status` tinyint(1) NOT NULL DEFAULT 0,
  `sales_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `platforms`
--

INSERT INTO `platforms` (`id`, `name`, `created_at`, `updated_at`, `immediately`, `pay_out_1`, `pay_out_2`, `shipment_status`, `sales_status`) VALUES
(1, 'Ebay', NULL, '2023-12-21 11:00:12', 1, NULL, NULL, 0, 0),
(2, 'Ebay SPX', NULL, '2023-11-29 08:48:28', 0, 20, 30, 0, 0),
(3, 'Ebay Trust', NULL, NULL, 0, NULL, NULL, 0, 0),
(4, 'Amazon Canada', NULL, NULL, 0, NULL, NULL, 0, 0),
(5, 'Google', NULL, NULL, 0, NULL, NULL, 0, 0),
(6, 'J&K Innovation', NULL, NULL, 0, NULL, NULL, 0, 0),
(7, 'Other', NULL, NULL, 0, NULL, NULL, 0, 0),
(8, 'Ramo Turkey', NULL, NULL, 0, NULL, NULL, 0, 0),
(9, 'Ramo Trading', NULL, NULL, 0, NULL, NULL, 0, 0),
(10, 'Amazon', NULL, NULL, 0, NULL, NULL, 0, 0),
(11, 'Amazon Mexico', NULL, NULL, 0, NULL, NULL, 0, 0),
(12, 'Dental Assets', '2023-12-20 11:03:38', '2023-12-20 11:03:38', 0, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_phone` varchar(255) DEFAULT NULL,
  `customer_state` varchar(255) DEFAULT NULL,
  `customer_company_name` varchar(255) DEFAULT NULL,
  `customer_address_1` varchar(255) DEFAULT NULL,
  `customer_address_2` varchar(255) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_city` varchar(255) DEFAULT NULL,
  `customer_zip_code` varchar(255) DEFAULT NULL,
  `billing_name` varchar(255) DEFAULT NULL,
  `billing_phone` varchar(255) DEFAULT NULL,
  `billing_state` varchar(255) DEFAULT NULL,
  `billing_company_name` varchar(255) DEFAULT NULL,
  `billing_address_1` varchar(255) DEFAULT NULL,
  `billing_address_2` varchar(255) DEFAULT NULL,
  `billing_email` varchar(255) DEFAULT NULL,
  `billing_city` varchar(255) DEFAULT NULL,
  `billing_zip_code` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `shipping` varchar(255) DEFAULT NULL,
  `total_quantity` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `customer_name`, `customer_phone`, `customer_state`, `customer_company_name`, `customer_address_1`, `customer_address_2`, `customer_email`, `customer_city`, `customer_zip_code`, `billing_name`, `billing_phone`, `billing_state`, `billing_company_name`, `billing_address_1`, `billing_address_2`, `billing_email`, `billing_city`, `billing_zip_code`, `note`, `payment`, `shipping`, `total_quantity`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 06:35:27', '2023-11-22 06:35:27'),
(2, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', NULL, NULL, '2023-11-22 06:36:27', '2023-11-22 06:36:27'),
(3, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', NULL, NULL, '2023-11-22 06:38:39', '2023-11-22 06:38:39'),
(4, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 06:44:56', '2023-11-22 06:44:56'),
(5, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 06:45:42', '2023-11-22 06:45:42'),
(6, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 06:49:28', '2023-11-22 06:49:28'),
(7, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 06:51:05', '2023-11-22 06:51:05'),
(8, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 07:23:31', '2023-11-22 07:23:31'),
(9, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 07:30:14', '2023-11-22 07:30:14'),
(10, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 07:32:48', '2023-11-22 07:32:48'),
(11, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 07:38:32', '2023-11-22 07:38:32'),
(12, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 07:46:04', '2023-11-22 07:46:04'),
(13, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 07:47:29', '2023-11-22 07:47:29'),
(14, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 07:48:59', '2023-11-22 07:48:59'),
(15, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 07:50:54', '2023-11-22 07:50:54'),
(16, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 07:52:32', '2023-11-22 07:52:32'),
(17, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 07:53:18', '2023-11-22 07:53:18'),
(18, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 07:53:50', '2023-11-22 07:53:50'),
(19, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 07:54:18', '2023-11-22 07:54:18'),
(20, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 07:54:45', '2023-11-22 07:54:45'),
(21, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 07:57:03', '2023-11-22 07:57:03'),
(22, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 07:59:23', '2023-11-22 07:59:23'),
(23, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 08:02:27', '2023-11-22 08:02:27'),
(24, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 08:04:52', '2023-11-22 08:04:52'),
(25, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 08:08:58', '2023-11-22 08:08:58'),
(26, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 08:09:32', '2023-11-22 08:09:32'),
(27, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', NULL, NULL, '2023-11-22 08:09:45', '2023-11-22 08:09:45'),
(28, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', NULL, NULL, '2023-11-22 08:11:15', '2023-11-22 08:11:15'),
(29, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 08:11:25', '2023-11-22 08:11:25'),
(30, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 08:16:30', '2023-11-22 08:16:30'),
(31, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 08:18:05', '2023-11-22 08:18:05'),
(32, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 08:19:06', '2023-11-22 08:19:06'),
(33, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 08:26:27', '2023-11-22 08:26:27'),
(34, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 08:31:57', '2023-11-22 08:31:57'),
(35, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 08:45:19', '2023-11-22 08:45:19'),
(36, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 08:47:19', '2023-11-22 08:47:19'),
(37, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 3, 6.00, '2023-11-22 08:47:56', '2023-11-22 08:47:56'),
(38, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 3, 6.00, '2023-11-22 08:53:28', '2023-11-22 08:53:28'),
(39, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 3, 6.00, '2023-11-22 08:54:11', '2023-11-22 08:54:11'),
(40, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 3, 6.00, '2023-11-22 09:04:56', '2023-11-22 09:04:56'),
(41, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', NULL, NULL, '2023-11-22 09:18:28', '2023-11-22 09:18:28'),
(42, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 09:29:46', '2023-11-22 09:29:46'),
(43, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 09:31:05', '2023-11-22 09:31:05'),
(44, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 09:32:18', '2023-11-22 09:32:18'),
(45, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 09:33:10', '2023-11-22 09:33:10'),
(46, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 1, 2.00, '2023-11-22 09:34:44', '2023-11-22 09:34:44'),
(47, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 3, 6.00, '2023-11-22 09:39:56', '2023-11-22 09:39:56'),
(48, 'Tango Biosciences', NULL, 'IL', 'source code', 'damascus', NULL, NULL, 'Chicago', NULL, 'test', '0389459283', NULL, NULL, 'syria', NULL, 'test1@gmail.com', NULL, NULL, NULL, 'visa', 'direct', 3, 6.00, '2023-11-22 09:48:36', '2023-11-22 09:48:36'),
(49, 'Abeer admin', '0389459283', 'OK', 'source code', 'damascus', NULL, 'admin@gmail.com', 'Phnom Penh', '12411', 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', '60612-3502', 'no', 'visa', 'direct', 3, 500.00, '2023-12-27 13:48:13', '2023-12-27 13:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_products`
--

CREATE TABLE `purchase_order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_order_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `our_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_order_products`
--

INSERT INTO `purchase_order_products` (`id`, `purchase_order_id`, `brand_id`, `our_id`, `product_name`, `quantity`, `product_price`, `created_at`, `updated_at`) VALUES
(1, 36, 1, 1, 'test', 1, 2.00, '2023-11-22 08:47:19', '2023-11-22 08:47:19'),
(2, 37, 2, 1, 'test', 1, 2.00, '2023-11-22 08:47:56', '2023-11-22 08:47:56'),
(3, 38, 2, 2, 'test', 1, 2.00, '2023-11-22 08:53:28', '2023-11-22 08:53:28'),
(4, 39, 2, 3, 'test', 1, 2.00, '2023-11-22 08:54:11', '2023-11-22 08:54:11'),
(5, 44, 1, 2, 'test', 1, 2.00, '2023-11-22 09:32:18', '2023-11-22 09:32:18'),
(6, 45, 1, 3, 'test', 1, 2.00, '2023-11-22 09:33:10', '2023-11-22 09:33:10'),
(7, 46, 1, 4, 'test', 1, 2.00, '2023-11-22 09:34:44', '2023-11-22 09:34:44'),
(8, 48, 3, 1, 'test', 1, 2.00, '2023-11-22 09:48:36', '2023-11-22 09:48:36'),
(9, 48, 3, 1, 'test1', 2, 2.00, '2023-11-22 09:48:36', '2023-11-22 09:48:36'),
(10, 49, 1, 5, 'abeer', 2, 200.00, '2023-12-27 13:48:13', '2023-12-27 13:48:13'),
(11, 49, 1, 5, 'test', 1, 100.00, '2023-12-27 13:48:13', '2023-12-27 13:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_phone` varchar(255) DEFAULT NULL,
  `customer_state` varchar(255) DEFAULT NULL,
  `customer_company_name` varchar(255) DEFAULT NULL,
  `customer_address_1` varchar(255) DEFAULT NULL,
  `customer_address_2` varchar(255) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_city` varchar(255) DEFAULT NULL,
  `customer_zip_code` varchar(255) DEFAULT NULL,
  `billing_name` varchar(255) DEFAULT NULL,
  `billing_phone` varchar(255) DEFAULT NULL,
  `billing_state` varchar(255) DEFAULT NULL,
  `billing_company_name` varchar(255) DEFAULT NULL,
  `billing_address_1` varchar(255) DEFAULT NULL,
  `billing_address_2` varchar(255) DEFAULT NULL,
  `billing_email` varchar(255) DEFAULT NULL,
  `billing_city` varchar(255) DEFAULT NULL,
  `billing_zip_code` varchar(255) DEFAULT NULL,
  `quotation_type` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `valid` tinyint(1) DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `total_tax` decimal(10,2) DEFAULT NULL,
  `shipping_cost` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_discount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `customer_name`, `customer_phone`, `customer_state`, `customer_company_name`, `customer_address_1`, `customer_address_2`, `customer_email`, `customer_city`, `customer_zip_code`, `billing_name`, `billing_phone`, `billing_state`, `billing_company_name`, `billing_address_1`, `billing_address_2`, `billing_email`, `billing_city`, `billing_zip_code`, `quotation_type`, `note`, `valid`, `payment`, `total_price`, `total_tax`, `shipping_cost`, `created_at`, `updated_at`, `total_discount`) VALUES
(1, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', '60612-3502', 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', '60612-3502', NULL, NULL, NULL, NULL, 2.00, NULL, NULL, '2023-11-23 18:35:49', '2023-11-23 18:35:49', 22.00),
(2, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', '60612-3502', 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', '60612-3502', NULL, NULL, NULL, NULL, 2.00, NULL, NULL, '2023-11-23 18:39:47', '2023-11-23 18:39:47', 22.00),
(3, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 2.00, NULL, NULL, '2023-11-23 18:42:23', '2023-11-23 18:42:23', 22.00),
(4, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 4.00, NULL, NULL, '2023-11-23 19:30:52', '2023-11-23 19:30:52', 24.00),
(5, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 4.00, NULL, NULL, '2023-11-23 19:31:40', '2023-11-23 19:31:40', 24.00),
(6, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 4.00, NULL, NULL, '2023-11-23 19:32:03', '2023-11-23 19:32:03', 24.00),
(7, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 4.00, NULL, NULL, '2023-11-23 19:36:07', '2023-11-23 19:36:07', 24.00),
(8, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 4.00, NULL, NULL, '2023-11-23 19:36:37', '2023-11-23 19:36:37', 24.00),
(9, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 4.00, NULL, NULL, '2023-11-23 19:37:27', '2023-11-23 19:37:27', 24.00),
(10, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 4.00, NULL, NULL, '2023-11-23 19:42:05', '2023-11-23 19:42:05', 24.00),
(11, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 4.00, NULL, NULL, '2023-11-23 19:48:12', '2023-11-23 19:48:12', 24.00),
(12, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 4.00, NULL, NULL, '2023-11-23 19:48:29', '2023-11-23 19:48:29', 24.00),
(13, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 4.00, NULL, NULL, '2023-11-24 07:11:45', '2023-11-24 07:11:45', 24.00),
(14, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 4.00, NULL, NULL, '2023-11-24 07:13:42', '2023-11-24 07:13:42', 24.00),
(15, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 4.00, NULL, NULL, '2023-11-24 07:15:04', '2023-11-24 07:15:04', 24.00),
(16, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 4.00, NULL, NULL, '2023-11-24 07:27:13', '2023-11-24 07:27:13', 24.00),
(17, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 4.00, NULL, NULL, '2023-11-24 07:28:32', '2023-11-24 07:28:32', 24.00),
(18, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 4.00, NULL, NULL, '2023-11-24 07:32:00', '2023-11-24 07:32:00', 24.00),
(19, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 6.00, NULL, NULL, '2023-11-24 07:57:05', '2023-11-24 07:57:05', 23.00),
(20, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 2.00, NULL, NULL, '2023-11-24 08:00:26', '2023-11-24 08:00:26', 22.00),
(21, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 2.00, NULL, NULL, '2023-11-24 08:14:24', '2023-11-24 08:14:24', 22.00),
(22, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 2.00, NULL, NULL, '2023-11-24 08:19:43', '2023-11-24 08:19:43', 22.00),
(23, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 2.00, NULL, NULL, '2023-11-24 08:23:12', '2023-11-24 08:23:12', 22.00),
(24, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 2.00, NULL, NULL, '2023-11-24 08:29:22', '2023-11-24 08:29:22', 22.00),
(25, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 2.00, NULL, NULL, '2023-11-24 08:29:47', '2023-11-24 08:29:47', 22.00),
(26, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 2.00, NULL, NULL, '2023-11-24 08:30:47', '2023-11-24 08:30:47', 22.00),
(27, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 2.00, NULL, NULL, '2023-11-24 08:32:41', '2023-11-24 08:32:41', 22.00),
(28, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 2.00, NULL, NULL, '2023-11-24 08:41:19', '2023-11-24 08:41:19', 22.00),
(29, 'Tango Biosciences', '0389459283', 'IL', 'source code', 'damascus', NULL, 'test1@gmail.com', 'Chicago', NULL, 'test', '0389459283', 'IL', 'source code', 'syria', NULL, 'test1@gmail.com', 'Chicago', NULL, NULL, NULL, NULL, NULL, 2.00, NULL, NULL, '2023-11-24 08:42:05', '2023-11-24 08:42:05', 22.00);

-- --------------------------------------------------------

--
-- Table structure for table `quotation_products`
--

CREATE TABLE `quotation_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quotation_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `our_id` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `shipping_cost` decimal(10,2) DEFAULT NULL,
  `shipping_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotation_products`
--

INSERT INTO `quotation_products` (`id`, `quotation_id`, `brand_id`, `our_id`, `product_name`, `quantity`, `product_price`, `discount`, `shipping_cost`, `shipping_type`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '1', 'test', 1, 2.00, 22.00, NULL, 'ebay', '2023-11-23 18:39:47', '2023-11-23 18:39:47'),
(2, 3, 3, '1', 'test', 1, 2.00, 22.00, NULL, 'ebay', '2023-11-23 18:42:23', '2023-11-23 18:42:23'),
(3, 4, 1, '2', 'test', 1, 2.00, 22.00, NULL, 'ebay', '2023-11-23 19:30:52', '2023-11-23 19:30:52'),
(4, 6, 3, '2', 'test', 1, 2.00, 22.00, NULL, 'ebay', '2023-11-23 19:32:03', '2023-11-23 19:32:03'),
(5, 7, 2, '1', 'test', 1, 2.00, 22.00, NULL, 'ebay', '2023-11-23 19:36:07', '2023-11-23 19:36:07'),
(6, 8, 4, '1', 'test', 1, 2.00, 22.00, NULL, 'ebay', '2023-11-23 19:36:37', '2023-11-23 19:36:37'),
(7, 9, 4, '2', 'test', 1, 2.00, 22.00, NULL, 'ebay', '2023-11-23 19:37:27', '2023-11-23 19:37:27'),
(8, 10, 4, '3', 'test', 1, 2.00, 22.00, NULL, 'ebay', '2023-11-23 19:42:05', '2023-11-23 19:42:05'),
(9, 11, 4, '4', 'test', 1, 2.00, 22.00, NULL, 'ebay', '2023-11-23 19:48:12', '2023-11-23 19:48:12'),
(10, 12, 2, '2', 'test', 1, 2.00, 22.00, NULL, 'ebay', '2023-11-23 19:48:29', '2023-11-23 19:48:29'),
(11, 12, 2, '3', 'test1', 1, 2.00, 2.00, NULL, NULL, '2023-11-23 19:48:29', '2023-11-23 19:48:29'),
(12, 13, 8, '1', 'test', 1, 2.00, 22.00, NULL, 'ebay', '2023-11-24 07:11:45', '2023-11-24 07:11:45'),
(13, 13, 10, '1', 'test1', 1, 2.00, 2.00, NULL, NULL, '2023-11-24 07:11:45', '2023-11-24 07:11:45'),
(14, 14, 7, '1', 'test', 1, 2.00, 22.00, NULL, 'ebay', '2023-11-24 07:13:42', '2023-11-24 07:13:42'),
(15, 14, 9, '1', 'test1', 1, 2.00, 2.00, NULL, NULL, '2023-11-24 07:13:42', '2023-11-24 07:13:42'),
(16, 15, 10, '2', 'test', 1, 2.00, 22.00, NULL, 'ebay', '2023-11-24 07:15:04', '2023-11-24 07:15:04'),
(17, 15, 11, '1', 'test1', 1, 2.00, 2.00, NULL, NULL, '2023-11-24 07:15:04', '2023-11-24 07:15:04'),
(18, 16, 4, '5', 'test', 1, 2.00, 22.00, NULL, 'ebay', '2023-11-24 07:27:13', '2023-11-24 07:27:13'),
(19, 16, 6, '1', 'test1', 1, 2.00, 2.00, NULL, NULL, '2023-11-24 07:27:13', '2023-11-24 07:27:13'),
(20, 17, 2, '4', 'test', 1, 2.00, 22.00, NULL, 'ebay', '2023-11-24 07:28:32', '2023-11-24 07:28:32'),
(21, 17, 3, '3', 'test1', 1, 2.00, 2.00, NULL, NULL, '2023-11-24 07:28:32', '2023-11-24 07:28:32'),
(22, 18, 9, '2', 'test', 1, 2.00, 22.00, NULL, 'ebay', '2023-11-24 07:32:00', '2023-11-24 07:32:00'),
(23, 18, 4, '6', 'test1', 1, 2.00, 2.00, NULL, NULL, '2023-11-24 07:32:00', '2023-11-24 07:32:00'),
(24, 19, 6, '2', 'test', 1, 2.00, 22.00, NULL, 'ebay', '2023-11-24 07:57:05', '2023-11-24 07:57:05'),
(25, 19, 5, '1', 'test2', 2, 2.00, 1.00, NULL, NULL, '2023-11-24 07:57:05', '2023-11-24 07:57:05'),
(26, 25, 4, '7', 'test', 1, 2.00, 22.00, NULL, 'ebay', '2023-11-24 08:29:47', '2023-11-24 08:29:47'),
(27, 25, 2, '5', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-24 08:29:47', '2023-11-24 08:29:47'),
(28, 26, 3, '4', 'test', 1, 2.00, 22.00, NULL, 'ebay', '2023-11-24 08:30:47', '2023-11-24 08:30:47'),
(29, 26, 3, '5', 'test2', NULL, NULL, NULL, NULL, NULL, '2023-11-24 08:30:47', '2023-11-24 08:30:47'),
(30, 29, 9, '3', 'test', 1, 2.00, 22.00, NULL, 'ebay', '2023-11-24 08:42:05', '2023-11-24 08:42:05'),
(31, 29, 7, '2', 'testw', NULL, NULL, NULL, NULL, 'ebay', '2023-11-24 08:42:05', '2023-11-24 08:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-11-07 10:37:00', '2023-11-07 10:37:00'),
(2, 'writer', 'web', '2023-11-07 10:37:00', '2023-11-07 10:37:00'),
(3, 'user', 'web', '2023-11-07 10:37:00', '2023-11-07 10:37:00'),
(4, 'Sales', 'web', '2023-12-25 13:37:04', '2023-12-25 13:37:04'),
(5, 'Accountant', 'web', '2023-12-25 13:37:35', '2023-12-25 13:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `platform_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `brand_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `country_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `vendor_invoice_number` varchar(255) NOT NULL DEFAULT '',
  `vendor_confirmation` varchar(255) NOT NULL DEFAULT '',
  `market_place_po` varchar(255) NOT NULL DEFAULT '',
  `shipping_date` date DEFAULT NULL,
  `our_order_id` varchar(255) NOT NULL DEFAULT '',
  `order_date` date DEFAULT NULL,
  `product_model` varchar(255) NOT NULL DEFAULT '',
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `customer_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(255) NOT NULL DEFAULT '',
  `zip_code` varchar(255) NOT NULL DEFAULT '',
  `state` varchar(255) DEFAULT NULL,
  `unit_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `special_shipping_cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `platform_tax` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount_percent` decimal(5,2) NOT NULL DEFAULT 0.00,
  `discount_type` varchar(255) DEFAULT NULL,
  `discount_value` decimal(10,2) DEFAULT NULL,
  `total_net_received` decimal(10,2) NOT NULL DEFAULT 0.00,
  `platform_fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `shipping_cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `additional_shipping` decimal(10,2) NOT NULL DEFAULT 0.00,
  `manufacturer_tax` decimal(10,2) NOT NULL DEFAULT 0.00,
  `other_cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `product_cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `gross_profit` decimal(10,2) NOT NULL DEFAULT 0.00,
  `gross_profit_percentage` decimal(10,6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `due_date_shipping` date DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tax_exempt` tinyint(1) NOT NULL DEFAULT 0,
  `ramo_trading_order_id` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `billing_first_name` varchar(255) DEFAULT NULL,
  `billing_last_name` varchar(255) DEFAULT NULL,
  `billing_company_name` varchar(255) DEFAULT NULL,
  `billing_address` varchar(255) DEFAULT NULL,
  `billing_city` varchar(255) DEFAULT NULL,
  `billing_zip_code` varchar(255) DEFAULT NULL,
  `billing_state` varchar(255) DEFAULT NULL,
  `billing_country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `tracking_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `platform_id`, `brand_id`, `country_id`, `vendor_invoice_number`, `vendor_confirmation`, `market_place_po`, `shipping_date`, `our_order_id`, `order_date`, `product_model`, `product_name`, `quantity`, `customer_address`, `city`, `zip_code`, `state`, `unit_price`, `special_shipping_cost`, `platform_tax`, `discount_percent`, `discount_type`, `discount_value`, `total_net_received`, `platform_fee`, `shipping_cost`, `additional_shipping`, `manufacturer_tax`, `other_cost`, `product_cost`, `gross_profit`, `gross_profit_percentage`, `created_at`, `updated_at`, `due_date_shipping`, `status_id`, `tax_exempt`, `ramo_trading_order_id`, `first_name`, `last_name`, `company_name`, `billing_first_name`, `billing_last_name`, `billing_company_name`, `billing_address`, `billing_city`, `billing_zip_code`, `billing_state`, `billing_country_id`, `note`, `tracking_number`) VALUES
(10, 9, 1, 230, '900734402', '900734402', '2591', '2023-12-05', '2485', '2023-12-14', '30314893', 'Ohaus 30314893 Adapter, 1x15ml D17mm RB, 2/pk', 1, '2241 South Linden Road suite D', 'Flint', '48532', 'MI', 1561.77, 0.00, 132.43, 5.00, 'Percent', 78.09, 1483.68, 46.25, 19.92, 0.00, 0.00, 0.00, 1115.55, 301.96, 20.350000, '2023-12-28 07:43:13', '2023-12-28 07:43:13', '2023-12-29', 1, 1, '1234', 'Sudeep Upadhye onyx clinical research', 'clinical research', 'source code', 'Sudeep Upadhye onyx clinical research', 'clinical research', 'source code', '2241 South Linden Road suite D', 'Flint', '48532', 'MI', 230, 'no thing', NULL),
(11, 4, 1, 1, '90073', '203627', '2591', '2023-12-11', '2485', '2023-12-08', '30314893', 'Ohaus 30314893 Adapter, 1x15ml D17mm RB, 2/pk', 1, '2241 South Linden Road suite D', 'Flint', '48532', 'MI', 1561.77, 0.00, 132.43, 5.00, 'Fixed', 5.00, 1556.77, 46.25, 19.92, 0.00, 0.00, 0.00, 1115.55, 375.05, 24.090000, '2023-12-28 10:50:58', '2023-12-28 11:24:38', '2023-12-30', 1, 1, '1234', 'Sudeep Upadhye onyx clinical research', 'clinical research', 'source code', 'Tango', 'ChenPOcc', NULL, 'syria', 'damascus', '48532', 'MI', 17, 'abeer', '[{\"carrier\":\"1234\",\"trackingNumber\":\"56789\"}]'),
(12, 1, 1, 1, '900', '900734402', '2591', NULL, '2485', NULL, '30314893', 'Ohaus 30314893 Adapter, 1x15ml D17mm RB, 2/pk', 1, '2241 South Linden Road suite D', 'Flint', '48532', 'MI', 1561.77, 0.00, 132.43, 5.00, 'Fixed', 5.00, 1556.77, 46.25, 19.92, 0.00, 0.00, 0.00, 1115.55, 375.05, 24.090000, '2023-12-28 10:51:55', '2023-12-28 11:25:28', NULL, 1, 0, '1234', 'Sudeep Upadhye onyx clinical research', 'clinical research', 'source code', 'Tango', 'ChenPOcc', NULL, 'syria', 'damascus', '48532', 'MI', 1, NULL, '[{\"carrier\":\"1111\",\"trackingNumber\":\"22222\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `sales_files`
--

CREATE TABLE `sales_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salesFileType_id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `uploadFiles` varchar(255) NOT NULL,
  `file_location` varchar(255) DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_file_types`
--

CREATE TABLE `sales_file_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_file_types`
--

INSERT INTO `sales_file_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'test', '2023-11-15 12:29:14', '2023-11-15 12:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Done', NULL, NULL),
(2, 'Cancel', NULL, NULL),
(3, 'Pending', NULL, NULL),
(4, 'Paid', NULL, NULL),
(5, 'Return', NULL, NULL),
(6, 'Refund', NULL, NULL),
(7, 'Partial-Cancel', NULL, NULL),
(8, 'Partial-Return', NULL, NULL),
(9, 'Partial-Refund', NULL, NULL);

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

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '2023-11-07 10:37:00', '$2y$10$5dtMj/sxqap0Id16kqhtJ.Yz88CEvSTAqbiKTnW71L2ThTu4cn2im', NULL, '2023-11-07 10:37:00', '2023-11-07 10:37:00'),
(2, 'Abeer Alhamwia', 'test@gmail.com', NULL, '$2y$10$5dtMj/sxqap0Id16kqhtJ.Yz88CEvSTAqbiKTnW71L2ThTu4cn2im', NULL, '2023-11-08 10:24:19', '2023-11-08 11:02:29'),
(3, 'sales', 'sale@gmail.com', NULL, '$2y$10$ZcBWcLg0BFKE/nWLifAwEOgvNmVm1CfZflVNCOgvAxPVrbCd/kpti', NULL, '2023-12-25 14:18:40', '2023-12-25 14:18:40'),
(4, 'test', 'test1@gmail.com', NULL, '$2y$10$tB//8wMn3fbo/fnUN4CuaeoaBeZvahY6qPLIgL/EvDuLP9ecBNQzm', NULL, '2023-12-25 14:48:01', '2023-12-25 14:48:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_expenses_type_id_foreign` (`expenses_type_id`);

--
-- Indexes for table `expenses_types`
--
ALTER TABLE `expenses_types`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `platforms`
--
ALTER TABLE `platforms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_products`
--
ALTER TABLE `purchase_order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_order_products_purchase_order_id_foreign` (`purchase_order_id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_products`
--
ALTER TABLE `quotation_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotation_products_quotation_id_foreign` (`quotation_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_status_id_foreign` (`status_id`);

--
-- Indexes for table `sales_files`
--
ALTER TABLE `sales_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_files_salesfiletype_id_foreign` (`salesFileType_id`),
  ADD KEY `sales_files_sale_id_foreign` (`sale_id`);

--
-- Indexes for table `sales_file_types`
--
ALTER TABLE `sales_file_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `expenses_types`
--
ALTER TABLE `expenses_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `platforms`
--
ALTER TABLE `platforms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `purchase_order_products`
--
ALTER TABLE `purchase_order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `quotation_products`
--
ALTER TABLE `quotation_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sales_files`
--
ALTER TABLE `sales_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales_file_types`
--
ALTER TABLE `sales_file_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_expenses_type_id_foreign` FOREIGN KEY (`expenses_type_id`) REFERENCES `expenses_types` (`id`);

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
-- Constraints for table `purchase_order_products`
--
ALTER TABLE `purchase_order_products`
  ADD CONSTRAINT `purchase_order_products_purchase_order_id_foreign` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quotation_products`
--
ALTER TABLE `quotation_products`
  ADD CONSTRAINT `quotation_products_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);

--
-- Constraints for table `sales_files`
--
ALTER TABLE `sales_files`
  ADD CONSTRAINT `sales_files_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`),
  ADD CONSTRAINT `sales_files_salesfiletype_id_foreign` FOREIGN KEY (`salesFileType_id`) REFERENCES `sales_file_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
