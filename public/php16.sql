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

 Date: 29/04/2025 17:10:29
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (7, '电子产品', '电子产品', '', NULL, NULL, 1, 15, NULL, 1, 10, 0, '2025-04-24 08:58:44', '2025-04-28 03:05:56');
INSERT INTO `category` VALUES (8, '手机', '手机', '', NULL, NULL, 1, 20, 7, 2, 7, 0, '2025-04-24 08:58:44', '2025-04-28 01:38:20');
INSERT INTO `category` VALUES (9, '智能手机', '智能手机', '', NULL, NULL, 1, 100, 8, 3, 4, 0, '2025-04-24 08:58:44', '2025-04-28 03:00:55');
INSERT INTO `category` VALUES (10, '功能手机', '功能手机', '', NULL, NULL, 1, 1, 8, 5, 6, 0, '2025-04-24 08:58:44', '2025-04-28 03:20:56');
INSERT INTO `category` VALUES (11, '笔记本电脑', '笔记本电脑', '', NULL, NULL, 1, 110, 7, 8, 9, 0, '2025-04-24 08:58:44', '2025-04-28 03:21:06');
INSERT INTO `category` VALUES (12, '服装', '服装', '', NULL, NULL, 1, 0, NULL, 11, 12, 0, '2025-04-24 08:58:44', '2025-04-24 08:58:44');

-- ----------------------------
-- Table structure for config
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config`  (
  `conf_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `conf_title` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '标题',
  `conf_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '变量名，名称',
  `conf_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL COMMENT '内容',
  `conf_order` int(11) NULL DEFAULT NULL COMMENT '排序',
  `conf_tips` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '描述',
  `field_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '字段类型',
  `field_value` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '类型值',
  PRIMARY KEY (`conf_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2025_04_18_090923_create_roles_table', 1);
INSERT INTO `migrations` VALUES (5, '2025_04_18_091043_create_permissions_table', 1);
INSERT INTO `migrations` VALUES (6, '2025_04_18_091410_create_user_role_table', 1);
INSERT INTO `migrations` VALUES (7, '2025_04_18_091515_create_permission_role_table', 1);
INSERT INTO `migrations` VALUES (8, '2025_04_23_073225_create_category_table', 1);

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
) ENGINE = MyISAM AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', '$2y$10$oXWYrr7QxEgntPJzhAkeOuMjp9AesX4NU6mQfIvX65HJ27BJxUcyG', '超级管理员', 'althea.lubowitz@example.org', NULL, 1, 1, NULL, NULL, '', '', '2025-04-24 08:56:13', 'cIepvlsOnr', '2025-04-24 08:56:14', '2025-04-24 08:56:14', NULL);
INSERT INTO `users` VALUES (2, 'Alexie Considine', '$2y$10$2oIq76IwhGC6geyFF3CYN.cUSjjn7qLHp2oB5Um1v0B7iPorgTEba', 'Clovis Anderson', 'reuben26@example.com', NULL, 1, 1, NULL, NULL, '', '', '2025-04-24 08:56:13', '4DCu53VCIj', '2025-04-24 08:56:14', '2025-04-24 08:56:14', NULL);
INSERT INTO `users` VALUES (3, 'Selmer Watsica II', '$2y$10$z5YgHi2vIdQOs45X5ha0vOXRIc15xM.44JR2UcpejEeWSorfO95Ni', 'Palma Ward', 'jaleel.hoeger@example.net', NULL, 1, 1, NULL, NULL, '', '', '2025-04-24 08:56:13', 'Nb6d25AWP6', '2025-04-24 08:56:14', '2025-04-24 08:56:14', NULL);
INSERT INTO `users` VALUES (4, 'Mrs. Meta Stanton', '$2y$10$UEWvCk5SSZIkNcfHAkyHpuERuRBwTnGzSGy6kdmbVlASVhJ.gpC2y', 'Prof. Chyna Nikolaus I', 'hardy77@example.net', NULL, 1, 1, NULL, NULL, '', '', '2025-04-24 08:56:13', 'KrHTdcjVFT', '2025-04-24 08:56:14', '2025-04-24 08:56:14', NULL);
INSERT INTO `users` VALUES (5, 'Teagan Donnelly', '$2y$10$Y4.o6MAyghksjT683aK5S.nM/KKhi6jkVe1THlWdHPMUE.zub1Boq', 'Asha Armstrong', 'myrl.goyette@example.net', NULL, 1, 1, NULL, NULL, '', '', '2025-04-24 08:56:13', 'rDn5ObfuQ4', '2025-04-24 08:56:14', '2025-04-24 08:56:14', NULL);
INSERT INTO `users` VALUES (6, 'Mr. Jerod Schamberger DDS', '$2y$10$tSxj6XUzsxOgH5HWDK1gdOCmEQFSgmIATrWd8lmh0g1IPbJlFKzWu', 'Rashawn Nikolaus V', 'claudia.ortiz@example.net', NULL, 1, 1, NULL, NULL, '', '', '2025-04-24 08:56:13', 'tRuqkz46Sq', '2025-04-24 08:56:14', '2025-04-24 08:56:14', NULL);
INSERT INTO `users` VALUES (7, 'Brain Little Sr.', '$2y$10$6.eGBbPzEuBu.00h.BSkruLbFjKFmhE6ur1xqnX6NqKhElv9uY3sm', 'Hailee Bauch', 'ntorp@example.org', NULL, 1, 1, NULL, NULL, '', '', '2025-04-24 08:56:13', 'guw3ezOnm8', '2025-04-24 08:56:14', '2025-04-24 08:56:14', NULL);
INSERT INTO `users` VALUES (8, 'Miss Bryana Steuber', '$2y$10$lnlybxd7EDUe4yDbFOgF9.9fsqEjDtJgrX9sjpre/Nxf51he4YYku', 'Waino Denesik', 'cummings.alison@example.org', NULL, 1, 1, NULL, NULL, '', '', '2025-04-24 08:56:14', 'vbsZe2GcQ5', '2025-04-24 08:56:14', '2025-04-24 08:56:14', NULL);
INSERT INTO `users` VALUES (9, 'Arvid Barrows MD', '$2y$10$illOlfXGQuTWw6wVyqlriu1NxVgLTop8wJCcaf0GNcrOJGlRyjeXW', 'Matilda Terry', 'jade42@example.com', NULL, 1, 1, NULL, NULL, '', '', '2025-04-24 08:56:14', 'Qa3AKLLrgO', '2025-04-24 08:56:14', '2025-04-24 08:56:14', NULL);
INSERT INTO `users` VALUES (10, 'Josefa Runolfsson III', '$2y$10$iLW4KF6Fmqjy5Qmt49k27OV7I24tWu1Qrehk16.aAF46LGpyoV9wm', 'Ms. Leilani Ratke', 'lurline.schuppe@example.com', NULL, 1, 1, NULL, NULL, '', '', '2025-04-24 08:56:14', 'FF6SryDSrt', '2025-04-24 08:56:14', '2025-04-24 08:56:14', NULL);
INSERT INTO `users` VALUES (11, 'Katelin Wilderman', '$2y$10$oci1vTFf6tV1M4CE/AT1Je1We3UJ/gOTqHB4Cqn8XyP1DQv8SePVK', 'Miss Rita Keebler', 'zachery.witting@example.org', NULL, 1, 1, NULL, NULL, '', '', '2025-04-24 08:58:43', 'rIoN7xAJWh', '2025-04-24 08:58:44', '2025-04-24 08:58:44', NULL);
INSERT INTO `users` VALUES (12, 'Joana Gottlieb DDS', '$2y$10$ad5BZILrBGwtgfxMLmN6B.YSKRWAcc1SGNkIH.bd6//sycF9s4k2u', 'Nelda Krajcik', 'vbrown@example.org', NULL, 1, 1, NULL, NULL, '', '', '2025-04-24 08:58:43', 'WPr8jmQiBi', '2025-04-24 08:58:44', '2025-04-24 08:58:44', NULL);
INSERT INTO `users` VALUES (13, 'Alison Reichert', '$2y$10$ZLthuqatsyvt8PIKVxI./uR5/RiJxUpJlQu4dwOhy9/mvRFeTxLLS', 'Mrs. Hildegard Walker II', 'madaline.rolfson@example.org', NULL, 1, 1, NULL, NULL, '', '', '2025-04-24 08:58:43', 'vzdUhUAqt4', '2025-04-24 08:58:44', '2025-04-24 08:58:44', NULL);
INSERT INTO `users` VALUES (14, 'Giuseppe Boyer PhD', '$2y$10$uWYYXFgCqbL3.Stl.pzzhOafLsqDzxfSV.36d0HYjDn9dybdyWQEC', 'Kristina Kautzer', 'chester62@example.net', NULL, 1, 1, NULL, NULL, '', '', '2025-04-24 08:58:43', '8uBu5mWtyS', '2025-04-24 08:58:44', '2025-04-24 08:58:44', NULL);
INSERT INTO `users` VALUES (15, 'Enid Gorczany', '$2y$10$D1E6ao6YrGVExm8P/Se2feLwDHXiTeJgXdviQJ2eyG0.E2tTBXFmG', 'Alexandre Gislason', 'ally56@example.net', NULL, 1, 1, NULL, NULL, '', '', '2025-04-24 08:58:44', '0x0pP1FuHu', '2025-04-24 08:58:44', '2025-04-24 08:58:44', NULL);
INSERT INTO `users` VALUES (16, 'Dariana Witting', '$2y$10$w1/nksBN9n7y2s4nyR1PW.xiy/P5.sAgDZy1Phe01zegzuhKaqO9.', 'Margret Friesen', 'gonzalo.dietrich@example.net', NULL, 1, 1, NULL, NULL, '', '', '2025-04-24 08:58:44', 'V53LSW6P0V', '2025-04-24 08:58:44', '2025-04-24 08:58:44', NULL);
INSERT INTO `users` VALUES (17, 'Alba Emmerich', '$2y$10$ZZKeTvDQEM3jQBO4xz.MWeKz23AuI7XYXKzLBNeC6HzfM.08eUkLK', 'Nathan Sawayn', 'xwalker@example.net', NULL, 1, 1, NULL, NULL, '', '', '2025-04-24 08:58:44', '2H7hxeBwEB', '2025-04-24 08:58:44', '2025-04-24 08:58:44', NULL);
INSERT INTO `users` VALUES (18, 'Mr. Bruce Bins', '$2y$10$98g7hrCo53Jx6IPiw0cnxez7ztRYzgGBjJy.etDYf7FO3Lf8/MDhS', 'Lavern Bauch', 'hills.vilma@example.com', NULL, 1, 1, NULL, NULL, '', '', '2025-04-24 08:58:44', 'KZ3qgRRZHg', '2025-04-24 08:58:44', '2025-04-24 08:58:44', NULL);
INSERT INTO `users` VALUES (19, 'Zetta Breitenberg', '$2y$10$I0uOGEk0W49N8ZIjyNssTOFIbSpIvpXY5XXji2rnl7eG33gvZLhw2', 'Gerhard Grady', 'ashleigh72@example.com', NULL, 1, 1, NULL, NULL, '', '', '2025-04-24 08:58:44', 'zYTzmKY8k7', '2025-04-24 08:58:44', '2025-04-24 08:58:44', NULL);
INSERT INTO `users` VALUES (20, 'Rubie Gerhold', '$2y$10$pAEMmES89FTao86tVoCVaO12onf8QUTFb94/qC6XsynfPD1FcwB5y', 'Dr. Sydnee Huels III', 'wdare@example.net', NULL, 1, 1, NULL, NULL, '', '', '2025-04-24 08:58:44', 'kkM3LRcsyk', '2025-04-24 08:58:44', '2025-04-24 08:58:44', NULL);

SET FOREIGN_KEY_CHECKS = 1;
