/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : test

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 24/05/2022 12:08:45
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for employees
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees`  (
  `empID` int(11) NOT NULL AUTO_INCREMENT,
  `empBadgenumber` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `empUsername` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `empPassword` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `empFNameTH` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `empLNameTH` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `empFNameEN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `empLNameEN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `empGender` varchar(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `empEmail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `empPhone` int(10) NULL DEFAULT NULL,
  `empStrDT` datetime(0) NULL DEFAULT NULL,
  `empLevel` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `empDepID` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'DepartmentID',
  `empPosID` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'PositionID',
  `empMajorID` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'MajorID',
  `empBirthday` datetime(0) NULL DEFAULT NULL,
  `empImage` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `empType` int(1) NULL DEFAULT NULL,
  `empRegBy` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `empRegDT` datetime(0) NULL DEFAULT NULL,
  `empEdtBy` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `empEdtDT` datetime(0) NULL DEFAULT NULL,
  `empStatus` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`empID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES (1, '2298', 'ict013', 'kq4au2', 'กนต์ธร', 'โทนทรัพย์', 'konthorn', 'thonsap', 'M', NULL, 2143, '2022-04-01 09:58:06', NULL, NULL, NULL, NULL, NULL, '2298.jpg', 8, '2298', '2022-05-05 09:58:06', NULL, NULL, 1);
INSERT INTO `employees` VALUES (2, '1442', 'ict008', 'ph4dd6', 'กฤษฎา', 'อนันตะ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2298', '2022-05-09 13:08:57', NULL, NULL, 1);
INSERT INTO `employees` VALUES (3, '1444', 'ict009', 'ph634k', 'สุจินต์', 'สุกกล้า', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2298', '2022-05-09 13:08:57', NULL, NULL, 1);

SET FOREIGN_KEY_CHECKS = 1;
