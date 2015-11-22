-- MySQL Script generated by MySQL Workbench
-- Wed Nov 18 23:35:54 2015
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
-- Table `tzfc_db`.`Tab_Area`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tzfc_db`.`Tab_Area` ;

CREATE TABLE IF NOT EXISTS `tzfc_db`.`Tab_Area` (
  `aid` INT NOT NULL AUTO_INCREMENT COMMENT '区域ID',
  `area_name` VARCHAR(45) NULL COMMENT '区域名',
  `create_time` DATETIME NULL,
  `update_time` DATETIME NULL,
  PRIMARY KEY (`aid`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tzfc_db`.`Tab_Community`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tzfc_db`.`Tab_Community` ;

CREATE TABLE IF NOT EXISTS `tzfc_db`.`Tab_Community` (
  `cid` INT UNIQUE NOT NULL AUTO_INCREMENT COMMENT '小区ID',
  `cname` VARCHAR(45) NULL COMMENT '小区名',
  `pinyin` VARCHAR(45) NULL COMMENT '拼音首字母',
  `create_time` DATETIME NULL,
  `update_time` DATETIME NULL,
  PRIMARY KEY (`cid`));

USE `tzfc_db` ;


-- -----------------------------------------------------
-- View `tzfc_db`.`view_community`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `tzfc_db`.`view_community` ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
USE `tzfc_db`;

DELIMITER $$

USE `tzfc_db`$$
DROP TRIGGER IF EXISTS `tzfc_db`.`Tab_Area_BEFORE_INSERT` $$
USE `tzfc_db`$$
CREATE TRIGGER `tzfc_db`.`Tab_Area_BEFORE_INSERT` BEFORE INSERT ON `Tab_Area` FOR EACH ROW
BEGIN
set @temp_now = now(); set new.`create_time` = @temp_now ; set new.`update_time` = @temp_now ;
END$$


USE `tzfc_db`$$
DROP TRIGGER IF EXISTS `tzfc_db`.`Tab_Area_BEFORE_UPDATE` $$
USE `tzfc_db`$$
CREATE TRIGGER `tzfc_db`.`Tab_Area_BEFORE_UPDATE` BEFORE UPDATE ON `Tab_Area` FOR EACH ROW
BEGIN
set new.`update_time` = now() ;
END$$


USE `tzfc_db`$$
DROP TRIGGER IF EXISTS `tzfc_db`.`Tab_Community_BEFORE_INSERT` $$
USE `tzfc_db`$$
CREATE TRIGGER `tzfc_db`.`Tab_Community_BEFORE_INSERT` BEFORE INSERT ON `Tab_Community` FOR EACH ROW
BEGIN
set @temp_now = now(); set new.`create_time` = @temp_now ; set new.`update_time` = @temp_now ;
END$$


USE `tzfc_db`$$
DROP TRIGGER IF EXISTS `tzfc_db`.`Tab_Community_BEFORE_UPDATE` $$
USE `tzfc_db`$$
CREATE TRIGGER `tzfc_db`.`Tab_Community_BEFORE_UPDATE` BEFORE UPDATE ON `Tab_Community` FOR EACH ROW
BEGIN
set new.`update_time` = now() ;
END$$


DELIMITER ;
