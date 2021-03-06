-- MySQL Script generated by MySQL Workbench
-- Tue Nov 24 15:13:46 2015
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
-- Table `tzfc_db`.`Tab_SellHouse`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tzfc_db`.`Tab_SellHouse` ;

CREATE TABLE IF NOT EXISTS `tzfc_db`.`Tab_SellHouse` (
  `hid` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(500) NULL,
  `rooms` TINYINT UNSIGNED NULL DEFAULT 0 COMMENT '几室几厅几卫',
  `halls` TINYINT UNSIGNED NULL DEFAULT 0 COMMENT '几室几厅几卫',
  `bathrooms` TINYINT UNSIGNED NULL DEFAULT 0 COMMENT '几室几厅几卫',
  `size` MEDIUMINT UNSIGNED NULL DEFAULT 0 COMMENT '面积',
  `price` DECIMAL(6,2) UNSIGNED NULL DEFAULT 0.00 COMMENT '价格的值',
  `unit_price` DECIMAL(6,0) UNSIGNED NULL DEFAULT 0,
  `community` VARCHAR(45) NULL,
  `cid` INT NULL COMMENT '小区ID',
  `aid` INT NULL COMMENT '区域ID',
  `floors` SMALLINT NULL DEFAULT 0 COMMENT '楼层',
  `floors_total` SMALLINT NULL DEFAULT 0 COMMENT '总层数',
  `house_type` TINYINT UNSIGNED NULL DEFAULT 0,
  `decor` TINYINT UNSIGNED NULL DEFAULT 0,
  `orientation` TINYINT UNSIGNED NULL DEFAULT 0,
  `rights_len` TINYINT UNSIGNED NULL DEFAULT 0,
  `rights_type` TINYINT UNSIGNED NULL DEFAULT 0,
  `rights_from` SMALLINT UNSIGNED NULL,
  `primary_school` VARCHAR(100) NULL,
  `junior_school` VARCHAR(100) NULL,
  `images` VARCHAR(10000) NULL,
  `details` TEXT NULL COMMENT '详情',
  `create_time` DATETIME NULL,
  `update_time` DATETIME NULL,
  `uid` INT NOT NULL COMMENT '用户ID',
  PRIMARY KEY (`hid`),
  CONSTRAINT `fk_Tab_SellHouse_Tab_User1`
    FOREIGN KEY (`uid`)
    REFERENCES `tzfc_db`.`Tab_User` (`uid`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Tab_SellHouse_Tab_User1_idx` ON `tzfc_db`.`Tab_SellHouse` (`uid` ASC);

CREATE INDEX `INDEX_Tab_SellHouse_HOUSE_TYPE` ON `tzfc_db`.`Tab_SellHouse` (`rooms` ASC, `halls` ASC, `bathrooms` ASC);

CREATE INDEX `INDEX_Tab_SellHouse_UpdateTime` ON `tzfc_db`.`Tab_SellHouse` (`update_time` DESC);


-- -----------------------------------------------------
-- Table `tzfc_db`.`Tab_RentHouse`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tzfc_db`.`Tab_RentHouse` ;

CREATE TABLE IF NOT EXISTS `tzfc_db`.`Tab_RentHouse` (
  `hid` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(500) NULL,
  `rooms` TINYINT UNSIGNED NULL DEFAULT 0,
  `halls` TINYINT UNSIGNED NULL DEFAULT 0,
  `bathrooms` TINYINT UNSIGNED NULL DEFAULT 0,
  `size` MEDIUMINT UNSIGNED NULL DEFAULT 0 COMMENT '面积',
  `price` DECIMAL(7,0) UNSIGNED NULL DEFAULT 0 COMMENT '价格的值',
  `rent_type` TINYINT UNSIGNED NULL DEFAULT 0 COMMENT '出租方式',
  `rentpay_type` TINYINT UNSIGNED NULL DEFAULT 0 COMMENT '租金缴纳方式',
  `support_device` VARCHAR(200) NULL,
  `community` VARCHAR(45) NULL,
  `cid` INT NULL,
  `aid` INT NULL,
  `floors` SMALLINT NULL DEFAULT 0 COMMENT '楼层',
  `floors_total` SMALLINT NULL DEFAULT 0 COMMENT '总层数',
  `house_type` TINYINT UNSIGNED NULL DEFAULT 0,
  `decor` TINYINT UNSIGNED NULL DEFAULT 0,
  `orientation` TINYINT UNSIGNED NULL DEFAULT 0,
  `images` VARCHAR(10000) NULL,
  `details` TEXT NULL COMMENT '详情',
  `create_time` DATETIME NULL,
  `update_time` DATETIME NULL,
  `uid` INT NOT NULL,
  PRIMARY KEY (`hid`),
  CONSTRAINT `fk_Tab_RentHouse_Tab_User1`
    FOREIGN KEY (`uid`)
    REFERENCES `tzfc_db`.`Tab_User` (`uid`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Tab_RentHouse_Tab_User1_idx` ON `tzfc_db`.`Tab_RentHouse` (`uid` ASC);

CREATE INDEX `INDEX_Tab_RentHouse_HOUSE_TYPE` ON `tzfc_db`.`Tab_RentHouse` (`rooms` ASC, `halls` ASC, `bathrooms` ASC);

CREATE INDEX `INDEX_Tab_RentHouse_UpdateTime` ON `tzfc_db`.`Tab_RentHouse` (`update_time` DESC);



USE `tzfc_db`;

DELIMITER $$

USE `tzfc_db`$$
DROP TRIGGER IF EXISTS `tzfc_db`.`Tab_SellHouse_BEFORE_INSERT` $$
USE `tzfc_db`$$
CREATE TRIGGER `tzfc_db`.`Tab_SellHouse_BEFORE_INSERT` BEFORE INSERT ON `Tab_SellHouse` FOR EACH ROW
BEGIN
set @temp_now = now(); set new.`create_time` = @temp_now ; set new.`update_time` = @temp_now ;
END$$


USE `tzfc_db`$$
DROP TRIGGER IF EXISTS `tzfc_db`.`Tab_SellHouse_BEFORE_UPDATE` $$
USE `tzfc_db`$$
CREATE DEFINER = CURRENT_USER TRIGGER `tzfc_db`.`Tab_SellHouse_BEFORE_UPDATE` BEFORE UPDATE ON `Tab_SellHouse` FOR EACH ROW
BEGIN
set new.`update_time` = now() ;
END$$


USE `tzfc_db`$$
DROP TRIGGER IF EXISTS `tzfc_db`.`Tab_RentHouse_BEFORE_INSERT` $$
USE `tzfc_db`$$
CREATE TRIGGER `tzfc_db`.`Tab_RentHouse_BEFORE_INSERT` BEFORE INSERT ON `Tab_RentHouse` FOR EACH ROW
BEGIN
set @temp_now = now(); set new.`create_time` = @temp_now ; set new.`update_time` = @temp_now ;
END$$


USE `tzfc_db`$$
DROP TRIGGER IF EXISTS `tzfc_db`.`Tab_RentHouse_BEFORE_UPDATE` $$
USE `tzfc_db`$$
CREATE DEFINER = CURRENT_USER TRIGGER `tzfc_db`.`Tab_RentHouse_BEFORE_UPDATE` BEFORE UPDATE ON `Tab_RentHouse` FOR EACH ROW
BEGIN
set new.`update_time` = now() ;
END$$


DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;









/*
-- Query: SELECT * FROM tzfc_db.Tab_SellHouse
LIMIT 0, 1000

-- Date: 2016-01-22 15:00
*/
INSERT INTO `Tab_SellHouse` (`title`,`rooms`,`halls`,`bathrooms`,`size`,`price`,`unit_price`,`community`,`cid`,`aid`,`floors`,`floors_total`,`house_type`,`decor`,`orientation`,`rights_len`,`rights_type`,`rights_from`,`primary_school`,`junior_school`,`images`,`details`,`uid`) VALUES ('教工三村 (1室1厅1卫) 44㎡',1,1,1,44,44.00,10000,'',16,0,0,0,0,0,0,0,0,0,'','',NULL,'aaaa&aaaa\n\nsda\nds\n\na',2);
INSERT INTO `Tab_SellHouse` (`title`,`rooms`,`halls`,`bathrooms`,`size`,`price`,`unit_price`,`community`,`cid`,`aid`,`floors`,`floors_total`,`house_type`,`decor`,`orientation`,`rights_len`,`rights_type`,`rights_from`,`primary_school`,`junior_school`,`images`,`details`,`uid`) VALUES ('[城西] 水岸豪庭 (3室2厅2卫 毛胚) 222㎡',3,2,2,222,250.00,12000,'',9,5,4,6,1,1,2,1,1,2015,'XX小学','XX中学',NULL,'地段好；\n很牛逼的',2);
INSERT INTO `Tab_SellHouse` (`title`,`rooms`,`halls`,`bathrooms`,`size`,`price`,`unit_price`,`community`,`cid`,`aid`,`floors`,`floors_total`,`house_type`,`decor`,`orientation`,`rights_len`,`rights_type`,`rights_from`,`primary_school`,`junior_school`,`images`,`details`,`uid`) VALUES ('[其他地区] 东河阳光 (2室1厅1卫 中装) 88㎡',2,1,1,88,50.00,7999,'',10,7,1,5,0,3,2,1,0,0,'','',NULL,'',2);
INSERT INTO `Tab_SellHouse` (`title`,`rooms`,`halls`,`bathrooms`,`size`,`price`,`unit_price`,`community`,`cid`,`aid`,`floors`,`floors_total`,`house_type`,`decor`,`orientation`,`rights_len`,`rights_type`,`rights_from`,`primary_school`,`junior_school`,`images`,`details`,`uid`) VALUES ('[城西] 财富广场 (1室1厅1卫 高装) 60㎡ 出售',1,1,1,60,30.00,5000,'',17,5,5,5,4,4,0,0,0,0,'','',NULL,'',2);



/*
-- Query: SELECT * FROM tzfc_db.Tab_RentHouse
LIMIT 0, 1000

-- Date: 2016-01-14 13:06
*/
INSERT INTO `Tab_RentHouse` (`title`,`rooms`,`halls`,`bathrooms`,`size`,`price`,`rent_type`,`rentpay_type`,`support_device`,`community`,`cid`,`aid`,`floors`,`floors_total`,`house_type`,`decor`,`orientation`,`details`,`uid`) VALUES ('[其他地区] 供电新苑 (2室2厅2卫 毛胚) 222㎡ 出租',2,2,2,222,1999,2,0,NULL,'',24,7,0,0,1,1,2,'我们都是中国人',2);
INSERT INTO `Tab_RentHouse` (`title`,`rooms`,`halls`,`bathrooms`,`size`,`price`,`rent_type`,`rentpay_type`,`support_device`,`community`,`cid`,`aid`,`floors`,`floors_total`,`house_type`,`decor`,`orientation`,`details`,`uid`) VALUES ('[市区] 森园小区 (1室 简装) 50㎡ 出租',1,0,0,50,2000,1,8,NULL,'',13,1,-1,10,5,2,0,'地下一楼仓库',2);
INSERT INTO `Tab_RentHouse` (`title`,`rooms`,`halls`,`bathrooms`,`size`,`price`,`rent_type`,`rentpay_type`,`support_device`,`community`,`cid`,`aid`,`floors`,`floors_total`,`house_type`,`decor`,`orientation`,`details`,`uid`) VALUES ('[城中] 鹏欣丽都 (2室2厅2卫 中装) 100㎡ 出租',2,2,2,100,600,3,2,NULL,'',15,2,6,10,1,3,2,'床位出租啦~~~~',2);


