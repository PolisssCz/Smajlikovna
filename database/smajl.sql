-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 16, 2022 at 10:06 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smajl`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(150) NOT NULL,
  `user_ip` varchar(900) NOT NULL,
  `item_id` varchar(900) NOT NULL,
  `product_img` varchar(900) NOT NULL,
  `product_title` varchar(300) NOT NULL,
  `product_price` int(50) NOT NULL,
  `product_priceD` decimal(10,0) DEFAULT NULL,
  `product_quantity` int(50) NOT NULL,
  `time_count` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(150) NOT NULL,
  `product_img` varchar(500) NOT NULL,
  `product_title` varchar(300) NOT NULL,
  `product_info` varchar(500) NOT NULL,
  `product_price` int(50) NOT NULL,
  `product_priceD` decimal(10,0) DEFAULT NULL,
  `time_count` datetime(6) NOT NULL,
  `product_class` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_img`, `product_title`, `product_info`, `product_price`, `product_priceD`, `time_count`, `product_class`) VALUES
(1, 'assets\\img\\HappyFace.png', 'Grinning Face with Big Eyes', 'A yellow face with smiling eyes and a broad, open smile, showing upper teeth and tongue on some platforms. Often conveys general happiness and good-natured amusement. Similar to Grinning Face but with taller, more excited eyes.', 57, '50', '2021-07-10 21:38:54.000000', 'cheerful'),
(2, 'assets\\img\\faceVomiting.png', 'Face Vomiting', 'A yellow face with scrunched, X-shaped eyes spewing bright-green vomit. May represent physical illness or disgust, more intensely so than Nauseated Face. ', 2000, NULL, '2021-07-11 21:31:57.000000', 'sad'),
(3, 'assets\\img\\MoneyFace.png', 'Dollar Sign Eyes', 'A yellow face with raised eyebrows, dollar signs for eyes, and an open smile sticking out a tongue styled after a green, dollar banknote. Some platforms depict the dollar-sign eyes in green circles.', 10000, NULL, '2021-07-11 21:31:57.000000', 'wealthy'),
(4, 'assets\\img\\ColdFace.png', 'Cold Face', 'An icy-blue face with gritted teeth usually depicted with icicles clinging to its cheeks or jaw, as if frozen from extreme cold. May also represent unfriendliness (slang, cold) or excellence (slang, cool or chill).', 135, NULL, '2021-07-12 09:35:39.000000', 'sad'),
(5, 'assets\\img\\FaceMonocle.png', 'Face with Monocle', 'A yellow face with furrowed eyebrows wearing a monocle. Usually depicted with a small, intent frown and head slightly upturned, as if in careful inspection.', 455, NULL, '2021-07-12 09:35:39.000000', 'smart'),
(6, 'assets\\img\\smilingFaceWithHeartEes.png', 'Smiling Face with Heart-Eyes', 'A yellow face with an open smile, sometimes showing teeth, and red, cartoon-styled hearts for eyes. Often conveys enthusiastic feelings of love, infatuation, and adoration, e.g., I love/am in love with this person or thing.', 300000, NULL, '2021-07-12 09:35:39.000000', 'love');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
