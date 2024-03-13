-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2022 at 03:33 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `attempted_quiz`
--

CREATE TABLE `attempted_quiz` (
  `aq_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `no_of_question` int(11) NOT NULL,
  `correct_attempt` int(11) NOT NULL,
  `wrong_attemp` int(11) NOT NULL,
  `not_attempt` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attempted_quiz`
--

INSERT INTO `attempted_quiz` (`aq_id`, `user_id`, `quiz_id`, `cat_id`, `no_of_question`, `correct_attempt`, `wrong_attemp`, `not_attempt`, `created_at`) VALUES
(1, 4, 5, 18, 2, 1, 1, 0, '2022-05-02 11:42:36'),
(2, 4, 5, 18, 2, 1, 1, 0, '2022-05-02 11:48:15'),
(3, 4, 5, 18, 2, 1, 1, 0, '2022-05-02 12:05:22'),
(4, 4, 7, 22, 5, 3, 2, 0, '2022-05-02 13:27:30');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `created_at`) VALUES
(1, 'Bata Test', '2022-04-29 08:28:33'),
(18, 'Moon', '2022-04-29 11:33:47'),
(19, 'Moon Hanzla', '2022-04-29 12:00:13'),
(20, 'Moon12', '2022-04-29 12:03:00'),
(22, 'Computer Science', '2022-05-02 13:22:51');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `option_d` text NOT NULL,
  `correct_ans` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `category_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_ans`, `created_at`) VALUES
(1, 19, 'Your Name', 'Hanzla', 'Not', 'None', 'Not Know', 'Hanzla', '2022-04-29 13:03:47'),
(3, 20, 'Your Name', 'Hanzla', 'Not', 'None', 'Not Know', 'Not Know', '2022-04-29 13:05:23'),
(6, 20, 'Capital of Pakistan', 'FSD', 'KHI', 'ISB', 'LHR', 'ISB', '2022-04-29 16:42:06'),
(7, 20, 'Your Name Real', 'Hanzla', 'Not', 'None', 'Not Know', 'Hanzla', '2022-04-29 13:05:23'),
(8, 18, 'PCB stands for', 'Pakistan Cricket Board', 'Pakistan Coucil Board', 'Pakistan Cricket Boat ', 'Pakistan Coucil Boat', 'Pakistan Cricket Board', '2022-05-01 13:15:33'),
(9, 18, 'CPU in computer stands for', 'Central Pak Unit', 'Central Play Unit', 'Central Processing Unit', 'Central Park Unite', 'Central Processing Unit', '2022-05-01 13:16:46'),
(10, 22, 'PCB in computer stands for', 'Pakistan Cricket Board', 'Pakistan Coucil Board', 'Process Control Box', 'Process Counter Box', 'Process Control Box', '2022-05-02 13:23:32'),
(11, 22, 'CPU in computer stands for', 'Central Pak Unit', 'Central Play Unit', 'Central Processing Unit', 'Central Park Unite', 'Central Processing Unit', '2022-05-02 13:23:48'),
(12, 22, 'IP stands for', 'Internet Protocol', 'Internet Process', 'Information Protocol', 'Internet Packet', 'Internet Protocol', '2022-05-02 13:24:22'),
(13, 22, 'Keyboard is an', 'Output Device', 'Input Device', 'Communication Device', 'None of Them', 'Input Device', '2022-05-02 13:25:02'),
(14, 22, 'Speaker is an', 'Output Device', 'Input Device', 'Communication Device', 'None of Them', 'Output Device', '2022-05-02 13:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `no_of_question` int(11) NOT NULL,
  `timing` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `category_id`, `no_of_question`, `timing`, `created_at`) VALUES
(5, 18, 2, '2:00', '2022-05-01 13:17:01'),
(6, 20, 3, '1:20', '2022-05-01 13:18:44'),
(7, 22, 5, '2:00', '2022-05-02 13:26:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user',
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role`, `is_active`, `created_at`) VALUES
(1, 'admin name', 'admin@admin.com', '12345678', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1, '2022-04-28 20:00:35'),
(4, 'hanzla', 'um74587@gmail.com', '12345678', '202cb962ac59075b964b07152d234b70', 'user', 1, '2022-04-30 15:47:31'),
(5, 'user', 'user@user.com', '12345678', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 1, '2022-05-02 13:32:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attempted_quiz`
--
ALTER TABLE `attempted_quiz`
  ADD PRIMARY KEY (`aq_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attempted_quiz`
--
ALTER TABLE `attempted_quiz`
  MODIFY `aq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
