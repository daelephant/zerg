/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : she

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-08-16 22:30:20
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `banner`
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT 'Banner名称，通常作为标识',
  `description` varchar(255) DEFAULT NULL COMMENT 'Banner描述',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='banner管理表';

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO banner VALUES ('1', '首页置顶', '首页轮播图', null, null);

-- ----------------------------
-- Table structure for `banner_item`
-- ----------------------------
DROP TABLE IF EXISTS `banner_item`;
CREATE TABLE `banner_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_id` int(11) NOT NULL COMMENT '外键，关联image表',
  `key_word` varchar(100) NOT NULL COMMENT '执行关键字，根据不同的type含义不同',
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '跳转类型，可能导向商品，可能导向专题，可能导向其他。0，无导向；1：导向商品;2:导向专题',
  `delete_time` int(11) DEFAULT NULL,
  `banner_id` int(11) NOT NULL COMMENT '外键，关联banner表',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COMMENT='banner子项表';

-- ----------------------------
-- Records of banner_item
-- ----------------------------
INSERT INTO banner_item VALUES ('1', '65', '6', '1', null, '1', null);
INSERT INTO banner_item VALUES ('2', '2', '25', '1', null, '1', null);
INSERT INTO banner_item VALUES ('3', '3', '11', '1', null, '1', null);
INSERT INTO banner_item VALUES ('5', '1', '10', '1', null, '1', null);

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '分类名称',
  `topic_img_id` int(11) DEFAULT NULL COMMENT '外键，关联image表',
  `delete_time` int(11) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL COMMENT '描述',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COMMENT='商品类目';

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO category VALUES ('1', '腕表', '6', null, null, null);
INSERT INTO category VALUES ('2', '箱包', '5', null, null, null);
INSERT INTO category VALUES ('3', '珠宝', '7', null, null, null);
INSERT INTO category VALUES ('4', '裸钻', '4', null, null, null);
INSERT INTO category VALUES ('5', '贵金属', '8', null, null, null);


-- ----------------------------
-- Table structure for `brand`
-- ----------------------------
DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '品牌名称',
  `brand_img_url` varchar(255) DEFAULT NULL COMMENT '主图ID号，这是一个反范式设计，有一定的冗余',
  `delete_time` int(11) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL COMMENT '描述',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COMMENT='品牌种类';

-- ----------------------------
-- Records of brand
-- ----------------------------
INSERT INTO brand VALUES ('1', 'A.lange&Sohne 朗格', '/product-vg@1.png', null, null, null);
INSERT INTO brand VALUES ('2', 'Audemars Piguet 爱彼', '/product-vg@1.png', null, null, null);
INSERT INTO brand VALUES ('3', 'Hermes 爱马仕', '/product-vg@1.png', null, null, null);
INSERT INTO brand VALUES ('4', 'Maurice Lacroix 艾美', '/product-vg@1.png', null, null, null);
INSERT INTO brand VALUES ('5', 'Ball 波尔', '/product-vg@1.png', null, null, null);


-- ----------------------------
-- Table structure for `image`
-- ----------------------------
DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL COMMENT '图片路径',
  `from` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 来自本地，2 来自公网',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COMMENT='图片总表';

-- ----------------------------
-- Records of image
-- ----------------------------
INSERT INTO image VALUES ('1', '/banner-1a.png', '1', null, null);
INSERT INTO image VALUES ('2', '/banner-2a.png', '1', null, null);
INSERT INTO image VALUES ('3', '/banner-3a.png', '1', null, null);
INSERT INTO image VALUES ('4', '/category-cake.png', '1', null, null);
INSERT INTO image VALUES ('5', '/category-vg.png', '1', null, null);
INSERT INTO image VALUES ('6', '/category-dryfruit.png', '1', null, null);
INSERT INTO image VALUES ('7', '/category-fry-a.png', '1', null, null);
INSERT INTO image VALUES ('8', '/category-tea.png', '1', null, null);
INSERT INTO image VALUES ('9', '/category-rice.png', '1', null, null);
INSERT INTO image VALUES ('10', '/product-dryfruit@1.png', '1', null, null);
INSERT INTO image VALUES ('13', '/product-vg@1.png', '1', null, null);
INSERT INTO image VALUES ('14', '/product-rice@6.png', '1', null, null);
INSERT INTO image VALUES ('16', '/1@theme.png', '1', null, null);
INSERT INTO image VALUES ('17', '/2@theme.png', '1', null, null);
INSERT INTO image VALUES ('18', '/3@theme.png', '1', null, null);
INSERT INTO image VALUES ('19', '/detail-1@1-dryfruit.png', '1', null, null);
INSERT INTO image VALUES ('20', '/detail-2@1-dryfruit.png', '1', null, null);
INSERT INTO image VALUES ('21', '/detail-3@1-dryfruit.png', '1', null, null);
INSERT INTO image VALUES ('22', '/detail-4@1-dryfruit.png', '1', null, null);
INSERT INTO image VALUES ('23', '/detail-5@1-dryfruit.png', '1', null, null);
INSERT INTO image VALUES ('24', '/detail-6@1-dryfruit.png', '1', null, null);
INSERT INTO image VALUES ('25', '/detail-7@1-dryfruit.png', '1', null, null);
INSERT INTO image VALUES ('26', '/detail-8@1-dryfruit.png', '1', null, null);
INSERT INTO image VALUES ('27', '/detail-9@1-dryfruit.png', '1', null, null);
INSERT INTO image VALUES ('28', '/detail-11@1-dryfruit.png', '1', null, null);
INSERT INTO image VALUES ('29', '/detail-10@1-dryfruit.png', '1', null, null);
INSERT INTO image VALUES ('31', '/product-rice@1.png', '1', null, null);
INSERT INTO image VALUES ('32', '/product-tea@1.png', '1', null, null);
INSERT INTO image VALUES ('33', '/product-dryfruit@2.png', '1', null, null);
INSERT INTO image VALUES ('36', '/product-dryfruit@3.png', '1', null, null);
INSERT INTO image VALUES ('37', '/product-dryfruit@4.png', '1', null, null);
INSERT INTO image VALUES ('38', '/product-dryfruit@5.png', '1', null, null);
INSERT INTO image VALUES ('39', '/product-dryfruit-a@6.png', '1', null, null);
INSERT INTO image VALUES ('40', '/product-dryfruit@7.png', '1', null, null);
INSERT INTO image VALUES ('41', '/product-rice@2.png', '1', null, null);
INSERT INTO image VALUES ('42', '/product-rice@3.png', '1', null, null);
INSERT INTO image VALUES ('43', '/product-rice@4.png', '1', null, null);
INSERT INTO image VALUES ('44', '/product-fry@1.png', '1', null, null);
INSERT INTO image VALUES ('45', '/product-fry@2.png', '1', null, null);
INSERT INTO image VALUES ('46', '/product-fry@3.png', '1', null, null);
INSERT INTO image VALUES ('47', '/product-tea@2.png', '1', null, null);
INSERT INTO image VALUES ('48', '/product-tea@3.png', '1', null, null);
INSERT INTO image VALUES ('49', '/1@theme-head.png', '1', null, null);
INSERT INTO image VALUES ('50', '/2@theme-head.png', '1', null, null);
INSERT INTO image VALUES ('51', '/3@theme-head.png', '1', null, null);
INSERT INTO image VALUES ('52', '/product-cake@1.png', '1', null, null);
INSERT INTO image VALUES ('53', '/product-cake@2.png', '1', null, null);
INSERT INTO image VALUES ('54', '/product-cake-a@3.png', '1', null, null);
INSERT INTO image VALUES ('55', '/product-cake-a@4.png', '1', null, null);
INSERT INTO image VALUES ('56', '/product-dryfruit@8.png', '1', null, null);
INSERT INTO image VALUES ('57', '/product-fry@4.png', '1', null, null);
INSERT INTO image VALUES ('58', '/product-fry@5.png', '1', null, null);
INSERT INTO image VALUES ('59', '/product-rice@5.png', '1', null, null);
INSERT INTO image VALUES ('60', '/product-rice@7.png', '1', null, null);
INSERT INTO image VALUES ('62', '/detail-12@1-dryfruit.png', '1', null, null);
INSERT INTO image VALUES ('63', '/detail-13@1-dryfruit.png', '1', null, null);
INSERT INTO image VALUES ('65', '/banner-4a.png', '1', null, null);
INSERT INTO image VALUES ('66', '/product-vg@4.png', '1', null, null);
INSERT INTO image VALUES ('67', '/product-vg@5.png', '1', null, null);
INSERT INTO image VALUES ('68', '/product-vg@2.png', '1', null, null);
INSERT INTO image VALUES ('69', '/product-vg@3.png', '1', null, null);

-- ----------------------------
-- Table structure for `order`
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(20) NOT NULL COMMENT '订单号',
  `user_id` int(11) NOT NULL COMMENT '外键，用户id，注意并不是openid',
  `delete_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `evaluate_price` int(11) DEFAULT NULL COMMENT '评估价格,单位：元',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:已提交， 2：待评估，3：已评估 , 4: 已出售 ，5：已退回，6：已取消',
  `snap_img` varchar(255) DEFAULT NULL COMMENT '订单快照图片',
  `snap_name` varchar(80) DEFAULT NULL COMMENT '订单快照名称',
  `update_time` int(11) DEFAULT NULL,
  `snap_items` text COMMENT '订单其他信息快照（json)',
  `snap_address` varchar(500) DEFAULT NULL COMMENT '地址快照',
  `prepay_id` varchar(100) DEFAULT NULL COMMENT '订单微信支付的预订单id（用于发送模板消息）',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_no` (`order_no`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO order VALUES ('1', 'B805347468773669', '1', null, '1533434746', '0.14', '2', 'http://z.cn/images/product-vg@2.png', '泥蒿 半斤等', '14', '1533434746', '[{\"id\":7,\"name\":\"\\u6ce5\\u84bf \\u534a\\u65a4\",\"main_img_url\":\"http:\\/\\/z.cn\\/images\\/product-vg@2.png\",\"count\":13,\"totalPrice\":0.13,\"price\":\"0.01\",\"counts\":13},{\"id\":8,\"name\":\"\\u590f\\u65e5\\u8292\\u679c 3\\u4e2a\",\"main_img_url\":\"http:\\/\\/z.cn\\/images\\/product-dryfruit@3.png\",\"count\":1,\"totalPrice\":0.01,\"price\":\"0.01\",\"counts\":1}]', '{\"name\":\"\\u5f20\\u4e09\",\"mobile\":\"020-81167888\",\"province\":\"\\u5e7f\\u4e1c\\u7701\",\"city\":\"\\u5e7f\\u5dde\\u5e02\",\"country\":\"\\u6d77\\u73e0\\u533a\",\"detail\":\"\\u65b0\\u6e2f\\u4e2d\\u8def397\\u53f7\",\"update_time\":\"1970-01-01 08:00:00\"}', null);
INSERT INTO order VALUES ('2', 'B805352527643001', '1', null, '1533435252', '0.01', '1', 'http://z.cn/images/product-dryfruit@3.png', '夏日芒果 3个', '1', '1533435252', '[{\"id\":8,\"name\":\"\\u590f\\u65e5\\u8292\\u679c 3\\u4e2a\",\"main_img_url\":\"http:\\/\\/z.cn\\/images\\/product-dryfruit@3.png\",\"count\":1,\"totalPrice\":0.01,\"price\":\"0.01\",\"counts\":1}]', '{\"name\":\"\\u5f20\\u4e09\",\"mobile\":\"020-81167888\",\"province\":\"\\u5e7f\\u4e1c\\u7701\",\"city\":\"\\u5e7f\\u5dde\\u5e02\",\"country\":\"\\u6d77\\u73e0\\u533a\",\"detail\":\"\\u65b0\\u6e2f\\u4e2d\\u8def397\\u53f7\",\"update_time\":\"1970-01-01 08:00:00\"}', null);
INSERT INTO order VALUES ('3', 'B806666136396627', '1', null, '1533566613', '0.02', '1', 'http://z.cn/images/product-dryfruit@2.png', '春生龙眼 500克', '2', '1533566613', '[{\"id\":5,\"name\":\"\\u6625\\u751f\\u9f99\\u773c 500\\u514b\",\"main_img_url\":\"http:\\/\\/z.cn\\/images\\/product-dryfruit@2.png\",\"count\":2,\"totalPrice\":0.02,\"price\":\"0.01\",\"counts\":2}]', '{\"name\":\"\\u5f20\\u4e09\",\"mobile\":\"020-81167888\",\"province\":\"\\u5e7f\\u4e1c\\u7701\",\"city\":\"\\u5e7f\\u5dde\\u5e02\",\"country\":\"\\u6d77\\u73e0\\u533a\",\"detail\":\"\\u65b0\\u6e2f\\u4e2d\\u8def397\\u53f7\",\"update_time\":\"1970-01-01 08:00:00\"}', null);
INSERT INTO order VALUES ('4', 'B808382720647804', '1', null, '1533738272', '0.01', '1', 'http://z.cn/images/product-dryfruit@5.png', '万紫千凤梨 300克', '1', '1533738272', '[{\"id\":10,\"name\":\"\\u4e07\\u7d2b\\u5343\\u51e4\\u68a8 300\\u514b\",\"main_img_url\":\"http:\\/\\/z.cn\\/images\\/product-dryfruit@5.png\",\"count\":1,\"totalPrice\":0.01,\"price\":\"0.01\",\"counts\":1}]', '{\"name\":\"\\u5f20\\u4e09\",\"mobile\":\"020-81167888\",\"province\":\"\\u5e7f\\u4e1c\\u7701\",\"city\":\"\\u5e7f\\u5dde\\u5e02\",\"country\":\"\\u6d77\\u73e0\\u533a\",\"detail\":\"\\u65b0\\u6e2f\\u4e2d\\u8def397\\u53f7\",\"update_time\":\"1970-01-01 08:00:00\"}', null);
INSERT INTO order VALUES ('5', 'B812579575673705', '1', null, '1534057957', '0.01', '1', 'http://z.cn/images/product-tea@1.png', '红袖枸杞 6克*3袋', '1', '1534057957', '[{\"id\":4,\"name\":\"\\u7ea2\\u8896\\u67b8\\u675e 6\\u514b*3\\u888b\",\"main_img_url\":\"http:\\/\\/z.cn\\/images\\/product-tea@1.png\",\"count\":1,\"totalPrice\":0.01,\"price\":\"0.01\",\"counts\":1}]', '{\"name\":\"\\u5f20\\u4e09\",\"mobile\":\"020-81167888\",\"province\":\"\\u5e7f\\u4e1c\\u7701\",\"city\":\"\\u5e7f\\u5dde\\u5e02\",\"country\":\"\\u6d77\\u73e0\\u533a\",\"detail\":\"\\u65b0\\u6e2f\\u4e2d\\u8def397\\u53f7\",\"update_time\":\"1970-01-01 08:00:00\"}', null);
INSERT INTO order VALUES ('6', 'B812599181855125', '1', null, '1534059918', '0.06', '1', 'http://z.cn/images/product-dryfruit@4.png', '冬木红枣 500克等', '6', '1534059918', '[{\"id\":9,\"name\":\"\\u51ac\\u6728\\u7ea2\\u67a3 500\\u514b\",\"main_img_url\":\"http:\\/\\/z.cn\\/images\\/product-dryfruit@4.png\",\"count\":5,\"totalPrice\":0.05,\"price\":\"0.01\",\"counts\":5},{\"id\":10,\"name\":\"\\u4e07\\u7d2b\\u5343\\u51e4\\u68a8 300\\u514b\",\"main_img_url\":\"http:\\/\\/z.cn\\/images\\/product-dryfruit@5.png\",\"count\":1,\"totalPrice\":0.01,\"price\":\"0.01\",\"counts\":1}]', '{\"name\":\"\\u5f20\\u4e09\",\"mobile\":\"020-81167888\",\"province\":\"\\u5e7f\\u4e1c\\u7701\",\"city\":\"\\u5e7f\\u5dde\\u5e02\",\"country\":\"\\u6d77\\u73e0\\u533a\",\"detail\":\"\\u65b0\\u6e2f\\u4e2d\\u8def397\\u53f7\",\"update_time\":\"1970-01-01 08:00:00\"}', null);
INSERT INTO order VALUES ('7', 'B812612498786827', '1', null, '1534061249', '0.01', '1', 'http://z.cn/images/product-dryfruit@4.png', '冬木红枣 500克', '1', '1534061249', '[{\"id\":9,\"name\":\"\\u51ac\\u6728\\u7ea2\\u67a3 500\\u514b\",\"main_img_url\":\"http:\\/\\/z.cn\\/images\\/product-dryfruit@4.png\",\"count\":1,\"totalPrice\":0.01,\"price\":\"0.01\",\"counts\":1}]', '{\"name\":\"\\u5f20\\u4e09\",\"mobile\":\"020-81167888\",\"province\":\"\\u5e7f\\u4e1c\\u7701\",\"city\":\"\\u5e7f\\u5dde\\u5e02\",\"country\":\"\\u6d77\\u73e0\\u533a\",\"detail\":\"\\u65b0\\u6e2f\\u4e2d\\u8def397\\u53f7\",\"update_time\":\"1970-01-01 08:00:00\"}', null);

-- ----------------------------
-- Table structure for `order_product`
-- ----------------------------
DROP TABLE IF EXISTS `order_product`;
CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL COMMENT '联合主键，订单id',
  `product_id` int(11) NOT NULL COMMENT '联合主键，商品id',
  `count` int(11) NOT NULL DEFAULT '0' COMMENT '商品数量',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`,`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of order_product
-- ----------------------------
INSERT INTO order_product VALUES ('5', '4', '1', null, null);
INSERT INTO order_product VALUES ('3', '5', '2', null, null);
INSERT INTO order_product VALUES ('1', '7', '1', null, null);
INSERT INTO order_product VALUES ('1', '8', '13', null, null);
INSERT INTO order_product VALUES ('2', '8', '1', null, null);
INSERT INTO order_product VALUES ('6', '9', '5', null, null);
INSERT INTO order_product VALUES ('7', '9', '1', null, null);
INSERT INTO order_product VALUES ('4', '10', '1', null, null);
INSERT INTO order_product VALUES ('6', '10', '1', null, null);

-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evaluate_price` int(11) DEFAULT NULL COMMENT '评估价格,单位：元',
  `market_price` int(11) DEFAULT NULL COMMENT '市场价格,单位：元',
  `delete_time` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `from` tinyint(4) NOT NULL DEFAULT '1' COMMENT '图片来自 1 本地 ，2公网',
  `new_level` tinyint(4) DEFAULT NULL DEFAULT '90' COMMENT '新旧',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL,
  `summary` varchar(50) DEFAULT NULL COMMENT '摘要',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO product VALUES ('1', null, null, null, '1', '2','1', '90',null, null,'刚收到镶金边劳力士');


-- ----------------------------
-- Table structure for `product_image`
-- ----------------------------
DROP TABLE IF EXISTS `product_image`;
CREATE TABLE `product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_id` int(11) NOT NULL COMMENT '物品，关联图片表',
  `delete_time` int(11) DEFAULT NULL COMMENT '状态，主要表示是否删除，也可以扩展其他状态',
  `order` int(11) NOT NULL DEFAULT '0' COMMENT '图片排序序号',
  `product_id` int(11) NOT NULL COMMENT '商品id，外键',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of product_image
-- ----------------------------
INSERT INTO product_image VALUES ('4', '19', null, '1', '1');
INSERT INTO product_image VALUES ('5', '20', null, '2', '1');
INSERT INTO product_image VALUES ('6', '21', null, '3', '1');


-- ----------------------------
-- Table structure for `third_app`
-- ----------------------------
DROP TABLE IF EXISTS `third_app`;
CREATE TABLE `third_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_id` varchar(64) NOT NULL COMMENT '应用app_id',
  `app_secret` varchar(64) NOT NULL COMMENT '应用secret',
  `app_description` varchar(100) DEFAULT NULL COMMENT '应用程序描述',
  `scope` varchar(20) NOT NULL COMMENT '应用权限',
  `scope_description` varchar(100) DEFAULT NULL COMMENT '权限描述',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='访问API的各应用账号密码表';

-- ----------------------------
-- Records of third_app
-- ----------------------------
INSERT INTO third_app VALUES ('1', 'starcraft', '777*777', 'CMS', '32', 'Super', null, null);

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(50) NOT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `extend` varchar(255) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL COMMENT '注册时间',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `openid` (`openid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO user VALUES ('1', 'oqwrH5Sz90KOs_mVJyZseoWqi2m8', null, null, null, null, null);

-- ----------------------------
-- Table structure for `user_address`
-- ----------------------------
DROP TABLE IF EXISTS `user_address`;
CREATE TABLE `user_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '收获人姓名',
  `nick_name` varchar(30) NOT NULL COMMENT '昵称',
  `mobile` varchar(20) NOT NULL COMMENT '手机号',
  `QQ` varchar(20) NOT NULL COMMENT 'QQ号码',
  `province` varchar(20) DEFAULT NULL COMMENT '省',
  `city` varchar(20) DEFAULT NULL COMMENT '市',
  `country` varchar(20) DEFAULT NULL COMMENT '区',
  `detail` varchar(100) DEFAULT NULL COMMENT '详细地址',
  `delete_time` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL COMMENT '外键',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user_address
-- ----------------------------
INSERT INTO user_address VALUES ('4', '张三', '小三','13381101326', '2224168716', '广东省', '广州市', '海珠区', '新港中路397号', null, '1', null);
