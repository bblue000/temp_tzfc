-- MySQL Script generated by MySQL Workbench
-- 11/01/15 14:03:14
-- Model: New Model    Version: 1.0
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema tzfc_db
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `tzfc_db` ;
CREATE SCHEMA IF NOT EXISTS `tzfc_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `tzfc_db` ;

-- -----------------------------------------------------
-- Table `tzfc_db`.`Tab_UserGroup`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tzfc_db`.`Tab_UserGroup` ;

CREATE TABLE IF NOT EXISTS `tzfc_db`.`Tab_UserGroup` (
  `gid` INT NOT NULL AUTO_INCREMENT COMMENT '组ID',
  `group_name` VARCHAR(45) NULL COMMENT '用户组名',
  `level` INT NULL DEFAULT 0 COMMENT '用户的等级，等级越高，权限越大',
  `create_time` DATETIME NULL,
  `update_time` DATETIME NULL,
  PRIMARY KEY (`gid`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `level_Tab_UserGroup_UNIQUE` ON `tzfc_db`.`Tab_UserGroup` (`level` ASC);


-- -----------------------------------------------------
-- Table `tzfc_db`.`Tab_User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tzfc_db`.`Tab_User` ;

CREATE TABLE IF NOT EXISTS `tzfc_db`.`Tab_User` (
  `uid` INT NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `user_name` VARCHAR(30) NULL COMMENT '用户名',
  `true_name` VARCHAR(45) NULL DEFAULT '顾客' COMMENT '用户真实姓名，如张三',
  `password` VARCHAR(50) NULL COMMENT '用户的密码',
  `salt` VARCHAR(50) NULL COMMENT '用户密码的盐值',
  `sex` TINYINT NULL COMMENT '用户性别',
  `contact_tel` VARCHAR(50) NULL COMMENT '联系方式',
  `contact_mobile` VARCHAR(50) NULL COMMENT '联系方式',
  `qqchat` VARCHAR(30) NULL COMMENT 'QQ号',
  `email` VARCHAR(256) NULL COMMENT '邮箱',
  `address` VARCHAR(200) NULL COMMENT '联系地址',
  `avatar` VARCHAR(500) NULL COMMENT '头像',
  `create_time` DATETIME NULL,
  `update_time` DATETIME NULL,
  PRIMARY KEY (`uid`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `user_name_Tab_User_UNIQUE` ON `tzfc_db`.`Tab_User` (`user_name` ASC);


-- -----------------------------------------------------
-- Table `tzfc_db`.`Tab_UserGroup_has_Tab_User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tzfc_db`.`Tab_UserGroup_has_Tab_User` ;

CREATE TABLE IF NOT EXISTS `tzfc_db`.`Tab_UserGroup_has_Tab_User` (
  `gid` INT NOT NULL,
  `uid` INT NOT NULL,
  PRIMARY KEY (`gid`, `uid`),
  CONSTRAINT `fk_Tab_UserGroup_has_Tab_User_Tab_UserGroup`
    FOREIGN KEY (`gid`)
    REFERENCES `tzfc_db`.`Tab_UserGroup` (`gid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tab_UserGroup_has_Tab_User_Tab_User1`
    FOREIGN KEY (`uid`)
    REFERENCES `tzfc_db`.`Tab_User` (`uid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Tab_UserGroup_has_Tab_User_Tab_User_idx` ON `tzfc_db`.`Tab_UserGroup_has_Tab_User` (`uid` ASC);

CREATE INDEX `fk_Tab_UserGroup_has_Tab_User_Tab_UserGroup_idx` ON `tzfc_db`.`Tab_UserGroup_has_Tab_User` (`gid` ASC);


-- -----------------------------------------------------
-- Table `tzfc_db`.`Tab_Operation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tzfc_db`.`Tab_Operation` ;

CREATE TABLE IF NOT EXISTS `tzfc_db`.`Tab_Operation` (
  `opid` INT UNIQUE NOT NULL AUTO_INCREMENT,
  `op_name` VARCHAR(100) NULL,
  `min_level` INT NULL,
  `create_time` DATETIME NULL,
  `update_time` DATETIME NULL,
  PRIMARY KEY (`opid`));


-- -----------------------------------------------------
-- Table `tzfc_db`.`Tab_UserOperation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tzfc_db`.`Tab_UserOperation` ;

CREATE TABLE IF NOT EXISTS `tzfc_db`.`Tab_UserOperation` (
  `uid` INT NOT NULL,
  `opid` INT UNIQUE NOT NULL,
  PRIMARY KEY (`uid`, `opid`),
  CONSTRAINT `fk_Tab_User_has_Tab_Operation_Tab_User1`
    FOREIGN KEY (`uid`)
    REFERENCES `tzfc_db`.`Tab_User` (`uid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tab_User_has_Tab_Operation_Tab_Operation1`
    FOREIGN KEY (`opid`)
    REFERENCES `tzfc_db`.`Tab_Operation` (`opid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Tab_User_has_Tab_Operation_Tab_Operation_idx` ON `tzfc_db`.`Tab_UserOperation` (`opid` ASC);

CREATE INDEX `fk_Tab_User_has_Tab_Operation_Tab_User_idx` ON `tzfc_db`.`Tab_UserOperation` (`uid` ASC);

USE `tzfc_db`;

DELIMITER $$

USE `tzfc_db`$$
DROP TRIGGER IF EXISTS `tzfc_db`.`Tab_UserGroup_BINS` $$
USE `tzfc_db`$$
CREATE TRIGGER `Tab_UserGroup_BINS` BEFORE INSERT ON `Tab_UserGroup` FOR EACH ROW
begin set @temp_now = now(); set new.`create_time` = @temp_now ; set new.`update_time` = @temp_now ;
end;$$


USE `tzfc_db`$$
DROP TRIGGER IF EXISTS `tzfc_db`.`Tab_UserGroup_BUPD` $$
USE `tzfc_db`$$
CREATE TRIGGER `Tab_UserGroup_BUPD` BEFORE UPDATE ON `Tab_UserGroup` FOR EACH ROW
begin set new.`update_time` = now() ;
end;$$


USE `tzfc_db`$$
DROP TRIGGER IF EXISTS `tzfc_db`.`Tab_User_BINS` $$
USE `tzfc_db`$$
CREATE TRIGGER `Tab_User_BINS` BEFORE INSERT ON `Tab_User` FOR EACH ROW
begin set @temp_now = now(); set new.`create_time` = @temp_now ; set new.`update_time` = @temp_now ;
end;
$$


USE `tzfc_db`$$
DROP TRIGGER IF EXISTS `tzfc_db`.`Tab_User_BUPD` $$
USE `tzfc_db`$$
CREATE TRIGGER `Tab_User_BUPD` BEFORE UPDATE ON `Tab_User` FOR EACH ROW
begin set new.`update_time` = now() ;
end;
$$


USE `tzfc_db`$$
DROP TRIGGER IF EXISTS `tzfc_db`.`Tab_Operation_BINS` $$
USE `tzfc_db`$$
CREATE TRIGGER `Tab_Operation_BINS` BEFORE INSERT ON `Tab_Operation` FOR EACH ROW
begin set @temp_now = now(); set new.`create_time` = @temp_now ; set new.`update_time` = @temp_now ;
end;$$


USE `tzfc_db`$$
DROP TRIGGER IF EXISTS `tzfc_db`.`Tab_Operation_BUPD` $$
USE `tzfc_db`$$
CREATE TRIGGER `Tab_Operation_BUPD` BEFORE UPDATE ON `Tab_Operation` FOR EACH ROW
begin set new.`update_time` = now() ;
end;
$$


DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
