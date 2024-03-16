-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2023 at 10:02 AM
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
-- Database: `member_dbapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment_tbl`
--

CREATE TABLE `comment_tbl` (
  `sms_id` int(11) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `role` varchar(100) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment_tbl`
--

INSERT INTO `comment_tbl` (`sms_id`, `subject`, `role`, `comment`, `created_at`) VALUES
(3, 'eyehehdhhe', 'member', 'ryrrtrtrttr', '2023-11-04 01:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `cv_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `memberregistraton_tbl`
--

CREATE TABLE `memberregistraton_tbl` (
  `id` int(11) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `NIDA` varchar(300) NOT NULL,
  `region` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `ward` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `memberregistraton_tbl`
--

INSERT INTO `memberregistraton_tbl` (`id`, `fullName`, `address`, `email`, `phone`, `NIDA`, `region`, `district`, `ward`, `category`, `status`) VALUES
(5, 'Latifah Saidi Mtonya', 'Kingambon Dar es salaam', 'mtonya@gmail.com', '0752101032', '2002138477574773200', 'DAR ES SALAAM', 'Kinondoni', 'Kigamboni', 'Gold', ''),
(6, 'Juma said ', 'kawe dar es salaam', 'juma@gmail.com', '0752101032', '1999050499898282', 'Lindi', 'Kilwa', 'Kilwa', 'Ordinary', ''),
(7, 'Daudi Daudi  issa', 'lindi  stand p.o box 29393', 'daudi@gmail.com', '06236363633', '193934838837377373', 'LINDI', 'Lindi mjini', 'Lindi', 'Silver', 'Approved'),
(8, 'Daudi Daudi  issa', 'millenium tower makumbusho', 'daudi@gmail.com', '0789162633', '20021384775747737373', 'DAR ES SALAAM', 'Kinondoni', 'Kigamboni', 'Gold', 'Pending'),
(9, 'TEST', 'testznnx', 'success@gmail.com', '077573666', '189899483772', 'TESTTESTAF', 'SHSGSGGSGS', 'DDHSHHS', '---empty---', ''),
(10, 'aroun lubea', 'manzese dar es salaam', 'aroun@gmail.com', '0650509944', '193934838837377373', 'DAR ES SALAAM', 'Kinondoni', 'Manzese', 'Silver', ''),
(11, 'user', 'Kingambon Dar es salaam', 'user@gmail.com', '07757366699', '1869699994939393', 'DAR ES SALAAM', 'Kinondoni', 'Manzese', 'Ordinary', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `membership_tbl`
--

CREATE TABLE `membership_tbl` (
  `id` int(11) NOT NULL,
  `SME_Name` varchar(100) NOT NULL,
  `TIN_Number` varchar(100) NOT NULL,
  `VAT_regNo` varchar(100) NOT NULL,
  `Member_type` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Website` varchar(100) NOT NULL,
  `Telephone` varchar(100) NOT NULL,
  `Sector` varchar(100) NOT NULL,
  `Business_LicenseNo` varchar(100) NOT NULL,
  `Postal_Address` varchar(100) NOT NULL,
  `Fullname` varchar(100) NOT NULL,
  `membershipID` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `cv_path` varchar(100) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `status2` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `approved_from` varchar(100) NOT NULL,
  `approved_upTo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membership_tbl`
--

INSERT INTO `membership_tbl` (`id`, `SME_Name`, `TIN_Number`, `VAT_regNo`, `Member_type`, `email`, `Website`, `Telephone`, `Sector`, `Business_LicenseNo`, `Postal_Address`, `Fullname`, `membershipID`, `region`, `district`, `cv_path`, `status`, `status2`, `created_at`, `approved_from`, `approved_upTo`) VALUES
(14, 'Poutry farming', '123654789', '554433433333', 'Individual', 'member3@gmail.com', 'http://member3.com', '078956347877', 'Poutry farmming', '665444esd444', 'dar es salaam, makongo', 'member3 company', '07665434322', 'dar es salaam', 'kawe', 'uploads/Hints to replace.pdf', NULL, '', '0000-00-00 00:00:00', '', ''),
(15, 'coop member', '123456789', '554433433333', 'Cooperative', 'membeR4@gmail.com', 'htt://coop.com', '078956347877', 'Peasant farming', '09076544erde3es', 'Morogoro, mzumbe', 'cooperative member', '98766t56544', 'Morogoro', 'mzumbvve mjini', 'uploads/PROJECT REPORT.docx', 'Pending', '', '2023-11-04 18:41:04', '', ''),
(16, 'silver member', '654789643', '505rr9r99t599t9ttsilver', 'Silver', 'silvercomp@gmail.com', 'http:/silverweb.com', '078583726262', 'Beef Kiping', '6858382w88888888silver', 'mwenge, mlimani dar es salaam', 'silverCompany', '0987765544333366silver', 'DAR ES SALAAM', 'Kawe', 'uploads/mycoverletterOfficial.pdf', NULL, '', '2022-10-06 20:59:59', '', ''),
(17, 'Affiliate Comp', '234123765', '585847eetwtqtqTTts', 'Affiliate', 'affiliate@gmail.com', 'http:/affiliateweb.com', '078684736622', 'Pesant Agriculture', '6959499E8E8E8EEEhhgg', '6666y66y6776655', 'AffiliateComp', '847463353sgt636362626', 'LINDI1', 'Lwangwa', 'uploads/Mudhihir Nyema CoverLetter.docx', NULL, '', '0000-00-00 00:00:00', '', ''),
(18, 'tettsttxgxg member data', '456456876', '505rr9r99t599t9tt8837', 'Affiliate', 'approvedMember@gmail.com', '949483737726262', '078583726262766', 'Beef Kiping', '6858382w888888888877', '6666y66y6e44444makongo', 'test member12222', '77777777777777777777766654', 'LINDI', 'Kinondoni', 'uploads/PROJECT REPORT.docx', 'Approved 1', 'Approved 2', '2023-11-04 18:52:12', '2023-11-03', '2024-11-01'),
(19, 'Poutry farming', '678456234', '505rr9r99t599t9ttmtonyGHFHD', 'Cooperative', 'member123@gmail.com', 'http:/web.comggggggg.com', '078583726262', '303039282yyAgri', '2388e828e82', 'Manzese, dar es salaam', 'Cooperative', '77777777777777777777766654', 'Dar_es_salaam', 'Kinondoni', 'uploads/PROJECT REPORT.docx', 'Approved 1', 'Approved 2', '2023-11-04 20:59:46', '2023-11-04', '2023-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `notiuser` varchar(100) NOT NULL,
  `notireciver` varchar(100) NOT NULL,
  `notitype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `notiuser`, `notireciver`, `notitype`) VALUES
(1, 'mvc2001@gmail.com', 'Admin', 'Create Account'),
(2, 'mvc2001@gmail.com', 'Admin', 'Create Account'),
(3, 'usertest@gmail.com', 'Admin', 'Create Account'),
(4, 'usertest@gmaiul.com', 'Admin', 'Create Account');

-- --------------------------------------------------------

--
-- Table structure for table `region_tbl`
--

CREATE TABLE `region_tbl` (
  `id` int(11) NOT NULL,
  `region` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `region_officer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `region_tbl`
--

INSERT INTO `region_tbl` (`id`, `region`, `district`, `region_officer`) VALUES
(1, 'Arusha ', 'Arusha ', 'Arusha  officer'),
(7, 'Ilala', 'Kinondoni ', 'Ilala'),
(8, 'Dar_es_salaam', 'Ilala', 'Dar es salaam Officer'),
(16, 'Dodoma', 'Kondoa', 'Dodoma officer'),
(19, 'Geita', 'Bukombe', 'Geita officer'),
(25, 'Iringa', 'Kilolo', 'Iringa officer'),
(28, 'Kigoma', 'Kakonko', 'Kigoma'),
(34, 'Kilimanjaro', 'Moshi', 'Kilimanjaro officer\r\n'),
(40, 'Lindi', 'liwale', 'Lindi officer'),
(47, 'Mbeya ', 'Kyela', 'Mbeya  officer'),
(50, 'Mara', 'Rorya', 'Mara officer'),
(54, 'Mtwara ', 'Newala', 'Mtwara  officer'),
(59, 'Mwanza', 'Ilemela', 'Mwanza officer'),
(75, 'Kagera', 'Kyerwa', 'Kagera officer'),
(79, 'Manyara', 'Babati', 'Manyara'),
(90, 'Pwani', 'Mkuranga', 'Pwani  officer'),
(94, 'Ruvuma ', 'Songea', 'Ruvuma officer'),
(99, 'Rukwa', 'Sumbawanga', 'Rukwa officer'),
(101, 'Rukwa', 'Kalambo', 'Rukwa officer'),
(102, 'Shinyanga', 'Shinyanga', 'Shinyanga officer'),
(109, 'Singida', 'Ikungi', 'Singida officer'),
(111, 'Simiyu ', 'Busega', 'Simiyu officer'),
(117, 'Songwe ', 'Ileje', 'Songwe  officer'),
(120, 'Tanga', 'Lushoto', 'Tanga officer'),
(127, 'Tabora ', 'Tabora ', 'Tabora  officer'),
(130, 'Tabora  ', 'Tabora  vijijini', 'Tabora  officer'),
(137, 'Njombe', 'Wanging\'ombe', 'Njombe officer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `region` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `status`, `role`, `region`) VALUES
(9, 'User Admin', 'mtonya123@gmail.com', '56355844905f88e52413860f8036a15e', '', 'Adminstrator', ''),
(11, 'Mudhihir Hamis Nyema', 'nyemamudhihir@gmail.com', '9066e079ecb8f78da67104df479bbf10', '', 'HQAdmin', ''),
(14, 'user member', 'member123@gmail.com', '40823df256999c08ad22854518d0f9cb', '', 'member', ''),
(15, 'member2', 'member2@gmail.com', '6f00c14e6898e4d288b575b18aa459b7', '', 'Non-Member', ''),
(17, 'Mudhihir Hamis Nyema', 'approvedMember@gmail.com', '1c061c3ab031a074c1089b0d908bacbc', '', 'region', 'LINDI');

-- --------------------------------------------------------

--
-- Table structure for table `visitedmembers_tbl`
--

CREATE TABLE `visitedmembers_tbl` (
  `id` int(11) NOT NULL,
  `SME_Name` varchar(100) NOT NULL,
  `TIN_Number` varchar(100) NOT NULL,
  `Member_type` varchar(100) NOT NULL,
  `membershipID` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `visited_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitedmembers_tbl`
--

INSERT INTO `visitedmembers_tbl` (`id`, `SME_Name`, `TIN_Number`, `Member_type`, `membershipID`, `status`, `visited_at`) VALUES
(1, 'test', 'tetsttsts', 'Ordinary', '88654433333', 'Visited', '2023-11-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_tbl`
--
ALTER TABLE `comment_tbl`
  ADD PRIMARY KEY (`sms_id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberregistraton_tbl`
--
ALTER TABLE `memberregistraton_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_tbl`
--
ALTER TABLE `membership_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region_tbl`
--
ALTER TABLE `region_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `visitedmembers_tbl`
--
ALTER TABLE `visitedmembers_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment_tbl`
--
ALTER TABLE `comment_tbl`
  MODIFY `sms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `memberregistraton_tbl`
--
ALTER TABLE `memberregistraton_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `membership_tbl`
--
ALTER TABLE `membership_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `region_tbl`
--
ALTER TABLE `region_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `visitedmembers_tbl`
--
ALTER TABLE `visitedmembers_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
