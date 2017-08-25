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
  `hairdresser_id` INT(11) NULL ,
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








