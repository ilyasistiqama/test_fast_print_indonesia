/*
 Navicat Premium Data Transfer

 Source Server         : local - MySQL
 Source Server Type    : MySQL
 Source Server Version : 80031
 Source Host           : localhost:3306
 Source Schema         : test_fast_print

 Target Server Type    : MySQL
 Target Server Version : 80031
 File Encoding         : 65001

 Date: 13/01/2025 10:27:59
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `id_category` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_category`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (1, 'L QUEENLY');
INSERT INTO `category` VALUES (2, 'L MTH AKSESORIS (IM)');
INSERT INTO `category` VALUES (3, 'L MTH TABUNG (LK)');
INSERT INTO `category` VALUES (4, 'SP MTH SPAREPART (LK)');
INSERT INTO `category` VALUES (5, 'CI MTH TINTA LAIN (IM)');
INSERT INTO `category` VALUES (6, 'L MTH AKSESORIS (LK)');
INSERT INTO `category` VALUES (7, 'S MTH STEMPEL (IM)');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (19, '2025-01-12-110229', 'App\\Database\\Migrations\\Category', 'default', 'App', 1736737792, 1);
INSERT INTO `migrations` VALUES (20, '2025-01-12-110235', 'App\\Database\\Migrations\\Status', 'default', 'App', 1736737792, 1);
INSERT INTO `migrations` VALUES (21, '2025-01-12-111345', 'App\\Database\\Migrations\\Product', 'default', 'App', 1736737793, 1);

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `id_product` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `price` int NULL DEFAULT NULL,
  `category_id` int UNSIGNED NOT NULL,
  `status_id` int UNSIGNED NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `synced_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_product`) USING BTREE,
  INDEX `product_category_id_foreign`(`category_id`) USING BTREE,
  INDEX `product_status_id_foreign`(`status_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 32 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES (1, 'ALCOHOL GEL POLISH CLEANSER GP-CLN01', 12500, 1, 1, '2025-01-13 10:18:35', '2025-01-13 10:18:35', '2025-01-13 10:18:35');
INSERT INTO `product` VALUES (2, 'ALUMUNIUM FOIL ALL IN ONE BULAT 23mm IM', 1000, 2, 1, '2025-01-13 10:18:35', '2025-01-13 10:18:35', '2025-01-13 10:18:35');
INSERT INTO `product` VALUES (3, 'ALUMUNIUM FOIL ALL IN ONE BULAT 30mm IM', 1000, 2, 1, '2025-01-13 10:18:35', '2025-01-13 10:18:35', '2025-01-13 10:18:35');
INSERT INTO `product` VALUES (4, 'ALUMUNIUM FOIL ALL IN ONE SHEET 250mm IM', 12500, 2, 2, '2025-01-13 10:18:35', '2025-01-13 10:18:35', '2025-01-13 10:18:35');
INSERT INTO `product` VALUES (5, 'ALUMUNIUM FOIL HDPE/PE BULAT 23mm IM', 12500, 2, 1, '2025-01-13 10:18:35', '2025-01-13 10:18:35', '2025-01-13 10:18:35');
INSERT INTO `product` VALUES (6, 'ALUMUNIUM FOIL HDPE/PE BULAT 30mm IM', 1000, 2, 1, '2025-01-13 10:18:35', '2025-01-13 10:18:35', '2025-01-13 10:18:35');
INSERT INTO `product` VALUES (7, 'ALUMUNIUM FOIL HDPE/PE SHEET 250mm IM', 13000, 2, 2, '2025-01-13 10:18:35', '2025-01-13 10:18:35', '2025-01-13 10:18:35');
INSERT INTO `product` VALUES (8, 'ALUMUNIUM FOIL PET SHEET 250mm IM', 1000, 2, 2, '2025-01-13 10:18:35', '2025-01-13 10:18:35', '2025-01-13 10:18:35');
INSERT INTO `product` VALUES (9, 'ARM PENDEK MODEL U', 13000, 2, 1, '2025-01-13 10:18:35', '2025-01-13 10:18:35', '2025-01-13 10:18:35');
INSERT INTO `product` VALUES (10, 'ARM SUPPORT KECIL', 13000, 3, 2, '2025-01-13 10:18:35', '2025-01-13 10:18:35', '2025-01-13 10:18:35');
INSERT INTO `product` VALUES (11, 'ARM SUPPORT KOTAK PUTIH', 13000, 2, 2, '2025-01-13 10:18:35', '2025-01-13 10:18:35', '2025-01-13 10:18:35');
INSERT INTO `product` VALUES (12, 'ARM SUPPORT PENDEK POLOS', 13000, 3, 1, '2025-01-13 10:18:35', '2025-01-13 10:18:35', '2025-01-13 10:18:35');
INSERT INTO `product` VALUES (13, 'ARM SUPPORT S IM', 1000, 2, 2, '2025-01-13 10:18:35', '2025-01-13 10:18:35', '2025-01-13 10:18:35');
INSERT INTO `product` VALUES (14, 'ARM SUPPORT T (IMPORT)', 13000, 2, 1, '2025-01-13 10:18:35', '2025-01-13 10:18:35', '2025-01-13 10:18:35');
INSERT INTO `product` VALUES (15, 'ARM SUPPORT T - MODEL 1 ( LOKAL )', 10000, 3, 1, '2025-01-13 10:18:35', '2025-01-13 10:18:35', '2025-01-13 10:18:35');
INSERT INTO `product` VALUES (16, 'BLACK LASER TONER FP-T3 (100gr)', 13000, 2, 2, '2025-01-13 10:18:35', '2025-01-13 10:18:35', '2025-01-13 10:18:35');
INSERT INTO `product` VALUES (17, 'BODY PRINTER CANON IP2770', 500, 4, 1, '2025-01-13 10:18:35', '2025-01-13 10:18:35', '2025-01-13 10:18:35');
INSERT INTO `product` VALUES (18, 'BODY PRINTER T13X', 15000, 4, 1, '2025-01-13 10:18:35', '2025-01-13 10:18:35', '2025-01-13 10:18:35');
INSERT INTO `product` VALUES (19, 'BOTOL 1000ML BLUE KHUSUS UNTUK EPSON R1800/R800 - 4180 IM (T054920)', 10000, 5, 1, '2025-01-13 10:18:36', '2025-01-13 10:18:36', '2025-01-13 10:18:36');
INSERT INTO `product` VALUES (20, 'BOTOL 1000ML CYAN KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4120 IM (T054220)', 10000, 5, 2, '2025-01-13 10:18:36', '2025-01-13 10:18:36', '2025-01-13 10:18:36');
INSERT INTO `product` VALUES (21, 'BOTOL 1000ML GLOSS OPTIMIZER KHUSUS UNTUK EPSON R1800/R800/R1900/R2000/IX7000/MG6170 - 4100 IM (T054020)', 1500, 5, 1, '2025-01-13 10:18:36', '2025-01-13 10:18:36', '2025-01-13 10:18:36');
INSERT INTO `product` VALUES (22, 'BOTOL 1000ML L.LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0599 IM', 1500, 5, 2, '2025-01-13 10:18:36', '2025-01-13 10:18:36', '2025-01-13 10:18:36');
INSERT INTO `product` VALUES (23, 'BOTOL 1000ML LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0597 IM', 1500, 5, 2, '2025-01-13 10:18:36', '2025-01-13 10:18:36', '2025-01-13 10:18:36');
INSERT INTO `product` VALUES (24, 'BOTOL 1000ML MAGENTA KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4140 IM (T054320)', 1000, 5, 1, '2025-01-13 10:18:36', '2025-01-13 10:18:36', '2025-01-13 10:18:36');
INSERT INTO `product` VALUES (25, 'BOTOL 1000ML MATTE BLACK KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 3503 IM (T054820)', 1500, 5, 2, '2025-01-13 10:18:36', '2025-01-13 10:18:36', '2025-01-13 10:18:36');
INSERT INTO `product` VALUES (26, 'BOTOL 1000ML ORANGE KHUSUS UNTUK EPSON R1900/R2000 IM - 4190 (T087920)', 1500, 5, 1, '2025-01-13 10:18:36', '2025-01-13 10:18:36', '2025-01-13 10:18:36');
INSERT INTO `product` VALUES (27, 'BOTOL 1000ML RED KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4170 IM (T054720)', 1000, 5, 2, '2025-01-13 10:18:36', '2025-01-13 10:18:36', '2025-01-13 10:18:36');
INSERT INTO `product` VALUES (28, 'BOTOL 1000ML YELLOW KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4160 IM (T054420)', 1500, 5, 2, '2025-01-13 10:18:36', '2025-01-13 10:18:36', '2025-01-13 10:18:36');
INSERT INTO `product` VALUES (29, 'BOTOL KOTAK 100ML LK', 1000, 6, 1, '2025-01-13 10:18:36', '2025-01-13 10:18:36', '2025-01-13 10:18:36');
INSERT INTO `product` VALUES (30, 'BOTOL 10ML IM', 1000, 7, 2, '2025-01-13 10:18:36', '2025-01-13 10:18:36', '2025-01-13 10:18:36');

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status`  (
  `id_status` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `status_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_status`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES (1, 'bisa dijual');
INSERT INTO `status` VALUES (2, 'tidak bisa dijual');

SET FOREIGN_KEY_CHECKS = 1;
