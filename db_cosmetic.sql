-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2017 at 04:13 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cosmetic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL COMMENT 'รหัสผู้ดูแล',
  `admin_fname` varchar(100) DEFAULT NULL COMMENT 'ชื่อ',
  `admin_lname` varchar(100) DEFAULT NULL COMMENT 'นามสกุล',
  `admin_username` varchar(100) NOT NULL COMMENT 'ชื่อผู้ใช้',
  `admin_password` varchar(100) NOT NULL COMMENT 'รหัสผ่าน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางผู้ดูแล';

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_fname`, `admin_lname`, `admin_username`, `admin_password`) VALUES
(1, 'Super', 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `bank_subbank` varchar(200) NOT NULL,
  `bank_type` varchar(200) NOT NULL,
  `bank_book` varchar(200) NOT NULL,
  `bank_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_name`, `bank_subbank`, `bank_type`, `bank_book`, `bank_image`) VALUES
(1, 'ธนาคารกรุงเทพ', 'สกลนคร', 'ออมทรัพย์', '410-4-00206-0', 'ktbb.png'),
(2, 'ธนาคารกรุงไทย', 'สกลนคร', 'ออมทรัพย์', '419-3-04945-0', 'ktb.png'),
(3, 'ธนาคารกสิกรไทย', 'สกลนคร', 'ออมทรัพย์', '021-3-47739-0', '8313cc09c67b64bc639f27d663c88c9f.png');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL COMMENT 'รหัสหมวดหมู่',
  `category_name` varchar(200) DEFAULT NULL COMMENT 'ชื่อหมวดหมู่',
  `category_detail` varchar(5000) DEFAULT NULL COMMENT 'รายละเอียดหมวดหมู่'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางหมวดหมู่';

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_detail`) VALUES
(1, 'เซรั่ม', '-----------'),
(2, 'สบู่ล้างหน้าสูตรโสมมะนาวทองคำ', '-----------'),
(3, 'ครีมทาก่อนนอน', '-----------'),
(4, 'ครีมทากันแดด', '-----------'),
(5, 'สบู่โสมคุณหญิง', '-----------'),
(6, 'ครีมโสมคุณหญิง', '-----------'),
(7, 'โลชั่น(ทาผิวกาย)', '-----------'),
(8, 'แป้ง(ทาหน้า)', '-----------'),
(9, 'สะเปรย์(ระงับกลิ่นกาย)', '-----------'),
(10, 'โคโลน(ระงับกลิ่นกาย)', '-----------'),
(12, 'โทนเนอร์', '-----------'),
(13, 'น้ำหอม', '-----------');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_fullname` varchar(200) NOT NULL,
  `contact_email` varchar(200) NOT NULL,
  `contact_tel` varchar(20) NOT NULL,
  `contact_subject` varchar(200) NOT NULL,
  `contact_detail` varchar(5000) NOT NULL,
  `contact_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL COMMENT 'รหัสการจัดส่ง',
  `delivery_name` varchar(200) DEFAULT NULL COMMENT 'ชื่อการจัดส่ง',
  `delivery_amount` decimal(9,2) DEFAULT NULL COMMENT 'ราคาการจัดส่ง',
  `delivery_enable` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางจัดส่ง';

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `delivery_name`, `delivery_amount`, `delivery_enable`) VALUES
(1, 'EMS พัสดุด่วนพิเศษ', '60.00', 1),
(2, 'พัสดุลงทะเบียน', '30.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_status`
--

CREATE TABLE `delivery_status` (
  `delivery_status_id` int(11) NOT NULL COMMENT 'รหัสสถานะการจัดส่ง',
  `member_id` int(11) DEFAULT NULL COMMENT 'รหัสสมาชิก',
  `order_id` int(11) DEFAULT NULL COMMENT 'รหัสใบสั่งซื้อ',
  `delivery_status_date` date DEFAULT NULL COMMENT 'วันที่',
  `delivery_status_detail` varchar(100) DEFAULT NULL COMMENT 'รายละเอียด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL COMMENT 'รหัสมาชิก',
  `member_fname` varchar(100) DEFAULT NULL COMMENT 'ชื่อ',
  `member_lname` varchar(100) DEFAULT NULL COMMENT 'นามสกุล',
  `member_birth_date` date DEFAULT NULL COMMENT 'วันเกิด',
  `member_sex` int(1) NOT NULL,
  `member_address` varchar(500) DEFAULT NULL COMMENT 'ที่อยู่',
  `province_id` int(11) DEFAULT NULL COMMENT 'จังหวัด',
  `member_zipcode` varchar(5) DEFAULT NULL COMMENT 'รหสัไปรษณีย์',
  `member_phone` varchar(20) DEFAULT NULL COMMENT 'เบอร์โทร',
  `member_email` varchar(200) DEFAULT NULL COMMENT 'อีเมล',
  `member_username` varchar(100) DEFAULT NULL COMMENT 'ชื่อผู้ใช้',
  `member_password` varchar(100) DEFAULT NULL COMMENT 'รหัสผ่าน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางสมาชิก';

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_fname`, `member_lname`, `member_birth_date`, `member_sex`, `member_address`, `province_id`, `member_zipcode`, `member_phone`, `member_email`, `member_username`, `member_password`) VALUES
(5, 'tttt', 'tttt', '1989-01-17', 0, 'tttt', 28, '47000', '08', '000', 'tttt', '32bf0e6fcff51e53bd74e70ba1d622b2'),
(6, 'สิริยากร ', 'ศรีไทย', '1996-07-16', 0, '29 หมู่ 3 ต.วังยาง อ.พรรณานิคม ', 35, '47130', '0933374795', 'siriyakorm.sr@57.snru.ac.th', 'Chom', '81dc9bdb52d04dc20036dbd8313ed055'),
(7, 'ชม', 'พู่', '1996-07-16', 0, '29/3 ต.วังยาง อ.พรรณานิคม ', 35, '47130', '0933374795', '-', 'chom1', 'b59c67bf196a4758191e42f76670ceba'),
(8, 'สิริยากร', 'ศรีไทย', '1996-07-16', 0, '29 หมู่ 3 ต.วังยาง อ.พรรณานิคม', 35, '47130', '0933374795', 'siriyakorm.sr@57.snru.ac.th', 'สิริยากร ศรีไทย', 'b0baee9d279d34fa1dfd71aadb908c3f'),
(9, 'สมหญิง', 'พรพรม', '1990-01-12', 0, '112/1 ต.ทับกุง อ.หนองแสง ', 29, '41340', '081-1494118', '-', 'chompoo', '81dc9bdb52d04dc20036dbd8313ed055'),
(10, 'ลลิตา', 'นาสิงเตา', '0000-00-00', 0, '151 หมู่ 2 ต.นาหว้า อ.นาหว้า ', 36, '48180', '0653256784', '-', 'ลลิตา   ', '5e6ac8f366fae0af8d815d40896144da'),
(11, 'ลลิตา', 'นาสิงเตา', '1995-08-02', 0, '151 หมู่ 2 ต.นาหว้า อ.นาหว้า ', 36, '48180', '0653256784', '-', 'ลลิตา01', '1e07ac18a19ec24ad0e0778b7c2f34e4'),
(12, 'ศิริญา ', 'สุวรรณวงษ์', '1995-07-06', 0, '102 หมู่ 12  ต.นาแก้ว  อ.โพนนาแก้ว', 35, '47230', '0821092114', 'Siriya.su57@snru.ac.th', 'ศิริญา', '827ccb0eea8a706c4c34a16891f84e7b'),
(13, 'ฐิรัชญา', 'ชนะชัย', '1995-07-06', 0, '136 หมู่ 4  ต.คำบ่อ  อ.วาริชภูมิ', 35, '47150', '0623506559', 'Thiratchaya.ch57@.ac.th', 'ฐิรัชญา', 'e10adc3949ba59abbe56e057f20f883e'),
(14, 'วิจักษณ์', 'อัศวาวุฒิ', '1995-01-31', 0, '382/3 ถ.เฉลิมพระเกียรติ ต.ธาตุเชิงชุม อ.เมือง ', 35, '47000', '0903363352', 'Kar232rr@gmail.com', 'วิจักษณ์', 'a01610228fe998f515a72dd730294d87'),
(15, 'ทิพย์วรรณ', ' แก้วดี ', '1995-01-03', 0, '467 หมู่ 1 ถ.พังโคน-วาริชภูมิ อ.พังโคน \r\nทิพย์วรรณ แก้วดี \r\n\r\n', 35, '47160', '0887408533 ', 'Mos-go-2538@hotmail.com', 'มอส', 'f09696910bdd874a99cd74c8f05b5c44'),
(16, 'ชรินรัตน์ ', 'แผนบุตร', '1995-10-13', 0, '77/9 หมู่ 9  ต.คำบ่อ อ.วาริชภูมิ\r\n', 35, '47150', '0822191128', 'prow_wer@hotmail.com', 'แพรว', 'bc7316929fe1545bf0b98d114ee3ecb8'),
(17, 'สุมินตา', 'แก้วมะ', '1996-02-13', 0, '78/9 หมู่ 9 ต.ป่งไฮ  อ.เซกา\r\n\r\n', 77, '43150', '0901150719', 'Suminta_minnuy@hotmail.com', 'มีน', '962e56a8a0b0420d87272a682bfd1e53'),
(18, 'จุฑารัตน์', 'โพธิ์คำพา', '1995-07-14', 0, '97 หมู่ 1 ต.นาซอ อ.วารนรนิวาส\r\n', 35, '47120', '0817494197', 'giftgiftfifi-ooo@hotmail.com', 'กิ๊ฟ', '8b5700012be65c9da25f49408d959ca0'),
(19, 'สิริยากร', 'ศรีไทย', '1995-07-16', 0, '29/3 ต.วังยาง อ.พรรณานิคม ', 35, '47130', '0933374795', 'siriyakorm.sr@57.snru.ac.th', 'หมู น้อย', 'fcea920f7412b5da7be0cf42b8c93759'),
(20, 'สิริยา', 'ศรีไทย', '1996-07-16', 0, '12/3 ต.วังยาง อ.พรรณานิคม ', 35, '47130', '0911409110', 'siriyakorn.sr@57.snru.ac.th', 'หนูชม', '827ccb0eea8a706c4c34a16891f84e7b'),
(21, 'ชม', 'พู่', '1995-01-03', 0, '29u9jl', 25, '47130', '0933374795', 'siriyakorm.sr@57.snru.ac.th', 'ชม15', 'd41d8cd98f00b204e9800998ecf8427e');

-- --------------------------------------------------------

--
-- Table structure for table `member_address_delivery`
--

CREATE TABLE `member_address_delivery` (
  `mad_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `member_fname` varchar(100) NOT NULL,
  `member_lname` varchar(100) NOT NULL,
  `member_address` varchar(500) NOT NULL,
  `province_id` int(11) NOT NULL,
  `member_zipcode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_address_delivery`
--

INSERT INTO `member_address_delivery` (`mad_id`, `member_id`, `member_fname`, `member_lname`, `member_address`, `province_id`, `member_zipcode`) VALUES
(1, 1, 'อร', 'อ่อ', '254 ศาลพระ', 49, '47000'),
(2, 0, 'asdasd', 'dasdas', 'asdas', 9, 'asdas'),
(3, 5, 'TR', 'RT', 'GHJ', 11, '48000'),
(4, 6, 'สิริยากร', 'ศรีไทย', '29 หมู่ 3 ต.วังยาง อ.พรรณานิคม ', 35, '47130'),
(5, 7, 'ชม ', 'พู่', '29/3 ต.วังยาง อ.พรรณานิคม ', 35, '47130'),
(6, 8, 'สิริยากร', 'ศรีไทย', '29 หมู่ 3 ต.วังยาง อ.พรรณานิคม', 35, '47130'),
(7, 9, 'สมหญิง ', 'พรพรม', ' 112/1 ต.ทับกุง อ.หนองแสง \r\n', 29, '41340'),
(8, 11, 'ลลิตา', 'นาสิงเตา', '151 หมู่ 2 ต.นาหว้า อ.นาหว้า ', 36, '48180'),
(9, 12, 'ศิริญา ', 'สุวรรณวงษ์', '102  หมู่ 12  ต.นาแก้ว อ.โพนนาแก้ว', 35, '47230'),
(10, 13, 'ฐิรัชญา', 'ชนะชัย', '136 หมู่ 4  ต.คำบ่อ  อ.วาริชภูมิ', 35, '47150'),
(11, 14, 'วิจักษณ์', 'อัศวาวุฒิ', '382/3 ถ.เฉลิมพระเกียรติ ต.ธาตุเชิงชุม อ.เมือง ', 35, '47000'),
(12, 15, 'ทิพย์วรรณ  ', 'แก้วดี', ' 467 หมู่ 1 ถ.พังโคน-วาริชภูมิ อ.พังโคน  \r\n\r\n', 35, ' 4716'),
(13, 16, 'ชรินรัตน์ ', ' แผนบุตร', '77/9 หมู่ 9  ต.คำบ่อ อ.วาริชภูมิ\r\n', 35, '47150'),
(14, 17, ' สุมินตา ', 'แก้วมะ', '78/9 หมู่ 9 ต.ป่งไฮ  อ.เซกา\r\n', 77, '43150'),
(15, 18, 'จุฑารัตน์  ', 'โพธิ์คำพา', '97 หมู่ 1 ต.นาซอ อ.วารนรนิวาส\r\n', 35, '47120'),
(16, 19, 'สิริยากร', 'ศรีไทย', '29/3 ต.วังยาง อ.พรรณานิคม ', 35, '47130'),
(17, 20, 'สิริยา', 'ศรีไทย', '12/3 ต.วังยาง อ.พรรณานิคม ', 35, '47130');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL COMMENT 'รหัสใบสั่งซื้อ',
  `member_id` int(11) DEFAULT NULL COMMENT 'รหัสสมาชิก',
  `delivery_id` int(11) DEFAULT NULL COMMENT 'รหัสการจัดส่ง',
  `order_date` datetime DEFAULT NULL COMMENT 'วันที่',
  `mad_id` int(11) NOT NULL,
  `member_fname` varchar(100) DEFAULT NULL,
  `member_lname` varchar(100) DEFAULT NULL,
  `member_address` varchar(500) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `member_zipcode` varchar(5) DEFAULT NULL,
  `payment_type_id` int(11) NOT NULL,
  `order_status_id` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางใบสั่งซื้อ';

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `order_list_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL COMMENT 'รหัสรายการสินค้า',
  `product_id` int(11) DEFAULT NULL COMMENT 'รหัสสินค้า',
  `order_list_price` decimal(9,2) DEFAULT NULL COMMENT 'ราคา',
  `order_list_value` int(11) DEFAULT NULL COMMENT 'จำนวน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางรายการใบสั่งซื้อ';

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `order_status_id` int(11) NOT NULL,
  `order_status_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`order_status_id`, `order_status_name`) VALUES
(1, 'รอการชำระเงิน'),
(2, 'ระหว่างดำเนินการจัดส่ง'),
(3, 'จัดส่งแล้ว'),
(4, 'ยกเลิก');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL COMMENT 'รหัสการชำระเงิน',
  `payment_amount` decimal(9,2) DEFAULT NULL COMMENT 'จำนวนเงิน',
  `payment_date` datetime DEFAULT NULL COMMENT 'วันที่ชำระเงิน',
  `bank_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL COMMENT 'รหัสใบสั่งซื้อ',
  `payment_slip` varchar(200) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางชำระเงิน';

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `payment_type_id` int(11) NOT NULL,
  `payment_type_name` varchar(200) NOT NULL,
  `payment_type_enable` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`payment_type_id`, `payment_type_name`, `payment_type_enable`) VALUES
(1, 'โอนเงินผ่านธนาคาร', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL COMMENT 'รหัสสินค้า',
  `product_name` varchar(500) DEFAULT NULL COMMENT 'ชื่อสินค้า',
  `product_detail` varchar(5000) DEFAULT NULL COMMENT 'รายละเอียดสินค้า',
  `product_price` decimal(9,2) DEFAULT NULL COMMENT 'ราคาสินค้า',
  `category_id` int(11) DEFAULT NULL COMMENT 'หมวดหมู่',
  `product_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางสินค้า';

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_detail`, `product_price`, `category_id`, `product_type_id`) VALUES
(1, 'โทนเนอร์โสมคุณหญิง Ginseng Herbal Toner', '<p><strong>รายละเอียดสินค้า</strong></p>\r\n\r\n<p>โทนเนอร์โสมคุณหญิง Ginseng Herbal Toner</p>\r\n\r\n<p>ปริมาน 60 มล.&nbsp;ราคา 50 บาท</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>สรรพคุณ</strong></p>\r\n\r\n<p>โทนเนอร์โสมคุณหญิง Ginseng Herbal Toner เช็ดคราบสกปรก รอยดำฝังลึกให้จางลง ขาวเห็นผลชัดเจนตั้งแต่ครั้งแรกที่ใช้ ลดจุดด่างดำ ปรับผิวให้สว่างขึ้น เช็ดทำความสะอาดผิวกายให้กระจ่างใส ผลัดเซลล์ผิวที่เสื่่อมสภาพให้หลุดออกอย่างเห็นได้ชัด ทำให้ผิวดูอ่อนเยาว์ พิเศษไปกว่านั้น สามารถเช็ดผิวหน้าได้ กระชับรูขุมขน ชะลอริ้วรอยได้อีกด้วย</p>\r\n\r\n<p>&nbsp;- ปาดปุ๊ป ขาวปั๊ป</p>\r\n\r\n<p>- เช็ดทำความสิ่งสกปรก</p>\r\n\r\n<p>- บริเวณ ผิวกาย-ผิวหน้า ข้อศอก หัวเข่า หรือบริเวณที่ไม่สม่ำเสมอ</p>\r\n\r\n<p>- ทำให้รอยดำด่างดูจางลง ขาวใสชัดเจน ตั้งแต่&quot;ครั้งแรก&quot;ที่ใช้&quot; รากโสมแท้</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>วิธีใช้ :</strong>&nbsp;เทโทนเนอร์ใส่สำลีแล้วเช็ดที่ผิวได้เลยก่อนหรือหลังอาบน้ำก็ได้ เพื่อให้ประสิทธิ์ภาพเต็มที่ แนะนำให้เช็ดหลังอาบน้ำทุกครั้ง</p>\r\n\r\n<p><strong>เลขที่จดแจ้ง :</strong> 10-1-6001096</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '50.00', 12, 0),
(2, 'สบู่โสมคุณหญิง', '<p><strong>รายละเอียดสินค้า</strong></p>\r\n\r\n<p>Fruity Candy Gluta</p>\r\n\r\n<p>ปริมาณ 80 กรัม ราคา 50 บาท</p>\r\n\r\n<p><strong>สรรพคุณ</strong></p>\r\n\r\n<p>ผิวกระจ่างใสอย่าง ปลอดภัย 100% ช่วยฟื้นฟูสภาพผิว ให้เปล่งปลั่ง กระจ่างใส รักษาสิว ปรับผิวให้นุ่มชุ่มชื่น ลดเลือนฝ้า ริ้วรอยจุดด่างดำ</p>\r\n\r\n<p><strong>วิธีใช้ </strong>&nbsp;ฟอกเวลาอาบน้ำ ทิ้งไว้ 2-3 นาทีแล้วล้างออก ใช้เป็นประจำเช้าเย็น</p>\r\n\r\n<p>** เมื่อใช้กับครีมโสมคุณหญิงจะทำให้เห็นผลมากยิ่งขึ้น</p>\r\n\r\n<p><strong>&nbsp;เลขจดแจ้ง :</strong> 10-1-5935571</p>\r\n\r\n<p>&nbsp;&quot;ผลลัพธ์ อาจแตกต่างกันไป ขึ้นอยู่กับสภาพผิวของผู้แต่ใช้ละบุคคล&quot;</p>\r\n', '50.00', 5, 0),
(3, 'ครีมโสมคุณหญิง', '<p><strong>รายละเอียดสินค้า</strong></p>\r\n\r\n<p>ครีมโสมคุณหญิง (ผลิตภัณฑ์บำรุงผิวหน้าและผิวกาย)</p>\r\n\r\n<p>ปริมาน 30 กรัม&nbsp;ราคา 299 บาท</p>\r\n\r\n<p><strong>สรรพคุณ</strong></p>\r\n\r\n<p>ครีมโสมคุณหญิง ครีมผลัดเซลล์ผิว ลดผดผื่น เร่งการสลายคราบ และสิ่งสกปรกที่อุดตันได้อย่างเต็มประสิทธิภาพขจัดและลดเลือนจุดหมองคล้ำตามร่างกาย เร่งการผลัดเซลล์ผิวให้สวย ใส ลดความหยาบกระด้าง หม่นหมอง อันเป็นจุดเริ่มต้นของริ้วรอย และผิวที่เสื่อมชราภาพ เร่งฟื้นฟูสภาพผิวที่เสียให้กลับคืนสู่ความสดใสเปล่งปลั่งดังเดิมอีกครั้ง</p>\r\n\r\n<p><strong>วิธีใช้</strong>&nbsp; ชโลมครีมลงบนผิวกายเป็นประจำทุกวัน หลังอาบน้ำ เช้า-ก่อนนอน</p>\r\n\r\n<p><strong>เลขที่จดแจ้ง </strong><strong>:</strong> 10-1-5956592</p>\r\n\r\n<p>&nbsp;&quot;ผลลัพธ์ อาจแตกต่างกันไป ขึ้นอยู่กับสภาพผิวของผู้แต่ใช้ละบุคคล&quot;</p>\r\n', '299.00', 6, 0),
(4, 'สบู่โสมมะนาวทองคำ', '<p><strong>รายละเอียดสินค้า</strong></p>\r\n\r\n<p>Gold Ginseng Lemon Facial Soap สบู่โสมมะนาวทองคำ</p>\r\n\r\n<p>ปริมาน 70 กรัม ราคา 100 บาท</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>สรรพคุณ</strong></p>\r\n\r\n<p>ช่วยให้ผิวพรรณนุ่มเนียน กระจ่างใส &nbsp;‪ลดสิว ฝ้า กระ จุดด่างดำ ลดริ้วรอย เห็นพลในก้อนแรกที่ใช้ สามารถใช้ได้นาน 1 เดือน&nbsp;</p>\r\n\r\n<p><strong>วิธีใช้</strong> ใช้ล้างทำความสะอาดบริเวณผิวหน้า</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>‪&lrm;<strong>ส่วนประกอบ</strong>&nbsp;<br />\r\n&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; lemon Extract, Ginseng Extact, Glycerin, Vitamin e, Vitamin b3, Camu camu Extroct&nbsp;</p>\r\n\r\n<p><br />\r\n<strong>เลขจดแจ้ง :</strong> 10-1-5932668&nbsp;</p>\r\n\r\n<p>&quot;ผลลัพธ์ อาจแตกต่างกันไป ขึ้นอยู่กับสภาพผิวของผู้แต่ใช้ละบุคคล&quot;</p>\r\n', '100.00', 2, 0),
(5, 'เซรั่มโสมมะนาวทองคำ', 'รายละเอียดสินค้า\r\nปริมาน 60 มล. ราคา 100 บาท\r\nสรรพคุณ\r\nช่วยให้ผิวกระจ่างใส เนียนนุ่มชุ่มชื่นน่าสัมผัส ไม่แพ้ง่ายเพราะเป็นสารสกัดจากธรรมชาติ‬ \r\nวิธีใช้ ทาผิวเป็นประจำเช้า-ก่อนนอน\r\nส่วนประกอบสำคัญ\r\nเซรั่มโสมมะนาวทองคำ มีส่วนผสมของสารสกัดที่เป็นประโยชน์ต่อผิวช่วยกระตุ้นเซลล์ผิว เร่งการผลัดเซลล์ผิวเก่าสร้างเซลล์ผิวใหม่ ให้ขาวขึ้นและไม่กลับมาดำ หัวเชื้อโสมมะนาวทองคำ **AHA ‪- Vitamin C ‪- Vitamin E ‪- Vitamin B3‬‬‬‬‬‬‬‬‬‬‬‬‬‬‬‬‬‬‬‬‬‬‬‬\r\nเลขจดแจ้ง : 10-1-5924438\r\n\r\n\r\n\r\n', '150.00', 1, 0),
(6, 'ครีมกันแดดโสมมะนาว', 'รายละเอียดสินค้า\r\nGold ginseng lemon booster white perfect night cream \r\nปริมาน 10 กรัม ราคา 150 บาท \r\nสรรพคุณ:\r\nช่วยให้ผิวแลดูอ่อนเยาว์ กระจ่างใส ดูสุขภาพดี ฟื้นฟูผิวที่แห้งกร้านอย่างรวดเร็ว ผิวจะกระชับ ค่อยๆลดเลือนริ้วรอย อย่างเป็นธรรมชาติ และยังให้ความชุ่มชื่นตลอดค่ำคืน\r\nวิธีใช้ ใช้ทาบำรุงทุกคืนก่อนอน\r\nวิธีใช้  ลูบไล้ให้สม่ำเสมอทั่วใบหน้าก่อนออกแดด\r\nส่วนประกอบสำคัญ :\r\n 	Ginseng extract,Lemon extract,collagen,vitamin e,vitamin b3, coconut oil\r\nเลขที่จดแจ้ง : 10-1-5950264\r\nคำเตือน : หากเกิดอาการแพ้ระคายเคืองควรหยุดใช้ทันทีและปรึกษาแพทย์\r\n\r\n', '150.00', 4, 0),
(7, 'ครีมทาก่อนนอนโสมมะนาว', 'รายละเอียดสินค้า\r\nBooster White Perfect Night Cream ไนท์ครีม\r\nปริมาน 10 กรัม ราคา 150 บาท\r\n สรรพคุณ :\r\nช่วยให้ผิวแลดูอ่อนเยาว์ กระจ่างใส ดูสุขภาพดี ฟื้นฟูผิวที่แห้งกร้านอย่างรวดเร็ว\r\nผิวจะกระชับ ค่อยๆ ลดเลือนริ้วรอยอย่างเป็นธรรมชาติ และยังให้ความชุ่มชื่นตลอดค่ำคืน\r\nวิธีใช้ Booster White Perfect Night Cream : ใช้ทาบำรุงทุกคืน ก่อนอน\r\nเลขที่จดแจ้ง : 10-1-5950264 \r\nคำเตือน : หากเกิดอาการแพ้ระคายเคือง ควรหยุดใช้ทันที และปรึกษาแพทย์\r\n', '150.00', 3, 0),
(8, 'ครีมบำรุงผิวกาย R-Series (อาร์ซีรีย์)', 'รายละเอียดสินค้า\r\nR-Series (อาร์ซีรีย์) Hand&Body Lotion แฮนด์ แอนด์ บอดี้ โลชั่น  \r\nปริมาณ 200 มล. ราคา 250 บาท\r\nสรรพคุณ\r\n\r\nโลชั่น เนื้อบางเบา ซึมซาบลงสู่ผิวได้อย่างรวดเร็ว อ่อนโยนต่อผิวสัมผัสด้วยส่วนผสมจาก ธรรมชาติ ที่ตรงเข้าบำรุงผิว คงความชุ่มชื่น ให้สัมผัสที่เนียนนุ่ม พร้อมเพิ่มเสน่ห์ความหอมของผิวพรรณ\r\nวิธีใช้  เทโลชั่นลงบนฝ่ามือแล้วทาให้ทั่วผิวกาย\r\nเลขที่ใบรับแจ้ง : 10-2-5322162\r\n', '250.00', 7, 0),
(9, 'แป้งฝุ่น R-Series (อาร์ซีรีย์)', 'รายละเอียดสินค้า\r\nแป้งฝุ่น R-Series (อาร์ซีรีย์) Designer Collection R-Series Body Powder \r\nปริมาณ 100 กรัม ราคา 150 บาท\r\nสรรพคุณ\r\nชโลมความหอมหวานให้ผิวสัมผัส เนียนนุ่ม ให้คุณรู้สึกสดชื่น เพิ่มความมั่นใจกับกลิ่นกาย และสบายตัวตลอดวัน แป้งเนื้อละเอียด หอม นุ่มนวล สามารถทาได้ทั้งผิวหน้า และผิวตามร่างกาย\r\nวิธีใช้  เทแป้งลงบนฝ่ามือแล้วทาให้ทั่วหน้าและผิวกาย\r\n', '150.00', 8, 0),
(10, 'โรลออนระงับกลิ่นกาย R-Series (อาร์ซีรีย์)', 'รายละเอียดสินค้า\r\nโรลออนระงับกลิ่นกาย Designer Collection R-Series Deodorant \r\nปริมาณ 50 กรัม ราคา 130 บาท\r\nสรรพคุณ\r\nโรลออนระงับกลิ่นกาย ด้วยส่วนผสมจากธรรมชาติช่วยเพิ่มความมั่นใจกับกลิ่นกายของคุณได้ ตลอดวัน แห้งสบายโดยไม่ต้องกังวลกับการระคายเคืองของผิวสัมผัสใต้วงแขน ด้วยสูตร Alcohol free \r\n', '130.00', 10, 0),
(11, 'น้ำหอม Designer Collection R-Series Eau de Parfum', '<p>น้ำหอม Designer Collection R-Series Eau de Parfum</p>\r\n\r\n<p>ปริมาณ 30 มล. ราคา 490 บาท</p>\r\n\r\n<p><strong>สรรพคุณ</strong></p>\r\n\r\n<p>เสน่ห์ หวานโดนใจ ประโลมผิวกายด้วยการบำรุงผิวชุดพิเศษพร้อมกลิ่นหอมอ่อนๆ เพิ่มความโรแมนติคชวนนึกถึงความทรงจำวันหวาน ปล่อยอารมณ์ไปกับกลิ่นหอมอย่างมีระดับที่อยู่กับคุณตราบนานเท่านาน น้ำหอมที่ได้รับการตามหามากที่สุด หอมติดทดนานตลอดทั้งวัน</p>\r\n\r\n<p><strong>วิธีใช้ </strong>: เพียงฉีดเล็กน้อยบริเวณจุดชีพจรต่างๆบนร่างกาย จะทำให้หอมติดทนนานตลอดทั้งวัน</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '490.00', 11, 0),
(12, 'สเปรย์ Designer Collection R-Series Body Spray', '<p><strong>รายละเอียดสินค้า</strong></p>\r\n\r\n<p>สเปรย์ Designer Collection R-Series Body Spray</p>\r\n\r\n<p>ปริมาณ 50 กรัม ราคา 130 บาท</p>\r\n\r\n<p><strong>สรรพคุณ</strong><strong> :</strong></p>\r\n\r\n<p>ฉีดสเปรย์ เสน่ห์แห่งความหวาน เอกลักษณ์ของความเป็นหญิงให้กับเรือนร่างให้คุณรู้สึกมั่นใจตลอดวัน ใช้ฉีดตามร่างกายได้ตลอดทั้งวัน เพิ่มความหอมนุ่มนวลในจุดน่าสัมผัส</p>\r\n\r\n<p><strong>วิธีใช้ </strong><strong>:</strong>&nbsp; - ฉีดตามร่างกายหลังอาบน้ำเสร็จ</p>\r\n\r\n<p>- สมารถใช้ฉีดตามร่างกาย ก่อนหรือหลังการออกกำลังกาย จะได้กลิ่นหอมพิเศษน่าสัมผัส</p>\r\n\r\n<p>&nbsp;</p>\r\n', '130.00', 9, 0),
(13, 'น้ำหอม Designer Collection R-Series Eau de Parfum', '<p><strong>น้ำหอม Designer Collection R-Series Eau de Parfum</strong></p>\r\n\r\n<p>ปริมาณ 30 มล. ราคา 490 บาท</p>\r\n\r\n<p><strong>สรรพคุณ</strong></p>\r\n\r\n<p>เสน่ห์ หวานโดนใจ ประโลมผิวกายด้วยการบำรุงผิวชุดพิเศษพร้อมกลิ่นหอมอ่อนๆ เพิ่มความโรแมนติคชวนนึกถึงความทรงจำวันหวาน ปล่อยอารมณ์ไปกับกลิ่นหอมอย่างมีระดับที่อยู่กับคุณตราบนานเท่านาน น้ำหอมที่ได้รับการตามหามากที่สุด หอมติดทดนานตลอดทั้งวัน</p>\r\n\r\n<p><strong>วิธีใช้ </strong>: เพียงฉีดเล็กน้อยบริเวณจุดชีพจรต่างๆบนร่างกาย จะทำให้หอมติดทนนานตลอดทั้งวัน</p>\r\n', '490.00', 13, 0),
(16, 'MONT BLANC Lady Emblem Eau de Toilette', 'น้ำหอมผู้หญิง Mont Blanc ที่มาในแบบฉบับของอย่างเต็มตัว กลิ่นออกแนวหวาน ที่รับรองว่าสาวๆ จะต้องหลงรัก เพราะด้วยกลิ่นของกุหลาบชมพู พีท มัสค์ และราสพ์เบอรี่ เรียกได้ว่าเป็นกลิ่นที่ลงตัวสุดๆ', '420.00', 11, 0),
(17, 'NARCISO RODRIGUEZ EDP Natural Spray', '       น้ำหอมจาก นาร์ซิโซ โรดริเกวซ หรือน้ำหอมผู้หญิงที่มาในแนวกลิ่นหอมของมักส์ชวนให้คนรอบข้างของสาวๆ หลงใหลอย่างแน่นอน เหมาะกับผู้หญิงที่ทันสมัย เมื่อฉีดน้ำหอมขวดนี้แล้วจะทำให้คุณน่าค้นหาและดึงดูดใจ', '369.00', 11, 0),
(20, 'GUERLAIN Mon Guerlain G17 Eau De Parfum', '        สุดท้ายแล้วเราขอแนะนำน้ำหอมใหม่ล่าสุดจาก GUERLAIN ซึ่งเป็นน้ำหอมผู้หญิงกลิ่นวนิลา กลิ่นจะออกแนวอ่อนหวาน อ่อนโยน แสดงถึงความเรียบง่าย สามารถฉีดได้ทุกโอกาส ซึ่งเหมาะกับการเป็นน้ำหอมผู้หญิงเสียจริงๆ  ที่สำคัญยังเป็น EDP สาวๆ จึงหมดกังวลได้เลยว่ากลิ่นจะไม่ติดทน เพราะน้ำหอมขวดนี้กลิ่นทนนานอย่างแน่นอน ต้องยอมรับว่าเป็นของใหม่ที่น่าสนใจเลยทีเดียว', '319.00', 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `product_image_id` int(11) NOT NULL,
  `product_image_name` varchar(200) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_image_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`product_image_id`, `product_image_name`, `product_id`, `product_image_order`) VALUES
(89, '4da10ba41370607d7cf2761756eb39d3.jpg', 14, 0),
(90, '5b4f281323e139d8178ab31db2852055.jpg', 15, 0),
(91, 'ae13f6cffd4146599884a771a7365bca.jpg', 16, 0),
(92, 'ef631489fa1870b697e78e5feeb6a884.jpg', 17, 0),
(93, '62fd1b83f7c4d9fd494780208f36a352.jpg', 18, 0),
(94, '8aaacd4c9632e04c4a64386e2ba6fa66.jpg', 19, 0),
(95, 'b656acda05a09f624f6158a8dbfb9c27.jpg', 20, 0),
(96, '6378ba56fd6010cac31933ce8c93cead.jpg', 21, 0),
(97, '3775cf9e87c963f20ef95b069c2d5eaa.jpg', 22, 0),
(98, '2577c7b67815099419b56aa9942c29e8.png', 23, 0),
(99, 'f0c7a31c196c04fd70cd86ea2ce21e90.JPG', 24, 0),
(122, 'e9e9254948dd88c5110304374a0a01f9.jpg', 11, 1),
(123, '46bce54186ebaa5b0e697ab014f26566.jpg', 12, 1),
(124, 'ff1e54284fad2dbae6edc0deffaea1ec.jpg', 13, 1),
(125, 'e1705333a545b81a879c5a209022b489.jpg', 1, 1),
(126, '9c49afaff978702853ea945f8b9b78ea.jpg', 2, 1),
(127, '5971c5c47d9de9703047fa962c625e8b.jpg', 3, 1),
(128, '1a202a72487d769fba05d62c05b24905.jpg', 4, 1),
(129, '3b243c711fc4dd9ec2d0b06a4e652155.jpg', 5, 1),
(130, '3075787e47860bda19c13ee5a07f1c20.jpg', 6, 1),
(131, '9e4dc5086445148ac905af87209baa40.jpg', 7, 1),
(132, 'de30361fe3f77b989b820b371b6df99a.jpg', 8, 1),
(133, 'd7b897480fe288784ad39be3404a9220.jpg', 9, 1),
(134, 'af3c4ea71c65fab37508d07d2b047faf.jpg', 10, 1),
(135, '446cc09a467d36ad2fea9d7ac6f880e6.png', 21, 0),
(136, 'e04346bdab1e03b42c80b57269cd6f83.png', 21, 1),
(137, 'e4a6f6da460cc35edb025211d6b1269f.png', 21, 2),
(138, '8a6e3d809d20680835ce661efe2974be.png', 22, 0),
(139, '26a15ee6a048bb900fe9a26dc504e1e2.png', 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_stock`
--

CREATE TABLE `product_stock` (
  `product_stock_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_stock_value` int(11) NOT NULL DEFAULT '0',
  `product_stock_date` datetime NOT NULL,
  `product_stock_price` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_stock`
--

INSERT INTO `product_stock` (`product_stock_id`, `product_id`, `product_stock_value`, `product_stock_date`, `product_stock_price`) VALUES
(1, 6, 23, '2017-03-28 07:44:16', '0.00'),
(2, 6, 5, '2017-04-12 23:42:21', '0.00'),
(3, 1, 15, '2017-05-23 11:39:00', '0.00'),
(4, 7, 20, '2017-08-24 20:59:19', '0.00'),
(5, 9, 15, '2017-08-24 20:59:26', '0.00'),
(6, 17, 13, '2017-08-24 20:59:43', '0.00'),
(7, 1, 200, '2017-09-09 19:05:51', '0.00'),
(8, 1, 1000, '2017-09-09 19:10:17', '0.00'),
(9, 2, 14, '2017-09-10 15:44:10', '0.00'),
(10, 2, 2, '2017-09-10 15:44:17', '0.00'),
(11, 3, 5, '2017-09-14 13:22:33', '0.00'),
(12, 12, 2, '2017-09-20 10:51:44', '0.00'),
(13, 11, 2, '2017-09-20 10:52:11', '0.00'),
(14, 8, 2, '2017-09-20 10:52:39', '0.00'),
(15, 4, 5, '2017-09-20 11:00:16', '0.00'),
(16, 5, 5, '2017-09-20 11:00:28', '0.00'),
(17, 10, 10, '2017-09-20 11:03:54', '0.00'),
(18, 13, 5, '2017-09-20 11:36:22', '0.00'),
(19, 8, 20, '2017-10-19 09:27:24', '0.00'),
(20, 12, 20, '2017-10-19 09:27:48', '0.00'),
(21, 13, 10, '2017-10-19 09:28:02', '0.00'),
(22, 5, 20, '2017-10-19 09:28:16', '0.00'),
(23, 4, 20, '2017-10-19 09:28:36', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `product_type_id` int(11) NOT NULL,
  `product_type_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `province_id` int(11) NOT NULL COMMENT 'รหัสจังหวัด',
  `province_name` varchar(45) DEFAULT NULL COMMENT 'ชื่อจังหวัด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางจังหวัด';

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `province_name`) VALUES
(1, 'กรุงเทพมหานคร'),
(2, 'สมุทรปราการ'),
(3, 'นนทบุรี'),
(4, 'ปทุมธานี'),
(5, 'พระนครศรีอยุธยา'),
(6, 'อ่างทอง'),
(7, 'ลพบุรี'),
(8, 'สิงห์บุรี'),
(9, 'ชัยนาท'),
(10, 'สระบุรี'),
(11, 'ชลบุรี'),
(12, 'ระยอง'),
(13, 'จันทบุรี'),
(14, 'ตราด'),
(15, 'ฉะเชิงเทรา'),
(16, 'ปราจีนบุรี   '),
(17, 'นครนายก   '),
(18, 'สระแก้ว   '),
(19, 'นครราชสีมา   '),
(20, 'บุรีรัมย์   '),
(21, 'สุรินทร์   '),
(22, 'ศรีสะเกษ   '),
(23, 'อุบลราชธานี   '),
(24, 'ยโสธร   '),
(25, 'ชัยภูมิ   '),
(26, 'อำนาจเจริญ   '),
(27, 'หนองบัวลำภู   '),
(28, 'ขอนแก่น   '),
(29, 'อุดรธานี   '),
(30, 'เลย   '),
(31, 'หนองคาย   '),
(32, 'มหาสารคาม   '),
(33, 'ร้อยเอ็ด   '),
(34, 'กาฬสินธุ์   '),
(35, 'สกลนคร   '),
(36, 'นครพนม   '),
(37, 'มุกดาหาร   '),
(38, 'เชียงใหม่   '),
(39, 'ลำพูน   '),
(40, 'ลำปาง   '),
(41, 'อุตรดิตถ์   '),
(42, 'แพร่   '),
(43, 'น่าน   '),
(44, 'พะเยา   '),
(45, 'เชียงราย   '),
(46, 'แม่ฮ่องสอน   '),
(47, 'นครสวรรค์   '),
(48, 'อุทัยธานี   '),
(49, 'กำแพงเพชร   '),
(50, 'ตาก   '),
(51, 'สุโขทัย   '),
(52, 'พิษณุโลก   '),
(53, 'พิจิตร   '),
(54, 'เพชรบูรณ์   '),
(55, 'ราชบุรี   '),
(56, 'กาญจนบุรี   '),
(57, 'สุพรรณบุรี   '),
(58, 'นครปฐม   '),
(59, 'สมุทรสาคร   '),
(60, 'สมุทรสงคราม   '),
(61, 'เพชรบุรี   '),
(62, 'ประจวบคีรีขันธ์   '),
(63, 'นครศรีธรรมราช   '),
(64, 'กระบี่   '),
(65, 'พังงา   '),
(66, 'ภูเก็ต   '),
(67, 'สุราษฎร์ธานี   '),
(68, 'ระนอง   '),
(69, 'ชุมพร   '),
(70, 'สงขลา   '),
(71, 'สตูล   '),
(72, 'ตรัง   '),
(73, 'พัทลุง   '),
(74, 'ปัตตานี   '),
(75, 'ยะลา   '),
(76, 'นราธิวาส   '),
(77, 'บึงกาฬ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_username_UNIQUE` (`admin_username`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `delivery_status`
--
ALTER TABLE `delivery_status`
  ADD PRIMARY KEY (`delivery_status_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `member_address_delivery`
--
ALTER TABLE `member_address_delivery`
  ADD PRIMARY KEY (`mad_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`order_list_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`order_status_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`payment_type_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`product_image_id`);

--
-- Indexes for table `product_stock`
--
ALTER TABLE `product_stock`
  ADD PRIMARY KEY (`product_stock_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_type_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`province_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ดูแล', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสหมวดหมู่', AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการจัดส่ง', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `delivery_status`
--
ALTER TABLE `delivery_status`
  MODIFY `delivery_status_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสถานะการจัดส่ง';
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสมาชิก', AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `member_address_delivery`
--
ALTER TABLE `member_address_delivery`
  MODIFY `mad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสใบสั่งซื้อ';
--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `order_list_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `order_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการชำระเงิน';
--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `payment_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า', AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `product_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
--
-- AUTO_INCREMENT for table `product_stock`
--
ALTER TABLE `product_stock`
  MODIFY `product_stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_type_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
