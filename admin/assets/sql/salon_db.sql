-- Complete database schema and example data for salon_db


-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 09, 2017 at 08:00 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `salon_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(3) NOT NULL,
  `activity_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `activity_name`) VALUES
(1, 'Client booking'),
(2, 'Guest booking'),
(3, 'Staff holiday'),
(4, 'Staff training'),
(5, 'Staff meeting'),
(6, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `hairdresser_id` int(11) NOT NULL,
  `activity_id` int(3) NOT NULL,
  `booking_text` text NOT NULL,
  `client_id` int(11) NOT NULL,
  `guest_name` varchar(90) NOT NULL,
  `guest_tel` varchar(30) NOT NULL,
  `service_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `changed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(3) NOT NULL,
  `category_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Mens'),
(2, 'Ladies'),
(3, 'Childrens'),
(4, 'Unisex');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` int(3) NOT NULL,
  `day_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `day_name`) VALUES
(1, 'Sunday'),
(2, 'Monday'),
(3, 'Tuesday'),
(4, 'Wednesday'),
(5, 'Thursday'),
(6, 'Friday'),
(7, 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `open_times`
--

CREATE TABLE `open_times` (
  `id` int(11) NOT NULL,
  `day_id` int(3) NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `first_date` date NOT NULL,
  `last_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `open_times`
--

INSERT INTO `open_times` (`id`, `day_id`, `open_time`, `close_time`, `first_date`, `last_date`) VALUES
(1, 1, '10:00:00', '17:00:00', '2017-01-01', '2017-12-31'),
(2, 2, '10:00:00', '19:00:00', '2017-01-01', '2017-01-01'),
(3, 2, '10:00:00', '19:00:00', '2017-01-03', '2017-04-16'),
(4, 2, '10:00:00', '19:00:00', '2017-04-18', '2017-04-30'),
(5, 2, '10:00:00', '19:00:00', '2017-05-02', '2017-05-28'),
(6, 2, '10:00:00', '19:00:00', '2017-05-30', '2017-08-27'),
(7, 2, '10:00:00', '19:00:00', '2017-08-29', '2017-12-24'),
(8, 2, '10:00:00', '19:00:00', '2017-12-26', '2017-12-31'),
(9, 4, '10:00:00', '19:00:00', '2017-01-01', '2017-12-26'),
(10, 4, '10:00:00', '19:00:00', '2017-12-28', '2017-12-31'),
(11, 5, '10:00:00', '19:00:00', '2017-01-01', '2017-12-31'),
(12, 6, '10:00:00', '19:00:00', '2017-01-01', '2017-04-13'),
(13, 6, '10:00:00', '19:00:00', '2017-04-15', '2017-12-31'),
(14, 7, '10:00:00', '19:00:00', '2017-01-01', '2017-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(3) NOT NULL,
  `role_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'Manager'),
(2, 'Hairdresser'),
(3, 'Client');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `hairdresser_id` int(11) NOT NULL,
  `day_id` int(3) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `first_date` date NOT NULL,
  `last_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `changed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `hairdresser_id`, `day_id`, `start_time`, `end_time`, `first_date`, `last_date`, `created_at`, `changed_at`) VALUES
(1, 1, 1, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(2, 1, 1, '15:00:00', '17:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(3, 1, 2, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(4, 1, 2, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(5, 1, 4, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(6, 1, 4, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(7, 1, 5, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(8, 1, 5, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(9, 1, 6, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(10, 1, 6, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(11, 1, 7, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(12, 1, 7, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(13, 2, 1, '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(14, 2, 1, '14:00:00', '17:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(15, 2, 2, '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(16, 2, 2, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(17, 2, 4, '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(18, 2, 4, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(19, 2, 5, '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(20, 2, 5, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(21, 2, 6, '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(22, 2, 6, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(23, 2, 7, '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(24, 2, 7, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(25, 3, 2, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(26, 3, 2, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(27, 3, 4, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(28, 3, 4, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(29, 3, 5, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(30, 3, 5, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(31, 3, 6, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(32, 3, 6, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(33, 3, 7, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(34, 3, 7, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(35, 4, 2, '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(36, 4, 2, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(37, 4, 4, '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(38, 4, 4, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(39, 4, 5, '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(40, 4, 5, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(41, 4, 6, '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(42, 4, 6, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(43, 4, 7, '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(44, 4, 7, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(45, 5, 1, '10:00:00', '15:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(46, 5, 4, '11:00:00', '16:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(47, 5, 5, '11:00:00', '16:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(48, 5, 6, '11:00:00', '16:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(49, 5, 7, '11:00:00', '16:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(50, 6, 1, '12:00:00', '17:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(51, 6, 4, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(52, 6, 5, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(53, 6, 6, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(54, 6, 7, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(55, 7, 1, '11:00:00', '15:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(56, 7, 6, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(57, 7, 7, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(58, 8, 1, '12:00:00', '16:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(59, 8, 6, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(60, 8, 7, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(61, 9, 2, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(62, 9, 5, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(63, 10, 2, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(64, 10, 5, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06'),
(65, 10, 6, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-09-04 16:44:06', '2017-09-04 16:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` time NOT NULL,
  `category_id` int(3) NOT NULL,
  `cost` decimal(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `changed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `duration`, `category_id`, `cost`, `created_at`, `changed_at`) VALUES
(1, 'Ladies haircut and shampoo', '01:00:00', 2, '40.00', '2017-09-04 16:45:14', '2017-09-04 16:45:14'),
(2, 'Mens haircut and shampoo', '01:00:00', 1, '30.00', '2017-09-04 16:45:14', '2017-09-04 16:45:14'),
(3, 'Childrens haircut and shampoo', '01:00:00', 3, '20.00', '2017-09-04 16:45:14', '2017-09-04 16:45:14'),
(4, 'Shampoo and blow dry', '01:00:00', 4, '25.00', '2017-09-04 16:45:14', '2017-09-04 16:45:14'),
(5, 'Perm', '02:00:00', 4, '90.00', '2017-09-04 16:45:14', '2017-09-04 16:45:14'),
(6, 'Straight perm', '03:00:00', 4, '140.00', '2017-09-04 16:45:14', '2017-09-04 16:45:14'),
(7, 'Colour', '02:00:00', 4, '80.00', '2017-09-04 16:45:14', '2017-09-04 16:45:14'),
(8, 'Highlights quarter-head', '02:00:00', 4, '90.00', '2017-09-04 16:45:14', '2017-09-04 16:45:14'),
(9, 'Highlights half-head', '02:00:00', 4, '110.00', '2017-09-04 16:45:14', '2017-09-04 16:45:14'),
(10, 'Highlights full-head', '03:00:00', 4, '130.00', '2017-09-04 16:45:14', '2017-09-04 16:45:14'),
(11, 'Treatment', '02:00:00', 4, '60.00', '2017-09-04 16:45:14', '2017-09-04 16:45:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(90) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `gender` int(3) NOT NULL,
  `role_id` int(3) NOT NULL,
  `hairdresser_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `changed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `tel`, `gender`, `role_id`, `hairdresser_id`, `created_at`, `changed_at`) VALUES
(1, 'Peter', 'Cheung', 'peter@test.com', '$2y$10$xCyVL42QLX622jcZf8koee/4QhVPBpLNGYH5o.6hdHzi5ntC5iPq.', '07540 320 320', 1, 1, 0, '2017-09-04 16:42:40', '2017-09-04 16:42:40'),
(2, 'Ludie', 'Lincoln', 'ludie@test.com', '$2y$10$xCyVL42QLX622jcZf8koeej0ge9LmJruht6JuxAdEREDO0txmw9gy', '05505 888 888', 2, 1, 0, '2017-09-04 16:42:40', '2017-09-04 16:42:40'),
(3, 'Marc', 'Dittmar', 'marc@test.com', '$2y$10$xCyVL42QLX622jcZf8koeewgSSpt25muH9ZQQh5TJeBrqJCIWvhJq', '01220 677 688', 1, 2, 0, '2017-09-04 16:42:40', '2017-09-04 16:42:40'),
(4, 'Ginette', 'Vanalien', 'ginette@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeCXONwxrmsLrAJpqko5xzXFhiA8rd8Ju', '09909 111 666', 2, 2, 0, '2017-09-04 16:42:40', '2017-09-04 16:42:40'),
(5, 'Claudie', 'Secord', 'claudie@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeW8w9gDEk0YqBXfcYWBkzdGmIocHsRcW', '09976 987 654', 2, 2, 0, '2017-09-04 16:42:40', '2017-09-04 16:42:40'),
(6, 'Markita', 'Whited', 'markita@test.com', '$2y$10$xCyVL42QLX622jcZf8koeegV8j.YrgIRepYjMraY5sv9BiW80yfJG', '01133 662 333', 2, 2, 0, '2017-09-04 16:42:40', '2017-09-04 16:42:40'),
(7, 'Maya', 'Spruell', 'maya@test.com', '$2y$10$xCyVL42QLX622jcZf8koee26Mtny.eQ9ExL8A7DAIcAqhYTvfk872', '01164 466 266', 2, 2, 0, '2017-09-04 16:42:40', '2017-09-04 16:42:40'),
(8, 'Era', 'Champion', 'era@test.com', '$2y$10$xCyVL42QLX622jcZf8koeenC6zOPQylot8zLWArdvaeXwCidE3wdy', '03445 776 512', 2, 2, 0, '2017-09-04 16:42:40', '2017-09-04 16:42:40'),
(9, 'Carolyn', 'Hodgkins', 'carolyn@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeZznzQzRoFI6pjDUlgB.e9bec.piPNaC', '07645 388 543', 2, 2, 0, '2017-09-04 16:42:40', '2017-09-04 16:42:40'),
(10, 'Josiah', 'Molander', 'josiah@test.com', '$2y$10$xCyVL42QLX622jcZf8koee2u2O1bpUWO9GbTbH7a0ddqnnTfJdoke', '07324 324 324', 1, 2, 0, '2017-09-04 16:42:40', '2017-09-04 16:42:40'),
(11, 'Yon', 'Byford', 'yon@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeCb9w75P6Pw1oRcQUIae6xstHokS4oG.', '07878 887 800', 2, 3, 1, '2017-09-04 16:46:40', '2017-09-04 16:46:40'),
(12, 'Bong', 'Engelke', 'bong@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeDMOLNzQvreBFBQNNQc0hJ8RAee7d05K', '06606 123 123', 1, 3, 1, '2017-09-04 16:46:40', '2017-09-04 16:46:40'),
(13, 'Elizabeth', 'Oren', 'elizabeth@test.com', '$2y$10$xCyVL42QLX622jcZf8koeebPQX1svw3HANErab3F55VK.V5UoUxji', '02343 454 454', 2, 3, 2, '2017-09-04 16:46:40', '2017-09-04 16:46:40'),
(14, 'Marcell', 'Goates', 'marcell@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeazguwsbqCpdArajafm7ltCIGYUC3W1y', '04556 343 343', 1, 3, 2, '2017-09-04 16:46:40', '2017-09-04 16:46:40'),
(15, 'Dia', 'Schlagel', 'dia@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeVj3rbWiv/5YtxQ3IbFwljDySUSWdLOm', '04343 943 943', 2, 3, 3, '2017-09-04 16:46:40', '2017-09-04 16:46:40'),
(16, 'Gayla', 'Coombes', 'gayla@test.com', '$2y$10$xCyVL42QLX622jcZf8koeefNQ7t3Nnzycst90GQZLiabjv6cDPOTu', '07880 345 555', 2, 3, 3, '2017-09-04 16:46:40', '2017-09-04 16:46:40'),
(17, 'Kristy', 'Spake', 'kristy@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeVSHN3439Nny3rdu2/xP8eifDJfZJnk6', '08989 123 321', 2, 3, 4, '2017-09-04 16:46:40', '2017-09-04 16:46:40'),
(18, 'Tasha', 'Gobble', 'tasha@test.com', '$2y$10$xCyVL42QLX622jcZf8koeetz8geNDnSvwAb8JMjhoKHzIqCQhOZti', '06549 909 909', 2, 3, 4, '2017-09-04 16:46:40', '2017-09-04 16:46:40'),
(19, 'Micaela', 'Maranto', 'micaela@test.com', '$2y$10$xCyVL42QLX622jcZf8koeesCxH46ZYg3pEhyEf.FKaOq5fzu7ylXa', '07632 567 890', 2, 3, 5, '2017-09-04 16:46:40', '2017-09-04 16:46:40'),
(20, 'Hermila', 'Julia', 'hermila@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeUucUrJ02ESK1RagWYQkcB6Mv5yfT7Uu', '09678 344 344', 2, 3, 5, '2017-09-04 16:46:40', '2017-09-04 16:46:40'),
(21, 'Carlos', 'Senn', 'carlos@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeC10TwLQC4hs8qHbhjmEPcdt4Q4wdk06', '07884 765 765', 1, 3, 6, '2017-09-04 16:46:40', '2017-09-04 16:46:40'),
(22, 'Duane', 'Holtzclaw', 'duane@test.com', '$2y$10$xCyVL42QLX622jcZf8koeec7r1evX59/wC8tG4BUhNV2OReuOkjBK', '01112 578 677', 1, 3, 6, '2017-09-04 16:46:40', '2017-09-04 16:46:40'),
(23, 'Marilou', 'Hullinger', 'marilou@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeHDX25ZPSJ/CC1hZlCvZz80kCHAIazs6', '01145 787 787', 2, 3, 7, '2017-09-04 16:46:40', '2017-09-04 16:46:40'),
(24, 'Honey', 'Defibaugh', 'honey@test.com', '$2y$10$xCyVL42QLX622jcZf8koeekKEdOhFqTSkt.9U6dxmq9MtyxyCSsRO', '01172 873 477', 2, 3, 7, '2017-09-04 16:46:40', '2017-09-04 16:46:40'),
(25, 'Branden', 'Mento', 'branden@test.com', '$2y$10$xCyVL42QLX622jcZf8koee7T6RWY2u93DJ7bJOviupkL14D5Gl9eO', '05434 446 688', 1, 3, 8, '2017-09-04 16:46:40', '2017-09-04 16:46:40'),
(26, 'Arnetta', 'Fiscus', 'arnetta@test.com', '$2y$10$xCyVL42QLX622jcZf8koeemJwdvUXXYps61oagvHt1mGax3.BQxO6', '08989 432 987', 2, 3, 8, '2017-09-04 16:46:40', '2017-09-04 16:46:40'),
(27, 'Wally', 'Brunet', 'wally@test.com', '$2y$10$xCyVL42QLX622jcZf8koeerd3mljLcQjt5g41XjPIkUa3cIo3yWqu', '01217 564 234', 1, 3, 9, '2017-09-04 16:46:40', '2017-09-04 16:46:40'),
(28, 'Karine', 'Farrah', 'karine@test.com', '$2y$10$xCyVL42QLX622jcZf8koee3.yS1MJ0AIpwYJEfcHkWQc93ca8ixXa', '01114 898 333', 2, 3, 9, '2017-09-04 16:46:40', '2017-09-04 16:46:40'),
(29, 'Mikki', 'Bickel', 'mikki@test.com', '$2y$10$xCyVL42QLX622jcZf8koee596b0f8w0N8esg6niBlqxjEf024SfPK', '07665 665 665', 2, 3, 10, '2017-09-04 16:46:40', '2017-09-04 16:46:40'),
(30, 'Betty', 'Mullarkey', 'betty@test.com', '$2y$10$xCyVL42QLX622jcZf8koeevhMSUwtPwIJShh1lqfmY0NRrVIpw9Fe', '05000 777 888', 2, 3, 10, '2017-09-04 16:46:40', '2017-09-04 16:46:40'),
(31, 'Ninfa', 'Stallings', 'ninfa@test.com', '$2y$10$xCyVL42QLX622jcZf8koeetlmgOAobVvuVHk5PFtHWU0aEr2nZ8j6', '01156 900 800', 2, 3, 0, '2017-09-04 16:46:40', '2017-09-04 16:46:40'),
(32, 'Lupe', 'Bondurant', 'lupe@test.com', '$2y$10$xCyVL42QLX622jcZf8koee1Q6XRH/MgIUN1Oqda6zuSB4Z3FxA6WK', '01187 233 455', 1, 3, 0, '2017-09-04 16:46:40', '2017-09-04 16:46:40'),
(33, 'Morris', 'Liechty', 'morris@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeoOnokHeOzT20LlI9pVpaweQ3z0QA.7C', '01132 600 322', 1, 3, 0, '2017-09-04 16:46:40', '2017-09-04 16:46:40'),
(34, 'Jeri', 'Chatterton', 'jeri@test.com', '$2y$10$xCyVL42QLX622jcZf8koee9Uwi1P/9dsHs9c4.KLP1GsAzr4AdUQu', '07665 665 665', 2, 3, 0, '2017-09-04 16:46:40', '2017-09-04 16:46:40'),
(35, 'Elsy', 'Peoples', 'elsy@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeRhd7rRzLaev7jOlfSSefF5pniOL2F9C', '04521 211 311', 2, 3, 0, '2017-09-04 16:46:40', '2017-09-04 16:46:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `open_times`
--
ALTER TABLE `open_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `open_times`
--
ALTER TABLE `open_times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
