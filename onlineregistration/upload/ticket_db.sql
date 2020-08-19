-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 02:13 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket_db`
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
  `reason` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(5, 'Lowest'),
(6, 'Emergency');

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
(2, '20200423063943', 'Cebu Doctors University Hospital', 'Public', 'CDUH', '1', 'Active', '2020-04-23 12:44:59 pm'),
(5, '20200423065122', 'Mactan Doctors Hospital', 'Private', 'MDH', '2', 'Active', '2020-04-23 12:45:02 pm'),
(6, '20200423065701', 'North General Hospital', 'Private', 'NGH', '1', 'Active', '2020-04-23 12:45:04 pm'),
(7, '20200423070000', 'San Carlos Doctors Hospital', 'Private', 'SDH', '2', 'Active', '2020-04-23 12:45:07 pm'),
(8, '20200423070141', 'South General Hospital', 'Public', 'SGH', '1', 'Active', '2020-04-23 12:45:10 pm'),
(9, '20200423070218', 'Ormoc Doctors Hospital', 'Public', 'ODH', '2', 'Active', '2020-04-23 12:45:13 pm'),
(10, '20200423070247', 'Danao Doctors Hospital', 'Public', 'DDH', '2', 'Active', '2020-04-23 12:45:16 pm'),
(11, '20200423070328', 'Bohol Doctors Hospital', 'Private', 'BDH', '1', 'Active', '2020-04-23 12:45:20 pm');

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
  `subtask` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `ticket_subtype` varchar(225) NOT NULL,
  `date_created` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ticket`
--

INSERT INTO `tbl_ticket` (`ticketid`, `ticket_code`, `site_code`, `ticket_type`, `summary`, `description`, `escalate_id`, `assign_by`, `report_by`, `priority`, `ticket_status`, `state`, `estimated_time`, `time_spent`, `time_description`, `workdate`, `subtask`, `status`, `ticket_subtype`, `date_created`) VALUES
(2, '200425095952', '20200423063943', '1', 'Printer', 'Paper Jam', '1', '20200423065421', '20200423065132', '1', '1', '1', '1', '1', '1', '', '1', '', '1', '2020-04-25 09:52:59 am'),
(3, '200425120117', '20200423063943', '2', 'Printer1', 'Paper jam2', '1', '20200423065132', '20200423065132', '2', '1', '1', '1', '1', '1', '', '1', '', '1', '2020-04-25 12:17:01 pm'),
(11, '20200427094439', '20200423063943', '1', '1', 'a', '', '20200423065132', '1', '2', '1', '1', '', '', '', '', '', '', '', '2020-04-27 09:39:44 am'),
(12, '20200427103146', '20200423063943', '1', 'Printer2', '12', '', '20200423065132', '1', '3', '1', '1', '', '', '', '', '', '', '', '2020-04-27 10:46:31 am');

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
(2, 'Hardware');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ticket_subtask`
--

CREATE TABLE `tbl_ticket_subtask` (
  `sub_id` int(11) NOT NULL,
  `sub_ticket_id` varchar(225) NOT NULL,
  `subtask` varchar(225) NOT NULL
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
  `status` varchar(222) NOT NULL,
  `datecreated` varchar(222) NOT NULL,
  `user_profile` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userid`, `user_code`, `name`, `firstname`, `lastname`, `middlename`, `ipaddress`, `role_id`, `department`, `position`, `local`, `email`, `password`, `status`, `datecreated`, `user_profile`) VALUES
(1, '20200423065132', 'jucel Estribo', 'Jucel', 'Estribo', 'M.', '10.4.15.20', '1', 'EDP', 'Web Developer', '123', 'jmestribo@gmail.com', '123', 'Active', '2020-04-23', ''),
(2, '20200423065421', 'Jorge Ariola', 'Jorge', 'Ariola', 'M.', '10.4.15.15', '1', 'EDP', 'Support', '138', 'jmariola@gmail.com', '123', 'Active', '2020-04-23', ''),
(3, '123', 'Mark Kalalo', 'Mark', 'Kalalo', 'M.', '10.4.15.15', '1', 'EDP', 'Support', '138', 'mark@gmail.com', '123', 'Active', '2020-04-23', '');

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
-- Indexes for table `tbl_ticket`
--
ALTER TABLE `tbl_ticket`
  ADD PRIMARY KEY (`ticketid`);

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
  MODIFY `escid` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `tbl_ticket`
--
ALTER TABLE `tbl_ticket`
  MODIFY `ticketid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_tickettype`
--
ALTER TABLE `tbl_tickettype`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
