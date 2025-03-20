-- MySQL dump 10.13  Distrib 8.0.41, for Linux (x86_64)
--
-- Host: localhost    Database: neo_egoist_league
-- ------------------------------------------------------
-- Server version	8.0.41

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `country` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `flag` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=250 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'Japan','https://flagcdn.com/w320/jp.png'),(2,'France','https://flagcdn.com/w320/fr.png'),(3,'Germany','https://flagcdn.com/w320/de.png'),(4,'Argentina','https://flagcdn.com/w320/ar.png'),(5,'Brazil','https://flagcdn.com/w320/br.png'),(6,'China','https://flagcdn.com/w320/cn.png'),(7,'India','https://flagcdn.com/w320/in.png'),(8,'United States','https://flagcdn.com/w320/us.png'),(9,'Indonesia','https://flagcdn.com/w320/id.png'),(10,'Pakistan','https://flagcdn.com/w320/pk.png'),(11,'Nigeria','https://flagcdn.com/w320/ng.png'),(12,'Bangladesh','https://flagcdn.com/w320/bd.png'),(13,'Russia','https://flagcdn.com/w320/ru.png'),(14,'Mexico','https://flagcdn.com/w320/mx.png'),(15,'Ethiopia','https://flagcdn.com/w320/et.png'),(16,'Philippines','https://flagcdn.com/w320/ph.png'),(17,'Egypt','https://flagcdn.com/w320/eg.png'),(18,'Vietnam','https://flagcdn.com/w320/vn.png'),(19,'DR Congo','https://flagcdn.com/w320/cd.png'),(20,'Turkey','https://flagcdn.com/w320/tr.png'),(21,'Iran','https://flagcdn.com/w320/ir.png'),(22,'Thailand','https://flagcdn.com/w320/th.png'),(23,'United Kingdom','https://flagcdn.com/w320/gb.png'),(24,'Tanzania','https://flagcdn.com/w320/tz.png'),(25,'South Africa','https://flagcdn.com/w320/za.png'),(26,'Myanmar','https://flagcdn.com/w320/mm.png'),(27,'South Korea','https://flagcdn.com/w320/kr.png'),(28,'Colombia','https://flagcdn.com/w320/co.png'),(29,'Kenya','https://flagcdn.com/w320/ke.png'),(30,'Spain','https://flagcdn.com/w320/es.png'),(31,'Uganda','https://flagcdn.com/w320/ug.png'),(32,'Algeria','https://flagcdn.com/w320/dz.png'),(33,'Sudan','https://flagcdn.com/w320/sd.png'),(34,'Iraq','https://flagcdn.com/w320/iq.png'),(35,'Afghanistan','https://flagcdn.com/w320/af.png'),(36,'Poland','https://flagcdn.com/w320/pl.png'),(37,'Canada','https://flagcdn.com/w320/ca.png'),(38,'Morocco','https://flagcdn.com/w320/ma.png'),(39,'Uzbekistan','https://flagcdn.com/w320/uz.png'),(40,'Saudi Arabia','https://flagcdn.com/w320/sa.png'),(41,'Peru','https://flagcdn.com/w320/pe.png'),(42,'Angola','https://flagcdn.com/w320/ao.png'),(43,'Malaysia','https://flagcdn.com/w320/my.png'),(44,'Mozambique','https://flagcdn.com/w320/mz.png'),(45,'Ghana','https://flagcdn.com/w320/gh.png'),(46,'Yemen','https://flagcdn.com/w320/ye.png'),(47,'Nepal','https://flagcdn.com/w320/np.png'),(48,'Venezuela','https://flagcdn.com/w320/ve.png'),(49,'Madagascar','https://flagcdn.com/w320/mg.png'),(50,'Cameroon','https://flagcdn.com/w320/cm.png'),(51,'Ivory Coast','https://flagcdn.com/w320/ci.png'),(52,'North Korea','https://flagcdn.com/w320/kp.png'),(53,'Australia','https://flagcdn.com/w320/au.png'),(54,'Niger','https://flagcdn.com/w320/ne.png'),(55,'Taiwan','https://flagcdn.com/w320/tw.png'),(56,'Sri Lanka','https://flagcdn.com/w320/lk.png'),(57,'Burkina Faso','https://flagcdn.com/w320/bf.png'),(58,'Mali','https://flagcdn.com/w320/ml.png'),(59,'Romania','https://flagcdn.com/w320/ro.png'),(60,'Malawi','https://flagcdn.com/w320/mw.png'),(61,'Chile','https://flagcdn.com/w320/cl.png'),(62,'Kazakhstan','https://flagcdn.com/w320/kz.png'),(63,'Zambia','https://flagcdn.com/w320/zm.png'),(64,'Guatemala','https://flagcdn.com/w320/gt.png'),(65,'Ecuador','https://flagcdn.com/w320/ec.png'),(66,'Syria','https://flagcdn.com/w320/sy.png'),(67,'Netherlands','https://flagcdn.com/w320/nl.png'),(68,'Italy','https://flagcdn.com/w320/it.png'),(69,'Belgium','https://flagcdn.com/w320/be.png'),(70,'Czech Republic','https://flagcdn.com/w320/cz.png'),(71,'Greece','https://flagcdn.com/w320/gr.png'),(72,'Portugal','https://flagcdn.com/w320/pt.png'),(73,'Sweden','https://flagcdn.com/w320/se.png'),(74,'Hungary','https://flagcdn.com/w320/hu.png'),(75,'Austria','https://flagcdn.com/w320/at.png'),(76,'Finland','https://flagcdn.com/w320/fi.png'),(77,'Slovakia','https://flagcdn.com/w320/sk.png'),(78,'Ireland','https://flagcdn.com/w320/ie.png'),(79,'Croatia','https://flagcdn.com/w320/hr.png'),(80,'Slovenia','https://flagcdn.com/w320/si.png'),(81,'Luxembourg','https://flagcdn.com/w320/lu.png'),(82,'Lithuania','https://flagcdn.com/w320/lt.png'),(83,'Latvia','https://flagcdn.com/w320/lv.png'),(84,'Estonia','https://flagcdn.com/w320/ee.png'),(85,'Cyprus','https://flagcdn.com/w320/cy.png'),(86,'Malta','https://flagcdn.com/w320/mt.png'),(87,'Bulgaria','https://flagcdn.com/w320/bg.png'),(88,'England','https://flagcdn.com/w320/gb-eng.png'),(89,'Scotland','https://flagcdn.com/w320/gb-sct.png'),(90,'Wales','https://flagcdn.com/w320/gb-wls.png'),(91,'Northern Ireland','https://flagcdn.com/w320/gb-nir.png'),(92,'Albania','https://flagcdn.com/w320/al.png'),(93,'Andorra','https://flagcdn.com/w320/ad.png'),(94,'Antigua and Barbuda','https://flagcdn.com/w320/ag.png'),(95,'Armenia','https://flagcdn.com/w320/am.png'),(96,'Azerbaijan','https://flagcdn.com/w320/az.png'),(97,'Bahamas','https://flagcdn.com/w320/bs.png'),(98,'Bahrain','https://flagcdn.com/w320/bh.png'),(99,'Barbados','https://flagcdn.com/w320/bb.png'),(100,'Belarus','https://flagcdn.com/w320/by.png'),(101,'Belize','https://flagcdn.com/w320/bz.png'),(102,'Benin','https://flagcdn.com/w320/bj.png'),(103,'Bhutan','https://flagcdn.com/w320/bt.png'),(104,'Bolivia','https://flagcdn.com/w320/bo.png'),(105,'Bosnia and Herzegovina','https://flagcdn.com/w320/ba.png'),(106,'Botswana','https://flagcdn.com/w320/bw.png'),(107,'Brunei','https://flagcdn.com/w320/bn.png'),(108,'Burundi','https://flagcdn.com/w320/bi.png'),(109,'Cabo Verde','https://flagcdn.com/w320/cv.png'),(110,'Cambodia','https://flagcdn.com/w320/kh.png'),(111,'Central African Republic','https://flagcdn.com/w320/cf.png'),(112,'Chad','https://flagcdn.com/w320/td.png'),(113,'Comoros','https://flagcdn.com/w320/km.png'),(115,'Congo, Republic of the','https://flagcdn.com/w320/cg.png'),(116,'Costa Rica','https://flagcdn.com/w320/cr.png'),(117,'Cuba','https://flagcdn.com/w320/cu.png'),(118,'Denmark','https://flagcdn.com/w320/dk.png'),(119,'Djibouti','https://flagcdn.com/w320/dj.png'),(120,'Dominica','https://flagcdn.com/w320/dm.png'),(121,'Dominican Republic','https://flagcdn.com/w320/do.png'),(122,'El Salvador','https://flagcdn.com/w320/sv.png'),(123,'Equatorial Guinea','https://flagcdn.com/w320/gq.png'),(124,'Eritrea','https://flagcdn.com/w320/er.png'),(125,'Eswatini','https://flagcdn.com/w320/sz.png'),(126,'Fiji','https://flagcdn.com/w320/fj.png'),(127,'Gabon','https://flagcdn.com/w320/ga.png'),(128,'Gambia','https://flagcdn.com/w320/gm.png'),(129,'Georgia','https://flagcdn.com/w320/ge.png'),(130,'Grenada','https://flagcdn.com/w320/gd.png'),(131,'Guinea','https://flagcdn.com/w320/gn.png'),(132,'Guinea-Bissau','https://flagcdn.com/w320/gw.png'),(133,'Guyana','https://flagcdn.com/w320/gy.png'),(134,'Haiti','https://flagcdn.com/w320/ht.png'),(135,'Honduras','https://flagcdn.com/w320/hn.png'),(136,'Iceland','https://flagcdn.com/w320/is.png'),(137,'Israel','https://flagcdn.com/w320/il.png'),(138,'Jamaica','https://flagcdn.com/w320/jm.png'),(139,'Jordan','https://flagcdn.com/w320/jo.png'),(140,'Kiribati','https://flagcdn.com/w320/ki.png'),(141,'Kuwait','https://flagcdn.com/w320/kw.png'),(142,'Kyrgyzstan','https://flagcdn.com/w320/kg.png'),(143,'Laos','https://flagcdn.com/w320/la.png'),(144,'Lebanon','https://flagcdn.com/w320/lb.png'),(145,'Lesotho','https://flagcdn.com/w320/ls.png'),(146,'Liberia','https://flagcdn.com/w320/lr.png'),(147,'Libya','https://flagcdn.com/w320/ly.png'),(148,'Liechtenstein','https://flagcdn.com/w320/li.png'),(149,'Maldives','https://flagcdn.com/w320/mv.png'),(150,'Marshall Islands','https://flagcdn.com/w320/mh.png'),(151,'Mauritania','https://flagcdn.com/w320/mr.png'),(152,'Mauritius','https://flagcdn.com/w320/mu.png'),(153,'Micronesia','https://flagcdn.com/w320/fm.png'),(154,'Moldova','https://flagcdn.com/w320/md.png'),(155,'Monaco','https://flagcdn.com/w320/mc.png'),(156,'Mongolia','https://flagcdn.com/w320/mn.png'),(157,'Montenegro','https://flagcdn.com/w320/me.png'),(158,'Namibia','https://flagcdn.com/w320/na.png'),(159,'Nauru','https://flagcdn.com/w320/nr.png'),(160,'New Zealand','https://flagcdn.com/w320/nz.png'),(161,'Nicaragua','https://flagcdn.com/w320/ni.png'),(162,'North Macedonia','https://flagcdn.com/w320/mk.png'),(163,'Norway','https://flagcdn.com/w320/no.png'),(164,'Oman','https://flagcdn.com/w320/om.png'),(165,'Palau','https://flagcdn.com/w320/pw.png'),(166,'Palestine','https://flagcdn.com/w320/ps.png'),(167,'Panama','https://flagcdn.com/w320/pa.png'),(168,'Papua New Guinea','https://flagcdn.com/w320/pg.png'),(169,'Paraguay','https://flagcdn.com/w320/py.png'),(170,'Qatar','https://flagcdn.com/w320/qa.png'),(171,'Rwanda','https://flagcdn.com/w320/rw.png'),(172,'Saint Kitts and Nevis','https://flagcdn.com/w320/kn.png'),(173,'Saint Lucia','https://flagcdn.com/w320/lc.png'),(174,'Saint Vincent and the Grenadines','https://flagcdn.com/w320/vc.png'),(175,'Samoa','https://flagcdn.com/w320/ws.png'),(176,'San Marino','https://flagcdn.com/w320/sm.png'),(177,'Sao Tome and Principe','https://flagcdn.com/w320/st.png'),(178,'Senegal','https://flagcdn.com/w320/sn.png'),(179,'Serbia','https://flagcdn.com/w320/rs.png'),(180,'Seychelles','https://flagcdn.com/w320/sc.png'),(181,'Sierra Leone','https://flagcdn.com/w320/sl.png'),(182,'Singapore','https://flagcdn.com/w320/sg.png'),(183,'Solomon Islands','https://flagcdn.com/w320/sb.png'),(184,'Somalia','https://flagcdn.com/w320/so.png'),(185,'South Sudan','https://flagcdn.com/w320/ss.png'),(186,'Suriname','https://flagcdn.com/w320/sr.png'),(187,'Switzerland','https://flagcdn.com/w320/ch.png'),(188,'Tajikistan','https://flagcdn.com/w320/tj.png'),(189,'Timor-Leste','https://flagcdn.com/w320/tl.png'),(190,'Togo','https://flagcdn.com/w320/tg.png'),(191,'Tonga','https://flagcdn.com/w320/to.png'),(192,'Trinidad and Tobago','https://flagcdn.com/w320/tt.png'),(193,'Tunisia','https://flagcdn.com/w320/tn.png'),(194,'Turkmenistan','https://flagcdn.com/w320/tm.png'),(195,'Tuvalu','https://flagcdn.com/w320/tv.png'),(196,'Ukraine','https://flagcdn.com/w320/ua.png'),(197,'United Arab Emirates','https://flagcdn.com/w320/ae.png'),(198,'Uruguay','https://flagcdn.com/w320/uy.png'),(199,'Vanuatu','https://flagcdn.com/w320/vu.png'),(200,'Vatican City','https://flagcdn.com/w320/va.png'),(201,'Zimbabwe','https://flagcdn.com/w320/zw.png'),(202,'Kosovo','https://flagcdn.com/w320/xk.png'),(203,'American Samoa','https://flagcdn.com/w320/as.png'),(204,'Aruba','https://flagcdn.com/w320/aw.png'),(205,'Bonaire, Sint Eustatius and Saba','https://flagcdn.com/w320/bq.png'),(206,'British Indian Ocean Territory','https://flagcdn.com/w320/io.png'),(207,'Cocos (Keeling) Islands','https://flagcdn.com/w320/cc.png'),(208,'Christmas Island','https://flagcdn.com/w320/cx.png'),(209,'Cayman Islands','https://flagcdn.com/w320/ky.png'),(210,'Cook Islands','https://flagcdn.com/w320/ck.png'),(211,'Curaçao','https://flagcdn.com/w320/CW.png'),(212,'Faroe Islands','https://flagcdn.com/w320/fo.png'),(213,'Falkland Islands','https://flagcdn.com/w320/fk.png'),(214,'French Southern Territories','https://flagcdn.com/w320/tf.png'),(215,'French Polynesia','https://flagcdn.com/w320/pf.png'),(216,'French Guiana','https://flagcdn.com/w320/gf.png'),(217,'Guam','https://flagcdn.com/w320/gu.png'),(218,'Guernsey','https://flagcdn.com/w320/gg.png'),(219,'Heard Island and McDonald Islands','https://flagcdn.com/w320/hm.png'),(220,'Holy See','https://flagcdn.com/w320/va.png'),(221,'Hong Kong','https://flagcdn.com/w320/hk.png'),(222,'Isle of Man','https://flagcdn.com/w320/im.png'),(223,'Jersey','https://flagcdn.com/w320/je.png'),(224,'Macao','https://flagcdn.com/w320/mo.png'),(225,'Niue','https://flagcdn.com/w320/nu.png'),(226,'Norfolk Island','https://flagcdn.com/w320/nf.png'),(227,'Northern Mariana Islands','https://flagcdn.com/w320/mp.png'),(228,'Puerto Rico','https://flagcdn.com/w320/pr.png'),(229,'Réunion','https://flagcdn.com/w320/re.png'),(230,'Saint Martin','https://flagcdn.com/w320/mf.png'),(231,'Åland Islands','https://flagcdn.com/w320/ax.png'),(232,'Virgin Islands (U.S.)','https://flagcdn.com/w320/vi.png'),(233,'Virgin Islands (British)','https://flagcdn.com/w320/vg.png'),(234,'Wallis and Futuna','https://flagcdn.com/w320/wf.png'),(235,'Western Sahara','https://flagcdn.com/w320/eh.png'),(236,'Turks and Caicos Islands','https://flagcdn.com/w320/tc.png'),(237,'Sint Maarten','https://flagcdn.com/w320/sx.png'),(238,'Tokelau','https://flagcdn.com/w320/tk.png'),(239,'Svalbard and Jan Mayen','https://flagcdn.com/w320/sj.png'),(240,'South Georgia and the South Sandwich Islands','https://flagcdn.com/w320/gs.png'),(241,'Pitcairn','https://flagcdn.com/w320/pn.png'),(242,'Mayotte','https://flagcdn.com/w320/yt.png'),(243,'Bouvet Island','https://flagcdn.com/w320/bv.png'),(244,'Antarctica','https://flagcdn.com/w320/aq.png'),(245,'Gibraltar','https://flagcdn.com/w320/gi.png'),(246,'Greenland','https://flagcdn.com/w320/gl.png'),(247,'Montserrat','https://flagcdn.com/w320/ms.png'),(248,'New Caledonia','https://flagcdn.com/w320/nw.png'),(249,'United States Minor Outlying Islands','https://flagcdn.com/w320/um.png');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `image` (
  `id` int NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offer`
--

DROP TABLE IF EXISTS `offer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `team_id` int NOT NULL,
  `player_id` int NOT NULL,
  `amount` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `team_id` (`team_id`),
  KEY `player_id` (`player_id`),
  CONSTRAINT `offer_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`),
  CONSTRAINT `offer_ibfk_2` FOREIGN KEY (`player_id`) REFERENCES `player` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offer`
--

LOCK TABLES `offer` WRITE;
/*!40000 ALTER TABLE `offer` DISABLE KEYS */;
/*!40000 ALTER TABLE `offer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player`
--

DROP TABLE IF EXISTS `player`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `player` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `jersey_number` tinyint DEFAULT NULL,
  `team_id` int DEFAULT NULL,
  `country_id` int DEFAULT NULL,
  `position_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `team_id` (`team_id`),
  KEY `country_id` (`country_id`),
  KEY `fk_position` (`position_id`),
  CONSTRAINT `fk_position` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `player_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE SET NULL,
  CONSTRAINT `player_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player`
--

LOCK TABLES `player` WRITE;
/*!40000 ALTER TABLE `player` DISABLE KEYS */;
INSERT INTO `player` VALUES (1,'Miroku Darai',8,4,1,NULL),(2,'Eita Otoya',NULL,4,1,NULL),(3,'Meguru Bachira',NULL,4,1,NULL),(4,'Teru Kitsunezato',NULL,4,1,NULL),(5,'Haru Hayate',NULL,4,1,NULL),(6,'Itsuki Wakatsuki',NULL,4,1,NULL),(7,'Kazuma Nio',NULL,5,1,NULL),(8,'Hiiragi Reiji',NULL,5,1,NULL),(9,'Hyoma Chigiri',NULL,5,1,NULL),(10,'Seishiro Nagi',NULL,5,1,NULL),(11,'Reo Mikage',NULL,5,1,NULL),(12,'Nijiro Nanase',NULL,2,1,NULL),(13,'Kento Cho',NULL,2,1,NULL),(14,'Rin Itoshi',NULL,2,1,NULL),(15,'Ryusei Shido',NULL,2,1,NULL),(16,'Tsurugi Zantetsu',NULL,2,1,NULL),(17,'Tabito Karasu',NULL,2,1,NULL),(18,'Tokimitsu Aoshi',NULL,2,1,NULL),(19,'Ikki Niko',NULL,3,1,NULL),(20,'Jyubei Aryu',NULL,3,1,NULL),(21,'Oliver Aiku',NULL,3,1,NULL),(22,'Baro Shoei',NULL,3,1,NULL),(23,'Ishikari Yukio',NULL,3,1,NULL),(24,'Shuto Sendo',NULL,3,1,NULL),(25,'Gen Fukaku',NULL,3,1,NULL),(26,'Igarashi Gurimu',NULL,1,1,NULL),(27,'Kurona Ranze',NULL,1,1,NULL),(28,'Teppei Neru',NULL,1,1,NULL),(29,'Isagi Yoichi',NULL,1,1,NULL),(30,'Bachman',NULL,1,3,NULL),(31,'Gin Gagamaru',NULL,1,1,NULL),(32,'Hiori Yo',NULL,1,1,NULL),(33,'Kenyu Yukimiya',NULL,1,1,NULL),(34,'Raichi Jingo',NULL,1,1,NULL),(35,'Noel Noa',NULL,1,2,NULL),(36,'Michael Kaiser',NULL,1,3,NULL),(37,'Alexis Ness',NULL,1,3,NULL),(38,'Benedict Grim',NULL,1,3,NULL),(39,'Erik Gesner',NULL,1,3,NULL),(40,'Rensuke Kunigami',NULL,1,1,NULL),(41,'Jin Kiyora',NULL,1,1,NULL),(42,'Ali',NULL,1,3,NULL),(43,'Mensah',NULL,1,3,NULL),(44,'Igor Schneider',NULL,1,3,NULL),(45,'Theo Sachs',NULL,1,3,NULL),(46,'Ndiaye',NULL,1,3,NULL),(47,'Julian Loki',NULL,2,2,NULL),(48,'Charles Chevalier',NULL,2,2,NULL),(49,'Chapa',NULL,2,2,NULL),(50,'Akira Endoji',NULL,2,1,NULL),(51,'Haruhiko Yuzu',NULL,2,1,NULL),(52,'Renoir',NULL,2,2,NULL),(53,'Gabon',NULL,2,2,NULL),(54,'Michelin',NULL,2,2,NULL),(55,'Chris Prince',NULL,5,88,NULL),(56,'Agi',NULL,5,88,NULL),(57,'Driver',NULL,5,88,NULL),(58,'Swift',NULL,5,88,NULL),(59,'Busby',NULL,5,88,NULL),(60,'Rook',NULL,5,88,NULL),(61,'Young',NULL,5,88,NULL),(62,'Arthur',NULL,5,88,NULL),(63,'Damon',NULL,5,88,NULL),(64,'Kairu Saramadara',NULL,5,1,NULL),(65,'Taiga Tsunzaki',NULL,5,1,NULL),(66,'Hajime Nishioka',NULL,5,1,NULL),(67,'Junichi Wanima',NULL,5,1,NULL),(68,'Marc Snuffy',NULL,3,86,NULL),(69,'Don Lorenzo',NULL,3,68,NULL),(70,'Drago',NULL,3,68,NULL),(71,'Peron',NULL,3,68,NULL),(72,'Abdi',NULL,3,68,NULL),(73,'Rico',NULL,3,68,NULL),(74,'Canali',NULL,3,68,NULL),(75,'Shingen Tanaka',NULL,3,1,NULL),(76,'Kyohei Shiguma',NULL,3,1,NULL),(77,'Lavinho',NULL,4,5,NULL),(78,'Ignacio Lara',NULL,4,30,NULL),(79,'Ruiz',NULL,4,30,NULL),(80,'Picasso',NULL,4,30,NULL),(81,'Espesso',NULL,4,30,NULL),(82,'So',NULL,4,30,NULL),(83,'Bos',NULL,4,30,NULL),(84,'Gomez',NULL,4,30,NULL),(85,'Uraziz',NULL,4,30,NULL),(86,'Moro',NULL,4,30,NULL),(87,'Tetsu Sokura',NULL,4,1,NULL),(88,'Aiki Himizu',NULL,4,1,NULL),(89,'Shizuka Haiji',NULL,4,1,NULL),(90,'Birkenstock',NULL,1,3,NULL);
/*!40000 ALTER TABLE `player` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player_image`
--

DROP TABLE IF EXISTS `player_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `player_image` (
  `player_id` int NOT NULL,
  `image_id` int NOT NULL,
  PRIMARY KEY (`player_id`,`image_id`),
  KEY `image_id` (`image_id`),
  CONSTRAINT `player_image_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `player` (`id`) ON DELETE CASCADE,
  CONSTRAINT `player_image_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player_image`
--

LOCK TABLES `player_image` WRITE;
/*!40000 ALTER TABLE `player_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `player_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player_weapon`
--

DROP TABLE IF EXISTS `player_weapon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `player_weapon` (
  `player_id` int NOT NULL,
  `weapon_id` int NOT NULL,
  PRIMARY KEY (`player_id`,`weapon_id`),
  KEY `weapon_id` (`weapon_id`),
  CONSTRAINT `player_weapon_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `player` (`id`) ON DELETE CASCADE,
  CONSTRAINT `player_weapon_ibfk_2` FOREIGN KEY (`weapon_id`) REFERENCES `weapon` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player_weapon`
--

LOCK TABLES `player_weapon` WRITE;
/*!40000 ALTER TABLE `player_weapon` DISABLE KEYS */;
INSERT INTO `player_weapon` VALUES (1,1),(2,1),(12,1),(14,1),(15,1),(35,1),(36,1),(48,1),(68,1),(70,1),(71,1),(77,1),(14,2),(15,2),(19,2),(21,2),(36,2),(11,3),(17,3),(19,3),(21,3),(36,3),(48,3),(68,3),(70,3),(71,3),(77,3),(14,4),(33,4),(36,4),(36,5),(3,6),(10,6),(11,6),(14,6),(21,6),(31,6),(33,6),(36,6),(37,6),(40,6),(41,6),(7,7),(15,7),(18,7),(21,7),(25,7),(35,7),(38,7),(40,7),(41,7),(56,7),(68,7),(70,7),(71,7),(77,7),(2,11),(33,11),(10,12),(17,12),(39,12),(68,12),(70,12),(71,12),(77,12),(38,13),(3,15),(14,16),(15,17),(17,18),(17,19),(88,19),(33,20),(33,21),(3,23),(14,23),(33,23),(35,23),(37,23),(38,23),(41,23),(69,23),(3,24),(37,24),(48,24),(15,25),(21,25),(40,26),(69,26),(15,27),(16,27),(28,27),(35,27),(73,27),(35,28),(12,29),(35,29),(40,29),(55,30),(55,31),(23,32),(56,32),(20,33),(56,33),(8,34),(10,34),(39,34),(11,35),(31,37),(31,38),(31,39),(11,40),(18,42),(47,42),(47,43),(13,45),(20,46),(41,47),(41,48),(7,49),(88,49),(88,50),(67,51),(40,54),(24,55),(20,57),(23,57),(37,58);
/*!40000 ALTER TABLE `player_weapon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `position` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` enum('GK','DF','MF','FW') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `position`
--

LOCK TABLES `position` WRITE;
/*!40000 ALTER TABLE `position` DISABLE KEYS */;
INSERT INTO `position` VALUES (1,'GK'),(2,'DF'),(3,'MF'),(4,'FW');
/*!40000 ALTER TABLE `position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `team` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `country_id` int DEFAULT NULL,
  `is_in_NEL` tinyint(1) DEFAULT '0',
  `team_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (1,'Bastard Munchen',3,1,NULL),(2,'Paris X GEN',2,1,NULL),(3,'Ubers',68,1,NULL),(4,'FC Barcha',30,1,NULL),(5,'Manshine City',23,1,NULL),(6,'Re Al',30,0,NULL),(7,'Ars',23,0,NULL),(8,'Berserk Dortmund',3,0,NULL),(9,'RBP',3,0,NULL),(10,'Bolos',68,0,NULL),(11,'Ajajax',67,0,NULL),(12,'Urawa Rubies',1,0,NULL),(13,'Kawasaki Breakers',1,0,NULL);
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Florian','$2y$12$2/rKR0K/ljmgu28LgQdjJuvTy2LYre7VZxfkAwx78ta0hD/Bv6Oem');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `weapon`
--

DROP TABLE IF EXISTS `weapon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `weapon` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `weapon`
--

LOCK TABLES `weapon` WRITE;
/*!40000 ALTER TABLE `weapon` DISABLE KEYS */;
INSERT INTO `weapon` VALUES (1,'Off the Ball Movements',NULL),(2,'Spatial Awareness',NULL),(3,'Metavision',NULL),(4,'Predator Eye',NULL),(5,'Kaiser Impact',NULL),(6,'Flow State',NULL),(7,'Physique',NULL),(8,'Charging Skill',NULL),(9,'Middle Shot',NULL),(10,'Chop Feints',NULL),(11,'Speed',NULL),(12,'Ball Control',NULL),(13,'Crossing',NULL),(14,'Controlled Shot',NULL),(15,'Bee Shot',NULL),(16,'Puppet Control',NULL),(17,'Drive Shot',NULL),(18,'Analytical Ability',NULL),(19,'Feints',NULL),(20,'Sword Screw',NULL),(21,'Gyro Shot',NULL),(22,'Perfect Kick Technique',NULL),(23,'Dribbling',NULL),(24,'Passing',NULL),(25,'Reflex',NULL),(26,'Man-Marking',NULL),(27,'Acceleration',NULL),(28,'All-Powerful Shot',NULL),(29,'Ambidexterity',NULL),(30,'Knuckleball',NULL),(31,'Perfect Physicality',NULL),(32,'Vertical Jump',NULL),(33,'Long Reach',NULL),(34,'Trapping',NULL),(35,'Dexterity',NULL),(37,'Springlike Body',NULL),(38,'Explosive Reaction',NULL),(39,'Flexibility',NULL),(40,'Copycat',NULL),(41,'Perfect Dribbling',NULL),(42,'Agility',NULL),(43,'Godspeed',NULL),(44,'Predictions',NULL),(45,'Height',NULL),(46,'Jumping Power',NULL),(47,'Ground Shots',NULL),(48,'Core Balance',NULL),(49,'Pressing',NULL),(50,'Lie Detection',NULL),(51,'Eye Contact',NULL),(52,'Super Shooting',NULL),(53,'Chip Shot',NULL),(54,'Finesse Shot',NULL),(55,'Stamina',NULL),(56,'Diving',NULL),(57,'Headers',NULL),(58,'Flexible Ankles',NULL),(59,'Extreme Physique',NULL);
/*!40000 ALTER TABLE `weapon` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-20 20:00:46
