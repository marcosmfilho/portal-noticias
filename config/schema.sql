-- MySQL Script generated by MySQL Workbench
-- dom 18 nov 2018 21:03:30 BRT
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema portal_noticias
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `portal_noticias` ;

-- -----------------------------------------------------
-- Schema portal_noticias
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `portal_noticias` DEFAULT CHARACTER SET utf8 ;
USE `portal_noticias` ;

-- -----------------------------------------------------
-- Table `portal_noticias`.`notices_status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `portal_noticias`.`notices_status` ;

CREATE TABLE IF NOT EXISTS `portal_noticias`.`notices_status` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name_status` VARCHAR(45) NULL,
  `date_created` DATETIME NULL DEFAULT NOW(),
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `portal_noticias`.`notices`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `portal_noticias`.`notices` ;

CREATE TABLE IF NOT EXISTS `portal_noticias`.`notices` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `author` VARCHAR(45) NOT NULL,
  `title` VARCHAR(200) NOT NULL,
  `body` VARCHAR(2000) NOT NULL,
  `image` VARCHAR(200) NULL,
  `date_created` DATETIME NOT NULL DEFAULT NOW(),
  `date_updated` DATETIME NULL,
  `notices_status_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_notices_notices_status_idx` (`notices_status_id` ASC),
  CONSTRAINT `fk_notices_notices_status`
    FOREIGN KEY (`notices_status_id`)
    REFERENCES `portal_noticias`.`notices_status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `portal_noticias`.`notices_status`
-- -----------------------------------------------------
START TRANSACTION;
USE `portal_noticias`;
INSERT INTO `portal_noticias`.`notices_status` (`id`, `name_status`, `date_created`) VALUES (1, 'Normal', NULL);
INSERT INTO `portal_noticias`.`notices_status` (`id`, `name_status`, `date_created`) VALUES (2, 'Deleted', NULL);

COMMIT;

