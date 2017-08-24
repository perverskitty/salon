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