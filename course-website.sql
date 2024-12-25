-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2024 at 02:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course-website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `chapter_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`chapter_id`, `course_id`, `title`, `description`, `content`, `created_at`, `updated_at`) VALUES
(1, 15, 'Introduction', NULL, NULL, '2024-12-16 08:06:59', '2024-12-16 08:06:59'),
(2, 15, 'Chapter 2', NULL, NULL, '2024-12-16 10:32:52', '2024-12-16 10:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` text NOT NULL,
  `course_desc` text NOT NULL,
  `course_author` varchar(255) NOT NULL,
  `course_img` text NOT NULL,
  `intro_video` varchar(255) NOT NULL,
  `course_duration` text NOT NULL,
  `course_price` int(11) NOT NULL,
  `course_lessons` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_desc`, `course_author`, `course_img`, `intro_video`, `course_duration`, `course_price`, `course_lessons`) VALUES
(15, 'Certificate in Building Estimate', '\r\nত্রিভুজ চতুর্থ কোণাকুণি সহ সকল প্রকারের জায়গার পরিমাপ বের করা এবং মাটিকাটা ও ভরাটের হিসাব।সেপটিক ট্যাংকের যাবতীয় খরচের হিসাব,ফাউন্ডেশন এবং পাইলের হিসাব।\r\nগ্রেড বিম ও শর্ট কলামের হিসাব।\r\nলং কলাম ও দেওয়ালের হিসাব।শাটারিং এর সকল হিসাব।\r\nলিফট ও সিড়ির হিসাব।\r\nফিনিশিং কাজের হিসাব।\r\nকালার ওয়াশের হিসাব।\r\nটিন ও টাইলসের হিসাব৷\r\nসিলিং, গ্লাস, দরজা ও জানালার হিসাব।\r\nবালি, রড, ইট ও সিমেন্ট সহ লেবার খরচের হিসাব।\r\nস্লাব বীম ও ছাদের হিসাব,\r\nসকল ম্যাটেরিয়ালসের যাবতীয় সংক্ষিপ্ত হিসাব।\r\nএক্সেলের সাহায্যে সূত্র ব্যবহার করে সকল আইটেমের হিসাব বের করা ও সফটওয়্যার প্রদান করা।\r\nপ্রশ্ন উত্তর পর্ব (সমস্যা সমাধানের ক্লাস)।\r\nসার্টিফিকেট প্রদান ও কোর্স সমাপনী ক্লাস।                          ', 'Engr. Sharif Uddin', '../Images/courseimg/course-2-2.jpg', '../coursevideo/VID-20231213-WA0000.mp4', '30 hours', 1000, '17 Lesson'),
(19, 'Professional Civil Engineering Drawing Course', '                                                                        <h3>Civil Drawing/DraftingCourse Outline:</h3>\r\n        <ul>\r\n          <li>AutoCAD install & Settings.</li>\r\n          <li>All Shortcuts Command using AutoCAD 2007 & Latest Version.</li>\r\n          <li>Plan, Section, Elevation.</li>\r\n          <li>Ground Floor to Typical Floor Plan (Foundation to Parapet).</li>\r\n          <li>Full Building Estimate using Excel Sheet & Hand Calculation in 30-40 minutes.</li>\r\n          <li>Provide Excel Sheet Like a Software for Building Materials & Cost Calculation.</li> \r\n          <li>Site Supervision System & Idea Generate.</li> \r\n          <li>Customers Handle System & Conditions Fully Professional.</li> \r\n          <li>Problem Solve Class in All Section Regularly.</li>\r\n        </ul>                                                                        ', 'Engr. Sharif Uddin', '../Images/courseimg/course-2-2.jpg', '../coursevideo/drawing.mp4', '20 hours', 1500, '45'),
(22, 'Professional Computer Training Course', '                                                <h3>Professional Computer Training Course</h3>\r\n  <ul>\r\n <li>মাইক্রোসফট ওয়ার্ডের সকল ইন্টারফেস পরিচিতি</li>\r\n <li>মাইক্রোসফট ওয়ার্ড ব্যবহার করে সিভিসহ যে কোন ডকুমেন্টস তৈরি</li> \r\n <li>মাইক্রোসফট এক্সেলের ইন্টারফেস পরিচিতি</li>\r\n <li>এক্সেলের ডাটা ম্যানেজমেন্ট, স্প্রেডশিটে গ্রাফ, চার্ট যুক্ত করা</li>\r\n <li>দোকান পাঠ, ব্যবসার হিসাব নিকাশ করা</li>\r\n <li>বিভিন্ন পরীক্ষার ফলাফল তৈরি করা</li> \r\n <li>মাইক্রোসফট অফিসের সকল শর্টকাট কি নিয়ে আলোচনা প্রাকটিক্যালি</li>\r\n <li>মাইক্রোসফট পাওয়ারপয়েন্টের এর ইন্টারফেস পরিচিতি</li>\r\n <li>মাইক্রোসফট পাওয়ার পয়েন্ট ব্যবহার করে আকর্ষণীয় প্রেজেন্টেশন তৈরি করা</li> \r\n <li>পাওয়ারপয়েন্ট ব্যবহার করে সিভি, ইনফোগ্রাফ, ভিজিটিং কার্ড ও পোস্টার তৈরি করা</li> \r\n <li>বাংলা টাইপিং ও স্পিডে লেখার নিয়ম</li>\r\n <li>ইন্টারনেট ব্রাউজিং ও ট্রাবলস্যুটিং</li>\r\n <li>Problem Solution Class & Certificate Generate</li>\r\n </ul>                                                ', 'Engr. Sharif Uddin', '../Images/courseimg/course-2-2.jpg', '../coursevideo/computer.mp4', '', 0, ''),
(23, 'Professional Electrical Drawing Course', '                                    <h3>Professional Electrical Drawing Course</h3>\r\n<ul>\r\n <li>Electrical AutoCAD install & Settings. </li>\r\n <li>Basic Concept of Electrical Drawing & Shortcut Key.</li>\r\n  <li> Detail Discussion on Electrical Drawing Design and Single Line Diagram.\r\n</li>\r\n <li>A Sample Electrical Drawing will be shown and discussed in details.</li>\r\n <li>Necessary Requirements to Prepare a Complete Electrical Drawing in the light of BNBC & NFPA code.</li>\r\n <li>A complete electrical drawing will be made and discussed step by step.</li>\r\n <li>Electrical Load Calculation in details and design necessary substation.</li>\r\n <li>Necessary Electrical Estimate and be a q will be prepared successively.</li>\r\n <li>Problem Solve at the end of Every Class.</li>\r\n </ul>                                    ', 'Engr. Sharif Uddin', '../Images/courseimg/course-2-2.jpg', '../coursevideo/drawing.mp4', '', 0, ''),
(24, 'Complete Spoken English', '                        <h3>Welcome to our dynamic Spoken English Course, where language mastery meets engaging conversation! Designed to empower learners with the confidence to articulate thoughts fluently, this course is an immersive journey into the world of spoken English. Whether you are a beginner seeking to break language barriers or an intermediate learner striving for eloquence, our program caters to diverse proficiency levels.\r\n</h3>                        ', 'Engr. Sharif Uddin', '../Images/courseimg/IMG_20240116_183010.jpg', '../coursevideo/spokenEnglish.mp4', '20 hours', 1500, ''),
(25, 'শর্ট টেকনিকে চাকরির পূর্ণাঙ্গ প্রস্তুতি ', '            শর্ট টেকনিকে পুরো কোর্সটি সাজানো হয়েছে, যা বাংলাদেশে এই প্রথম কোনো কোর্স, যা অল্প সময়ে প্রস্তুতি নিয়ে ৯০% কমন পাওয়ার নিশ্চয়তা দিচ্ছি। (মানিব্যাক গ্যারান্টি)\r\n\r\nভর্তি হতে 01719-979817 (Whatsapp)\r\n\r\nকোর্স ফিঃ ২৫০ টাকা 01775-283658 নাম্বারে (Cash Out) করে WhatsApp এ তথ্য দিন।\r\n\r\n\r\n            ', 'Engr. Sharif Uddin', '../Images/courseimg/', '../coursevideo/', '30 hours', 250, '125'),
(26, 'Cartoon Animation ', '                        কার্টুন এনিমেশন কোর্স শিখে ফ্রিল্যান্সিং করুন কিংবা আমাদের টিমে যুক্ত হয়ে মাসিক সর্বনিম্ন ১০,০০০/- থেকে ১ লাখ টাকা ইনকাম করুন। কোর্স ফি - ৩০ হাজার টাকা। \r\n১০ হাজার টাকা দিয়ে ভর্তি হবেন এবং বাকি টাকা আমাদের সাথে কাজ করে ইনকাম করে পরিশোধ করুন। ইনকাম গ্যারান্টি।                         ', 'Engr. Sharif Uddin', '../Images/courseimg/download (8).jpeg', '../coursevideo/', '২ মাস', 30000, '100');

-- --------------------------------------------------------

--
-- Table structure for table `courseorder`
--

CREATE TABLE `courseorder` (
  `order_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bkash_num` int(255) NOT NULL,
  `trxnID` varchar(255) NOT NULL,
  `course_id` int(255) NOT NULL,
  `course_price` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `payment_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courseorder`
--

INSERT INTO `courseorder` (`order_id`, `fname`, `lname`, `phone`, `email`, `bkash_num`, `trxnID`, `course_id`, `course_price`, `date`, `payment_status`) VALUES
(34, 'anik', 'dey', 2147483647, 'anik@gmail.com', 56756756, 'nygn6575', 10, '799', '2023-12-10 12:16:56', 'ok'),
(40, 'anik', 'dey', 45435345, 'anik@gmail.com', 345435345, 'fg54fg4gf3', 12, '700', '2023-12-14 13:17:01', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` int(11) NOT NULL,
  `lesson_name` text NOT NULL,
  `lesson_desc` text NOT NULL,
  `lesson_link` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` text NOT NULL,
  `chapter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `lesson_name`, `lesson_desc`, `lesson_link`, `course_id`, `course_name`, `chapter_id`) VALUES
(1, 'Introduction', '                        This is introduction                                ', '../lessonvid/f38970176.mp4', 9, '    Digital marketing', 0),
(11, 'lesson 1', 'lesson one description', '../lessonvid/f0098432.mp4', 9, ' Digital marketing', 0),
(15, 'Introduction', 'This is descripton', '../lessonvid/f0032928.mp4', 7, 'Learn Programming', 0),
(16, 'lesson 1', 'This is descripton', '../lessonvid/f0098432.mp4', 7, 'Learn Programming', 0),
(17, 'lesson 2', 'This is descripton', '../lessonvid/f38604288.mp4', 7, 'Learn Programming', 0),
(18, 'lesson 3', 'This is descripton', '../lessonvid/f38970176.mp4', 7, 'Learn Programming', 0),
(19, 'lesson 2', 'This is introduction', '../lessonvid/f38604288.mp4', 9, 'Digital marketing', 0),
(20, 'lesson 3', 'This is introduction', '../lessonvid/f0098432.mp4', 9, 'Digital marketing', 0),
(23, 'lesson 1', '                                    This is introduction                                    ', '52c7Kxp_14E', 10, '   Learn Programming', 0),
(24, 'lesson 2', 'This is descripton', 'C6YtPJxNULA', 10, 'Learn Programming', 0),
(25, 'Land Area Calculation & Earth Filling & Cutting Estimate', '', '', 15, 'Certificate in Building Estimate', 1),
(26, 'Septic Tank Complete Estimate.', '', '', 15, 'Certificate in Building Estimate', 1),
(27, 'Foundation & Pile Estimate.', '', '', 15, 'Certificate in Building Estimate', 1),
(28, 'Grade Beam & Short Column Estimate.', '', '', 15, 'Certificate in Building Estimate', 2),
(29, 'Long Column & Wall Estimate.', '', '', 15, 'Certificate in Building Estimate', 2),
(30, 'Shuttering Estimate.', '', '', 15, 'Certificate in Building Estimate', 2),
(31, 'Stair & Lift Estimate.', '', '', 15, 'Certificate in Building Estimate', 2),
(32, 'Plaster & Vernish Estimate.', '', '', 15, 'Certificate in Building Estimate', 0),
(33, 'Paint & White Wash Estimate.', '', '', 15, 'Certificate in Building Estimate', 0),
(34, 'Tin & Tiles Estimate.', '', '', 15, 'Certificate in Building Estimate', 0),
(35, 'Ceiling, Glass, Door & Window Estimate.', '', '', 15, 'Certificate in Building Estimate', 0),
(36, 'Cement, Sand, Brick, Labour Estimate.', '', '', 15, 'Certificate in Building Estimate', 0),
(37, 'Slab Beam & Roof Estimate.', '', '', 15, 'Certificate in Building Estimate', 0),
(38, 'All Materials Summary Cost Calculation.', '', '', 15, 'Certificate in Building Estimate', 0),
(39, 'Excel Sheet for Bill of Quantity (BOQ).', '', '', 15, 'Certificate in Building Estimate', 0),
(40, 'Problem Solve Class Overall.', '', '', 15, 'Certificate in Building Estimate', 0),
(41, 'Certificate Provide & Course Ending.', '', '', 15, 'Certificate in Building Estimate', 0),
(42, 'কোর্স পরিচিতি', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(43, 'খতিয়ান পরিচিতি', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(44, 'সি.এস জরিপের ইতিহাস ও সময়কাল এবং সি.এস খতিয়ান চেনার সহজ উপায়', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(45, 'এস.এ জরিপের সংক্ষিপ্ত পরিচিতি এবং এস.এ খতিয়ান চেনার সহজ পদ্ধতি', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(46, 'আর . এস জরিপের সংক্ষিপ্ত পরিচিতি এবং আর.এস খতিয়ান চেনার সহজ পদ্ধতি', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(47, 'বি.এস জরিপ পরিচিতি এবং বি.এস খতিয়ান চেনার সহজ পদ্ধতি', '                        ', '', 18, ' ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(48, 'ষোলআনা পদ্ধতি এবং ষোলআনা পদ্ধতির হিসাব দুটি সূত্র', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(49, 'সহজ পদ্ধতিতে ষোলআনা এর চিহ্ন পরিচিতি এবং ইলেক চিহ্ন', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(50, 'ষোলআনার যোগ, বিয়োগ, গুণ, ভাগ এবং ষোলআনা হিসেবে অংশানুযায়ী জমির পরিমান বের করার পদ্ধতি', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(51, 'হাজার পদ্ধতি এবং এই পদ্ধতিতে অংশানুযায়ী জমির পরিমান বের করার নিয়ম', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(52, 'শতাংশ কলাম এবং  শতাংশ কলাম বুঝার নিয়ম', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(53, 'পরিমাপ এবং পরিমাপের প্রকারভেদ', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(54, 'এক পরিমাপকে অন্য পরিমাপে রুপান্তর করার পদ্ধতি', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(55, 'কাঠা বিঘার হিসাব', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(56, 'জ্যামিতি ধারণা এবং ত্রিভূজ আকৃতির জমি পরিমাপ করার পদ্ধতি', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(57, 'চতুর্ভূজ আকৃতির জমি পরিমাপ করার নিয়ম', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(58, 'অনিয়মিত বা সাধারন চতুর্ভূজ এবং বহুভুজ ', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(59, 'বৃত্ত আকৃতির জমি পরিমাপ', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(60, 'পূর্ণবৃত্ত, অর্ধবৃত্ত এবং কোয়ার্টার আকৃতির জমি পরিমাপের নিয়ম', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(61, 'বৃত্তাভাষ এবং বৃত্তাভাষ ক্ষেত্রের ক্ষেত্রফল কিভাবে বের করতে হবে ।', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(62, 'জমি পরিমাপ করতে কি কি যন্ত্রপাতি লাগে', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(63, 'নকশা পরিচিতি এবং নকশা কিভাবে চিনবেন ?', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(64, 'স্কেল দিয়ে নকশা পরিমাপের সঠিক নিয়ম', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(65, '330 স্কেল প্রাকটিক্যল ক্লাস', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(66, 'গুনিয়া স্কেল, গান্টার স্কেল', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(67, 'ইট, কাঠ , মাটি ও বালি হিসাব', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(68, 'খারিজ বা নামজারি না করলে কি কি ক্ষতি হয় ।', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(69, 'নামজারি খতিয়ান চেনার উপায়', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(70, 'দলিল এবং কাগজপত্র যাচাই পদ্ধতি', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(71, 'জমি কেনার সময় কোন কোন কাগজগুলো নিতে হবে', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(72, 'জমি কেনার সময় কি কি যাচাই করবেন', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(73, 'জমির কাগজপত্রের ধারাবাহিকতা চেক করার পদ্ধতি', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(74, 'জমির কাগজপত্র কোন কোন অফিসে যাচাই করবেন ।', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(75, 'দলিল রেজিষ্ট্রি করতে যা যা লাগে', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(76, 'দলিল পড়ার নিয়ম এবং দলিলের খসরা যাচাই', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(77, 'আসল দলিল আর নকল দলিল চেনার পদ্ধতি', '', '', 18, 'ভূমি জরিপ প্রশিক্ষণ কোর্স ', 0),
(78, 'মাইক্রোসফট ওয়ার্ডের সকল ইন্টারফেস পরিচিতি', '', '', 22, 'Professional Computer Training Course', 0),
(79, 'মাইক্রোসফট ওয়ার্ড ব্যবহার করে সিভিসহ যে কোন ডকুমেন্টস তৈরি ', '', '', 22, 'Professional Computer Training Course', 0),
(80, 'মাইক্রোসফট এক্সেলের ইন্টারফেস পরিচিতি', '', '', 22, 'Professional Computer Training Course', 0),
(81, 'এক্সেলের ডাটা ম্যানেজমেন্ট, স্প্রেডশিটে গ্রাফ, চার্ট যুক্ত করা', '', '', 22, 'Professional Computer Training Course', 0),
(82, 'দোকান পাঠ, ব্যবসার হিসাব নিকাশ করা', '', '', 22, 'Professional Computer Training Course', 0),
(83, 'বিভিন্ন পরীক্ষার ফলাফল তৈরি করা', '', '', 22, 'Professional Computer Training Course', 0),
(84, 'মাইক্রোসফট অফিসের সকল শর্টকাট কি নিয়ে আলোচনা প্রাকটিক্যালি', '', '', 22, 'Professional Computer Training Course', 0),
(85, 'মাইক্রোসফট পাওয়ারপয়েন্টের এর ইন্টারফেস পরিচিতি', '', '', 22, 'Professional Computer Training Course', 0),
(86, 'মাইক্রোসফট পাওয়ার পয়েন্ট ব্যবহার করে আকর্ষণীয় প্রেজেন্টেশন তৈরি করা', '', '', 22, 'Professional Computer Training Course', 0),
(87, 'পাওয়ারপয়েন্ট ব্যবহার করে সিভি, ইনফোগ্রাফ, ভিজিটিং কার্ড ও পোস্টার তৈরি করা ', '', '', 22, 'Professional Computer Training Course', 0),
(88, 'বাংলা টাইপিং ও স্পিডে লেখার নিয়ম', '', '', 22, 'Professional Computer Training Course', 0),
(89, 'ইন্টারনেট ব্রাউজিং ও ট্রাবলস্যুটিং', '', '', 22, 'Professional Computer Training Course', 0),
(90, 'Problem Solution Class & Certificate Generate', '', '', 22, 'Professional Computer Training Course', 0),
(91, 'AutoCAD install & Settings.', '', '', 19, 'Professional Civil Engineering Drawing Course', 0),
(92, 'All Shortcuts Command using AutoCAD 2007 & Latest Version.', '', '', 19, 'Professional Civil Engineering Drawing Course', 0),
(93, 'Plan, Section, Elevation.', '', '', 19, 'Professional Civil Engineering Drawing Course', 0),
(94, 'Ground Floor to Typical Floor Plan (Foundation to Parapet).', '', '', 19, 'Professional Civil Engineering Drawing Course', 0),
(95, 'Full Building Estimate using Excel Sheet & Hand Calculation in 30-40 minutes.', '', '', 19, 'Professional Civil Engineering Drawing Course', 0),
(96, 'Provide Excel Sheet Like a Software for Building Materials & Cost Calculation.', '', '', 19, 'Professional Civil Engineering Drawing Course', 0),
(97, 'Site Supervision System & Idea Generate.', '', '', 19, 'Professional Civil Engineering Drawing Course', 0),
(98, 'Customers Handle System & Conditions Fully Professional.', '', '', 19, 'Professional Civil Engineering Drawing Course', 0),
(99, 'Problem Solve Class in All Section Regularly.', '', '', 19, 'Professional Civil Engineering Drawing Course', 0),
(100, 'Electrical AutoCAD install & Settings.', '', '', 23, 'Professional Electrical Drawing Course', 0),
(101, 'Basic Concept of Electrical Drawing & Shortcut Key.', '', '', 23, 'Professional Electrical Drawing Course', 0),
(102, 'Detail Discussion on Electrical Drawing Design and Single Line Diagram.', '', '', 23, 'Professional Electrical Drawing Course', 0),
(103, 'A Sample Electrical Drawing will be shown and discussed in details.', '', '', 23, 'Professional Electrical Drawing Course', 0),
(104, 'Necessary Requirements to Prepare a Complete Electrical Drawing in the light of BNBC & NFPA code.', '', '', 23, 'Professional Electrical Drawing Course', 0),
(105, 'A complete electrical drawing will be made and discussed step by step.', '', '', 23, 'Professional Electrical Drawing Course', 0),
(106, 'Electrical Load Calculation in details and design necessary substation.', '', '', 23, 'Professional Electrical Drawing Course', 0),
(107, 'Necessary Electrical Estimate and be a q will be prepared successively.', '', '', 23, 'Professional Electrical Drawing Course', 0),
(108, 'Problem Solve at the end of Every Class.', '', '', 23, 'Professional Electrical Drawing Course', 0),
(109, 'Pronunciation 1', '', '', 24, 'Complete Spoken English', 0),
(110, 'Pronunciation 2', '', '', 24, 'Complete Spoken English', 0),
(111, 'Pronunciation 3', '', '', 24, 'Complete Spoken English', 0),
(112, 'Pronunciation 4', '', '', 24, 'Complete Spoken English', 0),
(113, 'মুখের জড়তা দূর করার কৌশল', '', '', 24, 'Complete Spoken English', 0),
(114, 'Speaking Structure 1-10', '', '', 24, 'Complete Spoken English', 0),
(115, 'Speaking Structure 11-15', '', '', 24, 'Complete Spoken English', 0),
(116, 'Speaking Structure 16-20', '', '', 24, 'Complete Spoken English', 0),
(117, 'Speaking Structure 21-27', '', '', 24, 'Complete Spoken English', 0),
(118, 'Speaking Structure 28-35', '', '', 24, 'Complete Spoken English', 0),
(119, 'Speaking Structure 36-42', '', '', 24, 'Complete Spoken English', 0),
(120, 'Speaking Structure 43-50', '', '', 24, 'Complete Spoken English', 0),
(121, 'Tense Practice for Speaking', '', '', 24, 'Complete Spoken English', 0),
(122, 'বড় বড় বাক্য গঠন করা ', '', '', 24, 'Complete Spoken English', 0),
(123, 'ছোট থেকে বড় প্রশ্ন তৈরি করা', '', '', 24, 'Complete Spoken English', 0),
(124, 'ভার্চুয়াল পদ্ধতিতে Speaking Practice Materials Use', '', '', 24, 'Complete Spoken English', 0),
(125, 'Speaking Partner নির্বাচন করা', '', '', 24, 'Complete Spoken English', 0),
(126, 'কীভাবে ইংরেজিতে নিজেকে Introduce করবেন', '', '', 24, 'Complete Spoken English', 0),
(127, 'কীভাবে ইংরেজিতে একজন নতুন ব্যক্তির সাথে পরিচিত হবেন', '', '', 24, 'Complete Spoken English', 0),
(128, 'ইংরেজিতে প্রশ্ন করা শিখুন', '', '', 24, 'Complete Spoken English', 0),
(129, 'Parts of Human Body in English', '', '', 24, 'Complete Spoken English', 0),
(130, 'How to Tell the Time in', '', '', 24, 'Complete Spoken English', 0),
(131, 'কীভাবে ইংরেজিতে নতুন বন্ধু বানাবেন', '', '', 24, 'Complete Spoken English', 0),
(132, '২ বন্ধু মিলে কীভাবে ইংরেজিতে কথা বলবেন', '', '', 24, 'Complete Spoken English', 0),
(133, ' ইংরেজিতে কীভাবে গল্প বলবেন', '', '', 24, 'Complete Spoken English', 0),
(134, 'ইংরেজিতে নিজের শখ নিয়ে কথা বলুন', '', '', 24, 'Complete Spoken English', 0),
(135, 'আপনার পছন্দের মুডি নিয়ে ইংরেজিতে কথা বলুন', '', '', 24, 'Complete Spoken English', 0),
(136, ' আপনার পছন্দের খেলা নিয়ে ইংরেজিতে কথা বলুন', '', '', 24, 'Complete Spoken English', 0),
(137, 'কীভাবে ইংরেজিতে ফোনে কথা বলবেন, Class 30 : ব্যাংকে ইংরেজি কথোপকথন', '', '', 24, 'Complete Spoken English', 0),
(138, 'ইংরেজিতে কীভাবে অভিযোগ করবেন', '', '', 24, 'Complete Spoken English', 0),
(139, 'হোটেলে ইংরেজি কথোপকথন', '', '', 24, 'Complete Spoken English', 0),
(140, 'ইংরেজিতে অ্যাপয়েন্টমেন্ট বুক করুন', '', '', 24, 'Complete Spoken English', 0),
(141, 'হাসপাতালে ইংরেজিতে কীভাবে কথা বলবেন', '', '', 24, 'Complete Spoken English', 0),
(142, ' ডাক্তারের সাথে ইংরেজি কথোপকথন', '', '', 24, 'Complete Spoken English', 0),
(143, 'রেঁস্তোরাতে ইংরেজি কথোপকথন', '', '', 24, 'Complete Spoken English', 0),
(144, 'ইংরেজিতে প্লেন / বাস / ট্রেনের টিকিট কার্টুন', '', '', 24, 'Complete Spoken English', 0),
(145, 'কীভাবে ইংরেজিতে Visa Interview দিবেন', '', '', 24, 'Complete Spoken English', 0),
(146, 'বিমানবন্দরে ইংরেজি কথোপকথন', '', '', 24, 'Complete Spoken English', 0),
(147, 'ইংরেজিতে নিজের ছুটি নিয়ে বর্ণনা দিন', '', '', 24, 'Complete Spoken English', 0),
(148, '1. বাংলা শর্টকাট টেকনিক ', '', '', 25, 'শর্ট টেকনিকে চাকরির পূর্ণাঙ্গ প্রস্তুতি ', 0),
(149, '2. ইংরেজি শর্টকাট টেকনিক ', '', '', 25, 'শর্ট টেকনিকে চাকরির পূর্ণাঙ্গ প্রস্তুতি ', 0),
(150, '3. গণিত শর্টকাট টেকনিক ', '', '', 25, 'শর্ট টেকনিকে চাকরির পূর্ণাঙ্গ প্রস্তুতি ', 0),
(151, '4. সাধারণ জ্ঞান শর্টকাট টেকনিক ', '', '', 25, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `stu_id` int(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `stu_img` text NOT NULL,
  `dateTime` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`stu_id`, `fname`, `lname`, `username`, `email`, `password`, `stu_img`, `dateTime`) VALUES
(11, 'anik', 'dey', 'anikdey13', 'anik@gmail.com', '12', '../Images/student/pic-3.png', '2023-11-28'),
(21, 'Sharif', 'Uddin', 'mantrigaon', 'mantrigow@gmail.com', 'Sh@510529', '', '2024-01-16'),
(22, 'Dwip', 'Sarker', 'dwipsarker', 'mail.dwipsarker@gmail.com', 'mail.dwipsarker@gmai', '', '2024-01-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`chapter_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `courseorder`
--
ALTER TABLE `courseorder`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`stu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `courseorder`
--
ALTER TABLE `courseorder`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `stu_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chapter`
--
ALTER TABLE `chapter`
  ADD CONSTRAINT `chapter_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
