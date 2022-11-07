-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 08:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expID` int(11) NOT NULL,
  `exp_type` varchar(300) NOT NULL,
  `exp_amount` int(200) NOT NULL,
  `exp_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expID`, `exp_type`, `exp_amount`, `exp_date`) VALUES
(48, 'electricity bill', 5000, '2022-10-26 06:27:54'),
(50, 'workerpayment', 3000, '2022-10-26 06:28:15'),
(53, 'shop Rent', 4000, '2022-11-04 07:22:36');

-- --------------------------------------------------------

--
-- Table structure for table `livesearch`
--

CREATE TABLE `livesearch` (
  `searchID` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `action` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `livesearch`
--

INSERT INTO `livesearch` (`searchID`, `name`, `action`) VALUES
(1, 'Shop Expenses', 'http://localhost/clothshop/form-expenses.php'),
(2, 'Shop Products', 'http://localhost/clothshop/form-product.php'),
(3, 'Shop Sales', 'http://localhost/clothshop/form-sales.php'),
(4, 'Shop user', 'http://localhost/clothshop/form-user.php'),
(5, 'Shop vendors', 'http://localhost/clothshop/form-vendor.php'),
(6, 'All Expenses Display', 'http://localhost/clothshop/table-expenses.php'),
(7, 'All Product details', 'http://localhost/clothshop/table-product.php'),
(8, 'Customer Record Display', 'http://localhost/clothshop/table-sales.php'),
(9, 'Shop User Details', 'http://localhost/clothshop/table-user.php'),
(10, 'Vendor Detail Display', 'http://localhost/clothshop/table-vendor.php');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `product_price` int(200) NOT NULL,
  `product_type` varchar(300) NOT NULL,
  `product_varient` varchar(200) NOT NULL,
  `Date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `product_name`, `product_price`, `product_type`, `product_varient`, `Date_time`) VALUES
(1, 'wavyshirt', 2000, 'casual shirt', 'medium', '2022-11-05 10:57:07'),
(2, 'geometric pattern', 2499, 'casual shirt', '2.5M', '2022-11-05 11:47:32'),
(3, 'GFCGHC', 2000, 'stiched black shirt', '2.5M', '2022-11-07 08:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `product_qty`
--

CREATE TABLE `product_qty` (
  `product_qty_ID` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `Current_qty` int(11) NOT NULL,
  `Date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `product_qty`
--

INSERT INTO `product_qty` (`product_qty_ID`, `product_id`, `Current_qty`, `Date_time`) VALUES
(1, 1, 10, '2022-11-07 10:18:58'),
(3, 2, 0, '2022-11-05 11:47:32'),
(4, 3, 0, '2022-11-07 08:13:02'),
(10, 1, 12, '2022-11-07 12:15:53'),
(11, 1, 10, '2022-11-07 12:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profileID` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `about` varchar(1000) NOT NULL,
  `job` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `userid` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profileID`, `image`, `name`, `about`, `job`, `address`, `phone`, `email`, `userid`, `date`) VALUES
(1, '', 'Farhad chudary', 'A fabric shop retailing numerous styles and types of fabrics can be opened in a fixed storefront location. Fabric shops have traditionally been very profitable specialty retail operations as the markups applied to fabrics for retail sales can exceed 100 percent or more.', 'Shop manager', 'gulgasht colony', '03114567890', 'Dotstylefabric@gmail.com', 2, '2022-10-28 09:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `salesID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_contact` int(20) NOT NULL,
  `quantity` int(200) NOT NULL,
  `price` int(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`salesID`, `productID`, `customer_name`, `customer_contact`, `quantity`, `price`, `date`) VALUES
(2, 0, 'Arfa shafiq', 987654, 2, 1500, '2022-10-25 06:51:58'),
(3, 0, 'Ashfaq', 456789009, 1, 2340000, '2022-10-26 10:01:01'),
(4, 0, 'ibrahim', 67890, 1, 1499, '2022-10-25 06:53:02'),
(6, 0, 'Areeb Mushtaq', 356790865, 2, 3000, '2022-10-26 10:11:50'),
(8, 0, 'Irtaza', 9876547, 4, 780, '2022-10-26 10:10:46'),
(9, 0, 'Barira', 2147483647, 2, 30, '2022-11-05 08:09:01'),
(10, 18, 'momin', 2147483647, 3, 2100, '2022-11-05 09:24:08'),
(11, 14, 'Ashfaq', 45237887, 1, 500, '2022-11-05 09:23:06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `user_name` varchar(300) NOT NULL,
  `user_contact` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `user_name`, `user_contact`, `user_password`) VALUES
(2, 'adminshop', '123', '1234'),
(3, 'shopboy12', '3211', '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendorID` int(11) NOT NULL,
  `vendor_name` varchar(300) NOT NULL,
  `vendor_address` varchar(200) NOT NULL,
  `vendor_description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendorID`, `vendor_name`, `vendor_address`, `vendor_description`) VALUES
(2, 'Iqbal bhosla', 'gulberg3, lahore', 'cambric cotton, latha, boski provider'),
(3, 'AD', 'model town multan', 'wash and wear'),
(5, 'Amjad-Botique', 'Samama market,karachi', 'emboideried kurta, cotton provider'),
(11, 'Iqbal bhosla', 'Chishtiyan', 'cambric cotton'),
(13, 'asdfg', 'abcd', 'wfffff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expID`);

--
-- Indexes for table `livesearch`
--
ALTER TABLE `livesearch`
  ADD PRIMARY KEY (`searchID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `product_qty`
--
ALTER TABLE `product_qty`
  ADD PRIMARY KEY (`product_qty_ID`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profileID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`salesID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `livesearch`
--
ALTER TABLE `livesearch`
  MODIFY `searchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_qty`
--
ALTER TABLE `product_qty`
  MODIFY `product_qty_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `salesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
