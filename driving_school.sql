-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 10:37 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `driving_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `application_package`
--

CREATE TABLE `application_package` (
  `application_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `application` text NOT NULL,
  `date` date NOT NULL,
  `app_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application_package`
--

INSERT INTO `application_package` (`application_id`, `user_id`, `package_id`, `title`, `application`, `date`, `app_status`) VALUES
(4, 11, 8, 'want VIP Package', 'i want VIP Package', '2020-11-30', 1),
(5, 13, 8, 'Want ViP Package', 'wnt vip package', '2020-11-30', 1),
(6, 12, 9, 'General Package', 'want general package', '2020-11-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `apply_job`
--

CREATE TABLE `apply_job` (
  `apply_job_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `parm_address` varchar(255) NOT NULL,
  `pres_address` varchar(255) NOT NULL,
  `nid` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `expreance` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apply_job`
--

INSERT INTO `apply_job` (`apply_job_id`, `first_name`, `last_name`, `email`, `phone`, `parm_address`, `pres_address`, `nid`, `title`, `dob`, `gender`, `expreance`, `image`, `status`) VALUES
(10008, 'liad', 'alam', 'liad@gmail.com', '01752145142', 'west razabazar', 'west razabazr', '123456789412452', 'Need Experienced Trainer', '1994-11-06', 'Male', '3 years', 'received_1544757185715636.jpeg', 1),
(10009, 'mr.', 'jhon', 'jhon@gmail.com', '123456789', 'dhaka', 'dhaka', '124524124521452', 'Need Experienced Trainer', '1992-12-12', 'Male', '5 years ', '1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `student_id`, `package_id`, `status`, `date`) VALUES
(17, 11, 8, 'Present', '2020-11-28'),
(18, 13, 8, 'Present', '2020-11-28'),
(19, 11, 8, 'Present', '2020-11-26'),
(20, 13, 8, 'Absent', '2020-11-26');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `car_id` int(11) NOT NULL,
  `car_number` varchar(255) NOT NULL,
  `car_details` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`car_id`, `car_number`, `car_details`, `image`, `status`) VALUES
(2, 'Dhaka Metro-ka/12', 'trainign carw', 'slide_1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cost_benifit`
--

CREATE TABLE `cost_benifit` (
  `id` int(11) NOT NULL,
  `month` varchar(25) NOT NULL,
  `amount` float NOT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cost_benifit`
--

INSERT INTO `cost_benifit` (`id`, `month`, `amount`, `reason`) VALUES
(3, 'September', 25000, 'trainer salary'),
(5, 'April', 5000, 'Car repair '),
(6, 'September', 25500, 'trainer salary'),
(7, 'September', 5250, 'car repair ');

-- --------------------------------------------------------

--
-- Table structure for table `enroll_student`
--

CREATE TABLE `enroll_student` (
  `enroll_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enroll_student`
--

INSERT INTO `enroll_student` (`enroll_id`, `student_id`, `package_id`) VALUES
(12, 11, 8),
(13, 13, 8),
(14, 12, 9);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `enroll_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `pament_date` date NOT NULL,
  `price` float NOT NULL,
  `pay_able` float NOT NULL,
  `payment_by` varchar(20) NOT NULL,
  `account_holder` varchar(50) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `payment_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `enroll_id`, `invoice_number`, `student_id`, `package_id`, `pament_date`, `price`, `pay_able`, `payment_by`, `account_holder`, `account_number`, `payment_status`) VALUES
(13, 12, 317150, 11, 8, '2020-11-30', 20000, 20000, 'Bank', 'Liad Alam', '123456789', 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_posts`
--

CREATE TABLE `job_posts` (
  `job_post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `post_date` date NOT NULL,
  `end_date` date NOT NULL,
  `vacancy` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_posts`
--

INSERT INTO `job_posts` (`job_post_id`, `title`, `description`, `post_date`, `end_date`, `vacancy`, `status`) VALUES
(5, 'Need Experienced Trainer', '<p><em><strong>Job Context </strong></em></p>\r\n\r\n<p><em><strong>&bull; Job Location: Dhaka&nbsp;</strong></em></p>\r\n\r\n<p><em><strong>&bull; Starting date of Job: October 2020, &bull;</strong></em></p>\r\n\r\n<p><em><strong>&bull; Reporting to: Program Coordinator </strong></em></p>\r\n\r\n<p>&bull; Mission context - GK was created in 1972 with two visions. Firstly, `the fate of the poor decides fate of the country`. Secondly, `development of the country depends on development of women`. &bull;</p>\r\n\r\n<p>Key function of the Training Consultant: The Training Consultant key functions will be developed, managing, coordinating and conducting all training programs of GK especially MI supported projects. S/he communicates with the HR Manager to identify areas that need training and suggest the best training in the areas. It is also expected to evaluate and document training activities. The Training Consultant is also responsible for ensuring through HR Manager that the employees take in the needed preparation. S/he develops training handbooks and manuals and implement various training methods such as workshops, conferences, meetings and demonstrations.</p>\r\n', '2020-11-19', '2020-11-29', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `duration` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `trainer_id`, `package_name`, `price`, `duration`, `description`, `status`) VALUES
(8, 9, 'VIP Package', 20000, '4 month', '<p>this tis VIP Package</p>\r\n', 0),
(9, 9, 'general Package', 15000, '2 month', '<p>this is genarel package</p>\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `public_message`
--

CREATE TABLE `public_message` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `sat` varchar(50) DEFAULT NULL,
  `sun` varchar(50) DEFAULT NULL,
  `mon` varchar(50) DEFAULT NULL,
  `tue` varchar(50) DEFAULT NULL,
  `wed` varchar(50) DEFAULT NULL,
  `thu` varchar(50) DEFAULT NULL,
  `fri` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `package_id`, `sat`, `sun`, `mon`, `tue`, `wed`, `thu`, `fri`) VALUES
(9, 8, '11:30', '', '', '11:30', '', '', '15:00');

-- --------------------------------------------------------

--
-- Table structure for table `track_trainer`
--

CREATE TABLE `track_trainer` (
  `tracker_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `process` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `track_trainer`
--

INSERT INTO `track_trainer` (`tracker_id`, `trainer_id`, `package_id`, `process`, `date`, `time`, `end_time`) VALUES
(11, 9, 8, 2, '2020-11-30', '15:32:00', '10:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `police` varchar(255) NOT NULL,
  `postal` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `date_of_birth`, `gender`, `police`, `postal`, `city`, `password`, `image`, `role`, `status`) VALUES
(2, 'Admin', '', 'admin@gmail.com', '', '1996-12-12', '', '', '', '', '21232f297a57a5a743894a0e4a801fc3', '', 'admin', 0),
(9, 'liad', 'alam', 'liad-10008@trainer.bd', '01752145142', '1994-11-11', 'Male', 'dhanmondi', '1212', 'dhaka', '202cb962ac59075b964b07152d234b70', 'received_1544757185715636.jpeg', 'trainer', 0),
(10, 'mr.', 'jhon', 'mr.-10009@trainer.bd', '123456789', '0000-00-00', '', '', '', '', '202cb962ac59075b964b07152d234b70', '1.jpg', 'trainer', 0),
(11, 'liad', 'alam', 'liad@gmail.com', '01941523611', '1994-11-11', 'Male', 'dhanmondi', '1212', 'dhaka', '202cb962ac59075b964b07152d234b70', 'received_1544757185715636.jpeg', 'student', 0),
(12, 'mokhlsur', 'rahman', 'mukhles@gmail.com', '01941523611', '1994-11-11', 'Male', 'rajsahi', '1001', 'rajsahi', '202cb962ac59075b964b07152d234b70', 'rahman.5a42fa13.jpg', 'student', 0),
(13, 'tarikul', 'islam', 'tarikul@gmail.com', '01755374794', '1994-11-11', 'Male', 'tejgaow', '1244', 'dhaka', '202cb962ac59075b964b07152d234b70', 'torikul.da655841.jpg', 'student', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application_package`
--
ALTER TABLE `application_package`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `package_id` (`package_id`);

--
-- Indexes for table `apply_job`
--
ALTER TABLE `apply_job`
  ADD PRIMARY KEY (`apply_job_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `package_id` (`package_id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `cost_benifit`
--
ALTER TABLE `cost_benifit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enroll_student`
--
ALTER TABLE `enroll_student`
  ADD PRIMARY KEY (`enroll_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `package_id` (`package_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `package_id` (`package_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `enroll_id` (`enroll_id`);

--
-- Indexes for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD PRIMARY KEY (`job_post_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`),
  ADD KEY `trainer_id` (`trainer_id`);

--
-- Indexes for table `public_message`
--
ALTER TABLE `public_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `trainer_id` (`trainer_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `package_id` (`package_id`);

--
-- Indexes for table `track_trainer`
--
ALTER TABLE `track_trainer`
  ADD PRIMARY KEY (`tracker_id`),
  ADD KEY `trainer_id` (`trainer_id`),
  ADD KEY `package_id` (`package_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application_package`
--
ALTER TABLE `application_package`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `apply_job`
--
ALTER TABLE `apply_job`
  MODIFY `apply_job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10010;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cost_benifit`
--
ALTER TABLE `cost_benifit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `enroll_student`
--
ALTER TABLE `enroll_student`
  MODIFY `enroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `job_posts`
--
ALTER TABLE `job_posts`
  MODIFY `job_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `public_message`
--
ALTER TABLE `public_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `track_trainer`
--
ALTER TABLE `track_trainer`
  MODIFY `tracker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application_package`
--
ALTER TABLE `application_package`
  ADD CONSTRAINT `application_package_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_package_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `package` (`package_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `package` (`package_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enroll_student`
--
ALTER TABLE `enroll_student`
  ADD CONSTRAINT `enroll_student_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enroll_student_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `package` (`package_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `package` (`package_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_ibfk_3` FOREIGN KEY (`enroll_id`) REFERENCES `enroll_student` (`enroll_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `package_ibfk_1` FOREIGN KEY (`trainer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`trainer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `package` (`package_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `track_trainer`
--
ALTER TABLE `track_trainer`
  ADD CONSTRAINT `track_trainer_ibfk_1` FOREIGN KEY (`trainer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `track_trainer_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `package` (`package_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
