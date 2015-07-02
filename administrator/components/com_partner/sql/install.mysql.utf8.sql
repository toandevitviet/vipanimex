CREATE TABLE IF NOT EXISTS `#__partner_partner` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',

`ordering` INT(11)  NOT NULL ,
`created_by` INT(11)  NOT NULL ,
`partner_name` VARCHAR(255)  NOT NULL ,
`partner_image` VARCHAR(255)  NOT NULL ,
`partner_link` VARCHAR(255)  NOT NULL ,
`partner_description` TEXT NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

