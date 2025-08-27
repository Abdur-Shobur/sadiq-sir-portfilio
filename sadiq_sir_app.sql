-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2025 at 04:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sadiq_sir_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` text NOT NULL,
  `description` text NOT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `subtitle`, `description`, `image1`, `image2`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'About Me', 'Chairman, Educator & Innovator in Computer Science & Engineering', 'Professor Md Sadiq Iqbal is a passionate academic and visionary leader dedicated to advancing computer science education, research, and innovation. As Chairman of the Department of Computer Science & Engineering at Bangladesh University, he strives to empower students and researchers with cutting-edge knowledge and practical skills that drive technological advancement.', 'abouts/OVh46YoVDtAAQ5GDtAg0vUlyQFYpcSCCwSfNzVko.jpg', 'abouts/iQJ7mAAHxJC0Gpz8JspGoUhcd7wQepozSw0jEsM7.jpg', 1, '2025-08-27 08:02:15', '2025-08-27 08:02:15');

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `period` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `title`, `period`, `description`, `image`, `link`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Associate Professor and Head', '2014 - Present', 'Department of Computer Science & Engineering, Bangladesh University, Dhaka, Bangladesh (BU)', NULL, NULL, 1, '2025-08-27 08:02:16', '2025-08-27 08:02:16'),
(2, 'Assistant Professor and Head', '08/2008 – 07/2014', 'Department of Computer Science & Engineering, Bangladesh University, Dhaka, Bangladesh (BU)', NULL, NULL, 1, '2025-08-27 08:02:16', '2025-08-27 08:02:16'),
(3, 'CEO', '08/2009 - Present', 'Center For Excellence in Research, Entrepreneurship & Teaching (CERET), Bangladesh University, Dhaka, Bangladesh', NULL, 'http://localhost:3000/admin/achievement', 1, '2025-08-27 08:02:16', '2025-08-27 08:02:16'),
(4, 'Lecturer', '05/2005 - 07/2008', 'Department of Computer Science and Engineering, Bangladesh University, Dhaka, Bangladesh', NULL, 'http://localhost:3000/admin/research', 1, '2025-08-27 08:02:16', '2025-08-27 08:02:16'),
(5, 'Teaching assistant', '09/1999 - 02/2001', 'National Technical University of Ukraine, Kiev, Ukraine', NULL, '', 1, '2025-08-27 08:02:16', '2025-08-27 08:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` text NOT NULL,
  `description` text NOT NULL,
  `additional_text` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `subtitle`, `description`, `additional_text`, `image`, `is_active`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Md Sadiq Iqbal', 'Chairman, Department of Computer Science & Engineering', 'Bangladesh University', 'At the Department of Computer Science & Engineering, under the visionary leadership of Prof. Md Sadiq Iqbal, we are committed to fostering a culture of innovation, critical thinking, and academic excellence. We believe in preparing students not just as engineers, but as future leaders who will shape the technological landscape.', 'banners/F1LVdcI2asUvqQkG1gjLcbmGtuT1Ks5vjt3FU57Y.jpg', 1, 1, '2025-08-27 08:02:16', '2025-08-27 08:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text DEFAULT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `author` varchar(255) NOT NULL DEFAULT 'Admin',
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `published_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `status` enum('draft','published') NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_category_id`, `title`, `slug`, `excerpt`, `content`, `image`, `author`, `is_published`, `published_at`, `is_active`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 'The Future of AI in Education', 'the-future-of-ai-in-education', 'How Machine Learning is Transforming the Classroom', '<p>Explore how artificial intelligence is reshaping education through personalized learning, automation, and intelligent tutoring systems. This post dives into real-world applications and future possibilities.</p>', 'blogs/AgDHQVjNCVaHBVahDm5nb7urPslUzQdyxGCjbOAu.jpg', 'Admin', 1, '2025-08-27 08:02:15', 1, 'published', '2025-08-27 08:02:15', '2025-08-27 08:02:15'),
(2, 1, 'The Rise of Edge AI in Smart Devices', 'the-rise-of-edge-ai-in-smart-devices', 'How On-Device Intelligence Is Changing Everything', '<p>Edge Artificial Intelligence (Edge AI) refers to deploying AI models directly on devices without relying on cloud servers for processing. This shift allows for real-time decision-making, reduced latency, lower bandwidth consumption, and enhanced data privacy. With the growth of IoT devices and smarter applications in healthcare, manufacturing, and autonomous vehicles, Edge AI is becoming a game-changer. This blog explores how Edge AI works, its advantages, challenges, and real-world applications shaping the future of intelligent systems.</p>', 'blogs/4g0yL6uoEalV7WnjilgajczOFyDzjp08voxX53J4.jpg', 'Admin', 1, '2025-08-27 08:02:15', 1, 'published', '2025-08-27 08:02:15', '2025-08-27 08:02:15'),
(3, 5, 'Harnessing Big Data for Better Healthcare Outcomes', 'harnessing-big-data-for-better-healthcare-outcomes', 'A Look into Predictive Analytics in Modern Medicine', '<p>In today\'s digital age, healthcare providers are flooded with vast amounts of data from EHRs, wearable devices, and genomic studies. When properly harnessed, this data can improve diagnostics, forecast disease progression, and tailor treatments to individual patients. This blog delves into how predictive analytics powered by big data is transforming public health, improving efficiency, and enabling data-driven clinical decisions. It also discusses the challenges in data security, interoperability, and ethical considerations of AI in medicine.</p>', 'blogs/NxVKBp9wg9EvW7pi1ky5dCHHTyYEooP7w2xUZ2hm.jpg', 'Admin', 1, '2025-08-27 08:02:15', 1, 'published', '2025-08-27 08:02:15', '2025-08-27 08:02:15');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Thesis & Dissertation Spotlights', 'thesis-dissertation-spotlights', 'Thesis & Dissertation Spotlights', 1, '2025-08-27 08:02:15', '2025-08-27 08:02:15'),
(2, 'Conference Highlights', 'conference-highlights', 'Conference Highlights', 1, '2025-08-27 08:02:15', '2025-08-27 08:02:15'),
(3, 'Student Projects', 'student-projects', 'Student Projects', 1, '2025-08-27 08:02:15', '2025-08-27 08:02:15'),
(4, 'Research & Innovation', 'research-innovation', 'Research & Innovation', 1, '2025-08-27 08:02:15', '2025-08-27 08:02:15'),
(5, 'Faculty Insights', 'faculty-insights', 'Faculty Insights', 1, '2025-08-27 08:02:15', '2025-08-27 08:02:15');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `event_time` time DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` enum('upcoming','ongoing','completed') NOT NULL DEFAULT 'upcoming',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `image`, `event_date`, `time`, `event_time`, `location`, `is_active`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Seminar on Big Data Analytics', 'Harnessing Data for Smarter Decisions', 'events/n3TwGlE6pFvCAN2aRCqjzeYEmmZRHxuXgjl9Wkr6.jpg', '2025-09-11', '10:00 AM', '10:00:00', 'Main Conference Hall, University Campus', 1, 1, 'upcoming', '2025-08-27 08:02:16', '2025-08-27 08:02:16'),
(2, 'Workshop on Cybersecurity Trends', 'Protecting Data and Privacy in the Digital Age', 'events/Q1YmqDoQaiyAznE3Oxm4d5HredFErix4moF392wJ.jpg', '2025-09-21', '2:30 PM', '14:30:00', 'Computer Science Department, Room 205', 1, 2, 'upcoming', '2025-08-27 08:02:16', '2025-08-27 08:02:16'),
(3, 'International Conference on Artificial Intelligence', 'Exploring the Future of Intelligent Systems and Machine Learning', 'events/tHbXzEgDoZlDEnmSHiFdew3HAdecOXTOYh3YwvNk.jpg', '2025-10-11', '9:00 AM', '09:00:00', 'Grand Convention Center, Downtown', 1, 3, 'upcoming', '2025-08-27 08:02:16', '2025-08-27 08:02:16'),
(4, 'Tech Innovation Summit 2024', 'Showcasing Latest Technological Breakthroughs and Innovations', 'events/FwA8TD7TN8ypsRuRrEYBIFjzknwUJPDYpPcKmhsv.jpg', '2025-10-26', '8:30 AM', '08:30:00', 'Innovation Hub, Tech Park', 1, 4, 'upcoming', '2025-08-27 08:02:16', '2025-08-27 08:02:16'),
(5, 'Machine Learning Bootcamp', 'Hands-on Training in Advanced ML Algorithms and Applications', 'events/i5k1YXXrdgLjwmjKqnbOzfRYLfnYoissDzJqFhwH.jpg', '2025-09-26', '9:30 AM', '09:30:00', 'AI Lab, Engineering Building', 1, 5, 'upcoming', '2025-08-27 08:02:16', '2025-08-27 08:02:16');

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gallery_category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `gallery_category_id`, `title`, `description`, `image`, `link`, `is_active`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Events', 'Events', 'galleries/ESrSfKDEFypsn0hACMEe2rNJFb7a2r2hKRs0D55O.jpg', NULL, 1, 0, '2025-08-27 08:02:16', '2025-08-27 08:02:16'),
(2, 1, 'Lectures', 'Celebrations', 'galleries/yWEhP7vGbOQ5t6DwSMqakNCz3uXJBlYgTSwUZObN.jpg', NULL, 1, 2, '2025-08-27 08:02:16', '2025-08-27 08:02:16'),
(3, 1, 'Tournament', 'Events', 'galleries/6Jobx59CwFhhzKmimJ0Kb9vo5AzbBgjLxJXTvttK.jpg', NULL, 1, 3, '2025-08-27 08:02:16', '2025-08-27 08:02:16'),
(4, 2, 'Programs', 'Meetings', 'galleries/gn81tVxWBzNdTo0zE9bLWLQWi1heW2ZSGxdR6Nnz.jpg', NULL, 1, 6, '2025-08-27 08:02:16', '2025-08-27 08:02:16'),
(5, 2, 'Workshops', 'Celebrations', 'galleries/6GfjnPMEwEbst9Lw8U4C51tsYDORMIxtuJsLnYdC.jpg', NULL, 1, 5, '2025-08-27 08:02:16', '2025-08-27 08:02:16'),
(6, 2, 'Achievements', 'Celebrations', 'galleries/VMpznLJrvVYLTtDBeMU4XqWnLIVZR1d2LPxWs5Pj.jpg', NULL, 1, 7, '2025-08-27 08:02:16', '2025-08-27 08:02:16'),
(7, 3, 'Celebrations', 'Celebrations', 'galleries/ZQFJwAX1AbydeqdU0rXz1XC6rDFvfMJXinYhUzFN.jpg', NULL, 1, 8, '2025-08-27 08:02:16', '2025-08-27 08:02:16'),
(8, 3, 'Seminars', 'Celebrations', 'galleries/KJQTXUFmkkDxnVtjgEwk1QtGzo7ZA1KXkJ7f3q3G.jpg', NULL, 1, 9, '2025-08-27 08:02:16', '2025-08-27 08:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_categories`
--

CREATE TABLE `gallery_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_categories`
--

INSERT INTO `gallery_categories` (`id`, `name`, `slug`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Celebrations', 'celebrations', 'Event photos and highlights', 1, '2025-08-27 08:02:16', '2025-08-27 08:02:16'),
(2, 'Events', 'events', 'Project showcases and demonstrations', 1, '2025-08-27 08:02:16', '2025-08-27 08:02:16'),
(3, 'Lectures', 'lectures', 'Class Lectures and others', 1, '2025-08-27 08:02:16', '2025-08-27 08:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_08_27_043437_create_profiles_table', 1),
(5, '2025_08_27_043443_create_social_media_table', 1),
(6, '2025_08_27_043449_create_banners_table', 1),
(7, '2025_08_27_043454_create_abouts_table', 1),
(8, '2025_08_27_043500_create_researches_table', 1),
(9, '2025_08_27_043506_create_events_table', 1),
(10, '2025_08_27_043512_create_achievements_table', 1),
(11, '2025_08_27_043518_create_gallery_categories_table', 1),
(12, '2025_08_27_043523_create_galleries_table', 1),
(13, '2025_08_27_043528_create_blog_categories_table', 1),
(14, '2025_08_27_043533_create_blogs_table', 1),
(15, '2025_08_27_043539_create_contact_messages_table', 1),
(16, '2025_08_27_043544_create_subscribers_table', 1),
(17, '2025_08_27_045108_add_role_to_users_table', 1),
(18, '2025_08_27_045354_add_status_to_blogs_table', 1),
(19, '2025_08_27_045426_add_status_to_events_table', 1),
(20, '2025_08_27_054528_remove_order_from_categories_tables', 1),
(21, '2025_08_27_060749_modify_banners_table_make_image_nullable', 1),
(22, '2025_08_27_061052_modify_events_table_make_image_nullable', 1),
(23, '2025_08_27_061856_remove_button_fields_from_banners_table', 1),
(24, '2025_08_27_062052_modify_events_table_make_image_nullable', 1),
(25, '2025_08_27_062116_modify_events_table_make_image_nullable', 1),
(26, '2025_08_27_062225_modify_galleries_table_make_image_nullable', 1),
(27, '2025_08_27_062559_add_additional_text_to_banners_table', 1),
(28, '2025_08_27_065524_remove_icon_from_abouts_table', 1),
(29, '2025_08_27_083526_update_researches_table_remove_icon_order_add_long_description', 1),
(30, '2025_08_27_092846_remove_order_from_achievements_table', 1),
(31, '2025_08_27_094733_remove_unnecessary_columns_from_profiles_table', 1),
(32, '2025_08_27_120153_add_subtitle_to_researches_table', 1);

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
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `logo`, `email`, `phone`, `address`, `image`, `created_at`, `updated_at`) VALUES
(1, 'profiles/BbzmaHG4pJ1cgxeXULIDQyOKbzsu3cmdymwgfHqV.png', 'sadiq.iqbal@bu.edu.bd', '+8801755559312', 'Mohammadpur, Dhaka, Bangladesh', NULL, '2025-08-27 08:02:16', '2025-08-27 08:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `researches`
--

CREATE TABLE `researches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `long_description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `researches`
--

INSERT INTO `researches` (`id`, `title`, `description`, `long_description`, `image`, `link`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Optimizing Machine Learning Techniques for Early Diagnosis of Chronic Kidney Disease', 'A Comparative Study of Feature Optimization Approaches with Ensemble Modeling', '<h2><strong>Abstract</strong></h2><p>Chronic kidney disease (CKD) progressively reduces kidney function and, if undiagnosed, can lead to severe health complications or kidney failure. An early diagnosis using machine learning (ML) techniques can offer an efficient, non-invasive, and accurate solution. However, the effectiveness of ML largely depends on selecting and optimizing the right feature set. This research investigates multiple feature optimization approaches, combined with a max-voting ensemble model, to develop a highly accurate CKD diagnosis system.</p><p>The proposed ensemble model incorporates five widely used classifiers. Three types of feature optimization techniques are analyzed: feature importance, feature reduction, and feature selection. For each type, two leading techniques are examined in conjunction with the ensemble model. Among these, <strong>Linear Discriminant Analysis (LDA)</strong> — a feature selection method — achieved the highest performance, reaching <strong>99.5% accuracy</strong> using 10-fold cross-validation. This study confirms that effective feature optimization significantly enhances the performance of ML-based CKD diagnosis systems.</p><h2><strong>1. Introduction</strong></h2><p>Chronic kidney disease (CKD) is a serious medical condition that gradually impairs kidney function and may lead to total kidney failure. Various risk factors contribute to CKD, including high blood pressure, diabetes, cardiovascular diseases, age, and family history of kidney disorders. Secondary factors such as obesity, autoimmune diseases, systemic infections, urinary tract infections, and kidney damage also contribute to its onset.</p><p>Treatment for CKD varies based on the stage and condition of the patient. Common treatments include lifestyle modification, medication to control underlying issues, dialysis, and, in advanced cases, kidney transplantation. According to a 2021 report, approximately <strong>37 million people in the United States</strong> alone are affected by CKD, while <strong>10% of the global population</strong> is estimated to suffer from it. CKD accounts for <strong>around 2.4 million deaths annually</strong> worldwide.</p><p>Early diagnosis plays a crucial role in improving treatment outcomes. Traditional diagnostic methods, such as blood and urine tests, require manual intervention by medical professionals. In recent years, the integration of <strong>artificial intelligence (AI)</strong> and <strong>machine learning (ML)</strong> has opened new avenues for automated CKD diagnosis systems.</p><h3>1.1 Related Work</h3><p>Several studies have explored ML-based approaches for CKD diagnosis:</p><ol><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Polat, Mehr, and Cetin (2017)</strong> used a Support Vector Machine (SVM) classifier with filter and wrapper feature selection techniques, achieving a maximum accuracy of <strong>98.5%</strong>.</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Ghosh et al. (2020)</strong> applied a Gradient Boosting (GB) classifier with feature selection and achieved <strong>99.80% accuracy</strong>, identifying GB as the most effective model.</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Chittora et al. (2021)</strong> analyzed classifiers including SVM, AdaBoost (AB), Linear Discriminant Analysis (LDA), and GB, using SMOTE for class balancing. The Linear SVM achieved <strong>98.86%</strong>, while a Deep Neural Network (DNN) model reached <strong>99.6%</strong>.</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Deepika et al. (2020)</strong> developed a real-time application using K-Nearest Neighbors (KNN) and Naïve Bayes (NB), with KNN reaching <strong>97% accuracy</strong>.</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Gunarathne et al. (2017)</strong> proposed a Multiclass Decision Forest (MCDF) approach and reported <strong>99.1% accuracy</strong>.</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Drall et al. (2018)</strong> combined correlation and dependence-based feature selection with KNN, achieving <strong>100% accuracy</strong>.</li><li data-list=\"bullet\"><span class=\"ql-ui\" contenteditable=\"false\"></span><strong>Sharma et al. (2016)</strong> tested 12 classifiers and found the Decision Tree (DT) to be the most accurate, with <strong>98.6%</strong>.</li></ol><h3>1.2 Research Motivation</h3><p>The review of existing work highlights that while many ML-based methods achieve high accuracy, their success heavily depends on <strong>effective feature optimization</strong>. However, comprehensive comparisons of different feature optimization methods are limited.</p><h3>1.3 Research Contribution</h3><p>This study aims to fill this gap by evaluating various feature optimization techniques — categorized into <strong>feature importance</strong>, <strong>feature reduction</strong>, and <strong>feature selection</strong> — alongside a max-voting ensemble classifier. The objective is to identify the optimal technique that yields the highest diagnostic accuracy for CKD.</p>', NULL, 'https://www.sciencedirect.com/science/article/pii/S2666827022000421?via%3Dihub', 1, '2025-08-27 08:02:16', '2025-08-27 08:02:16'),
(2, 'Ensemble Learning-Based EEG Feature Analysis for Brain-Computer Interface Systems', 'A Comparative Study Using Bagging, Boosting, and Advanced Feature Extraction Techniques', '<h3><strong>Abstract</strong></h3><p>A <strong>Brain-Computer Interface (BCI)</strong> is a system that enables users to interact with external environments through their brain signals, typically captured using <strong>electroencephalogram (EEG)</strong> data. It provides a critical communication alternative for individuals affected by severe neurological disorders — including stroke, spinal cord injury (paraplegia or tetraplegia), and neurodegenerative diseases — who may be fully conscious but unable to control motor functions. These individuals are often \"locked in\" their bodies, unable to express thoughts or emotions through conventional means.</p><p><br></p><p>To address this challenge, BCIs utilize EEG signal processing and machine learning algorithms to interpret neural activity into actionable commands. This paper focuses on the application of <strong>ensemble learning methods</strong> for effective classification of EEG signals. Specifically, we explore <strong>Bagging</strong>, <strong>Adaptive Boosting (AdaBoost)</strong>, and <strong>Gradient Boosting</strong>, which are known for their strong performance in solving complex classification problems.</p><p><br></p><p>For feature extraction, we employ techniques such as <strong>Discrete Wavelet Transform (DWT)</strong>, <strong>Autoregression (AR)</strong>, <strong>Power Spectrum Density (PSD)</strong>, and <strong>Common Spatial Pattern (CSP)</strong> to enhance signal interpretability and improve classification accuracy. By combining these feature extraction methods with ensemble classifiers, this study aims to contribute toward more reliable and accurate BCI systems, offering improved interaction capabilities for patients with motor impairments.</p>', NULL, 'https://www.springerprofessional.de/en/ensemble-learning-based-eeg-feature-vector-analysis-for-brain-co/18238884', 1, '2025-08-27 08:02:16', '2025-08-27 08:02:16'),
(3, 'A Study on the is_active of  Data Handling', 'Current Scenario, Emerging Technologies, and Future Recommendations', '<h3><strong>Abstract</strong></h3><p>With the advancement of technology, the healthcare sector is witnessing rapid transformations, particularly in the management and handling of patient data. As people encounter various types of diseases at different stages of life, the need for efficient, secure, and scalable health data systems becomes increasingly critical. This research aims to explore and analyze modern technologies that support effective patient data handling and health management.</p><p>The rise in medical data has introduced several challenges, including data collection, long-term storage, accurate diagnosis, integration of data from multiple sources, real-time monitoring, secure transmission, and management of chronic health conditions such as diabetes, obesity, mental stress, and hearing loss. Addressing these challenges requires the implementation of advanced technologies such as <strong>Electronic Health Records (EHR)</strong>, <strong>cloud-based hybrid NoSQL databases</strong>, <strong>Internet of Things (IoT)</strong>, <strong>Online Transaction Processing (OLTP)</strong> systems, <strong>Hadoop with MapReduce</strong>, <strong>big data frameworks</strong>, <strong>data mining techniques</strong>, <strong>intelligent weight management systems (iWMS)</strong>, the <strong>CVOTION model</strong>, <strong>e-health</strong>, and <strong>telemedicine</strong> platforms.</p><p>The core objective of this paper is to examine these modern technologies, evaluate their efficiency in managing healthcare data, and provide a comparative analysis to identify the most effective solutions. The study concludes by recommending the most suitable technologies for enhanced, secure, and intelligent patient data handling in present and future healthcare systems.</p><h3><strong>Keywords:</strong></h3><p>EHR, Healthcare, Hadoop, NoSQL, IoT, OLTP, Diabetes, iWMS, Telemedicine, Big Data</p>', NULL, 'https://www.academia.edu/38524125/A_Study_on_the_is_active_of_Patient_Data_Handling_Current_Scenario_and_Future_Recommendation', 1, '2025-08-27 08:02:16', '2025-08-27 08:02:16'),
(4, 'Current Techniques, Architectures, and Experimental Analyses', 'Current Techniques, Architectures, and Experimental Analyses', '<h3><strong>Abstract</strong></h3><p>Class imbalance is a pervasive challenge in many real-world applications where one class (the majority) vastly outnumbers the other (the minority), often the more critical class for analysis. Over the years, numerous approaches have been proposed to address this issue, including data sampling, cost-sensitive learning, genetic programming models, bagging, boosting, and hybrid methods.</p><p>This survey paper reviews 24 key studies published between 2003 and 2019, categorizing them into single, hybrid, and ensemble architectures. It aims to provide a comprehensive understanding of the current state-of-the-art techniques used to improve classification performance on imbalanced datasets. Additionally, this paper presents a statistical analysis of various classification algorithms applied under different experimental settings and datasets, offering valuable insights into their comparative effectiveness.</p>', NULL, 'https://huggingface.co/papers/trending', 1, '2025-08-27 08:02:16', '2025-08-27 08:02:16'),
(5, 'Voltage Stability Assessment Using Neural Networks', 'A Study in Deregulated Electric Market Environments', '<h3><strong>Abstract</strong></h3><p>This project was conducted at the Electric Power Research Lab, Nanyang Technological University, Singapore, from September 2006 to November 2007. The liberalization of electric markets has led to the unbundling of large utilities into separate generation, transmission, and distribution companies, resulting in significant changes to power system operating conditions. Many power system failures stem from unfavorable dynamic responses following disturbances. Moreover, environmental and economic factors are pushing power systems to operate closer to their stability limits, making dynamic security assessment increasingly critical.</p><p>Voltage collapse is a major form of instability that occurs when systems are heavily loaded. It arises due to load responses to voltage changes, which in turn cause further voltage fluctuations. This project develops indicators based on generator-load mismatch and active/reactive power margins for online assessment of proximity to voltage instability. The approach utilizes Artificial Neural Networks (ANN) as function approximators to effectively model complex, nonlinear, and large-scale power system dynamics, which are difficult to address using traditional analytical methods.</p><p>The project also discusses the hierarchical control structure in power systems, including system controllers, plant controllers, and supervisory control and data acquisition systems (SCADA). Additionally, it explores load data analysis and forecasting techniques, incorporating self-organizing features to classify load patterns by season, weekdays, and holidays. Finally, the importance of spinning and operating reserves in maintaining system adequacy is highlighted.</p><h3><strong>Keywords:</strong></h3><p>Voltage Stability, Neural Networks, Deregulated Market, Power System Control, Dynamic Security Assessment, Load Forecasting, Spinning Reserve</p>', NULL, 'http://www.ijcee.org/papers/222-E622.pdf', 1, '2025-08-27 08:02:16', '2025-08-27 08:02:16'),
(6, 'Emerging Wireless Technologies: LTE vs. WiMAX', 'A Comparative Analysis of 4G Mobile Network Standards', '<h3><strong>Abstract</strong></h3><p>This paper presents an in-depth comparison between two emerging wireless technologies: <strong>3GPP LTE (Long Term Evolution)</strong> and <strong>IEEE 802.16 WiMAX (Worldwide Interoperability for Microwave Access)</strong>. Both technologies aim to deliver high-speed mobile data transmission, voice communication, and video services, while offering cost-effective deployment and user-friendly architectures optimized for Internet protocols.</p><p>Recognized as strong candidates for the fourth generation (4G) of mobile networks, LTE and WiMAX have distinct design philosophies and technical characteristics. This study analyzes the features, performance, and deployment scenarios of both standards to provide a comprehensive understanding of their advantages and challenges.</p>', NULL, 'http://localhost:3000/admin/research', 1, '2025-08-27 08:02:16', '2025-08-27 08:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('uegsR3DKJEFOgqVItw4pPYDmiCL5xWBVj7bY9127', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36 Edg/139.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNlVXT0JHQmxhU2E4amlldU5Ya3gzV2t3eFFONVUwRDE3S3VXc1pONCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1756304398);

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `platform` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `subscribed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', 'user', '2025-08-27 08:02:15', '$2y$12$rDX1RJMIf5EJOMYNMAPleezHj1FER8DpPAecu4b8jHN8OUSdsaWJW', 'Gs3Qevrhhp', '2025-08-27 08:02:15', '2025-08-27 08:02:15'),
(2, 'Admin User', 'admin@example.com', 'admin', NULL, '$2y$12$9poLQiAwn5kJicmKJsUKL.8AS3HLD1LZywmoqGzZuLyNw2vVOba4i', NULL, '2025-08-27 08:02:15', '2025-08-27 08:02:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_blog_category_id_foreign` (`blog_category_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_slug_unique` (`slug`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_gallery_category_id_foreign` (`gallery_category_id`);

--
-- Indexes for table `gallery_categories`
--
ALTER TABLE `gallery_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gallery_categories_slug_unique` (`slug`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `researches`
--
ALTER TABLE `researches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gallery_categories`
--
ALTER TABLE `gallery_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `researches`
--
ALTER TABLE `researches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
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
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_blog_category_id_foreign` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_gallery_category_id_foreign` FOREIGN KEY (`gallery_category_id`) REFERENCES `gallery_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
