-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wapi-library`
--

-- --------------------------------------------------------

--
-- Структура на таблица `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `book_ISBN` varchar(20) NOT NULL,
  `book_title` varchar(45) NOT NULL,
  `book_author` varchar(45) NOT NULL,
  `book_pages` int(11) DEFAULT NULL,
  `book_format` varchar(45) DEFAULT NULL,
  `book_image` varchar(45) DEFAULT NULL,
  `book_resume` varchar(500) NOT NULL,
  `publish_date` int(4) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `books`
--

INSERT INTO `books` (`book_id`, `creation_date`, `book_ISBN`, `book_title`, `book_author`, `book_pages`, `book_format`, `book_image`, `book_resume`, `publish_date`, `user_id`) VALUES
(1, '2017-06-25 13:59:47', '9780747566533', 'The Kite Runner', 'Khaled Hosseini', 325, 'A3', 'ac47a08e1c3ab25e8a555b1e2bf49495ff5f3b8c.jpg', 'A story of fathers and sons, friendship and betrayal, and the casualties of fate 1970s Afghanistan: Twelve-year-old Amir is desperate to win the local kite-fighting tournament and his loyal friend Hassan promises to help him. But neither of the boys can foresee what will happen to Hassan that afternoon, an event that is to shatter their lives. After the Russians invade and the family is forced to flee to America, Amir realises that one day he must return to an Afghanistan under Taliban rule to f', 2004, 1),
(2, '2017-06-25 14:05:08', '192076920X', 'Shantaram', 'Gregory David Roberts', 936, 'A3', '8216b0ba8a4114d25deb161026a4654f9e1b8592.jpg', 'As a hunted man without a home, family, or identity, Lin searches for love and meaning while running a clinic in one of the city''s poorest slums, and serving his apprenticeship in the dark arts of the Bombay mafia. The search leads him to war, prison torture, murder, and a series of enigmatic and bloody betrayals. The keys to unlock the mysteries and intrigues that bind Lin are held by two people. The first is Khader Khan: mafia godfather, criminal-philosopher-saint, and mentor to Lin in the und', 2003, 1),
(3, '2017-06-25 14:16:48', '0670021458', 'The Forty Rules of Love: A Novel of Rumi', 'Elif Shafak', 354, 'A4', 'c8944cd99d59b086044dc2239e0747a0deae7da2.jpg', 'Elif Shafak, the most widely read female writer in Turkey, has earned a growing fan base all over the world with her bestselling The Bastard of Istanbul. In The Forty Rules of Love, her lyrical, imaginative new novel about the famous Sufi mystic Rumi, Shafak effortlessly blends East and West, past and present, to create a dramatic, compelling, and exuberant tale about how love works in the world. Shafak unfolds two parallel narratives-one set in the thirteenth century, when Rumi encountered his ', 2010, 1),
(6, '2017-06-26 13:35:12', '1934824712', '18% Gray', 'Zachary Karabashliev', 0, 'A4', '4fc51c628b89f12c0fa601abb38e744f213e269d.jpg', 'Distraught over the sudden disappearance of his wife Stella, Zack tries to drown his grief in Tijuana, where he encounters a violent scene, and trying to save a stranger''s life, he nearly loses his own. He manages to escape in his assailants&rsquo; van and makes it back to the US, only to find a bag of marijuana in it. \r\n\r\nUsing this as an impetus to change his life, Zack sets off for New York with the weed and a vintage Nikon. Through the lens of the old camera, he starts rediscovering himself ', 2013, 1),
(7, '2017-06-26 15:28:16', '9781880418628', 'The Dark Tower VII', 'Stephen King', 845, 'A4', '4e0afce3488f39ee1d25074b62b2c14120001d0b.jpg', 'Creating &quot;true narrative magic&quot; (The Washington Post) at every revelatory turn, Stephen King surpasses all expectation in the stunning final volume of his seven-part epic masterwork. Entwining stories and worlds from a vast and complex canvas, here is the conclusion readers have long awaited&mdash;breathtakingly imaginative, boldly visionary, and wholly entertaining.\r\n\r\nRoland Deschain and his ka-tet have journeyed together and apart, scattered far and wide across multilayered worlds o', 2006, 4);

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `user_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`) VALUES
(1, 'Neli Spilkova', 'f54b31c72be0c84271f558059381c75985b6b23e'),
(2, 'Bilyna', '746f77de14ac4b78a5fae52fe955d3e2ca1f16e8'),
(3, 'Sophia', 'd85d7cbb1d078ea1189a61655b42184d00e41d7a'),
(4, 'Peter Petrov', 'e08cbd6a0a256b835ccb208ba25cda2724e5d1af'),
(5, 'Georgi', '713fd0ddeb438fe1da43a459183c58614aae0ed2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `book_id_UNIQUE` (`book_id`),
  ADD UNIQUE KEY `book_ISBN_UNIQUE` (`book_ISBN`),
  ADD KEY `fk_user_id_idx` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `id_user_UNIQUE` (`user_id`),
  ADD UNIQUE KEY `user_name_UNIQUE` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
