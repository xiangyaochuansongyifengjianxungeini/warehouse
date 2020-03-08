-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: localhost    Database: store
-- ------------------------------------------------------
-- Server version	5.7.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `action_logs`
--

DROP TABLE IF EXISTS `action_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `action_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL COMMENT '执行人用户id',
  `title` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '行为名称',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '行为内容',
  `model` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '行为的关联表格名称或者模型名称（包含命名空间）',
  `model_id` int(10) unsigned DEFAULT NULL COMMENT '行为的关联表格受影响记录ID',
  `uri` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '执行操作时的当前uri',
  `created_ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '执行行为时的IP',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `action_logs`
--

LOCK TABLES `action_logs` WRITE;
/*!40000 ALTER TABLE `action_logs` DISABLE KEYS */;
INSERT INTO `action_logs` VALUES (17,16,'新建【AgentRank】模型','模型数据：{\"name\":\"\\u4ee3\\u7406\\u56db\\u7ea7\",\"rate\":\"0.4\",\"id\":5}','App\\Models\\AgentRank',5,'',NULL,'2019-09-02 07:16:48','2019-09-02 07:16:48','新建了名称为代理四级的数据'),(18,16,'修改【User】模型','数据修改前：{\"name\":\"\\u7528\\u62371\"}；数据修改后：{\"name\":\"\\u7528\\u62371\\u6d4b\\u8bd5\"}','App\\Models\\User',16,'',NULL,'2019-09-02 09:11:56','2019-09-02 09:11:56','修改了用户名称为用户1测试的数据'),(19,16,'修改【User】模型','数据修改前：{\"name\":\"\\u7528\\u62371\"}；数据修改后：{\"name\":\"\\u7528\\u62371\\u6d4b\\u8bd5\"}','App\\Models\\User',16,'',NULL,'2019-09-02 09:11:56','2019-09-02 09:11:56','修改了用户名称为用户1测试的数据'),(23,16,'新建【Product】模型','模型数据：{\"name\":\"\\u6d4b\\u8bd5\\u6d4b\\u8bd5\",\"model\":\"7888844\",\"warehouse_id\":\"11\",\"user_id\":16,\"id\":56}','App\\Models\\Product',56,'',NULL,'2019-09-03 08:28:35','2019-09-03 08:28:35','新建了名称为测试测试的数据'),(24,16,'新建【Product】模型','模型数据：{\"name\":\"\\u518d\\u6765\\u6d4b\\u8bd5\",\"model\":\"77878787887\",\"warehouse_id\":\"11\",\"user_id\":16,\"id\":57}','App\\Models\\Product',57,'',NULL,'2019-09-03 08:29:43','2019-09-03 08:29:43','新建了名称为再来测试的数据'),(25,16,'新建【Product】模型','模型数据：{\"name\":\"\\u963f\\u745f\\u6771\",\"model\":\"4545454\",\"warehouse_id\":\"11\",\"user_id\":16,\"id\":58}','App\\Models\\Product',58,'',NULL,'2019-09-03 08:32:33','2019-09-03 08:32:33','新建了名称为阿瑟東的数据'),(26,16,'修改【User】模型','数据修改前：{\"status\":1}；数据修改后：{\"status\":\"2\"}','App\\Models\\User',29,'',NULL,'2019-09-03 08:44:53','2019-09-03 08:44:53','修改了用户名称为用户3的数据'),(27,16,'修改【User】模型','数据修改前：{\"status\":1}；数据修改后：{\"status\":\"2\"}','App\\Models\\User',29,'',NULL,'2019-09-03 08:44:53','2019-09-03 08:44:53','修改了用户名称为用户3的数据'),(28,16,'修改【User】模型','数据修改前：{\"status\":2}；数据修改后：{\"status\":\"1\"}','App\\Models\\User',29,'',NULL,'2019-09-03 08:44:55','2019-09-03 08:44:55','修改了用户名称为用户3的数据'),(29,16,'修改【User】模型','数据修改前：{\"status\":2}；数据修改后：{\"status\":\"1\"}','App\\Models\\User',29,'',NULL,'2019-09-03 08:44:55','2019-09-03 08:44:55','修改了用户名称为用户3的数据'),(30,16,'修改【User】模型','数据修改前：{\"status\":1}；数据修改后：{\"status\":\"0\"}','App\\Models\\User',29,'',NULL,'2019-09-03 08:44:58','2019-09-03 08:44:58','修改了用户名称为用户3的数据'),(31,16,'修改【User】模型','数据修改前：{\"status\":1}；数据修改后：{\"status\":\"0\"}','App\\Models\\User',29,'',NULL,'2019-09-03 08:44:58','2019-09-03 08:44:58','修改了用户名称为用户3的数据'),(32,16,'新建【User】模型','模型数据：{\"tel\":\"18814383357\",\"name\":\"\\u7528\\u6237\\u6d4b\\u8bd51\",\"sex\":\"1\",\"credit_amount\":\"100\",\"agent_rank_id\":null,\"password\":\"$2y$10$zmWe8gvGPPi6dOnVU7eJieC868nFKZ9mjYYiVje\\/1qvULXvkyn9me\",\"id\":30}','App\\Models\\User',30,'',NULL,'2019-09-04 06:01:44','2019-09-04 06:01:44','新建了名称为用户测试1的数据'),(33,16,'新建【User】模型','模型数据：{\"tel\":\"18814383357\",\"name\":\"\\u7528\\u6237\\u6d4b\\u8bd51\",\"sex\":\"1\",\"credit_amount\":\"100\",\"agent_rank_id\":null,\"password\":\"$2y$10$zmWe8gvGPPi6dOnVU7eJieC868nFKZ9mjYYiVje\\/1qvULXvkyn9me\",\"id\":30}','App\\Models\\User',30,'',NULL,'2019-09-04 06:01:44','2019-09-04 06:01:44','新建了名称为用户测试1的数据'),(34,16,'修改【Product】模型','数据修改前：{\"status\":1}；数据修改后：{\"status\":\"2\"}','App\\Models\\Product',58,'',NULL,'2019-09-04 06:32:53','2019-09-04 06:32:53','修改了产品名称为阿瑟東的数据'),(35,16,'新建【Product】模型','模型数据：{\"name\":\"\\u4f60\\u597d\",\"model\":\"788455554\",\"warehouse_id\":\"11\",\"user_id\":16,\"id\":59}','App\\Models\\Product',59,'',NULL,'2019-09-04 09:03:45','2019-09-04 09:03:45','新建了名称为你好的数据'),(36,16,'修改【Product】模型','数据修改前：{\"status\":2}；数据修改后：{\"status\":\"1\"}','App\\Models\\Product',58,'',NULL,'2019-09-04 09:04:18','2019-09-04 09:04:18','修改了产品名称为阿瑟東的数据'),(37,16,'新建【Supplier】模型','模型数据：{\"name\":\"\\u4f9b\\u5e94\\u5546\",\"id\":2}','App\\Models\\Supplier',2,'',NULL,'2019-09-05 04:09:40','2019-09-05 04:09:40','新建了名称为供应商的数据'),(38,16,'新建【Supplier】模型','模型数据：{\"name\":\"\\u4f9b\\u5e94\\u554611\",\"id\":3}','App\\Models\\Supplier',3,'',NULL,'2019-09-05 05:12:46','2019-09-05 05:12:46','新建了名称为供应商11的数据'),(39,16,'新建【Supplier】模型','模型数据：{\"name\":\"\\u4f9b\\u5e94\\u5546test1\",\"id\":4}','App\\Models\\Supplier',4,'',NULL,'2019-09-05 05:23:19','2019-09-05 05:23:19','新建了名称为供应商test1的数据'),(40,16,'新建【Supplier】模型','模型数据：{\"name\":\"\\u4f9b\\u5e94\\u5546test2\",\"id\":5}','App\\Models\\Supplier',5,'',NULL,'2019-09-05 05:24:46','2019-09-05 05:24:46','新建了名称为供应商test2的数据'),(41,16,'新建【Supplier】模型','模型数据：{\"name\":\"\\u4f9b\\u5e94\\u5546test3\",\"id\":6}','App\\Models\\Supplier',6,'',NULL,'2019-09-05 05:27:23','2019-09-05 05:27:23','新建了名称为供应商test3的数据'),(42,16,'修改【Supplier】模型','数据修改前：{\"name\":\"\\u4f9b\\u5e94\\u55462\"}；数据修改后：{\"name\":\"\\u4f9b\\u5e94\\u55462222\"}','App\\Models\\Supplier',1,'',NULL,'2019-09-05 05:30:54','2019-09-05 05:30:54','修改了供应商名称为供应商2222的数据'),(43,16,'修改【Supplier】模型','数据修改前：{\"name\":\"\\u4f9b\\u5e94\\u55462222\"}；数据修改后：{\"name\":\"\\u4f9b\\u5e94\\u55462\"}','App\\Models\\Supplier',1,'',NULL,'2019-09-05 05:33:37','2019-09-05 05:33:37','修改了供应商名称为供应商2的数据'),(44,16,'新建【Supplier】模型','模型数据：{\"name\":\"1\",\"id\":7}','App\\Models\\Supplier',7,'',NULL,'2019-09-05 06:03:25','2019-09-05 06:03:25','新建了名称为1的数据'),(45,16,'新建【Supplier】模型','模型数据：{\"name\":\"2\",\"id\":8}','App\\Models\\Supplier',8,'',NULL,'2019-09-05 06:03:28','2019-09-05 06:03:28','新建了名称为2的数据'),(46,16,'新建【Supplier】模型','模型数据：{\"name\":\"3\",\"id\":9}','App\\Models\\Supplier',9,'',NULL,'2019-09-05 06:03:34','2019-09-05 06:03:34','新建了名称为3的数据'),(47,16,'新建【Supplier】模型','模型数据：{\"name\":\"4\",\"id\":10}','App\\Models\\Supplier',10,'',NULL,'2019-09-05 06:03:37','2019-09-05 06:03:37','新建了名称为4的数据'),(48,16,'新建【Supplier】模型','模型数据：{\"name\":\"7\",\"id\":11}','App\\Models\\Supplier',11,'',NULL,'2019-09-05 06:03:40','2019-09-05 06:03:40','新建了名称为7的数据'),(49,16,'新建【Supplier】模型','模型数据：{\"name\":\"5\",\"id\":12}','App\\Models\\Supplier',12,'',NULL,'2019-09-05 06:03:57','2019-09-05 06:03:57','新建了名称为5的数据'),(50,16,'新建【Supplier】模型','模型数据：{\"name\":\"8\",\"id\":13}','App\\Models\\Supplier',13,'',NULL,'2019-09-05 06:04:04','2019-09-05 06:04:04','新建了名称为8的数据'),(51,16,'新建【Supplier】模型','模型数据：{\"name\":\"9\",\"id\":14}','App\\Models\\Supplier',14,'',NULL,'2019-09-05 06:04:08','2019-09-05 06:04:08','新建了名称为9的数据'),(52,16,'新建【Supplier】模型','模型数据：{\"name\":\"111\",\"id\":15}','App\\Models\\Supplier',15,'',NULL,'2019-09-05 06:04:17','2019-09-05 06:04:17','新建了名称为111的数据'),(53,16,'新建【Supplier】模型','模型数据：{\"name\":\"\\u4f9b\\u5e94\\u554611\",\"id\":16}','App\\Models\\Supplier',16,'',NULL,'2019-09-05 06:04:41','2019-09-05 06:04:41','新建了名称为供应商11的数据'),(54,16,'新建【Supplier】模型','模型数据：{\"name\":\"222\",\"id\":17}','App\\Models\\Supplier',17,'',NULL,'2019-09-05 06:05:58','2019-09-05 06:05:58','新建了名称为222的数据'),(55,16,'新建【Supplier】模型','模型数据：{\"name\":\"333\",\"id\":18}','App\\Models\\Supplier',18,'',NULL,'2019-09-05 06:07:26','2019-09-05 06:07:26','新建了名称为333的数据'),(56,16,'新建【Product】模型','模型数据：{\"name\":\"\\u54c8\\u54c8\",\"model\":\"78989889\",\"warehouse_id\":\"11\",\"user_id\":16,\"id\":60}','App\\Models\\Product',60,'',NULL,'2019-09-05 06:12:25','2019-09-05 06:12:25','新建了名称为哈哈的数据'),(57,16,'新建【Supplier】模型','模型数据：{\"name\":\"\\u4f9b\\u5e94\\u55461\",\"id\":19}','App\\Models\\Supplier',19,'',NULL,'2019-09-05 06:12:27','2019-09-05 06:12:27','新建了名称为供应商1的数据'),(58,16,'删除【Supplier】模型','模型数据：{\"id\":11,\"name\":\"7\",\"created_at\":\"2019-09-05 14:03:40\",\"updated_at\":\"2019-09-05 14:03:40\"}','App\\Models\\Supplier',11,'',NULL,'2019-09-05 06:40:18','2019-09-05 06:40:18','删除了名称为7的数据'),(59,16,'删除【Supplier】模型','模型数据：{\"id\":12,\"name\":\"5\",\"created_at\":\"2019-09-05 14:03:57\",\"updated_at\":\"2019-09-05 14:03:57\"}','App\\Models\\Supplier',12,'',NULL,'2019-09-05 06:50:13','2019-09-05 06:50:13','删除了名称为5的数据'),(60,16,'新建【Warehouse】模型','模型数据：{\"name\":\"\\u4ed3\\u5e932\",\"id\":16}','App\\Models\\Warehouse',16,'',NULL,'2019-09-06 18:08:51','2019-09-06 18:08:51','新建了名称为仓库2的数据'),(61,16,'新建【Warehouse】模型','模型数据：{\"name\":\"\\u4ed3\\u5e933\",\"id\":17}','App\\Models\\Warehouse',17,'',NULL,'2019-09-06 19:00:15','2019-09-06 19:00:15','新建了【仓库】名称为仓库3的数据'),(62,16,'新建【Product】模型','模型数据：{\"name\":\"\\u4ea7\\u54c12\",\"model\":\"chanping2\",\"warehouse_id\":\"11\",\"user_id\":16,\"id\":61}','App\\Models\\Product',61,'',NULL,'2019-09-06 20:58:30','2019-09-06 20:58:30','新建了【产品】名称为产品2的数据'),(63,16,'新建【Product】模型','模型数据：{\"name\":\"\\u4ea7\\u54c13\",\"model\":\"chanping3\",\"warehouse_id\":\"11\",\"user_id\":16,\"id\":62}','App\\Models\\Product',62,'',NULL,'2019-09-06 20:59:34','2019-09-06 20:59:34','新建了【产品】名称为产品3的数据'),(64,16,'新建【Product】模型','模型数据：{\"name\":\"\\u8336\\u54c1666\",\"model\":\"6666666\",\"warehouse_id\":\"11\",\"user_id\":16,\"id\":63}','App\\Models\\Product',63,'',NULL,'2019-09-06 21:06:00','2019-09-06 21:06:00','新建了【产品】名称为茶品666的数据'),(65,16,'修改【Product】模型','数据修改前：{\"status\":1}；数据修改后：{\"status\":\"2\"}','App\\Models\\Product',61,'',NULL,'2019-09-07 00:03:24','2019-09-07 00:03:24','修改了【产品】名称为产品2的数据'),(66,16,'新建【Warehouse】模型','模型数据：{\"name\":\"\\u7d2b1\",\"id\":18}','App\\Models\\Warehouse',18,'',NULL,'2019-09-07 00:46:28','2019-09-07 00:46:28','新建了【仓库】名称为紫1的数据'),(67,16,'修改【System】模型','数据修改前：{\"stock_warning\":1011}；数据修改后：{\"stock_warning\":\"5\"}','App\\Models\\System',1,'',NULL,'2019-09-07 02:50:06','2019-09-07 02:50:06','修改了【系统】名称为的数据'),(68,16,'修改【System】模型','数据修改前：{\"stock_warning\":5}；数据修改后：{\"stock_warning\":\"10\"}','App\\Models\\System',1,'',NULL,'2019-09-07 03:21:18','2019-09-07 03:21:18','修改了【系统】名称为的数据'),(69,16,'修改【System】模型','数据修改前：{\"stock_warning\":10}；数据修改后：{\"stock_warning\":\"100\"}','App\\Models\\System',1,'',NULL,'2019-09-07 03:21:29','2019-09-07 03:21:29','修改了【系统】名称为的数据'),(70,16,'新建【Supplier】模型','模型数据：{\"name\":\"aaa\",\"id\":20}','App\\Models\\Supplier',20,'',NULL,'2019-09-07 05:45:54','2019-09-07 05:45:54','新建了【供应商】名称为aaa的数据'),(71,16,'新建【AgentRank】模型','模型数据：{\"name\":\"\\u4ee3\\u7406\\u4e94\\u7ea7test\",\"rate\":\"0.5\",\"id\":6}','App\\Models\\AgentRank',6,'',NULL,'2019-09-07 05:53:00','2019-09-07 05:53:00','新建了【代理等级】名称为代理五级test的数据'),(72,16,'修改【User】模型','数据修改前：{\"status\":1}；数据修改后：{\"status\":\"0\"}','App\\Models\\User',30,'',NULL,'2019-09-07 06:08:38','2019-09-07 06:08:38','修改了【用户】名称为用户测试1的数据'),(73,16,'删除【AgentRank】模型','模型数据：{\"id\":5,\"name\":\"\\u4ee3\\u7406\\u56db\\u7ea7\",\"rate\":\"0.40\",\"created_at\":\"2019-09-02 15:16:47\",\"updated_at\":\"2019-09-02 15:16:47\"}','App\\Models\\AgentRank',5,'',NULL,'2019-09-07 06:20:17','2019-09-07 06:20:17','删除了【代理等级】名称为代理四级的数据'),(74,16,'删除【AgentRank】模型','模型数据：{\"id\":6,\"name\":\"\\u4ee3\\u7406\\u4e94\\u7ea7test\",\"rate\":\"0.50\",\"created_at\":\"2019-09-07 13:53:00\",\"updated_at\":\"2019-09-07 13:53:00\"}','App\\Models\\AgentRank',6,'',NULL,'2019-09-07 06:23:49','2019-09-07 06:23:49','删除了【代理等级】名称为代理五级test的数据'),(75,16,'修改【Supplier】模型','数据修改前：{\"name\":\"8\"}；数据修改后：{\"name\":\"888888888888888\"}','App\\Models\\Supplier',13,'',NULL,'2019-09-07 06:24:25','2019-09-07 06:24:25','修改了【供应商】名称为888888888888888的数据'),(76,16,'删除【Supplier】模型','模型数据：{\"id\":13,\"name\":\"888888888888888\",\"created_at\":\"2019-09-05 14:04:04\",\"updated_at\":\"2019-09-07 14:24:25\"}','App\\Models\\Supplier',13,'',NULL,'2019-09-07 06:25:20','2019-09-07 06:25:20','删除了【供应商】名称为888888888888888的数据'),(77,16,'删除【Supplier】模型','模型数据：{\"id\":20,\"name\":\"aaa\",\"created_at\":\"2019-09-07 13:45:54\",\"updated_at\":\"2019-09-07 13:45:54\"}','App\\Models\\Supplier',20,'',NULL,'2019-09-07 06:25:44','2019-09-07 06:25:44','删除了【供应商】名称为aaa的数据'),(78,16,'新建【AgentRank】模型','模型数据：{\"name\":\"\\u4ee3\\u7406\\u56db\\u7ea7\",\"rate\":\"0.4\",\"id\":7}','App\\Models\\AgentRank',7,'',NULL,'2019-09-07 06:26:24','2019-09-07 06:26:24','新建了【代理等级】名称为代理四级的数据'),(79,16,'删除【AgentRank】模型','模型数据：{\"id\":7,\"name\":\"\\u4ee3\\u7406\\u56db\\u7ea7\",\"rate\":\"0.40\",\"created_at\":\"2019-09-07 14:26:24\",\"updated_at\":\"2019-09-07 14:26:24\"}','App\\Models\\AgentRank',7,'',NULL,'2019-09-07 06:26:57','2019-09-07 06:26:57','删除了【代理等级】名称为代理四级的数据'),(80,16,'删除【Supplier】模型','模型数据：{\"id\":14,\"name\":\"9\",\"created_at\":\"2019-09-05 14:04:08\",\"updated_at\":\"2019-09-05 14:04:08\"}','App\\Models\\Supplier',14,'',NULL,'2019-09-07 06:28:01','2019-09-07 06:28:01','删除了【供应商】名称为9的数据'),(81,16,'删除【Supplier】模型','模型数据：{\"id\":19,\"name\":\"\\u4f9b\\u5e94\\u55461\",\"created_at\":\"2019-09-05 14:12:27\",\"updated_at\":\"2019-09-05 14:12:27\"}','App\\Models\\Supplier',19,'',NULL,'2019-09-07 06:29:54','2019-09-07 06:29:54','删除了【供应商】名称为供应商1的数据'),(82,16,'新建【AgentRank】模型','模型数据：{\"name\":\"\\u4ee3\\u7406\\u56db\\u7ea7\",\"rate\":\"0.4\",\"id\":8}','App\\Models\\AgentRank',8,'',NULL,'2019-09-07 06:30:23','2019-09-07 06:30:23','新建了【代理等级】名称为代理四级的数据'),(83,16,'删除【AgentRank】模型','模型数据：{\"id\":8,\"name\":\"\\u4ee3\\u7406\\u56db\\u7ea7\",\"rate\":\"0.40\",\"created_at\":\"2019-09-07 14:30:23\",\"updated_at\":\"2019-09-07 14:30:23\"}','App\\Models\\AgentRank',8,'',NULL,'2019-09-07 06:30:28','2019-09-07 06:30:28','删除了【代理等级】名称为代理四级的数据'),(84,16,'新建【AgentRank】模型','模型数据：{\"name\":\"\\u4ee3\\u7406\\u56db\\u7ea7\",\"rate\":\"0.4\",\"id\":9}','App\\Models\\AgentRank',9,'',NULL,'2019-09-07 06:31:18','2019-09-07 06:31:18','新建了【代理等级】名称为代理四级的数据'),(85,16,'删除【Supplier】模型','模型数据：{\"id\":18,\"name\":\"333\",\"created_at\":\"2019-09-05 14:07:26\",\"updated_at\":\"2019-09-05 14:07:26\"}','App\\Models\\Supplier',18,'',NULL,'2019-09-07 06:33:11','2019-09-07 06:33:11','删除了【供应商】名称为333的数据'),(86,16,'删除【Supplier】模型','模型数据：{\"id\":17,\"name\":\"222\",\"created_at\":\"2019-09-05 14:05:58\",\"updated_at\":\"2019-09-05 14:05:58\"}','App\\Models\\Supplier',17,'',NULL,'2019-09-07 06:33:39','2019-09-07 06:33:39','删除了【供应商】名称为222的数据'),(87,16,'删除【AgentRank】模型','模型数据：{\"id\":9,\"name\":\"\\u4ee3\\u7406\\u56db\\u7ea7\",\"rate\":\"0.40\",\"created_at\":\"2019-09-07 14:31:18\",\"updated_at\":\"2019-09-07 14:31:18\"}','App\\Models\\AgentRank',9,'',NULL,'2019-09-07 06:34:15','2019-09-07 06:34:15','删除了【代理等级】名称为代理四级的数据'),(88,16,'删除【Supplier】模型','模型数据：{\"id\":15,\"name\":\"111\",\"created_at\":\"2019-09-05 14:04:17\",\"updated_at\":\"2019-09-05 14:04:17\"}','App\\Models\\Supplier',15,'',NULL,'2019-09-07 06:35:25','2019-09-07 06:35:25','删除了【供应商】名称为111的数据'),(89,16,'新建【Supplier】模型','模型数据：{\"name\":\"test1\",\"id\":21}','App\\Models\\Supplier',21,'',NULL,'2019-09-07 06:36:39','2019-09-07 06:36:39','新建了【供应商】名称为test1的数据'),(90,16,'删除【Supplier】模型','模型数据：{\"id\":21,\"name\":\"test1\",\"created_at\":\"2019-09-07 14:36:39\",\"updated_at\":\"2019-09-07 14:36:39\"}','App\\Models\\Supplier',21,'',NULL,'2019-09-07 06:38:24','2019-09-07 06:38:24','删除了【供应商】名称为test1的数据'),(91,16,'新建【Supplier】模型','模型数据：{\"name\":\"\\u554a\\u554a\\u554a\",\"id\":22}','App\\Models\\Supplier',22,'',NULL,'2019-09-07 06:40:02','2019-09-07 06:40:02','新建了【供应商】名称为啊啊啊的数据'),(92,16,'删除【Supplier】模型','模型数据：{\"id\":22,\"name\":\"\\u554a\\u554a\\u554a\",\"created_at\":\"2019-09-07 14:40:01\",\"updated_at\":\"2019-09-07 14:40:01\"}','App\\Models\\Supplier',22,'',NULL,'2019-09-07 06:45:31','2019-09-07 06:45:31','删除了【供应商】名称为啊啊啊的数据'),(93,16,'修改【System】模型','数据修改前：{\"stock_warning\":100}；数据修改后：{\"stock_warning\":\"1001\"}','App\\Models\\System',1,'',NULL,'2019-09-07 06:47:11','2019-09-07 06:47:11','修改了【系统】名称为的数据'),(94,16,'修改【System】模型','数据修改前：{\"stock_warning\":1001}；数据修改后：{\"stock_warning\":\"1001111111\"}','App\\Models\\System',1,'',NULL,'2019-09-07 06:47:28','2019-09-07 06:47:28','修改了【系统】名称为的数据'),(95,16,'修改【System】模型','数据修改前：{\"stock_warning\":1001111111}；数据修改后：{\"stock_warning\":\"11111\"}','App\\Models\\System',1,'',NULL,'2019-09-07 06:48:46','2019-09-07 06:48:46','修改了【系统】名称为的数据'),(96,16,'修改【System】模型','数据修改前：{\"stock_warning\":11111}；数据修改后：{\"stock_warning\":\"2222\"}','App\\Models\\System',1,'',NULL,'2019-09-07 06:53:39','2019-09-07 06:53:39','修改了【系统】名称为的数据'),(97,16,'修改【System】模型','数据修改前：{\"stock_warning\":2222}；数据修改后：{\"stock_warning\":\"2222333\"}','App\\Models\\System',1,'',NULL,'2019-09-07 06:59:55','2019-09-07 06:59:55','修改了【系统】名称为的数据'),(98,16,'新建【Supplier】模型','模型数据：{\"name\":\"test1\",\"id\":23}','App\\Models\\Supplier',23,'',NULL,'2019-09-07 07:00:19','2019-09-07 07:00:19','新建了【供应商】名称为test1的数据'),(99,16,'删除【Supplier】模型','模型数据：{\"id\":23,\"name\":\"test1\",\"created_at\":\"2019-09-07 15:00:19\",\"updated_at\":\"2019-09-07 15:00:19\"}','App\\Models\\Supplier',23,'',NULL,'2019-09-07 07:00:22','2019-09-07 07:00:22','删除了【供应商】名称为test1的数据'),(100,16,'修改【AgentRank】模型','数据修改前：{\"rate\":\"0.20\"}；数据修改后：{\"rate\":\"2\"}','App\\Models\\AgentRank',2,'',NULL,'2019-09-07 07:04:53','2019-09-07 07:04:53','修改了【代理等级】名称为代理二级的数据'),(101,16,'修改【AgentRank】模型','数据修改前：{\"rate\":\"2.00\"}；数据修改后：{\"rate\":\"0.2\"}','App\\Models\\AgentRank',2,'',NULL,'2019-09-07 07:05:05','2019-09-07 07:05:05','修改了【代理等级】名称为代理二级的数据'),(102,16,'新建【Supplier】模型','模型数据：{\"name\":\"test1\",\"id\":24}','App\\Models\\Supplier',24,'',NULL,'2019-09-07 07:21:57','2019-09-07 07:21:57','新建了【供应商】名称为test1的数据'),(103,16,'删除【Supplier】模型','模型数据：{\"id\":24,\"name\":\"test1\",\"created_at\":\"2019-09-07 15:21:57\",\"updated_at\":\"2019-09-07 15:21:57\"}','App\\Models\\Supplier',24,'',NULL,'2019-09-07 07:22:00','2019-09-07 07:22:00','删除了【供应商】名称为test1的数据'),(104,16,'修改【Product】模型','数据修改前：{\"name\":\"\\u4ea7\\u54c13\",\"model\":\"chanping3\"}；数据修改后：{\"name\":\"\\u4ea7\\u54c13333333333\",\"model\":\"chanping333333333333\"}','App\\Models\\Product',62,'',NULL,'2019-09-07 07:46:07','2019-09-07 07:46:07','修改了【产品】名称为产品3333333333的数据'),(105,16,'修改【Order】模型','数据修改前：{\"status\":1}；数据修改后：{\"status\":5}','App\\Models\\Order',8,'',NULL,'2019-09-08 01:05:11','2019-09-08 01:05:11','修改了【订单】名称为的数据'),(106,16,'修改【Order】模型','数据修改前：{\"status\":1}；数据修改后：{\"status\":5}','App\\Models\\Order',9,'',NULL,'2019-09-08 01:08:07','2019-09-08 01:08:07','修改了【订单】名称为的数据'),(107,16,'修改【Order】模型','数据修改前：{\"status\":1}；数据修改后：{\"status\":5}','App\\Models\\Order',10,'',NULL,'2019-09-08 01:08:23','2019-09-08 01:08:23','修改了【订单】名称为的数据'),(108,16,'修改【User】模型','数据修改前：{\"status\":1}；数据修改后：{\"status\":\"2\"}','App\\Models\\User',16,'',NULL,'2019-09-08 01:18:54','2019-09-08 01:18:54','修改了【用户】名称为用户1测试的数据'),(109,16,'修改【User】模型','数据修改前：{\"status\":2}；数据修改后：{\"status\":\"1\"}','App\\Models\\User',16,'',NULL,'2019-09-08 01:19:02','2019-09-08 01:19:02','修改了【用户】名称为用户1测试的数据'),(110,16,'修改【Order】模型','数据修改前：{\"status\":1}；数据修改后：{\"status\":5}','App\\Models\\Order',11,'',NULL,'2019-09-08 01:20:36','2019-09-08 01:20:36','修改了【订单】名称为的数据'),(111,16,'修改【Product】模型','数据修改前：{\"status\":1}；数据修改后：{\"status\":\"2\"}','App\\Models\\Product',60,'',NULL,'2019-09-08 01:23:59','2019-09-08 01:23:59','修改了【产品】名称为哈哈的数据'),(112,16,'修改【Order】模型','数据修改前：{\"status\":5}；数据修改后：{\"status\":1}','App\\Models\\Order',8,'',NULL,'2019-09-08 01:31:42','2019-09-08 01:31:42','修改了【订单】名称为的数据'),(113,16,'修改【Order】模型','数据修改前：{\"status\":4}；数据修改后：{\"status\":1}','App\\Models\\Order',9,'',NULL,'2019-09-08 01:31:46','2019-09-08 01:31:46','修改了【订单】名称为的数据'),(114,16,'修改【Order】模型','数据修改前：{\"status\":4}；数据修改后：{\"status\":5}','App\\Models\\Order',11,'',NULL,'2019-09-08 01:31:53','2019-09-08 01:31:53','修改了【订单】名称为的数据'),(115,16,'修改【Order】模型','数据修改前：{\"status\":4}；数据修改后：{\"status\":5}','App\\Models\\Order',8,'',NULL,'2019-09-08 01:39:05','2019-09-08 01:39:05','修改了【订单】名称为的数据'),(116,16,'修改【Order】模型','数据修改前：{\"status\":4}；数据修改后：{\"status\":5}','App\\Models\\Order',9,'',NULL,'2019-09-08 01:40:42','2019-09-08 01:40:42','修改了【订单】名称为的数据'),(117,16,'修改【Order】模型','数据修改前：{\"status\":5}；数据修改后：{\"status\":1}','App\\Models\\Order',10,'',NULL,'2019-09-08 01:44:32','2019-09-08 01:44:32','修改了【订单】名称为的数据'),(118,16,'修改【Order】模型','数据修改前：{\"status\":5}；数据修改后：{\"status\":1}','App\\Models\\Order',9,'',NULL,'2019-09-08 01:44:34','2019-09-08 01:44:34','修改了【订单】名称为的数据'),(119,16,'修改【Order】模型','数据修改前：{\"status\":4}；数据修改后：{\"status\":5}','App\\Models\\Order',9,'',NULL,'2019-09-08 01:49:34','2019-09-08 01:49:34','修改了【订单】名称为的数据'),(120,16,'修改【Order】模型','数据修改前：{\"status\":4}；数据修改后：{\"status\":5}','App\\Models\\Order',10,'',NULL,'2019-09-08 01:49:38','2019-09-08 01:49:38','修改了【订单】名称为的数据'),(121,16,'修改【Order】模型','数据修改前：{\"status\":5}；数据修改后：{\"status\":1}','App\\Models\\Order',11,'',NULL,'2019-09-08 01:53:46','2019-09-08 01:53:46','修改了【订单】名称为的数据'),(122,16,'新建【Order】模型','模型数据：{\"product_id\":\"51\",\"product_name\":\"\\u4ea7\\u54c11\",\"warehouse_id\":\"11\",\"num\":\"30\",\"sale_price\":\"120.00\",\"cost_price\":\"100.00\",\"code\":\"5\",\"color\":\"2\",\"category\":\"1\",\"address\":\"\\u7684\\u6492\",\"user_id\":16,\"id\":12}','App\\Models\\Order',12,'',NULL,'2019-09-08 04:25:51','2019-09-08 04:25:51','新建了【订单】名称为的数据'),(123,16,'新建【Order】模型','模型数据：{\"product_id\":\"51\",\"product_name\":\"\\u4ea7\\u54c11\",\"warehouse_id\":\"11\",\"num\":\"30\",\"sale_price\":\"120.00\",\"cost_price\":\"100.00\",\"code\":\"4\",\"color\":\"1\",\"category\":\"1\",\"address\":\"\\u7684\\u6492\",\"user_id\":16,\"id\":13}','App\\Models\\Order',13,'',NULL,'2019-09-08 04:25:51','2019-09-08 04:25:51','新建了【订单】名称为的数据'),(124,16,'修改【Order】模型','数据修改前：{\"status\":1,\"remark\":\"\"}；数据修改后：{\"status\":3,\"remark\":\"\\u5907\\u6ce8\"}','App\\Models\\Order',13,'',NULL,'2019-09-08 04:39:45','2019-09-08 04:39:45','修改了【订单】名称为的数据'),(125,28,'新建【Warehouse】模型','模型数据：{\"name\":\"\\u4ed3\\u5e934\",\"id\":19}','App\\Models\\Warehouse',19,'',NULL,'2019-09-08 05:17:22','2019-09-08 05:17:22','新建了【仓库】名称为仓库4的数据'),(126,28,'删除【Warehouse】模型','模型数据：{\"id\":16,\"name\":\"\\u4ed3\\u5e932\",\"created_at\":\"2019-09-07 02:08:51\",\"updated_at\":\"2019-09-07 02:08:51\"}','App\\Models\\Warehouse',16,'',NULL,'2019-09-08 05:32:21','2019-09-08 05:32:21','删除了【仓库】名称为仓库2的数据'),(127,28,'新建【Warehouse】模型','模型数据：{\"name\":\"1212\",\"id\":20}','App\\Models\\Warehouse',20,'',NULL,'2019-09-08 05:32:34','2019-09-08 05:32:34','新建了【仓库】名称为1212的数据'),(128,28,'删除【Warehouse】模型','模型数据：{\"id\":20,\"name\":\"1212\",\"created_at\":\"2019-09-08 13:32:34\",\"updated_at\":\"2019-09-08 13:32:34\"}','App\\Models\\Warehouse',20,'',NULL,'2019-09-08 05:35:15','2019-09-08 05:35:15','删除了【仓库】名称为1212的数据'),(130,16,'新建【Product】模型','模型数据：{\"name\":\"\\u4ea7\\u54c11\",\"model\":\"201908051651\",\"warehouse_id\":\"1\",\"user_id\":16,\"id\":65}','App\\Models\\Product',65,'',NULL,'2019-09-08 05:48:52','2019-09-08 05:48:52','新建了【产品】名称为产品1的数据');
/*!40000 ALTER TABLE `action_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agent_ranks`
--

DROP TABLE IF EXISTS `agent_ranks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agent_ranks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '名称',
  `rate` decimal(10,2) NOT NULL COMMENT '分成比例',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agent_ranks`
--

LOCK TABLES `agent_ranks` WRITE;
/*!40000 ALTER TABLE `agent_ranks` DISABLE KEYS */;
INSERT INTO `agent_ranks` VALUES (1,'代理一级',0.10,'2019-08-01 15:01:49','2019-08-30 16:13:17'),(2,'代理二级',0.20,'2019-08-01 15:02:00','2019-09-07 15:05:05'),(3,'代理三级',0.30,'2019-08-01 15:02:09','2019-08-01 15:02:09');
/*!40000 ALTER TABLE `agent_ranks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_values`
--

DROP TABLE IF EXISTS `item_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL COMMENT '属性id',
  `name` varchar(100) NOT NULL COMMENT '属性值',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_values`
--

LOCK TABLES `item_values` WRITE;
/*!40000 ALTER TABLE `item_values` DISABLE KEYS */;
INSERT INTO `item_values` VALUES (1,17,'红','2019-08-02 18:02:06','2019-08-02 18:02:06',16),(2,17,'黄','2019-08-02 18:02:06','2019-08-02 18:02:06',16),(3,17,'紫','2019-08-02 19:06:44','2019-08-02 19:06:44',16),(4,18,'L','2019-08-05 23:38:56','2019-08-05 23:38:58',16),(5,18,'M','2019-09-04 15:11:02','2019-09-04 15:11:02',16),(6,17,'蓝','2019-09-04 15:14:34','2019-09-04 15:14:34',16),(7,17,'白','2019-09-05 14:06:03','2019-09-05 14:06:03',16),(8,17,'紫1','2019-09-07 09:13:32','2019-09-07 09:13:32',16);
/*!40000 ALTER TABLE `item_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '名称',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0删除 1正常',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (17,'颜色','2019-08-02 18:02:06','2019-08-02 18:29:40',1),(18,'尺寸','2019-08-02 18:28:58','2019-08-02 18:28:58',1);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2019_08_08_155525_create_action_logs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`) USING BTREE,
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`) USING BTREE,
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (4,'App\\Models\\User',16),(5,'App\\Models\\User',27),(6,'App\\Models\\User',28),(7,'App\\Models\\User',29),(4,'App\\Models\\User',30);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `product_id` int(11) NOT NULL COMMENT '产品id',
  `product_name` varchar(200) NOT NULL COMMENT '产品名称',
  `warehouse_id` int(11) NOT NULL COMMENT '仓库id',
  `category` tinyint(4) NOT NULL COMMENT '类型 1代发 2自提',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '地址',
  `num` int(11) NOT NULL COMMENT '数量',
  `cost_price` decimal(10,2) NOT NULL COMMENT '成本价',
  `sale_price` decimal(10,2) NOT NULL COMMENT '销售价',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0删除 1提交订单 2申请删除 3提交确认 4申请退货 5确认退货',
  `remark` varchar(255) DEFAULT '' COMMENT '备注',
  `return_reason` varchar(255) DEFAULT NULL COMMENT '退货理由',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL COMMENT '码数',
  `color` varchar(50) DEFAULT NULL COMMENT '颜色',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (8,16,51,'产品1',11,2,'广州',2,300.00,300.00,5,'',NULL,'2019-09-08 09:09:20','2019-09-08 09:39:05',NULL,NULL),(9,16,52,'产品1',11,2,'广州',2,300.00,300.00,5,'',NULL,'2019-09-08 09:09:42','2019-09-08 09:49:34',NULL,NULL),(10,28,52,'产品1',11,1,'广州',2,300.00,300.00,5,'',NULL,'2019-09-08 09:09:42','2019-09-08 09:49:38',NULL,NULL),(11,28,52,'产品1',11,1,'广州',2,300.00,300.00,1,'',NULL,'2019-09-08 09:09:42','2019-09-08 09:53:46',NULL,NULL),(12,16,51,'产品1',11,1,'的撒',30,100.00,120.00,1,'',NULL,'2019-09-08 12:25:51','2019-09-08 12:25:51','5','2'),(13,16,51,'产品1',11,1,'的撒',30,100.00,120.00,3,'备注',NULL,'2019-09-08 12:25:51','2019-09-08 12:39:45','4','1');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  KEY `password_resets_email_index` (`email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1正常 2冻结',
  `index` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'入库管理','web','2019-08-05 00:59:07','2019-08-31 16:40:05',1,'Warehousing','luggage-cart'),(2,'出库管理','web','2019-08-05 00:59:07','2019-08-05 00:59:10',1,'ExWarehouse','truck-moving'),(3,'退货管理','web','2019-08-05 00:59:07','2019-08-05 00:59:10',1,'ReturnGoods','layer-group'),(4,'代理管理','web','2019-08-05 00:59:07','2019-08-05 00:59:10',1,'Agent','id-card-alt'),(5,'资金管理','web','2019-08-05 00:59:07','2019-08-05 00:59:10',1,'Capital','money-check-alt'),(6,'用户管理','web','2019-08-05 00:59:07','2019-08-05 00:59:10',1,'User','users'),(7,'权限管理','web','2019-08-05 00:59:07','2019-08-05 00:59:10',1,'Jurisdiction','users-cog'),(8,'仓库管理','web','2019-08-05 00:59:07','2019-08-05 00:59:10',1,'Warehouse','warehouse'),(9,'系统配置','web','2019-08-27 22:10:52','2019-08-27 22:10:54',1,'System','cog');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL COMMENT '产品id',
  `name` varchar(255) NOT NULL COMMENT '名称',
  `path` varchar(255) NOT NULL COMMENT '路径',
  `item_value_id` int(11) NOT NULL COMMENT '产品颜色属性值id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_skus`
--

DROP TABLE IF EXISTS `product_skus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_skus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL COMMENT '产品id',
  `cost_price` decimal(10,2) NOT NULL COMMENT '成本价',
  `sale_price` decimal(10,2) NOT NULL COMMENT '销售价',
  `item_value` varchar(255) DEFAULT '' COMMENT 'sku选项id字符串',
  `stock` int(11) NOT NULL COMMENT '库存',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0删除 1正常',
  `image` varchar(3000) NOT NULL DEFAULT '' COMMENT '图片',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_skus`
--

LOCK TABLES `product_skus` WRITE;
/*!40000 ALTER TABLE `product_skus` DISABLE KEYS */;
INSERT INTO `product_skus` VALUES (38,52,100.00,120.00,'4,1',0,'2019-09-01 14:12:55','2019-09-08 12:39:45',1,''),(39,52,100.00,120.00,'4,1',0,'2019-09-01 14:12:55','2019-09-08 12:39:45',1,''),(41,56,456.00,456.00,'4,1',113,'2019-09-03 16:28:35','2019-09-08 12:39:45',1,''),(42,57,78916.00,78916.00,'4,1',4545,'2019-09-03 16:29:43','2019-09-08 12:39:45',1,''),(43,58,665566.00,665566.00,'4,1',545444,'2019-09-03 16:32:33','2019-09-08 12:39:45',1,''),(44,59,12.00,23.00,'4,1',446,'2019-09-04 17:03:45','2019-09-08 12:39:45',1,''),(45,59,12.00,23.00,'5,2',46,'2019-09-04 17:03:45','2019-09-08 12:39:45',1,''),(46,59,12.00,23.00,'4,3',68,'2019-09-04 17:03:45','2019-09-08 12:39:45',1,''),(47,59,12.00,23.00,'5,6',46,'2019-09-04 17:03:45','2019-09-08 12:39:45',1,''),(48,60,45.00,456.00,'5,1',113,'2019-09-05 14:12:25','2019-09-08 12:39:45',1,''),(49,60,45.00,456.00,'5,2',4546,'2019-09-05 14:12:25','2019-09-08 12:39:45',1,''),(50,60,45.00,456.00,'4,3',46,'2019-09-05 14:12:25','2019-09-08 12:39:45',1,''),(51,61,1000.00,1000.00,'4,1',0,'2019-09-07 04:58:30','2019-09-08 12:39:45',1,''),(52,61,222.00,222.00,'5,1',-9,'2019-09-07 04:58:30','2019-09-08 12:39:45',1,''),(55,63,123.00,456.00,'5,1',35,'2019-09-07 05:06:00','2019-09-08 12:39:45',1,''),(58,62,1000.00,1000.00,'5,2',1999999990,'2019-09-07 16:22:24','2019-09-08 12:39:45',1,''),(59,62,1000.00,1000.00,'4,1',0,'2019-09-07 16:22:24','2019-09-08 12:39:45',1,''),(60,51,100.00,120.00,'5,2',0,'2019-09-07 16:23:04','2019-09-08 12:39:45',1,''),(61,51,100.00,120.00,'4,1',0,'2019-09-07 16:23:04','2019-09-08 12:39:45',1,'');
/*!40000 ALTER TABLE `product_skus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '名称',
  `model` varchar(50) NOT NULL COMMENT '型号',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态 0删除 1正常 2下架',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `warehouse_id` int(11) NOT NULL COMMENT '仓库id',
  `user_id` int(11) NOT NULL COMMENT '添加人id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (51,'产品1','20190805165',1,'2019-09-01 14:12:45','2019-09-01 14:12:45',11,16),(52,'产品2','20190805166',1,'2019-09-01 14:12:55','2019-09-01 14:12:55',11,16),(56,'测试测试','7888844',1,'2019-09-03 16:28:35','2019-09-03 16:28:35',11,16),(57,'再来测试','77878787887',1,'2019-09-03 16:29:43','2019-09-03 16:29:43',11,16),(58,'阿瑟東','4545454',1,'2019-09-03 16:32:33','2019-09-04 17:04:18',11,16),(59,'你好','788455554',1,'2019-09-04 17:03:45','2019-09-04 17:03:45',11,16),(60,'哈哈','78989889',2,'2019-09-05 14:12:25','2019-09-08 09:23:59',11,16),(61,'产品2','chanping2',2,'2019-09-07 04:58:30','2019-09-07 08:03:24',11,16),(62,'产品3333333333','chanping333333333333',1,'2019-09-07 04:59:34','2019-09-07 15:46:07',11,16),(63,'茶品666','6666666',1,'2019-09-07 05:06:00','2019-09-07 05:06:00',11,16),(65,'产品1','201908051651',1,'2019-09-08 13:48:52','2019-09-08 13:48:52',1,16);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`) USING BTREE,
  KEY `role_has_permissions_role_id_foreign` (`role_id`) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,4),(2,4),(3,4),(4,4),(5,4),(6,4),(7,4),(8,4),(9,4),(1,5),(2,5),(3,5),(5,5),(8,5),(1,6),(2,6),(3,6),(5,6),(8,6),(1,7),(2,7),(3,7),(5,7),(8,7);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `system` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1正常 2冻结',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (4,'系统管理员','web','2019-08-01 14:20:48','2019-08-31 16:40:16',1,1),(5,'仓库管理员','web','2019-08-01 14:21:07','2019-08-28 16:11:13',1,1),(6,'代理','web','2019-08-01 14:21:11','2019-08-28 16:10:32',1,1),(7,'财务','web','2019-09-01 00:17:55','2019-09-01 00:17:58',1,1);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '名称',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (2,'供应商','2019-09-05 12:09:40','2019-09-05 12:09:40');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systems`
--

DROP TABLE IF EXISTS `systems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `systems` (
  `id` int(11) NOT NULL,
  `stock_warning` int(11) NOT NULL COMMENT '预警库存',
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systems`
--

LOCK TABLES `systems` WRITE;
/*!40000 ALTER TABLE `systems` DISABLE KEYS */;
INSERT INTO `systems` VALUES (1,2222333,'2019-09-07 14:59:55');
/*!40000 ALTER TABLE `systems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '手机号码',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0删除 1正常 2冻结',
  `credit_amount` decimal(10,2) DEFAULT NULL COMMENT '授信额度',
  `agent_rank_id` int(11) DEFAULT NULL COMMENT '代理等级id',
  `sex` tinyint(1) NOT NULL COMMENT '0女 1男',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='用户';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (16,'用户1测试','18814383380',NULL,'$2y$10$8pT.wu1o6ylH4qnrxUf4HeooMyB5sF2t/StLELvmLY.JohR9zfohe','2019-08-01 16:17:30','2019-09-08 12:39:45',1,3880.00,1,1),(27,'用户2','18814383381',NULL,'$2y$10$mgFFw4PPQEOdJQr5YYQpQuP.CL/jgsucpJz0aChlU44IuvRUfLF8W','2019-08-31 16:22:26','2019-08-31 16:22:26',1,1000.00,NULL,1),(28,'用户3','18814383382',NULL,'$2y$10$Ob4fXGhPrAULO9ZpUqKUXuhinaaRZP58M/.qP34ep/rIuEsADMM4a','2019-08-31 16:22:48','2019-08-31 16:22:48',1,1000.00,1,0),(29,'用户3','18814383384',NULL,'$2y$10$NOCDWO2BMhYb8MpaUHYrluroe2FsRXKJnHwM2e3nMkXRrkeweVrMy','2019-08-31 16:23:07','2019-09-03 16:44:58',0,1000.00,1,0),(30,'用户测试1','18814383357',NULL,'$2y$10$zmWe8gvGPPi6dOnVU7eJieC868nFKZ9mjYYiVje/1qvULXvkyn9me','2019-09-04 14:01:44','2019-09-07 14:08:38',0,100.00,NULL,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouse_user`
--

DROP TABLE IF EXISTS `warehouse_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warehouse_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `warehouse_id` int(11) NOT NULL COMMENT '仓库id',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouse_user`
--

LOCK TABLES `warehouse_user` WRITE;
/*!40000 ALTER TABLE `warehouse_user` DISABLE KEYS */;
INSERT INTO `warehouse_user` VALUES (28,17,28),(29,18,16),(30,19,28),(34,11,6);
/*!40000 ALTER TABLE `warehouse_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouses`
--

DROP TABLE IF EXISTS `warehouses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warehouses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '仓库名称',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouses`
--

LOCK TABLES `warehouses` WRITE;
/*!40000 ALTER TABLE `warehouses` DISABLE KEYS */;
INSERT INTO `warehouses` VALUES (11,'仓库1','2019-08-31 16:42:39','2019-08-31 16:42:39'),(17,'仓库3','2019-09-07 03:00:15','2019-09-07 03:00:15'),(19,'仓库4','2019-09-08 13:17:22','2019-09-08 13:17:22');
/*!40000 ALTER TABLE `warehouses` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-09  0:05:53
