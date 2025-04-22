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

 Date: 22/04/2025 17:06:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permission
-- ----------------------------
INSERT INTO `permission` VALUES (1, 'LoginIndex', '后台首页权限', 'App\\Http\\Controllers\\Admin\\LoginController@index', 'web', 0, 0, '2025-04-22 07:40:37', '2025-04-22 07:40:37', NULL);
INSERT INTO `permission` VALUES (2, 'UserCreate', '用户添加权限', 'App\\Http\\Controllers\\Admin\\UserController@create', 'web', 0, 0, '2025-04-22 07:41:28', '2025-04-22 07:41:28', NULL);
INSERT INTO `permission` VALUES (3, 'UserEdit', '用户修改权限', 'App\\Http\\Controllers\\Admin\\UserController@edit', 'web', 0, 0, '2025-04-22 07:42:15', '2025-04-22 07:42:15', NULL);
INSERT INTO `permission` VALUES (4, 'LoginWelcome', '后台欢迎页面', 'App\\Http\\Controllers\\Admin\\LoginController@welcome', 'web', 0, 0, '2025-04-22 07:42:56', '2025-04-22 07:42:56', NULL);
INSERT INTO `permission` VALUES (5, 'ArticleCreate', '文章添加权限', 'App\\Http\\Controllers\\Admin\\ArticleController@create', 'web', 0, 0, '2025-04-22 07:43:55', '2025-04-22 07:43:55', NULL);

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
INSERT INTO `permission_role` VALUES (1, 1);
INSERT INTO `permission_role` VALUES (1, 2);
INSERT INTO `permission_role` VALUES (1, 3);
INSERT INTO `permission_role` VALUES (1, 4);
INSERT INTO `permission_role` VALUES (1, 5);
INSERT INTO `permission_role` VALUES (2, 1);
INSERT INTO `permission_role` VALUES (2, 2);
INSERT INTO `permission_role` VALUES (2, 3);
INSERT INTO `permission_role` VALUES (3, 1);
INSERT INTO `permission_role` VALUES (3, 3);

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
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, '超级管理员', NULL, 'web', '2025-04-22 07:15:39', '2025-04-22 07:15:39', NULL);
INSERT INTO `roles` VALUES (2, '部门经理', NULL, 'web', '2025-04-22 07:16:07', '2025-04-22 07:16:07', NULL);
INSERT INTO `roles` VALUES (3, '总经理', NULL, 'web', '2025-04-22 07:44:54', '2025-04-22 07:44:54', NULL);

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
INSERT INTO `user_role` VALUES (1, 1);
INSERT INTO `user_role` VALUES (2, 2);
INSERT INTO `user_role` VALUES (2, 3);
INSERT INTO `user_role` VALUES (3, 2);

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
INSERT INTO `users` VALUES (1, 'admin', '$2y$10$Sn8Jt5.S87JWPXmrJxgQD.rVFgsqvtTE2NXLIrvumMTY0yLAkZUC2', '超级管理员', 'hullrich@example.com', NULL, 1, 1, NULL, NULL, '', '', '2025-04-22 07:10:07', 'ZBXmlvCH4F', '2025-04-22 07:10:08', '2025-04-22 07:10:08', NULL);
INSERT INTO `users` VALUES (2, 'Veda Blick', '$2y$10$x6Z5SbHyn7zg5D4t0RYfQ.DmWmK6/1kxWBDChjpGACv8aVSn7dZIi', 'Prof. Travis Sauer', 'brody.von@example.net', NULL, 1, 0, NULL, NULL, '', '', '2025-04-22 07:10:07', 'LS1etAl4FG', '2025-04-22 07:10:08', '2025-04-22 07:10:08', NULL);
INSERT INTO `users` VALUES (3, 'Prof. Maxwell Nitzsche', '$2y$10$PTtfc5YPLjAFVZsl55Pl3uyLy67kwKYJQmAGw8xcSy/twXIMCJUBu', 'Berneice Renner', 'pwisozk@example.org', NULL, 0, 0, NULL, NULL, '', '', '2025-04-22 07:10:07', 'nSl72n51xM', '2025-04-22 07:10:08', '2025-04-22 07:10:08', NULL);
INSERT INTO `users` VALUES (4, 'Dr. Lewis Sawayn DDS', '$2y$10$hlAHEqKDkJcz9FqGAiPVouWLGKoMIIVQZe0kg3spiHrUf0krxeZm.', 'Prof. Jay Ward', 'taryn20@example.org', NULL, 1, 1, NULL, NULL, '', '', '2025-04-22 07:10:07', 'pPQPpe3w7x', '2025-04-22 07:10:08', '2025-04-22 07:10:08', NULL);
INSERT INTO `users` VALUES (5, 'Adonis Yost', '$2y$10$KG8SYAQNeKCxBP84AEpajeOUt9TyokECinYncV1egjZONMVOIT1NG', 'Marc Morissette V', 'qcronin@example.net', NULL, 1, 1, NULL, NULL, '', '', '2025-04-22 07:10:07', 'AG0Ee7qHTl', '2025-04-22 07:10:08', '2025-04-22 07:10:08', NULL);
INSERT INTO `users` VALUES (6, 'Bennett Mraz', '$2y$10$Gyqfnc8hbdayAnWh6ayH.uCLq6e/fioQ9Hi.Hwp4ePZb1vWChSwVO', 'Prof. Chris Huels', 'wjakubowski@example.com', NULL, 1, 1, NULL, NULL, '', '', '2025-04-22 07:10:08', 'lgMvxMqJwJ', '2025-04-22 07:10:08', '2025-04-22 07:10:08', NULL);
INSERT INTO `users` VALUES (7, 'Dr. Jennie Kutch MD', '$2y$10$6IUJri/vGvK87h.NMQn70u0CQyibgC4lUmvSHPA8ceEd.Od3QWFM.', 'Harold Marks', 'esther59@example.net', NULL, 1, 1, NULL, NULL, '', '', '2025-04-22 07:10:08', 'brdzIr4xuu', '2025-04-22 07:10:08', '2025-04-22 07:10:08', NULL);
INSERT INTO `users` VALUES (8, 'Jerry Crona', '$2y$10$vbsS6cAV.62r7zX9z2RqzOw72g1jLBsFj6nDjyq6BnpXgK1dNORWK', 'Columbus Boehm', 'mertz.sigurd@example.org', NULL, 1, 1, NULL, NULL, '', '', '2025-04-22 07:10:08', 'IA0Aq2gHv2', '2025-04-22 07:10:08', '2025-04-22 07:10:08', NULL);
INSERT INTO `users` VALUES (9, 'Bart King', '$2y$10$fkHBT5W02TXgGviCT8D0NuHAaE4RMMDq.8qCWwJ3z6OmeCiozcYh6', 'Christine Pouros', 'enrique.torphy@example.com', NULL, 1, 1, NULL, NULL, '', '', '2025-04-22 07:10:08', '5J9DuhLc4a', '2025-04-22 07:10:08', '2025-04-22 07:10:08', NULL);
INSERT INTO `users` VALUES (10, 'Meredith Parker II', '$2y$10$PWPQSNV9rgpYAd9G2PnCRucO5aeVEJmeSRjdv26M6OSQ5esSdgzKq', 'Mr. Alejandrin O\'Kon V', 'dmills@example.org', NULL, 1, 1, NULL, NULL, '', '', '2025-04-22 07:10:08', 'VGeZ9Y6Yxy', '2025-04-22 07:10:08', '2025-04-22 07:10:08', NULL);

SET FOREIGN_KEY_CHECKS = 1;
