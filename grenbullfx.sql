-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2023 at 07:38 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grenbullfx`
--

-- --------------------------------------------------------

--
-- Table structure for table `argent_client_db`
--

CREATE TABLE `argent_client_db` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(40) DEFAULT NULL,
  `lastname` varchar(40) DEFAULT NULL,
  `phone_no` varchar(120) DEFAULT NULL,
  `user_email` varchar(120) DEFAULT NULL,
  `user_password` varchar(20) DEFAULT NULL,
  `city` varchar(60) DEFAULT NULL,
  `country` varchar(40) DEFAULT NULL,
  `sponsor` text DEFAULT NULL,
  `is_admin` varchar(3) DEFAULT NULL,
  `blocked` varchar(3) DEFAULT NULL,
  `date_joined` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `argent_client_db`
--

INSERT INTO `argent_client_db` (`user_id`, `firstname`, `lastname`, `phone_no`, `user_email`, `user_password`, `city`, `country`, `sponsor`, `is_admin`, `blocked`, `date_joined`) VALUES
(5913, 'jane done', 'gbe', '0909090909990', 'janedoe@gmail.com', 'janedoe', NULL, 'togo', NULL, 'no', 'no', '2023-02-26'),
(5915, 'Jane', 'Doey', '090000999', 'janedoe12@gmail.com', 'janedoe', 'Lagos', 'Nigeria', '', 'no', 'no', '2023-03-01'),
(5916, 'Ezeey', 'Moke', '09097877878', 'ezey@gmail.com', 'ezey1234', NULL, NULL, '', 'yes', 'no', '2023-03-03'),
(5917, 'Jimmy', 'Agbaje', '8988899999', 'jimmy@gmail.com', 'jimmy123', NULL, 'Ivory Coast', '5915', 'no', 'no', '2023-03-03'),
(5918, 'Rex', 'Filli', '1234567898', 'rexfilli@gmail.com', 'rexfilli', NULL, 'Cameroon', '5915', 'no', 'no', '2023-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `central_account`
--

CREATE TABLE `central_account` (
  `cid` int(11) NOT NULL,
  `momo_name` varchar(30) DEFAULT NULL,
  `momo_number` varchar(20) DEFAULT NULL,
  `network` varchar(30) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `fund_type` varchar(10) NOT NULL,
  `wallet_type` varchar(20) NOT NULL,
  `wallet_address` text NOT NULL,
  `qr_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `central_account`
--

INSERT INTO `central_account` (`cid`, `momo_name`, `momo_number`, `network`, `status`, `fund_type`, `wallet_type`, `wallet_address`, `qr_code`) VALUES
(90, 'Purity Kingla', '0009998898', 'Orange', 1, 'momo', '', '', ''),
(91, NULL, NULL, NULL, 1, 'wallet', 'btc', 'vcg65655776guggug868686j', '');

-- --------------------------------------------------------

--
-- Table structure for table `client_investment`
--

CREATE TABLE `client_investment` (
  `fund_id` int(11) NOT NULL,
  `payer` varchar(40) DEFAULT NULL,
  `fund_amount` decimal(9,2) NOT NULL,
  `fund_date` datetime DEFAULT NULL,
  `profits` decimal(9,2) NOT NULL,
  `expected_returns` decimal(9,2) NOT NULL,
  `expected_date` datetime DEFAULT NULL,
  `completed` varchar(3) NOT NULL,
  `plan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `client_investment`
--

INSERT INTO `client_investment` (`fund_id`, `payer`, `fund_amount`, `fund_date`, `profits`, `expected_returns`, `expected_date`, `completed`, `plan`) VALUES
(13954, '5917', '10000.00', '2023-03-04 17:57:15', '5000.00', '17000.00', '2023-03-04 17:57:15', 'no', 'flexi'),
(13955, '5915', '10000.00', '2023-03-05 07:02:28', '5000.00', '15000.00', '2023-03-05 07:02:28', 'yes', 'flexi'),
(13956, '5918', '5000.00', '2023-03-05 14:43:51', '2500.00', '7500.00', '2023-03-17 14:43:51', 'no', 'flexi');

-- --------------------------------------------------------

--
-- Table structure for table `client_investment2`
--

CREATE TABLE `client_investment2` (
  `transid` int(11) NOT NULL,
  `depositor` varchar(40) DEFAULT NULL,
  `method` varchar(10) NOT NULL,
  `deposit_amount` decimal(9,2) NOT NULL,
  `fund_date` datetime DEFAULT NULL,
  `payment_confirmed` varchar(3) NOT NULL,
  `pop` text DEFAULT NULL,
  `completed` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `client_investment2`
--

INSERT INTO `client_investment2` (`transid`, `depositor`, `method`, `deposit_amount`, `fund_date`, `payment_confirmed`, `pop`, `completed`) VALUES
(1231, '5915', 'wallet', '30000.00', '2023-03-03 06:46:07', 'no', 'WhatsApp Image 2023-03-01 at 21.28.12.jpeg', 'no'),
(1233, '5918', 'momo', '10000.00', '2023-03-05 16:50:19', 'yes', 'conference-organisers.jpg', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `client_withdrawals`
--

CREATE TABLE `client_withdrawals` (
  `with_id` int(11) NOT NULL,
  `receiver` varchar(70) DEFAULT NULL,
  `with_amount` decimal(9,2) DEFAULT NULL,
  `date_withdrawn` date DEFAULT NULL,
  `completed` varchar(3) DEFAULT NULL,
  `type` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `client_withdrawals`
--

INSERT INTO `client_withdrawals` (`with_id`, `receiver`, `with_amount`, `date_withdrawn`, `completed`, `type`) VALUES
(6127, '5917', '10000.00', NULL, 'no', 'invest'),
(6128, '5915', '20000.00', '2023-03-05', 'yes', 'invest'),
(6129, '5918', '10000.00', '2023-03-05', 'yes', 'bonus');

-- --------------------------------------------------------

--
-- Table structure for table `country_list`
--

CREATE TABLE `country_list` (
  `cn_id` int(11) NOT NULL,
  `country_name` text NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `message` longtext DEFAULT NULL,
  `title` text NOT NULL,
  `message_time` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `sender` varchar(30) DEFAULT NULL,
  `receiver` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `message`, `title`, `message_time`, `status`, `sender`, `receiver`) VALUES
(99, 'Hello World', '', '2023-03-03 21:13:12', 0, 'Admin', '5917'),
(100, 'Hello', '', '2023-03-05 07:27:19', 1, 'Admin', '5915'),
(101, 'come', 'Testing', '2023-03-05 09:14:59', 1, '5915', 'Admin'),
(102, 'Thanks for reaching out to us', '', '2023-03-05 18:06:23', 0, 'Admin', '5915');

-- --------------------------------------------------------

--
-- Table structure for table `ref_bonus`
--

CREATE TABLE `ref_bonus` (
  `bonus_id` int(11) NOT NULL,
  `receiver` varchar(70) NOT NULL,
  `amount` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ref_bonus`
--

INSERT INTO `ref_bonus` (`bonus_id`, `receiver`, `amount`) VALUES
(5892, '5915', '30000.00'),
(5893, '5918', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `mid` int(11) NOT NULL,
  `sender` varchar(40) NOT NULL,
  `title` text NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`mid`, `sender`, `title`, `message`, `status`) VALUES
(410, 'Toddy', 'Testing', 'Okay', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `sender` varchar(30) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `message_time` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_wallets`
--

CREATE TABLE `user_wallets` (
  `wallet_id` int(11) NOT NULL,
  `userid` varchar(60) DEFAULT NULL,
  `account_balance` decimal(9,2) DEFAULT NULL,
  `total_withdrawals` decimal(9,2) DEFAULT NULL,
  `total_deposits` decimal(9,2) DEFAULT NULL,
  `method` varchar(60) DEFAULT NULL,
  `wallet_type` varchar(60) DEFAULT NULL,
  `wallet_address` text DEFAULT NULL,
  `momo_name` varchar(60) DEFAULT NULL,
  `momo_no` varchar(20) DEFAULT NULL,
  `network` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_wallets`
--

INSERT INTO `user_wallets` (`wallet_id`, `userid`, `account_balance`, `total_withdrawals`, `total_deposits`, `method`, `wallet_type`, `wallet_address`, `momo_name`, `momo_no`, `network`) VALUES
(585, 'janedoe', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL),
(586, '5915', '0.00', NULL, NULL, 'momo', 'btc', '54t4trgrrgrgrgrgrg', 'Jimmy', '0900000090', 'MTN'),
(587, '5916', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(588, '5917', '0.00', NULL, NULL, 'momo', 'btc', '', 'Jimmy', 'Agbaje', 'MTN'),
(589, '5918', '10000.00', NULL, NULL, 'momo', 'btc', '', 'Rex Filli', '123456789', 'MTN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `argent_client_db`
--
ALTER TABLE `argent_client_db`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `central_account`
--
ALTER TABLE `central_account`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `client_investment`
--
ALTER TABLE `client_investment`
  ADD PRIMARY KEY (`fund_id`);

--
-- Indexes for table `client_investment2`
--
ALTER TABLE `client_investment2`
  ADD PRIMARY KEY (`transid`);

--
-- Indexes for table `client_withdrawals`
--
ALTER TABLE `client_withdrawals`
  ADD PRIMARY KEY (`with_id`);

--
-- Indexes for table `country_list`
--
ALTER TABLE `country_list`
  ADD PRIMARY KEY (`cn_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_bonus`
--
ALTER TABLE `ref_bonus`
  ADD PRIMARY KEY (`bonus_id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_wallets`
--
ALTER TABLE `user_wallets`
  ADD PRIMARY KEY (`wallet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `argent_client_db`
--
ALTER TABLE `argent_client_db`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5919;

--
-- AUTO_INCREMENT for table `central_account`
--
ALTER TABLE `central_account`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `client_investment`
--
ALTER TABLE `client_investment`
  MODIFY `fund_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13957;

--
-- AUTO_INCREMENT for table `client_investment2`
--
ALTER TABLE `client_investment2`
  MODIFY `transid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234;

--
-- AUTO_INCREMENT for table `client_withdrawals`
--
ALTER TABLE `client_withdrawals`
  MODIFY `with_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6130;

--
-- AUTO_INCREMENT for table `country_list`
--
ALTER TABLE `country_list`
  MODIFY `cn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `ref_bonus`
--
ALTER TABLE `ref_bonus`
  MODIFY `bonus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5894;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=411;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_wallets`
--
ALTER TABLE `user_wallets`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=590;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
