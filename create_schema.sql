create database if not exists myblog;
use myblog;

CREATE TABLE posts
	(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    body  TEXT,
    create_date DATETIME default current_timestamp
    );

