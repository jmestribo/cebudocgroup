-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2020 at 11:00 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket_db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attachment`
--

CREATE TABLE `tbl_attachment` (
  `attachid` int(11) NOT NULL,
  `attach_ticket_id` varchar(225) NOT NULL,
  `file_path` varchar(225) NOT NULL,
  `file_name` varchar(225) NOT NULL,
  `file_origname` varchar(225) NOT NULL,
  `user_code` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_escalate`
--

CREATE TABLE `tbl_escalate` (
  `escid` int(11) NOT NULL,
  `esc_ticketid` varchar(225) NOT NULL,
  `esc_usercode` varchar(225) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_escalate`
--

INSERT INTO `tbl_escalate` (`escid`, `esc_ticketid`, `esc_usercode`, `reason`) VALUES
(1, '3', '20200430124643', '3'),
(2, '3', '20200430014317', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group`
--

CREATE TABLE `tbl_group` (
  `id` int(11) NOT NULL,
  `group` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_priority`
--

CREATE TABLE `tbl_priority` (
  `priority_id` int(11) NOT NULL,
  `priority` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_priority`
--

INSERT INTO `tbl_priority` (`priority_id`, `priority`) VALUES
(1, 'Highest'),
(2, 'High'),
(3, 'Medium'),
(4, 'Lowest'),
(5, 'Low'),
(6, 'Emergency');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reopen_ticket`
--

CREATE TABLE `tbl_reopen_ticket` (
  `id` int(11) NOT NULL,
  `ticket_id` varchar(225) NOT NULL,
  `ticket_stat` varchar(22) NOT NULL,
  `user_code` varchar(225) NOT NULL,
  `date_reopen` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reopen_ticket`
--

INSERT INTO `tbl_reopen_ticket` (`id`, `ticket_id`, `ticket_stat`, `user_code`, `date_reopen`) VALUES
(1, '1', '1', '20200430124643', '2020-05-08 05:11:33 pm'),
(2, '3', '1', '20200430124643', '2020-05-08 05:16:02 pm'),
(3, '1', '1', '20200430124643', '2020-05-08 05:16:07 pm'),
(4, '3', '1', '20200430124643', '2020-05-08 05:17:48 pm'),
(5, '5', '1', '20200430124643', '2020-05-08 06:28:51 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `role` varchar(225) NOT NULL,
  `level` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `role`, `level`) VALUES
(1, 'Associate Technical Support', 'ATS'),
(2, 'Junior Technical Support', 'JTS'),
(3, 'Senior Technical Support', 'STS'),
(4, 'System Administrator Support', 'SAS'),
(5, 'Corporate Manager', 'CM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sites`
--

CREATE TABLE `tbl_sites` (
  `siteid` int(11) NOT NULL,
  `site_code` varchar(225) NOT NULL,
  `site_name` varchar(225) NOT NULL,
  `acess` varchar(22) NOT NULL,
  `site_key` varchar(225) NOT NULL,
  `user_lead` varchar(225) NOT NULL,
  `status` varchar(25) NOT NULL,
  `date_created` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sites`
--

INSERT INTO `tbl_sites` (`siteid`, `site_code`, `site_name`, `acess`, `site_key`, `user_lead`, `status`, `date_created`) VALUES
(2, '20200423063943', 'Cebu Doctors University Hospital', 'Public', 'CDUH', '13', 'Active', '2020-04-23 12:44:59 pm'),
(5, '20200423065122', 'Mactan Doctors Hospital', 'Private', 'MDH', '13', 'Active', '2020-04-23 12:45:02 pm'),
(6, '20200423065701', 'North General Hospital', 'Private', 'NGH', '13', 'Active', '2020-04-23 12:45:04 pm'),
(7, '20200423070000', 'San Carlos Doctors Hospital', 'Private', 'SDH', '13', 'Active', '2020-04-23 12:45:07 pm'),
(8, '20200423070141', 'South General Hospital', 'Public', 'SGH', '13', 'Active', '2020-04-23 12:45:10 pm'),
(9, '20200423070218', 'Ormoc Doctors Hospital', 'Public', 'ODH', '15', 'Active', '2020-05-04 01:49:01 pm'),
(10, '20200423070247', 'Danao Doctors Hospital', 'Public', 'DDH', '13', 'Active', '2020-04-30 10:35:44 am'),
(11, '20200423070328', 'Bohol Doctors Hospital', 'Private', 'BDH', '13', 'Active', '2020-04-23 12:45:20 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `stateid` int(11) NOT NULL,
  `state` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`stateid`, `state`) VALUES
(1, 'Open'),
(2, 'Close');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_taskmanager`
--

CREATE TABLE `tbl_taskmanager` (
  `id` int(11) NOT NULL,
  `taskcode` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `publisher` varchar(225) NOT NULL,
  `taskdescription` text NOT NULL,
  `type` varchar(225) NOT NULL,
  `selecteddate` varchar(225) NOT NULL,
  `date_created` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_taskmanager`
--

INSERT INTO `tbl_taskmanager` (`id`, `taskcode`, `name`, `publisher`, `taskdescription`, `type`, `selecteddate`, `date_created`) VALUES
(2, '20200506125718', 'Backup Database', 'System', '567', 'Monthly', '2020-05-20', '2020-05-08 01:03:52 am'),
(3, '20200506125902', 'Board Meating', 'System', '567', 'Monthly', '2020-05-20', '2020-05-08 01:03:55 am'),
(4, '20200506014404', 'Collecting Board Report', 'System', '345', 'Weekly', 'Monday', '2020-05-08 01:03:45 am'),
(5, '20200506014459', 'Printing Document', 'System', '567', 'Daily', 'Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday', '2020-05-08 01:03:48 am'),
(6, '20200506020244', 'Checking Server', 'System', '123123', 'Daily', 'Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday', '2020-05-08 01:03:31 am'),
(7, '20200507114939', '2', 'System', '234234234', 'Daily', 'Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday', '2020-05-08 01:03:41 am'),
(8, '20200508035817', '12', 'System', '123', 'Monthly', '2020-05-09', '2020-05-08 04:04:51 pm'),
(9, '20200508045155', '4', 'System', '4', 'Monthly', '2020-05-21', '2020-05-08 04:51:55 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ticket`
--

CREATE TABLE `tbl_ticket` (
  `ticketid` int(11) NOT NULL,
  `ticket_code` varchar(225) NOT NULL,
  `site_code` varchar(225) NOT NULL,
  `ticket_type` varchar(225) NOT NULL,
  `summary` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `escalate_id` varchar(225) NOT NULL,
  `assign_by` varchar(225) NOT NULL,
  `report_by` varchar(225) NOT NULL,
  `priority` varchar(225) NOT NULL,
  `ticket_status` varchar(225) NOT NULL,
  `state` varchar(3) NOT NULL,
  `estimated_time` varchar(225) NOT NULL,
  `time_spent` varchar(225) NOT NULL,
  `time_description` varchar(225) NOT NULL,
  `workdate` varchar(225) NOT NULL,
  `subtasks` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `ticket_subtype` varchar(225) NOT NULL,
  `date_created` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ticket`
--

INSERT INTO `tbl_ticket` (`ticketid`, `ticket_code`, `site_code`, `ticket_type`, `summary`, `description`, `escalate_id`, `assign_by`, `report_by`, `priority`, `ticket_status`, `state`, `estimated_time`, `time_spent`, `time_description`, `workdate`, `subtasks`, `status`, `ticket_subtype`, `date_created`) VALUES
(1, '20200508035817', '20200423063943', '1', 'Priner', '123', '', '20200430124643', '20200506030422', '1', '2', '1', '1', '1', '', '2020-05-08', '2', '', 'Main', '2020-05-08 05:16:21 pm'),
(2, '20200507114939', '20200423063943', '1', '2', '234234234', '', '20200430124643', '20200506030422', '1', '2', '1', '', '', '', '2020-05-08', '2', '', 'Main', '2020-05-08 05:01:06 pm'),
(3, '20200506020244', '20200423063943', '1', 'Checking Server', '123123', '', '20200430124643', '20200506030422', '1', '3', '1', '2', '2', '', '2020-05-08', '1', '', 'Main', '2020-05-08 05:20:39 pm'),
(4, '20200506014459', '20200423063943', '1', 'Printing Document', '567', '', '20200430124643', '20200506030422', '1', '1', '1', '', '', '', '2020-05-08', '2', '', 'Main', '2020-05-08 05:09:07 pm'),
(5, '20200508062128', '20200423063943', '1', '123', '123', '', '20200430124643', '20200430124643', '2', '2', '1', '1', '1', '', '2020-05-08', '2', '', 'Main', '2020-05-08 06:29:02 pm'),
(6, '20200507114939', '20200423063943', '1', '2', '234234234', '', '0', '20200506030422', '1', '1', '1', '', '', '', '2020-05-09', '2', '', 'Main', '2020-05-09 12:29:14 am'),
(7, '20200506020244', '20200423063943', '1', 'Checking Server', '123123', '', '0', '20200506030422', '1', '1', '1', '', '', '', '2020-05-09', '2', '', 'Main', '2020-05-09 12:29:14 am'),
(8, '20200506014459', '20200423063943', '1', 'Printing Document', '567', '', '0', '20200506030422', '1', '1', '1', '', '', '', '2020-05-09', '2', '', 'Main', '2020-05-09 12:29:14 am');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ticketlogs`
--

CREATE TABLE `tbl_ticketlogs` (
  `log_id` int(11) NOT NULL,
  `ticket_id` varchar(225) NOT NULL,
  `user_code` varchar(225) NOT NULL,
  `action` varchar(225) NOT NULL,
  `date_log` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ticketlogs`
--

INSERT INTO `tbl_ticketlogs` (`log_id`, `ticket_id`, `user_code`, `action`, `date_log`) VALUES
(1, '1', '20200430124643', '2', '2020-05-08 05:25:00 pm'),
(2, '3', '20200430124643', '2', '2020-05-08 05:26:01 pm'),
(3, '3', '20200430014317', '2', '2020-05-08 05:49:02 pm'),
(4, '1', '20200430124643', '5', '2020-05-08 05:33:11 pm'),
(5, '1', '20200430124643', '2', '2020-05-08 05:49:15 pm'),
(6, '3', '20200430124643', '2', '2020-05-08 05:58:15 pm'),
(7, '3', '20200430124643', '5', '2020-05-08 05:02:16 pm'),
(8, '1', '20200430124643', '5', '2020-05-08 05:07:16 pm'),
(9, '3', '20200430124643', '2', '2020-05-08 05:40:17 pm'),
(10, '3', '20200430124643', '5', '2020-05-08 05:48:17 pm'),
(11, '3', '20200430124643', '2', '2020-05-08 05:39:20 pm'),
(12, '5', '20200430124643', '3', '2020-05-08 06:39:28 pm'),
(13, '5', '20200430124643', '3', '2020-05-08 06:47:28 pm'),
(14, '5', '20200430124643', '5', '2020-05-08 06:51:28 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tickettype`
--

CREATE TABLE `tbl_tickettype` (
  `type_id` int(11) NOT NULL,
  `ticket_type` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tickettype`
--

INSERT INTO `tbl_tickettype` (`type_id`, `ticket_type`) VALUES
(1, 'Software'),
(2, 'Hardware'),
(5, 'Maintenance');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ticket_subtask`
--

CREATE TABLE `tbl_ticket_subtask` (
  `sub_id` int(11) NOT NULL,
  `sub_ticket_id` varchar(225) NOT NULL,
  `sub_ticket_code` varchar(225) NOT NULL,
  `subtask` varchar(225) NOT NULL,
  `sub_status` varchar(22) NOT NULL,
  `user_code` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `typeid` int(11) NOT NULL,
  `type` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`typeid`, `type`) VALUES
(1, 'To-do'),
(2, 'In-progress'),
(3, 'Done'),
(4, 'Backlog');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userid` int(11) NOT NULL,
  `user_code` varchar(225) NOT NULL,
  `site_code` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `firstname` varchar(225) NOT NULL,
  `lastname` varchar(225) NOT NULL,
  `middlename` varchar(222) NOT NULL,
  `ipaddress` varchar(225) NOT NULL,
  `role_id` varchar(222) NOT NULL,
  `department` varchar(222) NOT NULL,
  `position` varchar(222) NOT NULL,
  `local` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `password_text` varchar(224) NOT NULL,
  `status` varchar(222) NOT NULL,
  `user_type` varchar(225) NOT NULL,
  `group_id` varchar(22) NOT NULL,
  `datecreated` varchar(222) NOT NULL,
  `user_profile` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userid`, `user_code`, `site_code`, `name`, `firstname`, `lastname`, `middlename`, `ipaddress`, `role_id`, `department`, `position`, `local`, `email`, `password`, `password_text`, `status`, `user_type`, `group_id`, `datecreated`, `user_profile`) VALUES
(13, '20200430124643', '20200423063943', 'Admin M. Admin', 'Admin', 'Admin', 'M.', '10.4.15.20', '5', 'EDP', '', '123', 'admin@gmail.com', '$2y$10$FQfMDzsIdcTamRxUVLvF2e8/u6vD.iol2ovlW6jG/Z/SVpLf/Zm7m', '123', 'Active', 'Admin', 'null', '2020-04-30 12:46:43 pm', ''),
(15, '20200430014317', '20200423063943', 'Jucel M. Estribo', 'Jucel', 'Estribo', 'M.', '10.4.15.29', '1', 'EDP', '', '123', 'Jucel.cdh@gmail.com', '$2y$10$KaYAAACT.rnGsmtXU3yjhe7PHgl5nDKkpRYQjgOz.Q0I9VC4NmqWa', '123', 'Active', 'User', '', '2020-04-30 01:43:17 pm', ''),
(16, '20200430034839', '20200423063943', 'Edp test1 Test', 'Edp', 'Test', 'test1', '1.1.1.1', '2', 'EDP', '', '173', 'edp.cdh@gmai.com', '$2y$10$MK6cq8/5karz7PKJqdxVbueskmetQRFYWDlpVF5l6JhDniBdLh1KG', '123', 'Active', 'User', '', '2020-04-30 03:48:39 pm', ''),
(17, '20200502070118', '20200423063943', 'Jayson M Estaño', 'Jayson', 'Estaño', 'M', '10.3.1.4', '3', 'EDP', '', 'a', 'jayson.cdh@gmail.com', '$2y$10$i8JktktOaeFxbhEnj6cK1u4BLKx6O/84JaYKPA9Jj9f1iNvSImyVa', '123', 'Active', 'User', '', '2020-05-02 07:01:18 am', ''),
(18, '20200504064730', '20200423063943', 'Jake M. Apare', 'Jake', 'Apare', 'M.', '10.4.5.1', '4', 'EDP', '', '1', 'jake.cdh@gmail.com', '$2y$10$5I3WQBLc.zuxBRzOQRvQ1.TL2yrKLOlPcCXsRJiar0LNRb0BWdFWG', '123', 'Active', 'User', '', '2020-05-04 06:47:30 am', ''),
(19, '20200504015151', '20200423063943', 'Jorge M. Ariola', 'Jorge', 'Ariola', 'M.', '10.4.3.9', '1', 'EDP', '', '123', 'jorge.cdh@gmail.com', '$2y$10$ptKDsNi13lYNjSyXniny1.YZVcZSohZJ8yOp7lEow93QP2Se360Tu', '123', 'Active', 'User', '', '2020-05-04 01:51:51 pm', ''),
(20, '20200504024432', '', 'edp', '', '', '', '1.3.2.3', '', '', '', '', 'edp@gmail.com', '$2y$10$OLcCHwnIitgE92L4ZiZqHeFN/GMhtvP2KI4Wlg8UGE/7oA5srFl/a', '', 'Active', 'User', '', '2020-05-04 02:44:32 pm', ''),
(21, '20200506030422', '20200423063943', 'System  Aministrator', 'System', 'Aministrator', '', '10.3.1.4', '5', 'EDP', '', '123', 'system@gmail.com', '$2y$10$i9KDPf23oSePZ3y/I7O4Vu1nsPsDWZWSIGt2N23JxzSRcAhiq.CUu', '123', 'Active', 'Admin', '', '2020-05-06 03:04:22 pm', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_workdescription`
--

CREATE TABLE `tbl_workdescription` (
  `work_id` int(11) NOT NULL,
  `ticket_id` varchar(225) NOT NULL,
  `text` text NOT NULL,
  `date_send` varchar(225) NOT NULL,
  `user_code` varchar(225) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_workdescription`
--

INSERT INTO `tbl_workdescription` (`work_id`, `ticket_id`, `text`, `date_send`, `user_code`, `status`) VALUES
(2, '5', '123', '2020-05-08 06:28:38 pm', '20200430124643', '1'),
(3, '5', '234', '2020-05-08 06:44:08 pm', '20200430124643', '1'),
(4, '5', '234', '2020-05-08 06:44:10 pm', '20200430124643', '1'),
(5, '5', '234', '2020-05-08 06:44:15 pm', '20200430124643', '1'),
(6, '1', '456', '2020-05-08 06:57:08 pm', '20200430124643', '1'),
(7, '1', '456', '2020-05-08 06:57:12 pm', '20200430124643', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_attachment`
--
ALTER TABLE `tbl_attachment`
  ADD PRIMARY KEY (`attachid`);

--
-- Indexes for table `tbl_escalate`
--
ALTER TABLE `tbl_escalate`
  ADD PRIMARY KEY (`escid`);

--
-- Indexes for table `tbl_group`
--
ALTER TABLE `tbl_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_priority`
--
ALTER TABLE `tbl_priority`
  ADD PRIMARY KEY (`priority_id`);

--
-- Indexes for table `tbl_reopen_ticket`
--
ALTER TABLE `tbl_reopen_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sites`
--
ALTER TABLE `tbl_sites`
  ADD PRIMARY KEY (`siteid`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`stateid`);

--
-- Indexes for table `tbl_taskmanager`
--
ALTER TABLE `tbl_taskmanager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ticket`
--
ALTER TABLE `tbl_ticket`
  ADD PRIMARY KEY (`ticketid`);

--
-- Indexes for table `tbl_ticketlogs`
--
ALTER TABLE `tbl_ticketlogs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tbl_tickettype`
--
ALTER TABLE `tbl_tickettype`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_ticket_subtask`
--
ALTER TABLE `tbl_ticket_subtask`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`typeid`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `tbl_workdescription`
--
ALTER TABLE `tbl_workdescription`
  ADD PRIMARY KEY (`work_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_attachment`
--
ALTER TABLE `tbl_attachment`
  MODIFY `attachid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_escalate`
--
ALTER TABLE `tbl_escalate`
  MODIFY `escid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_group`
--
ALTER TABLE `tbl_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_priority`
--
ALTER TABLE `tbl_priority`
  MODIFY `priority_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_reopen_ticket`
--
ALTER TABLE `tbl_reopen_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_sites`
--
ALTER TABLE `tbl_sites`
  MODIFY `siteid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `stateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_taskmanager`
--
ALTER TABLE `tbl_taskmanager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_ticket`
--
ALTER TABLE `tbl_ticket`
  MODIFY `ticketid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_ticketlogs`
--
ALTER TABLE `tbl_ticketlogs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_tickettype`
--
ALTER TABLE `tbl_tickettype`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_ticket_subtask`
--
ALTER TABLE `tbl_ticket_subtask`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `typeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_workdescription`
--
ALTER TABLE `tbl_workdescription`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
