DROP TABLE IF EXISTS content;
DROP TABLE IF EXISTS calendarUsers;
DROP TABLE IF EXISTS calendarDoors;


CREATE SCHEMA IF NOT EXISTS `mul18` DEFAULT CHARACTER SET utf8 ;
USE `mul18` ;

CREATE TABLE IF NOT EXISTS `mul18`.`calendarUsers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `pwhash` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mul18`.`calendarDoors` (
  `idCalendarDoors` INT NOT NULL AUTO_INCREMENT,
  `doorNumber` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCalendarDoors`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mul18`.`content` (
  `idContent` INT NOT NULL AUTO_INCREMENT,
  `titleContent` LONGTEXT NOT NULL,
  `descContent` LONGTEXT NOT NULL,
  `imgNameContent` LONGTEXT NOT NULL,
  `calendarUsers_id` INT NOT NULL,
  `calendarDoors_idCalendarDoors` INT NOT NULL,
	PRIMARY KEY (`idContent`),
	INDEX `fk_content_users_idx` (`calendarUsers_id` ASC),
	INDEX `fk_content_calendarDoors1_idx` (`calendarDoors_idCalendarDoors` ASC),
	CONSTRAINT `fk_content_users`
		FOREIGN KEY (`calendarUsers_id`)
		REFERENCES `mul18`.`calendarUsers` (`id`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION,
	CONSTRAINT `fk_content_calendarDoors1`
		FOREIGN KEY (`calendarDoors_idCalendarDoors`)
		REFERENCES `mul18`.`calendarDoors` (`idCalendarDoors`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION)
ENGINE = InnoDB;

SELECT * FROM calendarUsers;
