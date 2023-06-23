# simple-mvc

CREATE DATABASE `simple-mvc`
USE `simple-mvc`

CREATE TABLE information (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    info TEXT(255),
    PRIMARY KEY (id)
);

MySQL configuration are in config.php file