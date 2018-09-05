-- MySQL dump 10.13  Distrib 5.7.21, for linux-glibc2.12 (x86_64)
--
-- Host: localhost    Database: bysj
-- ------------------------------------------------------
-- Server version	5.7.21

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
-- Table structure for table `apply`
--

DROP TABLE IF EXISTS `apply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '姓名',
  `no` varchar(255) COLLATE utf8_bin NOT NULL,
  `pwd` varchar(255) COLLATE utf8_bin NOT NULL,
  `col` varchar(255) COLLATE utf8_bin NOT NULL,
  `pro` varchar(255) COLLATE utf8_bin NOT NULL,
  `cls` varchar(255) COLLATE utf8_bin NOT NULL,
  `phone` varchar(255) COLLATE utf8_bin NOT NULL,
  `status` enum('0','1','-1') COLLATE utf8_bin NOT NULL DEFAULT '0',
  `submittime` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apply`
--

LOCK TABLES `apply` WRITE;
/*!40000 ALTER TABLE `apply` DISABLE KEYS */;
INSERT INTO `apply` VALUES (4,'刘亚朋','1307084109','1307084110','计算机与控制工程学院','网络工程','13070841','18518312665','-1',1525270496),(5,'刘亚朋','1307084110','1307084110','计算机与控制工程学院','网络工程','13070841','18518312665','1',1525270496),(6,'刘亚朋','1307084111','1307084110','计算机与控制工程学院','网络工程','13070841','18518312665','1',1525270496),(7,'刘亚朋','1307084112','1307084110','计算机与控制工程学院','网络工程','13070841','18518312665','-1',1525270496),(8,'刘亚朋','1307084113','1307084110','计算机与控制工程学院','网络工程','13070841','18518312665','1',1525270496),(9,'刘亚朋','1307084114','1307084110','计算机与控制工程学院','网络工程','13070841','18518312665','1',1525270496),(10,'刘亚朋','1307084115','1307084110','计算机与控制工程学院','网络工程','13070841','18518312665','1',1525270496),(11,'刘亚朋','1307084116','1307084110','计算机与控制工程学院','网络工程','13070841','18518312665','1',1525270496),(12,'刘亚朋','1307084117','1307084110','计算机与控制工程学院','网络工程','13070841','18518312665','-1',1525270496),(13,'刘亚朋','1307084118','1307084110','计算机与控制工程学院','网络工程','13070841','18518312665','1',1525270496),(14,'刘亚朋','1307084119','1307084110','计算机与控制工程学院','网络工程','13070841','18518312665','-1',1525270496),(15,'刘亚朋','1307084120','1307084110','计算机与控制工程学院','网络工程','13070841','18518312665','1',1525270496),(16,'mt','1414010117','123456','软件学院','软件工程','14140X01','15135181123','-1',1525569331),(17,'麦安宇','1414010117','123456','软件学院','软件工程','14140101','15135181123','-1',1525569778),(18,'kk','1414010117','000000','软件学院rjxy','软件工程php','123456','181546354','-1',1525574955),(19,'mm','1414010111','000000','aaaaa','aaaaa','14140X01','1513518','-1',1525575167),(20,'马天','1414010118','000000','软件学院','软件工程','14140X01','15135181234','-1',1525589073),(21,'马天','1414010118','000000','软件学院','软件工程','14140101','15135181234','1',1525590016),(22,'1','14140X0110','1','1','1','14140X01','18518312665','1',1525595569),(23,'张思','1414010733','000000','软件学院','软件工程','14140101','15135121314','1',1525766301),(24,'hello','1414010101','000000','软件','软件','14140X01','15166666666','1',1525873546);
/*!40000 ALTER TABLE `apply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_files`
--

DROP TABLE IF EXISTS `article_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `filepath` varchar(255) DEFAULT NULL COMMENT '文件路径',
  `date` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_files`
--

LOCK TABLES `article_files` WRITE;
/*!40000 ALTER TABLE `article_files` DISABLE KEYS */;
INSERT INTO `article_files` VALUES (179,'20180504/fa1e4a67a65f94744fda2ab675c3c447.jpg',0),(180,'20180504/ac8e6f7d72a8c142755f5eced25c2551.jpg',0),(181,'20180504/552f55f3b82da1c741d7d7ade8658b3c.jpg',0),(182,'20180506/1e60093cf625a70f39fd68e187b4b976.png',1525595969),(183,'20180506/9063b2239e1a8e4c803f104f3f5d1526.png',1525595997),(184,'20180506/e604a24eda0015a3a78473d14ee080e1.png',1525595997);
/*!40000 ALTER TABLE `article_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_list`
--

DROP TABLE IF EXISTS `article_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_list` (
  `gid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `date` bigint(20) NOT NULL,
  `content` longtext,
  `excerpt` longtext NOT NULL,
  `alias` varchar(200) DEFAULT '',
  `author` int(10) NOT NULL DEFAULT '1',
  `sortid` int(10) NOT NULL DEFAULT '-1',
  `type` varchar(20) NOT NULL DEFAULT 'blog',
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `comnum` int(10) unsigned NOT NULL DEFAULT '0',
  `attnum` int(10) unsigned NOT NULL DEFAULT '0',
  `top` enum('n','y') NOT NULL DEFAULT 'n',
  `sortop` enum('n','y') NOT NULL DEFAULT 'n',
  `hide` enum('n','y') NOT NULL DEFAULT 'n',
  `checked` enum('n','y') NOT NULL DEFAULT 'y',
  `allow_remark` enum('n','y') NOT NULL DEFAULT 'y',
  `password` varchar(255) NOT NULL DEFAULT '',
  `template` varchar(255) NOT NULL DEFAULT '',
  `status` enum('0','1') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '1' COMMENT '启用状态',
  `compositor` int(10) NOT NULL DEFAULT '0',
  `img_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`gid`),
  KEY `date` (`date`),
  KEY `author` (`author`),
  KEY `sortid` (`sortid`),
  KEY `type` (`type`),
  KEY `views` (`views`),
  KEY `comnum` (`comnum`),
  KEY `hide` (`hide`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_list`
--

LOCK TABLES `article_list` WRITE;
/*!40000 ALTER TABLE `article_list` DISABLE KEYS */;
INSERT INTO `article_list` VALUES (100,'成员招募',1525850783,'<h4 style=\"font-size: 32px; font-weight: bold; border-bottom: 2px solid rgb(204, 204, 204); padding: 0px 4px 0px 0px; text-align: center; margin: 0px 0px 20px;\">成员招募</h4><p style=\"text-indent: 2em;\">一年一度的招募季开始了，如果你符合以下条件欢迎你的到来。</p><p style=\"text-indent: 2em; text-align: center;\"><img src=\"/ueditor/php/upload/image/20180507/1525698380257879.png\" title=\"1525698380257879.png\" alt=\"1525698380257879.png\" style=\"width: 300px; height: 40px;\" _src=\"/ueditor/php/upload/image/20180507/1525698380257879.png\" width=\"300\" vspace=\"0\" height=\"40\" border=\"0\"></p><p style=\"text-indent: 2em; text-align: center;\">1、中北大学在校生。</p><p style=\"text-align: center;\">2、对网络安全有浓厚的兴趣。</p><p style=\"text-align: center;\">3、乐于学习。</p><p style=\"text-align: center;\">4、吃苦耐劳，坚持不懈。<br></p>','成员招募1','',1,1,'blog',0,0,0,'n','n','n','y','y','','','1',2,NULL),(109,'vb',1525850532,'<p>dfdf<br/></p>','vbvbvbb','',1,1130,'blog',0,0,0,'n','n','n','y','y','','','0',0,NULL),(105,'实验室信息4',1525707702,'<p>实验室信息4</p>','实验室信息4','',1,1130,'blog',0,0,0,'n','n','n','y','y','','','1',4,NULL),(106,'实验室信息5',1525707717,'<p>实验室信息5</p>','实验室信息5','',1,1130,'blog',0,0,0,'n','n','n','y','y','','','1',5,NULL),(107,'实验室信息6',1525707757,'<p>实验室信息6</p>','实验室信息6','',1,1130,'blog',0,0,0,'n','n','n','y','y','','','1',6,NULL),(108,'测试',1525766810,'<p>测试<br/></p>','测试','',1,1130,'blog',0,0,0,'n','n','n','y','y','','','1',1,NULL),(110,'公告：去除order测试',1525852331,'<p style=\"text-align: center;\"><br/></p><p><br/></p><p style=\"text-align:center\"><img src=\"/ueditor/php/upload/image/20180509/1525852289973597.jpg\" title=\"1525852289973597.jpg\" alt=\"QQ截图20180319104854.jpg\"/></p><p style=\"text-align: center;\">去除order测试</p>','去除order测试','',1,2,'blog',0,0,0,'n','n','n','y','y','','','1',0,NULL),(111,'111',1525873691,'<p><img src=\"http://img.baidu.com/hi/jx2/j_0002.gif\"/><img src=\"http://img.baidu.com/hi/jx2/j_0005.gif\"/></p>','001','',1,2,'blog',0,0,0,'n','n','n','y','y','','','1',0,NULL),(112,'001',1526044949,'<p><br></p>','kk\'','',1,2,'blog',0,0,0,'n','n','n','y','y','','','1',0,NULL),(101,'公告',1525707785,'<p>这是一条公告<br></p>','第一条公告','',1,2,'blog',0,0,0,'n','n','n','y','y','','','1',0,NULL),(102,'实验室信息1',1525707562,'<p>实验室信息1</p>','实验室信息1','',1,1130,'blog',0,0,0,'n','n','n','y','y','','','1',0,NULL),(103,'实验室信息2',1525707632,'<p>实验室信息2</p>','实验室信息2','',1,1130,'blog',0,0,0,'n','n','n','y','y','','','1',2,NULL),(104,'实验室信息3',1525767680,'<p>实验室信息3</p>','实验室信息3','',1,1130,'blog',0,0,0,'n','n','n','y','y','','','0',3,NULL);
/*!40000 ALTER TABLE `article_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_sort`
--

DROP TABLE IF EXISTS `article_sort`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_sort` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sortname` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(200) NOT NULL DEFAULT '',
  `taxis` int(10) unsigned NOT NULL DEFAULT '0',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `template` varchar(255) NOT NULL DEFAULT '',
  `date` bigint(20) NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '1' COMMENT '启用状态',
  `compositor` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=1131 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_sort`
--

LOCK TABLES `article_sort` WRITE;
/*!40000 ALTER TABLE `article_sort` DISABLE KEYS */;
INSERT INTO `article_sort` VALUES (1,'成员招募','',1,0,'发布成员招募信息','',1525583001,'1',0),(2,'公告','',0,0,'公告发布','',1525582987,'1',0),(1130,'实验室信息','',0,0,'实验室实验信息等','',1525707536,'1',1);
/*!40000 ALTER TABLE `article_sort` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission`
--

DROP TABLE IF EXISTS `permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_bin NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `parent` int(11) NOT NULL,
  `status` enum('0','1') COLLATE utf8_bin NOT NULL DEFAULT '1',
  `addtime` int(10) NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission`
--

LOCK TABLES `permission` WRITE;
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
INSERT INTO `permission` VALUES (1,'/index.php/index/home.html','首页',0,'1',1525509057,10),(2,'javascript:void(0);','成员管理',0,'1',1525509057,30),(3,'javascript:void(0);','系统管理',0,'1',1525509057,40),(4,'javascript:void(0);','个人中心',0,'1',1525509057,50),(5,'javascript:void(0);','信息管理',0,'1',1525509057,20),(6,'/index.php/index/userList/0.html','成员列表',2,'1',1525509057,10),(7,'/index.php/test.html','测试',1,'1',1525509057,10),(8,'/index.php/index/userAudit.html','成员审核',2,'1',1525509057,20),(9,'/index.php/index/roleManager.html','角色管理',3,'1',1525509057,10),(10,'/index.php/index/adminCompetence.html','权限管理',3,'1',1525509057,20),(11,'/index.php/index/userInfo.html','个人信息',4,'1',1525509057,10),(12,'/index.php/index/articleSort.html','信息分类',5,'1',1525516915,10),(13,'/index.php/index/articleAdd.html','信息发布',5,'1',1525516958,10),(14,'/index.php/index/articleList.html','信息列表',5,'1',1525516997,10);
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `role_p` varchar(255) COLLATE utf8_bin NOT NULL,
  `status` enum('0','1') COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'超级管理员','1,2,6,8,3,9,10,4,11,5,12,13,14','1'),(2,'普通管理员','1,2,6,8,4,11,5,12,13,14','1'),(3,'普通成员','1,4,11','1'),(4,'测试','1,2,6,3,4,5','1'),(5,'测试','1','1');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_account` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_password` varchar(255) COLLATE utf8_bin NOT NULL,
  `addtime` bigint(20) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_col` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '学院',
  `user_pro` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '专业',
  `user_cls` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '班级',
  `user_pho` bigint(20) NOT NULL COMMENT '用户手机号',
  `status` enum('0','1') COLLATE utf8_bin NOT NULL DEFAULT '1' COMMENT '启用状态',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_account` (`user_account`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'ADMIN','admin','a7ae38eb87add853c767e59cee5623d5',1523701363,1,'计算机与控制工程学院','网络工程','13070841',18334788685,'1'),(5,'刘亚朋','1307084110','38e9da3a4874a295a8a389733162c587',1525275017,1,'计算机与控制工程学院','网络工程','13070841',18518312665,'1'),(6,'刘亚朋','1307084120','e76cb8c9fb55a4f8411f36f27619dd25',1525324601,1,'计算机与控制工程学院','网络工程','13070841',18518312665,'0'),(7,'刘亚朋','1307084118','dc2f87b38301d9a5c6e5331114fd76c5',1525324614,2,'计算机与控制工程学院','网络工程','13070841',18518312665,'0'),(8,'刘亚朋','1307084116','4bfd4f2612ab54b2475e0dd549497d4c',1525324739,3,'计算机与控制工程学院','网络工程','13070841',18518312665,'1'),(9,'刘亚朋','1307084115','c71b5d02e7d78eccd8e7e7a12b6edbde',1525324803,4,'计算机与控制工程学院','网络工程','13070841',18518312665,'1'),(10,'刘亚朋','1307084114','91819275d2f04669d3096f04f7064a27',1525324824,2,'计算机与控制工程学院','网络工程','13070841',18518312665,'1'),(11,'刘亚朋','1307084113','0ffebb478f73aa96ce8419608251dd5f',1525324838,2,'计算机与控制工程学院','网络工程','13070841',18518312665,'0'),(12,'刘亚朋','1307084111','cd729c3271c390d89f7039e13613b93e',1525569616,3,'计算机与控制工程学院','网络工程','13070841',18518312665,'1'),(13,'麦安宇','1414010117','2f392ad6c70754bc69ff665cec35bcd5',1525569824,1,'软件学院','软件工程','14140101',15135181123,'0'),(15,'马天','1414010118','8f905cc09660dc2ecab38e8769aec5bd',1525590096,3,'软件学院','软件工程','14140101',15135181234,'0'),(16,'张思','1414010733','9f7f05d98a857250c104372b61efc673',1525766380,3,'软件学院','软件工程','14140101',15135121314,'1'),(17,'1','14140X0110','9ff91d4644840d0c22c70c292ba99e3c',1525852158,3,'1','1','14140X01',18518312665,'1'),(18,'hello','1414010101','f86173075a494e6168f0b619ce4716bc',1525873563,3,'软件','软件','14140X01',15166666666,'1');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_logs`
--

DROP TABLE IF EXISTS `user_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `login_ip` varchar(255) COLLATE utf8_bin NOT NULL,
  `login_time` int(10) NOT NULL,
  `login_addr` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_logs`
--

LOCK TABLES `user_logs` WRITE;
/*!40000 ALTER TABLE `user_logs` DISABLE KEYS */;
INSERT INTO `user_logs` VALUES (1,1,'127.0.0.1',1525454673,'0'),(2,1,'127.0.0.1',1525454794,'0'),(3,1,'127.0.0.1',1525455099,'XX-XX-内网IP'),(4,1,'111.199.62.142',1525517253,'中国-北京-北京'),(5,1,'111.199.62.142',1525517362,'中国-北京-北京'),(6,5,'111.199.62.142',1525517460,'中国-北京-北京'),(7,1,'111.199.62.142',1525517919,'中国-北京-北京'),(8,1,'111.199.62.142',1525518460,'中国-北京-北京'),(9,1,'111.199.62.142',1525518753,'中国-北京-北京'),(10,5,'111.199.62.142',1525518794,'中国-北京-北京'),(11,1,'183.203.223.15',1525522216,'中国-山西-太原'),(12,1,'117.103.129.230',1525522581,'中国-北京-北京'),(13,1,'183.203.223.15',1525530805,'中国-山西-太原'),(14,1,'111.199.62.142',1525532342,'中国-北京-北京'),(15,1,'183.203.223.44',1525566811,'中国-山西-太原'),(16,1,'117.103.129.230',1525568237,'中国-北京-北京'),(17,1,'183.203.223.44',1525569522,'中国-山西-太原'),(18,1,'183.203.223.44',1525569804,'中国-山西-太原'),(19,13,'183.203.223.44',1525570633,'中国-山西-太原'),(20,1,'117.103.129.230',1525571059,'中国-北京-北京'),(21,1,'183.203.223.44',1525571209,'中国-山西-太原'),(22,13,'183.203.223.44',1525571778,'中国-山西-太原'),(23,1,'183.203.223.44',1525575033,'中国-山西-太原'),(24,13,'183.203.223.44',1525575659,'中国-山西-太原'),(25,1,'183.203.223.44',1525576022,'中国-山西-太原'),(26,1,'111.199.62.142',1525580430,'中国-北京-北京'),(27,1,'111.199.62.142',1525583716,'中国-北京-北京'),(28,1,'111.199.62.142',1525584056,'中国-北京-北京'),(29,1,'111.199.62.142',1525584110,'中国-北京-北京'),(30,1,'183.203.223.15',1525588972,'中国-山西-太原'),(31,1,'183.203.223.15',1525589101,'中国-山西-太原'),(32,13,'183.203.223.15',1525589305,'中国-山西-太原'),(33,1,'183.203.223.15',1525590086,'中国-山西-太原'),(34,15,'183.203.223.15',1525590183,'中国-山西-太原'),(35,1,'183.203.223.15',1525590361,'中国-山西-太原'),(36,1,'183.203.223.15',1525590612,'中国-山西-太原'),(37,1,'111.199.62.142',1525595659,'中国-北京-北京'),(38,1,'117.103.129.230',1525595846,'中国-北京-北京'),(39,1,'183.203.223.15',1525595917,'中国-山西-太原'),(40,13,'183.203.223.15',1525596265,'中国-山西-太原'),(41,13,'183.203.223.15',1525601016,'中国-山西-太原'),(42,1,'183.203.223.15',1525601115,'中国-山西-太原'),(43,1,'117.103.129.230',1525601126,'中国-北京-北京'),(44,1,'111.199.62.142',1525615660,'中国-北京-北京'),(45,1,'111.198.72.177',1525655080,'中国-北京-北京'),(46,1,'183.203.223.44',1525663936,'中国-山西-太原'),(47,1,'117.103.129.226',1525695815,'中国-北京-北京'),(48,1,'111.199.62.142',1525697624,'中国-北京-北京'),(49,1,'111.199.62.142',1525702420,'中国-北京-北京'),(50,1,'111.199.62.142',1525704317,'中国-北京-北京'),(51,1,'111.199.62.142',1525706452,'中国-北京-北京'),(52,1,'111.199.62.142',1525706561,'中国-北京-北京'),(53,1,'111.198.72.177',1525741129,'中国-北京-北京'),(54,1,'111.198.72.177',1525753941,'中国-北京-北京'),(55,1,'183.203.223.15',1525766183,'中国-山西-太原'),(56,1,'183.203.223.15',1525766352,'中国-山西-太原'),(57,16,'183.203.223.15',1525766422,'中国-山西-太原'),(58,1,'183.203.223.15',1525766626,'中国-山西-太原'),(59,16,'183.203.223.15',1525766676,'中国-山西-太原'),(60,16,'183.203.223.15',1525768168,'中国-山西-太原'),(61,1,'183.203.223.15',1525768198,'中国-山西-太原'),(62,16,'183.203.223.15',1525768245,'中国-山西-太原'),(63,1,'111.199.62.142',1525790923,'中国-北京-北京'),(64,1,'111.199.62.142',1525793890,'中国-北京-北京'),(65,1,'111.198.72.177',1525827952,'中国-北京-北京'),(66,1,'111.198.72.177',1525828047,'中国-北京-北京'),(67,1,'111.198.72.177',1525850476,'中国-北京-北京'),(68,1,'111.198.72.177',1525851590,'中国-北京-北京'),(69,1,'111.198.72.177',1525851929,'中国-北京-北京'),(70,1,'111.198.72.177',1525860156,'中国-北京-北京'),(71,1,'111.198.72.177',1525860884,'中国-北京-北京'),(72,1,'183.203.223.15',1525873002,'中国-山西-太原'),(73,1,'183.203.223.15',1525873300,'中国-山西-太原'),(74,18,'183.203.223.15',1525873619,'中国-山西-太原'),(75,1,'111.199.63.56',1526044919,'中国-北京-北京'),(76,1,'111.199.63.56',1526297065,'中国-北京-北京'),(77,1,'183.203.223.12',1526298233,'中国-山西-太原'),(78,18,'183.203.223.12',1526298748,'中国-山西-太原');
/*!40000 ALTER TABLE `user_logs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-14 20:48:53
