CREATE TABLE `digitalbloodbank`.`camp` ( `id` INT(10) NOT NULL , `SrNo` INT(10) NOT NULL , `bid` VARCHAR(128) NOT NULL , `camp_name` VARCHAR(128) NOT NULL , `address` VARCHAR(256) NOT NULL , `date` DATE NOT NULL , `time` TIME NOT NULL , `status` VARCHAR(10) NOT NULL DEFAULT 'Active' ) ENGINE = InnoDB;