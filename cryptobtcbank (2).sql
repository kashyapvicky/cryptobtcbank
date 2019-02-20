-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2018 at 07:43 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cryptobtcbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `crone_job_income`
--

CREATE TABLE `crone_job_income` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `total_income` int(11) NOT NULL,
  `ondate` date NOT NULL,
  `income_type` int(11) NOT NULL COMMENT '1=>matching,2=>direct,3=>roi',
  `credit_amount` float NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crone_job_income`
--

INSERT INTO `crone_job_income` (`id`, `user_id`, `name`, `user_name`, `total_income`, `ondate`, `income_type`, `credit_amount`, `timestamp`, `status`) VALUES
(5, 1, 'vicky', 'vicky@001', 70, '2018-10-08', 1, 4, '2018-10-08 18:15:58', 1),
(7, 1, 'vicky', 'vicky@001', 70, '2018-10-09', 1, 4, '2018-10-08 18:16:11', 1),
(8, 1, 'vicky', 'vicky@001', 70, '2018-10-12', 1, 4, '2018-10-08 18:16:15', 1),
(9, 1, 'vicky', 'vicky@001', 70, '2018-10-08', 1, 4, '2018-10-08 18:16:18', 1),
(10, 1, 'vicky', 'vicky@001', -70, '2018-10-09', 1, -3, '2018-10-09 08:41:55', 1),
(16, 1, 'vicky', 'vicky@001', 70, '2018-10-10', 1, 4, '2018-10-10 11:01:19', 1),
(17, 1, 'vicky', 'vicky@001', 70, '2018-10-10', 1, 4, '2018-10-10 11:03:04', 1),
(18, 1, 'vicky', 'vicky@001', 70, '2018-10-10', 1, 0, '2018-10-10 11:04:52', 1),
(19, 1, 'vicky', 'vicky@001', 70, '2018-10-10', 1, 0, '2018-10-10 11:07:30', 1),
(20, 1, 'vicky', 'vicky@001', 230, '2018-10-10', 2, 12, '2018-10-10 11:08:55', 1),
(28, 1, 'vicky', 'vicky@001', 50, '2018-10-10', 3, 0.5, '2018-10-10 12:46:24', 1),
(29, 2, 'karan', 'karan@001', 100, '2018-10-10', 3, 2, '2018-10-10 12:46:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inv_transactions`
--

CREATE TABLE `inv_transactions` (
  `id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inv_transactions`
--

INSERT INTO `inv_transactions` (`id`, `user_id`, `amount`, `plan`, `time`, `status`) VALUES
(1, 1, 50, '4', '0000-00-00 00:00:00', 1),
(2, 1, 100, '2', '2018-10-02 05:45:11', 1),
(3, 1, 100, '1', '2018-10-02 06:37:47', 1),
(4, 1, 100, '1', '2018-10-02 06:38:07', 1),
(5, 1, 100, '4', '2018-10-02 06:38:21', 1),
(6, 1, 100, '2', '2018-10-10 15:43:05', 1),
(7, 1, 50, '1', '2018-10-10 15:43:44', 1),
(8, 1, 34, '1', '2018-10-11 08:54:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `spinner_transaction`
--

CREATE TABLE `spinner_transaction` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `outcome` int(10) NOT NULL,
  `result` int(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date` date NOT NULL,
  `status` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spinner_transaction`
--

INSERT INTO `spinner_transaction` (`id`, `user_id`, `outcome`, `result`, `time`, `date`, `status`) VALUES
(1, 1, 24, -70, '2018-09-22 17:11:49', '0000-00-00', 1),
(2, 1, 18, -40, '2018-09-22 17:12:16', '0000-00-00', 1),
(3, 1, 28, -180, '2018-09-23 06:20:24', '0000-00-00', 1),
(4, 1, 8, -10, '2018-09-23 07:07:41', '0000-00-00', 1),
(5, 1, 33, -140, '2018-09-23 07:08:23', '0000-00-00', 1),
(6, 1, 30, -110, '2018-09-23 07:12:22', '0000-00-00', 1),
(7, 1, 9, 1, '2018-09-23 07:12:57', '0000-00-00', 1),
(8, 1, 30, -110, '2018-09-23 07:13:35', '0000-00-00', 1),
(9, 1, 8, -10, '2018-09-23 07:16:55', '0000-00-00', 1),
(10, 1, 2, 70, '2018-09-23 07:17:45', '0000-00-00', 1),
(11, 1, 24, -70, '2018-09-23 07:19:18', '0000-00-00', 1),
(12, 1, 12, -110, '2018-09-23 07:20:34', '0000-00-00', 1),
(13, 1, 5, -80, '2018-09-23 07:21:17', '0000-00-00', 1),
(14, 1, 27, 170, '2018-09-23 07:23:56', '0000-00-00', 1),
(15, 1, 27, 170, '2018-09-23 07:23:57', '0000-00-00', 1),
(16, 1, 13, 150, '2018-09-23 07:31:47', '0000-00-00', 1),
(17, 1, 24, -70, '2018-09-23 07:39:58', '0000-00-00', 1),
(18, 1, 15, -60, '2018-09-23 07:43:27', '0000-00-00', 1),
(19, 1, 3, -90, '2018-09-23 07:43:57', '0000-00-00', 1),
(20, 1, 22, -200, '2018-09-23 08:50:16', '0000-00-00', 1),
(21, 1, 33, -140, '2018-09-23 08:51:10', '0000-00-00', 1),
(22, 1, 21, 100, '2018-09-23 08:57:21', '0000-00-00', 1),
(23, 1, 4, 60, '2018-09-23 08:57:39', '0000-00-00', 1),
(24, 1, 16, 150, '2018-09-23 09:07:17', '0000-00-00', 1),
(25, 1, 11, 40, '2018-09-24 11:02:32', '0000-00-00', 1),
(26, 1, 30, -110, '2018-09-24 11:04:43', '0000-00-00', 1),
(27, 1, 13, 150, '2018-09-24 11:06:21', '0000-00-00', 1),
(28, 1, 7, 30, '2018-09-24 11:07:35', '0000-00-00', 1),
(29, 1, 27, 170, '2018-09-24 11:08:04', '0000-00-00', 1),
(30, 1, 17, -5, '2018-09-24 11:10:03', '0000-00-00', 1),
(31, 1, 22, -200, '2018-09-24 11:12:43', '0000-00-00', 1),
(32, 1, 9, 1, '2018-09-24 11:13:47', '0000-00-00', 1),
(33, 1, 4, 60, '2018-09-24 11:20:33', '0000-00-00', 1),
(34, 1, 4, 60, '2018-09-24 11:20:34', '0000-00-00', 1),
(35, 1, 4, 60, '2018-09-24 11:20:35', '0000-00-00', 1),
(36, 1, 14, -120, '2018-09-24 11:21:06', '0000-00-00', 1),
(37, 1, 14, -120, '2018-09-24 11:21:06', '0000-00-00', 1),
(38, 1, 12, -110, '2018-09-24 11:23:04', '0000-00-00', 1),
(39, 1, 7, 30, '2018-09-24 11:28:52', '0000-00-00', 1),
(40, 1, 10, -150, '2018-09-24 11:29:44', '0000-00-00', 1),
(41, 1, 29, 190, '2018-09-24 11:32:26', '0000-00-00', 1),
(42, 1, 3, -90, '2018-09-24 11:34:38', '0000-00-00', 1),
(43, 1, 33, -140, '2018-09-24 11:36:46', '0000-00-00', 1),
(44, 1, 16, 150, '2018-09-24 11:39:42', '0000-00-00', 1),
(45, 1, 1, -3, '2018-09-24 11:42:56', '0000-00-00', 1),
(46, 1, 2, 70, '2018-09-24 11:53:46', '0000-00-00', 1),
(47, 1, 32, -60, '2018-09-24 11:55:52', '0000-00-00', 1),
(48, 1, 29, 190, '2018-09-24 12:14:04', '0000-00-00', 1),
(49, 1, 14, -120, '2018-09-24 12:14:19', '0000-00-00', 1),
(50, 1, 14, -120, '2018-09-24 12:14:20', '0000-00-00', 1),
(51, 1, 25, 80, '2018-09-24 12:14:31', '0000-00-00', 1),
(52, 1, 15, -60, '2018-09-24 12:42:21', '0000-00-00', 1),
(53, 1, 21, 100, '2018-09-24 12:49:28', '0000-00-00', 1),
(54, 1, 19, 130, '2018-09-25 04:49:36', '0000-00-00', 1),
(55, 1, 26, -160, '2018-09-25 05:22:06', '0000-00-00', 1),
(56, 1, 6, -20, '2018-09-25 05:22:20', '0000-00-00', 1),
(57, 1, 5, -80, '2018-09-25 16:43:44', '0000-00-00', 1),
(58, 1, 14, -120, '2018-09-25 17:01:36', '0000-00-00', 1),
(59, 1, 28, -180, '2018-09-25 17:04:06', '0000-00-00', 1),
(60, 1, 13, 150, '2018-09-25 17:23:04', '0000-00-00', 1),
(61, 1, 25, 80, '2018-09-25 17:27:46', '0000-00-00', 1),
(62, 1, 20, -150, '2018-09-26 05:50:48', '0000-00-00', 1),
(63, 1, 22, -200, '2018-09-26 06:01:43', '0000-00-00', 1),
(64, 1, 12, -110, '2018-09-26 06:30:12', '0000-00-00', 1),
(65, 1, 17, -5, '2018-09-26 06:49:07', '0000-00-00', 1),
(66, 1, 5, -80, '2018-09-26 06:51:53', '0000-00-00', 1),
(67, 1, 17, -5, '2018-09-26 06:54:13', '0000-00-00', 1),
(68, 1, 21, 10, '2018-09-26 07:29:21', '0000-00-00', 1),
(69, 1, 33, -40, '2018-09-26 07:30:03', '0000-00-00', 1),
(70, 1, 20, -50, '2018-09-26 07:32:46', '0000-00-00', 1),
(71, 1, 18, -40, '2018-09-26 07:33:26', '0000-00-00', 1),
(72, 1, 6, -20, '2018-09-26 07:35:47', '0000-00-00', 1),
(73, 1, 10, -50, '2018-09-26 07:51:57', '0000-00-00', 1),
(74, 1, 33, -40, '2018-09-26 07:52:34', '0000-00-00', 1),
(75, 1, 11, 20, '2018-09-26 07:55:43', '0000-00-00', 1),
(76, 1, 17, -5, '2018-09-26 07:56:40', '0000-00-00', 1),
(77, 1, 0, -2, '2018-09-26 07:57:28', '0000-00-00', 1),
(78, 1, 18, -40, '2018-09-26 07:57:56', '0000-00-00', 1),
(79, 1, 7, 15, '2018-09-26 08:02:22', '0000-00-00', 1),
(80, 1, 12, -10, '2018-09-26 08:04:11', '0000-00-00', 1),
(81, 1, 19, 20, '2018-09-26 08:04:53', '0000-00-00', 1),
(82, 1, 19, 20, '2018-09-26 08:06:01', '0000-00-00', 1),
(83, 1, 6, -20, '2018-09-26 08:06:51', '0000-00-00', 1),
(84, 1, 20, -50, '2018-09-26 08:12:51', '0000-00-00', 1),
(85, 1, 24, -70, '2018-09-26 08:14:11', '0000-00-00', 1),
(86, 1, 15, -60, '2018-09-26 08:16:07', '0000-00-00', 1),
(87, 1, 7, 15, '2018-09-26 08:17:46', '0000-00-00', 1),
(88, 1, 7, 15, '2018-09-26 08:20:50', '0000-00-00', 1),
(89, 1, 15, -60, '2018-09-26 08:21:13', '0000-00-00', 1),
(90, 1, 16, 100, '2018-09-26 08:22:13', '0000-00-00', 1),
(91, 1, 15, -60, '2018-09-26 08:22:33', '0000-00-00', 1),
(92, 1, 10, -50, '2018-09-26 08:22:56', '0000-00-00', 1),
(93, 1, 15, -60, '2018-09-26 08:24:10', '0000-00-00', 1),
(94, 1, 14, -20, '2018-09-26 08:24:36', '0000-00-00', 1),
(95, 1, 11, 20, '2018-09-26 08:24:59', '0000-00-00', 1),
(96, 1, 33, -40, '2018-09-26 08:25:21', '0000-00-00', 1),
(97, 1, 19, 20, '2018-09-26 08:25:49', '0000-00-00', 1),
(98, 1, 32, -60, '2018-09-26 08:26:19', '0000-00-00', 1),
(99, 1, 20, -50, '2018-09-26 08:28:34', '0000-00-00', 1),
(100, 1, 14, -20, '2018-09-26 08:30:47', '0000-00-00', 1),
(101, 1, 6, -20, '2018-09-26 08:31:41', '0000-00-00', 1),
(102, 1, 9, -1, '2018-09-26 08:34:45', '0000-00-00', 1),
(103, 1, 13, 50, '2018-09-26 08:35:34', '0000-00-00', 1),
(104, 1, 7, 15, '2018-09-26 08:36:14', '0000-00-00', 1),
(105, 1, 3, -90, '2018-09-26 08:36:44', '0000-00-00', 1),
(106, 1, 26, -60, '2018-09-26 08:37:21', '0000-00-00', 1),
(107, 1, 28, -80, '2018-09-26 08:37:51', '0000-00-00', 1),
(108, 1, 30, -10, '2018-09-26 08:38:10', '0000-00-00', 1),
(109, 1, 22, -100, '2018-09-26 08:38:59', '0000-00-00', 1),
(110, 1, 17, -5, '2018-09-26 08:41:12', '0000-00-00', 1),
(111, 1, 17, -5, '2018-09-26 08:41:13', '0000-00-00', 1),
(112, 1, 29, -90, '2018-09-26 08:41:32', '0000-00-00', 1),
(113, 1, 6, -20, '2018-09-26 08:43:52', '0000-00-00', 1),
(114, 1, 9, -1, '2018-09-26 08:46:30', '0000-00-00', 1),
(115, 1, 32, -60, '2018-09-26 08:46:45', '0000-00-00', 1),
(116, 1, 3, -90, '2018-09-26 08:47:59', '0000-00-00', 1),
(117, 1, 13, 50, '2018-09-26 08:49:47', '0000-00-00', 1),
(118, 1, 20, -50, '2018-09-26 08:50:17', '0000-00-00', 1),
(119, 1, 0, -2, '2018-09-26 08:50:41', '0000-00-00', 1),
(120, 1, 16, 100, '2018-09-26 08:53:40', '0000-00-00', 1),
(121, 1, 14, -20, '2018-09-26 08:54:01', '0000-00-00', 1),
(122, 1, 23, 5, '2018-09-26 08:54:10', '0000-00-00', 1),
(123, 1, 13, 50, '2018-09-26 08:56:35', '0000-00-00', 1),
(124, 1, 20, -50, '2018-09-26 08:57:07', '0000-00-00', 1),
(125, 1, 16, 100, '2018-09-26 09:01:50', '0000-00-00', 1),
(126, 1, 15, -60, '2018-09-26 09:03:42', '0000-00-00', 1),
(127, 1, 28, -80, '2018-09-26 09:05:16', '0000-00-00', 1),
(128, 1, 11, 20, '2018-09-26 09:05:46', '0000-00-00', 1),
(129, 1, 32, -60, '2018-09-26 09:06:35', '0000-00-00', 1),
(130, 1, 19, 20, '2018-09-26 09:07:17', '0000-00-00', 1),
(131, 1, 4, 60, '2018-09-26 09:08:26', '0000-00-00', 1),
(132, 1, 17, -5, '2018-09-26 09:08:41', '0000-00-00', 1),
(133, 1, 29, -90, '2018-09-26 09:10:19', '0000-00-00', 1),
(134, 1, 9, -1, '2018-09-26 09:10:28', '0000-00-00', 1),
(135, 1, 10, -50, '2018-09-26 09:10:37', '0000-00-00', 1),
(136, 1, 10, -50, '2018-09-26 09:11:08', '0000-00-00', 1),
(137, 1, 9, -1, '2018-09-26 09:14:07', '0000-00-00', 1),
(138, 1, 23, 5, '2018-09-26 09:14:21', '0000-00-00', 1),
(139, 1, 26, -60, '2018-09-26 09:15:15', '0000-00-00', 1),
(140, 1, 22, -100, '2018-09-26 09:16:22', '0000-00-00', 1),
(141, 1, 22, -100, '2018-09-26 09:16:57', '0000-00-00', 1),
(142, 1, 17, -5, '2018-09-26 09:21:10', '0000-00-00', 1),
(143, 1, 17, -5, '2018-09-26 09:28:28', '0000-00-00', 1),
(144, 1, 19, 20, '2018-09-26 09:28:52', '0000-00-00', 1),
(145, 1, 8, -10, '2018-09-26 09:38:43', '0000-00-00', 1),
(146, 1, 19, 20, '2018-09-26 09:38:57', '0000-00-00', 1),
(147, 1, 32, -60, '2018-09-26 09:45:10', '0000-00-00', 1),
(148, 1, 32, -60, '2018-09-26 09:45:12', '0000-00-00', 1),
(149, 1, 2, 20, '2018-09-26 09:45:27', '0000-00-00', 1),
(150, 1, 13, 50, '2018-09-26 10:14:24', '0000-00-00', 1),
(151, 1, 20, -50, '2018-09-26 10:15:40', '0000-00-00', 1),
(152, 1, 8, -10, '2018-09-27 05:27:48', '0000-00-00', 1),
(153, 1, 14, -20, '2018-09-28 05:21:05', '0000-00-00', 1),
(154, 1, 9, -1, '2018-09-28 05:43:06', '0000-00-00', 1),
(155, 1, 8, -10, '2018-09-29 09:28:26', '0000-00-00', 1),
(156, 1, 30, -10, '2018-10-02 06:15:36', '0000-00-00', 1),
(157, 1, 21, 10, '2018-10-03 17:13:36', '0000-00-00', 1),
(158, 1, 31, 20, '2018-10-03 17:16:35', '0000-00-00', 1),
(159, 1, 26, -60, '2018-10-05 14:47:27', '0000-00-00', 1),
(160, 1, 26, -60, '2018-10-08 15:41:07', '0000-00-00', 1),
(161, 1, 19, 20, '2018-10-10 12:22:36', '0000-00-00', 1),
(162, 1, 5, -80, '2018-10-10 12:22:50', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sponser_id` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `dreferal` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `join_date` date NOT NULL,
  `activation_date` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `package_id` int(10) NOT NULL,
  `package_exp_date` date NOT NULL,
  `btc` float DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT '1' COMMENT '2=&gt;default,1=>active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `sponser_id`, `position`, `mobile_number`, `dreferal`, `password`, `join_date`, `activation_date`, `timestamp`, `package_id`, `package_exp_date`, `btc`, `status`) VALUES
(1, 'vicky_k', 'vicky@001', 'veee.kay258@gmail.comm', 'admin', 'Right', '', 'admin', 'Heyudude@0', '2018-10-06', '0000-00-00', '2018-10-12 07:52:09', 1, '2019-03-10', 224.5, 1),
(2, 'karan', 'karan@001', 'veee.kay258@gmail.com', 'vicky@001', 'Right', '9034119343', 'vicky@001', 'karan@001', '2018-10-06', '0000-00-00', '2018-10-10 15:46:21', 2, '2018-10-30', 36, 1),
(3, 'ganesh', 'ganesh@001', 'veee.kay258@gmail.com', 'karan@001', 'Right', '2343242343', 'vicky@001', 'ganesh@001', '2018-10-06', '0000-00-00', '2018-10-10 15:47:14', 3, '2018-03-10', 40, 1),
(4, 'pawan', 'pawan@001', 'pawan@001.com', 'vicky@001', 'Left', '903418594842', 'vicky@001', 'pawan@001', '2018-10-06', '0000-00-00', '2018-10-10 15:46:07', 4, '0000-00-00', 50, 2),
(5, 'ritesh', 'ritesh@001', 'ritesh@kuri.com', 'pawan@001', 'Left', '9254400036', 'vicky@001', 'ritesh@001', '2018-10-06', '0000-00-00', '2018-10-10 15:46:07', 5, '0000-00-00', 60, 2),
(6, 'sita', 'sita1', 'user@tutorialvilla.com', 'ritesh@001', 'Left', '12345678890', 'vicky@001', 'qw', '2018-10-06', '0000-00-00', '2018-10-10 15:46:07', 6, '0000-00-00', NULL, 2),
(7, 'hanuman', 'hanuman1', 'team@ripenapps.com', 'ganesh@001', 'Right', '1234567890', 'vicky@001', 'qw', '2018-10-06', '0000-00-00', '2018-10-10 15:46:07', 0, '0000-00-00', 50, 2),
(8, 'visnu', 'kasyap', 'team@ripenapps.com', 'sita1', 'Left', '9034195001', 'vicky@001', 'qw', '2018-10-06', '0000-00-00', '2018-10-10 15:46:07', 6, '0000-00-00', NULL, 2),
(9, 'test', 'test@001', 'team@ripenapps.com', 'hanuman1', 'Right', '903418574743333', 'vicky@001', 'heyudude@0', '2018-10-10', '0000-00-00', '2018-10-10 15:46:07', 6, '0000-00-00', NULL, 2),
(10, 'hooka', 'hooka@001', 'abc@123.com', 'test@001', 'Right', '349i9328432', 'vicky@001', '123456', '2018-10-10', '0000-00-00', '2018-10-10 15:46:07', 6, '0000-00-00', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_transactions`
--

CREATE TABLE `withdraw_transactions` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdraw_transactions`
--

INSERT INTO `withdraw_transactions` (`id`, `user_id`, `amount`, `date`, `status`) VALUES
(1, 1, 34, '2018-10-02 07:46:37', 1),
(2, 1, 14, '2018-10-02 07:47:10', 1),
(3, 1, 20, '2018-10-10 14:41:05', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crone_job_income`
--
ALTER TABLE `crone_job_income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_transactions`
--
ALTER TABLE `inv_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spinner_transaction`
--
ALTER TABLE `spinner_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_transactions`
--
ALTER TABLE `withdraw_transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crone_job_income`
--
ALTER TABLE `crone_job_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `inv_transactions`
--
ALTER TABLE `inv_transactions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `spinner_transaction`
--
ALTER TABLE `spinner_transaction`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `withdraw_transactions`
--
ALTER TABLE `withdraw_transactions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;