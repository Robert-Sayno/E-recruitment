-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 02:43 PM
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
-- Database: `ee_recruitment`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `status` enum('pending','accepted','rejected') DEFAULT 'pending',
  `applied_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `job_id`, `status`, `applied_at`) VALUES
(16, 1, 1, 'pending', '2024-10-22 11:52:39'),
(17, 2, 2, 'accepted', '2024-10-22 11:52:39'),
(18, 3, 3, 'rejected', '2024-10-22 11:52:39'),
(19, 1, 4, 'pending', '2024-10-22 11:52:39'),
(20, 4, 5, 'pending', '2024-10-22 11:52:39'),
(21, 3, 6, 'accepted', '2024-10-22 11:52:39'),
(22, 2, 7, 'pending', '2024-10-22 11:52:39'),
(23, 5, 8, 'rejected', '2024-10-22 11:52:39'),
(24, 4, 9, 'pending', '2024-10-22 11:52:39'),
(25, 1, 10, 'accepted', '2024-10-22 11:52:39'),
(26, 5, 11, 'pending', '2024-10-22 11:52:39'),
(27, 2, 12, 'rejected', '2024-10-22 11:52:39'),
(28, 3, 13, 'pending', '2024-10-22 11:52:39'),
(29, 4, 14, 'accepted', '2024-10-22 11:52:39'),
(30, 1, 15, 'pending', '2024-10-22 11:52:39'),
(31, NULL, 3, 'pending', '2024-10-22 12:14:56'),
(32, NULL, 4, 'pending', '2024-10-22 12:18:11'),
(33, 1, 5, 'pending', '2024-10-22 12:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `requirements` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `posted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `requirements`, `location`, `company`, `posted_at`) VALUES
(1, 'Software Developer', 'Develop and maintain web applications.', 'Bachelor\'s degree in Computer Science, experience in PHP and MySQL.', 'Kampala', 'Tech Innovations Uganda', '2024-10-22 11:49:00'),
(2, 'Project Manager', 'Oversee project planning and execution.', 'Proven experience in project management, PMP certification preferred.', 'Entebbe', 'Global Projects Ltd.', '2024-10-22 11:49:00'),
(3, 'Data Analyst', 'Analyze data to support decision-making.', 'Bachelor\'s degree in Statistics or related field, experience with data visualization tools.', 'Mbarara', 'Data Insights Uganda', '2024-10-22 11:49:00'),
(4, 'Sales Executive', 'Manage client relationships and sales strategies.', 'Experience in sales, excellent communication skills.', 'Gulu', 'Smart Marketing Uganda', '2024-10-22 11:49:00'),
(5, 'Civil Engineer', 'Design and supervise construction projects.', 'Bachelor\'s degree in Civil Engineering, 3+ years of experience.', 'Jinja', 'Construct Uganda Ltd.', '2024-10-22 11:49:00'),
(6, 'Nurse', 'Provide medical care to patients.', 'Registered Nurse certification, experience in a clinical setting.', 'Kampala', 'Health First Hospital', '2024-10-22 11:49:00'),
(7, 'Marketing Manager', 'Develop marketing strategies and campaigns.', 'Bachelor\'s degree in Marketing or Business, experience in digital marketing.', 'Kampala', 'Creative Solutions Agency', '2024-10-22 11:49:00'),
(8, 'Graphic Designer', 'Create visual content for various media.', 'Proficient in Adobe Creative Suite, portfolio required.', 'Kampala', 'Design Hub Uganda', '2024-10-22 11:49:00'),
(9, 'Teacher', 'Teach primary school subjects to students.', 'Bachelor\'s degree in Education, experience in teaching preferred.', 'Masaka', 'Bright Future Primary School', '2024-10-22 11:49:00'),
(10, 'Accountant', 'Manage financial records and reports.', 'Bachelor\'s degree in Accounting, experience with accounting software.', 'Kampala', 'Accounting Solutions Uganda', '2024-10-22 11:49:00'),
(11, 'HR Officer', 'Manage recruitment and employee relations.', 'Bachelor\'s degree in Human Resources, experience in HR management.', 'Kampala', 'People Management Ltd.', '2024-10-22 11:49:00'),
(12, 'Electrician', 'Install and maintain electrical systems.', 'Certification in Electrical Engineering, experience in installation.', 'Fort Portal', 'Bright Sparks Electricals', '2024-10-22 11:49:00'),
(13, 'Content Writer', 'Create engaging content for websites and blogs.', 'Strong writing skills, experience in content creation.', 'Kampala', 'Content Creators Uganda', '2024-10-22 11:49:00'),
(14, 'Agricultural Officer', 'Promote agricultural best practices and advise farmers.', 'Degree in Agriculture or related field, experience in extension services.', 'Lira', 'Agriculture Development Agency', '2024-10-22 11:49:00'),
(15, 'Web Developer', 'Build and maintain websites for clients.', 'Experience in HTML, CSS, JavaScript, and PHP.', 'Kampala', 'Web Solutions Uganda', '2024-10-22 11:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `contact_info` text DEFAULT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `website`, `contact_info`, `added_at`) VALUES
(1, 'Uganda Investment Authority', 'https://www.ugandainvest.go.ug', 'Tel: +256 414 345 668, Email: info@investuganda.com', '2024-10-22 11:50:09'),
(2, 'National Social Security Fund', 'https://www.nssfug.org', 'Tel: +256 414 340 000, Email: info@nssfug.org', '2024-10-22 11:50:09'),
(3, 'Uganda National Roads Authority', 'https://www.unra.go.ug', 'Tel: +256 414 320 241, Email: info@unra.go.ug', '2024-10-22 11:50:09'),
(4, 'Uganda Revenue Authority', 'https://www.ura.go.ug', 'Tel: +256 414 301 111, Email: ura@ura.go.ug', '2024-10-22 11:50:09'),
(5, 'Makerere University', 'https://www.mak.ac.ug', 'Tel: +256 414 532 400, Email: info@mak.ac.ug', '2024-10-22 11:50:09'),
(6, 'Uganda Electricity Transmission Company', 'https://www.uetcl.com', 'Tel: +256 414 701 900, Email: info@uetcl.com', '2024-10-22 11:50:09'),
(7, 'National Water and Sewerage Corporation', 'https://www.nwsc.co.ug', 'Tel: +256 414 347 000, Email: info@nwsc.co.ug', '2024-10-22 11:50:09'),
(8, 'Uganda Communications Commission', 'https://www.ucc.co.ug', 'Tel: +256 414 340 000, Email: info@ucc.co.ug', '2024-10-22 11:50:09'),
(9, 'Uganda Bureau of Statistics', 'https://www.ubos.org', 'Tel: +256 414 706 000, Email: info@ubos.org', '2024-10-22 11:50:09'),
(10, 'Kampala Capital City Authority', 'https://www.kcca.go.ug', 'Tel: +256 414 251 099, Email: info@kcca.go.ug', '2024-10-22 11:50:09'),
(11, 'Uganda Police Force', 'https://www.upf.go.ug', 'Tel: +256 414 256 500, Email: upf@upf.go.ug', '2024-10-22 11:50:09'),
(12, 'Ministry of Health', 'https://www.health.go.ug', 'Tel: +256 414 340 000, Email: info@health.go.ug', '2024-10-22 11:50:09'),
(13, 'Ministry of Education and Sports', 'https://www.education.go.ug', 'Tel: +256 414 259 511, Email: info@education.go.ug', '2024-10-22 11:50:09'),
(14, 'Uganda Wildlife Authority', 'https://www.ugandawildlife.org', 'Tel: +256 414 355 000, Email: info@ugandawildlife.org', '2024-10-22 11:50:09'),
(15, 'Uganda Tourism Board', 'https://www.utb.go.ug', 'Tel: +256 414 340 220, Email: info@utb.go.ug', '2024-10-22 11:50:09'),
(16, 'Uganda National Bureau of Standards', 'https://www.unbs.go.ug', 'Tel: +256 414 233 100, Email: info@unbs.go.ug', '2024-10-22 11:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','applicant') DEFAULT 'applicant',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$5e0ak1Ne3LcQDHBkFJlLXOT4M4nIkmqcVOHc9NRnEhQhBALnKBWHC', 'applicant', '2024-10-22 11:44:49'),
(2, 'james.kabale@gmail.com', 'password1', 'applicant', '2024-10-22 11:52:20'),
(3, 'mariam.nansubuga@gmail.com', 'password2', 'applicant', '2024-10-22 11:52:20'),
(4, 'isaac.wetaka@gmail.com', 'password3', 'applicant', '2024-10-22 11:52:20'),
(5, 'sarah.katende@gmail.com', 'password4', 'applicant', '2024-10-22 11:52:20'),
(6, 'peter.mukasa@gmail.com', 'password5', 'applicant', '2024-10-22 11:52:20'),
(7, 'flavia.nankya@gmail.com', 'password6', 'applicant', '2024-10-22 11:52:20'),
(8, 'benjamin.kamya@gmail.com', 'password7', 'applicant', '2024-10-22 11:52:20'),
(9, 'grace.ayikoru@gmail.com', 'password8', 'applicant', '2024-10-22 11:52:20'),
(10, 'daniel.ssewanyana@gmail.com', 'password9', 'applicant', '2024-10-22 11:52:20'),
(11, 'angela.kamuli@gmail.com', 'password10', 'applicant', '2024-10-22 11:52:20'),
(12, 'benita.mukwaya@gmail.com', 'password11', 'applicant', '2024-10-22 11:52:20'),
(13, 'ivan.ssekandi@gmail.com', 'password12', 'applicant', '2024-10-22 11:52:20'),
(14, 'lillian.nabudere@gmail.com', 'password13', 'applicant', '2024-10-22 11:52:20'),
(15, 'hassan.kasule@gmail.com', 'password14', 'applicant', '2024-10-22 11:52:20'),
(16, 'diana.muwanga@gmail.com', 'password15', 'applicant', '2024-10-22 11:52:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
