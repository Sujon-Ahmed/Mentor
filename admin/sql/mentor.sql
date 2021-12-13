-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 11:18 AM
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
(1, 'This is About Section', '<p><span style=\"\" google=\"\" sans=\"\" text\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#424242\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</font></span><br></p>', '61b6ddf6b39021.54208608.png', '2021-12-13 11:45:26');

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
(1, 'Sujon Ahmed', 'admin@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', '', '', '', '2021-12-13 11:17:10');

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
(2, 'Welcome To Mentor', '61b6dbf0298764.16892374.png', '<p>This is Description for Mentor Project</p>', '2021-12-13 11:36:48');

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
(4, 'bx bxl-html5', 'HTML5', 'html5', '2021-12-13 12:56:52');

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
(1, 'Alamin Islam', '4', '<p>Hello i am Alamin islam</p>', '61b6f61561a295.91824112.jpg', '2021-12-13 13:28:21'),
(2, 'Ashanur Rahman', '1', '<p>Hi, I am Ashanur Rahman</p>', '61b6f67fef3fc6.94005878.jpg', '2021-12-13 13:30:07');

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
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_category`
--
ALTER TABLE `course_category`
  MODIFY `course_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_features`
--
ALTER TABLE `course_features`
  MODIFY `course_features_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `trainer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `why_about`
--
ALTER TABLE `why_about`
  MODIFY `why_about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
