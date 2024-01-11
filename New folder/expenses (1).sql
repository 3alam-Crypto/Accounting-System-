-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 01:28 PM
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
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL DEFAULT 0,
  `expenses_type_id` bigint(20) UNSIGNED NOT NULL,
  `installment_amount` decimal(8,2) DEFAULT NULL,
  `installment_count` int(11) DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `due_date` int(11) DEFAULT NULL,
  `paid_date` date DEFAULT NULL,
  `charges` decimal(8,2) DEFAULT NULL,
  `period` varchar(255) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expense_date` date DEFAULT NULL,
  `is_installment` tinyint(1) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `vendor_name` varchar(255) DEFAULT NULL,
  `receipt_number` varchar(255) DEFAULT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `project_department` varchar(255) DEFAULT NULL,
  `approval_status` tinyint(4) NOT NULL DEFAULT 0,
  `expense_status` tinyint(4) NOT NULL DEFAULT 0,
  `notes` text DEFAULT NULL,
  `expenses_title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `group_id`, `expenses_type_id`, `installment_amount`, `installment_count`, `amount`, `status`, `due_date`, `paid_date`, `charges`, `period`, `priority`, `created_at`, `updated_at`, `expense_date`, `is_installment`, `description`, `payment_method`, `vendor_name`, `receipt_number`, `employee_name`, `project_department`, `approval_status`, `expense_status`, `notes`, `expenses_title`) VALUES
(51, 0, 3, 50.00, 1, 50.00, 0, 12, NULL, 10.00, 'monthly', 'Medium', '2024-01-11 10:16:26', '2024-01-11 10:20:47', '2024-01-10', 1, NULL, 'credit_card', 'test', '123', 'abeer', 'sales', 1, 0, NULL, 'product');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_expenses_type_id_foreign` (`expenses_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_expenses_type_id_foreign` FOREIGN KEY (`expenses_type_id`) REFERENCES `expenses_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
