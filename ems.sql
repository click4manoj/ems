-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 02:01 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied_leave`
--

CREATE TABLE `applied_leave` (
  `id` int(11) NOT NULL,
  `l_from` varchar(1000) NOT NULL,
  `l_to` varchar(1000) NOT NULL,
  `e_leave` int(255) NOT NULL,
  `m_leave` int(255) NOT NULL,
  `c_leave` int(11) NOT NULL,
  `apply_by` int(11) NOT NULL,
  `status` varchar(1000) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `apply_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applied_leave`
--

INSERT INTO `applied_leave` (`id`, `l_from`, `l_to`, `e_leave`, `m_leave`, `c_leave`, `apply_by`, `status`, `comment`, `apply_date`) VALUES
(2, '2020-05-01', '2020-04-05', 5, 0, 0, 22, 'approved', 'approved', '2020-04-26 10:53:09'),
(3, '2020-05-01', '2020-04-06', 2, 2, 2, 21, 'rejected', 'Reject', '2020-04-26 10:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `assign_leave`
--

CREATE TABLE `assign_leave` (
  `id` int(255) NOT NULL,
  `v_from` varchar(1000) NOT NULL,
  `v_to` varchar(1000) NOT NULL,
  `e_leave` varchar(1000) NOT NULL,
  `m_leave` varchar(1000) NOT NULL,
  `c_leave` varchar(1000) NOT NULL,
  `assign_to` int(255) NOT NULL,
  `assign_by` varchar(1000) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_leave`
--

INSERT INTO `assign_leave` (`id`, `v_from`, `v_to`, `e_leave`, `m_leave`, `c_leave`, `assign_to`, `assign_by`, `modified_date`) VALUES
(10, '2020-04-01', '2021-04-30', '6', '6', '6', 22, '15', '2020-04-12 14:47:28'),
(11, '2020-04-01', '2021-04-30', '6', '6', '6', 21, '15', '2020-04-12 14:47:28'),
(12, '2020-04-01', '2021-04-30', '6', '6', '6', 20, '15', '2020-04-12 14:47:28'),
(13, '2020-04-01', '2021-04-30', '6', '6', '6', 16, '15', '2020-04-12 14:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `t_id` int(255) NOT NULL,
  `task` varchar(10000) NOT NULL,
  `user_id` int(255) NOT NULL,
  `assigned_by` int(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`t_id`, `task`, `user_id`, `assigned_by`, `date_time`) VALUES
(1, 'test message', 22, 15, '2020-03-28 17:15:02'),
(2, 'test message', 21, 15, '2020-03-28 17:15:02'),
(3, '', 22, 15, '2020-03-28 17:15:50'),
(4, '', 21, 15, '2020-03-28 17:15:50'),
(5, 'message this 2', 22, 15, '2020-03-28 17:18:26'),
(6, 'message this 2', 20, 15, '2020-03-28 17:18:26'),
(7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 22, 15, '2020-03-28 17:19:17'),
(8, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 21, 15, '2020-03-28 17:19:17'),
(9, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 20, 15, '2020-03-28 17:19:17'),
(10, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 16, 15, '2020-03-28 17:19:17'),
(11, 'Disabled checkboxes and radios are supported. The disabled attribute will apply a lighter color to help indicate the inputâ€™s state.', 22, 15, '2020-03-28 17:24:08'),
(12, 'Disabled checkboxes and radios are supported. The disabled attribute will apply a lighter color to help indicate the inputâ€™s state.', 21, 15, '2020-03-28 17:24:08'),
(13, 'Disabled checkboxes and radios are supported. The disabled attribute will apply a lighter color to help indicate the inputâ€™s state.', 20, 15, '2020-03-28 17:24:08'),
(14, 'Disabled checkboxes and radios are supported. The disabled attribute will apply a lighter color to help indicate the inputâ€™s state.', 16, 15, '2020-03-28 17:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `task_reply`
--

CREATE TABLE `task_reply` (
  `r_id` int(255) NOT NULL,
  `reply` text NOT NULL,
  `m_id` int(255) NOT NULL,
  `reply_by` int(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_reply`
--

INSERT INTO `task_reply` (`r_id`, `reply`, `m_id`, `reply_by`, `date_time`) VALUES
(18, 'this is task is done', 5, 22, '2020-03-29 11:55:04'),
(20, 'Ok', 5, 15, '2020-03-29 12:11:11'),
(21, 'Done', 7, 22, '2020-03-29 12:21:12'),
(22, 'Great', 1, 15, '2020-04-12 13:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `department` varchar(1000) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `department`, `role`, `created_on`) VALUES
(15, 'manoj', 'manoj@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'SEO', 'admin', '2020-03-28 15:35:25'),
(16, 'vikas    ', 'vikas@gmail.com', 'c26be8aaf53b15054896983b43eb6a65', 'SEO', 'employee', '2020-03-28 15:54:30'),
(20, 'Sapna', 'sapna@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Web Development', 'employee', '2020-03-28 16:13:53'),
(21, 'Amandeep', 'amandeep@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Web Development', 'employee', '2020-03-28 16:15:55'),
(22, 'Kiran', 'kiran@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'SEO', 'employee', '2020-03-28 16:16:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applied_leave`
--
ALTER TABLE `applied_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_leave`
--
ALTER TABLE `assign_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `task_reply`
--
ALTER TABLE `task_reply`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applied_leave`
--
ALTER TABLE `applied_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assign_leave`
--
ALTER TABLE `assign_leave`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `t_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `task_reply`
--
ALTER TABLE `task_reply`
  MODIFY `r_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
