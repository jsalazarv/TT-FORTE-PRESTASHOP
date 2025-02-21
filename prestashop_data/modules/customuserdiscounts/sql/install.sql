CREATE TABLE IF NOT EXISTS `PREFIX_custom_user_discounts` (
    `id_custom_user_discount` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `id_customer` int(10) unsigned NOT NULL,
    `discount_type` varchar(32) NOT NULL,
    `discount_value` decimal(20, 6) NOT NULL DEFAULT '0.000000',
    `active` tinyint(1) NOT NULL DEFAULT '1',
    `date_add` datetime NOT NULL,
    `date_upd` datetime NOT NULL,
    PRIMARY KEY (`id_custom_user_discount`),
    KEY `id_customer` (`id_customer`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;