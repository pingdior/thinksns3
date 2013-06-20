ALTER TABLE `ts_app` ADD COLUMN `add_front_top`  tinyint(1) NULL DEFAULT 1 AFTER `child_menu`;
ALTER TABLE `ts_app` ADD COLUMN `add_front_applist`  tinyint(1) NULL DEFAULT 1 AFTER `add_front_top`;
ALTER TABLE `ts_feed` ADD COLUMN `digg_count`  int(11) NULL DEFAULT 0 AFTER `comment_all_count`;
ALTER TABLE `ts_user_verified` ADD COLUMN `qq`  varchar(20) NULL DEFAULT '' AFTER `realname`;	
CREATE INDEX `status_id` ON `ts_app`(`app_id`, `status`) ;
CREATE INDEX `uid` ON `ts_credit_user`(`uid`) ;
CREATE TABLE `ts_feed_digg` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`uid`  int(11) NOT NULL ,
`feed_id`  int(11) NOT NULL ,
`cTime`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
CHECKSUM=0
ROW_FORMAT=Fixed
DELAY_KEY_WRITE=0
;
CREATE INDEX `recommend` ON `ts_feed_topic`(`recommend`, `lock`, `count`) ;
CREATE TABLE `ts_mobile_message` (
`id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
`uid`  int(11) NULL DEFAULT NULL ,
`message`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`device_type`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`ctime`  int(11) NULL DEFAULT NULL ,
`status`  tinyint(1) NULL DEFAULT 0 ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
CHECKSUM=0
ROW_FORMAT=Dynamic
DELAY_KEY_WRITE=0
;
CREATE TABLE `ts_mobile_token` (
`uid`  int(11) NULL DEFAULT NULL ,
`token`  varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL ,
`device_type`  varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL ,
`mtime`  int(11) NULL DEFAULT NULL 
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_bin
CHECKSUM=0
ROW_FORMAT=Dynamic
DELAY_KEY_WRITE=0
;
CREATE TABLE `ts_mobile_user` (
`uid`  int(11) UNSIGNED NOT NULL COMMENT '户用ID' ,
`iphone_device_token`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'iPhone的机器码（用于推送消息）' ,
`ipad_device_token`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'iPad的机器码（用于推送消息）' ,
`android_device_token`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Android的机器码（用于推送消息）' ,
`iphone_status`  tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'iPhone否是开启推送' ,
`ipad_status`  tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'iPad是开启推送' ,
`android_status`  tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Android否是开启推送' ,
`last_latitude`  float(10,6) NULL DEFAULT NULL COMMENT '经度' ,
`last_longitude`  float(10,6) NULL DEFAULT NULL COMMENT '纬度' ,
`last_checkin`  int(11) UNSIGNED NULL DEFAULT NULL COMMENT '后最签到时间（访问即签到）' ,
`nickname`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户昵称，预留匿名功能' ,
`infomation`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户简介，预留' ,
`checkin_count`  int(11) UNSIGNED NULL DEFAULT 0 COMMENT '签到次数' ,
`sex`  tinyint(1) UNSIGNED NULL DEFAULT 1 COMMENT '性别：1男、2女' ,
PRIMARY KEY (`uid`),
UNIQUE INDEX `uid` (`uid`) 
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
CHECKSUM=0
ROW_FORMAT=Dynamic
DELAY_KEY_WRITE=0
;
CREATE INDEX `status_postion` ON `ts_navi`(`status`, `position`) ;
CREATE INDEX `uid_read` ON `ts_notify_message`(`uid`, `is_read`) ;
CREATE INDEX `list_id` ON `ts_system_data`(`list`, `id`) ;
CREATE TABLE `ts_system_update` (
`id`  int(11) NOT NULL ,
`title`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`version`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`package`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`description`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`status`  tinyint(4) NULL DEFAULT 0 ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
CHECKSUM=0
ROW_FORMAT=Dynamic
DELAY_KEY_WRITE=0
;
CREATE INDEX `recommend` ON `ts_weiba`(`recommend`, `is_del`) ;
CREATE INDEX `count` ON `ts_weiba`(`is_del`, `follower_count`, `thread_count`) ;
CREATE INDEX `uid` ON `ts_weiba_follow`(`follower_uid`) ;
CREATE INDEX `id_recommend` ON `ts_weiba_post`(`recommend_time`, `weiba_id`, `recommend`) ;
CREATE INDEX `post_time` ON `ts_weiba_post`(`post_time`, `weiba_id`) ;
REPLACE INTO `ts_credit_setting` VALUES (null, 'digg_weibo', '顶微博', 'weibo', '', '1', '1');
REPLACE INTO `ts_credit_setting` VALUES (null, 'digged_weibo', '微博被顶', 'weibo', '', '6', '5');
REPLACE INTO `ts_notify_node` VALUES (null, 'digg', '微博的赞', 'public', 'digg_message_content', 'digg_message_title', '0', '1', '1');
REPLACE INTO `ts_lang` VALUES (null, 'DIGG_MESSAGE_CONTENT', 'PUBLIC', '0', '{user} 赞了你的微博:<br/>{content} <a href=\"{sourceurl}&digg=1\" target=\'_blank\'>去看看>></a>', '', '');
REPLACE INTO `ts_lang` VALUES (null, 'DIGG_MESSAGE_TITLE', 'PUBLIC', '0', '{user} 赞了你的微博', '', '');
