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
  `hairdresser_id` INT(11) NULL DEFAULT NULL ,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `changed_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;