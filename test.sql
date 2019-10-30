/*
Navicat MySQL Data Transfer

Source Server         : 我的电脑
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-10-29 11:01:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for wc_admin
-- ----------------------------
DROP TABLE IF EXISTS `wc_admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(60) NOT NULL DEFAULT '',
  `role_id` int(11) NOT NULL DEFAULT '0' COMMENT '角色ID',
  `source_id` int(3) NOT NULL DEFAULT '0' COMMENT '来源',
  `mid` int(11) NOT NULL DEFAULT '0' COMMENT '商户号',
  `merchat` int(11) NOT NULL DEFAULT '0' COMMENT '子商户号',
  `agentpay_mid` int(11) NOT NULL DEFAULT '0' COMMENT '代付商户号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wc_admin
-- ----------------------------
INSERT INTO `wc_admin` VALUES ('1', 'admin', '25f9e794323b453885f5181f1b624d0b', '1', '0', '0', '0', '0');
INSERT INTO `wc_admin` VALUES ('2', 'touzhudan', '$2y$13$qMYOmdi6txeijXMzOMIzJedQ.0JGkTYqqQqhSp5ET1rTvSh0ke8My', '2', '0', '0', '0', '0');
INSERT INTO `wc_admin` VALUES ('3', '159', '$2y$13$uFdloUu9fOx43gqYEb0FtusCLVi7w0umtWgtet6rbthf2pOS1GdXG', '8', '1005', '20000068', '0', '0');
INSERT INTO `wc_admin` VALUES ('4', 'liujian_test', '$2y$13$yrf2QRzxDspHcY74hCtp7ecPNB.RtOnbItrvgVRXPw9kruPZIXR6a', '8', '1005', '10003', '0', '0');

-- ----------------------------
-- Table structure for wc_banner
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `wc_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_name` varchar(255) NOT NULL DEFAULT '' COMMENT '名称',
  `banner_url` varchar(255) NOT NULL DEFAULT '' COMMENT 'URL',
  `banner_link` varchar(255) NOT NULL DEFAULT '' COMMENT '链接',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `sorting` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wc_banner
-- ----------------------------
INSERT INTO `wc_banner` VALUES ('6', '123', 'upload/1.jpg', '456', '1', '1572317670', '0', '0');
