-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: turntable.proxy.rlwy.net:27869
-- Generation Time: Feb 11, 2026 at 08:47 AM
-- Server version: 9.4.0
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `afadzute_afad`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `description`) VALUES
(1, 'AFAD is a women led organization working in norther Bangladesh since 1999. AFAD is registered (No. 2443) with NGO Affair’s Bureau (NGOAB) of Prime Minister’s Office of People\'s Republic of Government of Bangladesh, and it got the registration (No. DWA/Kuri/Reg/29/99 ) from the Directorate of Women’s Affairs (DWA) in 1999. AFAD also has the registration from the Directorate of Youth Development, Govt. of Bangladesh.\r\n  Testing by robiul'),
(3, 'AFAD is a women led organization working in norther Bangladesh since 1999. AFAD is registered (No. 2443) with NGO Affair’s Bureau (NGOAB) of Prime Minister’s Office of People\'s Republic of Government of Bangladesh, and it got the registration (No. DWA/Kuri/Reg/29/99 ) from the Directorate of Women’s Affairs (DWA) in 1999. AFAD also has the registration from the Directorate of Youth Development, Govt. of Bangladesh.');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int NOT NULL,
  `main_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fav_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `main_logo`, `fav_icon`, `facebook`, `twitter`, `instagram`, `youtube`) VALUES
(1, '771129main_logo.jpg', '47014fav.png', 'https://www.facebook.com/afad.kurigram.1994', 'https://twitter.com/sayda_yesmin', 'http://www.instagram.com', 'http://www.youtube.com'),
(2, '86562logo.png', '47014fav.png', 'https://www.facebook.com/afad.kurigram.1994', 'https://twitter.com/sayda_yesmin', 'http://www.instagram.com', 'http://www.youtube.com');

-- --------------------------------------------------------

--
-- Table structure for table `chief_executive_message`
--

CREATE TABLE `chief_executive_message` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chief_executive_message`
--

INSERT INTO `chief_executive_message` (`id`, `title`, `message`, `name`, `designation`, `photo`, `signature`, `created_at`, `updated_at`) VALUES
(2, 'Schedule', '9-10 AM - Opening\r\n10-11 Am - Closing', 'Shamim mojumder', 'Software Developer', '72717chief.jpg', '', NULL, NULL),
(3, 'National Day', '12 February is our National day', 'Ismail', 'Software Developer', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `type` enum('head_office','branch','person') COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `type`, `title`, `address`, `name`, `mobile`, `mobile2`, `email`, `email2`, `skype`, `whatsapp`, `twitter`, `status`, `created_at`, `updated_at`) VALUES
(1, 'head_office', NULL, 'R.K Road Khalilganj Bazar, Kurigram', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2026-02-06 16:04:54', '2026-02-06 16:04:54'),
(2, 'person', 'Chief Executive', NULL, 'Sayda Yesmin', '01719-691409', '01324-194889', 'yesminafad@gmail.com', 'yesminafad@yahoo.com', 'yesminafad@hotmail.com', '01719691409', NULL, 'active', '2026-02-06 16:07:56', '2026-02-06 16:07:56'),
(3, 'person', 'Admin Officer', NULL, 'Md Al Muzahid', '01713-202608', NULL, 'muzahid.afad@gmail.com', NULL, NULL, '01713-202608', NULL, 'active', '2026-02-06 16:17:47', '2026-02-06 16:17:47');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'IT', 'IT jobs', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` bigint UNSIGNED NOT NULL,
  `donor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donor_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method_id` bigint UNSIGNED NOT NULL,
  `status` enum('pending','verified','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `admin_note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `donor_name`, `donor_phone`, `transaction_id`, `amount`, `payment_method_id`, `status`, `admin_note`, `created_at`, `updated_at`) VALUES
(1, 'Mofassel Alam Maruf', '01997900840', '34HUHIF8472X', 10000.00, 2, 'pending', NULL, '2026-02-06 07:12:16', '2026-02-06 07:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `executive_committee`
--

CREATE TABLE `executive_committee` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `executive_committee`
--

INSERT INTO `executive_committee` (`id`, `name`, `designation`, `photo`, `bio`, `facebook`, `twitter`, `instagram`, `youtube`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Ismail', 'Student', '73539executive.jpg', '12 tarikh saradin, daripallay vote din', NULL, NULL, NULL, NULL, 2, NULL, NULL),
(2, 'Shamim, mojumder', 'Software Developer', '59295executive.jpg', NULL, 'https://www.facebook.com/share/p/1817a4TAU9/', NULL, 'https://www.instagram.com/imshamimmozumder?fbclid=IwZXh0bgNhZW0CMTAAYnJpZBExd2ZJTmt3ajVGdFZLQXU5V3NydGMGYXBwX2lkEDIyMjAzOTE3ODgyMDA4OTIAAR5He4Hqt0EUYBmQkN1eAePy-JWdoPOJaTjU_lI_bAaVlqMrZMSq5CUMoi_z3g_aem_bSFfupaVNL7dT3nFt4IS2w', 'https://youtu.be/WsllF4THOYk?si=1WwNcSdRlYwu6y3-', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` bigint UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `category`, `order`, `created_at`, `updated_at`) VALUES
(4, '1. What is AFAD?', 'AFAD (Association for Alternative Development) is a non-profit organization working to empower marginalized communities, especially women and youth, through education, social development programs, and sustainable initiatives.', 'General', 1, NULL, NULL),
(5, '2. Who can participate in AFAD programs?', 'Anyone from disadvantaged or underprivileged communities can participate. AFAD focuses mainly on women, youth, and rural populations seeking skills, education, or community support.', 'General', 2, NULL, NULL),
(6, '3. How can I volunteer with AFAD?', 'You can apply through the website’s volunteer registration form. AFAD welcomes individuals who want to contribute their time, skills, or expertise to community development initiatives.', 'General', 3, NULL, NULL),
(7, '4. How can I donate to AFAD?', 'Donations can be made through online payment gateways, bank transfers, or official fundraising campaigns listed on the website. Every contribution supports community empowerment programs.', 'General', 4, NULL, NULL),
(8, '5. Where does AFAD operate?', 'AFAD mainly operates in northern Bangladesh, working closely with rural and marginalized communities to promote education, human rights, and sustainable development.', 'General', 5, NULL, NULL),
(9, '6. Are AFAD programs free?', 'Most programs are free or highly subsidized to ensure accessibility for underprivileged individuals who need support the most.', 'General', 6, NULL, NULL),
(10, '7. How can I stay updated with AFAD activities?', 'You can follow AFAD on social media, subscribe to newsletters, or regularly check the website for updates on events, projects, and community programs.', 'General', 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `focus_areas`
--

CREATE TABLE `focus_areas` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `focus_areas`
--

INSERT INTO `focus_areas` (`id`, `title`, `description`, `icon_path`, `image_path`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'women impowerment', 'edrftgyhunjmkl,;.vbnm ,', 'focus_areas/icons/eyLRKq0y1IpMoKqwdffabSp1t4pypEg8foglHT4e.png', 'focus_areas/EtkHduu8cYdHiy1TrmlHmhXaXIEeLyCz2SKUmCMm.jpg', 1, 1, '2026-02-06 15:09:49', '2026-02-06 19:17:39'),
(2, 'student wellfare', 'tyghbudnjkxsl,a \r\n\r\n\r\nvgybhnjkml,;.', 'focus_areas/icons/sIj5EtbxM0mI29kNTMWLA006MjRrGa8KSWi0yepm.png', 'focus_areas/LOuv6vZZQFsjJ0LZ1gPHIzTXqXYk9YraBBn5OP0L.png', 2, 1, '2026-02-06 15:11:54', '2026-02-06 19:25:40'),
(3, 'sedrcftgvybhnjkml,', 'sedrftgybhnjkm,l.', 'focus_areas/icons/bAxnkztDLg0M2I16eUyiOzg05HaTSnuQqJLseHJ7.png', 'focus_areas/JXWoycDCY41dAElMn51rmXtYY8CbWbxIXk3NmfdW.png', 3, 1, '2026-02-06 15:19:44', '2026-02-06 19:54:16'),
(4, 'hello test', 'hello hello test test test', NULL, 'focus_areas/6Eq40tKmh6s52e4WXeViMpD1wG9r6YUSzG5DsUNT.jpg', 0, 1, '2026-02-06 15:35:44', '2026-02-06 15:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `description`, `image`) VALUES
(3, 'jane alam', 'asdf  asdf', '89222gallery.jpg'),
(4, 'All the Lorem Ipsum', 'All the Lorem Ipsum', '11857gallery.jpg'),
(5, 'Lorem Ipsum', 'Lorem Ipsum', '53976gallery.jpg'),
(6, 'akjdkjf', 'ajdflkjf', '20021gallery.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `impact`
--

CREATE TABLE `impact` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metric_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metric_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` int DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `impact`
--

INSERT INTO `impact` (`id`, `title`, `metric_value`, `metric_unit`, `description`, `icon`, `year`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Lives Impacted', '500+', 'people', 'Hello people', 'bx bx-group', 2026, 0, '2026-02-05 19:12:39', '2026-02-05 19:12:39');

-- --------------------------------------------------------

--
-- Table structure for table `invoked`
--

CREATE TABLE `invoked` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_type` enum('Full-time','Part-time','Volunteer','Internship') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsibilities` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirements` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_title`, `department_id`, `location`, `job_type`, `description`, `responsibilities`, `requirements`, `deadline`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Programer', 1, 'Dhaka', 'Full-time', 'IT jobs', 'dgd\r\njg', 'hggf', '2026-02-28', 'active', '2026-02-07 18:29:58', '2026-02-07 18:29:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint UNSIGNED NOT NULL,
  `job_id` bigint UNSIGNED NOT NULL,
  `applicant_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_letter` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','reviewed','shortlisted','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `admin_notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `latest_news`
--

CREATE TABLE `latest_news` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `latest_news`
--

INSERT INTO `latest_news` (`id`, `title`, `description`, `image`) VALUES
(6, 'Corona Virus Detected', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '39728news.jpg'),
(7, 'Lorem Ipsum which looks reasonable', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '78592news.jpg'),
(8, 'This book is a treatise on the theory', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '91023news.jpg'),
(9, '“Empower Women for Climate-Resilient Societies (Phase-2)”.', 'Association For Alternative Development (AFAD)\r\nRK Road Khaliulgnaj Kurigram\r\n                                                Short Overview of the Programme\r\n\r\nThis is a Sub-district (Upazila) Level Coordination Meeting under the project titled “Empower Women for Climate-Resilient Societies (Phase-2)”.\r\n•	Date & Venue: June 02, 2025 | Upazila Parishad Hall Room, Kurigram\r\n•	Organized by: Assocition For Alternative Development(AFAD)\r\n•	Supported by: UN Women & Manusher Jonno Foundation (MJF)\r\nObjectives:\r\n1.	Strengthen women’s leadership and capacity in addressing climate change risks.\r\n2.	Enhance coordination among local government, administration, law enforcement, and civil society.\r\n3.	Identify actions to ensure women’s participation in climate-responsive planning and budgeting.\r\nParticipants Included:\r\n•	Officials from Upazila Parishad and administration\r\n•	Local police officers\r\n•	Union Parishad chairpersons and members\r\n•	Local women leaders\r\n•	Representatives from civil society organizations\r\nKey Discussion Points:\r\n•	Women-centered disaster preparedness and climate adaptation strategies\r\n•	Support for climate-resilient alternative livelihoods for women\r\n•	Development of joint action plans to ensure accountability and gender-responsive budgeting at the local level\r\nThe meeting aimed to review progress under Phase-2 of the project and gather inputs from stakeholders for effective implementation of future activities.', '57201news.jpeg'),
(10, 'Community engagement with women', 'While participation of L/NAs in formal IASC coordination structures is important to ensure linkages with international actors, it is just as important to have peer-led spaces for collaboration with and between L/NAs, to ensure they learn from each other especially as these networks will be present in a country long after international actors depart. The ToGETHER program, running in numerous countries, creates opportunities to promote local humanitarian actors and advocate for their leadership role in community response. In Bangladesh, the Association for Alternative Development (AFAD), a women-led NGO, supports vulnerable communities, focusing on women and youth. The ToGETHER program has enabled AFAD to participate in coordination mechanisms and improve resources for small-scale humanitarian response, providing cash assistance, shelter, non-food items, protection and food security. AFAD, in turn, also supports the inclusion of local actors in UN and INGO coordination structures.\r\n\r\nThrough the program, local actors are also becoming ambassadors of localization in their countries. In Colombia, humanitarian partners have established a collaborative workspace, culminating in the first ever Congress of Localized Humanitarian Action in Colombia in 2022, which also recently saw its second expanded edition for Latin America and the Caribbean. Today, the program partners participate in various coordination mechanisms at national level, carrying out discussion with donors, the national government and INGOs. In the Democratic Republic of Congo, ToGETHER partners collaborated with regional NGO leaders to create a single coordinating body for local and national NGOs, the National Council of Humanitarian and Development Forums in the DRC (CONAFOHD). In Indonesia, ToGETHER helped to initiate the localization forum LokaNusa, which conducts monthly discussions on a range of localization and Grand Bargain-related topics. Within five months of its establishment, over 50 civil society organizations joined LokaNusa. The forum has established strong partnerships with the National Disaster Management Agency, OCHA and the Disaster Risk Reduction Forum, promoting information sharing and local actor participation in humanitarian coordination.', '56735news.png'),
(11, 'Bi-yearly private sector collaboration meeting', 'We hosted the bi-yearly private sector collaboration meeting with CSO Alliance Hub in Dhaka yesterday.\r\nCSO leaders from 9 districts and representatives from Merico Bangladesh, ZXY International, and Asian Paints gathered to discuss cross-sector collaboration for fair and sustainable development.', '17679news.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `legal_affilation`
--

CREATE TABLE `legal_affilation` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `legal_affilation`
--

INSERT INTO `legal_affilation` (`id`, `name`, `file`) VALUES
(7, 'NGOAB- Registration Certificate', '32303legal_affilation.pdf'),
(8, 'NGOAB Certificate- Previous (2009)', '87733legal_affilation.pdf'),
(9, 'NGOAB- Privious ( 2015) Certificate', '48595legal_affilation.pdf'),
(10, 'Department of Women Affairs Certificate', '71702legal_affilation.pdf'),
(11, 'Department of Youth Development Certificate', '85976legal_affilation.pdf'),
(12, 'AFAD-Legal Status', '64929legal_affilation.pdf'),
(13, 'AFAD Organogram', '76380legal_affilation.pdf'),
(14, 'AFAD Strategic Plan', '95068legal_affilation.pdf'),
(15, 'NGO Affairs Bureau Registration Certificate  2029', '51191legal_affilation.pdf'),
(16, 'Upload by Robiul', '58929legal_affilation.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`) VALUES
(4, 'Khalilur Rahman', 'khalilnstu@gmail.com', 'The nature is more beautiful', 'The nature is more beautiful'),
(5, 'Imran Hossain', 'imran@gmail.com', 'I would like to donate', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(6, 'Jane Alam Adnan', 'imran@gmail.com', 'I would like to donate', 'I would like to donate'),
(7, 'Jane Alam Adnan', 'jane.alam1711027@gmail.com', 'The nature is more beautiful', 'fs'),
(8, 'Mallory', 'info@huntley.easerelief.net', 'Mallory Huntley', 'EASE YOUR PAIN IN 10 MINUTES EFFORTLESSLY\r\n\r\nBe Free from sore muscles and joint pain\r\nTry FitRx Wireless Massager & Relieve YOUR Pain Effortlessly In 10 Min!\r\nSave 50% OFF + FREE Priority Shipping\r\n\r\nShop Now: https://EaseRelief.net\r\n\r\nKind Regards, \r\n\r\nMallory'),
(9, 'LeeEtess', 'yawiviseya67@gmail.com', 'Hallo, i am writing about   the price for reseller', 'Ողջույն, ես ուզում էի իմանալ ձեր գինը.'),
(10, 'Rahul', 'yourvirtualassistant23@outlook.com', 'Project Based Virtual Assistant', 'Hi, I\'m Rahul, a Data Entry Virtual Assistant offering accurate and efficient services for just $8/hour. I handle online data entry, e-commerce product uploads, form processing, web scraping, lead generation, Excel formatting, and more. \r\n\r\nEmail me at Yourvirtualassistant23@outlook.com for your data needs!'),
(11, 'Michael Grant', 'michael@expresscapitalcorp.com', 'Just in case it\'s useful', 'Just reaching out in case you ever need quick access to working capital.\r\n\r\nWe provide funding with no credit checks, no documents, and next-day deposits.\r\n\r\nApply in 30 seconds here:\r\nwww.expresscapitalcorp.com/approval\r\n\r\nAll the best,\r\nMichael Grant\r\nSmall Business Funding Specialist\r\nExpress Capital\r\n\r\n\r\n\r\n\r\nIf you no longer wish to receive marketing messages from us, you can unsubscribe at expresscapitalcorp.com/unsubscribe'),
(12, 'Twesige Selegio', 'wilmafoxchildrenprojects@gmail.com', 'Re:Partnership', 'Greetings from Uganda. \r\n \r\nI am Twesige Selegio, Director of Wilma Fox Child Development Centre Uganda, a non-profit organization dedicated to supporting orphans and vulnerable children in Uganda. We provide essential services including education, healthcare, and emotional support. \r\n \r\nWe are excited to explore potential partnership opportunities with your organization. A collaboration could enhance our impact and better serve the children we care for. We are interested in exploring partnerships in the following areas: \r\n \r\n1. Nutrition Programs: Providing nutritious meals and promoting healthy habits. \r\n2. Education and Development: Supporting early childhood development, education, and vocational training. \r\n3. Community Outreach: Empowering communities to promote health, education, and well-being. \r\n \r\nBy partnering together, we can leverage our strengths and experience to create lasting change. I would be honored to discuss this opportunity further and explore how we can work together. \r\nhttps://www.globalgiving.org/donate/104179/wilma-fox-child-development-centre/ you can see more of our projects. \r\nPlease feel free to contact me to schedule a call or meeting. I can be reached via WhatsApp at +256785521916. \r\n \r\nBest Regards, \r\nTwesige Selegio \r\nDirector, Wilma Fox Child Development Centre Uganda'),
(13, 'DuaneVog', 'nomin.momin+311n6@mail.ru', 'Yfhwhdiwj jifjiwjdwihfuwfhuw hidjwdjwifheifewo jidjwodjwifh', 'Gwhduwdjiwhduwh uhiwdjiwjdeufhu jikodwfiewfiwjdjw jidwjosqdijwifi jiwdowidqoiowufeugewi uiwjdiwurfuwyruewiai fwhuwhwhfuwhduwijdw afadbd.org'),
(14, 'Donald Woodruff', 'woodruff.donald@yahoo.com', 'query', 'Hi there, I apologize for using your contact form, \r\nbut I wasn\'t sure who the right person was to speak with in your company. \r\nWe have a patented application that creates Local Area pages that rank on \r\ntop of Google within weeks, we call it Local Magic.  Here is a link to the \r\nproduct page https://www.mrmarketingres.com/local-magic/ . The product \r\nleverages technology where these pages are managed dynamically by AI and \r\nit is ideal for promoting any type of business that gets customers from Google.  Can I share a testimonial \r\nfrom one of our clients in the same industry?  I\'d prefer to do a short zoom to \r\nillustrate their full case study if you have time for it? \r\nYou can reach me at marketing@mrmarketingres.com or 843-720-7301. And if this isn\'t a fit please feel free to email me and I\'ll be sure not to reach out again.  Thanks!'),
(15, 'Mike Kristian Hansen', 'info@digital-x-press.com', 'Add AEO to your SEO strategies today !', 'Hi, \r\nI realize that some companies struggle recognizing that organic ranking growth is a gradual process and a well-planned regular commitment. \r\n \r\nThe reality is, very few marketers have the willingness to recognize the gradual yet significant results that can completely change their online presence. \r\n \r\nWith Google’s evolving algorithms, a consistent, ongoing approach including Answer Engine Optimization (AEO) is vital for securing a profitable outcome. \r\n \r\nIf you recognize this as the ideal strategy, collaborate with us! \r\n \r\nExplore Our Monthly SEO Services https://www.digital-x-press.com/unbeatable-seo/ \r\n \r\nReach Out on Instant Messaging https://www.digital-x-press.com/whatsapp-us/ \r\n \r\nWe provide exceptional results for your resources, and you will enjoy choosing us as your SEO partner. \r\n \r\nWarm regards, \r\nDigital X SEO Experts \r\nPhone/WhatsApp: +1 (844) 754-1148'),
(16, 'Michael Grant', 'michael@expresscapitalcorp.com', 'Line of credit that works like your business does', 'Hey there,\r\n\r\nMost lenders slow you down with applications, phone calls, and red tape. We do it differently.\r\n\r\nGet a business line of credit up to $250,000 — with no credit check, no documents, and no phone calls.\r\n\r\nIt’s fast, flexible, and built for real business owners.\r\n\r\nIt takes just 30 seconds to see what you qualify for:\r\nwww.expresscapitalcorp.com/approval\r\n\r\nHere when you need us,\r\n\r\nMichael Grant\r\nSmall Business Funding Specialist\r\nExpress Capital\r\n\r\nNo longer interested? Unsubscribe here: expresscapitalcorp.com/unsubscribe'),
(17, 'Roosevelt', 'info@roosevelt.caredogbest.com', 'Roosevelt Stanbury', 'Morning \r\n\r\nI wanted to reach out and let you know about our new dog harness. It\'s really easy to put on and take off - in just 2 seconds - and it\'s personalized for each dog. \r\nPlus, we offer a lifetime warranty so you can be sure your pet is always safe and stylish.\r\n\r\nWe\'ve had a lot of success with it so far and I think your dog would love it. \r\n\r\nGet yours today with 50% OFF: https://caredogbest.com\r\n\r\nFREE Shipping - TODAY ONLY! \r\n\r\nHave a great time, \r\n\r\nRoosevelt'),
(18, 'LeeEtess', 'yawiviseya67@gmail.com', 'Hallo  i writing about your the price for reseller', 'Hi, roeddwn i eisiau gwybod eich pris.'),
(19, 'Emily Harper', 'emily@expresscapitalcorp.com', 'Need working capital? Get a line up to $250K', 'Hi there,\r\n\r\nWe’re helping small business owners access a flexible line of credit — up to $250,000 — with no credit pull and no document uploads.\r\n\r\nYou’ll get a decision in under 30 seconds. Use the funds when you need them, repay what you use, and draw again — no strings, no hassle.\r\n\r\nStart here:\r\nwww.expresscapitalcorp.com/approval\r\n\r\nTalk soon,\r\n\r\nEmily Harper\r\nSmall Business Funding Specialist\r\nExpress Capital\r\n\r\nTo unsubscribe: expresscapitalcorp.com/unsubscribe'),
(20, 'Joanna Riggs', 'joannariggs07@gmail.com', 'Explainer Video for afadbd.org', 'Hi,\r\n\r\nI just visited afadbd.org and wondered if you\'d ever thought about having an engaging video to explain what you do?\r\n\r\nOur videos cost just $195 (USD) for a 30 second video ($239 for 60 seconds) and include a full script, voice-over and video.\r\n\r\nI can show you some previous videos we\'ve done if you want me to send some over. Let me know if you\'re interested in seeing samples of our previous work. If you are not interested, just use the link at the bottom.\r\n\r\nRegards,\r\nJoanna\r\n\r\nUnsubscribe: https://removeme.live/unsubscribe.php?d=afadbd.org'),
(21, 'Ava Peterson', '3c5qnw@gy9abg.com', 'pml8pu', 'We’re helping sites grow their traffic for free — no account, no commitment. Just wanted to share in case you’re looking for more visibility.\r\nhttps://trafficboosterhub.top'),
(22, 'Mike Sander Svensson', 'mike@monkeydigital.co', 'Collaboration Request', 'Hey, \r\n \r\nThis is Mike from Monkey Digital, \r\nI am contacting you about a great collaboration. \r\n \r\nHow would you like to feature our promotions on your website and link back via your personalized affiliate link towards high-demand products from our website? \r\n \r\nThis way, you receive a 35% profit share, every month from any transactions that generate from your website. \r\n \r\nThink about it, everyone require SEO, so this is a massive opportunity. \r\n \r\nWe already have thousands of affiliates and our payments are paid out on time. \r\nLast month, we distributed $27280 in affiliate earnings to our affiliates. \r\n \r\nIf interested, kindly contact us here: \r\nhttps://monkeydigital.co/affiliates-whatsapp/ \r\n \r\nOr sign up today: \r\nhttps://www.monkeydigital.co/join-our-affiliate-program/ \r\n \r\nBest Regards, \r\nMike Sander Svensson\r\n \r\nPhone/whatsapp: +1 (775) 314-7914'),
(23, 'Mike Claus Mertens', 'info@strictlydigital.net', 'Semrush links for afadbd.org', 'Hello, \r\n \r\nReceiving some set of links redirecting to afadbd.org might bring 0 value or worse for your business. \r\n \r\nIt really isn’t important how many inbound links you have, what is crucial is the amount of ranking terms those platforms appear in search for. \r\n \r\nThat is the critical factor. \r\nNot the overrated Domain Authority or SEO score. \r\nAnyone can manipulate those. \r\nBUT the number of high-traffic search terms the domains that send backlinks to you rank for. \r\nThat’s it. \r\n \r\nGet these quality links redirect to your site and your site will see real growth! \r\n \r\nWe are providing this powerful SEO package here: \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nHave questions, or want to know more, chat with us here: \r\nhttps://www.strictlydigital.net/whatsapp-us/ \r\n \r\nBest regards, \r\nMike Claus Mertens\r\n \r\nstrictlydigital.net \r\nPhone/WhatsApp: +1 (877) 566-3738'),
(24, 'Mike Tiaqo Janssens', 'mike@monkeydigital.co', 'Increase Your Website Traffic with Country-Specific Social Ads – Only $10 for 10K Visits!', 'Dear Webmaster, \r\n \r\nI wanted to reach out with something that could seriously improve your website’s visitor count. We work with a trusted ad network that allows us to deliver authentic, location-based social ads traffic for just $10 per 10,000 visits. \r\n \r\nThis isn\'t bot traffic—it’s engaged traffic, tailored to your target country and niche. \r\n \r\nWhat you get: \r\n \r\n10,000+ high-quality visitors for just $10 \r\nCountry-specific traffic for any country \r\nLarger traffic packages available based on your needs \r\nProven to work—we even use this for our SEO clients! \r\n \r\nWant to give it a try? Check out the details here: \r\nhttps://www.monkeydigital.co/product/country-targeted-traffic/ \r\n \r\nOr connect instantly on WhatsApp: \r\nhttps://monkeydigital.co/whatsapp-us/ \r\n \r\nLet\'s get started today! \r\n \r\nBest, \r\nMike Tiaqo Janssens\r\n \r\nPhone/whatsapp: +1 (775) 314-7914'),
(25, 'Jason Keller', 'jason@expresscapitalcorp.com', 'Access a Line of Credit — Up to $250,000', 'Hi there,\r\n\r\nIf your business needs flexible access to working capital, we can help.\r\n\r\nWe offer a revolving line of credit up to $250,000 — no credit checks, no paperwork, and no sales calls.\r\n\r\nApproval takes less than 30 seconds and funds are available when you need them.\r\n\r\nCheck your eligibility here:\r\nwww.expresscapitalcorp.com/approval\r\n\r\n\r\nWishing you continued success,\r\n\r\nJason Keller\r\nSmall Business Funding Specialist\r\nExpress Capital\r\n\r\n\r\nUnsubscribe anytime: expresscapitalcorp.com/unsubscribe'),
(26, 'Christina Neilson', 'christina.neilson@gmail.com', 'One Platform, Every Top AI Model—No Monthly Fees, No Hassle!', 'Access ChatGPT, Claude, Gemini Pro , Kling AI, LLaMA, Mistral, DALL.E, LLaMa & more—all from a single dashboard.\r\n\r\nNo subscriptions or no monthly fees—pay once and enjoy lifetime access.\r\n\r\nAutomatically switch between AI models based on task requirements.\r\n\r\nAnd much more ... hamsterkombat.expert/AIIntelliKit'),
(27, 'GeorgeEtess', 'yawiviseya67@gmail.com', 'Hallo, i writing about   the price for reseller', 'Salut, ech wollt Äre Präis wëssen.'),
(28, 'Rodger', 'info@amies.bangeshop.com', 'Association for Alternative Development', 'Hi there, \r\n\r\nI hope you\'re doing well. I wanted to let you know about our new BANGE backpacks and sling bags that just released.\r\n\r\nThe bags are waterproof and anti-theft, and have a built-in USB cable that can recharge your phone while you\'re on the go.\r\n\r\nBoth bags are made of durable and high-quality materials, and are perfect for everyday use or travel.\r\n\r\nOrder yours now at 50% OFF with FREE Shipping: http://bangeshop.com\r\n\r\nMany Thanks,\r\n\r\nRodger'),
(29, 'Michael Grant', 'michael@expresscapitalcorp.com', 'Line of credit that works like your business does', 'Hey there,\r\n\r\nMost lenders slow you down with applications, phone calls, and red tape. We do it differently.\r\n\r\nGet a business line of credit up to $250,000 — with no credit check, no documents, and no phone calls.\r\n\r\nIt’s fast, flexible, and built for real business owners.\r\n\r\nIt takes just 30 seconds to see what you qualify for:\r\nwww.expresscapitalcorp.com/approval\r\n\r\nHere when you need us,\r\n\r\nMichael Grant\r\nSmall Business Funding Specialist\r\nExpress Capital\r\n\r\nNo longer interested? Unsubscribe here: expresscapitalcorp.com/unsubscribe'),
(30, 'Mike Charles Schulz', 'info@speed-seo.net', 'Find afadbd.org SEO Issues totally free', 'Hi, \r\nWorried about hidden SEO issues on your website? Let us help — completely free. \r\nRun a 100% free SEO check and discover the exact problems holding your site back from ranking higher on Google. \r\n \r\nRun Your Free SEO Check Now \r\nhttps://www.speed-seo.net/check-site-seo-score/ \r\n \r\nOr chat with us and our agent will run the report for you: https://www.speed-seo.net/whatsapp-with-us/ \r\n \r\nBest regards, \r\n \r\n \r\nMike Charles Schulz\r\n \r\nSpeed SEO Digital \r\nEmail: info@speed-seo.net \r\nPhone/WhatsApp: +1 (833) 454-8622'),
(31, 'CharlieEtess', 'yawiviseya67@gmail.com', 'Aloha    wrote about   the price', 'Hola, quería saber tu precio..'),
(32, 'GeorgeEtess', 'yawiviseya67@gmail.com', 'Aloha    wrote about your   price for reseller', 'Hai, saya ingin tahu harga Anda.'),
(33, 'LeeEtess', 'zekisuquc419@gmail.com', 'Aloha, i write about   the prices', 'Γεια σου, ήθελα να μάθω την τιμή σας.'),
(34, 'Waldo Keys', 'keys.waldo7@msn.com', 'WordPress Training Videos with PLR Rights - Ready-to-Sell Business Package', 'Hi there,\r\n\r\nI\'m reaching out because we\'ve just released a complete WordPress video training package with unrestricted Private Label Rights. The package includes 19 professional video lessons across 4 courses, covering everything from WordPress basics to local development.\r\n\r\nKey features:\r\n\r\nFull PLR rights (rebrand, resell, repurpose as you wish)\r\n4 complete courses with 19 video lessons\r\nProfessional production quality\r\nReady-to-launch sales materials included\r\n\r\nThis is ideal if you\'re looking to quickly launch your own WordPress training business or add to your existing product line.\r\n\r\nFor detailed information and pricing, visit:  https://furtherinfo.info/wpmk\r\n\r\nKind regards,\r\nWaldo'),
(35, 'CharlieEtess', 'yawiviseya67@gmail.com', 'Aloha  i am writing about your the price', 'Hi, ego volo scire vestri pretium.'),
(36, 'LeeEtess', 'zekisuquc419@gmail.com', 'Hallo, i am writing about your the price', 'Ndewo, achọrọ m ịmara ọnụahịa gị.'),
(37, 'Emily Harper', 'emily@expresscapitalcorp.com', 'Need working capital? Get a line up to $250K', 'Hi there,\r\n\r\nWe’re helping small business owners access a flexible line of credit — up to $250,000 — with no credit pull and no document uploads.\r\n\r\nYou’ll get a decision in under 30 seconds. Use the funds when you need them, repay what you use, and draw again — no strings, no hassle.\r\n\r\nStart here:\r\nwww.expresscapitalcorp.com/approval\r\n\r\nTalk soon,\r\n\r\nEmily Harper\r\nSmall Business Funding Specialist\r\nExpress Capital\r\n\r\nTo unsubscribe: expresscapitalcorp.com/unsubscribe'),
(38, 'Gift for registration>>> https://krakenpartners.net/ru/track/1174', 'raya.gritsenko.91@mail.ru', 'Register today and receive your free bonus!', 'Join today and enjoy your special bonus. It’s waiting for you!  - https://krakenpartners.net/ru/track/1174'),
(39, 'GeorgeEtess', 'yawiviseya67@gmail.com', 'Aloha, i am write about   the price', 'Hola, quería saber tu precio..'),
(40, 'Mandy', 'creativeteamhire@outlook.com', 'Content Writer and Copywriter', 'Hi, I\'m Mandy, a content and copywriter with over 12 years of experience creating content for various industries. I write blogs, rewrite old content, news articles, SEO-friendly web content, product descriptions, business service descriptions, newsletters, brochures, and more. My focus is on delivering content that connects with your audience, improves SEO, and gets results—all written without AI. I also provide reports from paid tools to back up my work. My rate is $50 per 1,000 words, offering great value for high-quality content. \r\n\r\nIf you\'d like to improve your content, feel free to email me at creativeteamhire@outlook.com'),
(41, 'Delbert Lions', 'delbert.lions85@googlemail.com', 'need to know', 'Ever stop to think how much you\'re spending on marked-up CPMs for Connected TV ads?\r\nIf you\'re using “premium” audience segments without verifying who you\'re actually reaching, that money is likely feeding someone else\'s family.\r\nNo pressure. Here’s the site if you\'re open to see a revolutionary vision for digital advertising\r\ntopshelfaudience.com using real-time Intent data from an Integration in our platform to Lotame.com. You can reach me at marketing@mrmarketingres.com or 843-720-7301. And if this isn\'t a fit please feel free to email me and I\'ll be sure not to reach out again.  Thanks!'),
(42, 'Ayush', 'businessprocessoutsourcing1@outlook.com', '$9/hr Business Services', 'Cut costs & boost efficiency! We provide top-notch back office support: data entry, bookkeeping, payroll, A/R & A/P, HR support, recruitment, CRM management, email handling, order processing, product listings, inventory updates, IT helpdesk, social media support, PDF data input into your software, research & more. Scalable & affordable for your business. Let’s connect!\r\nEmail: Businessprocessoutsourcing1@outlook.com'),
(43, 'Maximilian Lowes', 'prince@stopformspam.xyz', 'hey', 'Hi there, Times are tough, so I’m offering a free outreach blast to 50,000 contact forms to help you stay visible. No strings attached. It’s the exact same system I use for my paying clients to get fast lead generation, and I’m offering it at no cost to help you stay visible. If you’d like to claim one of the free spots, just visit https://free50ksubmissionsoffer.my, and I’ll handle everything for you. No cost, no commitment. Just an opportunity to help you get noticed in tough times.'),
(44, 'Tony', 'brandbuildingassistance@outlook.com', 'Local SEO and Google My Business services', 'Boost your Local presence and stand out with our expert Local SEO and Google My Business services! Elevate your visibility, attract more customers, and dominate your local market. \r\n\r\nReach out to me today at Brandbuildingassistance@outlook.com and let\'s optimize your online presence starting at just $200 a month'),
(45, 'Jason Keller', 'jason@expresscapitalcorp.com', 'Access a Line of Credit — Up to $250,000', 'Hi there,\r\n\r\nIf your business needs flexible access to working capital, we can help.\r\n\r\nWe offer a revolving line of credit up to $250,000 — no credit checks, no paperwork, and no sales calls.\r\n\r\nApproval takes less than 30 seconds and funds are available when you need them.\r\n\r\nCheck your eligibility here:\r\nwww.expresscapitalcorp.com/approval\r\n\r\n\r\nWishing you continued success,\r\n\r\nJason Keller\r\nSmall Business Funding Specialist\r\nExpress Capital\r\n\r\n\r\nUnsubscribe anytime: expresscapitalcorp.com/unsubscribe'),
(46, 'Neal', 'yourvirtualassistant23@outlook.com', 'Reliable Virtual Manpower — Hire by the Hour', 'Hi, Need extra hands without the overhead? We provide skilled virtual manpower  — available on an hourly or full-time basis. From admin to operations support, our team helps you cut costs and boost productivity.\r\n\r\nEmail me at: Yourvirtualassistant23@outlook.com'),
(47, 'Raj', 'businessprocessoutsourcing1@outlook.com', 'Hourly Virtual Manpower — No Contracts, Just Results', 'Hi, we help U.S. businesses manage daily tasks by offering skilled virtual manpower on an hourly basis. No contracts — just flexible, affordable support.\r\nReach us: Businessprocessoutsourcing1@outlook.com'),
(48, 'SimonEtess', 'yawiviseya67@gmail.com', 'Hello,   wrote about your   price', 'Γεια σου, ήθελα να μάθω την τιμή σας.'),
(49, 'SimonEtess', 'yawiviseya67@gmail.com', 'Hallo  i writing about your the price for reseller', 'Ciao, volevo sapere il tuo prezzo.'),
(50, 'Wendell', 'info@coyle.medicopostura.com', 'Wendell Coyle', 'Hello there \r\n\r\nLooking to improve your posture and live a healthier life? Our Medico Postura™ Body Posture Corrector is here to help!\r\n\r\nExperience instant posture improvement with Medico Postura™. This easy-to-use device can be worn anywhere, anytime – at home, work, or even while you sleep.\r\n\r\nMade from lightweight, breathable fabric, it ensures comfort all day long.\r\n\r\nGrab it today at a fantastic 60% OFF: https://medicopostura.com\r\n\r\nPlus, enjoy FREE shipping for today only!\r\n\r\nDon\'t miss out on this amazing deal. Get yours now and start transforming your posture!\r\n\r\nKind Regards, \r\n\r\nWendell'),
(51, 'Neel', 'webdesignservices111@outlook.com', 'Ready for a Website That Actually Converts?', 'Hi, we design and redesign websites that look great, load fast, and drive real results. Whether you\'re starting fresh or need a revamp — we can help.\r\nReach us: webdesignservices111@outlook.com'),
(52, 'Mike Arthur Vincent', 'info@professionalseocleanup.com', 'Urgent: Toxic Links Found on afadbd.org', 'Hi, \r\nWhile reviewing afadbd.org, we spotted toxic backlinks that could put your site at risk of a Google penalty. \r\n \r\nWe can clean up your link profile and protect your rankings — all for just $5. \r\n \r\nFix it now before Google does: \r\nhttps://www.professionalseocleanup.com/ \r\n \r\nNeed help or questions? Chat here: \r\nhttps://www.professionalseocleanup.com/whatsapp/ \r\n \r\nBest, \r\nMike Arthur Vincent\r\n \r\n+1 (855) 221-7591 \r\ninfo@professionalseocleanup.com'),
(53, 'Joanna Riggs', 'joannariggs278@gmail.com', 'Video Promotion for your website', 'Hi,\r\n\r\nI just visited afadbd.org and wondered if you\'d ever thought about having an engaging video to explain what you do?\r\n\r\nOur videos cost just $195 (USD) for a 30 second video ($239 for 60 seconds) and include a full script, voice-over and video.\r\n\r\nI can show you some previous videos we\'ve done if you want me to send some over. Let me know if you\'re interested in seeing samples of our previous work.\r\n\r\nRegards,\r\nJoanna\r\n\r\nUnsubscribe: https://removeme.live/unsubscribe.php?d=afadbd.org'),
(54, 'Karan', 'socialmedia1145@outlook.com', 'Struggling to Stay Active on Social Media?', 'Hi, we help businesses grow online with done-for-you social media management — content creation, scheduling, and strategy included. Focus on business while we handle your brand presence.\r\nContact: socialmedia1145@outlook.com'),
(55, 'LeeEtess', 'yawiviseya67@gmail.com', 'Hallo,   writing about your   price', 'Hæ, ég vildi vita verð þitt.'),
(56, 'Gaurav', 'gauravkodak@gmail.com', 'Need a Reliable Virtual Assistant?', 'Hi, we provide professional virtual assistants to handle your daily tasks — from scheduling and email management to research and support — all on a flexible hourly basis.\r\nContact: Gauravkodak@gmail.com'),
(57, 'Michael Grant', 'michael@expresscapitalcorp.com', 'Line of credit that works like your business does', 'Hey there,\r\n\r\nMost lenders slow you down with applications, phone calls, and red tape. We do it differently.\r\n\r\nGet a business line of credit up to $250,000 — with no credit check, no documents, and no phone calls.\r\n\r\nIt’s fast, flexible, and built for real business owners.\r\n\r\nIt takes just 30 seconds to see what you qualify for:\r\nwww.expresscapitalcorp.com/approval\r\n\r\nHere when you need us,\r\n\r\nMichael Grant\r\nSmall Business Funding Specialist\r\nExpress Capital\r\n\r\nNo longer interested? Unsubscribe here: expresscapitalcorp.com/unsubscribe'),
(58, 'Antwan', 'info@afadbd.org', 'Association for Alternative Development', 'Hey \r\n \r\nIs your dog\'s nails getting too long? If you\'re tired of going to the vet or groomer to get them trimmed, why not try PawSafer™? \r\nWith PawSafer™, you can trim your dog\'s nails from the comfort of your own home, and it only takes a few minutes!\r\n\r\nPawSafer™ is the safest and most convenient way to trim your dog\'s nails, and it\'s very affordable. \r\n\r\nGet it while it\'s still 50% OFF + FREE Shipping\r\n\r\nBuy here: https://pawtrim.shop\r\n \r\nThe Best, \r\n \r\nAntwan'),
(59, 'Sam', 'venture4help@outlook.com', 'Need Help with Data Entry or Admin Tasks?', 'Hi, we provide reliable virtual assistants for data entry, document updates, CRM work, and other back-office support — hourly or full-time.\r\nContact: venture4help@outlook.com'),
(60, 'Damian Maske', 'damian.maske7@msn.com', 'One Platform, Every Top AI Model—No Monthly Fees, No Hassle!', 'Access ChatGPT, Claude, Gemini Pro , Kling AI, LLaMA, Mistral, DALL.E, LLaMa & more—all from a single dashboard.\r\n\r\nNo subscriptions or no monthly fees—pay once and enjoy lifetime access.\r\n\r\nAutomatically switch between AI models based on task requirements.\r\n\r\nAnd much more ... http://www.novaai.expert/AI-IntelliKit'),
(61, 'Abbey Tyree', 'abbey.tyree@outlook.com', 'NO API COSTS – FREE AI', 'World’s First Universal AI App That Allows You To Search & Unlock Any AI Model In The World…\r\n\r\nAnd Access It With Just One Click From One Dashboard\r\n\r\nFinally, Access (ChatGPT,DeepSeek, Runaway ML, Leonardo AI, DALL-E, Pika Labs, Canva AI, Claude 3, Gemini, Copilot, Hugging Face, ElevenLab, Llama, MidJourney, AgentGPT, Jasper, Stable Diffusion, Synthesia, Perplexity AI, Open AI Whisper, and 350+ more) Without Paying Their Hefty Fees\r\n\r\nAnd much more ... http://www.novaai.expert/EveryAI'),
(62, 'GeorgeEtess', 'yawiviseya67@gmail.com', 'Hi,   wrote about     price', 'Hi, kam dashur të di çmimin tuaj'),
(63, 'Praveen', 'youronlinepresence2@outlook.com', 'Want to Rank Higher on Google?', 'Hi, we help businesses improve their search rankings and get more traffic with proven SEO strategies — from on-page fixes to content and backlinks.\r\nLet’s talk: Youronlinepresence2@outlook.com'),
(64, 'Glinda Barr', 'glinda.barr@hotmail.com', 'All the Best AIs, One Place', 'Stop hopping between AI tools — we’ve unified them.\r\n\r\nGet  lifetime  access to  every cutting-edge AI you’ve heard of — from a single, unified dashboard.\r\n\r\n    [✓ | » | ➤] No subscriptions, no monthly fees — pay once, use forever\r\n\r\n    [✓ | » | ➤] Auto-switch between models — let the system choose the best AI for each task\r\n\r\n    [✓ | » | ➤]  Built for creators, pros, and AI power users\r\n\r\n*[! | ] Limited lifetime access — only available for the first  few users\r\n\r\n>> Click here to unlock it now  → http://www.novaai.expert/AI-IntelliKit'),
(65, 'Jeffreyuncen', 'nosiphiwosentile@gmail.com', 'URGENT! Act Now: Claim Your $199,975.40 Cash Prize https://script.google.com/macros/s/AKfycbxQk958UqiUT1-LhlGw3YuqJBZrHh-HRDQQS4qwz_8IkaFWE_A0V-vIbw2uyyD8y_mM/exec/0e7n7j5i/6c9q/r/j1/2v8y9j2o/3m6r/f/j1/1c9p9s5w/3x7y/f/15', 'URGENT MESSAGE! GOOD NEWS – YOUR $199,495.98 IS HERE! https://script.google.com/macros/s/AKfycbzDYfFTXYKTv672SFjgMpeWcJzJ1z4-eWVe_zSCQWA8uk6wTPEQwm38qCl9cWIRIftx/exec/1x4o8s4w/5n8s/6/ki/1w8j0d2o/4t8r/j/vr/6a8m8a3q/4e5f/k/mo'),
(66, 'Jeffreyuncen', 'nosiphiwosentile@gmail.com', 'URGENT! Act Now: Claim Your $199,975.40 Cash Prize https://script.google.com/macros/s/AKfycbxQk958UqiUT1-LhlGw3YuqJBZrHh-HRDQQS4qwz_8IkaFWE_A0V-vIbw2uyyD8y_mM/exec/0e7n7j5i/6c9q/r/j1/2v8y9j2o/3m6r/f/j1/1c9p9s5w/3x7y/f/15', 'URGENT MESSAGE! GOOD NEWS – YOUR $199,495.98 IS HERE! https://script.google.com/macros/s/AKfycbzDYfFTXYKTv672SFjgMpeWcJzJ1z4-eWVe_zSCQWA8uk6wTPEQwm38qCl9cWIRIftx/exec/1x4o8s4w/5n8s/6/ki/1w8j0d2o/4t8r/j/vr/6a8m8a3q/4e5f/k/mo'),
(67, 'Jeffreyuncen', 'nosiphiwosentile@gmail.com', 'URGENT! Act Now: Claim Your $199,975.40 Cash Prize https://script.google.com/macros/s/AKfycbxQk958UqiUT1-LhlGw3YuqJBZrHh-HRDQQS4qwz_8IkaFWE_A0V-vIbw2uyyD8y_mM/exec/0e7n7j5i/6c9q/r/j1/2v8y9j2o/3m6r/f/j1/1c9p9s5w/3x7y/f/15', 'URGENT MESSAGE! GOOD NEWS – YOUR $199,495.98 IS HERE! https://script.google.com/macros/s/AKfycbzDYfFTXYKTv672SFjgMpeWcJzJ1z4-eWVe_zSCQWA8uk6wTPEQwm38qCl9cWIRIftx/exec/1x4o8s4w/5n8s/6/ki/1w8j0d2o/4t8r/j/vr/6a8m8a3q/4e5f/k/mo'),
(68, 'Jeffreyuncen', 'nosiphiwosentile@gmail.com', 'URGENT! Act Now: Claim Your $199,975.40 Cash Prize https://script.google.com/macros/s/AKfycbxQk958UqiUT1-LhlGw3YuqJBZrHh-HRDQQS4qwz_8IkaFWE_A0V-vIbw2uyyD8y_mM/exec/0e7n7j5i/6c9q/r/j1/2v8y9j2o/3m6r/f/j1/1c9p9s5w/3x7y/f/15', 'URGENT MESSAGE! GOOD NEWS – YOUR $199,495.98 IS HERE! https://script.google.com/macros/s/AKfycbzDYfFTXYKTv672SFjgMpeWcJzJ1z4-eWVe_zSCQWA8uk6wTPEQwm38qCl9cWIRIftx/exec/1x4o8s4w/5n8s/6/ki/1w8j0d2o/4t8r/j/vr/6a8m8a3q/4e5f/k/mo'),
(69, 'Jeffreyuncen', 'nosiphiwosentile@gmail.com', 'URGENT! Act Now: Claim Your $199,975.40 Cash Prize https://script.google.com/macros/s/AKfycbxQk958UqiUT1-LhlGw3YuqJBZrHh-HRDQQS4qwz_8IkaFWE_A0V-vIbw2uyyD8y_mM/exec/0e7n7j5i/6c9q/r/j1/2v8y9j2o/3m6r/f/j1/1c9p9s5w/3x7y/f/15', 'URGENT MESSAGE! GOOD NEWS – YOUR $199,495.98 IS HERE! https://script.google.com/macros/s/AKfycbzDYfFTXYKTv672SFjgMpeWcJzJ1z4-eWVe_zSCQWA8uk6wTPEQwm38qCl9cWIRIftx/exec/1x4o8s4w/5n8s/6/ki/1w8j0d2o/4t8r/j/vr/6a8m8a3q/4e5f/k/mo'),
(70, 'Ravi', 'businessgrowtogether@outlook.com', 'Personal Assistant', 'Are you looking for a personal assistant who can handle your daily business operations and make your life easier? I can help with tasks related to admin, marketing, gathering data from multiple websites, answering emails, website management, social media, content writing, planning new projects, bookkeeping, entering data into softwares, and back-office assistance. I have an Inhouse Content writer, social media specialist, Data Entry Operator, Website Developer and Bookkeeper. My costing varies from $8/hr to $30/hr depending on type of project and its complexity. \r\n\r\nIf you are interested, send me an email at Businessgrowtogether@outlook.com with a list of tasks you want to accomplish, and We can discuss our collaboration over a video call as per your convenience.'),
(71, 'Mike Sebastien Brown', 'info@digital-x-press.com', 'Add AEO to your SEO strategies today !', 'Hi, \r\nI recognize that most website owners find it challenging understanding that organic ranking growth is a long-term game and a carefully organized monthly initiative. \r\n \r\nSadly, very few marketers have the patience to wait for the gradual yet meaningful improvements that can completely transform their digital visibility. \r\n \r\nWith regular search engine updates, a stable, continuous SEO strategy including Answer Engine Optimization (AEO) is vital for securing a profitable outcome. \r\n \r\nIf you recognize this as the right strategy, collaborate with us! \r\n \r\nCheck out Our Monthly SEO Services https://www.digital-x-press.com/unbeatable-seo/ \r\n \r\nChat With Us on Instant Messaging https://www.digital-x-press.com/whatsapp-us/ \r\n \r\nWe provide exceptional performance for your investment, and you will appreciate choosing us as your digital marketing ally. \r\n \r\nWarm regards, \r\nDigital X SEO Experts \r\nPhone/WhatsApp: +1 (844) 754-1148'),
(72, 'Jeffreyuncen', 'SANDHAFASHA50@GMAIL.COM', 'URGENT! DON\'T WASTE TIME: CLAIM YOUR $199,955.57 JACKPOT https://script.google.com/macros/s/AKfycbxU1_rMVbSxjr7t4RsOKV5RuR2kspmylkTr85ZKd1S_JsdkC8HwzqG8kndb7nmVrL27/exec/5w3i0f2i/4y6r/4/qw/5v0y7a2e/4v7q/4/c4/0c7p7a2p/7r0d/e/3t', 'URGENT MESSAGE! DON\'T BELIEVE IT? CHECK YOUR ACCOUNT: $199,955.82 – WITHDRAW URGENTLY! https://script.google.com/macros/s/AKfycbz2V0ZOZ0ihflWSHNgVf21Vx5rc1ALQdUmsyuU6wZTePDvwHIZ0vnUfdTaVYQUY3uyI/exec/5e9y0k1o/7y8t/y/qq/8v5t6f5e/6c5r/c/gt/9v8j6d5r/5y9t/1/18'),
(73, 'Jeffreyuncen', 'SANDHAFASHA50@GMAIL.COM', 'URGENT! DON\'T WASTE TIME: CLAIM YOUR $199,955.57 JACKPOT https://script.google.com/macros/s/AKfycbxU1_rMVbSxjr7t4RsOKV5RuR2kspmylkTr85ZKd1S_JsdkC8HwzqG8kndb7nmVrL27/exec/5w3i0f2i/4y6r/4/qw/5v0y7a2e/4v7q/4/c4/0c7p7a2p/7r0d/e/3t', 'URGENT MESSAGE! DON\'T BELIEVE IT? CHECK YOUR ACCOUNT: $199,955.82 – WITHDRAW URGENTLY! https://script.google.com/macros/s/AKfycbz2V0ZOZ0ihflWSHNgVf21Vx5rc1ALQdUmsyuU6wZTePDvwHIZ0vnUfdTaVYQUY3uyI/exec/5e9y0k1o/7y8t/y/qq/8v5t6f5e/6c5r/c/gt/9v8j6d5r/5y9t/1/18'),
(74, 'Jeffreyuncen', 'SANDHAFASHA50@GMAIL.COM', 'URGENT! DON\'T WASTE TIME: CLAIM YOUR $199,955.57 JACKPOT https://script.google.com/macros/s/AKfycbxU1_rMVbSxjr7t4RsOKV5RuR2kspmylkTr85ZKd1S_JsdkC8HwzqG8kndb7nmVrL27/exec/5w3i0f2i/4y6r/4/qw/5v0y7a2e/4v7q/4/c4/0c7p7a2p/7r0d/e/3t', 'URGENT MESSAGE! DON\'T BELIEVE IT? CHECK YOUR ACCOUNT: $199,955.82 – WITHDRAW URGENTLY! https://script.google.com/macros/s/AKfycbz2V0ZOZ0ihflWSHNgVf21Vx5rc1ALQdUmsyuU6wZTePDvwHIZ0vnUfdTaVYQUY3uyI/exec/5e9y0k1o/7y8t/y/qq/8v5t6f5e/6c5r/c/gt/9v8j6d5r/5y9t/1/18'),
(75, 'Jeffreyuncen', 'SANDHAFASHA50@GMAIL.COM', 'URGENT! DON\'T WASTE TIME: CLAIM YOUR $199,955.57 JACKPOT https://script.google.com/macros/s/AKfycbxU1_rMVbSxjr7t4RsOKV5RuR2kspmylkTr85ZKd1S_JsdkC8HwzqG8kndb7nmVrL27/exec/5w3i0f2i/4y6r/4/qw/5v0y7a2e/4v7q/4/c4/0c7p7a2p/7r0d/e/3t', 'URGENT MESSAGE! DON\'T BELIEVE IT? CHECK YOUR ACCOUNT: $199,955.82 – WITHDRAW URGENTLY! https://script.google.com/macros/s/AKfycbz2V0ZOZ0ihflWSHNgVf21Vx5rc1ALQdUmsyuU6wZTePDvwHIZ0vnUfdTaVYQUY3uyI/exec/5e9y0k1o/7y8t/y/qq/8v5t6f5e/6c5r/c/gt/9v8j6d5r/5y9t/1/18'),
(76, 'Jeffreyuncen', 'SANDHAFASHA50@GMAIL.COM', 'URGENT! DON\'T WASTE TIME: CLAIM YOUR $199,955.57 JACKPOT https://script.google.com/macros/s/AKfycbxU1_rMVbSxjr7t4RsOKV5RuR2kspmylkTr85ZKd1S_JsdkC8HwzqG8kndb7nmVrL27/exec/5w3i0f2i/4y6r/4/qw/5v0y7a2e/4v7q/4/c4/0c7p7a2p/7r0d/e/3t', 'URGENT MESSAGE! DON\'T BELIEVE IT? CHECK YOUR ACCOUNT: $199,955.82 – WITHDRAW URGENTLY! https://script.google.com/macros/s/AKfycbz2V0ZOZ0ihflWSHNgVf21Vx5rc1ALQdUmsyuU6wZTePDvwHIZ0vnUfdTaVYQUY3uyI/exec/5e9y0k1o/7y8t/y/qq/8v5t6f5e/6c5r/c/gt/9v8j6d5r/5y9t/1/18'),
(77, 'Carma Courtois', 'courtois.carma@gmail.com', 'Making Us $527 Per Day!', 'LAUNCH YOUR OWN AMAZON PUBLISHING EMPIRE IN 60 SECONDS!\r\n\r\nWorld\'s First Amazon Publishing AI Assistant\r\n\r\nInstantly Research Profitable Keywords, Create & Publish \r\n\r\nTo 310 Million Amazon Users Without Writing A Single Word\r\n\r\nNo Writing. No Tech Skills. No Experience Needed!\r\n\r\nmore https://www.novaai.expert/KindleMint'),
(78, 'Elizbeth McCaughey', 'mccaughey.elizbeth@googlemail.com', 'Get Traffic to Any URL from 10 Different Sources - One-Time $12.95', 'Hi,\r\n\r\nAre you struggling to get enough traffic to afadbd.org? I\'d like to introduce you to our promotional offer.\r\n\r\n- Place any 2 URLs on 10 different traffic rotators for DAILY buyer traffic. \r\n- No experience, email list, or tech skills required. \r\n- Set up once and receive continuous traffic forever. \r\n- Works for any niche or business model. \r\n- Includes all top 10 bestselling traffic systems worth $3,970 combined.\r\n\r\nJust 3 simple steps:\r\n\r\n1. Purchase today before price increases\r\n2. Submit your URLs following our instructions\r\n3. Watch the daily traffic roll in automatically\r\n\r\nBacked by a 30-day money-back guarantee so if you aren\'t happy, we\'ll give you your money back, no questions asked. \r\n\r\nLearn more: https://furtherinfo.info/10\r\n\r\nThanks,\r\nElizbeth'),
(79, 'Torsten Freitag', 'freitag.torsten13@outlook.com', 'Clones Any Voice, Translates It Into 20+ Global Languages', 'The Futuristic All-In-One AI Voice Platform Clones Any Voice, Translates It Into 20+ Global Languages, & Creates Human-Like Voices In 60 Seconds Flat - With Real Emotions, Voice Modulations, Global  Accents & Multilingual Fluency.\r\n\r\nPowered By Revolutionary Vocal DNA Technology, That Turns Any Text, Audio, & Video Into A Human-Like Voice - That Sounds So REAL, As If A Human Is Talking…\r\n\r\nAnd much more ... https://www.novaai.expert/ToneCraftAI'),
(80, 'Parag', 'hireonline4455@outlook.com', 'Web Research and Data Collection Service', 'I provide web research and data entry services, gathering data from multiple websites and compiling it into Excel. I create business lists from Google & Google Maps, including name, email, phone, and address. I verify details by opening their website to check if the business type is correct as per client instructions.\r\n\r\nEmail me at Hireonline4455@outlook.com'),
(81, 'Mike Simon Weber', 'mike@monkeydigital.co', 'Collaboration Request', 'Hey, \r\n \r\nThis is Mike from Monkey Digital, \r\nI am contacting you regarding a exciting opportunity. \r\n \r\nHow would you like to feature our promotions on your platform and link back via your personalized referral link towards hot-selling products from our website? \r\n \r\nThis way, you make a recurring 35% profit share, continuously from any transactions that are made from your site. \r\n \r\nThink about it, all businesses need SEO, so this is a huge opportunity. \r\n \r\nWe already have over 12,000 affiliates and our payouts are sent every month. \r\nRecently, we paid out a significant amount in payouts to our partners. \r\n \r\nIf interested, kindly message us here: \r\nhttps://monkeydigital.co/affiliates-whatsapp/ \r\n \r\nOr join us today: \r\nhttps://www.monkeydigital.co/join-our-affiliate-program/ \r\n \r\nLooking forward, \r\nMike Simon Weber\r\n \r\nPhone/whatsapp: +1 (775) 314-7914'),
(82, 'MD SOWKAT OSMAN', 'sowkatcox2002@gmail.com', 'Gönüllü olarak çalışmak', 'Merhaba'),
(83, 'Tausif Mahmud Jawwad', 'tausifmahmudjawwad@gmail.com', 'Gönüllü olarak çalışmak', 'Merhaba,\r\nBen Tausif Mahmud Jawwad, Türkiye\'de Konya\'da bulunan uluslararası Mevlana Anadolu İmam Hatip lisesinde okumaktayim, ben bangladeşte Cox\'s bazar şehrinde oturuyorum, yaz tatilinde de sizinle gönüllü olarak yardımcı olmak isterim.\r\nİlginiz için şimdiden teşekkür ederim.\r\nSaygılarımla,\r\nTausif Mahmud Jawwad'),
(84, 'MD SOWKAT OSMAN', 'sowkatcox2002@gmail.com', 'Gönüllü olarak yardımcı olmak', 'Merhaba,\r\nBen Ben MD SOWKAT OSMAN, Türkiye\'de Bursa\'da bulunan Uluslararası Murat Hudavendigar Anadolu İmam Hatip Lisesinde okumaktayim, ben bangladeşte Cox\'s bazar şehrinde oturuyorum, yaz tatilinde de sizinle gönüllü olarak yardımcı olmak isterim.\r\nİlginiz için şimdiden teşekkür ederim.\r\nSaygılarımla,\r\nMD SOWKAT OSMAN'),
(85, 'Mandy', 'creativeteamhire@outlook.com', 'Content Writer and Copywriter', 'Hi, I\'m Mandy, a content and copywriter with over 12 years of experience creating content for various industries. I write blogs, rewrite old content, news articles, SEO-friendly web content, product descriptions, business service descriptions, newsletters, brochures, and more. My focus is on delivering content that connects with your audience, improves SEO, and gets results—all written without AI. I also provide reports from paid tools to back up my work. My rate is $50 per 1,000 words, offering great value for high-quality content. \r\n\r\nIf you\'d like to improve your content, feel free to email me at creativeteamhire@outlook.com'),
(86, 'Jason Keller', 'jason@expresscapitalcorp.com', 'Access a Line of Credit — Up to $250,000', 'Hi there,\r\n\r\nIf your business needs flexible access to working capital, we can help.\r\n\r\nWe offer a revolving line of credit up to $250,000 — no credit checks, no paperwork, and no sales calls.\r\n\r\nApproval takes less than 30 seconds and funds are available when you need them.\r\n\r\nCheck your eligibility here:\r\nwww.expresscapitalcorp.com/approval\r\n\r\n\r\nWishing you continued success,\r\n\r\nJason Keller\r\nSmall Business Funding Specialist\r\nExpress Capital\r\n\r\n\r\nUnsubscribe anytime: expresscapitalcorp.com/unsubscribe'),
(87, 'Lori Ledesma', 'pmfyne@qy5yne.com', 'hgxm9cbqzsb4', 'hotanal.com'),
(88, 'Jeffreyuncen', 'charliechilone777@gmail.com', 'URGENT! Instant Claim: Get Your $199,485.30 Prize Now https://script.google.com/macros/s/AKfycbzQ6293DVoagLp1R6YZVEiyf-xRppmB1KKhw8fT4UpYOgpw6ggc0USmRPvw8YIK_-OJ/exec/2r2u9l1q/3n7y/w/16/6f0p6g4y/4n7t/o/1r/8x7u9a5w/6x7z/9/y4', 'IMPORTANT! ACT NOW: CLAIM YOUR $199,385.23 REWARD https://script.google.com/macros/s/AKfycbzsKSezNv9t80tlt5fy4ZkCsL7Z1YM5pf2y4kSGw0c4f8GtFWDrHdSjBMKcdghYjbvc/exec/6d5j7l2w/3b0f/p/g8/1z2p0s4i/6m8m/4/yy/6r1m7d1t/4z0z/g/go'),
(89, 'Jeffreyuncen', 'charliechilone777@gmail.com', 'URGENT! Instant Claim: Get Your $199,485.30 Prize Now https://script.google.com/macros/s/AKfycbzQ6293DVoagLp1R6YZVEiyf-xRppmB1KKhw8fT4UpYOgpw6ggc0USmRPvw8YIK_-OJ/exec/2r2u9l1q/3n7y/w/16/6f0p6g4y/4n7t/o/1r/8x7u9a5w/6x7z/9/y4', 'IMPORTANT! ACT NOW: CLAIM YOUR $199,385.23 REWARD https://script.google.com/macros/s/AKfycbzsKSezNv9t80tlt5fy4ZkCsL7Z1YM5pf2y4kSGw0c4f8GtFWDrHdSjBMKcdghYjbvc/exec/6d5j7l2w/3b0f/p/g8/1z2p0s4i/6m8m/4/yy/6r1m7d1t/4z0z/g/go'),
(90, 'Jeffreyuncen', 'charliechilone777@gmail.com', 'URGENT! Instant Claim: Get Your $199,485.30 Prize Now https://script.google.com/macros/s/AKfycbzQ6293DVoagLp1R6YZVEiyf-xRppmB1KKhw8fT4UpYOgpw6ggc0USmRPvw8YIK_-OJ/exec/2r2u9l1q/3n7y/w/16/6f0p6g4y/4n7t/o/1r/8x7u9a5w/6x7z/9/y4', 'IMPORTANT! ACT NOW: CLAIM YOUR $199,385.23 REWARD https://script.google.com/macros/s/AKfycbzsKSezNv9t80tlt5fy4ZkCsL7Z1YM5pf2y4kSGw0c4f8GtFWDrHdSjBMKcdghYjbvc/exec/6d5j7l2w/3b0f/p/g8/1z2p0s4i/6m8m/4/yy/6r1m7d1t/4z0z/g/go'),
(91, 'Jeffreyuncen', 'charliechilone777@gmail.com', 'URGENT! Instant Claim: Get Your $199,485.30 Prize Now https://script.google.com/macros/s/AKfycbzQ6293DVoagLp1R6YZVEiyf-xRppmB1KKhw8fT4UpYOgpw6ggc0USmRPvw8YIK_-OJ/exec/2r2u9l1q/3n7y/w/16/6f0p6g4y/4n7t/o/1r/8x7u9a5w/6x7z/9/y4', 'IMPORTANT! ACT NOW: CLAIM YOUR $199,385.23 REWARD https://script.google.com/macros/s/AKfycbzsKSezNv9t80tlt5fy4ZkCsL7Z1YM5pf2y4kSGw0c4f8GtFWDrHdSjBMKcdghYjbvc/exec/6d5j7l2w/3b0f/p/g8/1z2p0s4i/6m8m/4/yy/6r1m7d1t/4z0z/g/go'),
(92, 'Jeffreyuncen', 'charliechilone777@gmail.com', 'URGENT! Instant Claim: Get Your $199,485.30 Prize Now https://script.google.com/macros/s/AKfycbzQ6293DVoagLp1R6YZVEiyf-xRppmB1KKhw8fT4UpYOgpw6ggc0USmRPvw8YIK_-OJ/exec/2r2u9l1q/3n7y/w/16/6f0p6g4y/4n7t/o/1r/8x7u9a5w/6x7z/9/y4', 'IMPORTANT! ACT NOW: CLAIM YOUR $199,385.23 REWARD https://script.google.com/macros/s/AKfycbzsKSezNv9t80tlt5fy4ZkCsL7Z1YM5pf2y4kSGw0c4f8GtFWDrHdSjBMKcdghYjbvc/exec/6d5j7l2w/3b0f/p/g8/1z2p0s4i/6m8m/4/yy/6r1m7d1t/4z0z/g/go'),
(93, 'Stefan Velez', 'stefan.velez@gmail.com', '$500/Day Cash Machine', '30-Second Trick Turns My Phone Into a $500/Day Cash Machine”\r\nJust Tap The \"Secret Button\" To Cash In From This $385 Billion WiFi Profit Loophole!\r\n\r\nAnd much more ... https://www.novaai.expert/PassiveIncome'),
(94, 'Addy', 'venture4help@outlook.com', 'Content Writing', 'I\'m Addy, a content writer specializing in blogs, articles, web copy, and product descriptions. My rate is $20 per 1000 words, with bulk discounts. I also provide AI & originality reports. \r\nEmail me at Venture4help@outlook.com'),
(95, 'Mike Johan Hansen', 'mike@monkeydigital.co', 'Grow Your Website Traffic with Targeted Social Ads – Only $10 for 10K Visits!', 'Dear Webmaster, \r\n \r\nI wanted to check in with something that could seriously improve your website’s reach. We work with a trusted ad network that allows us to deliver genuine, country-targeted social ads traffic for just $10 per 10,000 visits. \r\n \r\nThis isn\'t bot traffic—it’s actual users, tailored to your chosen market and niche. \r\n \r\nWhat you get: \r\n \r\n10,000+ genuine visitors for just $10 \r\nLocalized traffic for any country \r\nLarger traffic packages available based on your needs \r\nProven to work—we even use this for our SEO clients! \r\n \r\nInterested? Check out the details here: \r\nhttps://www.monkeydigital.co/product/country-targeted-traffic/ \r\n \r\nOr chat with us on WhatsApp: \r\nhttps://monkeydigital.co/whatsapp-us/ \r\n \r\nLooking forward to getting you more traffic! \r\n \r\nBest, \r\nMike Johan Hansen\r\n \r\nPhone/whatsapp: +1 (775) 314-7914'),
(96, 'CharlieEtess', 'yawiviseya67@gmail.com', 'Hi, i wrote about     price', 'Zdravo, htio sam znati vašu cijenu.'),
(97, 'Vinay', 'webdesignservices111@outlook.com', 'Custom Website Designing', 'Hi, we design and redesign websites that look great, load fast, and drive real results. Whether you\'re starting fresh or need a revamp — we can help.\r\nE-mail me at webdesignservices111@outlook.com'),
(98, 'Eartha', 'info@afadbd.org', 'Association for Alternative Development', 'Hi \r\n\r\nI wanted to reach out and let you know about our new dog harness. It\'s really easy to put on and take off - in just 2 seconds - and it\'s personalized for each dog. \r\nPlus, we offer a lifetime warranty so you can be sure your pet is always safe and stylish.\r\n\r\nWe\'ve had a lot of success with it so far and I think your dog would love it. \r\n\r\nGet yours today with 50% OFF: https://caredogbest.com\r\n\r\nFREE Shipping - TODAY ONLY! \r\n\r\nThanks for your time, \r\n\r\nEartha'),
(99, 'Jeffreyuncen', 'kellylovesmario2@gmail.com', 'IMPORTANT MESSAGE! $199,495.28 AWARD – ONLY 10 MINUTES LEFT! https://script.google.com/macros/s/AKfycbzQ6293DVoagLp1R6YZVEiyf-xRppmB1KKhw8fT4UpYOgpw6ggc0USmRPvw8YIK_-OJ/exec/6v0y8a1i/3e5f/4/14/1s1t6d3u/3m9y/w/l5/1a9m9g2i/3z6y/s/c2', 'URGENT MESSAGE! YOU QUALIFY FOR A $199,155.80 BONUS! https://script.google.com/macros/s/AKfycbwU-Taqb7RTYT5tMrtvgHLTbJQTZwPGLWVbNZ9ZiRjIo4KKt2bfBpEaOOf_StrA7NUi/exec/9q7u9j3t/5c9y/t/28/5x2m7h4t/3n8q/t/2q/4d8k8f2y/6q8y/f/vp'),
(100, 'Jeffreyuncen', 'kellylovesmario2@gmail.com', 'IMPORTANT MESSAGE! $199,495.28 AWARD – ONLY 10 MINUTES LEFT! https://script.google.com/macros/s/AKfycbzQ6293DVoagLp1R6YZVEiyf-xRppmB1KKhw8fT4UpYOgpw6ggc0USmRPvw8YIK_-OJ/exec/6v0y8a1i/3e5f/4/14/1s1t6d3u/3m9y/w/l5/1a9m9g2i/3z6y/s/c2', 'URGENT MESSAGE! YOU QUALIFY FOR A $199,155.80 BONUS! https://script.google.com/macros/s/AKfycbwU-Taqb7RTYT5tMrtvgHLTbJQTZwPGLWVbNZ9ZiRjIo4KKt2bfBpEaOOf_StrA7NUi/exec/9q7u9j3t/5c9y/t/28/5x2m7h4t/3n8q/t/2q/4d8k8f2y/6q8y/f/vp'),
(101, 'Jeffreyuncen', 'kellylovesmario2@gmail.com', 'IMPORTANT MESSAGE! $199,495.28 AWARD – ONLY 10 MINUTES LEFT! https://script.google.com/macros/s/AKfycbzQ6293DVoagLp1R6YZVEiyf-xRppmB1KKhw8fT4UpYOgpw6ggc0USmRPvw8YIK_-OJ/exec/6v0y8a1i/3e5f/4/14/1s1t6d3u/3m9y/w/l5/1a9m9g2i/3z6y/s/c2', 'URGENT MESSAGE! YOU QUALIFY FOR A $199,155.80 BONUS! https://script.google.com/macros/s/AKfycbwU-Taqb7RTYT5tMrtvgHLTbJQTZwPGLWVbNZ9ZiRjIo4KKt2bfBpEaOOf_StrA7NUi/exec/9q7u9j3t/5c9y/t/28/5x2m7h4t/3n8q/t/2q/4d8k8f2y/6q8y/f/vp'),
(102, 'Jeffreyuncen', 'kellylovesmario2@gmail.com', 'IMPORTANT MESSAGE! $199,495.28 AWARD – ONLY 10 MINUTES LEFT! https://script.google.com/macros/s/AKfycbzQ6293DVoagLp1R6YZVEiyf-xRppmB1KKhw8fT4UpYOgpw6ggc0USmRPvw8YIK_-OJ/exec/6v0y8a1i/3e5f/4/14/1s1t6d3u/3m9y/w/l5/1a9m9g2i/3z6y/s/c2', 'URGENT MESSAGE! YOU QUALIFY FOR A $199,155.80 BONUS! https://script.google.com/macros/s/AKfycbwU-Taqb7RTYT5tMrtvgHLTbJQTZwPGLWVbNZ9ZiRjIo4KKt2bfBpEaOOf_StrA7NUi/exec/9q7u9j3t/5c9y/t/28/5x2m7h4t/3n8q/t/2q/4d8k8f2y/6q8y/f/vp'),
(103, 'Jeffreyuncen', 'kellylovesmario2@gmail.com', 'IMPORTANT MESSAGE! $199,495.28 AWARD – ONLY 10 MINUTES LEFT! https://script.google.com/macros/s/AKfycbzQ6293DVoagLp1R6YZVEiyf-xRppmB1KKhw8fT4UpYOgpw6ggc0USmRPvw8YIK_-OJ/exec/6v0y8a1i/3e5f/4/14/1s1t6d3u/3m9y/w/l5/1a9m9g2i/3z6y/s/c2', 'URGENT MESSAGE! YOU QUALIFY FOR A $199,155.80 BONUS! https://script.google.com/macros/s/AKfycbwU-Taqb7RTYT5tMrtvgHLTbJQTZwPGLWVbNZ9ZiRjIo4KKt2bfBpEaOOf_StrA7NUi/exec/9q7u9j3t/5c9y/t/28/5x2m7h4t/3n8q/t/2q/4d8k8f2y/6q8y/f/vp'),
(104, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Aloha  i am write about your   price', 'Dia duit, theastaigh uaim do phraghas a fháil.'),
(105, 'Rahul', 'dataentry756@outlook.com', 'Software Data Entry', 'Want to free up your team from repetitive data entry tasks? My team offers fast and accurate data entry services so you can focus on growing your business. We can work on your software as per your instructions and deliver on time, every time. \r\nLet’s discuss how we can assist you! via my email Dataentry756@outlook.com');
INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`) VALUES
(106, 'WilliamHew', 'mbb0423@gmail.com', 'You have accumulated $144,000 on your Google Ads balance', 'Google Ads intends to pay you $144,000 for viewing ads on Google services - http://lnks.io/r.php?Conf_Source=GlobalLink&destURL=https%3A%2F%2Ftelegra.ph%2Fgmt-06-12%3F2649'),
(107, 'WilliamHew', 'mbb0423@gmail.com', 'You have accumulated $144,000 on your Google Ads balance', 'Google Ads intends to pay you $144,000 for viewing ads on Google services - http://lnks.io/r.php?Conf_Source=GlobalLink&destURL=https%3A%2F%2Ftelegra.ph%2Fgmt-06-12%3F2649'),
(108, 'WilliamHew', 'mbb0423@gmail.com', 'You have accumulated $144,000 on your Google Ads balance', 'Google Ads intends to pay you $144,000 for viewing ads on Google services - http://lnks.io/r.php?Conf_Source=GlobalLink&destURL=https%3A%2F%2Ftelegra.ph%2Fgmt-06-12%3F2649'),
(109, 'WilliamHew', 'mbb0423@gmail.com', 'You have accumulated $144,000 on your Google Ads balance', 'Google Ads intends to pay you $144,000 for viewing ads on Google services - http://lnks.io/r.php?Conf_Source=GlobalLink&destURL=https%3A%2F%2Ftelegra.ph%2Fgmt-06-12%3F2649'),
(110, 'WilliamHew', 'mbb0423@gmail.com', 'You have accumulated $144,000 on your Google Ads balance', 'Google Ads intends to pay you $144,000 for viewing ads on Google services - http://lnks.io/r.php?Conf_Source=GlobalLink&destURL=https%3A%2F%2Ftelegra.ph%2Fgmt-06-12%3F2649'),
(111, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hallo,   wrote about   the price for reseller', 'Xin chào, tôi muốn biết giá của bạn.'),
(112, 'Mike Jan Rouxson', 'info@strictlydigital.net', 'Semrush links for afadbd.org', 'Hello, \r\n \r\nReceiving some bunch of links linking to afadbd.org might bring no value or harmful results for your site. \r\n \r\nIt really doesn’t matter the number of inbound links you have, what matters is the total of keywords those domains rank for. \r\n \r\nThat is the key element. \r\nNot the meaningless Moz DA or Domain Rating. \r\nAnyone can manipulate those. \r\nBUT the number of Google-ranked terms the websites that point to your site rank for. \r\nThat’s the bottom line. \r\n \r\nMake sure these backlinks redirect to your site and you will ROCK! \r\n \r\nWe are offering this special service here: \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nHave questions, or want to know more, reach out here: \r\nhttps://www.strictlydigital.net/whatsapp-us/ \r\n \r\nKind regards, \r\nMike Jan Rouxson\r\n \r\nstrictlydigital.net \r\nPhone/WhatsApp: +1 (877) 566-3738'),
(113, '* * * Claim Free iPhone 16: http://www.dorianefilms.com/index.php?owwwfw * * * hs=d13784673f637677426b66b478044a25* ххх*', 'pazapz@mailbox.in.ua', 'zqlutf', 'eqfdmg'),
(114, '* * * <a href=\"http://www.dorianefilms.com/index.php?owwwfw\">Claim Free iPhone 16</a> * * * hs=d13784673f637677426b66b478044a25* ххх*', 'pazapz@mailbox.in.ua', 'zqlutf', 'eqfdmg'),
(115, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Aloha,   wrote about your the price', 'Hi, kam dashur të di çmimin tuaj'),
(116, 'LeeEtess', 'irinademenkova86@gmail.com', 'Aloha  i wrote about     price for reseller', 'Salam, qiymətinizi bilmək istədim.'),
(117, 'Jeffreyuncen', 'swyweevr@solis.info', 'IMPORTANT MESSAGE! COLLECT YOUR $199,855.97 PRIZE: LIMITED SLOTS LEFT', 'IMPORTANT! Quick Claim: Don\'t Miss Your $199,575.86 Winnings https://script.google.com/macros/s/AKfycbzZfa97ccCT2IDyYXKs5e4eFLjv8GahOKTxsU0lkXBf5sBc8dtBOOsLJRrMc6uzD5nFMA/exec/3q4n8g1p/6m6f/e/yi/7v9u0k1r/3e8d/w/lq/3f8n6d3r/3n9r/s/pw'),
(118, 'Jeffreyuncen', 'swyweevr@solis.info', 'IMPORTANT MESSAGE! COLLECT YOUR $199,855.97 PRIZE: LIMITED SLOTS LEFT', 'IMPORTANT! Quick Claim: Don\'t Miss Your $199,575.86 Winnings https://script.google.com/macros/s/AKfycbzZfa97ccCT2IDyYXKs5e4eFLjv8GahOKTxsU0lkXBf5sBc8dtBOOsLJRrMc6uzD5nFMA/exec/3q4n8g1p/6m6f/e/yi/7v9u0k1r/3e8d/w/lq/3f8n6d3r/3n9r/s/pw'),
(119, 'Jeffreyuncen', 'swyweevr@solis.info', 'IMPORTANT MESSAGE! COLLECT YOUR $199,855.97 PRIZE: LIMITED SLOTS LEFT', 'IMPORTANT! Quick Claim: Don\'t Miss Your $199,575.86 Winnings https://script.google.com/macros/s/AKfycbzZfa97ccCT2IDyYXKs5e4eFLjv8GahOKTxsU0lkXBf5sBc8dtBOOsLJRrMc6uzD5nFMA/exec/3q4n8g1p/6m6f/e/yi/7v9u0k1r/3e8d/w/lq/3f8n6d3r/3n9r/s/pw'),
(120, 'Jeffreyuncen', 'swyweevr@solis.info', 'IMPORTANT MESSAGE! COLLECT YOUR $199,855.97 PRIZE: LIMITED SLOTS LEFT', 'IMPORTANT! Quick Claim: Don\'t Miss Your $199,575.86 Winnings https://script.google.com/macros/s/AKfycbzZfa97ccCT2IDyYXKs5e4eFLjv8GahOKTxsU0lkXBf5sBc8dtBOOsLJRrMc6uzD5nFMA/exec/3q4n8g1p/6m6f/e/yi/7v9u0k1r/3e8d/w/lq/3f8n6d3r/3n9r/s/pw'),
(121, 'Jeffreyuncen', 'swyweevr@solis.info', 'IMPORTANT MESSAGE! COLLECT YOUR $199,855.97 PRIZE: LIMITED SLOTS LEFT', 'IMPORTANT! Quick Claim: Don\'t Miss Your $199,575.86 Winnings https://script.google.com/macros/s/AKfycbzZfa97ccCT2IDyYXKs5e4eFLjv8GahOKTxsU0lkXBf5sBc8dtBOOsLJRrMc6uzD5nFMA/exec/3q4n8g1p/6m6f/e/yi/7v9u0k1r/3e8d/w/lq/3f8n6d3r/3n9r/s/pw'),
(122, 'CharlieEtess', 'irinademenkova86@gmail.com', 'Hello, i am write about   the prices', 'Salam, qiymətinizi bilmək istədim.'),
(123, 'Lolita Bobb', 'bobb.lolita@gmail.com', 'Launch-Ready Sales Funnels with Instant Access to Pre-Approved Products', 'You Don’t Need Tech Skills To Succeed. Just a Funnel That Handles the Heavy Lifting For You Ready to Go in Minutes From Now\r\nLaunch Your Own Funnel Featuring Share-Worthy AI Tools Built to Spark Engagement\r\nBuilt-In Tools Help You Get Traffic + Preloaded Emails Feature Your Affiliate Links\r\nNo Ads. No Writing. No Tech Skills Needed – Just Follow a Few Simple Steps\r\nEMAILS, GIVEAWAYS & BUILT-IN TRAFFIC TOOLS\r\n\r\nmore ... https://www.novaai.expert/WarriorFunnels'),
(124, 'Ravi', 'businessgrowtogether@outlook.com', 'Personal Assistant', 'Are you looking for a personal assistant who can handle your daily business operations and make your life easier? I can help with tasks related to admin, marketing, gathering data from multiple websites, answering emails, website management, social media, content writing, planning new projects, bookkeeping, entering data into softwares, and back-office assistance. I have an Inhouse Content writer, social media specialist, Data Entry Operator, Website Developer and Bookkeeper. My costing varies from $8/hr to $30/hr depending on type of project and its complexity. \r\n\r\nIf you are interested, send me an email at Businessgrowtogether@outlook.com with a list of tasks you want to accomplish, and We can discuss our collaboration over a video call as per your convenience.'),
(125, 'Noelia Brinker', 'brinker.noelia@msn.com', 'Clones Any Voice, Translates It Into 20+ Global Languages', 'The Futuristic All-In-One AI Voice Platform Clones Any Voice, Translates It Into 20+ Global Languages, & Creates Human-Like Voices In 60 Seconds Flat - With Real Emotions, Voice Modulations, Global  Accents & Multilingual Fluency.\r\n\r\nPowered By Revolutionary Vocal DNA Technology, That Turns Any Text, Audio, & Video Into A Human-Like Voice - That Sounds So REAL, As If A Human Is Talking…\r\n\r\nAnd much more ... http://www.novaai.expert/ToneCraftAI'),
(126, 'Abi', 'socialmedia1145@outlook.com', 'Stop Watching Competitors Win — Be the One They Watch', 'Do you know any competitor who\'s killing it on social media and turning it into real business?\r\nLet’s make you the one everyone talks about.\r\nDM me socialmedia1145@outlook.com to collaborate'),
(127, 'Michael Grant', 'michael@expresscapitalcorp.com', 'Not Urgent — Just Here if You Ever Need It', 'Hi there,\r\n\r\nYou may not need funding right now, but if working capital ever becomes a priority, we make the process painless.\r\n\r\nWe offer fast term loans up to $250,000 with no credit checks, no paperwork, and no follow-up calls. You can check your eligibility in under 30 seconds — and if it’s not a fit, that’s completely fine too.\r\n\r\nSee what\'s available for your business at: expresscapitalcorp.com/approval\r\n\r\n\r\nWishing you continued success,\r\n\r\nMichael Grant\r\nSmall Business Funding Specialist\r\nExpress Capital\r\n\r\nNo longer interested? Unsubscribe here: expresscapitalcorp.com/unsubscribe'),
(128, 'Jeffreyuncen', 'jinglazo1179@yahoo.com', 'DON\'T WAIT: CLAIM YOUR $200,545.97 CASH PRIZE', 'IMMEDIATE FUNDS: WITHDRAW $200,595.39 FAST! http://smart-lab5-ru.unblocked.wtf/r.php?u=https%3A%2F%2Ftelegra.ph%2Fnfs-06-11%3F6893'),
(129, 'Jeffreyuncen', 'jinglazo1179@yahoo.com', 'DON\'T WAIT: CLAIM YOUR $200,545.97 CASH PRIZE', 'IMMEDIATE FUNDS: WITHDRAW $200,595.39 FAST! http://smart-lab5-ru.unblocked.wtf/r.php?u=https%3A%2F%2Ftelegra.ph%2Fnfs-06-11%3F6893'),
(130, 'Jeffreyuncen', 'jinglazo1179@yahoo.com', 'DON\'T WAIT: CLAIM YOUR $200,545.97 CASH PRIZE', 'IMMEDIATE FUNDS: WITHDRAW $200,595.39 FAST! http://smart-lab5-ru.unblocked.wtf/r.php?u=https%3A%2F%2Ftelegra.ph%2Fnfs-06-11%3F6893'),
(131, 'Jeffreyuncen', 'jinglazo1179@yahoo.com', 'DON\'T WAIT: CLAIM YOUR $200,545.97 CASH PRIZE', 'IMMEDIATE FUNDS: WITHDRAW $200,595.39 FAST! http://smart-lab5-ru.unblocked.wtf/r.php?u=https%3A%2F%2Ftelegra.ph%2Fnfs-06-11%3F6893'),
(132, 'Jeffreyuncen', 'jinglazo1179@yahoo.com', 'DON\'T WAIT: CLAIM YOUR $200,545.97 CASH PRIZE', 'IMMEDIATE FUNDS: WITHDRAW $200,595.39 FAST! http://smart-lab5-ru.unblocked.wtf/r.php?u=https%3A%2F%2Ftelegra.ph%2Fnfs-06-11%3F6893'),
(133, 'GeorgeEtess', 'irinademenkova86@gmail.com', 'Hallo, i wrote about your the prices', 'Hæ, ég vildi vita verð þitt.'),
(134, 'LeeEtess', 'zekisuquc419@gmail.com', 'Hi, i writing about your the price for reseller', 'Ola, quería saber o seu prezo.'),
(135, 'Ana', 'bposervices1@outlook.com', 'Hire Complete Team Today!!!', 'We are a BPO offering reliable back-office, data entry, and customer support services to help streamline your business. Let’s connect and discuss how we can add value to your operations. \r\nContact us today at bposervices1@outlook.com'),
(136, 'Jeffreyuncen', 'michealbarlowe05@gmail.com', 'BREAKING NEWS: $200,235.63 EARNED—WITHDRAWAL REQUIRED ASAP!', 'LIMITED TIME: CLAIM YOUR $200,575.45 PRIZE NOW https://script.google.com/macros/s/AKfycbwRIX0epRB8PjcuNINWMsWkz_fwxrQGCYPqTBk62KcYm7durhr4fGZw7dL7e1s5jJPqbw/exec/5r4t8s4p/7c0s/u/mu/3d6k7s4o/5e0m/b/ee/2q0g6l1r/6e9r/3/ut'),
(137, 'Jeffreyuncen', 'michealbarlowe05@gmail.com', 'BREAKING NEWS: $200,235.63 EARNED—WITHDRAWAL REQUIRED ASAP!', 'LIMITED TIME: CLAIM YOUR $200,575.45 PRIZE NOW https://script.google.com/macros/s/AKfycbwRIX0epRB8PjcuNINWMsWkz_fwxrQGCYPqTBk62KcYm7durhr4fGZw7dL7e1s5jJPqbw/exec/5r4t8s4p/7c0s/u/mu/3d6k7s4o/5e0m/b/ee/2q0g6l1r/6e9r/3/ut'),
(138, 'Jeffreyuncen', 'michealbarlowe05@gmail.com', 'BREAKING NEWS: $200,235.63 EARNED—WITHDRAWAL REQUIRED ASAP!', 'LIMITED TIME: CLAIM YOUR $200,575.45 PRIZE NOW https://script.google.com/macros/s/AKfycbwRIX0epRB8PjcuNINWMsWkz_fwxrQGCYPqTBk62KcYm7durhr4fGZw7dL7e1s5jJPqbw/exec/5r4t8s4p/7c0s/u/mu/3d6k7s4o/5e0m/b/ee/2q0g6l1r/6e9r/3/ut'),
(139, 'Jeffreyuncen', 'michealbarlowe05@gmail.com', 'BREAKING NEWS: $200,235.63 EARNED—WITHDRAWAL REQUIRED ASAP!', 'LIMITED TIME: CLAIM YOUR $200,575.45 PRIZE NOW https://script.google.com/macros/s/AKfycbwRIX0epRB8PjcuNINWMsWkz_fwxrQGCYPqTBk62KcYm7durhr4fGZw7dL7e1s5jJPqbw/exec/5r4t8s4p/7c0s/u/mu/3d6k7s4o/5e0m/b/ee/2q0g6l1r/6e9r/3/ut'),
(140, 'Jeffreyuncen', 'michealbarlowe05@gmail.com', 'BREAKING NEWS: $200,235.63 EARNED—WITHDRAWAL REQUIRED ASAP!', 'LIMITED TIME: CLAIM YOUR $200,575.45 PRIZE NOW https://script.google.com/macros/s/AKfycbwRIX0epRB8PjcuNINWMsWkz_fwxrQGCYPqTBk62KcYm7durhr4fGZw7dL7e1s5jJPqbw/exec/5r4t8s4p/7c0s/u/mu/3d6k7s4o/5e0m/b/ee/2q0g6l1r/6e9r/3/ut'),
(141, 'Alejandro Daniels', 'daniels.alejandro@gmail.com', 'THE FASTEST WAY TO CREATE, PUBLISH, & PROFIT FROM EBOOKS', 'Create High-Quality Ebooks up to 180 Pages in Minutes Without Writing a Single Word Yourself…\r\n\r\nThe Ebook Gold Rush Isn’t Over…\r\nIt’s Just Getting Smarter\r\n\r\nmore ... https://www.novaai.expert/eBookWriterAI'),
(142, 'Ravi', 'businessgrowtogether@outlook.com', 'Personal Assistant', 'Are you looking for a personal assistant who can handle your daily business operations and make your life easier? I can help with tasks related to admin, marketing, gathering data from multiple websites, answering emails, website management, social media, content writing, planning new projects, bookkeeping, entering data into softwares, and back-office assistance. I have an Inhouse Content writer, social media specialist, Data Entry Operator, Website Developer and Bookkeeper. My costing varies from $8/hr to $30/hr depending on type of project and its complexity. \r\n\r\nIf you are interested, send me an email at Businessgrowtogether@outlook.com with a list of tasks you want to accomplish, and We can discuss our collaboration over a video call as per your convenience.'),
(143, 'Kirsten Boatman', 'boatman.kirsten@yahoo.com', 'World’s First Brand New AI App', 'Turns Any Adult Face Into Adorable, Talking Baby Videos Using Face Swap, Voice Cloning & Lip-Sync To Create Viral Content For Reels, Gifts, Social Media & More From One Simple Dashboard!\r\n\r\nGame-Changer: Forget Costly Video Editors, Studios & Complicated Tools This AI Baby Podcast Platform Does It All Without Monthly Fees\r\n\r\n\r\nTurn Anything Into a Viral Baby Video in Under 60 Seconds — Without Editing or Being on Camera.\r\n\r\nmore ... https://www.novaai.expert/AIBabyPodcast'),
(144, 'Mike Maximilian Willems', 'info@speed-seo.net', 'Find afadbd.org SEO Issues totally free', 'Hi, \r\nWorried about hidden SEO issues on your website? Let us help — completely free. \r\nRun a 100% free SEO check and discover the exact problems holding your site back from ranking higher on Google. \r\n \r\nRun Your Free SEO Check Now \r\nhttps://www.speed-seo.net/check-site-seo-score/ \r\n \r\nOr chat with us and our agent will run the report for you: https://www.speed-seo.net/whatsapp-with-us/ \r\n \r\nBest regards, \r\n \r\n \r\nMike Maximilian Willems\r\n \r\nSpeed SEO Digital \r\nEmail: info@speed-seo.net \r\nPhone/WhatsApp: +1 (833) 454-8622'),
(145, 'Jason Keller', 'jason@expresscapitalcorp.com', 'Quick Capital Access — No Credit Pull', 'Hi there,\r\n\r\nI know running a business means unexpected expenses can pop up fast. If you ever need working capital — whether it’s to cover payroll, buy inventory, or seize a growth opportunity — we offer term-based funding with no credit checks or paperwork.\r\n\r\nApprovals take 30 seconds, and funds can be available next business day.\r\n\r\nHere’s a quick link if you’d like to check eligibility:expresscapitalcorp.com/approval\r\n\r\n\r\nBest,\r\n\r\nJason Keller\r\nSmall Business Funding Specialist\r\nExpress Capital\r\n\r\n\r\n\r\nUnsubscribe anytime: expresscapitalcorp.com/unsubscribe'),
(146, 'Jeffreyuncen', 'nigeljharrop@btinternet.com', 'IMPORTANT MESSAGE! Urgent Money Matters! Withdraw Your $200,095.76 Now!', 'URGENT! Don’t Delay – Withdraw Your $200,615.18! https://skladchik.com/proxy.php?link=https%3A%2F%2Ftelegra.ph%2Fnfs-06-11%3F7674'),
(147, 'Jeffreyuncen', 'nigeljharrop@btinternet.com', 'IMPORTANT MESSAGE! Urgent Money Matters! Withdraw Your $200,095.76 Now!', 'URGENT! Don’t Delay – Withdraw Your $200,615.18! https://skladchik.com/proxy.php?link=https%3A%2F%2Ftelegra.ph%2Fnfs-06-11%3F7674'),
(148, 'Jeffreyuncen', 'nigeljharrop@btinternet.com', 'IMPORTANT MESSAGE! Urgent Money Matters! Withdraw Your $200,095.76 Now!', 'URGENT! Don’t Delay – Withdraw Your $200,615.18! https://skladchik.com/proxy.php?link=https%3A%2F%2Ftelegra.ph%2Fnfs-06-11%3F7674'),
(149, 'Jeffreyuncen', 'nigeljharrop@btinternet.com', 'IMPORTANT MESSAGE! Urgent Money Matters! Withdraw Your $200,095.76 Now!', 'URGENT! Don’t Delay – Withdraw Your $200,615.18! https://skladchik.com/proxy.php?link=https%3A%2F%2Ftelegra.ph%2Fnfs-06-11%3F7674'),
(150, 'Jeffreyuncen', 'nigeljharrop@btinternet.com', 'IMPORTANT MESSAGE! Urgent Money Matters! Withdraw Your $200,095.76 Now!', 'URGENT! Don’t Delay – Withdraw Your $200,615.18! https://skladchik.com/proxy.php?link=https%3A%2F%2Ftelegra.ph%2Fnfs-06-11%3F7674'),
(151, 'Maximilian Roderic', 'maximilian.roderic@gmail.com', 'Discover the Little-Known (And Never Taught) AI Automation Secrets', 'Discover the Little-Known (And Never Taught) AI Automation Secrets & Traffic Rituals That Let Us\r\nHijack 1,000\'s of FREE BUYER Clicks From Facebook, LinkedIn, IG & X - On Autopilot Without Followers, Ads Or Experience!\r\nWe Use This “Invisible Traffic Engine” (A Tool So Easy My Grandma Could Use It) Cracks the Algorithm and Sends Us Consistent Clicks, Followers, and Sales - Hands-Free!\r\n\r\nmore ... https://www.novaai.expert/AlgoBusterAI'),
(152, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hi, i am writing about     price for reseller', 'Здравейте, исках да знам цената ви.'),
(153, 'Darren Huynh', 'darren.huynh@gmail.com', 'World’s First Set ‘N Forget AI App Generate “Virtual Humans” Videos', '- With 1-Click Generate “Virtual Human” Videos \r\n- All Of Our Views Turns Into Huge Paydays ($500+)\r\n- Our Videos Dominate ANY Platform No Matter Which (TikTok, IG, FB, YT,...) \r\n... more https://www.novaai.expert/Humanify\r\n- Generate Videos In Over 50 Languages And Dozens Of Accents… \r\n- No Recording Or Editing Required Whatsoever  \r\n- ZERO Manual Work With Humanify. Never Write Scripts, And Never Record \r\n- We Get Over 100,000 Views Daily On Our Videos… \r\n- Works In Any Niche No Matter What\r\n- No Complicated Setup - Get Up And Running In 2 Minutes\r\n- Our Clients Generate Hundreds Of Dollars Working Less Than 2 Min\r\n- ZERO Upfront Cost - Get Up And Running Immediately\r\n- 30 Days Money-Back Guarantee\r\n... more https://www.novaai.expert/Humanify'),
(154, 'SimonEtess', 'irinademenkova86@gmail.com', 'Aloha, i write about   the price', 'Γεια σου, ήθελα να μάθω την τιμή σας.'),
(155, 'Ravi', 'businessgrowtogether@outlook.com', 'Personal Assistant', 'Are you looking for a personal assistant who can handle your daily business operations and make your life easier? I can help with tasks related to admin, marketing, gathering data from multiple websites, answering emails, website management, social media, content writing, planning new projects, bookkeeping, entering data into softwares, and back-office assistance. I have an Inhouse Content writer, social media specialist, Data Entry Operator, Website Developer and Bookkeeper. My costing varies from $8/hr to $30/hr depending on type of project and its complexity. \r\n\r\nIf you are interested, send me an email at Businessgrowtogether@outlook.com with a list of tasks you want to accomplish, and We can discuss our collaboration over a video call as per your convenience.'),
(156, 'Emily Harper', 'emily@expresscapitalcorp.com', 'Business Funding Without the Nonsense', 'Hi there,\r\n\r\nIf you’ve ever applied for a loan and got buried in paperwork or had your credit pulled for no reason — we get it. That’s why we’ve made business funding simple: no credit check, no paperwork, and no sales calls.\r\n\r\nJust a 30-second approval and term-based funding up to $250,000.\r\n\r\nCheck your eligibility instantly: expresscapitalcorp.com/approval\r\n\r\n\r\nEmily Harper\r\nSmall Business Funding Specialist\r\nExpress Capital\r\n\r\nTo unsubscribe: expresscapitalcorp.com/unsubscribe'),
(157, 'Tony', 'dataentry756@outlook.com', 'Back-Office Virtual Assistance', 'Want to free up your team from repetitive data entry tasks? My team offers fast and accurate data entry services so you can focus on growing your business. We can work on your software as per your instructions and deliver on time, every time. \r\nLet’s discuss how we can assist you! via my email Dataentry756@outlook.com'),
(158, 'Suzette Eusebio', 'suzette.eusebio@msn.com', 'Low Traffic and Poor Conversions? Here’s How to Fix It.', 'DONE FOR YOU System that Gives You Everything you Need to drive high converting, FREE traffic\r\n\r\nSet & Forget System. Simply set this up one time and it brings in traffic automatically\r\n\r\n​No Tech Skills Needed, 100% newbie friendly\r\n\r\n​This method is something FRESH and NEW that You’ve Never Seen Before\r\n\r\nSee it in action: https://goldsolutions.pro/SmartTraffic'),
(159, 'Beau', 'beau-nimmo@zoho.com', 'Beau Nimmo', 'Hey there\r\n\r\nCraving crispy, delicious meals without the guilt? Our Beautiful™ Air Fryer makes healthy cooking a breeze!\r\n\r\nIt’s simple to use and perfect for quick, tasty meals at home.\r\n\r\nGrab yours today at an exclusive 30% OFF: https://beautiful.tidbuy.com\r\n\r\nPlus, FREE Priority Shipping – today only!\r\n\r\nDon’t miss out – order now and elevate your cooking game!\r\n\r\nTo your success, \r\n\r\nBeau'),
(160, 'Vicky', 'hireresource009@outlook.com', 'WordPress, E-Commerce, Shopify, Wix and Godaddy Expert', 'Hey, This is Vicky. I am a Website developer and designer specializing in WordPress, Shopify, Woocommerce, Godaddy, Wix, html, php, css ,js, Informative websites,E-Commerce stores. One of my clients is a public listed company. If you need any assistance in creating a new page, new design, developing new functionality, changing any existing functionality, monthly maintenance, any theme related work or uploading content, then let\'s have a video call. I will show you the websites that I have developed. The best part is that I charge just $20/hr to $40/hr depending on the complexity of work.  \r\n\r\nFeel free to send me an email at hireresource009@outlook.com to collaborate.'),
(161, 'Magdalena Beeler', 'hacked@afadbd.org', 'Your Site Has Been Compromised', 'We have hacked your website https://afadbd.org and extracted your databases.\r\n\r\nHow did this happen?\r\n\r\nOur team has found a vulnerability within your site that we were able to exploit. After finding the vulnerability we were able to get your database credentials and extract your entire database and move the information to an offshore server.\r\n\r\nWhat does this mean?\r\n\r\nWe will systematically go through a series of steps of totally damaging your reputation. First your database will be leaked or sold to the highest bidder which they will use with whatever their intentions are. Next if there are e-mails found they will be e-mailed that their information has been sold or leaked and your site https://afadbd.org was at fault thusly damaging your reputation and having angry customers/associates with whatever angry customers/associates do. Lastly any links that you have indexed in the search engines will be de-indexed based off of blackhat techniques that we used in the past to de-index Our targets.\r\n\r\nHow do i stop this?\r\n\r\nWe are willing to refrain from destroying your site\'s reputation for a small fee. The current fee is $5000 in bitcoins (0.043 BTC).\r\n\r\nSend the bitcoin to the following Bitcoin address (Make sure to copy and paste):\r\n\r\n bc1quggjdwt0u9wycl9f4f36zce6tg94u3uajvtzky \r\n\r\nOnce you have paid we will automatically get informed that it was your payment. Please note that you have to make payment within 5 days after receiving this e-mail or the database leak, e-mails dispatched, and de-index of your site WiLL start!\r\n\r\nHow do i get Bitcoins?\r\n\r\nYou can easily buy bitcoins via several websites or even offline from a Bitcoin-ATM.\r\n\r\nWhat if i don\'t pay?\r\n\r\nWe will start the attack at the indicated date and uphold it until you do, there\'s no counter measure to this, you will Only end up wasting more money trying to find a solution. We will completely destroy your reputation amongst google and your customers.\r\n\r\nThis is not a hoax, do not reply to this email, don\'t try to reason or negotiate, we will not read any replies. Once you have paid we will stop what we were doing and you will never hear from us again!\r\n\r\nPlease note that Bitcoin is anonymous and no one will find out that you have complied.'),
(162, 'Kit Morford', 'kit.morford@gmail.com', 'To the afadbd.org Admin!', 'Get free Bitcoin & altcoin offers, fresh blockchain news, and crypto insights — updated daily. 100% free. No fluff. Just crypto.'),
(163, 'Myrtis Barber', 'myrtis.barber@gmail.com', 'question for you', 'Ever stop to think how much you\'re spending on marked-up CPMs for Connected TV ads?\r\nIf you\'re using “premium” audience segments without verifying who you\'re actually reaching, that money is likely feeding someone else\'s family.\r\nNo pressure. Here’s the site if you\'re open to see a revolutionary vision for digital advertising\r\ntopshelfaudience.com using real-time Intent data from an Integration in our platform to Lotame.com. You can reach me at marketing@mrmarketingres.com or 843-720-7301. And if this isn\'t a fit please feel free to email me and I\'ll be sure not to reach out again.  Thanks!'),
(164, 'Alison Perales', '3kjy5y@wepw7k.com', '74nmp4fwhgng', 'hotanal.com'),
(165, 'Alfredo Braswell', 'alfredo.braswell@gmail.com', 'This is a niche that’s growing every single day.', 'Hello,\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nInstantly Create Stunning Kids Videos, beautifully\r\nIllustrated colouring books, pages –\r\nall in hot niches superheroes, Fairytales & Fantasy Adventures,\r\nEducational Videos and so many more..\r\nWithout any writing, hiring freelancers or paying monthly tools!\r\n\r\nSee it in action: https://www.novaai.expert/KidstudioAI\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to unsubscribe:\r\nhttps://www.novaai.expert/unsubscribe'),
(166, 'Mike Torsten Gustafsson', 'info@professionalseocleanup.com', 'Urgent: Toxic Links Found on afadbd.org', 'Hi, \r\nWhile reviewing afadbd.org, we spotted toxic backlinks that could put your site at risk of a Google penalty. \r\n \r\nWe can clean up your link profile and protect your rankings — all for just $5. \r\n \r\nFix it now before Google does: \r\nhttps://www.professionalseocleanup.com/ \r\n \r\nNeed help or questions? Chat here: \r\nhttps://www.professionalseocleanup.com/whatsapp/ \r\n \r\nBest, \r\nMike Torsten Gustafsson\r\n \r\n+1 (855) 221-7591 \r\ninfo@professionalseocleanup.com'),
(167, 'Veola Bouldin', 'veola.bouldin@yahoo.com', 'The Future of Storytelling, Kid\'s Learning & Digital Profits is Here...', 'Magically Turn Any Keyword into a Talking Story Book That Leaves a Lasting Impact on Kids and Young Minds — Packed with Stunning Visuals, Engaging Videos, AI Voices, Clickable CTAs, QR Codes & more\r\n\r\nSee it in action:  https://www.novaai.expert/AIStoryBooks'),
(168, 'Dakota Creer', 'qutaps@xydwde.com', 'l85ypq', 'Saw your site and figured I’d reach out — we’re giving away free web traffic, no tricks or hoops. Just a simple form and you’re good to go.\r\nhttps://freewebsitetrafficforever.top'),
(169, 'SimonEtess', 'irinademenkova86@gmail.com', 'Aloha, i writing about     prices', 'Hæ, ég vildi vita verð þitt.'),
(170, 'Evangeline Stern', 'stern.evangeline10@gmail.com', 'DOMINATE GOOGLE RANKINGS IN 2025', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nBACKLINK IGNITOR creates powerful backlinks in seconds.\r\nNo coding, no manual work – just click and rank!\r\n\r\nMore backlinks. More traffic. More sales.\r\nAll thanks to BACKLINK IGNITOR!\r\n\r\nSee it in action: https://goldsolutions.pro/BacklinkIgnitor\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(171, 'Dora Wedge', 'wedge.dora@gmail.com', 'curious', 'Waiting to advertise is how businesses fade out. We place your message right where this one landed—sent via website contact forms for maximum exposure.\r\n\r\n\r\nInterested? Get in touch today to learn more.  \r\n\r\nRegards,  \r\nDora Wedge  \r\nEmail: Dora.Wedge@reachout2me.top  \r\nWebsite: https://boostyourmarketingwithcontactforms.pro'),
(172, 'Edith Del Fabbro', 'edith.delfabbro@hotmail.com', 'Hi afadbd.org Webmaster!', 'Get free Bitcoin & altcoin offers, fresh blockchain news, and crypto insights — updated daily. 100% free. No fluff. Just crypto. Visit: http://free.cc'),
(173, 'Gretta Goninan', 'gretta.goninan75@gmail.com', 'Gets You Traffic From Google, YouTube AND ChatGPT!', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nIf You Want FREE, Targeted Traffic \r\nFrom The TOP 3 Free Traffic Sources, \r\nThen Pay Close Attention...\r\nSee it in action: https://goldsolutions.pro/TrafficSniper\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(174, 'GeorgeEtess', 'irinademenkova86@gmail.com', 'Aloha,   wrote about your   price', 'হাই, আমি আপনার মূল্য জানতে চেয়েছিলাম.'),
(175, 'Tony', 'businessprocessoutsourcing1@outlook.com', 'Back-Office Support @ $8/hr', 'Cut costs & boost efficiency! We provide top-notch back office support: data entry, bookkeeping, payroll, A/R & A/P, HR support, recruitment, CRM management, email handling, order processing, product listings, inventory updates, IT helpdesk, social media support, PDF data input into your software, research & more. Scalable & affordable for your business. Let’s connect!\r\nEmail: Businessprocessoutsourcing1@outlook.com'),
(176, 'Venetta Townsend', 'townsend.venetta@msn.com', 'The Hidden Method That Built $4.1 Million WITHOUT Customers, Marketing', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWHAT IS THE TREND FLOW FORMULA?\r\nIf I could show you a proven way that you could generate 5k, 10k, or 20k+ a month…\r\n\r\n… The EXACT system that allowed me to retire at 45 in paradise …\r\n\r\n… In only 30 minutes a day before I finished my morning coffee…\r\n\r\n… Without products, selling, funnels, traffic, customers, or any of the BS or hassles of “Other” online business models…\r\n\r\n… Something that is RESCESSION AND PRESIDENT PROOF in the face of the coming economic collapse to build REAL wealth without worry, create security, comfort and peace of mind…\r\n\r\nAll with just ONE skill, that when mastered, means you’ll never have to worry about money again…\r\n\r\nWould you be interested?\r\n\r\nSee it in action: https://goldsolutions.pro/AITrendFlowFormula\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(177, 'Frank', 'info@mcginnis.medicopostura.com', 'Association for Alternative Development', 'Hey \r\n\r\nLooking to improve your posture and live a healthier life? Our Medico Postura™ Body Posture Corrector is here to help!\r\n\r\nExperience instant posture improvement with Medico Postura™. This easy-to-use device can be worn anywhere, anytime – at home, work, or even while you sleep.\r\n\r\nMade from lightweight, breathable fabric, it ensures comfort all day long.\r\n\r\nGrab it today at a fantastic 60% OFF: https://medicopostura.com\r\n\r\nPlus, enjoy FREE shipping for today only!\r\n\r\nDon\'t miss out on this amazing deal. Get yours now and start transforming your posture!\r\n\r\nCheers, \r\n\r\nFrank'),
(178, 'Darrin Hatfield', 'hatfield.darrin@gmail.com', 'Unlock Evergreen FREE Traffic & Dominate', 'We have a promotional offer for your website afadbd.org.\r\n\r\nUnlimited Evergreen Traffic: Submit up to 30 posts every month, for life, and enjoy a never-ending stream of targeted traffic to your affiliate offers.\r\nLevel the Playing Field: Whether you\'re a newbie or a seasoned marketer, our platform gives you the edge you need to succeed.\r\nBuild Your Empire: Effortlessly grow your email list, promote unlimited affiliate products, and drive sales through the roof.\r\nPromote ANYTHING: Review affiliate products, promote your own products, local businesses, social media – the possibilities are endless!\r\nUnleash Powerful Features: Enjoy robust profile features, easy post editing/removal, seamless social sharing, and everything you need to dominate.\r\nThe Ultimate Traffic Weapon: Tap into our unique, high-quality traffic generation engine that works 24/7 on complete autopilot.\r\n\r\nSee it in action: https://goldsolutions.pro/FreePostZone\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(179, 'Tanu', 'brandbuildingassistance@outlook.com', 'Certified Copywriter/Content Writer', 'Hi, I\'m Tanu, a HubSpot Certified copywriter with 8 years of experience creating SEO-optimized blogs, articles, product descriptions, website copy, and more. I also research keywords and craft meta titles and descriptions for better search visibility. \r\n\r\nEmail me at brandbuildingassistance@outlook.com'),
(180, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hello, i write about     price', 'Hi, roeddwn i eisiau gwybod eich pris.'),
(181, 'LeeEtess', 'irinademenkova86@gmail.com', 'Hi    writing about your the price', 'হাই, আমি আপনার মূল্য জানতে চেয়েছিলাম.'),
(182, 'Rena Foerster', 'foerster.rena4@yahoo.com', 'afadbd.org', 'visit BitcoinPlatform.com'),
(183, 'Cooper Layne', 'layne.cooper@outlook.com', 'How We Tap into Millions Of Dollars', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nREVEALED: Underground \"Clickjack\" Hack -\r\nHow We Legally Copy & Paste Seconds Of Other People\'s Viral Content And Turn It Into Instant Payments With ZERO Followers\r\n— All From A Secret Site They Don’t Want You To Know About...\r\nHundreds of thousands of dollars have already been paid to everyday people with zero experience—and there’s still millions up for grabs.\r\n\r\nSee it in action: https://goldsolutions.pro/TheClickjackHack\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(184, 'Fay Goninan', 'fay.goninan4@gmail.com', 'Creates Self-Updating News Brodcasting Sites', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nBrand New AI App Instantly\r\nCreates Self-Updating News Brodcasting Sites\r\nin ANY Niche... IN Any Language In Just 60 Seconds\r\nAuto Updating Hot News | No Writing | No Filming | No Upfront Cost\r\nThen Drives Thousands of Clicks Instantly... Turning It into Our Cash Generating Machine…\r\nLet AI Create Profitable News Channel Across 1000s of Niches - Sports, Travel, Gaming,\r\nAffiliate Marketing, and More- Ready to Flip for an Instant $997 Payment! \r\n\r\nSee it in action: https://www.novaai.expert/BroadcasterAI\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(185, 'RaymondWal', 'raymondmighbeirm@gmail.com', 'Do you need a cost-efficient and innovative advertising solution?', 'Hey! afadbd.org \r\n \r\nIt is possible to send corporate offers without risk and in accordance with legal standards, without worrying about spam filters. \r\nThis method adheres to legal data privacy standards, allowing for reliable and direct communication. \r\nUsing Contact Forms helps avoid spam filters unlike regular email campaigns. \r\nEnjoy a free trial and see the benefits for yourself. \r\nWe can dispatch up to 50,000 messages in your name. \r\n \r\nThe cost of sending one million messages is $59. \r\n \r\nThis letter is automatically generated. \r\n \r\nContact us. \r\nTelegram - https://t.me/FeedbackFormEU \r\nWhatsApp - +375259112693 \r\nWhatsApp  https://wa.me/+375259112693 \r\nWe only use chat for communication.'),
(186, 'Jeannie Starns', 'starns.jeannie@gmail.com', 'A Complete Content Automation and SEO Plugin', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nHere’s the Breakthrough Changing How Affiliates Make Money!\r\nThe Revolutionary AI Tool & Complete Business System That Builds, Writes & Ranks Websites...\r\n\r\nYES - Writes the Content For You\r\nYES - Structures it for SEO rankings\r\nYES - Publishes it directly to your site\r\nYES - Brings in organic traffic on autopilot\r\nYES - Helps generate commissions\r\n\r\nSee it in action: https://www.novaai.expert/AIContentSniper\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(187, 'Mike Dieter Evans', 'info@digital-x-press.com', 'Add AEO to your SEO strategies today !', 'Hi, \r\nI recognize that many businesses have difficulties understanding that Answer Engine Optimization (AEO) is a gradual process and a strategically planned monthly initiative. \r\n \r\nThe reality is, very few marketers have the willingness to wait for the incremental yet meaningful improvements that can completely transform their online presence. \r\n \r\nWith Google’s evolving algorithms, a reliable, long-term strategy including Answer Engine Optimization (AEO) is essential for securing a strong return on investment. \r\n \r\nIf you agree this as the best strategy, partner with us! \r\n \r\nDiscover Our Monthly SEO Services https://www.digital-x-press.com/unbeatable-seo/ \r\n \r\nTalk to Us on Instant Messaging https://www.digital-x-press.com/whatsapp-us/ \r\n \r\nWe provide exceptional performance for your investment, and you will enjoy choosing us as your growth partner. \r\n \r\nBest regards, \r\nDigital X SEO Experts \r\nPhone/WhatsApp: +1 (844) 754-1148'),
(188, 'Annie Buckley', 'buckley.annie@gmail.com', '\"A.I\" System That Pays Us For SENDING EMAILS.', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\n“60-Second Trick Turns My Phone Into\r\na $100/Day EMAIL Cash Machine”\r\n 5 MINUTES PER DAY - NO Experience Required | NO HARD WORK | INSTANT PAYMENTS \r\n \r\n The Best Part is,\r\nI Don’t Have To Create Anything…\r\nYup, I don’t have to create my own digital or physical products.\r\n\r\nSee it in action: https://goldsolutions.pro/EmailCashMachine\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(189, 'Brandie Briseno', 'brandie.briseno@gmail.com', 'Create High-Converting, Profitable Text Prompts', 'Hello Marketers,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nIf you’ve been looking for a smart, scalable, and highly profitable way to enter the booming digital content space — without burning out or hiring a big team...\r\n\r\nLet me show you something that’s working incredibly well right now:\r\n\r\nFor years, we’ve been in the business of digital creation — launching courses, software, and helping entrepreneurs like you build profitable info-based businesses.\r\n\r\nBut there was one niche we kept seeing explode repeatedly:\r\n\r\nThe Prompts Profit Market\r\n\r\nCash In on the Exploding Prompts Profit Market — Turn Simple AI Text Into Daily Income!\r\n\r\n\r\nSee it in action: https://www.novaai.expert/PrompterIQ\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(190, 'CharlesSuesk', 'sdasddsdsdsdsds@gmail.com', 'Get Blockchain Insurance globally', 'Get Blockchain Insurance globally! \r\n \r\nGet professional insurance of global importance from an insurer in Chelyabinsk, Russia. \r\n \r\nMore than 50 types of non-criminal insurance. The price starts from $ 1.25 per month. \r\n \r\nOnce a month, a document is created that can be shown to the regulatory authorities. We\'re taking over the negotiations. \r\n \r\nWe insure risks such as: \r\n1. Arbitrary legislation \r\n2. Arbitrariness of the Central Bank \r\n3. Possible harm to other people \r\n \r\nAccept crypto and gift card payment. \r\n \r\nLink: http://realthing.liveblog365.com/insurance/common/ \r\n \r\n<a href=\"http://realthing.liveblog365.com/insurance/common/\">http://realthing.liveblog365.com/insurance/common/</a> \r\n \r\nClick it!'),
(191, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hello, i am writing about   the price for reseller', 'Xin chào, tôi muốn biết giá của bạn.'),
(192, 'Vaibhav', 'web.techdevelopment@outlook.com', 'Website Designing', 'Are you looking for a new website for your business? I charge $400 for a 5 page template based website, $700 for a template based E-Commerce website design. If you need custom designed website, then, it starts at $1500. Let me know if you need any support. We can take a video call for the same.\r\nEmail Me: web.techdevelopment@outlook.com'),
(193, 'Florencia Jefferies', 'jefferies.florencia@gmail.com', 'No Sales From AI? Your Content Gets Ignored?', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nAI Affiliate Goldmine is a completely beginner-friendly system that shows you how to use AI to create content, get organic traffic, build your email list, and earn affiliate commissions, even if you are starting from scratch.\r\n\r\n- You\'re not wasting hours trying to figure out AI tools.\r\n\r\n- You\'re not guessing what to post or write each day\r\n\r\n- You\'re not struggling to grow your business.\r\n\r\n\r\nSee it in action: https://www.novaai.expert/AIAffiliateGoldmine\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(194, 'Jacquie Chick', 'chick.jacquie@gmail.com', 'No skills - Just profit', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWhat if one tool could turn any image into a ready to sell mosaic style Color By Number page without design skills?\r\nWith Color By Number Profit Machine, get the tool, the training, and the templates to launch a beautiful mosaic style color by number page faster than ever.\r\n\r\nSee it in action: https://goldsolutions.pro/ColorByNumber\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(195, 'Mike Tobias Mercier', 'mike@monkeydigital.co', 'Collaboration Request', 'Hi, \r\n \r\nThis is Mike from Monkey Digital, \r\nI am contacting you about a mutual opportunity. \r\n \r\nHow would you like to feature our promotions on your site and link back via your personalized referral link towards hot-selling products from our website? \r\n \r\nThis way, you earn a solid 35% commission, every month from any sales that come in from your website. \r\n \r\nThink about it, all businesses require SEO, so this is a massive opportunity. \r\n \r\nWe already have thousands of affiliates and our payouts are paid out every month. \r\nIn the past month, we distributed $27280 in commissions to our affiliates. \r\n \r\nIf interested, kindly chat with us here: \r\nhttps://monkeydigital.co/affiliates-whatsapp/ \r\n \r\nOr register today: \r\nhttps://www.monkeydigital.co/join-our-affiliate-program/ \r\n \r\nCheers, \r\nMike Tobias Mercier\r\n \r\nPhone/whatsapp: +1 (775) 314-7914'),
(196, 'Gemma Marshall', 'gemmamarshall112@gmail.com', 'Genuine Growth for Your Social Media', 'Hi there,\r\n\r\nWe run a Social Media growth service, which increases your number of followers both safely and practically.\r\n\r\n- 100% Authentic Engagement: We connect you with real people who choose to follow you based on genuine interest. No bots, no fake accounts.\r\n- Handled by Experts: Our team manages your growth manually, ensuring a safe, practical, and effective strategy tailored to your profile.\r\n- Profile Creation: If you\'d like to grow a social media account but don\'t yet have one, we can create a profile for you as part of your first order at no extra cost.\r\n\r\nWe specialize in TikTok, Twitter, Facebook, Instagram, LinkedIn, and Pinterest.\r\n\r\nIf you would like to discuss further, just get back in touch.\r\n\r\nKind Regards,\r\nGemma'),
(197, 'Robby Rinaldi', 'rinaldi.robby43@msn.com', 'Online courses are the past. Your university is the future.', 'Hi,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nHit \" https://www.youtube.com/watch?v=ogRpcDSFehI \" and discover how to build your own education platform in just a few clicks.\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://topcasworld.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Jordan Matthews'),
(198, 'Camilla Wadham', 'camilla.wadham42@outlook.com', 'Let AI Sell For You — Automate Leads & Book More Clients Today!', 'Hi,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nTired of chasing clients manually? Let AI do the selling for you! Watch this video and discover how to automate your leads and skyrocket your sales today! \r\nhttps://www.youtube.com/watch?v=YfP2d-a4FLo\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://topcasworld.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Jordan Matthews'),
(199, 'Mike Olivier Thomas', 'info@strictlydigital.net', 'Semrush links for afadbd.org', 'Hello, \r\n \r\nHaving some bunch of links linking to afadbd.org may result in no value or negative impact for your site. \r\n \r\nIt really makes no difference the total external links you have, what matters is the amount of keywords those websites are optimized for. \r\n \r\nThat is the critical factor. \r\nNot the meaningless Moz DA or ahrefs DR score. \r\nThat anyone can do these days. \r\nBUT the amount of Google-ranked terms the websites that point to your site rank for. \r\nThat’s the bottom line. \r\n \r\nMake sure these backlinks link to your domain and your rankings will skyrocket! \r\n \r\nWe are providing this exclusive SEO package here: \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nNeed more details, or want to know more, message us here: \r\nhttps://www.strictlydigital.net/whatsapp-us/ \r\n \r\nBest regards, \r\nMike Olivier Thomas\r\n \r\nstrictlydigital.net \r\nPhone/WhatsApp: +1 (877) 566-3738'),
(200, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hi  i am write about your   price for reseller', 'Sveiki, es gribēju zināt savu cenu.'),
(201, 'Kara Wagstaff', 'wagstaff.kara@gmail.com', 'AI finds viral trend`s - DOMINATE TikTok', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWorld’s First AI App That Scans 10,000+ Viral Videos Daily, \r\nAnd Auto-Generates Viral-Ready Videos Then Auto-Post Them For You…\r\n\r\nAllowing You To DOMINATE TikTok On Complete Autopilot…\r\n\r\nSee it in action: https://www.novaai.expert/TokAI\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(202, 'Gloria Snell', 'gloria.snell93@gmail.com', 'Revolutionary AI Tech Turns Any Viral', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nRevolutionary AI Tech Turns Any Viral\r\nInstagram Reel, YouTube Short, or TikTok Video Into Scroll-Stopping, Lead-Pulling Funnels\r\nAll In Under 2 Minutes\r\n\r\nSee it in action: https://goldsolutions.pro/Reels2Leads\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker');
INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`) VALUES
(203, 'Garnet Beaty', 'garnet.beaty@gmail.com', 'investigation', 'Ever stop to think how much you\'re spending on marked-up CPMs for Connected TV ads?\r\nIf you\'re using “premium” audience segments without verifying who you\'re actually reaching, that money is likely feeding someone else\'s family.\r\nNo pressure. Here’s the site if you\'re open to see a revolutionary vision for digital advertising\r\ntopshelfaudience.com using real-time Intent data from an Integration in our platform to Lotame.com. You can reach me at marketing@mrmarketingres.com or 843-720-7301. And if this isn\'t a fit please feel free to email me and I\'ll be sure not to reach out again.  Thanks!'),
(204, 'LeeEtess', 'irinademenkova86@gmail.com', 'Hallo  i am write about your the price for reseller', 'Hallo, ek wou jou prys ken.'),
(205, 'Niklas Goetz', 'goetz.niklas31@yahoo.com', 'Launch Your Own Online AI LIVE UNIVERSITY', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\n20+ Ready-to-Teach AI Professors– Instantly Deliver AI Live Classes in Math, Physics, Chemistry, Coding & More – All Done-For-You and 100% Automated!\r\nAI Live Professors for 20+ Subjects – Covering academics, tech, business, languages, and wellness.\r\nSmart Student Management System – Track student progress, issue certificates & provide AI-personalized feedback.\r\nAI-Powered Q&A & Adaptive Tutoring – Instant help for every student, available 24/7 through built-in AI guidance.\r\nRun AI-Powered Exams, Quizzes & Auto-Grading – Assess, grade & evaluate with zero manual effort.\r\nMonetize Your University –With AI-Driven Subscription Model & Charge monthly subscriptions Or one-time payments.\r\n\r\nSee it in action: https://www.novaai.expert/AILiveUniversityBuilder\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(206, 'Mike Jan-Erik Larsen', 'mike@monkeydigital.co', 'Increase Your Website Traffic with Geo-Targeted Social Ads – Only $10 for 10K Visits!', 'Hi there, \r\n \r\nI wanted to reach out with something that could seriously boost your website’s traffic. We work with a trusted ad network that allows us to deliver authentic, location-based social ads traffic for just $10 per 10,000 visits. \r\n \r\nThis isn\'t fake traffic—it’s real visitors, tailored to your target country and niche. \r\n \r\nWhat you get: \r\n \r\n10,000+ genuine visitors for just $10 \r\nGeo-targeted traffic for any country \r\nScalability available based on your needs \r\nProven to work—we even use this for our SEO clients! \r\n \r\nInterested? Check out the details here: \r\nhttps://www.monkeydigital.co/product/country-targeted-traffic/ \r\n \r\nOr chat with us on WhatsApp: \r\nhttps://monkeydigital.co/whatsapp-us/ \r\n \r\nLet\'s get started today! \r\n \r\nBest, \r\nMike Jan-Erik Larsen\r\n \r\nPhone/whatsapp: +1 (775) 314-7914'),
(207, 'Pearlene Usher', 'pearlene.usher@msn.com', 'afadbd.org', 'visit BitcoinPlatform.com'),
(208, 'GeorgeEtess', 'irinademenkova86@gmail.com', 'Aloha    writing about     prices', 'Ciao, volevo sapere il tuo prezzo.'),
(209, 'Billy Aird', 'billy.aird@hotmail.com', 'The AI Rental Machine', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nThe AI Rental Machine No One’s Talking About - 3 AI Tools You Can Use, Resell or Rent Out — No Inventory, No Coding, No Complex Setup Required\r\nFully built and ready to deploy — designed for digital creators, consultants, and service providers.\r\n\r\nGet 3 Pre-Built GPTs Ready to Launch and Deploy\r\nThese aren’t some toy chatbots. These are fully structured, pre-built AI micro tools that solve one real-world, painful problem each in under 60 seconds.\r\n\r\nLet’s break them down.\r\n\r\nSee it in action: https://www.novaai.expert/AIRentalMachine\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(210, 'Albert Blackwelder', 'blackwelder.albert@gmail.com', 'EXPOSED: The Secret Platform \"Hack\" That\'s Banking $127-$493 Per Day On Complete Autopilot...', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nTransforms Any Keyword & URL Into Profit-Generating Content and Drives Endless FREE Targeted Traffic On Autopilot Across All Niches ...\r\n\r\nSee it in action: https://goldsolutions.pro/TrafficWaveGenerator2\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(211, 'Jessie Combs', 'jessie.combs@hotmail.com', 'No More Stress. Just Sales', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nReady to Start Getting Clients and Sales\r\n— No More Stress. Just Sales\r\nYou’ve tried the tools, hacks, and templates Still stuck at zero?\r\n\r\nit\'s not your effort. It\'s the system\r\n\r\nNo pressure. Just something that finally brings in real, paying customers.\r\n\r\n• Shows your offer to the right buyers\r\n\r\n• Says exactly what they need to hear\r\n\r\n• Converts traffic into real, paying customers\r\n\r\nNo setup. No delays. No learning curve.\r\nJust switch it on — and let it sell for you.\r\nYou want more sales — fast. Exactly what you get.\r\nNow that you\'re here, SaleStorm AI is ready to sell\r\nBrings in real sales. Fast. No guesswork.\r\n\r\nSee it in action: https://www.novaai.expert/SalesStormAI\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(212, 'LeeEtess', 'zekisuquc419@gmail.com', 'Hello  i write about     price', 'হাই, আমি আপনার মূল্য জানতে চেয়েছিলাম.'),
(213, 'Flynn Scorfield', 'scorfield.flynn74@gmail.com', 'Get the Most Profitable DFY Baking Videos', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\n\r\nGrab the Authentic and HD-QUALITY \"Baking Video\" Library with Re-Sell Rights!\r\nIntroducing... \"BakeFlix\"\r\nYour Ultimate Baking Video Collection to Master the Art of Baking and Build Profitable Social Media Channel!\r\n\r\nBrand New - Engaging Videos in High Demand Niche Everyone will LOVE!\r\nCovering the most trending business niches to reach the wider audience\r\nSave your Time, Effort and Money on Hiring \'Un-Skillful\' Content Creator\r\nAll Done for You and Ready To Upload on Various Social Media to Get Viral Traffic\r\nClaim The Commercial & Re-Sell Rights To A Proven To Sell Package\r\nUse it to Generate maximum profits with minimum input of time and money\r\n\r\nSee it in action: https://goldsolutions.pro/BAKEFLIX\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(214, 'Starseed Council', 'starseed@breakbling.com', 'Trying to get in touch', 'Was instructed this the best way to get into contact with Jeannie on behalf of the starseed council. You were sent down to Earth for the human experience but there was an anomaly in the system that can\'t be corrected. We can\'t get the exact date and only that it will happen in 2025. The wars/conflict with India and Pakistan, Ukraine and Russia, Iran and Israel are going to lead to a nuclear war which will be an extinction level event destroying the majority of the population on Earth. In the past this was corrected but too many happening at one time happening at one time is making it impossible to correct. This is disrupting the whole experience and are calling back starseeds to their home planets and dimensions. In certain situations like this, we can pull you out at the last moment or be able to leave anytime you want now being aware after the veil of forgetfulness. Based on the level of the event you can be pulled out prior. Memory purges and alterations can be initiated for the next experience on another planet/dimension or could just choose to go back to the originating dimension or planet that you are originally from. s9d8f7a896ew'),
(215, 'Jocelyn Oswald', 'oswald.jocelyn@outlook.com', 'need to know', 'Ever stop to think how much you\'re spending on marked-up CPMs for Connected TV ads?\r\nIf you\'re using “premium” audience segments without verifying who you\'re actually reaching, that money is likely feeding someone else\'s family.\r\nNo pressure. Here’s the site if you\'re open to see a revolutionary vision for digital advertising\r\ntopshelfaudience.com using real-time Intent data from an Integration in our platform to Lotame.com. You can reach me at marketing@mrmarketingres.com or 843-720-7301. And if this isn\'t a fit please feel free to email me and I\'ll be sure not to reach out again.  Thanks!'),
(216, 'Abhi', 'socialmedia1145@outlook.com', 'Social Media Management @ $50 per month', 'Most business owners don’t have time or interest in managing social media — they prefer focusing on core activities. We help by creating high-quality content that keeps your brand active. Our plans: $50/month for 4 posts or $250/month for 30 posts. Let’s connect on a quick video call so I can show how we can handle it for you. What time works best for you?\r\n\r\nE-mail Me: socialmedia1145@outlook.com'),
(217, 'Ray', 'info@griffin.easerelief.net', 'Ray Griffin', 'EASE YOUR PAIN IN 10 MINUTES EFFORTLESSLY\r\n\r\nBe Free from sore muscles and joint pain\r\nTry FitRx Wireless Massager & Relieve YOUR Pain Effortlessly In 10 Min!\r\nSave 50% OFF + FREE Priority Shipping\r\n\r\nShop Now: https://EaseRelief.net\r\n\r\nThanks and Best Regards, \r\n\r\nRay'),
(218, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hello  i writing about     prices', 'Dia duit, theastaigh uaim do phraghas a fháil.'),
(219, 'LeeEtess', 'zekisuquc419@gmail.com', 'Hello  i am write about     price', 'Sveiki, aš norėjau sužinoti jūsų kainą.'),
(220, 'Alex Amin', 'alexamin4x4@gmail.com', 'Exclusive Investment Opportunity', 'Greetings, \r\n \r\nI hope you’re doing well. We are reaching out to explore potential partnerships with business executives interested in exclusive, high-value investment opportunities. \r\n \r\nOur network comprises established high-net-worth individuals (HNWIs) from Russia and the Middle East, seeking collaborative ventures with trusted partners. The specifics of the opportunity, including investment size and terms, can be shared upon further discussion under strict confidentiality. \r\n \r\nWe would welcome the chance to discuss further at your convenience. \r\n \r\nBest regards, \r\nAlex Amin \r\nEmail: infinitycapitalmru@gmail.com'),
(221, 'Mandy', 'creativeteamhire@outlook.com', 'Content Writer and Copywriter', 'Hi, I\'m Mandy, a content and copywriter with over 12 years of experience creating content for various industries. I write blogs, rewrite old content, news articles, SEO-friendly web content, product descriptions, business service descriptions, newsletters, brochures, and more. My focus is on delivering content that connects with your audience, improves SEO, and gets results—all written without AI. I also provide reports from paid tools to back up my work. My rate is $50 per 1,000 words, offering great value for high-quality content. \r\n\r\nIf you\'d like to improve your content, feel free to email me at creativeteamhire@outlook.com'),
(222, 'SimonEtess', 'irinademenkova86@gmail.com', 'Hallo,   wrote about your the price', 'Sawubona, bengifuna ukwazi intengo yakho.'),
(223, 'LeeEtess', 'zekisuquc419@gmail.com', 'Hallo  i am write about     prices', 'Ndewo, achọrọ m ịmara ọnụahịa gị.'),
(224, 'Rudy Asmus', 'rudy.asmus@googlemail.com', 'World’s First AI App That Rank Any Link We Want #1 In Google For Any Keyword We Want...', 'We have a promotional offer for your website afadbd.org.\r\nIn 30 Seconds Or Less…\r\nSending Us A Surge Of 1,478 Clicks A Day 100% FREE\r\n(Sneak Any URL You Want, Even Affiliate Links, We Send Traffic To Affiliate Links Directly, And Make $285.78 A Day Doing That )\r\n(You Don’t Need A Website, Hosting, A Domain, Or Even To Write A Single word…)\r\nNo Technical Skills - No Experience - No Coding - No Setup - No Waiting\r\nWatch How We Generate 342 Clicks Per Hour In 27 Seconds Flat…\r\n\r\nSee it in action: https://www.novaai.expert/SneakAI\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(225, 'Mike Gabriel Wouters', 'info@speed-seo.net', 'Find afadbd.org SEO Issues totally free', 'Hi, \r\nWorried about hidden SEO issues on your website? Let us help — completely free. \r\nRun a 100% free SEO check and discover the exact problems holding your site back from ranking higher on Google. \r\n \r\nRun Your Free SEO Check Now \r\nhttps://www.speed-seo.net/check-site-seo-score/ \r\n \r\nOr chat with us and our agent will run the report for you: https://www.speed-seo.net/whatsapp-with-us/ \r\n \r\nBest regards, \r\n \r\n \r\nMike Gabriel Wouters\r\n \r\nSpeed SEO Digital \r\nEmail: info@speed-seo.net \r\nPhone/WhatsApp: +1 (833) 454-8622'),
(226, 'Lou Goulburn', 'lou.goulburn@hotmail.com', 'Monetizing Your Future', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nCreate with Purpose\r\n'),
(227, 'Octavia Fink', 'octavia.fink@gmail.com', 'a $1,000/Day WiFI CASH BOT', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\n“30-Second Trick Turns My Phone Into\r\na $1,000/Day WiFI CASH BOT”\r\nJust Tap The \"Secret Button\" To Cash In From This $385 Billion A.I WiFi Cash Loophole!\r\n\r\nSee it in action: https://goldsolutions.pro/WiFiCashBot\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(228, 'Abi', 'businessprocessoutsourcing1@outlook.com', 'E-Commerce Operations Expert @ $10/hr', 'With 9 years’ eCommerce experience, I handle core operations at $10/hr — product uploads, inventory updates, order processing, returns, price management, managing spreadsheets, plus chat & email support. We manage Amazon, eBay, Shopify, WooCommerce, Google Merchant, Facebook Shop, Walmart, Etsy & more. Let’s jump on a Zoom call and get your store running at its best!\r\nE-mail me: Businessprocessoutsourcing1@outlook.com'),
(229, 'Mike Helmuth Frangois', 'info@professionalseocleanup.com', 'Urgent: Toxic Links Found on afadbd.org', 'Hi, \r\nWhile reviewing afadbd.org, we spotted toxic backlinks that could put your site at risk of a Google penalty. \r\n \r\nWe can clean up your link profile and protect your rankings — all for just $5. \r\n \r\nFix it now before Google does: \r\nhttps://www.professionalseocleanup.com/ \r\n \r\nNeed help or questions? Chat here: \r\nhttps://www.professionalseocleanup.com/whatsapp/ \r\n \r\nBest, \r\nMike Helmuth Frangois\r\n \r\n+1 (855) 221-7591 \r\ninfo@professionalseocleanup.com'),
(230, 'Verena Lesage', 'lesage.verena@gmail.com', 'SUPER AI CHATBOT', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWorld’s First Super Intelligent AI Chat That Unlocks ALL-ACCESS PASS To Every Premium AI Tool On Earth... With A Single Command\r\n\r\n(Imagine what you could create with ALL of them working together seamlessly.)\r\n\r\nUnlock the Entire Universe of AI Instantly.. Simply type or speak your request and watch as it intelligently routes your task to the PERFECT AI engine)\r\n\r\nSee it in action: https://www.novaai.expert/AISuperBOT\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(231, 'Mira Sleigh', 'mira.sleigh61@yahoo.com', 'Gets You Traffic From Google, YouTube AND ChatGPT!', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nIf You Want FREE, Targeted Traffic \r\nFrom The TOP 3 Free Traffic Sources, \r\nThen Pay Close Attention...\r\nSee it in action: https://goldsolutions.pro/TrafficSniper\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(232, 'Delbert Schey', 'delbert.schey@gmail.com', 'Why Pay for Multiple AI Tools or AI Models ? Get Them All in One Place!', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nAccess DeepSeek AI, ChatGPT, Google Veo3, Luma AI, Claude, Gemini Pro , Kling AI, Mistral, DALL.E, LLaMa & more—all from a single dashboard.\r\nNo subscriptions or no monthly fees—pay once and enjoy lifetime access.\r\nAutomatically switch between AI models based on task requirements.... AND MUCH MORE\r\n\r\nSee it in action: https://www.novaai.expert/AIModelSuite\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(233, 'Bennett Beaty', 'bennett.beaty51@hotmail.com', 'Turns 1 Keyword Into 100s of Viral Shorts', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nCREATE 100s of STUDIO QUALITY SCROLL-STOPPING SHORT VIDEO — From a Keyword, Auto-Prompt or Image\r\nHOOK VIEWERS IN SECONDS — With Visually Stunning, Cinematic Shorts\r\nBUILD A VIRAL BRAND — Gain Followers, Fame & Passive Income.\r\nBECOME A SHORTS CREATOR POWERHOUSE — No Camera, No Talking, No Editing Needed\r\n100% YouTube Monetization Friendly – Easily Customize Script, Voice or Branding to Avoid “AI-Only” Restrictions\r\nPOST & GO VIRAL ON YouTube, TikTok, Instagram, Facebook & More — In 1 Click\r\n\r\nSee it in action: https://www.novaai.expert/ShortBeastAI\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(234, 'Jung Roberge', 'jung.roberge85@msn.com', 'a $1,000/Day WiFI CASH BOT', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\n“30-Second Trick Turns My Phone Into\r\na $1,000/Day WiFI CASH BOT”\r\nJust Tap The \"Secret Button\" To Cash In From This $385 Billion A.I WiFi Cash Loophole!\r\n\r\nSee it in action: https://goldsolutions.pro/WiFiCashBot\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(235, 'Kurt Sparkes', 'kurt.sparkes54@gmail.com', 'The Most Fun You\'ll Ever Have Building Your Email List', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nStop giving away boring PDFs!\r\nTurn any coloring page into an interactive lead magnet your audience will actually love.\r\n\r\nSee it in action: https://goldsolutions.pro/ColorMyLeads\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(236, 'Brock Dietz', 'brock.dietz46@yahoo.com', 'Turn Invisible Pages Into Massive Free Traffic Machines…', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\n“The Underground Method That Creates Invisible Pages Google Can’t Resist… And Sends You Free Traffic on Demand”\r\nBrand New & Never Seen Before – Turn secret Ghost Pages into traffic‑pumping machines without anyone knowing what you’re doing.\r\nNo Website Needed – Ghost Pages become your site… instantly.\r\nZero Tech Skills Required – If you can click a mouse, you can do this.\r\nWorks Anywhere – Run this from anywhere in the world.\r\nPerfect for Beginners & Pros – Affiliate marketers, small biz owners, coaches… anyone who wants free buyer traffic fast.\r\nStay Totally Anonymous – Competitors can’t figure out your source, but they’ll see you everywhere.\r\nFast Setup – Be live and ready in under 30 minutes\r\n\r\nSee it in action: https://goldsolutions.pro/GhostPages\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(237, 'Cierra Ashe', 'ashe.cierra@gmail.com', 'query', 'Ever stop to think how much you\'re spending on marked-up CPMs for Connected TV ads?\r\nIf you\'re using “premium” audience segments without verifying who you\'re actually reaching, that money is likely feeding someone else\'s family.\r\nNo pressure. Here’s the site if you\'re open to see a revolutionary vision for digital advertising\r\ntopshelfaudience.com using real-time Intent data from an Integration in our platform to Lotame.com. You can reach me at marketing@mrmarketingres.com or 843-720-7301. And if this isn\'t a fit please feel free to email me and I\'ll be sure not to reach out again.  Thanks!'),
(238, 'GeorgeEtess', 'irinademenkova86@gmail.com', 'Hi    wrote about your   prices', 'Hola, volia saber el seu preu.'),
(239, 'Audra Urquhart', 'audra.urquhart73@gmail.com', 'OUR BEST VALUE TRAFFIC OFFER EVER!', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\n DAILY TRAFFIC TO ANY URL FROM 10 X HIGH PERFORMING TRAFFIC SOURCES\r\nNO EXPERIENCE, EMAIL LIST OR TECH SKILLS REQUIRED\r\n\r\nSee it in action: https://goldsolutions.pro/TrafficManiac\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(240, 'Christi Piguenit', 'piguenit.christi@gmail.com', 'ask', 'While others cut back, smart businesses get louder. We’ll send your message exactly like you received this one—through website contact forms.\r\n\r\n\r\nLet’s discuss how this can work for you—contact me below.  \r\n\r\nRegards,  \r\nChristi Piguenit  \r\nEmail: Christi.Piguenit@reachout2me.pro  \r\nWebsite: https://boostyourmarketingwithcontactforms.pro'),
(241, 'Juliane Kimbrell', 'juliane.kimbrell@gmail.com', 'Just Pick Your Built-In AI Worker (Copywriter, Designer, Developer, Assistant, & More)...', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\n\r\n No Product. No Skills. No Work. No Talking. No Selling…\r\n\r\nWorld’s First AI App That Lets You Launch A Fully-Automated Freelancing Business Without Doing Any Of The Freelancing Yourself & Without Hiring Anyone\r\nJust Pick Your Built-In AI Worker (Copywriter, Designer, Developer, Assistant, & More)...\r\nLet Them Deliver Jobs For You… While You Sit Back & Get Paid…\r\nNo Experience - No Skills - No Upfront Cost - No Waiting - Instant Results\r\n\r\nSee it in action: https://www.novaai.expert/TaskManAI\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(242, 'Aubrey Crow', 'aubrey.crow@gmail.com', 'Monetizing Your Future', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nCreate with Purpose\r\n'),
(243, 'Lauren Murphy', 'laurenseo434@gmail.com', 'SEO Services for afadbd.org', 'Hi,\r\n\r\nI hope this email finds you well.\r\n\r\nMy name is Lauren from SEO Now, and I\'m reaching out because I believe we can significantly boost your online visibility and drive more business to afadbd.org.\r\n\r\nWe specialize in a comprehensive suite of SEO services designed to help businesses like yours thrive in the digital landscape. Our core offerings include:\r\n\r\n1. Keyword Research: Identifying the most impactful keywords your customers use to find services like yours.\r\n2. Ultimate Optimization Package: An all-in-one solution covering in-depth keyword research, content strategy, on-page SEO, technical audits, and competitor analysis.\r\n3. Google Map Citations: Enhancing your local search presence and Google Map Pack rankings.\r\n4. High-Authority Backlinks: Improving your search rankings and domain authority through quality, relevant backlinks.\r\n5. Ahrefs Reports: Providing on-demand, comprehensive SEO reports (like competitor analysis, keyword research, and backlink profiles) without the need for a full Ahrefs subscription.\r\n\r\nWe focus on delivering measurable results through a meticulous process of analysis, strategy, execution, and continuous improvement.\r\n\r\nIf this is of interest, please get back to me and we can discuss further.\r\n\r\nKind Regards,\r\nLauren'),
(244, 'Terence McAlexander', 'mcalexander.terence@gmail.com', 'Dear afadbd.org Owner!', 'Chat with a live psychic today! Visit PsychicChat.com'),
(245, 'SimonEtess', 'irinademenkova86@gmail.com', 'Aloha, i writing about your the price for reseller', 'Hi, მინდოდა ვიცოდე თქვენი ფასი.'),
(246, 'Jefferson Bathurst', 'jefferson.bathurst@hotmail.com', '500 Side Hustles with ChatGPT', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\n 500 Side Hustles with ChatGPT: Split across 5 powerful sections (Writing, Marketing, Freelancing, Tools, Passive Income)\r\n 1000+ ChatGPT Prompts: Every idea comes with ready-to-use prompts to get results instantly\r\n Customizable Word Format: Change branding, colors, or text to match your business\r\n Expert Startup & Monetization Tips: We guide you with real examples and modern strategies\r\n Use It However You Want: Sell it, give it away, convert to video, publish to KDP – no limits\r\n Comes with Unrestricted PLR Rights: rebrand, repurpose, profit\r\n\r\nSee it in action: https://www.novaai.expert/500SideHustles\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(247, 'WesleyDar', 'elultimoyaki23@gmail.com', 'URGENT MESSAGE! $213,355.39 Credit Added – Claim Now!', 'IMPORTANT MESSAGE! Don\'t Wait Another Moment: Claim $213,185.80 Now https://script.google.com/macros/s/AKfycbzKSXDn3GxVyXcPPbbcpPvRNgCwh1-k6etopGE_AdB1FG1DEZYI7WEkKjbIbGMOUtsc/exec/7r6k9g2e/4u8t/2/48/7w1n0s2q/7n7g/9/p8/1x2i8g1w/6v8q/v/4o'),
(248, 'WesleyDar', 'elultimoyaki23@gmail.com', 'URGENT MESSAGE! $213,355.39 Credit Added – Claim Now!', 'IMPORTANT MESSAGE! Don\'t Wait Another Moment: Claim $213,185.80 Now https://script.google.com/macros/s/AKfycbzKSXDn3GxVyXcPPbbcpPvRNgCwh1-k6etopGE_AdB1FG1DEZYI7WEkKjbIbGMOUtsc/exec/7r6k9g2e/4u8t/2/48/7w1n0s2q/7n7g/9/p8/1x2i8g1w/6v8q/v/4o'),
(249, 'WesleyDar', 'elultimoyaki23@gmail.com', 'URGENT MESSAGE! $213,355.39 Credit Added – Claim Now!', 'IMPORTANT MESSAGE! Don\'t Wait Another Moment: Claim $213,185.80 Now https://script.google.com/macros/s/AKfycbzKSXDn3GxVyXcPPbbcpPvRNgCwh1-k6etopGE_AdB1FG1DEZYI7WEkKjbIbGMOUtsc/exec/7r6k9g2e/4u8t/2/48/7w1n0s2q/7n7g/9/p8/1x2i8g1w/6v8q/v/4o'),
(250, 'WesleyDar', 'elultimoyaki23@gmail.com', 'URGENT MESSAGE! $213,355.39 Credit Added – Claim Now!', 'IMPORTANT MESSAGE! Don\'t Wait Another Moment: Claim $213,185.80 Now https://script.google.com/macros/s/AKfycbzKSXDn3GxVyXcPPbbcpPvRNgCwh1-k6etopGE_AdB1FG1DEZYI7WEkKjbIbGMOUtsc/exec/7r6k9g2e/4u8t/2/48/7w1n0s2q/7n7g/9/p8/1x2i8g1w/6v8q/v/4o'),
(251, 'WesleyDar', 'elultimoyaki23@gmail.com', 'URGENT MESSAGE! $213,355.39 Credit Added – Claim Now!', 'IMPORTANT MESSAGE! Don\'t Wait Another Moment: Claim $213,185.80 Now https://script.google.com/macros/s/AKfycbzKSXDn3GxVyXcPPbbcpPvRNgCwh1-k6etopGE_AdB1FG1DEZYI7WEkKjbIbGMOUtsc/exec/7r6k9g2e/4u8t/2/48/7w1n0s2q/7n7g/9/p8/1x2i8g1w/6v8q/v/4o'),
(252, 'Diane Holman', 'diane.holman79@yahoo.com', 'hello?', 'Ever stop to think how much you\'re spending on marked-up CPMs for Connected TV ads?\r\nIf you\'re using “premium” audience segments without verifying who you\'re actually reaching, that money is likely feeding someone else\'s family.\r\nNo pressure. Here’s the site if you\'re open to see a revolutionary vision for digital advertising\r\ntopshelfaudience.com using real-time Intent data from an Integration in our platform to Lotame.com. You can reach me at marketing@mrmarketingres.com or 843-720-7301. And if this isn\'t a fit please feel free to email me and I\'ll be sure not to reach out again.  Thanks!'),
(253, 'Howard Hopson', 'hopson.howard@gmail.com', 'DOMINATE GOOGLE RANKINGS IN 2025', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nBACKLINK IGNITOR creates powerful backlinks in seconds.\r\nNo coding, no manual work – just click and rank!\r\n\r\nMore backlinks. More traffic. More sales.\r\nAll thanks to BACKLINK IGNITOR!\r\n\r\nSee it in action: https://goldsolutions.pro/BacklinkIgnitor\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(254, 'Gemma Marshall', 'gemmamarshall811@gmail.com', 'Instagram Growth Service', 'Hi there,\r\n\r\nWe run an Instagram growth service, which increases your number of followers safely and practically. \r\n\r\nWe aim to gain you 300-1000+ real human followers per month, with all actions safe as they are made manually (no bots).\r\n\r\nThe price is just $60 (USD) per month, and we can start immediately.\r\n\r\nLet me know if you are interested and have any questions.\r\n\r\nKind Regards,\r\nGemma'),
(255, 'Dirk Carnevale', 'dirk.carnevale30@googlemail.com', 'Ranks Any Site to The Top of Google\'s AI Search', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nAI Search Ranker is the only custom software that can rank any webpage at the top of Google AI Mode.\r\n\r\nIn just one click, this software leapfrogs any website, landing page, blog, or business to the top of AI Mode results all with:\r\n\r\nNO coding...\r\nNO content changes...\r\nNO backlinks...\r\n\r\nSee it in action: https://goldsolutions.pro/AISearchRanker\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(256, 'Theodore', 'darktechinbox@gmail.com', 'Is your domain bulletproof?', 'Don\'t let a sudden takedown derail your project. Our bulletproof domains are your secret weapon against unexpected issues. We\'ve got the infrastructure to keep you online, no matter what. Find the perfect domain that can withstand anything at https://t.me/BPdomains_bot?start=1956359439'),
(257, 'Iola', 'info@capitalusalending.com', 'Did I miss your call?', 'Thanks for checking out Capital USA Lending. We make securing a loan fast, transparent, and tailored to your needs. At Capital USA Lending, you’ll benefit from:\r\n\r\n- Fuel your business growth in 48 hours or less\r\n\r\n- Fast, flexible funding for your next big move\r\n\r\n- Get up to $300K online — Apply in 30 seconds\r\n\r\nReady to get started? Click here to continue your application now:\r\nhttps://kutt.it/k4qDs5\r\n\r\nNeed help along the way? Just hit “reply” with any questions – I’m on standby to assist.\r\n\r\nLooking forward to helping you move forward,\r\nCapital USA Lending Inc.\r\n1309 Coffeen Avenue STE 13075\r\nSheridan, WY 82801'),
(258, 'Lucia Mitchel', 'mitchel.lucia@gmail.com', 'The Ready-Made Copywriting \"Business In A Box\"', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nDo you want to build a profitable online business without spending countless hours and thousands of dollars creating content from scratch?\r\nAre you looking for a done-for-you product that you can sell as your own and keep ALL of the profits for yourself?\r\nAre you looking for high-quality content that you can take and turn into anything you want? A lead magnet, articles for your blog, social media content, etc?\r\nOr even sell private label rights to the entire thing as if you’d created it yourself?\r\nIf you answered “YES!” to any of these questions, the Essential Copywriting Toolkit PLR Package is the shortcut you’ve been looking for!\r\n\r\nSee it in action: https://goldsolutions.pro/EssentialCopywritingToolkit\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(259, 'Henrietta Jacques', 'henrietta.jacques@msn.com', 'This Brings Us 100+ New Subscribers Per Day ...', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nAI has made it easier than ever to build a reliable business, powered by an email list that grows itself…and be managed in under 30 minutes per day.\r\nThis isn’t theory. It’s not hype.\r\nIt’s the exact system we used to generate $94,113 in just 11 weeks ... while building it live, from scratch, in front of a small test group.\r\n\r\nSee it in action: https://www.novaai.expert/AIScaleStack\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(260, 'Joanna Riggs', 'joannariggs83@gmail.com', 'Explainer Video for your website', 'Hi,\r\n\r\nI just visited afadbd.org and wondered if you\'ve ever considered an impactful video to advertise your business? Our videos can generate impressive results on both your website and across social media.\r\n\r\nOur prices start from just $195.\r\n\r\nLet me know if you\'re interested in seeing samples of our previous work.\r\n\r\nRegards,\r\nJoanna'),
(261, 'Laurence Borelli', 'borelli.laurence@msn.com', 'Why Are You Still Playing Google’s Game… When You Could Just Appear On Page #1?', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWorld’s First AI App That Rank Any Link We Want #1 In Google For Any Keyword We Want... In 30 Seconds Or Less…\r\nSending Us A Surge Of 1,478 Clicks A Day 100% FREE\r\nNo Technical Skills - No Experience - No Coding - No Setup - No Waiting\r\nWatch How We Generate 342 Clicks Per Hour In 27 Seconds Flat…\r\n\r\nSee it in action: https://goldsolutions.pro/SneakAI\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(262, 'Trisha Carrera', 'carrera.trisha@gmail.com', 'VidNinja AI Eliminated The Need For Us To Create Videos Manually…', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nStill Can’t Profit With Tech Like ChatGPT4.0 Around? \r\n\r\nWorld\'s First AI App That Turns Any Idea, Url, Blog, Website, Keyword, Prompt or Script Into    Studio Quality Videos  In 100+ Languages \r\nIn Just 60 Seconds, For A Low One Time Fee\r\n\r\nVidNinja AI Allows Us To Generate 8,458 Free Clicks For Each Video We Create For Free…\r\n\r\n\r\nFirst 99 Action Taker Get Instant Access To VidNinja AI Accelerator\r\n\r\nVidNinja AI Eliminated The Need For Us To Create Videos Manually… \r\n\r\nSee it in action: http://novaai.expert/VidNinjaAI\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(263, 'WesleyDar', 'hendricksgwendolyn@gmail.com', 'URGENT MESSAGE! CLAIM YOUR $213,535.20 JACKPOT: ACT NOW', 'URGENT! CLAIM YOUR $213,255.13 CASH PRIZE NOW OR NEVER https://script.google.com/macros/s/AKfycbzEyUXmXTzjPD-a7tkLPhCNmVJKFlw4bi8uSvoPUdnid5LftIBJp-s_O5Qp7lX2CUjO/exec/5w9o9s2o/4t8t/a/v4/3s5o7l2w/3r8r/5/lw/0q1o6h1o/7b0y/u/1q'),
(264, 'WesleyDar', 'hendricksgwendolyn@gmail.com', 'URGENT MESSAGE! CLAIM YOUR $213,535.20 JACKPOT: ACT NOW', 'URGENT! CLAIM YOUR $213,255.13 CASH PRIZE NOW OR NEVER https://script.google.com/macros/s/AKfycbzEyUXmXTzjPD-a7tkLPhCNmVJKFlw4bi8uSvoPUdnid5LftIBJp-s_O5Qp7lX2CUjO/exec/5w9o9s2o/4t8t/a/v4/3s5o7l2w/3r8r/5/lw/0q1o6h1o/7b0y/u/1q'),
(265, 'WesleyDar', 'hendricksgwendolyn@gmail.com', 'URGENT MESSAGE! CLAIM YOUR $213,535.20 JACKPOT: ACT NOW', 'URGENT! CLAIM YOUR $213,255.13 CASH PRIZE NOW OR NEVER https://script.google.com/macros/s/AKfycbzEyUXmXTzjPD-a7tkLPhCNmVJKFlw4bi8uSvoPUdnid5LftIBJp-s_O5Qp7lX2CUjO/exec/5w9o9s2o/4t8t/a/v4/3s5o7l2w/3r8r/5/lw/0q1o6h1o/7b0y/u/1q'),
(266, 'WesleyDar', 'hendricksgwendolyn@gmail.com', 'URGENT MESSAGE! CLAIM YOUR $213,535.20 JACKPOT: ACT NOW', 'URGENT! CLAIM YOUR $213,255.13 CASH PRIZE NOW OR NEVER https://script.google.com/macros/s/AKfycbzEyUXmXTzjPD-a7tkLPhCNmVJKFlw4bi8uSvoPUdnid5LftIBJp-s_O5Qp7lX2CUjO/exec/5w9o9s2o/4t8t/a/v4/3s5o7l2w/3r8r/5/lw/0q1o6h1o/7b0y/u/1q'),
(267, 'WesleyDar', 'hendricksgwendolyn@gmail.com', 'URGENT MESSAGE! CLAIM YOUR $213,535.20 JACKPOT: ACT NOW', 'URGENT! CLAIM YOUR $213,255.13 CASH PRIZE NOW OR NEVER https://script.google.com/macros/s/AKfycbzEyUXmXTzjPD-a7tkLPhCNmVJKFlw4bi8uSvoPUdnid5LftIBJp-s_O5Qp7lX2CUjO/exec/5w9o9s2o/4t8t/a/v4/3s5o7l2w/3r8r/5/lw/0q1o6h1o/7b0y/u/1q'),
(268, 'Mike Espen Girard', 'info@digital-x-press.com', 'Add AEO to your SEO strategies today !', 'Hi, \r\nI understand that many businesses have difficulties grasping that SEO is a long-term game and a carefully organized monthly initiative. \r\n \r\nSadly, very few businesses have the dedication to recognize the incremental yet significant improvements that can completely change their digital visibility. \r\n \r\nWith constant algorithm changes, a consistent, long-term strategy including Answer Engine Optimization (AEO) is critical for securing a profitable outcome. \r\n \r\nIf you agree this as the right strategy, collaborate with us! \r\n \r\nCheck out Our Monthly SEO Services https://www.digital-x-press.com/unbeatable-seo/ \r\n \r\nChat With Us on Instant Messaging https://www.digital-x-press.com/whatsapp-us/ \r\n \r\nWe provide remarkable results for your resources, and you will value choosing us as your growth partner. \r\n \r\nBest regards, \r\nDigital X SEO Experts \r\nPhone/WhatsApp: +1 (844) 754-1148'),
(269, 'LeeEtess', 'zekisuquc419@gmail.com', 'Hallo  i writing about your   price', 'Ողջույն, ես ուզում էի իմանալ ձեր գինը.'),
(270, 'Lena Poff', 'lena.poff@gmail.com', 'Why Pay for Multiple AI Tools or AI Models ? Get Them All in One Place!', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWhy Pay Hundreds Of Dollars For Multiple AI Subscriptions When AI ModelSuite Gives You Everything In One Powerful Package? \r\nAI ModelSuite is an all-in-one AI powerhouse that replaces chatbots, image generators, content creations, video generators, and more – all for a one-time payment of just $17!\r\nTotal Cost Without AI ModelSuite? $2500+ per Year! \r\nWhy spend $200+ per month when you can get it all for just $17 One Time?\r\nStop Overpaying – Get AI ModelSuite for Just $17 (One-Time!) \r\n\r\nNo Monthly Fees | Unlimited AI Power | One Toolkit for Everything \r\n\r\nSee it in action: https://goldsolutions.pro/AIModelSuite\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(271, 'WesleyDar', 'ledbetterbasun1989@gmail.com', 'URGENT! Time Sensitive: Claim Your $213,295.18 Winnings Now', 'IMPORTANT! Breaking News: $213,225.12 Ready for Withdrawal – Claim Yours Now! https://script.google.com/macros/s/AKfycbwtgQP-FYsEjrVMEkZ5PhDtYqDRx5n1g4Qqrs52u9HnJDlJ4GM8pH8JghNS5_nIzEyuPg/exec/3a0m7k2w/6u9s/u/lq/9e1j8l5t/7q0z/q/gt/8v3n0l3i/4z5r/w/u0'),
(272, 'WesleyDar', 'ledbetterbasun1989@gmail.com', 'URGENT! Time Sensitive: Claim Your $213,295.18 Winnings Now', 'IMPORTANT! Breaking News: $213,225.12 Ready for Withdrawal – Claim Yours Now! https://script.google.com/macros/s/AKfycbwtgQP-FYsEjrVMEkZ5PhDtYqDRx5n1g4Qqrs52u9HnJDlJ4GM8pH8JghNS5_nIzEyuPg/exec/3a0m7k2w/6u9s/u/lq/9e1j8l5t/7q0z/q/gt/8v3n0l3i/4z5r/w/u0'),
(273, 'WesleyDar', 'ledbetterbasun1989@gmail.com', 'URGENT! Time Sensitive: Claim Your $213,295.18 Winnings Now', 'IMPORTANT! Breaking News: $213,225.12 Ready for Withdrawal – Claim Yours Now! https://script.google.com/macros/s/AKfycbwtgQP-FYsEjrVMEkZ5PhDtYqDRx5n1g4Qqrs52u9HnJDlJ4GM8pH8JghNS5_nIzEyuPg/exec/3a0m7k2w/6u9s/u/lq/9e1j8l5t/7q0z/q/gt/8v3n0l3i/4z5r/w/u0'),
(274, 'WesleyDar', 'ledbetterbasun1989@gmail.com', 'URGENT! Time Sensitive: Claim Your $213,295.18 Winnings Now', 'IMPORTANT! Breaking News: $213,225.12 Ready for Withdrawal – Claim Yours Now! https://script.google.com/macros/s/AKfycbwtgQP-FYsEjrVMEkZ5PhDtYqDRx5n1g4Qqrs52u9HnJDlJ4GM8pH8JghNS5_nIzEyuPg/exec/3a0m7k2w/6u9s/u/lq/9e1j8l5t/7q0z/q/gt/8v3n0l3i/4z5r/w/u0'),
(275, 'WesleyDar', 'ledbetterbasun1989@gmail.com', 'URGENT! Time Sensitive: Claim Your $213,295.18 Winnings Now', 'IMPORTANT! Breaking News: $213,225.12 Ready for Withdrawal – Claim Yours Now! https://script.google.com/macros/s/AKfycbwtgQP-FYsEjrVMEkZ5PhDtYqDRx5n1g4Qqrs52u9HnJDlJ4GM8pH8JghNS5_nIzEyuPg/exec/3a0m7k2w/6u9s/u/lq/9e1j8l5t/7q0z/q/gt/8v3n0l3i/4z5r/w/u0'),
(276, 'Julie', 'businessgrowtogether@outlook.com', 'Personal Assistant', 'Are you looking for a personal assistant who can handle your daily business operations and make your life easier? I can help with tasks related to admin, marketing, gathering data from multiple websites, answering emails, website management, social media, content writing, planning new projects, bookkeeping, entering data into softwares, and back-office assistance. I have an Inhouse Content writer, social media specialist, Data Entry Operator, Website Developer and Bookkeeper. My costing varies from $8/hr to $30/hr depending on type of project and its complexity.\r\n\r\nIf you are interested, send me an email at Businessgrowtogether@outlook.com with a list of tasks you want to accomplish, and We can discuss our collaboration over a video call as per your convenience.'),
(277, 'Candra Bermingham', 'bermingham.candra@yahoo.com', 'Ranks any article, video, or website #1 on Google within 20 minutes', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWorld\'s First AI Agent Powered By ChatGPT-5…\r\nThat Writes And Ranks Anything We Want… On The First Page Of Google… With ZERO SEO. And Zero Ads… \r\n\r\nSee it in action: https://goldsolutions.pro/ApexAI\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(278, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hello  i write about   the price for reseller', 'Здравейте, исках да знам цената ви.'),
(279, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Aloha, i write about   the prices', 'Hola, quería saber tu precio..'),
(280, 'Edwarddrida', 'dianajalun@gmail.com', 'Withdraw your $213,495.23 urgently', 'Hello. \r\nYou have 24 hours left to withdraw your money $213,495.23 - https://script.google.com/macros/s/AKfycbyzC3N1zmy9WdQw5devAfZzEQldk2_FBYarl_cC2RK_ew7DRw2ugezSfv5oaR5tpeQ/exec/3z9t9l2y/3z0z/x/24/1r5l9j5p/3c5q/r/e0/5x7t7d2u/3q5f/e/yi \r\nAfter 24 hours, your balance in our system will be reset.'),
(281, 'Edwarddrida', 'dianajalun@gmail.com', 'Withdraw your $213,495.23 urgently', 'Hello. \r\nYou have 24 hours left to withdraw your money $213,495.23 - https://script.google.com/macros/s/AKfycbyzC3N1zmy9WdQw5devAfZzEQldk2_FBYarl_cC2RK_ew7DRw2ugezSfv5oaR5tpeQ/exec/3z9t9l2y/3z0z/x/24/1r5l9j5p/3c5q/r/e0/5x7t7d2u/3q5f/e/yi \r\nAfter 24 hours, your balance in our system will be reset.'),
(282, 'Edwarddrida', 'dianajalun@gmail.com', 'Withdraw your $213,495.23 urgently', 'Hello. \r\nYou have 24 hours left to withdraw your money $213,495.23 - https://script.google.com/macros/s/AKfycbyzC3N1zmy9WdQw5devAfZzEQldk2_FBYarl_cC2RK_ew7DRw2ugezSfv5oaR5tpeQ/exec/3z9t9l2y/3z0z/x/24/1r5l9j5p/3c5q/r/e0/5x7t7d2u/3q5f/e/yi \r\nAfter 24 hours, your balance in our system will be reset.'),
(283, 'Edwarddrida', 'dianajalun@gmail.com', 'Withdraw your $213,495.23 urgently', 'Hello. \r\nYou have 24 hours left to withdraw your money $213,495.23 - https://script.google.com/macros/s/AKfycbyzC3N1zmy9WdQw5devAfZzEQldk2_FBYarl_cC2RK_ew7DRw2ugezSfv5oaR5tpeQ/exec/3z9t9l2y/3z0z/x/24/1r5l9j5p/3c5q/r/e0/5x7t7d2u/3q5f/e/yi \r\nAfter 24 hours, your balance in our system will be reset.'),
(284, 'Edwarddrida', 'dianajalun@gmail.com', 'Withdraw your $213,495.23 urgently', 'Hello. \r\nYou have 24 hours left to withdraw your money $213,495.23 - https://script.google.com/macros/s/AKfycbyzC3N1zmy9WdQw5devAfZzEQldk2_FBYarl_cC2RK_ew7DRw2ugezSfv5oaR5tpeQ/exec/3z9t9l2y/3z0z/x/24/1r5l9j5p/3c5q/r/e0/5x7t7d2u/3q5f/e/yi \r\nAfter 24 hours, your balance in our system will be reset.'),
(285, 'Hyman Slone', 'hyman.slone@hotmail.com', 'ChatGPT, Gemini, Stable Diffusion & More… Without Monthly Fees', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWhat if you could use the best AI models in the world without limits or extra costs?\r\nNow you can. With our brand-new AI-powered app, you’ll have ChatGPT, Gemini Pro, Stable Diffusion, Cohere AI, Leonardo AI Pro, and more — all under one roof.\r\n\r\nNo monthly subscriptions\r\n\r\nNo API key expenses\r\n\r\nNo experience required\r\n\r\nJust one dashboard, one payment, and endless possibilities.\r\n\r\nSee it in action: https://www.novaai.expert/AIModelSuite\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker');
INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`) VALUES
(286, 'Jami McCollister', 'mccollister.jami@yahoo.com', 'THE FASTEST WAY TO CREATE, PUBLISH & PROFIT FROM EBOOKS', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nForget spending weeks writing — Ebook Writer AI lets you create a polished eBook in just 10–15 minutes. Simply enter your topic, and the tool will generate chapters, format the text, add images, and even include affiliate links.\r\n\r\nWhy choose Ebook Writer AI?\r\n\r\nFast: a complete eBook in minutes.\r\n\r\nProfessional design, no skills required.\r\n\r\nBuilt-in monetization.\r\n\r\nPerfect for bloggers, coaches, marketers, and anyone who wants to sell knowledge through eBooks.\r\n\r\nTry it today > https://www.novaai.expert/eBookWriterAI\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(287, 'RaymondWal', 'raymondmighbeirm@gmail.com', 'A revolutionary technique of email dissemination.', 'Hi there! afadbd.org \r\n \r\nReach new clients legally and efficiently with targeted communication. \r\nWhen such proposals are sent, no personal data is used, and messages are sent to securely configured contact forms. \r\nBecause Contact Forms are designed for legitimate messages, submissions made through them are less likely to be marked as spam. \r\nTry it now for free and see the benefits for yourself. \r\nYou can count on us to send up to 50,000 messages efficiently. \r\n \r\nThe cost of sending one million messages is $59. \r\n \r\nThis offer is automatically generated. \r\n \r\nContact us. \r\nTelegram - https://t.me/FeedbackFormEU \r\nWhatsApp - +375259112693 \r\nWhatsApp  https://wa.me/+375259112693 \r\nWe only use chat for communication.'),
(288, 'Fredric Ganz', 'ganz.fredric85@outlook.com', 'The Fastest Way to Save Real Money in 2025', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nhese Ready-to-Use Prompts Turn Free AI Tools Like ChatGPT into a Personal Deal Hunter That Finds You Cheaper Alternatives, Travel Hacks, Cashback Opportunities, and Budget Wins in Seconds -\r\nAll Without Changing a Thing About Your Routine\r\nNo Coupons | No Extensions | No Guesswork | 100% Real Savings | 100% Resell Rights\r\n\r\nSee it in action: https://goldsolutions.pro/money-saving-prompts\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(289, 'LeeEtess', 'irinademenkova86@gmail.com', 'Hi, i am wrote about     price', 'Sawubona, bengifuna ukwazi intengo yakho.'),
(290, 'WesleyDar', 't02221378@gmail.com', 'IMPORTANT MESSAGE! Instant Redemption: Collect Your $213,465.06 Now', 'IMPORTANT MESSAGE! Collect Your $213,405.82 Prize Without Delay https://script.google.com/macros/s/AKfycbwN_i7XR-yRkFWgpnZSZMRB3REWDfArCIg4kJ_mCVyrpBrlbCGIweZfaDjkxUktOuylwQ/exec/4x5u8d1i/7u9f/e/vt/6r4t7h2w/7v8y/2/j6/6e3b8k5y/5y8f/w/pu'),
(291, 'WesleyDar', 't02221378@gmail.com', 'IMPORTANT MESSAGE! Instant Redemption: Collect Your $213,465.06 Now', 'IMPORTANT MESSAGE! Collect Your $213,405.82 Prize Without Delay https://script.google.com/macros/s/AKfycbwN_i7XR-yRkFWgpnZSZMRB3REWDfArCIg4kJ_mCVyrpBrlbCGIweZfaDjkxUktOuylwQ/exec/4x5u8d1i/7u9f/e/vt/6r4t7h2w/7v8y/2/j6/6e3b8k5y/5y8f/w/pu'),
(292, 'WesleyDar', 't02221378@gmail.com', 'IMPORTANT MESSAGE! Instant Redemption: Collect Your $213,465.06 Now', 'IMPORTANT MESSAGE! Collect Your $213,405.82 Prize Without Delay https://script.google.com/macros/s/AKfycbwN_i7XR-yRkFWgpnZSZMRB3REWDfArCIg4kJ_mCVyrpBrlbCGIweZfaDjkxUktOuylwQ/exec/4x5u8d1i/7u9f/e/vt/6r4t7h2w/7v8y/2/j6/6e3b8k5y/5y8f/w/pu'),
(293, 'WesleyDar', 't02221378@gmail.com', 'IMPORTANT MESSAGE! Instant Redemption: Collect Your $213,465.06 Now', 'IMPORTANT MESSAGE! Collect Your $213,405.82 Prize Without Delay https://script.google.com/macros/s/AKfycbwN_i7XR-yRkFWgpnZSZMRB3REWDfArCIg4kJ_mCVyrpBrlbCGIweZfaDjkxUktOuylwQ/exec/4x5u8d1i/7u9f/e/vt/6r4t7h2w/7v8y/2/j6/6e3b8k5y/5y8f/w/pu'),
(294, 'WesleyDar', 't02221378@gmail.com', 'IMPORTANT MESSAGE! Instant Redemption: Collect Your $213,465.06 Now', 'IMPORTANT MESSAGE! Collect Your $213,405.82 Prize Without Delay https://script.google.com/macros/s/AKfycbwN_i7XR-yRkFWgpnZSZMRB3REWDfArCIg4kJ_mCVyrpBrlbCGIweZfaDjkxUktOuylwQ/exec/4x5u8d1i/7u9f/e/vt/6r4t7h2w/7v8y/2/j6/6e3b8k5y/5y8f/w/pu'),
(295, 'Katrin Kane', 'kane.katrin@gmail.com', 'Dominate the Cooking, Keto, Yoga & Fitness Markets', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nSell Without Limits. Rebrand Like a Pro. Cash In on Every Sale!\r\nLaunch Your Own Training Video Empire\r\nThe Ultimate Learning Library with Unrestricted PLR\r\nOver 1,600 premium training videos\r\nin red-hot niches ready for instant monetization!\r\n\r\nSee it in action: https://goldsolutions.pro/TheUltimateLearningLibrary\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(296, 'Meagan Crouch', 'meagan.crouch89@gmail.com', '100K Subs YouTube Build: 12 Months, 3 Faceless Videos/Week', 'We have a promotional offer for your website afadbd.org.\r\n\r\nA 100% Done-For-You Faceless YouTube Channel Build\r\nThe goal is to reach 100,000 subscribers and achieve a fully monetized channel that generates monthly income, paid by Google on the 21st. \r\nOver a 12-month period, 3 videos per week are created and uploaded with professional voiceovers and permission-based footage. \r\nNo camera or editing is required — every step is handled completely from start to finish.\r\n\r\nSee it in action: https://goldsolutions.pro/100KSubsYouTube\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(297, 'LeeEtess', 'zekisuquc419@gmail.com', 'Hallo, i am wrote about your the price', 'Прывітанне, я хацеў даведацца Ваш прайс.'),
(298, 'Nandy', 'creativeteamhire@outlook.com', 'Content Writer and Copywriter', 'Hi, I\'m Nandy, a content and copywriter with over 12 years of experience creating content for various industries. I write blogs, rewrite old content, news articles, SEO-friendly web content, product descriptions, business service descriptions, newsletters, brochures, and more. My focus is on delivering content that connects with your audience, improves SEO, and gets results—all written without AI. I also provide reports from paid tools to back up my work. My rate is $50 per 1,000 words, offering great value for high-quality content. \r\n\r\nIf you\'d like to improve your content, feel free to email me at creativeteamhire@outlook.com.'),
(299, '* * * No mining, no trading - just free Bitcoin in 1 tap: https://primefisolutions.com/index.php?mbzoof * * * hs=d13784673f637677426b66b478044a25* ххх*', 'paouqua@mailbox.in.ua', 'yql36d', 'hljhsn'),
(300, '* * * <a href=\"https://primefisolutions.com/index.php?mbzoof\">Your new iPhone 16 is closer than you think</a> * * * hs=d13784673f637677426b66b478044a25* ххх*', 'paouqua@mailbox.in.ua', 'yql36d', 'hljhsn'),
(301, 'Alejandro Steinberg', 'steinberg.alejandro@yahoo.com', 'Earn Big with UGC Videos — No Cameras, No Actors Needed', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWhy do you need this? Because UGC videos sell better than any banner or text ad — and brands pay $300–$500 per clip. With UGCfluencer, you can create these viral videos in just 5 seconds — no studio, no skills, no expenses. Simply type your text, and AI generates ultra-realistic influencer-style content that converts. Whether you want to monetize traffic or start a new income stream, this is your fast ticket into the UGC revolution.\r\n\r\nSee it in action: https://www.novaai.expert/UGCfluencer\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(302, 'Mike Stefan Evans', 'mike@monkeydigital.co', 'Collaboration Request', 'Hello, \r\n \r\nThis is Mike from Monkey Digital, \r\nI am getting in touch to discuss a great opportunity. \r\n \r\nHow would you like to show our promotions on your platform and redirect via your personalized affiliate link towards hot-selling services from our website? \r\n \r\nThis way, you receive a recurring 35% commission, month after month from any sales that come in from your website. \r\n \r\nThink about it, all businesses need SEO, so this is a massive opportunity. \r\n \r\nWe already have thousands of affiliates and our payouts are paid out on time. \r\nRecently, we reached $27280 in payouts to our partners. \r\n \r\nIf you want in, kindly contact us here: \r\nhttps://monkeydigital.co/affiliates-whatsapp/ \r\n \r\nOr register today: \r\nhttps://www.monkeydigital.co/join-our-affiliate-program/ \r\n \r\nLooking forward, \r\nMike Stefan Evans\r\n \r\nPhone/whatsapp: +1 (775) 314-7914'),
(303, 'Myrtis Walck', 'myrtis.walck@gmail.com', 'Turn Your Site into an AI Universe: All Top Models in One Click', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWhy do you need this? To access the best AI tools—text, images, voice, code, video—without juggling dozens of subscriptions or paying monthly. Multiverse AI brings everything into one cloud dashboard, giving lifetime access to all current and future AI models with zero recurring fees. You get freedom, speed, and savings—all under your control. Discover how easy it is to create and scale content—Multiverse AI makes it possible.\r\n\r\nSee it in action: https://goldsolutions.pro/MultiverseAI\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(304, 'Vickey Daugherty', 'daugherty.vickey@msn.com', 'Your 24/7 Assistant to Earn More, Work Less', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nImagine having an assistant who works around the clock, handling all the routine tasks, attracting clients, and generating profit even while you sleep. Grab AI SuperBot isn’t just another tool — it’s a complete solution that helps you work faster, smarter, and earn more without extra effort.\r\n\r\nWhy does this matter to you? Because time is your most valuable resource. With this bot, you’ll free up hours usually wasted on repetitive tasks and invest them into growing your business or personal projects. It’s your chance to reach a new level of efficiency and income.\r\n\r\nSee it in action: https://www.novaai.expert/AISuperBOT\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(305, 'Nila Brisbane', 'nila.brisbane@googlemail.com', 'Create, Host and Sell Your Own Courses & Keep 100% Of The Profits..', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWorld’s First AI App That Instantly Builds Your Own “Udemy-Like” eLearning Platform - Preloaded With 100+ Ready-To-Sell, Red-Hot Online Courses\r\nIn One Single Dashboard, For A Low One-Time Fee!\r\nOnly 3 EASY Clicks - Create & Sell Stunning Online Courses on Your Own Udemy™-Style Platform to Hungry Buyers for Top Dollar.\r\n\r\nNo Reserach | No Course Creation | No Tech  Skills | No Monthly Fees Required\r\n\r\nSee it in action: https://www.novaai.expert/CourseBeastAI\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(306, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Aloha  i write about   the price', 'Hæ, ég vildi vita verð þitt.'),
(307, 'Chun Naylor', 'chun.naylor@msn.com', 'Launch Your AI Store Today – No Design. No Code. Just Profit', 'Hi,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWhy do you need this? Imagine launching your own AI store on WordPress, stocked with ready-to-sell GPTs and AI prompts—and starting to make money today. No design headaches, no tech setup, just a polished storefront that builds trust and delivers real sales straight out of the box.\r\n\r\nWhether you\'re a webmaster or money-maker, AI Store Fortune removes the tech barrier. Made for people who’d rather grow their traffic and income than tinker with confusing plugins. Want to finally turn AI ideas into stable income? Click to see how effortlessly you can own—and profit from—your AI business.\r\n\r\nSee it in action: https://smartexperts.pro/AIStoreFortune\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://smartexperts.pro/unsub?domain=afadbd.org \r\nAddress: Address: 1464 Lewis Street Roselle, IL 60177\r\nLooking out for you, Michael Turner.'),
(308, 'Margaret Julia', 'jiutiven@gmail.com', '', 'Hi. We run an Instagram growth service, which increases your number of followers both safety and practically.\r\n\r\n- We guarantee to gain you new 300-700+ followers per month\r\n- Real human followers: People follow you because they are interested in your business or niche\r\n- All actions are made manually by our team. We do not use any bots.\r\n\r\nThe price is just $60 (USD) per month, and we can start immediately. If you are interested and would like to see some of our previous work, let me know and we can discuss further.\r\n\r\nKind Regards,\r\n\r\nTo Unsubscribe, reply with the word unsubscribe in the subject.'),
(309, 'Mike Lukas Martin', 'mike@monkeydigital.co', 'Increase Your Website Traffic with Targeted Social Ads – Only $10 for 10K Visits!', 'Hi there, \r\n \r\nI wanted to reach out with something that could seriously boost your website’s visitor count. We work with a trusted ad network that allows us to deliver genuine, geo-targeted social ads traffic for just $10 per 10,000 visits. \r\n \r\nThis isn\'t junk clicks—it’s engaged traffic, tailored to your target country and niche. \r\n \r\nWhat you get: \r\n \r\n10,000+ genuine visitors for just $10 \r\nGeo-targeted traffic for your chosen location \r\nLarger traffic packages available based on your needs \r\nTrusted by SEO experts—we even use this for our SEO clients! \r\n \r\nWant to give it a try? Check out the details here: \r\nhttps://www.monkeydigital.co/product/country-targeted-traffic/ \r\n \r\nOr chat with us on WhatsApp: \r\nhttps://monkeydigital.co/whatsapp-us/ \r\n \r\nLet\'s get started today! \r\n \r\nBest, \r\nMike Lukas Martin\r\n \r\nPhone/whatsapp: +1 (775) 314-7914'),
(310, 'Ulrich Papst', 'papst.ulrich@gmail.com', 'Get Free Google Traffic Fast — Even Without a Website!', 'Hi,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWhy you need this: to have every campaign, affiliate offer, or project start delivering traffic and income today — without spending a dime on ads or tech headaches. Ghost Pages turns you into a stealth engine that Google absolutely trusts: you build invisible pages using a secret Google asset, and they quietly start delivering targeted visitors — while your competition is nowhere the wiser.\r\n\r\nIt’s easy, it’s fast, it’s genius: no domains, hosting, social media, or technical skills required — if you can click and copy, you can do this. Plus, it really works and scales: launch one Ghost Page and BAM — traffic flows wherever you want: affiliate links, e‑com, leads — you choose. Ready to start in minutes? Discover how and get results that might blow your mind.\r\n\r\nSee it in action: http://smartexperts.pro/GhostPages\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://smartexperts.pro/unsub?domain=afadbd.org \r\nAddress: Address: 1464 Lewis Street Roselle, IL 60177\r\nLooking out for you, Michael Turner.'),
(311, 'LeeEtess', 'zekisuquc419@gmail.com', 'Aloha    writing about your the prices', 'Sawubona, bengifuna ukwazi intengo yakho.'),
(312, 'Mike Nathan Gustafsson', 'info@strictlydigital.net', 'Semrush links for afadbd.org', 'Greetings, \r\n \r\nHaving some bunch of links redirecting to afadbd.org might bring no value or harmful results for your site. \r\n \r\nIt really doesn’t matter the number of external links you have, what is crucial is the amount of keywords those domains rank for. \r\n \r\nThat is the most important factor. \r\nNot the overrated third-party metrics or SEO score. \r\nThat anyone can do these days. \r\nBUT the amount of high-traffic search terms the sites that link to you rank for. \r\nThat’s the bottom line. \r\n \r\nGet these quality links redirect to your site and you will ROCK! \r\n \r\nWe are offering this special service here: \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nIn doubt, or want clarification, chat with us here: \r\nhttps://www.strictlydigital.net/whatsapp-us/ \r\n \r\nBest regards, \r\nMike Nathan Gustafsson\r\n \r\nstrictlydigital.net \r\nPhone/WhatsApp: +1 (877) 566-3738'),
(313, 'Harlandyell', 'nomin.momin+173g3@mail.ru', 'Odkwsdjferheejdfehueyidjaswdhuheufhe fjhwegfweuihdwhfi ifhewidjawsjdgewuifhqw', 'Mfwdjwdhefiejfh fhiwuewuoioruiwes jkcsjhcksdlalsdjfhgh ejdowkkDIEWHRUEOFIW JIEWFOKDWDJEWIHFIEWFJEWFJIkhfjejfie efjfwjdfe afadbd.org'),
(314, 'Arden Highsmith', 'arden.highsmith@gmail.com', 'Write a Book in a Day—No Writing Skills Needed', 'Hi,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWhy should you care? Because Book In A Day lets you turn your ideas into a polished, professional book in just hours—not months. No writing skills, no expensive editors, no formatting headaches. Simply follow the AI-driven, step-by-step system and you’re done! Publish your book, build authority, and start earning—effortlessly, swiftly, and stress-free.\r\n\r\nSee it in action: http://smartexperts.pro/BookInADay\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://smartexperts.pro/unsub?domain=afadbd.org \r\nAddress: Address: 1464 Lewis Street Roselle, IL 60177\r\nLooking out for you, Michael Turner.'),
(315, 'Lea Lanning', 'lea.lanning95@yahoo.com', 'Discover the stealth traffic trick top affiliates don’t want you to know', 'Hi,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWhy do you need this? Picture waking up anywhere — Bali, a café in Paris, or your couch — checking your phone and seeing a steady stream of buyer-ready clicks rolling in… without ads, outreach, or a website. That’s exactly what Rapid Traffic Flow delivers: a super-simple, plug-and-play system that gets traffic and sales flowing in minutes.\r\n\r\nWith Rapid Traffic Flow, you get a clear 3-step blueprint, AI‑powered boosters to automate the process, a “Hidden Hub” you can tap at will, and a solid refund guarantee if your traffic spike doesn’t happen — all for less than the cost of your next takeout order. Ready to stop chasing traffic and start capturing it? Dive in now and dominate the affiliate game today!\r\n\r\nSee it in action: https://smartexperts.pro/RapidTrafficFlow\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://smartexperts.pro/unsub?domain=afadbd.org \r\nAddress: Address: 1464 Lewis Street Roselle, IL 60177\r\nLooking out for you, Michael Turner.'),
(316, 'Darwin Snipes', 'darwin.snipes75@gmail.com', 'Your Free Shortcut to Building a Profitable Email List—Fast', 'Hi,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWhy do you need this? Because Passive Class from Lee Murray gives you a totally free Lead Capture Hub—a ready-to-use system to grow your own email list and start earning without losing time or reinventing the wheel.\r\n\r\nNo bland mastermind babble—just clear, actionable steps that turn curious visitors into subscribers, and subscribers into revenue. It\'s friendly, it\'s expert-backed, and it\'s built to upgrade your status as a money-maker online. Click through and see how quickly it turns potential into profit.\r\n\r\nSee it in action: http://smartexperts.pro/PASSIVECLASS\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://smartexperts.pro/unsub?domain=afadbd.org \r\nAddress: Address: 1464 Lewis Street Roselle, IL 60177\r\nLooking out for you, Michael Turner.'),
(317, 'Concepcion Niland', 'niland.concepcion91@gmail.com', 'need help', 'Ever stop to think how much you\'re spending on marked-up CPMs for Connected TV ads?\r\nIf you\'re using “premium” audience segments without verifying who you\'re actually reaching, that money is likely feeding someone else\'s family.\r\nNo pressure. Here’s the site if you\'re open to see a revolutionary vision for digital advertising\r\ntopshelfaudience.com using real-time Intent data from an Integration in our platform to Lotame.com. You can reach me at marketing@mrmarketingres.com or 843-720-7301. And if this isn\'t a fit please feel free to email me and I\'ll be sure not to reach out again.  Thanks!'),
(318, 'Nancee Tober', 'nancee.tober@gmail.com', 'Clicks in a short while? Easy path for you.', 'Hey,\r\n\r\nYou’re invited to check out an exclusive deal for your site.\r\n\r\nWhy you’ll want to see this: If you’re working online or an income-focused pro, and you’d like new reach — with no additional platforms, no content creation, and no complicated steps — then **Social Safe List** is a simple solution.  \r\n\r\nOpen the door to invite-only networks populated by engaged people. Put your promo, post, and watch activity begin. Easy start, built-in materials, reliable steps — that’s all.\r\n\r\nInterested how you can gain engagement from real people in 10 minutes?\r\n\r\nExplore it: https://smartexperts.pro/SocialSafeList?afadbd.org\r\n\r\nYou are receiving this mail because it could suit your interests.  \r\nIf you don’t want to be sent further updates, please click here to leave:  \r\nhttps://smartexperts.pro/unsub?domain=afadbd.org  \r\n\r\nAddress: 1464 Lewis Street Roselle, IL 60177  \r\nBest,  \r\nMichael Turner.'),
(319, 'Joanna Riggs', 'joannariggs278@gmail.com', 'Video Promotion for your website', 'Hi,\r\n\r\nI just visited afadbd.org and wondered if you\'ve ever considered an impactful video to advertise your business? Our videos can generate impressive results on both your website and across social media.\r\n\r\nOur videos cost just $195 (USD) for a 30 second video ($239 for 60 seconds) and include a full script, voice-over and video.\r\n\r\nI can show you some previous videos we\'ve done if you want me to send some over. Let me know if you\'re interested in seeing samples of our previous work.\r\n\r\nRegards,\r\nJoanna\r\n\r\nUnsubscribe: https://unsubscribe.video/unsubscribe.php?d=afadbd.org'),
(320, 'LeeEtess', 'irinademenkova86@gmail.com', 'Hallo,   wrote about your the price', 'Hi, მინდოდა ვიცოდე თქვენი ფასი.'),
(321, 'SimonEtess', 'irinademenkova86@gmail.com', 'Aloha  i wrote about your the price for reseller', 'Hola, volia saber el seu preu.'),
(322, 'Tanu', 'brandbuildingassistance@outlook.com', 'Blog Topics and Content Improvement for afadbd.org', 'Hi, I’m Tanu, a HubSpot-Certified Content Manager with 8+ years of experience in creating SEO-driven blogs, articles, product descriptions, and website copy. I also specialize in keyword research, meta titles, and meta descriptions to boost search rankings and online visibility.\r\n\r\nIf you’d like, I can share tailored blog topic suggestions and content improvement ideas for your website.\r\n\r\nLet’s connect: brandbuildingassistance@outlook.com'),
(323, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hallo    wrote about   the prices', 'Прывітанне, я хацеў даведацца Ваш прайс.'),
(324, 'Nydia Gruner', 'gruner.nydia@hotmail.com', 'Take the Traffic Wave — Next-gen AI systems directing ongoing visitors towards your project!', 'Greetings,\r\n\r\nWe have a limited message for your website afadbd.org.\r\n\r\nWhy is this worth a look? Because you can skip costly ads or get lost in search algorithms — Traffic Tsunami (FTT) does the heavy lifting.  \r\n\r\nThis smart platform can place your links inside responses from Grok — and those entries remain visible, driving regular clicks.  \r\n\r\nFor site owners ready to move first, this is your chance. Discover how with minimal effort you can stand out in the new search era — long before the crowd.\r\n\r\nView the details: https://smartexperts.pro/TrafficTsunami?afadbd.org\r\n\r\nYou are receiving this message because we consider our content may be useful to you.  \r\nIf you no longer want to get additional communications from us, please click here to unsubscribe:  \r\nhttps://smartexperts.pro/unsub?domain=afadbd.org\r\n\r\nAddress: 1464 Lewis Street Roselle, IL 60177  \r\nLooking out for you,  \r\nMichael Turner'),
(325, 'BrandonJen', 'urbmocyvyooz7m4@tempmail.us.com', 'AccsMarket.net: Your Go-To for Verified Social Media Accounts', 'https://AccsMarket.net is your one-stop shop for bulk verified accounts. Our PVA accounts are designed to work seamlessly across all major social media platforms, created with different server IPs for maximum security. Enjoy fast delivery and top-notch service with every purchase. \r\n \r\nGo Here: \r\n \r\nhttps://AccsMarket.net \r\n \r\nA Thousand Thanks!'),
(326, 'Shauna Carron', 'shauna.carron93@gmail.com', 'Subscribers on autopilot — no web setup', 'Hello,\r\n\r\nI’ve got something new for your website afadbd.org.\r\n\r\nWhy this matters to you? You’re tired constantly fixing sites, search optimization, or nonstop writing.  \r\n\r\nWith Auto Lead Machine, simply link up your autoresponder, create a simple ad — and in less than 20 minutes, you’ll notice quality contacts flow in hands-free.  \r\n\r\nJust type a quick title, select a picture, hit launch, and see contacts land straight to your email list consistently.  \r\n\r\nIt’s like owning a list builder — accurate, ready-to-go, and hassle-free. No site, no social media work, no complicated campaigns — just contacts. All at a coffee-price level, with a simple return option if you’re not satisfied.  \r\n\r\nTake a look: https://smartexperts.pro/AutoLeadMachinee?afadbd.org  \r\n\r\nYou are receiving this message because we believe this may be relevant to you.  \r\nIf you do not wish to receive future emails from us, please click here to UNSUBSCRIBE:  \r\nhttps://smartexperts.pro/unsub?domain=afadbd.org  \r\n\r\nAddress: 1464 Lewis Street Roselle, IL 60177  \r\nLooking out for you, M. Turner.'),
(327, 'GeorgeEtess', 'irinademenkova86@gmail.com', 'Aloha    writing about   the prices', 'Hi, ego volo scire vestri pretium.'),
(328, 'LeeEtess', 'zekisuquc419@gmail.com', 'Hallo,   write about   the price', 'Salam, qiymətinizi bilmək istədim.'),
(329, 'Tim Bartlett', 'tim.bartlett@gmail.com', 'Half-price outreach', 'We’re running a special offer — submit your message to 1,000,000 sites for only $50 (normally $99). Write me at kloos@bienhoamarketing.com'),
(330, 'Alvin Merrett', 'merrett.alvin@gmail.com', 'Upgrade your page into an AI hub: all top models in an instant', 'Hello,\r\n\r\nWe have an offer for your website afadbd.org.\r\nhttps://topcasworld.pro/MultiverseAI?afadbd.org\r\n\r\nWhy does this matter?  \r\nTo try out the best AI tools—writing, images, voice, code, video—without dealing with recurring plans.  \r\nMultiverse AI brings all tools into one place, giving unlimited usage rights to all present and next-generation AI models with no repeated charges.  \r\nYou get flexibility, speed, and reduced costs—all under your management.  \r\nDiscover how easy it is to produce and grow content—Multiverse AI makes it possible.\r\n\r\nCheck the details: https://topcasworld.pro/MultiverseAI?afadbd.org\r\n\r\nYou are receiving this note because we believe our solution may be interesting to you.  \r\nIf you do not wish to get more messages, please click here to UNSUBSCRIBE:  \r\nhttps://topcasworld.pro/unsubscribe?domain=afadbd.org  \r\n\r\nAddress: 209 West Street Comstock Park, MI 49321  \r\nLooking out for you,  \r\nEthan Parker'),
(331, 'EmmaAdary', 'emmaIntapE355@hotmail.com', 'Your site got me curious', 'Hey, I just stumbled onto your site… are you always this good at catching attention, or did you make it just for me? Write to me on this website ---  rb.gy/3pma6x?Adary  ---  my username is the same, I\'ll be waiting.'),
(332, 'Mike Frank Eriksson', 'info@speed-seo.net', 'Find afadbd.org SEO Issues totally free', 'Hi, \r\nWorried about hidden SEO issues on your website? Let us help — completely free. \r\nRun a 100% free SEO check and discover the exact problems holding your site back from ranking higher on Google. \r\n \r\nRun Your Free SEO Check Now \r\nhttps://www.speed-seo.net/check-site-seo-score/ \r\n \r\nOr chat with us and our agent will run the report for you: https://www.speed-seo.net/whatsapp-with-us/ \r\n \r\nBest regards, \r\n \r\n \r\nMike Frank Eriksson\r\n \r\nSpeed SEO Digital \r\nEmail: info@speed-seo.net \r\nPhone/WhatsApp: +1 (833) 454-8622'),
(333, 'Carson Newman', 'newman.carson@yahoo.com', 'Discover how to reach $2K–$10K steady monthly — no need to create your own setup', 'Good day, \r\n\r\nWe’d like to share something for your website afadbd.org.  https://goldsolutions.pro/MMM?afadbd.org\r\n \r\nHere’s the idea: imagine starting each day with a consistent flow on your account — no need to design complicated funnels.  \r\n\r\nWith Monthly Money Masterclass, you decide the route that’s easiest for you: give partners the option to self-serve with QR codes, or offer it as a managed package.  \r\n\r\nYou generate recurring $5–$20 from each client, or $200+ steady each month from 5–10 users — clear and quick.\r\n \r\nGain certainty. You receive a step-by-step plan designed by people who tested it live. Nothing abstract — a path you can follow directly. \r\n \r\nReady to dive in?  \r\n \r\nView the process: https://goldsolutions.pro/MMM?afadbd.org \r\n \r\nWe’re sharing this because it may connect to your work.  \r\nTo stop future messages, just click here to UNSUBSCRIBE:  \r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org  \r\n \r\nAddress: 209 West Street Comstock Park, MI 49321  \r\nRespectfully,  \r\nEthan Parker'),
(334, 'Tangela Edmiston', 'tangela.edmiston@gmail.com', 'AI places you into leading positions.', 'Hi there,\r\n\r\nWe’re sharing a system that fits your site afadbd.org.\r\n\r\nWhy do you need this? This helps you bypass endless SEO work and paid traffic — all with just one click.  \r\n\r\nAPEX AI, powered by ChatGPT-5, right away writes and positions your content in prime search spots — no domains, no training, zero setup fees.  \r\n\r\nJust input your topic, turn it on, and see qualified visitors flow in within hours.  \r\n\r\nIt’s your simple way to gaining visibility while others are still lost in manual work.  \r\n\r\nTake a look: https://smartexperts.pro/ApexAI?afadbd.org\r\n\r\nYou are receiving this message because this may help your business.  \r\nIf you do not wish to receive any more messages, please click here to UNSUBSCRIBE:  \r\nhttps://smartexperts.pro/unsub?domain=afadbd.org  \r\n\r\nAddress: 1464 Lewis Street Roselle, IL 60177  \r\nLooking out for you, M. Turner.'),
(335, 'Patricia Hope', 'ptrhop@protonmail.com', 'Can you enhance your blog pages?', 'Hi!\r\n\r\nI\'ve been a reader of your blog for around 4 months and I would like first of all to say that I really enjoy it.\r\n\r\nI\'ve got recently some problems with my eyes which effects my reading ability.\r\n\r\nThereby I have a favor to ask. Is it possible for you to add an audio podcast version of your articles?\r\n\r\nIt would be very useful for people like me and others who like to listen to your content.\r\n\r\nI\'ve researched on that a bit and I found few free services that can help to do that.\r\n\r\nHere are the websites that I found that can add podcast to your site for free, maybe there are more but I found these two.\r\n\r\nhttps://websitevoice.com\r\n\r\nhttps://www.text2speech.org/\r\n\r\nhttp://www.fromtexttospeech.com\r\n\r\nThank you!\r\n\r\nPatri Hope'),
(336, 'GeorgeEtess', 'irinademenkova86@gmail.com', 'Hi  i wrote about   the prices', 'Hai, saya ingin tahu harga Anda.'),
(337, 'Albert Villareal', 'albert.villareal@gmail.com', 'Achieve Your Morning Growth in Just a few Days — No tricky systems, No outside promotion!', 'Greetings,\r\n\r\nHere’s some insight for your website afadbd.org : https://goldsolutions.pro/TitanEdge?afadbd.org\r\n\r\nTired of heavy structures, marketing campaigns, and constant struggle?  \r\nIn just 5 days, you’ll get a practical, step-by-step workflow — just less than an hour each morning — that converts your morning routine into measurable outcomes.  \r\nZero stock, no clicks required, no complex setups.  \r\nJust clear steps, more freedom, and the energy of watching progress appear.  \r\nInterested in the process?\r\n\r\nWatch how it works: https://goldsolutions.pro/TitanEdge?afadbd.org\r\n\r\nYou are receiving this message because we think our content may be helpful to you.  \r\nIf you do not wish to receive further updates from us, please click here to UNSUBSCRIBE:  \r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org  \r\nAddress: 209 West Street Comstock Park, MI 49321  \r\n\r\nKind regards,  \r\nEthan Parker'),
(338, 'Lisa', 'bizassistance008@outlook.com', 'Bookkeeping starting @ $50/month', 'Hi, I help businesses worldwide keep their books organized, reconciled, and accountant-ready—starting at just $50/month. Many companies overpay because accountants charge $150+ per hour for bookkeeping, which isn’t their main focus. With 15+ years of experience, I handle categorization, bank reconciliations, monthly reports, and clean records across QuickBooks, Xero, Zoho Books, FreshBooks, Wave, Sage, Odoo, NetSuite, Tally, and MYOB.\r\n\r\nWorking remotely from India, I specialize in global bookkeeping practices so your accountant spends less time “fixing” books—helping you save thousands of dollars yearly.\r\n\r\nWould you be open to a quick 15-minute call this week? You can email me directly at BizAssistance008@outlook.com'),
(339, 'JosepharViz', 'sfsfsfdfsdfsdsfdfdfd@gmail.com', 'In Chelyabinsk, Russia learn how avoid medical and food law', 'In Chelyabinsk, Russia learn how avoid medical and food law. it\'s not vir. \r\n \r\n15 September 2025 Russia open border for Chinese citizen (visa-free). \r\n \r\nWelcome to Chelyabinsk for adult adoption.'),
(340, 'Eula Armbruster', 'armbruster.eula@googlemail.com', 'Instant Setup, Get Traffic & Growth — No Developers, No Investment', 'Hello,\r\n\r\nCheck out an exclusive resource related to your website afadbd.org: https://goldsolutions.pro/VibeCode?afadbd.org\r\n\r\nWhy is this useful?  \r\nWith Vibe Code Blueprint, you’re getting a ready-to-go system built to provide exposure and traction without delays — no developers, no upfront commitment, no waiting weeks.  \r\nGenerate engaging materials instantly — structures that used to cost a lot — and kick things off today.\r\n\r\nIn a noisy digital world, this system sets itself apart: from setup to results, it’s simple, accessible, and open to anyone.  \r\nThe window is here now — early starters take the lead.  \r\nReady to explore it? Click through and I’ll guide you inside.\r\n\r\nTake a look: https://goldsolutions.pro/VibeCode?afadbd.org\r\n\r\nYou are receiving this message because we think this might be relevant.  \r\nIf you prefer not to get further notes from us, use this link to leave the list:  \r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org  \r\nAddress: 209 West Street Comstock Park, MI 49321  \r\n\r\nSincerely,  \r\nEthan Parker'),
(341, 'Virginia Shropshire', 'virginia.shropshire65@googlemail.com', 'Pull in Google audience quickly — even without a own platform!', 'Good day,\r\n\r\nWe have a special proposal for your website afadbd.org.\r\n\r\nWhy you need this: to have every initiative, referral deal, or plan start bringing people and results today — without wasting a dime on ads or technical hassle. Ghost Pages turns you into a hidden machine that Google absolutely favors: you build hidden pages using a unique Google asset, and they silently start driving targeted visitors — while your competition is completely unaware.\r\n\r\nIt’s straightforward, it’s quick, it’s genius: no domains, hosting, social media, or technical skills required — if you can copy and paste, you can do this. Plus, it really works and expands: launch one Ghost Page and immediately — visitors arrives wherever you want: referral offers, stores, leads — you choose. Ready to start in minutes? Find out more and get outcomes that might blow your mind.\r\n\r\nHave a look here: https://smartexperts.pro/GhostPages?afadbd.org\r\n\r\nYou are receiving this update because we believe our solution may be valuable to you.  \r\nIf you do not wish to receive further updates from us, please click here to UNSUBSCRIBE:  \r\nhttps://smartexperts.pro/unsub?domain=afadbd.org  \r\nAddress: 1464 Lewis Street Roselle, IL 60177  \r\nLooking out for you, Michael Turner.'),
(342, 'Sam', 'hireonline556600@outlook.com', 'Data Entry Services', 'My name is Sam. I provide data entry services starting from $12 USD per hour. I can handle any computer-related task that is repetitive in nature, such as entering data into software, collecting data, bookkeeping, copy-paste work, uploading content to websites, and following your business processes. I can also transcribe handwritten or scanned documents, update and maintain customer databases, cleanse and validate data, enter survey results and feedback, manage and update inventories, process invoices and receipts, create and update spreadsheets, input product details into e-commerce platforms, digitize paper records, manage email lists and contact information, perform data mining and extraction from websites, compile and organize data from various sources. You can outsource your entire business process to me, where tasks can be done remotely using a computer. I can learn your process and work on any software accordingly. \r\n\r\nReach out to me at Hireonline556600@outlook.com if you have any requirements and we can take a quick call.'),
(343, 'Shayne Ripley', 'ripley.shayne92@gmail.com', 'Wanted to ask about your business', 'Here is my site: https://submissiontodirectory.top/'),
(344, 'Georgia Skene', 'georgia.skene10@gmail.com', 'Is this the best way to reach you?', 'Here is my site: https://submissiontodirectory.top/'),
(345, 'Tayla Langan', 'langan.tayla@gmail.com', 'As soon as your words start express themselves', 'Hi,\r\n\r\nWe have a special option for your website afadbd.org: https://goldsolutions.pro/VoiceBeastAI?afadbd.org\r\n\r\nHere’s the idea: a site owner turning any text into a realistic, emotion-rich voiceover in seconds—no mic, no studio, no hassle. VoiceBeast AI VIP gives you the power to create a voice that doesn’t just speak plainly—it delivers, drawing in your audience right in your browser. It’s not complicated tech—it’s a practical solution: more attention, better outcomes, fewer complications. Ready to make your words sound professional?\r\n\r\nCheck the example: https://goldsolutions.pro/VoiceBeastAI?afadbd.org\r\n\r\nYou are receiving this information because we believe our tool may be helpful to you.  \r\nIf you do not wish to receive further notes, please click here to unsubscribe:  \r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org  \r\n\r\nAddress: 209 West Street Comstock Park, MI 49321  \r\nAll the best,  \r\nEthan Parker'),
(346, 'SimonEtess', 'irinademenkova86@gmail.com', 'Hi, i writing about     price for reseller', 'হাই, আমি আপনার মূল্য জানতে চেয়েছিলাম.'),
(347, 'Christiane', 'info@afadbd.org', 'Association for Alternative Development', 'Hey there \r\n\r\nI wanted to reach out and let you know about our new dog harness. It\'s really easy to put on and take off - in just 2 seconds - and it\'s personalized for each dog. \r\nPlus, we offer a lifetime warranty so you can be sure your pet is always safe and stylish.\r\n\r\nWe\'ve had a lot of success with it so far and I think your dog would love it. \r\n\r\nGet yours today with 50% OFF: https://caredogbest.com\r\n\r\nFREE Shipping - TODAY ONLY! \r\n\r\nBest regards, \r\n\r\nChristiane'),
(348, 'Carol Martell', 'carol.martell@hotmail.com', 'instant-use', 'Hello,\r\n\r\nWe’ve prepared something new for your website afadbd.org : https://goldsolutions.pro/BlackBoxProfits?afadbd.org\r\n\r\nHere’s why it could help:  \r\nIf you’re working with websites, Black Box Profits is your simple way to real progress — no complex steps, no time-consuming tasks.  \r\nJust add a concept, and the system delivers a ready-to-sell micro-solution that works like a service and operates 24/7.\r\n\r\nChoose efficiency, not harder: forget long guides, recorded videos, or self-branding.  \r\nLaunch micro-programs, not PDFs, that bring sales — and all it takes is an idea and a short setup.  \r\nWant to learn more today?\r\n\r\nExperience it yourself: https://goldsolutions.pro/BlackBoxProfits?afadbd.org\r\n\r\nYou are receiving this message because it seemed like something connected to your work.  \r\nIf you don’t want further updates from us, please follow this link to leave the list:  \r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org  \r\n\r\nAddress: 209 West Street Comstock Park, MI 49321  \r\n\r\nSincerely,  \r\nEthan Parker'),
(349, 'Lowell Free', 'lowell.free@gmail.com', 'seeking information', 'Ever stop to think how much you\'re spending on marked-up CPMs for Connected TV ads?\r\nIf you\'re using “premium” audience segments without verifying who you\'re actually reaching, that money is likely feeding someone else\'s family.\r\nNo pressure. Here’s the site if you\'re open to see a revolutionary vision for digital advertising\r\ntopshelfaudience.com using real-time Intent data from an Integration in our platform to Lotame.com. You can reach me at marketing@mrmarketingres.com or 843-720-7301. And if this isn\'t a fit please feel free to email me and I\'ll be sure not to reach out again.  Thanks!'),
(350, 'Mike Martin Robertson', 'info@professionalseocleanup.com', 'Fix August Google Spam update ranking problems for free', 'Hi, \r\nWhile reviewing afadbd.org, we spotted toxic backlinks that could put your site at risk of a Google penalty. Especially that this Google SPAM update had a high impact in ranks. This is an easy and quick fix for you. Totally free of charge. No obligations. \r\n \r\nFix it now: \r\nhttps://www.professionalseocleanup.com/ \r\n \r\nNeed help or questions? Chat here: \r\nhttps://www.professionalseocleanup.com/whatsapp/ \r\n \r\nBest, \r\nMike Martin Robertson\r\n \r\n+1 (855) 221-7591 \r\ninfo@professionalseocleanup.com'),
(351, '* * * This wheel does not stop for anyone - except you: https://xlr8ar.com/index.php?uvdc01 * * * hs=d13784673f637677426b66b478044a25* ххх*', 'paouqua@mailbox.in.ua', 'l7i1av', 'gdvhrq'),
(352, '* * * <a href=\"https://xlr8ar.com/index.php?uvdc01\">Free money? Yeah, we said it</a> * * * hs=d13784673f637677426b66b478044a25* ххх*', 'paouqua@mailbox.in.ua', 'l7i1av', 'gdvhrq'),
(353, 'Marilynn Forlong', 'marilynn.forlong@outlook.com', 'Craft Unique Kids’ Animations Effortlessly — Without Prior Experience , One-Time Access', 'Hi,\r\n\r\nTake a look at a unique offer made for afadbd.org afadbd.org : https://goldsolutions.pro/KidsTaleAI?afadbd.org\r\n\r\nWhy consider this? this solution quickly converts any idea into colorful story clips for kids in just minutes — no design background, without costly apps, no monthly payments. Your stories feature storytelling audio, poetic style, audio tracks, written dialogue — type your story and share instantly.\r\n\r\nSee how rapidly you might expand into the kids’ content niche: upload to YouTube, TikTok, shorts platforms and see engagement flow. Or sell them on Fiverr, Etsy, or Gumroad at between $50 and $500. You get resale access, immediate login, and help whenever needed — for a one-time fair price. Looking to open new income channels?\r\n\r\nWatch how it works: https://goldsolutions.pro/KidsTaleAI?afadbd.org\r\n\r\nYou are receiving this info because we feel this might be of interest to you.  \r\nIf you do not want further details from us, visit this page to UNSUBSCRIBE:  \r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org  \r\n\r\nAddress: 209 West Street Comstock Park, MI 49321  \r\n\r\nBest regards,  \r\nEthan Parker'),
(354, 'Venus Hipkiss', 'venus.hipkiss@yahoo.com', 'Experience Success', 'Hello,\r\n\r\nWe have a personalized suggestion for your website afadbd.org : https://goldsolutions.pro/VibeCodeBlueprint?afadbd.org\r\n\r\nWhy should this matter to you? Because Vibe Code Blueprint is your new framework — launch high-value digital assets in moments, with no technical setup and zero budget, while visitors and revenue start coming in. Imagine being the strategist behind the curtain, benefiting on autopilot — while others are still working on funnels.\r\n\r\nThis isn’t just another platform — it’s a special edge, like early Bitcoin but for digital assets, and it’s happening now. Start early, take the lead before the crowd notices!\r\n\r\nDiscover more here: https://goldsolutions.pro/VibeCodeBlueprint?afadbd.org\r\n\r\nYou are receiving this message because we believe our proposal may be of interest to you.  \r\nIf you do not wish to receive further messages, please click here to UNSUBSCRIBE:  \r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org  \r\n\r\nAddress: 209 West Street Comstock Park, MI 49321  \r\nSincerely,  \r\nEthan Parker'),
(355, 'Roosevelt Shears', 'shears.roosevelt@googlemail.com', 'Create Video Scripts quickly: Done-for-you texts that bring response', 'Hi,\r\n\r\nWe prepared an exclusive opportunity connected with afadbd.org afadbd.org https://goldsolutions.pro/VideoScriptProGPT?afadbd.org \r\n\r\nIf you monetize sites looking for efficient tools?  \r\nPicture this: no wasted hours on writing engaging content — Video Script Pro GPT covers the task, optimized for you.  \r\nNo guessing words, just sharp, conversion-friendly scripts that speak to your audience — and increase your results with minimal input.\r\n\r\nReady to check how it helps you increase attention, save hours, and allow focus on your projects?\r\n\r\nCheck it out: https://goldsolutions.pro/VideoScriptProGPT?afadbd.org\r\n\r\nYou are receiving this information because it seems our solution may help in your case.  \r\nIf you do not wish to be sent future messages from us, please click here to UNSUBSCRIBE:  \r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\n\r\nAddress: 209 West Street Comstock Park, MI 49321  \r\nBest regards,  \r\nEthan Parker'),
(356, 'Vaibhav', 'webdesignservices111@outlook.com', 'Premium High Quality Website Design', 'Is your current website delivering the premium, modern feel your brand deserves—or are you considering a redesign? I offer high-quality builds starting from $2,000.\r\nCan we schedule a short meeting? Let me know a suitable day and time by emailing me at webdesignservices111@outlook.com'),
(357, 'LeeEtess', 'zekisuquc419@gmail.com', 'Hi    wrote about     price for reseller', 'Hi, ego volo scire vestri pretium.');
INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`) VALUES
(358, 'Russell Hanslow', 'russell.hanslow63@gmail.com', 'Expand Google discovery in no time — even if you don’t have a site', 'Greetings,\r\n\r\nHere’s a unique opportunity designed for your domain : https://smartexperts.pro/GhostPage?afadbd.org\r\n\r\nWhy consider it: you’ll start seeing steady flow of people and growth almost instantly — with zero budget on promotion or tech hassle. Ghost Pages makes you operate like a hidden engine that Google trusts: you set up quiet pages using a private Google method, and they quietly attract relevant audiences — as rivals stay behind.\r\n\r\nIt’s hassle-free, it’s clever: forget about domains, servers, and socials, no technical know-how needed — if you can click and copy, you’re set. Plus, it delivers and scales: create one and watch the flow come in to any link you choose — the destination is yours to pick. Get going instantly? Discover the method and see surprising results.\r\n\r\nWatch it in action: https://smartexperts.pro/GhostPage?afadbd.org\r\n\r\nYou are receiving this message because it might align with your current needs.  \r\nIf you do not wish to receive further notes, please click here to UNSUBSCRIBE:  \r\nhttps://smartexperts.pro/unsub?domain=afadbd.org  \r\nAddress: 1464 Lewis Street Roselle, IL 60177  \r\n\r\nBest regards,  \r\nMichael Turner.'),
(359, 'Tony', 'yourvirtualassistant23@outlook.com', 'Business Assistant Available @ $20/hr', 'I work as a business assistant and can help you with a variety of tasks including creating designs on Canva, writing content, managing emails, assisting in hiring, uploading website content, web research, bookkeeping, handling invoices, maintaining Google Sheets and Docs, following your SOPs, and working on your business software. I also handle data entry, create social media posts, and schedule them. My rate is $20/hr, and I can support you in managing day-to-day operations so you can focus more on growing your business. \r\n\r\nIf this is something you need, feel free to reach out at Yourvirtualassistant23@outlook.com'),
(360, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Aloha,   wrote about   the prices', 'Dia duit, theastaigh uaim do phraghas a fháil.'),
(361, 'Averynip', 'kpoe9798@gmail.com', 'Urgently withdraw your earned $3,758,645', 'You registered in our mining affiliate program on January 19, 2021. \r\nYou have accumulated $3,758,645 in your account, but for some reason you have not logged into your personal account since October 17, 2023. \r\nWe closed on August 22, 2025. \r\nIf you want to withdraw your $3,758,645, then pay the withdrawal fee before September 20, 2025, since now all payments to partners are made manually. \r\nYou can pay the commission here: bitcoin:bc1qa5r6cuvqde4kx5m4s3a5mh2j8arkpt0ve5lf69?amount=0.02371&message=Payment%20of%20the%20fee%20for%20the%20payment%20of%20%243%2C758%2C645%2C%20due%20September%2020%2C%202025&time=1757758069&exp=604800 \r\nIn other words, send a withdrawal fee of 0.02371 BTC to a bitcoin wallet: bc1qa5r6cuvqde4kx5m4s3a5mh2j8arkpt0ve5lf69 \r\nAfter payment, $3,758,645 will be credited to your account. \r\nIf you do not pay the commission by September 20, 2025, you will no longer be able to receive your $3,758,645'),
(362, 'Averynip', 'kpoe9798@gmail.com', 'Urgently withdraw your earned $3,758,645', 'You registered in our mining affiliate program on January 19, 2021. \r\nYou have accumulated $3,758,645 in your account, but for some reason you have not logged into your personal account since October 17, 2023. \r\nWe closed on August 22, 2025. \r\nIf you want to withdraw your $3,758,645, then pay the withdrawal fee before September 20, 2025, since now all payments to partners are made manually. \r\nYou can pay the commission here: bitcoin:bc1qa5r6cuvqde4kx5m4s3a5mh2j8arkpt0ve5lf69?amount=0.02371&message=Payment%20of%20the%20fee%20for%20the%20payment%20of%20%243%2C758%2C645%2C%20due%20September%2020%2C%202025&time=1757758069&exp=604800 \r\nIn other words, send a withdrawal fee of 0.02371 BTC to a bitcoin wallet: bc1qa5r6cuvqde4kx5m4s3a5mh2j8arkpt0ve5lf69 \r\nAfter payment, $3,758,645 will be credited to your account. \r\nIf you do not pay the commission by September 20, 2025, you will no longer be able to receive your $3,758,645'),
(363, 'Averynip', 'kpoe9798@gmail.com', 'Urgently withdraw your earned $3,758,645', 'You registered in our mining affiliate program on January 19, 2021. \r\nYou have accumulated $3,758,645 in your account, but for some reason you have not logged into your personal account since October 17, 2023. \r\nWe closed on August 22, 2025. \r\nIf you want to withdraw your $3,758,645, then pay the withdrawal fee before September 20, 2025, since now all payments to partners are made manually. \r\nYou can pay the commission here: bitcoin:bc1qa5r6cuvqde4kx5m4s3a5mh2j8arkpt0ve5lf69?amount=0.02371&message=Payment%20of%20the%20fee%20for%20the%20payment%20of%20%243%2C758%2C645%2C%20due%20September%2020%2C%202025&time=1757758069&exp=604800 \r\nIn other words, send a withdrawal fee of 0.02371 BTC to a bitcoin wallet: bc1qa5r6cuvqde4kx5m4s3a5mh2j8arkpt0ve5lf69 \r\nAfter payment, $3,758,645 will be credited to your account. \r\nIf you do not pay the commission by September 20, 2025, you will no longer be able to receive your $3,758,645'),
(364, 'Averynip', 'kpoe9798@gmail.com', 'Urgently withdraw your earned $3,758,645', 'You registered in our mining affiliate program on January 19, 2021. \r\nYou have accumulated $3,758,645 in your account, but for some reason you have not logged into your personal account since October 17, 2023. \r\nWe closed on August 22, 2025. \r\nIf you want to withdraw your $3,758,645, then pay the withdrawal fee before September 20, 2025, since now all payments to partners are made manually. \r\nYou can pay the commission here: bitcoin:bc1qa5r6cuvqde4kx5m4s3a5mh2j8arkpt0ve5lf69?amount=0.02371&message=Payment%20of%20the%20fee%20for%20the%20payment%20of%20%243%2C758%2C645%2C%20due%20September%2020%2C%202025&time=1757758069&exp=604800 \r\nIn other words, send a withdrawal fee of 0.02371 BTC to a bitcoin wallet: bc1qa5r6cuvqde4kx5m4s3a5mh2j8arkpt0ve5lf69 \r\nAfter payment, $3,758,645 will be credited to your account. \r\nIf you do not pay the commission by September 20, 2025, you will no longer be able to receive your $3,758,645'),
(365, 'Averynip', 'kpoe9798@gmail.com', 'Urgently withdraw your earned $3,758,645', 'You registered in our mining affiliate program on January 19, 2021. \r\nYou have accumulated $3,758,645 in your account, but for some reason you have not logged into your personal account since October 17, 2023. \r\nWe closed on August 22, 2025. \r\nIf you want to withdraw your $3,758,645, then pay the withdrawal fee before September 20, 2025, since now all payments to partners are made manually. \r\nYou can pay the commission here: bitcoin:bc1qa5r6cuvqde4kx5m4s3a5mh2j8arkpt0ve5lf69?amount=0.02371&message=Payment%20of%20the%20fee%20for%20the%20payment%20of%20%243%2C758%2C645%2C%20due%20September%2020%2C%202025&time=1757758069&exp=604800 \r\nIn other words, send a withdrawal fee of 0.02371 BTC to a bitcoin wallet: bc1qa5r6cuvqde4kx5m4s3a5mh2j8arkpt0ve5lf69 \r\nAfter payment, $3,758,645 will be credited to your account. \r\nIf you do not pay the commission by September 20, 2025, you will no longer be able to receive your $3,758,645'),
(366, 'Ana', 'webcontentwriting12@outlook.com', 'Blog Writer', 'Hi, I create SEO-ready blog posts that are engaging, well-structured, and ready to publish. For $70, you’ll get:\r\n800–1,000 words blog post\r\nIntegration of 2 client-provided keywords (naturally placed for SEO)\r\n1 stock/royalty-free image included with alt-text\r\nMeta title & meta description for better search ranking\r\n1 free revision\r\n\r\nThis way, you get a complete, plug-and-play article without extra work on your side.\r\n\r\nIf this sounds good, just share your topic and keywords on my email Webcontentwriting12@outlook.com, and I’ll get started.'),
(367, 'LeeEtess', 'zekisuquc419@gmail.com', 'Hello  i wrote about     prices', 'Hallo, ek wou jou prys ken.'),
(368, 'Mike Laurent Fischer', 'info@digital-x-press.com', 'Add AEO to your SEO strategies today !', 'Hi, \r\nI understand that some companies find it challenging recognizing that organic ranking growth is a gradual process and a well-planned regular commitment. \r\n \r\nSadly, very few marketers have the patience to observe the progressive yet significant results that can completely boost their digital visibility. \r\n \r\nWith regular search engine updates, a consistent, continuous SEO strategy including Answer Engine Optimization (AEO) is vital for getting a profitable outcome. \r\n \r\nIf you recognize this as the ideal strategy, work with us! \r\n \r\nExplore Our Monthly SEO Services https://www.digital-x-press.com/unbeatable-seo/ \r\n \r\nChat With Us on Instant Messaging https://www.digital-x-press.com/whatsapp-us/ \r\n \r\nWe offer remarkable outcomes for your resources, and you will appreciate choosing us as your growth partner. \r\n \r\nKind regards, \r\nDigital X SEO Experts \r\nPhone/WhatsApp: +1 (844) 754-1148'),
(369, 'Shiv', 'hireresource009@outlook.com', 'Remote Virtual Assistant', 'Hi, I hope you’re doing well. I’m Shiv from India, a dedicated Virtual Assistant with over 4 years of experience helping professionals and small businesses streamline their operations.\r\n\r\nHere’s how I can support you:\r\n> Email & Inbox Management: Organize, prioritize, and respond to messages.\r\n> Set meeting reminders, and handle rescheduling.\r\n> Data Entry & Reporting: Maintain spreadsheets, update CRMs, and generate custom reports.\r\n> Internet Research: Gather market insights, competitor analysis, and resource summaries.\r\n> Travel Planning: Book flights, hotels, and create detailed itineraries.\r\n> Social Media Support: Draft posts, schedule content, and assist with basic graphics.\r\n\r\nRate: $10 per hour\r\nAvailability: Monday–Friday, 9 AM–5 PM \r\n\r\nI pride myself on clear communication, a proactive attitude, and delivering reliable results on time.\r\n\r\nIf you’d like to discuss your specific needs or try a short pilot project, just reply me @ HireResource009@outlook.com\r\n\r\nThank you for considering my services. I look forward to helping you achieve your goals!'),
(370, 'Stevenges', 'cocokaster@gmail.com', 'The iPhone 16 Pro is calling will you answer', 'Perfect Gift? Win It and Give It Away! https://telegra.ph/Win-iPhones-Samsung-09-18-2572?7d8g7k2r6t5dhk2'),
(371, 'Stevenges', 'cocokaster@gmail.com', 'The iPhone 16 Pro is calling will you answer', 'Perfect Gift? Win It and Give It Away! https://telegra.ph/Win-iPhones-Samsung-09-18-2572?7d8g7k2r6t5dhk2'),
(372, 'Stevenges', 'cocokaster@gmail.com', 'The iPhone 16 Pro is calling will you answer', 'Perfect Gift? Win It and Give It Away! https://telegra.ph/Win-iPhones-Samsung-09-18-2572?7d8g7k2r6t5dhk2'),
(373, 'Stevenges', 'cocokaster@gmail.com', 'The iPhone 16 Pro is calling will you answer', 'Perfect Gift? Win It and Give It Away! https://telegra.ph/Win-iPhones-Samsung-09-18-2572?7d8g7k2r6t5dhk2'),
(374, 'Stevenges', 'cocokaster@gmail.com', 'The iPhone 16 Pro is calling will you answer', 'Perfect Gift? Win It and Give It Away! https://telegra.ph/Win-iPhones-Samsung-09-18-2572?7d8g7k2r6t5dhk2'),
(375, 'Deloras Halloran', 'bestcopying@tutamail.com', 'Are you still active with this site?', 'Copy profitable strategies in FX, Stock and Crypto for FREE.\r\n\r\nHigh consistent profit.\r\nProven track record.\r\nLimited offer.\r\n\r\nDetails:\r\nhttps://CityCorpCopy.com'),
(376, 'Eartha Bulcock', 'bestcopying@tutamail.com', 'Looking for the right contact', 'Copy profitable strategies in FX, Stock and Crypto for FREE.\r\n\r\nHigh consistent profit.\r\nProven track record.\r\nLimited offer.\r\n\r\nDetails:\r\nhttps://CityCorpCopy.com'),
(377, 'Luciana Bolivar', 'bolivar.luciana@gmail.com', 'All AI models, unified entry. All together — work quicker.', 'Hi,\r\n\r\nTake a look at a new tool for your website afadbd.org https://bravo-333.site/AIModelSuite?afadbd.org\r\n\r\nWhy you might care: lower costs and finish tasks faster.  \r\nAI ModelSuite brings DeepSeek, ChatGPT 4.0, Claude, Gemini, LLaMA, DALL·E, Midjourney, Stable Diffusion and others — no need for API keys, no recurring payments.  \r\nProduce content, generate images/videos, run comparisons and move between tools right away.\r\n\r\nYour advantage: faster rollouts, less routine, better returns.  \r\nOne-time only $17 (rather than $97 every month), 30-day refund option, extra launch perks included.  \r\nReady to manage every AI tool from one place?\r\n\r\nTake a closer look: https://bravo-333.site/AIModelSuite?afadbd.org\r\n\r\nYou are receiving this update because it might suit your needs.  \r\nIf you want to unsubscribe, please click here to UNSUBSCRIBE:  \r\nhttps://bravo-333.site/unsubscribe?domain=afadbd.org  \r\n\r\nAddress: 209 West Street Comstock Park, MI 49321  \r\n\r\nSincerely,  \r\nEthan Parker'),
(378, 'Davidcop', 'ryanconrad74@icloud.com', 'The S24 Ultra is the all-rounder champion for any winner.', 'WORLDWIDE SHIPPING FOR YOUR SAMSUNG GALAXY S24 ULTRA PRIZE. https://telegra.ph/Win-iPhones-Samsung-09-18-4090?7e5y7k5o4y8swe7 \r\nWIN AN IPHONE 16 PRO AND OPEN UP NEW POSSIBILITIES. https://telegra.ph/Win-iPhones-Samsung-09-18-2473?7e8n7j3p6y5rh5w \r\nCongratulations, you won an S24 Ultra! Confirm your address. https://telegra.ph/Win-iPhones-Samsung-09-18-3590?4s5m0d5t5r5flu6 \r\nTHE IPHONE 16 PRO IS A TECHNOLOGICAL TRIUMPH FOR YOU. https://telegra.ph/Win-iPhones-Samsung-09-18-1134?2x0g6k3e7z7z046 \r\nTHE GALAXY S24 ULTRA IS YOUR CREATIVE STUDIO, WON TODAY. https://telegra.ph/Win-iPhones-Samsung-09-18-2558?2s4h9l5y5u0rl5t'),
(379, 'Davidcop', 'ryanconrad74@icloud.com', 'The S24 Ultra is the all-rounder champion for any winner.', 'WORLDWIDE SHIPPING FOR YOUR SAMSUNG GALAXY S24 ULTRA PRIZE. https://telegra.ph/Win-iPhones-Samsung-09-18-4090?7e5y7k5o4y8swe7 \r\nWIN AN IPHONE 16 PRO AND OPEN UP NEW POSSIBILITIES. https://telegra.ph/Win-iPhones-Samsung-09-18-2473?7e8n7j3p6y5rh5w \r\nCongratulations, you won an S24 Ultra! Confirm your address. https://telegra.ph/Win-iPhones-Samsung-09-18-3590?4s5m0d5t5r5flu6 \r\nTHE IPHONE 16 PRO IS A TECHNOLOGICAL TRIUMPH FOR YOU. https://telegra.ph/Win-iPhones-Samsung-09-18-1134?2x0g6k3e7z7z046 \r\nTHE GALAXY S24 ULTRA IS YOUR CREATIVE STUDIO, WON TODAY. https://telegra.ph/Win-iPhones-Samsung-09-18-2558?2s4h9l5y5u0rl5t'),
(380, 'Davidcop', 'ryanconrad74@icloud.com', 'The S24 Ultra is the all-rounder champion for any winner.', 'WORLDWIDE SHIPPING FOR YOUR SAMSUNG GALAXY S24 ULTRA PRIZE. https://telegra.ph/Win-iPhones-Samsung-09-18-4090?7e5y7k5o4y8swe7 \r\nWIN AN IPHONE 16 PRO AND OPEN UP NEW POSSIBILITIES. https://telegra.ph/Win-iPhones-Samsung-09-18-2473?7e8n7j3p6y5rh5w \r\nCongratulations, you won an S24 Ultra! Confirm your address. https://telegra.ph/Win-iPhones-Samsung-09-18-3590?4s5m0d5t5r5flu6 \r\nTHE IPHONE 16 PRO IS A TECHNOLOGICAL TRIUMPH FOR YOU. https://telegra.ph/Win-iPhones-Samsung-09-18-1134?2x0g6k3e7z7z046 \r\nTHE GALAXY S24 ULTRA IS YOUR CREATIVE STUDIO, WON TODAY. https://telegra.ph/Win-iPhones-Samsung-09-18-2558?2s4h9l5y5u0rl5t'),
(381, 'Davidcop', 'ryanconrad74@icloud.com', 'The S24 Ultra is the all-rounder champion for any winner.', 'WORLDWIDE SHIPPING FOR YOUR SAMSUNG GALAXY S24 ULTRA PRIZE. https://telegra.ph/Win-iPhones-Samsung-09-18-4090?7e5y7k5o4y8swe7 \r\nWIN AN IPHONE 16 PRO AND OPEN UP NEW POSSIBILITIES. https://telegra.ph/Win-iPhones-Samsung-09-18-2473?7e8n7j3p6y5rh5w \r\nCongratulations, you won an S24 Ultra! Confirm your address. https://telegra.ph/Win-iPhones-Samsung-09-18-3590?4s5m0d5t5r5flu6 \r\nTHE IPHONE 16 PRO IS A TECHNOLOGICAL TRIUMPH FOR YOU. https://telegra.ph/Win-iPhones-Samsung-09-18-1134?2x0g6k3e7z7z046 \r\nTHE GALAXY S24 ULTRA IS YOUR CREATIVE STUDIO, WON TODAY. https://telegra.ph/Win-iPhones-Samsung-09-18-2558?2s4h9l5y5u0rl5t'),
(382, 'Davidcop', 'ryanconrad74@icloud.com', 'The S24 Ultra is the all-rounder champion for any winner.', 'WORLDWIDE SHIPPING FOR YOUR SAMSUNG GALAXY S24 ULTRA PRIZE. https://telegra.ph/Win-iPhones-Samsung-09-18-4090?7e5y7k5o4y8swe7 \r\nWIN AN IPHONE 16 PRO AND OPEN UP NEW POSSIBILITIES. https://telegra.ph/Win-iPhones-Samsung-09-18-2473?7e8n7j3p6y5rh5w \r\nCongratulations, you won an S24 Ultra! Confirm your address. https://telegra.ph/Win-iPhones-Samsung-09-18-3590?4s5m0d5t5r5flu6 \r\nTHE IPHONE 16 PRO IS A TECHNOLOGICAL TRIUMPH FOR YOU. https://telegra.ph/Win-iPhones-Samsung-09-18-1134?2x0g6k3e7z7z046 \r\nTHE GALAXY S24 ULTRA IS YOUR CREATIVE STUDIO, WON TODAY. https://telegra.ph/Win-iPhones-Samsung-09-18-2558?2s4h9l5y5u0rl5t'),
(383, 'Roxie Blaze', 'roxie.blaze@yahoo.com', 'Convert Favorite intelligent utilities To become Unified Hub', 'Hello,\r\n\r\nWe have a custom offer for your website afadbd.org https://www.novaai.expert/EveryAI?afadbd.org\r\n\r\nFrustrated by spending on multiple digital assistants?  \r\nWith EveryAI you unlock a unified panel that grants hundreds of advanced AI engines without ongoing costs.  \r\n\r\nCreate pages, craft copy, design emblems, generate cinematic videos, talking avatars… and keep 100% of your revenue under a commercial license.  \r\n\r\nReady to increase your income, reduce workload, and take charge of your results?  \r\nIt begins now.\r\n\r\nWatch how it works: https://www.novaai.expert/EveryAI?afadbd.org\r\n\r\nYou are receiving this message because we believe our proposal may be useful to you.  \r\n\r\nIf you do not wish to receive further messages from us, please click here to UNSUBSCRIBE:  \r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\n\r\nAddress: 209 West Street Comstock Park, MI 49321  \r\n\r\nKind wishes,  \r\nEthan Parker'),
(384, 'Kindra Clemes', 'clemes.kindra@googlemail.com', 'Launch cooking video collection without cooking — packaged for you', 'Greetings,\r\n\r\nSharing with you something valuable for your website afadbd.org https://topcasworld.pro/ChefMaster?afadbd.org\r\n\r\nThink of it like this: you’re getting more than 13,300+ chef-style videos & recipes, easily modified to use again with your branding, no work in the kitchen or studio, barely any setup needed.  \r\n\r\nChefMaster Live is a quick route to build: brand it, upload it, and move forward.  \r\n\r\nThinking about taking part in food-inspired digital content, get an audience, and publish your content in no time? All details here.\r\n\r\nWatch it here: https://topcasworld.pro/ChefMaster?afadbd.org\r\n\r\nThis was sent in case it adds value to you.  \r\nIf you want to opt out, just click here to UNSUBSCRIBE:  \r\nhttps://topcasworld.pro/unsubscribe?domain=afadbd.org  \r\n\r\nAddress: 209 West Street Comstock Park, MI 49321  \r\nAll the best,  \r\nEthan Parker'),
(385, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hallo, i writing about   the price', 'Ola, quería saber o seu prezo.'),
(386, 'Davidcop', 'troyleelinks@gmail.com', 'See if fortune favors you with an iPhone 16 Pro today.', 'The Galaxy S24 Ultra is photography, redefined by luck. https://telegra.ph/Win-iPhones-Samsung-09-18-423?1f0g7g5w3y6fqy0 \r\nThe S24 Ultra is the definition of a premium Android win. https://telegra.ph/Win-iPhones-Samsung-09-18-833?9q9n0d3o6v9m1m1 \r\nDELIVERY FOR YOUR WINNING GALAXY S24 ULTRA COSTS ABOUT TWO DOLLARS. https://telegra.ph/Win-iPhones-Samsung-09-18-1946?9a4b7g2t5q6g547 \r\nTHE GALAXY S24 ULTRA IS MORE SCREEN, MORE POWER, WON. https://telegra.ph/Win-iPhones-Samsung-09-18-2715?5w6p0f3o4m9fw5e \r\nThe Galaxy S24 Ultra is your perfect style statement. https://telegra.ph/Win-iPhones-Samsung-09-18-3968?4e2g7a3r5n9reqy'),
(387, 'Davidcop', 'troyleelinks@gmail.com', 'See if fortune favors you with an iPhone 16 Pro today.', 'The Galaxy S24 Ultra is photography, redefined by luck. https://telegra.ph/Win-iPhones-Samsung-09-18-423?1f0g7g5w3y6fqy0 \r\nThe S24 Ultra is the definition of a premium Android win. https://telegra.ph/Win-iPhones-Samsung-09-18-833?9q9n0d3o6v9m1m1 \r\nDELIVERY FOR YOUR WINNING GALAXY S24 ULTRA COSTS ABOUT TWO DOLLARS. https://telegra.ph/Win-iPhones-Samsung-09-18-1946?9a4b7g2t5q6g547 \r\nTHE GALAXY S24 ULTRA IS MORE SCREEN, MORE POWER, WON. https://telegra.ph/Win-iPhones-Samsung-09-18-2715?5w6p0f3o4m9fw5e \r\nThe Galaxy S24 Ultra is your perfect style statement. https://telegra.ph/Win-iPhones-Samsung-09-18-3968?4e2g7a3r5n9reqy'),
(388, 'Davidcop', 'troyleelinks@gmail.com', 'See if fortune favors you with an iPhone 16 Pro today.', 'The Galaxy S24 Ultra is photography, redefined by luck. https://telegra.ph/Win-iPhones-Samsung-09-18-423?1f0g7g5w3y6fqy0 \r\nThe S24 Ultra is the definition of a premium Android win. https://telegra.ph/Win-iPhones-Samsung-09-18-833?9q9n0d3o6v9m1m1 \r\nDELIVERY FOR YOUR WINNING GALAXY S24 ULTRA COSTS ABOUT TWO DOLLARS. https://telegra.ph/Win-iPhones-Samsung-09-18-1946?9a4b7g2t5q6g547 \r\nTHE GALAXY S24 ULTRA IS MORE SCREEN, MORE POWER, WON. https://telegra.ph/Win-iPhones-Samsung-09-18-2715?5w6p0f3o4m9fw5e \r\nThe Galaxy S24 Ultra is your perfect style statement. https://telegra.ph/Win-iPhones-Samsung-09-18-3968?4e2g7a3r5n9reqy'),
(389, 'Davidcop', 'troyleelinks@gmail.com', 'See if fortune favors you with an iPhone 16 Pro today.', 'The Galaxy S24 Ultra is photography, redefined by luck. https://telegra.ph/Win-iPhones-Samsung-09-18-423?1f0g7g5w3y6fqy0 \r\nThe S24 Ultra is the definition of a premium Android win. https://telegra.ph/Win-iPhones-Samsung-09-18-833?9q9n0d3o6v9m1m1 \r\nDELIVERY FOR YOUR WINNING GALAXY S24 ULTRA COSTS ABOUT TWO DOLLARS. https://telegra.ph/Win-iPhones-Samsung-09-18-1946?9a4b7g2t5q6g547 \r\nTHE GALAXY S24 ULTRA IS MORE SCREEN, MORE POWER, WON. https://telegra.ph/Win-iPhones-Samsung-09-18-2715?5w6p0f3o4m9fw5e \r\nThe Galaxy S24 Ultra is your perfect style statement. https://telegra.ph/Win-iPhones-Samsung-09-18-3968?4e2g7a3r5n9reqy'),
(390, 'Davidcop', 'troyleelinks@gmail.com', 'See if fortune favors you with an iPhone 16 Pro today.', 'The Galaxy S24 Ultra is photography, redefined by luck. https://telegra.ph/Win-iPhones-Samsung-09-18-423?1f0g7g5w3y6fqy0 \r\nThe S24 Ultra is the definition of a premium Android win. https://telegra.ph/Win-iPhones-Samsung-09-18-833?9q9n0d3o6v9m1m1 \r\nDELIVERY FOR YOUR WINNING GALAXY S24 ULTRA COSTS ABOUT TWO DOLLARS. https://telegra.ph/Win-iPhones-Samsung-09-18-1946?9a4b7g2t5q6g547 \r\nTHE GALAXY S24 ULTRA IS MORE SCREEN, MORE POWER, WON. https://telegra.ph/Win-iPhones-Samsung-09-18-2715?5w6p0f3o4m9fw5e \r\nThe Galaxy S24 Ultra is your perfect style statement. https://telegra.ph/Win-iPhones-Samsung-09-18-3968?4e2g7a3r5n9reqy'),
(391, 'LeeEtess', 'irinademenkova86@gmail.com', 'Hello  i am wrote about your   price', 'Hej, jeg ønskede at kende din pris.'),
(392, 'Emma Wilson', 'emma.wilson6162@gmail.com', 'Help with growing your audience', 'Hi,\r\n\r\nI came across afadbd.org and wanted to connect.\r\n\r\nMy team and I help websites like yours grow their online presence and reach new customers. We do this through targeted local SEO, social media promotion, and email marketing.\r\n\r\nWe also specialize in creating high-converting sales and landing pages.\r\n\r\nBased on what I\'ve seen, I have a few ideas that could help you attract more visitors and build your audience.\r\n\r\nWould it be okay if I sent over a quick summary of what those might be?\r\n\r\nBest,\r\nEmma'),
(393, 'Shasta', 'info@afadbd.org', 'Association for Alternative Development', 'Hey there \r\n\r\nLooking to improve your posture and live a healthier life? Our Medico Postura™ Body Posture Corrector is here to help!\r\n\r\nExperience instant posture improvement with Medico Postura™. This easy-to-use device can be worn anywhere, anytime – at home, work, or even while you sleep.\r\n\r\nMade from lightweight, breathable fabric, it ensures comfort all day long.\r\n\r\nGrab it today at a fantastic 60% OFF: https://medicopostura.com\r\n\r\nPlus, enjoy FREE shipping for today only!\r\n\r\nDon\'t miss out on this amazing deal. Get yours now and start transforming your posture!\r\n\r\nSincerely, \r\n\r\nShasta'),
(394, 'Rosaura Gillis', 'colten.blair.1970+afadbd.org@gmail.com', 'Looking forward in working together with afadbd.org', 'Greetings,\r\n\r\nWe reviewed your website afadbd.org and found it to be a valuable and well-structured resource.\r\n\r\nWe are curious about your site reach, specifically if the site receives more than 1,000+ people per day.\r\n\r\nIf afadbd.org meets these criteria, we would be open to discuss the possibility of cooperation, be it through ownership transfer or audience engagement.\r\n\r\nPlease drop us a line at ryland.rivas.1973+afadbd.org@gmail.com so we can explore the details further. We look forward to your reply.\r\n\r\nBest regards,  \r\nRosaura Gillis'),
(395, 'Cory Rosenthal', 'cory.rosenthal@gmail.com', 'Discover the way this smart AI assistant converts ChatGPT, Gemini & Grok into a visitor-growth engine for your campaigns', 'This lightweight product uses ChatGPT, Gemini & Grok to aid in producing more visitors... A automated software supports automating visitor reach internally... Bundled in a collection of well-known AI tools...\r\n\r\n\r\nhttps://loading-please-wait.online/AutoLeadMachine?domain=afadbd.org'),
(396, 'Albert Fitzwater', 'fitzwater.albert@yahoo.com', '?', 'What if just 15 minutes on the phone could unlock 20% to 50% savings on your group health plan?\r\nSchedule a quick call now to explore potential savings --> https://tinyurl.com/shedulecallnow'),
(397, 'LeeEtess', 'zekisuquc419@gmail.com', 'Hi, i wrote about   the prices', 'Kaixo, zure prezioa jakin nahi nuen.'),
(398, 'Shani Maxwell', 'maxwell.shani@gmail.com', 'Turn Select smart platforms Into a Integrated Solution', 'Hi,\r\n\r\nWe have a custom offer for your website afadbd.org : https://www.youtube.com/watch?v=GY1x2NWs9EA?afadbd.org\r\n\r\nTired of spending on multiple intelligent platforms?  \r\nWith EveryAI you unlock a unified panel that grants many professional AI solutions without monthly fees.  \r\n\r\nCreate pages, craft copy, create branding, generate cinematic videos, talking avatars… and keep 100% of your income under a professional license.  \r\n\r\nWant to make more, work less, and finally control your income?  \r\nIt begins with this.\r\n\r\nSee for yourself: https://www.youtube.com/watch?v=GY1x2NWs9EA?afadbd.org'),
(399, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hallo    wrote about   the price', 'Здравейте, исках да знам цената ви.'),
(400, 'Davidcop', 'zoskejoerg@web.de', 'Oftmals werden Kinder auf dieser Website mit Sex versorgt', 'AUF DIESER WEBSITE GIBT ES IMMER WIEDER SEX MIT ANDEREN FRAUEN https://www.czin.eu/r/?u=https%3A%2F%2Ftelegra.ph%2FOnline-Dating-f%25C3%25BCr-Sex-09-23%3F8628'),
(401, 'Davidcop', 'zoskejoerg@web.de', 'Oftmals werden Kinder auf dieser Website mit Sex versorgt', 'AUF DIESER WEBSITE GIBT ES IMMER WIEDER SEX MIT ANDEREN FRAUEN https://www.czin.eu/r/?u=https%3A%2F%2Ftelegra.ph%2FOnline-Dating-f%25C3%25BCr-Sex-09-23%3F8628'),
(402, 'Davidcop', 'zoskejoerg@web.de', 'Oftmals werden Kinder auf dieser Website mit Sex versorgt', 'AUF DIESER WEBSITE GIBT ES IMMER WIEDER SEX MIT ANDEREN FRAUEN https://www.czin.eu/r/?u=https%3A%2F%2Ftelegra.ph%2FOnline-Dating-f%25C3%25BCr-Sex-09-23%3F8628'),
(403, 'Davidcop', 'zoskejoerg@web.de', 'Oftmals werden Kinder auf dieser Website mit Sex versorgt', 'AUF DIESER WEBSITE GIBT ES IMMER WIEDER SEX MIT ANDEREN FRAUEN https://www.czin.eu/r/?u=https%3A%2F%2Ftelegra.ph%2FOnline-Dating-f%25C3%25BCr-Sex-09-23%3F8628'),
(404, 'Davidcop', 'zoskejoerg@web.de', 'Oftmals werden Kinder auf dieser Website mit Sex versorgt', 'AUF DIESER WEBSITE GIBT ES IMMER WIEDER SEX MIT ANDEREN FRAUEN https://www.czin.eu/r/?u=https%3A%2F%2Ftelegra.ph%2FOnline-Dating-f%25C3%25BCr-Sex-09-23%3F8628'),
(405, 'Benedict Dowling', 'colten.blair.1970+afadbd.org@gmail.com', 'Considering towards joint work with afadbd.org', 'Hello,\r\n\r\nWe reviewed your website afadbd.org and see it as a helpful and professionally arranged site.\r\n\r\nWe are particularly interested in your site reach, specifically if the site receives more than one thousand users each day.\r\n\r\nIf afadbd.org fits within this range, we would be open to discuss the possibility of cooperation, whether through potential takeover or visitor access.\r\n\r\nPlease feel free to contact us at ryland.rivas.1973+afadbd.org@gmail.com so we can go over everything in detail. Expecting your message back.\r\n\r\nWarm wishes,  \r\nBenedict Dowling'),
(406, 'Bettie de Castella', 'bettie.decastella@googlemail.com', 'Allows You To Shine On The Rankings', 'A Innovative AI Tool Driven By ChatGPT-5…That Crafts And Boosts Any Content…On The First Page Of Google…With No Technical Work… And Zero Extra Costs… Allowing Us To Achieve ~$685.34 Per Day… On Full Automation.\r\n\r\nhttps://europa-168.site/APEXAI'),
(407, 'Taren Barclay', 'taren.barclay@hotmail.com', 'Create a complete text quickly — no text work!', 'Hello,\r\n\r\nYou’ll find here an exclusive invitation regarding your online platform afadbd.org https://viewbet-24.site/eBookWriterAI?afadbd.org\r\n\r\nThink about it: you are looking for an info product — but preparing it alone is tedious. With ebookwriter.ai you instantly have a professional eBook (cover, images, TOC), loaded with subject-oriented text — all within no time.  \r\nThe reason it fits you: to gain leads faster, place it on your sales channels, and look professional without hiring a writer.\r\n\r\nLooking to add partnerships, customize appearance with your look, or make something ready for public use — with almost no manual work? Ebookwriter.ai lets you adjust the visuals, while automating the heavy lifting.  \r\nTry it here: https://viewbet-24.site/eBookWriterAI?afadbd.org\r\n\r\nYou see this message because we assume it fits your field.  \r\nIf you wish to exit the list, please use this path to UNSUBSCRIBE:  \r\nhttps://viewbet-24.site/unsubscribe?domain=afadbd.org  \r\nAddress: 209 West Street Comstock Park, MI 49321  \r\nAll the best, Ethan Parker'),
(408, 'Mike Harrv Robertson', 'mike@monkeydigital.co', 'Collaboration Request', 'Hi, \r\n \r\nThis is Mike from Monkey Digital, \r\nI am reaching out about a exciting collaboration. \r\n \r\nHow would you like to place our banners on your site and connect via your personalized referral link towards high-demand products from our business? \r\n \r\nThis way, you make a solid 35% profit share, every month from any transactions that come in from your website. \r\n \r\nThink about it, most website owners benefit from SEO, so this is a big opportunity. \r\n \r\nWe already have 12k+ affiliates and our payouts are processed monthly. \r\nRecently, we reached $27280 in commissions to our partners. \r\n \r\nIf interested, kindly chat with us here: \r\nhttps://monkeydigital.co/affiliates-whatsapp/ \r\n \r\nOr register today: \r\nhttps://www.monkeydigital.co/join-our-affiliate-program/ \r\n \r\nCheers, \r\nMike Harrv Robertson\r\n \r\nPhone/whatsapp: +1 (775) 314-7914'),
(409, 'Rickie Le Grand', 'rickie.legrand@yahoo.com', 'i need to ask you something', 'Ever stop to think how much you\'re spending on marked-up CPMs for Connected TV ads?\r\nIf you\'re using “premium” audience segments without verifying who you\'re actually reaching, that money is likely feeding someone else\'s family.\r\nNo pressure. Here’s the site if you\'re open to see a revolutionary vision for digital advertising\r\ntopshelfaudience.com using real-time Intent data from an Integration in our platform to Lotame.com. You can reach me at marketing@mrmarketingres.com or 843-720-7301. And if this isn\'t a fit please feel free to email me and I\'ll be sure not to reach out again.  Thanks!'),
(410, 'Odette Carlino', 'odette.carlino@yahoo.com', 'Delivering', 'A little-known process which sets up backstage content pages the search engines tend to reward… and sends organic traffic to your site\r\n\r\nhttp://europa-168.site/GhostPages?domain=afadbd.org'),
(411, 'Rueben Bolling', 'kane.meza.1959+afadbd.org@gmail.com', 'The way that appears right on time', 'So sooner or later, you just need to take action — and see the bigger picture. That moment is here.\r\n\r\nhttps://wewantbet.site/GoTo?afadbd.org\r\n\r\nUNSUBSCRIBE: https://wewantbet.site/unsubscribe?afadbd.org'),
(412, 'Davidcop', 'cindyfuesler1971@gmail.com', 'VERY SEXY GIRLS MEET FOR SEX ONLY HERE', 'Depraved girls are looking for sex for one time only here http://inforgid.ru/redirect.php?link=https%3A%2F%2Ftelegra.ph%2FOnline-dating-for-sex-09-24%3F0709'),
(413, 'Davidcop', 'cindyfuesler1971@gmail.com', 'VERY SEXY GIRLS MEET FOR SEX ONLY HERE', 'Depraved girls are looking for sex for one time only here http://inforgid.ru/redirect.php?link=https%3A%2F%2Ftelegra.ph%2FOnline-dating-for-sex-09-24%3F0709'),
(414, 'Davidcop', 'cindyfuesler1971@gmail.com', 'VERY SEXY GIRLS MEET FOR SEX ONLY HERE', 'Depraved girls are looking for sex for one time only here http://inforgid.ru/redirect.php?link=https%3A%2F%2Ftelegra.ph%2FOnline-dating-for-sex-09-24%3F0709'),
(415, 'Davidcop', 'cindyfuesler1971@gmail.com', 'VERY SEXY GIRLS MEET FOR SEX ONLY HERE', 'Depraved girls are looking for sex for one time only here http://inforgid.ru/redirect.php?link=https%3A%2F%2Ftelegra.ph%2FOnline-dating-for-sex-09-24%3F0709'),
(416, 'Davidcop', 'cindyfuesler1971@gmail.com', 'VERY SEXY GIRLS MEET FOR SEX ONLY HERE', 'Depraved girls are looking for sex for one time only here http://inforgid.ru/redirect.php?link=https%3A%2F%2Ftelegra.ph%2FOnline-dating-for-sex-09-24%3F0709'),
(417, 'Toni Rutt', 'toni.rutt@googlemail.com', 'Is this the best way to reach you?', 'Here is my site: https://submissiontodirectory.top/'),
(418, 'Emma Wilson', 'emma.wilson1768@gmail.com', 'A thought on afadbd.org', 'Hi,\r\n\r\nI came across afadbd.org and wanted to connect.\r\n\r\nMy team specializes in helping websites expand their reach and get their content in front of the right people. We\'ve developed a process that can significantly boost online visibility, whether you\'re focused on building a strong local presence or reaching a global audience.\r\n\r\nI have some initial thoughts that could help you attract more visitors and build your audience.\r\n\r\nWould you be open to me sending over a quick summary of what those might be?\r\n\r\nThanks for your time,\r\nEmma'),
(419, 'Erna Gerard', 'joel.fox.1965+afadbd.org@gmail.com', '$300, $422, $498, and even $1200 INSTANT payments available. Watch...', 'Tired of the Grind? Let My Dual-Engine Profit Machine Do 95% of the Work for You, While You Live the Life You Were Always Meant to Live!\r\n\r\nhttps://europa-168.site/PASSIVECLASS'),
(420, 'Kathleen Whitehead', 'kwhitehead753@gmail.com', 'Text correction needed?', 'Hello,\r\n\r\n\"been\" caught my eye as potentially misspelled. spellhelper.com often helps me verify quickly.\r\n\r\nBest regards,\r\nKathleen'),
(421, 'Maira Erskine', 'mohamed.cortes.1977+afadbd.org@gmail.com', 'All-in-One Hub to power all AI models — including ChatGPT AI to Gemini, Anthropic Claude, Grok plus others.', 'AI Hub – the all-in-one panel that unlocks entry to every leading AI model — from first to latest — inside one clean panel.\r\n\r\n    ChatGPT (3.5 → 4.5 → 4o → 5 → Turbo → Nano|3.5 to 5 and beyond, including Turbo & Nano|all releases, from 3.5 to 5 with Turbo & Nano)  \r\n    Gemini (1.5 Pro → 2.0 Flash|all Pro & Flash editions|from 1.5 Pro to 2.0 Flash)  \r\n    Claude (3 Opus → Sonnet → Haiku|Opus, Sonnet & Haiku|from Opus to Haiku)  \r\n    Grok (1 through 4|all versions, 1–4|generations 1 to 4)  \r\n    DALL·E, Veo, Kling, ElevenLabs, DeepSeek, FLUX, LLaMA & more\r\n\r\nAnd yes — you get all next releases integrated seamlessly.\r\n\r\n\r\nhttps://fingerprint01.online/MultiverseAI?afadbd.org'),
(422, 'Margaret Julia', 'royalredover@outlook.com', 'ChatGPT, Gemini, Stable Diffusion & More… Without Monthly Fees', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWhat if you could use the best AI models in the world without limits or extra costs? Now you can. With our brand-new AI-powered app, you\'ll have ChatGPT, Gemini Pro, Stable Diffusion, Cohere AI, Leonardo AI Pro, and more — all under one roof. No monthly subscriptions, no API key expenses, no experience required, just one dashboard, one payment, and endless possibilities.\r\n\r\nSee it in action: https://aistore.vinhgrowth.com\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE: https://vinhgrowth.com/unsubscribe?domain=afadbd.org\r\nAddress: 60 Crown Street, London\r\nLooking out for you, Margaret Julia'),
(423, 'SimonEtess', 'irinademenkova86@gmail.com', 'Hallo  i wrote about your   prices', 'Salam, qiymətinizi bilmək istədim.'),
(424, 'Davidcop', 'jaywillis1027@gmail.com', 'Attractive girls are looking for sex for one time only here', 'DEPRAVED WOMEN ARE LOOKING FOR SEX FOR ONE TIME ONLY ON THIS DATING SITE http://imdeity.com/proxy.php?link=https%3A%2F%2Ftelegra.ph%2FOnline-dating-for-sex-09-24%3F1838'),
(425, 'Davidcop', 'jaywillis1027@gmail.com', 'Attractive girls are looking for sex for one time only here', 'DEPRAVED WOMEN ARE LOOKING FOR SEX FOR ONE TIME ONLY ON THIS DATING SITE http://imdeity.com/proxy.php?link=https%3A%2F%2Ftelegra.ph%2FOnline-dating-for-sex-09-24%3F1838'),
(426, 'Davidcop', 'jaywillis1027@gmail.com', 'Attractive girls are looking for sex for one time only here', 'DEPRAVED WOMEN ARE LOOKING FOR SEX FOR ONE TIME ONLY ON THIS DATING SITE http://imdeity.com/proxy.php?link=https%3A%2F%2Ftelegra.ph%2FOnline-dating-for-sex-09-24%3F1838'),
(427, 'Davidcop', 'jaywillis1027@gmail.com', 'Attractive girls are looking for sex for one time only here', 'DEPRAVED WOMEN ARE LOOKING FOR SEX FOR ONE TIME ONLY ON THIS DATING SITE http://imdeity.com/proxy.php?link=https%3A%2F%2Ftelegra.ph%2FOnline-dating-for-sex-09-24%3F1838'),
(428, 'Davidcop', 'jaywillis1027@gmail.com', 'Attractive girls are looking for sex for one time only here', 'DEPRAVED WOMEN ARE LOOKING FOR SEX FOR ONE TIME ONLY ON THIS DATING SITE http://imdeity.com/proxy.php?link=https%3A%2F%2Ftelegra.ph%2FOnline-dating-for-sex-09-24%3F1838'),
(429, 'Doug Robeson', 'colten.blair.1970+afadbd.org@gmail.com', 'Purchase of website afadbd.org', 'Hello, I’m interested in whether you are considering selling your website  afadbd.org. Could you please provide the asking price, average monthly traffic? I’m open to discussing further. You can reach me at ryland.rivas.1973@gmail.com for a quick conversation.'),
(430, 'Mike Noah Goossens', 'mike@monkeydigital.co', 'Increase Your Website Traffic with Targeted Social Ads – Only $10 for 10K Visits!', 'Dear Webmaster, \r\n \r\nI wanted to connect with something that could seriously boost your website’s visitor count. We work with a trusted ad network that allows us to deliver genuine, country-targeted social ads traffic for just $10 per 10,000 visits. \r\n \r\nThis isn\'t bot traffic—it’s real visitors, tailored to your preferred location and niche. \r\n \r\nWhat you get: \r\n \r\n10,000+ high-quality visitors for just $10 \r\nLocalized traffic for your chosen location \r\nScalability available based on your needs \r\nProven to work—we even use this for our SEO clients! \r\n \r\nReady to scale? Check out the details here: \r\nhttps://www.monkeydigital.co/product/country-targeted-traffic/ \r\n \r\nOr ask any questions on WhatsApp: \r\nhttps://monkeydigital.co/whatsapp-us/ \r\n \r\nLet\'s get started today! \r\n \r\nBest, \r\nMike Noah Goossens\r\n \r\nPhone/whatsapp: +1 (775) 314-7914'),
(431, 'Mike Frederic Willems', 'info@strictlydigital.net', 'Semrush links for afadbd.org', 'Hi there, \r\n \r\nGetting some bunch of links pointing to afadbd.org could have no value or worse for your website. \r\n \r\nIt really makes no difference the number of inbound links you have, what is crucial is the total of ranking terms those domains appear in search for. \r\n \r\nThat is the critical thing. \r\nNot the fake Domain Authority or Domain Rating. \r\nThat anyone can do these days. \r\nBUT the amount of high-traffic search terms the websites that point to your site rank for. \r\nThat’s what really matters. \r\n \r\nGet these quality links redirect to your site and your site will see real growth! \r\n \r\nWe are introducing this exclusive SEO package here: \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nNeed more details, or want clarification, reach out here: \r\nhttps://www.strictlydigital.net/whatsapp-us/ \r\n \r\nBest regards, \r\nMike Frederic Willems\r\n \r\nstrictlydigital.net \r\nPhone/WhatsApp: +1 (877) 566-3738'),
(432, 'Davidcop', 'thomasho_1@yahoo.com', 'Attractive women meet for sex only here', 'Very sexy women looking for quick sex only on this dating site http://wallpaper-vmf.dirx.ru/click.php?url=telegra.ph%2FOnline-dating-for-sex-09-24%3F1916'),
(433, 'Davidcop', 'thomasho_1@yahoo.com', 'Attractive women meet for sex only here', 'Very sexy women looking for quick sex only on this dating site http://wallpaper-vmf.dirx.ru/click.php?url=telegra.ph%2FOnline-dating-for-sex-09-24%3F1916'),
(434, 'Davidcop', 'thomasho_1@yahoo.com', 'Attractive women meet for sex only here', 'Very sexy women looking for quick sex only on this dating site http://wallpaper-vmf.dirx.ru/click.php?url=telegra.ph%2FOnline-dating-for-sex-09-24%3F1916'),
(435, 'Davidcop', 'thomasho_1@yahoo.com', 'Attractive women meet for sex only here', 'Very sexy women looking for quick sex only on this dating site http://wallpaper-vmf.dirx.ru/click.php?url=telegra.ph%2FOnline-dating-for-sex-09-24%3F1916'),
(436, 'Davidcop', 'thomasho_1@yahoo.com', 'Attractive women meet for sex only here', 'Very sexy women looking for quick sex only on this dating site http://wallpaper-vmf.dirx.ru/click.php?url=telegra.ph%2FOnline-dating-for-sex-09-24%3F1916'),
(437, 'Ludie Bicheno', 'bicheno.ludie@hotmail.com', 'To the afadbd.org Admin.', 'This Week Only: $99 for 2 Million Website Form Entries. This message reached you. Let yours do the same. Let’s launch—email me at: phil.outreach@form-blast-promo.top'),
(438, 'Garth Daniels', 'agentofficial@shrooqconsultant.com', 'Fast approval, flexible terms. Secure your Project loan with us.', 'Greetings, \r\n \r\nUnlock a new phase of growth with Shrooq Loan dept funding opportunities, as we ensure you have a reliable business partner to secure your funding. Do you have project that is in need of financial growth, such as Working Capital or Start ups. \r\n \r\nHere is your opportunity to secure your Seed Capital, Early-Stage, Renewable Energy Project, Commercial Real Estate, Telecommunication, Infrastructure, Agriculture, Animal Breeding, Healthcare, and Oil/Gas/Refinery. Competitive interest rates, Easy and fast reliable application process. \r\n \r\nYour quick response, will enable further communication to commence. \r\n \r\nRegards \r\n \r\nGarth Daniels \r\n \r\nInvestment Representative \r\nShrooq AlQamar Project Management Services Co LLC \r\nWhatsApp - +97333872035 \r\nEmail: agent@shrooqconsultant.com \r\nOur Offices: UAE Facilitating Office: Ahmad Al Jaber St \r\nOman Branch Offices: CHXM+J3G, Sohar, Oman \r\nUAE Dubai: Financial Consortium'),
(439, 'Sam', 'your.assistant23@outlook.com', 'Personal assistant @ $10/hr', 'Hi, Are you looking for a personal assistant who can handle your daily business operations and make your life easier?\r\n\r\nI can help with tasks related to:\r\n>  Admin\r\n>  Marketing\r\n>  Gathering data from multiple websites\r\n>  Answering emails\r\n>  Website management\r\n>  Social media\r\n>  Content writing\r\n>  Planning new projects\r\n>  Bookkeeping\r\n>  Entering data into softwares\r\n>  Back-office assistance\r\n>  Data Entry Operator\r\n>  My costing starts from $10/hr, depending on the type of project and its complexity.\r\n\r\nIf you are interested, kindly revert me on Your.assistant23@outlook.com with list of tasks you want to accomplish, and we can discuss our collaboration over a video call as per your convenience.'),
(440, 'Davidcop', 'zaydenjade77@gmail.com', 'SEXY GIRLS ARE LOOKING FOR ONE-TIME SEX ONLY ON THIS DATING SITE', 'Very depraved girls are looking for sex for one time only on this dating site http://drknow.ru/url.php?url=telegra.ph%2FOnline-dating-for-sex-09-24%3F6842'),
(441, 'Davidcop', 'zaydenjade77@gmail.com', 'SEXY GIRLS ARE LOOKING FOR ONE-TIME SEX ONLY ON THIS DATING SITE', 'Very depraved girls are looking for sex for one time only on this dating site http://drknow.ru/url.php?url=telegra.ph%2FOnline-dating-for-sex-09-24%3F6842'),
(442, 'Davidcop', 'zaydenjade77@gmail.com', 'SEXY GIRLS ARE LOOKING FOR ONE-TIME SEX ONLY ON THIS DATING SITE', 'Very depraved girls are looking for sex for one time only on this dating site http://drknow.ru/url.php?url=telegra.ph%2FOnline-dating-for-sex-09-24%3F6842'),
(443, 'Davidcop', 'zaydenjade77@gmail.com', 'SEXY GIRLS ARE LOOKING FOR ONE-TIME SEX ONLY ON THIS DATING SITE', 'Very depraved girls are looking for sex for one time only on this dating site http://drknow.ru/url.php?url=telegra.ph%2FOnline-dating-for-sex-09-24%3F6842'),
(444, 'Davidcop', 'zaydenjade77@gmail.com', 'SEXY GIRLS ARE LOOKING FOR ONE-TIME SEX ONLY ON THIS DATING SITE', 'Very depraved girls are looking for sex for one time only on this dating site http://drknow.ru/url.php?url=telegra.ph%2FOnline-dating-for-sex-09-24%3F6842'),
(445, 'Tony', 'fastprocess006@outlook.com', '15+ Years of Bookkeeping Experience – Available at $25/hr', 'Hi, Are you looking for Bookkeeping Services at just $25/hr? \r\n\r\nI understand how important accurate income/expense categorization, bank reconciliation, client billing, and clean reports are for smooth financial management. If your CPA is spending time untangling your books, you may already be paying far more than necessary.\r\n\r\nWith 15+ years of experience in QuickBooks, Xero, Zoho Books, and more, I provide organized, reconciled, and accountant-ready books. \r\n\r\nCan we have a quick call for the same? Kindly reply me on Fastprocess006@outlook.com'),
(446, 'LeeEtess', 'zekisuquc419@gmail.com', 'Aloha,   writing about   the price for reseller', 'হাই, আমি আপনার মূল্য জানতে চেয়েছিলাম.'),
(447, 'Nola Brody', 'nola.brody41@gmail.com', 'Professional SEO Services to Skyrocket Your SEO Backlinks', 'Greetings from SeoBests,\r\n\r\nUpgrade your website’s SEO standings, improve your search appearance and grow powerful backlinks!\r\nAccess the most effective SEO services all on one platform - SeoBests.com\r\n\r\nExplore current SEO promotions:\r\n50% DISCOUNT Monthly SEO Packages + Take 5,000 Backlinks FOR FREE:\r\n\r\nhttps://tiny.cc/SeoBests-Coupons\r\n\r\nBrowse through various SEO services, 100+ offers online, and professional specialists.\r\nSeoBests.com - your trusted SEO services store.'),
(448, 'Neil', 'bposervices1@outlook.com', 'Reliable Back-Office Support for Your Business', 'Hello, Are back-office tasks slowing down your core business activities? I can help by managing:\r\n\r\n>  Data entry and database updates\r\n>  Order processing and invoice preparation\r\n>  Bookkeeping and financial entries\r\n>  Document management and record-keeping\r\n>  Payroll and timesheet processing\r\n>  Vendor and client communication follow-ups\r\n>  CRM management and lead data organization\r\n>  Preparing reports and spreadsheets\r\n>  Email handling and scheduling support\r\n>  Online research and data collection\r\n\r\nWith more than a decade of experience supporting businesses across industries, I ensure accuracy, confidentiality, and efficiency in every task. My pricing starts from $10/hr, depending on the project scope.\r\n\r\nIf you’d like to discuss your specific requirements, please email me at bposervices1@outlook.com. We can schedule a quick video call at your convenience to explore how I can support your operations.'),
(449, 'Bette Kethel', 'bette.kethel51@gmail.com', 'have a query', 'Is anyone human reading my message? Ah there you are! I\'m offering a cheap and quick way for you to reach millions of website owners just like my message reached you now. It\'s simple, you give me your ad text and I blast it with my special AI enabled software to either millions of random sites or targets that you select. Check out my site below for details or to have a live chat with me now. \r\n\r\nGo ahead and reach out now! I mean you already know this works since you\'ve read my message this far right?\r\n\r\nThanks!\r\nPhil\r\nwebsite: contactformpromotion.com'),
(450, 'Jerri Havens', 'havens.jerri@gmail.com', 'need assistance', 'Ever stop to think how much you\'re spending on marked-up CPMs for Connected TV ads?\r\nIf you\'re using “premium” audience segments without verifying who you\'re actually reaching, that money is likely feeding someone else\'s family.\r\nNo pressure. Here’s the site if you\'re open to see a revolutionary vision for digital advertising\r\ntopshelfaudience.com using real-time Intent data from an Integration in our platform to Lotame.com. You can reach me at marketing@mrmarketingres.com or 843-720-7301. And if this isn\'t a fit please feel free to email me and I\'ll be sure not to reach out again.  Thanks!');
INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`) VALUES
(451, 'CharlesSuesk', 'sdasddsdsdsdsds@gmail.com', 'Get free Blockchain Insurance globally', 'Get free Blockchain Insurance globally! \r\n \r\nGet professional insurance of global importance from an insurer in Chelyabinsk, Russia. \r\n \r\nWithout personal data, cookie and JS. \r\n \r\nWe got access to the US market without compromising. \r\n \r\nMore than 85 types of non-criminal insurance. \r\n \r\nOnce a month, a document is created that can be shown to the regulatory authorities. We\'re taking over the negotiations. \r\n \r\nWe insure risks such as: \r\n1. Arbitrary legislation \r\n2. Arbitrariness of the Central Bank \r\n3. Possible harm to other people \r\n \r\nLink (own hosting): http://78.29.53.57/freeinsurance/?s1=xrum \r\n \r\n<a href=\"http://78.29.53.57/freeinsurance/?s1=xrum\">http://78.29.53.57/freeinsurance/?s1=xrum</a> \r\n \r\nBy brand ChelyabinskMAN'),
(452, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hi, i am wrote about     price', 'Aloha, makemake wau eʻike i kāu kumukūʻai.'),
(453, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Aloha    wrote about   the price for reseller', 'Ndewo, achọrọ m ịmara ọnụahịa gị.'),
(454, 'GeorgeEtess', 'dinanikolskaya99@gmail.com', 'Hello, i write about   the prices', 'Ողջույն, ես ուզում էի իմանալ ձեր գինը.'),
(455, 'Elton Delagarza', 'delagarza.elton@yahoo.com', 'ranking at the top of Google', 'We noticed that your website afadbd.org  is getting very little traffic from Google. Use our secret tool to reach the top positions in search results: https://europa-168.site/GhostPages\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://europa-168.site/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321'),
(456, 'Mike Bernt Williams', 'info@speed-seo.net', 'Find afadbd.org SEO Issues totally free', 'Hi, \r\nWorried about hidden SEO issues on your website? Let us help — completely free. \r\nRun a 100% free SEO check and discover the exact problems holding your site back from ranking higher on Google. \r\n \r\nRun Your Free SEO Check Now \r\nhttps://www.speed-seo.net/check-site-seo-score/ \r\n \r\nOr chat with us and our agent will run the report for you: https://www.speed-seo.net/whatsapp-with-us/ \r\n \r\nBest regards, \r\n \r\n \r\nMike Bernt Williams\r\n \r\nSpeed SEO Digital \r\nEmail: info@speed-seo.net \r\nPhone/WhatsApp: +1 (833) 454-8622'),
(457, 'Stprodv', 'yyooourmail@gmail.com', 'Информация по вашему сайту', 'Здравствуйте. Увеличу посещаемость и доходность вашего сайта. При этом увеличение посещаемости будет идти за счет притока целевых посетителей из поисковых систем, что для вас однозначно максимально выгодно. При необходимости решу любые имеющиеся проблемы по сайту. \r\n \r\nКратко о себе. Специалист в области создания, доработки и продвижения сайтов. Есть знания и опыт в некоторых смежных сферах. Опыт работы более двадцати лет. Работу выполняю качественно. Возможна работа по договору. Гарантии. \r\n \r\nОсновные направления моей деятельности: \r\n \r\n1. Внутренняя оптимизация. Все необходимые работы по сайту с целью достижения наилучших позиций в поисковых системах, наполнение сайта, улучшение конверсионных качеств и юзабилити, решение всех встреченных ошибок, при необходимости внедрение нового или улучшение старого функционала. \r\n \r\n2. Продвижение в поисковых системах. Работа с улучшением позиций по значимым для вас поисковым запросам, что способно дать большой приток целевой аудитории на сайт. \r\n \r\n3. Создание сайтов различных типов. Могу создать лендинг, интернет-магазин, сайт компании, информационный сайт, блог и т. д. \r\n \r\n4. Работа с отзывами в интернете. Создание и продвижение хороших отзывов, удаление плохих. \r\n \r\n5. Настройка рекламных кампаний в различных сервисах контекстной рекламы. \r\n \r\n6. Создание, доработка и продвижение групп и каналов в социальных сетях. Сюда входит: youtube, телеграм, вконтакте и другие. \r\n \r\nПишите мне на почту: stprodvigenie@gmail.com'),
(458, 'GeorgeEtess', 'dinanikolskaya99@gmail.com', 'Hello,   writing about     price for reseller', 'Hai, saya ingin tahu harga Anda.'),
(459, 'Donaldtoili', 'marketing@enso.finance', 'Enso finance fraud', 'We, a group of participants of the “Vampire Attack” campaign. In your public statements you stated that participants would receive ENSO tokens. We fully complied with all announced requirements. After the release of the official reward checker, our wallet addresses were marked as “not eligible”. According to our data, thousands of participants are in the same situation. We consider this to be fraudulent behavior. \r\nWe demand: publicly acknowledge the participation of all users in the “Vampire Attack” campaign and include each participant in the ENSO token distribution on equal terms. \r\nIf the https://www.enso.build/ does not begin the resolution process within 5 business days, we reserve the right to: \r\n• Widely disseminate this information; \r\n• File collective complaints.'),
(460, 'Abi', 'your.assistant23@outlook.com', 'Hire me as your Business Personal Assistant', 'Hello, Are you looking for a personal assistant who can handle your daily business operations and make your life easier?\r\n\r\nI can help with tasks related to:\r\n> Admin\r\n> Marketing\r\n> Gathering data from multiple websites\r\n> Answering emails\r\n> Website management\r\n> Social media\r\n> Content writing\r\n> Planning new projects\r\n> Bookkeeping\r\n> Entering data into softwares\r\n> Back-office assistance\r\n> Data Entry Operator\r\n\r\nIf you are interested, kindly revert me on Your.assistant23@outlook.com with list of tasks you want to accomplish, and we can discuss our collaboration over a video call as per your convenience.'),
(461, 'LeeEtess', 'zekisuquc419@gmail.com', 'Hallo, i write about your the price for reseller', 'Ողջույն, ես ուզում էի իմանալ ձեր գինը.'),
(462, 'Carina Lavender', 'carina.lavender@msn.com', 'question for you', 'Ever stop to think how much you\'re spending on marked-up CPMs for Connected TV ads?\r\nIf you\'re using “premium” audience segments without verifying who you\'re actually reaching, that money is likely feeding someone else\'s family.\r\nNo pressure. Here’s the site if you\'re open to see a revolutionary vision for digital advertising\r\ntopshelfaudience.com using real-time Intent data from an Integration in our platform to Lotame.com. You can reach me at marketing@mrmarketingres.com or 843-720-7301. And if this isn\'t a fit please feel free to email me and I\'ll be sure not to reach out again.  Thanks!'),
(463, 'Vincent', 'bposervices1@outlook.com', 'Reliable Back-Office Support for Your Business', 'Hello, Are back-office tasks slowing down your core business activities? I can help by managing:\r\n> Data entry and database updates\r\n> Order processing and invoice preparation\r\n> Bookkeeping and financial entries\r\n> Document management and record-keeping\r\n> Payroll and timesheet processing\r\n> Vendor and client communication follow-ups\r\n> CRM management and lead data organization\r\n> Preparing reports and spreadsheets\r\n> Email handling and scheduling support\r\n> Online research and data collection\r\n\r\nWith more than a decade of experience supporting businesses across industries, I ensure accuracy, confidentiality, and efficiency in every task. My pricing starts from $10/hr, depending on the project scope.\r\n\r\nIf you’d like to discuss your specific requirements, please email me at bposervices1@outlook.com. We can schedule a quick video call at your convenience to explore how I can support your operations.'),
(464, 'Reginald', 'hireonline556600@outlook.com', 'Hire VA Now!!!', 'Hello Partner, \r\n\r\nThey say “Do what you do best and outsource the rest”—and that’s exactly where we come in!\r\n\r\nWe help busy entrepreneurs and business owners like you reclaim time by assigning repetitive, time-consuming tasks to a reliable Virtual Assistant.\r\n\r\nWhether it\'s:\r\n• Managing inboxes '),
(465, 'Royal', 'info@hardaway.bangeshop.com', 'Royal Hardaway', 'Hello there, \r\n\r\nI hope you\'re doing well. I wanted to let you know about our new BANGE backpacks and sling bags that just released.\r\n\r\nBange is perfect for students, professionals and travelers. The backpacks and sling bags feature a built-in USB charging port, making it easy to charge your devices on the go.  Also they are waterproof and anti-theft design, making it ideal for carrying your valuables.\r\n\r\nBoth bags are made of durable and high-quality materials, and are perfect for everyday use or travel.\r\n\r\nOrder yours now at 50% OFF with FREE Shipping: http://bangeshop.com\r\n\r\nTo your success,\r\n\r\nRoyal'),
(466, 'Consuelo McCrae', 'consuelo.mccrae@outlook.com', 'Hello afadbd.org Administrator.', 'Limited-Time Deal: Submit to 2M Sites — 50% Off This Week. You’re reading this message. That’s the system working. Questions? Email me at: phil.strategy@form-blast-promo.top'),
(467, '* * * $3,222 credit available! Confirm your transaction here: http://www.uwiapartment.com/index.php?unhgqb * * * hs=d13784673f637677426b66b478044a25* ххх*', 'paouqua@mailbox.in.ua', 'lhodse', 'adzv5g'),
(468, '* * * <a href=\"http://www.uwiapartment.com/index.php?unhgqb\">$3,222 payment available</a> * * * hs=d13784673f637677426b66b478044a25* ххх*', 'paouqua@mailbox.in.ua', 'lhodse', 'adzv5g'),
(469, 'Mike Lars-Goran De Smet', 'info@professionalseocleanup.com', 'Fix August Google Spam update ranking problems for free', 'Hi, \r\nWhile reviewing afadbd.org, we spotted toxic backlinks that could put your site at risk of a Google penalty. Especially that this Google SPAM update had a high impact in ranks. This is an easy and quick fix for you. Totally free of charge. No obligations. \r\n \r\nFix it now: \r\nhttps://www.professionalseocleanup.com/ \r\n \r\nNeed help or questions? Chat here: \r\nhttps://www.professionalseocleanup.com/whatsapp/ \r\n \r\nBest, \r\nMike Lars-Goran De Smet\r\n \r\n+1 (855) 221-7591 \r\ninfo@professionalseocleanup.com'),
(470, 'Tyree', 'creativeteamhire@outlook.com', 'Content Writer and Copywriter', 'Hi, I\'m Tyree, a content and copywriter with over 12 years of experience creating content for various industries. I write blogs, rewrite old content, news articles, SEO-friendly web content, product descriptions, business service descriptions, newsletters, brochures, and more. My focus is on delivering content that connects with your audience, improves SEO, and gets results—all written without AI. I also provide reports from paid tools to back up my work. My rate is $50 per 1,000 words, offering great value for high-quality content. \r\n\r\nIf you\'d like to improve your content, feel free to email me at creativeteamhire@outlook.com.'),
(471, 'Harry Froude', 'froude.harry@gmail.com', 'Hi', 'Hello, I wanted to reach out personally — we’ve built a quick way for business owners to compare 3 personalized business loan options in about 60 seconds, with no credit impact and no documents required.\r\n\r\nIt’s designed to help you see what’s available right now and choose the one that fits best. Most of my clients are fully funded within 24–48 hours once they pick an option.\r\n\r\nYou can check out your 3 options here (takes less than a minute) smallbizline.com\r\n\r\nHope this helps you plan ahead for the next few months.\r\n\r\nBest,\r\n\r\nBill Stratus\r\nReachout Capital'),
(472, 'Milo Place', 'place.milo@gmail.com', 'Dear afadbd.org Administrator.', 'Hello,\r\n\r\nAt Lyrebird Capital Ltd, we believe every business deserves a financing structure that fuels both immediate growth and long-term success. Whether you’re launching a new venture or scaling an established enterprise, our solutions are designed to adapt to your goals.\r\n\r\nWe currently provide two core options:\r\n• Debt Financing – Capital at a competitive 3% annual interest rate, with no prepayment penalties. A straightforward, cost-effective way to fund growth while keeping full ownership.\r\n• Convertible Debt Financing – A flexible hybrid model combining 3% annual interest with a conversion feature. After two years, the debt may convert into a 10–15% equity stake, aligning our success with yours.\r\n\r\nIf you’re considering strategic funding with built-in flexibility, we’d be glad to review your pitch deck or executive summary. Our team will work closely with you to shape the most effective structure for your next stage of growth.\r\n\r\nWe look forward to the possibility of partnering with you.\r\n\r\nWarm regards,\r\nMathew Lundgren\r\nExecutive Investment Consultant | Director\r\nLyrebird Capital Ltd.\r\nmathew@mathewlundgren.com\r\nlyrebirdcap.com'),
(473, 'SimonEtess', 'dinanikolskaya99@gmail.com', 'Aloha, i write about   the prices', 'Szia, meg akartam tudni az árát.'),
(474, 'Irvin Harley', 'irvin.harley@gmail.com', 'have a query', 'Ever stop to think how much you\'re spending on marked-up CPMs for Connected TV ads?\r\nIf you\'re using “premium” audience segments without verifying who you\'re actually reaching, that money is likely feeding someone else\'s family.\r\nNo pressure. Here’s the site if you\'re open to see a revolutionary vision for digital advertising\r\ntopshelfaudience.com using real-time Intent data from an Integration in our platform to Lotame.com. You can reach me at marketing@mrmarketingres.com or 843-720-7301. And if this isn\'t a fit please feel free to email me and I\'ll be sure not to reach out again.  Thanks!'),
(475, 'Dwight McAnulty', 'dwight.mcanulty@gmail.com', 'The AI that prints you money', 'More clicks, less work: AI content that sells https://www.youtube.com/watch?v=8_3AOJj8lTg\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://europa-168.site/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321'),
(476, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hello, i am writing about   the prices', 'Hallo, ek wou jou prys ken.'),
(477, 'LeeEtess', 'zekisuquc419@gmail.com', 'Hello  i writing about your the prices', 'Sveiki, es gribēju zināt savu cenu.'),
(478, 'Gretta Sutcliffe', 'gretta.sutcliffe@gmail.com', 'Hello', 'Get 3 funding options for your business in less than a minute without submitting anything. \r\n\r\nJust visit smallbizline.com and see your options for our Line of Credit, MCA and a 3-5 year term loan without affecting your credit. \r\n\r\nChoose the option that works best for you and get funded  as soon as the next day.\r\n\r\nWe look forward to working with you. \r\n\r\nReachout Capital'),
(479, 'BrandonJen', 'urbmocyvyooz7m4@tempmail.us.com', 'Buy Verified Accounts Safely at AccsMarket.net', 'For secure verified accounts, look no further than https://AccsMarket.net. We provide a variety of PVA accounts that are perfect for marketing, personal use, or business growth. With fast delivery and a wide selection, https://AccsMarket.net is your trusted source for social media accounts. \r\n \r\nExplore the Site: \r\n \r\nhttps://AccsMarket.net \r\n \r\nI Appreciate It!'),
(480, 'Mandy', 'creativeteamhire@outlook.com', 'Content Writer and Copywriter', 'Hi, I\'m Mandy, a content and copywriter with over 12 years of experience creating content for various industries. I write blogs, rewrite old content, news articles, SEO-friendly web content, product descriptions, business service descriptions, newsletters, brochures, and more. My focus is on delivering content that connects with your audience, improves SEO, and gets results—all written without AI. I also provide reports from paid tools to back up my work. My rate is $50 per 1,000 words, offering great value for high-quality content. \r\n\r\nIf you\'d like to improve your content, feel free to email me at creativeteamhire@outlook.com'),
(481, 'Dianna Mackay', 'mackay.dianna@outlook.com', 'question about afadbd.org', 'What if just 15 minutes on the phone could unlock 20% to 50% savings on your group health plan?\r\nSchedule a quick call now to explore potential savings --> https://tinyurl.com/shedulecallnow'),
(482, 'Jay', 'socialmedia1145@outlook.com', 'Done-For-You Social Media @ $50 per month.', 'Most business owners don’t have time or interest in managing social media — they prefer focusing on core activities. We help by creating high-quality content that keeps your brand active. Our plans: $50/month for 4 posts or $250/month for 30 posts. Let’s connect on a quick video call so I can show how we can handle it for you. \r\n\r\nWhat time works best for you? Reply me on socialmedia1145@outlook.com'),
(483, 'Alisia Rayford', 'alisia.rayford@gmail.com', 'question', 'Test your message at scale: 1,000,000 contact form submissions for only $49.(norm. $99) Ping me at kloos@bienhoamarketing.com'),
(484, 'Chu Dulaney', 'dulaney.chu@hotmail.com', 'hello?', 'Ever stop to think how much you\'re spending on marked-up CPMs for Connected TV ads?\r\nIf you\'re using “premium” audience segments without verifying who you\'re actually reaching, that money is likely feeding someone else\'s family.\r\nNo pressure. Here’s the site if you\'re open to see a revolutionary vision for digital advertising\r\ntopshelfaudience.com using real-time Intent data from an Integration in our platform to Lotame.com. You can reach me at marketing@mrmarketingres.com or 843-720-7301. And if this isn\'t a fit please feel free to email me and I\'ll be sure not to reach out again.  Thanks!'),
(485, 'Lyndon Apple', 'apple.lyndon@gmail.com', 'To the afadbd.org Owner!', 'You can view my full site here: https://submissiontodirectory.top'),
(486, 'King Scofield', 'scofield.king@gmail.com', 'Dear afadbd.org Owner!', 'Flash Offer: $99 for 2M Form-Based Outreach — Half Price. This message reached you through the same system. That’s proof. Get started by emailing me at: phil.leads@form-blast-promo.top'),
(487, 'Xavier Jernigan', 'jernigan.xavier@googlemail.com', 'To the afadbd.org Owner!', 'Discover why thousands trust Amish Reserve for natural relief. Rated Excellent on Trustpilot — experience organic wellness that truly works. From the heart of Amish Country, every Amish Reserve product is handcrafted using time-honored traditions and the finest natural ingredients. Our top-selling favorites include Natural Pain Relief Cream, Rest & Relax Formula, Daily Wellness Drops, and Herbal Salves & Oils — all made pure, tested for quality, and free from synthetic additives. Join thousands who trust Amish Reserve for honest, effective wellness. Shop now: https://amishreserve.com/collections/all'),
(488, 'LeeEtess', 'zekisuquc419@gmail.com', 'Hi    writing about your the price for reseller', 'Γεια σου, ήθελα να μάθω την τιμή σας.'),
(489, 'Magaret Forlong', 'forlong.magaret@msn.com', 'Hi', 'Get 3 funding options for your business in less than a minute without submitting anything. \r\n\r\nJust visit smallbizline.com and see your options for our Line of Credit, MCA and a 3-5 year term loan without affecting your credit. \r\n\r\nChoose the option that works best for you and get funded  as soon as the next day.\r\n\r\nWe look forward to working with you. \r\n\r\nReachout Capital'),
(490, 'Mike Eric Davies', 'info@digital-x-press.com', 'Add AEO to your SEO strategies today !', 'Hi, \r\nI recognize that most website owners find it challenging recognizing that Answer Engine Optimization (AEO) is a long-term game and a carefully organized ongoing investment. \r\n \r\nSadly, very few marketers have the patience to observe the incremental yet impactful results that can completely change their online presence. \r\n \r\nWith Google’s evolving algorithms, a reliable, ongoing approach including Answer Engine Optimization (AEO) is critical for securing a strong return on investment. \r\n \r\nIf you see this as the right method, work with us! \r\n \r\nCheck out Our Monthly SEO Services https://www.digital-x-press.com/unbeatable-seo/ \r\n \r\nTalk to Us on Instant Messaging https://www.digital-x-press.com/whatsapp-us/ \r\n \r\nWe deliver unbeatable performance for your resources, and you will value choosing us as your digital marketing ally. \r\n \r\nBest regards, \r\nDigital X SEO Experts \r\nPhone/WhatsApp: +1 (844) 754-1148'),
(491, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hi, i wrote about your   price', 'Прывітанне, я хацеў даведацца Ваш прайс.'),
(492, 'slm_ncpn', 'reststerthorring1986@larpan-mobi4omes.ru', 'slm принтер купить', 'Найдите идеальный вариант для своего бизнеса и <a href=https://klpl3r.ru/>slm 3d принтер купить|3д принтер slm купить|slm принтер по металлу купить|slm принтер купить</a> уже сегодня! \r\nВ интернет-сообществах можно найти ответы на распространенные вопросы.'),
(493, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Aloha  i writing about     price', 'Hallo, ek wou jou prys ken.'),
(494, 'Josefa Wortham', 'wortham.josefa@outlook.com', 'request', 'Ever stop to think how much you\'re spending on marked-up CPMs for Connected TV ads?\r\nIf you\'re using “premium” audience segments without verifying who you\'re actually reaching, that money is likely feeding someone else\'s family.\r\nNo pressure. Here’s the site if you\'re open to see a revolutionary vision for digital advertising\r\ntopshelfaudience.com using real-time Intent data from an Integration in our platform to Lotame.com. You can reach me at marketing@mrmarketingres.com or 843-720-7301. And if this isn\'t a fit please feel free to email me and I\'ll be sure not to reach out again.  Thanks!'),
(495, 'Ashok', 'ashokgupta630@aol.com', 'E-commerce Virtual Assistant', 'Hi,\r\n\r\nKeeping stock levels synced across Shopify, Amazon, eBay, and more is my specialty. \r\n\r\nFor $10/hr, I perform real-time inventory updates to prevent oversells and lost sales. Not only this, I would be happy to assist you with any day-to-day operational task. \r\n\r\nLet’s set up a quick Zoom call so I can walk you through my process. Mail me at ashokgupta630@aol.com'),
(496, 'Brigitte Cintron', 'cintron.brigitte40@gmail.com', 'Hi afadbd.org Webmaster.', 'Learn more on my website here: https://submissiontodirectory.top'),
(497, 'Mike Markus Schmidt', 'mike@monkeydigital.co', 'Grow Your Website Traffic with Geo-Targeted Social Ads – Only $10 for 10K Visits!', 'Dear Webmaster, \r\n \r\nI wanted to reach out with something that could seriously help your website’s visitor count. We work with a trusted ad network that allows us to deliver genuine, geo-targeted social ads traffic for just $10 per 10,000 visits. \r\n \r\nThis isn\'t bot traffic—it’s actual users, tailored to your chosen market and niche. \r\n \r\nWhat you get: \r\n \r\n10,000+ real visitors for just $10 \r\nCountry-specific traffic for your chosen location \r\nHigher volumes available based on your needs \r\nProven to work—we even use this for our SEO clients! \r\n \r\nInterested? Check out the details here: \r\nhttps://www.monkeydigital.co/product/country-targeted-traffic/ \r\n \r\nOr ask any questions on WhatsApp: \r\nhttps://monkeydigital.co/whatsapp-us/ \r\n \r\nLooking forward to getting you more traffic! \r\n \r\nBest, \r\nMike Markus Schmidt\r\n \r\nPhone/whatsapp: +1 (775) 314-7914'),
(498, 'Abi', 'bposervices1@outlook.com', 'Outsource Repetitive Tasks – Reliable VA Support', 'Hi,\r\n\r\nI help businesses reduce workload and save time by outsourcing repetitive operational processes to a reliable Virtual Assistant. Here’s what I can handle:\r\n\r\n>  Data entry and migration between tools or software\r\n>  Uploading product catalogs, price lists, or customer data\r\n>  Managing spreadsheets, reports, and admin documentation\r\n>  Handling CRM updates and task tracking\r\n>  File conversion (PDF to Word/Excel), transcription & formatting\r\n>  Cleaning and organizing large datasets\r\n>  Managing contact databases and verifying email lists\r\n>  Updating inventory or backend systems\r\n\r\nYou get accuracy, speed, and reliable support—all starting at $10/hour.\r\n\r\nWould you like to outsource some of your operational workload?\r\n\r\nBest regards,\r\nAbi Singh\r\nBposervices1@outlook.com'),
(499, 'SimonEtess', 'dinanikolskaya99@gmail.com', 'Hallo, i am write about   the price for reseller', 'Hi, I wanted to know your price.'),
(500, 'Colette Kahl', 'colette.kahl@yahoo.com', 'i have an inquiry', 'Is anyone human reading my message? Ah there you are! I\'m offering a cheap and quick way for you to reach millions of website owners just like my message reached you now. It\'s simple, you give me your ad text and I blast it with my special AI enabled software to either millions of random sites or targets that you select. Check out my site below for details or to have a live chat with me now. \r\n\r\nGo ahead and reach out now! I mean you already know this works since you\'ve read my message this far right?\r\n\r\nThanks!\r\nPhil\r\nwebsite: contactformpromotion.com'),
(501, 'LucasMuh', 'richmondsalema15@gmail.com', 'Win a Prize Worth Up to $100,000.77!', 'iPhone 17, gaming laptops, gift cards, crypto & more! \r\nJoin now: https://telegra.ph/Get-a-gift-worth-up-to-10000077-10-23-7060'),
(502, 'LucasMuh', 'richmondsalema15@gmail.com', 'Win a Prize Worth Up to $100,000.77!', 'iPhone 17, gaming laptops, gift cards, crypto & more! \r\nJoin now: https://telegra.ph/Get-a-gift-worth-up-to-10000077-10-23-7060'),
(503, 'LucasMuh', 'richmondsalema15@gmail.com', 'Win a Prize Worth Up to $100,000.77!', 'iPhone 17, gaming laptops, gift cards, crypto & more! \r\nJoin now: https://telegra.ph/Get-a-gift-worth-up-to-10000077-10-23-7060'),
(504, 'LucasMuh', 'richmondsalema15@gmail.com', 'Win a Prize Worth Up to $100,000.77!', 'iPhone 17, gaming laptops, gift cards, crypto & more! \r\nJoin now: https://telegra.ph/Get-a-gift-worth-up-to-10000077-10-23-7060'),
(505, 'LucasMuh', 'richmondsalema15@gmail.com', 'Win a Prize Worth Up to $100,000.77!', 'iPhone 17, gaming laptops, gift cards, crypto & more! \r\nJoin now: https://telegra.ph/Get-a-gift-worth-up-to-10000077-10-23-7060'),
(506, 'GeorgeEtess', 'dinanikolskaya99@gmail.com', 'Hi, i am write about   the prices', 'Ola, quería saber o seu prezo.'),
(507, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Aloha,   write about     price', 'Hallo, ek wou jou prys ken.'),
(508, 'BrandonJen', 'urbmocyvyooz7m4@tempmail.us.com', 'Get Verified Accounts Delivered Instantly from AccsMarket.net', 'Get the verified accounts you need at https://AccsMarket.net. We offer bulk PVA accounts that are designed to work on any platform, created using different server IPs for maximum security and performance. Shop with confidence and enjoy fast access to your new accounts today. \r\n \r\nVisit Link: \r\n \r\nhttps://AccsMarket.net \r\n \r\nThank You Immensely!'),
(509, 'LeeEtess', 'zekisuquc419@gmail.com', 'Hallo  i am writing about your the price', 'Hi, I wanted to know your price.'),
(510, 'Mike Harrv Weber', 'mike@monkeydigital.co', 'Collaboration Request', 'Hello, \r\n \r\nThis is Mike from Monkey Digital, \r\nI am getting in touch about a exciting collaboration. \r\n \r\nHow would you like to feature our ads on your platform and redirect via your custom affiliate link towards hot-selling services from our website? \r\n \r\nThis way, you earn a solid 35% commission, month after month from any transactions that generate from your site. \r\n \r\nThink about it, everyone benefit from SEO, so this is a huge opportunity. \r\n \r\nWe already have thousands of affiliates and our payouts are sent on time. \r\nIn the past month, we paid out over $27,000 in affiliate earnings to our affiliates. \r\n \r\nIf interested, kindly contact us here: \r\nhttps://monkeydigital.co/affiliates-whatsapp/ \r\n \r\nOr register today: \r\nhttps://www.monkeydigital.co/join-our-affiliate-program/ \r\n \r\nBest Regards, \r\nMike Harrv Weber\r\n \r\nPhone/whatsapp: +1 (775) 314-7914'),
(511, 'Mike Bernt Willems', 'info@strictlydigital.net', 'Semrush links for afadbd.org', 'Hi there, \r\n \r\nGetting some bunch of links redirecting to afadbd.org may result in zero worth or worse for your website. \r\n \r\nIt really doesn’t matter the number of inbound links you have, what is key is the total of search terms those domains rank for. \r\n \r\nThat is the critical element. \r\nNot the fake Domain Authority or SEO score. \r\nAnyone can manipulate those. \r\nBUT the amount of Google-ranked terms the sites that point to your site contain. \r\nThat’s the bottom line. \r\n \r\nGet these quality links redirect to your site and your rankings will skyrocket! \r\n \r\nWe are offering this exclusive SEO package here: \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nNeed more details, or need more information, chat with us here: \r\nhttps://www.strictlydigital.net/whatsapp-us/ \r\n \r\nSincerely, \r\nMike Bernt Willems\r\n \r\nstrictlydigital.net \r\nPhone/WhatsApp: +1 (877) 566-3738'),
(512, 'Colette Servin', 'ahmed.abdulla00175@gmail.com', 'inquiry', 'Dear Sir/Madam,\r\n\r\nWe are a financial advisory company working with investors from the Gulf region who are interested in funding viable business ventures and projects worldwide.\r\n\r\nIf you have a project in progress or an upcoming opportunity that requires financing, we would be glad to discuss possible collaboration.\r\n\r\nPlease contact me directly at jaralla.nassar@dejlaconsulting.com\r\n for further details.\r\n\r\nKind regards,\r\nMr. Nassar Jaralla Al-Marri\r\nFinancial Advisor\r\nDejla Consulting LLC'),
(513, 'Md Mustfaizur Rahman', 'rs.shawon@yahoo.com', 'Need to improve online portal', 'Need to improve online portal by an expart person,'),
(514, 'LeeEtess', 'zekisuquc419@gmail.com', 'Hello    write about your   prices', 'Sveiki, aš norėjau sužinoti jūsų kainą.'),
(515, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hallo    writing about your the prices', 'Hej, jeg ønskede at kende din pris.'),
(516, 'Benjamin', 'info@easylawnmowing.com', 'Join AgentRouter & Get $200 Free', 'If you\'re developing AI applications, AgentRouter is offering $200 free credits right now. It\'s a unified API gateway that lets you switch between GPT-5, Claude, and other models instantly without multiple subscriptions. GitHub login gives you immediate accessвЂ”no verification needed. Perfect for MVPs and testing phases.вЂ‹ https://bit.ly/agentrouter200'),
(517, 'Mona Taul', 'taul.mona@googlemail.com', 'Tired of running like a hamster in a wheel?', 'Working hard every day but still barely moving forward? It’s time to stop the endless grind.\r\nDiscover how people are earning real money from trading — no office, no boss, no limits.\r\n\r\nOne simple app could be your ticket to financial freedom: https://youtu.be/VmHYisHHOtU\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://casatemporada.site/unsubscribe?domain=afadbd.org\r\nAddress: 108 West Street Comstock Park, MI 48721'),
(518, 'Vana', 'businessgrowtogether@outlook.com', 'Experienced Bookkeeper', 'Hi, This is Vana. I am a bookkeeper. I can categorize your transactions of incomes/expenses and can handle bank reconciliations. I can work on any software that you use for accounting. My rates are USD 20 per hour or We can set a monthly cost as per your convenience. \r\n\r\nReply me on Businessgrowtogether@outlook.com to discuss further.'),
(519, 'Sergio O\'Reily', 'sergio@marketing-z.cfd', 'All the companies in World & 50,000 Cold Emails', 'All the companies in World & 50,000 Cold Emails -\r\n\r\nThe Database:\r\n\r\n    25 Million Companies Worldwide\r\n    Instantly Delivery\r\n    Last Update: 7 October 2025\r\n    Sample of the Database\r\n\r\nEmails:\r\n\r\n    50 thousands emails of your choice from the database\r\n    You pick the industries, location\r\n    We setup the mail system and domains for you\r\n    Responses go directly to you\r\n    Emails are verified for you and delivered\r\n\r\nCost:\r\n\r\n    All prices are charged in South African Rand (conversion is automatic).\r\n    Total once off cost is : $99 = R1,707\r\n\r\nQuestions?\r\n\r\nIf you need any assistance or have questions:\r\nYou can reply to this email\r\nCall or contact us on WhatsApp on +27 67 770 3960\r\nYou can talk to us on live chat!\r\nOr visit our promotion directly here: https://Sergio.marketing-z.cfd'),
(520, 'Mandy', 'creativeteamhire@outlook.com', 'Content Writer and Copywriter', 'Hi, I\'m Mandy, a content and copywriter with over 12 years of experience creating content for various industries. I write blogs, rewrite old content, news articles, SEO-friendly web content, product descriptions, business service descriptions, newsletters, brochures, and more. My focus is on delivering content that connects with your audience, improves SEO, and gets results—all written without AI. I also provide reports from paid tools to back up my work. My rate is $50 per 1,000 words, offering great value for high-quality content. \r\n\r\nIf you\'d like to improve your content, feel free to email me at creativeteamhire@outlook.com'),
(521, '* * * $3,222 deposit available! Confirm your transaction here: http://theeasyedi.com/index.php?6xfibn * * * hs=d13784673f637677426b66b478044a25* ххх*', 'paouqua@mailbox.in.ua', 'oms3gc', 'k4bxcu'),
(522, '* * * <a href=\"http://theeasyedi.com/index.php?6xfibn\">$3,222 payment available</a> * * * hs=d13784673f637677426b66b478044a25* ххх*', 'paouqua@mailbox.in.ua', 'oms3gc', 'k4bxcu'),
(523, 'Leonard Munger', 'munger.leonard@gmail.com', '???', 'T5 Power naturally enhances testosterone for more muscle, better mood, sharper focus, and unstoppable energy. It’s the #1 way to reclaim your vitality—without risky drugs. '),
(524, 'Ravi', 'businessgrowtogether@outlook.com', 'Personal Assistant', 'Are you looking for a personal assistant who can handle your daily business operations and make your life easier? I can help with tasks related to admin, marketing, gathering data from multiple websites, answering emails, website management, social media, content writing, planning new projects, bookkeeping, entering data into softwares, and back-office assistance. I have an Inhouse Content writer, social media specialist, Data Entry Operator, Website Developer and Bookkeeper. My costing varies from $8/hr to $30/hr depending on type of project and its complexity. \r\n\r\nIf you are interested, send me an email at Businessgrowtogether@outlook.com with a list of tasks you want to accomplish, and We can discuss our collaboration over a video call as per your convenience.'),
(525, 'NAERTREGE2346694NEWETREWT', 'vyfkehdg@fringmail.com', 'TOTUTYJ2346694TIGFHFGER', 'MERTHYTJTJ2346694MAWRERGTRH'),
(526, 'AvaAdary', 'oliviaIntapE517@yahoo.com', 'Your site got me curious', 'Hey, I just stumbled onto your site… are you always this good at catching attention, or did you make it just for me? Write to me on this website ---  https://rb.gy/ydlgvk?Anemeda  ---  my username is the same, I\'ll be waiting.'),
(527, 'Marianne Lo', 'marianne.lo3@msn.com', 'have a query', 'Ever stop to think how much you\'re spending on marked-up CPMs for Connected TV ads?\r\nIf you\'re using “premium” audience segments without verifying who you\'re actually reaching, that money is likely feeding someone else\'s family.\r\nNo pressure. Here’s the site if you\'re open to see a revolutionary vision for digital advertising\r\ntopshelfaudience.com using real-time Intent data from an Integration in our platform to Lotame.com. You can reach me at marketing@mrmarketingres.com or 843-720-7301. And if this isn\'t a fit please feel free to email me and I\'ll be sure not to reach out again.  Thanks!'),
(528, 'Sam', 'businessprocessoutsourcing1@outlook.com', 'Virtual Assistant Support for Accurate Data Entry & Back Office Tasks', 'Hi, I help businesses like yours save time and streamline daily operations by providing reliable Virtual Assistant and back-office support.\r\n\r\nHere are some of the common tasks we handle:\r\n1. Reading PDF documents carefully and entering data accurately into your software or system\r\n2. Managing emails and calendars\r\n3. Data entry and CRM updates\r\n4. Online research and lead generation\r\n5. Handling customer inquiries and support tickets\r\n6. Preparing reports, spreadsheets, and presentations\r\n7. Social media posting and content scheduling\r\n8. Bookkeeping and invoice management\r\n9. Order processing and inventory tracking\r\n10. Website updates (WordPress, Shopify, etc.)\r\n11. File organization and document formatting\r\n\r\nOur rates range from $10/hr to $20/hr, depending on task complexity.\r\n\r\nYou don’t need to hire a full-time employee — you can assign us work on a task basis, whether it’s 5–10 minutes a day or a full-time project, we’ll handle it with the same accuracy and dedication.\r\n\r\nCommunication is never an issue — we can connect anytime via Zoom, Google Meet, or Microsoft Teams.\r\n\r\nFor managing files and information, we can work through Google Drive, shared drives, or any system you prefer.\r\n\r\nIf you are interested, please reply to Businessprocessoutsourcing1@outlook.com'),
(529, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hello    write about your the price for reseller', 'Kaixo, zure prezioa jakin nahi nuen.'),
(530, 'GeorgeEtess', 'dinanikolskaya99@gmail.com', 'Aloha, i writing about your   prices', 'হাই, আমি আপনার মূল্য জানতে চেয়েছিলাম.'),
(531, 'Meri Corona', 'corona.meri@gmail.com', 'Hello afadbd.org Owner.', 'You can explore my site here: https://submissiontodirectory.top'),
(532, 'Mike Maqnus Dubois', 'info@speed-seo.net', 'Find afadbd.org SEO Issues totally free', 'Hi, \r\nWorried about hidden SEO issues on your website? Let us help — completely free. \r\nRun a 100% free SEO check and discover the exact problems holding your site back from ranking higher on Google. \r\n \r\nRun Your Free SEO Check Now \r\nhttps://www.speed-seo.net/check-site-seo-score/ \r\n \r\nOr chat with us and our agent will run the report for you: https://www.speed-seo.net/whatsapp-with-us/ \r\n \r\nBest regards, \r\n \r\n \r\nMike Maqnus Dubois\r\n \r\nSpeed SEO Digital \r\nEmail: info@speed-seo.net \r\nPhone/WhatsApp: +1 (833) 454-8622'),
(533, 'Rosaline McNish', 'mcnish.rosaline@msn.com', 'hey', 'Hi, I can help you upgrade your existing business or start up a new investment project that can fetch you a good ROI. Kindly visit my website at www.tlainvestmentconsulting.com to learn more.'),
(534, 'Isabella', 'kontakt-institutionell@bafza.bund.de', 'Online Business', 'Looking to monetize your audience or website? New AI platform offering 50% lifetime recurring commission https://bit.ly/4oKa9iW'),
(535, 'SimonEtess', 'dinanikolskaya99@gmail.com', 'Hallo  i am wrote about your   prices', 'Salut, ech wollt Äre Präis wëssen.'),
(536, 'Emma Wilson', 'emma.wilson1768@gmail.com', 'Help with growing your audience', 'Hi,\r\n\r\nI hope this message finds you well.\r\n\r\nI came across afadbd.org and wanted to reach out because we specialize in helping websites like yours achieve significant, sustainable growth, regardless of your industry.\r\n\r\nWe\'ve grown a significant audience of over 30 million, which we use to promote websites and drive targeted traffic. We leverage this reach with our proven Email Marketing service, which is designed to nurture leads and significantly increase repeat purchases.\r\n\r\nIf you focus on a local customer base, we also have a dedicated Local SEO service tailored to boost your visibility and bring in local traffic:\r\n\r\nIf you would like further information on how either of these services can benefit your business, please get back in touch.\r\n\r\nThanks for your time,\r\nEmma'),
(537, 'Dale Winder', 'dale.winder@outlook.com', 'Dear afadbd.org Owner!', 'Check out my site to see what we offer: https://submissiontodirectory.top'),
(538, 'Tarun', 'webdesignservices111@outlook.com', 'Redesign website', 'Hi, we design and redesign websites that look great, load fast, and drive real results. Whether you\'re starting fresh or need a revamp — we can help.\r\nE-mail me at webdesignservices111@outlook.com'),
(539, 'Joanna Riggs', 'joannariggs278@gmail.com', 'Video Promotion for afadbd.org?', 'Hi,\r\n\r\nI just visited afadbd.org and wondered if you\'ve ever considered an impactful video to advertise your business? Our videos can generate impressive results on both your website and across social media.\r\n\r\nOur videos cost just $195 (USD) for a 30 second video ($239 for 60 seconds) and include a full script, voice-over and video.\r\n\r\nI can show you some previous videos we\'ve done if you want me to send some over. Let me know if you\'re interested in seeing samples of our previous work.\r\n\r\nRegards,\r\nJoanna\r\n\r\nUnsubscribe: https://unsubscribe.video/unsubscribe.php?d=afadbd.org'),
(540, 'LeeEtess', 'zekisuquc419@gmail.com', 'Aloha    writing about   the prices', 'Здравейте, исках да знам цената ви.'),
(541, 'Mauricio Reynoso', 'reynoso.mauricio@gmail.com', '5 Ready-To-Launch SaaS Businesses To Start Selling Instantly!', 'Start Your Own AI SaaS Agency & Charge Your Clients $497-$2997 For Creating 1 Single App… \r\nOr Sell Them on Fiverr, Upwork, Your Website, \r\nor As Monthly Subscription – For Fastest 6-Figure Passive Income!\r\n\r\nhttps://goldsolutions.pro/MagicAppsAI\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://smartexperts.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321'),
(542, 'Nickolas Haining', 'nickolas.haining@hotmail.com', 'Hi', 'Need extra working capital?\r\n\r\nExpress Capital is a revenue-based lender, making decisions based on your sales, not your credit or collateral.\r\n\r\nGet an approval in under a minute and funding within 24 hours — with no hidden fees or long applications.\r\n\r\nSee what you qualify for at https://www.expresscapitalcorp.com\r\n\r\nBest Regards, \r\nExpress Capital'),
(543, 'IsabellaAdary', 'emmaIntapE712@hotmail.com', 'Make Your Website Famous', 'We noticed that your website hasn\'t been receiving much traffic lately. As a friendly reminder, we offer exclusive advertising packages that can greatly boost your online presence and attract new visitors to your site.  --- rb.gy/34p7i3?Adary'),
(544, 'Chanel Conway', 'joel.fox.1965+afadbd.org@gmail.com', 'Nonstop Payments', 'Discover The Easy New Way We’re Getting Paid Multiple Times A Day From A Hidden Source!\r\nhttps://www.novaai.expert/TheHiddenGoldmine\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321'),
(545, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hallo, i writing about your the price for reseller', 'Zdravo, htio sam znati vašu cijenu.'),
(546, 'Mitchell Keysor', 'ahmed.abdulla00175@gmail.com', 'inquiry', 'Dear Sir/Madam,\r\n\r\nWe are a financial advisory company working with investors from the Gulf region who are interested in funding viable business ventures and projects worldwide.\r\n\r\nIf you have a project in progress or an upcoming opportunity that requires financing, we would be glad to discuss possible collaboration.\r\n\r\nPlease contact me directly at jaralla.nassar@dejlaconsulting.com\r\n for further details.\r\n\r\nKind regards,\r\nMr. Nassar Jaralla Al-Marri\r\nFinancial Advisor\r\nDejla Consulting LLC'),
(547, 'Ashok', 'viralbusinesscampaign@outlook.com', 'Virtual Assistant – Lead Research & Outreach', 'Hello, My name is Ashok Gupta. I help businesses with lead list creation, data research, and email outreach — exactly as per client instructions and process.\r\n\r\nI don’t use my own methods or tools; I follow the client’s training carefully to deliver accurate and reliable results.\r\nIf someone shows interest in your product or service, I also add those leads directly into your CRM for easy follow-up.\r\n\r\nMy service rate is $10–$15 per hour, depending on the project scope.\r\nIf you’re interested, please reply to me at viralbusinesscampaign@outlook.com'),
(548, 'Caitlyn Richter', 'richter.caitlyn5@gmail.com', 'Checking if I reached the right person', 'Here is my site: https://submissiontodirectory.top/'),
(549, 'OliviaAdary', 'emmaIntapE713@yahoo.com', 'Make Your Website Famous', 'If you\'re looking to expand your audience and connect with like-minded individuals, consider promoting your site on our popular dating platform, https://rb.gy/34p7i3?Anemeda. With millions of active users worldwide, it\'s the perfect place to find meaningful relationships or casual encounters.'),
(550, 'Marita Gallagher', 'marita.gallagher@gmail.com', 'afadbd.org', 'Take a look at my website for more info: https://submissiontodirectory.top/'),
(551, 'Vana', 'bizassistance008@outlook.com', 'Experienced Bookkeeper', 'Hi, This is Vana, an experienced bookkeeper with more than a decade experience in bookkeeping for USA, UK, Canada, Europe and Australian Clients with expertise in:\r\n\r\nQuickBooks, Xero, Wave, FreshBooks, Sage, Zoho Books, MYOB, Kashoo, Tally, NetSuite, Odoo Accounting, Quicken, Microsoft Dynamics 365, ZipBooks, and FreeAgent.\r\n\r\nI can help you with:\r\n > Categorizing income and expense transactions accurately\r\n > Handling reconciliations for PayPal, Wise, Stripe, and business bank accounts\r\n > Maintaining clean and up-to-date financial records\r\n\r\nMy rate is USD 20 per hour.\r\n\r\nIf you’d like to discuss further, please reply to bizassistance008@outlook.com'),
(552, 'Jere', 'jere@cazaly.medicopostura.com', 'Jere Cazaly', 'Hello there \r\n\r\nLooking to improve your posture and live a healthier life? Our Medico Postura™ Body Posture Corrector is here to help!\r\n\r\nExperience instant posture improvement with Medico Postura™. This easy-to-use device can be worn anywhere, anytime – at home, work, or even while you sleep.\r\n\r\nMade from lightweight, breathable fabric, it ensures comfort all day long.\r\n\r\nGrab it today at a fantastic 60% OFF: https://medicopostura.com\r\n\r\nPlus, enjoy FREE shipping for today only!\r\n\r\nDon\'t miss out on this amazing deal. Get yours now and start transforming your posture!\r\n\r\nHave a great time, \r\n\r\nJere'),
(553, 'Lashawn Gann', 'lashawn.gann@outlook.com', '???', 'Manhood Shield boosts natural nitric oxide for rock-hard erections, stronger stamina, and explosive bedroom confidence. No pills, no pumps—just 1-2 capsules daily to reclaim your peak performance.  \r\n \r\n'),
(554, 'Mike Gustavo Fischer', 'info@professionalseocleanup.com', 'Fix August Google Spam update ranking problems for free', 'Hi, \r\nWhile reviewing afadbd.org, we spotted toxic backlinks that could put your site at risk of a Google penalty. Especially that this Google SPAM update had a high impact in ranks. This is an easy and quick fix for you. Totally free of charge. No obligations. \r\n \r\nFix it now: \r\nhttps://www.professionalseocleanup.com/ \r\n \r\nNeed help or questions? Chat here: \r\nhttps://www.professionalseocleanup.com/whatsapp/ \r\n \r\nBest, \r\nMike Gustavo Fischer\r\n \r\n+1 (855) 221-7591 \r\ninfo@professionalseocleanup.com'),
(555, 'Deepu', 'businessprocessoutsourcing1@outlook.com', 'Video Editing and New Video Creation', 'I\'m Deepu. a remote Video Producer and Video Editor. My expertise is to create new promotional videos and reels, Making edits in existing videos, Making small clips out of longer videos, Creating video scripts and voiceovers. If you need any videos for your social media channels/websites/corporate events/product promotion/service promotion, then, you are at the right place. Softwares used by me are Premiere Pro, After Effects and DaVinchi Resolve. My Costing is $20/hr to $40/hr. \r\n\r\nCan you share your requirement with me at Businessprocessoutsourcing1@outlook.com?'),
(556, 'Kelle Godwin', 'kelle.godwin11@gmail.com', '???', 'T5 Power naturally enhances testosterone for more muscle, better mood, sharper focus, and unstoppable energy. It’s the #1 way to reclaim your vitality—without risky drugs. '),
(557, 'Ashely Madrigal', 'ashely.madrigal31@gmail.com', 'need info', 'Don’t miss out: your ad to 1M sites for just $55 today. Send your reply to hello@bestaitools.my'),
(558, 'Emma', 'kontakt-institutionell@bafza.bund.de', 'Digital Partnership', 'Interested in high-paying affiliate program? 50% on all AI platform sales. Lifetime commission https://bit.ly/AllureAi'),
(559, 'Jaqueline Dunlap', 'dunlap.jaqueline@gmail.com', 'ask', 'Ever stop to think how much you\'re spending on marked-up CPMs for Connected TV ads?\r\nIf you\'re using “premium” audience segments without verifying who you\'re actually reaching, that money is likely feeding someone else\'s family.\r\nNo pressure. Here’s the site if you\'re open to see a revolutionary vision for digital advertising\r\ntopshelfaudience.com using real-time Intent data from an Integration in our platform to Lotame.com. You can reach me at marketing@mrmarketingres.com or 843-720-7301. And if this isn\'t a fit please feel free to email me and I\'ll be sure not to reach out again.  Thanks!'),
(560, 'Lonna Sissons', 'lonna.sissons@gmail.com', 'How To Turn SHORT, AI-GENERATED VIDEOS Into INCOME, FAST...', 'How Everyday People Are Turning \r\nFree AI Videos Into $500+ Days...\r\nWhile Chillin\' On Their Phone / Computer?\r\nhttps://smartexperts.pro/Vyralzz\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://smartexperts.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321'),
(561, 'Johnathan Benton', 'joel.fox.1965+afadbd.org@gmail.com', 'Create High-Quality Ebooks up to 180 Pages in Minutes', 'THE FASTEST WAY TO CREATE, PUBLISH, & PROFIT\r\nFROM EBOOKS… NO WRITING REQUIRED\r\n\r\nPROFIT-READY EBOOKS with covers, TOC, chapters, sections, links, images, & content!\r\nhttps://viewbet-24.site/eBookWriterAI\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://viewbet-24.site/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321'),
(562, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Aloha, i writing about     prices', 'Salut, ech wollt Äre Präis wëssen.');
INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`) VALUES
(563, 'Odessa Marble', 'marble.odessa@gmail.com', 'Wanted to run an idea by you', 'Here is my site: https://submissiontodirectory.top/'),
(564, 'Ashleigh Doughty', 'ashleigh.doughty@msn.com', 'query', 'Reach millions of website owners fast. Simple, effective, and affordable. Visit https://marketingwithcontactforms.ink for details.'),
(565, 'Latta', 'dataentry756@outlook.com', 'Virtual Assistant', 'Hi, Accurate data management can save hours every week — and that’s exactly what I help with.\r\n\r\nServices include:\r\n• Manual & online data entry (PDFs, invoices, forms)\r\n• Product uploads (Shopify, WooCommerce, Amazon, Etsy)\r\n• Excel cleanup, formatting & consolidation\r\n• Web research, data collection & lead generation\r\n• Document conversion & organization\r\n• Report preparation & data analysis\r\n\r\nEvery task is handled with attention to detail and timely delivery.\r\n\r\nWould you like to begin with a small pilot project? If yes, please reply to Dataentry756@outlook.com'),
(566, 'mr. phillip Boser', 'phil9982@bestaitools.my', 'Need a Response', 'Can I get a copy of your service area map?'),
(567, 'Alejandra Munro', 'alejandra.munro@hotmail.com', 'Everyday Folks Are Making a Killing Passively Online USING THIS ONE TOOL!', 'SOFTWARE: New AI Cloud-Tool Quietly Turns Simple Ideas Into Passive Royalties....\r\n...No tech. No product. No audience. Just this one AI tool.\r\nhttps://www.novaai.expert/OhanashiGenAI\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321'),
(568, 'Abi', 'brandbuildingassistance@outlook.com', 'SEO Services Inquiry for Website Growth', 'Hello, I came across your website and wanted to reach out regarding SEO services. I specialize in result-driven SEO strategies focused on improving organic rankings, increasing traffic, and driving lead conversions.\r\n\r\nMy approach includes a complete website audit, on-page optimization, link building, and keyword strategy — all designed for sustainable, long-term visibility.\r\n\r\nIf you\'re open to enhancing your website’s search performance, I’d be happy to discuss a customized SEO plan aligned with your business goals.\r\n\r\nPlease let me know a convenient time for a quick call, or feel free to email me at Brandbuildingassistance@outlook.com to discuss further.'),
(569, 'Cecila Fitzgerald', 'fitzgerald.cecila@gmail.com', 'Hello afadbd.org Admin.', 'https://postyouradfree.top\r\nhttp://postyouradfree.top'),
(570, 'Victorina Lammon', 'victorina.lammon18@msn.com', 'Dear afadbd.org Administrator.', 'Feel free to visit my website for details: https://submissiontodirectory.top'),
(571, 'Lyle Deacon', 'deacon.lyle@gmail.com', 'Turn Your Curiosity Into Profit — Start Trading Risk-Free Today!', 'Want to try trading without any risk? Open a demo account on Pocket Option and get virtual funds to practice right now. Test your strategies, explore the market, and gain real experience with zero investment. '),
(572, 'NARETGR2004671NEYRTHYT', 'hqnyfuns@tacoblastmail.com', 'TOTYJTRT2004671TIRTYRTTR', 'MEKYUJTYJ2004671MAMYJRTH'),
(573, 'Ramon Stonor', 'stonor.ramon@gmail.com', 'Crazy-Simple Automated AI Process', 'We flipped the game on its head.\r\nWe give people what they want BEFORE they buy!?!?\r\nThe Money comes in for us 500 a pop all day every day!\r\n\r\nhttps://smartexperts.pro/500aPop\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://smartexperts.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321'),
(574, 'Ravi', 'businessgrowtogether@outlook.com', 'Personal Assistant', 'Are you looking for a personal assistant who can handle your daily business operations and make your life easier? I can help with tasks related to admin, marketing, gathering data from multiple websites, answering emails, website management, social media, content writing, planning new projects, bookkeeping, entering data into softwares, and back-office assistance. I have an Inhouse Content writer, social media specialist, Data Entry Operator, Website Developer and Bookkeeper. My costing varies from $8/hr to $30/hr depending on type of project and its complexity. \r\n\r\nIf you are interested, send me an email at Businessgrowtogether@outlook.com with a list of tasks you want to accomplish, and We can discuss our collaboration over a video call as per your convenience.'),
(575, 'Joanna Riggs', 'joannariggs83@gmail.com', 'Explainer Video for your website', 'Hi,\r\n\r\nI just visited afadbd.org and wondered if you\'ve ever considered an impactful video to advertise your business? Our videos can generate impressive results on both your website and across social media.\r\n\r\nOur videos cost just $195 (USD) for a 30 second video ($239 for 60 seconds) and include a full script, voice-over and video.\r\n\r\nI can show you some previous videos we\'ve done if you want me to send some over. Let me know if you\'re interested in seeing samples of our previous work.\r\n\r\nRegards,\r\nJoanna\r\n\r\nUnsubscribe: https://unsubscribe.video/unsubscribe.php?d=afadbd.org'),
(576, 'Ahmetswons', 'morrismi1@outlook.com', 'Introduce', 'I\'m Ahmet, a bank staff in a Turkish bank. I\'ve been looking for someone who has the same nationality as you. A citizen of your country died in the recent earthquake in Turkey, he had in our bank fixed deposit of $11.5 million. \r\n \r\nIf my bank executive finds out about his death ,They would use the funds for themselves, I would like to prevent that from happening only if I get your cooperation, I knew about it because I was his account manager. Last week my bank held a meeting for the purpose of a bank audit to note abandoned deposit accounts. that\'s why I\'m looking for a solution to deal with this situation because if my bank discovers his death, they will divert the funds to the board of directors.  I don\'t want that to happen. \r\n \r\nI request your cooperation to introduce you as the kin/heir of the account as you are of the same nationality as him.  There is no risk;  the transaction is carried out under a legal agreement that protects you from infringement. I suggest we split the funds, 60/40 and 40 for me. I need this fund for my daughter\'s surgery so keep this info confidential. email me so i can provide you with more info  ahmetassky@outlook.com.'),
(577, 'Zulma Brigham', 'brigham.zulma24@yahoo.com', '???', 'T5 Power naturally enhances testosterone for more muscle, better mood, sharper focus, and unstoppable energy. It’s the #1 way to reclaim your vitality—without risky drugs. '),
(578, 'Patrice Wexler', 'wexler.patrice@gmail.com', 'Earn Real Passive Royalty Income Month After Month With Proven $431.29 Results!', 'World\'s FIRST AI System That Creates PROFITABLE Amazon Books In Under 6 Minutes Across 25+ Niches\r\nhttps://goldsolutions.pro/RoyaltyProfitsAI\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321'),
(579, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hallo,   writing about your the price', 'Ciao, volevo sapere il tuo prezzo.'),
(580, 'phillip Aldridge', 'phil9982@bestaitools.my', 'Inquiry About Options', 'Do you offer any satisfaction guarantees?'),
(581, 'Mariam Blocker', 'mohamed.cortes.1977+afadbd.org@gmail.com', 'How To Turn SHORT, AI-GENERATED VIDEOS Into INCOME, FAST...', 'How Everyday People Are Turning \r\nFree AI Videos Into $500+ Days...\r\nWhile Chillin\' On Their Phone / Computer?\r\nhttps://smartexperts.pro/Vyralzz\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://smartexperts.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321'),
(582, 'Mike Sem Lefebvre', 'info@digital-x-press.com', 'Add AEO to your SEO strategies today !', 'Hi, \r\nI realize that many businesses have difficulties recognizing that SEO is a gradual process and a carefully organized monthly initiative. \r\n \r\nSadly, very few marketers have the dedication to recognize the incremental yet impactful results that can completely change their digital visibility. \r\n \r\nWith constant algorithm changes, a stable, continuous SEO strategy including Answer Engine Optimization (AEO) is essential for getting a strong return on investment. \r\n \r\nIf you recognize this as the right approach, partner with us! \r\n \r\nCheck out Our Monthly SEO Services https://www.digital-x-press.com/unbeatable-seo/ \r\n \r\nTalk to Us on Instant Messaging https://www.digital-x-press.com/whatsapp-us/ \r\n \r\nWe deliver unbeatable performance for your investment, and you will enjoy choosing us as your SEO partner. \r\n \r\nBest regards, \r\nDigital X SEO Experts \r\nPhone/WhatsApp: +1 (844) 754-1148'),
(583, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hello, i writing about your   prices', 'Sawubona, bengifuna ukwazi intengo yakho.'),
(584, 'Rene Angel', 'angel.rene@outlook.com', 'Access All The World’s Leading & Most Advanced Premium AIs', 'With Just 3 Clicks, You Will Be Able To Unlock All TOP AI Models with All Versions + All Upcoming Future Versions… Without Spending A Penny …\r\nhttps://1x-slots.site/MultiverseAI\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://1x-slots.site/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321'),
(585, 'LeeEtess', 'zekisuquc419@gmail.com', 'Hello,   write about   the prices', 'Sveiki, aš norėjau sužinoti jūsų kainą.'),
(586, 'AvaAdary8091', 'isabellagaica50823@hotmail.com', '\"Wild girl craves passion!\"', '\"Tempting tease longs for ecstasy.\"  Here  -- https://rb.gy/8rrwju?Anemeda'),
(587, 'Nelsonstoni', 'sdsdssfdsfdfdsfdsfdsfds@gmail.com', 'Free non-criminal independent blockchain antivirus', 'Free non-criminal independent blockchain antivirus \r\n \r\nBlockchain log. Make a blockchain record private - paid. \r\nBase - 50 mln signatures. Own hosting, own encrypted database. \r\nPayment method (exception Russia and ChIR) - non-criminal business plan, non-criminal scientific technology and private FASM code. \r\nOwn Blockchain Scientific Debt Gateway. 100% automatic. \r\n \r\nLink -  http://78.29.44.164/antivirus/ \r\n \r\n<a href=\"http://78.29.44.164/antivirus/\">http://78.29.44.164/antivirus/</a>'),
(588, 'Berenice', 'info@afadbd.org', 'Berenice Piper', 'Hey there \r\n\r\nI wanted to reach out and let you know about our new dog harness. It\'s really easy to put on and take off - in just 2 seconds - and it\'s personalized for each dog. \r\nPlus, we offer a lifetime warranty so you can be sure your pet is always safe and stylish.\r\n\r\nWe\'ve had a lot of success with it so far and I think your dog would love it. \r\n\r\nGet yours today with 50% OFF: https://caredogbest.com\r\n\r\nFREE Shipping - TODAY ONLY! \r\n\r\nRegards, \r\n\r\nBerenice'),
(589, 'RonaldDit', 'fdffffdfdfdfdfdd@gmail.com', 'Free PHP Blockchain Neural Network', 'Free PHP Blockchain Neural Network \r\n \r\nBlockchain log. Make a blockchain record private - paid. \r\nBase - 50 mln signatures. Own hosting, own encrypted database. Response time 0.05-0.1 sec. \r\nPayment method - non-criminal business plan, non-criminal scientific technology and private FASM code. \r\nOwn Blockchain Scientific Debt Gateway. 100% automatic. Send your question and receive the response file. \r\n \r\nLink -  http://78.29.44.164/phpneuralnetwork/ \r\n \r\n<a href=\"http://78.29.44.164/phpneuralnetwork/\">http://78.29.44.164/phpneuralnetwork/</a>'),
(590, 'Latashia', 'info@nevarez.bangeshop.com', 'Latashia Nevarez', 'Hello there, \r\n\r\nI hope you\'re doing well. I wanted to let you know about our new BANGE backpacks and sling bags that just released.\r\n\r\nBange is perfect for students, professionals and travelers. The backpacks and sling bags feature a built-in USB charging port, making it easy to charge your devices on the go.  Also they are waterproof and anti-theft design, making it ideal for carrying your valuables.\r\n\r\nBoth bags are made of durable and high-quality materials, and are perfect for everyday use or travel.\r\n\r\nOrder yours now at 50% OFF with FREE Shipping: http://bangeshop.com\r\n\r\nTo your success,\r\n\r\nLatashia'),
(591, 'Betsey Tyrrell', 'tyrrell.betsey@gmail.com', 'To the afadbd.org Webmaster.', 'https://postyouradfree.top\r\nhttp://postyouradfree.top'),
(592, 'Tony', 'hireresource009@outlook.com', 'Hire Team on Hourly Basis', 'Hi, We are a small business outsourcing agency with a team of more than 15 Team Members. \r\n\r\nWe help businesses manage their day-to-day tasks efficiently so they can focus on growth.\r\n\r\nHere are the tasks we can take care of for you:\r\n\r\nEmail management, Calendar scheduling, Data entry, CRM updates, Lead list creation, Online research, File management, Document preparation, Invoice creation, Payment follow-ups (email only), Social media posting, Reporting, Market research, Product listing (Shopify, WooCommerce, Amazon etc.), Ecommerce data entry, Order processing (backend), Inventory tracking, Google Sheets data entry, Google Sheets report maintenance, Sheet formatting & cleanup, Data sorting & filtering, Weekly/Monthly tracking sheets, PDF to Excel/Docs conversion, Data cleaning, Content writing, Content upload on website, SEO content support, SMO content support, Video editing, Web design backend updates (CMS tasks), Bookkeeping support, Product image uploading & optimization, Updating website pages, Blog posting & formatting, Ecommerce catalog management\r\n\r\nOur pricing starts from USD $8/hour to USD $40/hour, depending on the service and the specific requirements.\r\n\r\nTo build trust and ensure you are fully comfortable working with us:\r\n\r\n1. We are happy to work on a small pilot task/project first\r\n2. No advance payment required — pay only after you are satisfied\r\n3. We can share our portfolio and client references/testimonials on request\r\n4. ⁠You can test our quality, speed, and communication before committing to anything long-term\r\n\r\nIf you are interested, feel free to reply to me at: HireResource009@outlook.com'),
(593, 'Vana', 'bizassistance008@outlook.com', 'Experienced Bookkeeper', 'Hi, This is Vana, an experienced bookkeeper with more than a decade experience in bookkeeping for USA, UK, Canada, Europe and Australian Clients with expertise in:\r\n\r\nQuickBooks, Xero, Wave, FreshBooks, Sage, Zoho Books, MYOB, Kashoo, Tally, NetSuite, Odoo Accounting, Quicken, Microsoft Dynamics 365, ZipBooks, and FreeAgent.\r\n\r\nI can help you with:\r\n > Categorizing income and expense transactions accurately\r\n > Handling reconciliations for PayPal, Wise, Stripe, and business bank accounts\r\n > Maintaining clean and up-to-date financial records\r\n\r\nMy rate is USD 20 per hour.\r\n\r\nIf you’d like to discuss further, please reply to bizassistance008@outlook.com'),
(594, 'Eloy Leyva', 'eloy.leyva@msn.com', 'Still Struggling to Rank Your Google Business Profile?', 'Hey there,\r\n\r\nWe know how to help you dominate Google Maps.\r\nYou’ve probably noticed certain businesses always seem to appear first on Google. It’s not luck—it’s strategy. Every day your profile isn’t fully optimized, your competitors are capturing leads that could’ve been yours. Paige’s AI makes fixing that easy.\r\nThis simple but powerful system uncovers small technical and content gaps that make a huge difference in ranking. It’s not about spending more on ads—it’s about optimizing smarter. Paige gives you clear, actionable steps to get your business back in front of the customers who are already searching.\r\nDon’t let another potential customer scroll past your name. Run your scan now and start reclaiming your visibility. Visit https://merchynt.com/paige?fpr=paigepro\r\nLet’s outrank your competitors\r\n\r\n\r\n\r\nIn case you wish to stop getting further messages from this message, simply fill the form at bit. ly/fillunsubform with your domain address (URL).\r\nSchonwalder Allee 11, Mohawk, CA, USA, 94599'),
(595, 'Mike Eric Evans', 'mike@monkeydigital.co', 'Increase Your Website Traffic with Country-Specific Social Ads – Only $10 for 10K Visits!', 'Hi there, \r\n \r\nI wanted to reach out with something that could seriously help your website’s reach. We work with a trusted ad network that allows us to deliver real, location-based social ads traffic for just $10 per 10,000 visits. \r\n \r\nThis isn\'t fake traffic—it’s actual users, tailored to your preferred location and niche. \r\n \r\nWhat you get: \r\n \r\n10,000+ real visitors for just $10 \r\nGeo-targeted traffic for your chosen location \r\nHigher volumes available based on your needs \r\nTrusted by SEO experts—we even use this for our SEO clients! \r\n \r\nInterested? Check out the details here: \r\nhttps://www.monkeydigital.co/product/country-targeted-traffic/ \r\n \r\nOr chat with us on WhatsApp: \r\nhttps://monkeydigital.co/whatsapp-us/ \r\n \r\nLooking forward to getting you more traffic! \r\n \r\nBest, \r\nMike Eric Evans\r\n \r\nPhone/whatsapp: +1 (775) 314-7914'),
(596, 'Penny Kirkwood', 'kirkwood.penny@googlemail.com', 'Become the King of YouTube', 'This Invisible 10-Minute Faceless Video Hack\r\nPulled in 628,000+ Views…\r\nWith No Camera, No Gear & No Tech Skills\r\nhttps://443w.site/InvisibleTrafficSystem\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://443w.site/unsubscribe?domain=afadbd.org\r\nAddress: 108 West Street Comstock Park, MI 48721'),
(597, 'Lanny Boyce', 'lanny.boyce@gmail.com', 'To the afadbd.org Administrator!', 'You can explore my site here: http://sitesubmissionservice.top'),
(598, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hallo    writing about     prices', 'Szia, meg akartam tudni az árát.'),
(599, 'LeeEtess', 'zekisuquc419@gmail.com', 'Hello    writing about     price', 'Hola, quería saber tu precio..'),
(600, 'Philip Godoy', 'phil9982@bestaitools.my', 'Request for Info', 'Can I get a copy of your terms and conditions?'),
(601, 'AvaAdary6145', 'ameliagaica547430@hotmail.com', '\"Sexy vixen seeks thrill!\"', '\"Barely legal nymph wants to sin.\"  Here  --  https://rb.gy/8rrwju?Anemeda'),
(602, 'SimonEtess', 'dinanikolskaya99@gmail.com', 'Aloha,   wrote about     prices', 'Здравейте, исках да знам цената ви.'),
(603, 'LeeEtess', 'zekisuquc419@gmail.com', 'Hi  i writing about your the prices', 'Hola, quería saber tu precio..'),
(604, 'Wallace Jorgensen', 'wallace.jorgensen@yahoo.com', 'To the afadbd.org Webmaster.', 'Learn more on my website here: http://sitesubmissionservice.top'),
(605, 'Mike Olivier Brown', 'mike@monkeydigital.co', 'Collaboration Request', 'Hello, \r\n \r\nThis is Mike from Monkey Digital, \r\nI am reaching out to discuss a mutual business deal. \r\n \r\nHow would you like to show our banners on your website and redirect via your custom affiliate link towards popular services from our platform? \r\n \r\nThis way, you make a recurring 35% profit share, continuously from any sales that come in from your audience. \r\n \r\nThink about it, everyone need SEO, so this is a big opportunity. \r\n \r\nWe already have 12k+ affiliates and our payments are sent on time. \r\nRecently, we distributed a significant amount in affiliate earnings to our partners. \r\n \r\nIf this sounds good, kindly chat with us here: \r\nhttps://monkeydigital.co/affiliates-whatsapp/ \r\n \r\nOr sign up today: \r\nhttps://www.monkeydigital.co/join-our-affiliate-program/ \r\n \r\nCheers, \r\nMike Olivier Brown\r\n \r\nPhone/whatsapp: +1 (775) 314-7914'),
(606, 'Mike Julien Martinez', 'info@strictlydigital.net', 'Semrush links for afadbd.org', 'Hello, \r\n \r\nHaving some collection of links pointing to afadbd.org may result in 0 value or negative impact for your business. \r\n \r\nIt really doesn’t matter the total inbound links you have, what is crucial is the number of search terms those domains are optimized for. \r\n \r\nThat is the key element. \r\nNot the fake third-party metrics or SEO score. \r\nAnyone can manipulate those. \r\nBUT the volume of ranking keywords the domains that link to you have. \r\nThat’s what really matters. \r\n \r\nHave such links link to your domain and you will ROCK! \r\n \r\nWe are introducing this exclusive SEO package here: \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nNeed more details, or need more information, message us here: \r\nhttps://www.strictlydigital.net/whatsapp-us/ \r\n \r\nBest regards, \r\nMike Julien Martinez\r\n \r\nstrictlydigital.net \r\nPhone/WhatsApp: +1 (877) 566-3738'),
(607, 'Susannah Bock', 'bock.susannah62@gmail.com', 'Do you handle this in-house?', 'Here is my site: http://sitesubmissionservice.top'),
(608, 'Shelby Winchcombe', 'shelby.winchcombe@hotmail.com', 'questioning', 'Boost your exposure instantly. Targeted or random outreach—your choice. Visit contactformpromotion.com for details.'),
(609, 'Cliff Fine', 'mohamed.cortes.1977+afadbd.org@gmail.com', 'Full access to all AI models in one place', 'Multiverse AI - The Only Platform That Gives You Access To Every Top AI Model — In Every Version — All Inside A Single, Beautifully Simple Dashboard.\r\n\r\nhttps://1x-slots.site/MultiverseAI\r\n\r\nChatGPT (3.5 → 4.5 → 4o → 5 → Turbo → Nano)\r\nGemini (1.5 Pro → 2.0 Flash)\r\nClaude (3 Opus → Sonnet → Haiku)\r\nGrok (1 through 4)\r\nDALL·E, Veo, Kling, ElevenLabs, DeepSeek, FLUX, LLaMA & more\r\nAnd yes — you get every future version included automatically.\r\n\r\nhttps://1x-slots.site/MultiverseAI\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://1x-slots.site/unsubscribe?domain=afadbd.org\r\nAddress: 108 West Street Comstock Park, MI 48721'),
(610, 'GeorgeEtess', 'dinanikolskaya99@gmail.com', 'Hi    write about   the prices', 'Hej, jeg ønskede at kende din pris.'),
(611, 'Gertrude Reiner', 'reiner.gertrude69@hotmail.com', 'Hello afadbd.org Owner.', 'check out my new site here: http://sitesubmissionservice.top'),
(612, 'Niki', 'info@niki.bangeshop.com', 'Niki Schardt', 'Good Morning, \r\n\r\nI hope this email finds you well. I wanted to let you know about our new BANGE backpacks and sling bags that just released.\r\n\r\nThe bags are waterproof and anti-theft, and have a built-in USB cable that can recharge your phone while you\'re on the go.\r\n\r\nBoth bags are made of durable and high-quality materials, and are perfect for everyday use or travel.\r\n\r\nOrder yours now at 50% OFF with FREE Shipping: http://bangeshop.com\r\n\r\nRegards,\r\n\r\nNiki'),
(613, 'Summer Pound', 'pound.summer@googlemail.com', 'You\'re About To Step Into A $60 Billion Market... With Zero Competition', 'This Isn\'t A Course. It\'s A Fully Functional,\r\nDone-For-You Business... Powered Entirely By AI\r\n\r\nhttps://askthis.site/ConverslyAI\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://askthis.site/unsubscribe?domain=afadbd.org\r\nAddress: 108 West Street Comstock Park, MI 48721'),
(614, 'AvaAdary5781', 'ameliagaica858437@yahoo.com', '\"Wild girl craves passion!\"', '\"Gorgeous nymphomaniac yearns for release.\"  Here --  https://rb.gy/8rrwju?Anemeda'),
(615, 'philip Weinman', 'phil9982@bestaitools.my', 'Want to Make Sure', 'Can I get a copy of your COVID policy?'),
(616, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Aloha    writing about your   price for reseller', 'Γεια σου, ήθελα να μάθω την τιμή σας.'),
(617, 'Mike Simon Lefebvre', 'info@speed-seo.net', 'Find afadbd.org SEO Issues totally free', 'Hi, \r\nWorried about hidden SEO issues on your website? Let us help — completely free. \r\nRun a 100% free SEO check and discover the exact problems holding your site back from ranking higher on Google. \r\n \r\nRun Your Free SEO Check Now \r\nhttps://www.speed-seo.net/check-site-seo-score/ \r\n \r\nOr chat with us and our agent will run the report for you: https://www.speed-seo.net/whatsapp-with-us/ \r\n \r\nBest regards, \r\n \r\n \r\nMike Simon Lefebvre\r\n \r\nSpeed SEO Digital \r\nEmail: info@speed-seo.net \r\nPhone/WhatsApp: +1 (833) 454-8622'),
(618, 'Bertie Manton', 'bertie.manton@msn.com', 'Automate video creation — you grow faster', 'Hey, Bertie here from Letstok.\r\nI came across your store and noticed your product catalog — really great work.\r\nI’d love to offer you a way to instantly turn those product pages into video ads featuring real people.\r\nLetstok does it all automatically — just paste your product link and get a ready-to-post video.\r\nTry it free today and use SHOPIFY-10 for bonus tokens.\r\nhttps://bit.ly/LetstokAI\r\n\r\nStart creating a difference now!\r\n\r\n\r\nIf you no longer want to receive subsequent correspondence from this message, just fill the form at bit. ly/fillunsubform with your domain address (URL).\r\nVia Moiariello 132, Catskill, CA, USA, 90254'),
(619, 'Todd Swallow', 'todd.swallow76@outlook.com', 'Get the Best Proxy Deals — Hand-Picked for You', 'We monitor the entire proxy market and select only the most profitable offers — discounts, exclusive rates, and limited-time deals.\r\n\r\nConfirm your subscription and start receiving the best proxy offers straight to your inbox. No spam — only real savings.\r\n\r\nhttps://www.novaai.expert/proxy\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 108 West Street Comstock Park, MI 48721'),
(620, 'Theodore Stillwell', 'randy@expresscapitalcorp.com', 'Hey there', 'I’m reaching out from Express Capital — we’re a direct lender offering longer-term 12–18 month loans and real unsecured lines of credit with no credit check or documents to begin.\r\n\r\n\r\nAs an underwriter, I can tell you right over the phone what you qualify for without needing any documents upfront.\r\n\r\n\r\nLet me show you what your business qualifies for in less than a minute. Just reply YES and i\'ll share all the details.\r\n\r\nor visit reachoutcapital.com/offers and see your instant approval without speaking to anybody. \r\n\r\n\r\n— Randy\r\nSenior Underwriter'),
(621, '* * * $3,222 payment available! Confirm your transaction here: http://toyolift.com/?bve4ur * * * hs=d13784673f637677426b66b478044a25* ххх*', 'paouqua@mailbox.in.ua', 'hiehw9', 'z7g6j1'),
(622, '* * * <a href=\"http://toyolift.com/?bve4ur\">$3,222 deposit available</a> * * * hs=d13784673f637677426b66b478044a25* ххх*', 'paouqua@mailbox.in.ua', 'hiehw9', 'z7g6j1'),
(623, 'tomNuast', 'qdy58rl2@hotmail.com', 'I promised.', 'Photos for my escort application are uploaded.   \r\nLet me know if the quality is good.   \r\nPreview: https://tinyurl.com/675zfmm7'),
(624, 'Colby', 'colby@linsley.medicopostura.com', 'Colby Linsley', 'Good Morning \r\n\r\nLooking to improve your posture and live a healthier life? Our Medico Postura™ Body Posture Corrector is here to help!\r\n\r\nExperience instant posture improvement with Medico Postura™. This easy-to-use device can be worn anywhere, anytime – at home, work, or even while you sleep.\r\n\r\nMade from lightweight, breathable fabric, it ensures comfort all day long.\r\n\r\nGrab it today at a fantastic 60% OFF: https://medicopostura.com\r\n\r\nPlus, enjoy FREE shipping for today only!\r\n\r\nDon\'t miss out on this amazing deal. Get yours now and start transforming your posture!\r\n\r\nThank You, \r\n\r\nColby'),
(625, 'Lacy Breen', 'lacy.breen@msn.com', 'i have a question', 'Ever stop to think how much you\'re spending on marked-up CPMs for Connected TV ads?\r\nIf you\'re using “premium” audience segments without verifying who you\'re actually reaching, that money is likely feeding someone else\'s family.\r\nNo pressure. Here’s the site if you\'re open to see a revolutionary vision for digital advertising\r\ntopshelfaudience.com using real-time Intent data from an Integration in our platform to Lotame.com. You can reach me at marketing@mrmarketingres.com or 843-720-7301. And if this isn\'t a fit please feel free to email me and I\'ll be sure not to reach out again.  Thanks!'),
(626, 'phil Lahey', 'phil9982@bestaitools.my', 'Can You Check This', 'Is there a loyalty program?'),
(627, 'Davidcop', 'tyraartalley029598@gmail.com', 'Get an $80000 Transfer for Holiday Merriment', 'THANKSGIVING COMES WITH $80000 TO CELEBRATE TOGETHER http://pe2.isanook.com/ns/0/wb/i/url/3398242923849.blogspot.com%3F7373'),
(628, 'Davidcop', 'tyraartalley029598@gmail.com', 'Get an $80000 Transfer for Holiday Merriment', 'THANKSGIVING COMES WITH $80000 TO CELEBRATE TOGETHER http://pe2.isanook.com/ns/0/wb/i/url/3398242923849.blogspot.com%3F7373'),
(629, 'Davidcop', 'tyraartalley029598@gmail.com', 'Get an $80000 Transfer for Holiday Merriment', 'THANKSGIVING COMES WITH $80000 TO CELEBRATE TOGETHER http://pe2.isanook.com/ns/0/wb/i/url/3398242923849.blogspot.com%3F7373'),
(630, 'Davidcop', 'tyraartalley029598@gmail.com', 'Get an $80000 Transfer for Holiday Merriment', 'THANKSGIVING COMES WITH $80000 TO CELEBRATE TOGETHER http://pe2.isanook.com/ns/0/wb/i/url/3398242923849.blogspot.com%3F7373'),
(631, 'Davidcop', 'tyraartalley029598@gmail.com', 'Get an $80000 Transfer for Holiday Merriment', 'THANKSGIVING COMES WITH $80000 TO CELEBRATE TOGETHER http://pe2.isanook.com/ns/0/wb/i/url/3398242923849.blogspot.com%3F7373'),
(632, 'tomNuast', 'i9p6qgrh@yahoo.com', 'I promised.', 'Photos for my escort application are uploaded.   \r\nLet me know if the quality is good.   \r\nPreview: https://tinyurl.com/4j28rntc'),
(633, 'AvaAdary6959', 'emmagaica244929@gmail.com', 'Naked Vixen Needs To Share', 'Wicked temptress needs to expose her bare flesh. Here  --  https://rb.gy/8rrwju?Anemeda'),
(634, 'LeeEtess', 'zekisuquc419@gmail.com', 'Hello  i writing about your   price', 'Hi, მინდოდა ვიცოდე თქვენი ფასი.'),
(635, 'tomNuast', 'sqqeba34@yahoo.com', 'I promised.', 'Photos for my escort application are uploaded.   \r\nLet me know if the quality is good.   \r\nPreview: https://tinyurl.com/2a7vtt9f'),
(636, 'Gemma Marshall', 'gemma.marshall112@gmail.com', 'Instagram Growth: 300+ High Quality Followers Per Month', 'Hi there,\r\n\r\nWe run an Instagram growth service, which increases your number of followers both safely and practically. \r\n\r\n- Real, human followers: People follow you because they are interested in your business or niche.\r\n- Safe: All actions are made manually. We do not use any bots.\r\n- We can target followers via location, interests and demographics.\r\n- The price is just $60 per month, and we can start immediately.\r\n\r\nIf you\'d like to see some of our previous work, let me know, and we can discuss it further.\r\n\r\nKind Regards,\r\nGemma'),
(637, 'Lucretia Rhoads', 'lucretia.rhoads@yahoo.com', 'Stop Paying Massive Monthly Fees for Multiple AI Tools…', 'Replaces 25+ Expensive AI Subscriptions With ONE Smart AI Command Center\r\n\r\nhttps://ai108.online/TitanAI\r\n\r\nRun Your Entire Online Business:\r\nDesign, Write, Code, Market, Sell & Automate — All From One Platform.\r\nSave $6,000+/Year | No Monthly Fees | 0% Effort → 100% Profit\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://ai108.online/unsubscribe?domain=afadbd.org\r\nAddress: 108 West Street Comstock Park, MI 48721'),
(638, 'Davidcop', 'chidonpius@gmail.com', 'Take Action: Collect Your $118,345.89 Reward Today', 'DON\'T MISS YOUR SHOT: CLAIM $118,345.89 TODAY http://nuevo.redeletras.com/show.link.php?url=https%3A%2F%2F54334087665.blogspot.com%3F6942'),
(639, 'Davidcop', 'chidonpius@gmail.com', 'Take Action: Collect Your $118,345.89 Reward Today', 'DON\'T MISS YOUR SHOT: CLAIM $118,345.89 TODAY http://nuevo.redeletras.com/show.link.php?url=https%3A%2F%2F54334087665.blogspot.com%3F6942'),
(640, 'Davidcop', 'chidonpius@gmail.com', 'Take Action: Collect Your $118,345.89 Reward Today', 'DON\'T MISS YOUR SHOT: CLAIM $118,345.89 TODAY http://nuevo.redeletras.com/show.link.php?url=https%3A%2F%2F54334087665.blogspot.com%3F6942'),
(641, 'Davidcop', 'chidonpius@gmail.com', 'Take Action: Collect Your $118,345.89 Reward Today', 'DON\'T MISS YOUR SHOT: CLAIM $118,345.89 TODAY http://nuevo.redeletras.com/show.link.php?url=https%3A%2F%2F54334087665.blogspot.com%3F6942'),
(642, 'Davidcop', 'chidonpius@gmail.com', 'Take Action: Collect Your $118,345.89 Reward Today', 'DON\'T MISS YOUR SHOT: CLAIM $118,345.89 TODAY http://nuevo.redeletras.com/show.link.php?url=https%3A%2F%2F54334087665.blogspot.com%3F6942'),
(643, 'Carla Deuchar', 'carla.deuchar@gmail.com', '$1,240/Month on Amazon', 'A Short Book of Quotes Earns $1,240/Month on Amazon — Here’s How You Can Create a Book Like This With 308 Prompts\r\n\r\nhttp://egrntop.site/DailyWisdomBooks\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://egrntop.site/unsubscribe?domain=afadbd.org\r\nAddress: 108 West Street Comstock Park, MI 48721'),
(644, 'tomNuast', 'tzqug9i2@yahoo.com', 'I promised.', 'Photos for my escort application are uploaded.   \r\nLet me know if the quality is good.   \r\nPreview: https://tinyurl.com/49xansu7'),
(645, 'Dillon Bardon', 'bardon.dillon@gmail.com', 'Hello afadbd.org Owner.', 'You can view my full site here: http://sitesubmissionservice.top'),
(646, 'Abi', 'your.assistant23@outlook.com', 'Personal Assistant', 'Hello, Are you looking for a personal assistant who can handle your daily business operations and make your life easier? I can help with tasks related to: \r\n > Admin \r\n > Marketing \r\n > Gathering data from multiple websites \r\n > Answering emails \r\n > Website management \r\n > Social media \r\n > Content writing \r\n > Planning new projects \r\n > Bookkeeping \r\n > Entering data into softwares \r\n > Back-office assistance \r\n > Data Entry Operator \r\n\r\nIf you are interested, kindly revert me on Your.assistant23@outlook.com with list of tasks you want to accomplish, and we can discuss our collaboration over a video call as per your convenience.'),
(647, 'EmmaAdary7510', 'ameliagaica851895@hotmail.com', 'Naughty Lolita Wants To Flash', 'Wicked temptress needs to expose her bare flesh. Here  --   rb.gy/8rrwju?Adary'),
(648, 'Davidcop', 'marcelowelding@hotmail.com', 'Claim Your $118,345.89 Prize: Act Fast', 'DON\'T DELAY: GRAB YOUR $118,345.89 WINNINGS https://telegra.ph/Claim-your-11834589-cash-prize-12-01-50421?26103066'),
(649, 'Davidcop', 'marcelowelding@hotmail.com', 'Claim Your $118,345.89 Prize: Act Fast', 'DON\'T DELAY: GRAB YOUR $118,345.89 WINNINGS https://telegra.ph/Claim-your-11834589-cash-prize-12-01-50421?26103066'),
(650, 'Davidcop', 'marcelowelding@hotmail.com', 'Claim Your $118,345.89 Prize: Act Fast', 'DON\'T DELAY: GRAB YOUR $118,345.89 WINNINGS https://telegra.ph/Claim-your-11834589-cash-prize-12-01-50421?26103066'),
(651, 'Davidcop', 'marcelowelding@hotmail.com', 'Claim Your $118,345.89 Prize: Act Fast', 'DON\'T DELAY: GRAB YOUR $118,345.89 WINNINGS https://telegra.ph/Claim-your-11834589-cash-prize-12-01-50421?26103066'),
(652, 'Davidcop', 'marcelowelding@hotmail.com', 'Claim Your $118,345.89 Prize: Act Fast', 'DON\'T DELAY: GRAB YOUR $118,345.89 WINNINGS https://telegra.ph/Claim-your-11834589-cash-prize-12-01-50421?26103066'),
(653, 'Lena Harvard', 'joel.fox.1965+afadbd.org@gmail.com', 'PROFIT-READY EBOOKS with covers, TOC, chapters, sections, links, images, & content!', 'PROFIT-READY EBOOKS with covers, TOC, chapters, sections, links, images, & content!\r\n\r\nTHE FASTEST WAY TO CREATE, PUBLISH, & PROFIT FROM EBOOKS… NO WRITING REQUIRED\r\nhttps://bookmarket.expert/eBookWriterAI\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://bookmarket.expert/unsubscribe?domain=afadbd.org\r\nAddress: 108 West Street Comstock Park, MI 48721'),
(654, 'tomNuast', 'eonl4j7m@gmail.com', 'I promised.', 'Photos for my escort application are uploaded.   \r\nLet me know if the quality is good.   \r\nPreview: https://tinyurl.com/55ycmt8m'),
(655, 'Trista Justus', 'justus.trista@outlook.com', 'UNLIMITED DAILY TRAFFIC FOR JUST ONE SINGLE DOLLAR!', 'Get  FREE Traffic To ANY  URL​- get daily traffic every day\r\nNEW ROTATOR FOR THIS LAUNCH\r\nJust submit your links - JOB DONE!\r\nPermanent source that never runs dry\r\nNo Tech Skills Required\r\nWorks In ANY niche\r\nURLS will get traffic EVERY SINGLE DAY\r\nFast Movers will get BEST results...\r\n\r\nhttps://inshbaa.site/OneDollarUnlimitedTraffic\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://inshbaa.site/unsubscribe?domain=afadbd.org\r\nAddress: 108 West Street Comstock Park, MI 48721'),
(656, 'RobertEtess', 'dinanikolskaya99@gmail.com', 'Hello,   writing about your the price', 'Ola, quería saber o seu prezo.'),
(657, 'Sam', 'dataentry756@outlook.com', 'Virtual Assistant', 'Hi, Accurate data management can save hours every week — and that’s exactly what I help with.\r\n\r\nServices include:\r\n • Manual & online data entry (PDFs, invoices, forms)\r\n • Product uploads (Shopify, WooCommerce, Amazon, Etsy)\r\n • Excel cleanup, formatting & consolidation\r\n • Web research, data collection & lead generation\r\n • Document conversion & organization\r\n • Report preparation & data analysis\r\n\r\nEvery task is handled with attention to detail and timely delivery.\r\n\r\nWould you like to begin with a small pilot project? If yes, please reply to Dataentry756@outlook.com'),
(658, 'Anthony Odriscoll', 'anthony.odriscoll@yahoo.com', 'Faceless Channels are A Modern Day Gold Rush', 'Imagine launching a viral, faceless  YouTube, TikTok, or Instagram channel \r\nin just minutes...\r\n\r\nAnd Then Your new Channel  automatically Creates AND posts videos FOR YOU... So you NEVER HAVE TO TOUCH IT, AGAIN?\r\nhttps://www.novaai.expert/TrafficSupernova\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 108 West Street Comstock Park, MI 48721'),
(659, 'Linnea', 'linnea@linnea.bangeshop.com', 'Linnea Bilodeau', 'Hello, \r\n\r\nI hope this email finds you well. I wanted to let you know about our new BANGE backpacks and sling bags that just released.\r\n\r\nBange is perfect for students, professionals and travelers. The backpacks and sling bags feature a built-in USB charging port, making it easy to charge your devices on the go.  Also they are waterproof and anti-theft design, making it ideal for carrying your valuables.\r\n\r\nBoth bags are made of durable and high-quality materials, and are perfect for everyday use or travel.\r\n\r\nOrder yours now at 50% OFF with FREE Shipping: http://bangeshop.com\r\n\r\nBest regards,\r\n\r\nLinnea'),
(660, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hi    write about   the prices', 'Sveiki, aš norėjau sužinoti jūsų kainą.'),
(661, 'Steve Register', 'register.steve@gmail.com', 'Hello afadbd.org Admin!', 'check out my new site here: http://sitesubmissionservice.top'),
(662, 'Maurice Vanmeter', 'vanmeter.maurice@gmail.com', 'Ready to start creating professional trade images in the next 10 minutes?', 'Finally... A Dead-Simple Way To Create Professional Local Trade & Service Images Using Free AI, Without Design Skills, Expensive Software, Or Hiring Freelancers!\r\nhttps://java138.site/TradeyyAIApp\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://java138.site/unsubscribe?domain=afadbd.org\r\nAddress: 108 West Street Comstock Park, MI 48721'),
(663, 'tomNuast', 'rmbsneb9@hotmail.com', 'I promised.', 'Photos for my escort application are uploaded.   \r\nLet me know if the quality is good.   \r\nPreview: https://tinyurl.com/bdhxv5dy'),
(664, 'Mr. Phil Boston', 'phil9982@bestaitools.my', 'Support Needed', 'Do you offer any referral bonuses?'),
(665, 'Vai', 'bposervices1@outlook.com', 'Reliable VA Support to Streamline Your Daily Tasks', 'Hi, I help businesses reduce workload and save time by outsourcing their repetitive operational processes to a reliable Virtual Assistant.\r\n\r\nHere’s what I can handle:\r\n > Data entry and data migration between tools or software\r\n > Uploading product catalogs, price lists, or customer records\r\n > Managing spreadsheets, reports, and admin documentation\r\n > CRM updates, task tracking, and workflow maintenance\r\n > File conversion (PDF to Word/Excel), transcription, and formatting\r\n > Cleaning, sorting, and organizing large datasets\r\n > Managing contact databases and verifying email lists\r\n > Updating inventory records or backend systems\r\n > You get accuracy, fast turnaround, and dependable support — starting at just $10/hour.\r\n\r\nIf you\'d like to outsource some of your operational workload, feel free to reach out: Bposervices1@outlook.com'),
(666, 'Reed Plant', 'plant.reed@gmail.com', 'So Simple, It Feels Unfair', 'We\'re Getting New Followers In Different Niches That Keep Coming Back Every Day...\r\n\r\nhttps://liteminer.site/liteminer.site/HOOKD\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://liteminer.site/unsubscribe?domain=afadbd.org\r\nAddress: 108 West Street Comstock Park, MI 48721'),
(667, 'tomNuast', 'rhrzit2y@hotmail.com', 'I promised.', 'Photos for my escort application are uploaded.   \r\nLet me know if the quality is good.   \r\nPreview: https://tinyurl.com/34zmf7w5'),
(668, 'Mike Giinter Fischer', 'info@professionalseocleanup.com', 'Fix August Google Spam update ranking problems for free', 'Hi, \r\nWhile reviewing afadbd.org, we spotted toxic backlinks that could put your site at risk of a Google penalty. Especially that this Google SPAM update had a high impact in ranks. This is an easy and quick fix for you. Totally free of charge. No obligations. \r\n \r\nFix it now: \r\nhttps://www.professionalseocleanup.com/ \r\n \r\nNeed help or questions? Chat here: \r\nhttps://www.professionalseocleanup.com/whatsapp/ \r\n \r\nBest, \r\nMike Giinter Fischer\r\n \r\n+1 (855) 221-7591 \r\ninfo@professionalseocleanup.com'),
(669, 'SimonEtess', 'dinanikolskaya99@gmail.com', 'Aloha    write about   the price for reseller', 'Hi, მინდოდა ვიცოდე თქვენი ფასი.'),
(670, 'LeeEtess', 'zekisuquc419@gmail.com', 'Aloha  i am writing about your the prices', 'Szia, meg akartam tudni az árát.'),
(671, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hallo, i am wrote about   the price', 'Hi, kam dashur të di çmimin tuaj'),
(672, 'Carl Kirkhope', 'carl.kirkhope@gmail.com', 'Fantasy books for kids Are Exploding on Amazon', 'Fantasy is dominating multiple bestseller categories in the children’s book section on Amazon — and the Creative Writing, Story Starters, and Write-Your-Own-Story Books niche for ages 8–12 is growing faster than ever.\r\n\r\nIf you browse through “Children’s Activity Books,” “Creative Writing,” and “Imagination & Play,” you’ll see fantasy-themed story starter books consistently appearing on the first page — with both new and long-time authors releasing fresh titles every week. From “Write Your Own Fantasy Story” and “Kids Creative Writing Journal” to various “Build-A-Story Books,” the demand just keeps expanding.\r\n\r\nhttps://jyayintv5.site/FantasyStory\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://jyayintv5.site/unsubscribe?domain=afadbd.org\r\nAddress: 108 West Street Comstock Park, MI 48721'),
(673, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hello, i writing about your the price', 'Sveiki, aš norėjau sužinoti jūsų kainą.'),
(674, 'Julie Whiting', 'julie.whiting@msn.com', 'Hello afadbd.org Owner.', 'http://postyouradfree.top'),
(675, 'Latia Witmer', 'latia.witmer@gmail.com', 'You\'re About To Step Into A $60 Billion Market... With Zero Competition', 'This Isn\'t A Course. It\'s A Fully Functional,\r\nDone-For-You Business... Powered Entirely By AI\r\n\r\nhttps://letsjoker.site/ConverslyAI\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://letsjoker.site/unsubscribe?domain=afadbd.org\r\nAddress: 108 West Street Comstock Park, MI 48721'),
(676, 'Columbus Chelmsford', 'chelmsford.columbus@msn.com', 'Become the King of YouTube', 'This Invisible 10-Minute Faceless Video Hack\r\nPulled in 628,000+ Views…\r\nWith No Camera, No Gear & No Tech Skills\r\nhttps://lanyou.site/InvisibleTrafficSystem\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://lanyou.site/unsubscribe?domain=afadbd.org\r\nAddress: 108 West Street Comstock Park, MI 48721'),
(677, 'IsabellaAdary509', 'isabellagaica261240@gmail.com', 'Naughty Lolita Wants To Flash', 'Wicked temptress needs to expose her bare flesh. Here  --  https://rb.gy/8rrwju?Anemeda'),
(678, 'tomNuast', 'huybwkdv@yahoo.com', 'I promised.', 'Photos for my escort application are uploaded.   \r\nLet me know if the quality is good.   \r\nPreview: https://tinyurl.com/5n9aj6x6'),
(679, 'Tilly Beeton', 'beeton.tilly@gmail.com', 'No website, No skills, and No problems!', 'The Hidden Goldmine gets people in front of 5,000,000+ buyers that pay over and over again all while AI takes care of all of the “work”.\r\n\r\nhttps://lapse.site/TheHiddenGoldmine\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://lapse.site/unsubscribe?domain=afadbd.org\r\nAddress: 108 West Street Comstock Park, MI 48721'),
(680, 'Philip Tiller', 'phil9982@bestaitools.my', 'Want to Make Sure', 'Can I get a copy of your terms and conditions?'),
(681, 'Lucie Pratten', 'pratten.lucie@gmail.com', 'Create Stunning, Sellable Art', 'Build Your AI Coloring Book Empire\r\n\r\nThe AI Coloring Codex is the first complete system for creating endless, professional, and consistent coloring pages across 50+ styles — and selling them as your own.\r\n\r\nhttps://marketingways.ru/AIColoringCodeX\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://marketingways.ru/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321'),
(682, 'Abi', 'your.assistant23@outlook.com', 'Personal Assistant', 'Hello, Are you looking for a personal assistant who can handle your daily business operations and make your life easier? I can help with tasks related to: \r\n > Admin \r\n > Marketing \r\n > Gathering data from multiple websites \r\n > Answering emails \r\n > Website management \r\n > Social media \r\n > Content writing \r\n > Planning new projects \r\n > Bookkeeping \r\n > Entering data into softwares \r\n > Back-office assistance \r\n > Data Entry Operator \r\n\r\nIf you are interested, kindly revert me on Your.assistant23@outlook.com with list of tasks you want to accomplish, and we can discuss our collaboration over a video call as per your convenience.'),
(683, 'Taj Coyne', 'coyne.taj@outlook.com', 'Short message for the owner', 'Here is my site: http://postyouradfree.top'),
(684, 'Darren O\'Brien', 'joel.fox.1965+afadbd.org@gmail.com', 'OUR BEST VALUE TRAFFIC OFFER EVER!', 'DAILY TRAFFIC TO ANY URL FROM 3 X HIGH PERFORMING TRAFFIC SOURCES FOR JUST $1\r\nhttps://maswebmas.ru/OneDollarBlackFriday\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://maswebmas.ru/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321'),
(685, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Aloha, i wrote about your the price', 'Zdravo, htio sam znati vašu cijenu.'),
(686, 'Vana', 'bizassistance008@outlook.com', 'Experienced Bookkeeper', 'Hi, This is Vana, an experienced bookkeeper with more than a decade experience in bookkeeping for USA, UK, Canada, Europe and Australian Clients with expertise in:\r\n\r\nQuickBooks, Xero, Wave, FreshBooks, Sage, Zoho Books, MYOB, Kashoo, Tally, NetSuite, Odoo Accounting, Quicken, Microsoft Dynamics 365, ZipBooks, and FreeAgent.\r\n\r\nI can help you with:\r\n > Categorizing income and expense transactions accurately\r\n > Handling reconciliations for PayPal, Wise, Stripe, and business bank accounts\r\n > Maintaining clean and up-to-date financial records\r\n\r\nMy rate is USD 20 per hour.\r\n\r\nIf you’d like to discuss further, please reply to bizassistance008@outlook.com'),
(687, 'OliviaAdary3060', 'emmagaica889137@yahoo.com', '“Bold sensual woman seeking a pulse-racing thrill!”', '“Barely-legal seductress hungers for forbidden pleasure.”  Here  --   rb.gy/3fy54w?Adary'),
(688, 'Lawerence Haynie', 'haynie.lawerence@outlook.com', 'Stop Waiting for Traffic — One Click and APEX AI Puts You on Google’s Page One!', 'Hi,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWhy do you need this? So you can skip months of SEO and ad spend — all with just one click. APEX AI, powered by ChatGPT-5, instantly creates and ranks your content on Google’s first page—no domains, no skills, no costs. Just enter a keyword, click activate, and watch targeted, free traffic (and commissions!) roll in the very same day. It’s your fast-track to dominating the search results while others are still stuck in the old grind.\r\n\r\nSee it in action: https://smartexperts.pro/ApexAI?afadbd.org\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://smartexperts.pro/unsub?domain=afadbd.org \r\nAddress: Address: 1464 Lewis Street Roselle, IL 60177\r\nLooking out for you, Michael Turner.');
INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`) VALUES
(689, 'Abi', 'bposervices1@outlook.com', 'Outsource Repetitive Tasks – Reliable VA Support', 'Hi,\r\n\r\nI help businesses reduce workload and save time by outsourcing repetitive operational processes to a reliable Virtual Assistant. Here’s what I can handle:\r\n\r\n>  Data entry and migration between tools or software\r\n>  Uploading product catalogs, price lists, or customer data\r\n>  Managing spreadsheets, reports, and admin documentation\r\n>  Handling CRM updates and task tracking\r\n>  File conversion (PDF to Word/Excel), transcription & formatting\r\n>  Cleaning and organizing large datasets\r\n>  Managing contact databases and verifying email lists\r\n>  Updating inventory or backend systems\r\n\r\nYou get accuracy, speed, and reliable support—all starting at $10/hour.\r\n\r\nWould you like to outsource some of your operational workload?\r\n\r\nBest regards,\r\nAbi Singh\r\nBposervices1@outlook.com'),
(690, 'Rufus Menzies', 'menzies.rufus@gmail.com', 'Turn Select AI Tools Into One Profit-Machine', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org https://playoxwin.site/EveryAI?afadbd.org\r\n\r\nTired of paying for dozens of AI tools and bouncing between them for every project—from website copy to design to video ads? With EveryAI you get one dashboard that unlocks hundreds of premium AI models without monthly fees. Build sites, craft copy, generate logos, 8K motion videos, talking avatars… and keep 100% of your profit under a commercial license. Want to make more, work less, and finally control your income? It starts here.\r\n\r\nSee it in action: https://playoxwin.site/EveryAI?afadbd.org\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(691, 'Lin Matheson', 'matheson.lin@gmail.com', 'Get Free Google Traffic Fast — Even Without a Website!', 'Hi,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWhy you need this: to have every campaign, affiliate offer, or project start delivering traffic and income today — without spending a dime on ads or tech headaches. Ghost Pages turns you into a stealth engine that Google absolutely trusts: you build invisible pages using a secret Google asset, and they quietly start delivering targeted visitors — while your competition is nowhere the wiser.\r\n\r\nIt’s easy, it’s fast, it’s genius: no domains, hosting, social media, or technical skills required — if you can click and copy, you can do this. Plus, it really works and scales: launch one Ghost Page and BAM — traffic flows wherever you want: affiliate links, e‑com, leads — you choose. Ready to start in minutes? Discover how and get results that might blow your mind.\r\n\r\nSee it in action: https://pastelink.site/GhostPages\r\n\r\n\r\n\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://pastelink.site/unsub?domain=afadbd.org \r\nAddress: Address: 1464 Lewis Street Roselle, IL 60177\r\nLooking out for you, Michael Turner.'),
(692, 'Norris Braddon', 'braddon.norris51@hotmail.com', 'Double Your Revenue with Results With Kevin AI — More Results, Less Hustle', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org https://pozdravochek.site/KevinAI?afadbd.org\r\n\r\nImagine launching a campaign and seeing conversions rise within hours — without endless tweaking, without brainstorming until midnight. Results With Kevin AI delivers the set of AI tools + proven strategies that take over the busywork: crafting emails, scripts, content ideas and more. You just hit start — the system generates, tests, sells.\r\n\r\nWant to stop being stuck in the “I’m busy all day” loop and move into “I launch, I watch, I profit” mode? \r\n\r\nSee it in action: https://pozdravochek.site/KevinAI?afadbd.org\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://pozdravochek.site/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(693, 'Ted Byrum', 'byrum.ted@gmail.com', 'How to earn $2K–$10K per month — without creating your own product', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWhy you need this: imagine waking up to steady monthly income hitting your account—without the hassle of building your own product, funnels, or dealing with tech headaches. With Monthly Money Masterclass, you can pick the path that suits your style: let businesses self-serve QR codes or offer a full “done-for-you” service. You’ll earn $5–$20 per month per client with the self-serve model, or $200+ per month with just 5–10 clients—fast, simple, repeatable.\r\n\r\nFeel the confidence. You get a clear blueprint delivered by successful experts who\'ve generated millions online. This isn\'t fluff—it’s a step-by-step way to build real recurring income, even with zero experience. Ready to level up your money game? Click the link to discover how to start today.\r\n\r\nSee it in action: https://goldsolutions.pro/MMM?afadbd.org\r\n\r\n\r\n\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(694, 'Tonya Upjohn', 'upjohn.tonya74@gmail.com', 'Want extra income without stress?', 'Do you want to see how plug-and-play emails produce real earnings? Visit https://rb.gy/uxe0l2'),
(695, 'Emma Wilson', 'emma.wilson6162@gmail.com', 'Promote afadbd.org', 'Hi,\r\n\r\nI\'m writing to you today regarding your website, afadbd.org.\r\n\r\nWe specialise in two distinct areas of growth:\r\n\r\n1. Locally: By dominating Google search results in a specific area to attract more local foot traffic and phone calls.\r\n\r\n2. Globally: By leveraging our email marketing audience of over 30 million to drive traffic and sales on a massive scale.\r\n\r\nIf growing your audience is a priority right now, which of these is more relevant to your current goals?\r\n\r\nLet me know, and I can send over some more information.\r\n\r\nThanks for your time,\r\nEmma'),
(696, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hallo  i wrote about your   price for reseller', 'Hola, volia saber el seu preu.'),
(697, 'SimonEtess', 'dinanikolskaya99@gmail.com', 'Aloha  i write about your   prices', 'Ola, quería saber o seu prezo.'),
(698, 'LeeEtess', 'zekisuquc419@gmail.com', 'Aloha  i am writing about   the price', 'Hi, მინდოდა ვიცოდე თქვენი ფასი.'),
(699, 'Cleta', 'sales@coote.caredogbest.com', 'Cleta Coote', 'Hi there \r\n\r\nI wanted to reach out and let you know about our new dog harness. It\'s really easy to put on and take off - in just 2 seconds - and it\'s personalized for each dog. \r\nPlus, we offer a lifetime warranty so you can be sure your pet is always safe and stylish.\r\n\r\nWe\'ve had a lot of success with it so far and I think your dog would love it. \r\n\r\nGet yours today with 50% OFF: https://caredogbest.com\r\n\r\nFREE Shipping - TODAY ONLY! \r\n\r\nBest, \r\n\r\nCleta'),
(700, 'Gemma Marshall', 'gemmamarshall811@gmail.com', 'Instagram Growth Service', 'Hi,\r\n\r\nWe run an Instagram service, which grows your followers both safely and practically.\r\n\r\nBy engaging with real users based on their location, age, gender, and interests, we help you attract genuine followers who are truly interested in what you do.\r\n\r\nPlease find more information here:\r\n\r\nhttps://furtherinfo.info/instagram\r\n\r\nI\'d be happy to forward you some further information if that would be of interest?\r\n\r\nIf this isn\'t of interest you can either ignore this email or use the link further down.\r\n\r\nKind Regards,\r\nGemma\r\n\r\nhttps://unsubscribe.social/unsubscribe.php?d=afadbd.org'),
(701, 'Mike Stefan Gustafsson', 'info@digital-x-press.com', 'Add AEO to your SEO strategies today !', 'Hi, \r\nI recognize that some companies find it challenging understanding that organic ranking growth is a continuous effort and a strategically planned regular commitment. \r\n \r\nUnfortunately, very few businesses have the dedication to recognize the gradual yet significant improvements that can completely transform their digital visibility. \r\n \r\nWith constant algorithm changes, a consistent, long-term strategy including Answer Engine Optimization (AEO) is critical for achieving a profitable outcome. \r\n \r\nIf you see this as the ideal strategy, work with us! \r\n \r\nCheck out Our Monthly SEO Services https://www.digital-x-press.com/unbeatable-seo/ \r\n \r\nTalk to Us on Instant Messaging https://www.digital-x-press.com/whatsapp-us/ \r\n \r\nWe offer remarkable results for your budget, and you will enjoy choosing us as your growth partner. \r\n \r\nWarm regards, \r\nDigital X SEO Experts \r\nPhone/WhatsApp: +1 (844) 754-1148'),
(702, 'IsabellaAdary6354', 'isabellagaica73752@gmail.com', '“Untamed temptress longs for consuming desire!”', '“Barely-legal seductress hungers for forbidden pleasure.”  Here  --   rb.gy/3fy54w?Adary'),
(703, 'Stacie Urbina', 'joel.fox.1965+afadbd.org@gmail.com', 'Launch Your AI Store Today – No Design. No Code. Just Profit', 'Hi,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWhy do you need this? Imagine launching your own AI store on WordPress, stocked with ready-to-sell GPTs and AI prompts—and starting to make money today. No design headaches, no tech setup, just a polished storefront that builds trust and delivers real sales straight out of the box.\r\n\r\nWhether you\'re a webmaster or money-maker, AI Store Fortune removes the tech barrier. Made for people who’d rather grow their traffic and income than tinker with confusing plugins. Want to finally turn AI ideas into stable income? Click to see how effortlessly you can own—and profit from—your AI business.\r\n\r\nSee it in action: https://testaip.online/AIStoreFortune?afadbd.org\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://testaip.online/unsub?domain=afadbd.org \r\nAddress: Address: 1464 Lewis Street Roselle, IL 60177\r\nLooking out for you, Michael Turner.'),
(704, 'phillip Sipes', 'phil9982@bestaitools.my', 'Looking for Info', 'Do you offer maintenance plans?'),
(705, '* * * $3,222 deposit available! Confirm your transaction here: http://politecnicodelasamericas.com/?nl4er7 * * * hs=d13784673f637677426b66b478044a25* ххх*', 'ydx~nwa9pwyxz@mailbox.in.ua', 'pbbr4h', 'un6xp0'),
(706, '* * * <a href=\"http://politecnicodelasamericas.com/?nl4er7\">$3,222 credit available</a> * * * hs=d13784673f637677426b66b478044a25* ххх*', 'ydx~nwa9pwyxz@mailbox.in.ua', 'pbbr4h', 'un6xp0'),
(707, 'Vonnie Dadson', 'dadson.vonnie@yahoo.com', 'Write a Book in a Day—No Writing Skills Needed', 'Hi,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWhy should you care? Because Book In A Day lets you turn your ideas into a polished, professional book in just hours—not months. No writing skills, no expensive editors, no formatting headaches. Simply follow the AI-driven, step-by-step system and you’re done! Publish your book, build authority, and start earning—effortlessly, swiftly, and stress-free.\r\n\r\nSee it in action: https://yeira.site/BookInADay\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://yeira.site/unsub?domain=afadbd.org \r\nAddress: Address: 1464 Lewis Street Roselle, IL 60177\r\nLooking out for you, Michael Turner.'),
(708, 'Kimberly Anthon', 'anthon.kimberly@gmail.com', 'Discover the stealth traffic trick top affiliates don’t want you to know', 'Hi,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWhy do you need this? Picture waking up anywhere — Bali, a café in Paris, or your couch — checking your phone and seeing a steady stream of buyer-ready clicks rolling in… without ads, outreach, or a website. That’s exactly what Rapid Traffic Flow delivers: a super-simple, plug-and-play system that gets traffic and sales flowing in minutes.\r\n\r\nWith Rapid Traffic Flow, you get a clear 3-step blueprint, AI‑powered boosters to automate the process, a “Hidden Hub” you can tap at will, and a solid refund guarantee if your traffic spike doesn’t happen — all for less than the cost of your next takeout order. Ready to stop chasing traffic and start capturing it? Dive in now and dominate the affiliate game today!\r\n\r\nSee it in action: https://1fvyaq.site/RapidTrafficFlow\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://1fvyaq.site/unsub?domain=afadbd.org \r\nAddress: Address: 1464 Lewis Street Roselle, IL 60177\r\nLooking out for you, Michael Turner.'),
(709, 'Emerson Dacomb', 'mohamed.cortes.1977+afadbd.org@gmail.com', 'Create, Host and Sell Your Own Courses & Keep 100% Of The Profits..', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWorld’s First AI App That Instantly Builds Your Own “Udemy-Like” eLearning Platform - Preloaded With 100+ Ready-To-Sell, Red-Hot Online Courses\r\nIn One Single Dashboard, For A Low One-Time Fee!\r\nOnly 3 EASY Clicks - Create & Sell Stunning Online Courses on Your Own Udemy™-Style Platform to Hungry Buyers for Top Dollar.\r\n\r\nNo Reserach | No Course Creation | No Tech  Skills | No Monthly Fees Required\r\n\r\nSee it in action: https://udexi.site/CourseBeastAI\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://udexi.site/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker'),
(710, 'Robyn Brownell', 'robyn.brownell44@gmail.com', 'To the afadbd.org Administrator.', 'Submit your site for free traffic here: https://bit.ly/3KqNFFr'),
(711, 'Kate Armstrong', 'katearmstrong1976@gmail.com', 'Youtube Promotion: Grow your subscribers by 400+ each month', 'Hi there,\r\n\r\nWe run a YouTube growth service, which increases your number of subscribers both safely and practically.\r\n\r\n- We guarantee to gain you 400+ subscribers per month.\r\n- People subscribe because they are interested in your channel/videos, increasing likes, comments and interaction.\r\n- All actions are made manually by our team. We do not use any \'bots\'.\r\n\r\nThe price is just $90 (USD) per month, and we can start immediately.\r\n\r\nIf you have any questions, let me know, and we can discuss further.\r\n\r\nKind Regards,\r\nKate'),
(712, 'EmmaAdary5818', 'emmagaica96054@yahoo.com', '\"Insatiable vixen hungers for pleasure!\"', '  \r\n \"Exotic siren craves the thrill of forbidden temptation.\"  Here --  rb.gy/3fy54w?Adary'),
(713, 'Kelle Krome', 'kelle.krome46@gmail.com', 'any real humans here?', 'Ever stop to think how much you\'re spending on marked-up CPMs for Connected TV ads?\r\nIf you\'re using “premium” audience segments without verifying who you\'re actually reaching, that money is likely feeding someone else\'s family.\r\nNo pressure. Here’s the site if you\'re open to see a revolutionary vision for digital advertising\r\ntopshelfaudience.com using real-time Intent data from an Integration in our platform to Lotame.com. You can reach me at marketing@mrmarketingres.com or 843-720-7301. And if this isn\'t a fit please feel free to email me and I\'ll be sure not to reach out again.  Thanks!'),
(714, 'RobertEtess', 'dinanikolskaya99@gmail.com', 'Hello, i am wrote about     price', 'হাই, আমি আপনার মূল্য জানতে চেয়েছিলাম.'),
(715, 'LeeEtess', 'zekisuquc419@gmail.com', 'Hallo,   writing about   the price for reseller', 'Hola, volia saber el seu preu.'),
(716, 'Lorraine Barton', 'lorrainebartonseo@gmail.com', 'Boost Google rankings for afadbd.org', 'Hi,\r\n\r\nI\'ve just been looking at afadbd.org.\r\n\r\nYour content is solid, but the site’s Domain Authority (DA) could be higher to help you rank for competitive keywords.\r\n\r\nWe run a manual backlink service designed specifically to safe-boost your site\'s authority and search position.\r\n\r\nLet me know if you\'d like me to send over the pricing and package details.\r\n\r\nKind Regards,\r\nLorraine'),
(717, 'Pearl Rexford', 'pearl.rexford@outlook.com', 'Making Us $575- $1895 Daily', 'World\'s First AI App That Lets You...\r\nBuild Funnels Inside Reels, Shorts & TikToks\r\nThat Capture Leads, Clicks & Sales\r\nWithout Pages, Funnel Builders Or Tech\r\n100% Done For You By AI\r\nhttps://optimalconvert.site/VideoFunnelsAI\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://optimalconvert.site/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321'),
(718, 'Lavern Shearer', 'shearer.lavern@googlemail.com', 'Buyer traffic in 10 minutes? A plug-and-play hack just for you', 'Hi,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWhy you need this: If you’re a webmaster or money-making pro looking for real buyer traffic — with zero websites, no content creation, and no tech headaches — then Social Safe List is your shortcut. Get instant access to private buyer-filled communities, drop in your link, post, and watch traffic roll in. Friendly setup, ready-made templates, proven strategies — it just works.\r\n\r\nCurious how you can get clicks from real buyers in 10 minutes?\r\n\r\nSee it in action: https://sovoc-seeds.site/SocialSafeList?afadbd.org\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://sovoc-seeds.site/unsub?domain=afadbd.org \r\nAddress: Address: 1464 Lewis Street Roselle, IL 60177\r\nLooking out for you, Michael Turner.'),
(719, 'Lizzie Bryan', 'lizzie.bryan@msn.com', 'The Faith Market Is Huge... and Almost Untapped', 'Start Building a Christian Publishing Empire — No Writing Needed\r\nEven if you\'ve never written a book… or designed a single page in your life. With FaithVault 500, you get a done-for-you library of faith-based eBooks you can own, sell, and share forever.\r\nhttps://ngmsrv.site/FaithVault\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://ngmsrv.site/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321'),
(720, 'Rod Malizia', 'rod.malizia@gmail.com', 'Launch Your AI Store Today – No Design. No Code. Just Profit', 'Hi,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWhy do you need this? Imagine launching your own AI store on WordPress, stocked with ready-to-sell GPTs and AI prompts—and starting to make money today. No design headaches, no tech setup, just a polished storefront that builds trust and delivers real sales straight out of the box.\r\n\r\nWhether you\'re a webmaster or money-maker, AI Store Fortune removes the tech barrier. Made for people who’d rather grow their traffic and income than tinker with confusing plugins. Want to finally turn AI ideas into stable income? Click to see how effortlessly you can own—and profit from—your AI business.\r\n\r\nSee it in action: https://mp3-juice.site/AIStoreFortune\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://mp3-juice.site/unsub?domain=afadbd.org \r\nAddress: Address: 1464 Lewis Street Roselle, IL 60177\r\nLooking out for you, Michael Turner.'),
(721, 'GeorgeEtess', 'dinanikolskaya99@gmail.com', 'Hi  i wrote about your the prices', 'Hola, volia saber el seu preu.'),
(722, 'Chang Peralta', 'chang.peralta@gmail.com', 'Forget Funnels. Meet Video Funnels.', 'World\'s First AI App That Lets You...\r\nBuild Funnels Inside Reels, Shorts & TikToks\r\nThat Capture Leads, Clicks & Sales\r\nWithout Pages, Funnel Builders Or Tech\r\n100% Done For You By AI\r\nMaking Us $575- $1895 Daily\r\nInstantly adds sales forms, affiliate buy links, CTA buttons & offer overlays\r\ninside any video Turning viewers into paying customers and commissions on autopilot \r\n\r\nhttps://icsolutions.site/VideoFunnelsAI?afadbd.org\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou received this notification \r\nas we think \r\nthis offer \r\ncould be useful to you.\r\n\r\nIf you no longer wish to get \r\nfurther communications from us, \r\nplease click here to \r\nunsubscribe:\r\n\r\nhttps://icsolutions.site/unsub?domain=afadbd.org \r\nAddress: Address: 3685   Kornquaderweg 142, NA  9411\r\nLooking out for you, Chang Peralta.'),
(723, 'Mike Horst Hoffmann', 'mike@monkeydigital.co', 'Collaboration Request', 'Hi, \r\n \r\nThis is Mike from Monkey Digital, \r\nI am contacting you to discuss a exciting business deal. \r\n \r\nHow would you like to feature our ads on your site and redirect via your unique tracking link towards hot-selling SEO solutions from our business? \r\n \r\nThis way, you receive a solid 35% residual income, month after month from any sales that are made from your site. \r\n \r\nThink about it, most website owners benefit from SEO, so this is a huge opportunity. \r\n \r\nWe already have over 12,000 affiliates and our commissions are processed on time. \r\nLast month, we reached over $27,000 in commissions to our promoters. \r\n \r\nIf you want in, kindly message us here: \r\nhttps://monkeydigital.co/affiliates-whatsapp/ \r\n \r\nOr sign up today: \r\nhttps://www.monkeydigital.co/join-our-affiliate-program/ \r\n \r\nBest Regards, \r\nMike Horst Hoffmann\r\n \r\nPhone/whatsapp: +1 (775) 314-7914'),
(724, 'Larue Early', 'larue.early@gmail.com', 'Rate|Daily Operations Made Easier With a $250 VA|A Full-Time VA Without Full-Time', 'Hello,\r\n\r\nInstead of\r\nhiring locally at high rates, you can outsource your digital marketing workload to a dedicated\r\nassistant for $250/month. They handle SEO, ads, emails, social media, and admin tasks—full\r\ntime.\r\nYour first month is 100% free.\r\nFill out the form to proceed.\r\n\r\nDirect Google link:\r\nhttps://docs.google.com/forms/d/e/1FAIpQLSc0j7_PYJOBpCDJqJEYWDUYRLFuf0fN596h51an\r\nA8k8Me0efA/viewform?usp=header\r\nGLE Link to Google Forms: https://forms.gle/4uj4nBHTiJVQooFA8\r\nShort link: https://shorturl.at/o4IYf'),
(725, 'Caleb Blocker', 'blocker.caleb@msn.com', 'Revolutionary AI Platform That', 'Replaces 25+ Expensive AI Subscriptions\r\nWith ONE Smart AI Command Center\r\nRun Your Entire Online Business:\r\nDesign, Write, Code, Market, Sell & Automate — All From One Platform.\r\n Save $6,000+/Year |  No Monthly Fees |  0% Effort → 100% Profit\r\n\r\nhttps://iontv.site/AITitan?afadbd.org\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message \r\nas we believe \r\nthis offer \r\nmay interest you.\r\n\r\nIf you would prefer not to receive \r\nadditional emails from us, \r\nsimply \r\nstop receiving emails:\r\n\r\nhttps://iontv.site/unsub?domain=afadbd.org \r\nAddress: Address: 7795   67 Boulevard De La Liberation, CENTRE  13012\r\nLooking out for you, Caleb Blocker.'),
(726, 'Mike Markus Simonson', 'mike@monkeydigital.co', 'Increase Your Website Traffic with Geo-Targeted Social Ads – Only $10 for 10K Visits!', 'Hello, \r\n \r\nI wanted to connect with something that could seriously improve your website’s reach. We work with a trusted ad network that allows us to deliver real, geo-targeted social ads traffic for just $10 per 10,000 visits. \r\n \r\nThis isn\'t fake traffic—it’s actual users, tailored to your target country and niche. \r\n \r\nWhat you get: \r\n \r\n10,000+ genuine visitors for just $10 \r\nLocalized traffic for multiple regions \r\nHigher volumes available based on your needs \r\nTrusted by SEO experts—we even use this for our SEO clients! \r\n \r\nWant to give it a try? Check out the details here: \r\nhttps://www.monkeydigital.co/product/country-targeted-traffic/ \r\n \r\nOr connect instantly on WhatsApp: \r\nhttps://monkeydigital.co/whatsapp-us/ \r\n \r\nLooking forward to working with you! \r\n \r\nBest, \r\nMike Markus Simonson\r\n \r\nPhone/whatsapp: +1 (775) 314-7914'),
(727, 'Luke Glover', 'luke.glover@gmail.com', 'List Building Jumpstart', 'List Building Jumpstart: The Ready-Made List Building \"Business In A Box\" With Full Private Label Rights!\r\nJust Add Your Name, Change Your Payment Links, And Keep 100% Of The Profits!\r\n\r\n\r\nhttps://mydiba.site/ListBuildingJumpstart?afadbd.org\r\n\r\n\r\n\r\nYou are getting this email \r\nbecause we believe \r\nwhat we’re offering \r\ncould be useful to you.\r\n\r\nIf you do not wish to receive \r\nfurther communications from us, \r\nsimply \r\nunsubscribe:\r\n\r\nhttps://mydiba.site/unsub?domain=afadbd.org \r\nAddress: Address: 1533   70 Chemin Challet, CENTRE  62800\r\nLooking out for you, Luke Glover.'),
(728, 'Jewell Hervey', 'joel.fox.1965+afadbd.org@gmail.com', 'Ready Made Business Package', 'Instantly Create Full Product Reviews, Descriptions, Bullets, SM Content, Hashtags, Emails & Sell Your Own Software - In Minutes \r\n- Even If You’re A Complete Beginner.\r\n\r\n\r\nhttps://huntfish.site/1CReviewBuilder?afadbd.org\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou’re receiving this email \r\nbecause we believe \r\nour offer \r\nmight be of interest to you.\r\n\r\nIf you do not wish to receive \r\nany more messages from us, \r\nplease click here to \r\nopt out:\r\n\r\nhttps://huntfish.site/unsub?domain=afadbd.org \r\nAddress: Address: 8526   39 Place Du Jeu De Paume, CENTRE  91270\r\nLooking out for you, Jewell Hervey.'),
(729, 'Mike Sven-Erik Olsen', 'info@strictlydigital.net', 'Semrush links for afadbd.org', 'Hello, \r\n \r\nReceiving some set of links linking to afadbd.org may result in zero worth or harmful results for your website. \r\n \r\nIt really isn’t important the total external links you have, what matters is the number of search terms those platforms are optimized for. \r\n \r\nThat is the most important element. \r\nNot the overrated Domain Authority or Domain Rating. \r\nAnyone can manipulate those. \r\nBUT the volume of Google-ranked terms the domains that link to you contain. \r\nThat’s it. \r\n \r\nMake sure these backlinks point to your website and you will ROCK! \r\n \r\nWe are introducing this special service here: \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nIn doubt, or want to know more, chat with us here: \r\nhttps://www.strictlydigital.net/whatsapp-us/ \r\n \r\nSincerely, \r\nMike Sven-Erik Olsen\r\n \r\nstrictlydigital.net \r\nPhone/WhatsApp: +1 (877) 566-3738'),
(730, 'Craig', 'sales@wyatt.tidbuy.com', 'Craig Wyatt', 'Hello \r\n \r\nIs your dog\'s nails getting too long? If you\'re tired of going to the vet or groomer to get them trimmed, why not try PawSafer™? \r\nWith PawSafer™, you can trim your dog\'s nails from the comfort of your own home, and it only takes a few minutes!\r\n\r\nPawSafer™ is the safest and most convenient way to trim your dog\'s nails, and it\'s very affordable. \r\n\r\nGet it while it\'s still 50% OFF + FREE Shipping\r\n\r\nBuy here: https://tidbuy.com\r\n \r\nHave a great time, \r\n \r\nCraig'),
(731, 'OliviaAdary4134', 'emmagaica612274@hotmail.com', '\"Naughty temptress craves intimate connection!\"', '  \r\n \"Erotic minx desires to explore her carnal desires.\"  Here  -- https://rb.gy/3fy54w?Anemeda'),
(732, 'Bailey Labilliere', 'bailey.labilliere@msn.com', 'Run Your Business at Warp Speed', 'AI Turbo Creator turns ideas into traffic magnets.\r\nMake your creations visible, compelling, and unforgettable.\r\n\r\n\r\nhttps://lnunquedays.site/AITurboCreator?afadbd.org\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou’re receiving this email \r\nas we believe \r\nthe offer we provide \r\nmay interest you.\r\n\r\nIf you no longer wish to get \r\nfurther communications from us, \r\nplease click here to \r\nstop receiving emails:\r\n\r\nhttps://lnunquedays.site/unsub?domain=afadbd.org \r\nAddress: Address: 4773   Austurstraeti 53, NA  109\r\nLooking out for you, Bailey Labilliere.'),
(733, 'GeorgeEtess', 'dinanikolskaya99@gmail.com', 'Hi  i write about     price for reseller', 'Sveiki, aš norėjau sužinoti jūsų kainą.'),
(734, 'Dee Martens', 'dee.martens@msn.com', 'Your AI Hero Understands You & Acts Fast', 'GET INSTANT AI POWERED COURSE CREATION, MARKETING STRATEGIES, AND COMPELLING CONTENT THAT ADAPTS TO YOUR EXACT NEEDS - ALL AT SUPERHERO SPEED!\r\n\r\n\r\nhttps://lordvpn.site/HeroCommandersAI?afadbd.org\r\n\r\n\r\nYour Course Creation Superhero That Delivers Exactly What You Want, Instantly - Even If You\'re A Complete Newbie!\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou received this notification \r\nas we think \r\nthis offer \r\ncould be useful to you.\r\n\r\nIf you do not wish to receive \r\nany more messages from us, \r\nsimply \r\nunsubscribe from these emails:\r\n\r\nhttps://lordvpn.site/unsub?domain=afadbd.org \r\nAddress: Address: 6892   Alsterkrugchaussee 37, BY  91192\r\nLooking out for you, Dee Martens.'),
(735, 'Ricardo Borovansky', 'ricardo.borovansky@yahoo.com', 'attention', 'Attention: If this interests you, \r\nThe $100 wealth solution. \r\nhttp://worldwidebytnex.com'),
(736, 'Brittany Hockman', 'hockman.brittany@gmail.com', ')', '“Joy to world; the Lord is come; \r\nLet Earth receive her King;\r\nLet ev’ry heart prepare him room,\r\nAnd heav’n and nature sing. “\r\n \r\n“For to us a child is born, to us a son is given; and the government shall be upon his shoulder, and his name shall be called Wonderful Counselor, Mighty God, Everlasting Father, Prince of Peace.” Isaiah 9:6\r\nFor the full Christmas Message, please see in the Bible Matthew Chapter 1, Luke Chapter 2. \r\n \r\n \r\n\r\nA silent night, a star above & a baby in a manger: a blessed gift of hope & love. Christmas blessings & peace to you and yours, throughout the Christmas season and the New Year.\r\n \r\n\r\n\r\n“Silent night, holy night,\r\nAll is calm, all is bright\r\nRound yon virgin mother and child!\r\nHoly Infant so tender and mild,\r\nSleep in heavenly peace,\r\nSleep in heavely peace.”\r\n\r\nFrom: 4U2IncFSBO.com'),
(737, 'Jayrn Smith', 'jerri.barger@gmail.com', 'afadbd.org: Most sites get this wrong when monetizing', 'Hi, it’s Jayrn.\r\n\r\nIf your site already uses — or is preparing to use — affiliate links, this will be relevant.\r\n\r\nOne issue I see constantly is that monetization is treated as something you “add later,” instead of something that’s designed into the site from the beginning.\r\n\r\nThat usually leads to:\r\nrandom placement of links\r\nunclear visitor intent\r\nunpredictable income\r\n\r\nIt works, but never consistently.\r\n\r\nI put together a short explanation of why this happens and what changes once monetization is structured properly:\r\n\r\nhttps://marketersmentor.com/recurring-income-system.php?refer=afadbd.org\r\n\r\nYou’ll know quickly whether this applies to your situation.\r\n\r\nJayrn\r\n\r\n\r\n\r\nPS: And one quick note so you’re not wondering why you’re hearing from me:\r\nI only reach out to website owners because they’re the ones actively building something online. I’m not blasting random emails. \r\nI’m simply sharing a resource that has been helping a lot of people create predictable online income. If it resonates, great. If not, no worries.\r\n\r\n\r\n\r\n\r\nUnsubscribe: \r\nhttps://marketersmentor.com/unsubscribe.php?d=afadbd.org'),
(738, 'Abbey Holtze', 'holtze.abbey@googlemail.com', 'Discover how website owners get more from current visitors to boost site performance', 'If you manage your own site, you don’t require unnecessary steps — the real goal is better results. \r\n\r\nThis approach was created to allow you get greater benefit from your visitors you currently receive, without technical overload or technical stress. \r\n\r\nIt’s designed for site owners who think strategically: fewer repetitive actions, better oversight, and measurable enhancements in day-to-day results. \r\n\r\nExplore further and learn why more and more people with websites view this as a smart upgrade for their digital setup.\r\n\r\nhttps://ndvrpfnc9nyb7ebr.site/AITitan?afadbd.org\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message \r\nas we believe \r\nthis offer \r\nmay interest you.\r\n\r\nIf you would prefer not to receive \r\nfurther communications from us, \r\nplease click here to \r\nstop receiving emails:\r\n\r\nhttps://ndvrpfnc9nyb7ebr.site/unsub?domain=afadbd.org \r\nAddress: Address: 5497   30 Burnley Street, SA  5172\r\nLooking out for you, Abbey Holtze.'),
(739, 'Marion Delacruz', 'delacruz.marion@gmail.com', 'Convert Ideas into Finished Digital books within a few steps — No need for Doing the writing yourself', 'Think about this: you were able to prepare polished electronic publications for sharing within just a few steps — without writing a single word on your own. Through EbookWriter you just add the subject then right away receive a ready-formatted eBook including chapters, visuals, and downloadable files.\r\n\r\nhttps://vespa777g.site/eBookWriterAI?afadbd.org\r\n\r\nThis is far from simply one more text editor — it serves as a smart solution designed for website builders and online creators: create useful products which assist in list growth, add external links, or share them on popular platforms such as Amazon — while the service handles the technical side. Forget extended content creation cycles and extra external help.\r\n\r\nhttps://vespa777g.site/eBookWriterAI?afadbd.org\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message \r\nsince we believe \r\nthe offer we provide \r\nmay be relevant to you.\r\n\r\nIf you no longer wish to get \r\nadditional emails from us, \r\nsimply \r\nunsubscribe from these emails:\r\n\r\nhttps://vespa777g.site/unsub?domain=afadbd.org \r\nAddress: Address: 4043   57 Rue Grande Fusterie, RHONE-ALPES  69500\r\nLooking out for you, Marion Delacruz.'),
(740, 'AmeliaAdary8345', 'oliviagaica664640@yahoo.com', '\"Naughty temptress craves intimate connection!\"', '  \r\n \"Erotic minx desires to explore her carnal desires.\"  Here  -- rb.gy/3fy54w?Adary'),
(741, 'Mike Jules Wilson', 'info@speed-seo.net', 'Find afadbd.org SEO Issues totally free', 'Hi, \r\nWorried about hidden SEO issues on your website? Let us help — completely free. \r\nRun a 100% free SEO check and discover the exact problems holding your site back from ranking higher on Google. \r\n \r\nRun Your Free SEO Check Now \r\nhttps://www.speed-seo.net/check-site-seo-score/ \r\n \r\nOr chat with us and our agent will run the report for you: https://www.speed-seo.net/whatsapp-with-us/ \r\n \r\nBest regards, \r\n \r\n \r\nMike Jules Wilson\r\n \r\nSpeed SEO Digital \r\nEmail: info@speed-seo.net \r\nPhone/WhatsApp: +1 (833) 454-8622'),
(742, 'Gemma Marshall', 'gemmamarshall811@gmail.com', 'Targeted Instagram growth for afadbd.org', 'Hi,\r\n\r\nAre you looking to grow your Instagram audience (or perhaps launch a new page)?\r\n\r\nWe run a manual Instagram service that acts as your dedicated assistant. We can build your profile from scratch or grow your existing account by 300+ real followers a month.\r\n\r\nAll work is done manually on real phones—no bots—starting at just $60/month.\r\n\r\nMind if I send over the details?\r\n\r\nKind Regards,\r\nGemma\r\n\r\nhttps://unsubscribe.social/unsubscribe.php?d=afadbd.org'),
(743, 'Kayleigh', 'sales@afadbd.org', 'Kayleigh Hardacre', 'Hey there \r\n\r\nLooking to improve your posture and live a healthier life? Our Medico Postura™ Body Posture Corrector is here to help!\r\n\r\nExperience instant posture improvement with Medico Postura™. This easy-to-use device can be worn anywhere, anytime – at home, work, or even while you sleep.\r\n\r\nMade from lightweight, breathable fabric, it ensures comfort all day long.\r\n\r\nGrab it today at a fantastic 60% OFF: https://medicopostura.com\r\n\r\nPlus, enjoy FREE shipping for today only!\r\n\r\nDon\'t miss out on this amazing deal. Get yours now and start transforming your posture!\r\n\r\nEnjoy, \r\n\r\nKayleigh'),
(744, 'Jessie Neal', 'jessie.neal@googlemail.com', 'Convert AI ideas to create real income — relaxing illustration sets launched with ease', 'Want to avoid overused markets and time-consuming content creation? 342 prompts for relaxing creative books delivers a {complete|ready|fully prepared|wel\r\n\r\nhttps://5sq4ek.site/CozyColoringBooks?afadbd.org\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n{You are receiving this message|You’re receiving this email|This message is sent to you|You received this notification|You are getting this email} \r\n{because we believe|because we think|as we believe|as we think|since we believe|since we think} \r\n{our offer|this offer|the offer we provide|what we’re offering} \r\n{may be relevant to you|could be relevant to you|might be of interest to you|may interest you|could be useful to you}.\r\n\r\n{If you do not wish to receive|If you don’t want to receive|If you would prefer not to receive|If you no longer wish to get} \r\n{further communications from us|future messages from us|additional emails from us|any more messages from us}, \r\n{please click here to|you can|simply} \r\n{unsubscribe|opt out|unsubscribe from these emails|stop receiving emails}:\r\n\r\nhttps://5sq4ek.site/unsub?domain=afadbd.org \r\nAddress: Address: 3720   Fugger Strasse 7, BB  14469\r\nLooking out for you, Jessie Neal.'),
(745, 'EmmaAdary248', 'emmagaica298212@hotmail.com', '\"Desperate for intimacy now!\"', '  \r\n \"Carnal temptress demands irresistible passion.\"  Here  -- https://girlsfun.short.gy/UbzVKx?Anemeda'),
(746, 'Niki Tweddle', 'tweddle.niki@msn.com', 'The Old Way of Making Money Online is DEAD', 'Achieve More With Less Effort: Discover 10 Step-by-Step Strategies to Transform Free AI Tools Like ChatGPT Into Practical Business Skills, Even If You\'re a Complete Beginner!\r\n\r\nhttps://absoliut.site/AIProfitBlueprint?afadbd.org\r\n\r\nPure actionable content. These proven AI strategies are designed to be implemented fast - if you can follow simple instructions, you can start applying professional AI techniques this week. Perfect for entrepreneurs, freelancers, content creators, and anyone ready to transform how they use AI.\r\n\r\nhttps://absoliut.site/AIProfitBlueprint?afadbd.org\r\n\r\n\r\nYou received this notification \r\nbecause we think \r\nour offer \r\ncould be relevant to you.\r\n\r\nIf you would prefer not to receive \r\nfuture messages from us, \r\nyou can \r\nunsubscribe:\r\n\r\nhttps://absoliut.site/unsub?domain=afadbd.org \r\nAddress: Address: 2900   74 Netherpark Crescent, NA  Mk43 3dp\r\nLooking out for you, Niki Tweddle.'),
(747, 'Winnie Calkins', 'calkins.winnie@gmail.com', 'Set up a fully prepared pet website within one day — no need to write articles and without technical skills', 'Consider running a professionally assembled pet-focused website — one of the most popular topics online — that is prepared for use immediately. This solution offers a well-organized WordPress setup with ready-made articles, product overviews, digital materials, and integrated engagement tools, so you avoid creating texts, complex settings, and design tasks entirely.\r\n\r\nhttps://novaai.expert/PetAuthorityFortune?afadbd.org\r\n\r\nWhen you’re done with spending weeks building sites from scratch, figuring out site income models, and handling all content alone, this option lets you have a real digital asset that attracts visitors, builds credibility, and scales naturally.\r\n\r\nhttps://novaai.expert/PetAuthorityFortune?afadbd.org\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nThis message is sent to you \r\nsince we believe \r\nour offer \r\ncould be useful to you.\r\n\r\nIf you would prefer not to receive \r\nfurther communications from us, \r\nsimply \r\nunsubscribe:\r\n\r\nhttps://novaai.expert/unsub?domain=afadbd.org \r\nAddress: Address: 4528   Schachermairdorf 64, UPPER AUSTRIA  5143\r\nLooking out for you, Winnie Calkins.'),
(748, 'RobertEtess', 'dinanikolskaya99@gmail.com', 'Hallo  i write about     prices', 'Sveiki, aš norėjau sužinoti jūsų kainą.'),
(749, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hello, i am writing about your   price for reseller', 'Ciao, volevo sapere il tuo prezzo.'),
(750, 'SimonEtess', 'dinanikolskaya99@gmail.com', 'Hello, i am writing about   the prices', 'Ndewo, achọrọ m ịmara ọnụahịa gị.'),
(751, 'Sayedur Rahman', 'maenterprise.012@gmail.com', 'Vwndor Enlistment', 'I am Sayedur Rahman, Proprietor of M/S Ma Enterprise.  I am interested of Enlisted in AFAD'),
(752, 'Davida', 'sales@afadbd.org', 'Davida Farrelly', 'Hi, \r\n\r\nI hope you\'re doing well. I wanted to let you know about our new BANGE backpacks and sling bags that just released.\r\n\r\nThe bags are waterproof and anti-theft, and have a built-in USB cable that can recharge your phone while you\'re on the go.\r\n\r\nBoth bags are made of durable and high-quality materials, and are perfect for everyday use or travel.\r\n\r\nOrder yours now at 50% OFF with FREE Shipping: http://bangeshop.com\r\n\r\nTo your success,\r\n\r\nDavida'),
(753, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hi, i am wrote about   the prices', 'Ciao, volevo sapere il tuo prezzo.'),
(754, 'Claudette Huang', 'joel.fox.1965+afadbd.org@gmail.com', 'Launch a prepared income source in 2026 — no copywriting and no technical stress', 'Exhausted by losing weeks creating online products that fail to sell? Take a look at the 2026 Digital Business Bundle — seven fully prepared digital products with complete PLR rights you can easily rebrand and begin selling as your own. This isn’t guesswork — it’s buyer-tested content across evergreen niches, from AI-based courses to earning guides and wellness assets, all designed to sell.\r\n\r\nhttps://6v9sfq.site/ChristmasProfitBundle?afadbd.org\r\n\r\nAvoid the long creation grind: get access to, customize, and go live on platforms such as Etsy, Gumroad, Shopify, or your own funnels. Start turning traffic into sales as early as January with actual products buyers are already searching for.\r\n\r\nhttps://6v9sfq.site/ChristmasProfitBundle?afadbd.org\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message \r\nas we think \r\nour offer \r\ncould be useful to you.\r\n\r\nIf you would prefer not to receive \r\nfuture messages from us, \r\nplease click here to \r\nopt out:\r\n\r\nhttps://6v9sfq.site/unsub?domain=afadbd.org \r\nAddress: Address: 8875   Rontgenstraat 60, NB  5223 Great Britain\r\nLooking out for you, Claudette Huang.'),
(755, 'Marguerite Belstead', 'belstead.marguerite64@gmail.com', 'How publishers use hundreds of detective plot prompts to create kids’ detective stories that fit activity packs', 'Consider using a large set of prepared case-solving story outlines that easily help create products parents, teachers, and tutors value — books, activity materials — without a blank page. This isn’t simply a random idea list. This is a well-organized prompt pack with usable structures that allows you to create quality young readers’ materials within hours, rather than weeks.\r\n\r\nhttps://6pr5pg.site/StoryPromptsDetective?afadbd.org\r\n\r\nIf you work as a webmaster, content creator, or KDP publisher, that it results in working within a long-term children’s niche with consistent interest, creating multiple products from a single base and opening reliable income paths. Want to see a simple approach to create and publish young readers mystery stories without months of writing? Click through to see how it works.\r\n\r\nhttps://6pr5pg.site/StoryPromptsDetective?afadbd.org\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are getting this email \r\nas we believe \r\nthis offer \r\ncould be relevant to you.\r\n\r\nIf you don’t want to receive \r\nany more messages from us, \r\nplease click here to \r\nstop receiving emails:\r\n\r\nhttps://6pr5pg.site/unsub?domain=afadbd.org \r\nAddress: Address: 5586   Strada Bresciana 101, TA  74020\r\nLooking out for you, Marguerite Belstead.'),
(756, 'EmmaAdary842', 'emmagaica379046@yahoo.com', '\"Sexy vixen seeks thrill!\"', '\"Enchanting nymphomaniac seeks steamy indulgence.\"  Here  --   Kj3fz2f.short.gy/ueeSek?Adary'),
(757, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hi, i write about     prices', 'হাই, আমি আপনার মূল্য জানতে চেয়েছিলাম.'),
(758, 'Sal Deniehy', 'deniehy.sal@gmail.com', 'inquiring', 'Ever stop to think how much you\'re spending on marked-up CPMs for Connected TV ads?\r\nIf you\'re using “premium” audience segments without verifying who you\'re actually reaching, that money is likely feeding someone else\'s family.\r\nNo pressure. Here’s the site if you\'re open to see a revolutionary vision for digital advertising\r\ntopshelfaudience.com using real-time Intent data from an Integration in our platform to Lotame.com. You can reach me at marketing@mrmarketingres.com or 843-720-7301. And if this isn\'t a fit please feel free to email me and I\'ll be sure not to reach out again.  Thanks!'),
(759, 'Saffet Erdogan', 'ceylanturks41@gmail.com', 'Request for Business Cooperation', 'Greetings, \r\n \r\nI am writing to present a brief biography about myself and to seek your business cooperation. \r\n \r\nI was born on 15 March 1968 in Turkey. I have lived a life defined by vision, resilience, and integrity. I am a devoted husband and a proud father of one son, and I embody the values of family, responsibility, and leadership in both my personal and professional journey. \r\n \r\nAs the Managing Director of a furniture manufacturing company and a towel and textile manufacturing company, I have built a reputation as a dynamic entrepreneur whose work combines creativity with discipline. My leadership style is marked by fairness, dedication, and a deep sense of responsibility toward my employees and business partners. I am admired for my ability to transform challenges into opportunities, guiding my businesses with wisdom and foresight. \r\n \r\nAs a Turkish Christian, I hold a strong belief in freedom of worship and advocate for respect, tolerance, and unity among people of different faiths. My spiritual values inspire me to live with compassion, humility, and a commitment to justice. I am known not only for my professional achievements but also for my moral strength and unwavering principles. \r\n \r\nMy personality reflects qualities that attract admiration: \r\n \r\n* Integrity and honesty in all dealings \r\n* Visionary leadership that inspires growth and innovation \r\n* Compassion and generosity, always mindful of the needs of others \r\n* Resilience and determination, never deterred by obstacles \r\n* Faith and humility, grounding success in values that transcend material wealth \r\n \r\nThrough my journey, I have become more than a successful businessman—a role model of responsibility, a man of faith, and a beacon of perseverance. My life story continues to inspire those around me, proving that true greatness lies not only in achievements but in the character and values that sustain them. \r\n \r\nI am currently experiencing issues with the Turkish government, as the Government of Turkey is planning to confiscate my assets. Therefore, I wish to invest my funds, totaling 85,000,000 euros, with you. \r\n \r\nFor further information, I would appreciate it if you could write to me with a brief biography about yourself as well. Please write to me directly at this email address, as I have this email application on my phone and can read emails quickly and give a prompt reply: *<>esaffet81@gmail.com ]   (mailto: esaffet81@gmail.com)*. \r\n \r\nMy regards, \r\n \r\nMr. Saffet Erdogan'),
(760, 'Mike Steven Jensen', 'info@professionalseocleanup.com', 'Fix August Google Spam update ranking problems for free', 'Hi, \r\nWhile reviewing afadbd.org, we spotted toxic backlinks that could put your site at risk of a Google penalty. Especially that this Google SPAM update had a high impact in ranks. This is an easy and quick fix for you. Totally free of charge. No obligations. \r\n \r\nFix it now: \r\nhttps://www.professionalseocleanup.com/ \r\n \r\nNeed help or questions? Chat here: \r\nhttps://www.professionalseocleanup.com/whatsapp/ \r\n \r\nBest, \r\nMike Steven Jensen\r\n \r\n+1 (855) 221-7591 \r\ninfo@professionalseocleanup.com');
INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`) VALUES
(761, 'Joanna Riggs', 'joannariggs83@gmail.com', 'Video Promotion for your website', 'Hi,\r\n\r\nI just visited afadbd.org and wondered if you\'ve ever considered an impactful video to advertise your business? Our videos can generate impressive results on both your website and across social media.\r\n\r\nOur prices start from just $195 (USD).\r\n\r\nLet me know if you\'re interested in seeing samples of our previous work.\r\n\r\nRegards,\r\nJoanna'),
(762, 'Natali Conti', 'nataliconti2030@gmail.com', '', 'Hi,\r\n\r\nI visited your website at afadbd.org and would\r\nlike to offer you something:\r\n\r\n\r\n\r\nUltimate Global Business Email Database Package – Get Millions of Verified B2B & Decision Makers Records for Just $299.99!\r\n\r\nLooking for authentic, \r\n\r\nhigh-quality B2B databases to supercharge your email marketing, lead generation, and sales outreach?\r\n\r\n\r\n\r\nAccess millions of verified, industry-specific business contacts from across major global markets — including CEOs, decision-makers, \r\n\r\nstartups, professionals, investors, and domain owners.\r\n\r\n\r\n\r\nThis complete Global Business Email Database Package helps you reach the right audience — fast, affordable, and accurate.\r\n\r\n\r\n\r\n'),
(763, 'LeeEtess', 'dinanikolskaya99@gmail.com', 'Hi, i write about     prices', 'Здравейте, исках да знам цената ви.'),
(764, 'Lorna Cheney', 'lorna.cheney@googlemail.com', 'Never Pay For Traffic Ever Again…', 'World\'s First AI Agent Powered By ChatGPT-5…\r\nThat Writes And Ranks Anything We Want… On The First Page Of Google… With ZERO SEO. And Zero Ads… \r\n\r\nhttps://www.youtube.com/@AISolutionsTop'),
(765, '* * * $3,222 credit available! Confirm your transaction here: http://nationwidepackaging.com/?vxpsu1 * * * hs=d13784673f637677426b66b478044a25* ххх*', 'ydx~nwa9pwyxz@mailbox.in.ua', 'v6uvo6', '3wilhn'),
(766, '* * * <a href=\"http://nationwidepackaging.com/?vxpsu1\">$3,222 deposit available</a> * * * hs=d13784673f637677426b66b478044a25* ххх*', 'ydx~nwa9pwyxz@mailbox.in.ua', 'v6uvo6', '3wilhn'),
(767, 'Tarah Sisley', 'tarah.sisley@hotmail.com', 'FREE Buyer Traffic from TikTok, YouTube, Instagram & Facebook', 'World\'s First AI App That Creates\r\nCinematic Clips, Shorts & Reels Completely Hands-Free\r\nIn 100s Of Language - In Just 60 Seconds\r\n\r\nhttps://bwzph2rqzdyw7vuh.site/MagicClipsAI?afadbd.org\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou’re receiving this email \r\nsince we think \r\nour offer \r\ncould be relevant to you.\r\n\r\nIf you don’t want to receive \r\nadditional emails from us, \r\nplease click here to \r\nstop receiving emails:\r\n\r\nhttps://bwzph2rqzdyw7vuh.site/unsub?domain=afadbd.org \r\nAddress: Address: 3093   Via Loreto 104, AP  63030\r\nLooking out for you, Tarah Sisley.'),
(768, 'AvaAdary7064', 'emmagaica383826@gmail.com', '\"Desperate for intimacy now!\"', '  \r\n \"Carnal temptress demands irresistible passion.\"  Here  -- Kj3fz2f.short.gy/ueeSek?Adary'),
(769, 'Andres Ceja', 'andres.ceja@gmail.com', 'The \"Secret Source Code\" Behind the World’s Top Bestsellers', 'Why do some books sell millions of copies while others fail?\r\n\r\nThe answer isn\'t luck. It’s Psychology. \r\n\r\nThe book that currently dominates the charts—selling over 272 copies daily—was built on a very specific scientific foundation. It took deep behavioral principles and simplified them into \"Tiny\" steps.\r\n\r\nhttps://center303-center303.site/TinyActionBooks?afadbd.org\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are getting this email \r\nsince we believe \r\nwhat we’re offering \r\nmay be relevant to you.\r\n\r\nIf you do not wish to receive \r\nany more messages from us, \r\nyou can \r\nunsubscribe:\r\n\r\nhttps://center303-center303.site/unsub?domain=afadbd.org \r\nAddress: Address: 2781   Nytorpsvagen 12, NA  563 00\r\nLooking out for you, Andres Ceja.'),
(770, 'Damion Audet', 'damion.audet22@yahoo.com', 'Create REAL iOS Apps With AI', 'Apple HATES This... But They Can\'t Stop Me From Showing You How I Built A Money-Making App In 12 Minutes\r\nNow I\'m Handing You The Exact System To Do The Same — Zero Coding Required\r\n\r\nhttps://bandardewi8.site/MeeloAppEmpire?afadbd.org\r\n\r\nYou are getting this email \r\nbecause we believe \r\nthis offer \r\nmay be relevant to you.\r\n\r\nIf you would prefer not to receive \r\nfuture messages from us, \r\nplease click here to \r\nopt out:\r\n\r\nhttps://bandardewi8.site/unsub?domain=afadbd.org \r\nAddress: Address: 8594   46 Ermin Street, NA  Cw5 2az\r\nLooking out for you, Damion Audet.'),
(771, 'Steven Weiner', 'steven@marketing2.cfd', 'Start 2026 the right way!', 'Hi\r\n\r\nTired of spending money on marketing? Lets start 2026 the right way.\r\n\r\n1. Find your competitors\r\n2. Receive their clients\r\n3. Make Money\r\n\r\nWhy do this?\r\nBecause of advertising practices of major platforms like Google, Facebook, and YouTube.\r\n\r\nIt seems quite frustrating that these companies charge advertisers repeatedly for the same leads, especially when they clearly understand the market dynamics.\r\n\r\nIn contrast, we believe in transparency and fair competition. We provide our clients with access to customer data previously purchased by others, they receive details about leads that would have otherwise cost them thousands. \r\n\r\nPlus, we offer daily updates for a month, ensuring they stay informed about their competitive landscape at no extra cost. \r\n\r\nVisit us for a free sample!\r\nhttps://Steven.marketing2.cfd?domain=afadbd.org'),
(772, 'Lidia Brenan', 'lidia.brenan12@msn.com', 'A Modern Day Gold Rush, making tens of thousands a month', 'Imagine launching a viral, faceless \r\nYouTube, TikTok, or Instagram channel \r\nin just minutes...\r\n(And Then Your new Channel \r\nautomatically Creates AND posts videos FOR YOU...\r\nSo you NEVER HAVE TO TOUCH IT, AGAIN?)\r\n\r\nThis is 100% AUTOMATED, so once you set it up, you never have to lift a finger!\r\n\r\nhttps://cola52.site/TrafficSupernova?afadbd.org\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are receiving this message \r\nsince we think \r\nour offer \r\ncould be relevant to you.\r\n\r\nIf you no longer wish to get \r\nadditional emails from us, \r\nyou can \r\nunsubscribe:\r\n\r\nhttps://cola52.site/unsub?domain=afadbd.org \r\nAddress: Address: 7734   Heinrich Heine Platz 17, TH  99716\r\nLooking out for you, Lidia Brenan.'),
(773, 'Pauline Stilwell', 'joel.fox.1965+afadbd.org@gmail.com', 'Create New income streams FAST', 'Trend Hunter AI gives you Real-Time Data \r\nTo Create Hot-Selling Amazon KDP eBooks \r\nThat Pay You Monthly Royalties for Years To come...\r\n\r\nhttps://cr1y5t.site/TrendHunterAI?afadbd.org\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nThis message is sent to you \r\nas we think \r\nthis offer \r\nmay be relevant to you.\r\n\r\nIf you no longer wish to get \r\nfuture messages from us, \r\nplease click here to \r\nstop receiving emails:\r\n\r\nhttps://cr1y5t.site/unsub?domain=afadbd.org \r\nAddress: Address: 3586   28 Garden Place, VIC  3525\r\nLooking out for you, Pauline Stilwell.'),
(774, 'Krista Heagney', 'turnerfisher.348382+krista.heagney@gmail.com', 'Recommendation for the administrator of afadbd.org', 'This message is addressed to the administrator of afadbd.org.\r\n\r\nWe are an agency providing powerful SEO and digital marketing solutions designed to increase your visibility, traffic, and conversions. \r\n\r\nOUR SERVICES INCLUDE:\r\n- Social Media Management\r\n- Website Traffic\r\n- SEO Backlinks\r\n- Social Bookmarking Backlinks\r\n- Google Ranking\r\n- Google Maps Ranking\r\n- YouTube Ranking\r\n- Content Creation\r\n- Video Production\r\n- Get Real Clients\r\n- Full SEO Campaigns & Agency Services\r\n\r\nWhether your goal is boosting YouTube, driving more website traffic, or strengthening your SEO, we can help you achieve results.\r\n\r\nExplore details here:  https://rb.gy/t7gc5i\r\n\r\nBest regards,\r\nSEO Expert & Specialist\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nTo unsubscribe, please reply with subject:  Unsubscribe !afadbd.org'),
(775, 'Agueda Almond', 'almond.agueda@gmail.com', 'Checking in', 'Just reaching out,\r\n\r\nThought this might be useful for your website.\r\n\r\nHere’s a free service that can help you get more exposure for your business across multiple classified sites with almost no effort.\r\n\r\nIf you want a quick visibility boost, here’s the URL:\r\nsitesubmitterpro.com\r\n\r\nIt’s 100% free to try and takes about 60 seconds.\r\n\r\nJust reply if you want more ideas.'),
(776, 'Danae Cunningham', 'cunningham.danae@gmail.com', 'Create Human-Like AI Teachers Instantly', 'What If You Could Teach Any Topic Online...\r\nWithout Being a Subject Expert?\r\n\r\nhttps://connectwithseo.site/AIProfessor?afadbd.org\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou received this notification \r\nsince we think \r\nthis offer \r\ncould be relevant to you.\r\n\r\nIf you don’t want to receive \r\nadditional emails from us, \r\nsimply \r\nopt out:\r\n\r\nhttps://connectwithseo.site/unsub?domain=afadbd.org \r\nAddress: Address: 4587   20 Rue Pierre De Coubertin, CENTRE  31200\r\nLooking out for you, Danae Cunningham.'),
(777, 'SimonEtess', 'dinanikolskaya99@gmail.com', 'Hallo, i am writing about your   prices', 'Hola, volia saber el seu preu.'),
(778, 'LeeEtess', 'zekisuquc419@gmail.com', 'Aloha  i am wrote about   the price for reseller', 'Ndewo, achọrọ m ịmara ọnụahịa gị.'),
(779, 'Roxanna', 'sales@afadbd.org', 'Roxanna Kiley', 'Hey \r\n\r\nI wanted to reach out and let you know about our new dog harness. It\'s really easy to put on and take off - in just 2 seconds - and it\'s personalized for each dog. \r\nPlus, we offer a lifetime warranty so you can be sure your pet is always safe and stylish.\r\n\r\nWe\'ve had a lot of success with it so far and I think your dog would love it. \r\n\r\nGet yours today with 50% OFF: https://caredogbest.com\r\n\r\nFREE Shipping - TODAY ONLY! \r\n\r\nBest regards, \r\n\r\nRoxanna'),
(780, 'AmeliaAdary6088', 'isabellagaica427570@yahoo.com', '\"Wild girl craves passion!\"', '  \r\n \"Exotic siren craves the thrill of forbidden temptation.\"  Here --  Kj3fz2f.short.gy/ueeSek?Adary'),
(781, 'LeeEtess', 'zekisuquc419@gmail.com', 'Hi, i write about     price for reseller', 'Dia duit, theastaigh uaim do phraghas a fháil.'),
(782, 'Mike Franki', 'turnerfisher.348382+mike.franki@gmail.com', 'Drive engagement now', 'Want targeted visitors visiting afadbd.org now? Start your Free Test.\r\n\r\nGo to the https://rb.gy/kkhq2m, fill in your site details, then apply the coupon FREE_TRAFFIC at checkout to get the product free for 7 days.\r\n\r\nDon’t forget to create a free account.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nTo unsubscribe, please reply with subject:  Unsubscribe !afadbd.org'),
(783, 'LeeEtess', 'zekisuquc419@gmail.com', 'Hello, i am write about     price', 'Sveiki, es gribēju zināt savu cenu.'),
(784, 'Isabella', 'JenniferWalshEDU@outlook.com', 'Stop losing revenue because your traffic looks artificial', 'Tired of losing accounts because every platform sees the same IP over and over Discover a way to assign a unique private address to each profile so your accounts look natural stay under the radar and stop triggering those annoying security checks https://tinyurl.com/getunblocked'),
(785, 'Mike Stian Michel', 'info@digital-x-press.com', 'Add AEO to your SEO strategies today !', 'Hi, \r\nI understand that most website owners struggle understanding that organic ranking growth is a long-term game and a strategically planned monthly initiative. \r\n \r\nUnfortunately, very few marketers have the willingness to observe the incremental yet impactful improvements that can completely boost their search performance. \r\n \r\nWith constant algorithm changes, a reliable, ongoing approach including Answer Engine Optimization (AEO) is essential for achieving a strong return on investment. \r\n \r\nIf you see this as the right method, partner with us! \r\n \r\nCheck out Our Monthly SEO Services https://www.digital-x-press.com/unbeatable-seo/ \r\n \r\nTalk to Us on Instant Messaging https://www.digital-x-press.com/whatsapp-us/ \r\n \r\nWe provide remarkable outcomes for your budget, and you will enjoy choosing us as your growth partner. \r\n \r\nWarm regards, \r\nDigital X SEO Experts \r\nPhone/WhatsApp: +1 (844) 754-1148'),
(786, 'LeeEtess', 'zekisuquc419@gmail.com', 'Hi, i am wrote about your   prices', 'Sawubona, bengifuna ukwazi intengo yakho.'),
(787, 'GeorgeEtess', 'zekisuquc419@gmail.com', 'Hi    writing about   the price for reseller', 'Salut, ech wollt Äre Präis wëssen.'),
(788, 'AvaAdary5328', 'ameliagaica711410@yahoo.com', '\"I\'m aching to release my inner wildness.\"', '  \r\n \"Can you help me unleash the wild side I\'ve been keeping inside?\"    -  Kj3fz2f.short.gy/ueeSek?Adary'),
(789, 'Vana', 'bizassistance008@outlook.com', 'Experienced Bookkeeper', 'Hi, This is Vana, an experienced bookkeeper with more than a decade experience in bookkeeping for USA, UK, Canada, Europe and Australian Clients with expertise in:\r\n\r\nQuickBooks, Xero, Wave, FreshBooks, Sage, Zoho Books, MYOB, Kashoo, Tally, NetSuite, Odoo Accounting, Quicken, Microsoft Dynamics 365, ZipBooks, and FreeAgent.\r\n\r\nI can help you with:\r\n > Categorizing income and expense transactions accurately\r\n > Handling reconciliations for PayPal, Wise, Stripe, and business bank accounts\r\n > Maintaining clean and up-to-date financial records\r\n\r\nMy rate is USD 20 per hour.\r\n\r\nIf you’d like to discuss further, please reply to bizassistance008@outlook.com'),
(790, 'tomNuast', 'thxu7zqf@hotmail.com', 'I promised.', 'Photos for my escort application are uploaded.   \r\nLet me know if the quality is good.   \r\nPreview: https://tinyurl.com/4a9dd8kf'),
(791, 'Isis', 'isis@afadbd.org', 'Isis MacCarthy', 'Why wait for a salon appointment? Airluxe™ brings professional styling and grooming tools directly to your vanity.\r\n\r\nOur best-selling high-speed dryers and 4-in-1 stylers are now on sale! Shop our sitewide discount and upgrade your routine today.\r\n\r\nDon\'t miss the sale at: https://clarimart.com\r\n\r\nTreat yourself to the best hair days of your life.'),
(792, 'Lori Shultz', 'yiyayova@gmail.com', 'ChatGPT, Gemini, Stable Diffusion & More… Without Monthly Fees', 'Hello,\r\n\r\nWe have a promotional offer for your website afadbd.org.\r\n\r\nWhat if you could use the best AI models in the world without limits or extra costs? Now you can. With our brand-new AI-powered app, you\'ll have ChatGPT, Gemini Pro, Stable Diffusion, Cohere AI, Leonardo AI Pro, and more — all under one roof. No monthly subscriptions, no API key expenses, no experience required, just one dashboard, one payment, and endless possibilities.\r\n\r\nSee it in action: https://aistore.vinhgrowth.com\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE: https://vinhgrowth.com/unsubscribe?domain=afadbd.org\r\nAddress: 60 Crown Street, London\r\nLooking out for you, Lori Shultz'),
(793, 'GeorgeEtess', 'zekisuquc419@gmail.com', 'Hallo  i am writing about     price', 'Ciao, volevo sapere il tuo prezzo.'),
(794, 'Mike Levi Mercier', 'info@strictlydigital.net', 'Semrush links for afadbd.org', 'Hi there, \r\n \r\nReceiving some collection of links linking to afadbd.org could have zero worth or harmful results for your business. \r\n \r\nIt really makes no difference the total backlinks you have, what is crucial is the total of keywords those platforms rank for. \r\n \r\nThat is the critical factor. \r\nNot the fake Domain Authority or Domain Rating. \r\nAnyone can manipulate those. \r\nBUT the number of ranking keywords the domains that link to you contain. \r\nThat’s it. \r\n \r\nGet these quality links redirect to your site and your site will see real growth! \r\n \r\nWe are providing this exclusive SEO package here: \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nNeed more details, or need more information, reach out here: \r\nhttps://www.strictlydigital.net/whatsapp-us/ \r\n \r\nKind regards, \r\nMike Levi Mercier\r\n \r\nstrictlydigital.net \r\nPhone/WhatsApp: +1 (877) 566-3738'),
(795, 'Latta', 'dataentry756@outlook.com', 'Virtual Assistant', 'Hi, Accurate data management can save hours every week — and that’s exactly what I help with.\r\n\r\nServices include:\r\n• Manual & online data entry (PDFs, invoices, forms)\r\n• Product uploads (Shopify, WooCommerce, Amazon, Etsy)\r\n• Excel cleanup, formatting & consolidation\r\n• Web research, data collection & lead generation\r\n• Document conversion & organization\r\n• Report preparation & data analysis\r\n\r\nEvery task is handled with attention to detail and timely delivery.\r\n\r\nWould you like to begin with a small pilot project? If yes, please reply to Dataentry756@outlook.com'),
(796, 'Mike Jonas Davies', 'mike@monkeydigital.co', 'Grow Your Website Traffic with Geo-Targeted Social Ads – Only $10 for 10K Visits!', 'Dear Webmaster, \r\n \r\nI wanted to connect with something that could seriously improve your website’s traffic. We work with a trusted ad network that allows us to deliver genuine, country-targeted social ads traffic for just $10 per 10,000 visits. \r\n \r\nThis isn\'t fake traffic—it’s engaged traffic, tailored to your chosen market and niche. \r\n \r\nWhat you get: \r\n \r\n10,000+ high-quality visitors for just $10 \r\nCountry-specific traffic for your chosen location \r\nScalability available based on your needs \r\nProven to work—we even use this for our SEO clients! \r\n \r\nInterested? Check out the details here: \r\nhttps://www.monkeydigital.co/product/country-targeted-traffic/ \r\n \r\nOr connect instantly on WhatsApp: \r\nhttps://monkeydigital.co/whatsapp-us/ \r\n \r\nLooking forward to helping you grow! \r\n \r\nBest, \r\nMike Jonas Davies\r\n \r\nPhone/whatsapp: +1 (775) 314-7914'),
(797, 'OliviaAdary9739', 'isabellagaica985444@yahoo.com', '\"Passionate Encounter Desired\"', 'You won\'t regret spending time with me   -  Fun123.short.gy/OvDYjS?Adary'),
(798, 'Leandro Huitt', 'huitt.leandro@yahoo.com', 'Update for you', 'Dear C.E.O and Valued  Staff,\r\n\r\nA blessed New Year. 4u2 Inc. is a local Global for Sale by Owner (FSBO) real Estate advertising platform, (Government of Alberta, Canada, Corporate Access Number:2024873339), that assists property owners to advertise and sell their properties privately without agents and commissions. Should you or someone you know be interested in saving thousands of US dollars, please go to the 4u2 Inc. website(www.4u2incfsbo.com), read it carefully, then email: info@4u2incfsbo.com, to get started. 4u2 Inc. will not only match the best price being offered by any other FSBO platform but also BETTER, any price for the same service that is provided by any other FSBO platform by a further and additional 12% discount. Yes, that’s right, 4u2 Inc. will provide you with an additional 12% discount on the lowest price that is being offered by any other FSBO website that you are able to identify.\r\n\r\nShould the services of a fully licensed, bonded and insured Real Estate Agent be required, 4u2 Inc. will select one in your area that will meet your Real Estate needs.\r\n\r\nENGLISH SPEAKING COMMISSIONED ACCOUNT EXECUTIVE POSITIONS FOR THE ABOVE AVAILABLE NOW!!! (Resume/CV required). APPLY NOW!!! info@4u2incfsbo.com'),
(799, 'Abi', 'bposervices1@outlook.com', 'Outsource Repetitive Tasks – Reliable VA Support', 'Hi,\r\n\r\nI help businesses reduce workload and save time by outsourcing repetitive operational processes to a reliable Virtual Assistant. Here’s what I can handle:\r\n\r\n>  Data entry and migration between tools or software\r\n>  Uploading product catalogs, price lists, or customer data\r\n>  Managing spreadsheets, reports, and admin documentation\r\n>  Handling CRM updates and task tracking\r\n>  File conversion (PDF to Word/Excel), transcription & formatting\r\n>  Cleaning and organizing large datasets\r\n>  Managing contact databases and verifying email lists\r\n>  Updating inventory or backend systems\r\n\r\nYou get accuracy, speed, and reliable support—all starting at $10/hour.\r\n\r\nWould you like to outsource some of your operational workload?\r\n\r\nBest regards,\r\nAbi Singh\r\nBposervices1@outlook.com'),
(800, 'LeeEtess', 'zekisuquc419@gmail.com', 'Hello,   writing about your the price', 'Sveiki, aš norėjau sužinoti jūsų kainą.'),
(801, 'Andrewrot', 'no.reply.MatthiasBrown@gmail.com', 'Posting feedback through the feedback form.', 'Salutations! afadbd.org \r\n \r\nDid you know that it is possible to send commercial offer perfectly lawfully? \r\nWhen such proposals are sent, no personal data is used, and messages are sent to specially designed forms to receive messages and appeals. Messages that are sent by Feedback Forms are not seen as spam, since they are thought of as important. \r\nWe invіte уou to test our service without рayіng anуthіng! \r\nWe can deliver up to 50,000 messages for you. \r\n \r\nThe cost of sending one million messages is $59. \r\n \r\nThis letter is automatically generated. \r\n \r\nContact us. \r\nTelegram - https://t.me/FeedbackFormEU \r\nWhatsApp - +375259112693 \r\nWhatsApp  https://wa.me/+375259112693 \r\nWe only use chat for communication.'),
(802, 'Abi', 'your.assistant23@outlook.com', 'Personal Assistant', 'Hello, Are you looking for a personal assistant who can handle your daily business operations and make your life easier? I can help with tasks related to: \r\n > Admin \r\n > Marketing \r\n > Gathering data from multiple websites \r\n > Answering emails \r\n > Website management \r\n > Social media \r\n > Content writing \r\n > Planning new projects \r\n > Bookkeeping \r\n > Entering data into softwares \r\n > Back-office assistance \r\n > Data Entry Operator \r\n\r\nIf you are interested, kindly revert me on Your.assistant23@outlook.com with list of tasks you want to accomplish, and we can discuss our collaboration over a video call as per your convenience.'),
(803, 'Matt Bacak', 'mattbacak2025@gmail.com', 'Nobody’s Talking About the AI That’s Replacing Traditional Marketing Agencies', 'Hello,\r\n\r\n\r\nI visited your webpage at afadbd.org and would \r\nlike\r\nto offer you something :\r\n\r\n\r\n\r\nImagine waking up to find your agency website already built, 100 pre-qualified leads discovered in your area, and outreach campaigns ready to send…\r\nAll done while you were sleeping.\r\nNo coding. No client-chasing. No proposals to write.\r\nThat’s exactly what LocalBizAI did for me.\r\nJust one click… and BOOM!\r\nA fully branded, profit-ready digital marketing agency with services, pricing, leads, and outreach campaigns set up in minutes.\r\n\r\n\r\n\r\nFor more click Here : https://jvz6.com/c/688203/424347/'),
(804, 'Mandy', 'creativeteamhire@outlook.com', 'Content Writer and Copywriter', 'Hi, I\'m Mandy, a content and copywriter with over 12 years of experience creating content for various industries. I write blogs, rewrite old content, news articles, SEO-friendly web content, product descriptions, business service descriptions, newsletters, brochures, and more. My focus is on delivering content that connects with your audience, improves SEO, and gets results—all written without AI. I also provide reports from paid tools to back up my work. My rate is $50 per 1,000 words, offering great value for high-quality content. \r\n\r\nIf you\'d like to improve your content, feel free to email me at creativeteamhire@outlook.com'),
(805, 'Mike Knut Davies', 'mike@monkeydigital.co', 'Monkey Digital - helping sites get discovered by AI engines', 'Hi, \r\n \r\nSearch is changing faster than most businesses realize. \r\n \r\nMore buyers are now discovering products and services through AI-driven platforms — not only traditional search results. This is why we created the AI Rankings SEO Plan at Monkey Digital. \r\n \r\nIt’s designed to help websites become clear, trusted, and discoverable by AI systems that increasingly influence how people find and choose businesses. \r\n \r\nYou can view the plan here: \r\nhttps://www.monkeydigital.co/ai-rankings/ \r\n \r\nIf you’d like to see whether this approach makes sense for your site, feel free to reach out directly — even a quick question is fine. Whatsapp: https://wa.link/b87jor \r\n \r\n \r\n \r\nBest regards, \r\nMike Knut Davies\r\n \r\nMonkey Digital \r\nmike@monkeydigital.co \r\nPhone/Whatsapp: +1 (775) 314-7914'),
(806, 'RobertEtess', 'zekisuquc419@gmail.com', 'Hi  i writing about your the price for reseller', 'Hallo, ek wou jou prys ken.'),
(807, 'OliviaAdary6313', 'avagaica43785@hotmail.com', '\"Craving Intense Connection\"', 'Desire pulses through every vein and nerve.   -    nMm5id.short.gy/?Adary'),
(808, 'Leoma Willey', 'willey.leoma@gmail.com', 'Hi afadbd.org Administrator!', 'Hi there '),
(809, 'Vana', 'businessgrowtogether@outlook.com', 'Experienced Bookkeeper', 'Hi, This is Vana. I am a bookkeeper. I can categorize your transactions of incomes/expenses and can handle bank reconciliations. I can work on any software that you use for accounting. My rates are USD 20 per hour or We can set a monthly cost as per your convenience. \r\n\r\nReply me on Businessgrowtogether@outlook.com to discuss further.'),
(810, 'Sam', 'dataentry756@outlook.com', 'Virtual Assistant', 'Hi, Accurate data management can save hours every week — and that’s exactly what I help with.\r\n\r\nServices include:\r\n • Manual & online data entry (PDFs, invoices, forms)\r\n • Product uploads (Shopify, WooCommerce, Amazon, Etsy)\r\n • Excel cleanup, formatting & consolidation\r\n • Web research, data collection & lead generation\r\n • Document conversion & organization\r\n • Report preparation & data analysis\r\n\r\nEvery task is handled with attention to detail and timely delivery.\r\n\r\nWould you like to begin with a small pilot project? If yes, please reply to Dataentry756@outlook.com'),
(811, 'WilliamDuels', 'jacksrenome@gmx.com', 'Derefhefjwdkifhgijfkwoddjeifj jiwdokdiwfheijfwjdiw jidjwksaodjegfijwokdaijdfe', 'Vertyowdiwjodko kofkosfjwgojfsjf oijwfwsfjowehgewjiofwj jewfkwkfdoeguhrfkadwknfew ijedkaoaswnfeugjfkadcajsfn afadbd.org'),
(812, 'EmmaAdary4080', 'isabellagaica21213@gmail.com', '\"Passion\'s Siren Beckons You\"', 'LetвЂ™s set our inhibitions free tonight   -    Girlsgosz.short.gy/WVl3rP?Adary'),
(813, 'Ravi', 'businessgrowtogether@outlook.com', 'Personal Assistant', 'Are you looking for a personal assistant who can handle your daily business operations and make your life easier? I can help with tasks related to admin, marketing, gathering data from multiple websites, answering emails, website management, social media, content writing, planning new projects, bookkeeping, entering data into softwares, and back-office assistance. I have an Inhouse Content writer, social media specialist, Data Entry Operator, Website Developer and Bookkeeper. My costing varies from $8/hr to $30/hr depending on type of project and its complexity. \r\n\r\nIf you are interested, send me an email at Businessgrowtogether@outlook.com with a list of tasks you want to accomplish, and We can discuss our collaboration over a video call as per your convenience.'),
(814, 'Kathlene', 'sales@afadbd.org', 'Kathlene Lemke', 'Hey there, \r\n\r\nJust a quick heads-up — we’re running a short promotion on our EliteNook™ Premium Executive Office Chair right now.\r\n\r\nFree 2-5 day Fast Delivery: https://luxcollection.it.com\r\n\r\nIt’s designed for long hours with ergonomic back support, soft leather feel, and smooth swivel wheels — great for home or office.\r\n\r\nWe’re offering a limited-time discount, so it’s worth a quick look.\r\n\r\nThe Best,\r\n\r\nEliteNook™ Team'),
(815, 'Kendrick Delossantos', 'kendrick.delossantos@googlemail.com', 'Note for your team', 'Save Thousands on Real Estate Sales — FSBO Advertising with 4u2 Inc.\r\nDear C.E.O. and Valued Staff,\r\nWarm New Year greetings.\r\n4u2 Inc. is a locally based, globally accessible For Sale by Owner (FSBO) real estate advertising platform (Government of Alberta Corporate Access Number: 2024873339). We help property owners market and sell their homes privately—without agents, without commissions, and with the potential to save thousands of U.S. dollars.\r\nIf you or someone you know is considering selling a property, we invite you to visit www.4u2incfsbo.com. After reviewing the information, simply email info@4u2incfsbo.com to begin.\r\nOur Price Guarantee:\r\n4u2 Inc. will match the lowest price offered by any competing FSBO platform—and then beat it with an additional 12% discount for the same level of service. If you can find a lower price, we will do better. Guaranteed.\r\nIf you prefer to work with a licensed professional, we can also connect you with a fully licensed, bonded, and insured Real Estate Agent in your area who can meet your specific needs.\r\n\r\nNow Hiring: English-Speaking Commissioned Account Executives\r\nPositions available immediately.\r\nResume/CV required.\r\nApply at info@4u2incfsbo.com'),
(816, 'Mozelle Culley', 'mozelle.culley@googlemail.com', 'Create Your Own Music in Just a Few Clicks - Just Point, Click & Create!', 'SoundSparkGenerator is a cloud-based tool that lets you create custom music styles in seconds by mixing genres, instruments, and vocal options. \r\n\r\nhttps://finsup.site/SoundSparkGenerator\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=afadbd.org\r\nAddress: 108 West Street Comstock Park, MI 48721'),
(817, 'Leandra Aguayo', 'aguayo.leandra46@msn.com', 'Creating new income streams is SO EASY', 'Book Ninja does everything for you in mINUTES,\r\nbuilding you a passive income for years to come...\r\nhttps://facommunication.site/BookNinja\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://facommunication.site/unsubscribe?domain=afadbd.org\r\nAddress: 108 West Street Comstock Park, MI 48721'),
(818, 'Mike William Muller', 'info@speed-seo.net', 'Find afadbd.org SEO Issues totally free', 'Hi, \r\nWorried about hidden SEO issues on your website? Let us help — completely free. \r\nRun a 100% free SEO check and discover the exact problems holding your site back from ranking higher on Google. \r\n \r\nRun Your Free SEO Check Now \r\nhttps://www.speed-seo.net/check-site-seo-score/ \r\n \r\nOr chat with us and our agent will run the report for you: https://www.speed-seo.net/whatsapp-with-us/ \r\n \r\nBest regards, \r\n \r\n \r\nMike William Muller\r\n \r\nSpeed SEO Digital \r\nEmail: info@speed-seo.net \r\nPhone/WhatsApp: +1 (833) 454-8622'),
(819, 'Laurel Earnest', 'earnest.laurel@msn.com', 'Still Missing Out on FREE Buyer Traffic from TikTok, YouTube, Instagram & Facebook ?', 'World\'s First AI App That Creates\r\nCinematic Clips, Shorts & Reels Completely Hands-Free\r\nIn 100s Of Language - In Just 60 Seconds\r\n\r\nhttps://fitgirlpack.site/MagicClipsAI\r\n\r\n\r\n\r\n\r\n\r\nto UNSUBSCRIBE:\r\nhttps://fitgirlpack.site/unsubscribe?domain=afadbd.org\r\nAddress: 209 West Street Comstock Park, MI 49321'),
(820, 'Michael Williams', 'michaelswills2022@gmail.com', 'Re: Explore Funding Opportunities', 'Greetings, Mr./Ms., \r\n \r\nI’m Michael Williams from an investment consultancy. We connect clients globally with low interest loans to help achieve your goals. Whether for personal, business or project funding, we collaborate with reputable investors to turn your proposals into reality. Share your business plan and executive summary with us at: michael.williams@lotusfinconsults.com to explore funding options. \r\n \r\nSincerely, Michael Williams \r\nSenior Financial Consultant \r\nhttp://www.lotusfinanceconsults.com/'),
(821, 'Andreas Eberhart', 'andreas.eberhart@msn.com', 'Create REAL iOS Apps With AI', 'Apple HATES This... But They Can\'t Stop Me From Showing You How I Built A Money-Making App In 12 Minutes\r\nNow I\'m Handing You The Exact System To Do The Same — Zero Coding Required\r\nhttps://hitclub66.site/MeeloAppEmpire\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nYou are contacted because we suppose it relates to your work.  \r\nIf you would like to stop messages, please use this path to UNSUBSCRIBE:  \r\nhttps://hitclub66.site/unsubscribe?domain=afadbd.org  \r\nAddress: 209 West Street Comstock Park, MI 49321  \r\nAll the best, Ethan Parker'),
(822, 'AmeliaAdary2807', 'isabellagaica508283@yahoo.com', '\"Embrace Passion\'s Irresistible Call\"', 'Let\'s make this a night to remember   -   https://https://nMm5id.short.gy/jEMfCL?Anemeda'),
(823, 'Alberta', 'sales@afadbd.org', 'Worth a quick look', 'Hi there,\r\n\r\nHope you’re having a great day.\r\n\r\nWe’re offering a special price for our FitRx™ Wireless Muscle Massager.\r\n\r\nhttps://easerelief.net\r\n\r\nIt’s rechargeable and app-controlled and works great for post-workout recovery and daily comfort.\r\n\r\nThe discount won’t last long, so don’t miss the deal.\r\n\r\nThanks,\r\nTeam FitRx™'),
(824, 'Sam', 'hireonline556600@outlook.com', 'Data Entry Services', 'My name is Sam. I provide data entry services starting from $8 USD per hour. I can handle any computer-related task that is repetitive in nature, such as entering data into software, collecting data, bookkeeping, copy-paste work, uploading content to websites, and following your business processes. I can also transcribe handwritten or scanned documents, update and maintain customer databases, cleanse and validate data, enter survey results and feedback, manage and update inventories, process invoices and receipts, create and update spreadsheets, input product details into e-commerce platforms, digitize paper records, manage email lists and contact information, perform data mining and extraction from websites, compile and organize data from various sources. You can outsource your entire business process to me, where tasks can be done remotely using a computer. I can learn your process and work on any software accordingly. \r\n\r\nReach out to me at Hireonline556600@outlook.com if you have any requirements and we can take a quick call.'),
(825, 'Nik', 'projectsbrandvisibilty@outlook.com', 'Website Redesign', 'Are you considering a complete redesign of your website to enhance its look and functionality? I specialize in creating modern, mobile-responsive, fast, and SEO-optimized websites that provide a seamless user experience and help convert visitors into clients. Whether you\'re looking to elevate your brand or boost product sales, I can assist. I just designed a Top-Notch Website for one of my clients and She is getting an amazing response right now. She is very happy. I can share her website link and you would definitely like it. \r\n\r\nFeel free to contact me at Projectsbrandvisibilty@outlook.com and let’s discuss it ahead.'),
(826, 'Abi', 'brandbuildingassistance@outlook.com', 'Boost Your Local Presence', 'Boost your Local presence and stand out with our expert Local SEO and Google My Business services! Elevate your visibility, attract more customers, and dominate your local market. Reach out to me today at Brandbuildingassistance@outlook.com and let\'s optimize your online presence starting at just $200 a month.'),
(827, 'Matt Bacak', 'mattbacak2025@gmail.com', 'What If You Could Run Local Agencies Without Doing the Work Yourself?', 'Imagine waking up to find your agency website already built, 100 pre-qualified leads discovered in your area, and outreach campaigns ready to send…\r\nAll done while you were sleeping.\r\nNo coding. No client-chasing. No proposals to write.\r\nThat’s exactly what LocalBizAI did for me.\r\nJust one click… and BOOM!\r\nA fully branded, profit-ready digital marketing agency with services, pricing, leads, and outreach campaigns set up in minutes.\r\n\r\n\r\nFor more click Here : https://jvz6.com/c/688203/424347/'),
(828, 'Maruf', 'test@gmail.com', 'test', 'test test test'),
(829, 'samir', 'samir@gmail.com', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_02_05_110131_create_executive_committee_table', 2),
(6, '2026_02_05_110529_create_team_members_table', 2),
(7, '2026_02_05_110648_create_programs_table', 2),
(8, '2026_02_05_110659_create_impact_table', 2),
(9, '2026_02_05_110709_create_stories_table', 2),
(10, '2026_02_05_110720_create_chief_executive_message_table', 2),
(11, '2026_02_05_110731_create_faq_table', 2),
(12, '2026_02_05_110742_create_volunteers_table', 2),
(13, '2026_02_05_113231_add_social_links_to_executive_committee_and_team_members_tables', 3),
(14, '2026_02_06_000001_add_values_to_mission_vision_table', 4),
(15, '2026_02_05_190409_create_sessions_table', 5),
(16, '2026_02_06_120000_create_payment_methods_table', 5),
(17, '2026_02_06_120001_create_donations_table', 5),
(18, '2026_02_06_120000_create_focus_areas_table', 6),
(20, '2026_02_06_151308_create_contacts_table', 7),
(21, '2026_02_07_000001_add_icon_path_to_focus_areas_table', 8),
(22, '2026_02_07_142821_create_publications_table', 9),
(23, '2026_02_07_180823_create_departments_table', 10),
(24, '2026_02_07_180842_create_jobs_table', 10),
(25, '2026_02_07_180857_create_job_applications_table', 10),
(26, '2026_02_08_000001_create_strategic_plans_table', 11),
(27, '2026_02_09_000001_add_description_to_strategic_plans_table', 12),
(28, '2026_02_09_000002_make_pdf_file_nullable_in_strategic_plans_table', 13),
(29, '2026_02_09_000003_add_image_and_make_pdf_required_in_strategic_plans_table', 14),
(30, '2026_02_10_173058_add_rating_and_beneficiary_title_to_stories_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `mission_vision`
--

CREATE TABLE `mission_vision` (
  `id` int NOT NULL,
  `vision` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `mission` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `values` text COLLATE utf8mb4_unicode_520_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `mission_vision`
--

INSERT INTO `mission_vision` (`id`, `vision`, `mission`, `values`) VALUES
(1, 'Contribute to establish an enabling environment for realization and protection of fundamental human rights of men and women where people are self-reliant as individuals.\r\nTest by Robiul', 'AFAD mission is to empower women particularly young women towards building a better world by developing their capacities and to make them active contributor within the society. Therefore AFAD undertakes initiatives/programs that empower the neglected portion of women who are deprived from rights and to ensure equal rights and opportunities for them.\r\nTest by Robiul', 'AFAD, the Association for Alternative Development, embodies a set of core values that guide its mission to empower marginalized communities in northern Bangladesh. Committed to integrity and transparency, AFAD operates with a dedication to promoting equality and social justice. Through innovative programs and collaborative partnerships, AFAD works to empower individuals and communities, fostering sustainable development and resilience. With a focus on accountability and respect for diversity, AFAD ensures that its initiatives have lasting positive impacts while upholding the rights and dignity of all stakeholders.\r\nfix and update by Robiul.make it dynamic'),
(3, 'Contribute to establish an enabling environment for realization and protection of fundamental human rights of men and women where people are self-reliant as individuals.', 'AFAD mission is to empower women particularly young women towards building a better world by developing their capacities and to make them active contributor within the society. Therefore AFAD undertakes initiatives/programs that empower the neglected portion of women who are deprived from rights and to ensure equal rights and opportunities for them.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ongoing_project`
--

CREATE TABLE `ongoing_project` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `ongoing_project`
--

INSERT INTO `ongoing_project` (`id`, `title`, `description`, `image`) VALUES
(18, 'Towards Greater Effectiveness and Timeliness in Humanitarian Emergency Response( ToGETHER)', 'The “Towards Greater Effectiveness and Timeliness in Humanitarian Emergency Response” Program, in short ToGETHER, is a collaborative initiative dedicated to advancing the localization of humanitarian action. Operating in eight countries, including Bangladesh, Colombia, DR Congo, Ethiopia, Indonesia, Myanmar, Pakistan, and Somalia, the program involves 40 local humanitarian partners and four international consortium partners from Germany (Caritas Germany, Diakonie Katastrophenhilfe, Malteser International, and Welthungerhilfe as the lead).\r\n\r\nThe primary goal of the ToGETHER Program is to support local humanitarian actors in taking a leading role in the delivery of effective, timely, accountable, and principled humanitarian actions in their respective countries. The implementation of the localization agenda is a prerequisite for achieving this overarching goal.', '9402508project.jpg'),
(19, 'Resilience strengthening of vulnerable populations in northern, western and eastern Bangladesh through a network approach of 5 partner organizations (BMZ-PT)', 'Vulnerable households are more resilient to the effects of climate change through community organizing, advocacy, the development of alternative livelihoods, localization, and emergency preparedness.', '5972211project.jpg'),
(20, 'Improve quality of life for women/girls and person with disabilities in Kurigram districts,Bangladesh through poverty alleviation and mainstreaming (AC-6) project', 'Vulnerable households are more resilient to the effects of climate change through community organizing, advocacy, device support, treatment support, the development of alternative livelihoods, localization, and emergency preparedness.', '3928750project.jpg'),
(21, 'Empower Vulnerable Women (EVW)', 'Vulnerable households are more resilient to the effects of climate change through community organizing, advocacy, the development of alternative livelihoods, localization, and emergency preparedness.', '6351140project.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int NOT NULL,
  `name` varchar(52) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `image`) VALUES
(1, 'German Federal Foreign Office ( GFFO) ', NULL),
(2, 'UN Women', NULL),
(5, 'Oxfam ', NULL),
(7, 'USCCB-Canada Bangladesh', NULL),
(8, 'European Commission & Water Aid Bangladesh', NULL),
(9, 'Action Aid Bangladesh ', NULL),
(10, 'Steps Towards Development, SDC & Netherlands Embassy', NULL),
(11, 'World Food Program (WFP)', NULL),
(12, 'Directorate Of Women Affairs (DWA)', NULL),
(13, 'NGO Forum ', NULL),
(14, 'UNICEF ', NULL),
(15, 'CLEAN Network', NULL),
(16, ' MJF', NULL),
(17, ' Center for Disabilities in Development (CDD)', NULL),
(18, 'COAST Foundation ', NULL),
(19, 'BMZ ', NULL),
(20, ' Global Fund for Women ', NULL),
(21, 'Global Fund for Children ', NULL),
(22, 'BRAC', NULL),
(23, 'Naripakkha', NULL),
(24, 'Concerned Women for Family Development ( CWFD)', '71753partner_donor.jpg'),
(25, 'Malteser International', '16001partner_donor.jpg'),
(26, 'Handicap International-Humanity & inclusion', '63631partner_donor.png'),
(27, 'Christian Aid', '93112partner_donor.png'),
(28, 'Save the Children', '80391partner_donor.png');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('adnannstu@gmail.com', '$2y$10$Rq2aJSKX04G91Gz9L6b/1O1ng50DPLQb1SXTiBAKjIeKuucH3aXLS', '2023-02-28 12:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_details` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `display_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `type`, `icon_image`, `account_name`, `account_number`, `bank_details`, `is_active`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'bkash', NULL, 'AFAD Bangladesh', '+8801825-003211', NULL, 0, 1, '2026-02-06 06:14:40', '2026-02-06 07:06:57'),
(2, 'nagad', NULL, 'AFAD Bangladesh', '+8801825-003211', NULL, 1, 2, '2026-02-06 06:14:40', '2026-02-06 06:14:40'),
(3, 'rocket', NULL, 'AFAD Bangladesh', '+8801825-003211', NULL, 1, 3, '2026-02-06 06:14:40', '2026-02-06 06:14:40'),
(4, 'upay', NULL, 'AFAD Bangladesh', '+8801825-003211', NULL, 1, 4, '2026-02-06 06:14:40', '2026-02-06 06:14:40'),
(5, 'bank', NULL, 'AFAD Bangladesh', '2050 2250 2050 XXXX', '{\"bank_name\":\"Islami Bank Bangladesh Limited (IBBL)\",\"branch_name\":\"Maijdee Court, Maijdee, Noakhali Sadar, Noakhali, Bangladesh\",\"routing_number\":\"125260674\"}', 1, 5, '2026-02-06 06:14:40', '2026-02-06 06:14:40'),
(7, 'visa', 'payment_icons/Azgy3Hy0cjv1b4WsIZFeesZFokqYgEcTfkAAVKYv.png', 'Maruf', '1234098779', NULL, 1, 0, '2026-02-06 07:11:15', '2026-02-06 07:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `policy_guideline`
--

CREATE TABLE `policy_guideline` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policy_guideline`
--

INSERT INTO `policy_guideline` (`id`, `name`, `file`) VALUES
(4, 'সুরক্ষা নীতিমালা ও কর্মপদ্ধতি', '31899policy_guideline.pdf'),
(6, 'Anti Fraud Policy and Fraud Response Plan', '16839policy_guideline.pdf'),
(7, 'শিশু সুরক্ষা নীতিমালা', '30045policy_guideline.pdf'),
(8, 'জেন্ডার পলিসি-রিভিউ', '93811policy_guideline.pdf'),
(9, 'AFAD Constition', '92234policy_guideline.pdf'),
(10, 'AFAD-Legal Status', '73880policy_guideline.pdf'),
(11, 'AFAD Child Protection Policy', '32564policy_guideline.pdf'),
(12, 'AFAD Financial Policy', '85587policy_guideline.pdf'),
(13, 'AFAD HR Policy', '41040policy_guideline.pdf'),
(14, 'AFAD MEAL Policy', '78964policy_guideline.pdf'),
(15, 'AFAD Safeguarding Policy', '24171policy_guideline.pdf'),
(16, 'AFAD Safety & Security Policy', '17542policy_guideline.pdf'),
(17, 'AFAD Whistleblowing Policy', '79815policy_guideline.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `status` enum('active','completed','upcoming') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `title`, `description`, `image`, `start_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PADMA', 'Testing PADMA Program', '95353program.png', NULL, 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int NOT NULL,
  `name` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `partners` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `from_date` date DEFAULT NULL,
  `date` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `to_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `partners`, `from_date`, `date`, `to_date`) VALUES
(2, 'Life Skill Education for Adolescent Development (LEAD)', 'USCCB-Canada Bangladesh', '2008-02-09', 'Feb  2008 - Dec  2010', NULL),
(3, 'Adolescent Development Project (ADP)', 'Action Aid Bangladesh', '2007-01-04', 'Jan  2007 - Dec  2011', NULL),
(4, 'Gender And Good Governance', 'Steps Towards Development, SDC & Netherlands Embassy', '2007-01-03', 'Jan  2007 - Oct  2013', NULL),
(5, 'Training And Nutrition Center (TNC)', 'World Food Program (WFP), Directorate Of Women Affairs (DWA)', '2002-06-12', 'June  2002 - July  2005', NULL),
(6, 'NGO & Civil Society networking project (NCSNP)', 'NGO Forum and UNICEF', '2005-06-14', 'June2005 - Dec  2010', NULL),
(7, 'Reaching Out of School Children project (ROSC)', 'World Bank, SDC & Directorate Of Primary Education', '2004-07-24', 'July  2004 - June  2010', NULL),
(8, 'Hazardous Child Labour reduction movement (HCLRM)', 'CLEAN Network & MJF', '2004-01-03', 'Jan  2004 - June  2009', NULL),
(9, 'Adolescent Livelihood opportunities (ALO)', 'USCCB-Canada Bangladesh', '2011-04-23', 'April 2011 - May 2015', NULL),
(10, 'For the Women by The Women', 'MJF & Action Aid Bangladesh', '2006-01-01', '2006 - 2009', '2009-01-31'),
(11, 'Promoting Science Education in secondary Schools (PSE)', 'Bangladesh freedom Foundation (BFF)', '2011-01-01', '2011 - 2016', '2016-01-01'),
(12, 'Strengthening Capacity & Networking Of NSAs and on disability (SCANED)', 'Center for Disabilities in Development (CDD)', '2014-01-16', '2014 - 2017', '2017-03-17'),
(13, 'Enhancing community-based service & effective education for deaf blind people in Bangladesh', 'Center for Disabilities in Development (CDD)', '2011-01-12', '2011 - 2021', '2021-12-25'),
(14, 'South Asia Young Womens Leadership and Mentoring Initiative', 'Global Fund for Women', '2017-01-21', '2017 - 2020', '2020-09-16'),
(15, 'Women Friendly Hospital', 'Nariphaka', '2011-03-09', '2011 - 2016', NULL),
(16, 'NEPE-ESP', 'BRAC', '2005-01-17', 'Jan  2005 - Dec  2010', NULL),
(17, 'DIPTYA-2', 'Manusher Jonno Foundation', '2019-11-07', 'Nov 2019 - ', NULL),
(18, 'Empowering Local and National Humanitarian Actors (ELNHA)', 'OXFAM & MJSKS', '2017-09-08', 'Sep 2017 - March2021', NULL),
(19, 'Emergency Medical Relief for the Flood Victim in Kurigram District', 'AMDA Bangladesh', '2020-07-10', 'Jul-20', NULL),
(20, 'Enhance Capacity of flood affected Women-headed households for lifesaving   economic/ livelihood restoration', 'UN WOMEN & Christian Aid', '2019-11-08', 'Nov 2019 - Feb 2021', NULL),
(21, 'Promoting womens leadership through partnerships with women-led and womens   rights organizations in Disaster Risk Reduction and resilience building', 'UN WOMEN & Christian Aid', '2020-06-07', 'June 2020 - August 2020', NULL),
(22, 'Enhancing Capacity and income generation of the marginalized Women affected by COVID 19 & monsoon flood in northwest Districts of Kurigram & Jamalpur , Bangladesh', 'Christian Aid', '2021-04-13', 'Feb 2021 - July 2021', NULL),
(23, 'Towards Greater Effectiveness and Timeliness in Humanitarian Emergency Response(ToGETHER)', 'Malteser International', '2021-04-16', 'April 2021 - February 2023', NULL),
(24, 'Humanitarian Operation And Innovation Facility (HOIFA)', 'Malteser International', '2021-12-10', 'December 2021 - March 2022', NULL),
(25, 'Resilience strengthening of vulnerable populations in northern, western and eastern Bangladesh', 'Malteser International', '2022-12-10', 'December 2022 - June 2025', NULL),
(26, 'Participatory actions on Resilience(PAR-2)', 'Christian Aid Bangladesh', '2022-02-24', 'February 2022  -  December 2022', NULL),
(27, 'Anticipatory Action setup and pilot Programme', 'Christian Aid Bangladesh', '2022-06-10', 'June 2022 - November 2022', NULL),
(28, 'Golbal Fund for women', 'UN Women', '2022-06-03', 'June 2022 - June 2024', NULL),
(29, 'Local Humanitarian Leadership Project(LHL)', 'Oxfam Bangladesh & MJSKS', '2022-09-05', '23 Sep 2022 - 22 October 2022', NULL),
(30, 'Global Fund For Children', 'Global Fund For Children', '2022-08-31', '31 August 22 - 30 August 2023', NULL),
(31, 'SRHR relief services in flood affected area of Bangladesh', 'Naripokkho', '2022-09-09', 'Sep-22', NULL),
(32, 'Emergency Flood response Programme to Kurigram and Jamalpur', 'UN Women and BCAS', '2022-11-10', 'November 2022  -  December 2022', NULL),
(33, 'Towards Greater Effectiveness and Timeliness In Humanitarian Emergency Response(ToGETHER)', 'Malteser International', '2024-05-01', NULL, '2027-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `title`, `description`, `thumbnail`, `pdf_file`, `created_at`, `updated_at`) VALUES
(2, 'Annual Impact Report 2025', 'Overview of our programs, outcomes, financials, and community impact across all regions.', '10445publication_thumbnail.jpg', '53467publication.pdf', NULL, NULL),
(3, 'Water & Sanitation Sustainability Report 2024', 'Documentation of WASH interventions, challenges, and sustainability recommendations.', '70262publication_thumbnail.jpg', '16591publication.pdf', NULL, NULL),
(4, 'Girls’ Education Empowerment Study', 'Research on enrollment, retention, and gender-based barriers in education for underserved communities.', '66140publication_thumbnail.jpg', '61147publication.pdf', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `description`, `image`) VALUES
(14, 'Association For Alternative Development (AFAD)', 'test test  Support the Women’s Empowerment Initiative today—help women build livelihoods, confidence and a brighter future.', '8163422slider.jpg'),
(17, 'Women Leadership', 'A panel discussion on Women Leadership was held on 3rd November 2025 in Bali, Indonesia, as part of the South-South Exchange Workshop. Our Chief Executive, Sayda Yesmin, attended the meeting as a representative of Bangladesh. The discussion included participants from four countries — Indonesia, Myanmar, Pakistan, and Bangladesh — who shared their perspectives and experiences on promoting women’s leadership and empowerment.', '7509991slider.jpeg'),
(19, 'hhhhhhhhhhhhhhh', 'vjhfLSDGFhSJLDvb lsjHGFi\r\n                           asghjsdm nvjdskHFKJcnjjvhbiHGjHHfihf', '8402279slider.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` bigint UNSIGNED NOT NULL,
  `rating` int NOT NULL DEFAULT '5',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beneficiary_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beneficiary_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `rating`, `description`, `image`, `beneficiary_name`, `beneficiary_title`, `date`, `created_at`, `updated_at`) VALUES
(1, 5, 'kala golar mala', '27420story.png', 'mee to me', 'cumilla', '2026-02-19', NULL, NULL),
(2, 5, 'uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu', '81196story.png', 'Dr kamal hossain', 'Sylhet', '2026-02-19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `strategic_plans`
--

CREATE TABLE `strategic_plans` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `strategic_plans`
--

INSERT INTO `strategic_plans` (`id`, `title`, `description`, `image`, `pdf_file`, `created_at`, `updated_at`) VALUES
(1, 'Padma-1', NULL, '86024strategic_plan_image.png', '35262strategic_plan.pdf', '2026-02-09 06:25:19', '2026-02-09 06:25:19'),
(2, 'Padma-2', 'Introducing Padma-2', '88487strategic_plan_image.jpeg', '57393strategic_plan.pdf', '2026-02-09 06:27:59', '2026-02-09 06:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `name`, `email`) VALUES
(4, 'Jane Alam Adnan', 'adnannstu@gmail.com'),
(5, 'ftuFMDQNUJBGu', 'gatesbaldrikj75@gmail.com'),
(6, 'ccreepbybRMXk', 'larriri69@gmail.com'),
(7, 'PcVOPlKse', 'averyarabel43@gmail.com'),
(8, 'EvdiUQmxQ', 'djoandrapowellfb2005@gmail.com'),
(9, 'IURZRUlWp', 'kingharlandmi6@gmail.com'),
(10, 'FJQOAECcD', 'korbinb2006@gmail.com'),
(11, 'fYRWcYgwNWIodSg', 'bennestefan1997@gmail.com'),
(12, 'SwAHCBcgRrWwnl', 'sharmonft1@gmail.com'),
(13, 'BwgFUTEzbtJj', 'aleksarobisc30@gmail.com'),
(14, 'rWhSDfNpEm', 'alfredkeithup@gmail.com'),
(15, 'GrEqKPnQy', 'hilarip11@gmail.com'),
(16, 'TLSfbKvYcGNM', 'roilbelld1987@gmail.com'),
(17, 'lrKnLzkznImTzZ', 'djosamoq26@gmail.com'),
(18, 'myqAKVXEI', 'milfordhooper32@gmail.com'),
(19, 'kWoGpQlVZf', 'roachidatq50@gmail.com'),
(20, 'iiIxYAiKCh', 'aguilardjaknf@gmail.com'),
(21, 'qtJNReJS', 'linemmersonv4@gmail.com'),
(22, 'TSKhEAbyF', 'hbartlettf37@gmail.com'),
(23, 'gsTnqPiUt', 'vfishery1994@gmail.com'),
(24, 'szUQNCXbfvS', 'bdjaddyy@gmail.com'),
(25, 'FtsZoaAQhcpMJ', 'bradleyadriann33@gmail.com'),
(26, 'SVxDcsMmos', 'hyntleibrockhp1991@gmail.com'),
(27, 'KWgNixUAGlRpaN', 'hedleiterry@gmail.com'),
(28, 'fjIArsmPxSjE', 'hjoycer59@gmail.com'),
(29, 'hibRtphxhJcZKf', 'arabelritterx25@gmail.com'),
(30, 'wmcRpkAzJcjQC', 'charlineallisond18@gmail.com'),
(31, 'sdGTGrEwly', 'aroachkn41@gmail.com'),
(32, 'TGjmMnwpI', 'kentmir6@gmail.com'),
(33, 'TEuEdAKqjHkYCs', 'reifrober2005@gmail.com'),
(34, 'osqkRMzXBFCbHK', 'raitsilvajm@gmail.com'),
(35, 'jVFBUpBIfvZVO', 'rshannonbq1989@gmail.com'),
(36, 'ZhJnzUanqYS', 'marmaduksweeney18@gmail.com'),
(37, 'aoCrKhbB', 'wrightelizabeth226362@yahoo.com'),
(38, 'HCuuHRifd', 'reksboyjo@gmail.com'),
(39, 'BtFhVmHt', 'hiuhanc@gmail.com'),
(40, 'qIjWzUrWf', 'vinmcgmx45@gmail.com'),
(41, 'SmfaxSGU', 'poliarroyo1986@gmail.com'),
(42, 'FrUNXaivqZY', 'elidjaolsonv56@gmail.com'),
(43, 'aOcYWusbxSBwaV', 'daniellebell718041@yahoo.com'),
(44, 'LBAFgOwijAg', 'druizod@gmail.com'),
(45, 'BZKbBNvQbPGApo', 'mosleyoerikwz6@gmail.com'),
(46, 'yotdlKoq', 'mullinsbrentt@gmail.com'),
(47, 'GiTIaYxKfNR', 'fterransi30@gmail.com'),
(48, 'IoxPBAXKPp', 'manniksckh21@gmail.com'),
(49, 'JJrtVXKSOLkw', 'macdondjervur4@gmail.com'),
(50, 'xchNUORlrtgUu', 'moirhuertlz45@gmail.com'),
(51, 'eGLerLAVauA', 'stevesingletary773121@yahoo.com'),
(52, 'eqyGCPbuEwb', 'kfigueroav5@gmail.com'),
(53, 'QiApfaxcJralG', 'cardelanni1984@gmail.com'),
(54, 'ZbyzbMEaVyoZmqB', 'bazcjw17@gmail.com'),
(55, 'MEVDwtnLpvWUzmi', 'chanteilburchit1982@gmail.com'),
(56, 'vptfygsnii', 'vsodtfoi@testform.xyz'),
(57, 'CQNXSVRWBxYQP', 'dhoustonq1989@gmail.com'),
(58, 'OgAWpGkFDLLvI', 'cruzkatie1985@yahoo.com'),
(59, 'inZutricTSFTfyN', 'oliverrodgersxi@gmail.com'),
(60, 'pxVgMOTXXLjWw', 'samphemfria89@gmail.com'),
(61, 'VdcCeCsgWiUvNJd', 'dizonharrisl50@gmail.com'),
(62, 'LZakRxqRvKgYOPJ', 'kolavillai1998@gmail.com'),
(63, 'ULnVOatM', 'dlennihc16@gmail.com'),
(64, 'AjXliaBm', 'larsonbrandayasj49@gmail.com'),
(65, 'cRhYSskg', 'kllaspencern32@gmail.com'),
(66, 'QdpULTrOLukrYw', 'travisalish2003@gmail.com'),
(67, 'iQYsYAVUQxBtcxv', 'willidje34@gmail.com'),
(68, 'bxfoMsKZPOYGg', 'shelleimillerxt43@gmail.com'),
(69, 'GVAWKXRKveuY', 'djyliannli5@gmail.com'),
(70, 'bymgWyvcLoTkT', 'olleistarjohnsond3@gmail.com'),
(71, 'zTImYHkDZdBhig', 'kjoneskc1990@gmail.com'),
(72, 'tTnxYrtxtyrUi', 'bartotianiv1985@gmail.com'),
(73, 'FZEhoxFn', 'forbesdjaddkx1@gmail.com'),
(74, 'sQubGrdI', 'obinbraync5@gmail.com'),
(75, 'pnGVDCyEgn', 'hpopeox1999@gmail.com'),
(76, 'MBoaLBYZaP', 'yilbepennindq50@gmail.com'),
(77, 'YSRZSLjNuwEa', 'teligoqoziv802@gmail.com'),
(78, 'JOYoLkKpWCHOy', 'yidaracexemo49@gmail.com'),
(79, 'DtRgYhpNWud', 'abekebafa341@gmail.com'),
(80, 'tWiSXdBMNeYogpQ', 'sarahall698698@yahoo.com'),
(81, 'xakAihaBUH', 'pbraien48@gmail.com'),
(82, 'ibDYtZeSzTjaBI', 'jonesregina1970@yahoo.com'),
(83, 'dHRVzMCpeRNU', 'schafer_tina1979@yahoo.com'),
(84, 'YQjMQVBeFnBpz', 'ekgberktmonroej3@gmail.com'),
(85, 'GOgjnFnaxuXlTK', 'graves_heather1994@yahoo.com'),
(86, 'JxBrcssNNLUO', 'lambertdanielle402843@yahoo.com'),
(87, 'GmWLQFFFWmvoE', 'linda_love1982@yahoo.com'),
(88, 'GlCOChPRYTENYRS', 'littlereilinql57@gmail.com'),
(89, 'gugfuvlyqf', 'uolldfxm@testform.xyz'),
(90, 'fdrOBiIqGF', 'gibbonsdavione946729@yahoo.com'),
(91, 'XVSSHVuSM', 'carteramanda164702@yahoo.com'),
(92, 'KLKWCfPmsGyOuGl', 'teresagomez732948@yahoo.com'),
(93, 'limhnoMAZLLPtN', 'eisnerbrittany474082@yahoo.com'),
(94, 'dbPYmxIeV', 'elliedavis910486@yahoo.com'),
(95, 'TQgNWOoLDZOqC', 'mudejuca41@gmail.com'),
(96, '* * * Unlock Free Spins Today: http://m-emp.com/index.php?jdaqzm * * * hs=b1915f357f7e25f37f4d18e4701e6514* ххх*', 'pazapz@mailbox.in.ua'),
(97, 'NftHCVZmstS', 'odalejetak889@gmail.com'),
(98, 'bLHcnybCZQYGgz', 'agasetolina006@gmail.com'),
(99, 'AMGDyQzZipvpOyr', 'irigexojofe212@gmail.com'),
(100, 'GlJVsrqox', 'owamotuka300@gmail.com'),
(101, 'WxLnCSIEiHw', 'oqixokajek28@gmail.com'),
(102, 'QLtHSFLdhKyF', 'henrydanielvv22@gmail.com'),
(103, 'MyfvkgCuNZMwSmy', 'ugijotagarew67@gmail.com'),
(104, 'wDRooJmVdMRc', 'yisenofoni719@gmail.com'),
(105, 'CvioTHajhMpZLD', 'heinemann_ashley1995@yahoo.com'),
(106, 'VZUoqEGZlmsux', 'lizwarre23@gmail.com'),
(107, 'aEPpfbKaKRIxpRu', 'lascoadrian999714@yahoo.com'),
(108, 'QqUaghwEuBIs', 'wilkgvadetg2005@gmail.com'),
(109, 'PJrEKsLvQG', 'yilfridh91@gmail.com'),
(110, 'UrLoNpMY', 'curulinos38@gmail.com'),
(111, 'TpKJpGQwBe', 'seminabopi738@gmail.com'),
(112, 'UDzAoEprkQefBX', 'shamycharlsn5@gmail.com'),
(113, 'ouUKzIkpCJ', 'dogimotuz86@gmail.com'),
(114, 'KiIpenOGMMRfgm', 'kotaquwo106@gmail.com'),
(115, 'IRCIJMeqnSiWKw', 'jenkinshelen6392@yahoo.com'),
(116, 'qgJbjksQsUN', 'eviolsoner@gmail.com'),
(117, 'BOQOWJVm', 'eoforherdsog46@gmail.com'),
(118, 'ywdCuaUgO', 'aellaadamsu@gmail.com'),
(119, 'lwGxaSpXkuqve', 'abnaravexa13@gmail.com'),
(120, 'blQMPAqNCgnEVk', 'yuinnodjenf9@gmail.com'),
(121, 'qPtgIlkOodTAeO', 'andriconwaymh9@gmail.com'),
(122, 'vraiIfkGn', 'griffiletil1992@gmail.com'),
(123, 'mzYSyBGUBUzr', 'sheridanclaytonlx@gmail.com'),
(124, 'AueCdOCkIX', 'vindzormn43@gmail.com'),
(125, 'tpEoryqHfxGqQbm', 'dbeardx@gmail.com'),
(126, 'PHChLRYrk', 'eoforhildhorton@gmail.com'),
(127, 'foiMfmcSfizteNG', 'ujufixetim78@gmail.com'),
(128, 'NGHzYEsNkvX', 'npetersenbi52@gmail.com'),
(129, 'lnJypJhRNqsb', 'purapaj926@gmail.com'),
(130, 'XOUAsoXPpDj', 'fritzentoni28@gmail.com'),
(131, 'qFpOsnPrDYE', 'mullenmodiok@gmail.com'),
(132, 'DsRoyzSAi', 'efigura269@gmail.com'),
(133, 'LiRIWKvnUGQHG', 'niguviraxot126@gmail.com'),
(134, 'tvPWUckkm', 'ofarotok131@gmail.com'),
(135, 'pbRYDZQWnUdmy', 'zixivexiqom81@gmail.com'),
(136, 'halbNkiWAfQQpGv', 'mccardarta65@gmail.com'),
(137, 'fNTRiYgxMyQebct', 'nikkoylrf@gmail.com'),
(138, 'NJUgQFTuZx', 'diggorismallbc47@gmail.com'),
(139, 'WHhjSwGsXHI', 'idixekevil34@gmail.com'),
(140, 'aFaljDZuUNDoYa', 'imubuso320@gmail.com'),
(141, 'RzocFerMWZmxxd', 'pathakdavid809090@yahoo.com'),
(142, 'UghrNgtop', 'carrdjelissaq23@gmail.com'),
(143, 'WcYXLgierbwUP', 'ogupavutapu58@gmail.com'),
(144, 'dhOVBIWBTA', 'vanuyekeril767@gmail.com'),
(145, 'bWyCdyHrvI', 'mmcfarlandgd50@gmail.com'),
(146, 'UuIXagTnpvPL', 'akamazusumar40@gmail.com'),
(147, 'ioJpAgNgMngqQp', 'obiroqovaki182@gmail.com'),
(148, 'UpDyiRizLn', 'agelubize95@gmail.com'),
(149, 'pIcIYETTMVlIaIS', 'jihozusom25@gmail.com'),
(150, 'exzmTrqumBYYVwN', 'berilenalur716@gmail.com'),
(151, 'XfbNdmWQ', 'djitarice@gmail.com'),
(152, 'uBvKMosqL', 'mulipufemo724@gmail.com'),
(153, 'KOUCyUPauXJAFJ', 'manndastin1987@gmail.com'),
(154, 'SxAmFQZM', 'danielseldven@gmail.com'),
(155, 'QwIYdUoGkHPGTw', 'erindavis611500@yahoo.com'),
(156, 'FepXGGqiIEXohj', 'beardarli1995@gmail.com'),
(157, 'YunYjZMTKnW', 'brandihunter660838@yahoo.com'),
(158, 'JPMyuhLuAFxcWqD', 'fizelixo08@gmail.com'),
(159, 'lFNCDCmvLppDNgy', 'wihuropohi51@gmail.com'),
(160, 'IFbmrkkK', 'vehiwuhu699@gmail.com'),
(161, 'EykCuAyXa', 'larsonsteven581866@yahoo.com'),
(162, 'EkdozxcjqBSHTz', 'etilugopo719@gmail.com'),
(163, 'nLPYjLxjYmGjsJ', 'mooreerin75415@yahoo.com'),
(164, 'bThEZTincJ', 'maciasmerile@gmail.com'),
(165, 'tlwemdlogz', 'uziymuoo@testform.xyz'),
(166, 'YJnFzrTdl', 'thaobrian396701@yahoo.com'),
(167, 'CoeEiCKmShSIPOd', 'roxofafiler446@gmail.com'),
(168, 'ZZYnQxRmcSbQEz', 'melissagibson532231@yahoo.com'),
(169, 'swpBadQNEZvCuI', 'ehuduwuru873@gmail.com'),
(170, 'eKmWCaCmfiW', 'esizucirase74@gmail.com'),
(171, 'SdkRRZJveBeWu', 'uvoyufuziq67@gmail.com'),
(172, 'ITJNGTwvGYN', 'aleksandracuo1984@gmail.com'),
(173, 'TMuwpkgpuU', 'eidencox17@gmail.com'),
(174, 'zaqsNqQJxehQdZ', 'eleahd1996@gmail.com'),
(175, 'mivBaqnOWrmpi', 'cherylfisher452764@yahoo.com'),
(176, 'mFSOihIKblcN', 'vevehicog45@gmail.com'),
(177, 'BxuBSxHcOXRM', 'johnkuony1987@yahoo.com'),
(178, 'eAJMiYwWFt', 'haqizepuj909@gmail.com'),
(179, 'zNArnnXYH', 'simsangel1992@yahoo.com'),
(180, 'reiSqVJoz', 'robojowajir45@gmail.com'),
(181, 'jgMKsgjGUkd', 'ivahaqi377@gmail.com'),
(182, 'uxnKbtFF', 'shortgregory125722@yahoo.com'),
(183, 'yVVVJYVkuig', 'anibivutogi428@gmail.com'),
(184, 'BUPJutvtE', 'davefagiqut97@gmail.com'),
(185, 'pHbVnqwFimAhiB', 'usucikayamun69@gmail.com'),
(186, 'TJqXTKeueURagHi', 'gulasuhan247@gmail.com'),
(187, 'qzDTmJRL', 'usehucihicow84@gmail.com'),
(188, 'dScPCcTiZKLQ', 'adazeloxo42@gmail.com'),
(189, 'zWZwCEKmm', 'afemevojezu74@gmail.com'),
(190, 'EBQynfudQvrZCLb', 'icoqizafe621@gmail.com'),
(191, 'rnyRYrOdRstKLJC', 'rokohixi80@gmail.com'),
(192, 'qUMRTRdBJa', 'jejiwebo153@gmail.com'),
(193, 'tsFedAsDzVvyXZ', 'samsubramani385245@yahoo.com'),
(194, 'rmSsdMQDXoafN', 'bevicimigib336@gmail.com'),
(195, 'TBeNJxLBF', 'silvalinda68591@yahoo.com'),
(196, 'HBsXoDwkvMYGN', 'teyoripi803@gmail.com'),
(197, 'CIiexYfZw', 'jupozizaca868@gmail.com'),
(198, 'EJAUTwlKyFiTS', 'heranot581@gmail.com'),
(199, 'QNggSfeMotHZGpm', 'oveqawet24@gmail.com'),
(200, 'NDxkmwkxAoZpwP', 'afiquyela71@gmail.com'),
(201, 'WfUxINQEGNmPvoh', 'afomufivik35@gmail.com'),
(202, 'ZcMlfPNuO', 'nopohufuxej416@gmail.com'),
(203, 'EkuppjDFUoUFghr', 'azefisasowo953@gmail.com'),
(204, 'PFDsHohXkq', 'qijudonabo94@gmail.com'),
(205, 'xTneBdvvA', 'ayayotuyah79@gmail.com'),
(206, 'isGioYVFQoq', 'vedavimequd744@gmail.com'),
(207, 'CjcRCDOs', 'ocitojigasow47@gmail.com'),
(208, 'DtHTRdlcMrXB', 'asitoxakogut56@gmail.com'),
(209, 'iPvmqsbq', 'hoxuboni83@gmail.com'),
(210, 'gPfmcebCei', 'ufaqebubiwe908@gmail.com'),
(211, 'xskVTYKBkBNEh', 'ikedukekade56@gmail.com'),
(212, 'KGEnvlduPa', 'dulefeyakut33@gmail.com'),
(213, 'mjZbjfEGcztT', 'wocorop498@gmail.com'),
(214, 'MaczGgRLhDLbAYL', 'sacerusacayo35@gmail.com'),
(215, 'iBOWhsgV', 'wevahusetib890@gmail.com'),
(216, '* * * No tricks No catch Just an iPhone 16 with your name on it: https://www.graficamassoni.com.br/index.php?tpkaqg * * * hs=b1915f357f7e25f37f4d18e4701e6514* ххх*', 'paouqua@mailbox.in.ua'),
(217, 'VQCHuKEtf', 'avizuvi145@gmail.com'),
(218, 'QBhitOfsjrHqSP', 'olocoriyil73@gmail.com'),
(219, 'fMubikaL', 'ucisefaqel422@gmail.com'),
(220, 'aUNaCiVblWpuTO', 'onicodij48@gmail.com'),
(221, 'XkLVnSByknYrwXJ', 'betenidt7@gmail.com'),
(222, 'IrqVnJETIyC', 'bobehevi776@gmail.com'),
(223, 'MFkzDyKPqtXN', 'vexosaribeke99@gmail.com'),
(224, 'EPapWOOBS', 'beqehame914@gmail.com'),
(225, 'pZRjkYJtNzFK', 'vatikab343@gmail.com'),
(226, 'ramDpCYJcgvhn', 'ohuxirebunat29@gmail.com'),
(227, 'WcbzIDpjJa', 'amexaliquzix40@gmail.com'),
(228, 'QElvnWJZzMiLjZ', 'ihigakuhe54@gmail.com'),
(229, 'gTyauKwpwQIg', 'ihumuzucar85@gmail.com'),
(230, 'AZjiVgaYaf', 'qivadaja036@gmail.com'),
(231, 'nhHAyiHOruNxV', 'odeqesi973@gmail.com'),
(232, 'dkGRRJxEo', 'otumibak135@gmail.com'),
(233, 'ZDCYMeJSnKOLU', 'mujomuzekej121@gmail.com'),
(234, 'IGhpEQuugH', 'lamixipemima45@gmail.com'),
(235, 'MeAleoiMZzPW', 'unezawerev90@gmail.com'),
(236, 'UnLkSulzVlsSe', 'aboxozavuxul91@gmail.com'),
(237, 'vIneEzmHqloeEaj', 'eqigegi076@gmail.com'),
(238, 'pzMWPBVqfVUR', 'efuhedoja636@gmail.com'),
(239, 'sCIctgvqnHz', 'wtddwfisgpm3@yahoo.com'),
(240, 'UVziAOOmKK', 'upijutusil907@gmail.com'),
(241, 'YYDsCeyrCviW', 'ohakaxobi498@gmail.com'),
(242, 'yoTWEVDkNre', 'xgbojg9iw466f@yahoo.com'),
(243, 'KTPtFyoMHxDjn', 'vasedelovicu76@gmail.com'),
(244, 'JAKVRQcFOhx', 'gaxaqupacuf37@gmail.com'),
(245, 'isNadbDzZ', 'baqoman731@gmail.com'),
(246, 'QShbDGnP', 'ijopakaqovo27@gmail.com'),
(247, 'xyOraWxAjUEjbS', 'aetveitofstetterijxs@yahoo.com'),
(248, 'NIBQfbaeeoNSubA', 'locesuzemomu41@gmail.com'),
(249, 'JQHgMQebWx', 'leyedovoz13@gmail.com'),
(250, 'lVToMYmmZN', 'iwubehexu351@gmail.com'),
(251, 'eWiytTbIfKt', 'mijamadaco32@gmail.com'),
(252, 'lFHKAlWe', 'bikedanogoz70@gmail.com'),
(253, 'kTaaWGwsnBLta', 'ovihoto759@gmail.com'),
(254, 'UZwoBIsG', 'ewvqejtsgyh@yahoo.com'),
(255, 'yssrFYQiLf', 'bead1yltqb@yahoo.com'),
(256, 'Sptasdsicva', 'larikufu42@gmail.com'),
(257, 'pgtIjDEU', 'przedpelskid2xsweher@yahoo.com'),
(258, 'bMLwUoJGyd', 'osuceyix712@gmail.com'),
(259, 'hLFKggcWNeZ', 'arvizuq6vwily@yahoo.com'),
(260, 'BBHWZlVLHz', 'ijaviniji431@gmail.com'),
(261, 'AlNCsqttnXG', 'bunemomide150@gmail.com'),
(262, 'BhisZIGgyobQ', 'jsaokszzq40q@yahoo.com'),
(263, 'iAGCKWJut', 'uvotuhowu42@gmail.com'),
(264, 'OwxfmXbFxHCci', 'ebaqezilave033@gmail.com'),
(265, 'XJHnmAbSlpBDe', 'xicegatusad818@gmail.com'),
(266, 'QPVJbgWQSHSmv', 'avafoxodubu473@gmail.com'),
(267, 'WugNHSmHe', 'ocohusadike22@gmail.com'),
(268, 'pWfPDxnYUV', 'azisobeqasom36@gmail.com'),
(269, 'pSYRfafGqxYk', 'utqlfchnb@yahoo.com'),
(270, 'AtBqazIFM', 'mga5b4bvhbvwisu@yahoo.com'),
(271, 'HQOuZGAsckh', 'akivudoloj54@gmail.com'),
(272, 'tnCDEDMS', 'icuqiwixirut00@gmail.com'),
(273, 'ImVJrUPvPUfiylDq', 'apasoxefadi443@gmail.com'),
(274, 'bxTSWERKaghLEV', 'sokahevajayu01@gmail.com'),
(275, 'xxtnOKvbCOuEDPz', 'rawuwak492@gmail.com'),
(276, 'emQgSnVbrHf', 'adupenepa06@gmail.com'),
(277, 'aTZGrpReHRnipcQhqgeg', 'iritajajal22@gmail.com'),
(278, 'phKOOwpVpmWVLDYabwukC', 'ifusikusab114@gmail.com'),
(279, 'mfHHGPLLImgftqqY', 'jicegenowec72@gmail.com'),
(280, 'VhNPbHJgsYGfTyHPPusL', 'semodewopupu94@gmail.com'),
(281, 'Md. Iftekhar Alam Efat', 'iftekhar.iit@nstu.edu.bd'),
(282, 'qLSxXGxmLcPWciXoiubnIOFP', 'aarenc9096@gmail.com'),
(283, 'PAoDtwVchmtXvIJxPqTsQPW', 'sumawavebi824@gmail.com'),
(284, 'qaZkKXHIfaJcxHSJLLey', 'usigejihu168@gmail.com'),
(285, 'FCobRtkoiAVsqXlypwKJgt', 'ijetibira792@gmail.com'),
(286, 'jXsaxvDTIRKeXRxsIk', 'okequniway07@gmail.com'),
(287, 'mYwrluYEvITROCbSrLF', 'hoyaxilijuy531@gmail.com'),
(288, '* * * $3,222 credit available! Confirm your transaction here: https://www.olipap.ch/?gavn0h * * * hs=b1915f357f7e25f37f4d18e4701e6514* ххх*', 'ydx~nwa9pwyxz@mailbox.in.ua'),
(289, 'EhOQAgaYphmgLUPG', 'gehuhap195@gmail.com'),
(290, 'NhojobbRJLqMsUwmYoi', 'o.wu.l.oz.i.w.44@gmail.com'),
(291, 'fiwkgtmzph', 'iezgnowv@forms-checker.online'),
(292, 'wIKGcGxXCgcvkaLdCI', 'z.u.k.a.s.o.c.i.ko.8.8@gmail.com'),
(293, 'admin123', 'mamaruf317@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `name`, `designation`, `photo`, `department`, `bio`, `facebook`, `twitter`, `instagram`, `youtube`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Mofassel Alam Maruf', 'chef', '61831team.png', 'AFAD', 'Hello I am Maruf', 'https://www.facebook.com/marufbro310', NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ashik', 'ashik@gmail.com', NULL, '$2y$10$.PEK0gswnXy0m1OD/Q3hQOpCGc8qmLr/uZujz1zDRQHdt9pRf10eW', 0, NULL, NULL, NULL),
(2, 'Adnan', 'adnan@gmail.com', NULL, '$2y$10$.PEK0gswnXy0m1OD/Q3hQOpCGc8qmLr/uZujz1zDRQHdt9pRf10eW', 0, NULL, NULL, NULL),
(3, 'Afadbd', 'afadbd@gmail.com', NULL, '$2y$10$.PEK0gswnXy0m1OD/Q3hQOpCGc8qmLr/uZujz1zDRQHdt9pRf10eW', 0, NULL, NULL, NULL),
(5, 'Admin', 'mamaruf317@gmail.com', NULL, '$2y$10$Dtykr1/wXnZZhSBuRy58HOTkoDLCS.ZR8bWxy8CF6XtTB0pskVf8S', 0, 'qxP238dIlxOHOg5bkpCDiA5IPF6m71ITikDzRaryNwjeOtPK1m8iHKGv2yIl', '2026-01-29 08:54:29', '2026-01-29 08:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirements` text COLLATE utf8mb4_unicode_ci,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('open','closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`id`, `title`, `description`, `requirements`, `location`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test1', 'test2', 'dhaka', 'open', NULL, NULL),
(2, 'test2', 'test3', 'test4', 'ctg', 'open', NULL, NULL),
(3, 'testt', 'testt', 'testt', 'ctg', 'open', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chief_executive_message`
--
ALTER TABLE `chief_executive_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donations_payment_method_id_foreign` (`payment_method_id`);

--
-- Indexes for table `executive_committee`
--
ALTER TABLE `executive_committee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `focus_areas`
--
ALTER TABLE `focus_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `impact`
--
ALTER TABLE `impact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoked`
--
ALTER TABLE `invoked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_department_id_foreign` (`department_id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applications_job_id_foreign` (`job_id`);

--
-- Indexes for table `latest_news`
--
ALTER TABLE `latest_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `legal_affilation`
--
ALTER TABLE `legal_affilation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mission_vision`
--
ALTER TABLE `mission_vision`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ongoing_project`
--
ALTER TABLE `ongoing_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `policy_guideline`
--
ALTER TABLE `policy_guideline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strategic_plans`
--
ALTER TABLE `strategic_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chief_executive_message`
--
ALTER TABLE `chief_executive_message`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `executive_committee`
--
ALTER TABLE `executive_committee`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `focus_areas`
--
ALTER TABLE `focus_areas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `impact`
--
ALTER TABLE `impact`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoked`
--
ALTER TABLE `invoked`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `latest_news`
--
ALTER TABLE `latest_news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `legal_affilation`
--
ALTER TABLE `legal_affilation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=830;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `mission_vision`
--
ALTER TABLE `mission_vision`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ongoing_project`
--
ALTER TABLE `ongoing_project`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `policy_guideline`
--
ALTER TABLE `policy_guideline`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `strategic_plans`
--
ALTER TABLE `strategic_plans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;