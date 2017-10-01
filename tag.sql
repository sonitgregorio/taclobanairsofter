-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2017 at 02:01 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tag`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product`, `quantity`, `cid`, `price`, `status`) VALUES
(3, 3, 5, 2, '50.00', 1),
(8, 4, 5, 1, '50.00', 1),
(9, 2, 5, 1, '300.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(255) NOT NULL,
  `work` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `dob`, `pob`, `work`, `location`, `contact`, `email`, `gender`, `image`) VALUES
(1, 'John Pauls', 'Bueno', '1993-02-07', 'Alang-Alang Leyte', 'Developer', 'Tacloban', '09172580624', 'support@gmail.com', 'male', '65427d0b0a44a32151b6000054d4f457.jpg'),
(2, 'Dearly', 'IDK', '0000-00-00', 'Tacloban City', '9172580624', 'Tacloban City', '+639172580624', 'test@gmail.com', 'male', '16e96fac6e58a96a647a7508c02fc6fb.jpg'),
(3, 'Test', 'Test', '2017-10-01', 'Tacloban', 'Developer', 'Tacloban', '09172580624', 'test@gmail.com', 'male', 'person.png');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `description`) VALUES
(1, 'Administrator'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `serial` varchar(255) NOT NULL,
  `price` double(11,2) NOT NULL,
  `image` text NOT NULL,
  `short_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `item_name`, `quantity`, `serial`, `price`, `image`, `short_description`) VALUES
(2, 'Item 2', 20, '3587654', 300.00, '41e94003ad95334c4e5fe43a7488b393.jpg', 'Sample Description for this item'),
(3, 'test item 3', 20, '1324a682', 50.00, '4dce267dd0c505d418792c02bf6a46c3.jpg', 'Armalite'),
(4, 'Product Image 1', 15, 'XYYTZZ', 50.00, '0c074389da664ac791fcbb71d882a88a.jpg', 'Gun'),
(5, 'Riffle', 50, '123456789', 1500.00, 'no_image.png', 'Colt® is the original manufacturer of the M16 rifles and M4 carbines used by the US Armed Forces; and through those 40+ years of experience has gained a wealth of knowledge in producing reliable weapons that function in harsh environments.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` text NOT NULL,
  `position` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `position`, `pid`, `username`) VALUES
(1, '40be4e59b9a2a2b5dffb918c0e86b3d7', 1, 1, 'john.bueno'),
(2, '40be4e59b9a2a2b5dffb918c0e86b3d7', 2, 2, 'sales'),
(3, '098f6bcd4621d373cade4e832627b4f6', 2, 3, 'sales2'),
(4, 'd41d8cd98f00b204e9800998ecf8427e', 1, 4, ''),
(5, '40be4e59b9a2a2b5dffb918c0e86b3d7', 2, 3, 'tacloban');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
