-- salon_db MySQL Database Schema


-- Users table
CREATE TABLE `salon_db`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `first_name` VARCHAR(45) NOT NULL ,
  `last_name` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(90) NOT NULL ,
  `password` VARCHAR(255) NOT NULL ,
  `tel` VARCHAR(30) NOT NULL ,
  `gender` INT(3) NOT NULL ,
  `role_id` INT(3) NOT NULL ,
  `hairdresser_id` INT(11) NOT NULL ,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `changed_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;


-- Roles table
CREATE TABLE `salon_db`.`roles` ( 
  `id` INT(3) NOT NULL , 
  `role_name` VARCHAR(45) NOT NULL , 
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;


-- Roles table data
INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'Manager'),
(2, 'Hairdresser'),
(3, 'Client');


-- Services table
CREATE TABLE `salon_db`.`services` ( 
  `id` INT(11) NOT NULL AUTO_INCREMENT , 
  `name` VARCHAR(255) NOT NULL , 
  `duration` TIME NOT NULL , 
  `category_id` INT(3) NOT NULL , 
  `cost` DECIMAL(8,2) NOT NULL , 
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
  `changed_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;


-- Categories table
CREATE TABLE `salon_db`.`categories` ( 
  `id` INT(3) NOT NULL , 
  `category_name` VARCHAR(45) NOT NULL , 
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;


-- Categories table data
INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Mens'),
(2, 'Ladies'),
(3, 'Childrens'),
(4, 'Unisex');


-- Schedules table
CREATE TABLE `salon_db`.`schedules` ( 
  `id` INT(11) NOT NULL AUTO_INCREMENT , 
  `hairdresser_id` INT(11) NOT NULL , 
  `day_id` INT(3) NOT NULL , 
  `start_time` TIME NOT NULL , 
  `end_time` TIME NOT NULL , 
  `first_date` DATE NOT NULL , 
  `last_date` DATE NOT NULL , 
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
  `changed_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;


-- Open Times table
CREATE TABLE `salon_db`.`open_times` ( 
  `id` INT(11) NOT NULL AUTO_INCREMENT , 
  `day_id` INT(3) NOT NULL , 
  `open_time` TIME NOT NULL , 
  `close_time` TIME NOT NULL , 
  `first_date` DATE NOT NULL , 
  `last_date` DATE NOT NULL , 
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;


-- Open Times table data
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


-- Days table
CREATE TABLE `salon_db`.`days` ( 
  `id` INT(3) NOT NULL , 
  `day_name` VARCHAR(45) NOT NULL , 
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;


-- Days table data
INSERT INTO `days` (`id`, `day_name`) VALUES
(1, 'Sunday'),
(2, 'Monday'),
(3, 'Tuesday'),
(4, 'Wednesday'),
(5, 'Thursday'),
(6, 'Friday'),
(7, 'Saturday');


-- Bookings table
CREATE TABLE `salon_db`.`bookings` ( 
  `id` INT(11) NOT NULL AUTO_INCREMENT , 
  `booking_date` DATE NOT NULL , 
  `start_time` TIME NOT NULL , 
  `end_time` TIME NOT NULL , 
  `hairdresser_id` INT(11) NOT NULL , 
  `activity_id` INT(3) NOT NULL , 
  `booking_text` TEXT NOT NULL , 
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
  `changed_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;


-- Activities table
CREATE TABLE `salon_db`.`activities` ( 
  `id` INT(3) NOT NULL , 
  `activity_name` VARCHAR(255) NOT NULL , 
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;


-- Activities table data
INSERT INTO `activities` (`id`, `activity_name`) VALUES
(1, 'Client Booking'),
(2, 'Guest Booking'),
(3, 'Staff Holiday'),
(4, 'Staff Training'),
(5, 'Salon Repairs'),
(6, 'Salon Closed'),
(7, 'Misc Activity');


-- Client Bookings table
CREATE TABLE `salon_db`.`client_bookings` ( 
  `booking_id` INT(11) NOT NULL , 
  `client_id` INT(11) NOT NULL , 
  `service_id` INT(11) NOT NULL , 
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
  `changed_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
  PRIMARY KEY (`booking_id`)
) ENGINE = InnoDB;


-- Guest Bookings table
CREATE TABLE `salon_db`.`guest_bookings` ( 
  `booking_id` INT(11) NOT NULL , 
  `service_id` INT(11) NOT NULL , 
  `guest_name` VARCHAR(90) NOT NULL , 
  `guest_tel` VARCHAR(30) NOT NULL , 
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
  `changed_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
  PRIMARY KEY (`booking_id`)
) ENGINE = InnoDB;


--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `tel`, `gender`, `role_id`, `hairdresser_id`, `created_at`, `changed_at`) VALUES
(1, 'Peter', 'Cheung', 'peter@test.com', '$2y$10$xCyVL42QLX622jcZf8koee/4QhVPBpLNGYH5o.6hdHzi5ntC5iPq.', '07540 346 882', 1, 1, 0, '2017-08-22 11:26:32', '2017-08-26 14:21:56'),
(11, 'Yon', 'Buford', 'yon@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeCb9w75P6Pw1oRcQUIae6xstHokS4oG.', '07878 887 778', 2, 3, 46, '2017-08-23 14:50:12', '2017-08-26 13:37:29'),
(12, 'Bong', 'Engelke', 'bong@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeDMOLNzQvreBFBQNNQc0hJ8RAee7d05K', '06606 123 123', 1, 3, 0, '2017-08-23 14:52:55', '2017-08-27 07:38:05'),
(13, 'Ludie', 'Lincoln', 'ludie@test.com', '$2y$10$xCyVL42QLX622jcZf8koeej0ge9LmJruht6JuxAdEREDO0txmw9gy', '05505 888 888', 2, 1, 0, '2017-08-23 14:54:12', '2017-08-26 13:24:42'),
(15, 'Elizabeth', 'Oren', 'elizabeth@test.com', '$2y$10$xCyVL42QLX622jcZf8koeebPQX1svw3HANErab3F55VK.V5UoUxji', '02343 454 454', 2, 3, 0, '2017-08-23 15:02:35', '2017-08-26 13:37:57'),
(16, 'Marcell', 'Goates', 'marcell@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeazguwsbqCpdArajafm7ltCIGYUC3W1y', '04556 343 343', 1, 3, 0, '2017-08-23 15:03:28', '2017-08-26 13:38:09'),
(17, 'Dia', 'Schlagel', 'dia@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeVj3rbWiv/5YtxQ3IbFwljDySUSWdLOm', '04343 943 943', 2, 3, 0, '2017-08-23 15:05:48', '2017-08-26 13:38:20'),
(19, 'Marc', 'Dittmar', 'marc@test.com', '$2y$10$xCyVL42QLX622jcZf8koeewgSSpt25muH9ZQQh5TJeBrqJCIWvhJq', '01220 677 688', 1, 2, 0, '2017-08-23 15:10:25', '2017-08-26 13:25:13'),
(20, 'Gayla', 'Coombes', 'gayla@test.com', '$2y$10$xCyVL42QLX622jcZf8koeefNQ7t3Nnzycst90GQZLiabjv6cDPOTu', '07880 345 555', 2, 3, 0, '2017-08-23 15:11:38', '2017-08-26 13:38:29'),
(21, 'Kristy', 'Spake', 'kristy@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeVSHN3439Nny3rdu2/xP8eifDJfZJnk6', '08989 123 321', 2, 3, 0, '2017-08-23 15:12:28', '2017-08-26 13:38:38'),
(24, 'Tasha', 'Gobble', 'tasha@test.com', '$2y$10$xCyVL42QLX622jcZf8koeetz8geNDnSvwAb8JMjhoKHzIqCQhOZti', '06549 909 909', 2, 3, 0, '2017-08-23 15:15:37', '2017-08-26 13:38:46'),
(25, 'Micaela', 'Maranto', 'micaela@test.com', '$2y$10$xCyVL42QLX622jcZf8koeesCxH46ZYg3pEhyEf.FKaOq5fzu7ylXa', '07632 567 890', 2, 3, 0, '2017-08-23 15:16:22', '2017-08-26 13:38:58'),
(26, 'Hermila', 'Julia', 'hermila@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeUucUrJ02ESK1RagWYQkcB6Mv5yfT7Uu', '09678 344 344', 2, 3, 0, '2017-08-23 15:16:59', '2017-08-26 13:39:07'),
(27, 'Carlos', 'Senn', 'carlos@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeC10TwLQC4hs8qHbhjmEPcdt4Q4wdk06', '07884 765 765', 1, 3, 0, '2017-08-23 15:19:54', '2017-08-26 13:39:18'),
(29, 'Ginette', 'Vanalien', 'ginette@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeCXONwxrmsLrAJpqko5xzXFhiA8rd8Ju', '09909 111 666', 2, 2, 0, '2017-08-23 15:21:10', '2017-08-26 13:26:45'),
(30, 'Duane', 'Holtzclaw', 'duane@test.com', '$2y$10$xCyVL42QLX622jcZf8koeec7r1evX59/wC8tG4BUhNV2OReuOkjBK', '01112 578 677', 1, 3, 0, '2017-08-23 15:21:53', '2017-08-26 13:39:29'),
(31, 'Marilou', 'Hullinger', 'marilou@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeHDX25ZPSJ/CC1hZlCvZz80kCHAIazs6', '01145 787 787', 2, 3, 0, '2017-08-23 15:22:54', '2017-08-26 13:39:41'),
(32, 'Honey', 'Defibaugh', 'honey@test.com', '$2y$10$xCyVL42QLX622jcZf8koeekKEdOhFqTSkt.9U6dxmq9MtyxyCSsRO', '01172 873 477', 2, 3, 0, '2017-08-23 15:23:35', '2017-08-26 13:39:53'),
(34, 'Claudie', 'Secord', 'claudie@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeW8w9gDEk0YqBXfcYWBkzdGmIocHsRcW', '09976 987 654', 2, 2, 0, '2017-08-23 15:25:50', '2017-08-26 13:27:34'),
(35, 'Branden', 'Mento', 'branden@test.com', '$2y$10$xCyVL42QLX622jcZf8koee7T6RWY2u93DJ7bJOviupkL14D5Gl9eO', '05434 446 688', 1, 3, 0, '2017-08-23 15:26:36', '2017-08-26 13:40:03'),
(36, 'Arnetta', 'Fiscus', 'arnetta@test.com', '$2y$10$xCyVL42QLX622jcZf8koeemJwdvUXXYps61oagvHt1mGax3.BQxO6', '08989 432 987', 2, 3, 0, '2017-08-23 15:27:13', '2017-08-26 13:40:16'),
(37, 'Wally', 'Brunet', 'wally@test.com', '$2y$10$xCyVL42QLX622jcZf8koeerd3mljLcQjt5g41XjPIkUa3cIo3yWqu', '01217 564 234', 1, 3, 0, '2017-08-23 15:29:20', '2017-08-26 13:40:26'),
(38, 'Karine', 'Farrah', 'karine@test.com', '$2y$10$xCyVL42QLX622jcZf8koee3.yS1MJ0AIpwYJEfcHkWQc93ca8ixXa', '01114 898 333', 2, 3, 0, '2017-08-23 15:30:00', '2017-08-26 13:40:36'),
(39, 'Mikki', 'Bickel', 'mikki@test.com', '$2y$10$xCyVL42QLX622jcZf8koee596b0f8w0N8esg6niBlqxjEf024SfPK', '07665 665 665', 2, 3, 0, '2017-08-23 15:30:35', '2017-08-26 13:40:44'),
(41, 'Markita', 'Whited', 'markita@test.com', '$2y$10$xCyVL42QLX622jcZf8koeegV8j.YrgIRepYjMraY5sv9BiW80yfJG', '01133 662 333', 2, 2, 0, '2017-08-23 15:32:03', '2017-08-26 13:28:01'),
(42, 'Betty', 'Mullarkey', 'betty@test.com', '$2y$10$xCyVL42QLX622jcZf8koeevhMSUwtPwIJShh1lqfmY0NRrVIpw9Fe', '05000 777 888', 2, 3, 0, '2017-08-23 15:32:58', '2017-08-26 13:40:53'),
(43, 'Ninfa', 'Stallings', 'ninfa@test.com', '$2y$10$xCyVL42QLX622jcZf8koeetlmgOAobVvuVHk5PFtHWU0aEr2nZ8j6', '01156 900 800', 2, 3, 0, '2017-08-23 15:33:38', '2017-08-26 13:41:09'),
(44, 'Lupe', 'Bondurant', 'lupe@test.com', '$2y$10$xCyVL42QLX622jcZf8koee1Q6XRH/MgIUN1Oqda6zuSB4Z3FxA6WK', '01187 233 455', 1, 3, 0, '2017-08-23 15:34:13', '2017-08-26 13:41:17'),
(46, 'Maya', 'Spruell', 'maya@test.com', '$2y$10$xCyVL42QLX622jcZf8koee26Mtny.eQ9ExL8A7DAIcAqhYTvfk872', '01164 466 266', 2, 2, 0, '2017-08-23 15:35:22', '2017-08-26 13:28:20'),
(47, 'Morris', 'Liechty', 'morris@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeoOnokHeOzT20LlI9pVpaweQ3z0QA.7C', '01132 600 322', 1, 3, 0, '2017-08-23 15:35:58', '2017-08-26 13:41:26'),
(48, 'Jeri', 'Chatterton', 'jeri@test.com', '$2y$10$xCyVL42QLX622jcZf8koee9Uwi1P/9dsHs9c4.KLP1GsAzr4AdUQu', '07665 665 665', 2, 3, 0, '2017-08-23 15:36:31', '2017-08-26 13:41:34'),
(49, 'Elsy', 'Peoples', 'elsy@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeRhd7rRzLaev7jOlfSSefF5pniOL2F9C', '04521 211 311', 2, 3, 0, '2017-08-23 15:37:56', '2017-08-26 13:41:44'),
(51, 'Era', 'Champion', 'era@test.com', '$2y$10$xCyVL42QLX622jcZf8koeenC6zOPQylot8zLWArdvaeXwCidE3wdy', '03445 776 512', 2, 2, 0, '2017-08-23 15:39:04', '2017-08-26 13:28:37'),
(52, 'Carolyn', 'Hodgkins', 'carolyn@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeZznzQzRoFI6pjDUlgB.e9bec.piPNaC', '07645 388 543', 2, 2, 0, '2017-08-23 15:39:41', '2017-08-26 13:28:47'),
(53, 'Whitney', 'Corona', 'whitney@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeiRzwpasHFXVaUdKFrZjKk15/cQoK/ly', '01182 377 921', 1, 3, 0, '2017-08-23 15:40:20', '2017-08-26 13:41:54'),
(54, 'Cassie', 'Stors', 'cassie@test.com', '$2y$10$xCyVL42QLX622jcZf8koeesgRkQdd54Zd37SidOaf/PrRnttNFx6y', '07660 655 234', 2, 3, 0, '2017-08-23 15:40:58', '2017-08-26 13:42:06'),
(55, 'Petrina', 'Trollinger', 'petrina@test.com', '$2y$10$xCyVL42QLX622jcZf8koee/Zdt/cZyVZM524eM7nJ44.1.NkrDxzK', '09554 555 222', 2, 3, 0, '2017-08-23 15:41:36', '2017-08-26 13:42:15'),
(56, 'Josiah', 'Molander', 'josiah@test.com', '$2y$10$xCyVL42QLX622jcZf8koee2u2O1bpUWO9GbTbH7a0ddqnnTfJdoke', '07324 324 324', 1, 2, 0, '2017-08-23 15:42:15', '2017-08-26 13:28:59'),
(57, 'Armandina', 'Rost', 'armandina@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeRY2dMyJmgWmEU2vuyy/otj1gpo0ywfq', '06689 001 563', 2, 3, 0, '2017-08-23 15:42:56', '2017-08-26 13:42:28'),
(58, 'Elly', 'Peake', 'elly@test.com', '$2y$10$xCyVL42QLX622jcZf8koeeju4se6WAHUfXRTLW9N5XjzhjRJ2rzKK', '05771 864 224', 2, 3, 0, '2017-08-23 15:43:40', '2017-08-26 13:42:36'),
(62, 'Bilbo', 'Baggins', 'bilbo@test.com', '$2y$10$xCyVL42QLX622jcZf8koeefSoP8c5WnovZ8cd17MSHwdk116gv7pa', '02333 889 990', 1, 3, 0, '2017-08-24 14:47:31', '2017-08-27 07:38:26');


--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `hairdresser_id`, `day_id`, `start_time`, `end_time`, `first_date`, `last_date`, `created_at`, `changed_at`) VALUES
(2, 1, 1, '10:00:00', '14:00:00', '2017-01-01', '2018-12-31', '2017-08-25 09:54:50', '2017-08-25 09:59:10'),
(3, 1, 1, '15:00:00', '17:00:00', '2017-01-01', '2017-12-31', '2017-08-27 07:34:56', '2017-08-27 07:34:56'),
(4, 1, 2, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-08-27 07:35:57', '2017-08-27 07:35:57'),
(5, 1, 2, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 07:36:46', '2017-08-27 07:36:46'),
(8, 1, 4, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-08-27 07:42:11', '2017-08-27 07:42:11'),
(9, 1, 4, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 07:43:05', '2017-08-27 07:43:05'),
(10, 1, 5, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-08-27 07:43:45', '2017-08-27 07:43:45'),
(11, 1, 5, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 07:44:16', '2017-08-27 07:44:16'),
(12, 1, 6, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-08-27 07:44:56', '2017-08-27 07:44:56'),
(13, 1, 6, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 07:45:34', '2017-08-27 07:45:34'),
(14, 1, 7, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-08-27 07:46:46', '2017-08-27 07:46:46'),
(15, 1, 7, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 07:47:09', '2017-08-27 07:47:09'),
(16, 13, 1, '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', '2017-08-27 07:48:32', '2017-08-27 07:48:32'),
(17, 13, 1, '14:00:00', '17:00:00', '2017-01-01', '2017-12-31', '2017-08-27 07:49:41', '2017-08-27 07:49:41'),
(18, 13, 2, '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', '2017-08-27 07:56:12', '2017-08-27 07:56:12'),
(19, 13, 2, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 07:56:40', '2017-08-27 07:56:40'),
(20, 13, 4, '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', '2017-08-27 07:57:21', '2017-08-27 07:57:21'),
(21, 13, 4, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 07:57:49', '2017-08-27 07:57:49'),
(22, 13, 5, '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', '2017-08-27 07:58:23', '2017-08-27 07:59:45'),
(23, 13, 5, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:00:29', '2017-08-27 08:00:29'),
(24, 13, 6, '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:01:12', '2017-08-27 08:01:12'),
(25, 13, 6, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:01:44', '2017-08-27 08:01:44'),
(26, 13, 7, '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:02:21', '2017-08-27 08:02:21'),
(27, 13, 7, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:03:02', '2017-08-27 08:03:02'),
(28, 19, 2, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:04:34', '2017-08-27 08:04:34'),
(29, 19, 2, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:05:28', '2017-08-27 08:05:28'),
(30, 19, 4, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:06:03', '2017-08-27 08:06:03'),
(31, 19, 4, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:09:26', '2017-08-27 08:09:26'),
(32, 19, 5, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:10:11', '2017-08-27 08:10:11'),
(33, 19, 5, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:11:48', '2017-08-27 08:11:48'),
(34, 19, 6, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:13:45', '2017-08-27 08:13:45'),
(35, 19, 6, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:14:36', '2017-08-27 08:14:36'),
(36, 19, 7, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:15:35', '2017-08-27 08:15:35'),
(37, 19, 7, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:16:20', '2017-08-27 08:16:20'),
(38, 29, 2, '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:17:31', '2017-08-27 08:17:31'),
(39, 29, 2, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:18:08', '2017-08-27 08:18:08'),
(40, 29, 4, '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:18:34', '2017-08-27 08:18:34'),
(41, 29, 4, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:19:34', '2017-08-27 08:19:34'),
(42, 29, 5, '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:20:01', '2017-08-27 08:20:01'),
(43, 29, 5, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:20:24', '2017-08-27 08:20:24'),
(44, 29, 6, '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:20:49', '2017-08-27 08:20:49'),
(45, 29, 6, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:21:16', '2017-08-27 08:21:16'),
(46, 29, 7, '10:00:00', '13:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:21:56', '2017-08-27 08:21:56'),
(47, 29, 7, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:22:18', '2017-08-27 08:22:18'),
(48, 34, 1, '10:00:00', '15:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:25:18', '2017-08-27 08:25:18'),
(49, 34, 4, '11:00:00', '16:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:25:50', '2017-08-27 08:25:50'),
(50, 34, 5, '11:00:00', '16:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:26:55', '2017-08-27 08:26:55'),
(51, 34, 6, '11:00:00', '16:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:27:27', '2017-08-27 08:27:27'),
(52, 34, 7, '11:00:00', '16:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:28:00', '2017-08-27 08:28:00'),
(53, 41, 1, '12:00:00', '17:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:28:41', '2017-08-27 08:28:41'),
(54, 41, 4, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:29:17', '2017-08-27 08:29:17'),
(55, 41, 5, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:29:51', '2017-08-27 08:29:51'),
(56, 41, 6, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:30:20', '2017-08-27 08:30:20'),
(57, 41, 7, '14:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:31:14', '2017-08-27 08:31:14'),
(58, 46, 1, '11:00:00', '15:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:36:53', '2017-08-27 08:36:53'),
(59, 46, 6, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:37:25', '2017-08-27 08:37:25'),
(60, 46, 7, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:38:06', '2017-08-27 08:38:06'),
(61, 51, 1, '12:00:00', '16:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:38:48', '2017-08-27 08:38:48'),
(62, 51, 6, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:39:15', '2017-08-27 08:39:15'),
(63, 51, 7, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:39:41', '2017-08-27 08:39:41'),
(64, 52, 2, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:40:11', '2017-08-27 08:40:11'),
(65, 52, 5, '10:00:00', '14:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:40:41', '2017-08-27 08:40:41'),
(66, 56, 2, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:41:12', '2017-08-27 08:41:12'),
(67, 56, 5, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:41:33', '2017-08-27 08:41:33'),
(68, 56, 6, '15:00:00', '19:00:00', '2017-01-01', '2017-12-31', '2017-08-27 08:41:55', '2017-08-27 08:41:55');


-- Test SQL query
SELECT COUNT(*) FROM bookings WHERE
`client_id` = 42 AND 
`booking_date` > '2017-08-28';


