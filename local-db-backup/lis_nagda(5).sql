-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2020 at 08:25 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `assign_subject_id_to_classes`
--

CREATE TABLE `assign_subject_id_to_classes` (
  `assign_subject_to_classes_id` int(11) DEFAULT NULL,
  `mendatory_subject_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_subject_id_to_classes`
--

INSERT INTO `assign_subject_id_to_classes` (`assign_subject_to_classes_id`, `mendatory_subject_id`) VALUES
(12, '1'),
(12, '2'),
(12, '3'),
(14, '1'),
(14, '2'),
(14, '3'),
(15, '2'),
(13, '2'),
(13, '3');

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
(12, '1', '1', '1', '1', '1', NULL, '2020-11-24 02:54:37', '2020-11-24 02:54:37'),
(13, '1', '2', '1', '1', '1', NULL, '2020-11-24 03:03:46', '2020-11-24 03:03:46'),
(14, '1', '3', '1', '1', '1', NULL, '2020-11-24 03:59:14', '2020-11-24 03:59:14'),
(15, '1', '4', '1', '1', '1', NULL, '2020-11-24 03:59:26', '2020-11-24 03:59:26');

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

-- --------------------------------------------------------

--
-- Table structure for table `bank_masts`
--

CREATE TABLE `bank_masts` (
  `id` int(2) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shrt_desc` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `cert_id` int(10) NOT NULL,
  `apply_date` date DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `cert_req_id` int(10) DEFAULT NULL,
  `stu_id` int(10) DEFAULT NULL,
  `general_conduct` varchar(10) DEFAULT NULL,
  `school_board` varchar(10) DEFAULT NULL,
  `batch_id` int(10) DEFAULT NULL,
  `cert_type` varchar(10) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `certificate_req`
--

CREATE TABLE `certificate_req` (
  `cert_req_id` int(10) NOT NULL,
  `cert_type` varchar(20) DEFAULT NULL,
  `apply_date` date DEFAULT NULL,
  `stu_id` int(10) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certificate_req`
--

INSERT INTO `certificate_req` (`cert_req_id`, `cert_type`, `apply_date`, `stu_id`, `reason`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'tc', NULL, 1, 'test', 1, '2020-11-26 03:18:39', '2020-11-26 03:18:39', '2020-11-26 08:48:39'),
(2, 'test', NULL, 1, 'dfg', 1, '2020-11-26 03:21:18', '2020-11-26 03:21:18', '2020-11-26 08:51:18'),
(3, 'test', NULL, 1, 'tset', 1, '2020-11-26 03:42:30', '2020-11-26 03:42:30', '2020-11-26 09:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `cheque_dd_trans`
--

CREATE TABLE `cheque_dd_trans` (
  `fees_pay_id` int(11) DEFAULT NULL,
  `cheque_dd_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_dd_bank` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_dd_no_of` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_dd_status` int(11) DEFAULT NULL,
  `cheque_dd_amt` decimal(9,2) DEFAULT NULL,
  `cheque_dd_date` date DEFAULT NULL,
  `payee_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `compose_sms_email`
--

CREATE TABLE `compose_sms_email` (
  `compose_sms_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `role_id` int(2) DEFAULT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `compose_sms_email`
--

INSERT INTO `compose_sms_email` (`compose_sms_id`, `receiver_id`, `role_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
('1', 18, 0, '1', NULL, '2020-10-17 04:23:35', '2020-10-17 04:23:35'),
('1', 19, 0, '1', NULL, '2020-10-17 04:23:35', '2020-10-17 04:23:35'),
('1', 20, 0, '1', NULL, '2020-10-17 04:23:35', '2020-10-17 04:23:35'),
('1', 30, 0, '1', NULL, '2020-10-17 04:23:35', '2020-10-17 04:23:35'),
('1', 31, 0, '1', NULL, '2020-10-17 04:23:35', '2020-10-17 04:23:35'),
('1', 32, 0, '1', NULL, '2020-10-17 04:23:35', '2020-10-17 04:23:35'),
('1', 33, 0, '1', NULL, '2020-10-17 04:23:35', '2020-10-17 04:23:35'),
('2', 17, 0, '1', NULL, '2020-10-17 04:24:16', '2020-10-17 04:24:16'),
('2', 21, 0, '1', NULL, '2020-10-17 04:24:16', '2020-10-17 04:24:16'),
('2', 45, 0, '1', NULL, '2020-10-17 04:24:17', '2020-10-17 04:24:17');

-- --------------------------------------------------------

--
-- Table structure for table `compose_sms_email_mast`
--

CREATE TABLE `compose_sms_email_mast` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_batches` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_to` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `compose_type` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `compose_sms_email_mast`
--

INSERT INTO `compose_sms_email_mast` (`id`, `user_id`, `course_batches`, `subject`, `body`, `attachment`, `send_to`, `compose_type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(48, 1, '1', NULL, 'sdf', NULL, 's', NULL, NULL, '2020-10-17 07:03:41', '2020-10-17 07:03:41'),
(49, 1, '1', NULL, 'sdf', NULL, 's', NULL, NULL, '2020-10-17 07:03:41', '2020-10-17 07:03:41'),
(50, 1, '1', NULL, 'sdf', NULL, 's', NULL, NULL, '2020-10-17 07:03:41', '2020-10-17 07:03:41'),
(51, 1, '1', NULL, 'sdf', NULL, 's', NULL, NULL, '2020-10-17 07:03:41', '2020-10-17 07:03:41'),
(52, 1, '1', NULL, 'sdf', NULL, 's', NULL, NULL, '2020-10-17 07:03:41', '2020-10-17 07:03:41'),
(53, 1, NULL, NULL, 'sdf', NULL, 's', NULL, NULL, '2020-10-17 07:05:42', '2020-10-17 07:05:42'),
(54, 1, NULL, NULL, 'sdf', NULL, 's', NULL, NULL, '2020-10-17 07:05:42', '2020-10-17 07:05:42'),
(55, 1, NULL, NULL, 'sdf', NULL, 's', NULL, NULL, '2020-10-17 07:05:42', '2020-10-17 07:05:42'),
(56, 1, NULL, NULL, 'ttrytry', NULL, 's', NULL, NULL, '2020-10-17 07:14:35', '2020-10-17 07:14:35'),
(57, 1, NULL, NULL, 'fhgfh', NULL, 's', NULL, NULL, '2020-10-17 07:26:26', '2020-10-17 07:26:26'),
(58, 1, NULL, NULL, 'fhgfh', NULL, 's', NULL, NULL, '2020-10-17 07:26:26', '2020-10-17 07:26:26'),
(59, 1, NULL, NULL, 'fhgfh', NULL, 's', NULL, NULL, '2020-10-17 07:26:26', '2020-10-17 07:26:26'),
(60, 1, NULL, NULL, 'fhgfh', NULL, 's', NULL, NULL, '2020-10-17 07:26:26', '2020-10-17 07:26:26'),
(61, 1, NULL, NULL, 'fhgfh', NULL, 's', NULL, NULL, '2020-10-17 07:26:26', '2020-10-17 07:26:26'),
(62, 1, NULL, NULL, 'fhgfh', NULL, 's', NULL, NULL, '2020-10-17 07:26:26', '2020-10-17 07:26:26'),
(63, 1, NULL, NULL, 'fhgfh', NULL, 's', NULL, NULL, '2020-10-17 07:26:27', '2020-10-17 07:26:27'),
(64, 1, NULL, NULL, 'fhgfh', NULL, 's', NULL, NULL, '2020-10-17 07:26:27', '2020-10-17 07:26:27'),
(65, 1, NULL, NULL, 'fhgfh', NULL, 's', NULL, NULL, '2020-10-17 07:26:27', '2020-10-17 07:26:27'),
(66, 1, NULL, NULL, 'fhgfh', NULL, 's', NULL, NULL, '2020-10-17 07:26:27', '2020-10-17 07:26:27'),
(67, 1, NULL, NULL, 'fhgfh', NULL, 's', NULL, NULL, '2020-10-17 07:26:27', '2020-10-17 07:26:27'),
(68, 1, NULL, NULL, 'fhgfh', NULL, 's', NULL, NULL, '2020-10-17 07:26:27', '2020-10-17 07:26:27'),
(69, 1, NULL, NULL, 'fhgfh', NULL, 's', NULL, NULL, '2020-10-17 07:26:27', '2020-10-17 07:26:27'),
(70, 1, '2', NULL, 'xgfg', NULL, 's', NULL, NULL, '2020-10-17 07:49:49', '2020-10-17 07:49:49'),
(71, 1, '2', NULL, 'xgfgdfgdgfdg', NULL, 's', NULL, NULL, '2020-10-17 07:52:24', '2020-10-17 07:52:24'),
(72, 1, '2', NULL, 'sdfds', NULL, 's', NULL, NULL, '2020-10-17 07:52:50', '2020-10-17 07:52:50'),
(73, 1, '2', NULL, 'fghfgh', NULL, 's', NULL, NULL, '2020-10-17 07:54:37', '2020-10-17 07:54:37'),
(74, 1, '1', NULL, 'asdsad', NULL, 's', NULL, NULL, '2020-10-17 07:55:19', '2020-10-17 07:55:19'),
(75, 1, '1', NULL, 'asdsad', NULL, 's', NULL, NULL, '2020-10-17 07:55:19', '2020-10-17 07:55:19'),
(76, 1, '1', NULL, 'asdsad', NULL, 's', NULL, NULL, '2020-10-17 07:55:19', '2020-10-17 07:55:19'),
(77, 1, '1', NULL, 'asdsad', NULL, 's', NULL, NULL, '2020-10-17 07:55:19', '2020-10-17 07:55:19'),
(78, 1, '1', NULL, 'asdsad', NULL, 's', NULL, NULL, '2020-10-17 07:55:19', '2020-10-17 07:55:19'),
(79, 1, '1', NULL, 'asdsad', NULL, 's', NULL, NULL, '2020-10-17 07:55:19', '2020-10-17 07:55:19'),
(80, 1, '1', NULL, 'asdsad', NULL, 's', NULL, NULL, '2020-10-17 07:55:19', '2020-10-17 07:55:19'),
(81, 1, '1', NULL, 'asdsad', NULL, 's', NULL, NULL, '2020-10-17 07:55:19', '2020-10-17 07:55:19'),
(82, 1, '1', NULL, 'asdsad', NULL, 's', NULL, NULL, '2020-10-17 07:55:19', '2020-10-17 07:55:19'),
(83, 1, '1', NULL, 'asdsad', NULL, 's', NULL, NULL, '2020-10-17 07:55:19', '2020-10-17 07:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `concession_apply_trans`
--

CREATE TABLE `concession_apply_trans` (
  `concession_apply_id` int(11) UNSIGNED NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `fees_head_id` int(11) DEFAULT NULL,
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
  `concession_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` int(1) DEFAULT NULL,
  `consession_amnt` decimal(9,2) DEFAULT NULL,
  `conss_desc` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `concession_student_trans`
--

CREATE TABLE `concession_student_trans` (
  `stu_id` int(11) DEFAULT NULL,
  `concession_apply_id` int(11) DEFAULT NULL,
  `consession_amnt` decimal(9,2) DEFAULT NULL
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
(1, 1, 1, '2020-11-04'),
(1, 1, 3, '2020-11-05'),
(1, 2, 3, '2020-11-04'),
(1, 2, 2, '2020-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `exam_time_table_mast`
--

CREATE TABLE `exam_time_table_mast` (
  `time_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `exam_from_time` varchar(15) DEFAULT NULL,
  `exam_to_time` varchar(15) DEFAULT NULL,
  `lunch_from_time` varchar(9) DEFAULT NULL,
  `lunch_to_time` varchar(9) DEFAULT NULL,
  `reciept_head_id` int(2) DEFAULT NULL,
  `reporting_time` varchar(10) DEFAULT NULL,
  `deprature_time` varchar(10) DEFAULT NULL,
  `class_from` int(11) DEFAULT NULL,
  `class_to` int(11) DEFAULT NULL,
  `start_dt` date DEFAULT NULL,
  `end_dt` date DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `status` varchar(1) DEFAULT 'A',
  `nod` int(1) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exam_time_table_mast`
--

INSERT INTO `exam_time_table_mast` (`time_id`, `name`, `exam_from_time`, `exam_to_time`, `lunch_from_time`, `lunch_to_time`, `reciept_head_id`, `reporting_time`, `deprature_time`, `class_from`, `class_to`, `start_dt`, `end_dt`, `batch_id`, `status`, `nod`, `remark`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test', '01:00 AM', '02:00 AM', '12:00 AM', '01:30 AM', NULL, '12:00 AM', '01:30 AM', 1, 2, '2020-11-17', '2020-12-02', NULL, 'A', NULL, 'sd', '2020-11-25 00:19:24', '2020-11-25 03:25:40', NULL);

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
  `fees_head_id` int(3) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `head_amt` decimal(9,2) DEFAULT NULL,
  `headtype` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `head_sequence_order` int(3) DEFAULT NULL,
  `refundable` tinyint(1) NOT NULL DEFAULT 0,
  `is_installable` tinyint(1) NOT NULL DEFAULT 0,
  `applicable_on` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees_head_trans`
--

CREATE TABLE `fees_head_trans` (
  `fees_id` int(11) DEFAULT NULL,
  `fees_head_id` int(11) DEFAULT NULL,
  `head_amt` decimal(9,2) DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees_instalments`
--

CREATE TABLE `fees_instalments` (
  `start_dt` date DEFAULT NULL,
  `end_dt` date DEFAULT NULL,
  `instalment_amt` decimal(9,2) DEFAULT NULL,
  `fees_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees_masts`
--

CREATE TABLE `fees_masts` (
  `fees_id` int(11) UNSIGNED NOT NULL,
  `fees_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fees_amt` decimal(9,2) DEFAULT NULL,
  `receipt_head_id` int(2) DEFAULT NULL,
  `currency_code` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_instalment` int(2) DEFAULT NULL,
  `courseselection` int(1) DEFAULT NULL,
  `discount` decimal(9,2) DEFAULT NULL,
  `refundable` tinyint(1) NOT NULL DEFAULT 0,
  `is_fees_student_assign` tinyint(1) NOT NULL DEFAULT 0,
  `gender` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cast_category` int(2) DEFAULT NULL,
  `rte_status` int(1) DEFAULT NULL,
  `feesfor` int(1) DEFAULT NULL,
  `course_batches` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fine_types`
--

CREATE TABLE `fine_types` (
  `fine_type_id` int(11) NOT NULL,
  `fees_head_id` int(10) DEFAULT NULL,
  `fine_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fine` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fine_day` int(4) DEFAULT NULL,
  `fine_amt` decimal(9,2) DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '1', 'test', '1', '2020-11-24 05:34:09', '2020-11-24 05:34:09');

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

-- --------------------------------------------------------

--
-- Table structure for table `guardian_designations`
--

CREATE TABLE `guardian_designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `guardian_designations_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(67, '2020_11_09_061923_create_fees_head_trans_table', 49);

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
  `receipt_head_id` int(2) UNSIGNED NOT NULL,
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
(3, 2, 'App\\User'),
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
(1, '1', '1', '1', '1', NULL, '1', NULL, '2020-11-23 12:13:31', '2020-11-23 12:13:31'),
(2, '1', '2', '1', '1', NULL, '1', NULL, '2020-11-23 12:13:44', '2020-11-23 12:13:44'),
(3, '1', '3', '1', '1', NULL, '1', NULL, '2020-11-23 13:09:56', '2020-11-23 13:09:56'),
(4, '1', '4', '1', '1', NULL, '1', NULL, '2020-11-23 13:10:03', '2020-11-23 13:10:03'),
(5, '1', '5', '1', '1', NULL, '1', NULL, '2020-11-23 13:10:09', '2020-11-23 13:10:09'),
(6, '1', '6', '1', '1', NULL, '1', NULL, '2020-11-23 13:10:14', '2020-11-23 13:10:14'),
(7, '1', '7', '1', '1', NULL, '1', NULL, '2020-11-23 13:10:19', '2020-11-23 13:10:19'),
(8, '1', '8', '1', '1', NULL, '1', NULL, '2020-11-23 13:10:25', '2020-11-23 13:10:25'),
(9, '1', '9', '1', '1', NULL, '1', NULL, '2020-11-23 13:10:30', '2020-11-23 13:10:30'),
(10, '1', '10', '1', '1', NULL, '1', NULL, '2020-11-23 13:10:36', '2020-11-23 13:10:36'),
(11, '1', '11', '1', '1', NULL, '1', NULL, '2020-11-23 13:10:52', '2020-11-23 13:10:52'),
(12, '1', '12', '1', '1', NULL, '1', NULL, '2020-11-23 13:10:58', '2020-11-23 13:10:58'),
(13, '1', '13', '1', '1', NULL, '1', NULL, '2020-11-23 13:11:04', '2020-11-23 13:11:04'),
(14, '1', '14', '1', '2', NULL, '1', NULL, '2020-11-23 13:11:36', '2020-11-23 13:11:36'),
(15, '1', '14', '1', '3', NULL, '1', NULL, '2020-11-23 13:11:36', '2020-11-23 13:11:36'),
(16, '1', '14', '1', '4', NULL, '1', NULL, '2020-11-23 13:11:36', '2020-11-23 13:11:36');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `mobile1` varchar(12) DEFAULT NULL,
  `mobile2` varchar(12) DEFAULT NULL,
  `tel1` varchar(15) DEFAULT NULL,
  `tel2` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city_name` varchar(50) DEFAULT NULL,
  `state_name` varchar(50) DEFAULT NULL,
  `country_name` varchar(50) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `school_code` varchar(50) DEFAULT NULL,
  `cbse_aff_no` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `mbse_aff_no` varchar(255) DEFAULT NULL,
  `staus` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `user_id`, `title`, `logo`, `email`, `website`, `mobile1`, `mobile2`, `tel1`, `tel2`, `address`, `city_name`, `state_name`, `country_name`, `zip_code`, `school_code`, `cbse_aff_no`, `description`, `mbse_aff_no`, `staus`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 1, 'Lakshya International School, Nagda', 'admin/settings1/settings//tmp/phpwRLaMV_1606308091.logo.png', 'kishan@gmail.com', 'http://lis.laxyo.org/', '8109289354', '8109289354', '8109289354', '8109289354', 'indore india', 'indore', 'mp', 'India', '23424', '324324', '3454355335', 'tes', 'test', 1, '2020-11-25 07:11:31', '2020-11-26 07:10:49', '2020-11-25 12:41:31');

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
(1, 1, 'INDIAN', NULL, '2020-09-21 03:07:08', '2020-11-23 13:14:44'),
(2, 1, 'USA', NULL, '2020-09-21 04:33:43', '2020-11-23 13:14:38');

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
(1, '1', '1', NULL, NULL, NULL, NULL, '2020-11-26 01:45:58', '2020-11-26 01:45:58');

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
(1, '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-26 01:45:57', '2020-11-26 01:45:57');

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
  `prev_school` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_of_prev_school` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prev_school_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acadmic_city` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acadmic_state` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acadmic_pin` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acadmic_country` varchar(57) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acadmic_cast_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acadmic_attendance_reg_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acadmic_remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_country` varchar(57) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_state` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_city` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_zip_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_country` varchar(57) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_state` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_city` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `students_masts` (`id`, `user_id`, `photo`, `std_class_id`, `batch_id`, `admision_no`, `section_id`, `f_name`, `m_name`, `l_name`, `s_mobile`, `dob`, `birth_place`, `passout_date`, `dropout_date`, `forward_date`, `email`, `gender`, `reservation_class_id`, `religion_id`, `blood_group_id`, `spec_ailment`, `age`, `nationality_id`, `taluka`, `language_id`, `other_language`, `cast`, `s_ssmid`, `f_ssmid`, `aadhar_card`, `teacher_ward`, `cbsc_reg`, `addm_date`, `enroll_no`, `roll_no`, `username`, `password`, `prev_school`, `year_of_prev_school`, `prev_school_address`, `acadmic_city`, `acadmic_state`, `acadmic_pin`, `acadmic_country`, `acadmic_cast_id`, `acadmic_attendance_reg_no`, `acadmic_remark`, `p_address`, `p_country`, `p_state`, `p_city`, `p_zip_code`, `l_address`, `l_country`, `l_state`, `l_city`, `l_zip_code`, `bank_name`, `bank_branch`, `account_name`, `account_no`, `ifsc_code`, `status`, `user_status`, `admission_status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, '1', '1', '435', '1', 'kishan', NULL, 'k', '2342342', '2020-11-24', 'sf', NULL, NULL, NULL, 'kishan@gmail.com', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2020-11-19', NULL, '34534', 'kishan', '$2y$10$ZNvaJUr2CMkb0l8hVEH7BuoVqhu8q9EbgVcR9IDOsqfyFeDdj2cUy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dfgfd', NULL, NULL, NULL, '111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'R', 1, NULL, NULL, '2020-11-26 01:45:57', '2020-11-26 01:45:57');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_batches`
--

INSERT INTO `student_batches` (`id`, `user_id`, `batch_from`, `batch_to`, `batch_name`, `created_at`, `updated_at`) VALUES
(1, 1, '06/01/2020', '03/15/2021', '2020-2021', '2020-11-23 11:43:59', '2020-11-23 11:43:59'),
(2, 1, '06/06/2019', '03/18/2020', '2019-2020', '2020-11-23 11:45:11', '2020-11-23 11:45:11'),
(3, 1, '06/01/2018', '02/17/2019', '2018-2019', '2020-11-23 12:52:23', '2020-11-23 12:56:21'),
(4, 1, '11/10/2020', '11/24/2020', '2020-2020', '2020-11-23 12:59:19', '2020-11-23 12:59:19'),
(5, 1, '06/06/2017', '03/21/2018', '2017-2018', '2020-11-23 13:02:26', '2020-11-23 13:02:26');

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
(1, 1, 'Nursery', 'nursery', '2020-11-23 10:29:25', '2020-11-23 11:40:41'),
(2, 1, 'KG-I', 'Kindergarten-I', '2020-11-23 10:49:44', '2020-11-23 10:50:24'),
(3, 1, 'KG-II', 'Kindergarten-II', '2020-11-23 10:50:18', '2020-11-23 10:50:18'),
(4, 1, '1st', 'First Class', '2020-11-23 10:51:59', '2020-11-23 10:51:59'),
(5, 1, '2nd', 'Second Class', '2020-11-23 10:52:09', '2020-11-23 10:52:09'),
(6, 1, '3rd', 'Third Class', '2020-11-23 10:52:19', '2020-11-23 10:52:19'),
(7, 1, '4th', 'Fourth Class', '2020-11-23 10:52:28', '2020-11-23 10:52:28'),
(8, 1, '5th', 'Fifth Class', '2020-11-23 10:52:45', '2020-11-23 10:52:45'),
(9, 1, '6th', 'Sixth Class', '2020-11-23 10:52:55', '2020-11-23 10:52:55'),
(10, 1, '7th', 'Seventh Class', '2020-11-23 10:53:06', '2020-11-23 10:53:06'),
(11, 1, '8th', 'Eight  Class', '2020-11-23 10:53:43', '2020-11-23 10:53:43'),
(12, 1, '9th', 'Nineth Class', '2020-11-23 10:54:12', '2020-11-23 10:54:12'),
(13, 1, '10th', 'Tenth Class', '2020-11-23 10:54:32', '2020-11-23 10:54:32'),
(14, 1, '11th', 'Eleventh Class', '2020-11-23 10:55:16', '2020-11-23 10:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `student_fees_pay_trans`
--

CREATE TABLE `student_fees_pay_trans` (
  `fees_pay_id` int(11) UNSIGNED NOT NULL,
  `stu_id` int(11) DEFAULT NULL,
  `stud_fees_id` int(11) DEFAULT NULL,
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
  `date` date DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fees_month` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'P',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_fees_trans`
--

CREATE TABLE `student_fees_trans` (
  `stud_fees_id` int(11) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `fees_id` int(11) DEFAULT NULL,
  `fees_due_amnt` decimal(9,2) DEFAULT NULL,
  `fees_amnt` decimal(9,2) DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 1, 'A', NULL, 'Common for all', NULL, '2020-11-23 12:11:20', '2020-11-23 13:03:44'),
(2, 1, 'Sci-Math', NULL, 'Science Math', NULL, '2020-11-23 12:11:53', '2020-11-23 12:11:53'),
(3, 1, 'Sci-Bio', NULL, 'Science Biology', NULL, '2020-11-23 12:12:13', '2020-11-23 12:12:13'),
(4, 1, 'Commerce', NULL, 'Commerce', NULL, '2020-11-23 12:12:28', '2020-11-23 12:12:28');

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
(1, '1', 'Math', '001', '1', '1', NULL, '2020-11-24 01:25:54', '2020-11-24 02:54:09'),
(2, '1', 'Science', '002', '2', '1', NULL, '2020-11-24 01:26:51', '2020-11-24 01:26:51'),
(3, '1', 'English', '003', '03', '1', NULL, '2020-11-24 01:27:29', '2020-11-24 01:27:29');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
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
  `dob` date DEFAULT NULL,
  `message_sent` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `compose_message_sent` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `student_id`, `deleted_at`, `status`, `parent_id`, `user_flag`, `mobile_no`, `photo`, `alternative_mo_no`, `country_id`, `state_id`, `city_id`, `zip_code`, `dob`, `message_sent`, `compose_message_sent`) VALUES
(1, 'lisadmin', 'LIS ADMIN', 'lisadmin@gmail.com', NULL, '$2y$10$Aa9cH8xt/YwKVjxADMDW6uYnJrLrxP00gKsvm/FrKhlPvROSWomqO', NULL, '2020-11-23 08:52:30', '2020-11-23 08:52:30', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0'),
(2, 'kishan', 'kishan k', 'kishan@gmail.com', NULL, '$2y$10$0suNw9mho4sMdRK.Fi8p2Ot4/DgdYnrEb4mnYdcLKica9/H9a.Ibq', 'j7mIPHu9K3CrDwmLPopErarvxL1vCQoqjtV1Y7KiEO1y2WB2XvMDlZ9Oktnt', '2020-11-26 01:45:57', '2020-11-26 01:45:57', '1', NULL, 1, NULL, 'S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0');

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
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`cert_id`);

--
-- Indexes for table `certificate_req`
--
ALTER TABLE `certificate_req`
  ADD PRIMARY KEY (`cert_req_id`);

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
-- Indexes for table `compose_sms_email_mast`
--
ALTER TABLE `compose_sms_email_mast`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `concession_apply_trans`
--
ALTER TABLE `concession_apply_trans`
  ADD PRIMARY KEY (`concession_apply_id`);

--
-- Indexes for table `concession_masts`
--
ALTER TABLE `concession_masts`
  ADD PRIMARY KEY (`concession_id`);

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
  ADD PRIMARY KEY (`fees_head_id`);

--
-- Indexes for table `fees_masts`
--
ALTER TABLE `fees_masts`
  ADD PRIMARY KEY (`fees_id`);

--
-- Indexes for table `fine_types`
--
ALTER TABLE `fine_types`
  ADD PRIMARY KEY (`fine_type_id`);

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
  ADD PRIMARY KEY (`receipt_head_id`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_id`);

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
-- Indexes for table `std_nationalities`
--
ALTER TABLE `std_nationalities`
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
  ADD PRIMARY KEY (`fees_pay_id`);

--
-- Indexes for table `student_fees_trans`
--
ALTER TABLE `student_fees_trans`
  ADD PRIMARY KEY (`stud_fees_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admission_inquiry_forms`
--
ALTER TABLE `admission_inquiry_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_student_to_sections`
--
ALTER TABLE `assign_student_to_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_subject_group_students`
--
ALTER TABLE `assign_subject_group_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_subject_to_classes`
--
ALTER TABLE `assign_subject_to_classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `assign_subject_to_teachers`
--
ALTER TABLE `assign_subject_to_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_sub_id_to_teachers`
--
ALTER TABLE `assign_sub_id_to_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_masts`
--
ALTER TABLE `bank_masts`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `cert_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificate_req`
--
ALTER TABLE `certificate_req`
  MODIFY `cert_req_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `city_masts`
--
ALTER TABLE `city_masts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `class_batch_section_group_masts`
--
ALTER TABLE `class_batch_section_group_masts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compose_sms_email_mast`
--
ALTER TABLE `compose_sms_email_mast`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `concession_apply_trans`
--
ALTER TABLE `concession_apply_trans`
  MODIFY `concession_apply_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `concession_masts`
--
ALTER TABLE `concession_masts`
  MODIFY `concession_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_head_masts`
--
ALTER TABLE `fees_head_masts`
  MODIFY `fees_head_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_masts`
--
ALTER TABLE `fees_masts`
  MODIFY `fees_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fine_types`
--
ALTER TABLE `fine_types`
  MODIFY `fine_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_folders`
--
ALTER TABLE `gallery_folders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guardian_designations`
--
ALTER TABLE `guardian_designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `id_cards`
--
ALTER TABLE `id_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `mothetongue_masts`
--
ALTER TABLE `mothetongue_masts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice_circulars`
--
ALTER TABLE `notice_circulars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice_class_batch_id`
--
ALTER TABLE `notice_class_batch_id`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice_faculties`
--
ALTER TABLE `notice_faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice_students`
--
ALTER TABLE `notice_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `receipt_head_id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `section_manages`
--
ALTER TABLE `section_manages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `setting_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff_attendances`
--
ALTER TABLE `staff_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state_masts`
--
ALTER TABLE `state_masts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `std_nationalities`
--
ALTER TABLE `std_nationalities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studenst_docs`
--
ALTER TABLE `studenst_docs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students_guardiant_masts`
--
ALTER TABLE `students_guardiant_masts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students_masts`
--
ALTER TABLE `students_masts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_attendances`
--
ALTER TABLE `student_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_batches`
--
ALTER TABLE `student_batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student_fees_pay_trans`
--
ALTER TABLE `student_fees_pay_trans`
  MODIFY `fees_pay_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_fees_trans`
--
ALTER TABLE `student_fees_trans`
  MODIFY `stud_fees_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_section_masts`
--
ALTER TABLE `student_section_masts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachers_teams`
--
ALTER TABLE `teachers_teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
