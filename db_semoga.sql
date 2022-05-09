-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 07:10 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

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
  `status_applicant` enum('YES','NO','PENDING') NOT NULL
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
-- Table structure for table `tb_ceklis_jobdesc_intern`
--

CREATE TABLE `tb_ceklis_jobdesc_intern` (
  `id_ceklis` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `id_jobdesc_intern` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_comment_discussion`
--

CREATE TABLE `tb_comment_discussion` (
  `id_comment` int(11) NOT NULL,
  `id_discuss` int(11) NOT NULL,
  `replied_by` varchar(25) NOT NULL,
  `comment` text NOT NULL,
  `replied_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_company`
--

CREATE TABLE `tb_company` (
  `id_company` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
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
  `status` enum('PENDING','VERIFIED','NOT_VERIFIED') NOT NULL,
  `access_type` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_company`
--

INSERT INTO `tb_company` (`id_company`, `company_name`, `type`, `phone`, `email`, `website`, `facebook`, `twitter`, `instagram`, `header`, `address`, `province`, `city`, `description`, `status`, `access_type`) VALUES
(1, 'Stark Industries', 'engineering', '0778-1256-7890', 'starkindustries@stark.company', 'psteam.ac.id', 'polibatam software team', '@polibatamsoftwareteam', '@PSTEAM.id', 'I\'m Iron Man !', 'Rumah Adam', 'USA', 'Manhattan City', 'What is Lorem Ipsum?^^\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. \r\nThe point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. ', 'VERIFIED', ''),
(3, 'Sumitomo', '', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Hello, this is sumitomo description', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_jobdesc`
--

CREATE TABLE `tb_detail_jobdesc` (
  `id_detail` int(11) NOT NULL,
  `id_jobdesc` int(11) NOT NULL,
  `job_type` text NOT NULL,
  `job_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_discussion`
--

CREATE TABLE `tb_discussion` (
  `id_discuss` int(11) NOT NULL,
  `started_by` varchar(55) NOT NULL,
  `date_posted` datetime NOT NULL,
  `who_can_see` varchar(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `discuss` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_industry_feedback`
--

CREATE TABLE `tb_industry_feedback` (
  `id_industry_feedback` int(11) NOT NULL,
  `id_internship` int(11) NOT NULL,
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
  `id_user_company` int(11) DEFAULT NULL,
  `nik` int(11) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `apply_date` date NOT NULL,
  `status_intern` enum('YES','NO','PENDING') NOT NULL,
  `file1` varchar(100) NOT NULL,
  `file2` varchar(100) NOT NULL,
  `file3` varchar(100) NOT NULL,
  `file4` varchar(100) NOT NULL,
  `date_finalreport` date DEFAULT NULL,
  `final_report` varchar(100) DEFAULT NULL,
  `internship_period` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jobdesc`
--

CREATE TABLE `tb_jobdesc` (
  `id_jobdesc` int(11) NOT NULL,
  `prodi_name` varchar(100) NOT NULL,
  `nik` int(11) NOT NULL,
  `question_1` text NOT NULL,
  `question_2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jobdesc_intern`
--

CREATE TABLE `tb_jobdesc_intern` (
  `id_jobdesc_intern` int(11) NOT NULL,
  `id_jobdesc` int(11) NOT NULL,
  `id_internship` int(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `timestamp_approval` datetime NOT NULL,
  `answer_1` text NOT NULL,
  `answer_2` text NOT NULL
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
  `lecturer_phone` varchar(15) NOT NULL,
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
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
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
(4, 1, 'Programmer IT', 'Nothing To Do', '-', '-', 'Batam', '-', '-', '2022-01-04', '2022-01-14', 'internship');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profile_detail_comp`
--

CREATE TABLE `tb_profile_detail_comp` (
  `id_detail_profile` int(11) NOT NULL,
  `id_profile_jobdesc` int(11) NOT NULL,
  `unit_kompetensi` varchar(100) NOT NULL,
  `kode_matkul` varchar(10) NOT NULL,
  `matkul` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_profile_detail_unit`
--

CREATE TABLE `tb_profile_detail_unit` (
  `id_detail_unit` int(11) NOT NULL,
  `id_detail_profile` int(11) NOT NULL,
  `detail_unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_profile_jobdesc`
--

CREATE TABLE `tb_profile_jobdesc` (
  `id_profile_jobdesc` int(11) NOT NULL,
  `kode_prodi` varchar(10) NOT NULL,
  `nama_profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_student_detail_profile`
--

CREATE TABLE `tb_student_detail_profile` (
  `id_student_detail_profile` int(11) NOT NULL,
  `id_profile_jobdesc` int(11) NOT NULL,
  `id_detail_profile` int(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `nilai` varchar(5) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_student_feedback`
--

CREATE TABLE `tb_student_feedback` (
  `id_student_feedback` int(11) NOT NULL,
  `id_internship` int(11) NOT NULL,
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
  `study_program` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `other_email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_student_internship`
--

INSERT INTO `tb_student_internship` (`nim`, `name`, `study_program`, `email`, `other_email`, `phone`) VALUES
('3311901044', 'Yulia Wulandari', 'Informatika', 'yulia@gmail.com', 'googlingmyname@gmail.com', '0878812674'),
('3311901088', 'Cyntya Maharani', 'Logistik', 'cyntyamaharani@gmail.com', 'cyncyn@gmail.com', '0878812674'),
('4311901038', 'Adam Firdaus', 'Multimedia', 'adamfrdsid@gmail.com', 'googlingmyname@gmail.com', '0878812674');

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
  `user_type` enum('HRD','supervisor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_company`
--

INSERT INTO `tb_user_company` (`id_user_company`, `id_company`, `user_fullname`, `user_phone`, `user_email`, `username`, `password`, `user_type`) VALUES
(1, 1, 'Christoper Columbus', '081267053138', 'bangchrist@gmail.com', 'HRD.PSTEAM', '$2y$10$V71GlEXMDG.c8EiJKL8SC.9071yvkoef1jrsOma.QvBopDXnKC89K', 'HRD'),
(8, 1, 'Lee Min Ho', '085156430801', 'leeminhoactor@gmail.com', 'SUPERVISOR2', '$2y$10$xCXnC9xlkoOFMLfpaZfWUuFesVCdKKdSW3i.6oyIuY0L7HZO1DtTK', 'supervisor');

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
  ADD KEY `nim` (`nim`),
  ADD KEY `tb_applicant_ibfk_2` (`id_internship`),
  ADD KEY `tb_applicant_ibfk_3` (`id_company`);

--
-- Indexes for table `tb_attendance`
--
ALTER TABLE `tb_attendance`
  ADD PRIMARY KEY (`id_attendance`),
  ADD KEY `id_internship` (`id_internship`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `tb_ceklis_jobdesc_intern`
--
ALTER TABLE `tb_ceklis_jobdesc_intern`
  ADD PRIMARY KEY (`id_ceklis`),
  ADD KEY `id_detail` (`id_detail`),
  ADD KEY `id_jobdesc_intern` (`id_jobdesc_intern`);

--
-- Indexes for table `tb_comment_discussion`
--
ALTER TABLE `tb_comment_discussion`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_discuss` (`id_discuss`);

--
-- Indexes for table `tb_company`
--
ALTER TABLE `tb_company`
  ADD PRIMARY KEY (`id_company`);

--
-- Indexes for table `tb_detail_jobdesc`
--
ALTER TABLE `tb_detail_jobdesc`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_jobdesc` (`id_jobdesc`);

--
-- Indexes for table `tb_discussion`
--
ALTER TABLE `tb_discussion`
  ADD PRIMARY KEY (`id_discuss`);

--
-- Indexes for table `tb_industry_feedback`
--
ALTER TABLE `tb_industry_feedback`
  ADD PRIMARY KEY (`id_industry_feedback`),
  ADD KEY `id_internship` (`id_internship`);

--
-- Indexes for table `tb_internship`
--
ALTER TABLE `tb_internship`
  ADD PRIMARY KEY (`id_internship`),
  ADD KEY `id_company` (`id_company`),
  ADD KEY `nik` (`nik`),
  ADD KEY `id_user_company` (`id_user_company`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `tb_jobdesc`
--
ALTER TABLE `tb_jobdesc`
  ADD PRIMARY KEY (`id_jobdesc`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `tb_jobdesc_intern`
--
ALTER TABLE `tb_jobdesc_intern`
  ADD PRIMARY KEY (`id_jobdesc_intern`),
  ADD KEY `id_jobdesc` (`id_jobdesc`),
  ADD KEY `id_internship` (`id_internship`);

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
  ADD KEY `id_internship` (`id_internship`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `tb_offer`
--
ALTER TABLE `tb_offer`
  ADD PRIMARY KEY (`id_offer`),
  ADD KEY `id_company` (`id_company`);

--
-- Indexes for table `tb_profile_detail_comp`
--
ALTER TABLE `tb_profile_detail_comp`
  ADD PRIMARY KEY (`id_detail_profile`),
  ADD KEY `id_profile_jobdesc` (`id_profile_jobdesc`);

--
-- Indexes for table `tb_profile_detail_unit`
--
ALTER TABLE `tb_profile_detail_unit`
  ADD PRIMARY KEY (`id_detail_unit`),
  ADD KEY `id_detail_profile` (`id_detail_profile`);

--
-- Indexes for table `tb_profile_jobdesc`
--
ALTER TABLE `tb_profile_jobdesc`
  ADD PRIMARY KEY (`id_profile_jobdesc`);

--
-- Indexes for table `tb_student_detail_profile`
--
ALTER TABLE `tb_student_detail_profile`
  ADD PRIMARY KEY (`id_student_detail_profile`),
  ADD KEY `id_profile_jobdesc` (`id_profile_jobdesc`),
  ADD KEY `id_detail_profile` (`id_detail_profile`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `tb_student_feedback`
--
ALTER TABLE `tb_student_feedback`
  ADD PRIMARY KEY (`id_student_feedback`),
  ADD KEY `id_internship` (`id_internship`);

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
  MODIFY `id_applicant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `tb_attendance`
--
ALTER TABLE `tb_attendance`
  MODIFY `id_attendance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_ceklis_jobdesc_intern`
--
ALTER TABLE `tb_ceklis_jobdesc_intern`
  MODIFY `id_ceklis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `tb_comment_discussion`
--
ALTER TABLE `tb_comment_discussion`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_company`
--
ALTER TABLE `tb_company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_detail_jobdesc`
--
ALTER TABLE `tb_detail_jobdesc`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_discussion`
--
ALTER TABLE `tb_discussion`
  MODIFY `id_discuss` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_industry_feedback`
--
ALTER TABLE `tb_industry_feedback`
  MODIFY `id_industry_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_internship`
--
ALTER TABLE `tb_internship`
  MODIFY `id_internship` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_jobdesc`
--
ALTER TABLE `tb_jobdesc`
  MODIFY `id_jobdesc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_jobdesc_intern`
--
ALTER TABLE `tb_jobdesc_intern`
  MODIFY `id_jobdesc_intern` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `tb_lecturer`
--
ALTER TABLE `tb_lecturer`
  MODIFY `nik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117177;

--
-- AUTO_INCREMENT for table `tb_logbook`
--
ALTER TABLE `tb_logbook`
  MODIFY `id_logbook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_offer`
--
ALTER TABLE `tb_offer`
  MODIFY `id_offer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_profile_detail_comp`
--
ALTER TABLE `tb_profile_detail_comp`
  MODIFY `id_detail_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_profile_detail_unit`
--
ALTER TABLE `tb_profile_detail_unit`
  MODIFY `id_detail_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_profile_jobdesc`
--
ALTER TABLE `tb_profile_jobdesc`
  MODIFY `id_profile_jobdesc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_student_detail_profile`
--
ALTER TABLE `tb_student_detail_profile`
  MODIFY `id_student_detail_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_student_feedback`
--
ALTER TABLE `tb_student_feedback`
  MODIFY `id_student_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user_company`
--
ALTER TABLE `tb_user_company`
  MODIFY `id_user_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_applicant`
--
ALTER TABLE `tb_applicant`
  ADD CONSTRAINT `tb_applicant_ibfk_1` FOREIGN KEY (`id_offer`) REFERENCES `tb_offer` (`id_offer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_applicant_ibfk_2` FOREIGN KEY (`id_internship`) REFERENCES `tb_internship` (`id_internship`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_applicant_ibfk_3` FOREIGN KEY (`id_company`) REFERENCES `tb_company` (`id_company`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_applicant_ibfk_4` FOREIGN KEY (`nim`) REFERENCES `tb_student_internship` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_attendance`
--
ALTER TABLE `tb_attendance`
  ADD CONSTRAINT `tb_attendance_ibfk_2` FOREIGN KEY (`id_internship`) REFERENCES `tb_internship` (`id_internship`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_attendance_ibfk_3` FOREIGN KEY (`nim`) REFERENCES `tb_student_internship` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_ceklis_jobdesc_intern`
--
ALTER TABLE `tb_ceklis_jobdesc_intern`
  ADD CONSTRAINT `tb_ceklis_jobdesc_intern_ibfk_1` FOREIGN KEY (`id_jobdesc_intern`) REFERENCES `tb_jobdesc_intern` (`id_jobdesc_intern`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_ceklis_jobdesc_intern_ibfk_2` FOREIGN KEY (`id_detail`) REFERENCES `tb_detail_jobdesc` (`id_detail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_comment_discussion`
--
ALTER TABLE `tb_comment_discussion`
  ADD CONSTRAINT `tb_comment_discussion_ibfk_2` FOREIGN KEY (`id_discuss`) REFERENCES `tb_discussion` (`id_discuss`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_detail_jobdesc`
--
ALTER TABLE `tb_detail_jobdesc`
  ADD CONSTRAINT `tb_detail_jobdesc_ibfk_1` FOREIGN KEY (`id_jobdesc`) REFERENCES `tb_jobdesc` (`id_jobdesc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_industry_feedback`
--
ALTER TABLE `tb_industry_feedback`
  ADD CONSTRAINT `tb_industry_feedback_ibfk_1` FOREIGN KEY (`id_internship`) REFERENCES `tb_internship` (`id_internship`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_internship`
--
ALTER TABLE `tb_internship`
  ADD CONSTRAINT `tb_internship_ibfk_2` FOREIGN KEY (`id_company`) REFERENCES `tb_company` (`id_company`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_internship_ibfk_5` FOREIGN KEY (`nim`) REFERENCES `tb_student_internship` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_internship_ibfk_6` FOREIGN KEY (`id_user_company`) REFERENCES `tb_user_company` (`id_user_company`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_internship_ibfk_7` FOREIGN KEY (`nik`) REFERENCES `tb_lecturer` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_jobdesc`
--
ALTER TABLE `tb_jobdesc`
  ADD CONSTRAINT `tb_jobdesc_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tb_lecturer` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_jobdesc_intern`
--
ALTER TABLE `tb_jobdesc_intern`
  ADD CONSTRAINT `tb_jobdesc_intern_ibfk_1` FOREIGN KEY (`id_jobdesc`) REFERENCES `tb_jobdesc` (`id_jobdesc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jobdesc_intern_ibfk_2` FOREIGN KEY (`id_internship`) REFERENCES `tb_internship` (`id_internship`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_logbook`
--
ALTER TABLE `tb_logbook`
  ADD CONSTRAINT `tb_logbook_ibfk_1` FOREIGN KEY (`id_internship`) REFERENCES `tb_internship` (`id_internship`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_logbook_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `tb_student_internship` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_offer`
--
ALTER TABLE `tb_offer`
  ADD CONSTRAINT `tb_offer_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `tb_company` (`id_company`);

--
-- Constraints for table `tb_profile_detail_comp`
--
ALTER TABLE `tb_profile_detail_comp`
  ADD CONSTRAINT `tb_profile_detail_comp_ibfk_1` FOREIGN KEY (`id_profile_jobdesc`) REFERENCES `tb_profile_jobdesc` (`id_profile_jobdesc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_profile_detail_unit`
--
ALTER TABLE `tb_profile_detail_unit`
  ADD CONSTRAINT `tb_profile_detail_unit_ibfk_1` FOREIGN KEY (`id_detail_profile`) REFERENCES `tb_profile_detail_comp` (`id_detail_profile`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_student_detail_profile`
--
ALTER TABLE `tb_student_detail_profile`
  ADD CONSTRAINT `tb_student_detail_profile_ibfk_1` FOREIGN KEY (`id_profile_jobdesc`) REFERENCES `tb_profile_jobdesc` (`id_profile_jobdesc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_student_detail_profile_ibfk_2` FOREIGN KEY (`id_detail_profile`) REFERENCES `tb_profile_detail_comp` (`id_detail_profile`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_student_detail_profile_ibfk_3` FOREIGN KEY (`nim`) REFERENCES `tb_student_internship` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_student_feedback`
--
ALTER TABLE `tb_student_feedback`
  ADD CONSTRAINT `tb_student_feedback_ibfk_1` FOREIGN KEY (`id_internship`) REFERENCES `tb_internship` (`id_internship`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user_company`
--
ALTER TABLE `tb_user_company`
  ADD CONSTRAINT `tb_user_company_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `tb_company` (`id_company`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
