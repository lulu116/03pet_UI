-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 11 月 25 日 10:47
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `mypet`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id自增长',
  `admin_name` char(16) NOT NULL COMMENT '信息管理员姓名',
  `admin_passwd` char(32) NOT NULL COMMENT '管理员密码',
  `admin_tel` char(11) NOT NULL COMMENT '管理员手机号',
  `admin_loginnum` int(11) NOT NULL DEFAULT '0' COMMENT '登录次数',
  `admin_lastlogin` datetime NOT NULL COMMENT '最后一次登录时间',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员信息表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_passwd`, `admin_tel`, `admin_loginnum`, `admin_lastlogin`) VALUES
(1, '超级管理员', 'e10adc3949ba59abbe56e057f20f883e', '18419954050', 0, '2017-09-20 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id，自增长',
  `user_id` int(11) NOT NULL COMMENT '发送者id',
  `note_id` int(11) NOT NULL COMMENT '评论的帖子id',
  `cmt_content` char(128) NOT NULL COMMENT '评论的内容',
  `cmt_time` datetime NOT NULL COMMENT '评论的时间',
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `note_id`, `cmt_content`, `cmt_time`) VALUES
(24, 7, 19, '21324', '2017-11-22 11:58:42'),
(25, 7, 19, '和风格化防火防盗个胡歌封帝', '2017-11-23 09:21:01'),
(26, 7, 20, '符合国际法的还是挺好感到反感发的规范化广泛', '2017-11-23 09:21:24'),
(27, 7, 20, '发的个人特点和天然砂忍好热', '2017-11-23 09:21:35'),
(28, 7, 20, '染色各色让他噶额问题热议多个地方士大夫', '2017-11-23 09:21:45'),
(29, 7, 20, '我去饿哇了啊他了谁给他任何提示', '2017-11-23 09:21:55'),
(30, 7, 20, '啊额我热我热额太热图画图然后十分大师傅', '2017-11-23 09:22:11'),
(31, 7, 20, '让他色弱哥特哥特然后人生观第三个大概发的', '2017-11-23 09:22:25'),
(32, 7, 20, '二恶烷特瑞斯和他的', '2017-11-23 09:22:37'),
(33, 9, 21, 'fghfhgfbd', '2017-11-23 09:38:35'),
(34, 9, 21, '可爱的猫咪', '2017-11-23 09:38:48'),
(35, 9, 21, '太热特热特高复古风', '2017-11-23 09:38:59');

-- --------------------------------------------------------

--
-- 表的结构 `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id，自增长',
  `senduser_id` int(11) NOT NULL COMMENT '发送者id',
  `receiveuser_id` int(11) DEFAULT NULL COMMENT '接收者id，可以为空，为空就是为实时消息',
  `msg_content` char(128) NOT NULL COMMENT '消息内容',
  `msg_time` datetime NOT NULL COMMENT '发送时间',
  `msg_isnew` int(11) NOT NULL DEFAULT '0' COMMENT '是否是新消息，0--是，1--不是',
  `msg_belong` int(11) NOT NULL COMMENT '哪个版块的消息0--猫，1--狗，2--仓鼠',
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=74 ;

--
-- 转存表中的数据 `messages`
--

INSERT INTO `messages` (`message_id`, `senduser_id`, `receiveuser_id`, `msg_content`, `msg_time`, `msg_isnew`, `msg_belong`) VALUES
(73, 5, 6, '我是WWW', '2017-11-22 05:29:22', 1, 0),
(72, 6, 5, '我是QAQ', '2017-11-22 05:28:54', 1, 0),
(71, 5, 5, '阿三撒打发打发士大夫士大夫大师傅大师傅', '2017-11-22 05:13:29', 1, 0),
(70, 5, 5, '飒飒飒飒飒飒飒飒飒飒撒', '2017-11-22 05:06:13', 1, 0),
(69, 5, 5, '大苏打撒旦', '2017-11-22 04:31:43', 1, 0),
(68, 5, 5, '的但是犯得上反对法烦烦烦', '2017-11-22 03:21:39', 1, 0),
(67, 5, 5, '打发法发送发送', '2017-11-22 03:21:34', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `note_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id,自增长',
  `note_url` varchar(258) DEFAULT NULL COMMENT '图片url',
  `user_id` int(11) NOT NULL COMMENT '发送者id',
  `note_content` varchar(512) NOT NULL COMMENT '内容',
  `note_time` date NOT NULL COMMENT '发送时间',
  `note_type` int(11) NOT NULL COMMENT '0-show、1-ask、2-sell',
  `note_title` char(32) NOT NULL COMMENT '标题',
  `note_likes` int(11) NOT NULL DEFAULT '0' COMMENT '点赞数',
  `note_comment` int(11) NOT NULL DEFAULT '0' COMMENT '评论数',
  `belong` int(11) NOT NULL COMMENT '0-猫，1-狗，2-鼠',
  PRIMARY KEY (`note_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `note`
--

INSERT INTO `note` (`note_id`, `note_url`, `user_id`, `note_content`, `note_time`, `note_type`, `note_title`, `note_likes`, `note_comment`, `belong`) VALUES
(18, '', 6, '<p>哈哈哈哈哈哈哈哈哈哈，想不到吧，哈哈哈哈哈哈，我居然发帖了</p><p>1！！！！1</p>', '2017-11-22', 0, '这是我的第一条帖子', 1, 1, 0),
(19, 'http://192.168.0.106/mypet/uservia/catnote1.jpg', 7, '<p>21432543546</p>', '2017-11-22', 0, '21321422432', 1, 2, 0),
(20, 'http://192.168.4.117/mypet/uservia/catnote2.jpg', 7, '<p>2333234232更多v梵蒂冈反对的广泛的公司公司</p>', '2017-11-23', 0, '321324', 0, 7, 0),
(21, 'http://192.168.4.117/mypet/uservia/catnote2.jpg', 9, '<p>343546546</p>', '2017-11-23', 0, '43546', 0, 3, 0);

-- --------------------------------------------------------

--
-- 表的结构 `pets`
--

CREATE TABLE IF NOT EXISTS `pets` (
  `pet_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id,自增长',
  `pet_name` char(32) NOT NULL COMMENT '宠物名字',
  `petlord_id` int(11) NOT NULL COMMENT '主人id',
  `pet_type` int(11) NOT NULL COMMENT '0-cat,1-dog,2-hamster',
  `petlikes` int(11) NOT NULL DEFAULT '0' COMMENT '被喜欢数',
  `wins` int(11) NOT NULL DEFAULT '0' COMMENT 'pk获胜数',
  PRIMARY KEY (`pet_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `praise`
--

CREATE TABLE IF NOT EXISTS `praise` (
  `praise_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id，主键自增长',
  `user_id` int(11) NOT NULL COMMENT '点赞者id',
  `note_id` int(11) NOT NULL COMMENT '被点赞信息的id',
  `praise_time` datetime NOT NULL COMMENT '点赞的时间',
  PRIMARY KEY (`praise_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='点赞表' AUTO_INCREMENT=51 ;

--
-- 转存表中的数据 `praise`
--

INSERT INTO `praise` (`praise_id`, `user_id`, `note_id`, `praise_time`) VALUES
(49, 6, 18, '2017-11-22 05:34:08'),
(50, 7, 19, '2017-11-22 11:58:34');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id自增长',
  `user_name` char(32) NOT NULL COMMENT '用户账号',
  `password` char(32) NOT NULL COMMENT '用户密码',
  `nick_name` char(32) NOT NULL COMMENT '用户昵称',
  `all_level` int(11) NOT NULL DEFAULT '0' COMMENT '总等级',
  `cat_level` int(11) NOT NULL DEFAULT '0' COMMENT '猫版等级',
  `dog_level` int(11) NOT NULL DEFAULT '0' COMMENT '狗版等级',
  `hamster_level` int(11) NOT NULL DEFAULT '0' COMMENT '仓鼠等级',
  `permission` int(11) NOT NULL DEFAULT '0' COMMENT '0-普通用户，1-管理员',
  `user_via` char(128) NOT NULL DEFAULT 'uservia/defualtvia.jpg' COMMENT '用户头像',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `nick_name`, `all_level`, `cat_level`, `dog_level`, `hamster_level`, `permission`, `user_via`) VALUES
(5, 'qwer', 'qwer', 'WWW', 0, 0, 0, 0, 0, 'uservia/u=846178884,53397682&fm=27&gp=0.jpg'),
(6, 'zxc', 'zxc', 'QAQ', 0, 0, 0, 0, 0, 'uservia/defualtvia.jpg'),
(7, 'gxj', '123', 'gxj', 0, 0, 0, 0, 0, 'uservia/defualtvia.jpg'),
(8, '123456', '123456', '123456', 0, 0, 0, 0, 0, 'uservia/defualtvia.jpg'),
(9, '18419957632', '123456', 'Aimee', 0, 0, 0, 0, 0, 'uservia/catnote3.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
