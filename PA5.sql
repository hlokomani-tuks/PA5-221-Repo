-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: PA5_hashed
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Review`
--

DROP TABLE IF EXISTS `Review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Review` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `rating` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `is_critic` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wine_id` int(11) NOT NULL,
  PRIMARY KEY (`review_id`),
  KEY `userID` (`user_id`),
  KEY `wine_id_fk` (`wine_id`),
  CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `wine_id_fk` FOREIGN KEY (`wine_id`) REFERENCES `Wine` (`wine_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Review`
--

LOCK TABLES `Review` WRITE;
/*!40000 ALTER TABLE `Review` DISABLE KEYS */;
INSERT INTO `Review` VALUES (1,7,'Enjoyable and approachable wine with fruity aromas and flavors of cherries and plums. Well-balanced acidity. Versatile for pairing.',0,67890,1),(4,7,'Enjoyable and approachable wine with fruity aromas and flavors of cherries and plums. Well-balanced acidity. Versatile for pairing.',0,67890,2),(7,9,'Delightful wine with a rich flavor profile of dark berries oak and a hint of spice. Smooth tannins and a satisfying finish. Highly recommended.',0,12345,5),(8,7,'Enjoyable and approachable wine with fruity aromas and flavors of cherries and plums. Well-balanced acidity. Versatile for pairing.',0,67890,4),(9,6,'Interesting wine but didn\'t meet expectations. Pleasant aroma subtle earthiness but lacking complexity. Average for its price range.',0,24680,8),(10,8,'Exceptional wine with layers of blackcurrant  blackberry dark chocolate and hints of tobacco and cedar. Well-integrated tannins and a smooth finish.',0,13579,3),(11,5,'Mixed feelings about this wine. Promising initial sip with bright fruit flavors but a slightly abrupt finish. Okay for casual enjoyment.',0,10203,3),(12,9,'A gem of a wine! Memorable experience with luscious red fruits touch of vanilla and a silky texture. Worth savoring.',0,10203,6),(13,6,'High expectations but fell short. Flavors lacked depth and intensity. Disappointingly short finish. Better as a table wine.',0,13579,7),(14,9,'Impressive wine with remarkable balance and elegance. Alluring aromas of blackberries violets and spices. A true masterpiece.',1,76543,10),(15,7,'Great value wine with flavors of red cherries plums and a touch of vanilla. Soft tannins. Approachable for casual gatherings and pairing.',0,87654,7),(16,8,'Thoroughly enjoyed this wine. Harmonious blend of dark fruits cocoa and subtle herbal note. Well-structured tannins and a satisfying finish.',0,10203,7);
/*!40000 ALTER TABLE `Review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `middle_initial` varchar(3) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cellphone_number` varchar(20) NOT NULL,
  `is_manager` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=98768 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (10203,'Robert','M','Jackson','$2y$10$vKk65rtqqrOJwKvLo2dICeT17ub0TPt4Ov4OL6IMbt/4qCET9fZnm','robert.jackson@yahoo.com','076-888-9999',0),(12345,'John','A','Doe','$2y$10$LEJuh01q9OHuP0EAXBiwquzd8V5N25lrr1upICbJSSPTH9o.7HzTi','john.doe@gmail.com','062-123-4567',0),(13579,'Mike','J','Brown','$2y$10$f2sNKOiJ.BdbkHZqEhWqWe4x1HJm8RnIaPGqUJ0DR4UsxVT2Q3NL2','mike.brown@yahoo.com','062-222-3333',0),(24680,'Sarah','L','Jones','$2y$10$xL4qyUoCNP/XDgu2mSuBE.uBLBS/BjQRO7kitBtH4Is2CEzHczIV2','sarah.jones@gmail.com','084-555-5555',0),(43210,'Lisa','E','Davis','$2y$10$bS5SiLuL/tr5Keg2yWXOB.ToWKIeLWXf5NsDJnAermtdsMuT0.bCi','lisa.davis@yahoo.com','082-111-2222',0),(54321,'Emily','R','Johnson','$2y$10$tce0zDagE/zmae.ecVIPtuG/lfm/4dMU9O3BQnbe5E/sVysn3BGLe','emily.johnson@gmail.com','073-777-8888',0),(67890,'Jane','M','Smith','$2y$10$tu3d7UELrnaMkn6fV4youO1.FssSUc9HooK/hiCB/AomEO54lCBK.','jane.smith@gmail.com','083-987-6543',0),(76543,'Jennifer','K','Thomas','$2y$10$brPU6oTIa5mZIUoBAEvtCumGo30lxSqQuH1THU1YHZ7vxh8u/GTZq','jennifer.thomas@gmail.com','063-333-4444',0),(87654,'Alex','P','Miller','$2y$10$Mi7NBuUTjJKONQtXwrYqY.W5gLhAA.HCBc0edhszEc.7uwYHEA2oS','alex.miller@yahoo.com','083-666-7777',0),(98765,'David','S','Wilson','$2y$10$U.ltN/D8D/UfJ13rULnte.m73ya7uVPWz41gCf1f.QppX.JNuouvG','david.wilson@gmail.com','084-444-5555',0),(98766,'Ted','B','Harry','$2y$10$aEDtzPTh001LuOzuEblOxOfQfPzxl2ilnqG3pVtrxiKDYIQ0CMPua','robert@yahoo.com','098 088 080',0),(98767,'Ted','B','Harry','$2y$10$Q/6A.YrK7UGWenhTGa7rPu.MY2jLFdo3HUqMHRCaF3/7MUQiXLxQG','rick@morty.com','098 088 080',0);
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wine`
--

DROP TABLE IF EXISTS `Wine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wine` (
  `wine_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `description` varchar(255) NOT NULL,
  `food_pairing` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `winery_id` int(11) NOT NULL,
  PRIMARY KEY (`wine_id`),
  KEY `type_id_fk` (`type_id`),
  KEY `winery_id_fk` (`winery_id`),
  CONSTRAINT `type_id_fk` FOREIGN KEY (`type_id`) REFERENCES `WineType` (`type_id`) ON UPDATE CASCADE,
  CONSTRAINT `winery_id_fk` FOREIGN KEY (`winery_id`) REFERENCES `Winery` (`winery_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wine`
--

LOCK TABLES `Wine` WRITE;
/*!40000 ALTER TABLE `Wine` DISABLE KEYS */;
INSERT INTO `Wine` VALUES (1,'White wine',2018,'A full-bodies white wine with flavors of citrus, vanilla, and oak','Grilled chicken','https://www.carmen.com/wp-content/uploads/2020/09/carmen-insigne-ch.png',1,1),(2,'Red wine',2015,'A bold red wine with notes of blackcurrant, tobacco, and spice','Steak','https://www.totalwine.com/dynamic/x1000,sq/media/sys_master/twmmedia/h5e/heb/12244627718174.png',2,2),(3,'Dessert wine',2009,'A light-bodied red wine with flavors of cherry, raspberry and earth','Roasted duck','https://t2.gstatic.com/images?q=tbn:ANd9GcSZIKJkYYh03df8VeBZQICg_i3gtFkbePFcRr-7yS7b5LwlWjq-',3,3),(4,'White wine',2020,'A crisp white wine with vibrant flavors of grapefruit, lime and tropical fruit','Seafood','https://images.vivino.com/thumbs/oCgUfAx3RNmv6VUcdfhwcg_pb_x600.png',4,4),(5,'Red wine',2017,'A medium-bodied red wine notes of plum, blackberry and chocolate','Roasted vegetables','https://images.vivino.com/thumbs/8B0zjmh5T8ajwluimUKdiA_pb_x600.png',5,5),(6,'White wine',2016,'A sweet white wine with aromas of apricot, honey, and floral notes','Blue cheese','https://images.vivino.com/thumbs/CKpsrJLaTIS29FqlB729PA_pb_x600.png',6,6),(7,'White wine',2014,'A rich and fruity red wine with flavors of plum, blackberry and chocolate','Grilled meats','https://cdn.shopify.com/s/files/1/1915/1375/products/rose_1024x1024.png',7,7),(8,'Dessert wine',2014,'A full-bodied red wine with bolf flavors of blackberry, pepper and smoked meat','Grilled steak','https://cdn.shopify.com/s/files/1/0106/1539/0266/products/FincaRemotaBottle.jpg',8,8),(9,'Sparkling wine',2021,'A refereshing white wine with crisp flavors of pear, apple and citrus','Light seafood dishes','https://global-uploads.webflow.com/5f7b5574577b9a0c7e04b2da/600b0c6fd4a12e6d4f3f612d_CN8_PG_NV_750_5-9-17.png',9,9),(10,'White wine',2004,'A robust red wine with flavors of black cherry, spice and a touch of vanilla','Spicy ribs','https://hips.hearstapps.com/vader-prod.s3.amazonaws.com/1559060552-gnarlyhead-cab-bottle-1559060530.jpg',10,10),(11,'Red wine',2016,'A velvety red wine with aromas of black cherry, tobacco, and leather','Lamb chops','https://www.risatawines.com/wp-content/uploads/2021/04/red-moscato-815x1024.jpg',1,1),(12,'White wine',2019,'A crisp white wine with hints of green apple, pear, and citrus','Grilled fish','https://assets.woolworthsstatic.co.za/Cape-Sweet-White-750-ml-20197568.jpg?V=aFB9&o=eyJidWNrZXQiOiJ3dy1vbmxpbmUtaW1hZ2UtcmVzaXplIiwia2V5IjoiaW1hZ2VzL2VsYXN0aWNlcmEvcHJvZHVjdHMvaGVyby8yMDIyLTEwLTAzLzIwMTk3NTY4X2hlcm8uanBnIn0&q=85',2,2),(13,'Ros� wine',2022,'A light and refreshing ros� wine with notes of strawberry and watermelon','Salads','https://www.lavernewines.co.za/wp-content/uploads/2018/12/CWC-Turkish.png.webp',3,3),(14,'Red wine',2017,'A bold red wine with flavors of dark berries, chocolate, and spices','Barbecue ribs','https://www.risatawines.com/wp-content/uploads/2021/04/red-moscato-815x1024.jpg',4,4),(15,'White wine',2020,'A vibrant white wine with tropical fruit aromas and a touch of honey','Shrimp scampi','https://assets.woolworthsstatic.co.za/Cape-Sweet-White-750-ml-20197568.jpg?V=aFB9&o=eyJidWNrZXQiOiJ3dy1vbmxpbmUtaW1hZ2UtcmVzaXplIiwia2V5IjoiaW1hZ2VzL2VsYXN0aWNlcmEvcHJvZHVjdHMvaGVyby8yMDIyLTEwLTAzLzIwMTk3NTY4X2hlcm8uanBnIn0&q=85',5,5),(16,'Sparkling wine',2018,'A lively sparkling wine with crisp acidity and notes of green apple and citrus','Oysters','https://images.vivino.com/thumbs/_svOVxO1R2ySlrlzY7uX7w_pb_x600.png',6,6),(17,'Red wine',2013,'An elegant red wine with complex flavors of blackberry, plum, and spices','Roast beef','https://www.risatawines.com/wp-content/uploads/2021/04/red-moscato-815x1024.jpg',7,7),(18,'White wine',2015,'A creamy white wine with aromas of peach, vanilla, and toasted oak','Creamy pasta dishes','https://assets.woolworthsstatic.co.za/Cape-Sweet-White-750-ml-20197568.jpg?V=aFB9&o=eyJidWNrZXQiOiJ3dy1vbmxpbmUtaW1hZ2UtcmVzaXplIiwia2V5IjoiaW1hZ2VzL2VsYXN0aWNlcmEvcHJvZHVjdHMvaGVyby8yMDIyLTEwLTAzLzIwMTk3NTY4X2hlcm8uanBnIn0&q=85',8,8),(19,'Ros� wine',2021,'A dry and crisp ros� wine with refreshing flavors of red berries and citrus','Chicken salad','https://www.lavernewines.co.za/wp-content/uploads/2018/12/CWC-Turkish.png.webp',9,9),(20,'Red wine',2014,'A full-bodied red wine with rich flavors of blackcurrant, cherry, and spices','Beef stew','https://www.risatawines.com/wp-content/uploads/2021/04/red-moscato-815x1024.jpg',1,3),(21,'White wine',2017,'A zesty white wine with vibrant citrus notes and a hint of minerality','Grilled prawns','https://assets.woolworthsstatic.co.za/Cape-Sweet-White-750-ml-20197568.jpg?V=aFB9&o=eyJidWNrZXQiOiJ3dy1vbmxpbmUtaW1hZ2UtcmVzaXplIiwia2V5IjoiaW1hZ2VzL2VsYXN0aWNlcmEvcHJvZHVjdHMvaGVyby8yMDIyLTEwLTAzLzIwMTk3NTY4X2hlcm8uanBnIn0&q=85',1,1),(22,'Sparkling wine',2020,'A elebratory sparkling wine with delicate bubbles and crisp apple flavors','Fresh fruit platter','https://images.vivino.com/thumbs/_svOVxO1R2ySlrlzY7uX7w_pb_x600.png',2,2),(23,'Red wine',2019,'A smooth and velvety red wine with layers of blackberry, vanilla, and spices','Braised short ribs','https://www.risatawines.com/wp-content/uploads/2021/04/red-moscato-815x1024.jpg',3,3),(24,'White wine',2016,'A luscious white wine with tropical fruit aromas and a touch of honeydew melon','Grilled scallops','https://assets.woolworthsstatic.co.za/Cape-Sweet-White-750-ml-20197568.jpg?V=aFB9&o=eyJidWNrZXQiOiJ3dy1vbmxpbmUtaW1hZ2UtcmVzaXplIiwia2V5IjoiaW1hZ2VzL2VsYXN0aWNlcmEvcHJvZHVjdHMvaGVyby8yMDIyLTEwLTAzLzIwMTk3NTY4X2hlcm8uanBnIn0&q=85',4,4),(25,'Ros� wine',2022,'A vibrant and fruity ros� wine with flavors of strawberry, raspberry, and watermelon','Caprese salad','https://www.lavernewines.co.za/wp-content/uploads/2018/12/CWC-Turkish.png.webp',5,5),(26,'Red wine',2018,'A bold red wine with intense dark fruit flavors and hints of mocha and tobacco','Grilled lamb','https://www.risatawines.com/wp-content/uploads/2021/04/red-moscato-815x1024.jpg',6,6),(27,'White wine',2021,'A refreshing white wine with citrusy notes of lemon, lime, and grapefruit','Sushi rolls','https://assets.woolworthsstatic.co.za/Cape-Sweet-White-750-ml-20197568.jpg?V=aFB9&o=eyJidWNrZXQiOiJ3dy1vbmxpbmUtaW1hZ2UtcmVzaXplIiwia2V5IjoiaW1hZ2VzL2VsYXN0aWNlcmEvcHJvZHVjdHMvaGVyby8yMDIyLTEwLTAzLzIwMTk3NTY4X2hlcm8uanBnIn0&q=85',7,7);
/*!40000 ALTER TABLE `Wine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `WineType`
--

DROP TABLE IF EXISTS `WineType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `WineType` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `grape_varieties` varchar(225) NOT NULL,
  `colour` varchar(225) NOT NULL,
  `body` varchar(225) NOT NULL,
  `sweetness` varchar(225) NOT NULL,
  `tannin` varchar(225) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `WineType`
--

LOCK TABLES `WineType` WRITE;
/*!40000 ALTER TABLE `WineType` DISABLE KEYS */;
INSERT INTO `WineType` VALUES (1,'Chardonnay','White','Full','Dry','Low'),(2,'Carbenet Savignon','Red','Light','Dry','High'),(3,'Pinot noir','Gold','Light-Dry','Semi-sweet','Medium'),(4,'Sauvignon Blanc','White','Light','Dry','Medium'),(5,'Merlot','Red','Medium-Dark','Sweet','Medium'),(6,'Riesling','Gold','Full','Medium_Dry','Medium-High'),(7,'Malbec','Blush','Light','Sweet','High'),(8,'Syrah','Red','Full','Semi-sweet','Medium'),(9,'Pinot Grigio','White','Light','Dry','Low'),(10,'Zinfandel','Blush','Medium-Dark','Sweet','Low');
/*!40000 ALTER TABLE `WineType` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `WineWithReview`
--

DROP TABLE IF EXISTS `WineWithReview`;
/*!50001 DROP VIEW IF EXISTS `WineWithReview`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `WineWithReview` AS SELECT
 1 AS `wine_id`,
  1 AS `name`,
  1 AS `year`,
  1 AS `description`,
  1 AS `food_pairing`,
  1 AS `image_url`,
  1 AS `type_id`,
  1 AS `winery_id`,
  1 AS `user_rating`,
  1 AS `user_rating_count`,
  1 AS `critic_rating`,
  1 AS `critic_rating_count` */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `Winery`
--

DROP TABLE IF EXISTS `Winery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Winery` (
  `winery_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `farm` varchar(255) NOT NULL,
  `estate` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cellphone_number` varchar(20) NOT NULL,
  PRIMARY KEY (`winery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Winery`
--

LOCK TABLES `Winery` WRITE;
/*!40000 ALTER TABLE `Winery` DISABLE KEYS */;
INSERT INTO `Winery` VALUES (1,'Domaine de la Romanée-Conti','France','Burgundy','Vosne-Romanée','','drc@example.com','+33 3 80 62 61 08'),(2,'Château Margaux','France','Bordeaux','Margaux','Château Margaux','chateau.margaux@example.com','+33 5 57 88 83 83'),(3,'Opus One','United States','California','Oakville','Opus One Winery','info@opusonewinery.com','+1 707-944-9442'),(4,'Tignanello','Italy','Tuscany','Antinori Estate','Tignanello Estate','tignanello@antinori.it','+39 055 23595'),(5,'Screaming Eagle','United States','California','Oakville','Screaming Eagle Winery','welcome@screamingeagle.com','+1 707-944-0749'),(6,'Penfolds','Australia','South Australia','Magill Estate','Penfolds Magill Estate','info@penfolds.com','+61 8 8301 5551'),(7,'Duckhorn Vineyards','United States','California','St. Helena','Duckhorn Vineyards','info@duckhorn.com','+1 866-367-9945'),(8,'Vega Sicilia','Spain','Castilla y León','Valbuena de Duero','Vega Sicilia','info@vega-sicilia.com','+34 983 68 10 06'),(9,'Dönnhoff','Germany','Nahe','Oberhausen','Hermann Dönnhoff','info@doennhoff.com','+49 6758 775'),(10,'Gaja','Italy','Piedmont','Barbaresco','Gaja Winery','info@gajawines.com','+39 0173 635111');
/*!40000 ALTER TABLE `Winery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `WineWithReview`
--

/*!50001 DROP VIEW IF EXISTS `WineWithReview`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `WineWithReview` AS select `Wine`.`wine_id` AS `wine_id`,`Wine`.`name` AS `name`,`Wine`.`year` AS `year`,`Wine`.`description` AS `description`,`Wine`.`food_pairing` AS `food_pairing`,`Wine`.`image_url` AS `image_url`,`Wine`.`type_id` AS `type_id`,`Wine`.`winery_id` AS `winery_id`,coalesce(`UserReview`.`user_rating`,0.0) AS `user_rating`,coalesce(`UserReview`.`user_rating_count`,0) AS `user_rating_count`,coalesce(`CriticReview`.`critic_rating`,0.0) AS `critic_rating`,coalesce(`CriticReview`.`critic_rating_count`,0) AS `critic_rating_count` from ((`Wine` left join (select `Review`.`wine_id` AS `wine_id`,avg(`Review`.`rating`) AS `user_rating`,count(`Review`.`rating`) AS `user_rating_count` from `Review` where `Review`.`is_critic` = 0 group by `Review`.`wine_id`) `UserReview` on(`Wine`.`wine_id` = `UserReview`.`wine_id`)) left join (select `Review`.`wine_id` AS `wine_id`,avg(`Review`.`rating`) AS `critic_rating`,count(`Review`.`rating`) AS `critic_rating_count` from `Review` where `Review`.`is_critic` = 1 group by `Review`.`wine_id`) `CriticReview` on(`Wine`.`wine_id` = `CriticReview`.`wine_id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-07  9:52:20
