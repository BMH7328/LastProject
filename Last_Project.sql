-- Adminer 4.8.0 MySQL 5.5.5-10.5.17-MariaDB-1:10.5.17+maria~ubu2004 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `cart` (`id`, `quantity`, `user_id`, `product_id`, `added_on`, `order_id`) VALUES
(1,	1,	3,	1,	'2023-06-20 03:45:50',	4),
(2,	1,	3,	1,	'2023-06-20 03:45:50',	4),
(3,	1,	3,	1,	'2023-06-20 03:46:16',	5),
(4,	1,	3,	2,	'2023-06-20 03:46:16',	5),
(5,	1,	3,	1,	'2023-06-20 03:47:38',	6),
(6,	1,	3,	1,	'2023-06-20 03:47:51',	7),
(7,	1,	3,	1,	'2023-06-20 03:53:56',	8),
(8,	1,	3,	1,	'2023-06-20 03:53:56',	8),
(9,	1,	3,	1,	'2023-06-20 03:56:50',	9),
(10,	1,	4,	1,	'2023-06-21 02:03:48',	10),
(11,	1,	5,	1,	'2023-06-21 02:17:49',	11),
(12,	1,	5,	6,	'2023-06-21 02:17:49',	11),
(13,	1,	5,	13,	'2023-06-21 02:17:49',	11),
(14,	1,	5,	12,	'2023-06-21 02:17:49',	11),
(15,	1,	5,	11,	'2023-06-21 02:17:49',	11),
(16,	1,	5,	10,	'2023-06-21 02:17:49',	11),
(17,	1,	5,	9,	'2023-06-21 02:17:49',	11),
(18,	1,	5,	8,	'2023-06-21 02:17:49',	11),
(19,	1,	5,	7,	'2023-06-21 02:17:49',	11),
(21,	1,	5,	5,	'2023-06-21 02:17:49',	11),
(22,	1,	5,	4,	'2023-06-21 02:17:49',	11),
(23,	1,	5,	2,	'2023-06-21 02:17:49',	11);

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `comments` (`id`, `comment`, `created_at`, `user_id`, `product_id`) VALUES
(1,	'goodlaptop',	'2023-06-15 14:47:41',	1,	1),
(2,	'loved it',	'2023-06-15 14:56:55',	1,	1),
(3,	'6',	'2023-06-16 05:54:21',	3,	1),
(4,	'Hi goodmorning ',	'2023-06-19 02:24:25',	3,	2);

DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `added_on`) VALUES
(1,	'Shawn Ning Jia Le',	'shawnningjiale@gmail.com',	'hello all my neighbours',	'2023-06-15 13:45:10'),
(2,	'Shawn Ning Jia Le',	'shawnningjiale@gmail.com',	'hello all my neighbours',	'2023-06-15 13:45:19'),
(3,	's',	'rog@rog.com',	'666666666666666',	'2023-06-15 13:50:21'),
(4,	'Shawn Ning Jia Le',	'shawnningjiale@gmail.com',	'why is it not success\r\n',	'2023-06-15 13:51:24'),
(5,	'why unsuccess',	'diuniamaaaaaaaaa@com.com',	'whhhhhhyyyyyyyyyyyyyyyy',	'2023-06-19 02:34:17');

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_amount` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `orders` (`id`, `total_amount`, `user_id`, `added_on`) VALUES
(1,	0,	3,	'2023-06-20 03:33:49'),
(2,	0,	3,	'2023-06-20 03:35:21'),
(3,	37998,	3,	'2023-06-20 03:41:38'),
(4,	37998,	3,	'2023-06-20 03:45:50'),
(5,	35998,	3,	'2023-06-20 03:46:16'),
(6,	18999,	3,	'2023-06-20 03:47:38'),
(7,	18999,	3,	'2023-06-20 03:47:51'),
(8,	37998,	3,	'2023-06-20 03:53:56'),
(9,	18999,	3,	'2023-06-20 03:56:50'),
(10,	18999,	4,	'2023-06-21 02:03:48'),
(11,	143288,	5,	'2023-06-21 02:17:49');

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_url` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `processor` varchar(255) NOT NULL,
  `graphic_card` varchar(255) NOT NULL,
  `windows` varchar(100) NOT NULL,
  `screen` varchar(255) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `rom` varchar(255) NOT NULL,
  `wifi` varchar(100) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `products` (`id`, `image_url`, `name`, `price`, `processor`, `graphic_card`, `windows`, `screen`, `ram`, `rom`, `wifi`, `added_on`, `status`) VALUES
(1,	'https://dlcdnwebimgs.asus.com/gain/77387050-5133-4282-93AC-656739026015/w717/h525/w292',	'ROG STRIX SCAR 18 (2023)',	'18999',	'Intel® Core™ i9-13980HX',	'RTX4090 16GB GDDR6',	'Windows 11',	'18-inch / QHD+ 16:10 (2560 x 1600, WQXGA) / 240Hz / 3ms / IPS-level / 500nits / ROG Nebula Display',	'DDR5 64GB',	'1TB + 1TB PCIe® 4.0 NVMe™ M.2 Performace SSD',	'Wi-Fi 6E',	'2023-06-15 13:41:37',	'publish'),
(2,	'https://dlcdnwebimgs.asus.com/gain/8991224D-716A-4ECE-A5FD-5A007914F3EA/w717/h525/w180',	'ROG STRIX SCAR 17 (2023)',	'16999',	'AMD Ryzen™ 9 7945HX',	'RTX4090 16GB GDDR6',	'Windows 11',	'17.3-inch / WQHD (2560 x 1440) 16:9 / 240Hz/ 3ms / IPS-level / 300nits',	'DDR5 32GB',	'1TB PCIe® 4.0 NVMe™ M.2 Performance SSD',	'Wi-Fi 6E',	'2023-06-15 09:28:45',	'publish'),
(4,	'https://dlcdnwebimgs.asus.com/gain/E2AF96CF-BBE5-4063-BAC7-19CEA6918EDB/w717/h525/w180',	'ROG STRIX SCAR 16 (2023)',	'13999',	'Intel® Core™ i9-13980HX',	'RTX4080 12GB GDDR6',	'Windows 11',	'16-inch / QHD+ 16:10 (2560 x 1600, WQXGA) / 240Hz / 3ms / Mini LED / 1100nits / ROG Nebula HDR Display',	'DDR5 32GB',	'1TB + 1TB PCIe® 4.0 NVMe™ M.2 Performace SSD',	'Wi-Fi 6E',	'2023-06-15 09:28:49',	'publish'),
(5,	'https://dlcdnwebimgs.asus.com/gain/65489B09-459B-4A6C-9C07-5E3DF709C136/w717/h525/w230',	'ROG Zephyrus Duo 16 (2023)',	'22999',	'AMD Ryzen™ 9 7945HX',	'RTX4090 16GB GDDR6',	'Windows 11',	'16-inch / QHD+ 16:10 (2560 x 1600, WQXGA) / 240Hz / 3ms / 85 / Mini LED / 1100 / Anti-glare display',	'DDR5 64GB',	'2TB + 2TB PCIe® 4.0 NVMeM.2 Performance SSD',	'Wi-Fi 6E',	'2023-06-15 09:28:52',	'publish'),
(6,	'https://dlcdnwebimgs.asus.com/gain/C79BFCE0-8F1F-4B7E-B953-2076C9613204/w717/h525/w230',	'ROG Zephyrus M16 (2023)',	'17999',	'Intel® Core™ i9-13900H',	'RTX4090 16GB GDDR6',	'Windows 11',	'16-inch / QHD+ 16:10 (2560 x 1600, WQXGA) / 240Hz / 3ms / Mini LED / 1200nits / ROG Nebula HDR Display',	'DDR5 32GB',	'2TB PCIe® 4.0 NVMe™ M.2 Performance SSD',	'Wi-Fi 6E',	'2023-06-15 09:28:54',	'publish'),
(7,	'https://dlcdnwebimgs.asus.com/gain/FF25B991-60D7-4B14-9AEF-7E844CD9F02B/w717/h525/w180',	'ROG Zephyrus G16 (2023)',	'8999',	'Intel® Core™ i9-13900H',	'RTX™ 4060 8GB GDDR6',	'Windows 11',	'16-inch / QHD+ 16:10 (2560 x 1600, WQXGA) / 240Hz / 85 / IPS-level / 500nits / Anti-glare display',	'DDR4 32GB',	'1TB PCIe® 4.0 NVMeM.2 SSD',	'Wi-Fi 6E',	'2023-06-15 09:29:11',	'publish'),
(8,	'https://dlcdnwebimgs.asus.com/gain/4BADD405-D876-42F0-AA14-F8FB9044ADC6/w717/h525/w270',	'ROG Flow Z13-ACRNM RMT02 (2023)',	'12999',	'Intel® Core™ i9-13900H',	'RTX4070 8GB GDDR6',	'Windows 11',	'13.4-inch / QHD+ 16:10 (2560 x 1600, WQXGA) / 165Hz / 89/89/89/89 / IPS-level /500 / Glossy display',	'LPDDR5 32GB',	'1TB PCIe® 4.0 NVMeM.2 SSD',	'Wi-Fi 6E',	'2023-06-15 09:29:15',	'publish'),
(9,	'https://dlcdnwebimgs.asus.com/gain/69E30963-E143-4EF9-A017-D3EA3586165E/w717/h525/w270',	'ROG Flow X13 (2023)',	'7999',	'AMD Ryzen™ 9 7940HS',	'RTX™ 4050 6GB GDDR6',	'Windows 11',	'13.4-inch / QHD+ 16:10 (2560 x 1600, WQXGA) / 165Hz / 3ms / IPS-level / 500nits / Glossy display',	'LPDDR5 16GB',	'1TB PCIe® 4.0 NVMeM.2 SSD',	'Wi-Fi 6E',	'2023-06-15 09:37:58',	'publish'),
(10,	'https://dlcdnwebimgs.asus.com/gain/FB4F0A8C-AA7D-452F-8142-AFA6264F9383/w717/h525/w270',	'ROG Flow Z13 (2023)',	'8999',	'Intel® Core™ i9-13900H',	'RTX4050 6GB GDDR6',	'Windows 11',	'13.4-inch / QHD+ 16:10 (2560 x 1600, WQXGA) / 165Hz / 89 / IPS-level / 500 / Glossy display',	'LPDDR5 16GB',	'1TB PCIe® 4.0 NVMeM.2 SSD',	'Wi-Fi 6E',	'2023-06-15 09:38:01',	'publish'),
(11,	'https://dlcdnwebimgs.asus.com/gain/34386867-7418-41CA-A145-BE574D020AB6/w717/h525/w270',	'ROG Phone 7 Ultimate',	'4999',	'Qualcomm® Snapdragon® 8 Gen 2 Mobile Platform',	'Qualcomm Adreno 740',	'Android 13',	'6.78”, (2448x1080), 165Hz / 1ms Samsung AMOLED. Corning® Gorilla® Glass Victus',	'LPDDR5X 16GB',	'UFS4.0 512GB',	'Supports 2.4GHz/ 5GHz/ 6GHz WiFi Bluetooth® 5.3 ',	'2023-06-15 09:38:04',	'publish'),
(12,	'https://dlcdnwebimgs.asus.com/gain/9272ABD8-6CFB-4DC6-8E07-0CDA10C9ABE3/w717/h525/w270',	'ROG Phone 6 Pro',	'4999',	'Qualcomm® Snapdragon® 8+ Gen 1 Mobile Platform',	'Qualcomm® Adreno™ 730',	'Android 12',	'6.78”, (2448x1080), 165Hz / 1ms Samsung AMOLED. Corning® Gorilla® Glass Victus',	'LPDDR5 18G',	'USF 3.1 512G',	'Wi-Fi Direct, Bluetooth v5.2',	'2023-06-15 09:38:08',	'publish'),
(13,	'https://dlcdnwebimgs.asus.com/gain/A40DC9D7-A142-4FD4-A8AD-D78E403361E8/w382',	'ROG Ally (2023)',	'3299',	'AMD Ryzen™ Z1 Extreme Processor ',	'AMD Radeon™ Graphics (AMD RDNA™ 3, 12 CUs, up to 2.7 GHz, up to 8.6 Teraflops) ',	'Windows 11',	'7-inch, FHD (1920 x 1080) 16:9, Refresh Rate: 120Hz ',	'16GB LPDDR5 on board',	'512GB PCIe® 4.0 NVMe™ M.2 SSD ',	'Wi-Fi 6E',	'2023-06-16 02:03:51',	'publish');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1,	'Shawn ',	'shawnningjiale@gmail.com',	'$2y$10$.0beKDZ3RCnMsJUDJRaBDOU3RaH3F0r6oK4LVN.k4aCbTRW/fvRzi',	'admin',	'2023-06-14 11:53:19'),
(3,	'rog',	'rog@rog.com',	'$2y$10$R28FHyIX7QVSJIqqtaglG.pc66TaUJPbkZyrr/FCIyvTrChDNAkxW',	'admin',	'2023-06-12 01:36:40'),
(4,	'Z790',	'z790@r.com',	'$2y$10$jDnNAF.PRsNE332tYvAlFe.cr2/C7Gu8Wn.TamS0m9d3Iixbtp0Eq',	'editor',	'2023-06-19 03:00:34'),
(5,	'X80',	'x80@x80.com',	'$2y$10$vMBzJzoPSVD.5JnYQ7JdbuW1ICoTg1ZmlPwvH178mezmwuYO2.qBi',	'user',	'2023-06-21 02:10:01');

-- 2023-06-21 02:36:09
