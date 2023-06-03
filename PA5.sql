-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2023 at 08:19 PM
-- Server version: 10.6.12-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PA5_hashed`
--

-- --------------------------------------------------------

--
-- Table structure for table `Review`
--

CREATE TABLE `Review` (
  `review_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `is_critic` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wine_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Review`
--

INSERT INTO `Review` (`review_id`, `rating`, `comment`, `is_critic`, `user_id`, `wine_id`) VALUES
(1, 7, 'Enjoyable and approachable wine with fruity aromas and flavors of cherries and plums. Well-balanced acidity. Versatile for pairing.', 0, 67890, 1),
(4, 7, 'Enjoyable and approachable wine with fruity aromas and flavors of cherries and plums. Well-balanced acidity. Versatile for pairing.', 0, 67890, 2),
(7, 9, 'Delightful wine with a rich flavor profile of dark berries oak and a hint of spice. Smooth tannins and a satisfying finish. Highly recommended.', 0, 12345, 5),
(8, 7, 'Enjoyable and approachable wine with fruity aromas and flavors of cherries and plums. Well-balanced acidity. Versatile for pairing.', 0, 67890, 4),
(9, 6, 'Interesting wine but didn\'t meet expectations. Pleasant aroma subtle earthiness but lacking complexity. Average for its price range.', 0, 24680, 8),
(10, 8, 'Exceptional wine with layers of blackcurrant  blackberry dark chocolate and hints of tobacco and cedar. Well-integrated tannins and a smooth finish.', 0, 13579, 3),
(11, 5, 'Mixed feelings about this wine. Promising initial sip with bright fruit flavors but a slightly abrupt finish. Okay for casual enjoyment.', 0, 10203, 3),
(12, 9, 'A gem of a wine! Memorable experience with luscious red fruits touch of vanilla and a silky texture. Worth savoring.', 0, 10203, 6),
(13, 6, 'High expectations but fell short. Flavors lacked depth and intensity. Disappointingly short finish. Better as a table wine.', 0, 13579, 7),
(14, 9, 'Impressive wine with remarkable balance and elegance. Alluring aromas of blackberries violets and spices. A true masterpiece.', 1, 76543, 10),
(15, 7, 'Great value wine with flavors of red cherries plums and a touch of vanilla. Soft tannins. Approachable for casual gatherings and pairing.', 0, 87654, 7),
(16, 8, 'Thoroughly enjoyed this wine. Harmonious blend of dark fruits cocoa and subtle herbal note. Well-structured tannins and a satisfying finish.', 0, 10203, 7);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_initial` varchar(3) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cellphone_number` varchar(20) NOT NULL,
  `is_manager` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`user_id`, `first_name`, `middle_initial`, `last_name`, `password`, `email`, `cellphone_number`, `is_manager`) VALUES
(10203, 'Robert', 'M', 'Jackson', '$2y$10$vKk65rtqqrOJwKvLo2dICeT17ub0TPt4Ov4OL6IMbt/4qCET9fZnm', 'robert.jackson@yahoo.com', '076-888-9999', 0),
(12345, 'John', 'A', 'Doe', '$2y$10$LEJuh01q9OHuP0EAXBiwquzd8V5N25lrr1upICbJSSPTH9o.7HzTi', 'john.doe@gmail.com', '062-123-4567', 0),
(13579, 'Mike', 'J', 'Brown', '$2y$10$f2sNKOiJ.BdbkHZqEhWqWe4x1HJm8RnIaPGqUJ0DR4UsxVT2Q3NL2', 'mike.brown@yahoo.com', '062-222-3333', 0),
(24680, 'Sarah', 'L', 'Jones', '$2y$10$xL4qyUoCNP/XDgu2mSuBE.uBLBS/BjQRO7kitBtH4Is2CEzHczIV2', 'sarah.jones@gmail.com', '084-555-5555', 0),
(43210, 'Lisa', 'E', 'Davis', '$2y$10$bS5SiLuL/tr5Keg2yWXOB.ToWKIeLWXf5NsDJnAermtdsMuT0.bCi', 'lisa.davis@yahoo.com', '082-111-2222', 0),
(54321, 'Emily', 'R', 'Johnson', '$2y$10$tce0zDagE/zmae.ecVIPtuG/lfm/4dMU9O3BQnbe5E/sVysn3BGLe', 'emily.johnson@gmail.com', '073-777-8888', 0),
(67890, 'Jane', 'M', 'Smith', '$2y$10$tu3d7UELrnaMkn6fV4youO1.FssSUc9HooK/hiCB/AomEO54lCBK.', 'jane.smith@gmail.com', '083-987-6543', 0),
(76543, 'Jennifer', 'K', 'Thomas', '$2y$10$brPU6oTIa5mZIUoBAEvtCumGo30lxSqQuH1THU1YHZ7vxh8u/GTZq', 'jennifer.thomas@gmail.com', '063-333-4444', 0),
(87654, 'Alex', 'P', 'Miller', '$2y$10$Mi7NBuUTjJKONQtXwrYqY.W5gLhAA.HCBc0edhszEc.7uwYHEA2oS', 'alex.miller@yahoo.com', '083-666-7777', 0),
(98765, 'David', 'S', 'Wilson', '$2y$10$U.ltN/D8D/UfJ13rULnte.m73ya7uVPWz41gCf1f.QppX.JNuouvG', 'david.wilson@gmail.com', '084-444-5555', 0),
(98766, 'Ted', 'B', 'Harry', '$2y$10$aEDtzPTh001LuOzuEblOxOfQfPzxl2ilnqG3pVtrxiKDYIQ0CMPua', 'robert@yahoo.com', '098 088 080', 0),
(98767, 'Ted', 'B', 'Harry', '$2y$10$Q/6A.YrK7UGWenhTGa7rPu.MY2jLFdo3HUqMHRCaF3/7MUQiXLxQG', 'rick@morty.com', '098 088 080', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Wine`
--

CREATE TABLE `Wine` (
  `wine_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `description` varchar(255) NOT NULL,
  `food_pairing` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `winery_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Wine`
--

INSERT INTO `Wine` (`wine_id`, `name`, `year`, `description`, `food_pairing`, `image_url`, `type_id`, `winery_id`) VALUES
(1, 'White wine', 2018, 'A full-bodies white wine with flavors of citrus, vanilla, and oak', 'Grilled chicken', 'https://www.carmen.com/wp-content/uploads/2020/09/carmen-insigne-ch.png', 1, 1),
(2, 'Red wine', 2015, 'A bold red wine with notes of blackcurrant, tobacco, and spice', 'Steak', 'https://www.totalwine.com/dynamic/x1000,sq/media/sys_master/twmmedia/h5e/heb/12244627718174.png', 2, 2),
(3, 'Dessert wine', 2009, 'A light-bodied red wine with flavors of cherry, raspberry and earth', 'Roasted duck', 'https://t2.gstatic.com/images?q=tbn:ANd9GcSZIKJkYYh03df8VeBZQICg_i3gtFkbePFcRr-7yS7b5LwlWjq-', 3, 3),
(4, 'White wine', 2020, 'A crisp white wine with vibrant flavors of grapefruit, lime and tropical fruit', 'Seafood', 'https://images.vivino.com/thumbs/oCgUfAx3RNmv6VUcdfhwcg_pb_x600.png', 4, 4),
(5, 'Red wine', 2017, 'A medium-bodied red wine notes of plum, blackberry and chocolate', 'Roasted vegetables', 'https://images.vivino.com/thumbs/8B0zjmh5T8ajwluimUKdiA_pb_x600.png', 5, 5),
(6, 'White wine', 2016, 'A sweet white wine with aromas of apricot, honey, and floral notes', 'Blue cheese', 'https://images.vivino.com/thumbs/CKpsrJLaTIS29FqlB729PA_pb_x600.png', 6, 6),
(7, 'White wine', 2014, 'A rich and fruity red wine with flavors of plum, blackberry and chocolate', 'Grilled meats', 'https://cdn.shopify.com/s/files/1/1915/1375/products/rose_1024x1024.png', 7, 7),
(8, 'Dessert wine', 2014, 'A full-bodied red wine with bolf flavors of blackberry, pepper and smoked meat', 'Grilled steak', 'https://cdn.shopify.com/s/files/1/0106/1539/0266/products/FincaRemotaBottle.jpg', 8, 8),
(9, 'Sparkling wine', 2021, 'A refereshing white wine with crisp flavors of pear, apple and citrus', 'Light seafood dishes', 'https://global-uploads.webflow.com/5f7b5574577b9a0c7e04b2da/600b0c6fd4a12e6d4f3f612d_CN8_PG_NV_750_5-9-17.png', 9, 9),
(10, 'White wine', 2004, 'A robust red wine with flavors of black cherry, spice and a touch of vanilla', 'Spicy ribs', 'https://hips.hearstapps.com/vader-prod.s3.amazonaws.com/1559060552-gnarlyhead-cab-bottle-1559060530.jpg', 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `Winery`
--

CREATE TABLE `Winery` (
  `winery_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `farm` varchar(255) NOT NULL,
  `estate` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cellphone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Winery`
--

INSERT INTO `Winery` (`winery_id`, `name`, `country`, `province`, `farm`, `estate`, `email`, `cellphone_number`) VALUES
(1, 'Domaine de la Romanée-Conti', 'France', 'Burgundy', 'Vosne-Romanée', '', 'drc@example.com', '+33 3 80 62 61 08'),
(2, 'Château Margaux', 'France', 'Bordeaux', 'Margaux', 'Château Margaux', 'chateau.margaux@example.com', '+33 5 57 88 83 83'),
(3, 'Opus One', 'United States', 'California', 'Oakville', 'Opus One Winery', 'info@opusonewinery.com', '+1 707-944-9442'),
(4, 'Tignanello', 'Italy', 'Tuscany', 'Antinori Estate', 'Tignanello Estate', 'tignanello@antinori.it', '+39 055 23595'),
(5, 'Screaming Eagle', 'United States', 'California', 'Oakville', 'Screaming Eagle Winery', 'welcome@screamingeagle.com', '+1 707-944-0749'),
(6, 'Penfolds', 'Australia', 'South Australia', 'Magill Estate', 'Penfolds Magill Estate', 'info@penfolds.com', '+61 8 8301 5551'),
(7, 'Duckhorn Vineyards', 'United States', 'California', 'St. Helena', 'Duckhorn Vineyards', 'info@duckhorn.com', '+1 866-367-9945'),
(8, 'Vega Sicilia', 'Spain', 'Castilla y León', 'Valbuena de Duero', 'Vega Sicilia', 'info@vega-sicilia.com', '+34 983 68 10 06'),
(9, 'Dönnhoff', 'Germany', 'Nahe', 'Oberhausen', 'Hermann Dönnhoff', 'info@doennhoff.com', '+49 6758 775'),
(10, 'Gaja', 'Italy', 'Piedmont', 'Barbaresco', 'Gaja Winery', 'info@gajawines.com', '+39 0173 635111');

-- --------------------------------------------------------

--
-- Table structure for table `WineType`
--

CREATE TABLE `WineType` (
  `type_id` int(11) NOT NULL,
  `grape_varieties` varchar(225) NOT NULL,
  `colour` varchar(225) NOT NULL,
  `body` varchar(225) NOT NULL,
  `sweetness` varchar(225) NOT NULL,
  `tannin` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `WineType`
--

INSERT INTO `WineType` (`type_id`, `grape_varieties`, `colour`, `body`, `sweetness`, `tannin`) VALUES
(1, 'Chardonnay', 'White', 'Full', 'Dry', 'Low'),
(2, 'Carbenet Savignon', 'Red', 'Light', 'Dry', 'High'),
(3, 'Pinot noir', 'Gold', 'Light-Dry', 'Semi-sweet', 'Medium'),
(4, 'Sauvignon Blanc', 'White', 'Light', 'Dry', 'Medium'),
(5, 'Merlot', 'Red', 'Medium-Dark', 'Sweet', 'Medium'),
(6, 'Riesling', 'Gold', 'Full', 'Medium_Dry', 'Medium-High'),
(7, 'Malbec', 'Blush', 'Light', 'Sweet', 'High'),
(8, 'Syrah', 'Red', 'Full', 'Semi-sweet', 'Medium'),
(9, 'Pinot Grigio', 'White', 'Light', 'Dry', 'Low'),
(10, 'Zinfandel', 'Blush', 'Medium-Dark', 'Sweet', 'Low');

-- --------------------------------------------------------

--
-- Stand-in structure for view `WineWithReview`
-- (See below for the actual view)
--
CREATE TABLE `WineWithReview` (
`wine_id` int(11)
,`name` varchar(255)
,`year` year(4)
,`description` varchar(255)
,`food_pairing` varchar(255)
,`image_url` varchar(255)
,`type_id` int(11)
,`winery_id` int(11)
,`user_rating` decimal(14,4)
,`user_rating_count` bigint(21)
,`critic_rating` decimal(14,4)
,`critic_rating_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `WineWithReview`
--
DROP TABLE IF EXISTS `WineWithReview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `WineWithReview`  AS SELECT `Wine`.`wine_id` AS `wine_id`, `Wine`.`name` AS `name`, `Wine`.`year` AS `year`, `Wine`.`description` AS `description`, `Wine`.`food_pairing` AS `food_pairing`, `Wine`.`image_url` AS `image_url`, `Wine`.`type_id` AS `type_id`, `Wine`.`winery_id` AS `winery_id`, coalesce(`UserReview`.`user_rating`,0.0) AS `user_rating`, coalesce(`UserReview`.`user_rating_count`,0) AS `user_rating_count`, coalesce(`CriticReview`.`critic_rating`,0.0) AS `critic_rating`, coalesce(`CriticReview`.`critic_rating_count`,0) AS `critic_rating_count` FROM ((`Wine` left join (select `Review`.`wine_id` AS `wine_id`,avg(`Review`.`rating`) AS `user_rating`,count(`Review`.`rating`) AS `user_rating_count` from `Review` where `Review`.`is_critic` = 0 group by `Review`.`wine_id`) `UserReview` on(`Wine`.`wine_id` = `UserReview`.`wine_id`)) left join (select `Review`.`wine_id` AS `wine_id`,avg(`Review`.`rating`) AS `critic_rating`,count(`Review`.`rating`) AS `critic_rating_count` from `Review` where `Review`.`is_critic` = 1 group by `Review`.`wine_id`) `CriticReview` on(`Wine`.`wine_id` = `CriticReview`.`wine_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Review`
--
ALTER TABLE `Review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `userID` (`user_id`),
  ADD KEY `wine_id_fk` (`wine_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `Wine`
--
ALTER TABLE `Wine`
  ADD PRIMARY KEY (`wine_id`),
  ADD KEY `type_id_fk` (`type_id`),
  ADD KEY `winery_id_fk` (`winery_id`);

--
-- Indexes for table `Winery`
--
ALTER TABLE `Winery`
  ADD PRIMARY KEY (`winery_id`);

--
-- Indexes for table `WineType`
--
ALTER TABLE `WineType`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Review`
--
ALTER TABLE `Review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98768;

--
-- AUTO_INCREMENT for table `Wine`
--
ALTER TABLE `Wine`
  MODIFY `wine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Winery`
--
ALTER TABLE `Winery`
  MODIFY `winery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `WineType`
--
ALTER TABLE `WineType`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Review`
--
ALTER TABLE `Review`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wine_id_fk` FOREIGN KEY (`wine_id`) REFERENCES `Wine` (`wine_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Wine`
--
ALTER TABLE `Wine`
  ADD CONSTRAINT `type_id_fk` FOREIGN KEY (`type_id`) REFERENCES `WineType` (`type_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `winery_id_fk` FOREIGN KEY (`winery_id`) REFERENCES `Winery` (`winery_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
