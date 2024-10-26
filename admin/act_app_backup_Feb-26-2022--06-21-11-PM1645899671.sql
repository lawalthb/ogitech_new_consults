

CREATE TABLE `acct_group_tb` (
  `acct_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(30) NOT NULL,
  `step` int(1) NOT NULL,
  `code` varchar(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`acct_group_id`),
  UNIQUE KEY `step` (`step`),
  KEY `step_2` (`step`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO acct_group_tb VALUES("1","assets","1","1001","1");
INSERT INTO acct_group_tb VALUES("2","liabilities","2","1002","1");
INSERT INTO acct_group_tb VALUES("3","equity","3","1003","1");
INSERT INTO acct_group_tb VALUES("4","revenue","4","1004","1");
INSERT INTO acct_group_tb VALUES("5","expenses","5","1005","1");



CREATE TABLE `auth` (
  `auth_id` int(11) NOT NULL AUTO_INCREMENT,
  `auth_username` varchar(250) NOT NULL,
  `auth_password` varchar(250) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`auth_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO auth VALUES("1","makinde","e10adc3949ba59abbe56e057f20f883e","Super Admin-","1","1");
INSERT INTO auth VALUES("2","admin","20cc385f46ce58e52d714a99829edabd","Accountant-","3","1");
INSERT INTO auth VALUES("3","debby25","0273933ebbdgfg5464vcv296bd5d6dfb2f99963b5b7454","Accountant-","3","0");
INSERT INTO auth VALUES("5","Juliet","e10adc3949ba59abbe56e057f20f883e","Juliet Enebeli","2","0");
INSERT INTO auth VALUES("9","Charity","e10adc3949ba59abbe56e057f20f883e","Accountant-","3","0");
INSERT INTO auth VALUES("11","yadav","e10adc3949ba59abbe56e057f20f883e","indrajeet yadav","4","0");
INSERT INTO auth VALUES("13","simon","7af9ac588fbd922528e3a53f86392546","Accountant-","3","0");
INSERT INTO auth VALUES("14","judith","e10adc3949ba59abbe56e057f20f883e","Omojefe Judith","2","0");



CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(256) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

INSERT INTO categories VALUES("1","LD Printed Water Roll");
INSERT INTO categories VALUES("2","LD Shrink Sheet Plain");
INSERT INTO categories VALUES("3","LD Shrink Tube Plain");
INSERT INTO categories VALUES("4","LD Plain Water Roll");
INSERT INTO categories VALUES("5","HD Plain PKB Bag");
INSERT INTO categories VALUES("6","HD Plain PKB Roll");
INSERT INTO categories VALUES("7","Tissue Nylon");
INSERT INTO categories VALUES("8","BOPP Bread Nylon");
INSERT INTO categories VALUES("9","HD Plain Industrial bag");
INSERT INTO categories VALUES("10","INK");
INSERT INTO categories VALUES("11","Chemical");
INSERT INTO categories VALUES("12","Shopping Bag");
INSERT INTO categories VALUES("13","LD LAUNDRY BAG");
INSERT INTO categories VALUES("14","LD YOGHURT ROLL");
INSERT INTO categories VALUES("15","PP Nylon");
INSERT INTO categories VALUES("16","DISPENSER Nylon");
INSERT INTO categories VALUES("17","Others /Services");
INSERT INTO categories VALUES("18","Scrab/Wastage");
INSERT INTO categories VALUES("19","Cylinders");
INSERT INTO categories VALUES("20","GEEPEE Products");
INSERT INTO categories VALUES("21","RUBBER STEREO");
INSERT INTO categories VALUES("22","Label Nylon");
INSERT INTO categories VALUES("23","CORE");
INSERT INTO categories VALUES("24","Laminated Printed Rolls");
INSERT INTO categories VALUES("25","BOPP PLAIN NYLON ROLL");
INSERT INTO categories VALUES("26","Printed Bopp Rolls");
INSERT INTO categories VALUES("27","Plain LD Bags");



CREATE TABLE `customers` (
  `cus_id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_name` varchar(250) NOT NULL,
  `cus_mobile` varchar(250) NOT NULL,
  `cus_email` varchar(250) NOT NULL,
  `cus_marketer_id` int(11) NOT NULL,
  `cus_address` varchar(250) NOT NULL,
  `ac_type` varchar(20) NOT NULL,
  `act_type_id` int(11) NOT NULL DEFAULT '1',
  `act_grp_id` int(11) NOT NULL DEFAULT '1',
  `opening_balance` decimal(20,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`cus_id`)
) ENGINE=MyISAM AUTO_INCREMENT=542 DEFAULT CHARSET=latin1;

INSERT INTO customers VALUES("339","Bank Charges -Exp","08132712715","email","1","lagos","0","12","5","0.00");
INSERT INTO customers VALUES("337","Stationery (office Items) -Exp","08132712715","email","1","lagos","0","12","5","0.00");
INSERT INTO customers VALUES("332","Food & Water Exp","08132712715","email","1","lagos","0","12","5","0.00");
INSERT INTO customers VALUES("327","Loading & Offloading Exp","08132712715","email","1","lagos","0","12","5","0.00");
INSERT INTO customers VALUES("314","Personal Bank","08132712715","email","1","lagos","0","7","1","0.00");
INSERT INTO customers VALUES("205","Suspense A/c","","","1","","suspense ac","1","1","0.00");
INSERT INTO customers VALUES("303","Cash at hand","0842455","","11","mry land","1","7","1","0.00");
INSERT INTO customers VALUES("307","Zenith Bank - 1017317112","08132712715","email","1","lagos","0","7","1","0.00");
INSERT INTO customers VALUES("308","bank 2","08132712715","email","1","lagos","0","7","1","0.00");
INSERT INTO customers VALUES("311","Transportation (Individual)","08132712715","email","1","lagos","0","12","5","0.00");
INSERT INTO customers VALUES("312","PHCN - NEPA BILL","08132712715","email","1","lagos","0","12","5","0.00");
INSERT INTO customers VALUES("313","Opening Balance","08132712715","email","1","lagos","0","7","1","0.00");
INSERT INTO customers VALUES("397","Discount account","08132712715","email","1","lagos","0","12","5","0.00");
INSERT INTO customers VALUES("445","Transportation cost","08132712715","email","1","lagos","0","12","5","0.00");
INSERT INTO customers VALUES("528","ACT - RECEIVABLE ","","","1","lagos","0","1","1","0.00");
INSERT INTO customers VALUES("529","ACT - PAYABLE","","","1","lagos","0","2","2","0.00");
INSERT INTO customers VALUES("530","Mayor Biscuit Company Limited","","","1","lagos","0","1","1","0.00");
INSERT INTO customers VALUES("531","AFRICAN CONSUMER (Dabur)","08120655397","warehouse.ng@dabur.com","1","lagos","0","1","1","0.00");
INSERT INTO customers VALUES("532","Shakti Nig. Ltd.","08132712715","lawalthb@gmail.com","1","lagos","0","2","2","0.00");
INSERT INTO customers VALUES("533","OSELEN FOODS","08163741738","LAW@GMAIL.COM","1","lagos","0","1","1","0.00");
INSERT INTO customers VALUES("535","SALIENT INDUSTRIES LIMITED","","","1","lagos","0","2","2","0.00");
INSERT INTO customers VALUES("536","BELLA","","","1","lagos","0","1","1","0.00");
INSERT INTO customers VALUES("537","Josephine","","","1","lagos","0","1","1","0.00");
INSERT INTO customers VALUES("538","AA FOODS","","","1","lagos","0","1","1","0.00");
INSERT INTO customers VALUES("539","Shongai Packaging","","","1","lagos","0","1","1","0.00");
INSERT INTO customers VALUES("540","Hello Product Limited","08101962701, 08053371494","olowoyin.aro@helloproductsafrica.com","1","lagos","0","1","1","0.00");
INSERT INTO customers VALUES("541","XTRA LARGE FARM","","","1","lagos","0","1","1","0.00");



CREATE TABLE `documents` (
  `documnents_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `document_date` date NOT NULL,
  `document_no` varchar(100) COLLATE utf8_bin NOT NULL,
  `document_comments` varchar(4000) COLLATE utf8_bin NOT NULL,
  `lpo_grn` varchar(500) COLLATE utf8_bin NOT NULL,
  `document_type` smallint(5) unsigned NOT NULL,
  `inserted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `auth_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`documnents_id`),
  KEY `documents_document_date_idx` (`document_date`),
  KEY `documents_document_type_idx` (`document_type`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO documents VALUES("1","2021-03-03","1","Payment Method: 80% Advance, Balance on delivery  <br >Transportation: We deliver","1003","890","2021-03-03 10:34:55","1","2021-03-03 10:34:55","0");
INSERT INTO documents VALUES("2","2021-02-27","100","we supplied 3 times","","11","2021-03-04 15:11:59","1","2021-03-04 15:11:59","0");
INSERT INTO documents VALUES("3","2021-04-17","101","payment on","1003","890","2021-04-17 12:45:00","1","2021-04-17 12:45:00","0");
INSERT INTO documents VALUES("4","2021-04-17","1001","","1001","21","2021-04-17 13:16:29","1","2021-04-17 13:16:29","0");
INSERT INTO documents VALUES("5","2021-04-07","1","paid complete","","31","2021-04-17 13:29:15","1","2021-04-17 13:29:15","0");
INSERT INTO documents VALUES("6","2021-04-17","101","","","11","2021-04-17 16:49:19","1","2021-04-17 16:49:19","0");
INSERT INTO documents VALUES("7","2021-04-07","2","","","31","2021-04-17 16:50:53","1","2021-04-17 16:50:53","0");
INSERT INTO documents VALUES("8","2021-04-18","102","","","11","2021-04-18 10:59:24","1","2021-04-18 10:59:24","0");
INSERT INTO documents VALUES("9","2021-04-18","3","paid by olu","","31","2021-04-18 11:03:00","1","2021-04-18 11:03:00","0");
INSERT INTO documents VALUES("10","2021-04-18","4","","","31","2021-04-18 12:09:02","1","2021-04-18 12:09:02","0");
INSERT INTO documents VALUES("11","2021-04-16","2003","","101","21","2021-04-18 16:17:01","1","2021-04-18 16:17:01","0");
INSERT INTO documents VALUES("12","2021-04-18","103","supplied by mr mathew","","11","2021-04-18 16:28:39","1","2021-04-18 16:28:39","0");
INSERT INTO documents VALUES("13","2021-04-18","5","","","31","2021-04-18 16:38:42","1","2021-04-18 16:38:42","0");
INSERT INTO documents VALUES("14","2021-04-17","1","paid 2m at first, part payment","","91","2021-04-18 16:46:02","1","2021-04-18 16:46:02","0");
INSERT INTO documents VALUES("15","2021-04-18","1","we bought at ikeja, by miss Oluwakemi","","51","2021-04-18 16:50:35","1","2021-04-18 16:50:35","0");
INSERT INTO documents VALUES("16","2021-04-18","1","being deposited to company zenith bank account","","41","2021-04-18 16:58:45","1","2021-04-18 16:58:45","0");
INSERT INTO documents VALUES("17","2021-04-19","104","","","11","2021-04-18 17:09:52","1","2021-04-18 17:09:52","0");
INSERT INTO documents VALUES("19","2021-08-08","106","","1003","890","2021-08-08 19:05:45","1","2021-08-08 19:05:45","0");
INSERT INTO documents VALUES("23","2021-08-17","105","","1003","890","2021-08-17 16:30:58","1","2021-08-17 16:30:58","0");
INSERT INTO documents VALUES("24","2021-08-17","107","","1003","890","2021-08-17 16:40:00","1","2021-08-17 16:40:00","0");
INSERT INTO documents VALUES("25","2021-08-17","108","","1003","890","2021-08-17 16:41:53","1","2021-08-17 16:41:53","0");
INSERT INTO documents VALUES("26","2021-08-17","109","","1003","890","2021-08-17 16:46:06","1","2021-08-17 16:46:06","0");
INSERT INTO documents VALUES("27","2021-08-18","126","","","22","2021-08-18 08:49:13","1","2021-08-18 08:49:13","0");
INSERT INTO documents VALUES("28","2021-08-18","105","","","11","2021-08-18 10:14:08","1","2021-08-18 10:14:08","0");
INSERT INTO documents VALUES("30","2021-08-17","126","","","11","2021-08-18 11:57:58","1","2021-08-18 11:57:58","0");
INSERT INTO documents VALUES("31","2021-08-20","127","","1003","890","2021-08-20 14:55:23","1","2021-08-20 14:55:23","0");
INSERT INTO documents VALUES("32","2021-08-20","127","","1003","890","2021-08-20 15:09:15","1","2021-08-20 15:09:15","0");
INSERT INTO documents VALUES("33","2021-08-24","128","","","11","2021-08-24 13:53:55","1","2021-08-24 13:53:55","0");
INSERT INTO documents VALUES("34","2021-08-24","129","","","11","2021-08-24 14:00:12","1","2021-08-24 14:00:12","0");
INSERT INTO documents VALUES("35","2021-08-25","130","","","11","2021-08-26 11:38:50","1","2021-08-26 11:38:50","0");
INSERT INTO documents VALUES("36","2021-08-27","110","","1003","890","2021-08-27 09:51:23","1","2021-08-27 09:51:23","0");
INSERT INTO documents VALUES("37","2021-08-27","111","","1003","890","2021-08-27 09:53:33","1","2021-08-27 09:53:33","0");
INSERT INTO documents VALUES("38","2021-08-27","112","","1003","890","2021-08-27 09:56:08","1","2021-08-27 09:56:08","0");
INSERT INTO documents VALUES("39","2021-08-27","113","","1003","890","2021-08-27 10:02:31","1","2021-08-27 10:02:31","0");
INSERT INTO documents VALUES("40","2021-08-27","114","","1003","890","2021-08-27 10:23:08","1","2021-08-27 10:23:08","0");
INSERT INTO documents VALUES("41","2021-08-27","131","","1003","890","2021-08-27 12:11:37","1","2021-08-27 12:11:37","0");
INSERT INTO documents VALUES("43","2021-08-30","115","","1003","890","2021-08-30 13:39:06","1","2021-08-30 13:39:06","0");
INSERT INTO documents VALUES("45","2021-08-30","131","","","11","2021-08-30 13:58:34","1","2021-08-30 13:58:34","0");
INSERT INTO documents VALUES("46","2021-09-03","118","","1003","890","2021-09-03 11:23:02","1","2021-09-03 11:23:02","0");
INSERT INTO documents VALUES("47","2021-09-06","132","","","11","2021-09-06 11:38:14","1","2021-09-06 11:38:14","0");
INSERT INTO documents VALUES("48","2021-09-06","119","","1003","890","2021-09-06 13:57:18","1","2021-09-06 13:57:18","0");
INSERT INTO documents VALUES("49","2021-09-06","120","","1003","890","2021-09-06 14:40:52","1","2021-09-06 14:40:52","0");
INSERT INTO documents VALUES("50","2021-09-06","121","","1003","890","2021-09-06 14:43:35","1","2021-09-06 14:43:35","0");
INSERT INTO documents VALUES("51","2021-09-06","122","","1003","890","2021-09-06 16:05:03","1","2021-09-06 16:05:03","0");
INSERT INTO documents VALUES("52","2021-09-07","133","","","11","2021-09-07 07:58:28","1","2021-09-07 07:58:28","0");
INSERT INTO documents VALUES("53","2021-09-08","134","","1003","890","2021-09-08 11:34:55","1","2021-09-08 11:34:55","0");
INSERT INTO documents VALUES("57","2021-09-13","135","","","11","2021-09-15 10:31:57","1","2021-09-15 10:31:57","0");
INSERT INTO documents VALUES("58","2021-09-14","136","","","11","2021-09-15 10:32:59","1","2021-09-15 10:32:59","0");
INSERT INTO documents VALUES("59","2021-09-14","137","","","11","2021-09-15 10:36:36","1","2021-09-15 10:36:36","0");
INSERT INTO documents VALUES("60","2021-09-08","134","","","11","2021-09-15 11:41:37","1","2021-09-15 11:41:37","0");
INSERT INTO documents VALUES("61","2021-09-15","123","","1003","890","2021-09-15 14:06:01","1","2021-09-15 14:06:01","0");
INSERT INTO documents VALUES("62","2021-09-15","124","","1003","890","2021-09-15 14:08:37","1","2021-09-15 14:08:37","0");
INSERT INTO documents VALUES("63","2021-09-15","125","","1003","890","2021-09-15 14:09:24","1","2021-09-15 14:09:24","0");
INSERT INTO documents VALUES("66","2021-09-15","138","","","11","2021-09-15 16:28:16","1","2021-09-15 16:28:16","0");
INSERT INTO documents VALUES("67","2021-09-20","139","","1003","890","2021-09-20 17:01:23","1","2021-09-20 17:01:23","0");
INSERT INTO documents VALUES("68","2021-09-22","139","","1003","890","2021-09-22 15:36:57","1","2021-09-22 15:36:57","0");
INSERT INTO documents VALUES("69","2021-09-22","139","","1003","890","2021-09-22 15:39:14","1","2021-09-22 15:39:14","0");
INSERT INTO documents VALUES("70","2021-09-20","139","","","11","2021-09-22 17:25:03","1","2021-09-22 17:25:03","0");
INSERT INTO documents VALUES("71","2021-09-20","140","","","11","2021-09-22 17:28:13","1","2021-09-22 17:28:13","0");
INSERT INTO documents VALUES("72","2021-09-21","141","","","11","2021-09-22 17:32:57","1","2021-09-22 17:32:57","0");
INSERT INTO documents VALUES("73","2021-09-28","126","","1003","890","2021-09-28 11:38:22","1","2021-09-28 11:38:22","0");
INSERT INTO documents VALUES("74","2021-09-28","142","","","11","2021-09-30 13:25:12","1","2021-09-30 13:25:12","0");
INSERT INTO documents VALUES("75","2021-09-29","143","","","11","2021-09-30 13:40:09","1","2021-09-30 13:40:09","0");
INSERT INTO documents VALUES("77","2021-09-30","145","","","11","2021-10-01 11:29:23","1","2021-10-01 11:29:23","0");
INSERT INTO documents VALUES("78","2021-10-05","146","","1003","890","2021-10-05 09:55:53","1","2021-10-05 09:55:53","0");
INSERT INTO documents VALUES("79","2021-10-05","145","","1003","890","2021-10-05 09:58:59","1","2021-10-05 09:58:59","0");
INSERT INTO documents VALUES("80","2021-10-07","146","","","11","2021-10-07 15:06:03","1","2021-10-07 15:06:03","0");
INSERT INTO documents VALUES("81","2021-10-12","147","","1003","890","2021-10-12 12:43:04","1","2021-10-12 12:43:04","0");
INSERT INTO documents VALUES("83","2021-10-14","147","","","11","2021-10-16 11:53:16","1","2021-10-16 11:53:16","0");
INSERT INTO documents VALUES("84","2021-10-01","144","","","11","2021-10-22 16:04:54","1","2021-10-22 16:04:54","0");
INSERT INTO documents VALUES("85","2021-10-20","148","","","11","2021-10-27 13:26:34","1","2021-10-27 13:26:34","0");
INSERT INTO documents VALUES("86","2021-10-25","149","","","11","2021-10-27 13:31:11","1","2021-10-27 13:31:11","0");
INSERT INTO documents VALUES("88","2021-11-01","150","","","11","2021-11-01 18:01:11","1","2021-11-01 18:01:11","0");
INSERT INTO documents VALUES("89","2021-11-02","150","","","11","2021-11-03 13:12:30","1","2021-11-03 13:12:30","0");
INSERT INTO documents VALUES("90","2021-11-03","151","","1003","890","2021-11-03 14:06:59","1","2021-11-03 14:06:59","0");
INSERT INTO documents VALUES("91","2021-11-08","151","","1003","890","2021-11-08 14:37:53","1","2021-11-08 14:37:53","0");
INSERT INTO documents VALUES("92","2021-11-08","152","","1003","890","2021-11-08 14:39:13","1","2021-11-08 14:39:13","0");
INSERT INTO documents VALUES("94","2021-11-08","152","","","11","2021-11-09 12:43:01","1","2021-11-09 12:43:01","0");
INSERT INTO documents VALUES("95","2021-11-08","151","","","11","2021-11-09 12:44:48","1","2021-11-09 12:44:48","0");
INSERT INTO documents VALUES("96","2021-11-16","152","","1003","890","2021-11-16 14:09:47","1","2021-11-16 14:09:47","0");
INSERT INTO documents VALUES("97","2021-11-23","153","","","11","2021-11-23 15:31:22","1","2021-11-23 15:31:22","0");
INSERT INTO documents VALUES("98","2021-11-29","155","","1003","890","2021-11-29 15:19:45","1","2021-11-29 15:19:45","0");
INSERT INTO documents VALUES("99","2021-11-30","154","","1003","890","2021-11-30 13:57:41","1","2021-11-30 13:57:41","0");
INSERT INTO documents VALUES("100","2021-12-03","155","","","11","2021-12-06 12:35:59","1","2021-12-06 12:35:59","0");
INSERT INTO documents VALUES("101","2021-12-08","156","","1003","890","2021-12-08 12:47:58","1","2021-12-08 12:47:58","0");
INSERT INTO documents VALUES("102","2021-12-08","156","","1003","890","2021-12-08 13:07:23","1","2021-12-08 13:07:23","0");
INSERT INTO documents VALUES("103","2021-12-08","156","","1003","890","2021-12-08 13:47:37","1","2021-12-08 13:47:37","0");
INSERT INTO documents VALUES("104","2021-12-10","156","","1003","890","2021-12-10 10:29:01","1","2021-12-10 10:29:01","0");
INSERT INTO documents VALUES("105","2021-12-23","156","","","11","2021-12-30 10:24:08","1","2021-12-30 10:24:08","0");
INSERT INTO documents VALUES("106","2021-11-18","153","","","11","2021-12-30 12:11:06","1","2021-12-30 12:11:06","0");
INSERT INTO documents VALUES("107","2022-01-10","154","","1003","890","2022-01-10 16:35:10","1","2022-01-10 16:35:10","0");
INSERT INTO documents VALUES("108","2022-01-10","154","","1003","890","2022-01-10 17:00:55","1","2022-01-10 17:00:55","0");
INSERT INTO documents VALUES("109","2022-01-21","154","","1003","890","2022-01-21 10:00:57","1","2022-01-21 10:00:57","0");
INSERT INTO documents VALUES("110","2022-01-27","154","","","11","2022-01-27 10:02:46","1","2022-01-27 10:02:46","0");
INSERT INTO documents VALUES("111","2022-02-10","159","","1003","890","2022-02-10 08:07:58","1","2022-02-10 08:07:58","0");
INSERT INTO documents VALUES("112","2022-02-10","160","","1003","890","2022-02-10 08:16:27","1","2022-02-10 08:16:27","0");
INSERT INTO documents VALUES("113","2022-02-11","155","","1003","890","2022-02-11 18:47:34","1","2022-02-11 18:47:34","0");
INSERT INTO documents VALUES("114","2022-02-11","157","","1003","890","2022-02-11 18:51:23","1","2022-02-11 18:51:23","0");
INSERT INTO documents VALUES("115","2022-02-18","159","","","11","2022-02-19 09:45:52","1","2022-02-19 09:45:52","0");



CREATE TABLE `invoice_line_items` (
  `order_items_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` decimal(10,2) NOT NULL,
  `product_rate` decimal(10,2) NOT NULL,
  `purchase_rate` decimal(10,2) DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `commet` text,
  PRIMARY KEY (`order_items_id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

INSERT INTO invoice_line_items VALUES("1","2","698","151.20","1800.00","1500.00","272160.00","13 Rolls");
INSERT INTO invoice_line_items VALUES("2","2","698","406.71","1800.00","1500.00","732078.00","32 Rolls");
INSERT INTO invoice_line_items VALUES("3","2","698","414.60","1800.00","1500.00","746280.00","40 Rolls");
INSERT INTO invoice_line_items VALUES("4","4","6","1005.00","900.00","0.00","904500.00","30 rolls");
INSERT INTO invoice_line_items VALUES("5","4","21","500.00","1070.00","0.00","535000.00","8 rolls");
INSERT INTO invoice_line_items VALUES("6","6","49","34.00","1500.00","1500.00","51000.00","");
INSERT INTO invoice_line_items VALUES("7","6","49","45.00","1500.00","1500.00","67500.00","");
INSERT INTO invoice_line_items VALUES("8","8","49","100.00","1000.00","1500.00","100000.00","");
INSERT INTO invoice_line_items VALUES("9","11","699","500.00","2300.00","0.00","1150000.00","40 rolls");
INSERT INTO invoice_line_items VALUES("10","12","699","300.00","2500.00","2300.00","750000.00","25 rolls");
INSERT INTO invoice_line_items VALUES("11","17","699","220.00","2500.00","2300.00","550000.00","15rolls");
INSERT INTO invoice_line_items VALUES("12","27","703","534.70","2580.00","0.00","1379526.00","");
INSERT INTO invoice_line_items VALUES("13","27","715","146.50","2902.50","0.00","425216.25","");
INSERT INTO invoice_line_items VALUES("14","28","0","534.70","3063.75","0.00","1638187.13","");
INSERT INTO invoice_line_items VALUES("20","34","704","661.80","3063.75","2580.00","2027589.75","");
INSERT INTO invoice_line_items VALUES("19","33","704","307.70","3063.75","2580.00","942715.88","");
INSERT INTO invoice_line_items VALUES("17","30","703","534.70","3063.75","2580.00","1638187.13","");
INSERT INTO invoice_line_items VALUES("18","30","715","146.50","3063.75","2902.50","448839.38","");
INSERT INTO invoice_line_items VALUES("21","35","718","484.06","1450.00","0.00","701887.00","");
INSERT INTO invoice_line_items VALUES("27","45","725","597.70","2633.75","2300.00","1574192.38","");
INSERT INTO invoice_line_items VALUES("26","45","724","565.85","3010.00","2800.00","1703208.50","");
INSERT INTO invoice_line_items VALUES("28","47","704","269.20","3063.75","2580.00","824761.50","");
INSERT INTO invoice_line_items VALUES("29","52","704","681.60","3063.75","2580.00","2088252.00","44rolls");
INSERT INTO invoice_line_items VALUES("36","60","703","1015.60","3063.75","2580.00","3111544.50","");
INSERT INTO invoice_line_items VALUES("34","58","704","651.40","3063.75","2580.00","1995726.75","");
INSERT INTO invoice_line_items VALUES("33","57","704","415.60","3063.75","2580.00","1273294.50","");
INSERT INTO invoice_line_items VALUES("35","59","713","494.20","3063.75","2902.50","1514105.25","");
INSERT INTO invoice_line_items VALUES("39","66","713","449.43","3063.75","2902.50","1376941.16","printed Laminated (34rolls)");
INSERT INTO invoice_line_items VALUES("40","70","724","100.60","3010.00","2800.00","302806.00","Printed BOPP Roll");
INSERT INTO invoice_line_items VALUES("41","71","713","285.56","3063.75","2902.50","874884.45","Printed Laminated Rolls  20rolls");
INSERT INTO invoice_line_items VALUES("42","72","713","763.45","3063.75","2902.50","2339019.94","Printed Laminated Rolls  58rolls");
INSERT INTO invoice_line_items VALUES("43","74","713","906.90","3063.75","2902.50","2778514.88","68 Rolls");
INSERT INTO invoice_line_items VALUES("44","75","724","312.92","3010.00","2800.00","941889.20","(18 Rolls)");
INSERT INTO invoice_line_items VALUES("54","84","727","510.00","3100.00","3000.00","1581000.00","(27 Rolls)");
INSERT INTO invoice_line_items VALUES("46","77","724","604.30","3010.00","2800.00","1818943.00","(27 Rolls)");
INSERT INTO invoice_line_items VALUES("47","78","724","604.30","3010.00","2800.00","1818943.00","(27 Rolls)");
INSERT INTO invoice_line_items VALUES("48","79","724","615.20","3010.00","2800.00","1851752.00","(27 Rolls)");
INSERT INTO invoice_line_items VALUES("49","80","704","348.58","3063.75","2580.00","1067961.97","(18 ROLLS)");
INSERT INTO invoice_line_items VALUES("53","83","704","486.50","3063.75","2580.00","1490514.38","( 29 Rolls)");
INSERT INTO invoice_line_items VALUES("52","83","703","424.26","3063.75","2580.00","1299826.58","( 24 Rolls)");
INSERT INTO invoice_line_items VALUES("55","85","713","806.50","3063.75","2902.50","2470914.38","(67 Rolls)");
INSERT INTO invoice_line_items VALUES("56","86","703","469.40","3063.75","2580.00","1438124.25","(33Rolls)");
INSERT INTO invoice_line_items VALUES("58","88","727","516.25","3150.00","3000.00","1626187.50","(27 Rolls)");
INSERT INTO invoice_line_items VALUES("59","89","704","441.85","3063.75","2580.00","1353717.94","( 34 Rolls )");
INSERT INTO invoice_line_items VALUES("60","89","724","121.95","3010.00","2800.00","367069.50","( 9 Rolls )");
INSERT INTO invoice_line_items VALUES("63","95","724","80.15","3225.00","2800.00","258483.75","(6 Rolls)");
INSERT INTO invoice_line_items VALUES("62","94","724","928.50","3225.00","2800.00","2994412.50","(78 Rolls)");
INSERT INTO invoice_line_items VALUES("64","97","704","956.05","3278.75","2580.00","3134648.94","70rolls");
INSERT INTO invoice_line_items VALUES("65","100","713","1165.90","3278.75","2902.50","3822694.63","84Rolls");
INSERT INTO invoice_line_items VALUES("66","105","703","1067.45","3278.75","2580.00","3499901.69","63Rolls");
INSERT INTO invoice_line_items VALUES("67","106","704","956.05","3278.75","2580.00","3134648.94","");
INSERT INTO invoice_line_items VALUES("68","110","732","7.00","8000.00","7000.00","56000.00","(1 Bag)");
INSERT INTO invoice_line_items VALUES("69","115","713","1019.80","3268.00","2902.50","3332706.40","69Rolls");



CREATE TABLE `invoice_line_items2_po` (
  `order_items_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` decimal(10,2) NOT NULL,
  `product_rate` decimal(10,2) NOT NULL,
  `purchase_rate` decimal(10,2) DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `commet` text,
  PRIMARY KEY (`order_items_id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

INSERT INTO invoice_line_items2_po VALUES("1","1","445","1000.00","1698.50","861.00","1698500.00","Propose no. of roll: 50");
INSERT INTO invoice_line_items2_po VALUES("2","3","49","12.00","1500.00","1500.00","18000.00","");
INSERT INTO invoice_line_items2_po VALUES("3","3","49","343.00","1500.00","1500.00","514500.00","");
INSERT INTO invoice_line_items2_po VALUES("4","3","49","3.00","1500.00","1500.00","4500.00","");
INSERT INTO invoice_line_items2_po VALUES("5","3","49","6.00","1500.00","1500.00","9000.00","");
INSERT INTO invoice_line_items2_po VALUES("6","18","702","500.00","2580.00","2580.00","1290000.00","50 Roll");
INSERT INTO invoice_line_items2_po VALUES("7","19","704","1000.00","3063.75","2580.00","3063750.00","90 Rolls");
INSERT INTO invoice_line_items2_po VALUES("8","20","705","500.00","3063.75","2580.00","1531875.00","40 rolls");
INSERT INTO invoice_line_items2_po VALUES("9","21","706","500.00","3063.00","2.00","1531500.00","");
INSERT INTO invoice_line_items2_po VALUES("10","22","707","500.00","2850.00","2400.00","1425000.00","");
INSERT INTO invoice_line_items2_po VALUES("11","20","712","500.00","2633.75","2580.00","1316875.00","");
INSERT INTO invoice_line_items2_po VALUES("12","21","713","500.00","3063.75","2902.50","1531875.00","");
INSERT INTO invoice_line_items2_po VALUES("13","22","714","1000.00","3063.75","2902.50","3063750.00","");
INSERT INTO invoice_line_items2_po VALUES("14","23","712","500.00","2633.75","2580.00","1316875.00","");
INSERT INTO invoice_line_items2_po VALUES("15","24","714","1000.00","3063.75","2902.50","3063750.00","");
INSERT INTO invoice_line_items2_po VALUES("16","25","713","1000.00","3063.75","2902.50","3063750.00","");
INSERT INTO invoice_line_items2_po VALUES("17","26","715","1000.00","3063.75","2902.50","3063750.00","");
INSERT INTO invoice_line_items2_po VALUES("18","31","716","1000.00","2350.00","2.00","2350000.00","");
INSERT INTO invoice_line_items2_po VALUES("19","32","717","1000.00","2526.25","2350.00","2526250.00","");
INSERT INTO invoice_line_items2_po VALUES("20","36","713","1000.00","3063.75","0.00","3063750.00","");
INSERT INTO invoice_line_items2_po VALUES("21","37","720","500.00","3063.75","3063.00","1531875.00","");
INSERT INTO invoice_line_items2_po VALUES("22","38","721","1000.00","3063.75","0.00","3063750.00","");
INSERT INTO invoice_line_items2_po VALUES("23","39","704","1000.00","3063.75","0.00","3063750.00","");
INSERT INTO invoice_line_items2_po VALUES("24","40","722","1000.00","3010.00","3010.00","3010000.00","");
INSERT INTO invoice_line_items2_po VALUES("25","41","717","1000.00","2687.50","2350.00","2687500.00","");
INSERT INTO invoice_line_items2_po VALUES("26","43","702","500.00","2800.00","0.00","1400000.00","");
INSERT INTO invoice_line_items2_po VALUES("27","46","703","500.00","3063.75","2580.00","1531875.00","");
INSERT INTO invoice_line_items2_po VALUES("28","48","704","2000.00","3063.75","2580.00","6127500.00","");
INSERT INTO invoice_line_items2_po VALUES("29","48","713","1500.00","3063.75","2902.50","4595625.00","");
INSERT INTO invoice_line_items2_po VALUES("30","48","703","1000.00","3063.75","2580.00","3063750.00","");
INSERT INTO invoice_line_items2_po VALUES("31","48","719","500.00","3063.75","2850.00","1531875.00","");
INSERT INTO invoice_line_items2_po VALUES("32","48","721","500.00","3063.75","3063.00","1531875.00","");
INSERT INTO invoice_line_items2_po VALUES("33","49","704","2000.00","3063.75","2580.00","6127500.00","");
INSERT INTO invoice_line_items2_po VALUES("34","49","713","1500.00","3063.75","2902.50","4595625.00","");
INSERT INTO invoice_line_items2_po VALUES("35","50","703","1000.00","3063.75","2580.00","3063750.00","");
INSERT INTO invoice_line_items2_po VALUES("36","50","719","500.00","3063.00","2850.00","1531500.00","");
INSERT INTO invoice_line_items2_po VALUES("37","50","721","500.00","3063.75","3063.00","1531875.00","");
INSERT INTO invoice_line_items2_po VALUES("38","51","718","500.00","1500.00","1300.00","750000.00","");
INSERT INTO invoice_line_items2_po VALUES("39","53","726","500.00","2850.00","2800.00","1425000.00","");
INSERT INTO invoice_line_items2_po VALUES("40","61","703","1000.00","3063.75","2580.00","3063750.00","");
INSERT INTO invoice_line_items2_po VALUES("41","62","713","1000.00","3063.75","2902.50","3063750.00","");
INSERT INTO invoice_line_items2_po VALUES("42","63","704","1000.00","3063.75","2580.00","3063750.00","");
INSERT INTO invoice_line_items2_po VALUES("43","67","724","1000.00","3010.00","2800.00","3010000.00","Printed BOPP");
INSERT INTO invoice_line_items2_po VALUES("44","68","704","2000.00","3063.75","2580.00","6127500.00","Printed Laminated Rolls");
INSERT INTO invoice_line_items2_po VALUES("45","69","713","2000.00","3063.75","2902.50","6127500.00","Printed Laminated Rolls");
INSERT INTO invoice_line_items2_po VALUES("46","73","703","1500.00","3063.75","2580.00","4595625.00","");
INSERT INTO invoice_line_items2_po VALUES("47","78","724","1000.00","3010.00","2800.00","3010000.00","");
INSERT INTO invoice_line_items2_po VALUES("48","79","704","1500.00","3063.75","2580.00","4595625.00","");
INSERT INTO invoice_line_items2_po VALUES("49","81","703","1000.00","3063.75","2580.00","3063750.00","");
INSERT INTO invoice_line_items2_po VALUES("50","90","724","1000.00","3225.00","2800.00","3225000.00","");
INSERT INTO invoice_line_items2_po VALUES("51","91","704","1000.00","3278.75","2580.00","3278750.00","");
INSERT INTO invoice_line_items2_po VALUES("52","92","715","1000.00","3278.75","2902.50","3278750.00","");
INSERT INTO invoice_line_items2_po VALUES("53","96","713","1000.00","3278.75","2902.50","3278750.00","");
INSERT INTO invoice_line_items2_po VALUES("54","98","713","1500.00","3278.75","2902.50","4918125.00","140Rolls");
INSERT INTO invoice_line_items2_po VALUES("55","99","703","1000.00","3278.75","2580.00","3278750.00","");
INSERT INTO invoice_line_items2_po VALUES("56","101","0","2.00","350000.00","0.00","700000.00","(4pcs)");
INSERT INTO invoice_line_items2_po VALUES("57","102","729","2.00","350000.00","200000.00","700000.00","(4pcs)");
INSERT INTO invoice_line_items2_po VALUES("58","103","729","2.00","350000.00","200000.00","700000.00","");
INSERT INTO invoice_line_items2_po VALUES("59","104","729","2.00","275000.00","200000.00","550000.00","2sets");
INSERT INTO invoice_line_items2_po VALUES("60","107","731","3000.00","2500.00","2450.00","0.00","(205mmX30mic)");
INSERT INTO invoice_line_items2_po VALUES("61","108","731","3000.00","2500.00","2450.00","7500000.00","(205mmX30mic)");
INSERT INTO invoice_line_items2_po VALUES("62","109","723","2000.00","3117.50","2800.00","6235000.00","120Rolls");
INSERT INTO invoice_line_items2_po VALUES("63","111","713","1000.00","3278.75","2902.50","3278750.00","");
INSERT INTO invoice_line_items2_po VALUES("64","112","703","1000.00","3278.75","2580.00","3278750.00","70Rolls");
INSERT INTO invoice_line_items2_po VALUES("65","113","703","1000.00","3268.00","2580.00","3268000.00","70Rolls");
INSERT INTO invoice_line_items2_po VALUES("66","114","713","1000.00","3268.00","2902.50","3268000.00","70Rolls");



CREATE TABLE `invoice_line_items_po` (
  `order_items_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` decimal(10,2) NOT NULL,
  `product_rate` decimal(10,2) NOT NULL,
  `purchase_rate` decimal(10,2) DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `commet` text,
  PRIMARY KEY (`order_items_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `lang` (
  `lang_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang` varchar(250) NOT NULL,
  PRIMARY KEY (`lang_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO lang VALUES("1","en");



CREATE TABLE `ledger_entries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `documents_id` int(10) unsigned NOT NULL,
  `account_id` bigint(19) unsigned NOT NULL,
  `dr_amount` decimal(20,2) unsigned DEFAULT '0.00',
  `cr_amount` decimal(20,2) unsigned NOT NULL DEFAULT '0.00',
  `against` int(11) NOT NULL DEFAULT '0' COMMENT 'money from or to',
  `sub_acct_group_id` int(10) unsigned NOT NULL,
  `act_grp_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ledger_entries_account_id_fk` (`account_id`),
  KEY `documnets_id` (`documents_id`),
  KEY `sub_acct_group_id` (`sub_acct_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO ledger_entries VALUES("1","2","530","1750518.00","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("2","2","528","0.00","1750518.00","0","49","50");
INSERT INTO ledger_entries VALUES("3","4","532","0.00","1439500.00","0","2","2");
INSERT INTO ledger_entries VALUES("4","4","529","1439500.00","0.00","0","51","52");
INSERT INTO ledger_entries VALUES("5","5","530","0.00","1439500.00","307","7","1");
INSERT INTO ledger_entries VALUES("6","5","307","1439500.00","0.00","530","1","1");
INSERT INTO ledger_entries VALUES("7","6","530","118500.00","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("8","6","528","0.00","118500.00","0","49","50");
INSERT INTO ledger_entries VALUES("9","7","530","0.00","118500.00","307","7","1");
INSERT INTO ledger_entries VALUES("10","7","307","118500.00","0.00","530","1","1");
INSERT INTO ledger_entries VALUES("11","8","531","100000.00","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("12","8","528","0.00","100000.00","0","49","50");
INSERT INTO ledger_entries VALUES("13","9","531","0.00","100000.00","307","7","1");
INSERT INTO ledger_entries VALUES("14","9","307","100000.00","0.00","531","1","1");
INSERT INTO ledger_entries VALUES("15","10","530","0.00","311018.00","303","7","1");
INSERT INTO ledger_entries VALUES("16","10","303","311018.00","0.00","530","1","1");
INSERT INTO ledger_entries VALUES("17","11","532","0.00","1150000.00","0","2","2");
INSERT INTO ledger_entries VALUES("18","11","529","1150000.00","0.00","0","51","52");
INSERT INTO ledger_entries VALUES("19","12","533","750000.00","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("20","12","528","0.00","750000.00","0","49","50");
INSERT INTO ledger_entries VALUES("21","13","533","0.00","750000.00","307","7","1");
INSERT INTO ledger_entries VALUES("22","13","307","750000.00","0.00","533","1","1");
INSERT INTO ledger_entries VALUES("23","14","307","0.00","2000000.00","532","7","1");
INSERT INTO ledger_entries VALUES("24","14","532","2000000.00","0.00","307","2","2");
INSERT INTO ledger_entries VALUES("25","15","303","0.00","200000.00","337","7","1");
INSERT INTO ledger_entries VALUES("26","15","337","200000.00","0.00","303","12","5");
INSERT INTO ledger_entries VALUES("27","16","303","0.00","50000.00","307","7","1");
INSERT INTO ledger_entries VALUES("28","16","307","50000.00","0.00","303","7","1");
INSERT INTO ledger_entries VALUES("29","17","533","550000.00","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("30","17","528","0.00","550000.00","0","49","50");
INSERT INTO ledger_entries VALUES("31","27","534","1804742.25","0.00","0","2","2");
INSERT INTO ledger_entries VALUES("32","27","528","0.00","1804742.25","0","49","50");
INSERT INTO ledger_entries VALUES("33","28","530","1638187.13","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("34","28","528","0.00","1638187.13","0","49","50");
INSERT INTO ledger_entries VALUES("37","30","530","2087026.50","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("38","30","528","0.00","2087026.50","0","49","50");
INSERT INTO ledger_entries VALUES("39","33","530","942715.88","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("40","33","528","0.00","942715.88","0","49","50");
INSERT INTO ledger_entries VALUES("41","34","530","2027589.75","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("42","34","528","0.00","2027589.75","0","49","50");
INSERT INTO ledger_entries VALUES("43","35","536","701887.00","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("44","35","528","0.00","701887.00","0","49","50");
INSERT INTO ledger_entries VALUES("49","45","530","3277400.88","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("50","45","528","0.00","3277400.88","0","49","50");
INSERT INTO ledger_entries VALUES("51","47","530","824761.50","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("52","47","528","0.00","824761.50","0","49","50");
INSERT INTO ledger_entries VALUES("53","52","530","2088252.00","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("54","52","528","0.00","2088252.00","0","49","50");
INSERT INTO ledger_entries VALUES("61","57","530","1273294.50","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("62","57","528","0.00","1273294.50","0","49","50");
INSERT INTO ledger_entries VALUES("63","58","530","1995726.75","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("64","58","528","0.00","1995726.75","0","49","50");
INSERT INTO ledger_entries VALUES("65","59","530","1514105.25","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("66","59","528","0.00","1514105.25","0","49","50");
INSERT INTO ledger_entries VALUES("67","60","530","3111544.50","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("68","60","528","0.00","3111544.50","0","49","50");
INSERT INTO ledger_entries VALUES("73","66","530","1376941.16","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("74","66","528","0.00","1376941.16","0","49","50");
INSERT INTO ledger_entries VALUES("75","70","530","302806.00","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("76","70","528","0.00","302806.00","0","49","50");
INSERT INTO ledger_entries VALUES("77","71","530","874884.45","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("78","71","528","0.00","874884.45","0","49","50");
INSERT INTO ledger_entries VALUES("79","72","530","2339019.94","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("80","72","528","0.00","2339019.94","0","49","50");
INSERT INTO ledger_entries VALUES("81","74","530","2778514.88","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("82","74","528","0.00","2778514.88","0","49","50");
INSERT INTO ledger_entries VALUES("83","75","530","941889.20","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("84","75","528","0.00","941889.20","0","49","50");
INSERT INTO ledger_entries VALUES("87","77","530","1818943.00","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("88","77","528","0.00","1818943.00","0","49","50");
INSERT INTO ledger_entries VALUES("89","80","530","1067961.97","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("90","80","528","0.00","1067961.97","0","49","50");
INSERT INTO ledger_entries VALUES("93","83","530","2790340.95","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("94","83","528","0.00","2790340.95","0","49","50");
INSERT INTO ledger_entries VALUES("95","84","538","1581000.00","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("96","84","528","0.00","1581000.00","0","49","50");
INSERT INTO ledger_entries VALUES("97","85","530","2470914.38","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("98","85","528","0.00","2470914.38","0","49","50");
INSERT INTO ledger_entries VALUES("99","86","530","1438124.25","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("100","86","528","0.00","1438124.25","0","49","50");
INSERT INTO ledger_entries VALUES("103","88","538","1626187.50","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("104","88","528","0.00","1626187.50","0","49","50");
INSERT INTO ledger_entries VALUES("105","89","530","1720787.44","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("106","89","528","0.00","1720787.44","0","49","50");
INSERT INTO ledger_entries VALUES("109","94","530","2994412.50","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("110","94","528","0.00","2994412.50","0","49","50");
INSERT INTO ledger_entries VALUES("111","95","530","258483.75","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("112","95","528","0.00","258483.75","0","49","50");
INSERT INTO ledger_entries VALUES("113","97","530","3134648.94","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("114","97","528","0.00","3134648.94","0","49","50");
INSERT INTO ledger_entries VALUES("115","100","530","3822694.63","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("116","100","528","0.00","3822694.63","0","49","50");
INSERT INTO ledger_entries VALUES("117","105","530","3499901.69","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("118","105","528","0.00","3499901.69","0","49","50");
INSERT INTO ledger_entries VALUES("119","106","530","3134648.94","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("120","106","528","0.00","3134648.94","0","49","50");
INSERT INTO ledger_entries VALUES("121","110","541","56000.00","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("122","110","528","0.00","56000.00","0","49","50");
INSERT INTO ledger_entries VALUES("123","115","530","3332706.40","0.00","0","1","1");
INSERT INTO ledger_entries VALUES("124","115","528","0.00","3332706.40","0","49","50");



CREATE TABLE `ledger_entries_po` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `documents_id` int(10) unsigned NOT NULL,
  `account_id` bigint(19) unsigned NOT NULL,
  `dr_amount` decimal(20,2) unsigned DEFAULT '0.00',
  `cr_amount` decimal(20,2) unsigned NOT NULL DEFAULT '0.00',
  `against` int(11) NOT NULL DEFAULT '0' COMMENT 'money from or to',
  `sub_acct_group_id` int(10) unsigned NOT NULL,
  `act_grp_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ledger_entries_account_id_fk` (`account_id`),
  KEY `documnets_id` (`documents_id`),
  KEY `sub_acct_group_id` (`sub_acct_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO ledger_entries_po VALUES("1","1","531","1698500.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("2","3","531","546000.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("3","18","530","1290000.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("4","19","530","3063750.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("5","20","530","1531875.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("6","21","530","1531500.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("7","22","530","1425000.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("8","20","530","1316875.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("9","21","530","1531875.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("10","22","530","3063750.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("11","23","530","1316875.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("12","24","530","3063750.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("13","25","530","3063750.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("14","26","530","3063750.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("15","31","530","2350000.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("16","32","530","2526250.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("17","36","530","3063750.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("18","37","530","1531875.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("19","38","530","3063750.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("20","39","530","3063750.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("21","40","530","3010000.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("22","41","530","2687500.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("23","43","530","1400000.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("24","46","530","1531875.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("25","48","530","16850625.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("26","49","530","10723125.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("27","50","530","6127125.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("28","51","536","750000.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("29","53","537","1425000.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("30","61","530","3063750.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("31","62","530","3063750.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("32","63","530","3063750.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("33","67","530","3010000.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("34","68","530","6127500.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("35","69","530","6127500.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("36","73","530","4595625.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("37","78","530","3010000.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("38","79","530","4595625.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("39","81","530","3063750.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("40","90","530","3225000.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("41","91","530","3278750.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("42","92","530","3278750.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("43","96","530","3278750.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("44","98","530","4918125.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("45","99","530","3278750.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("46","101","339","700000.00","0.00","0","12","5");
INSERT INTO ledger_entries_po VALUES("47","102","303","700000.00","0.00","0","7","1");
INSERT INTO ledger_entries_po VALUES("48","103","539","700000.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("49","104","539","550000.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("50","107","339","0.00","0.00","0","12","5");
INSERT INTO ledger_entries_po VALUES("51","108","540","7500000.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("52","109","530","6235000.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("53","111","530","3278750.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("54","112","530","3278750.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("55","113","530","3268000.00","0.00","0","1","1");
INSERT INTO ledger_entries_po VALUES("56","114","530","3268000.00","0.00","0","1","1");



CREATE TABLE `loan_contract` (
  `loan_contract_id` int(11) NOT NULL AUTO_INCREMENT,
  `loaner_id` int(11) NOT NULL,
  `date_contract_start` date NOT NULL,
  `date_contract_end` date NOT NULL,
  `loan_amount` int(11) NOT NULL,
  `terms_and_conditions` text NOT NULL,
  PRIMARY KEY (`loan_contract_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `loan_needer` (
  `loaner_id` int(11) NOT NULL AUTO_INCREMENT,
  `loaner_name` varchar(250) NOT NULL,
  `loaner_mobile` varchar(250) NOT NULL,
  `loaner_address` text NOT NULL,
  PRIMARY KEY (`loaner_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `loan_payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `loan_contract_id` int(11) NOT NULL,
  `date_of_payment` date NOT NULL,
  `amount_of_payment` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `loan_status` varchar(250) NOT NULL DEFAULT '0',
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `marketer_tb` (
  `marketer_id` int(11) NOT NULL AUTO_INCREMENT,
  `marketer_name` varchar(30) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`marketer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO marketer_tb VALUES("1","Kola Customers","08132712715");
INSERT INTO marketer_tb VALUES("2","Mr Prajob","08132712715");
INSERT INTO marketer_tb VALUES("3","Mr. Matthew","054682158666");
INSERT INTO marketer_tb VALUES("4","Ilorin Folake","08132125415");
INSERT INTO marketer_tb VALUES("5","Mr Shrinkant","08132125415");
INSERT INTO marketer_tb VALUES("6","Bayesal Folake","08132712715");
INSERT INTO marketer_tb VALUES("7","Ekiti Folake","08132712715");
INSERT INTO marketer_tb VALUES("8","Benin Folake","08132712715");
INSERT INTO marketer_tb VALUES("9","Osun Folake","08132712715");
INSERT INTO marketer_tb VALUES("10","Sokoto Folake","08132712715");
INSERT INTO marketer_tb VALUES("11","Mr Joseph","08132712715");



CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `auth_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `plain_water_tb` (
  `plain_water_id` int(11) NOT NULL AUTO_INCREMENT,
  `seria_n` int(5) NOT NULL,
  `date_in` date NOT NULL,
  `micron` varchar(10) NOT NULL,
  `kg` decimal(10,2) NOT NULL,
  `product_id` int(5) DEFAULT '0',
  `date_out` date NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `remark_in` varchar(150) NOT NULL,
  `remark_out` varchar(150) NOT NULL,
  PRIMARY KEY (`plain_water_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

INSERT INTO plain_water_tb VALUES("1","1","2019-09-10","31Mic","105.60","","0000-00-00","0","0","","");
INSERT INTO plain_water_tb VALUES("2","2","2019-09-10","31Mic","94.60","282","2019-09-15","0","1","","jj");
INSERT INTO plain_water_tb VALUES("3","3","2019-09-10","31Mic","105.60","","0000-00-00","0","0","","");
INSERT INTO plain_water_tb VALUES("4","4","2019-09-15","34Mic","65.80","","0000-00-00","1","0","good roll","");
INSERT INTO plain_water_tb VALUES("5","5","2019-09-15","40Mic","236.90","","0000-00-00","9","0","","");
INSERT INTO plain_water_tb VALUES("6","6","2019-09-15","34Mic","45.60","","0000-00-00","1","1","","");
INSERT INTO plain_water_tb VALUES("7","7","2019-09-13","34Mic","140.60","6","2019-09-03","9","0","","goo");
INSERT INTO plain_water_tb VALUES("8","8","2019-09-15","30Mic","80.30","215","2019-09-15","1","1","","45667");
INSERT INTO plain_water_tb VALUES("9","9","2019-09-15","38Mic","65.60","","0000-00-00","1","0","","");
INSERT INTO plain_water_tb VALUES("10","10","2019-09-15","30Mic","70.20","282","2019-09-15","1","1","","76");
INSERT INTO plain_water_tb VALUES("11","11","2019-09-15","30Mic","77.30","205","2019-09-15","1","1","","");
INSERT INTO plain_water_tb VALUES("12","12","2019-09-15","32Mic","3243.00","394","2019-09-15","1","1","","fdfd34");
INSERT INTO plain_water_tb VALUES("13","13","2019-09-15","30Mic","44.00","395","2019-09-15","1","1","","dje");
INSERT INTO plain_water_tb VALUES("14","14","2019-09-15","30Mic","32465.00","357","2019-09-15","1","1","","");
INSERT INTO plain_water_tb VALUES("15","15","2019-09-15","30Mic","45.00","191","2019-09-15","1","1","","for fus");
INSERT INTO plain_water_tb VALUES("16","16","2019-09-15","30Mic","200.00","88","2019-09-15","1","1","","120 444");
INSERT INTO plain_water_tb VALUES("17","17","2019-09-15","45Mic","90.00","","0000-00-00","1","0","for fido","");
INSERT INTO plain_water_tb VALUES("18","18","2019-09-15","30Mic","90.80","","0000-00-00","1","0","goog","");
INSERT INTO plain_water_tb VALUES("19","19","2019-09-10","34Mic","145.80","0","0000-00-00","1","0","","");
INSERT INTO plain_water_tb VALUES("20","20","2020-03-13","31Mic","550.00","0","0000-00-00","1","0","johnson - for fido","");



CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(250) NOT NULL,
  `product_model` varchar(250) NOT NULL,
  `product_sku` varchar(250) NOT NULL,
  `product_image` varchar(250) DEFAULT NULL,
  `product_detail` text,
  `top_item` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=733 DEFAULT CHARSET=latin1;

INSERT INTO product VALUES("1","M S B WHITE","","bag","","None","0");
INSERT INTO product VALUES("2","TROLLY FOOD PRINTED SHOPPING BAG","","pcs","","","0");
INSERT INTO product VALUES("3","M S B BLACK (100 COUNT)","","bag","","","0");
INSERT INTO product VALUES("4","S S B BLACK (100 COUNT)","","bag","","","0");
INSERT INTO product VALUES("5","S S B BLACK (80 COUNT)","","bag","","","0");
INSERT INTO product VALUES("6","PLAIN WATER ROLL (340*40MIC)","","kg","","","0");
INSERT INTO product VALUES("7","BLACK & WHITE","","bdls","","","0");
INSERT INTO product VALUES("8","P.A BLACK","","bag","","","0");
INSERT INTO product VALUES("9","BIG TISSUE PACK","","pcs","","","0");
INSERT INTO product VALUES("10","SMALL TISSUE PACK","","pcs","","","0");
INSERT INTO product VALUES("11","PLAIN SHRINK TUBE (460MM)","","kg","","","0");
INSERT INTO product VALUES("12","YELLOW & BLACK","","bdls","","","0");
INSERT INTO product VALUES("13","BLUE & BLACK","","bdls","","","0");
INSERT INTO product VALUES("14","BLUE AMOSEL P.K.B","Mr Philip","bdls","","","0");
INSERT INTO product VALUES("15","PLAIN P.K.B (4.6)","","bdls","","","0");
INSERT INTO product VALUES("16","PLAIN P.K.B (5.5)","","bdls","","","0");
INSERT INTO product VALUES("17","PLAIN P.K.B (4.4)","","bdls","","","1");
INSERT INTO product VALUES("18","BLUE P.K.B (6.3)","","bdls","","","0");
INSERT INTO product VALUES("19","PURPLE P.K.B (5.4)","","bdls","","","0");
INSERT INTO product VALUES("20","KRISTMART TISSUE (310*400MM)","","kg","","","0");
INSERT INTO product VALUES("21","PLAIN WATER ROLL (680*40MIC)","","kg","","","0");
INSERT INTO product VALUES("22","SAMJO WATER","","kg","","","0");
INSERT INTO product VALUES("23","LAW WATER","Lagos","kg","","","0");
INSERT INTO product VALUES("24","PLAIN BOPP bread (41.5*32CM)","","kg","","","0");
INSERT INTO product VALUES("25","PLAIN BOPP bread (38*29CM)","","kg","","","0");
INSERT INTO product VALUES("26"," PLAIN P.K.B (5.0)","","bdls","","","0");
INSERT INTO product VALUES("27","AQUASAYES WATER","Lagos","kg","","","0");
INSERT INTO product VALUES("28","LILLY TISSUE WRAPPER","","pcs","","","0");
INSERT INTO product VALUES("29","HDPE PLAIN NYLON (680*42MIC)","","kg","","","0");
INSERT INTO product VALUES("30","AWOKARIS PILLOW LDPTD BAG BLUE (49*81)","","kg","","","0");
INSERT INTO product VALUES("31","PLAIN WHITE GUSSET JOB ROLL P.K.B","","kg","","","0");
INSERT INTO product VALUES("32","P.K.B ROLL (BASIC)","","kg","","","0");
INSERT INTO product VALUES("33","PLAIN SHRINK SHEET(43.2CM*80MIC)","","kg","","","0");
INSERT INTO product VALUES("34","PLAIN SHRINK SHEET(560*110MIC)","","kg","","","0");
INSERT INTO product VALUES("35","HDPE PLAIN NYLON (690*40MIC)","","kg","","","0");
INSERT INTO product VALUES("36","BOFIK PRINTED water ROLL","","kg","","","0");
INSERT INTO product VALUES("37","RIJA PRINTED ROLL","Lagos","kg","","","0");
INSERT INTO product VALUES("38","ICE BLOCK(SMALL)","","pcs","","","0");
INSERT INTO product VALUES("39","SPEG WATER","Lagos","kg","","","1");
INSERT INTO product VALUES("40","DAY & NIGHT WATER","Lagos","kg","","","0");
INSERT INTO product VALUES("41","BLUE P.K.B (4.4)","","bdls","","","0");
INSERT INTO product VALUES("42","BLUE P.K.B (5.4)","","bdls","","","0");
INSERT INTO product VALUES("43","PLAIN P.K.B(5.3)","","bdls","","","0");
INSERT INTO product VALUES("44","UGA LAND WATER ROLL","Lagos","kg","","","0");
INSERT INTO product VALUES("45","SKY BLUE INK","","kg","","","0");
INSERT INTO product VALUES("46","RE-FLEX BLUE INK","","kg","","","0");
INSERT INTO product VALUES("47","PURPLE P.K.B (4.4)","","bdls","","","0");
INSERT INTO product VALUES("48","RAGNEL WATER","Lagos","kg","","","0");
INSERT INTO product VALUES("49","DESEA WATER","Lagos","kg","","","1");
INSERT INTO product VALUES("50","PLAIN P.K.B (5.1)","","bdls","","","0");
INSERT INTO product VALUES("51","PLAIN P.K.B(5.2)","","bdls","","","0");
INSERT INTO product VALUES("52","PURPLE P.K.B (5.0)","","bdls","","","0");
INSERT INTO product VALUES("53","BLUE P.K.B (6.4)","","bdls","","","0");
INSERT INTO product VALUES("54","PURPLE P.K.B (4.6)","","bdls","","","0");
INSERT INTO product VALUES("55","PLAIN SHRINK TUBE (450MM)","","kg","","","0");
INSERT INTO product VALUES("56","PRINTED NOREN P.K.B","mr. philip","bdls","","","0");
INSERT INTO product VALUES("57","ROYAL BLUE INK","","kg","","","0");
INSERT INTO product VALUES("58","AWOKARIS PILLOW BLACK","","","","","0");
INSERT INTO product VALUES("59","PLAIN SHRINK SHEET ROLL (450*80)","","kg","","","0");
INSERT INTO product VALUES("60","PLAIN WATER ROLL (680MM*35MIC)","","kg","","","0");
INSERT INTO product VALUES("61","GOAL WATER","Lagos","kg","","","1");
INSERT INTO product VALUES("62","FLEXO RED INK","","kg","","","0");
INSERT INTO product VALUES("63","FIGOL WATER","","kg","","","0");
INSERT INTO product VALUES("64","MILKLY TUBE (420MM*80MIC)","","kg","","","0");
INSERT INTO product VALUES("65","PLAIN WATER ROLL (680*45MIC)","","kg","","","0");
INSERT INTO product VALUES("66","BIG DADDY BREAD WRAPPER","","pcs","","","0");
INSERT INTO product VALUES("67","PLAIN P.K.B ROLL 4.4","","kg","","","0");
INSERT INTO product VALUES("68","FINE LIVING BREAD (BIG)","","pcs","","","0");
INSERT INTO product VALUES("69","F R I WATER","Lagos","kg","","","0");
INSERT INTO product VALUES("70","TREATED P.K.B ROLL (5.9)","","kg","","","0");
INSERT INTO product VALUES("71","PLAIN WATER ROLL (680*38MIC)","","kg","","","0");
INSERT INTO product VALUES("72","PRINTED OLIVIA P.K.B","Mr. Philip","bdls","","","0");
INSERT INTO product VALUES("73","PLAIN P.K.B (4.5)","","bdls","","","1");
INSERT INTO product VALUES("74","PLAIN P.K.B (4.3)","","bdls","","","0");
INSERT INTO product VALUES("75","PLAIN P.K.B (4.2)","","bdls","","","0");
INSERT INTO product VALUES("76","PLAIN WATER ROLL (340*35MIC)","","kg","","","0");
INSERT INTO product VALUES("77","BLUE P.K.B (5.9)","","bdls","","","0");
INSERT INTO product VALUES("78","PLAIN P.K.B (4.8)","","bdls","","","0");
INSERT INTO product VALUES("79","PLAIN P.K.B (4.7)","","bdls","","","0");
INSERT INTO product VALUES("80","EVINCE water roll","","kg","","","1");
INSERT INTO product VALUES("81","SUBI WATER","","kg","","","0");
INSERT INTO product VALUES("82","DEMNAK WATER","","kg","","","0");
INSERT INTO product VALUES("83","FINE LIVING BREAD (SMALL)","","pcs","","","0");
INSERT INTO product VALUES("84"," U-MOUNTAIN WATER","","kg","","","0");
INSERT INTO product VALUES("85","PURPLE P.K.B (4.3)","","bdls","","","0");
INSERT INTO product VALUES("86","PURPLE P.K.B (4.7)","","bdls","","","0");
INSERT INTO product VALUES("87","PLAIN WATER ROLL (700MM* 38-40MIC)","","kg","","","0");
INSERT INTO product VALUES("88","AL-XCEL WATER","","kg","","","0");
INSERT INTO product VALUES("89","PRINTED BIG JOE P.K.B","","bdls","","","0");
INSERT INTO product VALUES("90","HENDEL WATER","","kg","","","0");
INSERT INTO product VALUES("91","PANVICE WATER","","kg","","","0");
INSERT INTO product VALUES("92","UPLAND LD (PRINTED) ld nylon","","","","","0");
INSERT INTO product VALUES("93","G & M WATER","","kg","","","0");
INSERT INTO product VALUES("94","FAVOUR BREAD WRAPPER","","pcs","","","0");
INSERT INTO product VALUES("95","LYDIN WATER","","kg","","","0");
INSERT INTO product VALUES("96","ANNI SINGER WATER","","kg","","","0");
INSERT INTO product VALUES("97","PLAIN SHRINK SHEET ROLL (450*82)","","kg","","","0");
INSERT INTO product VALUES("98","PLAIN SHRINK SHEET (460*82MIC)","","kg","","","0");
INSERT INTO product VALUES("99","PRINTED DE-BAZIC P.K.B","","bdls","","","0");
INSERT INTO product VALUES("100","PLAIN SHRINK(530*80-85MIC)","","kg","","","0");
INSERT INTO product VALUES("101","PLAIN SHRINK (620*90MIC) ","","kg","","","0");
INSERT INTO product VALUES("102","PLAIN P.K.B ROLL 4.6","","kg","","","0");
INSERT INTO product VALUES("103","BLUE PRINTED TAL WOTAL P.K.B","Mr. Philip","bdls","","","0");
INSERT INTO product VALUES("104","PLAIN WATER ROLL (680*37MIC)","","kg","","","0");
INSERT INTO product VALUES("105","BLUE PRINTED LINIMAC P.K.B","","bdls","","","0");
INSERT INTO product VALUES("106","TWINS DIVINE WATER","","kg","","","0");
INSERT INTO product VALUES("107","LD BLUE SHEET (560*110MIC)","lagos","kg","","","0");
INSERT INTO product VALUES("108","PLAIN P.K.B ROLL (5.5)","","kg","","","0");
INSERT INTO product VALUES("109","ASPENN WATER","","kg","","","1");
INSERT INTO product VALUES("110","PLAIN P.K.B (5.4)","","bdls","","","0");
INSERT INTO product VALUES("111","ADONAI CANDLE LIGHT bopp","","kg","","","0");
INSERT INTO product VALUES("112","PLAIN P.K.B ROLL 5.2","","kg","","","0");
INSERT INTO product VALUES("113","PROC. CYAN INK","","kg","","","0");
INSERT INTO product VALUES("114","OSIH2O WATER","","kg","","","0");
INSERT INTO product VALUES("115","PLAIN P.K.B ROLL 4.8","","kg","","","0");
INSERT INTO product VALUES("116","GALAXY PRINTED ROLL water","Lagos","kg","","","0");
INSERT INTO product VALUES("117","PLAIN P.K.B 4.9","","bdls","","","0");
INSERT INTO product VALUES("118","AEIDA PRINTED ROLL water","","kg","","","0");
INSERT INTO product VALUES("119","DIAMOND PRINTED ROLL water","Mr. Philip","kg","","","0");
INSERT INTO product VALUES("120","DIAMOND PRINTED P.K.B","Mr. Philip","bdls","","","0");
INSERT INTO product VALUES("121","LD NYLON (YELLOW) 390MM*100MIC","","kg","","","0");
INSERT INTO product VALUES("122","PRINTED BLUE MAYRO P.K.B","Mr. Philip","bdls","","","0");
INSERT INTO product VALUES("123","LD NYLON (BLACK) 390MM*100MIC","","kg","","","0");
INSERT INTO product VALUES("124","NATURAL PP (175X400MM)","","kg","","","0");
INSERT INTO product VALUES("125","LD NYLON (RED) 390MM-100MIC","","kg","","","0");
INSERT INTO product VALUES("126","PLAIN SHRINK SHEET ROLL 430-85M","","kg","","","0");
INSERT INTO product VALUES("127","FLORAL TISSUE SHEET","","kg","","","0");
INSERT INTO product VALUES("128","STICK FLEX WHITE INK","","kg","","","0");
INSERT INTO product VALUES("129","HD PLAIN P.K.B (340MM-380MM)BIG","","kg","","","0");
INSERT INTO product VALUES("130","LD PLAIN BAG (500*800*100MIC)","","kg","","","0");
INSERT INTO product VALUES("131","PRINTED DE BELOVED WATER ROLL","Mr. Philip","kg","","","0");
INSERT INTO product VALUES("132","PRINTED REIGNIC WATER ROLL","","kg","","","0");
INSERT INTO product VALUES("133","PRINTED DECKKON P.K.B","Mr. Philip","bdls","","","0");
INSERT INTO product VALUES("134","PRINTED LINIMAC ROLL water","","kg","","","0");
INSERT INTO product VALUES("135","PRINTED MAPROLEN P.K.B","Mr. Philip","bdls","","","0");
INSERT INTO product VALUES("136","LD POLY BAG (640MM-970MM)","","kg","","","0");
INSERT INTO product VALUES("137","PP NATURAL (185MM*600MM)","","kg ","","","0");
INSERT INTO product VALUES("138","SYLVIC WATER ","","kg","","","0");
INSERT INTO product VALUES("139","PP NATURAL (140MM*350MM)","","kg","","","0");
INSERT INTO product VALUES("140","AL MUSTAPHA BREAD","","kg","","","0");
INSERT INTO product VALUES("141","FAISAL BREAD","","kg","","","0");
INSERT INTO product VALUES("142","SOLAKINS WATER","Lagos","kg","","","0");
INSERT INTO product VALUES("143","BLUE PRINTED YEME P.K.B 5.8","Mr. Philip","bdls","","","0");
INSERT INTO product VALUES("144","PP NATURAL (205MM*355MM)","","kg","","","0");
INSERT INTO product VALUES("145","HD PLAIN P.K.B (260MM-380MM)SMALL","","kg","","","0");
INSERT INTO product VALUES("146","PLAIN SHRINK ROLL(355*40MIC)","Dabur","kg","","","0");
INSERT INTO product VALUES("147","REDEEMED WATER","Lagos","kg","","","0");
INSERT INTO product VALUES("148","RICH TRUST WATER","","kg","","","0");
INSERT INTO product VALUES("149","PLAIN SHRINK ROLL(480MM*120MIC)","","kg","","","0");
INSERT INTO product VALUES("150","PLAIN SHRINK ROLL (880MM*80MIC)","","kg","","","0");
INSERT INTO product VALUES("151","BEULAH WATER","Lagos","kg","","","0");
INSERT INTO product VALUES("152","PLAIN SHRINK ROLL(860*80MIC)","","kg","","","0");
INSERT INTO product VALUES("153","P.E WATER","lagos","kg","","","1");
INSERT INTO product VALUES("154","LD PLAIN NYLON (IMPCO)700MM(100+100)1,620MM","","kg","","","0");
INSERT INTO product VALUES("155","PLAIN SHRINK ROLL(920MM*90MIC)","","kg","","","0");
INSERT INTO product VALUES("156","HYDRO WATER","Lagos","kg","","","0");
INSERT INTO product VALUES("157","FRANKIE WATER","","kg","","","0");
INSERT INTO product VALUES("158","WUYI WATER","Lagos","kg","","","0");
INSERT INTO product VALUES("159","MIMO WATER","","kg","","","0");
INSERT INTO product VALUES("160","JOYFAT WATER","Lagos","kg","","","0");
INSERT INTO product VALUES("161","MAFAJAWAAS WATER","","kg","","","0");
INSERT INTO product VALUES("162","IFE OLORUN KI IYE BREAD BIG(14*9)","","pcs","","","0");
INSERT INTO product VALUES("163","IFE OLORUN KI IYE BREAD SMALL(12*8)","","pcs","","","0");
INSERT INTO product VALUES("164","GOODLIFE WATER","Lagos","kg","","","1");
INSERT INTO product VALUES("165","AQUAROYAL WATER","","kg","","","0");
INSERT INTO product VALUES("166","PLAIN P.K.B ROLL 4.7","","kg","","","0");
INSERT INTO product VALUES("167","SHALLY WATER","","kg","","","0");
INSERT INTO product VALUES("168","AL-RIGHT CHIN CHIN  ","Lagos","kg","","","0");
INSERT INTO product VALUES("169","PRINTED LIVING STREAM P.K.B (6.8)","Mr. Philip","bdls","","","0");
INSERT INTO product VALUES("170","ICE BLOCK(BIG)","","pcs","","","0");
INSERT INTO product VALUES("171","HD PLAIN P.K.B ROLL (340*25MIC)","","kg","","","0");
INSERT INTO product VALUES("172","AQUAPRIME WATER","Calabar","kg","","","0");
INSERT INTO product VALUES("173","P P NYLON BAG(270MM*360MM)","","kg","","","0");
INSERT INTO product VALUES("174","LD PLAIN NYLON (900MM*650MM)","","kg","","","0");
INSERT INTO product VALUES("175","ROG WATER","","kg","","","0");
INSERT INTO product VALUES("176","LD PLAIN NYLON BAG (315MM*350MM)","","kg","","","0");
INSERT INTO product VALUES("177","PLAIN SHRINK ROLL(1100*90MIC)","","kg","","","0");
INSERT INTO product VALUES("178","HD PLAIN PACKING ROLL250MM(60+60)740MM","","kg","","","0");
INSERT INTO product VALUES("179","HD PLAIN PACKING BAG250MM(60+60)740MM","","bdls","","","0");
INSERT INTO product VALUES("180","JAT WATER","Lagos","kg","","","0");
INSERT INTO product VALUES("181","PP NYLON BAG (165*450MM)","","kg","","","0");
INSERT INTO product VALUES("182","LD PLAIN NYLON (310*335MM","","kg","","","0");
INSERT INTO product VALUES("183","PP PLAIN NYON (182*640MM)","","kg","","","0");
INSERT INTO product VALUES("184","PLAIN PP NYLON BAG(125*470MM)","","kg","","","0");
INSERT INTO product VALUES("185","PEARL ANGEL water","Lagos","kg","","","0");
INSERT INTO product VALUES("186","PRINTED BOPP BINTINLAYE BREAD RED","Lagos","kg","","","0");
INSERT INTO product VALUES("187","LD PLAIN WATER ROLL (125*30MIC)","","kg","","","0");
INSERT INTO product VALUES("188","LD PLAIN NYLON BAG (550(150+150)1350*75MIC","","kg","","","0");
INSERT INTO product VALUES("189","PLAIN SHRINK SHEET ROLL(550MM*100MIC)","","kg","","","0");
INSERT INTO product VALUES("190","PLAIN SHRINK TUBE ROLL(465*90MIC)","","kg","","","0");
INSERT INTO product VALUES("191","4US WATER","Lagos","kg","","","0");
INSERT INTO product VALUES("192","OASIS WATER","Mr. Peter","kg","","","0");
INSERT INTO product VALUES("193","AIGLE WATER","Mr. Peter","kg","","","0");
INSERT INTO product VALUES("194","LD BLACK BAG(140MM*180MM)","","pcs","","","0");
INSERT INTO product VALUES("195","LD PLAIN TUBE ROLL (650*35MIC)","","kg","","","0");
INSERT INTO product VALUES("196","PRINTED EVER WELL P.K.B","Onalat","bdls","","","0");
INSERT INTO product VALUES("197","PLAIN WATER ROLL 340MM*42MIC","","kg","","","0");
INSERT INTO product VALUES("198","PLAIN WATER ROLL 680MM*42MIC","","kg","","","0");
INSERT INTO product VALUES("199","DUNE WATER","Lagos","kg","","","0");
INSERT INTO product VALUES("200","PICKRITE WATER","Lagos","kg","","","0");
INSERT INTO product VALUES("201","TAUROS WATER","Mr. Srikanth","kg","","","0");
INSERT INTO product VALUES("202","LIBERTIS WATER","Mr. Peter","kg","","","0");
INSERT INTO product VALUES("203","MADINA WATER","Mr. Peter","kg","","","0");
INSERT INTO product VALUES("204","LA PROVIDENCE WATER","Mr. Peter","kg","","","0");
INSERT INTO product VALUES("205","CASTOR WATER","Mr. Peter","kg","","","0");
INSERT INTO product VALUES("206","PAROLE DE VIE WATER","Mr. Peter","kg","","","0");
INSERT INTO product VALUES("207","HD WHITE BAG (185MM*230MM)","","kg","","","0");
INSERT INTO product VALUES("208","HD WHITE BAG (375MM*450MM)","","kg","","","0");
INSERT INTO product VALUES("209","LD SHRINK ROLL(900MM*90MIC)","","kg","","","0");
INSERT INTO product VALUES("210","LD PLAIN BLUE SHEET ROLL(510MM*100MIC)","","kg","","","0");
INSERT INTO product VALUES("211","LD PLAIN SHEET ROLL(510MM*100MIC)","","kg","","","0");
INSERT INTO product VALUES("212","HD PLAIN BAG (240*550MM)","","kg","","","0");
INSERT INTO product VALUES("213","HD PLAIN BAG (240*420MM)","","kg","","","0");
INSERT INTO product VALUES("214","PLAIN WATER ROLL (680*31MIC)","","kg","","","0");
INSERT INTO product VALUES("215","ASA WATER","Kaduna","kg","","","0");
INSERT INTO product VALUES("216","BLUE P.K.B 5.0","","bdls","","","0");
INSERT INTO product VALUES("217","LD PLAIN SHRINK SHEET ROLL (455*70MIC)","","kg","","","0");
INSERT INTO product VALUES("218","LD PLAIN SHRINK SHEET ROLL (435*70MIC)","","kg","","","0");
INSERT INTO product VALUES("219","SUPER SAVER SMALL(270(60+60)375","lagos","kg","","","0");
INSERT INTO product VALUES("220","SUPER SAVER BIG(320(60+60)440","lagos","kg","","","0");
INSERT INTO product VALUES("221","PURE GOD BLESS WATER","Mr. Peter","kg","","","0");
INSERT INTO product VALUES("222","LEAPSON Printed Water Roll","Ilorin","kg","","","0");
INSERT INTO product VALUES("223","LA-SHITTU WATER","Lagos","kg","","","0");
INSERT INTO product VALUES("224","PRINTED FAITH MARK P.K.B","Mr. Philip","bdls","","","0");
INSERT INTO product VALUES("225","PLAIN BLUE P.K.B 5.2","","bdls","","","0");
INSERT INTO product VALUES("226","HD SHOPPING BAG(270(70+70)480MM)","","kg","","","0");
INSERT INTO product VALUES("227","EVER PURE WATER","Mr. Peter","kg","","","0");
INSERT INTO product VALUES("228","EAU CABANA WATER","Mr. Peter","kg","","","0");
INSERT INTO product VALUES("229","KING PURE WATER","Mr. Peter","kg","","","0");
INSERT INTO product VALUES("230","PRINTED BOPP BINTINLAYE BREAD YELLOW","","kg","","","0");
INSERT INTO product VALUES("231","PRINTED A & L LAUNDRY BAG SMALL (450*530)","","kg","","","0");
INSERT INTO product VALUES("232","PRINTED A & L LAUNDRY BAG BIG (530*655)","Popoola","kg","","","0");
INSERT INTO product VALUES("233","AQUA-PLANET P.K.B(6.0)","Mr. Philip","bdls","","","0");
INSERT INTO product VALUES("234","LD PLAIN NYLON BAG (630*1880MM)","","kg","","","0");
INSERT INTO product VALUES("235","E-MAC P.K.B (5.9)","Mr. Philip","bdls","","","0");
INSERT INTO product VALUES("236","LD PLAIN NYLON BAG (650MM*940MM)","","kg","","","0");
INSERT INTO product VALUES("237","LD PLAIN SHRINK TUBE ROLL(345*120MIC)","","kg","","","0");
INSERT INTO product VALUES("238","LD PLAIN NYLON BAG(600MM*800MM)","","kg","","","0");
INSERT INTO product VALUES("239","SAMFLEX WATER","","kg","","","0");
INSERT INTO product VALUES("240","PRINTED MM YOUGHURT ~ Green","AL MM  Ilorin","kg","","","0");
INSERT INTO product VALUES("241","ETS GAP WATER","","kg","","","0");
INSERT INTO product VALUES("242","LD PLAIN NYLON BAG(500*750MM)","","kg","","","0");
INSERT INTO product VALUES("243","LD PLAIN NYLON BAG (500(120+120)840MM)","","kg","","","0");
INSERT INTO product VALUES("244","LD PLAIN BAG (1340(140+140)560MM)","","kg","","","0");
INSERT INTO product VALUES("245","LD PLAIN NYLON BAG (200(55+55)*480MM)","","kg","","","0");
INSERT INTO product VALUES("246","HIGHER GROUND WATER","","kg","","","0");
INSERT INTO product VALUES("247","MM YOGHURT GREEN(680*65MIC)","ilorin","kg","","","0");
INSERT INTO product VALUES("248","FUN WATER","lagos","kg","","","0");
INSERT INTO product VALUES("249","LD PLAIN MIKLY WHITE YOGHURT ROLL 340MM*65MIC","","kg","","","0");
INSERT INTO product VALUES("250","PLAIN BLUE P.K.B 4.8","","bdls","","","0");
INSERT INTO product VALUES("251","LD PLAIN BAG (890(155+155)1240MM)","","kg","","","0");
INSERT INTO product VALUES("252","PLAIN BLUE P.K.B ROLL(4.8)","","kg","","","0");
INSERT INTO product VALUES("253","BOPP PRINTED BINTINLAYE BREAD SMALL","","kg","","","0");
INSERT INTO product VALUES("254","PLAIN SHRINK SHEET ROLL(800MM*80MIC)","","kg","","","0");
INSERT INTO product VALUES("255","PLAIN SHRINK SHEET ROLL(970MM*85MIC)","","kg","","","0");
INSERT INTO product VALUES("256","PLAIN SHRINK SHEET ROLL(400MM*80MIC)","","kg","","","0");
INSERT INTO product VALUES("257","PLAIN SHRINK SHEET ROLL(485MM*85MIC)","","kg","","","0");
INSERT INTO product VALUES("258","LD PLAIN BAG TISSUE (200(55+55)*560MM)","","kg","","","0");
INSERT INTO product VALUES("259","PRINTED BOPP AYOADE BREAD","","kg","","","0");
INSERT INTO product VALUES("260","PRINTED SAVANAH YOGHURT ROLL","ilorin","kg","","","0");
INSERT INTO product VALUES("261","SEAP PRINTED WATER ROLL","ilorin","kg","","","0");
INSERT INTO product VALUES("262","HI-MERIT Printed Water Roll","ilorin","kg","","","0");
INSERT INTO product VALUES("263","PRINTED PERSONALITY BREAD","","kg","","","0");
INSERT INTO product VALUES("264","PLAIN BOPP ROLL(175MM*25MIC)","","kg","","","0");
INSERT INTO product VALUES("265","EAU ROYALE WATER","","kg","","","0");
INSERT INTO product VALUES("266","PP PLAIN NYLON(270*470MM)","","kg","","","0");
INSERT INTO product VALUES("267","SOLAYOS CHIN CHIN bopp","","kg","","","0");
INSERT INTO product VALUES("268","PRINTED ARDEN P.K.B (6.0)","Mr Philip","bdls","","","0");
INSERT INTO product VALUES("269","PRINTED WESLEY P.K.B(6.0)","","bdls","","","0");
INSERT INTO product VALUES("270","FREFA WATER","","kg","","","0");
INSERT INTO product VALUES("271","LD PLAIN WATER ROLL(340*38MIC)","","kg","","","0");
INSERT INTO product VALUES("272","LD PLAIN WATER ROLL(340*30MIC)","","kg","","","0");
INSERT INTO product VALUES("273","LEAPSON Printed Packing Bag","","kg","","","0");
INSERT INTO product VALUES("274","SAB WATER ","","kg","","","0");
INSERT INTO product VALUES("275","CURRENT ORANGE FLAVOUR","","kg","","","0");
INSERT INTO product VALUES("276","MOKAKAD WATER","","kg","","","0");
INSERT INTO product VALUES("277","SALFATEIN WATER","","kg","","","0");
INSERT INTO product VALUES("278","DAVEM WATER ","","kg","","","0");
INSERT INTO product VALUES("279","LD TOMORROW DISPENSER(600*900*40MIC)","","kg","","","0");
INSERT INTO product VALUES("280","LD TOMORROW DISPENSER(600*600*40MIC)","","kg","","","0");
INSERT INTO product VALUES("281","LD PLAIN NYLON(900(150+150)1060MM)","","kg","","","0");
INSERT INTO product VALUES("282","DANZAKI WATER ","","kg","","","0");
INSERT INTO product VALUES("283","JASON WATER","","kg","","","0");
INSERT INTO product VALUES("284","MOYELET WATER","","kg","","","0");
INSERT INTO product VALUES("285","DIVINE WATER","","kg","","","0");
INSERT INTO product VALUES("286","SA-A WATER","","kg","","","0");
INSERT INTO product VALUES("287","LD PLAIN BLUE ROLL(480MM*100MIC)","","kg","","","0");
INSERT INTO product VALUES("288","LD PLAIN PURPLE ROLL(480MM*100MIC)","","kg","","","0");
INSERT INTO product VALUES("289","HD PLAIN PACKING BAG(400*910MM)","","kg","","","0");
INSERT INTO product VALUES("290","BLUE ASAHI P.K.B(6.0)","","bdls","","","0");
INSERT INTO product VALUES("291","L' HAVEN WATER","","kg","","","0");
INSERT INTO product VALUES("292","HONS WATER","","kg","","","0");
INSERT INTO product VALUES("293","LD PLAIN BAG (640MM(140+140)1270MM)","","kg","","","0");
INSERT INTO product VALUES("294","BLUE BAY WATER","","kg","","","0");
INSERT INTO product VALUES("295","LD PLAIN SHRINK BAG(410MM*310MM)","","kg","","","0");
INSERT INTO product VALUES("296","LD PLAIN SHRINK ROLL(700*30MIC)","","kg","","","0");
INSERT INTO product VALUES("297","LD PLAIN SHRINK ROLL(350*30MIC)","","kg","","","0");
INSERT INTO product VALUES("298","CEEJEE WATER ","","kg","","","0");
INSERT INTO product VALUES("299","PLAIN P.K.B ROLL 4.2","","kg","","","0");
INSERT INTO product VALUES("300","LD SHRINK ROLLS 660MM X 30MIC","LD SHRINK 660MM X 30MIC","kg","","None","0");
INSERT INTO product VALUES("301","LD PLAIN NYLON 390 *(60+60)*100MM","LD  PLAIN BAG","kg","","None","0");
INSERT INTO product VALUES("302","Transportation Charge","Transport","nos","","None","0");
INSERT INTO product VALUES("303","plain shrink 330mm x 30mic","after slitting ","kg","","None","0");
INSERT INTO product VALUES("304","EMPTY INK KEGS","EMPTY PRINTING KEGS","nos","none","None","0");
INSERT INTO product VALUES("305","BOPP OSELEN CHIN-CHIN","BOPP PRINTED OSELEN","kg","","None","0");
INSERT INTO product VALUES("306","GIWA WATER","PRINTED WATER ROLLS","kg","","None","0");
INSERT INTO product VALUES("307","Empty Gas Cylinder","empty cylinder sold by debasis","kg","","None","0");
INSERT INTO product VALUES("308","LD Shrink 710mm","rolls for africa consumer","kg","","None","0");
INSERT INTO product VALUES("309","Frefa Water 680mm (Non-Slitted)","before slit","kg","","None","0");
INSERT INTO product VALUES("310","LD Shrink 385mm x 85mic","to caraway","kg","","None","0");
INSERT INTO product VALUES("311","HD plain black 250mmx(60+60)x480","for mr philip","kg","","None","0");
INSERT INTO product VALUES("312","HD printed Emac PKB 6.0gm","mr philip job","bdls","","None","0");
INSERT INTO product VALUES("313","LD PLAIN INDUSTRIAL BAG 660MM X 910MM","MR. FOLA","pcs","","None","0");
INSERT INTO product VALUES("314","LD PLAIN INDUSTRIAL BAG 585MM X 785MM","IN PCS","pcs","","None","0");
INSERT INTO product VALUES("315"," bintinlaye bread 210mm x 370mm","bread nylon","kg","","None","0");
INSERT INTO product VALUES("316","ld plain indusr]trial bags 660mm x 920mm","industrial bags","kg","","None","0");
INSERT INTO product VALUES("317","ld industrial bags 660mm x 140 +140 +1270MM","industrial bags","kg","","None","0");
INSERT INTO product VALUES("318","hd milky white shopping 280mm x 70 +70","shopping bags","kg","","None","0");
INSERT INTO product VALUES("319","hd milky white shopping bags 270mm x 70+70","shopping bags","kg","","None","0");
INSERT INTO product VALUES("320","hd plain wastage nylon","wastage nylon","kg","","None","0");
INSERT INTO product VALUES("321","ANNY WHITE PRINTED P.K.B","PRINTED P.K.B","bdls","","None","0");
INSERT INTO product VALUES("322","ANNY CITY PRINTED P.K.B","PRINTED P.K.B","bdls","","None","0");
INSERT INTO product VALUES("323","bopp plain 200mm x 25mic","plain bopp","kg","","None","0");
INSERT INTO product VALUES("324","JIMA PRINTED BLUE P.K.B","PRINTED P.K.B","kg","","None","0");
INSERT INTO product VALUES("325","ASAHI PRINTED P.K.B","PRINTED COLOURED P.K.B","kg","","None","0");
INSERT INTO product VALUES("326","COLOUR PRINTED URBAN P.K.B","PRINTED P.K.B","kg","","None","0");
INSERT INTO product VALUES("327","PRINTED ONA P.K.B","PRINTED P.K.B","kg","","None","0");
INSERT INTO product VALUES("328","PRINTED JEKINS P.K.B","PRINTED P.K.B","kg","","None","0");
INSERT INTO product VALUES("329","HI-MERIT PRINTED P.K.B","PRINTED P.K.B","kg","","None","0");
INSERT INTO product VALUES("330","LD PLAIN NYLON 310MM X 330MM","PLAIN NYLON ","kg","","None","0");
INSERT INTO product VALUES("331","HD PLAIN BAGS 345MM X 460MM-6.0grm","HD PLAIN P.K.B","kg","","None","0");
INSERT INTO product VALUES("332","GARVANIZE PIPE ","PIPE","pcs","","None","0");
INSERT INTO product VALUES("333","IRON PIPE","PIPE","pcs","","None","0");
INSERT INTO product VALUES("334","HD PLAIN BLUE ROLL","PLAIN BLUE ROLL","kg","","None","0");
INSERT INTO product VALUES("335","HD PLAIN BLUE ROLL","PLAIN BLUE ROLL","kg","","None","0");
INSERT INTO product VALUES("336","HD PLAIN BLUE ROLL 355MM X 5.9","PLAIN BLUE ROLL","kg","","None","0");
INSERT INTO product VALUES("337","HD Plain WASTAGE","wastage","kg","","None","0");
INSERT INTO product VALUES("338","LD Plain WASTAGE","wastage","kg","","None","0");
INSERT INTO product VALUES("339","LD Printed Wastage","wastage","kg","","None","0");
INSERT INTO product VALUES("340","Al-rite Chin Chin (5hubs)","for alrite chin chin","nos","","None","0");
INSERT INTO product VALUES("379","hd plain pkb rolls 355mm x 9.0","hd plain pkb","kg","","None","0");
INSERT INTO product VALUES("342","A.B.C BOPP PRINTED BISCUIT  250 X30MIC","BOPP PRINTED NYLON","kg","","None","0");
INSERT INTO product VALUES("343","A.B.C BOPP PRINTED BISCUIT  250 X30MIC","BOPP PRINTED NYLON","kg","","None","0");
INSERT INTO product VALUES("344","BOPP PRINTED MABISCO ABC 123 (250MM)","MAYOR","kg","","None","0");
INSERT INTO product VALUES("345","BOPP PRINTED MABISCO TIC TAC TOE (250MM)","MAYOR BISCUILT","kg","","None","0");
INSERT INTO product VALUES("346","Printed Uniosun Water Roll","osun","kg","","None","0");
INSERT INTO product VALUES("347","Cancelled Item","jkj,","kg","","None","0");
INSERT INTO product VALUES("348","NUJA EDVI PRINTED WATER","PRINTED WATER ","kg","","None","0");
INSERT INTO product VALUES("349","BUTANOL CHEMICAL DRUM","CHEMICAL","Kg","","None","0");
INSERT INTO product VALUES("350","TOLUENCE CHEMICAL DRUM","CHEMICAL","Kg","","None","0");
INSERT INTO product VALUES("351"," CHECKERS SHRINK 1050MM X 85MIC","SHRINK SHEET","kg","","None","0");
INSERT INTO product VALUES("352","SHRINK ROLLS 525MM","PLAIN SHRINK ROLLS","kg","","None","0");
INSERT INTO product VALUES("353","Spring Top Printed Water ","bayesal goods","kg","","None","0");
INSERT INTO product VALUES("354","OAU PRINTED WATER ROLS","PRINTED WATER ROLLS","kg","","None","0");
INSERT INTO product VALUES("382","ld plain water rolls 680mm x 34mic","ld plain water rolls","kg","","None","0");
INSERT INTO product VALUES("356","UPS PRINTED WATER ROLLS","PRINTED WATER ROLLS","kg","","None","0");
INSERT INTO product VALUES("357","AQUAFA PRINTED WATER ROLLS","PRINTED BAYESAL","kg","","None","0");
INSERT INTO product VALUES("358","MOLASAG PRINTED WATER ROLLS","printed water rolls","kg","","None","0");
INSERT INTO product VALUES("359","HD Plain Nylon Ice Block                                                                                                    ","ice block for oau","kg","","None","0");
INSERT INTO product VALUES("360","HD PLAIN NYLON 262MM  X 380","PLAIN NYLON","kg","","None","0");
INSERT INTO product VALUES("361","PRINTED SEAP BAGS 345MM","PRINTED P.K.B","bdls","none","None","0");
INSERT INTO product VALUES("362","FIDO WATER","Bayesal","kg","","None","0");
INSERT INTO product VALUES("363","UNI-ILORIN PRINTED P.K.B","PRINTED P.K.B","bdl","","None","0");
INSERT INTO product VALUES("364","Cylinder ABC-123","mabisco cylinder","pcs","","None","0");
INSERT INTO product VALUES("365","Cylinder Tic Tac Toe","mabisco cylinder","pcs","","None","0");
INSERT INTO product VALUES("366","HERITAGES Printed Water ","ILORIN JOB","kg","none","None","0");
INSERT INTO product VALUES("367","IMP - CREATE M (533522AM)","NOS","pcs","","None","0");
INSERT INTO product VALUES("368","IMP CREATE L (533522AC)","NOS","pcs","","None","0");
INSERT INTO product VALUES("369","Pallet Standard -1.2m X 1.0m - 2000kg","nos","pcs","","None","0");
INSERT INTO product VALUES("370","ANN CITY PRINTED WATER ROLL","MR. EJIO","kg","none","None","0");
INSERT INTO product VALUES("371","RUBBER STEREO","RUBER STEREO","pcs","","None","0");
INSERT INTO product VALUES("372","Ink Reducing Medium","ink reduing medium","kg","","None","0");
INSERT INTO product VALUES("373","UNILORIN Printed Water Roll","ilorin","kg","","None","0");
INSERT INTO product VALUES("374","Plain Shrink Wrapper Roll 490mm","ilorin","kg","","None","0");
INSERT INTO product VALUES("375","MICYLN PRINTED WATER ROLLS","prnted water rolls","kg","","None","0");
INSERT INTO product VALUES("376","Ayalla Printed Water Roll","bayesal job","kg","","None","0");
INSERT INTO product VALUES("377","Seric Printed Water Roll","bayesal jonbs","kg","","None","0");
INSERT INTO product VALUES("378","Doctor Blade Printing Machine","dc blade","kg","","None","0");
INSERT INTO product VALUES("380","SEAP Water Cylinder ","bayesal","set","","None","0");
INSERT INTO product VALUES("381","OLA -OLU PRINTED PKB","ilorin","bdls","","None","0");
INSERT INTO product VALUES("383","ld plain water rolls 680mm x 32mic","ld plain rolls","kg","","None","0");
INSERT INTO product VALUES("384","LD PLAIN WATER ROLLS (680MM X 32MIC)","","kg","","None","0");
INSERT INTO product VALUES("385","HD BLUE PACKING BAGS ROLLS(350MM X 5.8gram)","plain blue pkb rolls","kg","","None","0");
INSERT INTO product VALUES("386","LD PLAIN WATER ROLLS (340MM X 34MIC)","plain water rolls","kg","","None","0");
INSERT INTO product VALUES("387","LD PLAIN SHRINK ROLLS (870MM X 90MIC)","PLAIN SHRINK ROLLS","kg","","None","0");
INSERT INTO product VALUES("388","HD PLAIN PACKING BAG ROLLS (350MM X 6.4GRAM)","PLAIN PKB ROLLS","kg","","None","0");
INSERT INTO product VALUES("389","LD PLAIN SHRINK ROLLS (970MM X 110MIC)","PLAIN SHRINK ROLLS","kg","","None","0");
INSERT INTO product VALUES("390","LD PLAIN SHRINK ROLL (800 X 90MIC)","PLAIN SHRINK ROLLS","kg","","None","0");
INSERT INTO product VALUES("391","ld milky white rolls (470mm x 40mic) ","MILKY  WHITE ROLLS","kg","none","None","0");
INSERT INTO product VALUES("392","LD MILKY WHITE (500MM X 100MIC)","MILKY WHITE ","kg","none","None","0");
INSERT INTO product VALUES("393","LD PRINTED CONTA WATER  ROLLS","PRINTED WATER ROLLS","kg","none","None","0");
INSERT INTO product VALUES("394","Boliva Printed  Water Roll","lagos-ragnel","kg","","None","0");
INSERT INTO product VALUES("395","D.J.E PRINTED WATER ROLLS","Ilorin","kg","","None","0");
INSERT INTO product VALUES("396","HERITAGE PRINTED P.K.B","PRINTED P.K.B","kg","","None","0");
INSERT INTO product VALUES("397","COPPER GREASE ","SET","pcs","","None","0");
INSERT INTO product VALUES("398"," CELLOTAPE 130 YARDS","CELLOTAPE","box","none","None","0");
INSERT INTO product VALUES("399","HD PLAIN PKB BAG 350MM X 6.8GRAM","HD PLAIN BAG","kg","","None","0");
INSERT INTO product VALUES("400","OLAWAS PRINTED WATER ROLLS","12 ROLLS","kg","","None","0");
INSERT INTO product VALUES("401","Special Blue Ink (keg)","ink","kg","","None","0");
INSERT INTO product VALUES("402","Yuntap Printed Water Roll","kg","kg","","None","0");
INSERT INTO product VALUES("403","Ola-olu Printed Water Roll","kg","kg","","None","0");
INSERT INTO product VALUES("404","UNIQUE P PRINTED ROLLS","Onalat","kg","","None","0");
INSERT INTO product VALUES("405","OLA -OLU PRINTED WATER ROLLS","ilorin","kg","","None","0");
INSERT INTO product VALUES("406","OLA -OLU PRINTED WATER ROLLS","ilorin","kg","","None","0");
INSERT INTO product VALUES("407","plain pkb 345mm x 4.7gram ","PLAIN P.K.B","bdls","","None","0");
INSERT INTO product VALUES("408","plain pkb 345mm x 4.7gram ","PLAIN P.K.B","bdls","","None","0");
INSERT INTO product VALUES("409","fido-payment-Count","payment","nos","","None","0");
INSERT INTO product VALUES("410","LD PLAIN SHRINK ROLLS 715MM X 50MIC","PLAin shrink rolls","kg","","None","0");
INSERT INTO product VALUES("411","LD PLAIN SHRINK SHEET ROLLS 770MM X 55MIC","PLAIN SHRINK SHEET ROLLS","kg","","None","0");
INSERT INTO product VALUES("412","LD PLAIN SHRINK SHEET ROLLS 720MM X 65MIC","LD PLAIN SHRINK ROLLS","kg","","None","0");
INSERT INTO product VALUES("413","CELLO TAPE 1000 YARDS ","CELLO TAPE","box","","None","0");
INSERT INTO product VALUES("414","PP PLAIN NYLON (165MM X 280MM)","PP PLAIN NYLON","kg","","None","0");
INSERT INTO product VALUES("415","PLAIN SHRINK SHEET (360MM)","PLAION SHRINK SHEET ROLLS ","kg","","None","0");
INSERT INTO product VALUES("416","OSIREGBEMHE PRINTED WATER ROLL","PRINTED WATER ROLLS","kg","","None","0");
INSERT INTO product VALUES("417","HD PLAIN PACKING BAG (355MM X 6.0)GRAM","PLAIN PACKING BAG ","bdls","","None","0");
INSERT INTO product VALUES("418","IPA Chemical","regata","Kg","","None","0");
INSERT INTO product VALUES("419","PRINTED DE-CALIFF WATER ROLLS","PRINTED WATER ROLLS","kg","","None","0");
INSERT INTO product VALUES("420","OSIREGBEMHE PRINTED WATER ROLLS","PRINTED WATER ROLLS","kg","","None","0");
INSERT INTO product VALUES("421","135cm x (40cm x 2) x 40mic","plain strech nylon","kg","","None","0");
INSERT INTO product VALUES("422","LA-PROVIDENCE TOGO ROLL","PRINTED WATER ROLLS","kg","","None","0");
INSERT INTO product VALUES("423","Mavor Printed Water Rolls","DELTA CUSTOMER","kg","","None","0");
INSERT INTO product VALUES("424","MAVOR PRINTED PKB ","DELTA","kg","","None","0");
INSERT INTO product VALUES("425","TOMKEN PRINTED WATER ROLL ","MR JOSEPH","kg","","None","0");
INSERT INTO product VALUES("426","MM PRINTED WATER ROLL","BAYELSA","kg","","None","0");
INSERT INTO product VALUES("427","LD PLAIN WATER ROLLS (340MM X 37MIC)","water roll","kg","","None","0");
INSERT INTO product VALUES("428","Mavor Cylinder 1Colour","mavor cylinder","set","","None","0");
INSERT INTO product VALUES("429","MM Cholate Yoghurt Roll","AL MM","kg","","None","0");
INSERT INTO product VALUES("430","MM Banana Yoghurt Roll","AL MM","kg","","None","0");
INSERT INTO product VALUES("431","MM Black Yoghurt Roll","AL MM","kg","","None","0");
INSERT INTO product VALUES("432","MM Orange Yoghurt Roll","Al MM","kg","","None","0");
INSERT INTO product VALUES("433","MM Pineapple Yoghurt Roll","AL MM","kg","","None","0");
INSERT INTO product VALUES("434","LD PLAIN NYLON 900 x  (150+150) x 1250 MM ","park way- CWAY","kg","","None","0");
INSERT INTO product VALUES("435","LD Plain Shrink Bags 295 X 295mm","dabur","kg","","None","0");
INSERT INTO product VALUES("436","Discount given on goods","discount2","--","none","None","0");
INSERT INTO product VALUES("437","LD PLAIN SHRINK ROLL 480MM x 100mic","Dabur","kg","","None","0");
INSERT INTO product VALUES("438","AQUALINA PRINTED WATER  ROLL","Bayesal","kg","","None","0");
INSERT INTO product VALUES("439","TOMASA PRINTED WATER ROLL","ONALAT VENTURE","rolls","","None","0");
INSERT INTO product VALUES("440","HD Plain Dispenser","mr Daniel","kg","","None","0");
INSERT INTO product VALUES("441","HD Blue Packing Bag (340mm)","Mr Daniel","bdls","","None","0");
INSERT INTO product VALUES("442","HD Plain Packing Bag (340mm)","Mr Daniel","bdls","","None","0");
INSERT INTO product VALUES("443","Sweep Materials ","wastage","kg","","None","0");
INSERT INTO product VALUES("444","LD ENNY PRINTED WATER ROLL","ONALAT","kg","","None","0");
INSERT INTO product VALUES("445","Plain Stretch Film Roll (500mm  X 23mic)","Dabur","kg","","None","0");
INSERT INTO product VALUES("446","LD PRINTED AUSLIN WATER ROLL","MR JOSEPH","kg","","None","0");
INSERT INTO product VALUES("447","LD PRINTED ADEKOM WATER ROLL","ADEKOM WATER","kg","","None","0");
INSERT INTO product VALUES("448","HD PRINTED ADEKOM PACKING BAG","ADEKOM WATER","bdls","","None","0");
INSERT INTO product VALUES("449","CYLINDER FOR ADEKOM","FOR ADEKOM","set","","None","0");
INSERT INTO product VALUES("450","PRINTED MM YOUGHURT ~ White","AL MM  Ilorin","kg","","None","0");
INSERT INTO product VALUES("451","YHOLAK Printed Packing Bag","Ilorin","kg","","None","0");
INSERT INTO product VALUES("452","Notredam Blue Packing Bag","Mr Daniel","bdls","","None","0");
INSERT INTO product VALUES("453","ld plain nylon","mr sajay","kg","","None","0");
INSERT INTO product VALUES("454","ld plain nylon 202.5mmx155mm","mr sajay","kg","","None","0");
INSERT INTO product VALUES("455","ld plain nylon 170mmx125mm","mr sajay","kg","","None","0");
INSERT INTO product VALUES("456","Destiny Water","mr joseph","kg","none","None","0");
INSERT INTO product VALUES("457","HD plain Packing Rolls","San jemmy ","kg","","None","0");
INSERT INTO product VALUES("458","HD Plain Packing Bag","san jemmy","kg","","None","0");
INSERT INTO product VALUES("459","hd plain packing bag roll 350mmx7.5","2roll","kg","","None","0");
INSERT INTO product VALUES("460","HD PLAIN BLUE PKB (6.0gram)","benin","bdls","","None","0");
INSERT INTO product VALUES("461","HD BLUE PACKING BAG(350MMX640MMX5.0GRAM)","3BAG","kg","","None","0");
INSERT INTO product VALUES("462","D.J.E PRINTED WATER PACKING BAG","D.J.E ","kg","","None","0");
INSERT INTO product VALUES("463","LD SHRINK ROLL (960X100MIC)","HI-MERIT","kg","","None","0");
INSERT INTO product VALUES("464","LD PLAIN BAG (800X80+80X380)","SAMPLE","kg","","None","0");
INSERT INTO product VALUES("465","LDPE Industrial Bag 330mm X215mm","Extra Large","kg","","None","0");
INSERT INTO product VALUES("466","HD PLAIN PACKING ROLL (380MMX10.0GRAM)","PKB ROLLS","kg","","None","0");
INSERT INTO product VALUES("467","Dekuul Printed Water Roll","ilorin","kg","","None","0");
INSERT INTO product VALUES("468","Empty - Drum","Halaja salawu","nos","","None","0");
INSERT INTO product VALUES("469","HD Plain Printed PKB  Bags in KG","star","kg","","None","0");
INSERT INTO product VALUES("470","HD colour Plain PKB  Roll in KG","star","kg","","None","0");
INSERT INTO product VALUES("471","Paper Core ","factory use","pcs","","None","0");
INSERT INTO product VALUES("472","plain pp nylon","solayos","bdls","","None","0");
INSERT INTO product VALUES("473","DEKUUL PRINTED PKB ","DEKUUL WATER","kg","","None","0");
INSERT INTO product VALUES("474","LD Printed INGO Water Roll","bayesal","kg","","None","0");
INSERT INTO product VALUES("475","plain shrink 980mmx95mic","6r0ll","kg","","None","0");
INSERT INTO product VALUES("476","Hd plain industrial nylon 580x850","16bags","kg","","None","0");
INSERT INTO product VALUES("477","PLAIN SHRINK SHEET (490MM)","OLA-OLU WATER","kg","","None","0");
INSERT INTO product VALUES("478","LD PRINTED NURUS WATER","nurus","kg","","None","0");
INSERT INTO product VALUES("479","Empty -Sack Nylon","star","kg","","None","0");
INSERT INTO product VALUES("480","LD YELLOW PKB ROLL 500X90MIC","2ROLL","kg","","None","0");
INSERT INTO product VALUES("481","BLUE PKBROLL 500X90MIC","1","kg","","None","0");
INSERT INTO product VALUES("482","REIGNIC PRINTED WATER ROLLS","REIGNIC WATER ","kg","","None","0");
INSERT INTO product VALUES("483","PACKING BAG ROLL","715","kg","","None","0");
INSERT INTO product VALUES("484","printed pelumi water roll","pelumi water","kg","","None","0");
INSERT INTO product VALUES("485","LD PLAIN SHRINK SHEET (390MM)","CANYON GROUP","kg","","None","0");
INSERT INTO product VALUES("486","LD SHRINK 380MMX50MIC","CUSTOMER","kg","","None","0");
INSERT INTO product VALUES("487","LD PLAINBLUE ROLL500X90MIC","CUSTOMER","kg","","None","0");
INSERT INTO product VALUES("488","HD INDUSTRIAL BAGS 580MMX850MM","CUSTOMER","kg","","None","0");
INSERT INTO product VALUES("489","NDU PRINTED WATER ROLL","NDU Bayesal","kg","","None","0");
INSERT INTO product VALUES("490","EFAC Water Roll","EFAC Redeem","kg","","None","0");
INSERT INTO product VALUES("491","Thama Preinted Water Roll","bayesal NDU","kg","","None","0");
INSERT INTO product VALUES("492","Printed Current Water Roll","ilorin","kg","","None","0");
INSERT INTO product VALUES("493","Printed Current Water Packing bag","ilorin","kg","","None","0");
INSERT INTO product VALUES("494","Oselen Small Chin Chin Cylinder","oslen","set","","None","0");
INSERT INTO product VALUES("495","LD PRINTED BOFIK WATER ROLL","BOFIK WATER","kg","","None","0");
INSERT INTO product VALUES("496","LD PLAIN BAG (610MMX1240MM)","PAKWAY","kg","","None","0");
INSERT INTO product VALUES("497","HD PLAIN PACKING BAG(580MMX340MM)","CHECKER AFRICAN","kg","","None","0");
INSERT INTO product VALUES("498","HD PLAIN PACKING BAG (380MMX260MM)","CHECKER AFRICAN","kg","","None","0");
INSERT INTO product VALUES("499","PET PREFORM -PLAIN TRANSPERENT","LANDMARK","kg","","None","0");
INSERT INTO product VALUES("500","LD PRINTED ORBIT WATER ROLL 340MMX35MIC","ORBIT","kg","","None","0");
INSERT INTO product VALUES("501","LD PLAIN NYLON 210X235MM","CUSTOMER","kg","","None","0");
INSERT INTO product VALUES("502","printed oselen bread nylon","oselen bread","kg","","None","0");
INSERT INTO product VALUES("503","pp nylon bag(200x630mm)","shongai packaging","kg","","None","0");
INSERT INTO product VALUES("504","DS Core Printed Water Roll","bayesal","kg","","None","0");
INSERT INTO product VALUES("505","EKEMINI BREAD - NYLON","EKEMINI- Mr. Johnson","kg","","None","0");
INSERT INTO product VALUES("506","ppplainnylon 200x630","customer","kg","","None","0");
INSERT INTO product VALUES("507","hd plain dispenser roll  (440mm x800mm)","customer","kg","","None","0");
INSERT INTO product VALUES("508","BLUEBAY PRINTED WATER ROLL","FREFA","kg","","None","0");
INSERT INTO product VALUES("509","HD BLUEPKB (345X5.2G)","CUSTOMER","kg","","None","0");
INSERT INTO product VALUES("510","HD BLUE PKB(345 X5.5 G)","CUSTOMER","bdls","","None","0");
INSERT INTO product VALUES("511","HD PLAIN PKB ROLL( 345MMX5.0G)","CUSTOMER","kg","","None","0");
INSERT INTO product VALUES("512","LD PRINTED SPECTRUM WATER ROLL","SPECTRUM WATER","kg","","None","0");
INSERT INTO product VALUES("513","Cost for Cylinder","Cylinder","kg","","None","0");
INSERT INTO product VALUES("514","Bruce Printed  Water Rolls","bayesal","kg","","None","0");
INSERT INTO product VALUES("515","PP PLAIN BAG (250X370MM)","SOLAYOS CHINCHIN","bdls","","None","0");
INSERT INTO product VALUES("516","DAMS-A1 Printed Water Roll","Dams A1","kg","","None","0");
INSERT INTO product VALUES("517","LD PLAIN WATER ROLL (680X30MIC)","PLAIN ROLL","kg","","None","0");
INSERT INTO product VALUES("518","PET PREFORM ","land mark","kg","","None","0");
INSERT INTO product VALUES("519","PLAIN ROLL1020MMX35MIC","CUSTOMER","kg","","None","0");
INSERT INTO product VALUES("520","PLAIN ROLL 1020MMX 32MIC","CUSTOMER","kg","","None","0");
INSERT INTO product VALUES("521","LD PLAIN BAG (900(140X140)1240MM","SHONGAI PACKAGING","kg","","None","0");
INSERT INTO product VALUES("522","HD PLAIN PKB 345X5.0G (KG)","CUSTOMER","kg","","None","0");
INSERT INTO product VALUES("523","HD PLAIN PKB 350MMX5.8G(KG)","CUSTOMER","kg","","None","0");
INSERT INTO product VALUES("524","HD PLAIN PKB 345 X6.0 G(KG)","CUSTOMER","kg","","None","0");
INSERT INTO product VALUES("525","hd plain pkb 345mmx5.5g","customer","kg","","None","0");
INSERT INTO product VALUES("526","hd plain pkb roll (345mmx5.8g)","customer","kg","","None","0");
INSERT INTO product VALUES("527","hd plain pkb roll (345mm x6.0g)","customer","kg","","None","0");
INSERT INTO product VALUES("528","I/S NIGERIA GREEN INK","CUSTOMWER","kg","","None","0");
INSERT INTO product VALUES("529","Leah Smart Printed Water Roll","ilorin- leah","kg","","None","0");
INSERT INTO product VALUES("530","1020X31MIC PLAIN ROLL","CUSTOMER","kg","","None","0");
INSERT INTO product VALUES("531","SHRINK    350MMX110MIC","CUSTOMER","kg","","None","0");
INSERT INTO product VALUES("532","1020mmx30mic","customer","kg","","None","0");
INSERT INTO product VALUES("533","ld plain industrial bags 550(120+120)1240mm","customer","kg","","None","0");
INSERT INTO product VALUES("534","mm shrink roll 340mm","al-mm venture","kg","","None","0");
INSERT INTO product VALUES("535","PLAIN WATER ROLL (340X33MIC)","GORETTI INDUSTRIES","kg","","None","0");
INSERT INTO product VALUES("536","LD PRINTED KEYE WATER ROLL","KEYE WATER","kg","","None","0");
INSERT INTO product VALUES("537","Ld Plain Water Rolls ","bayesal aqulina","kg","","None","0");
INSERT INTO product VALUES("538","1050X38MIC","CUSTOMER","kg","","None","0");
INSERT INTO product VALUES("539","760MM X100 MIC","CUSTOMER","kg","","None","0");
INSERT INTO product VALUES("540","LD PRINTED EVERWELL WATER ROLL","ONALAT VENTURE","kg","","None","0");
INSERT INTO product VALUES("541","PRECY YOUHURT","PRECY YOUGHURT","kg","","None","0");
INSERT INTO product VALUES("542","1020mx 38mic","customer","kg","","None","0");
INSERT INTO product VALUES("543","ALVIE PACKING BAGS","STAR","kg","","None","0");
INSERT INTO product VALUES("544","LD PRINTED EBONY WATER ROLL","EBONY WATER","kg","","None","0");
INSERT INTO product VALUES("545","HD PLAIN PACKING BAG ROLL(345X4.9GRAM)","PACKING BAGS ROLL","kg","","None","0");
INSERT INTO product VALUES("546","HD PLAIN PACKING BAG ROLL(350X5.4 GRAM)","PAcking bag roll","kg","","None","0");
INSERT INTO product VALUES("547","hd plain packing bag(345x390mm)","hd packing bags","kg","","None","0");
INSERT INTO product VALUES("548","HD INDUSTRIAL BAG","CHECKERS","kg","","None","0");
INSERT INTO product VALUES("549","LD PRINTED BUNEZ WATER ROLL","BUNEZ WATER","kg","","None","0");
INSERT INTO product VALUES("550","LD PRINTED SALLY WATER ROLL","MR JOSEPH","kg","","None","0");
INSERT INTO product VALUES("551","LD PRINTED NATH & SAM WATER ROLL","onalat","kg","","None","0");
INSERT INTO product VALUES("552","680X 48MIC","CUSTOMER","kg","","None","0");
INSERT INTO product VALUES("553","ld printed mike ade water roll","mike ade water","kg","","None","0");
INSERT INTO product VALUES("554","LAND Mark Printed Water roll","Landmark","kg","","None","0");
INSERT INTO product VALUES("555","Aqua Dominion Water -Lagos","Aqua Diminion","kg","","None","0");
INSERT INTO product VALUES("556","Aqua Dominion Water -Benin","Aqua Dominion","kg","","None","0");
INSERT INTO product VALUES("557","LD PRINTED CHANEACO DOMINION WATER ROLL","CHANEACO DOMINION","kg","","None","0");
INSERT INTO product VALUES("558","LD PLAIN SHRINK SHEET ROLLS (440MM)","PLAIN SHRINK","kg","","None","0");
INSERT INTO product VALUES("559","pvc core","plast poly","PCS","","None","0");
INSERT INTO product VALUES("560","long paper core","plast poly","PCS","","None","0");
INSERT INTO product VALUES("561","short paper core","plast poly","PCS","","None","0");
INSERT INTO product VALUES("562","LD PRINTED VICTEST WATER ROLL","VICTEST WATER","kg","","None","0");
INSERT INTO product VALUES("563","ld printed crown herit water roll","CROWN HERIT","kg","","None","0");
INSERT INTO product VALUES("564","Poli Printed Water ","Ado Poly","kg","","None","0");
INSERT INTO product VALUES("565","1020x42 mic water roll","plain water","kg","","None","0");
INSERT INTO product VALUES("566","340mm Plastic Core","Star","kg","","None","0");
INSERT INTO product VALUES("567","HD PLAIN PACKING BAG ROLL(350X9.5 GRAM)","HD PLAIN PKB","kg","","None","0");
INSERT INTO product VALUES("568","LD PLAIN INDUSTRIAL BAG (665(139+139)1275MM","HD PLAIN","kg","","None","0");
INSERT INTO product VALUES("569","Bopp printed bread ville mini loaf","bread ville","kg","","None","0");
INSERT INTO product VALUES("570","TOMEC PRINTED WATER ROLL","TOMEC WATER","kg","","None","0");
INSERT INTO product VALUES("571","plain purple & white packing bag","sairosa foundation","kg","","None","0");
INSERT INTO product VALUES("572","LD PLAIN WATER ROLL (310X38MIC)","LD PLAIN","kg","","None","0");
INSERT INTO product VALUES("573","PRINTED AJ&T PACKING BAGS","MR PHILLIP","kg","","None","0");
INSERT INTO product VALUES("574","LD SHRINK ROLL 300MM","SHRINK ROLLS","kg","","None","0");
INSERT INTO product VALUES("575","poly sheet ","O R C","kg","","None","0");
INSERT INTO product VALUES("576","POLYTHENE BAG","O R C","kg","","None","0");
INSERT INTO product VALUES("577","PRINTED BOPP OLAMILEKAN BREAD NYLON(BIG )","OLAMILEKAN BREAD","kg","","None","0");
INSERT INTO product VALUES("578","PRINTED BOPP OLAMILEKAN BREAD NYLON (SMALL)","OLAMILEKAN BREAD","kg","","None","0");
INSERT INTO product VALUES("579","LD PRINTED MAGNOR WATER ROLLS","MAGNOR WATER","kg","","None","0");
INSERT INTO product VALUES("580","STICKFLEX BLOOD INK","BLOOD INK","kg","","None","0");
INSERT INTO product VALUES("581","LD MILKY WHITE ROLL (520MMX110MIC)","YOUGHURT ROLL","kg","","None","0");
INSERT INTO product VALUES("582","LD BLUE COLOUR ROLL (520MMX110MIC)","YOUGHURT ROLL","kg","","None","0");
INSERT INTO product VALUES("583","MILKY WHITE ROLL (680MMX65MIC)","YOUGHURT ROLLS","kg","","None","0");
INSERT INTO product VALUES("584","REL YUGHURT","ABEOKUTA MAN","kg","","None","0");
INSERT INTO product VALUES("585","PRINTED REL YOUGHURT NYLON","YOUGHURT ROLL","kg","","None","0");
INSERT INTO product VALUES("586","ld plain industrial bag (450(100+100)950mm","M B PACK","kg","","None","0");
INSERT INTO product VALUES("587","Plain Shrink 980mm x 110mic","500","kg","","None","0");
INSERT INTO product VALUES("588","plain shrink 490mm x 110mic","factory","kg","","None","0");
INSERT INTO product VALUES("589","PVC PLASTIC CORE (620MM)","PLAST POLY","kg","","None","0");
INSERT INTO product VALUES("590","LD PLAIN TUBE ROLL{480MMX45 MIC)","TUBE ROLL","kg","","None","0");
INSERT INTO product VALUES("591","AQUA EURO TABLE WATER","AQUA EURO","kg","","None","0");
INSERT INTO product VALUES("592","NIGERIA GREEN INK","NIGERIAN  GREEN INK","kg","","None","0");
INSERT INTO product VALUES("593","HD PLAIN INDUSTRIAL BAG (250MMX500MM)"," HD PLAIN BAGS","kg","","None","0");
INSERT INTO product VALUES("594","HD PLAIN INDUSTRIAL BAG (250MMX500MM)","HD PLAIN BAG","kg","","None","0");
INSERT INTO product VALUES("595","SHRINK NYLON 50CMX90MIC","SHRINK NYLON","kg","","None","0");
INSERT INTO product VALUES("596","HD PLAIN PKB ROLL (350MMX22MIC)","PACKING BAG ROLL","kg","","None","0");
INSERT INTO product VALUES("597","PLAIN WATER ROLL (340X70MIC)","PLAIN WATER","kg","","None","0");
INSERT INTO product VALUES("598","PRINTED CALEB WATER ROLL","CALEB WATER","kg","","None","0");
INSERT INTO product VALUES("599","PLAIN SHRINK SHEET ROLL (1240MMX90MIC)","SHRINK SHEET","kg","","None","0");
INSERT INTO product VALUES("600","PLAIN SHRINK SHEET ROLL(760MMX82MIC)","SHRINK ROLL","kg","","None","0");
INSERT INTO product VALUES("601","PLAIN SHRINK SHEET ROLL (380MMX82MIC)","SHRINK SHEET","kg","","None","0");
INSERT INTO product VALUES("602","LD PLAIN INDUSTRIAL BAG (440MMX440MM)","INDUSTRIAL BAG","kg","","None","0");
INSERT INTO product VALUES("603","plain bopp roll (190mmx025mm)","bopp roll","kg","","None","0");
INSERT INTO product VALUES("604","PRINTED SANCO WATER ROLL","SANCO WATER","kg","","None","0");
INSERT INTO product VALUES("605","SHRINK NYLON (710MMX40 MIC)","SHRINK NYLON","kg","","None","0");
INSERT INTO product VALUES("606","LD PLAIN INDUSTRIAL BAG (570MMX1340MM)","INDUSTRIAL BAGS","kg","","None","0");
INSERT INTO product VALUES("607","LD PLAIN INDUSTRIAL BAG (410MM(95+95)1000MM)","INDUSTRIAL BAGS","kg","","None","0");
INSERT INTO product VALUES("608","ld plain water roll 1020x36mic","water roll","kg","","None","0");
INSERT INTO product VALUES("609","LD PRINTED KOLLEGE WATER ROLL","KOLLEGE WATER","kg","","None","0");
INSERT INTO product VALUES("610","LD PRINTED NERUS WATER ROLL","NERUS WATER","kg","","None","0");
INSERT INTO product VALUES("611","plain shrink roll (1010x80mic)","shrink sheet","kg","","None","0");
INSERT INTO product VALUES("612","plain shrink roll (1000X120 MIC)","SHRINK ROLL","kg","","None","0");
INSERT INTO product VALUES("613","plain shrink sheet roll (505mm)","shrink sheet","kg","","None","0");
INSERT INTO product VALUES("614","REL FLAVOR DRINK"," REL YOUGHURT","kg","","None","0");
INSERT INTO product VALUES("615","AA CHINCHIN ROLL","AA CHINCHIN ROLL","kg","","None","0");
INSERT INTO product VALUES("616","LAAJY BREED WRAPPER","LAAJY BREAD","kg","","None","0");
INSERT INTO product VALUES("617","LD PLAIN INDUSTRIAL BAGS (480MMX800MM)","INDUSTRIAL BAG","kg","","None","0");
INSERT INTO product VALUES("618","printed hadasseh water roll","HADASSEH","kg","","None","0");
INSERT INTO product VALUES("619","printed oseofureme water roll (42mic)","oseofureme water","kg","","None","0");
INSERT INTO product VALUES("620","printed oseofureme water roll (35 mic)","oseofureme water 2","kg","","None","0");
INSERT INTO product VALUES("621","plain packing bags 4.8gram (return)","packing bag","kg","","None","0");
INSERT INTO product VALUES("622","plain packing 5.5gram (return)","packing bags","kg","","None","0");
INSERT INTO product VALUES("623","PLAIN SHRINK SHEET ROLL (355X90MIC)","SHRINK SHEET","kg","","None","0");
INSERT INTO product VALUES("624","PLAIN SHRINK ROLL (1070MMX85MIC)","PLAIN SHRINK ","kg","","None","0");
INSERT INTO product VALUES("625","PLAIN SHRINK SHEET ROLL (1150MMX85MIC)","PLAIN SHRINK ROLL","kg","","None","0");
INSERT INTO product VALUES("626","PLAIN SHRINK SHEET ROLL (1000MMX90MIC)","SHRINK ROLL","kg","","None","0");
INSERT INTO product VALUES("627","LD PLAIN NYLON (475MMX180MM)","INDUSTRIAL BAG","kg","","None","0");
INSERT INTO product VALUES("628","LD PLAIN NYLON (180MMX415MM)","INDUSTRIAL BAG","kg","","None","0");
INSERT INTO product VALUES("629","LD PLAIN NYLON (125MMX175MM)","INDUSTRIAL BAGS","kg","","None","0");
INSERT INTO product VALUES("630","HD PLAIN PACKING BAG (350mmx640mm)","packing bag","kg","","None","0");
INSERT INTO product VALUES("631","HD PLAIN BLUE PACKING BAG (350MMX640MM)","PACKING BAG","kg","","None","0");
INSERT INTO product VALUES("632","LD PLAIN INDUSTRIAL BAG (250MMX330MM) ","INDUSTRIAL BAG","kg","","None","0");
INSERT INTO product VALUES("633","LD PLAIN INDUSTRIAL BAG (350MMX30MIC)","INDUSTRIAL ROLL","kg","","None","0");
INSERT INTO product VALUES("634","LD PLAIN INDUSTRIAL ROLL (350MMX30MIC)","INDUSTRIAL ROLL","kg","","None","0");
INSERT INTO product VALUES("635","ld plain packing bag ( 1000 counts)","packing bag","kg","","None","0");
INSERT INTO product VALUES("636","ld plain packing bag (80 counts)","packing bag","kg","","None","0");
INSERT INTO product VALUES("637","LD PLAIN WATER ROLL (680MMX30MIC)","WATER ROLL","kg","","None","0");
INSERT INTO product VALUES("638","LD PLAIN BAG (255MMX332MM)","PLAIN INDUSTRIAL BAG","kg","","None","0");
INSERT INTO product VALUES("639","LD PLAIN INDUSTRIAL BAG (560(120+120)1240MM)","INDUSTRIAL BAG","kg","","None","0");
INSERT INTO product VALUES("640","LD PLAIN INDUSTRIAL BAG (425MMX380MM)","INDUSTRIAL BAG","kg","","None","0");
INSERT INTO product VALUES("641","PLAIN SHRINK SHEET ROLL (510MMX82MIC)","SHRINK SHEET","kg","","None","0");
INSERT INTO product VALUES("642","PRINTED OSELEN CHINCHIN ROLL (ORANGE COLOUR)","OSELEN CHINCHIN","kg","","None","0");
INSERT INTO product VALUES("643","LD PLAIN INDUSTRIAL BAG {332MMX255MM)","INDUSTRIAL BAg","kg","","None","0");
INSERT INTO product VALUES("644","LD PRINTED NDU WATER ROLL","NDU WATER","kg","","None","0");
INSERT INTO product VALUES("645","LEMON YELLOW INK","LEMON YELLOW","kg","","None","0");
INSERT INTO product VALUES("646","WHITE INK","WHITE INK","kg","","None","0");
INSERT INTO product VALUES("647","PLAIN WHITE ROLL (680MMX65MIC)","WHITE ROLL","kg","","None","0");
INSERT INTO product VALUES("648","PLAIN WHITE ROLL(340MMX65MIC)","WHITE ROLL","kg","","None","0");
INSERT INTO product VALUES("649","CHOCOLATE BROWN INK","INK","kg","","None","0");
INSERT INTO product VALUES("650","MAGENTA INK","INK","kg","","None","0");
INSERT INTO product VALUES("651","LD PRINTED ABUAD WATER ROLL","ABUAD WATER","kg","","None","0");
INSERT INTO product VALUES("652","LD PLAIN MILKY WHITE ROLL (680MMX70MIC)","MILKY ROLL","kg","","None","0");
INSERT INTO product VALUES("653","LD PLAIN MILKY WHITE ROLL {340MMX70MIC)","MILKY WHITE","kg","","None","0");
INSERT INTO product VALUES("654","HD PLAIN PACKING BAG (350MMX22MIC)","PACKING BAG ROLL","kg","","None","0");
INSERT INTO product VALUES("655","LD PRINTED TORIA WATER ROLLS","TORIA WATER","kg","","None","0");
INSERT INTO product VALUES("656","new oselen chinchin roll (orange colour)","oselene chinchin","kg","","None","0");
INSERT INTO product VALUES("657","mm orange flavour roll","mm youghurt","kg","","None","0");
INSERT INTO product VALUES("658","mm chocolate flavour roll","youghurt roll","kg","","None","0");
INSERT INTO product VALUES("659","mm pineapple flavour roll","youghrt roll","kg","","None","0");
INSERT INTO product VALUES("660","MM PRINTED YELLOW YOUGHURT ROLL","YOUGHURT ROLL","kg","","None","0");
INSERT INTO product VALUES("661","plain shrink sheet roll (290mm)","shrink sheet","kg","","None","0");
INSERT INTO product VALUES("662","mm youghurt label (33cl)","mm youghrt","kg","","None","0");
INSERT INTO product VALUES("663","ld plain shrink sheet rolls (520mm)","shrink","kg","","None","0");
INSERT INTO product VALUES("664","ld plain shrink sheet roll (170mm)","shrink roll","kg","","None","0");
INSERT INTO product VALUES("665","LD PLAIN SHRINK SHEET ROLL (600MM)","SHRINK SHEET","kg","","None","0");
INSERT INTO product VALUES("666","DESEA CYLINDER","CYLINDER","kg","","None","0");
INSERT INTO product VALUES("667","BIDS OF PACKING BAGS","PACKING BAG","kg","","None","0");
INSERT INTO product VALUES("668","ld plain water roll (680x34mic)","plain water","kg","","None","0");
INSERT INTO product VALUES("669","plain packing bag (5.0 gram by flexplast)","packing bag","kg","","None","0");
INSERT INTO product VALUES("670","printed aqua crown water roll","al-mm ventures","kg","","None","0");
INSERT INTO product VALUES("671","ld plain industrial roll (480x45mic)","industrial roll","kg","","None","0");
INSERT INTO product VALUES("672","LD PLAIN INDUSTRIAL BAG {490X1080MM)","INDUSTRIAL BAGS","kg","","None","0");
INSERT INTO product VALUES("673","LD PLAIN INDUSTRIAL BAG (510X1570MM)","INDUSTRIAL BAG","kg","","None","0");
INSERT INTO product VALUES("674","LD PLAIN INDUSTRIAL BAG (435x535mm)","iindustrial bag","kg","","None","0");
INSERT INTO product VALUES("675","plain shrink tube roll (480x45mic)","shrink tube","kg","","None","0");
INSERT INTO product VALUES("676","plain shrink tube roll (435x40mic)","shrink tube","kg","","None","0");
INSERT INTO product VALUES("677","ld plain juice roll (340mm)","juice rolls","kg","","None","0");
INSERT INTO product VALUES("678","printed eddy chuks water roll","printed roll","kg","","None","0");
INSERT INTO product VALUES("679","plain bopp roll (145mm)","bopp roll","kg","","None","0");
INSERT INTO product VALUES("680","HD PLAIN PACKING BAG ROLL (345x6.5 gram)","packing bag roll","kg","","None","0");
INSERT INTO product VALUES("681","printed dekuul dispenser bag","dekuul water","kg","","None","0");
INSERT INTO product VALUES("682","ld plain roll (430mmx40mic)","ld plain roll","kg","","None","0");
INSERT INTO product VALUES("683","ld plain roll (435mmx40mic)","ld plain roll","kg","","None","0");
INSERT INTO product VALUES("684","ld plain water roll (680mmx68mic)","water roll","kg","","None","0");
INSERT INTO product VALUES("685","ld plain water roll (680mmx39mic)","ld water roll","kg","","None","0");
INSERT INTO product VALUES("686","ld plain water roll (340mmx68mic)","water roll","kg","","None","0");
INSERT INTO product VALUES("687","printed tasty time roll (green color)","tasty time","kg","","None","0");
INSERT INTO product VALUES("688","printed tasty time roll (white color)","tasty time","kg","","None","0");
INSERT INTO product VALUES("689","printed tasty time roll (red color)","tasty time","kg","","None","0");
INSERT INTO product VALUES("690","printed jumaplast industrial bag","jumaplast","kg","","None","0");
INSERT INTO product VALUES("691","toilet seal nylon industrial bag","industrial bags","kg","","None","0");
INSERT INTO product VALUES("692","golden yellow ink","ink","kg","","None","0");
INSERT INTO product VALUES("693","proc. orange ink","ink","kg","","None","0");
INSERT INTO product VALUES("694","black ink","ink","kg","","None","0");
INSERT INTO product VALUES("695","flex pink ink","ink","kg","","None","0");
INSERT INTO product VALUES("696","flex green ink","ink","kg","","None","0");
INSERT INTO product VALUES("697","LAWAL ROLL","lawal","kg","","None","0");
INSERT INTO product VALUES("698","Coconut Biscuit","Mabisco ","kg","","None","0");
INSERT INTO product VALUES("699","Oselen plain nylon","Oselen","kg","","None","0");
INSERT INTO product VALUES("700","printed mabisco","mabisco biscults","kg","","None","0");
INSERT INTO product VALUES("701","printed mabisco","mabisco biscults","kg","","None","0");
INSERT INTO product VALUES("702","Mabisco Mamas Milk Rolls","Mayor","kg","","None","0");
INSERT INTO product VALUES("703","Mabisco So Sweet Cookies","Mayor","kg","","None","0");
INSERT INTO product VALUES("704","Mabisco Heros Popcorn Crackers","Mayor","kg","","None","0");
INSERT INTO product VALUES("705","Mabisco So sweet Cookies","Mayor","kg","","None","0");
INSERT INTO product VALUES("706","Mabisco Digestive","Mayor ","kg","","None","0");
INSERT INTO product VALUES("707","Mabisco Bisco+ Biscuit","Mayor","kg","","None","0");
INSERT INTO product VALUES("708","Mabisco Bisco+ Marie ","Mayor","kg","","None","0");
INSERT INTO product VALUES("709","Mamas Milk","Mayor","kg","","None","0");
INSERT INTO product VALUES("710","Mabicos Digestive Biscuit","Mayor","kg","","None","0");
INSERT INTO product VALUES("711","MABISCO DIGESTIVE BISCUIT","MAYOR","kg","","None","0");
INSERT INTO product VALUES("712","Mabisco Mamas Milk Biscuit Wrapper","Mayor","kg","","None","0");
INSERT INTO product VALUES("713","Mabisco Digestive Biscuit Wrapper","Mayor","kg","","None","0");
INSERT INTO product VALUES("714","Mabisco Coffee Joy Biscuit Wrapper","Mayor","kg","","None","0");
INSERT INTO product VALUES("715","Mabisco Coconut Biscuit Wrapper","Mayor","kg","","None","0");
INSERT INTO product VALUES("716","Mabisco ABC Biscuit","Mayor","kg","","None","0");
INSERT INTO product VALUES("717","Mabisco ABC Biscuit Wrapper","Mayor","kg","","None","0");
INSERT INTO product VALUES("718","Hair Prestige","BELLA","kg","","None","0");
INSERT INTO product VALUES("719","Mabisco Hard Tack Biscuit","Mayor","kg","","None","0");
INSERT INTO product VALUES("720","MABISCO HARD TACK BISCUIT","Mayor","kg","","None","0");
INSERT INTO product VALUES("721","MABISCO ALOHA BISCUIT","Mayor","kg","","None","0");
INSERT INTO product VALUES("722","Mabisco Tasty Coffee Joy Biscuit Wrapper ","Mayor","kg","","None","0");
INSERT INTO product VALUES("723","MABISCO MAMAS MILK WRAPPER","Mayor","kg","","None","0");
INSERT INTO product VALUES("724","Mabisco Mamas Milk Wrap","Mayor","kg","","None","0");
INSERT INTO product VALUES("725","Mabisco ABC Biscuit Wrap","Mayor","kg","","None","0");
INSERT INTO product VALUES("726","Josephine princess cake","Josephine","kg","","None","0");
INSERT INTO product VALUES("727","AA POPCORN WRAPPER","AA FOOD","kg","","None","0");
INSERT INTO product VALUES("728","AA Popcorn wrapper","AA FOODS","kg","","None","0");
INSERT INTO product VALUES("729","10 litre complete gik","Shongai Packaging","set","","None","0");
INSERT INTO product VALUES("730","10 litres gik","Shongai Packaging","pcs","","None","0");
INSERT INTO product VALUES("731","PLAIN BOPP","Hello Product Limited","kg","","None","0");
INSERT INTO product VALUES("732","HD Plain Packing bags","xtra large farm","bdls","","None","0");



CREATE TABLE `product_detail` (
  `productdetail_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `w_id` int(11) NOT NULL,
  `datepicker_mfg_date` varchar(11) DEFAULT NULL,
  `datepicker_exp_date` varchar(11) DEFAULT NULL,
  `product_quantity` decimal(10,2) NOT NULL,
  `product_sell_price` decimal(10,2) NOT NULL,
  `product_supplier_price` decimal(10,2) NOT NULL,
  `dead_stock` tinyint(1) NOT NULL,
  `update_date` date DEFAULT NULL,
  PRIMARY KEY (`productdetail_id`),
  UNIQUE KEY `p_id` (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=733 DEFAULT CHARSET=latin1;

INSERT INTO product_detail VALUES("1","1","19","12","1","None","None","12.90","1100.00","6000.00","0","");
INSERT INTO product_detail VALUES("2","2","19","12","1","None","None","-11.50","8.00","8.00","0","");
INSERT INTO product_detail VALUES("3","3","19","12","1","None","None","0.00","5000.00","8700.00","0","");
INSERT INTO product_detail VALUES("4","4","19","12","1","None","None","0.00","5000.00","8700.00","0","");
INSERT INTO product_detail VALUES("5","5","19","12","1","None","None","0.00","10000.00","8700.00","0","");
INSERT INTO product_detail VALUES("6","6","19","4","1","None","None","1005.00","690.00","900.00","0","");
INSERT INTO product_detail VALUES("7","7","19","12","1","None","None","0.00","5000.00","3000.00","0","");
INSERT INTO product_detail VALUES("8","8","19","12","1","None","None","0.00","5000.00","0.00","0","");
INSERT INTO product_detail VALUES("9","9","19","7","1","None","None","0.00","9.00","8.00","0","");
INSERT INTO product_detail VALUES("10","10","19","7","1","None","None","0.00","7.00","6.00","0","");
INSERT INTO product_detail VALUES("11","11","19","3","1","None","None","0.00","680.00","800.00","0","");
INSERT INTO product_detail VALUES("12","12","19","12","1","None","None","0.00","5000.00","6000.00","0","");
INSERT INTO product_detail VALUES("13","13","19","12","1","None","None","0.00","5000.00","3000.00","0","");
INSERT INTO product_detail VALUES("14","14","19","5","1","None","None","0.00","6500.00","690.00","0","");
INSERT INTO product_detail VALUES("15","15","19","5","1","None","None","0.00","3800.00","3600.00","0","");
INSERT INTO product_detail VALUES("16","16","19","5","1","None","None","0.00","5000.00","900.00","0","");
INSERT INTO product_detail VALUES("17","17","19","5","1","None","None","0.00","3700.00","3500.00","0","");
INSERT INTO product_detail VALUES("18","18","19","5","1","None","None","0.00","5320.00","5120.00","0","");
INSERT INTO product_detail VALUES("19","19","19","5","1","None","None","0.00","5320.00","5120.00","0","");
INSERT INTO product_detail VALUES("20","20","19","7","1","None","None","0.00","1500.00","950.00","0","");
INSERT INTO product_detail VALUES("21","21","19","4","1","None","None","500.00","1000.00","1070.00","0","");
INSERT INTO product_detail VALUES("22","22","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("23","23","19","1","1","None","None","0.00","1270.00","670.00","0","");
INSERT INTO product_detail VALUES("24","24","19","8","1","None","None","0.00","1250.00","900.00","0","");
INSERT INTO product_detail VALUES("25","25","19","8","1","None","None","0.00","1500.00","1100.00","0","");
INSERT INTO product_detail VALUES("26","26","19","5","1","None","None","75.00","9500.00","3800.00","0","");
INSERT INTO product_detail VALUES("27","27","19","1","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("28","28","19","7","1","None","None","0.00","1500.00","950.00","0","");
INSERT INTO product_detail VALUES("29","29","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("30","30","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("31","31","19","5","1","None","None","0.00","975.00","775.00","0","");
INSERT INTO product_detail VALUES("32","32","19","5","1","None","None","0.00","940.00","740.00","0","");
INSERT INTO product_detail VALUES("33","33","19","2","1","None","None","0.00","700.00","635.00","0","");
INSERT INTO product_detail VALUES("34","34","19","2","1","None","None","0.00","700.00","635.00","0","");
INSERT INTO product_detail VALUES("35","35","19","9","1","None","None","0.00","720.00","650.00","0","");
INSERT INTO product_detail VALUES("36","36","19","9","1","None","None","0.00","900.00","680.00","0","");
INSERT INTO product_detail VALUES("37","37","19","1","1","None","None","0.00","1350.00","700.00","0","");
INSERT INTO product_detail VALUES("38","38","19","9","1","None","None","0.00","720.00","680.00","0","");
INSERT INTO product_detail VALUES("39","39","19","1","1","None","None","0.00","920.00","670.00","0","");
INSERT INTO product_detail VALUES("40","40","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("41","41","19","5","1","None","None","0.00","4600.00","4400.00","0","");
INSERT INTO product_detail VALUES("42","42","19","5","1","None","None","0.00","4600.00","4400.00","0","");
INSERT INTO product_detail VALUES("43","43","19","5","1","None","None","0.00","4600.00","4400.00","0","");
INSERT INTO product_detail VALUES("44","44","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("45","45","19","10","1","None","None","225.00","1800.00","1720.00","0","");
INSERT INTO product_detail VALUES("46","46","19","10","1","None","None","0.00","2000.00","310.43","0","");
INSERT INTO product_detail VALUES("47","47","19","5","1","None","None","0.00","3800.00","3600.00","0","");
INSERT INTO product_detail VALUES("48","48","19","1","1","None","None","0.00","800.00","670.00","0","");
INSERT INTO product_detail VALUES("49","49","19","1","1","None","None","1011.00","1000.00","1500.00","0","");
INSERT INTO product_detail VALUES("50","50","19","5","1","None","None","70.00","9000.00","3800.00","0","");
INSERT INTO product_detail VALUES("51","51","19","5","1","None","None","5.00","5500.00","3500.00","0","");
INSERT INTO product_detail VALUES("52","52","19","5","1","None","None","0.00","4700.00","4500.00","0","");
INSERT INTO product_detail VALUES("53","53","19","5","1","None","None","0.00","6500.00","5400.00","0","");
INSERT INTO product_detail VALUES("54","54","19","5","1","None","None","0.00","5600.00","5400.00","0","");
INSERT INTO product_detail VALUES("55","55","19","3","1","None","None","0.00","730.00","635.00","0","");
INSERT INTO product_detail VALUES("56","56","19","5","1","None","None","0.00","5700.00","5500.00","0","");
INSERT INTO product_detail VALUES("57","57","19","10","1","None","None","240.00","2100.00","1800.63","0","");
INSERT INTO product_detail VALUES("58","58","19","9","1","None","None","0.00","720.00","680.00","0","");
INSERT INTO product_detail VALUES("59","59","19","2","1","None","None","0.00","700.00","635.00","0","");
INSERT INTO product_detail VALUES("60","60","19","4","1","None","None","5069.50","950.00","1200.00","0","");
INSERT INTO product_detail VALUES("61","61","19","1","1","None","None","0.00","1150.00","670.00","0","");
INSERT INTO product_detail VALUES("62","62","19","10","1","None","None","0.00","1300.00","1250.00","0","");
INSERT INTO product_detail VALUES("63","63","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("64","64","19","3","1","None","None","0.00","730.00","635.00","0","");
INSERT INTO product_detail VALUES("65","65","19","4","1","None","None","0.00","630.00","580.00","0","");
INSERT INTO product_detail VALUES("66","66","19","8","1","None","None","0.00","1500.00","1250.00","0","");
INSERT INTO product_detail VALUES("67","67","19","5","1","None","None","0.00","1030.00","830.00","0","");
INSERT INTO product_detail VALUES("68","68","19","8","1","None","None","0.00","1500.00","1250.00","0","");
INSERT INTO product_detail VALUES("69","69","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("70","70","19","5","1","None","None","300.00","1000.00","800.00","0","");
INSERT INTO product_detail VALUES("71","71","19","4","1","None","None","645.20","950.00","1070.00","0","");
INSERT INTO product_detail VALUES("72","72","19","5","1","None","None","0.00","5700.00","710.00","0","");
INSERT INTO product_detail VALUES("73","73","19","5","1","None","None","0.00","4400.00","4500.00","0","");
INSERT INTO product_detail VALUES("74","74","19","5","1","None","None","0.00","3800.00","3600.00","0","");
INSERT INTO product_detail VALUES("75","75","19","5","1","None","None","0.00","3800.00","3600.00","0","");
INSERT INTO product_detail VALUES("76","76","19","4","1","None","None","0.00","1200.00","1200.00","0","");
INSERT INTO product_detail VALUES("77","77","19","5","1","None","None","0.00","5200.00","5000.00","0","");
INSERT INTO product_detail VALUES("78","78","19","5","1","None","None","0.00","5500.00","3300.00","0","");
INSERT INTO product_detail VALUES("79","79","19","5","1","None","None","0.00","5200.00","4000.00","0","");
INSERT INTO product_detail VALUES("80","80","19","1","1","None","None","0.00","900.00","690.00","0","");
INSERT INTO product_detail VALUES("81","81","19","1","1","None","None","0.00","740.00","670.00","0","");
INSERT INTO product_detail VALUES("82","82","19","1","1","None","None","0.00","750.00","670.00","0","");
INSERT INTO product_detail VALUES("83","83","19","8","1","None","None","0.00","1500.00","1250.00","0","");
INSERT INTO product_detail VALUES("84","84","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("85","85","19","5","1","None","None","0.00","4050.00","3850.00","0","");
INSERT INTO product_detail VALUES("86","86","19","5","1","None","None","0.00","4600.00","3900.00","0","");
INSERT INTO product_detail VALUES("87","87","19","4","1","None","None","0.00","630.00","580.00","0","");
INSERT INTO product_detail VALUES("88","88","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("89","89","19","5","1","None","None","0.00","6500.00","690.00","0","");
INSERT INTO product_detail VALUES("90","90","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("91","91","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("92","92","19","9","1","None","None","0.00","7.70","7.00","0","");
INSERT INTO product_detail VALUES("93","93","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("94","94","19","8","1","None","None","0.00","5.00","4.00","0","");
INSERT INTO product_detail VALUES("95","95","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("96","96","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("97","97","19","2","1","None","None","0.00","700.00","635.00","0","");
INSERT INTO product_detail VALUES("98","98","19","2","1","None","None","0.00","730.00","635.00","0","");
INSERT INTO product_detail VALUES("99","99","19","5","1","None","None","0.00","4400.00","4200.00","0","");
INSERT INTO product_detail VALUES("100","100","19","2","1","None","None","0.00","700.00","635.00","0","");
INSERT INTO product_detail VALUES("101","101","19","2","1","None","None","0.00","1075.00","800.00","0","");
INSERT INTO product_detail VALUES("102","102","19","5","1","None","None","0.00","1010.00","810.00","0","");
INSERT INTO product_detail VALUES("103","103","19","5","1","None","None","0.00","6500.00","690.00","0","");
INSERT INTO product_detail VALUES("104","104","19","4","1","None","None","1456.20","630.00","700.00","0","");
INSERT INTO product_detail VALUES("105","105","19","5","1","None","None","0.00","5450.00","5250.00","0","");
INSERT INTO product_detail VALUES("106","106","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("107","107","19","9","1","None","None","0.00","950.00","750.00","0","");
INSERT INTO product_detail VALUES("108","108","19","5","1","None","None","0.00","1010.00","810.00","0","");
INSERT INTO product_detail VALUES("109","109","19","1","1","None","None","0.00","730.00","670.00","0","");
INSERT INTO product_detail VALUES("110","110","19","5","1","None","None","23.80","5500.00","810.00","0","");
INSERT INTO product_detail VALUES("111","111","19","8","1","None","None","0.00","1500.00","950.00","0","");
INSERT INTO product_detail VALUES("112","112","19","5","1","None","None","0.00","1010.00","810.00","0","");
INSERT INTO product_detail VALUES("113","113","19","10","1","None","None","0.00","1300.00","1250.00","0","");
INSERT INTO product_detail VALUES("114","114","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("115","115","19","5","1","None","None","0.00","890.00","690.00","0","");
INSERT INTO product_detail VALUES("116","116","19","1","1","None","None","0.00","700.00","650.00","0","");
INSERT INTO product_detail VALUES("117","117","19","5","1","None","None","0.00","5500.00","810.00","0","");
INSERT INTO product_detail VALUES("118","118","19","1","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("119","119","19","1","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("120","120","19","5","1","None","None","0.00","4950.00","710.00","0","");
INSERT INTO product_detail VALUES("121","121","19","9","1","None","None","0.00","720.00","650.00","0","");
INSERT INTO product_detail VALUES("122","122","19","5","1","None","None","1.00","5450.00","5250.00","0","");
INSERT INTO product_detail VALUES("123","123","19","9","1","None","None","0.00","720.00","650.00","0","");
INSERT INTO product_detail VALUES("124","124","19","15","1","None","None","0.00","820.00","750.00","0","");
INSERT INTO product_detail VALUES("125","125","19","9","1","None","None","0.00","720.00","650.00","0","");
INSERT INTO product_detail VALUES("126","126","19","2","1","None","None","29.80","1350.00","800.00","0","");
INSERT INTO product_detail VALUES("127","127","19","7","1","None","None","0.00","1500.00","900.00","0","");
INSERT INTO product_detail VALUES("128","128","19","10","1","None","None","10.00","1800.00","1300.00","0","");
INSERT INTO product_detail VALUES("129","129","19","5","1","None","None","0.00","1075.00","640.00","0","");
INSERT INTO product_detail VALUES("130","130","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("131","131","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("132","132","19","1","1","None","None","0.00","680.00","670.00","0","");
INSERT INTO product_detail VALUES("133","133","19","5","1","None","None","0.00","5500.00","5300.00","0","");
INSERT INTO product_detail VALUES("134","134","19","1","1","None","None","0.00","720.00","0.00","0","");
INSERT INTO product_detail VALUES("135","135","19","5","1","None","None","0.00","5300.00","5100.00","0","");
INSERT INTO product_detail VALUES("136","136","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("137","137","19","15","1","None","None","0.00","820.00","750.00","0","");
INSERT INTO product_detail VALUES("138","138","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("139","139","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("140","140","19","8","1","None","None","0.00","1500.00","1400.00","0","");
INSERT INTO product_detail VALUES("141","141","19","8","1","None","None","0.00","1500.00","1250.00","0","");
INSERT INTO product_detail VALUES("142","142","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("143","143","19","5","1","None","None","2.60","5300.00","5100.00","0","");
INSERT INTO product_detail VALUES("144","144","19","15","1","None","None","0.00","820.00","750.00","0","");
INSERT INTO product_detail VALUES("145","145","19","5","1","None","None","0.00","5300.00","640.00","0","");
INSERT INTO product_detail VALUES("146","146","19","2","1","None","None","0.00","1290.00","635.00","0","");
INSERT INTO product_detail VALUES("147","147","19","1","1","None","None","0.00","950.00","670.00","0","");
INSERT INTO product_detail VALUES("148","148","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("149","149","19","2","1","None","None","0.00","680.00","635.00","0","");
INSERT INTO product_detail VALUES("150","150","19","2","1","None","None","0.00","700.00","635.00","0","");
INSERT INTO product_detail VALUES("151","151","19","1","1","None","None","0.00","1150.00","670.00","0","");
INSERT INTO product_detail VALUES("152","152","19","2","1","None","None","0.00","700.00","620.00","0","");
INSERT INTO product_detail VALUES("153","153","19","1","1","None","None","0.00","950.00","670.00","0","");
INSERT INTO product_detail VALUES("154","154","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("155","155","19","2","1","None","None","0.00","700.00","635.00","0","");
INSERT INTO product_detail VALUES("156","156","19","1","1","None","None","0.00","700.00","670.00","0","");
INSERT INTO product_detail VALUES("157","157","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("158","158","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("159","159","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("160","160","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("161","161","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("162","162","19","8","1","None","None","0.00","1500.00","1250.00","0","");
INSERT INTO product_detail VALUES("163","163","19","8","1","None","None","0.00","1500.00","1250.00","0","");
INSERT INTO product_detail VALUES("164","164","19","1","1","None","None","0.00","700.00","670.00","0","");
INSERT INTO product_detail VALUES("165","165","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("166","166","19","5","1","None","None","0.00","5300.00","5100.00","0","");
INSERT INTO product_detail VALUES("167","167","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("168","168","19","1","1","None","None","0.00","1700.00","1210.00","0","");
INSERT INTO product_detail VALUES("169","169","19","5","1","None","None","0.00","5300.00","5100.00","0","");
INSERT INTO product_detail VALUES("170","170","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("171","171","19","5","1","None","None","0.00","940.00","740.00","0","");
INSERT INTO product_detail VALUES("172","172","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("173","173","19","15","1","None","None","0.00","820.00","750.00","0","");
INSERT INTO product_detail VALUES("174","174","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("175","175","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("176","176","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("177","177","19","2","1","None","None","0.00","700.00","635.00","0","");
INSERT INTO product_detail VALUES("178","178","19","6","1","None","None","0.00","8800.00","8000.00","0","");
INSERT INTO product_detail VALUES("179","179","19","6","1","None","None","90.00","8800.00","800.00","0","");
INSERT INTO product_detail VALUES("180","180","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("181","181","19","15","1","None","None","0.00","820.00","750.00","0","");
INSERT INTO product_detail VALUES("182","182","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("183","183","19","15","1","None","None","40.50","820.00","780.00","0","");
INSERT INTO product_detail VALUES("184","184","19","15","1","None","None","0.00","820.00","750.00","0","");
INSERT INTO product_detail VALUES("185","185","19","1","1","None","None","0.00","1350.00","750.00","0","");
INSERT INTO product_detail VALUES("186","186","19","8","1","None","None","0.00","1500.00","1250.00","0","");
INSERT INTO product_detail VALUES("187","187","19","4","1","None","None","0.00","610.00","570.00","0","");
INSERT INTO product_detail VALUES("188","188","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("189","189","19","2","1","None","None","0.00","700.00","635.00","0","");
INSERT INTO product_detail VALUES("190","190","19","3","1","None","None","0.00","730.00","635.00","0","");
INSERT INTO product_detail VALUES("191","191","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("192","192","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("193","193","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("194","194","19","9","1","None","None","46200.00","8.00","5.00","0","");
INSERT INTO product_detail VALUES("195","195","19","3","1","None","None","0.00","730.00","635.00","0","");
INSERT INTO product_detail VALUES("196","196","19","5","1","None","None","131.50","950.00","690.00","0","");
INSERT INTO product_detail VALUES("197","197","19","4","1","None","None","0.00","630.00","580.00","0","");
INSERT INTO product_detail VALUES("198","198","19","4","1","None","None","0.00","950.00","1200.00","0","");
INSERT INTO product_detail VALUES("199","199","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("200","200","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("201","201","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("202","202","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("203","203","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("204","204","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("205","205","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("206","206","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("207","207","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("208","208","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("209","209","19","2","1","None","None","0.00","700.00","635.00","0","");
INSERT INTO product_detail VALUES("210","210","19","9","1","None","None","0.00","989.00","690.00","0","");
INSERT INTO product_detail VALUES("211","211","19","9","1","None","None","14.30","710.00","690.00","0","");
INSERT INTO product_detail VALUES("212","212","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("213","213","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("214","214","19","4","1","None","None","0.00","950.00","580.00","0","");
INSERT INTO product_detail VALUES("215","215","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("216","216","19","5","1","None","None","0.00","4200.00","4000.00","0","");
INSERT INTO product_detail VALUES("217","217","19","2","1","None","None","0.00","700.00","635.00","0","");
INSERT INTO product_detail VALUES("218","218","19","2","1","None","None","0.00","700.00","635.00","0","");
INSERT INTO product_detail VALUES("219","219","19","12","1","None","None","0.00","5000.00","0.00","0","");
INSERT INTO product_detail VALUES("220","220","19","12","1","None","None","0.00","5000.00","0.00","0","");
INSERT INTO product_detail VALUES("221","221","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("222","222","19","1","1","None","None","0.00","1050.00","670.00","0","");
INSERT INTO product_detail VALUES("223","223","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("224","224","19","5","1","None","None","2.00","6100.00","5900.00","0","");
INSERT INTO product_detail VALUES("225","225","19","5","1","None","None","0.00","5300.00","5100.00","0","");
INSERT INTO product_detail VALUES("226","226","19","12","1","None","None","0.00","5000.00","0.00","0","");
INSERT INTO product_detail VALUES("227","227","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("228","228","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("229","229","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("230","230","19","8","1","None","None","0.00","1500.00","1250.00","0","");
INSERT INTO product_detail VALUES("231","231","19","13","1","None","None","76.00","1000.00","790.00","0","");
INSERT INTO product_detail VALUES("232","232","19","13","1","None","None","0.00","840.00","790.00","0","");
INSERT INTO product_detail VALUES("233","233","19","5","1","None","None","0.00","5200.00","5000.00","0","");
INSERT INTO product_detail VALUES("234","234","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("235","235","19","5","1","None","None","0.00","6500.00","5200.00","0","");
INSERT INTO product_detail VALUES("236","236","19","9","1","None","None","0.00","700.00","690.00","0","");
INSERT INTO product_detail VALUES("237","237","19","3","1","None","None","0.00","730.00","635.00","0","");
INSERT INTO product_detail VALUES("238","238","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("239","239","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("240","240","19","14","1","None","None","0.00","1280.00","760.00","0","");
INSERT INTO product_detail VALUES("241","241","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("242","242","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("243","243","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("244","244","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("245","245","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("246","246","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("247","247","19","14","1","None","None","0.00","820.00","760.00","0","");
INSERT INTO product_detail VALUES("248","248","19","1","1","None","None","12.60","980.00","670.00","0","");
INSERT INTO product_detail VALUES("249","249","19","14","1","None","None","0.00","820.00","760.00","0","");
INSERT INTO product_detail VALUES("250","250","19","5","1","None","None","0.00","5300.00","5100.00","0","");
INSERT INTO product_detail VALUES("251","251","19","6","1","None","None","0.00","0.00","640.00","0","");
INSERT INTO product_detail VALUES("252","252","19","5","1","None","None","0.00","960.00","760.00","0","");
INSERT INTO product_detail VALUES("253","253","19","8","1","None","None","0.00","1500.00","1250.00","0","");
INSERT INTO product_detail VALUES("254","254","19","2","1","None","None","0.00","700.00","635.00","0","");
INSERT INTO product_detail VALUES("255","255","19","2","1","None","None","0.00","700.00","635.00","0","");
INSERT INTO product_detail VALUES("256","256","19","2","1","None","None","0.00","700.00","635.00","0","");
INSERT INTO product_detail VALUES("257","257","19","2","1","None","None","0.00","720.00","635.00","0","");
INSERT INTO product_detail VALUES("258","258","19","7","1","None","None","14.00","1500.00","635.00","0","");
INSERT INTO product_detail VALUES("259","259","19","8","1","None","None","0.00","1500.00","1250.00","0","");
INSERT INTO product_detail VALUES("260","260","19","14","1","None","None","0.00","800.00","760.00","0","");
INSERT INTO product_detail VALUES("261","261","19","1","1","None","None","0.00","800.00","670.00","0","");
INSERT INTO product_detail VALUES("262","262","19","1","1","None","None","0.00","1070.00","670.00","0","");
INSERT INTO product_detail VALUES("263","263","19","8","1","None","None","0.00","1500.00","1250.00","0","");
INSERT INTO product_detail VALUES("264","264","19","8","1","None","None","0.00","1500.00","1250.00","0","");
INSERT INTO product_detail VALUES("265","265","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("266","266","19","15","1","None","None","0.00","820.00","670.00","0","");
INSERT INTO product_detail VALUES("267","267","19","8","1","None","None","0.00","1850.00","1280.00","0","");
INSERT INTO product_detail VALUES("268","268","19","5","1","None","None","0.00","6500.00","690.00","0","");
INSERT INTO product_detail VALUES("269","269","19","5","1","None","None","0.00","4950.00","710.00","0","");
INSERT INTO product_detail VALUES("270","270","19","1","1","None","None","0.00","1100.00","685.00","0","");
INSERT INTO product_detail VALUES("271","271","19","4","1","None","None","0.00","1130.00","1200.00","0","");
INSERT INTO product_detail VALUES("272","272","19","4","1","None","None","0.00","860.00","580.00","0","");
INSERT INTO product_detail VALUES("273","273","19","5","1","None","None","8.00","950.00","690.00","0","");
INSERT INTO product_detail VALUES("274","274","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("275","275","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("276","276","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("277","277","19","1","1","None","None","0.00","1400.00","690.00","0","");
INSERT INTO product_detail VALUES("278","278","19","1","1","None","None","0.00","680.00","650.00","0","");
INSERT INTO product_detail VALUES("279","279","19","16","1","None","None","0.00","850.00","800.00","0","");
INSERT INTO product_detail VALUES("280","280","19","16","1","None","None","0.00","850.00","800.00","0","");
INSERT INTO product_detail VALUES("281","281","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("282","282","19","1","1","None","None","0.00","680.00","650.00","0","");
INSERT INTO product_detail VALUES("283","283","19","1","1","None","None","0.00","680.00","650.00","0","");
INSERT INTO product_detail VALUES("284","284","19","1","1","None","None","0.00","680.00","650.00","0","");
INSERT INTO product_detail VALUES("285","285","19","1","1","None","None","0.00","680.00","650.00","0","");
INSERT INTO product_detail VALUES("286","286","19","1","1","None","None","0.00","650.00","650.00","0","");
INSERT INTO product_detail VALUES("287","287","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("288","288","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("289","289","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("290","290","19","5","1","None","None","0.00","5300.00","5100.00","0","");
INSERT INTO product_detail VALUES("291","291","19","1","1","None","None","0.00","680.00","650.00","0","");
INSERT INTO product_detail VALUES("292","292","19","1","1","None","None","0.00","1270.00","690.00","0","");
INSERT INTO product_detail VALUES("293","293","19","9","1","None","None","0.00","720.00","690.00","0","");
INSERT INTO product_detail VALUES("294","294","19","1","1","None","None","0.00","750.00","670.00","0","");
INSERT INTO product_detail VALUES("295","295","19","2","1","None","None","0.00","1290.00","635.00","0","");
INSERT INTO product_detail VALUES("296","296","19","2","1","None","None","0.00","700.00","800.00","0","");
INSERT INTO product_detail VALUES("297","297","19","2","1","None","None","0.00","750.00","635.00","0","");
INSERT INTO product_detail VALUES("298","298","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("299","299","19","5","1","None","None","0.00","940.00","740.00","0","");
INSERT INTO product_detail VALUES("300","300","1","2","1","None","None","0.00","750.00","640.00","0","");
INSERT INTO product_detail VALUES("301","301","19","2","1","None","None","0.00","1220.00","620.00","0","");
INSERT INTO product_detail VALUES("302","302","19","17","1","None","None","0.00","3000.00","0.00","0","");
INSERT INTO product_detail VALUES("303","303","19","2","1","None","None","0.00","750.00","640.00","0","");
INSERT INTO product_detail VALUES("304","304","19","18","1","None","None","0.00","200.00","50.00","0","");
INSERT INTO product_detail VALUES("305","305","19","12","1","None","None","0.00","1800.00","1650.00","0","");
INSERT INTO product_detail VALUES("306","306","19","1","1","None","None","0.00","710.00","670.00","0","");
INSERT INTO product_detail VALUES("307","307","19","18","1","None","None","0.00","10000.00","2000.00","0","");
INSERT INTO product_detail VALUES("308","308","19","2","1","None","None","0.00","746.00","800.00","0","");
INSERT INTO product_detail VALUES("309","309","19","1","1","None","None","0.00","670.00","670.00","0","");
INSERT INTO product_detail VALUES("310","310","19","2","1","None","None","0.00","750.00","640.00","0","");
INSERT INTO product_detail VALUES("311","311","19","12","1","None","None","0.00","810.00","640.00","0","");
INSERT INTO product_detail VALUES("312","312","19","5","1","None","None","150.00","6000.00","700.00","0","");
INSERT INTO product_detail VALUES("313","313","19","9","1","None","None","0.00","720.00","640.00","0","");
INSERT INTO product_detail VALUES("314","314","19","13","1","None","None","0.00","10.00","15.00","0","");
INSERT INTO product_detail VALUES("315","315","19","8","1","None","None","0.00","1500.00","1100.00","0","");
INSERT INTO product_detail VALUES("316","316","19","9","1","None","None","0.00","800.00","740.00","0","");
INSERT INTO product_detail VALUES("317","317","19","5","1","None","None","0.00","1220.00","700.00","0","");
INSERT INTO product_detail VALUES("318","318","19","12","1","None","None","131.30","1212.12","810.00","0","");
INSERT INTO product_detail VALUES("319","319","19","12","1","None","None","83.40","1300.00","810.00","0","");
INSERT INTO product_detail VALUES("320","320","19","6","1","None","None","0.00","300.00","650.00","0","");
INSERT INTO product_detail VALUES("321","321","19","5","1","None","None","0.00","9000.00","8000.00","0","");
INSERT INTO product_detail VALUES("322","322","19","5","1","None","None","0.00","9000.00","8000.00","0","");
INSERT INTO product_detail VALUES("323","323","19","8","1","None","None","193.20","1100.00","950.00","0","");
INSERT INTO product_detail VALUES("324","324","19","5","1","None","None","4.00","900.00","835.00","0","");
INSERT INTO product_detail VALUES("325","325","19","5","1","None","None","4.00","900.00","835.00","0","");
INSERT INTO product_detail VALUES("326","326","19","5","1","None","None","2.00","900.00","835.00","0","");
INSERT INTO product_detail VALUES("327","327","19","5","1","None","None","1.00","900.00","835.00","0","");
INSERT INTO product_detail VALUES("328","328","19","5","1","None","None","5.00","900.00","835.00","0","");
INSERT INTO product_detail VALUES("329","329","19","5","1","None","None","0.00","13000.00","700.00","0","");
INSERT INTO product_detail VALUES("330","330","19","5","1","None","None","0.00","1505.00","100.00","0","");
INSERT INTO product_detail VALUES("331","331","19","5","1","None","None","0.00","5000.00","690.00","0","");
INSERT INTO product_detail VALUES("332","332","19","17","1","None","None","0.00","2500.00","2400.00","0","");
INSERT INTO product_detail VALUES("333","333","19","17","1","None","None","0.00","2500.00","2400.00","0","");
INSERT INTO product_detail VALUES("334","334","19","6","1","None","None","0.00","800.00","750.00","0","");
INSERT INTO product_detail VALUES("335","335","19","6","1","None","None","0.00","800.00","750.00","0","");
INSERT INTO product_detail VALUES("336","336","19","6","1","None","None","0.00","800.00","750.00","0","");
INSERT INTO product_detail VALUES("337","337","19","18","1","None","None","0.00","300.00","740.00","0","");
INSERT INTO product_detail VALUES("338","338","19","18","1","None","None","0.00","260.00","620.00","0","");
INSERT INTO product_detail VALUES("339","339","19","18","1","None","None","0.00","300.00","670.00","0","");
INSERT INTO product_detail VALUES("340","340","19","17","1","None","None","0.00","120000.00","113000.00","0","");
INSERT INTO product_detail VALUES("379","379","19","6","1","None","None","0.00","6000.00","5500.00","0","");
INSERT INTO product_detail VALUES("342","342","19","8","1","None","None","0.00","1420.00","1300.00","0","");
INSERT INTO product_detail VALUES("343","343","19","8","1","None","None","0.00","1420.00","1300.00","0","");
INSERT INTO product_detail VALUES("344","344","19","8","1","None","None","0.00","1800.00","1700.00","0","");
INSERT INTO product_detail VALUES("345","345","19","8","1","None","None","0.00","698.75","1200.00","0","");
INSERT INTO product_detail VALUES("346","346","19","1","1","None","None","0.00","720.00","670.00","0","");
INSERT INTO product_detail VALUES("347","347","19","17","1","None","None","0.00","1.00","1.00","0","");
INSERT INTO product_detail VALUES("348","348","19","4","1","None","None","0.00","1300.00","580.00","0","");
INSERT INTO product_detail VALUES("349","349","19","11","1","None","None","302.00","1100.00","170000.00","0","");
INSERT INTO product_detail VALUES("350","350","19","11","1","None","None","984.00","1100.00","120000.00","0","");
INSERT INTO product_detail VALUES("351","351","19","2","1","None","None","0.00","746.00","640.00","0","");
INSERT INTO product_detail VALUES("352","352","19","2","1","None","None","0.00","750.00","640.00","0","");
INSERT INTO product_detail VALUES("353","353","19","1","1","None","None","0.00","1400.00","700.00","0","");
INSERT INTO product_detail VALUES("354","354","19","1","1","None","None","27.20","950.00","650.00","0","");
INSERT INTO product_detail VALUES("382","382","19","4","1","None","None","1569.80","720.00","580.00","0","");
INSERT INTO product_detail VALUES("356","356","19","1","1","None","None","130.90","1350.00","670.00","0","");
INSERT INTO product_detail VALUES("357","357","19","1","1","None","None","0.00","950.00","690.00","0","");
INSERT INTO product_detail VALUES("358","358","19","1","1","None","None","0.00","700.00","650.00","0","");
INSERT INTO product_detail VALUES("359","359","19","5","1","None","None","0.00","3.00","2.00","0","");
INSERT INTO product_detail VALUES("360","360","19","5","1","None","None","0.00","746.00","650.00","0","");
INSERT INTO product_detail VALUES("361","361","19","5","1","None","None","0.00","4500.00","4350.00","0","");
INSERT INTO product_detail VALUES("362","362","19","1","1","None","None","7861.00","1400.00","690.00","0","");
INSERT INTO product_detail VALUES("363","363","19","5","1","None","None","0.00","12500.00","5200.00","0","");
INSERT INTO product_detail VALUES("364","364","19","19","1","None","None","0.00","112483.00","108840.00","0","");
INSERT INTO product_detail VALUES("365","365","19","19","1","None","None","0.00","112483.00","108680.00","0","");
INSERT INTO product_detail VALUES("366","366","19","1","1","None","None","0.00","1300.00","700.00","0","");
INSERT INTO product_detail VALUES("367","367","19","20","1","None","None","0.00","1750.00","1400.00","0","");
INSERT INTO product_detail VALUES("368","368","19","20","1","None","None","0.00","2100.00","1750.00","0","");
INSERT INTO product_detail VALUES("369","369","19","20","1","None","None","0.00","35000.00","33200.00","0","");
INSERT INTO product_detail VALUES("370","370","19","1","1","None","None","0.00","700.00","670.00","0","");
INSERT INTO product_detail VALUES("371","371","19","21","1","None","None","0.00","13000.00","10000.00","0","");
INSERT INTO product_detail VALUES("372","372","19","10","1","None","None","0.00","1250.00","1020.00","0","");
INSERT INTO product_detail VALUES("373","373","19","1","1","None","None","12.70","1360.00","670.00","0","");
INSERT INTO product_detail VALUES("374","374","19","2","1","None","None","0.00","1150.00","800.00","0","");
INSERT INTO product_detail VALUES("375","375","19","1","1","None","None","2502.70","940.00","600.00","0","");
INSERT INTO product_detail VALUES("376","376","19","1","1","None","None","3000.80","1400.00","690.00","0","");
INSERT INTO product_detail VALUES("377","377","19","1","1","None","None","0.00","1000.00","670.00","0","");
INSERT INTO product_detail VALUES("378","378","19","1","1","None","None","0.00","75000.00","72000.00","0","");
INSERT INTO product_detail VALUES("380","380","19","19","1","None","None","0.00","85000.00","82000.00","0","");
INSERT INTO product_detail VALUES("381","381","19","1","1","None","None","0.00","870.00","680.00","0","");
INSERT INTO product_detail VALUES("383","383","19","4","1","None","None","0.00","720.00","1100.00","0","");
INSERT INTO product_detail VALUES("384","384","19","4","1","None","None","615.20","900.00","1070.00","0","");
INSERT INTO product_detail VALUES("385","385","19","6","1","None","None","0.00","800.00","745.00","0","");
INSERT INTO product_detail VALUES("386","386","19","1","1","None","None","0.00","1230.00","600.00","0","");
INSERT INTO product_detail VALUES("387","387","19","2","1","None","None","0.00","800.00","740.00","0","");
INSERT INTO product_detail VALUES("388","388","19","6","1","None","None","0.00","850.00","840.00","0","");
INSERT INTO product_detail VALUES("389","389","19","2","1","None","None","0.00","800.00","740.00","0","");
INSERT INTO product_detail VALUES("390","390","19","2","1","None","None","0.00","800.00","740.00","0","");
INSERT INTO product_detail VALUES("391","391","19","5","1","None","None","0.00","793.00","700.00","0","");
INSERT INTO product_detail VALUES("392","392","19","5","1","None","None","0.00","793.00","700.00","0","");
INSERT INTO product_detail VALUES("393","393","19","4","1","None","None","0.00","730.00","580.00","0","");
INSERT INTO product_detail VALUES("394","394","19","1","1","None","None","0.00","740.00","670.00","0","");
INSERT INTO product_detail VALUES("395","395","19","1","1","None","None","882.90","1300.00","700.00","0","");
INSERT INTO product_detail VALUES("396","396","19","5","1","None","None","0.00","13000.00","800.00","0","");
INSERT INTO product_detail VALUES("397","397","19","18","1","None","None","0.00","17500.00","12000.00","0","");
INSERT INTO product_detail VALUES("398","398","19","17","1","None","None","720.00","22500.00","14500.00","0","");
INSERT INTO product_detail VALUES("399","399","19","6","1","None","None","0.00","780.00","740.00","0","");
INSERT INTO product_detail VALUES("400","400","19","1","1","None","None","0.50","950.00","680.00","0","");
INSERT INTO product_detail VALUES("401","401","19","10","1","None","None","0.00","2100.00","1400.00","0","");
INSERT INTO product_detail VALUES("402","402","19","1","1","None","None","0.00","1100.00","670.00","0","");
INSERT INTO product_detail VALUES("403","403","19","1","1","None","None","0.00","745.00","670.00","1","");
INSERT INTO product_detail VALUES("404","404","19","1","1","None","None","0.00","1235.00","550.00","0","");
INSERT INTO product_detail VALUES("405","405","19","1","1","None","None","0.00","730.00","650.00","0","");
INSERT INTO product_detail VALUES("406","406","19","1","1","None","None","0.00","740.00","650.00","0","");
INSERT INTO product_detail VALUES("407","407","19","5","1","None","None","0.00","4000.00","3800.00","0","");
INSERT INTO product_detail VALUES("408","408","19","5","1","None","None","0.00","4000.00","3800.00","0","");
INSERT INTO product_detail VALUES("409","409","19","17","4","None","None","0.00","500.00","500.00","0","");
INSERT INTO product_detail VALUES("410","410","19","2","1","None","None","0.00","770.00","665.00","0","");
INSERT INTO product_detail VALUES("411","411","19","2","1","None","None","0.00","770.00","665.00","0","");
INSERT INTO product_detail VALUES("412","412","19","2","1","None","None","0.00","770.00","665.00","0","");
INSERT INTO product_detail VALUES("413","413","19","17","1","None","None","0.00","19400.00","17400.00","0","");
INSERT INTO product_detail VALUES("414","414","19","15","1","None","None","0.00","650.00","610.00","0","");
INSERT INTO product_detail VALUES("415","415","19","2","1","None","None","0.00","735.00","725.00","0","");
INSERT INTO product_detail VALUES("416","416","19","1","1","None","None","2953.10","1050.00","615.00","0","");
INSERT INTO product_detail VALUES("417","417","19","6","1","None","None","0.00","6000.00","740.00","0","");
INSERT INTO product_detail VALUES("418","418","19","11","1","None","None","1769.00","2000.00","150000.00","0","");
INSERT INTO product_detail VALUES("419","419","19","1","1","None","None","0.00","730.00","715.00","0","");
INSERT INTO product_detail VALUES("420","420","19","1","1","None","None","0.00","690.00","650.00","0","");
INSERT INTO product_detail VALUES("421","421","19","1","1","None","None","0.00","650.00","700.00","0","");
INSERT INTO product_detail VALUES("422","422","19","1","1","None","None","0.00","650.00","660.00","0","");
INSERT INTO product_detail VALUES("423","423","19","1","1","None","None","0.00","1350.00","650.00","0","");
INSERT INTO product_detail VALUES("424","424","19","5","1","None","None","0.00","6900.00","5000.00","0","");
INSERT INTO product_detail VALUES("425","425","19","1","1","None","None","0.00","1100.00","650.00","0","");
INSERT INTO product_detail VALUES("426","426","19","1","1","None","None","0.00","720.00","680.00","0","");
INSERT INTO product_detail VALUES("427","427","19","4","1","None","None","0.00","598.00","585.00","0","");
INSERT INTO product_detail VALUES("428","428","19","19","1","None","None","0.00","87000.00","84000.00","0","");
INSERT INTO product_detail VALUES("429","429","19","14","1","None","None","0.00","840.00","740.00","0","");
INSERT INTO product_detail VALUES("430","430","19","14","1","None","None","0.00","840.00","740.00","0","");
INSERT INTO product_detail VALUES("431","431","19","14","1","None","None","0.00","840.00","740.00","0","");
INSERT INTO product_detail VALUES("432","432","19","14","1","None","None","0.00","1100.00","740.00","0","");
INSERT INTO product_detail VALUES("433","433","19","14","1","None","None","0.00","1100.00","740.00","0","");
INSERT INTO product_detail VALUES("434","434","19","9","1","None","None","0.00","767.00","630.00","0","");
INSERT INTO product_detail VALUES("435","435","19","9","1","None","None","1986.30","1505.00","640.00","0","");
INSERT INTO product_detail VALUES("436","436","19","1","1","None","None","0.00","1.00","50000.00","0","");
INSERT INTO product_detail VALUES("437","437","19","2","1","None","None","0.00","1350.00","625.00","0","");
INSERT INTO product_detail VALUES("438","438","19","1","1","None","None","0.00","950.00","685.00","0","");
INSERT INTO product_detail VALUES("439","439","19","1","2","None","None","0.00","670.00","650.00","0","");
INSERT INTO product_detail VALUES("440","440","19","5","1","None","None","14.80","850.00","800.00","0","");
INSERT INTO product_detail VALUES("441","441","19","5","1","None","None","0.00","5200.00","4500.00","0","");
INSERT INTO product_detail VALUES("442","442","19","5","1","None","None","0.00","5000.00","4600.00","0","");
INSERT INTO product_detail VALUES("443","443","19","18","1","None","None","0.00","310.00","100.00","0","");
INSERT INTO product_detail VALUES("444","444","19","1","2","None","None","0.00","680.00","690.00","0","");
INSERT INTO product_detail VALUES("445","445","35","2","1","None","None","0.00","1100.00","861.00","0","");
INSERT INTO product_detail VALUES("446","446","19","1","2","None","None","0.00","900.00","750.00","0","");
INSERT INTO product_detail VALUES("447","447","19","1","2","None","None","0.00","735.00","690.00","0","");
INSERT INTO product_detail VALUES("448","448","19","5","2","None","None","0.00","7400.00","7400.00","0","");
INSERT INTO product_detail VALUES("449","449","19","19","1","None","None","0.00","85000.00","84000.00","0","");
INSERT INTO product_detail VALUES("450","450","19","14","1","None","None","0.00","1700.00","2.50","0","");
INSERT INTO product_detail VALUES("451","451","19","5","1","None","None","0.00","1200.00","680.00","0","");
INSERT INTO product_detail VALUES("452","452","19","5","1","None","None","0.00","8500.00","690.00","0","");
INSERT INTO product_detail VALUES("453","453","1","17","2","None","None","0.00","800.00","650.00","0","");
INSERT INTO product_detail VALUES("454","454","1","13","2","None","None","0.00","800.00","650.00","0","");
INSERT INTO product_detail VALUES("455","455","1","13","2","None","None","0.00","1200.00","650.00","0","");
INSERT INTO product_detail VALUES("456","456","19","1","1","None","None","0.00","1050.00","650.00","0","");
INSERT INTO product_detail VALUES("457","457","19","6","1","None","None","0.00","715.00","630.00","0","");
INSERT INTO product_detail VALUES("458","458","19","5","1","None","None","0.00","6000.00","4850.00","0","");
INSERT INTO product_detail VALUES("459","459","1","5","1","None","None","0.00","800.00","800.00","0","");
INSERT INTO product_detail VALUES("460","460","19","5","2","None","None","0.00","8000.00","630.00","0","");
INSERT INTO product_detail VALUES("461","461","1","5","1","None","None","0.00","800.00","635.00","0","");
INSERT INTO product_detail VALUES("462","462","19","5","2","None","None","0.00","13000.00","830.00","0","");
INSERT INTO product_detail VALUES("463","463","19","2","2","None","None","0.00","610.00","610.00","0","");
INSERT INTO product_detail VALUES("464","464","19","9","2","None","None","0.00","766.50","510.00","0","");
INSERT INTO product_detail VALUES("465","465","1","9","1","None","None","0.00","620.00","780.00","0","");
INSERT INTO product_detail VALUES("466","466","1","6","2","None","None","0.00","620.00","620.00","0","");
INSERT INTO product_detail VALUES("467","467","1","1","1","None","None","0.00","1270.00","685.00","0","");
INSERT INTO product_detail VALUES("468","468","1","18","1","None","None","0.00","3500.00","1000.00","0","");
INSERT INTO product_detail VALUES("469","469","1","5","1","None","None","0.00","750.00","900.00","0","");
INSERT INTO product_detail VALUES("470","470","1","6","1","None","None","0.00","790.00","630.00","0","");
INSERT INTO product_detail VALUES("471","471","1","23","1","None","None","0.00","200.00","30.00","0","");
INSERT INTO product_detail VALUES("472","472","1","15","2","None","None","0.00","5200.00","5200.00","0","");
INSERT INTO product_detail VALUES("473","473","1","5","2","None","None","0.00","13000.00","6200.00","0","");
INSERT INTO product_detail VALUES("474","474","1","1","1","None","None","82.90","1300.00","915.00","0","");
INSERT INTO product_detail VALUES("475","475","1","2","1","None","None","0.00","700.00","640.00","0","");
INSERT INTO product_detail VALUES("476","476","1","12","1","None","None","0.00","745.50","640.00","0","");
INSERT INTO product_detail VALUES("477","477","1","2","2","None","None","0.00","700.00","680.00","0","");
INSERT INTO product_detail VALUES("478","478","1","1","1","None","None","0.00","730.00","670.00","0","");
INSERT INTO product_detail VALUES("479","479","1","18","1","None","None","706.00","23.33","35.00","0","");
INSERT INTO product_detail VALUES("480","480","1","6","1","None","None","0.00","700.00","800.00","0","");
INSERT INTO product_detail VALUES("481","481","1","6","1","None","None","0.00","800.00","650.00","0","");
INSERT INTO product_detail VALUES("482","482","1","1","2","None","None","0.00","1150.00","585.00","0","");
INSERT INTO product_detail VALUES("483","483","1","6","1","None","None","0.00","715.00","620.00","0","");
INSERT INTO product_detail VALUES("484","484","1","1","2","None","None","0.00","680.00","700.00","0","");
INSERT INTO product_detail VALUES("485","485","1","2","2","None","None","0.00","1021.25","740.00","0","");
INSERT INTO product_detail VALUES("486","486","1","2","1","None","None","0.00","720.00","610.00","0","");
INSERT INTO product_detail VALUES("487","487","1","4","1","None","None","0.00","800.00","620.00","0","");
INSERT INTO product_detail VALUES("488","488","1","9","1","None","None","0.00","750.00","640.00","0","");
INSERT INTO product_detail VALUES("489","489","1","1","1","None","None","0.00","1050.00","1200.00","0","");
INSERT INTO product_detail VALUES("490","490","1","1","1","None","None","3027.00","1350.00","700.00","0","");
INSERT INTO product_detail VALUES("491","491","1","1","1","None","None","0.00","750.00","690.00","0","");
INSERT INTO product_detail VALUES("492","492","1","1","1","None","None","0.00","550.00","685.00","0","");
INSERT INTO product_detail VALUES("493","493","1","1","1","None","None","0.00","870.00","680.00","0","");
INSERT INTO product_detail VALUES("494","494","1","1","1","None","None","0.00","119542.50","119542.50","0","");
INSERT INTO product_detail VALUES("495","495","1","1","2","None","None","0.00","730.00","680.00","0","");
INSERT INTO product_detail VALUES("496","496","1","9","1","None","None","0.00","950.00","640.00","0","");
INSERT INTO product_detail VALUES("497","497","1","9","1","None","None","0.00","770.00","680.00","0","");
INSERT INTO product_detail VALUES("498","498","1","9","1","None","None","0.00","827.75","640.00","0","");
INSERT INTO product_detail VALUES("499","499","1","9","1","None","None","0.00","920.00","750.00","0","");
INSERT INTO product_detail VALUES("500","500","1","1","1","None","None","0.00","710.00","660.00","0","");
INSERT INTO product_detail VALUES("501","501","1","9","1","None","None","0.00","945.00","640.00","0","");
INSERT INTO product_detail VALUES("502","502","1","8","1","None","None","0.00","1550.00","1350.00","0","");
INSERT INTO product_detail VALUES("503","503","1","15","1","None","None","0.00","934.50","750.00","0","");
INSERT INTO product_detail VALUES("504","504","1","1","1","None","None","0.00","740.00","685.00","0","");
INSERT INTO product_detail VALUES("505","505","1","8","1","None","None","0.00","1700.00","1300.00","0","");
INSERT INTO product_detail VALUES("506","506","1","22","1","None","None","0.00","934.50","770.00","0","");
INSERT INTO product_detail VALUES("507","507","1","9","1","None","None","0.00","700.00","600.00","0","");
INSERT INTO product_detail VALUES("508","508","1","1","1","None","None","0.00","740.00","680.00","0","");
INSERT INTO product_detail VALUES("509","509","1","4","1","None","None","0.00","4500.00","635.00","0","");
INSERT INTO product_detail VALUES("510","510","1","5","1","None","None","0.00","6500.00","635.00","0","");
INSERT INTO product_detail VALUES("511","511","1","6","1","None","None","0.00","740.00","630.00","0","");
INSERT INTO product_detail VALUES("512","512","1","1","1","None","None","0.00","1350.00","690.00","0","");
INSERT INTO product_detail VALUES("513","513","1","19","1","None","None","0.00","400000.00","82000.00","0","");
INSERT INTO product_detail VALUES("514","514","1","1","1","None","None","0.00","1350.00","690.00","0","");
INSERT INTO product_detail VALUES("515","515","1","15","1","None","None","0.00","5200.00","770.00","0","");
INSERT INTO product_detail VALUES("516","516","1","1","1","None","None","0.00","1270.00","685.00","0","");
INSERT INTO product_detail VALUES("517","517","1","1","1","None","None","5690.00","800.00","1070.00","0","");
INSERT INTO product_detail VALUES("518","518","1","18","1","None","None","87.50","920.00","750.00","0","");
INSERT INTO product_detail VALUES("519","519","1","4","1","None","None","0.00","950.00","580.00","0","");
INSERT INTO product_detail VALUES("520","520","1","4","1","None","None","734.00","950.00","1070.00","0","");
INSERT INTO product_detail VALUES("521","521","1","9","1","None","None","0.00","1220.00","690.00","0","");
INSERT INTO product_detail VALUES("522","522","1","5","1","None","None","0.00","700.00","604.65","0","");
INSERT INTO product_detail VALUES("523","523","1","5","1","None","None","9.00","6400.00","690.00","0","");
INSERT INTO product_detail VALUES("524","524","1","5","1","None","None","0.00","5400.00","690.00","0","");
INSERT INTO product_detail VALUES("525","525","1","5","1","None","None","0.00","4500.00","690.00","0","");
INSERT INTO product_detail VALUES("526","526","1","6","1","None","None","0.00","750.00","700.00","0","");
INSERT INTO product_detail VALUES("527","527","1","6","1","None","None","0.00","750.00","690.00","0","");
INSERT INTO product_detail VALUES("528","528","1","10","1","None","None","0.00","1500.00","1209.00","0","");
INSERT INTO product_detail VALUES("529","529","1","1","1","None","None","0.00","740.00","685.00","0","");
INSERT INTO product_detail VALUES("530","530","1","4","1","None","None","0.00","950.00","580.00","0","");
INSERT INTO product_detail VALUES("531","531","1","2","1","None","None","345.70","1150.00","690.00","0","");
INSERT INTO product_detail VALUES("532","532","1","4","1","None","None","6043.40","800.00","1070.00","0","");
INSERT INTO product_detail VALUES("533","533","1","9","1","None","None","0.00","1220.00","690.00","0","");
INSERT INTO product_detail VALUES("534","534","1","14","1","None","None","0.00","890.00","565.00","0","");
INSERT INTO product_detail VALUES("535","535","1","1","1","None","None","0.00","595.00","565.00","0","");
INSERT INTO product_detail VALUES("536","536","1","1","1","None","None","0.00","1340.00","700.00","0","");
INSERT INTO product_detail VALUES("537","537","1","1","1","None","None","0.00","660.00","585.00","0","");
INSERT INTO product_detail VALUES("538","538","1","4","1","None","None","0.00","700.00","580.00","0","");
INSERT INTO product_detail VALUES("539","539","1","2","1","None","None","0.00","800.00","690.00","0","");
INSERT INTO product_detail VALUES("540","540","1","1","1","None","None","0.00","870.00","580.00","0","");
INSERT INTO product_detail VALUES("541","541","1","14","1","None","None","0.00","800.00","745.00","0","");
INSERT INTO product_detail VALUES("542","542","1","4","1","None","None","0.00","950.00","580.00","0","");
INSERT INTO product_detail VALUES("543","543","1","9","1","None","None","2.00","5000.00","6200.00","0","");
INSERT INTO product_detail VALUES("544","544","1","1","1","None","None","273.00","950.00","800.00","0","");
INSERT INTO product_detail VALUES("545","545","1","6","1","None","None","0.00","780.00","700.00","0","");
INSERT INTO product_detail VALUES("546","546","1","6","1","None","None","0.00","750.00","750.00","0","");
INSERT INTO product_detail VALUES("547","547","1","5","1","None","None","0.00","1021.25","750.00","0","");
INSERT INTO product_detail VALUES("548","548","1","9","1","None","None","0.00","967.50","800.00","0","");
INSERT INTO product_detail VALUES("549","549","1","1","1","None","None","0.00","1000.00","745.00","0","");
INSERT INTO product_detail VALUES("550","550","1","1","1","None","None","55.40","950.00","850.00","0","");
INSERT INTO product_detail VALUES("551","551","1","1","1","None","None","0.00","1170.00","850.00","0","");
INSERT INTO product_detail VALUES("552","552","1","1","2","None","None","0.00","900.00","660.00","0","");
INSERT INTO product_detail VALUES("553","553","1","1","1","None","None","0.00","870.00","950.00","0","");
INSERT INTO product_detail VALUES("554","554","1","1","1","None","None","0.00","950.00","1250.00","0","");
INSERT INTO product_detail VALUES("555","555","1","1","1","None","None","0.00","980.00","1250.00","0","");
INSERT INTO product_detail VALUES("556","556","1","1","1","None","None","0.00","920.00","1250.00","0","");
INSERT INTO product_detail VALUES("557","557","1","1","1","None","None","0.00","1050.00","1000.00","0","");
INSERT INTO product_detail VALUES("558","558","1","2","1","None","None","0.00","1100.00","800.00","0","");
INSERT INTO product_detail VALUES("559","559","1","23","1","None","None","0.00","800.00","300.00","0","");
INSERT INTO product_detail VALUES("560","560","1","23","1","None","None","0.00","700.00","950.00","0","");
INSERT INTO product_detail VALUES("561","561","1","23","1","None","None","0.00","300.00","300.00","0","");
INSERT INTO product_detail VALUES("562","562","1","1","1","None","None","0.00","970.00","1000.00","0","");
INSERT INTO product_detail VALUES("563","563","1","1","1","None","None","0.00","1500.00","1000.00","0","");
INSERT INTO product_detail VALUES("564","564","1","1","1","None","None","0.00","1130.00","1200.00","0","");
INSERT INTO product_detail VALUES("565","565","1","1","1","None","None","0.00","1070.00","1000.00","0","");
INSERT INTO product_detail VALUES("566","566","1","23","1","None","None","0.00","400.00","100.00","0","");
INSERT INTO product_detail VALUES("567","567","1","5","1","None","None","0.00","1070.00","1070.00","0","");
INSERT INTO product_detail VALUES("568","568","1","9","1","None","None","0.00","1311.50","1200.00","0","");
INSERT INTO product_detail VALUES("569","569","1","8","1","None","None","1000.00","5.40","1450.00","0","");
INSERT INTO product_detail VALUES("570","570","1","1","1","None","None","0.00","900.00","990.00","0","");
INSERT INTO product_detail VALUES("571","571","1","5","1","None","None","0.00","750.00","700.00","0","");
INSERT INTO product_detail VALUES("572","572","1","1","1","None","None","0.00","850.00","800.00","0","");
INSERT INTO product_detail VALUES("573","573","1","5","1","None","None","0.00","6500.00","800.00","0","");
INSERT INTO product_detail VALUES("574","574","1","2","1","None","None","29.70","700.00","750.00","0","");
INSERT INTO product_detail VALUES("575","575","1","5","1","None","None","0.00","1075.00","1000.00","0","");
INSERT INTO product_detail VALUES("576","576","1","5","1","None","None","0.00","1100.00","1000.00","0","");
INSERT INTO product_detail VALUES("577","577","1","8","1","None","None","48.30","2100.00","1500.00","0","");
INSERT INTO product_detail VALUES("578","578","1","8","1","None","None","42.10","2100.00","1500.00","0","");
INSERT INTO product_detail VALUES("579","579","1","1","1","None","None","0.00","930.00","1000.00","0","");
INSERT INTO product_detail VALUES("580","580","1","10","1","None","None","50.00","2000.00","1720.00","0","");
INSERT INTO product_detail VALUES("581","581","1","14","1","None","None","0.00","920.00","1200.00","0","");
INSERT INTO product_detail VALUES("582","582","1","14","1","None","None","0.00","920.00","1200.00","0","");
INSERT INTO product_detail VALUES("583","583","1","14","1","None","None","0.00","1200.00","1000.00","0","");
INSERT INTO product_detail VALUES("584","584","1","14","1","None","None","0.00","900.00","850.00","0","");
INSERT INTO product_detail VALUES("585","585","1","14","1","None","None","0.00","1300.00","1200.00","0","");
INSERT INTO product_detail VALUES("586","586","1","9","1","None","None","0.00","900.00","850.00","0","");
INSERT INTO product_detail VALUES("587","587","1","2","1","None","None","0.00","800.00","850.00","0","");
INSERT INTO product_detail VALUES("588","588","1","2","1","None","None","0.00","800.00","850.00","0","");
INSERT INTO product_detail VALUES("589","589","1","23","1","None","None","0.00","1300.00","1200.00","0","");
INSERT INTO product_detail VALUES("590","590","1","3","1","None","None","0.00","1500.00","1200.00","0","");
INSERT INTO product_detail VALUES("591","591","1","1","1","None","None","0.00","1430.00","1300.00","0","");
INSERT INTO product_detail VALUES("592","592","1","10","1","None","None","0.00","1650.00","1700.00","0","");
INSERT INTO product_detail VALUES("593","593","1","5","1","None","None","0.00","900.00","1100.00","0","");
INSERT INTO product_detail VALUES("594","594","1","5","1","None","None","0.00","1200.00","1100.00","0","");
INSERT INTO product_detail VALUES("595","595","1","2","1","None","None","0.00","1100.00","1000.00","0","");
INSERT INTO product_detail VALUES("596","596","1","6","1","None","None","0.00","850.00","750.00","0","");
INSERT INTO product_detail VALUES("597","597","1","4","1","None","None","86.60","740.00","900.00","0","");
INSERT INTO product_detail VALUES("598","598","1","1","1","None","None","0.00","870.00","870.00","0","");
INSERT INTO product_detail VALUES("599","599","1","2","1","None","None","0.00","950.00","900.00","0","");
INSERT INTO product_detail VALUES("600","600","1","2","1","None","None","0.00","960.00","920.00","0","");
INSERT INTO product_detail VALUES("601","601","1","2","1","None","None","88.30","1150.00","950.00","0","");
INSERT INTO product_detail VALUES("602","602","1","3","1","None","None","0.00","1150.00","950.00","0","");
INSERT INTO product_detail VALUES("603","603","1","8","1","None","None","0.00","1397.50","1300.00","0","");
INSERT INTO product_detail VALUES("604","604","1","1","1","None","None","0.00","900.00","850.00","0","");
INSERT INTO product_detail VALUES("605","605","1","2","1","None","None","0.00","900.00","920.00","0","");
INSERT INTO product_detail VALUES("606","606","1","5","1","None","None","0.00","950.00","920.00","0","");
INSERT INTO product_detail VALUES("607","607","1","5","1","None","None","579.00","980.00","950.00","0","");
INSERT INTO product_detail VALUES("608","608","1","1","1","None","None","0.00","770.00","820.00","0","");
INSERT INTO product_detail VALUES("609","609","1","1","1","None","None","0.00","1130.00","900.00","0","");
INSERT INTO product_detail VALUES("610","610","1","1","1","None","None","0.00","1100.00","850.00","0","");
INSERT INTO product_detail VALUES("611","611","1","2","1","None","None","0.00","980.00","950.00","0","");
INSERT INTO product_detail VALUES("612","612","1","2","1","None","None","0.00","980.00","950.00","0","");
INSERT INTO product_detail VALUES("613","613","1","2","1","None","None","0.00","1101.88","800.00","0","");
INSERT INTO product_detail VALUES("614","614","1","14","1","None","None","0.00","1000.00","900.00","0","");
INSERT INTO product_detail VALUES("615","615","1","5","1","None","None","0.00","1850.00","1700.00","0","");
INSERT INTO product_detail VALUES("616","616","1","8","1","None","None","0.00","2150.00","2000.00","0","");
INSERT INTO product_detail VALUES("617","617","1","9","1","None","None","0.00","1100.00","950.00","0","");
INSERT INTO product_detail VALUES("618","618","1","1","1","None","None","0.00","870.00","800.00","0","");
INSERT INTO product_detail VALUES("619","619","1","1","1","None","None","0.00","890.00","950.00","0","");
INSERT INTO product_detail VALUES("620","620","1","1","1","None","None","0.00","890.00","950.00","0","");
INSERT INTO product_detail VALUES("621","621","1","5","1","None","None","0.00","0.00","750.00","0","");
INSERT INTO product_detail VALUES("622","622","1","5","1","None","None","0.00","5500.00","750.00","0","");
INSERT INTO product_detail VALUES("623","623","1","2","1","None","None","1232.80","1000.00","950.00","0","");
INSERT INTO product_detail VALUES("624","624","1","2","1","None","None","0.00","970.00","950.00","0","");
INSERT INTO product_detail VALUES("625","625","1","2","1","None","None","0.00","950.00","780.00","0","");
INSERT INTO product_detail VALUES("626","626","1","2","1","None","None","0.00","950.00","950.00","0","");
INSERT INTO product_detail VALUES("627","627","1","9","1","None","None","0.00","1100.00","850.00","0","");
INSERT INTO product_detail VALUES("628","628","1","9","1","None","None","0.00","1100.00","850.00","0","");
INSERT INTO product_detail VALUES("629","629","1","9","1","None","None","0.00","1100.00","850.00","0","");
INSERT INTO product_detail VALUES("630","630","1","5","1","None","None","0.00","7200.00","6500.00","0","");
INSERT INTO product_detail VALUES("631","631","1","5","1","None","None","0.00","1200.00","6500.00","0","");
INSERT INTO product_detail VALUES("632","632","1","9","1","None","None","0.00","800.00","750.00","0","");
INSERT INTO product_detail VALUES("633","633","1","6","1","None","None","0.00","750.00","700.00","0","");
INSERT INTO product_detail VALUES("634","634","1","6","1","None","None","0.00","750.00","700.00","0","");
INSERT INTO product_detail VALUES("635","635","1","5","1","None","None","0.00","1200.00","1000.00","0","");
INSERT INTO product_detail VALUES("636","636","1","5","1","None","None","0.00","1200.00","1000.00","0","");
INSERT INTO product_detail VALUES("637","637","1","4","1","None","None","0.00","700.00","750.00","0","");
INSERT INTO product_detail VALUES("638","638","1","9","1","None","None","0.00","930.00","800.00","0","");
INSERT INTO product_detail VALUES("639","639","1","2","1","None","None","0.00","1075.00","750.00","0","");
INSERT INTO product_detail VALUES("640","640","1","2","1","None","None","0.00","1075.00","750.00","0","");
INSERT INTO product_detail VALUES("641","641","1","2","1","None","None","0.00","1250.00","900.00","0","");
INSERT INTO product_detail VALUES("642","642","1","8","1","None","None","0.00","1775.00","1750.00","0","");
INSERT INTO product_detail VALUES("643","643","1","9","1","None","None","0.00","930.00","900.00","0","");
INSERT INTO product_detail VALUES("644","644","1","1","1","None","None","0.00","1000.00","900.00","0","");
INSERT INTO product_detail VALUES("645","645","1","10","1","None","None","25.00","1600.00","1650.00","0","");
INSERT INTO product_detail VALUES("646","646","1","10","1","None","None","75.00","1600.00","1650.00","0","");
INSERT INTO product_detail VALUES("647","647","1","4","1","None","None","0.00","950.00","900.00","0","");
INSERT INTO product_detail VALUES("648","648","1","4","1","None","None","465.60","950.00","900.00","0","");
INSERT INTO product_detail VALUES("649","649","1","10","1","None","None","0.00","2000.00","1700.00","0","");
INSERT INTO product_detail VALUES("650","650","1","10","1","None","None","25.00","2000.00","1700.00","0","");
INSERT INTO product_detail VALUES("651","651","1","1","1","None","None","0.00","1330.00","900.00","0","");
INSERT INTO product_detail VALUES("652","652","1","14","1","None","None","301.40","900.00","900.00","0","");
INSERT INTO product_detail VALUES("653","653","1","14","1","None","None","866.00","900.00","900.00","0","");
INSERT INTO product_detail VALUES("654","654","1","6","1","None","None","-612.00","850.00","850.00","0","");
INSERT INTO product_detail VALUES("655","655","1","1","1","None","None","0.00","1290.00","900.00","0","");
INSERT INTO product_detail VALUES("656","656","1","12","1","None","None","0.00","2000.00","1750.00","0","");
INSERT INTO product_detail VALUES("657","657","1","14","1","None","None","0.00","1100.00","1000.00","0","");
INSERT INTO product_detail VALUES("658","658","1","14","1","None","None","0.00","1100.00","1000.00","0","");
INSERT INTO product_detail VALUES("659","659","1","14","1","None","None","0.00","1100.00","1000.00","0","");
INSERT INTO product_detail VALUES("660","660","1","14","2","None","None","0.00","1280.00","1100.00","0","");
INSERT INTO product_detail VALUES("661","661","1","2","1","None","None","0.00","1100.00","1000.00","0","");
INSERT INTO product_detail VALUES("662","662","1","14","1","None","None","0.00","2.70","10000.00","0","");
INSERT INTO product_detail VALUES("663","663","1","2","1","None","None","0.00","1101.88","1000.00","0","");
INSERT INTO product_detail VALUES("664","664","1","2","1","None","None","350.80","1050.00","950.00","0","");
INSERT INTO product_detail VALUES("665","665","1","2","1","None","None","0.00","950.00","900.00","0","");
INSERT INTO product_detail VALUES("666","666","1","19","1","None","None","0.00","55000.00","52000.00","0","");
INSERT INTO product_detail VALUES("667","667","1","5","1","None","None","0.00","1000.00","950.00","0","");
INSERT INTO product_detail VALUES("668","668","1","4","1","None","None","0.00","1200.00","1200.00","0","");
INSERT INTO product_detail VALUES("669","669","1","5","1","None","None","125.10","10000.00","7500.00","0","");
INSERT INTO product_detail VALUES("670","670","1","1","1","None","None","0.00","1200.00","1000.00","0","");
INSERT INTO product_detail VALUES("671","671","1","9","1","None","None","0.00","1000.00","1000.00","0","");
INSERT INTO product_detail VALUES("672","672","1","9","1","None","None","0.00","1280.00","1200.00","0","");
INSERT INTO product_detail VALUES("673","673","1","9","1","None","None","0.00","1280.00","1200.00","0","");
INSERT INTO product_detail VALUES("674","674","1","9","1","None","None","0.00","1280.00","1200.00","0","");
INSERT INTO product_detail VALUES("675","675","1","3","1","None","None","0.00","1200.00","1000.00","0","");
INSERT INTO product_detail VALUES("676","676","1","3","1","None","None","0.00","1200.00","1000.00","0","");
INSERT INTO product_detail VALUES("677","677","1","14","1","None","None","0.00","1220.00","1200.00","0","");
INSERT INTO product_detail VALUES("678","678","1","1","1","None","None","37.10","1270.00","1200.00","0","");
INSERT INTO product_detail VALUES("679","679","1","8","1","None","None","24.40","950.00","1000.00","0","");
INSERT INTO product_detail VALUES("680","680","1","6","1","None","None","2940.00","1200.00","1100.00","0","");
INSERT INTO product_detail VALUES("681","681","1","16","1","None","None","0.00","1400.00","1200.00","0","");
INSERT INTO product_detail VALUES("682","682","1","6","1","None","None","0.00","1200.00","1200.00","0","");
INSERT INTO product_detail VALUES("683","683","1","6","1","None","None","0.00","1200.00","1200.00","0","");
INSERT INTO product_detail VALUES("684","684","1","1","1","None","None","282.40","1200.00","1200.00","0","");
INSERT INTO product_detail VALUES("685","685","1","1","1","None","None","4523.20","1200.00","1200.00","0","");
INSERT INTO product_detail VALUES("686","686","1","1","1","None","None","615.40","1200.00","1200.00","0","");
INSERT INTO product_detail VALUES("687","687","1","1","1","None","None","0.00","1380.00","1300.00","0","");
INSERT INTO product_detail VALUES("688","688","1","1","1","None","None","0.00","1380.00","1300.00","0","");
INSERT INTO product_detail VALUES("689","689","1","1","1","None","None","277.10","1380.00","1380.00","0","");
INSERT INTO product_detail VALUES("690","690","1","9","1","None","None","0.00","1400.00","1300.00","0","");
INSERT INTO product_detail VALUES("691","691","1","7","1","None","None","0.00","1280.00","1200.00","0","");
INSERT INTO product_detail VALUES("692","692","1","10","1","None","None","25.00","2000.00","1800.00","0","");
INSERT INTO product_detail VALUES("693","693","1","10","1","None","None","25.00","2000.00","1800.00","0","");
INSERT INTO product_detail VALUES("694","694","1","10","1","None","None","0.00","2000.00","1800.00","0","");
INSERT INTO product_detail VALUES("695","695","1","10","1","None","None","25.00","2000.00","1800.00","0","");
INSERT INTO product_detail VALUES("696","696","1","10","1","None","None","0.00","2000.00","1800.00","0","");
INSERT INTO product_detail VALUES("697","697","1","1","1","None","None","300.00","1300.00","1250.00","0","");
INSERT INTO product_detail VALUES("698","698","1","24","1","None","None","-0.72","1800.00","1500.00","0","");
INSERT INTO product_detail VALUES("699","699","1","25","1","None","None","0.00","2500.00","2300.00","0","");
INSERT INTO product_detail VALUES("700","700","1","26","1","None","None","20.00","1232.78","1234.76","0","");
INSERT INTO product_detail VALUES("701","701","1","26","1","None","None","20.00","1232.00","1234.00","0","");
INSERT INTO product_detail VALUES("702","702","1","26","1","None","None","20.00","2580.00","2580.00","0","");
INSERT INTO product_detail VALUES("703","703","1","24","1","None","None","2077.99","3278.75","2580.00","0","");
INSERT INTO product_detail VALUES("704","704","1","24","1","None","None","332.97","3278.75","2580.00","0","");
INSERT INTO product_detail VALUES("705","705","1","24","1","None","None","20.00","3063.75","2580.00","0","");
INSERT INTO product_detail VALUES("706","706","1","24","1","None","None","20.00","3.00","2.00","0","");
INSERT INTO product_detail VALUES("707","707","1","26","1","None","None","20.00","2850.00","2400.00","0","");
INSERT INTO product_detail VALUES("708","708","1","26","1","None","None","20.00","2.00","2400.00","0","");
INSERT INTO product_detail VALUES("709","709","1","26","1","None","None","20.00","2.00","2.00","0","");
INSERT INTO product_detail VALUES("710","710","1","24","1","None","None","500.00","3063.00","2400.00","0","");
INSERT INTO product_detail VALUES("711","711","1","24","1","None","None","20.00","3.00","2.00","0","");
INSERT INTO product_detail VALUES("712","712","1","26","1","None","None","585.85","2633.75","2580.00","0","");
INSERT INTO product_detail VALUES("713","713","1","24","1","None","None","1178.26","3268.00","2902.50","0","");
INSERT INTO product_detail VALUES("714","714","1","24","1","None","None","20.00","3063.75","2902.50","0","");
INSERT INTO product_detail VALUES("715","715","1","24","1","None","None","2166.50","3063.75","2902.50","0","");
INSERT INTO product_detail VALUES("716","716","1","26","1","None","None","20.00","2350.00","2.00","0","");
INSERT INTO product_detail VALUES("717","717","1","26","1","None","None","617.70","2500.00","2350.00","0","");
INSERT INTO product_detail VALUES("718","718","1","27","1","None","None","515.94","1450.00","1300.00","0","");
INSERT INTO product_detail VALUES("719","719","1","24","1","None","None","1000.00","3063.00","2850.00","0","");
INSERT INTO product_detail VALUES("720","720","1","24","1","None","None","1000.00","2850.00","3063.00","0","");
INSERT INTO product_detail VALUES("721","721","1","24","1","None","None","1000.00","2850.00","3063.00","0","");
INSERT INTO product_detail VALUES("722","722","1","26","1","None","None","1000.00","2800.00","3010.00","0","");
INSERT INTO product_detail VALUES("723","723","1","26","1","None","None","1000.00","2800.00","2800.00","0","");
INSERT INTO product_detail VALUES("724","724","1","26","1","None","None","566.23","3225.00","2800.00","0","");
INSERT INTO product_detail VALUES("725","725","1","26","1","None","None","402.30","2633.75","2300.00","0","");
INSERT INTO product_detail VALUES("726","726","1","26","1","None","None","1000.00","2850.00","2800.00","0","");
INSERT INTO product_detail VALUES("727","727","1","24","1","None","None","973.75","3150.00","3000.00","0","");
INSERT INTO product_detail VALUES("728","728","1","24","1","None","None","1000.00","3000.00","3000.00","0","");
INSERT INTO product_detail VALUES("729","729","1","17","1","None","None","2.00","350000.00","200000.00","0","");
INSERT INTO product_detail VALUES("730","730","1","17","1","None","None","4.00","350000.00","200000.00","0","");
INSERT INTO product_detail VALUES("731","731","1","25","2","None","None","3000.00","2500.00","2450.00","0","");
INSERT INTO product_detail VALUES("732","732","1","5","4","None","None","93.00","8000.00","7000.00","0","");



CREATE TABLE `production_tb` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `documnents_id` int(15) NOT NULL,
  `product_input_name` int(11) NOT NULL,
  `product_input` decimal(10,2) NOT NULL,
  `ipa` decimal(10,2) NOT NULL DEFAULT '0.00',
  `toluene` decimal(10,2) NOT NULL DEFAULT '0.00',
  `butanol` decimal(10,2) NOT NULL DEFAULT '0.00',
  `product_output_name` int(11) NOT NULL,
  `product_output` decimal(10,2) NOT NULL DEFAULT '0.00',
  `core_input` decimal(10,2) NOT NULL DEFAULT '0.00',
  `core_output` decimal(10,2) NOT NULL DEFAULT '0.00',
  `reflex` decimal(10,2) NOT NULL DEFAULT '0.00',
  `royal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sky` decimal(10,2) NOT NULL DEFAULT '0.00',
  `wastage` decimal(10,2) NOT NULL DEFAULT '0.00',
  `damage` decimal(10,0) NOT NULL DEFAULT '0',
  `operator` varchar(20) NOT NULL,
  `duty` varchar(20) NOT NULL,
  `machine` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `total_input` decimal(10,2) NOT NULL DEFAULT '0.00',
  `production_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `selling_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `setting_name` varchar(250) NOT NULL,
  `setting_logo` varchar(250) NOT NULL,
  `setting_address` varchar(250) NOT NULL,
  `setting_city` varchar(250) NOT NULL,
  `setting_country` varchar(250) NOT NULL,
  `setting_phone` varchar(250) NOT NULL,
  `setting_fax` varchar(250) NOT NULL,
  `setting_web` varchar(250) NOT NULL,
  `setting_currency` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO setting VALUES("1","EMOKLEEN GLOBAL RESOURCES Ventures","884225logoimage.jpg","Plot 10, Ilo-Awela Road, Beside Eni Plaza,"," Ota, Ogun State.","Nigeria","08033509335, 09058689100","","http://sofbefcyglobal.com/","");



CREATE TABLE `stock_tb` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `particular` varchar(60) NOT NULL,
  `p_id` int(11) NOT NULL,
  `s_in` decimal(10,2) NOT NULL,
  `s_out` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  `order_no` int(11) NOT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

INSERT INTO stock_tb VALUES("1","2021-02-27","Mayor Biscuit Company Limited","698","0.00","151.20","820.59","2","2021-03-04 15:11:59","2","1");
INSERT INTO stock_tb VALUES("2","2021-02-27","Mayor Biscuit Company Limited","698","0.00","406.71","413.88","2","2021-03-04 15:11:59","2","1");
INSERT INTO stock_tb VALUES("3","2021-02-27","Mayor Biscuit Company Limited","698","0.00","414.60","-0.72","2","2021-03-04 15:11:59","2","1");
INSERT INTO stock_tb VALUES("4","2021-04-17","Slitting","49","3000.00","0.00","1190.00","1","2021-04-17 09:53:46","0","1");
INSERT INTO stock_tb VALUES("5","2021-04-17","Shakti Nig. Ltd.","6","1005.00","0.00","1005.00","4","2021-04-17 13:16:29","4","1");
INSERT INTO stock_tb VALUES("6","2021-04-17","Shakti Nig. Ltd.","21","500.00","0.00","500.00","4","2021-04-17 13:16:29","4","1");
INSERT INTO stock_tb VALUES("7","2021-04-17","Mayor Biscuit Company Limited","49","0.00","34.00","1156.00","6","2021-04-17 16:49:19","6","1");
INSERT INTO stock_tb VALUES("8","2021-04-17","Mayor Biscuit Company Limited","49","0.00","45.00","1111.00","6","2021-04-17 16:49:19","6","1");
INSERT INTO stock_tb VALUES("9","2021-04-18","AFRICAN CONSUMER (Dabur)","49","0.00","100.00","1011.00","8","2021-04-18 10:59:24","8","1");
INSERT INTO stock_tb VALUES("10","2021-04-16","Shakti Nig. Ltd.","699","500.00","0.00","500.00","11","2021-04-18 16:17:02","11","1");
INSERT INTO stock_tb VALUES("11","2021-04-18","OSELEN FOODS","699","0.00","300.00","200.00","12","2021-04-18 16:28:39","12","1");
INSERT INTO stock_tb VALUES("12","2021-04-17","Slitting","699","20.00","0.00","220.00","2","2021-04-18 17:05:40","0","1");
INSERT INTO stock_tb VALUES("13","2021-04-19","OSELEN FOODS","699","0.00","220.00","0.00","17","2021-04-18 17:09:52","17","1");
INSERT INTO stock_tb VALUES("14","2021-08-18","Salient Industries Limited","703","0.00","534.70","-514.70","27","2021-08-18 08:49:13","27","1");
INSERT INTO stock_tb VALUES("15","2021-08-18","Salient Industries Limited","715","0.00","146.50","-126.50","27","2021-08-18 08:49:13","27","1");
INSERT INTO stock_tb VALUES("16","2021-08-18","Mayor Biscuit Company Limited","0","0.00","534.70","0.00","28","2021-08-18 10:14:08","28","1");
INSERT INTO stock_tb VALUES("17","2021-08-17","Slitting","703","534.70","0.00","20.00","3","2021-08-18 11:17:56","0","1");
INSERT INTO stock_tb VALUES("18","2021-08-17","Slitting","715","146.50","0.00","20.00","3","2021-08-18 11:17:56","0","1");
INSERT INTO stock_tb VALUES("19","2021-08-17","Slitting","703","534.70","0.00","554.70","4","2021-08-18 11:32:50","0","1");
INSERT INTO stock_tb VALUES("20","2021-08-17","Slitting","715","146.50","0.00","166.50","4","2021-08-18 11:32:50","0","1");
INSERT INTO stock_tb VALUES("23","2021-08-17","Slitting","703","534.70","0.00","554.70","5","2021-08-18 11:49:17","0","1");
INSERT INTO stock_tb VALUES("24","2021-08-17","Slitting","715","146.50","0.00","166.50","5","2021-08-18 11:49:17","0","1");
INSERT INTO stock_tb VALUES("25","2021-08-17","Mayor Biscuit Company Limited","703","0.00","534.70","20.00","30","2021-08-18 11:57:58","30","1");
INSERT INTO stock_tb VALUES("26","2021-08-17","Mayor Biscuit Company Limited","715","0.00","146.50","20.00","30","2021-08-18 11:57:58","30","1");
INSERT INTO stock_tb VALUES("27","2021-08-24","Printing","704","307.70","0.00","327.70","6","2021-08-24 13:52:09","0","1");
INSERT INTO stock_tb VALUES("28","2021-08-24","Mayor Biscuit Company Limited","704","0.00","307.70","20.00","33","2021-08-24 13:53:55","33","1");
INSERT INTO stock_tb VALUES("29","2021-08-24","Slitting","704","1000.00","0.00","1020.00","7","2021-08-24 13:58:12","0","1");
INSERT INTO stock_tb VALUES("30","2021-08-24","Mayor Biscuit Company Limited","704","0.00","661.80","358.20","34","2021-08-24 14:00:12","34","1");
INSERT INTO stock_tb VALUES("31","2021-08-25","BELLA","718","0.00","484.06","515.94","35","2021-08-26 11:38:50","35","1");
INSERT INTO stock_tb VALUES("32","2021-08-30","Slitting","712","565.85","0.00","585.85","8","2021-08-30 11:34:07","0","1");
INSERT INTO stock_tb VALUES("33","2021-08-30","Slitting","717","597.70","0.00","617.70","9","2021-08-30 11:37:04","0","1");
INSERT INTO stock_tb VALUES("38","2021-08-30","Mayor Biscuit Company Limited","724","0.00","565.85","434.15","45","2021-08-30 13:58:34","45","1");
INSERT INTO stock_tb VALUES("39","2021-08-30","Mayor Biscuit Company Limited","725","0.00","597.70","402.30","45","2021-08-30 13:58:34","45","1");
INSERT INTO stock_tb VALUES("40","2021-09-06","Mayor Biscuit Company Limited","704","0.00","269.20","89.00","47","2021-09-06 11:38:14","47","1");
INSERT INTO stock_tb VALUES("41","2021-09-05","Slitting","704","681.60","0.00","770.60","10","2021-09-07 07:55:17","0","1");
INSERT INTO stock_tb VALUES("42","2021-09-07","Mayor Biscuit Company Limited","704","0.00","681.60","89.00","52","2021-09-07 07:58:28","52","1");
INSERT INTO stock_tb VALUES("43","2021-09-08","Store","703","0.00","1000.00","-445.30","11","2021-09-08 16:46:07","0","1");
INSERT INTO stock_tb VALUES("44","2021-09-08","Slitting","703","1500.00","0.00","1054.70","12","2021-09-08 16:48:59","0","1");
INSERT INTO stock_tb VALUES("46","2021-09-15","Slitting","704","1000.00","0.00","1089.00","13","2021-09-15 10:20:51","0","1");
INSERT INTO stock_tb VALUES("49","2021-09-13","Mayor Biscuit Company Limited","704","0.00","415.60","673.40","57","2021-09-15 10:31:57","57","1");
INSERT INTO stock_tb VALUES("50","2021-09-14","Mayor Biscuit Company Limited","704","0.00","651.40","22.00","58","2021-09-15 10:32:59","58","1");
INSERT INTO stock_tb VALUES("51","2021-09-15","Slitting","713","1000.00","0.00","1020.00","14","2021-09-15 10:35:03","0","1");
INSERT INTO stock_tb VALUES("52","2021-09-14","Mayor Biscuit Company Limited","713","0.00","494.20","525.80","59","2021-09-15 10:36:36","59","1");
INSERT INTO stock_tb VALUES("53","2021-09-08","Mayor Biscuit Company Limited","703","0.00","1015.60","39.10","60","2021-09-15 11:41:37","60","1");
INSERT INTO stock_tb VALUES("56","2021-09-15","Mayor Biscuit Company Limited","713","0.00","449.43","76.37","66","2021-09-15 16:28:16","66","1");
INSERT INTO stock_tb VALUES("57","2021-09-20","Slitting","713","1050.00","0.00","1126.37","15","2021-09-22 17:18:25","0","1");
INSERT INTO stock_tb VALUES("58","2021-09-20","Mayor Biscuit Company Limited","724","0.00","100.60","333.55","70","2021-09-22 17:25:03","70","1");
INSERT INTO stock_tb VALUES("59","2021-09-20","Mayor Biscuit Company Limited","713","0.00","285.56","840.81","71","2021-09-22 17:28:13","71","1");
INSERT INTO stock_tb VALUES("60","2021-09-21","Mayor Biscuit Company Limited","713","0.00","763.45","77.36","72","2021-09-22 17:32:57","72","1");
INSERT INTO stock_tb VALUES("61","2021-09-30","Slitting","713","1000.00","0.00","1077.36","16","2021-09-30 13:23:11","0","1");
INSERT INTO stock_tb VALUES("62","2021-09-28","Mayor Biscuit Company Limited","713","0.00","906.90","170.46","74","2021-09-30 13:25:12","74","1");
INSERT INTO stock_tb VALUES("63","2021-09-29","Mayor Biscuit Company Limited","724","0.00","312.92","20.63","75","2021-09-30 13:40:09","75","1");
INSERT INTO stock_tb VALUES("65","2021-10-01","Slitting","724","1500.00","0.00","1520.63","17","2021-10-01 11:23:59","0","1");
INSERT INTO stock_tb VALUES("66","2021-09-30","Mayor Biscuit Company Limited","724","0.00","604.30","916.33","77","2021-10-01 11:29:24","77","1");
INSERT INTO stock_tb VALUES("67","2021-09-30","Mayor Biscuit Company Limited","724","0.00","604.30","312.03","78","2021-10-01 11:34:03","78","1");
INSERT INTO stock_tb VALUES("68","2021-10-04","Slitting","724","2000.00","0.00","2312.03","18","2021-10-04 14:55:10","0","1");
INSERT INTO stock_tb VALUES("69","2021-09-30","Mayor Biscuit Company Limited","724","0.00","615.20","1696.83","79","2021-10-04 14:58:11","79","1");
INSERT INTO stock_tb VALUES("70","2021-10-07","Slitting","704","1500.00","0.00","1522.00","19","2021-10-07 15:04:00","0","1");
INSERT INTO stock_tb VALUES("71","2021-10-07","Mayor Biscuit Company Limited","704","0.00","348.58","1173.42","80","2021-10-07 15:06:03","80","1");
INSERT INTO stock_tb VALUES("72","2021-10-16","Slitting","703","2000.00","0.00","2039.10","20","2021-10-16 11:41:59","0","1");
INSERT INTO stock_tb VALUES("75","2021-10-14","Mayor Biscuit Company Limited","703","0.00","424.26","1614.84","83","2021-10-16 11:53:16","83","1");
INSERT INTO stock_tb VALUES("76","2021-10-14","Mayor Biscuit Company Limited","704","0.00","486.50","686.92","83","2021-10-16 11:53:16","83","1");
INSERT INTO stock_tb VALUES("77","2021-10-01","AA FOODS","727","0.00","510.00","490.00","84","2021-10-22 16:04:54","84","1");
INSERT INTO stock_tb VALUES("78","2021-10-27","Slitting","713","2000.00","0.00","2170.46","21","2021-10-27 13:23:50","0","1");
INSERT INTO stock_tb VALUES("79","2021-10-20","Mayor Biscuit Company Limited","713","0.00","806.50","1363.96","85","2021-10-27 13:26:34","85","1");
INSERT INTO stock_tb VALUES("80","2021-10-25","Mayor Biscuit Company Limited","703","0.00","469.40","1145.44","86","2021-10-27 13:31:11","86","1");
INSERT INTO stock_tb VALUES("82","2021-11-01","Slitting","727","1000.00","0.00","1490.00","22","2021-11-01 17:59:22","0","1");
INSERT INTO stock_tb VALUES("83","2021-11-01","AA FOODS","727","0.00","516.25","973.75","88","2021-11-01 18:01:11","88","1");
INSERT INTO stock_tb VALUES("84","2021-11-02","Mayor Biscuit Company Limited","704","0.00","441.85","245.07","89","2021-11-03 13:12:30","89","1");
INSERT INTO stock_tb VALUES("85","2021-11-02","Mayor Biscuit Company Limited","724","0.00","121.95","1574.88","89","2021-11-03 13:12:30","89","1");
INSERT INTO stock_tb VALUES("86","2021-11-08","Slitting","704","2000.00","0.00","2245.07","23","2021-11-08 14:34:52","0","1");
INSERT INTO stock_tb VALUES("87","2021-11-08","Slitting","715","2000.00","0.00","2166.50","23","2021-11-08 14:34:52","0","1");
INSERT INTO stock_tb VALUES("89","2021-11-08","Mayor Biscuit Company Limited","724","0.00","928.50","566.23","94","2021-11-09 12:43:01","94","1");
INSERT INTO stock_tb VALUES("90","2021-11-08","Mayor Biscuit Company Limited","724","0.00","80.15","566.23","95","2021-11-09 12:44:48","95","1");
INSERT INTO stock_tb VALUES("91","2021-11-23","Mayor Biscuit Company Limited","704","0.00","956.05","1289.02","97","2021-11-23 15:31:22","97","1");
INSERT INTO stock_tb VALUES("92","2021-12-03","Mayor Biscuit Company Limited","713","0.00","1165.90","198.06","100","2021-12-06 12:35:59","100","1");
INSERT INTO stock_tb VALUES("93","2021-12-23","Mayor Biscuit Company Limited","703","0.00","1067.45","77.99","105","2021-12-30 10:24:08","105","1");
INSERT INTO stock_tb VALUES("94","2021-11-18","Mayor Biscuit Company Limited","704","0.00","956.05","332.97","106","2021-12-30 12:11:06","106","1");
INSERT INTO stock_tb VALUES("95","2022-01-27","XTRA LARGE FARM","732","0.00","7.00","93.00","110","2022-01-27 10:02:46","110","1");
INSERT INTO stock_tb VALUES("96","2022-02-17","Slitting","703","2000.00","0.00","2077.99","24","2022-02-19 09:41:36","0","1");
INSERT INTO stock_tb VALUES("97","2022-02-17","Slitting","713","2000.00","0.00","2198.06","25","2022-02-19 09:43:19","0","1");
INSERT INTO stock_tb VALUES("98","2022-02-18","Mayor Biscuit Company Limited","713","0.00","1019.80","1178.26","115","2022-02-19 09:45:52","115","1");



CREATE TABLE `sub_acct_group_tb` (
  `sub_acct_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `acct_group_id` int(11) NOT NULL,
  `names` varchar(150) NOT NULL,
  `act_grp` int(11) DEFAULT NULL,
  `code` text NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1',
  `reg_date` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`sub_acct_group_id`),
  KEY `acct_group_id` (`acct_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=257 DEFAULT CHARSET=latin1;

INSERT INTO sub_acct_group_tb VALUES("1","1","Sales, Debtor, Receivable A/C","0","","1","1","-","","","");
INSERT INTO sub_acct_group_tb VALUES("2","2","Purchase A/C, Creditor, Payable","0","","1","1","-","","","");
INSERT INTO sub_acct_group_tb VALUES("4","1","Money in Transit","0","","1","1","-","","","");
INSERT INTO sub_acct_group_tb VALUES("5","1","Inventory","0","","1","1","-","","","");
INSERT INTO sub_acct_group_tb VALUES("6","1","Property A/c","0","machines purchase, generator and equiptment","1","1","-","","","");
INSERT INTO sub_acct_group_tb VALUES("7","1","Bank and Cash","0","money in bank or cash","1","1","-","","","");
INSERT INTO sub_acct_group_tb VALUES("8","1","Loan -Given2Workers","0","worker loan","1","1","-","","","");
INSERT INTO sub_acct_group_tb VALUES("9","2","Loan - Collected","0","money borrowed from banks","1","1","-","","","");
INSERT INTO sub_acct_group_tb VALUES("10","2","Payee- Workers Tax","0","Amount due for workers at the end of the month for the govt.","1","1","-","","","");
INSERT INTO sub_acct_group_tb VALUES("11","2","Sales Tax A/c","0","amount payable against sales","1","1","-","","","");
INSERT INTO sub_acct_group_tb VALUES("12","5","Operating or Indirect Expenses","0","Use this to track most of your business expenses. Each type of office, insurance, rent, utilities, and subscription fees can have a category.","1","1","-","","","");
INSERT INTO sub_acct_group_tb VALUES("13","5","Purchase -Cost of Goods Solds","0","Use this to track expenses that are directly attributable to the product or service you are selling. If there is a type of expense that cannot be attributable to sales, then you should create an Operating Expense category instead.","1","1","-","","","");
INSERT INTO sub_acct_group_tb VALUES("14","5","Monthly Bills","0","Subscription","1","1","-","","","");
INSERT INTO sub_acct_group_tb VALUES("15","5","Payroll- Salary A/c","0","salary","1","1","-","","","");
INSERT INTO sub_acct_group_tb VALUES("16","5","Machine Maintenance","0","to repair and service machine","1","1","-","","","");
INSERT INTO sub_acct_group_tb VALUES("17","5","Insurance A/c","0","insurance","1","1","-","","","");
INSERT INTO sub_acct_group_tb VALUES("18","3","Owner Equity","0","money own by the MD","1","1","-","","","");
INSERT INTO sub_acct_group_tb VALUES("19","4","Product sales","0","Payments from your customers for products and services that your business sold.","1","1","-","","","");
INSERT INTO sub_acct_group_tb VALUES("20","4","Bus Incomes","0","Income received from customers for using the company bus","1","1","-","","","");
INSERT INTO sub_acct_group_tb VALUES("21","4","Miscellaneous income","0","Other Incomes","1","1","-","","","");
INSERT INTO sub_acct_group_tb VALUES("22","2","Star Polymers","0","Suppleir From Ikorodu","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("23","7","Zenith Bank - 1015009879","0","Adalemo branch","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("24","7","UBA Bank - 1021684794","1","Gbagada branch","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("25","2","Nano Plast","2","supplier","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("26","2","Aristocrast Nig. Ltd.","2","supplier","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("27","12","Transportation (Individual)","5","money used to go near places","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("28","12","PHCN - NEPA BILL","5","MONTHLY NEPA BILL","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("29","7","Opening Balance","1","to add opening amount to customer","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("30","2","AAYRA INTERNATIONAL-SUPPLIER","2","SUPPLIER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("31","2","ABVee Industries-SUPPLIER","2","SUPPLIER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("32","2","ARISTOCRAST Nig.  Ltd. -SUPPLIER","2","SUPPLIER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("33","2","BHUMEE Inks & Resin -SUPPLIER","2","-SUPPLIER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("34","2","Chukwu Poly STar Poly -SUPPLIER","2","-SUPPLIER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("35","2","Fido-Esther Star Poly -SUPPLIER","2","-SUPPLIER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("36","2","HANA Packaging -SUPPLIER","2","-SUPPLIER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("37","2","Hexing Cellotape -SUPPLIER","2","-SUPPLIER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("38","2","JULIET VENT. Star Poly -SUPPLIER","2","-SUPPLIER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("39","2","REGATTA Industries -SUPPLIER","2","-SUPPLIER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("40","2","SRS Industries LTD -SUPPLIER","2","-SUPPLIER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("41","12","New Year Gift ","5","gift","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("42","12","Loading & Offloading Exp","5","Loading & Offloading Exp","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("43","12","OVERTIME A/c","5","OVERTIME Exp.","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("44","12","EXTRA WORK","5","EXTRA WORK","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("45","12","BUS 3 Expenses","5","BUS 3 Expenses","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("46","12","SIENNA EXP","5","SIENNA EXP","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("47","12","Food & Water Exp","5","Food & Water Exp","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("48","12","Hire Driver  A/c","5","Hire Driver  A/c","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("49","12","Transportation (Hire Vehicle)","5","Transportation (Hire Vehicle)","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("50","12","Mr. Mathew Makinde -Salary-IOU","5","Mr. Mathew Makinde -Salary-IOU","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("51","12","Diesel for Factory ","5","Diesel for Factory ","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("52","12","Stationery (office Items) -Exp","5","Stationery (office Items)","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("53","9","Microfinace Loan (BAOBAB)","2","Microfinace Loan (BAOBAB)","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("54","12","Bank Charges -Exp","5","Bank Charges -Exp","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("55","1","Extra Large Nylon","1","Extra Large Nylon","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("56","12","Generator - God Bless U Exp","5","Generator - God Bless U Exp","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("57","2","Aristocrast - Strectch film-SUPPLIER","2","Aristocrast - Strectch film-SUPPLIER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("58","1","SAN JEMMY WATER","1","sales ac","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("59","1","NERUS WATER","1","BAYESAL NERUS","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("60","12","Call Card for Mr. Yadav - Exp","5","Call Card for Mr. Yadav - Exp","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("61","12","Spectranet Subscription -Exp","5","Spectranet Subscription -Exp","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("62","12","ALLOWANCE -Exp","5","ALLOWANCE -Exp","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("63","12","Reshma - Exp","5","Reshma - Exp","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("64","12","Security Items -Exp","5","Security Items -Exp","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("65","12","AKEEM Salary-IOU a/c","5","AKEEM Salary-IOU a/c","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("66","12","Settlement -Exp","5","Settlement -Exp","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("67","12","Paul - Salary -iou a/c","5","Paul - Salary -iou a/c","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("68","12","Gold Print - Exp","5","Gold Print - Exp","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("69","12","Gbenga Salary - A/c","5","Gbenga Salary - A/c","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("70","12","Afolabi Usman -Salary-IOU a/c","5","Afolabi Usman -Salary-IOU a/c","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("71","12","TAX PAYEE -Exp","5","TAX PAYEE -Exp","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("72","12","Machine Maintenance - Exp","5","Machine Maintenance - Exp","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("73","1","PELUMI WATER","1","","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("74","2","PSB Global Limited - SUPPLIER","2","PSB Global Limited - SUPPLIER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("75","1","DEKUUL WATER ","1","DEKUUL WATER ","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("76","12","Kola House  - Exp","5","Kola House  - Exp","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("77","12","Emmanuel Salary-IOU","5","Emmanuel Salary-IOU","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("78","12","Agnes Salary - IOU","5","Agnes Salary - IOU","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("79","12","Mr. Yadav Personal -Exp","5","Mr. Yadav Personal -Exp","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("80","1","Halaja Salawu-wastage","1","Halaja Salawu-wastage","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("81","12","Generator Maintenance - Exp","5","Generator Maintenance - Exp","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("82","12","Mr. Joshua Salary IOU","5","Mr. Joshua Salary IOU","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("83","2","Baba Tijani Core - Supplier","2","Baba Tijani Core - Supplier","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("84","12","Daso Olumide Machine Loan","5","Daso Olumide Machine Loan","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("85","12","Core Supplier Others","5","Core Supplier Others","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("86","12","FACTORY SECURITY ALL-SALARY-IOU","5","FACTORY SECURITY ALL-SALARY-IOU","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("87","12","Abere-Salary-iou","5","Abere-Salary-iou","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("88","12","Johnson-salary-iou","5","Johnson-salary-iou","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("89","12","Abayomi-Micheal- Salary-iou","5","Abayomi-Micheal- Salary-iou","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("90","12","Afuape-Micheal- Salary-iou","5","Afuape-Micheal- Salary-iou","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("91","12","Victor- Salary-iou","5","Victor- Salary-iou","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("92","12","Charity - salary -iou","5","Charity - salary -iou","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("93","12","Juliet- salary -iou","5","Juliet- salary -iou","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("94","12","Damilare - salary -iou","5","Damilare - salary -iou","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("95","12","Ronaldo - salary -iou","5","Ronaldo - salary -iou","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("96","12","Wahab - salary -iou","5","Wahab - salary -iou","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("97","12","Samuel-balogun - salary -iou","5","Samuel-balogun - salary -iou","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("98","12","lateef - salary -iou","5","lateef - salary -iou","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("99","1","ESTHER BAYESAL","1","ESTHER BAYESAL","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("100","2","PROPAK - SUPPLIER","2","PROPAK - SUPPLIER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("101","2","DEEPEE GLOBAL -SUPPLIER","2","DEEPEE GLOBAL -SUPPLIER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("102","2","MODUF - STAR POLY - SUPPLIER","2","MODUF - STAR POLY - SUPPLIER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("103","12","JULIUS SALARY - IOU","5","JULIUS SALARY - IOU","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("104","1","EFAC WATER","1","EFAC WATER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("105","1","Adewale-Core-Star-poly","1","Adewale-Core-Star-poly","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("106","12","MEDICAL - EXP","5","MEDICAL - EXP","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("107","1","WASUVIC NIG. LTD","1","WASUVIC NIG. LTD","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("108","1","LEPSOS WATER","1","LEPSOS WATER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("109","20","BUS 2 Claim Insurance","4","BUS 2 Claim Insurance","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("110","1","STAR POLYMERS -SALES","1","STAR POLYMERS -SALES","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("111","12","Discount account","5","Discount account","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("112","21","Rubber Stereo money","4","Rubber Stereo money","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("113","1","SAMPLE - SALES","1","SAMPLE - SALES","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("114","1","CANYON GROUP LTD.","1","CANYON GROUP LTD.","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("115","20","BUS 3 INCOME","4","BUS 3 INCOME","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("116","12","ABRAHAM - SALARY - IOU","5","ABRAHAM - SALARY - IOU","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("117","6","advee doctor blade","1","","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("118","12","Bad Rolls Returned - 230kg X 690","5","Bad Rolls Returned - 230kg X 690","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("119","2","MB PACK -SUPPLIER","2","MB PACK -SUPPLIER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("120","12","IMMIGRATION - MR OMOJEFE","5","IMMIGRATION - MR OMOJEFE","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("121","2","FINE CHEMICAL - CYLINDER VENDOR - SUPPLIER","2","FINE CHEMICAL - CYLINDER VENDOR - SUPPLIER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("122","21","KRIST-SEVEN -INNOVATIVE","4","KRIST-SEVEN -INNOVATIVE","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("123","1","NDU Water -Bayesal","1","NDU Water -Bayesal","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("124","1","Thama Water - Bayesal","1","Thama Water - Bayesal","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("125","12","LAWMA BILL","5","LAWMA BILL","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("126","8","deboral house","1","i.o.u","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("127","12","VAT EXPNS","5","VAT EXPNS","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("128","1","OSELENE BREAD","1","OSELENE BREAD","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("129","12","SHEHU- SALARY-IOU","5","SHEHU- SALARY-IOU","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("130","12","FIRE -SERVICE- EXP","5","FIRE -SERVICE- EXP","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("131","2","ALL-TIME INDUSTRIES-BOPP - SUPPLIER","2","ALL-TIME INDUSTRIES-BOPP - SUPPLIER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("132","12","BHOJSON PLC - GEN. ENGR - EXPENS","5","BHOJSON PLC - GEN. ENGR - EXPENS","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("133","12","MONDAY - EXPENS","5","MONDAY - EXPENS","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("134","1","srs-SALES","1","srs-SALES","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("135","12","DAMILOLA-IGE- SALARY-IOU","5","DAMILOLA-IGE- SALARY-IOU","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("136","1","LANDMARK WATER","1","LANDMARK WATER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("137","1","OBIT WATER","1","OBIT WATER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("138","1","TAMAR WATER","1","TAMAR WATER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("139","1","VALENCY AGRO NIG. LTD","1","VALENCY AGRO NIG. LTD","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("140","12","MR SIMON CHACKO","5","MR SIMON CHACKO","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("141","1","DS Core Water -TONKIRI EBIAREMENE","1","DS Core Water -TONKIRI EBIAREMENE","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("142","1","ARASANYIN -SCRAB","1","ARASANYIN -SCRAB","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("143","1","DIVINE SOURCE ","1","DIVINE SOURCE","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("144","1","MAYIWA JOHNSON -BREAD JOB","1","MAYIWA JOHNSON -BREAD JOB","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("145","1","MR. EMEKA","1","MR. EMEKA","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("146","1","BRUCE WATER","1","BRUCE WATER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("147","1","DAM 1 WATER","1","DAM 1 WATER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("148","1","GORETTI INDUSTRIES","1","GORETTI INDUSTRIES","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("149","2","MAPIL POINT WEST AFRICA LTD","2","MAPIL POINT WEST AFRICA LTD","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("150","12","30 BUNDLES RETURNED","5","30 BUNDLES RETURNED","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("151","12","Twinkle Jo Access Bank","5","Twinkle Jo Access Bank","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("152","2","BLESSED KENFED ENTERPRISE - Supplier","2","BLESSED KENFED ENTERPRISE - Supplier","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("153","12","Roll returned (137.8kg) - Credit Note","5","Roll returned (137.8kg) - Credit Note","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("154","1","LEAH SMART WATER ","1","LEAH SMART WATER ","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("155","1","Reduction in price- Credit Note","1","Reduction in price- Credit Note","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("156","1","KEYE WATER - EKITI","1","KEYE WATER - EKITI","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("157","2","OLYMPIC INK ","2","OLYMPIC INK ","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("158","7","PARALLEX BANK","1","PARALLEX BANK","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("159","12","Transportation cost","5","Transportation cost","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("160","12","Donation Epx","5","Donation ","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("161","9","LOAN -Mr. Matthew","2","LOAN -Mr. Matthew","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("162","1","PREY YOUGHOUT","1","PREY YOUGHOUT","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("163","1","PRINCESS JOLLY","1","PRINCESS JOLLY","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("164","2","SHAKTI INDUSTRIES - SUPPLIER","2","SHAKTI INDUSTRIES - SUPPLIER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("165","12","Desea - retun roll 181.35","5","Desea - retun roll 181.35","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("166","12","150pcs  Core - sales","5","150pcs  Core - sales","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("167","1","Ebony Water -  Kemi","1","Ebony Water -  Kemi","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("168","1","Oseni Jimoh","1","Oseni Jimoh","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("169","2","ART PLASTIC - SUPPLIER","2","","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("170","1","GLORIOUS GLOBAL ","1","GLORIOUS GLOBAL ","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("171","12","House Rent -Victor","5","House Rent -Victor","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("172","1","Mr.  Joseph ~ Sally & Bunez","1","Mr.  Joseph ~ Sally & Bunez","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("173","1","AQUA DOMINION WATER","1","AQUA DOMINION WATER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("174","1","KEYUS POLY","1","KEYUS POLY","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("175","1","MIKE KEG BUYER","1","MIKE KEG BUYER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("176","1","Brillo Water ","1","Brillo Water ","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("177","2","PLAST POLY  - SUPPLIER","2","PLAST POLY  - SUPPLIER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("178","1","VINTEX WATER","1","VINTEX WATER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("179","1","CROWNHERIT WATER","1","CROWNHERIT WATER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("180","1","POLI WATER -Enitom Ventures","1","POLI WATER -Enitom Ventures","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("181","1","ARISTOR FILM","1","ARISTOR FILM","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("182","1","Adura Gbemi Poly","1","adura gbemi","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("183","1","Bread Ville ","1","Bread Ville","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("184","1","Ellass Bread","1","Ellass Bread","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("185","1","TOMEC WATER","1","TOMEC WATER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("186","1","SAIROSA FUNDATION","1","SAIROSA FUNDATION","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("187","1","GOD MERCY","1","GOD MERCY","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("188","1","AMCO PLASTIC","1","AMCO PLASTIC","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("189","1","SHOLA POLY","1","SHOLA POLY","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("190","1","OLAMILEKAN BREAD","1","OLAMILEKAN BREAD","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("191","1","JUBRIL WASTAGE","1","JUBRIL WASTAGE","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("192","1","ORC ","1","ORC ","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("193","1","Borema - ilorin","1","Borema - ilorin","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("194","1","FOLAKE - EKITI","1","FOLAKE - EKITI","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("195","1","MAGNOR Water","1","MAGNOR Water","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("196","1","Marvec Poly","1","Marvec Poly","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("197","1","REL Yoghourt Abeokuta","1","REL Yoghourt -Abeokuta","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("198","1","TARABA-VEGETABLE HAUWA DANASABE","1","TARABA-VEGETABLE HAUWA DANASABE","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("199","1","MY REL YOUGHURT","1","MY REL YOUGHURT","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("200","1","PLUMME FOODS","1","PLUMME FOODS","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("201","1","Susan Shrink","1","Susan Shrink","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("202","2","OMINIK SUPPLIER","2","OMINIK SUPPLIER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("203","1","Law water Fidco","1","Law fidco","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("204","1","AGAB VENTURES NIG. LTD.","1","AGAB VENTURES NIG. LTD.","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("205","1","Euro Global","1","Euro Global","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("206","1","SANCO WATER (GIFT)","1","SANCO WATER (GIFT)","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("207","1","Laajy Chops - Bread Job","1","Laajy Chops - Bread Job","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("208","1","AA Chin chin","1","AA Chin chin","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("209","1","SHOWER WATER","1","SHOWER WATER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("210","1","SHASH INDUSTRIES LTD.","1","SHASH INDUSTRIES LTD.","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("211","1","REALMINE VENTURE","1","REALMINE VENTURE","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("212","1","HADASSAH WATER","1","HADASSAH WATER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("213","1","AQUARITE WATER","1","AQUARITE WATER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("214","1","SHEVY INDUSTRIAL CONCEPT","1","SHEVY INDUSTRIAL CONCEPT","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("215","1","NARAYAN TRADING","1","NARAYAN TRADING","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("216","1","KANADA VENTURES","1","KANADA VENTURES","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("217","1","Mr. Job","1","Mr. Job","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("218","1","FUNDE & SONS","1","FUNDE & SONS","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("219","1","UWAPO RESOURCES NIG. LTD.","1","UWAPO RESOURCES NIG. LTD.","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("220","1","ABDULAHI","1","ABDULAHI","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("221","1","ROTO PRINT LTD","1","ROTO PRINT LTD","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("222","1","DAVID -WASTAGE","1","DAVID -WASTAGE","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("223","1","ESSENCE WATER","1","ESSENCE WATER","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("224","1","BIOPACK SYNERGY LTD","1","BIOPACK SYNERGY LTD","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("225","2","CHEQAN INK","2","CHEQAN INK","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("226","1","Chidi Ohagi","1","Chidi Ohagi","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("227","1","Toria Water ","1","Toria Water ","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("228","1","GYFTHONE POINT","1","GYFTHONE POINT","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("229","1","ABUAD Water","1","ABUAD Water","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("230","2","WORLDSEC POLY ","2","WORLDSEC POLY ","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("231","1","Nanon Nig .","1","Nanon Nig .","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("232","1","J. Jomac Int.l Ltd.","1","J. Jomac Int.l Ltd.","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("233","1","Eddy Chucks","1","Eddy Chucks","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("234","2","MAPLE PLASTIC","2","MAPLE PLASTIC","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("235","1","Don Water (ilorin)","1","Don Water (ilorin)","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("236","2","EXCEL PLASTIC","2","EXCEL PLASTIC","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("237","1","TASTY TIME","1","TASTY TIME","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("238","1","FESOBI","1","FESOBI","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("239","1","LAWAL POLY","1","10001","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("240","1","LAWAL Poly","1","10001","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("241","1","darason nylon","1","10001","2","1","","082132312123","darason@gmail.com","12, alaba taiwo street abule");
INSERT INTO sub_acct_group_tb VALUES("242","1","CAPITAL ACCOUNT","","CAPITAL ACCOUNT","1","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("243","1","ACT - RECEIVABLE ","1","10001","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("244","2","ACT - PAYABLE","2","10001","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("245","1","Mayor Biscuit Company Limited","1","10001","2","1","","","","Plot 9-12 Agbara Ind. Layout, Ogun State. Nigeria.");
INSERT INTO sub_acct_group_tb VALUES("246","1","AFRICAN CONSUMER (Dabur)","1","10001","2","1","","08120655397","warehouse.ng@dabur.com","Ilesamaja, Lagos");
INSERT INTO sub_acct_group_tb VALUES("247","2","Shakti Nig. Ltd.","2","10001","2","1","","08132712715","lawalthb@gmail.com","idi roko road");
INSERT INTO sub_acct_group_tb VALUES("248","1","OSELEN FOODS","1","10001","2","1","","08163741738","LAW@GMAIL.COM","ALAGBADO");
INSERT INTO sub_acct_group_tb VALUES("249","2","Salient Industries Limited","2","10001","2","1","","","","Ota");
INSERT INTO sub_acct_group_tb VALUES("250","2","SALIENT INDUSTRIES LIMITED","2","10001","2","1","","","","KM 38, LAGOS/ABEOKUTA ROAD. OTA");
INSERT INTO sub_acct_group_tb VALUES("251","1","BELLA","1","10001","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("252","1","Josephine","1","10001","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("253","1","AA FOODS","1","10001","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("254","1","Shongai Packaging","1","10001","2","1","","","","");
INSERT INTO sub_acct_group_tb VALUES("255","1","Hello Product Limited","1","10001","2","1","","08101962701, 08053371494","olowoyin.aro@helloproductsafrica.com","Jagal Close, Oregun, Ikeja, Lagos, Nigeria");
INSERT INTO sub_acct_group_tb VALUES("256","1","XTRA LARGE FARM","1","10001","2","1","","","","Ota");



CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(250) NOT NULL,
  `supplier_contact_name` varchar(250) NOT NULL,
  `supplier_email` varchar(250) NOT NULL,
  `supplier_phone` varchar(250) NOT NULL,
  `supplier_address` text NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

INSERT INTO suppliers VALUES("1","Star Polymers Ltd. (Purchase)","Mr. Sohan Accountant","starpolymersac@gmail.com","8021152464","Plot No. 129 Odonla Village, Via Odugunyan Ikorodu Industrial Estate, Ikorodu Lagos ");
INSERT INTO suppliers VALUES("2","SHAKTHI IND","mr akran","","8132712715","lawal street lagos");
INSERT INTO suppliers VALUES("3","BHOJ RAJ","Victor","lawalthb@gmail.com","8132712715","flex plast");
INSERT INTO suppliers VALUES("4","SREN  CHEMICALS","ashok","lawalthb@gmail.com","122455224","14 ademola street");
INSERT INTO suppliers VALUES("5","REGATTA INDUSTRIES","Victor","lawalthb@gmail.com","8132712715","flex plast");
INSERT INTO suppliers VALUES("6","OSKEN-KEN","Victor","lawalthb@gmail.com","8132712716","flex plast");
INSERT INTO suppliers VALUES("7","BHUMEE INKS","Victor","lawalthb@gmail.com","8132712717","flex plast");
INSERT INTO suppliers VALUES("8","RECOPLAST","Victor","lawalthb@gmail.com","8132712718","flex plast");
INSERT INTO suppliers VALUES("9","PKB_SANGO","Victor","lawalthb@gmail.com","8132712719","flex plast");
INSERT INTO suppliers VALUES("10","FEMADFRA","Victor","lawalthb@gmail.com","8132712720","flex plast");
INSERT INTO suppliers VALUES("11","ABVee Industries","Victor","lawalthb@gmail.com","8132712721","flex plast");
INSERT INTO suppliers VALUES("12","JULIET_VENT_STAR_POLY","Victor","lawalthb@gmail.com","8132712722","flex plast");
INSERT INTO suppliers VALUES("13","OLYMPIC","Victor","lawalthb@gmail.com","8132712723","flex plast");
INSERT INTO suppliers VALUES("14","MODUL POLY_STAR_POLY","Victor","lawalthb@gmail.com","8132712724","flex plast");
INSERT INTO suppliers VALUES("15","HEXING CELLOTAPE","Victor","lawalthb@gmail.com","8132712725","flex plast");
INSERT INTO suppliers VALUES("16","CHIKKU-STAR POLYMERS","Victor","lawalthb@gmail.com","8132712726","flex plast");
INSERT INTO suppliers VALUES("17","DENMARK_STAR_POLY","Victor","lawalthb@gmail.com","8132712727","flex plast");
INSERT INTO suppliers VALUES("18","AAYRA INTERNATIONAL","Victor","lawalthb@gmail.com","8132712728","flex plast");
INSERT INTO suppliers VALUES("19","Opening Balance","Victor","","","");
INSERT INTO suppliers VALUES("20","Aristocract Nig Ltd","Mr Ayo","","","");
INSERT INTO suppliers VALUES("21","KEMOD VENTURES LTD","ADE","","08132712715","");
INSERT INTO suppliers VALUES("22","AFRICAN NANOPLAST ","NIKKY","","08141897215","");
INSERT INTO suppliers VALUES("24","DEEPEE GLOBAL PACKAGING LTD","Mr. Wole","lawalthb@gmail.com","+2348132712715","51 adigun popoola street");
INSERT INTO suppliers VALUES("25","Suspen Supplier -Hi-merit","tjy","lawal@j.c","08123171242","ilorin");
INSERT INTO suppliers VALUES("26","GEEPEE INDUSTRIES LTD","SAJU","INFO@GEEPEEINDUSTRIES.COM","07028020221","KM 38 Abeokuta Motor Road");
INSERT INTO suppliers VALUES("27","CONTA WATER (SUPPLIER)","ESTHER","LAWALTHB@GMAIL.COM","081327127155","BAYESAL");
INSERT INTO suppliers VALUES("28","MAPLE PLASTIC","MATTEW","","","");
INSERT INTO suppliers VALUES("29","Fido-Esther-Star_Polymers","esther","","08132712715","Bayesal");
INSERT INTO suppliers VALUES("31","MB Pack / Converter Nig. Ltd.","mr Yadav","lawalthb@gmail.com","08132712715","for solayos chin chin");
INSERT INTO suppliers VALUES("32","Hana Packaging A/C","Mr. Samee","lawalthb@gmail.com","08132712715","isolo");
INSERT INTO suppliers VALUES("33","folake Supplier","folake","lawalthb@gmail.com","0813271271","osun");
INSERT INTO suppliers VALUES("34","PROPAK Industrie Ltd.","Mr. Yadav","lawalthb@gmail.com","08132712715","sango ");
INSERT INTO suppliers VALUES("35","Aristocrast - Strectch film","Makinde","lawalthb@gmail.com","055","otta");
INSERT INTO suppliers VALUES("36","Fine Chemical Ltd","mr. Ronan","lawalthb@gmail.com","08132712715","Ilorin");



CREATE TABLE `trans_line_items` (
  `order_items_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `invoice_no_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_rate` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  PRIMARY KEY (`order_items_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

INSERT INTO trans_line_items VALUES("1","1","0","49","3000","1500","0","4500000");
INSERT INTO trans_line_items VALUES("2","2","0","699","20","2500","0","50000");
INSERT INTO trans_line_items VALUES("3","3","0","703","535","2580","0","1379526");
INSERT INTO trans_line_items VALUES("4","3","0","715","147","2903","0","425216");
INSERT INTO trans_line_items VALUES("5","4","0","703","535","2580","0","1379526");
INSERT INTO trans_line_items VALUES("6","4","0","715","147","2903","0","425216");
INSERT INTO trans_line_items VALUES("7","5","0","703","535","3064","0","1638187");
INSERT INTO trans_line_items VALUES("8","5","0","715","147","3064","0","448839");
INSERT INTO trans_line_items VALUES("9","6","0","704","308","3064","0","942716");
INSERT INTO trans_line_items VALUES("10","7","0","704","1000","3064","0","3063750");
INSERT INTO trans_line_items VALUES("11","8","0","712","566","2634","0","1490307");
INSERT INTO trans_line_items VALUES("12","9","0","717","598","2526","0","1509940");
INSERT INTO trans_line_items VALUES("13","10","0","704","682","3064","0","2088252");
INSERT INTO trans_line_items VALUES("14","11","0","703","1000","3064","0","3063750");
INSERT INTO trans_line_items VALUES("15","12","0","703","1500","3064","0","4595625");
INSERT INTO trans_line_items VALUES("16","13","0","704","1000","3064","0","3063750");
INSERT INTO trans_line_items VALUES("17","14","0","713","1000","3064","0","3063750");
INSERT INTO trans_line_items VALUES("18","15","0","713","1050","3064","0","3216938");
INSERT INTO trans_line_items VALUES("19","16","0","713","1000","3064","0","3063750");
INSERT INTO trans_line_items VALUES("20","17","0","724","1500","3010","0","4515000");
INSERT INTO trans_line_items VALUES("21","18","0","724","2000","3010","0","6020000");
INSERT INTO trans_line_items VALUES("22","19","0","704","1500","3064","0","4595625");
INSERT INTO trans_line_items VALUES("23","20","0","703","2000","3064","0","6127500");
INSERT INTO trans_line_items VALUES("24","21","0","713","2000","3064","0","6127500");
INSERT INTO trans_line_items VALUES("25","22","0","727","1000","3150","0","3150000");
INSERT INTO trans_line_items VALUES("26","23","0","704","2000","3064","0","6127500");
INSERT INTO trans_line_items VALUES("27","23","0","715","2000","3064","0","6127500");
INSERT INTO trans_line_items VALUES("28","24","0","703","2000","3268","0","6536000");
INSERT INTO trans_line_items VALUES("29","25","0","713","2000","3268","0","6536000");



CREATE TABLE `trans_payment_detail` (
  `invoice_payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_no_id` int(11) NOT NULL,
  `total_discount` int(11) NOT NULL COMMENT 'vat_amt',
  `grand_total_price` int(11) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `balance` decimal(10,2) DEFAULT '0.00',
  `due_amount` int(11) NOT NULL COMMENT 'tatal-vat',
  `payment_detail_date` date NOT NULL,
  `auth_id` int(11) NOT NULL,
  `payment_detail_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`invoice_payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

INSERT INTO trans_payment_detail VALUES("1","10001","1","0","214286","4500000","0","0.00","4285714","2021-04-17","1","0");
INSERT INTO trans_payment_detail VALUES("2","10001","2","0","2381","50000","0","0.00","47619","2021-04-17","1","0");
INSERT INTO trans_payment_detail VALUES("3","10001","3","0","85940","1804742","0","0.00","1718802","2021-08-17","1","0");
INSERT INTO trans_payment_detail VALUES("4","10001","4","0","85940","1804742","0","0.00","1718802","2021-08-17","1","0");
INSERT INTO trans_payment_detail VALUES("5","10001","5","0","99382","2087027","0","0.00","1987644","2021-08-17","1","0");
INSERT INTO trans_payment_detail VALUES("6","10001","6","0","44891","942716","0","0.00","897825","2021-08-24","1","0");
INSERT INTO trans_payment_detail VALUES("7","10001","7","0","145893","3063750","0","0.00","2917857","2021-08-24","1","0");
INSERT INTO trans_payment_detail VALUES("8","10001","8","0","70967","1490307","0","0.00","1419340","2021-08-30","1","0");
INSERT INTO trans_payment_detail VALUES("9","10001","9","0","71902","1509940","0","0.00","1438038","2021-08-30","1","0");
INSERT INTO trans_payment_detail VALUES("10","10001","10","0","99441","2088252","0","0.00","1988811","2021-09-05","1","0");
INSERT INTO trans_payment_detail VALUES("11","10001","11","0","145893","3063750","0","0.00","2917857","2021-09-08","1","0");
INSERT INTO trans_payment_detail VALUES("12","10001","12","0","218839","4595625","0","0.00","4376786","2021-09-08","1","0");
INSERT INTO trans_payment_detail VALUES("13","10001","13","0","145893","3063750","0","0.00","2917857","2021-09-15","1","0");
INSERT INTO trans_payment_detail VALUES("14","10001","14","0","145893","3063750","0","0.00","2917857","2021-09-15","1","0");
INSERT INTO trans_payment_detail VALUES("15","10001","15","0","153188","3216938","0","0.00","3063750","2021-09-20","1","0");
INSERT INTO trans_payment_detail VALUES("16","10001","16","0","145893","3063750","0","0.00","2917857","2021-09-30","1","0");
INSERT INTO trans_payment_detail VALUES("17","10001","17","0","215000","4515000","0","0.00","4300000","2021-10-01","1","0");
INSERT INTO trans_payment_detail VALUES("18","10001","18","0","286667","6020000","0","0.00","5733333","2021-10-04","1","0");
INSERT INTO trans_payment_detail VALUES("19","10001","19","0","218839","4595625","0","0.00","4376786","2021-10-07","1","0");
INSERT INTO trans_payment_detail VALUES("20","10001","20","0","291786","6127500","0","0.00","5835714","2021-10-16","1","0");
INSERT INTO trans_payment_detail VALUES("21","10001","21","0","291786","6127500","0","0.00","5835714","2021-10-27","1","0");
INSERT INTO trans_payment_detail VALUES("22","10001","22","0","150000","3150000","0","0.00","3000000","2021-11-01","1","0");
INSERT INTO trans_payment_detail VALUES("23","10001","23","0","583571","12255000","0","0.00","11671429","2021-11-08","1","0");
INSERT INTO trans_payment_detail VALUES("24","10001","24","0","311238","6536000","0","0.00","6224762","2022-02-17","1","0");
INSERT INTO trans_payment_detail VALUES("25","10001","25","0","311238","6536000","0","0.00","6224762","2022-02-17","1","0");



CREATE TABLE `transfer_tb` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(40) NOT NULL,
  `auth_id` int(11) NOT NULL,
  `date_order_placed` date NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

INSERT INTO transfer_tb VALUES("1","Inter Transfer","1","2021-04-17");
INSERT INTO transfer_tb VALUES("2","Inter Transfer","1","2021-04-17");
INSERT INTO transfer_tb VALUES("3","Inter Transfer","1","2021-08-17");
INSERT INTO transfer_tb VALUES("4","Inter Transfer","1","2021-08-17");
INSERT INTO transfer_tb VALUES("5","Inter Transfer","1","2021-08-17");
INSERT INTO transfer_tb VALUES("6","Inter Transfer","1","2021-08-24");
INSERT INTO transfer_tb VALUES("7","Inter Transfer","1","2021-08-24");
INSERT INTO transfer_tb VALUES("8","Inter Transfer","1","2021-08-30");
INSERT INTO transfer_tb VALUES("9","Inter Transfer","1","2021-08-30");
INSERT INTO transfer_tb VALUES("10","Inter Transfer","1","2021-09-05");
INSERT INTO transfer_tb VALUES("11","Inter Transfer","1","2021-09-08");
INSERT INTO transfer_tb VALUES("12","Inter Transfer","1","2021-09-08");
INSERT INTO transfer_tb VALUES("13","Inter Transfer","1","2021-09-15");
INSERT INTO transfer_tb VALUES("14","Inter Transfer","1","2021-09-15");
INSERT INTO transfer_tb VALUES("15","Inter Transfer","1","2021-09-20");
INSERT INTO transfer_tb VALUES("16","Inter Transfer","1","2021-09-30");
INSERT INTO transfer_tb VALUES("17","Inter Transfer","1","2021-10-01");
INSERT INTO transfer_tb VALUES("18","Inter Transfer","1","2021-10-04");
INSERT INTO transfer_tb VALUES("19","Inter Transfer","1","2021-10-07");
INSERT INTO transfer_tb VALUES("20","Inter Transfer","1","2021-10-16");
INSERT INTO transfer_tb VALUES("21","Inter Transfer","1","2021-10-27");
INSERT INTO transfer_tb VALUES("22","Inter Transfer","1","2021-11-01");
INSERT INTO transfer_tb VALUES("23","Inter Transfer","1","2021-11-08");
INSERT INTO transfer_tb VALUES("24","Inter Transfer","1","2022-02-17");
INSERT INTO transfer_tb VALUES("25","Inter Transfer","1","2022-02-17");



CREATE TABLE `users_type` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(250) NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO users_type VALUES("1","Super Admin");
INSERT INTO users_type VALUES("2","Store Manager");
INSERT INTO users_type VALUES("3","Accountant");
INSERT INTO users_type VALUES("4","Master");



CREATE TABLE `warehouse` (
  `war_id` int(11) NOT NULL AUTO_INCREMENT,
  `war_name` varchar(250) NOT NULL,
  PRIMARY KEY (`war_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO warehouse VALUES("1","Store");
INSERT INTO warehouse VALUES("2","Slitting");
INSERT INTO warehouse VALUES("3","Printing");
INSERT INTO warehouse VALUES("4","Cutting");

