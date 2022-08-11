-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2022 at 11:59 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `type` enum('Admin','superAdmin') NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `type`) VALUES
(1, 'admin', 'admin', 'superAdmin'),
(9, 'admin2', 'admin2', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `contactinfo`
--

CREATE TABLE `contactinfo` (
  `Email` varchar(100) NOT NULL,
  `phone1` int(11) NOT NULL,
  `phone2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactinfo`
--

INSERT INTO `contactinfo` (`Email`, `phone1`, `phone2`) VALUES
('CarFind@gmail.com', 3111222, 70708090);

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `carId` int(11) DEFAULT NULL,
  `carname` varchar(100) NOT NULL,
  `pricePerDay` double NOT NULL,
  `FromDate` date DEFAULT NULL,
  `ToDate` date DEFAULT NULL,
  `pickTime` time NOT NULL,
  `dropTime` time NOT NULL,
  `location` enum('beirut','nabatieh','sour','saida') NOT NULL,
  `cost` double NOT NULL,
  `refund` double NOT NULL DEFAULT 0,
  `Status` enum('pending','canceled','active','finished','confirmed') DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `userId`, `username`, `phone`, `carId`, `carname`, `pricePerDay`, `FromDate`, `ToDate`, `pickTime`, `dropTime`, `location`, `cost`, `refund`, `Status`, `PostingDate`) VALUES
(26, 27, 'karim gh', 70123456, 17, 'Nissan-Micra', 36.4, '2022-05-06', '2022-05-07', '13:18:00', '09:14:00', 'beirut', 36.4, 0, 'finished', '2022-05-06 10:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `tblbrands`
--

CREATE TABLE `tblbrands` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbrands`
--

INSERT INTO `tblbrands` (`id`, `BrandName`, `logo`) VALUES
(62, 'NISSAN', 'nissan-logo-701.png'),
(63, 'TOYOTA', 'toyota-logo-1989-1400x1200.png'),
(64, 'HYUNDAI', 'Hyundai-logo-grey-2560x1440.png'),
(65, 'MINI COOPER', 'Mini-Cooper-Logo-PNG-Photo.png'),
(66, 'RENAULT', 'Renault_logo.png'),
(67, 'MERCEDES', 'Mercedes-Benz-logo-2011-1920x1080.png'),
(68, 'MITSUBISHI', 'Mitsubishi-emblem-1024x768.png'),
(69, 'LAND ROVER', 'land-rover-logo.png'),
(70, 'HONDA', 'honda-logo-1700x1150.png'),
(71, 'KIA', 'Kia-logo-2560x1440.png'),
(72, 'DACIA', 'Dacia-logo-2008-1920x1080.png'),
(73, 'AUDI', 'Audi-logo-1999-1920x1080.png'),
(75, 'BMW', 'bmwlogo.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblcars`
--

CREATE TABLE `tblcars` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `overview` longtext NOT NULL,
  `brand` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `transmission` enum('automatic','manual') NOT NULL,
  `price` double NOT NULL COMMENT 'price per day',
  `img` varchar(100) NOT NULL,
  `model` int(1) NOT NULL,
  `aux` int(11) NOT NULL,
  `airconditioner` int(1) NOT NULL,
  `seat` int(11) NOT NULL,
  `door` int(11) NOT NULL,
  `status` enum('available','rented') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcars`
--

INSERT INTO `tblcars` (`id`, `name`, `overview`, `brand`, `location`, `transmission`, `price`, `img`, `model`, `aux`, `airconditioner`, `seat`, `door`, `status`) VALUES
(16, 'Kia-Picanto', 'Kia introduced the third generation of its smallest vehicle, the Picanto, at the 2017 Geneva Motor Show. Designed on two continents and developed on the same platform as the Hyundai i10, the Picanto started to look more like a shrunk MPV than a small-segment hatchback. Maybe it wasn\'t the best choice for a family or a pizza-delivery shop, but it could work very well in both situations.', 71, 'beirut', 'automatic', 30, 'picanto_5_door_lrg.jpg', 2014, 1, 1, 4, 4, 'available'),
(17, 'Nissan-Micra', 'The Nissan Micra replaced the Japanese-market Nissan Cherry. It was exclusive to Nissan Japanese dealership network Nissan Cherry Store until 1999 when the \"Cherry\" network was combined into Nissan Red Stage until 2003. Until Nissan began selling kei cars in Japan.', 62, 'beirut', 'automatic', 36.4, 'micra_lrg.jpg', 2010, 1, 1, 5, 4, 'available'),
(18, 'Kia-Rio', 'The Kia Rio is a subcompact car manufactured by Kia since November 1999 and now in its fourth generation. Body styles have included a three and five-door hatchback and four-door sedan, equipped with inline-four gasoline and diesel engines, and front-wheel drive.', 71, 'sour', 'manual', 40, 'rio_lrg.jpg', 2016, 1, 1, 5, 4, 'available'),
(19, 'hyundai-i10', 'The Hyundai i10 has 2 Petrol Engine and 1 LPG Engine on offer. The Petrol engine is 1086 cc and 1197 cc while the LPG engine is 1086 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the i10 has a mileage of 16.95 to 20.36 kmpl & Ground clearance of i10 is 165mm.', 64, 'beirut', 'automatic', 32, 'i10_lrg.jpg', 2013, 1, 1, 4, 4, 'available'),
(20, 'Honda-City', 'The Honda City (Japanese: ホンダ・シティ, Hepburn: Honda City) is a subcompact car which has been produced by the Japanese manufacturer Honda since 1981.', 70, 'beirut', 'manual', 45.7, 'city_lrg.jpg', 2014, 1, 1, 5, 4, 'available'),
(21, 'Nissan-Sunny', 'The Nissan Sunny (Japanese: 日産・サニー, Hepburn: Nissan Sanī) is an automobile built by the Japanese automaker Nissan from 1966 to 2006. In the early 1980s, the brand changed from Datsun to Nissan in line with other models by the company. Although production of the Sunny in Japan ended in 2006, the name remains in use in China and GCC countries for a rebadged version of the Nissan Almera.', 62, 'beirut', 'automatic', 60, 'nissan sunny.png', 2009, 0, 1, 5, 4, 'available'),
(22, 'Dacia-Dokker', 'The Dacia Dokker 1.5 dCi(90 Cv) FAPof 2012 is a car model designed by the company Daciaand enters into the series Dokkerthat encompasses cars of different displacements and years.', 72, 'beirut', 'manual', 70, 'dokker_lrg.jpg', 2012, 1, 1, 6, 4, 'available'),
(23, 'Dacia-Lodgy', 'The Dacia Lodgy 1.5 dCi(90 Cv) FAPof 2012 is a car model designed by the company Daciaand enters into the series Dokkerthat encompasses cars of different displacements and years.', 72, 'beirut', 'manual', 65, 'lodgy_lrg (1).jpg', 2012, 1, 1, 6, 4, 'available'),
(24, 'Kia-optima', 'This 2019 Kia Optima SX is proudly offered by ST. GEORGE AUTO The Optima SX is well maintained and has just 18,560mi. This low amount of miles makes this vehicle incomparable to the competition. ', 71, 'beirut', 'automatic', 80, 'optima_lrg.jpg', 2019, 1, 1, 5, 4, 'available'),
(25, 'Kia-Cerato', 'Kia Cerato 2014 KIA Cerato or Forte (in China) or K3 (in South Korea) is the compact sedan manufactured by Kia since 2008. The Kia Cerato YD is the second generation of the Kia Cerato lineup and started its production in 2012. it was being produced in sedan and hatchback variants and had a 1.6 Liter engine as standard.', 71, 'beirut', 'automatic', 52, 'cerato_lrg.jpg', 2014, 1, 1, 5, 4, 'available'),
(26, 'Honda-Accord', 'The Honda Accord (Japanese: ホンダ・アコード, Hepburn: Honda Akōdo, / əˈkɔːrd /), also known as the Honda Inspire (Japanese: ホンダ・インスパイア, Hepburn: Honda Insupaia) in Japan and China for certain generations, are a series of automobiles manufactured by Honda since 1976, best known for its four-door sedan variant, which has been one of the best-selling cars in the United States since 1989.', 70, 'beirut', 'automatic', 53, 'accord_lrg.jpg', 2010, 1, 1, 5, 4, 'available'),
(27, 'Hyundai-tucson', 'The Hyundai Tucson  (pronounced Tu-són) is a compact crossover SUV (C-segment) produced by the South Korean manufacturer Hyundai since 2004. ', 64, 'beirut', 'automatic', 90, 'tucson_lrg.jpg', 2016, 1, 1, 6, 4, 'available'),
(28, 'Renault-Duster', 'Renault Duster 2018 is a front or all-wheel drive K1 class crossover with 19 equipment options. The engine capacity is 1.5 - 1.6 liters, gasoline and diesel fuel are used as fuel. The body is five-door, the salon is designed for five seats. Below are the dimensions of the model, technical characteristics, equipment and a more detailed description of the appearance.', 66, 'beirut', 'automatic', 60, 'duster_lrg.jpg', 2018, 1, 1, 5, 4, 'available'),
(29, 'Renault-talisman', 'The Renault Talisman is a concept executive car designed after the 1995 Renault Initiale Paris Concept line by Renault chief designer Patrick Le Quément, and it was presented at the Frankfurt Motor Show in September 2001. The first sketches were drawn in the beginning of 2000, and first referred as Renault Z12.', 66, 'saida', 'automatic', 85, 'talisman_lrg.jpg', 120, 1, 1, 4, 4, 'available'),
(30, 'Nissan-Kicks', 'The Nissan Kicks is a subcompact crossover SUV produced by Nissan since 2016. The crossover was initially introduced as a concept car under the same name and was premiered at the 2014 São Paulo International Motor Show. ', 62, 'nabatieh', 'automatic', 65, 'kicks_lrg.jpg', 2016, 1, 1, 5, 4, 'available'),
(31, 'Nissan-x-trail', 'The Nissan X-Trail (Japanese: 日産・エクストレイル, Hepburn: Nissan Ekusutoreiru) is a compact crossover SUV (C-segment) produced by the Japanese automaker Nissan since 2000.', 62, 'beirut', 'automatic', 100, 'x_trail_lrg.jpg', 2018, 1, 1, 5, 4, 'available'),
(32, 'honda-CRV', 'The Honda CR-V is a compact crossover SUV manufactured by the Japanese automaker Honda since 1996 and introduced in the North American market in 1997.[1][2] It uses the Civic platform with an SUV body design.', 70, 'nabatieh', 'automatic', 64, 'cr-v_lrg.jpg', 2015, 1, 1, 5, 4, 'available'),
(33, 'Mercedes-Vito9', 'Mercedes Benz Vito 9 seats 4WD automatic transmission. We picked up our car at the Egilsstadir airport. Their service was excellent. I can say that they are great! I met their staff at the Reykjavik domestic airport. The staff was professional, friendly and nice. During my trip, I was once stucked in the snow. ', 67, 'nabatieh', 'automatic', 200, 'vito_lrg.jpg', 2014, 1, 1, 9, 4, 'available'),
(34, 'Mitsubishi-Pajero', 'Mitsubishi Pajero 2012 is a fourth generation four-wheel drive or rear-wheel drive SUV. The engine is located longitudinally at the front of the body. The five-door model has five seats in the cabin. A description of the dimensions, technical characteristics and equipment of the car will help you get a more complete picture of it.\r\n\r\n', 68, 'sour', 'automatic', 60, 'pajero_4_doors_lrg.jpg', 2012, 1, 1, 5, 4, 'available'),
(35, 'Mini-Cooper', 'The Mini Cooper has 1 Petrol Engine on offer. The Petrol engine is 1598 cc . It is available with Automatic transmission.Depending upon the variant and fuel type the Cooper has a mileage of 13.6 to 15.6 kmpl', 65, 'beirut', 'automatic', 30, 'cooper_lrg.jpg', 2013, 1, 1, 4, 2, 'available'),
(36, 'Toyota-Prado', 'The Toyota Land Cruiser Prado (Japanese: トヨタ・ランドクルーザー プラド, Hepburn: Toyota Rando-Kurūzā Purado) is a full-size four-wheel drive vehicle in the Land Cruiser range produced by the Japanese automaker Toyota.', 63, 'beirut', 'automatic', 140, 'prado_lrg.jpg', 2017, 1, 1, 7, 4, 'available'),
(37, 'A-class', 'The A-Class certainly follows the original Mercedes size-classing scheme; this entry-level Baby Benz introduced in 1997 is a compact front-driver that might have been unrecognizable to Americans as a Mercedes when it was first introduced.', 67, 'beirut', 'automatic', 90, 'a_class_lrg.jpg', 2019, 0, 0, 5, 4, 'available'),
(38, 'C-class', 'The C-Class certainly follows the original Mercedes size-classing scheme; this entry-level Baby Benz introduced in 1997 is a compact front-driver that might have been unrecognizable to Americans as a Mercedes when it was first introduced.', 67, 'beirut', 'automatic', 160, 'c_class_lrg.jpg', 2020, 0, 0, 4, 4, 'available'),
(39, 'Rang-Rover', 'Rang Rover Overview For half a century, Land Rover has been the most prestigious marque in the sport utility world. Land Rover introduced the concept of offering up military-grade off-road capabilities for public use.', 69, 'beirut', 'manual', 190, 'range_rover_lrg.jpg', 2016, 1, 1, 5, 4, 'available'),
(40, 'Rover-Discovery', 'The Discovery has considerable off-road prowess, but on the highway it has never lived up to its upmarket cachet. The steering is imprecise, and the ride is stiff and choppy.', 69, 'beirut', 'automatic', 45, 'discovery_lrg.jpg', 2005, 0, 1, 5, 4, 'available'),
(41, 'Audi-Q8', 'Audi Q8 2018 Audi Q8 (4M) 2018 is a K3 class crossover. For the first time the world saw a version of the second this car on June 5, 2018, in the city of Shenzhen.', 73, 'beirut', 'automatic', 60, 'audiQ8.jpg', 2018, 1, 1, 4, 4, 'available'),
(42, 'Audi-Q5', 'Audi Q5 2014 Audi Q5 (4M) 2014 is a K3 class crossover. For the first time the world saw a version of the second this car on June 5, 2014, in the city of Shenzhen.', 73, 'saida', 'automatic', 47.5, 'audi.jpg', 2014, 1, 1, 5, 4, 'available'),
(43, 'Audi-a6', 'The Audi A6 is an executive car made by the German automaker Audi. Now in its fifth generation, the successor to the Audi 100 is manufactured in Neckarsulm, Germany, and is available in saloon and estate configurations, the latter marketed by Audi as the Avant.', 73, 'beirut', 'automatic', 80, 'a6_lrg.jpg', 2018, 1, 1, 5, 4, 'available'),
(44, 'BMW-x4', ' BMW X4 M40i in beautiful Long Beach Blue. This car is super fun to drive and has some great features including heads up display, heated seats, seat memory, thigh extender, Harman Kardon sound, lane assist, adaptive cruise control, and automatic sunroof to name a few.', 75, 'beirut', 'manual', 50, 'x4_lrg.jpg', 2015, 1, 1, 5, 4, 'available'),
(45, 'BMW-x1', 'The BMW X1 is powered by a petrol and diesel engine. Firstly, a 1,998cc in-line four-cylinder turbocharged petrol motor makes 189bhp and 280Nm of torque. Secondly, there is a 1,995cc in-line four-cylinder turbocharged diesel that can produce 188bhp and 400Nm of torque.', 75, 'beirut', 'automatic', 120, 'x1_lrg.jpg', 2020, 0, 0, 5, 4, 'available'),
(47, 'Kia-Picanto', 'Kia introduced the third generation of its smallest vehicle, the Picanto, at the 2017 Geneva Motor Show. Designed on two continents and developed on the same platform as the Hyundai i10, the Picanto started to look more like a shrunk MPV than a small-segment hatchback. Maybe it wasn\'t the best choice for a family or a pizza-delivery shop, but it could work very well in both situations.', 71, 'nabatieh', 'automatic', 30, 'picanto_5_door_lrg.jpg', 2014, 1, 1, 4, 4, 'available'),
(48, 'Nissan-Micra', 'The Nissan Micra replaced the Japanese-market Nissan Cherry. It was exclusive to Nissan Japanese dealership network Nissan Cherry Store until 1999 when the \"Cherry\" network was combined into Nissan Red Stage until 2003. Until Nissan began selling kei cars in Japan.', 62, 'nabatieh', 'automatic', 36.4, 'micra_lrg.jpg', 2008, 1, 1, 5, 4, 'available'),
(49, 'Kia-Rio', 'The Kia Rio is a subcompact car manufactured by Kia since November 1999 and now in its fourth generation. Body styles have included a three and five-door hatchback and four-door sedan, equipped with inline-four gasoline and diesel engines, and front-wheel drive.', 71, 'nabatieh', 'manual', 40, 'rio_lrg.jpg', 2016, 1, 1, 5, 4, 'available'),
(50, 'hyundai-i10', 'The Hyundai i10 has 2 Petrol Engine and 1 LPG Engine on offer. The Petrol engine is 1086 cc and 1197 cc while the LPG engine is 1086 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the i10 has a mileage of 16.95 to 20.36 kmpl & Ground clearance of i10 is 165mm.', 64, 'nabatieh', 'automatic', 32, 'i10_lrg.jpg', 2013, 1, 1, 4, 4, 'available'),
(51, 'Kia-optima', 'This 2019 Kia Optima SX is proudly offered by ST. GEORGE AUTO The Optima SX is well maintained and has just 18,560mi. This low amount of miles makes this vehicle incomparable to the competition. ', 71, 'nabatieh', 'automatic', 80, 'optima_lrg.jpg', 2019, 1, 1, 5, 4, 'available'),
(52, 'Honda-Accord', 'The Honda Accord (Japanese: ホンダ・アコード, Hepburn: Honda Akōdo, / əˈkɔːrd /), also known as the Honda Inspire (Japanese: ホンダ・インスパイア, Hepburn: Honda Insupaia) in Japan and China for certain generations, are a series of automobiles manufactured by Honda since 1976, best known for its four-door sedan variant, which has been one of the best-selling cars in the United States since 1989.', 70, 'nabatieh', 'automatic', 53, 'accord_lrg.jpg', 2010, 1, 1, 5, 4, 'available'),
(53, 'Renault-talisman', 'The Renault Talisman is a concept executive car designed after the 1995 Renault Initiale Paris Concept line by Renault chief designer Patrick Le Quément, and it was presented at the Frankfurt Motor Show in September 2001. The first sketches were drawn in the beginning of 2000, and first referred as Renault Z12.', 66, 'nabatieh', 'automatic', 85, 'talisman_lrg.jpg', 120, 1, 1, 4, 4, 'available'),
(54, 'Rover-Discovery', 'The Discovery has considerable off-road prowess, but on the highway it has never lived up to its upmarket cachet. The steering is imprecise, and the ride is stiff and choppy.', 69, 'sour', 'automatic', 45, 'discovery_lrg.jpg', 2005, 0, 1, 5, 4, 'available'),
(55, 'A-class', 'The A-Class certainly follows the original Mercedes size-classing scheme; this entry-level Baby Benz introduced in 1997 is a compact front-driver that might have been unrecognizable to Americans as a Mercedes when it was first introduced.', 67, 'sour', 'automatic', 90, 'a_class_lrg.jpg', 2019, 0, 0, 5, 4, 'available'),
(56, 'Honda-Accord', 'The Honda Accord (Japanese: ホンダ・アコード, Hepburn: Honda Akōdo, / əˈkɔːrd /), also known as the Honda Inspire (Japanese: ホンダ・インスパイア, Hepburn: Honda Insupaia) in Japan and China for certain generations, are a series of automobiles manufactured by Honda since 1976, best known for its four-door sedan variant, which has been one of the best-selling cars in the United States since 1989.', 70, 'sour', 'automatic', 53, 'accord_lrg.jpg', 2010, 1, 1, 5, 4, 'available'),
(57, 'Renault-talisman', 'The Renault Talisman is a concept executive car designed after the 1995 Renault Initiale Paris Concept line by Renault chief designer Patrick Le Quément, and it was presented at the Frankfurt Motor Show in September 2001. The first sketches were drawn in the beginning of 2000, and first referred as Renault Z12.', 66, 'sour', 'automatic', 85, 'talisman_lrg.jpg', 120, 1, 1, 4, 4, 'available'),
(58, 'Nissan-Micra', 'The Nissan Micra replaced the Japanese-market Nissan Cherry. It was exclusive to Nissan Japanese dealership network Nissan Cherry Store until 1999 when the \"Cherry\" network was combined into Nissan Red Stage until 2003. Until Nissan began selling kei cars in Japan.', 62, 'saida', 'automatic', 36.4, 'micra_lrg.jpg', 2008, 1, 1, 5, 4, 'available'),
(59, 'Nissan-Micra', 'The Nissan Micra replaced the Japanese-market Nissan Cherry. It was exclusive to Nissan Japanese dealership network Nissan Cherry Store until 1999 when the \"Cherry\" network was combined into Nissan Red Stage until 2003. Until Nissan began selling kei cars in Japan.', 62, 'saida', 'automatic', 36.4, 'micra_lrg.jpg', 2008, 1, 1, 5, 4, 'available'),
(60, 'Nissan-Sunny', 'The Nissan Sunny (Japanese: 日産・サニー, Hepburn: Nissan Sanī) is an automobile built by the Japanese automaker Nissan from 1966 to 2006. In the early 1980s, the brand changed from Datsun to Nissan in line with other models by the company. Although production of the Sunny in Japan ended in 2006, the name remains in use in China and GCC countries for a rebadged version of the Nissan Almera.', 62, 'saida', 'automatic', 60, 'nissan sunny.png', 2009, 0, 1, 5, 4, 'available'),
(61, 'Toyota-Prado', 'The Toyota Land Cruiser Prado (Japanese: トヨタ・ランドクルーザー プラド, Hepburn: Toyota Rando-Kurūzā Purado) is a full-size four-wheel drive vehicle in the Land Cruiser range produced by the Japanese automaker Toyota.', 63, 'saida', 'automatic', 140, 'prado_lrg.jpg', 2017, 1, 1, 7, 4, 'available'),
(62, 'Mini-Cooper', 'The Mini Cooper has 1 Petrol Engine on offer. The Petrol engine is 1598 cc . It is available with Automatic transmission.Depending upon the variant and fuel type the Cooper has a mileage of 13.6 to 15.6 kmpl', 65, 'saida', 'automatic', 30, 'cooper_lrg.jpg', 2013, 1, 1, 4, 2, 'available'),
(63, 'Kia-Rio', 'The Kia Rio is a subcompact car manufactured by Kia since November 1999 and now in its fourth generation. Body styles have included a three and five-door hatchback and four-door sedan, equipped with inline-four gasoline and diesel engines, and front-wheel drive.', 71, 'saida', 'automatic', 53, '5f07c417-437c-467b-a823-a3576be66fe1.webp', 2017, 1, 1, 4, 4, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` int(11) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `reply` longtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('unread','read') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `text` longtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('canceled','confirmed','pending') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblfeedback`
--

INSERT INTO `tblfeedback` (`id`, `userId`, `UserName`, `text`, `PostingDate`, `status`) VALUES
(29, 27, 'karim gh', 'best car renting company !', '2022-05-07 15:03:15', 'confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `PageName` varchar(50) NOT NULL,
  `text` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`PageName`, `text`) VALUES
('aboutus', '\r\nWe are a Car renting Company based on beirut since 2008 , And 3 others branshes Nabatieh , Saida , Sour , with 50 employee by 24/24 support and 13 Partners Brands.									\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										'),
('terms', '\r\n1-Due to general laws, each user must have a valid driver\'s license to be able to receive the vehicle while arriving on time.\r\n2-Payment is made at the booking center during the pickup process.\r\n3-If the customer does not comply with the specified time, the reservation will be canceled after 15 minutes.\r\n4-The customer has the right to edit or cancel the reservation before the start of the date only.\r\n5-In the event that the customer needs to cancel the reservation after the start of the appointment, he must review the company to implement the request and obtain the refund.\r\n6-Any malfunction that occurs to the car during the reservation is at the customer\'s responsibility. \r\n\r\n\r\n\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) NOT NULL,
  `EmailId` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `ContactNo` char(11) NOT NULL,
  `Driving License` varchar(100) NOT NULL,
  `status` enum('verified','unverified') NOT NULL DEFAULT 'unverified'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `Driving License`, `status`) VALUES
(27, 'karim gh', 'karim@gmail.com', 'karim123', '70123456', 'driverlisence.jpg', 'verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`,`carId`),
  ADD KEY `carId` (`carId`);

--
-- Indexes for table `tblbrands`
--
ALTER TABLE `tblbrands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `tblcars`
--
ALTER TABLE `tblcars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `id_3` (`id`),
  ADD KEY `brand` (`brand`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`PageName`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `EmailId` (`EmailId`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblbrands`
--
ALTER TABLE `tblbrands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tblcars`
--
ALTER TABLE `tblcars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD CONSTRAINT `tblbooking_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `tblusers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblbooking_ibfk_2` FOREIGN KEY (`carId`) REFERENCES `tblcars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblcars`
--
ALTER TABLE `tblcars`
  ADD CONSTRAINT `tblcars_ibfk_1` FOREIGN KEY (`brand`) REFERENCES `tblbrands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD CONSTRAINT `tblcontact_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `tblusers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD CONSTRAINT `tblfeedback_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `tblusers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
