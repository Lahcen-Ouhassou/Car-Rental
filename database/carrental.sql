-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 09:55 PM
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
(14, 'Fiat', '2024-05-03 14:31:01', NULL);

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
(2, 'test 2', '2', 'qwkijeqwkijeqwkijeqwkijeqwkijeqwkijeqwkijeqwkijeqwkijevv', 123, 'Diesel', 2023, 5, 'pexels-junnoet-235222.jpg', 'pexels-albinberlin-919073.jpg', 'pexels-alexgtacar-745150-1592384.jpg', 'pexels-adrian-dorobantu-989175-2127733.jpg', 'pexels-alexgtacar-745150-1592384.jpg', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, NULL, NULL, '2024-05-08 15:49:00', '2024-06-02 01:55:02', 'Automatic', '7L', 'Red'),
(3, 'test 3', '1', 'awkjdkamdla', 133, 'Petrol', 2010, 5, 'pexels-dom-j-7304-303316.jpg', 'pexels-orestsv-2062555.jpg', 'pexels-mikebirdy-116675.jpg', 'pexels-orestsv-2062555.jpg', 'pexels-dom-j-7304-303316.jpg', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2024-05-08 15:50:24', NULL, 'Manual', '8L', 'Red'),
(6, 'test 4', '3', 'hadiii tomobila hawta w nadyaaaaaaaaaa hhhhhhhh', 150, 'Hybrid', 2024, 7, 'pexels-mikebirdy-116675.jpg', 'pexels-orestsv-2062555.jpg', 'pexels-dom-j-7304-303316.jpg', 'pexels-avinashpatel-544542.jpg', '', 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 1, 0, '2024-05-15 20:12:35', NULL, 'Automatic', '8L', 'Gray'),
(7, 'test 5', '7', 'slamo3lykom rah ahhssan tomobil salinaa a khona hh', 100, 'Petrol', 2006, 3, 'pexels-charles-kettor-268979-831475.jpg', 'pexels-charles-kettor-268979-1077785.jpg', 'pexels-junnoet-235222.jpg', 'pexels-mikebirdy-170811.jpg', 'pexels-charles-kettor-268979-1077785.jpg', 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 1, 0, '2024-05-15 20:28:42', NULL, 'Manual', '5.4L', 'Brown'),
(10, 'kneddwkj', '3', 'iuhu', 6, 'Diesel', 2023, 9, 'pexels-avinashpatel-544542.jpg', 'pexels-mikebirdy-112460.jpg', 'pexels-charles-kettor-268979-1077785.jpg', 'pexels-charles-kettor-268979-1077785.jpg', 'pexels-avinashpatel-544542.jpg', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-05-26 23:52:10', NULL, 'Manual', '7L', 'Red'),
(13, 'test 6', '2', 'uiguq', 76, 'Hybrid', 2024, 3, 'pexels-albinberlin-919073.jpg', 'pexels-orestsv-2062555.jpg', 'pexels-megapixelstock-18296.jpg', 'pexels-mikebirdy-446389.jpg', 'pexels-adrian-dorobantu-989175-2127733.jpg', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '2024-05-26 23:56:48', NULL, 'Automatic', '4L', 'Black');

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
(5, 'FAQ', 'FAQ', '																																																																																																														<div><div style=\"text-align: justify;\"><div style=\"text-align: justify;\"><span style=\"font-size: large;\">Frequently asked questions about car rental</span></div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">1. What are the general conditions for car rental?</span></div><div style=\"text-align: justify;\">&nbsp;You must have a valid driver\'s license and a valid credit card in the name of the person to whom the car will be rented. Some policies may also require legal age and driving history.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">2. Can I rent a car without a credit card?</span></div><div style=\"text-align: justify;\">&nbsp;Unfortunately, car rentals usually require a valid credit card to guarantee payment and insurance.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">3. What documents are required to rent a car?</span></div><div style=\"text-align: justify;\">&nbsp;You will need to show a valid driver\'s license and a credit card in the name of the person to whom the car will be rented. You may also need additional proof of identity in some cases.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">4. Can I return the car at a different location?</span></div><div style=\"text-align: justify;\">&nbsp;It is possible, but this service may involve an additional cost. Such various pickups must be arranged with the car rental company.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">5. Can I rent a car if I am still a teenager?</span></div><div style=\"text-align: justify;\">&nbsp;Car rental policies vary from place to place, but car rental policies often require a certain age (usually 21) for the main renter.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">6. What should I do if I get into an accident with the rented car?</span></div><div style=\"text-align: justify;\">&nbsp;In the event of an accident, you should contact the car rental company immediately and then follow the instructions provided by the company\'s employees. Some companies may require a police report.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">7. Can I add an additional driver to the rental contract?</span></div><div style=\"text-align: justify;\">&nbsp;Yes, you can in many cases. This service usually includes an additional cost that may vary depending on the car rental company.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">8. What happens if I am late in returning the car?</span></div><div style=\"text-align: justify;\">&nbsp;You may incur an additional cost if you are late in returning the vehicle. Please contact the car rental company to find out their policies in this regard.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">9. Can I rent a car for a long period?</span></div><div style=\"text-align: justify;\">&nbsp;Yes, you can rent a car for long periods. In fact, many car rental companies offer special offers for long-term rental.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">10. Can I rent a car to use abroad?</span></div><div style=\"text-align: justify;\">&nbsp;Yes, you can in many cases. However, this service may involve additional costs and must be arranged with the car rental company.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">11. Can I rent a car without insurance?</span></div><div style=\"text-align: justify;\">&nbsp;Car rentals usually require insurance. However, different insurance options may be available depending on each rental company\'s policy.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">12.Can I rent a car to someone else?</span></div><div style=\"text-align: justify;\">&nbsp;It depends on the car rental company\'s policy. Some companies allow the car to be rented to someone else with specific conditions, while others prefer to rent the car only to the main renter.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">13. Can I rent a car without a loader?</span></div><div style=\"text-align: justify;\">&nbsp;In some cases you can, but there may be an additional cost to add a loading dolly to your lease. Check the car rental company\'s policy for details.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">14. Can I rent a car without a discount?</span></div><div style=\"text-align: justify;\">&nbsp;Car rental companies usually offer multiple offers and discounts, but you can also rent a car without a discount. Check out our current offers and discounts to get the best deals.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">15. Can I rent a car with a driver?</span></div><div style=\"text-align: justify;\">&nbsp;Yes, you can. Many car rental companies offer chauffeured car rental at an additional cost. Check with us for details and available arrangements.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">16. Can I change my reservation?</span></div><div style=\"text-align: justify;\">&nbsp;Yes, you can in many cases. Please contact the car rental company to change your reservation according to their policies.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">17. What happens if I don\'t return the car on time?</span></div><div style=\"text-align: justify;\">&nbsp;If you do not return the car on time, additional fees may apply. You should contact the car rental company to check their policies regarding delays.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">18. Can I use another credit card to pay when returning the car?</span></div><div style=\"text-align: justify;\">&nbsp;It depends on the car rental company\'s policy. Please check the terms and conditions of payment when returning the vehicle.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">19. Is roadside assistance provided?</span></div><div style=\"text-align: justify;\">&nbsp;Yes, many car rental companies offer roadside assistance in case there is any problem with the rental car.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><span style=\"font-weight: bold;\">20. Is car rental available via cash payment system?</span></div><div style=\"text-align: justify;\">&nbsp;Cash payment options may be available in some cases, but car rentals often require the use of a credit card to guarantee payment and insurance.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\">Contact us if you need more information or have any other questions.</div></div></div>										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										');

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

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `userEmail`, `carsId`, `FromDate`, `ToDate`, `message`, `Status`, `PostingDate`, `daysB`, `T_price`, `visitor_fullname`) VALUES
(53, 'lahcenouhassou18@gmail.com', 3, '2024-05-25', '2024-05-28', 'hey', 1, '2024-05-24 02:47:06', 3, 399.00, 'lahcen ouhassou'),
(56, 'ayoubhmaida@gmail.com', 1, '2024-05-29', '2024-06-03', 'bbb', 1, '2024-05-25 20:16:56', 5, 1000.00, 'ayyoub hmaida'),
(69, 'lahcenouhassou18@gmail.com', 3, '2024-05-30', '2024-05-31', 'hghuk', 1, '2024-05-25 23:30:17', 1, 133.00, 'lahcen ouhassou'),
(70, 'lahcenouhassou18@gmail.com', 13, '2024-05-28', '2024-05-28', 'cv', 2, '2024-05-27 13:37:49', 0, 0.00, 'lahcen ouhassou'),
(71, 'lahcenouhassou18@gmail.com', 13, '2024-06-14', '2024-06-18', 'g', 1, '2024-06-01 11:54:05', 4, 304.00, 'lahcen ouhassou'),
(72, 'lahcenouhassou18@gmail.com', 2, '2024-06-15', '2024-06-21', 'kk', 0, '2024-06-02 01:30:54', 6, 738.00, 'lahcen ouhassou'),
(73, 'lahcenouhassou18@gmail.com', 10, '2024-06-19', '2024-06-20', '1 jour', 0, '2024-06-02 13:39:52', 1, 6.00, 'lahcen ouhassou');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `SubscriberEmail` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `SubscriberEmail`, `PostingDate`) VALUES
(5, 'lahcenouhasssou18@gmail.com', '2024-05-16 00:33:23'),
(20, 'mqnwjhq@q', '2024-05-24 18:07:56');

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
(1, 'testtest@gmail.com', 'you are the best web site in rental car', '2024-05-06 17:47:38', 0),
(3, 'testtest@gmail.com', 'test test', '2024-05-06 17:55:19', 1),
(4, 'testtest@gmail.com', 'tes test testtttttttt', '2024-05-06 18:01:53', 1),
(5, 'lahcenouhassou18@gmail.com', 'heyakkakj', '2024-05-22 14:06:34', 1),
(7, 'lahcenouhassou18@gmail.com', 'hey cv', '2024-05-22 14:12:31', 1),
(8, 'lahcenouhassou18@gmail.com', 'lahcen ouhassou', '2024-05-22 14:13:09', 1),
(10, 'lahcenouhassou18@gmail.com', 'heyyyyyyyyyyyyyyyy', '2024-05-22 22:07:36', 1);

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
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FullName`, `EmailU`, `Password`, `PhoneNumber`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`, `reset_token`, `reset_token_expiry`, `photo`) VALUES
(78, 'lahcen ouhassou', 'Lahcenouhassou18@gmail.com', '511d68ad3937198cd21698b0d7bb98a1', '0691115737', '', '', '', '', '2024-05-23 12:22:18', '2024-06-02 19:39:53', '578ada11e704d6c64e12aa9817147706', '2024-06-02 21:39:53', NULL),
(106, 'ayyoub hmaida', 'ayoubhmaida@gmail.com', '92fe2eb6d27f88a0e6af7e1632abaa39', '0616914187', NULL, NULL, NULL, NULL, '2024-05-25 20:03:37', NULL, NULL, NULL, NULL),
(122, 'hmyda', 'hh@gmail.com', '5e36941b3d856737e81516acd45edc50', '0983282888', NULL, NULL, NULL, NULL, '2024-06-02 19:42:47', NULL, NULL, NULL, 'uploads/665ccb37c23220.86572162.png');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
