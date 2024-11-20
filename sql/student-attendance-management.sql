-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 07:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student-attendance-management`
--

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `batch` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`batch`) VALUES
('20Batch'),
('21Batch'),
('22Batch');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `code` varchar(150) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `labs` int(11) DEFAULT NULL,
  `assignments` int(11) DEFAULT NULL,
  `department` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `code`, `semester`, `labs`, `assignments`, `department`) VALUES
(1, 'Introduction to Programming', 'CS101', 5, 10, 5, 'Computing'),
(2, 'DataStructures', 'CS102', 5, 8, 6, 'Computing'),
(3, 'Algorithms', 'CS201', 5, 6, 7, 'Computing'),
(4, 'Databases', 'CS202', 5, 9, 4, 'Computing'),
(5, 'Operating Systems', 'CS301', 5, 7, 5, 'Computing'),
(7, 'Software Engineering', 'SE201', 3, 10, 5, 'Computing'),
(8, 'Web Development', 'WD101', 3, 8, 6, 'Computing'),
(9, 'Mobile App Development', 'MA301', 3, 6, 7, 'Computing'),
(10, 'Machine Learning', 'ML401', 3, 9, 4, 'Computing'),
(11, 'Cyber Security', 'CS501', 3, 7, 5, 'Computing'),
(12, 'Cloud Computing', 'CC601', 3, 5, 6, 'Computing'),
(13, 'Software Engineering', 'SE201', 7, 10, 5, 'Computing'),
(14, 'Web Development', 'WD101', 7, 8, 6, 'Computing'),
(15, 'Mobile App Development', 'MA301', 7, 6, 7, 'Computing'),
(16, 'Machine Learning', 'ML401', 7, 9, 4, 'Computing'),
(17, 'Cyber Security', 'CS501', 7, 7, 5, 'Computing'),
(18, 'Cloud Computing', 'CC601', 7, 5, 6, 'Computing');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(250) NOT NULL,
  `department` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `position` varchar(250) NOT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `password`, `department`, `type`, `position`, `status`) VALUES
(2, 'Bob Smith', 'bob.smith@gmail.com', 'bob.smith', 'Electrical', 'lecturer', 'HOD', 'Null'),
(3, 'Charlie Brown', 'charlie.brown@gmail.com', 'charlie.brown', 'Computing', 'lecturer', 'Visiting lecturer', 'Null'),
(4, 'Diana Prince', 'diana.prince@gmail.com', 'diana.prince', 'Mechanical', 'lecturer', 'Lecturer', 'Null'),
(5, 'Eve Adams', 'eve.adams@gmail.com', 'eve.adams', 'Computing', 'lecturer', 'HOD', 'Null'),
(6, 'Frank White', 'frank.white@gmail.com', 'frank.white', 'Mechanical', 'lecturer', 'Visiting lecturer', 'Null');

-- --------------------------------------------------------

--
-- Table structure for table `ma`
--

CREATE TABLE `ma` (
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT 'MA'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ma`
--

INSERT INTO `ma` (`email`, `password`, `type`) VALUES
('MA.UOJ@gmail.com', '$2y$10$YyknG.i308RcXoTKNtQtUeb0UmPneQ3k8jC5fbYs8Azx6ZVqb9Cdy', 'MA');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(11) NOT NULL,
  `semester` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `semester`) VALUES
(1, 'Semester 1'),
(2, 'Semester 2'),
(3, 'Semester 3'),
(4, 'Semester 4'),
(5, 'Semester 5'),
(6, 'Semester 6'),
(7, 'Semester 7'),
(8, 'Semester 8');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `regNo` varchar(150) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `semester` int(11) NOT NULL,
  `status` varchar(150) NOT NULL,
  `type` varchar(150) NOT NULL,
  `batch` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `regNo`, `email`, `password`, `semester`, `status`, `type`, `batch`) VALUES
(1, 'John Vick', '2021e001', '2021e001@gmail.com', '2021e001', 5, 'Active', 'student', '21Batch'),
(3, 'Emily', '2021e003', '2021e003@gmail.com', '$2y$10$U7qlBD.896Dvms4RutOTFO9HUvwUOG9wsC95acqZqyQVeiLqYcF8K', 5, 'Pending', 'student', '21Batch'),
(4, 'Michael', '2021e004', '2021e004@gmail.com', '2021e004', 5, 'Null', 'student', '21Batch'),
(5, 'Mich', '2021e005', '2021e005@gmail.com', '2021e005', 5, 'Null', 'student', '21Batch'),
(6, 'John', '2022e001', '2022e001@gmail.com', '2022e001', 3, 'Null', 'student', '22Batch'),
(8, 'Emily', '2022e003', '2022e003@gmail.com', '2022e003', 3, 'Null', 'student', '22Batch'),
(9, 'Michael', '2022e004', '2022e004@gmail.com', '2022e004', 3, 'Null', 'student', '22Batch'),
(10, 'Sarah', '2022e005', '2022e005@gmail.com', '2022e005', 3, 'Null', 'student', '22Batch'),
(12, 'Laura', '2020e002', '2020e002@gmail.com', '2020e002', 7, 'Null', 'student', '20Batch'),
(13, 'David', '2020e003', '2020e003@gmail.com', '2020e003', 7, 'Null', 'student', '20Batch'),
(14, 'Emma', '2020e004', '2020e004@gmail.com', '2020e004', 7, 'Null', 'student', '20Batch'),
(83, 'Fahham', '2021e101', '2021e101@gmail.com', '2021e101', 5, 'Null', 'student', '21Batch');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`batch`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_semester` (`semester`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_semester_id` (`semester`),
  ADD KEY `fk_batch` (`batch`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `fk_semester` FOREIGN KEY (`semester`) REFERENCES `semesters` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_batch` FOREIGN KEY (`batch`) REFERENCES `batches` (`batch`),
  ADD CONSTRAINT `fk_semester_id` FOREIGN KEY (`semester`) REFERENCES `semesters` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
