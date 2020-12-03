-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 09:15 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serverside`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogpost`
--

CREATE TABLE `blogpost` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(30) NOT NULL,
  `content` varchar(500) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogpost`
--

INSERT INTO `blogpost` (`id`, `category_id`, `title`, `content`, `timestamp`) VALUES
(19, NULL, 'Please Work - Character Limit', 'Donec id nunc sed lectus lobortis tristique. Ut feugiat tempor tortor, in malesuada ipsum eleifend et. Nunc dictum leo nisl, eget ullamcorper nibh viverra et. Proin vitae suscipit metus, id tempus orci. Donec vulputate, lorem et scelerisque egestas, orci mi ultricies turpis, sed varius ex urna ut tortor. Aliquam quis sem erat. Morbi ultrices, neque non ultricies tincidunt, mauris neque finibus nunc, quis dapibus est justo at risus. Vivamus non congue ante. Nullam pulvinar nunc nec nisi porta veh', '2020-10-08 20:46:39'),
(20, NULL, 'Team Shoutout', 'Hi Cole and Sy!!!!', '2020-10-08 20:47:34'),
(22, NULL, 'I think im done .... ?', 'hopefully?????', '2020-10-08 23:45:48'),
(42, NULL, 'hi', 'hey', '2020-10-10 17:38:45'),
(43, NULL, 'test', 'panda', '2020-10-10 17:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Indoor Plant Hello Plant'),
(2, 'Poison'),
(3, 'My Plants'),
(4, 'Test of Mine'),
(5, 'My Plants');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `name` varchar(20) NOT NULL,
  `captcha` varchar(6) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `name`, `captcha`, `date_create`) VALUES
(12, 'wow', 'mil', '', '2020-11-19 18:31:57'),
(15, 'Cool post.', 'Franky', '', '2020-11-19 18:31:57'),
(16, 'Love it!', 'Popeye', '', '2020-11-19 18:33:03'),
(35, 'wow', 'wow', '', '2020-11-27 10:57:55'),
(36, 'hey', 'hey', '', '2020-11-27 11:06:39'),
(37, 'dsds', 'Java', '', '2020-12-01 18:24:35'),
(38, 'ds', 'Advance Data Structu', '', '2020-12-01 18:27:26'),
(39, 'dsds', 'Network', '', '2020-12-01 18:28:37'),
(40, 'dsds', 'sdasda', '', '2020-12-01 18:31:10'),
(41, 'dsds', 'sdasda', '', '2020-12-01 18:31:34'),
(42, 'dsds', 'sdasda', '', '2020-12-01 18:31:46'),
(43, 'dsdsdsdsds', 'dsadsadsa', '', '2020-12-01 18:32:22'),
(44, 'dsdsdsdsds', 'dsadsadsa', '', '2020-12-01 18:33:55'),
(45, 'dsds', 'sd232', '', '2020-12-01 18:34:13'),
(46, 'dsdssds', 'sd232ds', '', '2020-12-01 18:34:28'),
(47, 'fdfd', 'fdfd', '', '2020-12-01 18:37:35'),
(48, 'Good', 'My Name', '', '2020-12-01 18:37:49'),
(49, 'dsds', 'dsds', '', '2020-12-01 18:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `forumpost`
--

CREATE TABLE `forumpost` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(500) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forumpost`
--

INSERT INTO `forumpost` (`id`, `category_id`, `comment_id`, `title`, `content`, `timestamp`) VALUES
(5, 0, NULL, 'What are dangerous plants for cats?', '<p>Hello! New to the plant game. Was wondering if anyone knew what plants are the most dangerous for cats? I have 9 and would rather be safe than sorry. Thanks!</p><p>Hello</p>', '2020-12-02 06:47:12'),
(6, 0, NULL, 'Raindrop Peperomia seems to be getting worse and w', 'I&#039;ve had this plant for almost a year now but the past few months I&#039;ve noticed leaves yellowing faster than new growth seems to be coming. It seems worse this past month than ever before. Any ideas as to what&#039;s going on? I water when the soil is dry and fertilized a couple once this year (earlier in the summer after I noticed the yellowing). It It even flowered this year so I don&#039;t know what&#039;s got it so upset. It sits in an east facing window with no blinds all day.', '2020-11-13 07:04:05'),
(8, 0, NULL, 'I just ordered a Whale fin!! Am I nuts LOL', 'Yes I have snake plants coming up like weeds in Florida and a few nice ones up north also . But it looks so cool I had to get one . Pictures as soon as I get it !!! Any thoughts ?', '2020-11-13 07:45:55'),
(9, 0, NULL, 'Polyscias Scutellaria loosing leaves', 'Hi everyone,\r\n\r\nI was looking for some information regarding the cure of my new Polyscias and I stepped into this wonderful forum.\r\n\r\nI bought this mid-size plant (pictures attached) a couple of weeks ago with my girlfriend to colour our living room. The lady who sold the plant told us to put it in a room with enough light and to water it just once a week with half a cup of water (actually we watered it just a bit more because we felt the soil really dry). After more or less 10 days the Polyscia', '2020-11-13 07:46:45'),
(10, 0, NULL, 'Too much sun for Mass Cane?', 'My mass cane plant gets a couple hours of sun like this. Is it too much or too direct?', '2020-11-13 07:47:42'),
(11, 0, NULL, 'Please help me save my cheese plant!', 'Hello\r\n\r\nI have a ~ 3 year old cheese plant and recently the leaves have started to turn yellow with black spots. I repotted it at the start of this year and it grew like crazy of the summer, I propagated a few leaves but now it looks like it&#039;s dying. I checked some other posts but the black marks makes me think this problem is slightly different. Pictures below, any advice would be greatly appreciated! Thanks!!', '2020-11-13 07:48:19'),
(12, 0, NULL, 'Should I move my plants away from the windowsill d', 'Hello guys, I live in Minneapolis and winter is coming, literally! I have had my plants on the windowsill (some are seedlings) and to be honest, this year, my dorm room doesn&#039;t get much direct sunlight since there is a building right in front of me. To cope with that, I added a grow light.\r\nBut now its winter and I am scared that my plants could freeze to death, especially the seedlings. Should I move them away from the window? (I was thinking my desk) But there will be absolutely no direct', '2020-11-13 07:49:41'),
(13, 0, NULL, 'What are these tar like black dots on my Calathea?', 'I have had this calathea for a little over a year and it&#039;s been happy and thriving until about a month back - I suspected it needed fertilizer so tried that. Two weeks ago I noticed little black dots on the back of the damaged parts of the leaves, and I removed them with a wet cloth - some of them stuck on so I scratched them off, and they left a black/blue mark on my hands almost like ink.\r\nToday I looked again, and the black dots have multiplied and are on both stems and leaves again.', '2020-11-13 07:50:35'),
(14, 0, NULL, 'Monstera&#039;s New Leaves Always Come Out Damaged', 'Hi Everyone, I have a large monstera cutting that has been in the house for almost a year now. The leaves are almost the size of two of my hands!!\r\n\r\nEvery time it grows a new leaf, it comes out damaged. Last time the leaf looked half eaten so I had to cut it off and this time when it started unfurling, it had a black tip and looks half the size. I repotted the monstera this summer and put in new soil and a larger pot because a roots were coming out of the bottom of the last pot. I just don&#039', '2020-11-13 07:51:16'),
(15, 0, NULL, 'Help! My variegated ficus elastica tree is getting', '<p>Bought this ficus elastica tree around a month ago, there are a few minor small brown spots on the edge of the leaves when I bought it. But the spots seemed to grow bigger! I\'m worried that it\'s some kind of fungus disease or root rot.. The plant is in its original nursery pot and I used promix potting mix to repot the plant after I got it. I have never fertilize it since I got it and the plant is near a south-facing window with no direct sun. <strong>what should I do?</strong></p>', '2020-11-19 15:44:31'),
(38, NULL, NULL, 'gssgvvsg', '<p>svv</p>', '2020-11-27 09:22:25'),
(39, NULL, NULL, 'mil', '<p>sczac</p>', '2020-11-27 09:26:03'),
(40, NULL, NULL, 'gsrg', '<p>avadgv</p>', '2020-11-27 09:27:56'),
(41, NULL, NULL, 'sdv v v', '<p>vvvv</p>', '2020-11-27 09:28:43'),
(42, NULL, NULL, 'avadaavavv', '<p>vfdavad</p>', '2020-11-27 09:33:35'),
(43, NULL, NULL, 'fff', '<p>ffff</p>', '2020-11-27 09:34:52'),
(44, NULL, NULL, 'Google Certified Digital Marketing', '<p>Bhyduas</p>', '2020-12-02 06:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `author` varchar(30) NOT NULL,
  `content` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `author`, `content`, `timestamp`) VALUES
(1, 'mil', 'panda', '2020-10-07 23:06:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `admin` int(4) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`, `created`) VALUES
(1, 0, 'guest', 'email@gmail.com', 'hey', '2020-11-19 11:32:50'),
(3, 0, 'guest2', 'guest2@gmail.com', 'hey', '2020-11-19 11:45:27'),
(6, 0, 'mil', 'example@gmail.com', 'hey', '2020-11-19 20:40:10'),
(7, 0, '1710N21009', 'kogo@getnada.com', 'hey', '2020-12-02 07:03:47'),
(8, 0, 'deadxgo', 'das@dsa.com', 'hey', '2020-12-02 13:40:04'),
(9, 0, '3232', 'sdas@das.ocm', '$2y$10$R96ExuvmxWG6vn/DeedNU.wUaoNNCJbgk/GkPC2.SBsbDtrglOiOe', '2020-12-02 13:41:01'),
(10, 0, 'olym', 'loym@gmail.com', '$2y$10$/UHKqko3bCfI3ghbU8g8oOTD1LuH1jZVJ3xFMYBcTh.I.k876/WFu', '2020-12-02 13:43:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogpost`
--
ALTER TABLE `blogpost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forumpost`
--
ALTER TABLE `forumpost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forumpost_ibfk_2` (`comment_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogpost`
--
ALTER TABLE `blogpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `forumpost`
--
ALTER TABLE `forumpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forumpost`
--
ALTER TABLE `forumpost`
  ADD CONSTRAINT `forumpost_ibfk_2` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
