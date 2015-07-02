CREATE TABLE IF NOT EXISTS `#__advertisement_advs` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',

`ordering` INT(11)  NOT NULL ,
`created_by` INT(11)  NOT NULL ,
`advs_name` VARCHAR(255)  NOT NULL ,
`advs_image` VARCHAR(255)  NOT NULL ,
`advs_link` VARCHAR(255)  NOT NULL ,
`advs_description` TEXT NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

