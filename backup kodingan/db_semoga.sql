-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2022 at 10:01 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_semoga`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_applicant`
--

CREATE TABLE `tb_applicant` (
  `id_applicant` int(11) NOT NULL,
  `id_offer` int(11) NOT NULL,
  `id_internship` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `nim` varchar(25) CHARACTER SET utf8mb4 NOT NULL,
  `status` enum('YES','NO','PENDING') NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_attendance`
--

CREATE TABLE `tb_attendance` (
  `id_attendance` int(11) NOT NULL,
  `id_internship` int(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `type_attendance` enum('Present','Paid Leave','Unpaid Leave') NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `week` varchar(10) NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
  `approval_spv` enum('Yes','No','Pending') NOT NULL,
  `approval_dpm` enum('Yes','No','Pending') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_company`
--

CREATE TABLE `tb_company` (
  `id_company` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` enum('agency','design','education','engineering','finance','government','health','it','logistics','marketing','media','others') NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `instagram` varchar(50) NOT NULL,
  `header` text NOT NULL,
  `address` text NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` enum('PENDING','VERIFIED','NOT VERIFIED') NOT NULL,
  `access_type` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_company`
--

INSERT INTO `tb_company` (`id_company`, `name`, `type`, `phone`, `email`, `website`, `facebook`, `twitter`, `instagram`, `header`, `address`, `province`, `city`, `description`, `status`, `access_type`) VALUES
(1, 'PSteam', 'finance', '077812567890', 'psteampolibatam@ac.id', 'psteam.ac.id', 'polibatam software team', '@polibatamsoftwareteam', '@PSTEAM.id', 'Hi, This is PSTEAM Header', 'Gedung TA lt.11, Politeknik Negeri Batam', 'Kepulauan Riau', 'Batam', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. ILY', 'VERIFIED', ''),
(3, 'Sumitomo', '', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Hello, this is sumitomo description', '', '1'),
(4, 'PT.Panasonic', 'agency', '077777777', '', '', '', '', '', '', 'batam', '', '', '', 'PENDING', '1'),
(5, 'PT.Sejahtera Bersama', 'agency', '089999999999', '', '', '', '', '', '', 'batam', '', '', '', 'PENDING', '1'),
(6, 'PT.Sejahtera Bersama', 'agency', '099999999', '', '', '', '', '', '', 'poltek', '', '', '', 'PENDING', '1'),
(7, 'PT.Sejahtera Bersama Kita', 'agency', '08111111111', '', '', '', '', '', '', 'batam', '', '', '', 'PENDING', '1'),
(9, 'PT.Panasonic aja', 'agency', '081111111111', '', '', '', '', '', '', 'batam', '', '', '', 'PENDING', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_discussion`
--

CREATE TABLE `tb_discussion` (
  `id_discuss` int(11) NOT NULL,
  `id_internship` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_comment` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_document`
--

CREATE TABLE `tb_document` (
  `id` int(11) NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_document`
--

INSERT INTO `tb_document` (`id`, `file`) VALUES
(1, 'Part 2.jpg'),
(5, 'example.pdf'),
(6, 'All Chapter New 28 april.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_industry_feedback`
--

CREATE TABLE `tb_industry_feedback` (
  `id_industry_feedback` int(11) NOT NULL,
  `id_internship` int(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `catatan_utk_mahasiswa` text NOT NULL,
  `catatan_utk_poltek` text NOT NULL,
  `layak_diterima` text NOT NULL,
  `langsung_diterima` text NOT NULL,
  `nilai_akhir` varchar(100) NOT NULL,
  `etika` int(4) NOT NULL,
  `keahlian_kompetensi` int(4) NOT NULL,
  `keahlian_bahasa` int(4) NOT NULL,
  `penggunaan_ti` int(4) NOT NULL,
  `komunikasi` int(4) NOT NULL,
  `kerjasama` int(4) NOT NULL,
  `pengembangan_diri` int(4) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_internship`
--

CREATE TABLE `tb_internship` (
  `id_internship` int(11) NOT NULL,
  `nim` varchar(25) CHARACTER SET utf8mb4 NOT NULL,
  `id_company` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `id_user_company` int(11) DEFAULT NULL,
  `nik` int(11) DEFAULT NULL,
  `status` enum('YES','NO','PENDING') NOT NULL,
  `file1` varchar(100) NOT NULL,
  `file2` varchar(100) NOT NULL,
  `file3` varchar(100) NOT NULL,
  `file4` varchar(100) NOT NULL,
  `file5` varchar(100) NOT NULL,
  `date_finalreport` date DEFAULT NULL,
  `final_report` varchar(100) NOT NULL,
  `internship_period` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_internship`
--

INSERT INTO `tb_internship` (`id_internship`, `nim`, `id_company`, `start_date`, `end_date`, `id_user_company`, `nik`, `status`, `file1`, `file2`, `file3`, `file4`, `file5`, `date_finalreport`, `final_report`, `internship_period`) VALUES
(22, '3311901040', 1, '2022-01-25', '2022-01-25', NULL, NULL, 'PENDING', '3311901040 _3024772.pdf', '', '', '', '', '2022-01-26', '3311901040 _6027734.pdf', '3 bulan'),
(25, '3311901041', 7, '2022-01-25', '2022-04-01', NULL, NULL, 'PENDING', '', '', '', '', '', NULL, '', '3 bulan'),
(30, '3311901043', 9, '2022-01-26', '2022-03-05', NULL, NULL, 'PENDING', '', '', '', '', '', NULL, '', '1 bulan'),
(31, '1111', 3, '2022-01-26', '2022-01-26', NULL, NULL, 'PENDING', '1111 _3533144.pdf', '', '', '', '', NULL, '', '2 bulan'),
(33, '3311901040', 1, '0000-00-00', '0000-00-00', NULL, NULL, 'PENDING', '3311901040 _137088.pdf', '', '', '', '', NULL, '', '1 bulan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_job_description`
--

CREATE TABLE `tb_job_description` (
  `id_jobdesc` int(11) NOT NULL,
  `id_internship` int(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `program_study` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_lecturer`
--

CREATE TABLE `tb_lecturer` (
  `nik` int(11) NOT NULL,
  `name_lecturer` varchar(100) NOT NULL,
  `program_study` varchar(100) NOT NULL,
  `email_polibatam` varchar(100) NOT NULL,
  `other_email` varchar(100) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_type` enum('koordinator','pembimbing') NOT NULL,
  `status` enum('active','not_active') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_logbook`
--

CREATE TABLE `tb_logbook` (
  `id_logbook` int(11) NOT NULL,
  `id_internship` int(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `documentation` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `week_num` varchar(10) NOT NULL,
  `approval_spv` enum('Pending','Yes','No') NOT NULL,
  `approval_dpm` enum('Pending','Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_offer`
--

CREATE TABLE `tb_offer` (
  `id_offer` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `position` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `requirement` varchar(100) NOT NULL,
  `employer_type` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `job_type` varchar(100) NOT NULL,
  `salary_range` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `offer_type` enum('full_employment','part_time','internship') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_offer`
--

INSERT INTO `tb_offer` (`id_offer`, `id_company`, `position`, `description`, `requirement`, `employer_type`, `city`, `job_type`, `salary_range`, `start_date`, `end_date`, `offer_type`) VALUES
(1, 1, 'Programmer ', '-', '-', '-', 'Batam', '-', '-', '2022-01-04', '2022-01-28', ''),
(2, 1, 'Kasir', '-', '-', '-', '-', '-', '-', '2022-01-05', '2022-01-14', 'internship'),
(3, 3, 'Chef', '-', '-', '-', '-', '-', '-', '0000-00-00', '0000-00-00', 'internship');

-- --------------------------------------------------------

--
-- Table structure for table `tb_student_feedback`
--

CREATE TABLE `tb_student_feedback` (
  `id_student_feedback` int(11) NOT NULL,
  `id_internship` int(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `date` date DEFAULT NULL,
  `posisi` int(4) NOT NULL,
  `ilmu_dari_poltek` int(4) NOT NULL,
  `ilmu_baru` int(4) NOT NULL,
  `data_magang` int(4) NOT NULL,
  `kesan` text NOT NULL,
  `kendala` text NOT NULL,
  `masukan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_student_internship`
--

CREATE TABLE `tb_student_internship` (
  `nim` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `other_email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `no_whatsapp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_student_internship`
--

INSERT INTO `tb_student_internship` (`nim`, `name`, `email`, `other_email`, `phone`, `no_whatsapp`) VALUES
('1111', 'oiya', '', '', '', ''),
('2222', 'yasiapa', '', '', '', ''),
('3311901040', 'sintia', '', '', '', ''),
('3311901041', 'siapa', '', '', '', ''),
('3311901043', 'ha', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_company`
--

CREATE TABLE `tb_user_company` (
  `id_user_company` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_company`
--

INSERT INTO `tb_user_company` (`id_user_company`, `id_company`, `user_fullname`, `user_phone`, `user_email`, `username`, `password`, `user_type`) VALUES
(24, 1, 'Yulia Wulandari', '085156430801', 'pinkmylovely@gmail.com', 'YULIA.3311901044', '$2y$10$FA/9tkaHovTEh/AtfW/ZL.xi9qcoIiYiHALPuZrFUG6RA2LlTZ1.q', 'supervisor'),
(26, 1, 'Christoper Bangchan', '081267053132', 'jype.bangchanchris@gmail.com', 'BANGCHAN.001', '$2y$10$QfP9oHbH8j4j9EthxfYw1e76zcdMyOtACviVNm0xMckHdTrhrX8be', 'HRD'),
(27, 3, 'Hwang Hyunjin', '085743218976', 'jype.hwang@gmail.com', 'HWANG.002', '$2y$10$B3liWnsLkgtFKFUvMAzZweY2Fm9yZ0R1oDjnI6lcNnqlzJLiagrcK', 'HRD'),
(32, 1, 'Seo Changbin', '085156430801', 'adsad@gmal.co', 'KEZIA.3311901045', '$2y$10$J2IyGCN1C0KKjpYCccrGJ.fg5EAW77hlYXoEn749k8QmUwlVPP.I6', 'supervisor'),
(33, 1, 'Kezia Angelina Sinaga', '081267053132', 'cyntyamaharani@gmail.com', 'cyntya.3311901040', '$2y$10$1JMlvC0z71wANUkkIjuJgevUtrn54KZuQMJLUQBl.8F/GbVsoqh9S', 'supervisor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_applicant`
--
ALTER TABLE `tb_applicant`
  ADD PRIMARY KEY (`id_applicant`),
  ADD UNIQUE KEY `nim_2` (`nim`),
  ADD KEY `id_offer` (`id_offer`),
  ADD KEY `id_internship` (`id_internship`),
  ADD KEY `id_company` (`id_company`),
  ADD KEY `nim` (`nim`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `tb_attendance`
--
ALTER TABLE `tb_attendance`
  ADD PRIMARY KEY (`id_attendance`),
  ADD KEY `id_internship` (`id_internship`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `tb_company`
--
ALTER TABLE `tb_company`
  ADD PRIMARY KEY (`id_company`);

--
-- Indexes for table `tb_discussion`
--
ALTER TABLE `tb_discussion`
  ADD PRIMARY KEY (`id_discuss`),
  ADD KEY `id_internship` (`id_internship`);

--
-- Indexes for table `tb_document`
--
ALTER TABLE `tb_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_industry_feedback`
--
ALTER TABLE `tb_industry_feedback`
  ADD PRIMARY KEY (`id_industry_feedback`),
  ADD KEY `id_internship` (`id_internship`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `tb_internship`
--
ALTER TABLE `tb_internship`
  ADD PRIMARY KEY (`id_internship`),
  ADD KEY `id_user_company` (`id_user_company`),
  ADD KEY `id_company` (`id_company`),
  ADD KEY `status` (`status`),
  ADD KEY `nim` (`nim`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `tb_job_description`
--
ALTER TABLE `tb_job_description`
  ADD PRIMARY KEY (`id_jobdesc`),
  ADD KEY `id_internship` (`id_internship`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `tb_lecturer`
--
ALTER TABLE `tb_lecturer`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_logbook`
--
ALTER TABLE `tb_logbook`
  ADD PRIMARY KEY (`id_logbook`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_internship` (`id_internship`);

--
-- Indexes for table `tb_offer`
--
ALTER TABLE `tb_offer`
  ADD PRIMARY KEY (`id_offer`),
  ADD KEY `id_company` (`id_company`);

--
-- Indexes for table `tb_student_feedback`
--
ALTER TABLE `tb_student_feedback`
  ADD PRIMARY KEY (`id_student_feedback`),
  ADD KEY `id_internship` (`id_internship`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `tb_student_internship`
--
ALTER TABLE `tb_student_internship`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tb_user_company`
--
ALTER TABLE `tb_user_company`
  ADD PRIMARY KEY (`id_user_company`),
  ADD KEY `id_company` (`id_company`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_applicant`
--
ALTER TABLE `tb_applicant`
  MODIFY `id_applicant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `tb_attendance`
--
ALTER TABLE `tb_attendance`
  MODIFY `id_attendance` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_company`
--
ALTER TABLE `tb_company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_discussion`
--
ALTER TABLE `tb_discussion`
  MODIFY `id_discuss` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_document`
--
ALTER TABLE `tb_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_industry_feedback`
--
ALTER TABLE `tb_industry_feedback`
  MODIFY `id_industry_feedback` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_internship`
--
ALTER TABLE `tb_internship`
  MODIFY `id_internship` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_job_description`
--
ALTER TABLE `tb_job_description`
  MODIFY `id_jobdesc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_lecturer`
--
ALTER TABLE `tb_lecturer`
  MODIFY `nik` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_logbook`
--
ALTER TABLE `tb_logbook`
  MODIFY `id_logbook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_offer`
--
ALTER TABLE `tb_offer`
  MODIFY `id_offer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_student_feedback`
--
ALTER TABLE `tb_student_feedback`
  MODIFY `id_student_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user_company`
--
ALTER TABLE `tb_user_company`
  MODIFY `id_user_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_applicant`
--
ALTER TABLE `tb_applicant`
  ADD CONSTRAINT `tb_applicant_ibfk_1` FOREIGN KEY (`id_offer`) REFERENCES `tb_offer` (`id_offer`),
  ADD CONSTRAINT `tb_applicant_ibfk_2` FOREIGN KEY (`id_internship`) REFERENCES `tb_internship` (`id_internship`),
  ADD CONSTRAINT `tb_applicant_ibfk_3` FOREIGN KEY (`id_company`) REFERENCES `tb_company` (`id_company`),
  ADD CONSTRAINT `tb_applicant_ibfk_4` FOREIGN KEY (`nim`) REFERENCES `tb_student_internship` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_attendance`
--
ALTER TABLE `tb_attendance`
  ADD CONSTRAINT `tb_attendance_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `tb_student_internship` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_attendance_ibfk_2` FOREIGN KEY (`id_internship`) REFERENCES `tb_internship` (`id_internship`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_industry_feedback`
--
ALTER TABLE `tb_industry_feedback`
  ADD CONSTRAINT `tb_industry_feedback_ibfk_1` FOREIGN KEY (`id_internship`) REFERENCES `tb_internship` (`id_internship`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_industry_feedback_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `tb_student_internship` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_internship`
--
ALTER TABLE `tb_internship`
  ADD CONSTRAINT `tb_internship_ibfk_2` FOREIGN KEY (`id_company`) REFERENCES `tb_company` (`id_company`),
  ADD CONSTRAINT `tb_internship_ibfk_3` FOREIGN KEY (`id_user_company`) REFERENCES `tb_user_company` (`id_user_company`),
  ADD CONSTRAINT `tb_internship_ibfk_4` FOREIGN KEY (`nik`) REFERENCES `tb_lecturer` (`nik`),
  ADD CONSTRAINT `tb_internship_ibfk_5` FOREIGN KEY (`nim`) REFERENCES `tb_student_internship` (`nim`);

--
-- Constraints for table `tb_job_description`
--
ALTER TABLE `tb_job_description`
  ADD CONSTRAINT `tb_job_description_ibfk_1` FOREIGN KEY (`id_internship`) REFERENCES `tb_internship` (`id_internship`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_job_description_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `tb_student_internship` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_logbook`
--
ALTER TABLE `tb_logbook`
  ADD CONSTRAINT `tb_logbook_ibfk_1` FOREIGN KEY (`id_internship`) REFERENCES `tb_internship` (`id_internship`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_logbook_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `tb_student_internship` (`nim`);

--
-- Constraints for table `tb_offer`
--
ALTER TABLE `tb_offer`
  ADD CONSTRAINT `tb_offer_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `tb_company` (`id_company`);

--
-- Constraints for table `tb_student_feedback`
--
ALTER TABLE `tb_student_feedback`
  ADD CONSTRAINT `tb_student_feedback_ibfk_1` FOREIGN KEY (`id_internship`) REFERENCES `tb_internship` (`id_internship`),
  ADD CONSTRAINT `tb_student_feedback_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `tb_student_internship` (`nim`);

--
-- Constraints for table `tb_user_company`
--
ALTER TABLE `tb_user_company`
  ADD CONSTRAINT `tb_user_company_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `tb_company` (`id_company`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
