
#database name
CREATE DATABASE `supermarket`;


#item_table
CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `unit_price` float(12,4) DEFAULT NULL,
  `is_deleted` enum('Active','InActive') NOT NULL DEFAULT 'Active',
   `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
   PRIMARY KEY (`id`)   
)ENGINE=InnoDB  DEFAULT CHARSET=latin1;



#offer_table
CREATE TABLE `offer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `offer_name` varchar(100) DEFAULT NULL,
  `offer_price` float(12,4) DEFAULT NULL,
  `quantity` int(5) DEFAULT 1,
  `item_id` int(11) DEFAULT NULL, 
  `is_deleted` enum('Active','InActive') NOT NULL DEFAULT 'Active',
   `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
   PRIMARY KEY (`id`),   
   KEY `item_id` (`item_id`),
   CONSTRAINT `item_fk` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
)ENGINE=InnoDB  DEFAULT CHARSET=latin1;
