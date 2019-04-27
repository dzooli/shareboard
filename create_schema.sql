drop database if exists shareboard;
create database if not exists shareboard;
use shareboard;

CREATE TABLE `shareboard`.`users` ( 
	`id` INT NOT NULL AUTO_INCREMENT , 
	`name` VARCHAR(255) NOT NULL , 
	`email` VARCHAR(255) NOT NULL , 
	`password` VARCHAR(255) NOT NULL , 
	`register_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
	PRIMARY KEY (`id`)) 
ENGINE = InnoDB 
COMMENT = 'This is the table for our users';

CREATE TABLE `shareboard`.`shares` 
( `id` INT NOT NULL AUTO_INCREMENT , 
	`user_id` INT NOT NULL , 
	`title` VARCHAR(255) NOT NULL , 
	`body` TEXT NOT NULL , 
	`link` VARCHAR(255) NOT NULL , 
	`create_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
	PRIMARY KEY (`id`)) 
ENGINE = InnoDB 
COMMENT = 'This table is used for storing short shared information';

INSERT INTO `shares` (`id`, `user_id`, `title`, `body`, `link`, `create_date`) 
	VALUES 
	(NULL, 
		'1', 
		'Share One', 
		'This is the first share of the Shareboard application.\r\nBasic MVC and routing functionality is OK now.', 
		'http://localhost/~dzooli/shareboard/share', 
		current_timestamp()
	);
INSERT INTO `shares` (`id`, `user_id`, `title`, `body`, `link`, `create_date`) 
	VALUES 
	(NULL,
		'1', 
		'Share Two', 
		'This is my second shared information on the shareboard.', 
		'http://google.com', 
		current_timestamp()
	), 
	(NULL, 
		'1', 
		'3rd Share', 
		'Some shared information', 
		'http://index.hu', 
		current_timestamp()
		);		