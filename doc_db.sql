/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 50739 (5.7.39)
 Source Host           : localhost:3308
 Source Schema         : doc_db

 Target Server Type    : MySQL
 Target Server Version : 50739 (5.7.39)
 File Encoding         : 65001

 Date: 26/07/2023 09:40:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_department
-- ----------------------------
DROP TABLE IF EXISTS `tbl_department`;
CREATE TABLE `tbl_department` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `d_name` varchar(100) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_department
-- ----------------------------
BEGIN;
INSERT INTO `tbl_department` (`d_id`, `d_name`) VALUES (7, 'marketing');
INSERT INTO `tbl_department` (`d_id`, `d_name`) VALUES (8, 'it dev');
INSERT INTO `tbl_department` (`d_id`, `d_name`) VALUES (9, 'hr');
INSERT INTO `tbl_department` (`d_id`, `d_name`) VALUES (10, 'it support');
COMMIT;

-- ----------------------------
-- Table structure for tbl_doc_file
-- ----------------------------
DROP TABLE IF EXISTS `tbl_doc_file`;
CREATE TABLE `tbl_doc_file` (
  `fileID` varchar(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `t_id` int(11) NOT NULL,
  `doc_file` varchar(200) NOT NULL,
  `date_get` date NOT NULL,
  `date_up` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_username` varchar(20) NOT NULL,
  `d_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`fileID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_doc_file
-- ----------------------------
BEGIN;
INSERT INTO `tbl_doc_file` (`fileID`, `filename`, `t_id`, `doc_file`, `date_get`, `date_up`, `m_username`, `d_id`, `qty`, `status`) VALUES ('1200', 'trx', 2, '192073518720230725_165953.xlsx', '2023-07-25', '2023-07-25 23:59:53', 'diw', 7, NULL, NULL);
INSERT INTO `tbl_doc_file` (`fileID`, `filename`, `t_id`, `doc_file`, `date_get`, `date_up`, `m_username`, `d_id`, `qty`, `status`) VALUES ('3200', 'butget', 1, '145019048320230725_170045.xlsx', '2023-07-25', '2023-07-26 00:00:45', 'didi', 9, NULL, NULL);
INSERT INTO `tbl_doc_file` (`fileID`, `filename`, `t_id`, `doc_file`, `date_get`, `date_up`, `m_username`, `d_id`, `qty`, `status`) VALUES ('8899', 'null', 3, '113377052820230725_170240.pdf', '2023-07-26', '2023-07-26 00:02:40', 'toto', 10, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for tbl_member
-- ----------------------------
DROP TABLE IF EXISTS `tbl_member`;
CREATE TABLE `tbl_member` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `m_username` varchar(100) NOT NULL,
  `m_password` varchar(100) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `d_id` varchar(100) NOT NULL COMMENT 'FK tbl_department',
  `m_level` text NOT NULL,
  `m_img` int(11) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_member
-- ----------------------------
BEGIN;
INSERT INTO `tbl_member` (`m_id`, `m_username`, `m_password`, `m_name`, `d_id`, `m_level`, `m_img`) VALUES (1, 'king', '12345678', 'amnath', '', 'boss', 104926);
COMMIT;

-- ----------------------------
-- Table structure for tbl_type
-- ----------------------------
DROP TABLE IF EXISTS `tbl_type`;
CREATE TABLE `tbl_type` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_name` varchar(100) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_type
-- ----------------------------
BEGIN;
INSERT INTO `tbl_type` (`t_id`, `t_name`) VALUES (1, 'aaa');
INSERT INTO `tbl_type` (`t_id`, `t_name`) VALUES (2, 'bbb');
INSERT INTO `tbl_type` (`t_id`, `t_name`) VALUES (3, 'ccc');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
