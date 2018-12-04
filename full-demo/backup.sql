-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 04, 2018 at 05:14 AM
-- Server version: 10.3.10-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `wbf49`
--

-- --------------------------------------------------------

--
-- Table structure for table `Citations`
--

CREATE TABLE IF NOT EXISTS `Citations` (
  `citationID` int(11) NOT NULL,
  `citation` varchar(500) NOT NULL,
  `reportcount` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Citations`
--

INSERT INTO `Citations` (`citationID`, `citation`, `reportcount`) VALUES
(0, 'Agius, N. M., & Wilkinson, A. (2014). Students'' and teachers'' views of written feedback at undergraduate level: A literature review. <i>Nurse Education Today, 34</i>, 552-559. 	doi:10.1016/j.nedt.2013.07.005', 0),
(1, 'Bang, H. J. (2013). Reliability of National Writing Project’s Analytic Writing Continuum assessment system. <i>Journal of Writing Assessment, 6</i>, 13-24.', 0),
(2, 'Bardine, B. A. (1999). Students'' perceptions of written teacher comments: What do they say about how we respond to them? <i>The High School Journal, 82</i>, 239-247.', 0),
(3, 'Bardine, B. A., Bardine, M. S., & Deegan, E. F. (2000). Beyond the red pen: Clarifying our role in the response process. <i>The English Journal, 90</i>(1), 94-101. doi:10.2307/821738', 0),
(4, 'Bevan, R., Badge, J., Cann, A., Willmott, C., & Scott, J. (2008). Seeing eye-to-eye? Staff and student views on feedback. <i>Bioscience Education, 12</i>(1), 1-15. doi:10.3108/beej.12.1', 0),
(5, 'Charney, D. (1984). The validity of using holistic scoring to evaluate writing: A critical overview. <i>Research in the Teaching of English, 18</i>, 65-81.', 0),
(6, 'Christensen, F. (1963). A generative rhetoric of the sentence. <i>College Composition and Communication, 14</i>, 155-161. doi:10.2307/355051', 0),
(7, 'Englehard, G. (1992). The measurement of writing ability with a many-faceted Rasch model. <i>Applied Measurement in Education, 5</i>, 171-191. doi:10.1207/s15324818ame0503_1', 0),
(8, 'Frederiksen, J. R., & Collins, A. (1989). A systems approach to educational testing. <i>Educational Researcher, 18</i>(9), 27-32. doi:10.3102/0013189x01800902', 0),
(9, 'Graves, R., Swain, S., & Morse, D. (2011). The final free modifier-Once more. <i>Journal of Teaching Writing, 26</i>(1), 85-105.', 0),
(10, 'Greenberg, K. P. (2015). Rubric use in formative assessment: A detailed behavioral rubric helps students improve their scientific writing skills. <i>Teaching of Psychology, 42</i>, 211-217. doi:10.1177/0098628315587618', 0),
(11, 'Hyde, J. S. (2014). Gender similarities and differences. <i>Annual Review of Psychology, 65</i>, 373-398. doi:10.1146/annurev-psych-010213-115057', 0),
(12, 'Huot, B. (1990). Reliability, validity, and holistic scoring: What we know and what we need to 	know. <i>College Composition and Communication, 41</i>, 201-213. doi:10.2307/358160', 0),
(13, 'Huot, B. (1996). Toward a new theory of writing assessment. <i>College Composition and Communication, 47</i>, 549-566. doi:10.2307/358601', 0),
(14, 'Krishna, V. (1975). The syntax of error. <i>Journal of Basic Writing, 1</i>, 43-49.', 0),
(15, 'Lin-Siegler, X., Shaenfield, D., & Elder, A. D. (2015). Contrasting case instruction can improve self-assessment of writing. <i>Educational Technology Research and Development, 63</i>, 517-537. doi:10.1007/s11423-015-9390-9', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Courses`
--

CREATE TABLE IF NOT EXISTS `Courses` (
  `courseID` int(11) NOT NULL,
  `instructorID` int(11) NOT NULL,
  `coursecode` varchar(25) NOT NULL,
  `coursename` varchar(100) NOT NULL,
  `assignment` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Courses`
--

INSERT INTO `Courses` (`courseID`, `instructorID`, `coursecode`, `coursename`, `assignment`) VALUES
(0, 0, 'J0', 'Jedi Training', 30),
(1, 2, 'S0', 'Sith Training', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Instructors`
--

CREATE TABLE IF NOT EXISTS `Instructors` (
  `instructorID` int(11) NOT NULL,
  `instructorname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Instructors`
--

INSERT INTO `Instructors` (`instructorID`, `instructorname`) VALUES
(0, 'Luke Skywalker'),
(1, 'Yoda'),
(2, 'Darth Vader');

-- --------------------------------------------------------

--
-- Table structure for table `Students`
--

CREATE TABLE IF NOT EXISTS `Students` (
  `studentID` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `courseID` mediumint(9) NOT NULL,
  `completedcitations` mediumint(9) NOT NULL,
  `capitalizationscore` smallint(6) NOT NULL,
  `orderingscore` smallint(6) NOT NULL,
  `punctuationscore` smallint(6) NOT NULL,
  `formatingscore` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Students`
--

INSERT INTO `Students` (`studentID`, `name`, `courseID`, `completedcitations`, `capitalizationscore`, `orderingscore`, `punctuationscore`, `formatingscore`) VALUES
('R01', 'Rey', 0, 0, 0, 0, 0, 0),
('KR10', 'Kylo Ren', 1, 10, 50, 25, 50, 50),
('AS21', 'Anakin Skywalker', 1, 48, 29, 14, 34, 50),
('RD22', 'R2-D2', 0, 20, 40, 100, 60, 80),
('BB88', 'BB-8', 0, 5, 0, 90, 30, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Citations`
--
ALTER TABLE `Citations`
  ADD UNIQUE KEY `citationID` (`citationID`);

--
-- Indexes for table `Courses`
--
ALTER TABLE `Courses`
  ADD UNIQUE KEY `courseID` (`courseID`),
  ADD UNIQUE KEY `coursecode` (`coursecode`);

--
-- Indexes for table `Instructors`
--
ALTER TABLE `Instructors`
  ADD UNIQUE KEY `instructorID` (`instructorID`);

--
-- Indexes for table `Students`
--
ALTER TABLE `Students`
  ADD UNIQUE KEY `studentID` (`studentID`);
