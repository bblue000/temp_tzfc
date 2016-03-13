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
  `wechat` VARCHAR(30) NULL COMMENT '微信号',
  `email` VARCHAR(256) NULL COMMENT '邮箱',
  `address` VARCHAR(200) NULL COMMENT '联系地址',
  `avatar` VARCHAR(500) NULL COMMENT '头像',
  `permission` TINYINT(1) NULL DEFAULT 0 COMMENT '是否有权限操作',
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
  `uid` INT NULL DEFAULT 0 COMMENT '用户ID',
  `poster_name` VARCHAR(45) NULL COMMENT '直接上传者的信息',
  `poster_contact` VARCHAR(45) NULL COMMENT '直接上传者的信息',
  PRIMARY KEY (`hid`))
ENGINE = InnoDB;

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
  PRIMARY KEY (`hid`))
ENGINE = InnoDB;

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











-- insert data
-- -----------------------------------------------------
-- Table `tzfc_db`.`Tab_UserGroup` data
-- -----------------------------------------------------
INSERT INTO `tzfc_db`.`Tab_UserGroup`(`group_name`, `level`) VALUES ('超级管理员', 10000);
INSERT INTO `tzfc_db`.`Tab_UserGroup`(`group_name`, `level`) VALUES ('老板', 9999);
INSERT INTO `tzfc_db`.`Tab_UserGroup`(`group_name`, `level`) VALUES ('经纪人', 1);
INSERT INTO `tzfc_db`.`Tab_UserGroup`(`group_name`, `level`) VALUES ('个人', 0);




-- -----------------------------------------------------
-- Table `tzfc_db`.`Tab_Operation` data
-- -----------------------------------------------------
INSERT INTO `tzfc_db`.`Tab_Operation`(`op_name`, `min_level`) VALUES ('管理用户', 10000);
INSERT INTO `tzfc_db`.`Tab_Operation`(`op_name`, `min_level`) VALUES ('管理经纪人', 9999);
INSERT INTO `tzfc_db`.`Tab_Operation`(`op_name`, `min_level`) VALUES ('房源信息管理', 1);
INSERT INTO `tzfc_db`.`Tab_Operation`(`op_name`, `min_level`) VALUES ('修改个人信息', 0);


-- -----------------------------------------------------
-- Table `tzfc_db`.`Tab_User` data yytest
-- -----------------------------------------------------
-- !+=|-_/';'.system@#$%^&*()19900615
INSERT INTO `tzfc_db`.`Tab_User`(`user_name`, `true_name`, `password`, `contact_mobile`, `qqchat`, `email`, `salt`, `sex`, `permission`) VALUES ('admin', 'YY', 'f853db4d7e78a7dfc8fcd708ec305c7e', '15221543209', '574879667', 'yy15151877621@126.com', 'lQwdhO', '1', '1');
INSERT INTO `tzfc_db`.`Tab_User`(`user_name`, `true_name`, `password`, `contact_mobile`, `qqchat`, `email`, `salt`, `sex`, `permission`) VALUES ('yy', 'YY', '3544d4b0fd2d2f47ec793359b3d626a6', '15221543209', '574879667', 'yy15151877621@126.com', '3RzQxs', '1', '1');
INSERT INTO `tzfc_db`.`Tab_User`(`user_name`, `true_name`, `password`, `contact_mobile`, `qqchat`, `email`, `salt`, `sex`, `permission`) VALUES ('yyyy', 'YY1', '3544d4b0fd2d2f47ec793359b3d626a6', '15221543209', '574879667', 'yy15151877621@126.com', '3RzQxs', '1', '0');
INSERT INTO `tzfc_db`.`Tab_User`(`user_name`, `true_name`, `password`, `contact_mobile`, `qqchat`, `email`, `salt`, `sex`) VALUES ('yunr', 'YY2', '3544d4b0fd2d2f47ec793359b3d626a6', '15221543209', '574879667', 'yy15151877621@126.com', '3RzQxs', '0');


-- -----------------------------------------------------
-- Table `tzfc_db`.`Tab_UserGroup_has_Tab_User` data
-- -----------------------------------------------------
INSERT INTO `tzfc_db`.`Tab_UserGroup_has_Tab_User`(`gid`, `uid`) VALUES (1, 1);










-- -----------------------------------------------------
-- Table `tzfc_db`.`Tab_Area` data
-- -----------------------------------------------------
INSERT INTO `tzfc_db`.`Tab_Area`(`area_name`) VALUES ('市区');
INSERT INTO `tzfc_db`.`Tab_Area`(`area_name`) VALUES ('城中');
INSERT INTO `tzfc_db`.`Tab_Area`(`area_name`) VALUES ('城东');
INSERT INTO `tzfc_db`.`Tab_Area`(`area_name`) VALUES ('城南');
INSERT INTO `tzfc_db`.`Tab_Area`(`area_name`) VALUES ('城西');
INSERT INTO `tzfc_db`.`Tab_Area`(`area_name`) VALUES ('城北');
INSERT INTO `tzfc_db`.`Tab_Area`(`area_name`) VALUES ('其他地区');




-- -----------------------------------------------------
-- Table `tzfc_db`.`Tab_Community` data
-- -----------------------------------------------------
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('美好上郡', 'mhsj');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('碧桂园', 'bgy');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('永兴花园', 'yxhy');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('祥云花园', 'xyhy');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('宏基花园', 'hjhy');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('华辰尊园', 'hczy');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('莲花六区', 'lhlq');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('莲花五区', 'lhwq');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('水岸豪庭', 'saht');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('东河阳光', 'dhyg');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('阳光新城', 'ygxc');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('稻河湾', 'dhw');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('森园小区', 'syxq');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('玉堂花园', 'ythy');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('鹏欣丽都', 'pxld');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('教工三村', 'jgsc');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('财富广场', 'cfgc');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('五一路', 'wyl');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('工人新村', 'grxc');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('福寿苑', 'fsy');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('怡和花园', 'yhhy');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('新世界花园', 'xsjhy');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('宫涵花园', 'ghhy');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('供电新苑', 'gdxy');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('西域绿洲', 'xylz');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('盛塘花苑', 'sthy');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('金水湾', 'jsw');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('莲花八区', 'lhbq');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('坡子街', 'pzj');
INSERT INTO `tzfc_db`.`Tab_Community`(`cname`, `pinyin`) VALUES ('凤城国际', 'fhfj');







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







