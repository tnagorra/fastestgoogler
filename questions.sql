-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 20, 2014 at 09:22 AM
-- Server version: 5.5.37-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bagchal`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `ID` varchar(5) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `state` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`ID`, `question`, `answer`, `state`, `date`) VALUES
('263v5', 'Nintendo Co., Ltd.  Is a Japanese multinational consumer electronics company headquartered in Kyoto, Japan. Nintendo is the world''s largest video game company by revenue. Founded on September 23, 1889. What is the area of the city where the current CEO of this company was born? Give the answer in square miles?', '432.87', 0, '0000-00-00 00:00:00'),
('3erud', 'Abraham Lincoln was assasinated while watching a play, what was it?', 'Our American Cousin', 2, '0000-00-00 00:00:00'),
('83dj3', 'I am a cricket legend. I once played for yorshire county club. Ramakant Achreker was my coach.I scored 0 run in debut against a country. What is the calling code of that country?', '+92', 0, '0000-00-00 00:00:00'),
('87dj4', 'My father was one of the prime architects of Burma’s independence. I completed my graduation from Lady Shri Ram College, New Delhi in 1964. I later got involved in politics in, was detained under house arrest several times, most recently released in 2011 and have won Nobel peace prize twice. I officially received an honorable prize awarded to me 24 years back in 2013 in a city of France. What is the current population of that city?', '272,975', 0, '0000-00-00 00:00:00'),
('9d7hz', 'I am a renowned industrialist of america. I lived between 1863-1947 and am one of the prime reasons for Detroit city being known as the city of motors. I was first hired as an engineer for the Illuminating Company. The founder of that company is a scientist. During fluoroscopy experiment, he found out that barium platinocyanide screens originally used by Wilhelm Röntgen were less bright than a compound that he discovered later. What was that scientific compound used in the screen?', 'calcium tungstate', 0, '0000-00-00 00:00:00'),
('a45de', 'Born 31 May 1946, in Montego Bay, Jamaica, I became a school mathematics teacher and sports coach before becoming an only person to have appeared as an  international football referee and  cricket umpire. I was awarded the Order of Jamaica, Commander Class, for "outstanding services in the field of sports”. If you add the number of Ashes matches that I have stood as an umpire to the number from people suffering from triskaidekaphobia and take its cube root, what will be the result?', '3', 0, '0000-00-00 00:00:00'),
('amsnd', 'What is the nickname of CEO of "Berkshire Hathaway"?', 'Oracle Of Omaha', 0, '0000-00-00 00:00:00'),
('anup', 'How many years ago did the last magmatic volcanic erruption of the Yellowstone Supervolcano took place?', '70,000 years ago ', 2, '0000-00-00 00:00:00'),
('cxmdj', 'Which two organisations and commonly known as britton woods sisters?', 'IMF and World Bank', 2, '0000-00-00 00:00:00'),
('dh34d', 'How many players have scored 4 goals in a single game FIFA world cup match?', 'Six', 2, '0000-00-00 00:00:00'),
('dk30a', 'Born in 1963, I am an American actor, film producer and musician. I have played with bands Oasis, Marilyn Manson and also was a member of the super band P. I am one of the most diverse actors in Hollywood and I rose to prominence following my role in 21 Jump Street. If I add every single digits of the year I was married first, it resembles a movie released in 2008. Who is the director of that movie?', 'Robert Luketic', 0, '0000-00-00 00:00:00'),
('hak34', 'What is the height of Dharahara in Nautical mile?', '0.033412527', 2, '2013-06-26 00:00:00'),
('kd821', 'Born in 16th century I am a German mathematician, astronomer and an astrologer. I am best known for my laws of planetary motion. I also did fundamental works in the field of optics which involves building an improved refracting telescope which was later named after me. What is my death year according to the Burmese calendar?', '992', 0, '0000-00-00 00:00:00'),
('kd8k2', 'I am the 35th president of the USA and the first of its presidents to be born in the 20th century. I am famous as one of the fastest speaking persons that ever lived. I was assassinated on November, 1963. My assassin was also charged for killing a police officer. What was his name?', 'J.D. Tippit', 0, '0000-00-00 00:00:00'),
('kj3h4', 'What is the distance between earth and titan in yards? Express in exponetial form.', '1.39108e12', 0, '0000-00-00 00:00:00'),
('m4jdf', 'Total international runs score by Sachin Tendulkar?', '34273', 2, '0000-00-00 00:00:00'),
('md730', 'I am an American actor and made my screen debut with Get Real. In 2004, I was honored with the Vail film festival’s Rising star award. I have also voiced the character of blu in Rio. What is my birth date according to nepali calendar?', 'Wednesday, Ashwin 19, 2040', 0, '0000-00-00 00:00:00'),
('mdnf3', 'Who is the co-Founder of Microsoft along with Bill Gates!!', 'Paul Allen', 2, '0000-00-00 00:00:00'),
('msd44', 'What is the top speed of the fastest olympic runner in kph?', '45.0616', 2, '0000-00-00 00:00:00'),
('sk2m1', 'What is the number of runs scored by the highest run-getter in the champions trophy (cricket) 2013?', '363', 2, '0000-00-00 00:00:00'),
('wendh', 'How much wide is Angel Falls at it''s base?', '500 feet or 150 Meter', 2, '0000-00-00 00:00:00'),
('xyaad', 'The length of world''s longest motorable road according to Guinness World Records in inch [write in terms of exponential form (e)] ', '1.88811e+9', 2, '0000-00-00 00:00:00'),
('zmnds', 'Which is the longest palindromic word?', 'saippuakivikauppias', 2, '0000-00-00 00:00:00'),
('zxmns', 'What is the maximum possbile score in the game of snooker?', '147', 2, '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
