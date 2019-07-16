-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2019 at 11:57 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `Cid` int(11) NOT NULL,
  `Cname` varchar(25) NOT NULL,
  `Cstatus` tinyint(1) NOT NULL COMMENT '1-->Active,0-->Deactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`Cid`, `Cname`, `Cstatus`) VALUES
(1, 'DNK Technologies Private ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Eid` int(11) NOT NULL,
  `Ename` varchar(30) NOT NULL,
  `Egender` tinyint(1) NOT NULL COMMENT '1-->Male,2-->Female,3-->Other',
  `Edob` date NOT NULL,
  `Edesignation` varchar(20) NOT NULL,
  `Epost` varchar(20) NOT NULL,
  `Ehobby` varchar(30) NOT NULL,
  `Eemail` varchar(25) NOT NULL,
  `Emobile` varchar(12) NOT NULL,
  `Epassword` varchar(50) NOT NULL,
  `Ephoto` text NOT NULL,
  `Eaddress` varchar(30) NOT NULL,
  `Equalification` varchar(20) NOT NULL,
  `Eexperience` tinyint(2) NOT NULL,
  `Ejoindate` date NOT NULL,
  `Ejoinletter` varchar(50) NOT NULL,
  `Edateregister` datetime NOT NULL,
  `Eupdatedate` datetime NOT NULL,
  `Estatus` tinyint(1) NOT NULL COMMENT '1-->Active,0-->Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Eid`, `Ename`, `Egender`, `Edob`, `Edesignation`, `Epost`, `Ehobby`, `Eemail`, `Emobile`, `Epassword`, `Ephoto`, `Eaddress`, `Equalification`, `Eexperience`, `Ejoindate`, `Ejoinletter`, `Edateregister`, `Eupdatedate`, `Estatus`) VALUES
(1, 'Dhiraj', 1, '1997-06-03', 'Team Member', '', 'Reading,Music', 'dhiraj@gmail.com', '9874563211', '202cb962ac59075b964b07152d234b70', 'c6f6ec4b2b7f5aa0f210a5d24fa5c91c.png', 'dindoli', 'Graduation', 0, '0000-00-00', '', '2019-07-03 15:35:06', '2019-07-08 17:46:30', 1),
(2, 'aroma', 2, '1995-02-05', 'Team Member', '', 'Reading,Music', 'roma@gmail.com', '9874563210', '250cf8b51c773f3f8dc8b4be867a9a02', '5531dd0a795481ff0bf54e5e85c0d5f4.jpg', 'mota varachha', 'Graduation', 3, '0000-00-00', '', '2019-07-03 15:36:20', '2019-07-04 17:19:48', 1),
(3, 'sanjay', 1, '2008-01-01', 'Team Member', '', 'Reading,Writing', 'sanjay@gmail.com', '7894563210', '8d5e957f297893487bd98fa830fa6413', 'acf2693d987857301663957868dd0a40.png', 'athwaline,surat', '10+2th', 2, '0000-00-00', '', '2019-07-03 15:36:21', '2019-07-04 11:43:21', 0),
(4, 'roma', 2, '1995-02-05', 'Team Member', '', 'Music', 'roma@gmail.com', '9874563210', '4122cb13c7a474c1976c9706ae36521d', '6f273156b8a9b34bce6cb45c7ce31a27.jpg', 'mota varachha', 'Graduation', 2, '0000-00-00', '', '2019-07-03 13:49:25', '2019-07-04 11:44:13', 1),
(5, 'radhu', 2, '2015-09-16', 'Manager', '', 'Music', 'radhu@gmail.com', '9875241630', 'eb23e02b4c6f081c9a87c61f154324aa', 'ee7d07c98491c16a9779357877174e93.jpg', 'rajkot,gujarat', '10th', 12, '0000-00-00', '', '2019-07-03 13:49:29', '2019-07-04 11:44:54', 0),
(6, 'rahul ', 1, '2015-09-16', 'Manager', '', 'Reading,Music', 'radhu@gmail.com', '9875241630', '4a7d1ed414474e4033ac29ccb8653d9b', '357302c90e5695e5bd3f4a179a33d9b1.jpg', 'rajkot,gujarat', 'Graduation', 10, '0000-00-00', '', '2019-07-03 13:49:33', '2019-07-04 11:45:50', 1),
(7, 'Roshan', 1, '1995-02-05', 'Team Leader', '', 'Music', 'roshan@gmail.com', '9874563210', '202cb962ac59075b964b07152d234b70', '8aebb051a8b99ffd3afee30eef3d7312.jpg', 'mota varachha', 'Post Graduation', 10, '0000-00-00', '', '2019-07-03 13:49:37', '2019-07-04 11:46:20', 0),
(8, 'borse rahul', 1, '2019-07-01', 'Team Member', '', 'Reading', 'rahulb@gmail.com', '9030456789', '68053af2923e00204c3ca7c6a3150cf7', 'bde41aab8469393fa1e38ab73311a19d.jpg', 'abc, surat', '10th', 1, '0000-00-00', '', '2019-07-03 13:49:41', '2019-07-04 11:59:49', 1),
(9, 'virat', 1, '2019-06-01', 'Team Leader', '', 'Reading,Music', 'virat@gmail.com', '9561230789', 'd67ac35a9a6be831e5b6562765de83a3', 'a6334aba45b6f95524bd38411d2e6a16.png', 'xyz, surat', '10+2th', 5, '0000-00-00', '', '2019-07-03 13:49:45', '2019-07-04 11:58:52', 1),
(10, 'om', 1, '2000-11-02', 'Clark', '', 'Writing', 'om@gmail.com', '7845120369', 'e8d672860174085d43be53a7d76a75ce', 'fb37c922ae7d1e5c08e29c1380ac03ff.jpg', 'kapodar,utran,surat', '10+2th', 3, '0000-00-00', '', '2019-07-03 15:36:16', '2019-07-04 11:47:32', 1),
(11, 'Shani', 1, '1993-02-05', 'Manager', '', 'Reading,Writing', 'shani@gmail.com', '9874563215', '7812e8b74f6837fba66f86fe86688a2b', '242d58d3e8f60bf7bb4c7fd2283f6fea.jpg', 'kapodar,mota varachha,surat', 'Post Graduation', 4, '0000-00-00', '', '2019-07-03 13:49:56', '2019-07-04 11:48:25', 1),
(12, 'hema', 2, '1993-05-01', 'Team Leader', '', 'Writing,Music', 'hema@gmail.com', '7896544569', '68053af2923e00204c3ca7c6a3150cf7', 'e0fe402cd4ea6cff0c9ead2a5dfbc68d.gif', 'absdbnbb', '10+2th', 5, '0000-00-00', '', '2019-07-03 13:50:00', '2019-07-04 11:48:40', 0),
(13, 'mala', 2, '1990-12-31', 'Manager', '', 'Reading,Music', 'mala@gmail.com', '6789654123', '66421bf507347e6172724796d232a4a3', 'a8aca1bf99a15f4b67c08a0364412275.png', 'abc\r\n', 'Graduation', 3, '0000-00-00', '', '2019-07-03 13:50:05', '2019-07-04 11:49:05', 1),
(14, 'sandip', 1, '1995-01-07', 'Team Leader', '', 'Reading', 'sandip@gmail.com', '7896547896', '68053af2923e00204c3ca7c6a3150cf7', '1afe3d8814f153e9c04dcc52ec74f821.png', 'surat', 'Graduation', 3, '0000-00-00', '', '2019-07-03 13:50:10', '2019-07-04 11:51:05', 0),
(15, 'rima', 2, '1992-12-31', 'Manager', '', 'Writing', 'rima@gmail.com', '7894564789', '1816ac0b4bf213b0cfaacd48b6127f12', 'b9de638afd24eb8fdc3dd7aac9991072.jpg', 'rajkot', '10+2th', 4, '0000-00-00', '', '2019-07-03 13:50:15', '2019-07-04 11:51:50', 0),
(16, 'ritesh', 1, '1994-04-25', 'Team Leader', '', 'Reading,Writing', 'ritesh@gmail.com', '6987452310', '1dc90e80c77fe245a82ea7ed30d1f849', 'e46be6c2f784176ebe29f1816050f4da.jpg', 'vapi', 'Post Graduation', 1, '0000-00-00', '', '2019-07-03 13:50:19', '2019-07-04 11:52:11', 1),
(17, 'abc', 3, '1996-12-01', 'Clark', '', 'Music', 'abc@gmail.com', '7896541237', '900150983cd24fb0d6963f7d28e17f72', '6a5de10cba98f1e2484854ddb9835966.png', 'abc', '10th', 3, '0000-00-00', '', '2019-07-03 13:50:23', '2019-07-04 11:52:41', 1),
(18, 'sem', 1, '1994-01-20', 'Team Leader', '', 'Reading', 'sem@gmail.com', '6987452130', '4f33240ba7980fc5cca191079b7a1ba6', '1eedfa1159cca3ec2a3bdbce5de3ac42.jpg', 'narsari,surat', 'Graduation', 1, '0000-00-00', '', '2019-07-03 13:50:26', '2019-07-04 11:53:07', 1),
(19, 'kriti', 2, '1991-12-05', 'Team Member', '', 'Reading', 'kriti@gmail.com', '7896541230', '1d430d0a0757ca4b16a57dbc5c436353', 'c1ba411b368acff17c0d6d8c1061acd7.jpg', 'gandhinagar,gujarat', 'Post Graduation', 2, '0000-00-00', '', '2019-07-03 13:50:30', '2019-07-04 11:53:25', 0),
(20, 'xyz', 3, '1991-01-31', 'Team Leader', '', 'Music', 'xyz@gmail.com', '8787898563', 'd16fb36f0911f878998c136191af705e', 'b24ff8060afa05327d29d32c6e5515d1.png', 'surat', '10th', 2, '0000-00-00', '', '2019-07-03 13:50:35', '2019-07-04 11:53:41', 1),
(21, 'margish', 1, '1996-01-01', 'Team Member', '', 'Writing', 'margish@gmail.com', '7899877894', '3f127e427edb040494757b3d02b0e601', '990356db8842bacb7ee42edbcc9f2d49.jpg', 'udhana darwaja,surat', 'Graduation', 2, '0000-00-00', '', '2019-07-03 14:53:10', '2019-07-04 11:54:04', 1),
(22, 'rohan', 1, '1989-01-18', 'Manager', '', 'Writing,Music', 'rohan@gmail.com', '9874564569', 'e193a6b40e6b1e88aa4f46903be81d9c', '5aa94c324fc8d4d417dda64241b72ab5.png', 'Surat', 'Post Graduation', 15, '0000-00-00', '', '2019-07-03 13:52:51', '2019-07-04 11:54:23', 0),
(23, 'vivek', 1, '1997-05-12', 'Team Member', '', 'Reading,Writing,Music', 'vivek@gmail.com', '7869789654', '81dc9bdb52d04dc20036dbd8313ed055', '3430b9ddbd11fc636be3b511898841bd.png', 'Godadara,surat', 'Graduation', 0, '0000-00-00', '', '2019-07-03 13:56:06', '2019-07-04 12:21:32', 0),
(24, 'Uma joshi', 2, '1991-03-01', 'Clark', '', 'Writing,Music', 'uma@gmail.com', '9874560564', '6ee61b071ef1119e9761e3a8954df314', '2f516813d67acd5dbc9df4c08e163958.jpg', 'katar-gam,surat', '10th', 2, '0000-00-00', '', '2019-07-03 14:03:15', '2019-07-04 11:55:08', 1),
(27, 'Dhiraj maurya', 1, '1997-03-04', 'Team Member', '', 'Reading,Music', 'dhiraj@gmail.com', '9874563210', '81dc9bdb52d04dc20036dbd8313ed055', 'c8096c226d57048371ba4ac9e257853f.png', 'Dindoli,surat\r\n', 'Graduation', 0, '0000-00-00', '', '2019-07-03 16:02:37', '2019-07-04 11:55:42', 1),
(28, 'chandrakant', 1, '1970-01-01', 'Team Member', '', 'Music', 'chandu@gmail.com', '9784563210', 'd41d8cd98f00b204e9800998ecf8427e', 'd46e01dcd49d4e6f813381fa4db7bc07.png', 'udhna,surat', 'Graduation', 1, '0000-00-00', '', '2019-07-05 11:37:21', '2019-07-06 17:12:52', 1),
(29, 'Alexa', 2, '2019-10-16', 'Team Leader', '', 'Reading,Music', 'alexa_anderson@gmail.com', '9874563210', '277f2a7ecb7cfcd264aeb2067fb46df8', '088e2485841eae5f2a87c365b18bcad7.png', 'Oval , England', 'Post Graduation', 2, '0000-00-00', '', '2019-07-05 12:30:11', '2019-07-13 10:44:50', 1),
(30, 'abcd', 1, '1970-01-10', 'Clark', '', 'Reading', 'abcd@gmail.com', '9874563210', '4122cb13c7a474c1976c9706ae36521d', '495c464916258ab3ef22c97599a69be2.png', 'akjhdj', '10th', 0, '0000-00-00', '', '2019-07-05 15:20:28', '2019-07-10 10:21:41', 1),
(32, 'daskj', 3, '2018-03-28', 'Team Leader', '', 'Reading', 'as@gmail.com', '7896541230', '4122cb13c7a474c1976c9706ae36521d', '072c80698c0acf20c2f4b9bcfca8cd5c.png', 'dskjh', '10th', 0, '0000-00-00', '', '2019-07-05 16:30:42', '2019-07-05 16:36:06', 0),
(33, 'dsads', 1, '2018-07-05', 'Clark', '', 'Reading', 'as@gmail.com', '7896541230', '202cb962ac59075b964b07152d234b70', '7c7a20d244e6b34e84b5678c1848ea0e.png', 'dffsf', '10+2th', 0, '0000-00-00', '', '2019-07-05 16:37:44', '2019-07-05 17:00:54', 1),
(35, 'mr das', 1, '1985-01-07', 'Manager', '', 'Reading', 'dasg@gmail.com', '9874563210', '4122cb13c7a474c1976c9706ae36521d', '2a05dde09e01883e966c46be0eea018b.png', 'kahkh', '10th', 12, '0000-00-00', '', '2019-07-05 18:33:17', '2019-07-08 14:09:10', 0),
(36, 'fahim', 1, '1995-06-07', 'Team Leader', '', 'Reading', 'fahim@gmail.com', '6789541230', '202cb962ac59075b964b07152d234b70', 'c3ffed1cc67ddec9246858618814c622.jpg', 'sachin,surat', 'Graduation', 1, '0000-00-00', '', '2019-07-06 12:03:29', '2019-07-06 17:40:46', 1),
(37, 'hitesh desai', 1, '2019-10-07', 'Team Leader', '', 'Reading,Writing,Music', 'hiteshji@gmail.com', '9874563200', '202cb962ac59075b964b07152d234b70', '67e2d32b3f14567f69a94afea573051b.jpg', 'mota varachha,surat,gujarat', 'Post Graduation', 5, '0000-00-00', '', '2019-07-08 11:17:20', '2019-07-11 10:55:40', 1),
(40, 'Asha swani', 2, '1993-02-02', 'Team Member', 'Graphics Designer', 'Reading,Writing', 'asha@gmail.com', '7896541230', '4122cb13c7a474c1976c9706ae36521d', '1682b80a9ddd972193528a58e3989e8c.png', 'kadodara,surat', 'Graduation', 2, '2019-07-15', 'Asha swani_11-07-2019.pdf', '2019-07-11 12:10:54', '0000-00-00 00:00:00', 0),
(42, 'Martin', 1, '2019-02-01', 'Team Leader', 'Graphics Designer', 'Reading,Music', 'martin_k@gmail.com', '9874563210', '925d7518fc597af0e43f5606f9a51512', '88a2b3d51d4c28bb2239411a54329549.png', 'Brisban.', '10+2th', 2, '2019-07-12', 'Martin_11-07-2019.pdf', '2019-07-11 12:32:49', '2019-07-16 14:06:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `Permid` int(11) NOT NULL,
  `Permdesc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`Permid`, `Permdesc`) VALUES
(1, 'emp_view'),
(3, 'emp_insert'),
(4, 'emp_update'),
(5, 'emp_delete'),
(7, 'admin_list'),
(8, 'admin_insert'),
(9, 'admin_delete'),
(10, 'admin_update'),
(11, 'view_permission'),
(12, 'view_roles');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `Roleid` int(11) NOT NULL,
  `Rolename` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`Roleid`, `Rolename`) VALUES
(2, 'Admin'),
(4, 'Employee'),
(5, 'Marketing'),
(6, 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `Uid` int(11) NOT NULL,
  `Uusername` varchar(15) NOT NULL,
  `Uname` varchar(20) NOT NULL,
  `Ugender` tinyint(1) NOT NULL COMMENT '1-->Male,2-->Female',
  `Uphoto` text NOT NULL,
  `Uemail` varchar(25) NOT NULL,
  `Umobile` varchar(12) NOT NULL,
  `Upassword` varchar(50) NOT NULL,
  `Roleid` int(11) NOT NULL,
  `Uregisterdate` datetime NOT NULL,
  `Umodifydate` datetime NOT NULL,
  `Ustatus` tinyint(1) NOT NULL COMMENT '1-->Active,0-->Deactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`Uid`, `Uusername`, `Uname`, `Ugender`, `Uphoto`, `Uemail`, `Umobile`, `Upassword`, `Roleid`, `Uregisterdate`, `Umodifydate`, `Ustatus`) VALUES
(29, 'dhiraj123', 'Dhiraj', 1, '82bb8508aef978087bdb71a6b10c703c.png', 'dhiraj@gmail.com', '9874563210', '4122cb13c7a474c1976c9706ae36521d', 2, '2019-07-16 14:26:06', '2019-07-16 14:26:06', 1),
(32, 'jay12', 'jayesh', 1, '3282b9e2860c575ac8ceda53ac752340.png', 'jay@gmail.com', '9874563210', '4122cb13c7a474c1976c9706ae36521d', 4, '2019-07-16 09:59:47', '2019-07-16 09:59:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_perm`
--

CREATE TABLE `user_perm` (
  `Uid` int(11) NOT NULL,
  `Permid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_perm`
--

INSERT INTO `user_perm` (`Uid`, `Permid`) VALUES
(29, 1),
(29, 3),
(29, 4),
(29, 5),
(29, 7),
(29, 8),
(29, 9),
(29, 10),
(29, 11),
(29, 12),
(32, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`Cid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Eid`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`Permid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`Roleid`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`Uid`),
  ADD KEY `Roleid` (`Roleid`),
  ADD KEY `Roleid_2` (`Roleid`);

--
-- Indexes for table `user_perm`
--
ALTER TABLE `user_perm`
  ADD KEY `Rid` (`Uid`,`Permid`),
  ADD KEY `Permid` (`Permid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `Cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `Permid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `Roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `Uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_login`
--
ALTER TABLE `user_login`
  ADD CONSTRAINT `user_login_ibfk_1` FOREIGN KEY (`Roleid`) REFERENCES `role` (`Roleid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_perm`
--
ALTER TABLE `user_perm`
  ADD CONSTRAINT `user_perm_ibfk_2` FOREIGN KEY (`Permid`) REFERENCES `permission` (`Permid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_perm_ibfk_3` FOREIGN KEY (`Uid`) REFERENCES `user_login` (`Uid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
