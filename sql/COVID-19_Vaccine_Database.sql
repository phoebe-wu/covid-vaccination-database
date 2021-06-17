-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 16, 2021 at 07:53 PM
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
(90000, '09:30:00', '2021-06-30', 80001, 10001, 'Moderna', 20001),
(90001, '11:10:00', '2021-07-13', 80002, 10003, 'Pfizer-BioNTech', 20003),
(90002, '14:30:00', '2021-06-30', 80008, 10002, 'Moderna', 20001),
(90003, '15:15:00', '2021-07-13', 80002, 10003, 'Pfizer-BioNTech', 20003),
(90004, '08:45:00', '2021-06-23', 80003, 10004, 'AstraZeneca', 20004),
(90005, '15:30:00', '2021-05-14', 80004, 10000, 'Janssen', 20002),
(90006, '17:45:00', '2021-05-13', 80002, 10000, 'Pfizer-BioNTech', 20003),
(90007, '15:30:00', '2021-06-30', 80005, 10003, 'Novavax', 20005),
(90008, '11:15:00', '2021-02-25', 80003, 10002, 'Pfizer-BioNTech', 20003),
(90009, '13:30:00', '2021-03-13', 80009, 10003, 'Pfizer-BioNTech', 20020),
(90010, '12:10:00', '2021-02-14', 80007, 10002, 'Moderna', 20013),
(90011, '18:30:00', '2021-08-11', 80006, 10004, 'Pfizer-BioNTech', 20009),
(90012, '16:15:00', '2021-04-12', 80007, 10005, 'Moderna', 20017),
(90013, '14:30:00', '2021-07-16', 80008, 10004, 'Moderna', 20008),
(90014, '08:10:00', '2021-05-11', 80010, 10005, 'Pfizer-BioNTech', 20002),
(90015, '10:45:00', '2021-03-23', 80005, 10000, 'Pfizer-BioNTech', 20007);

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
('Hope', 'Fraser'),
('Maple Ridge', 'Fraser'),
('White Rock', 'Fraser'),
('Ashcroft', 'Interior'),
('Kelowna', 'Interior'),
('Kitimat', 'Interior'),
('Vancouver', 'Coastal'),
('Whistler', 'Coastal'),
('McBride', 'Northern'),
('Mackenzie', 'Northern'),
('Smithers', 'Northern'),
('Pender Island', 'Island'),
('Surrey', 'Fraser'),
('Delta', 'Fraser'),
('Abbotsford', 'Fraser'),
('Squamish', 'Coastal'),
('West Vancouver', 'Coastal'),
('Bowen Island', 'Coastal'),
('Pemberton', 'Coastal'),
('North Vancouver', 'Coastal'),
('Richmond', 'Coastal'),
('Sechelt', 'Coastal'),
('Gibsons', 'Coastal'),
('Powell River', 'Coastal'),
('Nanaimo', 'Island'),
('Saanichton', 'Island'),
('Victoria', 'Island');

-- --------------------------------------------------------

--
-- Table structure for table `Has_Medical_Condition`
--

CREATE TABLE `Has_Medical_Condition` (
  `user_ID` int(11) NOT NULL,
  `name` char(20) DEFAULT NULL,
  `description` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Has_Medical_Condition`
--

INSERT INTO `Has_Medical_Condition` (`user_ID`, `name`, `description`) VALUES
(80001, 'Julie Berry', 'Pregnant'),
(80002, 'Johnny Appleseed', 'Constipation'),
(80003, 'Bridget Banana', 'Banana Allergy'),
(80004, 'Toto Flower', 'Insomnia'),
(80005, 'Emily Chow', 'Anemia'),
(80006, 'Armin Rose', 'Penicillin Allergy'),
(80007, 'Matthew Chen', 'Constipation'),
(80008, 'Kobe Fraser', 'Anemia');


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
(30003, 'Nasal swab', 400),
(30004, 'Nasal swab', 4000),
(30006, 'Nasal swab', 5000),
(30007, 'Nasal swab', 8000),
(30015, 'Nasal swab', 7900),
(30013, 'Nasal swab', 4000),
(30014, 'Nasal swab', 3000),
(30012, 'Nasal swab', 1000),
(30016, 'Nasal swab', 400),
(30020, 'Nasal swab', 1000),
(30005, 'Nasal swab', 1000),
(30002, 'Saliva test', 3000),
(30014, 'Saliva test', 3200),
(30015, 'Saliva test', 330),
(30018, 'Saliva test', 3000),
(30003, 'Saliva test', 2300),
(30019, 'Saliva test', 2500),
(30020, 'Saliva test', 8800),
(30005, 'Saliva test', 7800),
(30008, 'Saliva test', 8700),
(30018, 'Rapid test', 200),
(30004, 'Rapid test', 200),
(30005, 'Rapid test', 2030),
(30014, 'Rapid test', 3200),
(30012, 'Rapid test', 6200),
(30013, 'Rapid test', 9200),
(30007, 'Rapid test', 200),
(30003, 'Rapid test', 2900),
(30001, 'Blood test', 2500),
(30003, 'Blood test', 300),
(30002, 'Blood test', 2500),
(30014, 'Blood test', 1500),
(30018, 'Blood test', 4500),
(30005, 'Blood test', 4500),
(30015, 'Blood test', 8500),
(30019, 'Blood test', 4500),
(30020, 'Blood test', 900),
(30014, 'Nasopharyngeal swab', 1400),
(30003, 'Nasopharyngeal swab', 300),
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
(20002, 'Moderna', 1030),
(20003, 'Moderna', 1130),
(20004, 'Moderna', 1230),
(20005, 'Moderna', 10),
(20006, 'Moderna', 230),
(20012, 'Moderna', 760),
(20015, 'Moderna', 800),
(20001, 'Pfizer-BioNTech', 200),
(20002, 'Pfizer-BioNTech', 200),
(20003, 'Pfizer-BioNTech', 200),
(20020, 'Pfizer-BioNTech', 200),
(20001, 'Janssen', 5000),
(20002, 'Janssen', 5000),
(20003, 'Janssen', 4000),
(20004, 'Janssen', 5000),
(20005, 'Janssen', 5500),
(20006, 'Janssen', 2300),
(20007, 'Janssen', 700),
(20008, 'Janssen', 800),
(20009, 'Janssen', 200),
(20010, 'Janssen', 5000),
(20018, 'Janssen', 5400),
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
(10000, 'iamn10000', 'Farrah Cortez'),
(10001, 'iamn10001', 'Alex Vu'),
(10002, 'iamn10002', 'Jackson Pouf'),
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
(80000, 'patient80000', 'Beau Heart', 8, 8376482, '6675 Orange Street'),
(80001, 'patient80001', 'Julie Berry', 23, 8492309, '123 Sesame Street'),
(80002, 'patient80002', 'Johnny Appleseed', 78, 1820937, '289-2313 Toronto Ave'),
(80003, 'patient80003', 'Bridget Banana', 4, 3920384, '9203 West 23rd Avenue'),
(80004, 'patient80004', 'Toto Flower', 23, 8892309, '34-3822 Tinkle Drive'),
(80005, 'patient80005', 'Emily Chow', 90, 3251309, '8778 Lucas Rd'),
(80006, 'patient80006', 'Armin Rose', 15, 2390293, '2833-483 Thompson Drive'),
(80007, 'patient80007', 'Matthew Chen', 34, 9437332, '18829 39th Avenue'),
(80008, 'patient80008', 'Evan Lee', 43, 3738291, '8377 Victoria Drive'),
(80009, 'patient80009', 'Kobe Fraser', 55, 4763992, '1484-777 Maple Road'),
(80010, 'patient80010', 'Jean Paul Portier', 78, 3823392, '5774 Bridge Street');



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
(30000, '(604) 587-3936', '14577 66th Avenue', '10:00:00', '18:00:00', 1, 'Surrey'),
(30001, NULL, '1128 Hornby Street', '09:30:00', '17:30:00', 0, 'Vancouver'),
(30002, '(604) 587-3936', '153-11762 Laity Street', '09:00:00', '16:00:00', 0, 'Maple Ridge'),
(30003, '(250) 457-0374', '700 Ashe-Cache Creek Hwy', '09:00:00', '17:00:00', 1, 'Ashcroft'),
(30004, '1-877 740-7747', '2180 Ethel Street', '09:30:00', '20:30:00', 0, 'Kelowna'),
(30005, '(604) 966-1428', '201-4380 Lorimer Rd', '08:30:00', '16:00:00', 0, 'Whistler'),
(30006, '(604) 871-7000', '1155 E. Broadway', '09:00:00', '19:30:00', 1, 'Vancouver'),
(30007, '(604) 359-9559', '40456 Government Road', '09:00:00', '16:00:00', 1, 'Squamish'),
(30008, NULL, '5911 North Service Road', '08:00:00', '19:00:00', 1, 'Richmond'),
(30009, NULL, '4875 Heather Street', '08:00:00', '19:00:00', 1, 'Vancouver'),
(30010, '(604) 216-3138', '1145 Commercial Dr', '08:00:00', '22:00:00', 1, 'Vancouver'),
(30011, '(604) 587-3936', '3700 Willingdon Avenue', '09:30:00', '18:15:00', 0, 'Burnaby'),
(30012, NULL, '4500 Oak Street', '07:00:00', '15:00:00', 0, 'Vancouver'),
(30013, '(604) 587-3936', '1395 McKenzie Road', '08:30:00', '15:30:00', 0, 'Abbotsford'),
(30014, '(604) 587-3936', '4470 Clarence Taylor Crescent', '08:30:00', '15:30:00', 0, 'Delta'),
(30015, '1-844-901-8442', '900 Fifth Street', '08:30:00', '20:00:00', 0, 'Nanaimo'),
(30016, '(604)-973-1600', 'Suite 200-221 West Esplanade', '19:00:00', '21:00:00', 0, 'North Vancouver'),
(30017, '(604)-894-6633', '1403 Pemberton Portage Road', '13:00:00', '15:00:00', 0, 'Pemberton'),
(30018, '1-844-901-8442', '2170 Mt.Newton X Rd', '08:30:00', '20:00:00', 0, 'Saanichton'),
(30019, '1-844-901-8442', '3800 Finnerty Road', '08:30:00', '20:00:00', 0, 'Victoria'),
(30020, '1-844-901-8442', '1767 Island Highway', '08:30:00', '20:00:00', 0, 'Victoria');

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
  `result` char(20) DEFAULT NULL,
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Testing_Record`
--

INSERT INTO `Testing_Record` (`record_ID`, `date`, `result`, `user_ID`) VALUES
(60000, '2021-05-21', 'Results Pending', 80001),
(60001, '2021-01-01', 'Positive', 80001),
(60002, '2021-01-04', 'Negative', 80002),
(60003, '2021-03-09', 'Negative', 80003),
(60004, '2021-04-12', 'Negative', 80004),
(60005, '2021-05-26', 'Negative', 80005);

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
('Janssen', 'adenovirus'),
('AstraZeneca', 'adenovirus'),
('Gamaleya', 'adenovirus'),
('Moderna', 'mRNA'),
('Pfizer-BioNTech', 'mRNA'),
('Novavax', 'Protein Subunit');

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
(20000, '(250) 391-1738', '1089 Langford Pkwy', '8:30:00', '00:00:00', 'Community Centre', 'Victoria'),
(20001, '(604) 558-4006', '1025 W 15th Ave', '10:00:00', '20:00:00', 'Pharmacy', 'Vancouver'),
(20002, '(604)292-2500', '3713 Kensington Ave', '09:00:00', '17:00:00', 'Clinic', 'Burnaby'),
(20003, '(250) 632-2121', '920 Lahakas Blvd S', '13:00:00', '20:00:00', 'Hospital', 'Kitimat'),
(20004, '(250)361-1000', '720 Douglas St', '09:30:00', '16:30:00', 'Clinic', 'Victoria'),
(20005, '(250) 569-0189', '441 Columbia St', '09:00:00', '17:00:00', 'Clinic', 'McBride'),
(20006, '(604) 860-7630', '444 Park St.', '08:30:00', '04:00:00', 'Health Unit', 'Hope'),
(20007, '(250) 997-3263', '45 Centennial Drive', NULL, NULL, 'Hospital', 'Mackenzie'),
(20008, '(604) 430-3337', '3075 Slocan St.', '09:00:00', '19:00:00', 'Community Centre', 'Vancouver'),
(20009, '(604) 257-8100', '5851 West Blvd.', '09:00:00', '19:00:00', 'Seniors Centre', 'Vancouver'),
(20010, '(604) 827-2584', '2405 Wesbrook Mall', '09:30:00', '16:30:00', 'University Campus', 'Vancouver'),
(20011, '(604)947-2216', '1041 Mt. Gardner Road', '10:30:00', '16:30:00', 'Community School', 'Bowen Island'),
(20012, '(604) 925-7270', '2121 Marine Dr.', '09:00:00', '19:00:00', 'Community Centre', 'West Vancouver'),
(20013, '(604) 599-2000', '8771 Lansdowne Rd', '09:00:00', '19:00:00', 'University Campus', 'Richmond'),
(20014, '(604) 247-8900', '8811 River Rd.', '09:00:00', '19:00:00', 'Casino', 'Richmond'),
(20015, '(604) 885-3513', '5604 Trail Ave.', '09:00:00', '17:00:00', 'Seniors Centre', 'Sechelt'),
(20016, '(604) 886-2411', '747 Gibsons Way', '09:00:00', '17:00:00', 'Legion Branch', 'Gibsons'),
(20017, '604-485-2891', '5001 Joyce Ave.', '09:15:00', '16:00:00', 'Community Centre', 'Powell River'),
(20018, '(604) 932-3928', '4010 Whistler Way', '10:00:00', '17:00:00', 'Conference Centre', 'Whistler'),
(20019, '604-894-1418', '7390 Cottonwood St', '10:00:00', '17:00:00', 'Community Centre', 'Pemberton'),
(20020, '(604) 898-3604', '1009 Centennial Way', '10:00:00', '17:00:00', 'Community Centre', 'Squamish'),
(20021, NULL, '10025 King George Boulevard', '11:00:00', '19:00:00', 'Community Centre', 'Surrey'),
(20022, '(604) 598-5898', '13458 107A Avenue', '11:00:00', '19:00:00', 'Community Centre', 'Surrey'),
(20023, '(604) 855-0020', '30640 Bluedridge Drive', '10:00:00', '15:30:00', 'Health Clinic', 'Abbotsford'),
(20024, '(604) 294-1936', '4585 Albert Street', '10:00:00', '17:00:00', 'Seniors Centre', 'Burnaby'),
(20025, '(604) 502-6360', '15105 105 Ave', '08:00:00', '18:00:00', 'Community Centre', 'Surrey');

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
  `record_ID` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `dose` int(11) DEFAULT NULL,
  `brand` char(30) DEFAULT NULL,
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Vaccine_Record`
--

INSERT INTO `Vaccine_Record` (`record_ID`, `date`, `dose`, `brand`, `user_ID`) VALUES
(40000, '2021-07-11', 1, 'Moderna', 80008),
(40001, '2021-02-01', 1, 'Moderna', 80001),
(40002, '2021-03-04', 1, 'Janssen', 80002),
(40003, '2021-03-14', 1, 'Janssen', 80003),
(40004, '2021-04-01', 2, 'Moderna', 80001),
(40005, '2021-04-10', 1, 'AstraZeneca', 80004),
(40006, '2021-04-11', 1, 'Pfizer-BioNTech', 80005),
(40007, '2021-05-04', 1, 'Janssen', 80002),
(40008, '2021-06-11', 1, 'Pfizer-BioNTech', 80009),
(40009, '2021-06-24', 2, 'Pfizer-BioNTech', 80009),
(40010, '2021-06-05', 1, 'Pfizer-BioNTech', 80010),
(40011, '2021-06-11', 2, 'Pfizer-BioNTech', 80010),
(40012, '2021-04-22', 1, 'Moderna', 80006),
(40013, '2021-05-11', 2, 'Moderna', 80006),
(40014, '2021-06-11', 1, 'Moderna', 80007),
(40015, '2021-07-11', 2, 'Moderna', 80007);

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
(10000, 20001),
(10002, 20003),
(10003, 20003),
(10000, 20005),
(10004, 20004),
(10000, 20002),
(10000, 20003),
(10003, 20020),
(10002, 20013),
(10004, 20009),
(10005, 20017),
(10004, 20008),
(10005, 20002),
(10000, 20007),
(10001, 20000),
(10002, 20001),
(10003, 20002),
(10004, 20003),
(10005, 20004),
(10003, 20005),
(10002, 20006),
(10001, 20007),
(10002, 20008),
(10000, 20009),
(10000, 20010),
(10001, 20011),
(10002, 20012),
(10003, 20013),
(10004, 20014),
(10005, 20015),
(10000, 20016),
(10002, 20017),
(10003, 20018),
(10004, 20019),
(10005, 20020),
(10000, 20019),
(10001, 20018),
(10000, 20017),
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
  ADD PRIMARY KEY (`user_ID`,`description`);

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
  ADD UNIQUE KEY `address` (`address`),
  ADD KEY `city` (`city`);

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
  ADD PRIMARY KEY (`brand`),
  ADD KEY `delivery_system` (`delivery_system`);

--
-- Indexes for table `Vaccine_Center`
--
ALTER TABLE `Vaccine_Center`
  ADD PRIMARY KEY (`facility_ID`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `address` (`address`),
  ADD KEY `city` (`city`);

--
-- Indexes for table `Vaccine_Need_Second_Dose`
--
ALTER TABLE `Vaccine_Need_Second_Dose`
  ADD PRIMARY KEY (`delivery_system`);

--
-- Indexes for table `Vaccine_Record`
--
ALTER TABLE `Vaccine_Record`
  ADD PRIMARY KEY (`record_ID`),
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
-- Constraints for table `Testing_Center`
--
ALTER TABLE `Testing_Center`
  ADD CONSTRAINT `testing_center_ibfk_1` FOREIGN KEY (`city`) REFERENCES `City_In_HA` (`city`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Testing_Record`
--
ALTER TABLE `Testing_Record`
  ADD CONSTRAINT `testing_record_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `Patient` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Vaccine_Brand_Delivery`
--
ALTER TABLE `Vaccine_Brand_Delivery`
  ADD CONSTRAINT `vaccine_brand_delivery_ibfk_1` FOREIGN KEY (`delivery_system`) REFERENCES `Vaccine_Need_Second_Dose` (`delivery_system`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Vaccine_Center`
--
ALTER TABLE `Vaccine_Center`
  ADD CONSTRAINT `vaccine_center_ibfk_1` FOREIGN KEY (`city`) REFERENCES `City_In_HA` (`city`) ON DELETE CASCADE ON UPDATE CASCADE;

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
