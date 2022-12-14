-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2022 at 01:53 AM
-- Server version: 8.0.31-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_management_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin_Details`
--

CREATE TABLE `Admin_Details` (
  `Admin_ID` int NOT NULL,
  `Admin_Username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Admin_Password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Admin_Details`
--

INSERT INTO `Admin_Details` (`Admin_ID`, `Admin_Username`, `Admin_Password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `Author_Details`
--

CREATE TABLE `Author_Details` (
  `AUT_ID` int NOT NULL,
  `AUT_Name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `AUT_Status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Author_Details`
--

INSERT INTO `Author_Details` (`AUT_ID`, `AUT_Name`, `AUT_Status`) VALUES
(3, 'Joseph Murphy', 'active'),
(4, 'Napoleon Hill', 'active'),
(6, 'Robert T. Kiyosaki', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `Book_Details`
--

CREATE TABLE `Book_Details` (
  `BOOK_ID` int NOT NULL,
  `BOOK_Name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `BOOK_ISBN` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `AUT_ID` int NOT NULL,
  `CAT_ID` int NOT NULL,
  `PUB_ID` int NOT NULL,
  `BOOK_Pub_Date` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `BOOK_Stock` int NOT NULL,
  `BOOK_Price` int NOT NULL,
  `BOOK_Page` int NOT NULL,
  `BOOK_Image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `BOOK_Add_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Book_Details`
--

INSERT INTO `Book_Details` (`BOOK_ID`, `BOOK_Name`, `BOOK_ISBN`, `AUT_ID`, `CAT_ID`, `PUB_ID`, `BOOK_Pub_Date`, `BOOK_Stock`, `BOOK_Price`, `BOOK_Page`, `BOOK_Image`, `BOOK_Add_Date`) VALUES
(1, 'Think and Grow Rich', '9788192681047', 4, 2, 1, '1937', 5, 800, 242, '../assets/image/uploads/thinkandgrowrich.jpg', '2022-12-14 18:20:30'),
(2, 'The Power of your Subconscious Mind', '164156152', 3, 2, 1, '1989', 5, 500, 288, '../assets/image/uploads/powerofsubconsciousmind.jpg', '2022-12-14 20:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `Category_Details`
--

CREATE TABLE `Category_Details` (
  `CAT_ID` int NOT NULL,
  `CAT_Name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `CAT_Status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Category_Details`
--

INSERT INTO `Category_Details` (`CAT_ID`, `CAT_Name`, `CAT_Status`) VALUES
(2, 'Self Help', 'active'),
(3, 'Self Growth', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `Issue_Details`
--

CREATE TABLE `Issue_Details` (
  `ISS_ID` int NOT NULL,
  `BOOK_ID` int NOT NULL,
  `SD_ID` int NOT NULL,
  `ISS_From` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ISS_To` date NOT NULL,
  `ISS_Status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Publication_Details`
--

CREATE TABLE `Publication_Details` (
  `PUB_ID` int NOT NULL,
  `PUB_Name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `PUB_Status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Publication_Details`
--

INSERT INTO `Publication_Details` (`PUB_ID`, `PUB_Name`, `PUB_Status`) VALUES
(1, 'Pirates India', 'active'),
(3, 'Ekta Books', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `Student_Details`
--

CREATE TABLE `Student_Details` (
  `SD_ID` int NOT NULL,
  `SD_Email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `SD_Password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `SD_Name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Student_Details`
--

INSERT INTO `Student_Details` (`SD_ID`, `SD_Email`, `SD_Password`, `SD_Name`) VALUES
(3, 'harish@harish.com', 'harish@harish.com', 'Harish Singh'),
(4, 'joh@hohn.comn', 'john@john.com', 'John Doe'),
(5, 'manish@manish.com', 'manish', 'Manish Bhurtel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin_Details`
--
ALTER TABLE `Admin_Details`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `Author_Details`
--
ALTER TABLE `Author_Details`
  ADD PRIMARY KEY (`AUT_ID`),
  ADD UNIQUE KEY `name` (`AUT_Name`);

--
-- Indexes for table `Book_Details`
--
ALTER TABLE `Book_Details`
  ADD PRIMARY KEY (`BOOK_ID`),
  ADD UNIQUE KEY `name` (`BOOK_Name`),
  ADD KEY `Author FK` (`AUT_ID`),
  ADD KEY `Publisher FK` (`PUB_ID`),
  ADD KEY `Category FK` (`CAT_ID`);

--
-- Indexes for table `Category_Details`
--
ALTER TABLE `Category_Details`
  ADD PRIMARY KEY (`CAT_ID`),
  ADD UNIQUE KEY `name` (`CAT_Name`(50));

--
-- Indexes for table `Issue_Details`
--
ALTER TABLE `Issue_Details`
  ADD PRIMARY KEY (`ISS_ID`),
  ADD KEY `Student FK` (`SD_ID`),
  ADD KEY `Book FK` (`BOOK_ID`);

--
-- Indexes for table `Publication_Details`
--
ALTER TABLE `Publication_Details`
  ADD PRIMARY KEY (`PUB_ID`),
  ADD UNIQUE KEY `name` (`PUB_Name`);

--
-- Indexes for table `Student_Details`
--
ALTER TABLE `Student_Details`
  ADD PRIMARY KEY (`SD_ID`),
  ADD UNIQUE KEY `email` (`SD_Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin_Details`
--
ALTER TABLE `Admin_Details`
  MODIFY `Admin_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Author_Details`
--
ALTER TABLE `Author_Details`
  MODIFY `AUT_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Book_Details`
--
ALTER TABLE `Book_Details`
  MODIFY `BOOK_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Category_Details`
--
ALTER TABLE `Category_Details`
  MODIFY `CAT_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Issue_Details`
--
ALTER TABLE `Issue_Details`
  MODIFY `ISS_ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Publication_Details`
--
ALTER TABLE `Publication_Details`
  MODIFY `PUB_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Student_Details`
--
ALTER TABLE `Student_Details`
  MODIFY `SD_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Book_Details`
--
ALTER TABLE `Book_Details`
  ADD CONSTRAINT `Author FK` FOREIGN KEY (`AUT_ID`) REFERENCES `Author_Details` (`AUT_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Category FK` FOREIGN KEY (`CAT_ID`) REFERENCES `Category_Details` (`CAT_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Publisher FK` FOREIGN KEY (`PUB_ID`) REFERENCES `Publication_Details` (`PUB_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Issue_Details`
--
ALTER TABLE `Issue_Details`
  ADD CONSTRAINT `Book FK` FOREIGN KEY (`BOOK_ID`) REFERENCES `Book_Details` (`BOOK_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `Student FK` FOREIGN KEY (`SD_ID`) REFERENCES `Student_Details` (`SD_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
