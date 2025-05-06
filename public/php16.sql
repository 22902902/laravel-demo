/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : php16

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 06/05/2025 17:05:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of articles
-- ----------------------------

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cate_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分类名称',
  `cate_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '分类标题',
  `slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'URL友好名称（唯一）',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT '分类描述（可选）',
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '分类图片（可选）',
  `is_active` tinyint(1) NOT NULL DEFAULT 1 COMMENT '是否启用（默认true）',
  `order` int(11) NOT NULL DEFAULT 0 COMMENT '排序权重',
  `parent_id` bigint(20) UNSIGNED NULL DEFAULT 0 COMMENT '父级ID（允许NULL）',
  `_lft` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '嵌套集合左值',
  `_rgt` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '嵌套集合右值',
  `depth` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '深度（0为顶级）',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `category_parent_id_foreign`(`parent_id`) USING BTREE,
  INDEX `category__lft__rgt_parent_id_index`(`_lft`, `_rgt`, `parent_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (1, '电子产品', '电子产品', '', NULL, NULL, 1, 0, NULL, 1, 10, 0, '2025-04-30 08:34:33', '2025-04-30 08:34:33');
INSERT INTO `category` VALUES (2, '手机', '手机', '', NULL, NULL, 1, 0, 1, 2, 7, 0, '2025-04-30 08:34:33', '2025-04-30 08:34:33');
INSERT INTO `category` VALUES (3, '智能手机', '智能手机', '', NULL, NULL, 1, 0, 2, 3, 4, 0, '2025-04-30 08:34:33', '2025-04-30 08:34:33');
INSERT INTO `category` VALUES (4, '功能手机', '功能手机', '', NULL, NULL, 1, 0, 2, 5, 6, 0, '2025-04-30 08:34:33', '2025-04-30 08:34:33');
INSERT INTO `category` VALUES (5, '笔记本电脑', '笔记本电脑', '', NULL, NULL, 1, 0, 1, 8, 9, 0, '2025-04-30 08:34:33', '2025-04-30 08:34:33');
INSERT INTO `category` VALUES (6, '服装', '服装', '', NULL, NULL, 1, 0, NULL, 11, 12, 0, '2025-04-30 08:34:33', '2025-04-30 08:34:33');

-- ----------------------------
-- Table structure for config
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config`  (
  `conf_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `conf_title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '标题',
  `conf_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '名称',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT '内容',
  `conf_order` int(11) NOT NULL DEFAULT 0 COMMENT '排序',
  `conf_tips` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '描述',
  `field_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '字段类型',
  `field_value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '类型值',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`conf_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of config
-- ----------------------------
INSERT INTO `config` VALUES (1, '网站标题', 'web_title', '网站标题1', 0, '<p>bbb</p>', 'input', '1', '2025-04-30 09:22:04', '2025-04-30 09:22:04');
INSERT INTO `config` VALUES (2, '统计代码', 'web_count', '百度统计11', 0, '<p>百度统计</p>', 'textarea', '1', '2025-05-06 01:39:35', '2025-05-06 01:39:35');
INSERT INTO `config` VALUES (3, '网站状态', 'web_status', '1', 0, '<p>网站开启状态</p>', 'radio', '1|开启,0|关闭', '2025-05-06 07:50:20', '2025-05-06 07:50:20');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2025_04_18_090923_create_roles_table', 1);
INSERT INTO `migrations` VALUES (5, '2025_04_18_091043_create_permission_table', 1);
INSERT INTO `migrations` VALUES (6, '2025_04_18_091410_create_user_role_table', 1);
INSERT INTO `migrations` VALUES (7, '2025_04_18_091515_create_permission_role_table', 1);
INSERT INTO `migrations` VALUES (8, '2025_04_23_073225_create_category_table', 1);
INSERT INTO `migrations` VALUES (9, '2025_04_28_061609_create_articles_table', 1);
INSERT INTO `migrations` VALUES (10, '2025_04_29_091440_create_config_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permission
-- ----------------------------
DROP TABLE IF EXISTS `permission`;
CREATE TABLE `permission`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '权限ID',
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '权限标识',
  `display_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '显示名称',
  `route` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '路由名称/地址',
  `guard_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'web' COMMENT '守卫类型',
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '父级权限',
  `sort` int(11) NOT NULL DEFAULT 0 COMMENT '排序权重',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL COMMENT '软删除时间',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permission_name_unique`(`name`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permission
-- ----------------------------

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role`  (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `permission_id`) USING BTREE,
  INDEX `permission_role_permission_id_foreign`(`permission_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of permission_role
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '角色ID',
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '角色名称',
  `description` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '角色描述',
  `guard_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'web' COMMENT '守卫类型',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL COMMENT '软删除时间',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_unique`(`name`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role`  (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`, `role_id`) USING BTREE,
  INDEX `user_role_role_id_foreign`(`role_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of user_role
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '登录账号',
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '邮箱',
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '手机号',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '状态 0=禁用 1=启用',
  `active` tinyint(1) NOT NULL DEFAULT 1 COMMENT '激活状态',
  `token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'API访问令牌',
  `expire_at` timestamp(0) NULL DEFAULT NULL COMMENT '令牌过期时间',
  `avatar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '头像',
  `openid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'openid',
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '记住我令牌',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL COMMENT '软删除时间',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', '$2y$10$3icF1R4pTPZkgBTalQzZdegTspkKZhhj08K5gOClC1/mGPxDzO.6G', '超级管理员', 'bogan.rowena@example.net', NULL, 1, 1, NULL, NULL, '', '', '2025-04-30 08:34:32', 'ZRWCMMPENt', '2025-04-30 08:34:32', '2025-04-30 08:34:33', NULL);
INSERT INTO `users` VALUES (2, 'Bella Raynor', '$2y$10$LhGANB/Bu6WTVfklAxHskuX5OCTLigu6NILnbtUNRSKwaoo1mVsWS', 'Mr. Willard Hauck', 'janet.okon@example.org', NULL, 1, 1, NULL, NULL, '', '', '2025-04-30 08:34:32', '0hj8LARn7V', '2025-04-30 08:34:32', '2025-04-30 08:34:32', NULL);
INSERT INTO `users` VALUES (3, 'Salma Buckridge I', '$2y$10$FKgB6ihiDZZ7Gg2qY04jwuiv19.35SxC5Pj/0MPxwI0/zpjR8quzy', 'Mr. Roger Pfannerstill', 'rice.aida@example.net', NULL, 1, 1, NULL, NULL, '', '', '2025-04-30 08:34:32', 'lvcdjYgWcK', '2025-04-30 08:34:32', '2025-04-30 08:34:32', NULL);
INSERT INTO `users` VALUES (4, 'Rahsaan Conn', '$2y$10$pFoX0iZj2OS4Ui9HKUxUIeGR0I7WR2EXkhdwyfHeuu6RnzS1hK3eK', 'Hosea Daniel', 'syundt@example.com', NULL, 1, 1, NULL, NULL, '', '', '2025-04-30 08:34:32', 'riMpP5R29I', '2025-04-30 08:34:32', '2025-04-30 08:34:32', NULL);
INSERT INTO `users` VALUES (5, 'Mrs. Krystina Bednar', '$2y$10$ztEcoaMVgQoWsdsP8q.zq.ZRj0UzPSAxgLodjCle8KakCu7Tg.wD2', 'Cyril Zboncak I', 'viola91@example.org', NULL, 1, 1, NULL, NULL, '', '', '2025-04-30 08:34:32', 'pIV7lPQQtK', '2025-04-30 08:34:32', '2025-04-30 08:34:32', NULL);
INSERT INTO `users` VALUES (6, 'Ethel King', '$2y$10$cm0dnneTU1Qj96HGTyR.EODyp/RKXehHNCMcOisowMPzBGxZi0rnC', 'Lane Emard II', 'dibbert.dustin@example.net', NULL, 1, 1, NULL, NULL, '', '', '2025-04-30 08:34:32', '2I1vGjQ6LS', '2025-04-30 08:34:32', '2025-04-30 08:34:32', NULL);
INSERT INTO `users` VALUES (7, 'Dr. Arch Reichert V', '$2y$10$pMiaY.tApSiNx3d5vVBhz.EqR6WTzIx//6JwtSDE0oNVvNJ1B1rGu', 'Magdalen Medhurst', 'brown.leonora@example.net', NULL, 1, 1, NULL, NULL, '', '', '2025-04-30 08:34:32', 'mpUaXwBDue', '2025-04-30 08:34:32', '2025-04-30 08:34:32', NULL);
INSERT INTO `users` VALUES (8, 'Katlynn Walter', '$2y$10$F9YXyXC7GVIvIIDTHJ6raudn1LXEN4TuO8b0eGxTD00jMuiCTTIb2', 'Reva Watsica', 'crona.selena@example.net', NULL, 1, 1, NULL, NULL, '', '', '2025-04-30 08:34:32', 'Pm34hAZfc1', '2025-04-30 08:34:32', '2025-04-30 08:34:32', NULL);
INSERT INTO `users` VALUES (9, 'Shakira Barrows', '$2y$10$sE7aX1eXVnggF81Zo78EMuVM.RpvzDbgX8wN2GotcnU.yfSOo6aHO', 'Helene Dibbert', 'clemens15@example.org', NULL, 1, 1, NULL, NULL, '', '', '2025-04-30 08:34:32', 'QwO7BvrxIO', '2025-04-30 08:34:32', '2025-04-30 08:34:32', NULL);
INSERT INTO `users` VALUES (10, 'Ignatius Jones', '$2y$10$/4rjUmdT19dqL2xcrgIv5OUuhfOnBWoOEISV93m0qb0zfVI7y0j1K', 'Darian Wilkinson', 'konopelski.crawford@example.org', NULL, 1, 1, NULL, NULL, '', '', '2025-04-30 08:34:32', 'rOkBTrH1fl', '2025-04-30 08:34:32', '2025-04-30 08:34:32', NULL);

SET FOREIGN_KEY_CHECKS = 1;
