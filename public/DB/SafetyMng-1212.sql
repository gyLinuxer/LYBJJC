-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2018-12-12 13:25:29
-- 服务器版本： 5.7.21
-- PHP 版本： 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `SafetyMng`
--

-- --------------------------------------------------------

--
-- 表的结构 `QuestionList`
--

CREATE TABLE `QuestionList` (
  `id` int(11) NOT NULL,
  `QuestionTitle` text COLLATE utf8_bin NOT NULL,
  `QuestionInfo` text COLLATE utf8_bin NOT NULL,
  `subFileName` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `subFileSaveName` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `CreatorName` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `CreateTime` datetime NOT NULL,
  `Status` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `ManagerName` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `ManageTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `QuestionList`
--

INSERT INTO `QuestionList` (`id`, `QuestionTitle`, `QuestionInfo`, `subFileName`, `subFileSaveName`, `CreatorName`, `CreateTime`, `Status`, `ManagerName`, `ManageTime`) VALUES
(13, 'B-9733着陆灯不亮', '&lt;p&gt;&lt;img src=&quot;/upload/20181210/a3886f74dbe1dbfe84e565bfc435bd75.jpeg&quot; style=&quot;width: 50%;&quot;&gt;&lt;/p&gt;&lt;p&gt;着陆灯不亮。&lt;/p&gt;', NULL, NULL, '李光耀', '2018-12-10 19:44:46', NULL, NULL, NULL),
(14, 'B-9733着陆灯不亮', '&lt;p&gt;&lt;img src=&quot;/upload/20181210/22309b81641fc468241af7d3848e15a4.jpeg&quot; style=&quot;width: 579.5px; height: 434.625px;&quot;&gt;&lt;/p&gt;&lt;p&gt;B-9733着陆灯不，XXX检查发现。&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', '778f4ea1a23c6f15b8d5ad22303396f7.jpeg', '20181210/778f4ea1a23c6f15b8d5ad22303396f7.jpeg', '李光耀', '2018-12-10 19:47:28', NULL, NULL, NULL),
(15, 'B-9733着陆灯不亮', '&lt;p&gt;&lt;img src=&quot;/upload/20181210/f59479c4e3cdfe519773312538095960.jpeg&quot; style=&quot;width: 598.5px; height: 448.875px;&quot;&gt;&lt;br&gt;&lt;/p&gt;', 'af1c0baf9e0fa2bce17aa0168d7a980a.jpeg', '20181210/af1c0baf9e0fa2bce17aa0168d7a980a.jpeg', '李光耀', '2018-12-10 20:16:33', NULL, NULL, NULL),
(16, 'B-9733着陆灯不亮', '&lt;p&gt;&lt;img src=&quot;/upload/20181210/f59479c4e3cdfe519773312538095960.jpeg&quot; style=&quot;width: 598.5px; height: 448.875px;&quot;&gt;&lt;br&gt;&lt;/p&gt;', '1ab1fc0712cfaa3d67031dc0754be232.jpeg', '20181210/1ab1fc0712cfaa3d67031dc0754be232.jpeg', '李光耀', '2018-12-10 20:18:04', NULL, NULL, NULL),
(17, 'B-9733着陆灯不亮', '&lt;p&gt;&lt;img src=&quot;/upload/20181210/f59479c4e3cdfe519773312538095960.jpeg&quot; style=&quot;width: 50%;&quot;&gt;&lt;br&gt;&lt;/p&gt;', '855d06bdc59e353e67bf9a9d83e629c9.jpeg', '20181210/855d06bdc59e353e67bf9a9d83e629c9.jpeg', '李光耀', '2018-12-10 20:18:34', NULL, NULL, NULL),
(18, 'B-9733着陆灯不亮', '&lt;p&gt;&lt;img src=&quot;/upload/20181210/f59479c4e3cdfe519773312538095960.jpeg&quot; style=&quot;width: 540.5px; height: 405.375px;&quot;&gt;&lt;br&gt;&lt;/p&gt;', '1f2b9e704fe25b8b526c78b4e74e9eb5.jpeg', '20181210/1f2b9e704fe25b8b526c78b4e74e9eb5.jpeg', '李光耀', '2018-12-10 20:19:05', NULL, NULL, NULL),
(19, 'B-9733着陆灯不亮', '&lt;p&gt;&lt;img src=&quot;/upload/20181210/f59479c4e3cdfe519773312538095960.jpeg&quot; style=&quot;width: 540.5px; height: 405.375px;&quot;&gt;&lt;br&gt;&lt;/p&gt;', '9a5fec0a0468e8b2740d5212ddb8df69.jpeg', '20181210/9a5fec0a0468e8b2740d5212ddb8df69.jpeg', '李光耀', '2018-12-10 20:19:31', NULL, NULL, NULL),
(20, 'B-9733着陆灯不亮', '&lt;p&gt;&lt;img src=&quot;/upload/20181210/f59479c4e3cdfe519773312538095960.jpeg&quot; style=&quot;width: 540.5px; height: 405.375px;&quot;&gt;&lt;br&gt;&lt;/p&gt;', '4bdccb8ef034b5ddb85a2013d9ee9c0a.jpeg', '20181210/4bdccb8ef034b5ddb85a2013d9ee9c0a.jpeg', '李光耀', '2018-12-10 20:20:25', NULL, NULL, NULL),
(21, 'B-9733着陆灯不亮', '&lt;p&gt;&lt;img src=&quot;/upload/20181210/f59479c4e3cdfe519773312538095960.jpeg&quot; style=&quot;width: 540.5px; height: 405.375px;&quot;&gt;&lt;br&gt;&lt;/p&gt;', 'c958e5854bb922d3ddafd1336aa9fa1c.jpeg', '20181210/c958e5854bb922d3ddafd1336aa9fa1c.jpeg', '李光耀', '2018-12-10 20:21:10', NULL, NULL, NULL),
(22, 'B-9733着陆灯不亮', '&lt;p&gt;&lt;img src=&quot;/upload/20181210/f59479c4e3cdfe519773312538095960.jpeg&quot; style=&quot;width: 540.5px; height: 405.375px;&quot;&gt;&lt;br&gt;&lt;/p&gt;', '3c7db9e9083166c604283a481e508530.jpeg', '20181210/3c7db9e9083166c604283a481e508530.jpeg', '李光耀', '2018-12-10 20:21:34', NULL, NULL, NULL),
(23, 'B-9733着陆灯不亮', '&lt;p&gt;&lt;img src=&quot;/upload/20181210/f59479c4e3cdfe519773312538095960.jpeg&quot; style=&quot;width: 540.5px; height: 405.375px;&quot;&gt;&lt;br&gt;&lt;/p&gt;', '4ff962cad79e058a20afded602a1627f.jpeg', '20181210/4ff962cad79e058a20afded602a1627f.jpeg', '李光耀', '2018-12-10 20:22:10', NULL, NULL, NULL),
(24, 'B-9733着陆灯不亮', '&lt;p&gt;&lt;img src=&quot;/upload/20181210/f59479c4e3cdfe519773312538095960.jpeg&quot; style=&quot;width: 540.5px; height: 405.375px;&quot;&gt;&lt;br&gt;&lt;/p&gt;', 'd2d582f9a90c2ef1580e11c924d9e846.jpeg', '20181210/d2d582f9a90c2ef1580e11c924d9e846.jpeg', '李光耀', '2018-12-10 20:22:41', NULL, NULL, NULL),
(25, 'B-9733着陆灯不亮', '&lt;p&gt;&lt;img src=&quot;/upload/20181210/f59479c4e3cdfe519773312538095960.jpeg&quot; style=&quot;width: 540.5px; height: 405.375px;&quot;&gt;&lt;br&gt;&lt;/p&gt;', '4b8adf0108ec4fd40b8d1f7d2e9fb6a4.jpeg', '20181210/4b8adf0108ec4fd40b8d1f7d2e9fb6a4.jpeg', '李光耀', '2018-12-10 20:23:42', NULL, NULL, NULL),
(26, 'B-9733着陆灯不亮', '&lt;p&gt;&lt;img src=&quot;/upload/20181210/f59479c4e3cdfe519773312538095960.jpeg&quot; style=&quot;width: 540.5px; height: 405.375px;&quot;&gt;&lt;br&gt;&lt;/p&gt;', 'c13381c7552ecb64bcf3ec8d97c888ac.jpeg', '20181210/c13381c7552ecb64bcf3ec8d97c888ac.jpeg', '李光耀', '2018-12-10 20:25:18', NULL, NULL, NULL),
(27, 'B-9740发电机裂纹', '&lt;p&gt;B-9740发电机裂纹&lt;/p&gt;&lt;p&gt;B-9740发电机裂纹&lt;/p&gt;&lt;p&gt;B-9740发电机裂纹&lt;/p&gt;&lt;p&gt;B-9740发电机裂纹&lt;/p&gt;&lt;p&gt;B-9740发电机裂纹&lt;/p&gt;&lt;p&gt;B-9740发电机裂纹&lt;/p&gt;&lt;p&gt;B-9740发电机裂纹&lt;/p&gt;&lt;p&gt;B-9740发电机裂纹&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20181210/b0ac73b5e0e3454082565a57d9c841ec.jpeg&quot; style=&quot;width: 100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;', '94ca2380e60fe691638735cc155abc2f.jpeg', '20181210/94ca2380e60fe691638735cc155abc2f.jpeg', '李光耀', '2018-12-10 20:29:46', NULL, NULL, NULL),
(28, 'B-9750汽化器裂纹', '&lt;p&gt;B-9750汽化器裂纹&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20181210/b1726e702646f6a60ac05b7e9857f7ed.jpeg&quot; style=&quot;width: 541.5px; height: 406.125px;&quot;&gt;&lt;br&gt;&lt;/p&gt;', '99cb145ec96485f219df6d0f498bc6ca.jpeg', '20181210/99cb145ec96485f219df6d0f498bc6ca.jpeg', '李光耀', '2018-12-10 20:45:09', NULL, NULL, NULL),
(29, 'B-9734启动机裂纹', '&lt;p&gt;&lt;img src=&quot;/upload/20181212/dba713767c323c6e9ed0e3fb762b5dd8.png&quot; style=&quot;&quot;&gt;&lt;br&gt;&lt;/p&gt;', 'bcf2374033fe0521de620fd77df66b42.pdf', '20181212/bcf2374033fe0521de620fd77df66b42.pdf', '史相陆', '2018-12-12 21:05:07', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `TaskList`
--

CREATE TABLE `TaskList` (
  `id` int(11) NOT NULL,
  `TaskType` varchar(50) COLLATE utf8_bin NOT NULL,
  `TaskName` varchar(512) COLLATE utf8_bin NOT NULL,
  `TaskInfo` text COLLATE utf8_bin NOT NULL,
  `CreateTime` datetime DEFAULT NULL,
  `DeadLine` date DEFAULT NULL,
  `SenderName` varchar(20) COLLATE utf8_bin NOT NULL,
  `CreatorName` varchar(20) COLLATE utf8_bin NOT NULL,
  `SenderCorp` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `ReciveCorp` varchar(20) COLLATE utf8_bin NOT NULL,
  `CurManagerName` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `TaskStatus` varchar(256) COLLATE utf8_bin NOT NULL COMMENT '该任务当前的处理阶段',
  `Status` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '',
  `RelateID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `TaskList`
--

INSERT INTO `TaskList` (`id`, `TaskType`, `TaskName`, `TaskInfo`, `CreateTime`, `DeadLine`, `SenderName`, `CreatorName`, `SenderCorp`, `ReciveCorp`, `CurManagerName`, `TaskStatus`, `Status`, `RelateID`) VALUES
(1, '问题提交', 'B-9733着陆灯不亮', '........', NULL, NULL, '李光耀', '李光耀', '质检科', '质检科', '李光耀', '问题已提交', '', 26),
(2, '问题提交', 'B-9740发电机裂纹', '........', '2018-12-10 20:29:46', NULL, '李光耀', '伊晗', '质检科', '质检科', '', '', '', 27),
(3, '问题提交', 'B-9750汽化器裂纹', '........', '2018-12-10 20:45:09', NULL, '李光耀', '李光耀', '质检科', '质检科', '', '', '', 28),
(4, '问题提交', 'B-9734启动机裂纹', '........', '2018-12-12 21:05:07', NULL, '史相陆', '史相陆', '质检科', '质检科', NULL, '', '', 29);

-- --------------------------------------------------------

--
-- 表的结构 `TaskMsg`
--

CREATE TABLE `TaskMsg` (
  `id` int(11) NOT NULL,
  `TaskID` int(11) NOT NULL,
  `SenderName` varchar(20) COLLATE utf8_bin NOT NULL,
  `ReceiveCorp` varchar(20) COLLATE utf8_bin NOT NULL,
  `ReceiverName` varchar(20) COLLATE utf8_bin NOT NULL,
  `Msg` text COLLATE utf8_bin NOT NULL,
  `CreateTime` datetime NOT NULL,
  `State` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `TaskMsg`
--

INSERT INTO `TaskMsg` (`id`, `TaskID`, `SenderName`, `ReceiveCorp`, `ReceiverName`, `Msg`, `CreateTime`, `State`) VALUES
(2, 1, '史相陆', '质检科', '李光耀', '请按照安全隐患上报！', '2018-12-12 09:42:14', 0);

-- --------------------------------------------------------

--
-- 表的结构 `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_bin NOT NULL,
  `addr` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `test`
--

INSERT INTO `test` (`id`, `name`, `addr`) VALUES
(1, '李光耀', 'cafucly');

-- --------------------------------------------------------

--
-- 表的结构 `UserList`
--

CREATE TABLE `UserList` (
  `id` int(11) NOT NULL,
  `UserName` varchar(20) COLLATE utf8_bin NOT NULL,
  `Pwd` varchar(64) COLLATE utf8_bin NOT NULL,
  `Corp` varchar(10) COLLATE utf8_bin NOT NULL,
  `Name` varchar(20) COLLATE utf8_bin NOT NULL,
  `CorpRole` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '领导与成员'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `UserList`
--

INSERT INTO `UserList` (`id`, `UserName`, `Pwd`, `Corp`, `Name`, `CorpRole`) VALUES
(1, 'lgy', '1', '质检科', '李光耀', '成员'),
(2, 'sxl', '1', '质检科', '史相陆', '领导'),
(3, 'stf', '1', '技术科', '盛腾飞', '成员'),
(4, 'wk', '1', '技术科', '王凯', '领导');

--
-- 转储表的索引
--

--
-- 表的索引 `QuestionList`
--
ALTER TABLE `QuestionList`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `TaskList`
--
ALTER TABLE `TaskList`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `TaskMsg`
--
ALTER TABLE `TaskMsg`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `UserList`
--
ALTER TABLE `UserList`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `QuestionList`
--
ALTER TABLE `QuestionList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- 使用表AUTO_INCREMENT `TaskList`
--
ALTER TABLE `TaskList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `TaskMsg`
--
ALTER TABLE `TaskMsg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `UserList`
--
ALTER TABLE `UserList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
