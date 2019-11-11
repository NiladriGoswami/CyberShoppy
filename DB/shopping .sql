-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 17, 2019 at 08:54 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_chart`
--

CREATE TABLE IF NOT EXISTS `admin_chart` (
  `ad_chart_id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(11) NOT NULL,
  `t_sales` varchar(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ad_chart_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admin_chart`
--

INSERT INTO `admin_chart` (`ad_chart_id`, `year`, `t_sales`) VALUES
(1, '2018', '50000'),
(2, '2019', '67915'),
(4, '2016', '100000'),
(5, '2015', '500000'),
(6, '2017', '77000');

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE IF NOT EXISTS `admin_master` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`admin_id`, `admin_name`, `admin_email`, `password`) VALUES
(1, 'SOUVIK', 'soubasu8@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE IF NOT EXISTS `billing` (
  `billing_id` int(11) NOT NULL AUTO_INCREMENT,
  `billing_date` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `quantity_ordered` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`billing_id`),
  KEY `bill2product` (`p_id`),
  KEY `bill2user` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`billing_id`, `billing_date`, `user_id`, `p_id`, `quantity_ordered`, `value`, `is_active`) VALUES
(4, '22/05/2019', 8, 1, 4, 4316, 0),
(5, '22/05/2019', 8, 4, 4, 5276, 0),
(6, '22/05/2019', 8, 11, 4, 15396, 0),
(7, '22/05/2019', 8, 13, 4, 13996, 0),
(16, '03/06/2019', 8, 7, 1, 1419, 1),
(17, '04/06/2019', 8, 13, 1, 3499, 1),
(18, '20/06/2019', 14, 4, 1, 1319, 1),
(19, '20/06/2019', 16, 11, 4, 15396, 0),
(20, '20/06/2019', 16, 23, 3, 1134, 1),
(21, '20/06/2019', 17, 9, 1, 1249, 1),
(22, '20/06/2019', 18, 4, 1, 1319, 1),
(44, '17/10/2019', 3, 20, 2, 3596, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_master`
--

CREATE TABLE IF NOT EXISTS `category_master` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`cat_id`, `cat_name`, `is_active`) VALUES
(1, 'Men', 1),
(2, 'Women', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `sizes` varchar(30) NOT NULL,
  `discount` int(3) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`p_id`),
  KEY `product2cat` (`cat_id`),
  KEY `product2vendor` (`vendor_id`),
  KEY `product2subcat` (`sub_cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `vendor_id`, `sub_cat_id`, `cat_id`, `name`, `brand`, `quantity`, `price`, `description`, `sizes`, `discount`, `url`, `is_active`) VALUES
(1, 2, 2, 1, 'Reebok Men''s Running Shoes', 'REEBOK ', 33, 1429, 'Easy to wear. Sports shoes.', 'M', 350, 'MS1.jpg', 0),
(4, 2, 2, 1, 'Reebok Hex lite Shoes', 'REEBOK ', 947, 2069, ' Stylish.\r\n ELEGANT.\r\n Durable.\r\n Washable.', 'M', 750, 'MS2.jpg', 1),
(5, 2, 2, 1, 'Reebok Men''s Super Lite Shoes', 'REEBOK ', 0, 1559, 'Easy to Wear.\r\n Waterproof.\r\nLight weight.\r\n Stylish.', 'M', 450, 'MS3.jpg', 1),
(6, 3, 2, 1, 'Adidas Men''s Adiray Shoes', 'ADIDAS', 146, 1799, 'stylish\r\nAll season wear\r\nBest in class design and fabric used\r\n', 'M', 250, 'MS4.jpg', 1),
(7, 10, 2, 1, 'Puma Rapid Running Shoes', 'PUMA', 1007, 1719, 'Stylist.\r\nEasy to wash. \r\nBest in class fabric .\r\nEasy to wash.\r\n', 'L', 300, 'MS5.jpg', 1),
(8, 11, 2, 1, 'Sparx Men''s Canvas Sneakers', 'SPARX', 1000, 725, 'Comfortable.\r\n Stylish.\r\n Easy to wash.\r\n Best in class fabric.', 'M', 1500, 'MS6.jpg', 1),
(9, 3, 2, 1, 'Adidas Yking Running Shoes', 'ADIDAS', 999, 1699, 'Stylish.\r\nSports Shoe.\r\nComfortable.\r\nEasy to Wash.', 'M', 450, 'MS7.jpg', 1),
(10, 11, 2, 1, 'Sparx Mesh Running Shoes', 'SPARX', 1000, 947, 'Running Shoes.\r\nStylish.\r\nEasy to Wash.\r\nCofortable.', 'L', 500, 'MS8.jpg', 1),
(11, 7, 1, 1, 'Raymond Men''s Regular Fit Blazer', 'RAYMOND', 982, 6999, 'Best in class Fabric.\r\nStylish.\r\nAll season blazer.\r\nChemical washable.', 'M', 3150, 'MW1.jpg', 1),
(12, 1, 3, 1, 'Fastrack casual Analog Men''s Watch', 'FASTRACK', 1004, 1610, 'Metallic finish.\r\nGoes with all kinds of attaire.\r\nStainless Steel material used.\r\nWaterproof.', 'L', 350, 'MC1.jpg', 1),
(13, 7, 1, 1, 'Raymond Men''s Waistcoat', 'RAYMOND', 480, 4999, 'Ethnic wear for men''s.\r\nStylish.\r\nEasy to wash.\r\nBest in class fabric used.\r\n\r\n', 'M', 1500, 'MW2.jpg', 1),
(14, 12, 3, 1, 'G-shock Analog Blue Dial Watch', 'G-SHOCK', 2, 7295, 'Stylish sport wear watches.\r\nDurable material.\r\nwater resistant.\r\n', 'L', 2500, 'MC2.jpg', 1),
(15, 8, 1, 1, 'Allen Solly Slim Fit Casual Shirt', 'ALLEN SOLLY', 484, 699, 'Easy To Wash.\r\nStylish Casual Shirt.\r\nGood Quality Material.\r\n', 'M', 200, 'MW3.jpg', 1),
(16, 13, 3, 1, 'Casio Edifice Analog Dial Watch', 'CASIO EDIFICE', 993, 6995, 'Stainless steel material.\r\nWater resistant.\r\nGoes with both Formal and Casual look.\r\nMineral glass used in the dial.', 'L', 2000, 'MM3.jpg', 1),
(17, 8, 1, 1, 'Allen Solly Men''s Polo', 'ALLEN SOLLY', 971, 539, 'Casual Black POLO T-Shirt.\r\nComfortable.\r\nEasy to Wash.\r\nBest in class Fabric.', 'M', 150, 'MW4.jpg', 1),
(18, 2, 7, 1, 'Reebok Navy Blue And Black Laptop Bags', 'REEBOK ', 48, 1410, 'Good quality material.\r\nDurable.\r\nEasy to Carry on For long distance travel.\r\nSpacious and waterproof.', 'M', 450, 'B1.jpg', 1),
(19, 14, 3, 1, 'Titan Neo Silver Analog Dial Watch', 'TITAN', 150, 2995, 'Leather Belt watch.\r\nComfortable and Easy to wear.\r\nWater Resistant.\r\nDurable.', 'L', 2000, 'MM4.jpg', 1),
(20, 3, 7, 1, 'Adidas sky Blue Class Bag Pack', 'ADIDAS', 996, 2298, 'Good Quality material.\r\nComfortable to carry on.\r\nStylish And Waterproof.\r\nDurable and Spacious.', 'L', 500, 'MB2.jpg', 1),
(21, 10, 7, 1, 'Puma 25 Ltr''s Laptop bag Pack', 'PUMA', 974, 1019, 'Good quality Material.\r\nComfortable to carry on.\r\nSpacious.\r\nWaterproof.\r\nDurable.', 'L', 250, 'MB3.jpg', 1),
(22, 15, 7, 1, 'Sky Bags Figo Plus Bag Pack', 'SKY BAGS', 1000, 1200, 'Easy to Cary on.\r\nComfortable and Durable.\r\nSpacious.\r\nWaterproof.\r\nGood quality material used.', 'M', 450, 'MB4.jpg', 1),
(23, 16, 4, 2, 'Shein Maroon Moss Top ', 'SHEIN', 977, 878, 'Good quality Fabric.\r\nComfortable.\r\nEasy to wash.\r\nAll season wear.', 'M', 500, 'WW1.jpg', 1),
(24, 19, 5, 2, 'Catwalk Women''s Fashionable Sandals', 'CAT WALK', 149, 1596, 'Leather Material.\r\nWaterproof.\r\nDurable.\r\nAll season footwear.\r\n', 'M', 500, 'WS1.jpg', 1),
(25, 22, 8, 2, 'BFC Women''s  Adjustable Handbag', 'BFC', 997, 758, 'Designer Hand bags with adjustable straps.\r\nCan be used as sling bags.\r\nComfortable and easy to carry.\r\nDurable and light weight.', 'M', 400, 'WB1.jpg', 1),
(26, 14, 6, 2, 'Titan Blue Dial Women''s Watch', 'TITAN', 974, 6295, 'Stainless steel material used.\r\nDurable.\r\nElegant and stylish.\r\nWater resistant.', 'L', 2000, 'WC1.jpg', 1),
(27, 20, 8, 2, 'Lavie Mascaline Women''s Tote Bag', 'LAVIE', 150, 1868, 'Leather finish material.\r\nWaterproof.\r\nSpacious and Durable.\r\nStylish hang bag exclusive collection for women.', 'M', 450, 'WB2.jpg', 1),
(28, 1, 6, 2, 'Fastrack Stylish Women''s Green Watch', 'FASTRACK', 998, 3279, 'Mineral Glass Used.\r\nWater resistant.\r\nDurable.\r\nStainless steel material.', 'L', 1000, 'WC2.jpg', 1),
(29, 8, 7, 1, 'AllenSolly office side bags', 'ALLEN SOLLY', 500, 1900, 'Comfortable to Carry.Waterproof.Good quality material. Good to go at office in a professional way.', 'M', 250, 'b11.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE IF NOT EXISTS `product_review` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` varchar(50) NOT NULL,
  `rating` int(50) NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`review_id`),
  KEY `review2product` (`p_id`),
  KEY `review2user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `product_review`
--


-- --------------------------------------------------------

--
-- Table structure for table `subcategory_master`
--

CREATE TABLE IF NOT EXISTS `subcategory_master` (
  `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_cat_name` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `cat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sub_cat_id`),
  KEY `cat2subcat` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `subcategory_master`
--

INSERT INTO `subcategory_master` (`sub_cat_id`, `sub_cat_name`, `is_active`, `cat_id`) VALUES
(1, 'Clothing', 1, 1),
(2, 'Footwear', 1, 1),
(3, 'Watches', 1, 1),
(4, 'Clothing', 1, 2),
(5, 'Footwear', 1, 2),
(6, 'Watches', 1, 2),
(7, 'Bags', 1, 1),
(8, 'Bags', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE IF NOT EXISTS `user_master` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` bigint(12) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `user_email`, `password`, `is_active`, `first_name`, `last_name`, `phone`) VALUES
(3, 'niladrig007@gmail.com', '12345', 1, 'Niladri', 'Goswami', 9474468236),
(4, 'pritish049@gmail.com', '12345', 2, 'Pritish', 'Dutta', 9002062127),
(5, 'anusen94@gmail.com', '12345', 0, 'Anushiba', 'Sen', 9126140584),
(7, 'lahirisen@gmail.com', '12345', 2, 'Senjuti', 'Lahiri', 98760423741),
(8, 'soubasu8@gmail.com', '12345', 1, 'SOUVIK', 'BASU', 8617666691),
(9, 'mailtorupesh@gmail.com', '12345', 0, 'Rupesh', 'Yadav', 8294127048),
(10, 'mailtologan@gmail.com', '12345', 2, 'logan', 'Richardson', 7959836825),
(11, 'mailtorupai@gmail.com', '12345', 2, 'rupai', 'ghosh', 7959836825),
(12, 'nilmoni1952@gmail.com', '12345', 1, 'Nilmoni', 'Goswami', 9832325352),
(13, 'oisheek16@gmail.com', '12345', 1, 'Oisheek', 'Dey', 9641645210),
(14, 'spmitra2012@gmail.com', '1234567890', 1, 'Spandan ', 'Mitra', 9126675413),
(15, 'tathagatachakraborty023@gmail.com', 'bichi', 1, 'Tathagata', 'Chakraborty ', 8017700296),
(16, 'hrijoy.sarkar9@gmail.com', '123454321', 1, 'Hrijoy', 'Sarkar', 7602440471),
(17, 'gauravrimbo@gmail.com', '12345', 1, 'Gaurav', 'Dey', 9641778356),
(18, 'sauravezioghosh5@gmail.com', 'iamsunny', 1, 'Saurav', 'Ghosh', 9614359614);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_chart_master`
--

CREATE TABLE IF NOT EXISTS `vendor_chart_master` (
  `v_chart_id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(5) DEFAULT NULL,
  `sales` varchar(10) NOT NULL DEFAULT '0',
  `v_id` int(11) NOT NULL,
  PRIMARY KEY (`v_chart_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `vendor_chart_master`
--

INSERT INTO `vendor_chart_master` (`v_chart_id`, `year`, `sales`, `v_id`) VALUES
(1, '2019', '12230', 2),
(9, '2015', '18000', 2),
(3, '2018', '20000', 2),
(11, '2017', '60000', 7),
(5, '2016', '36000', 2),
(6, '2017', '17000', 2),
(7, '2019', '85027', 7),
(8, '2018', '40000', 7),
(12, '2016', '40000', 7),
(13, '2019', '', 24);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_master`
--

CREATE TABLE IF NOT EXISTS `vendor_master` (
  `vendor_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(255) NOT NULL,
  `vendor_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `phone` bigint(12) NOT NULL,
  PRIMARY KEY (`vendor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `vendor_master`
--

INSERT INTO `vendor_master` (`vendor_id`, `vendor_name`, `vendor_email`, `password`, `is_active`, `phone`) VALUES
(1, 'FASTRACK', 'fastrack@gmail.com', '12345', 1, 8617666691),
(2, 'REEBOK_INDIA', 'reebok@gmail.com', '12345', 1, 8617666691),
(3, 'ADIDAS', 'adidas@gmail.com', '12345', 0, 9126140984),
(7, 'RAYMOND', 'raymond@gmail.com', '12345', 1, 9832325352),
(8, 'ALLEN SOLLY', 'allensolly@gmail.com', '12345', 1, 9126140984),
(10, 'PUMA', 'puma@gmail.com', '12345', 0, 9474468236),
(11, 'SPARX', 'sparkx@gmail.com', '12345', 1, 9474468236),
(12, 'G-SHOCK', 'gshock@gmail.com', '12345', 1, 9625121481),
(13, 'CASIO EDIFICE INDIA', 'casioedifice@gmail.com', '12345', 1, 8474468236),
(14, 'TITAN', 'titan@gmail.com', '12345', 1, 7291640584),
(15, 'SKY BAGS', 'skybags@gamil.com', '12345', 0, 6294127033),
(16, 'SHEIN', 'shein@gmail.com', '12345', 1, 9141756121),
(17, 'ZARA', 'zara@gmail.com', '12345', 1, 7625142981),
(18, 'BIBA', 'biba@gmail.com', '12345', 1, 6294152896),
(19, 'CAT WALK', 'catwalk@gmail.com', '12345', 1, 8249434752),
(20, 'LAVIE', 'lavie@gmail.com', '12345', 1, 7492156894),
(21, 'BELINI', 'belini@gmail.com', '12345', 1, 7684859464),
(22, 'BFC', 'bfc@gmail.com', '12345', 1, 7291640584),
(23, 'FASTELO', 'fastelo@gmail.com', '12345', 1, 9474468236),
(24, 'JAYASREE TEA', 'jayasree@gmail.com', '12345', 1, 7551815923),
(25, 'JAYASREE TEA', 'jayasree@gmail.com', '12345', 2, 6294127033),
(26, 'JAYASREE TEA', 'jayasree@gmail.com', '12345', 2, 6294127033),
(27, 'JAYASREE TEA', 'jayasree@gmail.com', '12345', 2, 6294127033);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `bill2product` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`),
  ADD CONSTRAINT `bill2user` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product2cat` FOREIGN KEY (`cat_id`) REFERENCES `category_master` (`cat_id`),
  ADD CONSTRAINT `product2subcat` FOREIGN KEY (`sub_cat_id`) REFERENCES `subcategory_master` (`sub_cat_id`),
  ADD CONSTRAINT `product2vendor` FOREIGN KEY (`vendor_id`) REFERENCES `vendor_master` (`vendor_id`);

--
-- Constraints for table `product_review`
--
ALTER TABLE `product_review`
  ADD CONSTRAINT `review2product` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`),
  ADD CONSTRAINT `review2user` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`);

--
-- Constraints for table `subcategory_master`
--
ALTER TABLE `subcategory_master`
  ADD CONSTRAINT `cat2sub_cat` FOREIGN KEY (`cat_id`) REFERENCES `category_master` (`cat_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
