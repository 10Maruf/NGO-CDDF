-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2026 at 06:55 PM
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
-- Database: `afad-cddf`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `description`) VALUES
(1, 'Chilmari Distressed Development Foundation (CDDF) is a non-political, non-profit social development organization established on 02 January 2007, working at the grassroots level in Chilmari Upazila, Kurigram. CDDF is dedicated to addressing key community challenges such as poor hygiene, inadequate nutrition, social inequalities, and gender discrimination. The organization focuses on promoting education, empowering women, advancing human rights, improving health and nutrition awareness, and ensuring child protection. CDDF is legally registered with the Joint Stock Company & Firms and the NGO Affairs Bureau of Bangladesh (Registration No. 2520).'),
(3, 'AFAD is a women led organization working in norther Bangladesh since 1999. AFAD is registered (No. 2443) with NGO Affair’s Bureau (NGOAB) of Prime Minister’s Office of People\'s Republic of Government of Bangladesh, and it got the registration (No. DWA/Kuri/Reg/29/99 ) from the Directorate of Women’s Affairs (DWA) in 1999. AFAD also has the registration from the Directorate of Youth Development, Govt. of Bangladesh.');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'feather-bell',
  `icon_color` varchar(255) NOT NULL DEFAULT 'primary',
  `link` varchar(255) DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_notifications`
--

INSERT INTO `admin_notifications` (`id`, `type`, `title`, `message`, `icon`, `icon_color`, `link`, `is_read`, `read_at`, `created_at`, `updated_at`) VALUES
(1, 'donation', 'Donation Rejected', '৳2300.00 donation from Keramot Ali has been rejected', 'feather-x-circle', 'danger', 'http://127.0.0.1:8000/admin/donations/show/2', 1, '2026-02-28 04:29:43', '2026-02-13 13:16:43', '2026-02-28 04:29:43'),
(2, 'donation', 'Donation Verified', '৳10000.00 donation from Mofassel Alam Maruf has been verified', 'feather-check-circle', 'success', 'http://127.0.0.1:8000/admin/donations/show/1', 1, '2026-02-28 04:29:43', '2026-02-11 12:30:21', '2026-02-28 04:29:43'),
(3, 'volunteer', 'New Volunteer Application', 'hjnkm submitted a volunteer application', 'feather-users', 'info', 'http://127.0.0.1:8000/admin/volunteer-applications/show/5', 1, '2026-02-28 04:29:43', '2026-02-28 03:55:03', '2026-02-28 04:29:43'),
(4, 'volunteer', 'New Volunteer Application', 'gbhnjkm submitted a volunteer application', 'feather-users', 'info', 'http://127.0.0.1:8000/admin/volunteer-applications/show/4', 1, '2026-02-28 04:29:43', '2026-02-28 03:54:57', '2026-02-28 04:29:43'),
(5, 'volunteer', 'New Volunteer Application', 'djjdf submitted a volunteer application', 'feather-users', 'info', 'http://127.0.0.1:8000/admin/volunteer-applications/show/3', 1, '2026-02-28 04:29:43', '2026-02-28 03:54:24', '2026-02-28 04:29:43'),
(6, 'volunteer', 'New Volunteer Application', 'Aditto Saha submitted a volunteer application', 'feather-users', 'info', 'http://127.0.0.1:8000/admin/volunteer-applications/show/2', 1, '2026-02-28 04:29:43', '2026-02-23 03:10:17', '2026-02-28 04:29:43'),
(7, 'volunteer', 'New Volunteer Application', 'Mofassel Alam Maruf submitted a volunteer application', 'feather-users', 'info', 'http://127.0.0.1:8000/admin/volunteer-applications/show/1', 1, '2026-02-28 04:29:43', '2026-02-23 03:06:54', '2026-02-28 04:29:43'),
(8, 'message', 'New Message Received', 'ismail sent a new message', 'feather-mail', 'primary', 'http://127.0.0.1:8000/admin/message/index', 1, '2026-02-28 04:27:42', '2026-02-28 04:22:07', '2026-02-28 04:27:42'),
(9, 'message', 'New Message Received', 'hello sent a new message', 'feather-mail', 'primary', 'http://127.0.0.1:8000/admin/message/index', 1, '2026-02-28 04:29:43', '2026-02-28 04:22:07', '2026-02-28 04:29:43'),
(10, 'message', 'New Message Received', 'dfg sent a new message', 'feather-mail', 'primary', 'http://127.0.0.1:8000/admin/message/index', 1, '2026-02-28 04:29:43', '2026-02-28 04:22:07', '2026-02-28 04:29:43'),
(11, 'message', 'New Message Received', 'test sent a new message', 'feather-mail', 'primary', 'http://127.0.0.1:8000/admin/message/index', 1, '2026-02-28 04:29:43', '2026-02-28 04:22:07', '2026-02-28 04:29:43'),
(12, 'message', 'New Message Received', 'test noti sent a new message', 'feather-mail', 'primary', 'http://127.0.0.1:8000/admin/message/index', 1, '2026-02-28 04:29:43', '2026-02-28 04:22:07', '2026-02-28 04:29:43'),
(13, 'message', 'New Message Received', 'Mofassel Alam Maruf sent a new message', 'feather-mail', 'primary', 'http://127.0.0.1:8000/admin/message/index', 1, '2026-02-28 04:30:57', '2026-02-28 04:22:07', '2026-02-28 04:30:57'),
(14, 'message', 'New Message Received', 'kire sent a new message', 'feather-mail', 'primary', 'http://127.0.0.1:8000/admin/message/index', 0, NULL, '2026-02-28 04:57:20', '2026-02-28 04:57:20'),
(15, 'subscriber', 'New Subscriber', 'sub@gmail.com subscribed to the newsletter', 'feather-user-plus', 'warning', 'http://127.0.0.1:8000/admin/admin/subscribe', 0, NULL, '2026-02-28 05:49:21', '2026-02-28 05:49:21'),
(16, 'career', 'New Career Posted', 'New job posting for \"hello test career\" has been added', 'feather-briefcase', 'dark', 'http://127.0.0.1:8000/admin/careers/index', 0, NULL, '2026-02-28 11:00:13', '2026-02-28 11:00:13');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `main_logo` varchar(255) NOT NULL,
  `fav_icon` varchar(255) NOT NULL,
  `career_hero_banner` varchar(255) DEFAULT NULL,
  `about_us_banner` varchar(255) DEFAULT NULL,
  `contact_banner` varchar(255) DEFAULT NULL,
  `donate_banner` varchar(255) DEFAULT NULL,
  `faq_banner` varchar(255) DEFAULT NULL,
  `mission_vision_banner` varchar(255) DEFAULT NULL,
  `key_focus_banner` varchar(255) DEFAULT NULL,
  `governance_banner` varchar(255) DEFAULT NULL,
  `management_banner` varchar(255) DEFAULT NULL,
  `organogram_banner` varchar(255) DEFAULT NULL,
  `news_banner` varchar(255) DEFAULT NULL,
  `projects_banner` varchar(255) DEFAULT NULL,
  `volunteer_banner` varchar(255) DEFAULT NULL,
  `gallery_banner` varchar(255) DEFAULT NULL,
  `origin_banner` varchar(255) DEFAULT NULL,
  `policy_banner` varchar(255) DEFAULT NULL,
  `strategic_plan_banner` varchar(255) DEFAULT NULL,
  `publication_banner` varchar(255) DEFAULT NULL,
  `youtube_banner` varchar(255) DEFAULT NULL,
  `mission_vision_bg` varchar(255) DEFAULT NULL,
  `impact_bg` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `main_logo`, `fav_icon`, `career_hero_banner`, `about_us_banner`, `contact_banner`, `donate_banner`, `faq_banner`, `mission_vision_banner`, `key_focus_banner`, `governance_banner`, `management_banner`, `organogram_banner`, `news_banner`, `projects_banner`, `volunteer_banner`, `gallery_banner`, `origin_banner`, `policy_banner`, `strategic_plan_banner`, `publication_banner`, `youtube_banner`, `mission_vision_bg`, `impact_bg`, `facebook`, `twitter`, `instagram`, `youtube`) VALUES
(1, '573787main_logo.png', '857469fev_icon.ico', 'career_hero_banner.jpg', 'about_us_banner.jpg', 'contact_banner.jpg', 'donate_banner.jpg', 'faq_banner.jpg', 'mission_vision_banner.jpg', 'key_focus_banner.jpeg', 'governance_banner.jpg', 'management_banner.jpg', 'organogram_banner.jpg', 'news_banner.jpg', 'projects_banner.jpg', 'volunteer_banner.png', 'gallery_banner.jpg', 'origin_banner.jpg', '518520policy_banner.webp', 'strategic_plan_banner.jpg', 'publication_banner.jpg', 'youtube_banner.jpg', 'mission_vision_bg.jpg', 'impact_bg.png', 'https://www.facebook.com/afad.kurigram.1994', 'https://twitter.com/sayda_yesmin', 'http://www.instagram.com', 'http://www.youtube.com'),
(2, '86562logo.png', '47014fav.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.facebook.com/afad.kurigram.1994', 'https://twitter.com/sayda_yesmin', 'http://www.instagram.com', 'http://www.youtube.com');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `pdf_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `title`, `description`, `thumbnail`, `pdf_file`, `created_at`, `updated_at`) VALUES
(1, 'hello test career', 'career test', '43746career_thumbnail.jpg', '84627career.pdf', '2026-02-28 10:57:38', '2026-02-28 10:57:38'),
(2, 'hello test career', 'career test', '22191career_thumbnail.jpg', '12241career.pdf', '2026-02-28 11:00:13', '2026-02-28 11:00:13');

-- --------------------------------------------------------

--
-- Table structure for table `chief_executive_message`
--

CREATE TABLE `chief_executive_message` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('head_office','branch','person') NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `mobile2` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `skype` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `type`, `title`, `address`, `name`, `mobile`, `mobile2`, `email`, `email2`, `skype`, `whatsapp`, `twitter`, `status`, `created_at`, `updated_at`) VALUES
(1, 'head_office', 'Chilmari Distressed Development Foundation (CDDF)', 'Post- & Upazila- Chilmari, District- Kurigram.', NULL, '01718-131499', '01928-597271', 'chilmaricddf@gmail.com', NULL, NULL, NULL, NULL, 'active', '2026-02-06 16:04:54', '2026-02-28 10:31:14'),
(2, 'person', 'Executive Director', NULL, 'Md. Lutfar Rahman', '01718-131499', '01928-597271', 'chilmaricddf@gmail.com', NULL, NULL, '01718-131499', NULL, 'active', '2026-02-06 16:07:56', '2026-02-28 10:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `donor_name` varchar(255) NOT NULL,
  `donor_phone` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','verified','rejected') NOT NULL DEFAULT 'pending',
  `admin_note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `donor_name`, `donor_phone`, `transaction_id`, `amount`, `payment_method_id`, `status`, `admin_note`, `created_at`, `updated_at`) VALUES
(1, 'Mofassel Alam Maruf', '01997900840', '34HUHIF8472X', 10000.00, 2, 'verified', NULL, '2026-02-06 07:12:16', '2026-02-11 12:30:21'),
(2, 'Keramot Ali', '01345676543', '2JKF46JNFDJEN', 2300.00, 3, 'rejected', NULL, '2026-02-11 13:20:37', '2026-02-13 13:16:43');

-- --------------------------------------------------------

--
-- Table structure for table `executive_committee`
--

CREATE TABLE `executive_committee` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
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
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `category`, `order`, `created_at`, `updated_at`) VALUES
(1, 'What is CDDF?', 'CDDF (Chilmari Distressed Development Foundation) is a non-government, non-profit, non-political, voluntary social welfare organization established to work for the development of marginalized and underprivileged communities in Chilmari Upazila, Kurigram District, Rangpur Division, Bangladesh.', 'About CDDF', 1, '2026-02-20 17:44:02', '2026-02-20 17:44:02'),
(2, 'When was CDDF established and where does it operate?', 'CDDF was established to serve the distressed communities of Chilmari, Kurigram — a flood-prone area in northern Bangladesh along the banks of the Brahmaputra River. It primarily operates in Chilmari Upazila and the surrounding regions of Kurigram District.', 'About CDDF', 2, '2026-02-20 17:44:02', '2026-02-20 17:44:02'),
(3, 'What is the mission of CDDF?', 'The mission of CDDF is to improve the quality of life of the most vulnerable and marginalised communities — especially women, children, youth, and char (river island) dwellers — through sustainable development programs, education, livelihood support, climate resilience, and social empowerment.', 'About CDDF', 3, '2026-02-20 17:44:02', '2026-02-20 17:44:02'),
(4, 'Is CDDF a registered organization?', 'Yes, CDDF is a registered organization operating under the relevant legal frameworks of Bangladesh. It is affiliated with and recognized by appropriate government and non-government bodies to carry out its social welfare and development activities.', 'About CDDF', 4, '2026-02-20 17:44:02', '2026-02-20 17:44:02'),
(5, 'What types of programs does CDDF run?', 'CDDF runs a wide range of programs including:\n• Education and literacy programs for children and adults\n• Women\'s empowerment and gender equality initiatives\n• Climate change adaptation and disaster risk reduction\n• Livelihood and income-generating activities for the poor\n• Safe water, sanitation, and hygiene (WASH) projects\n• Nutrition and health awareness campaigns\n• Child protection and rights advocacy', 'Programs & Activities', 5, '2026-02-20 17:44:02', '2026-02-20 17:44:02'),
(6, 'Who are the primary beneficiaries of CDDF programs?', 'CDDF focuses primarily on char (riverine island) dwellers, flood-affected families, ultra-poor households, women, children, adolescent girls, and youth in Chilmari Upazila and surrounding areas of Kurigram District.', 'Programs & Activities', 6, '2026-02-20 17:44:02', '2026-02-20 17:44:02'),
(7, 'Does CDDF work on climate change and disaster issues?', 'Yes. Chilmari is one of the most climate-vulnerable areas in Bangladesh, frequently affected by river erosion and seasonal flooding. CDDF actively works on climate resilience, disaster preparedness, early warning systems, and helping affected communities rebuild their livelihoods after floods.', 'Programs & Activities', 7, '2026-02-20 17:44:02', '2026-02-20 17:44:02'),
(8, 'How can I donate to CDDF?', 'You can donate to CDDF through our online donation portal on this website, or via bank transfer. Every contribution — big or small — directly helps vulnerable communities in Chilmari. Please visit the Donate page or contact us for more details on payment methods.', 'Donations & Support', 8, '2026-02-20 17:44:02', '2026-02-20 17:44:02'),
(9, 'Are donations to CDDF tax-exempt?', 'CDDF is working towards obtaining official tax-exemption certification. Please contact us directly for the latest information on tax benefits applicable to your donation based on your jurisdiction.', 'Donations & Support', 9, '2026-02-20 17:44:02', '2026-02-20 17:44:02'),
(10, 'Can organizations or companies partner with CDDF?', 'Yes! CDDF warmly welcomes partnerships with local and international NGOs, corporations, government agencies, and donor organizations. We are open to project collaborations, CSR partnerships, and co-funding arrangements. Please reach out via our Contact page.', 'Donations & Support', 10, '2026-02-20 17:44:02', '2026-02-20 17:44:02'),
(11, 'How can I volunteer with CDDF?', 'CDDF welcomes volunteers who want to contribute their time, skills, or expertise. You can register through the Volunteer Opportunities page on this website. We accept volunteers for field work, communications, education, healthcare awareness, and many other roles.', 'Volunteering', 11, '2026-02-20 17:44:02', '2026-02-20 17:44:02'),
(12, 'Do I need professional qualifications to volunteer?', 'Not necessarily. While some specialized roles require specific skills (e.g., medical, legal, or IT), many volunteer opportunities are open to anyone with a willingness to serve. A passion for community development and a commitment to our values is what matters most.', 'Volunteering', 12, '2026-02-20 17:44:02', '2026-02-20 17:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `focus_areas`
--

CREATE TABLE `focus_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `detail_description` longtext DEFAULT NULL,
  `icon_class` varchar(255) DEFAULT NULL,
  `icon_path` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `focus_areas`
--

INSERT INTO `focus_areas` (`id`, `title`, `description`, `detail_description`, `icon_class`, `icon_path`, `image_path`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Women Empowerment', 'Protecting women from domestic violence and early marriage while promoting equal rights, leadership, and economic independence through skill development and advocacy.', '<h2 class=\"ql-align-justify\"><strong><u>Women Empowerment</u></strong></h2><p class=\"ql-align-justify\">We believe that empowering women is the most effective way to transform families and entire communities. Our initiatives focus on protecting rights, ensuring safety, and fostering independence for women from all walks of life.</p><ol><li class=\"ql-align-justify\"><strong>Protection Against Domestic Violence:</strong> Providing a safe haven, legal counseling, and psychosocial support to women facing abuse, ensuring they can live a life free from fear.</li><li class=\"ql-align-justify\"><strong>Early Marriage Prevention:</strong> Actively working at the grassroots level to stop child marriage through community awareness, parental counseling, and advocacy for girls\' education.</li><li class=\"ql-align-justify\"><strong>Economic Independence:</strong> Creating opportunities for vocational training and self-employment to help women become financially self-reliant and decision-makers in their households.</li><li class=\"ql-align-justify\"><strong>Rights &amp; Awareness:</strong> Educating women about their legal rights, including the <strong>Right to Information Act</strong>, to ensure they can access public services and justice effectively.</li><li class=\"ql-align-justify\"><strong>Social Inclusion:</strong> Promoting the leadership of women in community forums to ensure their voices are heard in local governance and social development.</li></ol><p><br></p>', 'fa-solid fa-venus-double', NULL, 'focus_areas/l8sq2R4t6Hc2rBotwoHhDVjNTeQfIuQ5DUJfRADT.jpg', 1, 1, '2026-02-20 11:35:54', '2026-02-20 12:49:37'),
(2, 'Quality Education', 'Ensuring quality primary education, preventing school dropouts, and providing scholarships from primary to college level to build a literate and empowered generation.', NULL, 'fa-solid fa-graduation-cap', NULL, NULL, 2, 1, '2026-02-20 11:35:54', '2026-02-20 11:35:54'),
(3, 'Disaster Management', 'Providing humanitarian support during disasters and emergencies — including floods, cyclones, and health crises like COVID-19 — with rapid response and recovery programs.', NULL, 'fa-solid fa-house-flood-water', NULL, NULL, 3, 1, '2026-02-20 11:35:54', '2026-02-20 11:35:54'),
(4, 'Disability Inclusion', 'Empowering persons with disabilities through skills training, rights advocacy, device support, and inclusive community programs to integrate them into mainstream society.', NULL, 'fa-solid fa-wheelchair', NULL, NULL, 4, 1, '2026-02-20 11:35:54', '2026-02-20 11:35:54'),
(5, 'WATSAN', 'Ensuring access to safe drinking water, proper sanitation and hygiene facilities, with special focus on women and children in underserved communities.', NULL, 'fa-solid fa-droplet', NULL, NULL, 5, 1, '2026-02-20 11:35:54', '2026-02-20 11:35:54'),
(6, 'Rights & Advocacy', 'Advocating for the rights of landless and ultra-poor communities to access public services, and raising awareness on the Right to Information Act for all citizens.', NULL, 'fa-solid fa-scale-balanced', NULL, NULL, 6, 1, '2026-02-20 11:35:54', '2026-02-20 11:35:54');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `description`, `image`) VALUES
(3, 'jane alam', 'asdf  asdf', '89222gallery.jpg'),
(4, 'All the Lorem Ipsum', 'All the Lorem Ipsum', '11857gallery.jpg'),
(5, 'Lorem Ipsum', 'Lorem Ipsum', '53976gallery.jpg'),
(7, 'test 1', 'test 1', '76600gallery.jpg'),
(8, 'test 2', 'test 2', '30948gallery.jpg'),
(9, 'test 3', 'test 3', '39354gallery.jpg'),
(10, 'test 4', 'test 4', '21018gallery.jpg'),
(11, 'test 5', 'test 5', '95027gallery.jpg'),
(12, 'test 6', 'test 6', '22524gallery.jpg'),
(13, 'test 7', 'test 7', '90890gallery.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `impact`
--

CREATE TABLE `impact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `metric_value` varchar(255) NOT NULL,
  `metric_unit` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `impact`
--

INSERT INTO `impact` (`id`, `title`, `metric_value`, `metric_unit`, `description`, `icon`, `year`, `order`, `created_at`, `updated_at`) VALUES
(2, 'Districts Covered', '3', '+', 'Operating across 3 districts of Rajshahi division in northern Bangladesh.', 'fa-solid fa-map-location-dot', NULL, 2, '2026-02-22 01:41:03', '2026-02-22 01:41:03'),
(3, 'Projects Completed', '41', '+', 'Over 41 community development projects successfully implemented.', 'fa-solid fa-hands-holding-circle', NULL, 3, '2026-02-22 01:41:03', '2026-02-22 01:41:03'),
(4, 'People Reached', '1300000', 'M+', 'Over 1.3 million lives positively impacted through our programs.', 'fa-solid fa-users-viewfinder', NULL, 4, '2026-02-22 01:41:03', '2026-02-22 01:41:03'),
(5, 'Villages Covered', '560', '+', 'Working across 560+ villages to bring sustainable change.', 'fa-solid fa-house-chimney', NULL, 5, '2026-02-22 01:41:03', '2026-02-22 01:41:03'),
(6, 'Dedicated Staff', '250', '+', 'A committed team of 250+ development professionals driving change.', 'fa-solid fa-user-tie', NULL, 6, '2026-02-22 01:41:03', '2026-02-22 01:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `invoked`
--

CREATE TABLE `invoked` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoked`
--

INSERT INTO `invoked` (`id`, `name`, `file`) VALUES
(4, 'hello test', '19018invoked.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) NOT NULL,
  `job_type` enum('Full-time','Part-time','Volunteer','Internship') NOT NULL,
  `description` text NOT NULL,
  `responsibilities` text NOT NULL,
  `requirements` text NOT NULL,
  `deadline` date NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `applicant_name` varchar(255) NOT NULL,
  `applicant_email` varchar(255) NOT NULL,
  `applicant_phone` varchar(255) NOT NULL,
  `resume_path` varchar(255) NOT NULL,
  `cover_letter` text NOT NULL,
  `status` enum('pending','reviewed','shortlisted','rejected') NOT NULL DEFAULT 'pending',
  `admin_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `latest_news`
--

CREATE TABLE `latest_news` (
  `id` int(11) NOT NULL,
  `category` enum('news','event') NOT NULL DEFAULT 'news',
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `latest_news`
--

INSERT INTO `latest_news` (`id`, `category`, `title`, `description`, `image`, `status`) VALUES
(6, 'event', 'Corona Virus Detected', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obsc<strong>ure Latin words, consectetur, from a L</strong>orem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsu<u style=\"color: rgb(230, 0, 0);\">m dolor sit amet..\", comes</u> from a line in section 1.10.32.</p>', '39728news.jpg', 1),
(7, 'news', 'Lorem Ipsum which looks reasonable', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '78592news.jpg', 1),
(8, 'news', 'This book is a treatise on the theory', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '91023news.jpg', 1),
(9, 'news', '“Empower Women for Climate-Resilient Societies (Phase-2)”.', 'Association For Alternative Development (AFAD)\r\nRK Road Khaliulgnaj Kurigram\r\n                                                Short Overview of the Programme\r\n\r\nThis is a Sub-district (Upazila) Level Coordination Meeting under the project titled “Empower Women for Climate-Resilient Societies (Phase-2)”.\r\n•	Date & Venue: June 02, 2025 | Upazila Parishad Hall Room, Kurigram\r\n•	Organized by: Assocition For Alternative Development(AFAD)\r\n•	Supported by: UN Women & Manusher Jonno Foundation (MJF)\r\nObjectives:\r\n1.	Strengthen women’s leadership and capacity in addressing climate change risks.\r\n2.	Enhance coordination among local government, administration, law enforcement, and civil society.\r\n3.	Identify actions to ensure women’s participation in climate-responsive planning and budgeting.\r\nParticipants Included:\r\n•	Officials from Upazila Parishad and administration\r\n•	Local police officers\r\n•	Union Parishad chairpersons and members\r\n•	Local women leaders\r\n•	Representatives from civil society organizations\r\nKey Discussion Points:\r\n•	Women-centered disaster preparedness and climate adaptation strategies\r\n•	Support for climate-resilient alternative livelihoods for women\r\n•	Development of joint action plans to ensure accountability and gender-responsive budgeting at the local level\r\nThe meeting aimed to review progress under Phase-2 of the project and gather inputs from stakeholders for effective implementation of future activities.', '57201news.jpeg', 1),
(10, 'news', 'Community engagement with women', 'While participation of L/NAs in formal IASC coordination structures is important to ensure linkages with international actors, it is just as important to have peer-led spaces for collaboration with and between L/NAs, to ensure they learn from each other especially as these networks will be present in a country long after international actors depart. The ToGETHER program, running in numerous countries, creates opportunities to promote local humanitarian actors and advocate for their leadership role in community response. In Bangladesh, the Association for Alternative Development (AFAD), a women-led NGO, supports vulnerable communities, focusing on women and youth. The ToGETHER program has enabled AFAD to participate in coordination mechanisms and improve resources for small-scale humanitarian response, providing cash assistance, shelter, non-food items, protection and food security. AFAD, in turn, also supports the inclusion of local actors in UN and INGO coordination structures.\r\n\r\nThrough the program, local actors are also becoming ambassadors of localization in their countries. In Colombia, humanitarian partners have established a collaborative workspace, culminating in the first ever Congress of Localized Humanitarian Action in Colombia in 2022, which also recently saw its second expanded edition for Latin America and the Caribbean. Today, the program partners participate in various coordination mechanisms at national level, carrying out discussion with donors, the national government and INGOs. In the Democratic Republic of Congo, ToGETHER partners collaborated with regional NGO leaders to create a single coordinating body for local and national NGOs, the National Council of Humanitarian and Development Forums in the DRC (CONAFOHD). In Indonesia, ToGETHER helped to initiate the localization forum LokaNusa, which conducts monthly discussions on a range of localization and Grand Bargain-related topics. Within five months of its establishment, over 50 civil society organizations joined LokaNusa. The forum has established strong partnerships with the National Disaster Management Agency, OCHA and the Disaster Risk Reduction Forum, promoting information sharing and local actor participation in humanitarian coordination.', '56735news.png', 1),
(11, 'news', 'Bi-yearly private sector collaboration meeting', 'We hosted the bi-yearly private sector collaboration meeting with CSO Alliance Hub in Dhaka yesterday.\r\nCSO leaders from 9 districts and representatives from Merico Bangladesh, ZXY International, and Asian Paints gathered to discuss cross-sector collaboration for fair and sustainable development.', '17679news.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `latest_news_images`
--

CREATE TABLE `latest_news_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `latest_news_images`
--

INSERT INTO `latest_news_images` (`id`, `news_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 6, '79810news_gallery.jpg', '2026-02-20 15:06:50', '2026-02-20 15:06:50'),
(2, 6, '42590news_gallery.jpg', '2026-02-20 15:06:50', '2026-02-20 15:06:50'),
(3, 6, '81271news_gallery.jpg', '2026-02-20 15:06:50', '2026-02-20 15:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `legal_affilation`
--

CREATE TABLE `legal_affilation` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `pdf_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `legal_affilation`
--

INSERT INTO `legal_affilation` (`id`, `title`, `description`, `thumbnail`, `pdf_file`, `created_at`, `updated_at`) VALUES
(7, 'NGOAB- Registration Certificate', NULL, NULL, '32303legal_affilation.pdf', '2026-02-23 07:27:36', '2026-02-23 07:27:36'),
(8, 'NGOAB Certificate- Previous (2009)', NULL, NULL, '87733legal_affilation.pdf', '2026-02-23 07:27:36', '2026-02-23 07:27:36'),
(9, 'NGOAB- Privious ( 2015) Certificate', NULL, NULL, '48595legal_affilation.pdf', '2026-02-23 07:27:36', '2026-02-23 07:27:36'),
(10, 'Department of Women Affairs Certificate', NULL, NULL, '71702legal_affilation.pdf', '2026-02-23 07:27:36', '2026-02-23 07:27:36'),
(11, 'Department of Youth Development Certificate', NULL, NULL, '85976legal_affilation.pdf', '2026-02-23 07:27:36', '2026-02-23 07:27:36'),
(12, 'AFAD-Legal Status', NULL, NULL, '64929legal_affilation.pdf', '2026-02-23 07:27:36', '2026-02-23 07:27:36'),
(13, 'AFAD Organogram', NULL, NULL, '76380legal_affilation.pdf', '2026-02-23 07:27:36', '2026-02-23 07:27:36'),
(14, 'AFAD Strategic Plan', NULL, NULL, '95068legal_affilation.pdf', '2026-02-23 07:27:36', '2026-02-23 07:27:36'),
(15, 'NGO Affairs Bureau Registration Certificate  2029', NULL, NULL, '51191legal_affilation.pdf', '2026-02-23 07:27:36', '2026-02-23 07:27:36'),
(16, 'Upload by Robiul', NULL, NULL, '58929legal_affilation.pdf', '2026-02-23 07:27:36', '2026-02-23 07:27:36');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `contact_number`, `subject`, `message`, `created_at`) VALUES
(830, 'Mofassel Alam Maruf', 'mamaruf317@gmail.com', '+8801997900840', 'Want to be a partner', 'Hello, My name is Mofassel Alam Maruf. I want to be a partner. Plz conatct me!!', NULL),
(831, 'test noti', 'noit@gmail.com', '01997900840', 'notificationsubject', 'hello I am a notification', NULL),
(832, 'test', 'test@gmail.com', 'test', 'testsest', 'test', NULL),
(833, 'dfg', 'fjkd@gmail.com', '2345', 'jhfkj', 'jkjf', NULL),
(834, 'hello', 'hello@gamil.com', NULL, 'hfdhfd', 'dhfdf', NULL),
(835, 'ismail', 'ia@gmail.com', NULL, 'djfj', 'djfj', NULL),
(836, 'kire', 'kire@gmail.com', NULL, 'kireesubject', 'kiremsg', '2026-02-28 04:57:20');

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
(30, '2026_02_10_173058_add_rating_and_beneficiary_title_to_stories_table', 15),
(31, '2026_02_18_000001_create_org_members_table', 16),
(32, '2026_02_18_000002_migrate_data_to_org_members_table', 17),
(33, '2026_02_20_000001_add_icon_class_to_focus_areas_table', 18),
(34, '2026_02_20_181508_add_detail_description_to_focus_areas_table', 19),
(35, '2026_02_21_000001_add_category_to_latest_news_table', 20),
(36, '2026_02_21_000002_create_latest_news_images_table', 20),
(37, '2026_02_20_223556_add_contact_number_to_messages_table', 21),
(38, '2026_02_21_100001_rebuild_projects_table', 22),
(39, '2026_02_21_100002_create_project_pivot_tables', 23),
(40, '2026_02_21_135332_add_order_to_stories_table', 24),
(41, '2026_02_21_135735_add_order_to_slider_table', 25),
(42, '2026_02_23_000000_recreate_volunteers_table', 26),
(43, '2026_02_23_000001_create_volunteer_applications_table', 27),
(44, '2026_02_23_000002_update_volunteer_applications_add_photo', 28),
(45, '2026_02_23_100000_create_youtube_videos_table', 29),
(46, '2026_02_23_000001_update_legal_affilation_table_to_match_publications', 30),
(47, '2026_02_23_000002_update_policy_guideline_table_to_match_publications', 30),
(48, '2026_02_23_000003_create_careers_table', 30),
(49, '2026_02_23_000004_rename_image_to_thumbnail_in_strategic_plans_table', 30),
(50, '2026_02_23_000005_add_timestamps_to_policy_and_legal_tables', 31),
(51, '2026_02_23_151603_add_contact_email_message_to_org_members_table', 32),
(52, '2026_02_25_000001_create_project_images_table', 33),
(53, '2026_02_26_000001_drop_department_add_linkedin_to_org_members', 34),
(54, '2026_02_26_000002_add_joining_date_to_org_members', 35),
(55, '2026_02_26_000003_add_education_experience_to_org_members', 36),
(56, '2026_02_27_000001_add_banner_images_to_applications_table', 37),
(57, '2026_02_28_000001_create_admin_notifications_table', 38),
(58, '2026_02_28_105401_add_created_at_to_messages_table', 39),
(59, '2026_02_28_123234_add_status_to_slider_table', 40),
(60, '2026_02_28_130714_add_status_to_latest_news_table', 41);

-- --------------------------------------------------------

--
-- Table structure for table `mission_vision`
--

CREATE TABLE `mission_vision` (
  `id` int(11) NOT NULL,
  `vision` text NOT NULL,
  `mission` text NOT NULL,
  `values` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `mission_vision`
--

INSERT INTO `mission_vision` (`id`, `vision`, `mission`, `values`) VALUES
(1, 'Contribute to establish an enabling environment for realization and protection of fundamental human rights of men and women where people are self-reliant as individuals.', 'AFAD mission is to empower women particularly young women towards building a better world by developing their capacities and to make them active contributor within the society. Therefore AFAD undertakes initiatives/programs that empower the neglected portion of women who are deprived from rights and to ensure equal rights and opportunities for them.', 'AFAD, the Association for Alternative Development, embodies a set of core values that guide its mission to empower marginalized communities in northern Bangladesh. Committed to integrity and transparency, AFAD operates with a dedication to promoting equality and social justice. Through innovative programs and collaborative partnerships, AFAD works to empower individuals and communities, fostering sustainable development and resilience. With a focus on accountability and respect for diversity, AFAD ensures that its initiatives have lasting positive impacts while upholding the rights and dignity of all stakeholders.'),
(3, 'Contribute to establish an enabling environment for realization and protection of fundamental human rights of men and women where people are self-reliant as individuals.', 'AFAD mission is to empower women particularly young women towards building a better world by developing their capacities and to make them active contributor within the society. Therefore AFAD undertakes initiatives/programs that empower the neglected portion of women who are deprived from rights and to ensure equal rights and opportunities for them.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `org_members`
--

CREATE TABLE `org_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `org_type` enum('general_council','executive_committee','advisory_council','executive_director','senior_management','mid_management','field_staff','support_staff') NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `experience_years` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `org_members`
--

INSERT INTO `org_members` (`id`, `org_type`, `name`, `designation`, `bio`, `photo`, `facebook`, `twitter`, `instagram`, `youtube`, `linkedin`, `order`, `is_active`, `created_at`, `updated_at`, `contact_number`, `email`, `message`, `joining_date`, `education`, `experience_years`) VALUES
(1, 'general_council', 'Mofassel Alam Maruf', 'Chairperson', 'Renowned women rights activist and community leader with extensive experience in social development.', '62190org.png', 'https://facebook.com/fatema.cddf1', 'https://twitter.com/fatema_cddf1', 'https://instagram.com/fatema.cddf1', 'https://youtube.com/@fatemacddf1', 'https://linkedin.com/in/fatema-cddf-1', 1, 1, '2026-02-25 12:34:51', '2026-02-28 08:37:51', '01554490502', 'fatema1@gmail.com', NULL, '2006-06-23', 'MBA in Development Studies, BRAC University', 21),
(2, 'general_council', 'Rahela Khatun', 'Vice Chairperson', 'Renowned women rights activist and community leader with extensive experience in social development.', NULL, 'https://facebook.com/rahela.cddf2', 'https://twitter.com/rahela_cddf2', NULL, NULL, 'https://linkedin.com/in/rahela-cddf-2', 2, 1, '2026-02-25 12:34:51', '2026-02-28 08:37:51', '01838922685', 'rahela2@yahoo.com', NULL, '2020-01-15', 'M.Sc. in Social Work, Dhaka University', 15),
(3, 'general_council', 'Nasrin Akter', 'Secretary General', 'Renowned women rights activist and community leader with extensive experience in social development.', NULL, 'https://facebook.com/nasrin.cddf3', NULL, 'https://instagram.com/nasrin.cddf3', NULL, 'https://linkedin.com/in/nasrin-cddf-3', 3, 1, '2026-02-25 12:34:51', '2026-02-28 08:37:51', '01392550111', 'nasrin3@outlook.com', NULL, '2007-08-25', 'LLB, Bangladesh National University', 18),
(4, 'general_council', 'Sumaiya Islam', 'Joint Secretary', 'Renowned women rights activist and community leader with extensive experience in social development.', NULL, 'https://facebook.com/sumaiya.cddf4', 'https://twitter.com/sumaiya_cddf4', NULL, NULL, 'https://linkedin.com/in/sumaiya-cddf-4', 4, 1, '2026-02-25 12:34:51', '2026-02-28 08:37:51', '01959206754', 'sumaiya4@cddf.org.bd', NULL, '2014-05-09', 'MSS in Political Science, Jahangirnagar University', 22),
(5, 'general_council', 'Rokeya Perveen', 'Treasurer', 'Renowned women rights activist and community leader with extensive experience in social development.', NULL, 'https://facebook.com/rokeya.cddf5', 'https://twitter.com/rokeya_cddf5', 'https://instagram.com/rokeya.cddf5', 'https://youtube.com/@rokeyacddf5', 'https://linkedin.com/in/rokeya-cddf-5', 5, 1, '2026-02-25 12:34:51', '2026-02-28 08:37:51', '01777669707', 'rokeya5@hotmail.com', NULL, '2019-09-26', 'MBA, North South University', 11),
(6, 'general_council', 'Halima Khatun', 'Member', 'Renowned women rights activist and community leader with extensive experience in social development.', NULL, 'https://facebook.com/halima.cddf6', NULL, NULL, NULL, 'https://linkedin.com/in/halima-cddf-6', 6, 1, '2026-02-25 12:34:51', '2026-02-28 08:37:51', '01538780466', 'halima6@gmail.com', NULL, '2018-01-25', 'M.A. in Economics, Dhaka University', 27),
(7, 'general_council', 'Shahanara Begum', 'Member', 'Renowned women rights activist and community leader with extensive experience in social development.', NULL, 'https://facebook.com/shahanara.cddf7', 'https://twitter.com/shahanara_cddf7', 'https://instagram.com/shahanara.cddf7', NULL, 'https://linkedin.com/in/shahanara-cddf-7', 7, 1, '2026-02-25 12:34:51', '2026-02-28 08:37:51', '01626825546', 'shahanara7@yahoo.com', NULL, '2019-08-28', 'MSS in Public Administration, Chittagong University', 17),
(8, 'general_council', 'Morjina Begum', 'Member', 'Renowned women rights activist and community leader with extensive experience in social development.', NULL, 'https://facebook.com/morjina.cddf8', 'https://twitter.com/morjina_cddf8', NULL, NULL, 'https://linkedin.com/in/morjina-cddf-8', 8, 1, '2026-02-25 12:34:51', '2026-02-28 08:37:51', '01759004326', 'morjina8@outlook.com', NULL, '2018-01-11', 'Ph.D. in Gender Studies, Dhaka University', 25),
(9, 'general_council', 'Razia Sultana', 'Member', 'Renowned women rights activist and community leader with extensive experience in social development.', NULL, 'https://facebook.com/razia.cddf9', NULL, 'https://instagram.com/razia.cddf9', 'https://youtube.com/@raziacddf9', 'https://linkedin.com/in/razia-cddf-9', 9, 1, '2026-02-25 12:34:51', '2026-02-28 08:37:51', '01501727238', 'razia9@cddf.org.bd', NULL, '2011-08-03', 'B.Sc. in Public Health, BRAC University', 8),
(10, 'general_council', 'Laily Begum', 'Member', 'Renowned women rights activist and community leader with extensive experience in social development.', NULL, 'https://facebook.com/laily.cddf10', 'https://twitter.com/laily_cddf10', NULL, NULL, 'https://linkedin.com/in/laily-cddf-10', 10, 1, '2026-02-25 12:34:51', '2026-02-28 08:37:51', '01527527546', 'laily10@hotmail.com', NULL, '2006-12-27', 'M.A. in Development Studies, Independent University', 19),
(11, 'general_council', 'Kohinoor Akter', 'Member', 'Renowned women rights activist and community leader with extensive experience in social development.', NULL, 'https://facebook.com/kohinoor.cddf11', 'https://twitter.com/kohinoor_cddf11', 'https://instagram.com/kohinoor.cddf11', NULL, 'https://linkedin.com/in/kohinoor-cddf-11', 11, 1, '2026-02-25 12:34:51', '2026-02-28 08:37:51', '01528471072', 'kohinoor11@gmail.com', NULL, '2013-05-22', 'LLM, Dhaka University', 25),
(12, 'general_council', 'Moriom Akter', 'Member', 'Renowned women rights activist and community leader with extensive experience in social development.', NULL, 'https://facebook.com/moriom.cddf12', NULL, NULL, NULL, 'https://linkedin.com/in/moriom-cddf-12', 12, 1, '2026-02-25 12:34:51', '2026-02-28 08:37:51', '01623486833', 'moriom12@yahoo.com', NULL, '2012-07-14', 'M.Sc. in Environmental Science, Rajshahi University', 10),
(13, 'general_council', 'Taslima Begum', 'Member', 'Renowned women rights activist and community leader with extensive experience in social development.', NULL, 'https://facebook.com/taslima.cddf13', 'https://twitter.com/taslima_cddf13', 'https://instagram.com/taslima.cddf13', 'https://youtube.com/@taslimacddf13', 'https://linkedin.com/in/taslima-cddf-13', 13, 1, '2026-02-25 12:34:51', '2026-02-28 08:37:51', '01603209855', 'taslima13@outlook.com', NULL, '2006-07-24', 'MBA in Finance, East West University', 26),
(14, 'general_council', 'Shamima Nasrin', 'Member', 'Renowned women rights activist and community leader with extensive experience in social development.', NULL, 'https://facebook.com/shamima.cddf14', 'https://twitter.com/shamima_cddf14', NULL, NULL, 'https://linkedin.com/in/shamima-cddf-14', 14, 1, '2026-02-25 12:34:51', '2026-02-28 08:37:51', '01630002143', 'shamima14@cddf.org.bd', NULL, '2019-09-27', 'MSS in Sociology, Jahangirnagar University', 21),
(15, 'general_council', 'Bilkis Begum', 'Member', 'Renowned women rights activist and community leader with extensive experience in social development.', NULL, 'https://facebook.com/bilkis.cddf15', NULL, 'https://instagram.com/bilkis.cddf15', NULL, 'https://linkedin.com/in/bilkis-cddf-15', 15, 1, '2026-02-25 12:34:51', '2026-02-28 08:37:51', '01998175739', 'bilkis15@hotmail.com', NULL, '2015-11-25', 'M.A. in NGO Management, BRAC University', 16),
(16, 'general_council', 'Nurjahan Begum', 'Member', 'Renowned women rights activist and community leader with extensive experience in social development.', NULL, 'https://facebook.com/nurjahan.cddf16', 'https://twitter.com/nurjahan_cddf16', NULL, NULL, 'https://linkedin.com/in/nurjahan-cddf-16', 16, 1, '2026-02-25 12:34:51', '2026-02-28 08:37:51', '01576438338', 'nurjahan16@gmail.com', NULL, '2018-01-22', 'MBA in Development Studies, BRAC University', 24),
(17, 'general_council', 'Afroja Khatun', 'Member', 'Renowned women rights activist and community leader with extensive experience in social development.', NULL, 'https://facebook.com/afroja.cddf17', 'https://twitter.com/afroja_cddf17', 'https://instagram.com/afroja.cddf17', 'https://youtube.com/@afrojacddf17', 'https://linkedin.com/in/afroja-cddf-17', 17, 1, '2026-02-25 12:34:51', '2026-02-28 08:37:51', '01636408171', 'afroja17@yahoo.com', NULL, '2019-02-27', 'M.Sc. in Social Work, Dhaka University', 15),
(18, 'general_council', 'Shirin Akter', 'Member', 'Renowned women rights activist and community leader with extensive experience in social development.', NULL, 'https://facebook.com/shirin.cddf18', NULL, NULL, NULL, 'https://linkedin.com/in/shirin-cddf-18', 18, 1, '2026-02-25 12:34:51', '2026-02-28 08:37:51', '01499894075', 'shirin18@outlook.com', NULL, '2007-11-08', 'LLB, Bangladesh National University', 13),
(19, 'general_council', 'Hasina Begum', 'Member', 'Renowned women rights activist and community leader with extensive experience in social development.', NULL, 'https://facebook.com/hasina.cddf19', 'https://twitter.com/hasina_cddf19', 'https://instagram.com/hasina.cddf19', NULL, 'https://linkedin.com/in/hasina-cddf-19', 19, 1, '2026-02-25 12:34:51', '2026-02-28 08:37:51', '01783535289', 'hasina19@cddf.org.bd', NULL, '2020-11-26', 'MSS in Political Science, Jahangirnagar University', 5),
(20, 'general_council', 'Amena Khatun', 'Member', 'Renowned women rights activist and community leader with extensive experience in social development.', NULL, 'https://facebook.com/amena.cddf20', 'https://twitter.com/amena_cddf20', NULL, NULL, 'https://linkedin.com/in/amena-cddf-20', 20, 1, '2026-02-25 12:34:51', '2026-02-28 08:37:51', '01618232800', 'amena20@hotmail.com', NULL, '2007-11-01', 'MBA, North South University', 21),
(21, 'general_council', 'Monowara Begum', 'Member', 'Renowned women rights activist and community leader with extensive experience in social development.', NULL, 'https://facebook.com/monowara.cddf21', NULL, 'https://instagram.com/monowara.cddf21', 'https://youtube.com/@monowaracddf21', 'https://linkedin.com/in/monowara-cddf-21', 21, 1, '2026-02-25 12:34:51', '2026-02-28 08:37:51', '01517364585', 'monowara21@gmail.com', NULL, '2014-01-01', 'M.A. in Economics, Dhaka University', 14),
(22, 'executive_committee', 'Rashida Khanam', 'President', 'Leading CDDF with vision and dedication since 2018.', NULL, 'https://facebook.com/rashida.cddf22', 'https://twitter.com/rashida_cddf22', NULL, NULL, 'https://linkedin.com/in/rashida-cddf-22', 1, 1, '2026-02-25 12:34:51', '2026-02-25 12:34:51', '01837059749', 'rashida22@yahoo.com', NULL, '2007-08-15', 'MSS in Public Administration, Chittagong University', 27),
(23, 'executive_committee', 'Ferdousi Begum', 'Vice President', 'Advocate for women empowerment and child rights.', NULL, 'https://facebook.com/ferdousi.cddf23', 'https://twitter.com/ferdousi_cddf23', 'https://instagram.com/ferdousi.cddf23', NULL, 'https://linkedin.com/in/ferdousi-cddf-23', 2, 1, '2026-02-25 12:34:51', '2026-02-25 12:34:51', '01678215148', 'ferdousi23@outlook.com', NULL, '2020-08-10', 'Ph.D. in Gender Studies, Dhaka University', 13),
(24, 'executive_committee', 'Shirina Akter', 'General Secretary', 'Overseeing organizational governance and strategic planning.', NULL, 'https://facebook.com/shirina.cddf24', NULL, NULL, NULL, 'https://linkedin.com/in/shirina-cddf-24', 3, 1, '2026-02-25 12:34:51', '2026-02-25 12:34:51', '01794756369', 'shirina24@cddf.org.bd', NULL, '2007-10-01', 'B.Sc. in Public Health, BRAC University', 24),
(25, 'executive_committee', 'Mahmuda Khatun', 'Joint Secretary', 'Coordinating inter-departmental activities and stakeholder relations.', NULL, 'https://facebook.com/mahmuda.cddf25', 'https://twitter.com/mahmuda_cddf25', 'https://instagram.com/mahmuda.cddf25', 'https://youtube.com/@mahmudacddf25', 'https://linkedin.com/in/mahmuda-cddf-25', 4, 1, '2026-02-25 12:34:51', '2026-02-25 12:34:51', '01419704488', 'mahmuda25@hotmail.com', NULL, '2013-07-03', 'M.A. in Development Studies, Independent University', 14),
(26, 'executive_committee', 'Selina Begum', 'Treasurer', 'Managing financial oversight and budget planning.', NULL, 'https://facebook.com/selina.cddf26', 'https://twitter.com/selina_cddf26', NULL, NULL, 'https://linkedin.com/in/selina-cddf-26', 5, 1, '2026-02-25 12:34:51', '2026-02-25 12:34:51', '01655010015', 'selina26@gmail.com', NULL, '2009-08-11', 'LLM, Dhaka University', 6),
(27, 'executive_committee', 'Anwara Islam', 'Member', 'Working on community development and social welfare.', NULL, 'https://facebook.com/anwara.cddf27', NULL, 'https://instagram.com/anwara.cddf27', NULL, 'https://linkedin.com/in/anwara-cddf-27', 6, 1, '2026-02-25 12:34:51', '2026-02-25 12:34:51', '01508571293', 'anwara27@yahoo.com', NULL, '2014-10-17', 'M.Sc. in Environmental Science, Rajshahi University', 23),
(28, 'executive_committee', 'Nargis Parvin', 'Member', 'Focused on education and health programs for marginalized communities.', NULL, 'https://facebook.com/nargis.cddf28', 'https://twitter.com/nargis_cddf28', NULL, NULL, 'https://linkedin.com/in/nargis-cddf-28', 7, 1, '2026-02-25 12:34:51', '2026-02-25 12:34:51', '01601448170', 'nargis28@outlook.com', NULL, '2011-11-05', 'MBA in Finance, East West University', 8),
(29, 'advisory_council', 'Prof. Dr. Aminul Islam', 'Senior Advisor', 'Renowned academic and development researcher with 30+ years of experience.', NULL, 'https://facebook.com/prof..cddf29', 'https://twitter.com/prof._cddf29', 'https://instagram.com/prof..cddf29', 'https://youtube.com/@prof.cddf29', 'https://linkedin.com/in/prof.-cddf-29', 1, 1, '2026-02-25 12:34:51', '2026-02-25 12:34:51', '01522512988', 'prof.29@cddf.org.bd', NULL, '2019-04-07', 'MSS in Sociology, Jahangirnagar University', 7),
(30, 'advisory_council', 'Dr. Shamsun Nahar', 'Advisor – Health', 'Leading public health expert specializing in maternal and child health.', NULL, 'https://facebook.com/dr..cddf30', NULL, NULL, NULL, 'https://linkedin.com/in/dr.-cddf-30', 2, 1, '2026-02-25 12:34:51', '2026-02-25 12:34:51', '01972532011', 'dr.30@hotmail.com', NULL, '2018-03-26', 'M.A. in NGO Management, BRAC University', 24),
(31, 'advisory_council', 'Advocate Kamruzzaman', 'Advisor – Legal Affairs', 'Senior legal counsel with expertise in NGO governance and human rights law.', NULL, 'https://facebook.com/advocate.cddf31', 'https://twitter.com/advocate_cddf31', 'https://instagram.com/advocate.cddf31', NULL, 'https://linkedin.com/in/advocate-cddf-31', 3, 1, '2026-02-25 12:34:51', '2026-02-25 12:34:51', '01854102100', 'advocate31@gmail.com', NULL, '2006-07-05', 'MBA in Development Studies, BRAC University', 25),
(84, 'executive_director', 'Nasima Akhter', 'Executive Director', 'Nasima Akhter has over 25 years of leadership experience in development, gender rights, and humanitarian response across Bangladesh. She oversees all programmatic and administrative functions of CDDF and is directly accountable to the Executive Committee.', '74776org.jpeg', 'https://facebook.com/cddf.org', 'https://www.linkedin.com/feed/', 'https://www.linkedin.com/feed/', NULL, 'https://linkedin.com/in/nasima-akhter', 1, 1, '2026-02-25 22:55:51', '2026-02-25 23:18:58', '+880 1711-000001', 'ed@cddf.org', 'At CDDF, we believe that sustainable development begins with empowering the most marginalized communities — especially women and girls. Over the past decades, our dedicated teams have worked tirelessly in the field to translate our mission into measurable change. I am proud of every individual in this organization, from our board members to our frontline volunteers. Together, we remain committed to building a just, equitable, and dignified society for all.', '2010-03-15', 'M.Sc. in Development Studies, University of Dhaka', 25),
(85, 'senior_management', 'Md. Rezaul Karim', 'Director – Program', 'Leads all programmatic operations including Sofol and livelihood programs. 18 years of experience in NGO program management across Bangladesh.', NULL, NULL, NULL, NULL, NULL, 'https://linkedin.com/in/rezaulkarim', 1, 1, '2026-02-25 22:55:51', '2026-02-25 22:55:51', '+880 1711-000002', 'dir.program@cddf.org', NULL, '2013-06-01', 'MBA, North South University', 18),
(86, 'senior_management', 'Farida Begum', 'Director – Finance', 'Oversees financial planning, budgeting, and compliance for all CDDF operations. A certified CPA with 15 years of audit and financial management experience.', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2026-02-25 22:55:51', '2026-02-25 22:55:51', '+880 1711-000003', 'dir.finance@cddf.org', NULL, '2014-09-10', 'M.Com (Accounting), University of Chittagong', 15),
(87, 'senior_management', 'Shafiqul Islam', 'Director – HR & Admin', 'Responsible for human resource strategy, recruitment, staff development, and administrative operations across all CDDF offices.', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, '2026-02-25 22:55:51', '2026-02-25 22:55:51', '+880 1711-000004', 'dir.hr@cddf.org', NULL, '2015-01-20', 'MBA (HRM), BRAC University', 12),
(88, 'senior_management', 'Roksana Parvin', 'Director – Communication & Resource Mobilization', 'Manages donor relations, fundraising strategy, external communications, and partnership development to sustain CDDF\'s mission.', NULL, NULL, NULL, NULL, NULL, 'https://linkedin.com/in/roksana-parvin', 4, 1, '2026-02-25 22:55:51', '2026-02-25 22:55:51', '+880 1711-000005', 'dir.comm@cddf.org', NULL, '2014-04-05', 'M.A. in Mass Communication, Jahangirnagar University', 13),
(89, 'senior_management', 'Alamgir Hossain', 'Director – RME', 'Leads Research, Monitoring & Evaluation across all programs. Designs impact frameworks and ensures evidence-based program decision-making.', NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '2026-02-25 22:55:51', '2026-02-25 22:55:51', '+880 1711-000006', 'dir.rme@cddf.org', NULL, '2013-11-12', 'M.Sc. in Statistics, University of Rajshahi', 14),
(90, 'senior_management', 'Sultana Razia', 'Director – Special Program', 'Oversees special initiatives including climate resilience, disability inclusion, and emergency response programs under CDDF.', NULL, NULL, NULL, NULL, NULL, NULL, 6, 1, '2026-02-25 22:55:51', '2026-02-25 22:55:51', '+880 1711-000007', 'dir.special@cddf.org', NULL, '2012-07-01', 'M.A. in Social Welfare, University of Dhaka', 16),
(91, 'mid_management', 'Mizanur Rahman', 'Regional Manager – Sofol Program', 'Coordinates Sofol Program activities across four districts, ensuring quality service delivery and community engagement in field areas.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2026-02-25 22:55:51', '2026-02-25 22:55:51', '+880 1711-000010', 'rm.sofol@cddf.org', NULL, '2016-03-01', 'B.Sc. in Social Science, Khulna University', 10),
(92, 'mid_management', 'Hosneara Khatun', 'Manager – Project (District Level)', 'Manages district-level project implementation, staff supervision, and stakeholder coordination for ongoing CDDF projects.', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2026-02-25 22:55:51', '2026-02-25 22:55:51', '+880 1711-000011', 'pm.district@cddf.org', NULL, '2017-06-15', 'M.S.S. in Public Administration, Jahangirnagar University', 9),
(93, 'mid_management', 'Taslima Khanam', 'Manager – Finance & Admin', 'Handles day-to-day financial reporting, procurement, and administrative management at CDDF head office.', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, '2026-02-25 22:55:51', '2026-02-25 22:55:51', '+880 1711-000012', 'mgr.finance@cddf.org', NULL, '2018-01-10', 'B.Com (Hons), University of Dhaka', 8),
(94, 'mid_management', 'Rafiqul Islam', 'Manager – Training & Research Center', 'Designs and delivers capacity building training programs for staff and community participants, and manages CDDF research agenda.', NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, '2026-02-25 22:55:51', '2026-02-25 22:55:51', '+880 1711-000013', 'mgr.training@cddf.org', NULL, '2015-09-20', 'M.Ed., Institute of Education and Research, Dhaka', 11),
(95, 'mid_management', 'Nazmul Huda', 'Manager – MIS & ICT', 'Manages the management information system, data collection tools, and ICT infrastructure across all CDDF field offices.', NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '2026-02-25 22:55:51', '2026-02-25 22:55:51', '+880 1711-000014', 'mgr.mis@cddf.org', NULL, '2019-04-01', 'B.Sc. in Computer Science, BUET', 7),
(96, 'mid_management', 'Shirin Akter', 'Manager – Gender & Social Inclusion', 'Ensures gender mainstreaming and social inclusion principles are embedded across all programs and organizational policies.', NULL, NULL, NULL, NULL, NULL, NULL, 6, 1, '2026-02-25 22:55:51', '2026-02-25 22:55:51', '+880 1711-000015', 'mgr.gender@cddf.org', NULL, '2017-02-14', 'M.A. in Women and Gender Studies, University of Dhaka', 9),
(97, 'field_staff', 'Karim Uddin', 'Field Officer', 'Responsible for direct community outreach and beneficiary engagement in Rajshahi district.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2026-02-25 22:55:51', '2026-02-25 22:55:51', '+880 1711-000020', 'karim.fo@cddf.org', NULL, '2020-01-05', 'B.A., National University', 6),
(98, 'field_staff', 'Laila Akther', 'Field Facilitator', 'Facilitates community group meetings, awareness sessions, and livelihood training in Sirajganj.', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2026-02-25 22:55:51', '2026-02-25 22:55:51', '+880 1711-000021', 'laila.ff@cddf.org', NULL, '2021-03-10', 'H.S.C., Sirajganj Govt. College', 5),
(99, 'field_staff', 'Jalal Uddin', 'Community Mobilizer', 'Mobilizes community volunteers and local leaders to support CDDF program activities in Chapai Nawabganj.', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, '2026-02-25 22:55:51', '2026-02-25 22:55:51', '+880 1711-000022', NULL, NULL, '2022-06-01', 'S.S.C.', 4),
(100, 'field_staff', 'Mosammat Renu', 'Community Volunteer', 'Serves as a frontline volunteer distributing information and supporting beneficiary registration in Naogaon.', NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, '2026-02-25 22:55:51', '2026-02-25 22:55:51', '+880 1711-000023', NULL, NULL, '2023-01-15', 'S.S.C.', 3),
(101, 'field_staff', 'Arfan Ali', 'Field Officer', 'Coordinates beneficiary tracking, field data collection, and reporting for CDDF programs in Pabna.', NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '2026-02-25 22:55:51', '2026-02-25 22:55:51', '+880 1711-000024', 'arfan.fo@cddf.org', NULL, '2021-08-20', 'B.A., National University', 5),
(102, 'field_staff', 'Sultana Yasmin', 'Teacher', 'Delivers non-formal education and adult literacy classes in CDDF-run learning centers in Bogura.', NULL, NULL, NULL, NULL, NULL, NULL, 6, 1, '2026-02-25 22:55:51', '2026-02-25 22:55:51', '+880 1711-000025', NULL, NULL, '2019-11-01', 'B.Ed., Teacher Training College', 7),
(103, 'field_staff', 'Md. Belal Hossain', 'Field Facilitator', 'Supports group-based savings and livelihood activities for women beneficiaries in Natore district.', NULL, NULL, NULL, NULL, NULL, NULL, 7, 1, '2026-02-25 22:55:51', '2026-02-25 22:55:51', '+880 1711-000026', NULL, NULL, '2022-02-28', 'H.S.C.', 4),
(104, 'field_staff', 'Nazma Akter', 'Community Mobilizer', 'Organizes women self-help groups and liaises with local government offices in Rajshahi Sadar.', NULL, NULL, NULL, NULL, NULL, NULL, 8, 1, '2026-02-25 22:55:51', '2026-02-25 22:55:51', '+880 1711-000027', NULL, NULL, '2023-03-01', 'S.S.C.', 3),
(105, 'support_staff', 'Abul Kalam', 'Office Assistant', 'Provides administrative support, visitor management, and document handling at CDDF head office.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2026-02-25 22:55:51', '2026-02-25 22:55:51', '+880 1711-000030', NULL, NULL, '2018-05-01', 'H.S.C.', 8),
(106, 'support_staff', 'Nurul Islam', 'Guard', 'Maintains security and access control at the CDDF head office premises.', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2026-02-25 22:55:51', '2026-02-25 22:55:51', '+880 1711-000031', NULL, NULL, '2020-07-10', 'S.S.C.', 6),
(107, 'support_staff', 'Salam Hawlader', 'Driver', 'Responsible for safe transportation of staff and materials for field visits and official duties.', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, '2026-02-25 22:55:51', '2026-02-25 22:55:51', '+880 1711-000032', NULL, NULL, '2016-09-15', 'S.S.C.', 10),
(108, 'support_staff', 'Rahela Begum', 'Cook', 'Manages kitchen operations and prepares meals for staff and training participants at CDDF premises.', NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, '2026-02-25 22:55:51', '2026-02-25 22:55:51', '+880 1711-000033', NULL, NULL, '2021-01-20', 'S.S.C.', 5),
(109, 'support_staff', 'Md. Jahangir Alam', 'Office Peon', 'Assists in daily clerical tasks, dispatch of documents, and general office support functions.', NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '2026-02-25 22:55:51', '2026-02-25 22:55:51', '+880 1711-000034', NULL, NULL, '2022-03-05', 'J.S.C.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
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
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('adnannstu@gmail.com', '$2y$10$Rq2aJSKX04G91Gz9L6b/1O1ng50DPLQb1SXTiBAKjIeKuucH3aXLS', '2023-02-28 12:24:19'),
('mamaruf317@gmail.com', '$2y$10$1Wp/GV7QXCCH/EOT4EPxjOqRoBB7wEQ8oiACXm/Zs4x6UQWrr1RpO', '2026-02-28 11:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `icon_image` varchar(255) DEFAULT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `bank_details` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `type`, `icon_image`, `account_name`, `account_number`, `bank_details`, `is_active`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'bkash', NULL, 'AFAD Bangladesh', '+8801825-003211', NULL, 1, 1, '2026-02-06 06:14:40', '2026-02-28 08:25:46'),
(2, 'nagad', NULL, 'AFAD Bangladesh', '+8801825-003211', NULL, 1, 2, '2026-02-06 06:14:40', '2026-02-28 08:25:46'),
(3, 'rocket', NULL, 'AFAD Bangladesh', '+8801825-003211', NULL, 1, 3, '2026-02-06 06:14:40', '2026-02-28 08:25:46'),
(4, 'upay', NULL, 'AFAD Bangladesh', '+8801825-003211', NULL, 1, 4, '2026-02-06 06:14:40', '2026-02-28 08:25:46'),
(5, 'bank', NULL, 'AFAD Bangladesh', '2050 2250 2050 XXXX', '{\"bank_name\":\"Islami Bank Bangladesh Limited (IBBL)\",\"branch_name\":\"Maijdee Court, Maijdee, Noakhali Sadar, Noakhali, Bangladesh\",\"routing_number\":\"125260674\"}', 1, 5, '2026-02-06 06:14:40', '2026-02-28 08:25:46'),
(7, 'visa', 'payment_icons/Azgy3Hy0cjv1b4WsIZFeesZFokqYgEcTfkAAVKYv.png', 'Mofassel Alam Maruf', '1234098779', NULL, 1, 0, '2026-02-06 07:11:15', '2026-02-28 08:25:46');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `policy_guideline`
--

CREATE TABLE `policy_guideline` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `pdf_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policy_guideline`
--

INSERT INTO `policy_guideline` (`id`, `title`, `description`, `thumbnail`, `pdf_file`, `created_at`, `updated_at`) VALUES
(4, 'সুরক্ষা নীতিমালা ও কর্মপদ্ধতি', NULL, NULL, '31899policy_guideline.pdf', '2026-02-23 07:27:36', '2026-02-23 07:27:36'),
(6, 'Anti Fraud Policy and Fraud Response Plan', NULL, NULL, '16839policy_guideline.pdf', '2026-02-23 07:27:36', '2026-02-23 07:27:36'),
(7, 'শিশু সুরক্ষা নীতিমালা', NULL, NULL, '30045policy_guideline.pdf', '2026-02-23 07:27:36', '2026-02-23 07:27:36'),
(8, 'জেন্ডার পলিসি-রিভিউ', NULL, NULL, '93811policy_guideline.pdf', '2026-02-23 07:27:36', '2026-02-23 07:27:36'),
(9, 'AFAD Constition', NULL, NULL, '92234policy_guideline.pdf', '2026-02-23 07:27:36', '2026-02-23 07:27:36'),
(10, 'AFAD-Legal Status', NULL, NULL, '73880policy_guideline.pdf', '2026-02-23 07:27:36', '2026-02-23 07:27:36'),
(11, 'AFAD Child Protection Policy', NULL, NULL, '32564policy_guideline.pdf', '2026-02-23 07:27:36', '2026-02-23 07:27:36'),
(12, 'AFAD Financial Policy', NULL, NULL, '85587policy_guideline.pdf', '2026-02-23 07:27:36', '2026-02-23 07:27:36'),
(13, 'AFAD HR Policy', NULL, NULL, '41040policy_guideline.pdf', '2026-02-23 07:27:36', '2026-02-23 07:27:36'),
(14, 'AFAD MEAL Policy', NULL, NULL, '78964policy_guideline.pdf', '2026-02-23 07:27:36', '2026-02-23 07:27:36'),
(15, 'AFAD Safeguarding Policy', NULL, NULL, '24171policy_guideline.pdf', '2026-02-23 07:27:36', '2026-02-23 07:27:36'),
(16, 'AFAD Safety & Security Policy', NULL, NULL, '17542policy_guideline.pdf', '2026-02-23 07:27:36', '2026-02-23 07:27:36'),
(17, 'AFAD Whistleblowing Policy', NULL, NULL, '79815policy_guideline.pdf', '2026-02-23 07:27:36', '2026-02-23 07:27:36');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `status` enum('active','completed','upcoming') NOT NULL DEFAULT 'active',
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `short_description` text NOT NULL,
  `detail_description` longtext DEFAULT NULL,
  `status` enum('ongoing','completed') NOT NULL DEFAULT 'ongoing',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `budget` decimal(15,2) DEFAULT NULL,
  `beneficiary_count` bigint(20) UNSIGNED DEFAULT NULL,
  `implementing_partner` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `slug`, `cover_image`, `short_description`, `detail_description`, `status`, `start_date`, `end_date`, `location`, `budget`, `beneficiary_count`, `implementing_partner`, `is_featured`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'SHIELD - Strengthening Hope, Integrated Emergency Leadership, and Disaster Preparedness', 'shield-strengthening-hope-integrated-emergency-leadership-and-disaster-preparedness', '5282606proj.webp', 'To enhance disaster resilience and climate change adaptation in coastal communities of Bangladesh by strengthening local leadership, school-based preparedness, and sustainable livelihoods, ensuring that vulnerable populations are equipped to respond to and recover from climate-induced disasters.', '<p>The SHIELD project, implemented by <strong>CDDF </strong>Foundation Trust in the Khulna and Bagerhat districts, is a comprehensive initiative designed to address the increasing climate vulnerabilities of coastal Bangladesh. As a region frequently impacted by cyclones, tidal surges, and salinity intrusion, there is a critical need for integrated disaster risk reduction (DRR) and climate change <span style=\"color: rgb(255, 153, 0);\">adaptation </span>(CCA) strategies. At the heart of this project is the belief that building community resilience requires a multi-layered approach that empowers children, school authorities, and local government representatives to lead emergency response and preparedness efforts.</p><p>The project will target over 1,910 direct participants and reach approximately 20,600 indirect beneficiaries through a series of structured interventions. A significant component of the program focuses on school-based DRR, engaging 1,200 children and 180 school authorities to create safer learning environments and foster a culture of preparedness from a young age. These groups will be trained to identify risks and implement safety protocols, ensuring that schools serve as resilient hubs during emergencies. Additionally, the project will strengthen local governance by training 40 local government representatives to integrate climate-smart planning into their administrative frameworks.</p><p>One of the central components of this initiative is the mobilization of Community-Based DRR Committees (CBDRRC) and Community-Based Emergency Response Teams (CBERT). By training 80 dedicated emergency responders and 60 committee members, the project establishes a grassroots frontline capable of rapid mobilization during disasters. Furthermore, SHIELD promotes economic resilience by supporting 350 women and youth in climate-smart livelihoods. These participants will receive training in adaptive agricultural practices and alternative income-generating activities to mitigate the economic impact of climate change. By diversifying livelihoods, the project helps families build the financial buffer necessary to recover quickly from environmental shocks.</p><p>The overarching goal of the SHIELD project is to bridge the gap between national climate policies and grassroots implementation in the coastal belt. By fostering local leadership and ensuring that marginalized voices—particularly women and youth—are at the forefront of disaster management, the project ensures that community response is both inclusive and sustainable. Furthermore, this project will help build an environment where local institutions not only manage crises but also influence long-term climate adaptation strategies. Ultimately, the SHIELD project will build a stronger, more resilient future for the communities of Khulna and Bagerhat, where local leaders and citizens are active contributors to the nation’s climate security.</p>', 'ongoing', '2026-02-20', NULL, NULL, NULL, NULL, NULL, 1, 0, 1, '2026-02-21 04:20:50', '2026-02-24 10:51:20'),
(2, 'Emergency Flood Relief in Sylhet', 'emergency-flood-relief-in-sylhet', 'seed_1771671173_0_focus_areas_blk.jpeg', 'This is a dummy short description for the CDDF project: Emergency Flood Relief in Sylhet. It aims to improve the lives of vulnerable communities.', '<p>This is a detailed description for <strong>Emergency Flood Relief in Sylhet</strong>.</p><p>CDDF has been working tirelessly to ensure the success of this initiative. The project focuses on sustainable development, community engagement, and long-term impact.</p><ul><li>Objective 1: Community empowerment</li><li>Objective 2: Sustainable growth</li><li>Objective 3: Capacity building</li></ul>', 'ongoing', '2023-07-21', '2025-02-21', 'Sylhet, Bangladesh', 3668737.00, 16799, 'CDDF Core Team', 0, 0, 1, '2026-02-21 04:52:53', '2026-02-28 07:46:21'),
(3, 'Women Empowerment through Skill Training', 'women-empowerment-through-skill-training', 'seed_1771671173_1_gallery_blk.jpg', 'This is a dummy short description for the CDDF project: Women Empowerment through Skill Training. It aims to improve the lives of vulnerable communities.', '<p>This is a detailed description for <strong>Women Empowerment through Skill Training</strong>.</p><p>CDDF has been working tirelessly to ensure the success of this initiative. The project focuses on sustainable development, community engagement, and long-term impact.</p><ul><li>Objective 1: Community empowerment</li><li>Objective 2: Sustainable growth</li><li>Objective 3: Capacity building</li></ul>', 'ongoing', '2023-09-21', '2026-08-21', 'Kurigram, Bangladesh', 4977161.00, 9314, 'CDDF Core Team', 0, 1, 1, '2026-02-21 04:52:53', '2026-02-21 04:52:53'),
(4, 'Clean Drinking Water for Coastal Areas', 'clean-drinking-water-for-coastal-areas', 'seed_1771671173_2_gallery_blk.jpg', 'This is a dummy short description for the CDDF project: Clean Drinking Water for Coastal Areas. It aims to improve the lives of vulnerable communities.', '<p>This is a detailed description for <strong>Clean Drinking Water for Coastal Areas</strong>.</p><p>CDDF has been working tirelessly to ensure the success of this initiative. The project focuses on sustainable development, community engagement, and long-term impact.</p><ul><li>Objective 1: Community empowerment</li><li>Objective 2: Sustainable growth</li><li>Objective 3: Capacity building</li></ul>', 'ongoing', '2024-06-21', '2026-01-21', 'Satkhira, Bangladesh', 1746158.00, 17635, 'CDDF Core Team', 0, 2, 1, '2026-02-21 04:52:53', '2026-02-21 04:52:53'),
(5, 'Child Education Support Program', 'child-education-support-program', 'seed_1771671173_3_donation.jpg', 'This is a dummy short description for the CDDF project: Child Education Support Program. It aims to improve the lives of vulnerable communities.', '<p>This is a detailed description for <strong>Child Education Support Program</strong>.</p><p>CDDF has been working tirelessly to ensure the success of this initiative. The project focuses on sustainable development, community engagement, and long-term impact.</p><ul><li>Objective 1: Community empowerment</li><li>Objective 2: Sustainable growth</li><li>Objective 3: Capacity building</li></ul>', 'ongoing', '2024-11-21', '2027-07-21', 'Dhaka Slums', 4054904.00, 7226, 'CDDF Core Team', 1, 3, 1, '2026-02-21 04:52:53', '2026-02-21 04:52:53'),
(6, 'Climate Resilience Agriculture', 'climate-resilience-agriculture', 'seed_1771671173_4_contact_blk.jpg', 'This is a dummy short description for the CDDF project: Climate Resilience Agriculture. It aims to improve the lives of vulnerable communities.', '<p>This is a detailed description for <strong>Climate Resilience Agriculture</strong>.</p><p>CDDF has been working tirelessly to ensure the success of this initiative. The project focuses on sustainable development, community engagement, and long-term impact.</p><ul><li>Objective 1: Community empowerment</li><li>Objective 2: Sustainable growth</li><li>Objective 3: Capacity building</li></ul>', 'ongoing', '2023-12-21', '2025-06-21', 'Khulna, Bangladesh', 4099500.00, 7353, 'CDDF Core Team', 1, 4, 1, '2026-02-21 04:52:53', '2026-02-21 04:52:53'),
(7, 'Healthcare Access for Rural Communities', 'healthcare-access-for-rural-communities', 'seed_1771671173_5_contact_blk.jpg', 'This is a dummy short description for the CDDF project: Healthcare Access for Rural Communities. It aims to improve the lives of vulnerable communities.', '<p>This is a detailed description for <strong>Healthcare Access for Rural Communities</strong>.</p><p>CDDF has been working tirelessly to ensure the success of this initiative. The project focuses on sustainable development, community engagement, and long-term impact.</p><ul><li>Objective 1: Community empowerment</li><li>Objective 2: Sustainable growth</li><li>Objective 3: Capacity building</li></ul>', 'ongoing', '2024-10-21', '2027-04-21', 'Rangpur, Bangladesh', 2972260.00, 4428, 'CDDF Core Team', 1, 5, 1, '2026-02-21 04:52:53', '2026-02-21 04:52:53'),
(8, 'Youth Leadership Development', 'youth-leadership-development', 'seed_1771671173_6_donation_blk.jpg', 'This is a dummy short description for the CDDF project: Youth Leadership Development. It aims to improve the lives of vulnerable communities.', '<p>This is a detailed description for <strong>Youth Leadership Development</strong>.</p><p>CDDF has been working tirelessly to ensure the success of this initiative. The project focuses on sustainable development, community engagement, and long-term impact.</p><ul><li>Objective 1: Community empowerment</li><li>Objective 2: Sustainable growth</li><li>Objective 3: Capacity building</li></ul>', 'ongoing', '2024-08-21', '2026-07-21', 'Rajshahi, Bangladesh', 4404674.00, 14835, 'CDDF Core Team', 0, 6, 1, '2026-02-21 04:52:53', '2026-02-21 04:52:53'),
(9, 'Disaster Preparedness Training', 'disaster-preparedness-training', 'seed_1771671173_7_contact_blk.jpg', 'This is a dummy short description for the CDDF project: Disaster Preparedness Training. It aims to improve the lives of vulnerable communities.', '<p>This is a detailed description for <strong>Disaster Preparedness Training</strong>.</p><p>CDDF has been working tirelessly to ensure the success of this initiative. The project focuses on sustainable development, community engagement, and long-term impact.</p><ul><li>Objective 1: Community empowerment</li><li>Objective 2: Sustainable growth</li><li>Objective 3: Capacity building</li></ul>', 'ongoing', '2024-08-21', '2026-01-21', 'Cox\'s Bazar, Bangladesh', 3421465.00, 9606, 'CDDF Core Team', 1, 7, 1, '2026-02-21 04:52:53', '2026-02-21 04:52:53'),
(10, 'Nutrition Support for Pregnant Mothers', 'nutrition-support-for-pregnant-mothers', 'seed_1771671173_8_about_us_bg.jpg', 'This is a dummy short description for the CDDF project: Nutrition Support for Pregnant Mothers. It aims to improve the lives of vulnerable communities.', '<p>This is a detailed description for <strong>Nutrition Support for Pregnant Mothers</strong>.</p><p>CDDF has been working tirelessly to ensure the success of this initiative. The project focuses on sustainable development, community engagement, and long-term impact.</p><ul><li>Objective 1: Community empowerment</li><li>Objective 2: Sustainable growth</li><li>Objective 3: Capacity building</li></ul>', 'ongoing', '2023-08-21', '2027-03-21', 'Mymensingh, Bangladesh', 2052869.00, 10217, 'CDDF Core Team', 0, 8, 1, '2026-02-21 04:52:53', '2026-02-21 04:52:53'),
(11, 'Solar Panel Distribution in Off-grid Areas', 'solar-panel-distribution-in-off-grid-areas', 'seed_1771671173_9_mission-vision_bg_blk.jpg', 'This is a dummy short description for the CDDF project: Solar Panel Distribution in Off-grid Areas. It aims to improve the lives of vulnerable communities.', '<p>This is a detailed description for <strong>Solar Panel Distribution in Off-grid Areas</strong>.</p><p>CDDF has been working tirelessly to ensure the success of this initiative. The project focuses on sustainable development, community engagement, and long-term impact.</p><ul><li>Objective 1: Community empowerment</li><li>Objective 2: Sustainable growth</li><li>Objective 3: Capacity building</li></ul>', 'ongoing', '2024-01-21', '2026-07-21', 'Bandarban, Bangladesh', 3759401.00, 8945, 'CDDF Core Team', 1, 9, 1, '2026-02-21 04:52:53', '2026-02-21 04:52:53'),
(12, 'Cyclone Amphan Recovery Project', 'cyclone-amphan-recovery-project', 'seed_1771671173_10_mission-vision_bg.jpg', 'This is a dummy short description for the CDDF project: Cyclone Amphan Recovery Project. It aims to improve the lives of vulnerable communities.', '<p>This is a detailed description for <strong>Cyclone Amphan Recovery Project</strong>.</p><p>CDDF has been working tirelessly to ensure the success of this initiative. The project focuses on sustainable development, community engagement, and long-term impact.</p><ul><li>Objective 1: Community empowerment</li><li>Objective 2: Sustainable growth</li><li>Objective 3: Capacity building</li></ul>', 'completed', '2024-10-21', '2025-09-21', 'Bagerhat, Bangladesh', 1077407.00, 15605, 'CDDF Core Team', 1, 10, 1, '2026-02-21 04:52:53', '2026-02-21 04:52:53'),
(13, 'Winter Clothes Distribution 2024', 'winter-clothes-distribution-2024', 'seed_1771671173_11_gallery_blk.jpg', 'This is a dummy short description for the CDDF project: Winter Clothes Distribution 2024. It aims to improve the lives of vulnerable communities.', '<p>This is a detailed description for <strong>Winter Clothes Distribution 2024</strong>.</p><p>CDDF has been working tirelessly to ensure the success of this initiative. The project focuses on sustainable development, community engagement, and long-term impact.</p><ul><li>Objective 1: Community empowerment</li><li>Objective 2: Sustainable growth</li><li>Objective 3: Capacity building</li></ul>', 'completed', '2023-02-21', '2023-05-21', 'Panchagarh, Bangladesh', 3393494.00, 16194, 'CDDF Core Team', 1, 11, 1, '2026-02-21 04:52:53', '2026-02-21 04:52:53'),
(14, 'Primary School Rebuilding Initiative', 'primary-school-rebuilding-initiative', 'seed_1771671173_12_gallery_blk.jpg', 'This is a dummy short description for the CDDF project: Primary School Rebuilding Initiative. It aims to improve the lives of vulnerable communities.', '<p>This is a detailed description for <strong>Primary School Rebuilding Initiative</strong>.</p><p>CDDF has been working tirelessly to ensure the success of this initiative. The project focuses on sustainable development, community engagement, and long-term impact.</p><ul><li>Objective 1: Community empowerment</li><li>Objective 2: Sustainable growth</li><li>Objective 3: Capacity building</li></ul>', 'completed', '2023-02-21', '2023-08-21', 'Sunamganj, Bangladesh', 2187412.00, 7861, 'CDDF Core Team', 1, 12, 1, '2026-02-21 04:52:53', '2026-02-21 04:52:53'),
(15, 'Community Health Camp 2023', 'community-health-camp-2023', 'seed_1771671173_13_gallery_blk.jpg', 'This is a dummy short description for the CDDF project: Community Health Camp 2023. It aims to improve the lives of vulnerable communities.', '<p>This is a detailed description for <strong>Community Health Camp 2023</strong>.</p><p>CDDF has been working tirelessly to ensure the success of this initiative. The project focuses on sustainable development, community engagement, and long-term impact.</p><ul><li>Objective 1: Community empowerment</li><li>Objective 2: Sustainable growth</li><li>Objective 3: Capacity building</li></ul>', 'completed', '2024-06-21', '2025-03-21', 'Barisal, Bangladesh', 778444.00, 2859, 'CDDF Core Team', 1, 13, 1, '2026-02-21 04:52:53', '2026-02-21 04:52:53'),
(16, 'Sanitation and Hygiene Awareness', 'sanitation-and-hygiene-awareness', 'seed_1771671173_14_focus_areas.jpeg', 'This is a dummy short description for the CDDF project: Sanitation and Hygiene Awareness. It aims to improve the lives of vulnerable communities.', '<p>This is a detailed description for <strong>Sanitation and Hygiene Awareness</strong>.</p><p>CDDF has been working tirelessly to ensure the success of this initiative. The project focuses on sustainable development, community engagement, and long-term impact.</p><ul><li>Objective 1: Community empowerment</li><li>Objective 2: Sustainable growth</li><li>Objective 3: Capacity building</li></ul>', 'completed', '2023-10-21', '2024-02-21', 'Bhola, Bangladesh', 4116170.00, 8727, 'CDDF Core Team', 1, 14, 1, '2026-02-21 04:52:53', '2026-02-21 04:52:53'),
(17, 'Livelihood Support for Fishermen', 'livelihood-support-for-fishermen', 'seed_1771671173_15_focus_areas_blk.jpeg', 'This is a dummy short description for the CDDF project: Livelihood Support for Fishermen. It aims to improve the lives of vulnerable communities.', '<p>This is a detailed description for <strong>Livelihood Support for Fishermen</strong>.</p><p>CDDF has been working tirelessly to ensure the success of this initiative. The project focuses on sustainable development, community engagement, and long-term impact.</p><ul><li>Objective 1: Community empowerment</li><li>Objective 2: Sustainable growth</li><li>Objective 3: Capacity building</li></ul>', 'completed', '2024-01-21', '2024-05-21', 'Patuakhali, Bangladesh', 1478899.00, 4715, 'CDDF Core Team', 1, 15, 1, '2026-02-21 04:52:53', '2026-02-21 04:52:53'),
(18, 'Tree Plantation Drive 2023', 'tree-plantation-drive-2023', 'seed_1771671173_16_news_event_blk.jpg', 'This is a dummy short description for the CDDF project: Tree Plantation Drive 2023. It aims to improve the lives of vulnerable communities.', '<p>This is a detailed description for <strong>Tree Plantation Drive 2023</strong>.</p><p>CDDF has been working tirelessly to ensure the success of this initiative. The project focuses on sustainable development, community engagement, and long-term impact.</p><ul><li>Objective 1: Community empowerment</li><li>Objective 2: Sustainable growth</li><li>Objective 3: Capacity building</li></ul>', 'completed', '2023-10-21', '2024-04-21', 'Gazipur, Bangladesh', 2542599.00, 6540, 'CDDF Core Team', 1, 16, 1, '2026-02-21 04:52:53', '2026-02-21 04:52:53'),
(19, 'Free Eye Camp for Elderly', 'free-eye-camp-for-elderly', 'seed_1771671174_17_mission-vision_bg_blk.jpg', 'This is a dummy short description for the CDDF project: Free Eye Camp for Elderly. It aims to improve the lives of vulnerable communities.', '<p>This is a detailed description for <strong>Free Eye Camp for Elderly</strong>.</p><p>CDDF has been working tirelessly to ensure the success of this initiative. The project focuses on sustainable development, community engagement, and long-term impact.</p><ul><li>Objective 1: Community empowerment</li><li>Objective 2: Sustainable growth</li><li>Objective 3: Capacity building</li></ul>', 'completed', '2023-07-21', '2024-06-21', 'Comilla, Bangladesh', 2087549.00, 11467, 'CDDF Core Team', 1, 17, 1, '2026-02-21 04:52:54', '2026-02-21 04:52:54'),
(20, 'Vocational Training for Disabled Youth', 'vocational-training-for-disabled-youth', 'seed_1771671174_18_about_us_bg.jpg', 'This is a dummy short description for the CDDF project: Vocational Training for Disabled Youth. It aims to improve the lives of vulnerable communities.', '<p>This is a detailed description for <strong>Vocational Training for Disabled Youth</strong>.</p><p>CDDF has been working tirelessly to ensure the success of this initiative. The project focuses on sustainable development, community engagement, and long-term impact.</p><ul><li>Objective 1: Community empowerment</li><li>Objective 2: Sustainable growth</li><li>Objective 3: Capacity building</li></ul>', 'completed', '2024-10-21', '2025-03-21', 'Faridpur, Bangladesh', 2623911.00, 4239, 'CDDF Core Team', 0, 18, 1, '2026-02-21 04:52:54', '2026-02-21 04:52:54'),
(21, 'COVID-19 Food Assistance Program', 'covid-19-food-assistance-program', 'seed_1771671174_19_focus_areas_blk.jpeg', 'This is a dummy short description for the CDDF project: COVID-19 Food Assistance Program. It aims to improve the lives of vulnerable communities.', '<p>This is a detailed description for <strong>COVID-19 Food Assistance Program</strong>.</p><p>CDDF has been working tirelessly to ensure the success of this initiative. The project focuses on sustainable development, community engagement, and long-term impact.</p><ul><li>Objective 1: Community empowerment</li><li>Objective 2: Sustainable growth</li><li>Objective 3: Capacity building</li></ul>', 'completed', '2023-08-21', '2023-11-21', 'Nationwide', 3929677.00, 2165, 'CDDF Core Team', 0, 19, 1, '2026-02-21 04:52:54', '2026-02-21 04:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `project_focus_area`
--

CREATE TABLE `project_focus_area` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `focus_area_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_focus_area`
--

INSERT INTO `project_focus_area` (`id`, `project_id`, `focus_area_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 6),
(4, 3, 6),
(5, 4, 4),
(6, 4, 6),
(7, 5, 2),
(8, 5, 3),
(9, 5, 4),
(10, 6, 2),
(11, 6, 3),
(12, 6, 4),
(13, 7, 1),
(14, 7, 6),
(15, 8, 2),
(16, 9, 3),
(17, 10, 1),
(18, 10, 4),
(19, 11, 1),
(20, 11, 5),
(21, 11, 6),
(22, 12, 5),
(23, 13, 4),
(24, 13, 6),
(25, 14, 2),
(26, 14, 3),
(27, 14, 5),
(28, 15, 1),
(29, 15, 3),
(30, 15, 4),
(31, 16, 1),
(32, 16, 2),
(33, 16, 3),
(34, 17, 6),
(35, 18, 2),
(36, 19, 1),
(37, 19, 3),
(38, 20, 3),
(39, 20, 4),
(40, 21, 2);

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

CREATE TABLE `project_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`id`, `project_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '9521930proj_gallery.jpg', '2026-02-24 13:14:04', '2026-02-24 13:14:04'),
(2, 1, '5459308proj_gallery.jpg', '2026-02-24 13:14:04', '2026-02-24 13:14:04'),
(3, 1, '2191552proj_gallery.jpg', '2026-02-24 13:14:04', '2026-02-24 13:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `project_partner`
--

CREATE TABLE `project_partner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `partner_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_partner`
--

INSERT INTO `project_partner` (`id`, `project_id`, `partner_id`) VALUES
(1, 1, 24),
(2, 1, 26),
(3, 1, 28),
(4, 2, 17),
(5, 2, 23),
(6, 3, 9),
(7, 3, 18),
(8, 4, 16),
(9, 4, 20),
(10, 5, 12),
(11, 5, 25),
(12, 6, 2),
(13, 7, 2),
(14, 7, 9),
(15, 8, 15),
(16, 8, 17),
(17, 9, 23),
(18, 10, 23),
(19, 11, 9),
(20, 12, 11),
(21, 12, 12),
(22, 13, 9),
(23, 13, 23),
(24, 14, 27),
(25, 15, 9),
(26, 16, 17),
(27, 17, 18),
(28, 17, 22),
(29, 18, 11),
(30, 18, 19),
(31, 19, 26),
(32, 20, 8),
(33, 21, 26),
(34, 21, 28);

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `pdf_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `title`, `description`, `thumbnail`, `pdf_file`, `created_at`, `updated_at`) VALUES
(5, 'CDDF PUBLICATION', 'hello this one is a test file', '84997publication_thumbnail.jpg', '26332publication.pdf', NULL, NULL),
(6, 'hello', 'tete', '', '21688publication.pdf', NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `order`, `title`, `description`, `status`, `image`) VALUES
(14, 1, 'Chilmari Distressed Development Foundation (CDDF)', 'Support the Women’s Empowerment Initiative today—help women build livelihoods, confidence and a brighter future.', 1, '8163422slider.jpg'),
(17, 3, 'Women Leadership', 'A panel discussion on Women Leadership was held on 3rd November 2025 in Bali, Indonesia, as part of the South-South Exchange Workshop. Our Chief Executive, Sayda Yesmin, attended the meeting as a representative of Bangladesh. The discussion included participants from four countries — Indonesia, Myanmar, Pakistan, and Bangladesh — who shared their perspectives and experiences on promoting women’s leadership and empowerment.', 1, '7509991slider.jpeg'),
(20, 0, 'Chilmari Distressed Development Foundation (CDDF)', 'Working at the Grassroots to Empower Communities, Promote Equality, and Ensure Dignity through Sustainable Socio-Economic Development.', 1, '2759177slider.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 5,
  `order` int(11) NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `beneficiary_name` varchar(255) DEFAULT NULL,
  `beneficiary_title` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `rating`, `order`, `description`, `image`, `beneficiary_name`, `beneficiary_title`, `date`, `created_at`, `updated_at`) VALUES
(1, 5, 0, 'The new school and clean water project have given our children a brighter future. We are forever grateful.', '73026story.png', 'Rahima Begum', 'Community Leader', NULL, '2026-02-21 07:37:38', '2026-02-21 07:37:38'),
(2, 5, 0, 'Working with the foundation on mobile health clinics has been incredibly rewarding. They reach communities others forget.', '33079story.png', 'Dr. Kamal Hossain', 'Healthcare Professional', NULL, '2026-02-21 07:37:38', '2026-02-21 07:37:38'),
(3, 4, 0, 'The vocational training program helped me start my own tailoring business. Now I can support my family.', '20298story.png', 'Fatima Ahmed', 'Entrepreneur', NULL, '2026-02-21 07:37:38', '2026-02-21 07:37:38'),
(4, 5, 0, 'Education initiative changed my life completely. I never thought I could learn so much.', '31990story.png', 'Abdul Karim', 'Student', NULL, '2026-02-21 07:37:38', '2026-02-21 07:37:38'),
(5, 5, 0, 'Clean water access has reduced illness in our village significantly. Thank you for the support.', '46300story.png', 'Salma Khatun', 'Villager', NULL, '2026-02-21 07:37:38', '2026-02-21 07:37:38'),
(6, 4, 0, 'The micro-finance support allowed us to rebuild after the flood. We are now self-sufficient.', '49338story.png', 'Rafiqul Islam', 'Farmer', NULL, '2026-02-21 07:37:38', '2026-02-21 07:37:38'),
(7, 4, 0, 'We supported vulnerable families with essential resources and guidance.\r\nLives improved through better access to education, health, and opportunities.\r\nTogether, we continue building hope and resilience in the community.', '18944story.png', 'Mofassel Alam Maruf', 'Software Engineer', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `strategic_plans`
--

CREATE TABLE `strategic_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `strategic_plans`
--

INSERT INTO `strategic_plans` (`id`, `title`, `description`, `thumbnail`, `pdf_file`, `created_at`, `updated_at`) VALUES
(1, 'Padma-1', NULL, '86024strategic_plan_image.png', '35262strategic_plan.pdf', '2026-02-09 06:25:19', '2026-02-09 06:25:19'),
(2, 'Padma-2', 'Introducing Padma-2', '88487strategic_plan_image.jpeg', '57393strategic_plan.pdf', '2026-02-09 06:27:59', '2026-02-09 06:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `name`, `email`) VALUES
(293, 'admin123', 'mamaruf317@gmail.com'),
(294, 'subscribe test', 'sub@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `name`, `designation`, `photo`, `department`, `bio`, `facebook`, `twitter`, `instagram`, `youtube`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Mofassel Alam Maruf', 'CEO', '61831team.png', 'CDDF', 'Hello I am Maruf', 'https://www.facebook.com/marufbro310', NULL, NULL, NULL, 0, NULL, NULL);

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
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
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
(5, 'Admin', 'mamaruf317@gmail.com', NULL, '$2y$10$Dtykr1/wXnZZhSBuRy58HOTkoDLCS.ZR8bWxy8CF6XtTB0pskVf8S', 0, 'htpVj9Q45kLnvasRgLm3XmVcCPSa0a0TntNqU84S2eMa5rVKp0GhcZ3WWDh1', '2026-01-29 08:54:29', '2026-01-29 08:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_applications`
--

CREATE TABLE `volunteer_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `volunteer_applications`
--

INSERT INTO `volunteer_applications` (`id`, `name`, `email`, `phone`, `photo`, `address`, `skills`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mofassel Alam Maruf', 'mamaruf317@gmail.com', '01997900840', '72931vol.png', 'Demra,dhaka,bangladesh', 'Teaching', 'I want to volunteer because I am deeply passionate about [cause] and want to make a tangible difference in my community”.\r\n“I am looking to develop my skills in [area] while contributing to a team that makes a positive impact”.', 'approved', '2026-02-23 03:06:54', '2026-02-23 03:08:01'),
(2, 'Aditto Saha', 'ama@gmail.com', '0098765456728', '82231vol.jpeg', 'madaripur', 'healthcare', 'just for fun and enjoyment', 'approved', '2026-02-23 03:10:17', '2026-02-23 03:10:40'),
(3, 'djjdf', NULL, '2345', NULL, NULL, NULL, NULL, 'rejected', '2026-02-28 03:54:24', '2026-02-28 08:44:00'),
(4, 'gbhnjkm', NULL, NULL, NULL, NULL, NULL, NULL, 'rejected', '2026-02-28 03:54:57', '2026-02-28 08:44:00'),
(5, 'hjnkm', NULL, NULL, NULL, NULL, NULL, NULL, 'rejected', '2026-02-28 03:55:03', '2026-02-28 08:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `youtube_videos`
--

CREATE TABLE `youtube_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `youtube_videos`
--

INSERT INTO `youtube_videos` (`id`, `title`, `video_url`, `order`, `created_at`, `updated_at`) VALUES
(1, 'CDDF', 'https://youtu.be/SoiQPKQnMkg?si=SL2i1Njhr8mG436c', 0, '2026-02-23 05:05:36', '2026-02-23 05:05:36'),
(2, 'CDDF 2', 'https://youtu.be/yeE8Aid052E?si=va8mG4B-moAHVQW5', 0, '2026-02-23 05:06:09', '2026-02-23 05:06:09'),
(3, 'CDDF 3', 'https://youtu.be/sFG6pJLL1DM?si=GZl4WvuuXzOsYzat', 0, '2026-02-23 05:06:40', '2026-02-23 05:06:40'),
(4, 'THIS IS A TEST FILE', 'https://youtu.be/0n99CbdaQek?si=uDYsVvnCwnRyhMvz', 0, '2026-02-23 05:06:57', '2026-02-23 05:06:57'),
(5, 'THIS ONE TOO', 'https://youtu.be/-ZXhM5eW988?si=3GJ6__jMgW3StUrO', 0, '2026-02-23 05:07:20', '2026-02-23 05:07:20'),
(6, 'hello test file', 'https://youtu.be/0n99CbdaQek?si=uDYsVvnCwnRyhMvzhttps://youtu.be/OGUVJTZObXY?si=RHXECSXBr4I1Me7u', 0, '2026-02-23 05:07:43', '2026-02-23 05:07:43'),
(7, 'maruf video', 'https://youtu.be/-ZXhM5eW988?si=3GJ6__jMgW3StUrO', 0, '2026-02-23 05:09:03', '2026-02-23 05:09:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
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
-- Indexes for table `latest_news_images`
--
ALTER TABLE `latest_news_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `latest_news_images_news_id_index` (`news_id`);

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
-- Indexes for table `org_members`
--
ALTER TABLE `org_members`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_slug_unique` (`slug`);

--
-- Indexes for table `project_focus_area`
--
ALTER TABLE `project_focus_area`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_focus_area_project_id_focus_area_id_unique` (`project_id`,`focus_area_id`),
  ADD KEY `project_focus_area_focus_area_id_foreign` (`focus_area_id`);

--
-- Indexes for table `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_images_project_id_index` (`project_id`);

--
-- Indexes for table `project_partner`
--
ALTER TABLE `project_partner`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_partner_project_id_partner_id_unique` (`project_id`,`partner_id`),
  ADD KEY `project_partner_partner_id_index` (`partner_id`);

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
-- Indexes for table `volunteer_applications`
--
ALTER TABLE `volunteer_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youtube_videos`
--
ALTER TABLE `youtube_videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chief_executive_message`
--
ALTER TABLE `chief_executive_message`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `executive_committee`
--
ALTER TABLE `executive_committee`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `focus_areas`
--
ALTER TABLE `focus_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `impact`
--
ALTER TABLE `impact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoked`
--
ALTER TABLE `invoked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `latest_news`
--
ALTER TABLE `latest_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `latest_news_images`
--
ALTER TABLE `latest_news_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `legal_affilation`
--
ALTER TABLE `legal_affilation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=837;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `mission_vision`
--
ALTER TABLE `mission_vision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `org_members`
--
ALTER TABLE `org_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `policy_guideline`
--
ALTER TABLE `policy_guideline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `project_focus_area`
--
ALTER TABLE `project_focus_area`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_partner`
--
ALTER TABLE `project_partner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `strategic_plans`
--
ALTER TABLE `strategic_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `volunteer_applications`
--
ALTER TABLE `volunteer_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `youtube_videos`
--
ALTER TABLE `youtube_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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

--
-- Constraints for table `project_focus_area`
--
ALTER TABLE `project_focus_area`
  ADD CONSTRAINT `project_focus_area_focus_area_id_foreign` FOREIGN KEY (`focus_area_id`) REFERENCES `focus_areas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_focus_area_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_images`
--
ALTER TABLE `project_images`
  ADD CONSTRAINT `project_images_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_partner`
--
ALTER TABLE `project_partner`
  ADD CONSTRAINT `project_partner_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
