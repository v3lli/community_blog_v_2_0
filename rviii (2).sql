-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 19, 2021 at 02:55 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rviii`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_test`
--

CREATE TABLE `category_test` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_test`
--

INSERT INTO `category_test` (`id`, `name`) VALUES
(1, 'Official'),
(2, 'Think'),
(3, 'Personal'),
(4, 'Lit');

-- --------------------------------------------------------

--
-- Table structure for table `comment_test`
--

CREATE TABLE `comment_test` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `art_id` int(10) NOT NULL,
  `body` mediumtext NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment_test`
--

INSERT INTO `comment_test` (`id`, `user_id`, `art_id`, `body`, `create_date`) VALUES
(1, 1, 1, 'a fan', '2021-01-10 09:43:40'),
(2, 1, 1, 'i said it first', '2021-01-10 11:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `posts_test`
--

CREATE TABLE `posts_test` (
  `id` bigint(10) NOT NULL,
  `cat_id` bigint(10) NOT NULL,
  `author` varchar(50) DEFAULT NULL,
  `title` varchar(75) DEFAULT NULL,
  `body` text,
  `subtitle` varchar(100) DEFAULT NULL,
  `description` tinytext,
  `thumbnail` varchar(200) DEFAULT NULL,
  `spread` varchar(200) DEFAULT NULL,
  `pc` varchar(200) NOT NULL DEFAULT 'Unknown',
  `isvideo` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts_test`
--

INSERT INTO `posts_test` (`id`, `cat_id`, `author`, `title`, `body`, `subtitle`, `description`, `thumbnail`, `spread`, `pc`, `isvideo`, `created_at`) VALUES
(1, 2, 'Redd', 'COPING WITH DEMONS', 'Mental disorders without doubt have taken a large toll on society. People with these conditions have a diversity of experiences coping; from managing it well to being borderline suicidal. Living with a mental disorder is not easy and it goes without saying that coping with certain physical illnesses comes nowhere near coping with depression, anxiety and the likes. But as much as these illnesses way people down, it is not uncommon to hear stories of people who excelled greatly in life and in some cases, found ways to beat the illnesses. This article will be looking into the experiences of some well-known people with mental disorders.', 'MENTAL HEALTH STORIES FROM THE PAST #1', 'Mental disorders without doubt have taken a large toll on society. People with these conditions have a diversity of experiences', '..//images/IMG_1252.jpg', '..//images/IMG_1252.jpg', 'Unknown', 0, '2020-12-17 11:09:52'),
(2, 3, 'Black', 'Thoughts from a Balcony', 'Thoughts from a Balcony\r\n\r\nDumb and Getting older\r\nNumb and getting colder\r\nAs I write..\r\n\r\nwhat have I learned?\r\n\r\nI learned there are very few things have that cannot be taken from me..very few.\r\n\r\na past? yes.. but right now those are just a couple of memories, so I have memories.\r\nmost of which I even left with other people but memories all the same.\r\n\r\nI have a future but right now thats just a couple dreams/goals and might aswell just be conversation starters because nobody  promised that shit..\r\n\r\nso…the eventuality of death?..yes, Valar Freaking Moghulis\r\nbut as an animal I can’t think of that and the way my peace is set up..I don’t let it motivate me either, its too sure and thankfully..not right now\r\n\r\nRelationships?..whether people leave or not I will make my mark on them and they may leave theirs on me\r\nGod tho..that one’s always there, even right now\r\n\r\nSo Right Now?\r\n\r\nYeah, I have the now, and in it..I am any and everything I want.\r\n\r\nMuse ', 'Who am i?', 'Dumb and Getting older\r\nNumb and getting colder', '..//images/IMG_0754-thumb.jpg', '..//images/IMG_0754.jpg', 'velli instagram @emeka_velli', 0, '2021-01-16 11:19:59'),
(3, 4, 'Mr Beans', 'I’m better than I know', 'I’m better than I know\r\n\r\nYou’re cute and you know\r\nHow I might go so cold\r\nand flip the switch on\r\nThe feelings for reasons surrounding how those three words from you are became my mountain of truth\r\nstories of how I got no one above you but on some other level doesn’t change the fact my intentions are true but really what good can I do. Insecure about my status quo apparently more than you know. Maybe it’s life? I never lived it before. But I walked the road to hell and back and all I stepped on were good intentions purer than I ever conceived.\r\nBravado; harder and harder I grow\r\nAnything else is the shit no one can ever relates to \r\nAnd I can never blame you and I’ll rather game you\r\n', 'Dare to believe', 'You’re cute and you know\r\nHow I might go so cold\r\n...', '..//images/IMG_1293-2-thumb.jpg', '../images/IMG_1293-2.jpg', 'velli instagram @emeka_velli', 0, '2021-01-17 04:07:30');

-- --------------------------------------------------------

--
-- Table structure for table `users_test`
--

CREATE TABLE `users_test` (
  `id` bigint(10) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `handle` varchar(200) NOT NULL,
  `password` varchar(20) NOT NULL,
  `isadmin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_test`
--

INSERT INTO `users_test` (`id`, `first_name`, `last_name`, `mobile`, `gender`, `email`, `handle`, `password`, `isadmin`, `created_at`) VALUES
(1, NULL, NULL, NULL, NULL, 'boss@gmail.com', 'bossadmin', '12345', 1, '2020-12-30 01:44:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_test`
--
ALTER TABLE `category_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_test`
--
ALTER TABLE `comment_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts_test`
--
ALTER TABLE `posts_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_test`
--
ALTER TABLE `users_test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_test`
--
ALTER TABLE `category_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment_test`
--
ALTER TABLE `comment_test`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts_test`
--
ALTER TABLE `posts_test`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_test`
--
ALTER TABLE `users_test`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
