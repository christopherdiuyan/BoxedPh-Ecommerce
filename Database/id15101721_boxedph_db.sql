-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 25, 2020 at 10:30 AM
-- Server version: 10.2.31-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id15101721_boxedph_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

USE id15101721_boxedph_db;

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_country` text NOT NULL,
  `admin_about` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_country`, `admin_about`, `admin_contact`, `admin_job`) VALUES
(5, 'Christopher', 'christopher.diuyan@gmail.com', 'admin', 'IMG_4913.JPG', 'Philippines', 'Charming', '09567107194', 'Programmer'),
(6, 'Shamee', 'shamyvi15@gmail.com', 'Psalms5522', 'F1794E40-268D-4367-8386-4D939FC2A010_1_201_a.jpeg', 'Philippines', ' ', '0919-003-7510', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `boxes_section`
--

CREATE TABLE `boxes_section` (
  `box_id` int(10) NOT NULL,
  `box_title` text NOT NULL,
  `box_img` text NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boxes_section`
--

INSERT INTO `boxes_section` (`box_id`, `box_title`, `box_img`, `cat_id`) VALUES
(8, 'Ribbon', 'rib3.jpg', 2),
(10, '   Cards   ', 'c8.jpg', 5),
(11, ' Boxes', 'b4.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `c_id` int(11) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`c_id`, `p_id`, `ip_add`, `qty`, `Date`) VALUES
(15, 57, '152.32.100.108', 1, '2020-04-25 10:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_top` text NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_top`, `cat_image`) VALUES
(1, 'Lasercut Items', 'yes', 'men.jpg'),
(2, 'Ribbons', 'yes', 'Ribbons.png'),
(5, 'Cards', 'yes', 'Pocketfold Invites.png'),
(6, 'Boxes', 'yes', 'Calligraphy.png'),
(7, 'Printing Services', 'no', '');

-- --------------------------------------------------------

--
-- Table structure for table `comment_section`
--

CREATE TABLE `comment_section` (
  `user__id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `user_comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_u_id` bigint(20) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_img` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_dateofbirth` date NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_u_id`, `customer_name`, `customer_img`, `customer_contact`, `customer_address`, `customer_dateofbirth`, `customer_email`, `customer_pass`, `customer_ip`) VALUES
(15, 3420051682089277, 'Shameena Ivy Rendon', 'F1794E40-268D-4367-8386-4D939FC2A010_1_201_a.jpeg', '09190037510', '#96 Unang Hakbang St. Galas Quezon City', '2000-01-27', 'shamyvi15@gmail.com', '$2y$10$plfnvpb47bkyaBo9hz2VG.eLT5TifUm0LacVp5fboN0aCo8WiJX5y', '152.32.100.108'),
(17, 123, 'Christopher', 'default_profile.png', '123', '123', '2020-04-02', 'customer@gmail.com', '1234', '123'),
(18, 4364002808302975, 'Tjayce', 'IMG_5194 - Copy.JPG', '123123', '12312332zxc', '2020-03-30', 'customer2@gmail.com', '$2y$10$4EZXmMxPu.jd3vePDC0p1ul9IVUdCS65sqybskO.1Yk1Sap8hVc2m', '110.93.94.53'),
(19, 6780301163595794, 'John', 'default_profile.png', 'Uwuw', 'Haha', '2020-04-15', 'samplemobile@gmail.com', '$2y$10$7vxl8MXIVscq2Q.7gdlWGORwFSq4mIFpQ35SDO9coxLf0Rpep64IK', '110.93.94.53'),
(20, 9482959671563654, 'Magnifiko', 'default_profile.png', '0981238869234', 'Rizal', '2020-03-29', 'customer3@gmail.com', '$2y$10$W5YpPFWZ8fiXQPohtDLyieozofRFmPx.4b544SSKt3Ken5kbvW1rq', '110.93.94.173'),
(22, 1538945602678303, 'a', 'logo.png', '1', 'q', '2020-04-17', 'admin@gmail.com', '$2y$10$qbJptJymFt.MuBt7G4qr.OD/BfaWr.z252gKqh1jVIFc6cbijXA/O', '110.93.94.173'),
(23, 8942082403190631, 'Ivy Rendon', '9A64C8CF-9585-4145-9811-1780FF789BDA.jpeg', '09190037510', '#96 - Unang Hakbang St. Galas Quezon City', '2000-01-27', 'shamyvi5@gmail.com', '$2y$10$2typxGAbOt8ihi.Xznzv0.Q4XwpUvGgHiEXMit/.YNBrryLhRhFFK', '152.32.100.108');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(20) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(1, 17, 5, 1005756795, 1, '', '2020-04-22', 'Completed'),
(2, 17, 10, 119339276, 2, '', '2020-04-22', 'Order Processing'),
(3, 17, 5, 480708612, 1, '', '2020-04-22', 'Ready for Pickup'),
(4, 23, 10, 1826838974, 2, '', '2020-04-22', 'Completed'),
(11, 18, 10, 1739793651, 2, '', '2020-04-24', 'Completed'),
(12, 18, 5, 254205640, 1, '', '2020-04-24', 'Ready for Pickup'),
(13, 23, 5, 697275920, 1, '', '2020-04-24', 'Ready for Pickup'),
(14, 23, 5, 1573457674, 1, '', '2020-04-24', 'Order Processing'),
(15, 23, 5, 1573457674, 1, '', '2020-04-24', 'Order Processing'),
(16, 23, 5, 1573457674, 1, '', '2020-04-24', 'Order Processing'),
(17, 18, 52, 1104485006, 1, '', '2020-04-24', 'Order Processing'),
(18, 18, 55, 1104485006, 1, '', '2020-04-24', 'Order Processing'),
(19, 18, 55, 1104485006, 1, '', '2020-04-24', 'Order Processing'),
(20, 18, 500, 1104485006, 1, '', '2020-04-24', 'Order Processing'),
(21, 18, 900, 1104485006, 1, '', '2020-04-24', 'Order Processing'),
(22, 18, 65, 1104485006, 1, '', '2020-04-24', 'Order Processing'),
(23, 18, 5, 1104485006, 1, '', '2020-04-24', 'Order Processing'),
(24, 18, 5, 1104485006, 1, '', '2020-04-24', 'Order Processing'),
(25, 23, 10, 1285582600, 1, '', '2020-04-24', 'Order Placed'),
(26, 18, 10, 679477337, 2, '', '2020-04-25', 'Order Placed'),
(27, 23, 5, 2103376362, 1, '', '2020-04-25', 'Order Placed');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `email_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`email_id`, `email`) VALUES
(15, 'shamyvi15@gmail.com'),
(16, 'shamyvi15@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(10) NOT NULL,
  `event_img` text NOT NULL,
  `event_date` date NOT NULL,
  `event_title` text NOT NULL,
  `event_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_img`, `event_date`, `event_title`, `event_desc`) VALUES
(5, 'event1.jpg', '2020-03-09', 'Happy Sunday', '<p>What a lovely smile together with our beloved customers.</p>'),
(6, 'event2.jpg', '2020-03-02', 'The Lived Experience of Climate Change', '<p>Thinking about a talk on climate change might give rise to visions of dry scientific fact presented in a stark lecture hall. This event dispels that notion by spelling out that it will be a &lsquo;lived experience&rsquo; of climate change i.e. it will tell the true stories of the people affected.</p>'),
(8, 'event3.jpg', '2020-03-05', 'The Gathering Event', '<p>Free lasercuts and Cards To Our Beloved Customers.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inquiry_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`inquiry_id`, `name`, `email`, `message`) VALUES
(2, 'Shameena Ivy Rendon', 'shamyvi15@gmail.com', 'Test message');

-- --------------------------------------------------------

--
-- Table structure for table `instagram_section`
--

CREATE TABLE `instagram_section` (
  `instagram_photo_id` int(10) NOT NULL,
  `instagram_name` text NOT NULL,
  `instagram_img` text NOT NULL,
  `instagram_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instagram_section`
--

INSERT INTO `instagram_section` (`instagram_photo_id`, `instagram_name`, `instagram_img`, `instagram_url`) VALUES
(13, 'another s           ', 'c5.jpg', 'https://www.instagram.com/p/B75v_Azn8Nn/'),
(15, 'Pocketfold Invites x Gold Theme x Belly band x Monogram Seal', 'c10.jpg', 'https://www.instagram.com/p/B75tqjmnoos/'),
(16, 'Ribbon', 'c9.jpg', 'https://www.instagram.com/p/B721z37Hglp/'),
(18, 'Blush Pink Pocketfold Cover x Glittered Gold Backboard x Belly band x Monogram Seal x Pink Foil Stamp', 'c7.jpg', 'https://www.instagram.com/p/Bt5ulPGFQvt/?igshid=1crprkkkz5hgi'),
(20, '2', 'c4.jpg', 'https://www.instagram.com/p/Bt5ulPGFQvt/?igshid=1crprkkkz5hgi'),
(21, '3', 'c1.jpg', 'https://www.instagram.com/p/Bt5ulPGFQvt/?igshid=1crprkkkz5hgi');

-- --------------------------------------------------------

--
-- Table structure for table `mcomments`
--

CREATE TABLE `mcomments` (
  `mc_id` int(11) NOT NULL,
  `mc_text` text NOT NULL,
  `mc_u_uni_id` bigint(20) NOT NULL,
  `mc_p_uni_id` bigint(20) NOT NULL,
  `mc_date` date NOT NULL,
  `mc_uni_no` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mcomments`
--

INSERT INTO `mcomments` (`mc_id`, `mc_text`, `mc_u_uni_id`, `mc_p_uni_id`, `mc_date`, `mc_uni_no`) VALUES
(7, 'qewqwe', 8372738740174945, 57, '2020-04-18', 1730836159709668),
(8, 'qweqweqwe', 8372738740174945, 57, '2020-04-18', 3564153303591975),
(9, 'try', 8372738740174945, 57, '2020-04-18', 2008286952375014),
(10, 'try', 8372738740174945, 57, '2020-04-18', 5426916989632553),
(11, 'dadadad', 8372738740174945, 57, '2020-04-19', 3669939834403456),
(12, 'asdasdas', 8372738740174945, 57, '2020-04-19', 3546688467096844),
(13, 'zxczxczxc', 8372738740174945, 57, '2020-04-19', 8018799060701275),
(14, '321321', 8372738740174945, 57, '2020-04-19', 1697092582470956),
(15, 'kjhkjh', 8372738740174945, 57, '2020-04-19', 5542160872248551),
(16, 'asdasdasd', 8372738740174945, 57, '2020-04-19', 9447591191760724),
(17, 'new commenttttt', 8372738740174945, 57, '2020-04-19', 7812446852581779),
(18, 'asd', 8372738740174945, 57, '2020-04-19', 8937599573787544),
(19, 'new comment', 8372738740174945, 57, '2020-04-19', 4493678626152096),
(20, 'isa pa', 8372738740174945, 57, '2020-04-19', 2810071980791051),
(21, 'ano po materials gamit dito?', 8372738740174945, 21, '2020-04-19', 3705743632629537),
(22, 'ano po materials gamit dito?', 8372738740174945, 21, '2020-04-19', 2938925724925319),
(23, 'ay ba\'t doble?', 8372738740174945, 21, '2020-04-19', 1059216458551196),
(24, '2', 8372738740174945, 22, '2020-04-19', 4268379886657008),
(26, 'ewew', 6780301163595794, 19, '2020-04-19', 4236543744692682),
(27, 'try comment', 6780301163595794, 60, '2020-04-19', 7901101867098373),
(28, 'sparta me!', 8372738740174945, 77, '2020-04-20', 7167030837761396),
(29, 'Wow This is Great!', 8372738740174945, 76, '2020-04-21', 5830870005456618),
(30, 'Wow This is Great!', 8372738740174945, 76, '2020-04-21', 2221226613890876),
(31, 'cool', 8372738740174945, 13, '2020-04-21', 5286581067583698),
(32, 'may color pink po ba nito?', 8372738740174945, 77, '2020-04-21', 7593423327131095),
(33, 'Is this available?', 3420051682089277, 58, '2020-04-21', 3630113740938285),
(34, 'test comment', 8942082403190631, 70, '2020-04-23', 6967375621586373),
(35, 'ok', 4364002808302975, 77, '2020-04-25', 7524998310366875),
(36, 'ok', 4364002808302975, 77, '2020-04-25', 3458737972169480),
(37, 'po?', 4364002808302975, 69, '2020-04-25', 8844278242747218),
(38, 'Is this available for bulk order?', 3420051682089277, 52, '2020-04-25', 7754934834942296);

-- --------------------------------------------------------

--
-- Table structure for table `mscomments`
--

CREATE TABLE `mscomments` (
  `msc_id` int(11) NOT NULL,
  `msc_u_uni_no` bigint(20) NOT NULL,
  `msc_mc_uni_no` bigint(20) NOT NULL,
  `msc_text` text NOT NULL,
  `msc_date` date NOT NULL,
  `msc_uni_no` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mscomments`
--

INSERT INTO `mscomments` (`msc_id`, `msc_u_uni_no`, `msc_mc_uni_no`, `msc_text`, `msc_date`, `msc_uni_no`) VALUES
(1, 328759437979450, 6152377143222299, 'hello', '2020-01-03', 1600977469323957),
(2, 185472960356631, 6152377143222299, 'new user', '2020-01-03', 9439281300571061),
(3, 185472960356631, 6152377143222299, 'new', '2020-01-03', 3568391085383643),
(4, 185472960356631, 4265418624157873, 'OK', '2020-01-03', 7721599478048163),
(5, 869287089555991, 6804428898795681, 'hey', '2020-01-03', 1652348666945418),
(6, 8372738740174945, 1730836159709668, 'qweqwe', '2020-04-18', 9909001377976280),
(7, 8372738740174945, 3564153303591975, 'wowwww', '2020-04-18', 3828072158260814),
(8, 8372738740174945, 3564153303591975, 'wowwww', '2020-04-18', 3413709610039740),
(9, 8372738740174945, 2008286952375014, 'oki', '2020-04-18', 1349700568107047),
(10, 8372738740174945, 2008286952375014, 'tagal magsend', '2020-04-18', 2714663127697821),
(11, 8372738740174945, 2008286952375014, 'zxczxczxc', '2020-04-19', 2601433334811189),
(12, 8372738740174945, 1730836159709668, 'asdasd', '2020-04-19', 2134644397696972),
(13, 8372738740174945, 1730836159709668, 'zxczxczxczxc', '2020-04-19', 9041372102939792),
(14, 8372738740174945, 1730836159709668, 'asdasdasd', '2020-04-19', 2404040361043102),
(15, 8372738740174945, 1730836159709668, 'zxczxczcdas', '2020-04-19', 5664841394430665),
(16, 8372738740174945, 1730836159709668, '123123123123123123', '2020-04-19', 4795033997046269),
(17, 8372738740174945, 1730836159709668, 'asdasd', '2020-04-19', 2520202066233588),
(18, 8372738740174945, 1730836159709668, 'agagagag', '2020-04-19', 7473123720022859),
(19, 8372738740174945, 7812446852581779, 'this is Cool!', '2020-04-19', 7854875244141202),
(20, 8372738740174945, 7812446852581779, 'sad', '2020-04-19', 5839914432704955),
(21, 8372738740174945, 7812446852581779, 'sad', '2020-04-19', 4205666234073119),
(22, 8372738740174945, 7812446852581779, 'sad', '2020-04-19', 8290218674797507),
(23, 8372738740174945, 7812446852581779, 'sad', '2020-04-19', 5737405623027418),
(24, 8372738740174945, 7812446852581779, 'sad', '2020-04-19', 7515366927927333),
(25, 8372738740174945, 7812446852581779, 'sad', '2020-04-19', 7595500035517418),
(26, 8372738740174945, 7812446852581779, 'sad', '2020-04-19', 9132102581032090),
(27, 8372738740174945, 7812446852581779, 'sad', '2020-04-19', 4657801171798722),
(28, 8372738740174945, 7812446852581779, 'sad', '2020-04-19', 4088225704131571),
(29, 8372738740174945, 7812446852581779, 'sad', '2020-04-19', 6892849550939959),
(30, 8372738740174945, 7812446852581779, 'sad', '2020-04-19', 3222816023079541),
(31, 8372738740174945, 7812446852581779, 'sad', '2020-04-19', 2678151396132633),
(32, 8372738740174945, 7812446852581779, 'sad', '2020-04-19', 3042955882746568),
(33, 8372738740174945, 7812446852581779, 'sad', '2020-04-19', 8742024263079769),
(34, 8372738740174945, 7812446852581779, 'sad', '2020-04-19', 4238060373356037),
(35, 8372738740174945, 7812446852581779, 'sad', '2020-04-19', 2264450769612026),
(36, 8372738740174945, 7812446852581779, 'sad', '2020-04-19', 5767833287891437),
(37, 8372738740174945, 7812446852581779, 'awitt', '2020-04-19', 6932928524185431),
(38, 8372738740174945, 7812446852581779, 'nice 1', '2020-04-19', 5462072704946579),
(39, 8372738740174945, 7812446852581779, 'qweqweqw', '2020-04-19', 7997088214165497),
(40, 8372738740174945, 7812446852581779, 'efefef', '2020-04-19', 3140950405689400),
(41, 8372738740174945, 7812446852581779, 'wew', '2020-04-19', 5572023839585820),
(42, 8372738740174945, 7812446852581779, 'wert', '2020-04-19', 1225000649600107),
(43, 8372738740174945, 7812446852581779, 'weewwwww', '2020-04-19', 3371199146110966),
(44, 8372738740174945, 7812446852581779, 'poio', '2020-04-19', 7476037028086047),
(45, 8372738740174945, 7812446852581779, 'try', '2020-04-19', 1763909160347589),
(46, 8372738740174945, 7812446852581779, 'gege', '2020-04-19', 6560463647467712),
(47, 8372738740174945, 7812446852581779, 'sege', '2020-04-19', 6493541086798892),
(48, 8372738740174945, 7812446852581779, 'jk', '2020-04-19', 4854566067515112),
(49, 8372738740174945, 7812446852581779, 'ww', '2020-04-19', 8006721278526835),
(50, 8372738740174945, 7812446852581779, 'we', '2020-04-19', 1627401350227424),
(51, 8372738740174945, 7812446852581779, 'ff', '2020-04-19', 9243881349235007),
(52, 8372738740174945, 7812446852581779, 'oo', '2020-04-19', 2232123054564871),
(53, 8372738740174945, 8937599573787544, 'ngre', '2020-04-19', 7256113988898051),
(54, 8372738740174945, 8937599573787544, 'asd', '2020-04-19', 4376565599514902),
(55, 8372738740174945, 8937599573787544, 'we', '2020-04-19', 3142792871188830),
(56, 8372738740174945, 8937599573787544, 'sd', '2020-04-19', 5815849606335934),
(57, 8372738740174945, 8937599573787544, 'we', '2020-04-19', 2401207443575075),
(58, 8372738740174945, 4493678626152096, 'new reply', '2020-04-19', 4516251839119284),
(59, 8372738740174945, 2810071980791051, 'woww gnalenggg', '2020-04-19', 2478696401730769),
(60, 8372738740174945, 2938925724925319, 'magbasa ka po.', '2020-04-19', 6993876842814598),
(61, 6780301163595794, 7901101867098373, 'ngeyk', '2020-04-19', 3168725057105315),
(62, 8372738740174945, 7873384872345247, 'really?', '2020-04-20', 1711263683224577),
(63, 8372738740174945, 7873384872345247, 'sige push mo lang', '2020-04-20', 7182424366935007),
(64, 8372738740174945, 7873384872345247, 'sad', '2020-04-20', 8682598675144033),
(65, 8372738740174945, 7167030837761396, 'me batman', '2020-04-20', 9564794114920995),
(66, 8372738740174945, 7873384872345247, 'weh', '2020-04-21', 8586779905937186),
(67, 8372738740174945, 7873384872345247, 'weh', '2020-04-21', 1966469365727014),
(68, 8372738740174945, 7873384872345247, 'weh', '2020-04-21', 1477175088452305),
(69, 8372738740174945, 7873384872345247, 'weh', '2020-04-21', 5146812705606476),
(70, 8372738740174945, 7873384872345247, 'wew', '2020-04-21', 5887160149794592),
(71, 8372738740174945, 7873384872345247, 'wew', '2020-04-21', 2700581977521921),
(72, 8372738740174945, 2221226613890876, 'You Sure?', '2020-04-21', 5914501824643475),
(73, 8372738740174945, 2221226613890876, 'You Sure?', '2020-04-21', 7962383150417818),
(74, 8372738740174945, 2221226613890876, 'Yes Of Course!', '2020-04-21', 4463777413720478),
(75, 8372738740174945, 2221226613890876, 'Yes Of Course!', '2020-04-21', 7226444385447265),
(76, 8372738740174945, 5286581067583698, 'di nga?', '2020-04-21', 1431668720789759),
(77, 8372738740174945, 5286581067583698, 'wowww', '2020-04-21', 1451046685285829),
(78, 3420051682089277, 3630113740938285, 'Di ko alam kung available pa', '2020-04-21', 5302760251513504),
(79, 8372738740174945, 3630113740938285, 'Pasabay po ako dalawa.', '2020-04-21', 9190827041708141),
(80, 4364002808302975, 6967375621586373, 'I MISS YOU!', '2020-04-23', 5427091238615559),
(81, 4364002808302975, 7754934834942296, 'Oo ata sis', '2020-04-25', 9700226677008398);

-- --------------------------------------------------------

--
-- Table structure for table `partnership_cover`
--

CREATE TABLE `partnership_cover` (
  `partnership_id` int(11) NOT NULL,
  `partnership_title` text NOT NULL,
  `partnership_img` text NOT NULL,
  `partnership_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partnership_cover`
--

INSERT INTO `partnership_cover` (`partnership_id`, `partnership_title`, `partnership_img`, `partnership_desc`) VALUES
(1, 'We are Connected', 'logo.png', '<p>A layout artist collects and assembles type styles and images, such as illustrations, photographs and drawings, to create a visual design in a computer or on paper. The layout artist is one of several types of commercial artists known as graphic designers who deliver ideas and information through visual communications.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `partnership_section`
--

CREATE TABLE `partnership_section` (
  `layout_artist_id` int(10) NOT NULL,
  `layout_artist_name` text NOT NULL,
  `layout_artist_img` text NOT NULL,
  `layout_artist_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partnership_section`
--

INSERT INTO `partnership_section` (`layout_artist_id`, `layout_artist_name`, `layout_artist_img`, `layout_artist_url`) VALUES
(22, 'Sheemaybee Artworks', 'sheemaybee.jpg', 'https://www.facebook.com/sheemaybeeartworks/?__xts__[0]=68.ARCuOA1hC9OU8YgbhoK4jDvw0NuNKZRzn904AYBH1o9WGetlJVseVSix-01el6EYG7BRuSr4BCKxt2Yu8EVosxkOAns7MnYgFH0q20b2n2DP0peXl9vXXyF3h7bWUxcj64NI8nDV-5evajX0yVrLwjZPD4thm0-7pfr_KFGrT6NhAPXyRNxJReDCGeAd6ujb8CLkD__pfMaKhgYPxkpkT5TorTwdsTWFTwdkPJb_rrlVqv55EUpVi7-XfvXdGzkfoNTZGmm81yHY'),
(23, 'JerrymeeRamirez', 'jerrymeeramirez.jpg', 'https://www.facebook.com/layoutartist1234/?hc_ref=ARRhrRbNlqQjq3M73v_UIkyz-oM2s6DlhQ6tGl5K2L9O-7xxMLBa87NXoWFbipL8yQI&ref=nf_target&__xts__[0]=68.ARDMfP6NmHHDSjroqETpiNJLUWrGd87VBkfXzrRTXdZ3PVPY0l-CjOYDcZ0YccpU0OvPQFcoUqW8ORTxOPSS1ABWIF73QhXgPmMATmJPBMkPY5sUbP-kx_Bi5RlJzTy7tn_jZPGDD-XvBryxmV1AdiPtud8nkpghAAQUn5yiQLdjniLxaiNs6zzsPg9Yv49Dnkx7_HLKBd-kRDpgehYQ-onvKApR0hvJjIxrmQjECnh2EN0nWsTYal5Gcuj2qVrnj_Rbyx7_XqU9&__tn__=kC-R'),
(24, 'Papeldelights', 'Papeldelights.jpg', 'https://www.facebook.com/papeldelightsdesignstudio/');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(6, 206863956, 10, 'Western Union', 123123, 321321, '02-09-2019'),
(7, 1231231, 1313, 'Back Code', 123132, 123123, '123123'),
(8, 123, 200, 'Western Union', 321321, 321, 'khg'),
(9, 678, 200, 'Back Code', 678, 678, '678');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(20) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(1, 17, 1005756795, '75', 1, '', 'Completed'),
(2, 17, 119339276, '77', 2, '', 'Order Processing'),
(3, 17, 480708612, '72', 1, '', 'Ready for Pickup'),
(4, 23, 1826838974, '77', 2, '', 'Completed'),
(11, 18, 1739793651, '77', 2, '', 'Completed'),
(12, 18, 254205640, '70', 1, '', 'Ready for Pickup'),
(13, 23, 697275920, '75', 1, '', 'Ready for Pickup'),
(14, 23, 1573457674, '73', 1, '', 'Order Processing'),
(15, 23, 1573457674, '74', 1, '', 'Order Placed'),
(16, 23, 1573457674, '77', 1, '', 'Order Placed'),
(17, 18, 1104485006, '46', 1, '', 'Order Processing'),
(18, 18, 1104485006, '50', 1, '', 'Order Placed'),
(19, 18, 1104485006, '51', 1, '', 'Order Placed'),
(20, 18, 1104485006, '55', 1, '', 'Order Placed'),
(21, 18, 1104485006, '57', 1, '', 'Order Placed'),
(22, 18, 1104485006, '64', 1, '', 'Order Placed'),
(23, 18, 1104485006, '72', 1, '', 'Order Placed'),
(24, 18, 1104485006, '73', 1, '', 'Order Placed'),
(25, 23, 1285582600, '54', 1, '', 'Order Placed'),
(26, 18, 679477337, '75', 2, '', 'Order Placed'),
(27, 23, 2103376362, '77', 1, '', 'Order Placed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `sku` text NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_category` varchar(45) NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_color` text NOT NULL,
  `product_size` text NOT NULL,
  `product_material` text NOT NULL,
  `product_stocks` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `sku`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_category`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_color`, `product_size`, `product_material`, `product_stocks`, `product_desc`, `product_keywords`) VALUES
(5, 'RCUNYXC5F8W7ML6', 5, 5, '2020-04-24 21:11:09', 'test', 'Customized Lasercut Invites', 'c1.jpg', 'c1.jpg', 'c1.jpg', 75, 'red', '2 x 2cm', 'Paper', 20, '<p>Maganda at Affordable</p>', 'Maganda'),
(6, 'QIXCXD6G86X4BKI', 5, 5, '2020-04-24 21:11:23', 'test1', 'Customized Lasercut Invites', 'c5.jpg', 'c5.jpg', 'c5.jpg', 65, 'Any Color', '2 x 2cm', 'Paper', 4, '<p>Maganda at Affordable</p>', 'asd'),
(8, 'DA7DXJ0HA4P7PMI', 5, 1, '2020-04-16 04:42:35', 'JM-I001', 'ENVELOPE', 'c7.jpg', 'c1.jpg', 'c5.jpg', 66, 'Any Color', '2 x 2cm', 'Paper', 0, '<p>Maganda at Affordable</p>', 'Mura at mapapamura ka'),
(9, 'F9ZDS8E3AMONJVX', 5, 5, '2020-04-16 04:42:38', 'add ako', 'ENVELOPE', 'Origami.jpg', 'Grommet Invites.jpg', 'Ink Scribbler Layout Templates (Classic Suites).png', 300, 'Any Color', '2 x 2cm', 'Paper', 0, '<p>Maganda at Affordable</p>', 'mahal'),
(13, '8XIU0B7ZGQ86CPU', 5, 2, '2020-04-25 03:36:49', 'image in database 4', 'Customized Lasercut Invites', 'lassercut14.jpg', 'lassercut10.jpg', 'lassercut12.jpg\r\n', 53, 'red', '2 x 2cm', 'Papel', 30, '<p>Maganda at Affordable</p>', 'mahal'),
(14, 'IMV5BK4LPSRR6R5', 4, 2, '2020-04-25 03:35:17', 'image in database 2', 'Customized Lasercut Invites', 'c5.jpg', 'lassercut5.jpg', 'c1.jpg', 78, 'yellow', '2 x 2cm', 'Papel', 0, '<p>Maganda at Affordable</p>', 'mahal'),
(15, 'OAHJSD8213ASD2', 3, 6, '2020-04-16 04:19:15', 'image in database 3', 'Chipboard boxes', '20190704_103008.jpg', 'Papeldelights Layout Templates.png', 'man-large.jpg', 32, 'yellow', '2 x 2cm', 'paper', 0, '<p>Maganda at Affordable</p>', 'sdasd'),
(19, '10LOJASDA923JKL', 1, 1, '2020-04-25 03:38:13', 'try edit', 'Customized Lasercut Invites', '	\r\nlassercut9.jpg', 'lasercut2.jpg', 'lassercut13.jpg', 53, 'red', '2 x 2cm', 'paper', 30, '<p>Maganda at Affordable</p>', 'sdasd'),
(20, 'KASHD1567KJBAS2', 1, 6, '2020-04-24 21:10:47', 'try edit 2', 'ENVELOPE', '20190703_135339.jpg', '20190703_135339.jpg', '20190703_135339.jpg', 53, 'asdf', '2 x 2cm', 'paper', 0, '<p>Maganda at Affordable</p>', 'sdasd'),
(21, 'T7VTMZ7OJ6X0Z2P', 3, 1, '2020-04-25 03:39:20', 'image in database sku', 'Chipboard boxes', 'PhotoGrid_1567060675685.jpg', 'giftbox1.jpg', 'white chipboard 3.jpg', 56, 'Any Color', '56', '56', 56, '<p>Maganda at Affordable</p>', '56'),
(22, 'SUAD0TK1R3XDSGQ', 3, 2, '2020-04-16 04:19:15', 'sku sample', 'Chipboard boxes', '20190704_102604.jpg', '20190703_135339.jpg', '20190704_102604.jpg', 76, 'red', '2 x 2cm', 'paper', 33, '<p>Maganda at Affordable</p>', 'mahal'),
(30, 'VDK2OWRKOPF62M2', 2, 2, '2020-04-25 03:31:16', 'Baby Stroller Candy Box', 'Customized Lasercut Invites', 'lassercut5.jpg', 'lassercut7.jpg', 'lassercut16.jpg', 80, 'Yellow, Pink, Blue', '2', 'candy box', 20, '<p>Maganda at Affordable</p>', 'stroller candy box'),
(31, 'TIKWQH068AWPNJ4', 2, 6, '2020-04-25 03:24:34', 'Heart-Imprint Candy Box', 'Candy Boxes', 'candybox5.jpg', '	\r\ncandybox2.jpg', 'candybox7.jpg', 70, 'Blue, Pink, Red, Orange, Yellow, Purple', '3x3', 'candy box', 34, '<p>Maganda at Affordable</p>', 'heart candy box'),
(32, 'IEL2CMWKV9IV3Q2', 2, 6, '2020-04-25 03:22:09', 'Heart-Imprint Candy Box', 'Candy Boxes', 'candybox7.jpg', 'candybox4.jpg\r\n', 'candybox8.jpg', 75, 'Black, White', '3x3', '', 28, '<p>Maganda at Affordable</p>', 'bride candy box'),
(33, 'X2IO2DC4SDZLJTE', 2, 6, '2020-04-25 03:22:12', 'Footprint Candy Box ', 'Candy Boxes', 'candybox8.jpg', 'candybox7.jpg', 'candybox4.jpg\r\n', 65, 'Blue, Green, Pink, Purple', '3x3', 'candy box', 12, '<p>Maganda at Affordable</p>', 'footprint candy box'),
(34, 'TM5IFMQ17WBHUWC', 2, 6, '2020-04-25 03:21:45', 'Baby Stroller-Imprint Candy Box', 'Candy Boxes', 'candybox6.jpg', 'candybox9.jpg\r\n', 'candybox3.jpg', 65, 'Pink, Purple, Green, Blue', '3x3', 'candy box', 23, '<p>Maganda at Affordable</p>', 'baby stroller candy box'),
(35, 'IQIM1QQ5VMESFVG', 2, 6, '2020-04-25 03:21:39', 'Chair Candy Box', 'Candy Boxes', 'candybox9.jpg\r\n', 'candybox3.jpg', 'candybox6.jpg', 20, 'Gold, Grey', '3x3', 'candy box', 16, '<p>Maganda at Affordable</p>', 'chair candy box'),
(36, 'QQSBWB6HG04WN6W', 3, 6, '2020-04-25 03:55:55', 'Gold Chipboard Box ', 'Chipboard boxes', 'LogoLicious_20191002_141829.png', 'LogoLicious_20191002_141925.png\r\n', 'LogoLicious_20191002_141811.png', 80, 'Gold ', '10x10', 'chipboard', 30, '<p>Maganda at Affordable</p>', 'gold chipboard'),
(37, '39FD0DL3CO5SKU4', 3, 6, '2020-04-25 03:55:38', 'Navy Blue Chipboard Box', 'Chipboard boxes', 'PhotoGrid_1567060675685.jpg', 'LogoLicious_20191002_141811.png', 'PhotoGrid_1567060693121.jpg', 100, 'Navy Blue', '10x10', 'chipboard', 29, '<p>Maganda at Affordable</p>', 'navy blue chipboard '),
(38, 'OFKGBVN2YUOZAPZ', 3, 6, '2020-04-25 03:55:32', 'Customized Chipboard Box ', 'Chipboard boxes', 'LogoLicious_20191002_141811.png', 'PhotoGrid_1567060675685.jpg', 'PhotoGrid_1567060693121.jpg', 800, 'Black', '20x20', 'chipboard', 9, '<p>Maganda at Affordable</p>', 'customized chipboard'),
(39, '3JD71L9M1CMBP7X', 2, 6, '2020-04-25 06:50:56', 'Tower Candy Box', 'Candy Boxes', 'candybox3.jpg', 'candybox6.jpg', 'candybox9.jpg\r\n', 20, 'Red, Navy Blue, Reflective Violet', '3x3', 'candy box', 23, '<p>Maganda at Affordable</p>', 'tower candy box'),
(40, '4A1OPYX2O5SIQB8', 3, 6, '2020-04-25 03:50:38', 'Customized Chipboard Box 2 ', 'Chipboard boxes', 'PhotoGrid_1567061512000.jpg', 'PhotoGrid_1567060666720.jpg', 'PhotoGrid_1567060675685.jpg', 1500, 'Black ', '20x20', 'chipboard', 25, '<p>Maganda at Affordable</p>', 'wedding chipboard'),
(41, '02NUHACMNI7M56C', 3, 6, '2020-04-25 03:50:41', 'Customized Chipboard Box 3 ', 'Chipboard boxes', 'PhotoGrid_1567060675685.jpg', 'PhotoGrid_1567060666720.jpg', 'PhotoGrid_1567061512000.jpg', 1700, 'White', '25x25', 'chipboard', 11, '<p>Maganda at Affordable</p>', 'white customized chipboard'),
(42, 'DIJ8GOSCTVSK64H', 4, 1, '2020-04-16 04:35:33', 'Lasercut Invites 1', 'Customized Lasercut Invites', 'lassercut1.jpg', 'lassercut2.jpg', 'lassercut3.jpg', 55, 'Purple, Sky Blue, Navy Blue', '12x18', 'lasercut', 23, '<p>Maganda at Affordable</p>', 'lasercut'),
(43, '5TY2SP8I4O8IQ4N', 4, 1, '2020-04-24 12:04:34', 'Customized Lasercut Invites', 'Customized Lasercut Invites', 'lassercut4.jpg', 'lassercut5.jpg', 'lassercut6.jpg', 60, 'Blue, Gold, Pink ', '12x18', 'lasercut', 15, '<p>Maganda at Affordable</p>', 'customize lasercut '),
(44, 'H3P8IGKU1NXPFNU', 4, 1, '2020-04-16 04:35:40', 'Lasercut Invites 2 ', 'Customized Lasercut Invites', 'lassercut7.jpg', 'lassercut8.jpg', 'lassercut9.jpg', 65, 'Pink, Purple, Gold', '12x18', 'lasercut', 50, '<p>Maganda at Affordable</p>', 'customize lasercut '),
(45, 'VXZEUP0WOKXE0LG', 4, 1, '2020-04-16 04:35:45', 'Lasercut Invites 3', 'Customized Lasercut Invites', 'lassercut10.jpg', 'lassercut11.jpg', 'lassercut12.jpg', 70, 'Beige, Blue, Pink ', '12x18', 'lasercut', 30, '<p>Maganda at Affordable</p>', 'customize lasercut '),
(46, 'WD3Q4AH9LZJ4AW3', 4, 1, '2020-04-16 04:35:49', 'Lasercut Invites 4', 'Customized Lasercut Invites', 'lassercut13.jpg', 'lassercut14.jpg', 'lassercut15.jpg', 52, 'Blue, White, Green ', '5x5', 'lasercut', 12, '<p>Maganda at Affordable</p>', 'customize lasercut '),
(47, 'PZZEX53J5QX1252', 4, 1, '2020-04-16 04:35:53', 'Lasercut Invites 5', 'Customized Lasercut Invites', 'lassercut16.jpg', 'lassercut17.jpg', 'lassercut18.jpg', 52, 'Red, Blue, Pink', '10x10', 'lasercut', 14, '<p>Maganda at Affordable</p>', 'customize lasercut '),
(48, 'HN7UYAOZOUYE09Q', 4, 1, '2020-04-16 04:35:57', 'Lasercut Invites 6', 'Customized Lasercut Invites', 'lasercut1.jpg', 'lasercut2.jpg', 'lasercut3.jpg', 60, 'Purple, Gold, White', '5x5 ', 'lasercut', 10, '<p>Maganda at Affordable</p>', 'customize lasercut '),
(49, 'CNVTOU8LOJDD2IK', 4, 1, '2020-04-16 04:36:04', 'Lasercut Invites 7 ', 'Customized Lasercut Invites', 'lasercut4.jpg', 'lasercut5.jpg', 'lasercut6.jpg', 60, 'Blue, Pink, White, Gray ', '5x5 ', 'lasercut', 15, '<p>Maganda at Affordable</p>', 'customize lasercut '),
(50, '0OQUTIFQCNO65QR', 4, 1, '2020-04-24 20:55:23', 'Lasercut Invites 7 ', 'Customized Lasercut Invites', 'lasercut7.jpg', 'lasercut8.jpg', 'lasercut9.jpg', 55, 'Pink, Red, Gold ', '5x5 ', 'lasercut', 17, '<p>Maganda at Affordable</p>', 'customize lasercut '),
(51, '0SEALGGEAE56J6A', 4, 1, '2020-04-24 20:55:23', 'Lasercut Invites 8', 'Customized Lasercut Invites', 'lasercut10.jpg', 'lasercut11.jpg', 'lasercut12.jpg', 55, 'Gray, Red, White', '5x5 ', 'lasercut', 19, '<p>Maganda at Affordable</p>', 'customize lasercut '),
(52, 'A52GHG3SYZYRCEJ', 2, 6, '2020-04-16 04:36:21', 'Butterfly Candy Box', 'Candy Boxes', 'candybox1.jpg', 'candybox2.jpg', 'candybox3.jpg', 10, 'gold, white, pink ', '3x3', 'candy box', 18, '<p>Maganda at Affordable</p>', 'candy box'),
(53, 'Z2J10TNDR8FVO0G', 2, 1, '2020-04-16 04:36:25', 'Character Candy Box', 'Candy Boxes', 'candybox4.jpg', 'candybox5.jpg', 'candybox6.jpg', 10, 'Pink ', '3x3', 'candy box', 10, '<p>Maganda at Affordable</p>', 'candy box'),
(54, 'UCTZ3QQ73KSIYKG', 2, 6, '2020-04-24 21:02:22', 'Newly-Weds Candy Box', 'Candy Boxes', 'candybox7.jpg', 'candybox8.jpg', 'candybox9.jpg', 10, 'gold, white', '3x3 ', 'candy box', 9, '<p>Maganda at Affordable</p>', 'candy box'),
(55, 'QJUWUO5SDPY3N86', 3, 6, '2020-04-24 20:55:23', 'Gift Box', 'Chipboard boxes', 'giftbox1.jpg', 'giftbox2.jpg', 'giftbox3.jpg', 500, 'Grey', '20x20', 'chipboard', 29, '<p>Maganda at Affordable</p>', 'gift box'),
(56, 'CJPBSK89JN894J2', 3, 1, '2020-04-16 04:36:36', 'Monica Acrylic Box', 'Chipboard boxes', 'LogoLicious_20191002_141925.png', 'LogoLicious_20191002_141829.png', 'LogoLicious_20191002_141811.png', 1800, 'black, white', '10x10', 'chipboard', 13, '<p>Maganda at Affordable</p>', 'acrylic box'),
(57, 'H502ASV3KLHFKJG', 3, 6, '2020-04-24 20:55:23', 'Necktie Box', 'Chipboard boxes', 'PhotoGrid_1567061521803.jpg', 'PhotoGrid_1567061512000.jpg', 'PhotoGrid_1567061505228.jpg', 900, 'black, white', '16x20', 'chipboard', 26, '<p>Maganda at Affordable</p>', 'necktie box'),
(58, 'SXKG8YBCM0WNYZM', 3, 6, '2020-04-24 12:38:13', 'Kraft Box', 'Chipboard boxes', 'PhotoGrid_1567060693121.jpg', 'PhotoGrid_1567060675685.jpg', 'PhotoGrid_1567060666720.jpg', 900, 'Pink, Purple, Green, Blue', '20x20', 'chipboard', 23, '<p>Maganda at Affordable</p>', 'kraft box'),
(59, 'M0O7AJOOFFOCJ0C', 3, 6, '2020-04-24 12:10:02', 'Chinese Gift Box', 'Chipboard boxes', 'chinese1.jpg', 'chinese2.jpg', 'chinese3.jpg', 1700, 'gold, red', '20x20', 'chipboard', 19, '<p>Maganda at Affordable</p>', 'chinese gift box'),
(60, 'TGEI50NP3K3M3CN', 1, 5, '2020-04-16 04:37:07', 'Inner Cards', '  Calligraphy', 'innercard1.jpg', 'innercard2.jpg', 'innercard3.jpg', 70, 'any color', '3x3', 'card', 20, '<p>Maganda at Affordable</p>', 'inner cards'),
(61, '5IM3XOH5TKG1NYC', 1, 5, '2020-04-16 04:37:12', 'Inner Cards ', '  Calligraphy', 'innercard4.jpg', 'innercard5.jpg', 'innercard6.jpg', 70, 'any color', '3x3', 'card', 40, '<p>Maganda at Affordable</p>', 'inner cards'),
(62, '7CS6HA7Y0WS12OX', 1, 5, '2020-04-16 04:37:20', 'Inner Cards ', '  Calligraphy', 'innercard7.jpg', 'innercard8.jpg', 'innercard9.jpg', 65, 'any color', '3x3', 'card', 20, '<p>Maganda at Affordable</p>', 'inner cards'),
(63, '60T0R7QHK3SQA4R', 1, 5, '2020-04-16 04:37:25', 'Designed Inner Cards ', '  Calligraphy', 'innercard10.jpg', 'innercard11.jpg', 'innercard12.jpg', 65, 'any color', '3x5 ', 'card', 18, '<p>Maganda at Affordable</p>', 'inner cards'),
(64, '915KNQJYD4ZRYL3', 1, 5, '2020-04-24 20:55:23', 'Inner Cards ', '  Calligraphy', 'innercard13.jpg', 'innercard14.jpg', 'innercard15.jpg', 65, 'any color', '5x5 ', 'card', 13, '<p>Maganda at Affordable</p>', 'inner cards'),
(65, 'DV60H90LTAXTK9Y', 1, 5, '2020-04-25 03:04:00', 'Calligraphy 1 ', '  Calligraphy', 'ribbon3.jpg', 'ribbon7.jpg\r\n', 'ribbon4.jpg\r\n', 5, 'any color', '10x10', 'paper/invitations/cards', 1, '<p>Maganda at Affordable</p>', 'calligraphy'),
(66, '2S14PK4KEFXDZCF', 1, 5, '2020-04-25 03:03:20', 'Calligraphy 2', '  Calligraphy', 'ribbon8.jpg\r\n', 'ribbons.jpg', 'ribbon5.jpg', 5, 'any color', '1', 'paper/invitations/cards', 1, '<p>Maganda at Affordable</p>', 'calligraphy'),
(67, '613NJKMREEHXS7K', 1, 5, '2020-04-25 03:03:00', 'Calligraphy 3', '  Calligraphy', 'ribbon7.jpg\r\n', 'ribbon6.jpg\r\n', 'ribbon4.jpg', 5, 'any color', '1', 'paper/invitations/cards', 1, '<p>Maganda at Affordable</p>', 'calligraphy'),
(68, 'X2253NCOS3XPCN5', 1, 5, '2020-04-25 03:02:37', 'Calligraphy 4', '  Calligraphy', 'ribbon1.jpg', 'ribbon3.jpg', 'ribbons.jpg', 5, 'any color', '1', 'paper/invitations/cards', 1, '<p>Maganda at Affordable</p>', 'calligraphy'),
(69, 'BF442LP4VME3XAM', 1, 5, '2020-04-25 03:01:40', 'Calligraphy 5', '  Calligraphy', 'customize3.jpg', 'customize2.jpg', 'customize6.jpg', 5, 'any color', '1', 'paper/invitations/cards', 1, '<p>Maganda at Affordable</p>', 'calligraphy'),
(70, 'VAUEUWWQZISTJ2C', 1, 2, '2020-04-24 14:30:41', 'Ribbons', '  Calligraphy', 'ribbon1.jpg', 'ribbons.jpg', 'ribbons.jpg', 5, 'any color', '30', 'ribbons', 11, '<p>Maganda at Affordable</p>', 'ribbons'),
(71, 'LIPMJ9KNMSB2Z7G', 1, 2, '2020-04-16 04:38:18', 'Ribbons', '  Calligraphy', 'ribbon2.jpg', 'ribbon3.jpg', 'ribbons.jpg', 5, 'any color', '30', 'ribbons', 10, '<p>Maganda at Affordable</p>', 'ribbons'),
(72, 'LHP78BPQN8MG06S', 1, 2, '2020-04-25 06:50:56', 'Ribbons', '  Calligraphy', 'ribbon3.jpg', 'ribbon4.jpg', 'ribbons.jpg', 5, 'any color', '30', 'ribbons', 16, '<p>Maganda at Affordable</p>', 'ribbons'),
(73, 'X3YVNTWOTHXAAL9', 1, 2, '2020-04-24 20:02:21', 'Ribbons', '  Calligraphy', 'ribbon5.jpg', 'ribbon6.jpg', 'ribbons.jpg', 5, 'any color', '30', 'ribbons', 19, '<p>Maganda at Affordable</p>', 'ribbons'),
(74, 'D4THIRDUVL0MN6V', 1, 2, '2020-04-24 20:02:21', 'Ribbons', '  Calligraphy', 'ribbon7.jpg', 'ribbon8.jpg', 'ribbons.jpg', 5, 'any color', '30', 'ribbons', 18, '<p>Maganda at Affordable</p>', 'ribbons'),
(75, 'ZA44C8VF7DLI985', 1, 2, '2020-04-25 06:21:14', 'Customized Ribbon', '  Calligraphy', 'customize1.jpg', 'customize2.jpg', 'customize6.jpg', 5, 'any color', '30', 'ribbons', 2, '<p>Maganda at Affordable</p>', 'ribbons'),
(76, 'PTE3GNWX0HNUXYK', 1, 2, '2020-04-25 02:54:41', 'Customized Ribbon', '  Calligraphy', 'customize3.jpg', 'customize4.jpg', 'customize6.jpg', 5, 'any color', '30', 'ribbons', 11, '<p>Maganda at Affordable</p>', 'customized ribbons'),
(77, 'A0YSZ6QN4PFJU2S', 1, 2, '2020-04-25 06:46:29', 'Customized Ribbon', '  Calligraphy', 'customize5.jpg', 'customize6.jpg', 'customize6.jpg', 5, 'any color', '30', 'ribbons', 4, '<p>Maganda at Affordable</p>', 'customized ribbons');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_top` text NOT NULL,
  `p_cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_top`, `p_cat_image`) VALUES
(1, '  Calligraphy', 'yes', 'Calligraphy.png'),
(2, 'Candy Boxes', 'no', 'Candy Boxes.png'),
(3, 'Chipboard boxes', 'no', 'Chipboard_boxes.png'),
(4, 'Customized Lasercut Invites', 'yes', 'lasercut.png');

-- --------------------------------------------------------

--
-- Table structure for table `review_comments`
--

CREATE TABLE `review_comments` (
  `mc_id` int(11) NOT NULL,
  `mc_text` text NOT NULL,
  `mc_u_uni_id` bigint(20) NOT NULL,
  `mc_p_uni_id` bigint(20) NOT NULL,
  `mc_date` date NOT NULL,
  `mc_uni_no` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review_comments`
--

INSERT INTO `review_comments` (`mc_id`, `mc_text`, `mc_u_uni_id`, `mc_p_uni_id`, `mc_date`, `mc_uni_no`) VALUES
(27, 'try comment', 6780301163595794, 21, '2020-04-19', 7901101867098373),
(28, 'this is sparta!', 8372738740174945, 77, '2020-04-20', 7873384872345247),
(29, 'meow', 8372738740174945, 76, '2020-04-21', 5907666620527559),
(30, '123', 8372738740174945, 13, '2020-04-21', 3966795945698479),
(31, 'Ang Ganda!', 3420051682089277, 75, '2020-04-25', 1954989238864049),
(32, 'This Product is So Cheap!', 3420051682089277, 77, '2020-04-25', 6286200474197612);

-- --------------------------------------------------------

--
-- Table structure for table `review_rep_comments`
--

CREATE TABLE `review_rep_comments` (
  `msc_id` int(11) NOT NULL,
  `msc_u_uni_no` bigint(20) NOT NULL,
  `msc_mc_uni_no` bigint(20) NOT NULL,
  `msc_text` text NOT NULL,
  `msc_date` date NOT NULL,
  `msc_uni_no` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings_about_us`
--

CREATE TABLE `settings_about_us` (
  `about_us_id` int(11) NOT NULL,
  `about_us_history_date` text NOT NULL,
  `about_us_desc` text NOT NULL,
  `about_us_image` text NOT NULL,
  `about_us_quote` text NOT NULL,
  `about_us_quote_author` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings_about_us`
--

INSERT INTO `settings_about_us` (`about_us_id`, `about_us_history_date`, `about_us_desc`, `about_us_image`, `about_us_quote`, `about_us_quote_author`) VALUES
(1, 'September 01, 2016', '', 'about_image.jpg', '', 'Steven Jobs'),
(2, 'September 01, 2016', 'It started in 2016 as a home-based business endeavor. I, a full-time government employee back then, had just given birth to our first child. Wanting to be a hands-on mother without having to give up my earning potential, I thought of opening an online business that I could manage from home.<br><br>\r\n                            My inspiration came from my own experience of planning our wedding. I wanted our wedding souvenirs to come in small, cute boxes. However, there was nothing sort of that being offered in the local market at the time. So, I made the decision that I would be selling favor boxes. Hence, Boxed PH was born.<br><br>\r\n                            We originally planned to package lasercut souvenir boxes with wedding invitations. Not so long after, our clients became more inclined to ordering lasercut invitations instead. Couples were thrilled by the fact that they could customize the color and design of their lasercut invitation covers. Up to this day, Boxed PH\'s biggest sale is from these lasercut covers, and we are visioning to be one of the biggest supplier of ready-made and lasercut invites in the country. We hope that you will be among the satisfied customers we have served.', 'about_image.jpg', '“ Technology is nothing. What\'s important is that you have a faith in people, that\r\n                                they\'re basically good and smart, and if you give them tools, they\'ll do wonderful\r\n                                things with them.”', 'Steven Jobs');

-- --------------------------------------------------------

--
-- Table structure for table `settings_about_us_picture_section`
--

CREATE TABLE `settings_about_us_picture_section` (
  `picture_id` int(11) NOT NULL,
  `picture` text NOT NULL,
  `picture_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings_faqs`
--

CREATE TABLE `settings_faqs` (
  `faq_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings_faqs`
--

INSERT INTO `settings_faqs` (`faq_id`, `question`, `answer`) VALUES
(1, 'asd', '<p>asd</p>'),
(2, 'What is Popular right now?', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>'),
(3, 'Where Can I Find Your Shop?', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Magbasa ka nandiyan na sa page namin.&nbsp;</p>'),
(4, 'HOW CAN I CHANGE MY SHIPPING ADDRESS?', '<p>By default, the last used shipping address will be saved into to your Sample Store account. When you are checking out your order, the default shipping address will be displayed and you have the option to amend it if you need to.</p>'),
(5, 'HOW DO I ACTIVATE MY ACCOUNT?', '<p>The instructions to activate your account will be sent to your email once you have submitted the registration form. If you did not receive this email, your email service provider&rsquo;s mailing software may be blocking it. You can try checking your junk / spam folder or contact us at help@samplestore.com</p>'),
(6, 'WHY IS THERE A CHECKOUT LIMIT? / WHAT ARE ALL THE CHECKOUT LIMITS?', '<p>Sample Store is a popular spot and gets lots of shoppers at a time. These limits are in place to make sure everyone has a good time trying and purchasing their products. So... - Each member is entitled to only one (1) sample order every day. - Each member is entitled to one (1) bundle of sample for each product. - Your account must have sufficient points before you can checkout the sample products. - Kindly clear all pending payments before another checkout.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `settings_footer`
--

CREATE TABLE `settings_footer` (
  `footer_id` int(11) NOT NULL,
  `footer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings_footer`
--

INSERT INTO `settings_footer` (`footer_id`, `footer`) VALUES
(1, '<p>&copy; 2020 BoxedPh | All Rights Reserved</p>');

-- --------------------------------------------------------

--
-- Table structure for table `settings_logo`
--

CREATE TABLE `settings_logo` (
  `logo_id` int(11) NOT NULL,
  `logo_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings_pickup_address`
--

CREATE TABLE `settings_pickup_address` (
  `pickup_address_id` int(11) NOT NULL,
  `pickup_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings_pickup_address`
--

INSERT INTO `settings_pickup_address` (`pickup_address_id`, `pickup_address`) VALUES
(20, 'san pedro');

-- --------------------------------------------------------

--
-- Table structure for table `settings_services`
--

CREATE TABLE `settings_services` (
  `service_id` int(11) NOT NULL,
  `service_name` text NOT NULL,
  `service_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings_services`
--

INSERT INTO `settings_services` (`service_id`, `service_name`, `service_desc`) VALUES
(12, 'Box Price Quote', 'Customize or personalize boxes for your weddings, corporate parties, product packaging etc'),
(13, 'Layout', 'Depends on design'),
(14, 'Other Invitation Supplies', '<p>Depending on type of supply needed</p>'),
(15, 'Digital Flat Printing', '<p>Digital Flat Printing may use either pigment ink or laser depending on type of paper.</p>'),
(16, 'Invitation Consultation', '<p>We can assist you in finalizing your invitation design within your budget</p>'),
(17, 'Foil Stamping', '<p>Foil Stamping is perfect to embed foil (different colors) on ready made products like envelopes, souvenirs/ giveaways etc.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `settings_shop_details`
--

CREATE TABLE `settings_shop_details` (
  `shop_address_id` int(11) NOT NULL,
  `shop_address` text NOT NULL,
  `phone_no` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings_shop_details`
--

INSERT INTO `settings_shop_details` (`shop_address_id`, `shop_address`, `phone_no`, `email`) VALUES
(1, '<p>Unit 204, 2nd Floor The Station Point, 3299 Ramon Magsaysay Blvd. corner Maganda St. Brgy. 427, Sampaloc, Manila</p>', '<p>Smart - 09088907903</p>\r\n<p>Sun - 09328870687</p>', 'boxed.phl@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `settings_social_media_links`
--

CREATE TABLE `settings_social_media_links` (
  `social_media_id` int(11) NOT NULL,
  `facebook` text NOT NULL,
  `facebook_url` text NOT NULL,
  `instagram` text NOT NULL,
  `instagram_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings_social_media_links`
--

INSERT INTO `settings_social_media_links` (`social_media_id`, `facebook`, `facebook_url`, `instagram`, `instagram_url`) VALUES
(1, 'facebook', 'https://www.facebook.com/boxed.phl/', 'instagram', 'https://www.instagram.com/boxed.phl/');

-- --------------------------------------------------------

--
-- Table structure for table `settings_website_contents`
--

CREATE TABLE `settings_website_contents` (
  `website_content_id` int(11) NOT NULL,
  `website_title` text NOT NULL,
  `website_tags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings_website_contents`
--

INSERT INTO `settings_website_contents` (`website_content_id`, `website_title`, `website_tags`) VALUES
(1, 'BoxedPh | Online Shopping', '');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slider_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slider_name`, `slide_image`) VALUES
(6, '1', 'cover1.jpg'),
(7, '2', 'cover2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `term_id` int(10) NOT NULL,
  `term_title` varchar(100) NOT NULL,
  `term_link` varchar(100) NOT NULL,
  `term_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term_id`, `term_title`, `term_link`, `term_desc`) VALUES
(9, 'Rules & Regulations', 'link_1', '<div>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem ut itaque quibusdam dolores modi natus. Enim earum laboriosam, quos error voluptatem fugiat eos? In maiores quia eligendi, ea aperiam voluptate.</div>'),
(10, 'Promo & Regulations', 'link_2', '<div>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem ut itaque quibusdam dolores modi natus. Enim earum laboriosam, quos error voluptatem fugiat eos? In maiores quia eligendi, ea aperiam voluptate.</div>'),
(11, 'Refund Condition Policy', 'link_3', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem ut itaque quibusdam dolores modi natus. Enim earum laboriosam, quos error voluptatem fugiat eos? In maiores quia eligendi, ea aperiam voluptate.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `c_id` int(11) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `boxes_section`
--
ALTER TABLE `boxes_section`
  ADD PRIMARY KEY (`box_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comment_section`
--
ALTER TABLE `comment_section`
  ADD PRIMARY KEY (`user__id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`,`customer_u_id`) USING BTREE;

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `instagram_section`
--
ALTER TABLE `instagram_section`
  ADD PRIMARY KEY (`instagram_photo_id`);

--
-- Indexes for table `mcomments`
--
ALTER TABLE `mcomments`
  ADD PRIMARY KEY (`mc_id`),
  ADD UNIQUE KEY `mc_uni_no` (`mc_uni_no`),
  ADD KEY `mc_p_uni_id` (`mc_p_uni_id`),
  ADD KEY `mc_u_uni_id` (`mc_u_uni_id`);

--
-- Indexes for table `mscomments`
--
ALTER TABLE `mscomments`
  ADD PRIMARY KEY (`msc_id`),
  ADD UNIQUE KEY `msc_uni_no` (`msc_uni_no`),
  ADD KEY `msc_mc_uni_no` (`msc_mc_uni_no`),
  ADD KEY `msc_u_uni_no` (`msc_u_uni_no`);

--
-- Indexes for table `partnership_cover`
--
ALTER TABLE `partnership_cover`
  ADD PRIMARY KEY (`partnership_id`);

--
-- Indexes for table `partnership_section`
--
ALTER TABLE `partnership_section`
  ADD PRIMARY KEY (`layout_artist_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `review_comments`
--
ALTER TABLE `review_comments`
  ADD PRIMARY KEY (`mc_id`),
  ADD UNIQUE KEY `mc_uni_no` (`mc_uni_no`),
  ADD KEY `mc_p_uni_id` (`mc_p_uni_id`),
  ADD KEY `mc_u_uni_id` (`mc_u_uni_id`);

--
-- Indexes for table `review_rep_comments`
--
ALTER TABLE `review_rep_comments`
  ADD PRIMARY KEY (`msc_id`),
  ADD UNIQUE KEY `msc_uni_no` (`msc_uni_no`),
  ADD KEY `msc_mc_uni_no` (`msc_mc_uni_no`),
  ADD KEY `msc_u_uni_no` (`msc_u_uni_no`);

--
-- Indexes for table `settings_about_us`
--
ALTER TABLE `settings_about_us`
  ADD PRIMARY KEY (`about_us_id`);

--
-- Indexes for table `settings_about_us_picture_section`
--
ALTER TABLE `settings_about_us_picture_section`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `settings_faqs`
--
ALTER TABLE `settings_faqs`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `settings_footer`
--
ALTER TABLE `settings_footer`
  ADD PRIMARY KEY (`footer_id`);

--
-- Indexes for table `settings_logo`
--
ALTER TABLE `settings_logo`
  ADD PRIMARY KEY (`logo_id`);

--
-- Indexes for table `settings_pickup_address`
--
ALTER TABLE `settings_pickup_address`
  ADD PRIMARY KEY (`pickup_address_id`);

--
-- Indexes for table `settings_services`
--
ALTER TABLE `settings_services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `settings_shop_details`
--
ALTER TABLE `settings_shop_details`
  ADD PRIMARY KEY (`shop_address_id`);

--
-- Indexes for table `settings_social_media_links`
--
ALTER TABLE `settings_social_media_links`
  ADD PRIMARY KEY (`social_media_id`);

--
-- Indexes for table `settings_website_contents`
--
ALTER TABLE `settings_website_contents`
  ADD PRIMARY KEY (`website_content_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `boxes_section`
--
ALTER TABLE `boxes_section`
  MODIFY `box_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comment_section`
--
ALTER TABLE `comment_section`
  MODIFY `user__id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `instagram_section`
--
ALTER TABLE `instagram_section`
  MODIFY `instagram_photo_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `mcomments`
--
ALTER TABLE `mcomments`
  MODIFY `mc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `mscomments`
--
ALTER TABLE `mscomments`
  MODIFY `msc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `partnership_cover`
--
ALTER TABLE `partnership_cover`
  MODIFY `partnership_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `partnership_section`
--
ALTER TABLE `partnership_section`
  MODIFY `layout_artist_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review_comments`
--
ALTER TABLE `review_comments`
  MODIFY `mc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `review_rep_comments`
--
ALTER TABLE `review_rep_comments`
  MODIFY `msc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings_about_us`
--
ALTER TABLE `settings_about_us`
  MODIFY `about_us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings_about_us_picture_section`
--
ALTER TABLE `settings_about_us_picture_section`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings_faqs`
--
ALTER TABLE `settings_faqs`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings_footer`
--
ALTER TABLE `settings_footer`
  MODIFY `footer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings_logo`
--
ALTER TABLE `settings_logo`
  MODIFY `logo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings_pickup_address`
--
ALTER TABLE `settings_pickup_address`
  MODIFY `pickup_address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `settings_services`
--
ALTER TABLE `settings_services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `settings_shop_details`
--
ALTER TABLE `settings_shop_details`
  MODIFY `shop_address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings_social_media_links`
--
ALTER TABLE `settings_social_media_links`
  MODIFY `social_media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings_website_contents`
--
ALTER TABLE `settings_website_contents`
  MODIFY `website_content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `term_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
