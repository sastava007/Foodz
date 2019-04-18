-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2019 at 06:21 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `catname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `catname`) VALUES
(4, 'BREAKFAST'),
(5, 'LUNCH'),
(6, 'DINNER'),
(7, 'BEVERAGES');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `categoryid` int(1) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `categoryid`, `productname`, `price`, `photo`) VALUES
(14, 4, 'Pancake Tacos with Cheese and ', 400, 'upload/pancake_breakfast_tacos400_1539096003.jpg'),
(15, 4, 'Egg Baked In Tomatoes', 310, 'upload/eggs_in_tomatoes_1539095833.jpeg'),
(16, 5, 'Beef & Broccoli Stir-Fry', 360, 'upload/brocollibeef_1539096616_1539097842.jpg'),
(17, 5, 'Spaghetti', 400, 'upload/spagetti_1539097965.png'),
(18, 7, 'Mojito', 200, 'upload/http _cdn.cnn.com_cnnnext_dam_assets_170224172523-mojito_1539097580.jpg'),
(19, 7, 'Sex On The Beach', 250, 'upload/http _cdn.cnn.com_cnnnext_dam_assets_170227111426-sex-on-the-beach-cocktail_1539097662.jpg'),
(20, 6, 'Slow Cooker Orange Chicken ', 450, 'upload/slow-cooker-chicken-recipes-orange-1533576720_1539097827.jpg'),
(21, 4, 'Eggs in a Basket', 375, 'upload/egg_in_a_hole_recipe400_1539096098.jpg'),
(22, 4, 'Full English Breakfast', 600, 'upload/1145_1539096763.jpg'),
(23, 7, 'Coca-Cola', 80, 'upload/cocacola_1539097796.jpg'),
(24, 0, '', 0, ''),
(25, 0, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseid` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `total` double NOT NULL,
  `date_purchase` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchaseid`, `customer`, `total`, `date_purchase`) VALUES
(8, 'Neovic', 600, '2017-12-06 15:29:00'),
(9, 'demo', 450, '2018-10-09 20:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `pdid` int(11) NOT NULL,
  `purchaseid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_detail`
--

INSERT INTO `purchase_detail` (`pdid`, `purchaseid`, `productid`, `quantity`) VALUES
(13, 8, 15, 2),
(14, 8, 17, 2),
(15, 8, 18, 2),
(16, 9, 15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `r_id` int(3) NOT NULL,
  `address` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`r_id`, `address`, `email`, `password`, `phone`) VALUES
(2, 'IIITM Campus', 'khana@gmail.com', 'aa68ccb315fd7f4286d5ae8b9bbf538656edf155ec1cf389c5572d521230a8fa', '9559997865');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_norm`
--

CREATE TABLE `restaurant_norm` (
  `email` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_norm`
--

INSERT INTO `restaurant_norm` (`email`, `name`, `rating`) VALUES
('khana@gmail.com', 'Khana Khazana', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(3) UNSIGNED NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `image` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `email`, `password`, `phone`, `image`) VALUES
(2, 'test@gmail.com', '88d4266fd4e6338d13b845fcf289579d209c897823b9217da3e161936f031589', '8978654348', ''),
(3, 'abc@gmail.com', '88d4266fd4e6338d13b845fcf289579d209c897823b9217da3e161936f031589', '2234567889', ''),
(7, 'sastava007@gmail.com', 'aa68ccb315fd7f4286d5ae8b9bbf538656edf155ec1cf389c5572d521230a8fa', '9559997865', ''),
(8, 'GHFGH@GMAIL.COM', 'bb162f18728eb6dd22d11ff08c4c301108ee4f21220c608e02d633a222547058', '234567899', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_norm`
--

CREATE TABLE `users_norm` (
  `phone` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_norm`
--

INSERT INTO `users_norm` (`phone`, `name`, `address`) VALUES
('2234567889', 'Bhavya Sharma', 'opoiou mnajdhjdhu'),
('234567899', 'dvJB', 'CJBFKSNFFJS['),
('8978654348', 'Balaji Rao', 'kjhdkjs jopw d pwwpj'),
('9559997865', 'Shivansh Srivastava', 'kjhdkjs jopw d pwwpj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`pdid`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `restaurant_norm`
--
ALTER TABLE `restaurant_norm`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_norm`
--
ALTER TABLE `users_norm`
  ADD PRIMARY KEY (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  MODIFY `pdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `r_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
