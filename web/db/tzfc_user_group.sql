
-- -----------------------------------------------------
-- Table `tzfc_db`.`Tab_UserGroup` data
-- -----------------------------------------------------
INSERT INTO `tzfc_db`.`Tab_UserGroup`(`gid`, `group_name`, `level`) VALUES (1, '超级管理员', 10000);
INSERT INTO `tzfc_db`.`Tab_UserGroup`(`gid`, `group_name`, `level`) VALUES (2, '老板', 9999);
INSERT INTO `tzfc_db`.`Tab_UserGroup`(`gid`, `group_name`, `level`) VALUES (3, '经纪人', 1);




-- -----------------------------------------------------
-- Table `tzfc_db`.`Tab_Operation` data
-- -----------------------------------------------------
INSERT INTO `tzfc_db`.`Tab_Operation`(`opid`, `op_name`, `min_level`) VALUES (1, '管理用户', 10000);
INSERT INTO `tzfc_db`.`Tab_Operation`(`opid`, `op_name`, `min_level`) VALUES (2, '管理经纪人', 9999);
INSERT INTO `tzfc_db`.`Tab_Operation`(`opid`, `op_name`, `min_level`) VALUES (3, '房源信息管理', 1);
INSERT INTO `tzfc_db`.`Tab_Operation`(`opid`, `op_name`, `min_level`) VALUES (4, '修改个人信息', 0);


-- -----------------------------------------------------
-- Table `tzfc_db`.`Tab_User` data yytest
-- -----------------------------------------------------
INSERT INTO `tzfc_db`.`Tab_User`(`uid`, `user_name`, `true_name`, `password`, `contact_mobile`, `qqchat`, `email`, `salt`) VALUES (1, 'admin', 'YY', '3544d4b0fd2d2f47ec793359b3d626a6', '15221543209', '574879667', 'yy15151877621@126.com', '3RzQxs');


-- -----------------------------------------------------
-- Table `tzfc_db`.`Tab_UserGroup_has_Tab_User` data
-- -----------------------------------------------------
INSERT INTO `tzfc_db`.`Tab_UserGroup_has_Tab_User`(`gid`, `uid`) VALUES (1, 1);

