/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100126
 Source Host           : localhost:3306
 Source Schema         : tpcms

 Target Server Type    : MySQL
 Target Server Version : 100126
 File Encoding         : 65001

 Date: 20/07/2018 13:49:48
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for rg_ad
-- ----------------------------
DROP TABLE IF EXISTS `rg_ad`;
CREATE TABLE `rg_ad`  (
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cate_id` int(5) UNSIGNED NULL DEFAULT NULL,
  `title` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `thumb` char(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `url` char(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `target` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '_self',
  `created_at` int(10) UNSIGNED NULL DEFAULT NULL,
  `updated_at` int(10) UNSIGNED NULL DEFAULT NULL,
  `end_at` int(10) UNSIGNED NULL DEFAULT NULL,
  `sort` int(5) UNSIGNED NULL DEFAULT 50 COMMENT '排序',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rg_ad
-- ----------------------------
INSERT INTO `rg_ad` VALUES (2, 1, '', '/Public/Home/images/page_banner.png', 'http://b2c.whrango.cc/goods/detail/id/237.html', '_self', 1480942072, 1500888761, 1796474825, 50);
INSERT INTO `rg_ad` VALUES (3, 2, '', '/Uploads/picture/2018-07-20/5b516d8fb4145.jpg', '', '_self', 1480942072, 1532063121, 1796474820, 50);
INSERT INTO `rg_ad` VALUES (4, 1, '', '/Uploads/picture/2017-02-17/58a6a7a73000d.jpg', 'http://xcx.bingzhe.wang/goods/detail/id/74.html', '_self', 1484705473, 1487316904, 1800238252, 50);
INSERT INTO `rg_ad` VALUES (5, 1, '', '/Uploads/picture/2017-02-24/58afe77593c32.jpg', 'http://b2c.whrango.cc/goods/detail/id/237.html', '_self', 1487923062, 1500888743, 1803455856, 5);
INSERT INTO `rg_ad` VALUES (6, 1, '', '/Uploads/picture/2018-07-20/5b516d6c47dcf.jpg', 'http://b2c.whrango.cc/goods/detail/id/237.html', '_self', 1487923083, 1532063085, 1803455820, 2);
INSERT INTO `rg_ad` VALUES (7, 1, '', '/Uploads/picture/2017-02-24/58afe7934856c.jpg', 'http://xcx.bingzhe.wang/goods/detail/id/164.html', '_self', 1487923117, 1487923268, 1803455885, 3);
INSERT INTO `rg_ad` VALUES (11, 2, 'asd', '/Uploads/picture/2018-07-17/5b4d9a50ad12d.jpg', 'http://wx.whmickj.com/wechat1', '_self', 0, 0, 2028, 50);

-- ----------------------------
-- Table structure for rg_ad_cate
-- ----------------------------
DROP TABLE IF EXISTS `rg_ad_cate`;
CREATE TABLE `rg_ad_cate`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '链接组名称',
  `sort` int(5) UNSIGNED NULL DEFAULT 500 COMMENT '排序',
  `width` int(5) UNSIGNED NULL DEFAULT NULL COMMENT '宽',
  `height` int(5) UNSIGNED NULL DEFAULT NULL COMMENT '高',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rg_ad_cate
-- ----------------------------
INSERT INTO `rg_ad_cate` VALUES (1, '首页banner', 506, 640, 354);
INSERT INTO `rg_ad_cate` VALUES (2, '夺宝首页banner', 2, 412, 226);
INSERT INTO `rg_ad_cate` VALUES (3, 'banner图', 8, 0, 0);
INSERT INTO `rg_ad_cate` VALUES (4, '湿哒哒撒', 2, 0, 0);
INSERT INTO `rg_ad_cate` VALUES (5, '敌法师', 5, 400, 500);

-- ----------------------------
-- Table structure for rg_article
-- ----------------------------
DROP TABLE IF EXISTS `rg_article`;
CREATE TABLE `rg_article`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cate_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '标题',
  `title_color` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '标题颜色',
  `url` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '跳转的url',
  `thumb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '缩略图',
  `created_at` int(10) UNSIGNED NULL DEFAULT NULL,
  `updated_at` int(10) UNSIGNED NULL DEFAULT NULL,
  `click` int(10) UNSIGNED NULL DEFAULT 0 COMMENT '点击量',
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '关键字',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '描述',
  `sort` int(5) UNSIGNED NULL DEFAULT 500 COMMENT '排序',
  `is_stick` tinyint(1) UNSIGNED NULL DEFAULT 0 COMMENT '是否置顶 1-是  0-否',
  `extattr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT '附加属性',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 79 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rg_article
-- ----------------------------
INSERT INTO `rg_article` VALUES (67, 3, '购物指南2', '', '', '', 1483943882, 1531874349, 81, '<p>购物指南1内容0224</p><p>1注册并登录平台</p><p>用户注册：</p><p>点击微信公众号关注进入黄草帽,即注册成功。建议在“个人中心”页面完善身份证号等个人资料的信息，这对于您的购买成功很重要。</p><p>2加入购物车</p><p>挑选商品后，您可以“立即购买”或者“加入购物车”；</p><p>在购物车中，系统默认每件商品的订购数量为1件，如果您想购买多件商品，可修改购买数量；</p><p>在购物车中，您可以将商品单个或批量删除</p><p>3提交订单</p><p>【1】浏览要购买的商品，选择购买数量点击“立即购买”，直接结算。</p><p>【2】或者在购物车中，选择好商品及数量后“去结算”。</p><p>【3】填写购物个人信息，收货信息，使用优惠码等。</p><p>【4】支付货款确认无误后点击“提交订单”，生成新订单并显示订单编号。跳转至支付选择页面选择支付方式。供多种支付方式，订购过程中您可以选择：微信支付、支付宝支付。</p><p>【5】查看订单状态您可进入“个人中心”查看订单状态详细信息。</p><p>1. 待付款</p><p>当您提交订单但未支付货款时，“订单状态”将显示为等待付款。</p><p>2.&nbsp;待收货</p><p>当您的订单已由库房发出，正由快递公司送货，“订单状态”显示为等待收货。</p><p>3.&nbsp;待评价（查看是否交易成功）</p><p>当您还未签收商品，也就是物流没得到签收完成的状态，“订单状态”即显示无交易成功。</p><p>4.&nbsp;退货中</p><p>当您申请退货之后，即可点击此处按钮查看退货状态。如没完成，即显示退货中</p><p><br/></p><p><img src=\"/Uploads/editor/image/20170109/1483943931408485.jpg\" title=\"1483943931408485.jpg\" alt=\"W020130913573608634899.jpg\"/></p><p><br/></p><p><br/></p><p><img src=\"/Uploads/editor/image/20170109/1483943971617127.jpg\" title=\"1483943971617127.jpg\" alt=\"W020130913573608634899.jpg\"/></p>', '', '', 22, 1, '[]');
INSERT INTO `rg_article` VALUES (68, 4, '我是测试标题', '', '', '$page.thumb', 1488253080, 1531904790, 169, '&lt;p&gt;是的&lt;/p&gt;', '', '我是测试正文', 22, 1, '[{\"title\":\"图文消息描述2\",\"identify\":\"description\",\"widget\":\"textarea\",\"value\":\"\"},{\"title\":\"微信官方图文链接\",\"identify\":\"wx_official_news\",\"widget\":\"input_text\",\"value\":\"\"}]');
INSERT INTO `rg_article` VALUES (72, 3, '按时大大', '', '', '$page.thumb', 1531881900, 1531904674, 0, '', '', '', 500, 0, '[{\"title\":\"颜色\",\"identify\":\"color\",\"widget\":\"input_text\",\"value\":\"\"},{\"title\":\"首页公告\",\"identify\":\"size\",\"widget\":\"input_text\",\"value\":\"\"}]');
INSERT INTO `rg_article` VALUES (73, 4, '', '', '', '', 1531882200, 1531882396, 0, '', '', '', 500, 0, '[{\"title\":\"尺寸\",\"identify\":\"size\",\"widget\":\"input_text\",\"value\":\"阿萨德\"}]');
INSERT INTO `rg_article` VALUES (74, 3, '你好', '', 'http://wx.whmickj.com/wechat1', '/Uploads/picture/2018-07-18/5b4eb0ddf284a.jpg', 1531882500, 1531883755, 22, '<p>啊实打实大声道</p>', '阿萨德', '大幅度', 500, 0, '[{\"title\":\"尺寸\",\"identify\":\"size\",\"widget\":\"input_text\",\"value\":\"阿达\"}]');
INSERT INTO `rg_article` VALUES (75, 3, '米创考试3', '#00ff2e', 'http://wx.whmickj.com/wechat', '/Uploads/picture/2018-07-18/5b4eb4e04f284.jpg', 1531884720, 1531884789, 55, '<p>按时大大所多</p>', '阿萨德撒阿打算', '阿达', 500, 0, '[{\"title\":\"尺寸\",\"identify\":\"size\",\"widget\":\"input_text\",\"value\":\"啊实打实阿萨德\"}]');
INSERT INTO `rg_article` VALUES (76, 3, '啊实打实的阿达', '#ffff00', 'http://wx.whmickj.com/wechat', '/Uploads/picture/2018-07-17/5b4d9ae566254.jpg', 1531884840, 1531884881, 22, '是的干啥的噶水电费', '算法是', '水电费是打发阿萨', 500, 0, '[{\"title\":\"尺寸\",\"identify\":\"size\",\"widget\":\"input_text\",\"value\":\"是对方告诉对方\"}]');
INSERT INTO `rg_article` VALUES (77, 3, '沙发', '', '', '$page.thumb', 1531884900, 1531905222, 0, '&lt;p&gt;水电费供电所感受到&lt;/p&gt;', '', '', 21, 0, '[{\"title\":\"颜色\",\"identify\":\"color\",\"widget\":\"input_text\",\"value\":\"\"},{\"title\":\"首页公告\",\"identify\":\"size\",\"widget\":\"input_text\",\"value\":\"\"}]');
INSERT INTO `rg_article` VALUES (78, 4, '阿萨德', '', '', '[inputvalue]', 1531889580, 1531889632, 0, '', '', '', 500, 0, '[{\"title\":\"图文消息描述\",\"identify\":\"description\",\"widget\":\"textarea\",\"value\":\"\"},{\"title\":\"微信官方图文链接\",\"identify\":\"wx_official_news\",\"widget\":\"input_text\",\"value\":\"\"}]');

-- ----------------------------
-- Table structure for rg_article_attr
-- ----------------------------
DROP TABLE IF EXISTS `rg_article_attr`;
CREATE TABLE `rg_article_attr`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cateid` int(10) UNSIGNED NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `identify` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `widget` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sort` int(10) NULL DEFAULT 50,
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `need_real_fields` tinyint(1) NULL DEFAULT 0 COMMENT '是否需要真实数据库字段',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rg_article_attr
-- ----------------------------
INSERT INTO `rg_article_attr` VALUES (3, 3, '颜色', 'color', 'input_text', 50, 'nihao', 0);
INSERT INTO `rg_article_attr` VALUES (4, 1, '尺寸', 'size', 'input_text', 50, 'sa', 0);
INSERT INTO `rg_article_attr` VALUES (7, 1, '阿萨德', 'sizes', 'input_text', 50, 'asd', 0);
INSERT INTO `rg_article_attr` VALUES (8, 3, '首页公告', 'size', 'input_text', 50, '', 0);
INSERT INTO `rg_article_attr` VALUES (9, 4, '胡说', 'hushuo', 'input_text', 50, '', 0);

-- ----------------------------
-- Table structure for rg_article_cate
-- ----------------------------
DROP TABLE IF EXISTS `rg_article_cate`;
CREATE TABLE `rg_article_cate`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name_cn` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `path` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fullpath` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sort` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `thumb` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_able` tinyint(1) UNSIGNED NULL DEFAULT 1,
  `is_show` tinyint(1) UNSIGNED NULL DEFAULT 1 COMMENT '0-不显示  1-显示',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rg_article_cate
-- ----------------------------
INSERT INTO `rg_article_cate` VALUES (1, '网上报名', '', '0', ',1,', '1', '', 0, 1);
INSERT INTO `rg_article_cate` VALUES (3, '硬币纸币进出记录', '', ',1,', ',1,3,', '1,4', '', 1, 1);
INSERT INTO `rg_article_cate` VALUES (4, '联系我们', '', ',1,', ',1,4,', '1,3', '', 1, 1);

-- ----------------------------
-- Table structure for rg_article_comment
-- ----------------------------
DROP TABLE IF EXISTS `rg_article_comment`;
CREATE TABLE `rg_article_comment`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pid` int(10) UNSIGNED NULL DEFAULT NULL COMMENT '文章id',
  `uid` int(10) UNSIGNED NULL DEFAULT NULL COMMENT '会员id',
  `body` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `publish_time` int(10) UNSIGNED NULL DEFAULT NULL,
  `status` tinyint(2) UNSIGNED NULL DEFAULT 1 COMMENT '0-屏蔽--1-开启',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for rg_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `rg_auth_group`;
CREATE TABLE `rg_auth_group`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `rules` char(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rg_auth_group
-- ----------------------------
INSERT INTO `rg_auth_group` VALUES (1, '技术部管理', 1, '8,1');
INSERT INTO `rg_auth_group` VALUES (2, '市场部管理', 1, '8,7');

-- ----------------------------
-- Table structure for rg_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `rg_auth_group_access`;
CREATE TABLE `rg_auth_group_access`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `uid_group_id`(`uid`, `group_id`) USING BTREE,
  INDEX `uid`(`uid`) USING BTREE,
  INDEX `group_id`(`group_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rg_auth_group_access
-- ----------------------------
INSERT INTO `rg_auth_group_access` VALUES (1, 1, 1);
INSERT INTO `rg_auth_group_access` VALUES (2, 1, 2);
INSERT INTO `rg_auth_group_access` VALUES (12, 2, 1);
INSERT INTO `rg_auth_group_access` VALUES (13, 2, 2);
INSERT INTO `rg_auth_group_access` VALUES (10, 3, 1);
INSERT INTO `rg_auth_group_access` VALUES (11, 3, 2);
INSERT INTO `rg_auth_group_access` VALUES (4, 5, 1);
INSERT INTO `rg_auth_group_access` VALUES (5, 5, 2);

-- ----------------------------
-- Table structure for rg_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `rg_auth_rule`;
CREATE TABLE `rg_auth_rule`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` char(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `title` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `condition` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rg_auth_rule
-- ----------------------------
INSERT INTO `rg_auth_rule` VALUES (1, 'Admin-article-add', '新增文章', 0, 1, '');
INSERT INTO `rg_auth_rule` VALUES (7, '', '分值大于5005', 1, 0, '{code}>5005');
INSERT INTO `rg_auth_rule` VALUES (8, 'Admin-article-edit', '文章编辑', 0, 1, '');

-- ----------------------------
-- Table structure for rg_file
-- ----------------------------
DROP TABLE IF EXISTS `rg_file`;
CREATE TABLE `rg_file`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `savename` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `size` int(10) NULL DEFAULT NULL,
  `ext` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '扩展名',
  `md5` char(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sha1` char(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` tinyint(2) NULL DEFAULT NULL COMMENT '0-不显示，1-显示',
  `addtime` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for rg_group_access
-- ----------------------------
DROP TABLE IF EXISTS `rg_group_access`;
CREATE TABLE `rg_group_access`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `memberid` int(10) UNSIGNED NULL DEFAULT NULL,
  `groupid` int(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for rg_guestbook
-- ----------------------------
DROP TABLE IF EXISTS `rg_guestbook`;
CREATE TABLE `rg_guestbook`  (
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nickname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `qq` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `body` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` int(11) UNSIGNED NULL DEFAULT NULL,
  `response_at` int(11) UNSIGNED NULL DEFAULT NULL,
  `response` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `is_show` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1-显示  0-不显示',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rg_guestbook
-- ----------------------------
INSERT INTO `rg_guestbook` VALUES (1, '', '', '13237123955', '', '111111111111', 1487577432, 0, '', 1);
INSERT INTO `rg_guestbook` VALUES (2, '', '', '15391515213', '', '测试111111公司商城测试，xcx.bingzhe.wang', 1487577468, 0, '', 1);
INSERT INTO `rg_guestbook` VALUES (3, '', '', '15391515213', '', '测试0223，投诉建议0028', 1487839095, 0, '', 1);
INSERT INTO `rg_guestbook` VALUES (4, '', '', '15391515213', '', '想回家时间就是快上课就是就是开始', 1487919337, 0, '', 1);
INSERT INTO `rg_guestbook` VALUES (5, '', '', '15281722271', '', '经济技术急死死死死', 1487919350, 0, '', 1);
INSERT INTO `rg_guestbook` VALUES (6, '', '', '71772882882881', '', '计算机就是就是嫁鸡随鸡手机是', 1487919362, 0, '', 1);
INSERT INTO `rg_guestbook` VALUES (7, '', '', '', '', '急急急', 1488250193, 0, '', 1);
INSERT INTO `rg_guestbook` VALUES (11, '新手', '', '', '', '水电费萨顶顶发生的', 1531972430, 0, '', 1);
INSERT INTO `rg_guestbook` VALUES (12, '', '张锦飞', '18012416742', '', '是的撒大所多', 1531972800, 1531972920, '撒大声地', 1);

-- ----------------------------
-- Table structure for rg_manager
-- ----------------------------
DROP TABLE IF EXISTS `rg_manager`;
CREATE TABLE `rg_manager`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `pass` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `nickname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `lastlogintime` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `lastloginip` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `logintimes` mediumint(5) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rg_manager
-- ----------------------------
INSERT INTO `rg_manager` VALUES (1, 'master', 'eb0a191797624dd3a48fa681d3061212', '开发者', '1532065392', '127.0.0.1', 1070);
INSERT INTO `rg_manager` VALUES (4, 'rgmaker', 'ad948f101dc50c8065525b710d70e895', '我是管理员', '1478922746', '59.174.190.228', 1);
INSERT INTO `rg_manager` VALUES (5, 'test', '96e79218965eb72c92a549dd5a330112', '', '', '', 0);
INSERT INTO `rg_manager` VALUES (7, 'zhang', '96e79218965eb72c92a549dd5a330112', '你好A', NULL, NULL, 0);

-- ----------------------------
-- Table structure for rg_map
-- ----------------------------
DROP TABLE IF EXISTS `rg_map`;
CREATE TABLE `rg_map`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lng` decimal(9, 6) NULL DEFAULT NULL COMMENT '经度',
  `lat` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '纬度',
  `zoom` tinyint(2) NULL DEFAULT NULL COMMENT '缩放级别',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT '描述',
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '地址',
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '电话',
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '邮箱',
  `qq` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'qq',
  `created_at` int(10) UNSIGNED NULL DEFAULT NULL,
  `updated_at` int(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rg_map
-- ----------------------------
INSERT INTO `rg_map` VALUES (2, '地图1', 114.370970, '30.507849', 18, '&lt;p&gt;撒大声地是的阿达阿萨德&lt;/p&gt;&lt;p&gt;啊实打实大师的&lt;/p&gt;', '阿萨德阿萨德阿萨德2', '18012416742', '2436998260@qq.com', '2344', 1531736320, 1531965489);

-- ----------------------------
-- Table structure for rg_nav_cate
-- ----------------------------
DROP TABLE IF EXISTS `rg_nav_cate`;
CREATE TABLE `rg_nav_cate`  (
  `id` tinyint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_en` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name_cn` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `path` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fullpath` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sort` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `url` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `target` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '_self',
  `is_show` tinyint(1) UNSIGNED NULL DEFAULT 1 COMMENT '导航是否显示0-不显示  1-显示',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rg_nav_cate
-- ----------------------------
INSERT INTO `rg_nav_cate` VALUES (1, '', 'adasdasd', '0', ',1,', '1', 'http://wx.whmickj.com/wechat', '_self', 1);
INSERT INTO `rg_nav_cate` VALUES (2, 'Home', '网上报名', '0', ',2,', '2', '', '', 0);
INSERT INTO `rg_nav_cate` VALUES (3, 'Home', '网上报名', '0', ',3,', '3', '', '_self', 0);
INSERT INTO `rg_nav_cate` VALUES (4, '', 'asd', '0', ',4,', '4', '', '_self', 1);
INSERT INTO `rg_nav_cate` VALUES (5, 'ssfsf', '录取查询', '0', ',5,', '5', '/admin/question', '_self', 1);
INSERT INTO `rg_nav_cate` VALUES (6, 'Cinematographer', '哈哈', ',1,', ',1,6,', '1,6', '', '_self', 1);
INSERT INTO `rg_nav_cate` VALUES (7, 'asd ', '嘻嘻', ',1,', ',1,7,', '1,7', '', '_blank', 0);
INSERT INTO `rg_nav_cate` VALUES (8, 'Home', '网上报名', ',1,', ',1,8,', '1,8', 'http://wx.whmickj.com/wechat', '_self', 1);

-- ----------------------------
-- Table structure for rg_picture
-- ----------------------------
DROP TABLE IF EXISTS `rg_picture`;
CREATE TABLE `rg_picture`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `savename` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `width` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `height` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ext` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `md5` char(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `sha1` char(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` tinyint(2) NULL DEFAULT NULL,
  `addtime` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rg_picture
-- ----------------------------
INSERT INTO `rg_picture` VALUES (1, '/Uploads/picture/2018-07-20/5b516d8fb4145.jpg', '5b516d8fb4145.jpg', '28b2OOOPIC58.jpg', '650', '407', 'jpg', '4613a41290fcfae6121f9a967b771e7d', '6f8a3e2c778a3a714a843714accca2a0a810921c', 1, 1532063119);

-- ----------------------------
-- Table structure for rg_setting
-- ----------------------------
DROP TABLE IF EXISTS `rg_setting`;
CREATE TABLE `rg_setting`  (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `key` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `value` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `widget` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'input_text',
  `tip` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `type` tinyint(1) UNSIGNED NULL DEFAULT 0 COMMENT '0-不可删除--1-可删除',
  `sort` int(5) UNSIGNED NULL DEFAULT 500,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rg_setting
-- ----------------------------
INSERT INTO `rg_setting` VALUES (1, '站点名称', 'sitename', 'tpcms', 'input_text', '', 0, 500);
INSERT INTO `rg_setting` VALUES (2, '关键词', 'keywords', 'tpcms', 'input_text', '多个关键词间逗号“，”隔开', 0, 500);
INSERT INTO `rg_setting` VALUES (3, '网站描述', 'description', 'tpcms', 'textarea', '', 0, 500);
INSERT INTO `rg_setting` VALUES (4, '网站域名', 'domain', 'http://tpcms.cc', 'input_text', '以“http://”开头', 0, 500);
INSERT INTO `rg_setting` VALUES (6, '客服qq', 'service_qq', '505680672,287603202,3027453822', 'input_text', '建议最多填3个qq号码喔，格式（sample1,sample2,sample3）', 1, 500);
INSERT INTO `rg_setting` VALUES (16, '注册是否需要审核', 'register_whether_audit', '0', 'input_text', '1-需要审核 0-不需要', 1, 500);
INSERT INTO `rg_setting` VALUES (17, '注册抽奖机会赠送次数', 'register_send_wheel_opportunity_num', '1000', 'input_text', '注册赠送的抽奖机会次数', 1, 500);
INSERT INTO `rg_setting` VALUES (19, '嘻嘻', 'xixi', '139.196.51.74', 'input_text', 'hulai', 1, 44);

-- ----------------------------
-- Table structure for rg_sign
-- ----------------------------
DROP TABLE IF EXISTS `rg_sign`;
CREATE TABLE `rg_sign`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL DEFAULT 0,
  `score` int(10) NOT NULL DEFAULT 0,
  `last_date` date NULL DEFAULT NULL,
  `sign_count` smallint(5) UNSIGNED NULL DEFAULT NULL COMMENT '连续签到天数',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rg_sign
-- ----------------------------
INSERT INTO `rg_sign` VALUES (1, 3, 3, '2017-02-21', 1);
INSERT INTO `rg_sign` VALUES (4, 3, 7, '2017-02-22', 2);
INSERT INTO `rg_sign` VALUES (5, 1, 3, '2017-02-23', 1);
INSERT INTO `rg_sign` VALUES (6, 6, 3, '2017-02-24', 1);
INSERT INTO `rg_sign` VALUES (7, 1, 7, '2017-02-24', 2);
INSERT INTO `rg_sign` VALUES (8, 3, 3, '2017-02-28', 1);
INSERT INTO `rg_sign` VALUES (9, 4, 3, '2017-02-28', 1);
INSERT INTO `rg_sign` VALUES (10, 2, 3, '2017-02-28', 1);
INSERT INTO `rg_sign` VALUES (11, 4, 7, '2017-03-01', 2);
INSERT INTO `rg_sign` VALUES (12, 3, 7, '2017-03-01', 2);
INSERT INTO `rg_sign` VALUES (13, 4, 11, '2017-03-02', 3);
INSERT INTO `rg_sign` VALUES (14, 8, 3, '2017-03-03', 1);
INSERT INTO `rg_sign` VALUES (15, 6, 3, '2017-03-03', 1);
INSERT INTO `rg_sign` VALUES (16, 3, 3, '2017-03-05', 1);
INSERT INTO `rg_sign` VALUES (17, 8, 3, '2017-03-05', 1);
INSERT INTO `rg_sign` VALUES (18, 3, 7, '2017-03-06', 2);
INSERT INTO `rg_sign` VALUES (19, 8, 3, '2017-03-07', 1);
INSERT INTO `rg_sign` VALUES (20, 3, 3, '2017-04-08', 1);
INSERT INTO `rg_sign` VALUES (21, 3, 3, '2017-04-17', 1);
INSERT INTO `rg_sign` VALUES (22, 3, 3, '2017-05-09', 1);
INSERT INTO `rg_sign` VALUES (23, 3, 3, '2017-09-21', 1);
INSERT INTO `rg_sign` VALUES (24, 8, 3, '2017-12-06', 1);
INSERT INTO `rg_sign` VALUES (25, 3, 3, '2018-02-14', 1);
INSERT INTO `rg_sign` VALUES (26, 15, 3, '2018-05-08', 1);
INSERT INTO `rg_sign` VALUES (27, 32, 3, '2018-06-06', 1);

-- ----------------------------
-- Table structure for rg_tool_phone
-- ----------------------------
DROP TABLE IF EXISTS `rg_tool_phone`;
CREATE TABLE `rg_tool_phone`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `url` char(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `name` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `sort` int(5) NULL DEFAULT 50,
  `remark` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `is_show` tinyint(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rg_tool_phone
-- ----------------------------
INSERT INTO `rg_tool_phone` VALUES (2, 'tel:027-65028868', '在线客服', 50, '沙发上', 1);
INSERT INTO `rg_tool_phone` VALUES (3, 'tel:15391515213', '电话客服', 50, '', 1);

-- ----------------------------
-- Table structure for rg_tool_qq
-- ----------------------------
DROP TABLE IF EXISTS `rg_tool_qq`;
CREATE TABLE `rg_tool_qq`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `qq` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `name` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `sort` int(5) NULL DEFAULT 50,
  `remark` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `is_show` tinyint(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rg_tool_qq
-- ----------------------------
INSERT INTO `rg_tool_qq` VALUES (3, '23534534534', '客服3', 50, '水电', 0);

SET FOREIGN_KEY_CHECKS = 1;
