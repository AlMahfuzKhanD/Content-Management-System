-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2020 at 08:36 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `catId` int(3) NOT NULL,
  `catTitle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`catId`, `catTitle`) VALUES
(1, 'bootstrap'),
(3, 'test'),
(4, 'ddd'),
(5, 'sssxxx'),
(6, 'dd');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` int(3) NOT NULL,
  `commentPostId` int(3) NOT NULL,
  `commentAuthor` varchar(255) NOT NULL,
  `commentEmail` varchar(255) NOT NULL,
  `commentContent` text NOT NULL,
  `commentStatus` varchar(255) NOT NULL,
  `commentDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentId`, `commentPostId`, `commentAuthor`, `commentEmail`, `commentContent`, `commentStatus`, `commentDate`) VALUES
(1, 4, 'Mahfuz', 'dd@gmail.com', 'this is comment', 'Denied', '2020-04-02'),
(2, 4, 'john', 'cc@gg.com', 'this is comment', 'Approved', '2020-04-02'),
(3, 4, 'author', 'author@author.com', 'check chek', 'Approved', '2020-04-02'),
(4, 4, 'author', 'author@author.com', 'check chek', 'Approved', '2020-04-02'),
(5, 4, 'comment count check', 'dd@gmail.com', 'comment count check', 'Denied', '2020-04-02'),
(6, 4, 'Mahfuz', 'cc@gg.com', 'check again', 'Denied', '2020-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postId` int(3) NOT NULL,
  `postCatagoryId` int(3) NOT NULL,
  `postTitle` varchar(255) NOT NULL,
  `postAuthor` varchar(255) NOT NULL,
  `postDate` date NOT NULL,
  `postImage` text NOT NULL,
  `postContent` text NOT NULL,
  `postTags` varchar(255) NOT NULL,
  `postCommentCount` int(11) NOT NULL,
  `postStatus` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postId`, `postCatagoryId`, `postTitle`, `postAuthor`, `postDate`, `postImage`, `postContent`, `postTags`, `postCommentCount`, `postStatus`) VALUES
(4, 1, 'title', 'author', '2020-04-05', 'Jellyfish.jpg', 'ddddddddddddddddddddddddd', 'tags', 6, 'published'),
(5, 1, 'new post', 'author', '2020-04-05', 'Hydrangeas.jpg', 'new post check', 'java, php', 0, 'published'),
(6, 1, 'title', 'me', '2020-04-07', 'image_1.jpg', '<p>ljlaj asjsdlf lk al l ala lallfj a vvvvvvvvvvvvvvvvvvvvvvvvv vvvvvvvvvvvvvvvvvvv dddddddddddddddddddddd ssssssssssssssssss aaaaaaaaaaaaa</p>', 'java', 0, 'published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(3) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userFirstName` varchar(255) NOT NULL,
  `userLastName` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userImage` text NOT NULL,
  `userRole` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL,
  `userStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userPassword`, `userFirstName`, `userLastName`, `userEmail`, `userImage`, `userRole`, `randSalt`, `userStatus`) VALUES
(3, 'padeka', 'sadeka', 'mahfuzedit', 'khan', 'sadekau@kaua.com', '', 'Subscriber', '', 'Denied'),
(4, 'mahfuz1', '11111', 'mahfuz12', 'khan', 'sadekau@kaua.com', '', 'Admin', '', 'Denied'),
(5, 'mahfuz380', '123', 'Al', 'khan', 'a@a.com', '', 'Admin', '', 'Denied'),
(6, 'edwindiaz', '12345', 'adwin', 'diaz', 'ediwn@edwin.com', '', 'Admin', '', 'Denied');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `catId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
