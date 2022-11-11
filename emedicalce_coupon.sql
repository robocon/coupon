/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 80017
Source Host           : localhost:3306
Source Database       : emedicalce_coupon

Target Server Type    : MYSQL
Target Server Version : 80017
File Encoding         : 65001

Date: 2022-11-11 08:27:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) DEFAULT NULL,
  `phone` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `test1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `morning` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `afternoon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_regis` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_coupon` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', null, '2508544928', 'นรุตมา วัชรกิจ', null, null, null, null, null, 'y', null);
INSERT INTO `users` VALUES ('2', null, '9991416219', 'วรยศ วัชรจิระกุล', null, null, null, null, null, null, null);
INSERT INTO `users` VALUES ('3', null, '3839708624', 'ชาตรี จันทรเพ็ญ', null, null, null, null, null, null, null);
INSERT INTO `users` VALUES ('4', null, '9936710671', 'ปิยะพัทธ์ ก้องวัฒนะกุล', null, null, null, null, null, null, null);
INSERT INTO `users` VALUES ('5', null, '2099661296', 'ภาคภูมิ ศิริวรภัทร', null, null, null, null, null, 'y', null);
INSERT INTO `users` VALUES ('6', null, '8080755421', 'ปัถย์ ธรรมวงศ์', null, null, null, null, null, null, null);
INSERT INTO `users` VALUES ('7', null, '6987396571', 'ตุลย์ พัฒน์ธนโกศล', null, null, null, null, null, null, null);
INSERT INTO `users` VALUES ('8', null, '5840228468', 'จิรณัฐ โชตวาณิช', null, null, null, null, null, null, null);
INSERT INTO `users` VALUES ('9', null, '7199566719', 'กุลนิภา วัชรจิระกุล', null, null, null, null, null, null, null);
INSERT INTO `users` VALUES ('10', null, '4810213441', 'พงษกรณ์ อินทรเกียรติ', null, null, null, null, null, null, null);
INSERT INTO `users` VALUES ('11', null, '9949253631', 'ชนินี รุ่งรัศมีทรัพย์', null, null, null, null, null, 'y', null);
INSERT INTO `users` VALUES ('12', null, '7773094988', 'กนกพงศ์ เผ่ารอด', null, null, null, null, null, null, null);
INSERT INTO `users` VALUES ('13', null, '9300534156', 'พีรยา ธนากานต์', null, null, null, null, null, 'y', null);
INSERT INTO `users` VALUES ('14', null, '1177413697', 'มาริสา วรภัทรศิริสกุล', null, null, null, null, null, 'y', null);
INSERT INTO `users` VALUES ('15', null, '4968506775', 'ภาสกร ศิริวรภัทร', null, null, null, null, null, null, null);
INSERT INTO `users` VALUES ('23', null, '1509900231', 'กิตงาย', null, null, null, null, null, 'y', 'y');
INSERT INTO `users` VALUES ('24', null, '3213213241', 'นายทดสอบ จะจ๊ะ', null, null, null, null, null, 'y', null);
INSERT INTO `users` VALUES ('25', null, '5555555', 'asdkfjlkasdjfl', null, null, null, null, null, 'y', null);
INSERT INTO `users` VALUES ('26', null, '6666666', 'l;skd;fks;l', null, null, null, null, null, 'y', null);
