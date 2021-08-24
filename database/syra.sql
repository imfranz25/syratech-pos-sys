-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 07:16 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `syra`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `user_id` int(11) NOT NULL,
  `employee_no` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `user_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`user_id`, `employee_no`, `username`, `user_password`, `user_type`, `user_status`) VALUES
(15, '12255129', 'admin2', '$2y$10$gskBvZ37Ff9XL7STfpAd6eLHOmyDim/Ijt1fUWiXGJpbkGLeCxbva', 'Administrator', 'Active'),
(18, '201810244', 'admin', '$2y$10$gskBvZ37Ff9XL7STfpAd6eLHOmyDim/Ijt1fUWiXGJpbkGLeCxbva', 'Administrator', 'Active'),
(26, '1225512', 'hannah', '$2y$10$8GYSSq6qAPracoK2vfMPkuKSPfi3ZltJeNA8c85rxmd4QhzUQRZ7i', 'Cashier (1)', 'Active'),
(30, '232524', 'jason', '$2y$10$UtWfDnGIEi2sSL0suEptqOvm85KKhZtiZyXuN/dxH8o5MBhDv/PPW', 'Cashier (2)', 'Active'),
(32, '12255123', 'sarah', '$2y$10$.GlpRTxAce9lKGA.wtPVP.2aji1DshrsJZ5zfA0W9mrKC4CETQNZq', 'Accountant', 'Active'),
(34, '12255125', 'mark', '$2y$10$Mmk3fUcoVkdgE/BigiG2kuSYtz1cgAfjEJGGxKIhHqkWapxgBSXbe', 'Administrator', 'Active'),
(35, '122551233', 'derick', '$2y$10$SM6nlHsLGLRKiqocXxZ2seZVQlIOb2yATqCkyKEV0fGoAVPJt0iei', 'Cashier (2)', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_no` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `suffix` varchar(20) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `civil_status` varchar(30) NOT NULL,
  `department` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `qualified_dependent_status` varchar(10) NOT NULL,
  `employee_status` varchar(20) NOT NULL,
  `pay_date` date NOT NULL,
  `contact_no` varchar(30) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `other_social_media_account` varchar(100) NOT NULL,
  `social_media_account_id` varchar(100) NOT NULL,
  `address_line1` text NOT NULL,
  `address_line2` text NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `state_province` varchar(100) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `picpath` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_no`, `fname`, `mname`, `lname`, `suffix`, `birth_date`, `gender`, `nationality`, `civil_status`, `department`, `designation`, `qualified_dependent_status`, `employee_status`, `pay_date`, `contact_no`, `email_address`, `other_social_media_account`, `social_media_account_id`, `address_line1`, `address_line2`, `municipality`, `state_province`, `country`, `zip_code`, `picpath`) VALUES
(3, '201810244', 'Francis', 'Condino', 'Ong', 'N/A', '2000-05-13', 'Male', 'Filipino', 'Single', 'IT Department', 'Faculty', 'Z', 'Regular', '2021-06-10', '0926327452', 'francis.ong@cvsu.edu.ph', 'facebook', '2135123', 'Salinas 1', 'Salinas 2 Himalayan', 'Bacoor City', 'Cavite', 'Philippines', 4102, 'Profile.png'),
(11, '1225512', 'Hannah', 'Mae', 'Cruz', 'N/A', '2021-06-11', 'Female', 'Filipino', 'Married', 'IT Department', 'Faculty', 'S', 'Regular', '2021-06-11', '0926327452', 'hnnah@gmail.com', 'facebook', '236523', 'Salinas 1', 'Salinas 2', 'Bacoor City', 'Cavite', 'Philippines', 3262, 'tw-logo.png'),
(15, '232524', 'Jason', 'C.', 'Villanueva', 'N/A', '2021-06-11', 'Male', 'Filipino', 'Seperated', 'IT Department', 'Faculty', 'S', 'Regular', '2021-06-11', '0926327452', 'jason@gmail.com', 'whatsapp', '53535', 'Salinas 1', 'Salinas 2', 'Bacoor City', 'Cavite', 'Philippines', 23252, 'admin.png'),
(17, '12255123', 'Sarah', 'G.', 'Gonzales', 'N/A', '2021-06-11', 'Male', 'Egyptian', 'Seperated', 'IT Department', 'Faculty', 'S', 'Regular', '2021-06-11', '0926327452', 'sarah@gmail.com', 'whatsapp', '2135123', 'Salinas 1', 'Salinas 2', 'Bacoor City', 'Cavite', 'Philippines', 23254, 'admin.png'),
(19, '12255125', 'Mark', 'Jason', 'Brussel', 'N/A', '2021-06-11', 'Male', 'Dutch', 'Married', 'IT Department', 'Faculty', 'S', 'Regular', '2021-06-11', '0926327458', 'mark@gmail.com', 'whatsapp', '2135123', 'Salinas 1 Himalayan', 'Salinas 2 Himalayan', 'Bacoor City', 'Cavite', 'Panama', 4102, 'admin.png'),
(20, '122551233', 'Derick', 'James', 'Jose', 'N/A', '2021-06-13', 'Male', 'Filipino', 'Married', 'IT Department', 'Faculty', 'S', 'Regular', '2021-06-13', '0926327452', 'derick@gmail.com', 'telegram', '2425624', 'Salinas 1', 'Salinas 2', 'Bacoor City', 'Cavite', 'Philippines', 4102, 'admin.png');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `payroll_id` int(11) NOT NULL,
  `employee_no` varchar(255) NOT NULL,
  `b_rate_hour` double NOT NULL,
  `b_num_hour` double NOT NULL,
  `b_income` double NOT NULL,
  `h_rate_hour` double NOT NULL,
  `h_num_hour` double NOT NULL,
  `h_income` double NOT NULL,
  `o_rate_hour` double NOT NULL,
  `o_num_hour` double NOT NULL,
  `o_income` double NOT NULL,
  `gross_income` double NOT NULL,
  `net_income` double NOT NULL,
  `sss_contrib` double NOT NULL,
  `philhealth_contrib` double NOT NULL,
  `pagibig_contrib` double NOT NULL,
  `tax_contrib` double NOT NULL,
  `sss_loan` double NOT NULL,
  `pagibig_loan` double NOT NULL,
  `fs_deposit` double NOT NULL,
  `fs_loan` double NOT NULL,
  `salary_loan` double NOT NULL,
  `other_loan` double NOT NULL,
  `total_deduction` double NOT NULL,
  `dependents` varchar(255) NOT NULL,
  `payroll_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`payroll_id`, `employee_no`, `b_rate_hour`, `b_num_hour`, `b_income`, `h_rate_hour`, `h_num_hour`, `h_income`, `o_rate_hour`, `o_num_hour`, `o_income`, `gross_income`, `net_income`, `sss_contrib`, `philhealth_contrib`, `pagibig_contrib`, `tax_contrib`, `sss_loan`, `pagibig_loan`, `fs_deposit`, `fs_loan`, `salary_loan`, `other_loan`, `total_deduction`, `dependents`, `payroll_date`) VALUES
(12, '12255123', 100, 100, 10000, 100, 100, 10000, 100, 100, 10000, 30000, 21275.93, 1178.7, 1178.7, 100, 5666.67, 100, 100, 100, 100, 100, 100, 8724.07, 'S', '2021-06-11'),
(13, '232524', 400, 400, 160000, 400, 400, 160000, 400, 400, 160000, 480000, 316187.49, 1178.7, 1178.7, 100, 149350.11, 500, 5000, 5005, 500, 500, 500, 163812.51, 'S', '2021-06-11'),
(14, '1225512', 500, 800, 400000, 500, 500, 250000, 500, 500, 250000, 900000, 600692.49, 1178.7, 1178.7, 100, 283750.11, 5000, 500, 500, 500, 6000, 600, 299307.51, 'S', '2021-06-11'),
(15, '201810244', 180, 500, 90000, 180, 100, 18000, 180, 200, 36000, 144000, 92379.37, 1178.7, 1178.7, 100, 43163.23, 1000, 1000, 1000, 1000, 1000, 1000, 51620.63, 'Z', '2021-06-10'),
(16, '12255125', 500, 900, 450000, 900, 70, 63000, 900, 70, 63000, 576000, 237472.49, 1178.7, 1178.7, 100, 180070.11, 5000, 500, 500, 50000, 50000, 50000, 338527.51, 'S', '2021-06-11'),
(17, '122551233', 300, 200, 60000, 100, 300, 30000, 100, 200, 20000, 110000, 45592.49, 1178.7, 1178.7, 100, 30950.11, 500, 0, 300, 0, 30000, 200, 64407.51, 'S', '2021-06-13'),
(18, '12255125', 200, 10, 2000, 300, 100, 30000, 200, 5, 1000, 33000, 20209.93, 1178.7, 1178.7, 100, 6566.67, 500, 300, 300, 111, 232, 2323, 12790.07, 'S', '2021-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `pos1`
--

CREATE TABLE `pos1` (
  `pos1_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount_amount` double NOT NULL,
  `discounted_amount` double NOT NULL,
  `total_bills` double NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `cash_given` double NOT NULL,
  `customer_change` double NOT NULL,
  `order_summary` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pos1`
--

INSERT INTO `pos1` (`pos1_id`, `price`, `quantity`, `discount_amount`, `discounted_amount`, `total_bills`, `total_quantity`, `cash_given`, `customer_change`, `order_summary`) VALUES
(1, 2295, 30, 17212.5, 51637.5, 51637.5, 30, 52000, 362.5, 'Era Flag Lion 9FIFTY Cap'),
(2, 12999, 5, 16248.75, 48746.25, 48746.25, 5, 50000, 1253.75, 'Winter Package Deal'),
(3, 1995, 1, 498.75, 1496.25, 1496.25, 1, 1500, 3.75, 'Chicago Bulls NBA Cap 2020'),
(4, 2095, 1, 523.75, 1571.25, 1571.25, 1, 3000, 1428.75, 'Era Flag Lakers 9FORTY Cap'),
(5, 1995, 5, 2493.75, 7481.25, 7481.25, 5, 8000, 518.75, 'Chicago Bulls NBA Cap 2020'),
(6, 1895, 5, 2368.75, 7106.25, 7106.25, 5, 72000, 64893.75, 'Era Flag Navy 9FORTY Cap'),
(7, 1995, 5, 2493.75, 7481.25, 11745, 8, 8000, 518.75, 'Chicago Bulls NBA Cap 2020');

-- --------------------------------------------------------

--
-- Table structure for table `pos2`
--

CREATE TABLE `pos2` (
  `pos2_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `discount_amount` double NOT NULL,
  `discounted_amount` double NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `total_discount_given` double NOT NULL,
  `total_discounted_amount` double NOT NULL,
  `cash_given` double NOT NULL,
  `customer_change` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pos2`
--

INSERT INTO `pos2` (`pos2_id`, `item_name`, `quantity`, `price`, `discount_amount`, `discounted_amount`, `total_quantity`, `total_discount_given`, `total_discounted_amount`, `cash_given`, `customer_change`) VALUES
(10, 'Chicago Bulls NBA Cap 2020', 5, 1995, 2493.75, 7481.25, 5, 2493.75, 7481.25, 8000, 518.75),
(11, 'Era Flag Navy 9FORTY Cap', 1, 1895, 473.75, 1421.25, 6, 2967.5, 8902.5, 1500, 78.75),
(12, 'Era Flag Lion 9FIFTY Cap', 5, 2295, 2868.75, 8606.25, 5, 2868.75, 8606.25, 9000, 393.75),
(13, 'Chicago Bulls NBA Black', 3, 2595, 1946.25, 5838.75, 3, 1946.25, 5838.75, 6000, 161.25),
(14, 'Era Flag Navy 9FORTY Cap', 30, 1895, 0, 56850, 30, 0, 56850, 60000, 3150);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `employee_no` (`employee_no`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`payroll_id`);

--
-- Indexes for table `pos1`
--
ALTER TABLE `pos1`
  ADD PRIMARY KEY (`pos1_id`);

--
-- Indexes for table `pos2`
--
ALTER TABLE `pos2`
  ADD PRIMARY KEY (`pos2_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `payroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pos1`
--
ALTER TABLE `pos1`
  MODIFY `pos1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pos2`
--
ALTER TABLE `pos2`
  MODIFY `pos2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
