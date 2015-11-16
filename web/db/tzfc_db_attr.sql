-- MySQL Script generated by MySQL Workbench
-- Mon Nov 16 23:22:54 2015
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema tzfc_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tzfc_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tzfc_db` DEFAULT CHARACTER SET utf8 ;
USE `tzfc_db` ;

-- -----------------------------------------------------
-- Table `tzfc_db`.`Tab_HouseAttrs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tzfc_db`.`Tab_HouseAttrs` ;

CREATE TABLE IF NOT EXISTS `tzfc_db`.`Tab_HouseAttrs` (
  `haid` INT NOT NULL AUTO_INCREMENT,
  `attr_name` VARCHAR(100) NULL,
  `option_values` VARCHAR(1000) NULL,
  `multi_enabled` TINYINT NULL DEFAULT 0,
  `create_time` DATETIME NULL,
  `update_time` DATETIME NULL,
  PRIMARY KEY (`haid`));


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
USE `tzfc_db`;

DELIMITER $$

USE `tzfc_db`$$
DROP TRIGGER IF EXISTS `tzfc_db`.`Tab_HouseAttrs_BEFORE_INSERT` $$
USE `tzfc_db`$$
CREATE TRIGGER `tzfc_db`.`Tab_HouseAttrs_BEFORE_INSERT` BEFORE INSERT ON `Tab_HouseAttrs` FOR EACH ROW
BEGIN
 set @temp_now = now(); set new.`create_time` = @temp_now ; set new.`update_time` = @temp_now ;
END$$


USE `tzfc_db`$$
DROP TRIGGER IF EXISTS `tzfc_db`.`Tab_HouseAttrs_BEFORE_UPDATE` $$
USE `tzfc_db`$$
CREATE TRIGGER `tzfc_db`.`Tab_HouseAttrs_BEFORE_UPDATE` BEFORE UPDATE ON `Tab_HouseAttrs` FOR EACH ROW
BEGIN
set new.`update_time` = now() ;
END$$


DELIMITER ;