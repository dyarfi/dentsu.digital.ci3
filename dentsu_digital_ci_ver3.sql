-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2016 at 06:03 PM
-- Server version: 5.5.40
-- PHP Version: 5.4.38

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dentsu_digital_ci_ver3`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE IF NOT EXISTS `applicants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `career_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `marital_status` tinyint(1) NOT NULL,
  `id_number` varchar(128) NOT NULL,
  `phone` varchar(18) NOT NULL,
  `address` varchar(512) NOT NULL,
  `birth_date` int(11) NOT NULL,
  `birth_place` char(32) NOT NULL,
  `education_grade` varchar(128) NOT NULL,
  `education_name` varchar(128) NOT NULL,
  `education_major` varchar(128) NOT NULL,
  `education_from` varchar(11) NOT NULL,
  `education_to` varchar(11) NOT NULL,
  `employment_name` varchar(11) NOT NULL,
  `employment_position` varchar(11) NOT NULL,
  `employment_from` varchar(11) NOT NULL,
  `employment_to` varchar(11) NOT NULL,
  `photo` varchar(256) NOT NULL,
  `cv_file` varchar(256) NOT NULL,
  `is_located` tinyint(1) NOT NULL,
  `is_related` tinyint(1) NOT NULL,
  `messages` text,
  `available_date` int(11) NOT NULL,
  `expected_salary` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `added` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `career_id`, `user_id`, `name`, `email`, `gender`, `marital_status`, `id_number`, `phone`, `address`, `birth_date`, `birth_place`, `education_grade`, `education_name`, `education_major`, `education_from`, `education_to`, `employment_name`, `employment_position`, `employment_from`, `employment_to`, `photo`, `cv_file`, `is_located`, `is_related`, `messages`, `available_date`, `expected_salary`, `status`, `added`, `modified`) VALUES
(1, 1, 33, 'asdfsadfasd', 'asdfsadfasdf', 1, 1, 'asdasdad', 'asdasd', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, NULL, 0, 0, 1, 0, 1445094610),
(2, 1, 34, 'Masdasda', 'dyarfi20@gmail.com', 1, 1, 'sadasd', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, NULL, 0, 0, 1, 0, 1455016671);

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `time` int(11) DEFAULT NULL,
  `ip_address` varchar(16) DEFAULT NULL,
  `word` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1139 ;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`id`, `time`, `ip_address`, `word`) VALUES
(1138, 1469444610, '::1', 'STBjJ');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE IF NOT EXISTS `careers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `division_id` int(11) unsigned DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `sent_to` varchar(32) DEFAULT NULL,
  `ref_no` varchar(12) DEFAULT NULL,
  `start_date` date DEFAULT '0000-00-00',
  `end_date` date DEFAULT '0000-00-00',
  `report_to` tinytext,
  `job_purpose` text,
  `responsibilities` text,
  `requirements` text,
  `location` varchar(128) DEFAULT NULL,
  `company` varchar(128) DEFAULT NULL,
  `ext_link1` varchar(324) DEFAULT NULL,
  `ext_link2` varchar(324) DEFAULT NULL,
  `allow_comment` tinyint(1) NOT NULL,
  `user_id` tinyint(3) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `added` int(11) unsigned DEFAULT NULL,
  `modified` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`,`ref_no`,`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `division_id`, `name`, `subject`, `sent_to`, `ref_no`, `start_date`, `end_date`, `report_to`, `job_purpose`, `responsibilities`, `requirements`, `location`, `company`, `ext_link1`, `ext_link2`, `allow_comment`, `user_id`, `count`, `status`, `added`, `modified`) VALUES
(1, 17, 'web-developer', 'Web Developer', 'hrd@company.com', NULL, '2016-01-10', '2016-03-31', 'Project Manager', NULL, NULL, NULL, 'Main Office', NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL),
(2, 12, 'backend-developer', 'Backend Developer', 'hrd@company.com', '012399', '2016-01-10', '2016-03-31', 'Project Manager', '<p>\n	Backend Developer responsible to code programmable scripts to make a application worked</p>\n', '<p>\n	Report for the jobs that assigned and report to project manager</p>\n', '<ul>\n	<li>\n		PHP</li>\n	<li>\n		MYSQL</li>\n	<li>\n		HTML &amp; CSS</li>\n	<li>\n		Javascript or Jquery</li>\n</ul>\n', 'Main Office', 'Company Name', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('be15f00b5e85e62897c4e66919ae552e3fecbefb', '::1', 1469444611, 0x6d6f64756c655f6c6973747c733a3837343a227b2241646d696e223a7b2264617368626f6172645c2f696e646578223a2244617368626f6172642050616e656c222c22757365725c2f696e646578223a225573657273222c227573657267726f75705c2f696e646578223a22557365722047726f757073222c226c616e67756167655c2f696e646578223a224c616e677561676573222c2273657474696e675c2f696e646578223a2253657474696e6773222c227365727665726c6f675c2f696e646578223a22536572766572204c6f6773227d2c224d6f64756c65223a7b226d6f64756c656c6973745c2f696e646578223a224d6f64756c65204c69737473227d2c22436172656572223a7b226361726565725c2f696e646578223a2243617265657273222c226469766973696f6e5c2f696e646578223a224469766973696f6e73222c226170706c6963616e745c2f696e646578223a224170706c6963616e7473222c22656d706c6f7965655c2f696e646578223a22456d706c6f79656573227d2c22436f6c6f72223a7b22636f6c6f725c2f696e646578223a22436f6c6f722044617461222c22636f6c6f72636f6e74656e745c2f696e646578223a22436f6c6f7220436f6e74656e74222c22636f6c6f72706572736f6e616c5c2f696e646578223a22436f6c6f7220506572736f6e616c222c22636f6c6f727363616e6e65725c2f696e646578223a22436f6c6f72205363616e6e6572227d2c2250616765223a7b22706167655c2f696e646578223a225061676573222c22706167656d656e755c2f696e646578223a2250616765204d656e7573227d2c225061727469636970616e74223a7b227061727469636970616e745c2f696e646578223a225061727469636970616e74222c226174746163686d656e745c2f696e646578223a224174746163686d656e74227d2c225172636f6465223a7b227172636f64655c2f696e646578223a22515220436f646573222c227172636f64657363616e6e65725c2f696e646578223a22515220436f6465205363616e6e6572227d2c225175657374696f6e6e61697265223a7b227175657374696f6e6e616972655c2f696e646578223a225175657374696f6e6e6169726573222c227175657374696f6e5c2f696e646578223a225175657374696f6e73222c227175657374696f6e72756c655c2f696e646578223a225175657374696f6e2052756c65227d7d223b6d6f64756c655f66756e6374696f6e5f6c6973747c733a363838333a227b2241646d696e223a7b2264617368626f6172645c2f696e646578223a2244617368626f6172642050616e656c222c22757365725c2f696e646578223a225573657273222c227573657267726f75705c2f696e646578223a22557365722047726f757073222c226c616e67756167655c2f696e646578223a224c616e677561676573222c2273657474696e675c2f696e646578223a2253657474696e6773222c227365727665726c6f675c2f696e646578223a22536572766572204c6f6773222c2264617368626f6172645c2f616464223a22416464204e65772044617368626f617264222c2264617368626f6172645c2f76696577223a22566965772044617368626f617264222c2264617368626f6172645c2f65646974223a22456469742044617368626f617264222c2264617368626f6172645c2f64656c657465223a2244656c6574652044617368626f617264222c2264617368626f6172645c2f6368616e6765223a224368616e67652044617368626f61726420537461747573222c22757365725c2f616464223a224164642055736572222c22757365725c2f76696577223a22566965772055736572222c22757365725c2f65646974223a22456469742055736572222c22757365725c2f64656c657465223a2244656c6574652055736572222c22757365725c2f6368616e6765223a224368616e6765205573657220537461747573222c22757365725c2f696d616765223a224368616e6765205573657220496d616765222c22757365725c2f75706c6f6164223a2255706c6f6164205573657220496d616765222c22757365725c2f6578706f7274223a224578706f727420557365722044617461222c227573657267726f75705c2f616464223a2241646420557365722047726f7570222c227573657267726f75705c2f76696577223a225669657720557365722047726f7570222c227573657267726f75705c2f65646974223a224564697420557365722047726f7570222c227573657267726f75705c2f64656c657465223a2244656c65746520557365722047726f7570222c227573657267726f75705c2f6368616e6765223a224368616e676520557365722047726f757020537461747573222c227573657267726f75705c2f6578706f7274223a224578706f727420557365722047726f75702044617461222c226c616e67756167655c2f616464223a22416464204c616e6775616765222c226c616e67756167655c2f76696577223a2256696577204c616e6775616765222c226c616e67756167655c2f65646974223a2245646974204c616e6775616765222c226c616e67756167655c2f64656c657465223a2244656c657465204c616e6775616765222c226c616e67756167655c2f6368616e6765223a224368616e6765204c616e677561676520537461747573222c2273657474696e675c2f616464223a224164642053657474696e67222c2273657474696e675c2f76696577223a22566965772053657474696e67222c2273657474696e675c2f65646974223a22456469742053657474696e67222c2273657474696e675c2f64656c657465223a2244656c6574652053657474696e67222c2273657474696e675c2f6368616e6765223a224368616e67652053657474696e6720537461747573222c227365727665726c6f675c2f76696577223a225669657720536572766572204c6f67222c227365727665726c6f675c2f65646974223a224564697420536572766572204c6f67222c227365727665726c6f675c2f64656c657465223a2244656c65746520536572766572204c6f67222c227365727665726c6f675c2f7472617368223a22547261736820536572766572204c6f67227d2c224d6f64756c65223a7b226d6f64756c656c6973745c2f65646974223a2245646974204d6f64756c65222c226d6f64756c656c6973745c2f7472617368223a2244656c6574652055736572205065726d697373696f6e227d2c22436172656572223a7b226361726565725c2f696e646578223a2243617265657273222c226469766973696f6e5c2f696e646578223a224469766973696f6e73222c226170706c6963616e745c2f696e646578223a224170706c6963616e7473222c22656d706c6f7965655c2f696e646578223a22456d706c6f79656573222c226361726565725c2f696e6465785c2f616464223a2241646420436172656572222c226361726565725c2f696e6465785c2f76696577223a225669657720436172656572222c226361726565725c2f696e6465785c2f65646974223a224564697420436172656572222c226361726565725c2f696e6465785c2f64656c657465223a2244656c65746520436172656572222c226361726565725c2f696e6465785c2f6368616e6765223a224368616e67652043617265657220537461747573222c226361726565725c2f696e6465785c2f6578706f7274223a224578706f727420436172656572222c226361726565725c2f696e6465785c2f7072696e74223a225072696e7420436172656572222c226469766973696f6e5c2f696e6465785c2f616464223a22416464204469766973696f6e222c226469766973696f6e5c2f696e6465785c2f76696577223a2256696577204469766973696f6e222c226469766973696f6e5c2f696e6465785c2f65646974223a2245646974204469766973696f6e222c226469766973696f6e5c2f696e6465785c2f64656c657465223a2244656c657465204469766973696f6e222c226469766973696f6e5c2f696e6465785c2f6368616e6765223a224368616e6765204469766973696f6e20537461747573222c226469766973696f6e5c2f696e6465785c2f6578706f7274223a224578706f7274204469766973696f6e222c226469766973696f6e5c2f696e6465785c2f7072696e74223a225072696e74204469766973696f6e222c226170706c6963616e745c2f696e6465785c2f616464223a22416464204170706c6963616e74222c226170706c6963616e745c2f696e6465785c2f76696577223a2256696577204170706c6963616e74222c226170706c6963616e745c2f696e6465785c2f65646974223a2245646974204170706c6963616e74222c226170706c6963616e745c2f696e6465785c2f64656c657465223a2244656c657465204170706c6963616e74222c226170706c6963616e745c2f696e6465785c2f6368616e6765223a224368616e6765204170706c6963616e74222c226170706c6963616e745c2f696e6465785c2f6578706f7274223a224578706f7274204170706c6963616e74222c226170706c6963616e745c2f696e6465785c2f7072696e74223a225072696e74204170706c6963616e74222c22656d706c6f7965655c2f696e6465785c2f616464223a2241646420456d706c6f796565222c22656d706c6f7965655c2f696e6465785c2f76696577223a225669657720456d706c6f796565222c22656d706c6f7965655c2f696e6465785c2f65646974223a224564697420456d706c6f796565222c22656d706c6f7965655c2f696e6465785c2f64656c657465223a2244656c65746520456d706c6f796565222c22656d706c6f7965655c2f736574223a2253657420746f20456d706c6f796565222c22656d706c6f7965655c2f696e6465785c2f6368616e6765223a224368616e676520456d706c6f796565222c22656d706c6f7965655c2f696e6465785c2f6578706f7274223a224578706f727420456d706c6f796565222c22656d706c6f7965655c2f696e6465785c2f7072696e74223a225072696e7420456d706c6f796565227d2c22436f6c6f72223a7b22636f6c6f725c2f696e646578223a22436f6c6f722044617461222c22636f6c6f72636f6e74656e745c2f696e646578223a22436f6c6f7220436f6e74656e74222c22636f6c6f72706572736f6e616c5c2f696e646578223a22436f6c6f7220506572736f6e616c222c22636f6c6f727363616e6e65725c2f696e646578223a22436f6c6f72205363616e6e6572222c22636f6c6f725c2f696e6465785c2f616464223a2241646420436f6c6f72205265636f676e697a6572222c22636f6c6f725c2f696e6465785c2f76696577223a225669657720436f6c6f72205265636f676e697a6572222c22636f6c6f725c2f696e6465785c2f65646974223a224564697420436f6c6f72205265636f676e697a6572222c22636f6c6f725c2f696e6465785c2f64656c657465223a2244656c65746520436f6c6f72205265636f676e697a6572222c22636f6c6f725c2f696e6465785c2f6368616e6765223a224368616e676520436f6c6f72205265636f676e697a657220537461747573222c22636f6c6f725c2f696e6465785c2f6578706f7274223a224578706f727420436f6c6f72205265636f676e697a6572222c22636f6c6f725c2f696e6465785c2f7072696e74223a225072696e7420436f6c6f72205265636f676e697a6572222c22636f6c6f72636f6e74656e745c2f696e6465785c2f616464223a2241646420436f6c6f7220436f6e74656e74222c22636f6c6f72636f6e74656e745c2f696e6465785c2f76696577223a225669657720436f6c6f7220436f6e74656e74222c22636f6c6f72636f6e74656e745c2f696e6465785c2f65646974223a224564697420436f6c6f7220436f6e74656e74222c22636f6c6f72636f6e74656e745c2f696e6465785c2f64656c657465223a2244656c65746520436f6c6f7220436f6e74656e74222c22636f6c6f72636f6e74656e745c2f696e6465785c2f6368616e6765223a224368616e676520436f6c6f7220436f6e74656e7420537461747573222c22636f6c6f72636f6e74656e745c2f696e6465785c2f6578706f7274223a224578706f727420436f6c6f7220436f6e74656e74222c22636f6c6f72636f6e74656e745c2f696e6465785c2f7072696e74223a225072696e7420436f6c6f7220436f6e74656e74222c22636f6c6f72706572736f6e616c5c2f696e6465785c2f616464223a2241646420436f6c6f7220506572736f6e616c222c22636f6c6f72706572736f6e616c5c2f696e6465785c2f76696577223a225669657720436f6c6f7220506572736f6e616c222c22636f6c6f72706572736f6e616c5c2f696e6465785c2f65646974223a224564697420436f6c6f7220506572736f6e616c222c22636f6c6f72706572736f6e616c5c2f696e6465785c2f64656c657465223a2244656c65746520436f6c6f7220506572736f6e616c222c22636f6c6f72706572736f6e616c5c2f696e6465785c2f6368616e6765223a224368616e676520436f6c6f7220506572736f6e616c20537461747573222c22636f6c6f72706572736f6e616c5c2f696e6465785c2f6578706f7274223a224578706f727420436f6c6f7220506572736f6e616c222c22636f6c6f72706572736f6e616c5c2f696e6465785c2f7072696e74223a225072696e7420436f6c6f7220506572736f6e616c227d2c2250616765223a7b22706167655c2f696e646578223a225061676573222c22706167656d656e755c2f696e646578223a2250616765204d656e7573222c22706167655c2f696e6465785c2f616464223a224164642050616765222c22706167655c2f696e6465785c2f76696577223a22566965772050616765222c22706167655c2f696e6465785c2f65646974223a22456469742050616765222c22706167655c2f696e6465785c2f64656c657465223a2244656c6574652050616765222c22706167655c2f696e6465785c2f6368616e6765223a224368616e6765205061676520537461747573222c22706167655c2f696e6465785c2f6578706f7274223a224578706f72742050616765222c22706167655c2f696e6465785c2f7072696e74223a225072696e742050616765222c22706167656d656e755c2f696e6465785c2f616464223a224164642050616765204d656e75222c22706167656d656e755c2f696e6465785c2f76696577223a22566965772050616765204d656e75222c22706167656d656e755c2f696e6465785c2f65646974223a22456469742050616765204d656e75222c22706167656d656e755c2f696e6465785c2f64656c657465223a2244656c6574652050616765204d656e75222c22706167656d656e755c2f696e6465785c2f6368616e6765223a224368616e67652050616765204d656e7520537461747573222c22706167656d656e755c2f696e6465785c2f6578706f7274223a224578706f72742050616765204d656e75222c22706167656d656e755c2f696e6465785c2f7072696e74223a225072696e742050616765204d656e75227d2c225061727469636970616e74223a7b227061727469636970616e745c2f696e646578223a225061727469636970616e74222c226174746163686d656e745c2f696e646578223a224174746163686d656e74222c227061727469636970616e745c2f696e6465785c2f616464223a22416464205061727469636970616e74222c227061727469636970616e745c2f696e6465785c2f76696577223a2256696577205061727469636970616e74222c227061727469636970616e745c2f696e6465785c2f65646974223a2245646974205061727469636970616e74222c227061727469636970616e745c2f696e6465785c2f64656c657465223a2244656c657465205061727469636970616e74222c227061727469636970616e745c2f696e6465785c2f6368616e6765223a224368616e6765205061727469636970616e7420537461747573222c227061727469636970616e745c2f696e6465785c2f6578706f7274223a224578706f7274205061727469636970616e74222c227061727469636970616e745c2f696e6465785c2f7072696e74223a225072696e74205061727469636970616e74222c226174746163686d656e745c2f696e6465785c2f616464223a22416464204174746163686d656e74222c226174746163686d656e745c2f696e6465785c2f76696577223a2256696577204174746163686d656e74222c226174746163686d656e745c2f696e6465785c2f65646974223a2245646974204174746163686d656e74222c226174746163686d656e745c2f696e6465785c2f64656c657465223a2244656c657465204174746163686d656e74222c226174746163686d656e745c2f696e6465785c2f6368616e6765223a224368616e6765204174746163686d656e7420537461747573222c226174746163686d656e745c2f696e6465785c2f6578706f7274223a224578706f7274204174746163686d656e74222c226174746163686d656e745c2f696e6465785c2f7072696e74223a225072696e74204174746163686d656e74227d2c225172636f6465223a7b227172636f64655c2f696e646578223a22515220436f646573222c227172636f64657363616e6e65725c2f696e646578223a22515220436f6465205363616e6e6572222c227172636f64655c2f696e6465785c2f616464223a2241646420515220436f6465222c227172636f64655c2f696e6465785c2f76696577223a225669657720515220436f6465222c227172636f64655c2f696e6465785c2f65646974223a224564697420515220436f6465222c227172636f64655c2f696e6465785c2f64656c657465223a2244656c65746520515220436f6465222c227172636f64655c2f696e6465785c2f6368616e6765223a224368616e676520515220436f646520537461747573222c227172636f64655c2f696e6465785c2f6578706f7274223a224578706f727420515220436f6465222c227172636f64655c2f696e6465785c2f7072696e74223a225072696e7420515220436f6465227d2c225175657374696f6e6e61697265223a7b227175657374696f6e6e616972655c2f696e646578223a225175657374696f6e6e6169726573222c227175657374696f6e5c2f696e646578223a225175657374696f6e73222c227175657374696f6e72756c655c2f696e646578223a225175657374696f6e2052756c65222c227175657374696f6e6e616972655c2f696e6465785c2f616464223a22416464205175657374696f6e6e61697265222c227175657374696f6e6e616972655c2f696e6465785c2f76696577223a2256696577205175657374696f6e6e61697265222c227175657374696f6e6e616972655c2f696e6465785c2f65646974223a2245646974205175657374696f6e6e61697265222c227175657374696f6e6e616972655c2f696e6465785c2f64656c657465223a2244656c657465205175657374696f6e6e61697265222c227175657374696f6e6e616972655c2f696e6465785c2f6368616e6765223a224368616e6765205175657374696f6e6e6169726520537461747573222c227175657374696f6e6e616972655c2f696e6465785c2f6578706f7274223a224578706f7274205175657374696f6e6e61697265222c227175657374696f6e6e616972655c2f696e6465785c2f7072696e74223a225072696e74205175657374696f6e6e61697265222c227175657374696f6e5c2f696e6465785c2f616464223a22416464205175657374696f6e222c227175657374696f6e5c2f696e6465785c2f76696577223a2256696577205175657374696f6e222c227175657374696f6e5c2f696e6465785c2f65646974223a2245646974205175657374696f6e222c227175657374696f6e5c2f696e6465785c2f64656c657465223a2244656c657465205175657374696f6e222c227175657374696f6e5c2f696e6465785c2f6368616e6765223a224368616e6765205175657374696f6e20537461747573222c227175657374696f6e5c2f696e6465785c2f6578706f7274223a224578706f7274205175657374696f6e222c227175657374696f6e5c2f696e6465785c2f7072696e74223a225072696e74205175657374696f6e222c227175657374696f6e72756c655c2f696e6465785c2f616464223a22416464205175657374696f6e2052756c65222c227175657374696f6e72756c655c2f696e6465785c2f76696577223a2256696577205175657374696f6e2052756c65222c227175657374696f6e72756c655c2f696e6465785c2f65646974223a2245646974205175657374696f6e2052756c65222c227175657374696f6e72756c655c2f696e6465785c2f64656c657465223a2244656c657465205175657374696f6e2052756c65222c227175657374696f6e72756c655c2f696e6465785c2f6368616e6765223a224368616e6765205175657374696f6e2052756c6520537461747573222c227175657374696f6e72756c655c2f696e6465785c2f6578706f7274223a224578706f7274205175657374696f6e2052756c65222c227175657374696f6e72756c655c2f696e6465785c2f7072696e74223a225072696e74205175657374696f6e2052756c65227d7d223b757365725f73657373696f6e7c4f3a383a22737464436c617373223a383a7b733a323a226964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a353a22656d61696c223b733a31353a2261646d696e4061646d696e2e636f6d223b733a383a2267726f75705f6964223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a31303a226c6173745f6c6f67696e223b733a31303a2231343639343434343137223b733a393a226c6f676765645f696e223b623a313b733a343a226e616d65223b733a32313a2241646d696e6973747261746f722057656273697465223b7d637572725f75726c7c733a32333a2261646d696e2d70616e656c2f757365722f766965772f31223b707265765f75726c7c733a32323a2261646d696e2d70616e656c2f757365722f696e646578223b);

-- --------------------------------------------------------

--
-- Table structure for table `colorcontents`
--

CREATE TABLE IF NOT EXISTS `colorcontents` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `color_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `text` text,
  `serial` text,
  `file_name` varchar(512) DEFAULT NULL,
  `colorcontent_url` varchar(512) DEFAULT NULL,
  `order` tinyint(3) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `added` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `colorcontents`
--

INSERT INTO `colorcontents` (`id`, `color_id`, `name`, `text`, `serial`, `file_name`, `colorcontent_url`, `order`, `user_id`, `count`, `status`, `added`, `modified`) VALUES
(1, 4, 'Atasan Merah', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1427961416, 1427961961),
(2, 10, 'Atasan Kuning', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1427961812, 1427961968),
(3, 4, 'Bawahan Merah', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1427961852, NULL),
(4, 10, 'Bawahan Kuning', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1427961873, 1427961904),
(5, 8, 'Atasan Hijau', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1427961918, NULL),
(6, 8, 'Bawahan Hijau', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1427961935, NULL),
(7, 24, 'Atasan Abu Abu', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1427961987, NULL),
(8, 24, 'Bawahan Abu Abu', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1427962020, NULL),
(9, 12, 'Atasan Ungu', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1427962049, NULL),
(10, 12, 'Bawahan Ungu', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1427962076, NULL),
(11, 25, 'Atasan Hitam', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1427962122, NULL),
(12, 25, 'Bawahan Hitam', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1427962136, NULL),
(13, 15, 'Atasan Putih', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1427962156, NULL),
(14, 15, 'Bawahan Putih', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1427962170, NULL),
(15, 2, 'Atasan Biru', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1427962188, NULL),
(16, 2, 'Bawahan Biru', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1427962200, 1427962210);

-- --------------------------------------------------------

--
-- Table structure for table `colorpersonals`
--

CREATE TABLE IF NOT EXISTS `colorpersonals` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) DEFAULT NULL,
  `colorcontent_id` int(11) DEFAULT NULL,
  `added` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `session_id` (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE IF NOT EXISTS `colors` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `text` text,
  `serial` text,
  `file_name` varchar(512) DEFAULT NULL,
  `color_url` varchar(512) DEFAULT NULL,
  `order` tinyint(3) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `added` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `text`, `serial`, `file_name`, `color_url`, `order`, `user_id`, `count`, `status`, `added`, `modified`) VALUES
(1, NULL, NULL, 'FF5938', NULL, NULL, NULL, NULL, NULL, 1, 1427959090, NULL),
(2, NULL, NULL, '3068FF', NULL, NULL, NULL, NULL, NULL, 1, 1427959236, NULL),
(3, NULL, NULL, 'EEFFA8', NULL, NULL, NULL, NULL, NULL, 1, 1427959243, NULL),
(4, NULL, NULL, 'FF0D15', NULL, NULL, NULL, NULL, NULL, 1, 1427959251, NULL),
(5, NULL, NULL, 'FFD95C', NULL, NULL, NULL, NULL, NULL, 1, 1427959257, NULL),
(6, NULL, NULL, '17FFE0', NULL, NULL, NULL, NULL, NULL, 1, 1427959262, NULL),
(7, NULL, NULL, 'E2FF9E', NULL, NULL, NULL, NULL, NULL, 1, 1427959268, NULL),
(8, NULL, NULL, '1AFF12', NULL, NULL, NULL, NULL, NULL, 1, 1427959273, NULL),
(9, NULL, NULL, 'E9E6FF', NULL, NULL, NULL, NULL, NULL, 1, 1427959279, NULL),
(10, NULL, NULL, 'F8FF36', NULL, NULL, NULL, NULL, NULL, 1, 1427959287, NULL),
(11, NULL, NULL, 'FFF2E8', NULL, NULL, NULL, NULL, NULL, 1, 1427959293, NULL),
(12, NULL, NULL, '9C08FF', NULL, NULL, NULL, NULL, NULL, 1, 1427959299, NULL),
(13, NULL, NULL, 'FFD8B5', NULL, NULL, NULL, NULL, NULL, 1, 1427959303, NULL),
(14, NULL, NULL, '8EFF78', NULL, NULL, NULL, NULL, NULL, 1, 1427959308, NULL),
(15, NULL, NULL, 'FFFFFF', NULL, NULL, NULL, NULL, NULL, 1, 1427959317, NULL),
(16, NULL, NULL, '570101', NULL, NULL, NULL, NULL, NULL, 1, 1427959323, NULL),
(17, NULL, NULL, 'FFBF29', NULL, NULL, NULL, NULL, NULL, 1, 1427959330, NULL),
(18, NULL, NULL, '26FF26', NULL, NULL, NULL, NULL, NULL, 1, 1427959336, NULL),
(19, NULL, NULL, 'FFF017', NULL, NULL, NULL, NULL, NULL, 1, 1427959341, NULL),
(20, NULL, NULL, '08F7FF', NULL, NULL, NULL, NULL, NULL, 1, 1427959348, NULL),
(21, NULL, NULL, 'EFFFBA', NULL, NULL, NULL, NULL, NULL, 1, 1427959353, NULL),
(22, NULL, NULL, 'A5D6C4', NULL, NULL, NULL, NULL, NULL, 1, 1427959358, NULL),
(23, NULL, NULL, 'C7BF4E', NULL, NULL, NULL, NULL, NULL, 1, 1427959369, NULL),
(24, NULL, NULL, 'DDD6FF', NULL, NULL, NULL, NULL, NULL, 1, 1427959387, NULL),
(25, NULL, NULL, '000000', NULL, NULL, NULL, NULL, NULL, 1, 1427962111, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `color_contents`
--

CREATE TABLE IF NOT EXISTS `color_contents` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `color_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `text` text,
  `serial` text,
  `file_name` varchar(512) DEFAULT NULL,
  `colorcontent_url` varchar(512) DEFAULT NULL,
  `order` tinyint(3) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `added` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `color_personals`
--

CREATE TABLE IF NOT EXISTS `color_personals` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) DEFAULT NULL,
  `colorcontent_id` int(11) DEFAULT NULL,
  `added` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `session_id` (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE IF NOT EXISTS `configurations` (
  `parameter` varchar(150) NOT NULL DEFAULT '',
  `value` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`parameter`,`value`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`parameter`, `value`) VALUES
('environment', '0'),
('install', '0'),
('maintenance', '0'),
('theme', '0');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE IF NOT EXISTS `divisions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `is_system` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) DEFAULT '1',
  `added` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`,`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `subject`, `description`, `is_system`, `status`, `added`, `modified`) VALUES
(12, 'developer', 'Developer', '<p>\r\n	Web Developer Division</p>\r\n', 1, 1, 1364610224, 1364610224),
(13, 'director', 'Director', '<p>\r\n	Director</p>\r\n', 1, 1, 1364610224, 1368369595),
(14, 'account', 'Account', '<p>\r\n	Account</p>\r\n', 1, 1, 0, 0),
(15, 'manager', 'Manager', '<p>\r\n	Manager</p>\r\n', 1, 1, 0, 0),
(16, 'strategist', 'Strategist', '<p>\r\n	Strategist</p>\r\n', 1, 1, 0, 0),
(17, 'creative', 'Creative', '<p>\r\n	Creative</p>\r\n', 1, 1, 0, 0),
(18, 'finance', 'Finance', '<p>\r\n	Finance</p>\r\n', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `division_files`
--

CREATE TABLE IF NOT EXISTS `division_files` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `division_id` int(11) unsigned DEFAULT NULL,
  `field_name` varchar(96) DEFAULT NULL,
  `file_name` varchar(64) DEFAULT NULL,
  `file_type` varchar(16) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`division_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `division_files`
--

INSERT INTO `division_files` (`id`, `division_id`, `field_name`, `file_name`, `file_type`, `caption`) VALUES
(1, 13, 'image_1', 'd0020c5505cc68f55446c109c352930d.jpg', 'image/jpeg', '');

-- --------------------------------------------------------

--
-- Table structure for table `group_permissions`
--

CREATE TABLE IF NOT EXISTS `group_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `value` smallint(1) NOT NULL,
  `added` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1459 ;

--
-- Dumping data for table `group_permissions`
--

INSERT INTO `group_permissions` (`id`, `permission_id`, `group_id`, `value`, `added`, `modified`) VALUES
(1, 1, 1, 1, 1469439285, 0),
(2, 2, 1, 1, 1469439285, 0),
(3, 3, 1, 1, 1469439285, 0),
(4, 4, 1, 1, 1469439285, 0),
(5, 5, 1, 1, 1469439285, 0),
(6, 6, 1, 1, 1469439285, 0),
(7, 40, 1, 1, 1469439285, 0),
(8, 41, 1, 1, 1469439285, 0),
(9, 42, 1, 1, 1469439285, 0),
(10, 43, 1, 1, 1469439285, 0),
(11, 73, 1, 1, 1469439285, 0),
(12, 74, 1, 1, 1469439285, 0),
(13, 75, 1, 1, 1469439285, 0),
(14, 76, 1, 1, 1469439285, 0),
(15, 98, 1, 1, 1469439285, 0),
(16, 99, 1, 1, 1469439285, 0),
(17, 114, 1, 1, 1469439285, 0),
(18, 115, 1, 1, 1469439285, 0),
(19, 130, 1, 1, 1469439285, 0),
(20, 131, 1, 1, 1469439285, 0),
(21, 139, 1, 1, 1469439285, 0),
(22, 140, 1, 1, 1469439285, 0),
(23, 141, 1, 1, 1469439285, 0),
(24, 7, 1, 1, 1469439285, 0),
(25, 8, 1, 1, 1469439285, 0),
(26, 9, 1, 1, 1469439285, 0),
(27, 10, 1, 1, 1469439285, 0),
(28, 11, 1, 1, 1469439285, 0),
(29, 12, 1, 1, 1469439285, 0),
(30, 13, 1, 1, 1469439285, 0),
(31, 14, 1, 1, 1469439285, 0),
(32, 15, 1, 1, 1469439285, 0),
(33, 16, 1, 1, 1469439285, 0),
(34, 17, 1, 1, 1469439285, 0),
(35, 18, 1, 1, 1469439285, 0),
(36, 19, 1, 1, 1469439285, 0),
(37, 20, 1, 1, 1469439285, 0),
(38, 21, 1, 1, 1469439285, 0),
(39, 22, 1, 1, 1469439285, 0),
(40, 23, 1, 1, 1469439285, 0),
(41, 24, 1, 1, 1469439285, 0),
(42, 25, 1, 1, 1469439285, 0),
(43, 26, 1, 1, 1469439285, 0),
(44, 27, 1, 1, 1469439285, 0),
(45, 28, 1, 1, 1469439285, 0),
(46, 29, 1, 1, 1469439285, 0),
(47, 30, 1, 1, 1469439285, 0),
(48, 31, 1, 1, 1469439285, 0),
(49, 32, 1, 1, 1469439285, 0),
(50, 33, 1, 1, 1469439285, 0),
(51, 34, 1, 1, 1469439285, 0),
(52, 35, 1, 1, 1469439285, 0),
(53, 36, 1, 1, 1469439285, 0),
(54, 37, 1, 1, 1469439285, 0),
(55, 38, 1, 1, 1469439285, 0),
(56, 39, 1, 1, 1469439285, 0),
(57, 44, 1, 1, 1469439285, 0),
(58, 45, 1, 1, 1469439285, 0),
(59, 46, 1, 1, 1469439285, 0),
(60, 47, 1, 1, 1469439285, 0),
(61, 48, 1, 1, 1469439285, 0),
(62, 49, 1, 1, 1469439285, 0),
(63, 50, 1, 1, 1469439285, 0),
(64, 51, 1, 1, 1469439285, 0),
(65, 52, 1, 1, 1469439285, 0),
(66, 53, 1, 1, 1469439285, 0),
(67, 54, 1, 1, 1469439285, 0),
(68, 55, 1, 1, 1469439285, 0),
(69, 56, 1, 1, 1469439285, 0),
(70, 57, 1, 1, 1469439285, 0),
(71, 58, 1, 1, 1469439285, 0),
(72, 59, 1, 1, 1469439285, 0),
(73, 60, 1, 1, 1469439285, 0),
(74, 61, 1, 1, 1469439285, 0),
(75, 62, 1, 1, 1469439285, 0),
(76, 63, 1, 1, 1469439285, 0),
(77, 64, 1, 1, 1469439285, 0),
(78, 65, 1, 1, 1469439285, 0),
(79, 66, 1, 1, 1469439285, 0),
(80, 67, 1, 1, 1469439285, 0),
(81, 68, 1, 1, 1469439285, 0),
(82, 69, 1, 1, 1469439285, 0),
(83, 70, 1, 1, 1469439285, 0),
(84, 71, 1, 1, 1469439285, 0),
(85, 72, 1, 1, 1469439285, 0),
(86, 77, 1, 1, 1469439285, 0),
(87, 78, 1, 1, 1469439285, 0),
(88, 79, 1, 1, 1469439285, 0),
(89, 80, 1, 1, 1469439285, 0),
(90, 81, 1, 1, 1469439285, 0),
(91, 82, 1, 1, 1469439285, 0),
(92, 83, 1, 1, 1469439285, 0),
(93, 84, 1, 1, 1469439285, 0),
(94, 85, 1, 1, 1469439285, 0),
(95, 86, 1, 1, 1469439285, 0),
(96, 87, 1, 1, 1469439285, 0),
(97, 88, 1, 1, 1469439285, 0),
(98, 89, 1, 1, 1469439285, 0),
(99, 90, 1, 1, 1469439285, 0),
(100, 91, 1, 1, 1469439285, 0),
(101, 92, 1, 1, 1469439285, 0),
(102, 93, 1, 1, 1469439285, 0),
(103, 94, 1, 1, 1469439285, 0),
(104, 95, 1, 1, 1469439285, 0),
(105, 96, 1, 1, 1469439285, 0),
(106, 97, 1, 1, 1469439285, 0),
(107, 100, 1, 1, 1469439285, 0),
(108, 101, 1, 1, 1469439285, 0),
(109, 102, 1, 1, 1469439285, 0),
(110, 103, 1, 1, 1469439285, 0),
(111, 104, 1, 1, 1469439285, 0),
(112, 105, 1, 1, 1469439285, 0),
(113, 106, 1, 1, 1469439285, 0),
(114, 107, 1, 1, 1469439285, 0),
(115, 108, 1, 1, 1469439285, 0),
(116, 109, 1, 1, 1469439285, 0),
(117, 110, 1, 1, 1469439285, 0),
(118, 111, 1, 1, 1469439285, 0),
(119, 112, 1, 1, 1469439285, 0),
(120, 113, 1, 1, 1469439285, 0),
(121, 116, 1, 1, 1469439285, 0),
(122, 117, 1, 1, 1469439285, 0),
(123, 118, 1, 1, 1469439285, 0),
(124, 119, 1, 1, 1469439285, 0),
(125, 120, 1, 1, 1469439285, 0),
(126, 121, 1, 1, 1469439285, 0),
(127, 122, 1, 1, 1469439285, 0),
(128, 123, 1, 1, 1469439285, 0),
(129, 124, 1, 1, 1469439285, 0),
(130, 125, 1, 1, 1469439285, 0),
(131, 126, 1, 1, 1469439285, 0),
(132, 127, 1, 1, 1469439285, 0),
(133, 128, 1, 1, 1469439285, 0),
(134, 129, 1, 1, 1469439285, 0),
(135, 132, 1, 1, 1469439285, 0),
(136, 133, 1, 1, 1469439285, 0),
(137, 134, 1, 1, 1469439285, 0),
(138, 135, 1, 1, 1469439285, 0),
(139, 136, 1, 1, 1469439285, 0),
(140, 137, 1, 1, 1469439285, 0),
(141, 138, 1, 1, 1469439285, 0),
(142, 142, 1, 1, 1469439285, 0),
(143, 143, 1, 1, 1469439285, 0),
(144, 144, 1, 1, 1469439285, 0),
(145, 145, 1, 1, 1469439285, 0),
(146, 146, 1, 1, 1469439285, 0),
(147, 147, 1, 1, 1469439285, 0),
(148, 148, 1, 1, 1469439285, 0),
(149, 149, 1, 1, 1469439285, 0),
(150, 150, 1, 1, 1469439285, 0),
(151, 151, 1, 1, 1469439285, 0),
(152, 152, 1, 1, 1469439285, 0),
(153, 153, 1, 1, 1469439285, 0),
(154, 154, 1, 1, 1469439285, 0),
(155, 155, 1, 1, 1469439285, 0),
(156, 156, 1, 1, 1469439285, 0),
(157, 157, 1, 1, 1469439285, 0),
(158, 158, 1, 1, 1469439285, 0),
(159, 159, 1, 1, 1469439285, 0),
(160, 160, 1, 1, 1469439285, 0),
(161, 161, 1, 1, 1469439285, 0),
(162, 162, 1, 1, 1469439285, 0),
(163, 1, 2, 1, 1469439285, 0),
(164, 2, 2, 1, 1469439285, 0),
(165, 3, 2, 1, 1469439285, 0),
(166, 4, 2, 1, 1469439285, 0),
(167, 5, 2, 1, 1469439285, 0),
(168, 6, 2, 1, 1469439285, 0),
(169, 40, 2, 1, 1469439285, 0),
(170, 41, 2, 1, 1469439285, 0),
(171, 42, 2, 1, 1469439285, 0),
(172, 43, 2, 1, 1469439285, 0),
(173, 73, 2, 1, 1469439285, 0),
(174, 74, 2, 1, 1469439285, 0),
(175, 75, 2, 1, 1469439285, 0),
(176, 76, 2, 1, 1469439285, 0),
(177, 98, 2, 1, 1469439285, 0),
(178, 99, 2, 1, 1469439285, 0),
(179, 114, 2, 1, 1469439285, 0),
(180, 115, 2, 1, 1469439285, 0),
(181, 130, 2, 1, 1469439285, 0),
(182, 131, 2, 1, 1469439285, 0),
(183, 139, 2, 1, 1469439285, 0),
(184, 140, 2, 1, 1469439285, 0),
(185, 141, 2, 1, 1469439285, 0),
(186, 7, 2, 1, 1469439285, 0),
(187, 8, 2, 1, 1469439285, 0),
(188, 9, 2, 1, 1469439285, 0),
(189, 10, 2, 1, 1469439285, 0),
(190, 11, 2, 1, 1469439285, 0),
(191, 12, 2, 1, 1469439285, 0),
(192, 13, 2, 1, 1469439285, 0),
(193, 14, 2, 1, 1469439285, 0),
(194, 15, 2, 1, 1469439285, 0),
(195, 16, 2, 1, 1469439285, 0),
(196, 17, 2, 1, 1469439285, 0),
(197, 18, 2, 1, 1469439285, 0),
(198, 19, 2, 1, 1469439285, 0),
(199, 20, 2, 1, 1469439285, 0),
(200, 21, 2, 1, 1469439285, 0),
(201, 22, 2, 1, 1469439285, 0),
(202, 23, 2, 1, 1469439285, 0),
(203, 24, 2, 1, 1469439285, 0),
(204, 25, 2, 1, 1469439285, 0),
(205, 26, 2, 1, 1469439285, 0),
(206, 27, 2, 1, 1469439285, 0),
(207, 28, 2, 1, 1469439285, 0),
(208, 29, 2, 1, 1469439285, 0),
(209, 30, 2, 1, 1469439285, 0),
(210, 31, 2, 1, 1469439285, 0),
(211, 32, 2, 1, 1469439285, 0),
(212, 33, 2, 1, 1469439285, 0),
(213, 34, 2, 1, 1469439285, 0),
(214, 35, 2, 1, 1469439285, 0),
(215, 36, 2, 1, 1469439285, 0),
(216, 37, 2, 1, 1469439285, 0),
(217, 38, 2, 1, 1469439285, 0),
(218, 39, 2, 1, 1469439285, 0),
(219, 44, 2, 1, 1469439285, 0),
(220, 45, 2, 1, 1469439285, 0),
(221, 46, 2, 1, 1469439285, 0),
(222, 47, 2, 1, 1469439285, 0),
(223, 48, 2, 1, 1469439285, 0),
(224, 49, 2, 1, 1469439285, 0),
(225, 50, 2, 1, 1469439285, 0),
(226, 51, 2, 1, 1469439285, 0),
(227, 52, 2, 1, 1469439285, 0),
(228, 53, 2, 1, 1469439285, 0),
(229, 54, 2, 1, 1469439285, 0),
(230, 55, 2, 1, 1469439285, 0),
(231, 56, 2, 1, 1469439285, 0),
(232, 57, 2, 1, 1469439285, 0),
(233, 58, 2, 1, 1469439285, 0),
(234, 59, 2, 1, 1469439285, 0),
(235, 60, 2, 1, 1469439285, 0),
(236, 61, 2, 1, 1469439285, 0),
(237, 62, 2, 1, 1469439285, 0),
(238, 63, 2, 1, 1469439285, 0),
(239, 64, 2, 1, 1469439285, 0),
(240, 65, 2, 1, 1469439285, 0),
(241, 66, 2, 1, 1469439285, 0),
(242, 67, 2, 1, 1469439285, 0),
(243, 68, 2, 1, 1469439285, 0),
(244, 69, 2, 1, 1469439285, 0),
(245, 70, 2, 1, 1469439285, 0),
(246, 71, 2, 1, 1469439285, 0),
(247, 72, 2, 1, 1469439285, 0),
(248, 77, 2, 1, 1469439285, 0),
(249, 78, 2, 1, 1469439285, 0),
(250, 79, 2, 1, 1469439285, 0),
(251, 80, 2, 1, 1469439285, 0),
(252, 81, 2, 1, 1469439285, 0),
(253, 82, 2, 1, 1469439285, 0),
(254, 83, 2, 1, 1469439285, 0),
(255, 84, 2, 1, 1469439285, 0),
(256, 85, 2, 1, 1469439285, 0),
(257, 86, 2, 1, 1469439285, 0),
(258, 87, 2, 1, 1469439285, 0),
(259, 88, 2, 1, 1469439285, 0),
(260, 89, 2, 1, 1469439285, 0),
(261, 90, 2, 1, 1469439285, 0),
(262, 91, 2, 1, 1469439285, 0),
(263, 92, 2, 1, 1469439285, 0),
(264, 93, 2, 1, 1469439285, 0),
(265, 94, 2, 1, 1469439285, 0),
(266, 95, 2, 1, 1469439285, 0),
(267, 96, 2, 1, 1469439285, 0),
(268, 97, 2, 1, 1469439285, 0),
(269, 100, 2, 1, 1469439285, 0),
(270, 101, 2, 1, 1469439285, 0),
(271, 102, 2, 1, 1469439285, 0),
(272, 103, 2, 1, 1469439285, 0),
(273, 104, 2, 1, 1469439285, 0),
(274, 105, 2, 1, 1469439285, 0),
(275, 106, 2, 1, 1469439285, 0),
(276, 107, 2, 1, 1469439285, 0),
(277, 108, 2, 1, 1469439285, 0),
(278, 109, 2, 1, 1469439285, 0),
(279, 110, 2, 1, 1469439285, 0),
(280, 111, 2, 1, 1469439285, 0),
(281, 112, 2, 1, 1469439285, 0),
(282, 113, 2, 1, 1469439285, 0),
(283, 116, 2, 1, 1469439285, 0),
(284, 117, 2, 1, 1469439285, 0),
(285, 118, 2, 1, 1469439285, 0),
(286, 119, 2, 1, 1469439285, 0),
(287, 120, 2, 1, 1469439285, 0),
(288, 121, 2, 1, 1469439285, 0),
(289, 122, 2, 1, 1469439285, 0),
(290, 123, 2, 1, 1469439285, 0),
(291, 124, 2, 1, 1469439285, 0),
(292, 125, 2, 1, 1469439285, 0),
(293, 126, 2, 1, 1469439285, 0),
(294, 127, 2, 1, 1469439285, 0),
(295, 128, 2, 1, 1469439285, 0),
(296, 129, 2, 1, 1469439285, 0),
(297, 132, 2, 1, 1469439285, 0),
(298, 133, 2, 1, 1469439285, 0),
(299, 134, 2, 1, 1469439285, 0),
(300, 135, 2, 1, 1469439285, 0),
(301, 136, 2, 1, 1469439285, 0),
(302, 137, 2, 1, 1469439285, 0),
(303, 138, 2, 1, 1469439285, 0),
(304, 142, 2, 1, 1469439285, 0),
(305, 143, 2, 1, 1469439285, 0),
(306, 144, 2, 1, 1469439285, 0),
(307, 145, 2, 1, 1469439285, 0),
(308, 146, 2, 1, 1469439285, 0),
(309, 147, 2, 1, 1469439285, 0),
(310, 148, 2, 1, 1469439285, 0),
(311, 149, 2, 1, 1469439285, 0),
(312, 150, 2, 1, 1469439285, 0),
(313, 151, 2, 1, 1469439285, 0),
(314, 152, 2, 1, 1469439285, 0),
(315, 153, 2, 1, 1469439285, 0),
(316, 154, 2, 1, 1469439285, 0),
(317, 155, 2, 1, 1469439285, 0),
(318, 156, 2, 1, 1469439285, 0),
(319, 157, 2, 1, 1469439285, 0),
(320, 158, 2, 1, 1469439285, 0),
(321, 159, 2, 1, 1469439285, 0),
(322, 160, 2, 1, 1469439285, 0),
(323, 161, 2, 1, 1469439285, 0),
(324, 162, 2, 1, 1469439285, 0),
(325, 1, 99, 0, 1469439285, 0),
(326, 2, 99, 0, 1469439285, 0),
(327, 3, 99, 0, 1469439285, 0),
(328, 4, 99, 0, 1469439285, 0),
(329, 5, 99, 0, 1469439285, 0),
(330, 6, 99, 0, 1469439285, 0),
(331, 40, 99, 0, 1469439285, 0),
(332, 41, 99, 0, 1469439285, 0),
(333, 42, 99, 0, 1469439285, 0),
(334, 43, 99, 0, 1469439285, 0),
(335, 73, 99, 0, 1469439285, 0),
(336, 74, 99, 0, 1469439285, 0),
(337, 75, 99, 0, 1469439285, 0),
(338, 76, 99, 0, 1469439285, 0),
(339, 98, 99, 0, 1469439285, 0),
(340, 99, 99, 0, 1469439285, 0),
(341, 114, 99, 0, 1469439285, 0),
(342, 115, 99, 0, 1469439285, 0),
(343, 130, 99, 0, 1469439285, 0),
(344, 131, 99, 0, 1469439285, 0),
(345, 139, 99, 0, 1469439285, 0),
(346, 140, 99, 0, 1469439285, 0),
(347, 141, 99, 0, 1469439285, 0),
(348, 7, 99, 0, 1469439285, 0),
(349, 8, 99, 0, 1469439285, 0),
(350, 9, 99, 0, 1469439285, 0),
(351, 10, 99, 0, 1469439285, 0),
(352, 11, 99, 0, 1469439285, 0),
(353, 12, 99, 0, 1469439285, 0),
(354, 13, 99, 0, 1469439285, 0),
(355, 14, 99, 0, 1469439285, 0),
(356, 15, 99, 0, 1469439285, 0),
(357, 16, 99, 0, 1469439285, 0),
(358, 17, 99, 0, 1469439285, 0),
(359, 18, 99, 0, 1469439285, 0),
(360, 19, 99, 0, 1469439285, 0),
(361, 20, 99, 0, 1469439285, 0),
(362, 21, 99, 0, 1469439285, 0),
(363, 22, 99, 0, 1469439285, 0),
(364, 23, 99, 0, 1469439285, 0),
(365, 24, 99, 0, 1469439285, 0),
(366, 25, 99, 0, 1469439285, 0),
(367, 26, 99, 0, 1469439285, 0),
(368, 27, 99, 0, 1469439285, 0),
(369, 28, 99, 0, 1469439285, 0),
(370, 29, 99, 0, 1469439285, 0),
(371, 30, 99, 0, 1469439285, 0),
(372, 31, 99, 0, 1469439285, 0),
(373, 32, 99, 0, 1469439285, 0),
(374, 33, 99, 0, 1469439285, 0),
(375, 34, 99, 0, 1469439285, 0),
(376, 35, 99, 0, 1469439285, 0),
(377, 36, 99, 0, 1469439285, 0),
(378, 37, 99, 0, 1469439285, 0),
(379, 38, 99, 0, 1469439285, 0),
(380, 39, 99, 0, 1469439285, 0),
(381, 44, 99, 0, 1469439285, 0),
(382, 45, 99, 0, 1469439285, 0),
(383, 46, 99, 0, 1469439285, 0),
(384, 47, 99, 0, 1469439285, 0),
(385, 48, 99, 0, 1469439285, 0),
(386, 49, 99, 0, 1469439285, 0),
(387, 50, 99, 0, 1469439285, 0),
(388, 51, 99, 0, 1469439285, 0),
(389, 52, 99, 0, 1469439285, 0),
(390, 53, 99, 0, 1469439285, 0),
(391, 54, 99, 0, 1469439285, 0),
(392, 55, 99, 0, 1469439285, 0),
(393, 56, 99, 0, 1469439285, 0),
(394, 57, 99, 0, 1469439285, 0),
(395, 58, 99, 0, 1469439285, 0),
(396, 59, 99, 0, 1469439285, 0),
(397, 60, 99, 0, 1469439285, 0),
(398, 61, 99, 0, 1469439285, 0),
(399, 62, 99, 0, 1469439285, 0),
(400, 63, 99, 0, 1469439285, 0),
(401, 64, 99, 0, 1469439285, 0),
(402, 65, 99, 0, 1469439285, 0),
(403, 66, 99, 0, 1469439285, 0),
(404, 67, 99, 0, 1469439285, 0),
(405, 68, 99, 0, 1469439285, 0),
(406, 69, 99, 0, 1469439285, 0),
(407, 70, 99, 0, 1469439285, 0),
(408, 71, 99, 0, 1469439285, 0),
(409, 72, 99, 0, 1469439285, 0),
(410, 77, 99, 0, 1469439285, 0),
(411, 78, 99, 0, 1469439285, 0),
(412, 79, 99, 0, 1469439285, 0),
(413, 80, 99, 0, 1469439285, 0),
(414, 81, 99, 0, 1469439285, 0),
(415, 82, 99, 0, 1469439285, 0),
(416, 83, 99, 0, 1469439285, 0),
(417, 84, 99, 0, 1469439285, 0),
(418, 85, 99, 0, 1469439285, 0),
(419, 86, 99, 0, 1469439285, 0),
(420, 87, 99, 0, 1469439285, 0),
(421, 88, 99, 0, 1469439285, 0),
(422, 89, 99, 0, 1469439285, 0),
(423, 90, 99, 0, 1469439285, 0),
(424, 91, 99, 0, 1469439285, 0),
(425, 92, 99, 0, 1469439285, 0),
(426, 93, 99, 0, 1469439285, 0),
(427, 94, 99, 0, 1469439285, 0),
(428, 95, 99, 0, 1469439285, 0),
(429, 96, 99, 0, 1469439285, 0),
(430, 97, 99, 0, 1469439285, 0),
(431, 100, 99, 0, 1469439285, 0),
(432, 101, 99, 0, 1469439285, 0),
(433, 102, 99, 0, 1469439285, 0),
(434, 103, 99, 0, 1469439285, 0),
(435, 104, 99, 0, 1469439285, 0),
(436, 105, 99, 0, 1469439285, 0),
(437, 106, 99, 0, 1469439285, 0),
(438, 107, 99, 0, 1469439285, 0),
(439, 108, 99, 0, 1469439285, 0),
(440, 109, 99, 0, 1469439285, 0),
(441, 110, 99, 0, 1469439285, 0),
(442, 111, 99, 0, 1469439285, 0),
(443, 112, 99, 0, 1469439285, 0),
(444, 113, 99, 0, 1469439285, 0),
(445, 116, 99, 0, 1469439285, 0),
(446, 117, 99, 0, 1469439285, 0),
(447, 118, 99, 0, 1469439285, 0),
(448, 119, 99, 0, 1469439285, 0),
(449, 120, 99, 0, 1469439285, 0),
(450, 121, 99, 0, 1469439285, 0),
(451, 122, 99, 0, 1469439285, 0),
(452, 123, 99, 0, 1469439285, 0),
(453, 124, 99, 0, 1469439285, 0),
(454, 125, 99, 0, 1469439285, 0),
(455, 126, 99, 0, 1469439285, 0),
(456, 127, 99, 0, 1469439285, 0),
(457, 128, 99, 0, 1469439285, 0),
(458, 129, 99, 0, 1469439285, 0),
(459, 132, 99, 0, 1469439285, 0),
(460, 133, 99, 0, 1469439285, 0),
(461, 134, 99, 0, 1469439285, 0),
(462, 135, 99, 0, 1469439285, 0),
(463, 136, 99, 0, 1469439285, 0),
(464, 137, 99, 0, 1469439285, 0),
(465, 138, 99, 0, 1469439285, 0),
(466, 142, 99, 0, 1469439285, 0),
(467, 143, 99, 0, 1469439285, 0),
(468, 144, 99, 0, 1469439285, 0),
(469, 145, 99, 0, 1469439285, 0),
(470, 146, 99, 0, 1469439285, 0),
(471, 147, 99, 0, 1469439285, 0),
(472, 148, 99, 0, 1469439285, 0),
(473, 149, 99, 0, 1469439285, 0),
(474, 150, 99, 0, 1469439285, 0),
(475, 151, 99, 0, 1469439285, 0),
(476, 152, 99, 0, 1469439285, 0),
(477, 153, 99, 0, 1469439285, 0),
(478, 154, 99, 0, 1469439285, 0),
(479, 155, 99, 0, 1469439285, 0),
(480, 156, 99, 0, 1469439285, 0),
(481, 157, 99, 0, 1469439285, 0),
(482, 158, 99, 0, 1469439285, 0),
(483, 159, 99, 0, 1469439285, 0),
(484, 160, 99, 0, 1469439285, 0),
(485, 161, 99, 0, 1469439285, 0),
(486, 162, 99, 0, 1469439285, 0),
(487, 1, 111, 0, 1469439285, 0),
(488, 2, 111, 0, 1469439285, 0),
(489, 3, 111, 0, 1469439285, 0),
(490, 4, 111, 0, 1469439285, 0),
(491, 5, 111, 0, 1469439285, 0),
(492, 6, 111, 0, 1469439285, 0),
(493, 40, 111, 0, 1469439285, 0),
(494, 41, 111, 0, 1469439285, 0),
(495, 42, 111, 0, 1469439285, 0),
(496, 43, 111, 0, 1469439285, 0),
(497, 73, 111, 0, 1469439285, 0),
(498, 74, 111, 0, 1469439285, 0),
(499, 75, 111, 0, 1469439285, 0),
(500, 76, 111, 0, 1469439285, 0),
(501, 98, 111, 0, 1469439285, 0),
(502, 99, 111, 0, 1469439285, 0),
(503, 114, 111, 0, 1469439285, 0),
(504, 115, 111, 0, 1469439285, 0),
(505, 130, 111, 0, 1469439285, 0),
(506, 131, 111, 0, 1469439285, 0),
(507, 139, 111, 0, 1469439285, 0),
(508, 140, 111, 0, 1469439285, 0),
(509, 141, 111, 0, 1469439285, 0),
(510, 7, 111, 0, 1469439285, 0),
(511, 8, 111, 0, 1469439285, 0),
(512, 9, 111, 0, 1469439285, 0),
(513, 10, 111, 0, 1469439285, 0),
(514, 11, 111, 0, 1469439285, 0),
(515, 12, 111, 0, 1469439285, 0),
(516, 13, 111, 0, 1469439285, 0),
(517, 14, 111, 0, 1469439285, 0),
(518, 15, 111, 0, 1469439285, 0),
(519, 16, 111, 0, 1469439285, 0),
(520, 17, 111, 0, 1469439285, 0),
(521, 18, 111, 0, 1469439285, 0),
(522, 19, 111, 0, 1469439285, 0),
(523, 20, 111, 0, 1469439285, 0),
(524, 21, 111, 0, 1469439285, 0),
(525, 22, 111, 0, 1469439285, 0),
(526, 23, 111, 0, 1469439285, 0),
(527, 24, 111, 0, 1469439285, 0),
(528, 25, 111, 0, 1469439285, 0),
(529, 26, 111, 0, 1469439285, 0),
(530, 27, 111, 0, 1469439285, 0),
(531, 28, 111, 0, 1469439285, 0),
(532, 29, 111, 0, 1469439285, 0),
(533, 30, 111, 0, 1469439285, 0),
(534, 31, 111, 0, 1469439285, 0),
(535, 32, 111, 0, 1469439285, 0),
(536, 33, 111, 0, 1469439285, 0),
(537, 34, 111, 0, 1469439285, 0),
(538, 35, 111, 0, 1469439285, 0),
(539, 36, 111, 0, 1469439285, 0),
(540, 37, 111, 0, 1469439285, 0),
(541, 38, 111, 0, 1469439285, 0),
(542, 39, 111, 0, 1469439285, 0),
(543, 44, 111, 0, 1469439285, 0),
(544, 45, 111, 0, 1469439285, 0),
(545, 46, 111, 0, 1469439285, 0),
(546, 47, 111, 0, 1469439285, 0),
(547, 48, 111, 0, 1469439285, 0),
(548, 49, 111, 0, 1469439285, 0),
(549, 50, 111, 0, 1469439285, 0),
(550, 51, 111, 0, 1469439285, 0),
(551, 52, 111, 0, 1469439285, 0),
(552, 53, 111, 0, 1469439285, 0),
(553, 54, 111, 0, 1469439285, 0),
(554, 55, 111, 0, 1469439285, 0),
(555, 56, 111, 0, 1469439285, 0),
(556, 57, 111, 0, 1469439285, 0),
(557, 58, 111, 0, 1469439285, 0),
(558, 59, 111, 0, 1469439285, 0),
(559, 60, 111, 0, 1469439285, 0),
(560, 61, 111, 0, 1469439285, 0),
(561, 62, 111, 0, 1469439285, 0),
(562, 63, 111, 0, 1469439285, 0),
(563, 64, 111, 0, 1469439285, 0),
(564, 65, 111, 0, 1469439285, 0),
(565, 66, 111, 0, 1469439285, 0),
(566, 67, 111, 0, 1469439285, 0),
(567, 68, 111, 0, 1469439285, 0),
(568, 69, 111, 0, 1469439285, 0),
(569, 70, 111, 0, 1469439285, 0),
(570, 71, 111, 0, 1469439285, 0),
(571, 72, 111, 0, 1469439285, 0),
(572, 77, 111, 0, 1469439285, 0),
(573, 78, 111, 0, 1469439285, 0),
(574, 79, 111, 0, 1469439285, 0),
(575, 80, 111, 0, 1469439285, 0),
(576, 81, 111, 0, 1469439285, 0),
(577, 82, 111, 0, 1469439285, 0),
(578, 83, 111, 0, 1469439285, 0),
(579, 84, 111, 0, 1469439285, 0),
(580, 85, 111, 0, 1469439285, 0),
(581, 86, 111, 0, 1469439285, 0),
(582, 87, 111, 0, 1469439285, 0),
(583, 88, 111, 0, 1469439285, 0),
(584, 89, 111, 0, 1469439285, 0),
(585, 90, 111, 0, 1469439285, 0),
(586, 91, 111, 0, 1469439285, 0),
(587, 92, 111, 0, 1469439285, 0),
(588, 93, 111, 0, 1469439285, 0),
(589, 94, 111, 0, 1469439285, 0),
(590, 95, 111, 0, 1469439285, 0),
(591, 96, 111, 0, 1469439285, 0),
(592, 97, 111, 0, 1469439285, 0),
(593, 100, 111, 0, 1469439285, 0),
(594, 101, 111, 0, 1469439285, 0),
(595, 102, 111, 0, 1469439285, 0),
(596, 103, 111, 0, 1469439285, 0),
(597, 104, 111, 0, 1469439285, 0),
(598, 105, 111, 0, 1469439285, 0),
(599, 106, 111, 0, 1469439285, 0),
(600, 107, 111, 0, 1469439285, 0),
(601, 108, 111, 0, 1469439285, 0),
(602, 109, 111, 0, 1469439285, 0),
(603, 110, 111, 0, 1469439285, 0),
(604, 111, 111, 0, 1469439285, 0),
(605, 112, 111, 0, 1469439285, 0),
(606, 113, 111, 0, 1469439285, 0),
(607, 116, 111, 0, 1469439285, 0),
(608, 117, 111, 0, 1469439285, 0),
(609, 118, 111, 0, 1469439285, 0),
(610, 119, 111, 0, 1469439285, 0),
(611, 120, 111, 0, 1469439285, 0),
(612, 121, 111, 0, 1469439285, 0),
(613, 122, 111, 0, 1469439285, 0),
(614, 123, 111, 0, 1469439285, 0),
(615, 124, 111, 0, 1469439285, 0),
(616, 125, 111, 0, 1469439285, 0),
(617, 126, 111, 0, 1469439285, 0),
(618, 127, 111, 0, 1469439285, 0),
(619, 128, 111, 0, 1469439285, 0),
(620, 129, 111, 0, 1469439285, 0),
(621, 132, 111, 0, 1469439285, 0),
(622, 133, 111, 0, 1469439285, 0),
(623, 134, 111, 0, 1469439285, 0),
(624, 135, 111, 0, 1469439285, 0),
(625, 136, 111, 0, 1469439285, 0),
(626, 137, 111, 0, 1469439285, 0),
(627, 138, 111, 0, 1469439285, 0),
(628, 142, 111, 0, 1469439285, 0),
(629, 143, 111, 0, 1469439285, 0),
(630, 144, 111, 0, 1469439285, 0),
(631, 145, 111, 0, 1469439285, 0),
(632, 146, 111, 0, 1469439285, 0),
(633, 147, 111, 0, 1469439285, 0),
(634, 148, 111, 0, 1469439285, 0),
(635, 149, 111, 0, 1469439285, 0),
(636, 150, 111, 0, 1469439285, 0),
(637, 151, 111, 0, 1469439285, 0),
(638, 152, 111, 0, 1469439285, 0),
(639, 153, 111, 0, 1469439285, 0),
(640, 154, 111, 0, 1469439285, 0),
(641, 155, 111, 0, 1469439285, 0),
(642, 156, 111, 0, 1469439285, 0),
(643, 157, 111, 0, 1469439285, 0),
(644, 158, 111, 0, 1469439285, 0),
(645, 159, 111, 0, 1469439285, 0),
(646, 160, 111, 0, 1469439285, 0),
(647, 161, 111, 0, 1469439285, 0),
(648, 162, 111, 0, 1469439285, 0),
(649, 1, 112, 0, 1469439285, 0),
(650, 2, 112, 0, 1469439285, 0),
(651, 3, 112, 0, 1469439285, 0),
(652, 4, 112, 0, 1469439285, 0),
(653, 5, 112, 0, 1469439285, 0),
(654, 6, 112, 0, 1469439285, 0),
(655, 40, 112, 0, 1469439285, 0),
(656, 41, 112, 0, 1469439285, 0),
(657, 42, 112, 0, 1469439285, 0),
(658, 43, 112, 0, 1469439285, 0),
(659, 73, 112, 0, 1469439285, 0),
(660, 74, 112, 0, 1469439285, 0),
(661, 75, 112, 0, 1469439285, 0),
(662, 76, 112, 0, 1469439285, 0),
(663, 98, 112, 0, 1469439285, 0),
(664, 99, 112, 0, 1469439285, 0),
(665, 114, 112, 0, 1469439285, 0),
(666, 115, 112, 0, 1469439285, 0),
(667, 130, 112, 0, 1469439285, 0),
(668, 131, 112, 0, 1469439285, 0),
(669, 139, 112, 0, 1469439285, 0),
(670, 140, 112, 0, 1469439285, 0),
(671, 141, 112, 0, 1469439285, 0),
(672, 7, 112, 0, 1469439285, 0),
(673, 8, 112, 0, 1469439285, 0),
(674, 9, 112, 0, 1469439285, 0),
(675, 10, 112, 0, 1469439285, 0),
(676, 11, 112, 0, 1469439285, 0),
(677, 12, 112, 0, 1469439285, 0),
(678, 13, 112, 0, 1469439285, 0),
(679, 14, 112, 0, 1469439285, 0),
(680, 15, 112, 0, 1469439285, 0),
(681, 16, 112, 0, 1469439285, 0),
(682, 17, 112, 0, 1469439285, 0),
(683, 18, 112, 0, 1469439285, 0),
(684, 19, 112, 0, 1469439285, 0),
(685, 20, 112, 0, 1469439285, 0),
(686, 21, 112, 0, 1469439285, 0),
(687, 22, 112, 0, 1469439285, 0),
(688, 23, 112, 0, 1469439285, 0),
(689, 24, 112, 0, 1469439285, 0),
(690, 25, 112, 0, 1469439285, 0),
(691, 26, 112, 0, 1469439285, 0),
(692, 27, 112, 0, 1469439285, 0),
(693, 28, 112, 0, 1469439285, 0),
(694, 29, 112, 0, 1469439285, 0),
(695, 30, 112, 0, 1469439285, 0),
(696, 31, 112, 0, 1469439285, 0),
(697, 32, 112, 0, 1469439285, 0),
(698, 33, 112, 0, 1469439285, 0),
(699, 34, 112, 0, 1469439285, 0),
(700, 35, 112, 0, 1469439285, 0),
(701, 36, 112, 0, 1469439285, 0),
(702, 37, 112, 0, 1469439285, 0),
(703, 38, 112, 0, 1469439285, 0),
(704, 39, 112, 0, 1469439285, 0),
(705, 44, 112, 0, 1469439285, 0),
(706, 45, 112, 0, 1469439285, 0),
(707, 46, 112, 0, 1469439285, 0),
(708, 47, 112, 0, 1469439285, 0),
(709, 48, 112, 0, 1469439285, 0),
(710, 49, 112, 0, 1469439285, 0),
(711, 50, 112, 0, 1469439285, 0),
(712, 51, 112, 0, 1469439285, 0),
(713, 52, 112, 0, 1469439285, 0),
(714, 53, 112, 0, 1469439285, 0),
(715, 54, 112, 0, 1469439285, 0),
(716, 55, 112, 0, 1469439285, 0),
(717, 56, 112, 0, 1469439285, 0),
(718, 57, 112, 0, 1469439285, 0),
(719, 58, 112, 0, 1469439285, 0),
(720, 59, 112, 0, 1469439285, 0),
(721, 60, 112, 0, 1469439285, 0),
(722, 61, 112, 0, 1469439285, 0),
(723, 62, 112, 0, 1469439285, 0),
(724, 63, 112, 0, 1469439285, 0),
(725, 64, 112, 0, 1469439285, 0),
(726, 65, 112, 0, 1469439285, 0),
(727, 66, 112, 0, 1469439285, 0),
(728, 67, 112, 0, 1469439285, 0),
(729, 68, 112, 0, 1469439285, 0),
(730, 69, 112, 0, 1469439285, 0),
(731, 70, 112, 0, 1469439285, 0),
(732, 71, 112, 0, 1469439285, 0),
(733, 72, 112, 0, 1469439285, 0),
(734, 77, 112, 0, 1469439285, 0),
(735, 78, 112, 0, 1469439285, 0),
(736, 79, 112, 0, 1469439285, 0),
(737, 80, 112, 0, 1469439285, 0),
(738, 81, 112, 0, 1469439285, 0),
(739, 82, 112, 0, 1469439285, 0),
(740, 83, 112, 0, 1469439285, 0),
(741, 84, 112, 0, 1469439285, 0),
(742, 85, 112, 0, 1469439285, 0),
(743, 86, 112, 0, 1469439285, 0),
(744, 87, 112, 0, 1469439285, 0),
(745, 88, 112, 0, 1469439285, 0),
(746, 89, 112, 0, 1469439285, 0),
(747, 90, 112, 0, 1469439285, 0),
(748, 91, 112, 0, 1469439285, 0),
(749, 92, 112, 0, 1469439285, 0),
(750, 93, 112, 0, 1469439285, 0),
(751, 94, 112, 0, 1469439285, 0),
(752, 95, 112, 0, 1469439285, 0),
(753, 96, 112, 0, 1469439285, 0),
(754, 97, 112, 0, 1469439285, 0),
(755, 100, 112, 0, 1469439285, 0),
(756, 101, 112, 0, 1469439285, 0),
(757, 102, 112, 0, 1469439285, 0),
(758, 103, 112, 0, 1469439285, 0),
(759, 104, 112, 0, 1469439285, 0),
(760, 105, 112, 0, 1469439285, 0),
(761, 106, 112, 0, 1469439285, 0),
(762, 107, 112, 0, 1469439285, 0),
(763, 108, 112, 0, 1469439285, 0),
(764, 109, 112, 0, 1469439285, 0),
(765, 110, 112, 0, 1469439285, 0),
(766, 111, 112, 0, 1469439285, 0),
(767, 112, 112, 0, 1469439285, 0),
(768, 113, 112, 0, 1469439285, 0),
(769, 116, 112, 0, 1469439285, 0),
(770, 117, 112, 0, 1469439285, 0),
(771, 118, 112, 0, 1469439285, 0),
(772, 119, 112, 0, 1469439285, 0),
(773, 120, 112, 0, 1469439285, 0),
(774, 121, 112, 0, 1469439285, 0),
(775, 122, 112, 0, 1469439285, 0),
(776, 123, 112, 0, 1469439285, 0),
(777, 124, 112, 0, 1469439285, 0),
(778, 125, 112, 0, 1469439285, 0),
(779, 126, 112, 0, 1469439285, 0),
(780, 127, 112, 0, 1469439285, 0),
(781, 128, 112, 0, 1469439285, 0),
(782, 129, 112, 0, 1469439285, 0),
(783, 132, 112, 0, 1469439285, 0),
(784, 133, 112, 0, 1469439285, 0),
(785, 134, 112, 0, 1469439285, 0),
(786, 135, 112, 0, 1469439285, 0),
(787, 136, 112, 0, 1469439285, 0),
(788, 137, 112, 0, 1469439285, 0),
(789, 138, 112, 0, 1469439285, 0),
(790, 142, 112, 0, 1469439285, 0),
(791, 143, 112, 0, 1469439285, 0),
(792, 144, 112, 0, 1469439285, 0),
(793, 145, 112, 0, 1469439285, 0),
(794, 146, 112, 0, 1469439285, 0),
(795, 147, 112, 0, 1469439285, 0),
(796, 148, 112, 0, 1469439285, 0),
(797, 149, 112, 0, 1469439285, 0),
(798, 150, 112, 0, 1469439285, 0),
(799, 151, 112, 0, 1469439285, 0),
(800, 152, 112, 0, 1469439285, 0),
(801, 153, 112, 0, 1469439285, 0),
(802, 154, 112, 0, 1469439285, 0),
(803, 155, 112, 0, 1469439285, 0),
(804, 156, 112, 0, 1469439285, 0),
(805, 157, 112, 0, 1469439285, 0),
(806, 158, 112, 0, 1469439285, 0),
(807, 159, 112, 0, 1469439285, 0),
(808, 160, 112, 0, 1469439285, 0),
(809, 161, 112, 0, 1469439285, 0),
(810, 162, 112, 0, 1469439285, 0),
(811, 1, 113, 0, 1469439285, 0),
(812, 2, 113, 0, 1469439285, 0),
(813, 3, 113, 0, 1469439285, 0),
(814, 4, 113, 0, 1469439285, 0),
(815, 5, 113, 0, 1469439285, 0),
(816, 6, 113, 0, 1469439285, 0),
(817, 40, 113, 0, 1469439285, 0),
(818, 41, 113, 0, 1469439285, 0),
(819, 42, 113, 0, 1469439285, 0),
(820, 43, 113, 0, 1469439285, 0),
(821, 73, 113, 0, 1469439285, 0),
(822, 74, 113, 0, 1469439285, 0),
(823, 75, 113, 0, 1469439285, 0),
(824, 76, 113, 0, 1469439285, 0),
(825, 98, 113, 0, 1469439285, 0),
(826, 99, 113, 0, 1469439285, 0),
(827, 114, 113, 0, 1469439285, 0),
(828, 115, 113, 0, 1469439285, 0),
(829, 130, 113, 0, 1469439285, 0),
(830, 131, 113, 0, 1469439285, 0),
(831, 139, 113, 0, 1469439285, 0),
(832, 140, 113, 0, 1469439285, 0),
(833, 141, 113, 0, 1469439285, 0),
(834, 7, 113, 0, 1469439285, 0),
(835, 8, 113, 0, 1469439285, 0),
(836, 9, 113, 0, 1469439285, 0),
(837, 10, 113, 0, 1469439285, 0),
(838, 11, 113, 0, 1469439285, 0),
(839, 12, 113, 0, 1469439285, 0),
(840, 13, 113, 0, 1469439285, 0),
(841, 14, 113, 0, 1469439285, 0),
(842, 15, 113, 0, 1469439285, 0),
(843, 16, 113, 0, 1469439285, 0),
(844, 17, 113, 0, 1469439285, 0),
(845, 18, 113, 0, 1469439285, 0),
(846, 19, 113, 0, 1469439285, 0),
(847, 20, 113, 0, 1469439285, 0),
(848, 21, 113, 0, 1469439285, 0),
(849, 22, 113, 0, 1469439285, 0),
(850, 23, 113, 0, 1469439285, 0),
(851, 24, 113, 0, 1469439285, 0),
(852, 25, 113, 0, 1469439285, 0),
(853, 26, 113, 0, 1469439285, 0),
(854, 27, 113, 0, 1469439285, 0),
(855, 28, 113, 0, 1469439285, 0),
(856, 29, 113, 0, 1469439285, 0),
(857, 30, 113, 0, 1469439285, 0),
(858, 31, 113, 0, 1469439285, 0),
(859, 32, 113, 0, 1469439285, 0),
(860, 33, 113, 0, 1469439285, 0),
(861, 34, 113, 0, 1469439285, 0),
(862, 35, 113, 0, 1469439285, 0),
(863, 36, 113, 0, 1469439285, 0),
(864, 37, 113, 0, 1469439285, 0),
(865, 38, 113, 0, 1469439285, 0),
(866, 39, 113, 0, 1469439285, 0),
(867, 44, 113, 0, 1469439285, 0),
(868, 45, 113, 0, 1469439285, 0),
(869, 46, 113, 0, 1469439285, 0),
(870, 47, 113, 0, 1469439285, 0),
(871, 48, 113, 0, 1469439285, 0),
(872, 49, 113, 0, 1469439285, 0),
(873, 50, 113, 0, 1469439285, 0),
(874, 51, 113, 0, 1469439285, 0),
(875, 52, 113, 0, 1469439285, 0),
(876, 53, 113, 0, 1469439285, 0),
(877, 54, 113, 0, 1469439285, 0),
(878, 55, 113, 0, 1469439285, 0),
(879, 56, 113, 0, 1469439285, 0),
(880, 57, 113, 0, 1469439285, 0),
(881, 58, 113, 0, 1469439285, 0),
(882, 59, 113, 0, 1469439285, 0),
(883, 60, 113, 0, 1469439285, 0),
(884, 61, 113, 0, 1469439285, 0),
(885, 62, 113, 0, 1469439285, 0),
(886, 63, 113, 0, 1469439285, 0),
(887, 64, 113, 0, 1469439285, 0),
(888, 65, 113, 0, 1469439285, 0),
(889, 66, 113, 0, 1469439285, 0),
(890, 67, 113, 0, 1469439285, 0),
(891, 68, 113, 0, 1469439285, 0),
(892, 69, 113, 0, 1469439285, 0),
(893, 70, 113, 0, 1469439285, 0),
(894, 71, 113, 0, 1469439285, 0),
(895, 72, 113, 0, 1469439285, 0),
(896, 77, 113, 0, 1469439285, 0),
(897, 78, 113, 0, 1469439285, 0),
(898, 79, 113, 0, 1469439285, 0),
(899, 80, 113, 0, 1469439285, 0),
(900, 81, 113, 0, 1469439285, 0),
(901, 82, 113, 0, 1469439285, 0),
(902, 83, 113, 0, 1469439285, 0),
(903, 84, 113, 0, 1469439285, 0),
(904, 85, 113, 0, 1469439285, 0),
(905, 86, 113, 0, 1469439285, 0),
(906, 87, 113, 0, 1469439285, 0),
(907, 88, 113, 0, 1469439285, 0),
(908, 89, 113, 0, 1469439285, 0),
(909, 90, 113, 0, 1469439285, 0),
(910, 91, 113, 0, 1469439285, 0),
(911, 92, 113, 0, 1469439285, 0),
(912, 93, 113, 0, 1469439285, 0),
(913, 94, 113, 0, 1469439285, 0),
(914, 95, 113, 0, 1469439285, 0),
(915, 96, 113, 0, 1469439285, 0),
(916, 97, 113, 0, 1469439285, 0),
(917, 100, 113, 0, 1469439285, 0),
(918, 101, 113, 0, 1469439285, 0),
(919, 102, 113, 0, 1469439285, 0),
(920, 103, 113, 0, 1469439285, 0),
(921, 104, 113, 0, 1469439285, 0),
(922, 105, 113, 0, 1469439285, 0),
(923, 106, 113, 0, 1469439285, 0),
(924, 107, 113, 0, 1469439285, 0),
(925, 108, 113, 0, 1469439285, 0),
(926, 109, 113, 0, 1469439285, 0),
(927, 110, 113, 0, 1469439285, 0),
(928, 111, 113, 0, 1469439285, 0),
(929, 112, 113, 0, 1469439285, 0),
(930, 113, 113, 0, 1469439285, 0),
(931, 116, 113, 0, 1469439285, 0),
(932, 117, 113, 0, 1469439285, 0),
(933, 118, 113, 0, 1469439285, 0),
(934, 119, 113, 0, 1469439285, 0),
(935, 120, 113, 0, 1469439285, 0),
(936, 121, 113, 0, 1469439285, 0),
(937, 122, 113, 0, 1469439285, 0),
(938, 123, 113, 0, 1469439285, 0),
(939, 124, 113, 0, 1469439285, 0),
(940, 125, 113, 0, 1469439285, 0),
(941, 126, 113, 0, 1469439285, 0),
(942, 127, 113, 0, 1469439285, 0),
(943, 128, 113, 0, 1469439285, 0),
(944, 129, 113, 0, 1469439285, 0),
(945, 132, 113, 0, 1469439285, 0),
(946, 133, 113, 0, 1469439285, 0),
(947, 134, 113, 0, 1469439285, 0),
(948, 135, 113, 0, 1469439285, 0),
(949, 136, 113, 0, 1469439285, 0),
(950, 137, 113, 0, 1469439285, 0),
(951, 138, 113, 0, 1469439285, 0),
(952, 142, 113, 0, 1469439285, 0),
(953, 143, 113, 0, 1469439285, 0),
(954, 144, 113, 0, 1469439285, 0),
(955, 145, 113, 0, 1469439285, 0),
(956, 146, 113, 0, 1469439285, 0),
(957, 147, 113, 0, 1469439285, 0),
(958, 148, 113, 0, 1469439285, 0),
(959, 149, 113, 0, 1469439285, 0),
(960, 150, 113, 0, 1469439285, 0),
(961, 151, 113, 0, 1469439285, 0),
(962, 152, 113, 0, 1469439285, 0),
(963, 153, 113, 0, 1469439285, 0),
(964, 154, 113, 0, 1469439285, 0),
(965, 155, 113, 0, 1469439285, 0),
(966, 156, 113, 0, 1469439285, 0),
(967, 157, 113, 0, 1469439285, 0),
(968, 158, 113, 0, 1469439285, 0),
(969, 159, 113, 0, 1469439285, 0),
(970, 160, 113, 0, 1469439285, 0),
(971, 161, 113, 0, 1469439285, 0),
(972, 162, 113, 0, 1469439285, 0),
(973, 1, 114, 0, 1469439285, 0),
(974, 2, 114, 0, 1469439285, 0),
(975, 3, 114, 0, 1469439285, 0),
(976, 4, 114, 0, 1469439285, 0),
(977, 5, 114, 0, 1469439285, 0),
(978, 6, 114, 0, 1469439285, 0),
(979, 40, 114, 0, 1469439285, 0),
(980, 41, 114, 0, 1469439285, 0),
(981, 42, 114, 0, 1469439285, 0),
(982, 43, 114, 0, 1469439285, 0),
(983, 73, 114, 0, 1469439285, 0),
(984, 74, 114, 0, 1469439285, 0),
(985, 75, 114, 0, 1469439285, 0),
(986, 76, 114, 0, 1469439285, 0),
(987, 98, 114, 0, 1469439285, 0),
(988, 99, 114, 0, 1469439285, 0),
(989, 114, 114, 0, 1469439285, 0),
(990, 115, 114, 0, 1469439285, 0),
(991, 130, 114, 0, 1469439285, 0),
(992, 131, 114, 0, 1469439285, 0),
(993, 139, 114, 0, 1469439285, 0),
(994, 140, 114, 0, 1469439285, 0),
(995, 141, 114, 0, 1469439285, 0),
(996, 7, 114, 0, 1469439285, 0),
(997, 8, 114, 0, 1469439285, 0),
(998, 9, 114, 0, 1469439285, 0),
(999, 10, 114, 0, 1469439285, 0),
(1000, 11, 114, 0, 1469439285, 0),
(1001, 12, 114, 0, 1469439285, 0),
(1002, 13, 114, 0, 1469439285, 0),
(1003, 14, 114, 0, 1469439285, 0),
(1004, 15, 114, 0, 1469439285, 0),
(1005, 16, 114, 0, 1469439285, 0),
(1006, 17, 114, 0, 1469439285, 0),
(1007, 18, 114, 0, 1469439285, 0),
(1008, 19, 114, 0, 1469439285, 0),
(1009, 20, 114, 0, 1469439285, 0),
(1010, 21, 114, 0, 1469439285, 0),
(1011, 22, 114, 0, 1469439285, 0),
(1012, 23, 114, 0, 1469439285, 0),
(1013, 24, 114, 0, 1469439285, 0),
(1014, 25, 114, 0, 1469439285, 0),
(1015, 26, 114, 0, 1469439285, 0),
(1016, 27, 114, 0, 1469439285, 0),
(1017, 28, 114, 0, 1469439285, 0),
(1018, 29, 114, 0, 1469439285, 0),
(1019, 30, 114, 0, 1469439285, 0),
(1020, 31, 114, 0, 1469439285, 0),
(1021, 32, 114, 0, 1469439285, 0),
(1022, 33, 114, 0, 1469439285, 0),
(1023, 34, 114, 0, 1469439285, 0),
(1024, 35, 114, 0, 1469439285, 0),
(1025, 36, 114, 0, 1469439285, 0),
(1026, 37, 114, 0, 1469439285, 0),
(1027, 38, 114, 0, 1469439285, 0),
(1028, 39, 114, 0, 1469439285, 0),
(1029, 44, 114, 0, 1469439285, 0),
(1030, 45, 114, 0, 1469439285, 0),
(1031, 46, 114, 0, 1469439285, 0),
(1032, 47, 114, 0, 1469439285, 0),
(1033, 48, 114, 0, 1469439285, 0),
(1034, 49, 114, 0, 1469439285, 0),
(1035, 50, 114, 0, 1469439285, 0),
(1036, 51, 114, 0, 1469439285, 0),
(1037, 52, 114, 0, 1469439285, 0),
(1038, 53, 114, 0, 1469439285, 0),
(1039, 54, 114, 0, 1469439285, 0),
(1040, 55, 114, 0, 1469439285, 0),
(1041, 56, 114, 0, 1469439285, 0),
(1042, 57, 114, 0, 1469439285, 0),
(1043, 58, 114, 0, 1469439285, 0),
(1044, 59, 114, 0, 1469439285, 0),
(1045, 60, 114, 0, 1469439285, 0),
(1046, 61, 114, 0, 1469439285, 0),
(1047, 62, 114, 0, 1469439285, 0),
(1048, 63, 114, 0, 1469439285, 0),
(1049, 64, 114, 0, 1469439285, 0),
(1050, 65, 114, 0, 1469439285, 0),
(1051, 66, 114, 0, 1469439285, 0),
(1052, 67, 114, 0, 1469439285, 0),
(1053, 68, 114, 0, 1469439285, 0),
(1054, 69, 114, 0, 1469439285, 0),
(1055, 70, 114, 0, 1469439285, 0),
(1056, 71, 114, 0, 1469439285, 0),
(1057, 72, 114, 0, 1469439285, 0),
(1058, 77, 114, 0, 1469439285, 0),
(1059, 78, 114, 0, 1469439285, 0),
(1060, 79, 114, 0, 1469439285, 0),
(1061, 80, 114, 0, 1469439285, 0),
(1062, 81, 114, 0, 1469439285, 0),
(1063, 82, 114, 0, 1469439285, 0),
(1064, 83, 114, 0, 1469439285, 0),
(1065, 84, 114, 0, 1469439285, 0),
(1066, 85, 114, 0, 1469439285, 0),
(1067, 86, 114, 0, 1469439285, 0),
(1068, 87, 114, 0, 1469439285, 0),
(1069, 88, 114, 0, 1469439285, 0),
(1070, 89, 114, 0, 1469439285, 0),
(1071, 90, 114, 0, 1469439285, 0),
(1072, 91, 114, 0, 1469439285, 0),
(1073, 92, 114, 0, 1469439285, 0),
(1074, 93, 114, 0, 1469439285, 0),
(1075, 94, 114, 0, 1469439285, 0),
(1076, 95, 114, 0, 1469439285, 0),
(1077, 96, 114, 0, 1469439285, 0),
(1078, 97, 114, 0, 1469439285, 0),
(1079, 100, 114, 0, 1469439285, 0),
(1080, 101, 114, 0, 1469439285, 0),
(1081, 102, 114, 0, 1469439285, 0),
(1082, 103, 114, 0, 1469439285, 0),
(1083, 104, 114, 0, 1469439285, 0),
(1084, 105, 114, 0, 1469439285, 0),
(1085, 106, 114, 0, 1469439285, 0),
(1086, 107, 114, 0, 1469439285, 0),
(1087, 108, 114, 0, 1469439285, 0),
(1088, 109, 114, 0, 1469439285, 0),
(1089, 110, 114, 0, 1469439285, 0),
(1090, 111, 114, 0, 1469439285, 0),
(1091, 112, 114, 0, 1469439285, 0),
(1092, 113, 114, 0, 1469439285, 0),
(1093, 116, 114, 0, 1469439285, 0),
(1094, 117, 114, 0, 1469439285, 0),
(1095, 118, 114, 0, 1469439285, 0),
(1096, 119, 114, 0, 1469439285, 0),
(1097, 120, 114, 0, 1469439285, 0),
(1098, 121, 114, 0, 1469439285, 0),
(1099, 122, 114, 0, 1469439285, 0),
(1100, 123, 114, 0, 1469439285, 0),
(1101, 124, 114, 0, 1469439285, 0),
(1102, 125, 114, 0, 1469439285, 0),
(1103, 126, 114, 0, 1469439285, 0),
(1104, 127, 114, 0, 1469439285, 0),
(1105, 128, 114, 0, 1469439285, 0),
(1106, 129, 114, 0, 1469439285, 0),
(1107, 132, 114, 0, 1469439285, 0),
(1108, 133, 114, 0, 1469439285, 0),
(1109, 134, 114, 0, 1469439285, 0),
(1110, 135, 114, 0, 1469439285, 0),
(1111, 136, 114, 0, 1469439285, 0),
(1112, 137, 114, 0, 1469439285, 0),
(1113, 138, 114, 0, 1469439285, 0),
(1114, 142, 114, 0, 1469439285, 0),
(1115, 143, 114, 0, 1469439285, 0),
(1116, 144, 114, 0, 1469439285, 0),
(1117, 145, 114, 0, 1469439285, 0),
(1118, 146, 114, 0, 1469439285, 0),
(1119, 147, 114, 0, 1469439285, 0),
(1120, 148, 114, 0, 1469439285, 0),
(1121, 149, 114, 0, 1469439285, 0),
(1122, 150, 114, 0, 1469439285, 0),
(1123, 151, 114, 0, 1469439285, 0),
(1124, 152, 114, 0, 1469439285, 0),
(1125, 153, 114, 0, 1469439285, 0),
(1126, 154, 114, 0, 1469439285, 0),
(1127, 155, 114, 0, 1469439285, 0),
(1128, 156, 114, 0, 1469439285, 0),
(1129, 157, 114, 0, 1469439285, 0),
(1130, 158, 114, 0, 1469439285, 0),
(1131, 159, 114, 0, 1469439285, 0),
(1132, 160, 114, 0, 1469439285, 0),
(1133, 161, 114, 0, 1469439285, 0),
(1134, 162, 114, 0, 1469439285, 0),
(1135, 1, 116, 0, 1469439285, 0),
(1136, 2, 116, 0, 1469439285, 0),
(1137, 3, 116, 0, 1469439285, 0),
(1138, 4, 116, 0, 1469439285, 0),
(1139, 5, 116, 0, 1469439285, 0),
(1140, 6, 116, 0, 1469439285, 0),
(1141, 40, 116, 0, 1469439285, 0),
(1142, 41, 116, 0, 1469439285, 0),
(1143, 42, 116, 0, 1469439285, 0),
(1144, 43, 116, 0, 1469439285, 0),
(1145, 73, 116, 0, 1469439285, 0),
(1146, 74, 116, 0, 1469439285, 0),
(1147, 75, 116, 0, 1469439285, 0),
(1148, 76, 116, 0, 1469439285, 0),
(1149, 98, 116, 0, 1469439285, 0),
(1150, 99, 116, 0, 1469439285, 0),
(1151, 114, 116, 0, 1469439285, 0),
(1152, 115, 116, 0, 1469439285, 0),
(1153, 130, 116, 0, 1469439285, 0),
(1154, 131, 116, 0, 1469439285, 0),
(1155, 139, 116, 0, 1469439285, 0),
(1156, 140, 116, 0, 1469439285, 0),
(1157, 141, 116, 0, 1469439285, 0),
(1158, 7, 116, 0, 1469439285, 0),
(1159, 8, 116, 0, 1469439285, 0),
(1160, 9, 116, 0, 1469439285, 0),
(1161, 10, 116, 0, 1469439285, 0),
(1162, 11, 116, 0, 1469439285, 0),
(1163, 12, 116, 0, 1469439285, 0),
(1164, 13, 116, 0, 1469439285, 0),
(1165, 14, 116, 0, 1469439285, 0),
(1166, 15, 116, 0, 1469439285, 0),
(1167, 16, 116, 0, 1469439285, 0),
(1168, 17, 116, 0, 1469439285, 0),
(1169, 18, 116, 0, 1469439285, 0),
(1170, 19, 116, 0, 1469439285, 0),
(1171, 20, 116, 0, 1469439285, 0),
(1172, 21, 116, 0, 1469439285, 0),
(1173, 22, 116, 0, 1469439285, 0),
(1174, 23, 116, 0, 1469439285, 0),
(1175, 24, 116, 0, 1469439285, 0),
(1176, 25, 116, 0, 1469439285, 0),
(1177, 26, 116, 0, 1469439285, 0),
(1178, 27, 116, 0, 1469439285, 0),
(1179, 28, 116, 0, 1469439285, 0),
(1180, 29, 116, 0, 1469439285, 0),
(1181, 30, 116, 0, 1469439285, 0),
(1182, 31, 116, 0, 1469439285, 0),
(1183, 32, 116, 0, 1469439285, 0),
(1184, 33, 116, 0, 1469439285, 0),
(1185, 34, 116, 0, 1469439285, 0),
(1186, 35, 116, 0, 1469439285, 0),
(1187, 36, 116, 0, 1469439285, 0),
(1188, 37, 116, 0, 1469439285, 0),
(1189, 38, 116, 0, 1469439285, 0),
(1190, 39, 116, 0, 1469439285, 0),
(1191, 44, 116, 0, 1469439285, 0),
(1192, 45, 116, 0, 1469439285, 0),
(1193, 46, 116, 0, 1469439285, 0),
(1194, 47, 116, 0, 1469439285, 0),
(1195, 48, 116, 0, 1469439285, 0),
(1196, 49, 116, 0, 1469439285, 0),
(1197, 50, 116, 0, 1469439285, 0),
(1198, 51, 116, 0, 1469439285, 0),
(1199, 52, 116, 0, 1469439285, 0),
(1200, 53, 116, 0, 1469439285, 0),
(1201, 54, 116, 0, 1469439285, 0),
(1202, 55, 116, 0, 1469439285, 0),
(1203, 56, 116, 0, 1469439285, 0),
(1204, 57, 116, 0, 1469439285, 0),
(1205, 58, 116, 0, 1469439285, 0),
(1206, 59, 116, 0, 1469439285, 0),
(1207, 60, 116, 0, 1469439285, 0),
(1208, 61, 116, 0, 1469439285, 0),
(1209, 62, 116, 0, 1469439285, 0),
(1210, 63, 116, 0, 1469439285, 0),
(1211, 64, 116, 0, 1469439285, 0),
(1212, 65, 116, 0, 1469439285, 0),
(1213, 66, 116, 0, 1469439285, 0),
(1214, 67, 116, 0, 1469439285, 0),
(1215, 68, 116, 0, 1469439285, 0),
(1216, 69, 116, 0, 1469439285, 0),
(1217, 70, 116, 0, 1469439285, 0),
(1218, 71, 116, 0, 1469439285, 0),
(1219, 72, 116, 0, 1469439285, 0),
(1220, 77, 116, 0, 1469439285, 0),
(1221, 78, 116, 0, 1469439285, 0),
(1222, 79, 116, 0, 1469439285, 0),
(1223, 80, 116, 0, 1469439285, 0),
(1224, 81, 116, 0, 1469439285, 0),
(1225, 82, 116, 0, 1469439285, 0),
(1226, 83, 116, 0, 1469439285, 0),
(1227, 84, 116, 0, 1469439285, 0),
(1228, 85, 116, 0, 1469439285, 0),
(1229, 86, 116, 0, 1469439285, 0),
(1230, 87, 116, 0, 1469439285, 0),
(1231, 88, 116, 0, 1469439285, 0),
(1232, 89, 116, 0, 1469439285, 0),
(1233, 90, 116, 0, 1469439285, 0),
(1234, 91, 116, 0, 1469439285, 0),
(1235, 92, 116, 0, 1469439285, 0),
(1236, 93, 116, 0, 1469439285, 0),
(1237, 94, 116, 0, 1469439285, 0),
(1238, 95, 116, 0, 1469439285, 0),
(1239, 96, 116, 0, 1469439285, 0),
(1240, 97, 116, 0, 1469439285, 0),
(1241, 100, 116, 0, 1469439285, 0),
(1242, 101, 116, 0, 1469439285, 0),
(1243, 102, 116, 0, 1469439285, 0),
(1244, 103, 116, 0, 1469439285, 0),
(1245, 104, 116, 0, 1469439285, 0),
(1246, 105, 116, 0, 1469439285, 0),
(1247, 106, 116, 0, 1469439285, 0),
(1248, 107, 116, 0, 1469439285, 0),
(1249, 108, 116, 0, 1469439285, 0),
(1250, 109, 116, 0, 1469439285, 0),
(1251, 110, 116, 0, 1469439285, 0),
(1252, 111, 116, 0, 1469439285, 0),
(1253, 112, 116, 0, 1469439285, 0),
(1254, 113, 116, 0, 1469439285, 0),
(1255, 116, 116, 0, 1469439285, 0),
(1256, 117, 116, 0, 1469439285, 0),
(1257, 118, 116, 0, 1469439285, 0),
(1258, 119, 116, 0, 1469439285, 0),
(1259, 120, 116, 0, 1469439285, 0),
(1260, 121, 116, 0, 1469439285, 0),
(1261, 122, 116, 0, 1469439285, 0),
(1262, 123, 116, 0, 1469439285, 0),
(1263, 124, 116, 0, 1469439285, 0),
(1264, 125, 116, 0, 1469439285, 0),
(1265, 126, 116, 0, 1469439285, 0),
(1266, 127, 116, 0, 1469439285, 0),
(1267, 128, 116, 0, 1469439285, 0),
(1268, 129, 116, 0, 1469439285, 0),
(1269, 132, 116, 0, 1469439285, 0),
(1270, 133, 116, 0, 1469439285, 0),
(1271, 134, 116, 0, 1469439285, 0),
(1272, 135, 116, 0, 1469439285, 0),
(1273, 136, 116, 0, 1469439285, 0),
(1274, 137, 116, 0, 1469439285, 0),
(1275, 138, 116, 0, 1469439285, 0),
(1276, 142, 116, 0, 1469439285, 0),
(1277, 143, 116, 0, 1469439285, 0),
(1278, 144, 116, 0, 1469439285, 0),
(1279, 145, 116, 0, 1469439285, 0),
(1280, 146, 116, 0, 1469439285, 0),
(1281, 147, 116, 0, 1469439285, 0),
(1282, 148, 116, 0, 1469439285, 0),
(1283, 149, 116, 0, 1469439285, 0),
(1284, 150, 116, 0, 1469439285, 0),
(1285, 151, 116, 0, 1469439285, 0),
(1286, 152, 116, 0, 1469439285, 0),
(1287, 153, 116, 0, 1469439285, 0),
(1288, 154, 116, 0, 1469439285, 0),
(1289, 155, 116, 0, 1469439285, 0),
(1290, 156, 116, 0, 1469439285, 0),
(1291, 157, 116, 0, 1469439285, 0),
(1292, 158, 116, 0, 1469439285, 0),
(1293, 159, 116, 0, 1469439285, 0),
(1294, 160, 116, 0, 1469439285, 0),
(1295, 161, 116, 0, 1469439285, 0),
(1296, 162, 116, 0, 1469439285, 0),
(1297, 1, 100, 0, 1469439285, 0),
(1298, 2, 100, 0, 1469439285, 0),
(1299, 3, 100, 0, 1469439285, 0),
(1300, 4, 100, 0, 1469439285, 0),
(1301, 5, 100, 0, 1469439285, 0),
(1302, 6, 100, 0, 1469439285, 0),
(1303, 40, 100, 0, 1469439285, 0),
(1304, 41, 100, 0, 1469439285, 0),
(1305, 42, 100, 0, 1469439285, 0),
(1306, 43, 100, 0, 1469439285, 0),
(1307, 73, 100, 0, 1469439285, 0),
(1308, 74, 100, 0, 1469439285, 0),
(1309, 75, 100, 0, 1469439285, 0),
(1310, 76, 100, 0, 1469439285, 0),
(1311, 98, 100, 0, 1469439285, 0),
(1312, 99, 100, 0, 1469439285, 0),
(1313, 114, 100, 0, 1469439285, 0),
(1314, 115, 100, 0, 1469439285, 0),
(1315, 130, 100, 0, 1469439285, 0),
(1316, 131, 100, 0, 1469439285, 0),
(1317, 139, 100, 0, 1469439285, 0),
(1318, 140, 100, 0, 1469439285, 0),
(1319, 141, 100, 0, 1469439285, 0),
(1320, 7, 100, 0, 1469439285, 0),
(1321, 8, 100, 0, 1469439285, 0),
(1322, 9, 100, 0, 1469439285, 0),
(1323, 10, 100, 0, 1469439285, 0),
(1324, 11, 100, 0, 1469439285, 0),
(1325, 12, 100, 0, 1469439285, 0),
(1326, 13, 100, 0, 1469439285, 0),
(1327, 14, 100, 0, 1469439285, 0),
(1328, 15, 100, 0, 1469439285, 0),
(1329, 16, 100, 0, 1469439285, 0),
(1330, 17, 100, 0, 1469439285, 0),
(1331, 18, 100, 0, 1469439285, 0),
(1332, 19, 100, 0, 1469439285, 0),
(1333, 20, 100, 0, 1469439285, 0),
(1334, 21, 100, 0, 1469439285, 0),
(1335, 22, 100, 0, 1469439285, 0),
(1336, 23, 100, 0, 1469439285, 0),
(1337, 24, 100, 0, 1469439285, 0),
(1338, 25, 100, 0, 1469439285, 0),
(1339, 26, 100, 0, 1469439285, 0),
(1340, 27, 100, 0, 1469439285, 0),
(1341, 28, 100, 0, 1469439285, 0),
(1342, 29, 100, 0, 1469439285, 0),
(1343, 30, 100, 0, 1469439285, 0),
(1344, 31, 100, 0, 1469439285, 0),
(1345, 32, 100, 0, 1469439285, 0),
(1346, 33, 100, 0, 1469439285, 0),
(1347, 34, 100, 0, 1469439285, 0),
(1348, 35, 100, 0, 1469439285, 0),
(1349, 36, 100, 0, 1469439285, 0),
(1350, 37, 100, 0, 1469439285, 0),
(1351, 38, 100, 0, 1469439285, 0),
(1352, 39, 100, 0, 1469439285, 0),
(1353, 44, 100, 0, 1469439285, 0),
(1354, 45, 100, 0, 1469439285, 0),
(1355, 46, 100, 0, 1469439285, 0),
(1356, 47, 100, 0, 1469439285, 0),
(1357, 48, 100, 0, 1469439285, 0),
(1358, 49, 100, 0, 1469439285, 0),
(1359, 50, 100, 0, 1469439285, 0),
(1360, 51, 100, 0, 1469439285, 0),
(1361, 52, 100, 0, 1469439285, 0),
(1362, 53, 100, 0, 1469439285, 0),
(1363, 54, 100, 0, 1469439285, 0),
(1364, 55, 100, 0, 1469439285, 0),
(1365, 56, 100, 0, 1469439285, 0),
(1366, 57, 100, 0, 1469439285, 0),
(1367, 58, 100, 0, 1469439285, 0),
(1368, 59, 100, 0, 1469439285, 0),
(1369, 60, 100, 0, 1469439285, 0),
(1370, 61, 100, 0, 1469439285, 0),
(1371, 62, 100, 0, 1469439285, 0),
(1372, 63, 100, 0, 1469439285, 0),
(1373, 64, 100, 0, 1469439285, 0),
(1374, 65, 100, 0, 1469439285, 0),
(1375, 66, 100, 0, 1469439285, 0),
(1376, 67, 100, 0, 1469439285, 0),
(1377, 68, 100, 0, 1469439285, 0),
(1378, 69, 100, 0, 1469439285, 0),
(1379, 70, 100, 0, 1469439285, 0),
(1380, 71, 100, 0, 1469439285, 0),
(1381, 72, 100, 0, 1469439285, 0),
(1382, 77, 100, 0, 1469439285, 0),
(1383, 78, 100, 0, 1469439285, 0),
(1384, 79, 100, 0, 1469439285, 0),
(1385, 80, 100, 0, 1469439285, 0),
(1386, 81, 100, 0, 1469439285, 0),
(1387, 82, 100, 0, 1469439285, 0),
(1388, 83, 100, 0, 1469439285, 0),
(1389, 84, 100, 0, 1469439285, 0),
(1390, 85, 100, 0, 1469439285, 0),
(1391, 86, 100, 0, 1469439285, 0),
(1392, 87, 100, 0, 1469439285, 0),
(1393, 88, 100, 0, 1469439285, 0),
(1394, 89, 100, 0, 1469439285, 0),
(1395, 90, 100, 0, 1469439285, 0),
(1396, 91, 100, 0, 1469439285, 0),
(1397, 92, 100, 0, 1469439285, 0),
(1398, 93, 100, 0, 1469439285, 0),
(1399, 94, 100, 0, 1469439285, 0),
(1400, 95, 100, 0, 1469439285, 0),
(1401, 96, 100, 0, 1469439285, 0),
(1402, 97, 100, 0, 1469439285, 0),
(1403, 100, 100, 0, 1469439285, 0),
(1404, 101, 100, 0, 1469439285, 0),
(1405, 102, 100, 0, 1469439285, 0),
(1406, 103, 100, 0, 1469439285, 0),
(1407, 104, 100, 0, 1469439285, 0),
(1408, 105, 100, 0, 1469439285, 0),
(1409, 106, 100, 0, 1469439285, 0),
(1410, 107, 100, 0, 1469439285, 0),
(1411, 108, 100, 0, 1469439285, 0),
(1412, 109, 100, 0, 1469439285, 0),
(1413, 110, 100, 0, 1469439285, 0),
(1414, 111, 100, 0, 1469439285, 0),
(1415, 112, 100, 0, 1469439285, 0),
(1416, 113, 100, 0, 1469439285, 0),
(1417, 116, 100, 0, 1469439285, 0),
(1418, 117, 100, 0, 1469439285, 0),
(1419, 118, 100, 0, 1469439285, 0),
(1420, 119, 100, 0, 1469439285, 0),
(1421, 120, 100, 0, 1469439285, 0),
(1422, 121, 100, 0, 1469439285, 0),
(1423, 122, 100, 0, 1469439285, 0),
(1424, 123, 100, 0, 1469439285, 0),
(1425, 124, 100, 0, 1469439285, 0),
(1426, 125, 100, 0, 1469439285, 0),
(1427, 126, 100, 0, 1469439285, 0),
(1428, 127, 100, 0, 1469439285, 0),
(1429, 128, 100, 0, 1469439285, 0),
(1430, 129, 100, 0, 1469439285, 0),
(1431, 132, 100, 0, 1469439285, 0),
(1432, 133, 100, 0, 1469439285, 0),
(1433, 134, 100, 0, 1469439285, 0),
(1434, 135, 100, 0, 1469439285, 0),
(1435, 136, 100, 0, 1469439285, 0),
(1436, 137, 100, 0, 1469439285, 0),
(1437, 138, 100, 0, 1469439285, 0),
(1438, 142, 100, 0, 1469439285, 0),
(1439, 143, 100, 0, 1469439285, 0),
(1440, 144, 100, 0, 1469439285, 0),
(1441, 145, 100, 0, 1469439285, 0),
(1442, 146, 100, 0, 1469439285, 0),
(1443, 147, 100, 0, 1469439285, 0),
(1444, 148, 100, 0, 1469439285, 0),
(1445, 149, 100, 0, 1469439285, 0),
(1446, 150, 100, 0, 1469439285, 0),
(1447, 151, 100, 0, 1469439285, 0),
(1448, 152, 100, 0, 1469439285, 0),
(1449, 153, 100, 0, 1469439285, 0),
(1450, 154, 100, 0, 1469439285, 0),
(1451, 155, 100, 0, 1469439285, 0),
(1452, 156, 100, 0, 1469439285, 0),
(1453, 157, 100, 0, 1469439285, 0),
(1454, 158, 100, 0, 1469439285, 0),
(1455, 159, 100, 0, 1469439285, 0),
(1456, 160, 100, 0, 1469439285, 0),
(1457, 161, 100, 0, 1469439285, 0),
(1458, 162, 100, 0, 1469439285, 0);

-- --------------------------------------------------------

--
-- Table structure for table `image_gallery`
--

CREATE TABLE IF NOT EXISTS `image_gallery` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `field_id` int(11) unsigned DEFAULT NULL,
  `table` varchar(128) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `file_name` text,
  `priority` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `added` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `conference_id` (`field_id`,`url`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `image_gallery`
--

INSERT INTO `image_gallery` (`id`, `field_id`, `table`, `url`, `title`, `file_name`, `priority`, `count`, `status`, `added`, `modified`) VALUES
(85, 1, NULL, NULL, NULL, '580d8-CA024.png', NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `url` varchar(82) NOT NULL,
  `prefix` varchar(10) DEFAULT NULL,
  `file_name` varchar(128) NOT NULL,
  `default` tinyint(1) NOT NULL,
  `is_system` int(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `added` int(11) unsigned DEFAULT NULL,
  `modified` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`,`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `url`, `prefix`, `file_name`, `default`, `is_system`, `status`, `added`, `modified`) VALUES
(1, 'Indonesia', 'indonesia', 'id', 'indonesia.jpg', 0, 0, 1, 1325742926, 1434966746),
(2, 'English', 'england', 'en', 'english.jpg', 1, 1, 1, 1325742950, 1434966299),
(3, 'Arab', 'arab', 'ar', 'arab.jpg', 0, 0, 1, 1325748808, 1434966683),
(4, 'French', 'french', 'fr', '', 0, 0, 1, 1429351625, 1434966692);

-- --------------------------------------------------------

--
-- Table structure for table `model_lists`
--

CREATE TABLE IF NOT EXISTS `model_lists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `module_lists`
--

CREATE TABLE IF NOT EXISTS `module_lists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `module_link` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `module_lists`
--

INSERT INTO `module_lists` (`id`, `parent_id`, `module_name`, `module_link`, `order`) VALUES
(1, 0, 'admin', '#', 0),
(2, 1, 'Dashboard Panel', 'dashboard/index', 0),
(3, 1, 'Users', 'user/index', 1),
(4, 1, 'User Groups', 'usergroup/index', 2),
(5, 1, 'Languages', 'language/index', 3),
(6, 1, 'Settings', 'setting/index', 4),
(7, 1, 'Server Logs', 'serverlog/index', 5),
(8, 0, 'career', '#', 1),
(9, 8, 'Careers', 'career/index', 0),
(10, 8, 'Divisions', 'division/index', 1),
(11, 8, 'Applicants', 'applicant/index', 2),
(12, 8, 'Employees', 'employee/index', 3),
(13, 0, 'color', '#', 2),
(14, 13, 'Color Data', 'color/index', 0),
(15, 13, 'Color Content', 'colorcontent/index', 1),
(16, 13, 'Color Personal', 'colorpersonal/index', 2),
(17, 13, 'Color Scanner', 'colorscanner/index', 3),
(18, 0, 'page', '#', 3),
(19, 18, 'Pages', 'page/index', 0),
(20, 18, 'Page Menus', 'pagemenu/index', 1),
(21, 0, 'participant', '#', 4),
(22, 21, 'Participant', 'participant/index', 0),
(23, 21, 'Attachment', 'attachment/index', 1),
(24, 0, 'qrcode', '#', 5),
(25, 24, 'QR Codes', 'qrcode/index', 0),
(26, 24, 'QR Code Scanner', 'qrcodescanner/index', 1),
(27, 0, 'questionnaire', '#', 6),
(28, 27, 'Questionnaires', 'questionnaire/index', 0),
(29, 27, 'Questions', 'question/index', 1),
(30, 27, 'Question Rule', 'questionrule/index', 2);

-- --------------------------------------------------------

--
-- Table structure for table `module_permissions`
--

CREATE TABLE IF NOT EXISTS `module_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `module_link` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=163 ;

--
-- Dumping data for table `module_permissions`
--

INSERT INTO `module_permissions` (`id`, `module_id`, `module_name`, `module_link`, `order`) VALUES
(1, 1, 'Dashboard Panel', 'dashboard/index', 0),
(2, 1, 'Users', 'user/index', 1),
(3, 1, 'User Groups', 'usergroup/index', 2),
(4, 1, 'Languages', 'language/index', 3),
(5, 1, 'Settings', 'setting/index', 4),
(6, 1, 'Server Logs', 'serverlog/index', 5),
(7, 1, 'Add New Dashboard', 'dashboard/add', 6),
(8, 1, 'View Dashboard', 'dashboard/view', 7),
(9, 1, 'Edit Dashboard', 'dashboard/edit', 8),
(10, 1, 'Delete Dashboard', 'dashboard/delete', 9),
(11, 1, 'Change Dashboard Status', 'dashboard/change', 10),
(12, 1, 'Add User', 'user/add', 11),
(13, 1, 'View User', 'user/view', 12),
(14, 1, 'Edit User', 'user/edit', 13),
(15, 1, 'Delete User', 'user/delete', 14),
(16, 1, 'Change User Status', 'user/change', 15),
(17, 1, 'Change User Image', 'user/image', 16),
(18, 1, 'Upload User Image', 'user/upload', 17),
(19, 1, 'Export User Data', 'user/export', 18),
(20, 1, 'Add User Group', 'usergroup/add', 19),
(21, 1, 'View User Group', 'usergroup/view', 20),
(22, 1, 'Edit User Group', 'usergroup/edit', 21),
(23, 1, 'Delete User Group', 'usergroup/delete', 22),
(24, 1, 'Change User Group Status', 'usergroup/change', 23),
(25, 1, 'Export User Group Data', 'usergroup/export', 24),
(26, 1, 'Add Language', 'language/add', 25),
(27, 1, 'View Language', 'language/view', 26),
(28, 1, 'Edit Language', 'language/edit', 27),
(29, 1, 'Delete Language', 'language/delete', 28),
(30, 1, 'Change Language Status', 'language/change', 29),
(31, 1, 'Add Setting', 'setting/add', 30),
(32, 1, 'View Setting', 'setting/view', 31),
(33, 1, 'Edit Setting', 'setting/edit', 32),
(34, 1, 'Delete Setting', 'setting/delete', 33),
(35, 1, 'Change Setting Status', 'setting/change', 34),
(36, 1, 'View Server Log', 'serverlog/view', 35),
(37, 1, 'Edit Server Log', 'serverlog/edit', 36),
(38, 1, 'Delete Server Log', 'serverlog/delete', 37),
(39, 1, 'Trash Server Log', 'serverlog/trash', 38),
(40, 8, 'Careers', 'career/index', 0),
(41, 8, 'Divisions', 'division/index', 1),
(42, 8, 'Applicants', 'applicant/index', 2),
(43, 8, 'Employees', 'employee/index', 3),
(44, 8, 'Add Career', 'career/index/add', 4),
(45, 8, 'View Career', 'career/index/view', 5),
(46, 8, 'Edit Career', 'career/index/edit', 6),
(47, 8, 'Delete Career', 'career/index/delete', 7),
(48, 8, 'Change Career Status', 'career/index/change', 8),
(49, 8, 'Export Career', 'career/index/export', 9),
(50, 8, 'Print Career', 'career/index/print', 10),
(51, 8, 'Add Division', 'division/index/add', 11),
(52, 8, 'View Division', 'division/index/view', 12),
(53, 8, 'Edit Division', 'division/index/edit', 13),
(54, 8, 'Delete Division', 'division/index/delete', 14),
(55, 8, 'Change Division Status', 'division/index/change', 15),
(56, 8, 'Export Division', 'division/index/export', 16),
(57, 8, 'Print Division', 'division/index/print', 17),
(58, 8, 'Add Applicant', 'applicant/index/add', 18),
(59, 8, 'View Applicant', 'applicant/index/view', 19),
(60, 8, 'Edit Applicant', 'applicant/index/edit', 20),
(61, 8, 'Delete Applicant', 'applicant/index/delete', 21),
(62, 8, 'Change Applicant', 'applicant/index/change', 22),
(63, 8, 'Export Applicant', 'applicant/index/export', 23),
(64, 8, 'Print Applicant', 'applicant/index/print', 24),
(65, 8, 'Add Employee', 'employee/index/add', 25),
(66, 8, 'View Employee', 'employee/index/view', 26),
(67, 8, 'Edit Employee', 'employee/index/edit', 27),
(68, 8, 'Delete Employee', 'employee/index/delete', 28),
(69, 8, 'Set to Employee', 'employee/set', 29),
(70, 8, 'Change Employee', 'employee/index/change', 30),
(71, 8, 'Export Employee', 'employee/index/export', 31),
(72, 8, 'Print Employee', 'employee/index/print', 32),
(73, 13, 'Color Data', 'color/index', 0),
(74, 13, 'Color Content', 'colorcontent/index', 1),
(75, 13, 'Color Personal', 'colorpersonal/index', 2),
(76, 13, 'Color Scanner', 'colorscanner/index', 3),
(77, 13, 'Add Color Recognizer', 'color/index/add', 4),
(78, 13, 'View Color Recognizer', 'color/index/view', 5),
(79, 13, 'Edit Color Recognizer', 'color/index/edit', 6),
(80, 13, 'Delete Color Recognizer', 'color/index/delete', 7),
(81, 13, 'Change Color Recognizer Status', 'color/index/change', 8),
(82, 13, 'Export Color Recognizer', 'color/index/export', 9),
(83, 13, 'Print Color Recognizer', 'color/index/print', 10),
(84, 13, 'Add Color Content', 'colorcontent/index/add', 11),
(85, 13, 'View Color Content', 'colorcontent/index/view', 12),
(86, 13, 'Edit Color Content', 'colorcontent/index/edit', 13),
(87, 13, 'Delete Color Content', 'colorcontent/index/delete', 14),
(88, 13, 'Change Color Content Status', 'colorcontent/index/change', 15),
(89, 13, 'Export Color Content', 'colorcontent/index/export', 16),
(90, 13, 'Print Color Content', 'colorcontent/index/print', 17),
(91, 13, 'Add Color Personal', 'colorpersonal/index/add', 18),
(92, 13, 'View Color Personal', 'colorpersonal/index/view', 19),
(93, 13, 'Edit Color Personal', 'colorpersonal/index/edit', 20),
(94, 13, 'Delete Color Personal', 'colorpersonal/index/delete', 21),
(95, 13, 'Change Color Personal Status', 'colorpersonal/index/change', 22),
(96, 13, 'Export Color Personal', 'colorpersonal/index/export', 23),
(97, 13, 'Print Color Personal', 'colorpersonal/index/print', 24),
(98, 18, 'Pages', 'page/index', 0),
(99, 18, 'Page Menus', 'pagemenu/index', 1),
(100, 18, 'Add Page', 'page/index/add', 2),
(101, 18, 'View Page', 'page/index/view', 3),
(102, 18, 'Edit Page', 'page/index/edit', 4),
(103, 18, 'Delete Page', 'page/index/delete', 5),
(104, 18, 'Change Page Status', 'page/index/change', 6),
(105, 18, 'Export Page', 'page/index/export', 7),
(106, 18, 'Print Page', 'page/index/print', 8),
(107, 18, 'Add Page Menu', 'pagemenu/index/add', 9),
(108, 18, 'View Page Menu', 'pagemenu/index/view', 10),
(109, 18, 'Edit Page Menu', 'pagemenu/index/edit', 11),
(110, 18, 'Delete Page Menu', 'pagemenu/index/delete', 12),
(111, 18, 'Change Page Menu Status', 'pagemenu/index/change', 13),
(112, 18, 'Export Page Menu', 'pagemenu/index/export', 14),
(113, 18, 'Print Page Menu', 'pagemenu/index/print', 15),
(114, 21, 'Participant', 'participant/index', 0),
(115, 21, 'Attachment', 'attachment/index', 1),
(116, 21, 'Add Participant', 'participant/index/add', 2),
(117, 21, 'View Participant', 'participant/index/view', 3),
(118, 21, 'Edit Participant', 'participant/index/edit', 4),
(119, 21, 'Delete Participant', 'participant/index/delete', 5),
(120, 21, 'Change Participant Status', 'participant/index/change', 6),
(121, 21, 'Export Participant', 'participant/index/export', 7),
(122, 21, 'Print Participant', 'participant/index/print', 8),
(123, 21, 'Add Attachment', 'attachment/index/add', 9),
(124, 21, 'View Attachment', 'attachment/index/view', 10),
(125, 21, 'Edit Attachment', 'attachment/index/edit', 11),
(126, 21, 'Delete Attachment', 'attachment/index/delete', 12),
(127, 21, 'Change Attachment Status', 'attachment/index/change', 13),
(128, 21, 'Export Attachment', 'attachment/index/export', 14),
(129, 21, 'Print Attachment', 'attachment/index/print', 15),
(130, 24, 'QR Codes', 'qrcode/index', 0),
(131, 24, 'QR Code Scanner', 'qrcodescanner/index', 1),
(132, 24, 'Add QR Code', 'qrcode/index/add', 2),
(133, 24, 'View QR Code', 'qrcode/index/view', 3),
(134, 24, 'Edit QR Code', 'qrcode/index/edit', 4),
(135, 24, 'Delete QR Code', 'qrcode/index/delete', 5),
(136, 24, 'Change QR Code Status', 'qrcode/index/change', 6),
(137, 24, 'Export QR Code', 'qrcode/index/export', 7),
(138, 24, 'Print QR Code', 'qrcode/index/print', 8),
(139, 27, 'Questionnaires', 'questionnaire/index', 0),
(140, 27, 'Questions', 'question/index', 1),
(141, 27, 'Question Rule', 'questionrule/index', 2),
(142, 27, 'Add Questionnaire', 'questionnaire/index/add', 3),
(143, 27, 'View Questionnaire', 'questionnaire/index/view', 4),
(144, 27, 'Edit Questionnaire', 'questionnaire/index/edit', 5),
(145, 27, 'Delete Questionnaire', 'questionnaire/index/delete', 6),
(146, 27, 'Change Questionnaire Status', 'questionnaire/index/change', 7),
(147, 27, 'Export Questionnaire', 'questionnaire/index/export', 8),
(148, 27, 'Print Questionnaire', 'questionnaire/index/print', 9),
(149, 27, 'Add Question', 'question/index/add', 10),
(150, 27, 'View Question', 'question/index/view', 11),
(151, 27, 'Edit Question', 'question/index/edit', 12),
(152, 27, 'Delete Question', 'question/index/delete', 13),
(153, 27, 'Change Question Status', 'question/index/change', 14),
(154, 27, 'Export Question', 'question/index/export', 15),
(155, 27, 'Print Question', 'question/index/print', 16),
(156, 27, 'Add Question Rule', 'questionrule/index/add', 17),
(157, 27, 'View Question Rule', 'questionrule/index/view', 18),
(158, 27, 'Edit Question Rule', 'questionrule/index/edit', 19),
(159, 27, 'Delete Question Rule', 'questionrule/index/delete', 20),
(160, 27, 'Change Question Rule Status', 'questionrule/index/change', 21),
(161, 27, 'Export Question Rule', 'questionrule/index/export', 22),
(162, 27, 'Print Question Rule', 'questionrule/index/print', 23);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) unsigned DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `synopsis` text,
  `text` text,
  `attribute` text,
  `publish_date` date DEFAULT NULL,
  `unpublish_date` date DEFAULT NULL,
  `allow_comment` tinyint(1) DEFAULT NULL,
  `tags` text,
  `order` tinyint(3) DEFAULT NULL,
  `user_id` tinyint(3) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `status` enum('publish','unpublish','deleted') DEFAULT 'publish',
  `added` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`,`name`,`publish_date`,`unpublish_date`,`allow_comment`,`order`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `menu_id`, `name`, `subject`, `synopsis`, `text`, `attribute`, `publish_date`, `unpublish_date`, `allow_comment`, `tags`, `order`, `user_id`, `count`, `status`, `added`, `modified`) VALUES
(1, 1, NULL, 'Vision and Mission', '<p>\n	Vision and Mission</p>\n', '<p>\n	Vision and Mission</p>\n', NULL, '2016-03-01', NULL, NULL, NULL, NULL, NULL, NULL, 'publish', 1456832030, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_images`
--

CREATE TABLE IF NOT EXISTS `page_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `field_id` int(11) unsigned DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `file_name` text,
  `priority` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `added` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `conference_id` (`field_id`,`url`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `page_images`
--

INSERT INTO `page_images` (`id`, `field_id`, `url`, `title`, `file_name`, `priority`, `count`, `status`, `added`, `modified`) VALUES
(78, 1, NULL, NULL, 'ab71f-CA024.png', NULL, NULL, 1, NULL, NULL),
(79, 1, NULL, NULL, '1b840-faces.jpg', NULL, NULL, 1, NULL, NULL),
(80, 1, NULL, NULL, '2f0e0-Charlie-Condou-005.jpg', NULL, NULL, 1, NULL, NULL),
(83, 1, NULL, NULL, '4b82d-dentsu.jpg', NULL, NULL, 1, NULL, NULL),
(82, 1, NULL, NULL, 'ae2ca-img_4429.jpg', NULL, NULL, 1, NULL, NULL),
(85, 1, NULL, NULL, '5db73-itswoodywoodmaker-e1435217648302.png', NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_menus`
--

CREATE TABLE IF NOT EXISTS `page_menus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) unsigned DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `url` varchar(255) DEFAULT NULL,
  `media` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `sub_level` tinyint(3) DEFAULT NULL,
  `order` tinyint(3) DEFAULT NULL,
  `is_system` tinyint(3) DEFAULT NULL,
  `has_child` tinyint(3) DEFAULT NULL,
  `user_id` tinyint(3) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `status` enum('publish','unpublish','deleted') DEFAULT 'publish',
  `added` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`,`name`,`sub_level`,`order`,`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `page_menus`
--

INSERT INTO `page_menus` (`id`, `parent_id`, `name`, `title`, `description`, `url`, `media`, `position`, `sub_level`, `order`, `is_system`, `has_child`, `user_id`, `count`, `status`, `added`, `modified`) VALUES
(1, NULL, 'About Us', 'About Us', NULL, 'about-us', NULL, 'bottom', NULL, NULL, NULL, NULL, NULL, NULL, 'publish', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE IF NOT EXISTS `participants` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `identifier_id` varchar(64) DEFAULT NULL,
  `identity` varchar(32) DEFAULT NULL,
  `profile_url` varchar(255) DEFAULT NULL,
  `photo_url` varchar(512) DEFAULT NULL,
  `email` varchar(72) DEFAULT NULL,
  `website` varchar(72) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(12) DEFAULT NULL,
  `age` tinyint(2) DEFAULT NULL,
  `nationality_id` int(11) DEFAULT NULL,
  `research_area` varchar(255) DEFAULT NULL,
  `occupation` varchar(64) DEFAULT NULL,
  `about` text,
  `address` varchar(512) DEFAULT NULL,
  `region` varchar(64) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `id_number` varchar(32) DEFAULT NULL,
  `file_name` varchar(512) DEFAULT NULL,
  `verify` varchar(8) DEFAULT NULL,
  `completed` tinyint(1) DEFAULT NULL,
  `logged_in` tinyint(1) NOT NULL DEFAULT '0',
  `last_login` int(11) DEFAULT NULL,
  `session_id` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `identifier_id`, `identity`, `profile_url`, `photo_url`, `email`, `website`, `password`, `username`, `name`, `gender`, `age`, `nationality_id`, `research_area`, `occupation`, `about`, `address`, `region`, `phone_number`, `id_number`, `file_name`, `verify`, `completed`, `logged_in`, `last_login`, `session_id`, `status`, `join_date`) VALUES
(1, 'SoPgnCFn90', 'LinkedIn', 'https://www.linkedin.com/pub/defrian-yarfi/42/a38/26b', NULL, 'defrian.yarfi@gmail.com', NULL, NULL, NULL, 'Defrian Yarfi', NULL, NULL, NULL, NULL, NULL, 'Web Developer and Frontend Web Developer.\nCurrently used CodeIgniter, CakePHP, Kohana, Yii and OpenCart for web development.\nDatabase Design, API, RESTful web service and Cloud Computing.\nAndroid Mobile Hybrid Applications.\n\nSpecialties: HTML & CSS, Javascript, jQuery, Ajax, Actionscript, MVC Concept, PHP & MySQL.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '', 0, '2015-07-01 12:17:39'),
(2, 'OUWMXH6WZQPX6YHXERMH7SCICQ', 'Yahoo', 'http://profile.yahoo.com/OUWMXH6WZQPX6YHXERMH7SCICQ', NULL, NULL, NULL, NULL, NULL, 'Defrian', 'male', 32, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '', 0, '2015-07-01 12:17:41'),
(3, 'VFNQPTS3ZUT4YVRNXT3GAEJCDY', 'Yahoo', 'http://profile.yahoo.com/VFNQPTS3ZUT4YVRNXT3GAEJCDY', NULL, NULL, NULL, NULL, NULL, 'Defrian', '', 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '', 0, '2015-07-01 13:29:04'),
(4, '101905163943989356331', 'Google', 'https://plus.google.com/+DefrianYarfi', NULL, 'defrian.yarfi@gmail.com', NULL, NULL, NULL, 'Defrian Yarfi', 'male', 0, NULL, NULL, NULL, '', 'Jakarta', '', NULL, NULL, NULL, NULL, NULL, 0, NULL, '', 0, '2015-07-01 13:38:49'),
(5, NULL, NULL, NULL, NULL, 'defrian.yarfi@d3.dentsu.co.id', NULL, NULL, NULL, 'Defrian Yarfi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '', 1, '2016-02-11 05:00:00'),
(6, NULL, NULL, NULL, NULL, 'eikzulfikar@d3.dentsu.co.id', NULL, NULL, NULL, 'Eik Zulfikar Fahmi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '', 1, '2016-02-11 05:00:00'),
(7, NULL, NULL, NULL, NULL, 'Muhammad.Hilman@d3.dentsu.co.id', NULL, NULL, NULL, 'Muhammad Hilman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '', 1, '2016-02-11 05:00:00'),
(8, NULL, NULL, NULL, NULL, 'rezza.fl@d3.dentsu.co.id', NULL, NULL, NULL, 'Rezza Alam Islami', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '', 1, '2016-02-11 05:00:00'),
(9, NULL, NULL, NULL, NULL, 'bimar@d3.dentsu.co.id', NULL, NULL, NULL, 'Bimar Saksono', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '', 1, '2016-02-19 05:00:00'),
(10, NULL, NULL, NULL, NULL, 'jessy@d3.dentsu.co.id', NULL, NULL, NULL, 'Jessy Christina Tono', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '', 1, '2016-02-19 05:00:00'),
(11, NULL, NULL, NULL, NULL, 'rangga@d3.dentsu.co.id', NULL, NULL, NULL, 'Rangga Pandji', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '', 1, '2016-02-19 05:00:00'),
(12, NULL, NULL, NULL, NULL, 'InditaSuwika.Sari@d3.dentsu.co.id', NULL, NULL, NULL, 'Indita Suwika Sari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '', 1, '2016-02-23 05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `participant_attachment_submissions`
--

CREATE TABLE IF NOT EXISTS `participant_attachment_submissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `participant_id` int(11) unsigned DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `file_name` text,
  `attribute` text,
  `count` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `added` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `part_id` (`participant_id`,`url`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `participant_attachment_submissions`
--

INSERT INTO `participant_attachment_submissions` (`id`, `participant_id`, `type`, `url`, `title`, `file_name`, `attribute`, `count`, `status`, `added`, `modified`) VALUES
(30, 5, 'fabric', NULL, NULL, '56e033ef04c59.png', NULL, NULL, 1, 1457533935, 1457533935);

-- --------------------------------------------------------

--
-- Table structure for table `qrcodes`
--

CREATE TABLE IF NOT EXISTS `qrcodes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `text` text,
  `serial` text,
  `file_name` varchar(512) DEFAULT NULL,
  `qrcode_url` varchar(512) DEFAULT NULL,
  `order` tinyint(3) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `added` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `qrcodes`
--

INSERT INTO `qrcodes` (`id`, `name`, `text`, `serial`, `file_name`, `qrcode_url`, `order`, `user_id`, `count`, `status`, `added`, `modified`) VALUES
(1, 'QR CODE 10C7OQ8fZl7OQe1J', '10C7OQ8fZl7OQe1J', 'qr-10C7OQ8fZl7OQe1J', 'https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=qr-10C7OQ8fZl7OQe1J&choe=UTF-8&chld=L|4', NULL, NULL, NULL, NULL, 1, 1441015354, NULL),
(2, 'test', 'Test', 'qr-n2xDPGtG7oeicPkr', 'https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=qr-n2xDPGtG7oeicPkr&choe=UTF-8&chld=L|4', NULL, NULL, NULL, NULL, 1, 1444192721, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questionnaires`
--

CREATE TABLE IF NOT EXISTS `questionnaires` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `questionnaire_text` text,
  `value` varchar(12) DEFAULT NULL,
  `help_text` text,
  `file_name` varchar(512) DEFAULT NULL,
  `order` tinyint(3) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `added` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `questionnaires`
--

INSERT INTO `questionnaires` (`id`, `type`, `name`, `questionnaire_text`, `value`, `help_text`, `file_name`, `order`, `user_id`, `count`, `status`, `added`, `modified`) VALUES
(1, 0, 'Yang mana kencan ideal kamu', '<p>\n	Yang mana kencan ideal kamu?</p>\n', NULL, NULL, '3d5f0-who-am-i.jpg', NULL, 1, NULL, 1, NULL, NULL),
(2, 0, 'Aktivitas outdoor favorit kamu', '<p>\n	Aktivitas outdoor favorit kamu?</p>\n', NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, NULL),
(3, 0, 'Aplikasi Hape Favorite Kamu', '<p>\n	Aplikasi Hape Favorite Kamu ?</p>\n', NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, NULL),
(4, 0, 'Sehari yang menyenangkan buat kamu seperti apa', '<p>\n	Sehari yang menyenangkan buat kamu seperti apa?</p>\n', NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, NULL),
(5, 0, 'Apa warna favoritmu', '<p>\n	Apa warna favoritmu?</p>\n', NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, NULL),
(6, 0, 'Menurut teman-teman, kamu itu…', '<p>\n	Menurut teman-teman, kamu itu&hellip;</p>\n', NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, NULL),
(7, 0, 'Makanan Jepang favorit kamu', '<p>\n	Makanan Jepang favorit kamu?</p>\n', NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire_completed`
--

CREATE TABLE IF NOT EXISTS `questionnaire_completed` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `participant_id` int(11) DEFAULT NULL,
  `questionnaire_id` int(11) DEFAULT NULL,
  `date_completed` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `added` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `part_id` (`participant_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire_user_answers`
--

CREATE TABLE IF NOT EXISTS `questionnaire_user_answers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `participant_id` int(11) DEFAULT NULL,
  `user_questionnaire_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `added` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `participant_id` (`participant_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `questionnaire_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `question_text` text,
  `file_name` varchar(512) DEFAULT NULL,
  `order` tinyint(3) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `added` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `questionnaire_id`, `name`, `question_text`, `file_name`, `order`, `user_id`, `count`, `status`, `added`, `modified`) VALUES
(1, 1, 'Fine Dining', '<p>\n	Fine Dining</p>\n', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(2, 1, 'Party', '<p>\n	Party</p>\n', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(14, 6, 'Mulai diet', '<p>\n	Mulai diet</p>\n', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(15, 6, 'Cari pacar baru', '<p>\n	Cari pacar baru</p>\n', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(3, 1, 'Camping di Alam Bebas', '<p>\n	Camping di Alam Bebas</p>\n', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(13, 5, 'Ungu', '<p>\n	Ungu</p>\n', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(4, 2, 'Nyantai di Pantai', '<p>\n	Nyantai di Pantai</p>\n', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(5, 3, 'Instagram', '<p>\n	Instagram</p>\n', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(6, 3, 'Pinterest', '<p>\n	Pinterest</p>\n', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(12, 5, 'Biru', '<p>\n	Biru</p>\n', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(7, 3, 'Music Player', '<p>\n	Music Player</p>\n', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(8, 4, 'Makan seharian', '<p>\n	Makan seharian</p>\n', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(9, 4, 'Yoga dan Spa', '<p>\n	Yoga dan Spa</p>\n', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(10, 4, 'Cafe Hopping sama geng', '<p>\n	Cafe Hopping sama geng</p>\n', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(11, 5, 'Merah', '<p>\n	Merah</p>\n', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(16, 6, 'Olah raga tiap hari', '<p>\n	Olah raga tiap hari</p>\n', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(17, 7, 'Sushi', '<p>\n	Sushi</p>\n', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(18, 7, 'Sashimi', '<p>\n	Sashimi</p>\n', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(19, 7, 'Sushi', '<p>\n	Sushi</p>\n', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(20, 2, 'Jogging', '<p>\n	Jogging</p>\n', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(21, 2, 'Window shopping', '<p>\n	Window shopping</p>\n', NULL, NULL, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question_rules`
--

CREATE TABLE IF NOT EXISTS `question_rules` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `text` text,
  `value` varchar(12) DEFAULT NULL,
  `file_name` varchar(512) DEFAULT NULL,
  `order` tinyint(3) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `added` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `server_logs`
--

CREATE TABLE IF NOT EXISTS `server_logs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` varchar(64) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `http_code` int(11) unsigned NOT NULL,
  `status_code` varchar(160) DEFAULT NULL,
  `bytes_served` int(11) DEFAULT NULL,
  `total_time` varchar(160) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `referrer` varchar(512) DEFAULT NULL,
  `geolocation` varchar(512) NOT NULL,
  `user_agent` varchar(512) DEFAULT NULL,
  `is_mobile` int(1) DEFAULT NULL,
  `status` int(1) unsigned NOT NULL,
  `added` int(11) unsigned NOT NULL,
  `modified` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `url` (`url`,`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `server_logs`
--

INSERT INTO `server_logs` (`id`, `session_id`, `url`, `user_id`, `http_code`, `status_code`, `bytes_served`, `total_time`, `ip_address`, `referrer`, `geolocation`, `user_agent`, `is_mobile`, `status`, `added`, `modified`) VALUES
(1, '3ab258b824b04b2c07488ae410fe9cea', 'http://localhost/dentsu.digital/fabric/participated', NULL, 200, NULL, NULL, '0.21250000 1457533937', '::1', 'http://localhost/dentsu.digital/fabric', '', '{"user_agent":"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10.7; rv:44.0) Gecko\\/20100101 Firefox\\/44.0","platform":"Mac OS X","browser":"Firefox"}', 0, 1, 1457533937, 1457533937);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parameter` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `group` varchar(64) DEFAULT NULL,
  `key` varchar(64) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `help_text` varchar(128) DEFAULT NULL,
  `is_system` tinyint(1) DEFAULT '1',
  `status` tinyint(1) DEFAULT '1',
  `added` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`parameter`,`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `parameter`, `alias`, `group`, `key`, `value`, `help_text`, `is_system`, `status`, `added`, `modified`) VALUES
(1, 'email_marketing', 'Email Marketing', NULL, NULL, 'marketing@', NULL, 1, 1, 1334835773, NULL),
(2, 'email_administrator', 'Email Administrator', NULL, NULL, 'administrator@', NULL, 1, 1, 1334835773, 1336122482),
(3, 'email_hrd', 'Email HRD', NULL, NULL, 'hrd@', NULL, 1, 1, 1334835773, NULL),
(4, 'email_info', 'Email Info', NULL, NULL, 'info@d3.dentsu.co.id', NULL, 1, 1, 1334835773, NULL),
(5, 'email_template', 'Email Template', NULL, NULL, '&dash;', NULL, 1, 1, 1334835773, NULL),
(6, 'maintenance_template', 'Maintenance Mode Template', NULL, NULL, '<h2>The site is off for <span><h1>MAINTENANCE</h1></span></h2>', NULL, 1, 1, 1334835773, NULL),
(7, 'contactus_address', 'Contact Address', NULL, NULL, '22nd Floor, Mandiri Tower Plaza Bapindo <br/>\nJl. Jend. Sudirman Kav. 54-55 <br/>\nJakarta 12190, Indonesia', NULL, 1, 1, 1334835773, NULL),
(8, 'contactus_gmap', 'GMaps Location', NULL, NULL, 'http://maps.google.com/maps?q=-6.217668,106.812992&num=1&t=m&z=18', NULL, 1, 1, 1334835773, NULL),
(9, 'no_phone', 'Number Phone', NULL, NULL, '(021) 299-501-10 / (021) 526-0286', NULL, 1, 1, 1334835773, NULL),
(10, 'no_fax', 'Number Fax', NULL, NULL, '(021) 522.3718', NULL, 1, 1, 1334835773, NULL),
(11, 'title_default', 'Website Title Default', NULL, NULL, 'Connecting you to your consumer', NULL, 1, 1, NULL, NULL),
(12, 'title_name', 'Company Title Name', NULL, NULL, 'PT. Default (Web Agency in Jakarta)', NULL, 1, 1, NULL, 1336118568),
(13, 'language', 'Default Language', NULL, NULL, 'en', NULL, 1, 1, NULL, 1336118568),
(14, 'counter', 'Site Counter', NULL, NULL, '123', NULL, 1, 1, NULL, 1336118568),
(15, 'copyright', 'Copyright', NULL, NULL, '© 2012 COMPANY NAME COPYRIGHT. All Rights Reserved.', NULL, 1, 1, NULL, 1336118568),
(16, 'site_name', 'Site Name', NULL, NULL, ' Default <br/> PT. Default (Web Agency in Jakarta).', NULL, 1, 1, NULL, 1336118568),
(17, 'site_quote', 'Quote', NULL, NULL, 'We provide solution for your Websites', NULL, 1, 1, NULL, 1336118568),
(18, 'site_description', 'Website Description', NULL, NULL, 'We provide solution for your Company Website ', NULL, 1, 1, NULL, 1336118568),
(19, 'socmed_facebook', 'Facebook', NULL, NULL, 'http://facebook.com', NULL, 1, 1, NULL, 1336118568),
(20, 'socmed_twitter', 'Twitter', NULL, NULL, 'http://twitter.com', NULL, 1, 1, NULL, 1336118568),
(21, 'socmed_gplus', 'Google Plus', NULL, NULL, 'http://plus.google.com', NULL, 1, 1, NULL, 1336118568),
(22, 'socmed_linkedin', 'LinkedIn', NULL, NULL, 'http://linkedin.com', NULL, 1, 1, NULL, 1424754067),
(23, 'socmed_pinterest', 'Pinterest', NULL, NULL, 'http://pinterest.com', NULL, 1, 1, NULL, 1336118568),
(24, 'registered_mark', 'Registered', NULL, NULL, 'We provide solution for your Websites', NULL, 1, 1, NULL, 1336118568),
(25, 'google_analytics', 'Analytics', NULL, NULL, 'Code Snippet', NULL, 1, 1, NULL, 1336118568),
(26, 'ext_link', 'Ext Link', NULL, NULL, 'http://www.apb-career.net', NULL, 1, 1, NULL, 1423732944),
(29, 'cron_job', 'Cron Jobs', NULL, NULL, '-', 'Cron Jobs Execution', 1, 1, 1457061304, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `username` char(64) CHARACTER SET latin1 NOT NULL,
  `email` varchar(64) CHARACTER SET latin1 NOT NULL,
  `password` char(124) CHARACTER SET latin1 NOT NULL,
  `group_id` tinyint(1) unsigned NOT NULL,
  `last_login` int(11) NOT NULL,
  `logged_in` int(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `session_id` varchar(160) NOT NULL,
  `verify` varchar(8) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `added` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `group_id`, `last_login`, `logged_in`, `status`, `session_id`, `verify`, `deleted`, `added`, `modified`) VALUES
(1, 'admin', 'admin@admin.com', 'a03c997e5e5643a11d77287d82856b9f83bd8fe4', 1, 1469444417, 1, 1, '', 'Q12C', 0, 0, 0),
(2, 'joni', 'admin1@admin.com', '9003d1df22eb4d3820015070385194c8', 2, 1417003004, 0, 1, '', 'Q12C', 0, 0, 1424687676),
(29, 'dyarfi', 'dyarfi20@gmail.com', '647dc5d75f6ce3c6a859eb3b91fa6ccaab05b245', 116, 0, 0, 1, '', 'Q12C', 0, 1417065898, 0),
(7, 'gmp', 'defrian.yarfi@gmail.com', '4d60cf3ac1381a533090412a84466000437eee1f', 4, 1417003001, 0, 1, '', 'Q12C', 0, 0, 0),
(28, 'public', 'defrian.yarfi@gmail.com', '616eae925a4c10a70f2675d13d5c9e909f4d60c6', 100, 1417001002, 1, 1, '', 'Q12C', 0, 1424854403, 1424689343),
(30, 'user.gen', 'defrian.yarfi@yahoo.com', '616eae925a4c10a70f2675d13d5c9e909f4d60c6', 100, 1417001002, 1, 2, '', 'Q12C', 0, 1416993998, 1449223462),
(37, 'dyarfi20@gmail.com', 'dyarfi20@gmail.com', '70ccd9007338d6d81dd3b6271621b9cf9a97ea00', 2, 0, 0, 1, '', NULL, 0, 1455016671, 0),
(32, 'admin@admin.com', 'admin@admin.com', '23aab64707ea295a6d8fa04d77a6db67e2d57c57', 100, 0, 0, 1, '', 'Q12C', 0, 1425380399, 0),
(46, 'admin@admin.com', 'admin@admin.com', '23aab64707ea295a6d8fa04d77a6db67e2d57c57', 100, 0, 0, 1, '', 'Q12C', 1, 1425380399, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `backend_access` tinyint(1) DEFAULT NULL,
  `full_backend_access` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_system` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `added` int(11) unsigned NOT NULL,
  `modified` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=119 ;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`, `backend_access`, `full_backend_access`, `status`, `is_system`, `deleted`, `added`, `modified`) VALUES
(1, 'Super Administrator', 1, 1, 1, 1, 0, 1416499923, 0),
(2, 'Administrator', 1, 1, 1, 1, 0, 1416499923, 0),
(99, 'User', 0, 0, 1, 1, 0, 1416499923, 0),
(111, 'Manager', 1, 1, 1, 0, 0, 0, 1425320008),
(112, 'Executive', 0, 0, 1, 0, 0, 0, 0),
(113, 'Director', 0, 0, 1, 0, 0, 0, 0),
(114, 'General', 0, 0, 1, 0, 0, 0, 1424689329),
(116, 'Publisher', 1, 1, 1, 0, 0, 0, 0),
(100, 'Employee', 1, NULL, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_histories`
--

CREATE TABLE IF NOT EXISTS `user_histories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(24) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `controller` varchar(160) NOT NULL,
  `action` char(20) DEFAULT NULL,
  `time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`module`,`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_histories`
--

INSERT INTO `user_histories` (`id`, `module`, `user_id`, `controller`, `action`, `time`) VALUES
(1, 'user', 1, 'history', 'index', 1416281220),
(2, 'user', 1, 'history', 'index', 1416281220);

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `user_id` int(11) unsigned NOT NULL,
  `gender` enum('male','female') NOT NULL DEFAULT 'male',
  `about` text,
  `first_name` varchar(64) DEFAULT NULL,
  `last_name` varchar(64) DEFAULT NULL,
  `division` varchar(64) DEFAULT NULL,
  `country` varchar(64) DEFAULT NULL,
  `state` varchar(64) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `address` text,
  `postal_code` varchar(8) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `mobile_phone` varchar(16) DEFAULT NULL,
  `fax` varchar(16) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `file_type` varchar(64) DEFAULT NULL,
  `file_name` varchar(48) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `added` int(11) unsigned NOT NULL,
  `modified` int(11) unsigned NOT NULL,
  KEY `user_id` (`user_id`,`phone`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`user_id`, `gender`, `about`, `first_name`, `last_name`, `division`, `country`, `state`, `city`, `address`, `postal_code`, `birthday`, `phone`, `mobile_phone`, `fax`, `website`, `file_type`, `file_name`, `status`, `added`, `modified`) VALUES
(1, 'male', 'Top Administrator of this website and portal', 'Administrator', 'Website', 'Web Programmer', 'DKI Jakarta', 'Jakarta', 'Jl. Gading Putih 1 F2 No. 4', '14240', '', '2010-09-06', '1234', '081807244697', '0', 'http://google.com', 'image/jpeg', '03.jpg', 1, 1283760138, 1428349886),
(2, 'male', 'Administrator of this Website', '', '', 'Web Designer', 'DKI Jakarta', 'Jakarta', 'Jl. Gading Putih 1 F2 No. 4', '14240', '', '2010-09-06', '1234', '081807244697', '0', '', 'image/jpeg', '78d57b4b5a0c6048b75bb0c9d91a8392.jpg', 1, 1283760138, 1424687676),
(28, 'male', 'Test', 'Public', 'Viewers', 'Web Programmer', NULL, NULL, NULL, NULL, NULL, '0000-00-00', '909090090', '909090090', NULL, NULL, NULL, NULL, 1, 1424854403, 1424689343),
(29, 'male', 'Web Programmer not a full stack', 'Defrian', 'Yarfi', 'Web Programmer', NULL, NULL, NULL, NULL, NULL, '0000-00-00', '081807244697', '081807244697', NULL, NULL, NULL, NULL, 1, 1417065898, 0),
(111, 'male', '', 'Web Developer', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', 1, 1333442128, 1333442192),
(110, 'male', '', 'Web Developer', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', 1, 1333441986, 1333442058),
(32, 'male', NULL, 'Test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5cae9-_7___felix_boyeaux_studios_by_fixxxxx.png', 1, 1425380399, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
