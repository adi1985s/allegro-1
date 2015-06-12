CREATE DATABASE IF NOT EXISTS `allegro_panels`
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

GRANT ALL ON `allegro_panels`.* TO `allegro_panels`@`localhost`;
SET PASSWORD FOR 'allegro_panels'@'localhost' = PASSWORD('allegro_panels');

USE allegro_panels;

DROP TABLE IF EXISTS users;

CREATE TABLE users (
    login VARCHAR(30) PRIMARY KEY NOT NULL,
    `password` VARCHAR(50) NOT NULL,
    nick  VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    activate BOOL NOT NULL
);
