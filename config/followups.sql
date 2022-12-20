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

 Date: 24/05/2022 12:09:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for followups
-- ----------------------------
DROP TABLE IF EXISTS `followups`;
CREATE TABLE `followups`  (
  `fu_id` int(11) NOT NULL AUTO_INCREMENT,
  `empBadgenumber` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fu_numfollows` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fu_insBy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fu_insDt` datetime(0) NULL DEFAULT NULL,
  `fu_upBy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fu_upDt` datetime(0) NULL DEFAULT NULL,
  `fu_status` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`fu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of followups
-- ----------------------------
INSERT INTO `followups` VALUES (1, '2298', '78', '2298', '2022-05-03 16:30:10', NULL, NULL, 1);
INSERT INTO `followups` VALUES (2, '2298', '73', '2298', '2022-05-05 16:35:59', NULL, NULL, 1);
INSERT INTO `followups` VALUES (3, '2298', '64', '2298', '2022-05-06 16:33:57', NULL, NULL, 1);
INSERT INTO `followups` VALUES (4, '2298', '87', '2298', '2022-05-09 12:36:23', '2298', '2022-05-09 17:11:44', 9);
INSERT INTO `followups` VALUES (5, '2298', '110', '2298', '2022-05-09 16:54:22', NULL, NULL, 1);
INSERT INTO `followups` VALUES (6, '2298', '33', '2298', '2022-05-09 17:01:18', '2298', '2022-05-09 17:11:29', 9);
INSERT INTO `followups` VALUES (7, '2298', '606', '2298', '2022-05-11 11:05:56', '2298', '2022-05-11 11:09:17', 9);
INSERT INTO `followups` VALUES (8, '2298', '1', '2298', '2022-05-11 11:11:20', '2298', '2022-05-11 11:13:24', 9);
INSERT INTO `followups` VALUES (9, '2298', '2', '2298', '2022-05-11 11:11:23', '2298', '2022-05-11 11:13:21', 9);
INSERT INTO `followups` VALUES (10, '2298', '3', '2298', '2022-05-11 11:11:26', '2298', '2022-05-11 11:13:20', 9);
INSERT INTO `followups` VALUES (11, '2298', '4', '2298', '2022-05-11 11:11:31', '2298', '2022-05-11 11:13:18', 9);
INSERT INTO `followups` VALUES (12, '2298', '5', '2298', '2022-05-11 11:11:34', '2298', '2022-05-11 11:13:16', 9);
INSERT INTO `followups` VALUES (13, '2298', '56', '2298', '2022-05-11 11:11:40', '2298', '2022-05-11 11:13:14', 9);
INSERT INTO `followups` VALUES (14, '2298', '74455', '2298', '2022-05-11 11:11:42', '2298', '2022-05-11 11:20:14', 9);
INSERT INTO `followups` VALUES (15, '2298', '100', '2298', '2022-05-11 16:15:20', NULL, NULL, 1);
INSERT INTO `followups` VALUES (16, '2298', '72', '2298', '2022-05-12 16:51:25', NULL, NULL, 1);
INSERT INTO `followups` VALUES (17, '2298', '134', '2298', '2022-05-17 16:39:40', NULL, NULL, 1);
INSERT INTO `followups` VALUES (18, '2298', '72', '2298', '2022-05-18 16:22:54', NULL, NULL, 1);
INSERT INTO `followups` VALUES (19, '2298', '70', '2298', '2022-05-20 18:15:35', NULL, NULL, 1);
INSERT INTO `followups` VALUES (20, '2298', '113', '2298', '2022-05-23 16:25:05', NULL, NULL, 1);

SET FOREIGN_KEY_CHECKS = 1;
