-- -----------------------------
-- Think MySQL Data Transfer 
-- 
-- Host     : 127.0.0.1
-- Port     : 3306
-- Database : shop
-- 
-- Part : #1
-- Date : 2018-07-19 21:40:33
-- -----------------------------

SET FOREIGN_KEY_CHECKS = 0;


-- -----------------------------
-- Table structure for `rg_user`
-- -----------------------------
DROP TABLE IF EXISTS `rg_user`;
CREATE TABLE `rg_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned DEFAULT NULL COMMENT '分销所属上线会员id',
  `did` int(10) DEFAULT NULL,
  `openid` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `openimg` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `subscribe` tinyint(1) unsigned DEFAULT '0' COMMENT '关注否 1-已关注 0-否',
  `serial` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `realname` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '真实姓名',
  `shopname` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '店名',
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` char(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '联系电话',
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) DEFAULT '0' COMMENT '1男，0女',
  `intro` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '生日',
  `province` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `detail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '详细地址',
  `score` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '积分余额',
  `wallet` decimal(10,2) DEFAULT '0.00' COMMENT '钱包余额',
  `spend_money` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '消费额',
  `cash_times` int(10) unsigned DEFAULT '0' COMMENT '消费次数',
  `apply_type_id` tinyint(1) DEFAULT NULL COMMENT '申请成为合伙人类型id 1-个人 2-商家',
  `apply_step` tinyint(1) DEFAULT NULL COMMENT '申请状态 9-被拒绝 1-申请中 2-已通过',
  `applied` tinyint(1) unsigned DEFAULT NULL COMMENT '是否申请过 0-没有 1-有',
  `apply_time` int(10) unsigned DEFAULT NULL COMMENT '申请时间',
  `refuse_reason` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `refuse_time` int(10) unsigned DEFAULT NULL,
  `mainpic` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '申请分销营业执照',
  `wx_number` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '微信号---唯一识别的那个(非openid)',
  `wx_friend_num` int(10) unsigned DEFAULT NULL COMMENT '微信好友数量',
  `return_rate` decimal(2,2) unsigned DEFAULT '0.00' COMMENT '拥金返还比例',
  `reg_ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `register_time` int(10) unsigned DEFAULT '0',
  `register_apply_step` tinyint(1) DEFAULT NULL,
  `register_applied` tinyint(1) DEFAULT NULL,
  `register_refuse_reason` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `register_refuse_time` int(10) DEFAULT NULL,
  `last_time` int(10) unsigned DEFAULT '0',
  `sign_time` int(10) DEFAULT '0' COMMENT '签到时间（大数据时使用此时不查sign表）',
  `last_ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '0',
  `login_count` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0-锁定   1-正常',
  `id_card` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '身份证号',
  `last_buy_id_card` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '上次购买身份证号',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `phone` (`phone`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -----------------------------
-- Records of `rg_user`
-- -----------------------------
INSERT INTO `rg_user` VALUES ('1', '0', '', 'o1eVisy6frx9mdfi6GalpgqjriHc', 'http://wx.qlogo.cn/mmopen/Q3auHgzwzM5xwCFqMI9z89iaPgoZUNH0vJz0W0a4UzycuZMzmib3lGHSNasLaicyes0Jvj9N6ja4oq3IpibO3FAr9BaMbNO5ic3iaGRuMObjKY8uU/0', '1', '', '穷摇.', '', '', 'o1eVisy6frx9mdfi6GalpgqjriHc', '0', '', '', '1', '', '', '罗斯康芒', '', '', '', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '', '0', '', '', '0', '0.00', '58.247.206.152', '1488360818', '1', '1', '', '0', '1488360818', '0', '58.247.206.152', '0', '1', '', '');
INSERT INTO `rg_user` VALUES ('2', '0', '', '', '/Public/Home/images/my_head.jpg', '0', '', '咻咻咻', '', '', 'e10adc3949ba59abbe56e057f20f883e', '15623530306', '', '', '0', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0', '0', '0', '0', '0', '', '0', '', '', '0', '0.00', '171.113.87.40', '1488361137', '1', '1', '', '0', '1488361137', '0', '171.113.87.40', '1', '1', '', '');
INSERT INTO `rg_user` VALUES ('3', '0', '', '', '/Uploads/comment-pic/2017-03-01/3-20170301175356.jpg', '0', '', 'cloud 飘飘', '', '', 'e10adc3949ba59abbe56e057f20f883e', '13006138433', '', '', '0', '', '2017-03-11', '', '', '', '', '25.00', '0.00', '0.00', '0', '0', '0', '0', '0', '', '0', '', '', '0', '0.00', '171.113.87.40', '1488361161', '2', '1', '', '0', '1518538880', '0', '113.57.250.192', '12', '1', '', '');
INSERT INTO `rg_user` VALUES ('4', '0', '', '', 'http://wx.qlogo.cn/mmopen/PiajxSqBRaEKib4UbzNebfnOUqjPCuCHerEpAZVE1fh3Fu0ibnNEftaqYy7qRt5YBc7JGnYlWic5PNrEAdtDVV6fgNQE7DWJf9GOXibZ2sSD5DRs/0', '0', '', '张锦飞', '张锦飞', '', '96e79218965eb72c92a549dd5a330112', '18012416742', '', '', '1', '', '2017-03-16', '北京市', '北京市', '东城区', '届民族', '13.00', '5.00', '0.00', '0', '1', '3', '1', '1489650690', '', '0', '', '你过年', '0', '0.00', '171.113.87.40', '1488361350', '2', '1', '', '0', '1502866689', '0', '111.47.14.205', '7', '1', '320683198811156776', '');
INSERT INTO `rg_user` VALUES ('6', '0', '', 'o1eVis8BPOuaN2OvKPXb5UbaFA3Q', 'http://wx.qlogo.cn/mmopen/t6NElkjp2HRqy3iaAgKHF6QelVakDnl8QlMJMu8DxVz2aLJOuG0Q3LGGFo5KqAbB94ydIdJ2CE6RDSARzoZZmxcIdwDRG1Mfib/0', '0', '', 'こ    陌影°', '', '', 'e10adc3949ba59abbe56e057f20f883e', '13237123955', '', '', '0', '', '1992-03-01', '湖北', '宜昌', '', '', '1003.00', '0.00', '0.00', '0', '0', '0', '0', '0', '', '0', '', '', '0', '0.00', '171.113.87.40', '1488361610', '2', '1', '', '0', '1488525469', '0', '27.18.69.5', '2', '1', '', '');
INSERT INTO `rg_user` VALUES ('7', '0', '18', 'o1eVis_c9gAlRZi_RaE4aAiKCz-Y', 'http://wx.qlogo.cn/mmopen/t6NElkjp2HSJ8RsLiatnv6JMyXibnBJL7tIFtehZXBSnfEgLBqF3VFYk80GNibY7y6u7hTvhYV3bzQ6ozGdAbbtLhvXRkLQ0f2W/0', '1', '', '嘿嘿', '兰谷科技', '', 'e10adc3949ba59abbe56e057f20f883e', '15623530305', '', '', '1', '', '2017-03-17', '北京市', '北京市', '东城区', '1', '991409.00', '0.00', '0.00', '0', '1', '3', '1', '1488792789', '', '0', '', '12', '0', '0.00', '171.113.87.40', '1488361724', '2', '1', '', '0', '1494059275', '0', '111.172.169.225', '5', '1', '444444444444444', '');
INSERT INTO `rg_user` VALUES ('8', '', '', '', '/Uploads/comment-pic/2017-03-07/8-20170307093231.jpeg', '0', '', 'bobo', '', '', 'e10adc3949ba59abbe56e057f20f883e', '18371123321', '', '', '0', '', '', '', '', '', '', '33.00', '6.87', '167.79', '82', '', '', '', '', '', '', '', '', '', '0.00', '171.113.87.40', '1488505854', '2', '1', '', '', '1528441329', '0', '61.129.6.147', '40', '1', '', '');
INSERT INTO `rg_user` VALUES ('9', '', '18', '', '/Public/Home/images/my_head.jpg', '0', '', 'test', '', '', 'e10adc3949ba59abbe56e057f20f883e', '15623530307', '', '', '0', '', '', '', '', '', '', '900.00', '0.00', '0.00', '0', '', '', '', '', '', '', '', '', '', '0.00', '27.18.69.5', '1488618749', '2', '1', '', '', '1488618750', '0', '27.18.69.5', '1', '1', '', '');
INSERT INTO `rg_user` VALUES ('10', '', '', 'o1eVis8T9LGjds7R_CNwXLyA5uhs', 'http://wx.qlogo.cn/mmopen/tUwHAVnG9KAk28kxDESF61RYfAeb4mIwWl7anaDrib2j5V7qeQj3Z0M0aVYEkhDpmY14xXkyElEgIKEOm7OwOSian4EKwvgtsR/0', '0', '', '周喜平', '', '', '46c8d14eef55255c0550d000838815e4', '17786534741', '', '', '1', '', '', '湖北', '武汉', '', '', '0.00', '0.00', '0.00', '0', '', '', '', '', '', '', '', '', '', '0.00', '140.207.54.74', '1489028947', '2', '1', '', '', '1489029094', '0', '221.234.199.149', '1', '1', '', '');
INSERT INTO `rg_user` VALUES ('11', '', '', 'o1eVisybcam3eieeGzTiHhwy7Bbk', 'http://wx.qlogo.cn/mmopen/YwLGyEl4x9S4AuqFn06YYRGvGxBxqZTG7OTzaIMdibn0aafWb9Ab0hvS81HkROBfx4N3qA4ZI4wnZPbEH8EfLkUaV9sI6cYjh/0', '1', '', '刘立芳', '', '', 'o1eVisybcam3eieeGzTiHhwy7Bbk', '', '', '', '0', '', '', '山东', '青岛', '', '', '0.00', '0.00', '0.00', '0', '', '', '', '', '', '', '', '', '', '0.00', '58.247.206.157', '1489549525', '1', '1', '', '', '1489549525', '0', '58.247.206.157', '0', '1', '', '');
INSERT INTO `rg_user` VALUES ('12', '', '', 'o1eVis29GI0j2Qzn_XBzxOTDckJE', 'http://wx.qlogo.cn/mmopen/ajNVdqHZLLBAeuBOiburyhVKHWsaKwqCAibZRlFumAeGzDJTicKFfiayiazHR5Dre1uJy7xOVYbfnnntK9iaoBQykmIw/0', '1', '', 'Mikelong', '', '', 'o1eVis29GI0j2Qzn_XBzxOTDckJE', '', '', '', '1', '', '', '山东', '青岛', '', '', '0.00', '0.00', '0.00', '0', '', '', '', '', '', '', '', '', '', '0.00', '140.207.54.73', '1489550866', '1', '1', '', '', '1489550866', '0', '140.207.54.73', '0', '1', '', '');
INSERT INTO `rg_user` VALUES ('13', '', '', 'o1eVis7Kx_mO-FrRwJbeVebdLnK4', 'http://wx.qlogo.cn/mmopen/wr4qYicJLBSrgtlD6mEUVESPY7nyZ21TCtewCVb6uibGZQJiczEpujPgPmuSXEkTeSd55r5vtX1lRJCvg5Odg8Z2IFYWqRSe0xL/0', '1', '', '外圆内方', '', '', 'o1eVis7Kx_mO-FrRwJbeVebdLnK4', '', '', '', '1', '', '', '湖北', '武汉', '', '', '0.00', '0.00', '0.00', '0', '', '', '', '', '', '', '', '', '', '0.00', '140.207.54.74', '1489552789', '1', '1', '', '', '1489552789', '0', '140.207.54.74', '0', '1', '', '');
INSERT INTO `rg_user` VALUES ('14', '', '', 'o1eVis2w2iYjcsaDHRufK-OPAmDg', 'http://wx.qlogo.cn/mmopen/PiajxSqBRaELeN29Ea1G5yTyzicxjXUbv3IQcO7fzY3gibj6tWibSK6huRONkEsic1zBU9yJicPq9G0hS0ziaTmVmuxFgvr8geIheUjnDpJzdD8joQ/0', '1', '', '陆忆远', '', '', 'o1eVis2w2iYjcsaDHRufK-OPAmDg', '', '', '', '1', '', '', '湖北', '武汉', '', '', '0.00', '0.00', '0.00', '0', '', '', '', '', '', '', '', '', '', '0.00', '58.247.206.153', '1489650096', '1', '1', '', '', '1489650096', '0', '58.247.206.153', '0', '1', '', '');
INSERT INTO `rg_user` VALUES ('15', '', '', 'o1eVis2R6mCiE4cKZbP7qfr5Op6g', 'http://wx.qlogo.cn/mmopen/7LHYrTN8jpSbiabibAHM38ibV30yichotALdp7lRkdwexfgfQcn9bHssnCp0m63ldxRLibnxYBSkUM43hIum303LvSUIG7eibCdTWU/0', '0', '', '范范', '范范', '', 'e10adc3949ba59abbe56e057f20f883e', '18627828097', '', '', '0', '', '2017-03-17', '北京市', '北京市', '东城区', '乐酷天', '3.00', '0.00', '0.00', '0', '2', '3', '1', '1489735187', '', '', '[\"/Uploads/comment-pic/2017-03-17/15-20170317151945.PNG\"]', '但饿咯', '', '0.00', '113.57.246.115', '1489735130', '2', '1', '', '', '1525741189', '0', '113.57.182.202', '3', '1', '429001198611235925', '');
INSERT INTO `rg_user` VALUES ('16', '', '', 'o1eVis9WqO_5uRvtzLqMUXlLLhNU', 'http://wx.qlogo.cn/mmopen/7LHYrTN8jpTFTpvHz62Yia00NYmb7ywGiaDLJYnicibLuVPUBdGibTwdju06j46PGg5RkeAZLOCPJuJibrfNRTUFQwap86giaEs9Z1D/0', '1', '', 'A0.9浮夸', '', '', 'o1eVis9WqO_5uRvtzLqMUXlLLhNU', '', '', '', '1', '', '', '湖北', '武汉', '', '', '0.00', '0.00', '0.00', '0', '', '', '', '', '', '', '', '', '', '0.00', '58.247.206.156', '1489746373', '1', '1', '', '', '1489746373', '0', '58.247.206.156', '0', '1', '', '');
INSERT INTO `rg_user` VALUES ('17', '', '', 'o1eVis3xBOTUBr0VYIYN8umyila4', 'http://wx.qlogo.cn/mmopen/Q3auHgzwzM5XOt71brcj9nM0COVZSLGno8yVzeql3eIJn70HpAN55PKJ0DuW69STnvEHpoDPt3YTYXENnpd5xw/0', '1', '', '无风起念', '', '', 'o1eVis3xBOTUBr0VYIYN8umyila4', '', '', '', '1', '', '', '湖北', '武汉', '', '', '0.00', '0.00', '0.00', '0', '', '', '', '', '', '', '', '', '', '0.00', '58.247.206.155', '1489832659', '1', '1', '', '', '1489832659', '0', '58.247.206.155', '0', '1', '', '');
INSERT INTO `rg_user` VALUES ('18', '', '', 'o1eViszJIXJWdbT_YM9fRcBPidKY', 'http://wx.qlogo.cn/mmopen/t6NElkjp2HSKAHic2y7t9SnCw5q0zyMDfZOnTRuv2a12BfyxvLkE4BGaa39M25KqKCewz8yaibhicB3IyOApjkhacZa6wp3picwV/0', '1', '', '涛涛小菜园阳台有机活体蔬菜', '', '', 'o1eViszJIXJWdbT_YM9fRcBPidKY', '', '', '', '1', '', '', '湖北', '荆门', '', '', '0.00', '0.00', '0.00', '0', '', '', '', '', '', '', '', '', '', '0.00', '140.207.54.74', '1489847327', '1', '1', '', '', '1489847327', '0', '140.207.54.74', '0', '1', '', '');
INSERT INTO `rg_user` VALUES ('19', '', '', 'oVJt5w4CinbpT_TqxjVp_P7EjzK4', 'http://wx.qlogo.cn/mmopen/ajNVdqHZLLDPNut6z3RXbh1yz9sGKH8OeOcyWOy7US8e1wB7R1P1KNTOVeobFXSPMcSuwZFy8MpvDbHwmFHWNA/0', '1', '', '网站-微信-定制开发 叮咚', '', '', 'oVJt5w4CinbpT_TqxjVp_P7EjzK4', '', '', '', '1', '', '', '湖北', '武汉', '', '', '0.00', '0.00', '0.00', '0', '', '', '', '', '', '', '', '', '', '0.00', '140.207.54.79', '1501055597', '1', '1', '', '', '1501055597', '0', '140.207.54.79', '0', '1', '', '');
INSERT INTO `rg_user` VALUES ('20', '', '', 'oVJt5wy71QLjIWdFGd05RxdVKui8', 'http://wx.qlogo.cn/mmopen/Q3auHgzwzM7KQCV7ibricmlvOVKgxA0y54foSpLYZP291ndGibKPqqQrwfAO3myhF5Gficz2Kos18rlKy40LSrHia8g/0', '1', '', '???? ', '', '', 'oVJt5wy71QLjIWdFGd05RxdVKui8', '', '', '', '1', '', '', '湖北', '武汉', '', '', '0.00', '0.00', '0.00', '0', '', '', '', '', '', '', '', '', '', '0.00', '140.207.54.76', '1501055620', '1', '1', '', '', '1501055620', '0', '140.207.54.76', '0', '1', '', '');
INSERT INTO `rg_user` VALUES ('22', '', '', 'oVJt5w1pjUmHtjpinPyrxY8_sVi4', 'http://wx.qlogo.cn/mmopen/Q3auHgzwzM7s3kgVF59ZknqYFYqv8VPohUpLev4ibiayGhV2q4jEaRvia4gBSgHZjUXDPibBlRYAFRuXNDkHGT8ib6w/0', '1', '', '肖申！？', '', '', 'oVJt5w1pjUmHtjpinPyrxY8_sVi4', '', '', '', '1', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0', '', '', '', '', '', '', '', '', '', '0.00', '140.207.54.75', '1501576769', '1', '1', '', '', '1501576769', '0', '140.207.54.75', '0', '1', '', '');
INSERT INTO `rg_user` VALUES ('23', '', '', 'oVJt5w9MXXG4uWX0TZMSfHEIZhYY', 'http://wx.qlogo.cn/mmopen/Q3auHgzwzM5Su3g7WNviblrppZKlKPs0bRQUCQ6ZBktQv9txFwmt6W1ATcSBZDETCiatlDNqRV9DQo1wWlQOslbibYZrKjbtAhppCm7szHU6JM/0', '1', '', '亦诚华彩光电', '', '', 'oVJt5w9MXXG4uWX0TZMSfHEIZhYY', '', '', '', '1', '', '', '北京', '', '', '', '0.00', '0.00', '0.00', '0', '', '', '', '', '', '', '', '', '', '0.00', '140.207.54.79', '1501853050', '1', '1', '', '', '1501853050', '0', '140.207.54.79', '0', '1', '', '');
INSERT INTO `rg_user` VALUES ('24', '', '', 'oVJt5wwyH0IZzcVizk-vw62RMKck', 'http://wx.qlogo.cn/mmopen/kJ8387jJzj9b1ia9lxtfe1OR7CLibEypWbicfsQQFuSKGMaQsvEYcujnFYBlKo6bgqibqDYYcQNvoaOxC6YCD1gZKErmANdP04am/0', '0', '', '小丫', '', '', 'oVJt5wwyH0IZzcVizk-vw62RMKck', '', '', '', '0', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0', '', '', '', '', '', '', '', '', '', '0.00', '140.207.54.76', '1503650586', '1', '1', '', '', '1503650586', '0', '140.207.54.76', '0', '1', '', '');
INSERT INTO `rg_user` VALUES ('25', '', '', 'oVJt5wy2vJTfe1mB8Z5AUI7qe764', 'http://wx.qlogo.cn/mmopen/Ffs9YFKWrzmBc17kTOzoZWx6BQatq9wibeBc0GAkk1lkvLRUKXWNrpPtmH9gxgBusYuUKIr4QMRDiaazGS41l4XGdKWKZmfBDx/0', '1', '', '创鑫时代光电科技～薛三石', '', '', 'oVJt5wy2vJTfe1mB8Z5AUI7qe764', '', '', '', '1', '', '', '江苏', '南京', '', '', '0.00', '0.00', '0.00', '0', '', '', '', '', '', '', '', '', '', '0.00', '140.207.54.75', '1503749103', '1', '1', '', '', '1503749103', '0', '140.207.54.75', '0', '1', '', '');
INSERT INTO `rg_user` VALUES ('26', '', '', 'oVJt5w8Sufg8pNxNLZ-QslobmdLs', 'http://wx.qlogo.cn/mmopen/kJ8387jJzj9b1ia9lxtfe1FBYPeaR584eAtIew185sK5M2k18rEtw5JtJIbjiaSsicticBE7Bibic6icVq7QhpjzYkRZylcyiblZwibIX/0', '1', '', '每根头发都在旅行.L', '', '', 'oVJt5w8Sufg8pNxNLZ-QslobmdLs', '', '', '', '0', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0', '', '', '', '', '', '', '', '', '', '0.00', '140.207.54.79', '1504412840', '1', '1', '', '', '1504412840', '0', '140.207.54.79', '0', '1', '', '');
INSERT INTO `rg_user` VALUES ('27', '', '', 'oVJt5w4qfQ0XGi-orZAx4AsuPsfY', 'http://wx.qlogo.cn/mmopen/kJ8387jJzjicDuJMgaqYI7VVkVNicGWYAXf7LPeibZwBHyxYZ6r7BMrhJWvNuaGYSA4m2icKD1dxppOBTWUbAcEULjIDfA8pAYzn/0', '1', '', '大满贯', '', '', 'oVJt5w4qfQ0XGi-orZAx4AsuPsfY', '', '', '', '1', '', '', '广东', '深圳', '', '', '0.00', '0.00', '0.00', '0', '', '', '', '', '', '', '', '', '', '0.00', '140.207.54.75', '1504412891', '1', '1', '', '', '1504412891', '0', '140.207.54.75', '0', '1', '', '');
INSERT INTO `rg_user` VALUES ('28', '', '', 'oVJt5w3bdYZZ93JXyP2c8xcCIh0c', 'http://wx.qlogo.cn/mmopen/QRNd31MP4KV16PKg4tsZMiciadT2uORk81gicuHadW79mtTJ7Rxy7yYtUOLNERWW3lY4TGj1xlBPLOpzWnHQtk7S73WMiafI1Bgy/0', '1', '', '谭玉鹏~LED显示屏', '', '', 'oVJt5w3bdYZZ93JXyP2c8xcCIh0c', '', '', '', '1', '', '', '湖北', '武汉', '', '', '0.00', '0.00', '0.00', '0', '', '', '', '', '', '', '', '', '', '0.00', '140.207.54.76', '1505200752', '1', '1', '', '', '1505200752', '0', '140.207.54.76', '0', '1', '', '');
INSERT INTO `rg_user` VALUES ('30', '', '', 'ozIGLv8K8QG982Z1WrWyyd6C22Uc', 'http://thirdwx.qlogo.cn/mmopen/Q3auHgzwzM6rddkcohx7opo0Dps0CbiaqsL5TbM2ZGNbKnV2pRRFdtgG8OibokV4sly7TibxIJmtlgqmcqYSc1Niciao5vjxUPPRjRlKyicjYljLk/132', '1', '', '俩人的温暖。', '', '', 'o1eVis5QuSjf3uJZaJM5Vr-RULuI', '', '', '', '1', '', '', '湖北', '荆门', '', '', '0.00', '0.00', '0.00', '0', '', '', '', '', '', '', '', '', '', '0.00', '140.207.54.75', '1520920497', '1', '1', '', '', '1520920497', '0', '140.207.54.75', '0', '1', '', '');
INSERT INTO `rg_user` VALUES ('31', '', '', 'o1eVis5QuSjf3uJZaJM5Vr-RULuI', 'http://thirdwx.qlogo.cn/mmopen/Q3auHgzwzM6rddkcohx7opo0Dps0CbiaqsL5TbM2ZGNbKnV2pRRFdtgG8OibokV4sly7TibxIJmtlgqmcqYSc1Niciao5vjxUPPRjRlKyicjYljLk/132', '1', '', '俩人的温暖。', '', '', 'o1eVis5QuSjf3uJZaJM5Vr-RULuI', '', '', '', '1', '', '', '湖北', '荆门', '', '', '0.00', '0.00', '0.00', '0', '', '', '', '', '', '', '', '', '', '0.00', '140.207.54.75', '1520928635', '1', '1', '', '', '1520928635', '0', '140.207.54.75', '0', '1', '', '');
INSERT INTO `rg_user` VALUES ('32', '', '', 'o1eVisxzLQYzHDAJpqBjsG8K2CrM', 'http://thirdwx.qlogo.cn/mmopen/wr4qYicJLBSqibS3MicxKBTeBxlTfr8IXSOD97kFOF0xjwSNVPsNPPxK0CHhHc62w1qkAAM5nta4IibNibWMzhWicRnAt2wp3mFZic9/132', '0', '', '薛定谔的猫，', '', '', '55587a910882016321201e6ebbc9f595', '13117058330', '', '', '1', '', '', '湖北', '荆门', '', '', '3.00', '0.00', '0.00', '0', '', '', '', '', '', '', '', '', '', '0.00', '140.207.54.76', '1524904170', '2', '1', '', '', '1528280916', '0', '182.131.10.54', '1', '1', '', '');
INSERT INTO `rg_user` VALUES ('33', '', '', 'o1eVis1yrwveL2sL2W7T8_GGNEdU', 'http://thirdwx.qlogo.cn/mmopen/Q3auHgzwzM6BX6Z41sl6IDt2rXlGc6GeKjhrrLW2MjST8ylkibShuzJluS7fkQia1eAFV3VT2Cibicr0KyK9KtiaxUxG8icQARRm5VTiblJv3ZQAEc/132', '1', '', 'A诗昱晞科技-小邹17341345260', '', '', 'o1eVis1yrwveL2sL2W7T8_GGNEdU', '', '', '', '0', '', '', '', '', '', '', '0.00', '0.00', '0.00', '0', '', '', '', '', '', '', '', '', '', '0.00', '140.207.54.76', '1524904889', '1', '1', '', '', '1524904889', '0', '140.207.54.76', '0', '1', '', '');
INSERT INTO `rg_user` VALUES ('34', '', '', 'o1eVis18EdtN4K85B8ZJEwcEom9Q', 'http://thirdwx.qlogo.cn/mmopen/DZKYaZYlOPkVvP8Akot3kCBVkKynPdfyXpbHl71RTv7vNNWrApCX5O4dutY08NLRianEVM9bPYS1uTqYKHChUwfY3g3PvaTCI/132', '0', '', '坐你正对面', '', '', 'o1eVis18EdtN4K85B8ZJEwcEom9Q', '', '', '', '1', '', '', '四川', '成都', '', '', '0.00', '0.00', '0.00', '0', '', '', '', '', '', '', '', '', '', '0.00', '140.207.54.76', '1524905251', '1', '1', '', '', '1524905251', '0', '140.207.54.76', '0', '1', '', '');
INSERT INTO `rg_user` VALUES ('35', '', '', 'o1eVis3zwZwbu1rgJO_5ojwJaGdA', 'http://thirdwx.qlogo.cn/mmopen/t6NElkjp2HT0rW0DiaZvmJBcicaogBpN33iaVch9Uc3ciaXkIibNyDVQyeLL5F9Csbl0M90DSLvXLiawVNsgXyDIC8MLFqIGo27rYT/132', '0', '', 'FTP楼sky拖', '', '', '15b1bd4dd824d422d93d76f53b166536', '15181938259', '', '', '1', '', '', '上海', '浦东新区', '', '', '0.00', '0.00', '0.00', '0', '', '', '', '', '', '', '', '', '', '0.00', '140.207.54.80', '1524905705', '2', '1', '', '', '1524905749', '0', '182.140.177.250', '1', '1', '', '');
INSERT INTO `rg_user` VALUES ('36', '', '', '', '/Public/Home/images/my_head.jpg', '0', '', '简', '六六六', '', '55587a910882016321201e6ebbc9f595', '13451165053', '', '', '1', '', '2017-08-23', '北京市', '北京市', '东城区', '只能取', '2.00', '0.00', '0.00', '0', '1', '3', '1', '1530068767', '', '', '', 'jwf663', '89', '0.00', '222.209.39.55', '1526456747', '2', '1', '', '', '1529722513', '0', '182.131.11.51', '8', '1', '420881199601231412', '');
INSERT INTO `rg_user` VALUES ('37', '', '', 'o1eViswKdiGtfZKLVVc2CJDSwwQE', 'http://thirdwx.qlogo.cn/mmopen/DQgGDOqYFIZicowpNhJf6mDZHL0tJ5WPJKfz3pBnG49icpxibhC1EhIsoXPH7YjVu2L1uvDvq9nqA5AZeNgWPThrw/132', '1', '', '百度直通车高扬', '', '', 'o1eViswKdiGtfZKLVVc2CJDSwwQE', '', '', '', '1', '', '', '湖北', '武汉', '', '', '0.00', '0.00', '0.00', '0', '', '', '', '', '', '', '', '', '', '0.00', '140.207.54.80', '1528710272', '1', '1', '', '', '1528710272', '0', '140.207.54.80', '0', '1', '', '');
