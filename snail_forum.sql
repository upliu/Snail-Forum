-- phpMyAdmin SQL Dump
-- version 4.4.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-06-07 11:35:43
-- 服务器版本： 5.6.23-log
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `snail_forum`
--

-- --------------------------------------------------------

--
-- 表的结构 `snail_forum_board`
--

CREATE TABLE IF NOT EXISTS `snail_forum_board` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `display_order` smallint(10) unsigned NOT NULL DEFAULT '0',
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  `count_topic` int(10) unsigned NOT NULL DEFAULT '0',
  `count_post` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` int(11) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL DEFAULT '0',
  `last_topic_id` int(10) unsigned NOT NULL DEFAULT '0',
  `last_topic_title` varchar(50) NOT NULL DEFAULT '',
  `last_post_id` int(11) unsigned NOT NULL DEFAULT '0',
  `last_publish_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最近一次发帖或者回复的时间',
  `col_num` tinyint(4) NOT NULL DEFAULT '1',
  `icon` varchar(255) NOT NULL DEFAULT '',
  `path` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `snail_forum_board`
--

INSERT INTO `snail_forum_board` (`id`, `name`, `display_order`, `pid`, `count_topic`, `count_post`, `created_at`, `updated_at`, `last_topic_id`, `last_topic_title`, `last_post_id`, `last_publish_time`, `col_num`, `icon`, `path`) VALUES
(4, '新闻', 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 1, '/img/board-icon-default.gif', ''),
(5, '国内', 0, 4, 0, 0, 0, 0, 0, '', 0, 0, 1, '/img/board-icon-default.gif', ''),
(6, '国际', 0, 4, 0, 0, 0, 0, 0, '', 0, 0, 1, '/img/board-icon-default.gif', ''),
(7, '社会', 0, 4, 0, 0, 0, 0, 0, '', 0, 0, 1, '/img/board-icon-default.gif', ''),
(8, '民生', 0, 4, 0, 0, 0, 0, 0, '', 0, 0, 1, '/img/board-icon-default.gif', ''),
(9, '体育', 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 1, '/img/board-icon-default.gif', ''),
(10, 'CBA', 0, 9, 0, 0, 0, 0, 0, '', 0, 0, 1, '/img/board-icon-default.gif', ''),
(11, 'NBA', 0, 9, 0, 0, 0, 0, 0, '', 0, 0, 1, '/img/board-icon-default.gif', ''),
(12, '羽毛球', 0, 9, 0, 0, 0, 0, 0, '', 0, 0, 1, '/img/board-icon-default.gif', ''),
(13, '足球', 0, 9, 0, 0, 0, 0, 0, '', 0, 0, 1, '/img/board-icon-default.gif', ''),
(14, '乒乓球', 0, 9, 0, 0, 0, 0, 0, '', 0, 0, 1, '/img/board-icon-default.gif', ''),
(15, '篮球', 0, 9, 0, 0, 0, 0, 0, '', 0, 0, 1, '/img/board-icon-default.gif', ''),
(16, '自行车', 0, 9, 0, 0, 0, 0, 0, '', 0, 0, 1, '/img/board-icon-default.gif', ''),
(17, '滑板', 0, 9, 0, 0, 0, 0, 0, '', 0, 0, 1, '/img/board-icon-default.gif', ''),
(18, '湖北羽毛球', 0, 12, 0, 0, 0, 0, 0, '', 0, 0, 1, '/img/board-icon-default.gif', '[12]'),
(19, '湖南羽毛球', 0, 12, 0, 0, 0, 0, 0, '', 0, 0, 1, '/img/board-icon-default.gif', ''),
(20, '江西羽毛球', 0, 12, 0, 0, 0, 0, 0, '', 0, 0, 1, '/img/board-icon-default.gif', ''),
(21, '广东羽毛球', 0, 12, 0, 0, 0, 0, 0, '', 0, 0, 1, '/img/board-icon-default.gif', ''),
(22, '浙江羽毛球', 0, 12, 0, 0, 0, 0, 0, '', 0, 0, 1, '/img/board-icon-default.gif', ''),
(23, '广西羽毛球', 0, 12, 0, 0, 0, 0, 0, '', 0, 0, 1, '/img/board-icon-default.gif', ''),
(24, '北京羽毛球', 0, 12, 0, 0, 0, 0, 0, '', 0, 0, 1, '/img/board-icon-default.gif', ''),
(25, '襄阳羽毛球', 0, 18, 0, 0, 0, 0, 0, '', 0, 0, 1, '/img/board-icon-default.gif', '[12,18]'),
(26, '荆州羽毛球', 0, 18, 0, 0, 0, 0, 0, '', 0, 0, 1, '/img/board-icon-default.gif', '[12,18]');

-- --------------------------------------------------------

--
-- 表的结构 `snail_forum_config`
--

CREATE TABLE IF NOT EXISTS `snail_forum_config` (
  `key` varchar(50) NOT NULL DEFAULT '',
  `value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `snail_forum_post`
--

CREATE TABLE IF NOT EXISTS `snail_forum_post` (
  `id` int(11) unsigned NOT NULL,
  `topic_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `snail_forum_topic`
--

CREATE TABLE IF NOT EXISTS `snail_forum_topic` (
  `id` int(11) unsigned NOT NULL,
  `board_id` int(11) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` int(11) unsigned NOT NULL,
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0',
  `is_top` tinyint(10) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `is_locked` tinyint(11) NOT NULL DEFAULT '0',
  `author_id` int(10) unsigned NOT NULL,
  `author_username` varchar(255) NOT NULL DEFAULT '',
  `last_post_time` int(11) NOT NULL DEFAULT '0',
  `last_post_user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `last_post_username` varchar(255) NOT NULL DEFAULT '',
  `count_view` int(11) NOT NULL DEFAULT '0',
  `count_post` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `snail_forum_topic`
--

INSERT INTO `snail_forum_topic` (`id`, `board_id`, `title`, `content`, `created_at`, `updated_at`, `is_top`, `is_deleted`, `is_locked`, `author_id`, `author_username`, `last_post_time`, `last_post_user_id`, `last_post_username`, `count_view`, `count_post`) VALUES
(1, 25, '你好', '<p>哈哈</p>', 1433639570, 1433639570, 0, 0, 0, 6, 'admin', 0, 0, '', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `snail_forum_user`
--

CREATE TABLE IF NOT EXISTS `snail_forum_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `snail_forum_user`
--

INSERT INTO `snail_forum_user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `avatar`) VALUES
(1, '刘静', 'dvL7sTuS5zosoLKlgFADP8TqIE-6ktV_', '$2y$13$dp2Vk.YWtmk8X5VOHNoMDupW9vrOGHXjewCUCdTp2PXHhWWR5kY9q', '', 'liujing@qq.com', 10, 1432478506, 1432478506, ''),
(2, '刘静2', 'EkvFYwFl60vyM9eCN-cBFiundBKNa_G8', '$2y$13$ULOTTUMkzZrQVnFoN8EizOSUudFzbGJSfBc9kI/0Qzj5tGZ8O0Dx2', '', 'liujing2@qq.com', 10, 1432479043, 1432479043, ''),
(3, '刘静3', 'Zt0UwIxyR_ckKy2FTyTyA9cNDz_fDshd', '$2y$12$Q4YReOMYuW29gNI2DNPF.uFOdt/5Dml5K3IWB53Jjq7DDXvB/cbEG', '', 'liujing3@qq.com', 10, 1432479207, 1432479207, ''),
(4, '刘静4', '8HMKnL96Bjd5ADK6vbhFTxyHwso_Zmk9', '$2y$10$f3g1Kxg2S2OCCW6ORq7lVOGbwWLMAZsEPbnu8ynYO8CHkakZiD9La', '', 'liujing4@qq.com', 10, 1432479250, 1432479250, ''),
(5, '刘静5', '_4PD5C6hEuO4yT4q1iWSGpkgi4hnpvoZ', '$2y$10$2X/KoFY99yiArwsD2HYSGuZ9D/0pT8FNRKWRYlmVIpLjLYExa2ZB2', '', 'liujing5@qq.com', 10, 1432479335, 1432479335, ''),
(6, 'admin', 'PHX8Obdo-BhvLP_GiDpCFPlOK6aMQoR5', '$2y$10$7XFnmPo1b4QwJjih05GeiOJroskxAlJ9/Fip7DolxNTAY8wO7rEV6', '', 'admin@qq.com', 10, 1432600310, 1432600310, ''),
(7, 'zhangsan', '6EpXTo-ikyUPKbu0jKsYMpiSmEvq_3vA', '$2y$10$t1dFkK6JWjSSIXfGkbpTreVuMdII6Hp94yCT9RDTvaMKM7rYB5kM2', '', 'zhangsan@qq.com', 10, 1432703605, 1432703605, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `snail_forum_board`
--
ALTER TABLE `snail_forum_board`
  ADD PRIMARY KEY (`id`),
  ADD KEY `display_order` (`display_order`);

--
-- Indexes for table `snail_forum_config`
--
ALTER TABLE `snail_forum_config`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `snail_forum_post`
--
ALTER TABLE `snail_forum_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `snail_forum_topic`
--
ALTER TABLE `snail_forum_topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `snail_forum_user`
--
ALTER TABLE `snail_forum_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `snail_forum_board`
--
ALTER TABLE `snail_forum_board`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `snail_forum_post`
--
ALTER TABLE `snail_forum_post`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `snail_forum_topic`
--
ALTER TABLE `snail_forum_topic`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `snail_forum_user`
--
ALTER TABLE `snail_forum_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
