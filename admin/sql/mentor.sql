-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2022 at 06:32 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mentor`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `about_title` varchar(255) NOT NULL,
  `about_desc` longtext NOT NULL,
  `about_image` varchar(80) NOT NULL,
  `about_created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `about_title`, `about_desc`, `about_image`, `about_created_at`) VALUES
(1, 'This is About Section', '<p><span style=\"\" google=\"\" sans=\"\" text\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#424242\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</font></span><br></p>', '620e7f912bd370.73710185.jpeg', '2021-12-13 11:45:26');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(80) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_about` longtext NOT NULL,
  `admin_phone` varchar(15) NOT NULL,
  `admin_photo` varchar(80) NOT NULL,
  `admin_created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_about`, `admin_phone`, `admin_photo`, `admin_created_at`) VALUES
(2, 'Sujon Ahmed', 'sujonahmed@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Hi, I am Sujon Ahmed a Full Stack Web Developer', '01743405982', '620e7ca3d25607.17469922.jpg', '2022-02-17 22:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `banner_title` varchar(255) NOT NULL,
  `banner_img` varchar(80) NOT NULL,
  `banner_desc` varchar(255) NOT NULL,
  `banner_created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_title`, `banner_img`, `banner_desc`, `banner_created_at`) VALUES
(2, 'Welcome To Mentor', '61b6dbf0298764.16892374.png', '<p>The Mentor is a Course Management Website</p>', '2021-12-13 11:36:48');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` int(11) NOT NULL,
  `contact_email` int(11) NOT NULL,
  `contact_subject` int(11) NOT NULL,
  `contact_message` int(11) NOT NULL,
  `contact_msg_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_name`, `contact_email`, `contact_subject`, `contact_message`, `contact_msg_time`) VALUES
(1, 0, 0, 0, 0, '2022-02-17 15:15:47');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `course_category` varchar(50) NOT NULL,
  `course_fee` int(11) NOT NULL,
  `trainer` varchar(50) NOT NULL,
  `course_thumbnail` varchar(60) NOT NULL,
  `course_desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_title`, `course_category`, `course_fee`, `trainer`, `course_thumbnail`, `course_desc`) VALUES
(1, 'Learn JavaScript', '2', 120, '2', '620e0c5f0b4406.61859346.jpg', '<p>lorem ipsum dummy text</p>'),
(2, 'Web Development', '4', 30, '1', '620e809a5bd3f7.46185363.png', '<p>In this course, we are learning how to create responsive web design step by step.</p>'),
(3, 'Learn about React', '3', 150, '3', '620e83c5aa4132.05469601.png', '<p>In this course we are providing you react new all features with unlimited support 24 hours</p>');

-- --------------------------------------------------------

--
-- Table structure for table `course_category`
--

CREATE TABLE `course_category` (
  `course_category_id` int(11) NOT NULL,
  `course_category_icon` varchar(50) NOT NULL,
  `course_category_name` varchar(50) NOT NULL,
  `slag` varchar(50) NOT NULL,
  `course_category_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_category`
--

INSERT INTO `course_category` (`course_category_id`, `course_category_icon`, `course_category_name`, `slag`, `course_category_created`) VALUES
(1, 'bx bxl-python', 'Python', 'python', '2021-12-13 12:55:53'),
(2, 'bx bxl-javascript', 'JavaScript', 'javascript', '2021-12-13 12:56:19'),
(3, 'bx bxl-react', 'React', 'react', '2021-12-13 12:56:36'),
(4, 'bx bxl-html5', 'HTML5', 'html5', '2021-12-13 12:56:52'),
(5, 'bx bxl-css3', 'CSS3', 'css3', '2022-02-17 23:07:26');

-- --------------------------------------------------------

--
-- Table structure for table `course_features`
--

CREATE TABLE `course_features` (
  `course_features_id` int(11) NOT NULL,
  `course_features_icon` varchar(30) NOT NULL,
  `course_features_title` varchar(255) NOT NULL,
  `course_features_desc` longtext NOT NULL,
  `course_features_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_features`
--

INSERT INTO `course_features` (`course_features_id`, `course_features_icon`, `course_features_title`, `course_features_desc`, `course_features_created`) VALUES
(3, 'bx bx-code-alt', 'Web Development', 'We are provide a complete development project for our features lorem ipsum dummy text hello world this is a fast output for this course', '2021-12-13 12:44:45'),
(4, 'bx bx-search', 'SEO', '<p>Search Engine Optimizing, This is way for your webpage top rank in search engine</p>', '2021-12-13 12:48:27'),
(5, 'bx bx-user', 'User', '<p>lorem ipsum dummy text for this text&nbsp;</p>', '2021-12-13 12:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_img` varchar(60) NOT NULL,
  `event_desc` longtext NOT NULL,
  `event_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_img`, `event_desc`, `event_time`) VALUES
(1, 'Introduction to JavaScript', '620e0d7ebc42c8.03814326.jpg', '<p>In this events we are celebrate javascript features</p>', '2022-02-17 14:55:26'),
(2, 'React Presentation', '620e848486b697.67190816.png', '<p>We are Learn New Features in React</p>', '2022-02-17 23:23:16');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location_title` varchar(255) NOT NULL,
  `location_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_title`, `location_link`) VALUES
(1, 'Dhaka, Bangladesh', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233728.50547200968!2d90.38566730572443!3d23.746952400792733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1638972294206!5m2!1sen!');

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `pricing_id` int(11) NOT NULL,
  `pricing_title` varchar(255) NOT NULL,
  `pricing_price` int(11) NOT NULL,
  `pricing_desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`pricing_id`, `pricing_title`, `pricing_price`, `pricing_desc`) VALUES
(1, 'Free', 0, '<p><font color=\"#34aa09\">lorem</font></p><p><font color=\"#ff0000\">ipsum</font></p><p><font color=\"#ff0000\">dummy</font></p><p><font color=\"#ff0000\">text</font></p>'),
(2, 'Bussiness', 10, '<p><span style=\"color: rgb(25, 155, 23);\">lorem</span></p><p><span style=\"color: rgb(25, 155, 23); font-size: 1rem;\">ipsum</span></p><p><font color=\"#199b17\"></font></p><p></p><p><font color=\"#ff0000\">dummy</font></p><p><font color=\"#ff0000\">text</font></p>'),
(3, 'Developer', 19, '<p><font color=\"#379d0b\">lorem </font></p><p><font color=\"#379d0b\">ipsum</font></p><p><font color=\"#379d0b\">dummy</font></p><p><font color=\"#ff0000\">text</font></p><p><br></p>'),
(4, 'Ultimate', 25, '<p><font color=\"#0e920c\">lorem&nbsp;</font></p><p><font color=\"#0e920c\">ipsum&nbsp;</font></p><p><font color=\"#0e920c\">dummy</font></p><p><font color=\"#0e920c\">text</font></p>');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `course_category_id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `student_phone` varchar(15) NOT NULL,
  `student_gmail` varchar(50) NOT NULL,
  `student_img` varchar(80) NOT NULL,
  `student_course` varchar(30) NOT NULL,
  `feedback` longtext NOT NULL,
  `admission_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `course_category_id`, `student_name`, `student_phone`, `student_gmail`, `student_img`, `student_course`, `feedback`, `admission_time`) VALUES
(1, 0, 'Sujon Ahmed', '01743405982', 'sujonahmed@gmail.com', '61b6fb502fc6b0.99194351.jpg', '2', '', '2021-12-13 13:50:40'),
(2, 0, 'Riman Ahmed', '01906888478', 'riman@gmail.com', '61b6fba8b63ec5.84562199.jpg', '4', '<p>This Course very helpful</p>', '2021-12-13 13:52:08'),
(3, 0, 'Alamin', '01797629306', 'alamin@gmail.com', '61b6fc5c4176a4.70930764.jpg', '3', '', '2021-12-13 13:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `subscriber_id` int(11) NOT NULL,
  `subscriber_email` varchar(100) NOT NULL,
  `subscribe_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`subscriber_id`, `subscriber_email`, `subscribe_time`) VALUES
(1, 'cugy@mailinator.com', '2022-02-17 15:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `trainer_id` int(11) NOT NULL,
  `trainer_name` varchar(80) NOT NULL,
  `trainer_designation` varchar(100) NOT NULL,
  `trainer_about` varchar(255) NOT NULL,
  `trainer_image` varchar(80) NOT NULL,
  `employed_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`trainer_id`, `trainer_name`, `trainer_designation`, `trainer_about`, `trainer_image`, `employed_time`) VALUES
(1, 'Jhon Smith', '2', '<p>Hello i am Jhon Smith Javascript Developer</p>', '620e842ad9b600.13104312.jpg', '2021-12-13 13:28:21'),
(2, 'Ashanur Rahman', '1', '<p>Hi, I am Ashanur Rahman</p>', '61b6f67fef3fc6.94005878.jpg', '2021-12-13 13:30:07'),
(3, 'Sara William', '3', '<p>Hi, I am Sara William React Developer</p>', '620e817e9c8292.35428985.jpg', '2022-02-17 23:10:22');

-- --------------------------------------------------------

--
-- Table structure for table `why_about`
--

CREATE TABLE `why_about` (
  `why_about_id` int(11) NOT NULL,
  `why_about_title` varchar(255) NOT NULL,
  `why_about_desc` longtext NOT NULL,
  `why_about_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `why_about`
--

INSERT INTO `why_about` (`why_about_id`, `why_about_title`, `why_about_desc`, `why_about_created`) VALUES
(1, 'Why Choose Me?', '<p>lorem ipsum dummy text here...</p>', '2021-12-13 12:36:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_category`
--
ALTER TABLE `course_category`
  ADD PRIMARY KEY (`course_category_id`);

--
-- Indexes for table `course_features`
--
ALTER TABLE `course_features`
  ADD PRIMARY KEY (`course_features_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`pricing_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`subscriber_id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`trainer_id`);

--
-- Indexes for table `why_about`
--
ALTER TABLE `why_about`
  ADD PRIMARY KEY (`why_about_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_category`
--
ALTER TABLE `course_category`
  MODIFY `course_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_features`
--
ALTER TABLE `course_features`
  MODIFY `course_features_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `pricing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `subscriber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `trainer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `why_about`
--
ALTER TABLE `why_about`
  MODIFY `why_about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
