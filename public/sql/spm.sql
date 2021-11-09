  -- phpMyAdmin SQL Dump
  -- version 4.9.2
  -- https://www.phpmyadmin.net/
  --
  -- Host: 127.0.0.1:3306
  -- Generation Time: Nov 04, 2021 at 06:51 AM
  -- Server version: 8.0.18
  -- PHP Version: 7.4.0

  SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
  SET AUTOCOMMIT = 0;
  START TRANSACTION;
  SET time_zone = "+00:00";


  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;

  --
  -- Database: `spm`
  --
  CREATE DATABASE IF NOT EXISTS `spm` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
  USE `spm`;

  -- --------------------------------------------------------

  --
  -- Table structure for table `class`
  --

  DROP TABLE IF EXISTS `class`;
  CREATE TABLE IF NOT EXISTS `class` (
  `course_id` varchar(10) NOT NULL,
  `class_id` varchar(10) NOT NULL,
  `trainer_name` varchar(100) NOT NULL,
  `trainer_user_name` varchar(100) NOT NULL,
  `class_start_datetime` datetime NOT NULL,
  `class_end_datetime` datetime NOT NULL,
  `enrolment_start_datetime` datetime NOT NULL,
  `enrolment_end_datetime` datetime NOT NULL,
  `current_class_size` int(11) NOT NULL,
  `total_class_size` int(11) NOT NULL,
  `final_quiz_id` varchar(100) NULL,
  PRIMARY KEY (`course_id`,`class_id`),
  KEY `class_fk3` (`final_quiz_id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  --
  -- Dumping data for table `class`
  --

  INSERT INTO `class` (`course_id`, `class_id`, `trainer_name`, `trainer_user_name`, `class_start_datetime`,
  `class_end_datetime`, `enrolment_start_datetime`, `enrolment_end_datetime`, `current_class_size`, `total_class_size`,
  `final_quiz_id`) VALUES
  ('EPSON101', 'G1', 'Ariel', 'ariel.2021', '2021-12-23 08:00', '2021-12-30 08:00', '2021-10-11 00:00', '2021-12-22
  00:00', 0, 5, 'EPSON_G_Final1'),
  ('EPSON101', 'G2', 'Ariel', 'ariel.2021', '2021-12-23 08:00:00', '2021-12-30 08:00', '2021-10-11 00:00', '2021-12-22
  00:00', 1, 5, 'EPSON_G_Final1'),
  ('EPSON101', 'G3', 'Blake', 'blake.2021', '2021-12-23 08:00', '2021-12-30 08:00', '2021-10-11 00:00', '2021-12-22
  00:00', 5, 5, 'EPSON_G_Final1'),
  ('EPSON102', 'G1', 'Crystal', 'crystal.2021', '2021-12-23 08:00', '2021-12-30 08:00', '2021-10-11 00:00', '2021-11-01
  00:00', 1, 5, 'EPSON_G_Final1'),
  ('EPSON102', 'G2', 'Dani', 'dani.2021', '2021-12-23 08:00', '2021-12-30 08:00', '2021-10-11 00:00', '2021-11-01
  00:00', 5, 5, 'EPSON_G_Final1'),
  ('XEROX101', 'G1', 'Crystal', 'crystal.2021', '2021-11-02 08:00', '2021-12-30 08:00', '2021-10-11 00:00', '2021-11-01
  00:00', 3, 5, 'XEROX_G_Final1'),
  ('XEROX101', 'G2', 'Crystal', 'crystal.2021', '2021-11-02 08:00', '2021-12-30 08:00', '2021-10-11 00:00', '2021-11-01
  00:00', 0, 5, 'XEROX_G_Final1');

  -- --------------------------------------------------------

  --
  -- Table structure for table `completed_courses`
  --

  DROP TABLE IF EXISTS `completed_courses`;
  CREATE TABLE IF NOT EXISTS `completed_courses` (
  `user_name` varchar(32) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `final_quiz_grade` decimal(5,2) NOT NULL,
  PRIMARY KEY (`user_name`,`course_id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  INSERT INTO `completed_courses` (`user_name`, `course_id`, `final_quiz_grade`) VALUES
  ('heather.2021', 'XEROX100', 90.00),
  ('isabel.2021', 'XEROX100', 90.00),
  ('jack.2021', 'XEROX100', 90.00),
  ('kymberly.2021', 'XEROX100', 90.00);

  -- --------------------------------------------------------

  --
  -- Table structure for table `course`
  --

  DROP TABLE IF EXISTS `course`;
  CREATE TABLE IF NOT EXISTS `course` (
  `course_id` varchar(10) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_desc` varchar(1000) NOT NULL,
  PRIMARY KEY (`course_id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  --
  -- Dumping data for table `course`
  --

  INSERT INTO `course` (`course_id`, `course_name`, `course_desc`) VALUES
  ('EPSON101', 'Fundamentals of Epson Scanners', 'This course will teach you all about the basics on the latest
  Epson-brand scanners.'),
  ('EPSON102', 'Advanced Epson Scanners', 'This course will teach you about the internal mechanics of the latest
  Epson-brand scanners.'),
  ('XEROX100', 'Fundamentals of Xerox', 'This course will teach you the fundamentals of handling Xerox-issued
  printers.'),
  ('XEROX101', 'Mechanics of Xerox', 'This course will teach you about the internal workings of a Xerox-based,
  standard-issued printer.'),
  ('XEROX200', 'Xerox Copier I', 'This course will teach you all you need to know about a Xerox Copier.');

  -- --------------------------------------------------------

  --
  -- Table structure for table `course_section_materials`
  --

  DROP TABLE IF EXISTS `course_section_materials`;
  CREATE TABLE IF NOT EXISTS `course_section_materials` (
  `course_id` varchar(10) NOT NULL,
  `class_id` varchar(10) NOT NULL,
  `section` int(11) NOT NULL,
  `materials` varchar(1000) NOT NULL,
  `quiz_id` varchar(100) NOT NULL,
  PRIMARY KEY (`course_id`,`class_id`,`section`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  INSERT INTO `course_section_materials` (`course_id`, `class_id`, `section`, `materials`, `quiz_id`) VALUES
  ('EPSON101', 'G1', 1, 'Materials 1', 'EPSON_UG_Test1'),
  ('EPSON101', 'G2', 1, 'Materials 1', 'EPSON_UG_Test1'),
  ('EPSON101', 'G3', 1, 'Materials 1', 'EPSON_UG_Test2'),
  ('EPSON102', 'G1', 1, 'Materials 1', 'EPSON_UG_Test2'),
  ('EPSON102', 'G2', 1, 'Materials 1', 'EPSON_UG_Test2'),
  ('XEROX101', 'G1', 1, 'Materials 1', 'XEROX_UG_Test1'),
  ('XEROX101', 'G2', 1, 'Materials 1', 'XEROX_UG_Test1');

  -- --------------------------------------------------------

  --
  -- Table structure for table `course_section_progress`
  --

  DROP TABLE IF EXISTS `course_section_progress`;
  CREATE TABLE IF NOT EXISTS `course_section_progress` (
  `user_name` varchar(32) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `class_id` varchar(10) NOT NULL,
  `section` int(11) NOT NULL,
  `section_materials_status` varchar(15) NOT NULL,
  `section_quiz_status` varchar(15) NOT NULL,
  PRIMARY KEY (`user_name`,`course_id`,`class_id`,`section`),
  KEY `course_section_progress_fk2` (`course_id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  INSERT INTO `course_section_progress` (`user_name`, `course_id`, `class_id`, `section`, `section_materials_status`,
  `section_quiz_status`) VALUES
  ('heather.2021', 'EPSON101', 'G2', 1, 'IN PROGRESS', 'IN PROGRESS'),
  ('isabel.2021', 'EPSON101', 'G3', 1, 'IN PROGRESS', 'IN PROGRESS'),
  ('jack.2021', 'EPSON101', 'G3', 1, 'IN PROGRESS', 'IN PROGRESS'),
  ('kymberly.2021', 'EPSON101', 'G3', 1, 'IN PROGRESS', 'IN PROGRESS'),
  ('leah.2021', 'EPSON101', 'G3', 1, 'IN PROGRESS', 'IN PROGRESS'),
  ('max.2021', 'EPSON101', 'G3', 1, 'IN PROGRESS', 'IN PROGRESS'),
  ('nora.2021', 'EPSON102', 'G1', 1, 'IN PROGRESS', 'IN PROGRESS'),
  ('olivia.2021', 'EPSON102', 'G2', 1, 'IN PROGRESS', 'IN PROGRESS'),
  ('phoenix.2021', 'EPSON102', 'G2', 1, 'IN PROGRESS', 'IN PROGRESS'),
  ('quinn.2021', 'EPSON102', 'G2', 1, 'IN PROGRESS', 'IN PROGRESS'),
  ('raven.2021', 'EPSON102', 'G2', 1, 'IN PROGRESS', 'IN PROGRESS'),
  ('sami.2021', 'EPSON102', 'G2', 1, 'IN PROGRESS', 'IN PROGRESS'),
  ('tiffany.2021', 'XEROX101', 'G1', 1, 'IN PROGRESS', 'IN PROGRESS'),
  ('uriah.2021', 'XEROX101', 'G1', 1, 'IN PROGRESS', 'IN PROGRESS'),
  ('vivi.2021', 'XEROX101', 'G1', 1, 'IN PROGRESS', 'IN PROGRESS');

  -- --------------------------------------------------------

  --
  -- Table structure for table `employee`
  --

  DROP TABLE IF EXISTS `employee`;
  CREATE TABLE IF NOT EXISTS `employee` (
  `user_name` varchar(32) NOT NULL,
  `employee_name` varchar(64) NOT NULL,
  `current_designation` varchar(64) NOT NULL,
  `department` varchar(64) NOT NULL,
  PRIMARY KEY (`user_name`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  --
  -- Dumping data for table `employee`
  --

  INSERT INTO `employee` (`user_name`, `employee_name`, `current_designation`, `department`) VALUES
  ('ariel.2021', 'Ariel', 'TRAINER', 'OPERATIONS REPAIR ENGINEER'),
  ('blake.2021', 'Blake', 'TRAINER', 'OPERATIONS REPAIR ENGINEER'),
  ('crystal.2021', 'Crystal', 'TRAINER', 'OPERATIONS REPAIR ENGINEER'),
  ('dani.2021', 'Dani', 'TRAINER', 'OPERATIONS REPAIR ENGINEER'),
  ('emma.2021', 'Emma', 'TRAINER', 'ROVING SERVICE ENGINEER'),
  ('frank.2021', 'Frank', 'TRAINER', 'ROVING SERVICE ENGINEER'),
  ('george.2021', 'George', 'TRAINER', 'ROVING SERVICE ENGINEER'),
  ('heather.2021', 'Heather', 'LEARNER', 'ROVING SERVICE ENGINEER'),
  ('isabel.2021', 'Isabel', 'LEARNER', 'ROVING SERVICE ENGINEER'),
  ('jack.2021', 'Jack', 'LEARNER', 'ROVING SERVICE ENGINEER'),
  ('kymberly.2021', 'Kymberly', 'LEARNER', 'ROVING SERVICE ENGINEER'),
  ('leah.2021', 'Leah', 'LEARNER', 'ROVING SERVICE ENGINEER'),
  ('max.2021', 'Max', 'LEARNER', 'ROVING SERVICE ENGINEER'),
  ('nora.2021', 'Nora', 'LEARNER', 'ROVING SERVICE ENGINEER'),
  ('olivia.2021', 'Olivia', 'LEARNER', 'ROVING SERVICE ENGINEER'),
  ('phoenix.2021', 'Phoenix', 'LEARNER', 'ROVING SERVICE ENGINEER'),
  ('quinn.2021', 'Quinn', 'LEARNER', 'ROVING SERVICE ENGINEER'),
  ('raven.2021', 'Raven', 'LEARNER', 'ROVING SERVICE ENGINEER'),
  ('sami.2021', 'Sami', 'LEARNER', 'ROVING SERVICE ENGINEER'),
  ('tiffany.2021', 'Tiffany', 'LEARNER', 'ROVING SERVICE ENGINEER'),
  ('uriah.2021', 'Uriah', 'LEARNER', 'ROVING SERVICE ENGINEER'),
  ('vivi.2021', 'Vivi', 'LEARNER', 'ROVING SERVICE ENGINEER'),
  ('wendy.2021', 'Wendy', 'ADMIN', 'LEARNING AND DEVELOPMENT'),
  ('xenia.2021', 'Xenia', 'ADMIN', 'LEARNING AND DEVELOPMENT'),
  ('yasmine.2021', 'Yasmine', 'ADMIN', 'LEARNING AND DEVELOPMENT'),
  ('zora.2021', 'Zora', 'ADMIN', 'LEARNING AND DEVELOPMENT');

  -- --------------------------------------------------------

  --
  -- Table structure for table `enrolment_request`
  --

  DROP TABLE IF EXISTS `enrolment_request`;
  CREATE TABLE IF NOT EXISTS `enrolment_request` (
  `user_name` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `class_id` varchar(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`user_name`,`course_id`,`class_id`),
  KEY `enrolment_request_fk2` (`course_id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  INSERT INTO `enrolment_request` (`user_name`, `name`, `course_id`, `class_id`, `status`) VALUES
  ('heather.2021', 'Heather', 'XEROX101', 'G2', 'PENDING'),
  ('isabel.2021', 'Isabel', 'XEROX101', 'G2', 'PENDING'),
  ('jack.2021', 'Jack', 'XEROX101', 'G2', 'PENDING');

  -- --------------------------------------------------------

  --
  -- Table structure for table `overall_course_progress`
  --

  DROP TABLE IF EXISTS `overall_course_progress`;
  CREATE TABLE IF NOT EXISTS `overall_course_progress` (
  `user_name` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `class_id` varchar(10) NOT NULL,
  `sections_completed` int(11) NOT NULL,
  `current_section` int(11) NOT NULL,
  `final_quiz_grade` decimal(5,2) NULL,
  PRIMARY KEY (`user_name`,`course_id`,`class_id`),
  KEY `overall_course_progress_fk2` (`course_id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  INSERT INTO `overall_course_progress` (`user_name`, `name`, `course_id`, `class_id`, `sections_completed`,
  `current_section`, `final_quiz_grade`) VALUES
  ('heather.2021', 'Heather', 'EPSON101', 'G2', 1, 1, NULL),
  ('isabel.2021', 'Isabel', 'EPSON101', 'G3', 1, 1, NULL),
  ('jack.2021', 'Jack', 'EPSON101', 'G3', 1, 1, NULL),
  ('kymberly.2021', 'Kymberly', 'EPSON101', 'G3', 1, 1, NULL),
  ('leah.2021', 'Leah', 'EPSON101', 'G3', 1, 1, NULL),
  ('max.2021', 'Max', 'EPSON101', 'G3', 1, 1, NULL),
  ('nora.2021', 'Nora', 'EPSON102', 'G1', 1, 1, NULL),
  ('olivia.2021', 'Olivia', 'EPSON102', 'G2', 1, 1, NULL),
  ('phoenix.2021', 'Phoenix', 'EPSON102', 'G2', 1, 1, NULL),
  ('quinn.2021', 'Quinn', 'EPSON102', 'G2', 1, 1, NULL),
  ('raven.2021', 'Raven', 'EPSON102', 'G2', 1, 1, NULL),
  ('sami.2021', 'Sami', 'EPSON102', 'G2', 1, 1, NULL),
  ('tiffany.2021', 'Tiffany', 'XEROX101', 'G1', 1, 1, NULL),
  ('uriah.2021', 'Uriah', 'XEROX101', 'G1', 1, 1, NULL),
  ('vivi.2021', 'Vivi', 'XEROX101', 'G1', 1, 1, NULL);

  -- --------------------------------------------------------

  --
  -- Table structure for table `prerequisite`
  --

  DROP TABLE IF EXISTS `prerequisite`;
  CREATE TABLE IF NOT EXISTS `prerequisite` (
  `course_id` varchar(10) NOT NULL,
  `prerequisite_id` varchar(10) NOT NULL,
  PRIMARY KEY (`course_id`,`prerequisite_id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  --
  -- Dumping data for table `prerequisite`
  --

  INSERT INTO `prerequisite` (`course_id`, `prerequisite_id`) VALUES
  ('EPSON101', 'NIL'),
  ('EPSON102', 'EPSON101'),
  ('XEROX100', 'NIL'),
  ('XEROX101', 'XEROX100'),
  ('XEROX200', 'XEROX101');

  -- --------------------------------------------------------

  --
  -- Table structure for table `quiz`
  --

  DROP TABLE IF EXISTS `quiz`;
  CREATE TABLE IF NOT EXISTS `quiz` (
  `quiz_id` varchar(100) NOT NULL,
  `quiz_pass` decimal(5,2) NOT NULL,
  PRIMARY KEY (`quiz_id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  --
  -- Dumping data for table `quiz`
  --

  INSERT INTO `quiz` (`quiz_id`, `quiz_pass`) VALUES
  ('EPSON_G_Final1', '85.00'),
  ('EPSON_UG_Test1', '0.00'),
  ('EPSON_UG_Test2', '0.00'),
  ('XEROX_G_Final1', '85.00'),
  ('XEROX_G_Final2', '85.00'),
  ('XEROX_UG_Test1', '0.00');

  -- --------------------------------------------------------

  --
  -- Table structure for table `quiz_questions`
  --

  DROP TABLE IF EXISTS `quiz_questions`;
  CREATE TABLE IF NOT EXISTS `quiz_questions` (
  `quiz_id` varchar(100) NOT NULL,
  `question_no` int(11) NOT NULL,
  `question_type` varchar(3) NOT NULL,
  `question_desc` varchar(1000) NOT NULL,
  PRIMARY KEY (`quiz_id`,`question_no`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  --
  -- Dumping data for table `quiz_questions`
  --

  INSERT INTO `quiz_questions` (`quiz_id`, `question_no`, `question_type`, `question_desc`) VALUES
  ('EPSON_G_Final1', 1, 'MCQ', 'Epson Printers are all about...'),
  ('EPSON_G_Final1', 2, 'T/F', 'Is Epson Printers the same as Xerox Printers?'),
  ('EPSON_UG_Test1', 1, 'MCQ', 'What is Epson Printer?'),
  ('EPSON_UG_Test1', 2, 'T/F', 'Is Epson the most popular printer brand?'),
  ('EPSON_UG_Test2', 1, 'MCQ', 'What is Epson Mechanics?'),
  ('EPSON_UG_Test2', 2, 'T/F', 'Is Epson Mechanics the same as Xerox Mechanics?'),
  ('XEROX_G_Final1', 1, 'T/F', 'Is Xerox cool?'),
  ('XEROX_G_Final1', 2, 'T/F', 'Is Xerox better than other brands?'),
  ('XEROX_UG_Test1', 1, 'MCQ', 'Xerox Mechanics utilises...'),
  ('XEROX_UG_Test1', 2, 'MCQ', 'Xerox printing should be done on...');

  -- --------------------------------------------------------

  --
  -- Table structure for table `quiz_question_options`
  --

  DROP TABLE IF EXISTS `quiz_question_options`;
  CREATE TABLE IF NOT EXISTS `quiz_question_options` (
  `quiz_id` varchar(100) NOT NULL,
  `question_no` int(11) NOT NULL,
  `option_id` varchar(5) NOT NULL,
  `option_desc` varchar(100) NOT NULL,
  `option_status` varchar(10) NOT NULL,
  PRIMARY KEY (`quiz_id`,`question_no`,`option_id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  --
  -- Dumping data for table `quiz_question_options`
  --

  INSERT INTO `quiz_question_options` (`quiz_id`, `question_no`, `option_id`, `option_desc`, `option_status`) VALUES
  ('EPSON_G_Final1', 1, 'a', 'Option A', 'WRONG'),
  ('EPSON_G_Final1', 1, 'b', 'Option B', 'WRONG'),
  ('EPSON_G_Final1', 1, 'c', 'Option C', 'WRONG'),
  ('EPSON_G_Final1', 1, 'd', 'Option D', 'CORRECT'),
  ('EPSON_G_Final1', 2, 'a', 'Yes', 'WRONG'),
  ('EPSON_G_Final1', 2, 'b', 'No', 'CORRECT'),
  ('EPSON_UG_Test1', 1, 'a', 'Good', 'WRONG'),
  ('EPSON_UG_Test1', 1, 'b', 'Bad', 'WRONG'),
  ('EPSON_UG_Test1', 1, 'c', 'Popular', 'CORRECT'),
  ('EPSON_UG_Test1', 1, 'd', 'Unbreakable', 'WRONG'),
  ('EPSON_UG_Test1', 2, 'a', 'Yes', 'CORRECT'),
  ('EPSON_UG_Test1', 2, 'b', 'No', 'WRONG'),
  ('EPSON_UG_Test2', 1, 'a', 'Option A', 'CORRECT'),
  ('EPSON_UG_Test2', 1, 'b', 'Option B', 'WRONG'),
  ('EPSON_UG_Test2', 1, 'c', 'Option C', 'WRONG'),
  ('EPSON_UG_Test2', 1, 'd', 'Option D', 'WRONG'),
  ('EPSON_UG_Test2', 2, 'a', 'Yes', 'CORRECT'),
  ('EPSON_UG_Test2', 2, 'b', 'No', 'WRONG'),
  ('XEROX_G_Final1', 1, 'a', 'Yes', 'WRONG'),
  ('XEROX_G_Final1', 1, 'b', 'No', 'CORRECT'),
  ('XEROX_G_Final1', 2, 'a', 'Yes', 'CORRECT'),
  ('XEROX_G_Final1', 2, 'b', 'No', 'WRONG'),
  ('XEROX_UG_Test1', 1, 'a', 'Option A', 'WRONG'),
  ('XEROX_UG_Test1', 1, 'b', 'Option B', 'WRONG'),
  ('XEROX_UG_Test1', 1, 'c', 'Option C', 'WRONG');

  -- --------------------------------------------------------

  --
  -- Table structure for table `eligible_learners`
  --

  DROP TABLE IF EXISTS `eligible_learners`;
  CREATE TABLE IF NOT EXISTS `eligible_learners` (
  `course_id` varchar(10) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  PRIMARY KEY (`course_id`,`user_name`),
  KEY `eligible_learner_fk1` (`course_id`),
  KEY `eligible_learner_fk2` (`user_name`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  --
  -- Dumping data for table `eligible_learners`
  --
  INSERT INTO `eligible_learners` (`course_id`, `user_name`) VALUES
  ('EPSON101', 'nora.2021'),
  ('EPSON101', 'olivia.2021'),
  ('EPSON101', 'phoenix.2021'),
  ('EPSON101', 'quinn.2021'),
  ('EPSON101', 'raven.2021'),
  ('EPSON101', 'sami.2021'),
  ('EPSON101', 'tiffany.2021'),
  ('EPSON101', 'uriah.2021'),
  ('XEROX100', 'leah.2021'),
  ('XEROX100', 'max.2021'),
  ('XEROX100', 'nora.2021'),
  ('XEROX100', 'olivia.2021'),
  ('XEROX100', 'phoenix.2021'),
  ('XEROX100', 'quinn.2021'),
  ('XEROX100', 'raven.2021'),
  ('XEROX100', 'sami.2021'),
  ('XEROX100', 'tiffany.2021'),
  ('XEROX100', 'uriah.2021'),
  ('XEROX101', 'heather.2021'),
  ('XEROX101', 'isabel.2021'),
  ('XEROX101', 'jack.2021'),
  ('XEROX101', 'kymberly.2021');

  --
  -- Constraints for dumped tables
  --

  --
  -- Constraints for table `class`
  --
  ALTER TABLE `class`
  ADD CONSTRAINT `class_fk1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE
  CASCADE,
  ADD CONSTRAINT `class_fk2` FOREIGN KEY (`trainer_user_name`) REFERENCES `employee` (`user_name`) ON DELETE CASCADE ON
  UPDATE CASCADE,
  ADD CONSTRAINT `class_fk3` FOREIGN KEY (`final_quiz_id`) REFERENCES `quiz` (`quiz_id`) ON DELETE CASCADE ON UPDATE
  CASCADE;

  --
  -- Constraints for table `completed_courses`
  --
  ALTER TABLE `completed_courses`
  ADD CONSTRAINT `completed_courses_fk1` FOREIGN KEY (`user_name`) REFERENCES `employee` (`user_name`) ON DELETE CASCADE
  ON UPDATE CASCADE;

  --
  -- Constraints for table `course_section_materials`
  --
  ALTER TABLE `course_section_materials`
  ADD CONSTRAINT `course_section_materials_fk1` FOREIGN KEY (`course_id`) REFERENCES `class` (`course_id`),
  ADD CONSTRAINT `course_section_materials_fk2` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`) ON DELETE CASCADE
  ON UPDATE CASCADE;

  --
  -- Constraints for table `course_section_progress`
  --
  ALTER TABLE `course_section_progress`
  ADD CONSTRAINT `course_section_progress_fk1` FOREIGN KEY (`user_name`) REFERENCES `employee` (`user_name`),
  ADD CONSTRAINT `course_section_progress_fk2` FOREIGN KEY (`course_id`) REFERENCES `class` (`course_id`) ON DELETE
  CASCADE ON UPDATE CASCADE;

  --
  -- Constraints for table `enrolment_request`
  --
  ALTER TABLE `enrolment_request`
  ADD CONSTRAINT `enrolment_request_fk1` FOREIGN KEY (`user_name`) REFERENCES `employee` (`user_name`),
  ADD CONSTRAINT `enrolment_request_fk2` FOREIGN KEY (`course_id`) REFERENCES `class` (`course_id`) ON DELETE CASCADE ON
  UPDATE CASCADE;

  --
  -- Constraints for table `overall_course_progress`
  --
  ALTER TABLE `overall_course_progress`
  ADD CONSTRAINT `overall_course_progress_fk1` FOREIGN KEY (`user_name`) REFERENCES `employee` (`user_name`),
  ADD CONSTRAINT `overall_course_progress_fk2` FOREIGN KEY (`course_id`) REFERENCES `class` (`course_id`) ON DELETE
  CASCADE ON UPDATE CASCADE;

  --
  -- Constraints for table `prerequisite`
  --
  ALTER TABLE `prerequisite`
  ADD CONSTRAINT `prerequisite_fk1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON
  UPDATE CASCADE;

  --
  -- Constraints for table `quiz_questions`
  --
  ALTER TABLE `quiz_questions`
  ADD CONSTRAINT `quiz_questions_fk` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`) ON DELETE CASCADE ON UPDATE
  CASCADE;

  --
  -- Constraints for table `eligible_learners`
  --
  ALTER TABLE `eligible_learners`
  ADD CONSTRAINT `eligible_learner_fk1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON
  UPDATE CASCADE,
  ADD CONSTRAINT `eligible_learner_fk2` FOREIGN KEY (`user_name`) REFERENCES `employee` (`user_name`) ON DELETE CASCADE
  ON UPDATE CASCADE;

  --
  -- Constraints for table `quiz_question_options`
  --
  ALTER TABLE `quiz_question_options`
  ADD CONSTRAINT `quiz_question_options_fk1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz_questions` (`quiz_id`) ON DELETE
  CASCADE ON UPDATE CASCADE;
  COMMIT;

  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;