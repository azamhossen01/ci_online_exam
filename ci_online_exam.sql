-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2020 at 06:26 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_online_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL DEFAULT 0,
  `total_marks` int(11) NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `exam_details`
--

CREATE TABLE `exam_details` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `opt` varchar(255) NOT NULL,
  `correct` int(11) DEFAULT NULL COMMENT '1=correct,null=wrong',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `opt`, `correct`, `created_at`) VALUES
(1, 1, '৪৮', 1, '2020-01-03 02:02:33'),
(2, 1, '৫২', 0, '2020-01-03 02:02:33'),
(3, 1, '৪৫', 0, '2020-01-03 02:02:33'),
(4, 1, '৪৬', 0, '2020-01-03 02:02:33'),
(5, 2, 'জাপান', 0, '2020-01-03 02:39:24'),
(6, 2, 'আমেরিকা', 0, '2020-01-03 02:39:24'),
(7, 2, 'চীন', 1, '2020-01-03 02:39:24'),
(8, 2, 'ভারত', 0, '2020-01-03 02:39:24'),
(9, 3, '৭টি', 0, '2020-01-03 09:01:14'),
(10, 3, '৯টি', 0, '2020-01-03 09:01:14'),
(11, 3, '৬টি', 0, '2020-01-03 09:01:14'),
(12, 3, '৮টি', 1, '2020-01-03 09:01:14'),
(13, 4, 'পদ+ধতি', 0, '2020-01-03 09:02:14'),
(14, 4, 'পদ্ + হতি', 1, '2020-01-03 09:02:15'),
(15, 4, 'পৎ+ ধতি', 0, '2020-01-03 09:02:15'),
(16, 4, 'পথ+ ধতি', 0, '2020-01-03 09:02:15'),
(17, 5, 'করণে সপ্তমী', 0, '2020-01-03 09:03:11'),
(18, 5, 'অধিকরণে সপ্তমী', 0, '2020-01-03 09:03:11'),
(19, 5, 'কর্তাকারকে সপ্তমী', 1, '2020-01-03 09:03:11'),
(20, 5, 'অপাদানে সপ্তমী', 0, '2020-01-03 09:03:11'),
(21, 6, 'নিন্দনীয়', 0, '2020-01-03 09:05:30'),
(22, 6, 'প্রশংসনীয়', 0, '2020-01-03 09:05:30'),
(23, 6, 'অনিন্দ্য', 1, '2020-01-03 09:05:30'),
(24, 6, 'প্রশংসার যোগ্য', 0, '2020-01-03 09:05:30'),
(25, 7, 'সমিতি', 0, '2020-01-03 09:06:28'),
(26, 7, 'প্রতিতি', 1, '2020-01-03 09:06:28'),
(27, 7, 'জ্যামিতি', 0, '2020-01-03 09:06:28'),
(28, 7, 'প্রকৃতি', 0, '2020-01-03 09:06:28'),
(29, 8, '২৩ অক্টোবর', 0, '2020-01-03 09:08:28'),
(30, 8, '২৪ অক্টোবর', 1, '2020-01-03 09:08:28'),
(31, 8, '২৮ অক্টোবর', 0, '2020-01-03 09:08:28'),
(32, 8, '২৬ অক্টোবর', 0, '2020-01-03 09:08:28'),
(33, 9, 'UNCTAD', 0, '2020-01-03 09:10:26'),
(34, 9, 'OIC', 0, '2020-01-03 09:10:26'),
(35, 9, ' WTO', 1, '2020-01-03 09:10:26'),
(36, 9, 'GAT', 0, '2020-01-03 09:10:26'),
(37, 10, ' Large Crystal Display', 0, '2020-01-03 09:12:41'),
(38, 10, ' Liquid Crystal Display', 1, '2020-01-03 09:12:41'),
(39, 10, ' Liquid Copy Display', 0, '2020-01-03 09:12:41'),
(40, 10, ' Liquid Crystal Depth', 0, '2020-01-03 09:12:41'),
(41, 11, 'ডঃ পল মুলার', 1, '2020-01-03 09:16:35'),
(42, 11, 'আইজেক নিউটন', 0, '2020-01-03 09:16:35'),
(43, 11, 'আলেকজান্ডার ফ্লেমিং', 0, '2020-01-03 09:16:35'),
(44, 11, 'এডিসন', 0, '2020-01-03 09:16:35'),
(45, 12, 'aaaaaaa', 0, '2020-01-03 09:25:09'),
(46, 12, 'bbbbbbbbb', 0, '2020-01-03 09:25:09'),
(47, 12, 'cccccccccccccc', 1, '2020-01-03 09:25:09'),
(48, 12, 'ddddddddddddd', 0, '2020-01-03 09:25:09'),
(49, 13, 'aaaaaaaaa', 0, '2020-01-03 09:25:33'),
(50, 13, 'bbbbbbbb', 0, '2020-01-03 09:25:33'),
(51, 13, 'dddddddddd', 0, '2020-01-03 09:25:33'),
(52, 13, 'ccccccccccccccccc', 1, '2020-01-03 09:25:34'),
(53, 14, 'aaaaaaaaa', 0, '2020-01-03 09:25:51'),
(54, 14, 'bbbbbbbbb', 1, '2020-01-03 09:25:51'),
(55, 14, 'cccccccccccccc', 0, '2020-01-03 09:25:51'),
(56, 14, 'dddddddddddddddddd', 0, '2020-01-03 09:25:51'),
(57, 15, 'aaaaaaaaaaaa', 0, '2020-01-03 09:26:07'),
(58, 15, 'cccccccccccccc', 1, '2020-01-03 09:26:07'),
(59, 15, 'bbbbbbbbbbbbbb', 0, '2020-01-03 09:26:07'),
(60, 15, 'eeeeeeeeeeeeee', 0, '2020-01-03 09:26:07'),
(61, 16, 'aaaaaaaaaaa', 0, '2020-01-03 09:26:25'),
(62, 16, 'ccccccccccccc', 0, '2020-01-03 09:26:25'),
(63, 16, 'bbbbbbbbbbbbbbbbb', 0, '2020-01-03 09:26:25'),
(64, 16, 'ddddddddddddddd', 1, '2020-01-03 09:26:25'),
(65, 17, 'aaaaaaaaaa', 0, '2020-01-03 09:26:40'),
(66, 17, 'dddddddd', 0, '2020-01-03 09:26:40'),
(67, 17, 'eeeeeeeeeee', 1, '2020-01-03 09:26:40'),
(68, 17, 'fffffffffffffff', 0, '2020-01-03 09:26:40'),
(69, 18, 'জামাল', 0, '2020-01-03 09:27:23'),
(70, 18, 'কামাল', 0, '2020-01-03 09:27:23'),
(71, 18, 'রহিম', 1, '2020-01-03 09:27:23'),
(72, 18, 'করিম', 0, '2020-01-03 09:27:23'),
(73, 19, 'কাজী নজরুল ইসলাম', 0, '2020-01-03 09:28:36'),
(74, 19, 'রবীন্দ্র নাথ ঠাকুর', 1, '2020-01-03 09:28:36'),
(75, 19, 'জসীম উদদীন', 0, '2020-01-03 09:28:36'),
(76, 19, 'আহসান হাবীব', 0, '2020-01-03 09:28:36'),
(77, 20, '৬৪টি', 1, '2020-01-03 09:29:46'),
(78, 20, '৪৪টি', 0, '2020-01-03 09:29:46'),
(79, 20, '৪৮টি', 0, '2020-01-03 09:29:46'),
(80, 20, '৫৬টি', 0, '2020-01-03 09:29:46'),
(81, 21, 'জাহাঙ্গীরনগর', 1, '2020-01-03 09:30:59'),
(82, 21, 'ইসলামাবাদ', 0, '2020-01-03 09:30:59'),
(83, 21, 'আহমাদাবাদ', 0, '2020-01-03 09:30:59'),
(84, 21, 'রহমতগঞ্জ', 0, '2020-01-03 09:30:59'),
(85, 22, 'চট্টগ্রাম', 0, '2020-01-03 09:32:11'),
(86, 22, 'ঢাকা', 1, '2020-01-03 09:32:11'),
(87, 22, 'কুমিল্লা', 0, '2020-01-03 09:32:11'),
(88, 22, 'বরিশাল', 0, '2020-01-03 09:32:11'),
(89, 23, 'দক্ষিণ আফ্রিকা', 0, '2020-01-03 09:33:54'),
(90, 23, 'কানাডা', 0, '2020-01-03 09:33:54'),
(91, 23, 'USA', 1, '2020-01-03 09:33:54'),
(92, 23, 'US', 0, '2020-01-03 09:33:54');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `subject_id`, `question`, `created_at`) VALUES
(1, 1, 'বাংলাদেশের বর্তমান মন্ত্রিসভা কয় সদস্যবিশিষ্ট?', '2020-01-03 02:02:33'),
(2, 5, 'বাংলাদেশে পণ্য আমদানির সবচেয়ে বড় বাজার কোন দেশ?', '2020-01-03 02:39:24'),
(3, 1, 'বাংলা বর্ণমালায় অর্ধমাত্রার কয়ট?', '2020-01-03 09:01:14'),
(4, 1, 'পদ্ধতি শব্দের সন্ধি বিচ্ছেদ করলে পাওয়া যায়-', '2020-01-03 09:02:14'),
(5, 1, '“বুলবুলিতে ধান খেয়েছে”- এই বাক্যের ‘বুলবুলিতে’ শব্দে কোন কারকে কোন বিভক্তি রয়েছে?', '2020-01-03 09:03:11'),
(6, 1, 'কোন বানানটি শুদ্ধ?', '2020-01-03 09:05:30'),
(7, 1, 'ভুল বানান কোনটি?', '2020-01-03 09:06:28'),
(8, 5, 'প্রতিবছর জাতিসংঘ দিবস পালিত হয়', '2020-01-03 09:08:28'),
(9, 5, 'বিশ্বের সবচেয়ে বড় অর্থনৈতিক জোট', '2020-01-03 09:10:26'),
(10, 5, 'LCD এর পূর্ণমান লিখ', '2020-01-03 09:12:41'),
(11, 5, '১. DDT কে আবিষ্কার করেন?', '2020-01-03 09:16:35'),
(12, 5, 'Which of the following terms is not used in the field of physics?', '2020-01-03 09:25:09'),
(13, 5, 'aaaaaaaaaaaaaaaaaaaaaaaa', '2020-01-03 09:25:33'),
(14, 5, 'bbbbbbbbbbbbbbbbbbb', '2020-01-03 09:25:51'),
(15, 5, 'cccccccccccccccccccc', '2020-01-03 09:26:07'),
(16, 1, 'ddddddddddddddddddd', '2020-01-03 09:26:25'),
(17, 5, 'eeeeeeeeeeeeeeeee', '2020-01-03 09:26:40'),
(18, 1, 'তোমার নাম কী?\r\n', '2020-01-03 09:27:23'),
(19, 1, 'পরিচয় কবিতার রচয়িতা কে?', '2020-01-03 09:28:36'),
(20, 1, 'বাংলাদেশে মোট কয়টি জেলা আছে?', '2020-01-03 09:29:46'),
(21, 1, 'ঢাকার পূর্ব নাম কী?', '2020-01-03 09:30:59'),
(22, 1, 'বাংলাদেশের রাজধানীর নাম কী?', '2020-01-03 09:32:11'),
(23, 5, 'কোন দেশের সংসদ সম্প্রতি উইঘুর বিল পাস করেছে?', '2020-01-03 09:33:54');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`) VALUES
(1, 'Bangla', '2020-01-02 15:06:55'),
(2, 'English', '2020-01-03 01:50:55'),
(3, 'Math', '2020-01-03 01:56:59'),
(4, 'Computer Science', '2020-01-03 01:58:17'),
(5, 'General Knowledge', '2020-01-03 02:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 2,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `name`, `email`, `password`, `created_at`, `status`) VALUES
(1, 1, 'Admin Khan', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-01-01 15:14:38', 0),
(2, 2, 'Azam Hossen', 'azam@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-01-01 16:50:36', 0),
(3, 2, 'Mirza Galib', 'galib@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-01-01 16:51:48', 0),
(4, 2, 'Rakib Hasan', 'rakib@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-01-01 16:53:14', 0),
(5, 2, 'Mizan Rahman', 'mizan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-01-01 16:57:16', 0),
(6, 2, 'Test User', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-01-01 17:04:20', 0),
(7, 2, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-01-01 17:06:44', 0),
(8, 2, 'Rafayet Hasan', 'rafayet@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-01-01 17:16:12', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_details`
--
ALTER TABLE `exam_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_details`
--
ALTER TABLE `exam_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
