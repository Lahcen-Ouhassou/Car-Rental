-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2024 at 03:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2024-06-01 14:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Audi', '2024-05-03 14:26:07', NULL),
(2, 'Ronger Rover ', '2024-05-03 14:26:45', NULL),
(3, 'BMW ', '2024-05-03 14:27:11', NULL),
(4, 'Mercedes-Benz', '2024-05-03 14:27:32', NULL),
(5, 'Volkswagen', '2024-05-03 14:27:42', NULL),
(6, 'Toyota', '2024-05-03 14:27:50', NULL),
(7, 'Skoda', '2024-05-03 14:28:00', NULL),
(8, 'Jeep', '2024-05-03 14:28:14', NULL),
(9, 'Opel', '2024-05-03 14:28:31', NULL),
(10, 'Hyundai', '2024-05-03 14:29:14', NULL),
(11, 'Nissan', '2024-05-03 14:29:38', NULL),
(12, 'Kia', '2024-05-03 14:30:02', '0000-00-00 00:00:00'),
(13, 'Ford', '2024-05-03 14:30:46', NULL),
(14, 'Fiat', '2024-05-03 14:31:01', NULL),
(15, 'ALFA-ROMEO', '2024-07-27 18:53:40', NULL),
(16, 'DACIA', '2024-07-27 19:38:49', NULL),
(17, 'PORSCHE', '2024-07-28 23:41:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `carsTitle` varchar(150) DEFAULT NULL,
  `carsBrand` varchar(120) DEFAULT NULL,
  `carsOverview` longtext DEFAULT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Cimage1` varchar(120) DEFAULT NULL,
  `Cimage2` varchar(120) DEFAULT NULL,
  `Cimage3` varchar(120) DEFAULT NULL,
  `Cimage4` varchar(120) DEFAULT NULL,
  `Cimage5` varchar(120) DEFAULT NULL,
  `AirConditioner` int(11) DEFAULT NULL,
  `PowerDoorLocks` int(11) DEFAULT NULL,
  `AntiLockBrakingSystem` int(11) DEFAULT NULL,
  `BrakeAssist` int(11) DEFAULT NULL,
  `PowerSteering` int(11) DEFAULT NULL,
  `DriverAirbag` int(11) DEFAULT NULL,
  `PassengerAirbag` int(11) DEFAULT NULL,
  `PowerWindows` int(11) DEFAULT NULL,
  `CDPlayer` int(11) DEFAULT NULL,
  `CentralLocking` int(11) DEFAULT NULL,
  `CrashSensor` int(11) DEFAULT NULL,
  `LeatherSeats` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Btv` varchar(120) DEFAULT NULL,
  `consumption` varchar(100) DEFAULT NULL,
  `colorC` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `carsTitle`, `carsBrand`, `carsOverview`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Cimage1`, `Cimage2`, `Cimage3`, `Cimage4`, `Cimage5`, `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, `BrakeAssist`, `PowerSteering`, `DriverAirbag`, `PassengerAirbag`, `PowerWindows`, `CDPlayer`, `CentralLocking`, `CrashSensor`, `LeatherSeats`, `RegDate`, `UpdationDate`, `Btv`, `consumption`, `colorC`) VALUES
(1, 'CLASSE C', '4', 'The Mercedes-Benz C-Class, introduced in 1993, is a line of compact executive cars known for its luxury, performance, and advanced technology. The latest generation, the W206, features a sleek design, high-quality interior, and cutting-edge tech like the MBUX system. Engine options range from efficient four-cylinders to powerful AMG variants, providing a dynamic driving experience. Competing with the BMW 3 Series and Audi A4, the C-Class stands out for its blend of elegance and innovation, making it a popular choice in its segment.', 600, 'Diesel', 2024, 5, 'mercedes-classec-359724_.png', 'mercedes-classec-621340_.jpg', 'mercedes-classec-200745_.jpg', 'mercedes-classec-409301_.jpg', 'mercedes-classec-641876_.jpeg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, '2024-07-27 18:42:34', NULL, 'Automatic', '4.3 L/100 km', 'Gray'),
(2, 'GLC', '4', 'The Mercedes-Benz GLC is a luxury compact SUV introduced in 2015 as the successor to the GLK-Class. Known for its sleek design, high-quality interior, and advanced technology, the GLC offers features like the MBUX infotainment system and a range of efficient engines, including powerful AMG variants. It provides a smooth, agile driving experience with a host of safety features. Competing with the BMW X3 and Audi Q5, the GLC is a popular choice for those seeking a premium and versatile SUV.', 700, 'Diesel', 2023, 5, 'mercedes-glc-294393_.jpg', 'mercedes-glc-454775_.jpg', 'mercedes-glc-482521_.jpg', 'mercedes-glc-668563_.jpg', 'mercedes-glc-620371_.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, '2024-07-27 18:48:11', NULL, 'Automatic', '5.3 L/100 km', 'Gray'),
(3, 'CLASSE A', '4', 'The Mercedes-Benz A-Class is a compact luxury car introduced in 1997, known for its sleek design, premium interior, and advanced technology. The latest generation, launched in 2018, features the MBUX infotainment system, a digital cockpit, and various driver assistance systems. Offering a range of efficient engines, including AMG variants, the A-Class delivers agile handling and a dynamic driving experience. Competing with the Audi A3 and BMW 1 Series, it is a popular choice for those seeking a stylish and tech-savvy compact car.', 550, 'Petrol', 2018, 5, '-mercedes-classea-303303_.jpg', 'mercedes-classea-485477_.jpg', 'mercedes-classea-811554_.jpg', 'mercedes-classea-736475_.jpg', '-mercedes-classea-323865_.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, '2024-07-27 18:52:14', '2024-07-27 19:18:21', 'Automatic', '5.2 L/100 km', 'White'),
(4, 'TONALE', '15', 'The Alfa Romeo Tonale is a compact luxury crossover SUV that merges Italian design heritage with modern technology and performance. Initially unveiled as a concept in 2019 and launched as a production model in 2022, the Tonale embodies Alfa Romeo\'s distinctive styling cues with its sleek lines, bold grille, and athletic stance. Inside, it offers a premium cabin with high-quality materials and advanced infotainment systems, including a digital cockpit and touch-screen displays. Expected to feature hybrid powertrains for a blend of efficiency and performance, the Tonale aims to attract buyers seeking a stylish and dynamic vehicle in the competitive compact luxury crossover segment.', 660, 'Hybrid', 2024, 5, '-alfa-romeo-tonale-515145_.jpg', '-alfa-romeo-tonale-994589_.jpg', 'alfa-romeo-tonale-324746_.jpg', 'alfa-romeo-tonale-176231_.jpg', '', 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, 0, '2024-07-27 18:56:40', '2024-07-27 19:18:26', 'Automatic', ' 6.2 L/100 km', 'Green'),
(5, '4C', '15', 'The Alfa Romeo 4C is a lightweight sports car introduced in 2013, embodying Italian craftsmanship and performance. Featuring a carbon fiber monocoque chassis and aggressive styling, it boasts a mid-engine layout for optimal balance and handling. Inside, the 4C offers a minimalist interior focused on the driving experience, with lightweight materials and essential amenities. Powered by a turbocharged four-cylinder engine, it delivers exhilarating performance with sharp handling, making it a choice for enthusiasts seeking pure driving excitement in the niche sports car market.', 560, 'Petrol', 2015, 5, '-155769.jpg', 'a-400943.jpg', '143217.jpg', 'ma-735652.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, '2024-07-27 18:59:35', '2024-07-27 19:18:34', 'Automatic', '6.8 l/100 km', 'Red'),
(6, 'STELVIO', '15', 'The Alfa Romeo Stelvio is a luxury compact crossover SUV introduced in 2016, named after the iconic Stelvio Pass in the Italian Alps. Known for its sleek Italian design featuring Alfa Romeo\'s distinctive grille and sporty proportions, the Stelvio offers a premium interior with high-quality materials, advanced infotainment options, and a range of powerful engine choices, including turbocharged four-cylinder and V6 variants. Its agile handling and responsive steering cater to drivers seeking both performance and practicality in the competitive luxury SUV segment, positioning the Stelvio as a stylish and dynamic choice among its peers.', 550, 'Diesel', 2017, 5, 'moteur.ma-177606.jpg', 'moteur.ma-128245.jpg', 'moteur.ma-825004.jpg', 'moteur.ma-826767.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, '2024-07-27 19:02:14', NULL, 'Automatic', '5.7 L/100 km', 'Red'),
(7, 'MOKKA', '9', 'he Opel Mokka is a subcompact crossover SUV introduced in 2012, designed for urban versatility and practicality. Featuring Opel\'s distinctive styling cues, including a bold grille and sleek lines, the Mokka offers a comfortable interior with flexible seating and modern infotainment options. Engine choices typically include efficient gasoline and diesel options, delivering responsive performance suitable for city driving and occasional off-road adventures. Positioned in the competitive subcompact SUV segment, the Mokka appeals to buyers seeking a compact yet capable vehicle that blends efficiency with modern amenities.', 300, 'Diesel', 2020, 5, 'moteur.ma-opel-mokka-509049_.jpg', 'moteur.ma-opel-mokka-338244_.jpg', 'moteur.ma-opel-mokka-103946_.jpg', 'moteur.ma-opel-mokka-746357_.jpg', '', 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, '2024-07-27 19:19:46', NULL, 'Manual', '3.8L/100 km', 'White'),
(8, 'CORSA', '9', 'The Opel Corsa, introduced by Opel in 1982, is a compact and versatile supermini renowned for its practicality and efficient performance. Featuring a stylish exterior design tailored for urban environments, the Corsa offers a comfortable interior with modern amenities and customizable options to suit diverse preferences. Engine choices typically include efficient gasoline and diesel options, emphasizing fuel economy without compromising on responsive driving dynamics. Competing in the competitive supermini segment against models like the Ford Fiesta and Volkswagen Polo, the Corsa remains a popular choice for its affordability, reliability, and broad appeal to various demographics and lifestyles.', 330, 'Diesel', 2020, 5, 'moteur.ma-opel-newcorsa-716053_.jpg', 'moteur.ma-opel-newcorsa-257425_.jpg', 'moteur.ma-opel-newcorsa-324421_.jpg', 'moteur.ma-opel-newcorsa-380187_.jpg', 'moteur.ma-opel-newcorsa-802711_.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, '2024-07-27 19:24:27', NULL, 'Manual', '3.8L/100 km', 'Red'),
(9, 'X4', '3', 'The BMW X4 is a luxury compact crossover SUV that debuted in 2014, distinguished by its coupe-like roofline and dynamic styling that blends SUV practicality with sporty aesthetics. Inside, it offers a premium interior with high-quality materials, advanced infotainment systems, and driver assistance features for enhanced convenience and safety. Engine options typically include powerful turbocharged gasoline and diesel engines, paired with BMW\'s xDrive all-wheel-drive system for responsive handling and performance. Competing in the luxury crossover segment against models like the Mercedes-Benz GLC Coupe and Audi Q5 Sportback, the X4 appeals to buyers seeking a combination of stylish design, athletic driving dynamics, and practicality in a compact SUV.', 400, 'Diesel', 2024, 5, 'moteur.ma-bmw-x4-456076_.jpg', 'moteur.ma-bmw-x4-498932_.jpg', 'moteur.ma-bmw-x4-192787_.jpg', 'moteur.ma-bmw-x4-948129_.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, '2024-07-27 19:28:08', NULL, 'Automatic', '5.9 L/100 km', 'Silver'),
(10, 'SERIE 5', '3', '\r\nThe BMW 5 Series is a renowned mid-size luxury sedan that debuted in 1972 and has since set benchmarks in its class for performance, comfort, and technology. Known for its elegant design featuring BMW\'s iconic kidney grille and sleek lines, the 5 Series offers a plush interior with premium materials and advanced infotainment systems like BMW\'s iDrive. Engine options range from efficient hybrids to powerful turbocharged models, ensuring a dynamic driving experience complemented by precise handling and a range of cutting-edge safety features. Competing with models like the Mercedes-Benz E-Class and Audi A6, the 5 Series continues to attract buyers seeking executive refinement and driving excellence in a mid-size luxury sedan.', 350, 'Hybrid', 2022, 5, 'moteur.ma-bmw-serie5-348497_.jpg', 'moteur.ma-bmw-serie5-982671_.jpg', 'moteur.ma-bmw-serie5-289614_.jpg', 'moteur.ma-bmw-serie5-291837_.jpg', 'moteur.ma-bmw-serie5-459826_.jpg', 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, '2024-07-27 19:35:34', NULL, 'Automatic', '1.7 L/100 km', 'Blue'),
(11, 'SANDERO', '16', 'The Dacia Sandero, introduced in 2007 by the Romanian automaker Dacia, stands out as a subcompact hatchback prized for its affordability and practicality. Featuring a straightforward design and durable interior materials, the Sandero prioritizes functionality and cost-effectiveness. It typically offers basic infotainment and safety features alongside a range of efficient gasoline and diesel engine options, making it suitable for urban driving and daily commuting. Competing in the subcompact hatchback segment, the Sandero appeals to budget-conscious buyers seeking reliable transportation without unnecessary frills, maintaining its popularity for its simplicity and value.', 250, 'Diesel', 2022, 5, 'moteur.ma-dacia-sanderostreetway-619120_.jpg', 'moteur.ma-dacia-sanderostreetway-934001_.jpeg', 'moteur.ma-dacia-sanderostreetway-157562_.jpeg', 'moteur.ma-dacia-sanderostreetway-118549_.jpeg', 'moteur.ma-dacia-sanderostreetway-533450_.jpeg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, '2024-07-27 19:40:40', NULL, 'Manual', '5.5 L/100 km', 'Blue'),
(12, ' DUSTER', '16', 'The Dacia Duster, introduced in 2010 by Dacia, is a compact SUV renowned for its rugged design and practicality at an affordable price point. Featuring a robust exterior with a muscular stance, the Duster combines off-road capability with everyday usability, making it suitable for various driving conditions from city streets to rough terrain. Inside, it offers a spacious cabin with durable materials and functional features designed for comfort and versatility. Engine options typically include efficient gasoline and diesel variants, complemented by available all-wheel-drive systems for enhanced traction and stability. Competing in the competitive compact SUV segment, the Duster\'s popularity stems from its affordability, reliability, and capability, appealing to budget-conscious buyers seeking a reliable and versatile vehicle for both urban and adventurous use.', 220, 'Diesel', 2018, 5, 'DACIA-Duster-2022-Neuve-Maroc-05.jpg', 'DACIA-Duster-2022-Neuve-Maroc-10.jpg', 'DACIA-Duster-2022-Neuve-Maroc-07.jpg', 'DACIA-Duster-2022-Neuve-Maroc-09.jpg', 'DACIA-Duster-2022-Neuve-Maroc-06.jpg', 1, 1, 1, 1, 0, 1, 1, 1, 1, 0, 0, 1, '2024-07-27 19:48:22', NULL, 'Manual', '5.1 L/100 km', 'Orange'),
(13, 'A3 SPORTBACK ', '1', 'The Audi A3 Sportback, first introduced in 1996, is a premium compact hatchback known for its stylish design, advanced technology, and dynamic performance. Featuring Audi\'s modern design language with a distinctive front grille and sharp lines, the A3 Sportback offers a high-quality interior equipped with luxurious materials, ergonomic seating, and advanced infotainment systems like the Virtual Cockpit and MMI touch interface. Available with a range of efficient and powerful engines, including turbocharged and hybrid options, it delivers agile handling and responsive performance. Competing with models like the BMW 1 Series and Mercedes-Benz A-Class, the A3 Sportback appeals to buyers seeking a blend of luxury, practicality, and engaging driving dynamics in the premium compact segment.', 400, 'Diesel', 2024, 5, 'moteur.ma-audi-a3-642006_.jpg', 'moteur.ma-audi-a3-619054_.jpg', 'moteur.ma-audi-a3-134084_.jpg', 'moteur.ma-audi-a3-312691_.jpg', 'moteur.ma-audi-a3-727361_.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, '2024-07-27 19:51:36', NULL, 'Manual', ' 3.9 L/100 km', 'Blue'),
(14, 'A5 COUPE', '1', 'The Audi A5 Coupe, introduced in 2007, is a luxury compact coupe celebrated for its sleek design and refined performance. With its aerodynamic lines and signature Singleframe grille, the A5 Coupe offers a sophisticated exterior, while the interior boasts high-quality materials, advanced infotainment systems like the MMI touch interface, and Audi\'s Virtual Cockpit. Engine options range from efficient turbocharged units to high-performance variants in the S5 and RS5 models. Known for its precise handling and available quattro all-wheel drive, the A5 Coupe provides an engaging driving experience. Competing with the BMW 4 Series and Mercedes-Benz C-Class Coupe, the A5 Coupe is a top choice for those seeking a blend of luxury, style, and dynamic performance in a compact coupe.', 550, 'Diesel', 2024, 5, 'moteur.ma-audi-a5coupe-432089_.jpg', 'moteur.ma-audi-a5coupe-778684_.jpg', 'moteur.ma-audi-a5coupe-312559_.jpg', 'moteur.ma-audi-a5coupe-850406_.jpg', 'moteur.ma-audi-a5coupe-216631_.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, '2024-07-27 19:55:01', NULL, 'Automatic', '4.5 L/100 km', 'Green'),
(15, 'Q8', '1', 'The Audi Q8, introduced in 2018, is a luxury SUV that blends the elegance of a coupe with the practicality of an SUV. Its bold design features a distinctive Singleframe grille, muscular stance, and coupe-like roofline. Inside, the Q8 offers a spacious, high-quality interior with advanced technology, including the MMI touch response system and Virtual Cockpit. Available with powerful engines, including turbocharged V6 and V8 options, the Q8 delivers dynamic performance complemented by adaptive air suspension and quattro all-wheel drive. Competing with the BMW X6 and Mercedes-Benz GLE Coupe, the Q8 is favored for its sophisticated design, cutting-edge technology, and versatile performance.', 600, 'Diesel', 2024, 5, 'moteur.ma-audi-q8-110295_.jpg', 'moteur.ma-audi-q8-768821_.jpg', 'moteur.ma-audi-q8-683571_.jpg', 'Capture d\'écran 2024-07-27 235102.png', 'Capture d\'écran 2024-07-27 235835.png', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, '2024-07-27 22:59:05', NULL, 'Automatic', '7.1 L/100 km', 'Orange'),
(16, 'OCTAVIA', '7', 'The Škoda Octavia, first introduced in 1996, is a compact car celebrated for its spaciousness, practicality, and value for money. Featuring a modern and functional design, the Octavia is available in both sedan and wagon body styles, offering a roomy interior with high-quality materials and advanced infotainment systems. It comes with a variety of efficient and powerful engines, including gasoline, diesel, and hybrid options, delivering a balanced and comfortable driving experience. Competing with models like the Volkswagen Golf and Ford Focus, the Octavia is popular among families and individuals for its practicality, reliability, and affordability.', 300, 'Diesel', 2023, 5, 'moteur.ma-skoda-octavia-625454_.jpg', 'moteur.ma-skoda-octavia-810577_.jpg', 'moteur.ma-skoda-octavia-328785_.jpg', 'moteur.ma-skoda-octavia-480500_.jpg', 'moteur.ma-skoda-octavia-190236_.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, '2024-07-28 22:45:58', NULL, 'Automatic', '5 L/100 km', 'Blue'),
(17, 'KODIAQ', '7', 'The Škoda Kodiaq, introduced in 2016, is a mid-size SUV that combines a robust design with practicality and advanced technology. It features a spacious and flexible interior with seating for up to seven passengers and high-quality materials. The Kodiaq offers a range of efficient and powerful engines, providing a smooth and comfortable driving experience on various terrains. Equipped with advanced infotainment and driver assistance systems, it enhances safety and convenience. Competing with models like the Volkswagen Tiguan and Honda CR-V, the Kodiaq is popular among families and adventure seekers for its versatility, practicality, and value for money.', 340, 'Diesel', 2022, 5, 'moteur.ma-skoda-kodiaq-494684_.jpg', 'moteur.ma-skoda-kodiaq-724733_.jpg', 'moteur.ma-skoda-kodiaq-326274_.png', 'moteur.ma-skoda-kodiaq-863496_.jpg', 'moteur.ma-skoda-kodiaq-270746_.png', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, '2024-07-28 23:21:33', NULL, 'Automatic', '5.2 L/100 km', 'Silver'),
(18, 'GRAND CHEROKEE', '8', 'The Jeep Grand Cherokee, introduced in 1992, is a mid-size SUV renowned for its off-road capability, luxurious interior, and advanced technology. Featuring a distinctive seven-slot grille and muscular design, the Grand Cherokee offers a spacious and high-quality interior with a range of high-tech features. Available with powerful V6 and V8 engines, as well as a plug-in hybrid variant, it delivers both rugged off-road performance and a smooth on-road ride. Competing with models like the Ford Explorer and Toyota 4Runner, the Grand Cherokee remains a top choice for those seeking a blend of luxury, versatility, and capability in an SUV.', 350, 'Diesel', 2021, 5, 'Jeep-Grand-Cherokee-2014-Neuve-Maroc-07.jpg', 'Jeep-Grand-Cherokee-2014-Neuve-Maroc-08.jpg', 'Jeep-Grand-Cherokee-2014-Neuve-Maroc-05.jpg', 'Jeep-Grand-Cherokee-2014-Neuve-Maroc-10.jpg', 'Jeep-Grand-Cherokee-2014-Neuve-Maroc-06.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, '2024-07-28 23:27:04', NULL, 'Automatic', '7.5 L/100 km', 'Black'),
(19, 'QASHQAI ', '11', 'The Nissan Qashqai, introduced in 2006, is a compact crossover SUV that stands out for its stylish design, practicality, and advanced technology. Featuring a sleek exterior with a distinctive V-motion grille and sharp lines, the Qashqai offers a comfortable and versatile interior with high-quality materials and ample cargo space. It comes with a range of efficient engines, delivering a balance of performance and fuel economy, and includes advanced infotainment and driver assistance systems such as ProPILOT and automatic emergency braking. Competing with models like the Honda CR-V and Toyota RAV4, the Qashqai is a popular choice for urban drivers seeking a stylish, practical, and tech-savvy compact crossover.', 300, 'Electricity', 2023, 5, 'moteur.ma-nissan-qashqaie-power-557734_.jpg', 'moteur.ma-nissan-qashqaie-power-322041_.jpg', 'moteur.ma-nissan-qashqaie-power-651325_.jpg', 'moteur.ma-nissan-qashqaie-power-878360_.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, '2024-07-28 23:33:58', NULL, 'Automatic', '4.7 L/100 km', 'Blue'),
(20, 'MACAN', '17', 'The Porsche Macan, introduced in 2014, is a luxury compact SUV that combines the high performance and sporty handling typical of Porsche with the practicality of an SUV. With its sleek design, luxurious interior, and advanced technology, the Macan offers a driver-focused experience with high-quality materials and a sophisticated infotainment system. Available with powerful turbocharged engines, the Macan delivers exceptional performance and agility, making it a standout in the luxury compact SUV segment. Competing with models like the BMW X3 and Mercedes-Benz GLC, the Macan is favored for its unique blend of Porsche\'s driving dynamics and everyday practicality.', 700, 'Petrol', 2024, 5, 'moteur.ma-porsche-macan-279843_.png', 'moteur.ma-porsche-macan-813690_.jpg', 'moteur.ma-porsche-macan-286926_.jpg', 'moteur.ma-porsche-macan-813575_.jpg', 'moteur.ma-porsche-macan-977178_.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2024-07-28 23:45:16', NULL, 'Automatic', ' 7L100 km', 'Blue'),
(21, 'GOLF 8', '5', 'The Volkswagen Golf 8, introduced in 2019, is a compact hatchback renowned for its practicality, refined design, and advanced technology. Featuring a modern and aerodynamic exterior, the Golf 8 offers a spacious and ergonomic interior with high-quality materials and advanced infotainment systems. It is equipped with a range of efficient engine options, including gasoline, diesel, and hybrid variants, delivering responsive performance and fuel efficiency. With its agile handling and comfortable ride, the Golf 8 provides a versatile driving experience suitable for various road conditions. Competing in the compact hatchback segment, it remains a top choice for drivers seeking a blend of reliability, style, and cutting-edge technology in a compact car.', 500, 'Diesel', 2024, 5, 'moteur.ma-volkswagen-golf8-470527_.jpg', 'moteur.ma-volkswagen-golf8-444246_.jpg', 'moteur.ma-volkswagen-golf8-552120_.jpg', 'moteur.ma-volkswagen-golf8-409418_.jpg', 'moteur.ma-volkswagen-golf8-841005_.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, '2024-07-28 23:49:18', NULL, 'Automatic', ' 5.4 L/100 km', 'Silver'),
(22, 'TOUAREG', '5', 'The Volkswagen Touareg, introduced in 2002, is a mid-size luxury SUV that excels in comfort, advanced technology, and robust performance. With its modern design, spacious interior, and premium materials, the Touareg offers a luxurious driving experience for up to five passengers, complemented by advanced infotainment and driver assistance features. Available with a variety of powerful engine options, including hybrid variants, the Touareg delivers strong performance and efficiency while maintaining a refined ride quality. Competing in the competitive mid-size luxury SUV segment, it continues to attract buyers looking for a blend of luxury, versatility, and cutting-edge technology in a reliable and capable vehicle.', 650, 'Diesel', 2023, 5, 'moteur.ma-volkswagen-touareg-416368_.jpg', 'moteur.ma-volkswagen-touareg-841303_.jpg', 'moteur.ma-volkswagen-touareg-573351_.jpg', 'moteur.ma-volkswagen-touareg-101639_.jpg', '', 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 0, '2024-07-28 23:54:00', NULL, 'Automatic', '7.3 L/100 km', 'Brown'),
(23, 'SPORT', '2', 'The Range Rover Sport, introduced in 2005, is a luxury mid-size SUV renowned for its blend of off-road capability and high-performance characteristics. Featuring a distinctive design and luxurious interior with premium materials, the Range Rover Sport offers seating for up to five passengers (or optionally seven) and a host of advanced technology features, including dual touchscreen displays and advanced driver assistance systems. Available with a range of powerful engine options, including hybrid variants, the Range Rover Sport delivers impressive performance both on and off the road, supported by adjustable air suspension and advanced terrain response capabilities. Competing in the competitive luxury SUV segment, it remains a symbol of elegance, versatility, and capability.', 700, 'Hybrid', 2024, 5, 'moteur.ma-land-rover-rangeroversport-895101_.png', 'moteur.ma-land-rover-rangeroversport-798015_.jpg', 'moteur.ma-land-rover-rangeroversport-234053_.jpg', 'moteur.ma-land-rover-rangeroversport-414642_.jpg', 'moteur.ma-land-rover-rangeroversport-875925_.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, '2024-07-28 23:57:39', NULL, 'Automatic', '7.4 L/100 km', 'Red'),
(24, ' VELAR ', '2', 'The Range Rover Velar, introduced in 2017, is a luxury mid-size SUV that sets itself apart with avant-garde design, advanced technology, and versatile performance. Its sleek exterior design with flush door handles and a floating roofline exemplifies modern elegance, while inside, the Velar offers a luxurious cabin with premium materials and state-of-the-art infotainment features. Available with a range of powerful engines and incorporating advanced driver assistance systems, it delivers a refined driving experience with capability both on and off the road. Competing in the competitive luxury SUV market, the Velar continues to appeal to buyers seeking a blend of sophistication, technology, and all-terrain capability in a premium vehicle.', 700, 'Diesel', 2019, 5, 'moteur.ma-359959.jpg', 'moteur.ma-602597.jpg', 'moteur.ma-168521.jpg', 'moteur.ma-155580.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, '2024-07-29 00:21:55', NULL, 'Automatic', '5.4 L/100 km', 'Gray');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `PageName`, `type`, `detail`) VALUES
(1, 'Terms and Conditions', 'terms', '																																																																																																																																																																																																																												<p align=\"justify\"><font size=\"2\"><strong><font color=\"#990000\"><br></font></strong></font></p><p align=\"justify\"><font size=\"2\"><strong><font color=\"#990000\">(1) ACCEPTANCE OF TERMSA</font><br></strong></font></p><p align=\"justify\"><span style=\"font-size: small;\"><br></span></p><p align=\"justify\"><span style=\"font-size: medium;\">1<span style=\"font-weight: bold;\">. Booking and confirmations:</span></span></p><p align=\"justify\"><span style=\"font-size: small; font-family: georgia;\">&nbsp;- The renter must provide accurate and correct information during the booking process.</span></p><p align=\"justify\"><span style=\"font-size: small; font-family: georgia;\">&nbsp;- The renter must confirm the reservation and make advance payment for the car insurance.</span></p><p align=\"justify\"><span style=\"font-weight: bold;\"><span style=\"font-size: medium;\">2. Modification of reservation:</span><br></span></p><p align=\"justify\"><span style=\"font-size: small; font-family: georgia;\">&nbsp;- The renter can modify the booking dates or car type with car availability according to company policy.</span></p><p align=\"justify\"><span style=\"font-weight: bold; font-size: medium;\">3. Cancellation Policy:</span></p><p align=\"justify\"><span style=\"font-size: small; font-family: georgia;\">&nbsp;- Cancellation of the reservation is subject to the applicable cancellation terms and policies, which the renter must read carefully before confirming the reservation.</span></p><p align=\"justify\"><span style=\"font-weight: bold; font-size: medium;\">4. Financial terms:</span></p><p align=\"justify\"><span style=\"font-size: small; font-family: georgia;\">&nbsp;- The renter must pay the fees related to the car rental according to the prices specified in the contract.</span></p><p align=\"justify\"><span style=\"font-size: small; font-family: georgia;\">&nbsp;- Additional fees may be charged if returning the car is delayed after the specified date.</span></p><p align=\"justify\"><span style=\"font-weight: bold; font-size: medium;\">5. Insurance:</span></p><p align=\"justify\"><span style=\"font-size: small;\">&nbsp;<span style=\"font-family: georgia;\">- The renter must obtain appropriate insurance for the car before setting off.</span></span></p><p align=\"justify\"><span style=\"font-size: small; font-family: georgia;\">&nbsp;- The renter must bear the full costs of any damage that occurs to the car during the rental period.</span></p><p align=\"justify\"><span style=\"font-weight: bold; font-size: medium;\">6. Proper use of the car:</span></p><p align=\"justify\"><span style=\"font-size: small; font-family: georgia;\">&nbsp;- The renter must use the vehicle in accordance with local and national laws and regulations.</span></p><p align=\"justify\"><span style=\"font-size: small; font-family: georgia;\">&nbsp;- It is prohibited to use the vehicle for illegal or unauthorized purposes.</span></p><p align=\"justify\"><span style=\"font-weight: bold; font-size: medium;\">7. Responsibility:</span></p><p align=\"justify\"><span style=\"font-size: small; font-family: georgia;\">&nbsp;- The company does not bear any responsibility for personal or material damages that occur to the tenant or any other party during the rental period.</span></p><p align=\"justify\"><span style=\"font-weight: bold; font-size: medium;\">8. Delivery and return:</span></p><p align=\"justify\"><span style=\"font-size: small; font-family: georgia;\">&nbsp;- The renter must inspect the vehicle upon delivery and report any damage or defects before departure.</span></p><p align=\"justify\"><span style=\"font-size: small; font-family: georgia;\">&nbsp;- The car must be returned in the same condition in which it was received.</span></p><p align=\"justify\"><span style=\"font-weight: bold; font-size: medium;\">9. Applicble law:</span></p><p align=\"justify\"><span style=\"font-size: small; font-family: georgia;\">&nbsp;- This contract and its terms are subject to the laws of the country in which the rental takes place.</span></p><p align=\"justify\"><span style=\"font-weight: bold; font-size: medium;\">10. Modification of Terms:</span></p><p align=\"justify\"><span style=\"font-family: georgia;\"><span style=\"font-size: small; font-weight: bold;\">&nbsp;</span><span style=\"font-size: small;\">- The Company reserves the right to modify the Terms of Use at any time without prior notice.</span></span></p><p align=\"justify\"><span style=\"font-weight: bold; font-size: medium;\">11.Tardiness and absenteeism:</span></p><p align=\"justify\"><span style=\"font-size: small;\">&nbsp;- The renter must inform the company if he is late or unable to return the car on the specified date.</span></p><p align=\"justify\"><span style=\"font-size: small;\">&nbsp;- Additional fees may apply when returning the car is delayed for more than an agreed upon period.</span></p><p align=\"justify\"><span style=\"font-weight: bold; font-size: medium;\">12. Advertising and marketing:</span></p><p align=\"justify\"><span style=\"font-family: georgia;\"><span style=\"font-size: small; font-weight: bold;\">&nbsp;</span><span style=\"font-size: small;\">- The company has the right to use the tenant\'s information for the purpose of communication and marketing.</span></span></p><p align=\"justify\"><span style=\"font-size: small; font-family: georgia;\">&nbsp;- The tenant can choose not to receive promotional offers via email or SMS.</span></p><p align=\"justify\"><span style=\"font-weight: bold; font-size: medium;\">13. Legal responsibility:</span></p><p align=\"justify\"><span style=\"font-size: small; font-family: georgia;\">&nbsp;- The renter bears responsibility for any traffic violations or accidents that occur during the car rental period.</span></p><p align=\"justify\"><span style=\"font-size: small; font-family: georgia;\">&nbsp;- The renter must provide the necessary assistance in the event of an accident or any problem related to the car.</span></p><p align=\"justify\"><span style=\"font-weight: bold; font-size: medium;\">14. Compensation:</span></p><p align=\"justify\"><span style=\"font-size: small; font-family: georgia;\">&nbsp;- In the event of any damage or loss to the vehicle during the rental period due to the negligence of the renter, the renter shall bear the costs of repair or full compensation.</span></p><p align=\"justify\"><span style=\"font-weight: bold; font-size: medium;\">15. Insurance cancellation:</span></p><p align=\"justify\"><span style=\"font-size: small; font-family: georgia;\">&nbsp;- Insurance may be canceled according to company policy if the vehicle is used in violation of the agreed upon conditions.</span></p><p align=\"justify\"><span style=\"font-weight: bold; font-size: medium;\">16. Additional compensation:</span></p><p align=\"justify\"><span style=\"font-size: small; font-family: georgia;\">&nbsp;- Additional fees may be imposed on the renter if the vehicle is used for unauthorized purposes or if its return is delayed.</span></p><p align=\"justify\"><span style=\"font-weight: bold; font-size: medium;\">17. Periodic examination:</span></p><p align=\"justify\"><span style=\"font-size: small; font-family: georgia;\">&nbsp;- The company has the right to conduct a periodic inspection of the car during the rental period in order to ensure the safety of the car and the safety of the renter.</span></p><p align=\"justify\"><span style=\"font-weight: bold; font-size: medium;\">18. Leasing for commercial purposes:</span></p><p align=\"justify\"><span style=\"font-size: small; font-family: georgia;\">&nbsp;- Additional terms and conditions may apply to rental for commercial purposes, please check with the company.</span></p><p align=\"justify\"><span style=\"font-weight: bold; font-size: medium;\">19. Ownership rights:<br></span></p><p align=\"justify\"><span style=\"font-size: small; font-family: georgia;\">&nbsp;- The lessor retains all intellectual property rights related to the site and the content provided on it.</span></p><p align=\"justify\"><span style=\"font-weight: bold; font-size: medium;\">20. Entire Agreement:</span></p><p align=\"justify\"><span style=\"font-size: small; font-family: georgia;\">&nbsp;- These terms and conditions constitute the entire agreement between the tenant and the lessor and cover all previous agreements and understandings.</span></p><p align=\"justify\" style=\"text-align: center;\"><span style=\"font-size: small;\">______________________________________________________________________________________________________</span></p><p align=\"justify\" style=\"text-align: left;\"><span style=\"font-size: small; font-family: &quot;trebuchet ms&quot;;\">Please note that using our services means you agree to the above terms and conditions. If you have any questions or concerns, please feel free to contact us.</span><br></p>\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										'),
(2, 'Privacy Policy', 'privacy', '																				<div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-weight: bold;\">Privacy Policy</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-weight: bold;\">At CAR RENTAL, we care about protecting the privacy of our website visitors and customers. Please read the following privacy policy carefully to understand how we collect, use and protect the information you provide to us.</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">1. Collect information:</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">&nbsp;- We collect information that you provide to us when you use our website, and this may include name, email, phone number, and payment details.</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">2. Use of information:</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">&nbsp;- We use the information we obtain to provide the services you request and to improve the user experience on the site.</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">&nbsp;- We may use the email you provide to us to contact you about your bookings and our promotions.</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">3. Sharing information:</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">&nbsp;- We do not sell or share your personal information with third parties without your consent, except where legally required to do so.</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">4. Information protection:</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">&nbsp;We take appropriate security measures to protect the personal information we hold, including encryption and access management.</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">5. Links to other websites:</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">&nbsp;Our website may contain links to other websites, and we are not responsible for the privacy practices or content of these sites.</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">6. Privacy Policy Updates:</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">&nbsp;We reserve the right to update or change our Privacy Policy, and we will post any changes on this page.</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">7. Access and correction rights:</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">&nbsp;- You have the right to access and have the personal information we hold about you corrected if it is inaccurate or out of date.</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">8. Tracking Cookies:</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">&nbsp;We may use cookies and other tracking technologies to improve user experience and analyze site usage, and you can manage your cookie settings through your browser.</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">9. Changes to the Privacy Policy:</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">&nbsp;We will post any changes to the Privacy Policy on this page, and any changes will be effective immediately once posted.</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">10. Contact us:</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">&nbsp;- If you have any questions or inquiries about the privacy policy, please contact us via email or by calling us.</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">11. Approval:</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">&nbsp;- By using our website, you agree to the collection and use of your personal information in accordance with this privacy policy.</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">12. Age limits:</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">&nbsp;- Use of our Site must be for persons over the age of eighteen, and we do not collect information from children under the age of eighteen for the purpose of use.</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-weight: bold;\">By using our site, you consent to the collection and use of your personal information in accordance with this Privacy Policy. If you have any questions or concerns about our Privacy Policy, please feel free to contact us.</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-weight: bold;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-weight: bold;\">Please review the Privacy Policy regularly to ensure you are aware of any changes.</span></div>\r\n										\r\n										'),
(3, 'About Us ', 'aboutus', '<div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Welcome to Agence CARrental, your premier car rental service in Morocco. As a locally owned and operated company, we take immense pride in our Moroccan heritage and are dedicated to providing exceptional service to both residents and visitors. Our mission is to ensure that every journey you take with us is comfortable, convenient, and memorable.</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">At Agence CARrental, we understand that every traveler has unique needs. That\'s why we offer a diverse fleet of vehicles to suit every occasion and preference. Whether you need a compact car for city driving, a spacious SUV for a family trip, or a luxury vehicle for a special event, we have the perfect car for you.</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">What sets us apart is our unwavering commitment to customer satisfaction. From the moment you book your car until the end of your rental period, our team is here to ensure a seamless experience. Our user-friendly website makes it easy to browse our selection, make reservations, and manage your rental details.</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Our dedication to excellence extends beyond our vehicle offerings. We continuously strive to provide competitive rates, transparent pricing, and personalized service. Our team of professionals is always ready to assist you with any inquiries or special requests, ensuring that your rental experience is tailored to your needs.</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Discover the freedom of the road with Agence CARrental. Whether you\'re exploring the vibrant cities, picturesque landscapes, or historic sites of Morocco, we\'re here to make your journey unforgettable. Trust in our expertise, enjoy our top-notch service, and let us be your go-to car rental agency in Morocco.</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Thank you for choosing Agence. We look forward to serving you and making your travels extraordinary.</span></div>'),
(11, 'Services', 'services', '<div style=\"text-align: justify;\"><br><span style=\"font-size: 1em;\">CAR RENTAL We pride ourselves on providing excellent and fast car rental services, while providing the best cars that meet your needs and exceed your expectations. We understand that time and quality are vital when searching for a car to rent, which is why we strive to provide the best services to our customers.</span><br><br><span style=\"font-size: 1em;\">Our fast services start from the moment you contact us, as our professional team provides an immediate response to your needs and works to meet all your requests quickly and effectively. Whether you need the car delivered to your preferred location or organizing your airport pick-up, we ensure quick and smooth access to the vehicle of your choice.</span><br><br><span style=\"font-size: 1em;\">With us, you don\'t have to worry about the quality of the cars we offer. All our cars are carefully studied and constantly maintained to ensure the highest level of performance and safety. Whether you are looking for an economical car for a short trip or a luxury car for a unique experience, we offer a wide variety of cars to meet every customer\'s needs.</span><br><br><span style=\"font-size: 1em;\">Besides, we understand the importance of trust and confidence during the rental process. Therefore, we offer multiple insurance programs and 24-hour roadside support to ensure your comfort and safety during your trip.</span><br><br><span style=\"font-size: 1em;\">At CAR RENTAL, we always strive to provide the best experience to our customers, by making the car rental process easier and smoother than you expect. Choose CAR RENTAL today and enjoy an unforgettable car rental experience.</span><br></div>'),
(5, 'FAQ', 'FAQ', '																																																																																																														<div><div style=\"text-align: justify;\"><div style=\"text-align: justify;\"><span style=\"font-size: large;\">Frequently asked questions about car rental</span></div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">1. What are the general conditions for car rental?</span></div><div style=\"text-align: justify;\">&nbsp;You must have a valid driver\'s license and a valid credit card in the name of the person to whom the car will be rented. Some policies may also require legal age and driving history.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">2. Can I rent a car without a credit card?</span></div><div style=\"text-align: justify;\">&nbsp;Unfortunately, car rentals usually require a valid credit card to guarantee payment and insurance.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">3. What documents are required to rent a car?</span></div><div style=\"text-align: justify;\">&nbsp;You will need to show a valid driver\'s license and a credit card in the name of the person to whom the car will be rented. You may also need additional proof of identity in some cases.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">4. Can I return the car at a different location?</span></div><div style=\"text-align: justify;\">&nbsp;It is possible, but this service may involve an additional cost. Such various pickups must be arranged with the car rental company.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">5. Can I rent a car if I am still a teenager?</span></div><div style=\"text-align: justify;\">&nbsp;Car rental policies vary from place to place, but car rental policies often require a certain age (usually 21) for the main renter.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">6. What should I do if I get into an accident with the rented car?</span></div><div style=\"text-align: justify;\">&nbsp;In the event of an accident, you should contact the car rental company immediately and then follow the instructions provided by the company\'s employees. Some companies may require a police report.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">7. Can I add an additional driver to the rental contract?</span></div><div style=\"text-align: justify;\">&nbsp;Yes, you can in many cases. This service usually includes an additional cost that may vary depending on the car rental company.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">8. What happens if I am late in returning the car?</span></div><div style=\"text-align: justify;\">&nbsp;You may incur an additional cost if you are late in returning the vehicle. Please contact the car rental company to find out their policies in this regard.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">9. Can I rent a car for a long period?</span></div><div style=\"text-align: justify;\">&nbsp;Yes, you can rent a car for long periods. In fact, many car rental companies offer special offers for long-term rental.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">10. Can I rent a car to use abroad?</span></div><div style=\"text-align: justify;\">&nbsp;Yes, you can in many cases. However, this service may involve additional costs and must be arranged with the car rental company.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">11. Can I rent a car without insurance?</span></div><div style=\"text-align: justify;\">&nbsp;Car rentals usually require insurance. However, different insurance options may be available depending on each rental company\'s policy.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">12.Can I rent a car to someone else?</span></div><div style=\"text-align: justify;\">&nbsp;It depends on the car rental company\'s policy. Some companies allow the car to be rented to someone else with specific conditions, while others prefer to rent the car only to the main renter.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">13. Can I rent a car without a loader?</span></div><div style=\"text-align: justify;\">&nbsp;In some cases you can, but there may be an additional cost to add a loading dolly to your lease. Check the car rental company\'s policy for details.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">14. Can I rent a car without a discount?</span></div><div style=\"text-align: justify;\">&nbsp;Car rental companies usually offer multiple offers and discounts, but you can also rent a car without a discount. Check out our current offers and discounts to get the best deals.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">15. Can I rent a car with a driver?</span></div><div style=\"text-align: justify;\">&nbsp;Yes, you can. Many car rental companies offer chauffeured car rental at an additional cost. Check with us for details and available arrangements.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">16. Can I change my reservation?</span></div><div style=\"text-align: justify;\">&nbsp;Yes, you can in many cases. Please contact the car rental company to change your reservation according to their policies.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">17. What happens if I don\'t return the car on time?</span></div><div style=\"text-align: justify;\">&nbsp;If you do not return the car on time, additional fees may apply. You should contact the car rental company to check their policies regarding delays.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">18. Can I use another credit card to pay when returning the car?</span></div><div style=\"text-align: justify;\">&nbsp;It depends on the car rental company\'s policy. Please check the terms and conditions of payment when returning the vehicle.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">19. Is roadside assistance provided?</span></div><div style=\"text-align: justify;\">&nbsp;Yes, many car rental companies offer roadside assistance in case there is any problem with the rental car.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">20. Is car rental available via cash payment system?</span></div><div style=\"text-align: justify;\">&nbsp;Cash payment options may be available in some cases, but car rentals often require the use of a credit card to guarantee payment and insurance.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\">Contact us if you need more information or have any other questions.</div></div></div>										\n										\n										\n										\n										\n										\n										\n										\n										\n										\n										\n										\n										');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `carsId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `daysB` int(11) DEFAULT NULL,
  `T_price` decimal(10,2) DEFAULT NULL,
  `visitor_fullname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `SubscriberEmail` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `Testimonial` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `UserEmail`, `Testimonial`, `PostingDate`, `status`) VALUES
(1, 'lahcenouhassou18@gmail.com', 'Renting with Crental was a breeze! The booking process was straightforward', '2024-07-29 00:26:54', 1),
(2, 'lahcenouhassou18@gmail.com', 'I recently rented a car from Crental company and was thoroughly impressed! The booking process was quick, the car was clean and reliable.', '2024-07-29 00:27:50', 1),
(3, 'lahcenouhassou18@gmail.com', 'Choosing CAR RENTAL was the best decision for my travel needs. Their efficient service and quality vehicles made my trip stress-free.', '2024-07-29 00:28:21', 1),
(4, 'lahcenouhassou18@gmail.com', 'Renting with CAR Rental was effortless! The online booking was straightforward, the car was spotless, and the staff was friendly.', '2024-07-29 00:28:55', 1),
(5, 'lahcenouhassou18@gmail.com', '\"I\'ve rented cars from many companies, but CAR RENTAL stands out. The car was in great condition, and their rates were unbeatable. Thank you!\"', '2024-07-29 00:29:26', 1),
(6, 'lahcenouhassou18@gmail.com', 'Booking with Crental was so convenient. They offer flexible options, and their customer support is top-notch. A great choice for travelers!', '2024-07-29 00:29:55', 1),
(7, 'lahcenouhassou18@gmail.com', 'The value and service provided by [Rental Car Company] exceeded my expectations. \r\n', '2024-07-29 00:30:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailU` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `PhoneNumber` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expiry` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `photo_source` varchar(10) DEFAULT 'upload'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FullName`, `EmailU`, `Password`, `PhoneNumber`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`, `reset_token`, `reset_token_expiry`, `photo`, `photo_source`) VALUES
(1, 'lahcen ouhassou', 'Lahcenouhassou18@gmail.com', '511d68ad3937198cd21698b0d7bb98a1', '0691115737', NULL, NULL, NULL, NULL, '2024-07-29 00:24:48', NULL, NULL, NULL, '1722212688_MYphoto.png', 'upload');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`EmailU`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
