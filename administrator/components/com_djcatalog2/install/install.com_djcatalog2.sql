CREATE TABLE IF NOT EXISTS `#__djc2_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `description` mediumtext,
  `parent_id` int(11) NOT NULL,
  `metatitle` varchar(255) DEFAULT NULL,
  `metakey` text,
  `metadesc` text,
  `published` int(11) NOT NULL DEFAULT '1',
  `ordering` int(11) NOT NULL,
  `params` text,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__djc2_producers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `description` mediumtext,
  `metatitle` varchar(255) DEFAULT NULL,
  `metakey` text,
  `metadesc` text,
  `published` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__djc2_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL DEFAULT '0',
  `producer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `description` mediumtext,
  `intro_desc` text,
  `price` decimal(12,2) DEFAULT NULL,
  `special_price` decimal(12,2) DEFAULT NULL,
  `metatitle` varchar(255) DEFAULT NULL,
  `metakey` text,
  `metadesc` text,
  `published` int(11) NOT NULL DEFAULT '1',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `featured` int(11) NOT NULL DEFAULT '0',
  `params` text,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__djc2_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `type` varchar(64) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ext` varchar(255) NOT NULL,
  `path` VARCHAR( 255 ) NULL,
  `fullpath` VARCHAR( 255 ) NULL,
  `caption` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `type_item` (`type`,`item_id`),
  KEY `item_type` (`item_id`,`type`)
) DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__djc2_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `type` varchar(64) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ext` varchar(255) NOT NULL,
  `path` VARCHAR( 255 ) NULL,
  `fullpath` VARCHAR( 255 ) NULL,
  `caption` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `type_item` (`type`,`item_id`),
  KEY `item_type` (`item_id`,`type`)
) DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__djc2_items_extra_fields_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__djc2_items_extra_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `imagelabel` VARCHAR( 255 ) NULL,
  `type` varchar(255) NOT NULL,
  `published` int(11) NOT NULL DEFAULT '1',
  `ordering` int(11) NOT NULL,
  `filterable` int(11) NOT NULL,
  `searchable` int(11) NOT NULL,
  `visibility` int(11) NOT NULL,
  `required` SMALLINT NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__djc2_items_extra_fields_values_date` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `value` date NOT NULL,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__djc2_items_extra_fields_values_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__djc2_items_extra_fields_values_int` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__djc2_items_extra_fields_options` (
	`id` INT NOT NULL AUTO_INCREMENT, 
	`field_id` INT NOT NULL, 
	`value` VARCHAR(255) NOT NULL, 
	`ordering` INT NOT NULL, 
	PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `#__djc2_items_categories` (
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`category_id`,`item_id`),
  UNIQUE KEY `item_category` (`item_id`,`category_id`)
) DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__djc2_items_related` (
  `item_id` int(11) NOT NULL,
  `related_item` int(11) NOT NULL,
  PRIMARY KEY (`related_item`,`item_id`),
  UNIQUE KEY `item_related` (`item_id`,`related_item`)
) DEFAULT CHARSET=utf8;

ALTER TABLE `#__djc2_items_extra_fields_values_date` ADD UNIQUE `item_field` ( `item_id` , `field_id` );

ALTER TABLE `#__djc2_items_extra_fields_values_int` ADD INDEX `item_field` ( `item_id` , `field_id` );

ALTER TABLE `#__djc2_items_extra_fields_values_text` ADD UNIQUE `item_field` ( `item_id` , `field_id` );
