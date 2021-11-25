-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 24, 2021 at 09:02 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `password`, `phone`, `email`, `address`) VALUES
(5, 'Akosua', 'c7bbf35cdb8c5af64411e26c1fa3787d', '2514542565', 'akosua@gmail.com', '1 University Avenue, Berekuso'),
(7, 'Hortance', '029317980e2a86e9c5b9ad87e6244398', '02514542565', 'hortance@gmail.com', '1 University Avenue, Berekuso'),
(8, 'Nana', 'bce1404eaad206b0a6856b179f40e990', '02514542565', 'nana@gmail.com', '1 University Avenue, Berekuso');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_descrip` varchar(50) NOT NULL,
  `menu_price` varchar(50) NOT NULL,
  `rest_id` int(11) NOT NULL DEFAULT 1,
  `tag_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_descrip`, `menu_price`, `rest_id`, `tag_id`) VALUES
(1, 'Banku and tilapia', '45', 1, 1),
(2, 'Fufu and goat light soup', '40', 2, 1),
(3, 'Kenkey and fried fish', '30', 6, 1),
(4, 'Tempura  (Japanese)', '35', 1, 6),
(5, 'Sashimi (Japanese)', '20', 4, 6),
(6, 'Hummus (Lebanese)', '35', 5, 5),
(7, 'Bœuf bourguignon (French)', '50', 7, 3),
(8, 'Chocolate soufflé (French)', '25', 7, 3),
(9, 'Patatas bravas (Spanish)', '25', 3, 4),
(10, 'Albondigas (Spanish)', '50', 7, 4),
(11, 'Cantonese chicken soup (Chinese)', '35', 4, 2),
(12, 'Käsespätzle (German)', '30', 6, 7),
(13, 'Jollof rice and chicken', '25', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(20) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL DEFAULT 5,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `rest_id`, `menu_id`, `customer_id`, `quantity`) VALUES
(2, 2, 9, 7, 1),
(3, 6, 6, 8, 1),
(4, 1, 3, 7, 1),
(6, 1, 1, 5, 1),
(7, 1, 1, 5, 3),
(8, 1, 4, 5, 1),
(9, 1, 1, 5, 3),
(10, 1, 4, 5, 1),
(11, 1, 1, 5, 2),
(12, 2, 2, 5, 1),
(13, 2, 2, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `price_range` varchar(50) NOT NULL,
  `image_url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `location`, `phone`, `price_range`, `image_url`) VALUES
(1, 'Akunnor Restaurant', '1 University Avenue, Berekuso', '+233256324852', '1', 'images/akkunor-tempura.jpg'),
(2, 'Big Ben', '1 University Avenue', '+233542158896', '3', 'images/big-ben-fufu.jpg'),
(3, 'Urban Grill', 'Icon House, House Liberation Link', '+233547125669', '2', 'images/urban-grill-patatas.jpg'),
(4, 'Santoku', '16N Airport Road', '+233589627458', '3', 'images/santoku-sashimi.jpg'),
(5, 'Buka Restaurant', '10th St, Osu, Accra', '+233698754892', '1', 'images/buka-restaurant-hummus.jpg'),
(6, 'Vixie\'s Delicacies ', '34 Nii Kwabena Bonne Cres', '+233541569873', '2', 'images/vixies-delicacies-kaesespaetzle.jpg'),
(7, 'La Chaumiere', '131 Liberation Road', '+233845215632', '2', 'images/la-chaumiere-souffle.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_tags`
--

CREATE TABLE `restaurant_tags` (
  `tag_id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `resttagid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_tags`
--

INSERT INTO `restaurant_tags` (`tag_id`, `rest_id`, `resttagid`) VALUES
(1, 1, 1),
(5, 5, 2),
(3, 7, 3),
(1, 2, 4),
(1, 6, 5),
(4, 3, 6),
(2, 4, 7),
(6, 1, 8),
(4, 7, 10),
(6, 4, 11),
(7, 6, 12),
(1, 3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`) VALUES
(1, 'Local'),
(2, 'Chinese'),
(3, 'French'),
(4, 'Spanish'),
(5, 'Lebanese'),
(6, 'Japanese'),
(7, 'German');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `restaurant_id` (`rest_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_customer constraint` (`customer_id`),
  ADD KEY `order_menu constraint` (`menu_id`),
  ADD KEY `order_restaurant constraint` (`rest_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_tags`
--
ALTER TABLE `restaurant_tags`
  ADD PRIMARY KEY (`resttagid`),
  ADD KEY `restaurant_tag constrain` (`rest_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `restaurant_tags`
--
ALTER TABLE `restaurant_tags`
  MODIFY `resttagid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`rest_id`) REFERENCES `restaurants` (`id`),
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_customer constraint` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `order_menu constraint` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`),
  ADD CONSTRAINT `order_restaurant constraint` FOREIGN KEY (`rest_id`) REFERENCES `restaurants` (`id`);

--
-- Constraints for table `restaurant_tags`
--
ALTER TABLE `restaurant_tags`
  ADD CONSTRAINT `restaurantTag_tagID constraint` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`),
  ADD CONSTRAINT `restaurant_tag constrain` FOREIGN KEY (`rest_id`) REFERENCES `restaurants` (`id`),
  ADD CONSTRAINT `restaurant_tags_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
