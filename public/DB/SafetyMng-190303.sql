-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2019-03-02 02:02:27
-- 服务器版本： 5.7.21
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SafetyMng`
--

-- --------------------------------------------------------

--
-- 表的结构 `IDCrossIndex`
--

CREATE TABLE `IDCrossIndex` (
  `id` int(11) NOT NULL,
  `Type` varchar(20) COLLATE utf8_bin NOT NULL,
  `FromID` int(11) NOT NULL,
  `ToID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `IDCrossIndex`
--

INSERT INTO `IDCrossIndex` (`id`, `Type`, `FromID`, `ToID`) VALUES
(1, '问题-整改', 75, 1),
(2, '问题-整改', 63, 2),
(3, '问题-整改', 64, 3),
(4, '问题-整改', 66, 4),
(5, '问题-整改', 67, 5),
(6, '问题-整改', 68, 6),
(7, '问题-整改', 65, 7),
(8, '问题-整改', 69, 8),
(9, '问题-整改', 70, 9),
(10, '问题-整改', 71, 10),
(11, '问题-整改', 72, 11),
(12, '问题-整改', 73, 12),
(13, '问题-整改', 74, 13),
(14, '问题-整改', 76, 14),
(15, '问题-整改', 63, 15);

-- --------------------------------------------------------

--
-- 表的结构 `QuestionList`
--

CREATE TABLE `QuestionList` (
  `id` int(11) NOT NULL,
  `TaskID` int(11) DEFAULT NULL,
  `DealType` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `QuestionTitle` text COLLATE utf8_bin NOT NULL,
  `QuestionInfo` longtext COLLATE utf8_bin NOT NULL,
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

INSERT INTO `QuestionList` (`id`, `TaskID`, `DealType`, `QuestionTitle`, `QuestionInfo`, `subFileName`, `subFileSaveName`, `CreatorName`, `CreateTime`, `Status`, `ManagerName`, `ManageTime`) VALUES
(63, 76, '整改', '工具借还记录填写不规范', '&lt;p&gt;&lt;img src=&quot;/upload/20190118/6a5f97c09a41cf01d68883b13436c5bb.png&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/a1208809ccf3751e316caf77ae52496e.png&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/c1fc0f859b6a92b7d7d6fe2de9d97513.png&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/a7ac09e6a780fdd4213c6b0b98ec6b56.png&quot; style=&quot;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '史相陆', '2019-01-18 09:02:36', NULL, NULL, NULL),
(64, 77, '整改', '工具房工具盘点记录中“两周盘点”未填写', '&lt;p&gt;&lt;img src=&quot;/upload/20190118/b0b807bb0c9ca82687980d1e9b451f6a.png&quot; style=&quot;width: 100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '史相陆', '2019-01-18 09:04:15', NULL, NULL, NULL),
(65, 78, '整改', '2015年机务工程部设备清查后新增设备未列入《工具总清单》', '&lt;p&gt;&lt;span style=&quot;background-color: rgb(255, 255, 0);&quot;&gt;自2015年机务工程部工具清查后，新增工具未列入《工具总清单》。&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '史相陆', '2019-01-18 09:06:19', NULL, NULL, NULL),
(66, 79, '整改', '机务工程部收回的待校计量工具未分类存放，且未上锁', '&lt;p&gt;&lt;img src=&quot;/upload/20190118/60074184aa0e780a578f8873af01b518.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/145123a44e14d2a408982da6313e87bd.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '史相陆', '2019-01-18 09:08:40', NULL, NULL, NULL),
(67, 80, '整改', '机务三队移动空调(编号:YKTK002)故障停用，未悬挂禁用标牌', '&lt;p&gt;&lt;img src=&quot;/upload/20190118/05ad39f49533a9d48658b07cfed9b4bb.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;img src=&quot;/upload/20190118/8eaafcd2fe2864e2463de60e287df179.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '史相陆', '2019-01-18 09:13:09', NULL, NULL, NULL),
(68, 81, '整改', '机务一队计量工具柜工具清单与实物不符，无记录表明其工具去向', '&lt;p&gt;&lt;img src=&quot;/upload/20190118/aebdbbb44a62a03ce8146c3d3ca04506.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/a49ac05096440fc0ca3cc9bc78f29382.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/011ae9d8f5f6ac0ad035fa8f0e55f161.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '史相陆', '2019-01-18 09:18:24', NULL, NULL, NULL),
(69, 82, '整改', '机务一队工具箱(GJX025)内小桶存有航空汽油', '&lt;p&gt;&lt;img src=&quot;/upload/20190118/58caef522b18e767b9506ae78ecb0f58.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/aa144f7cd3698115f5207f9ec99e71e5.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '史相陆', '2019-01-18 09:22:25', NULL, NULL, NULL),
(70, 83, '整改', '机务一队工具箱(GJX025)内喷油罐内，存有有效状态未知的航化品，无标签表明其内部航化品有效', '&lt;p&gt;&lt;img src=&quot;/upload/20190118/7e0df9de3501a4d6112b58bc7c351932.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/5f35c6c071c07c3bbffc7e2bfa7a44be.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '史相陆', '2019-01-18 09:24:35', NULL, NULL, NULL),
(71, 84, '整改', '机务二队172千斤顶(QJD021)保养时间超期(检查时间为2019.01.17)', '&lt;p&gt;&lt;img src=&quot;/upload/20190118/d173e7173e1835b97ad730c77926e731.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/af4e099329f886fb32ad6fd18f47f29e.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '史相陆', '2019-01-18 09:27:22', NULL, NULL, NULL),
(72, 85, '整改', '机务二队千斤顶(20015)保养时间超期，检查时间为(2019.01.17)', '&lt;p&gt;&lt;img src=&quot;/upload/20190118/f638d30b26245a1a7307675f82f89600.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/86ca57f6626a81b2d88ae192154b6095.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '史相陆', '2019-01-18 09:30:31', NULL, NULL, NULL),
(73, 86, '整改', '机务四队除冰液工具箱(GJX58)内PH试纸超期(其批号开头为2014,有效期三年)，且存有未列入清单的吸滴器', '&lt;p&gt;&lt;img src=&quot;/upload/20190118/5e7b64a858efa7c0ad23e06650de78ac.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/64e795ffebbfbea460e60d5fed535086.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '史相陆', '2019-01-18 09:35:08', NULL, NULL, NULL),
(74, 87, '整改', '机务四队存有未纳入工具箱清单的工具箱(GXJ42和GJX43)，且内部存有不明航材', '&lt;p&gt;&lt;img src=&quot;/upload/20190118/5780572236cd0efcdb645fbca6c2dbe3.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/03fb3d696941048f0aae076fe519d7eb.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/f39857819657bf8e9eea3d7366a1c19c.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '史相陆', '2019-01-18 09:39:54', NULL, NULL, NULL),
(75, 88, '整改', '机务二队移动空调(20100324001)无保养标签，无罩布', '&lt;p&gt;&lt;img src=&quot;/upload/20190118/ee35a1051859816200e8ead1ed40b491.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;img src=&quot;/upload/20190118/6d0542546bf50d6100012702948553e7.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '史相陆', '2019-01-18 09:56:17', NULL, NULL, NULL),
(89, 115, NULL, '工具设备-检验检查-', '&lt;p&gt;在第8周维修现场检查发现，机务三队维修现场吊挂上发动机吊发专用工具（设备）没有纳入管理，维修管理程序PQ-018 工具设备管理程序要求不符。&lt;img src=&quot;/upload/20190227/e4553cefe04e8c893cb0dc54458375b9.JPG&quot; style=&quot;width:100%;&quot;&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-02-27 11:02:49', NULL, NULL, NULL),
(90, 116, NULL, '工具设备-检验检查-设备未纳入管理', '&lt;p&gt;维修现场秩序检验检查发现，机务三队维修现场螺旋桨托架未纳入设备管理，与维修管理程序PQ-018 工具设备管理程序不符。&lt;/p&gt;', '84b2b2899a01ac8d5fdaad6470ccb998.JPG', '20190227/84b2b2899a01ac8d5fdaad6470ccb998.JPG', '史相陆  ', '2019-02-27 11:08:28', NULL, NULL, NULL),
(92, 118, NULL, '工具设备-检验检查-更换发动机工作台未纳入设备管理', '&lt;table style=&quot;color: rgb(85, 85, 85); background-color: rgb(255, 255, 255);&quot;&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;p&gt;在第8周维修现场检查发现，机务三队维修现场更换发动机工作台未纳入设备管理，与维修管理程序PQ-018 工具设备管理程序不符。&lt;img src=&quot;/upload/20190227/452b2bb2b429cea7126094935a0ebb63.JPG&quot; style=&quot;width:100%;&quot;&gt;&lt;/p&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;br&gt;', NULL, NULL, '史相陆  ', '2019-02-27 14:42:59', NULL, NULL, NULL),
(93, 119, NULL, '工具设备-检验检查-高压气瓶使用不规范', '&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85);&quot;&gt;在第8周维修现场检查发现，机务三队维修现场存放的高压气瓶管理不规范，&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85);&quot;&gt;1.与&lt;/span&gt;&lt;font color=&quot;#555555&quot;&gt;机务工程部高压气瓶及设备安全使用管理规定（BESL2015RD13）中&lt;/font&gt;&lt;font color=&quot;#555555&quot; style=&quot;line-height: 1.42857143;&quot;&gt;气瓶（包括空瓶）存储时应将瓶阀关闭，卸下减压器，戴&lt;/font&gt;&lt;span style=&quot;line-height: 1.42857143; color: rgb(85, 85, 85);&quot;&gt;上并旋紧气瓶帽，整齐排放要求不符。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;line-height: 1.42857143; color: rgb(85, 85, 85);&quot;&gt;2.减压器冷气导管使用完后没有及时按照维修管理程序PQ-18工具设备管理程序进行管理。&lt;/span&gt;&lt;img src=&quot;/upload/20190227/e2cb8bbe9977110c7d5a5af4285de8c2.JPG&quot; style=&quot;width:100%;&quot;&gt;&lt;img src=&quot;/upload/20190227/d8b64b4dc2faae5815a621add0aa1cd8.JPG&quot; style=&quot;width:100%;&quot;&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-02-27 14:59:25', NULL, NULL, NULL),
(94, 120, NULL, '器材--航化品--检验检查--器材标签不可见', '&lt;p&gt;&lt;span style=&quot;font-size:10.5pt;mso-bidi-font-size:11.0pt;\r\nfont-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;\r\nmso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:\r\nminor-latin;mso-bidi-font-family:&amp;quot;Times New Roman&amp;quot;;mso-bidi-theme-font:minor-bidi;\r\nmso-ansi-language:EN-US;mso-fareast-language:ZH-CN;mso-bidi-language:AR-SA&quot;&gt;维修现场检验检查机务二队&lt;/span&gt;&lt;span style=&quot;font-family: 宋体; font-size: 10.5pt; line-height: 1.42857143;&quot;&gt;发现:&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-family: 宋体; font-size: 10.5pt; line-height: 1.42857143;&quot;&gt;1.&lt;/span&gt;&lt;span style=&quot;font-size:10.5pt;mso-bidi-font-size:11.0pt;\r\nfont-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;\r\nmso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:\r\nminor-latin;mso-bidi-font-family:&amp;quot;Times New Roman&amp;quot;;mso-bidi-theme-font:minor-bidi;\r\nmso-ansi-language:EN-US;mso-fareast-language:ZH-CN;mso-bidi-language:AR-SA&quot;&gt;存放的器材标签不可见&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span lang=&quot;EN-US&quot; style=&quot;font-size:10.5pt;mso-bidi-font-size:\r\n11.0pt;font-family:&amp;quot;Calibri&amp;quot;,sans-serif;mso-ascii-theme-font:minor-latin;\r\nmso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:\r\nminor-latin;mso-bidi-font-family:&amp;quot;Times New Roman&amp;quot;;mso-bidi-theme-font:minor-bidi;\r\nmso-ansi-language:EN-US;mso-fareast-language:ZH-CN;mso-bidi-language:AR-SA&quot;&gt;2.&lt;/span&gt;&lt;span style=&quot;font-size:10.5pt;mso-bidi-font-size:11.0pt;font-family:宋体;mso-ascii-font-family:\r\nCalibri;mso-ascii-theme-font:minor-latin;mso-fareast-theme-font:minor-fareast;\r\nmso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:\r\n&amp;quot;Times New Roman&amp;quot;;mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;\r\nmso-fareast-language:ZH-CN;mso-bidi-language:AR-SA&quot;&gt;现场使用的航化品没有航材检验标签。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span lang=&quot;EN-US&quot; style=&quot;font-size:10.5pt;mso-bidi-font-size:\r\n11.0pt;font-family:&amp;quot;Calibri&amp;quot;,sans-serif;mso-ascii-theme-font:minor-latin;\r\nmso-fareast-font-family:宋体;mso-fareast-theme-font:minor-fareast;mso-hansi-theme-font:\r\nminor-latin;mso-bidi-font-family:&amp;quot;Times New Roman&amp;quot;;mso-bidi-theme-font:minor-bidi;\r\nmso-ansi-language:EN-US;mso-fareast-language:ZH-CN;mso-bidi-language:AR-SA&quot;&gt;3.&lt;/span&gt;&lt;span style=&quot;font-size:10.5pt;mso-bidi-font-size:11.0pt;font-family:宋体;mso-ascii-font-family:\r\nCalibri;mso-ascii-theme-font:minor-latin;mso-fareast-theme-font:minor-fareast;\r\nmso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:\r\n&amp;quot;Times New Roman&amp;quot;;mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;\r\nmso-fareast-language:ZH-CN;mso-bidi-language:AR-SA&quot;&gt;注油壶所装油脂没有标签说明。&lt;/span&gt;&lt;span style=&quot;font-size:10.5pt;mso-bidi-font-size:11.0pt;font-family:宋体;mso-ascii-font-family:\r\nCalibri;mso-ascii-theme-font:minor-latin;mso-fareast-theme-font:minor-fareast;\r\nmso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:\r\n&amp;quot;Times New Roman&amp;quot;;mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;\r\nmso-fareast-language:ZH-CN;mso-bidi-language:AR-SA&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size:10.5pt;mso-bidi-font-size:11.0pt;font-family:宋体;mso-ascii-font-family:\r\nCalibri;mso-ascii-theme-font:minor-latin;mso-fareast-theme-font:minor-fareast;\r\nmso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:\r\n&amp;quot;Times New Roman&amp;quot;;mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;\r\nmso-fareast-language:ZH-CN;mso-bidi-language:AR-SA&quot;&gt;&lt;br&gt;&lt;/span&gt;\r\n\r\n&lt;/p&gt;&lt;p class=&quot;MsoNormal&quot;&gt;&lt;span lang=&quot;EN-US&quot;&gt;&lt;o:p&gt;&amp;nbsp;&lt;/o:p&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-family: 宋体; font-size: 10.5pt; line-height: 1.42857143;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;img src=&quot;/upload/20190228/04d77830db40dada0d7b43da8db88ec0.JPG&quot; style=&quot;width:100%;&quot;&gt;&lt;img src=&quot;/upload/20190228/812a0c13b913c0653729d0bb4ae4797a.JPG&quot; style=&quot;width:100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-02-28 10:30:07', NULL, NULL, NULL),
(95, 121, NULL, '工具设备--工具箱管理不规范', '&lt;p&gt;&lt;span style=&quot;font-size:10.5pt;mso-bidi-font-size:11.0pt;\r\nfont-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;\r\nmso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:\r\nminor-latin;mso-bidi-font-family:&amp;quot;Times New Roman&amp;quot;;mso-bidi-theme-font:minor-bidi;\r\nmso-ansi-language:EN-US;mso-fareast-language:ZH-CN;mso-bidi-language:AR-SA&quot;&gt;维修现场检验检查机务二队&lt;/span&gt;&lt;span lang=&quot;EN-US&quot; style=&quot;font-size:10.5pt;mso-bidi-font-size:11.0pt;font-family:&amp;quot;Calibri&amp;quot;,sans-serif;\r\nmso-ascii-theme-font:minor-latin;mso-fareast-font-family:宋体;mso-fareast-theme-font:\r\nminor-fareast;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:&amp;quot;Times New Roman&amp;quot;;\r\nmso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;mso-fareast-language:\r\nZH-CN;mso-bidi-language:AR-SA&quot;&gt;GJx011&lt;/span&gt;&lt;span style=&quot;font-size:10.5pt;\r\nmso-bidi-font-size:11.0pt;font-family:宋体;mso-ascii-font-family:Calibri;\r\nmso-ascii-theme-font:minor-latin;mso-fareast-theme-font:minor-fareast;\r\nmso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:\r\n&amp;quot;Times New Roman&amp;quot;;mso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;\r\nmso-fareast-language:ZH-CN;mso-bidi-language:AR-SA&quot;&gt;工具箱发现工具箱保管人标签与实际保管人不符。&lt;/span&gt;&lt;img src=&quot;/upload/20190228/a79d83c681ecb04fdab49d6714454eba.JPG&quot; style=&quot;width:100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-02-28 14:58:28', NULL, NULL, NULL),
(96, 122, NULL, '工具设备--部分设备没有做防尘处理', '&lt;p&gt;&lt;span style=&quot;font-size:10.5pt;mso-bidi-font-size:11.0pt;\r\nfont-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;\r\nmso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:\r\nminor-latin;mso-bidi-font-family:&amp;quot;Times New Roman&amp;quot;;mso-bidi-theme-font:minor-bidi;\r\nmso-ansi-language:EN-US;mso-fareast-language:ZH-CN;mso-bidi-language:AR-SA&quot;&gt;维修现场检验检查发现B机库一队保管的部分设备没有做防尘处理&lt;/span&gt;&lt;img src=&quot;/upload/20190228/a2a06a092af4a73c6638ad454c8ef880.JPG&quot; style=&quot;width:100%;&quot;&gt;&lt;img src=&quot;/upload/20190228/d68ee9900cbed5e82eb0d92886b92fa7.JPG&quot; style=&quot;width:100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-02-28 15:02:13', NULL, NULL, NULL),
(97, 123, NULL, '现场管理---沉淀油油样柜的油样瓶存放和标签不能一一对应', '&lt;p&gt;&lt;span style=&quot;font-size:10.5pt;mso-bidi-font-size:11.0pt;\r\nfont-family:宋体;mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;\r\nmso-fareast-theme-font:minor-fareast;mso-hansi-font-family:Calibri;mso-hansi-theme-font:\r\nminor-latin;mso-bidi-font-family:&amp;quot;Times New Roman&amp;quot;;mso-bidi-theme-font:minor-bidi;\r\nmso-ansi-language:EN-US;mso-fareast-language:ZH-CN;mso-bidi-language:AR-SA&quot;&gt;维修现场检验检查发现机务一队&lt;/span&gt;&lt;font face=&quot;宋体&quot;&gt;沉淀油油样柜的油样瓶存放和标签不能一一对应&lt;/font&gt;&lt;img src=&quot;/upload/20190228/e0a72b8a216bb823764ad24e845c5655.JPG&quot; style=&quot;width:100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-02-28 15:05:55', NULL, NULL, NULL),
(98, 124, NULL, '现场管理--机库灰尘较多', '&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: 宋体;&quot;&gt;1.维修现场检验检查发现B机库灰尘较多，地面油污未及时处理。&lt;/span&gt;&lt;img src=&quot;/upload/20190228/e6457cf32ed0fa9da33c4aedb59baaca.JPG&quot; style=&quot;width:100%;&quot;&gt;&lt;img src=&quot;/upload/20190228/0d9b86321cbfe49ceabfec9336821cf3.JPG&quot; style=&quot;width:100%;&quot;&gt;&lt;img src=&quot;/upload/20190228/5debf6e3912f3e848044aee376f3b25a.JPG&quot; style=&quot;width:100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: 宋体;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;img src=&quot;/upload/20190228/69757832f20a510c7a7e6c8b7cabea91.JPG&quot; style=&quot;width:100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-02-28 15:09:41', NULL, NULL, NULL),
(99, 125, NULL, '工具设备--计量工具--气压表校验标签不可见', '&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: 宋体;&quot;&gt;维修现场检验检查发现机库机务二队保管的压缩空气减压阀（编号为2-JYQ-002）上的气压表校验标签不可见&lt;/span&gt;&lt;img src=&quot;/upload/20190228/0219e4f7791f962bb79cdb164d9760aa.JPG&quot; style=&quot;width:100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-02-28 15:14:45', NULL, NULL, NULL),
(100, 126, '整改', '工具设备--发动机维护工作梯防撞条缺失', '&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: 宋体;&quot;&gt;维修现场检验检查发现机务四队保管的&lt;/span&gt;&lt;font color=&quot;#555555&quot; face=&quot;宋体&quot;&gt;发动机维护工作梯防撞条缺失&lt;/font&gt;&lt;img src=&quot;/upload/20190228/26f19ab67b1645fc0b66b9cd1db6a96e.JPG&quot; style=&quot;width:100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-02-28 15:17:00', NULL, NULL, NULL),
(101, 127, NULL, '现场管理--定检用工具没有使用工具盘', '&lt;p&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: 宋体;&quot;&gt;维修现场检验检查发现机务四队&lt;/span&gt;&lt;font color=&quot;#555555&quot; face=&quot;宋体&quot;&gt;定检用工具没有使用工具盘，在梯台上乱放&lt;/font&gt;&lt;img src=&quot;/upload/20190228/61b9e926e1f3a5e6afa48d1a7db083b1.JPG&quot; style=&quot;width:100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-02-28 15:20:41', NULL, NULL, NULL),
(102, 128, '整改', '器材--航化品--航化品航材检验标签不可见', '&lt;p&gt;&lt;img src=&quot;/upload/20190228/4d4a1751bb5e11eb5650e0d909719120.JPG&quot; style=&quot;width:100%;&quot;&gt;&lt;span style=&quot;color: rgb(85, 85, 85); font-family: 宋体;&quot;&gt;维修现场检验检查发现机务四队&lt;/span&gt;&lt;font color=&quot;#555555&quot; face=&quot;宋体&quot; style=&quot;color: rgb(85, 85, 85);&quot;&gt;定检用航化品航材检验标签不可见&lt;/font&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-02-28 15:24:09', NULL, NULL, NULL),
(103, 129, NULL, 'B-3898飞机顶升后无人监管', '&lt;p&gt;&lt;img src=&quot;/upload/20190228/bfc9fd95b45a43ae6526d4bb032ece87.jpg&quot; style=&quot;width:100%;&quot;&gt;A机库，2019-2-28&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190228/13568c135e2f992deec65d69017f0a5e.jpg&quot; style=&quot;width:100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;', NULL, NULL, '乔树旺  ', '2019-02-28 15:49:54', NULL, NULL, NULL),
(104, 130, NULL, '工具设备--专项检查---排污车无防大风措施', '&lt;p&gt;防大风沙尘专项检查发现，机务四队编号为PWC001的手推排污车无地面固定措施&lt;img src=&quot;/upload/20190301/e8c4cc272cc56ce70acafe724db83b6f.jpg&quot; style=&quot;width:100%;&quot;&gt;&lt;img src=&quot;/upload/20190301/18e39c0a77f926a460f21137f92dcc98.jpg&quot; style=&quot;width:100%;&quot;&gt;&lt;/p&gt;', NULL, NULL, '史相陆  ', '2019-03-01 15:01:18', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `QuestionSource`
--

CREATE TABLE `QuestionSource` (
  `id` int(11) NOT NULL,
  `SourceName` varchar(50) COLLATE utf8_bin NOT NULL,
  `CodePre` varchar(20) COLLATE utf8_bin NOT NULL,
  `AddTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `QuestionSource`
--

INSERT INTO `QuestionSource` (`id`, `SourceName`, `CodePre`, `AddTime`) VALUES
(1, '维修单位年检', 'WXDWNJ', '2018-12-06 00:00:00'),
(2, '航空器年检', 'HKQNJ', '2018-12-06 00:00:00'),
(3, '日常检察', 'RCJC', '2019-01-07 16:53:01'),
(4, '年度检验检查', 'NDJYJC', '2019-01-15 15:57:06'),
(5, '2019年2月开飞检查', 'KFJC-201902', '2019-02-17 10:58:29');

-- --------------------------------------------------------

--
-- 表的结构 `ReformList`
--

CREATE TABLE `ReformList` (
  `id` int(11) NOT NULL,
  `ChildTaskID` int(11) DEFAULT NULL COMMENT '整改子任务ID',
  `ParentTaskID` int(11) DEFAULT NULL,
  `Code` varchar(50) COLLATE utf8_bin NOT NULL,
  `RelatedQuestionID` int(11) NOT NULL,
  `QuestionSourceName` varchar(50) COLLATE utf8_bin NOT NULL,
  `CheckDate` date NOT NULL,
  `Inspectors` varchar(50) COLLATE utf8_bin NOT NULL,
  `IssueDate` date NOT NULL,
  `RequestFeedBackDate` date NOT NULL,
  `QuestionTitle` text COLLATE utf8_bin,
  `ReformTitle` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `NonConfirmDesc` longtext COLLATE utf8_bin NOT NULL,
  `Basis` varchar(256) COLLATE utf8_bin NOT NULL,
  `DutyCorp` varchar(10) COLLATE utf8_bin NOT NULL,
  `CurDealCorp` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `ReformRequirement` varchar(1024) COLLATE utf8_bin NOT NULL,
  `RequireDefineCause` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '是否要求整改单位分析原因',
  `RequireDefineAction` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '是否要求整改单位指定措施',
  `DirectCause` varchar(1024) COLLATE utf8_bin DEFAULT NULL,
  `RootCause` varchar(1024) COLLATE utf8_bin DEFAULT NULL,
  `CauseEvalerName` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `CauseEvalTime` datetime DEFAULT NULL,
  `CorrectiveAction` text COLLATE utf8_bin,
  `CorrectiveDeadline` date DEFAULT NULL,
  `PrecautionAction` text COLLATE utf8_bin,
  `PrecautionDeadline` date DEFAULT NULL,
  `ActionMakerName` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `ActionMakeTime` datetime DEFAULT NULL,
  `ActionIsOK` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `ActionEval` text COLLATE utf8_bin,
  `ActionEvalerName` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `ActionEvalTime` datetime DEFAULT NULL,
  `ProofEvalIsOK` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `ProofEvalerName` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `Proof` longtext COLLATE utf8_bin,
  `ProofUploaderName` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `ProofUploadTime` datetime DEFAULT NULL,
  `ProofEvalTime` datetime DEFAULT NULL,
  `ProofEvalMemo` text COLLATE utf8_bin,
  `ReformStatus` varchar(20) COLLATE utf8_bin NOT NULL,
  `DeleteTime` datetime DEFAULT NULL,
  `DeleterName` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `isDeleted` varchar(5) COLLATE utf8_bin NOT NULL DEFAULT '否' COMMENT '是、否',
  `DeleteMemo` varchar(256) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `ReformList`
--

INSERT INTO `ReformList` (`id`, `ChildTaskID`, `ParentTaskID`, `Code`, `RelatedQuestionID`, `QuestionSourceName`, `CheckDate`, `Inspectors`, `IssueDate`, `RequestFeedBackDate`, `QuestionTitle`, `ReformTitle`, `NonConfirmDesc`, `Basis`, `DutyCorp`, `CurDealCorp`, `ReformRequirement`, `RequireDefineCause`, `RequireDefineAction`, `DirectCause`, `RootCause`, `CauseEvalerName`, `CauseEvalTime`, `CorrectiveAction`, `CorrectiveDeadline`, `PrecautionAction`, `PrecautionDeadline`, `ActionMakerName`, `ActionMakeTime`, `ActionIsOK`, `ActionEval`, `ActionEvalerName`, `ActionEvalTime`, `ProofEvalIsOK`, `ProofEvalerName`, `Proof`, `ProofUploaderName`, `ProofUploadTime`, `ProofEvalTime`, `ProofEvalMemo`, `ReformStatus`, `DeleteTime`, `DeleterName`, `isDeleted`, `DeleteMemo`) VALUES
(1, 99, 88, 'NDJYJC-20190121145400697', 75, '年度检验检查', '2019-01-17', '史相陆', '2019-01-21', '2019-01-24', '机务二队移动空调(20100324001)无保养标签，无罩布', '机务二队移动空调(20100324001)无保养标签，无罩布', '                                                                    &lt;p&gt;&lt;img src=&quot;/upload/20190118/ee35a1051859816200e8ead1ed40b491.jpg&quot; style=&quot;width: 50%;&quot;&gt;&lt;img src=&quot;/upload/20190118/6d0542546bf50d6100012702948553e7.jpg&quot; style=&quot;width: 50%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;                             ', 'PQ-018', '机务二队', '机务二队', '分析原因并指定措施！', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未分析原因制定措施', NULL, NULL, '否', NULL),
(2, 89, 76, 'NDJYJC-20190121151455102', 63, '年度检验检查', '2019-01-17', '史相陆', '2019-01-21', '2019-01-25', '工具借还记录填写不规范', '工具借还记录填写不规范', '                                                                    &lt;p&gt;&lt;img src=&quot;/upload/20190118/6a5f97c09a41cf01d68883b13436c5bb.png&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/a1208809ccf3751e316caf77ae52496e.png&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/c1fc0f859b6a92b7d7d6fe2de9d97513.png&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/a7ac09e6a780fdd4213c6b0b98ec6b56.png&quot; style=&quot;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;                             ', 'PQ-018', '机务三队', '机务三队', '分析原因并制定措施！', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未分析原因制定措施', NULL, NULL, '否', NULL),
(3, 90, 77, 'NDJYJC-20190121151547355', 64, '年度检验检查', '2019-01-17', '史相陆', '2019-01-21', '2019-01-25', '工具房工具盘点记录中“两周盘点”未填写', '工具房工具盘点记录中“两周盘点”未填写', '                                                                    &lt;p&gt;&lt;img src=&quot;/upload/20190118/b0b807bb0c9ca82687980d1e9b451f6a.png&quot; style=&quot;width: 100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;                             ', 'PQ-018', '机务三队', '机务三队', '分析原因并制定措施！', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未分析原因制定措施', NULL, NULL, '否', NULL),
(4, 92, 79, 'NDJYJC-20190121151618142', 66, '年度检验检查', '2019-01-17', '史相陆', '2019-01-21', '2019-01-25', '机务工程部收回的待校计量工具未分类存放，且未上锁', '机务工程部收回的待校计量工具未分类存放，且未上锁', '                                                                    &lt;p&gt;&lt;img src=&quot;/upload/20190118/60074184aa0e780a578f8873af01b518.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/145123a44e14d2a408982da6313e87bd.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;                             ', 'PQ-018', '机务三队', '机务三队', '分析原因并制定措施！', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未分析原因制定措施', NULL, NULL, '否', NULL),
(5, 100, 80, 'NDJYJC-20190121151652992', 67, '年度检验检查', '2019-01-17', '史相陆', '2019-01-21', '2019-01-25', '机务三队移动空调(编号:YKTK002)故障停用，未悬挂禁用标牌', '机务三队移动空调(编号:YKTK002)故障停用，未悬挂禁用标牌', '                                                                    &lt;p&gt;&lt;img src=&quot;/upload/20190118/05ad39f49533a9d48658b07cfed9b4bb.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;img src=&quot;/upload/20190118/8eaafcd2fe2864e2463de60e287df179.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;                             ', 'PQ-018', '机务三队', '机务三队', '分析原因并制定措施！', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未分析原因制定措施', NULL, NULL, '否', NULL),
(6, 93, 81, 'NDJYJC-20190121151755317', 68, '年度检验检查', '2019-01-17', '史相陆', '2019-01-21', '2019-01-24', '机务一队计量工具柜工具清单与实物不符，无记录表明其工具去向', '机务一队计量工具柜工具清单与实物不符，无记录表明其工具去向', '                                                                    &lt;p&gt;&lt;img src=&quot;/upload/20190118/aebdbbb44a62a03ce8146c3d3ca04506.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/a49ac05096440fc0ca3cc9bc78f29382.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/011ae9d8f5f6ac0ad035fa8f0e55f161.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;                             ', 'PQ-018', '机务一队', '机务一队', '分析原因并制定措施！', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未分析原因制定措施', NULL, NULL, '否', NULL),
(7, 91, 78, 'NDJYJC-20190121151836227', 65, '年度检验检查', '2019-01-17', '史相陆', '2019-01-21', '2019-01-25', '2015年机务工程部设备清查后新增设备未列入《设备总清单》', '2015年机务工程部设备清查后新增设备未列入《设备总清单》', '                                                                    &lt;p&gt;&lt;span style=&quot;background-color: rgb(255, 255, 0);&quot;&gt;自2015年机务工程部设备清查后，新增工具未列入《设备总清单》。&lt;/span&gt;&lt;br&gt;&lt;/p&gt;                             ', 'PQ-018', '机务三队', '机务三队', '分析原因并制定措施！', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未分析原因制定措施', NULL, NULL, '否', NULL),
(8, 94, 82, 'NDJYJC-20190121151915730', 69, '年度检验检查', '2019-01-17', '史相陆', '2019-01-21', '2019-01-25', '机务一队工具箱(GJX025)内小桶存有航空汽油', '机务一队工具箱(GJX025)内小桶存有航空汽油', '                                                                    &lt;p&gt;&lt;img src=&quot;/upload/20190118/58caef522b18e767b9506ae78ecb0f58.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/aa144f7cd3698115f5207f9ec99e71e5.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;                             ', 'PQ-018', '机务一队', '机务一队', '分析原因并制定措施！', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未分析原因制定措施', NULL, NULL, '否', NULL),
(9, 101, 83, 'NDJYJC-20190121151947572', 70, '年度检验检查', '2019-01-17', '史相陆', '2019-01-21', '2019-01-25', '机务一队工具箱(GJX025)内喷油罐内，存有有效状态未知的航化品，无标签表明其内部航化品有效', '机务一队工具箱(GJX025)内喷油罐内，存有有效状态未知的航化品，无标签表明其内部航化品有效', '                                                                    &lt;p&gt;&lt;img src=&quot;/upload/20190118/7e0df9de3501a4d6112b58bc7c351932.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/5f35c6c071c07c3bbffc7e2bfa7a44be.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;                             ', 'PQ-018', '机务一队', '机务一队', '分析原因并制定措施！', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未分析原因制定措施', NULL, NULL, '否', NULL),
(10, 95, 84, 'NDJYJC-20190121152217189', 71, '年度检验检查', '2019-01-17', '史相陆', '2019-01-21', '2019-01-25', '机务二队172千斤顶(QJD021)保养时间超期(检查时间为2019.01.17)', '机务二队172千斤顶(QJD021)保养时间超期(检查时间为2019.01.17)', '                                                                    &lt;p&gt;&lt;img src=&quot;/upload/20190118/d173e7173e1835b97ad730c77926e731.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/af4e099329f886fb32ad6fd18f47f29e.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;                             ', 'PQ-018', '机务二队', '机务二队', '分析原因并制定措施！', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未分析原因制定措施', NULL, NULL, '否', NULL),
(11, 96, 85, 'NDJYJC-20190121152347373', 72, '年度检验检查', '2019-01-17', '史相陆', '2019-01-21', '2019-01-25', '机务二队千斤顶(20015)保养时间超期，检查时间为(2019.01.17)', '机务二队千斤顶(20015)保养时间超期，检查时间为(2019.01.17)', '                                                                    &lt;p&gt;&lt;img src=&quot;/upload/20190118/f638d30b26245a1a7307675f82f89600.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/86ca57f6626a81b2d88ae192154b6095.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;                             ', 'PQ-018', '机务二队', '机务二队', '分析原因并制定措施！', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未分析原因制定措施', NULL, NULL, '否', NULL),
(12, 97, 86, 'NDJYJC-20190121152606419', 73, '年度检验检查', '2019-01-17', '史相陆', '2019-01-21', '2019-01-25', '机务四队除冰液工具箱(GJX58)内PH试纸超期(其批号开头为2014,有效期三年)，且存有未列入清单的吸滴器', '机务四队除冰液工具箱(GJX58)内PH试纸超期(其批号开头为2014,有效期三年)，且存有未列入清单的吸滴器', '                                                                    &lt;p&gt;&lt;img src=&quot;/upload/20190118/5e7b64a858efa7c0ad23e06650de78ac.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/64e795ffebbfbea460e60d5fed535086.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;                             ', 'PQ-018', '机务四队', '机务四队', '分析原因并制定措施！', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未分析原因制定措施', NULL, NULL, '否', NULL),
(13, 98, 87, 'NDJYJC-20190121152639371', 74, '年度检验检查', '2019-01-17', '史相陆', '2019-01-21', '2019-01-25', '机务四队存有未纳入工具箱清单的工具箱(GXJ42和GJX43)，且内部存有不明航材', '机务四队存有未纳入工具箱清单的工具箱(GXJ42和GJX43)，且内部存有不明航材', '                                                                    &lt;p&gt;&lt;img src=&quot;/upload/20190118/5780572236cd0efcdb645fbca6c2dbe3.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/03fb3d696941048f0aae076fe519d7eb.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/f39857819657bf8e9eea3d7366a1c19c.jpg&quot; style=&quot;width: 100%;&quot;&gt;&lt;br&gt;&lt;/p&gt;                             ', 'PQ-018', '机务四队', '机务四队', '分析原因并制定措施！', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未分析原因制定措施', NULL, NULL, '否', NULL),
(14, 103, 102, 'NDJYJC-20190121161524342', 76, '年度检验检查', '2019-01-21', '史相陆', '2019-01-21', '2019-01-22', '机务四队高杆灯门不可彻底关闭', '机务四队高杆灯门不可彻底关闭', '                                                                    &lt;p class=&quot;MsoNormal&quot; align=&quot;left&quot; style=&quot;margin-left: 0cm; line-height: 18pt;&quot;&gt;&lt;span lang=&quot;EN-US&quot; style=&quot;font-family:宋体;mso-ascii-theme-font:major-fareast;mso-fareast-theme-font:\r\nmajor-fareast;mso-hansi-theme-font:major-fareast&quot;&gt;A319/320/321&lt;/span&gt;&lt;span style=&quot;font-family:宋体;mso-ascii-theme-font:major-fareast;mso-fareast-theme-font:\r\nmajor-fareast;mso-hansi-theme-font:major-fareast&quot;&gt;机型放行人员及该机型放行人员数量。&lt;/span&gt;&lt;/p&gt;&lt;p class=&quot;MsoNormal&quot; align=&quot;left&quot; style=&quot;margin-left: 0cm; line-height: 18pt;&quot;&gt;&lt;span style=&quot;font-family:宋体;mso-ascii-theme-font:major-fareast;mso-fareast-theme-font:\r\nmajor-fareast;mso-hansi-theme-font:major-fareast&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;b&gt;&lt;span lang=&quot;EN-US&quot; style=&quot;font-size:10.5pt;\r\nfont-family:宋体;mso-ascii-theme-font:major-fareast;mso-fareast-theme-font:major-fareast;\r\nmso-hansi-theme-font:major-fareast&quot;&gt;&lt;o:p&gt;&lt;/o:p&gt;&lt;/span&gt;&lt;/b&gt;&lt;/p&gt;                             ', 'CCAR-145', '机务四队', '机务四队', '请分析原因并制定措施！', 'YES', 'YES', '这是直接原因。f\'f\'ffff', '这是根本原因。f\'f\'ffff', NULL, NULL, '纠正措施f\'f\'f\'fffff', '2019-01-23', '预防措施:反反复复', '2019-01-24', '党立杰', '2019-01-21 16:22:32', 'YES', 'OK!', '史相陆', '2019-01-21 16:25:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '措施审核通过执行中', NULL, NULL, '否', NULL),
(15, 104, 76, 'NDJYJC-20190122142826350', 63, '年度检验检查', '2019-01-17', '史相陆', '2019-01-22', '2019-01-25', '工具借还记录填写不规范', '工具借还记录填写不规范', '                                                                    &lt;p&gt;&lt;img src=&quot;/upload/20190118/6a5f97c09a41cf01d68883b13436c5bb.png&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/a1208809ccf3751e316caf77ae52496e.png&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/c1fc0f859b6a92b7d7d6fe2de9d97513.png&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/upload/20190118/a7ac09e6a780fdd4213c6b0b98ec6b56.png&quot; style=&quot;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;                             ', 'PQ-018', '机务二队', '机务二队', '请分析原因并制定措施！', 'YES', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未分析原因制定措施', NULL, NULL, '否', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `SysConf`
--

CREATE TABLE `SysConf` (
  `id` int(11) NOT NULL,
  `KeyName` varchar(256) COLLATE utf8_bin NOT NULL,
  `KeyValue` varchar(257) COLLATE utf8_bin NOT NULL,
  `MdfTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `SysConf`
--

INSERT INTO `SysConf` (`id`, `KeyName`, `KeyValue`, `MdfTime`) VALUES
(1, 'ReformDeletePwd', '6HAI1K2W', '2019-01-01 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `TaskDealerGroup`
--

CREATE TABLE `TaskDealerGroup` (
  `id` int(11) NOT NULL,
  `GroupID` varchar(20) COLLATE utf8_bin NOT NULL,
  `TaskID` int(11) NOT NULL,
  `Name` varchar(20) COLLATE utf8_bin NOT NULL,
  `Corp` varchar(10) COLLATE utf8_bin NOT NULL,
  `Role` varchar(10) COLLATE utf8_bin NOT NULL,
  `AddTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `TaskDealerGroup`
--

INSERT INTO `TaskDealerGroup` (`id`, `GroupID`, `TaskID`, `Name`, `Corp`, `Role`, `AddTime`) VALUES
(63, '20190114081721142', 69, '李光耀', '质检科', '组长', '2019-01-14 08:17:21'),
(64, '20190114081721142', 69, '伊晗', '质检科', '组员', '2019-01-14 08:17:21'),
(65, '20190114081721142', 69, '张梦祥', '质检科', '组员', '2019-01-14 08:17:21'),
(66, '20190115160243733', 72, '李光耀', '质检科', '组长', '2019-01-15 16:02:43'),
(67, '20190115160243733', 72, '伊晗', '质检科', '组员', '2019-01-15 16:02:43'),
(68, '20190115161036719', 73, '孙延军', '机务四队', '组长', '2019-01-15 16:10:36'),
(69, '20190115161048260', 73, '孙延军', '机务四队', '组长', '2019-01-15 16:10:48'),
(70, '20190115161048260', 73, '党立杰', '机务四队', '组员', '2019-01-15 16:10:48'),
(71, '20190121161727151', 103, '孙延军', '机务四队', '组长', '2019-01-21 16:17:27'),
(72, '20190121161727151', 103, '党立杰', '机务四队', '组员', '2019-01-21 16:17:27'),
(73, '20190228153038882', 79, '李光耀', '质检科', '组长', '2019-02-28 15:30:38'),
(74, '20190228153038882', 79, '张雪平', '质检科', '组员', '2019-02-28 15:30:38'),
(75, '20190228153038882', 79, '伊晗', '质检科', '组员', '2019-02-28 15:30:38'),
(76, '20190228153038882', 79, '张梦祥', '质检科', '组员', '2019-02-28 15:30:38'),
(77, '20190228153520242', 128, '李光耀', '质检科', '组长', '2019-02-28 15:35:20'),
(78, '20190228153520242', 128, '张雪平', '质检科', '组员', '2019-02-28 15:35:20'),
(79, '20190228153520242', 128, '伊晗', '质检科', '组员', '2019-02-28 15:35:20'),
(80, '20190228153520242', 128, '张梦祥', '质检科', '组员', '2019-02-28 15:35:20'),
(81, '20190228153535514', 127, '李光耀', '质检科', '组长', '2019-02-28 15:35:35'),
(82, '20190228153535514', 127, '张雪平', '质检科', '组员', '2019-02-28 15:35:35'),
(83, '20190228153535514', 127, '伊晗', '质检科', '组员', '2019-02-28 15:35:35'),
(84, '20190228153535514', 127, '张梦祥', '质检科', '组员', '2019-02-28 15:35:35'),
(85, '20190228153643349', 126, '伊晗', '质检科', '组长', '2019-02-28 15:36:43'),
(86, '20190228153643349', 126, '李光耀', '质检科', '组员', '2019-02-28 15:36:43'),
(87, '20190228153643349', 126, '张梦祥', '质检科', '组员', '2019-02-28 15:36:43'),
(88, '20190228153731475', 125, '李光耀', '质检科', '组长', '2019-02-28 15:37:31'),
(89, '20190228153731475', 125, '张雪平', '质检科', '组员', '2019-02-28 15:37:31'),
(90, '20190228153731475', 125, '伊晗', '质检科', '组员', '2019-02-28 15:37:31'),
(91, '20190228153731475', 125, '张梦祥', '质检科', '组员', '2019-02-28 15:37:31'),
(92, '20190228153740432', 124, '张雪平', '质检科', '组长', '2019-02-28 15:37:40'),
(93, '20190228153740432', 124, '李光耀', '质检科', '组员', '2019-02-28 15:37:40'),
(94, '20190228153740432', 124, '伊晗', '质检科', '组员', '2019-02-28 15:37:40'),
(95, '20190228153740432', 124, '张梦祥', '质检科', '组员', '2019-02-28 15:37:40'),
(96, '20190228154154848', 76, '李光耀', '质检科', '组长', '2019-02-28 15:41:54'),
(97, '20190228154154848', 76, '张雪平', '质检科', '组员', '2019-02-28 15:41:54'),
(98, '20190228154154848', 76, '王继红', '质检科', '组员', '2019-02-28 15:41:54'),
(99, '20190228154154848', 76, '伊晗', '质检科', '组员', '2019-02-28 15:41:54'),
(100, '20190228154224231', 77, '李光耀', '质检科', '组长', '2019-02-28 15:42:24'),
(101, '20190228154224231', 77, '伊晗', '质检科', '组员', '2019-02-28 15:42:24'),
(102, '20190228154239622', 78, '李光耀', '质检科', '组长', '2019-02-28 15:42:39'),
(103, '20190228154239622', 78, '伊晗', '质检科', '组员', '2019-02-28 15:42:39'),
(104, '20190301091805552', 129, '伊晗', '质检科', '组长', '2019-03-01 09:18:05'),
(105, '20190301091805552', 129, '张雪平', '质检科', '组员', '2019-03-01 09:18:05'),
(106, '20190301091816572', 80, '伊晗', '质检科', '组长', '2019-03-01 09:18:16'),
(107, '20190301091816572', 80, '张雪平', '质检科', '组员', '2019-03-01 09:18:16'),
(108, '20190301091816572', 80, '李光耀', '质检科', '组员', '2019-03-01 09:18:16'),
(109, '20190301091816572', 80, '张梦祥', '质检科', '组员', '2019-03-01 09:18:16'),
(110, '20190301091830376', 81, '伊晗', '质检科', '组长', '2019-03-01 09:18:30'),
(111, '20190301091830376', 81, '张雪平', '质检科', '组员', '2019-03-01 09:18:30'),
(112, '20190301091830376', 81, '李光耀', '质检科', '组员', '2019-03-01 09:18:30'),
(113, '20190301091830376', 81, '张梦祥', '质检科', '组员', '2019-03-01 09:18:30'),
(114, '20190301091840796', 82, '伊晗', '质检科', '组长', '2019-03-01 09:18:40'),
(115, '20190301091840796', 82, '张雪平', '质检科', '组员', '2019-03-01 09:18:40'),
(116, '20190301091840796', 82, '李光耀', '质检科', '组员', '2019-03-01 09:18:40'),
(117, '20190301091856451', 83, '李光耀', '质检科', '组长', '2019-03-01 09:18:56'),
(118, '20190301091856451', 83, '张雪平', '质检科', '组员', '2019-03-01 09:18:56'),
(119, '20190301091856451', 83, '伊晗', '质检科', '组员', '2019-03-01 09:18:56'),
(120, '20190301091856451', 83, '张梦祥', '质检科', '组员', '2019-03-01 09:18:56'),
(121, '20190301091909480', 84, '伊晗', '质检科', '组长', '2019-03-01 09:19:09'),
(122, '20190301091909480', 84, '张雪平', '质检科', '组员', '2019-03-01 09:19:09'),
(123, '20190301091909480', 84, '李光耀', '质检科', '组员', '2019-03-01 09:19:09'),
(124, '20190301091922890', 85, '李光耀', '质检科', '组长', '2019-03-01 09:19:22'),
(125, '20190301091922890', 85, '张雪平', '质检科', '组员', '2019-03-01 09:19:22'),
(126, '20190301091922890', 85, '伊晗', '质检科', '组员', '2019-03-01 09:19:22'),
(127, '20190301091934533', 86, '伊晗', '质检科', '组长', '2019-03-01 09:19:34'),
(128, '20190301091934533', 86, '张雪平', '质检科', '组员', '2019-03-01 09:19:34'),
(129, '20190301091934533', 86, '李光耀', '质检科', '组员', '2019-03-01 09:19:34'),
(130, '20190301091934533', 86, '张梦祥', '质检科', '组员', '2019-03-01 09:19:34'),
(131, '20190301091947776', 87, '李光耀', '质检科', '组长', '2019-03-01 09:19:47'),
(132, '20190301091947776', 87, '张雪平', '质检科', '组员', '2019-03-01 09:19:47'),
(133, '20190301091947776', 87, '伊晗', '质检科', '组员', '2019-03-01 09:19:47'),
(134, '20190301091947776', 87, '张梦祥', '质检科', '组员', '2019-03-01 09:19:47'),
(135, '20190301091957807', 88, '李光耀', '质检科', '组长', '2019-03-01 09:19:57'),
(136, '20190301091957807', 88, '张雪平', '质检科', '组员', '2019-03-01 09:19:57'),
(137, '20190301091957807', 88, '伊晗', '质检科', '组员', '2019-03-01 09:19:57'),
(138, '20190301091957807', 88, '张梦祥', '质检科', '组员', '2019-03-01 09:19:57'),
(139, '20190301092006824', 102, '李光耀', '质检科', '组长', '2019-03-01 09:20:06'),
(140, '20190301092006824', 102, '张雪平', '质检科', '组员', '2019-03-01 09:20:06'),
(141, '20190301092006824', 102, '伊晗', '质检科', '组员', '2019-03-01 09:20:06'),
(142, '20190301092006824', 102, '张梦祥', '质检科', '组员', '2019-03-01 09:20:06'),
(143, '20190301092014495', 115, '伊晗', '质检科', '组长', '2019-03-01 09:20:14'),
(144, '20190301092014495', 115, '李光耀', '质检科', '组员', '2019-03-01 09:20:14'),
(145, '20190301092014495', 115, '张梦祥', '质检科', '组员', '2019-03-01 09:20:14'),
(146, '20190301092024252', 116, '李光耀', '质检科', '组长', '2019-03-01 09:20:24'),
(147, '20190301092024252', 116, '张雪平', '质检科', '组员', '2019-03-01 09:20:24'),
(148, '20190301092024252', 116, '伊晗', '质检科', '组员', '2019-03-01 09:20:24'),
(149, '20190301092032514', 118, '张雪平', '质检科', '组长', '2019-03-01 09:20:32'),
(150, '20190301092032514', 118, '李光耀', '质检科', '组员', '2019-03-01 09:20:32'),
(151, '20190301092032514', 118, '伊晗', '质检科', '组员', '2019-03-01 09:20:32'),
(152, '20190301092041860', 119, '李光耀', '质检科', '组长', '2019-03-01 09:20:41'),
(153, '20190301092041860', 119, '张雪平', '质检科', '组员', '2019-03-01 09:20:41'),
(154, '20190301092041860', 119, '伊晗', '质检科', '组员', '2019-03-01 09:20:41'),
(155, '20190301092052521', 120, '伊晗', '质检科', '组长', '2019-03-01 09:20:52'),
(156, '20190301092052521', 120, '张雪平', '质检科', '组员', '2019-03-01 09:20:52'),
(157, '20190301092052521', 120, '李光耀', '质检科', '组员', '2019-03-01 09:20:52'),
(158, '20190301092052521', 120, '张梦祥', '质检科', '组员', '2019-03-01 09:20:52'),
(159, '20190301092104884', 121, '李光耀', '质检科', '组长', '2019-03-01 09:21:04'),
(160, '20190301092104884', 121, '伊晗', '质检科', '组员', '2019-03-01 09:21:04'),
(161, '20190301092104884', 121, '张梦祥', '质检科', '组员', '2019-03-01 09:21:04'),
(162, '20190301092115613', 122, '张雪平', '质检科', '组长', '2019-03-01 09:21:15'),
(163, '20190301092115613', 122, '李光耀', '质检科', '组员', '2019-03-01 09:21:15'),
(164, '20190301092115613', 122, '伊晗', '质检科', '组员', '2019-03-01 09:21:15'),
(165, '20190301092115613', 122, '张梦祥', '质检科', '组员', '2019-03-01 09:21:15'),
(166, '20190301092128375', 123, '李光耀', '质检科', '组长', '2019-03-01 09:21:28'),
(167, '20190301092128375', 123, '张雪平', '质检科', '组员', '2019-03-01 09:21:28'),
(168, '20190301092128375', 123, '伊晗', '质检科', '组员', '2019-03-01 09:21:28'),
(169, '20190301092128375', 123, '张梦祥', '质检科', '组员', '2019-03-01 09:21:28'),
(170, '20190301150147260', 130, '伊晗', '质检科', '组长', '2019-03-01 15:01:47'),
(171, '20190301150147260', 130, '张雪平', '质检科', '组员', '2019-03-01 15:01:47'),
(172, '20190301150147260', 130, '张梦祥', '质检科', '组员', '2019-03-01 15:01:47');

-- --------------------------------------------------------

--
-- 表的结构 `TaskList`
--

CREATE TABLE `TaskList` (
  `id` int(11) NOT NULL,
  `ParentID` int(11) NOT NULL DEFAULT '0',
  `TaskType` varchar(50) COLLATE utf8_bin NOT NULL,
  `TaskName` varchar(512) COLLATE utf8_bin NOT NULL,
  `CreateTime` datetime DEFAULT NULL,
  `DeadLine` date DEFAULT NULL,
  `SenderName` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `CreatorName` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `SenderCorp` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `ReciveCorp` varchar(20) COLLATE utf8_bin NOT NULL,
  `GroupMember` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `DealGroupID` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `TaskInnerStatus` varchar(256) COLLATE utf8_bin DEFAULT NULL COMMENT '该任务当前的处理阶段',
  `Status` varchar(20) COLLATE utf8_bin DEFAULT '',
  `RelateID` int(11) NOT NULL,
  `isDeleted` varchar(10) COLLATE utf8_bin DEFAULT '否',
  `DeleterName` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `DeleteTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `TaskList`
--

INSERT INTO `TaskList` (`id`, `ParentID`, `TaskType`, `TaskName`, `CreateTime`, `DeadLine`, `SenderName`, `CreatorName`, `SenderCorp`, `ReciveCorp`, `GroupMember`, `DealGroupID`, `TaskInnerStatus`, `Status`, `RelateID`, `isDeleted`, `DeleterName`, `DeleteTime`) VALUES
(76, 0, '问题-整改', '工具借还记录填写不规范', '2019-01-18 09:02:36', NULL, '史相陆', '史相陆', '质检科', '质检科', '李光耀 张雪平 王继红 伊晗 ', '20190228154154848', NULL, '', 63, '否', NULL, NULL),
(77, 0, '问题-整改', '工具房工具盘点记录中“两周盘点”未填写', '2019-01-18 09:04:15', NULL, '史相陆', '史相陆', '质检科', '质检科', '李光耀 伊晗 ', '20190228154224231', NULL, '', 64, '否', NULL, NULL),
(78, 0, '问题-整改', '2015年机务工程部工具清查后新增工具未列入《工具总清单》', '2019-01-18 09:06:19', NULL, '史相陆', '史相陆', '质检科', '质检科', '李光耀 伊晗 ', '20190228154239622', NULL, '', 65, '否', NULL, NULL),
(79, 0, '问题-整改', '机务工程部收回的待校计量工具未分类存放，且未上锁', '2019-01-18 09:08:40', NULL, '史相陆', '史相陆', '质检科', '质检科', '李光耀 张雪平 伊晗 张梦祥 ', '20190228153038882', NULL, '', 66, '否', NULL, NULL),
(80, 0, '问题-整改', '机务三队移动空调(编号:YKTK002)故障停用，未悬挂禁用标牌', '2019-01-18 09:13:09', NULL, '史相陆', '史相陆', '质检科', '质检科', '伊晗 张雪平 李光耀 张梦祥 ', '20190301091816572', NULL, '', 67, '否', NULL, NULL),
(81, 0, '问题-整改', '机务一队计量工具柜工具清单与实物不符，无记录表明其工具去向', '2019-01-18 09:18:24', NULL, '史相陆', '史相陆', '质检科', '质检科', '伊晗 张雪平 李光耀 张梦祥 ', '20190301091830376', NULL, '', 68, '否', NULL, NULL),
(82, 0, '问题-整改', '机务一队工具箱(GJX025)内小桶存有航空汽油', '2019-01-18 09:22:25', NULL, '史相陆', '史相陆', '质检科', '质检科', '伊晗 张雪平 李光耀 ', '20190301091840796', NULL, '', 69, '否', NULL, NULL),
(83, 0, '问题-整改', '机务一队工具箱(GJX025)内喷油罐内，存有有效状态未知的航化品，无标签表明其内部航化品有效', '2019-01-18 09:24:35', NULL, '史相陆', '史相陆', '质检科', '质检科', '李光耀 张雪平 伊晗 张梦祥 ', '20190301091856451', NULL, '', 70, '否', NULL, NULL),
(84, 0, '问题-整改', '机务二队172千斤顶(QJD021)保养时间超期(检查时间为2019.01.17)', '2019-01-18 09:27:22', NULL, '史相陆', '史相陆', '质检科', '质检科', '伊晗 张雪平 李光耀 ', '20190301091909480', NULL, '', 71, '否', NULL, NULL),
(85, 0, '问题-整改', '机务二队千斤顶(20015)保养时间超期，检查时间为(2019.01.17)', '2019-01-18 09:30:31', NULL, '史相陆', '史相陆', '质检科', '质检科', '李光耀 张雪平 伊晗 ', '20190301091922890', NULL, '', 72, '否', NULL, NULL),
(86, 0, '问题-整改', '机务四队除冰液工具箱(GJX58)内PH试纸超期(其批号开头为2014,有效期三年)，且存有未列入清单的吸滴器', '2019-01-18 09:35:08', NULL, '史相陆', '史相陆', '质检科', '质检科', '伊晗 张雪平 李光耀 张梦祥 ', '20190301091934533', NULL, '', 73, '否', NULL, NULL),
(87, 0, '问题-整改', '机务四队存有未纳入工具箱清单的工具箱(GXJ42和GJX43)，且内部存有不明航材', '2019-01-18 09:39:54', NULL, '史相陆', '史相陆', '质检科', '质检科', '李光耀 张雪平 伊晗 张梦祥 ', '20190301091947776', NULL, '', 74, '否', NULL, NULL),
(88, 0, '问题-整改', '机务二队移动空调(20100324001)无保养标签，无罩布', '2019-01-18 09:56:17', NULL, '史相陆', '史相陆', '质检科', '质检科', '李光耀 张雪平 伊晗 张梦祥 ', '20190301091957807', NULL, '', 75, '否', NULL, NULL),
(89, 76, '整改通知书', '整改通知书', '2019-01-21 15:28:38', '2019-01-25', '史相陆', '史相陆', '质检科', '机务三队', NULL, NULL, '整改-待制定措施', '', 2, '否', NULL, NULL),
(90, 77, '整改通知书', '整改通知书', '2019-01-21 15:28:42', '2019-01-25', '史相陆', '史相陆', '质检科', '机务三队', NULL, NULL, '整改-待制定措施', '', 3, '否', NULL, NULL),
(91, 78, '整改通知书', '整改通知书', '2019-01-21 15:28:47', '2019-01-25', '史相陆', '史相陆', '质检科', '机务三队', NULL, NULL, '整改-待制定措施', '', 7, '否', NULL, NULL),
(92, 79, '整改通知书', '整改通知书', '2019-01-21 15:28:55', '2019-01-25', '史相陆', '史相陆', '质检科', '机务三队', NULL, NULL, '整改-待制定措施', '', 4, '否', NULL, NULL),
(93, 81, '整改通知书', '整改通知书', '2019-01-21 15:29:00', '2019-01-24', '史相陆', '史相陆', '质检科', '机务一队', NULL, NULL, '整改-待制定措施', '', 6, '否', NULL, NULL),
(94, 82, '整改通知书', '整改通知书', '2019-01-21 15:29:05', '2019-01-25', '史相陆', '史相陆', '质检科', '机务一队', NULL, NULL, '整改-待制定措施', '', 8, '否', NULL, NULL),
(95, 84, '整改通知书', '整改通知书', '2019-01-21 15:29:12', '2019-01-25', '史相陆', '史相陆', '质检科', '机务二队', NULL, NULL, '整改-待制定措施', '', 10, '否', NULL, NULL),
(96, 85, '整改通知书', '整改通知书', '2019-01-21 15:29:17', '2019-01-25', '史相陆', '史相陆', '质检科', '机务二队', NULL, NULL, '整改-待制定措施', '', 11, '否', NULL, NULL),
(97, 86, '整改通知书', '整改通知书', '2019-01-21 15:29:22', '2019-01-25', '史相陆', '史相陆', '质检科', '机务四队', NULL, NULL, '整改-待制定措施', '', 12, '否', NULL, NULL),
(98, 87, '整改通知书', '整改通知书', '2019-01-21 15:30:15', '2019-01-25', '史相陆', '史相陆', '质检科', '机务四队', NULL, NULL, '整改-待制定措施', '', 13, '否', NULL, NULL),
(99, 88, '整改通知书', '整改通知书', '2019-01-21 15:30:20', '2019-01-24', '史相陆', '史相陆', '质检科', '机务二队', NULL, NULL, '整改-待制定措施', '', 1, '否', NULL, NULL),
(100, 80, '整改通知书', '整改通知书', '2019-01-21 15:30:50', '2019-01-25', '史相陆', '史相陆', '质检科', '机务三队', NULL, NULL, '整改-待制定措施', '', 5, '否', NULL, NULL),
(101, 83, '整改通知书', '整改通知书', '2019-01-21 15:31:06', '2019-01-25', '史相陆', '史相陆', '质检科', '机务一队', NULL, NULL, '整改-待制定措施', '', 9, '否', NULL, NULL),
(102, 0, '问题-整改', '机务四队高杆灯门不可彻底关闭', '2019-01-21 15:59:03', NULL, '史相陆', '史相陆', '质检科', '质检科', '李光耀 张雪平 伊晗 张梦祥 ', '20190301092006824', NULL, '', 76, '否', NULL, NULL),
(104, 76, '整改通知书', '工具借还记录填写不规范', '2019-01-22 14:28:32', '2019-01-25', '史相陆', '史相陆', '质检科', '机务二队', NULL, NULL, '整改-待制定措施', '', 15, '否', NULL, NULL),
(115, 0, '问题-待处理', '工具设备-检验检查-', '2019-02-27 11:02:49', NULL, '史相陆  ', '史相陆  ', '质检科', '质检科', '伊晗 李光耀 张梦祥 ', '20190301092014495', NULL, '', 89, '否', NULL, NULL),
(116, 0, '问题-待处理', '工具设备-检验检查-设备未纳入管理', '2019-02-27 11:08:28', NULL, '史相陆  ', '史相陆  ', '质检科', '质检科', '李光耀 张雪平 伊晗 ', '20190301092024252', NULL, '', 90, '否', NULL, NULL),
(118, 0, '问题-待处理', '工具设备-检验检查-更换发动机工作台未纳入设备管理', '2019-02-27 14:42:59', NULL, '史相陆  ', '史相陆  ', '质检科', '质检科', '张雪平 李光耀 伊晗 ', '20190301092032514', NULL, '', 92, '否', NULL, NULL),
(119, 0, '问题-待处理', '工具设备-检验检查-高压气瓶使用不规范', '2019-02-27 14:59:25', NULL, '史相陆  ', '史相陆  ', '质检科', '质检科', '李光耀 张雪平 伊晗 ', '20190301092041860', NULL, '', 93, '否', NULL, NULL),
(120, 0, '问题-待处理', '器材--航化品--检验检查--器材标签不可见', '2019-02-28 10:30:07', NULL, '史相陆  ', '史相陆  ', '质检科', '质检科', '伊晗 张雪平 李光耀 张梦祥 ', '20190301092052521', NULL, '', 94, '否', NULL, NULL),
(121, 0, '问题-待处理', '工具设备--工具箱管理不规范', '2019-02-28 14:58:28', NULL, '史相陆  ', '史相陆  ', '质检科', '质检科', '李光耀 伊晗 张梦祥 ', '20190301092104884', NULL, '', 95, '否', NULL, NULL),
(122, 0, '问题-待处理', '工具设备--部分设备没有做防尘处理', '2019-02-28 15:02:13', NULL, '史相陆  ', '史相陆  ', '质检科', '质检科', '张雪平 李光耀 伊晗 张梦祥 ', '20190301092115613', NULL, '', 96, '否', NULL, NULL),
(123, 0, '问题-待处理', '现场管理---沉淀油油样柜的油样瓶存放和标签不能一一对应', '2019-02-28 15:05:55', NULL, '史相陆  ', '史相陆  ', '质检科', '质检科', '李光耀 张雪平 伊晗 张梦祥 ', '20190301092128375', NULL, '', 97, '否', NULL, NULL),
(124, 0, '问题-待处理', '现场管理--机库灰尘较多', '2019-02-28 15:09:41', NULL, '史相陆  ', '史相陆  ', '质检科', '质检科', '张雪平 李光耀 伊晗 张梦祥 ', '20190228153740432', NULL, '', 98, '否', NULL, NULL),
(125, 0, '问题-待处理', '工具设备--计量工具--气压表校验标签不可见', '2019-02-28 15:14:45', NULL, '史相陆  ', '史相陆  ', '质检科', '质检科', '李光耀 张雪平 伊晗 张梦祥 ', '20190228153731475', NULL, '', 99, '否', NULL, NULL),
(126, 0, '问题-整改', '工具设备--发动机维护工作梯防撞条缺失', '2019-02-28 15:17:01', NULL, '史相陆  ', '史相陆  ', '质检科', '质检科', '伊晗 李光耀 张梦祥 ', '20190228153643349', NULL, '', 100, '否', NULL, NULL),
(127, 0, '问题-待处理', '现场管理--定检用工具没有使用工具盘', '2019-02-28 15:20:41', NULL, '史相陆  ', '史相陆  ', '质检科', '质检科', '李光耀 张雪平 伊晗 张梦祥 ', '20190228153535514', NULL, '', 101, '否', NULL, NULL),
(128, 0, '问题-整改', '器材--航化品--航化品航材检验标签不可见', '2019-02-28 15:24:09', NULL, '史相陆  ', '史相陆  ', '质检科', '质检科', '李光耀 张雪平 伊晗 张梦祥 ', '20190228153520242', NULL, '', 102, '否', NULL, NULL),
(129, 0, '问题-待处理', 'B-3898飞机顶升后无人监管', '2019-02-28 15:49:54', NULL, '乔树旺  ', '乔树旺  ', '部领导', '质检科', '伊晗 张雪平 ', '20190301091805552', NULL, '', 103, '否', NULL, NULL),
(130, 0, '问题-待处理', '工具设备--专项检查---排污车无防大风措施', '2019-03-01 15:01:18', NULL, '史相陆  ', '史相陆  ', '质检科', '质检科', '伊晗 张雪平 张梦祥 ', '20190301150147260', NULL, '', 104, '否', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `TaskLog`
--

CREATE TABLE `TaskLog` (
  `id` int(11) NOT NULL,
  `TaskID` int(11) NOT NULL,
  `LogType` varchar(20) COLLATE utf8_bin NOT NULL,
  `RelatedID` int(11) NOT NULL,
  `SendCorp` varchar(20) COLLATE utf8_bin NOT NULL,
  `ReceiveCorp` varchar(20) COLLATE utf8_bin NOT NULL,
  `SendTime` datetime NOT NULL,
  `Log` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- 表的结构 `TaskMsg`
--

CREATE TABLE `TaskMsg` (
  `id` int(11) NOT NULL,
  `TaskID` int(11) NOT NULL,
  `SenderName` varchar(20) COLLATE utf8_bin NOT NULL,
  `ReceiveGroup` varchar(20) COLLATE utf8_bin NOT NULL,
  `Msg` text COLLATE utf8_bin NOT NULL,
  `CreateTime` datetime NOT NULL,
  `State` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(1, 'cafccafc', 'atestu', '部领导', '乔树旺  ', '领导'),
(2, 'yikeshu', '697120', '部领导', '蒋平清  ', '领导'),
(3, 'songyan', 'songyan', '部领导', '宋炎    ', '领导'),
(4, 'zhangsq', '3189487', '部领导', '张绍群  ', '领导'),
(5, 'LUOHONG', '345678', '航材科', '骆红忠  ', '成员'),
(6, 'lhplhp', '608608', '航材科', '李恒鹏  ', '领导'),
(7, 'hckhwg', '920917', '航材科', '黄文刚  ', '成员'),
(8, 'CXLCXL', '680216', '航材科', '常小丽  ', '成员'),
(9, 'GAODAN', '831030', '航材科', '高丹    ', '成员'),
(10, 'LIXIAOYAN', '566666', '航材科', '李晓燕  ', '成员'),
(11, '机务航材张培', '654321', '航材科', '张培    ', '成员'),
(12, 'zwqdem', '80000000', '机务二队', '赵文强  ', '领导'),
(13, 'taofuyi', '990929', '机务二队', '陶福义  ', '成员'),
(14, 'HBFHBF', '760324', '机务二队', '韩宝峰  ', '领导'),
(15, '570824', '570824', '机务二队', '李水堂  ', '成员'),
(16, '111111', '222222', '机务二队', '郭祥亮  ', '成员'),
(17, 'NANYONGT', '121121', '机务二队', '南勇涛  ', '成员'),
(18, 'QIAOFENG', '780806', '机务二队', '袁浩    ', '成员'),
(19, 'liguodong', '990116', '机务二队', '李国栋  ', '成员'),
(20, 'gggggg', '760608', '机务二队', '郭振海  ', '成员'),
(21, 'FEI2008', '701145', '机务二队', '王向群  ', '成员'),
(22, 'yanglei', '654321', '机务二队', '杨雷    ', '领导'),
(23, 'niubinghui', '123456', '机务二队', '牛炳辉  ', '领导'),
(24, 'philips', 'philips', '机务二队', '郑斌    ', '成员'),
(25, 'daphne', '841102', '机务二队', '柴瑞    ', '成员'),
(26, 'shixinjun', 'sxjsxj', '机务二队', '史新军  ', '成员'),
(27, 'yanghongmei', '111111', '机务二队', '杨红梅  ', '成员'),
(28, 'haidaowei', '142886', '机务二队', '张伟    ', '成员'),
(29, '999999', '888888', '机务二队', '杨思君  ', '成员'),
(30, 'zzzzmm', '123456', '机务二队', '赵志敏  ', '成员'),
(31, 'zhp001', '19821004', '机务二队', '张洪浦  ', '成员'),
(32, 'wuwei123', '123456', '机务二队', '武伟    ', '成员'),
(33, 'yangzz', '0', '机务二队', '杨忠周  ', '成员'),
(34, 'zhoujiulai', 'zhoujiulai568', '机务二队', '周九来  ', '成员'),
(35, 'yangsizhu', 'yang00', '机务二队', '杨思柱  ', '成员'),
(36, 'Babyisme', 'Baby0208', '机务二队', '刘贝贝  ', '成员'),
(37, 'dwu_09', '123wazhd', '机务二队', '吴迪    ', '成员'),
(38, 'liuzongfu', '34345234', '机务二队', '刘宗福  ', '成员'),
(39, 'zhao3186426', '112233', '机务二队', '赵龙飞  ', '成员'),
(40, 'haohao2130686', 'abcd1234', '机务二队', '张铭裕  ', '成员'),
(41, 'shark617', '3826101', '机务二队', '王尚    ', '成员'),
(42, 'liming', '123456', '机务二队', '李明    ', '成员'),
(43, 'yuan720304', '3182305', '机务三队', '袁胜平  ', '领导'),
(44, 'dashuiya', '7505058920', '机务三队', '孟现召  ', '领导'),
(45, 'ffffff', '195837', '机务三队', '沈凤彩  ', '成员'),
(46, 'huatao', '666888', '机务三队', '化运涛  ', '成员'),
(47, 'YANGYUFENG', '790426', '机务三队', '杨豫封  ', '领导'),
(48, 'WSK19600129', '19600129', '机务三队', '王遂坤  ', '成员'),
(49, 'TangXiaoBo', '781214', '机务三队', '唐晓波  ', '成员'),
(50, 'YX1978', '231082', '机务三队', '杨鑫    ', '领导'),
(51, 'liuhuimin', 'liuhuimin', '机务三队', '刘惠民  ', '成员'),
(52, 'heqingmin', '13598160025', '机务三队', '何庆民  ', '成员'),
(53, 'hckcdz', '62328209', '机务三队', '王会川  ', '成员'),
(54, 'GJTGJT', '123456', '机务三队', '关金亭  ', '成员'),
(55, '123456', '123456', '机务三队', '张古生  ', '成员'),
(56, '15896555218', 'nannan7d806', '机务三队', '王楠楠  ', '成员'),
(57, 'dlj410327', '5010850108', '机务四队', '党利杰  ', '领导'),
(58, 'lhwddn', '123456', '机务四队', '陆红伟  ', '领导'),
(59, '3435.3602', '197535', '机务四队', '潘立军  ', '成员'),
(60, 'rabber', '803248', '机务四队', '王澄然  ', '领导'),
(61, '551212', '121255', '机务四队', '陈友才  ', '成员'),
(62, 'wangyajun', '991690', '机务四队', '汪亚军  ', '成员'),
(63, 'gaoyunjiang', '570707', '机务四队', '高云江  ', '成员'),
(64, 'YXLYXL', '135790', '机务四队', '余学礼  ', '成员'),
(65, 'jiajia', '981125', '机务四队', '贾建全  ', '成员'),
(66, 'gucuong', '751110', '机务四队', '王会山  ', '成员'),
(67, 'abcdef', '218', '机务四队', '冯杰    ', '成员'),
(68, 'wuchunqing', '3189548', '机务四队', '吴春青  ', '成员'),
(69, 'YINCHUN', '970611', '机务四队', '尹春雷  ', '成员'),
(70, 'shujinmei', '123456', '机务四队', '舒津梅  ', '成员'),
(71, '34353470', '1973414', '机务四队', '袁秦川  ', '成员'),
(72, 'flower', '555555', '机务四队', '韩存才  ', '成员'),
(73, 'HEJING', '3189301', '机务四队', '何京    ', '成员'),
(74, 'hlpalm', '3944747', '机务四队', '韩磊    ', '成员'),
(75, 'dsplwdsp', '159123', '机务四队', '刘伟    ', '成员'),
(76, 'zhangpeng', '275811', '机务四队', '张鹏    ', '成员'),
(77, 'libingyin', '123456', '机务四队', '李炳银  ', '成员'),
(78, 'sjdwade', '123456', '机务四队', '韩强    ', '成员'),
(79, 'zhangyufan', '123456', '机务四队', '张誉凡  ', '成员'),
(80, 'sunyanjun', 'sunyanjun', '机务四队', '孙延军  ', '成员'),
(81, 'zhangcunyue', '13233966426', '机务四队', '张存岳  ', '成员'),
(82, 'tobago', '2315101', '机务一队', '崔传捷  ', '成员'),
(83, 'aaaggg', '631200', '质检科', '张雪平  ', '成员'),
(84, 'huohuo', '60606', '机务一队', '霍修波  ', '成员'),
(85, 'CAIWEI111', '111111', '机务一队', '蔡卫    ', '领导'),
(86, 'kangxh', '153759', '机务一队', '亢小辉  ', '领导'),
(87, 'ZHAOJUN', '2211', '机务一队', '赵军    ', '成员'),
(88, 'ZZLZZL', '630415', '机务一队', '朱仲林  ', '领导'),
(89, 'fengfei3', '51089653', '机务一队', '吴建勋  ', '成员'),
(90, 'liukai', '3189399', '机务一队', '刘凯    ', '成员'),
(91, 'hanwei', '7415963', '机务一队', '韩卫    ', '领导'),
(92, 'guohongan', 'guohongan', '机务一队', '郭红安  ', '成员'),
(93, 'abcdefg', '0', '机务一队', '王剑峰  ', '成员'),
(94, 'cuiningtao', '7007', '机务一队', '崔宁涛  ', '成员'),
(95, 'wujiajia', '840202520', '机务一队', '武甲    ', '成员'),
(96, 'lbling', '123456', '机务一队', '刘宝林  ', '成员'),
(97, 'fusujian', '413319', '机务一队', '符富强  ', '成员'),
(98, 'flycloudxd', '0', '机务一队', '张毅    ', '成员'),
(99, '980550212', '111111', '机务一队', '王蒙恩  ', '成员'),
(100, 'yangze', '303495491', '机务一队', '杨泽    ', '成员'),
(101, 'weishaopeng', '629216', '机务一队', '卫少鹏  ', '成员'),
(102, 'wangyibo', '123456', '机务一队', '王毅博  ', '成员'),
(103, 'redfox', '8292382818', '技术科', '刘磊    ', '成员'),
(104, 'zhanggongwei', '3189465', '技术科', '张公伟  ', '成员'),
(105, 'foolfishpig', '846916762', '技术科', '余杰    ', '成员'),
(106, 'yugezi', 'yugezi', '技术科', '王凯    ', '领导'),
(107, 'folksongs', '143143', '技术科', '李自山  ', '成员'),
(108, 'CAFUC-STF', '19900302WOAINI', '技术科', '盛腾飞  ', '成员'),
(109, 'JWBSCK', '0', '生产科', '赵振平  ', '成员'),
(110, 'yqyqyq', '350109', '生产科', '杨颖    ', '成员'),
(111, 'hanhui', '814915', '生产科', '韩爱辉  ', '成员'),
(112, 'panxiangwu', '770110', '生产科', '潘向武  ', '成员'),
(113, 'qinguanggui', '0', '生产科', '秦广贵  ', '成员'),
(114, 'fanpengfei', '751024', '生产科', '樊鹏飞  ', '成员'),
(115, 'liuling', '19830626', '生产科', '刘玲    ', '成员'),
(116, 'yangheng', 'yangheng', '生产科', '杨姮    ', '成员'),
(117, 'guanshichao666', '8686886g', '生产科', '关世超  ', '成员'),
(118, 'HZXHZX', '63188961', '生产科', '赫忠献  ', '成员'),
(119, 'donghong', '998109', '生产科', '董红    ', '成员'),
(120, 'peiyifei', '123456', '生产科', '裴一斐  ', '成员'),
(121, 'wangjinyan', '626391', '质检科', '王金燕  ', '成员'),
(122, 'ccafc1', '664422', '质检科', '王继红  ', '领导'),
(123, 'xuepeng', '870105', '质检科', '薛鹏    ', '成员'),
(124, 'sxl6666', '981230', '质检科', '史相陆  ', '领导'),
(125, 'zkgy2000', 'yuanzhi', '质检科', '李光耀  ', '成员'),
(126, 'shineyyh', '87890856yy', '质检科', '伊晗    ', '成员'),
(127, 'zmx977613541', 'zmx613541', '质检科', '张梦祥  ', '成员');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `IDCrossIndex`
--
ALTER TABLE `IDCrossIndex`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `QuestionList`
--
ALTER TABLE `QuestionList`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `QuestionSource`
--
ALTER TABLE `QuestionSource`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ReformList`
--
ALTER TABLE `ReformList`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `SysConf`
--
ALTER TABLE `SysConf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `TaskDealerGroup`
--
ALTER TABLE `TaskDealerGroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `TaskList`
--
ALTER TABLE `TaskList`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `TaskLog`
--
ALTER TABLE `TaskLog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `TaskMsg`
--
ALTER TABLE `TaskMsg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `UserList`
--
ALTER TABLE `UserList`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `IDCrossIndex`
--
ALTER TABLE `IDCrossIndex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- 使用表AUTO_INCREMENT `QuestionList`
--
ALTER TABLE `QuestionList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- 使用表AUTO_INCREMENT `QuestionSource`
--
ALTER TABLE `QuestionSource`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `ReformList`
--
ALTER TABLE `ReformList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- 使用表AUTO_INCREMENT `SysConf`
--
ALTER TABLE `SysConf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `TaskDealerGroup`
--
ALTER TABLE `TaskDealerGroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;
--
-- 使用表AUTO_INCREMENT `TaskList`
--
ALTER TABLE `TaskList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- 使用表AUTO_INCREMENT `TaskLog`
--
ALTER TABLE `TaskLog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `TaskMsg`
--
ALTER TABLE `TaskMsg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `UserList`
--
ALTER TABLE `UserList`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
