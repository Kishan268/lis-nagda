-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 24, 2020 at 07:32 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lis_nagda`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_calendars`
--

CREATE TABLE `academic_calendars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_upto` date DEFAULT NULL,
  `is_holiday` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `is_exam` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `class_ids` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_calendars`
--

INSERT INTO `academic_calendars` (`id`, `user_id`, `title`, `date_from`, `date_upto`, `is_holiday`, `is_exam`, `class_ids`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', 'kishan', '2020-10-02', '2021-03-11', '1', '1', NULL, '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admission_inquiry_forms`
--

CREATE TABLE `admission_inquiry_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `your_name` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `your_email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_name` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_age` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_class` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admission_inquiry_forms`
--

INSERT INTO `admission_inquiry_forms` (`id`, `your_name`, `your_email`, `child_name`, `child_age`, `child_class`, `mobile_no`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'sdf', 'kisshan@gmail.com', 'dsfdf', '32', '4', '8770510126', '1', NULL, '2020-10-22 04:37:34', '2020-10-22 04:37:34'),
(2, 'sdf', 'kisshan@gmail.com', 'dsfdf', '32', '4', '8770510126', '1', NULL, '2020-10-22 05:02:42', '2020-10-22 05:02:42'),
(3, 'sdf', 'kisshan@gmail.com', 'dsfdf', '43', '345', '8770510126', '1', NULL, '2020-10-22 05:03:37', '2020-10-22 05:03:37');

-- --------------------------------------------------------

--
-- Table structure for table `assign_student_to_sections`
--

CREATE TABLE `assign_student_to_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assign_students_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `un_assign_students_id` int(11) DEFAULT NULL,
  `course_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_student_to_sections`
--

INSERT INTO `assign_student_to_sections` (`id`, `user_id`, `assign_students_id`, `un_assign_students_id`, `course_id`, `batch_id`, `section_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', '13', NULL, '2', '7', '2', '1', NULL, '2020-10-01 05:40:29', '2020-10-01 05:40:29'),
(7, '1', '14', NULL, '2', '8', '3', '1', NULL, '2020-10-01 05:54:31', '2020-10-01 05:54:31'),
(8, '1', '18', NULL, '1', '1', '1', '1', NULL, '2020-10-15 05:23:10', '2020-10-15 05:23:10'),
(9, '1', '19', NULL, '1', '1', '1', '1', NULL, '2020-10-15 05:23:10', '2020-10-15 05:23:10'),
(10, '1', '20', NULL, '1', '1', '1', '1', NULL, '2020-10-15 05:23:11', '2020-10-15 05:23:11'),
(11, '1', '30', NULL, '1', '1', '1', '1', NULL, '2020-10-15 05:23:11', '2020-10-15 05:23:11'),
(12, '1', '31', NULL, '1', '1', '1', '1', NULL, '2020-10-15 05:23:11', '2020-10-15 05:23:11'),
(13, '1', '32', NULL, '1', '1', '1', '1', NULL, '2020-10-15 05:23:11', '2020-10-15 05:23:11'),
(14, '1', '33', NULL, '1', '1', '1', '1', NULL, '2020-10-15 05:23:11', '2020-10-15 05:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `std_class_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mendatory_subject_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `optional_subject_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `user_id`, `std_class_id`, `batch_id`, `section_id`, `mendatory_subject_id`, `optional_subject_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '8', '1', '[4,5]', 'NULL', '1', NULL, '2020-09-29 07:15:32', '2020-11-12 01:00:21'),
(6, '1', '1', '1', '3', '[\"3\",\"4\"]', 'NULL', '1', NULL, '2020-11-11 07:07:15', '2020-11-19 04:42:46'),
(7, '1', '3', '7', '1', '[3,5]', 'NULL', '1', NULL, '2020-11-11 07:58:34', '2020-11-11 23:23:34'),
(8, '1', '4', '7', '2', '[\"3\",\"4\"]', 'NULL', '1', NULL, '2020-11-12 01:20:41', '2020-11-12 01:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subject_group_students`
--

CREATE TABLE `assign_subject_group_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_group_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_group_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_subject_group_students`
--

INSERT INTO `assign_subject_group_students` (`id`, `user_id`, `s_id`, `subject_group_id`, `subject_group_name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(12, '1', '13', '1', 'LKG-2018-2020-C', '1', NULL, '2020-09-30 04:10:59', '2020-11-11 00:45:03'),
(16, '1', '14', '1', 'LKG-2018-2020-C', '1', NULL, '2020-09-30 04:17:54', '2020-10-01 06:38:34'),
(17, '1', '15', '1', 'LKG-2018-2020-C', '1', NULL, '2020-10-12 05:27:52', '2020-11-11 00:45:03'),
(18, '1', '18', '3', 'Nursery-2020-2022-A', '1', NULL, '2020-10-15 05:22:03', '2020-10-15 05:22:03'),
(19, '1', '19', '3', 'Nursery-2020-2022-A', '1', NULL, '2020-10-15 05:22:03', '2020-10-15 05:22:03'),
(20, '1', '20', '3', 'Nursery-2020-2022-A', '1', NULL, '2020-10-15 05:22:03', '2020-10-15 05:22:03'),
(21, '1', '30', '3', 'Nursery-2020-2022-A', '1', NULL, '2020-10-15 05:22:03', '2020-10-15 05:22:03'),
(22, '1', '31', '3', 'Nursery-2020-2022-A', '1', NULL, '2020-10-15 05:22:03', '2020-10-15 05:22:03'),
(23, '1', '32', '3', 'Nursery-2020-2022-A', '1', NULL, '2020-10-15 05:22:03', '2020-10-15 05:22:03'),
(24, '1', '33', '3', 'Nursery-2020-2022-A', '1', NULL, '2020-10-15 05:22:03', '2020-10-15 05:22:03');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subject_id_to_classes`
--

CREATE TABLE `assign_subject_id_to_classes` (
  `assign_subject_to_classes_id` int(11) DEFAULT NULL,
  `mendatory_subject_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `optional_subject_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_subject_id_to_classes`
--

INSERT INTO `assign_subject_id_to_classes` (`assign_subject_to_classes_id`, `mendatory_subject_id`, `optional_subject_id`, `created_at`, `updated_at`) VALUES
(1, '3', NULL, '2020-11-21 07:30:58', '2020-11-21 07:30:58'),
(1, '4', NULL, '2020-11-21 07:30:58', '2020-11-21 07:30:58'),
(1, '5', NULL, '2020-11-21 07:30:58', '2020-11-21 07:30:58'),
(2, '4', NULL, '2020-11-21 07:31:23', '2020-11-21 07:31:23'),
(3, '4', NULL, '2020-11-21 07:31:34', '2020-11-21 07:31:34'),
(3, '5', NULL, '2020-11-21 07:31:34', '2020-11-21 07:31:34'),
(4, '5', NULL, '2020-11-21 07:31:48', '2020-11-21 07:31:48'),
(5, '3', NULL, '2020-11-21 07:32:25', '2020-11-21 07:32:25'),
(5, '4', NULL, '2020-11-21 07:32:25', '2020-11-21 07:32:25'),
(5, '5', NULL, '2020-11-21 07:32:25', '2020-11-21 07:32:25'),
(6, '4', NULL, '2020-11-21 07:32:35', '2020-11-21 07:32:35'),
(7, '4', NULL, '2020-11-21 07:32:44', '2020-11-21 07:32:44'),
(7, '5', NULL, '2020-11-21 07:32:45', '2020-11-21 07:32:45'),
(8, '3', NULL, '2020-11-21 07:32:55', '2020-11-21 07:32:55'),
(9, '4', NULL, '2020-11-21 07:33:10', '2020-11-21 07:33:10'),
(9, '5', NULL, '2020-11-21 07:33:10', '2020-11-21 07:33:10'),
(10, '4', NULL, '2020-11-21 07:33:21', '2020-11-21 07:33:21'),
(10, '5', NULL, '2020-11-21 07:33:21', '2020-11-21 07:33:21'),
(11, '3', NULL, '2020-11-21 07:33:35', '2020-11-21 07:33:35'),
(11, '4', NULL, '2020-11-21 07:33:35', '2020-11-21 07:33:35'),
(11, '5', NULL, '2020-11-21 07:33:35', '2020-11-21 07:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subject_to_classes`
--

CREATE TABLE `assign_subject_to_classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `std_class_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_subject_to_classes`
--

INSERT INTO `assign_subject_to_classes` (`id`, `user_id`, `std_class_id`, `batch_id`, `section_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '1', '1', '1', NULL, '2020-11-21 07:30:58', '2020-11-21 07:31:57'),
(2, '1', '2', '1', '1', '1', NULL, '2020-11-21 07:31:23', '2020-11-21 07:31:23'),
(3, '1', '3', '1', '1', '1', NULL, '2020-11-21 07:31:34', '2020-11-21 07:31:34'),
(4, '1', '4', '1', '1', '1', NULL, '2020-11-21 07:31:48', '2020-11-21 07:31:48'),
(5, '1', '5', '1', '1', '1', NULL, '2020-11-21 07:32:24', '2020-11-21 07:32:24'),
(6, '1', '6', '1', '1', '1', NULL, '2020-11-21 07:32:35', '2020-11-21 07:32:35'),
(7, '1', '7', '1', '1', '1', NULL, '2020-11-21 07:32:44', '2020-11-21 07:32:44'),
(8, '1', '8', '1', '1', '1', NULL, '2020-11-21 07:32:55', '2020-11-21 07:32:55'),
(9, '1', '9', '1', '1', '1', NULL, '2020-11-21 07:33:10', '2020-11-21 07:33:10'),
(10, '1', '10', '1', '1', '1', NULL, '2020-11-21 07:33:21', '2020-11-21 07:33:21'),
(11, '1', '11', '1', '1', '1', NULL, '2020-11-21 07:33:35', '2020-11-21 07:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subject_to_teachers`
--

CREATE TABLE `assign_subject_to_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `teacher_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_subject_to_teachers`
--

INSERT INTO `assign_subject_to_teachers` (`id`, `user_id`, `class_id`, `section_id`, `batch_id`, `teacher_id`, `subject_id`, `status`, `created_at`, `updated_at`) VALUES
(92, '1', 1, 1, 1, '21', NULL, '1', '2020-10-12 05:15:06', '2020-10-12 05:15:06'),
(93, '1', 1, 1, 1, '21', NULL, '1', '2020-10-12 05:16:54', '2020-10-12 05:16:54'),
(94, '1', 1, 1, 1, '21', NULL, '1', '2020-10-12 05:24:31', '2020-10-12 05:24:31'),
(95, '1', 1, 1, 1, '17', NULL, '1', '2020-10-12 05:24:54', '2020-10-12 05:24:54'),
(96, '1', 1, 1, 1, '21', NULL, '1', '2020-10-12 05:28:36', '2020-10-12 05:28:36'),
(97, '1', 2, 1, 1, '21', NULL, '1', '2020-10-12 05:53:15', '2020-10-12 05:53:15'),
(98, '1', 2, 1, 1, '17', NULL, '1', '2020-10-12 05:53:25', '2020-10-12 05:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `assign_sub_id_to_teachers`
--

CREATE TABLE `assign_sub_id_to_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assign_subject_teacher_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assign_subject_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_sub_id_to_teachers`
--

INSERT INTO `assign_sub_id_to_teachers` (`id`, `assign_subject_teacher_id`, `assign_subject_id`, `status`, `created_at`, `updated_at`) VALUES
(93, '92', '3', '1', '2020-10-12 05:15:06', '2020-10-12 05:15:06'),
(94, '92', '4', '1', '2020-10-12 05:15:06', '2020-10-12 05:15:06'),
(95, '93', '5', '1', '2020-10-12 05:16:54', '2020-10-12 05:16:54'),
(96, '95', '5', '1', '2020-10-12 05:24:54', '2020-10-12 05:24:54'),
(97, '96', '3', '1', '2020-10-12 05:28:36', '2020-10-12 05:28:36'),
(98, '97', '4', '1', '2020-10-12 05:53:15', '2020-10-12 05:53:15'),
(99, '98', '4', '1', '2020-10-12 05:53:25', '2020-10-12 05:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `bank_masts`
--

CREATE TABLE `bank_masts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shrt_desc` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cast_categories`
--

CREATE TABLE `cast_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `caste_category_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cast_categories`
--

INSERT INTO `cast_categories` (`id`, `user_id`, `caste_category_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 0, 'test', NULL, '2020-09-21 01:41:42', '2020-09-21 01:41:42'),
(2, 0, 'test1234', NULL, '2020-09-21 01:42:24', '2020-09-21 01:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `cheque_dd_trans`
--

CREATE TABLE `cheque_dd_trans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_fees_pay_id` int(11) DEFAULT NULL,
  `cheque_dd_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_dd_bank` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_dd_no_of` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_dd_status` int(11) DEFAULT NULL,
  `cheque_dd_amount` decimal(9,2) DEFAULT NULL,
  `cheque_dd_date` date DEFAULT NULL,
  `payee_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city_masts`
--

CREATE TABLE `city_masts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `city_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city_masts`
--

INSERT INTO `city_masts` (`id`, `user_id`, `city_name`, `state_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 0, 'indore1', '1', NULL, '2020-09-21 04:00:31', '2020-09-21 04:02:00'),
(2, 0, 'guna', '1', NULL, '2020-09-21 04:04:32', '2020-09-21 04:39:43'),
(3, 0, 'Bhopal', '1', NULL, '2020-09-21 04:05:01', '2020-09-22 03:35:40'),
(4, 0, 'Gwaliar', '1', NULL, '2020-09-21 04:05:37', '2020-09-22 03:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `class_batch_section_group_masts`
--

CREATE TABLE `class_batch_section_group_masts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_batch_section_group_masts`
--

INSERT INTO `class_batch_section_group_masts` (`id`, `user_id`, `class_id`, `section_id`, `batch_id`, `group_name`, `status`, `created_at`, `updated_at`) VALUES
(1, '34', '2', '1', '1', 'LKG-2020-2022-A', '1', '2020-10-15 07:27:56', '2020-10-15 07:27:56');

-- --------------------------------------------------------

--
-- Table structure for table `compose_emails`
--

CREATE TABLE `compose_emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `compose_mail_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attechment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_ids` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_ids` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `compose_emails`
--

INSERT INTO `compose_emails` (`id`, `user_id`, `class_id`, `section_id`, `batch_id`, `subject`, `compose_mail_content`, `attechment`, `sender_type`, `student_ids`, `staff_ids`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, '1', NULL, NULL, NULL, 'dfgfdg', '<p>dfgdfdgdf</p>', 'mailing sytem.odt', 'send_to_all_faculty', NULL, '17,21,45', NULL, '2020-10-17 01:02:08', '2020-10-17 01:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `compose_email_staff_ids`
--

CREATE TABLE `compose_email_staff_ids` (
  `compose_email_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faculty_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compose_email_student_ids`
--

CREATE TABLE `compose_email_student_ids` (
  `compose_email_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `students_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compose_sms`
--

CREATE TABLE `compose_sms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `compose_sms_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_ids` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_ids` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reciver_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `compose_sms`
--

INSERT INTO `compose_sms` (`id`, `user_id`, `class_id`, `section_id`, `batch_id`, `compose_sms_content`, `student_ids`, `staff_ids`, `sender_type`, `reciver_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(48, '1', '1', '1', '1', 'sdf', NULL, NULL, 'send_to_students', '24', NULL, '2020-10-17 07:03:41', '2020-10-17 07:03:41'),
(49, '1', '1', '1', '1', 'sdf', NULL, NULL, 'send_to_students', '25', NULL, '2020-10-17 07:03:41', '2020-10-17 07:03:41'),
(50, '1', '1', '1', '1', 'sdf', NULL, NULL, 'send_to_students', '36', NULL, '2020-10-17 07:03:41', '2020-10-17 07:03:41'),
(51, '1', '1', '1', '1', 'sdf', NULL, NULL, 'send_to_students', '37', NULL, '2020-10-17 07:03:41', '2020-10-17 07:03:41'),
(52, '1', '1', '1', '1', 'sdf', NULL, NULL, 'send_to_students', '38', NULL, '2020-10-17 07:03:41', '2020-10-17 07:03:41'),
(53, '1', NULL, NULL, NULL, 'sdf', NULL, NULL, 'send_to_all_faculty', '17', NULL, '2020-10-17 07:05:42', '2020-10-17 07:05:42'),
(54, '1', NULL, NULL, NULL, 'sdf', NULL, NULL, 'send_to_all_faculty', '21', NULL, '2020-10-17 07:05:42', '2020-10-17 07:05:42'),
(55, '1', NULL, NULL, NULL, 'sdf', NULL, NULL, 'send_to_all_faculty', '45', NULL, '2020-10-17 07:05:42', '2020-10-17 07:05:42'),
(56, '1', NULL, NULL, NULL, 'ttrytry', NULL, NULL, 'send_to_all', NULL, NULL, '2020-10-17 07:14:35', '2020-10-17 07:14:35'),
(57, '1', NULL, NULL, NULL, 'fhgfh', NULL, NULL, 'send_to_all', '1', NULL, '2020-10-17 07:26:26', '2020-10-17 07:26:26'),
(58, '1', NULL, NULL, NULL, 'fhgfh', NULL, NULL, 'send_to_all', '15', NULL, '2020-10-17 07:26:26', '2020-10-17 07:26:26'),
(59, '1', NULL, NULL, NULL, 'fhgfh', NULL, NULL, 'send_to_all', '17', NULL, '2020-10-17 07:26:26', '2020-10-17 07:26:26'),
(60, '1', NULL, NULL, NULL, 'fhgfh', NULL, NULL, 'send_to_all', '18', NULL, '2020-10-17 07:26:26', '2020-10-17 07:26:26'),
(61, '1', NULL, NULL, NULL, 'fhgfh', NULL, NULL, 'send_to_all', '21', NULL, '2020-10-17 07:26:26', '2020-10-17 07:26:26'),
(62, '1', NULL, NULL, NULL, 'fhgfh', NULL, NULL, 'send_to_all', '24', NULL, '2020-10-17 07:26:26', '2020-10-17 07:26:26'),
(63, '1', NULL, NULL, NULL, 'fhgfh', NULL, NULL, 'send_to_all', '25', NULL, '2020-10-17 07:26:27', '2020-10-17 07:26:27'),
(64, '1', NULL, NULL, NULL, 'fhgfh', NULL, NULL, 'send_to_all', '33', NULL, '2020-10-17 07:26:27', '2020-10-17 07:26:27'),
(65, '1', NULL, NULL, NULL, 'fhgfh', NULL, NULL, 'send_to_all', '36', NULL, '2020-10-17 07:26:27', '2020-10-17 07:26:27'),
(66, '1', NULL, NULL, NULL, 'fhgfh', NULL, NULL, 'send_to_all', '37', NULL, '2020-10-17 07:26:27', '2020-10-17 07:26:27'),
(67, '1', NULL, NULL, NULL, 'fhgfh', NULL, NULL, 'send_to_all', '38', NULL, '2020-10-17 07:26:27', '2020-10-17 07:26:27'),
(68, '1', NULL, NULL, NULL, 'fhgfh', NULL, NULL, 'send_to_all', '45', NULL, '2020-10-17 07:26:27', '2020-10-17 07:26:27'),
(69, '1', NULL, NULL, NULL, 'fhgfh', NULL, NULL, 'send_to_all', '46', NULL, '2020-10-17 07:26:27', '2020-10-17 07:26:27'),
(70, '1', '2', '3', '8', 'xgfg', NULL, NULL, 'send_to_students', '17', NULL, '2020-10-17 07:49:49', '2020-10-17 07:49:49'),
(71, '1', '2', '3', '8', 'xgfgdfgdgfdg', NULL, NULL, 'send_to_students', '17', NULL, '2020-10-17 07:52:24', '2020-10-17 07:52:24'),
(72, '1', '2', '3', '8', 'sdfds', NULL, NULL, 'send_to_students', '17', NULL, '2020-10-17 07:52:50', '2020-10-17 07:52:50'),
(73, '1', '2', '3', '8', 'fghfgh', NULL, NULL, 'send_to_students', '17', NULL, '2020-10-17 07:54:37', '2020-10-17 07:54:37'),
(74, '1', '1', '1', '1', 'asdsad', NULL, NULL, 'send_to_students', '24', NULL, '2020-10-17 07:55:19', '2020-10-17 07:55:19'),
(75, '1', '1', '1', '1', 'asdsad', NULL, NULL, 'send_to_students', '25', NULL, '2020-10-17 07:55:19', '2020-10-17 07:55:19'),
(76, '1', '1', '1', '1', 'asdsad', NULL, NULL, 'send_to_students', '36', NULL, '2020-10-17 07:55:19', '2020-10-17 07:55:19'),
(77, '1', '1', '1', '1', 'asdsad', NULL, NULL, 'send_to_students', '37', NULL, '2020-10-17 07:55:19', '2020-10-17 07:55:19'),
(78, '1', '1', '1', '1', 'asdsad', NULL, NULL, 'send_to_students', '38', NULL, '2020-10-17 07:55:19', '2020-10-17 07:55:19'),
(79, '1', '1', '1', '1', 'asdsad', NULL, NULL, 'send_to_students', '24', NULL, '2020-10-17 07:55:19', '2020-10-17 07:55:19'),
(80, '1', '1', '1', '1', 'asdsad', NULL, NULL, 'send_to_students', '25', NULL, '2020-10-17 07:55:19', '2020-10-17 07:55:19'),
(81, '1', '1', '1', '1', 'asdsad', NULL, NULL, 'send_to_students', '36', NULL, '2020-10-17 07:55:19', '2020-10-17 07:55:19'),
(82, '1', '1', '1', '1', 'asdsad', NULL, NULL, 'send_to_students', '37', NULL, '2020-10-17 07:55:19', '2020-10-17 07:55:19'),
(83, '1', '1', '1', '1', 'asdsad', NULL, NULL, 'send_to_students', '38', NULL, '2020-10-17 07:55:19', '2020-10-17 07:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `compose_sms_staff_ids`
--

CREATE TABLE `compose_sms_staff_ids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `compose_sms_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faculty_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compose_sms_staff_id_and_student_ids`
--

CREATE TABLE `compose_sms_staff_id_and_student_ids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `compose_sms_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reciver_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reciver_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `compose_sms_staff_id_and_student_ids`
--

INSERT INTO `compose_sms_staff_id_and_student_ids` (`id`, `compose_sms_id`, `reciver_id`, `reciver_type`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', '18', 'send_to_students', '1', NULL, '2020-10-17 04:23:35', '2020-10-17 04:23:35'),
(2, '1', '19', 'send_to_students', '1', NULL, '2020-10-17 04:23:35', '2020-10-17 04:23:35'),
(3, '1', '20', 'send_to_students', '1', NULL, '2020-10-17 04:23:35', '2020-10-17 04:23:35'),
(4, '1', '30', 'send_to_students', '1', NULL, '2020-10-17 04:23:35', '2020-10-17 04:23:35'),
(5, '1', '31', 'send_to_students', '1', NULL, '2020-10-17 04:23:35', '2020-10-17 04:23:35'),
(6, '1', '32', 'send_to_students', '1', NULL, '2020-10-17 04:23:35', '2020-10-17 04:23:35'),
(7, '1', '33', 'send_to_students', '1', NULL, '2020-10-17 04:23:35', '2020-10-17 04:23:35'),
(8, '2', '17', 'send_to_all_faculty', '1', NULL, '2020-10-17 04:24:16', '2020-10-17 04:24:16'),
(9, '2', '21', 'send_to_all_faculty', '1', NULL, '2020-10-17 04:24:16', '2020-10-17 04:24:16'),
(10, '2', '45', 'send_to_all_faculty', '1', NULL, '2020-10-17 04:24:17', '2020-10-17 04:24:17');

-- --------------------------------------------------------

--
-- Table structure for table `compose_sms_student_ids`
--

CREATE TABLE `compose_sms_student_ids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `compose_sms_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `concession_apply_trans`
--

CREATE TABLE `concession_apply_trans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `fees_head_mast_id` int(11) DEFAULT NULL,
  `conssession_id` int(11) DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `concession_masts`
--

CREATE TABLE `concession_masts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_type` int(11) DEFAULT NULL,
  `amount` decimal(9,2) DEFAULT NULL,
  `desc` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `concession_student_trans`
--

CREATE TABLE `concession_student_trans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `s_id` int(11) DEFAULT NULL,
  `consession_apply_id` int(11) DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_froms`
--

CREATE TABLE `contact_us_froms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us_froms`
--

INSERT INTO `contact_us_froms` (`id`, `name`, `email`, `message`, `status`, `created_at`, `updated_at`) VALUES
(11, 'test', 'kishan@laxyo.in', 'dfg', '1', '2020-10-13 04:07:41', '2020-10-13 04:07:41'),
(12, 'test', 'kishan@laxyo.in', 'asd', '1', '2020-10-13 04:08:42', '2020-10-13 04:08:42'),
(13, 'test', 'kishan@laxyo.in', 'dsfds', '1', '2020-10-13 04:09:18', '2020-10-13 04:09:18'),
(14, 'test', 'kishan@laxyo.in', 'sadf', '1', '2020-10-13 04:10:14', '2020-10-13 04:10:14'),
(15, 'progressbar', 'kishan@laxyo.in', 'sdf', '1', '2020-10-13 04:11:24', '2020-10-13 04:11:24'),
(16, 'progressbar', 'kishan@laxyo.in', 'sdf', '1', '2020-10-13 04:11:36', '2020-10-13 04:11:36'),
(17, 'test', 'lawschools@gmail.com', 'dfg', '1', '2020-10-13 04:14:24', '2020-10-13 04:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `country_masts`
--

CREATE TABLE `country_masts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `country_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country_masts`
--

INSERT INTO `country_masts` (`id`, `user_id`, `country_name`, `country_code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 0, 'India1', '91', NULL, '2020-09-21 03:21:24', '2020-09-21 04:34:23'),
(2, 0, 'pakistan', '92', NULL, '2020-09-21 04:34:16', '2020-09-21 04:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `exam_time_table`
--

CREATE TABLE `exam_time_table` (
  `time_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exam_time_table`
--

INSERT INTO `exam_time_table` (`time_id`, `class_id`, `subject_id`, `date`) VALUES
(1, 1, 3, '2020-11-24'),
(1, 1, 4, '2020-11-25'),
(1, 2, 4, '2020-11-24'),
(1, 2, 4, '2020-11-25'),
(2, 1, 3, '2020-11-03'),
(2, 1, 4, '2020-11-18'),
(2, 1, NULL, '2020-11-24'),
(2, 2, NULL, '2020-11-03'),
(2, 2, 4, '2020-11-18'),
(2, 2, 4, '2020-11-24'),
(2, 3, 5, '2020-11-03'),
(2, 3, NULL, '2020-11-18'),
(2, 3, 5, '2020-11-24');

-- --------------------------------------------------------

--
-- Table structure for table `exam_time_table_mast`
--

CREATE TABLE `exam_time_table_mast` (
  `time_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `exam_time` varchar(15) DEFAULT NULL,
  `reciept_head_id` int(2) DEFAULT NULL,
  `reporting_time` varchar(22) DEFAULT NULL,
  `deprature_time` varchar(22) DEFAULT NULL,
  `class_from` int(11) DEFAULT NULL,
  `class_to` int(11) DEFAULT NULL,
  `start_dt` date DEFAULT NULL,
  `end_dt` date DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `status` varchar(1) DEFAULT 'A',
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exam_time_table_mast`
--

INSERT INTO `exam_time_table_mast` (`time_id`, `name`, `exam_time`, `reciept_head_id`, `reporting_time`, `deprature_time`, `class_from`, `class_to`, `start_dt`, `end_dt`, `batch_id`, `status`, `remark`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test', '12:30 AM', NULL, '12:00 AM', NULL, 1, 2, '2020-11-19', '2020-11-24', NULL, 'A', 'sds', '2020-11-23 06:18:10', '2020-11-23 06:18:10', NULL),
(2, 'test2', '01:30 AM', NULL, '12:00 AM', NULL, 1, 3, '2020-11-26', '2020-11-25', NULL, 'A', 'dfgfd', '2020-11-23 06:20:56', '2020-11-23 06:20:56', NULL);

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
-- Table structure for table `fees_head_masts`
--

CREATE TABLE `fees_head_masts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(9,2) DEFAULT NULL,
  `head_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `head_sq_no` int(11) DEFAULT NULL,
  `refundable_status` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instalment_applicable_status` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees_head_masts`
--

INSERT INTO `fees_head_masts` (`id`, `name`, `amount`, `head_type`, `head_sq_no`, `refundable_status`, `instalment_applicable_status`, `type`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(17, 'Science fee', '3243.00', 'Permanent', 1, NULL, 'on', 'during_admission', '1', NULL, '2020-11-07 03:27:06', '2020-11-07 05:02:40'),
(18, 'Examination fees', '435.00', 'Permanent', 4, 'refundable', NULL, 'General', '1', NULL, '2020-11-07 04:02:13', '2020-11-07 05:02:06'),
(19, 'Tuition fee', '34535.00', 'Temporary', 1, 'Refundable', NULL, 'General', '1', NULL, '2020-11-07 04:11:46', '2020-11-07 05:04:00'),
(20, 'Activity fee', '435.00', 'Permanent', 1, NULL, NULL, 'General', '1', NULL, '2020-11-07 04:56:48', '2020-11-07 05:02:16'),
(21, 'Tuition Fees', '32.00', 'Permanent', 1, NULL, NULL, 'General', '1', NULL, '2020-11-07 05:03:09', '2020-11-07 05:03:09'),
(22, 'test', '33.00', 'Permanent', 1, NULL, NULL, 'General', '1', NULL, '2020-11-08 23:49:06', '2020-11-08 23:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `fees_head_trans`
--

CREATE TABLE `fees_head_trans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fees_head_mast_id` int(11) DEFAULT NULL,
  `fees_head_id` int(11) DEFAULT NULL,
  `amount` decimal(9,2) DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees_head_trans`
--

INSERT INTO `fees_head_trans` (`id`, `fees_head_mast_id`, `fees_head_id`, `amount`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(22, 35, 17, '3243.00', '1', NULL, '2020-11-10 04:02:16', '2020-11-10 04:02:16'),
(23, 35, 18, '435.00', '1', NULL, '2020-11-10 04:02:17', '2020-11-10 04:02:17'),
(24, 35, 19, '34535.00', '1', NULL, '2020-11-10 04:02:17', '2020-11-10 04:02:17'),
(25, 35, 20, '435.00', '1', NULL, '2020-11-10 04:02:17', '2020-11-10 04:02:17'),
(26, 35, 21, '32.00', '1', NULL, '2020-11-10 04:02:17', '2020-11-10 04:02:17'),
(27, 35, 22, '33.00', '1', NULL, '2020-11-10 04:02:17', '2020-11-10 04:02:17'),
(28, 36, 17, '3243.00', '1', NULL, '2020-11-10 04:03:22', '2020-11-10 04:03:22'),
(29, 36, 18, '435.00', '1', NULL, '2020-11-10 04:03:22', '2020-11-10 04:03:22'),
(30, 36, 19, '34535.00', '1', NULL, '2020-11-10 04:03:22', '2020-11-10 04:03:22'),
(31, 36, 20, '435.00', '1', NULL, '2020-11-10 04:03:22', '2020-11-10 04:03:22'),
(32, 36, 21, '32.00', '1', NULL, '2020-11-10 04:03:22', '2020-11-10 04:03:22'),
(33, 36, 22, '33.00', '1', NULL, '2020-11-10 04:03:22', '2020-11-10 04:03:22'),
(34, 37, 17, '3243.00', '1', NULL, '2020-11-10 04:07:11', '2020-11-10 04:07:11'),
(35, 37, 18, '435.00', '1', NULL, '2020-11-10 04:07:11', '2020-11-10 04:07:11'),
(36, 37, 19, '34535.00', '1', NULL, '2020-11-10 04:07:11', '2020-11-10 04:07:11'),
(37, 37, 20, '435.00', '1', NULL, '2020-11-10 04:07:11', '2020-11-10 04:07:11'),
(38, 37, 21, '32.00', '1', NULL, '2020-11-10 04:07:11', '2020-11-10 04:07:11'),
(39, 37, 22, '33.00', '1', NULL, '2020-11-10 04:07:11', '2020-11-10 04:07:11'),
(40, 38, 17, '3243.00', '1', NULL, '2020-11-10 04:14:50', '2020-11-10 04:14:50'),
(41, 38, 18, '435.00', '1', NULL, '2020-11-10 04:14:50', '2020-11-10 04:14:50'),
(42, 38, 19, '34535.00', '1', NULL, '2020-11-10 04:14:51', '2020-11-10 04:14:51'),
(43, 38, 20, '435.00', '1', NULL, '2020-11-10 04:14:51', '2020-11-10 04:14:51'),
(44, 38, 21, '32.00', '1', NULL, '2020-11-10 04:14:51', '2020-11-10 04:14:51'),
(45, 38, 22, '33.00', '1', NULL, '2020-11-10 04:14:51', '2020-11-10 04:14:51'),
(46, 39, 17, '3243.00', '1', NULL, '2020-11-10 04:21:11', '2020-11-10 04:21:11'),
(47, 39, 18, '435.00', '1', NULL, '2020-11-10 04:21:11', '2020-11-10 04:21:11'),
(48, 39, 19, '34535.00', '1', NULL, '2020-11-10 04:21:11', '2020-11-10 04:21:11'),
(49, 39, 20, '435.00', '1', NULL, '2020-11-10 04:21:11', '2020-11-10 04:21:11'),
(50, 39, 21, '32.00', '1', NULL, '2020-11-10 04:21:11', '2020-11-10 04:21:11'),
(51, 39, 22, '33.00', '1', NULL, '2020-11-10 04:21:11', '2020-11-10 04:21:11'),
(52, 40, 17, '3243.00', '1', NULL, '2020-11-10 04:23:33', '2020-11-10 04:23:33'),
(53, 40, 18, '435.00', '1', NULL, '2020-11-10 04:23:33', '2020-11-10 04:23:33'),
(54, 40, 19, '34535.00', '1', NULL, '2020-11-10 04:23:33', '2020-11-10 04:23:33'),
(55, 40, 20, '435.00', '1', NULL, '2020-11-10 04:23:34', '2020-11-10 04:23:34'),
(56, 40, 21, '32.00', '1', NULL, '2020-11-10 04:23:34', '2020-11-10 04:23:34'),
(57, 40, 22, '33.00', '1', NULL, '2020-11-10 04:23:34', '2020-11-10 04:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `fees_instalment_masts`
--

CREATE TABLE `fees_instalment_masts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `st_date1` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ed_date1` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instalment_amount1` decimal(9,2) DEFAULT NULL,
  `st_date2` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ed_date2` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instalment_amount2` decimal(9,2) DEFAULT NULL,
  `st_date3` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ed_date3` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instalment_amount3` decimal(9,2) DEFAULT NULL,
  `st_date4` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ed_date4` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instalment_amount4` decimal(9,2) DEFAULT NULL,
  `st_date5` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ed_date5` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instalment_amount5` decimal(9,2) DEFAULT NULL,
  `st_date6` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ed_date6` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instalment_amount6` decimal(9,2) DEFAULT NULL,
  `st_date7` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ed_date7` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instalment_amount7` decimal(9,2) DEFAULT NULL,
  `st_date8` date DEFAULT NULL,
  `ed_date8` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instalment_amount8` decimal(9,2) DEFAULT NULL,
  `st_date9` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ed_date9` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instalment_amount9` decimal(9,2) DEFAULT NULL,
  `st_date10` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ed_date10` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instalment_amount10` decimal(9,2) DEFAULT NULL,
  `st_date11` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ed_date11` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instalment_amount11` decimal(9,2) DEFAULT NULL,
  `st_date12` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ed_date12` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instalment_amount12` decimal(9,2) DEFAULT NULL,
  `fees_mast_id` int(11) DEFAULT NULL,
  `installment_mode` int(11) DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees_instalment_masts`
--

INSERT INTO `fees_instalment_masts` (`id`, `st_date1`, `ed_date1`, `instalment_amount1`, `st_date2`, `ed_date2`, `instalment_amount2`, `st_date3`, `ed_date3`, `instalment_amount3`, `st_date4`, `ed_date4`, `instalment_amount4`, `st_date5`, `ed_date5`, `instalment_amount5`, `st_date6`, `ed_date6`, `instalment_amount6`, `st_date7`, `ed_date7`, `instalment_amount7`, `st_date8`, `ed_date8`, `instalment_amount8`, `st_date9`, `ed_date9`, `instalment_amount9`, `st_date10`, `ed_date10`, `instalment_amount10`, `st_date11`, `ed_date11`, `instalment_amount11`, `st_date12`, `ed_date12`, `instalment_amount12`, `fees_mast_id`, `installment_mode`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, '03-11-2020', '18-11-2020', '12904.33', NULL, NULL, NULL, '26-11-2020', '24-11-2020', '12904.33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '1', NULL, '2020-11-10 03:59:23', '2020-11-10 03:59:23'),
(8, '03-11-2020', '18-11-2020', '12904.33', NULL, NULL, NULL, '26-11-2020', '24-11-2020', '12904.33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '1', NULL, '2020-11-10 04:02:16', '2020-11-10 04:02:16'),
(9, '03-11-2020', '18-11-2020', '12904.33', NULL, NULL, NULL, '26-11-2020', '24-11-2020', '12904.33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '1', NULL, '2020-11-10 04:03:22', '2020-11-10 04:03:22'),
(10, '03-11-2020', NULL, '19356.50', '12-11-2020', '17-11-2020', '19356.50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '1', NULL, '2020-11-10 04:07:11', '2020-11-10 04:07:11'),
(11, '03-11-2020', NULL, '19356.50', '12-11-2020', '17-11-2020', '19356.50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '1', NULL, '2020-11-10 04:14:50', '2020-11-10 04:14:50'),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1', NULL, '2020-11-10 04:21:11', '2020-11-10 04:21:11'),
(13, NULL, NULL, '12904.33', NULL, NULL, '19356.50', NULL, NULL, '12904.33', NULL, NULL, '9678.25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '1', NULL, '2020-11-10 04:23:33', '2020-11-10 04:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `fees_masts`
--

CREATE TABLE `fees_masts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fees_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fees_amt` decimal(9,2) DEFAULT NULL,
  `receipt_head_id` int(11) DEFAULT NULL,
  `currency_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_instalment` int(11) DEFAULT NULL,
  `courseselection` int(11) DEFAULT NULL,
  `discount` decimal(9,2) DEFAULT NULL,
  `refundable` tinyint(1) DEFAULT NULL,
  `due_fees` decimal(9,2) DEFAULT NULL,
  `gender` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cast_category` int(11) DEFAULT NULL,
  `rte_status` int(11) DEFAULT NULL,
  `feesfor` int(11) DEFAULT NULL,
  `course_batches` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `header_name_to_be_display_reci` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_fees_student_assign` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees_masts`
--

INSERT INTO `fees_masts` (`id`, `fees_name`, `fees_amt`, `receipt_head_id`, `currency_code`, `no_of_instalment`, `courseselection`, `discount`, `refundable`, `due_fees`, `gender`, `cast_category`, `rte_status`, `feesfor`, `course_batches`, `status`, `deleted_at`, `created_at`, `updated_at`, `header_name_to_be_display_reci`, `is_fees_student_assign`) VALUES
(35, 'Class_I to II (English medium)_19-20_instl_July', '38713.00', NULL, 'INR', 3, 1, '100.00', 1, NULL, '1', 1, 1, 0, '[\"2_8_3\",\"3_7_2\",\"2_8_3\",\"1_1_1\"]', '1', NULL, '2020-11-10 04:02:16', '2020-11-10 04:02:16', 'Jath Public Hr. Sec. School, Ratlam', 1),
(36, 'Class_I to II (English medium)_19-20_instl_July', '38713.00', NULL, 'INR', 3, 2, '100.00', 1, NULL, '0', 1, NULL, 2, '[\"2_8_3\",\"3_7_2\",\"2_8_3\",\"1_1_1\"]', '1', NULL, '2020-11-10 04:03:21', '2020-11-10 04:03:21', 'Jath Public Hr. Sec. School, Ratlam', 1),
(37, 'Class_I to II (English medium)_19-20_instl_June', '38713.00', NULL, 'INR', 2, 1, '33235.00', NULL, NULL, '1', 2, 1, 0, '[\"2_8_3\",\"3_7_2\",\"2_8_3\"]', '1', NULL, '2020-11-10 04:07:10', '2020-11-10 04:07:10', 'Jath Public Hr. Sec. School, Ratlam', 1),
(38, 'Class_I to II (English medium)_19-20_instl_June', '38713.00', NULL, 'INR', 2, 1, '33235.00', NULL, NULL, '1', 2, 1, 0, '[\"2_8_3\",\"3_7_2\",\"2_8_3\"]', '1', NULL, '2020-11-10 04:14:50', '2020-11-10 04:14:50', 'Jath Public Hr. Sec. School, Ratlam', 1),
(39, 'Class_I to II (English medium)_19-20_instl_September', '38713.00', NULL, 'INR', 1, 2, '234.00', NULL, NULL, '0', 0, NULL, 2, '\"2_8_3\"', '1', NULL, '2020-11-10 04:21:10', '2020-11-10 04:21:10', 'Jath Public Hr. Sec. School, Ratlam', 1),
(40, 'Class_III to V (English medium)_19-20_instl_July', '38713.00', NULL, 'INR', 3, 2, '324.00', 1, NULL, '0', 0, NULL, 2, '\"2_8_3\"', '1', NULL, '2020-11-10 04:23:33', '2020-11-10 04:23:33', 'Jath Public Hr. Sec. School, Ratlam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fine_types`
--

CREATE TABLE `fine_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fine_type_id` int(11) DEFAULT NULL,
  `fine_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fine_amount_status` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_days` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fine_amount` decimal(9,2) DEFAULT NULL,
  `fees_head_mast_id` int(11) DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fine_types`
--

INSERT INTO `fine_types` (`id`, `fine_type_id`, `fine_type`, `fine_amount_status`, `no_of_days`, `fine_amount`, `fees_head_mast_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, NULL, 'Fixed', 'Amount', '3', '3.00', 17, '1', NULL, '2020-11-07 03:27:06', '2020-11-07 03:27:06'),
(4, NULL, 'Per Day', 'Percentage', '3', '33.00', 17, '1', NULL, '2020-11-07 03:27:06', '2020-11-07 03:27:06'),
(5, NULL, 'Fixed', 'Amount', '43', '435.00', 18, '1', NULL, '2020-11-07 04:02:13', '2020-11-07 04:02:13'),
(6, NULL, 'Per Day', 'Amount', '04', '4.00', 18, '1', NULL, '2020-11-07 04:02:13', '2020-11-07 04:02:13'),
(7, NULL, 'Fixed', 'Amount', '34', '43.00', 19, '1', NULL, '2020-11-07 04:11:46', '2020-11-07 04:11:46'),
(8, NULL, NULL, NULL, '0', '0.00', 20, '1', NULL, '2020-11-07 04:56:48', '2020-11-07 04:56:48'),
(9, NULL, NULL, NULL, '0', '0.00', 21, '1', NULL, '2020-11-07 05:03:09', '2020-11-07 05:03:09'),
(10, NULL, NULL, NULL, '0', '0.00', 22, '1', NULL, '2020-11-08 23:49:06', '2020-11-08 23:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_folders`
--

CREATE TABLE `gallery_folders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `folder_name` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_folders`
--

INSERT INTO `gallery_folders` (`id`, `user_id`, `folder_name`, `status`, `created_at`, `updated_at`) VALUES
(12, '1', 'test', '1', '2020-10-27 05:16:05', '2020-10-27 05:16:05'),
(13, '1', 'test2', '1', '2020-10-27 05:51:18', '2020-10-27 05:51:18');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `folder_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `folder_id`, `gallery_image`, `status`, `created_at`, `updated_at`) VALUES
(84, '12', 'storage/gallery_zip/folder_name/test/images/yii_logo_dark.png', '1', '2020-10-27 05:48:02', '2020-10-27 05:48:02'),
(85, '12', 'storage/gallery_zip/folder_name/test/images/new-php-logo.svg', '1', '2020-10-27 05:48:02', '2020-10-27 05:48:02'),
(86, '12', 'storage/gallery_zip/folder_name/test/images/oracl-report-logo.png', '1', '2020-10-27 05:48:02', '2020-10-27 05:48:02'),
(87, '12', 'storage/gallery_zip/folder_name/test/images/laravel-logo.png', '1', '2020-10-27 05:48:02', '2020-10-27 05:48:02'),
(88, '12', 'storage/gallery_zip/folder_name/test/images/oracle-database-logo.jpg', '1', '2020-10-27 05:48:02', '2020-10-27 05:48:02'),
(89, '12', 'storage/gallery_zip/folder_name/test/images/oracl-formal.jpeg', '1', '2020-10-27 05:48:02', '2020-10-27 05:48:02'),
(90, '12', 'storage/gallery_zip/folder_name/test/images/E-commerce-Solutions-1-800x315.png', '1', '2020-10-27 05:48:02', '2020-10-27 05:48:02'),
(91, '12', 'storage/gallery_zip/folder_name/test/images/cms-solutions.png', '1', '2020-10-27 05:48:02', '2020-10-27 05:48:02'),
(92, '12', 'storage/gallery_zip/folder_name/test/images/Seamless Data Migrations.jpg', '1', '2020-10-27 05:48:02', '2020-10-27 05:48:02'),
(93, '12', 'storage/gallery_zip/folder_name/test/images/Customize ERP solution.png', '1', '2020-10-27 05:48:02', '2020-10-27 05:48:02'),
(94, '12', 'storage/gallery_zip/folder_name/test/images/E-commerce Website Development Platforms.jpg', '1', '2020-10-27 05:48:03', '2020-10-27 05:48:03'),
(95, '12', 'storage/gallery_zip/folder_name/test/images/Custom CMS Development.png', '1', '2020-10-27 05:48:03', '2020-10-27 05:48:03'),
(96, '12', 'storage/gallery_zip/folder_name/test/images/erp.png', '1', '2020-10-27 05:48:03', '2020-10-27 05:48:03'),
(97, '12', 'storage/gallery_zip/folder_name/test/images/E-Commerce Solution.png', '1', '2020-10-27 05:48:03', '2020-10-27 05:48:03'),
(98, '12', 'storage/gallery_zip/folder_name/test/images/erp-Implementations.jpg', '1', '2020-10-27 05:48:03', '2020-10-27 05:48:03'),
(99, '12', 'storage/gallery_zip/folder_name/test/images/Custom ERP Development.jpg', '1', '2020-10-27 05:48:03', '2020-10-27 05:48:03'),
(100, '12', 'storage/gallery_zip/folder_name/test/images/Custom ERP Development1.png', '1', '2020-10-27 05:48:03', '2020-10-27 05:48:03'),
(101, '12', 'storage/gallery_zip/folder_name/test/images/Data Mining.png', '1', '2020-10-27 05:48:03', '2020-10-27 05:48:03'),
(102, '12', 'storage/gallery_zip/folder_name/test/images/Effective Integration Services.jpeg', '1', '2020-10-27 05:48:03', '2020-10-27 05:48:03'),
(103, '12', 'storage/gallery_zip/folder_name/test/images/Custom Web Development.png', '1', '2020-10-27 05:48:03', '2020-10-27 05:48:03'),
(104, '12', 'storage/gallery_zip/folder_name/test/images/Data Analytics.jpg', '1', '2020-10-27 05:48:03', '2020-10-27 05:48:03'),
(105, '12', 'storage/gallery_zip/folder_name/test/images/ERP System Configurations.png', '1', '2020-10-27 05:48:03', '2020-10-27 05:48:03'),
(106, '12', 'storage/gallery_zip/folder_name/test/images/Tailored Solutions.png', '1', '2020-10-27 05:48:03', '2020-10-27 05:48:03'),
(107, '12', 'storage/gallery_zip/folder_name/test/images/ERP Administration Services.png', '1', '2020-10-27 05:48:03', '2020-10-27 05:48:03'),
(108, '12', 'storage/gallery_zip/folder_name/test/images/Data Warehouse.jpg', '1', '2020-10-27 05:48:03', '2020-10-27 05:48:03'),
(109, '12', 'storage/gallery_zip/folder_name/test/images/Customizable Dashboards.jpg', '1', '2020-10-27 05:48:03', '2020-10-27 05:48:03'),
(110, '12', 'storage/gallery_zip/folder_name/test/images/Expert ERP Consultants.png', '1', '2020-10-27 05:48:04', '2020-10-27 05:48:04'),
(111, '13', '/storage/gallery_Admin/gallery_image/test2_13_1603797712.lis-nagda.png', '1', '2020-10-27 05:51:52', '2020-10-27 05:51:52'),
(112, '13', '/storage/gallery_Admin/gallery_image/test2_13_1603797732.logo.png', '1', '2020-10-27 05:52:12', '2020-10-27 05:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `guardian_designations`
--

CREATE TABLE `guardian_designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guardian_designations`
--

INSERT INTO `guardian_designations` (`id`, `user_id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 0, 'Manager1', NULL, '2020-09-22 04:10:16', '2020-09-22 04:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `id_cards`
--

CREATE TABLE `id_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(4, '2020_09_19_104259_create_students_guardiant_masts_table', 2),
(5, '2020_09_19_104413_create_students_masts_table', 2),
(6, '2020_09_21_052724_create_student_classes_table', 3),
(7, '2020_09_21_060619_create_student_batches_table', 4),
(8, '2020_09_21_064608_create_student_section_masts_table', 5),
(9, '2020_09_21_070204_create_cast_categories_table', 6),
(10, '2020_09_21_071512_create_std_religions_table', 7),
(11, '2020_09_21_072702_create_std_blood_groups_table', 8),
(12, '2020_09_21_082808_create_std_nationalities_table', 9),
(13, '2020_09_21_083751_create_country_masts_table', 10),
(14, '2020_09_21_085228_create_state_masts_table', 11),
(15, '2020_09_21_091606_create_city_masts_table', 12),
(16, '2020_09_21_102038_create_mothetongue_masts_table', 13),
(17, '2020_09_22_062427_create_studenst_docs_table', 14),
(18, '2020_09_22_090937_create_professtion_types_table', 15),
(19, '2020_09_22_092911_create_guardian_designations_table', 16),
(20, '2020_09_24_094450_create_student_attendances_table', 17),
(21, '2020_09_25_051018_create_teachers_table', 18),
(22, '2020_09_25_061426_create_teachers_teams_table', 18),
(23, '2020_09_29_101956_create_subjects_table', 19),
(24, '2020_09_29_121855_create_assign_subjects_table', 20),
(25, '2020_09_30_084735_create_assign_subject_group_students_table', 21),
(26, '2020_10_01_051016_create_section_manages_table', 22),
(27, '2020_10_01_094615_create_assign_student_to_sections_table', 23),
(29, '2020_10_02_050528_create_staff_attendances_table', 24),
(30, '2020_10_02_072741_create_academic_calendars_table', 25),
(31, '2020_10_06_092341_create_notice_circulars_table', 26),
(32, '2020_10_09_062914_notice_class_batch_id', 27),
(33, '2020_10_09_064538_create_notice_students_table', 28),
(34, '2020_10_09_095306_create_notice_faculties_table', 29),
(35, '2020_10_09_114857_laratrust_setup_tables', 30),
(36, '2020_10_10_125316_create_assign_subject_to_teachers_table', 31),
(37, '2020_10_12_054657_create_assign_sub_id_to_teachers_table', 32),
(38, '2020_10_13_082929_create_contact_us_froms_table', 33),
(40, '2020_10_15_124933_create_class_batch_section_group_masts_table', 34),
(41, '2020_10_16_082646_create_compose_email_student_ids_table', 35),
(42, '2020_10_16_082653_create_compose_email_staff_ids_table', 35),
(43, '2020_10_15_054530_create_compose_emails_table', 36),
(44, '2020_10_16_132451_create_compose_sms_table', 37),
(45, '2020_10_17_082518_create_compose_sms_student_ids_table', 38),
(46, '2020_10_17_082700_create_compose_sms_staff_ids_table', 38),
(47, '2020_10_17_094514_create_compose_sms_staff_id_and_student_ids_table', 39),
(48, '2020_10_22_092123_create_admission_inquiry_forms_table', 40),
(49, '2020_10_22_114708_create_id_cards_table', 41),
(50, '2020_10_26_093913_create_gallery_folders_table', 41),
(51, '2020_10_26_124037_create_gallery_images_table', 42),
(55, '2020_10_01_125754_create_fees_masts_table', 43),
(56, '2020_10_29_100325_create_fees_head_masts_table', 44),
(57, '2020_10_29_101033_create_fine_types_table', 45),
(58, '2020_10_29_101740_create_student_fees_pay_trans_table', 46),
(59, '2020_10_29_102529_create_student_fees_trans_table', 46),
(60, '2020_10_29_102955_create_reciept_head_masts_table', 46),
(61, '2020_10_29_103248_create_fees_instalment_masts_table', 47),
(62, '2020_10_29_103601_create_bank_masts_table', 47),
(63, '2020_10_29_103927_create_cheque_dd_trans_table', 48),
(64, '2020_10_29_105003_create_concession_masts_table', 48),
(65, '2020_10_29_105403_create_concession_apply_trans_table', 48),
(66, '2020_10_29_105637_create_concession_student_trans_table', 48),
(67, '2020_11_09_061923_create_fees_head_trans_table', 49),
(68, '2020_11_12_072151_create_assign_subject_to_classes_table', 50),
(69, '2020_11_12_072725_create_assign_subject_id_to_classes_table', 50);

-- --------------------------------------------------------

--
-- Table structure for table `mothetongue_masts`
--

CREATE TABLE `mothetongue_masts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `mothetongue_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mothetongue_masts`
--

INSERT INTO `mothetongue_masts` (`id`, `user_id`, `mothetongue_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 0, 'test1', NULL, '2020-09-21 04:55:44', '2020-09-21 04:56:16');

-- --------------------------------------------------------

--
-- Table structure for table `notice_circulars`
--

CREATE TABLE `notice_circulars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `circular_title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_from_display` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_to_display` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `circular_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `sender` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selected_student` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_batch_section_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notice_circulars`
--

INSERT INTO `notice_circulars` (`id`, `user_id`, `circular_title`, `date_from_display`, `date_to_display`, `file`, `circular_description`, `status`, `sender`, `selected_student`, `class_batch_section_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(17, '1', 'sdfsdfdsff', '09-10-2020', '14-10-2020', NULL, 'sdf', 1, 'send_to_student', '[\"13\",\"14\",\"15\"]', NULL, NULL, '2020-10-09 01:20:54', '2020-10-09 01:49:49'),
(18, '1', 'sdf', '22-10-2020', '21-10-2020', NULL, 'dsfdsf', 1, 'send_to_student', '[\"16\"]', NULL, NULL, '2020-10-09 04:09:10', '2020-10-09 04:09:10'),
(19, '1', 'sd1', '09-10-2020', '20-10-2020', NULL, 'sdfdfg', 1, 'send_to_faculty', 'null', NULL, NULL, '2020-10-09 04:28:24', '2020-10-09 04:58:30'),
(20, '1', 'sdf', '16-10-2020', '21-10-2020', NULL, 'sdf', 1, 'send_to_faculty', 'null', NULL, NULL, '2020-10-09 04:30:14', '2020-10-09 04:30:14'),
(21, '1', 'test', '14-10-2020', '22-10-2020', NULL, 'sdf', 1, 'send_to_all', 'null', NULL, NULL, '2020-10-09 04:59:02', '2020-10-09 04:59:02'),
(22, '1', 'dsfg', '22-10-2020', '04-11-2020', NULL, 'dfg', 1, 'send_to_all_faculties', 'null', NULL, NULL, '2020-10-16 03:38:50', '2020-10-16 03:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `notice_class_batch_id`
--

CREATE TABLE `notice_class_batch_id` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notice_circular_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notice_course_batch_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notice_class_batch_id`
--

INSERT INTO `notice_class_batch_id` (`id`, `user_id`, `notice_circular_id`, `notice_course_batch_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, '1', '17', '29', '1', NULL, '2020-10-09 01:20:54', '2020-10-09 01:20:54'),
(4, '1', '17', '30', '1', NULL, '2020-10-09 01:20:54', '2020-10-09 01:20:54');

-- --------------------------------------------------------

--
-- Table structure for table `notice_faculties`
--

CREATE TABLE `notice_faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notice_circular_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notice_faculty_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notice_faculties`
--

INSERT INTO `notice_faculties` (`id`, `user_id`, `notice_circular_id`, `notice_faculty_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', '20', '16', '1', NULL, '2020-10-09 04:30:14', '2020-10-09 04:30:14'),
(2, '1', '22', '17', '1', NULL, '2020-10-16 03:38:50', '2020-10-16 03:38:50'),
(3, '1', '22', '21', '1', NULL, '2020-10-16 03:38:50', '2020-10-16 03:38:50'),
(4, '1', '22', '45', '1', NULL, '2020-10-16 03:38:50', '2020-10-16 03:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `notice_students`
--

CREATE TABLE `notice_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notice_circular_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notice_student_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notice_students`
--

INSERT INTO `notice_students` (`id`, `user_id`, `notice_circular_id`, `notice_student_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', '17', '13', '1', NULL, '2020-10-09 01:20:54', '2020-10-09 01:20:54'),
(2, '1', '17', '14', '1', NULL, '2020-10-09 01:20:55', '2020-10-09 01:20:55'),
(3, '1', '17', '15', '1', NULL, '2020-10-09 01:20:55', '2020-10-09 01:20:55');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'read', NULL, NULL, '2020-10-09 07:26:50', '2020-10-09 07:26:50'),
(2, 'write', NULL, NULL, '2020-10-09 07:38:27', '2020-10-09 07:38:27'),
(3, 'delete', NULL, NULL, '2020-10-09 07:38:38', '2020-10-09 07:38:38');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(3, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professtion_types`
--

CREATE TABLE `professtion_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `professtion_types_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professtion_types`
--

INSERT INTO `professtion_types` (`id`, `user_id`, `professtion_types_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 0, 'Agarbatti making1', NULL, '2020-09-22 03:51:54', '2020-09-22 03:51:59'),
(2, 1, 'test', NULL, '2020-09-28 01:34:31', '2020-09-28 01:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `reciept_head_masts`
--

CREATE TABLE `reciept_head_masts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shrt_desc` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `related` int(11) DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', NULL, NULL, '2020-10-09 07:20:32', '2020-10-10 00:00:59'),
(2, 'teachers', NULL, NULL, '2020-10-09 07:22:00', '2020-10-09 23:59:45'),
(3, 'students', NULL, NULL, '2020-10-09 23:59:39', '2020-10-09 23:59:39');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(2, 17, 'App\\User'),
(3, 18, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `section_manages`
--

CREATE TABLE `section_manages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section_manages`
--

INSERT INTO `section_manages` (`id`, `user_id`, `course_id`, `batch_id`, `section_id`, `section_name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(29, '1', '2', '8', '3', NULL, '1', NULL, '2020-10-01 00:10:56', '2020-10-01 00:13:01'),
(30, '1', '3', '7', '2', NULL, '1', NULL, '2020-10-01 00:10:56', '2020-10-01 00:13:01'),
(35, '1', '1', '1', '1', NULL, '1', NULL, '2020-10-01 01:38:36', '2020-11-12 01:40:15'),
(36, '1', '3', '7', '3', NULL, '1', NULL, '2020-10-01 01:39:28', '2020-10-01 01:39:28'),
(37, '1', '2', '8', '3', NULL, '1', NULL, '2020-10-06 01:59:06', '2020-10-06 01:59:06'),
(38, '1', '1', '8', '3', NULL, '1', NULL, '2020-10-07 04:42:25', '2020-10-07 04:42:25'),
(39, '1', '2', '1', '2', NULL, '1', NULL, '2020-10-15 05:24:28', '2020-10-15 05:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `staff_attendances`
--

CREATE TABLE `staff_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_by` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendance_date` datetime DEFAULT NULL,
  `in_time` datetime DEFAULT NULL,
  `out_time` date DEFAULT NULL,
  `staying_hour` datetime DEFAULT NULL,
  `status` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_attendances`
--

INSERT INTO `staff_attendances` (`id`, `staff_id`, `user_id`, `present`, `submitted_by`, `attendance_date`, `in_time`, `out_time`, `staying_hour`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '16', '1', 'P', '1', '2020-10-02 00:00:00', NULL, NULL, NULL, '1', NULL, '2020-10-01 23:45:15', '2020-10-02 01:12:05'),
(2, '16', '1', 'P', '1', '2020-10-10 00:00:00', NULL, NULL, NULL, '1', NULL, '2020-10-10 01:25:37', '2020-10-10 01:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `state_masts`
--

CREATE TABLE `state_masts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `state_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `state_masts`
--

INSERT INTO `state_masts` (`id`, `user_id`, `state_name`, `country_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 0, 'MP1', '1', NULL, '2020-09-21 03:37:01', '2020-09-21 03:45:47'),
(2, 0, 'up', '1', NULL, '2020-09-21 04:38:57', '2020-09-21 04:38:57');

-- --------------------------------------------------------

--
-- Table structure for table `std_blood_groups`
--

CREATE TABLE `std_blood_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `blood_group_name` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `std_blood_groups`
--

INSERT INTO `std_blood_groups` (`id`, `user_id`, `blood_group_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 0, 'A+', NULL, '2020-09-21 02:55:35', '2020-09-21 02:55:45'),
(2, 0, 'B+', NULL, '2020-09-21 04:33:03', '2020-09-21 04:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `std_nationalities`
--

CREATE TABLE `std_nationalities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nationality_name` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `std_nationalities`
--

INSERT INTO `std_nationalities` (`id`, `user_id`, `nationality_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 0, 'Indian1', NULL, '2020-09-21 03:07:08', '2020-09-21 03:07:14'),
(2, 0, 'us', NULL, '2020-09-21 04:33:43', '2020-09-21 04:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `std_religions`
--

CREATE TABLE `std_religions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `religion_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `std_religions`
--

INSERT INTO `std_religions` (`id`, `user_id`, `religion_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 0, 'Mother', NULL, '2020-09-21 01:54:57', '2020-09-21 01:54:57'),
(2, 0, 'Father', NULL, '2020-09-21 01:55:23', '2020-09-21 01:55:32'),
(3, 0, 'm', NULL, '2020-09-21 04:32:43', '2020-09-21 04:32:43');

-- --------------------------------------------------------

--
-- Table structure for table `studenst_docs`
--

CREATE TABLE `studenst_docs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_title` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_doc` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studenst_docs`
--

INSERT INTO `studenst_docs` (`id`, `user_id`, `s_id`, `doc_title`, `doc_description`, `student_doc`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '3', '4', 'admin/students_doc1/student_doc//3_0_1601361074.lis-nagda.png', NULL, '2020-09-22 04:42:38', '2020-09-29 01:01:14'),
(2, '1', '1', 'fg', 'gdf', 'admin/students_coc1/student_doc//fg_1_1600769558.logo.png', NULL, '2020-09-22 04:42:38', '2020-09-22 04:42:38'),
(3, '1', '3', '3', '4', 'admin/students_doc1/student_doc//3_1_1601360934.logo.png', NULL, '2020-09-22 05:00:35', '2020-09-29 00:59:14'),
(4, '1', '4', NULL, NULL, NULL, NULL, '2020-09-22 05:03:25', '2020-09-22 05:03:25'),
(5, '1', '5', NULL, NULL, NULL, NULL, '2020-09-22 05:06:11', '2020-09-22 05:06:11'),
(6, '1', '8', NULL, NULL, NULL, NULL, '2020-09-23 03:11:53', '2020-09-23 03:11:53'),
(7, '1', '9', NULL, NULL, NULL, NULL, '2020-09-23 03:13:50', '2020-09-23 03:13:50'),
(8, '1', '13', '1', '2', 'admin/students_1/parents//1_0_1601879702.lis-nagda.png', NULL, '2020-09-24 04:26:59', '2020-10-05 01:05:02'),
(9, '1', '13', '3', '4', 'admin/students_1/parents//3_1_1601879222.lis-nagda.png', NULL, '2020-09-24 05:25:40', '2020-10-05 00:57:02'),
(24, '1', '13', 'sdf', 'sdf', 'admin/students_1/parents//sdf_2_1601879222.logo.png', NULL, '2020-09-29 04:05:58', '2020-10-05 00:57:02'),
(29, '1', '18', NULL, NULL, NULL, NULL, '2020-10-14 00:20:19', '2020-10-14 00:20:19'),
(30, '1', '19', NULL, NULL, NULL, NULL, '2020-10-14 00:25:49', '2020-10-14 00:25:49'),
(31, '1', '27', NULL, NULL, NULL, NULL, '2020-10-14 01:25:24', '2020-10-14 01:25:24'),
(32, '1', '28', NULL, NULL, NULL, NULL, '2020-10-14 01:26:48', '2020-10-14 01:26:48'),
(33, '1', '30', NULL, NULL, NULL, NULL, '2020-10-14 01:34:38', '2020-10-14 01:34:38'),
(34, '1', '33', NULL, NULL, NULL, NULL, '2020-10-14 01:41:19', '2020-10-14 01:41:19'),
(35, '1', '34', NULL, NULL, NULL, NULL, '2020-10-15 07:27:56', '2020-10-15 07:27:56');

-- --------------------------------------------------------

--
-- Table structure for table `students_guardiant_masts`
--

CREATE TABLE `students_guardiant_masts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_mobile` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employment_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employer` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_check` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students_guardiant_masts`
--

INSERT INTO `students_guardiant_masts` (`id`, `user_id`, `s_id`, `g_name`, `g_mobile`, `work_status`, `employment_type`, `profession_status`, `employer`, `designation`, `g_check`, `g_id`, `relation_id`, `name`, `mobile`, `photo`, `deleted_at`, `created_at`, `updated_at`) VALUES
(11, '1', '13', '324324', '324324', '11', '11', '1', 'fdsg', NULL, NULL, NULL, '2', 'asf', '345', 'admin/students_1/parents//324324_0_1601878546.lis-nagda.png', NULL, '2020-09-25 23:45:47', '2020-10-05 00:45:46'),
(13, '1', '14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-30 00:51:28', '2020-09-30 00:51:28'),
(23, '1', '18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-14 00:20:19', '2020-10-14 00:20:19'),
(24, '1', '19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-14 00:25:49', '2020-10-14 00:25:49'),
(25, '1', '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-14 01:19:32', '2020-10-14 01:19:32'),
(26, '1', '26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-14 01:20:22', '2020-10-14 01:20:22'),
(27, '1', '27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-14 01:25:24', '2020-10-14 01:25:24'),
(28, '1', '28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-14 01:26:48', '2020-10-14 01:26:48'),
(29, '1', '30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-14 01:34:38', '2020-10-14 01:34:38'),
(30, '1', '33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-14 01:41:19', '2020-10-14 01:41:19'),
(31, '1', '13', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '2020-10-15 07:27:56', '2020-10-15 07:27:56');

-- --------------------------------------------------------

--
-- Table structure for table `students_masts`
--

CREATE TABLE `students_masts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `std_class_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admision_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_mobile` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_place` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passout_date` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dropout_date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forward_date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reservation_class_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spec_ailment` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taluka` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cast` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_ssmid` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_ssmid` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aadhar_card` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_ward` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cbsc_reg` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addm_date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enroll_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roll_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prev_school` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_of_prev_school` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prev_school_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acadmic_city_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acadmic_state_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acadmic_pin` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acadmic_country_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acadmic_cast_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acadmic_attendance_reg_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acadmic_remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_country_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_state_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_city_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_zip_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_country_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_state_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_city_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_zip_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ifsc_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_status` tinyint(4) NOT NULL DEFAULT 1,
  `admission_status` int(2) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students_masts`
--

INSERT INTO `students_masts` (`id`, `user_id`, `photo`, `std_class_id`, `batch_id`, `admision_no`, `section_id`, `f_name`, `m_name`, `l_name`, `s_mobile`, `dob`, `birth_place`, `passout_date`, `dropout_date`, `forward_date`, `email`, `gender`, `reservation_class_id`, `religion_id`, `blood_group_id`, `spec_ailment`, `age`, `nationality_id`, `taluka`, `language_id`, `other_language`, `cast`, `s_ssmid`, `f_ssmid`, `aadhar_card`, `teacher_ward`, `cbsc_reg`, `addm_date`, `enroll_no`, `roll_no`, `username`, `password`, `prev_school`, `year_of_prev_school`, `prev_school_address`, `acadmic_city_id`, `acadmic_state_id`, `acadmic_pin`, `acadmic_country_id`, `acadmic_cast_id`, `acadmic_attendance_reg_no`, `acadmic_remark`, `p_address`, `p_country_id`, `p_state_id`, `p_city_id`, `p_zip_code`, `l_address`, `l_country_id`, `l_state_id`, `l_city_id`, `l_zip_code`, `bank_name`, `bank_branch`, `account_name`, `account_no`, `ifsc_code`, `status`, `user_status`, `admission_status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(13, '1', 'admin/school_1/students/kishan_1601370669.lis-nagda.png', '2', '8', '2343324', '3', 'kishan', 'sdf', 'Kewat', '234324234', '2020-09-30', 'fhfgh', NULL, NULL, '2020-09-26 05:53:08', 'mukesh@laxyo.in', '2', '1', '2', '1', '4', '22', '1', 'indore', '1', NULL, NULL, '4565454', '47898776', '111111111111111', '0', 'hjkjhk', '2020-09-18', NULL, '78567878', NULL, '$2y$10$D1QW5Hvkh0U2Ff8gSBw0d.THcCzaqdBU.947DCaOKBbSECByM9qYi', 'test', '2019', 'dsf', '1', '1', '32453', '1', 'sdffs', '345', 'ghhf', '45', '2', '1', '1', '32453', 'sdfdsf', '1', '1', '1', '2342', 'dfgfd', 'sfsf', '324324', '45353', 'fdgddg2345', 'R', 1, NULL, NULL, '2020-09-25 23:45:46', '2020-10-05 04:33:18'),
(14, '1', NULL, '3', '7', '3453453', '2', 'test', NULL, 'kewat', NULL, NULL, NULL, NULL, NULL, NULL, 'test@tet.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-23', NULL, NULL, NULL, '$2y$10$fX4UESrccFn3OK.PCo8bg.X0z6nGkRKdVjGwf2isU.0Mz2mlpsNQi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'R', 1, NULL, NULL, '2020-09-30 00:51:27', '2020-09-30 00:51:27'),
(15, '1', NULL, '2', '8', '2343324', '3', 'kishan1', 'sdf', 'Kewat1', '111', '2020-09-30', 'fhfgh', NULL, NULL, NULL, 'mukesh@laxyo.in', '2', '1', '2', '1', '4', '22', '1', 'indore', '1', NULL, NULL, '4565454', '47898776', NULL, '0', 'hjkjhk', '2020-09-18', NULL, '78567878', NULL, '$2y$10$9tAMHOm3Cl9kEKpl/q3cUOGrrCB4172QDxAfPv5UQaaIunslfvr7q', 'test', '2019', 'dsf', '1', '1', '32453', '1', 'sdffs', '345', 'ghhf', '45', '2', '1', '1', '32453', 'sdfdsf', '1', '1', '1', '2342', 'dfgfd', 'sfsf', '324324', '45353', 'fdgddg2345', 'R', 1, NULL, NULL, '2020-10-05 00:13:45', '2020-10-05 00:13:45'),
(18, '1', 'admin/school_1/students/Ram_1602654611.logo.png', '1', '1', '1254545', '1', 'Ram', NULL, 'Kewat', '8770510126', '2020-10-01', NULL, NULL, NULL, NULL, 'ram@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-08', NULL, '54545', 'ramkewat', '$2y$10$EeOGtQWLPqvs9K/5O3phQe1CpSUrfbTT5k6ah37qmTW//JaqEuSXm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'R', 1, NULL, NULL, '2020-10-14 00:20:11', '2020-10-14 00:20:11'),
(19, '1', 'admin/school_1/students/Syam_1602654944.lis-nagda.png', '1', '1', '234324', '1', 'Syam', NULL, 'sundar', '23432455', '2019-06-20', NULL, NULL, NULL, NULL, 'syam@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-14', NULL, '23423', 'syamsundar', '$2y$10$2eSbbBlxnXyi4VrSu8XfauiOE4PGBiCvz.iiKfVVWhQ1.55CwOd3W', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'R', 1, NULL, NULL, '2020-10-14 00:25:44', '2020-10-14 00:25:44');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendances`
--

CREATE TABLE `student_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `s_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_by` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendance_date` datetime DEFAULT NULL,
  `in_time` datetime DEFAULT NULL,
  `out_time` date DEFAULT NULL,
  `staying_hour` datetime DEFAULT NULL,
  `status` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_attendances`
--

INSERT INTO `student_attendances` (`id`, `s_id`, `user_id`, `present`, `submitted_by`, `attendance_date`, `in_time`, `out_time`, `staying_hour`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '10', '1', 'P', '1', '2020-09-24 00:00:00', NULL, NULL, NULL, '0', NULL, '2020-09-24 05:07:20', '2020-09-24 07:57:19'),
(2, '10', '1', 'P', '1', '2020-09-25 00:00:00', NULL, NULL, NULL, '0', NULL, '2020-09-24 23:57:29', '2020-09-24 23:57:29'),
(3, '11', '1', 'A', '1', '2020-09-25 00:00:00', NULL, NULL, NULL, '0', NULL, '2020-09-24 23:57:29', '2020-09-24 23:59:12'),
(4, '12', '1', 'P', '1', '2020-09-25 00:00:00', NULL, NULL, NULL, '0', NULL, '2020-09-24 23:57:29', '2020-09-24 23:57:29'),
(5, '13', '1', 'P', '1', '2020-10-01 00:00:00', NULL, NULL, NULL, '0', NULL, '2020-10-01 06:49:04', '2020-10-02 03:59:54'),
(6, '14', '1', 'A', '1', '2020-10-01 00:00:00', NULL, NULL, NULL, '0', NULL, '2020-10-01 06:49:04', '2020-10-02 04:00:12'),
(7, '13', '1', 'P', '1', '2020-10-02 00:00:00', NULL, NULL, NULL, '0', NULL, '2020-10-02 00:40:29', '2020-10-03 00:17:21'),
(8, '14', '1', 'A', '1', '2020-10-02 00:00:00', NULL, NULL, NULL, '0', NULL, '2020-10-02 00:40:29', '2020-10-03 00:17:21'),
(9, '13', '1', 'P', '1', '2020-10-03 00:00:00', NULL, NULL, NULL, '0', NULL, '2020-10-03 00:10:53', '2020-10-03 00:10:53'),
(10, '14', '1', 'P', '1', '2020-10-03 00:00:00', NULL, NULL, NULL, '0', NULL, '2020-10-03 00:10:53', '2020-10-03 00:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `student_batches`
--

CREATE TABLE `student_batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `batch_from` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch_to` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch_name` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_batches`
--

INSERT INTO `student_batches` (`id`, `user_id`, `batch_from`, `batch_to`, `batch_name`, `class_id`, `created_at`, `updated_at`) VALUES
(1, 1, '09/02/2020', '07/14/2022', '2020-2022', 4, '2020-09-21 01:01:47', '2020-11-11 01:25:37'),
(2, 0, NULL, '2022', NULL, NULL, '2020-09-21 01:03:56', '2020-09-21 01:03:56'),
(3, 0, '2019', '2022', NULL, NULL, '2020-09-21 01:07:12', '2020-09-21 01:07:32'),
(4, 0, '2019', '2025', NULL, NULL, '2020-09-21 01:09:10', '2020-09-21 01:09:10'),
(5, 0, '34543', '345435', NULL, NULL, '2020-09-21 04:14:47', '2020-09-21 04:14:47'),
(6, 0, '2019', '2022', NULL, NULL, '2020-09-21 04:25:08', '2020-09-21 04:25:08'),
(7, 0, '09/09/2020', '07/16/2026', '2020-2022', NULL, '2020-09-22 23:59:56', '2020-09-23 00:35:56'),
(8, 1, '02/01/2018', '09/17/2020', '2018-2020', NULL, '2020-09-23 00:37:25', '2020-09-23 00:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `class_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `user_id`, `class_name`, `class_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nursery', 'test', '2020-09-21 00:04:21', '2020-09-23 03:05:26'),
(2, 0, 'LKG', NULL, '2020-09-21 00:07:26', '2020-09-22 07:54:01'),
(3, 0, 'UKG', NULL, '2020-09-21 00:07:34', '2020-09-22 07:54:10'),
(4, 0, '1st', NULL, '2020-09-21 00:08:35', '2020-09-22 07:54:23'),
(5, 0, '2nd', NULL, '2020-09-21 00:08:53', '2020-09-22 07:54:33'),
(6, 0, '3rd', NULL, '2020-09-21 00:09:33', '2020-09-22 07:54:44'),
(7, 0, '4th', NULL, '2020-09-21 00:19:10', '2020-09-22 07:54:56'),
(8, 0, '5th', NULL, '2020-09-21 00:19:53', '2020-09-22 07:55:20'),
(9, 0, '6th', NULL, '2020-09-21 00:28:34', '2020-09-22 07:55:32'),
(10, 0, '7th', NULL, '2020-09-21 04:12:22', '2020-09-22 07:55:40'),
(11, 0, '8th', NULL, '2020-09-21 04:41:01', '2020-09-22 07:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `student_fees_pay_trans`
--

CREATE TABLE `student_fees_pay_trans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `s_id` int(11) DEFAULT NULL,
  `student_fees_id` int(11) DEFAULT NULL,
  `total_amnt` decimal(9,2) DEFAULT NULL,
  `fine_amnt` decimal(9,2) DEFAULT NULL,
  `consession_amnt` decimal(9,2) DEFAULT NULL,
  `discount_amnt` decimal(9,2) DEFAULT NULL,
  `paybale_amnt` decimal(9,2) DEFAULT NULL,
  `charges_amnt` decimal(9,2) DEFAULT NULL,
  `excess_amnt` decimal(9,2) DEFAULT NULL,
  `payment_mode` int(11) DEFAULT NULL,
  `transcation_id` int(11) DEFAULT NULL,
  `reciept _no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_no` date DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fees_month` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_fees_trans`
--

CREATE TABLE `student_fees_trans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `s_id` int(11) DEFAULT NULL,
  `f_id` int(11) DEFAULT NULL,
  `due_amount` decimal(9,2) DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_fees_trans`
--

INSERT INTO `student_fees_trans` (`id`, `s_id`, `f_id`, `due_amount`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(13, 13, 36, NULL, '1', NULL, '2020-11-10 04:03:22', '2020-11-10 04:03:22'),
(14, 15, 36, NULL, '1', NULL, '2020-11-10 04:03:22', '2020-11-10 04:03:22'),
(15, 13, 39, NULL, '1', NULL, '2020-11-10 04:21:11', '2020-11-10 04:21:11'),
(16, 15, 39, NULL, '1', NULL, '2020-11-10 04:21:11', '2020-11-10 04:21:11'),
(17, 13, 40, NULL, '1', NULL, '2020-11-10 04:23:33', '2020-11-10 04:23:33'),
(18, 15, 40, NULL, '1', NULL, '2020-11-10 04:23:33', '2020-11-10 04:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `student_section_masts`
--

CREATE TABLE `student_section_masts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `section_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_students` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_details` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_section_masts`
--

INSERT INTO `student_section_masts` (`id`, `user_id`, `section_name`, `assigned_students`, `section_details`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'EM', NULL, 'EM', NULL, '2020-09-21 01:27:39', '2020-10-31 06:56:26'),
(2, 1, 'HM', NULL, 'HM', NULL, '2020-09-21 01:28:27', '2020-10-31 06:56:39'),
(3, 1, 'C', NULL, 'C', NULL, '2020-09-21 04:30:49', '2020-09-30 05:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_sequence` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `user_id`, `subject_name`, `subject_code`, `subject_sequence`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, '1', 'Math', '43543', 'sfdg', '1', NULL, '2020-09-29 06:08:22', '2020-11-22 23:52:55'),
(4, '1', 'English', '2423', 'fs', '1', NULL, '2020-10-10 03:26:36', '2020-11-22 23:52:32'),
(5, '1', 'Hindi', '32432', 'sdf', '1', NULL, '2020-10-12 05:16:28', '2020-11-22 23:52:40'),
(6, '1', 'Chemistry', '32', 'sdf', '1', NULL, '2020-11-22 23:53:11', '2020-11-22 23:53:11'),
(7, '1', 'Physicse', '234', 'sf', '1', NULL, '2020-11-22 23:53:33', '2020-11-22 23:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `parent_id`, `created_at`, `updated_at`, `status`, `deleted_at`) VALUES
(15, NULL, '2020-09-25 04:53:15', '2020-09-25 05:03:58', 1, '2020-09-25 05:03:58'),
(16, 1, '2020-09-25 04:58:40', '2020-09-26 04:18:44', 0, '2020-09-26 04:18:44'),
(21, 1, '2020-10-11 23:45:09', '2020-10-11 23:45:09', 1, NULL),
(39, 1, '2020-10-14 01:55:54', '2020-10-14 01:55:54', 1, NULL),
(45, 1, '2020-10-14 02:58:28', '2020-10-14 02:58:28', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers_teams`
--

CREATE TABLE `teachers_teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers_teams`
--

INSERT INTO `teachers_teams` (`id`, `name`, `parent_id`, `users_id`, `class_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, 'test12s', '1', '15,16,17', '2', '1', NULL, '2020-09-26 05:01:31', '2020-09-26 06:21:51'),
(8, 'dfdsf', '1', '1', '3', '1', NULL, '2020-09-26 06:35:05', '2020-09-26 06:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `parent_id` int(11) DEFAULT NULL,
  `user_flag` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternative_mo_no` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `message_sent` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `compose_message_sent` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `student_id`, `deleted_at`, `status`, `parent_id`, `user_flag`, `mobile_no`, `photo`, `alternative_mo_no`, `country_id`, `state_id`, `city_id`, `zip_code`, `dob`, `message_sent`, `compose_message_sent`) VALUES
(1, 'Admin', 'kishan@laxyo.in', NULL, '$2y$10$H.MsbLBp47Kwe/suH9n9eeUTQ5/N07ZiYhe3g5Ixx/.ARRj.iSerS', 'YWKe7xTYzk0GrbMdSmeGbhSdQYOFz5rwoqHQDesVgPAuutcbSlYOzItEFpA1', '2020-10-22 18:30:00', '2020-10-10 03:04:52', NULL, NULL, '2020-09-25 04:04:41', 0, NULL, 'A', '4535', 'profile_1/profile/kishan_1601964249.logo.png', '345345', 1, 1, 3, 345435, '2020-10-09 00:00:00', '0', '0'),
(15, 'test', 'kishandsfsd@laxyo.in', NULL, '$2y$10$/IvvkIKOk8KrFUOD4FvFguf2hPKJTJBCgSJKlLQ4D1VpT16wJHS/y', NULL, '2020-09-25 04:53:15', '2020-09-25 05:18:06', NULL, NULL, '2020-09-25 05:03:58', 1, NULL, NULL, '1234567890', '', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0'),
(17, 'Teacher', 'mukesh@laxyo.in', NULL, '$2y$10$fq7bbk1/W0C9JFNsvG7Csuekxb/0nKL1bNhoP4p96ep8Ipym8tf7a', NULL, '2020-09-25 18:30:00', '2020-10-17 03:16:44', 'kishan', '13', NULL, 1, NULL, 'T', '8770510126', '', '45646', 1, 1, 1, 456, '1970-01-01 00:00:00', '0', '1'),
(18, 'Student', 'test@tet.com', NULL, '$2y$10$RheSqjY7GHHwbWq50Uh/yOoTgkT5.u2ei9eXv4e7ArhpM1mPdI.JG', NULL, '2020-09-29 18:30:00', '2020-10-10 03:08:53', NULL, '14', NULL, 1, NULL, 'S', '234', '', '234', 1, 1, 1, 234324, '1970-01-01 00:00:00', '0', '0'),
(21, 'teacher2', 'teacher2@gmail.com', NULL, '$2y$10$0wv4/AvvxRQEAf/JOy9ToOkHnsH.Zdqc6OwjNsyupGBeMcnidefYG', NULL, '2020-10-11 23:45:09', '2020-10-17 03:16:45', 'teacher2@gmail.com', NULL, NULL, 1, 1, 'T', '8602126833', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '1'),
(24, 'Ram Kewat', 'ram@gmail.com', NULL, '$2y$10$5Cj2my/jMXSgzAFiangd1.kWhVYQPkarV6Nh0iEjhwy86r9araiI.', NULL, '2020-10-14 00:20:11', '2020-10-14 00:20:11', 'ramkewat', '18', NULL, 1, NULL, 'S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0'),
(25, 'Syam sundar', 'syam@gmail.com', NULL, '$2y$10$FxDwnCnsusvEGpjLvuusienQqI3WjeDXPiDL7Hql/iIKuuvs4GDc.', NULL, '2020-10-14 00:25:44', '2020-10-14 00:25:44', 'syamsundar', '19', NULL, 1, NULL, 'S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0'),
(33, 'Jon Jony', 'kishankewat@gmail.com', NULL, '$2y$10$WNwya4TwvsNBGPaIgau4sOTmtW3o22mLoaNUy91zAOwniwN/B4Xli', NULL, '2020-10-14 01:25:24', '2020-10-14 01:25:24', 'kishankewat', '27', NULL, 1, NULL, 'S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0'),
(36, 'messagetest ', 'messagetest@gmail.com', NULL, '$2y$10$mEht/XgyqGDX9mXnvigf.OPOsoWxx8.tV3Tu9OO8mahr/2G9c48hS', NULL, '2020-10-14 01:34:33', '2020-10-14 01:34:33', 'messagetest', '30', NULL, 1, NULL, 'S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0'),
(37, '43534sdf dfs', 'kishanasdasd@laxyo.in', NULL, '$2y$10$xZvbsZyxdd1q.ZBoKdRwJOzwYVjL2t9B5earlzJRW49rhc9Q05aHq', NULL, '2020-10-14 01:39:18', '2020-10-14 01:39:18', 'test', '32', NULL, 1, NULL, 'S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0'),
(38, '43534sdf dfs', 'kishanasdasddfg@laxyo.in', NULL, '$2y$10$O.IBsGJOt1P027XC9TkHp.3tNhru.25duWdw6jAVuFib0z8geSIqu', NULL, '2020-10-14 01:41:14', '2020-10-14 01:41:14', 'testdfg', '33', NULL, 1, NULL, 'S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0'),
(45, 'teacher5', 'teacher5@gmail.com', NULL, '$2y$10$AIX8ZV1/VwIQjnYduBjM4.t/2iPahMFAChxA0.WahD7FXZtHFKgjm', NULL, '2020-10-14 02:58:28', '2020-10-17 03:16:45', 'teacher5', NULL, NULL, 1, 1, 'T', '8770510126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '1'),
(46, ' ', 'kishandfgdfg@laxyo.in', NULL, '$2y$10$ZETHmSHHPRTiMtMiCMa73.qm8ILOMzB2t/afAc0KuTj.LAuvZpEs.', NULL, '2020-10-15 07:27:56', '2020-10-15 07:27:56', NULL, '34', NULL, 1, NULL, 'S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_calendars`
--
ALTER TABLE `academic_calendars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission_inquiry_forms`
--
ALTER TABLE `admission_inquiry_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_student_to_sections`
--
ALTER TABLE `assign_student_to_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subject_group_students`
--
ALTER TABLE `assign_subject_group_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subject_to_classes`
--
ALTER TABLE `assign_subject_to_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subject_to_teachers`
--
ALTER TABLE `assign_subject_to_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_sub_id_to_teachers`
--
ALTER TABLE `assign_sub_id_to_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_masts`
--
ALTER TABLE `bank_masts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cast_categories`
--
ALTER TABLE `cast_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cheque_dd_trans`
--
ALTER TABLE `cheque_dd_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_masts`
--
ALTER TABLE `city_masts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_batch_section_group_masts`
--
ALTER TABLE `class_batch_section_group_masts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compose_emails`
--
ALTER TABLE `compose_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compose_sms`
--
ALTER TABLE `compose_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compose_sms_staff_ids`
--
ALTER TABLE `compose_sms_staff_ids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compose_sms_staff_id_and_student_ids`
--
ALTER TABLE `compose_sms_staff_id_and_student_ids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compose_sms_student_ids`
--
ALTER TABLE `compose_sms_student_ids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `concession_apply_trans`
--
ALTER TABLE `concession_apply_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `concession_masts`
--
ALTER TABLE `concession_masts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `concession_student_trans`
--
ALTER TABLE `concession_student_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_froms`
--
ALTER TABLE `contact_us_froms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_masts`
--
ALTER TABLE `country_masts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_time_table_mast`
--
ALTER TABLE `exam_time_table_mast`
  ADD PRIMARY KEY (`time_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_head_masts`
--
ALTER TABLE `fees_head_masts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_head_trans`
--
ALTER TABLE `fees_head_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_instalment_masts`
--
ALTER TABLE `fees_instalment_masts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_masts`
--
ALTER TABLE `fees_masts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fine_types`
--
ALTER TABLE `fine_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_folders`
--
ALTER TABLE `gallery_folders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardian_designations`
--
ALTER TABLE `guardian_designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `id_cards`
--
ALTER TABLE `id_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mothetongue_masts`
--
ALTER TABLE `mothetongue_masts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_circulars`
--
ALTER TABLE `notice_circulars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_class_batch_id`
--
ALTER TABLE `notice_class_batch_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_faculties`
--
ALTER TABLE `notice_faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_students`
--
ALTER TABLE `notice_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `professtion_types`
--
ALTER TABLE `professtion_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reciept_head_masts`
--
ALTER TABLE `reciept_head_masts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `section_manages`
--
ALTER TABLE `section_manages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_attendances`
--
ALTER TABLE `staff_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_masts`
--
ALTER TABLE `state_masts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `std_blood_groups`
--
ALTER TABLE `std_blood_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `std_nationalities`
--
ALTER TABLE `std_nationalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `std_religions`
--
ALTER TABLE `std_religions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studenst_docs`
--
ALTER TABLE `studenst_docs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_guardiant_masts`
--
ALTER TABLE `students_guardiant_masts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_masts`
--
ALTER TABLE `students_masts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendances`
--
ALTER TABLE `student_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_batches`
--
ALTER TABLE `student_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fees_pay_trans`
--
ALTER TABLE `student_fees_pay_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fees_trans`
--
ALTER TABLE `student_fees_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_section_masts`
--
ALTER TABLE `student_section_masts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers_teams`
--
ALTER TABLE `teachers_teams`
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
-- AUTO_INCREMENT for table `academic_calendars`
--
ALTER TABLE `academic_calendars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admission_inquiry_forms`
--
ALTER TABLE `admission_inquiry_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assign_student_to_sections`
--
ALTER TABLE `assign_student_to_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `assign_subject_group_students`
--
ALTER TABLE `assign_subject_group_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `assign_subject_to_classes`
--
ALTER TABLE `assign_subject_to_classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `assign_subject_to_teachers`
--
ALTER TABLE `assign_subject_to_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `assign_sub_id_to_teachers`
--
ALTER TABLE `assign_sub_id_to_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `bank_masts`
--
ALTER TABLE `bank_masts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cast_categories`
--
ALTER TABLE `cast_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cheque_dd_trans`
--
ALTER TABLE `cheque_dd_trans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city_masts`
--
ALTER TABLE `city_masts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `class_batch_section_group_masts`
--
ALTER TABLE `class_batch_section_group_masts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `compose_emails`
--
ALTER TABLE `compose_emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `compose_sms`
--
ALTER TABLE `compose_sms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `compose_sms_staff_ids`
--
ALTER TABLE `compose_sms_staff_ids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compose_sms_staff_id_and_student_ids`
--
ALTER TABLE `compose_sms_staff_id_and_student_ids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `compose_sms_student_ids`
--
ALTER TABLE `compose_sms_student_ids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `concession_apply_trans`
--
ALTER TABLE `concession_apply_trans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `concession_masts`
--
ALTER TABLE `concession_masts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `concession_student_trans`
--
ALTER TABLE `concession_student_trans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us_froms`
--
ALTER TABLE `contact_us_froms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `country_masts`
--
ALTER TABLE `country_masts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_time_table_mast`
--
ALTER TABLE `exam_time_table_mast`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_head_masts`
--
ALTER TABLE `fees_head_masts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `fees_head_trans`
--
ALTER TABLE `fees_head_trans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `fees_instalment_masts`
--
ALTER TABLE `fees_instalment_masts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `fees_masts`
--
ALTER TABLE `fees_masts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `fine_types`
--
ALTER TABLE `fine_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gallery_folders`
--
ALTER TABLE `gallery_folders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `guardian_designations`
--
ALTER TABLE `guardian_designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `id_cards`
--
ALTER TABLE `id_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `mothetongue_masts`
--
ALTER TABLE `mothetongue_masts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notice_circulars`
--
ALTER TABLE `notice_circulars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `notice_class_batch_id`
--
ALTER TABLE `notice_class_batch_id`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notice_faculties`
--
ALTER TABLE `notice_faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notice_students`
--
ALTER TABLE `notice_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `professtion_types`
--
ALTER TABLE `professtion_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reciept_head_masts`
--
ALTER TABLE `reciept_head_masts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `section_manages`
--
ALTER TABLE `section_manages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `staff_attendances`
--
ALTER TABLE `staff_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `state_masts`
--
ALTER TABLE `state_masts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `std_blood_groups`
--
ALTER TABLE `std_blood_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `std_nationalities`
--
ALTER TABLE `std_nationalities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `std_religions`
--
ALTER TABLE `std_religions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `studenst_docs`
--
ALTER TABLE `studenst_docs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `students_guardiant_masts`
--
ALTER TABLE `students_guardiant_masts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `students_masts`
--
ALTER TABLE `students_masts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `student_attendances`
--
ALTER TABLE `student_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_batches`
--
ALTER TABLE `student_batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_fees_pay_trans`
--
ALTER TABLE `student_fees_pay_trans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_fees_trans`
--
ALTER TABLE `student_fees_trans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student_section_masts`
--
ALTER TABLE `student_section_masts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teachers_teams`
--
ALTER TABLE `teachers_teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
