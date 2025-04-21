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

 Date: 21/04/2025 17:21:19
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
) ENGINE = MyISAM AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (21, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (22, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (23, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (24, '2025_04_18_090923_create_roles_table', 1);
INSERT INTO `migrations` VALUES (25, '2025_04_18_091043_create_permissions_table', 1);
INSERT INTO `migrations` VALUES (26, '2025_04_18_091410_create_user_role_table', 1);
INSERT INTO `migrations` VALUES (27, '2025_04_18_091515_create_permission_role_table', 1);

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
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role`  (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `permission_role_role_id_foreign`(`role_id`) USING BTREE
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
INSERT INTO `permission_role` VALUES (2, 4);

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
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
  UNIQUE INDEX `permissions_name_unique`(`name`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'LoginIndex', '后台首页权限', 'App\\Http\\Controllers\\Admin\\LoginController@index', 'web', 0, 0, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (2, 'UserCreate', '用户添加权限', 'App\\Http\\Controllers\\Admin\\UserController@create', 'web', 0, 0, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (3, 'UserEdit', '用户修改权限', 'App\\Http\\Controllers\\Admin\\UserController@edit', 'web', 0, 0, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (4, 'LoginWelcome', '后台欢迎页面', 'App\\Http\\Controllers\\Admin\\LoginController@welcome', 'web', 0, 0, NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (5, 'ArticleCreate', '文章添加权限', 'App\\Http\\Controllers\\Admin\\ArticleController@create', 'web', 0, 0, NULL, NULL, NULL);

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
INSERT INTO `roles` VALUES (1, '系统管理员', NULL, 'web', NULL, NULL, NULL);
INSERT INTO `roles` VALUES (2, '部门经理', NULL, 'web', NULL, NULL, NULL);
INSERT INTO `roles` VALUES (3, '总经理', NULL, 'web', '2025-04-21 09:18:44', '2025-04-21 09:18:44', NULL);

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
INSERT INTO `user_role` VALUES (1, 2);

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
INSERT INTO `users` VALUES (1, 'admin', '$2y$10$ZotsGZIpH3VTAFJMUnsvr.bLz/8Qs.I3NL30Ei3.wDLreTRdkBIQC', '超级管理员', 'ortiz.abelardo@example.org', NULL, 1, 0, NULL, NULL, '', '', '2025-04-18 09:20:47', 'eUcj5ijXUk', '2025-04-18 09:20:48', '2025-04-18 09:20:48', NULL);
INSERT INTO `users` VALUES (2, 'Miss Mariane Schimmel DDS', '$2y$10$VaWGFjwwrWYmgZgH20XWHOhYvezLz56J4ushmzIJn7EMUXqSX1l6W', 'Jailyn Miller II', 'kirlin.tania@example.net', NULL, 0, 0, NULL, NULL, '', '', '2025-04-18 09:20:48', 'i6VlV5CsBX', '2025-04-18 09:20:48', '2025-04-18 09:20:48', NULL);
INSERT INTO `users` VALUES (3, 'Jarrell Oberbrunner', '$2y$10$5fEZZz8uJanpJGpl2wsea.PYf9WWkdexJKJSfTJC04WDWRUcMAn4G', 'Elliott Wyman I', 'considine.arnaldo@example.org', NULL, 1, 1, NULL, NULL, '', '', '2025-04-18 09:20:48', 'nuWNa9vPfm', '2025-04-18 09:20:48', '2025-04-18 09:20:48', NULL);
INSERT INTO `users` VALUES (4, 'Dr. Uriel Borer', '$2y$10$X7iepWCETnMYWA9bRTs42ORnw9l81Mv3EpTeWsrOU9dJCRGNpYfmK', 'Mr. Murray Howell', 'wilkinson.garnett@example.com', NULL, 1, 1, NULL, NULL, '', '', '2025-04-18 09:20:48', 'gFVsuX0IKs', '2025-04-18 09:20:48', '2025-04-18 09:20:48', NULL);
INSERT INTO `users` VALUES (5, 'Flossie Streich', '$2y$10$SgsIJlKh6x7Rb5d75eCfzeEznDygUeGOcE2DEHS0cyXUsHIzo4iNu', 'Zakary Purdy', 'frederique95@example.net', NULL, 1, 1, NULL, NULL, '', '', '2025-04-18 09:20:48', 'jQpb6fVPkx', '2025-04-18 09:20:48', '2025-04-18 09:20:48', NULL);
INSERT INTO `users` VALUES (6, 'Vladimir Steuber', '$2y$10$UyJX4qfyNkvn9nW3ij2i0uD.Wfi.49.0HO3zUmFBXUSgEzGxEpcDy', 'Milan Kemmer III', 'gerlach.caitlyn@example.com', NULL, 1, 1, NULL, NULL, '', '', '2025-04-18 09:20:48', 'Qantt2zTuL', '2025-04-18 09:20:48', '2025-04-18 09:20:48', NULL);
INSERT INTO `users` VALUES (7, 'Vergie Cartwright V', '$2y$10$U0.T2EGm5n0FB4Roh3qT0.Hz7x0nr9ropt9wm5k71qrNELs97e3Ba', 'Ms. Dariana Barrows DDS', 'hschuster@example.org', NULL, 1, 1, NULL, NULL, '', '', '2025-04-18 09:20:48', '9qNgwbfzbI', '2025-04-18 09:20:48', '2025-04-18 09:20:48', NULL);
INSERT INTO `users` VALUES (8, 'Dr. Liliane Deckow DDS', '$2y$10$7Q17o3nWXx7rAsD39Y88iupyyBeq/l4cg6NIsIpjUOiaXftKixuB.', 'Savion Lockman', 'shakira42@example.net', NULL, 1, 1, NULL, NULL, '', '', '2025-04-18 09:20:48', 'SOa1xPEewX', '2025-04-18 09:20:48', '2025-04-18 09:20:48', NULL);
INSERT INTO `users` VALUES (9, 'Annetta Torphy', '$2y$10$hpGXIlB1FLo4o11gLr73puCmgXBbgMFKNNV6f7JjfFt5/FqwlqPbS', 'Prof. Kristopher Hyatt I', 'aanderson@example.net', NULL, 1, 1, NULL, NULL, '', '', '2025-04-18 09:20:48', 'Y9GZRjJVg9', '2025-04-18 09:20:48', '2025-04-18 09:20:48', NULL);
INSERT INTO `users` VALUES (10, 'Royal Mante Sr.', '$2y$10$CUaw5QTM260r4LvRgzseC.2R.QgSzzdpmGh6CqkihaptRSsQRcDNG', 'Emile Bogisich', 'mullrich@example.net', NULL, 1, 1, NULL, NULL, '', '', '2025-04-18 09:20:48', 'qOPsppJYkN', '2025-04-18 09:20:48', '2025-04-18 09:20:48', NULL);

SET FOREIGN_KEY_CHECKS = 1;
