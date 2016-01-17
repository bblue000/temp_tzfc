
-- -----------------------------------------------------
-- Table `tzfc_db`.`Tab_UserGroup` data
-- -----------------------------------------------------
INSERT INTO `tzfc_db`.`Tab_UserGroup`(`group_name`, `level`) VALUES ('超级管理员', 10000);
INSERT INTO `tzfc_db`.`Tab_UserGroup`(`group_name`, `level`) VALUES ('老板', 9999);
INSERT INTO `tzfc_db`.`Tab_UserGroup`(`group_name`, `level`) VALUES ('经纪人', 1);




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
INSERT INTO `tzfc_db`.`Tab_User`(`user_name`, `true_name`, `password`, `contact_mobile`, `qqchat`, `email`, `salt`, `sex`, `permission`) VALUES ('yy', 'YY', '3544d4b0fd2d2f47ec793359b3d626a6', '15221543209', '574879667', 'yy15151877621@126.com', '3RzQxs', '1', '0');
INSERT INTO `tzfc_db`.`Tab_User`(`user_name`, `true_name`, `password`, `contact_mobile`, `qqchat`, `email`, `salt`, `sex`, `permission`) VALUES ('yyyy', 'YY1', '3544d4b0fd2d2f47ec793359b3d626a6', '15221543209', '574879667', 'yy15151877621@126.com', '3RzQxs', '1', '1');
INSERT INTO `tzfc_db`.`Tab_User`(`user_name`, `true_name`, `password`, `contact_mobile`, `qqchat`, `email`, `salt`, `sex`) VALUES ('yunr', 'YY2', '3544d4b0fd2d2f47ec793359b3d626a6', '15221543209', '574879667', 'yy15151877621@126.com', '3RzQxs', '0');


-- -----------------------------------------------------
-- Table `tzfc_db`.`Tab_UserGroup_has_Tab_User` data
-- -----------------------------------------------------
INSERT INTO `tzfc_db`.`Tab_UserGroup_has_Tab_User`(`gid`, `uid`) VALUES (1, 1);
