-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2023 at 07:22 PM
-- Server version: 8.0.31
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `ID` int NOT NULL,
  `Sender_ID` int NOT NULL,
  `Reciver_ID` int NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Message` text,
  `Reply` text,
  `Date` date NOT NULL,
  `Reply_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`ID`, `Sender_ID`, `Reciver_ID`, `Title`, `Message`, `Reply`, `Date`, `Reply_Date`) VALUES
(1, 10, 4, 'Complain', 'lorem ispum asfguqwiofihq qiwufghqiowfbq wfuiqwghfiqwohfuoqwb fqwiofgqwiofhqwiofbqw fqwiofgqwiofhqwiof qwfoigqwfioqwhfq wfuioqwgfqwiofhqwiofbqwyfvq ', 'hi', '2023-05-15', '2023-05-17'),
(2, 10, 4, 'Complain', 'lorem ispum asfguqwiofihq qiwufghqiowfbq wfuiqwghfiqwohfuoqwb fqwiofgqwiofhqwiofbqw fqwiofgqwiofhqwiof qwfoigqwfioqwhfq wfuioqwgfqwiofhqwiofbqwyfvq ', NULL, '2023-05-16', NULL),
(3, 10, 4, 'Complain', 'lorem ispum asfguqwiofihq qiwufghqiowfbq wfuiqwghfiqwohfuoqwb fqwiofgqwiofhqwiofbqw fqwiofgqwiofhqwiof qwfoigqwfioqwhfq wfuioqwgfqwiofhqwiofbqwyfvq ', NULL, '2023-05-16', NULL),
(4, 10, 4, 'Complain', 'lorem ispum asfguqwiofihq qiwufghqiowfbq wfuiqwghfiqwohfuoqwb fqwiofgqwiofhqwiofbqw fqwiofgqwiofhqwiof qwfoigqwfioqwhfq wfuioqwgfqwiofhqwiofbqwyfvq ', NULL, '2023-05-16', NULL),
(5, 4, 10, 'title', 'lorem ispum', 'hi', '2023-05-17', '2023-05-17'),
(6, 4, 10, 'Complain', 'asfaw', NULL, '2023-05-17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `Owner_ID` int NOT NULL,
  `Owner_FirstName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Owner_LastName` varchar(30) NOT NULL,
  `Owner_Number` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Owner_Email` varchar(50) NOT NULL,
  `Owner_Password` varchar(64) NOT NULL,
  `Owner_Username` varchar(30) NOT NULL,
  `Owner_RegisterDate` date DEFAULT NULL,
  `Owner_ModifiedDate` date DEFAULT NULL,
  `Owner_City` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Owner_Birthday` date DEFAULT NULL,
  `Owner_img` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`Owner_ID`, `Owner_FirstName`, `Owner_LastName`, `Owner_Number`, `Owner_Email`, `Owner_Password`, `Owner_Username`, `Owner_RegisterDate`, `Owner_ModifiedDate`, `Owner_City`, `Owner_Birthday`, `Owner_img`) VALUES
(2, 'Blendi', 'Zeqiri', '+3834924702', 'blendizeqiri@gmail.com', '$2y$10$EwwBYz7aCN.2KKimMBgFxuoglgo2NOkoYtgpeKpvlFexDa8Q0yNBe', 'blendiarifaj', NULL, '2023-04-04', 'Prishtine', NULL, NULL),
(3, 'Bleron', 'Morina', '', 'bleronMorina@gmail.com', '$2y$10$bX/wVE5zZhjEn.l9bFwFeO5FNyPoubyMkq5ZNr46j3T8CttrG5TR6', 'bleronmorina', NULL, '2023-04-08', '', NULL, 'bleronmorina-pic.jpg'),
(4, 'Eljon ', 'Shala', '', 'eljonshala@gmail.com', '$2y$10$n3RSpWmQLR/R4wXXOP5OIevP/G3kY0XK6NkrqGwnnOZFCvcv2PKYe', 'eljonshala', NULL, '2023-04-08', '', NULL, 'eljonshala-pic.jpg'),
(7, 'Eriona', 'Mustafa', '+38349247022', 'erionamustafa@gmail.com', '$2y$10$6P1PoVLHuKG9GsXlUlP9DeVX3XKEVviQiqhrT9UUaSQh71yqWxCtu', 'erionamustafa', '2023-03-29', '2023-04-08', 'Prishtine', NULL, 'erionamustafa-pic.png'),
(19, 'Florian', 'Saqipi', '+38349247022', 'floriansaqipi@gmail.com', '$2y$10$vbLTzrqUGyy0uKFc2zNIHejFFOAcUBEts3tvijKfozre9E7Dr0KT2', 'floriansaqipi', '2023-04-04', NULL, 'Gjilan', NULL, NULL),
(20, 'testi', 'testi', '+38349247022', 'testi@gmail.com', '$2y$10$f0Cn9VT6gSR65qD1NeCSKel.WB8QwqJMj/9FX7mVoRiODVk3tTpjq', 'testi', '2023-04-04', NULL, 'Drenas', NULL, NULL),
(45, 'Dion', 'Kastrati', 'dion', 'dion@gmail.com', '$2y$10$htEEzg7/7AxnSCXo.3Ep0eadr0KefUWXXosrzShBrnFIi.X.W//R.', 'dion', '2023-04-26', NULL, 'dion', NULL, 'dion-pic.png'),
(46, 'tt', 'tt', NULL, 'tt@gmail.com', '$2y$10$Gf5iH2/BInVuK1RyX5FMMe0S547z9BIs1DXaMAms64tNrVkWpL5nu', 'tt', '2023-05-15', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `passwordreset`
--

CREATE TABLE `passwordreset` (
  `ID` int NOT NULL,
  `ResetEmail` varchar(255) NOT NULL,
  `ResetSelector` text NOT NULL,
  `ResetToken` longtext NOT NULL,
  `ResetExpire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `passwordreset`
--

INSERT INTO `passwordreset` (`ID`, `ResetEmail`, `ResetSelector`, `ResetToken`, `ResetExpire`) VALUES
(8, 'bleronmorina54@gmail.com', 'bc5d82e624abdf2d', '$2y$10$0WmIaAZuCQODuSwyM3fO1eGUCcWyBRevt7Z1Xqmqq4LA2yUt846Da', '1684241022'),
(9, 'endrit.gjokaj@student.uni-pr.edu', '39e80b90bc6f6a5a', '$2y$10$QvxGaEcGOJeVDV4D4ETHAO.Le/uVoQ3CPlCJGFu5Si3DHxirHDNXG', '1684249952'),
(13, 'binakuendri@gmail.com', '31cda898db30152b', '$2y$10$k7YCqGhNKVcJK7Q9Hko3dehoSA1nsMiCx4ubOl7zUwiwaDvBsYJDC', '1684316559');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `Payment_ID` int NOT NULL,
  `Payment_TennantID` int NOT NULL,
  `Payment_PropertyID` int NOT NULL,
  `Payment_Amount` int NOT NULL,
  `Payment_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `Property_ID` int NOT NULL,
  `Property_Type` varchar(40) NOT NULL,
  `Property_Number` int NOT NULL,
  `Property_City` varchar(30) NOT NULL,
  `Property_Address` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Rooms` int DEFAULT NULL,
  `Bathrooms` int DEFAULT NULL,
  `Size` double DEFAULT NULL,
  `Kitchen` int DEFAULT NULL,
  `RentAmount` int DEFAULT NULL,
  `Property_RegisterDate` date DEFAULT NULL,
  `Property_ModifiedDate` date DEFAULT NULL,
  `Property_Cover` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `Property_img_2` text,
  `Property_img_3` text,
  `Property_img_4` text,
  `Property_img_5` text,
  `Property_Owner` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`Property_ID`, `Property_Type`, `Property_Number`, `Property_City`, `Property_Address`, `Rooms`, `Bathrooms`, `Size`, `Kitchen`, `RentAmount`, `Property_RegisterDate`, `Property_ModifiedDate`, `Property_Cover`, `Property_img_2`, `Property_img_3`, `Property_img_4`, `Property_img_5`, `Property_Owner`) VALUES
(4, 'Apartment', 123, 'Drenas', 'Rruga Agim Ramadani', NULL, NULL, NULL, NULL, 340, '2023-03-29', '2023-04-08', '123-pic1.jpg', '0', '0', '0', '0', 4),
(5, 'House', 55, 'Drenas', 'Rruga Agim Ramadani', NULL, NULL, NULL, NULL, 650, '2023-03-31', '2023-04-08', '55-pic1.jpg', '0', '0', '0', '0', 2),
(6, 'Apartment', 5, 'Drenas', 'Rruga Agim Ramadani', NULL, NULL, NULL, NULL, 350, '2023-04-01', '2023-04-08', '5-pic1.jpg', '0', '0', '0', '0', 2),
(7, 'House', 45, 'Prishtine', 'Rruga Agim Ramadani', NULL, NULL, NULL, NULL, 350, '2023-04-02', '2023-04-08', '45-pic1.jpg', '0', '0', '0', '0', 3),
(12, 'Big House', 666, 'Drenas', 'Rruga Agim Ramadani', NULL, NULL, NULL, NULL, 800, '2023-04-18', NULL, '666-pic1.jpg', '666-pic2.jpg', '666-pic3.jpg', '666-pic4.jpg', '666-pic5.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `Tenant_ID` int NOT NULL,
  `Tenant_FirstName` varchar(30) NOT NULL,
  `Tenant_LastName` varchar(30) NOT NULL,
  `Tenant_Number` varchar(30) DEFAULT NULL,
  `Tenant_Email` varchar(50) NOT NULL,
  `Tenant_Password` varchar(64) NOT NULL,
  `Tenant_Username` varchar(30) NOT NULL,
  `Tenant_RegisterDate` date DEFAULT NULL,
  `Tenant_ModifiedDate` date DEFAULT NULL,
  `Tenant_City` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Tenant_Birthday` date DEFAULT NULL,
  `Tenant_Property` int DEFAULT NULL,
  `Tenant_Img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`Tenant_ID`, `Tenant_FirstName`, `Tenant_LastName`, `Tenant_Number`, `Tenant_Email`, `Tenant_Password`, `Tenant_Username`, `Tenant_RegisterDate`, `Tenant_ModifiedDate`, `Tenant_City`, `Tenant_Birthday`, `Tenant_Property`, `Tenant_Img`) VALUES
(1, 'Fisnik', 'Hazrolli', NULL, 'finikhazrolli@gmail.com', '$2y$10$DlD7BXSXZbwPBbmxMUK07.X39BDlDDpzN1/I2ReKaBG0XU0hdpiim', 'fisnikhazrolli', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Enis', 'Hoxha', NULL, 'enishoxha@gmail.com', '$2y$10$BKSCexVDtSJXt75fJYpoBuodIMRDYUQu7o4wKjGNeQzv9jiaI2j5O', 'enishoxha', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'test', 'test', NULL, 'test@gmail.com', '$2y$10$541Jt/4jqD7UdSmrkC6z2eMh/O81Vzk/1Qbl/PzkG7YDyHLIWBTjm', 'test', '2023-04-05', NULL, NULL, '2023-04-20', 4, NULL),
(10, 'root', 'root', '+38349247022', 'root@gmail.com', '$2y$10$x2vljPNjTywgUan4/IaYxOvP.3NMWrItggTJSlUbYnvH/ugfzwXii', 'root', '2023-04-05', '2023-05-16', 'root', '2023-04-01', 4, 'root-pic.png'),
(12, 'yyy', 'yyy', 'yyy', 'binakuendri@gmail.com', '$2y$10$DvNCxeb3CU8WRsLbbAh4NOsuMhAcX.CYUyfHK.PCu5ErKnANZflIO', 'yyy', '2023-05-16', NULL, 'yyy', '2023-05-19', 12, 'yyy-pic.png'),
(13, 'bleri', 'bleri', '+38349247022', 'bleronmorina54@gmail.com', '$2y$10$VhfDJ0MVZPXcJz2Dhl0QR.sv/0pBmLO4y6eGNRB69.CHP1CqtAzUa', 'bleri', '2023-05-16', NULL, 'Drenas', '2023-05-11', 6, 'bleri-pic.png'),
(14, 'endrit', 'gjokaj', '+38349247022', 'endrit.gjokaj@student.uni-pr.edu', '$2y$10$pyfExs3bLLIwY5TOptIQXuYv1btpMpzU.b6YzalAi8tjlXjC.rtRC', 'endritgjokaj', '2023-05-16', NULL, 'Drenas', '2023-05-03', 6, 'endritgjokaj-pic.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Admin_ID` int NOT NULL,
  `Admin_FirstName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Admin_LastName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Admin_Number` int DEFAULT NULL,
  `Admin_Email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Admin_Password` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Admin_Username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Admin_RegisterDate` date DEFAULT NULL,
  `Admin_ModifiedDate` date DEFAULT NULL,
  `Admin_City` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Admin_Birthday` date DEFAULT NULL,
  `Admin_Img` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Admin_ID`, `Admin_FirstName`, `Admin_LastName`, `Admin_Number`, `Admin_Email`, `Admin_Password`, `Admin_Username`, `Admin_RegisterDate`, `Admin_ModifiedDate`, `Admin_City`, `Admin_Birthday`, `Admin_Img`) VALUES
(1, 'Endri', 'Binaku', NULL, 'binakuendri@gmail.com', '$2y$10$/BiJ8P.mEhDVtF1Es9oQwebcEUueMHquPxh71UnCdllUpgG2ULx7O', 'endribinaku', NULL, NULL, NULL, NULL, 'binakuendri.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`Owner_ID`);

--
-- Indexes for table `passwordreset`
--
ALTER TABLE `passwordreset`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`Payment_ID`),
  ADD KEY `Payment_TennantID` (`Payment_TennantID`),
  ADD KEY `Payment_PropertyID` (`Payment_PropertyID`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`Property_ID`),
  ADD KEY `property_ibfk_1` (`Property_Owner`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`Tenant_ID`),
  ADD KEY `Tenant_Property` (`Tenant_Property`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `Owner_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `passwordreset`
--
ALTER TABLE `passwordreset`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `Payment_ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `Property_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `Tenant_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Admin_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`Payment_TennantID`) REFERENCES `tenant` (`Tenant_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`Payment_PropertyID`) REFERENCES `property` (`Property_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`Property_Owner`) REFERENCES `owner` (`Owner_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tenant`
--
ALTER TABLE `tenant`
  ADD CONSTRAINT `tenant_ibfk_1` FOREIGN KEY (`Tenant_Property`) REFERENCES `property` (`Property_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
