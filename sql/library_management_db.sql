-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 17, 2022 at 07:03 PM
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
(11, 'Joseph Murphy', 'active'),
(12, 'Napoleon Hill', 'active'),
(13, 'Charles Dickens', 'active'),
(15, 'Jane Austen', 'active'),
(16, 'Robert T. Kiyosaki', 'active'),
(17, 'Sir Arthur Conan Doyle', 'active'),
(18, 'Mark Twain', 'active'),
(19, 'Baroness Orczy', 'active'),
(20, 'Charles and Mary Lamb', 'active'),
(21, 'Max Well', 'active'),
(22, 'Dipendra Shah', 'active'),
(23, 'Vinaya Kasju', 'active'),
(24, 'R. G. Dromey', 'active'),
(25, 'V. Rajaraman', 'active');

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
(11, 'Sani Jalpari - Nepali', '9789937523370', 23, 13, 12, '2066', 1, 250, 88, '../assets/image/uploads/sanijalpari.jpg', '2022-12-17 11:17:28'),
(12, 'The Old Woman And Her Pig', '014245196', 22, 13, 13, '2050', 1, 100, 64, '../assets/image/uploads/319289200_1384894855589360_3363030251882152064_n.jpg', '2022-12-17 11:20:50'),
(13, 'Think And Grow Rich', '9788192681047', 12, 14, 9, '1937 AD', 1, 800, 242, '../assets/image/uploads/320359146_3301071710207233_729273119206787309_n.jpg', '2022-12-17 11:23:40'),
(14, 'The Power of your Subconscious Mind', '9788195291366', 11, 10, 9, 'N-A', 1, 400, 228, '../assets/image/uploads/powerofsubconsciousmind.jpg', '2022-12-17 11:26:15'),
(15, 'How to solve it by Computer', '978813705629', 24, 15, 11, '2006 AD', 1, 500, 441, '../assets/image/uploads/318953997_685923249761240_7416823605583847488_n.jpg', '2022-12-17 11:30:38'),
(16, 'Computer Programming in C', '9788120308596', 25, 15, 10, '2014 AD', 1, 400, 363, '../assets/image/uploads/319411249_681174343590538_1569310653405426481_n.jpg', '2022-12-17 11:32:43'),
(17, 'Pride And Prejudice', '9789937105088', 15, 16, 8, '2008 AD', 1, 250, 264, '../assets/image/uploads/319521530_880677653379892_4522627701494697873_n.jpg', '2022-12-17 11:35:01'),
(18, 'Great Expectations', '9789937101684', 13, 17, 8, '2005 AD', 1, 250, 192, '../assets/image/uploads/319965651_1337852403653646_5971137309607279488_n.jpg', '2022-12-17 11:38:19'),
(19, 'The Adventures of Sherlock Holmes', '9993314439', 17, 17, 8, '2003 AD', 1, 250, 240, '../assets/image/uploads/319195555_1034632844605949_1924828935834565133_n (1).jpg', '2022-12-17 11:41:32'),
(20, 'Adventures of Huckleberry Finn', '9789937105064', 18, 16, 8, '2005 AD', 1, 250, 232, '../assets/image/uploads/320122711_1514438452408342_3388742109612255698_n.jpg', '2022-12-17 11:44:18'),
(21, 'The Scarlet Pimpernel', '978937101691', 19, 16, 8, '2008 AD', 1, 250, 192, '../assets/image/uploads/319164572_1341476616585449_6848779560714184272_n.jpg', '2022-12-17 11:47:07'),
(22, 'Tales from Shakespeare', '9789937105095', 20, 18, 8, '2008 AD', 1, 250, 224, '../assets/image/uploads/319803564_690106835844183_7073816909846158453_n.jpg', '2022-12-17 11:49:56'),
(23, 'Max Well Encyclopedia of Questions and Answers', '9788182529274', 21, 12, 14, '2016 AD', 1, 1000, 256, '../assets/image/uploads/318634749_817424752662567_3670172311618611952_n.jpg', '2022-12-17 11:55:55'),
(24, 'Rich Dad Poor Dad', '9780964385610', 16, 11, 15, '1997 AD', 1, 300, 336, '../assets/image/uploads/9781612680170-3365733013', '2022-12-17 12:05:30');

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
(10, 'Self Help', 'active'),
(11, 'Personal Finance', 'active'),
(12, 'Encyclopedia', 'active'),
(13, 'Child Stories', 'active'),
(14, 'Self Growth', 'active'),
(15, 'Computer Programming', 'active'),
(16, 'English Novel', 'active'),
(17, 'English Story', 'active'),
(18, 'English Drama', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `Issue_Details`
--

CREATE TABLE `Issue_Details` (
  `ISS_ID` int NOT NULL,
  `BOOK_ID` int NOT NULL,
  `SD_ID` int NOT NULL,
  `ISS_From` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ISS_To` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ISS_Status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Issue_Details`
--

INSERT INTO `Issue_Details` (`ISS_ID`, `BOOK_ID`, `SD_ID`, `ISS_From`, `ISS_To`, `ISS_Status`) VALUES
(7, 24, 9, '2022-12-17 12:50:37', '2022-12-31', 'active');

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
(8, 'Ekta Graded Readers', 'active'),
(9, 'PIRATES India', 'active'),
(10, 'PHI Learning Private Limited', 'active'),
(11, 'Pearson Education', 'active'),
(12, 'Vivek Shrijansil Prakasan Pvt. Ltd.', 'active'),
(13, 'S.P. Publication Pvt. Ltd.', 'active'),
(14, 'Wilco Publishing House', 'active'),
(15, 'Self Published', 'active');

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
(7, 'harishsingh@gmail.com', 'harishsingh', 'Harish Singh'),
(8, 'johndoe@gmail.com', 'johndoe', 'John Doe'),
(9, 'manishbhurtel668@gmail.com', 'manishbhurtel', 'Manish Bhurtel');

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
  MODIFY `AUT_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `Book_Details`
--
ALTER TABLE `Book_Details`
  MODIFY `BOOK_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `Category_Details`
--
ALTER TABLE `Category_Details`
  MODIFY `CAT_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `Issue_Details`
--
ALTER TABLE `Issue_Details`
  MODIFY `ISS_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Publication_Details`
--
ALTER TABLE `Publication_Details`
  MODIFY `PUB_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Student_Details`
--
ALTER TABLE `Student_Details`
  MODIFY `SD_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Book_Details`
--
ALTER TABLE `Book_Details`
  ADD CONSTRAINT `Author FK` FOREIGN KEY (`AUT_ID`) REFERENCES `Author_Details` (`AUT_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Category FK` FOREIGN KEY (`CAT_ID`) REFERENCES `Category_Details` (`CAT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
