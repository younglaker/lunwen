-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 05 月 06 日 14:10
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `paper`
--
CREATE DATABASE IF NOT EXISTS `paper` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `paper`;

-- --------------------------------------------------------

--
-- 表的结构 `collect_paper`
--

CREATE TABLE IF NOT EXISTS `collect_paper` (
  `id` bigint(20) NOT NULL COMMENT '收藏id',
  `u_id` bigint(20) NOT NULL COMMENT '用户id',
  `p_id` bigint(20) NOT NULL COMMENT '论文id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `p_user`
--

CREATE TABLE IF NOT EXISTS `p_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `name` varchar(25) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `role` int(2) DEFAULT '1' COMMENT '用户角色,1为普通用户，2为管理员，3为超级管理员',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '用户状态,0表示正常，1表示被删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `thesis`
--

CREATE TABLE IF NOT EXISTS `thesis` (
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
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '审核状态,0为未审核，1为审核通过',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
