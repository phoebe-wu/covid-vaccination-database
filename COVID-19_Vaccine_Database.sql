-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 02, 2021 at 08:53 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `COVID-19_Vaccine_Database`
--

-- --------------------------------------------------------

--
-- Table structure for table `Appointments`
--

CREATE TABLE `Appointments` (
  `app_ID` int(11) NOT NULL,
  `time` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `p_ID` int(11) NOT NULL,
  `n_ID` int(11) NOT NULL,
  `vaccine_brand` enum('Moderna','Janssen','Pfizer-BioNTech','AstraZeneca','Gamaleya','Novavax') NOT NULL,
  `facility_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Appointments`
--

INSERT INTO `Appointments` (`app_ID`, `time`, `date`, `p_ID`, `n_ID`, `vaccine_brand`, `facility_ID`) VALUES
(900001, '09:30:00', '2021-06-30', 80001, 10001, 'Moderna', 20001),
(900002, '14:30:00', '2021-06-30', 80005, 10002, 'Moderna', 20001),
(900003, '11:10:00', '2021-07-13', 80002, 10003, 'Pfizer-BioNTech', 20003),
(900004, '11:10:00', '2021-07-23', 80003, 10004, 'AstraZeneca', 20004),
(900005, '15:30:00', '2021-07-14', 80004, 10003, 'Janssen', 20002),
(900007, '15:30:00', '2021-06-30', 80005, 10005, 'Novavax', 20005);

-- --------------------------------------------------------

--
-- Table structure for table `City_In_HA`
--

CREATE TABLE `City_In_HA` (
  `city` char(30) NOT NULL,
  `health_authority` enum('Fraser','Interior','Coastal','Northern','Island') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `City_In_HA`
--

INSERT INTO `City_In_HA` (`city`, `health_authority`) VALUES
('Burnaby', 'Fraser'),
('White Rock', 'Fraser'),
('Ashcroft', 'Interior'),
('Kitimat', 'Interior'),
('Vancouver', 'Coastal'),
('Whistler', 'Coastal'),
('McBride', 'Northern'),
('Smithers', 'Northern'),
('Pender Island', 'Island'),
('Victoria', 'Island');

-- --------------------------------------------------------

--
-- Table structure for table `Has_Medical_Condition`
--

CREATE TABLE `Has_Medical_Condition` (
  `user_ID` int(11) NOT NULL,
  `name` char(20) NOT NULL,
  `description` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Has_Medical_Condition`
--

INSERT INTO `Has_Medical_Condition` (`user_ID`, `name`, `description`) VALUES
(80001, 'Julie Berry', 'constant crying'),
(80002, 'Arnold Apple', 'always shaking'),
(80003, 'Bridget Banana', 'banana allergy'),
(80004, 'Toto Flower', 'Insomnia'),
(80005, 'Emily Chow', 'anemia');

-- --------------------------------------------------------

--
-- Table structure for table `Health_Authority`
--

CREATE TABLE `Health_Authority` (
  `name` enum('Fraser','Interior','Coastal','Island','Northern') NOT NULL,
  `population` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Health_Authority`
--

INSERT INTO `Health_Authority` (`name`, `population`) VALUES
('Fraser', 1770000),
('Interior', 740000),
('Coastal', 1000000),
('Island', 760000),
('Northern', 280000);

-- --------------------------------------------------------

--
-- Table structure for table `Inventory_Of_Tests`
--

CREATE TABLE `Inventory_Of_Tests` (
  `facility_ID` int(11) NOT NULL,
  `kind` enum('Nasal swab','Saliva test','Rapid test','Blood test','Nasopharyngeal swab') NOT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Inventory_Of_Tests`
--

INSERT INTO `Inventory_Of_Tests` (`facility_ID`, `kind`, `amount`) VALUES
(30001, 'Nasal swab', 10000),
(30002, 'Saliva test', 3000),
(30003, 'Rapid test', 200),
(30004, 'Blood test', 500),
(30005, 'Nasopharyngeal swab', 7000);

-- --------------------------------------------------------

--
-- Table structure for table `Inventory_Of_Vaccine`
--

CREATE TABLE `Inventory_Of_Vaccine` (
  `facility_ID` int(11) NOT NULL,
  `brand` enum('Moderna','Janssen','Pfizer-BioNTech','AstraZeneca','Gamaleya','Novavax') NOT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Inventory_Of_Vaccine`
--

INSERT INTO `Inventory_Of_Vaccine` (`facility_ID`, `brand`, `amount`) VALUES
(20001, 'Moderna', 1000),
(20002, 'Pfizer-BioNTech', 200),
(20003, 'Janssen', 5000),
(20004, 'AstraZeneca', 6000),
(20005, 'Novavax', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Nurse`
--

CREATE TABLE `Nurse` (
  `user_ID` int(11) NOT NULL,
  `password` char(50) DEFAULT NULL,
  `name` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Nurse`
--

INSERT INTO `Nurse` (`user_ID`, `password`, `name`) VALUES
(10001, 'iamn10001', 'Alex Vu'),
(10002, 'iamn10002', ' Rose Logan'),
(10003, 'iamn10003', 'Eli Long'),
(10004, 'iamn10004', 'Aria Hilton'),
(10005, 'iamn10005', 'Louie Archer');

-- --------------------------------------------------------

--
-- Table structure for table `Patient`
--

CREATE TABLE `Patient` (
  `user_ID` int(11) NOT NULL,
  `password` char(50) DEFAULT '000000',
  `name` char(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phn` int(11) DEFAULT NULL,
  `address` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Patient`
--

INSERT INTO `Patient` (`user_ID`, `password`, `name`, `age`, `phn`, `address`) VALUES
(80001, '9ads8f7h', 'Julie Berry', 23, 8492309, '123 Sesame Street'),
(80002, 'potatoes', 'Arnold Apple', 78, 1820937, '289-2313 Toronto Ave'),
(80003, '90joker38', 'Bridget Banana', 4, 3920384, '9203 West 23rd Avenue'),
(80004, '092jkpoppyseed', 'Toto Flower', 23, 8892309, '34-3822 Tinkle Drive'),
(80005, 'purple90923', 'Emily Chow', 90, 3251309, '8778 Lucas Rd');

-- --------------------------------------------------------

--
-- Table structure for table `Testing_Center`
--

CREATE TABLE `Testing_Center` (
  `facility_ID` int(11) NOT NULL,
  `phone` char(20) DEFAULT NULL,
  `address` char(100) DEFAULT NULL,
  `opening_time` time DEFAULT NULL,
  `closing_time` time DEFAULT NULL,
  `drivethru` tinyint(1) DEFAULT NULL,
  `city` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Testing_Center`
--

INSERT INTO `Testing_Center` (`facility_ID`, `phone`, `address`, `opening_time`, `closing_time`, `drivethru`, `city`) VALUES
(30001, '6048717000', '1155 E. Broadway', '09:00:00', '19:30:00', 1, 'Vancouver'),
(30002, '6045873936', '153-11762 Laity Street', '09:00:00', '16:00:00', 0, 'Maple Ridge'),
(30003, '2504570374', '700 Ashe-Cache Creek Hwy', '09:00:00', '17:00:00', 1, 'Ashcroft'),
(30004, '18777407747', '2180 Ethel Street', '09:30:00', '20:30:00', 0, 'Kelowna'),
(30005, '6049661428', '201-4380 Lorimer Rd', '08:30:00', '16:00:00', 0, 'Whistler');

-- --------------------------------------------------------

--
-- Table structure for table `Testing_Kit`
--

CREATE TABLE `Testing_Kit` (
  `kind` enum('Nasal swab','Saliva test','Rapid test','Blood test','Nasopharyngeal swab') NOT NULL,
  `result_time` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Testing_Kit`
--

INSERT INTO `Testing_Kit` (`kind`, `result_time`) VALUES
('Nasal swab', 1),
('Saliva test', 1),
('Rapid test', 0.5),
('Blood test', 24),
('Nasopharyngeal swab', 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `Testing_Record`
--

CREATE TABLE `Testing_Record` (
  `record_ID` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `result` char(10) DEFAULT NULL,
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Testing_Record`
--

INSERT INTO `Testing_Record` (`record_ID`, `date`, `result`, `user_ID`) VALUES
(600001, '2021-01-01', 'positive', 80001),
(600002, '2021-01-04', 'negative', 80002),
(600003, '2021-03-09', 'negative', 80003),
(600004, '2021-04-12', 'negative', 80004),
(600005, '2021-05-26', 'negative', 80005);

-- --------------------------------------------------------

--
-- Table structure for table `Vaccine_Brand_Delivery`
--

CREATE TABLE `Vaccine_Brand_Delivery` (
  `brand` enum('Moderna','Janssen','Pfizer-BioNTech','AstraZeneca','Novavax','Gamaleya') NOT NULL,
  `delivery_system` char(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Vaccine_Brand_Delivery`
--

INSERT INTO `Vaccine_Brand_Delivery` (`brand`, `delivery_system`) VALUES
('Moderna', 'mRNA'),
('Janssen', 'adenovirus'),
('Pfizer-BioNTech', 'mRNA'),
('AstraZeneca', 'adenovirus'),
('Novavax', 'Protein Subunit'),
('Gamaleya', 'adenovirus');

-- --------------------------------------------------------

--
-- Table structure for table `Vaccine_Center`
--

CREATE TABLE `Vaccine_Center` (
  `facility_ID` int(11) NOT NULL,
  `phone` char(20) DEFAULT NULL,
  `address` char(100) DEFAULT NULL,
  `opening_time` time DEFAULT NULL,
  `closing_time` time DEFAULT NULL,
  `facility_type` char(30) DEFAULT NULL,
  `city` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Vaccine_Center`
--

INSERT INTO `Vaccine_Center` (`facility_ID`, `phone`, `address`, `opening_time`, `closing_time`, `facility_type`, `city`) VALUES
(20001, '6045584006', '1025 W 15th Ave', '10:00:00', '20:00:00', 'Pharmacy', 'Vancouver'),
(20002, '6042922500', '3713 Kensington Ave', '09:00:00', '17:00:00', 'Clinic', 'Burnaby'),
(20003, '2506322121', '920 Lahakas Blvd S', '13:00:00', '20:00:00', 'Hospital', 'Kitimat'),
(20004, '2503611000', '720 Douglas St', '09:30:00', '16:30:00', 'Clinic', 'Victoria'),
(20005, '2505690189', '441 Columbia St', '09:00:00', '17:00:00', 'Clinic', 'McBride');

-- --------------------------------------------------------

--
-- Table structure for table `Vaccine_Need_Second_Dose`
--

CREATE TABLE `Vaccine_Need_Second_Dose` (
  `delivery_system` char(200) NOT NULL,
  `need_second_dose` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Vaccine_Need_Second_Dose`
--

INSERT INTO `Vaccine_Need_Second_Dose` (`delivery_system`, `need_second_dose`) VALUES
('adenovirus', 0),
('mRNA', 1),
('Protein Subunit', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Vaccine_Record`
--

CREATE TABLE `Vaccine_Record` (
  `record_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `dose` int(11) DEFAULT NULL,
  `brand` char(30) DEFAULT NULL,
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Vaccine_Record`
--

INSERT INTO `Vaccine_Record` (`record_id`, `date`, `dose`, `brand`, `user_ID`) VALUES
(400001, '2021-02-01', 1, 'Moderna', 80001),
(400002, '2021-03-04', 1, 'Janssen', 80002),
(400003, '2021-03-14', 1, 'Janssen', 80003),
(400004, '2021-04-01', 2, 'Moderna', 80001),
(400005, '2021-04-10', 1, 'AstraZeneca', 80004),
(400006, '2021-04-11', 1, 'Pfizer-BioNTech', 80005),
(400007, '2021-05-04', 2, 'Janssen', 80002);

-- --------------------------------------------------------

--
-- Table structure for table `Works_At_TC`
--

CREATE TABLE `Works_At_TC` (
  `nurse_ID` int(11) NOT NULL,
  `facility_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Works_At_TC`
--

INSERT INTO `Works_At_TC` (`nurse_ID`, `facility_ID`) VALUES
(10001, 30001),
(10002, 30001),
(10003, 30002),
(10003, 30003),
(10004, 30005),
(10005, 30004);

-- --------------------------------------------------------

--
-- Table structure for table `Works_At_VC`
--

CREATE TABLE `Works_At_VC` (
  `nurse_ID` int(11) NOT NULL,
  `facility_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Works_At_VC`
--

INSERT INTO `Works_At_VC` (`nurse_ID`, `facility_ID`) VALUES
(10001, 20001),
(10002, 20001),
(10003, 20002),
(10003, 20003),
(10004, 20004),
(10005, 20005);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Appointments`
--
ALTER TABLE `Appointments`
  ADD PRIMARY KEY (`app_ID`),
  ADD KEY `p_ID` (`p_ID`),
  ADD KEY `n_ID` (`n_ID`),
  ADD KEY `vaccine_brand` (`vaccine_brand`),
  ADD KEY `facility_ID` (`facility_ID`);

--
-- Indexes for table `City_In_HA`
--
ALTER TABLE `City_In_HA`
  ADD PRIMARY KEY (`city`),
  ADD KEY `health_authority` (`health_authority`);

--
-- Indexes for table `Has_Medical_Condition`
--
ALTER TABLE `Has_Medical_Condition`
  ADD PRIMARY KEY (`user_ID`,`name`);

--
-- Indexes for table `Health_Authority`
--
ALTER TABLE `Health_Authority`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `Inventory_Of_Tests`
--
ALTER TABLE `Inventory_Of_Tests`
  ADD PRIMARY KEY (`facility_ID`,`kind`),
  ADD KEY `kind` (`kind`);

--
-- Indexes for table `Inventory_Of_Vaccine`
--
ALTER TABLE `Inventory_Of_Vaccine`
  ADD PRIMARY KEY (`facility_ID`,`brand`),
  ADD KEY `brand` (`brand`);

--
-- Indexes for table `Nurse`
--
ALTER TABLE `Nurse`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexes for table `Patient`
--
ALTER TABLE `Patient`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `phn` (`phn`);

--
-- Indexes for table `Testing_Center`
--
ALTER TABLE `Testing_Center`
  ADD PRIMARY KEY (`facility_ID`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `address` (`address`);

--
-- Indexes for table `Testing_Kit`
--
ALTER TABLE `Testing_Kit`
  ADD PRIMARY KEY (`kind`);

--
-- Indexes for table `Testing_Record`
--
ALTER TABLE `Testing_Record`
  ADD PRIMARY KEY (`record_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `Vaccine_Brand_Delivery`
--
ALTER TABLE `Vaccine_Brand_Delivery`
  ADD PRIMARY KEY (`brand`);

--
-- Indexes for table `Vaccine_Center`
--
ALTER TABLE `Vaccine_Center`
  ADD PRIMARY KEY (`facility_ID`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `address` (`address`);

--
-- Indexes for table `Vaccine_Need_Second_Dose`
--
ALTER TABLE `Vaccine_Need_Second_Dose`
  ADD PRIMARY KEY (`delivery_system`);

--
-- Indexes for table `Vaccine_Record`
--
ALTER TABLE `Vaccine_Record`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `Works_At_TC`
--
ALTER TABLE `Works_At_TC`
  ADD PRIMARY KEY (`nurse_ID`,`facility_ID`),
  ADD KEY `facility_ID` (`facility_ID`);

--
-- Indexes for table `Works_At_VC`
--
ALTER TABLE `Works_At_VC`
  ADD PRIMARY KEY (`nurse_ID`,`facility_ID`),
  ADD KEY `facility_ID` (`facility_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Appointments`
--
ALTER TABLE `Appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`p_ID`) REFERENCES `Patient` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`n_ID`) REFERENCES `Nurse` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`vaccine_brand`) REFERENCES `Vaccine_Brand_Delivery` (`brand`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_4` FOREIGN KEY (`facility_ID`) REFERENCES `Vaccine_Center` (`facility_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `City_In_HA`
--
ALTER TABLE `City_In_HA`
  ADD CONSTRAINT `city_in_ha_ibfk_1` FOREIGN KEY (`health_authority`) REFERENCES `Health_Authority` (`name`) ON UPDATE CASCADE;

--
-- Constraints for table `Has_Medical_Condition`
--
ALTER TABLE `Has_Medical_Condition`
  ADD CONSTRAINT `has_medical_condition_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `Patient` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Inventory_Of_Tests`
--
ALTER TABLE `Inventory_Of_Tests`
  ADD CONSTRAINT `inventory_of_tests_ibfk_1` FOREIGN KEY (`facility_ID`) REFERENCES `Testing_Center` (`facility_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_of_tests_ibfk_2` FOREIGN KEY (`kind`) REFERENCES `Testing_Kit` (`kind`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Inventory_Of_Vaccine`
--
ALTER TABLE `Inventory_Of_Vaccine`
  ADD CONSTRAINT `inventory_of_vaccine_ibfk_1` FOREIGN KEY (`facility_ID`) REFERENCES `Vaccine_Center` (`facility_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_of_vaccine_ibfk_2` FOREIGN KEY (`brand`) REFERENCES `Vaccine_Brand_Delivery` (`brand`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Testing_Record`
--
ALTER TABLE `Testing_Record`
  ADD CONSTRAINT `testing_record_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `Patient` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Vaccine_Record`
--
ALTER TABLE `Vaccine_Record`
  ADD CONSTRAINT `vaccine_record_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `Patient` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Works_At_TC`
--
ALTER TABLE `Works_At_TC`
  ADD CONSTRAINT `works_at_tc_ibfk_1` FOREIGN KEY (`nurse_ID`) REFERENCES `Nurse` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `works_at_tc_ibfk_2` FOREIGN KEY (`facility_ID`) REFERENCES `Testing_Center` (`facility_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Works_At_VC`
--
ALTER TABLE `Works_At_VC`
  ADD CONSTRAINT `works_at_vc_ibfk_1` FOREIGN KEY (`nurse_ID`) REFERENCES `Nurse` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `works_at_vc_ibfk_2` FOREIGN KEY (`facility_ID`) REFERENCES `Vaccine_Center` (`facility_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
