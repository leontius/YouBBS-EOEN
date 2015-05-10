-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-05-10 08:05:09
-- 服务器版本： 10.0.16-MariaDB
-- PHP Version: 5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eoen`
--

-- --------------------------------------------------------

--
-- 表的结构 `yunbbs_articles`
--

CREATE TABLE IF NOT EXISTS `yunbbs_articles` (
  `id` mediumint(8) unsigned NOT NULL,
  `cid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `ruid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `content` mediumtext NOT NULL,
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `views` int(10) unsigned NOT NULL DEFAULT '1',
  `comments` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `closecomment` tinyint(1) NOT NULL DEFAULT '0',
  `favorites` int(10) unsigned NOT NULL DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `isred` int(10) unsigned NOT NULL,
  `top` int(10) unsigned NOT NULL,
  `fop` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yunbbs_categories`
--

CREATE TABLE IF NOT EXISTS `yunbbs_categories` (
  `id` smallint(6) unsigned NOT NULL,
  `name` char(50) NOT NULL,
  `articles` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `about` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yunbbs_categories`
--

INSERT INTO `yunbbs_categories` (`id`, `name`, `articles`, `about`) VALUES
(1, '首页隐藏', 0, '这个节点下的主题不会在首页显示');

-- --------------------------------------------------------

--
-- 表的结构 `yunbbs_comments`
--

CREATE TABLE IF NOT EXISTS `yunbbs_comments` (
  `id` int(10) unsigned NOT NULL,
  `articleid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `content` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yunbbs_favorites`
--

CREATE TABLE IF NOT EXISTS `yunbbs_favorites` (
  `id` mediumint(8) unsigned NOT NULL,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `articles` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `content` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yunbbs_links`
--

CREATE TABLE IF NOT EXISTS `yunbbs_links` (
  `id` smallint(6) unsigned NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `url` varchar(200) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yunbbs_links`
--

INSERT INTO `yunbbs_links` (`id`, `name`, `url`) VALUES
(1, 'YouBBS', 'http://youbbs.sinaapp.com'),
(2, 'EOEN', 'https://www.eoen.org/');

-- --------------------------------------------------------

--
-- 表的结构 `yunbbs_qqweibo`
--

CREATE TABLE IF NOT EXISTS `yunbbs_qqweibo` (
  `id` mediumint(8) unsigned NOT NULL,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(20) NOT NULL DEFAULT '',
  `openid` char(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yunbbs_settings`
--

CREATE TABLE IF NOT EXISTS `yunbbs_settings` (
  `title` varchar(50) NOT NULL DEFAULT '',
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yunbbs_settings`
--

INSERT INTO `yunbbs_settings` (`title`, `value`) VALUES
('name', 'eoen'),
('site_des', 'Proudly Powered by YouBBS'),
('site_create', '0'),
('icp', ''),
('admin_email', ''),
('home_shownum', '20'),
('list_shownum', '20'),
('newest_node_num', '20'),
('hot_node_num', '20'),
('bot_node_num', '100'),
('article_title_max_len', '60'),
('article_content_max_len', '3000'),
('article_post_space', '60'),
('reg_ip_space', '3600'),
('comment_min_len', '4'),
('comment_max_len', '1200'),
('commentlist_num', '32'),
('comment_post_space', '20'),
('close', '0'),
('close_note', '数据调整中'),
('authorized', '0'),
('register_review', '0'),
('close_register', '0'),
('close_upload', '0'),
('ext_list', ''),
('img_shuiyin', '0'),
('show_debug', '1'),
('jquery_lib', '/static/js/jquery-1.11.3.min.js'),
('head_meta', ''),
('analytics_code', ''),
('safe_imgdomain', ''),
('upyun_domain', ''),
('upyun_user', ''),
('upyun_pw', ''),
('ad_post_top', ''),
('ad_post_bot', ''),
('ad_sider_top', ''),
('ad_web_bot', ''),
('main_nodes', '1'),
('spam_words', ''),
('qq_scope', 'get_user_info'),
('qq_appid', ''),
('qq_appkey', ''),
('wb_key', ''),
('wb_secret', '');

-- --------------------------------------------------------

--
-- 表的结构 `yunbbs_users`
--

CREATE TABLE IF NOT EXISTS `yunbbs_users` (
  `id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL DEFAULT '',
  `flag` tinyint(2) NOT NULL DEFAULT '0',
  `avatar` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `password` char(32) NOT NULL,
  `email` varchar(40) NOT NULL,
  `url` varchar(75) NOT NULL,
  `articles` int(10) unsigned NOT NULL DEFAULT '0',
  `replies` int(10) unsigned NOT NULL DEFAULT '0',
  `regtime` int(10) unsigned NOT NULL DEFAULT '0',
  `lastposttime` int(10) unsigned NOT NULL DEFAULT '0',
  `lastreplytime` int(10) unsigned NOT NULL DEFAULT '0',
  `about` text NOT NULL,
  `notic` text NOT NULL,
  `gauthsecret` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yunbbs_weibo`
--

CREATE TABLE IF NOT EXISTS `yunbbs_weibo` (
  `id` mediumint(8) unsigned NOT NULL,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(20) NOT NULL DEFAULT '',
  `openid` char(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `yunbbs_articles`
--
ALTER TABLE `yunbbs_articles`
  ADD PRIMARY KEY (`id`), ADD KEY `cid` (`cid`), ADD KEY `edittime` (`edittime`), ADD KEY `uid` (`uid`);

--
-- Indexes for table `yunbbs_categories`
--
ALTER TABLE `yunbbs_categories`
  ADD PRIMARY KEY (`id`), ADD KEY `articles` (`articles`);

--
-- Indexes for table `yunbbs_comments`
--
ALTER TABLE `yunbbs_comments`
  ADD PRIMARY KEY (`id`), ADD KEY `articleid` (`articleid`);

--
-- Indexes for table `yunbbs_favorites`
--
ALTER TABLE `yunbbs_favorites`
  ADD PRIMARY KEY (`id`), ADD KEY `uid` (`uid`);

--
-- Indexes for table `yunbbs_links`
--
ALTER TABLE `yunbbs_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yunbbs_qqweibo`
--
ALTER TABLE `yunbbs_qqweibo`
  ADD PRIMARY KEY (`id`), ADD KEY `uid` (`uid`), ADD KEY `openid` (`openid`);

--
-- Indexes for table `yunbbs_settings`
--
ALTER TABLE `yunbbs_settings`
  ADD PRIMARY KEY (`title`);

--
-- Indexes for table `yunbbs_users`
--
ALTER TABLE `yunbbs_users`
  ADD PRIMARY KEY (`id`), ADD KEY `name` (`name`);

--
-- Indexes for table `yunbbs_weibo`
--
ALTER TABLE `yunbbs_weibo`
  ADD PRIMARY KEY (`id`), ADD KEY `uid` (`uid`), ADD KEY `openid` (`openid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `yunbbs_articles`
--
ALTER TABLE `yunbbs_articles`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `yunbbs_categories`
--
ALTER TABLE `yunbbs_categories`
  MODIFY `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `yunbbs_comments`
--
ALTER TABLE `yunbbs_comments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `yunbbs_favorites`
--
ALTER TABLE `yunbbs_favorites`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `yunbbs_links`
--
ALTER TABLE `yunbbs_links`
  MODIFY `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `yunbbs_qqweibo`
--
ALTER TABLE `yunbbs_qqweibo`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `yunbbs_users`
--
ALTER TABLE `yunbbs_users`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `yunbbs_weibo`
--
ALTER TABLE `yunbbs_weibo`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
