ALTER TABLE `mcc_customer` ADD `crm_id` varchar(50) NULL;

-- ----------------------------
--  Table structure for `mcc_style_match`
-- ----------------------------
DROP TABLE IF EXISTS `mcc_style_match`;
CREATE TABLE `mcc_style_match` (
  `match_id` int(11) NOT NULL AUTO_INCREMENT,
  `style_tag_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`match_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `mcc_style_match`
-- ----------------------------
BEGIN;
INSERT INTO `mcc_style_match` VALUES ('1', '1', '30'), ('2', '1', '31'), ('3', '2', '32'), ('4', '2', '33'), ('5', '3', '34'), ('6', '3', '35'), ('7', '4', '36'), ('8', '4', '37');
COMMIT;

-- ----------------------------
--  Table structure for `mcc_style_tag`
-- ----------------------------
DROP TABLE IF EXISTS `mcc_style_tag`;
CREATE TABLE `mcc_style_tag` (
  `style_tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `style_tag_name` varchar(50) NOT NULL,
  PRIMARY KEY (`style_tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `mcc_style_tag`
-- ----------------------------
BEGIN;
INSERT INTO `mcc_style_tag` VALUES ('1', '复古风格'), ('2', '英伦风格'), ('3', '清新风格'), ('4', '牛仔风格');
COMMIT;