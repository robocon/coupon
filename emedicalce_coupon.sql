/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50731
Source Host           : localhost:3306
Source Database       : emedicalce_coupon

Target Server Type    : MYSQL
Target Server Version : 50731
File Encoding         : 65001

Date: 2022-11-15 09:36:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) DEFAULT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `morning` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `afternoon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', null, '0854436279', 'นรุตมา วัชรกิจ', null, null, null, null);
INSERT INTO `users` VALUES ('2', null, '0991416219', 'วรยศ วัชรจิระกุล', null, null, null, null);
INSERT INTO `users` VALUES ('3', null, '0839708624', 'ชาตรี จันทรเพ็ญ', null, null, null, null);
INSERT INTO `users` VALUES ('4', null, '0936710671', 'ปิยะพัทธ์ ก้องวัฒนะกุล', null, null, null, null);
INSERT INTO `users` VALUES ('5', null, '0859661296', 'ภาคภูมิ ศิริวรภัทร', null, null, null, null);
INSERT INTO `users` VALUES ('6', null, '0880755421', 'ปัถย์ ธรรมวงศ์', null, null, null, null);
INSERT INTO `users` VALUES ('7', null, '0987396571', 'ตุลย์ พัฒน์ธนโกศล', null, null, null, null);
INSERT INTO `users` VALUES ('8', null, '0840228468', 'จิรณัฐ โชตวาณิช', null, null, null, null);
INSERT INTO `users` VALUES ('9', null, '0859566719', 'กุลนิภา วัชรจิระกุล', null, null, null, null);
INSERT INTO `users` VALUES ('10', null, '0810213441', 'พงษกรณ์ อินทรเกียรติ', null, null, null, null);
INSERT INTO `users` VALUES ('11', null, '0949253631', 'ชนินี รุ่งรัศมีทรัพย์', null, null, null, null);
INSERT INTO `users` VALUES ('12', null, '0773094988', 'กนกพงศ์ เผ่ารอด', null, null, null, null);
INSERT INTO `users` VALUES ('13', null, '0850534156', 'พีรยา ธนากานต์', null, null, null, null);
INSERT INTO `users` VALUES ('14', null, '0857413697', 'มาริสา วรภัทรศิริสกุล', null, null, null, null);
INSERT INTO `users` VALUES ('15', null, '0968506775', 'ภาสกร ศิริวรภัทร', null, null, null, null);
