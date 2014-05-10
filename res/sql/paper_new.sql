/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : paper

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2014-05-08 18:23:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `collect_paper`
-- ----------------------------
DROP TABLE IF EXISTS `collect_paper`;
CREATE TABLE `collect_paper` (
  `id` bigint(20) NOT NULL COMMENT '收藏id',
  `u_id` bigint(20) NOT NULL COMMENT '用户id',
  `p_id` bigint(20) NOT NULL COMMENT '论文id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of collect_paper
-- ----------------------------

-- ----------------------------
-- Table structure for `p_user`
-- ----------------------------
DROP TABLE IF EXISTS `p_user`;
CREATE TABLE `p_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `name` varchar(25) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `role` int(2) DEFAULT '1' COMMENT '用户角色,1为普通用户，2为管理员，3为超级管理员',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '用户状态,0表示正常，1表示被删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_user
-- ----------------------------
INSERT INTO `p_user` VALUES ('1', 'pop59461', 'a7f053668add73a2864be1adb2fe9e73', '2', '0');

-- ----------------------------
-- Table structure for `thesis`
-- ----------------------------
DROP TABLE IF EXISTS `thesis`;
CREATE TABLE `thesis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '论文id',
  `publisher_id` int(2) NOT NULL COMMENT '发布者',
  `number` varchar(100) NOT NULL COMMENT '编号',
  `title` varchar(200) NOT NULL COMMENT '标题',
  `author` varchar(200) NOT NULL COMMENT '作者',
  `leader` varchar(100) NOT NULL COMMENT '导师',
  `university` varchar(200) NOT NULL COMMENT '学校',
  `college` varchar(200) NOT NULL COMMENT '学院',
  `specialty` varchar(200) NOT NULL COMMENT '专业',
  `research` varchar(200) NOT NULL COMMENT '研究方向',
  `summary` text NOT NULL COMMENT '论文简介',
  `attachment` varchar(200) NOT NULL COMMENT '附件地址',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '审核状态,0为审核中,1为审核通过,2为删除',
  `click` int(5) NOT NULL DEFAULT '0' COMMENT '点击量',
  `time` datetime NOT NULL COMMENT '论文发表时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of thesis
-- ----------------------------
INSERT INTO `thesis` VALUES ('1', '1', '20130801/6', '电离层频高图数据实时发布系统的研究', '丁桂元', '何翔教授', '中南民族大学', '等离子体物理', '等离子体物理', '应用程序软件开发', '我是简介', '', '1', '0', '0000-00-00 00:00:00');
