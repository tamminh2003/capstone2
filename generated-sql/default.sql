
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- disease
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `disease`;

CREATE TABLE `disease`
(
    `disease_id` INTEGER NOT NULL AUTO_INCREMENT,
    `disease_api_key` VARCHAR(100),
    `disease_name` VARCHAR(100),
    `disease_group` VARCHAR(255),
    PRIMARY KEY (`disease_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- poct_device
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `poct_device`;

CREATE TABLE `poct_device`
(
    `poct_device_id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_user_id` INTEGER NOT NULL,
    `poct_device_manufacture_name` VARCHAR(255),
    `poct_device_generic_name` VARCHAR(255),
    `device_model` VARCHAR(255),
    `device_image_url` VARCHAR(255),
    `device_type` VARCHAR(255),
    `device_descripition` VARCHAR(255),
    PRIMARY KEY (`poct_device_id`),
    INDEX `fk_poct_device_user1_idx` (`user_user_id`),
    CONSTRAINT `fk_poct_device_user1`
        FOREIGN KEY (`user_user_id`)
        REFERENCES `user` (`user_id`)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- poct_device_aditional_info
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `poct_device_aditional_info`;

CREATE TABLE `poct_device_aditional_info`
(
    `poct_device_aditional_info_id` INTEGER NOT NULL AUTO_INCREMENT,
    `idpoct_device` INTEGER NOT NULL,
    `user_user_id` INTEGER NOT NULL,
    `poct_device_aditional_info_label` VARCHAR(100),
    `poct_device_aditional_info_type` VARCHAR(100),
    `poct_device_aditional_info_details` VARCHAR(100),
    PRIMARY KEY (`poct_device_aditional_info_id`),
    INDEX `fk_poct_device_aditional_info_poct_device1_idx` (`idpoct_device`),
    INDEX `fk_poct_device_aditional_info_user1_idx` (`user_user_id`),
    CONSTRAINT `fk_poct_device_aditional_info_poct_device1`
        FOREIGN KEY (`idpoct_device`)
        REFERENCES `poct_device` (`poct_device_id`)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT `fk_poct_device_aditional_info_user1`
        FOREIGN KEY (`user_user_id`)
        REFERENCES `user` (`user_id`)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- poct_device_details_timestamps
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `poct_device_details_timestamps`;

CREATE TABLE `poct_device_details_timestamps`
(
    `poct_device_details_timestamps_id` INTEGER NOT NULL AUTO_INCREMENT,
    `poct_device_poct_device_id` INTEGER NOT NULL,
    `user_user_id` INTEGER NOT NULL,
    `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    `update_time` DATETIME,
    `comment` VARCHAR(255),
    PRIMARY KEY (`poct_device_details_timestamps_id`),
    INDEX `fk_poct_device_timestamps_poct_device1_idx` (`poct_device_poct_device_id`),
    INDEX `fk_poct_device_timestamps_user1_idx` (`user_user_id`),
    CONSTRAINT `fk_poct_device_timestamps_poct_device1`
        FOREIGN KEY (`poct_device_poct_device_id`)
        REFERENCES `poct_device` (`poct_device_id`)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT `fk_poct_device_timestamps_user1`
        FOREIGN KEY (`user_user_id`)
        REFERENCES `user` (`user_id`)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- poct_device_has_disease
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `poct_device_has_disease`;

CREATE TABLE `poct_device_has_disease`
(
    `poct_device_has_disease_id` INTEGER NOT NULL AUTO_INCREMENT,
    `poct_device_id` INTEGER NOT NULL,
    `disease_id` INTEGER NOT NULL,
    PRIMARY KEY (`poct_device_has_disease_id`),
    INDEX `fk_poct_device_has_disease_disease1_idx` (`disease_id`),
    INDEX `fk_poct_device_has_disease_poct_device1_idx` (`poct_device_id`),
    CONSTRAINT `fk_poct_device_has_disease_disease1`
        FOREIGN KEY (`disease_id`)
        REFERENCES `disease` (`disease_id`)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT `fk_poct_device_has_disease_poct_device1`
        FOREIGN KEY (`poct_device_id`)
        REFERENCES `poct_device` (`poct_device_id`)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `user_id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_firstname` VARCHAR(100),
    `user_lastname` VARCHAR(100),
    `user_email` VARCHAR(255),
    `user_type` VARCHAR(100),
    `user_username` VARCHAR(100),
    `user_password` VARCHAR(100),
    `user_company` VARCHAR(255),
    PRIMARY KEY (`user_id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
